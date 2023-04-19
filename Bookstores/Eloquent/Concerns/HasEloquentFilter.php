<?php

namespace Bookstores\Eloquent\Concerns;

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

trait HasEloquentFilter
{
    private $queryParams;
    private $tableNames;
    private $wheres;
    private $wheresHas;

    public function filter(array $resource, $callback = null)
    {
        $this->generateFilterAttributes($resource);
        $model = $this->buildQueryWithWheres();
        $model = $this->buildQueryWithWheresHas($model);
        $model = $this->buildQueryOrderBy($model);
        $model = $this->buildQueryDistinct($model);
        $model = $this->buildQueryWithTrashed($model);
        $model = $callback ? $callback($model) : $model;
        return $this->returnPaginatedItems($model);
    }

    private function generateFilterAttributes($resource): void
    {
        $this->queryParams = collect($resource);
        $this->ignoreQueryParams();
        $this->extractTableNames();
        $this->extractWheres();
        $this->extractWheresHas();
    }

    //region FILTER ATTRIBUTES
    private function ignoreQueryParams(): void
    {
        if ($ignoredQueryParams = Arr::get($this->queryParams, '_ignore')) {
            $ignoredQueryParams = explode(',', $ignoredQueryParams);
            $this->queryParams  = $this->queryParams->filter(function ($value, $key) use ($ignoredQueryParams) {
                return !in_array($key, $ignoredQueryParams, true);
            });
        }
    }

    private function extractTableNames(): void
    {
        $this->tableNames = collect();
        $this->queryParams->each(function ($value, $key) {
            if (preg_match('/[^_]_/', $key) && preg_match('/-/', $key)) {
                $tempArray = explode('_', explode('-', $key)[0]);
                $tableName = end($tempArray);
                if (!$this->tableNames->search($tableName)) {
                    $this->tableNames->add(Str::snake($tableName));
                }
            }
        });
    }

    private function extractWheres(): void
    {
        $this->wheres = $this->queryParams->filter(function ($value, $key) {
            return !preg_match('/_/', $key);
        })
        ->mapWithKeys(function ($value, $key) {
            $maps = $this->getMaps(); if (count($maps) > 0) {
                return [$maps[$key] => $value];
            }
            return [$key => $value];
        });
    }

    private function extractWheresHas(): void
    {
        $this->wheresHas = collect();
        $whereHasQueryParams = $this->queryParams->filter(function ($value, $key) {
            return preg_match('/([a-zA-Z_]+)_([a-zA-Z-]+)$/', $key);
        });
        $whereHasQueryParams->each(function ($value, $key) {
            $relation = $this->getRelationNameFromKey($key);
            $whereHas = $this->wheresHas->filter(function ($whereHas) use ($relation) {
                return $whereHas['relation'] == $relation;
            })->first();
            if ($whereHas) {
                $whereHas->get('attributes')->put($key, $value);
            } else {
                $this->wheresHas->add(collect(['relation' => $relation, 'attributes' => collect([$key => $value])]));
            }
        });
    }
    //endregion

    //region CRITERIAS
    private function generateWhereCriteria(): array
    {
        $that = $this;
        return $this->wheres->map(static function ($value, $key) use ($that) {
            preg_match('/([^:]+(::[^:]+)?)(:([^:]+))?/', $key, $pieces);
            $operator = $that->formatCriteriaOperator($pieces);
            $value    = $that->formatCriteriaValue($pieces, $value);
            return [Str::snake($pieces[1]), $operator ?? '=', $value];
        })->values()->toArray();
    }

    private function generateWhereHasCriteria($wheresHas): array
    {
        $that = $this;
        return $wheresHas->map(static function ($value, $key) use ($that) {
            preg_match('/([^:]+(::[^:]+)?)(:([^:]+))?/', $key, $pieces);
            foreach ($that->tableNames->all() as $tableName) {
                if (preg_match('/' . Str::camel($tableName) . '/', $key)) {
                    $columName = $tableName . '.' . explode('-', $key)[1];
                    $value = $that->formatCriteriaValue($pieces, $value);
                    return [$columName, $pieces[4] ?? '=', $value];
                }
            }
            $attributeArray = explode('_', $pieces[1]);
            return [Str::snake(end($attributeArray)), $pieces[4] ?? '=', $value];
        })->values()->toArray();
    }

    private function formatCriteriaValue(array $pieces, $value)
    {
        $filterOperator = Arr::get($pieces, 4);
        if ($filterOperator) {
            if (preg_match('/like/', $filterOperator)) {
                $value = '%' . $value . '%';
                return $value;
            }
        }
        return $value;
    }

    private function formatCriteriaOperator(array $pieces): ?string
    {
        $filterOperator = Arr::get($pieces, 4);
        if ($filterOperator) {
            if (preg_match('/gte/', $filterOperator)) {
                $filterOperator = '>=';
            } elseif (preg_match('/lte/', $filterOperator)){
                $filterOperator = '<=';
            } elseif (preg_match('/gt/', $filterOperator)){
                $filterOperator = '>';
            } elseif (preg_match('/lt/', $filterOperator)){
                $filterOperator = '<';
            } elseif (preg_match('/ne/', $filterOperator)){
                $filterOperator = '<>';
            }
        }
        return $filterOperator;
    }
    //endregion

    //region BUILD QUERIES
    private function buildQueryWithWheres()
    {
        $criteria = $this->generateWhereCriteria();
        return static::where($criteria);
    }

    private function buildQueryWithWheresHas($model)
    {
        $this->wheresHas->each(function ($item) use ($model) {
            $relation = $item->get('relation');
            $criteria = $this->generateWhereHasCriteria($item->get('attributes'));
            $model = $model->whereHas($relation, function ($query) use ($criteria) {
                $query->where($criteria);
            });
        });
        return $model;
    }

    private function getRelationNameFromKey(string $key): string
    {
        preg_match('/([a-zA-Z_]+)_([a-zA-Z-]+)$/', $key, $match);
        return str_replace('_', '.', $match[1]);
    }

    private function buildQueryOrderBy($model)
    {
        if ($orderBy = Arr::get($this->queryParams, '_orderBy')) {
            $orderBy       = explode(':', $orderBy);
            $columnName    = Str::snake(str_replace('-', '.', $orderBy[0]));
            $sortDirection = $orderBy[1];
            $maps          = $this->getMaps();
            if (count($maps) > 0) {
                $columnName = $maps[$columnName];
            }
            $model->orderBy($columnName, $sortDirection);
        }
        return $model;
    }

    private function buildQueryDistinct($model)
    {
        if ($distinct = Arr::get($this->queryParams, '_distinct')) {
            $attributes = array_map(static function ($column) {
                return Str::snake($column);
            }, explode(',', $distinct));
            $attributes = implode(',', $attributes);
            $model->selectRaw("DISTINCT ON ({$attributes}) *");
        }
        return $model;
    }

    private function buildQueryWithTrashed($model)
    {
        if (Arr::get($this->queryParams, '_withTrashed')) {
            $model->withTrashed();
        }
        return $model;
    }
    //endregion

	private function returnPaginatedItems($model)
	{
	    $page    = $this->queryParams['_page']  ?? 1;
	    $perPage = $this->queryParams['_limit'] ?? null;
		if (!empty($perPage)) {
		    return $model->paginate($perPage, ["*"], "page", $page);
		}
		return $model->get();
	}
}

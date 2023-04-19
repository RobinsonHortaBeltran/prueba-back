<?php

namespace Bookstores\Eloquent\Concerns;

use Illuminate\Support\Arr;

trait HasMap
{
    /**
     * The map that is mass assignable.
     * This map contains as key the camel cased attribute names
     * of the local app entity and as values the names of the
     * data keys RECEIVED or TO BE SENT on the request to an external API.
     *
     * @var array
     */
    // protected $map = [];

    /**
     * The model's additional data.
     *
     * @var array
     */
    protected $additionalData = [];

    /**
     * Array of properties to be casted.
     *
     * @var array
     */
    // protected $casts = [];

    /**
     * @return array
     */
    public function getMaps(): array
    {
        return $this->maps ?? [];
    }

    public function getAttributeMap(string $key)
    {
        return $this->getMaps()[$key];
    }

    /**
     * @return array
     */
    public function getAdditionalData(): array
    {
        return $this->additionalData;
    }

    /**
     * Transforms the camel cased names to the database column names.
     *
     * @param array       $data
     *
     * @return array
     */
    public function mapAttributes(array $data): array
    {
        $resource = [];

        if (isset($data['additionalData'])) {
            $data = array_merge($data, $data['additionalData']);
            unset($data['additionalData']);
        }

        foreach ($data as $key => $value) {
            $resource = $this->buildResourceFromMap($key, $value, $resource);
        }
        return $resource;
    }

    /**
     * Transforms the key names of the database column names to camel cased names.
     *
     * @param array       $data
     *
     * @return array
     */
    public function unmapAttributes(array $data): array
    {
        $resource = [];
        $reversedMap = $this->reverseMap();

        foreach ($data as $key => $value) {
            if ($reversedKey = $this->getReversedMapValue($key, $reversedMap)) {
                if (in_array($key, $this->getAdditionalData(), true)) {
                    if (!Arr::exists($resource, 'additionalData.' . $reversedKey)) {
                        Arr::set($resource, 'additionalData.' . $reversedKey, $value);
                    }
                } else {
                    if (!Arr::exists($resource, $reversedKey)) {
                        Arr::set($resource, $reversedKey, $value);
                    }
                }
            }
        }

        return $resource;
    }

    /**
     * @param        $key
     * @param        $value
     * @param array  $resource
     *
     * @return array
     */
    private function buildResourceFromMap($key, $value, array $resource): array
    {
        $resourceKey = $this->getMapValue($key);
        if ($resourceKey && is_array($resourceKey)) {
            foreach ($resourceKey as $i) {
                $resource[$i] = $value;
            }
        } else if ($resourceKey) {
            $resource[$resourceKey] = $value;
        }
        return $resource;
    }


    /**
     * @param string $key
     *
     * @return mixed|null
     */
    private function getMapValue(string $key)
    {
        if (Arr::has($this->map, $key)) {
            return $this->map[$key];
        }
        return null;
    }

    /**
     * @param string $key
     * @param array  $reversedMap
     *
     * @return mixed|null
     */
    private function getReversedMapValue(string $key, array $reversedMap): ?string
    {
        if (Arr::has($reversedMap, $key)) {
            return $reversedMap[$key];
        }

        if ($key === 'additionalData') {
            return 'additionalData';
        }

        return null;
    }

    /**
     * @param $key
     *
     * @return mixed|null
     */
    protected function resolveAttribute($key)
    {
        $value = null;
        if (Arr::has($this->map, $key)) {
            if (is_array($this->map[$key])) {
                foreach ($this->map[$key] as $attribute) {
                    $value =  Arr::has($this->attributes, $attribute)
                        ? $this->castAttribute($key, $this->attributes[$attribute])
                        : null;
                    if (!empty($value)) { break; }
                }
            } else {
                $value = Arr::has($this->attributes, $this->map[$key])
                    ? $this->castAttribute($key, $this->attributes[$this->map[$key]])
                    : null;
            }
        }
        return $value;
    }

    /**
     * @return array
     */
    public function resolveMap(): array
    {
        $resource = [];
        foreach ($this->map as $key => $value) {
            $resource[$key] = $this->resolveAttribute($key);
        }
        return $resource;
    }

    /**
     * @return mixed
     */
    public function castAttribute($key, $value)
    {
        if ($castType = Arr::get($this->casts, $key)) {
            if ($castType === 'json') {
                return json_decode($value, true);
            }
        }
        return $value;
    }


    /**
     * Converts the initial map values into keys and the initial map keys into values.
     *
     * @return array
     */
    private function reverseMap(): array
    {
        $reversedMap = [];
        $keys        = array_keys($this->getMaps());
        $values      = array_values($this->getMaps());
        foreach ($values as $index => $value) {
            if (is_array($value)) {
                foreach ($value as $item) {
                    $reversedMap[$item] = $keys[$index];
                }
            } else {
                $reversedMap[$value] = $keys[$index];
            }
        }

        return $reversedMap;
    }
}

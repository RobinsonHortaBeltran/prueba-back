<?php

/**
 * En: Convert keys to a string array in snake case.
 * Es: Convertir llaves una matriz cadena en snake case.
 */
if (!function_exists('convert_array_key_to_snake_case')) {
    function convert_array_keys__to_snake_case(array $input)
    {
        $output = [];
        array_walk($input, function ($value, $key) use (&$output) {
            $output[strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $key))] = $value;
        });
        return $output;
    }
}

/**
 * En: Check if date is older.
 * Es: Chequear si la fecha es mayor.
 */
if (!function_exists('check_date')) {
    function check_date(string $start, string $operator, string $end) {
        $start  = strtotime($start); $end = strtotime($end);
        switch ($operator) {
            case '<':
                $result = $start < $end;  break;
            case '<=':
                $result = $start <= $end; break;
            case '>':
                $result = $start > $end;  break;
            case '>=':
                $result = $start >= $end; break;
            case '=':
                $result = $start = $end;  break;
            case '!=':
                $result = $start != $end; break;
            default:
                $result = false;
        }
        return $result;
    }
}

/**
 * En: Check if date one is in date range.
 * Es: Chequear si fecha una está en rango de fechas.
 */
if (!function_exists('check_date_if_date_range')) {
    function check_date_if_date_range($start, $end, $date) {
        $date  = strtotime($date);
        $start = strtotime($start); $end = strtotime($end);
        if (($date >= $start) && ($date <= $end)) {
            return true;
        }
        return false;
    }
}

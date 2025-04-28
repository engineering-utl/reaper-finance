<?php
if (!function_exists('flatten_array')) {
    function flatten_array($array, $prefix = '') {
        $result = [];
        foreach ($array as $key => $value) {
            $new_key = $prefix === '' ? $key : $prefix . '_' . $key;
            if (is_array($value)) {
                $result = array_merge($result, flatten_array($value, $new_key));
            } else {
                $result[$new_key] = $value;
            }
        }
        return $result;
    }
}

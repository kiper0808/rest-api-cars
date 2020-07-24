<?php
// Functions

namespace Rest\System;

final class Functions {
    public static function parseParams($query) {
        $query = substr($query, 9);
        if(!$query) { return []; } // Guard expression
        $params = explode('&', $query);
        $result = [];

        foreach($params as $param) {
            $temp = explode('=', $param);
            $result[$temp[0]] = $temp[1];
        }

        return $result;
    }
}
<?php
// HTTP Codes

namespace Rest\System;

class Codes {
    public static function getResult(int $code, string $id = null) {
        $result = null;
        switch($code) {
            case 200:
                $result = json_encode([
                    'status' => true,
                    'code' => 200,
                    'id' => $id,
                    'message' => 'Object updated'
                ]);
                break;
            case 201:
                $result = json_encode([
                    'status' => true,
                    'code' => 201,
                    'id' => $id,
                    'message' => 'Object created'
                ]);
                break;
            case 400:
                $result = json_encode([
                    'status' => false,
                    'code' => 400,
                    'message' => 'Data is empty or not full, require: name, year, color'
                ]);
                break;
            case 404:
                $result = json_encode([
                    'status' => false,
                    'code' => 404,
                    'message' => 'Resource is not found'
                ]);
                break;
            case 405:
                $result = json_encode([
                    'status' => false,
                    'code' => 405,
                    'message' => 'Method Not Allowed'
                ]);
                break;
            case 500:
                $result = json_encode([
                    'status' => false,
                    'code' => 500,
                    'message' => 'Internal server error'
                ]);
                break;
        }

        return $result;
    }
}
<?php
// HTTP Codes

namespace Rest\System;

define('STATUS', 'status');
define('CODE', 'code');
define('ID', 'id');
define('MESSAGE', 'message');
class Codes {
    public static function getResult(int $code, string $id = null) {
        $result = null;
        
        switch($code) {
            case 200:
                $result = json_encode([
                    STATUS => true,
                    CODE => 200,
                    ID => $id,
                    MESSAGE => 'Object updated'
                ]);
                break;
            case 201:
                $result = json_encode([
                    STATUS => true,
                    CODE => 201,
                    ID => $id,
                    MESSAGE => 'Object created'
                ]);
                break;
            case 400:
                $result = json_encode([
                    STATUS => false,
                    CODE => 400,
                    MESSAGE => 'Data is empty or not full, require: name, year, color'
                ]);
                break;
            case 404:
                $result = json_encode([
                    STATUS => false,
                    CODE => 404,
                    MESSAGE => 'Resource is not found'
                ]);
                break;
            case 405:
                $result = json_encode([
                    STATUS => false,
                    CODE => 405,
                    MESSAGE => 'Method Not Allowed'
                ]);
                break;
            case 500:
                $result = json_encode([
                    STATUS => false,
                    CODE => 500,
                    MESSAGE => 'Internal server error'
                ]);
                break;
            default:
                $result = json_encode([
                    STATUS => false,
                    CODE => 000,
                    MESSAGE => 'Unknown error'
                ]);
        }

        return $result;
    }
}
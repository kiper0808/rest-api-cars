<?php
// DB Connect

namespace Rest;

class Database {
    private static $connect;

    public static function getConnect() {
        if(self::$connect === NULL) {
            self::$connect = new \PDO('mysql:host=mysql;dbname=rest-api;charset=utf8', 'root', 'secret');
            self::$connect -> exec('SET NAMES UTF8');
        }
        
        return self::$connect;
    }
}
<?php
// Cars Model

namespace Rest\Model;
use Rest\Database;

class Cars {
    public static function findId($id) {
        $pdo = Database::getConnect();

        $statement = $pdo->prepare('SELECT id FROM cars WHERE id = :id');
        $statement->bindParam('id', $id);
        $statement->execute();
        
        $count = $statement->rowCount();

        return $count > 0;      
    }
    
    public static function createCar(string $name, $year, $color) {
        $pdo = Database::getConnect();
        
        $statement = $pdo->prepare('INSERT INTO cars (name, year, color) VALUES (:name, :year, :color)');
        $statement->bindParam('name', $name);
        $statement->bindParam('year', $year);
        $statement->bindParam('color', $color);
        $statement->execute();
        
        return $pdo->lastInsertId();
    }

    public static function updateCar(int $id, array $data) {
        $pdo = Database::getConnect();
        $sql = 'SET ';

        foreach ($data as $key => $value) {
            $sql .= $key . '=' . ':' . $key . ',';
        }
        
        $sql = substr($sql,0,-1);;

        $statement = $pdo->prepare('UPDATE cars ' . $sql . ' WHERE id = :id');
        
        foreach ($data as $key => $value) {
            $statement->bindValue($key, $value);
        }
        
        $statement->bindParam('id', $id);
        $statement->execute();
        
        return $statement;
    }

    public static function deleteCar(int $id) {
        $pdo = Database::getConnect();
        
        $statement = $pdo->prepare('DELETE FROM cars WHERE id = :id');
        $statement->bindParam('id',$id);
        $result = $statement->execute();
    
        return $result;
    }

    public static function getAllCars(array $params) {
        $pdo = Database::getConnect();
        
        // Default params: order = name, offset = 0, limit = 10
        $params['order'] = $params['order'] === 'year-desc' ? 'year DESC' : $params['order'];
        $order = $params['order'] ?? 'name';
        $limit = $params['limit'] ?? 10;
        $offset = $params['offset'] ?? 0;

        $sql = 'SELECT * FROM cars ORDER by ' . $order . ' LIMIT ' . $offset . ',' . $limit;

        $statement = $pdo->prepare($sql);
        
        $statement->execute();

        $data = [];

        foreach ($statement->fetchAll(\PDO::FETCH_ASSOC) as $element) {
            $data[] = $element;
        }
        
        return $data;
    }

    public static function getCar(int $id) {
        $pdo = Database::getConnect();

        $statement = $pdo->prepare('SELECT * FROM cars WHERE id = :id');
        $statement->bindParam('id', $id);
        $statement->execute();

        $data = $statement->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }
}
<?php
// Cars List Action

namespace Rest\Action;
use Rest\System\Codes;
use Rest\System\Functions;
use Rest\Model\Cars;

class CarsAction {
    private $method = null;

    public function __invoke() {
        // Set headers
        header("Content-Type: application/json; charset=UTF-8");
        
        $this->method = $_SERVER['REQUEST_METHOD'];
        
        switch($this->method) { // If GET
            case 'GET':
                $params = Functions::parseParams($_SERVER['REQUEST_URI']);
                $cars = Cars::getAllCars($params);
                echo json_encode($cars);
                break;
            case 'POST':
                $data = json_decode(file_get_contents('php://input'), true);
                $name = $data['name'] ?? null;
                $year = $data['year'] ?? null;
                $color = $data['color'] ?? null;

                if ($name && $year && $color) { // If POST-Data is correct
                    $id = Cars::createCar($name, $year, $color);
                    if ($id) {
                        http_response_code(201);
                        header('Content-Location: /cars/' . $id);
                        echo Codes::getResult(201, $id);
                    }
                } else { // If POST-Data is not correct
                    http_response_code(400);
                    echo Codes::getResult(400);
                }
                break;
            default: // Else
                http_response_code(405);
                echo Codes::getResult(405);
        }
    }
}
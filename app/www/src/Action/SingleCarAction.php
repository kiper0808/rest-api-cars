<?php
// Single Car Action

namespace Rest\Action;
use Rest\System\Codes;
use Rest\Model\Cars;

class SingleCarAction {
    private $car = null;
    private $id = null; 
    private $method = null;

    public function __invoke() {
        // Set headers
        header("Content-Type: application/json; charset=UTF-8");

        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $this->id = intval(end($uri));
        $this->car = Cars::getCar($this->id);
        $this->method = $_SERVER['REQUEST_METHOD'];

        if($this->car) { // If id is real
            switch($this->method) {
                case 'GET': // If GET
                    echo json_encode($this->car);
                    break;
                case 'PUT': // If PUT
                    $data = json_decode(file_get_contents('php://input'), true);
                    if (Cars::updateCar($this->id, $data)) { // If updated
                        header('Content-Location: /cars/' . $this->id);
                        echo Codes::getResult(200, $this->id);
                    } else { // If is not updated
                        http_response_code(500);
                        echo Codes::getResult(500);
                    }
                    break;
                case 'DELETE': // If DELETE
                    if (Cars::deleteCar($this->id)) { // If deleted
                        http_response_code(204);
                    } else { // If is not deleted
                        http_response_code(500);
                        echo Codes::getResult(500);
                    }
                    break;
                default:
                    http_response_code(405);
                    Codes::getResult(405);
            }
        } else { // If id is not real
            http_response_code(404);
            echo Codes::getResult(404);
        }
    }
}
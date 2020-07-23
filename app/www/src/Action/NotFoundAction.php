<?php
// Not Found Action

namespace Rest\Action;
use Rest\System\View;

class NotFoundAction {
    public function __invoke() {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => false,
            'code' => 404,
            'message' => 'Resource not found'
        ]);
        header("HTTP/1.1 404 Not Found");
    }
}
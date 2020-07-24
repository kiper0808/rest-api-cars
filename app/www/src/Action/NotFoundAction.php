<?php
// Not Found Action

namespace Rest\Action;
use Rest\System\View;
use Rest\System\Codes;

class NotFoundAction {
    public function __invoke() {
        header('Content-Type: application/json');
        http_response_code(404);
            echo Codes::getResult(404);
    }
}
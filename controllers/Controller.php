<?php

class Controller {
    protected function render(string $view, array $params = []) {
        extract($params);
        include_once dirname(__DIR__) . "/view/pages/$view.php";
    }

    protected function redirect(string $route) {
        header("Location: $route");
    }

    protected function request() {
        return $_REQUEST;
    }

    protected function files() {
        return $_FILES;
    }

    protected function responseJson(array $obj, int $statusCode = 200) {
        header("HTTP/1.1 $statusCode OK");
        return json_encode($obj);
    }

    protected function session() {
        return $_SESSION;
    }
}

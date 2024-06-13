<?php

require_once 'repository/ProductRepository.php';
require_once 'controllers/Controller.php';

class HomeController extends Controller {
    public function index() {
        $this->render('index');
    }
}

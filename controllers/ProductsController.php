<?php

require_once 'repository/ProductRepository.php';
require_once 'controllers/Controller.php';

class ProductsController extends Controller {
    public function index() {
        $repository = new ProductRepository();
        $productos = $repository->fetchAll();
        
        $this->render('products/index', [
            'products' => $productos
        ]);
    }

    public function store() {
        // logica de guardar
        $this->redirect('/');
        // return $_SERVER['SERVER_NAME'];
    }
}

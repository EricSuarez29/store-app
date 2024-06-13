<?php

require_once 'repository/Repository.php';

class ProductRepository extends Repository {
    public function fetchAll() {
        $rows = $this->query("SELECT * FROM products");
        return $rows;
    }
}

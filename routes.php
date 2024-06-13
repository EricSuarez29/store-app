<?php

$routes = [
    ['/', 'GET', 'HomeController', 'index'],
    ['/productos', 'GET', 'ProductsController', 'index'],
    ['/productos', 'POST', 'ProductsController', 'store'],
];
  

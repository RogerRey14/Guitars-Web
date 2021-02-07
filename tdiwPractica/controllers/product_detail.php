<?php
$id = $_GET['product'];
require_once __DIR__.'/../model/connectDb.php';
require_once __DIR__. '/../model/categories.php';
require_once __DIR__. '/../model/products.php';
$connexion = connectaBD();
$productDetail = getProductDetail($connexion,$id);


require_once __DIR__ . '/../views/product_detail.php';
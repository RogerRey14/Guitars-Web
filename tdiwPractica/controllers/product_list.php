<?php
$category = $_GET['categories'];
require_once __DIR__.'/../model/connectDb.php';
require_once __DIR__. '/../model/categories.php';
require_once __DIR__. '/../model/products.php';
$connexion = connectaBD();
$connexion2 = connectaBD();
$products = getProducts($connexion,$category);
$categories = getCategories($connexion2);
require_once __DIR__ . '/../views/product_list.php';
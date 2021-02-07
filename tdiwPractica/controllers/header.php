<?php
require_once __DIR__ . '/../model/connectDb.php';
require_once __DIR__ . '/../model/categories.php';
$categories = getCategories(connectaBD()); // Aquesta crida és al model
include __DIR__ . '/../views/header.php';

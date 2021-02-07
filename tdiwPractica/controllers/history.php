<?php

require_once __DIR__ . '/../model/history.php';
require_once __DIR__ . '/../model/addCart.php';
require_once __DIR__ . '/../model/products.php';
require_once __DIR__ . '/../model/connectDb.php';
$connexion=connectaBD();

$comandes=getComandes($_SESSION['user_id']);

$productes= array();

$aux=0;
foreach ($comandes as $key)
{
    $lines=getLines($key['id']);
    array_push($productes, $lines);

    $it=0;
    foreach ($lines as $key2) {
        $detail = getProductDetail($connexion, $key2['producte_id']);
        array_push($productes[$aux][$it], $detail[0]['nom']);
        array_push($productes[$aux][$it], $detail[0]['foto']);
        $it++;
    }
    $aux++;
}

#echo '<pre>'; print_r($comandes); echo '</pre>';
include __DIR__ . '/../views/history.php';

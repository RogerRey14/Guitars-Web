<?php
if ($_SESSION['cart']['total_products']>0){

    include_once __DIR__."/../model/addCart.php";
    $iduser = $_SESSION['user_id'];
    $num=$_SESSION['cart']['total_products'];
    $price=$_SESSION['cart']['total_price'];
    $data = date("Y-m-d H:i:s");


    newOrder($iduser, $num, $price , $data);
    $idcom=getOrderID($iduser, $num, $price , $data);

    #echo '<pre>'; print_r($idcom); echo '</pre>';

    foreach ($_SESSION['cart']['products'] AS $key => $item):
        newOrderLine(end($idcom)[0], $_SESSION['cart']['products'][$key]['id'], $_SESSION['cart']['products'][$key]['price'],
        $_SESSION['cart']['products'][$key]['number']);
    endforeach;

    $idcom=0;
    //esborrem el carro
    unset($_SESSION['user_id']);
    unset($_SESSION['cart']['products']);
    unset($_SESSION['cart']['total_price']);
    unset($_SESSION['cart']['total_products']);
    unset($_SESSION['cart']);
;
    $_SESSION['user_id'] = $iduser;
    include __DIR__ . '/../views/order_done.php';
}else{
    echo "<script type='text/javascript'>alert('You must add products to the cart before buying!');</script>";
    include __DIR__ . '/shopping_cart.php';
}

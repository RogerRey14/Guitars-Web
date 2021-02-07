<?php

if (isset($_POST['cantidad']) && isset($_SESSION['user_id'])) #afegir compra
{

    $num= $_POST['cantidad'];

    require_once __DIR__. '/../model/addCart.php';
    $items = checkProductCart();


    //Plenar el carro
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
        $_SESSION['cart']['total_price'] = 0;
        $_SESSION['cart']['total_products'] = 0;
        $_SESSION['cart']['products'] = array();


    }
    if(!isset($_SESSION['cart']['products'][$items[0]['id']])){ //carrito sense aquest producte
        $_SESSION['cart']['products'][$items[0]['id']] = array();
        $_SESSION['cart']['products'][$items[0]['id']]['number'] = $num;
        $_SESSION['cart']['products'][$items[0]['id']]['id'] = $items[0]['id'];
        $_SESSION['cart']['products'][$items[0]['id']]['subTotal'] = $items[0]['preu']*$num;
        $_SESSION['cart']['products'][$items[0]['id']]['name'] = $items[0]['nom'];
        $_SESSION['cart']['products'][$items[0]['id']]['picture'] = $items[0]['foto'];
        $_SESSION['cart']['products'][$items[0]['id']]['price'] = $items[0]['preu'];

    }else{ //carrito amb aquest producte
        $_SESSION['cart']['products'][$items[0]['id']]['number'] = $_SESSION['cart']['products'][$items[0]['id']]['number'] + $num;
        $_SESSION['cart']['products'][$items[0]['id']]['subTotal'] = $_SESSION['cart']['products'][$items[0]['id']]['subTotal'] + $items[0]['preu']* $_POST['cantidad'];
    }

    $_SESSION['cart']['total_price'] = $_SESSION['cart']['total_price'] + $items[0]['preu']*$num;
    $_SESSION['cart']['total_products'] = $_SESSION['cart']['total_products'] + $num;


    require_once __DIR__ . '/../views/shopping_cart.php';


} else if (isset($_SESSION['user_id'])) #no afegir compra, mirar, loguejat
{

        if (isset($_SESSION['remove'])) {
            unset($_SESSION['remove']);

        }
        if (!isset($_SESSION['cart']['total_products'])) {
            echo "<script type='text/javascript'>alert('Your shopping cart is empty! Go and check our guitars to buy');</script>";
            require_once __DIR__ . '/../views/empty_cart.php';
        }else{
            require_once __DIR__ . '/../views/shopping_cart.php';
        }




}else{
    echo "<script type='text/javascript'>alert('You must login before using the shopping cart!');</script>";
    require_once __DIR__ . '/../views/login.php';

}



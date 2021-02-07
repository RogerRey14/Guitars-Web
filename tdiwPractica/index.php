<?php
session_start();
$action = $_GET['action'] ?? null;

switch ($action) {
    case 'products':
        include __DIR__ .'/resource_product_list.php';
        break;
    case 'detail':
        include __DIR__ .'/resource_product_detail.php';
        break;
    case 'register':
        include __DIR__ .'/resource_register.php';
        break;
    case 'login':
        include __DIR__ .'/resource_login.php';
        break;
    case 'logindone':
        include __DIR__ .'/resource_logindone.php';
        break;
    case 'logout':
        include __DIR__ .'/resource_logout.php';
        break;
    case 'profile':
        include __DIR__ .'/resource_profile.php';
        break;
    case 'order_done':
        include __DIR__ .'/resource_order_done.php';
        break;
    case 'cart':
        include __DIR__ .'/resource_shopping_cart.php';
        break;
    case 'cartremove':
        include __DIR__ .'/resource_cart_remove_item.php';
        break;
    case 'cartremoveall':
        include __DIR__ .'/resource_cart_remove_all.php';
        break;
    case 'history':
        include __DIR__ .'/resource_history.php';
        break;
    default: //category_list
        include __DIR__ .'/resource_category_list.php';
        break;
}

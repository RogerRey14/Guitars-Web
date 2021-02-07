<?php
$user=0;

if ($_SERVER['REQUEST_METHOD']==='POST')
{
    $filters= filter_input_array(
        INPUT_POST,
    [
        'email'=>FILTER_DEFAULT,
        'contrasenya'=>FILTER_DEFAULT
    ]
    );
    $email=$filters['email'];
    $password=$filters['contrasenya'];

    include __DIR__."/../model/evaluateData.php";
    $user= evaluateData( $email, $password);

    if ($user)
    {
        if(!isset($_SESSION['cart'])){
            $_SESSION['user_id']['cart'] = array();

            $_SESSION['cart']['total_price'] = 0;
            $_SESSION['cart']['total_products'] = 0;
            $_SESSION['cart']['products'] = array();

        }

        $_SESSION['user_id']=$user['id'];

        $categories = getCategories(connectaBD()); // Aquesta crida és al model


        require_once __DIR__.'/../views/logindone.php';
    }
    else {
        require_once __DIR__ . '/../views/login.php';
    }

}
else
    {
    require_once __DIR__ . '/../views/login.php';
}
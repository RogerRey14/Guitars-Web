<?php
if (isset($_POST["nom"]))
{
    include __DIR__."/../model/insertDataBD.php";
    $control= insertData();

    if ($control===1) {
        echo "<script type='text/javascript'>alert('Register has been succesfully done');</script>";
        require_once __DIR__ . '/../views/login.php';
    }else
    {
        require_once __DIR__ . '/../views/register.php';
    }
}else
{
    require_once __DIR__ . '/../views/register.php';
}


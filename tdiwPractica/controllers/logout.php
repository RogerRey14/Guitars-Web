<?php

if(isset($_SESSION['user_id']))
{

    unset($_SESSION['user_id']);

}

require_once __DIR__.'/../model/connectDb.php';


include __DIR__.'/../views/logout.php';

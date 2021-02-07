<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
    include __DIR__."/../model/replaceUserInfo.php";
    replaceUserInfo($_SESSION['user_id']);

}
else {
    include __DIR__ . "/../model/getUserInfo.php";
    $id = $_SESSION['user_id'];
    $info = getUserInfo($_SESSION['user_id']);
    require_once __DIR__ . '/../views/profile.php';
}
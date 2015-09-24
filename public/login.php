<?php
session_start();
if (isset($_GET['act']) && 'dologin' == $_GET['act']) {

} else {
    include '../template/login.html';
    if (isset($_SESSION['msg'])) {
        $_SESSION['msg'] = NULL;
        unset($_SESSION['msg']);
    }
}

function redirect_login()
{
    header('location:login.php');
    exit();
}
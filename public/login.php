<?php
session_start();
if (isset($_GET['act']) && 'dologin' == $_GET['act']) {
    include '../config/config.php';
    $gUsername = $gPassword = NULL;
    if (!isset($_POST['username'])) {
        $_SESSION['msg'] = 'Username not provided';
        redirect_login();
    } else {
        $gUsername = htmlspecialchars(trim($_POST['username']));
    }
    if (!isset($_POST['password'])) {
        $_SESSION['msg'] = 'Password not provided';
    } else {
        $gPassword = htmlspecialchars(trim($_POST['password']));
    }

    if ($gUsername != $config['username'] || $gPassword != $config['password']) {
        $_SESSION['msg'] = 'Login failed';
    } else {
        $_SESSION['admin_user'] = $config['username'];
        header('location:list.php');
        exit();
    }
    echo "Login execute failed";
    redirect_login();
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
<?php
namespace notes\controller;

class LoginController
{
    public function index()
    {
        include 'template/login.html';
    }
    public function doLogin()
    {
        session_start();
        include 'config/config.php';
        $gUsername = $gPassword = '';
        if (!isset($_POST['username'])) {
            $_SESSION['msg'] = 'Username not provided';
            return header('location:/login');
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
            return header('location:/');
        }
        return header('location:/login');
    }
    public function qq()
    {
        echo 'login:qq';
        
    }
    public function qqCallback()
    {
        echo 'login:qq_callback';
    }
    public function weibo()
    {
        echo 'login:weibo';
        
    }
    public function weiboCallback()
    {
                
    }
    
    public function google()
    {

    }
    public function googleCallback()
    {

    }
    public function facebook()
    {

    }
    public function facebookCallback()
    {

    }
    public function twitter()
    {

    }
    public function twitterCallback()
    {

    }
}

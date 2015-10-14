<?php


namespace App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;

class AccountController extends BaseController
{
    public function login()
    {
        if (isset($_SESSION['msg'])) {
            $_SESSION['msg'] = NULL;
            unset($_SESSION['msg']);
        }
        return view('admin.account.login');
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
}
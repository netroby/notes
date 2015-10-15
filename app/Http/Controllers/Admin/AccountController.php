<?php


namespace App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;

class AccountController extends BaseController
{
    public function login()
    {
        if (array_key_exists('msg', $_SESSION)) {
            $_SESSION['msg'] = null;
            unset($_SESSION['msg']);
        }
        return view('admin.account.login');
    }
    public function doLogin()
    {
        $gUsername = $gPassword = '';
        if (!array_key_exists('username', $_POST)) {
            $_SESSION['msg'] = 'Username not provided';
            return header('location:/login');
        } else {
            $gUsername = htmlspecialchars(trim($_POST['username']));
        }
        if (!array_key_exists('password', $_POST)) {
            $_SESSION['msg'] = 'Password not provided';
        } else {
            $gPassword = htmlspecialchars(trim($_POST['password']));
        }

        if ($gUsername !== $config['username'] || $gPassword !== $config['password']) {
            $_SESSION['msg'] = 'Login failed';
        } else {
            $_SESSION['admin_user'] = $config['username'];
            return header('location:/');
        }
        return header('location:/login');
    }
}
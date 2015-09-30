<?php
namespace notes\controller;

use notes\app\ViewModel;

class HomeController
{
    public function __construct()
    {
        session_start();
        if (!array_key_exists('admin_user', $_SESSION)) {
            header('location:/login');
        }
    }
    public function index()
    {
        echo 'home:index';
        return new ViewModel('index');
    }
}

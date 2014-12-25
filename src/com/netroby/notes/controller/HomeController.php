<?php
namespace com\netroby\notes\controller;

class HomeController {
    public function __construct() {
        session_start();
        if (!isset($_SESSION['admin_user'])) {
            header('location:/login');
        }
    }
    public function index() {
       echo 'home:index';
        return false;
    }
}
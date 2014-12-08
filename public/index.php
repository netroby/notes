<?php
chdir(dirname(__DIR__));
include 'vendor/autoload.php';
session_start();
if (!isset($_SESSION['admin_user'])) {
    header('location: login.php');
} else {
    header('location: list.php');
}

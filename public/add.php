<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header('location: login.php');
    exit();
}

if (isset($_GET['act']) && $_GET['act'] == 'save') {

}
include '../template/add.html';
<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header('location: login.php');
} else {
    include '../template/list.html';
}

<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header('location: login.php');
} else {
    include '../config/config.php';
    include '../vendor/Acmu/DB.php';
    $db = Acmu\DB::getInstance($config);
    $stmt = $db->prepare("select id, title from notes where is_delete is null or is_delete = '0' order by id desc limit 100 ;");
    $stmt->execute();
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    if (stristr($_SERVER['HTTP_USER_AGENT'], 'android') || stristr($_SERVER['HTTP_USER_AGENT'], 'iphone')) {
        include '../template/list-mobile.html';
    } else {
        include '../template/list.html';
    }
}

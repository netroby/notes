<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header('location: login.php');
} else {
    include '../config/config.php';
    include '../vendor/Acmu/Db.php';
    $db = Acmu\Db::getInstance($config);
    $mysql_server = null;
    $charset_info = null;
    $addtime = date('Y-m-d H:i:s', time());
    $stmt = $db->prepare("select id, left(content, 128) as content from notes where is_delete is null or is_delete = '0' order by id desc limit 100 ;");
    $stmt->execute();
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dbh = null;
    $addtime = null;
    include '../template/list.html';
}

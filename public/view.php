<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header('location: login.php');
} else {
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        $id = intval($_GET['id']);
        include '../config/config.php';
        include '../vendor/Acmu/DB.php';
        $db = Acmu\Db::getInstance($config);
        $mysql_server = null;
        $charset_info = null;
        $addtime = date('Y-m-d H:i:s', time());
        $stmt = $db->prepare('select id, title, content, addtime from notes where id = :id limit 1;');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $note = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        $addtime = null;if (stristr($_SERVER['HTTP_USER_AGENT'], 'android') || stristr($_SERVER['HTTP_USER_AGENT'], 'iphone')) {
            include '../template/view-mobile.html';
        } else {
            include '../template/view.html';
        }
    } else {
        echo "Click left item to show notes";
    }

}

<?php
session_start();
if (!isset($_SESSION['admin_user'])) {
    header('location: login.php');
    exit();
}

if (isset($_GET['act']) && $_GET['act'] == 'save') {

    try {
        if (isset($_POST['content'])) {

            include '../config/config.php';
            include '../vendor/Acmu/DB.php';
            $db = Acmu\Db::getInstance($config);
            $mysql_server = null;
            $charset_info = null;
            $addtime = date('Y-m-d H:i:s', time());
            $stmt = $db->prepare('insert into notes set title=:title,content = :content, addtime = :addtime;');
            $title = cleanHtml($_POST['title']);
            $content = cleanHtml($_POST['content']);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":content", $content);
            $stmt->bindParam(":addtime", $addtime);
            $stmt->execute();

            $dbh = null;
            $addtime = null;

        }
        echo "Success add note, <a href=\"javascript:top.location='list.php'\">Ok</a>";
        exit();
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
} else {
    if (stristr($_SERVER['HTTP_USER_AGENT'], 'android') || stristr($_SERVER['HTTP_USER_AGENT'], 'iphone')) {
        include '../template/add-mobile.html';
    } else {
        include '../template/add.html';
    }
}


function cleanHtml($str) {
    require_once '../library/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
    $config->set('Core.Encoding', 'UTF-8');
    $config->set('HTML.Doctype', 'HTML 4.01 Transitional');
    $purifier = new HTMLPurifier($config);
    return $purifier->purify($str);
}
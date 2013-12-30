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
            $mysql_server = sprintf("mysql:host=%s;dbname=%s", $config['db']['host'], $config['db']['dbname']);
            $charset_info = sprintf("SET NAMES %s", $config['db']['charset']);
            $dbh = new PDO($mysql_server, $config['db']['user'], $config['db']['password'], array(
                PDO::MYSQL_ATTR_INIT_COMMAND => $charset_info
            ));
            $mysql_server = null;
            $charset_info = null;
            $addtime = date('Y-m-d H:i:s', time());
            $stmt = $dbh->prepare('insert into notes set content = :content, addtime = :addtime;');
            $stmt->bindParam(":content", cleanHtml($_POST['content']));
            $stmt->bindParam(":addtime", $addtime);
            $stmt->execute();

            $dbh = null;
            $addtime = null;

        }
        echo "Success add note";
        exit();
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
} else {
    include '../template/add.html';
}


function cleanHtml($str) {
    require_once '../library/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
    $config->set('Core.Encoding', 'UTF-8');
    $config->set('HTML.Doctype', 'HTML 4.01 Transitional');
    $purifier = new HTMLPurifier($config);
    return $purifier->purify($str);
}
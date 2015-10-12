<?php
namespace notes\controller;

class NoteController
{
    public function __construct()
    {
        session_start();
        if (!array_key_exists('admin_user', $_SESSION)) {
            header('location: login.php');
        }
    }

    public function index()
    {
        echo "hello";
    }

    public function delete()
    {
        if (array_key_exists('id', $_GET) && $_GET['id'] > 0) {
            $id = (int) $_GET['id'];
            include '../config/config.php';
            include '../vendor/Acmu/DB.php';
            $db = Acmu\Db::getInstance($config);
            $mysql_server = null;
            $charset_info = null;
            $addtime = date('Y-m-d H:i:s', time());
            $stmt = $db->prepare('update notes set is_delete = 1 where id = :id limit 1;');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $note = $stmt->fetch(PDO::FETCH_ASSOC);
            $dbh = null;
            $addtime = null;

        }
        echo "Operation successed. <a href=\"javascript:top.location='list.php'\">OK</a>";
    }
}

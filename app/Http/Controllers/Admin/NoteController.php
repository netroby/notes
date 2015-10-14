<?php

namespace App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;

class NoteController extends BaseController
{

    public function add()
    {
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


    }

    public function cleanHtml($str)
    {
        require_once '../library/HTMLPurifier.auto.php';
        $config = HTMLPurifier_Config::createDefault();
        $config->set('Core.Encoding', 'UTF-8');
        $config->set('HTML.Doctype', 'HTML 4.01 Transitional');
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($str);
    }
    public function index()
    {
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
    public function view()
    {
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

    public function edit()
    {
        if (isset($_GET['act']) && $_GET['act'] == 'save') {
            try {
                if (isset($_POST['content']) && isset($_POST['id']) && (intval($_POST['id'])) > 0) {
                    include '../config/config.php';
                    include '../vendor/Acmu/DB.php';
                    $db = Acmu\Db::getInstance($config);
                    $modifytime = date('Y-m-d H:i:s', time());
                    $stmt = $db->prepare('update notes set title=:title,content = :content, modifytime = :modifytime where id =:id;');
                    $title = cleanHtml($_POST['title']);
                    $content = cleanHtml($_POST['content']);
                    $id = intval($_POST['id']);
                    $stmt->bindParam(":title", $title);
                    $stmt->bindParam(":content", $content);
                    $stmt->bindParam(":modifytime", $modifytime);
                    $stmt->bindParam(":id", $id);
                    $stmt->execute();
                    $db = null;
                    $modifytime = null;
                    $title = null;
                    $content = null;

                }
                $msg = "Success add note, "
                    . "<script>var redirectUrl='view.php?id=" . $id . "';"
                    . "countDown(selfRedirect(redirectUrl), 5000);</script>"
                    . "<a href=\"javascript:selfRedirect(redirectUrl);\">Ok</a>";
                include '../template/msg.html';
                exit();
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        } else {
            if (isset($_GET['id'])) {
                include '../config/config.php';
                include '../vendor/Acmu/DB.php';
                $db = Acmu\Db::getInstance($config);
                $stmt = $db->prepare('SELECT * FROM notes WHERE id = :id;');
                $id = $_GET['id'];
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $note = $stmt->fetch(PDO::FETCH_ASSOC);
                if (stristr($_SERVER['HTTP_USER_AGENT'], 'android') || stristr($_SERVER['HTTP_USER_AGENT'], 'iphone')) {
                    include '../template/edit-mobile.html';
                } else {
                    include '../template/edit.html';
                }
            } else {
                header('location:add.php');
            }
        }


    }

    public function delete()
    {
        if (array_key_exists('id', $_GET) && $_GET['id'] > 0) {
            $id = (int)$_GET['id'];
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

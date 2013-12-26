<?php
if (isset($_GET['action']) && 'dologin' == $_GET['action']) {
	echo 'Ok, you are logged in';
} else {
	include '../template/login.html';
}

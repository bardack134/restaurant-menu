<?php
session_start(); // セッションを開始します

session_destroy(); // 1.セッションを破棄します

// 2.ログインページにリダイレクトします
header('location: login.php');

?>

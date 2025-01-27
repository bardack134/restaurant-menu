<?php
session_start(); // セッションを開始します

session_destroy(); // セッションを破棄します

// ログインページにリダイレクトします
header('location: login.php');

?>

<?php
session_start();
// データベース接続ファイル
include("../conection.php");
if (isset($_GET['name']) && isset($_GET['email'])) {

    $ObjConnection = new conection();
    $name = htmlspecialchars($_GET['name']);
    $email = htmlspecialchars($_GET['email']);

    $sql = "SELECT * FROM reservation WHERE Name=? and Email=?";
    $answer = $ObjConnection->check_reservation($sql, $name, $email);

    echo json_encode($answer, JSON_UNESCAPED_UNICODE);
}

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

    if (!empty($answer)) {
        // echo "<p class='gold-text'>Name:<span style='color:#FFF0DC'>{$answer['Name']}</span></p>";
        // echo "<p class='gold-text'>Email:<span style='color:#FFF0DC'>{$answer['Email']}</span></p>";
        // echo "<p class='gold-text'>Phone:<span style='color:#FFF0DC'>{$answer['Phone']}</span></p>";
        // echo "<p class='gold-text'>Date:<span style='color:#FFF0DC'>{$answer['Date']}</span></p>";
        // echo "<p class='gold-text'>Number of People:<span style='color:#FFF0DC'>{$answer['NumberOfPeople']}</span></p>";
        // echo "<p class='gold-text'>Message:<span style='color:#FFF0DC'>{$answer['Message']}</span></p>";
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($answer, JSON_UNESCAPED_UNICODE);
    } else {
        echo "<p>該当する予約情報が見つかりませんでした。</p>";
    }
}

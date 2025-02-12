<?php
session_start();
// データベース接続ファイル
include("../conection.php");

?>

<!doctype html>
<html lang="en">
<head>
    <title>Restaurant</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fleur+De+Leah&family=Great+Vibes&family=Mea+Culpa&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <form action="" method="post">
        <!-- 名前の入力フィールド -->
        <label for="name">
            <span>名前:</span>
            <input type="text" name="name" id="name" placeholder="名前を入力">
        </label>

        <!-- メールアドレスの入力フィールド -->
        <label for="email">
            <span>メールアドレス:</span>
            <input type="email" name="email" id="email" placeholder="メールアドレスを入力">
        </label>

        <!-- 検索ボタン -->
        <button type="submit" name="action" value="search">検索</button>
    </form>

    <?php
    if (isset($_POST['action']) && $_POST['action'] === 'search') {
        $ObjConnection = new conection();
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        
        $sql = "SELECT * FROM reservation WHERE Name=? and Email=?";
        $answer = $ObjConnection->check_reservation($sql, $name, $email);
        
        if (!empty($answer)) {
            echo "<p>Name: {$answer['Name']}</p>";
            echo "<p>Email: {$answer['Email']}</p>";
            echo "<p>Phone: {$answer['Phone']}</p>";
            echo "<p>Date: {$answer['Date']}</p>";
            echo "<p>Number of People: {$answer['NumberOfPeople']}</p>";
            echo "<p>Message: {$answer['Message']}</p>";
            print_r($answer);
        } else {
            echo "<p>該当する予約情報が見つかりませんでした。</p>";
        }
    }
    ?>

    <footer>
        <!-- フッターの内容 -->
    </footer>
</body>
</html>
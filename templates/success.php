<?php
session_start();
// データベース接続ファイル
include("../conection.php");
?>

<!doctype html>
<html lang="en">
<!-- cambio de prueba -->

<head>
    <title>Restaurant</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS v5.2.1
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> -->

    <!-- font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fleur+De+Leah&family=Great+Vibes&family=Mea+Culpa&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(115deg, #050505 20%, #543A14 98%);

        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: #FFF0DC;
            padding: 30px 30px;
            /* margin: 15px; */
            height: 500px;
            width: 400px;
            box-shadow: 0 0 20px white;
            border-radius: 30px;
        }



        .confirmation {
            font-family: "Great Vibes", "Fleur De Leah", "Mea Culpa", "Tangerine", serif;
            font-weight: 400;
            font-style: normal;
            color: #F0BB78;
            font-size: 60px;
            margin: 5px 0;
            padding-top: 0px;
        }

        .confirmation-text {
            font-family: "Great Vibes", "Fleur De Leah", "Mea Culpa", "Tangerine", serif;
            font-weight: 400;
            font-style: normal;
            color: rgb(0, 0, 0);
            font-size: 30px;

            margin: 5px 0;
            padding-top: 0px;
        }

        .styled {
            border: 0;
            line-height: 2.5;
            padding: 0 25px;
            font-size: 1.1rem;
            text-align: center;
            color: #fff;
            text-shadow: 1px 1px 1px #000;
            border-radius: 10px;
            background-color: #F0BB78;
            cursor: pointer;
            box-shadow:
                inset 2px 2px 3px rgba(255, 255, 255, 0.6),
                inset -2px -2px 3px rgba(0, 0, 0, 0.6);
            text-decoration: none;
        }

        .styled:hover {
            background-color: rgba(255, 0, 0, 1);
        }

        .styled:active {
            box-shadow:
                inset -2px -2px 3px rgba(255, 255, 255, 0.6),
                inset 2px 2px 3px rgba(0, 0, 0, 0.6);
        }
    </style>
</head>

<body>

    <div class="container">

        <img src="imgs/confirmation.png" alt="" width="55%">
        <h1 class="confirmation">Congratulations</h1>

        <p class="confirmation-text">ご予約が完了しました</p>
        <!-- <button class="favorite styled" type="button">Home</button> -->
        <a class="favorite styled" type="button" href="index.php">Home</a>
    </div>
    <?php

    if (isset($_POST['action'])) {
        $ObjConnection = new conection();
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $time = htmlspecialchars($_POST['time']);
        $numberOfPeople = htmlspecialchars($_POST['numberOfPeople']);
        $message = htmlspecialchars($_POST['message']);

        $sql = "SELECT * FROM reservation WHERE Name=? and Email=?";
        $answer = $ObjConnection->check_reservation($sql, $name, $email);
        if ($answer === False) {
            $sql = "INSERT INTO reservation (Name, Email, Phone, Date, NumberOfPeople, Message) VALUES (?, ?, ?, ?, ?, ?)";
            $ObjConnection->reservation_form($sql, $name, $email, $phone, $time, $numberOfPeople, $message);
            header("Location: success.php");
            exit();
        }else {
            $_SESSION['reservation']='data already exist';
            header("Location: index.php");
            
        }

        
    }


    ?>
    <footer>
        <!-- place footer here -->
    </footer>

</body>

</html>
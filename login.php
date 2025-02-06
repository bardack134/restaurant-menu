<?php
//ステップ1 -> セッションは、複数のページ間で使用される情報を（変数に）保存する方法です
session_start();

if ($_POST) { //ステップ2 ->フォームが POST メソッドで送信されたかどうかを確認します。
   
    if ($_POST['user']==='kenschool' && $_POST['password']==='kenschool') {
        //ステップ3 ->フォームで送信された 値が、定義した値 と一致するかを確認します。
        
        $_SESSION['user']='kenschool';
        //ステップ4 -> セッションにユーザー情報を保存します
        header('location:admin.php'); //Finalステップ ->管理者ページへのリダイレクト
    }  
    else {
        
        echo "<script>alert('ユーザー名またはパスワードが間違っています');</script>";
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>

    <main>
        <div class="container py-5">
            <div
                class="row justify-content-center align-items-center g-2">
                <div class="col-md-4">
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            ログイン
                        </div>
                        <div class="card-body">
                            <form action="login.php" method="post">
                                <label for="fname">ユーザー:</label><br>
                                <input class="form-control" type="text" id="fname" name="user"><br>

                                <label for="fname">パスワード:</label><br>
                                <input class="form-control" type="password" id="fname" name="password"><br>

                                <input class="btn btn-success" type="submit" value="管理パネルに入る">
                            </form>
                        </div>
                        <!-- <div class="card-footer text-muted">
                            <br>
                        </div> -->
                    </div>

                </div>
                <div class="col-md-4">
                </div>
            </div>



        </div>
    </main>


    <footer>
        <!-- place footer here -->
    </footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>
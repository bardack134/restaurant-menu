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
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- ダイナミックplayアイコンをインポートするために使用しました -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- font style -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fleur+De+Leah&family=Great+Vibes&family=Mea+Culpa&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="pageDesign ">
    <header class="fixed-top">
        <!-- NAV BAR -->
        <nav class="navbar sticky-top navbar-expand-lg  mt-4" style="background-color: rgba(0, 0, 0, 0.6); ">
            <div class="container-fluid">
                <a class="navbar-brand text-white ps-5 pe-3 fw-bold fs-2" href="#">Cousine</a>
                <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarScroll">
                    <ul class=" nav-underline navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll text-center"
                        style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class=" nav-link  text-white" aria-current="page" href="#">ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white px-5" href="#about">私たちについて</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white px-5" href="#menu">メニュー</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white px-5" href="#">スペシャル</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white px-5" href="#">ギャラリー</a>
                        </li>


                    </ul>
                    <div class="text-end pe-5 text-center">
                        <a class="btn btn-outline-light" onclick="openNav_up_down()">予約を確認する</a>
                        <a class="btn btn-outline-warning" href="#book-a-table">席を予約する</a>

                        <div id="myNav_up_down" class="overlay_up_down">
                            <a class="closebtn" onclick="closeNav_up_down()" style="color: #D8A25E;">&times;</a>
                            <div class="overlay-content">
                                <li class="li-kakukin">
                                    <div class="check_form" >
                                        <!-- 名前の入力フィールド -->
                                        <label for="name" class="block">
                                            <span>名前:</span>
                                            <input type="text" name="name" id="name" placeholder="名前を入力">
                                        </label>

                                        <!-- メールアドレスの入力フィールド -->
                                        <label for="email" class="block">
                                            <span>メールアドレス:</span>
                                            <input type="email" name="email" id="email" placeholder="メールアドレスを入力">
                                        </label>

                                        <!-- 検索ボタン -->
                                        <button style="padding: 5px 40px; font-size: 20px;" onclick="fetchReservation()" class="btn btn-outline-warning">検索</button>
                                    </div>
                                    <div id="result"></div>
                                </li>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <section id="hero" class="text-white backgroundImage ">
            <!-- <img src="https://d2syaugtnopsqd.cloudfront.net/wp-content/uploads/sites/19/2022/03/02193621/heroes-restaurant-brewery-800x533.jpg" alt="Restaurant photo"> -->
            <div class="container col-xxl-8 px-4 py-5">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="container">
                        <div class="row " style="height: 100vh;">
                            <div class="col-lg-8 align-self-center " id="hide-item">
                                <h1 class="display-5 fw-bold   lh-1 mb-3 txt-white">Welcome to <span>cousin</span></h1>
                                <p class="lead txt-white">18年以上にお客様に満足していただいています</p>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                    <a href="#menu" class="mybutton txt-white">メニュー</a>
                                    <a href="#book-a-table" class="mybutton txt-white">席を予約する</a>

                                </div>
                            </div>

                            <!--ステップ1. ユーザーがクリックすると showModal() 関数が呼び出され、モーダルウィンドウが表示されます。 -->
                            <div onclick="showModal()"
                                class="modal-open col-10 col-sm-8 col-lg-3 d-flex align-items-center justify-content-center mt-5 txt-white">
                                <!-- Font Awesomeのplayボタンのアイコンを使用 -->
                                <i class="fa-solid fa-circle-play fa-beat-fade  fa-5x"
                                    style="color: #d8a25e; --fa-animation-duration: 3s;"></i>


                            </div>
                            <!-- モーダルバックグラウンド -->
                            <div id="modal-bg" class="NoDisplayModal">

                            </div>

                            <!-- モーダルコンテナ -->
                            <div id="modal-container" class="NoDisplayModal ">
                                <div class="container">
                                    <!-- ビデオ要素で、再生コントロールを表示 -->
                                    <video controls width="550" src="video/videoplayback.mp4" id="myVideo"></video>
                                </div>
                                <!-- 閉じるアイコン -->
                                <div id="modal-close" onclick="NoShowModal()"><i class="fa-solid fa-xmark fa-2xl"
                                        style="color: #d8a25e;"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="backgroundImage2 mt-1">
            <div class="container col-xxl-8 px-4 py-5 text-white">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-10 col-sm-8 col-lg-6">
                        <img src="imgs/img1.jpg" class="d-block mx-lg-auto img-fluid" alt="レストランのテーマ" height="420"
                            loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="gold-text">レストランの紹介</h1>
                        <p class="lead">
                            私たちのレストランでは、新鮮な食材を使用し、一流のシェフが腕によりをかけて作り上げた料理をお楽しみいただけます。お客様一人ひとりに素晴らしいダイニング体験を提供することを目指しています。
                        </p>
                        <p>
                            私たちのメニューには、多彩な料理が揃っており、季節ごとの特別メニューもご用意しています。また、おしゃれで落ち着いた雰囲気の中で、ゆったりとお食事を楽しんでいただけるよう、心地よい空間を提供しています。
                        </p>
                        <p>
                            ぜひお越しいただき、美味しい料理とともに、素敵なひとときをお過ごしください。
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <section id="why-us" class="why-us ">
            <div class="container myCardTitle">
                <h2><span>なぜ当店を選んだのか</span></h2>
            </div>
            <div class="container">
                <div class="row">
                    <!-- 3つのカードを示するために、 各カードはcol-lg-4クラスを使用して、1行に3つ並ぶようにレイアウトされています。 -->
                    <div class="col-lg-4">
                        <div class="myCard mb-2 ">
                            <!-- カードの番号 -->
                            <span
                                class="myTransition">01</span>
                            <!-- カードのタイトルを表示します。 -->
                            <h4 class="myTransition">新鮮な食材</h4>
                            <!-- カードの説明文を表示します。 -->
                            <p class="card-text">当店では毎日新鮮な食材を使用し、美味しさと健康を追求しています。地元の農家から直送される旬の食材を活かした料理をお楽しみいただけます。</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2  ">
                        <div class="myCard ">
                            <span class="myTransition my-5">02</span>
                            <h4 class="myTransition">素晴らしい雰囲気</h4>
                            <p class="card-text">温かみのあるインテリアと心地よい音楽が、特別な時間を演出します。デートや家族の集まり、友人との楽しいひとときを過ごすのに最適な場所です。
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-2">
                        <div class="myCard ">
                            <span class="myTransition pb-5 mb-5">03</span>
                            <h4 class="myTransition">おもてなしの心</h4>
                            <p class="card-text">スタッフ一同、心を込めたおもてなしでお迎えいたします。お客様一人ひとりのご要望にお応えし、最高のサービスをご提供いたします。</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ステップ1:HTML構造, CSS-->
        <section id="menu">
            <div class="container text-white py-5 text-center" style="background-color: black;">
                <!-- セクションのタイトル -->
                <h2 class="gold-text">メニューをご覧ください</h2>

                <!-- pantallas medianas y grandes -->
                <!-- d-none d-lg-blockクラスを使用して、画面幅が大きい場合（992px以上）にのみ表示されます。 -->

                <!-- <div class="d-none d-lg-block  "> -->
                <!-- メニュー項目をリスト形式で表示します -->
                <!-- <ul class="menu-nav-bar d-flex justify-content-center"> -->
                <!-- 初期表示では「All」がアクティブでGoldカラーに表示される。 -->
                <!-- <li onclick="seekItem(event)" class="menu-link active nav-item" id="'*'">All</li> -->
                <!-- クリック時にJavaScript関数seekItemを呼び出します。 -->
                <!-- <li onclick="seekItem(event)" class="menu-link nav-item" id="main">Main</li> -->
                <!-- <li onclick="seekItem(event)" class="menu-link nav-item" id="drinks">Drinks</li> -->
                <!-- <li onclick="seekItem(event)" class="menu-link nav-item" id="dessert">Desserts</li> -->
                <!-- </ul> -->
                <!-- </div> -->

                <!-- menu para pantallas pequenas -->
                <div id="myNav" class="overlay">
                    <a class="closebtn" onclick="closeNav()" style="color: #D8A25E;">&times;</a>
                    <div class="overlay-content ">
                        <li class="li-food-items" onclick="seekItem(event) " id="'*'">All</li>
                        <li class="li-food-items" onclick="seekItem(event) " id="main">Main</li>
                        <li class="li-food-items" onclick="seekItem(event) " id="drinks" class="drinks">Drinks</li>
                        <li class="li-food-items" onclick="seekItem(event) " id="dessert">Desserts</li>
                    </div>
                </div>


                <span class="dontShow hamburger" onclick="openNav()">&#9776; open</span>

            </div>


            <!-- Contenedor del menú -->
            <div class="container ">
                <p id="category" style="color: #FFF0DC; " class="text-center text-capitalize">

                </p>
                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-4" id="MyMenuItems">


                </div>
            </div>
            </div>
        </section>


        <section id="book-a-table">

            <div class="form-title">
                <h2 class="gold-text">席を予約</h2>
            </div>
            <div class="book-a-table">
                <div class="form-container">
                    <?php
                    // 'reservation' セッション変数が設定されているかを確認
                    if (isset($_SESSION['reservation'])) {
                        // 設定されている場合は、JavaScriptアラートを出力
                        echo "<script>alert('すでに名前とメールアドレスで予約があります');</script>";

                        // セッションを破棄して、アラートがもう一度表示されないようにする
                        unset($_SESSION['reservation']);
                    }
                    ?>


                    <form action="success.php" method="post">
                        <div class="form-block ">
                            <div class="input-data">
                                <!-- <input required type="email" name="name" id="email"> -->
                                <input required type="text" name="name" id="name">
                                <div class="underline"></div>
                                <label class="" for="name">Name</label>
                            </div>
                            <div class="input-data">
                                <input required type="email" name="email" id="email">
                                <div class="underline"></div>
                                <label class="" for="email">Email</label>
                            </div>
                            <div class="input-data">
                                <input required type="tel" name="phone" id="phone">
                                <div class="underline"></div>
                                <label class="" for="phone">Phone</label>
                            </div>
                            <div class="input-data">
                                <input required type="datetime-local" name="time" id="time" class="custom-datetime">

                                <div class="underline"></div>
                                <label class="" for="time"></label>
                            </div>
                            <div class="input-data">
                                <input required type="number" name="numberOfPeople" id="numberOfPeople">
                                <div class="underline"></div>
                                <label class="" for="numberOfPeople">Number Of People</label>
                            </div>
                            <div class="input-data textarea">
                                <textarea required name="message" id="" cols="30" rows="10"></textarea>
                                <div class="underline"></div>
                                <label class="" for="message">Message</label>
                            </div>
                            <div class="input-data ">
                                <div class=" submit-btn">
                                    <button type="submit" name="action" value="reservation-info" class="submit-button">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>



                </div>
            </div>


        </section>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- my scripts  -->
    <script src="scripts.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <!-- Bootstrap Scripts -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script> -->

</body>

</html>
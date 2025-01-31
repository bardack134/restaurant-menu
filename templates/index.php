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

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">


</head>

<body class="pageDesign">
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
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class=" nav-underline navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
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
                        <li class="nav-item text-center">
                            <a class="nav-link text-white px-5" href="#">お問い合わせ</a>
                        </li>

                    </ul>
                    <div class="text-end pe-5">
                        <a class="btn btn-outline-warning" href="#book-a-table">席を予約する</a>
                        <!-- <button type="button" class="btn btn-outline-warning">席を予約する</button> -->
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
                                    <!-- <button type="button" class="btn btn-outline-warning btn-lg px-5 me-md-2">Primary</button>
                  <button type="button" class="btn btn-outline-warning btn-lg px-5">Default</button> -->
                                </div>
                            </div>


                            <div onclick="showModal()"
                                class="modal-open col-10 col-sm-8 col-lg-3 d-flex align-items-center justify-content-center mt-5 txt-white">
                                <i class="fa-solid fa-circle-play fa-beat-fade  fa-5x"
                                    style="color: #d8a25e; --fa-animation-duration: 3s;"></i>
                                <!-- https://youtu.be/xPPLbEFbCAo -->
                            </div>
                            <div id="modal-bg" class="NoDisplayModal">

                            </div>

                            <div id="modal-container" class="NoDisplayModal ">
                                <div class="container">
                                    <!-- <p><iframe width="560" height="315" src="https://www.youtube.com/embed/kRCH8kD1GD0?si=lcrZ_UXmbKar6keM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                    </p>        -->
                                    <video controls width="550" src="video/videoplayback.mp4" id="myVideo"></video>
                                </div>
                                <div id="modal-close" onclick="NoShowModal()"><i class="fa-solid fa-xmark fa-2xl"
                                        style="color: #d8a25e;"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about " class=" backgroundImage2 mt-1 border  border-5 border-dark">
            <div class="myContainer col-xxl-8 px-4 py-5 txt-white">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5 ">
                    <div class="col-10 col-sm-8 col-lg-6">

                        <img src="imgs/img1.jpg" class="" alt="レストランのテーマ" height="420" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="">レストランの紹介</h1>
                        <p class="lead">
                            私たちのレストランでは、新鮮な食材を使用し、一流のシェフが腕によりをかけて作り上げた料理をお楽しみいただけます。お客様一人ひとりに素晴らしいダイニング体験を提供することを目指しています。
                        </p>
                        <p>私たちのメニューには、多彩な料理が揃っており、季節ごとの特別メニューもご用意しています。また、おしゃれで落ち着いた雰囲気の中で、ゆったりとお食事を楽しんでいただけるよう、心地よい空間を提供しています。
                        </p>
                        <p>ぜひお越しいただき、美味しい料理とともに、素敵なひとときをお過ごしください。</p>

                        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">プライマリ</button>
                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">デフォルト</button>
                  </div> -->
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
                    <div class="col-lg-4">
                        <div class="myCard">
                            <span class="myTransition">01</span>
                            <h4 class="myTransition">新鮮な食材</h4>
                            <p class="card-text">当店では毎日新鮮な食材を使用し、美味しさと健康を追求しています。地元の農家から直送される旬の食材を活かした料理をお楽しみいただけます。</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="myCard">
                            <span class="myTransition">02</span>
                            <h4 class="myTransition">素晴らしい雰囲気</h4>
                            <p class="card-text">温かみのあるインテリアと心地よい音楽が、特別な時間を演出します。デートや家族の集まり、友人との楽しいひとときを過ごすのに最適な場所です。
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="myCard">
                            <span class="myTransition pb-5 mb-5">03</span>
                            <h4 class="myTransition">おもてなしの心</h4>
                            <p class="card-text">スタッフ一同、心を込めたおもてなしでお迎えいたします。お客様一人ひとりのご要望にお応えし、最高のサービスをご提供いたします。</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="menu" class="">
            <div class="myContainer-menu">
                <h2 class="gold-text">メニューをご覧ください</h2>
                <!-- filter buttons-->
                <div class="white-text menu-nav-bar">
                    <ul>
                        <li onclick="seekItem(event)" class="nav-item active" id="'*'">All</li>
                        <li onclick="seekItem(event)" class="nav-item" id="main">Main</li>
                        <li onclick="seekItem(event)" id="drinks" class="drinks">Drinks</li>
                        <li onclick="seekItem(event)" class="nav-item" id="dessert">Desserts</li>
                    </ul>
                </div>
                <!-- menu items -->
                <div>
                    <div id="MyMenuItems">

                    </div>
                    <!-- <div class="menu-items col-lg-6 col-sm-12">
                            <img src="https://www.mystoryinrecipes.com/uploads/4/4/9/3/44938739/5321015_orig.jpg"
                                alt="Twin cannoli" class="photo">
                            <div class="menu-info">
                                <div class="menu-title">
                                    <h4>name</h4>
                                    <span class="price">$price</span>
                                </div>
                                <div class="menu-text">description
                                </div>
                            </div>
                        </div> -->




                    <!-- <div class="display-row">
                        <div class="menu-items col-lg-6 col-sm-12">
                            <img src="https://www.mystoryinrecipes.com/uploads/4/4/9/3/44938739/5321015_orig.jpg"
                                alt="Twin cannoli" class="photo">
                            <div class="menu-info">
                                <div class="menu-title">
                                    <h4>Twin Cannoli</h4>
                                    <span class="price">$7.00</span>
                                </div>
                                <div class="menu-text">Two crisp cannoli shells filled with our house made chocolate
                                    chip
                                    ricotta cannoli cream.
                                </div>
                            </div>
                        </div>
                        <div class="menu-items col-lg-6 col-sm-12">
                            <img src="https://www.mystoryinrecipes.com/uploads/4/4/9/3/44938739/5321015_orig.jpg"
                                alt="Twin cannoli" class="photo">
                            <div class="menu-info">
                                <div class="menu-title">
                                    <h4>Twin Cannoli</h4>
                                    <span class="price">$7.00</span>
                                </div>
                                <div class="menu-text">Two crisp cannoli shells filled with our house made chocolate
                                    chip
                                    ricotta cannoli cream.
                                </div>
                            </div>
                        </div>
                        
                    </div> -->
                </div>
            </div>

        </section>

        <section id="book-a-table">

            <div class="form-title">
                <h2 class="gold-text">席を予約</h2>
            </div>
            <div class="book-a-table">
                <div class="form-container">
                    <div class="form-block">
                        <form action="" method="post">
                            <div class="form-block">
                            <div class="input-data">
                                    <!-- <input required type="email" name="name" id="email"> -->
                                    <input type="text" name="name" id="name">
                                    <div class="underline"></div>
                                    <label class="" for="name">Name</label>
                                </div>
                                <div class="input-data">
                                    <input required type="email" name="email" id="email" >
                                    <div class="underline"></div>
                                    <label class="" for="email" >Email</label>
                                </div>
                                <div class="input-data">
                                    <input required type="tel" name="phone" id="phone">
                                    <div class="underline"></div>
                                    <label class="" for="phone">Phone</label>
                                </div>
                                <div class="input-data">
                                    <input required type="datetime-local" name="time" id="time">
                                    <div class="underline"></div>
                                    <label class="" for="time"></label>
                                </div>
                                <div class="input-data">
                                    <input required type="number" name="numberOfPeople" id="numberOfPeople">
                                    <div class="underline"></div>
                                    <label class="" for="numberOfPeople">Number Of People</label>
                                </div>
                                <div class="input-data textarea">
                                    <textarea required name="" id="" cols="30" rows="10"></textarea>
                                    <div class="underline"></div>
                                    <label class="" for="message">Message</label>
                                    <div class="form-block submit-btn">
                                        <div class="input-data">
                                            <div class="inner"></div>
                                            <input type="submit" value="submit">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
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
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script> -->
</body>

</html>
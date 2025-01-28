<?php include("conexion.php"); ?>

<?php
$ObjConnection = new conexion();


$sql = "SELECT * FROM projects ";

$projects = $ObjConnection->consult($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ricardo Gomez</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="style.css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Ricardo Gomez</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="imagenes/me.jpg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">自己紹介</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">経験</a></li>
                <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li> -->
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">スキル</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">興味</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content container  text-center text-sm-start">
                <h1 class="mb-3">
                    Ricardo <span class="text-primary">Gomez</span>
                </h1>
                <div class="container d-block d-sm-none " >
                    <img  style="height: 300px;" src="imagenes/me.jpg" class="img-thumbnail" alt="...">
                </div>
                <div class="subheading mb-5 mt-3
                  ">
                    ウェブ開発者
                </div>
                <p class="lead mb-5">私のことをもっと知りたければ…</p>
                <div class="social-icons">
                    <a class="social-icon" target="_blank" href="https://www.linkedin.com/in/ricardo-antonio-gomez-villalobos-659369296/"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" target="_blank" href="https://github.com/bardack134"><i class="fab fa-github"></i></a>
                    <a class="social-icon" target="_blank" href="https://www.instagram.com/ricardogomez902?utm_source=qr&igsh=MTlwdWQ0eXd4emNjcw=="><i class="fab fa-instagram"></i></a>

                    <a class="social-icon" target="_blank" href="https://www.facebook.com/antonio.villalobos.3705/"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Start Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-2  text-center text-sm-start">プロジェクト</h2>
                <p class="text-primary fw-bold mb-5">注意: このポートフォリオにあるプロジェクトは無料のサーバーにホストされているため、通常よりも読み込みに時間がかかる場合があります。遅延が発生したり、ページが表示されない場合は、ページを更新してみてください。ご理解いただきありがとうございます！</p>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach ($projects as $project) {  ?>
                        <div class="col">
                            <div class="card  h-100">
                                <a href="<?php echo $project['url']; ?>" target="_blank" rel="noopener noreferrer">
                                    <img src="imagenes/<?php echo $project['image']; ?>" style="height: 200px;" class="card-img-top" alt="...">
                                </a>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php echo $project['name']; ?></h5>
                                    <p class="card-text"><?php echo $project['description']; ?></p>
                                    <a href="<?php echo $project['url']; ?>" target="_blank" rel="noopener noreferrer"><?php echo $project['url']; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </section>
        <hr class="m-0" />
        <!-- Finish Experience-->

        <!-- Education-->
        <!-- <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">Education</h2>
                <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">Alas Peruanas University</h3>
                        <div class="subheading mb-3">System Engineer</div>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">2006-2011</span></div>
                </div>
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">TECSUP INSTITUTE</h3>
                        <div class="subheading mb-3">Networking and Communications</div>
                    </div>
                    <div class="flex-shrink-0"><span class="text-primary">2000 - 2002</span></div>
                </div>
            </div>
        </section> -->
        <hr class="m-0" />
        <!-- Skills-->
        <section class="resume-section  text-center text-sm-start " id="skills">
            <div class="resume-section-content ">
                <h2 class="mb-5 ">スキル</h2>
                <div class="subheading mb-3">プログラミング言語とツール</div>
                <ul class="list-inline dev-icons">
                    <li class="list-inline-item"><i class="fab fa-html5"></i> </li>
                    <li class="list-inline-item"><i class="fab fa-css3-alt"></i> </li>
                    <li class="list-inline-item"><i class="fas fa-database"></i> </li>
                    <li class="list-inline-item"><i class="fab fa-bootstrap"></i> </li>

                    <li class="list-inline-item"><i class="fab fa-python"></i></li>
                    <li class="list-inline-item"><i class="fab fa-php"></i></li>
                </ul>
                <div class="subheading mb-3">言語</div>
                <ul class="fa-ul mb-0 ">
                    <li>
                        <span class="fa-li"><i class="fas fa-check"></i></span>
                        スペイン語
                    </li>
                    <li>
                        <span class="fa-li"><i class="fas fa-check"></i></span>
                        英語
                    </li>
                    <li>
                        <span class="fa-li "><i class="fas fa-check "></i></span>
                        日本語 (JLPT N2)
                    </li>
                </ul>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Interests-->
        <section class="resume-section  text-center text-sm-start" id="interests">
            <div class="resume-section-content">
                <h2 class="mb-5">興味</h2>
                <p>ウェブ開発者であることに加えて、日本語, 日本の文化、日本の歴史を学ぶのが好きです</p>

            </div>
        </section>
        <hr class="m-0" />

    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
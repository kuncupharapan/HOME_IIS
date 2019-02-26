<!doctype html>
<html lang="en">
    <head>
        <title>Pusat Teknologi Industri Pertahanan dan Keamanan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>images/home_iis_logo.png"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>bootstrap/css/bootstrap.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>scss/carousel.css"/>
        <!--<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>scss/signin.css"/>-->
        <script defer src="<?php echo base_url() ?>images/fontawesome/svg-with-js/js/fontawesome-all.js"></script>
    </head>
    <body class="text-center">
        <header>
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-info">
                <a class="navbar-brand" href="#">
                    <img class="rounded-circle" src="<?php echo base_url() ?>images/home_iis_logo_white_bg.png" alt="home-iis logo" width="40" height="40"> 
                    HOME-IIS
                </a>
            </nav>
        </header>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div id="myCarousel" class="carousel slide bg-dark" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner bg-dark">
                            <div class="carousel-item active">
                                <img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
                                <div class="container">
                                    <div class="carousel-caption text-left">
                                        <h1>Example headline.</h1>
                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1>Another example headline.</h1>
                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
                                <div class="container">
                                    <div class="carousel-caption text-right">
                                        <h1>One more for good measure.</h1>
                                        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                        <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 shadow-sm p-3 mb-5 rounded">
                    <form class="form-signin">
                        <h1 class="h6 mb-3 font-weight-normal text-info"><strong>HANKAM Office Management And Engineering Integrated Information System</strong></h1>
                        <h1 class="mb-3 font-weight-normal text-white" style="font-size: 10pt">Silahkan masuk dengan akun BPPT</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <label class="sr-only" for="inputUser">Username</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="inputUser" placeholder="Pengguna" required autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <label class="sr-only" for="inputPassword">Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                                    </div>
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Kata Kunci" required>
                                </div>
                            </div>
                        </div>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-sm btn-outline-primary btn-info" type="submit">Sign in</button>
                        <address class="text-muted" style="padding-top: 5rem; font-size: 10pt"><strong>Pusat Teknologi Industri Pertahanan dan Keamanan</strong><br>
                            Gedung 256-Rekayasa Teknologi Hankam, Kawasan Puspiptek, Serpong<br>
                            Tangerang Selatan 15314<br>
                            <i class="fas fa-phone-square"></i>&nbsp;021-75791262&nbsp;<i class="fas fa-fax"></i>&nbsp;021-75791285
                        </address>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <span class="text-muted"><span class="text-muted">Tim Pengembangan SI-TI PTIPK &copy; 2018-2019</span></span>
            </div>
        </footer>
    </body>
    <script type="text/javascript" src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url() ?>js/jquery-3.3.1.min.js"><\/script>')</script>
    <script type="text/javascript" src="<?php echo base_url() ?>bootstrap/js/bootstrap.bundle.js"></script>
</html>
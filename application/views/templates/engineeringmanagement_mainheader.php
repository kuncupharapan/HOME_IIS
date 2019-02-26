<!doctype html>
<html lang="en">
    <head>
        <title>Pusat Teknologi Industri Pertahanan dan Keamanan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>images/home_iis_logo.png"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/custom.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/<?php echo $main ?>.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/<?php echo $scss ?>.css"/>
        <?php
        if (isset($treantmaster)) {
            echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"" . base_url() . "css/treant.css\"/>";
            echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"" . base_url() . "css/basic-example.css\"/>";
        }
        if (isset($wordeditor)) {
            echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"" . base_url() . "quill/quill.snow.css\"/>";
        }
        if (isset($datepicker)) {
           // echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"" . base_url() . "css/zebra_datepicker.css\"/>";
             echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"" . base_url() . "bootstrap/css/bootstrap-datetimepicker.css\"/>";
        }
        if (isset($autocomplete)){
            echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"" . base_url() . "js/jquery-ui/jquery-ui.css\"/>";
        }
        ?>
        <script defer src="<?php echo base_url() ?>images/fontawesome/svg-with-js/js/all.js"></script>
        <?php
        if (isset($highcharts)) {
            echo "<script defer src=\"" . base_url() . "js/" . $highcharts . ".js\"></script>";
        }
        ?>

    </head>
    <body>
        <header class="navbar svgbg navbar-expand flex-column flex-md-row bd-navbar">
            <div class="d-flex p-0 mr-2 mr-md-2" style="box-shadow:0 8px 5px -4px black">
                <a class="navbar-brand mr-0 p-2 bg-t1bluedark text-t1bluelight rounded" style="font-weight: 750" href="#">
                    <img class="rounded-circle" src="<?php echo base_url() ?>images/home_iis_logo_white_bg.png" alt="home-iis logo" width="30" height="30"> 
                    <strong class="px-1 rounded">HOME-IIS</strong>
                </a>
            </div>

            <div class="navbar-nav-scroll flex-column flex-md-row">
                <ul class="navbar-nav bd-navbar-nav flex-row flex-md-row">
                    <li class="nav-item active">
                        <a class="nav-link <?php $active = ($activemenu == "home") ? "active" : "";
        echo $active ?>" data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo site_url() ?>"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php $active = ($activemenu == "pp") ? "active" : "";
        echo $active ?>" data-toggle="tooltip" data-placement="bottom" title="Personal Page" href="<?php echo site_url() ?>/personal_page"><i class="fas fa-user-circle"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php $active = ($activemenu == "conv") ? "active" : "";
        echo $active ?>" data-toggle="tooltip" data-placement="bottom" title="Conversation" href="#"><i class="fas fa-comment-dots"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php $active = ($activemenu == "app") ? "active" : "";
        echo $active ?>" data-toggle="tooltip" data-placement="bottom" title="Applications" href="<?php echo site_url() ?>/applications""><i class="fas fa-suitcase"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php $active = ($activemenu == "set") ? "active" : "";
        echo $active ?>" data-toggle="tooltip" data-placement="bottom" title="General Setting" href="#"><i class="fas fa-cog"></i></a>
                    </li>                        
                </ul>
            </div>
            <div class="p-0 m-0 d-flex nav-signout-icon">
                <small class="d-sm-flex justify-content-center align-content-center p-1 bd-nav-signout border border-tlyellowFEFE33 bg-tlpurple2A0934 text-tlyellowF7F7D4 rounded text-center">keluar</small>
            </div>
        </header>
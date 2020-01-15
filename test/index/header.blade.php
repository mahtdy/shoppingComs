<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Webmarket HTML Template - Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusThemes">


    <!-- Twitter Bootstrap -->
    <link href="<?= Url('themes/1/stylesheets/bootstrap.css') ;?>" rel="stylesheet">
    <link href="<?= Url('themes/1/stylesheets/responsive.css') ;?>" rel="stylesheet">
    <!-- Slider Revolution -->
    <link rel="stylesheet" href="<?= Url('themes/1/js/rs-plugin/css/settings.css') ;?>" type="text/css"/>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="<?= Url('themes/1/js/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css') ;?>" type="text/css"/>
    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="<?= Url('themes/1/js/prettyphoto/css/prettyPhoto.css')  ;?>" type="text/css"/>
    <!-- main styles -->

    <link href="<?=  Url('themes/1/stylesheets/main.css') ;?>" rel="stylesheet">



    <!-- Modernizr -->
    <script src="<?=  Url('themes/1/js/modernizr.custom.56918.js') ;?>"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=  Url('themes/1/images/apple-touch/144.png') ;?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= Url('themes/1/images/apple-touch/114.png') ;?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=  Url('themes/1/images/apple-touch/72.png') ;?>">
    <link rel="apple-touch-icon-precomposed" href="<?=  Url('themes/1/images/apple-touch/57.png') ;?>">
    <link rel="shortcut icon" href="<?=  Url('themes/1/images/apple-touch/57.png') ;?>">
    @yield('head')
</head>

<!--  it is possible to select patterns between 1 and 12: pattern-1, pattern-2 etc.  -->
<body class="boxed pattern-10">

<div class="master-wrapper">

    <!--  ==========  -->
    <!--  = Header =  -->
    <!--  ==========  -->
    <header id="header">
        <div class="container">
            <div class="row">

                <!--  ==========  -->
                <!--  = Logo =  -->
                <!--  ==========  -->
                <div class="span7">
                    <a class="brand" href="index.html">
                        <img src="<?=  Url('themes/1/images/logo.png') ;?>" alt="Webmarket Logo" width="48" height="48" />
                        <span class="pacifico">Webmarket</span>
                        <span class="tagline">قالب فروشگاهی HTML قدرتمند</span>
                    </a>
                </div>

                <!--  ==========  -->
                <!--  = Social Icons =  -->
                <!--  ==========  -->
                <div class="span5">
                    <div class="topmost-line">
                        <div class="lang-currency">
                            <div class="dropdown js-selectable-dropdown">
                                <a data-toggle="dropdown" class="selected" href="#"><span class="js-change-text"><i class="famfamfam-flag-gb"></i> انگلیسی (EN)</span> <b class="caret"></b></a>
                                <!-- for all available country flags look the styles in lib/components/_flags.scss -->
                                <ul class="dropdown-menu js-possibilities" role="menu" aria-labelledby="dLabel">
                                    <li><a href="#"><i class="famfamfam-flag-gb"></i> انگلیسی (EN)</a></li>
                                    <li><a href="#"><i class="famfamfam-flag-si"></i> اسلوانیایی (SI)</a></li>
                                    <li><a href="#"><i class="famfamfam-flag-de"></i> آلمانی (DE)</a></li>
                                    <li><a href="#"><i class="famfamfam-flag-fr"></i> فرانسوی (FR)</a></li>
                                    <li><a href="#"><i class="famfamfam-flag-es"></i> اسپانیولی (ES)</a></li>
                                </ul>
                            </div>
                            <div class="dropdown js-selectable-dropdown">
                                <a data-toggle="dropdown" class="selected" href="#"><span class="js-change-text">USD ($)</span> <b class="caret"></b></a>
                                <ul class="dropdown-menu js-possibilities" role="menu" aria-labelledby="dLabel">
                                    <li><a href="#">USD ($)</a></li>
                                    <li><a href="#">EUR (€)</a></li>
                                    <li><a href="#">YEN (¥)</a></li>
                                    <li><a href="#">GBP (£)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="top-right">
                        <div class="icons">
                            <a href="http://www.facebook.com/ProteusNet"><span class="zocial-facebook"></span></a>
                            <a href="skype:primozcigler?call"><span class="zocial-skype"></span></a>
                            <a href="https://twitter.com/proteusnetcom"><span class="zocial-twitter"></span></a>
                            <a href="http://eepurl.com/xFPYD"><span class="zocial-rss"></span></a>
                            <a href="#"><span class="zocial-wordpress"></span></a>
                            <a href="#"><span class="zocial-android"></span></a>
                            <a href="#"><span class="zocial-html5"></span></a>
                            <a href="#"><span class="zocial-windows"></span></a>
                            <a href="#"><span class="zocial-apple"></span></a>
                        </div>
                        <div class="register">
                            <a href="<?=  Url('/login') ;?>" role="button" data-toggle="modal">ورود</a> یا
                            <a href="<?=  Url('/register') ;?>" role="button" data-toggle="modal">ثبت نام</a>
                        </div>
                    </div>
                </div> <!-- /social icons -->
            </div>
        </div>
    </header>

    <!--  ==========  -->
    <!--  = Main Menu / navbar =  -->
    <!--  ==========  -->
    <div class="navbar navbar-static-top" id="stickyNavbar">
        <div class="navbar-inner">
            <div class="container">
                <div class="row">
                    <div class="span9">
                        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!--  ==========  -->
                        <!--  = Menu =  -->
                        <!--  ==========  -->
                        <div class="nav-collapse collapse">
                            <ul class="nav" id="mainNavigation">
                                @yield('menu')
                            </ul>

                            <!--  ==========  -->
                            <!--  = Search form =  -->
                            <!--  ==========  -->
                            <form class="navbar-form pull-right" action="#" method="get">
                                <button type="submit"><span class="icon-search"></span></button>
                                <input type="text" class="span1" name="search" id="navSearchInput">
                            </form>
                        </div><!-- /.nav-collapse -->
                    </div>

                    <!--  ==========  -->
                    <!--  = Cart =  -->
                    <!--  ==========  -->
                    <div class="span3" id="cart">
                        @yield('cart')
                    </div> <!-- /cart -->
                </div>
            </div>
        </div>
    </div> <!-- /main menu -->




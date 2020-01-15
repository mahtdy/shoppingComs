<!DOCTYPE html>
<?include('Browser.php');
$browser = new Browser();
if( $browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getVersion() <= 40 ) {
   echo '<div class="alert alert-warning" style="position: absolute;width: 100%;z-index: 100;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>هشدار!</strong> لطفا مرورگر خود را به روز نمایید<br>
  <a target="_blank" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/https://www.google.com/intl/fa/chrome/browser/desktop/">لینک دانلود</a>
</div>';
}
if( $browser->getBrowser() == Browser::BROWSER_FIREFOX && $browser->getVersion() <= 40 ) {
   echo '<div class="alert alert-warning" style="position: absolute;width: 100%;z-index: 100;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>هشدار!</strong> لطفا مرورگر خود را به روز نمایید<br>
  <a target="_blank" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/https://www.mozilla.org/en-US/firefox/all/">لینک دانلود</a>
</div>';
}
if( $browser->getBrowser() == Browser::BROWSER_IE && $browser->getVersion() <= 9 ) {
   echo '<div class="alert alert-warning" style="position: absolute;width: 100%;z-index: 100;">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>هشدار!</strong> لطفا مرورگر خود را به روز نمایید<br>
  <a target="_blank" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/http://windows.microsoft.com/en-us/internet-explorer/download-ie">لینک دانلود</a>
</div>';
} 
if($defult_site!='main')
$root='../';else
$root='';	
$now=time();
session_start();
$la=$defult_lang;
$site=$defult_site;
include "languages/$la.php";
$tem=$tem_name;
?> 
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>آبادیس</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Start css files-->
    <link href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/bootstrap.min.css">
    <link href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/bootstrap-theme.css" type="text/css" rel="stylesheet">
    <link href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/stylse.css" type="text/css" rel="stylesheet">
    <link href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/video-js.css" type="text/css" rel="stylesheet">
    <link href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/video-js.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/theme.css">
    <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/demo.css">
    <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/style2.css">
    <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/public.css">
    <link href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/main.css" rel="stylesheet">
    <link href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/style3.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/sm-core-css.css">
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/sm-mint.css">
    <!-- End css files-->
</head>
<body>

<!-- Start header -->
<header class="container-fluid">
    <div class="social_networks">
        <div class="container-fluid">
        <div class="new-post">
            <div class="new-post-slide">
                <div id="sidebar">
                    <div class="sidebar-data">
                        <div class="green">
                                <div class="col-md-12 centered">
                                <div id="nt-example1-container">
                                    <i class="fa fa-arrow-up hvr-grow" id="nt-example1-prev"></i>
                                    <ul id="nt-example1">
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                    </ul>
                                    <i class="fa fa-arrow-down hvr-grow" id="nt-example1-next"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="sidebar-btn">
                        <h3>
                            22
                            <br><span class="new-post-text">
                جدید
            </span>  </h3>
                    </div>
                </div>
                </div>
        </div>
        <section class="top container">
            <div class="col-md-6 top-menu rtl animated fadeIn pr0 pull-right">
                <ul style="margin-right: 10px">
                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">صفحه نخست</a></li>
                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">تایپوگرافی</a></li>
                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">برای نمونه</a></li>
                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">تماس با ما</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-xs-12" style="padding-left: 0">
                <div class="sr-login pull-left" >
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/Flag_of_Iran.svg.png" alt="" style="width:20px; height: 20px">
                    </a>
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/175px-Flag_of_the_United_Kingdom_(3-5).svg.png" alt="" style="width:20px; height: 20px">
                    </a>
                    <i class="fa fa-user" aria-hidden="true" style="float: none"></i>

                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" data-toggle="modal" data-target="#myModal" class="sr-membership">
                        ورود
                    </a>
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="sr-membership">
                         | عضویت
                    </a>

                    <!-- Modal1 -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModal1Label">
                                        اطلاعات کاربری
                                    </h4>
                                </div>
                                <div class="modal-body">

                                    <div class="sr-login-form">
                                        <form>
                                            <div class="form-group">
                                                <div class="required">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <input type="text" class="form-control1" id="username" placeholder="نام کاربری ">
                                            </div>
                                            <div class="form-group">
                                                <div class="required">
                                                    <i class="fa fa-lock"></i>
                                                </div>

                                                <input type="text" class="form-control1" id="password" placeholder="رمز ورود ">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4 pull-left ">
                                                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>//new_dynamics/captcha.php" style="width:73%">
                                                    </div>
                                                    <div class="col-md-8 pull-right ">
                                                        <input name="modal_com1_captcha" class="form-control2" placeholder="کد امنيتي" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-numeric="true" data-fv-numeric-message="اين فيلد عددي است">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class=" btn-danger sr-login-button">
                                                ورود
                                            </button>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="sr-forget-password">
                                                <p>
                                                    رمز عبور خود را فراموش کرده اید ؟
                                                </p>
                                            </a>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </div>
    <div class="logo container">
        <div class="main-logo col-xs-12 pull-right">
            <div  class="img-logo col-lg-2 col-sm-2 col-xs-6">
                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/Abadis%20(1).png">
            </div>
            <div class="square-bar col-sm-1 col-xs-6">
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">

                    <div class="btn-group">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="glyphicon glyphicon-th" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu main-menu">
                            <li>
                                <i class="icon-comslogo" aria-hidden="true"></i>
                            </li>


                        </ul>
                    </div>


                </a>

            </div>
            <div class="quotes col-sm-4 col-xs-12 hidden-xs hidden-sm">
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                </p>
            </div>
        </div>
    </div>
    <!--mainmenu-->
    <div class="col-lg-12 col-md-12 col-sm-12 mainmenu container">
        <div class=" container">
            <div class=" mico float-n">
                <div class="main_icons_sheet">
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" id="menu-button" class="collapsed">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>

                    <nav id="main-nav" role="navigation">
                        <ul id="main-menu" class="sm sm-rtl sm-mint collapsed">
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                خدمات
                            </a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                امور مشتریان
                            </a>
                                <ul>
                                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                        تعرفه ها
                                    </a></li>
                                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                        پشتیبانی
                                    </a></li>
                                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                        امور نماینده ها
                                    </a>
                                        <ul>
                                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                درباره ما
                                            </a></li>
                                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                زیر منو
                                            </a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"> تعرفه ها</a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">پشتیبانی</a>
                                <ul>
                                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">پشتیبانی</a></li>
                                    <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">انجمن ها</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">امور نمایندگی</a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">درباره ما</a></li>
                            <li class="search-input">
                                <form class="navbar-form navbar-left" role="search">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="جستجو...">
                                    </div>
                                    <button type="submit" class="btn btn-success sr-search-btn">جستجو</button>
                                </form>

                            </li>
                        </ul>
                    </nav>
                    <ul class="nav nav-tabs sr-main-nav container ">

                        <li class="dropdown dd_static" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p class="mico_title animated zoomIn">
                                    <span class="fa fa-sort-down"></span>
                                    اخبار
                                </p>
                            </a>
                            <ul class="dropdown-menu fullwidth msubmenu pnumber">
                                <li>
                                    <div class="row col-lg-12 submenu-part">
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                    </div>
                                    <div class="row col-lg-12 sr-submenu-link">
                                        <ul>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    موبایل
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    راهنمای خرید لپ تلپ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    تبلت
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    دوربین
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    گجت
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown dd_static" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p class="mico_title animated zoomIn">
                                    <span class="fa fa-sort-down"></span>
                                    دانلود
                                </p>
                            </a>
                            <ul class="dropdown-menu fullwidth msubmenu pnumber">
                                <li>
                                    <div class="row col-lg-12 submenu-part">
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                    </div>
                                    <div class="row col-lg-12 sr-submenu-link">
                                        <ul>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    موبایل
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    راهنمای خرید لپ تلپ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    تبلت
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    دوربین
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    گجت
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown dd_static" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p class="mico_title animated zoomIn">
                                    <span class="fa fa-sort-down"></span>
                                    ویدئو
                                </p>
                            </a>
                            <ul class="dropdown-menu fullwidth msubmenu pnumber">
                                <li>
                                    <div class="row col-lg-12 submenu-part">
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                    </div>
                                    <div class="row col-lg-12 sr-submenu-link">
                                        <ul>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    موبایل
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    راهنمای خرید لپ تلپ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    تبلت
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    دوربین
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    گجت
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown dd_static" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p class="mico_title animated zoomIn">
                                    <span class="fa fa-sort-down"></span>
                                    گالری
                                </p>
                            </a>
                            <ul class="dropdown-menu fullwidth msubmenu pnumber">
                                <li>
                                    <div class="row col-lg-12 submenu-part">
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                    </div>
                                    <div class="row col-lg-12 sr-submenu-link">
                                        <ul>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    موبایل
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    راهنمای خرید لپ تلپ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    تبلت
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    دوربین
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    گجت
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown dd_static" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p class="mico_title animated zoomIn">
                                    <span class="fa fa-sort-down"></span>
                                    آموزش
                                </p>
                            </a>
                            <ul class="dropdown-menu fullwidth msubmenu pnumber">
                                <li>
                                    <div class="row col-lg-12 submenu-part">
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
                                                <img width="100%" height="133px" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                                            </a>
                                            <span class="menu-video-duration">2:39</span>
                                            <h5>
                                                <a>
                                                    لورم ایپسوم
                                                </a>
                                            </h5>


                                        </div>
                                    </div>
                                    <div class="row col-lg-12 sr-submenu-link">
                                        <ul>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    موبایل
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    راهنمای خرید لپ تلپ
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    تبلت
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    دوربین
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                                    گجت
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="pull-left">
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="جستجو...">
                                </div>
                                <button type="submit" class="btn sr-search-btn">جستجو</button>
                            </form>

                        </li>


                    </ul>

                </div>
            </div>
        </div>
    </div>
</header>
<!-- Start slideshow -->
<div class="container-fluid slider">
    <div id="preloader">
        <div id="status"></div>
    </div>
    <div id="carousel">
        <!--
                IMPORTANT - This carousel can have a special class for a smooth transition "gsdk-transition". Since javascript cannot be overwritten, if you want to use it, you can use the bootstrap.js or bootstrap.min.js from the GSDKit or you can open your bootstrap.js file, search for "emulateTransitionEnd(600)" and change it with "emulateTransitionEnd(1200)"
        -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-lg-3 col-xs-12 side-slide">
                        <div class="col-xs-12 side-slide2">
                            <div class="col-xs-12 side-slide3 effect-lily">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/galaxy-s7-edge-gold-back-silver-front.jpg">
                                    <div class="text-box">
                                        <div class="information">
                                            <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                            </h2>
                                            <p class="icon-links">
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-xs-12 side-slide3 effect-lily">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/6b14f104-079c-4fb2-aaa7-0edecf173d77.jpg">
                                    <div class="text-box">
                                        <div class="information">
                                            <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                            </h2>
                                            <p class="icon-links">
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12 main-slide effect-lily">
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                            <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/laptops-best-of-pile02.jpg">
                            <div class="text-box">
                                <div class="information">
                                    <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                    </h2>
                                    <p class="icon-links">
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-xs-12 side-slide">
                        <div class="col-xs-12 side-slide2">
                            <div class="col-xs-12 side-slide3 effect-lily">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/galaxy-s7-edge-gold-back-silver-front.jpg">
                                    <div class="text-box">
                                        <div class="information">
                                            <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                            </h2>
                                            <p class="icon-links">
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-xs-12 side-slide3 effect-lily">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/6b14f104-079c-4fb2-aaa7-0edecf173d77.jpg">
                                    <div class="text-box">
                                        <div class="information">
                                            <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                            </h2>
                                            <p class="icon-links">
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-lg-3 col-xs-12 side-slide">
                        <div class="col-xs-12 side-slide2">
                            <div class="col-xs-12 side-slide3 effect-lily">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/galaxy-s7-edge-gold-back-silver-front.jpg">
                                    <div class="text-box">
                                        <div class="information">
                                            <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                            </h2>
                                            <p class="icon-links">
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-xs-12 side-slide3 effect-lily">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/6b14f104-079c-4fb2-aaa7-0edecf173d77.jpg">
                                    <div class="text-box">
                                        <div class="information">
                                            <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                            </h2>
                                            <p class="icon-links">
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12 main-slide effect-lily">
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                            <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/laptops-best-of-pile02.jpg">
                            <div class="text-box">
                                <div class="information">
                                    <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                    </h2>
                                    <p class="icon-links">
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-xs-12 side-slide">
                        <div class="col-xs-12 side-slide2">
                            <div class="col-xs-12 side-slide3 effect-lily">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/galaxy-s7-edge-gold-back-silver-front.jpg">
                                    <div class="text-box">
                                        <div class="information">
                                            <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                            </h2>
                                            <p class="icon-links">
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="col-xs-12 side-slide3 effect-lily">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/6b14f104-079c-4fb2-aaa7-0edecf173d77.jpg">
                                    <div class="text-box">
                                        <div class="information">
                                            <h2><span class="information-head">

          لورم ایپسوم

                                    </span> <br>

                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.

                                            </h2>
                                            <p class="icon-links">
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus"></span></a>
                                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-paper-plane"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control arrow-1" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control arrow-2" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
            </a>
        </div>
    </div> <!-- end carousel -->
    </div>

<!-- Start icons part -->
<div class="container-fluid icons">
    <div class="icons-list col-xs-12">
	<?for($i=1;$i<=12;$i++){
	 
		$under_slideshow_link= get_tem_result($site,$la,"under_slideshow_link$i",$tem_name,$coms_conect);
		if($under_slideshow_link['title']>""){  
		?>
	
        <div class="col-md-1 col-xs-4 menu-icons border">
            <a href="<?=$under_slideshow_link['link']?>" target="_blank">

                <i class="fa <?=$under_slideshow_link['pic_adress']?>"></i>
                <p>
                   <?=$under_slideshow_link['title']?>
                 </p>

            </a>
        </div>
		<?}
	}?>
		
		
       

    </div>
</div>
<!-- Start main content -->
<section class="container">
    <div class="news col-md-9 col-xs-12 pull-right">
        <div class="row sr-main-news col-xs-12">
            <ul class="pl0 gridshow">
            <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                <h4>روتیتر نمونه برای این عنوان</h4>
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3></a>

                <p><span class="fa fa-clock-o"></span> 14 مهر 1393<span class="fa fa-eye" style="margin-right: 10px;"></span> 365نفر</p>
            </li>
            <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                    <h4>روتیتر نمونه برای این عنوان</h4>
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3></a>

                    <p><span class="fa fa-clock-o"></span> 14 مهر 1393<span class="fa fa-eye" style="margin-right: 10px;"></span> 365نفر</p>
                </li>
            <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                    <h4>روتیتر نمونه برای این عنوان</h4>
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3></a>

                    <p><span class="fa fa-clock-o"></span> 14 مهر 1393<span class="fa fa-eye" style="margin-right: 10px;"></span> 365نفر</p>
                </li>
            </ul>
        </div>
        <div class="heading">
            <h2>مطالب جدید</h2>
        </div>
        <hr> 
        <div class="content">
			<?$query="select a.user_id,view,mudoal_lock,adress,abstract,a.name,title,la,a.id,publish_date from new_news a ,new_file_path b where
			 b.name='news_image'  and status=1 and b.type=1 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' and publish_date<='$now'
		 	group by a.id  order by a.id desc limit 0,5";
		 	 $result = $coms_conect->query($query);
			// echo $query;
			 while($row = $result->fetch_assoc()) {
					 ?>
			<div class="news-media">
                <div class="row news_item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                        <div class="photo">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
								<img alt='<?=$row['title']?>' title="<?=$row['title']?>" src="<?=$row['adress']?>"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                        <div class="text">
                            <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <?$new_cat_id=get_result("select a.id from new_modules_cat a,new_modules_catogory b where a.type=1 and b.type=1 and a.id=b.cat_id and b.page_id={$row['id']} and a.status=1",$coms_conect);?>
								<a href="<?="/news/{$row['la']}/cat_id/$new_cat_id"?>">
                                   <?=get_result("select a.name from new_modules_cat a,new_modules_catogory b where a.type=1 and b.type=1 and a.id=b.cat_id and b.page_id={$row['id']} and a.status=1",$coms_conect)?>
                                </a> </span>
                                |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    <?=get_result("select name from new_managers where id={$row['user_id']}",$coms_conect)?>
                                </a></span>
                                |

                                <span class="sr-news-date">
                                    <?=miladitojalaliuser(date("Y-m-d ",$row['publish_date']),$row['la'])?>
                                </span>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                     <?=get_result("select count(id) from new_madules_comment where type=1 and status=1 and madul_id={$row['id']}",$coms_conect)?>
                                    </span>
                                </a>

                            </h6>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
							<h3><?=$row['title']?></h3>
							</a>
                            <p>
							<?=$row['abstract']?>
							</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
			 <?}?>
			
			
			
	
			
			
			
			
			
			
			
            </div>
        <div class="advertisement-img">
				<?for($i=1;$i<=2;$i++){
						$news_ads= get_tem_result($site,$la,"news_ads$i",$tem,$coms_conect);
					 
		 				?>
			<a href="<?=$news_ads['link']?>">			
            <img alt="<?=$news_ads['title']?>" class="first-content-img<?=$i?> col-xs-12" src="<?=$news_ads['pic_adress']?>">
			</a>
		<?}?>    </div>
        <hr>
        <div class="heading">
            <h2>آموزش های جدید</h2>
        </div>
        <hr>

        <div class="content">
            <div class="news-media">
                <div class="row news_item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                        <div class="photo">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                        <div class="text">
                            <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                                |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                                |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                                </a>

                            </h6>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="news-media">
                <div class="row news_item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                        <div class="photo">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                        <div class="text">
                            <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                                |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                                |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                                </a>

                            </h6>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="news-media">
                <div class="row news_item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                        <div class="photo">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                        <div class="text">
                            <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                                |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                                |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                                </a>

                            </h6>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="news-media">
                <div class="row news_item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                        <div class="photo">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                        <div class="text">
                            <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                                |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                                |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                                </a>

                            </h6>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-xs-12 homeprefix_update_moreitems">
            <div class="line"></div>
            <p>
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                    <span class="fa fa-plus"></span>
                </a>
            </p>
        </div>
    </div>
    <div class="sidebar news col-md-3 col-xs-12">
        <div class="dictionary col-xs-12">
            <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic1" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic1" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic1" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic1" data-slide-to="4"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/laptops-best-of-pile02.jpg" alt="...">
                        <div class="carousel-caption">
                           ...
                        </div>
                    </div>
                    <div class="item">
                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/laptops-best-of-pile02.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                    <div class="item">
                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/laptops-best-of-pile02.jpg" alt="...">
                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/laptops-best-of-pile02.jpg" alt="...">
                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/laptops-best-of-pile02.jpg" alt="...">
                        <div class="carousel-caption">
                            ...
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="right carousel-control" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#carousel-example-generic1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="left carousel-control" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#carousel-example-generic1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="notes col-xs-12">
            <h3>
                یادداشت
            </h3>
            <ul>
                <li class="notes-news">
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/avatar1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p>
                                    مهدی آذربایجانی
                                </p>
                            </a>
                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
                <li class="notes-news">
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/avatar1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p>
                                    مهدی آذربایجانی
                                </p>
                            </a>
                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
                <li class="notes-news">
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/avatar1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p>
                                    مهدی آذربایجانی
                                </p>
                            </a>
                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
                <li class="notes-news">
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/avatar1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p>
                                    مهدی آذربایجانی
                                </p>
                            </a>
                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/avatar1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <p>
                                    مهدی آذربایجانی
                                </p>
                            </a>
                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="sidebar-plus">
                <span class="fa fa-plus"></span>
            </a>

        </div>
        <div class="advertisement col-xs-12">
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
            <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tadbir-270x225.gif">
            </a>
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
            <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tadbir-270x225.gif">
            </a>
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tadbir-270x225.gif">
            </a>
        </div>
        <div class="newest-news col-xs-12">
            <div class="header-newest-news">
                <h3>
                    پر بازدید ترین مطالب
                </h3>
            </div>
            <ul>
                <li class="col-md-12 col-sm-12 griditem animated fadeIn newest-news-border">
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                    <h5>روتیتر نمونه برای این عنوان</h5>
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>

                </li>
                <li class="col-md-12 col-sm-12 griditem animated fadeIn newest-news-border">
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                    <h5>روتیتر نمونه برای این عنوان</h5>
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>

                </li>
                <li class="col-md-12 col-sm-12 griditem animated fadeIn newest-news-border">
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                    <h5>روتیتر نمونه برای این عنوان</h5>
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>

                </li>
                <li class="col-md-12 col-sm-12 griditem animated fadeIn newest-news-border">
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                    <h5>روتیتر نمونه برای این عنوان</h5>
                    <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>

                </li>
            </ul>
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="sidebar-plus">
                <span class="fa fa-plus"></span>
            </a>
        </div>
    </div>
</section>
<!-- Start First parallex -->
<div class="container-fluid main-product">
        <div class="main-product-data container">
            <div class="main-product-title col-xs-12">
                <h2>
                    متن نمونه
                </h2>
            </div>
            <div class="col-md-3 col-xs-12 sub-section video-section">
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                    <h5>روتیتر نمونه برای این عنوان</h5>
                </a>
            </div>
            <div class="col-md-3 col-xs-12 sub-section video-section">
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                    <h5>روتیتر نمونه برای این عنوان</h5>
                </a>
            </div>
            <div class="col-md-3 col-xs-12 sub-section video-section">
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                    <h5>روتیتر نمونه برای این عنوان</h5>
                </a>
            </div>
            <div class="col-md-3 col-xs-12 sub-section video-section">
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                    <h5>روتیتر نمونه برای این عنوان</h5>
                </a>
            </div>
        </div>
</div>
<!-- Start second content -->
<section class="container second-content">
    <div class="news col-md-9 col-xs-12 pull-right">
        <div class="news-media">
            <div class="row news_item">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                    <div class="photo">
                        <figure>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                    <div class="text">
                        <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                            |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                            |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                            </a>

                        </h6>
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="news-media">
            <div class="row news_item">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                    <div class="photo">
                        <figure>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                    <div class="text">
                        <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                            |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                            |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                            </a>

                        </h6>
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="news-media">
            <div class="row news_item">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                    <div class="photo">
                        <figure>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                    <div class="text">
                        <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                            |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                            |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                            </a>

                        </h6>
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="news-media">
            <div class="row news_item">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                    <div class="photo">
                        <figure>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                    <div class="text">
                        <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                            |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                            |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                            </a>

                        </h6>
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="news-media">
            <div class="row news_item">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                    <div class="photo">
                        <figure>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                    <div class="text">
                        <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                            |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                            |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                            </a>

                        </h6>
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="news-media">
            <div class="row news_item">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                    <div class="photo">
                        <figure>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                    <div class="text">
                        <h6>
                                <span class="sr-news-field"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    اینترنت و وب
                                </a> </span>
                            |
                                <span class="sr-news-name"><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                    مهدی آذربایجانی
                                </a></span>
                            |

                                <span class="sr-news-date">
                                    22 تیر 1395
                                </span>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="pull-left">
                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                    5
                                    </span>
                            </a>

                        </h6>
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h3>لورم ایپسون متن ساختگی با تولید سادگی نامفهوم</h3></a>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 homeprefix_update_moreitems">
            <div class="line"></div>
            <p>
                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                    <span class="fa fa-plus"></span>
                </a>
            </p>
        </div>

    </div>

    <div class="sidebar col-md-3 col-xs-12">
        <div class="advertisement-2 col-xs-12">
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
            <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tadbir-270x225.gif">
            </a>
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
            <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/madiran-gif-300-250_new.gif">
            </a>
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
            <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/laptops-best-of-pile02.jpg">
            </a>
        </div>
        <div class="training col-xs-12">
            <h3>
                آموزش
            </h3>
            <ul>
                <li>
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                            <p>25 مهر 1393</p>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="sidebar-plus">
                <span class="fa fa-plus"></span>
            </a>

        </div>


    </div>

</section>
<!-- Start video tab -->
<div class="container top-news">
    <div class="tab-content rtl">

        <div id="maintab1" class="tab-pane main_tab-pane fade in active">


            <ul class="nav nav-tabs nav-justified rtl sub_tabs_nav">
                <li class="active"><a data-toggle="tab" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#sub_g1_tab1">اخبار</a></li>
                <li><a data-toggle="tab" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#sub_g1_tab2">امور بین الملل</a></li>
                <li><a data-toggle="tab" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#sub_g1_tab3">سامانه صدور کارت</a></li>
                <li><a data-toggle="tab" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#sub_g1_tab4">شورای گفتگو</a></li>
                <li><a data-toggle="tab" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#sub_g1_tab5">شورای گفتگو</a></li>
                <li><a data-toggle="tab" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#sub_g1_tab6">شورای گفتگو</a></li>
            </ul>


            <div class="tab-content rtl">
                <div id="sub_g1_tab1" class="tab-pane sub_tab-pane fade in active">
                    <div class="top-news-data">
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                    </div>
                    <div class="col-xs-12 homeprefix_update_moreitems">
                        <div class="line"></div>
                        <p>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <span class="fa fa-plus"></span>
                            </a>
                        </p>
                    </div>
                </div>
                <div id="sub_g1_tab2" class="tab-pane sub_tab-pane fade">
                    <div class="top-news-data">
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                    </div>
                    <div class="col-xs-12 homeprefix_update_moreitems">
                        <div class="line"></div>
                        <p>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <span class="fa fa-plus"></span>
                            </a>
                        </p>
                    </div>
                </div>
                <div id="sub_g1_tab3" class="tab-pane sub_tab-pane fade">
                    <div class="top-news-data">
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                    </div>
                    <div class="col-xs-12 homeprefix_update_moreitems">
                        <div class="line"></div>
                        <p>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <span class="fa fa-plus"></span>
                            </a>
                        </p>
                    </div>
                </div>
                <div id="sub_g1_tab4" class="tab-pane sub_tab-pane fade">
                    <div class="top-news-data">
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                    </div>
                    <div class="col-xs-12 homeprefix_update_moreitems">
                        <div class="line"></div>
                        <p>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <span class="fa fa-plus"></span>
                            </a>
                        </p>
                    </div>
                </div>
                <div id="sub_g1_tab5" class="tab-pane sub_tab-pane fade">
                    <div class="top-news-data">
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                    </div>
                    <div class="col-xs-12 homeprefix_update_moreitems">
                        <div class="line"></div>
                        <p>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <span class="fa fa-plus"></span>
                            </a>
                        </p>
                    </div>
                </div>
                <div id="sub_g1_tab6" class="tab-pane sub_tab-pane fade">
                    <div class="top-news-data">
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg">
                            </a>
                            <span class="video-duration">2:39</span>
                            <h5>روتیتر نمونه برای این عنوان</h5>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a>
                        </div>
                    </div>
                    <div class="col-xs-12 homeprefix_update_moreitems">
                        <div class="line"></div>
                        <p>
                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">
                                <span class="fa fa-plus"></span>
                            </a>
                        </p>
                    </div>
                </div>





                </div>

            </div>



        </div>
        </div>
<!-- Start second parallex -->
<div class="container services">
    <div class="sr-services-text">
        <h2>
        راهنمای کلیه خرید های شما
        </h2>
        <button type="button" class=" btn-danger sr-services-button">
            ثبت اطلاعات شما
        </button>
    </div>
</div>
<!-- Start Footer -->
<footer class="container-fluid">


        <!-- Start Footer First Section -->
        <section class="footerads">
            <div class="container">
                <figure>
                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/adsbanner.jpg">
                </figure>
            </div>
        </section>

        <!-- Start Footer Second Section -->
        <section class="footerblocks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12 pull-right postlist">
                        <h3>مطالب پربیننده</h3>
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-md-4 pull-right">
                                        <figure>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-8 pull-right pr0">
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                                        <p>25 مهر 1393</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-4 pull-right">
                                        <figure>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-8 pull-right pr0">
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                                        <p>25 مهر 1393</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-4 pull-right">
                                        <figure>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-8 pull-right pr0">
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                                        <p>25 مهر 1393</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-4 pull-right">
                                        <figure>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-8 pull-right pr0">
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>عنوان نمونه برای این بخش</h4></a>

                                        <p>25 مهر 1393</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-xs-12 pull-right catlist">
                        <h3>موضوعات</h3>
                        <ul class="row">
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>خدمات</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>محصولات</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>سیاسی</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>اقتصادی</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>فرهنگی</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>اجتماعی</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>خدمات</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>محصولات</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>سیاسی</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>اقتصادی</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>فرهنگی</span></a>
                            </li>
                            <li class="col-md-6 pull-right">
                                <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span>اجتماعی</span></a>
                            </li>
                        </ul>
                        <div class="newsletter col-md-12 pull-right pr0 pl0">
                            <h3>خبرنامه</h3>

                            <p>برای دریافت آخرین اخبار و مطالب در خبرنامه ما عضو شوید.</p>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-9 pull-left">
                                        <input type="email" class="form-control" id="exampleInputEmail2"
                                               placeholder="jane.doe@example.com">
                                    </div>
                                    <div class="col-md-3 pull-right pl0">
                                        <button type="submit" class="btn btn-success">عضویت</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 pull-right commentlist">
                        <h3>پر بحث ترین ها</h3>
                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-md-3 pull-right">
                                        <figure>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><p class="most-diss">187</p></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-9 pull-right pr0">
                                        <h5>علی در سه روز پیش</h5>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>در مورد مطلب علمی</h4></a>

                                        <p>خیلی ممنون از ...</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-3 pull-right">
                                        <figure>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><p class="most-diss">134</p></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-9 pull-right pr0">
                                        <h5>علی در سه روز پیش</h5>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>در مورد مطلب علمی</h4></a>

                                        <p>خیلی ممنون از ...</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-3 pull-right">
                                        <figure>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><p class="most-diss">98</p></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-9 pull-right pr0">
                                        <h5>علی در سه روز پیش</h5>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>در مورد مطلب علمی</h4></a>

                                        <p>خیلی ممنون از ...</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-3 pull-right">
                                        <figure>
                                            <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><p class="most-diss">85</p></a>
                                        </figure>
                                    </div>
                                    <div class="col-md-9 pull-right pr0">
                                        <h5>علی در سه روز پیش</h5>
                                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><h4>در مورد مطلب علمی</h4></a>

                                        <p>خیلی ممنون از ...</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start Footer Third Section -->

        <!-- Start Footer Copyright Section -->
        <section class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pull-right">
                        <p>
                            تمام حقوق مادی و معنوی این وبسایت محفوض می باشد.
                            <br>
                            آبادیس توسط سرورهای کامز میزبانی و پشتیبانی و نیز از نرم افزار مدیریت محتوای کامز برای مدیریت خود استفاده می کند .
                        </p>
                    </div>
                    <div class="col-md-6 pull-left pl0" style="margin-top: 12px">
                        <ul class="fa">
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-google-plus-square"></span></a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-linkedin-square"></span></a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-instagram"></span></a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#"><span class="fa fa-rss"></span></a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" data-toggle="tooltip" data-placement="right" title=""
                                   data-original-title="!کامز، همه چیز یک جا"><span
                                    class="icon-comslogo"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
</footer>
<!-- Start JS files -->
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.min.js"></script>
<script>
    /*Preloading Animation*/
    $(window).load(function() {
        $('#status').fadeOut();
        $('#preloader').delay(300).fadeOut('slow');
        $('body').delay(300).css({'overflow':'visible'});
        setTimeout(function(){$('.intro-title').addClass('slideInLeft');},100);
    });
</script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.newsTicker.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.mCustomScrollbar.min.js"></script>
<script>

    $(window).load(function(){
        $('code.language-javascript').mCustomScrollbar();
    });
    var nt_example1 = $('#nt-example1').newsTicker({
        row_height: 90,
        max_rows: 4,
        duration: 4000,
        prevButton: $('#nt-example1-prev'),
        nextButton: $('#nt-example1-next')
    });
    $('#nt-example2-infos').hover(function() {
        nt_example2.newsTicker('pause');
    }, function() {
        nt_example2.newsTicker('unpause');
    });
    var state = 'stopped';
    var speed;
    var add;
    var nt_example3 = $('#nt-example3').newsTicker({
        row_height: 80,
        max_rows: 1,
        duration: 0,
        speed: 10,
        autostart: 0,
        pauseOnHover: 0,
        hasMoved: function() {
            if (speed > 700) {
                $('#nt-example3').newsTicker("stop");
                console.log('stop')
                $('#nt-example3-button').text("RESULT: " + $('#nt-example3 li:first').text().toUpperCase());
                setTimeout(function() {
                    $('#nt-example3-button').text("START");
                    state = 'stopped';
                },2500);

            }
            else if (state == 'stopping') {
                add = add * 1.4;
                speed = speed + add;
                console.log(speed)
                $('#nt-example3').newsTicker('updateOption', "duration", speed + 25);
                $('#nt-example3').newsTicker('updateOption', "speed", speed);
            }
        }
    });

    $('#nt-example3-button').click(function(){
        if (state == 'stopped') {
            state = 'turning';
            speed = 1;
            add = 1;
            $('#nt-example3').newsTicker('updateOption', "duration", 0);
            $('#nt-example3').newsTicker('updateOption', "speed", speed);
            nt_example3.newsTicker('start');
            $(this).text("STOP");
        }
        else if (state == 'turning') {
            state = 'stopping';
            $(this).text("WAITING...");
        }
    });
</script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/video.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/bootstrap.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('#sidebar-btn').click(function() {
            $('#sidebar').toggleClass('visible');
        });
    });
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<!-- End Js files -->
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.smartmenus.js" type="text/javascript"></script>
<!-- SmartMenus jQuery init -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(function() {
            $('#main-menu').smartmenus({
                subMenusSubOffsetX: 6,
                subMenusSubOffsetY: -8
            });
        });
    });

</script>
<script>
    // add a menu toggle button on small screens
    jQuery(document).ready(function($) {
        $('#menu-button').click(function() {
            var $this = $(this),
                    $menu = $('#main-menu');
            if ($menu.is(':animated')) {
                return false;
            }
            if (!$this.hasClass('collapsed')) {
                $menu.slideUp(250, function() { $(this).addClass('collapsed').css('display', ''); });
                $this.addClass('collapsed');
            } else {
                $menu.slideDown(250, function() { $(this).removeClass('collapsed'); });
                $this.removeClass('collapsed');
            }
            return false;
        });
    });

</script>

</body>

</html>
<!DOCTYPE html>
<? if ($defult_site != 'main')
    $root = '../'; else
    $root = '';
$now = time();

$site = $defult_site;
$la = $defult_lang;
$tem = $tem_name;
$domain_url = $_SERVER['SERVER_NAME'];
?>
<html lang="<?= $defult_lang ?>">
<head>
    <meta charset="UTF-8">

    <? if ($nav_title > "") {
        $site_title = $nav_title;
        $sub_class = "page-sub-page";
    } else {
        $header_titleee = get_tem_result($defult_site, $defult_lang, "header_title", 'default', $coms_conect);
        $site_title = $header_titleee['title'];
    }
    if ($_GET['q'] > "") {
        $q = injection_replace($_GET['q']);
    }
    ?>

    <title><?= $site_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Start css files-->
    <link href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/bootstrap.css" type="text/css"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/bootstrap.min.css">
    <link href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/bootstrap-theme.css"
          type="text/css" rel="stylesheet">
    <link href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/stylse.css" type="text/css"
          rel="stylesheet">
    <link href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/video-js.css" type="text/css"
          rel="stylesheet">
    <link href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/video-js.min.css" type="text/css"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/themes.css">
    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/theme.css">
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/demo.css">
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/style2.css">
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/public.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/lightgallery.css">
    <link href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/sm-core-css.css">
    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/sm-mint.css">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/owl.carousel.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/owl.theme.default.css">
    <!-- End css files-->
    <script src="<?= $subdomian_add ?>/new_template/default/<?= $defult_dir ?>/js/jquery.min.js"></script>

    <? $meta_pic = get_module_image_function($url_temp[1], $madual_id, $coms_conect) ?>
<?if($url_temp[3]!='keyword'){?>
    <meta name="keywords"
          content="<?= get_meta_keyword($defult_site, $defult_lang, $madual_id, $url_temp[1], $coms_conect, $madual_cat_id,   'default' ) ?>"/> 
    <meta property="og:image" content="<? if ($meta_pic[2] == '') echo $domain_url; else echo $meta_pic[2] ?>"/>
    <meta name="description"
          content="<?= get_meta_descripton($defult_site, $defult_lang, $madual_id, $url_temp[1], $coms_conect, $madual_cat_id,   'default') ?>"/>
          <?  /*get_meta_descripton($defult_site, $defult_lang, $madual_id, $url_temp[1], $coms_conect, $madual_cat_id, 'default') */?>
<?}?>
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="<?= $domain_url ?>"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?= $site_title ?>">  
	
    <meta property="og:description"
          content="<?= get_meta_descripton($defult_site, $defult_lang, $madual_id, $url_temp[1], $coms_conect, $madual_cat_id, $tem) ?>">   
    <meta property="og:url" content="<?= $domain_url ?>"/>
    <meta property="og:site_name" content="آبادیس"/>
    <? $module_tag_function = get_module_tag_function($url_temp[1], $madual_id, $coms_conect);
    if (isset($module_tag_function)) {
   foreach ($module_tag_function as $tag_val) {
            ?>
            <meta property="article:tag" content="<?= $tag_val ?>"/>
            <?
        }
    } ?>
	<?if($url_temp[3]!='keyword'){?>
    <meta property="article:section" content="<?= get_header_category($url_temp[1], $madual_id, $coms_conect); ?>"/>
	<?}?>
    <? $module_date_function = get_header_time_create($url_temp[1], $madual_id, $coms_conect);
    if ($module_date_function['date'] != '1970-01-01 03:01:01' && $module_date_function['date'] != "") {
        ?>
        <meta property="article:published_time" content="<?= $module_date_function['date'] ?>"/>
        <meta property="article:modified_time" content="<?= $module_date_function['edit_date'] ?>"/>
        <meta property="og:updated_time" content="<?= $module_date_function['edit_date'] ?>"/>
    <? } ?>
    <meta property="og:image" content="<? if ($meta_pic[2] == '') echo $domain_url; else echo $meta_pic[2] ?>"/>
    <? if ($meta_pic[2] != '') { ?>
        <meta property="og:image:width" content="<?= $meta_pic[0] ?>"/>
        <meta property="og:image:height" content="<?= $meta_pic[1] ?>"/>
    <? } ?>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description"
          content="<?= get_meta_descripton($defult_site, $defult_lang, $madual_id, $url_temp[1], $coms_conect, $madual_cat_id, $tem) ?>">
    <meta name="twitter:title" content="<?= $site_title ?>">
    <meta name="twitter:image" content="<?= $meta_pic[2] ?>">
    <script type="text/javascript" data-cfasync="false" src="//static.nextads.ir/script/visit.min.js"></script>

</head>
<body>
<!-- Start header -->
<header id="header-container1" class="container-fluid">
    <!--mainmenu-->
    <div id="mainmenu" class="col-xs-12 mainmenu container-fluid">
        <div class="container">
            <div class="logo pull-right">
                <a href="http://abadis.ir/">
                    <img src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/img/Abadis (1).png">
                </a>
            </div>
            <div class=" mico float-n col-xs-12">
                <div class="main_icons_sheet ">
                    <a href="#" id="menu-button" class="collapsed">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>
                    <?

                    date_default_timezone_set('Asia/Tehran');
                    $today = strtotime("-1 yesterday");

                    $queryp = "select a.date,view,adress,abstract,a.name,title,la,a.id,publish_date from new_content a ,new_file_path b where
			b.name='content_image'  and status=1 and b.type=11 and a.id=b.id and la='$la' and site='$site' and publish_date>='$today' and publish_date<='$now'
			group by a.id  order by a.id";

                    $resultp = $coms_conect->query($queryp);
                    $mm = array();
                    $i = 0;
                    while ($rowp = $resultp->fetch_assoc()) {
                        $mm[$i]['title'] = $rowp['title'];
                        $mm[$i]['adress'] = "/content/$la/{$rowp['id']}/" . insert_dash($rowp['name']);
                        $mm[$i]['publish_date'] = jdate('d  F  Y', $rowp['publish_date']);
                        $mm[$i]['date'] = $rowp['date'];
                        $i++;
                    }

                    $sql12o = "SELECT a.date,a.publish_date,a.album_type,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_gallery a,new_modules_catogory b   
			where id>0 and a.id=b.page_id and b.type=9 and site='$site' and a.la='$la' and publish_date>=$today and publish_date<='$now'
			group by b.page_id
			order by a.id desc";
if($row1o['cameraman']>"")
$row1o['title']=$row1o['cameraman'];
	$qazo = $coms_conect->query($sql12o);
                    while ($row1o = $qazo->fetch_assoc()) {
                        $mm[$i]['title'] = $row1o['title'];
                        $mm[$i]['publish_date'] = jdate('d  F  Y', $row1o['publish_date']);
                        $mm[$i]['adress'] = "/gallery/$la/{$row1o['id']}/" . insert_dash($row1o['cameraman']);
                        $mm[$i]['date'] = $row1o['date'];
                        $i++;
                    }

                    $sql120k = "SELECT a.date,a.duration,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_video a,new_modules_catogory b   
			where id>0 and a.id=b.page_id and b.type=8 and site='$defult_site' and publish_date>=$today and publish_date<='$now'
			group by b.page_id
			order by a.id desc";

                    $resultd10k = $coms_conect->query($sql120k);
                    while ($row2k = $resultd10k->fetch_assoc()) {
                        $mm[$i]['date'] = $row2k['date'];
                        $mm[$i]['title'] = $row2k['title'];
                        $mm[$i]['publish_date'] = jdate('d  F  Y', $row2k['publish_date']);
                        $mm[$i]['adress'] = "/video/$la/{$row2k['id']}/" . insert_dash($row2k['title']);
                        $i++;
                    }

                    $sql120k1 = "select date,title,publish_date,id from new_static_page where  status=1 and la='$la' and publish_date>=$today and publish_date<='$now'";
                    $resultd10k1 = $coms_conect->query($sql120k1);
                    while ($row2k1 = $resultd10k1->fetch_assoc()) {
                        $mm[$i]['title'] = $row2k1['title'];
                        $mm[$i]['date'] = $row2k1['date'];
                        $mm[$i]['publish_date'] = jdate('d  F  Y', $row2k1['publish_date']);
                        $mm[$i]['adress'] = "/video/$la/{$row2k1['id']}/" . insert_dash($row2k1['title']);
                        $i++;
                    }


                    function cmp_publish_date($a, $b)
                    {
                        return $b['date'] - $a['date'];
                    }

                    usort($mm, "cmp_publish_date");
                    //	print_r($mm);

                    ?>
                    <ul class="nav nav-tabs sr-main-nav">
                        <li class="dropdown dd_static">
                            <a class="dropdown-toggle" id="new-posts-icon" data-toggle="dropdown" href="#"
                               style="padding-top: 13px;">
                                <p class="mico_title new-posts animated zoomIn" style="margin:0;">
                                    <?= $i;
                                    $count = 0;
                                    $div_count = (int)($i / 9); ?>
                                    <span class="fa fa-sort-down" style="display:block;"></span>
                                </p>
                            </a>
                            <ul class="dropdown-menu fullwidth msubmenu pnumber" id="new-post-menu">
                                <li>
                                    <div class="row container submenu-part">
                                        <div class="owl-carousel owl-theme">

                                            <? for ($n = 0; $n <= $div_count; $n++) { ?>
                                                <div class="item">
                                                    <? for ($k = 0; $k <= 2; $k++) { ?>
                                                        <div class="col-lg-4 col-md-4 col-sm-3 submenu-part2 pull-right">
                                                            <? for ($j = 0; $j <= 2; $j++) {
                                                                if ($i > $count) {
                                                                    ?>
                                                                    <div class="newsRow">
                                                                        <span class="date"><?= $mm[$count]['publish_date'] ?></span>
                                                                        <a href="<?= $mm[$count]['adress'] ?>"
                                                                           target="_blank"
                                                                           tabindex="0"><?= $mm[$count]['title'] ?></a>
                                                                    </div>
                                                                    <? $count++;
                                                                }
                                                            } ?>
                                                        </div>
                                                        <? $stop = 1;
                                                    } ?>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dd_static">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <p class="mico_title animated zoomIn">
                                    <span class="fa fa-sort-down"></span>
                                    <? $menu_bar_rigth = get_tem_result($site, $la, "menu_bar_rigth", $tem, $coms_conect);
                                    echo $menu_bar_rigth['title']; ?>
                                </p>
                            </a>
                            <ul class="dropdown-menu msubmenu pnumber abadis_menu">
                                <? for ($i = 1; $i <= 10; $i++) {
                                    $menu_bar_title_rigth = get_tem_result($site, $la, "menu_bar_title_rigth$i", $tem_name, $coms_conect);
                                    if ($menu_bar_title_rigth['title'] > "") {
                                        ?>
                                        <li><a href="<?= $menu_bar_title_rigth['link'] ?>">
                                                <?= $menu_bar_title_rigth['title'] ?>
                                            </a></li>
                                        <?
                                    }
                                } ?>

                            </ul>
                        </li>
                        <?
                        for ($i = 1; $i <= 12; $i++) {
                            $menu_bar = get_tem_result($site, $la, "menu_bar$i", $tem, $coms_conect);
                            $vaidostr = '';

                            if ($menu_bar['title'] == 8)
                                $vaidostr = ",duration";
                            if ($menu_bar['title'] > 0) {
                                ?>
                                <li class="dropdown dd_static">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <p class="mico_title animated zoomIn">
                                            <span class="fa fa-sort-down"></span>
                                            <? $cat_table = '';
                                            $cat_sondition = '';
                                            $module_adress = get_result("select link from new_modules where id={$menu_bar['title']}", $coms_conect);
                                            if ($menu_bar['link'] == 0) {
                                                $module_name = get_result("select name from new_modules where id={$menu_bar['title']}", $coms_conect);
                                            } else {
                                                $cat_table = ', new_modules_catogory c';
                                                $cat_sondition = " and c.type={$menu_bar['title']} and a.id=c.page_id and c.cat_id={$menu_bar['link']}";
                                                $module_name = get_result("select name from new_modules_cat where id={$menu_bar['link']}", $coms_conect);
                                            }

                                            echo $menu_bar['pic_adress'];
                                            ?>
                                        </p>
                                    </a>
                                    <ul class="dropdown-menu fullwidth msubmenu pnumber">
                                        <li>
                                            <div class="row col-lg-12 submenu-part">
                                                <? $table_name = get_result("select table_name from new_modules where id={$menu_bar['title']}", $coms_conect);
                                                $name_value = '';
                                                if ($menu_bar['title'] == 11 || $menu_bar['title'] == 1)
                                                    $name_value = ',name';
												 if ($menu_bar['title'] == 9)
                                                     $name_value = ' ,cameraman';	
											 	if ($menu_bar['title'] == 8)
                                                    $name_value = ',seo_url';
                                                $query = "select title $name_value ,a.id,la,site $vaidostr from $table_name a  $cat_table where  a.id>0 and la='$la'
									 	$cat_sondition
                                         order by a.id desc
										 limit 0,6";
                                              //  echo $query; 
                                                //print_r($menu_bar);//exit;
                                                $result = $coms_conect->query($query);
                                                $pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image');
                                                $module_type = $menu_bar['title'];
                                                while ($RS54 = $result->fetch_assoc()) {
													
												 	if ($module_type == 9 && $RS54['cameraman']>"")
                                                 $RS54['name'] = $RS54['cameraman'];	
											    if ($menu_bar['title'] == 8&& $RS54['seo_url']>"")
                                                    $RS54['name'] = $RS54['seo_url'];
													
													
                                                    $sql1w1 = "select adress from new_file_path where type={$menu_bar['title']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                                    $result1q = $coms_conect->query($sql1w1);
                                                    $roww1 = $result1q->fetch_assoc();

                                                    $module_url = '';
                                                    //if($menu_bar['link']==0)
                                                    if ($menu_bar['title'] == 11 || $menu_bar['title'] == 1|| $menu_bar['title'] == 9|| $menu_bar['title'] == 8)
                                                        $module_url = "/$module_adress/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                                    else
                                                        $module_url = "/$module_adress/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);
                                                    ?>

                                                    <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2 pull-right">
                                                        <a class="hvr-grow" href="<?= $module_url ?>">
                                                            <? if ($menu_bar['title'] == 8) { ?>
                                                                <span class="video-play-btn">
                                                    <i class=".sr-play-btn fa fa-play"></i>
                                                </span>
                                                                <?
                                                            } ?>
                                                            <img title="<?= $RS54['title'] ?>"
                                                                 alt="<?= $RS54['title'] ?>" width="100%" height="133px"
                                                                 src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], $domain, $menu_bar['title']) ?>">
                                                        </a>
                                                        <? if ($menu_bar['title'] == 8) { ?>
                                                            <span class="menu-video-duration"><?= $RS54['duration'] ?></span>
                                                            <?
                                                        } ?>
                                                        <h5 style="">
                                                            <a href="<?= $module_url ?>">
                                                                <?= $RS54['title'] ?>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <?
                                                } ?>
                                            </div>
                                            <div class="row col-lg-12 sr-submenu-link">
                                                <ul>
                                                    <? for ($j = 1; $j <= $menu_bar['pic']; $j++) {
                                                        $menu_bar_item = get_tem_result($site, $la, "menu_bar_item$i$j", $tem, $coms_conect);
                                                        if ($menu_bar_item['title'] > "") {
                                                            ?>
                                                            <li>
                                                                <a href="<?= $menu_bar_item['link'] ?>">
                                                                    <?= $menu_bar_item['title'] ?>
                                                                </a>
                                                            </li>
                                                            <?
                                                        }
                                                    } ?>

                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <?
                            }
                        }
                        ?>
                    </ul>

                </div>
                <div class="search-login-box">
                    <div class="sr-login pull-left">


                        <a href="#" data-toggle="modal" data-target="#myModal"
                           class="sr-membership hidden-sm hidden-xs">
                            <i class="fa fa-user" aria-hidden="true" style="float: none"></i>
                        </a>
                        <a class="sr-membership hidden-sm hidden-xs" id="ShareLink">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                        </a>
                        <div class="quick-box share-box hidden-sm hidden-xs" id="ShareBox" style="">
                            <div class="newsletter">
                                <div class="dir-ltr">
                                    <form>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                                                <input class="form-control dir-rtl news_letters"
                                                       id="header_news_letters_Email" name="news_letters"
                                                       placeholder="ایمیل خود را وارد کنید." type="text">

                                                <a class="input-group-addon news_letters_a">تایید</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="social-style">
                                <? for ($i = 1; $i <= 6; $i++) {
                                    $header_social_network = get_tem_result($site, $la, "header_social_network$i", $tem, $coms_conect);
                                    if ($header_social_network['link'] > "") {
                                        ?>
                                        <span class="social-icon">
										<a title="<?= $header_social_network['title'] ?>"
                                           href="<?= $header_social_network['link'] ?>" target="_blank" rel="nofollow">
											<i class="fa <?= $header_social_network['pic_adress'] ?>"
                                               aria-hidden="true"></i>
                                            </i>
										</a>
									</span>
                                        <?
                                    }
                                } ?>
                            </div>
                        </div>
                        <a href="#" id="sr_search_icon" class="sr-membership">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </a>

                        <!-- Modal1 -->
                        <form action='/login/<?= $defult_lang ?>' method="post" id="member_attributeForm">
                            <input type='hidden' name='modal_lock_url' value='<?= $url ?>'>
                            <div class="modal bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close pull-left" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                                        <input type="text" class="form-control1" name="modal_user"
                                                               placeholder="نام کاربری" id="username">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="required">
                                                            <i class="fa fa-lock"></i>
                                                        </div>

                                                        <input type="password" class="form-control1" id="password"
                                                               name="modal_password" placeholder="کلمه عبور">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-3 pull-left prl0">
                                                            <img style="height:34px; width:93%;"
                                                                 src="<? crate_capcha_pic($madual_lang) ?>">
                                                        </div>
                                                        <div class="col-xs-9 pull-right prl0 ">
                                                            <input name="modal_com1_captcha" class="form-control2"
                                                                   placeholder="کد امنيتي" data-fv-notempty="true"
                                                                   data-fv-notempty-message="پر کردن اين فيلد الزامي است"
                                                                   data-fv-numeric="true"
                                                                   data-fv-numeric-message="اين فيلد عددي است">
                                                        </div>
                                                    </div>
                                                    <button type="submit" class=" btn-danger sr-login-button">
                                                        ورود
                                                    </button>
                                                    <a href="/reset_password/<?= $defult_lang ?>"><p><span
                                                                    class="fa fa-repeat"></span>بازیابی کلمه عبور</p>
                                                    </a>


                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="text-align:center;">
                                            <button type='button'
                                                    onclick='window.location="/register/<?= $defult_lang ?>"'
                                                    class="btn btn-warning sr-login-button">ثبت نام
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-box" id="SearchBox" style="display: none;">
        <form method='post' id='search_from'>
            <input id="SearchTerm" name="q" type="text" placeholder="عبارت مورد نظر خود را وارد کنید"
                   class="form-control" style="font-size: 13px;">
            <? if (count($url_temp) > 2) $search__module = $url_temp[1]; else $search__module = 'content';
            if ($url_temp[1] == 'search') $search__module = $url_temp[4]; ?>
            <script>
                $("#SearchTerm").keypress(function (e) {
                    if (e.which == 13) {
                        $("#search_from").attr("action", "/search/<?=$defult_lang?>/" + $("#SearchTerm").val() + '/<?=$search__module?>/1');
                        $("#search_from").submit()
                    }
                });
            </script>
        </form>
    </div>
    <div class="social_networks hidden-xs hidden-sm">
        <div class="container">
            <section class="top">
                <div class="col-xs-12 top-menu rtl animated fadeIn pull-right" style="padding-right: 0">
                    <ul style="padding-right: 0">
                        <li><a href="#"><i style="color:red; font-size:114%;" class="fa fa-fire" aria-hidden="true"></i>
                                <span style="color: #696969; font-weight: 500;"><? $under_menu_bar_main_title = get_tem_result($site, $la, "under_menu_bar_main_title", $tem, $coms_conect);
                                    echo $under_menu_bar_main_title['title'] ?><span></a></li>
                        <? for ($i = 1; $i <= 6; $i++) {
                            $under_menu_bar_link = get_tem_result($site, $la, "under_menu_bar_link$i", $tem, $coms_conect);
                            if ($under_menu_bar_link['title'] > "") {
                                ?>
                                <li>
                                    <a href="<?= $under_menu_bar_link['link'] ?>"><?= $under_menu_bar_link['title'] ?></a>
                                </li>
                                <?
                            }
                        } ?>
                    </ul>
                </div>
            </section>
        </div>
    </div>
</header>
<? if (count($url_temp) > 2) { ?>
    <div class="container main-banner-add">
        <? $ads_page2_click = get_tem_result($site, $la, "ads_page2_click", $tem, $coms_conect);
        if ($ads_page2_click['pic'] == 1) {
            echo '<script type="text/javascript" data-cfasync="false">';
            echo html_entity_decode($ads_page2_click['title']);
        } else {
            ?>
            <a href='<?= $ads_page2_click['link'] ?>' target="_blank" title="<?= $ads_page2_click['title'] ?>">
                <img src="<?= $ads_page2_click['pic_adress'] ?>">
            </a>
        <? }
        if ($ads_page2_click['pic'] == 1)
            echo '</script>'; ?>
    </div>
<? } ?>
<nav id="main-nav">
    <ul id="main-menu" class="sm sm-rtl sm-mint collapsed">
        <? function create_main_menu_index($parentID, $site_id, $defult_lang, $coms_conect)
        {
            $sql = "SELECT * FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
            $result = $coms_conect->query($sql);
            if ($result->num_rows > 0) {
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    $target = get_target($row['target']);
                    $href = $row['link'];
                    echo "<li class='$li_class'>";
                    echo "<a   $target  href='$href'>{$row['name']}</a>";
                    create_main_menu_index($row['id'], $site_id, $defult_lang, $coms_conect);
                    echo "</li>";
                }
                echo "</ul>";
            }
        }

        $sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$defult_site' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
        $result44 = $coms_conect->query($sql44);
        while ($row44 = $result44->fetch_assoc()) {
            $target = get_target($row44['target']);
            $href = $row44['link'];
            echo "<li>";
            echo "<a $target   href='$href' > {$row44['name']}</a>";
            create_main_menu_index($row44['id'], $defult_site, $defult_lang, $coms_conect);
            echo "</li>";
        } 
		
		
		?>
    </ul>
</nav>
<script>
    /*  Sticky Header
     /*----------------------------------------------------*/
    $("#mainmenu").not("#mainmenu.not-sticky").clone(true).addClass('cloned unsticky').insertAfter("#mainmenu");
    //    $( "#navigation1" ).clone(true).addClass('cloned unsticky').insertAfter( "#navigation1" );

    // sticky header script
    var headerOffset = $("#header-container1").height() * 2; // height on which the sticky header will shows

    $(window).scroll(function () {
        if ($(window).scrollTop() >= headerOffset) {
            $("#mainmenu.cloned").addClass('sticky').removeClass("unsticky");
//            $("#navigation1.cloned").addClass('sticky').removeClass("unsticky");
        } else {
            $("#mainmenu.cloned").addClass('unsticky').removeClass("sticky");
//            $("#navigation1.cloned").addClass('unsticky').removeClass("sticky");
        }
    });

</script>
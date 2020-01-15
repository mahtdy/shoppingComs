<!DOCTYPE html>
<head>
    <? if ($defult_site != 'main')
        $root = '../'; else
        $root = '';


    if (file_exists("languages/$defult_lang.php"))
        include_once("languages/$defult_lang.php");


    $now = time();
    $site = $defult_site;
    $la = $defult_lang;
    $tem = $tem_name;
    $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //echo $nav_title;
    ?>
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

    <?$header_title= get_tem_result($site,$la,"header_title",$tem,$coms_conect);?>
    <? $pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic'); ?>

    <!-- Basic Page Needs
    ================================================== -->
    <title><?=$site_title?></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="keywords"
          content="<?= get_meta_keyword($defult_site, $defult_lang, $madual_id, $url_temp[1], $coms_conect, $madual_cat_id, 'default') ?>"/>
    <meta property="og:image" content="<? if ($meta_pic[2] == '') echo $domain_url; else echo $meta_pic[2] ?>"/>
    <meta name="description"
          content="<?= get_meta_descripton($defult_site, $defult_lang, $madual_id, $url_temp[1], $coms_conect, $madual_cat_id, 'default') ?>"/>
    <meta name="robots" content="noodp"/>
    <link rel="canonical" href="<?= $domain_url ?>"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?= $site_title ?>">
    <meta property="og:description"
          content="<?= get_meta_descripton($defult_site, $defult_lang, $madual_id, $url_temp[1], $coms_conect, $madual_cat_id, $tem) ?>">
    <meta property="og:url" content="<?= $domain_url ?>"/>
    <meta property="og:site_name" content=" "/>
    <? $module_tag_function = get_module_tag_function($url_temp[1], $madual_id, $coms_conect);
    if (count($module_tag_function) > 0) {
        foreach ($module_tag_function as $tag_val) {
            ?>
            <meta property="article:tag" content="<?= $tag_val ?>"/>
            <?
        }
    } ?>
    <meta property="article:section" content="<?= get_header_category($url_temp[1], $madual_id, $coms_conect); ?>"/>
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
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">



    <!-- Vendor CSS -->

    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/theme.css">
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/style.css">
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/colors/main.css"
          id="colors">
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/custom.css">


    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/bootstrap-rtl/bootstrap-rtl.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/bootstrap-select.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/animate/animate.min.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/magnific-popup/magnific-popup.min.css">

    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/theme-tem.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/theme-elements.css">

    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/rtl-theme-elements.css">
    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/select2/select2.min.css">


    <!-- Current Page CSS -->
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/rs-plugin/css/settings.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/rs-plugin/css/layers.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/rs-plugin/css/navigation.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/circle-flip-slideshow/css/component.css">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/default.css">
    <!-- Demo CSS -->

    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/rtl-demo-law-firm.css">
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/rtl-theme.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/contact_us.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/custom_ebnesina.css">
    <link rel="stylesheet"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/rtl-custom_drbanihosseini.css">
    <!-- Head Libs -->
    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/style-block.css"/>
    <link rel="stylesheet" type="text/css"
          href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/language.css"/>

    <script type="text/javascript"
            src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/jquery/jquery.min.js"></script>


    <script type="text/javascript"
            src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/jquery.appear/jquery.appear.min.js"></script>
    <script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/jquery.easing/jquery.easing.min.js"
            type="text/javascript"></script>
    <script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/jquery-cookie/jquery-cookie.min.js"
            type="text/javascript"></script>

    <script type="text/javascript"
            src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/modernizr/modernizr.min.js"></script>
    <script type="text/javascript"
            src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/modernizr-2.6.2.min.js"></script>
<? function number2farsi($srting)
{
    $en_num = array("0" ,"1" ,"2" ,"3" ,"4" ,"5" ,"6" ,"7" ,"8" ,"9" );
    $fa_num = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");
    return str_replace($en_num, $fa_num, $srting);
}?>

</head>


<body lang="<?= $defult_lang ?>" style="overflow-x:hidden; <? if ($nav_title) echo 'subpage' ?>">


<!--================================problem language====================-->
<input type="hidden" name="active_lang" value="<?= $defult_lang ?>" id="active_lang">
<input type="hidden" name="active_site" value="<?= $defult_site ?>" id="active_site">
<!--====================================================================-->
<!--mobile-->
<div id="mainContent" class=" off-canvas-wrapper-inner HM_tran H_hidden-md" data-off-canvas-wrapper>
    <!--header-->
    <div id="myCanvasNav" class="overlay3" onclick="closeOffcanvas()"></div>
    <div class="off-canvas position-right light-off-menu dark-off-menu offcanvas" id="myOffcanvas" data-off-canvas>
        <div class="off-menu-close">
            <h3><?= $s_ReplaceWords_menu ?></h3>
            <span onclick="closeOffcanvas()"><i class="fa fa-times"></i></span>
        </div>
        <ul class="vertical menu off-menu" data-responsive-menu="drilldown">
            <? function create_main_menu_index_mobile($parentID, $site_id, $defult_lang, $coms_conect)
            {
                $sql = "SELECT * FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";

                $result = $coms_conect->query($sql);
                if ($result->num_rows > 0) {

                    echo "<ul class='submenu menu vertical is-drilldown-submenu' data-submenu data-animate='slide-in-down slide-out-up'>";
                    while ($row = $result->fetch_assoc()) {

                        $target = get_target($row['target']);
                        $href1 = $row['link'];
                        $href2 = "href='$href1'";
                        $li = '';
                        $li3 = '';
                        $par = '';
                        $has = '';
                        if (check_has_child($row['id'], $row['site_id'], $row['la'], $coms_conect) == 1) {
                            // $li = 'dropdown-submenu';
                            $li3 = 'is-drilldown-submenu';
                            $href2 = '';
                            $par = 'is-drilldown-submenu-parent';
                            $has = 'has-submenu';
                        }
                        if ($row['onvan_label'] > "") {
                            $under_icon_lable = "<span class='wpmm-badge wpmm-badge-primary'>{$row['onvan_label']}</span>";
                        }

                        if ($row['big_header_icon'] > "" || $row['big_icon_link'] > "" && $row['text'] > "" && $row['onvan_button'] > "") {
                            $center = 'H_center';
                        }
                        echo "<li class='is-submenu-item $has  $par $center H_p10'>";
                        echo "<ul class='H_p0'>";
                        echo "<li class=' H_p0 '>";


                        if ($row['big_header_icon'] !== 'fa-nonicon' && $row['big_header_icon'] > "") {
                            echo "<div><i class='fa {$row['big_header_icon']} H_font_color'></i></div>";
                        } else
                            if ($row['big_icon_link'] > "") {
                                echo "<div><img  alt='{$row['big_onvan_img']}' class='H_mb30 H_hw70' src='{$row['big_icon_link']}'></div>";
                            }


                        if ($row['header_icon'] !== 'fa-nonicon') {
                            $x = "<span class='wpmm-selected-icon'><i class='fa {$row['header_icon']}'></i></span>";
                        } elseif ($row['icon_link'] > "") {
                            $x = "<img  alt='{$row['onvan_img']}' class=' H_hw15' src='{$row['icon_link']}'>";
                        }

                        if ($row['have_tag'] == 1) {
                            echo "<div class='tagcloud' ><a href = '$href1' class='tag-cloud-link tag-link-38 tag-link-position-1'> {$row['name']}</a >
                                                              </div>";
                        }
                        echo "<a class=''  $target  $href2><b class='H_neshne' > $x {$row['name']} $under_icon_lable</b></a>";
                        create_main_menu_index_mobile($row['id'], $site_id, $defult_lang, $coms_conect);

                        if ($row['text'] > "") {
                            echo "<div class='H_font12 H_mb_text15 H_ollips90'>{$row['text']}</div>";
                        }

                        if ($row['onvan_button'] > "") {
                            echo "<a class='thm-btn our-solution H_style_but1' href='{$row['link_button']}'>{$row['onvan_button']}</a>";
                        }
                        //  map
                        if ($row['have_map'] == 1) {
                            $src_map = get_result("SELECT address  FROM new_map_address where la='$defult_lang' and site='$site_id'", $coms_conect);
                            echo "<div class='H_mt12'>
                                                                  <iframe src='$src_map'
                                                                       width='230' height='220'
                                                                       frameborder='0'
                                                                       allowfullscreen=''></iframe>
                                                              </div>";
                        }

                        if ($row['image'] > "") {
                            echo "<div class='wpmm-grid-post-img-wrap'>
                        <div class='wpmm-grid-post-img'>
                               <a href='{$row['link_image']}'>
                                    <img src='{$row['image']}' alt='{$row['name']}'>
                               </a>
                        </div>
                     </div>";
                        }


                        //============shop============

                        $M_title_temsetting = $row['id'];

                        if ($row['menu_type'] == 7) {

                            $M_query_shop = "select * from new_tem_setting where name='Custom_content_shop_box' and title='$M_title_temsetting' and la='$defult_lang' and site='$site_id'";
                            $M_result_shop = $coms_conect->query($M_query_shop);
                            //echo $M_query_shop;
                            $M_row_shop = $M_result_shop->fetch_assoc();
                            if ($M_row_shop['tem_name'] == 1 || $M_row_shop['tem_name'] == 2) {

                                $M_cat_id1 = $M_row_shop["pic"];
                                $M_Property = $M_row_shop["text"];
                                $M_numb = $M_row_shop["pic_adress"];
                                $M_id_modules = $M_row_shop["link"];

                                if ($M_Property == 0)
                                    $M_x = 'id';
                                if ($M_Property == 1)
                                    $M_x = 'view';

                                $M_table_name9 = get_result("select table_name from new_modules where id=$M_id_modules", $coms_conect);
                                $M_link_name9 = get_result("select link from new_modules where id=$M_id_modules", $coms_conect);

                                $M_name = '';
                                if ($M_row_shop['link'] != 9)
                                    $M_name = 'name';
                                if ($M_row_shop['link'] == 7)
                                    $M_name = 'title';
                                $M_deatils = '';
                                if ($M_row_shop['link'] == 9)
                                    $M_deatils = ',deatils';
                                $M_name = 'title';
                                $M_duration = '';
                                if ($M_row_shop['link'] == 8)
                                    $M_duration = ',duration,deatils';
                                if ($M_row_shop['link'] == 1 || $M_row_shop['link'] == 11)
                                    $M_duration = ',abstract';
//
                                $M_query111 = "select title ,a.$M_name $M_duration $M_deatils ,a.id,la,site from $M_table_name9 a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                                                                                                       and site='$site_id' and b.type={$M_row_shop['link']} and  a.id=b.page_id and b.cat_id='$M_cat_id1'
                                                                                                       GROUP BY a.id
                                                                                                       order by a.$M_x desc
                                                                                                       limit 0,$M_numb";

                                //echo $M_query111;
                                $M_result1111 = $coms_conect->query($M_query111);
                                $M_module_type = $M_row_shop['link'];
                                ?>

                                <? if ($M_row_shop['tem_name'] == 1) { ?>
                                    <li class=" H_neshane_for_colum4">
                                        <div class="owl-carousel H_gallery H_neshane_dot H_neshane_nav H_mt7"
                                             id="shopmobile">
                                            <?
                                            while ($M_RS54 = $M_result1111->fetch_assoc()) {
                                               $pic_arr1 = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');

                                                $M_sql1w1 = "select adress from new_file_path where type={$M_row_shop['link']} and name='{$pic_arr1[$M_module_type]}' and id ={$M_RS54['id']}";
                                                //echo $M_sql1w1;
                                                $M_result1q = $coms_conect->query($M_sql1w1);
                                                $M_roww1 = $M_result1q->fetch_assoc();
                                                $M_module_url = '';
                                                if ($M_row_shop['title'] == 11 || $M_row_shop['title'] == 1)
                                                    $M_module_url = "/$M_link_name9/{$M_RS54['la']}/{$M_RS54['id']}/" . insert_dash($M_RS54['name']);
                                                else
                                                    $M_module_url = "/$M_link_name9/{$M_RS54['la']}/{$M_RS54['id']}/" . insert_dash($M_RS54['title']);


                                                if ($M_row_shop['link'] == 8 || $M_row_shop['link'] == 9)
                                                    $M_RS54['kholase'] = $M_RS54['deatils'];
                                                if ($M_row_shop['link'] == 1 || $M_row_shop['link'] == 11)
                                                    $M_RS54['kholase'] = $M_RS54['abstract'];
                                                ?>


                                                <div class="item ">
                                                    <a href="<?= $M_module_url ?>">
                                                        <? if ($M_row_shop['link'] == 8) { ?>
                                                            <img title="<?= $M_RS54['title'] ?>"
                                                                 src="<?= get_modual_pic_address($M_roww1['adress'], $M_RS54['site'], '', $M_row_shop['title']) ?>"
                                                                 class="H_h180 H_w225 "
                                                                 alt="<?= $M_RS54['title'] ?>">
                                                            <span class="play-button"></span>
                                                            <?
                                                        } else { ?>
                                                            <img title="<?= $M_RS54['title'] ?>"
                                                                 src="<?= $M_roww1['adress'] ?>"
                                                                 class="H_h180 H_w225 "
                                                                 alt="<?= $M_RS54['title'] ?>"
                                                            >
                                                            <?
                                                        } ?>
                                                    </a>
                                                    <? $M_sql120 = "SELECT a.name,a.id from new_modules_cat a ,new_modules_catogory b where
                                                                                                                                a.id=b.cat_id  and cat_id=$M_cat_id1  group by a.id order by a.rang";
                                                    //echo $M_sql120;exit;
                                                    $M_resultd10 = $coms_conect->query($M_sql120);
                                                    $i = 0;
                                                    $M_row_tab = $M_resultd10->fetch_assoc();
                                                    if ($M_row_shop['link'] == 8)
                                                        $page_name = 'video';
                                                    if ($M_row_shop['link'] == 11)
                                                        $page_name = 'content';
                                                    if ($M_row_shop['link'] == 1)
                                                        $page_name = 'news';
                                                    if ($M_row_shop['link'] == 6)
                                                        $page_name = 'download';
                                                    if ($M_row_shop['link'] == 7)
                                                        $page_name = 'article';
                                                    if ($M_row_shop['link'] == 9)
                                                        $page_name = 'gallery';
                                                    ?>
                                                    <span class="post-in-image">
                                                                                                                              <a href="/<?= $page_name ?>/<?= $defult_lang ?>/category/<?= $M_cat_id1 ?>/<?= $M_row_tab['name'] ?>"><?= $M_row_tab['name'] ?></a>
                                                                                                                             </span>

                                                    <h4 class="grid-post-title H_fonth4_tab block-ellipsis ">
                                                        <a class="H_p0"
                                                           href="<?= $M_module_url ?>"><?= $M_RS54['title'] ?></a>
                                                    </h4>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </li>
                                <? } elseif ($M_row_shop['tem_name'] == 2) { ?>
                                    <li class="H_p25 HM_p0 H_neshane_for_colum4">

                                        <?
                                        while ($M_RS54 = $M_result1111->fetch_assoc()) {
                                            $pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
                                            $M_sql1w1 = "select adress from new_file_path where type={$M_row_shop['link']} and name='{$pic_arr[$M_module_type]}' and id ={$M_RS54['id']}";
                                            // echo $M_sql1w1;

                                            $M_result1q = $coms_conect->query($M_sql1w1);
                                            $M_roww1 = $M_result1q->fetch_assoc();
                                            $M_module_url = '';
                                            if ($M_row_shop['title'] == 11 || $M_row_shop['title'] == 1)
                                                $M_module_url = "/$M_link_name9/{$M_RS54['la']}/{$M_RS54['id']}/" . insert_dash($M_RS54['name']);
                                            else
                                                $M_module_url = "/$M_link_name9/{$M_RS54['la']}/{$M_RS54['id']}/" . insert_dash($M_RS54['title']);


                                            if ($M_row_shop['link'] == 8 || $M_row_shop['link'] == 9)
                                                $M_RS54['kholase'] = $M_RS54['deatils'];
                                            if ($M_row_shop['link'] == 1 || $M_row_shop['link'] == 11)
                                                $M_RS54['kholase'] = $M_RS54['abstract'];
                                            ?>
                                            <div class="H_text_right  H_h100">
                                                <a class="H_p0 " href="<?= $M_module_url ?>">
                                                    <?
                                                    if ($M_row_shop['link'] == 8) { ?>
                                                        <img title="<?= $M_RS54['title'] ?>"
                                                             src="<?= get_modual_pic_address($M_roww1['adress'], $M_RS54['site'], '', $M_row_shop['title']) ?>"
                                                             class="H_h75 H_w80 H_img_style"
                                                             alt="<?= $M_RS54['title'] ?>">
                                                        <span class="play-button"></span>
                                                        <?
                                                    } else { ?>
                                                        <img title="<?= $M_RS54['title'] ?>"
                                                             src="<?= $M_roww1['adress'] ?>"
                                                             class="H_h75 H_w80 H_img_style"
                                                             alt="<?= $M_RS54['title'] ?>">
                                                        <?
                                                    } ?>
                                                    <span class="product-title HM_lineheight"><?= $M_RS54['title'] ?></span>
                                                </a>
                                                <script>
                                                    $('.H_neshane_style_p > p').css({
                                                        'text-align': 'right',
                                                        'line-height': '2',
                                                        'margin-top': '10px'
                                                    })
                                                </script>
                                            </div>
                                            <?
                                        } ?>
                                    </li>
                                    <?
                                }}
                        }
                        //============end shop============

                        //============tab============
                        if ($row['menu_type'] == 3) {
                            $sql_tab = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$site_id' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
                            $result_tab = $coms_conect->query($sql_tab);
                            $row_tab = $result_tab->fetch_assoc();
                            if ($row_tab['menu_type'] == 3) {
                                $target = get_target($row['target']);
                                $href = $row['link'];
                                if ($row['header_icon'] > "") {
                                    $under_icon_tetr = "<span class='wpmm-selected-icon '><i class='fa {$row['header_icon']}'></i></span>";
                                }
                                if ($row['onvan_label'] > "") {
                                    $under_icon_lable = "<span class='wpmm-badge wpmm-badge-primary'>{$row['onvan_label']}</span>";
                                }
                                ?>
                                <li class="dropdown dropdown-mega">
                                    <a class='dropdown-toggle' <?= $target ?>
                                       href='<?= $href ?>'><?= $under_icon_tetr ?> <?= $row['name'] ?>
                                        تب <?= $under_icon_lable ?></a>
                                    <ul class="dropdown-menu wp-megamenu-sub-menu H_p0">
                                        <li class="H_p0">
                                            <ul class="H_p0">
                                                <li class=" H_p0">
                                                    <ul class="H_p0">
                                                        <li class=" H_p0">

                                                            <div class="wpmm-vertical-tabs">
                                                                <div class="wpmm-vertical-tabs-nav">
                                                                    <ul class="wpmm-tab-btns">
                                                                        <? $Custom_content = get_result("select count(id) from new_tem_setting where site_id='$site_id' and la='$defult_lang' and tem_name='$tem' and name like 'Custom_content_box%' ", $coms_conect);
                                                                        //echo $Custom_content;
                                                                        for ($j = 1; $j <= $Custom_content; $j++) {
                                                                            $Custom_content_box = get_tem_result($site_id, $defult_lang, "Custom_content_box$j", $tem, $coms_conect);

                                                                            if ($Custom_content_box['link'] == 1) {
                                                                                ?>
                                                                                <li class="H_tab1 active">
                                                                                    <a>اخبار</a>
                                                                                </li><? } ?>
                                                                            <? if ($Custom_content_box['link'] == 11) { ?>
                                                                                <li class="H_tab2">
                                                                                    <a>محتوا</a>
                                                                                </li>
                                                                            <? } ?>
                                                                            <? if ($Custom_content_box['link'] == 9) { ?>
                                                                                <li class="H_tab3">
                                                                                    <a>گالری</a>
                                                                                </li>
                                                                            <? } ?>
                                                                            <? if ($Custom_content_box['link'] == 8) { ?>
                                                                                <li class="H_tab4">
                                                                                    <a>ویدیو</a>
                                                                                </li>
                                                                            <? } ?>
                                                                            <? if ($Custom_content_box['link'] == 7) { ?>
                                                                                <li class="H_tab5">
                                                                                    <a>مقاله</a>
                                                                                </li>
                                                                            <? } ?>
                                                                            <? if ($Custom_content_box['link'] == 6) { ?>
                                                                                <li class="H_tab6">
                                                                                    <a>دانلود</a>
                                                                                </li>
                                                                                <?
                                                                            }
                                                                        } ?>

                                                                    </ul>
                                                                </div>
                                                                <div class="wpmm-vertical-tabs-content">
                                                                    <div class="wpmm-tab-content">
                                                                        <?
                                                                        $Custom_content = get_result("select count(id) from new_tem_setting where  site_id='$site_id' and la='$defult_lang' and tem_name='$tem' and name like 'Custom_content_box%' ", $coms_conect);
                                                                        //echo $Custom_content;
                                                                        for ($j = 1; $j <= $Custom_content; $j++) {
                                                                            $Custom_content_box = get_tem_result($site_id, $defult_lang, "Custom_content_box$j", $tem, $coms_conect);
                                                                            ?>
                                                                            <div class="wpmm-tab-pane H_content_tab<?= $j ?> <? if ($j == 1) echo 'active'; ?>">
                                                                                <div class="owl-carousel H_gallery wpmm-grid-post-addons wpmm-grid-post-row "
                                                                                     id="tabs<?= $j ?>">
                                                                                    <? if ($Custom_content_box["pic_adress"] > "") {

                                                                                        $cat_id1 = $Custom_content_box["pic"];
                                                                                        $Property = $Custom_content_box["text"];
                                                                                        $numb = $Custom_content_box["pic_adress"];
                                                                                        $type = $Custom_content_box["link"];
                                                                                        if ($Property == 0)
                                                                                            $x = 'id';
                                                                                        if ($Property == 1)
                                                                                            $x = 'view';
                                                                                        $table_name = get_result("select table_name from new_modules where id={$Custom_content_box['link']}", $coms_conect);
                                                                                        $link_name = get_result("select link from new_modules where id={$Custom_content_box['link']}", $coms_conect);

                                                                                        $name = '';
                                                                                        if ($Custom_content_box['link'] != 9)
                                                                                            $name = 'name';
                                                                                        if ($Custom_content_box['link'] == 7)
                                                                                            $name = 'title';
                                                                                        $deatils = '';
                                                                                        if ($Custom_content_box['link'] == 9)
                                                                                            $deatils = ',deatils';
                                                                                        $name = 'title';
                                                                                        $duration = '';
                                                                                        if ($Custom_content_box['link'] == 8)
                                                                                            $duration = ',duration,deatils';
                                                                                        if ($Custom_content_box['link'] == 1 || $Custom_content_box['link'] == 11)
                                                                                            $duration = ',abstract';


                                                                                        $query = "select title ,a.$name $duration $deatils ,a.id,la,site from $table_name a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                                                                                        and site='$defult_site' and b.type={$Custom_content_box['link']} and  a.id=b.page_id and b.cat_id='$cat_id1'
                                                                                        GROUP BY a.id
                                                                                        order by a.$x desc
                                                                                        limit 0,$numb";
                                                                                        //echo $query;
                                                                                        $module_type = $Custom_content_box['link'];
                                                                                        $result = $coms_conect->query($query);

                                                                                        $module_type = $Custom_content_box['link'];

                                                                                        while ($RS54 = $result->fetch_assoc()) {
                                                                                            $sql1w1 = "select adress from new_file_path where type={$Custom_content_box['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                                                                            // echo $sql1w1;

                                                                                            $result1q = $coms_conect->query($sql1w1);
                                                                                            $roww1 = $result1q->fetch_assoc();
                                                                                            $module_url = '';
                                                                                            if ($Custom_content_box['title'] == 11 || $Custom_content_box['title'] == 1)
                                                                                                $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                                                                            else
                                                                                                $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                                                                            if ($Custom_content_box['link'] == 8 || $Custom_content_box['link'] == 9)
                                                                                                $RS54['kholase'] = $RS54['deatils'];
                                                                                            if ($Custom_content_box['link'] == 1 || $Custom_content_box['link'] == 11)
                                                                                                $RS54['kholase'] = $RS54['abstract'];
                                                                                            ?>
                                                                                            <div class="owl-item wpmm-grid-post col3">
                                                                                                <div class="item wpmm-grid-post-content">
                                                                                                    <div class="wpmm-grid-post-img-wrap">
                                                                                                        <a href="<?= $module_url ?>">
                                                                                                            <?
                                                                                                            if ($Custom_content_box['link'] == 8) { ?>
                                                                                                                <img title="<?= $RS54['title'] ?>"
                                                                                                                     src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], $domain, $Custom_content_box['title']) ?>"
                                                                                                                     class="H_h150"
                                                                                                                     alt="<?= $RS54['title'] ?>">
                                                                                                                <span class="play-button"></span>
                                                                                                                <?
                                                                                                            } else { ?>
                                                                                                                <img title="<?= $RS54['title'] ?>"
                                                                                                                     src="<?= $roww1['adress'] ?>"
                                                                                                                     class="H_h150"
                                                                                                                     alt="<?= $RS54['title'] ?>"
                                                                                                                >
                                                                                                                <?
                                                                                                            } ?>
                                                                                                        </a>
                                                                                                        <? $sql120 = "SELECT a.name,a.id from new_modules_cat a ,new_modules_catogory b where
                                                                                                    a.id=b.cat_id and b.type=$type and cat_id=$cat_id1  group by a.id order by a.rang";
                                                                                                        //echo $sql120;exit;
                                                                                                        $resultd10 = $coms_conect->query($sql120);
                                                                                                        $i = 0;
                                                                                                        $row_tab = $resultd10->fetch_assoc();
                                                                                                        if ($Custom_content_box['link'] == 8)
                                                                                                            $page_name = 'video';
                                                                                                        if ($Custom_content_box['link'] == 11)
                                                                                                            $page_name = 'content';
                                                                                                        if ($Custom_content_box['link'] == 1)
                                                                                                            $page_name = 'news';
                                                                                                        if ($Custom_content_box['link'] == 6)
                                                                                                            $page_name = 'download';
                                                                                                        if ($Custom_content_box['link'] == 7)
                                                                                                            $page_name = 'article';
                                                                                                        if ($Custom_content_box['link'] == 9)
                                                                                                            $page_name = 'gallery';
                                                                                                        ?>
                                                                                                        <span class="post-in-image"><a
                                                                                                                    href="/<?= $page_name ?>/<?= $defult_lang ?>/category/<?= $cat_id1 ?>/<?= $row_tab['name'] ?>"><?= $row_tab['name'] ?></a>
                                                                                                                    </span>
                                                                                                    </div>
                                                                                                    <h4 class="grid-post-title H_fonth4_tab block-ellipsis ">
                                                                                                        <a href="<?= $module_url ?>"><?= $RS54['title'] ?></a>
                                                                                                    </h4>
                                                                                                </div>
                                                                                            </div>
                                                                                        <? }
                                                                                    } ?>
                                                                                </div>
                                                                            </div>
                                                                            <img id="waiting"
                                                                                 src='/waiting.gif'
                                                                                 style="display:none">
                                                                            <script>
                                                                                $(document).ready(function () {

                                                                                    $("#tabs<?=$j?>").owlCarousel({
                                                                                        rtl: true,
                                                                                        lazyLoad: false,
                                                                                        nav: true,
                                                                                        loop: true,
                                                                                        navText: ["", ""],
//                                                     navText: [""],
                                                                                        responsive: {
                                                                                            0: {
                                                                                                items: 1
                                                                                            },
                                                                                            600: {
                                                                                                items: 2
                                                                                            },
                                                                                            1000: {
                                                                                                items: 3
                                                                                            }
                                                                                        }

                                                                                    });

                                                                                });
                                                                            </script>
                                                                        <? } ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                                <?

                            }}
                        //============end tab============


                        echo "</li>";
                        echo "</ul>";
                        echo "</li>";
                    }
                    echo "</ul>";

                }
            }?>
            <script>
                $(document).ready(function () {
                    $('.H_neshane_for_colum4').closest('.is-submenu-item').last().addClass('H-neshne-for-remove');
                })
            </script>

            <?$sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$defult_site' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
            $result44 = $coms_conect->query($sql44);
            while ($row44 = $result44->fetch_assoc()) {
                $target = get_target($row44['target']);
                $href0 = $row44['link'];
                $href = "href='$href0'";
                $li = '';
                $li2 = '';
                if (check_has_child($row44['id'], $row44['site_id'], $row44['la'], $coms_conect) == 1) {
                    $li = 'dropdown-toggle';
                    $li2 = 'is-drilldown-submenu-parent';
                    $href = '';
                }
                if ($row44['header_icon'] !== 'fa-nonicon') {
                    $icon_tetr44 = "<span class='wpmm-selected-icon '><i class='fa {$row44['header_icon']}'></i></span>";
                } elseif ($row44['icon_link'] > "") {
                    $icon_tetr44 = "<img  alt='{$row44['onvan_img']}' class=' H_hw15' src='{$row44['icon_link']}'>";
                }

                if ($row44['onvan_label'] > "") {
                    $icon_lable44 = "<span class='wpmm-badge wpmm-badge-danger'>{$row44['onvan_label']}</span>";
                }
                echo "<li class='has-submenu  $li2'>";
                echo "<a  class='$li' $target $href >$icon_tetr44 {$row44['name']} $icon_lable44</a>";
                create_main_menu_index_mobile($row44['id'], $defult_site, $defult_lang, $coms_conect);
                echo "</li>";
            } ?>
            <script>
                $(document).ready(function () {
                    $('.H-neshne-for-remove').siblings().last().addClass('H-neshne-for-remove-f');
                    $('.H-neshne-for-remove-f').find('.submenu').removeClass('is-drilldown-submenu');
                })
            </script>
            <!-----------------------------------------float_menu--------------->
            <?
            function create_main_menu_index_float($parentID, $site_id, $defult_lang, $coms_conect)
            {
                $sql = "SELECT * FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=1 and status=1 ORDER BY rang";
                $result = $coms_conect->query($sql);
                if ($result->num_rows > 0) {
                    echo "<ul class='submenu menu vertical is-drilldown-submenu' data-submenu data-animate='slide-in-down slide-out-up'>";
                    while ($row = $result->fetch_assoc()) {
                        $target = get_target($row['target']);
                        $href1 = $row['link'];
                        $href2 = "href='$href1'";
                        $li = '';
                        $li3 = '';
                        $par = '';
                        $has = '';
                        if (check_has_child_float($row['id'], $row['site_id'], $row['la'], $coms_conect) == 1) {
                            // $li = 'dropdown-submenu';
                            $li3 = 'is-drilldown-submenu';
                            $href2 = '';
                            $par = 'is-drilldown-submenu-parent';
                            $has = 'has-submenu';
                        }
                        echo "<li class='is-submenu-item $has  $par'>";
                        echo "<a class='H_plr15' $target $href2 ><b>{$row['name']}</b></a>";
                        create_main_menu_index_float($row['id'], $site_id, $defult_lang, $coms_conect);
                        echo "</li>";
                    }
                    echo "</ul>";
                }
            }

            $sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$defult_site' and la='$defult_lang' and float_menu=1 and status=1 ORDER BY rang";
            $result44 = $coms_conect->query($sql44);
            while ($row44 = $result44->fetch_assoc()) {
                $target = get_target($row44['target']);
                $href0 = $row44['link'];
                $href = "href='$href0'";
                $li = '';
                $li2 = '';
                if (check_has_child_float($row44['id'], $row44['site_id'], $row44['la'], $coms_conect) == 1) {
                    $li = 'dropdown-toggle';
                    $li2 = 'is-drilldown-submenu-parent';
                    $href = '';
                }
                echo "<li class='has-submenu  $li2'>";
                echo "<a  class='' $target $href > {$row44['name']}</a>";
                create_main_menu_index_float($row44['id'], $defult_site, $defult_lang, $coms_conect);
                echo "</li>";
            }
            ?>

        </ul>
    </div>
</div>
<!--end mobile-->

<!--<header class="H_dir_header"  id="header"  data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 57, 'stickySetTop': '-70px', 'stickyChangeLogo': true}">-->
<header class="H_dir_header" id="header">
    <? $show_box_one_header = get_tem_result($site, $la, "show_box_one_header", $tem, $coms_conect);
    if ($show_box_one_header['pic_adress'] == 1){
    ?>

    <div class=" sm-text-center bg-theme-colored">
        <div class="container">
            <div class="row H_mb0">
                <div class="col-md-4 text-right flip sm-text-center">
                    <div class="widget m-0">
                        <ul class="styled-icons icon-dark icon-circled icon-theme-colored icon-sm H_mbt07">
                            <? $header_social_networks = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'header_social%' ", $coms_conect);
                            for ($k = 1; $k <= $header_social_networks; $k++) {
                                $header_social = get_tem_result($site, $la, "header_social$k", $tem, $coms_conect);
                                if ($header_social['title'] > "") {
                                    ?>
                                    <li class="mb-0 pb-0 H_mr15"><a class="H_center" href="<?= $header_social["link"] ?>"><i class="fa fa-<?= $header_social["title"] ?>"></i></a></li>
                                <?}}?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="widget m-0 mt-5 no-border">
                        <ul class="list-inline text-right sm-text-center H_mbt07 H_center">
                            <li class="pl-10 pr-10 mb-0 pb-0">
                                <? $contact_us_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'contact_links%' ", $coms_conect);
                                for ($k =1; $k <= 1; $k++) {
                                $contact_links = get_tem_result($site, $la, "contact_links$k", $tem, $coms_conect);
                                if ($contact_links['title'] > "") {

                                ?>
                                <div class="header-widget text-white H_font17"><i class="fa fa-phone H_rotate250"></i><?= number2farsi( $contact_links["link"]) ?> </div>
                                <?}}?>
                            </li>
                            <li class="pl-10 pr-10 mb-0 pb-0">
                                <? $email = get_tem_result($site, $la, "email", $tem, $coms_conect); ?>
                                <div class="header-widget text-white"><i class="fa fa-envelope-o"></i> <a class="text-gray" href="<?= $email['link'] ?>"><img src="<?= $email['pic'] ?>" alt="<?= $email['title'] ?>"></a> </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <nav>
                        <ul class="list-inline sm-text-center text-left flip mt-5 HM_center">
                            <?
                            for ($i = 1; $i <= 3; $i++) {
                                $header_text_two = get_tem_result($site, $la, "header_text_two$i", $tem, $coms_conect); ?>
                                <li> <a class="text-white" href="<?= $header_text_two['link'] ?>"><?= $header_text_two['text'] ?></a> </li>
                                <?if ($i!=3){ ?>
                                    <li class="text-white">|</li>
                                <?}}?>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
    <?}?>

            <section class="mainmeu-area stricky">
                <div class="container">
                    <div class="HM_neshne col-md-12 col-sm-12 col-xs-12 H_p0">
                        <div class="  mainmenu-bg clearfix">
                            <nav class="main-menu pull-right ">
                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                    <nav>
                                        <ul class="nav nav-pills navigation" id="mainNav">

                                            <!------------------------------------- menu float(abshari) ---------------------------->
                                            <?
                                            function create_main_menu_index_float1($parentID, $site_id, $defult_lang, $coms_conect)
                                            {
                                                $sql = "SELECT * FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=1 and status=1 ORDER BY rang";
                                                $result = $coms_conect->query($sql);
                                                if ($result->num_rows > 0) {
                                                    echo "<ul class='dropdown-menu '>";
                                                    while ($row = $result->fetch_assoc()) {
                                                        $target = get_target($row['target']);
                                                        $href = $row['link'];
                                                        $li = '';
                                                        if (check_has_child_float($row['id'], $row['site_id'], $row['la'], $coms_conect) == 1) {
                                                            $li = 'dropdown-submenu';
                                                        }
                                                        echo "<li class='$li H_p0'>";
                                                        echo "<a class=''  $target  href='$href'>{$row['name']}</a>";
                                                        create_main_menu_index_float1($row['id'], $site_id, $defult_lang, $coms_conect);
                                                        echo "</li>";
                                                    }
                                                    echo "</ul>";
                                                }
                                            }

                                            $sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$defult_site' and la='$defult_lang' and float_menu=1 and status=1 ORDER BY rang";
                                            $result44 = $coms_conect->query($sql44);
                                            while ($row44 = $result44->fetch_assoc()) {
                                                $target = get_target($row44['target']);
                                                $href = $row44['link'];
                                                $li = '';
                                                if (check_has_child_float($row44['id'], $row44['site_id'], $row44['la'], $coms_conect) == 1) {
                                                    $li = 'dropdown-toggle';
                                                }

                                                echo "<li class='dropdown'>";
                                                echo "<a  class='$li' $target   href='$href' > {$row44['name']}</a>";
                                                create_main_menu_index_float1($row44['id'], $defult_site, $defult_lang, $coms_conect);
                                                echo "</li>";
                                            }

                                            ?>


                                            <!------------------------------------- Mega menu ---------------------------->
                                            <? function create_main_menu_index_megaitem($parentID, $site_id, $defult_lang, $coms_conect)
                                            {
                                                $sql = "SELECT * FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
//echo $sql;
                                                $count_id = get_result("select count(id) FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang", $coms_conect);

                                                $result = $coms_conect->query($sql);
                                                if ($result->num_rows > 0) {
                                                    echo "<ul class='H_style_ul H_wlr'>";

                                                    while ($row = $result->fetch_assoc()) {

                                                        $target = get_target($row['target']);
                                                        $href = $row['link'];
                                                        $with = '';

                                                        //============tab============
                                                        if ($row['menu_type'] == 3) {
                                                            ?>
                                                            <li class="dropdown dropdown-mega ">
                                                                <ul class="dropdown-menu wp-megamenu-sub-menu H_p0">
                                                                    <li class="H_p0">
                                                                        <ul class="H_p0">
                                                                            <li class=" H_p0">
                                                                                <ul class="H_p0">
                                                                                    <li class=" H_p0">
                                                                                        <div class="wpmm-vertical-tabs">
                                                                                            <div class="wpmm-vertical-tabs-nav">
                                                                                                <ul class="wpmm-tab-btns">
                                                                                                    <? $Custom_content = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$site_id'  and name like 'Custom_content_box%' ", $coms_conect);
                                                                                                    //echo $Custom_content;
                                                                                                    for ($j = 1; $j <= $Custom_content; $j++) {
                                                                                                        $Custom_content_box = get_tem_result($site_id, $defult_lang, "Custom_content_box$j", '', $coms_conect);

                                                                                                        if ($Custom_content_box['link'] == 1) {
                                                                                                            ?>
                                                                                                            <li class="H_tab1 active">
                                                                                                                <a>اخبار</a>
                                                                                                            </li><? } ?>
                                                                                                        <? if ($Custom_content_box['link'] == 11) { ?>
                                                                                                            <li class="H_tab2">
                                                                                                                <a>محتوا</a>
                                                                                                            </li>
                                                                                                        <? } ?>
                                                                                                        <? if ($Custom_content_box['link'] == 9) { ?>
                                                                                                            <li class="H_tab3">
                                                                                                                <a>گالری</a>
                                                                                                            </li>
                                                                                                        <? } ?>
                                                                                                        <? if ($Custom_content_box['link'] == 8) { ?>
                                                                                                            <li class="H_tab4">
                                                                                                                <a>ویدیو</a>
                                                                                                            </li>
                                                                                                        <? } ?>
                                                                                                        <? if ($Custom_content_box['link'] == 7) { ?>
                                                                                                            <li class="H_tab5">
                                                                                                                <a>مقاله</a>
                                                                                                            </li>
                                                                                                        <? } ?>
                                                                                                        <? if ($Custom_content_box['link'] == 6) { ?>
                                                                                                            <li class="H_tab6">
                                                                                                                <a>دانلود</a>
                                                                                                            </li>
                                                                                                            <?
                                                                                                        }
                                                                                                    } ?>

                                                                                                </ul>
                                                                                            </div>
                                                                                            <div class="wpmm-vertical-tabs-content">
                                                                                                <div class="wpmm-tab-content">
                                                                                                    <?
                                                                                                    $Custom_content = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$site_id' and name like 'Custom_content_box%' ", $coms_conect);
                                                                                                    //echo $Custom_content;
                                                                                                    for ($j = 1; $j <= $Custom_content; $j++) {
                                                                                                        $Custom_content_box = get_tem_result($site_id, $defult_lang, "Custom_content_box$j", '', $coms_conect);
                                                                                                        ?>
                                                                                                        <div class="wpmm-tab-pane H_content_tab<?= $j ?> <? if ($j == 1) echo 'active'; ?>">
                                                                                                            <div class="owl-carousel H_gallery wpmm-grid-post-addons wpmm-grid-post-row "
                                                                                                                 id="tabs<?= $j ?>">
                                                                                                                <? if ($Custom_content_box["pic_adress"] > "") {

                                                                                                                    $cat_id1 = $Custom_content_box["pic"];
                                                                                                                    $Property = $Custom_content_box["text"];
                                                                                                                    $numb = $Custom_content_box["pic_adress"];
                                                                                                                    $type = $Custom_content_box["link"];
                                                                                                                    if ($Property == 0)
                                                                                                                        $x = 'id';
                                                                                                                    if ($Property == 1)
                                                                                                                        $x = 'view';
                                                                                                                    $table_name = get_result("select table_name from new_modules where id={$Custom_content_box['link']}", $coms_conect);
                                                                                                                    $link_name = get_result("select link from new_modules where id={$Custom_content_box['link']}", $coms_conect);

                                                                                                                    $name = '';
                                                                                                                    if ($Custom_content_box['link'] != 9)
                                                                                                                        $name = 'name';
                                                                                                                    if ($Custom_content_box['link'] == 7)
                                                                                                                        $name = 'title';
                                                                                                                    $deatils = '';
                                                                                                                    if ($Custom_content_box['link'] == 9)
                                                                                                                        $deatils = ',deatils';
                                                                                                                    $name = 'title';
                                                                                                                    $duration = '';
                                                                                                                    if ($Custom_content_box['link'] == 8)
                                                                                                                        $duration = ',duration,deatils';
                                                                                                                    if ($Custom_content_box['link'] == 1 || $Custom_content_box['link'] == 11)
                                                                                                                        $duration = ',abstract';


                                                                                                                    $query = "select title ,a.$name $duration $deatils ,a.id,la,site from $table_name a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                                                                                        and site='$site_id' and b.type={$Custom_content_box['link']} and  a.id=b.page_id and b.cat_id='$cat_id1'
                                                                                        GROUP BY a.id
                                                                                        order by a.$x desc
                                                                                        limit 0,$numb";
                                                                                                                    //echo $query;
                                                                                                                    $module_type = $Custom_content_box['link'];
                                                                                                                    $result = $coms_conect->query($query);

                                                                                                                    $module_type = $Custom_content_box['link'];

                                                                                                                    while ($RS54 = $result->fetch_assoc()) {
                                                                                                                        $sql1w1 = "select adress from new_file_path where type={$Custom_content_box['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                                                                                                        // echo $sql1w1;

                                                                                                                        $result1q = $coms_conect->query($sql1w1);
                                                                                                                        $roww1 = $result1q->fetch_assoc();
                                                                                                                        $module_url = '';
                                                                                                                        if ($Custom_content_box['title'] == 11 || $Custom_content_box['title'] == 1)
                                                                                                                            $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                                                                                                        else
                                                                                                                            $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                                                                                                        if ($Custom_content_box['link'] == 8 || $Custom_content_box['link'] == 9)
                                                                                                                            $RS54['kholase'] = $RS54['deatils'];
                                                                                                                        if ($Custom_content_box['link'] == 1 || $Custom_content_box['link'] == 11)
                                                                                                                            $RS54['kholase'] = $RS54['abstract'];
                                                                                                                        ?>
                                                                                                                        <div class="owl-item wpmm-grid-post col3">
                                                                                                                            <div class="item wpmm-grid-post-content">
                                                                                                                                <div class="wpmm-grid-post-img-wrap">
                                                                                                                                    <a href="<?= $module_url ?>">
                                                                                                                                        <?
                                                                                                                                        if ($Custom_content_box['link'] == 8) { ?>
                                                                                                                                            <img title="<?= $RS54['title'] ?>"
                                                                                                                                                 src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], $domain, $Custom_content_box['title']) ?>"
                                                                                                                                                 class="H_h150"
                                                                                                                                                 alt="<?= $RS54['title'] ?>">
                                                                                                                                            <span class="play-button"></span>
                                                                                                                                            <?
                                                                                                                                        } else { ?>
                                                                                                                                            <img title="<?= $RS54['title'] ?>"
                                                                                                                                                 src="<?= $roww1['adress'] ?>"
                                                                                                                                                 class="H_h150"
                                                                                                                                                 alt="<?= $RS54['title'] ?>"
                                                                                                                                            >
                                                                                                                                            <?
                                                                                                                                        } ?>
                                                                                                                                    </a>
                                                                                                                                    <? $sql120 = "SELECT a.name,a.id from new_modules_cat a ,new_modules_catogory b where
                                                                                                    a.id=b.cat_id and b.type=$type and cat_id=$cat_id1  group by a.id order by a.rang";
                                                                                                                                    //echo $sql120;exit;
                                                                                                                                    $resultd10 = $coms_conect->query($sql120);
                                                                                                                                    $i = 0;
                                                                                                                                    $row_tab = $resultd10->fetch_assoc();
                                                                                                                                    if ($Custom_content_box['link'] == 8)
                                                                                                                                        $page_name = 'video';
                                                                                                                                    if ($Custom_content_box['link'] == 11)
                                                                                                                                        $page_name = 'content';
                                                                                                                                    if ($Custom_content_box['link'] == 1)
                                                                                                                                        $page_name = 'news';
                                                                                                                                    if ($Custom_content_box['link'] == 6)
                                                                                                                                        $page_name = 'download';
                                                                                                                                    if ($Custom_content_box['link'] == 7)
                                                                                                                                        $page_name = 'article';
                                                                                                                                    if ($Custom_content_box['link'] == 9)
                                                                                                                                        $page_name = 'gallery';
                                                                                                                                    ?>
                                                                                                                                    <span class="post-in-image"><a
                                                                                                                                                href="/<?= $page_name ?>/<?= $defult_lang ?>/category/<?= $cat_id1 ?>/<?= $row_tab['name'] ?>"><?= $row_tab['name'] ?></a>
                                                                                                                    </span>
                                                                                                                                </div>
                                                                                                                                <h4 class="grid-post-title H_fonth4_tab block-ellipsis ">
                                                                                                                                    <a href="<?= $module_url ?>"><?= $RS54['title'] ?></a>
                                                                                                                                </h4>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    <? }
                                                                                                                } ?>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <img id="waiting"
                                                                                                             src='/waiting.gif'
                                                                                                             style="display:none">
                                                                                                        <script>
                                                                                                            $(document).ready(function () {

                                                                                                                $("#tabs<?=$j?>").owlCarousel({
                                                                                                                    rtl: true,
                                                                                                                    lazyLoad: false,
                                                                                                                    nav: true,
                                                                                                                    loop: true,
                                                                                                                    navText: ["", ""],
//                                                     navText: [""],
                                                                                                                    responsive: {
                                                                                                                        0: {
                                                                                                                            items: 1
                                                                                                                        },
                                                                                                                        600: {
                                                                                                                            items: 2
                                                                                                                        },
                                                                                                                        1000: {
                                                                                                                            items: 3
                                                                                                                        }
                                                                                                                    }

                                                                                                                });

                                                                                                            });
                                                                                                        </script>
                                                                                                    <? } ?>

                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </li>
                                                                                </ul>
                                                                            </li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>

                                                            </li>
                                                            <?
                                                        }
                                                        //============end tab============

                                                        if ($row['onvan_label'] > "") {
                                                            $under_icon_lable = "<span class='wpmm-badge wpmm-badge-primary'>{$row['onvan_label']}</span>";
                                                        }
                                                        if ($row['big_header_icon'] > "" || $row['big_icon_link'] > "" && $row['text'] > "" && $row['onvan_button'] > "") {
                                                            $center = 'H_center';
                                                        }

                                                        echo "<li class=' $center'>";
                                                        echo "<ul>";
                                                        echo "<li class=' H_p0 '>";

                                                        if ($row['big_header_icon'] !== 'fa-nonicon' && $row['big_header_icon'] > "") {
                                                            echo "<div><i class='fa {$row['big_header_icon']} H_font_color'></i></div>";
                                                        } else
                                                            if ($row['big_icon_link'] > "") {
                                                                echo "<div><img  alt='{$row['big_onvan_img']}' class='H_mb30 H_hw70' src='{$row['big_icon_link']}'></div>";
                                                            }

                                                        if ($row['header_icon'] !== 'fa-nonicon') {
                                                            $x = "<span class='wpmm-selected-icon'><i class='fa {$row['header_icon']}'></i></span>";
                                                        } elseif ($row['icon_link'] > "") {
                                                            $x = "<img  alt='{$row['onvan_img']}' class=' H_hw15' src='{$row['icon_link']}'>";
                                                        }


                                                        echo "<a class='' $target  href='$href'> $x {$row['name']} $under_icon_lable</a>";
                                                        create_main_menu_index_megaitem($row['id'], $site_id, $defult_lang, $coms_conect);

                                                        if ($row['text'] > "") {
                                                            echo "<div class='H_font12 H_mb_text15 H_ollips90'>{$row['text']}</div>";
                                                        }

                                                        if ($row['onvan_button'] > "") {
                                                            echo "<a class='thm-btn our-solution H_style_but1' href='{$row['link_button']}'>{$row['onvan_button']}</a>";
                                                        }

                                                        if ($row['image'] > "") {
                                                            echo "<div class='wpmm-grid-post-img-wrap'>
                                                        <div class='wpmm-grid-post-img'>
                                                               <a href='{$row['link_image']}'>
                                                                    <img src='{$row['image']}' alt='{$row['name']}'>
                                                               </a>
                                                              </div>
                                                        </div>";
                                                        }

                                                        if ($row['have_map'] == 1) {
                                                            $src_map = get_result("SELECT address  FROM new_map_address where la='$defult_lang' and site='$site_id'", $coms_conect);
                                                            echo "<div class='H_mt12'>
                                                                                  <iframe src='$src_map'
                                                                                       width='230' height='220'
                                                                                       frameborder='0'
                                                                                       allowfullscreen=''></iframe>
                                                                              </div>";
                                                        }

                                                        if ($row['have_tag'] == 1) {
                                                            echo "<div class='tagcloud' >
                                                                                 <a href = '$href' class='tag-cloud-link tag-link-38 tag-link-position-1'> {$row['name']}</a >
                                                                              </div>";
                                                        }


                                                    //============shop============
                                                        $title_temsetting = $row['id'];

                                                        if ($row['menu_type'] == 7) {

                                                             $query_shop = "select * from new_tem_setting where name='Custom_content_shop_box' and title='$title_temsetting' and la='$defult_lang' and site='$site_id'";
                                                            $result_shop = $coms_conect->query($query_shop);
                                                             //echo $query_shop;
                                                            $row_shop = $result_shop->fetch_assoc();
                                                            if ($row_shop['tem_name'] == 1 || $row_shop['tem_name'] == 2) {

                                                            $cat_id1 = $row_shop["pic"];
                                                            $Property = $row_shop["text"];
                                                            $numb = $row_shop["pic_adress"];
                                                            $id_modules = $row_shop["link"];

                                                            if ($Property == 0)
                                                                $x = 'id';
                                                            if ($Property == 1)
                                                                $x = 'view';

                                                            $table_name9 = get_result("select table_name from new_modules where id=$id_modules", $coms_conect);
                                                            $link_name9 = get_result("select link from new_modules where id=$id_modules", $coms_conect);

                                                            $name = '';
                                                            if ($row_shop['link'] != 9)
                                                                $name = 'name';
                                                            if ($row_shop['link'] == 7)
                                                                $name = 'title';
                                                            $deatils = '';
                                                            if ($row_shop['link'] == 9)
                                                                $deatils = ',deatils';
                                                            $name = 'title';
                                                            $duration = '';
                                                            if ($row_shop['link'] == 8)
                                                                $duration = ',duration,deatils';
                                                            if ($row_shop['link'] == 1 || $row_shop['link'] == 11)
                                                                $duration = ',abstract';
//
                                                            $query111 = "select title ,a.$name $duration $deatils ,a.id,la,site from $table_name9 a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                                                                                                       and site='$site_id' and b.type={$row_shop['link']} and  a.id=b.page_id and b.cat_id='$cat_id1'
                                                                                                       GROUP BY a.id
                                                                                                       order by a.$x desc
                                                                                                       limit 0,$numb";

                                                            //echo $query111;
                                                            $result1111 = $coms_conect->query($query111);
                                                            $module_type = $row_shop['link'];
                                                            ?>

                                                            <? if ($row_shop['tem_name'] == 1) { ?>
                                                                <li class="H_p0">
                                                                    <div class="owl-carousel H_gallery H_neshane_dot H_neshane_nav H_mt7"
                                                                         id="shop">
                                                                        <? $pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
                                                                        while ($RS54 = $result1111->fetch_assoc()) {
                                                                            $sql1w1 = "select adress from new_file_path where type={$row_shop['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                                                            //echo $sql1w1;
                                                                            $result1q = $coms_conect->query($sql1w1);
                                                                            $roww1 = $result1q->fetch_assoc();
                                                                            $module_url = '';
                                                                            if ($row_shop['title'] == 11 || $row_shop['title'] == 1)
                                                                                $module_url = "/$link_name9/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                                                            else
                                                                                $module_url = "/$link_name9/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                                                            if ($row_shop['link'] == 8 || $row_shop['link'] == 9)
                                                                                $RS54['kholase'] = $RS54['deatils'];
                                                                            if ($row_shop['link'] == 1 || $row_shop['link'] == 11)
                                                                                $RS54['kholase'] = $RS54['abstract'];
                                                                            ?>


                                                                            <div class="item ">
                                                                                <a href="<?= $module_url ?>">
                                                                                    <? if ($row_shop['link'] == 8) { ?>
                                                                                        <img title="<?= $RS54['title'] ?>"
                                                                                             src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $row_shop['title']) ?>"
                                                                                             class="H_h180  "
                                                                                             alt="<?= $RS54['title'] ?>">
                                                                                        <span class="play-button"></span>
                                                                                        <?
                                                                                    } else { ?>
                                                                                        <img title="<?= $RS54['title'] ?>"
                                                                                             src="<?= $roww1['adress'] ?>"
                                                                                             class="H_h180  "
                                                                                             alt="<?= $RS54['title'] ?>"
                                                                                        >
                                                                                        <?
                                                                                    } ?>
                                                                                </a>
                                                                                <? $sql120 = "SELECT a.name,a.id from new_modules_cat a ,new_modules_catogory b where
                                                                                                                                a.id=b.cat_id  and cat_id=$cat_id1  group by a.id order by a.rang";
                                                                                //echo $sql120;exit;
                                                                                $resultd10 = $coms_conect->query($sql120);
                                                                                $i = 0;
                                                                                $row_tab = $resultd10->fetch_assoc();
                                                                                if ($row_shop['link'] == 8)
                                                                                    $page_name = 'video';
                                                                                if ($row_shop['link'] == 11)
                                                                                    $page_name = 'content';
                                                                                if ($row_shop['link'] == 1)
                                                                                    $page_name = 'news';
                                                                                if ($row_shop['link'] == 6)
                                                                                    $page_name = 'download';
                                                                                if ($row_shop['link'] == 7)
                                                                                    $page_name = 'article';
                                                                                if ($row_shop['link'] == 9)
                                                                                    $page_name = 'gallery';
                                                                                ?>
                                                                                <span class="post-in-image">
                                                                                                                              <a href="/<?= $page_name ?>/<?= $defult_lang ?>/category/<?= $cat_id1 ?>/<?= $row_tab['name'] ?>"><?= $row_tab['name'] ?></a>
                                                                                                                             </span>

                                                                                <h4 class="grid-post-title H_fonth4_tab block-ellipsis ">
                                                                                    <a class="H_p0"
                                                                                       href="<?= $module_url ?>"><?= $RS54['title'] ?></a>
                                                                                </h4>
                                                                            </div>
                                                                        <? } ?>
                                                                    </div>
                                                                </li>
                                                            <? } elseif ($row_shop['tem_name'] == 2) { ?>
                                                                <li class="H_p25">

                                                                    <?$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
                                                                    while ($RS54 = $result1111->fetch_assoc()) {
                                                                        $sql1w1 = "select adress from new_file_path where type={$row_shop['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                                                        // echo $sql1w1;

                                                                        $result1q = $coms_conect->query($sql1w1);
                                                                        $roww1 = $result1q->fetch_assoc();
                                                                        $module_url = '';
                                                                        if ($row_shop['title'] == 11 || $row_shop['title'] == 1)
                                                                            $module_url = "/$link_name9/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                                                        else
                                                                            $module_url = "/$link_name9/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                                                        if ($row_shop['link'] == 8 || $row_shop['link'] == 9)
                                                                            $RS54['kholase'] = $RS54['deatils'];
                                                                        if ($row_shop['link'] == 1 || $row_shop['link'] == 11)
                                                                            $RS54['kholase'] = $RS54['abstract'];
                                                                        ?>
                                                                        <div class="H_text_right H_h100px">
                                                                            <a class="H_p0 " href="<?= $module_url ?>">
                                                                                <?
                                                                                if ($row_shop['link'] == 8) { ?>
                                                                                    <img title="<?= $RS54['title'] ?>"
                                                                                         src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $row_shop['title']) ?>"
                                                                                         class="H_h75 H_w80 H_img_style"
                                                                                         alt="<?= $RS54['title'] ?>">
                                                                                    <span class="play-button"></span>
                                                                                    <?
                                                                                } else { ?>
                                                                                    <img title="<?= $RS54['title'] ?>"
                                                                                         src="<?= $roww1['adress'] ?>"
                                                                                         class="H_h75 H_w80 H_img_style"
                                                                                         alt="<?= $RS54['title'] ?>">
                                                                                    <?
                                                                                } ?>
                                                                                <span class="product-title  "><?= $RS54['title'] ?></span>
                                                                            </a>
                                                                            <script>
                                                                                $('.H_neshane_style_p > p').css({
                                                                                    'text-align': 'right',
                                                                                    'line-height': '2',
                                                                                    'margin-top': '10px'
                                                                                })
                                                                            </script>
                                                                        </div>
                                                                        <?
                                                                    } ?>
                                                                </li>
                                                                <?
                                                            }}
                                                        }
                                                    //============end shop============


                                                        echo "</li>";
                                                        echo "</ul>";
                                                        echo "</li>";
                                                        echo "<script>
                                                    $('.dropdown.H_neshane > ul > li').addClass(' col-md-3');
                                                    $('.dropdown.H_neshane > ul > li >ul >li>ul>li').addClass('col-md-12 H_p0 H_r10');
                                                  
                                                    </script>";
                                                    }
                                                    echo "</ul>";
                                                }
                                            }

                                            $sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$defult_site' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
                                            //echo $sql44;exit;
                                            $result44 = $coms_conect->query($sql44);
                                            while ($row44 = $result44->fetch_assoc()) {
                                                $target = get_target($row44['target']);
                                                $href = $row44['link'];
                                                $li = '';

                                                if (check_has_child($row44['id'], $row44['site_id'], $row44['la'], $coms_conect) == 1) {
                                                    $li = 'dropdown-toggle';
                                                }

                                                if ($row44['header_icon'] !== 'fa-nonicon') {
                                                    $icon_tetr44 = "<span class='wpmm-selected-icon '><i class='fa {$row44['header_icon']}'></i></span>";
                                                } elseif ($row44['icon_link'] > "") {
                                                    $icon_tetr44 = "<img  alt='{$row44['onvan_img']}' class=' H_hw15' src='{$row44['icon_link']}'>";
                                                }

                                                if ($row44['onvan_label'] > "" || $row44['onvan_label'] !== "NULL") {
                                                    $icon_lable44 = "<span class='wpmm-badge wpmm-badge-danger'>{$row44['onvan_label']}</span>";
                                                }else $icon_lable44 = "";

                                                echo "<li class='dropdown H_neshane dropdown-mega'>";
                                                echo "<a  class='$li ' $target   href='$href' >$icon_tetr44 {$row44['name']}$icon_lable44</a>";

                                                create_main_menu_index_megaitem($row44['id'], $defult_site, $defult_lang, $coms_conect);
                                                echo "</li>";
                                            } ?>
                                            <script>
                                                $('.dropdown > ul.H_style_ul li.col-md-4 > ul> li > a:first-child').addClass('H_pr0');
                                                $('.dropdown > ul.H_style_ul li.col-md-4 > ul> li > a:first-child').next().next().addClass('H_mr0');
                                            </script>



                                        </ul>

                                    </nav>
                                </div>
                            </nav>
                            <div class="header-box-03 col-xs-12 col-md-2 H_left H_ptb18">
                                <? $header_title = get_tem_result($site, $la, "header_title", $tem, $coms_conect); ?>
                                <a class="menuzord-brand pull-left flip" href="<?= $header_title['link'] ?>"><img src="<?= $header_title['pic_adress'] ?>" alt="drbanihosseini"></a>

                            <button class="btn header-btn-collapse-nav menu-icon"
                                    onclick="openNav3();openOffcanvas()" data-toggle="offCanvas"
                                    data-target=".header-nav-main">
                                <i class="fa fa-bars"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    <script>
        $(function () {
            $('.H_search').click(function (e) {
                $('.search-box').addClass('is-visible');
                $('.search-box__overlay').addClass('is-visible');
            });
        });
        $(function () {
            $('.close-button').click(function (e) {
                $('.search-box').removeClass('is-visible');
                $('.search-box__overlay').removeClass('is-visible');
            });
        });
        $(function () {
            $('.search-box__overlay').click(function (e) {
                $('.search-box').removeClass('is-visible');
                $('.search-box__overlay').removeClass('is-visible');
            });
        });



    </script>
</header>

<script>
    $(document).ready(function () {
        $('.has-submenu').on('click', function () {
            $(this).find('ul:first').addClass('is-active');
            // $(this).has('.is-drilldown-submenu-parent').hide();
            if ($(this).find('ul:first > .js-drilldown-back').length) {
                console.log('exist');
            } else {
                console.log('not exist');
                $(this).find('ul:first').prepend("<li class='js-drilldown-back'><a><b><?=$view_back?></b></a></li>");
            }
        });

        $('.is-submenu-item').on('click', function () {
            $(this).find('.is-drilldown-submenu').css("margin-top", "-51px");
        });

    });

    $(document).on('click', '.js-drilldown-back', function () {
        // alert('aaaaaaaaaaa');
        $(this).closest('.is-drilldown-submenu').removeClass('is-active');
        // $(this).closest('.is-drilldown-submenu-parent').show();
    });
</script>

<script>
    function closeOffcanvas() {
        document.getElementById("myOffcanvas").style.width = "0%";
        document.getElementById("mainContent").style.marginLeft = "0%";
        document.body.style.backgroundColor = "white";
        document.getElementById("myCanvasNav").style.width = "0%";
        document.getElementById("myCanvasNav").style.opacity = "0";
    }

    function openOffcanvas() {
        document.getElementById("myOffcanvas").style.width = "250px";
        document.getElementById("mainContent").style.marginLeft = "-250px";
    }

    function openNav3() {
        document.getElementById("myCanvasNav").style.width = "100%";
        document.getElementById("myCanvasNav").style.opacity = "0.5";
    }
</script>
<!--open search box-->
<script>
    $(function () {
        $('.search-btn').click(function () {
            $(this).toggleClass('open');
            $('.search-box__dropdown').toggleClass('open');
        })
    });
    //    button shop
    $(function () {
        $('.shopping-btn').click(function () {
            $('.shopping-cart__dropdown').toggleClass('active');
        })
    });
</script>
<!-- scroll menu-->
<script>

        /**
         * detect scroll more than 50px
         */

        var x = 60;
        var wight = $(window).width();
        $(window).bind("scroll", function () {
            if (wight <= 564) {
                if ($(this).scrollTop() > x) {
                    $('.stricky').addClass('stricky-fixed');

                }
                else {
                    $('.stricky').removeClass('stricky-fixed');
                }
            }
        });

        var y = 45;
        var wightlg = $(window).width();
        $(window).bind("scroll", function () {
            if (wightlg > 564) {
                if ($(this).scrollTop() > y) {
                    $('.stricky').addClass('stricky-fixed');
                }
                else {
                    $('.stricky').removeClass('stricky-fixed');
                }
            }
        });

</script>

<script>
    $(document).ready(function () {
        $('.dropdown-mega > ul').addClass('H_p20 H_w100');
    })
</script>

<script>
    $(document).ready(function () {

        $("#shop").owlCarousel({
            rtl: true,
            lazyLoad: true,
            nav: true,
            loop: false,
            navText: ["", ""],
//                                                     navText: [""],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }

        });


    });
</script>
<script>
    $(document).ready(function () {
        $("#shopmobile").owlCarousel({
            rtl: true,
            lazyLoad: true,
            nav: true,
            loop: false,
            navText: ["", ""],
//                                                     navText: [""],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }

        });
    });
</script>

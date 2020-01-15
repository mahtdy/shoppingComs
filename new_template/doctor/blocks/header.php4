<!DOCTYPE html>
<?if($defult_site!='main')
    $root='../';else
    $root='';
$now=time();

$site=$defult_site;
$la=$defult_lang;
$tem=$tem_name;
$domain_url=$_SERVER['SERVER_NAME'];
?>
<html lang="<?=$defult_lang?>">
<head>
    <meta charset="UTF-8">

    <?if($nav_title>""){
        $site_title=$nav_title;
        $sub_class="page-sub-page";
    }
    else{
        $header_titleee= get_tem_result($defult_site,$defult_lang,"header_title",'default',$coms_conect);
        $site_title=$header_titleee['title'];
    }
    if($_GET['q']>""){
        $q=injection_replace($_GET['q']);
    }
    ?>

    <html lang="<?=$defult_lang?>">
    <head>

        <?if($nav_title>""){
            $site_title=$nav_title;
            $sub_class="page-sub-page";
        }
        else{
            $header_titleee= get_tem_result($defult_site,$defult_lang,"header_title",$tem,$coms_conect);
            $site_title=$header_titleee['title'];
        }
        if($_GET['q']>""){
            $q=injection_replace($_GET['q']);
        }
        ?>
        <!DOCTYPE html>
        <head>
            <?$header_title= get_tem_result($site,$la,"header_title",$tem,$coms_conect);?>
            <!-- Basic Page Needs
            ================================================== -->
            <title><?=$header_title['title']?></title>
            <meta name="keywords" content="<?=get_meta_keyword($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,'default')?>"/>
            <meta property="og:image" content="<?if($meta_pic[2]=='')echo $domain_url;else echo $meta_pic[2]?>" />
            <meta name="description" content="<?=get_meta_descripton($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,'default')?>"/>
            <meta name="robots" content="noodp"/>
            <link rel="canonical" href="<?=$domain_url?>" />
            <meta property="og:locale" content="fa_IR" />
            <meta property="og:type" content="article" />
            <meta property="og:title" content="<?=$site_title?>">
            <meta property="og:description" content="<?=get_meta_descripton($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,$tem)?>">
            <meta property="og:url" content="<?=$domain_url?>" />
            <meta property="og:site_name" content=" " />
            <?$module_tag_function=get_module_tag_function($url_temp[1],$madual_id,$coms_conect);
            if(count($module_tag_function)>0){
                foreach($module_tag_function as $tag_val){?>
                    <meta property="article:tag" content="<?=$tag_val?>" />
                <?}
            }?>
            <meta property="article:section" content="<?=get_header_category($url_temp[1],$madual_id,$coms_conect);?>" />
            <?$module_date_function=get_header_time_create($url_temp[1],$madual_id,$coms_conect);
            if($module_date_function['date']!='1970-01-01 03:01:01'&&$module_date_function['date']!=""){?>
                <meta property="article:published_time" content="<?=$module_date_function['date']?>" />
                <meta property="article:modified_time" content="<?=$module_date_function['edit_date']?>" />
                <meta property="og:updated_time" content="<?=$module_date_function['edit_date']?>" />
            <?}?>
            <meta property="og:image" content="<?if($meta_pic[2]=='')echo $domain_url;else echo $meta_pic[2]?>" />
            <?if($meta_pic[2]!=''){?>
                <meta property="og:image:width" content="<?=$meta_pic[0]?>" />
                <meta property="og:image:height" content="<?=$meta_pic[1]?>" />
            <?}?>
            <meta name="twitter:card" content="summary" />
            <meta name="twitter:description" content="<?=get_meta_descripton($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,$tem)?>">
            <meta name="twitter:title" content="<?=$site_title?>">
            <meta name="twitter:image" content="<?=$meta_pic[2]?>">
            <!-- Web Fonts  -->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">


            <!-- Vendor CSS -->

            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/bootstrap/css/bootstrap.min.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/bootstrap-rtl/bootstrap-rtl.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/font-awesome/css/font-awesome.min.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/animate/animate.min.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/simple-line-icons/css/simple-line-icons.min.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/owl.carousel/assets/owl.carousel.min.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/owl.carousel/assets/owl.theme.default.min.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/magnific-popup/magnific-popup.min.css" >


            <!-- Theme CSS -->
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/custom.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/rtl-theme.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/rtl-theme-elements.css" >
            <!-- Current Page CSS -->
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/rs-plugin/css/settings.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/rs-plugin/css/layers.css" >
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/rs-plugin/css/navigation.css" >

            <!-- Skin CSS -->
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/skin-medical.css" >
            <!-- Demo CSS -->
            <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/rtl-demo-medical.css" >


            <!-- Head Libs -->
            <script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/modernizr/modernizr.min.js"></script>

            <script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/jquery/jquery.min.js"></script>
            <script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/jquery.appear/jquery.appear.min.js" ></script>
            <script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/jquery.easing/jquery.easing.min.js" type="text/javascript"></script>
            <script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/jquery-cookie/jquery-cookie.min.js" type="text/javascript"></script>


        </head>

<?if($_SESSION['site']!='main')
include '../new_dynamics/default/new_popup_login.php4';
else
include 'new_dynamics/default/new_popup_login.php4';?>

<body >

<div class="body">
    <header id="header" class="header-narrow" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 35, 'stickySetTop': '-35px', 'stickyChangeLogo': false} ">
        <div class="header-body">
            <div class="header-top header-top header-top-style-3 header-top-custom">
                <div class="container">

                    <div class=" header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse H" style="float: right;top: 0;">
                        <nav id="navigation">
                            <!-- name user login -->
                            <?if($_SESSION["new_okusername"]>""){?>
                                <ul class="dropdown-menu H_user" >
                                    <li class='dropdown dropdown-full-color dropdown-secondary'><a  href="#" > سلام <?=$_SESSION["new_name"] .' '. $_SESSION["new_family"]?> ! </a>
                                        <ul class="dropdown-menu H_sub" >
                                            <li class='dropdown dropdown-full-color dropdown-secondary' style="    float: right; font-size: 10px;margin: 0;"><a href="/profile/<?=$defult_lang?>">پروفایل</a></li>
                                            <li style="float: right;font-size: 10px; margin: 0;"><a href="/logout/<?=$defult_lang?>">خروج</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <?}?>
                            <!--  End name user login -->
                        </nav>
                    </div>

                    <nav class="  header-nav-top pull-left">
                        <? $header1 = get_tem_result($site, $la, "header1", $tem, $coms_conect); ?>
                        <ul class="nav nav-pills" style="padding-right: 170px;">
                            <li class="hidden-xs">
                                <span class="ws-nowrap"><i class="icon-location-pin icons"></i> <?= $header1['title'] ?></span>
                            </li>
                            <li class="hidden-xs">
                                <span class="ws-nowrap"><i class="icon-envelope-open icons"></i> <a class="text-decoration-none" href="<?= $header1['link'] ?>"><?= $header1['text'] ?></a></span>
                            </li>
                            <li>
                                <span class="ws-nowrap"><i class="icon-call-out icons"></i></i> <?= $header1['pic'] ?></span>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
            <? $header_title = get_tem_result($site, $la, "header_title", $tem, $coms_conect); ?>
            <div class="header-container container">
                <div class="header-row">

                    <div class="header-column" style="padding-top: 12px;">
                        <div class="header-column" style="float: left">
                            <div class="header-logo" >
                                <a href="<?= $header_title['link'] ?>">
                                    <img alt="Porto" width="143" height="40" src="<?= $header_title['pic_adress'] ?>">
                                </a>
                            </div>
                        </div>
                        <div class="header-row">
                            <div class="header-nav pt-xs">
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                    <nav id="navigation">
                                        <!-- Main Navigation -->
                                        <ul class="nav nav-pills" id="mainNav">
                                            <?function create_main_menu_index($parentID,$site_id,$defult_lang,$coms_conect){
                                                $sql = "SELECT * FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
                                                $result = $coms_conect->query($sql);
                                                if ($result->num_rows > 0) {
                                                    echo "<ul class='dropdown-menu '>";
                                                    while($row = $result->fetch_assoc()) {
                                                        $target=get_target ($row['target']);
                                                        $href=$row['link'];
                                                        echo "<li class='dropdown dropdown-full-color dropdown-secondary'>";
                                                        echo "<a $target  href='$href'><b>{$row['name']}</b></a>";
                                                        create_main_menu_index($row['id'],$site_id,$defult_lang,$coms_conect);
                                                        echo "</li>";
                                                    }
                                                    echo "</ul>";
                                                }
                                            }
                                            $sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$defult_site' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
                                            $result44 = $coms_conect->query($sql44);
                                            while($row44 = $result44->fetch_assoc()) {
                                                $target=get_target ($row44['target']);
                                                $href=$row44['link'];
                                                echo "<li class='dropdown dropdown-full-color dropdown-secondary' >";
                                                echo  "<a $target   href='$href' > {$row44['name']}</a>";
                                                create_main_menu_index($row44['id'],$defult_site,$defult_lang,$coms_conect);
                                                echo "</li>";
                                            }?>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


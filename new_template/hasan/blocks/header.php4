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



        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/default.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/component.css"/>


<!--        <link rel="stylesheet" href="--><?//=$subdomian_add?><!--/new_template/--><?//="$tem_name/$defult_dir"?><!--/css/theme.css">-->
<!--        <script src="--><?//=$subdomian_add?><!--/new_template/--><?//="$tem_name/$defult_dir"?><!--/js/jquery.min.js"></script>-->
        <script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery-1.12.3.min.js"></script>
        <script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/modernizr.custom.js"></script>

        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/theme.css">

        <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/bootstrap.css" >
        <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/style.css">
        <link rel="stylesheet" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/colors/main.css" id="colors">

    </head>

    <?if($_SESSION['site']!='main')
        include '../new_dynamics/hasan/new_popup_login.php4';
    else
        include 'new_dynamics/hasan/new_popup_login.php4';?>

<body style="overflow-x:hidden; <?if($nav_title)echo 'subpage'?>">

<!-- Wrapper -->
<div id="wrapper" style="    background: linear-gradient(to bottom, rgb(247, 247, 247) 0%, rgba(255,255,255,0.5));">

    <!-- Header Container
    ================================================== -->
    <header id="header-container" style="    background: white" >

        <!-- Header -->
        <div id="header" <?if(isset($madual_file_name)&&$madual_file_name=='new_news_text') echo 'style="position: static"'?> >
            <div class="container">
                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Mobile Navigation -->

                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
                        </button>
                    </div>

                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1" style="direction: rtl">

                        <ul id="responsive">
                            <?function create_main_menu_index($parentID,$site_id,$defult_lang,$coms_conect){
                                $sql = "SELECT * FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
                                $result = $coms_conect->query($sql);
                                if ($result->num_rows > 0) {
                                    echo "<ul>";
                                    while($row = $result->fetch_assoc()) {
                                        $target=get_target ($row['target']);
                                        $href=$row['link'];
                                        echo "<li class=''>";
                                        echo "<a   $target  href='$href'>{$row['name']}</a>";
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
                                echo "<li>";
                                echo  "<a $target   href='$href' > {$row44['name']}</a>";
                                create_main_menu_index($row44['id'],$defult_site,$defult_lang,$coms_conect);
                                echo "</li>";
                            }?>

                        </ul>
                        <!-- name user login -->
                        <?if($_SESSION["new_okusername"]>""){?>
                                <ul class="H_dropdown-menu" >
                                    <li><a  href="#" style=" color: #1558f7;"> سلام <?=$_SESSION["new_name"] .' '. $_SESSION["new_family"]?> ! </a>
                                        <ul>
                                            <li style="    float: right; font-size: 10px;"><a href="/profile/<?=$defult_lang?>">پروفایل</a></li>
                                            <li style="    float: right;font-size: 10px;"><a href="/logout/<?=$defult_lang?>">خروج</a></li>
                                        </ul>
                                    </li>
                                </ul>
                        <?}?>
                        <!--  End name user login -->
                    </nav>

                    <div class="clearfix"></div>

                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->



                <!-- Logo -->

                <div id="logo">
                    <a href="<?=$header_title['link']?>"><img src="<?=$header_title['pic_adress']?>" alt="<?=$header_title['title']?>"></a>
                </div>



                <!-- Right Side Content / End -->

                <!-- Sign In Popup -->
                <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">

                    <div class="small-dialog-header">
                        <h3>ورود</h3>
                    </div>

                    <!--Tabs -->
                    <div class="sign-in-form style-1">

                        <ul class="tabs-nav">
                            <li class=""><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#tab1">ورود</a></li>
                            <li><a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#tab2">ثبت نام</a></li>
                        </ul>

                        <div class="tabs-container alt">

                            <!-- Login -->
                            <div class="tab-content" id="tab1" style="display: none;">
                                <form method="post" class="login">

                                    <p class="form-row form-row-wide">
                                        <label for="username">نام کاربری:
                                            <i class="im im-icon-Male"></i>
                                            <input type="text" class="input-text" name="username" id="username"
                                                   value=""/>
                                        </label>
                                    </p>

                                    <p class="form-row form-row-wide">
                                        <label for="password">پسورد:
                                            <i class="im im-icon-Lock-2"></i>
                                            <input class="input-text" type="password" name="password" id="password"/>
                                        </label>
                                        <span class="lost_password">
										<a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#">Lost Your Password?</a>
									</span>
                                    </p>

                                    <div class="form-row">
                                        <input type="submit" class="button border margin-top-5" name="login"
                                               value="Login"/>
                                        <div class="checkboxes margin-top-10">
                                            <input id="remember-me" type="checkbox" name="check">
                                            <label for="remember-me">Remember Me</label>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <!-- Register -->
                            <div class="tab-content" id="tab2" style="display: none;">

                                <form method="post" class="register">

                                    <p class="form-row form-row-wide">
                                        <label for="username2">Username:
                                            <i class="im im-icon-Male"></i>
                                            <input type="text" class="input-text" name="username" id="username2"
                                                   value=""/>
                                        </label>
                                    </p>

                                    <p class="form-row form-row-wide">
                                        <label for="email2">Email Address:
                                            <i class="im im-icon-Mail"></i>
                                            <input type="text" class="input-text" name="email" id="email2" value=""/>
                                        </label>
                                    </p>

                                    <p class="form-row form-row-wide">
                                        <label for="password1">Password:
                                            <i class="im im-icon-Lock-2"></i>
                                            <input class="input-text" type="password" name="password1" id="password1"/>
                                        </label>
                                    </p>

                                    <p class="form-row form-row-wide">
                                        <label for="password2">Repeat Password:
                                            <i class="im im-icon-Lock-2"></i>
                                            <input class="input-text" type="password" name="password2" id="password2"/>
                                        </label>
                                    </p>

                                    <input type="submit" class="button border fw margin-top-10" name="register"
                                           value="Register"/>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Sign In Popup / End -->

            </div>
        </div>
        <!-- Header / End -->



    </header>


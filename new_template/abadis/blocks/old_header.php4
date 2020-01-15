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
<html lang="<?=$defult_lang?>">
<head>
    <meta charset="UTF-8">
    	<?if($nav_title>""){
		$site_title=$nav_title;
		$sub_class="page-sub-page";
		}
		else{
			$header_titleee= get_tem_result($defult_site,$defult_lang,"header_title",$tem_name,$coms_conect);
			$site_title=$header_titleee['title'];
		}
		 if($_GET['q']>""){
		$q=injection_replace($_GET['q']);
		}
		?>	
    <title><?=$site_title?></title>
	<meta name="description" content="<?=get_meta_descripton($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,$tem_name)?>"/>
    <meta name="keywords" content="<?=get_meta_keyword($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,$tem_name)?>"/>
   
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
	<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.min.js"></script>
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
                                            <a href="#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <h5>
                                                    ساعت 14:35
                                                </h5>
                                                <p>
                                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
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
                   							 <?$sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$defult_site' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
			                	$result44 = $coms_conect->query($sql44); 
									while($row44 = $result44->fetch_assoc()) {
										$target=get_target ($row44['target']);
					                    $href=$row44['link'];
					                	echo "<li>";
							            echo  "<a $target   href='$href' > {$row44['name']}</a>";
							            create_main_menu_index($row44['id'],$defult_site,$defult_lang,$coms_conect);
							            echo "</li>";							
					                }
								function create_main_menu_index($parentID,$site_id,$defult_lang,$coms_conect){
								$sql = "SELECT * FROM new_menu WHERE parent_id='$parentID' and site_id='$site_id' and la='$defult_lang' and float_menu=0 and status=1 ORDER BY rang";
							 	$result = $coms_conect->query($sql);
									if ($result->num_rows > 0) {
									 	echo "<ul>";
										while($row = $result->fetch_assoc()) {
												$target=get_target ($row['target']);
												$href=$row['link'];
												echo "<li class='$li_class'>";
												echo "<a   $target  href='$href'>{$row['name']}</a>";
											   create_main_menu_index($row['id'],$site_id,$defult_lang,$coms_conect);
												echo "</li>";				
											}
										echo "</ul>";
									}
					            }			
	 								?>
                </ul>
            </div>
            <div class="col-sm-6 col-xs-12" style="padding-left: 0">
                 <div class="sr-login pull-left">
				    <a href="/fa">
                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/Flag_of_Iran.svg.png" alt="" style="width:20px; height: 20px">
                    </a>
                    <a href="/en">
                        <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/175px-Flag_of_the_United_Kingdom_(3-5).svg.png" alt="" style="width:20px; height: 20px">
                    </a>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <a href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/#" data-toggle="modal" data-target="#myModal" class="sr-membership">
                            <?=$seramic_login?>
                        </a>
						<a href="/register/<?=$defult_lang?>" class="sr-membership">|  <?=$seramic_register?>
						</a>

                        <!-- Modal1 -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close pull-left" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModal1Label">
                                            <?=$seramic_user?>
                                        </h4>
                                    </div>
									<div class="modal-body">

                                        <div class="sr-login-form">
                                             <form>
                                                        <div class="form-group">
                                                            <div class="required">
                                                                <i class="fa fa-user"></i>
                                                            </div>
                                                            <input type="text" class="form-control1" id="username" placeholder="<?=$seramic_username?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="required">
                                                                <i class="fa fa-lock"></i>
                                                            </div>

                                                            <input type="text" class="form-control1" id="password" placeholder="<?=$seramic_password?> ">
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                 <div class="col-md-4 pull-left ">
                                                                     <img src="/new_dynamics/captcha.php" style="width:73%">
                                                                 </div>
                                                                 <div class="col-md-8 pull-right ">
                                                                     <input name="modal_com1_captcha" class="form-control2" placeholder="<?=$seramic_security_code?>" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-numeric="true" data-fv-numeric-message="اين فيلد عددي است">
                                                                 </div>
                                                            </div>
                                                         </div>
                                                        <button type="button" class=" btn-danger sr-login-button">
                                                            <?=$seramic_login?>
                                                        </button>
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
                <a href="#">

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
                    <a href="#" id="menu-button" class="collapsed">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </a>

                    <nav id="main-nav" role="navigation">
                        <ul id="main-menu" class="sm sm-rtl sm-mint collapsed">
                            <li><a href="#">
                                خدمات
                            </a></li>
                            <li><a href="#">
                                امور مشتریان
                            </a>
                                <ul>
                                    <li><a href="#">
                                        تعرفه ها
                                    </a></li>
                                    <li><a href="#">
                                        پشتیبانی
                                    </a></li>
                                    <li><a href="#">
                                        امور نماینده ها
                                    </a>
                                        <ul>
                                            <li><a href="#">
                                                درباره ما
                                            </a></li>
                                            <li><a href="#">
                                                زیر منو
                                            </a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"> تعرفه ها</a></li>
                            <li><a href="#">پشتیبانی</a>
                                <ul>
                                    <li><a href="#">پشتیبانی</a></li>
                                    <li><a href="#">انجمن ها</a></li>
                                </ul>
                            </li>
                            <li><a href="#">امور نمایندگی</a></li>
                            <li><a href="#">درباره ما</a></li>
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
						<?for($i=1;$i<=10;$i++){
						$menu_bar= get_tem_result($site,$la,"menu_bar$i",$tem,$coms_conect);
						$vaidostr='';
						if($menu_bar['title']==8)
						 $vaidostr=",duration";
						if($menu_bar['title']>0){?>  
                        <li class="dropdown dd_static" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <p class="mico_title animated zoomIn">
                                    <span class="fa fa-sort-down"></span>
                                    <?$cat_table='';
									$cat_sondition='';
									$module_adress=get_result("select link from new_modules where id={$menu_bar['title']}",$coms_conect);
									if($menu_bar['link']==0){
									$module_name=get_result("select name from new_modules where id={$menu_bar['title']}",$coms_conect);
									
									}
									
									else{
									$cat_table= ', new_modules_catogory c';
									$cat_sondition=" and c.type={$menu_bar['title']} and a.id=c.page_id and c.cat_id={$menu_bar['link']}";
									$module_name=get_result("select name from new_modules_cat where id={$menu_bar['link']}",$coms_conect);
									}
									
									echo $module_name;
									 ?>
                                </p>
                            </a>
                            <ul class="dropdown-menu fullwidth msubmenu pnumber">
                                <li>
                                    <div class="row col-lg-12 submenu-part">
									 	<?$table_name=get_result("select table_name from new_modules where id={$menu_bar['title']}",$coms_conect);
										$query="select title,a.id,la,site,adress $vaidostr from $table_name a,new_file_path b $cat_table where   b.type={$menu_bar['title']}
										and b.type={$menu_bar['title']} and a.id=b.id 
										$cat_sondition
										group by b.id
										order by a.id desc
										 limit 0,6"; 
										$result = $coms_conect->query($query);
										while($RS = $result->fetch_assoc()) {
										$module_url='';
										if($menu_bar['link']==0)
										$module_url="/$module_adress/{$RS['la']}/{$RS['id']}/".insert_dash($RS['title']);
										 
												?>
                                        <div class="col-lg-2 col-md-3 col-sm-3 submenu-part2">
                                            <a class="hvr-grow" href="<?=$module_url?>">
												<?if($menu_bar['title']==8){ ?>
												<span class="video-play-btn"> 
                                                    <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                                </span>
												<?}?>
                                                <img title="<?=$RS['title']?>" alt="<?=$RS['title']?>" width="100%" height="133px" src="<?=get_modual_pic_address($RS['adress'],$RS['site'],$domain,$menu_bar['title'])?>">
                                            </a>
											<?if($menu_bar['title']==8){ ?>
												<span class="menu-video-duration"><?=$RS['duration']?></span>
											<?}?>
                                            <h5>
                                                <a>
                                                   <?=$RS['title']?>
                                                </a>
                                            </h5>


                                        </div>
                            
                       
									<?}?>
                                    </div>
                                    <div class="row col-lg-12 sr-submenu-link">
                                        <ul>
											<?for($j=1;$j<=$menu_bar['pic'];$j++){
												$menu_bar_item= get_tem_result($site,$la,"menu_bar_item$i$j",$tem,$coms_conect);
												if($menu_bar_item['title']>""){?>
													<li>
														<a href="<?=$menu_bar_item['link']?>">
															<?=$menu_bar_item['title']?>
														</a>
													</li>
												<?}
											}?>

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>
						<?}
						}?>
 
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
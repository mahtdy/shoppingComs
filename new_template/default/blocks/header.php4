<!DOCTYPE html>
<?if($defult_site!='main')
$root='../';else
$root='';	
$now=time();
?> 
<html lang="<?=$defult_lang?>">
<head>

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
	
    <title><?=$site_title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="COMS">
    <meta name="alexaVerifyID" content=""/> 
    <meta name="description" content="<?=get_meta_descripton($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,'default')?>"/>
    <meta name="keywords" content="<?=get_meta_keyword($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,'default')?>"/>
    <meta name="seo_title" content="<?=get_seo_title($defult_site,$defult_lang,$madual_id,$url_temp[1],$coms_conect,$madual_cat_id,'default')?>"/>
    <link rel="canonical" href=""/>
    <!--og-->

    <meta property="og:image" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <!--twitter-->
    <meta name="twitter:card" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:description" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:creator" content=""/>
    <!---stylesheets start-->
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/head-foot.css">
 
    <!-- data-main attribute tells require.js to load
             scripts/main.js after require.js loads. -->
 
    <script src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/js/jquery.min.js"></script>
</head>

<?if($_SESSION['site']!='main')
include '../new_dynamics/default/new_popup_login.php4';
else 
include 'new_dynamics/default/new_popup_login.php4';?>

<body style="overflow-x:hidden; <?if($nav_title)echo 'subpage'?>">
<div class="container-fluid">
    <div class="row">

        <a href="#top" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
            <div class="gtop">
                <span class="fa fa-angle-up animated infinite fadeInUp"></span>
            </div>
        </a>


        <!-- Modal -->
   

       
        <!-- /#wrapper -->
        <!-- /#sidebar-wrapper -->
        <!-- Start Header Section -->
        <header>

            <!-- Start Header TopMenu -->
            <section class="top hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 pull-right rtl animated fadeIn pr0">
                            <ul>
								<?for($i=1;$i<=6;$i++){
									$up_link_link= get_tem_result($defult_site,$defult_lang,"up_link_link$i",'default',$coms_conect);?>
									<li><a href="<?=$up_link_link['link']?>"><?=$up_link_link['title']?></a></li>
								<?}?>	
                            </ul>
                        </div>
                        <div class="col-md-6 pull-left ltr animated fadeIn">
                            <ul class="fa">
								<?for($i=1;$i<=6;$i++){?>
							 
									<?$header_icon= get_tem_result($defult_site,$defult_lang,"header_icon$i",'default',$coms_conect);?>
									<li><a title="<?=$header_icon['title']?>" href="<?=$header_icon['link']?>"><span class="fa <?=$header_icon['pic']?>"></span></a></li>
										<?}?>
                            </ul>
							<!-- Single button -->
							<?if($_SESSION["new_okusername"]>""){?>
							<div class="btn-group">
							  <button type="button" class="btn dropdown-toggle btn_login" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#3D4348;">
								<?=$_SESSION["new_name"] .' '. $_SESSION["new_family"]?><span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu login_list">
								<li><a href="/profile/<?=$defult_lang?>">پروفایل</a></li>
								<li><a href="/logout/<?=$defult_lang?>">خروج</a></li>
							  </ul>
							</div>
							<?}?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Start Header Logo -->
            <section class="middle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 pull-right rtl animated fadeIn">
                            <figure>
							<?$header_titleee= get_tem_result($defult_site,$defult_lang,"header_title",'default',$coms_conect);?>
							    <img src="<?=$header_titleee['pic_adress']?>" alt="<?=$site_title?>"/>
                            </figure>
                        </div>

                        <div class="col-md-6 col-sm-6 hidden-xs form-group pull-left">
                            <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-default btn-lg pull-left" data-toggle="modal"
                                    data-target="#myModal"><span class="fa fa-user"></span>حساب کاربری
                            </button>
                        </div>

                        <a href="#" id="menu-button" class="collapsed">
								<i class="fa fa-bars" aria-hidden="true"></i>
                        </a>

                    </div>
                </div>
            </section>

            <!-- Start Mainmenu -->
            <section class="bottom">
                <div class="container">
					<nav id="main-nav" role="navigation">
                        <ul id="main-menu" class="sm sm-rtl sm-mint collapsed">
                      							 <?function create_main_menu_index($parentID,$site_id,$defult_lang,$coms_conect){
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
                   
				   </nav>
					 
				<script type="text/javascript" src="<?=$subdomian_add?>/yep_theme/default/<?=$defult_dir?>/js/bootstrapvalidator/formValidation.min.js"></script>
				<script src="<?=$subdomian_add?>/yep_theme/default/<?=$defult_dir?>/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
				<link href="<?=$subdomian_add?>/yep_theme/default/<?=$defult_dir?>/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
				<script>
				$(document).ready(function() {
					$('#member_attributeForm').formValidation();
				});
				</script>
				
                </div>
            </section>
    </header>
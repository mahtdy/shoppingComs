<?php 
 
if($_SERVER["HTTP_HOST"]=='localhost')
 $ffmpeg = "C:\\xampp\\ffmpeg\\bin\\ffmpeg.exe";
else 
$ffmpeg='ffmpeg';	
ob_start();@session_start();//error_reporting(E_ERROR | E_PARSE);
$now=time();
if(!isset($_SESSION['manager_user_name_sms']))
header('Location: new_manager_signout.php');
if(!isset($_SESSION['manager_user_name']))
header('Location: new_manager_signout.php');	
include_once("newcoms/function.php");
include_once("newcoms/Database.php");
include_once("newcoms/jdf.php");
include_once("newcoms/coms_jdf.php");
$default_site='main';

$sql="select * from new_sms_webservice";
$result = $coms_conect->query($sql);
$row = $result->fetch_assoc();  
$sms_url=$row['url'];  
$sms_password=$row['sms_password'];  
$sms_user=$row['sms_user'];  
$senderNumbers=$row['senderNumbers'];  
  
 /* 
$arr_attach=array("email"=>'dddddd',"date"=>time(),"text"=>'ffff',"manager_id"=>$manager_id);
insert_to_data_base($arr_attach,'new_email_archive',$coms_conect);  
 */ 

if(isset($_POST['lang']))
$_SESSION['page_languege']=injection_replace($_POST['lang']);
$default_lang=$_SESSION['page_languege'];
################عوض کردن زبان############
if($_POST['lang']>""){
	
	$change_lang=injection_replace($_POST['lang']);
	include_once "languages/$change_lang.php" ;
	$_SESSION['menu_lang']="";
	$_SESSION['menu_lang']=$new_sysmenu;
}else
include_once "languages/".$_SESSION['page_languege'].".php" ;
#######################
$la=$_SESSION['page_languege'];

$yep=injection_replace($_GET["yep"]);
 
$menu_id=get_result("SELECT id FROM  new_main_menu  WHERE file_path='$yep'",$coms_conect);
$menu_parrent_id=get_result("SELECT parent_id FROM  new_main_menu  WHERE file_path='$yep'",$coms_conect);
								
$manager_id=$_SESSION['manager_id'];
$manager_la=$_SESSION['manager_lang'];
$manager_group=$_SESSION['manager_group'];
//echo $manager_group.'jjj';exit;
$manager_site=$_SESSION['manager_site'];
$custom_ip=$_SERVER['REMOTE_ADDR'];
$domain_name= $_SERVER['HTTP_HOST'] ;
$site_id='main';
$url=$_SERVER['REQUEST_URI'];
 
##############
$query1="insert into new_url_log(url,ip,date,manager_id) 
values ('$url','$custom_ip',$now,'{$_SESSION['manager_user_name']}')";
$conn->query($query1);
#############

$direction=get_result("select align from new_language where title='{$_SESSION['page_languege']}'",$coms_conect) ;


$manager_username= $_SESSION['manager_user_name'];?>
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="/yep_theme/default/rtl/assets/js/ace-extra.min.js"></script>
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/icon-fonts/yepco-icon-3.0/css/yepco-icon.css"/>
		<script type="text/javascript" src="/yep_theme/default/rtl/js/jquery.min.js"></script>
		
		<script type="text/javascript" src="/yep_theme/default/rtl/js/count_sms.js"></script>
		
		<script type="text/javascript" src="/yep_theme/default/rtl/js/js-validate/jquery.validate.js"></script>

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='/yep_theme/default/rtl/assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
					<!-- <![endif]-->

				<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='/yep_theme/default/rtl/assets/js/jquery1x.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/yep_theme/default/rtl/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="/yep_theme/default/rtl/assets/js/bootstrap.min.js"></script>

		<!-- ace scripts -->
		<script src="/yep_theme/default/rtl/assets/js/ace-elements.min.js"></script>
		
		<script src="/yep_theme/default/rtl/assets/js/ace.mine.js"></script>
		<script src="/yep_theme/default/rtl/assets/js/ace.min.js"></script>
		<script src="/yep_theme/default/rtl/assets/js/ace/elements.treeview.js"></script>


		<!-- inline scripts related to this page -->

		<!-- calculate sms count -->
		<script type="text/javascript" src="/yep_theme/default/rtl/js/count_sms.js"></script>

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.min.css" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="/assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-skins.min.css" />
		<?if($direction==0){?>
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-rtl.min.css" />
		<?}?>	
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

	
<style>		
	.noti{
		margin-bottom: 3px;
		margin-top: 3px;
	}
</style>		
	

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="/yep_theme/default/rtl/assets/js/html5shiv.min.js"></script>
		<script src="/yep_theme/default/rtl/assets/js/respond.min.js"></script>
		<![endif]-->
		
		
		<script>
			$(document).ready(function() {
				var url = window.location.href;
				var panelposstion = url.search("/newcoms.php");
				var ahref=url.substr(panelposstion, url.length);
				var $current = $('body > div > div > ul > li > ul > li > a[href="' + ahref + '"]');
				
				$current.parent('li').addClass('active');
			    $current.parents('li').last().addClass('active');
				$current.parents('li').last().addClass('open');

				var $currentsubmenu = $('body > div > div > ul > li > ul > li > ul > li > a[href="' + ahref + '"]');
				$currentsubmenu.parent('li').addClass('active');
			    $currentsubmenu.parents('li').last().addClass('active');
				$currentsubmenu.parents('li').last().addClass('open');
				// $currentsubmenu.parents('li').addClass('open');
				$currentsubmenu.closest('ul').addClass('nav-show');
				$currentsubmenu.closest('ul').css('display','block');
			});
		</script>
		
	</head>
<?
;?>	
<title><?
$menu_name=get_result("SELECT name FROM  new_main_menu  WHERE file_path='$yep'",$coms_conect);
echo $_SESSION["menu_lang"][$menu_name];
?></title>
	<body class="no-skin <?if($direction==0) echo 'rtl';?>" <?if($direction==1) echo ' style="font-family:tahoma;"';?>>
		
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				
				<div class="navbar-header <?if($direction==0) echo 'pull-left'; else echo 'pull-right';?>">
					<!-- #section:basics/navbar.layout -->
					<a href="#" class="navbar-brand">
						<small>
							<img src="../yep_theme/default/rtl/assets/css/img/coms-logo.png">
						</small>
					</a>

					<!-- /section:basics/navbar.layout -->

					
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header <?if($direction==0) echo 'pull-right'; else echo 'pull-left';?>" role="navigation">
					<ul class="nav ace-nav">
	

					<li class="grey">
						<? 
						$pm_count=get_result("select count(id) from new_faq where   status=0",$coms_conect)?>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success"><?=$pm_count?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>  
									<?=$pm_count?> پرسش بررسی نشده دارید
								</li>
								 
								<li class="dropdown-content">
									<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
 								<li>
									<a href="/newcoms.php?yep=new_faq">
								 
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												در انتظار تایید و پاسخ
											</span>
											<span class="pull-right badge badge-info"><?=$pm_count?></span>
										</div>

								 

										<div class="clearfix noti">
											<span class="pull-left">
												پاسخ داده شده
											</span>
											<span class="pull-right badge badge-success"><?=get_result("select count(id) from new_faq where  send_memeber_sms=1 or send_memeber_email=1",$coms_conect)?></span>
										</div>
 

										<div class="clearfix noti">
											<span class="pull-left">
												منتشر شده در سایت
											</span>
											<span class="pull-right badge badge-success"><?=get_result("select count(id) from new_faq where   status=2",$coms_conect)?></span>
										</div>
									</a>
								</li>
				 

							</ul>
					
								</li>
								 
								<li class="dropdown-footer">
									<a href="/newcoms.php?yep=new_faq">
										مشاهده همه پرسش ها
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
					<li class="green">
						<?
						$pm_count111=get_result("select count(id) from new_agahi_sabt where   VIEW=0",$coms_conect)?>
							<a data-toggle="dropdown" class="dropdown-toggle" style="background-color: pink!important;" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success" style="background-color: hotpink!important;"><?=$pm_count111?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header" style="background-color: hotpink">
									<i class="ace-icon fa fa-envelope-o"></i>
									<?=$pm_count111?>درخواست بررسی نشده دارید
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
 								<li>
									<a href="/newcoms.php?yep=new_agahi_sabt">

										<br>
										<div class="clearfix noti">
											<span class="pull-left">
                                                تایید شده و در حال پیگیری
                                            </span>
											<span class="pull-right badge badge-info"><?=get_result("select count(id) from new_agahi_sabt where  peygiri=1 ",$coms_conect)?></span>
										</div>



										<div class="clearfix noti">
											<span class="pull-left">
												تایید نشده
											</span>
											<span class="pull-right badge badge-success"><?=get_result("select count(id) from new_agahi_sabt where  peygiri=0",$coms_conect)?></span>
										</div>


										<div class="clearfix noti">
											<span class="pull-left">
												منتشر شده در سایت
											</span>
											<span class="pull-right badge badge-success"><?=get_result("select count(id) from new_agahi_sabt where   status=2",$coms_conect)?></span>
										</div>
									</a>
								</li>


							</ul>

								</li>

								<li class="dropdown-footer">
									<a href="/newcoms.php?yep=new_agahi_sabt">
										مشاهده همه پرسش ها
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

	
					
					<li class="grey">
						<? 
						$pm_count=get_result("select count(id) from new_manager_pm where resiver='{$_SESSION["manager_user_name"]}' and status=0",$coms_conect)?>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success"><?=$pm_count?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-green dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>  
									<?=$pm_count?> پیام داخلی دارید
								</li>
								<?if($pm_count>0){?>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<?$query="SELECT * from new_manager_pm where resiver='{$_SESSION["manager_user_name"]}' and status=0 order by id desc";
											  $result = $coms_conect->query($query);
											  while($row = $result->fetch_assoc()) {?>
										<li>
											<a href="/newcoms.php?yep=new_manager_pm">
												<!--img src="/yep_theme/default/rtl/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" /-->
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue"><?=$row['sender']?></span>
														<br>
														<?=$row['text']?>
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span><?=miladitojalalidefult(date('Y-m-d h:i:s',$row['date']))?></span>
													</span>
												</span>
											</a>
										</li>
											  <?}?>
									</ul>
								</li>
								<?}?>	
								<li class="dropdown-footer">
									<a href="/newcoms.php?yep=new_manager_pm">
										مشاهده همه پیام ها
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
 
					
					
					
						<li class="grey">
						<?
						$active_video=get_result("select status from new_modules where link='video'",$coms_conect);
						$active_gallery=get_result("select status from new_modules where link='gallery'",$coms_conect);
						$active_news=get_result("select status from new_modules where link='news'",$coms_conect);
						$active_article=get_result("select status from new_modules where link='article'",$coms_conect);
						
					if($active_news==0){
						$new_comment_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_news a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=1 and a.id=b.madul_id and b.status=0",$coms_conect);
							
						$confirm_news_comment_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_news a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=1 and a.id=b.madul_id and b.status=1",$coms_conect);
					 }
					if($active_video==0){
						$video_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_video a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=8 and a.id=b.madul_id and b.status=0",$coms_conect);	
							
						$confirm_video_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_video a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=8 and a.id=b.madul_id and b.status=1",$coms_conect);	
					}
						
					if($active_gallery==0){
						$galley_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_gallery a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=9 and a.id=b.madul_id and b.status=0",$coms_conect);
		  	
							
						$confirm_galley_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_gallery a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=9 and a.id=b.madul_id and b.status=1",$coms_conect);
					}
					if($active_article==0){
						$article_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_article a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=7 and a.id=b.madul_id and b.status=0",$coms_conect);
		  	
							
						$confirm_article_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_article a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=7 and a.id=b.madul_id and b.status=1",$coms_conect);
					}
					
					
					
					if($active_blog==0){
						$blog_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_blog a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=10 and a.id=b.madul_id and b.status=0",$coms_conect);
		  	
							
						$confirm_blog_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_blog a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=10 and a.id=b.madul_id and b.status=1",$coms_conect);
					}
					
					
					if($active_page==0){
						$page_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_static_page a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=5 and a.id=b.madul_id and b.status=0",$coms_conect);
		  	
						$confirm_page_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_static_page a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=5 and a.id=b.madul_id and b.status=1",$coms_conect);
					}		

						if($active_content==0){
						$content_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_content a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=11 and a.id=b.madul_id and b.status=0",$coms_conect);
		  	
							
						$confirm_content_commane_count=get_result("SELECT count(a.id) as cnt from new_madules_comment b ,new_content a where a.id>0
							and user_id in({$_SESSION["manager_user_permisson_string"]})  and b.type=11 and a.id=b.madul_id and b.status=1",$coms_conect);
					}				
							?>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey"><?=$content_commane_count+$page_commane_count+$blog_commane_count+$article_commane_count+$new_comment_count+$video_commane_count+$galley_commane_count?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-grey dropdown-menu dropdown-caret dropdown-close <?if($direction==1) echo 'dropdown-menu-right';?>">
								 <li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>  
									<?=$blog_commane_count+$article_commane_count+$new_comment_count+$video_commane_count+$galley_commane_count?> نظر بررسی نشده دارید 
									</li> 
							<?if($active_news==0){?>
								<li>
									<a href="/newcoms.php?yep=new_news_comment">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												نظر های دریافتی خبر
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left"> 
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-info"><?=$new_comment_count?></span>
										</div>
 

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده
											</span>
											<span class="pull-right badge badge-success"><?=$confirm_news_comment_count?></span>
										</div>

									 
									</a>
								</li>
							<?}?>

							
							<?if($active_page==0){?>
								<li>
									<a href="/newcoms.php?yep=new_news_comment">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												نظر های دریافتی صفحه ساز
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left"> 
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-info"><?=$page_commane_count?></span>
										</div>
 

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده
											</span>
											<span class="pull-right badge badge-success"><?=$confirm_page_commane_count?></span>
										</div>

									 
									</a>
								</li>
							<?}?>
							
							
							<?if($active_content==0){?>
								<li>
									<a href="/newcoms.php?yep=new_news_comment">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												نظر های دریافتی محتوا
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left"> 
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-info"><?=$content_commane_count?></span>
										</div>
 

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده
											</span>
											<span class="pull-right badge badge-success"><?=$confirm_content_commane_count?></span>
										</div>

									 
									</a>
								</li>
							<?}?>
							
							
							<?if($active_gallery==0){?>							
	 							<li>
									<a href="/newcoms.php?yep=new_gallery_comment">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												نظر های دریافتی گالری تصاویر
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-info"><?=$galley_commane_count?></span>
										</div>
 

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده
											</span>
											<span class="pull-right badge badge-success"><?=$confirm_galley_commane_count?></span>
										</div>

									 
									</a>
								</li>
							<?}
								if($active_video==0){?>
	 	 						<li>
									<a href="/newcoms.php?yep=new_video_comments">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												نظر های دریافتی ویدئو
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-info"><?=$video_commane_count?></span>
										</div>
 

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده
											</span>
											<span class="pull-right badge badge-success"><?=$confirm_video_commane_count?></span>
										</div>

									 
									</a>
								</li>
								<?} 
								if($active_article==0){?>
	 	 						<li>
									<a href="/newcoms.php?yep=new_article_comment">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												نظر های دریافتی مقاله
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-info"><?=$article_commane_count?></span>
										</div>
 

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده
											</span>
											<span class="pull-right badge badge-success"><?=$confirm_article_commane_count?></span>
										</div>

									 
									</a>
								</li>
								<?} 


								if($active_blog==0){?>
	 	 						<li>
									<a href="/newcoms.php?yep=new_blog_comments">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												نظر های دریافتی بلاگ
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-info"><?=$blog_commane_count?></span>
										</div>
 

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده
											</span>
											<span class="pull-right badge badge-success"><?=$confirm_blog_commane_count?></span>
										</div>

									 
									</a>
								</li>
								<?}?>								
							</ul>
						</li>
						
						
						
						<?if(get_result("select status from new_modules where id=18",$coms_conect)==0){?>
						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">0</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									<span>0</span>   اطلاعیه آگهی 
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												آگهی های (نام واحد)
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-info">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												بروزرسانی شده منتظر تایید
											</span>
											<span class="pull-right badge badge-info">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده اتوماتیک
											</span>
											<span class="pull-right badge badge-success">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												تایید نشده
											</span>
											<span class="pull-right badge badge-success">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												د ر حال انقضا
											</span>
											<span class="pull-right badge badge-success">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												منقضی شده
											</span>
											<span class="pull-right badge badge-success">0</span>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												آگهی های ویژه
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-success">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												بروزرسانی شده منتظر تایید
											</span>
											<span class="pull-right badge badge-info">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده اتوماتیک
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												تایید نشده
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												د ر حال انقضا
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												منقضی شده
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												آگهی های رایگان
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												در انتظار تایید شدن
											</span>
											<span class="pull-right badge badge-pink">1</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												بروزرسانی شده منتظر تایید
											</span>
											<span class="pull-right badge badge-info">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												تایید شده اتوماتیک
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												تایید نشده
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												د ر حال انقضا
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												منقضی شده
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left" style="color: #aaa;font-size: 13px;">
												آگهی های شکایت دار
											</span>
										</div>
										<br>
										<div class="clearfix noti">
											<span class="pull-left">
												نام واحد
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												ویژه
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>

										<div class="clearfix noti">
											<span class="pull-left">
												رایگان
											</span>
											<span class="pull-right badge badge-pink">0</span>
										</div>
									</a>
								</li>

							</ul>
					
					</li>
						<?}?>
						<li class="green">
						<? 
						$pm_count=get_result("select count(id) from new_contactus_pm where user_id={$_SESSION["manager_id"]} and status=0 and type=0",$coms_conect)?>
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-exchange icon-animated-vertical"></i>
								<span class="badge badge-danger"><?=$pm_count?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-red dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>  
									<?=$pm_count?> پیام دریافتی از تماس با ما دارید
								</li>
								<?if($pm_count>0){?>
								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<?$query="SELECT * from new_contactus_pm where id>0 and user_id={$_SESSION["manager_id"]} and status=0 and type=0 order by id desc";
											  $result = $coms_conect->query($query);
											  while($row = $result->fetch_assoc()) {?>
										<li>
											<a href="/newcoms.php?yep=new_inbox_list">
												<!--img src="/yep_theme/default/rtl/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" /-->
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue"><?=$row['name']?></span>
														<br>
														<?=$row['text']?>
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span><?=miladitojalalidefult(date('Y-m-d h:i:s',$row['date']))?></span>
													</span>
												</span>
											</a>
										</li>
											  <?}?>
									</ul>
								</li>
								<?}?>	
								<li class="dropdown-footer">
									<a href="/newcoms.php?yep=new_inbox_list">
										مشاهده همه پیام ها
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
 
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							
								<img class="nav-user-photo" src="<?=$_SESSION["manager_avatar"]?>" alt="" />
								<span class="user-info">
									<!--small>خوش آمدید</small-->
								<?=$_SESSION["manager_name"]?>	
								</span>

								<span class="flaticon-down53 apdi"></span>
							</a>

							<ul class="apdl user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<?if(get_result("SELECT name FROM new_main_menu a ,new_menu_permission b 
									WHERE a.unic_id=b.menu_id and b.permission=1 and b.group_id={$_SESSION["manager_group_id"]} and name=133 and a.status=1 group by id  ORDER BY rang",$coms_conect)>""){?>
	
								<li>
									<a href="/newcoms.php?yep=new_setting_users">
										<i class="ace-icon fa fa-cog"></i>
										تنظیمات امنیتی
									</a>
								</li>
								
								<?}if(get_result("SELECT name FROM new_main_menu a ,new_menu_permission b 
									WHERE a.unic_id=b.menu_id and b.permission=1 and b.group_id={$_SESSION["manager_group_id"]} and name=166  group by id  ORDER BY rang",$coms_conect)>""){?>
	
								<li>
									<a href="/newcoms.php?yep=manager_resert_password"> 
										<i class="ace-icon fa fa-cog"></i>
										تغییر کلمه عبور
									</a>
								</li>
								<?}?>
								<li>
									<a href="/newcoms.php?yep=new_manager_profile"> 
										<i class="ace-icon fa fa-user"></i>
										پروفایل
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="new_manager_signout.php">
										<i class="ace-icon fa fa-power-off"></i>
										خروج
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

	 							
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<!-- #section:basics/sidebar.layout.shortcuts -->
						<a href="newcoms.php?yep=new_member" class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</a>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts --> 
				<?function get_parrent($field,$menu_id,$coms_conect){
					$query="select $field ,parent_id,count(id) as count from new_main_menu where id='$menu_id'";
					$result=mysqli_query($coms_conect,$query);
					$RS1 =mysqli_fetch_array($result,MYSQLI_NUM);
					if($RS1[2]>0)
					return  $RS1[0] .','.get_parrent($field ,$RS1[1],$coms_conect);
				}
				$array_menu=explode (",",get_parrent('parent_id' ,$menu_id,$coms_conect));
				$temp_cont=count($array_menu);$temp_cont--;
				$array_menu [$temp_cont]=$menu_id;
				$commane_count=0;
				$_SESSION['pm_count']=0;
				$commane_count=get_result("select count(id) from new_manager_pm where resiver='{$_SESSION["manager_user_name"]}' and status=0",$coms_conect);
				$_SESSION['pm_count']=$commane_count+$_SESSION['pm_count'];
				$commane_count=get_result("select count(id) from new_contactus_pm where user_id={$_SESSION["manager_id"]} and status=0",$coms_conect);
				$_SESSION['pm_count']=$commane_count+$_SESSION['pm_count'];
	 				 
				$sql = "SELECT  file_path,icon,id,name,status FROM new_main_menu a ,new_menu_permission b
				WHERE a.unic_id=b.menu_id and b.permission=1 and b.group_id=$manager_group and a.la='$la' and a.parent_id='0' and a.status=1 group by id ORDER BY rang";
				 //echo $sql;
				$result = $coms_conect->query($sql);
				echo "<ul class='nav nav-list'>\n";
				while($row = $result->fetch_assoc()){
					$parentID=$row["id"];
					$file_path=$row['file_path'];
					$icon=$row["icon"];
					$sql1 = "SELECT count(id) as cont FROM new_main_menu WHERE parent_id='$parentID'";
					$result1 = $coms_conect->query($sql1);
					 
					$row1 = $result1->fetch_assoc();
					$str="";
					$str1="";
					$numRows1=$row1["cont"];
					if($numRows1>0){
						$str="class='dropdown-toggle'";
						$str1="<b class='arrow fa fa-angle-down'></b>";
					}
					$numRows1=0;
					$name=$row["name"];
					$name=$_SESSION["menu_lang"][$name];$str2='';
					if (in_array($row["id"], $array_menu))
					$str2="active";
					echo '<li class=" test '.$str2.'">';
					echo '<a href="newcoms.php?yep='.$file_path.'" '.$str.'>
						<i class="menu-icon fa '.$icon.'"></i>
						<span class="menu-text">'.$name.' </span> '.$str1 ;
					$commane_count=0;
					if($row["name"]==410)
							echo "<span class='badge badge-grey'>{$_SESSION['pm_count']}</span>"; 
					else if($commane_count>0)
							echo "<span class='badge badge-grey'>$commane_count</span>"; 
					echo '</a><b class="arrow"></b>';
					create_side_menu($array_menu,$parentID,$site_id,$la,$manager_group,$coms_conect) ;
					echo '</li>';
				}
				echo '</ul>';?>		 					
					<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<!-- #section:basics/content.breadcrumbs -->
				<div class="breadcrumbs" id="breadcrumbs">
					<script type="text/javascript">
						try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
					</script>

					<ul class="breadcrumb">

						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="/newcoms.php?yep=new_Dashboard">خانه</a>
						</li>
						<?
						$array_navigation=explode (",",get_parrent('name' ,$menu_id,$coms_conect));
						$navigation_cont=count($array_navigation);$navigation_cont--;
						$navigation_name=get_result("SELECT parent_id FROM  new_main_menu  WHERE id='$menu_id'",$coms_conect);
						$navigation_name=get_result("SELECT name FROM  new_main_menu  WHERE id='$navigation_name'",$coms_conect);
						 krsort($array_navigation);

						foreach($array_navigation as $value){
						if($value>"")
						echo "<li  >".$_SESSION['menu_lang'][$value]."</li>";
							
					}
					?>	
					
					</ul><!-- /.breadcrumb -->

					
					<form class="form-search">
					<div class="nav-search" id="nav-search">
						
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
								
								<i class="ace-icon fa fa-search nav-search-icon"></i>
							</span>
							
						
						
					</div>
						
					</form>

					
				</div>

				<!-- /section:basics/content.breadcrumbs -->
				<div class="page-content">
					<!-- #section:settings.box -->
					<div class="ace-settings-container" id="ace-settings-container">
						<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
							<i class="ace-icon fa fa-cog bigger-150"></i>
						</div>

						<div class="ace-settings-box clearfix" id="ace-settings-box">
							<div class="pull-right width-50">
								<!-- #section:settings.skins -->
								<div class="ace-settings-item">
									<div class="pull-left">
										<select id="skin-colorpicker" class="hide">
											<option data-skin="no-skin" value="#438EB9">#438EB9</option>
											<option data-skin="skin-1" value="#222A2D">#222A2D</option>
											<option data-skin="skin-2" value="#C6487E">#C6487E</option>
											<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
										</select>
									</div>
									<span>&nbsp; انتخاب پوسته</span>
								</div>

								<!-- /section:settings.skins -->

								<!-- #section:settings.navbar -->
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
									<label class="lbl" for="ace-settings-navbar"> منوی navbar ثابت</label>
								</div>

								<!-- /section:settings.navbar -->

								<!-- #section:settings.sidebar -->
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
									<label class="lbl" for="ace-settings-sidebar"> منوی sidebar ثابت</label>
								</div>

								<!-- /section:settings.sidebar -->

								<!-- #section:settings.breadcrumbs -->
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
									<label class="lbl" for="ace-settings-breadcrumbs"> منوی Breadcrumbs ثابت</label>
								</div>

								<!-- /section:settings.breadcrumbs -->

								<!-- #section:settings.rtl -->
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
									<label class="lbl" for="ace-settings-rtl"> چپ چین (ltr)</label>
								</div>

								<!-- /section:settings.rtl -->

								<!-- #section:settings.container -->
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
									<label class="lbl" for="ace-settings-add-container">
										داخل
										<b>container.</b>
									</label>
								</div>
								<div class="ace-settings-item">
									<form action="" method="post" id="langueg">
										 
										<select name="lang" id="lang">
											<?$query="select title,name from new_language"; 
												$result = $coms_conect->query($query);
													while($RS1 = $result->fetch_assoc()) {
													$title=$RS1["title"];
													$str="";
													if($default_lang==$title)
													$str="selected";
													$name=$RS1["name"];?>
											<option value="<?=$title?>" <?=$str?>><?=$name?></option>
											<?}?>
										</select>
									</form>
								</div>	
								<!-- /section:settings.container -->
							</div><!-- /.pull-left -->

							<div class="pull-left width-50">
								<!-- #section:basics/sidebar.options -->
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
									<label class="lbl" for="ace-settings-hover"> نمایش زیر منو </label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
									<label class="lbl" for="ace-settings-compact">  Sidebar فشرده</label>
								</div>

								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
									<label class="lbl" for="ace-settings-highlight"> فلش گونه بودن منو</label>
								</div>

								<!-- /section:basics/sidebar.options -->
							</div><!-- /.pull-left -->
						</div><!-- /.ace-settings-box -->
					</div><!-- /.ace-settings-container -->

					
						

					


					<!-- /section:settings.box -->
						<div class="page-content-area">
							<div class="row">
								<div class="col-xs-12"><? //echo print_r($coms_conect); "($la,$yep,$manager_group )";exit;
								$yep_name=$yep;
								if(check_url($la,$yep,$manager_group,$coms_conect)>=1){
										$file_name=get_result("SELECT file_name FROM new_main_menu WHERE file_path='$yep'",$coms_conect);
										//echo "newcoms/$file_name.php4";
										if(file_exists("newcoms/$file_name.php4"))
											include_once("newcoms/$file_name.php4");
										else	
										include_once("newcoms/main/new_error404.php4");
									} else if(check_url($la,$yep,$manager_group,$coms_conect)==0){
									include_once("new_manager_signout.php");									
									exit;
									} ?></div><!-- /.col -->
							</div><!-- /.row -->
						</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<!-- #section:basics/footer -->
					<div class="footer-content">
					<span class="action-buttons">
							<a href="#">
                                <i class="ace-icon fa fa-instagram bigger-150"></i>
                            </a>
							<a href="#">
                                <i class="ace-icon fa fa-youtube-square bigger-150" style = "color:red;"></i>
                            </a>
							<a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150" style = "width:auto;"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

							<a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
							
						</span>
						 &nbsp; &nbsp;
							<span style="font-size: 17pt;font-family: fantasy;vertical-align: sub;margin-left: 3px;">©</span>
							<span style="font-size: 120%;"><a href="http://coms.ir" target="_blank">COMS</a> Application 1997 - 2016</span>
						
						

					</div>

					<!-- /section:basics/footer -->
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		
		<style>
		.dropdown-navbar.navbar-red>li.dropdown-header {
			background-color: #de6566!important;
			color: #FFF;
			border-bottom-color: #d53f40;
		}
		.navbar-red:after {
			border-bottom: 6px solid #de6566;
			-moz-border-bottom-colors: #FFF;
			border-left: 6px solid transparent;
			border-right: 6px solid transparent;
			content: "";
			display: inline-block;
			left: 10px;
			position: absolute;
			top: -6px;
		}
		.dropdown-navbar.navbar-red {
			border-color: #efaaaa;
		}
		</style>
		<script>

		$("#lang").change(function () {			
			$("#langueg").submit();
		});	
		</script>	
	
	<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="/new_help/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="/yep_theme/default/rtl/assets/js/ace/elements.onpage-help.js"></script>
		<script src="/yep_theme/default/rtl/assets/js/ace/ace.onpage-help.js"></script>
		<script src="/new_help/assets/js/rainbow.js"></script>
		<script src="/new_help/assets/js/language/generic.js"></script>
		<script src="/new_help/assets/js/language/html.js"></script>
		<script src="/new_help/assets/js/language/css.js"></script>
		<script src="/new_help/assets/js/language/javascript.js"></script>
		<?$yep_name=injection_replace($_GET['yep']);
		$url_array=array('new_q_a','new_faq','ads_setting','new_content_text','new_newstext','new_download','new_article','new_gallery','new_blog','new_video','new_Pages','new_ads');
		
		
     	 if(in_array($yep_name,$url_array)){}else{?>
		<script src="/new_help/assets/js/persianumber.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){ 
				$('body').persiaNumber();
				});
		</script>
		<?}?>
	
		
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?=$view_login_system?></title>
		<script type="text/javascript" src="/yep_theme/default/rtl/js/jquery.min.js"></script>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-fonts.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css" />
		<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrap.min.js"></script>
	</head>
<?@session_start();
if(!isset($_GET['val']))
echo "<script>window.location='/coms'</script>";
include_once("newcoms/function.php");
include_once("newcoms/Database.php");
$val=injection_replace($_GET['val']);
$ok=0;
if($val>""){
	$query="SELECT user_name,user_id,email,id from new_managers where email_link='$val'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	if($row['user_name']){
		$temp=create_reset_password($row['user_name']);
		if($temp==$val){
			$_SESSION['change_password']=$row['user_name'];
			$condition="email_link='$val'";
			$arr_slide=array("email_link"=>'');
			update_data_base($arr_slide,'new_managers',$condition,$coms_conect);
			$ok=1;
		}	
	}
}	

?>

	<body class="login-layout light-login rtl">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">NEW</span>
									<span class="white" id="id-text2">COMS</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; 2015</h4>
							</div>

							
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
											<?=$view_change_password2?>
											</h4>

											

										<form class="form-horizontal" id="login" name="login" action="" role="form" method="post" enctype="multipart/form-data">
				
												<fieldset>
													<label class="block clearfix">
														<?=$question?>
													</label>
				
													
													<div class="clearfix">
														<?if($ok==1){?>
														<a  href="new_change_password.php" class="">
															<?=$view_change_password_click?>
														</a>
														<?}else{
															echo $view_link_invalid;
														}?>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>
											
										</div><!-- /.widget-main -->

									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->
								

								
							</div><!-- /.position-relative -->

						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='/yep_theme/default/rtl/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/yep_theme/default/rtl/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		
	</body>
</html>
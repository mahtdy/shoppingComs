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
<?@session_start();$la=$_GET['la'];
if(!isset($_GET['val']))
echo "<script>window.location='new_login.php/$la'</script>";
include_once("newcoms/function.php");
include_once("newcoms/Database.php");
$val=injection_replace($_GET['val']);
$ok=0;
if($val>""){
	$query="SELECT user_name,email,id from new_members where email_link='$val'";
 	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	if($row['user_name']){
		$temp=create_member_reset_password($row['user_name']);
		if($temp==$val){
			$ok=1;
		}	
	}
}
$password=$_POST['password'];	
$username=$_POST['username'];	
$email_token=$_POST['email_token'];	
 
if($username>""&&$password>""){
	$user_password=create_memebre_password($username,$password);
	$query="SELECT user_name,email_link,password from new_members where user_name='$username' and status=1 and site='main' and la='$la'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	if($row['password']==$user_password&&$email_token==$row['email_link']){
		$_SESSION['active_email_member']=$row['user_name'];
		$_SESSION['new_okusername']=$row['user_name'];
		$condition="email_link='$email_token'";
		$arr_slide=array("email_link"=>'','email_active'=>1);
		update_data_base($arr_slide,'new_members',$condition,$coms_conect);
		echo "<script>window.location='/profile/$la'</script>"	;
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
											<?=$view_active_email_user?>
											</h4>
											<?if($ok==1){?>
												<fieldset>
													<label class="block clearfix">
														<?=$question?>
													</label>
													<div class="clearfix">
											 		<form method='post' action='' id="member_loginForm"
														data-fv-framework="bootstrap"
														data-fv-message="This value is not valid"
														data-fv-icon-validating="glyphicon glyphicon-refresh">
													<input type="hidden" name="email_token" value="<?=$val?>" >
													<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
														<input class="form-control" name="username" type="username" placeholder="<?=$seramic_username?>"
														data-fv-message="<?=$view_notvalid_username?>"
						 
														data-fv-notempty="true"
														data-fv-notempty-message="<?=$view_fill_field_required?>"
										 
														data-fv-regexp="true"
														data-fv-regexp-regexp="^[a-zA-Z0-9_\.]+$"
														data-fv-regexp-message="<?=$view_username_point_num_letter?>"
										 
														data-fv-stringlength="true"
														data-fv-stringlength-min="6"
														data-fv-stringlength-max="30"
														data-fv-stringlength-message="<?=$view_username_character?>"></input>
													</div>
													<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
														<input class="form-control" name="password" type="password" placeholder="<?=$seramic_password?>"
														data-fv-notempty="true"
														data-fv-notempty-message="<?=$view_fill_field_required?>"></input>
													</div>
													<div class="form-group">
														  <button type="submit" class="btn btn-success fullwidth"><?=$view_login?></button>
													</div>
											 
											<? }else{
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

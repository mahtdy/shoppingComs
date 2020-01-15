<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?=$view_login_system?></title>
		<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.min.js"></script>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="/yep_theme/default/rtl//assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="yep_theme/default/rtl/assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="yep_theme/default/rtl/assets/css/ace-fonts.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css" />
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>

	</head>
<?@session_start();$la=$_GET['la'];
if(!isset($_SESSION['answer_member_qestion']))
echo "<script>window.location='new_login.php/$la'</script>";
include_once("newcoms/function.php");
include_once("newcoms/Database.php");
$answer=injection_replace($_POST['answer']);
if($answer>""){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	$query="SELECT answer from new_members where user_name='{$_SESSION['answer_member_qestion']}'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	if($row['answer']==$answer){
		$_SESSION['change_member_password']=$_SESSION['answer_member_qestion'];
		echo "<script>window.location='new_member_change_password.php?la=$la'</script>";
	}
		show_msg_warninig($view_incorrect_reply2);
}
	$query="SELECT question from new_members where user_name='{$_SESSION['answer_member_qestion']}'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$question=$row['question'];
	 create_session_token(); 
?>
<!DOCTYPE html>


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
												<?=$view_security_question?>
											</h4>

											

										<form class="form-horizontal" id="login" name="login" action="" role="form" method="post" enctype="multipart/form-data">
												<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
												<fieldset>
													<label class="block clearfix">
														<?=$question?>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input id="answer" name="answer" type="text" class="form-control" placeholder="<?=$view_enter_security_question?>" />
														</span>
													</label>

													
													<div class="space"></div>
													<div class="clearfix">
														
														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-check"></i>
															<span class="bigger-110"><?=$view_save?></span>
														</button>
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

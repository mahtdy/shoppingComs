<?@session_start();
include_once("newcoms/function.php");
$la=injection_replace($_GET['la']);
$val=injection_replace($_GET['val']);
include_once("languages/$la.php");
include_once("newcoms/Database.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?=$view_login_system?></title>
    <script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.min.js"></script>
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-fonts.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css" />
    <script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
	<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
	<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
   
  </head>
 <?
 
 
 $ok=0; $show_div=0; 
if($val>""){
	$query="SELECT user_name,email,id from new_members where email_link='$val'";
	// echo $query;exit;
 	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	if($row['user_name']){
		$temp=create_member_reset_password($row['user_name']);
		if($temp==$val){
			$_SESSION['change_member_password']=$row['user_name'];
			$condition="email_link='$val'";
			 $arr_slide=array("email_link"=>'');
			update_data_base($arr_slide,'new_members',$condition,$coms_conect);
			$ok=1;
		}	
	}
}	 

if(!isset($_SESSION['change_member_password'])){
	$_SESSION["warning_resetpass"]=$view_link_invalid;
	header("Location:/login/$la");
}

$password=injection_replace($_POST['password']);
$old_password=injection_replace($_POST['old_password']);
$login=0;
if($password>""){
 check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
  $query1="SELECT mobile,email,password,name,family from new_members where user_name='{$_SESSION['change_member_password']}'";
  $result1 = $coms_conect->query($query1);
  $row1 = $result1->fetch_assoc();
  $mobile=$row1['mobile'];
  $email_password=$password;
  $password=create_memebre_password($_SESSION['change_member_password'],$password);
  $query1="update new_members set password='$password',email_link='' where user_name='{$_SESSION['change_member_password']}'"; 
  $coms_conect->query($query1);
      $query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
      $result = $coms_conect->query($query);
      $row = $result->fetch_assoc();
      $url=$row['url'];
      $sms_password=$row['sms_password'];
      $sms_user=$row['sms_user'];
      $senderNumbers=array($row['senderNumbers']);
      $recipientNumbers=array($mobile);
	  $sms_str="$view_change_username
	  $seramic_password : $email_password
	  {$_SERVER['HTTP_HOST']}
	  ";
      $messageBodies=array($sms_str);
      $sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$manager_id);
	$headers= 'MIME-Version: 1.0' . "\r\n";
	$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
	$msg="<div  style='text-align:right;font-family:tahoma;'>";
    
	$msg .="<p>$view_dear_friend, {$row1['name']} {$row1['family']} </p>";
	  $msg .="<p>".$view_longtext13.'</p>';
	  $msg .="<p> {$_SESSION['change_member_password']} : ".$seramic_username;
	  $msg .="<p>".$seramic_password.' : '.$email_password.'</p>'; 
	   $msg .="<p>".$view_longtext6."</p>";
	   $msg .="<p> <a target='_blank' href='{$_SERVER['HTTP_HOST']}/login/$la'>{$_SERVER['HTTP_HOST']}/login/$la</a></p>";
		$msg .="<p>".$view_thankyou."</p>";
			$temp=$_SERVER['SERVER_NAME'];
	$headers .= "From:  $temp noreply@$temp ";
      yepmail($row1['email'],"$view_change_password2",$msg,$headers);
       $arr_attach=array("email"=>$row1['email'],"date"=>time(),"text"=>"$msg","manager_id"=>$manager_id);
      insert_to_data_base($arr_attach,'new_email_archive',$coms_conect);
	  unset($_SESSION['change_member_password']);
	  
	$login=1;
			$_SESSION["resgiter_str"]=$view_change_successful_password.' '.$view_longtext14;
		echo "<script>window.location='/login/$la'</script>";
		exit;
 }
 create_session_token(); 
 
 
 $show_div=0;
?>

<body class="login-layout blur-login rtl">
    <div class="main-container">
        <div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
                		</div>
						<?if($show_div==0){	
							if($login==1){echo "<p><h2><a href ='/login/$la' >".$view_login_site."</a></h2></p>";}else{?>
						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<div style="text-align:center;"><img src="new_coms-logo.png">
											<p style="  color: rgb(159, 165, 156);"><?=$view_change_password3?></p>
										</div>
										<form class="form-horizontal" id="login" name="login" action="" role="form" method="post" enctype="multipart/form-data">
											<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
											<fieldset>
											  <label class="form-group block clearfix">
												<span class="block input-icon input-icon-right">
												  <input id="password" name="password" type="password" class="form-control" placeholder="<?=$view_new_password2?>" />
												</span>
											  </label>

											  <label class="form-group block clearfix">
												<span class="block input-icon input-icon-right">
												  <input id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="<?=$view_repeat_new_password2?>" />
												</span>
											  </label>

											  
											  <div class="space"></div>
											  <div class="form-group clearfix">
												<button type="submit" class="width-35 pull-right btn btn-sm btn-success">
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
						<?}
					}?>
				</div>
			</div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->
    <!-- basic scripts -->
	<script>
	$(document).ready(function() {
		$('#login').formValidation({
			framework: 'bootstrap',
			locale: 'fr_FR',
			fields: {
				password: {
					validators: {
						notEmpty: {
							message: '<?=$view_fill_field_required?>'
						},
						stringLength: {
							min: 8,
							max: 30,
							message: '<?=$view_user_830?>'
						}
					}
				},
				confirm_password: {
					validators: {
						notEmpty: {
							message: '<?=$view_fill_field_required?>'
						},
						identical: {
							field: 'password',
							message: '<?=$view_repassword_same?>'
						}
					}
				}
			}
		});
	});
	</script>
    <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='/yep_theme/default/rtl/assets/assets/js/jquery.min.js'>"+"<"+"/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='/yep_theme/default/rtl/assets/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <center style="color:black; font-family:tahoma;">Copyright (C) 1997-2015 by<a href="http://coms.ir/" style="color:black;font-family:tahoma;  text-decoration: none;"> Aria Resane Mobtaker </a>. All Rights Reserved </center>  
  </body>
</html>

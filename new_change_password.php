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
 
<?@session_start();
  if(isset($_SESSION['page_languege']))
	include("languages/{$_SESSION['page_languege']}.php"); else
include_once("languages/fa.php");		
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
 


 

if($_SESSION['change_password']==''&&$val=="")
echo "<script>window.location='/coms'</script>";  
include_once("newcoms/function.php");
include_once("newcoms/Database.php");
 
$password=injection_replace($_POST['password']);
$login=0;
if($password>""){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	$query1="SELECT name,mobile,email,password from new_managers where user_name='{$_SESSION['change_password']}'";
	$result1 = $coms_conect->query($query1);
	$row1 = $result1->fetch_assoc();
	$mobile=$row1['mobile'];
	$name=$row1['name'];
 	$email_password=$password;
	$password=create_password($_SESSION['change_password'],$password);
	$query1="update new_managers set password='$password',email_link='' where user_name='{$_SESSION['change_password']}'"; 
	$coms_conect->query($query1);
	$query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$url=$row['url'];
	$sms_password=$row['sms_password'];
	$sms_user=$row['sms_user'];
	$senderNumbers=array($row['senderNumbers']);
	$recipientNumbers=array($mobile);
	$str_sms=" $view_change_username ". 
	"$seramic_username"." : {$_SESSION['change_password']}".
	"$seramic_password   : $email_password ".
	" $view_site_name ".": {$_SERVER["HTTP_HOST"]}";
	$messageBodies=array($str_sms);
	//print_r($messageBodies);
	$sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$manager_id);
	$headers= 'MIME-Version: 1.0' . "\r\n";
	$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
	$temp=$_SERVER['SERVER_NAME'];
	$headers .= "From:  $temp noreply@$temp ";
	$msg="<div  style='text-align:right;font-family:tahoma;'>";
	$msg .="<p>". $view_dear_friend .", $name </p>";
	$msg .="<p>{$_SESSION['change_password']} :". $view_your_username ."</p>";
	$msg .="<p>".$view_longtext7."</p>";
	$msg .="<p>$email_password : ".$view_your_password."</p>";
	$msg .='<p>'.$view_longtext6.'</p>';
	$msg .="<p> {$_SERVER["HTTP_HOST"]}/coms</p>";
	$msg .="</div>";
	yepmail($row1['email'],"$view_change_password2",$msg,$headers);
	$arr_attach=array("email"=>$row1['email'],"date"=>time(),"text"=>"$msg","manager_id"=>$manager_id);
	insert_to_data_base($arr_attach,'new_email_archive',$coms_conect);
	show_msg($view_longtext8);	
	$login=1;
	$_SESSION['change_password']='';
}

if($_SESSION['change_password']>""){
	$ok=1;$login=0;
}
 create_session_token(); 
?>


<body class="login-layout blur-login rtl">
    <div class="main-container">
        <div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
                		</div>
						<?if($login==1)echo '<div class="position-relative"><div class="login-box visible widget-box no-border"><div class="widget-body"><div class="widget-main"><div style="text-align:center;"><img src="new_coms-logo.png"><p style="color: rgb(159, 165, 156);">ورود به سایت</p></div><form class="form-horizontal" ><fieldset><div class="clearfix" style="text-align:center;"><a href ="/coms" class="width-35 btn btn-sm btn-success" style="float:none !important;">'.$view_login_site.'</a></div></fieldset></form></div></div></div></div>';
						if($ok==0&&$val>""&&$login==0)
											echo $view_link_invalid ;else if ($ok==1&&$login==0){ ?>
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
												<div class="form-group block clearfix">
													<span class="block input-icon input-icon-right">
													  <input id="password" name="password" type="password" class="form-control" placeholder="<?=$view_new_password?>"/>
								
													</span>
												</div>
												
												<div class="form-group block clearfix">
													<span class="block input-icon input-icon-right">
													  <input id="confirm_password" name="confirm_password" type="password" class="form-control" placeholder="<?=$view_repeat_new_password?>" />
								
													</span>
												</div>
											  
											  <div class="form-group clearfix">
												<button type="submit" class="width-35 pull-right btn btn-sm btn-success">
												  <i class="ace-icon fa fa-check"></i>
												  <span class="bigger-110"><?=$view_save?></span>
												</button>
											  </div>

											  <div class="space-4"></div>
											</fieldset>
										</form>
									<?}?>  
									</div><!-- /.widget-main -->
								</div><!-- /.widget-body -->
							</div><!-- /.login-box -->
						</div><!-- /.position-relative -->
					</div>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.main-content -->
    </div><!-- /.main-container -->
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
	
 <!-- basic scripts -->
    <center style="color:black; font-family:tahoma;">Copyright (C) 1997-2015 by<a href="http://coms.ir/" style="color:black;font-family:tahoma;  text-decoration: none;"> Aria Resane Mobtaker </a>. All Rights Reserved </center>
    <!--[if !IE]> -->
    <!--script type="text/javascript">
      window.jQuery || document.write("<script src='/yep_theme/default/rtl/assets/js/jquery.min.js'>"+"<"+"/script>");
    </script-->
	
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

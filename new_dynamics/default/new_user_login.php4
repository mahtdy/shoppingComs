<?//include_once "new_template/$tem_name/blocks/header.php4";?>
<?$register_text= get_tem_result($defult_site,$defult_lang,"register_text",'default',$coms_conect);?>

            <section class="slider pimg animated fadeIn hidden-xs">
                <img src="<?=$register_text['pic_adress']?>" alt="<?=$nav_title?>">
            </section>

            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="#"><span class="fa fa-home"></span></a></li>
                        <li><a href="#"><?=$view_account?></a></li>
                        <li class="active"><?=$view_login_site?></li>
                    </ol>
                </div>
            </section>
        </header>
        <!-- End Header -->

        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-user"></span>

                <h1 class="title"><?=$register_text['title']?></h1>
                <span class="pdesc"><?=$register_text['text']?></span>

            </div>
        </div>

        <!-- End Page Title -->
        <div class="container">
            <main>
								<!-- Start Main -->
								
							<?
							// echo 'ss='.$_SESSION["new_okusername"];
							if($_SESSION["new_okusername"])
echo "<script>window.location='/{$_SESSION["new_okusername"]}'</script>";          

####auto login
if($_COOKIE['auto_login']>""){
parse_str($_COOKIE['auto_login']);
$db_pass=get_result("SELECT password FROM new_members  WHERE user_name='{$user}'",$coms_conect);

if($pass==md5(('yaali'.$db_pass.'maddad')))
	echo "<script>window.location='/{$_SESSION["new_okusername"]}'</script>";
}
######
 


if(isset($_POST['modal_lock_url']))
$lock_url=urldecode(injection_replace($_POST['modal_lock_url']));
else
$lock_url=injection_replace($_POST['lock_url']);




if(isset($_POST['modal_user']))
$user=injection_replace($_POST['modal_user']);
else
$user=injection_replace($_POST['username']);

if(isset($_POST['remmember_me']))
$remmember_me=injection_replace($_POST['remmember_me']);
 
 
 

if(isset($_POST['modal_password']))
$password=injection_replace($_POST['modal_password']);
else
$password=injection_replace($_POST['password']);

if(isset($_POST['modal_com1_captcha']))
$_POST["com1_captcha"]=injection_replace($_POST['modal_com1_captcha']);
 
$email_active_user=0;

if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]==$_POST["com1_captcha"]){
	if($user>""&&$password>""){
 
		
		if($lock_url>"")
		$redirect_page="<script>window.location='$lock_url'</script>";
		else	
		$redirect_page="<script>window.location='/$user'</script>"	;
		
	 
		$user_password=create_memebre_password($user,$password);
		echo 'dd='.$user_password;
		$query="SELECT status,email_active,email,sms_login,sms_active,mobile,password,type,id,user_name,name,family from new_members where user_name='$user'   and site='$site' and la='$madual_lang'";
		 $result = $coms_conect->query($query);
		$row = $result->fetch_assoc();
		// echo $row['password'].'<br>'.$user_password;
		if($row['email_active']==0&&$row['password']==$user_password)
			show_msg('برای تکمیل ثبت نام به ایمیل خود مراجعه کنید و بر روی لینک فعال سازی ایمیل کلیک نمایید');
		else if($row['status']==1&&$row['password']==$user_password){
			if($row['password']==$user_password){
 		  
				@session_start();
				$query="update new_members set  ip='$custom_ip',last_login=NOW() where user_name='$user'";
				$coms_conect->query($query);
				$_SESSION["new_userpassword"]=$row['password'];
				$_SESSION["new_username"]=$row['user_name'];
				$_SESSION["new_name"]=$row['name'];
				$_SESSION["new_family"]=$row['family'];
				$_SESSION["new_usertype"]=$row['type'];
				$_SESSION["new_userid"]=$row['id'];
				$_SESSION["new_usermobile"]=$row['mobile'];
				$_SESSION["new_useremail"]=$row['email'];
				$_SESSION["new_usersendsms_count"]=1;
				$recipientNumbers=array($row['mobile']);
				
				
				$str=rand(100000,10000000);
				$_SESSION["new_smsvalue"]=$str;
				$messageBodies=array($str);
				$sendDate=array(time());
				
				$quer0y="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
				$resul0t = $coms_conect->query($quer0y);
				$row0 = $resul0t->fetch_assoc();
				$url=$row0['url'];
				$sms_password=$row0['sms_password'];
				$sms_user=$row0['sms_user'];
				$senderNumbers=array($row0['senderNumbers']); 
				####ACTIVE USER SMS
				if(get_result("select value from new_user_setting where la='$defult_lang' and site='$defult_site' and name='active_user_sms'",$coms_conect)==1&&$row['sms_active']==0){
					$sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$user);
					if($sms==1){
					$query1="update new_members set sms_value='$str' where user_name='$user'"; 
					$coms_conect->query($query1);
					 $_SESSION["sms_validation"]=$str;
					echo "<script>window.location='/sms_validation/{$madual_lang}'</script>";
					exit;
					}else 
					show_msg_warninig(sms_alert($sms));
						
				}
				//echo "select value from new_user_setting where la='$defult_lang' and site='$defult_site' and name='active_user_email'";exit;
				####ACTIVE USER EMAIL
				if(get_result("select value from new_user_setting where la='$defult_lang' and site='$defult_site' and name='active_user_email'",$coms_conect)==1&&$row['email_active']==0){
					$str=create_reset_password($user);
					$query1="update new_members set email_link='$str' where user_name='$user'"; 
					$coms_conect->query($query1);
					$headers= 'MIME-Version: 1.0' . "\r\n";
					$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
					$text="<div  style='text-align:right;font-family:tahoma;'>";
					$text  .="<p>$view_dear_friend, {$row['name']}  {$row['family']} </p>
					<p style='text-align:right'>  $user : $view_your_username </p>
					<p>$view_loongtext7 </p>
					<p><a style='text-align:center' target='_blank' href='{$_SERVER['HTTP_HOST']}/login/$madual_lang/$str'>To activate your account please click here</a><p>
					<p>$view_thankyou</p>" ;
					$text .="</div>";
					$to = $row['email'];
					$temp=$_SERVER['SERVER_NAME'];
					$subject = $temp;
					$headers .= "From:  $temp noreply@$temp ";
					 yepmail($to,$subject,$text,$headers);
					 $email_active_user=1;
					//$arr_video=array("date"=>time(),"manager_id"=>$user_id,"email"=>$email,"text"=>"<p> $view_send_link_change_password</p>");
					//insert_to_data_base($arr_video,'new_email_archive',$coms_conect); 
					show_msg($view_longtext17);
				}
				if($row['sms_login']==0&&$row['sms_active']==1&&$email_active_user==0){
					if($remmember_me==1) {
					 setcookie ("auto_login", 'user='.$user.'&pass='.md5('yaali'.$user_password.'maddad'), time() +(86400 * 30),'/', null,false,true);
					}
					$_SESSION["new_okusername"]=$_SESSION["new_username"];
					echo "$redirect_page";
					exit;
				}
				 
				$sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$user);
	 
				if($sms==1&&$email_active_user==0){
					$query1="update new_members set sms_value='$str' where user_name='$user'"; 
					$coms_conect->query($query1);
					if($row['sms_active']==0){
					$_SESSION["sms_validation"]=$str;
					echo "<script>window.location='/sms_validation/{$madual_lang}'</script>";
					exit;
					}
					if($row['sms_active']==1&&$sms==1){
					echo "<script>window.location='/sms_login/{$madual_lang}'</script>";
					exit;
				 }
				}else if($email_active_user==0){
					show_msg_warninig(sms_alert($sms));
				}	
		 

			}else{
				show_msg_warninig($view_incorrect_username_password);
			 /*?>
			 <div class="row col-xs-12">
				  <div class="alert alert-danger sr_alert fade col-md-5 col-xs-10">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong></strong> <?=$view_incorrect_username_password?>
					</div>
					</div>
				  
				  <script>
				   $(".alert").delay(200).addClass("in").fadeOut(400).fadeIn(400);
				</script>  	
			<?*/}
		}else if($row['status']==0&&$row['password']==$user_password){
			show_msg_warninig($view_incorrect_status);
			/*?>
			<div class="row col-xs-12">
				<div class="alert alert-danger sr_alert">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong></strong> <?=$view_incorrect_status?>
				</div>
			</div>
		<?*/}else{
			show_msg_warninig($view_incorrect_username_password);
			/*?>
		<div class="row col-xs-12">
				  <div class="alert alert-danger sr_alert   col-md-5 col-xs-10">
					  <button type="button" class="close" data-dismiss="alert">×</button>
					  <strong></strong> <?=$view_incorrect_username_password?>
					</div>
					</div>
		<?*/}
		 
	}
}else if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]!=$_POST["com1_captcha"]){
	show_msg_warninig($view_incorrect_captcha);
	/*?>
			<div class="row col-xs-12">
		      <div class="alert alert-danger sr_alert fade col-md-5 col-xs-10">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong></strong> <?=$view_incorrect_captcha?>
				</div>
				</div>
			  
			  <script>
			   $(".alert").delay(200).addClass("in").fadeOut(400).fadeIn(400);
			</script> 
	
<?*/}?>


<script>
$(document).ready(function() {
	$('#member_loginForm').formValidation();
}); 
</script>


        <div class="tabbable">        
		
			<div class="tab-content">	
				<div class="row register loging tab-pane active" id="tab1">
					<?$login_first_text= get_tem_result($defult_site,$defult_lang,'login_first_text',$tem_name,$coms_conect);?>
                    <!--div class="col-md-6 desc pull-left rtl">
                        <h3 class="rtl"><span class="fa fa-info-circle"></span><?=$login_first_text['title']?></h3>
                        <hr>
                        <p><?=$login_first_text['text']?></p>
                    </div-->
				

                    <div class="col-xs-12 form margin_middle">
					<div class="col-md-6 col-xs-12 pull-right login_part login_part_border">
					<div class="col-sm-8 col-xs-12 margin_middle">
					<?if($active_email_id>""&&$_POST['username']==''){
						$query="SELECT user_name,email,id,name,family,sms_active from new_members where email_link='$active_email_id'";
						$result = $coms_conect->query($query);
						$row = $result->fetch_assoc();
						$username=$row['user_name'];
						$emailuser=$row['email'];
						$nameuser=$row['name'];
						$familyuser=$row['family'];
					 	if($row['user_name']){
							$temp=create_reset_password($row['user_name']);
							if($temp==$active_email_id){
								$condition="email_link='$active_email_id'";
								if($row['sms_active']==1)
									$arr_slide=array("email_link"=>'','email_active'=>1,'status'=>1);
								else
									$arr_slide=array("email_link"=>'','email_active'=>1);
							 	update_data_base($arr_slide,'new_members',$condition,$coms_conect);
								$headers= 'MIME-Version: 1.0' . "\r\n";
								$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
								$temp=$_SERVER['SERVER_NAME'];
								$text="<div  style='text-align:right;font-family:tahoma;'>";
								$text  .="<p>$view_dear_friend, $nameuser  $familyuser </p>
								<p style='text-align:right'>  </p>
								<p>$view_longtext18 </p>
								<p> $username : $view_your_username</p>
							  	<p> $temp/login/$madual_lang</p>
								<p> $view_thankyou</p>";
								$text .="</div>";
								$to = $emailuser;
								$subject = "$view_profile_name   $temp";
								$headers .= "From:  $temp noreply@$temp ";
								 yepmail($to,$subject,$text,$headers);
								 show_msg($view_successful_register. ' '.$view_longtext14);
								/*?>
								<div class="alert  alert-success  alert" style='text-align:right' >
									<strong>
										<?=$view_successful_register?>
										<?=$view_longtext14?>
									</strong> 
								</div>
								
							<?*/}	
						}else{
							 show_msg_warninig($view_longtext19);
							 /*?>
							<div class="alert  alert-danger  alert" style='text-align:right' >
								<strong>
									<?=$view_longtext19?>
								</strong> 
							</div>		
						<?*/}?> 
			
		 				<br>
					<?}
					if($_SESSION["resgiter_str"]>""){
						show_msg($_SESSION["resgiter_str"]);
						$_SESSION["resgiter_str"]='';
					}
						
					if($_SESSION["warning_resetpass"]>""){
						show_msg_warninig($_SESSION["warning_resetpass"]);
						$_SESSION["warning_resetpass"]='';
					}		
					?>
                        <h3 class="rtl pr0" style="text-align: center;"></span><?=$view_login_site_form?></h3>
                        
                        <form method='post' id="member_loginForm" action=""
								data-fv-framework="bootstrap"
								data-fv-message="This value is not valid"
								data-fv-icon-validating="glyphicon glyphicon-refresh">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
								<input value="<?=$_POST['modal_lock_url']?>" type="hidden" name="lock_url">
                                <input class="form-control" name="username" type="username" style="direction:ltr!important" placeholder="<?=$view_username?>"
								data-fv-message="<?=$view_notvalid_username?>"
 
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>"
				 
								data-fv-regexp="true"
								data-fv-regexp-regexp="^[a-zA-Z0-9_\.]+$"
								data-fv-regexp-message="<?=$view_username_point_num_letter?>"
				 
								data-fv-stringlength="true"
								data-fv-stringlength-min="6"
								data-fv-stringlength-max="30"
								data-fv-stringlength-message="<?=$view_username_character?>"></input>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                                <input class="form-control" name="password" type="password" style="direction:ltr!important" placeholder="<?=$view_password?>"
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>"></input>
                            </div>
                            <div class="form-group">
								<div class="col-xs-10 form-group pull-right rtl pl0">
								 <input class="form-control" name="com1_captcha"  placeholder="<?=$view_captcha?>"
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>"
								
								data-fv-numeric="true"
								data-fv-numeric-message="<?=$view_number_required?>">
								</div>
								
								<div class="col-xs-2 form-group pull-right rtls pr0">
									<div><span>
									<img style="height: 34px;" src="<?crate_capcha_pic($madual_lang)?>"></span></div>
								</div>
							</div>
							<div class="col-md-12 form-group pull-right rtl">
							   <input type="checkbox" name="remmember_me" value='1'></input> 
								<?=$view_remember_me?>
                            </div>
                            <div class="col-md-12 form-group pull-right nav-justified">
                                <button type="submit" class="btn btn-danger fullwidth"><?=$view_login?></button>
                            </div>
							<div class="col-xs-12 form-group pull-right rtl">
							<?=$view_forgot_your_password_ask?>
								<a href="#forgot-box" class="blue_link" id="forgot" data-toggle="tab">
								<?=$view_forgot_your_password_help?></span></a>
                            </div>
							<!--div class="col-md-6 form-group pull-left">
								<a href="/register/<?=$defult_lang?>"></span>
								<?=$view_not_register_site?></a>
                            </div-->
							
                        </form>

						</div>
	
                    </div>
					
				
					
					<div class="col-md-6 col-xs-12 pull-right login_part_2">
					<div class="col-sm-8 col-xs-12 margin_middle">
						<h3 class="rtl pr0" style="text-align: center;"></span><?=$view_membership_site?></h3>
						<p class="rtl pr0" style="text-align: center;margin: 30px 0;"></span><?=$view_register_use_feature?></p>
						<div class="col-xs-12 form-group pull-left">
							<a class="btn btn-default col-xs-12" href="/register/<?=$defult_lang?>" role="button"></span>
							<?=$view_not_register_site?></a>
						
                        </div>
					</div>
					</div>
					
					

					</div>
                </div>
				
				
				<div id="forgot-box" class="row form register rese tab-pane">
					<?$login_first_text= get_tem_result($defult_site,$defult_lang,'login_first_text',$tem_name,$coms_conect);?>
                    <!--div class="col-md-6 desc pull-left rtl">
                        <h3 class="rtl"><span class="fa fa-info-circle"></span><?=$login_first_text['title']?></h3>
                        <hr>
                        <p><?=$login_first_text['text']?></p>
                    </div-->
					
					<div class="col-sm-4 col-xs-12 form margin_middle">
						<h3 class="rtl pr0"><span class="fa fa-key"></span><?=$view_reset_pass_coms?></h3>
						<hr>
						
						<div class="tabbable">	
						  <ul class="nav nav-pills nav-justified">
							<li ><a href="#second" data-toggle="tab" style="border-radius: 0px;"><?=$view_sms?></a></li>
							<li class="active"><a href="#first" data-toggle="tab" style="border-radius: 0px;"><?=$view_email?></a></li>
						  </ul>
						  
						  <div class="tab-content">
							<div class="tab-pane active" id="first">
							<form class="form-horizontal"  action="" role="form" method="post" enctype="multipart/form-data">
								
								<fieldset>
								  <div class="form-group">
									<label class="col-xs-12 pull-right rtl"><?=$view_enter_email?></label>
									<div class="col-xs-12">
										<input type="email" id='email' class="form-control" placeholder="<?=$view_email?>" style="direction:ltr!important"/>
									</div>
								  </div>
									<br>
								  <div class="clearfix nav-justified">
									<button type="button" id="send_email" class="fullwidth btn btn-danger">
									  <i class="ace-icon fa fa-lightbulb-o"></i>
									  <span><?=$view_send?></span>
									</button>
								  </div>
									<img id='wait_email' src='/waiting.gif' style='display:none'>
								
								</fieldset>
							</form>
						<div id="qestion_div" style="display:none;text-align: right;" class="col-md-12 col-sm-12 col-xs-12 form-group  ">
							<label dir="rtl"><?=$view_security_question?> :</label><div id="show_qestuin"></div><br> 
							<label id="qestion_div"></label> 
							<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
								<input class="form-control" id="manager_ansewer" type=" " placeholder=""></input>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
								<button id="send_memeber_ansewer" class="btn btn-primary fullwidth"><?=$view_send?></button>
							</div>
						</div>
						 <div id='show_email'></div>
						</div>
								
						 
							<div class="tab-pane " id="second">
							  <form class="form-horizontal" action="" role="form" method="post" enctype="multipart/form-data">
				
								<fieldset>
								  <div class="form-group">
									<label class="col-xs-12 pull-right rtl"><?=$view_enter_mobile?></label>
									<div class="col-xs-12"> 
										<input type="text" name='sms_number' id='sms_number' class="form-control" placeholder="<?=$view_mobile?>" maxlength="11"/>
									</div>
								  </div>
									<br>
								  <div class="clearfix nav-justified">
									<button type="button" id='send_sms' class="fullwidth btn btn-danger">
									  <i class="ace-icon fa fa-lightbulb-o"></i>
									  <span><?=$view_send?></span>
									</button>
								  </div>
								   <img id='wait' src='/waiting.gif' style='display:none'>
								  <div id='show_sms'></div>
								</fieldset>
							  </form>
							  	<div  id='show_sms_validation' class="alert alert-error yepalert yepalert-danger   "  style="display:none;position: static;">
								   <strong></strong> <?=$view_incorrect_code?>
								</div>
							 
							</div>
							
						  </div>
						</div>
							
						
						<div class="footer">
						  <a href="#tab1" id="backing" data-toggle="tab" class="back-to-login-link pull-left">
							<?=$view_back?>
						  </a>
						
						</div></br></br>
					</div>	
				</div><!-- /.forgot-box -->
			</div>
		</div>
		
<script>            
$("#send_email").click(function () {
 
  if($('#email').val()){
	$("#wait_email").show();
	$("#qestion_div").hide();
	$.ajax({
	type:'POST',
	url:'/New_members_ajax.php',
	data:"action=send_member_email&id="+$('#email').val(),
	success: function(result){
	  $("#wait_email").hide();
		var temp=result.split('~');
		if(temp[0]>""){
			 
			$("#qestion_div").show();
			$("#show_qestuin").html(temp[0]);  
		}
		$("#show_email").html(temp[1]);    
	}
	});
  }        
});
		   
$(document).on('click', '#send_memeber_ansewer', function(e) {
	 
	e.preventDefault()
	$("#show_email1").html('');  
	$("#wait_email").show();
 
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=send_member_email&id="+$('#email').val()+"&value="+$('#manager_ansewer').val(),
		success: function(result){
			var temp=result.split('~');
			$("#wait_email").hide();     
			if(temp[0]>""){
					$("#qestion_div").show();
					$("#show_qestuin").html(temp[0]);  
			}
		 	$("#show_email").html(temp[1]);  
		} 
	});
});			   
 		   
$("#send_sms").click(function () {
	if($('#sms_number').val()){
		$("#wait").show();
		$.ajax({
			type:'POST',
			url:'/New_members_ajax.php',
			data:"action=send_member_sms&id="+$('#sms_number').val(),
			success: function(result){
			  $("#wait").hide();
			  $("#show_sms").html(result);  
			}
		});
	}        
});
$(document).on('click', '#send_memeber_code', function() {
 	$("#wait").show();
    $("#show_sms_validation").hide(); 
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=send_member_sms_code&id="+$('#sms_number').val()+"&value="+$('#code_number').val(),
		success: function(result){
			if(result==0){
				$("#wait").hide();
				$("#show_sms_validation").show();
			}else if(result==1){
				window.location='/new_answer_member_qestion.php?la=<?=$madual_lang?>';
			}else {
				window.location='/new_member_change_password.php?la=<?=$madual_lang?>&val='+result;
			}
		}
	});    
})
</script>				
				
				<!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->

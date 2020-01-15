<?$reg_low= get_tem_result($defult_site,$defult_lang,'reg_low_text','default',$coms_conect);?>	
	<div class="modal fade" id="reg_low" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close pull-left" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel"><?=$view_site_rules?></h4>
					</div>
					<div class="modal-body custom-scroll terms-body">
 
 
			
			<br><br>

            <p><strong><?echo $reg_low['text'];?>
			 </strong></p>


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">
							<?=$view_close?>
						</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
            <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
               <img src="<?=$reg_low['pic_adress']?>" alt="<?=$nav_title?>">
            </section>

            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="#"><span class="fa fa-home"></span></a></li>
                        <li><a href="#"><?=$view_account?></a></li>
                        <li class="active"><?=$view_register?></li>
                    </ol>
                </div>
            </section>


        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-user-plus"></span>

                <h1 class="title"><?=$reg_low['title']?></h1>
                <span class="pdesc"><?=$reg_low['link']?></span>

            </div>
        </div>
        <!-- End Page Title -->
<?@session_start();
$name=injection_replace($_POST['name']);
$user_name=injection_replace($_POST['user_name']);
$family=injection_replace($_POST['family']);
$password=injection_replace($_POST['password']);
$mobile=injection_replace($_POST['mobile']);
$email=injection_replace($_POST['email']); 
$check_low=injection_replace($_POST['check_low']); 
$sms_active=0;
$email_active=0;  	
$sms_value=0; 
$ok_msg=0; 	
$sms=10000;
if(isset($_POST["comment_captcha"])&&$_POST["comment_captcha"]!=""&&$_SESSION["code"]==$_POST["comment_captcha"]&&$check_low==1){
	$temp=$_SERVER['SERVER_NAME'];	
	if($user_name>""){
			
		if(get_result("SELECT value  from new_user_setting where name='active_user_email' and la='$madual_lang' and site='$site'",$coms_conect)==0)
		 $email_active=1;  	
		if(get_result("SELECT value  from new_user_setting where name='active_user_sms' and la='$madual_lang' and site='$site'",$coms_conect)==0){
			$sms_active=1; 
			 
		}
		 
		if($email_active==1&&$sms_active==1)
			$status=1;else $status=0;
		if(get_result("select count(id) as count from new_members where user_name='$user_name'",$coms_conect)>0||get_result("select count(id) as count from new_managers where user_name='$user_name'",$coms_conect)>0){
			$ok_msg=1;
			show_msg_warninig($view_username_repeated);
		}else if(get_result("select count(id) as count from new_members where mobile='$mobile'",$coms_conect)>0){
			$ok_msg=1;
			show_msg_warninig($view_mobile_repeated);
		}else if(get_result("select count(id) as count from new_members where email='$email'",$coms_conect)>0){
			$ok_msg=1;
			show_msg_warninig($view_email_repeated);
		}else {
			$old_password=$password;
			$password=create_memebre_password($user_name,$password);
			$arr=array("sms_value"=>0,"sms_active"=>$sms_active,"email_active"=>$email_active,"status"=>$status,"la"=>$madual_lang,"site"=>$site,"name"=>$name,"user_name"=>$user_name,"family"=>$family,"password"=>$password,"mobile"=>$mobile,"email"=>$email,"type"=>1,'date'=>$now,'ip'=>$custom_ip);
			$id=insert_to_data_base($arr,'new_members',$coms_conect);
			$str=create_reset_password($user_name);
			if($sms_active==0){
				$sms_value=rand(100000,10000000);	
				$recipientNumbers=array($mobile);
				$sms_str="کد تایید و بررسی موبایل : $sms_value
				نام سایت : {$_SERVER['SERVER_NAME']}";
				$messageBodies=array($sms_str);
				$sendDate=array(time());
				$sms=send_sms($sms_url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$user_name);
				if($sms!=1){
					$condition1="id=$id";
					delete_from_data_base('new_members',$condition1,$coms_conect);
					show_msg_warninig(sms_alert($sms));
				}
			} 
			if($email_active==0&&($sms==1||$sms==10000)){
				$query1="update new_members set email_link='$str' where id='$id'"; 
				$coms_conect->query($query1);
				$headers= 'MIME-Version: 1.0' . "\r\n";
				$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
				$text="<div  style='text-align:right;font-family:tahoma;'>";
				$text  .="<p>$view_dear_friend, $name  $family </p>
				<p style='text-align:right'>  $user_name : $view_your_username </p>
				<p>$view_loongtext7 </p>
				<p><a style='text-align:center' target='_blank' href='{$_SERVER['HTTP_HOST']}/login/$madual_lang/$str'>To activate your account please click here</a><p>
				<p>$view_thankyou</p>" ;
				$text .="</div>";
				$to = $email;
				$subject = ' ثبت نام آنلاین در '.$temp;
				$headers .= "From:  $temp noreply@$temp ";
				 yepmail($to,$subject,$text,$headers);
				//$arr_video=array("date"=>time(),"manager_id"=>$user_id,"email"=>$email,"text"=>"<p> $view_send_link_change_password</p>");
				//insert_to_data_base($arr_video,'new_email_archive',$coms_conect); 
				 
				$_SESSION["resgiter_str"]=$view_longtext17;
				
				$ok_msg=1;
				$email_active=1;
				if($sms_active!=0){
					echo "<script>window.location='/login/{$madual_lang}'</script>";
					exit;
				}
			} 
			if($sms==1&&$email_active==1){
				$_SESSION["sms_validation"]=$str;
				$_SESSION["new_smsvalue"]=$sms_value;
				$_SESSION["new_username"]=$user_name;
				$_SESSION["new_usermobile"]=$mobile;
				 
				$condition="id=$id";
				$arr_slide=array("sms_value"=>$sms_value);
				update_data_base($arr_slide,'new_members',$condition,$coms_conect);
				echo "<script>window.location='/sms_validation/{$madual_lang}'</script>";
				exit;
			}
				$headers= 'MIME-Version: 1.0' . "\r\n";
				$headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
				$temp=$_SERVER['SERVER_NAME'];
				$text="<div  style='text-align:right;font-family:tahoma;'>";
				$text  .="<p>$view_dear_friend, $name  $family </p>
				<p style='text-align:right'>  </p>
				<p>$view_longtext18 </p>
				<p> $user_name : $view_your_username</p>
				<p> $temp/login/$madual_lang</p>
				<p> $view_thankyou</p>";
				$text .="</div>";
				$to = $email;
				$subject = "$view_profile_name   $temp";
				$headers .= "From:  $temp noreply@$temp ";
				 yepmail($to,$subject,$text,$headers);
		}
		if($status==1&&$ok_msg==0){
			$_SESSION["resgiter_str"]=$view_successful_register;
			echo "<script>window.location='/login/{$madual_lang}'</script>";
			exit;
		}
 
	}
	
}else if(isset($_POST["comment_captcha"])&&$_POST["comment_captcha"]!=""&&$_SESSION["code"]!=$_POST["comment_captcha"]){
	 show_msg_warninig($dl_cspcha_er_mesage);
} 
	
?>	
        <div class="container">
            <main>
                <!-- Start Main -->
                <div class="row register">
				<?$register_text= get_tem_result($defult_site,$defult_lang,'register_text',$tem_name,$coms_conect);?>
                    <!--div class="col-md-6 desc pull-left rtl">
                        <h3 class="rtl"><span class="fa fa-info-circle"></span><?=$register_text['title']?></h3>
                        <hr>
                        <p><?=$register_text['text']?></p>
                    </div-->

                    <div class="col-md-6 col-xs-12 form margin_middle">
                        <h3 class="rtl pr0 tcenter"><span class="fa fa-user"></span><?=$view_register_form?></h3>
                        <hr>
                        <form method='post' id="member_registerForm"
								data-fv-framework="bootstrap"
								data-fv-message="This value is not valid"
								data-fv-icon-validating="glyphicon glyphicon-refresh">
								
							<input type="hidden" id="check_ajax_email" value="1">
							<input type="hidden" id="check_ajax_user" value="1">
							<input type="hidden" id="check_ajax_mobile" value="1">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right rtl">
                                <input name="user_name" id="user_name" value="<?=$user_name?>" class="form-control" placeholder="<?=$view_username?>"
								style="direction:ltr!important"								
								data-fv-message="<?=$view_notvalid_username?>"
 
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>"
				 
								data-fv-regexp="true"
								data-fv-regexp-regexp="^[a-zA-Z0-9_\.]+$"
								data-fv-regexp-message="<?=$view_username_point_num_letter?>"
				 
								data-fv-stringlength="true"
								data-fv-stringlength-min="6"
								data-fv-stringlength-max="30"
								data-fv-stringlength-message="<?=$view_username_character?>">
                            </div>
								<div id="show_check_box" class="form-group "></div>
							<div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right rtl">
                                <input name="password" class="form-control" type="password" placeholder="<?=$view_password?>" 
								style="direction:ltr!important"
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>"
				 
								data-fv-different="true"
								data-fv-different-field="username"
								data-fv-different-message="<?=$view_repeat_password_notsame?>"
								
								data-fv-stringlength="true"
								data-fv-stringlength-min="8"
								data-fv-stringlength-max="30"
								data-fv-stringlength-message="<?=$view_username_character8?>">
                            </div>	
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right rtl">
                                <input name="passwordConfirm" class="form-control" type="password" placeholder="<?=$view_repeat_password?>"
								style="direction:ltr!important"
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>"
				 
								data-fv-identical="true"
								data-fv-identical-field="password"
								data-fv-identical-message="<?=$view_repeat_password_notsame?>">
                            </div>
							
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right rtl">
                                <input name="name" class="form-control" value="<?=$name?>" placeholder="<?=$view_name?>"
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group pull-right rtl">
                                <input name="family" class="form-control" value="<?=$family?>" placeholder="<?=$view_family?>"
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>">
                            </div>
							<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">zzzzzzz
                                <input name="mobile" id="mobile" class="form-control" value="<?=$mobile?>" type="text" placeholder="<?=$view_number_mobile?>"
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>"
								
								data-fv-numeric="true"
								data-fv-numeric-message="<?=$view_number_required?>">
                            </div>
							 <div id="show_mobile_box" class="form-group "></div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                                <input name="email" id="email" class="form-control" value="<?=$email?>" type="email" placeholder=" <?=$view_email?> "
								style="direction:ltr!important"
								data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_field_required?>"
								
								data-fv-emailaddress="true"
								data-fv-emailaddress-message="<?=$view_email_notvalid?>">
                            </div>
							 <div id="show_email_box" class="form-group "></div>
							<div class="form-group"> 
								<div class="col-md-10 col-sm-11 col-xs-11 form-group pull-right rtl pl0">
									<input name='comment_captcha' class="form-control" placeholder="<?=$view_captcha?>"
									data-fv-notempty="true"
									data-fv-notempty-message="<?=$view_field_required?>"
									
									data-fv-numeric="true"
									data-fv-numeric-message="<?=$view_number_required?>">
								</div>
								<div class="col-md-2 col-sm-1 col-xs-1 form-group pull-right rtls pr0">
									<div><span><img src="<?crate_capcha_pic($madual_lang)?>" style="height: 34px;"></span></div>
								</div>
							</div>	
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right rtl">
							   <input type="checkbox" name="check_low" value='1' data-fv-notempty="true"
								data-fv-notempty-message="<?=$view_notagree_read?>">
                                <?=$view_me_all?>  <a data-toggle="modal" class="blue_link cs_hand" data-target="#reg_low"><?=$view_rules?></a>
								<?=$view_read_agree?>
								<img src="/waiting.gif" id="dynamic" style="width: 100px;display:none;">
                            </div>
							
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                                <button id='submit_page' type='submit' class="btn btn-success fullwidth"><?=$view_register?></button>
                            </div>
							
                        </form>
                        <hr>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right rtl">
						<?=$view_Register_if?>
                            <a  class="blue_link cs_hand" onclick="window.location='/login/<?=$madual_lang?>'">
							<?=$view_register_here?></a><?=$view_register_click?>
                        </div>
                    </div>


                </div>
				
				<script>
				$(document).ready(function() {
					$('#member_registerForm').formValidation().on('success.form.fv', function(e) {
						e.preventDefault();
						var $form = $(e.target);
						var fv = $form.data('formValidation');
						$('#dynamic').show();
						fv.defaultSubmit();
					});
				});
				</script>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->
<script>
	$("#user_name").keyup(function () {
		$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=check_users&id="+$(this).val(),
				success: function(result){
					if(result>0){
						$("#show_check_box").html('<?=$view_repeat_name?>');
						$("#show_check_box").css('color', 'red');
						$('#submit_page').attr('disabled','disabled');
						$('#check_ajax_user').val(0);
					}
					else if(result==0){
						$("#show_check_box").html('<?=$view_free_name?>');
						$("#show_check_box").css('color', 'green');
						$('#check_ajax_user').val(1);
						if($('#check_ajax_email').val()==1&&$('#check_ajax_mobile').val()==1&&$('#check_ajax_user').val()==1)
						$('#submit_page').removeAttr('disabled');
					}
				}
			});	
		});
	$("#mobile").keyup(function () {
		$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=check_user_mobile&id="+$(this).val(),
				success: function(result){
					if(result>0){
						$("#show_mobile_box").html(' <?=$view_repeat_mobile?>');
						$("#show_mobile_box").css('color', 'red');
						$('#check_ajax_mobile').val(0);
						$('#submit_page').attr('disabled','disabled');
					}
					else if(result==0){
						$("#show_mobile_box").html('<?=$view_free_mobile?>');
						$("#show_mobile_box").css('color', 'green');
						$('#check_ajax_mobile').val(1);
						if($('#check_ajax_email').val()==1&&$('#check_ajax_mobile').val()==1&&$('#check_ajax_user').val()==1)
						$('#submit_page').removeAttr('disabled');
					}
				}
			});	 
		});	
	$("#email").keyup(function () {
		$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=check_user_email&id="+$(this).val(),
				success: function(result){
					if(result>0){
						$("#show_email_box").html(' <?=$view_repeat_email?>');
						$("#show_email_box").css('color', 'red');
						$('#check_ajax_email').val(0);
						$('#submit_page').attr('disabled','disabled');
					}
					else if(result==0){
						$("#show_email_box").html('<?=$view_free_email?>');
						$("#show_email_box").css('color', 'green');
						$('#check_ajax_email').val(1);
						if($('#check_ajax_email').val()==1&&$('#check_ajax_mobile').val()==1&&$('#check_ajax_user').val()==1)
						$('#submit_page').removeAttr('disabled');
					}
				}
			});	
		});	

 
</script>	
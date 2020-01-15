<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">

<?@session_start();
//echo '<br>new_smsvalue: '.$_SESSION["new_smsvalue"].'<br>new_usermobile: '.$_SESSION["new_usermobile"].'<br>sms_validation: '.$_SESSION["sms_validation"];exit;

 if($_SESSION["new_okusername"])
echo "<script>window.location='/profile/{$madual_lang}'</script>";
if($_SESSION["new_smsvalue"]=='')
echo "<script>window.location='/login/{$madual_lang}'</script>";
$sms_pass=injection_replace($_POST['sms_pass']);
//echo 'smspass='.$sms_pass;
if($_SESSION["new_okusername"]>'')
echo "<script>window.location='/profile/{$madual_lang}'</script>";


//echo 'smspass='.$sms_pass;

//if($_SESSION["sms_validation"]>""&&$sms_pass>""){
if($_SESSION["sms_validation"]>""){
	if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]==$_POST["com1_captcha"]){
		$query="SELECT sms_value,mobile from new_members where user_name='{$_SESSION["new_usermobile"]}'";
		$result = $coms_conect->query($query);
		$row = $result->fetch_assoc();
		if($sms_pass==$_SESSION["new_smsvalue"]&&$sms_pass==$row['sms_value']){
			$query1="update new_members set sms_active=1 where user_name='{$_SESSION["new_usermobile"]}'";
			$coms_conect->query($query1);



			$recipientNumbers=array($row['mobile']);
			$sms_str="$view_welcome_to_site
			$pro_sms_user : {$_SESSION["new_username"]}
			$view_site_name : {$_SERVER['SERVER_NAME']}";
			$messageBodies=array($sms_str);
			$sendDate=array(time());
//			$sms=send_sms($sms_url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$_SESSION["new_username"]);

//			if(get_result("SELECT value  from new_user_setting where name='active_user_email' and la='$madual_lang' and site='$site'",$coms_conect)==1){
//				$_SESSION["resgiter_str"]=$view_longtext20;
//				echo "<script>window.location='/login/{$madual_lang}'</script>";
//				exit;
//			}else{
				$query1="update new_members set status=1 where user_name='{$_SESSION["new_username"]}'";
				$coms_conect->query($query1);
				$_SESSION["new_okusername"]=$_SESSION["new_username"];
				echo "<script>window.location='/profile/{$madual_lang}'</script>";
//			}

		}else
			show_msg_warninig('<div class="alert alert-danger">'.$view_incorrect_code.'</div>');
	}else if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]!=$_POST["com1_captcha"]){
		show_msg_warninig($dl_cspcha_er_mesage);
	}
}else if($_SESSION["sms_validation"]==""){
		echo "<script>window.location='/logout'</script>";
}

?>
<?$login_two_level= get_tem_result($defult_site,$defult_lang,"login_two_level_text",'default',$coms_conect);?>
	<!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
				<img src="<?=$login_two_level['pic_adress']?>" alt="<?=$nav_title?>">
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


<div class="ptitle">
    <div class="container">
		<span class="fa fa-user"></span>
		<h1 class="title"><?=$login_two_level['title']?></h1>
		<span class="pdesc"><?=$login_two_level['link']?></span>
    </div>
</div>
        <!-- End Page Title -->

        <div class="container">
            <main>
                <!-- Start Main -->
                <div class="row register">
					<?$active_user_sms= get_tem_result($defult_site,$defult_lang,'active_user_sms',$tem_name,$coms_conect);?>
                    <div class="col-md-3 col-sm-12 col-xs-12 desc pull-right rtl">
                        <!--h3 class="rtl"><span class="fa fa-info-circle"></span><?=$active_user_sms['title']?></h3>
                        <hr>
                        <p><?=$active_user_sms['text']?></p-->
                    </div>

                    <div class="col-md-5 col-sm-12 col-xs-12 form pull-right">
                        <h3 class="rtl pr0"><span class="fa fa-mobile"></span><?=$view_verification_mobile?></h3>
                        <hr>
						<div class="infobanner">
							<div id="retry-send-container" class="infobanner-content alert alert-warning" style="text-align:center;direction:rtl">
								<?=$view_sms_not_receive?>
								<button type="button" id="send_again" value="" class="btn btn-link">
									<?=$view_resend?>
								</button>
								<img id="show_waiting" src='/waiting.gif' style="display:none">
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">	
								 <p class="form-label" style="text-align:center;direction:rtl">
									<?=$view_7mobile_number?> <?=substr($_SESSION["new_usermobile"],8,12).'****'.substr($_SESSION["new_usermobile"],0,4);?> <?=$view_enter_code_7digit?> 
								</p>
							
								<form method="post" id="member_smsregister">
									<div class="form-group">
										<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
											<input class="form-control" name="sms_pass" type="username" placeholder="<?=$view_vertificate_7num?>"></input>
										</div>
									</div>	
									
									<div class="form-group">	
										<div class="col-xs-9 form-group pull-right rtl p10" style="padding-left:0px">
											<input type="text" class="form-control" name="com1_captcha" placeholder="<?=$view_code_captcha?>" style="border-bottom-left-radius: 0; border-top-left-radius: 0px;">
										</div>
										<div class="col-xs-2 form-group pull-right rtls pr0">
											<span>
											<img style="height: 34px;"  src="<?crate_capcha_pic($madual_lang)?>" /></span>
										</div>
									</div>
									
								<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
									<button type='submit' class="btn btn-success submit fullwidth"><?=$view_Verification?></button>
									<img src="/waiting.gif" id="dynamic" style="width: 100px;display:none;">
								</div>
							</form>
							</div>
						</div>
					</div>
						
					
					<script>
					$(document).ready(function() {
						$('#member_smsregister').formValidation({
							framework: 'bootstrap',
							fields: {
								sms_pass: {
									validators: {
										notEmpty: {
											message: '<?=$view_field_required?>'
										},
										numeric: {
											message: '<?=$view_number_required?>'
										}
									}
								},
								com1_captcha: {
									validators: {
										notEmpty: {
											message: '<?=$view_field_required?>'
										},
										numeric: {
											message: '<?=$view_number_required?>'
										}
									}
								}
							}
						});
					});
					</script>

                </div>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->
 	
<script>
		$("#send_again").click(function () {
			$("#show_waiting").show();
			$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=send_again_sms&id=<?=$_SESSION["new_username"]?>",
				success: function(result){
				$("#show_waiting").hide();
				 if(result==1)
					 alert('<?=$view_code_resent?>');
				 else if(result==0)
					  alert('<?=$view_sent_more_than5?>');
				}
			});		
		});
		$("#logout").click(function () {
			window.location='/logout';
		});
		
		
 
		
</script>	
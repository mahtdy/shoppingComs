<?@session_start();

if($_SESSION["new_okusername"])
echo "<script>window.location='/{$_SESSION["new_okusername"]}'</script>";
if($_SESSION["new_smsvalue"]=='')
echo "<script>window.location='/login/{$madual_lang}'</script>";
$sms_pass=injection_replace($_POST['sms_pass']);
if($_SESSION["new_username"]>""&&$sms_pass>""){
	if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]==$_POST["com1_captcha"]){
		$query="SELECT sms_value from new_members where user_name='{$_SESSION["new_username"]}' and status=1";
		$result = $coms_conect->query($query);
		$row = $result->fetch_assoc();
		if($sms_pass==$_SESSION["new_smsvalue"]&&$sms_pass==$row['sms_value']){
			$_SESSION["new_okusername"]=$_SESSION["new_username"];
			echo "<script>window.location='/{$_SESSION["new_okusername"]}'</script>";
		}else
			show_msg_warninig('<?=$view_incorrect_code?>');
	}else if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]!=$_POST["com1_captcha"]){
	echo "<script>alert('$dl_cspcha_er_mesage')</script>";
	}
}else if($_SESSION["new_username"]==""){
		echo "<script>window.location='/logout'</script>";
}	
		
?><!-- Start Slider -->


<?$login_two_level= get_tem_result($defult_site,$defult_lang,"login_two_level_text",'default',$coms_conect);?>
<section class="slider pimg animated fadeIn hidden-xs">
<img src="<?=$login_two_level['pic_adress']?>" alt="<?=$nav_title?>">
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
 
<!-- End Header -->

<!-- Start Page Title -->
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
		 <div class="col-md-3 desc pull-right rtl">
			<!--h3 class="rtl"><span class="fa fa-info-circle"></span><?=$view_help?></h3>
			<hr>
			<p><?=$login_two_level['text']?></p-->
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12 form pull-right">
			<h3 class="rtl pr0"><span class="fa fa-mobile"></span><?=$view_login_two_phase?></h3>
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
						<?=$view_7mobile_number?><?=substr($_SESSION["new_usermobile"],8,12).'****'.substr($_SESSION["new_usermobile"],0,4);?>  <?=$view_enter_code_7digit?>
					</p>
					
					<form method="post">
						<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
							<input class="form-control" name="sms_pass" type="username" placeholder="<?=$view_vertificate_7num?>"></input>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right" dir="rtl">
							<div class="input-group">
								<input type="text" class="form-control" name="com1_captcha" placeholder="<?=$view_code_captcha?>" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
							
								<span class="input-group-addon">
								<img  src="<?crate_capcha_pic($madual_lang)?>"/></span>
							</div>
						</div>
		 
						<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
							<button class="btn btn-success fullwidth"><?=$view_Verification?></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end main row -->
	</main>
	<!-- end main -->
</div>
<style>
.input-group-addon:last-child {
    background-color: transparent;
    border: 1px solid #CCC;
    padding: 0px;
	border-bottom-right-radius: 0px;
    border-top-right-radius: 0px;
}
</style>
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
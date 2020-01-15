
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
		<div class="tabbable" id="tabs-1123">
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#panel-32101" data-toggle="tab">فرم درج نظر</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="panel-1123">
												
												<form action="" method="post">
													<div class="row form-input">
														<div class="col-md-4 col-lg-4 field icon-field">
															<span class="icon"><i class="fa fa-user"></i></span>
															<input class="inputh" type="text" name="rep_name" placeholder="نام">
															<input class="inputh" type="hidden" id="rep_comment_id" name="rep_comment_id" >
														</div><!-- // .field -->

														<div class="col-md-4 col-lg-4 field icon-field">
															<span class="icon"><i class="fa fa-envelope"></i></span>
															<input type="email" name="rep_email" placeholder="پست الکترونيک">
														</div><!-- // .field -->

														<div class="col-md-4 col-lg-4 field icon-field">
															
															<span class="icon"><i class="fa fa-globe"></i></span>
															<input type="text" name="rep_com1_captcha" placeholder="کد امنيتي">
														</div><!-- // .field -->
															
													</div><!-- // .form-input -->
													<br>
													<textarea class="bottom-20" name="rep_comment" id="rep_comment-text" cols="30" rows="5"></textarea>
													
													<button class="button medium btn-success"><span>ارسال نظر</span></button>
													<img  src="/new_dynamics/captcha.php" style="margin-top: 5px;height: 23px;"/>
																												
												</form><!-- // .post -->
											</div>
										</div>
									</div>
			</div>

		</div><!-- /.modal-dialog --> 
	</div><!-- /.modal-dialog -->
</div><!-- /.modal-dialog -->
<?if(isset($_POST["rep_com1_captcha"])&&$_POST["rep_com1_captcha"]!=""&&$_SESSION["code"]==$_POST["rep_com1_captcha"]){
	$rep_comment_id=time();
	if(isset($_POST['rep_name'])){
	$rep_madul_id=injection_replace($_POST["rep_comment_id"]);
	$rep_name=injection_replace($_POST["rep_name"]);
	$rep_email=injection_replace($_POST["rep_email"]);
	$rep_text=injection_replace($_POST["rep_comment"]);
	$arr=array("name"=>$rep_name,"email"=>$rep_email,"text"=>$rep_text,"ip"=>$custom_ip,"date"=>$rep_comment_id,"madul_id"=>$madual_id, "rep_id"=>$rep_madul_id,"comment_id"=>0,"type"=>$comment_type);
	$id=insert_to_data_base($arr,'new_madules_comment',$coms_conect);
	echo "<script>alert('نظر شما ثبت گرديد')</script>";

	}
}else if(isset($_POST["rep_com1_captcha"])&&$_POST["rep_com1_captcha"]!=""&&$_SESSION["code"]!=$_POST["rep_com1_captcha"]){
	echo "<script>alert('$dl_cspcha_er_mesage')</script>";
}?>
<?if( ($_POST["ads_captcha"]) &&($_POST["ads_email_pm"])&&($_SESSION["code"]==$_POST["ads_captcha"])){
	$ads_text_pm_id=time();
	if(isset($_POST['ads_email_pm'])){
	$ads_pm_id=injection_replace($_POST["ads_pm_id"]);
	$ads_email_pm=injection_replace($_POST["ads_email_pm"]);
	$text=injection_replace($_POST["ads_text_pm"]);
	$arr=array("email"=>$ads_email_pm,"text"=>$text,"ip"=>$_SERVER['REMOTE_ADDR'],"date"=>$ads_text_pm_id,"madul_id"=>$ads_pm_id);
	$id=insert_to_data_base($arr,'new_ads_pm',$coms_conect);
	echo "<script>alert('<?=$view_message_record?>')</script>";

	}
}else if(isset($_POST["ads_captcha"])&&$_POST["ads_captcha"]!=""&&$_SESSION["code"]!=$_POST["ads_captcha"]){
	echo "<script>alert('<?=$view_incorrect_captcha?>')</script>";
}
 
?>               
				  <aside class="col-md-12 hidden-sm pull-right animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="header">
                                    <h3><span><?=$view_contact_information?></span></h3>
                                </div>
                                <div class="content ads_auther_contact">
                                    <div id="phnumbershow" data-phonenumber="<?=$_SESSION['ads_mobile']?>"></div>
									<button type='button' class="btn btn-primary" id="pnsbtn"><?=$view_seller_number_show?></button>
									<form method='post'>
									<input name='ads_pm_id' type='hidden' value='<?=$_SESSION['ads_id']?>'>
                                    <p class="afctitle"><span class="fa fa-paper-plane"></span><span><?=$view_seller_message_send?></span></p>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <input name='ads_email_pm' class="form-control" type="text" placeholder="<?=$view_email?>"/>
                                            </div>
                                        </div>
										 <div class="col-md-12">
                                            <div class="form-group">
											  <div class='col-md-4'> 
												<img  src="/new_dynamics/captcha.php" style="height: 40px;padding: 0;border: 0;border-radius: 4px;width:60px"/>
												</div>
												<div class="col-md-8">
                                                <input type="text" class="form-control" name="ads_captcha" placeholder="<?=$view_code_captcha?>">
												</div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <textarea class="form-control" type="text" name='ads_text_pm' placeholder="<?=$view_message?>"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <button class="btn btn-success fullwidth" type="text"><?=$view_send_message?></button>
                                            </div>
                                        </div>
                                    </div>
									</form>
                                </div>
                            </div>
                        </section>
                    </aside>
	<script>				
	$("#pnsbtn").click(function(e){
		//e.preventDefault();	
			
	});
	</script>				
	<script>				
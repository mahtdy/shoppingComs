 <?$faq_text=injection_replace($_POST['faq_text']);
$faq_cat=injection_replace($_POST['faq_cat']);
$sender_email=injection_replace($_POST['sender_email']);

 
if(isset($_POST["comment_captcha"])&&$_POST["comment_captcha"]!=""&&$_SESSION["code"]==$_POST["comment_captcha"]){
	if($faq_text>""){ 
				
				$arr=array("sender_email"=>$sender_email,"cat_id"=>$faq_cat,"question"=>$faq_text,"la"=>$madual_lang,"site"=>$site,'date'=>$now,'ip'=>$custom_ip);
				$id=insert_to_data_base($arr,'new_q_a',$coms_conect);
				echo "<script>alert('<?=$view_sended_question?>')</script>";
 	}
}else if(isset($_POST["comment_captcha"])&&$_POST["comment_captcha"]!=""&&$_SESSION["code"]!=$_POST["comment_captcha"]){
	echo "<script>alert('$dl_cspcha_er_mesage')</script>";
}
?>
 <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
                <img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/slider1.jpg">
            </section>
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="#"><span class="fa fa-home"></span></a></li>
                        <li class="active"><?=$view_faq2?></li>
                    </ol>
                </div>
            </section>
      
        <!-- End Header -->
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">
                <span class="fa fa-lightbulb-o"></span>
                <h1 class="title"><?=$view_faq2?></h1>
                <span class="pdesc">توضیح مختصر درباره این صفحه در اینجا نمایش داده می شود.</span>
            </div>
        </div>
        <!-- End Page Title -->
			<form method='post'>
        <div class="container">
            <main>
                <!-- Start Main -->
				
                <div class="row faq">
				
                    <h3 class="rtl"><?=$view_question_coms_ask?></h3>
                    <div class="form-group">
                        <textarea name="faq_text" placeholder="<?=$view_message_question?> ..." class="form-control" rows="6"></textarea>
                    </div>
                    <div class="form-group">
                        <input name="sender_email" placeholder="<?=$view_email?>" class="form-control" >
                    </div>
                    <div class="form-group">
						<select class="form-control" name='faq_cat' id="search_btn2">
							<?$query="SELECT * FROM new_q_a_cat where la='$defult_lang' and site='$defult_site'";
								$result = $coms_conect->query($query);
								$i=1;
								while($RS1 = $result->fetch_assoc()) {
									echo "<option value='{$RS1['id']}'>{$RS1['name']}</option>";
								}?>
						</select>
                    </div>
					<div class="form-group col-md-10 pull-right pr0" >
							<input type="text" class="form-control col-md-8" name="comment_captcha">
					 </div>	
					 <div class="form-group col-md-2 pull-right pr0" >
							<span class="input-group-addon" style="background-color: #1656a5; "><img src="<?crate_capcha_pic($madual_lang)?>" ></span>
					</div>
                    <div class="col-xs-6 form-group pull-right pr0">
                        <button type="submit" class="btn btn-success fullwidth"><?=$view_send?></button>
                   </div>
                    <div class="col-xs-6 form-group pull-right pl0">
                        <button type="button" onclick='window.location="/q_a/<?=$defult_lang?>"' class="btn btn-warning fullwidth"><?=$view_back_list_question?></button>
                    </div>
                </div>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
			</form>
        <!-- End main container -->
        <!-- Filehaye safhe------------------------------------------------------------------>
        <!-- Filehaye safhe------------------------------------------------------------------>

<?$faq_new_nave= get_tem_result($defult_site,$defult_lang,"faq_new_nave",'default',$coms_conect); 
 $faq_base_setting= get_tem_result($defult_site,$defult_lang,"faq_base_setting",'default',$coms_conect);
if ($faq_base_setting['title']==1&&$_SESSION["new_okusername"]=='') include 'new_lock_page.php';else{ 

 $faq_text=injection_replace($_POST['faq_text']);
$faq_cat=injection_replace($_POST['faq_cat']);
$sender_email=injection_replace($_POST['sender_email']);
$sender_name=injection_replace($_POST['sender_name']);
$faq_mobile=injection_replace($_POST['faq_mobile']);
$tag_faq=injection_replace($_POST['tag_faq']);
if(isset($_POST["comment_captcha"])&&$_POST["comment_captcha"]!=""&&$_SESSION["code"]==$_POST["comment_captcha"]&&$faq_text>""){
	$arr=array("member_id"=>$_SESSION["new_okusername"],"mobile"=>$faq_mobile,"sender_name"=>$sender_name,"sender_email"=>$sender_email,"cat_id"=>$faq_cat,"question"=>$faq_text,"la"=>$madual_lang,"site"=>$defult_site,'date'=>$now,'ip'=>$custom_ip);
	$id=insert_to_data_base($arr,'new_faq',$coms_conect);
	$arr=explode(",",$tag_faq); 
	foreach($arr as $val){
		if($val>""){
			$label_name=get_result("select id from new_keyword where name='$val' and la='$madual_lang'",$coms_conect);
			if($label_name>0){
				$value=$label_name;
			}else{
				$label_arr0=array("name"=>$val,"la"=>$madual_lang);
				$value=insert_to_data_base($label_arr0,'new_keyword',$coms_conect); 
			} 
			$label_arr=array("id"=>$id,"type"=>99,"label_id"=>$value);
			insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
		}			
	}
	echo show_msg($view_sended_question);
}else if(isset($_POST["comment_captcha"])&&$_POST["comment_captcha"]!=""&&$_SESSION["code"]!=$_POST["comment_captcha"]){
    echo show_msg_warninig($dl_cspcha_er_mesage);  
}

?>


 <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
                 <a href='<?=$faq_new_nave['link']?>' target='_blank'><img src="<?=$faq_new_nave['pic_adress']?>"></a>
            </section>
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="/"><span class="fa fa-home"></span></a></li>
						<li class="active"><a href="/faq/<?=$madual_lang?>"><?=$view_new_question?></a></li>
						<li class="active">فرم ارسال پرسش جدید  </li>
                    </ol>
                </div>
            </section>
      
        <!-- End Header -->
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">
                <span class="fa fa-lightbulb-o"></span>
                  <h1 class="title"><?=$faq_new_nave['title']?></h1>
                <span class="pdesc"><?=$faq_new_nave['text']?></span>
            </div>
        </div>
        <!-- End Page Title -->
	<form method='post' id="faqnewForm" action='' data-fv-framework="bootstrap">
        <div class="container">
            <main>  
                <!-- Start Main -->
				<?$col_md=6;$col_md_str='col-md-offset-3';
					if(get_modual_setting_result($defult_site,$defult_lang,'faq_new_have_ads',$coms_conect)){?>
						<aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
							<section class="block-col">
								<div class="block">
									<div class="content ads-col">
										<?$query="select title,link,pic_adress from new_tem_setting where name='faq_new_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
											$result = $coms_conect->query($query);
											while($RS = $result->fetch_assoc()) {?>
												<a href="<?=$RS['link']?>" title='<?=$RS['title']?>'><img src="<?=$RS['pic_adress']?>"></a>
											<?}?>
									</div>
								</div>
							</section>
						</aside>
					 <?$col_md=7;$col_md_str='';}?>
                <div class="row faq col-md-<?=$col_md .' '.$col_md_str?>  rtl" style="background-color: #EEEEEE;padding: 10px;">
				
                    <h4 class="rtl"><?=$faq_new_nave['pic']?></h4>
					<br>
					<div class="row">
						<div class="form-group col-md-8 pull-right">
							<input type="text" value="<?=$_SESSION["new_name"] . ' '.$_SESSION["new_family"]?>" name="faq_name" placeholder="نام" class="form-control" 
							data-fv-notempty="true"  
							data-fv-notempty-message="پر کردن اين فيلد الزامي است">
						</div>
					</div>	
					<div class="row">
						<div class="form-group col-md-8 pull-right">
							<input type="text" value="<?=$_SESSION["new_usermobile"]?>" name="faq_mobile" placeholder="تلفن همراه" class="form-control" 
							data-fv-notempty="true"  
							data-fv-notempty-message="پر کردن اين فيلد الزامي است">
						</div>
                    </div>
					<div class="row">
						<div class="form-group col-md-8 pull-right ltr">
							<input value="<?=$_SESSION["new_useremail"]?>" name="sender_email" placeholder="<?=$view_email?>" class="form-control ma-ltr" 
							data-fv-notempty="true"  
							data-fv-notempty-message="پر کردن اين فيلد الزامي است"
							data-fv-emailaddress="true"
							data-fv-emailaddress-message="آدرس ايميل صحيح نيست">
						</div>
                    </div>
                    <div class="row">
						<div class="form-group col-md-8 pull-right">
							<select class="form-control" name='faq_cat' id="search_btn2">
								<?$query="SELECT name,id FROM new_modules_cat where type=99 and  la='$defult_lang' and site='$defult_site'";
									
									$result = $coms_conect->query($query);
									while($RS1 = $result->fetch_assoc()) {
										echo "<option value='{$RS1['id']}'>{$RS1['name']}</option>";
									}?>
							</select> 
						</div>
                    </div> 
                    <div class="form-group">
                        <textarea name="faq_text" placeholder="<?=$view_message_question?> ..." class="form-control" rows="6"
						data-fv-notempty="true"  
						data-fv-notempty-message="پر کردن اين فيلد الزامي است"></textarea>
                    </div>
					<div class="form-group">
                        <input type="text" name="tag_faq" id="tag_faq" value="" placeholder="برچسب خود را بنویسید سپس Enter بزنید" class="form-control" style="width: 100%; "/>
                    </div>
					<div class="form-group">
						<div class="form-group col-md-10 pull-right pr0" style="padding-left: 0px;">
							<input type="text" class="form-control col-md-8" name="comment_captcha" style="border-radius: 0px;"
							data-fv-notempty="true"  
							data-fv-notempty-message="پر کردن اين فيلد الزامي است">
						</div>
						<div class="form-group col-md-2 pull-right pr0">
							<span><img style="height: 34px;width: 90px;" src="<?crate_capcha_pic($madual_lang)?>" ></span>
						</div>
					</div>
                    <div class="col-md-8 form-group pull-right pr0">
                        <button type="submit" class="btn btn-success fullwidth"><?=$view_send?></button>
                   </div>
                    <div class="col-md-4 form-group pull-right pl0">
                        <button type="text" onclick='window.location="/faq/<?=$defult_lang?>"' class="btn btn-warning fullwidth"><?=$view_back_list_question?></button>
                    </div>
                </div>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
	</form>
	<br>
 
        <!-- End main container -->
        <!-- Filehaye safhe------------------------------------------------------------------>
        <!-- Filehaye safhe------------------------------------------------------------------>
<style>
.ma-ltr::-webkit-input-placeholder {
    padding-right:7px;  
}
</style>	
<?}?> 
<script type="text/javascript" src="/yep_theme/default/<?=$defult_dir?>/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/<?=$defult_dir?>/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/<?=$defult_dir?>/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">

<link rel="stylesheet" href="/yep_theme/default/<?=$defult_dir?>/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/<?=$defult_dir?>/js/bootstrap-tagsinput.js"></script>
<script>
	$(document).ready(function() {
		$('#tag_faq').tagsinput({
			maxTags: <?=$faq_base_setting['pic']?>
		});
	
		$('#faqnewForm').formValidation();
	});
</script>	
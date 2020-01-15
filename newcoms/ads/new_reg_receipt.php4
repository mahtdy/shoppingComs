<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link rel="stylesheet" href="/new_template/ddddddddddddd/<?=$dir?>/css/bootstrap-iconpicker.min.css"/>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<?

if($_GET['lang_filter']>"")
$la=injection_replace($_GET["lang_filter"]);
else
$la=injection_replace($_POST["manage_lang_filter"]);
if($la=='')
$la=$default_lang;

if($_GET['site_filter']>"")
$site=injection_replace($_GET["site_filter"]);
else
$site=injection_replace($_POST["manage_site_filter"]);
if($site=='')
$site=$default_site;

if($_POST['send_flag']==1){
################################هدر#################################
	$header_top_links=injection_replace($_POST["header_top_links"]);
	insert_ads_setting($site,$name,$la,$value,$type,$coms_conect);
#########
	
}	
?>

<br> 
<div class="panel panel-primary">
	<div class="panel-heading">
	<!-- #section:ads/reg_receipt.head -->
		<h3 class="panel-title">تنظيمات قالب</h3>
	<!-- /section:ads/reg_receipt.head -->	
	</div>
	<div class="panel-body">
		<form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form" enctype="multipart/form-data">
		<input type="hidden" name="send_flag" value="1">
		<div class="">
			<div class="col-md-12 bhoechie-tab-container"><br>
				<div class="container">
					<label class="col-md-1 form-group">زبان</label>	
					<div class="col-md-2 form-group">
						<?create_lang_filter($la,$coms_conect,$_SESSION["manager_title_lang"])?>
					</div>
				</div>
				<div class="container">	
					<label class="col-md-1 form-group">سايت</label>	
					<div class="col-md-2 form-group">
						<?create_sub_site_filter($site,$coms_conect,$_SESSION['manager_title_site'])?>
					</div>
				</div>	
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
					<div class="list-group">
						<a href="#" class="list-group-item active text-center">
						متن پیش فرض عدم تایید
						</a>
						<a href="#" class="list-group-item  text-center">
						ارسال sms برای تایید آگهی
						</a>  
						<a href="#" class="list-group-item  text-center">
						 قیمت آگهی های ویژه
						</a>  
						<a href="#" class="list-group-item  text-center">
						 تنظیمات عکس
						</a> 				
						<a href="#" class="list-group-item  text-center">
						تنظیمات مدت زمان
						</a> 
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
<!----------------------------------تماس با ما هدر------------>
					<div class="bhoechie-tab-content active">
					<!-- #section:ads/reg_receipt.default -->
						<center>
						<?$reject_text= get_ads_setting_result($site,$la,"reject_text",18,$coms_conect);?>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">متن کنار هدر </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" id='reject_text' name="reject_text" style="direction: rtl;"><?=$reject_text?></textarea>
									<script>
										tinymce.init({
										selector: "#reject_text",
										height: 300,
										width:"99.5%",
										directionality : 'rtl',
										language : 'fa_IR',
										menubar:true,
										skin: 'flat',
											plugins: [
												 "advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",
												 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
												 "fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "
											],
										image_advtab: true,
										toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",
										image_advtab: true ,
										external_filemanager_path:"/filemanager/",
										filemanager_title:"مديريت فايل" ,
										external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
										});
									 </script>
								</div>					
							</div>
						</div>
						</center>
					<!-- /section:ads/reg_receipt.default -->	
					</div>
<!----------------------------------ارسال sms------------>
					<div class="bhoechie-tab-content ">
					<!-- #section:ads/reg_receipt.list -->
                    <center>
					<?$send_auto_sms= get_ads_setting_result($site,$la,"send_auto_sms",18,$coms_conect);?>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<label>ارسال sms بعد از تایید آگهی</label>	
									<input type="checkbox"  class="" <?if($send_auto_sms==1)echo 'checked';?> name="send_auto_sms" value="1"  style="direction: rtl;">
								</div>					
							</div>
						</div>
                    </center>
					<!-- /section:ads/reg_receipt.list -->
					</div>	
<!----------------------------------قیمت آگهی------------>
				   <div class="bhoechie-tab-content ">
				   <!-- #section:ads/reg_receipt.view -->
					<center>
						<?$ads_day_price= get_ads_setting_result($site,$la,"ads_day_price",18,$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">قیمت روزانه هر آگهی</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="ads_day_price" value="<?=$ads_day_price?>"  style="direction: rtl;">
								</div>					
							</div>
						</div>
						<?$ads_album_price= get_ads_setting_result($site,$la,"ads_album_price",18,$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">قیمت آلبوم عکس</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" value="<?=$ads_album_price?>" name="ads_album_price"  style="direction: rtl;">
								</div>					
							</div>
						</div>
						<?$ads_video_price= get_ads_setting_result($site,$la,"ads_video_price",18,$coms_conect);?>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">قیمت اگهی ویدئوی</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" id="ads_video_price" name="ads_video_price" value="<?=$ads_video_price?>"  style="direction: rtl;">
								</div>					
							</div>
						</div>
						<hr>
						<?$ads_attach_price= get_ads_setting_result($site,$la,"ads_attach_price",18,$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">قیمت فایل پیوست</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input value="<?=$ads_attach_price?>" type="text"  class="form-control" name="ads_attach_price"    style="direction: rtl;">
								</div>					
							</div>
						</div>
						<?$ads_show_site_price= get_ads_setting_result($site,$la,"ads_show_site_price",18,$coms_conect);?>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">قیمت نمایش لینک سایت</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="ads_show_site_price" value="<?=$ads_show_site_price?>"  style="direction: rtl;">
								</div>					
							</div>
						</div>
					</center>
					<!-- /section:ads/reg_receipt.view -->
					</div>
<!----------------------------------تنظیمات عکس----------->
				
				<div class="bhoechie-tab-content ">
				<!-- #section:ads/reg_receipt.cate -->
                    <center>
					<?$ads_watermark= get_ads_setting_result($site,$la,"ads_watermark",18,$coms_conect);?>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">عکس واتر مارک</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_watermark" value="<?=$ads_watermark?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<?$ads_pic_count= get_ads_setting_result($site,$la,"ads_pic_count",18,$coms_conect);?>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تعداد عکس ها</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_pic_count" value="<?=$ads_pic_count?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<?$ads_pic_size= get_ads_setting_result($site,$la,"ads_pic_size",18,$coms_conect);?>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">اندازه عکس ها</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_pic_size" value="<?=$ads_pic_size?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
                    </center>
					<!-- /section:ads/reg_receipt.cate -->
                </div>
<!----------------------------------تنظیمات مدت زمان------------>
			<?$under_news_text= get_ads_setting_result($site,$la,"under_news_text",'ddddddddddddd',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
			   <!-- #section:ads/reg_receipt.search -->
                    <center>
						 <div class="form-group">
							 <div class="col-sm-12">
							 	<div class="row">
									<label><?=$s_Members_name?> <?=$s_Members_country?></label>
								 </div>
							 </div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<div class="row">
								<div class="form-group col-sm-1">
								</div>
									<div class="form-group col-sm-5">
										<input id="input1" name="input1" type="text" placeholder="" class="form-control">
									</div>
									<div class="form-group col-sm-3">
										<a id="add_country" class="btn btn-primary" style="width: 75px;height: 35px;padding-top: 3px;"><?=$pro_aafzodann?></a>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<div class="row">
									<div class="form-group col-sm-1"></div>
									<div class="form-group col-sm-5">
										<select  id="country" name="country" class="form-control" size="10">
										<?$sql="SELECT name FROM new_ads_day";
										$result = mysql_query($sql);
										while($row = mysql_fetch_array($result)){
											echo "<option value='{$row['name']}'>{$row['name']}</option>";
										}?>
										</select>
									</div>
									
										<div class="form-group col-sm-3">
											<a id="del_country" class="btn btn-primary" style="width: 75px;height: 35px;"><?=$s_Pages_delete?></a>
										</div>
								</div>
							</div>
						</div>
					<hr>
					
<script>					
	$("#add_country").click(function(){
		if($("#input1").val()!=""){
			var a =$("#input1").val();
			$("#country").append(new Option($("#input1").val(), $("#input1").val()));
			$("#input1").val("");
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=new_add_ads&id="+a,
					success: function(result){
					}
				});
			
			}
	});
	$("#del_country").click(function(){
		if ($('#country option:selected').val() != null) {
			var a =$('#country option:selected').val();
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_ads_day&id="+a,
				success: function(result){
					$('#country option:selected').remove();
					
				}
			});
		}
	});	
</script>					
                   </center>
				   <!-- /section:ads/reg_receipt.search -->
					</div>			
<!------------------->
				</div>
			</div>
		</div>
		</br>     
		<div class="panel-footer">
			<button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary">ذخيره</button>
		</div>
	</form>
	</div> 
</div>

<script>
$(document).ready(function() {
		$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});


    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
	$('#manage_lang_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&lang_filter=") >= 0){
			var b=a.split('&lang_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&lang_filter="+$(this).val()+e;
		}
		else
		a +='&lang_filter='+$(this).val();
		window.location.href = a;
    });	
	$('#manage_site_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&site_filter=") >= 0){
			var b=a.split('&site_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&site_filter="+$(this).val()+e;
		}
		else
		a +='&site_filter='+$(this).val();
		window.location.href = a;
    });
	
});
</script>
  
</div>
		<!-- Bootstrap-Iconpicker Iconset for Font Awesome -->
	<script type="text/javascript" src="/new_template/ddddddddddddd/<?=$dir?>/js/iconset-fontawesome-4.1.0.min.js"></script>
	<!-- Bootstrap-Iconpicker -->
	<script type="text/javascript" src="/new_template/ddddddddddddd/<?=$dir?>/js/bootstrap-iconpicker.js"></script>
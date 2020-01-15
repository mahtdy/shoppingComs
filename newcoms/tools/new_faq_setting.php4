 
<link rel="stylesheet" href="/new_template/Erika/<?=$dir?>/css/bootstrap-iconpicker.min.css"/>

<link href="/new_template/Erika/<?=$dir?>/css/font-awesome.min.css" rel="stylesheet">
<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">

<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>

<script src="/yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<?$menu_tab=1;


if(isset($_POST['menu_tab']))
$menu_tab=injection_replace($_POST['menu_tab']);

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
$ads_count=injection_replace($_POST["ads_count"]);
$ads_show_count=injection_replace($_POST["ads_show_count"]);
$ads_search_count=injection_replace($_POST["ads_search_count"]);
$ads_cat_count=injection_replace($_POST["ads_cat_count"]);
if($_POST['send_flag']==1){ 
     check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	 
	 
	 
	 
	 
	$faq_show_all_nave_link=injection_replace($_POST["faq_show_all_nave_link"]);
	$faq_show_all_nave_pic=injection_replace($_POST["faq_show_all_nave_pic"]);
	$faq_show_all_nave_text=injection_replace($_POST["faq_show_all_nave_text"]);
	$faq_show_all_nave_title=injection_replace($_POST["faq_show_all_nave_title"]);
 	insert_templdate($site,$faq_show_all_nave_pic,$la,$faq_show_all_nave_text,$faq_show_all_nave_title,$faq_show_all_nave_link,'',"faq_show_all_nave",'default',$coms_conect);
	 
	 
	$faq_show_nave_link=injection_replace($_POST["faq_show_nave_link"]);
	$faq_show_nave_text=injection_replace($_POST["faq_show_nave_text"]);
	$faq_show_nave_title=injection_replace($_POST["faq_show_nave_title"]);
	$faq_show_nave_pic=injection_replace($_POST["faq_show_nave_pic"]);
 	insert_templdate($site,$faq_show_nave_pic,$la,$faq_show_nave_text,$faq_show_nave_title,$faq_show_nave_link,'',"faq_show_nave",'default',$coms_conect);
	
	
	$faq_new_nave_link=injection_replace($_POST["faq_new_nave_link"]);
	$faq_new_nave_text=injection_replace($_POST["faq_new_nave_text"]);
	$faq_new_nave_title=injection_replace($_POST["faq_new_nave_title"]);
	$faq_new_nave_picture=injection_replace($_POST["faq_new_nave_picture"]);
	$faq_new_nave_pic=injection_replace($_POST["faq_new_nave_pic"]);
 	insert_templdate($site,$faq_new_nave_pic,$la,$faq_new_nave_text,$faq_new_nave_title,$faq_new_nave_link,$faq_new_nave_picture,"faq_new_nave",'default',$coms_conect);
	  	 
	 
	$faq_base_setting_link=injection_replace($_POST["faq_base_setting_link"]);
	$faq_base_setting_text=injection_replace($_POST["faq_base_setting_text"]);
	$faq_base_setting_title=injection_replace($_POST["faq_base_setting_title"]);
	$faq_base_setting_pic=injection_replace($_POST["faq_base_setting_pic"]);
 	insert_templdate($site,'',$la,$faq_base_setting_text,$faq_base_setting_title,$faq_base_setting_link,$faq_base_setting_pic,"faq_base_setting",'default',$coms_conect);
	  	 
	 	 
	 
		#####اندازه تصاویر
	$news_pic_size=injection_replace_pic($_POST["news_pic_size"]);
	$query11="SELECT id from new_default_navbar where name='news_pic_size' and la='fa' and site='main'";
	//echo $query11.'<br>';
	$result11 = $coms_conect->query($query11); 
	$row11 = mysqli_num_rows($result11);
	if ($row11> 0) {
	   $query="update new_default_navbar set address='$news_pic_size' where name='news_pic_size'  and la='fa'  and site='main'"; 
	   $coms_conect->query($query);
	}else{
     	$query="insert into new_default_navbar(site,address,la,name)values('main','$news_pic_size','fa','news_pic_size')";
     	$coms_conect->query($query);
	} 
	 
	 
	 
	 #####پیش فرض ناوبری	 
	$news_nav_picture=injection_replace_pic($_POST["news_nav_picture"]);
	$query11="SELECT id from new_default_navbar where name='news_nav_picture' and la='$la' and site='$site'";
	//echo $query11.'<br>';
	$result11 = $coms_conect->query($query11);
	$row11 = mysqli_num_rows($result11);
	if ($row11> 0) {
	   $query="update new_default_navbar set address='$news_nav_picture' where name='news_nav_picture'  and la='$la'  and site='$site'"; 
	   $coms_conect->query($query);
	}else{
     	$query="insert into new_default_navbar(site,address,la,name)values('$site','$news_nav_picture','$la','news_nav_picture')";
     	$coms_conect->query($query);
	}
####صفحه اصلي
	$faq_have_ads=injection_replace_pic($_POST["faq_have_ads"]);
	if($faq_have_ads!=1) $faq_have_ads=0;
	insert_ads_templdate($site,$la,$faq_have_ads,'faq_have_ads',$coms_conect);
 	$query1="delete from new_tem_setting where name='faq_have_ads' and la='$la'"; 
	$coms_conect->query($query1);
	for($i=1;$i<=$ads_count;$i++){ 
 		$title_ads=injection_replace_pic($_POST["title_ads{$i}"]);
		$header_link=injection_replace_pic($_POST["header_link{$i}"]);
		$header_pic=injection_replace_pic($_POST["header_pic{$i}"]);
		if($header_pic>""&&$header_link>"")
		insert_news_templdate($site,$header_pic,$la,'',$title_ads,$header_link,'',"faq_have_ads",'',$coms_conect);
	} 
####فایل نمایش
	$faq_show_have_ads=injection_replace_pic($_POST["faq_show_have_ads"]);
	if($faq_show_have_ads!=1) $faq_show_have_ads=0;
	insert_ads_templdate($site,$la,$faq_show_have_ads,'faq_show_have_ads',$coms_conect);
 	$query1="delete from new_tem_setting where name='faq_show_have_ads' and la='$la'"; 
	$coms_conect->query($query1);
	for($i=1;$i<=$ads_show_count;$i++){ 
 		$title_show_ads=injection_replace_pic($_POST["title_show_ads{$i}"]);
		$header_show_link=injection_replace_pic($_POST["header_show_link{$i}"]);
		$header_show_pic=injection_replace_pic($_POST["header_show_pic{$i}"]);
		if($header_show_pic>""&&$header_show_link>"")
		insert_news_templdate($site,$header_show_pic,$la,'',$title_show_ads,$header_show_link,'',"faq_show_have_ads",'',$coms_conect);
	}	
#######دسته بندي
	$faq_new_have_ads=injection_replace_pic($_POST["faq_new_have_ads"]);
	if($faq_new_have_ads!=1) $faq_new_have_ads=0;
	insert_ads_templdate($site,$la,$faq_new_have_ads,'faq_new_have_ads',$coms_conect);
	$query1="delete from new_tem_setting where name='faq_new_have_ads'  and la='$la'"; 
	$coms_conect->query($query1);
	for($i=1;$i<=$ads_cat_count;$i++){	
		$title_cat_ads=injection_replace_pic($_POST["title_cat_ads{$i}"]);
		$link_cat_ads=injection_replace_pic($_POST["link_cat_ads{$i}"]);
		$image_cat_ads=injection_replace_pic($_POST["image_cat_ads{$i}"]);
		if($image_cat_ads>""&&$link_cat_ads>"")
		insert_news_templdate($site,$image_cat_ads,$la,'',$title_cat_ads,$link_cat_ads,'',"faq_new_have_ads",'',$coms_conect);
	}
show_msg('اطلاعات با موفقیت ویرایش گردید');
 
}
 create_session_token(); 
?>
 



<div class="tabbable">
	<ul class="nav nav-tabs" style="margin-top:2px;border-bottom: 0;  display: none;">
		<li class="active"><a href="#tab2" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
		تنظيمات قالب </a></li>
	</ul>
	<div class="msheet tab-content">
		<div class="secfhead">
			<!-- #section:news/news_setting.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">تنظيمات سوالات متداول </p><p class="lead">توضيحات اين بخش</p></div>
			</div>
			<!-- /section:news/news_setting.head -->

			<div class="toolmenu">
				<ul>
					<li class="helpicon">
						<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما">
						<span class="flaticon-help31"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	
	<div class="tab active" id="tab2">	
		<div class="page-body">
			<form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form" enctype="multipart/form-data">
				<input type="hidden" name="menu_tab" id="menu_tab"  value="<?=$menu_tab?>">
				<input type="hidden" name="send_flag" value="1">
				<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
			  <!-- vertical tab bootsnipp -->
			<div class="">
       
				<div class="container">
					<div class="col-md-3 form-group">
					<label>سايت</label>	
						<?create_sub_site_filter_none($site,$coms_conect,$_SESSION['manager_title_site'])?>
					</div>
					<div  class="col-md-1  form-group"></div>	
					<div class="col-md-3  form-group">
						<label>   انتخاب زبان     </label>	
						<?create_lang_filter_none($la,$coms_conect,$_SESSION["manager_title_lang"])?>
					</div>
				</div>
		
				<div class="collapse in" id="" style="padding: 10px;">
					<div> 
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist" style="margin:0;">
							<li role="presentation" class="<?if($menu_tab==1)echo 'active'?>"><a class="menu_tab" id="1" href="#base_set" aria-controls="base_set" role="tab" data-toggle="tab">تنظیمات پایه</a></li>
							<li role="presentation" class="<?if($menu_tab==2)echo 'active'?>"><a  class="menu_tab" id="2" href="#ban_set" aria-controls="ban_set" role="tab" data-toggle="tab">تنظیمات تبلیغات بنری</a></li>
							<li role="presentation" class="<?if($menu_tab==3)echo 'active'?>"><a class="menu_tab" id="3" href="#nav_set" aria-controls="nav_set" role="tab" data-toggle="tab">تنظیمات نوبار</a></li>
						</ul>
						<div class="tab-content" style="padding: 10px 50px;"> 
							<div role="tabpanel" class="tab-pane <?if($menu_tab==1)echo 'active'?>" id="base_set">
							<?$faq_base_setting= get_tem_result($site,$la,"faq_base_setting",'default',$coms_conect);?>
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیمات پایه سوالات متداول :
									</h3>
									<hr>

									<div class="sr-sms-settings-text">
										<h4 class="col-md-7 col-xs-12">
											با فعال سازی این گزینه فقط اعضای سایت می توانند به فرم ارسال سوال دسترسی داشته باشند
	  
										</h4>
										
										<label class="col-md-5 col-xs-12">
											<input  value='1' <?if($faq_base_setting['title']==1)echo 'checked';?>    name="faq_base_setting_title" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											با فعال سازی این گزینه صفحه لیست پرسش ها فقط مختص اعضای سایت نمایش داده می شود.
										</p>
									</div>
									<div class="sr-sms-settings-text">
										<h4 class="col-md-7 col-xs-12">
											تعیین تعداد پرسش های نمایش داده شده در صفحه اختصاصی سوالات متداول
	  
										</h4>
										
										<label class="sr-input col-md-5 col-xs-12">
											<input class="input-sm " type="number" value="<?=$faq_base_setting['text']?>" name="faq_base_setting_text">
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											شما با این گزینه می توانید تعداد پرسش های نمایش داده شده در صفحه سوالات متداول را تعیین کنید.
										</p>
									</div>
									<div class="sr-sms-settings-text">
										<h4 class="col-md-7 col-xs-12">
											تعداد پرسش های مرتبط در نمایش پاسخ پرسش ها
	  
										</h4>
										
										<label class="sr-input col-md-5 col-xs-12">
											<input class="input-sm " type="number" value="<?=$faq_base_setting['link']?>" name="faq_base_setting_link">
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											تعداد پرسش های مرتبط با دسته پرسش نمایش داده شده که در صورت فعال بودن در سایت نمایش داده می شود
										</p>
									</div>
 
								</div>
							
							</div>
							<div role="tabpanel" class="tab-pane <?if($menu_tab==2)echo 'active'?>" id="ban_set">
							
								<div class="col-md-12 bhoechie-tab-container"><br>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 bhoechie-tab-menu">
									  <div class="list-group">
										<a href="#" class="list-group-item active text-center">
										تبلیغات صفحه پرسش و پاسخها و دسته بندی و برچسب
										</a>
										<!--a href="#" class="list-group-item  text-center">
										  تبلیغات صفحه نمایش پرسش
										</a> 
										<a href="#" class="list-group-item  text-center">
										   تبلیغات صفحه طرح سوال جدید
										</a--> 
						   
									  </div>
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 bhoechie-tab">
						<!---------------------new_modual_tem_setting-------------تماس با ما هدر------------>
									   <div class="bhoechie-tab-content active">
									   <!-- #section:news/news_setting.list -->
											<center>
											<div class="form-group">
													<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه پرسش و پاسخ، صصفحه نمایش، صفحه دسته بندی</label> 
												<div class="form-group col-md-9">
													<div class="col-md-12 input-group">	
														<?$faq_have_ads=get_modual_setting_result($site,$la,'faq_have_ads',$coms_conect);?>
														<input type="checkbox" value="1" <?if($faq_have_ads==1) echo 'checked';?>   class="form-control"  name="faq_have_ads" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">
													</div>					
												</div>
											</div>
											<hr>
											<?$query="select title,link,pic_adress from new_tem_setting where name='faq_have_ads'  and la='$la' and site='$site'"; 
												$i=1;
												$result = $coms_conect->query($query);
													while($RS = $result->fetch_assoc()) {
												?>
													<div id="ads<?=$i?>" class="seyed" style="opacity: 1;">
													<div class="form-group">
													<?if($_SESSION['can_delete']==1){?>
													<a class="col-md-1 control-label del-ads" id="<?=$i?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
													<?}?>
															<label class="col-md-2 control-label" for="family">عنوان و لينک تبلبغ#<?=$i?></label> 
														<div class="form-group col-md-9">
															<div class="col-md-6 input-group">	
																<input type="text"  id="title-show_ads1" value="<?=$RS ["title"]?>" class="form-control" placeholder="عنوان" name="title_ads<?=$i?>" >
															</div>	
															<div class="col-md-6 input-group">	
																<input type="text"  id="link-show_ads1" value="<?=$RS ["link"]?>" class="form-control" placeholder="http://www.coms.ir" name="header_link<?=$i?>" style="direction: ltr;">		
															</div>					
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="family">تصوير تبليغ#<?=$i?></label>
														<div class="form-group col-md-9">
															<div class="col-md-12 input-group">
																<input  type="text" style="direction: ltr;" class="col-md-12 form-control" readonly data-toggle="popover" value="<?=$RS ["pic_adress"]?>"  id="image-ads1" name="header_pic<?=$i?>">
																<span class="input-group-btn">
																	<a href="/filemanager/dialog.php?type=1&amp;field_id=image-ads1" class="btn btn-default iframe-btn" type="button" >انتخاب</a>
																</span>
															</div>
														</div>
													</div>
													</div>
											<?$i++;}?>
											<input type="hidden" id="ads_count" name="ads_count" value="<?=$i?>">
										
											<script>
											$(document).ready(function(){
												var i = <?=$i?>;
												$('#add-ads').on("click", function() {					
													var someText = '<div id="ads'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><?if($_SESSION['can_delete']==1){?><a class="col-md-1 control-label del-ads" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><?}?> <label class="col-md-2 control-label" for="family">عنوان و لينک#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="title-ads'+i+'" value="" class="form-control" placeholder="عنوان" name="title_ads'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link-ads'+i+'" value="" class="form-control" placeholder="http://www.coms.ir" name="header_link'+i+'" style="direction: ltr;"> </div></div></div><div class="form-group"> <label class="col-md-3 control-label" for="family">تصوير تبليغ#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-12 input-group"> <input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly id="image-ads'+i+'" name="header_pic'+i+'"><span class="input-group-btn"><a href="/filemanager/dialog.php?type=1&amp;field_id=image-ads'+i+'" class="btn btn-default iframe-btn" type="button" >انتخاب</a></span> </div></div></div><hr></div>';				
													$(this).before(someText);						
													$('#ads'+i+'').fadeTo('slow', 0.3, function()
													{
														$(this).css('background', '');
													}).fadeTo('slow', 1);
													$('#ads_count').val(i);
													i++;
												});
												
												$(document).on('click', '.del-ads',function(){													
													var id = '';
													var k=$('#ads_count').val();k--
													id = $(this).attr('id');
													$('#ads'+id).remove();
													$('#ads_count').val(k);
												});
											});
											
											
											</script>
											<?if($_SESSION['can_add']==1){?>
											<a class="btn btn-success block" id="add-ads"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>افزودن يک تبليغ ديگر</a>
											<?}?>
											</br>

											</center>
											<!-- /section:news/news_setting.list -->
										</div>
						<!---------------------فایل نمایش----------- ->
									   <div class="bhoechie-tab-content">
										 
											<center>
											<div class="form-group">
													<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه نمایش پاسخ</label> 
												<div class="form-group col-md-9">
													<div class="col-md-12 input-group">	
														<?$faq_show_have_ads=get_modual_setting_result($site,$la,'faq_show_have_ads',$coms_conect);?>
														<input type="checkbox" value="1" <?if($faq_show_have_ads==1) echo 'checked';?>   class="form-control" name="faq_show_have_ads" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">
													</div>					
												</div>
											</div>
											<hr>
											<?$query9="select title,link,pic_adress from new_tem_setting where name='faq_show_have_ads'  and la='$la' and site='$site'"; 
												$i=1;
												$result9 = $coms_conect->query($query9);
													while($RS9 = $result9->fetch_assoc()) {
												?>
													<div id="ads_show<?=$i?>" class="seyed" style="opacity: 1;">
													<div class="form-group">
													<?if($_SESSION['can_delete']==1){?>
													<a class="col-md-1 control-label del-show_ads" id="<?=$i?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
													<?}?>
															<label class="col-md-2 control-label" for="family">عنوان و لينک تبلبغ#<?=$i?></label> 
														<div class="form-group col-md-9">
															<div class="col-md-6 input-group">	
																<input type="text"  id="title-show_ads1" value="<?=$RS9["title"]?>" class="form-control" placeholder="عنوان" name="title_show_ads<?=$i?>" >
															</div>	
															<div class="col-md-6 input-group">	
																<input type="text"  id="link-show_ads1" value="<?=$RS9["link"]?>" class="form-control" placeholder="http://www.coms.ir" name="header_show_link<?=$i?>" style="direction: ltr;">		
															</div>					
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="family">تصوير تبليغ#<?=$i?></label>
														<div class="form-group col-md-9">
															<div class="col-md-12 input-group">
															<input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly value="<?=$RS9["pic_adress"]?>"  id="header_show_pic<?=$i?>" name="header_show_pic<?=$i?>">
																<span class="input-group-btn">
																	<a href="/filemanager/dialog.php?type=1&amp;field_id=header_show_pic<?=$i?>" class="btn btn-default iframe-btn" type="button" >انتخاب</a>
																</span>
															</div>
														</div>
													</div>
													</div>
											<?$i++;}?>
											<input type="hidden" id="ads_show_count" name="ads_show_count" value="<?=$i?>">
										
											<script>
											$(document).ready(function(){
												var i = <?=$i?>;
												$('#add-show_ads').on("click", function() {					
													var someText = '<div id="ads_show'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><?if($_SESSION['can_delete']==1){?><a class="col-md-1 control-label del-show_ads" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><?}?><label class="col-md-2 control-label" for="family">عنوان و لينک#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="title-show_ads'+i+'" value="" class="form-control"  data-toggle="popover" placeholder="عنوان" name="title_show_ads'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link-show_ads'+i+'" value="" class="form-control" placeholder="http://www.coms.ir" name="header_show_link'+i+'" style="direction: ltr;"> </div></div></div><div class="form-group"> <label class="col-md-3 control-label" for="family">تصوير تبليغ#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-12 input-group"> <input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly id="image-show_ads'+i+'" name="header_show_pic'+i+'"><span class="input-group-btn"><a href="/filemanager/dialog.php?type=1&amp;field_id=image-show_ads'+i+'" class="btn btn-default iframe-btn" type="button" >انتخاب</a> </span></div></div></div><hr></div>';				
													$(this).before(someText);						
													$('#ads_show'+i+'').fadeTo('slow', 0.3, function()
													{
														$(this).css('background', '');
													}).fadeTo('slow', 1);
													$('#ads_show_count').val(i);
													i++;
												});
												
												$(document).on('click', '.del-show_ads',function(){													
													var id = '';
													var k=$('#ads_show_count').val();k--
													id = $(this).attr('id');
													$('#ads_show'+id).remove();
													$('#ads_show_count').val(k);
												});
											});
											
											
											</script>
											<?if($_SESSION['can_add']==1){?>
											<a class="btn btn-success block" id="add-show_ads"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>افزودن يک تبليغ ديگر</a>
											<?}?>
											</br>

											</center>
											 
										</div>
						<!----------------------------------صفحه دسته بندي----------------------- >
									   <div class="bhoechie-tab-content ">
									 		<center>
											<div class="form-group">
													<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه طرح سوال</label> 
												<div class="form-group col-md-9">
													<div class="col-md-12 input-group">	
														<?$faq_new_have_ads=get_modual_setting_result($site,$la,'faq_new_have_ads',$coms_conect);?>
														<input type="checkbox" value="1" <?if($faq_new_have_ads==1) echo 'checked';?>   class="form-control" name="faq_new_have_ads" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">
													</div>					
												</div>
											</div>
																<hr>
											<?$query11="select title,link,pic_adress from new_tem_setting where name='faq_new_have_ads'  and la='$la' and site='$site'"; 
												//echo $query.'<br>';
												$i=1;
												$result11 = $coms_conect->query($query11);
												while($RS11 = $result11->fetch_assoc()) {
												?>
													<div id="ads_cat<?=$i?>" style="opacity: 1;">
													<div class="form-group">
													<?if($_SESSION['can_delete']==1){?>
													<a class="col-md-1 control-label del_cat_ads" id="cat<?=$i?>" for="family"><i class="fa fa-trash text-danger" title="" style="font-size:20px;" data-original-title="حذف"></i></a>
													<?}?>
															<label class="col-md-2 control-label" for="family">عنوان و لينک تبلبغ#<?=$i?></label> 
														<div class="form-group col-md-9">
															<div class="col-md-6 input-group">	
																<input type="text"  id="title_cat_ads1" value="<?=$RS11["title"]?>" class="form-control" placeholder="عنوان" name="title_cat_ads<?=$i?>" >
															</div>	
															<div class="col-md-6 input-group">	
																<input type="text"  id="link_cat_ads1" value="<?=$RS11["link"]?>" class="form-control" placeholder="http://www.coms.ir" name="link_cat_ads<?=$i?>" style="direction: ltr;">		
															</div>					
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-3 control-label" for="family">تصوير تبليغ#<?=$i?></label>
														<div class="form-group col-md-9">
															<div class="col-md-12 input-group">
																<input type="text" style="direction: ltr;" data-toggle="popover" class="col-md-12 form-control" data-toggle="popover" readonly value="<?=$RS11["pic_adress"]?>"  id="image_cat_ads<?=$i?>" name="image_cat_ads<?=$i?>">
																<span class="input-group-btn">
																	<a href="/filemanager/dialog.php?type=1&amp;field_id=image_cat_ads<?=$i?>" class="btn btn-default iframe-btn" type="button">انتخاب</a>
																</span>
															</div>
														</div>
													</div>
													</div>
											<?$i++;}?>
											<input type="hidden" id="ads_cat_count" name="ads_cat_count" value="<?=$i?>">
											
											<script>
											$(document).ready(function(){
												var i = <?=$i?>;
												$('#add_cat_ads').on("click", function() {					
													var someText = '<div id="ads_cat'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><?if($_SESSION['can_delete']==1){?><a class="col-md-1 control-label del_cat_ads" id="cat'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><?}?><label class="col-md-2 control-label" for="family">عنوان و لينک#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="title-cat_ads'+i+'" value="" class="form-control" placeholder="عنوان" name="title_cat_ads'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link-ads'+i+'" value="" class="form-control" placeholder="http://www.coms.ir" name="link_cat_ads'+i+'" style="direction: ltr;"> </div></div></div><div class="form-group"> <label class="col-md-3 control-label" for="family">تصوير تبليغ#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-12 input-group"> <input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly id="image-cat_ads'+i+'" name="image_cat_ads'+i+'"><span class="input-group-btn"><a href="/filemanager/dialog.php?type=1&amp;field_id=image-cat_ads'+i+'" class="btn iframe-btn" type="button">انتخاب</a></span> </div></div></div><hr></div>';				
													$(this).before(someText);						
													$('#ads_cat'+i+'').fadeTo('slow', 0.3, function()
													{
														$(this).css('background', '');
													}).fadeTo('slow', 1);
													$('#ads_cat_count').val(i);
													i++;
												});
												
												$(document).on('click', '.del_cat_ads',function(){													
													var id = '';
													id = $(this).attr('id');
													var res = id.split("cat");
													$('#ads_cat'+res[1]).remove();
												});
											});
											
											
											</script>
											<?if($_SESSION['can_add']==1){?>
											<a class="btn btn-success block" id="add_cat_ads"><i class="fa fa-plus"></i>افزودن يک تبليغ ديگر</a>
											<?}?>
											</br>
											
											</center>
											 
										</div>
						<!----------------------------------صفحه دسته بندي------------------------>
										
						<!----------------------->	
									</div>
								</div>
						  
							
							</div>
							<div role="tabpanel" class="tab-pane <?if($menu_tab==3)echo 'active'?>" id="nav_set">
							
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
								تنظیمات تصویر ناوبری صفحه نمایش سوالات متداول 
									</h3>
								<hr>
									<?$faq_show_nave= get_tem_result($site,$la,"faq_show_nave",'default',$coms_conect);?>
									<div class="sr-sms-settings-text sr-sms-bshadow ">
										<p class="sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											توسط گزینه های زیر می توانید تصویر ناوبری و عنوان و متن نوبار صفحه خود را تنظیم کنید.
										</p>
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												عنوان ناوبری
											</label>
											<div class="col-sm-6">
												<input id="register_title" value="<?=$faq_show_nave['title']?>" name="faq_show_nave_title" class="form-control"/>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												متن ناوبری
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$faq_show_nave['text']?>" id="faq_show_nave_text" name="faq_show_nave_text" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												لینک
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$faq_show_nave['link']?>" id="faq_show_nave_link" name="faq_show_nave_link" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label"  style="text-align: left;">
												تصویر ناوبری
											</label>
											<div class="col-sm-6">
												<div class="col-md-12 input-group">
													<input type="text" style="direction: ltr;" class="col-md-10"  value="<?=$faq_show_nave['pic_adress']?>"  data-toggle="popover" id="faq_show_nave_pic" name="faq_show_nave_pic">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=faq_show_nave_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 38px;padding-top: 9px;  float: right;">انتخاب</a>
												</div>
											</div>
										</div> 
										
									</div>
								
								<hr>
									<?$faq_show_all_nave= get_tem_result($site,$la,"faq_show_all_nave",'default',$coms_conect);?>
									<div class="sr-sms-settings-text sr-sms-bshadow ">
									 <h3 class="sr-yellow">
												تنظیمات صفحه نمایش لیست پرسش ها و پاسخ ها
											</h3>
										<hr>
										<p class="sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											توسط گزینه های زیر می توانید تصویر ناوبری و عنوان و متن نوبار صفحه خود را تنظیم کنید.
										</p>
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												عنوان ناوبری
											</label>
											<div class="col-sm-6">
												<input id="faq_show_all_nave_title" value="<?=$faq_show_all_nave['title']?>" name="faq_show_all_nave_title" class="form-control"/>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												متن ناوبری
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$faq_show_all_nave['text']?>" id="faq_show_all_nave" name="faq_show_all_nave_text" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												لینک
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$faq_show_all_nave['link']?>" id="faq_show_all_nave_link" name="faq_show_all_nave_link" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label"  style="text-align: left;">
												تصویر ناوبری
											</label>
											<div class="col-sm-6">
												<div class="col-md-12 input-group">
													<input type="text" style="direction: ltr;" class="col-md-10"  value="<?=$faq_show_all_nave['pic_adress']?>"  data-toggle="popover" id="faq_show_all_nave_pic" name="faq_show_all_nave_pic">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=faq_show_all_nave_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 38px;padding-top: 9px;  float: right;">انتخاب</a>
												</div>
											</div>
										</div> 
										
									</div>
								
								<hr>
									<?$faq_new_nave= get_tem_result($site,$la,"faq_new_nave",'default',$coms_conect);?>
									<div class="sr-sms-settings-text sr-sms-bshadow ">
									    <h3 class="sr-yellow">
												تنظیمات صفحه نمایش پرسش جدید
											</h3>
										<hr>
										<p class="sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											توسط گزینه های زیر می توانید تصویر ناوبری و عنوان و متن نوبار صفحه خود را تنظیم کنید.
										</p>
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												عنوان ناوبری
											</label>
											<div class="col-sm-6">
												<input id="faq_new_nave_title" value="<?=$faq_new_nave['title']?>" name="faq_new_nave_title" class="form-control"/>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												متن ناوبری
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$faq_new_nave['text']?>" id="faq_new_nave_text" name="faq_new_nave_text" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												لینک
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$faq_new_nave['link']?>" id="faq_new_nave_link" name="faq_new_nave_link" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label"  style="text-align: left;">
												تصویر ناوبری
											</label>
											<div class="col-sm-6">
												<div class="col-md-12 input-group">
													<input type="text" style="direction: ltr;" class="col-md-10"  value="<?=$faq_new_nave['pic_adress']?>"  data-toggle="popover" id="faq_new_nave_pic" name="faq_new_nave_pic">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=faq_new_nave_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 38px;padding-top: 9px;  float: right;">انتخاب</a>
												</div>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												عنوان متن بالای پرسش
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$faq_new_nave['pic']?>" id="faq_new_nave_picture" name="faq_new_nave_picture" class="form-control" />
											</div>
										</div> 										
										
									</div>
								
								</div>	
							
							</div>
						</div>
					</div>
				</div>	
				
			</div>
			</br> 
			 <?if($_SESSION['can_edit']==1){?>   
				<div class="panel-footer bttools">
				<button type="submit" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخيره</span></button>
					<!--button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary">ذخيره</button-->
				</div>
			 <?}?>
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
$('.ads_new_name').click( function() {
$("#ads_name").val($(this).attr('id'));
});

/*
 * show popover image ajax
 */
var popOverSettings = {
    placement : 'top',
    html:true,
    selector: '[data-toggle="popover"]',
    title:'<i class="fa fa-image"></i>',
    trigger:'hover',
    content:function () {
    	if($(this).val()){
    		return '<img src='+$(this).val()+' width="200"/>';
    	}
    	return false;
    }
}
$('body').popover(popOverSettings);


$(".menu_tab").click(function(){
	$('#menu_tab').val($(this).attr('id'));
});
</script>

</div>
</div>
 
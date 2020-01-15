 
<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">

<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>

<script src="/yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<?if($_GET['lang_filter']>"")
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
	 
 
 
####صفحه اصلي

 	$query1="delete from new_tem_setting where name='ads_type1' and la='$la'"; 
	$coms_conect->query($query1);
	for($i=1;$i<=$ads_count;$i++){ 
 		$title_ads_type1=injection_replace_pic($_POST["title_ads_type1{$i}"]);
		$link_ads_type1=injection_replace_pic($_POST["link_ads_type1{$i}"]);
		$pic_ads_type1=injection_replace_pic($_POST["pic_ads_type1{$i}"]);
		if($pic_ads_type1>""&&$link_ads_type1>"")
		insert_news_templdate($site,$pic_ads_type1,$la,'',$title_ads_type1,$link_ads_type1,'',"ads_type1",'',$coms_conect);
	} 
####فایل نمایش
  	$query1="delete from new_tem_setting where name='ads_type2' and la='$la'"; 
	$coms_conect->query($query1);
	for($i=1;$i<=$ads_show_count;$i++){ 
 		$title_ads_type2=injection_replace_pic($_POST["title_ads_type2{$i}"]);
		$link_ads_type2=injection_replace_pic($_POST["link_ads_type2{$i}"]);
		$pic_ads_type2=injection_replace_pic($_POST["pic_ads_type2{$i}"]);
		if($pic_ads_type2>""&&$link_ads_type2>"")
		insert_news_templdate($site,$pic_ads_type2,$la,'',$title_ads_type2,$link_ads_type2,'',"ads_type2",'',$coms_conect);
	}	
#######دسته بندي

	$query1="delete from new_tem_setting where name='ads_type3'  and la='$la'"; 
	$coms_conect->query($query1);
	for($i=1;$i<=$ads_cat_count;$i++){	
		$title_ads_type3=injection_replace_pic($_POST["title_ads_type3{$i}"]);
		$link_ads_type3=injection_replace_pic($_POST["link_ads_type3{$i}"]);
		$pic_ads_type3=injection_replace_pic($_POST["pic_ads_type3{$i}"]);
		if($pic_ads_type3>""&&$link_ads_type3>"")
		insert_news_templdate($site,$pic_ads_type3,$la,'',$title_ads_type3,$link_ads_type3,'',"ads_type3",'',$coms_conect);
	}

######جستجو	
 
	$query1="delete from new_tem_setting where name='ads_type4'  and la='$la'"; 
	$coms_conect->query($query1);
	for($i=1;$i<=$ads_search_count;$i++){ 
		$title_ads_type4=injection_replace_pic($_POST["title_ads_type4{$i}"]);
		$link_ads_type4=injection_replace_pic($_POST["link_ads_type4{$i}"]);
		$pic_ads_type4=injection_replace_pic($_POST["pic_ads_type4{$i}"]);
		if($pic_ads_type4>""&&$link_ads_type4>"")
		insert_news_templdate($site,$pic_ads_type4,$la,'',$title_ads_type4,$link_ads_type4,'',"ads_type4",'',$coms_conect);
	}
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
<div class="title"><p class="titr">تنظيمات خبر</p><p class="lead">توضيحات اين بخش</p></div>
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
				<input type="hidden" name="send_flag" value="1">
				<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
  <!-- vertical tab bootsnipp -->
    <div class="">

       
		<div class="container">
			<div class="col-md-3 form-group   ">
			<label>سايت</label>	
				<?create_sub_site_filter_none($site,$coms_conect,$_SESSION['manager_title_site'])?>
			</div>
			<div  class="col-md-1  form-group"></div>	
			<div class="col-md-3  form-group">
				<label>   انتخاب زبان     </label>	
				<?create_lang_filter_none($la,$coms_conect,$_SESSION["manager_title_lang"])?>
			</div>
		</div>
		<hr>
	    <div class="form-group col-md-12">

			

			
			<!-- /section:news/news_setting.default -->
		 </div>
		 <div class="col-md-12 bhoechie-tab-container"><br>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                 آگهی نوع اول
                </a>
                <a href="#" class="list-group-item  text-center">
                   آگهی نوع دوم
                </a> 
                <a href="#" class="list-group-item  text-center">
                    آگهی نوع سوم
                </a> 
                <a href="#" class="list-group-item  text-center">
                    آگهی نوع چهارم
                </a> 
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
<!---------------------new_modual_tem_setting-------------تماس با ما هدر------------>
			   <div class="bhoechie-tab-content active">
			   <!-- #section:news/news_setting.list -->
                    <center>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه اصلی</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<?$ads_type1=get_modual_setting_result($site,$la,'ads_type1',$coms_conect);?>
								<input type="checkbox" value="1" <?if($ads_type1==1) echo 'checked';?>   class="form-control"  name="ads_type1" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">
							</div>					
						</div>
					</div>
					<hr>
					<?$query="select title,link,pic_adress from new_tem_setting where name='ads_type1'  and la='$la' and site='$site'"; 
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
										<input type="text"  id="title-show_ads1" value="<?=$RS ["title"]?>" class="form-control" placeholder="عنوان" name="title_ads_type1<?=$i?>" >
									</div>	
									<div class="col-md-6 input-group">	
										<input type="text"  id="link-show_ads1" value="<?=$RS ["link"]?>" class="form-control" placeholder="http://www.coms.ir" name="link_ads_type1<?=$i?>" style="direction: ltr;">		
									</div>					
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="family">تصوير تبليغ#<?=$i?></label>
								<div class="form-group col-md-9">
									<div class="col-md-12 input-group">
										<input  type="text" style="direction: ltr;" class="col-md-12 form-control" readonly data-toggle="popover" value="<?=$RS ["pic_adress"]?>"  id="image-ads1" name="pic_ads_type1<?=$i?>">
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
							var someText = '<div id="ads'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><?if($_SESSION['can_delete']==1){?><a class="col-md-1 control-label del-ads" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><?}?> <label class="col-md-2 control-label" for="family">عنوان و لينک#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="title-ads'+i+'" value="" class="form-control" placeholder="عنوان" name="title_ads_type1'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link-ads'+i+'" value="" class="form-control" placeholder="http://www.coms.ir" name="link_ads_type1'+i+'" style="direction: ltr;"> </div></div></div><div class="form-group"> <label class="col-md-3 control-label" for="family">تصوير تبليغ#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-12 input-group"> <input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly id="image-ads'+i+'" name="pic_ads_type1'+i+'"><span class="input-group-btn"><a href="/filemanager/dialog.php?type=1&amp;field_id=image-ads'+i+'" class="btn btn-default iframe-btn" type="button" >انتخاب</a></span> </div></div></div><hr></div>';				
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
<!---------------------فایل نمایش------------>
			   <div class="bhoechie-tab-content">
				<!-- #section:news/news_setting.view -->
                    <center>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه اصلی</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<?$ads_type2=get_modual_setting_result($site,$la,'ads_type2',$coms_conect);?>
								<input type="checkbox" value="1" <?if($ads_type2==1) echo 'checked';?>   class="form-control" name="ads_type2" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">
							</div>					
						</div>
					</div>
					<hr>
					<?$query9="select title,link,pic_adress from new_tem_setting where name='ads_type2'  and la='$la' and site='$site'"; 
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
										<input type="text"  id="title-show_ads1" value="<?=$RS9["title"]?>" class="form-control" placeholder="عنوان" name="title_ads_type2<?=$i?>" >
									</div>	
									<div class="col-md-6 input-group">	
										<input type="text"  id="link-show_ads1" value="<?=$RS9["link"]?>" class="form-control" placeholder="http://www.coms.ir" name="link_ads_type2<?=$i?>" style="direction: ltr;">		
									</div>					
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="family">تصوير تبليغ#<?=$i?></label>
								<div class="form-group col-md-9">
									<div class="col-md-12 input-group">
									<input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly value="<?=$RS9["pic_adress"]?>"  id="pic_ads_type2<?=$i?>" name="pic_ads_type2<?=$i?>">
										<span class="input-group-btn">
											<a href="/filemanager/dialog.php?type=1&amp;field_id=pic_ads_type2<?=$i?>" class="btn btn-default iframe-btn" type="button" >انتخاب</a>
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
							var someText = '<div id="ads_show'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><?if($_SESSION['can_delete']==1){?><a class="col-md-1 control-label del-show_ads" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><?}?><label class="col-md-2 control-label" for="family">عنوان و لينک#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="title-show_ads'+i+'" value="" class="form-control"  data-toggle="popover" placeholder="عنوان" name="title_ads_type2'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link-show_ads'+i+'" value="" class="form-control" placeholder="http://www.coms.ir" name="link_ads_type2'+i+'" style="direction: ltr;"> </div></div></div><div class="form-group"> <label class="col-md-3 control-label" for="family">تصوير تبليغ#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-12 input-group"> <input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly id="image-show_ads'+i+'" name="pic_ads_type2'+i+'"><span class="input-group-btn"><a href="/filemanager/dialog.php?type=1&amp;field_id=image-show_ads'+i+'" class="btn btn-default iframe-btn" type="button" >انتخاب</a> </span></div></div></div><hr></div>';				
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
					<!-- /section:news/news_setting.view -->
                </div>
<!----------------------------------صفحه دسته بندي------------------------>
			   <div class="bhoechie-tab-content ">
			   <!-- #section:news/news_setting.cate -->
                    <center>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه دسته بندی</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<?$ads_type3=get_modual_setting_result($site,$la,'ads_type3',$coms_conect);?>
								<input type="checkbox" value="1" <?if($ads_type3==1) echo 'checked';?>   class="form-control" name="ads_type3" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">
							</div>					
						</div>
					</div>
										<hr>
					<?$query11="select title,link,pic_adress from new_tem_setting where name='ads_type3'  and la='$la' and site='$site'"; 
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
										<input type="text"  id="title_ads_type31" value="<?=$RS11["title"]?>" class="form-control" placeholder="عنوان" name="title_ads_type3<?=$i?>" >
									</div>	
									<div class="col-md-6 input-group">	
										<input type="text"  id="link_ads_type31" value="<?=$RS11["link"]?>" class="form-control" placeholder="http://www.coms.ir" name="link_ads_type3<?=$i?>" style="direction: ltr;">		
									</div>					
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="family">تصوير تبليغ#<?=$i?></label>
								<div class="form-group col-md-9">
									<div class="col-md-12 input-group">
										<input type="text" style="direction: ltr;" data-toggle="popover" class="col-md-12 form-control" data-toggle="popover" readonly value="<?=$RS11["pic_adress"]?>"  id="pic_ads_type3<?=$i?>" name="pic_ads_type3<?=$i?>">
										<span class="input-group-btn">
											<a href="/filemanager/dialog.php?type=1&amp;field_id=pic_ads_type3<?=$i?>" class="btn btn-default iframe-btn" type="button">انتخاب</a>
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
							var someText = '<div id="ads_cat'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><?if($_SESSION['can_delete']==1){?><a class="col-md-1 control-label del_cat_ads" id="cat'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><?}?><label class="col-md-2 control-label" for="family">عنوان و لينک#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="title-cat_ads'+i+'" value="" class="form-control" placeholder="عنوان" name="title_ads_type3'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link-ads'+i+'" value="" class="form-control" placeholder="http://www.coms.ir" name="link_ads_type3'+i+'" style="direction: ltr;"> </div></div></div><div class="form-group"> <label class="col-md-3 control-label" for="family">تصوير تبليغ#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-12 input-group"> <input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly id="image-cat_ads'+i+'" name="pic_ads_type3'+i+'"><span class="input-group-btn"><a href="/filemanager/dialog.php?type=1&amp;field_id=image-cat_ads'+i+'" class="btn iframe-btn" type="button">انتخاب</a></span> </div></div></div><hr></div>';				
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
					<!-- /section:news/news_setting.cate -->
                </div>
<!----------------------------------صفحه دسته بندي------------------------>
			   <div class="bhoechie-tab-content ">
			   <!-- #section:news/news_setting.search -->
                    <center>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه جستجو</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<?$ads_type4=get_modual_setting_result($site,$la,'ads_type4',$coms_conect);?>
								<input type="checkbox" value="1" <?if($ads_type4==1) echo 'checked';?>   class="form-control" name="ads_type4" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">
							</div>					
						</div>
					</div>
										<hr>
					<?$query11="select title,link,pic_adress from new_tem_setting where name='ads_type4'  and la='$la' and site='$site'"; 
						$i=1;
						$result11 = $coms_conect->query($query11);
						    while($RS11 = $result11->fetch_assoc()) {
							?>
							<div id="ads_search<?=$i?>" style="opacity: 1;">
							<div class="form-group">
							<?if($_SESSION['can_delete']==1){?>
							<a class="col-md-1 control-label del_search_ads" id="search<?=$i?>" for="family"><i class="fa fa-trash text-danger" title="" style="font-size:20px;" data-original-title="حذف"></i></a>
							<?}?>
									<label class="col-md-2 control-label" for="family">عنوان و لينک تبلبغ#<?=$i?></label> 
								<div class="form-group col-md-9">
									<div class="col-md-6 input-group">	
										<input type="text"  id="title_ads_type41" value="<?=$RS11["title"]?>" class="form-control" placeholder="عنوان" name="title_ads_type4<?=$i?>" >
									</div>	
									<div class="col-md-6 input-group">	
										<input type="text"  id="link_ads_type41" value="<?=$RS11["link"]?>" class="form-control" placeholder="http://www.coms.ir" name="link_ads_type4<?=$i?>" style="direction: ltr;">		
									</div>					
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="family">تصوير تبليغ#<?=$i?></label>
								<div class="form-group col-md-9">
									<div class="col-md-12 input-group">
										<input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly value="<?=$RS11["pic_adress"]?>"  id="pic_ads_type41" name="pic_ads_type4<?=$i?>">
										<span class="input-group-btn">
											<a href="/filemanager/dialog.php?type=1&amp;field_id=pic_ads_type41" class="btn btn-default iframe-btn" type="button" >انتخاب</a>
										</span>
									</div>
								</div>
							</div>
							</div>
					<?$i++;}?>
					<input type="hidden" id="ads_search_count" name="ads_search_count" value="<?=$i?>">
					
					<script>
					$(document).ready(function(){
						var i = <?=$i?>;
						$('#add_search_ads').on("click", function() {					
							var someText = '<div id="ads_search'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><?if($_SESSION['can_delete']==1){?><a class="col-md-1 control-label del_search_ads" id="search'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><?}?><label class="col-md-2 control-label" for="family">عنوان و لينک#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="title_ads_type4'+i+'" value="" class="form-control" placeholder="عنوان" name="title_ads_type4'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link_ads_type4'+i+'" value="" class="form-control" placeholder="http://www.coms.ir" name="link_ads_type4'+i+'" style="direction: ltr;"> </div></div></div><div class="form-group"> <label class="col-md-3 control-label" for="family">تصوير تبليغ#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-12 input-group"> <input type="text" style="direction: ltr;" class="col-md-12 form-control" data-toggle="popover" readonly id="pic_ads_type4'+i+'" name="pic_ads_type4'+i+'"><span class="input-group-btn"><a href="/filemanager/dialog.php?type=1&amp;field_id=pic_ads_type4'+i+'" class="btn btn-default iframe-btn" type="button" >انتخاب</a> </span></div></div></div><hr></div>';				
							$(this).before(someText);						
							$('#ads_search'+i+'').fadeTo('slow', 0.3, function()
							{
								$(this).css('background', '');
							}).fadeTo('slow', 1);
							$('#ads_search_count').val(i);
							i++;
						});
						
						$(document).on('click', '.del_search_ads',function(){													
							var id = '';
							id = $(this).attr('id');
							var res = id.split("search");
							$('#ads_search'+res[1]).remove();
						});
					});
					
					
					</script>
					<?if($_SESSION['can_add']==1){?>
					<a class="btn btn-success block" id="add_search_ads"><i class="fa fa-plus"></i>افزودن يک تبليغ ديگر</a>
					<?}?>
					</br>
					
                    </center>
					<!-- /section:news/news_setting.search -->
                </div>
				
<!----------------------->	
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
</div></div> 
  
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



</script>
  
  

</div>
 
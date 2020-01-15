<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link type="text/css" href=" /new_orakuploader/orakuploader.css" rel="stylesheet"/>

<h4><i class="fa fa-bullhorn"></i>ارسال آگهی</h4>
<hr>
<?####
	$edit_id=injection_replace($_POST['edit_id']);
	$takhfif=injection_replace($_POST['takhfif']);
	$video_ads_count=injection_replace($_POST['video_ads_count']);
	$pdf_count=injection_replace($_POST['pdf_count']);
	$voice_count=injection_replace($_POST['voice_count']);
	$attach_count=injection_replace($_POST['attach_count']);
	$site_count=injection_replace($_POST['site_count']);
	$ads_title=injection_replace($_POST['ads_title']);
	$description=injection_replace($_POST['description']);
	$group_id=injection_replace($_POST['group_id']);
	$price=injection_replace($_POST['price']);
	$takhfif_code=injection_replace($_POST['takhfif_code']);
	$takhfif_start_date=strtotime(jalalitomiladi(injection_replace($_POST['takhfif_start_date'])));
	$takhfif_finish_date=strtotime(jalalitomiladi(injection_replace($_POST['takhfif_finish_date'])));
	$etebar=injection_replace($_POST['etebar']);
	$meta_keyword=injection_replace($_POST['meta_keyword']);
	$state=injection_replace($_POST['state']);
	$addres=injection_replace($_POST['addres']);
	$google_address=injection_replace($_POST['google_address']);
	$email=injection_replace($_POST['email']);
	$phone=injection_replace($_POST['phone']);
	$mobile=injection_replace($_POST['mobile']);
	$fax=injection_replace($_POST['fax']);
	$website=injection_replace($_POST['website']);
	
	
	
if(isset($_POST['ads_title'])&&$_POST['edit_id']==""){
	
	$arr_attach=array('takhfif'=>$takhfif,'state'=>$state,"ads_title"=>$ads_title,"description"=>$description,"group_id"=>$group_id,"price"=>$price,"takhfif_code"=>$takhfif_code,"takhfif_start_date"=>$takhfif_start_date,"takhfif_finish_date"=>$takhfif_finish_date,"etebar"=>$etebar,"meta_keyword"=>$meta_keyword,"site"=>$site,"addres"=>$addres,"google_address"=>$google_address,"email"=>$email,"phone"=>$phone,"mobile"=>$mobile,"fax"=>$fax,"website"=>$website,"la"=>$la,"ip"=>$custom_ip,"user_id"=>$_SESSION["new_okusername"],"date"=>time());
	$id=insert_to_data_base($arr_attach,'new_ads',$coms_conect);
    echo "<div class='alert alert-success' role='alert'>فیش شما به شماره $deposit_reseipt_id با موفقیت ثبت گردید</div>"; 
	
	

	####مشخصات اختصاصی
	$query="SELECT id,type from new_ads_delicated_cat where cat_id='$group_id' and status=1";
	$result = $coms_conect->query($query);
	while($row = $result->fetch_assoc()){
		$delicated_id=$row['id'];
		if($row['type']==0)
		$delicated_val=injection_replace($_POST["delicated_text$delicated_id"]);
		else
		$delicated_val=injection_replace($_POST["delicated_select$delicated_id"]);	
		$link_arr=array("type"=>$row['type'],"ads_id"=>$id,"delicated_id"=>$delicated_id,"value"=>$delicated_val);
		insert_to_data_base($link_arr,'new_ads_delicated_values',$coms_conect);
	}	

	
	####لینکهای ویدئو
		for($i=1;$i<=$video_ads_count;$i++){
			$video_ads_title=injection_replace($_POST["video_ads_title{$i}"]);
		    $video_ads_link=injection_replace($_POST["video_ads_link{$i}"]);
		 	if($video_ads_title>""){
				$link_arr=array("modual_id"=>$id,"type"=>18,"title"=>$video_ads_title,"adress"=>$video_ads_link,"name"=>"video_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
		
		####لینکهای PDF
		for($i=1;$i<=$pdf_count;$i++){
			$title_pdf=injection_replace($_POST["title_pdf{$i}"]);
		    $link_pdf=injection_replace($_POST["link_pdf{$i}"]);
		 	if($title_pdf>""){
				$link_arr=array("modual_id"=>$id,"type"=>18,"title"=>$title_pdf,"adress"=>$link_pdf,"name"=>"pdf_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
		####لینکهای vioce
		for($i=1;$i<=$vioce_count;$i++){
			$title_vioce=injection_replace($_POST["title_voice{$i}"]);
		    $link_voice=injection_replace($_POST["link_voice{$i}"]);
		 	if($title_vioce>""){
				$link_arr=array("modual_id"=>$id,"type"=>18,"title"=>$title_vioce,"adress"=>$link_voice,"name"=>"voice_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
		 ####لینکهای attach
		for($i=1;$i<=$attach_count;$i++){
			$title_attach=injection_replace($_POST["title_attach{$i}"]);
		    $link_attach=injection_replace($_POST["link_attach{$i}"]);
		 	if($title_attach>""){
				$link_arr=array("modual_id"=>$id,"type"=>18,"title"=>$title_attach,"adress"=>$link_attach,"name"=>"attach_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
		####لینکهای site
		for($i=1;$i<=$site_count;$i++){
			$title_site=injection_replace($_POST["title_site{$i}"]);
		    $link_site=injection_replace($_POST["link_site{$i}"]);
		 	if($title_site>""){
				$link_arr=array("modual_id"=>$id,"type"=>18,"title"=>$title_site,"adress"=>$link_site,"name"=>"site_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
	 
}if(isset($_POST['ads_title'])&&$_POST['edit_id']>0){
	
	###چک کردن کاربر	
	$get_user_name=get_result("select user_name from new_members where id=$edit_id",$coms_conect);
	if($get_user_name!=$_SESSION["new_okusername"]){
	header('Location: /');exit;
	}	
	$arr_attach=array('takhfif'=>$takhfif,'state'=>$state,"ads_title"=>$ads_title,"description"=>$description,"group_id"=>$group_id,"price"=>$price,"takhfif_code"=>$takhfif_code,"takhfif_start_date"=>$takhfif_start_date,"takhfif_finish_date"=>$takhfif_finish_date,"etebar"=>$etebar,"meta_keyword"=>$meta_keyword,"site"=>$site,"addres"=>$addres,"google_address"=>$google_address,"email"=>$email,"phone"=>$phone,"mobile"=>$mobile,"fax"=>$fax,"website"=>$website,"la"=>$la,"ip"=>$custom_ip,"edit_user_id"=>$_SESSION["new_okusername"],"edit_date"=>time());
	$condition="id='$edit_id'";
	update_data_base($arr_attach,'new_ads',$condition,$coms_conect);
	
 
	###مشخصات اختصاصی
	$query1="delete from new_ads_delicated_values where ads_id=$edit_id"; 
	$coms_conect->query($query1); 
	$query="SELECT id,type from new_ads_delicated_cat where cat_id='$group_id' and status=1";
	$result = $coms_conect->query($query);
	while($row = $result->fetch_assoc()){
		$delicated_id=$row['id'];
		if($row['type']==0)
		$delicated_val=injection_replace($_POST["delicated_text$delicated_id"]);
		else
		$delicated_val=injection_replace($_POST["delicated_select$delicated_id"]);	
		$link_arr=array("type"=>$row['type'],"ads_id"=>$edit_id,"delicated_id"=>$delicated_id,"value"=>$delicated_val);
		insert_to_data_base($link_arr,'new_ads_delicated_values',$coms_conect);
	}	
		 
	####لینکهای ویدئو
	$query1="delete from new_modual_links where type=18 and modual_id=$edit_id and name='video_ads_title'"; 
		$coms_conect->query($query1); 
		for($i=1;$i<=$video_ads_count;$i++){
			$video_ads_title=injection_replace($_POST["video_ads_title{$i}"]);
		     $video_ads_link=injection_replace($_POST["video_ads_link{$i}"]);
		 	if($video_ads_title>""){
				$link_arr=array("modual_id"=>$edit_id,"type"=>18,"title"=>$video_ads_title,"adress"=>$video_ads_link,"name"=>"video_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
		
		####لینکهای PDF
		$query1="delete from new_modual_links where type=18 and modual_id=$edit_id and name='pdf_ads_title'"; 
		$coms_conect->query($query1); 
		for($i=1;$i<=$pdf_count;$i++){
			$title_pdf=injection_replace($_POST["title_pdf{$i}"]);
		    $link_pdf=injection_replace($_POST["link_pdf{$i}"]);
			
		 	if($title_pdf>""){
				$link_arr=array("modual_id"=>$edit_id,"type"=>18,"title"=>$title_pdf,"adress"=>$link_pdf,"name"=>"pdf_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
		####لینکهای vioce
		$query1="delete from new_modual_links where type=18 and modual_id=$edit_id and name='voice_ads_title'"; 
		$coms_conect->query($query1); 
		for($i=1;$i<=$voice_count;$i++){
			$title_vioce=injection_replace($_POST["title_voice{$i}"]);
		    $link_voice=injection_replace($_POST["link_voice{$i}"]);
		  	if($title_vioce>""){
				$link_arr=array("modual_id"=>$edit_id,"type"=>18,"title"=>$title_vioce,"adress"=>$link_voice,"name"=>"voice_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
	
		####لینکهای attach
		$query1="delete from new_modual_links where type=18 and modual_id=$edit_id and name='attach_ads_title'"; 
		$coms_conect->query($query1); 
		for($i=1;$i<=$attach_count;$i++){
			$title_attach=injection_replace($_POST["title_attach{$i}"]);
		    $link_attach=injection_replace($_POST["link_attach{$i}"]);
		 	if($title_attach>""){
				$link_arr=array("modual_id"=>$edit_id,"type"=>18,"title"=>$title_attach,"adress"=>$link_attach,"name"=>"attach_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
		
		####لینکهای site
		$query1="delete from new_modual_links where type=18 and modual_id=$edit_id and name='site_ads_title'"; 
		$coms_conect->query($query1); 
		for($i=1;$i<=$site_count;$i++){
			$title_site=injection_replace($_POST["title_site{$i}"]);
		    $link_site=injection_replace($_POST["link_site{$i}"]);
		 	if($title_site>""){
				$link_arr=array("modual_id"=>$edit_id,"type"=>18,"title"=>$title_site,"adress"=>$link_site,"name"=>"site_ads_title");
				insert_to_data_base($link_arr,'new_modual_links',$coms_conect);
			}
		}
	echo "<div class='alert alert-success' role='alert'>فیش شما به شماره $deposit_reseipt_id با موفقیت ثبت گردید</div>"; 
 
}
$ads_title='';
$description='';
$takhfif='';
$group_id='';
$price='';
$takhfif_code='';
$takhfif_start_date='';
$takhfif_finish_date='';
$etebar='';
$meta_keyword='';
$state='';
$addres='';
$google_address='';
$email='';
$phone='';
$mobile='';
$fax='';
$website='';
 
if($ads_edit_id>0){
	###چک کردن کاربر	
	$get_user_name=get_result("select user_name from new_members where id=$ads_edit_id",$coms_conect);
	if($get_user_name!=$_SESSION["new_okusername"]){
		echo "<script>window.location='/'</script>" ;
 	}	
	$sql="select * from new_ads where id=$ads_edit_id";
	$result = $coms_conect->query($sql);
	$row = $result->fetch_assoc();
	$ads_title=$row['ads_title'];
	$description=$row['description'];
	$group_id=$row['group_id'];
	$price=$row['price'];
	$takhfif_code=$row['takhfif_code'];
	$takhfif_start_date=miladitojalaliuser(date('Y-m-d',$row['takhfif_start_date']));
	$takhfif_finish_date=miladitojalaliuser(date('Y-m-d',$row['takhfif_finish_date']));
	$etebar=$row['etebar'];
	$meta_keyword=$row['meta_keyword'];
	$state=$row['state'];
	$addres=$row['addres'];
	$google_address=$row['google_address'];
	$email=$row['email'];
	$phone=$row['phone'];
	$mobile=$row['mobile'];
	$fax=$row['fax'];
	$website=$row['website'];
	$takhfif=$row['takhfif'];
}
?>
				<form class="" id="article_form" name="article_form" action="" role="form" method="post" enctype="multipart/form-data"data-fv-framework="bootstrap"
				data-fv-message="This value is not valid"
				data-fv-icon-validating="glyphicon glyphicon-refresh">
<input name="edit_id" value="<?=$ads_edit_id?>" type="hidden">
<input type='submit'  id='submit_btn' style='display:none'>
	<div class="row">	
		<div class="col-md-8">	
			<div class="form-group">
				<label class="control-label">عنوان آگهی *</label>
				<div class="col-md-12 form-group">
					<input type="text" name="ads_title" value="<?=$ads_title?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">شرح آگهی </label>
				<div class="col-md-12 form-group">
					<textarea type="text" name="description"   class="form-control" rows="7"><?=$description?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">گروه </label>
				<div class="col-md-12 form-group">
					<select type="text" name="group_id" id="group_id" value="<?=$group_id?>" class="form-control"> 
					<?$sql="select name,id from new_modules_cat where status=1 and la='$defult_lang' and type=18";
				 	$result = $coms_conect->query($sql);
					while($row = $result->fetch_assoc()) {
						$str='';
						if($row['id']==$group_id)
							$str='selected';
						echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
					}?>
						 
					</select>
					
				</div>
			</div>
		</div>	
	</div>
	<img src="/waiting.gif" id="show_waiting" style="display:none">
	<h4>مشخصات اختصاصی</h4>
		<div class="col-md-8">	
			<div id="delicated_cat_div"></div>
		</div>
	<hr>
	<div class="row">	
		<div class="col-md-8">	
			<div class="form-group">
				<label class="control-label">قیمت مقطوع (به تومان)</label>
				<div class="col-md-12 form-group">
					<input type="text" name="price" value="<?=$price?>" class="form-control" onKeyUp="javascript:moneyCommaSep(this);">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">کد تخفیف </label>
				<div class="col-md-12 form-group">
					<select type="text" name="takhfif" value="<?=$takhfif?>" class="form-control" id="project_billing_code_id"> 
						<option <?if($takhfif==0)echo 'seleted';?> value="0">ندارد</option>
						<option <?if($takhfif==1)echo 'seleted';?> value="1">دارد</option>
					</select>
				</div>
			</div>	
			<div id="add_temp"> 
				<div class="form-group">
					<div class="col-md-12 form-group">
						<input type="text" name="takhfif_code" value="<?=$takhfif_code?>" class="form-control" placeholder=" کد تخفیف را وارد نمایید">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label">مدت اعتبار کد تخفیف </label>
					<div class="col-md-12 form-group">
						<div class="input-daterange input-group col-md-12">
							<input type="text" class="form-control" name="takhfif_start_date" value="<?=$takhfif_start_date?>" id="start_date2"/>
							<span class="input-group-addon">
								<i class="fa fa-exchange"></i>
							</span>
							<input type="text" class="form-control" name="takhfif_finish_date" value="<?=$takhfif_finish_date?>" id="finish_date2"/>
						</div>

					</div>
				</div>
				<div class="form-group">
					<label class="control-label">اعتبار </label>
					<div class="col-md-12 form-group">
						<select type="text" name="etebar" value="<?=$etebar?>" class="form-control"> 
							<option value="10">یک هفته</option>
							<option value="11">یک ماه</option>
						</select>
					</div>
				</div>
			</div>
		</div>	
	</div>
	
	<h4>مشخصات عمومی</h4>
	<hr>
	<div class="row">	
		
			<div class="form-group">
				<label class="control-label">عبارات کلیدی</label>
				<div class="col-md-12 form-group">
					<input type="text" name="meta_keyword" value="<?=$meta_keyword?>" class="form-control" data-role="tagsinput" id="meta_keyword" style="width: 100%; ">
					<span>پس از ثبت هر عبارت کلید Enter را زده و سپس عبارت بعدی را وارد نمایید</span>
				</div>
			</div>
			
			<!-- gallery -->
			<div class="form-group">
				<div id="ffff">
					
				<div class="ui-sortable"><div id="galery_pic2" orakuploader="on"></div>
					<?if($ads_edit_id>""){ 
							$query="select adress from new_file_path where id='$ads_edit_id' and type=9 and name='galery_pic2'";
							$result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
							$pic_str='';
							 while($RS1 = $result->fetch_assoc()) {
								 $galery_pic2=$RS1['adress'];
								 $div_id=explode(".",$galery_pic2);
								$pic_str .= "<div class='multibox file' style='cursor: move;' id='$galery_pic2' filename='$galery_pic2'>";
								$pic_str .= "<div class='picture_delete'  ></div>";
								$pic_str .= "<img src='/new_gallery/files/tn/$galery_pic2' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
								$pic_str .= "<input type='hidden' value='$galery_pic2' name='galery_pic2[]' />";
								$pic_str .= "</div>";
							}
					}?>	
				</div>
				
				</div>
			</div>
			<!-- gallery -->	
			


			 
		<!-- download.link -->
		<div class="col-md-12"> 
			<?$query="select title,adress from new_modual_links where   type='18' and modual_id='$ads_edit_id' and name='video_ads_title'"; 
			 	$i=1;
				$result = $coms_conect->query($query);
				while($RS = $result->fetch_assoc()) {
			?>
				<div id="video<?=$i?>" class="seyed" style="opacity: 1;">
				<div class="form-group">
					<a class="col-md-1 control-label del_video_ads" id="<?=$i?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
						<label class="col-md-2 control-label" for="family">عنوان و لینک تبلبغ#<?=$i?></label> 
					<div class="form-group col-md-9" style="display:flex;">
						<div class="col-md-6">
							<input type="text"  id="video_ads_title<?=$i?>" value="<?=$RS["title"]?>" class="form-control" placeholder="عنوان" name="video_ads_title<?=$i?>" >
						</div>	
						<div class="col-md-6 input-group">	
							<input type="text"  id="video_ads_link<?=$i?>" value="<?=$RS["adress"]?>" class="form-control" placeholder="لینک" name="video_ads_link<?=$i?>" style="direction: ltr;">		
							<span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=2&amp;field_id=video_ads_link<?=$i?>" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span>
						</div>	
					</div>
				</div>

				</div>
			<?$i++;}?>
			<input type="hidden" id="video_ads_count" name="video_ads_count" value="<?=$i?>">

			<script>
			$(document).on('ready', function(e){
				var i = <?=$i?>;
				$(document).on('click', '#add_video_ads',function(){	
				//$('#add_video_ads').on("click", function() {					
					var someText = '<div id="video'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_video_ads" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک#'+i+'</label> <div class="form-group col-md-9" style="display:flex"> <div class="col-md-6 input-group"><input type="text" id="video_ads_title'+i+'" value="" class="form-control" placeholder="عنوان" name="video_ads_title'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="video_ads_link'+i+'" value="" class="form-control" placeholder="لینک" name="video_ads_link'+i+'" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=video_ads_link'+i+'" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span></div></div></div></div>';				
					$(this).before(someText);						
					$('#video'+i+'').fadeTo('slow', 0.3, function()
					{
						$(this).css('background', '');
					}).fadeTo('slow', 1);
					
					$('#video_ads_count').val(i);
					i++;
				});
				
				$(document).on('click', '.del_video_ads',function(){	
				alert($(this).attr('id'));				
					var id = '';
					var k=$('#video_ads_count').val();k--
					id = $(this).attr('id');
					$('#video'+id).remove();
					$('#video_ads_count').val(k);
				});
			});
			
			
			</script>
			<a class="btn btn-success block" id="add_video_ads" style="width: 100%;"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>افزودن ویدئو</a>
			</br></br></br>				
		</div>
		<!-- download.link -->
		
		 
		<!-- download.pdf -->
		<div class="col-md-12"> 
			<?$query="select title,adress from new_modual_links where   type='18' and modual_id='$ads_edit_id' and name='pdf_ads_title'"; 
				 
				$i=1;
				$result = $coms_conect->query($query);
				while($RS = $result->fetch_assoc()) {
			?>
				<div id="pdf<?=$i?>" class="seyed" style="opacity: 1;">
				<div class="form-group">
					<a class="col-md-1 control-label del-pdf" id="<?=$i?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
						<label class="col-md-2 control-label" for="family">عنوان و لینک تبلبغ#<?=$i?></label> 
					<div class="form-group col-md-9" style="display:flex;">
						<div class="col-md-6">
							<input type="text"  id="title-pdf<?=$i?>" value="<?=$RS["title"]?>" class="form-control" placeholder="عنوان" name="title_pdf<?=$i?>" >
						</div>	
						<div class="col-md-6 input-group">	
							<input type="text"  id="link_pdf<?=$i?>" value="<?=$RS["adress"]?>" class="form-control" placeholder="لینک" name="link_pdf<?=$i?>" style="direction: ltr;">		
							<span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=2&amp;field_id=link_pdf<?=$i?>" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span>
						</div>	
					</div>
				</div>

				</div>
			<?$i++;}?>
			<input type="hidden" id="pdf_count" name="pdf_count" value="<?=$i?>">

			<script>
			$(document).ready(function(){
				var i = <?=$i?>;
				$('#add-pdf').on("click", function() {					
					var someText = '<div id="pdf'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-pdf" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک#'+i+'</label> <div class="form-group col-md-9" style="display:flex"> <div class="col-md-6 input-group"><input type="text" id="title-pdf'+i+'" value="" class="form-control" placeholder="عنوان" name="title_pdf'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link_pdf'+i+'" value="" class="form-control" placeholder="لینک" name="link_pdf'+i+'" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=link_pdf'+i+'" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span></div></div></div></div>';				
					$(this).before(someText);						
					$('#pdf'+i+'').fadeTo('slow', 0.3, function()
					{
						$(this).css('background', '');
					}).fadeTo('slow', 1);
					$('#pdf_count').val(i);
					i++;
				});
				
				$(document).on('click', '.del-pdf',function(){													
					var id = '';
					var k=$('#pdf_count').val();k--
					id = $(this).attr('id');
					$('#pdf'+id).remove();
					$('#pdf_count').val(k);
				});
			});
			
			
			</script>
			<a class="btn btn-danger block" id="add-pdf" style="width: 100%;"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>افزودن pdf</a>
			</br></br>							
		</div>
		<!-- download.pdf -->
		
			
		<!-- download.voice -->
		<div class="col-md-12"> 
			<?$query="select title,adress from new_modual_links where   type='18' and modual_id='$ads_edit_id' and name='voice_ads_title'"; 
				$i=1;
				$result = $coms_conect->query($query);
				while($RS = $result->fetch_assoc()) {
			?>
				<div id="voice<?=$i?>" class="seyed" style="opacity: 1;">
				<div class="form-group">
					<a class="col-md-1 control-label del-voice" id="<?=$i?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
						<label class="col-md-2 control-label" for="family">عنوان و لینک تبلبغ#<?=$i?></label> 
					<div class="form-group col-md-9" style="display:flex;">
						<div class="col-md-6">
							<input type="text"  id="title-voice<?=$i?>" value="<?=$RS["title"]?>" class="form-control" placeholder="عنوان" name="title_voice<?=$i?>" >
						</div>	
						<div class="col-md-6 input-group">	
							<input type="text"  id="link_voice<?=$i?>" value="<?=$RS["adress"]?>" class="form-control" placeholder="لینک" name="link_voice<?=$i?>" style="direction: ltr;">		
							<span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=2&amp;field_id=link_voice<?=$i?>" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span>
						</div>	
					</div>
				</div>

				</div>
			<?$i++;}?>
			<input type="hidden" id="voice_count" name="voice_count" value="<?=$i?>">

			<script>
			$(document).ready(function(){
				var i = <?=$i?>;
				$('#add-voice').on("click", function() {					
					var someText = '<div id="voice'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-voice" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک#'+i+'</label> <div class="form-group col-md-9" style="display:flex"> <div class="col-md-6 input-group"><input type="text" id="title-voice'+i+'" value="" class="form-control" placeholder="عنوان" name="title_voice'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link_voice'+i+'" value="" class="form-control" placeholder="لینک" name="link_voice'+i+'" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=link_voice'+i+'" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span></div></div></div></div>';				
					$(this).before(someText);						
					$('#voice'+i+'').fadeTo('slow', 0.3, function()
					{
						$(this).css('background', '');
					}).fadeTo('slow', 1);
					$('#voice_count').val(i);
					i++;
				});
				
				$(document).on('click', '.del-voice',function(){													
					var id = '';
					var k=$('#voice_count').val();k--
					id = $(this).attr('id');
					$('#voice'+id).remove();
					$('#voice_count').val(k);
				});
			});
			
			
			</script>
			<a class="btn btn-primary block" id="add-voice" style="width: 100%;"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>افزودن صدا</a>
			</br></br>						
		</div>
		<!-- download.voice -->
		
			
		<!-- download.attach -->
		<div class="col-md-12"> 
			<?$query="select title,adress from new_modual_links where   type='18' and modual_id='$ads_edit_id'  and name='attach_ads_title'";  
				$i=1;
				$result = $coms_conect->query($query);
				while($RS = $result->fetch_assoc()) {
			?>
				<div id="attach<?=$i?>" class="seyed" style="opacity: 1;">
				<div class="form-group">
					<a class="col-md-1 control-label del-attach" id="<?=$i?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
						<label class="col-md-2 control-label" for="family">عنوان و لینک تبلبغ#<?=$i?></label> 
					<div class="form-group col-md-9" style="display:flex;">
						<div class="col-md-6">
							<input type="text"  id="title-attach<?=$i?>" value="<?=$RS["title"]?>" class="form-control" placeholder="عنوان" name="title_attach<?=$i?>" >
						</div>	
						<div class="col-md-6 input-group">	
							<input type="text"  id="link_attach<?=$i?>" value="<?=$RS["adress"]?>" class="form-control" placeholder="لینک" name="link_attach<?=$i?>" style="direction: ltr;">		
							<span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=2&amp;field_id=link_attach<?=$i?>" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span>
						</div>	
					</div>
				</div>

				</div>
			<?$i++;}?>
			<input type="hidden" id="attach_count" name="attach_count" value="<?=$i?>">

			<script>
			$(document).ready(function(){
				var i = <?=$i?>;
				$('#add-attach').on("click", function() {					
					var someText = '<div id="attach'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-attach" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک#'+i+'</label> <div class="form-group col-md-9" style="display:flex"> <div class="col-md-6 input-group"><input type="text" id="title-attach'+i+'" value="" class="form-control" placeholder="عنوان" name="title_attach'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link_attach'+i+'" value="" class="form-control" placeholder="لینک" name="link_attach'+i+'" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=link_attach'+i+'" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span></div></div></div></div>';				
					$(this).before(someText);						
					$('#attach'+i+'').fadeTo('slow', 0.3, function()
					{
						$(this).css('background', '');
					}).fadeTo('slow', 1);
					$('#attach_count').val(i);
					i++;
				});
				
				$(document).on('click', '.del-attach',function(){													
					var id = '';
					var k=$('#attach_count').val();k--
					id = $(this).attr('id');
					$('#attach'+id).remove();
					$('#attach_count').val(k);
				});
			});
			
			
			</script>
			<a class="btn btn-warning block" id="add-attach" style="width: 100%;"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>فایل پیوست</a>
			</br></br>						
		</div>
		<!-- download.attach -->
			
		<!-- download.site -->
		<div class="col-md-12"> 
			<?$query="select title,adress from new_modual_links where   type='18' and modual_id='$ads_edit_id' and name='attach_ads_title'";  
				$i=1;
				$result = $coms_conect->query($query);
				while($RS = $result->fetch_assoc()) {
			?>
				<div id="site<?=$i?>" class="seyed" style="opacity: 1;">
				<div class="form-group">
					<a class="col-md-1 control-label del-site" id="<?=$i?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
						<label class="col-md-2 control-label" for="family">عنوان و لینک تبلبغ#<?=$i?></label> 
					<div class="form-group col-md-9" style="display:flex;">
						<div class="col-md-6">
							<input type="text"  id="title-site<?=$i?>" value="<?=$RS["title"]?>" class="form-control" placeholder="عنوان" name="title_site<?=$i?>" >
						</div>	
						<div class="col-md-6 input-group">	
							<input type="text"  id="link_site<?=$i?>" value="<?=$RS["adress"]?>" class="form-control" placeholder="لینک" name="link_site<?=$i?>" style="direction: ltr;">		
							<span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=2&amp;field_id=link_site<?=$i?>" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span>
						</div>	
					</div>
				</div>

				</div>
			<?$i++;}?>
			<input type="hidden" id="site_count" name="site_count" value="<?=$i?>">

			<script>
			$(document).ready(function(){
				var i = <?=$i?>;
				$('#add-site').on("click", function() {					
					var someText = '<div id="site'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-site" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک#'+i+'</label> <div class="form-group col-md-9" style="display:flex"> <div class="col-md-6 input-group"><input type="text" id="title-site'+i+'" value="" class="form-control" placeholder="عنوان" name="title_site'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="link_site'+i+'" value="" class="form-control" placeholder="لینک" name="link_site'+i+'" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=link_site'+i+'" class="btn btn-success iframe-btn" style="vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="fa fa-plus"></span></a></span></div></div></div></div>';				
					$(this).before(someText);						
					$('#site'+i+'').fadeTo('slow', 0.3, function()
					{
						$(this).css('background', '');
					}).fadeTo('slow', 1);
					$('#site_count').val(i);
					i++;
				});
				
				$(document).on('click', '.del-site',function(){													
					var id = '';
					var k=$('#site_count').val();k--
					id = $(this).attr('id');
					$('#site'+id).remove();
					$('#site_count').val(k);
				});
			});
			
			
			</script>
			<a class="btn btn-info block" id="add-site" style="width: 100%;"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>لینک سایت</a>
			</br></br>						
		</div>
		<!-- download.site -->
	 
		
			<div class="form-group">
				<label class="control-label col-md-12">مکان آگهی </label>
				<div class="col-md-8 form-group">
					<select type="text" name="state" value="<?=$state?>" class="form-control"> 
						<?$sql="select name,id from new_regional where  type=2";
				 	$result = $coms_conect->query($sql);
					while($row = $result->fetch_assoc()) {
						$str='';
						if($row['id']==$state)
							$str='selected';
						echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
					}?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">آدرس</label>
				<div class="col-md-8 form-group">
					<input type="text" name="addres" value="<?=$addres?>" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">آدرس نقشه گوگل</label>
				<div class="col-md-8 form-group">
					<input type="text" name="google_address" value="<?=$google_address?>" class="form-control "/>
					<span>برای افزودن نقشه از راهنما استفاده کنید برای دریافت آموزش اینجا را کلیک کنید</span>
				</div>
			</div>
			<div class="form-group">
				<div id="googleMap" style="width:800px;height:300px;"></div>
			</div>
	</div>
	
	
	<h4>مشخصات ارسال کننده آگهی</h4>
	<hr>
	<div class="row">	
		<div class="col-md-8">	
			<div class="form-group">
				<label class="control-label">ایمیل</label>
				<div class="col-md-12 form-group">
					<input type="text" name="email" value="<?=$email?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">شماره تماس</label>
				<div class="col-md-12 form-group">
					<input type="text" name="phone" value="<?=$phone?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">موبایل </label>
				<div class="col-md-12 form-group">
					<input type="text" name="mobile" value="<?=$mobile?>" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">فکس </label>
				<div class="col-md-12 form-group">
					<input type="text" name="fax" value="<?=$fax?>" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label">وب سایت </label>
				<div class="col-md-12 form-group">
					<input type="text" name="website" value="<?=$website?>" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-12">
				  <input name="show_callme" value="1" type="checkbox"> قوانین وشرایط <a href="#">درج آگهی</a> را می پذیرم
				</label>
			</div>
		</div>	
	</div>
	<br>
	<div class="row">
		<div class="col-md-5">
			<input type="reset" class="btn btn-link" value="پاکسازی فرم">
			<button type="submit" id="send2" class="btn btn-info"> ثبت آگهی</button>
		</div>
	</div>
	<br>
 
</form>

<style>
.form-control{
	max-width: 100%;
}
</style>
<script type="text/javascript" src="/new_orakuploader/jquery-ui.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script>
<script>

 	$("#group_id").change(function () {
		  	 $("#show_waiting").show();
			 $.ajax({
			 type:'POST',
			 url:'/New_members_ajax.php',
			 data:"action=show_ads_delicated&id="+$("#group_id").val(),
				 success: function(result){
					// alert(result);
					 $("#show_waiting").hide();
					 $("#delicated_cat_div").html(result);	
				 }
			});	
		});	
		
 	$(document).ready(function () {
		  	 $("#show_waiting").show();
			 $.ajax({
			 type:'POST',
			 url:'/New_members_ajax.php',
			 data:"action=show_ads_delicated&id="+$("#group_id").val()+"&value=<?=$ads_edit_id?>",
				 success: function(result){
					// alert(result);
					 $("#show_waiting").hide();
					 $("#delicated_cat_div").html(result);	
				 }
			});	
		});			
 


$(document).ready(function () {
	$('#start_date2').datepicker({
		changeMonth: true,
		changeYear: true,
		isRTL: true,
		dateFormat: "yy/mm/dd"
	});
	$('#finish_date2').datepicker({
		changeMonth: true,
		changeYear: true,
		isRTL: true,
		dateFormat: "yy/mm/dd"
	});
	
	//$('#galery_pic2').html("<?=$pic_str?>");
									
		$('#galery_pic2').orakuploader({
		orakuploader_path : 'new_orakuploader/',
		orakuploader_main_path : 'new_gallery/files',
		orakuploader_thumbnail_path : 'new_gallery/files/tn',
		orakuploader_use_main : false,
		orakuploader_use_sortable : true,
		orakuploader_use_dragndrop : true,
		orakuploader_add_image : 'new_orakuploader/images/add.png',
		orakuploader_add_label : 'آپلود تصویر',
		orakuploader_resize_to : 1024,
		orakuploader_thumbnail_size : 400,
		orakuploader_watermark : 'new_orakuploader/images/watermark.png',
	});
	
	$('#galery_pic2').html("<?=$pic_str?>");
	
	//////// filemanager popup
	$('.iframe-btn').fancybox({
		'width'   : 880,
		'height'  : 570,
		'type'    : 'iframe',
		'autoScale'   : false
	});
	$('#download-button').on('click', function() {
		ga('send', 'event', 'button', 'click', 'download-buttons');
	});
	$('.toggle').click(function(){
		var _this=$(this);
		$('#'+_this.data('ref')).toggle(200);
		var i=_this.find('i');
		if (i.hasClass('icon-plus')) {
			i.removeClass('icon-plus');
			i.addClass('icon-minus');
		}else{
			i.removeClass('icon-minus');
			i.addClass('icon-plus');
		}
	});

	/////////// show hide dropdown
	hideAllDivs = function () {
    $("#add_temp").hide();
	};
});
	handleNewSelection = function () {

		hideAllDivs();
		
		switch ($(this).val()) {
			case '1':
				$("#add_temp").show();
			break;
		}
	};

	$(document).ready(function() {
		
		$("#project_billing_code_id").change(handleNewSelection);
		
		// Run the event handler once now to ensure everything is as it should be
		handleNewSelection.apply($("#project_billing_code_id"));
		
	});
</script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
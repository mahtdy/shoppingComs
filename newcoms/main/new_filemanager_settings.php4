<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
 
<style>
.desm{display: inline-flex !important;}
</style>
<script>
$(document).ready(function(){
	$("#drop4").hide();
	
	var boxes = $('input.conchkNumber');
	boxes.on('change', function () {
	  $('#drop4').toggleClass("desm", boxes.is(":checked"));
	});
	
	var boxall = $('input.conchkSelectAll');
	boxall.on('change', function () {
	  $('#drop4').toggleClass("desm", boxes.is(":checked"));
	});
});
</script>
 
<?$menu_tab=1;


if(isset($_POST['menu_tab']))
$menu_tab=injection_replace($_POST['menu_tab']);
$user_id=$_SESSION["manager_id"];
if($_GET['manager_filter'])
	$user_id=$_GET['manager_filter'];

if($user_id>0&&!in_array($user_id,$_SESSION["manager_user_permisson"]))
header('Location: new_manager_signout.php');

	if($_POST['ftp_server_names']>""){
		$condition="user_id='$user_id'";
		delete_from_data_base('new_servers_permission',$condition,$coms_conect);
		foreach($_POST['ftp_server_names'] as $serv_name){
			$arr=array("server_id"=>$serv_name,'user_id'=>$user_id);
			$id=insert_to_data_base($arr,'new_servers_permission',$coms_conect);
		}
	}
	
	foreach($_POST as $key=>$val){
		if($key!='ftp_server_names') {
			$val=injection_replace($val);
			if(get_result("select count(id) from new_filemanager_setting where name ='$key' and user_id=$user_id",$coms_conect)==1){
				$condition="name='$key' and user_id=$user_id";
				$arr=array("value"=>$val);
				update_data_base($arr,'new_filemanager_setting',$condition,$coms_conect);	
			}else{
				$arr=array("value"=>$val,"name"=>$key,'user_id'=>$user_id);
				$id=insert_to_data_base($arr,'new_filemanager_setting',$coms_conect);
			}
		}
		show_msg('اطلاعات با موفقیت به روزرسانی گردید');	
	}
	
$query2="select * from new_filemanager_setting where user_id=$user_id";
$result2 = $coms_conect->query($query2);
while($RS22 = $result2->fetch_assoc()){
	$arr=$RS22['name'];
	$RS2[$arr]=$RS22['value'];	
}

$serv=array();
$query2="select server_id from new_servers_permission where user_id=$user_id";
$result2 = $coms_conect->query($query2);
while($RS22 = $result2->fetch_assoc()){
 	$serv[]=$RS22['server_id'];	
}
//  print_r($serv);echo 'ssssssssssss';
?>






</br>

<div class="tabbable">
	<div class="msheet tab-content">

		<div class="secfhead">
		<!-- #section:sms/sendsms.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">تنظیمات مدیریت فایل</p><p class="lead">توضیحات این بخش</p></div>


			</div>
							
			<!-- /section:sms/sendsms.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			
		</div>
			<div class="tt" style="margin-bottom:40px;">
				<div class="row-fluid">
					<div class="col-xs-12">
					<div class="form-group yepco">
					
														<div class="pull-right btn-default btn-xs yepco">
						<?	$sql = "SELECT id,user_name,name FROM new_managers";
						$result = $coms_conect->query($sql);
						echo "<select name='manager_filter' id='manager_filter' class='form-control' rows='2' >";
						  while($row = $result->fetch_assoc()) {
							$name=$row['user_name'];
							$id=$row['id'];
							$str="";
							if($user_id==$id)
							$str="selected";
							if(in_array($id,$_SESSION["manager_user_permisson"]))
							echo "<option $str value='$id'>$name ({$row['name']})</option> ";
						  }
						  echo '</select>';?>
					</div>	
					</div>					
						
					</div>
					
					
				</div>
			</div>


			
			<div class="collapse in" id="sr-advertisment-tabs" style="padding: 10px;">
				<div> 
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist" style="margin:0;">
						<li  role="presentation" class="<?if($menu_tab==1)echo 'active'?>" ><a class="menu_tab" id="1" href="#sr_main_setting" aria-controls="sr_main_setting" role="tab" data-toggle="tab">تنظیمات اصلی </a></li>
						<li role="presentation"  class="<?if($menu_tab==2)echo 'active'?>"><a  class="menu_tab" id="2" href="#sr_display_setting" aria-controls="sr_display_setting" role="tab" data-toggle="tab">تنظیمات Watermark</a></li>
						<li role="presentation"  class="<?if($menu_tab==3)echo 'active'?>" ><a  class="menu_tab" id="3" href="#sr_FTP_setting" aria-controls="sr_FTP_setting" role="tab" data-toggle="tab">تنظیمات FTP</a></li>
						<li role="presentation"  class="<?if($menu_tab==4)echo 'active'?>" ><a  class="menu_tab" id="4" href="#filemanager_permission" aria-controls="filemanager_permission" role="tab" data-toggle="tab">تنظیمات دسترسی</a></li>
						<li role="presentation"  class="<?if($menu_tab==5)echo 'active'?>"><a  class="menu_tab" id="5" href="#sr_tools_setting" aria-controls="sr_tools_setting" role="tab" data-toggle="tab">تنظیمات نمایش</a></li>
						<li role="presentation"  class="<?if($menu_tab==6)echo 'active'?>"><a  class="menu_tab" id="6" href="#filemanager_thumb" aria-controls="filemanager_thumb" role="tab" data-toggle="tab">تنظیمات بند انگشتی</a></li>
						<li role="presentation"  class="<?if($menu_tab==7)echo 'active'?>" ><a class="menu_tab" id="7" href="#sr_copy_setting" aria-controls="sr_copy_setting" role="tab" data-toggle="tab"> تنظیمات کپی و برش </a></li>
						<li role="presentation"  class="<?if($menu_tab==8)echo 'active'?>" ><a class="menu_tab" id="8" href="#sr_upload_setting" aria-controls="sr_upload_setting" role="tab" data-toggle="tab"> تنظیمات آپلود</a></li>
						<li role="presentation"  class="<?if($menu_tab==9)echo 'active'?>" ><a class="menu_tab" id="9" href="#sr_avirax_setting" aria-controls="sr_avirax_setting" role="tab" data-toggle="tab">تنظمیات AVIRAX</a></li>
						<li role="presentation"  class="<?if($menu_tab==10)echo 'active'?>" ><a class="menu_tab" id="10" href="#sr_hide_setting" aria-controls="sr_hide_setting" role="tab" data-toggle="tab"> تنظیمات مخفی کردن فایل و پوشه</a></li>
						<li role="presentation"  class="<?if($menu_tab==11)echo 'active'?>" ><a class="menu_tab" id="11" href="#sr_javaupload_setting" aria-controls="sr_javaupload_setting" role="tab" data-toggle="tab">تنظیمات پیش نمایش</a></li>
						<li role="presentation"  class="<?if($menu_tab==12)echo 'active'?>" ><a class="menu_tab" id="12" href="#sr_pictures_setting" aria-controls="sr_pictures_setting" role="tab" data-toggle="tab">تنظیمات تصویر</a></li>
					</ul>
					<!-- Tab panes -->
					<form action="" method="post" id="filemanager_form">	
					<input type="hidden" name="menu_tab" id="menu_tab"  value="<?=$menu_tab?>">
					<div class="tab-content" style="padding: 10px 50px;"> 

						<div role="tabpanel" class="tab-pane <?if($menu_tab==1)echo 'active'?>" id="sr_main_setting">

							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									تنظیمات اصلی :
								</h3>
								<hr>
								<?if($_SESSION['manager_id']==1&&$user_id==1){?>
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										انتخاب مسیر و نام شاخه اصلی برای آپلود فایل ها :

									</h4>
									<div class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " value='<?=$RS2['main_folder']?>' name='main_folder' type="text" id="form-field-4" placeholder="/source/">
									</div>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										انتخاب مسیر جاری مدیریت فایل :

									</h4>
									<div class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " value='<?=$RS2['main_path']?>' name="main_path" type="text" id="form-field-4" placeholder="/source/ ...">
									</div>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										انتخاب مسیر تصاویر بند انگشتی :

									</h4>
									<div class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " name='thumb_path' value='<?=$RS2['thumb_path']?>' type="text" id="form-field-4" placeholder="/thumbs/...">
									</div>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>
								<?}?>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										بیشترین حجم آپلود فایل در شاخه مادر :

									</h4>
									<div class="sr-input col-md-6 col-xs-12">
										<div class="input-group">
																<span class="input-group-addon">
																	MB
																</span>

											<input class="input-sm sr-input-2" value='<?=$RS2['max_upload_file_on_folder']?>' name='max_upload_file_on_folder' type="text" id="form-field-4" placeholder="20">
										</div>
									</div>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										حداکثر مقدار سایز از تمام فایل های در پوشه منبع می توانید ذخیره کنید با ورود عدد صفر محدودیتی وجود نخواهد داشت.
									</p>
								</div>


								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										بیشترین حجم فایل قابل آپلود :

									</h4>
									<div class="sr-input col-md-6 col-xs-12">
										<div class="input-group">
																<span class="input-group-addon">
																	MB
																</span>

											<input class="input-sm sr-input-2" value='<?=$RS2['max_upload_file']?>' name='max_upload_file' type="text" id="form-field-4" placeholder="20">
										</div>
									</div>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										بیشترین مقدار فایلی که توسط مدیر می تواند آپلود شود ، با ورود عدد صفر محدودیتی در آپلود فایل وجود نخواهد داشت .
									</p>
								</div>


								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										انتخاب حالت نمایش پیش فرض مدیریت فایل :

									</h4>
									<div class="sr-input col-md-6 col-xs-12">
										<div class="clearfix">
											<select class="sr-input-3" name="default_show_filemanager" style="padding: 7px;" id="platform" name="platform">
												<option <?if($RS2['default_show_filemanager']=='ico') echo 'selected';?> value="ico">آیکن ها زرد </option>
												<option  <?if($RS2['default_show_filemanager']=='ico_dark') echo 'selected';?> value="ico_dark">آیکن ها تیره </option>
											</select>
										</div>
									</div>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										توسط این گزینه می توانید حالت و رنگ نمایش پوشه ها در فایل منیجر را تغییر دهید .
									</p>
								</div>
							<button type="submit" class="btn btn-success btn-next" id="next_btn" data-last="ذخیره" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
						
						<div role="tabpanel" class="tab-pane <?if($menu_tab==2)echo 'active'?>" id="sr_display_setting">
							<div class="sr-sms-advertisment">
								<h3 class="sr-yellow">
									تنظیمات Watermark
								</h3>
								<hr>
								
								
								

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										فعال کردن گزینه watermark

									</h4>
									<input type="hidden" name="active_watermark" value="0">
									<label class="col-md-6 col-xs-12">
										<input id="active-watermark-checkbox"  name="active_watermark" value="1" <?if($RS2['active_watermark']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										با فعال کردن این گزینه امکان انتخاب و تنظیم نمودن تصویر واترمارک اختصاصی درتصاویری که توسط شما آپلود می شود را دارید .
										</p>
								</div>
								<div id="active-watermark-box" style="<?if($RS2['active_watermark']!=1)echo 'display: none;'?>">
								<div class="sr-sms-settings-text sr-sms-bshadow">
									<div class="imgdemo"><img id="aks_news_thumb" src="/yep_theme/default/rtl/images/pic.png"></div>
									<label class="sr-input">
									
										<input class="input-sm " id="watermark_image" type="text"  value="<?=$RS2['watermark_image']?>" name="watermark_image">
											<script>
												setInterval(check_address,2000)
												function check_address() {
													var aks_news = $('#watermark_image').val(); 
													if(aks_news!=""){				
														$('#aks_news_thumb').attr("src",aks_news);						
													}
												}
											</script>
											<a href="/filemanager/dialog.php?type=2&amp;field_id=watermark_image" class="btn btn-success iframe-btn" style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>	
									</label>
									<p class="sr-sms-help"> 
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										تصویر انتخابی برای واترمارک حتما با پسوند PNG انتخاب شود و دارای پس زمینه نباشد .
										</p>
								</div>
								

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										موقعیت Watermark

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<select  class="input-sm " type="text"    name="image_watermark_position">
											<option <?if($RS2['image_watermark_position']=='tl')echo 'selected';?> value='tl'> top left</option>
											<option <?if($RS2['image_watermark_position']=='t')echo 'selected';?> value='t'> top (middle)</option>
											<option <?if($RS2['image_watermark_position']=='tr')echo 'selected';?> value='tr'> top right</option>
											<option <?if($RS2['image_watermark_position']=='l')echo 'selected';?> value='l'> left</option>
											<option <?if($RS2['image_watermark_position']=='m')echo 'selected';?> value='m'> middle</option>
											<option <?if($RS2['image_watermark_position']=='r')echo 'selected';?> value='r'>right</option>
											<option <?if($RS2['image_watermark_position']=='bl')echo 'selected';?> value='bl'>bottom left</option>
											<option <?if($RS2['image_watermark_position']=='b')echo 'selected';?> value='b'>bottom (middle)</option>
											<option <?if($RS2['image_watermark_position']=='br')echo 'selected';?> value='br'>bottom right</option>
										</select>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										با استفاده از این گزینه می توانید موقعیت قرار گیری تصویر واترمارک برروی تصویر خود را تعیین کنید .
										</p>
								
</div>
								<!--div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
									انتخاب مکان ثابت

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['watermark_padding']?>" name="watermark_padding">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
								</div-->								
				
								</div>
								<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
								
							</div>
						</div>
						<div role="tabpanel" class="tab-pane <?if($menu_tab==3)echo 'active'?>" id="sr_FTP_setting"> 
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									تنظیمات FTP 
								</h3>
								<hr>
								 
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										فعال کردن گزینه FTP

									</h4>
 							   <input type="hidden" name="active_ftp" value="0">
									<label class="col-md-6 col-xs-12">
										<input id="active-FTP-checkbox"  name="active_ftp" value="1" <?if($RS2['active_ftp']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										با فعال بودن این گزینه شما امکان تعریف سرور های ftp برای بارگذاری فایل های خود خواهید داشت .</p>
								</div>
					<?
				$query="SELECT * from new_servers";
				$result = $coms_conect->query($query);
				while($row = $result->fetch_assoc()) {
				
					$str='';
					 if(count($serv>0)&&in_array($row['id'],$serv))
						$str='checked';
					echo "<input $str   type='checkbox' name='ftp_server_names[]' value='{$row['id']}'>{$row['server_name']} ";
			}?>							
 
								<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>

						</div>
					
					<div role="tabpanel" class="tab-pane <?if($menu_tab==4)echo 'active'?>" id="filemanager_permission">
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									امکانات کاربردی فایل و شاخه ها :
								</h3>
								<hr>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										گزینه حذف فایل :

									</h4>
									 <input type='hidden' value='0' name='can_delete_file'>	
									<label class="col-md-6 col-xs-12">
										<input  value='1' <?if($RS2['can_delete_file']==1)echo 'checked';?>    name="can_delete_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										گزینه ساخت شاخه ها :

									</h4>
										<input type='hidden' value='0' name='can_create_folder'>	
									<label class="col-md-6 col-xs-12">
										<input  value='1' <?if($RS2['can_create_folder']==1)echo 'checked';?>   name="can_create_folder" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										گزینه حذف شاخه ها :

									</h4>
										<input type='hidden' value='0' name='can_delete_folder'>
									<label class="col-md-6 col-xs-12">
										<input  value='1' <?if($RS2['can_delete_folder']==1)echo 'checked';?>   name="can_delete_folder"  class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										گزینه آپلود فایل :

									</h4>
									<input type='hidden' value='0' name='can_upload_file'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_upload_file']==1)echo 'checked';?>   name="can_upload_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										گزینه تغییر نام فایل :

									</h4>
									<input type='hidden' value='0' name='can_rename_file'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_rename_file']==1)echo 'checked';?>   name="can_rename_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										گزینه تغییر نام شاخه :

									</h4>
									<input type='hidden' value='0' name='can_rename_folder'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_rename_folder']==1)echo 'checked';?>   name="can_rename_folder"  class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										امکان ساخت یک کپی از فایل :

									</h4>
									<input type='hidden' value='0' name='can_copy_file'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_copy_file']==1)echo 'checked';?>   name="can_copy_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										امکان copy  و cut  فایل ها :

									</h4>
									<input type='hidden' value='0' name='can_copy_cut_file'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_copy_cut_file']==1)echo 'checked';?>   name="can_copy_cut_file"  class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										امکان copy  و cut  شاخه ها :

									</h4>
									<input type='hidden' value='0' name='can_copy_cut_folder'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_copy_cut_folder']==1)echo 'checked';?>   name="can_copy_cut_folder" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text"> 
									<h4 class="col-md-6 col-xs-12">
										امکان تغییر pormision بندی فایل ها :

									</h4>
									<input type='hidden' value='0' name='can_permission_file'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_permission_file']==1)echo 'checked';?>   name="can_permission_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										امکان تغییر pormision بندی شاخه ها :

									</h4>
									<input type='hidden' value='0' name='can_permission_folder'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_permission_folder']==1)echo 'checked';?>   name="can_permission_folder" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										امکان پیش نمایش فایل ها :

									</h4>
									<input type='hidden' value='0' name='can_previwe_file'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_previwe_file']==1)echo 'checked';?>   name="can_previwe_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										امکان پیش نمایش فایل های TXT :

									</h4>
									<input type='hidden' value='0' name='can_previwe_text_file'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_previwe_text_file']==1)echo 'checked';?>   name="can_previwe_text_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										امکان ویرایش فایلهای TXT :

									</h4>
									<input type='hidden' value='0' name='can_edit_text_file'>
									<label class="col-md-6 col-xs-12">
										<input value='1' <?if($RS2['can_edit_text_file']==1)echo 'checked';?>   name="can_edit_text_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										امکان ساخت فایل های TXT :

									</h4>
									<input type='hidden' value='0' name='can_create_text_file'>
									<label class="col-md-6 col-xs-12">
										<input <input value='1' <?if($RS2['can_create_text_file']==1)echo 'checked';?>   name="can_create_text_file" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>
	<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane <?if($menu_tab==5)echo 'active'?>" id="sr_tools_setting">
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									تنظیمات نمایش :
								</h3>
								<hr>
 									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											امکان نمایش سایز کل شاخه فعال :

										</h4>
										<input type="hidden" name="show_total_size" value="0">
										<label class="col-md-6 col-xs-12">
											<input name="show_total_size" value="1" <?if($RS2['show_total_size']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p>
									</div>

									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											امکان نمایش سایز هر شاخه در حالت نمایش به صورت لیست :

										</h4>
										<input type="hidden" name="show_folder_size" value="0">
										<label class="col-md-6 col-xs-12">
											<input name="show_folder_size" value="1" <?if($RS2['show_folder_size']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p>
									</div>

									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											نمایش آیکون های فیلتر کردن نوع فایل :

										</h4>
										<input type="hidden" name="show_sorting_bar" value="0">
										<label class="col-md-6 col-xs-12">
											<input name="show_sorting_bar" value="1" <?if($RS2['show_sorting_bar']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p>


									</div>
									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											نمایش انتخاب زبان فایل منیجر :

										</h4>
										<input type="hidden" name="show_language_selection" value="0">
										<label class="col-md-6 col-xs-12">
											<input name="show_language_selection" value="1" <?if($RS2['show_language_selection']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p>
									</div>
									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											تبدیل تمام حروف بزرگ به کوچک در زمان ساخت شاخه و آپلود فایل ها :

										</h4>
										<input type="hidden" name="lower_case" value="0">
										<label class="col-md-6 col-xs-12">
											<input name="lower_case" value="1" <?if($RS2['lower_case']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p>
									</div>
									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											جایگزین کردن کاراکتر با فضای خالی :

										</h4>
										<input type="hidden" name="convert_spaces" value="0">
										<label class="col-md-6 col-xs-12">
											<input name="convert_spaces" value="1" <?if($RS2['convert_spaces']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p>
									</div>

 
	<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane <?if($menu_tab==6)echo 'active'?>" id="filemanager_thumb">
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									تنظیمات بند انگشتی 
								</h3>
								<hr>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										اندازه طول عکس  thumb

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['thumb_hegith']?>" name="thumb_hegith">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										طول تصویر تصویر بند انگشتی را بر حسب واحد پیکسل وارد کنید .
										</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										اندازه عرض عکس thumb

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['thumb_width']?>" name="thumb_width">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										عرض تصویر تصویر بند انگشتی را بر حسب واحد پیکسل وارد کنید .
										</p>
								</div>
	<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane <?if($menu_tab==7)echo 'active'?>" id="sr_copy_setting">
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									تنظیمات کپی و برش :
								</h3>
								<hr>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										عدم وجود محدودیت برای paste کردن فایل :

									</h4>
									<label class="col-md-6 col-xs-12">
										<input id="active-copy-checkbox" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>
								<div id="active-copy-box"  style ="<?if($RS2['active_copy']!=1)echo 'display: none;'?>">

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										حداکثر سایز فایل برای paste  کردن :
									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<div class="input-group">
																<span class="input-group-addon">
																	MB
																</span>

											<input class="input-sm sr-input-2" type="text" value="<?=$RS2['copy_cut_max_size']?>" name="copy_cut_max_size" placeholder="20">
										</div>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										حداکثر تعداد فایل قابل paste  کردن :

									</h4> 
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" value="<?=$RS2['copy_cut_max_count']?>" name="copy_cut_max_count" placeholder="200">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>
								</div>
								<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane <?if($menu_tab==8)echo 'active'?>" id="sr_upload_setting">
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									محدودیت آپلود پسوند های مختلف فایل :
								</h3>
								<hr>
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										پسوند های مجاز تصویر :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" data-role="tagsinput" value="<?=$RS2['ext_img']?>" name="ext_img" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										پسوند های مجاز ویدیو :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" data-role="tagsinput"  value="<?=$RS2['ext_video']?>" name="ext_video" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										پسوند های مجاز صدا :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  data-role="tagsinput" value="<?=$RS2['ext_music']?>" name="ext_music" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										پسوند های مجاز آرشیو :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" data-role="tagsinput"  value="<?=$RS2['ext_misc']?>" name="ext_misc" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										پسوند های مجاز فایل :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" data-role="tagsinput"  value="<?=$RS2['ext_file']?>" name="ext_file" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>
								<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane <?if($menu_tab==9)echo 'active'?>" id="sr_avirax_setting">
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									تنظیمات AVIRAX :
								</h3>
								<hr>
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										فعال سازی ویرایشگر تصویر AVIRAX :


									</h4>
									<input type="hidden" name="aviary_active" value="0">
									<label class="col-md-6 col-xs-12">
										<input  id="active-AVIRAX-checkbox" name="aviary_active" value="1" <?if($RS2['aviary_active']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
										<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
								</div>
									<div id="active-AVIRAX-box"  style ="<?if($RS2['aviary_active']!=1)echo 'display: none;'?>">
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										AVIRAX Api Key :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" value="<?=$RS2['aviary_apiKey']?>" name="aviary_apiKey" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										AVIRAX language :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" value="<?=$RS2['aviary_language']?>" name="aviary_language" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										AVIRAX theme :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" value="<?=$RS2['aviary_theme']?>" name="aviary_theme" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										AVIRAX tools :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" value="<?=$RS2['aviary_tools']?>" name="aviary_tools" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										AVIRAX max size :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" value="<?=$RS2['aviary_maxSize']?>" name="aviary_maxSize" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
									</p>
								</div>
								</div>
							<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane <?if($menu_tab==10)echo 'active'?>" id="sr_hide_setting">
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									مخفی کردن فایل و شاخه :
								</h3>
								<hr>
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										نام فایل هایی که می خواهید مخفی باشد را وارد کنید :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " name='hidden_files' data-role="tagsinput" value="<?=$RS2['hidden_files']?>" type="text"   placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										فایل هایی را که می خواهید مخفی باشد و قابل دیدن نباشد را در اینجا وارد کنید .
									</p>
								</div>

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										نام شاخه هایی که می خواهید مخف باشد را وارد کنید :

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text" name='hidden_folders' value="<?=$RS2['hidden_folders']?>" placeholder="doc,docx , ....">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										شاخه هایی را که می خواهید مخفی باشد و قابل دیدن نباشد را در اینجا وارد کنید .
									</p>
								</div>
								<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane <?if($menu_tab==11)echo 'active'?>" id="sr_javaupload_setting">
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									تنظیمات پیش نمایش
								</h3>
								<hr>
 
									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											فعال سازی viewer.js :

										</h4>
										<input type="hidden" name="viewerjs_enabled" value="0">
										<label class="col-md-6 col-xs-12">
											<input id="active-viewer-checkbox"  name="viewerjs_enabled" value="1" <?if($RS2['viewerjs_enabled']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											با فعال سازی این گزینه امکان تعریف پسوند های فایل هایی که با پلاگین viewer.js قابل پیش نمایش است برای شما فراهم می شود .
										</p>
									</div>
									<div id="active-viewer-box"  style ="<?if($RS2['viewerjs_enabled']!=1)echo 'display: none;'?>">
									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											پسوند های مجاز برای نمایش :

										</h4>
										<label class="sr-input col-md-6 col-xs-12">
											<input class="input-sm " data-role="tagsinput" name='viewerjs_file_exts' value="<?=$RS2['viewerjs_file_exts']?>" placeholder="doc,docx , ....">
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											پسوند هایی را که می خواهید توسط پلاگین viewer.js نمایش داده شود در باکس بالا وارد کنید .
											</p>
									</div>
									</div>
									
									
									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											پیش نمایش با گوگل داکت :

										</h4>
										<input type="hidden" name="googledoc_enabled" value="0">
										<label class="col-md-6 col-xs-12">
											<input  id="active-gdoct-checkbox" name="googledoc_enabled" value="1" <?if($RS2['googledoc_enabled']==1) echo 'checked';?> class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
											<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											با فعال سازی این گزینه امکان تعریف پسوند های فایل هایی که با گوگل داکت قابل پیش نمایش است برای شما فراهم می شود .
										</p>
									</div>
									<div id="active-gdoct-box"  style ="<?if($RS2['googledoc_enabled']!=1)echo 'display: none;'?>">
									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											پسوند های فایل نمایش را وارد کنید :

										</h4>
										<label class="sr-input col-md-6 col-xs-12">
											<input class="input-sm " type="text" data-role="tagsinput" name='googledoc_file_exts' value="<?=$RS2['googledoc_file_exts']?>" placeholder="doc,docx , ....">
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											پسوند هایی را که می خواهید توسط گوگل داکت نمایش داده شود در باکس بالا وارد کنید .
											</p>
									</div>									
			                         <div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											فایل های قابل ویرایش

										</h4>
										<label class="sr-input col-md-6 col-xs-12">
											<input class="input-sm " type="text" data-role="tagsinput" name='editable_text_file_exts' value="<?=$RS2['editable_text_file_exts']?>" placeholder="doc,docx , ....">
										</label>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											فایل های تعریف شده در این قسمت امکان ویرایش به صورت آنلاین توسط فایل منیجر را دارند
											</p>
									</div>									
									</div>
								<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
							</div>
						</div>
		
		            	<div role="tabpanel" class="tab-pane <?if($menu_tab==12)echo 'active'?>" id="sr_pictures_setting">   
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیمات تصاویر :
									</h3>
									<hr>

									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											انتخاب نحوه آپلود تصویر:

										</h4>
										<div class="sr-input col-md-6 col-xs-12">
											<div class="clearfix">
												<select class="input-xlarge" id="image_max_mode" name="image_max_mode">
													<option value="auto" <?if($RS2['image_max_mode']=='auto')echo 'selected';?> >تعریف عرض و طول ثابت</option>
													<option value="portrait" <?if($RS2['image_max_mode']=='portrait')echo 'selected';?>>تنظیم تصویر بر حسب ارتفاع</option>
													<option value="landscape" <?if($RS2['image_max_mode']=='landscape')echo 'selected';?>>تنظیم تصویر بر حسب عرض</option>
													<option value="crop" <?if($RS2['image_max_mode']=='crop')echo 'selected';?>>تنظیم اتوماتیک سایز بر حسب عرض تصویر</option>

												</select>
											</div>
										</div>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p>
									</div>

									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											بیشترین عرض تصویر :

										</h4>
										<div class="sr-input col-md-6 col-xs-12">
											<div class="input-group">
																	<span class="input-group-addon">
																		PX
																	</span>

												<input class="input-sm sr-input-2" name='image_max_width' value="<?=$RS2['image_max_width']?>" type="text"   placeholder="20">
											</div>
										</div>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p>
									</div>

									<div class="sr-sms-settings-text">
										<h4 class="col-md-6 col-xs-12">
											بیشترین ارتفاع تصویر :

										</h4>
										<div class="sr-input col-md-6 col-xs-12">
											<div class="input-group">
																	<span class="input-group-addon">
																		PX
																	</span>

												<input class="input-sm sr-input-2" type="text" name='image_max_height' value="<?=$RS2['image_max_height']?>" placeholder="20">
											</div>
										</div>
										<p class="sr-sms-bshadow sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
										</p> 
									</div>

									<button class="btn btn-success btn-next" id="next_btn" data-last="پرداخت" style="margin-top:5px;">ذخیره </button>
								</div>

							</div>
						
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /section:sms/sendsms.table -->
	</div>
</div>

<script src="ajax_js/sms_archive.js"></script>
<?$_SESSION["del_item"]='del_archive_sms'?>
<script> 
$(".menu_tab").click(function(){
	$('#menu_tab').val($(this).attr('id'));
});

	 $(function(){
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
	}); 
	
	
		$('#manager_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&manager_filter=") >= 0){
			var b=a.split('&manager_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&manager_filter="+$(this).val()+e;
		}
		else
		a +='&manager_filter='+$(this).val();
		window.location.href = a;
    });	
</script>
<script type="text/javascript" language="javascript">

    // Running the code when the document is ready
    $(document).ready(function () {

        $('#active-watermark-checkbox').click(function () {
            $("#active-watermark-box").toggle(this.checked);
        });
		$('#active-FTP-checkbox').click(function () {
            $("#active-FTP-box").toggle(this.checked);
        });
		$('#active-copy-checkbox').click(function () {
            $("#active-copy-box").toggle(this.checked);
        });
		$('#active-AVIRAX-checkbox').click(function () {
            $("#active-AVIRAX-box").toggle(this.checked);
        });
		$('#active-viewer-checkbox').click(function () {
            $("#active-viewer-box").toggle(this.checked);
        });
		$('#active-gdoct-checkbox').click(function () {
            $("#active-gdoct-box").toggle(this.checked);
        });
		
		
    });

</script>
<script src="/yep_theme/default/rtl/assets/js/date-time/bootstrap-timepicker.min.js" /></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-timepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>


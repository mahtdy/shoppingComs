<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<?$menu_tab=1; 



##################چک کردن زبان#######################
$la='fa';
$site='main';
if(isset($_POST['manage_lang']))
$la=injection_replace($_POST['manage_lang']);
else if(isset($_GET['lang_filter']))
$la=injection_replace($_GET['lang_filter']);
if($la>""&&!in_array($la,$_SESSION["manager_title_lang"])){
	header('Location: new_manager_signout.php');
}
$lang_filter=injection_replace($_GET['lang_filter']);
if($lang_filter>0&&!in_array($lang_filter,$_SESSION["manager_title_lang"])){
	header('Location: new_manager_signout.php');
}
#########################چک کردن زیر سایت#############
if(isset($_POST['manage_site']))
$site=injection_replace($_POST['manage_site']);
$site_filter=injection_replace($_GET['site_filter']);
if(($site>0&&!in_array($site,$_SESSION["manager_title_site"]))||($site_filter>0&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
header('Location: new_manager_signout.php');
exit;
}




if(isset($_POST['menu_tab'])){

	$menu_tab=injection_replace($_POST['menu_tab']);

	######هدر
	$meta_desciption=injection_replace($_POST["meta_desciption"]);
	$meta_keyword=injection_replace($_POST["meta_keyword"]);
	$header_title=injection_replace($_POST["header_title"]);
	insert_templdate($site,$header_pic,$la,$meta_desciption,$header_title,$meta_keyword,'',"header_title",'default',$coms_conect);			

	####صفحه های داینامیک
	$call_us_title=($_POST["call_us_title"]);
	$call_us_link=($_POST["call_us_link"]);
	$call_us_text=($_POST["call_us_text"]);
	$call_us_pic=($_POST["call_us_pic"]);
	insert_templdate($site,$call_us_pic,$la,$call_us_text,$call_us_title,$call_us_link,'',"call_us_text",'default',$coms_conect);
	
	$reg_low_title=($_POST["reg_low_title"]);
	$reg_low_link=($_POST["reg_low_link"]);
	$reg_low_text=($_POST["reg_low_text"]);
	$reg_low_pic=($_POST["reg_low_pic"]);
	insert_templdate($site,$reg_low_pic,$la,$reg_low_text,$reg_low_title,$reg_low_link,'',"reg_low_text",'default',$coms_conect);
	
	$register_text=($_POST["register_text"]);
	$register_title=injection_replace($_POST["register_title"]);
	$register_pic=injection_replace($_POST["register_pic"]);
	insert_templdate($site,$register_pic,$la,$register_text,$register_title,'','',"register_text",'default',$coms_conect);	
	
	$login_two_level_link=($_POST["login_two_level_link"]);
	$login_two_level_text=($_POST["login_two_level_text"]);
	$login_two_level_title=injection_replace($_POST["login_two_level_title"]);
	$login_two_level_pic=injection_replace($_POST["login_two_level_pic"]);
	insert_templdate($site,$login_two_level_pic,$la,$login_two_level_text,$login_two_level_title,$login_two_level_link,'',"login_two_level_text",'default',$coms_conect);
	
	
	###متن کپی رایت
	$fotter_pic=injection_replace($_POST["fotter_pic"]);
	$fotter_copyrigth=injection_replace($_POST["fotter_copyrigth"]);
	insert_templdate($site,$fotter_pic,$la,$fotter_copyrigth,'','','',"fotter_pic",'default',$coms_conect);	
	
	####قوانین ارسال دیدگاه 
	$low_text= ($_POST["low_text"]);
	//echo $low_text;
	insert_templdate($site,'',$la,$low_text,'','','',"low_text",'default',$coms_conect);
	
	
	####تجزیه و تحلیل
	$analysister2= ($_POST["analysister2"]);
	$analysister2=str_replace('<script type="text/javascript">',"",$analysister2);
	$analysister2=str_replace('</script>',"",$analysister2);
	insert_templdate($site,'',$la,$analysister2,'','','',"analysister2",'default',$coms_conect);
	
	$analysister1= ($_POST["analysister1"]);
	$analysister1=str_replace('<script type="text/javascript">',"",$analysister1);
	$analysister1=str_replace('</script>',"",$analysister1);
	insert_templdate($site,'',$la,$analysister1,'','','',"analysister1",'default',$coms_conect);
	
	$google_code_analiz= ($_POST["google_code_analiz"]);
	$google_code_analiz=str_replace('<script type="text/javascript">',"",$google_code_analiz);
	$google_code_analiz=str_replace('</script>',"",$google_code_analiz);
	insert_templdate($site,'',$la,$google_code_analiz,'','','',"google_code_analiz",'default',$coms_conect);   
	
}
 
?>
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

<form class="form-horizontal" action="" method="post" name="new" id="new" enctype="multipart/form-data">	
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading"><?=$s_Pages_delete?></h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>آيا از حذف اين مورد اطمينان داريد؟</div>
		</div>
		<input type="hidden" id="check_value" name="check_value" value="0">
		<div class="modal-footer ">
			<button type="button" id="btn_ok"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
		</div>
	</div>
	</div>
</div>
</form>

<form class="form-horizontal" action="" method="post" name="new_details" id="new_details" enctype="multipart/form-data">	
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">مشاهده متن پیامک</h4>
		</div>
		<div class="modal-body">
			<div class="panel-body" id="show_details">
				 
				</div>
			</div>
		</div>

	</div>
	</div>
</form>
</br>
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  -->
 
	<div class="tabbable">
		<form action="" method="post">
<input type="hidden" value="1" name="menu_tab" id="menu_tab" value="<?=$menu_tab?>">
		<!--ul class="nav nav-tabs">
					
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			پیامک های ارسالی </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:sms/sendsms.head -->
				<div class="sectitle">
					<div class="icon"><span class="flaticon-file23" style=""></span></div>
					<div class="title"><p class="titr">تنظیمات سایت</p><p class="lead">توضیحات این بخش</p></div>
				
				</div>

			<!-- /section:sms/sendsms.head -->
				<div class="toolmenu">
					<ul>
						<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
					</ul>
				</div>
			</div>
		    <div class="col-md-12">
				<div class="form-group col-md-3">
					<?create_sub_site_filter_none($site_filter,$coms_conect,$_SESSION['manager_title_site'])?>
				</div>
				<div class="form-group col-md-3">
					<?create_lang_filter_none($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
				</div>
			</div>
		
			<div class="tab-pane <?if($edit_id=="")echo 'active'?> " id="tab1">
				<!-- #section:sms/sendsms.table -->
					<div class="row-fluid">
						<!--div class="col-md-6 yepco"-->
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete" href="#" title="<?=$s_Pages_delete?>"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
											<?=$s_Pages_delete?> 
										</a>
									</ul>
								</div>
							</div>
						<!--/div-->
						
			
					
					</div>
				<div class="collapse in" id="sr-advertisment-tabs" style="padding: 10px;">

					<div>

						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist" style="margin:0;">
							<li  role="presentation" class="<?if($menu_tab==1)echo 'active'?>"><a class="menu_tab" id="1" href="#sr_account_setting" aria-controls="sr_name_finder" role="tab" data-toggle="tab">تنظیمات پایه سایت</a></li>
							<li  role="presentation" class="<?if($menu_tab==2)echo 'active'?>"><a class="menu_tab" id="2" href="#sr_advertisment_setting" aria-controls="sr_advertisment_setting" role="tab" data-toggle="tab">صفحه های داینامیک</a></li>
							<li  role="presentation" class="<?if($menu_tab==3)echo 'active'?>"><a class="menu_tab" id="3" href="#sr_financial_setting" aria-controls="sr_financial_setting" role="tab" data-toggle="tab"> متن کپی رایت</a></li>
							<li  role="presentation" class="<?if($menu_tab==4)echo 'active'?>"><a class="menu_tab" id="4" href="#sr_ticket_setting" aria-controls="sr_ticket_setting" role="tab" data-toggle="tab">قوانین ارسال دیدگاه</a></li>
							<li  role="presentation" class="<?if($menu_tab==5)echo 'active'?>"><a class="menu_tab" id="5" href="#sr_online_sell_setting" aria-controls="sr_online_sell_setting" role="tab" data-toggle="tab">تجزیه و تحلیل ترافیک</a></li>
							
						</ul>

						<!-- Tab panes -->
						<div class="tab-content" style="padding: 10px 50px;">
							<div role="tabpanel" class="tab-pane <?if($menu_tab==1)echo 'active'?>" id="sr_account_setting">
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیم عنوان سایت و کلمه کلیدی :
									</h3>
									<hr>
									<?$header_title= get_tem_result($site,$la,"header_title",'default',$coms_conect);?>
									<div class="sr-sms-settings-text sr-sms-bshadow ">
										<p class="sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											در پر کردن اطلاعات زیر بسیار دقت کنید. چون این صفحه مهمترین صفحه شما در کل وب سایت می باشد.
										</p>
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												عنوان سایت
											</label>
											<div class="col-sm-6">
												<input id="header_title" name="header_title" class="form-control" value="<?=$header_title['title']?>"/>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												کلمات کلیدی
											</label>
											<div class="col-sm-6">
												<input type="text"   id="meta_keyword" name="meta_keyword" value="<?=$header_title['link']?>" class="form-control" data-role="tagsinput" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit; display: none;">
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												<span class="inline space-24 hidden-480"></span>
												توضیحات
											</label>
											<div class="col-sm-6">
												<textarea id="meta_desciption" name="meta_desciption"  class="form-control" rows="8"><?=$header_title['text']?></textarea>
												
											</div>
										</div> 
										
										<div class="row form-group">
											<div class="col-md-3 col-md-offset-3">	
												<button type="submit" class="btn btn-success btn-next" id="next_btn">ذخیره </button>
											</div>	
										</div>
									</div>
								</div>
							</div>

							<div role="tabpanel" class="tab-pane <?if($menu_tab==2)echo 'active'?>" id="sr_advertisment_setting">
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیمات صفحه تماس با ما :
									</h3>
									<hr>
								<?$call_us_text= get_tem_result($site,$la,'call_us_text','default',$coms_conect);?>
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
												<input id="call_us_title" value="<?=$call_us_text['title']?>" name="call_us_title" class="form-control"/>
											</div>
										</div> 
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												متن نوباری
											</label>
											<div class="col-sm-6">
												<input id="call_us_link" value="<?=$call_us_text['link']?>" name="call_us_link" class="form-control"/>
											</div>
										</div> 
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												متن فوتر
											</label>
											<div class="col-sm-6">
												<textarea type="text"   id="call_us_text" name="call_us_text" class="form-control" /><?=$call_us_text['text']?></textarea>
											</div>
										</div> 
										
										<!--div class="row form-group">
											<label class="col-sm-3 control-label"  style="text-align: left;">
												تصویر ناوبری
											</label>
											<div class="col-sm-6">
												<div class="col-md-12 input-group">
													<input type="text" style="direction: ltr;" class="col-md-10"   value="<?=$call_us_text['pic_adress']?>" data-toggle="popover" id="call_us_pic" name="call_us_pic">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=call_us_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 38px;padding-top: 9px;  float: right;">انتخاب</a>
												</div>
											</div>
										</div--> 
										
										<div class="row form-group">
											<div class="col-md-3 col-md-offset-3">	
												<button type="submit" class="btn btn-success btn-next" id="next_btn">ذخیره </button>
											</div>	
										</div>
									</div>
								</div>
							
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیمات صفحه ثبت نام :
									</h3>
									<hr>
									<?$reg_low_text= get_tem_result($site,$la,'reg_low_text','default',$coms_conect);?>
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
												<input id="reg_low_title" value="<?=$reg_low_text['title']?>" name="reg_low_title" class="form-control"/>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												متن نوباری
											</label>
											<div class="col-sm-6">
												<input type="reg_low_link" value="<?=$reg_low_text['link']?>" id="reg_low_link" name="reg_low_link" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												تصویر نوباری
											</label>
											<div class="col-sm-6">
												<div class="col-md-12 input-group">
													<input type="text" style="direction: ltr;" class="col-md-10"  value="<?=$reg_low_text['pic_adress']?>"  data-toggle="popover" id="reg_low_pic" name="reg_low_pic">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=reg_low_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 38px;padding-top: 9px;  float: right;">انتخاب</a>
												</div>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												<span class="inline space-24 hidden-480"></span>
												متن راهنما
											</label>
											<div class="col-sm-6">
												<textarea id="reg_low_text" name="reg_low_text"  class="form-control" rows="8"><?=$reg_low_text['text']?></textarea>
													<script>
														tinymce.init({
															selector: "#reg_low_text",
															height: 200,
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
														
															// Running the code when the document is ready
														$(document).ready(function () {
															$('#new_ticket_record_send').click(function () {
																$("#new_ticket_record_box").toggle(this.checked);
															});
														});
													</script>
											</div>
										</div> 
										
										<div class="row form-group">
											<div class="col-md-3 col-md-offset-3">	
												<button type="submit" class="btn btn-success btn-next" id="next_btn">ذخیره </button>
											</div>	
										</div>
									</div>
								</div>
							
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیمات صفحه ورود به سایت :
									</h3>
									<hr>
									<?$register_text= get_tem_result($site,$la,"register_text",'default',$coms_conect);?>
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
												<input id="register_title" value="<?=$register_text['title']?>" name="register_title" class="form-control"/>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												متن ناوبری
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$register_text['text']?>" id="register_text" name="register_text" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label"  style="text-align: left;">
												تصویر ناوبری
											</label>
											<div class="col-sm-6">
												<div class="col-md-12 input-group">
													<input type="text" style="direction: ltr;" class="col-md-10"  value="<?=$register_text['pic_adress']?>"  data-toggle="popover" id="register_pic" name="register_pic">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=register_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 38px;padding-top: 9px;  float: right;">انتخاب</a>
												</div>
											</div>
										</div> 
										
										<div class="row form-group">
											<div class="col-md-3 col-md-offset-3">	
												<button type="submit" class="btn btn-success btn-next" id="next_btn">ذخیره </button>
											</div>	
										</div>
									</div>
								</div>
							
							
										<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیمات صفحه ورود دومرحله ای :
									</h3>
									<hr>
									<?$login_two_level= get_tem_result($site,$la,"login_two_level_text",'default',$coms_conect);?>
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
												<input id="login_two_level_title" value="<?=$login_two_level['title']?>" name="login_two_level_title" class="form-control"/>
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												متن ناوبری
											</label>
											<div class="col-sm-6">
												<input type="text" value="<?=$login_two_level['link']?>" id="login_two_level_link" name="login_two_level_link" class="form-control" />
											</div>
										</div> 
										
										<div class="row form-group">
											<label class="col-sm-3 control-label"  style="text-align: left;">
												تصویر ناوبری
											</label>
											<div class="col-sm-6">
												<div class="col-md-12 input-group">
													<input type="text" style="direction: ltr;" class="col-md-10"  value="<?=$login_two_level['pic_adress']?>"  data-toggle="popover" id="login_two_level_pic" name="login_two_level_pic">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=login_two_level_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 38px;padding-top: 9px;  float: right;">انتخاب</a>
												</div>
											</div>
										</div> 
														<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												<span class="inline space-24 hidden-480"></span>
												متن راهنما
											</label>
											<div class="col-sm-6">
												<textarea id="login_two_level_text" name="login_two_level_text"  class="form-control" rows="8"><?=$login_two_level['text']?></textarea>
													<script>
														tinymce.init({
															selector: "#login_two_level_text",
															height: 200,
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
														
															// Running the code when the document is ready
														$(document).ready(function () {
															$('#new_ticket_record_send').click(function () {
																$("#new_ticket_record_box").toggle(this.checked);
															});
														});
													</script>
											</div>
										</div> 
										<div class="row form-group">
											<div class="col-md-3 col-md-offset-3">	
												<button type="submit" class="btn btn-success btn-next" id="next_btn">ذخیره </button>
											</div>	
										</div>
									</div>
								</div>
							
							
							</div>
							<div role="tabpanel" class="tab-pane <?if($menu_tab==3)echo 'active'?>" id="sr_financial_setting">
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیم متن کپی رایت سایت :
									</h3>
									<hr>

									<div class="sr-sms-settings-text sr-sms-bshadow ">
										<p class="sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											متن کپی رایت نمایش داده شده در فوتر سایت شما می باشد که قوانین مالکیت سایت را بازگو می کند.
										</p>
										<?$fotter_pic= get_tem_result($site,$la,'fotter_pic','default',$coms_conect);?>
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												<span class="inline space-24 hidden-480"></span>
												توضیحات
											</label>
											<div class="col-sm-6">
												<textarea id="fotter_copyrigth" name="fotter_copyrigth"  class="form-control" rows="8"><?=$fotter_pic['text']?></textarea>
												
											</div>
										</div> 
										
										<div class="row form-group">
											<div class="col-md-3 col-md-offset-3">	
												<button type="submit" class="btn btn-success btn-next" id="next_btn">ذخیره </button>
											</div>	
										</div>
									</div>
								</div>
								
							</div>
							<div role="tabpanel" class="tab-pane <?if($menu_tab==4)echo 'active'?>" id="sr_ticket_setting">
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیم متن قوانین درج نظر در سایت :
									</h3>
									<hr>

									<div class="sr-sms-settings-text sr-sms-bshadow ">
										<p class="sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											این قوانین در بالای فرم ارسال نظرات مطالب سایت نمایش داده می شود.
										</p>
										<?$low_text= get_tem_result($site,$la,'low_text','default',$coms_conect);
								 
										?>
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												<span class="inline space-24 hidden-480"></span>
												توضیحات
											</label>
											<div class="col-sm-9">
												<textarea id="low_text" name="low_text"  class="form-control" rows="8"><?=$low_text['text']?></textarea>
													<script>
														tinymce.init({
															selector: "#low_text",
															height: 200,
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
														
															// Running the code when the document is ready
														$(document).ready(function () {
															$('#new_ticket_record_send').click(function () {
																$("#new_ticket_record_box").toggle(this.checked);
															});
														});
													</script>
											</div>
										</div> 
										
										<div class="row form-group">
											<div class="col-md-3 col-md-offset-3">	
												<button type="submit" class="btn btn-success btn-next" id="next_btn">ذخیره </button>
											</div>	
										</div>
									</div>
								</div>
							
							</div>
							<div role="tabpanel" class="tab-pane <?if($menu_tab==5)echo 'active'?>" id="sr_online_sell_setting">
								<div class="sr-sms-account">
									<h3 class="sr-yellow">
										تنظیمات تجزیه و تحلیل و آمار بازدید سایت :
									</h3>
									<hr>

									<div class="sr-sms-settings-text sr-sms-bshadow ">
										<p class="sr-sms-help">
											<i class="fa fa-question-circle" aria-hidden="true"></i>
											کدهای گرفته شده از سایت های بررسی بازدید و تجزیه و تحلیل را در باکس های زیر درج کنید تا فعال گردند.
										</p>
										<?$google_code_analiz= get_tem_result($site,$la,'google_code_analiz','default',$coms_conect);?>
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												<span class="inline space-24 hidden-480"></span>
												کد گوگل آنالیتیک
											</label>
											<div class="col-sm-6">
												<textarea id="google_code_analiz" name="google_code_analiz"  class="form-control" rows="8"><?=$google_code_analiz['text']?></textarea>
												
											</div>
										</div> 
										<?$analysister1= get_tem_result($site,$la,'analysister1','default',$coms_conect);?>
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												<span class="inline space-24 hidden-480"></span>
												کد تحلیل بازدید1
											</label>
											<div class="col-sm-6">
												<textarea id="analysister1" name="analysister1"  class="form-control" rows="8"><?=$analysister1['text']?></textarea>
												
											</div>
										</div> 
										<?$analysister2= get_tem_result($site,$la,'analysister2','default',$coms_conect);?>
										<div class="row form-group">
											<label class="col-sm-3 control-label" style="text-align: left;">
												<span class="inline space-24 hidden-480"></span>
												کد تحلیل بازدید 2
											</label>
											<div class="col-sm-6">
												<textarea id="analysister2" name="analysister2"  class="form-control" rows="8"><?=$analysister2['text']?></textarea>
												
											</div>
										</div> 
										
										<div class="row form-group">
											<div class="col-md-3 col-md-offset-3">	
												<button type="submit" class="btn btn-success btn-next" id="next_btn">ذخیره </button>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
					</div>
					
				<!-- /section:sms/sendsms.table -->
				
			</div>
		</form>	
		</div>
 
<script>
$(".menu_tab").click(function(){
	$('#menu_tab').val($(this).attr('id'));
});
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

</script>
<script src="ajax_js/sms_archive.js"></script>
<?$_SESSION["del_item"]='del_archive_sms'?>

<script src="/yep_theme/default/rtl/assets/js/date-time/bootstrap-timepicker.min.js" /></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-timepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>


<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>
<?$q=injection_replace($_GET['q']);?>
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
		<!--ul class="nav nav-tabs">
					
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			پیامک های ارسالی </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:sms/sendsms.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">تنظیمات آگهی </p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:sms/sendsms.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
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
					<div class="container">
					<div class="sr-sms-account">
					<h3 class="sr-yellow">
					تنظیمات نام یاب ویژه :
					</h3>
					<hr>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					فعال سازی آگهی ویژه :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					هزینه آگهی ویژه :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="0">
							ریال
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
						<h4 class="col-md-6 col-xs-12">
							نام واحد قیمت گذاری ویژه تر کردن آگهی :
					
						</h4>
						<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
							<i class="fa fa-question-circle" aria-hidden="true"></i>
						در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					قیمت هر واحد تعیین شده :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر تعداد قابل خرید :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تعیین مدت زمان قیمت واحد :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>

					</div>
					
					<br>
					<div class="sr-sms-advertisment">
					<h3 class="sr-yellow">
					تنظیمات اعتبار آگهی :
					</h3>
					<hr>
					
				<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداقل تعداد روز اعتبار آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر تعداد روز اعتبار آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					
					</div>
										<div class="sr-sms-account">
					<h3 class="sr-yellow">
					تنظیمات تخفیف آگهی :
					</h3>
					<hr>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					فعال سازی تخفیف ثابت :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					عنوان تخفیف ثابت :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					از تاریخ :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تا تاریخ :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					میزان تخفیف :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
						<h4 class="col-md-6 col-xs-12">
							فعال سازی تخفیف شناور :
					
						</h4>
						<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
						</label>
						<p class="sr-sms-bshadow sr-sms-help">
							<i class="fa fa-question-circle" aria-hidden="true"></i>
						در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					عنوان تخفیف شناور :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					از تاریخ :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تا تاریخ :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					میزان تخفیف شناور :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>

					</div>
															<div class="sr-sms-account">
					<h3 class="sr-yellow">
					تنظیمات محتوای آگهی :
					</h3>
					<hr>
					<h4 class="sr-yellow">
					تنظیمات تصویر :
					</h4>
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تعداد تصویر قابل آپلود رایگان :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر تعداد تصویر قابل آپلود :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					هزینه افزودن تصویر مازاد :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تغییر سایز تصویر به عرض :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تصویر واترمارک شود :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
						<h4 class="col-md-6 col-xs-12">
							آدرس فایل واتر مارک :
					
						</h4>
						<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
							<i class="fa fa-question-circle" aria-hidden="true"></i>
						در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر حجم تصویر قابل آپلود :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<div class="input-group">
																	<span class="input-group-addon">
																		MB
																	</span>

																	<input class="input-sm sr-input-2" type="text" id="form-field-4" placeholder="20">
																</div>
					</div>
						<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					
					
					<h4 class="sr-yellow">
					تنظیمات ویدیو :
					</h4>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					امکان درج ویدیو در آگهی :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تعداد ویدیو های رایگان قابل افزودن به آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر تعداد ویدیو قابل افزودن :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					هزینه افزودن ویدیو های مازاد :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					
					
					
					<h4 class="sr-yellow">
					تنظیمات  pdf :
					</h4>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					امکان درج pdf در آگهی :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تعداد pdf رایگان قابل افزودن به آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر تعداد pdf قابل افزودن :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					هزینه افزودن pdf مازاد :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					
					
					<h4 class="sr-yellow">
					تنظیمات فایل صوتی :
					</h4>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					امکان درج فایل صوتی درآگهی :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تعداد فایل های صوتی رایگان قابل افزودن به آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر تعداد فایل های صوتی قابل افزودن به آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					هزینه افزودن فایل های صوتی مازاد :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					
					
					<h4 class="sr-yellow">
					تنظیمات فایل پیوست :
					</h4>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					امکان افزودن فایل پیوست به آگهی :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تعداد فایل های پیوست رایگان قابل افزودن به آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر تعداد فایل پیوست قابل افزودن به آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					هزینه افزودن فایل های پیوست مازاد :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>

					
					
					
					
					
					
					<h4 class="sr-yellow">
					تنظیمات لینک :
					</h4>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					امکان درج لینک به آگهی :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تعداد لینک های رایگان قابل افزودن به آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					حداکثر تعداد لینک های قابل افزودن به آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					هزینه افزودن لینک های مازاد :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					هزینه فالو کردن لینک آگهی :
					
					</h4>
					<div class="sr-input col-md-6 col-xs-12">
							<input class="input-sm " type="text" id="form-field-4" placeholder="/source/">
					</div>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					
					</div>
					
					
					<div class="sr-sms-account">
					<h3 class="sr-yellow">
					تنظیمات نقشه گوگل :
					</h3>
					<hr>
					
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					امکان درج نقشه گوگل به آگهی :
					
					</h4>
					<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
					</label>
					<p class="sr-sms-bshadow sr-sms-help">
						<i class="fa fa-question-circle" aria-hidden="true"></i>
					در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعای شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.
					</p>
					</div>
					
					
					
					
					
					

					</div>
															
		

					</div>
					</div>
					
				<!-- /section:sms/sendsms.table -->
				
			</div>
</div>
<script src="ajax_js/sms_archive.js"></script>
<?$_SESSION["del_item"]='del_archive_sms'?>

<script src="/yep_theme/default/rtl/assets/js/date-time/bootstrap-timepicker.min.js" /></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-timepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>


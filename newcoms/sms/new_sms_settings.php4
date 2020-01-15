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
				<div class="title"><p class="titr">تنظیمات پیام کوتاه</p><p class="lead">توضیحات این بخش</p></div>
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
					حساب کاربری :
					</h3>
					<hr>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					ارسال اطلاعات حساب کاربری به موبایل کاربر پس از ثبت نام :
					
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
							ارسال اطلاعات حساب کاربری در زمان بازیابی رمز :
					
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
					ارسال اخرین موجودی کاربر بعد از افزایش یا کاهش حساب کاربری :
					
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
					
					<br>
					<div class="sr-sms-advertisment">
					<h3 class="sr-yellow">
					آگهی :
					</h3>
					<hr>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					ارسال پیامک اطلاع رسانی بعد از تایید آگهی رایگان :
					
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
					ارسال پیامک اطلاع رسانی بعد از تایید آگهی ویژه :
					
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
					ارسال پیامک اطلاع رسانی بعد از رد آگهی رایگان :
					
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
					ارسال پیامک اطلاع رسانی بعد از رد آگهی ویژه :
					
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
					ارسال پیامک هشدار قبل از انقضای آگهی ویژه :
					
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
					ارسال پیامک هشدار قبل از انقضای آگهی رایگان :
					
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
					ارسال پیامک اطلاع رسانی بعد از رد آگهی ویژه :
					
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
					ارسال پیامک اطلاع رسانی بعد از رد آگهی ویژه :
					
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
										<div class="sr-sms-account">
					<h3 class="sr-yellow">
					مالی :
					</h3>
					<hr>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					ارسال پیامک وضعیت بررسی فیش بانکی :
					
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
							ارسال پیامک در صورت کاهش از اعتبار حساب :
					
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
					ارسال پیامک در صورت افزایش اعتبار حساب :
					
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
															<div class="sr-sms-account">
					<h3 class="sr-yellow">
					تیکت :
					</h3>
					<hr>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					ارسال پیامک ثبت تیکت جدید به دپارتمان های مرتبط :
					
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
							ارسال پیامک در صورت کاهش از اعتبار حساب :
					
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
					ارسال پیامک در صورت افزایش اعتبار حساب :
					
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
															<div class="sr-sms-account">
					<h3 class="sr-yellow">
					فروش آنلاین :
					</h3>
					<hr>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					ارسال کد پیگیری سفارش خرید به مشتری :
					
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
						ارسال آخرین وضعیت سفارش به مشتری :
					
						</h4>
						<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
						</label>
						<p class="sr-sms-bshadow sr-sms-help">
							<i class="fa fa-question-circle" aria-hidden="true"></i>
						در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
					</div>
					
					</div>
															<div class="sr-sms-account">
					<h3 class="sr-yellow">
					مراحل سفارش و سیستم اطلاع رسانی آن :
					</h3>
					<hr>
					
					<div class="sr-sms-settings-text">
					<h4 class="col-md-6 col-xs-12">
					تایید مالی و ارسال کد پیگیری سفارش :
					
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
							ارجاع به انبار برای بسته بندی :
					
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
					ارسال پیامک در صورت افزایش اعتبار حساب :
					
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
					<div class="sr-sms-account">
					<h3 class="sr-yellow">
					تماس با ما :
					</h3>
					<hr>
					<div class="sr-sms-settings-text">
						<h4 class="col-md-6 col-xs-12">
						ارسال پیامک به مدیر در زمان دریافت پیام جدید :
					
						</h4>
						<label class="col-md-6 col-xs-12">
							<input id="771" name="switch-field-1" class="ace ace-switch ace-switch-7 conchkNumber_4" type="checkbox">
							<span title="" class="lbl" data-original-title="مشاهده توسط اعضای سایت"></span>
						</label>
						<p class="sr-sms-bshadow sr-sms-help">
							<i class="fa fa-question-circle" aria-hidden="true"></i>
						در صورت فعال سازی این گزینه بعد از تکمیل ثبت نام کاربر جدید در سایت ، بعد از فعال شدن حساب کاربری مشتری اطلاعات حساب کاربری برای مشتری پیامک خواهد شد.</p>
					</div>
					
					</div>

					</div>
					</div>
					
				<!-- /section:sms/sendsms.table -->
				
			</div>
			
		</div>
</div>
<script src="ajax_js/sms_archive.js"></script>
<?$_SESSION["del_item"]='del_archive_sms'?>

<script src="/yep_theme/default/rtl/assets/js/date-time/bootstrap-timepicker.min.js" /></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-timepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>


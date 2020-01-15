<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

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
<?$q=injection_replace($_GET['q']);?>
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
			<h4 class="modal-title custom_align" id="Heading">مشاهده متن پیام خصوصی</h4>
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
			پیام های خصوصی </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/pm_archive.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">ثبت فیش بانکی</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/pm_archive.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			
			<div class="tab-pane <?if($edit_id=="")echo 'active'?> " id="tab1">
				<!-- #section:main/pm_archive.table -->
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
												<div class="row-fluid"> 
													<div class="col-xs-12">
													<div class="sr-title">
														<h3 class="sr-yellow">
														<i class="fa fa-search" aria-hidden="true"></i>
															جستجوی کاربر
														</h3>
														<hr>
														<P class="sr-blue">
														<i class="fa fa-question-circle" aria-hidden="true"></i>
															برای ثبت فیش بانکی باید ابتدا مشتری را انتخاب کرده تا فیش صادر شود ، برای این منظور از فرم زیر استفاده شود.
														</p>
													</div>
														<div class="form-group">
															<div class="form-group yepco col-md-7">
															<label class="pull-left col-xs-4"></label> 
															<div class="col-xs-2 sr_no_padding">
															<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
															</div>
															</div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="pull-left col-xs-4">نام کاربری *</label> 
																<input id="sr-username" name="sr-username" value="" type="text" placeholder="" class="col-xs-8 pull-right" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-field="sr-username">	
														  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="sr-username" data-fv-result="NOT_VALIDATED" style="display: none;">پر کردن اين فيلد الزامي است</small></div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4">نام </label> 
																<input id="sr-name" name="sr-name" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4"> نام خانوادگی</label> 
																<input id="sr-fname" name="sr-fname" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4"> کد ملی</label> 
																<input id="sr-id-number" name="sr-id-number" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
	
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4">تلفن همراه </label> 
																<input id="sr-phone-number" name="sr-phone-number" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4">ایمیل </label> 
																<input id="sr-email" name="sr-email" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
													
 
														
														<div class="form-group">
														  <div class="form-group col-md-7">
														  
															<label class="pull-left col-xs-4"></label> 
																<button class="btn btn-success sr_no_margin col-xs-2" style="padding:8px 0">
																	جستجو
																</button>
														  </div>
														</div>
													</div>												
												
													</div>
												</div>
												

				
				<!-- /section:main/pm_archive.table -->
			</div>
			
		</div>
		
												
												<br>
												<br>
												
					<table cellpadding="0" cellspacing="0" border="0" class="= table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								
								 
								<th>نام کاربری</th>
								<th>نام</th>
								<th>نام خانوادگی</th>
								<th>اعتبار فعلی</th>
								<th>ایمیل</th>
								<th>شماره تلفن (ها)</th>
								<th>آخرین مبلغ فیش ثبت شده</th>
								<th>تاریخ آخرین فیش</th>
								<th>عملیات</th>
							
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>
									<!-- Large modal -->
									<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#sr-payment-collapse" aria-expanded="false" aria-controls="collapseExample">ثبت فیش بانکی</button>
								</td>
							
							</tr>
						</tbody>
					</table>
					<div class="collapse" id="sr-payment-collapse">
												
 <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="margin-top:20px;">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">واریز به حساب</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">واریز به کارت</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
													<div class="col-xs-12">
													
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="pull-left">مبلغ *</label> 
																<input id="title" name="title" value="" type="text" placeholder="" class="col-xs-8 pull-right" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-field="title">	
														  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="title" data-fv-result="NOT_VALIDATED" style="display: none;">پر کردن اين فيلد الزامي است</small>
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">بانک </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label"> شماره فیش</label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
	
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">کد شعبه مبدا </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">تاریخ پرداخت </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">توضیحات </label> 
																<textarea class="form-control" rows="5" id="comment"></textarea>
														  </div>
														</div>
													
 
														
														<div class="form-group">
														  <div class="form-group col-md-7">
																<button class="btn btn-success">
																	ارسال
																</button>
														  </div>
														</div>
													</div>	
	</div>
    <div role="tabpanel" class="tab-pane" id="profile">
	<div class="col-xs-12">
													
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="pull-left">مبلغ *</label> 
																<input id="title" name="title" value="" type="text" placeholder="" class="col-xs-8 pull-right" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-field="title">	
														  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="title" data-fv-result="NOT_VALIDATED" style="display: none;">پر کردن اين فيلد الزامي است</small></div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">کارت بانک : </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label"> چهار رقم آخر کارت</label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
	
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">شماره پیگیری </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">تاریخ پرداخت </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">توضیحات </label> 
																<textarea class="form-control" rows="5" id="comment"></textarea>
														  </div>
														</div>
													
 
														
														<div class="form-group">
														  <div class="form-group col-md-7">
																<button class="btn btn-success">
																	جستجو
																</button>
														  </div>
														</div>
													</div>	
	</div>

  </div>

</div>
		
					</div>
					</div>
			
					
		
<script type="text/javascript">
	$(function () {
		$('.conchkNumber').click( function() {
			if($('.conchkNumber:checked').length == $('.conchkNumber').length) {
				$('.conchkSelectAll').prop('checked', true);
			}
			else {
				$('.conchkSelectAll').prop('checked', false);
			}
		});
	});
</script>

<script src="ajax_js/pm_archive.js"></script>
<?$_SESSION["del_item"]='del_archive_pm'?>

<script src="/yep_theme/default/rtl/assets/js/date-time/bootstrap-timepicker.min.js" /></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-timepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>


<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف سوال زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>

<style>
	input[type=checkbox].ace.ace-switch.ace-switch-6+.lbl::before {content: "\f023";}
	input[type=checkbox].ace.ace-switch.ace-switch-6:checked+.lbl::before {content: "\f09c";}
</style>
		

	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="pull-right" >
				<button type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#write" title="افزودن نظرسنجی"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" href="#write" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;margin-left: -12px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						افزودن نظرسنجی</a>
					</ul>
				</div>
			</li>
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			نظرسنجی </a></li>
		</ul>
		
		<div class="tab-content">	
			<div class="tab-pane in active" id="tab1">

				<div class="tt">	
					<div class="row-fluid">
						<div class="col-md-6">
						</div>
						<div class="col-md-6 yepco">
							<div class="form-group yepco">
								<form class="navbar-form navbar-left pull-right yepco" role="search">
									<input type="text" class="form-control search2" placeholder="جستجو">
								</form>
							</div>		
						</div>
					</div>
					
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								<th>سوال</th>
								<th>فعال / غیرفعال</th>
								<th>امکانات</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>علی</td>
								<td>
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox" />
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a class="blue" data-toggle="tab" href="#write" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-edit bigger-120" title="ویرایش"></i>
									</a>
									
									<a href="#" class="red" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
									</a>
								</td>
							</tr>
						
						</tbody>
					</table>
					<ul class="pagination">
						<li class="disabled">
							<a href="#">
								<i class="ace-icon fa fa-angle-double-right"></i>
							</a>
						</li>

						<li class="active">
							<a href="#">1</a>
						</li>

						<li>
							<a href="#">2</a>
						</li>

						<li>
							<a href="#">3</a>
						</li>

						<li>
							<a href="#">4</a>
						</li>

						<li>
							<a href="#">5</a>
						</li>

						<li>
							<a href="#">
								<i class="ace-icon fa fa-angle-double-left"></i>
							</a>
						</li>
					</ul>
				</div>	
			</div>
			
			<div class="tab-pane " id="write">
			
				<form class="form-horizontal" id="poll" name="poll" action="" role="form" method="post" enctype="multipart/form-data">
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						<div class="message-bar">
							<h2 style="color: #2a8bcb;">افزودن نظرسنجی / ویرایش</h2>
						</div>

						<div>
							<div class="messagebar-item-left">
								<a href="#tab1" data-toggle="tab" class="active">
									<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
									<b class="middle bigger-110">برگشت</b>
								</a>
							</div>
							 
							<div class="messagebar-item-right">
								<span class="inline btn-send-message">
									<button type="submit" class="btn btn-sm btn-primary no-border btn-white btn-round">
										<i class="ace-icon fa fa-check"></i>
										<span class="bigger-110">ذخيره</span>
									</button>
								</span>
							</div>
						</div>
					</div>
					</br>
					
					<fieldset>
						<div class="panel-body">
							<div class="alert alert-warning">نکته: شما می بایست پاسخ ها را بصورت صعودی در نظر بگیرید. بدین صورت که بیشترین امتیاز بالاترین گزینه می باشد.
							<p>با زدن دکمه + یک کادر باز می شود و هر گزینه از پاسخ خود را در داخل یک کادر بنویسید </p>
							</div>
							
							<div class="row-fluid">
								<div class="col-md-12">
									<div class="row-fluid">
										<div class="col-md-7">
											<div class="form-group">
												<label class="control-label" for="group_name">سوال</label> 
												<div class="form-group col-md-12">
													<textarea type="text" name="manage" id="manage" class="form-control" style="height:100px;"></textarea>									
												</div>
											</div>
										 
											<div class="form-group">
												<label>فعال / غیرفعال <br>
													<input name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox" />
													<span class="lbl"></span>
												</label>
											</div>
										</div>
										 
										<div class="col-md-5">
											<div class="form-group">
												<label class="control-label" for="group_name">پاسخ</label> 
												<div class="form-group col-md-12">
													<div class="control-group" id="fields">
														<div class="controls"> 
															<form role="form" autocomplete="off">
																<div class="entry input-group col-xs-3" style="width: 100%;">
																	<input class="form-control" name="fields" type="text" placeholder=""/>
																	<span class="input-group-btn">
																		<button class="btn btn-success btn-add" type="button" style="height:34px;width: 41px;">
																			<span class="glyphicon glyphicon-plus" style="top: -1px;right: -4px;"></span>
																		</button>
																	</span>
																</div>
															</form>
														<br>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
						
						<div class="panel-footer">
							<button type="submit" class="btn btn-primary" ><i class="ace-icon fa fa-check bigger-110"></i>ذخيره</button>	
						</div>
					</fieldset>
				</form>
			</div>
			
		</div>
	</div>
	
<script>
(function ($) {
    $(function () {

        var addFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
            var $formGroupClone = $formGroup.clone();

            $(this)
                .toggleClass('btn-success btn-add btn-danger btn-remove')
                .html('–');

            $formGroupClone.find('input').val('');
            $formGroupClone.find('.concept').text('Phone');
            $formGroupClone.insertAfter($formGroup);

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') <= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', true);
            }
        };

        var removeFormGroup = function (event) {
            event.preventDefault();

            var $formGroup = $(this).closest('.form-group');
            var $multipleFormGroup = $formGroup.closest('.multiple-form-group');

            var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');
            if ($multipleFormGroup.data('max') >= countFormGroup($multipleFormGroup)) {
                $lastFormGroupLast.find('.btn-add').attr('disabled', false);
            }

            $formGroup.remove();
        };

        var selectFormGroup = function (event) {
            event.preventDefault();

            var $selectGroup = $(this).closest('.input-group-select');
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();

            $selectGroup.find('.concept').text(concept);
            $selectGroup.find('.input-group-select-val').val(param);

        }

        var countFormGroup = function ($form) {
            return $form.find('.form-group').length;
        };

        $(document).on('click', '.btn-add', addFormGroup);
        $(document).on('click', '.btn-remove', removeFormGroup);
        $(document).on('click', '.dropdown-menu a', selectFormGroup);

    });
})(jQuery);
</script>	
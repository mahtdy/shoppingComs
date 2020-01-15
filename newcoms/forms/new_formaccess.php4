<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>


<form class="form-horizontal" id="accessform" action="" role="form" method="post" enctype="multipart/form-data">
<div class="modal fade" id="access" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header no-padding">
			<div class="table-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="white">&times;</span>
				</button>
				   تعریف دسترسی به فرم
			</div>
		</div>
		<div class="modal-body">
			<table  cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
				<thead>
					<tr>
						<th class="center">
							<label class="position-relative">
								<input type="checkbox" class="conchkSelectAll" />
								<span class="lbl"></span>
							</label>
						</th>
						<th>نام فرم</th>
						<th>شناسه</th>
					</tr>
				</thead>
				
				<tbody>			
					<tr>
						<td class="center">
							<label class="position-relative">
								<input type="checkbox" class="conchkNumber" />
								<span class="lbl"></span>
							</label>
						</td>
						<td>سفید</td>
						<td>21656</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="modal-footer ">
			 <button type="button" value="" id="btn_ok" data-dismiss="modal" class="btn btn-primary" ><span class="glyphicon glyphicon-ok-sign"></span> ذخیره</button>
		</div>
	</div>
	</div>
</div>
</form>

	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			ایجاد دسترسی برای کاربران </a></li>
		</ul>
		<div class="tab-content">
		
			<div class="tab-pane active" id="tab1">
		
				<div class="panel-body">
					<div class="tt">	
						<div class="row-fluid">
							<div class="col-md-6 yepco">
								
							</div>
							<div class="col-md-6">
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
									<th>نام کاربر</th>
									<th>نام کاربری</th>
									<th>ایمیل</th>
									<th>امکانات</th>
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>علی صمدی</td>
									<td>Ali</td>
									<td>ali@ali.ali</td>
									<td>
										<button class="btn btn-xs btn-success" data-title="access" data-toggle="modal" data-target="#access" data-placement="top" rel="tooltip">
											<i class="glyphicon glyphicon-list-alt bigger-105"></i>
										</button>
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
			</div>	

		</div>
	</div>	

<script type="text/javascript">
$(function () {	
	$(document).on('click', '.conbtnGetAll', function(event) {

        if($('.conchkNumber:checked').length) {
			var chkId = '';
			$('.conchkNumber:checked').each(function() {
				chkId += $(this).val() + ",";
			});
			chkId =  chkId.slice(0,-1);
			//alert(chkId);
			
			
			//$('input:sms_numbers1').val('20');
			//$('#sms_numbers1').val(chkId);
			$('#sms_numbers').val(chkId);
		}
        else {
          alert('موردي انتخاب نشده است');
        }
      });
	$('.conchkSelectAll').click( function() {
		$('.conchkNumber').prop('checked', $(this).is(':checked'));
    });
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
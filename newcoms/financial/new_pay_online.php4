<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>


<form class="form-horizontal" action="" method="post" name="delete50" id="delete50" enctype="multipart/form-data">	
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف آیتم زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>
</form>
		
	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="pull-right" >
				<button type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_list_money" title="افزودن درگاه"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" href="#add_list_money" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;margin-left: -12px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						افزودن درگاه</a>
					</ul>
				</div>
			</li>	
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			درگاه های پرداخت آنلاین </a></li>
			
		</ul>
		<div class="tab-content">
			<div class="tab-pane active" id="tab1">
		
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
								<th>نام بانک</th>
								<th>عنوان</th>
								<th>فعال / غیر فعال</th>
								<th>امکانات</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>ملت</td>
								<td>Mellat</td>
								<td class="center  ">
									<label>
										<input name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox">
										<span class="lbl"></span>
									</label>
								</td>
								<td>
									<a class="blue" href="#add_list_money" data-toggle="tab" style="font-size: 15px !important;"><i class="ace-icon fa fa-edit bigger-120"></i></a>
									<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
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
			
			<div class="tab-pane" id="add_list_money">
			
				<form class="form-horizontal" action="" method="post" name="add_weather" id="add_weather" enctype="multipart/form-data">
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						<div class="message-bar">
							<h2 style="color: #2a8bcb;">افزودن درگاه بانکی/ ویرایش</h2>
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
										<span class="bigger-110">ذخیره</span>
									</button>
								</span>
							</div>
						</div>
					</div>
					</br>
						
					<div class="page-body">
						<div class="container">
							<div class="col-md-6">
							
								<div class="form-group">
									<label class="col-sm-3 control-label">نام بانک</label>
									 <div class="form-group col-sm-9">
											<select class="form-control" name="contry">
												<option value="1">ملت</option>
												<option value="2">پارسیان</option>
												<option value="3">سامان</option>
												<option value="4">تجارت</option>
												<option value="5">ملی</option>
											</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">عنوان درگاه</label>
									<div class="form-group col-sm-9">
											<input type="text" name="dargah" id="dargah" class="form-control"/>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">توضیحات</label>
									 <div class="form-group col-sm-9">
											<textarea type="text" name="comment" id="comment" class="form-control" style="height:100px;"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-3 control-label">پارامتر1</label>
									 <div class="form-group col-sm-9">
												<input type="text" name="parametr1" id="parametr1" class="form-control" >
									</div>
								</div>
							
								<div class="form-group">
									<label class="col-sm-3 control-label">پارامتر2</label>
									<div class="form-group col-sm-9">
											<input type="text" name="parametr2" id="parametr2" class="form-control" >
									</div>
								</div>
							
								<div class="form-group">
									<label class="col-sm-3 control-label">پارامتر3</label>
									<div class="form-group col-sm-9">
											<input type="text" name="parametr3" id="parametr3" class="form-control" >
									</div>
								</div>
							
							</div>
						</div>
					</div>
					
					<div class="panel-footer">
							<button type="submit" class="btn btn-primary" ><i class="ace-icon fa fa-check bigger-110"></i>ذخيره</button>
					</div>
				</form>
				
			</div>
		</div>
	</div>
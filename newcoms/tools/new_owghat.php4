<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<form class="form-horizontal" id="delete_table" name="delete_table" action="" role="form" method="post" enctype="multipart/form-data"><fieldset>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتویات زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div></fieldset>
</form>

<form class="form-horizontal" action="" method="post" name="city_name" id="city_name" enctype="multipart/form-data">	
<div class="modal fade" id="city" tabindex="-1" role="dialog" aria-labelledby="city" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header no-padding">
			<div class="table-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="white">×</span>
				</button>
				&nbsp;&nbsp;&nbsp;شهر پیش فرض
			</div>
		</div>
		<div class="modal-body">
				<div class="form-group">
					<label class="col-sm-2 control-label">نام شهر</label>
					 <div class="col-sm-5">
							<select class="form-control">
								<option value="1">تهران</option>
								<option value="2">قزوین</option>
								<option value="3">مشهد</option>
								<option value="4">اصفهان</option>
							</select>
					</div>
				</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;ذخیره</button>
		</div>
	</div>
	</div>
</div>
</form>

		<div class="tabbable">
				<!--ul class="nav nav-tabs">
					<li class="pull-right" >
						<button type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span data-toggle="tab" href="#write" title="افزودن اوقات"><i class="ace-icon fa fa-plus bigger-110"></i></span>
						</button>
						<div class="collapse navbar-collapse" id="nav-collapse">
							<ul class="nav navbar-nav navbar-left">
							<a data-toggle="tab" href="#write" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;margin-left: -12px;">
								<i class="ace-icon fa fa-plus bigger-110"></i>
								افزودن اوقات</a>
							</ul>
						</div>
					</li>	
					<li class="pull-right">
						<button type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span data-toggle="modal" data-target="#city" href="#" title="شهر پیش فرض"><i class="ace-icon fa fa-pencil bigger-110"></i></span>
						</button>
						<div class="collapse navbar-collapse" id="nav-collapse">
							<ul class="nav navbar-nav navbar-left">
							<a data-toggle="modal" data-target="#city" href="#" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;margin-left: -20px;">
								<i class="ace-icon fa fa-pencil bigger-110"></i>
								شهر پيش فرض</a>
							</ul>
						</div>
					</li>	
					
					<li class="active"><a href="#tab1" data-toggle="tab">
					لیست شهرها </a></li>	
				</ul-->
				
				<div class="msheet tab-content">
	  
				<div class="secfhead">

					<div class="sectitle">
						<div class="icon"><span class="flaticon-file23" style=""></span></div>
						<div class="title"><p class="titr">لیست شهرها</p><p class="lead">توضیحات این بخش</p></div>
					</div>
					
					<div class="toolmenu">
						<ul>
							<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

							<li id="newpag" class="addicon">
								<a data-toggle="tab" href="#write" data-placement="bottom" title="افزودن اوقات" >
									<span class="flaticon-add149"></span>
								</a>
							</li>
							<li id="switchword">
								<a data-toggle="modal" data-target="#city" href="#" data-placement="bottom" title="شهر پیش فرض">
									<span class="flaticon-note35"></span>
								</a>
							</li>
							<li>
								<a  data-toggle="modal" data-target="#searching" data-placement="top"  title="جستجوی پیشرفته" >
									<span class="flaticon-search74"></span>
								</a>
							</li>
						</ul>
					</div>

				</div>
		
					<div class="tab-pane active" id="tab1">
						<div class="tt">	
							<div class="row-fluid">
								<!--div class="col-md-6 yepco">
								</div-->
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
										<th>نام شهر</th>
										<th>مختصات جغرافیایی</th>
										<th>مقدار اضافه</th>
										<th>امکانات</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>قزوین</td>
										<td>IRQA2323</td>
										<td></td>
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
					</div><!--tab1-->
					
					<div class="tab-pane" id="write">
					
						<form class="form-horizontal" id="new_pages" name="new_pages" action="" role="form" method="post" enctype="multipart/form-data">
							<div id="id-message-new-navbar" class="message-navbar clearfix">
								<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
									<span class="flaticon-verified9">
									</span>
								</a>
								<a href="newcoms.php?yep=new_owghat" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
									<span class="flaticon-left-arrow9">
									</span>
								</a>
								<!--div class="message-bar">
									<h2 style="color: #2a8bcb;">افزودن اوقات شرعی/ ویرایش</h2>
								</div-->
								<!--div>
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
								</div-->
							</div>
							</br>
						
							<div class="panel-body">
								<fieldset> 
									<div class="form-group">
										<label class="col-sm-2 control-label">نام کشور</label>
										 <div class="col-sm-10">
											<div class="form-group col-sm-6">
												<select class="form-control" name="contry">
													<option value="1">ایران</option>
													<option value="2">عراق</option>
													<option value="3">سوریه</option>
													<option value="4">ترکیه</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">نام استان</label>
										 <div class="col-sm-10">
											<div class="form-group col-sm-6">
												<select class="form-control" name="ostan">
													<option value="1">تهران</option>
													<option value="2">قزوین</option>
													<option value="3">خراسان رضوی</option>
													<option value="4">اصفهان</option>
												</select>
											</div>
										</div>
									</div>
							
									<div class="form-group">
										<label class="col-sm-2 control-label">نام شهر</label>
										 <div class="col-sm-10">
											<div class="form-group col-sm-6">
												<select class="form-control" name="city">
													<option value="1">تهران</option>
													<option value="2">قزوین</option>
													<option value="3">مشهد</option>
													<option value="4">اصفهان</option>
												</select>
											</div>
										</div>
									</div>
							
									<div class="form-group">
										<label class="col-sm-2 control-label">مختصات جغرافیایی</label>
										 <div class="col-sm-10">
											<div class="form-group col-sm-6">
													<input type="text" name="mokhtasat" id="mokhtasat" class="form-control" >
											</div>
										</div>
									</div>
						
									<div class="form-group">
										<label class="col-sm-2 control-label">مقدار اضافه</label>
										<div class="col-sm-10">
										<div class="form-group col-sm-6">
												<input type="text" name="add_amount" id="add_amount" class="form-control" >
										</div>
										</div>
									</div>
									
								</fieldset>
							</div>	
							<div class="panel-footer bttools">
								<button type="submit" class="btn btn-primary" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
							</div>
						</form>
					
					</div>
				</div>
		</div>
<style>
@media (min-width: 767px){
.panel-body{
  padding-left: 100px;
  padding-right: 100px;
  padding-top: 65px;
}
}
@media (max-width: 768px){
.panel-body{
padding-top: 70px;
}}
</style>		
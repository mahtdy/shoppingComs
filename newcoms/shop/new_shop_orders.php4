<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
			 $(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {    
			   $(this).val($(this).val().replace(/[^\d].+/, ""));
				if ((event.which < 48 || event.which > 57)) {
					event.preventDefault();
				}
			});
		});
</script>

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
	  <!--ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			لیست سفارشات </a></li>
	  </ul-->
		<div class="msheet tab-content">
	  
		<div class="secfhead">

			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">لیست سفارشات</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

		</div>
			<div class="tab-pane active" id="tab1">
		
				<div class="tt">	
					<div class="row-fluid">
						<!--div class="col-md-6 yepco">
							
						</div-->
						<div class="col-md-10">
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
								<th>شناسه سفارش</th>
								<th>خریدار</th>
								<th>تاریخ</th>
								<th>جمع صورتحساب</th>
								<th>وضعیت پرداخت</th>
								<th>روش ارسال</th>
								<th>امکانات</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>15662</td>
								<td>علی کاظمی</td>
								<td>1393/01/21</td>
								<td>275,250</td>
								<td>درگاه اینترنتی</td>
								<td>پستی</td>
								<td>
									<a class="green" href="#add_list_money" data-toggle="tab" style="font-size: 15px !important;"><i class="ace-icon fa fa-list bigger-120"></i></a>
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
			
				<form class="form-horizontal" id="add_list" action="" role="form" method="post" enctype="multipart/form-data">
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						<a href="newcoms.php?yep=new_weather" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
						</a>
						<!--div class="message-bar">
							<h2 style="color: #2a8bcb;">جزئیات</h2>
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
										<span class="bigger-110">OK</span>
									</button>
								</span>
							</div>
						</div-->
					</div>
					</br>
			
					<div class="page-content-area">
						<div class="page-header">
							<h1 style="float:left">سفارش شماره 123</h1><br><br>
						</div>
						
								<div class="row">
									<div class="col-md-8">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title">محصول</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
															
													<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
														<thead>
															<tr>
																<th>نام محصول</th>
																<th>قیمت</th>
																<th>تعداد</th>
																<th>تخفیف</th>
																<th>جمع</th>
																<th>امکانات</th>
																
															</tr>
														</thead>
														<tbody>
															<tr style="border:solid 1px #e4e6e9;">
																<td>کیف دستی</td>
																<td>250,000</td>
																<td>1</td>
																<td>5,000</td>
																<td>245,000</td>
																<td>
																	<a class="red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
																	<i class="ace-icon fa fa-trash-o bigger-120"></i></a>
																</td>
															</tr>
															
															<tr style="border:solid 1px #e4e6e9;">
																<td style="border: none;">مالیات بر ارزش افزوده</td>
																<td style="border: none;"></td>
																<td style="border: none;"></td>
																<td style="border: none;"></td>
																<td>2,250</td>
																<td></td>
															</tr>
														
															<tr style="border:solid 1px #e4e6e9;">
																<td style="border: none;">جمع کل</td>
																<td style="border: none;"></td>
																<td style="border: none;"></td>
																<td style="border: none;"></td>
																<td>247,250</td>
																<td></td>
															</tr>
														
														</tbody>
													</table>
														
												</div>
											</div>
										</div>
									</div>	
									
									<div class="col-md-4">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title">خریدار</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
															
													<p><img alt="Bob's Avatar" class="itemdiv dialogdiv thumbnail" src="/assets/avatars/user.jpg" style="display: inline;padding: 0px;">
														<span class="msg-title">
															<a href="/newcoms.php?dll=new_manage_users&la=fa">بهناز مطلبی</a>
														</span>
														<span class="msg-body">
															behnaz@yahoo.com
														</span>
													</p> 
													<p>تاریخ ثبت نام : 1392/10/25</p>
													<p>مجموع خریدها: 245,000</p>
													<p>تعداد سفارشات: 2</p>
													<p>آدرس: قزوین، مینودر</p>
													<p>نوع عضویت: طلایی</p>
														
												</div>
											</div>
										</div>
									</div>
								</div>
						
								<div class="row">
									<div class="col-md-8">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title">روش ارسال / پرداخت</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
														
													<p>	<i class="ace-icon fa fa-caret-right green"></i>
														 روش ارسال: پستی / دانلود
													</p>
													<p>	<i class="ace-icon fa fa-caret-right green"></i>
														 روش پرداخت: درگاه بانکی / ثبت فیش / پرداخت در محل
													</p>
													<p>	<i class="ace-icon fa fa-caret-right green"></i>
														 بانک : ملت
													</p>
													
													<p>	<i class="ace-icon fa fa-caret-right green"></i>
														 شناسه پرداخت: 25236541
													</p>
													
													<p>	<i class="ace-icon fa fa-caret-right green"></i>
														 تاریخ پرداخت: 12:15 1393/02/30
													</p>
														
												</div>
											</div>
										</div>
									</div>	
									
									<div class="col-md-4">
										<div class="widget-box">
											<div class="widget-header widget-header-flat">
												<h4 class="widget-title">سفارش</h4>
											</div>

											<div class="widget-body">
												<div class="widget-main">
															
													<p>تاریخ سفارش: 22:10 1393/05/16</p>
				
													<p>کد رهگیری: 256987452322</p>
				
													<p>وضعیت سفارش: 
														<select>
															<option>معلق</option>
															<option>آماده به ارسال</option>
															<option>ارسال شده</option>
															<option>تحویل شده</option>
															<option>برگشتی</option>
														</select>
													</p>
				
												</div>
											</div>
										</div>
									</div>
								</div>
					</div>
				</form>
				
			</div>
		</div>	
	</div>
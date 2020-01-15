<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link rel="stylesheet" href="/new_template/ddddddddddddd/<?=$dir?>/css/bootstrap-iconpicker.min.css"/>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<br>
<div class="tabbable">
	<div class="msheet tab-content">
		<div class="secfhead">
			<!-- #section:news/newstext.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-text150" style=""></span>
				</div>
				<div class="title"><p class="titr">گزارش گردش حساب</p><p class="lead">توضیحات این بخش</p>
				</div>
			</div>
			<!-- /section:news/newstext.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>
		</div>

		<div class="tab-pane <?if($edit_id=="") echo 'active'?>" id="tab1" style="background-color: #fff;">

			<div class="panel panel-default">
				<div class="panel-body" style="padding-bottom: 0px">
					<b>لیست مشتریان</b>
					<hr style="margin: 10px;">
					<div class="table-responsive">
						<table class="table table-condensed" style="margin-bottom: 0px;">
							<thead>
								<tr>
									<th>نام کاربری</th>
									<th>نام</th>
									<th>نام خانوادگی</th>
									<th>اعتبار فعلی</th>
									<th>ایمیل</th>
									<th>شماره تلفن (ها)</th>
									<th>آخرین مبلغ فیش ثبت شده</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>3</td>
									<td>احسان</td>
									<td>فاضل</td>
									<td>125000</td>
									<td>info@gmail.com</td>
									<td>12564885 <br> 64545553</td>
									<td>352000</td>
									<td><button class="btn btn-default" style="float: left;"><i class="fa fa-edit"></i> ثبت فیش بانکی </button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="tabbable">
				<ul class="nav nav-tabs">
					<li class="<?if($tab_number!=1) echo 'active'?>"><a href="#tab21" data-toggle="tab">فیش های ثبت شده</a></li>
					<li class="<?if($tab_number==1) echo 'active'?>"><a href="#tab2" data-toggle="tab">پرداخت های آنلاین</a></li>
					<li class="<?if($tab_number==1) echo 'active'?>"><a href="#tab3" data-toggle="tab">شارژهای دستی</a></li>
					<li class="<?if($tab_number==1) echo 'active'?>"><a href="#tab4" data-toggle="tab">ریز گردش حساب</a></li>
				</ul>
				<div class="tab-content" style="min-height: 0px;padding: 5px;">
					<div class="tab-pane <?if($tab_number!=1) echo 'active'?>" id="tab21">
						<div class="tt">
							<div class="row-fluid">
								<div class="col-md-10">
									<div class="form-group yepco">
										<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
											<input type="hidden" name="yep"  value="new_newstext">
											<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
											<input type="hidden" name="site_filter" value="<?=$site_filter?>">
											<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
											<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
										</form>

										<div class="pull-right btn-default btn-xs yepco">
											<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
										</div>
										<div class="pull-right btn-default btn-xs yepco">
											<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
							<thead>
							<tr>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>
								</th>
								<th>شماره فیش</th>
								<th>نام کاربری</th>
								<th>نام</th>
								<th>نام خانوادگی</th>
								<th>ثبت کنننده</th>
								<th>بانک</th>
								<th>میزان اعتبار مشتری</th>
								<th>تاریخ و ساعت</th>
								<th>واریز به</th>
								<th>مبلغ</th>
								<th>وضعیت</th>
								<th>شماره پیگیری</th>
								<th>امکانات</th>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td class="center">
										<label class="position-relative">
											<input id="<?=$id?>" type="checkbox" class="conchkNumber" />
											<span class="lbl"></span>
										</label>
									</td>
									<td>5456454</td>
									<td>fazel-a</td>
									<td>احسان</td>
									<td>فاضل</td>
									<td>....</td>
									<td>ملت</td>
									<td>1250000</td>
									<td>10:25 و 5/12/93</td>
									<td>شبای ملت</td>
									<td>25800</td>
									<td>
										<span data-value="<?=$RS1["status"]?>" class="status_news editable editable-click" data-pk="<?=$RS1["id"]?>" >
										<?if($RS1["status"]==1){echo 'منتشر شده';}else{echo 'پيش نويس';}?></span>
									</td>
									<td>5698522</td>
									<td><a id="<?=$id?>" class="edit_menu blue icon"  href="newcoms.php?yep=new_ads_turnover&edit_id=<?=$id?>">
											<i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
										</a>
										<a href="#" id="<?=$id?>" class="red del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
											<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
										</a>
									</td>
								</tr>

							</tbody>
						</table>

					</div>

					<div class="tab-pane <?if($tab_number==1) echo 'active'?>" id="tab2">
						
						<div class="tt">
							<div class="row-fluid">
								<div class="col-md-8">
									<div class="form-group yepco">
										<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
											<input type="hidden" name="yep"  value="new_newstext">
											<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
											<input type="hidden" name="site_filter" value="<?=$site_filter?>">
											<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
											<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
										</form>

										<div class="pull-right btn-default btn-xs yepco">
											<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
										</div>
										<div class="pull-right btn-default btn-xs yepco">
											<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="margin-top: 8px;float:left">
										<button class="btn btn-success btn-sm">
											<i class="glyphicon glyphicon-export"></i> خروجی اکسل
										</button>

										<a type="button" href="#" class="btn btn-primary btn-sm" id="filter1" data-placement="bottom" data-toggle="filter1" data-placement="bottom" data-html="true">
											فیلتر تاریخ
										</a>
									</div>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
							<thead>
							<tr>
								<th>ردیف</th>
								<th>شماره پرداخت</th>
								<th>کد پرداخت</th>
								<th>مبلغ</th>
								<th>تاریخ</th>
								<th>ساعت</th>
								<th>دروازه پرداخت</th>
								<th>وضعیت پرداخت</th>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>565461</td>
									<td>1598336665874</td>
									<td>90000 ریال</td>
									<td>6 شهریور 95</td>
									<td>10:25</td>
									<td>ملت</td>
									<td>تایید شده</td>
								</tr>
								<tr>
									<td>1</td>
									<td>565461</td>
									<td>1598336665874</td>
									<td>90000 ریال</td>
									<td>6 شهریور 95</td>
									<td>10:25</td>
									<td>ملت</td>
									<td>تایید نشده</td>
								</tr>
							</tbody>
						</table>
						
					</div>

					<div class="tab-pane <?if($tab_number==1) echo 'active'?>" id="tab3">

						<div class="tt">
							<div class="row-fluid">
								<div class="col-md-8">
									<div class="form-group yepco">
										<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
											<input type="hidden" name="yep"  value="new_newstext">
											<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
											<input type="hidden" name="site_filter" value="<?=$site_filter?>">
											<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
											<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
										</form>

										<div class="pull-right btn-default btn-xs yepco">
											<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
										</div>
										<div class="pull-right btn-default btn-xs yepco">
											<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group" style="margin-top: 8px;float:left">
										<button class="btn btn-success btn-sm">
											<i class="glyphicon glyphicon-export"></i> خروجی اکسل
										</button>

										<a type="button" href="#" class="btn btn-primary btn-sm" id="filter2" data-placement="bottom" data-toggle="filter2" data-placement="bottom" data-html="true">
											فیلتر تاریخ
										</a>
									</div>
								</div>
							</div>
						</div>
						<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
							<thead>
							<tr>
								<th>ردیف</th>
								<th>ثبت کننده</th>
								<th>شرح</th>
								<th>مبلغ تراکنش</th>
								<th>تاریخ</th>
								<th>ساعت</th>
								<th>مبلغ کل اعتبار</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>1</td>
								<td>فاضل نیارکی</td>
								<td>افزایش اعتبار بابت افزایش نقدی</td>
								<td>11125845</td>
								<td>6 شهریور 95</td>
								<td>10:25</td>
								<td>1500000 واحد پول</td>
							</tr>

							</tbody>
						</table>

					</div>

					<div class="tab-pane <?if($tab_number==1) echo 'active'?>" id="tab4">
						tab4
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- tooltip date tab2-->
<div class="hide" id="filterpop1">
	<form class="form-inline" role="form" method="post" action="#" id="formpopover1" name="formpopover1">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label col-md-1">الان</label>
				<div class="form-group col-md-4">
					<div class="input-group">
						<input type="text" class="form-control" name="datepicker1" id="datepicker1" placeholder="شروع نمایش"/>
					</div>
				</div>

				<label class="control-label col-md-1">تا</label>
				<div class="form-group col-md-4">
					<div class="input-group">
						<input type="text" class="form-control" name="datepicker2" id="datepicker2" placeholder="پایان نمایش"/>
					</div>
				</div>

				<div class="form-group col-md-2">
					<button type="submit" id="subtab2" name="subtab2" class="btn btn-success">نمایش</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!-- tooltip date tab3-->
<div class="hide" id="filterpop2">
	<form class="form-inline" role="form" method="post" action="#" id="formpopover2" name="formpopover2">
		<div class="col-md-12">
			<div class="form-group">
				<label class="control-label col-md-1">الان</label>
				<div class="form-group col-md-4">
					<div class="input-group">
						<input type="text" class="form-control" name="datepicker3" id="datepicker3" placeholder="شروع نمایش"/>
					</div>
				</div>

				<label class="control-label col-md-1">تا</label>
				<div class="form-group col-md-4">
					<div class="input-group">
						<input type="text" class="form-control" name="datepicker4" id="datepicker4" placeholder="پایان نمایش"/>
					</div>
				</div>

				<div class="form-group col-md-2">
					<button type="submit" id="subtab2" name="subtab2" class="btn btn-success">نمایش</button>
				</div>
			</div>
		</div>
	</form>
</div>
<style>
	.tab-content{
		padding:20px !important
	}
	.popover{
		min-width: 455px;
	}
	.ui-widget-content {
		z-index: 10000 !important;
	}
	.popover.bottom {
		left: 0px !important;
		height: 53px;
	}
	.popover.bottom>.arrow{
		left: 12% !important;
	}
</style>

<script>
	$(document).ready(function () {
		///////////// tooltip tab 2
		$("[data-toggle=filter1]").popover({
			html:true,
			content: function() {
				return $('#filterpop1').html();
			}
		}).on('shown.bs.popover', function () {
			$('#datepicker1').datepicker({
				changeMonth: true,
				changeYear: true,
				isRTL: true,
				dateFormat: "yy/mm/dd"
			});
			$('#datepicker2').datepicker({
				changeMonth: true,
				changeYear: true,
				isRTL: true,
				dateFormat: "yy/mm/dd"
			});
		});
		/////////// tooltip tab3
		$("[data-toggle=filter2]").popover({
			html:true,
			content: function() {
				return $('#filterpop2').html();
			}
		}).on('shown.bs.popover', function () {
			$('#datepicker3').datepicker({
				changeMonth: true,
				changeYear: true,
				isRTL: true,
				dateFormat: "yy/mm/dd"
			});
			$('#datepicker4').datepicker({
				changeMonth: true,
				changeYear: true,
				isRTL: true,
				dateFormat: "yy/mm/dd"
			});
		});
	});
</script>

<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>

<!-- Bootstrap-Iconpicker Iconset for Font Awesome -->
	<script type="text/javascript" src="/new_template/ddddddddddddd/<?=$dir?>/js/iconset-fontawesome-4.1.0.min.js"></script>
	<!-- Bootstrap-Iconpicker -->
	<script type="text/javascript" src="/new_template/ddddddddddddd/<?=$dir?>/js/bootstrap-iconpicker.js"></script>
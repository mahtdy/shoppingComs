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

<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>

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
				<div class="title"><p class="titr">حساب مشتریان</p><p class="lead">توضیحات این بخش</p>
				</div>
			</div>
			<!-- /section:news/newstext.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
					<li>
						<a  data-toggle="modal" data-target="#searching" data-placement="top" title="جستجوی پیشرفته" >
							<span class="flaticon-search74"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="tab-pane <?if($edit_id=="") echo 'active'?>" id="tab1" style="background-color: #EFF3F8;">
			<!-- #section:news/newstext.table -->
			<div class="tt">
				<div class="row-fluid">
					<div class="col-md-10">
						<div class="form-group yepco">
							<form action="" method="get" class="navbar-form navbar-left pull-left yepco" role="search">
								<input type="hidden" name="yep"  value="new_newstext">
								<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
								<input type="hidden" name="site_filter" value="<?=$site_filter?>">
								<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
								<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
							</form>
							<div class="pull-right btn-default btn-xs yepco">
								<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
							</div>
							<div class="pull-left btn-xs yepco">
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
					<th>ردیف</th>
					<th>نام کاربری</th>
					<th>نام و نام خانوادگی</th>
					<th>فیش های واریزی</th>
					<th>پرداخت های آنلاین</th>
					<th>شارژهای دستی</th>
					<th>آخرین شارژ</th>
					<th>تاریخ</th>
					<th>توسط</th>
					<th>اعتبار مصرف شده</th>
					<th>مانده اعتبار</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td class="center">
						<label class="position-relative">
							<input id="pay1" type="checkbox" class="conchkNumber" />
							<span class="lbl"></span>
						</label>
					</td>
					<td>3</td>
					<td>fazel-a</td>
					<td>comsroot</td>
					<td>main</td>
					<td>0</td>
					<td></td>
					<td>7/7/95</td>
					<td>
						<span data-value="<?=$RS1["status"]?>" class="status_news editable editable-click" data-pk="<?=$RS1["id"]?>" >
						<?if($RS1["status"]==1){echo 'منتشر شده';}else{echo 'پيش نويس';}?></span>
					</td>
					<td>عقیلی</td>
					<td>1000</td>
					<td>10000</td>
					<td><a id="<?=$id?>" class="edit_menu green icon"  href="/newcoms.php?yep=new_ads_turnover">
							<i class="glyphicon glyphicon-credit-card" title="مشاهده لیست"></i>
						</a>
						<a href="#" id="<?=$id?>" class="blue del_menu icon">
							<i class="flaticon-add149" title="افزودن"></i>
						</a>
						<a href="#" id="<?=$id?>" class="red del_menu icon" >
							<i class="glyphicon glyphicon-download" title="دانلود"></i>
						</a>
					</td>
				</tr>
				</tbody>
			</table>
			<!-- /section:news/newstext.table -->
		</div>

	</div>
</div>

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


<script type="text/javascript">
	$(function () {
		//////////////////////// select checkbox
		$('.conchkNumber').click( function() {
			if($('.conchkNumber:checked').length == $('.conchkNumber').length) {
				$('.conchkSelectAll').prop('checked', true);
			}
			else {
				$('.conchkSelectAll').prop('checked', false);
			}
		});
		$('.conchkSelectAll').click( function() {
			if($('.conchkSelectAll:checked').length == $('.conchkSelectAll').length){
				$('.conchkNumber').prop('checked', true);
			}
			else {
				$('.conchkNumber').prop('checked', false);
			}
		});
		//////////////////////////// end select checkbox
		//////////////////////////// editable
		$.fn.editable.defaults.mode = 'inline';
		$('.status_news').editable({
			type: 'select',
			name:'change_status_news',
			url: '/New_ajax.php',
			value:$("#x_editable_val").val(),
			source:"{1: 'منتشر شده',0: 'پيش نويس'}",
			ajaxOptions: {
				type: 'get',
			},
			error: function(response) {
				//alert(response);
			}
		});
		//////////////////////////////// end editable
	});
</script>

<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>
<!-- Bootstrap-Iconpicker Iconset for Font Awesome -->
<script type="text/javascript" src="/new_template/ddddddddddddd/<?=$dir?>/js/iconset-fontawesome-4.1.0.min.js"></script>
<!-- Bootstrap-Iconpicker -->
<script type="text/javascript" src="/new_template/ddddddddddddd/<?=$dir?>/js/bootstrap-iconpicker.js"></script>
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
				<div class="title"><p class="titr">لیست پرداخت های اینترنتی</p><p class="lead">توضیحات این بخش</p>
				</div>
			</div>
			<!-- /section:news/newstext.head -->
			<div class="toolmenu">
				<ul>
				<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

				<li class="helpicon" style="margin-top: 6px;">
					<a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن خبر جدید" >
						<span class="glyphicon glyphicon-download"></span>
					</a>
				</li>
				 
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
							<div class="pull-left btn-xs yepco">
								<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group yepco" style="margin-top: 8px;float:left">
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
						<th class="center">
							<label class="position-relative">
							<input type="checkbox" class="conchkSelectAll" />
							<span class="lbl"></span>
							</label>
						</th>
						<th>ردیف</th>
						<th>شماره پرداخت</th>
						<th>پرداخت کننده</th>
						<th>کد پرداخت</th>
						<th>مبلغ</th>
						<th>تاریخ</th>
						<th>ساعت</th>
						<th>دروازه پرداخت </th>
						<th>کد سفارش</th>
						<th>وضعیت پرداخت</th>
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
						<td class="center">3</td>
						<td class="center">1565765323</td>
						<td class="center">comsroot</td>
						<td class="center">main</td>
						<td class="center">12500</td>
						<td class="center">12/02/95</td>
						<td class="center">24:45</td>
						<td class="center"><a href="#">ملت</a></td>
						<td class="center">#563</td>
						<td class="center">موفق</td>
					</tr>
					<tr>
						<td class="center">
							<label class="position-relative">
							<input id="pay1" type="checkbox" class="conchkNumber" />
							<span class="lbl"></span>
							</label>
						</td>
						<td class="center">3</td>
						<td class="center">1565765323</td>
						<td class="center">comsroot</td>
						<td class="center">main</td>
						<td class="center">12500</td>
						<td class="center">12/02/95</td>
						<td class="center">24:45</td>
						<td class="center"><a href="#">ملت</a></td>
						<td class="center">#563</td>
						<td class="center">موفق</td>
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
		$('.conchkSelectAll').click( function() {
			if($('.conchkSelectAll:checked').length == $('.conchkSelectAll').length){
				$('.conchkNumber').prop('checked', true);
			}
			else {
				$('.conchkNumber').prop('checked', false);
			}
		});
	});

	$(document).ready(function () {
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

		<!-- Bootstrap-Iconpicker Iconset for Font Awesome -->
	<script type="text/javascript" src="/new_template/ddddddddddddd/<?=$dir?>/js/iconset-fontawesome-4.1.0.min.js"></script>
	<!-- Bootstrap-Iconpicker -->
	<script type="text/javascript" src="/new_template/ddddddddddddd/<?=$dir?>/js/bootstrap-iconpicker.js"></script>
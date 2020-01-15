
<div class="row">
	<div class="col-md-7"></div>
	<div class="col-md-5">
		<div class="form-group" style="padding-bottom:0px;float:left">
			<a type="button" href="#" class="btn btn-primary btn-sm" id="filter" data-placement="bottom" data-toggle="filter" data-placement="bottom" data-html="true" >
				فیلتر تاریخ 
			</a>
			<button class="btn btn-success btn-sm">
				<i class="glyphicon glyphicon-export"></i> خروجی اکسل 
			</button>
		</div>
	</div>
</div>
	
<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<th>ردیف</th>
			<th>شرح</th>
			<th>مبلغ تراکنش</th>
			<th>تاریخ</th>
			<th>ساعت</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>1</td>
			<td>مالیات بر ارزش افزوده 8 درصد</td>
			<td>7,380</td>
			<td>شنبه 1 آذر 1395</td>
			<td>18:30:25</td>
		</tr>
		
		<tr>
			<td>2</td>
			<td>شارژ دستی حساب</td>
			<td>8,880</td>
			<td>شنبه 1 آذر 1395</td>
			<td>16:10:02</td>
		</tr>
		
		<tr>
			<td>3</td>
			<td>مالیات بر ارزش افزوده 8 درصد</td>
			<td>350</td>
			<td>شنبه 1 آذر 1395</td>
			<td>8:36:35</td>
		</tr>

		<tr>
			<td>4</td>
			<td>شارژ دستی حساب</td>
			<td>11,360</td>
			<td>سه شنبه 25 دی 1394</td>
			<td>10:45:59</td>
		</tr>

		<tr>
			<td>5</td>
			<td>برگشت پول به حساب</td>
			<td>120,300</td>
			<td>پنج شنبه 1 مهر 1394</td>
			<td>10:20:31</td>
		</tr>

	</tbody>
</table>

<ul class="pagination" style="padding-right: 0;">
	<li class="disabled">
		<a href="#">
			<i class="ace-icon fa fa-angle-double-left"></i>
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
			<i class="ace-icon fa fa-angle-double-right"></i>
		</a>
	</li>
</ul>

<div class="alert alert-info" role="alert">شما از تاریخ 1/10/94 تا 30/11/94 صورت حسابی ندارید</div>

<div class="hide" id="filterpop">
<form class="form-inline" role="form" method="post" action="#" id="formpopover" name="formpopover">
	<div class="col-md-12">
		<div class="form-group">
			<label class="control-label col-md-1">از</label>
			<div class="form-group col-md-4">
				<div class="input-group">
					<input type="text" class="form-control"  name="datepicker1" id="datepicker1" placeholder="شروع نمایش"/>
				</div>
			</div>
        
			<label class="control-label col-md-1">تا</label>
			<div class="form-group col-md-4">
				<div class="input-group">
					<input type="text" class="form-control" name="datepicker2" id="datepicker2" placeholder="پایان نمایش"/>
				</div>
			</div>
			
			<div class="form-group col-md-2">
				<button type="submit" id="subtab1" name="subtab1" class="btn btn-success">نمایش</button>
			</div>
		</div>
	</div>
</form>
</div>

<style>	
.popover{
	min-width: 455px;	
}
.ui-widget-content {
    z-index: 10000 !important;
}
</style> 

<script>
$(document).ready(function () {
	$("[data-toggle=filter]").popover({
		html: true,
		content: function() {
			return $('#filterpop').html();
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
});
</script>
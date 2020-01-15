
<div class="row">
	<div class="col-md-7"></div>
	<div class="col-md-5">
		<div class="form-group" style="padding-bottom:0px;float:left">
			<a type="button" href="#" class="btn btn-primary btn-sm" id="filter2" data-placement="bottom" data-toggle="filter2" data-placement="bottom" data-html="true">
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
			<th>شماره پرداخت</th>
			<th>کد پرداخت</th>
			<th>مبلغ</th>
			<th>تاریخ</th>
			<th>ساعت</th>
			<th>دروازه پرداخت</th>
			<th>وضعیت پرداخت</th>
			<th></th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>1</td>
			<td>254851</td>
			<td>lkldsjujpwekr[vkdf</td>
			<td>85,254 ریال</td>
			<td>29/12/94</td>
			<td>18:30:25</td>
			<td>Mellat</td>
			<td>تایید نشده</td>
			<td><a href="#">بررسی تایید پرداخت</a></td>
		</tr>
		
		<tr>
			<td>2</td>
			<td>699456</td>
			<td>fghtrttukjmhnvnn</td>
			<td>7,380 ریال</td>
			<td>29/12/94</td>
			<td>18:30:25</td>
			<td>Mellat</td>
			<td>تایید نشده</td>
			<td><a href="#">بررسی تایید پرداخت</a></td>
		</tr>
		
		<tr>
			<td>3</td>
			<td>983265</td>
			<td>olkelmnbhdklggg</td>
			<td>222,653 ریال</td>
			<td>29/12/94</td>
			<td>18:30:25</td>
			<td>Mellat</td>
			<td>تایید نشده</td>
			<td><a href="#">بررسی تایید پرداخت</a></td>
		</tr>
		
		<tr>
			<td>4</td>
			<td>9898956</td>
			<td>wewkljkigldddd</td>
			<td>7,380 ریال</td>
			<td>29/12/94</td>
			<td>18:30:25</td>
			<td>Mellat</td>
			<td>تایید نشده</td>
			<td><a href="#">بررسی تایید پرداخت</a></td>
		</tr>
		
		<tr>
			<td>5</td>
			<td>1216964</td>
			<td>dfgdfljekrnmfm</td>
			<td>1,588 ریال</td>
			<td>29/12/94</td>
			<td>18:30:25</td>
			<td>Mellat</td>
			<td>تایید نشده</td>
			<td><a href="#">بررسی تایید پرداخت</a></td>
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
</style> 

<script>
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

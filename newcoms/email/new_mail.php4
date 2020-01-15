<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
	
<link rel="stylesheet" href="/yep_theme/default/rtl/css/magnific-popup.css">
<script src="/yep_theme/default/rtl/js/jquery.magnific-popup.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>
	
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>

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
   
    $('#e2').select2({
        data: [
        ],
        allowClear: true,
        multiple: true,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
    
	$("#sel").change(function () {
	//alert($(this).val());
		$.ajax({
			type:'POST',
			url:'/Pro_ajax_message.php',
			data:"action=show_tem&id="+$(this).val(),
			success: function(result){
			$('#show_temp').val(result);
			}
		});//alert('dd');
	});    
});
</script>
	
<script>
	 $(function () {   
		 $("#star3").on('click', function(e) {
			$("#star3").toggleClass("fa-star-o");
			 // $("#star3").removeClass('fa-star').addClass('fa-star-o');       
		 });
		 $("#star2").on('click', function(e) {
			$("#star2").toggleClass("fa-star-o");
			 // $("#star2").removeClass('fa-star').addClass('fa-star-o');       
		 });
		 $("#star1").on('click', function(e) {
			$("#star1").toggleClass("fa-star-o");
			 // $("#star1").removeClass('fa-star').addClass('fa-star-o');       
		 });
		 $("#star").on('click', function(e) {
			$("#star").toggleClass("fa-star-o");
			 // $("#star").removeClass('fa-star').addClass('fa-star-o');       
		 });
		 $("#star4").on('click', function(e) {
			$("#star4").toggleClass("fa-star-o");
			  //$("#star4").removeClass('fa-star').addClass('fa-star-o');
		 });
		 $("#star5").on('click', function(e) {
			$("#star5").toggleClass("fa-star-o");
			  //$("#star5").removeClass('fa-star').addClass('fa-star-o');
		 });
	});
</script>
<script>
$(document).ready(function(){
$("#drop4").hide();
$(".conchkNumber").click(function() {
    if($(this).is(":checked")) {
        $("#drop4").show();
    } else {
        $("#drop4").hide();
    }
});
$("#drop4").hide();
$(".conchkSelectAll").click(function() {
    if($(this).is(":checked")) {
        $("#drop4").show();
    } else {
        $("#drop4").hide();
    }
});
});
</script>
<script>
$(document).ready(function(){
$("#drop10").hide();
$(".conchkNumber_2").click(function() {
    if($(this).is(":checked")) {
        $("#drop10").show();
    } else {
        $("#drop10").hide();
    }
});
$("#drop10").hide();
$(".conchkSelectAll_2").click(function() {
    if($(this).is(":checked")) {
        $("#drop10").show();
    } else {
        $("#drop10").hide();
    }
});
});
</script>
<script>
$(document).ready(function(){
$("#drop16").hide();
$(".conchkNumber_3").click(function() {
    if($(this).is(":checked")) {
        $("#drop16").show();
    } else {
        $("#drop16").hide();
    }
});
$("#drop16").hide();
$(".conchkSelectAll_3").click(function() {
    if($(this).is(":checked")) {
        $("#drop16").show();
    } else {
        $("#drop16").hide();
    }
});
});
</script>
	
<form>
<div class="modal fade" id="delete1" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف ایمیل زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>
</form>

<form>
<div class="modal fade" id="delete2" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف ایمیل زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>
</form>

<form>
<div class="modal fade" id="delete3" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف ایمیل زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>
</form>

<form><fieldset>
<div class="modal fade" id="show_contact" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					   گیرندگان
				</div>
			</div>
			<div class="modal-body">
			</br>
					<table  cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
						<thead>
							<tr>
						
								<th class="center"><label class="position-relative"><input type="checkbox" class="conchkSelectAll" /><span class="lbl"></span></label></th>
								<th>نام </th>
								<th>نام خانوادگی</th>
								<th>ایمیل</th>
								
							</tr>
							
						</thead>
						
						<tbody>
								<?$query2="select mobile,name,family from pro_contacts where user_id='$user_id' and group_name not in (select id from pro_group_contact where type='sms_bank')";
											$result2 = $coms_conect->query($query2);
												while($RS2 = $result2->fetch_assoc()) {
												$name=$RS2["name"];
												$family=$RS2["family"];
											
												$mobile=$RS2["mobile"];?>				
							<tr>
								<th class="center"><label class="position-relative">
								<input type="checkbox" value="<?=$mobile?>" class="conchkNumber"/><span class="lbl"></span></label></th>
								<td>hasan</td>
								<td>hasani</td>
								<td>hasan@hasani.com</td>
							</tr>
							<?}?>
						</tbody>
					</table>
			</div>
			<div class="modal-footer ">
			<button type="button" id="btn_ok" value="" data-dismiss="modal" class="btn btn-primary conbtnGetAll" ><span class="glyphicon glyphicon-ok-sign"></span> افزودن </button>
		   </div>
		</div>
	</div><!-- /.modal-dialog --> 
</div>
</fieldset>
</form>

<div class="tabbable">
	  <ul class="nav nav-tabs">
			<li class="pull-right">
			<button type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span data-toggle="tab" href="#write" title="نوشتن ایمیل">+</span>
			</button>
			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav navbar-left">
				<a data-toggle="tab" href="#write" style="background-color: #9585bf!important;border-color: #9585bf;color: white;padding: 4px;margin-left: -12px;">
					<i class="ace-icon fa fa-envelope bigger-130"></i>
					نوشتن ایمیل</a></li>
				</ul>
			</div>	
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="blue ace-icon fa fa-inbox bigger-130"></i>
			ایمیل های دریافتی <span class="badge badge-danger">2</span></a></li>
			<li><a href="#tab2" data-toggle="tab"><i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
			ایمیل های ارسالی</a></li>
			<li><a href="#tab3" data-toggle="tab"><i class="green ace-icon fa fa-pencil bigger-130"></i>
			پیش نویس ها <span class="badge badge-danger">2</span></a></li>
	  </ul>
	  <div class="tab-content">
			<div class="tab-pane active" id="tab1">
			
				<div class="tt">
					<div class="row-fluid">
						<div class="col-md-6 yepco">
							<div class="dropdown pull-left yepco" id="drop1">
								<a data-toggle="dropdown" id="drop2" class="btn pull-left btn-primary btn-sm dropdown-toggle" data-placeholder="false" >
									 مرتب کردن <span class="ace-icon fa fa-caret-down icon-on-right"></span>
								</a>
								<ul class="dropdown-menu dropdown-default" id="drop3" style="top: 30px;">
									<li><input type="radio" id="ID" name="NAME" value="VALUE"><label for="ID">تاریخ</label></li>
									<li><input type="radio" id="ID2" name="NAME" value="VALUE2"><label for="ID2">فرستنده</label></li>
									<li><input type="radio" id="ID3" name="NAME" value="VALUE3"><label for="ID3">عنوان</label></li>
								</ul>
							</div>
							
							
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete1" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-primary btn-sm" href="#" data-title="delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
											حذف 
										</a>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group yepco">
								<form class="navbar-form navbar-left pull-right yepco" role="search">
									<input type="text" class="form-control search2" placeholder="جستجو">
								</form>	
							</div>		
						</div>
					</div>
					
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
						<thead>
							<tr>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>  
								</th>
								<th>فرستنده</th>
								<th>عنوان</th>
								<th>تاریخ دریافت</th>
								<!--<th>امکانات</th>-->
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="center" style="border-right: none;border-left: none;">
									<label class="position-relative">
										<input type="checkbox" class="conchkNumber"/>
										<span class="lbl"></span>
									</label>  
									<i id="star3" class="fa fa-star"  style="color:#feb902;"></i>
								</td>
								<td style="border-right: none;border-left: none;"><a href="#id-message" data-toggle="tab">احسان</a></td>
								<td style="border-right: none;border-left: none;">لوازم اداری</td>
								<td style="text-align: -webkit-left;border-right: none;border-left: none;"><i class="fa fa-paperclip"></i>  1393/01/02</td>
								<!--<td>
									<a class="btn btn-xs btn-success" href="#write" data-toggle="tab" title="انتقال پیام">
										<i class="ace-icon fa fa-mail-forward bigger-105"></i>
									</a>
									
									<button class="btn btn-xs btn-primary" href="#write" data-toggle="tab" title="پاسخ">
										<i class="ace-icon fa fa-mail-reply bigger-105"></i>
									</button>
									
									<button class="btn btn-xs btn-danger" data-title="delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</button>
								</td>-->
								
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
			
			<div class="tab-pane " id="tab2">
				
				<div class="tt">
					<div class="row-fluid">
						<div class="col-md-6 yepco">
							<div class="dropdown pull-left yepco" id="drop7">
								<a data-toggle="dropdown" id="drop8" class="btn pull-left btn-primary btn-sm dropdown-toggle" data-placeholder="false">
									 مرتب کردن <span class="ace-icon fa fa-caret-down icon-on-right"></span>
								</a>
								<ul class="dropdown-menu dropdown-default" id="drop9" style="top: 30px;">
									<li><input type="radio" id="ID4" name="NAME2" value="VALUE4"><label for="ID4">تاریخ</label></li>
									<li><input type="radio" id="ID5" name="NAME2" value="VALUE5"><label for="ID5">گیرنده</label></li>
									<li><input type="radio" id="ID6" name="NAME2" value="VALUE6"><label for="ID6">عنوان</label></li>
								</ul>
							</div>
							
							<div class="pull-left btn-xs yepco" id="drop10">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete2" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-primary btn-sm" href="#" data-title="delete2" data-toggle="modal" data-target="#delete2" data-placement="top" rel="tooltip">
											حذف 
										</a>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group yepco">
								<form class="navbar-form navbar-left pull-right yepco" role="search">
									<input type="text" class="form-control search2" placeholder="جستجو">
								</form>	
							</div>		
						</div>
					</div>	
				
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
						<thead>
							<tr>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll_2" />
										<span class="lbl"></span>
									</label>
								</th>
								<th>گیرنده</th>
								<th>عنوان</th>
								<th>تاریخ ارسال</th>
								<!--<th>امکانات</th>-->
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="center" style="border-right: none;border-left: none;">
									<label class="position-relative">
										<input type="checkbox" class="conchkNumber_2" />
										<span class="lbl"></span>
									</label>  
									<i id="star2" class="fa fa-star "  style="color:#feb902;"></i>
								</td>
								<td style="border-right: none;border-left: none;"><a href="#id-message1" data-toggle="tab">John Doe</a></td>
								<td style="border-right: none;border-left: none;">لوازم اداری</td>
								<td style="text-align: -webkit-left;border-right: none;border-left: none;"><i class="fa fa-paperclip"></i>  1393/01/02</td>
								<!--<td>
									<a class="btn btn-xs btn-success" href="#write" data-toggle="tab" title="انتقال پیام">
										<i class="ace-icon fa fa-mail-forward bigger-105"></i>
									</a>
									
									<button class="btn btn-xs btn-primary" href="#write" data-toggle="tab" title="پاسخ">
										<i class="ace-icon fa fa-mail-reply bigger-105"></i>
									</button>
									
									<button class="btn btn-xs btn-danger" data-title="delete2" data-toggle="modal" data-target="#delete2" data-placement="top" rel="tooltip">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</button>
								</td>-->
								
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
			
			<div class="tab-pane " id="tab3">
				
				<div class="tt">		
					<div class="row-fluid">
						<div class="col-md-6 yepco">
							<div class="dropdown pull-left yepco" id="drop13">
								<a data-toggle="dropdown" id="drop14" class="btn pull-left btn-primary btn-sm dropdown-toggle" data-placeholder="false">
									 مرتب کردن <span class="ace-icon fa fa-caret-down icon-on-right"></span>
								</a>
								<ul class="dropdown-menu dropdown-default" id="drop15" style="top: 30px;">
									<li><input type="radio" id="ID7" name="NAME3" value="VALUE7"><label for="ID7">تاریخ</label></li>
									<li><input type="radio" id="ID8" name="NAME3" value="VALUE8"><label for="ID8">گیرنده</label></li>
									<li><input type="radio" id="ID9" name="NAME3" value="VALUE9"><label for="ID9">عنوان</label></li>
								</ul>
							</div>
							
							<div class="pull-left btn-xs yepco" id="drop16">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete3" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-primary btn-sm" href="#" data-title="delete3" data-toggle="modal" data-target="#delete3" data-placement="top" rel="tooltip">
											حذف 
										</a>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group yepco">
								<form class="navbar-form navbar-left pull-right yepco" role="search">
									<input type="text" class="form-control search2" placeholder="جستجو">
								</form>	
							</div>		
						</div>
					</div>
				
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered">
						<thead>
							<tr>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll_3" />
										<span class="lbl"></span>
									</label>  
								</th>
								<th>گیرنده</th>
								<th>عنوان</th>
								<th>تاريخ</th>
								<!--<th>امکانات</th>-->
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="center" style="border-right: none;border-left: none;">
									<label class="position-relative">
										<input type="checkbox" class="conchkNumber_3" />
										<span class="lbl"></span>
									</label>  
									<i id="star1" class="fa fa-star "  style="color:#feb902;"></i>
								</td>
								<td style="border-right: none;border-left: none;"><a href="#write" data-toggle="tab">کیف چرم</a></td>
								<td style="border-right: none;border-left: none;">لوازم اداری</td>
								<td style="text-align: -webkit-left;border-right: none;border-left: none;"><i class="fa fa-paperclip"></i>  1393/01/02</td>
								<!--<td>
									<a class="btn btn-xs btn-success" href="#write" data-toggle="tab" title="انتقال پیام">
										<i class="ace-icon fa fa-mail-forward bigger-105"></i>
									</a>
									
									<button class="btn btn-xs btn-primary" href="#write" data-toggle="tab" title="پاسخ">
										<i class="ace-icon fa fa-mail-reply bigger-105"></i>
									</button>
									
									<button class="btn btn-xs btn-danger" data-title="delete3" data-toggle="modal" data-target="#delete3" data-placement="top" rel="tooltip">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</button>
								</td>-->
								
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
			
					<form id="id-message-form" class="form-horizontal" action="" role="form" method="post" enctype="multipart/form-data">
						<div id="id-message-new-navbar" class="message-navbar clearfix">
							<div class="message-bar">
								<div class="message-toolbar">
									<button id="star4" class="fa fa-star" style="color:#feb902;position: relative;height: 23px;top: -1px;" ></button>
									<button type="submit" class="btn btn-xs btn-white btn-primary">
										<i class="ace-icon fa fa-floppy-o bigger-125"></i>
										<span class="bigger-110">ذخیره پیش نویس</span>
									</button>

									<button type="button" class="btn btn-xs btn-white btn-primary" data-title="Delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
										<i class="ace-icon fa fa-times bigger-125 orange2"></i>
										<span class="bigger-110">دور انداختن</span>
									</button>
								</div>
							</div>

							<div>
								<div class="messagebar-item-left">
									<a href="#tab1" data-toggle="tab">
										<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
										<b class="middle bigger-110">برگشت</b>
									</a>
								</div>

								<div class="messagebar-item-right">
									<span class="inline btn-send-message">
										<button type="submit" class="btn btn-sm btn-primary no-border btn-white btn-round">
											<span class="bigger-110">ارسال</span>

											<i class="ace-icon fa fa-arrow-left icon-on-right"></i>
										</button>
									</span>
								</div>
							</div>
						</div>
						</br>
						
							<!-- #section:pages/inbox.compose -->
							<div>
								<div class="form-group">
									<label class="col-sm-2 control-label no-padding-right" for="form-field-recipient">گیرنده:</label>

									<div class="col-sm-4">
											<input type="text" id="sel" data-role="tagsinput" name="to" class="form-control"  placeholder="گيرندگان خود را با Enter از هم جدا کنید">							
									</div>
										<label class="col-md-2 control-label no-padding-right">يا</label>
									<div class="col-sm-4">
										<div class="input-group">
											<input type="text" name="e2" id="e2" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default" placeholder="گيرندگان اعضاي سايت را انتخاب کنيد" style="width: 100%; ">							
											<span class="input-group-addon success" href="#show_table" data-title="show_table" data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip" style="color: rgb(255, 255, 255);background-color: rgb(92, 184, 92);border-color: rgb(76, 174, 76);"><span class="glyphicon glyphicon-plus"></span></span>
										</div>
									</div>
								</div>

								<div class="hr hr-18 dotted"></div>

								<div class="form-group">
									<label class="col-sm-2 control-label no-padding-right" for="form-field-subject">عنوان:</label>

									<div class="col-sm-10 col-xs-12">
										<div class="input-icon block col-xs-12 no-padding">
											<input maxlength="100" type="text" class="col-xs-12" name="subject" id="form-field-subject" placeholder="عنوان" />
											<i class="ace-icon fa fa-comment-o"></i>
										</div>
									</div>
								</div>

								<div class="hr hr-18 dotted"></div>

								<div class="form-group">
									<label for="form-field-subject" class="col-sm-2 control-label no-padding-right">متن پيام:</label>
										<div class="col-sm-10">
											<textarea id="text" name="text"  class="form-control" rows="3"></textarea>
																	 <!--<script>CKEDITOR.replace( 'text' );</script>-->
												 <script>
													tinymce.init({
													selector: "#text",
													height: 300,
													width:"99.5%",
													directionality : 'rtl',
													language : 'fa_IR',
													menubar:true,
													
													skin: 'flat',
													plugins: [
														 "advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",
														 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
														 "fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "
													],

													image_advtab: true,
														toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",

													image_advtab: true ,
													external_filemanager_path:"/filemanager/",
													filemanager_title:"مديريت فايل" ,
													external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
													
												 }); 
												 </script>
										</div>
								</div>

								<div class="hr hr-18 dotted"></div>

								<div class="form-group no-margin-bottom">
									<label class="col-sm-2 control-label no-padding-right">پیوست:</label>

									<div class="col-sm-10">
										<div id="form-attachments">
											<!-- #section:custom/file-input -->
											<input type="file" name="attachment[]" />

											<!-- /section:custom/file-input -->
										</div>
									</div>
								</div>

							</div>

							<!-- /section:pages/inbox.compose -->
						</form>
			</div>
			
			<div class="tab-pane" id="id-message">
												
				<div id="id-message-item-navbar" class="message-navbar clearfix">
					<div class="message-bar">
						<div class="message-toolbar">
							<div class="inline position-relative align-left">
								<button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
									<span class="bigger-110">امکانات</span>

									<i class="ace-icon fa fa-caret-down icon-on-right"></i>
								</button>

								<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
									<li>
										<a href="#write" data-toggle="tab">
											<i class="ace-icon fa fa-mail-reply blue"></i>&nbsp; پاسخ
										</a>
									</li>

									<li>
										<a href="#write" data-toggle="tab">
											<i class="ace-icon fa fa-mail-forward green"></i>&nbsp; انتقال پیام
										</a>
									</li>
								</ul>
							</div>

							<button type="button" class="btn btn-xs btn-white btn-primary"  data-title="Delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
								<i class="ace-icon fa fa-trash-o bigger-125 orange"></i>
								<span class="bigger-110">حذف</span>
							</button>
						</div>
					</div>

					<div>
						<div class="messagebar-item-left">
							<a href="#tab1" data-toggle="tab">
								<i class="ace-icon fa fa-arrow-right blue bigger-110 middle"></i>
								<b class="bigger-110 middle">برگشت</b>
							</a>
						</div>

						<div class="messagebar-item-right">
							<i class="ace-icon fa fa-clock-o bigger-110 orange"></i>
							<span class="grey">9:20</span>
						</div>
					</div>
				</div>
		
				<!-- #section:pages/inbox.message-header -->
				
				<div class="message-header clearfix">
					<div class="pull-left">

						<div class="space-4"></div>

						<i id="star" class="fa fa-star "  style="color:#feb902;"></i>

						&nbsp;
						<img class="middle" alt="John's Avatar" src="/assets/avatars/avatar.png" width="32" />
						&nbsp;
						<a href="#" class="sender">John Doe</a>

						&nbsp;
						<i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
						<span class="time grey">Today, 7:15 pm</span>
					</div>

					<div class="pull-right action-buttons">
						
					</div>
				</div>

				<!-- /section:pages/inbox.message-header -->
				<div class="hr hr-double"></div>

				<!-- #section:pages/inbox.message-body -->
				<div class="message-body">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>

					<p>
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>

					<p>
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
					</p>

					<p>
						Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>

					<p>
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
					</p>

					<p>
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
				</div>

				<!-- /section:pages/inbox.message-body -->
				<div class="hr hr-double"></div>

				<!-- #section:pages/inbox.message-attachment -->
				<div class="message-attachment clearfix">
					<div class="attachment-title">
						<span class="blue bolder bigger-110">پیوست ها</span>
						&nbsp;
						<span class="grey">(2 files, 4.5 MB)</span>

						<div class="inline position-relative">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
								&nbsp;
								<i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
							</a>

							<ul class="dropdown-menu dropdown-lighter">
								<li>
									<a href="#">دانلود همه فایل های zip</a>
								</li>
							</ul>
						</div>
					</div>

					&nbsp;
					<ul class="attachment-list pull-left list-unstyled">
						<li>
							<a href="#" class="attached-file">
								<i class="ace-icon fa fa-file-o bigger-110"></i>
								<span class="attached-name">Document1.pdf</span>
							</a>

							<span class="action-buttons">
								<a href="#">
									<i class="ace-icon fa fa-download bigger-125 blue"></i>
								</a>

								<a  data-title="Delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
									<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
								</a>
							</span>
						</li>

						<li>
							<a href="#" class="attached-file">
								<i class="ace-icon fa fa-film bigger-110"></i>
								<span class="attached-name">Sample.mp4</span>
							</a>

							<span class="action-buttons">
								<a href="#">
									<i class="ace-icon fa fa-download bigger-125 blue"></i>
								</a>

								<a data-title="Delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
									<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
								</a>
							</span>
						</li>
					</ul>

					<div class="attachment-images pull-right">
						<div class="vspace-4-sm"></div>
							<div class="popup-gallery" id="popup-gallery">
								<a href="/yep_theme/images/demo/portfolio/a1.jpg" title="123"><img src="/yep_theme/images/demo/portfolio/thumb/a1.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a2.jpg"><img src="/yep_theme/images/demo/portfolio/thumb/a2.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a1.jpg" title="123"><img src="/yep_theme/images/demo/portfolio/thumb/a1.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a2.jpg"><img src="/yep_theme/images/demo/portfolio/thumb/a2.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a1.jpg" title="123"><img src="/yep_theme/images/demo/portfolio/thumb/a1.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a4.jpg"><img src="/yep_theme/images/demo/portfolio/thumb/a4.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a3.jpg"><img src="/yep_theme/images/demo/portfolio/thumb/a3.jpg" width="75" height="75"></a>
							</div>

					</div>
				</div>
				
				<!-- /section:pages/inbox.message-attachment -->
			</div><!-- /.message-content -->

			<div class="tab-pane" id="id-message1">
												
				<div id="id-message-item-navbar" class="message-navbar clearfix">
					<div class="message-bar">
						<div class="message-toolbar">
							<div class="inline position-relative align-left">
								<button type="button" class="btn-white btn-primary btn btn-xs dropdown-toggle" data-toggle="dropdown">
									<span class="bigger-110">امکانات</span>

									<i class="ace-icon fa fa-caret-down icon-on-right"></i>
								</button>

								<ul class="dropdown-menu dropdown-lighter dropdown-caret dropdown-125">
									<li>
										<a href="#write" data-toggle="tab">
											<i class="ace-icon fa fa-mail-reply blue"></i>&nbsp; پاسخ
										</a>
									</li>

									<li>
										<a href="#write" data-toggle="tab">
											<i class="ace-icon fa fa-mail-forward green"></i>&nbsp; انتقال پیام
										</a>
									</li>
								</ul>
							</div>

							<button type="button" class="btn btn-xs btn-white btn-primary"  data-title="Delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
								<i class="ace-icon fa fa-trash-o bigger-125 orange"></i>
								<span class="bigger-110">حذف</span>
							</button>
						</div>
					</div>

					<div>
						<div class="messagebar-item-left">
							<a href="#tab2" data-toggle="tab">
								<i class="ace-icon fa fa-arrow-right blue bigger-110 middle"></i>
								<b class="bigger-110 middle">برگشت</b>
							</a>
						</div>

						<div class="messagebar-item-right">
							<i class="ace-icon fa fa-clock-o bigger-110 orange"></i>
							<span class="grey">9:20</span>
						</div>
					</div>
				</div>
		
				<!-- #section:pages/inbox.message-header -->
				
				<div class="message-header clearfix">
					<div class="pull-left">

						<div class="space-4"></div>

						<i id="star5" class="fa fa-star "  style="color:#feb902;"></i>

						&nbsp;
						<img class="middle" alt="John's Avatar" src="/assets/avatars/avatar.png" width="32" />
						&nbsp;
						<a href="#" class="sender">John Doe</a>

						&nbsp;
						<i class="ace-icon fa fa-clock-o bigger-110 orange middle"></i>
						<span class="time grey">Today, 7:15 pm</span>
					</div>

					<div class="pull-right action-buttons">
						
					</div>
				</div>

				<!-- /section:pages/inbox.message-header -->
				<div class="hr hr-double"></div>

				<!-- #section:pages/inbox.message-body -->
				<div class="message-body">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>

					<p>
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>

					<p>
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
					</p>

					<p>
						Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>

					<p>
						Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
					</p>

					<p>
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>
				</div>

				<!-- /section:pages/inbox.message-body -->
				<div class="hr hr-double"></div>

				<!-- #section:pages/inbox.message-attachment -->
				<div class="message-attachment clearfix">
					<div class="attachment-title">
						<span class="blue bolder bigger-110">پیوست ها</span>
						&nbsp;
						<span class="grey">(2 files, 4.5 MB)</span>

						<div class="inline position-relative">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">
								&nbsp;
								<i class="ace-icon fa fa-caret-down bigger-125 middle"></i>
							</a>

							<ul class="dropdown-menu dropdown-lighter">
								<li>
									<a href="#">دانلود همه فایل های zip</a>
								</li>
							</ul>
						</div>
					</div>

					&nbsp;
					<ul class="attachment-list pull-left list-unstyled">
						<li>
							<a href="#" class="attached-file">
								<i class="ace-icon fa fa-file-o bigger-110"></i>
								<span class="attached-name">Document1.pdf</span>
							</a>

							<span class="action-buttons">
								<a href="#">
									<i class="ace-icon fa fa-download bigger-125 blue"></i>
								</a>

								<a  data-title="Delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
									<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
								</a>
							</span>
						</li>

						<li>
							<a href="#" class="attached-file">
								<i class="ace-icon fa fa-film bigger-110"></i>
								<span class="attached-name">Sample.mp4</span>
							</a>

							<span class="action-buttons">
								<a href="#">
									<i class="ace-icon fa fa-download bigger-125 blue"></i>
								</a>

								<a data-title="Delete1" data-toggle="modal" data-target="#delete1" data-placement="top" rel="tooltip">
									<i class="ace-icon fa fa-trash-o bigger-125 red"></i>
								</a>
							</span>
						</li>
					</ul>

					<div class="attachment-images pull-right">
						<div class="vspace-4-sm"></div>
							<div class="popup-gallery" id="popup-gallery2">
								<a href="/yep_theme/images/demo/portfolio/a1.jpg" title="Test1"><img src="/yep_theme/images/demo/portfolio/thumb/a1.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a2.jpg" title="Test2"><img src="/yep_theme/images/demo/portfolio/thumb/a2.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a1.jpg" title="Test3"><img src="/yep_theme/images/demo/portfolio/thumb/a1.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a2.jpg" title="Test4"><img src="/yep_theme/images/demo/portfolio/thumb/a2.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a1.jpg" title="Test5"><img src="/yep_theme/images/demo/portfolio/thumb/a1.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a4.jpg" title="Test6"><img src="/yep_theme/images/demo/portfolio/thumb/a4.jpg" width="75" height="75"></a>
								<a href="/yep_theme/images/demo/portfolio/a3.jpg" title="Test7"><img src="/yep_theme/images/demo/portfolio/thumb/a3.jpg" width="75" height="75"></a>
							</div>
					</div>
				</div>
				
				<!-- /section:pages/inbox.message-attachment -->
			</div><!-- /.message-content -->
									
												
		</div>
</div>
<script>
$(document).ready(function() {
	$('#popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">عکس #%curr%</a> لود نشده است',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small></small>';
			}
		}
	});
});
</script>

<script>
$(document).ready(function() {
	$('#popup-gallery2').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">عکس #%curr%</a> لود نشده است',
			titleSrc: function(item) {
				return item.el.attr('title') + '<small></small>';
			}
		}
	});
});
</script>

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
  
<script type="text/javascript">
$(function () {	
	$(document).on('click', '.conbtnGetAll', function(event) {

        if($('.conchkNumber_2:checked').length) {
			var chkId = '';
			$('.conchkNumber_2:checked').each(function() {
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
	$('.conchkSelectAll_2').click( function() {
		$('.conchkNumber_2').prop('checked', $(this).is(':checked'));
    });
	$('.conchkNumber_2').click( function() {
        if($('.conchkNumber_2:checked').length == $('.conchkNumber_2').length) {
			$('.conchkSelectAll_2').prop('checked', true);
        }
        else {
          $('.conchkSelectAll_2').prop('checked', false);
        }
    });
});
  </script>

<script type="text/javascript">
$(function () {	
	$(document).on('click', '.conbtnGetAll', function(event) {

        if($('.conchkNumber_3:checked').length) {
			var chkId = '';
			$('.conchkNumber_3:checked').each(function() {
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
	$('.conchkSelectAll_3').click( function() {
		$('.conchkNumber_3').prop('checked', $(this).is(':checked'));
    });
	$('.conchkNumber_3').click( function() {
        if($('.conchkNumber_3:checked').length == $('.conchkNumber_3').length) {
			$('.conchkSelectAll_3').prop('checked', true);
        }
        else {
          $('.conchkSelectAll_3').prop('checked', false);
        }
    });
});
  </script>
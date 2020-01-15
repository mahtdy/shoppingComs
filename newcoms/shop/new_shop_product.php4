<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
		
<!-- page specific plugin scripts -->
<script src="/yep_theme/default/rtl/assets/js/fuelux/data/fuelux.tree-sample-demo-data.js"></script>
<script src="/yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/jasny-input/jasny-bootstrap.min.css" />
<script src="/yep_theme/default/rtl/js/jasny-input/jasny-bootstrap.min.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<script type="text/javascript">
	jQuery(function($){

$('#tree1').ace_tree({
	dataSource: treeDataSource ,
	multiSelect:true,
	loadingHTML:'<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
	'open-icon' : 'ace-icon tree-minus',
	'close-icon' : 'ace-icon tree-plus',
	'selectable' : true,
	'selected-icon' : 'ace-icon fa fa-check',
	'unselected-icon' : 'ace-icon fa fa-times'
});

$('#tree2').ace_tree({
	dataSource: treeDataSource2 ,
	loadingHTML:'<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>',
	'open-icon' : 'ace-icon fa fa-folder-open',
	'close-icon' : 'ace-icon fa fa-folder',
	'selectable' : false,
	'selected-icon' : null,
	'unselected-icon' : null
});


$('#tree1')
.on('updated', function(e, result) {
	//result.info  >> an array containing selected items
	//result.item
	//result.eventType >> (selected or unselected)
})
.on('selected', function(e) {
})
.on('unselected', function(e) {
})
.on('opened', function(e) {
})
.on('closed', function(e) {
});



/**
$('#tree1').on('loaded', function (evt, data) {
});

$('#tree1').on('opened', function (evt, data) {
});

$('#tree1').on('closed', function (evt, data) {
});

$('#tree1').on('selected', function (evt, data) {
});
*/
});
</script>	
    
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

<script>
	function moneyCommaSep(ctrl)
		{
		  var separator = ",";
		  var int = ctrl.value.replace ( new RegExp ( separator, "g" ), "" );
		  var regexp = new RegExp ( "\\B(\\d{3})(" + separator + "|$)" );
		  do
		  {
			int = int.replace ( regexp, separator + "$1" );
		  }
		  while ( int.search ( regexp ) >= 0 )
		  ctrl.value = int;
		}

	function removeComma(ctrl)
		{
		  var separator = ",";
		  
		  ctrl.value = ctrl.value.replace ( new RegExp ( separator, "g" ), "" );
		} 
</script>

<script type="text/javascript">
		$(document).ready(function() {
		

        $("#barchasb3").change(function () {
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

		$("#keyword3").change(function () {
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

<style>
.error {
color : red;
}
</style>
<script>
 $(function() {
         $('#tab_new').validate({
            
            rules: {
				onvan: {
					required:true
				}
            },
            messages: {
				onvan: {
					required:"پر کردن اين فيلد الزامي است"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? '1 فيلد خالي مانده است لطفا پر کنيد'
                        : '' + errors + 'فيلد خالي مانده است لطفا پر کنيد';
                      $("div.errorHandler button").after(message);
                      $("div.errorHandler").show();
                    } else {
                      $("div.errorHandler").hide();
                    }
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    });
</script>
	
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;">
		<button data-dismiss="alert" class="close" sourceindex="208">x</button>
			<i class="fa fa-times-sign"></i>
		</div>
<!-- /alert panel  -->
	
<form class="form-horizontal" id="delete_table" name="delete_table" action="" role="form" method="post" enctype="multipart/form-data"><fieldset>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محصول زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
		</div>
	</div>
	</div>
</div></fieldset>
</form>
			
	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="pull-right" >
				<button type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_templates" title="افزودن محصول"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</button>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" href="#add_templates" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;margin-left: -12px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						افزودن محصول</a>
					</ul>
				</div>
			</li>
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			مدیریت محتوا </a></li>
			
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
								<th>عنوان</th>
								<th>دسته بندي</th>
								<th>تاريخ ثبت</th>
								<th>بازدید</th>
								<th>مورد علاقه</th>
								<th>قیمت (ریال)</th>
								<th>امکانات</th>
							</tr>
						</thead>
						<tbody>
							<tr>						
								<td>کیف چرم</td>
								<td>لوازم اداری</td>
								<td>1393/01/02</td>
								<td>25</td>
								<td>2563</td>
								<td>250,000</td>
								<td>
									<a class="green" href="http://google.com/" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-eye bigger-120"></i>
									</a>
									
									<a class="blue" href="#add_templates" data-toggle="tab" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-edit bigger-120"></i>
									</a>
									
									<a class="red" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
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
			</div>	
			
			<div class="tab-pane" id="add_templates">
			
				<form class="form-horizontal" role="form" action="" method="post" id="tab_new" enctype="multipart/form-data">
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						<div class="message-bar">
							<h2 style="color: #2a8bcb;">افزودن محصول / ویرایش</h2>
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
				
					<div class="tabbable">
							
						<ul class="nav nav-tabs" id="myTab">
							<li class="active">
								<a data-toggle="tab" href="#home">
									<i class="green ace-icon fa fa-tachometer bigger-120"></i>
									محصول
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#English">
									<i class="red ace-icon fa fa-certificate bigger-120"></i>
									English
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#SEO">
									<i class="pink ace-icon fa fa-tag bigger-120"></i>
									SEO
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#details">
									<i class="green ace-icon fa fa-book bigger-120"></i>
									مشخصات محصول
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#catalog">
									<i class="red ace-icon fa fa-file bigger-120"></i>
									کاتالوگ 
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#video">
									<i class="blue ace-icon fa fa-video-camera bigger-120"></i>
									ویدئو
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#gallery">
									<i class="green ace-icon fa fa-image bigger-120"></i>
									گالری تصاویر
								</a>
							</li>

							<li>
								<a data-toggle="tab" href="#more">
									<i class="pink ace-icon fa fa-star bigger-120"></i>
									سایر
								</a>
							</li>

						</ul>

						<div class="tab-content">
							<div id="home" class="tab-pane active">
								
								<div class="page-content-area">
									<div class="page-body">
										<fieldset>	
											<div class="row-fluid"> 
												<div class="col-md-12">
													<div class="row-fluid"> 
														<div class="col-md-9">
														
															<div class="row-fluid"> 
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label">عنوان محصول *</label>
																		<div class="form-group col-sm-12">  
																			<input name="onvan" id="onvan" class="form-control">									
																		</div>
																	</div>
																</div>
																
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label">قیمت</label>
																		<div class="form-group col-sm-12"> 
																			<div class="input-group input-group-sm">
																			  <input id="price" name="price" type="text" class="form-control" onKeyUp="javascript:moneyCommaSep(this);" />
																			  <span class="input-group-addon">ریال</span>
																			</div>  
																		</div>
																	</div>
																</div>
															</div>
															
															<div class="row-fluid"> 
																<div class="form-group">
																	<div class="form-group col-sm-12">
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
															</div>
																
															<div class="row-fluid"> 
																<div class="col-md-6">
																	<div class="form-group">
																		<label class="control-label">موجودی</label>
																		<div class="form-group col-md-12">
																			<input type="number" id="mojodi" name="mojodi" class="form-control"/>
																		</div>
																	</div>	
																</div>
																
																<div class="col-md-6">
																	<div class="form-group">															
																			<label class="control-label">سازنده محصول</label>
																			<div class="form-group col-sm-12">
																				<input type="text" id="sazande" name="sazande" class="form-control">
																			</div>
																	</div>
																</div>
															</div>
																
															<div class="form-group col-sm-12">
																<label class="control-label">لینک خرید پستی</label>
																<div class="form-group col-sm-12" style="width: 103%;">
																	<div class="input-group input-group-sm">
																	  <input id="link_post" name="link_post" type="text" class="form-control"/>
																	  <span class="input-group-addon">//:http</span>
																	</div> 
																</div>
															</div>
																
														</div>
														 
														<div class="col-md-3">
															<h4>تصویر محصول</h4>
															<div class="form-group">
																<div class="col-sm-12">
																	<div class="row">
																	<div class="col-xs-5">
																		<div class="fileinput fileinput-new" data-provides="fileinput">
																			<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																				<img data-src="holder.js/100%x100%" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+" style="height: 100%; width: 100%; display: block;">
																			</div>
																			  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
																			<div>
																				<span class="btn btn-default btn-file"><span class="fileinput-new">انتخاب تصوير</span>
																				<span class="fileinput-exists">تغيير دادن</span>
																				<input type="file" name="file"></span>
																				<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">حذف کردن</a>
																			</div>
																		</div>
																	</div>
																	</div>
																</div>
															</div>
															<hr>
															
															<h4>دسته بندي</h4>
															<div id="tree1" class="tree"></div>
																		
														</div>
													</div>
												</div> 
											</div>
											
										</fieldset>
									</div>
								</div>
								
							</div>

							<div id="English" class="tab-pane">
							
								<div class="page-content-area">
									<div class="page-body">
										<fieldset>
										
												<div class="row-fluid"> 
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-2 control-label">عنوان</label> 
															<div class="form-group col-md-10">	
																<input name="onvan2" id="onvan2" class="form-control">									
															</div>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-2 control-label">سايت سازنده</label>
															<div class="form-group col-md-10">
																  <input id="site2" name="site2" type="text" class="form-control"/>
															</div>
														</div>
													</div>
												</div>
												
												<div class="row-fluid"> 
													<div class="form-group">
														<label class="col-md-1 control-label"></label> 
														<div class="form-group col-md-11">
															<textarea id="text2" name="text2"  class="form-control" rows="3"></textarea>
																					 <!--<script>CKEDITOR.replace( 'text' );</script>-->
																 <script>
																	tinymce.init({
																	selector: "#text2",
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
												</div>
												
										</fieldset>
									</div>
								</div>
								
							</div>

							<div id="SEO" class="tab-pane">

								<div class="page-content-area">
									<div class="page-body">
										<fieldset>
										
											<div class="row-fluid"> 
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-2 control-label">برچسب</label> 
														<div class="form-group col-md-10">	
															<input name="barchasb3" id="barchasb3" class="form-control" data-role="tagsinput" placeholder="کلمات را وارد نماييد و سپس Enter بزنيد" style="width: 100%; ">									
														</div>
													</div>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-2 control-label">Meta keyword</label>
														<div class="form-group col-md-10">
															  <input id="keyword3" name="keyword3" type="text" class="form-control" data-role="tagsinput" placeholder="کلمات را وارد نماييد و سپس Enter بزنيد" style="width: 100%; "/>
														</div>
													</div>
												</div>
											</div>
											
											<div class="row-fluid"> 
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-1 control-label">Meta Description</label> 
															<div class="form-group col-md-11">
																<textarea id="Description3" name="Description3"  class="form-control" rows="3"></textarea>
															</div>
													</div>
												</div>
											</div>
											
										</fieldset>
									</div>
								</div>

							</div>
							
							<div id="details" class="tab-pane">

								<div class="page-content-area">
									<div class="page-body">
										<fieldset>
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-sm-2 control-label">نوع محصول</label>
													 <div class="form-group col-sm-5">
														<select name="dropdown" class="form-control" rows="3">
															<option value="">همه</option> 
															<option value="1">گروه هاي مورد نظر</option>
														</select>
													</div>	
												</div>
											</div>	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-sm-2 control-label">گارانتی</label>
													<div class="form-group col-sm-5">  
														<input name="garanti4" id="garanti4" class="form-control">									
													</div>
												</div>
											</div>	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-sm-2 control-label">وزن</label>
													 <div class="form-group col-sm-5">
														<div class="input-group " style="direction:ltr;">
															<div class="input-group-btn">
																<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" style="height: 34px;padding: inherit;">
																 گرم <span class="caret"></span>
																</button>
																<ul class="dropdown-menu">
																  <li><input type="radio" id="ID" name="NAME5" value="VALUE"><label for="ID">گرم</label></li>
																  <li><input type="radio" id="ID2" name="NAME5" value="VALUE"><label for="ID2">کیلوگرم</label></li>
																  <li><input type="radio" id="ID3" name="NAME5" value="VALUE"><label for="ID3">تن</label></li>
																</ul>
																
															</div>
															<input class='form-control' type="text" name="search_number" id="search_number" onKeyUp="javascript:moneyCommaSep(this);">
														</div>
													</div>	
												</div>
											</div>	
											<div class="col-md-12">	
												<div class="form-group">
													<label class="col-sm-2 control-label">ابعاد</label>
													<div class="form-group col-sm-5">  
														<input name="abad4" id="abad4" class="form-control" onKeyUp="javascript:moneyCommaSep(this);">									
													</div>
												</div>
											</div>	
											<div class="col-md-12">	
												<div class="form-group">
													<label class="col-sm-2 control-label">وبسایت سازنده</label>
													<div class="form-group col-sm-5">  
														<input name="website4" id="website4" class="form-control">									
													</div>
												</div>
											</div>	
											<div class="col-md-12">	
												<div class="form-group">
													<label class="col-sm-2 control-label">سال تولید</label>
													<div class="form-group col-sm-5">  
														<input name="sale4" id="sale4" class="form-control allownumericwithoutdecimal">									
													</div>
												</div>
											</div>			
											
										</fieldset>
									</div>
								</div>

							</div>
							
							<div id="catalog" class="tab-pane">

								<div class="page-content-area">
									<div class="page-body">
										<fieldset>
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label">آپلود کاتالوگ</label> 
													<div class="form-group col-md-4">
														<label class="ace-file-input">
															<input type="file" id="id-input-file-2" name="upload1"><span class="ace-file-container" data-title="انتخاب کنيد"><span class="ace-file-name" data-title="فايلي موجود نيست..."><i class=" ace-icon fa fa-upload"></i></span></span>
															<a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a>
														</label>
													</div>
												</div>
											</div>	
										</fieldset>
									</div>
								</div>

							</div>
							
							<div id="video" class="tab-pane">

								<div class="page-content-area">
									<div class="page-body">
										<fieldset>
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label">آپلود ویدئو</label> 
													<div class="form-group col-md-4">
														<label class="ace-file-input">
															<input type="file" id="id-input-file-2" name="upload2"><span class="ace-file-container" data-title="انتخاب کنيد"><span class="ace-file-name" data-title="فايلي موجود نيست..."><i class=" ace-icon fa fa-upload"></i></span></span>
															<a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a>
														</label>
													</div>
												</div>
											</div>	
										</fieldset>
									</div>
								</div>

							</div>
							
							<div id="gallery" class="tab-pane">					
							
								<div class="page-content-area">
									<div class="page-body">
										<fieldset>
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label">آپلود گالري تصاوير</label> 
													<div class="form-group col-md-4">
														<label class="ace-file-input">
															<input type="file" id="id-input-file-2" name="upload3"><span class="ace-file-container" data-title="انتخاب کنيد"><span class="ace-file-name" data-title="فايلي موجود نيست..."><i class=" ace-icon fa fa-upload"></i></span></span>
															<a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a>
														</label>
													</div>
												</div>
											</div>	
										</fieldset>
									</div>
								</div>
							
							</div>
							
							<div id="more" class="tab-pane">

								<div class="page-content-area">
									<div class="page-body">
										<fieldset>
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-md-2 control-label">کلمه عبور</label> 
													<div class="form-group col-md-4">
														<input name="pass" id="pass" class="form-control">									
													</div>
											</div>
										</div>
										</fieldset>
									</div>
								</div>

							</div>
							
							<div class="panel-footer">	
								<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>ذخيره</button>
							</div>
						</div>
					</div>
					
				</form>
				
			</div>
		</div>
	</div>
	
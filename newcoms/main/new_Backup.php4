<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
	
<style>
.error {
color : red;
}
</style>
<script>
$(function() {
         $('#backup1').validate({
            
            rules: {
				name_file: {
					required:true
				},
				host: {
					required:true
				},
				db_name: {
					required:true
				},
				db_user: {
					required:true
				},
				db_pass: {
					required:true
				}
            },
            messages: {
				name_file: {
					required:"پر کردن اين فيلد الزامي است"
				},
				host: {
					required:"پر کردن اين فيلد الزامي است"
				},
				db_name: {
					required:"پر کردن اين فيلد الزامي است"
				},
				db_user: {
					required:"پر کردن اين فيلد الزامي است"
				},
				db_pass: {
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
            },
			submitHandler: function(form) {
				$("#backup_waiting").show();
				$("#show_success_div").hide() ;
				$.ajax({
					type:'POST',
					url:'new_ajax_backup.php',
					data:"file_name="+$('#name_file').val()+"&db_name="+$('#db_name').val()+"&db_pass="+$('#db_pass').val()+"&db_user="+$('#db_user').val(),
					success: function(result){
						if(result==1){
						$("#show_success_div").show() ;
						}else{
						$("#show_error_div").show() ;	 
						$("#show_error").html('مشکل در پشتیان گیری') ;	 
					 
						}						
					 	$("#backup_waiting").hide(); 
					},
				   error: function(xhr){
					   $("#show_error_div").show() ;	 
						$("#show_error").html('مشکل در ارتباط با پایگاه داده') ;	 
						$("#backup_waiting").hide(); 
					}			
				}); 
			}
        });
    });
</script>

<script>
 $(function() {
	     $("#backup_waiting").hide();
		 
         $('#backup2').validate({
            
            rules: {
				res_filename: {
					required:true
				},
				res_user: {
					required:true
				},
				res_pass: {
					required:true
				},
				res_pass: {
					required:true
				}
            },
            messages: {
				res_filename: {
					required:"پر کردن اين فيلد الزامي است"
				},
				res_user: {
					required:"پر کردن اين فيلد الزامي است"
				},
				res_pass: {
					required:"پر کردن اين فيلد الزامي است"
				},
				res_pass: {
					required:"پر کردن اين فيلد الزامي است"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? 'فيلد خالي مانده است لطفا پر کنيد'
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

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا مطمئنيد که مي خواهيد بکاپ زیر را حذف کنید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok"  data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>
<div class="modal fade" id="restor_db" tabindex="-1" role="dialog" aria-labelledby="restor_db" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">بازگردانی</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا مطمئنيد که مي خواهيد بکاپ زیر را بازگردانی کنید</div>
		</div>
				<div class="panel-body" style='margin-top: -12%;'>
					<form id="backup2" name="backup2" action="" role="form" method="post" enctype="multipart/form-data">
				
			
						<div class="form-group">
							<label class="col-md-3 control-label" for="group_name">نام فایل</label> 
							<div class="form-group col-md-9">
								<input type="text" name="res_filename" id="res_filename" class="form-control" >									
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="group_name">نام کاربری</label> 
							<div class="form-group col-md-9">
								<input type="text" name="res_user" id="res_user" class="form-control" >									
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="group_name">کلمه عبور</label> 
							<div class="form-group col-md-9">
								<input type="password" name="res_pass" id="res_pass" class="form-control" >									
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="group_name">نام پایگاه داده</label> 
							<div class="form-group col-md-9">
								<input type="text" name="res_db" id="res_db" class="form-control" >									
							</div>
						</div>
				</div>
					<img src="" id='waiting_res'>
					<div class="panel-footer">	
						<button type="button" id='restor' style="width: 70px; font-size: 12px;" class="btn btn-primary restor_db">بازگردانی</button>
					</div>	
					</form>	
				
			</div>
	</div>
	</div>
</div>
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;position: fixed;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  -->

	<div class="page-content-area">
		
		<div class="page-body">
					 
				<div class="row-fluid"> 
					<div class="col-md-12">
						
			
		<div class="tabbable">
			<!--ul class="nav nav-tabs">
				<li class="pull-right" style="right:1%;">
					<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span data-toggle="tab" href="#write" title="افزودن"><i class="ace-icon fa fa-plus bigger-110"></i></span>
					</i>
					<div class="collapse navbar-collapse" id="nav-collapse">
						<ul class="nav navbar-nav navbar-left">
						<a data-toggle="tab" href="#write" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
							<i class="ace-icon fa fa-plus bigger-110"></i>
							افزودن</a>
						</ul>
					</div>
				</li>
					
				<li class="active"><a href="#tab2" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
				مدیریت پشتیبان گیری </a></li>
			</ul-->
			
			<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/backup.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">پشتیبان گیری</p><p class="lead">شما می توانید از دیتابیس خود با تمام محتوای داخل آن در این بخش پشتیبان گیری کنید. </p></div>
			
			</div>
			<!-- /section:main/backup.head -->
				
			<div class="toolmenu  ">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
					<?if($_SESSION['can_add']==1){?>
					<li id="newpag" class="addicon">
						<a href="#write" data-toggle="tab" data-placement="bottom" title="افزودن بکاپ جدید" >
							<span class="flaticon-add149"></span>
						</a>
					</li>
					<?}?>
					
					 
				 	 
				</ul>
			</div>

			</div>
				
			
				<div class="tab-pane active" id="tab2">
					<!-- #section:main/backup.table -->		
					<div class="tt">
						<div class=" yepco">
							<form action='' method='get' class="navbar-form navbar-left pull-right yepco" role="search">
								<input name="yep" value='new_Backup' type="hidden">	&nbsp;&nbsp;&nbsp;
								<input type="text" name="str" value='<?=$_GET['str']?>' class="form-control search2" placeholder="<?=$s_Pages_search?>">

							</form>
						</div>
						
						<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>نام بکاپ</th>
									<th>تاریخ</th>
									<th>دانلود</th>
									<th>بازیابی</th>
									<th>حذف</th>
									
								</tr>
							</thead>
							<tbody>
								<?$str=injection_replace($_GET['str']);
									$str_site='';	
									if($str>""){
											$str_site="and  name like '%$str%'";
								 	}	
								$i=1;
									$query="select * from new_backup where id>0 $str_site";
									$result = $coms_conect->query($query);
									while($RS1 = $result->fetch_assoc()) {
									$id=$RS1["id"];?>
								<tr>
									<td class="center">
										<?=$i?>
									</td>
									<td><?=$RS1["name"]?></td>
									<td><?=miladitojalalitime($RS1["date"])?></td>
									<td><a  class="blue" href="/newcoms.php?yep=new_Backup&file=<?=$RS1["name"]?>">
									<i class="ace-icon fa fa-download bigger-120"></i></a></td>
									
									<td><a id="<?=$RS1['name'].'.sql'?>" class="blue show_restor" data-title="restor_db" data-toggle="modal" data-target="#restor_db" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
									<i class="ace-icon fa fa-repeat bigger-120"></i></a></td>
									
									<td><a id="<?=$RS1['id']?>" class="red del_menu" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
									<i class="ace-icon fa fa-trash-o bigger-120"></i></a></td>
								</tr>
								<?$i++;}?>
							</tbody>
						</table>
					</div>			
					<!-- /section:main/backup.table -->		
				</div>
				
				<div class="tab-pane" id="write">
					<!-- #section:main/backup.form -->
					<form id="backup1" name="backup1" action="" role="form" method="post" enctype="multipart/form-data">
								
						<div id="id-message-new-navbar" class="message-navbar clearfix">
						
							<a  href="#" id="backup_db" data-toggle="tooltip" data-placement="bottom" title="" class="save backup_db" data-original-title="ذخیره">
								<span class="flaticon-verified9">
								</span>
							</a>
							<a href="newcoms.php?yep=new_Backup" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
								<span class="flaticon-left-arrow9">
								</span>
							</a>
						
							<!--div>
							<div class="message-bar">
								<h2 style="color: #2a8bcb;">تهیه پشتیبان</h2>
							</div>

							
								<div class="messagebar-item-left">
									<a href="#tab2" id="back_btn" data-toggle="tab" class="active">
										<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
										<b class="middle bigger-110"><?=$new_Getting_back?></b>
									</a>
								</div>

								<div class="messagebar-item-right">
									<span class="inline btn-send-message">
										<button id="submit_btn" type="submit" class=" btn btn-sm btn-primary no-border btn-white btn-round">
											<i class="ace-icon fa fa-check"></i>
											<span class="bigger-110"><?=$pro_save?></span>
										</button>
									</span>
								</div>
							</div-->
						</div>
						</br>
						<div class="panel-body">
							<div class="col-md-7">
								<div class="form-group">
									<label class="col-md-3 control-label" for="family" style="text-align: left;">پیشوند نام فایل*</label> 
									<div class="form-group col-md-9">
										<input type="text" name="name_file" id="name_file" class="form-control">
									</div>
								</div>
																
								<div class="form-group">
									<label class="col-md-3 control-label" for="family" style="text-align: left;">نام دیتابیس*</label> 
									<div class="form-group col-md-9">
										<input type="text" name="db_name" id="db_name" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="family" style="text-align: left;">نام کاربری*</label> 
									<div class="form-group col-md-9">
										<input type="text" name="db_user" id="db_user" class="form-control">
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="family" style="text-align: left;">کلمه عبور*</label> 
									<div class="form-group col-md-9">
										<input type="password" name="db_pass" id="db_pass" class="form-control">
									</div>
								</div>
							</div>
							
							<div class="col-md-5">
								<div class="alert alert-info">
									<b>نکات مهم در پشتیبان گیری:</b><br>
										1- این امکان تنها از دیتابیس شما پشتیبان تهیه می کند <br>
										2- این امکان از فایل های موجود روی هاست پشتیبان تهیه نمی کند<br>
										3- بهتر است برای پشتیبان گیری کامل از پنل هاست خود اقدام کنید<br>
										4- پیشوند نام فایل حتما به زبان انگلیسی باشد
								</div>
							</div>							
						</div>
						<img src="waiting.gif" id='backup_waiting' class="img-thumbnail"	style="position: absolute; z-index: 9999; left: 50%; margin-left:-85px;	top: 50%;	margin-top: -85px;">	
						
						<!--div class="panel-footer bttools">
							<button type="" id=' ' class="backup_db"><span class="flaticon-verified9"></span><span>پشتیبان گیری</span></button>
							<button type="submit" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button>
						</div-->	
								
					</form>
					<!-- /section:main/backup.form -->	
				</div>
			
			</div>
		</div>

<style>
@media (min-width: 767px){
.panel-body{
  padding-left: 100px;
  padding-right: 90px;
  padding-top: 65px;
}
}
@media (max-width: 768px){
.panel-body{
padding-top: 70px;
}}
</style>

 	
<script>
$("#backup_db").click(function(){
	$("#backup1").submit();  
})
</script>
		
<?$_SESSION["del_item"]='del_backup';?>							
<!--script>		
	$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_backup&id="+$(this).val(),
				success: function(result){
					window.location.href='newcoms.php?yep=new_Backup';
				}
			});
		});	
		$(".show_restor").click(function () {
				$("#res_filename").val($(this).attr('id'));
		});
		$("#restor").click(function () {
			if($("#res_filename").val()==''||$("#res_user").val()==''||$("#res_pass").val()==''||$("#res_db").val()=='')
				//alert('موارد خالی را پر نمایید');
			else{
				$("#waiting_res").show();
				$("#waiting_res").attr("src","waiting.gif");
				var a='1'+$("#res_user").val()+'2'
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:'action=restore_db&id='+$("#res_filename").val()+"&db_user="+$("#res_user").val()+"&db_pass="+$("#res_pass").val()+"&field_nmae="+$("#res_db").val()  ,
					success: function(result){
						//alert(result);
						if(result==1){
						alert('بازگردانی با موفقیت انجام شد');
						window.location.href="newcoms.php?yep=new_Backup";
						}else
						alert('مشکل در بازگردانی');
						$("#waiting_res").attr("src","");
						$("#waiting_res").hide();
					}
				});	 
			}
		});
			$("#backup_waiting").hide();
		$(".backup_db").click(function () {
			if($("#name_file").val()==''||$("#db_name").val()==''||$("#db_user").val()==''||$("#db_pass").val()=='')
				//alert('موارد خالی را پر نمایید');
			else{
				$("#backup_waiting").show();
				
				$.ajax({
					type:'POST',
					url:'new_ajax_backup.php',
					data:"file_name="+$('#name_file').val()+"&db_name="+$('#db_name').val()+"&db_pass="+$('#db_pass').val()+"&db_user="+$('#db_user').val(),
					success: function(result){
						if(result==1){
						alert('پشتیبان با موفقیت انجام شد');
						window.location.href="newcoms.php?yep=new_Backup";
						}else{
						alert('مشکل در پشتیان گیری');	
						$("#backup_waiting").hide(); 
						}						
					},
				   error: function(xhr){
						alert('مشکل در ارتباط با پایگاه داده');	
						$("#backup_waiting").hide(); 
					}			
				}); 
			}
		});
		</script-->			
		
			
		</div>
		
		
<div class="alert yepalert yepalert-success " id="show_success_div" style="position: fixed;display:none">
	<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
	<strong>پشتیبان با موفقیت انجام شد</strong>
</div>
		
<div class="alert yepalert yepalert-waiting " id="show_error_div" style="position: fixed;display:none">
	<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
	<strong id="show_error"></strong>
</div>			
		
	</div>	
<?$file=injection_replace($_GET['file']);
$file="db_backup/$file.sql";
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}?>
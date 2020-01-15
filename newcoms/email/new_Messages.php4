<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<style>
.error {
color : red;
}
</style>
<script>
 $(function() {
         $('#new_messages').validate({
            
            rules: {
				shenase: {
					required:true
				},
				title: {
					required:true
				},
				name: {
					required:true
				},
				sender: {
					required:true,
					email:true
				}
            },
            messages: {
				shenase: {
					required:"پر کردن اين فيلد الزامي است"
				},
				title: {
					required:"پر کردن اين فيلد الزامي است"
				},
				name: {
					required:"پر کردن اين فيلد الزامي است"
				},
				sender: {
					required:"پر کردن اين فيلد الزامي است",
					email:"فرمت اين فيلد به اين شکل مي باشد name@domain.com"
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

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف قالب نامه زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>

<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  --> 
<?
$name=injection_replace($_POST['name']);
$title=injection_replace($_POST['title']);
$shenase=injection_replace($_POST['shenase']);
$sender=injection_replace($_POST['sender']);
$site_name=injection_replace($_POST['up_site_name']);
	if($site_name>"")
	$site_id=$site_name;
	else if($site_name=="")
	$site_name=$site_id;
$lang=injection_replace($_POST['up_lang']);
	if($lang>"")
	$la=$lang;
	else if($lang=="")
	$lang=$la;
$text_email=injection_replace($_POST['text_email']);
$edit_id=injection_replace($_POST['edit_id']);
$edit_mode=injection_replace($_POST['edit_mode']);
if($name>""&&$edit_mode==0){
	$query1="insert into new_template_email(la,site_id,text,name,title,shenase,sender,date,user_id,ip)
	values ('$lang','$site_name','$text_email','$name','$title','$shenase','$sender',NOW(),$manager_id,'$custom_ip')";
	$coms_conect->query($query1);
	//echo $query1;
}else if($name>""&&$edit_mode==1){
	$query1="update new_template_email set site_id='$site_name', la='$lang', title='$title', ip='$custom_ip', edit_user_id='$manager_id', edit_date=NOW(),text='$text_email',shenase='$shenase',name='$name' where id=$edit_id"; 
	$coms_conect->query($query1);
	

}
//echo $query1;	
?>
		
		<div class="tabbable">
			<ul class="nav nav-tabs">
				<li class="pull-right" >
					<button type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span data-toggle="tab" href="#add_templates" title="افزودن"><i class="ace-icon fa fa-plus bigger-110"></i></span>
					</button>
					<div class="collapse navbar-collapse" id="nav-collapse">
						<ul class="nav navbar-nav navbar-left">
						<a data-toggle="tab" href="#add_templates" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;margin-left: -12px;display: inline-table;">
							<i class="ace-icon fa fa-plus bigger-110"></i>
							افزودن</a>
						</ul>
					</div>
				</li>	
				
				<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
				قالب های نامه </a></li>
				
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
								<div class="pull-right btn-default btn-xs">
									<?create_sub_site($site_id,$coms_conect)?>
								</div>
								<div class="pull-right btn-default btn-xs">
									<?create_lang($la,$coms_conect)?>
								</div>
							</div>		
						</div>
					</div>
						
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								<th>شناسه</th>
								<th>نام قالب</th>
								<th>عنوان نامه</th>
								<th>فرستنده</th>
								<th>امکانات</th>
								
							</tr>
						</thead>
						<tbody>
						<?$query="select * from new_template_email where la='$lang' and site_id='$site_id' order by id desc";
							$result = $coms_conect->query($query);
								while($RS1 = $result->fetch_assoc()) {
								$id=$RS1["id"];
								$title=$RS1["title"];
								$sender=$RS1["sender"];
								$name=$RS1["name"];
								$shenase=$RS1["shenase"];
							?>
							<tr>
								<td><?=$RS1["shenase"]?></td>
								<td><?=$RS1["name"]?></td>
								<td><?=$RS1["title"]?></td>
								<td><?=$RS1["sender"]?></td>
								<td>
									<a id="<?=$id?>" class="edit_menu blue" data-toggle="tab" href="#add_templates" style="font-size: 15px !important;"><span class="ace-icon fa fa-edit bigger-120"></span></a>
									<a id="<?=$id?>" class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;"><span class="ace-icon fa fa-trash-o bigger-120"></span></a></td>
							</tr>
						<?}?>
						</tbody>
					</table>
			
				</div>
			
			</div>
			
			<div class="tab-pane" id="add_templates">
			
					<form class="form-horizontal" id="new_messages" name="new_messages" action="" role="form" method="post" enctype="multipart/form-data">
									<input type="hidden" id="edit_mode" name="edit_mode" value="0">	
									<input type="hidden" id="edit_id" name="edit_id" value="0">	
						<div id="id-message-new-navbar" class="message-navbar clearfix">
							<div>
							<div class="message-bar">
								<h2 style="color: #2a8bcb;">افزودن قالب های نامه / ویرایش</h2>
							</div>

							
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
						
						<div class="page-body">
								<div class="row-fluid"> 
									<div class="col-md-12">
										<div class="row-fluid"> 
										
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-2 control-label" for="family">زبان</label> 
												<div class="form-group col-md-10">
													<?up_create_lang($la,$dbname,$RSconn)?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-2 control-label" for="group_name">شناسه*</label> 
												<div class="form-group col-md-10">
													<input type="text" name="shenase" id="shenase" class="form-control" >									
												</div>
											</div>
										 
										 
											<div class="form-group">
												<label class="col-md-2 control-label" for="family">عنوان*</label> 
												<div class="form-group col-md-10">
													<input type="text" name="title" id="title" class="form-control" >
												</div>
											</div>
										</div>
										 
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-2 control-label" for="group_name">نمایش</label> 
												<div class="form-group col-md-10">
														<?create_up_sub_site($site_id,$dbname,$RSconn)?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-2 control-label" for="group_name">نام*</label> 
												<div class="form-group col-md-10">
													<input type="text" name="name" id="name" class="form-control" >									
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-2 control-label" for="group_name">فرستنده*</label> 
												<div class="form-group col-md-10">
													<input type="text" name="sender" id="sender" class="form-control" >									
												</div>
											</div>
										</div>
										 
										</div>
									 
									</div> 
								</div> 
							
								<div class="row-fluid"> 
									
									<div class="form-group">
									<div class="col-md-12"><div class="col-md-12">
										<label class="col-md-1 control-label">متن</label> 
										<div class="form-group col-md-11">
											<textarea id="text_email" name="text_email"  class="form-control" rows="3"></textarea>

												 <script>
													tinymce.init({
													selector: "#text_email",
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
											</div></div>				
										</div>
									</div>
									
									<!--div class="panel-footer">
										<button type="submit" class="btn btn-primary" ><i class="ace-icon fa fa-check bigger-110"></i>ذخيره</button>	
									</div-->
							
								</div>
						</div>	
					</form>
			</div>
	
<script>			


		$("#lang").change(function () {
			var a="<?=$url?>";
			var b="la="+$(this).val();
			var c="la=<?=$la?>"; 
			var d=a.replace(c,b);
			window.location.href = d;	
		});
		
		$("#site_name").change(function () {
			var a="<?=$url?>";
			var b="site="+$(this).val();
			var c="site=<?=$site_id?>"; 
			var d=a.replace(c,b);
			window.location.href = d;	
		});
		$(".del_menu").click(function () {
			$("#btn_ok").val($(this).attr('id'));
		});
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_new&value=pro_new_template_email&id="+$(this).val(),
				success: function(result){
				}
			});	window.location.href = "newcoms.php?dll=new_Messages&la=fa";	
		});
		$(".edit_menu").click(function () {
		
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_email_tem&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
					var b=result.split('^');
					$("#name").val(b[0]);
					$("#title").val(b[1]);
					$("#edit_mode").val(1);
					$("#edit_id").val(b[2]);
					$("#shenase").val(b[3]);
					$("#sender").val(b[5]);
					tinymce.editors[0].setContent(b[4]);
				}
			});	
		});		
</script>			
			</div>
		</div>
	</div>	
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
         $('#new_language').validate({
            rules: {
				name: {
					required:true,
					
				},
				title: {
					 
					required:true,
				}
            },
            messages: {
				name: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				title: {
					required:"<?=$pro_field_mandatory_fill?>",
					max:'حداکثر باید 2 حرفی باشد',
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? '<?=$pro_1field_missing?>'
                        : '' + errors + '<?=$pro_field_missing?>';
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


<form class="form-horizontal" action="" method="post" name="new" id="new" enctype="multipart/form-data">	
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading"><?=$s_Pages_delete?></h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span><?=$new_del_lang_Confidence?></div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
		</div>
	</div>
	</div>
</div>
</form>

<?session_start();
$name=injection_replace($_POST['name']);
$status=injection_replace($_POST['status']);
$title=injection_replace($_POST['title']);
$align=injection_replace($_POST['align']);
$edit_id=injection_replace($_POST['edit_id']);
$edit_mode=injection_replace($_POST['edit_mode']);
$la='fa';
if($name>""&&$edit_mode==0&&$_SESSION['can_add']==1){
	$query1="insert into new_language(status,name,title,align,date,user_id,ip)
	values ('$status','$name','$title','$align',NOW(),$manager_id,'$custom_ip')";
 
	$coms_conect->query($query1);
	$lang=mysqli_insert_id($coms_conect); 
	@copy("languages/$la.php","languages/$title.php");
	
#######################افزودن در امکانات مدیریتی	
	$query="insert into new_main_menu(id,name,site_id,rang,parent_id,decription,icon,file_name,status,type,file_path,la) 
	select id,name,site_id,rang,parent_id,decription,icon,file_name,status,type,file_path,'$title' from new_main_menu where la='$la'";
	$coms_conect->query($query);
	
	$unic_id=time();
		$query="select id from new_main_menu where la='$title'";
		$result = $coms_conect->query($query);
		while($RS1 = $result->fetch_assoc()) {
			$id=$RS1["id"];
			$query1="update new_main_menu set unic_id=$unic_id where id='$id' and la='$title'"; 
			$coms_conect->query($query1);
			
			$query1q="insert into new_menu_permission(menu_id,permission,group_id,view) 
			values ('$unic_id',1,1,1)";
			$coms_conect->query($query1q);
			//echo $query1q.'<br>';
			$unic_id++;
		}
		

		
		
#########################################################	
	$query1="insert into new_manage_lang(lang_id,manager_id,type) 
	values ('$lang',1,'l')";
	$coms_conect->query($query1);
	
		$query="SELECT lang_id from new_manage_lang where manager_id='$manager_id' and type='l'";
		$result = $coms_conect->query($query);
		$lang=array();
		 while($row = $result->fetch_assoc()) {
			$lang[]=$row['lang_id'];
		}
		$_SESSION["manager_lang"]=$lang;

show_msg($new_successfull);
}else if($name>""&&$edit_mode==1&&$_SESSION['can_edit']==1){
	$file_name= $_FILES["lang_file"]["name"];
	$file_type= $_FILES["lang_file"]["type"];
	$file_tmp= $_FILES["lang_file"]["tmp_name"];
	$path="languages/$title.php";
	if(check_lang_title($title,$_SESSION['manager_title_lang'])==1){
		if($file_name>""){
		upload_php_files($file_name,$file_type,$file_tmp,$path);
		}
		$query1="update new_language set status='$status',ip='$custom_ip', edit_user_id='$manager_id', edit_date=NOW(),align='$align',name='$name' where id=$edit_id"; 
		$coms_conect->query($query1);
		show_msg($new_successfull);
	}
}	
?>

<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  -->

	<div class="tabbable">
		<!--ul class="nav nav-tabs">
			<li class="pull-right" style="right:1%;">
				<i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_language" title="<?=$pro_aafzodann?>"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</i>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" href="#add_language" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						<?=$pro_aafzodann?></a>
					</ul>
				</div>
			</li>	
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?=$new_list_lang_site?> </a></li>
			
		</ul-->
		
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/language.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">زبان</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/language.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
					<?if($_SESSION['can_add']==1){?>
					<li id="newpag" class="addicon">
						<a href="#add_language" data-toggle="tab" data-placement="bottom" title="افزودن زبان" >
							<span class="flaticon-add149"></span>
						</a>
					</li>
					<?}?>
 
				</ul>
			</div>

			</div>
			
			<div class="tab-pane active" id="tab1">
				<div class="tt">
				<!-- #section:main/language.table -->
					<div class="row-fluid">
						<!--div class="col-md-6 yepco"-->
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete" href="#" title="<?=$s_Pages_delete?>"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-primary btn-sm" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
											<?=$s_Pages_delete?> 
										</a>
									</ul>
								</div>
							</div>
						<!--/div-->
						
						<div class="col-md-10">
							<div class="form-group yepco">
								<form action='' method='post' class="navbar-form navbar-left pull-right yepco" role="search">
									<input type="text" name='search_lang' class="form-control search2" placeholder="<?=$s_Pages_search?>">
								</form>
							</div>		
						</div>
					</div>
				
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								<!--th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>
								</th-->
								<th><?=$sd_Shop_basket_row?></th>
								<th><?=$s_LanguageNew_name?> <?=$s_home_language?></th>
								
								<th><?=$s_Language_sign?></th>
								<th><?=$new_Direction?></th>
								<th><?=$ads_AdsNew_sid?></th>
								<th><?=$dl_download?></th>
								<th><?=$new_sysmenu[2]?></th>
							</tr>
						</thead>
						<tbody>
						<?if(isset($_POST['search_lang'])){
							$condition="where name like '%{$_POST['search_lang']}%' or title like '%{$_POST['search_lang']}%'";
							
						}
						
							$query="select * from new_language $condition";
							 $i=1;
							$result = $coms_conect->query($query);
								while($RS1 = $result->fetch_assoc()) {
								$id=$RS1["id"];
								$title=$RS1["title"];
								$status=resolve_status($RS1["status"]);
								$align=$RS1["align"];
								if($align==0)
								$align="RTL";
								if($align==1)
								$align="LTR";
								$name=$RS1["name"];
								
								
						?>
							<tr>
								<!--td class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkNumber" />
										<span class="lbl"></span>
									</label>
								</td-->
								<td><?=$i?></td>
								<td><?=$name?></td>
								<td><?=$title?></td>
								<td><?=$align?></td>
								<td><span data-value="<?=$RS1["status"]?>" class="lang_status editable editable-click" data-pk="<?=$RS1["id"]?>" ><?if($RS1["status"]==1){echo 'فعال';}else{echo 'غیر فعال';}?></span> </td>
								<td><a href="<?="newcoms.php?yep=new_Language&file_name=$title"?>"><?=$dl_NewsletterNew_title?><?=$s_home_language?></a></td>
								<td>
									<?if($_SESSION['can_edit']==1){?>
									<a id="<?=$id?>" class="edit_menu blue" href="#add_language" data-toggle="tab" title="<?=$sd_shop_shipping_edit?>" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-edit bigger-120"></i>
									</a>
									<?}if($_SESSION['can_delete']==1){?>
									<a id="<?=$id?>" class="del_menu red" data-title="Delete" data-toggle="modal" title="<?=$c_Poll_del?>" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</a>
									<?}?>
									
								</td>
							</tr>
						<?$i++;}?>
						</tbody>
					</table>
				<!-- /section:main/language.table -->
				</div>
			</div>
			<div class="tab-pane" id="add_language">
			<form class="form-horizontal" action="" method="post" name="new_language" id="new_language" enctype="multipart/form-data">
				<input type="hidden" id="edit_mode" name="edit_mode" value="0">	
				<input type="hidden" id="edit_id" name="edit_id" value="0">	
						
				<div id="id-message-new-navbar" class="message-navbar clearfix">
					<input type='hidden' id='validation' value='1'>
					<?if($_SESSION['can_add']==1){?>
					<a type="submit"   id="submit_page" href="#"  class="save submit2" data-original-title="ذخیره">
						<span class="flaticon-verified9">
						</span>
					</a>
					<?}?>
					<a href="newcoms.php?yep=new_Language" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
						<span class="flaticon-left-arrow9">
						</span>
					</a>
				</div>
				</br>
						
					<script>
					$("#submit_page").click(function (e){
						if($("#validation").val()==0)
						 e.preventDefault();
					 else
					$("#new_language").submit();
					});
					</script>
					<div class="panel-body">
						<div class="col-md-6">
						<!-- #section:main/language.form -->
							<div class="form-group">
								<label class="col-sm-2 control-label"><?=$s_LanguageNew_name?> <?=$s_home_language?>*</label>
								 <div class="col-sm-10">
									<div class="form-group col-sm-8">
										<input type="text" name="name" id="name" class="form-control" >														
									</div>
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-sm-2 control-label"><?=$s_Language_sign?>*</label>
								 <div class="col-sm-10">
									<div class="form-group col-sm-8">
										<input type="text" name="title" id="title" class="form-control" maxlength="2">
										<div id="show_msgbox"></div>													
									</div>
								</div>
							</div>
						
							<div class="form-group">
								 <label class="col-sm-2 control-label"><?=$new_Direction?>*</label>
								 <div class="col-sm-10">
								 <div class="form-group col-sm-8">
									 <select   name="align" id="align" class="form-control" >
										 <option value="0">RTL</option> 
										 <option value="1">LTR</option>
									 </select>
								 </div>
								 </div>
							</div>
							<div class="form-group">
								 <label class="col-sm-2 control-label"><?=$ads_AdsNew_sid?></label>
								 <div class="col-sm-10">
								 <div class="form-group col-sm-8">
									 <select   name="status" id="status" class="form-control" >
										 <option value="1"><?=$Ads_AccountNew_type2?></option> 
										 <option value="0"><?=$Ads_AccountNew_type1?></option>
									 </select>
								 </div>
								 </div>
							</div>
							<!--div class="form-group">
								<label class="col-sm-2 control-label"><?=$dl_upload_file_thumb?> <?=$s_home_language?></label>
								<div class="col-sm-10">
									<div class="form-group col-sm-8">
										<label class="ace-file-input">
										<input type="file" name="lang_file" disabled id="id-input-file-2"><span class="ace-file-container" data-title="انتخاب کنید"><span class="ace-file-name" data-title="فایلی موجود نیست..."><i class=" ace-icon fa fa-upload"></i></span></span>
										<a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a>
										</label>									
									</div>
								</div>
							</div-->
						</div>
					<!-- /section:main/language.form -->
						<div class="col-md-6">
							<div class="alert alert-info">
								<b>نکات مهم در ساخت زبان جدید :</b><br>
								 	۱- در انتخاب نام نشانه دقت کنید این گزینه بعد از ساخت قابلیت تغییر ندارد.<br>
									۲- بعد از ساخت زبان جدید فایل زبان فارسی را از لیست زبان ها دانلود کنید.<br>
									۳- فایل دانلود شده را به نام نشانه زبان جدید خود تغییر دهید .<br>
									۴- فایل را ترجمه کرده و در شاخه language آپلود کنید.<br>
							</div>
						</div>
					
					
					
					</div>
					<!--div class="panel-footer">
							<button type="submit" class="btn btn-primary" ><i class="ace-icon fa fa-check bigger-110"></i>ذخيره</button>
					</div-->
				</form>
				
			</div>
		</div>
<style>
@media (min-width: 767px){
.panel-body{
  padding-left: 100px;
  padding-right: 100px;
  padding-top: 65px;
}
}
@media (max-width: 768px){
.panel-body{
padding-top: 70px;
}}
</style>		
		
<?if($_GET['file_name']>""){
	$temp=$_GET['file_name'];
	$file="languages/$temp.php";
	download_file($file);	
}
?>	
<?$_SESSION["del_item"]='del_lang';
$_SESSION["edit_item"]='edit_lang';
?>		
<script src="ajax_js/languege.js"></script>
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
<style>
	.editableform .form-control {
		width: auto;
		direction: ltr;
	}
	.editable-clear-x {
		width: 0px;
	}
</style>  
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>	  
<script type="text/javascript">
$(function() {
  $.fn.editable.defaults.mode = 'inline';
  $('.lang_status').editable({
		type: 'select',
		name:'change_status_lang',
		url: '/New_ajax.php',
		source:"{1:'فعال',0:'غیر فعال'}",
		//source:"{1: 'منتشر شده',0: 'پيش نويس'}",
		ajaxOptions: {
			type: 'get',
		},
 
		error: function(response) {
			alert(response);
		}
   });
});
</script>
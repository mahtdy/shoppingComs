
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>

<script src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>
<script src="/yep_theme/default/rtl/js/menubar/main_menu_functions.js"></script>
	<!-- yepco icon picker -->

	<!-- Bootstrap-Iconpicker -->
	<link rel="stylesheet" href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>

	
<script type="text/javascript">
 $(document).ready(function() {
    $('#e9').select2({
        data: [
        ],
        allowClear: true,
        multiple: true,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
});
</script>

<script type="text/javascript">
	jQuery(function($){
	
		$('.dd').nestable();
	
		
		
		$('[data-rel="tooltip"]').tooltip();
	
	});
</script>

<script>
$(document).ready(function(){
 hideAllDivs = function () {
    $("#dste_new123").hide();
};

handleNewSelection = function () {

    hideAllDivs();
    
    switch ($(this).val()) {
        case '1':
            $("#dste_new123").show();
        break;
    }
};

$(document).ready(function() {
    
    $("#project_billing_code_id").change(handleNewSelection);
    
    // Run the event handler once now to ensure everything is as it should be
    handleNewSelection.apply($("#project_billing_code_id"));
    
});
});
5498770574
    8835603767525529
</script>
<div id="sortDBfeedback" style='display:none'>
</div>
<form class="form-horizontal" id="menubar" name="menubar" action="" role="form" method="post" enctype="multipart/form-data">	
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading"><?=$c_Poll_del?></h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span><?=$new_del_category_confidence?></div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
		</div>
	</div>
	</div>
</div>
</form>

<div class="tabbable">
	<!--ul class="nav nav-tabs">
		<li class="active"><a href="#tab3" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i><?=$new_feature_management?></a></li>
	</ul-->
		
	<div class="msheet tab-content">
			
		<div class="secfhead">
		<!-- #section:main/system_cat.head -->
		<div class="sectitle">
			<div class="icon"><span class="flaticon-file23" style=""></span></div>
			<div class="title"><p class="titr">امکانات مدیریتی</p><p class="lead">توضیحات این بخش</p></div>
		</div>
		<!-- /section:main/system_cat.head -->
		<div class="toolmenu">
			<ul>
				<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
			</ul>
		</div>

		</div>
		
		<div class="tab-pane active" id="tab3">
				<div class="row">
					<div class="col-md-12">

<?

$file_name=injection_replace($_POST['file_name']);
$menu_id=injection_replace($_POST['menu_id']);
$edit_mode=injection_replace($_POST['edit_mode']);
$status=injection_replace($_POST['status']);

if($status!=1)
$status=0;
$icon=injection_replace($_POST['icon']);
$name=injection_replace($_POST['name']);
$filepath=explode("/",$file_name);
$file_path=$filepath[1]; 


	$sql="SELECT unic_id,a.id as ide FROM `new_main_menu` a ,new_menu_permission b WHERE a.id=b.menu_id";
	$result = $coms_conect->query($sql);
    while($row = $result->fetch_assoc()) {
		
		$unic_id=$row['unic_id'];
		$id=$row['ide'];
		$query1="update new_menu_permission set menu_id=$unic_id where menu_id=$id"; 
		$coms_conect->query($sql);
		
	}	

	
	
$site_id='main';	
include "languages/$la.php";$_SESSION['menu_lang']='';
$_SESSION['menu_lang']=$new_sysmenu;


if($_POST['managers_lang']>""){
$la=$_POST['managers_lang'];
include "languages/$la.php";$_SESSION['menu_lang']='';
$_SESSION['menu_lang']=$new_sysmenu; 
}else 
$la='fa';


	
if(($file_name)>""&&$edit_mode==0&&$_SESSION['can_add']==1){
	$sql="SELECT id FROM new_main_menu ORDER BY id DESC LIMIT 1";
	
	$result = $coms_conect->query($sql);
	$row = $result->fetch_assoc();
	$id=$row['id'];
	$id++;
	
	$unic_id=time();
	$query1="insert into new_main_menu(unic_id,id,file_path,status,icon,file_name,name,rang,type,date,user_id,ip,la,site_id) 
	values ($unic_id,$id,'$file_path','$status','$icon','$file_name','$name',$id,'main_menu',NOW(),$manager_id,'$custom_ip','$la','$site_id')";
	$coms_conect->query($query1);
	
	$query1="insert into new_menu_permission(menu_id,permission,group_id,view) 
	values ($unic_id,1,1,1)";
	$coms_conect->query($query1);
		$query="select title from new_language where title<>'$la'";
		

		$result = $coms_conect->query($query);
		while($RS1 = $result->fetch_assoc()) {
			
			$title=$RS1["title"];
			$unic_id++;
			$query1="insert into new_main_menu(unic_id,id,file_path,status,icon,file_name,name,rang,type,date,user_id,ip,la,site_id) 
			values ($unic_id,$id,'$file_path','$status','$icon','$file_name','$name',$id,'main_menu',NOW(),$manager_id,'$custom_ip','$title','$site_id')";
			$coms_conect->query($query1);
		}
	show_msg($new_successfull);
}else 	if(($_POST['file_name'])>""&&$edit_mode==1&&$_SESSION['can_edit']==1){
	$query1="update new_main_menu set file_path='$file_path',file_name='$file_name',status=$status,name='$name',icon='$icon',edit_date=NOW(),edit_user_id='$manager_id',ip='$custom_ip' where unic_id='$menu_id'"; 
	$coms_conect->query($query1);
	show_msg($new_successfull);
	
}	
	$sql="SELECT status,name,file_name,icon FROM new_main_menu where unic_id='$menu_id'";
	$result = $coms_conect->query($sql);
	$row = $result->fetch_assoc();
 


?>						
						<form id="menu1" name="menu1" action="" role="form" method="post" enctype="multipart/form-data"
							data-fv-framework="bootstrap"
							data-fv-message="This value is not valid"
							data-fv-icon-validating="glyphicon glyphicon-refresh">	
			
								<div class="col-md-12">
									<div class="panel panel-success ">
										<div class="panel-heading">
											<h3 class="panel-title"><?=$new_feature_new?></h3>
										</div>
										<!-- #section:main/system_cat.form -->
										<div class="panel-body col-md-7">
											<input type="hidden" id="edit_mode" name="edit_mode" value="0">
											<input type="hidden" id="menu_id" name="menu_id" value="0">	
										
											<div class="form-group row mahdi">
												<label class="col-md-2 control-label" for="family"><?=$System_CatsNew_name?></label> 
												<div class="form-group col-md-7">
													<input type="text" value="<?=$row['name']?>" id="name" name="name" class="form-control"
													data-fv-notempty="true"
													data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-md-2 control-label" for="family"><?=$new_icon?> <?=$dl_and?> <?=$s_Pages_filename?></label> 
												<div class="form-group col-md-7">
													<div class="input-group">	
														<input type="text" id="file_name" value="<?=$row['file_name']?>"  class="form-control" name="file_name" value=""  style="direction: ltr;"
														data-fv-notempty="true"
														data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
														<span class="input-group-btn">
															<button class="btn btn-default form-control" id="icon" name="icon" data-iconset="fontawesome" data-icon="<?=$icon?>" role="iconpicker" ></button>
														</span>											
													</div>
												</div>
											</div>
												
											<div class="form-group row">
												<label class="col-md-2 control-label" for="family"><?=$pro_unactive?></label> 
												<div class="form-group col-md-7">
													<a class="blue" href="#">
														<input id="status" name="status" <?if($row['status']==1)echo 'checked'?> value="1" class="ace ace-switch ace-switch-6" type="checkbox"/>
														<span class="lbl"></span>
													</a>
										
												</div>
											</div>
											
										</div>
										<br>
										<!-- /section:main/system_cat.form -->
										<div class="col-md-5">
											<div class="alert alert-warning">
												<P>در قسمت کد عنوان کد اندیس ارایه new_sysmenu در فایل زبان  را قرار دهید</p>
												<P>در نام فایل هم نام فایلی را که در پوشه newcoms قرار دارد را بدون پسوند قرار دهید</p>
												<P class='red'>پسوند فایل حتما باید php4 باشد</p>
											</div>
										</div>
										<div class="panel-footer bttools">
										<?if($_SESSION['can_add']==1){?>
											<button type="submit" id="submit_page" class="btn btn-success" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
										<?}?>
										</div>
								</div>		
							</div>
						</form>		
							
						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title"><?=$new_sort_menu?></h3>
								</div>
							
								<div class="panel-body">
								<!-- #section:main/system_cat.table -->
								<?//	
								$sql = "SELECT unic_id,file_path,id,name,status FROM new_main_menu WHERE parent_id='0' and site_id='$site_id' and la='$la' ORDER BY rang";

								$result = $coms_conect->query($sql);
								echo "<div class='cf nestable-lists'>\n";
									echo "<div class='dd dd-draghandle' id='nestableMenu'>\n\n";
										echo "<ol class='dd-list'>\n";
										  while($row = $result->fetch_assoc()) {
												echo "\n";
												
												$id=$row['id'];
												$unic_id=$row['unic_id'];
												$file_path=$row['file_path'];
												$str="";
												$status=$row['status'];
												$name=$_SESSION["menu_lang"][$row['name']];
												if($status==1)
												$str='checked';
												echo "<li class='dd-item dd2-item' data-id='{$row['id']}'>";
													echo '<div class="dd-handle dd2-handle"> 
													 	     <i class="normal-icon ace-icon fa fa-bars blue bigger-130"></i>
															 <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
														  </div>';
														echo '<div class="dd2-content">';
														echo '	<div class="pull-right action-buttons">';																
																echo '<a class="blue" href="javascript:void(0)">
																	<input '.$str.' id='.$unic_id.' name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox"/>
																	<span class="lbl"></span>
																	</a>
																	<a id='.$unic_id.' title='.$sd_shop_shipping_edit.' class="edit_menu blue" href="#">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>
																	<a id='.$id.' title='.$c_Poll_del.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	</a>
																</div>'.$name.'</div>
														';
													creat_main_menu($row['id'],$site_id,$la,$coms_conect);
												echo "</li>\n";
											}
										echo "</ol>\n\n";
									echo "</div>\n";
								echo "</div>\n\n";
								//?>
								<!-- /section:main/system_cat.table -->
								</div>	
							</div>
						</div>	
				</div>
			</div>
			</div>
				
		
<?$_SESSION["del_item"]='del_new_main_menu';
$_SESSION["edit_item"]='edit_new_main_menu';					
$_SESSION["edit_secend_item"]='edit_new_site';?>					
<script src="ajax_js/system_cat.js"></script>	
<script>
$(document).ready(function(){

		
		
		var updateOutput = function(e)
		{
			var list   = e.length ? e : $(e.target),
				output = list.data('output');
			if (window.JSON) {
				//output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
				menu_updatesort(window.JSON.stringify(list.nestable('serialize')));
			} else {
				output.val('JSON browser support required for this demo.');
			}
		};
		
		// activate Nestable for list menu
		$('#nestableMenu').nestable({
			group: 1
		})
		.on('change', updateOutput);

		
		
		// output initial serialised data
		updateOutput($('#nestableMenu').data('output', $('#nestableMenu-output')));

		
		
		
	});
	</script>	
<script>
$("#managers_lang").change(function () {	
	$("#name").val('');
	$("#file_name").val('');
	$("#menu1").submit();
});	
</script>
	</div>
</div>	
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">

<script>
$(document).ready(function() {
    $('#menu1').formValidation();
});
</script>
		
		<!-- Bootstrap-Iconpicker Iconset for Font Awesome -->
	<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"></script>
	<!-- Bootstrap-Iconpicker -->
	<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
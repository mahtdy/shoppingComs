<?##########################وارد کردن پرمیژن ها برای اولین بار################
/*$sql="select d.id as menu_id ,a.id as group_id from new_groups a ,new_modules b,new_menu_permission c ,new_modules_cat d 
where a.id=c.group_id and c.menu_id=b.unic_id  and c.permission=1 and b.id=d.type";

	//$result=mysql_db_query($dbname,$sql,$RSconn);
	//while($RS1=mysql_fetch_array($result)){
	$result = $coms_conect->query($sql);
    while($RS1 = $result->fetch_assoc()) {
	$menu_id=$RS1["menu_id"];
	$group_id=$RS1["group_id"];
	//echo $sql;exit;	
	$query1="insert into new_cat_permission(menu_id,permission,group_id,view) 
	values ($menu_id,1,$group_id,1)";
	$coms_conect->query($query1);
	}*/
##########################وارد کزدن ماژول ها در جدول دسته بندی ماژول ها################
/*$sql="select *  from new_modules ";
	//$result = $coms_conect->query($sql);
   // while($RS1 = $result->fetch_assoc()) {
	$id=$RS1["id"];
	$name=$RS1["name"];
	//echo $sql;exit;	
	$query1="insert into new_modules_cat(parent_id,name,type) 
	values (-1,'$name',$id)";
	$coms_conect->query($query1);
	}	
*/
	
 
$edit_id=injection_replace($_GET['edit_id']);
	$array_value=injection_replace($_POST['array_value']);
	$post=injection_replace($_POST['post']);
	$edit_mode=injection_replace($_POST['edit_mode']);
$tmp=implode(",",$_SESSION["manager_group_permisson"]);	
if($edit_id>""&&$_SESSION['manager_group']!=1){
	$query="select id from new_groups where id in($tmp) ";
	$result = $coms_conect->query($query);
    while($RS1 = $result->fetch_assoc()) {
		$cont[]=$RS1["id"];
	}
	if(!in_array($edit_id,$cont)){
		header ("location : newcoms.php?yep=new_SignOut");
		exit;
	}
}
####ویرایش برای اولین بار
	if($edit_id>''&&$_SESSION['can_edit']==1&&$post!=1){
		$query12="select count(view) as count_row from new_cat_permission where group_id=$edit_id";
		 
		$result12 = $coms_conect->query($query12);
		$row = $result12->fetch_assoc();
		if ($row['count_row'] == 0){
			$query="insert into new_cat_permission(menu_id,permission,group_id,view) 
			select menu_id,0,$edit_id,1 from new_cat_permission where group_id='$manager_group'";
			$coms_conect->query($query);
			 
		}
####به روز رسانی دسته بندی		
	}else if($edit_id>''&&$_SESSION['can_edit']==1&&$post==1){
		 $query12="select menu_id from new_cat_permission where group_id=$manager_group and permission=1";
		 $result12 = $coms_conect->query($query12);
		 while($RS121 = $result12->fetch_assoc()) {
			 $menu_id=$RS121["menu_id"];
			 $query1="update new_cat_permission set view=1 where group_id=$edit_mode and menu_id=$menu_id"; 
			 $coms_conect->query($sql);
		}
	}


	
		if($post==1&&$edit_mode>0&&$_SESSION['can_edit']==1){
			$query1="delete from new_cat_permission where group_id=$edit_mode"; 
			$coms_conect->query($query1);
			$chack_val=explode(",",$array_value);
			$sql = "SELECT id from new_modules_cat a ,new_cat_permission b where a.id=b.menu_id and view=1 and group_id=$manager_group";
			$result = $coms_conect->query($sql);
			while($row = $result->fetch_assoc()) {
				$id=$row['id'];
				if(in_array($id,$chack_val)){
					$permission=1;
				}
				else{
					$permission=0;
				}
				$query1="insert into new_cat_permission(menu_id,permission,group_id,view) 
				values ('$id','$permission',$edit_mode,1)";
				$coms_conect->query($query1);
			}
	}	
?>
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

<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<!--[if lt IE 9]><script src="/yep_theme/default/rtl/js/jsTree/respond.js"></script><![endif]-->
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css">
<script src="/yep_theme/default/rtl/assets/js/ace/elements.onpage-help.js"></script>
<script src="/yep_theme/default/rtl/assets/js/ace/ace.onpage-help.js"></script>	

</br>
<div class="tabbable">
		<!--ul class="nav nav-tabs" style="margin-top:2px;">
			
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			دسترسی دسته بندی گروه مدیران </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:subsite/cat_group.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">دسترسی دسته بندی گروه مدیران</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:subsite/cat_group.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			<div class="tab-pane <?if($edit_id<1) echo 'active';?>" id="tab1">
				<!-- #section:subsite/cat_group.table -->
				<div class="tt">
					<div class="row-fluid">
						<!--div class="col-md-6 yepco">
							
						</div-->
						<div class="col-md-10">
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
								<th class="center">
									ردیف
								</th>
								<th>نام گروه</th>
								<th>توضیحات</th>								
								<th>امکانات</th>
								
							</tr>
						</thead>
						<tbody>
							<?
							$i=1;
							//if($_SESSION['manager_user_name']!='comsroot')
							//$str1="where parrent_id=$manager_group or id=$manager_group";
							$groh_id=implode(",",$_SESSION["manager_group_permisson"]);
							$query="select a.name,a.tozihat,a.id from new_groups a ,new_modules b,new_menu_permission c where a.id=c.group_id 	
							 and b.unic_id=c.menu_id	and  c.permission=1 and a.id in($groh_id) group by c.group_id";
							//echo $query;
							$_SESSION["manager_group_permisson"];
							$result = $coms_conect->query($query);
								while($RS1 = $result->fetch_assoc()) {
								$id=$RS1["id"];
								$name=$RS1["name"];
								$tozihat=$RS1["tozihat"];
							?>
							<tr>
								<td class="center">
									<?=$i;?>
								</td>
								<td><?=$name?></td>
								<td><?=$tozihat?></td>
								<td><?//echo $id.$manager_group.'<br>';?>
								<?if($_SESSION["can_edit"]==1&&$manager_group!=$id){?>
									<a id="<?=$id?>" class="edit_menu blue" onclick="location.href = '<?="newcoms.php?yep=new_cat_group&edit_id=$id"?>';" title="ویرایش" style="font-size: 15px !important;"><i class="ace-icon fa fa-edit bigger-120"></i></a>
								<?}?>
								</td>
							</tr>
						<?$i++;}?>	
						</tbody>
					</table>
				
		
				</div>
				<!-- /section:subsite/cat_group.table -->
			</div>
			
			<div class="tab-pane <?if($edit_id>"") echo 'active';?>" id="add_templates">
			
				<form  action="" method="post" name="reg_presonal" id="reg_presonal" role="form" enctype="multipart/form-data">
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						
						<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
							<span class="flaticon-verified9">
							</span>
						</a>
						<input type='submit'  id='submit_btn' style='display:none'>
						<a onclick="location.href = 'newcoms.php?yep=new_cat_group';" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
						</a>
					</div>
				 <script>
						$(function () {
							$(".save-draft2").click(function(){
								$("#status").val("0");
								$("#submit_btn").click();
							});
							$(".submit2").click(function(){
								$("#status").val("1");
								$("#submit_btn").click();
							});
						});
						</script>
					</br>
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
					<div class="panel-body">
						
						<div class="row-fluid"> 
							<div class="col-md-12">
								<div class="row-fluid"> 
									
										<input type="hidden" name="post" value="1">
										<input type="hidden" name="edit_mode" value="<?if($edit_id>0) echo $edit_id ;else echo 0;?>">
										<input type="hidden" id="array_value" name="array_value" value="0">
										<!--input type="hidden" id="group_id" name="group_id" value="3"-->
											<div class="col-sm-10">
												<div id="jstree-proton-3"  class="proton-demo"></div>
											</div>	
																			
													<script>
													$(function() {
														$('#jstree-proton-3').jstree({
															'plugins': ["wholerow", "checkbox"],
															'checkbox': { //new config
															'keep_selected_style': true,
															'three_state': false,
															'tie_selection':true,
															'cascade':'up'				                
															},
																'core': {
																'data': [
																<?$sql = "SELECT a.id,a.name,b.id as ide FROM new_modules a,new_modules_cat b,new_menu_permission c where c.permission=1 and c.group_id=$edit_id  and a.unic_id=c.menu_id and a.id=b.type group by a.id";
													$result = $coms_conect->query($sql);
													//echo $sql;
														while($row = $result->fetch_assoc()) {
															
														$str="";
														$name=$row['name'];
														$icon=$row['icon'];
														$permission=$row['permission'];
														$id=$row['id'];
														if($permission==1&&$edit_id>"")
														$str =",'state': {'selected': 'true'}";
													//	else
													//	$str =",'state': {'selected': 'open'}";
														
													echo "{'text': '$name' ,'id':'$id' $str ";
													 
													creat_fistr_madual_cat_permission0($id ,$edit_id,$manager_group,$id,$coms_conect);
													echo "},";
														}
														?>	],
																'themes': {
																	'name': 'proton',
																	'responsive': true
																}
															}
														});
													});
													</script>
													
											<?//=$sql?>		
<script>
	$(function () {
		$('#jstree-proton-3').jstree({'plugins':["wholerow","checkbox"]});
		$('#jstree-proton-3').on("changed.jstree", function (event, data) {
			$("#array_value").val(data.selected);
			///alert(data.selected);
		});
	});
</script>		

								</div>
							</div> 
									
						</div> 	
						
					</div>
				</form>
				
			</div>
			
		</div>			
</div>

<script type="text/javascript">
$(function () {	
	$(document).on('click', '.conbtnGetAll', function(event) {

        if($('.conchkNumber:checked').length) {
			var chkId = '';
			$('.conchkNumber:checked').each(function() {
				chkId += $(this).val() + ",";
			});
			chkId =  chkId.slice(0,-1);
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

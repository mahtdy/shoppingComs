<?

$edit_id=injection_replace($_GET['edit_id']);
	$array_value=injection_replace($_POST['array_value']);
	$post=injection_replace($_POST['post']);
	$edit_mode=injection_replace($_POST['edit_mode']);
	$tozihat=injection_replace($_POST['tozihat']);
	$name=injection_replace($_POST['name']);
$tmp=implode(",",$_SESSION["manager_group_permisson"]);	
if($edit_id>""){
check_lang_title($edit_id,$_SESSION["manager_group_permisson"]);
}



	
		if($post==1&&$edit_mode>0&&$name>""&&$_SESSION['can_edit']==1){
			$query1="update new_groups set tozihat='$tozihat',name='$name' where id=$edit_mode"; 
		 
			$coms_conect->query($query1);
			$query1="delete from new_menu_permission where group_id=$edit_mode"; 
			 
			$coms_conect->query($query1);

			$sql = "SELECT id,unic_id,permission as view from new_main_menu a ,new_menu_permission b where a.unic_id=b.menu_id and la='fa'  and group_id=$manager_group";
			//$result = mysql_query($sql, $connection);
			
			$result = $coms_conect->query($sql);
		 	$chack_val=explode(",",$array_value);
			
			
			while($row = $result->fetch_assoc()){
			$id=$row['id'];
			$unic_id=$row['unic_id'];
			$view=$row['view'];
				if(in_array($id,$chack_val)){
					$permission=1;
					check_lang_title($id,$_SESSION["menu_permission"]);
				}
				else{
				$permission=0;
				}
				$query1="insert into new_menu_permission(menu_id,permission,group_id,view) 
				values ('$unic_id','$permission',$edit_mode,$view)";
				//echo $query1.'<br>';
				$coms_conect->query($query1);
			}
			
				/*$query12="select menu_id from new_menu_permission where group_id=$manager_group and permission=1";
				$result12=mysql_db_query($dbname,$query12,$RSconn);
				while($RS121=mysql_fetch_array($result12)){
					$menu_id=$RS121["menu_id"];
					$query1="update new_menu_permission set view=1 where group_id=$edit_mode and menu_id=$menu_id"; 
					mysql_db_query($dbname,$query1,$RSconn);
				}*/
		
		//header ("location:newcoms.php?yep=new_GroupNew");
		show_msg("گروه با موفقیت ویرایش گردید");
	}elseif($post==1&&$edit_mode>0&&$name>""&&$_SESSION['can_edit']!=1){
	show_msg_warninig("$new_forbidden");
	}	

		if($post==1&&$edit_mode==0&&$name>""&&$_SESSION['can_add']==1){
			$sql = "SELECT id,unic_id,permission as view from new_main_menu a ,new_menu_permission b where a.unic_id=b.menu_id and la='fa'  and group_id=$manager_group";
			
			$result = $coms_conect->query($sql);
		 
			
			
			
			$chack_val=explode(",",$array_value);
			$j=0;
			$query1="insert into new_groups(name,tozihat,parrent_id,user_id) 
			values ('$name','$tozihat',$manager_group,$manager_id)";
			$coms_conect->query($query1);
			 $group_id=mysqli_insert_id($coms_conect);
			 array_push($_SESSION["manager_group_permisson"],"$group_id");
		   	while($row = $result->fetch_assoc()) {
				$id=$row['id'];
				$unic_id=$row['unic_id'];
				$view=$row['view'];
				
				if(in_array($id,$chack_val)){
					$permission=1;
					check_lang_title($id,$_SESSION["menu_permission"]);
				}
				else{
					$permission=0;
				}
				$query1="insert into new_menu_permission(menu_id,permission,group_id,view) 
				values ('$unic_id','$permission',$group_id,$view)";
				$coms_conect->query($query1);
				
			
			}
			/*$query12="select menu_id from new_menu_permission where group_id=$manager_group and permission=1";
				$result12=mysql_db_query($dbname,$query12,$RSconn);
				while($RS121=mysql_fetch_array($result12)){
					$menu_id=$RS121["menu_id"];
					$query1="update new_menu_permission set view=1 where group_id=$group_id and menu_id=$menu_id"; 
					mysql_db_query($dbname,$query1,$RSconn);
				}*/
			show_msg($new_successfull);
	}else if($post==1&&$edit_mode==0&&$name>""&&$_SESSION['can_add']!=1){
	show_msg_warninig("$new_forbidden");
	}
if($edit_id>0){
	$query="select tozihat,name from new_groups where id=$edit_id";
	$resultd1 = $coms_conect->query($query);
	$RS1 = $resultd1->fetch_assoc();
	 
		$edit_name=$RS1["name"];
		$edit_tozihat=$RS1["tozihat"];
	/*	$query12="select menu_id from new_menu_permission where group_id=$manager_group and permission=1";
		$result12=mysql_db_query($dbname,$query12,$RSconn);
		while($RS121=mysql_fetch_array($result12)){
			$menu_id=$RS121["menu_id"];
			$query1="update new_menu_permission set view=1 where group_id=$edit_id and menu_id=$menu_id"; 
			mysql_db_query($dbname,$query1,$RSconn);
		} */
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

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف گروه زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok"  data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>

<div class="modal fade" id="users" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">اعضای گروه</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning" id="qaz"> </div>
				
		</div>
		<div class="modal-footer ">
				<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خروج</button>
		</div>
	</div>
	</div>
</div>



<div class="tabbable">

		<!--ul class="nav nav-tabs" style="margin-top:2px;">
			<li class="pull-right" style="right:1%;">
				<i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_templates" title="ایجاد گروه جدید"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</i>
				<?if($_SESSION["can_add"]==1){?>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" href="#add_templates" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						ایجاد گروه جدید</a>
					</ul>
				</div>
				<?}?>
			</li>	
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			دسترسی گروه مدیران </a></li>
			
		</ul-->
	<div class="col-sm-12" id="show_msg" style="display:none" >
    <div class="alerts alert-danger  fade">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>این گروه دارای مدیر می باشد. ابتدا مدیران را حذف نمایید</strong> 
    </div>
  </div>
  <script>
   $(".alerts").delay(6000).addClass("in").fadeOut(6000);
</script>	
		
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:subsite/groupnew.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">دسترسی گروه مدیران</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:subsite/groupnew.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

					<li id="newpag" class="addicon">
						<a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن گروه جدید" >
							<span class="flaticon-add149"></span>
						</a>
					</li>
					 
					<!--li>
						<a  data-toggle="modal" data-target="#searching" data-placement="top" title="جستجوی پیشرفته" >
							<span class="flaticon-search74"></span>
						</a>
					</li-->
				</ul>
			</div>

			</div>
			
			<div class="tab-pane <?if($edit_id<1) echo 'active';?>" id="tab1">
				<!-- #section:subsite/groupnew.table -->
				<div class="tt">
					<div class="row-fluid">
						<!--div class="col-md-6 yepco"-->
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-danger btn-sm" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
											حذف 
										</a>
									</ul>
								</div>
							</div>
						<!--/div-->
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
								<th width="25px">ردیف</th>
								<!--th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>
								</th-->
								<th>نام گروه</th>
								<th>توضیحات</th>								
								<th>امکانات</th>
								
							</tr>
						</thead>
						<tbody>
							<?
							$j=1;
							$groh_id=implode(",",$_SESSION["manager_group_permisson"]);
							$query="select id,name,tozihat from new_groups where id in($groh_id)";
							$result = $coms_conect->query($query);
								 while($RS1 = $result->fetch_assoc()) {
								$id=$RS1["id"];
								$name=$RS1["name"];
								$tozihat=$RS1["tozihat"];
							?>
							<tr>
								<td><?=$j?></td>
								<?/*?><td class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkNumber" />
										<span class="lbl"></span>
									</label>
								</td><?*/?>
								<td><?=$name?></td>
								<td><?=$tozihat?></td>
								<td><?//echo $id.$manager_group.'<br>';?>
								<?if($_SESSION["can_edit"]==1&&$manager_group!=$id){?>
									<a id="<?=$id?>"  href="#" class="edit_menu blue" onclick="location.href = '<?="newcoms.php?yep=new_GroupNew&edit_id=$id"?>';" title="ویرایش" style="font-size: 15px !important;"><i class="ace-icon fa fa-edit bigger-120"></i></a>
									<?$RS23["count"]=get_result("select count(id) as count from new_groups where parrent_id=$id",$coms_conect);
								 }if($RS23["count"]==0&&$_SESSION["can_delete"]==1&&$manager_group!=$id){?>	
									<a id="<?=$id?>" href="#" class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" title="حذف" style="font-size: 15px !important;"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
								<?}?>
								<a id="<?=$id?>" href="#" class="show_users blue" data-title="Delete" data-toggle="modal" data-target="#users" data-placement="top" rel="tooltip" title="اعضای گروه" style="font-size: 15px !important;"><i class="ace-icon fa fa-users bigger-120"></i></a>
								
								</td>
							</tr>
						<?$j++;}?>	
						</tbody>
					</table>
				
		
				</div>
				<!-- /section:subsite/groupnew.table -->
			</div>
			
			<div class="tab-pane <?if($edit_id>"") echo 'active';?>" id="add_templates">
			
				<form  action="" method="post" name="reg_presonal" id="reg_presonal" role="form" enctype="multipart/form-data">
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						<!--div>
						<div class="message-bar">
							<h2 style="color: #2a8bcb;">افزودن گروه / ویرایش</h2>
						</div>

						
							<div class="messagebar-item-left">
								<a onclick="location.href = 'newcoms.php?yep=new_GroupNew';" data-toggle="tab" class="active">
									<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
									<b class="middle bigger-110">برگشت</b>
								</a>
							</div>

							<div class="messagebar-item-right">
								<span class="inline btn-send-message">
									<button type="submit" id="submit_page" class="btn btn-sm btn-primary no-border btn-white btn-round">
										<i class="ace-icon fa fa-check"></i>
										<span class="bigger-110">ذخیره</span>
									</button>
								</span>
							</div>
						</div-->
						<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
							<span class="flaticon-verified9">
							</span>
						</a>
						<a href="newcoms.php?yep=new_GroupNew" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
						</a>
					</div>
					</br>
				
					<div class="panel-body">
						
						<div class="row-fluid"> 
						<!-- #section:subsite/groupnew.list -->
							<div class="col-md-8">
								
									
										<input type="hidden" name="post" value="1">
										<input type="hidden" name="edit_mode" value="<?if($edit_id>0) echo $edit_id ;else echo 0;?>">
										<input type="hidden" id="array_value" name="array_value" value="0">
										<!--input type="hidden" id="group_id" name="group_id" value="3"-->
										<div class="form-group">
											<label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;">نام گروه</label>
											<div class="form-group col-sm-9">
												<input type="text" name="name" class="form-control" value="<?=$edit_name?>" id="name">
											</div>
										</div>
																			
										<div id="check_email">
										</div>
										
										<div class="form-group">		
											<label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;">توضیحات</label>
											<div class="form-group col-sm-9">
												<textarea type="text" name="tozihat" class="form-control" id="tozihat"><?=$edit_tozihat?></textarea>
											</div>
										</div>
										
										<div class="form-group">	
											<label for="inputEmail3" class="col-sm-3 control-label" style="text-align: left;">دسترسی مشاهده</label>
											<div class="form-group col-sm-9">
												<div id="jstree-proton-3"  class="proton-demo"></div>
											</div>	
										</div>
								
							</div> 
							
							<div class="col-md-4">
								<div class="alert alert-success">
									در دسترسی کاربران علاوه بر اینکه صفحات داخلی را انتخاب می کنید
									می بایست دسته بالایی آن را نیز انتخاب کنید. بطور مثال اگر می خواهید
									گروه کاربری تعریف کنید که بخش صفحه ها دسترسی داشته باشند می بایست
									مدیریت محتوا > صفحه ساز > صفحه ها راانتخاب کنید.
								</div>
							</div>
							 
						<!-- /section:subsite/groupnew.list -->	
						</div>
					</div>
					
					<div class="panel-footer bttools">	
						<button type="submit" id="up_submit" class="btn btn-primary"><span class="flaticon-verified9"></span><span>ذخیره</span></button>
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
																<?
																if($edit_id>"")
																$sql = "SELECT icon,name,id,permission FROM new_main_menu a,new_menu_permission b WHERE  b.view=1 and a.parent_id='0' and la='fa' and  a.unic_id=b.menu_id and b.group_id=$edit_id ORDER BY rang";
																else{
																$sql = "SELECT icon,name,id,permission FROM new_main_menu a,new_menu_permission b WHERE   b.permission=1 and a.parent_id='0' and la='fa'  and b.group_id=$manager_group and a.unic_id=b.menu_id  ORDER BY rang";
																$edit_id=0;
																}
																
														$result = $coms_conect->query($sql);
														 while($row = $result->fetch_assoc()) {
														$str="";
														$name=$row['name'];
														$name=$_SESSION["menu_lang"][$name];
														$icon=$row['icon'];
														$permission=$row['permission'];
														$id=$row['id'];
														if($permission==1&&$edit_id>"")
														$str =",'state': {'selected': 'true'}";
													//	else
													//	$str =",'state': {'selected': 'open'}";
														
													echo "{'text': '$name' ,'id':'$id' $str ,'icon': 'yep fa $icon'";
													creat_sub_wive_permission($id,$site_id,$la,$edit_id,$manager_group,$coms_conect);
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
											
						
				</form>
				
			</div>
			
		</div>			
</div>

<script>
	 $(".submit2").click(function(){
		 $("#reg_presonal").submit();
	 });				 
</script>	

<?$_SESSION["del_item"]='del_groups';?>
<script src="ajax_js/groups.js"></script>	
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
	<script>
 $(function() {
         $('#reg_presonal').validate({
            
            rules: {
				name: {
					required:true
				}
            },
            messages: {
				name: {
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
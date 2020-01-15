<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
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
#inbox-tabs{
	border-bottom: 1px solid #ccc;
}
</style>

<?$pm_status=0;
$manager_filter=injection_replace($_GET['manager_filter']);
if(isset($_POST['replay_manager_str'])){
	$row["text"]=injection_replace($_POST['replay_manager_str']);
	$row["text"]=str_replace('src="source','src="/source',$row["text"]);
	$row["text"]=str_replace('img src="source','img src="/source',$row["text"]);
	$row["text"]=str_replace('<source src="source','<source src="/source',$row["text"]);
	$row["text"]=str_replace('<a href="source','<a href="/source',$row["text"]);
	$row["text"]=str_replace('<a href="news','<a href="/news',$row["text"]);
	$row["text"]=str_replace('<a href="video','<a href="/video',$row["text"]);
	$row["text"]=str_replace('<img src="yep_theme','<img src="/yep_theme',$row["text"]);
	$row["text"]=str_replace('<audio src="source','<audio src="/source',$row["text"]);
	$row["text"]=str_replace('<video ','<video width="100%" height="100%"',$row["text"]);
	$replay_manager_str=str_replace('href="source','href="/source',$row["text"]);
	$arr=array("text"=>$replay_manager_str,"resiver"=>$_SESSION['sender_manager_pm'],"sender"=>$_SESSION['manager_user_name'],"ip"=>$custom_ip,"date"=>time());
	$id=insert_to_data_base($arr,'new_manager_pm',$coms_conect);
	show_msg('پیام شما با موفقیت ارسال شد');
}
 

?>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف مدیر زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>

<div class="modal fade" id="show_msg" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
<form action="" method="post">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">نمایش متن</h4>
			</div>
			<div class="modal-body">
					<div id="show_msg_div" style="background-color: bisque;padding: 5px;"> </div>
					
					<h4 class="modal-title custom_align" id="Heading">پاسخ</h4>
					<br>
					<textarea class="form-control" name="replay_manager_str" id="replay_manager_str" rows="4"> </textarea>
					<input type="hidden" name="manager_pm_id" id="manager_pm_id">
						<script>
					 tinymce.init({
						 selector: "#replay_manager_str",
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
						 font_formats: 'iraniansans=iraniansans', 
						 image_advtab: true ,
						 external_filemanager_path:"/filemanager/",
						 filemanager_title:"مديريت فايل" ,
						 external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
					 });
				</script>			
			</div>
			 <div class="modal-footer ">
				<button type="submit" id="send_replay_pm"    class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;ارسال</button>
				<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;انصراف</button>
			</div>
		</div>
	</div>
	</form>
</div>


<br>
<div class="tabbable">
	<input type="hidden" name="edit_mode" id="edit_mode" value="<?=$edit_id?>">	
	<div class="msheet tab-content">
		
		<div class="secfhead">
			<!-- #section:main/slideshow.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">پیام های همکاران</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/slideshow.head  -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>
		</div>
		
		<div id="add_templates" class="tab-pane active">
			<br>
			<div class="tabbable">
					<!-- #section:main/backup.head -->
				<ul id="inbox-tabs" class="inbox-tabs nav nav-tabs sr-nav-tabs padding-16 tab-size-bigger tab-space-1">
					<li class="active">
						<a data-toggle="tab" href="#inbox">
							<i class="blue ace-icon fa fa-inbox bigger-130"></i>
							<span class="bigger-110">پیام های دریافت شده</span>
						</a>
					</li>

					<li>
						<a href="newcoms.php?yep=new_manager_send_pm">
							<i class="orange ace-icon fa fa-location-arrow bigger-130"></i>
							<span class="bigger-110">ارسال شده</span>
						</a>
					</li>
				</ul>

				<div class="tab-pane active" id="tab2">
					<!-- #section:main/backup.table -->
					<div class="tt">
						 <div class="pull-left btn-xs yepco" id="drop4">
							<i type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 5px;margin-left: 0px;top: 2px;left: 5px;">
							<span class="sr-only">Toggle navigation</span>
							<span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
							</i>
							<?if($_SESSION["can_delete"]==1){ ?>
							<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
								<ul class="nav navbar-nav navbar-left">
									<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="margin-left: 0px;margin-right: -5px;border-radius: 5px;">
									حذف 
									</a>
								</ul>
							</div>	
							<?}?>
						</div>
					
						<div class=" yepco">
							<form action='' method='get' class="navbar-form navbar-left pull-right yepco" role="search">
								<input name="yep" value='new_manager_pm' type="hidden">	&nbsp;&nbsp;&nbsp;
								<input type="text" name="str" value='<?=$_GET['str']?>' class="form-control search2" placeholder="<?=$s_Pages_search?>">
								<input type="hidden" id="check_value" name="check_value" value="0">
								<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
							</form>
								<div class="pull-right btn-default btn-xs yepco">
							<?if ($manager_filter>"")
								$_SESSION['manager_filter']=$manager_filter;
							 
								$sql = "SELECT id,user_name,name FROM new_managers";
								$result = $coms_conect->query($sql);
								echo "<select name='manager_filter' id='manager_filter' class='form-control' rows='2' >";
								if($manager_filter=='')
									$str='selected';else $str='';
								echo "<option $str value=''>همه مدیران</option>"; 
								 while($row = $result->fetch_assoc()) {
									
									$name=$row['user_name'];
									 $str="";
									if($manager_filter==$name)
									$str="selected";
									if(in_array($row['id'],$_SESSION["manager_user_permisson"]))
									echo "<option $str value='$name'>$name ({$row['name']})</option> ";
								}				
								echo '</select>';
							
							
							
							?>
						</div>
						</div>
						<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
							<thead>
								<tr>
									<th class="center">
									<label class="position-relative">
									<input type="checkbox" class="conchkSelectAll" />
									<span class="lbl"></span>
									</label>
									</th>
									<th>ردیف</th>
									<th>نام ارسال کننده</th>
									<th>تاریخ و زمان</th>
									<th>وضعیت</th>
						
									<th>نمایش متن پیام</th>
									<th>امکانات</th>
								</tr>
							</thead>
							<tbody>
								<?$manager_user_permisson= implode(",",$_SESSION["manager_user_permisson"]); 
								$str=injection_replace($_GET['str']);
									$str_site='';
									if($str>""){
											$str_site="and  (text like '%$str%' or resiver like '%$str%' or sender like '%$str%')";
									}	
								$i=1;
									if($manager_filter>""){ 
										$str_manager=" and  a.resiver='$manager_filter'";
										$manager_page="&manager_filter=$manager_filter";
									}
									else 
									$str_manager="";
									$sql1="select count(*)as cnt from new_manager_pm a where id>0 $str_site   $str_manager";
									$result = $coms_conect->query($sql1);
									$RS = $result->fetch_assoc();
									$page=injection_replace($_GET["page"]);
								
								
									$page=injection_replace($_GET["page"]);
									$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_manager_send_pm$lang_page$site_page$manager_page$lock_filter$manager_q$status_page$download_type$cat_page$field_page");
									$from=$a[0];
									$to=$a[1];
									$pgsel=$a[2];
								
								
									$query="select * from new_manager_pm a where id>0 $str_site   $str_manager order by status,id desc LIMIT $from,$to";
									//echo $query;exit;
									$result = $coms_conect->query($query);
									while($RS1 = $result->fetch_assoc()) {
									$id=$RS1["id"];?>
								 
								<tr style="<?if($RS1['status']==1)echo 'color:#adc0cc';?>">
									<td class="center">
										<label class="position-relative">
										<input id="<?=$id?>" type="checkbox" class="conchkNumber" />
										<span class="lbl"></span>
										</label>
									</td>
									<td class="center">
										<?=$i?>
									</td>
										<td><?=$RS1["sender"].' ( '.get_result("select name from new_managers where user_name='{$RS1["sender"]}'",$coms_conect).' )'?></td>
									<td><?=miladitojalalidefult(date('Y-m-d H:m:i',$RS1["date"]))?></td>
									<td>
									 <label></label>
									 <input  id="<?=$RS1['id']?>" name="switch-field-1" <?if($RS1['status']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
									 <span title="وضعیت"class="lbl"></span>
									</td>
									<td>
										<a  id="<?=$RS1['id']?>"  data-title="show_msg" data-toggle="modal" data-target="#show_msg" data-placement="top"  class="show_msg blue" href="#">
										<i class="ace-icon fa fa-eye bigger-120"></i></a>
									</td>
									<td>
									<?if($_SESSION['can_delete']==1){?>
									<a id="<?=$RS1['id']?>" class="red del_menu" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
									<i class="ace-icon fa fa-trash-o bigger-120"></i></a>
									<?}?>
									</td>
								</tr>
								 
								<?$i++;}?>
							</tbody>
						</table>
					</div>	
					<?=$pgsel?>									
					<!-- /section:main/backup.table -->		
				</div>
			
			</div>
		
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

 	
<?$_SESSION["del_item"]='del_manager_pm';?>							
<script>
$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});
$(".show_msg").click(function () {
	$("#manager_pm_id").val($(this).attr('id'));
	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=show_manager_pm&id="+$(this).attr('id'),
		success: function(result){
			//alert(result);
			$("#show_msg_div").html(result);
		}
	});		
});	
	
$("#btn_ok").click(function () {
	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=del_manager_pm&id="+$(this).val(),
		success: function(result){
			//alert(result);
			window.location.href = "newcoms.php?yep=new_manager_pm";
		}
	});		
});
$(function () {	
	$('.conchkNumber_4').click( function() {
		if($(this).prop('checked'))
		var a=1;
		else
		a=0;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_manager_pm_status&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				 
				}
			});
    });
});
</script>
<style>
.desm{display: inline-flex !important;}
</style>		
 <script type="text/javascript">
 
 	$(document).ready(function(){
		$("#drop4").hide();
		
		var boxes = $('input.conchkNumber');
		boxes.on('change', function () {
		  $('#drop4').toggleClass("desm", boxes.is(":checked"));
		});
		
		var boxall = $('input.conchkSelectAll');
		boxall.on('change', function () {
		  $('#drop4').toggleClass("desm", boxall.is(":checked"));
		});
		
	});
 
	$(document).on('click', '.conchkSelectAll', function() {
	//$('.conchkSelectAll').click( function() {
		$('.conchkNumber').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_ok").val(values);
    });
	$('.conchkNumber').click( function() {
  
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
		 	return $(this).attr('id');
		}).get();
  
		$("#btn_ok").val(values);
	});
	
	$('#manager_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&manager_filter=") >= 0){
			var b=a.split('&manager_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&manager_filter="+$(this).val()+e;
		}
		else
		a +='&manager_filter='+$(this).val();
		window.location.href = a;
    });	
</script>
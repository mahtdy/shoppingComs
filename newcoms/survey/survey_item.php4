<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css">


<div class="modal fade" id="show_survey_result" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">نمایش نتیجه</h4>
			</div>
			<img src="waiting.gif" id="watting_pic" style="display:none">
			<div id="show_survey_result_div" class="modal-body">
				 
			</div>
 
		</div>
	</div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title custom_align" id="Heading">حذف</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف خبر زير اطمينان داريد؟</div>
				</div>
				<div class="modal-footer ">
					<button type="button" id="btn_ok" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
					<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
				</div>
			</div>
		</div>
</div>



<?$first=injection_replace($_POST['first']);//header('Location: http://google.com');echo 'salma';exit;	
$question=injection_replace($_POST['question']);
$second=injection_replace($_POST['second']);
$status=injection_replace($_POST['status']);
$thired=injection_replace($_POST['thired']);
$fourth=injection_replace($_POST['fourth']);
$answer=injection_replace($_POST['answer']);
$site='main';
$la='fa';
$edit_mode=injection_replace($_POST['edit_mode']);
$edit_id=injection_replace($_GET['edit_id']);

if($first>""&&$edit_mode==0&&$_SESSION['can_add']==1){
   $arr_attach=array("question"=>$question,"status"=>$status,"thired"=>$thired,"fourth"=>$fourth,"answer"=>$answer,"first"=>$first,"date"=>time(),"second"=>"$second","user_id"=>$manager_id,'ip'=>$custom_ip);
    insert_to_data_base($arr_attach,'new_survey_item',$coms_conect);
	show_msg($new_successfull);
}if($name>""&&$edit_mode>0&&$_SESSION["can_edit"]==1){
	  $condition="id>0";
      $arr_pic=array("status"=>0);
      update_data_base($arr_pic,'new_survey_item',$condition,$coms_conect);
	
	
      $condition="id=$edit_id";
      $arr_pic=array("question"=>$question,"status"=>$status,"thired"=>$thired,"fourth"=>$fourth,"answer"=>$answer,"first"=>$first,"edit_date"=>time(),"second"=>"$second","edit_user_id"=>$manager_id,'ip'=>$custom_ip);
      update_data_base($arr_pic,'new_survey_item',$condition,$coms_conect);
	  show_msg($new_successfull);
}	
?>
	<div class="tabbable">
		<!--ul class="nav nav-tabs">
			<li class="pull-right" style="right:1%;">
				<i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_templates" title="<?=$new_survey_item?>"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</i>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" id="add_item" href="#add_templates" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						<?=$new_survey_item?></a>
					</ul>
				</div>
			</li>	
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?=$new_list_subsite_site?> </a></li>
			
		</ul-->
		<div class="msheet tab-content">	 

			<div class="secfhead">
			<!-- #section:subsite/subsite.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">لیست نظرسنجی ها</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:subsite/subsite.head -->

			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

					<li id="newpag" class="addicon">
						<a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن زیر سایت" >
							<span class="flaticon-add149"></span>
						</a>
					</li>
					 
					<!--li>
						<a  data-toggle="modal" data-target="#searching" data-placement="top"    title="جستجوی پیشرفته" >
							<span class="flaticon-search74"></span>
						</a>
					</li-->
				</ul>
			</div>

			</div>
		
			<div class="tab-pane  <?if($edit_id=="") echo 'active';?>"" id="tab1">
				<!-- #section:subsite/subsite.table -->
				<div class="tt">
					<div class="row-fluid">
						<!--div class="col-md-6 yepco">
							
						</div-->
						<div class="col-md-10">
							<div class="form-group yepco">
								<form class="navbar-form navbar-left pull-right yepco" role="search">
									<input type="text" class="form-control search2" placeholder="<?=$s_Combo_search?>">
								</form>
							</div>		
						</div>
					</div>
					
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
						
							<tr>
								<th>ردیف</th>
								<th>عنوان نظرسنجی</th>
								<th>گزینه اول</th>
								<th>گزینه دوم</th>
								<th>گزینه سوم</th>
								<th>گزینه چهارم</th>
								<th>پاسخ</th>
								<th>وضعیت</th>
								<th>امکانات</th>
								
							</tr>
							
						</thead>
						<tbody>
						<? /*if($_SESSION['manager_user_name']!='comsroot')
							 $str1="and  parent_id='$manager_id'";*/
							$query12="select * from new_survey_item   where id>1    order by id desc";
							     $result = $coms_conect->query($query12);$i=1;
								while($RS1 = $result->fetch_assoc()) {	 
							
								$id=$RS1["id"];
								?>
								
							<tr>
								<td><?=$i;?></td>
								<td><?=$RS1["question"]?></td>
								<td><?=$RS1["first"]?></td>
								<td><?=$RS1["second"]?></td>
								<td><?=$RS1["thired"]?></td>
								<td><?=$RS1["fourth"]?></td>
								<td><?=$RS1["answer"]?></td>
								<td><?if($RS1["status"]==1)echo 'فعال ';else echo 'غیر فعال';;?></td>
								<td>
								<a href="#"  value="<?=$id?>" class="btn Survey-btn show_survey"   data-toggle="modal" data-target="#show_survey_result">
								<i class="ace-icon fa fa-vine" title="مشاهده نتایج "></i>		 
								</a>
								<?if($_SESSION["can_edit"]==1){?>
								<a id="<?=$id?>" class="edit_menu blue icon"  href="newcoms.php?yep=survey_item&edit_id=<?=$id?>">
								<i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
								</a>
								<?}if($_SESSION["can_delete"]==1){?>	
								<a href="#" id="<?=$id?>" class="red del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
								<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
								</a>
								<?}?>
								</td>
							</tr>
						<?$i++;}?>
						</tbody>
					</table>
<script>					
$(".show_survey").click(function () {
	$("#watting_pic").show();
  	$.ajax({
	 type:'POST',
	 url:'New_members_ajax.php',
	 data:"action=show_survey&id="+$(this).attr('value'),
		 success: function(result){
			 $("#watting_pic").hide();
	 		 $("#show_survey_result_div").html(result);
		 }
	});	
});	
</script>					
				</div>
				<!-- /section:subsite/subsite.table -->
			</div>	
			<?if($_SESSION["can_add"]==1){?>	
			<div class="tab-pane <?if($edit_id!="" || $add_new==1) echo 'active';?>"  id="add_templates">
			
				<form class="form-horizontal" id="survey_item" name="survey_item" action="" role="form" method="post" enctype="multipart/form-data">
					<input type="hidden" id="edit_mode" name="edit_mode" value="<?=$edit_id?>">
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						<!--div>
						<div class="message-bar">
							<h2 style="color: #2a8bcb;"><?=$pro_aafzodann?> / <?=$sd_shop_shipping_edit?> <?=$new_sysmenu[70]?></h2>
						</div>

						
							<div class="messagebar-item-left">
								<a href="#tab1" data-toggle="tab" class="active">
									<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
									<b class="middle bigger-110"><?=$new_Getting_back?></b>
								</a>
							</div>

							<div class="messagebar-item-right">
								<span class="inline btn-send-message">
									<button type="submit" id="submit" class="btn btn-sm btn-primary no-border btn-white btn-round">
										<i class="ace-icon fa fa-check"></i>
										<span class="bigger-110"><?=$pro_save?></span>
									</button>
								</span>
							</div>
						</div-->
						
						<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
							<span class="flaticon-verified9">
							</span>
						</a>
						<a href="newcoms.php?yep=survey_item" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
						</a>

					</div>
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

<?$query="select * from new_survey_item where id='$edit_id'";
$result = $coms_conect->query($query);$i=1;$str='';
$RS01 = $result->fetch_assoc();
	$question=$RS01['question'];
	$first=$RS01['first'];
	$second=$RS01['second'];
	$thired=$RS01['thired'];
	$fourth=$RS01['fourth'];
	$answer=$RS01['answer'];
	$status=$RS01['status'];
}?>
					
					<div class="panel-body ">
					<!-- #section:subsite/subsite.list -->				
 
					 <div id="show_check_box" class="form-group "></div>
					 
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">سوال</label> 
							<div class="form-group col-md-4">
								<input type="text" value="<?=$question?>" name="question" id="question" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">گزینه اول</label> 
							<div class="form-group col-md-4">
								<input type="text"  value="<?=$first?>" name="first" id="first" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">گزینه دوم</label> 
							<div class="form-group col-md-4">
								<input type="text"  value="<?=$second?>" name="second" id="second" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">گزینه سوم</label> 
							<div class="form-group col-md-4">
								<input type="text" value="<?=$thired?>" name="thired" id="thired" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">گزینه چهارم</label> 
							<div class="form-group col-md-4">
								<input type="" value="<?=$fourth?>" name="fourth" id="fourth" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">پاسخ</label> 
							<div class="form-group col-md-4">
								<select name="answer" id="answer" class="form-control" >
								<option <?if($answer==1)echo 'selected';?> value="1">گزینه 1</option>
								<option <?if($answer==2)echo 'selected';?> value="2">گزینه 2</option>
								<option <?if($answer==3)echo 'selected';?> value="3">گزینه 3</option>
								<option <?if($answer==4)echo 'selected';?> value="4">گزینه 4</option>
								 
							</select>
							</div>
						</div>	
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">وضعیت</label> 
							<div class="form-group col-md-4">
							<select name="status" id="status" class="form-control" >
								<option <?if($status==1)echo 'selected';?> value="1"><?=$Ads_AccountNew_type2?></option>
								<option <?if($status==0)echo 'selected';?>  value="0"><?=$Ads_AccountNew_type1?></option>
							</select>
							</div>
						</div>
					<!-- /section:subsite/subsite.list -->	
					</div>
					<!--div class="panel-footer">
							<button type="submit" class="btn btn-primary" ><i class="ace-icon fa fa-check bigger-110"></i>ذخيره</button>
					</div-->
				</form>
				
			</div>
	<script>
	 $(".submit2").click(function(){
		 $("#survey_item").submit();
	 });				 

</script>			
 		
		</div>
</div>
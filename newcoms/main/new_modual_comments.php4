<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>
<style>
.error {
color : red;
}
</style>
<?##################چک کردن زبان#######################
$manage_lang=injection_replace($_POST['manage_lang']);
$lang_filter=injection_replace($_GET['lang_filter']);
if($lang_filter>0&&!in_array($lang_filter,$_SESSION["manager_title_lang"])||($manage_lang>""&&!in_array($manage_lang,$_SESSION["manager_title_lang"]))){
	header('Location: new_manager_signout.php');exit;
}
#########################چک کردن زير سايت#############
$manage_site=injection_replace($_POST['manage_site']);
$site_filter=injection_replace($_GET['site_filter']);
if(($manage_site>0&&!in_array($manage_site,$_SESSION["manager_title_site"]))||($site_filter>0&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
header('Location: new_manager_signout.php');exit;
}
 $manager_filter=injection_replace($_GET['manager_filter']);
#########################################################		
$q=injection_replace($_GET['q']);	

if($_POST['reply_comment_id']>"")
$rep_comment_id=injection_replace($_POST['reply_comment_id']);
else if($_POST['rep_comment_id']>"")
$rep_comment_id=injection_replace($_POST['rep_comment_id']);


if($rep_comment_id>""){
 
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	if($_POST['comment_text']>""){
	$comment_text=injection_replace($_POST['comment_text']);
	 }
	else if($_POST['text_reply']>"")
	$comment_text=injection_replace($_POST['text_reply']);

	$query="select b.user_id,a.type,a.comment_id,a.rep_id,a.madul_id from new_madules_comment a ,$report_table b 
	where a.id=$rep_comment_id and b.id=a.madul_id";
	$result = $coms_conect->query($query);
	$RS1 = $result->fetch_assoc();
	if(!in_array($RS1["user_id"],$_SESSION["manager_user_permisson"]))
	sign_out();
	if($RS1['comment_id']>0)
	$rep_id=$RS1['comment_id'];
	else
	$rep_id=$RS1['rep_id'];
	$arr=array('email'=>$_SESSION["manager_email"],"comment_id"=>0,"name"=>$manager_username.' ('.$_SESSION["manager_name"].') ',"status"=>1,"admin"=>1,"type"=>$RS1['type'],"madul_id"=>$RS1['madul_id'],"rep_id"=>$rep_id,"text"=>$comment_text,"ip"=>$custom_ip,"date"=>time());
	$id=insert_to_data_base($arr,'new_madules_comment',$coms_conect);
	show_msg($new_successfull);
	 
}
 create_session_token(); 
?>
<style>
.desm{display: inline-flex !important;}
</style>
<script>
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
</script>
        <div class="errorHandler alert alert-danger" style="display:none;">
        <button data-dismiss="alert" class="close" sourceindex="208">x</button>
            <i class="fa fa-times-sign"></i>
        </div>
<form class="form-horizontal" id="delete_table" name="delete_table" action="" role="form" method="post" enctype="multipart/form-data"><fieldset>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتویات زیر اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok_page" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div></fieldset>
</form>


<form class="form-horizontal" id="reply25" name="reply25" action="" role="form" method="post" enctype="multipart/form-data">
<input name="rep_comment_id" id="rep_comment_id" type="hidden">
<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
<div class="modal fade" id="repeat" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					  پاسخ
				</div>
			</div>
			
			<div class="modal-body">
					<div class="form-group">
						<label for="inputEmail3" class="control-label">  متن پاسخ    </label>
						<div class="col-sm-12">
							<textarea name="comment_text" id="comment_text" class="form-control" rows="3"></textarea>
								 <script>
									tinymce.init({
									selector: "#comment_text",
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
			<div class="panel-footer bttools">
				<button type="submit" id="submit_page" class="btn btn-primary" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
			</div>
		</div>
	</div><!-- /.modal-dialog --> 
</div>
</form>



<!-- switch lock unlock -->
<style>
	input[type=checkbox].ace.ace-switch.ace-switch-6+.lbl::before {content: "\f023";}
	input[type=checkbox].ace.ace-switch.ace-switch-6:checked+.lbl::before {content: "\f09c";}
	
</style>

<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					 نمایش نظر
				</div>
			</div>
			<div class="modal-body">
			<div id="show_sms_txt"></div>
			<button class="btn btn-primary pull-right">پاسخ</button>
			<br><br>
			</div>
			<div id="rep_for">
			<form action="" method="post">
		<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">	
			<input name="reply_comment_id" id="reply_comment_id" type="hidden">
				<fieldset>
					<div class="form-group">
						<label for="inputEmail3" class="control-label">  متن پاسخ    </label>
						<div class="col-sm-12">
							<textarea name="text_reply" id="text_reply" class="form-control" rows="3"></textarea>
								 <script>
									tinymce.init({
									selector: "#text_reply",
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
				</fieldset><br>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>ارسال</button>
				</div>
				</form>
			</div>
		</div>
	</div><!-- /.modal-dialog --> 
</div><!-- /.modal-dialog --> 
<script>
$(document).ready(function(){
$("#rep_for").hide();
    $("button").click(function(){
        $("#rep_for").toggle();
    });
});
</script>


<div class="tabbable">
	<!--ul class="nav nav-tabs">
		<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
		نظرات مدیریت محتوا </a></li>
	</ul-->
	
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:ads/ads_comment.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr"> <?=$report_title?></p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:ads/ads_comment.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			<div class="tab-pane <?if($edit_id=="") echo 'active'; else echo '';?> " id="tab1">
		
				<div class="tt">	
					<div class="row-fluid">
						<!--div class="col-md-6 yepco"-->
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<?if($_SESSION["can_delete"]==1){ ?>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
											حذف 
										</a>
									</ul>
								</div>
								<?}?>
								<!--div class="switch">
									<input name="switch-field-1" class="pull-left ace ace-switch ace-switch-6 conchkSelectAll_4" type="checkbox"/>
									<span class="lbl" style="top: 6px;"></span>
								</div-->	
							</div>
						<!--/div-->
						<div class="col-md-10">
							<div class="form-group yepco">
									<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
										<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو">
										<input type="hidden" name="yep" id="q" value="<?=$report_url?>">
										<input type="hidden" name="site_filter" value="<?=$site_filter?>">
										<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
										<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
									</form>	
								
									<div class="pull-right btn-default btn-xs yepco">
										<?create_sub_site_filter($site_filter,$coms_conect,$_SESSION["manager_title_site"])?>
									</div>
									<div class="pull-right btn-default btn-xs yepco">
										<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
									</div>
									<div class="pull-right btn-default btn-xs yepco">
										<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
									</div>
							</div>		
						</div>
					</div>
					<input type="hidden" id="check_value" name="check_value" value="0">
					<!-- #section:ads/ads_comment.table -->
					<table cellpadding="0" id="new_page_table" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>  
								</th>
								<th>پذیرش نظر</th>
								<th>تاریخ ارسال نظر</th>
								<th>عنوان <?=$report_title?></th>
								<th>زبان</th>
								<th>نام فرستنده</th>
								<th>ایمیل</th>
								<th>نمایش متن</th>
								<th>امکانات</th>
							</tr>
						</thead>
						<tbody>
						<?$manager_user_permisson= implode(",",$_SESSION["manager_user_permisson"]); 
					 $manager_title_site="'".implode("','",$_SESSION["manager_title_site"])."'";
					 $manager_title_lang="'".implode("','",$_SESSION["manager_title_lang"])."'";
							 
						
						if($site_filter==-1){
								$str_site=" and a.site in ($manager_title_site)";
								$site_page="&site_filter=$site_filter";
							}
							else if($site_filter>""){
								$str_site=" and a.site='$site_filter'";
								$site_page="&site_filter=$site_filter";
							}
						if($q>""){
							$str_q="  and(b.name like '%$q%' or a.title like '%$q%' or b.text like '%$q%'  or a.name like '%$q%' or b.email like '%$q%')";
							$manager_q="&q=$q";
						}
						if($lang_filter==-1){
								 
								$str_lang=" and a.la in ($manager_title_lang)";
								$lang_page="&lang_filter=$lang_filter";
							}
							else if($lang_filter>""){
								$str_lang=" and a.la='$lang_filter'";
								$lang_page="&lang_filter=$lang_filter";
							}
						
							if($manager_filter>0){
								$str_manager=" and  a.user_id='$manager_filter'";
								$manager_page="&manager_filter=$manager_filter";
							}
							else 
							$str_manager=" and  a.user_id in ($manager_user_permisson)";
					
						
						################################################################
							$sql1 = "SELECT count(a.id) as cnt from new_madules_comment b ,$report_table a where a.id>0
							 $str_manager and b.type=$modual_type and a.id=b.madul_id $str_site $str_q  $str_lang order by b.status";
							
						//	echo $sql1;
							$result = $coms_conect->query($sql1);
							$RS = $result->fetch_assoc();

							$a=pgsel((int)$_GET["page"],$RS["cnt"],10,10,"$root/newcoms.php?yep=$paging$lang_page$site_page$manager_page$manager_q");
							$from=$a[0];
							$to=$a[1];
							$pgsel=$a[2];
							$sql1 = "SELECT b.madul_id,b.date,a.la,a.id,b.id as ide,b.text,b.name,b.status,a.title as page_name,b.email from new_madules_comment b ,$report_table a  where a.id>0
							$str_manager and a.id=b.madul_id $str_site $str_q  $str_lang  and b.type=$modual_type order by b.status LIMIT $from,$to";
							 // echo $sql1.'<br>' ;  
						################################################################
						$result1 = $coms_conect->query($sql1);
						    while($row = $result1->fetch_assoc()) {

							$ide=$row['ide'];
							$id=$row['id'];
							$page_name=$row['page_name']
							?>
							<tr>
								<td class="center" style="border-right: none;border-left: none;">
								
									<label class="position-relative">
										<input value="<?=$id?>" id='<?=$ide?>' type="checkbox"   class="conchkNumber"/>
										<span class="lbl"></span>
									</label> 
							
								</td>
								<td class="center">
								<?if($_SESSION["can_edit"]==1){?>
									<label>
										<input id="<?=$ide?>" name="switch-field-1" <?if($row['status']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
										<span class="lbl"></span>
									</label>
										<?}?>
								</td> 
								<td><?=miladitojalalitime(date('Y-m-d H:m:i',$row['date']));?></td>
								<?$module_name=get_result("select link from new_modules where id=$modual_type",$coms_conect);
								if($module_name=='page'){
									$page_name=get_result("select name from new_static_page where id={$row['madul_id']}",$coms_conect);
									$module_url="/$page_name/{$row['la']}/{$row['id']}";
								}else
									$module_url="/$module_name/{$row['la']}/{$row['id']}";
								?>
								<td><a href="<?=$module_url?>" target="_blank"><?=$row['page_name']?></a></td>

								<td><?=$row['la']?></td>
								<td><?=$row['name']?></td>
								
								<td><?=$row['email']?></td>
								<td><a   id="<?=$ide?>" data-id="<?=$ide?>" class='show_sms' href='#view' role='button' data-toggle='modal'><?=$pro_show_matn?></a></td>
								<td>
								<?if($_SESSION["can_delete"]==1){?>	
									<a href="#" value="<?=$id?>" id="<?=$ide?>" class="del_menu red" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
									</a>
									<?}?>
									<a class="blue rep_comment"  id="<?=$ide?>" title="پاسخ" data-title="repeat" data-toggle="modal" data-target="#repeat" data-placement="top" rel="tooltip" href="#" style="font-size: 15px !important;">
									<i class="ace-icon fa fa-share bigger-120"></i></a>
								
								</td>
							</tr>
						<?}?>
						
						</tbody>
					</table>
					<!-- /section:ads/ads_comment.table -->
				</div>	
			</div>
		<?=$pgsel;?>
		</div>
</div>
												
<script src="ajax_js/<?=$js_file?>"></script>
<script>
	$('#manage_site_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&site_filter=") >= 0){
			var b=a.split('&site_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&site_filter="+$(this).val()+e;
		}
		else
		a +='&site_filter='+$(this).val();
		window.location.href = a;
    });
	$('#manage_lang_filter').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&lang_filter=") >= 0){
			var b=a.split('&lang_filter=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&lang_filter="+$(this).val()+e;
		}
		else
		a +='&lang_filter='+$(this).val();
		window.location.href = a;
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
<script type="text/javascript">
	$(function () {
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
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>
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
	  $('#drop4').toggleClass("desm", boxes.is(":checked"));
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
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>آيا از حذف اين مورد اطمينان داريد؟</div>
		</div>
		<input type="hidden" id="check_value" name="check_value" value="0">
		<div class="modal-footer ">
			<button type="button" id="btn_ok"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
		</div>
	</div>
	</div>
</div>
</form>

<form class="form-horizontal" action="" method="post" name="new_details" id="new_details" enctype="multipart/form-data">	
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">مشاهده متن ایمیل</h4>
		</div>
		<div class="modal-body">
			<div class="panel-body" id="show_details">
				 
				</div>
			</div>
		</div>

	</div>
	</div>
</form>
<?$la='fa';
$site='main';
if(isset($_POST['manage_lang']))
$la=injection_replace($_POST['manage_lang']);
else if(isset($_GET['lang_filter']))
$la=injection_replace($_GET['lang_filter']);
if($la>""&&!in_array($la,$_SESSION["manager_title_lang"])){
	header('Location: new_manager_signout.php');
}
$lang_filter=injection_replace($_GET['lang_filter']);
if($lang_filter>0&&!in_array($lang_filter,$_SESSION["manager_title_lang"])){
	header('Location: new_manager_signout.php');
}

$manager_filter=injection_replace($_GET['manager_filter']);

?>
</br>
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  -->
 
	<div class="tabbable">
		<!--ul class="nav nav-tabs">
					
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			ایمیل های ارسالی </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:email/email_archive.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">آرشیو EMail ارسالی</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:email/email_archive.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			<div class="tab-pane <?if($edit_id=="")echo 'active'?> " id="tab1">
				<div class="tt">
				<!-- #section:email/email_archive.table -->
					<div class="row-fluid">
						<!--div class="col-md-6 yepco"-->
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete" href="#" title="<?=$s_Pages_delete?>"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
											<?=$s_Pages_delete?> 
										</a>
									</ul>
								</div>
							</div>
						<!--/div-->
						
						
						<div class="col-md-10">
							<div class="form-group yepco">
								<form class="navbar-form navbar-left pull-right yepco" role="search">
									<input type="text" class="form-control search2" placeholder="<?=$s_Pages_search?>">
									<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
								</form>
							</div>
								 					
							<div class="col-md-6" style="top:-8px">
								<div class="form-group col-md-4">
									<?if ($manager_filter>"")
									$_SESSION['manager_filter']=$manager_filter;
									create_manager_filter($_SESSION['manager_filter'],$coms_conect,$_SESSION["manager_user_permisson"])?>
								</div>
 
							<!--div class="form-group col-md-3">
								<?create_sub_site_filter_none($site_filter,$coms_conect,$_SESSION['manager_title_site'])?>
							</div>
							<div class="form-group col-md-3">
								<?create_lang_filter_none($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
							</div-->
						</div>								
						</div>
					</div>
				
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								<th width="20px">رديف</th>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>
								</th>
								 
								<th>فرستنده</th>
								<th>زمان</th>
								<th>سایت</th>
								<th>زبان</th>
								 
								<th><?=$new_sysmenu[2]?></th>
							</tr>
						</thead>
						<tbody>
						<?	$str='';					
						$manager_user_permisson= implode(",",$_SESSION["manager_user_permisson"]); 
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
						 if($manager_filter>0){
								$str_manager=" and  b.manager_id='$manager_filter'";
								$manager_page="&manager_filter=$manager_filter";
							}
							else 
							$str_manager=" and  b.manager_id in ($manager_user_permisson)";
						
						if($lang_filter==-1){
							 
							$str_lang=" and a.la in ($manager_title_lang)";
							$lang_page="&lang_filter=$lang_filter";
						}
						else if($lang_filter>""){
							$str_lang=" and a.la='$lang_filter'";
							$lang_page="&lang_filter=$lang_filter";
						}
						
						if($q>""){
						$str="and (b.email like '%$q%'  or b.text like '%$q%' or a.user_name like '%$q%' or a.name like '%$q%')";	
							
						}
						
						$sql1 = "SELECT count(a.id) as cnt from new_email_archive b,new_managers a  where b.manager_id= $manager_id	and a.id=b.manager_id  $str_lang $str_manager	$site_page $str order by a.id desc";
						// echo $sql1;		
						$result = $coms_conect->query($sql1);
							$RS = $result->fetch_assoc();
							$page=injection_replace($_GET["page"]);
							
							$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_email_archive$lang_page$site_page");
							$from=$a[0];
							$to=$a[1];
							$pgsel=$a[2];

							$query="select * from new_email_archive b,new_managers a where b.manager_id= $manager_id and a.id=b.manager_id  $str_lang $str_manager	$site_page $str LIMIT $from,$to"; $i=1;
							$result = $coms_conect->query($query);$j=0;
							//echo $query;	exit;						
							while($RS1 = $result->fetch_assoc()) {
				 
									?>
							<tr>
								<td><?=$i?></td>
								<td class="center">
									<label class="position-relative">
										<input id="<?=$RS1['id']?>" value="<?=$id?>" type="checkbox" class="conchkNumber" />
										<span class="lbl"></span>
									</label>
								</td>
								 
								<td><?=$RS1['email']?></td>
								<td><?=miladitojalalitime(date('Y-m-d H:i:s',$RS1['date']))?></td>
							 <td><?=$RS1['site_id']?></td>
							 <td><?=$RS1['la']?></td>
								<td>
									<a id="<?=$RS1['id']?>" class="show_item green" data-target="#details" data-placement="top" rel="tooltip" data-toggle="modal" title="مشاهده متن پیام" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-eye bigger-120"></i>
									</a>
									<?if($_SESSION['can_add']==1){?>
									<a id="<?=$RS1['id']?>" class="del_menu red" data-title="Delete" data-toggle="modal" title="<?=$c_Poll_del?>" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</a>
									<?}?>
									
								</td>
							</tr>
							<?$i++;$j++;}?>
						</tbody>
					</table>
				<!-- /section:email/email_archive.table -->
				</div>
				<?=$pgsel?>
			</div>
			
		</div>

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

<script src="ajax_js/email_archive.js"></script>
<?$_SESSION["del_item"]='del_archive_email'?>

<script src="/yep_theme/default/rtl/assets/js/date-time/bootstrap-timepicker.min.js" /></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-timepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>

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
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
<?$q=injection_replace($_GET['q']);?>
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
			<h4 class="modal-title custom_align" id="Heading">مشاهده متن پیام خصوصی</h4>
		</div>
		<div class="modal-body">
			<div class="panel-body" id="show_details">
				 
				</div>
			</div>
		</div>

	</div>
	</div>
</form>

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
			پیام های خصوصی </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/pm_archive.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">آرشیو پیام های خصوصی</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/pm_archive.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			
			<div class="tab-pane <?if($edit_id=="")echo 'active'?> " id="tab1">
				<!-- #section:main/pm_archive.table -->
				<div class="tt">
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
									<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
										<input type="hidden" name="yep"  value="new_sendsms">
										<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
						
									</form>	
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
								 
								<th><?=$new_sysmenu[2]?></th>
							</tr>
						</thead>
						<tbody>
						<?$str='';
						
						if($q>""){
						$str="and (text like '%$q%')";	
							
						}
						$sql1 = "SELECT count(a.id) as cnt from new_manager_pm a ,new_managers b  where b.id=a.sender and  sender= $manager_id $str	order by a.id desc";
							
							$result = $coms_conect->query($sql1);
							$RS = $result->fetch_assoc();
							$page=injection_replace($_GET["page"]);
							
							$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_pm_archive");
							$from=$a[0];
							$to=$a[1];
							$pgsel=$a[2];

							$query="select a.date,a.id,a.text,a.resiver from new_manager_pm a,new_managers b  where b.id=a.sender and sender= $manager_id  $str LIMIT $from,$to"; $i=1;
 
							$result = $coms_conect->query($query);$j=0;
								while($RS1 = $result->fetch_assoc()) {
									$temp_date=explode(" ",miladitojalalitime(date('Y-m-d H:i:s',$RS1['date'])));
									$tem_date=explode("-",$temp_date[1]);	
									$tem_date= $temp_date[0].' '.$tem_date[2].'/'.$tem_date[1].'/'.$tem_date[0] ;
									?>
							<tr>
								<td><?=$i?></td>
								<td class="center">
									<label class="position-relative">
										<input id="<?=$RS1['id']?>" value="<?=$id?>" type="checkbox" class="conchkNumber" />
										<span class="lbl"></span>
									</label>
								</td>
								 
								<td><?=get_result("select user_name from new_managers where id={$RS1['resiver']}",$coms_conect)?></td>
								<td><?=$tem_date?></td>
							 
								<td>
									<a id="<?=$RS1['id']?>" class="show_item green" data-target="#details" data-placement="top" rel="tooltip" data-toggle="modal" title="مشاهده متن پیام" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-eye bigger-120"></i>
									</a>
									<a id="<?=$RS1['id']?>" class="del_menu red" data-title="Delete" data-toggle="modal" title="<?=$c_Poll_del?>" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</a>
									
								</td>
							</tr>
							<?$i++;$j++;}?>
						</tbody>
					</table>

				</div>
				<!-- /section:main/pm_archive.table -->
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

<script src="ajax_js/pm_archive.js"></script>
<?$_SESSION["del_item"]='del_archive_pm'?>

<script src="/yep_theme/default/rtl/assets/js/date-time/bootstrap-timepicker.min.js" /></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-timepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>


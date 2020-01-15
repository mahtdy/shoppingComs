<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<?#######################چک کردن کاربران#####################
$manager_filter=injection_replace($_GET['manager_filter']);
if($_GET['q_filter']>"")
$q=injection_replace($_GET['q_filter']);
else
$q=injection_replace($_GET['q']);
if($manager_filter>""&&!in_array($manager_filter,$_SESSION["manager_user_permisson"]))
header('Location: new_manager_signout.php');?>
<?if($manager_filter>""){
							$manager_name=get_username($manager_filter,$coms_conect);
							$str_manager=" and manager_id='$manager_name'";
							$manager_page="&manager_filter=$manager_filter";
							}
							if($q>""){
							$str_q=" and url like'%$q%'";
							$q_filter="&q_filter=$q";
							}						
							$page=injection_replace($_GET["page"]);
							$val=injection_replace($_GET["val"]);
							$query1="select  count(id) as count from  new_url_log  where id> 0 $str_manager $str_q";
							$result1 = $conn->query($query1);
							$row1 = $result1->fetch_assoc();
							$a=pgsel((int)$page,$row1['count'] ,10,10,"$root/newcoms.php?yep=new_viewlog$q_filter$manager_page");
							$from=$a[0];
							$to=$a[1];
							$pgsel=$a[2];
							$query="select  * from new_url_log  where id> 0 $str_manager $str_q order by id desc LIMIT $from,$to";
							####ساخت فایل
							if($val=='create_file'){
							$query12="select  * from new_url_log where id> 0 $str_manager $str_q";	
							 
							$result12 = $conn->query($query12);
							$myfile = fopen("export.txt", "w") or die("Unable to open file!");
							fwrite($myfile,  "\xEF\xBB\xBF");$j=1;
								while($row12 = $result12->fetch_assoc()) {							
									fwrite($myfile,"$j   ". miladitojalalitime(date('Y-m-d H:i:s',$row12['date'])).'   '.$row12['manager_id'].'  '.$row12['url'].'   '.$row12['ip']."\r\n");
									$j++;
								}
							show_msg('فایل با موفقیت ساخته شد');	
							}####دانلود فایل	
							if($val=='download'){
								download_file('export.txt');
							}?>
		
<style>
#manager_filter{
	position: relative !important; top: -18px !important; width: 160px !important;
}
</style>
	<div class="tabbable">

		<!--ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?=$new_sysmenu[10]?> </a></li>
			<li class="pull-right" style="right:1%;">
				<i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_language" title="ساخت فایل"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</i>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab"  onclick="window.location.href='newcoms.php?yep=new_viewlog&val=create_file<?=$manager_page?>'" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						<?=$new_create_file?>
					</a>
					</ul>
				</div>
			</li>
			<li class="pull-right" style="right:2%;">
				<i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_language" title="دانلود فایل"><i class="ace-icon fa fa-download bigger-110"></i></span>
				</i>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab"   onclick="window.location.href='newcoms.php?yep=new_viewlog&val=download'" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
						<i class="ace-icon fa fa-download bigger-110"></i>
						<?=$dl_download?>
					</a>
					</ul>
				</div>
			</li>
			
		</ul-->
		<div class="msheet tab-content">
	  
		<div class="secfhead">
			<!-- #section:main/viewlog.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">ریزکارکرد</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/viewlog.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
					<!-- #section:main/viewlog.icon -->
					<?if($_SESSION["can_add"]==1){?>
					<li id="newpag" class="addicon">
						<a data-toggle="tab" onclick="window.location.href='newcoms.php?yep=new_viewlog&val=create_file<?="$manager_page$q_filter"?>'" data-placement="bottom" title="ساخت فایل" >
							<span class="flaticon-add149"></span>
						</a>
					</li>
					<?}?>
					<li id="switchword">
						<a data-toggle="tab" onclick="window.location.href='newcoms.php?yep=new_viewlog&val=download'" title="دانلود فایل">
							<span class="flaticon-down56"></span>
						</a>
					</li>
					<!-- /section:main/viewlog.icon -->
				</ul>
			</div>

		</div>
		
			<div class="tab-pane active" id="tab1">
				<div class="">
					<div class="tt">
						<!-- #section:main/viewlog.table -->
						<div class="row-fluid">
							<!--div class="col-md-6 yepco"->
								
							</div-->
							<div class="col-md-10">
								<div class="form-group yepco">
									<form action='' method="get" class="navbar-form navbar-left pull-right yepco" role="search">
										<input type="text" name='q' value="<?=$q?>" class="form-control search2" placeholder="<?=$s_Combo_search?>">
										<input type="hidden" name='yep' value="new_viewlog" />
										<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
										
									</form>
								</div>		
							</div>
						</div>
						
						<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
							<thead>
								<tr>
									<th><?=$sd_Shop_basket_row?></th>
									<th><?=$sd_shop_billing_date?></th>
									
									<th><?=$new_manage?></th>
									
									<th><?=$Ads_List_link?></th>
									<th><?=$s_ComponentsNew_username?> ip</th>
								</tr>
							</thead>
							<tbody>
								<?$result = $conn->query($query);$i=1;	
								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
									?>
								<tr>
									<td><?=($page*10)+$i?></td> 
									<td ><?=miladitojalalitime(date('Y-m-d H:i:s',$row['date']))?></td>
									<td><?=$row['manager_id']?></td>
									<td><a href="<?=$row['url']?>"><?=$row['url']?></a></td>
									<td><?=$row['ip']?></td>
									
								</tr>
								<?$i++;}}?>
							</tbody>
						</table>
						<!-- /section:main/viewlog.table -->
					<?=$pgsel?>
					
					</div>	
				</div>
			</div>
			
		</div>
	</div>	
<script>
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
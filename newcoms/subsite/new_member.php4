<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<div class="modal fade" id="send_pm" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">ارسال پیام</h4>
		</div>
		<div class="modal-body">
			<textarea name="pm" class="form-control " id='pm'></textarea>
		</div>
		<div class="modal-footer ">
			<button type="button" id="send_member_pm"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;ارسال</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
	
</div>
<div class="modal fade" id="send_email" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">ارسال ایمیل</h4>
		</div>
		<div class="modal-body">
			<textarea name="email" class="form-control " id='email'></textarea>
		</div>
		<div class="modal-footer ">
			<button type="button" id="send_member_email"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;ارسال</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>

</div>

<div class="modal fade" id="send_sms" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">ارسال ُSMS</h4>
		</div>
		<div class="modal-body">
			<textarea name="sms" class="form-control " id='sms'></textarea>
		</div>
		<div class="modal-footer ">
			<button type="button" id="send_member_sms"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;ارسال</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>

</div>


<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>

<style>
.desm{display: inline-flex !important;}
</style>
<script>
$(document).ready(function(){
	$("#drop1").hide();
	
	var boxes = $('input.conchkNumber');
	boxes.on('change', function () {
	  $('#drop1').toggleClass("desm", boxes.is(":checked"));
	});
	
	var boxall = $('input.conchkSelectAll');
	boxall.on('change', function () {
	  $('#drop1').toggleClass("desm", boxes.is(":checked"));
	});
});
</script>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading"><?=$l_delete?></h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> <?=$new_del_user_confidence?></div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
		</div>
	</div>
	</div>
</div>

<div class="modal fade" id="reset_password" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading"><?=$pro_recover_password?></h4>
			</div>
			<div class="modal-body">
			<div class="modal-body">
				نام کاربری
				<input name="reset_user" readonly class="form-control " id='reset_user'> 
				بازیابی کلمه عبور
				<input name="reset_pass" type='password' class="form-control " id='reset_pass'> 
			</div>
			</div>
			<div class="modal-footer ">
				<button type="button" id="btn_reset_pass"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
				<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
			</div>
		</div>
	</div>
</div>
<?$lang_filter='fa';
$site_filter='main';

if(isset($_GET['site_filter']))
$site_filter=injection_replace($_GET['site_filter']);

if(isset($_GET['lang_filter']))
$lang_filter=injection_replace($_GET['lang_filter']);

$active_user_email=injection_replace($_POST['active_user_email']);

$active_user_sms=injection_replace($_POST['active_user_sms']);
if(isset($_POST['manage_site_filter']))
$manage_site_filter=injection_replace($_POST['manage_site_filter']);
if(isset($_POST['manage_lang_filter']))
$manage_lang_filter=injection_replace($_POST['manage_lang_filter']);
if($_POST['flag']==1){
	
	$query11="SELECT id  from new_user_setting where name='active_user_email' and la='$manage_lang_filter' and site='$manage_site_filter'";
 	$result = $coms_conect->query($query11);
	if(($result->num_rows > 0)){
	$query="update new_user_setting set value='$active_user_email' where name='active_user_email' and la='$manage_lang_filter'  and site='$manage_site_filter'"; 
	$coms_conect->query($query);
	}else{
	$query="insert into new_user_setting(name,value,la,site)values('active_user_email','$active_user_email','$manage_lang_filter','$manage_site_filter')";
	//echo "insert into new_user_setting(name,value,la,site)values('active_user_email','$active_user_email','$manage_lang_filter','$manage_site_filter')";
	$coms_conect->query($query);
	}
	
	$query11="SELECT id  from new_user_setting where name='active_user_sms' and la='$manage_lang_filter' and site='$manage_site_filter'";
	$result = $coms_conect->query($query11);
	if(($result->num_rows > 0)){
	$query="update new_user_setting set value='$active_user_sms' where name='active_user_sms' and la='$manage_lang_filter'  and site='$manage_site_filter'"; 
	$coms_conect->query($query);
	}else{
	$query="insert into new_user_setting(name,value,la,site)values('active_user_sms','$active_user_sms','$manage_lang_filter','$manage_site_filter')";
	$coms_conect->query($query);
	}
	
}?>


<div class="modal fade" id="setting_aboutus" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<form action="" method="post">
		<div class="modal-dialog">
		<div class="modal-content">
	<div class="msheet tab-content">
		<div class="secfhead">
			<!-- #section:subsite/user_setting.head -->
			<div class="sectitle">
				<div class="icon">
					<span class="flaticon-file23" style=""></span>
				</div>
				<div class="title">
					<p class="titr">تنظیمات کاربران سایت</p><p class="lead">توضیحات این بخش</p>
				</div>
			</div>
			<!-- /section:subsite/user_setting.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>
		</div>
		<div class="tab-pane active" id="tab1">
			<div class="tt">
				 <div class="pull-right btn-default btn-xs yepco">
					<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
				</div>
				<div class="pull-right btn-default btn-xs yepco">
				<?$sql = "SELECT name FROM new_subsite where status=1";
					$result = $coms_conect->query($sql);
					echo "<select name='manage_site_filter' id='manage_site_filter' class='form-control' rows='2' style='padding:0px;'>";
					while($row = $result->fetch_assoc()) {
						$str="";
						if($site_filter==$row['name'])
						$str="selected";
						if(in_array($row['name'],$_SESSION["manager_title_site"]))
						echo "<option $str value='{$row['name']}'>{$row['name']}</option> ";
					}				
					echo '</select>';?>
				</div>
			</div>
		</div>
		<br>
		<br>
		<br>
		<?$user_array_setting=array();
		$query="select name from new_user_setting where  la='$lang_filter' and site='$site_filter' and value=1";
			$result = $coms_conect->query($query);
			while($RS = $result->fetch_assoc()){
				$user_array_setting[]=$RS['name'];
			}
		?>
		
		
			<input type="hidden" value="1" name='flag'>
		<!-- #section:subsite/user_setting.set -->
			<div class="form-group row">
				<div class="form-group col-sm-6">
					<label class="control-label">تایید ایمیل کاربران</label>
					<input value='1' type="checkbox" <?if(in_array('active_user_email',$user_array_setting)) echo 'checked'?> name="active_user_email" id="active_user_email" class="form-control"/>
				</div>
			</div>
			 <div class="form-group row">
				<div class="form-group col-sm-6">
					<label class="control-label">تایید موبایل کاربران</label>
					<input value='1' type="checkbox" <?if(in_array('active_user_sms',$user_array_setting)) echo 'checked'?>   name="active_user_sms" id="active_user_sms" class="form-control"/>
				</div>
			</div>
		
		<!-- /section:subsite/user_setting.set -->	
			<div class="panel-footer bttools">
				 
				<button   type="submit" class="btn btn-success submit2"><span class="flaticon-verified9"></span><span>دخیره</span></button>
			</div>
	</div>	 		
	</div>			
	</div>			
	</form>
</div>





<style>
	input[type=checkbox].ace.ace-switch.ace-switch-6+.lbl::before {content: "\f023";}
	input[type=checkbox].ace.ace-switch.ace-switch-6:checked+.lbl::before {content: "\f09c";}
</style>
<?$site_filter=injection_replace($_GET['site_filter']);
$q=injection_replace($_GET['q']);
$manager_q='';
 if($q>""){
	$str_q="  and(name like '%$q%' or  user_name like'%$q%' or  family like '%$q%')";
	$manager_q="&q=$q";
 }
 $manager_site='';
 if(isset($_GET['site_filter'])){
	$site=injection_replace($_GET['site_filter']);
	$manager_site="&site_filter=$site";
 }
 else
	$site='main';
?>

	<div class="tabbable">

		<!--ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?=$new_sysmenu[71]?> </a></li>
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:subsite/member.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">اعضای سایت</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:subsite/member.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
					 <li id="switchword">
						<a data-toggle="modal" data-target="#setting_aboutus" href="#" data-placement="bottom" title="تنظیمات کاربران">
							<span class="fa fa-gear" style="margin-top: 8px;margin-left: 4px;"></span>
						</a>
					</li>
				</ul>
			</div>

			</div>
			<div class="tab-pane active" id="tab1">
					<!-- #section:subsite/member.table -->					
					<div class="tt">
			
						
						<div class="row">
							<!--div class="col-md-6 yepco"--><!--/div-->
							<div class="col-md-10" style="display: inline-flex;">
								<div class="" id="drop1" style="display: inline-flex;">
				
							 <input  type="hidden" id='check_value'>
									
									<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;margin-right: 3px;margin-top: 7px;">
										<span class="sr-only">Toggle navigation</span>
										<span data-toggle="modal" data-target="#delete" href="#" title="<?=$l_delete?>"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
									</i>
									<?if($_SESSION["can_delete"]==1){ ?>
									<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
										<ul class="nav navbar-nav navbar-left">
											<a class="del_all btn pull-left btn-danger btn-sm" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="margin-right: 3px;margin-top: 7px;">
												<?=$l_delete?> 
											</a>
										</ul>
							
									</div>
									<?}?>
					
			 
								</div>
						<!--a id=" " class=" ">
							 <i class="ace-icon fa fa-check"></i>
							 <span class="bigger-110">ارسال خبرنامه</span>
						</a-->
								<div class="form-group yepco">
									<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
										<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو">
										<input type="hidden" name="yep" id="q" value="new_member">
										<input type="hidden" name="site_filter" value="<?=$site_filter?>">
									</form>	
									
									<div class="pull-right btn-default btn-xs yepco">
									<?create_sub_site_filter($site_filter,$coms_conect,$_SESSION["manager_title_site"]);
									$manager_title_site="'".implode("','",$_SESSION["manager_title_site"])."'";?>
									</div>
								</div>		
							</div>
						</div>
			
						<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
							<thead>
								<tr>	
									<th><?=$sd_Shop_basket_row?></th>
									<th class="center">
										<label class="position-relative">
											<input type="checkbox" class="conchkSelectAll" />
											<span class="lbl"></span>
										</label>
									</th>
									<th><?=$pro_sms_user?></th>
									<th><?=$Ads_Credits_name?></th>
									<th><?=$s_Members_tel?></th>
									<th><?=$s_Members_start?></th>
									<th><?=$Ads_Credits_lastlogin?></th>
									<th><?=$new_sysmenu[2]?></th>
									 
									
								</tr>
							</thead>
							<tbody>
									<?if($site_filter==-1){
								$str_site=" and  site in ($manager_title_site)";
								$site_page="&site_filter=$site_filter";
							}
							else if($site_filter>0){
								$str_site=" and  site='$site_filter'";
								$site_page="&site_filter=$site_filter";
							}
									
									
									
									
									$sql1 = "SELECT count(id) as cnt from  
									new_members   where id>0  $str_site $str_q";
									
									$result = $coms_conect->query($sql1);
									$RS = $result->fetch_assoc();
									$a=pgsel((int)$_GET["page"],$RS["cnt"],10,10,"$root/newcoms.php?yep=new_member$site_page$manager_q$manager_site");
										$from=$a[0];
										$to=$a[1];
										$pgsel=$a[2];
									$query="select last_login,email,mobile,user_name,name,family,date,id,status from new_members where id>0  $str_site $str_q";
									$j=1;
									$result = $coms_conect->query($query);
										while($RS1 = $result->fetch_assoc()) {
										$str='';
										if($RS1['status']==1)
										$str='checked';	
										$temp=explode(" ",$RS1["last_login"]);
										?>
								<tr>
									<td><?=$j?></td>
									<td class="center">
										<label class="position-relative">
											<input type="checkbox" id="<?=$RS1['id']?>" class="conchkNumber" />
											<span class="lbl"></span>
										</label>
									</td>									
									<td><a href="/newcoms.php?dll=new_manage_users&la=fa"><?=$RS1['user_name']?></a></td>
									
									<td><?=$RS1['name'].'  '.$RS1['family']?></td>
									<td><?=$RS1['mobile']?></td>
									<td><?=miladitojalaliuser(date('Y-m-d',$RS1['date']));?></td>
									<td><?if($RS1['last_login']!='0000-00-00 00:00:00') echo miladitojalaliuser($temp[0]).' - ' .$temp[1];else echo 'ورودی صورت نگرفته است';?></td>
										

									 
									<td>
										<?if($_SESSION["can_edit"]==1){?>  

										<a id="<?=$RS1['user_name']?>" class="green reset_password" data-rel="tooltip" title="<?=$pro_recover_password?>" data-title="delete" data-toggle="modal" data-target="#reset_password" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										 	<i class="ace-icon fa fa-list bigger-120"></i>
										</a>
										<?}?>
										<a id="<?=$RS1['user_name']?>" class="tooltip-error send_pm" data-rel="tooltip" title="ارسال پیام" data-title="delete" data-toggle="modal" data-target="#send_pm" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										 	<i class="ace-icon fa fa-send bigger-120"></i>
										</a>
										<a id="<?=$RS1['email']?>" class="tooltip-error send_email" data-rel="tooltip" title="ارسال ایمیل" data-title="delete" data-toggle="modal" data-target="#send_email" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										 	<i class="ace-icon fa fa-mail-reply bigger-120"></i>
										</a>
										<a id="<?=$RS1['mobile']?>" class="tooltip-error send_sms" data-rel="tooltip" title="ارسال sms" data-title="delete" data-toggle="modal" data-target="#send_sms" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										 	<i class="ace-icon fa fa-mobile bigger-120"></i>
										</a>
										<?if($_SESSION["can_delete"]==1){?>	
										<a class="red del_menu" id="<?=$RS1['id']?>" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" title="<?=$s_Pages_delete?>" style="font-size: 15px !important;">
											<i class="ace-icon fa fa-trash-o bigger-120"></i>
										</a>
										<?}if($_SESSION["can_edit"]==1){?> 
										<label>
										<a   value="<?=$RS1['user_name']?>" class="login_user_member"    title="ورود با نام کاربری" href="#">
											<i class="ace-icon fa fa-user bigger-120"></i>
										</a>
										<input <?=$str?> id="<?=$RS1['id']?>"  name="switch-field-1" class="ace ace-switch ace-switch-6 conchkNumber_4" type="checkbox" />
										<span class="lbl" title="فعال سازی"></span></label>
										<?}?>
									</td>
									<!--td class="center">
										
											
										
									</td-->	
								</tr>
									<?$j++;}?>
							</tbody>
						</table>
					</div>
					<!-- /section:subsite/member.table -->
				<?=$pgsel?>					
			</div>
<div class="col-sm-12" id="show_msg" style=" " >
  </div>
		</div>

  <script>
   $(".alerts").delay(6000).addClass("in").fadeOut(6000);
</script>	
	</div>			
<?$_SESSION["del_item"]='del_member';?>	
<script src="ajax_js/members.js"></script>	

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
	
	tinymce.init({
		selector: "#email",
		height: 300,
		width:"99.5%",
		directionality : 'rtl',
		language : 'fa_IR',
		menubar:false,
		
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

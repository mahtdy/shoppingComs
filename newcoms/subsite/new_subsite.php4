<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css">
<style>
.error {
color : red;
}
</style>
<script>
 $(function() {
         $('#new_subsite').validate({
            
            rules: {
				name: {
					required:true
				},
				host_ip: {
					required:true
				},
				domain_name: {
					required:true
				},
				host_user: {
					required:true
				},
				host_pass: {
					required:true
				},
				title: {
					required:true
				}
            },
            messages: {
				name: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				host_ip: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				domain_name: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				host_pass: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				host_user: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				
				title: {
					required:"<?=$pro_field_mandatory_fill?>"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? '<?=$pro_1field_missing?>'
                        : '' + errors + '<?=$pro_field_missing?>';
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

<script>
 $(function() {
         $('#delete658').validate({
            
            rules: {
				host_ip: {
					required:true
				},
				domain_name: {
					required:true
				},
				host_user: {
					required:true
				},
				host_pass: {
					required:true
				}
            },
            messages: {
				host_ip: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				domain_name: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				host_pass: {
					required:"<?=$pro_field_mandatory_fill?>"
				},
				host_user: {
					required:"<?=$pro_field_mandatory_fill?>"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? '<?=$pro_1field_missing?>'
                        : '' + errors + '<?=$pro_field_missing?>';
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


<form class="form-horizontal" id="delete658" name="delete658" action="" role="form" method="post" enctype="multipart/form-data">
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading"><?=$s_Pages_delete?></h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> <?=$new_del_subsite_field_fill?> </div>
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="family"><?=$new_name_domain?>*</label> 
					<div class="form-group col-md-9">
						<input type="text" name="del_domain_name" id="del_domain_name" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="family"><?=$new_name_user_host?>*</label> 
					<div class="form-group col-md-9">
						<input type="text" name="del_host_user" id="del_host_user" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="family"><?=$new_pass_host?>*</label> 
					<div class="form-group col-md-9">
						<input type="password" name="del_host_pass" id="del_host_pass" class="form-control" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label" for="family"><?=$new_ip_host?>*</label> 
					<div class="form-group col-md-9">
						<input type="text" name="del_host_ip" id="del_host_ip" class="form-control" >
					</div>
				</div>
				
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
			<img id="show_waiting_video" src="waiting.gif" dir="center" style="display:none">
		</div>
	</div>
	</div>
</div>
</form>

<?$name=injection_replace($_POST['name']);//header('Location: http://google.com');echo 'salma';exit;	
$title=injection_replace($_POST['title']);
$status=injection_replace($_POST['status']);
$action=injection_replace($_POST['action']);
$edit_subid=injection_replace($_POST['edit_subid']);
$edit_mode=injection_replace($_POST['edit_mode']);
$host_pass=injection_replace($_POST['host_pass']);
$host_user=injection_replace($_POST['host_user']);
$domain_name=injection_replace($_POST['domain_name']);
$host_ip=injection_replace($_POST['host_ip']);



if($name>""&&$edit_mode==0&&$manager_group==1&&$_SESSION['can_add']==1){

	include 'httpsocket.php';
	$sock = new HTTPSocket;
	
	$sock->connect($host_ip,2222);
	$sock->set_login($host_user,$host_pass);
	$sock->set_method('POST');
	$sock->query('/CMD_API_SUBDOMAINS',
			array(
					'action' => 'create',
					'domain' => "$domain_name",
					'subdomain' => "$name",
					'create' => 'Create'
		));
	$result = $sock->fetch_body();
	 
	$qaz = $sock->get_status_code();
	$q = $sock->fetch_result();
	//echo $qaz.'00000<br>' ;print_r($sock);
	if($qaz==200&&$q='HTTP/1.1 200 OK'&&is_dir("$name")){ 
		$query1="insert into new_subsite(domain_name,parent_id,status,name,title,date,user_id,ip)
		values ('$domain_name','$manager_id','$status','$name','$title',NOW(),$manager_id,'$custom_ip')";
		$coms_conect->query($query1);
		$manage_site=mysqli_insert_id($coms_conect);
			$query1="insert into new_manage_lang(lang_id,manager_id,type) 
			values ('$manage_site',1,'s')";
			$coms_conect->query($query1);
			
		$query="SELECT lang_id from new_manage_lang where manager_id='$manager_id' and type='s'";
				$result = $coms_conect->query($query);
					while($row = $result->fetch_assoc()) {
					
					$site[]=$row['lang_id'];
				}
				$_SESSION["manager_site"]=$site;	
			####قالب		
			$query1="insert into new_tem_setting(text,link,name,pic,title,tem_name,la,pic_adress,site)
			select text,link,name,pic,title,tem_name,la,pic_adress,'$name' from new_tem_setting  where site='main' and la='fa'";
			$coms_conect->query($query1);
			
			####منو 
			$query1="insert into  new_menu(id,rang,parent_id,name,description,link,target,type,date,edit_date,user_id,edit_user_id,ip,edit_ip,la,site_id)
			select id,rang,parent_id,name,description,link,target,type,date,edit_date,user_id,edit_user_id,ip,edit_ip,la,'$name' from new_menu  where site_id='main' and la='fa'";
			$coms_conect->query($query1);			
			//	echo $query1;
			$unic_id=time(); 
			$query="select id from new_menu where site_id='$name'";
			
			$result = $coms_conect->query($query);
				while($RS1 = $result->fetch_assoc()) {
				$id=$RS1["id"];
				$query1="update new_menu set unic_id=$unic_id where id='$id' and site_id='$name'"; 
				$coms_conect->query($query1);		
				$unic_id++;
			}
			
			
		#####قالب
			$query56="SELECT manager_id FROM new_manage_lang a,new_subsite b  WHERE lang_id=1 and type='ts' and b.id=a.lang_id";
			$result56 = $coms_conect->query($query56);
			$RS56 = $result56->fetch_assoc();

			$query18="insert into new_manage_lang(lang_id,manager_id,type) 
			values ('$manage_site',{$RS56['manager_id']},'ts')";
			$coms_conect->query($query18);		
			
			###فایل های زیر سایت
		
			copy_directory("subdomain","$name");	
			unlink("$name/index.html");
			$_SESSION['manager_title_site'][]=$name;
			
			
			
			
		show_msg($new_successfull);
	}
	else
	show_msg_warninig('زیر سایت فوق   ایجاد نشد');
}if($name>""&&$edit_mode==1&&$_SESSION["can_edit"]==1&&check_lang_title($edit_subid,$_SESSION['manager_site'])==1){
		$query1="update new_subsite set domain_name='$domain_name',status='$status', title='$title',ip='$custom_ip', edit_user_id='$manager_id', edit_date=NOW() where id=$edit_subid"; 
		$coms_conect->query($query1);
}	
?>
	<div class="tabbable">
		<!--ul class="nav nav-tabs">
			<li class="pull-right" style="right:1%;">
				<i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_templates" title="<?=$new_new_subsite?>"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</i>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" id="add_item" href="#add_templates" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						<?=$new_new_subsite?></a>
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
				<div class="title"><p class="titr">لیست زیرسایت ها</p><p class="lead">توضیحات این بخش</p></div>
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
		
			<div class="tab-pane active" id="tab1">
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
								<th><?=$s_ComponentsNew_username?> <?=$new_sysmenu[70]?></th>
								<th><?=$s_ComponentsNew_tdd?></th>
								<th><?=$ads_AdsNew_sid?></th>
								<th><?=$new_sysmenu[2]?></th>
								
							</tr>
							
						</thead>
						<tbody>
						<? /*if($_SESSION['manager_user_name']!='comsroot')
							 $str1="and  parent_id='$manager_id'";*/
							$query12="select status,name,title,id from new_subsite   where id>1    order by id desc";
							     $result = $coms_conect->query($query12);$i=1;
								while($RS1 = $result->fetch_assoc()) {	 
								
								$id=$RS1["id"];
								$status=resolve_status($RS1["status"]);
								$title=$RS1["title"];
								$name=$RS1["name"];?>
								
							<tr>
								<td><?=$i;?></td>
								<td><?=$name?></td>
								<td><?=$title?></td>
								<td><?=$status?></td>
								<td>
								<?/*if($_SESSION["can_edit"]==1){?>
									<a  id="<?=$id?>" class="edit_menu blue" data-toggle="tab" href="#add_templates" style="font-size: 15px !important;"><i class="ace-icon fa fa-edit bigger-120"></i></a>
								<?}*/?>
								
								<?if($_SESSION["can_delete"]==1&&$_SESSION["manager_user_name"]='comsroot'){?>	
									
								<a id="<?=$id?>" class="del_menu red" class="red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" title="حذف" style="font-size: 15px !important;"><i class="ace-icon fa fa-trash-o bigger-120"></i></a>
								<?}?>
								</td>
							</tr>
						<?$i++;}?>
						</tbody>
					</table>
					
				</div>
				<!-- /section:subsite/subsite.table -->
			</div>	
			<?if($_SESSION["can_add"]==1){?>	
			<div class="tab-pane" id="add_templates">
			
				<form class="form-horizontal" id="new_subsite" name="new_subsite" action="" role="form" method="post" enctype="multipart/form-data">
					<input type="hidden" id="edit_mode" name="edit_mode" value="0">
					<input type="hidden" id="edit_subid" name="edit_subid" value="0">	
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
						<a href="newcoms.php?yep=new_subsite" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
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
					<div class="panel-body">
					<!-- #section:subsite/subsite.list -->				
						<div class="form-group">
							<label class="col-md-3 control-label" for="group_name"><?=$s_ComponentsNew_username?> <?=$new_sysmenu[70]?>*</label> 
							<div class="form-group col-md-4">
								<div class="input-group input-group-sm">
									<span class="input-group-addon"><?=$_SERVER['HTTP_HOST']?></span>
									<input type="text" name="name" id="name" class="form-control" >
								</div>
							</div>
						</div>
					 <div id="show_check_box" class="form-group "></div>
					 
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">عنوان*</label> 
							<div class="form-group col-md-4">
								<input type="text" name="title" id="title" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family"><?=$new_name_domain?>*</label> 
							<div class="form-group col-md-4">
								<input type="text" name="domain_name" id="domain_name" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family"><?=$new_name_user_host?>*</label> 
							<div class="form-group col-md-4">
								<input type="text" name="host_user" id="host_user" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family"><?=$new_pass_host?>*</label> 
							<div class="form-group col-md-4">
								<input type="password" name="host_pass" id="host_pass" class="form-control" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family"><?=$new_ip_host?>*</label> 
							<div class="form-group col-md-4">
								<input type="text" name="host_ip" id="host_ip" class="form-control" >
							</div>
						</div>	
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="family"><?=$ads_AdsNew_sid?></label> 
							<div class="form-group col-md-4">
							<select name="status" id="status" class="form-control" >
								<option value="1"><?=$Ads_AccountNew_type2?></option>
								<option value="0"><?=$Ads_AccountNew_type1?></option>
				
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
		 $("#new_subsite").submit();
	 });				 
</script>		
<?}?>
<?$_SESSION["del_item"]='del_subsite';
$_SESSION["edit_item"]='edit_subsite';?>			
<script src="ajax_js/subsite.js"></script>			
		</div>
</div>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">

<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script><?//print_r($manager_la)?>
<script type="text/javascript">

 $(document).ready(function() {
 	$("#expire_date").datepicker({
                    changeMonth: true,
					changeYear: true,
					isRTL: true,
                    dateFormat: "yy/mm/dd"
                });
	
    $('#manage_lang').select2({
        data: [
				<?
				$query="select id,name from new_language where status=1";	$i=0;
				$result = $coms_conect->query($query);
					while($RS1 = $result->fetch_assoc()) {
					$id=$RS1["id"];
					$name=$RS1["name"];
					if(in_array($id,$manager_la)){
					//echo $id.'<br>';
						if($i==0)
						echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						else
						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						$i++;
					}
				
				}
		?>
        ],
        allowClear: true,
        multiple: true,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
	
	
});

$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});
</script>
<?//print_r($manager_la);?>	
	
<style>
.error {
color : red;
}
</style>
<script>
 $(function() {
         $('#manage_blok').validate({
            
            rules: {
				name: {
					required:true
				},
				user_name: {
					required:true
				},
				password: {
					required:true
				},
				email: {
					required:true,
					email:true
				},
				mobile: {
					required:true,
					number:true
				},
				group_id: {
					required:true
				}
            },
            messages: {
				name: {
					required:"پر کردن اين فيلد الزامي است"
				},
				user_name: {
					required:"پر کردن اين فيلد الزامي است"
				},
				password: {
					required:"پر کردن اين فيلد الزامي است"
				},
				email: {
					required:"پر کردن اين فيلد الزامي است",
                    email: "فرمت اين فيلد به اين شکل مي باشد name@domain.com"
				},
				mobile: {
					required:"پر کردن اين فيلد الزامي است",
					number:"این فیلد عددی است"
				},
				group_id: {
					required:"پر کردن اين فيلد الزامي است"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? '1 فيلد خالي مانده است لطفا پر کنيد'
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

<? 
$q=injection_replace($_GET['q']);
	$name=injection_replace($_POST['name']);
	$user_name=injection_replace($_POST['user_name']);
	$password=injection_replace($_POST['password']);
	$email=injection_replace($_POST['email']);
	$group_id=injection_replace($_POST['group_id']);
	$expire_date=jalalitomiladi(injection_replace($_POST['expire_date']));
	$can_add=injection_replace($_POST['can_add']);
	$can_draft=injection_replace($_POST['can_draft']);
	$can_delete=injection_replace($_POST['can_delete']);
	$can_edit=injection_replace($_POST['can_edit']);
	$status=injection_replace($_POST['status']);
	
	$semat=injection_replace($_POST['semat']);
	$mobile=injection_replace($_POST['mobile']);
	$phone=injection_replace($_POST['phone']);
	$phone_code=injection_replace($_POST['phone_code']);
	$address=injection_replace($_POST['address']);
	$avatar=injection_replace($_POST['avatar']);


	$edit_mode=injection_replace($_POST['edit_mode']);
	$edit_manager_id=injection_replace($_POST['edit_manager_id']);
	


##################چک کردن زبان#######################
$manage_lang=injection_replace($_POST['manage_lang']);
if($manage_lang>""){
	$manage_lan=explode(",",$manage_lang);
	$temp=(array_diff($manage_lan,$_SESSION["manager_lang"]));
	
 	if($temp[0]!='')
	 header('Location: new_manager_signout.php');
}
$lang_filter=injection_replace($_GET['lang_filter']);
if($lang_filter>""&&!in_array($lang_filter,$_SESSION["manager_title_lang"])){
	 header('Location: new_manager_signout.php');
 
}
#########################چک کردن زیر سایت#############
$manage_site=injection_replace($_POST['manage_site']);
$site_filter=injection_replace($_GET['site_filter']);

if(($manage_site>""&&!in_array($manage_site,$_SESSION["manager_site"]))||($site_filter>""&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
header('Location: new_manager_signout.php');
 
}

#######################چک کردن کاربران#####################
$manager_filter=injection_replace($_GET['manager_filter']);
if($manager_filter>"")
check_lang_title($manager_filter,$_SESSION["manager_user_permisson"]);


 

if(($user_name)>""&&$edit_mode==0&&$_SESSION['can_add']==1){
$real_paass=$password;	
$password=create_password($user_name,$password);
	if($group_id!=1){
		if($can_add!=1||$_SESSION["can_add"]==0)
		$can_add=0;
		if($can_delete!=1||$_SESSION["can_delete"]==0)
		$can_delete=0;
		if($can_edit!=1||$_SESSION["can_edit"]==0)
		$can_edit=0;
	if($can_draft!=1||$_SESSION["can_draft"]==0)
		$can_draft=0;
	}else{
		$can_edit=1;
		$can_draft=1;
		$can_add=1;
		$can_delete=1;

	}	
if($group_id==1){
	$manage_lan=$_SESSION["manager_lang"];
	
	}
	
	if(check_insert_lang_permission_manager($manage_lan,$manager_id,$coms_conect)==1&&$_SESSION["can_add"]==1){
		
		$query1="insert into new_managers(avatar,address,phone_code,phone,mobile,semat,parent_id,del_viwe,status,name,user_name,password,email,group_id,expire_date,can_add,can_draft,can_delete,can_edit,site_id,date,user_id,ip,la) 
		values ('$avatar','$address','$phone_code','$phone','$mobile','$semat',$manager_id,1,$status,'$name','$user_name','$password','$email','$group_id','$expire_date','$can_add',$can_draft,'$can_delete','$can_edit','$site_id',NOW(),$manager_id,'$custom_ip','$la')";
		$coms_conect->query($query1);
		show_msg($new_successfull);
		//echo $query1;
		$id=mysqli_insert_id($coms_conect);
		$folder='source/'.$_SESSION["manager_folder_path"].'/'.$user_name;
		mkdir($folder,0777);//exit;
		$temp=count($_SESSION["manager_user_permisson"]);
		$_SESSION["manager_user_permisson"][$temp]=$id;
		if($group_id!=1){
			foreach ($manage_lan as $value){
				$query1="insert into new_manage_lang(lang_id,manager_id,type) 
				values ('$value',$id,'l')";
				$coms_conect->query($query1);
			}
			$query1="insert into new_manage_lang(lang_id,manager_id,type) 
			values ('$manage_site',$id,'s')";
			$coms_conect->query($query1);
		}else if($group_id==1){
			$query1="insert into new_manage_lang(lang_id,manager_id,type) select lang_id,'$id',type from new_manage_lang where manager_id='1'";
			$coms_conect->query($query1);
		}

	###ارسال اس ام اس به مدیر جدید	
	  $senderNumbers=array($senderNumbers);
      $recipientNumbers=array($mobile);
      $messageBodies=array("نام کاربری :$user_name و کلمه عبور :$real_paass"."سایت $domain_name");
      $sms=send_sms($sms_url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$manager_id);
	####ارسال ایمیل به مدیر جدید
		mail($email,"ساخت مدیر جدید","نام کاربری :$user_name و کلمه عبور :$real_paass"."سایت $domain_name");
	  $arr_attach=array("email"=>$email,"date"=>time(),"text"=>"نام کاربری :$user_name و کلمه عبور :$real_paass"."سایت $domain_name","manager_id"=>$manager_id);
	  insert_to_data_base($arr_attach,'new_email_archive',$coms_conect);	
	


	$query1="insert into new_filemanager_setting(value,user_id,name) select value,'$id',name from new_filemanager_setting where user_id=$manager_id";
	$coms_conect->query($query1);
	//echo $query1;
	}
	else
	show_msg_warninig('این عملیات غیر مجاز است');
}else if($user_name>""&&$edit_mode>0&&$_SESSION['can_edit']==1){
 
		 

	if($password!='********'){
		$password=create_password($user_name,$password);
		$pass_str="password='$password',";
	}
	if(check_insert_lang_permission_manager($manage_lan,$manager_id,$coms_conect)==1&&$_SESSION["can_edit"]==1){

	$query="select user_id from new_groups where id =$group_id";
	$result = $coms_conect->query($query);
	$RS1 = $result->fetch_assoc();
			$edit_parent_id=$RS1["user_id"];
	

	$query="select parent_id from new_managers where id =$edit_manager_id";
	$result = $coms_conect->query($query);
	$RS1 = $result->fetch_assoc();
			$father_id=$RS1["parent_id"];

	
	$query1="update new_managers set parent_id=$father_id where parent_id=$edit_manager_id"; 
	$coms_conect->query($query1);		
	
		//echo $query1;	

		$query1="update new_managers set status='$status',avatar='$avatar',address='$address',phone_code='$phone_code',phone='$phone',mobile='$mobile',semat='$semat',$pass_str parent_id=$edit_parent_id,expire_date='$expire_date',name='$name',email='$email',group_id='$group_id',can_add='$can_add',can_draft='$can_draft'
		,can_delete='$can_delete',can_edit='$can_edit' where id=$edit_manager_id";
		 //echo $query1;			
		$coms_conect->query($query1);
		show_msg($new_successfull);
		if($group_id!=1){
				$query1="delete from new_manage_lang where manager_id='$edit_manager_id'"; 
				$coms_conect->query($query1);
				foreach ($manage_lan as $value){
					$query1="insert into new_manage_lang(lang_id,manager_id,type) 
					values ('$value',$edit_manager_id,'l')";
					$coms_conect->query($query1);
				}
				$query1="insert into new_manage_lang(lang_id,manager_id,type) 
				values ('$manage_site',$edit_manager_id,'s')";
				$coms_conect->query($query1);
			}
	}
}

 
?>
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
			<textarea name="email" class="form-control " id='send_email_manager'></textarea>
		</div>
		<div class="modal-footer ">
			<button type="button" id="send_member_email"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;ارسال</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
 
</div>
	<script>
		 tinymce.init({
		 selector: "#send_email_manager",
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


<div class="modal fade" id="recover" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>آیا میخواهید مدیر فوق را بازیابی کنید</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="recover_btn_ok"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
		</div>
	</div>
	</div>
</div>

 

	
	<div class="tabbable">
		<!--ul class="nav nav-tabs">
			<?if($_SESSION["can_add"]==1){?>	
			<li class="pull-right" style="right:1%;">
			
				<i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#add_templates" title="افزودن مدیر"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</i>
				
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" id="add_manager" href="#add_templates" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						افزودن مدیر</a>
					</ul>
				</div>
			</li>	
			<?}?>
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			مدیران سایت </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:subsite/manager.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">مدیران سایت</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:subsite/manager.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

					<li id="newpag" class="addicon">
						<a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن مدیر" >
							<span class="flaticon-add149"></span>
						</a>
					</li>
 
				</ul>
			</div>

			</div>
		
			<div class="tab-pane active" id="tab1">
				<!-- #section:subsite/manager.table -->
				<div class="tt">
					<div class="row-fluid">
						<!--div class="col-md-6 yepco">
							
						</div-->
						<?$site_filter=injection_replace($_GET['site_filter']);
							$lang_filter=injection_replace($_GET['lang_filter']);?>
						<div class="col-md-10">
							 <div class="form-group yepco" style="float:right; margin-bottom: 0px;">
									<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search" style="top: 10px;">
									<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو">
									<input type="hidden" name="yep" id="q" value="new_manager">
									<input type="hidden" name="site_filter" value="<?=$site_filter?>">
									<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
									<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
								</form>	
								<div class="pull-right btn-xs yepco">
									<?create_sub_site_filter($site_filter,$coms_conect,$_SESSION["manager_title_site"])?>
								</div>
								<div class="pull-right   btn-xs yepco">
									<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
								</div>
							</div>		
						</div>
					</div>
			 
					
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								
								<th>ردیف</th>
 								<th>نام مدیر</th>
								<th>نام کاربری</th>
								<th>نام مدیر بالایی</th>
								
								<th>ایمیل</th>
								<th>سایت</th>
								<th>وضعیت</th>
								<th><?=$Ads_Credits_lastlogin?></th>
								<th>گروه کاربری</th>
								<th>امکانات</th>
								
							</tr>
						</thead>
						<tbody>
							<?$manager_title_site="'".implode("','",$_SESSION["manager_title_site"])."'";
								$manager_title_lang="'".implode("','",$_SESSION["manager_title_lang"])."'";
							
							
							
							
							$i=1;							
							$tmp=implode(",",$_SESSION["manager_user_permisson"]);
							if($manager_username!='comsroot'){
								$str=" and del_viwe=1 ";
							}
						if($q>""){
							$str_q="  and(a.name like '%$q%' or a.user_name like'%$q%' or a.site_id like '%$q%')";
							$manager_q="&q=$q";
						}
						
							if($site_filter==-1){
								$str_site=" and a.site in ($manager_title_site)";
								$site_page="&site_filter=$site_filter";
							}
							else if($site_filter>0){
								$str_site=" and a.site='$site_filter'";
								$site_page="&site_filter=$site_filter";
							}
						
							 if($lang_filter==-1){
								 
							 $str_lang=" and a.la in ($manager_title_lang)"; 
								$lang_page="&lang_filter=$lang_filter";
							}
							else if($lang_filter>""){
							
								$str_lang=" and a.la='$lang_filter'";
								$lang_page="&lang_filter=$lang_filter";
							} 
								$sql1 = "SELECT count(a.id) as cnt from  
									new_managers a ,new_groups b where   a.group_id=b.id $str_q and   a.id in($tmp) $str_site $str_lang  $str";
						 
							$result = $coms_conect->query($sql1);
							$RS = $result->fetch_assoc();
							
							$a=pgsel((int)$_GET["page"],$RS["cnt"],10,10,"$root/newcoms.php?yep=new_manager$manager_q$str_site$lang_page");
							$from=$a[0];
							$to=$a[1];
							$pgsel=$a[2];
							$query123="select   a.mobile,a.last_login,a.parent_id,a.del_viwe,b.name as group_name,a.id,a.name,a.user_name,a.email,a.site_id,a.status from  
							new_managers a ,new_groups b where   a.group_id=b.id $str_q  $str_site $str_lang and  a.id<>{$_SESSION["manager_id"]} and a.id in($tmp)  $str LIMIT $from,$to";
							$result11 = $coms_conect->query($query123);
						 	
									$result11 = $coms_conect->query($query123);
									 while($RS1 = $result11->fetch_assoc()) {
								 
									$id=$RS1["id"];
									$name=$RS1["name"];
									$user_name=$RS1["user_name"];
									$del_viwe=$RS1["del_viwe"];
									$email=$RS1["email"];
									$site_id=$RS1["site_id"];
									$parent_id=$RS1["parent_id"];
									$query11="select name from  
									new_managers where id=$parent_id";
									$result115 = $coms_conect->query($query11);
									$qaz = $result115->fetch_assoc();
									
									$temp=explode(" ",$RS1["last_login"]);
									 
									$group_name=$RS1["group_name"];
									$status=resolve_status($RS1["status"]);
									if($del_viwe==0 && $user=='comsroot')
									$status='حذف شده';
									//if($user!='comsroot'){
									 
									?>
									<tr <?if($del_viwe==0) echo 'style="color: rgb(202, 202, 202);"'; else if($RS1["status"]==0) echo 'style="color:red"'?>>
										
										<td><?if($pgsel>0) {echo $i*$pgsel;} else {echo $i;}?></td>
										<td><?=$name?></td>
										<td><?=$user_name?></td>
										<td><?=$qaz["name"]?></td>
										<td><?=$email?></td>
										<td><?=$site_id?></td>
										<td><?=$status?></td>
										<td><?if($RS1['last_login']!='0000-00-00 00:00:00') echo $temp[1].'  '.miladitojalaliuser($temp[0]);else echo 'ورودی صورت نگرفته است';?></td>
										<td><?=$group_name?></td>
										<td>
										<?if($_SESSION["can_edit"]==1&&$user_name!='comsroot'){?>
											<a id="<?=$id?>" class="edit_menu blue" href="#add_templates" data-toggle="tab" style="font-size: 15px !important;"><i title="ویرایش" class="ace-icon fa fa-edit bigger-120"></i></a>
										<?}?>
										<?if($del_viwe==0&&$manager_username=='comsroot'){?>
											<a id="<?=$id?>" class="recover_menu green" data-title="recover" data-toggle="modal"  data-target="#recover" data-placement="top" rel="tooltip" style="font-size: 15px !important;"><i title="بازیابی" class="ace-icon fa fa-share-square-o bigger-120"></i></a>
										<?}?>
										<?if($_SESSION["can_edit"]==1&&$user_name!='comsroot'){?>
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
										
										<a href='/newcoms.php?yep=new_sendsms' target='_blank' class="tooltip-error send_sms"   title="آرشیو SMS"  >
										 	<i class="ace-icon fa fa-envelope-o bigger-120"></i>
										</a>
										<a href='/newcoms.php?yep=new_email_archive' target='_blank' class="tooltip-error send_sms"   title="آرشیو Email"  >
										 	<i class="ace-icon fa fa-mail-reply bigger-120"></i>
										</a>
										<a href='/newcoms.php?yep=new_pm_archive' target='_blank' class="tooltip-error send_sms"   title="آرشیو پیام خصوصی"  >
										 	<i class="ace-icon fa fa-delicious bigger-120"></i>
										</a>
										<?$query23="select count(id) as count from new_managers where parent_id=$id";
											$result23 = $coms_conect->query($query23);
											$RS23 = $result23->fetch_assoc();
											if(($RS23["count"]==0&&$del_viwe!=0&&$_SESSION["can_delete"]==1&&$user_name!='comsroot'&&$user_name!=$_SESSION['manager_user_name'])){?>	
											<a id="<?=$id?>" class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;"><i title="حذف" class="ace-icon fa fa-trash-o bigger-120"></i></a>
										<?}?>
										<a   value="<?=$RS1['user_name']?>" class="login_user_manager"    title="ورود با نام کاربری" href="#">
											<i class="ace-icon fa fa-user bigger-120"></i>
										</a>
										<?if($_SESSION["can_edit"]==1&&$user_name!='comsroot'){?> 
										<label>
										<input <?=$str?> <?if($RS1["status"]==1) echo 'checked'?> id="<?=$RS1['id']?>"  name="switch-field-1" class="ace ace-switch ace-switch-6 conchkNumber_4" type="checkbox" />
										<span class="lbl" title="فعال سازی"></span></label>
										<?$i++;}?>
										</td>
									</tr>
									<? 
									}
								
						//?>	
						</tbody>
					</table>
		
				</div>
				<!-- /section:subsite/manager.table -->
				<?=$pgsel?>
<div class="col-sm-12" id="show_msg_manager"   ></div>				
			</div>
			<?if($_SESSION["can_add"]==1){?>	
			<div class="tab-pane" id="add_templates">
			
				<form class="form-horizontal" id="manage_blok" name="manage_blok" action="" role="form" method="post" enctype="multipart/form-data"
				data-fv-framework="bootstrap"
				data-fv-message="This value is not valid"
				data-fv-icon-validating="glyphicon glyphicon-refresh">
					<input type="hidden" id="edit_mode" name="edit_mode" value="0">
					<input type="hidden" id="ajax_name" name="ajax_name" value="0">	
					<input type="hidden" id="ajax_email" name="ajax_email" value="0">	
					<input type="hidden" id="ajax_mobile" name="ajax_mobile" value="0">	
					<input type="hidden" id="edit_parent_id" name="edit_parent_id" value="<?=$manager_id?>">	
					<input type="hidden" id="edit_manager_id" name="edit_manager_id" value="">	
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						<!--div>
						<div class="message-bar">
							<h2 style="color: #2a8bcb;">افزودن مدیر / ویرایش</h2>
						</div>

						
							<div class="messagebar-item-left">
								<a href="#tab1" data-toggle="tab" class="active">
									<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
									<b class="middle bigger-110">برگشت</b>
								</a>
							</div>

							<div class="messagebar-item-right">
								<span class="inline btn-send-message">
									<button type="submit" id="up_submit" class="btn btn-sm btn-primary no-border btn-white btn-round">
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
						<a href="newcoms.php?yep=new_manager" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
						</a>
						</div>
					</br>
				
					<div class="panel-body">
						<div class="row-fluid"> 
						<!-- #section:subsite/manager.list -->
							<div class="col-md-12">
									
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">آواتار</label> 
									<div class="form-group col-md-6">
										<img data-src="holder.js/100%x100%" id="aks_thumb" width="190px;" class="img-thumbnail" alt="100%x100%" src="" >
										<br><br>
										<div class="input-group col-md-12">
											<input type="text" class="form-control" name="avatar" value="<?=$avatar?>" id="avatar">
											<span class="input-group-btn">
												<a href="/filemanager/dialog.php?type=1&amp;field_id=avatar" class="btn btn-sm btn-default iframe-btn"  type="button">
													<i class="ace-icon fa fa-upload bigger-110"></i>
													انتخاب
												</a>
											</span>
										</div>
										<script>
										setInterval(check_address,2000)													
										function check_address() {
											var aks_news = $('#avatar').val(); 
											if(aks_news!=""){				
												$('#aks_thumb').attr("src",aks_news);						
											}
										}
										</script>
									</div>
								</div>
											
								<div class="form-group row">
									<label class="col-md-2 control-label" for="group_name">نام مدیر*</label> 
									<div class="form-group col-md-6">
										<input type="text" name="name" id="name" class="form-control" >									
									</div>
								</div> 
										 
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">نام کاربری*</label> 
									<div class="form-group col-md-6">
										<input type="text" name="user_name" id="user_name" class="form-control" />
									</div><div id="check_username" class="control-label col-md-2"></div>
								</div>	
											
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">کلمه عبور*</label> 
									<div class="form-group col-md-6">
										<input type="password" name="password" id="password" class="form-control"
											data-fv-stringlength="true"
											data-fv-stringlength-min="6"
											data-fv-stringlength-max="30"
											data-fv-stringlength-message="کلمه عبور بايد بين 6 تا 30 کاراکتر باشد">

									</div>
								</div>
								
								<div class="row form-group">
									<label class="col-sm-2 control-label">تاریخ اعتبار کلمه عبور</label>
									<div class="form-group col-sm-6">
										<div class="form-group col-xs-4" id='datetimepicker1'>
											<input id="expire_date" name="expire_date" type="text" style="width: 105px" class="form-control"/>
										</div>
									</div>
								</div>	
											
								<div class="form-group row">
									<label class="col-md-2 control-label" for="group_name">ایمیل*</label> 
									<div class="form-group col-md-6">
										<input type="text" name="email" id="email" class="form-control" >									
									</div><div id="check_email" class="control-label col-md-2"></div>
								</div>
											
								<div class="form-group row">
									<label class="col-md-2 control-label" for="group_name">گروه کاربری*</label> 
									<div class="form-group col-md-6">
										<select type="text" name="group_id" id="group_id" class="form-control" >
										<?$sql = "SELECT name,id FROM new_groups where id=$manager_group";
										 
											$result = $coms_conect->query($sql);
											$row = $result->fetch_assoc();
											
											$name=$row['name'];
											$man_id=$row['id'];
										?>
											<option value="<?=$man_id?>"><?=$name?></option>
											<?create_manager_groups($man_id,$coms_conect);?>
										</select>
										
									</div>
								</div>
								
								<div class="form-group row" id="show_sites" <?if($_SESSION['manager_user_name']=='comsroot'){ ?>style="display:none"<?}?>>
									<label class="col-md-2 control-label" for="group_name">سایت</label> 
									<div class="form-group col-md-6">
									<?create_sub_site($site_id,$coms_conect,$manager_site);?>
									</div>
								</div>
								<?//print_r($manager_site)?>
									
								<div class="form-group row" id="show_lang" <?if($_SESSION['manager_user_name']=='comsroot'){ ?>style="display:none"<?}?>>
										<label class="col-md-2 control-label">انتخاب زبانها</label> 
										<div class="form-group col-md-6">
											<input  type="text" id="manage_lang" name="manage_lang" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">									
										</div>
								</div>
									 <!-- new item basic version -->
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">سمت</label> 
									<div class="form-group col-md-6">
										<input type="text" name="semat" id="semat" class="form-control" >
									</div>
								</div>
											
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">موبایل*</label> 
									<div class="form-group col-md-6">
										<input type="text" name="mobile" id="mobile" class="form-control input-mask-mobile" >
									</div><div class="control-label col-md-2" id="check_mobile"></div>
								</div>
								
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">تلفن</label> 
									<div class="form-group col-md-6">
										<input type="text" name="phone" id="phone" class="form-control input-mask-phone" >
									</div>
								</div>
											
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">داخلی</label> 
									<div class="form-group col-md-6">
										<input type="text" name="phone_code" id="phone_code" class="form-control" >
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-md-2 control-label" for="family">آدرس</label> 
									<div class="form-group col-md-6">
										<input type="text"  name="address" id="address" class="form-control" >
									</div>
								</div>
								 <!--div class="form-group row">
									<label class="col-md-2 control-label" for="family">سمت</label> 
									<div class="form-group col-md-6">
										<input type="text" name="semat" id="semat" class="form-control" >
									</div>
								</div-->
								 <div class="form-group row">
									<label class="col-md-2 control-label" for="status">وضعیت</label> 
									<div class="form-group col-md-6">
										<select name='status' id="status" class="form-control">
											<option value='1'>فعال</option>
											<option value='0'>غیر فعال</option>
										</select>
									</div>
								</div>
								
								<div class="form-group row"><div class="col-md-2"></div>
								<?if($_SESSION["can_add"]==1){?>
									<div class="col-md-2 row">
									    <input id="can_add" name="can_add" value="1" type="checkbox" class="form-group col-md-4"/>
										<label class="col-sm-8">درج کردن</label>
									</div>
								<?}?>		
								<?if($_SESSION["can_draft"]==1){?>
									<div class="col-md-2 row">
									    <input id="can_draft" name="can_draft" value="1" type="checkbox" class="form-group col-md-4"/>
										<label class="col-sm-8">پیش نویس</label>
									</div>
								<?}?>

								
								<?if($_SESSION["can_edit"]==1){?>
									<div class="col-md-2 row">
									    <input id="can_edit" name="can_edit" value="1" type="checkbox" class="form-group col-md-4"/>
										<label class="col-sm-8">ویرایش</label>
									</div>
								<?}?>
								<?if($_SESSION["can_delete"]==1){?>	
									<div class="col-md-2 row">
									    <input id="can_delete" name="can_delete" value="1" type="checkbox" class="form-group col-md-4"/>
										<label class="col-sm-8">حذف</label>
									</div>
								<?}?>	
								</div>
								
						</div> 
						<!-- /section:subsite/manager.list -->
						</div>
					</div>
					<div class="panel-footer bttools">
						<button type="submit" id="submit_page" class="btn btn-success" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
					</div>
				</form>
				
			</div>
			<?}?>
		</div>			
	</div>
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
<script>
	 $(".submit2").click(function(){
		 $("#manage_blok").submit();
	 });				 
</script>	

	
<?$_SESSION["del_item"]='del_manager';
$_SESSION["edit_item"]='edit_manager';
?>
<script>
$(document).ready(function() {
    $('#manage_blok').formValidation();
});
</script>	
<script src="ajax_js/managers.js"></script>	
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">

<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$('.input-mask-mobile').mask('99999999999');
		$('.input-mask-phone').mask('99999999');
		
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
	
</script>    

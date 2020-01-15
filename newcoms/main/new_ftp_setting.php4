<script type="text/javascript" src="/new_template/Erika/<?=$dir?>/js/jquery.min.js"></script>
<script type="text/javascript" src="/new_template/Erika/<?=$dir?>/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/new_template/Erika/<?=$dir?>/css/bootstrap-iconpicker.min.css"/>

<link href="/new_template/Erika/<?=$dir?>/css/font-awesome.min.css" rel="stylesheet">
<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">

<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>

<script src="/yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<?
$tab=1;
if(isset($_GET['tab']))
$tab=injection_replace($_GET['tab']);
if(isset($_POST['tab']))
$tab=injection_replace($_POST['tab']);
if($_GET['lang_filter']>"")
$la=injection_replace($_GET["lang_filter"]);
else
$la=injection_replace($_POST["manage_lang_filter"]);
if($la=='')
$la=$default_lang;

if($_GET['site_filter']>"")
$site=injection_replace($_GET["site_filter"]);
else
$site=injection_replace($_POST["manage_site_filter"]);
if($site=='')
$site=$default_site;
 
if($_POST['send_flag']==1){ 
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	
	$gallery_up_in_ftp=injection_replace_pic($_POST["gallery_up_in_ftp"]);
	if($gallery_up_in_ftp!=1) $gallery_up_in_ftp=0;
	insert_ads_templdate($site,$la,$gallery_up_in_ftp,'gallery_up_in_ftp',$coms_conect);
	####ftp
	$ftp_ip=injection_replace($_POST["ftp_ip"]);
	$ftp_adress=injection_replace($_POST["ftp_adress"]);
	$ftp_username=injection_replace($_POST["ftp_username"]);
	$ftp_password=injection_replace($_POST["ftp_password"]);
	$daily_pic_text=injection_replace($_POST["daily_pic_text"]);
	insert_templdate('main','','fa',$ftp_ip,$ftp_username,$ftp_password,$ftp_adress,"ftp_setting",'defualt',$coms_conect);	
	
 
}


 

$key="yamahdiyaaliyahosionyepp";
//$key="123456789098776545433322";
$server_name=(injection_replace($_POST["server_name"]));
$host_size=(injection_replace($_POST["host_size"]));
$datacenter=(injection_replace($_POST["datacenter"]));
$location=(injection_replace($_POST["location"]));
$ip=injection_replace($_POST["ip"]);
$ftp_host=injection_replace($_POST["ftp_host"]);
 
$ftp_servers=injection_replace($_GET["ftp_servers"]);
$ftp_server_username=encript_data(injection_replace($_POST["ftp_server_username"]),$key);
if($_POST['ftp_server_password']!='**********')
	$ftp_server_password=encript_data(injection_replace($_POST["ftp_server_password"]),$key);
else 
	$ftp_server_password=get_result("select ftp_server_password from new_servers where id='$ftp_servers'",$coms_conect);
$ftp_base_url=(injection_replace($_POST["ftp_base_url"]));
$ftp_port=(injection_replace($_POST["ftp_port"]));
$ftp_thumb=(injection_replace($_POST["ftp_thumb"]));
if($_POST["server_name"]>""&&$ftp_servers==0){
	$arr=array("server_name"=>$server_name,"host_size"=>$host_size,"datacenter"=>$datacenter,"location"=>$location,"ip"=>$ip,"ftp_host"=>$ftp_host, "ftp_server_username"=>$ftp_server_username,"ftp_server_password"=>$ftp_server_password,"ftp_base_url"=>$ftp_base_url,"ftp_port"=>$ftp_port,"ftp_thumb"=>$ftp_thumb,"status"=>0,"date"=>time(),"user_id"=>$_SESSION['manager_id'],"user_ip"=>$custom_ip);
	$id=insert_to_data_base($arr,'new_servers',$coms_conect);
	show_msg('اطلاعات با موفقیت اضافه گردید');
	 
 
}else if($_POST["server_name"]>""&&$ftp_servers>0){
	$condition="id='$ftp_servers'";
    $arr_slide=array("server_name"=>$server_name,"host_size"=>$host_size,"datacenter"=>$datacenter,"location"=>$location,"ip"=>$ip,"ftp_host"=>$ftp_host, "ftp_server_username"=>$ftp_server_username,"ftp_server_password"=>$ftp_server_password,"ftp_base_url"=>$ftp_base_url,"ftp_port"=>$ftp_port,"ftp_thumb"=>$ftp_thumb,"status"=>0,"edit_date"=>time(),"edit_user_id"=>$_SESSION['manager_id'],"user_ip"=>$custom_ip);
	 update_data_base($arr_slide,'new_servers',$condition,$coms_conect);
}else if(isset($_POST["server_name"])&&$_POST["server_name"]==""&&$ftp_servers>0){
	$query1="delete from new_servers where id='$ftp_servers'"; 
    $coms_conect->query($query1);
}		


 create_session_token(); 
?>
 

<div class="tabbable">
	<ul class="nav nav-tabs" style="margin-top:2px;border-bottom: 0;  display: none;">
		<li class="active"><a href="#tab2" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
		تنظیمات FTP </a></li>
	</ul>
	<br>
	 
<div class="msheet tab-content">

<div class="secfhead">

	<!-- #section:gallery/gallery_setting.head -->
	<div class="sectitle">
		<div class="icon"><span class="flaticon-file23" style=""></span></div>
		<div class="title"><p class="titr">تنظيمات FTP</p><p class="lead">توضيحات اين بخش</p></div>
	</div>
	<!-- /section:gallery/gallery_setting.head -->

	<div class="toolmenu">
		<ul>
			<li class="helpicon">
				<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما">
				<span class="flaticon-help31"></span>
				</a>
			</li>
		</ul>
	</div>

</div>
<div class="tab active" id="tab2">	
	<div class="page-body">
	<form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form" enctype="multipart/form-data" data-fv-framework="bootstrap">
		<input type="hidden" name="send_flag" value="1">
		<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
  <!-- vertical tab bootsnipp -->
    <div class="">
		<input type='hidden' name='tab' id='tab_id' value="<?=$tab?>">
		<div class="collapse in" id="" style="padding: 10px;">
			<div> 
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" style="margin:0;">
					<li role="presentation" class="<?if($tab==1)echo 'active';?>"><a class="menu_tab" id="1" href="#up_set" aria-controls="up_set" role="tab" data-toggle="tab">تنظیمات Uploader</a></li>
					<li role="presentation" class="<?if($tab==2)echo 'active';?>"><a  class="menu_tab" id="2" href="#sr_FTP_setting" aria-controls="sr_FTP_setting" role="tab" data-toggle="tab">تنظیمات Filemanager</a></li>
				</ul>
				<div class="tab-content" style="padding: 20px 30px;"> 
					<div role="tabpanel" class="tab-pane <?if($tab==1)echo 'active';?>" id="up_set">
					
						<div class="form-group col-md-12">
							<div class="col-md-6">
							<div class="form-group">
									<label class="col-md-4 control-label" for="family">آپلود در ftp</label> 
								<div class="form-group col-md-8">
									<div class="col-md-12 input-group">	
										<?$gallery_up_in_ftp=get_modual_setting_result($site,$la,'gallery_up_in_ftp',$coms_conect);?>
										<input type="checkbox" value="1" <?if($gallery_up_in_ftp==1) echo 'checked';?>   class="form-control" name="gallery_up_in_ftp" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">
									</div>					
								</div>
							</div>
							<?$ftp_setting= get_tem_result($site,$la,"ftp_setting",'defualt',$coms_conect);?>	
							<label class="col-md-4 control-label" for="family">Ip سرور</label>
							<div class="form-group col-md-8">
								<div class="col-md-12 input-group">
								<input type="text" style="direction: ltr;" class="col-md-6 form-control"    value="<?=$ftp_setting['text']?>"  id="ftp_ip" name="ftp_ip"
								data-fv-notempty="true"
								data-fv-notempty-message="پر کردن اين فيلد الزامي است">
								</div>
							</div>
							<label class="col-md-4 control-label" for="family">آدرس ftp</label>
							<div class="form-group col-md-8">
								<div class="col-md-12 input-group">
								<input type="text" style="direction: ltr;" class="col-md-6 form-control"    value="<?=$ftp_setting['pic']?>"  id="ftp_adress" name="ftp_adress"
								data-fv-notempty="true"
								data-fv-notempty-message="پر کردن اين فيلد الزامي است">
								</div>
							</div>
							 <label class="col-md-4 control-label" for="family">نام کاربری</label>
							<div class="form-group col-md-8">
								<div class="col-md-12 input-group">
								<input type="text" style="direction: ltr;" class="col-md-6 form-control"    value="<?=$ftp_setting['title']?>"  id="ftp_username" name="ftp_username"
								data-fv-notempty="true"
								data-fv-notempty-message="پر کردن اين فيلد الزامي است">
								</div>
							</div>
							<label class="col-md-4 control-label" for="family">کلمه عبور</label>
							<div class="form-group col-md-8">
								<div class="col-md-12 input-group">
								<input type="password" style="direction: ltr;" class="col-md-6 form-control"    value="<?=$ftp_setting['link']?>"  id="ftp_password" name="ftp_password"
								data-fv-notempty="true"
								data-fv-notempty-message="پر کردن اين فيلد الزامي است">
								</div>
							</div>
							<label class="col-md-4 control-label" for="family"> </label>
							<div class="form-group col-md-8">
								<button type="submit" class="btn btn-success"><span class="flaticon-verified9"></span><span> ذخيره </span></button>
							<!-- /section:gallery/gallery_setting.default -->
							</div>
							</div>
							
							
							<br>
							<div class="col-md-6">
							 
									<div class="alert alert-info">
										<b>به نکات زیر توجه کنید : </b><br>
											1- این گزینه برای آپلود Ajax سیستم می باشد.<br>
											2- با فعال سازی و پر کردن اطلاعات از این پس تصاویر در این سرور آپلود میشوند.<br>
											3- در صورت غیر فعال بودن تصاویر در سرور Loacl  آپلود میشوند.<br>
							 
									</div>
									 
							</div>
							
						 </div>
		
					
					</div>
					
					<div role="tabpanel" class="tab-pane <?if($tab==2)echo 'active';?>" id="sr_FTP_setting">
					
						
						<form class="form-horizontal" action="" method="post" id="servers_from"  >
		
							<div class="sr-sms-account">
								<h3 class="sr-yellow">
									تنظیمات FTP 
								</h3>
								<hr>
								 
								<div class="sr-sms-settings-text">
							
								<div id="active-FTP-box"   >

								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										انتخاب سرور

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<select name="ftp_servers" id="ftp_servers" class="from-input col-md-4"  >
											<option value='0'>انتخاب کنید</option>
												<?
												$query="SELECT * from new_servers";
												$result = $coms_conect->query($query);
												while($row = $result->fetch_assoc()) {
												
													$str='';
													 if($row['id']==$ftp_servers)
														$str='selected';
													echo "<option $str value='{$row['id']}'>{$row['server_name']}</option>";
											}?>
										</select>
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										  ftp host  
									</p>
								</div>									
								
											<?$query="SELECT * from new_servers where id='$ftp_servers'";
											 
												$result = $coms_conect->query($query);
												$RS2 = $result->fetch_assoc(); 
												if($RS2['ftp_server_username']>"") {
													$RS2['ftp_server_username']=decrypt_data($RS2['ftp_server_username'],$key);
													$RS2['ftp_server_username']= rtrim($RS2['ftp_server_username'], "\0")	;;
												}
												if($RS2['ftp_server_password']>"") {
													$RS2['ftp_server_password']='**********';
												}

												 
											?>							
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										نام سرور

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['server_name']?>" name="server_name">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										  ftp host  
									</p>
								</div>								
								
								
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										host_size

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['host_size']?>" name="host_size">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										 host_size
									</p>
								</div>	


								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										datacenter

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['datacenter']?>" name="datacenter">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										 datacenter
									</p>
								</div>									
								
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										موقعیت

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['location']?>" name="location">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										موقعیت
									</p>
								</div>	
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										IP

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['ip']?>" name="ip">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										 IP
									</p>
								</div>	
								
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										FTP host

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['ftp_host']?>" name="ftp_host">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										  ftp host  
									</p>
								</div>
								
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										FTP username

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['ftp_server_username']?>" name="ftp_server_username">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در این قسمت شما باید نام کاربری اکانت FTP خود را وارد کنید .
										</p>
								</div>
								
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										FTP password

									</h4> 
									<label class="sr-input col-md-6 col-xs-12">
										<input  type="password"  value="<?=$RS2['ftp_server_password']?>" name="ftp_server_password">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در این قسمت شما باید پسورد متصل به نام کاربری اکانت FTP خود را وارد کنید .
										</p>
								</div>
						 
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										FTP base_url

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['ftp_base_url']?>" name="ftp_base_url">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
									در این قسمت باید آدرس FTP سایت را با HTTP باید وارد کنید
										</p>
								</div>	


								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										FTP port

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['ftp_port']?>" name="ftp_port">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در این قسمت شما می توانید پورت پیش فرض FTP خود را وارد کنید در حالت پیش فرض 21 پورت اف تی پی  می باشد .
										</p>
								</div>
	  
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
									آدرس Thumb

									</h4>
									<label class="sr-input col-md-6 col-xs-12">
										<input class="input-sm " type="text"  value="<?=$RS2['ftp_thumb']?>" name="ftp_thumb">
									</label>
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i>
										در این قسمت شما ادرس ساخت تصاویر بند انگشتی ساخته بشده به صورت اتوماتیک از تصاویر آپلود شده را می توانید تعیین کنید .
										</p>
								</div>								


								</div>
									<button  class="btn btn-success btn-next" type="submit" id="next_btn"  style="margin-top:5px;">ذخیره </button>
								</div>

							</div>
						</form>	
						
<script>		 
$('#ftp_servers').change( function() {
	var a ='<?=$url?>';
		if (a.indexOf("&ftp_servers=") >= 0){
			var b=a.split('&ftp_servers=');
			var c=b[1].split('&');
			var e="";
			if(c[1]>"")
			e="&"+c[1];
			a=b[0]+"&ftp_servers="+$(this).val()+e+"&tab=2";
		}
		else
		a +='&ftp_servers='+$(this).val()+"&tab=2";
		window.location.href = a;
	});
</script>		 
	 

					</div>
				</div>
			</div>
		</div>
		
		 
		 
    </div>
  </div>
 
</div> 
</div> 

<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">


<script>
$(".menu_tab").click(function(){
    $("#tab_id").val($(this).attr('id'))
})

$(document).ready(function() {
		$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});


    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
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
	
});
$('.ads_new_name').click( function() {
$("#ads_name").val($(this).attr('id'));
});

/*
 * show popover image ajax
 */
var popOverSettings = {
    placement : 'top',
    html:true,
    selector: '[data-toggle="popover"]',
    title:'<i class="fa fa-image"></i>',
    trigger:'hover',
    content:function () {
    	if($(this).val()){
    		return '<img src='+$(this).val()+' width="200"/>';
    	}
    	return false;
    }
}
$('body').popover(popOverSettings);

///////////// form validation
$(document).ready(function() {
    $('#reg_presonal').formValidation();
});

</script>
  
</div>
<!-- Bootstrap-Iconpicker Iconset for Font Awesome -->
<script type="text/javascript" src="/new_template/Erika/<?=$dir?>/js/iconset-fontawesome-4.1.0.min.js"></script>
<!-- Bootstrap-Iconpicker -->
<script type="text/javascript" src="/new_template/Erika/<?=$dir?>/js/bootstrap-iconpicker.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
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

<script>
$(document).ready(function(){
$("#drop1").hide();
$(".conchkNumber").click(function() {
    if($(this).is(":checked")) {
        $("#drop1").show();
    } else {
        $("#drop1").hide();
    }
});
$("#drop1").hide();
$(".conchkSelectAll").click(function() {
    if($(this).is(":checked")) {
        $("#drop1").show();
    } else {
        $("#drop1").hide();
    }
});
});
</script>
 
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
	echo "insert into new_user_setting(name,value,la,site)values('active_user_email','$active_user_email','$manage_lang_filter','$manage_site_filter')";
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
<div class="col-sm-12" id="show_msg" style="display:none" >
    <div class="alerts alert-success  fade">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>کلمه عبور با موفقیت تغییر یافت</strong> 
    </div>
  </div>
  <script>
   $(".alerts").delay(6000).addClass("in").fadeOut(6000);
</script>
<div class="tabbable">
	<form action="" method="post">
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
	</form>
</div>			
 	
 
<script type="text/javascript">
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

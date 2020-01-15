<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>	
<script>
$(document).ready(function(){
 hideAllDivs = function () {
    $("#indexmanager").hide();
    $("#indexmanager2").hide();
    $("#indexmanager3").hide();
    $("#indexmanager4").hide();
    $("#indexmanager5").hide();
    $("#indexmanager6").hide();
};

handleNewSelection = function () {

	
	hideAllDivs();
		
    
    switch ($(this).val()) {
        case '1':
            $("#indexmanager").show();
		   $("#indexmanager2").show();
			$("#indexmanager").show();
        break;
          case '3':
            $("#indexmanager3").show();
			$("#link").val('');
			$("#text").val('');
			 
        break;
        case '4':
	 
		$("#text").val('');
		$("#pages").val('');
            $("#indexmanager4").show(); 
        break;
        case '5':
		$("#link").val('');
 
		$("#pages").val('');
			 $("#indexmanager").show();
            $("#indexmanager5").show();
        break;
        case '6':
            $("#indexmanager6").show();
			 $("#indexmanager").show();
        break;
    }
};

$(document).ready(function() {
    $("#project_billing_code_id").change(handleNewSelection);
	handleNewSelection.apply($("#project_billing_code_id"));

});
});
</script>
<script type="text/javascript">
$(document).ready(function() {
	  $('#pages').select2({
        data: [
				<?$query1="select id,title,name from new_static_page where status=1 ";
				$result = $coms_conect->query($query1);
				$i=0;
				while($RS1 = $result->fetch_assoc()) {
					$id=$RS1["id"];
					$name=$RS1["title"];
						if($i==0)
						echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name." ({$RS1["name"]})'"."}";
						else
						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name." ({$RS1["name"]})'"."}";
						$i++;
				}
		?>
        ],
        allowClear: true,
        multiple: false,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
});
</script>	
<?$manage_lang='fa';
$onvan=injection_replace($_POST['onvan']);
$type=injection_replace($_POST['project_billing_code_id']);
$contraction=injection_replace($_POST['contraction']);
$first_site=injection_replace($_POST['first_site']);

if($contraction=='')$contraction=0;
if($first_site=='')$first_site=0;
if(isset($_POST['manage_lang']))
$manage_lang=injection_replace($_POST['manage_lang']);
$manage_site=injection_replace($_GET['site']);
if(isset($_POST['manage_site']))
$manage_site=injection_replace($_POST['manage_site']);
 if($manage_site==''&&$site=='')
$manage_site='main';	 
	 
	 
	$query="select type  from new_first_page_setting where site='$manage_site'";
	$result = $coms_conect->query($query);
	$RS1 = $result->fetch_assoc();
	
	
	$query22="select type  from new_first_page_setting where site='$manage_site'";
	$result22 = $coms_conect->query($query22);
	$RS122 = $result22->fetch_assoc();
###صفحه اصلی	

if($type==1){
	if($RS122['type']>""){
		$query1="update new_first_page_setting set first_site='$first_site',contraction='$contraction',la='$manage_lang',edit_user_id='$manager_id',edit_date=now(),ip='$custom_ip',type=$type,value='$onvan',site='$manage_site' where site='$manage_site'"; 
		$coms_conect->query($query1);
		
	}else{
		$query1="insert into new_first_page_setting(first_site,contraction,la,type,site,value,date,user_id,ip) 
		values ('$first_site','$contraction','$manage_lang','$type','$manage_site','$onvan',NOW(),$manager_id,'$custom_ip')";
		$coms_conect->query($query1);
	}
}
###در دست ساخت
/*
if($type==2){

	if($RS122['type']>""){
		$query1="update new_first_page_setting set contraction='$contraction',la='$manage_lang', edit_user_id='$manager_id',edit_date=now(),ip='$custom_ip',type=$type,value='$onvan',site='$manage_site' where site='$manage_site' and la='$manage_lang'"; 
		$coms_conect->query($query1);
		
	}else{
		$query1="insert into new_first_page_setting(contraction,la,type,site,value,date,user_id,ip) 
		values ('$contraction','$manage_lang','$type','$manage_site','$onvan',NOW(),$manager_id,'$custom_ip')";
		$coms_conect->query($query1);
	}
}*/
###صفحه
if($type==3){
	$pages=injection_replace($_POST['pages']);
	if($RS1['type']>""){
		$query1="update new_first_page_setting set edit_user_id='$manager_id',edit_date=now(),ip='$custom_ip',type=$type,value='$pages',site='$manage_site' where site='$manage_site'"; 
		$coms_conect->query($query1);
		
	}else{
		$query1="insert into new_first_page_setting(type,site,value,date,user_id,ip) 
		values ('$type','$manage_site','$pages',NOW(),$manager_id,'$custom_ip')";
		$coms_conect->query($query1);
	}
}
###لینک خارجی
if($type==4){
	$link=injection_replace($_POST['link']);
	if($RS1['type']>""){
		$query1="update new_first_page_setting set edit_user_id='$manager_id',edit_date=now(),ip='$custom_ip',type=$type,value='$link',site='$manage_site' where site='$manage_site'"; 
		$coms_conect->query($query1);
		
	}else{
		$query1="insert into new_first_page_setting(type,site,value,date,user_id,ip) 
		values ('$type','$manage_site','$link',NOW(),$manager_id,'$custom_ip')";
		$coms_conect->query($query1);
	}
}
###html
if($type==5){
	$text=($_POST['text']);
	if($RS1['type']>""){
		$query1="update new_first_page_setting set la='$manage_lang',edit_user_id='$manager_id',edit_date=now(),ip='$custom_ip',type=$type,value='$text',site='$manage_site' where site='$manage_site'"; 
		$coms_conect->query($query1);
		
	}else{
		$query1="insert into new_first_page_setting(la,type,site,value,date,user_id,ip) 
		values ('$manage_lang','$type','$manage_site','$text',NOW(),$manager_id,'$custom_ip')";
		$coms_conect->query($query1);
	}
}
###ماژول
if($type==6){
	$modual_name=injection_replace($_POST['modual_name']);
	if($RS1['type']>""){
		$query1="update new_first_page_setting set la='$manage_lang',edit_user_id='$manager_id',edit_date=now(),ip='$custom_ip',type=$type,value='$modual_name',site='$manage_site' where site='$manage_site'"; 
		$coms_conect->query($query1);
		//echo $query1;
	}else{
		$query1="insert into new_first_page_setting(la,type,site,value,date,user_id,ip) 
		values ('$manage_lang','$type','$manage_site','$modual_name',NOW(),$manager_id,'$custom_ip')";
		$coms_conect->query($query1);
	}
}

	$query="select type,value,site  from new_first_page_setting where site='$manage_site'";
	
	$result = $coms_conect->query($query);
	$RS1 = $result->fetch_assoc();
	$type=$RS1['type'];
	$val=$RS1['value'];
	$manage_site=$RS1['site'];
 
	
	$query23="select la,contraction,type,value,site,first_site  from new_first_page_setting where site='$manage_site'"; 
	$result23 = $coms_conect->query($query23);
	$RS123 = $result23->fetch_assoc();
	if($type==1)
	$onvan=$RS123['value']; 	 
	$manage_lang=$RS123['la']; 	 
	$contraction=$RS123['contraction']; 
	$first_site=$RS123['first_site']; 
	
?>	

	<div class="tabbable">
		<!--ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?=$new_sysmenu[7]?> </a></li>
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/indexmanager.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">تنظیمات صفحه اصلی</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/indexmanager.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			<div class="tab-pane active" id="tab1">
			
				<form class="form-horizontal" action="" method="post" name="pasafhe" id="pasafhe" role="form" enctype="multipart/form-data">	
					<div id="id-message-new-navbar" class="message-navbar clearfix">
						<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
							<span class="flaticon-verified9">
							</span>
						</a>
						<a href="newcoms.php?yep=new_Slideshow" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
						</a>
					</div>
					</br>
					<!-- #section:main/indexmanager.form -->
					<div class="panel-body">
						
						<div class="form-group">
								<label class="col-sm-2 control-label" style="text-align: center;"><?=$dl_site?></label>
								
									 <select id="manage_site" name="manage_site" class="form-group col-md-3">
										<?$query="select title,name from new_subsite where status=1";
											$result = $coms_conect->query($query);
												while($RS1 = $result->fetch_assoc()) {
													$name=$RS1['name'];
													$temp="";
													if($manage_site==$name)
													$temp="selected";
													if(in_array($name,$_SESSION['manager_title_site']))
													echo "<option value='$name' $temp>$name</option>";
											}
										?>
									</select>
						</div>
						
						<div class="form-group" id=""><!-- id="indexmanager" -->
								<label class="col-sm-2 control-label" style="text-align: center;"><?=$s_home_language?></label>
									<select id="manage_lang" name="manage_lang" class="form-group col-md-3">
										<?$query="select title,name from new_language where status=1";
											$result = $coms_conect->query($query);
												while($RS1 = $result->fetch_assoc()) {
												$title=$RS1['title'];
													$name=$RS1['name'];
													$temp="";
													if($manage_lang==$title)
													$temp="selected";
													if(in_array($title,$_SESSION['manager_title_lang']))
													echo "<option value='$title' $temp>$name</option>";
											}
										?>
									</select>
						</div>	
						
						<div class="form-group">					
								<label class="col-sm-2 control-label" style="text-align: center;"><?=$s_Menubar_type?></label>
								
										<select name="project_billing_code_id" id="project_billing_code_id" class="form-group  col-md-3" rows="3">
											<option value=""><?=$pro_select_tem?></option>
											<option <?if($type==1) echo 'selected';?> value="1"> <?=$new_page_main?> </option> 
										 
											<option <?if($type==3) echo 'selected';?> value="3"> <?=$new_page_in?></option> 
											<option <?if($type==4) echo 'selected';?> value="4"> <?=$new_link_out?></option> 
											<option <?if($type==5) echo 'selected';?> value="5"> <?=$s_Menubar_code?>html</option>
											<option <?if($type==6) echo 'selected';?> value="6"> <?=$new_mazhol?></option>
										</select>
						</div>
					
						
						
						<div class="form-group" id="indexmanager2">
							
							<label class="col-sm-2 control-label" style="text-align: center;">سایت اصلی</label>
								<div class="form-group">
									<input type="checkbox" value="1" <?if($first_site==1) echo 'checked';?> value='<?=$first_site?>' name="first_site" id="first_site" class="" >					
								</div>
								<label class="col-sm-2 control-label" style="text-align: center;">در دست ساخت</label>
								<div class="form-group">
									<input type="checkbox" value="1" <?if($contraction==1) echo 'checked';?> value='<?=$contraction?>' name="contraction" id="contraction" class="" >					
								</div>
								<div id='constrac' <?if($contraction!=1) {?>style="display:none"<?}?> >
								<label class="col-sm-2 control-label" style="text-align: center;"><?=$new_text_custom?></label>
								<div class="form-group">
										<input type="text" value='<?=$onvan?>' name="onvan" id="onvan" class="form-group col-md-3" >					
									
								</div>
								</div>
							
						</div>
					
						<div class="form-group" id="indexmanager3">
								<label class="col-sm-2 control-label" style="text-align: center;"><?=$sc_Search_pages?></label>
								<input value="<?=$RS123['value']?>" placeholder="" type="text" id="pages" name="pages" style=" padding-left: 0px; padding-right: 0px; " autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-container form-group col-md-3"  >									
							
						</div>
					
						<div class="form-group" id="indexmanager4">
							<label class="col-md-2 control-label" style="text-align: center;"><?=$Shop_Information_address?></label>
							<input type="text" name="link" value="<?=$val?>" id="link" class="form-group col-md-3" placeholder="https://sample.com/" style="direction: ltr;">
						</div>
						
						<div class="form-group" id="indexmanager5">
						<label for="inputEmail3" class="col-sm-2 control-label" style="text-align: center;"><?=$s_Menubar_code?>html</label>
							<div class="form-group">
							
								<textarea id="text" name="text"   class="form-group col-md-10" rows="3"><?=$val?></textarea>
									 <script>
										tinymce.init({
										selector: "#text",
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
						
						<div class="form-group" id="indexmanager6">
								<label class="col-md-2 control-label" style="text-align: center;"><?=$Shop_Information_address?></label>
									 <select name="modual_name" id="modual_name" class="form-group col-md-3" rows="3">
										<?$query="SELECT id,name FROM new_modules where status=0";
											$result = $coms_conect->query($query);
												while($row = $result->fetch_assoc()) {
												$str='';if($row['id']==$RS1['value'])$str='selected';
												echo "<option value='{$row['id']}' $str>{$row['name']}</option>";
											}?>
									</select>	
						</div>
						
					</div><!-- /section:main/indexmanager.form -->
					<div class="panel-footer bttools">
						<button type="submit" id="submit_page" class="btn btn-success" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
					</div>
				</form>
			</div>
<script>
$(".submit2").click(function (){
	$("#pasafhe").submit();	
})
</script>			
		</div>
	</div>
<style>
@media (min-width: 767px){
.panel-body{
  padding-left: 100px;
  padding-right: 125px;
  padding-top: 65px;
}
}
@media (max-width: 768px){
.panel-body{
padding-top: 70px;
}}
</style>	
	<script src="ajax_js/IndexManager.js"></script>	
<script>	
$("#manage_site").change(function () {
	window.location='newcoms.php?yep=new_IndexManager&site='+$(this).val();
});
</script>	
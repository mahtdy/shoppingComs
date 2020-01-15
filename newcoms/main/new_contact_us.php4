<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/js-validate/jquery.validate.js"></script>

<style>
.error {
color : red;
}
.alert-danger {
    position: fixed !important;
}
</style>
<script>
	$(function() {
         $('#new_people').validate({
            rules: {
				name: {
					required: true
				},
				mobile: {
					required: true
				},
			 
				email: {
					required: true,
					email: true
				},
				tell: {
					required: true
				}
            },
            messages: {
				
				name: {
					required: "<?=$pro_field_mandatory_fill?>"
				},
				mobile: {
					required: "<?=$pro_field_mandatory_fill?>"
				},
			 
				email: {
					required: "<?=$pro_field_mandatory_fill?>",
					email:"<?=$pro_shape_field?>"
				},
				tell: {
					required: "<?=$pro_field_mandatory_fill?>"
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
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>آیا از حذف این مورد اطمینان دارید؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
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
			<h4 class="modal-title custom_align" id="Heading">مشاهده جزییات</h4>
		</div>
		
			<div class="panel-body" id="show_details">

			</div>
			</div>
		

	</div>
</div>
</form>


<div class="modal fade" id="setting_aboutus" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="tabbable">	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">ارتباط با ما</h4>
			</div>
			<div id="show_about_us"></div>
			<img id="showaboutus_pic" src="waiting.gif" dir="center" style="display:none">
			<div class="panel-body" id="show_details" style="padding:15px">
				<!---------------------------------ارتباط با ما------------>
			<?$call_us_text= get_tem_result($site,$la,'call_us_text','default',$coms_conect);?>
				<div class="bhoechie-tab-content ">
                    
					<div class="form-group">
						<div class="col-md-4">
							<?$sql = "SELECT title,name FROM new_language where status=1";
								$result = $coms_conect->query($sql);
								echo "<select name='about_us_lang' id='about_us_lang' class='form-control' rows='2' style='padding:0px;'>";
									while($row = $result->fetch_assoc()) {
									$name=$row['name'];
									$id=$row['title'];
									$str="";
									if($site_id==$id)
									$str="selected";
									if(in_array($id,$_SESSION["manager_title_lang"]))
									echo "<option $str value='$id'>$name</option> ";
								}				
								echo '</select>';?>
						</div>
						 
						<div class="col-md-4">
							<?$sql = "SELECT name,title FROM new_subsite where status=1";
							$result = $coms_conect->query($sql);
							echo "<select name='about_us_site' id='about_us_site' class='form-control' rows='2' style='padding:0px;'>";
								while($row = $result->fetch_assoc()) {
								$name=$row['name'];
								$title=$row['title'];
								$str="";
								if($site_id==$id)
								$str="selected";
								if(in_array($name,$_SESSION["manager_title_site"]))
								echo "<option $str value='$name'>$name</option> ";
							}				
							echo '</select>';?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-12 control-label" for="family">اطلاعات آدرس پستی خود را وارد نمایید: </label> 
						<div class="form-group col-md-12">
							
								<textarea type="text"  class="form-control" id="about_us_text" name="about_us_text"    style="direction: rtl;"><?=$call_us_text['text']?></textarea>
									<script>
										 tinymce.init({
											 selector: "#about_us_text",
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
			</div>
			
			<div class="modal-footer ">
				<button type="button" id="about_us" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;ثبت</button>
			</div>
		</div>
	</div>
	</div>
</div>

<?$edit_id=injection_replace($_GET['edit_id']);
$edit_id_post=injection_replace($_POST['edit_id_post']);
$user_id=injection_replace($_POST['user_id']);
$name=injection_replace($_POST['name']);
$semat=injection_replace($_POST['semat']);
$mobile=injection_replace($_POST['mobile']);

$manage_lang_filter=injection_replace($_POST['manage_lang_filter']);
$manage_site_filter=injection_replace($_POST['manage_site_filter']);
 
 
 
$fax=injection_replace($_POST['fax']);
$start_date=injection_replace($_POST['start_date']);
$finish_date=injection_replace($_POST['finish_date']);
$avatar=injection_replace($_POST['avatar']);
$department=injection_replace($_POST['department']);
$email=injection_replace($_POST['email']);
$tell=injection_replace($_POST['tell']);
$chat=injection_replace($_POST['chat']);
$works=injection_replace($_POST['works']);
if($name>""&&$edit_id==0&&$_SESSION['can_add']==1){
	$arr_slide=array("user_id"=>$user_id,"site"=>$manage_site_filter,"la"=>$manage_lang_filter,"name"=>$name,"semat"=>$semat,"mobile"=>$mobile,"fax"=>$fax,"start_date"=>$start_date,"finish_date"=>$finish_date ,"avatar"=>$avatar ,"department"=> $department,"email"=> $email,"tell"=> $tell,"chat"=>$chat ,"works"=>$works,"date"=>$now,"ip"=>$custom_ip);
	insert_to_data_base($arr_slide,'new_contact_us',$coms_conect);
	show_msg($new_successfull);
}else if($name>""&&$edit_id_post>0&&$_SESSION['can_edit']==1){
	$condition="id=$edit_id_post";
	$arr_slide=array("user_id"=>$user_id,"site"=>$manage_site_filter,"la"=>$manage_lang_filter,"name"=>$name,"semat"=>$semat,"mobile"=>$mobile,"fax"=>$fax,"start_date"=>$start_date,"finish_date"=>$finish_date ,"avatar"=>$avatar ,"department"=> $department,"email"=> $email,"tell"=> $tell,"chat"=>$chat ,"works"=>$works,"edit_date"=>$now,"ip"=>$custom_ip);
	update_data_base($arr_slide,'new_contact_us',$condition,$coms_conect);
	show_msg($new_successfull);
}	


$semat='';
$site='';
$la='';
$user_id='';
$works='';
$chat='';
$tell='';
$department='';
$email='';
$department='';
$avatar='';
$finish_date='';
$start_date='';
$fax='';
$mobile='';
$name='';
if($edit_id>""){
	$query="SELECT * FROM new_contact_us where id='$edit_id'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	
	$semat=$row['semat'];
	$username=$row['name'];
	$mobile=$row['mobile'];
	$fax=$row['fax'];
	$start_date=$row['start_date'];
	$finish_date=$row['finish_date'];
	$avatar=$row['avatar'];
	$department=$row['department'];
	$email=$row['email'];
	$tell=$row['tell'];
	$chat=$row['chat'];
	$works=$row['works'];
	$user_id=$row['user_id'];
	$la=$row['la'];
	$site=$row['site'];
}	
?>
<form class="form-horizontal" action="" method="post" name="new_map" id="new_map" enctype="multipart/form-data">	
<div class="modal fade" id="setting_map" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">تنظیمات نقشه</h4>
		</div>
		<div id="show_related"></div>
		<img id="show_waiting_search" src="waiting.gif" dir="center" style="display:none">
		<div class="modal-body">
			<div class="page-body">
				<div class="alert alert-warning">برای درج نقشه به ترتیب مراحل زیر را انجام دهید: <br>
					1- وارد سایت map.google.com شوید<br>
					2- در قسمت بالا سمت چپ مکان خود را جستجو کنید<br>
					3- بعد از پیدا کردن مکان خود  و اطمینان از صحت آن در سمت چپ روی گزینه SHARE کلیک کنید<br>
					4- در صفحه جدید روی گزینه Embed map رفته و از داخل باکس آدرس متن داخل src را کپی کنید<br>
					5- در سایت خود متن را در داخل قسمت آدرس نقشه گوگل paste کنید<br>
					6- برای اتمام و ذخیره سازی بر روی دکمه ثبت کلیک کنید</div>
				<div class="form-group">
					<label class="col-md-2 control-label" for="edit_name">زبان</label>
					<div class="col-md-8">
						<?$sql = "SELECT title,name FROM new_language where status=1";
							$result = $coms_conect->query($sql);
							echo "<select name='lang_map' id='lang_map' class='form-control' rows='2' style='padding:0px;'>";
								while($row = $result->fetch_assoc()) {
								$name=$row['name'];
								$id=$row['title'];
								$str="";
								if($site_id==$id)
								$str="selected";
								if(in_array($id,$_SESSION["manager_title_lang"]))
								echo "<option $str value='$id'>$name</option> ";
							}				
							echo '</select>';?>
					</div>
				</div> 
				<div class="form-group">
					<label class="col-md-2 control-label" for="edit_name">سایت</label>
					<div class="col-md-8">
						<?$sql = "SELECT name,title FROM new_subsite where status=1";
						$result = $coms_conect->query($sql);
						echo "<select name='site_map' id='site_map' class='form-control' rows='2' style='padding:0px;'>";
						    while($row = $result->fetch_assoc()) {
							$name=$row['name'];
							$title=$row['title'];
							$str="";
							if($site_id==$id)
							$str="selected";
							if(in_array($name,$_SESSION["manager_title_site"]))
							echo "<option $str value='$name'>$name</option> ";
						}				
						echo '</select>';?>
					</div>
				</div>
				<div class="form-group">
					<div class="form-group col-sm-12"> 
						<div class="input-group input-group-sm">
							<span class="input-group-addon">آدرس نقشه گوگل</span>  
							
						 	<input id="call_us_google" name="address" value="<?=$call_us_google?>" type="text" class="form-control" placeholder="http://" style="direction: ltr;">
						</div>  
					</div>
				</div><div class="center">
				<iframe    id="call_us_google_frame" width="520" height="450" frameborder="0"></iframe>
			</div>
			</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="google_address" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;ثبت</button>
			
		</div>
	</div>
	</div>
	
</div>
</form>
<script>
	$("#google_address").click(function ( ) {
		$("#show_waiting_search").show();
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=add_google_contact&id="+$("#lang_map").val()+"&value="+$("#site_map").val()+"&secend_value="+$("#call_us_google").val(),
			success: function(result){
			//alert(result);
			$("#show_waiting_search").hide();
				$("#show_related").html(result);	
			}
		});		
	});

	$(document).ready(function ( ) {
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_google_contact&id="+$("#lang_map").val()+"&value="+$("#site_map").val(),
			success: function(result){
				$("#call_us_google").val(result);	
				$("#call_us_google_frame").attr('src',result);	
			}
		});		
	});	
	
	$("#lang_map").change(function ( ) {
		$("#show_waiting_search").show();
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_google_contact&id="+$("#lang_map").val()+"&value="+$("#site_map").val(),
			success: function(result){
				$("#call_us_google").val(result);	
				$("#show_waiting_search").hide();
			}
		});		
	});		
	
	$("#site_map").change(function ( ) {
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_google_contact&id="+$("#lang_map").val()+"&value="+$("#site_map").val(),
			success: function(result){
				$("#call_us_google").val(result);	
			}
		});		
	});		
	


	$("#about_us").click(function ( ) {
		$("#showaboutus_pic").show();
	 	$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=add_about_us&id="+$("#about_us_lang").val()+"&value="+$("#about_us_site").val()+"&secend_value="+tinyMCE.activeEditor.getContent(),
			success: function(result){
			//alert(result);
			$("#showaboutus_pic").hide();
				$("#show_about_us").html(result);	
			}
		});		
	});

	$(document).ready(function ( ) {
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_about_us&id="+$("#about_us_lang").val()+"&value="+$("#about_us_site").val(),
			success: function(result){
				
				$("#about_us_text").val(result);	
			}
		});		
	});	
	
	$("#about_us_lang").change(function ( ) {
		$("#showaboutus_pic").show();
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_about_us&id="+$("#about_us_lang").val()+"&value="+$("#about_us_site").val(),
			success: function(result){
				tinymce.get('about_us_text').getBody().innerHTML = result;
				$("#showaboutus_pic").hide();
			}
		});		
	});		
	
	$("#about_us_site").change(function ( ) {
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_about_us&id="+$("#about_us_lang").val()+"&value="+$("#about_us_site").val(),
			success: function(result){
				tinymce.get('about_us_text').getBody().innerHTML = result;	
			}
		});		
	});		
</script>

</br>
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  -->
 
	<div class="tabbable">
		<div class="msheet tab-content">
	  
		<div class="secfhead">
			<!-- #section:main/contact_us.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">مدیریت تماس با ما</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/contact_us.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

					<li id="newpag" class="addicon">
						<a data-toggle="tab" href="#add_people" data-placement="bottom" title="افزودن افراد به فرم تماس با ما" >
							<span class="flaticon-add149"></span>
						</a>
					</li>
					<!-- #section:main/contact_us.map -->
					<li id="switchword">
						<a data-toggle="modal" data-target="#setting_map" href="#" data-placement="bottom" title="تنظیمات نقشه">
							<span class="fa fa-map-marker" style="margin-top: 8px;margin-left: 4px;"></span>
						</a>
					</li>
					
					<li id="switchword">
						<a data-toggle="modal" data-target="#setting_aboutus" href="#" data-placement="bottom" title="تنظیمات ارتباط با ما">
							<span class="fa fa-gear" style="margin-top: 8px;margin-left: 4px;"></span>
						</a>
					</li>
					<!-- /section:main/contact_us.map -->
				</ul>
			</div>

		</div>
		
			<div class="tab-pane <?if($edit_id=="")echo 'active'?> " id="tab1">
				<div class="tt">
					<div class="row-fluid">
						<!--div class="col-md-6 yepco"-->
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete" href="#" title="<?=$s_Pages_delete?>"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<?if($_SESSION["can_delete"]==1){ ?>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
											<?=$s_Pages_delete?> 
										</a>
									</ul>
								</div>
								<?}?>
							</div>
						<!--/div-->
						
						
						<div class="col-md-10">
							<div class="form-group yepco">
																<?$manager_filter=injection_replace($_GET['manager_filter']);
									if($manager_filter=='')
										$manager_filter=$_SESSION["manager_id"];
								$q=injection_replace($_GET['q']);
								$site_filter=injection_replace($_GET['site_filter']);
								$lang_filter=injection_replace($_GET['lang_filter']);
								if($lang_filter=="")
									$lang_filter=$_SESSION['page_languege'];	
								
								
								
								
							if($q>""){
								$str_q="  and (a.name like '%$q%'  or a.semat like '%$q%' or a.id='%$q%' or a.department='%$q%' or a.tell like '%$q%' or a.mobile like '%$q%' or a.fax like '%$q%') ";
								$manager_q="&q=$q";
							}	
							if($lang_filter==-1){
								$manager_title_lang="'".implode("','",$_SESSION["manager_title_lang"])."'";
							 $str_lang=" and a.la in ($manager_title_lang)"; 
								$lang_page="&lang_filter=$lang_filter";
							}
							else if($lang_filter>""){
							
								$str_lang=" and a.la='$lang_filter'";
								$lang_page="&lang_filter=$lang_filter";
							} 
						 
								
								
							if($site_filter==-1){
								$str_site=" and a.site in ($manager_title_site)";
								$site_page="&site_filter=$site_filter";
							}
							else if($site_filter>0){
								$str_site=" and a.site='$site_filter'";
								$site_page="&site_filter=$site_filter";
							}?>
							 
									<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
										<input type="hidden" name="yep"  value="new_contact_us">
										<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
										<input type="hidden" name="site_filter" value="<?=$site_filter?>">
										<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
										<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
									</form>	
						 			<!--div class="pull-right btn-default btn-xs yepco">
										<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
									</div-->
									<div class="pull-right btn-default btn-xs yepco">
										<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
									</div>
									
									<div class="pull-right btn-default btn-xs yepco">
										<?create_sub_site_filter($site_filter,$coms_conect,$_SESSION['manager_title_site'])?>
									</div>
						</div>
					</div>
					</div>
					<!-- #section:main/contact_us.table -->
					<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								<th class="center">ردیف</th>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>
								</th>
								<th>نام و نام خانوادگی</th>
								<th>سمت</th>
								<th>دپارتمان</th>
								<th>ایمیل</th>
								<th>سایت</th>
								<th>زبان</th>
								<th><?=$new_sysmenu[2]?></th>
							</tr>
						</thead>
						<tbody>
						<?	$i=1;
							$query="select name,semat,department,email,id,site,la from new_contact_us a where id>0 $str_q $str_lang $str_manager";
							$result = $coms_conect->query($query); 
							//echo $query;
								while($RS1 = $result->fetch_assoc()) {
								$id=$RS1["id"];
						?>
							<tr>
								<td class="center"><?=$i;?></td>
								<td class="center">
									<label class="position-relative">
										<input id="<?=$id?>" value="<?=$id?>" type="checkbox" class="conchkNumber" />
										<span class="lbl"></span>
									</label>
								</td>
								<td><?=$RS1["name"]?></td>
								<td><?=$RS1["semat"]?></td>
								<td><?=$RS1["department"]?></td>
								<td><?=$RS1["email"]?></td>
								<td><?=$RS1["site"]?></td>
								<td><?=$RS1["la"]?></td>
								<td>
									<a id="<?=$id?>" class="show_item green" data-target="#details" data-placement="top" rel="tooltip" data-toggle="modal" title="مشاهده جزییات" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-eye bigger-120"></i>
									</a>
									<?if($_SESSION["can_edit"]==1){?>
									<a id="<?=$id?>" class="edit_menu blue"  href="newcoms.php?yep=new_contact_us&edit_id=<?=$id?>" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-edit bigger-120" title="ویرایش"></i>
									</a>
									<?}if($_SESSION["can_delete"]==1){?>
									<a id="<?=$id?>" class="del_menu red" data-title="Delete" data-toggle="modal" title="<?=$c_Poll_del?>" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120"></i>
									</a>
									<?}?>
								</td>
							</tr>
						<?$i++;}?>
						</tbody>
					</table>
					<!-- /section:main/contact_us.table -->
				</div>
			</div>
			<div class="tab-pane <?if($edit_id>"")echo 'active'?>" id="add_people">
			<!-- #section:main/contact_us.form -->
			<form class="form-horizontal" action="" method="post" name="new_people" id="new_people" enctype="multipart/form-data">
				<input type="hidden" id="edit_id_post" name="edit_id_post" value="<?=$edit_id?>">	
				<input type="hidden" id="check_value" name="check_value" value="0">			
				<div id="id-message-new-navbar" class="message-navbar clearfix">
					<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
						<span class="flaticon-verified9">
						</span>
					</a>
					<a href="newcoms.php?yep=new_contact_us" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
						<span class="flaticon-left-arrow9">
						</span>
					</a>
					<!--div>
					<div class="message-bar">
						<h2 style="color: #2a8bcb;"><?=$pro_aafzodann?>/ <?=$sd_shop_shipping_edit?> <?=$s_home_language?></h2>
					</div>

					
						<div class="messagebar-item-left">
							<a href="/newcoms.php?yep=new_contact_us" id="back_btn"  class="active">
								<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
								<b class="middle bigger-110"><?=$new_Getting_back?></b>
							</a>
						</div>

						<div class="messagebar-item-right">
							<span class="inline btn-send-message">
								<button id="submit_btn" type="submit" class=" btn btn-sm btn-primary no-border btn-white btn-round">
									<i class="ace-icon fa fa-check"></i>
									<span class="bigger-110"><?=$pro_save?></span>
								</button>
							</span>
						</div>
					</div-->
				</div>
				</br>
						
				<div class="panel-body" style="padding-top: 65px;">
					<div class="col-md-6">
							<div class="form-group">
								<label class="col-md-4 control-label" for="edit_name">زبان</label>
								<div class="form-group col-md-8">
									<?$lang_filter=$_GET['manage_lang_filter'];
										$sql = "SELECT title,name FROM new_language where status=1";
										$result = $coms_conect->query($sql);
										echo "<select name='manage_lang_filter' id='manage_lang_filter' class='form-control' rows='2' style='padding:0px;'>";
										 while($row = $result->fetch_assoc()) {
											$name=$row['name'];
											$id=$row['title'];
											$str="";
											if($la==$id)
											$str="selected";
											if(in_array($id,$_SESSION["manager_title_lang"]))
											echo "<option $str value='$id'>$name</option> ";
										}				
										echo '</select>';?>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-md-4 control-label" for="edit_name">زير سايت</label>
								<div class="form-group col-md-8">
									<?$sql = "SELECT name FROM new_subsite where status=1";
									$result = $coms_conect->query($sql);
									echo "<select name='manage_site_filter' id='manage_site_filter' class='form-control' rows='2' style='padding:0px;'>";
										 while($row = $result->fetch_assoc()) {
											$name=$row['name'];
											$id=$row['name'];
											$str="";
											if($site==$id)
											$str="selected";
											if(in_array($id,$_SESSION["manager_title_site"]))
											echo "<option $str value='$id'>$name</option> ";
										}				
										echo '</select>';?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" for="user_id">مدیران سایت</label>
								<div class="form-group col-md-8">
							<?	$sql = "SELECT id,user_name,name FROM new_managers";
								$result = $coms_conect->query($sql);
								echo "<select name='user_id' id='user_id' class='form-control' rows='2' style='padding:0px;'>";
								while($row = $result->fetch_assoc()) {
									 $str="";
									if($user_id==$row['id'])
									$str="selected";
									if(in_array($row['id'],$_SESSION["manager_user_permisson"]))
									echo "<option $str value='{$row['id']}'>{$row['user_name']} ({$row['name']})</option> ";
								}				
								echo '</select>';?>
								</div>
							</div>
							
						 <div class="form-group">
							 <label class="col-sm-4 control-label">نام و نام خانوادگی</label>
							 <div class="form-group col-sm-8">
								<input type="text" value="<?=$username?>" name="name" id="name" class="form-control ">
							 </div>
						</div>	
						
						<div class="form-group">
							 <label class="col-sm-4 control-label">تلفن*</label>
							 <div class="form-group col-sm-8">
								<input type="text" value="<?=$tell?>" name="tell" id="tell" class="form-control input-mask-phone" placeholder="لطفا تلفن را با کد شهر وارد نمایید">
							 </div>
						</div>
						
						<div class="form-group">
							 <label class="col-sm-4 control-label">موبایل*</label>
							 <div class="form-group col-sm-8">
								<input type="text" value="<?=$mobile?>" name="mobile" id="mobile" class="form-control input-mask-mob" placeholder="لطفا موبایل را با صفر وارد نمایید">
							 </div>
						</div>
						
						<div class="form-group">
							 <label class="col-sm-4 control-label">دورنگار </label>
							 <div class="form-group col-sm-8">
								<input type="text" value="<?=$fax?>" name="fax" id="fax" class="form-control input-mask-fax" placeholder="لطفا دورنگار را با کد شهر وارد نمایید">
							 </div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">ساعات کاری</label>
								<div class="form-group col-md-8">
									<div class="input-group bootstrap-timepicker" id="work_time">
										<input type="text" value="<?=$start_date?>" class="input-sm form-control" name="start_date" value="" id="timepicker1" palceholder="از">
										<span class="input-group-addon">
											<i class="fa fa-exchange"></i>
										</span>
										<input type="text" value="<?=$finish_date?>" class="input-sm form-control" name="finish_date" value="" id="timepicker2" palceholder="تا">
									</div>								
								</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">تصویر</label>
							<div class="form-group col-md-8">
								<div class="input-group">
									<input type="text" class="form-control" value="<?=$avatar?>" name="avatar" id="avatar" >
									<span class="input-group-btn">
										<a href="/filemanager/dialog.php?type=1&amp;field_id=avatar" class="btn btn-sm btn-default iframe-btn"  type="button">
											<i class="ace-icon fa fa-upload bigger-110"></i>
											انتخاب
										</a>
									</span>
								</div>
							</div>
						</div>
					
					</div>
					<div class="col-md-6">
						
						<div class="form-group">
							<label class="col-sm-4 control-label">سمت</label>
								<div class="form-group col-sm-8">
									<input type="text" name="semat" value="<?=$semat?>" id="semat" class="form-control" >
									<div id="show_msgbox"></div>
								</div>
						</div>
					
						<div class="form-group">
							<label class="col-sm-4 control-label">دپارتمان</label>
								<div class="form-group col-sm-8">
									<input type="text" name="department" value="<?=$department?>" id="department" class="form-control" >														
								</div>
						</div>
					
						<div class="form-group">
							<label class="col-sm-4 control-label">ایمیل*</label>
								<div class="form-group col-sm-8">
									<input type="text" name="email" value="<?=$email?>" id="email" class="form-control" >
									<div id="show_msgbox"></div>													
								</div>
						</div>
						
						<div class="form-group">
							 <label class="col-sm-4 control-label">اطلاعات چت آنلاین</label>
							 <div class="form-group col-sm-8">
								<textarea type="text" name="chat"  id="chat" class="form-control" rows="8" ><?=$chat?></textarea>
							 </div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-4 control-label">شرح وظایف</label>
								<div class="form-group col-sm-8">
									<textarea name="works" value="<?=$works?>" id="works" class="form-control" rows="4"></textarea>
								</div>
						</div>
					
					</div>
				</div>
				<div class="panel-footer bttools">
					<button type="submit" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button>
				</div>
					
			</form>
			<!-- /section:main/contact_us.form -->	
			</div>
		</div>
<style>
@media (min-width: 767px){
.panel-body{
  padding-left: 100px;
  padding-right: 100px;
}
}
</style>
	
<?$_SESSION["del_item"]='del_countact_us';?>	
<script src="ajax_js/countact_us.js"></script>
<script src="/yep_theme/default/rtl/assets/js/date-time/bootstrap-timepicker.min.js" /></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap-timepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>
<script>
	 $(".submit2").click(function(){
		 $("#new_people").submit();
	 });				 
</script>	
 
<script type="text/javascript">
	$(function(){
		$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});
	});

	jQuery(function($) {
		$.mask.definitions['~']='[+-]';
		$('.input-mask-fax').mask('99999999999');
		$('.input-mask-phone').mask('99999999999');
		$('.input-mask-mob').mask('99999999999');
	});
	
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
	/*
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
	*/	
	
</script>
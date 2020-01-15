<?$modual_type=18;
$_SESSION["edit_item"]=$modual_type;
$modul_name='ads';
$cat_title=$new_sysmenu[141];
?>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-duallistbox/bootstrap-duallistbox.min.css">
<script src="/yep_theme/default/rtl/js/bootstrap-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/prettify/prettify.css">
<script src="/yep_theme/default/rtl/js/prettify/prettify.min.js"></script>
<?$onvan=injection_replace($_POST['onvan']);
$edit_mode=injection_replace($_POST['edit_mode']);
$meta_desciption=injection_replace($_POST['meta_desciption']);
$meta_keyword=injection_replace($_POST['meta_keyword']);
if($_POST['manage_lang']>""){
	$manage_lang=injection_replace($_POST['manage_lang']);
	
}else
$manage_lang=$_SESSION['page_languege'];
##############################################################
if($onvan>""&&$edit_mode==0&&$_SESSION["can_add"]==1){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
	$sql="SELECT id FROM new_modules_cat ORDER BY id DESC LIMIT 1";
	$result = $coms_conect->query($sql);
	$row  = $result->fetch_assoc();
	$id=$row['id'];
	$id++;
	
	

	if(!in_array($manage_lang,$_SESSION["manager_title_lang"]))
	header('Location: new_manager_signout.php');
	
	$query1="insert into new_modules_cat(meta_keyword,meta_desciption,name,rang,type,date,user_id,ip,la) 
	values ('$meta_keyword','$meta_desciption','$onvan',$id,'$modual_type',NOW(),$manager_id,'$custom_ip','$manage_lang')";
	$coms_conect->query($query1);
	//echo $query1;
	$id=mysqli_insert_id($coms_conect) ;
	$query1="insert into new_cat_permission(menu_id,permission,group_id,view) 
	values ($id,1,1,1)";
	$coms_conect->query($query1);	
}else 	if(($onvan)>""&&$edit_mode>0&&$_SESSION["can_edit"]==1){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
	$query12="select la from new_modules_cat a  where id=$edit_mode";
	$result12 = $coms_conect->query($query12);
	$RS121 = $result12->fetch_assoc();
	if(!in_array($RS121["la"],$_SESSION["manager_title_lang"]))
	header('Location: new_manager_signout.php');	
	$query1="update new_modules_cat set meta_keyword='$meta_keyword',meta_desciption='$meta_desciption',name='$onvan',edit_date=NOW(),edit_user_id='$manager_id',ip='$custom_ip' where id='$edit_mode'"; 
	$coms_conect->query($query1);
}	
 create_session_token();
?>
<script src="/yep_theme/default/rtl/js/menubar/madules_cat.js"></script>
<script src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>
<script type="text/javascript">
	jQuery(function($){
	
		$('.dd').nestable();
	
		$('.dd-handle a').on('mousedown', function(e){
			e.stopPropagation();
		});
		
		$('[data-rel="tooltip"]').tooltip();
		$('#nestableMenu').nestable('collapseAll');
	});
</script>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">حذف</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف دسته زير اطمينان داريد؟</div>
			</div>
			<div class="modal-footer ">
				<button type="button" id="btn_ok" value="" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
				<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
			</div>
		</div>
	</div>
</div>
<br>											
<script src="ajax_js/page_cat.js"></script>	
<script>
$("#manage_lang").change(function () {	
	$("#onvan").val('');
	$("#menu1").submit();
});	
</script>	
	<script>
$(document).ready(function(){
	var updateOutput = function(e)
		{
			var list   = e.length ? e : $(e.target),
				output = list.data('output');
			if (window.JSON) {
				output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
				menu_updatesort(window.JSON.stringify(list.nestable('serialize')));
			} else {
				output.val('JSON browser support required for this demo.');
			}
		};
		
		// activate Nestable for list menu
		$('#nestableMenu').nestable({
			group: 1
		})
		.on('change', updateOutput);

		
		
		// output initial serialised data
		updateOutput($('#nestableMenu').data('output', $('#nestableMenu-output')));

		$('#nestable-menu').on('click', function(e)
		{
			var target = $(e.target),
				action = target.data('action');
			if (action === 'expand-all') {
				$('.dd').nestable('expandAll');
			}
			if (action === 'collapse-all') {
				$('.dd').nestable('collapseAll');
			}
		});

		$('#nestable3').nestable();

	});
</script>


<div class="tabbable">
	<div class="msheet tab-content">
		<div class="secfhead">
			<!-- #section:news/newstext.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-text150" style=""></span>
				</div>
				<div class="title"><p class="titr">دسته بندی آگهی</p><p class="lead">توضیحات این بخش</p>
				</div>
			</div>
			<!-- /section:news/newstext.head -->
			<div class="toolmenu">
				<ul>
				<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

				<li id="newpag" class="addicon reset">
					<a href="#write" data-toggle="tab" data-placement="bottom" title="افزودن خبر جدید" >
						<span class="flaticon-add149"></span>
					</a>
				</li>
				 
				<li>
					<a  data-toggle="modal" data-target="#searching" data-placement="top" title="جستجوی پیشرفته" >
						<span class="flaticon-search74"></span>
					</a>
				</li>
				</ul>
			</div>
		</div>
		
		<div class="tab-pane <?if($edit_id=="") echo 'active'?>" id="tab1">
			<!-- #section:ads/ads_cat.table -->
			<?//	
			$sql = "SELECT * FROM new_modules_cat WHERE parent_id='0' and type='$modual_type' and la='$manage_lang' ORDER BY rang";
			$result = $coms_conect->query($sql);
			echo "<div class='cf nestable-lists'>\n";
				echo "<div class='' id='nestableMenu'>\n\n";
					echo "<ol class='dd-list'>\n";
						  while($row = $result->fetch_assoc()) {
							echo "\n";
							$id=$row['id'];$str="";
							 $status=$row['status'];
							 if($status==1)
							 $str='checked';
							echo "<li class='dd-item' data-id='{$row['id']}'>";
								echo "<div class='dd-handle'> {$row['name']}";
									echo '	<div class="pull-right action-buttons">
												 <a class="blue" href="#">
												 <input '.$str.' id='.$id.' name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox"/>
												 <span class="lbl"></span>
												</a>
									
												<a id='.$id.' class="edit_menu blue" href="#">
												<span class="flaticon-note32 bigger-130"></span>
												</a>';
												if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)){
												echo '<a id='.$id.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
												<span class="flaticon-delete84 bigger-130"></span>
												</a>';
												}
										echo 	'</div>
									</div>';
								show_madules_cat($row['id'],$site_id,$manage_lang, $modual_type ,$coms_conect);
							echo "</li>\n";
						}
					echo "</ol>\n\n";
				echo "</div>\n";
			echo "</div>\n\n";
			//?><?//=$sql?>
			<!-- /section:ads/ads_cat.table -->
			
		</div>
		
		<div class="tab-pane   <?if($edit_id>"") echo 'active'; else echo '';?>" id="write">
			<form id="newstext" name="newstext" action="" role="form" method="post" enctype="multipart/form-data"
			data-fv-framework="bootstrap"
			data-fv-message="This value is not valid"
			data-fv-icon-validating="glyphicon glyphicon-refresh">
			<div id="id-message-new-navbar" class="message-navbar clearfix">
				<input type="hidden" name="array_value" id="array_value">
				<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
				<input type="hidden" name="edit_mode" id="edit_mode" value="<?=$edit_id?>">
				<input type="hidden" name="status" id="status" value="<?=$status?>">
				<input type="hidden" id="check_value" name="check_value" value="0">
				<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="انتشار">
					<span class="flaticon-verified9">
					</span>
				</a>
				<input type='submit'  id='submit_btn' style='display:none'>
				<a href="#" class="save-draft2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="پیش نویس">
					<span class="flaticon-browser93">
					</span>
				</a>
				<a href="newcoms.php?yep=new_ads_cat" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
					<span class="flaticon-left-arrow9">
					</span>
				</a>
			</div>
			<br>
			<fieldset style="margin-top: -15px;"> 
			<div class="tabbable tabs-left">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a data-toggle="tab" href="#home">
							<p class="flaticon-file23">
							خبر
							</p>
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#cat3" >
						<p class="flaticon-squares36"></p>
						دسته بندي
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#navication">
							<p class="flaticon-gallery7"></p>
							تصوير نوار ناوبري 
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#SEO3">
							<p class="flaticon-search103"></p>
							SEO
						 </a>
					 </li>
					 <li>
						<a data-toggle="tab" href="#slide">
							<p class="flaticon-folder23"></p>
							 اسلايد
						 </a>
					 </li>
					 <li class="sss" id="fff">
						 <a data-toggle="tab" href="#gallery">
							 <p class="flaticon-gallery7"></p>
							 گالري تصاوير
						 </a>
					</li>
				</ul>
				<div class="tab-content" style="min-height: 640px;">
				
					<div class="tab-pane active" id="home">
						<div class="page-content-area">
							<div class="page-body" style="margin-top: 25px;">
							
										<div class="col-md-12">
											<div class="form-group row">
												<div class="form-group col-sm-6">
													<label class="control-label" for="group_name">زبان</label> 
													<?create_lang_title($la,$coms_conect,$_SESSION["manager_title_lang"]);?>
												</div>
											</div>
											
											<div class="form-group row">
												<div class="form-group col-sm-6">
													<label class="control-label">عنوان</label>
													<input type="text" value="" name="title" id="title" class="form-control"/>
												</div>
											</div>
											<div class="form-group row">
												<div class="form-group col-sm-12">
													<label class="control-label">خلاصه *</label>
													<textarea  id="text" name="abstract"  class="form-control" rows="3"><?=$abstract?></textarea>
																				 <!--<script>CKEDITOR.replace( 'text' );</script>-->
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
											<label>	وضعیت دسته بندی
												<input id="2" name="switch-field-1" class="ace ace-switch ace-switch-6 conchkNumber_4" type="checkbox">
												<span title="" class="lbl" data-original-title="فعال سازی"></span>
											</label>
										</div>
										
							</div>
						</div>
					</div>
					
					<div class="tab-pane" id="cat3">
						<div class="page-content-area">
							<div class="page-body" style="margin-top: 25px;">
								<div class="panel row">
									<script>
									/////////////// radio show hide upload image
									$(document).ready(function(){
										$('input[name$="upload_type"]').click(function(){
											if($(this).attr("value")=="1"){
												$(".box").not(".red").hide();
												$(".red").show();
											}
											if($(this).attr("value")=="2"){
												$(".box").not(".green").hide();
												$(".green").show();
											}
										});
									});
									</script>
									<h4>تصویر بند انگشتی</h4>
									<div class="form-group">
										<label class="control-label col-md-12">
										  <input type="radio" name="upload_type" <?if($upload_type==1)echo 'checked'?> id="upload_type" value="1">
										  الصاق از فایل کامپیوتر
										</label>  
											<div class="ui-sortable red box" id="upload_type1" style="float:right;<?if($upload_type==1)echo 'display:block';else echo 'display:none'?>"><div id="news_image_avatar" orakuploader="on"></div>
												<div class="form-group">
													<input type="text" value="" id="news_gallery">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=news_gallery" class="holam btn btn-primary iframe-btn" title="" data-original-title="انتخاب"><span class="holam flaticon-search85"></span></a>
													<a class="btn btn-success holam" href="#" id="add-image-to-gallery" title="" data-original-title="افزودن"><span class="holam flaticon-round68"></span></a>
													<img id="show_waiting" src="waiting.gif" style="display:none">
												</div>
											</div>
											<script type="text/javascript">
												$(document).ready(function(){
													 $('#news_image_avatar').orakuploader({
														orakuploader_path : 'new_orakuploader/',
														orakuploader_main_path : 'new_gallery/files',
														orakuploader_thumbnail_path : 'new_gallery/files/tn',
														orakuploader_use_main : false,
														//orakuploader_use_sortable : true,
														orakuploader_use_dragndrop : true,
														orakuploader_add_image : 'new_orakuploader/images/add.png',
														orakuploader_add_label : 'آپلود تصویر',
														 orakuploader_resize_to : <?=get_result("select address from new_default_navbar where name='news_pic_size'  and la='fa' and site='main'",$coms_conect)?>,
														orakuploader_thumbnail_size : 400,
														orakuploader_watermark : 'new_gallery/watermark/water_mark.png0',
													});
													
													$('#news_image_avatar').html("<?=$pic_str?>");
												});
											</script>
									</div>
									
									<label class="control-label col-md-12">
										<input type="radio" name="upload_type" <?if($upload_type!=1)echo 'checked'?> id="radios-1" value="2" >
										انتخاب از رسانه های قبلی
									</label>
									
									<div class="form-group green box" id="upload_type2" style="<?if($upload_type!=1)echo 'display:block';else echo'display:none'?>">		
										<div class="form-group col-md-6">
											<div class="imgdemo"><img id="aks_news_thumb" src="/yep_theme/default/rtl/images/pic.png"></div>
											<!--img data-src="holder.js/100%x100%" id="aks_news_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
											<div style="display: inline-flex;">	
												<script>
													setInterval(check_address,2000)
													function check_address() {
														var aks_news = $('#news_imag').val(); 
														if(aks_news!=""){				
															$('#aks_news_thumb').attr("src",aks_news);						
														}
													}
												</script>
												<a href="/filemanager/dialog.php?type=2&amp;field_id=news_imag" class="btn btn-success iframe-btn" style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>	
												<input type="text" name="news_image" value="<?if($upload_type==2)echo $news_image?>" id="news_imag" class="imginput">
											</div>
										</div>
									</div>
								</div>
								
								
								<div class="panel row">
									<script>
									/////////////// radio show hide upload image
									$(document).ready(function(){
										$('input[name$="up_type"]').click(function(){
											if($(this).attr("value")=="3"){
												$(".boxi").not(".redi").hide();
												$(".redi").show();
											}
											if($(this).attr("value")=="4"){
												$(".boxi").not(".greeni").hide();
												$(".greeni").show();
											}
										});
									});
									</script>
									<h4>تصویر ناوبری</h4>
									<div class="form-group">
										<label class="control-label col-md-12">
										  <input type="radio" name="up_type" <?if($up_type==3)echo 'checked'?> id="up_type" value="3">
										  الصاق از فایل کامپیوتر
										</label>  
											<div class="ui-sortable redi boxi" id="up_type3" style="float:right;<?if($up_type==3)echo 'display:block';else echo 'display:none'?>"><div id="news_image_avatar" orakuploader="on"></div>
												<div class="form-group">
													<input type="text" value="" id="news_gallery">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=news_gallery" class="holam btn btn-primary iframe-btn" title="" data-original-title="انتخاب"><span class="holam flaticon-search85"></span></a>
													<a class="btn btn-success holam" href="#" id="add-image-to-gallery" title="" data-original-title="افزودن"><span class="holam flaticon-round68"></span></a>
													<img id="show_waiting" src="waiting.gif" style="display:none">
												</div>
											</div>
											<script type="text/javascript">
												$(document).ready(function(){
													 $('#news_image_avatar').orakuploader({
														orakuploader_path : 'new_orakuploader/',
														orakuploader_main_path : 'new_gallery/files',
														orakuploader_thumbnail_path : 'new_gallery/files/tn',
														orakuploader_use_main : false,
														//orakuploader_use_sortable : true,
														orakuploader_use_dragndrop : true,
														orakuploader_add_image : 'new_orakuploader/images/add.png',
														orakuploader_add_label : 'آپلود تصویر',
														 orakuploader_resize_to : <?=get_result("select address from new_default_navbar where name='news_pic_size'  and la='fa' and site='main'",$coms_conect)?>,
														orakuploader_thumbnail_size : 400,
														orakuploader_watermark : 'new_gallery/watermark/water_mark.png0',
													});
													
													$('#news_image_avatar').html("<?=$pic_str?>");
												});
											</script>
									</div>
									
									<label class="control-label col-md-12">
										<input type="radio" name="up_type" <?if($up_type!=3)echo 'checked'?> id="radios-4" value="4" >
										انتخاب از رسانه های قبلی
									</label>
									
									<div class="form-group greeni boxi" id="up_type4" style="<?if($upload_type!=3)echo 'display:block';else echo'display:none'?>">		
										<div class="form-group col-md-6">
											<div class="imgdemo"><img id="aks_news_thumb" src="/yep_theme/default/rtl/images/pic.png"></div>
											<!--img data-src="holder.js/100%x100%" id="aks_news_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
											<div style="display: inline-flex;">	
												<script>
													setInterval(check_address,2000)
													function check_address() {
														var aks_news = $('#news_imag').val(); 
														if(aks_news!=""){				
															$('#aks_news_thumb').attr("src",aks_news);						
														}
													}
												</script>
												<a href="/filemanager/dialog.php?type=2&amp;field_id=news_imag" class="btn btn-success iframe-btn" style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>	
												<input type="text" name="news_image" value="<?if($up_type==4)echo $news_image?>" id="news_imag" class="imginput">
											</div>
										</div>
									</div>
								</div>
							
							</div>
						</div>	
					</div>
					
					<div class="tab-pane" id="navication">
						<div class="page-content-area">
							<div class="page-body" style="margin-top: 25px;">
							
								<input type="hidden" id="edit_mode" name="edit_mode" value="0">
								<input type="hidden" id="menu_id" name="menu_id" value="0">
									<div class="col-md-12">
										<label class="col-md-2 control-label" for="group_name">عنوان</label> 
										<div class="form-group col-md-5">
											<input type="text" name="onvan" id="onvan" class="form-control" >									
										</div>
									</div>
								
									<div class="col-md-12">
										<label  class="col-md-2 control-label" >Meta keyword</label>
										<div class="form-group col-md-5">
												<input type="text" value="<?=$meta_keyword?>" id="meta_keyword" name="meta_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
										</div>
												
									</div>
									<div class="col-md-12">	
										<div class="form-group">
											<label class="col-md-2 control-label" >Meta Description</label>
											<div class="form-group col-md-5">
												<textarea id="meta_desciption" name="meta_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?=$meta_desciption?></textarea>
											</div>
											
										</div>
									</div>
									<!--div class="col-lg-6 col-md-4 bttools">
										<div class="content">
											<button type="button" id="submit_form" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button>
											<script>
												$(document).on('click', '#submit_form', function() {
													var img = $('<img id="dynamic">'); 
													img.attr('src', 'waiting.gif');
													img.appendTo('.content');
													$("#menu1").submit();
												});
											</script>
							
										</div>
									</div-->
							</div>
						</div>
					</div>	
					
					<div class="tab-pane" id="SEO3">
						<div class="page-content-area">
							<div class="page-body" style="margin-top: 25px;">
								<!-- #section:ads/ads_cat.table -->
								<?//	
								$sql = "SELECT * FROM new_modules_cat WHERE parent_id='0' and type='$modual_type' and la='$manage_lang' ORDER BY rang";
								$result = $coms_conect->query($sql);
								echo "<div class='cf nestable-lists'>\n";
									echo "<div class='' id='nestableMenu'>\n\n";
										echo "<ol class='dd-list'>\n";
											  while($row = $result->fetch_assoc()) {
												echo "\n";
												$id=$row['id'];$str="";
												 $status=$row['status'];
												 if($status==1)
												 $str='checked';
												echo "<li class='dd-item' data-id='{$row['id']}'>";
													echo "<div class='dd-handle'> {$row['name']}";
														echo '	<div class="pull-right action-buttons">
																	 <a class="blue" href="#">
																	 <input '.$str.' id='.$id.' name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox"/>
																	 <span class="lbl"></span>
																	</a>
														
																	<a id='.$id.' class="edit_menu blue" href="#">
																	<span class="flaticon-note32 bigger-130"></span>
																	</a>';
															 	 	if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)){
																 	echo '<a id='.$id.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																 	<span class="flaticon-delete84 bigger-130"></span>
																 	</a>';
																 	}
															echo 	'</div>
														</div>';
													show_madules_cat($row['id'],$site_id,$manage_lang, $modual_type ,$coms_conect);
												echo "</li>\n";
											}
										echo "</ol>\n\n";
									echo "</div>\n";
								echo "</div>\n\n";
								//?><?//=$sql?>
								<!-- /section:ads/ads_cat.table -->
							</div>
						</div>
					</div>	
					
					<div class="tab-pane" id="slide">
						<div class="page-content-area">
							<div class="page-body" style="margin-top: 25px;">
								<div class="uploadbts" style="margin-top: 25px;">
									<a data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip"><button><span class="flaticon-add139"></span><span>افزودن ویژگی ها</span></button></a>
								</div>
								<?//	
								$sql = "SELECT * FROM new_modules_cat WHERE parent_id='0' and type='$modual_type' and la='$manage_lang' ORDER BY rang";
								$result = $coms_conect->query($sql);
								echo "<div class='cf nestable-lists'>\n";
									echo "<div class='' id='nestableMenu'>\n\n";
										echo "<ol class='dd-list'>\n";
											  while($row = $result->fetch_assoc()) {
												echo "\n";
												$id=$row['id'];$str="";
												 $status=$row['status'];
												 if($status==1)
												 $str='checked';
												echo "<li class='dd-item' data-id='{$row['id']}'>";
													echo "<div class='dd-handle'> {$row['name']}";
														echo '	<div class="pull-right action-buttons">
																	
																	<a id='.$id.' class="edit_menu blue" href="#">
																	<span class="flaticon-note32 bigger-130"></span>
																	</a>';
															 	 	if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)){
																 	echo '<a id='.$id.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																 	<span class="flaticon-delete84 bigger-130"></span>
																 	</a>';
																 	}
															echo 	'</div>
														</div>';
													show_madules_cat($row['id'],$site_id,$manage_lang, $modual_type ,$coms_conect);
												echo "</li>\n";
											}
										echo "</ol>\n\n";
									echo "</div>\n";
								echo "</div>\n\n";
								//?>
							</div>
						</div>
					</div>	
					
					<div class="tab-pane" role="tabpanel" id="gallery">
						<div class="page-content-area">
							<div class="page-body" style="margin-top: 25px;">
							<div class="sr-sms-advertisment">	
								<div class="sr-sms-settings-text">
									<p class="sr-sms-bshadow sr-sms-help">
										<i class="fa fa-question-circle" aria-hidden="true"></i> در این قسمت می توانید ویژگی های مختلف را در گروه های جداگانه دسته بندی کنید برای اطلاع بیشتر به قسمت آموزش مراجعه کنید</p>
								</div>
					
								<div class="sr-sms-settings-text">
									<h4 class="col-md-6 col-xs-12">
										انتخاب گروه
									</h4>
									<div class="sr-input col-md-6 col-xs-12">
										<div class="input-group">
											<input class="input-sm sr-input-2" type="text" id="">
											<span class="input-group-addon">
												<i class="fa fa-plus"></i>
											</span>
										</div>
									</div>
								</div>
								
								<div class="sr-sms-settings-text">
									  <form id="demoform" action="#" method="post">
										<select multiple="multiple" size="10" name="duallistbox_demo1[]">
										  <option value="option1">Option 1</option>
										  <option value="option2">Option 2</option>
										  <option value="option3" selected="selected">Option 3</option>
										  <option value="option4">Option 4</option>
										  <option value="option5">Option 5</option>
										  <option value="option6" selected="selected">Option 6</option>
										  <option value="option7">Option 7</option>
										  <option value="option8">Option 8</option>
										  <option value="option9">Option 9</option>
										  <option value="option0">Option 10</option>
										</select>
										<br>
										<button type="submit" class="btn btn-success btn-block">تایید</button>
									  </form>
									  <script>
										var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
										$("#demoform").submit(function() {
										  alert($('[name="duallistbox_demo1[]"]').val());
										  return false;
										});
									  </script>
								</div>
								
								<div class="sr-input col-md-6 col-xs-12">	
								<?//	
								$sql = "SELECT * FROM new_modules_cat WHERE parent_id='0' and type='$modual_type' and la='$manage_lang' ORDER BY rang";
								$result = $coms_conect->query($sql);
								echo "<div class='cf nestable-lists'>\n";
									echo "<div class='dd' id='nestableMenu' style='max-width: 400px;'>\n\n";
										echo "<ol class='dd-list'>\n";
											  while($row = $result->fetch_assoc()) {
												echo "\n";
												$id=$row['id'];$str="";
												 $status=$row['status'];
												 if($status==1)
												 $str='checked';
												echo "<li class='dd-item' data-id='{$row['id']}'>";
													echo "<div class='dd-handle'> {$row['name']}";
														echo '	<div class="pull-right action-buttons">
																	
																	<a id='.$id.' class="edit_menu blue" href="#">
																	<span class="flaticon-note32 bigger-130"></span>
																	</a>';
															 	 	if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)){
																 	echo '<a id='.$id.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																 	<span class="flaticon-delete84 bigger-130"></span>
																 	</a>';
																 	}
															echo 	'</div>
														</div>';
													show_madules_cat($row['id'],$site_id,$manage_lang, $modual_type ,$coms_conect);
												echo "</li>\n";
											}
										echo "</ol>\n\n";
									echo "</div>\n";
								echo "</div>\n\n";
								//?>
								</div>
							</div>
							
							</div>
						</div>
					</div>	
					
				</div>
			</div>
			</fieldset>
		</form>	
		</div>
	</div>	
</div>

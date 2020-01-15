<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<style>
.desm{display: inline-flex !important;}
</style>
<?$edit_id=injection_replace($_GET['edit_id']);?>
<script>
	$(document).ready(function(){
		// toggle delete show hide checkbox
		$("#drop4").hide();
		
		var boxes = $('input.conchkNumber');
		boxes.on('change', function () {
		  $('#drop4').toggleClass("desm", boxes.is(":checked"));
		});
		
		//  toggle panel add category
		<?if($edit_id==""){?>
		$('#cat-panel').hide();
		<?}?>
		$('#cat-click').click(function(){
			$('#cat-panel').toggle();
		});
	});	
</script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>

<script src="/yep_theme/default/rtl/js/menubar/madules_cat.js"></script>
<?
if(isset($_POST['edit_id']))
$edit_id=injection_replace($_POST['edit_id']);

$date=injection_replace($_POST['date']);
$status=injection_replace($_POST['status']);
$name=injection_replace($_POST['name']);
$meta_desciption=injection_replace($_POST['meta_desciption']);
$meta_keyword=injection_replace($_POST['meta_keyword']);
 
$manage_site_filter=injection_replace($_POST['manage_site']);
$manage_lang_filter=injection_replace($_POST['manage_lang']);

if($edit_id==''&&$name>""){ 
	$arr_slide=array('type'=>99,"meta_keyword"=>$meta_keyword,"meta_desciption"=>$meta_desciption,"status"=>$status,"la"=>$manage_lang_filter,"site"=>$manage_site_filter,"date"=>$now,"name"=>$name,"user_id"=>$_SESSION["manager_id"],"ip"=>$custom_ip);
	$id=insert_to_data_base($arr_slide,'new_modules_cat',$coms_conect);
	$query1="insert into new_cat_permission(menu_id,permission,group_id,view) 
	values ($id,1,1,1)";
	$coms_conect->query($query1);	
	array_push($_SESSION["manager_page_cat"],$id);
	show_msg('اطلاعات با موفقیت ثبت گردید');
 
}else if($edit_id>0&&$name>""){
	$condition="id=$edit_id";
	$arr_slide=array("meta_keyword"=>$meta_keyword,"meta_desciption"=>$meta_desciption,"status"=>$status,"la"=>$manage_lang_filter,"site"=>$manage_site_filter,"name"=>$name,"edit_user_id"=>$_SESSION["manager_id"],"edit_date"=>$now,"ip"=>$custom_ip);
	update_data_base($arr_slide,'new_modules_cat',$condition,$coms_conect);
	show_msg('اطلاعات با موفقیت ویرایش گردید');
}
$la="";$site="";
$faq_id='';
$name='';
$status='';
$meta_desciption='';
$meta_keyword='';

if($edit_id>0){
	
	$query="SELECT * FROM new_modules_cat where id='$edit_id'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$date=miladitojalaliuser(date('Y-m-d',$row['date']));
	$cat_name=$row['name'];	
	$status=$row['status'];	
	$la=$row['la'];	
	$site=$row['site'];	
	$meta_keyword=$row['meta_keyword'];	
	$meta_desciption=$row['meta_desciption'];	
	$faq_id=$row['id'];	
}	
if($la=="")
$la=$manage_lang_filter;

if($site=="")
$site=$manage_site_filter;
?>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading"><?=$c_Poll_del?></h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> <?=$new_del_content_confidence?></div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok"  data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$ads_AdsList_no?></button>
		</div>
	</div>
	</div>
</div></fieldset>
</br>	
<div class="tabbable">
	
	<div class="msheet tab-content">
		<div class="secfhead">
			<!-- #section:tools/q_a_cat.head -->
			<div class="sectitle">
			<div class="icon"><span class="flaticon-file23" style=""></span></div>
			<div class="title"><p class="titr">دسته بندی پرسش و پاسخ</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:tools/q_a_cat.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>
		</div>
		
		<br>
		<div class="tab-pane active" id="tab1">
			<div id="id-message-new-navbar" class="message-navbar clearfix">
				<a href="newcoms.php?yep=new_faq_cat" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
					<span class="flaticon-left-arrow9">
					</span>
				</a>
			</div>
			
			<fieldset style="margin: 80px 120px 0px 120px;">
			<div class="uploadbts"> 
				<p><a data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip" id="cat-click"><button><span class="flaticon-add139"></span><span>افزودن دسته بندی جدید</span></button></a></p>
				
				<div class="panel panel-default" id="cat-panel">
					<div class="panel-heading">
					<form method="post" id="catnew" class="form-horizontal" data-fv-framework="bootstrap">
					<input type="hidden" id="edit_id" name="edit_id" value="<?=$faq_id?>">
						<br> 
						<div class="form-group row">
							<label class="col-sm-4 control-label" style="text-align: center;"><?=$dl_site?></label>
							<select id="manage_site" name="manage_site" class="form-group col-md-5">
								<?$query="select title,name from new_subsite where status=1";
									$result = $coms_conect->query($query);
										while($RS1 = $result->fetch_assoc()) {
											$name=$RS1['name'];
											$temp="";
											if($site==$name)
											$temp="selected";
											if(in_array($name,$_SESSION['manager_title_site']))  
											echo "<option value='$name' $temp >$name</option>";
									}
								?>
							</select>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-4 control-label" style="text-align: center;"><?=$s_home_language?></label>
							<select id="manage_lang" name="manage_lang" class="form-group col-md-5">
								<?$query="select title,name from new_language where status=1";
									$result = $coms_conect->query($query);
										while($RS1 = $result->fetch_assoc()) {
										$title=$RS1['title'];
											$name=$RS1['name'];
											$temp="";
											if($la==$title)
											$temp="selected";
											if(in_array($title,$_SESSION['manager_title_lang']))
											echo "<option value='$title' $temp>$name</option>";
									}
								?>
							</select>
						</div>
						 
						<div class="form-group row">
							<label class="col-sm-4 control-label" style="text-align: center;">نام دسته بندی *</label>
							<div class="form-group col-md-5 no-padding">
								<input class="form-control" type="text" name="name" value="<?=$cat_name?>"
									data-fv-notempty="true"
									data-fv-notempty-message="پر کردن اين فيلد الزامي است" />
							</div>
						</div>
						
						<div class="form-group row">
							<label class="col-sm-4 control-label" style="text-align: center;">Meta keyword</label>
							<div class="form-group col-md-5 no-padding">
									<input type="text" value="<?=$meta_keyword?>" id="meta_keyword" name="meta_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-4 control-label" style="text-align: center;">Meta Description</label>
							<div class="form-group col-md-5 no-padding">
								<textarea id="meta_desciption" name="meta_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?=$meta_desciption?></textarea>
							</div>
						</div>
					 							<input type="hidden" id="check_value" name="check_value" value="0">		
						
						
						
						<div class="form-group row">
							<label class="col-sm-4 control-label" style="text-align: center;">وضعیت</label>
							<select id="status" name="status" class="form-group col-md-5">
								<option value="1" <?if($status==1) echo 'selected';?>>فعال</option>
								<option value="0" <?if($status==0) echo 'selected';?>>غیر فعال</option>
							</select>
						</div>
						
						<div class=" col-md-5 col-md-offset-4">
							<button type="submit" id="submit_page" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i> ذخیره</button>
						</div>
						<br><br>
					</form>
					</div>
				</div>
				
				<div class="col-md-12">
					<div class="col-md-6 text-right"><a style="font-size: 18px;">دسته بندی های ساخته شده</a></div>	
					<div class="col-md-6 text-left">
						<!--a href="#" id="" class="delete red" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 18px !important;margin: 0 5px 0 5px;">
							<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
						</a-->
					</div>
				</div>
				
				<div class="col-md-12"><hr style="margin:5px 0 10px 0"></div> 
				
				
					<div class="">
						<div class="col-md-10">
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 5px;margin-left: 0px;top: 2px;left: 5px;">
								<span class="sr-only">Toggle navigation</span>
								<span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<?if($_SESSION["can_delete"]==1){ ?>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="margin-left: 0px;margin-right: -5px;border-radius: 5px;">
										حذف 
										</a>
									</ul>
								</div>	
								<?}?>
							</div>
						<?$manager_filter=injection_replace($_GET['manager_filter']);
								if($manager_filter=='')
									$manager_filter=$_SESSION["manager_id"];
								$q=injection_replace($_GET['q']);
								$site_filter=injection_replace($_GET['site_filter']);
								$lang_filter=injection_replace($_GET['lang_filter']); 
								if($lang_filter==""&&$_SESSION['lang_filter']=='')
									$lang_filter=$_SESSION['page_languege'];
								 
								?>	<input name='cat_url' id='cat_id' value='<?=$url?>' type="hidden">
									<div class="form-group yepco">
										<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
											<input type="hidden" name="yep"  value="new_faq_cat">
											<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
											<input type="hidden" name="site_filter" value="<?=$site_filter?>">
											<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
											<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
										
											
										</form>	
									
	 
	 

				
										<div class="pull-right btn-default btn-xs yepco">
											<?if ($site_filter>"")
												$_SESSION['site_filter']=$site_filter;
											create_sub_site_filter_none($_SESSION['site_filter'],$coms_conect,$_SESSION['manager_title_site'])?>
										</div>
									<?if ($lang_filter>"")
												$_SESSION['lang_filter']=$lang_filter;
										else 
											$lang_filter=$_SESSION['lang_filter'];?>
										<div class="pull-right btn-default btn-xs yepco">
											<?if ($lang_filter>"")
												$_SESSION['lang_filter']=$lang_filter;
												create_lang_filter_none($_SESSION['lang_filter'],$coms_conect,$_SESSION["manager_title_lang"])?>
										</div>
									<div class="pull-right btn-default btn-xs yepco">
											<?if ($manager_filter>"")
												$_SESSION['manager_filter']=$manager_filter;
											create_manager_filter_none ($_SESSION['manager_filter'],$coms_conect,$_SESSION["manager_user_permisson"])?>
										</div>
								</div>
						</div>
					</div>
				
					
					<?$site_filter='main';
					$lang_filter='fa'; 
					$sql_str='';
					$manager_filter=1;
					if($_GET['site_filter']>"")
						$site_filter=injection_replace($_GET['site_filter']);
						
					if($_GET['lang_filter']>"")
						$lang_filter=injection_replace($_GET['lang_filter']);
					
					if($_GET['manager_filter']>"")
						$manager_filter=injection_replace($_GET['manager_filter']);					
					if($_GET['q']>"")
						$sql_str=" and (name like '%$q%' or  meta_desciption like '%$q%' or  meta_keyword like '%$q%' )";
					
								//$sql = "SELECT * FROM new_modules_cat WHERE   site='$site_filter' $sql_str and type=99 and la='$lang_filter' and user_id=$manager_filter";
											 	
								$sql = "SELECT * FROM new_modules_cat a,new_cat_permission b  WHERE    b.permission=1 $sql_str  and  a.id=b.menu_id and a.parent_id='0' and b.group_id={$_SESSION["manager_group_id"]} and a.type='99' and a.la='$lang_filter' ORDER BY a.rang";
								// echo $sql;exit;
								$result = $coms_conect->query($sql);
								echo "<div class='cf nestable-lists col-md-12'>\n";
									echo "<div class='dd' id='nestableMenu'>\n\n";
										echo "<ol class='dd-list'>\n";
											  while($row = $result->fetch_assoc()) {
												echo "\n";
												$id=$row['id'];$str="";
												 $status=$row['status'];
												 $name=insert_dash($row['name']);
												 if($status==1)
												 $str='checked';
												echo "<li class='dd-item dd-nodrag' data-id='{$row['id']}'>";
													echo "<div class='dd-handle'><a class='sr-pull-right' target='_blank' href="."/faq/$lang_filter/cat_id/$id"."> {$row['name']}</a>";
														echo '	<div class="pull-right action-buttons">';
																	if($_SESSION["can_edit"]==1){ 
 																	echo '<a class="blue" href="#">
																	 <input '.$str.' id='.$id.' name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox"/>
																	 <span class="lbl"></span>
																	</a>';
																	
																	echo '<a id='.$id.' class="edit_menu blue" href="#">
																	<span class="flaticon-note32 bigger-130"></span>
																	</a>';
																	}
															 	 	if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)&&$_SESSION["can_delete"]==1){
																 	echo '<a id='.$id.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																 	<span class="flaticon-delete84 bigger-130"></span>
																 	</a>';
																 	}
															echo 	'</div>
														</div>';
													 show_madules_cat($row['id'],$row['site'],$lang_filter, 99 ,$coms_conect,$modul_name);
												echo "</li>\n";
											}
										echo "</ol>\n\n";
									echo "</div>\n";
								echo "</div>\n\n";
								//?><?//=$sql?>
												
					
			</div>
			<textarea id="nestable1-output" style="display:none"></textarea>
			</fieldset>
			<!-- /section:news/newstext.relate -->	
			
		</div>	
		
	</div> 
</div>	

<?$_SESSION["del_item"]='del_slide_show';?>
<script src="ajax_js/page_cat.js"></script>	
<script type="text/javascript">
	
	$(document).ready(function() {
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
	
	});
</script>

<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>

<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script> 	 

<?if($_SESSION["can_edit"]==1){ ?>
<script>
   $(document).ready(function()
   
	{ //formvalidation 
	$('#catnew').formValidation();
	
	//nestable list 	
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
		// activate Nestable for list 1
		$('#nestableMenu').nestable({
			group: 1,
			maxDepth: 7,
		})
		.on('change', updateOutput);
		
		// output initial serialised data
		updateOutput($('#nestableMenu').data('output', $('#nestable1-output')));   
		
		
		jQuery(function($){
	
			$('.dd').nestable();
		
			$('.dd-handle a').on('mousedown', function(e){
				e.stopPropagation();
			});
			
			$('[data-rel="tooltip"]').tooltip();
		
		});
		//end nestable list
	});
</script>

<?}?>
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
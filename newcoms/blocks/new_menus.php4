<?$lang_filter=injection_replace($_GET['lang_filter']);
$query1="select align  from new_language where title='$lang_filter'";$str='';
$result1 = $coms_conect->query($query1);
$RS11 = $result1->fetch_assoc();

if($RS11['align']==0) $dir='rtl';else $dir ='ltr';

##################چک کردن زبان#######################
$la=injection_replace($_POST['manage_lang_filter']);
 
if(($lang_filter>""&&!in_array($lang_filter,$_SESSION["manager_title_lang"]))||($la>""&&!in_array($la,$_SESSION["manager_title_lang"]))){
	//echo $_POST['manage_lang_filter'].'<br>'.$lang_filter.'<br>';print_r($_SESSION["manager_title_lang"]);exit;
	header('Location: new_manager_signout.php');
	exit;
}
if($lang_filter=='')$lang_filter='fa';
#########################چک کردن زیر سایت#############
$site_id=injection_replace($_POST['manage_site_filter']);
$site_filter=injection_replace($_GET['site_filter']);
if(($site_id>""&&!in_array($site_id,$_SESSION["manager_title_site"]))||($site_filter>""&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
header('Location: new_manager_signout.php');
exit;
}
if($site_filter=='')$site_filter='main';

$onvan=injection_replace($_POST['onvan']);
$type=injection_replace($_POST['type']);
$menu_id=injection_replace($_POST['menu_id']);
$edit_mode=injection_replace($_POST['edit_mode']);
$link=injection_replace($_POST['link']);
$show_open=injection_replace($_POST['show_open']);

$page_id=0;	
if($show_open!=1)
$show_open=0;
if($site_filter=='main')$domain=$_SERVER['HTTP_HOST'];else $domain="$site_filter.{$_SERVER['SERVER_NAME']}";
if($type==1){
	$static_page=injection_replace($_POST['static_page']);
		if($static_page==0)
		$link="/UnderConstruction.php";	
	else if($static_page>""){
		$sql="SELECT site,la,name,title,id FROM new_static_page where id=$static_page";
		$result = $coms_conect->query($sql);
		$row = $result->fetch_assoc();
		
		$page_title	=insert_dash($row['title']);
		$page_id=$row['id'];
		$link="http://$domain/{$row['name']}/{$row['la']}/$page_title";	
	}
}	
$daynamic=injection_replace($_POST['daynamic']);
$modual_cat=injection_replace($_POST['modual_cat']);
if($type==3&&$daynamic=='contact_us'){
		$page_id=$daynamic;
		$link="http://$domain/contact_us/$lang_filter";	
}else if($type==3&&$daynamic=='register'){
		$page_id=$daynamic;
		$link="http://$domain/register/$lang_filter";	
}else if($type==3&&$daynamic=='login'){
	$page_id=$daynamic;
	$link="http://$domain/login/$lang_filter";	
}else if($type==3){
	$page_id=$daynamic;
	if($modual_cat==0)
	$link="http://$domain/$daynamic/$lang_filter";	
else
	$link="http://$domain/$daynamic/$lang_filter/cat_id/$modual_cat";	
}	
###########################پیوند###################################
if(($onvan)>""&&$edit_mode==0&&$_SESSION["can_add"]){
	$sql="SELECT id FROM new_menu ORDER BY id DESC LIMIT 1";
	$result = $coms_conect->query($sql);
	$row = $result->fetch_assoc();
	
	$id=$row['id'];
	$id++;
	$unic_id=time();
	$query1="insert into new_menu(float_menu,page_id,name,rang,link,target,type,date,user_id,ip,la,site_id,unic_id) 
	values (1,'$page_id','$onvan',$id,'$link',$show_open,$type,NOW(),$manager_id,'$custom_ip','$la','$site_id','$unic_id')";
	$coms_conect->query($query1);
		show_msg('اطلاعات با موفقیت اضافه گردید');
}else 	if(($onvan)>""&&$edit_mode==1&&$_SESSION["can_edit"]){
	$query1="update new_menu set type=$type,page_id='$page_id',target=$show_open,name='$onvan',link='$link',edit_date=NOW(),edit_user_id='$manager_id',edit_ip='$custom_ip' where unic_id='$menu_id'"; 
	$coms_conect->query($query1);
	show_msg('اطلاعات با موفقیت ویرایش گردید');
}	
?>
	<script src="/yep_theme/default/rtl/js/menubar/functions.js"></script>
	<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
	<script src="/yep_theme/default/rtl/js/select2.js"></script>
	
<script type="text/javascript">
 $(document).ready(function() {
    $('#static_page').select2({
        data: [
				<?
				$query="select id,name,title from new_static_page where la='$lang_filter' and site='$site_filter'";$i=0;
				$result = $coms_conect->query($query);
				echo '{'.'id'.':0,' .'text'.':'."'در دست ساخت'"."}";
					while($RS1 = $result->fetch_assoc()) {
					$id=$RS1["id"];
					$name=$RS1["name"].' ( '.$RS1["title"].' ) ';
	  				echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
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

<script>
$(document).ready(function(){
	
 hideAllDivs = function () {
    $("#add_temp").hide();
    $("#add_temp2").hide();
    $("#add_temp3").hide();
    $("#add_temp4").hide();
    $("#add_temp5").hide();
    $("#add_temp6").hide();
    $("#add_temp30").hide();
};

handleNewSelection = function () {

    hideAllDivs();
    
    switch ($(this).val()) {
        case '1':
            $("#add_temp").show();
        break;
        case '2':
            $("#add_temp2").show();
        break;
        case '3':
            $("#add_temp3").show();
        break;
        case '4':
            $("#add_temp4").show();
        break;
        case '5':
            $("#add_temp5").show();
        break;
        case '6':
            $("#add_temp6").show();
        break;
    }
};

$(document).ready(function() {
    
    $("#type").change(handleNewSelection);
    
    // Run the event handler once now to ensure everything is as it should be
    handleNewSelection.apply($("#type"));
    
});
});
</script>


<form class="form-horizontal" id="menubar" name="menubar" action="" role="form" method="post" enctype="multipart/form-data">	
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
			<input type="hidden" name="del_menu_btn" id="del_menu_btn">
			<button type="button" id="btn_ok" value="" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
		</div>
	</div>
	</div>
</div>
</form>

<div class="tabbable">
	<!--ul class="nav nav-tabs">
		<li class="active"><a href="#tab3" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i>منو آبشاری</a></li>
	</ul-->
		
	<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:blocks/menus.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">منو آبشاری</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:blocks/menus.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
		<div class="tab-pane active" id="tab3">
			
				<form id="menu1" name="menu1" action="" role="form" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group col-md-6">
								<?create_sub_site_filter($site_filter,$coms_conect,$_SESSION['manager_title_site'])?>
							</div>
							<div class="form-group col-md-6">
								<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
							</div>
						</div>
						<div class="col-md-6"></div>
					</div>
								
					<div class="row"> 
							
							<div class="col-md-12">
								<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">منو</h3>
									</div>
									
									<div class="panel-body">
										<input type="hidden" id="edit_mode" name="edit_mode" value="0">
										<input type="hidden" id="menu_id" name="menu_id" value="0">
										<!-- #section:blocks/menus.menu -->
											<div class="form-group row">
												<label class="col-md-1 control-label" for="group_name">عنوان</label> 
												<div class="form-group col-md-6">
													<input type="text" name="onvan" id="onvan" class="form-control" >									
												</div>
											</div>
											
											<div class="form-group row">
												<label class="col-md-1 control-label" for="family">محتوا</label> 
												<div class="form-group col-md-6">
													<select name="type" id="type" class="form-control" rows="3">
														<option value="">انتخاب کنيد</option> 
														<option value="1">ليست صفحات داخلي</option> 
														<option value="2">پيوند</option>
														<option value="3">دايناميک</option>
														<!--option value="4">فرم های آنلاین</option-->
													</select>
												</div>
											</div>
										
											<div class="form-group row" id="add_temp">
												<label class="col-md-1 control-label">ليست صفحات</label> 
												<div class="form-group col-md-6">
													<input name='static_page'  type="text" id="static_page"   autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default" placeholder="صفحات مورد نظر خود را انتخاب کنيد" style="width: 100%; ">									
												</div>
											</div>

											<div class="form-group row" id="add_temp2">
												<label class="col-md-1 control-label" for="family">پيوند</label> 
												<div class="form-group col-md-6">
													<input type="text" name="link" id="link" class="form-control" placeholder="http://sample.com/" style="direction: ltr;">
												</div>
											</div>
										
											<div class="form-group row" id="add_temp3">
												<label class="col-md-1 control-label" for="family">دايناميک</label> 
												<div class="form-group col-md-6">
													<select name="daynamic" id="daynamic" class="form-control" rows="3">
														 <option value="login">صفحه ورود</option> 
														 <option value="register">صفحه ثبت نام</option> 
														 <option value="contact_us">تماس با ما</option> 
														 <!--option value="2">پرسش و پاسخ</option>
														 <option value="2">سوالات متداول</option-->
														 <? $query="select link,name from new_modules where status='0'";
														  $result = $coms_conect->query($query);
														  while($RS1 = $result->fetch_assoc()) {
																 echo "<option value='{$RS1['link']}'>{$RS1['name']}</option> "; 
														  }?>
													</select>
												</div>
											</div>
										<div id="file_name_div"></div>
											<div class="form-group row">
												<div class="form-group col-md-1"></div>
												<label style="margin-right: 2%;">
													<input value="1" name="show_open" id="show_open" type="checkbox"> باز کردن در پنجره جديد 
												</label>
											</div>
										<!-- /section:blocks/menus.menu -->
									</div>
									
									<div class="panel-footer bttools">
										<button type="submit" id="submit_page" class="btn btn-success" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
										<!--button type="button" onclick="location.href = '<?=$custom_url?>';" class="btn btn-primary"><span class="flaticon-add149"></span><span>جدید</span></button-->
									</div>
								</form>
								</div>	
							</div>
    

<div src="" id='sortDBfeedback'></div>
						
						<div class="col-md-12">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">مرتب سازی منو</h3>
								</div>
								
								<div class="panel-body">
								<!-- #section:blocks/menus.table -->
								<?$sql = "SELECT status,unic_id,id,name FROM new_menu WHERE parent_id='0' and site_id='$site_filter' and float_menu=1 and la='$lang_filter' ORDER BY rang";
								$result = $coms_conect->query($sql);
								echo "<div class='cf nestable-lists'>\n";
									echo "<div class='dd' id='nestableMenu'>\n\n";
										echo "<ol class='dd-list'>\n";
											    while($row = $result->fetch_assoc()) {
												$str="";$status=$row['status'];	if($status==1)$str='checked';
												echo "\n";
												$id=$row['unic_id'];
												$ide=$row['id'];
												
												echo "<li class='dd-item dd-nodrag' data-id='{$row['id']}'>";
													echo "<div class='dd-handle'> <a target='_blank' href='{$row['link']}'>{$row['name']}</a>";
														echo '	<div class="pull-right action-buttons">
																<a class="blue" href="javascript:void(0)">
																	<input '.$str.' id='.$id.' name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox"/>
																	<span class="lbl"></span>
																	</a>';
																	if($_SESSION["can_edit"]==1){
																	echo '<a id='.$id.' class="edit_menu blue" href="#">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>';
																	}if($_SESSION["can_delete"]==1){ 
																	echo '<a id='.$id.' value="'.$ide.'" class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	</a>';
																	}
																echo '</div>
														</div>';
													menu_showNested(1,$row['id'],$site_filter,$lang_filter,$coms_conect);
												echo "</li>\n";
											}
										echo "</ol>\n\n";
									echo "</div>\n";
								echo "</div>\n\n";
								 
								//?>
								<!-- /section:blocks/menus.table -->
							</div>		
						</div>
						<textarea id="nestable1-output" style="display:none"></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<script  src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
	
  
<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script> 	 
<script>
$("#manage_lang").change(function () {	
	$("#onvan").val('');
	$("#menu1").submit();
});	
</script>
<?$_SESSION["del_item"]='del_new_menu';
$_SESSION["edit_secend_item"]='edit_new_manebar';
$_SESSION["edit_item"]='edit_new_menu';?>
<script src="ajax_js/float_menu_bar.js"></script>	
	<script>	 
   	$("#daynamic").change(function () {
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=change_menu_module&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&secend_value="+$("#manage_lang_filter").val(),
			success: function(result){
				$("#file_name_div").html(result);
			}
		});	
 	 });
	$(document).ready(function()
	{
	$('#menu1').formValidation({
        framework: 'bootstrap',
        fields: {
            onvan: {
                validators: {
                    notEmpty: {
						message: 'پر کردن اين فيلد الزامي است'
                    }
                }
            },
			type: {
                validators: {
                    notEmpty: {
						message: 'پر کردن اين فيلد الزامي است'
                    }
                }
            }
        }
    });
		
		
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
		
	});
	</script>
<script>
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
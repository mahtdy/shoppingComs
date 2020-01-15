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
<?$edit_mode=injection_replace($_POST['edit_mode']);
$edit_id=injection_replace($_GET['edit_id']);
$start_date=injection_replace($_POST['start_date']);
$finish_date=injection_replace($_POST['finish_date']);
$slide_title=injection_replace($_POST['slide_title']);
$link=injection_replace($_POST['link']);
$text1=injection_replace($_POST['text1']);
$text2=injection_replace($_POST['text2']);
$text3=injection_replace($_POST['text3']);
$slide_img1=injection_replace($_POST['slide_img1']);
$slide_img2=injection_replace($_POST['slide_img2']);
if($_GET['site_filter']>"")
$manage_site_filter=injection_replace($_GET['site_filter']);
else
$manage_site_filter=injection_replace($_POST['manage_site_filter']);
if($_GET['lang_filter']>"")
$manage_lang_filter=injection_replace($_GET['lang_filter']);
else
$manage_lang_filter=injection_replace($_POST['manage_lang_filter']);


if($edit_mode==''&&$slide_img1>""){
 
	$arr_slide=array('link'=>$link,"la"=>$manage_lang_filter,"site"=>$manage_site_filter,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>0 ,"edit_user_id"=>$edit_user_id,"edit_date"=>$edit_date,"ip"=>$custom_ip);
	insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
}else if($edit_mode>0&&$slide_img1>""){
	$condition="id=$edit_mode";
	$arr_slide=array('link'=>$link,"la"=>$manage_lang_filter,"site"=>$manage_site_filter,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode  ,"edit_user_id"=>$edit_user_id,"edit_date"=>$edit_date,"ip"=>$custom_ip);
	update_data_base($arr_slide,'new_slideshow',$condition,$coms_conect);
}
$la="";$site="";
if($edit_id>0){
	#Query from new_slideshow
	$query="SELECT * FROM new_slideshow where id='$edit_id'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$start_date=miladitojalaliuser(date('Y-m-d',$row['start_date']));
	$finish_date=miladitojalaliuser(date('Y-m-d',$row['finish_date']));
	$slide_title=$row['title'];
	$link=$row['link'];
	$text1=$row['text1'];
	$text2=$row['text2'];
	$text3=$row['text3'];	
	$slide_img1=$row['slide_img1'];	
	$slide_img2=$row['slide_img2'];	
	$la=$row['la'];	
	$site=$row['site'];	
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
<form class="form-horizontal" id="delete_table" name="delete_table" action="" role="form" method="post" enctype="multipart/form-data"><fieldset>

	<!--ul class="nav nav-tabs">
		<li class="active"><a href="#add_templates" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?=$new_sysmenu[130]?> </a></li>
	</ul-->	

	<input type="hidden" name="edit_mode" id="edit_mode" value="<?=$edit_id?>">	
	<div class="msheet tab-content">
		
		<div class="secfhead">

		<div class="sectitle">
			<div class="icon"><span class="flaticon-file23" style=""></span></div>
			<div class="title"><p class="titr">مدیریت اسلاید شو</p><p class="lead">توضیحات این بخش</p></div>
		</div>

		<div class="toolmenu">
			<ul>
				<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				<li id="newpag" class="addicon">
					<a href="#add_templates" data-toggle="tab" data-placement="bottom" title="اسلاید شو جدید" >
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
		
		<div class="tab-pane <?if($edit_id=="") echo 'active'?>" id="tab1" style="background-color: #EFF3F8;">
				<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th><?=$sd_Shop_billing_row?></th>
							<th><?=$sd_shop_shipping_title?></th>
							<th><?=$new_date_end_view?></th>
							<th><?=$dl_site?></th>
							
							<th><?=$new_sysmenu[2]?></th>
						</tr>
					</thead>
					<tbody>
						<?if($la=='')$la=$default_lang;
						if($site=='')$site=$default_site;
						$query="SELECT * FROM new_slideshow where la='$la' and site='$site'";
						$result = $coms_conect->query($query);
						$i=1;
						while($RS1 = $result->fetch_assoc()) {
							$id=$RS1["id"];$la=$RS1["la"];
							$type=$RS1["type"];
							$madual=get_madules($type);							
							$finish_date=$RS1["finish_date"];
							$page_id=$RS1["page_id"];
							?>
							<tr>
								
								<td><?=$i;?></td>
								<td><a href="<?=$RS1['link']?>" target="_blank"><?=$RS1["title"]?></a></td>
								<td><?=miladitojalaliuser(date('Y-m-d',$RS1["finish_date"]))?></td>
								<td><?=$RS1["site"]?></td>
								<td>
									<a id="<?=$id?>" class="edit_menu blue"  href="newcoms.php?yep=new_Slideshow&edit_id=<?=$id?>" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-edit bigger-120" title="<?=$sd_shop_shipping_edit?>"></i>
									</a>
									<a href="#" id="<?=$id?>" class="red del_menu" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120" title="<?=$l_delete?>"></i>
									</a>
								</td>
							</tr>
							<?$i++;}?>
					</tbody>
				</table>
			</div>	
		
		<div id="add_templates" class="tab-pane <?if($edit_id ) echo 'active'?>">
			<form class="form-horizontal" action="" method="post" name="pasafhe" id="pasafhe" role="form" enctype="multipart/form-data">
				
					<div id="id-message-new-navbar" class="message-navbar clearfix">
					<input type='submit'  id='submit_btn' style='display:none'>
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
				<div class="panel-body" id="SEO4">
					
					<div class="row"><label class="col-md-2" style="text-align: -webkit-left;">زیرسایت</label>
						<div class="col-md-3 form-group">
							<?create_sub_site_filter($site,$coms_conect,$_SESSION['manager_title_site'])?>
						</div><label class="col-sm-1" style="width: 0px;"></label>
						<div class="col-md-3 form-group">
							<?create_lang_filter($la,$coms_conect,$_SESSION["manager_title_lang"])?>
						</div>
					</div>
				
					<div class="form-group">
						<label class="col-md-2 control-label" for="family"><?=$ads_AdsNew_pic?> <?=$new_first?> *</label>
						<div class="form-group col-md-8">
							<div class="input-group">
								<input type="text" class="form-control" value="<?=$slide_img1?>" id="slide_img1" name="slide_img1">
								<div class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=1&amp;field_id=slide_img1" class="btn iframe-btn" style="margin: auto;border-radius: 0px;bottom: 1px;height: 32px;">انتخاب</a></div>
							</div>
							<!--div class="input-group">
							<input type="text" class="form-control" value="<?=$slide_img1?>" id="slide_img1" name="slide_img1">
							<span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=1&amp;field_id=slide_img1" class="btn iframe-btn" style="margin: auto;border-radius: 0px;bottom: 1px;height: 32px;">انتخاب</a></span>
							</div-->
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label" for="family"><?=$ads_AdsNew_pic?> <?=$new_second?></label>
						<div class="form-group col-md-8">
							<div class="input-group">
							<input type="text" class="form-control" value="<?=$slide_img2?>" id="slide_img2" name="slide_img2">
							<span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=1&amp;field_id=slide_img2" class="btn iframe-btn" style="margin: auto;border-radius: 0px;bottom: 1px;height: 32px;">انتخاب</a></span>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-2 control-label" for="family"><?=$dl_date?> <?=$pro_namayesh?> *</label>
						<div class="form-group col-md-4">
							<div class="input-group input-append date">
								<input type="text" class="form-control datepicker" name="start_date" value="<?=$start_date?>" id="start_date" placeholder="شروع نمایش"/>
								<span class="input-group-addon"><i class="glyphicon glyphicon-transfer"></i></span>
							</div>
						</div>	
						<div class="input-group input-append date col-md-4">
							<input type="text" class="form-control datepicker" name="finish_date" value="<?=$finish_date?>" id="finish_date" placeholder="پایان نمایش"/>
						</div>
							
						
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="family"><?=$Ads_List_link?> *</label>
						<div class="form-group col-md-8">
							
							<input type="text" class="form-control"  value="<?=$link?>"  id="link" name="link" placeholder="http://sample.com" style="direction: ltr;">
							
						 
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="family"><?=$new_slide_title?> *</label>
						<div class="form-group col-md-8">
						
							<textarea type="text" class="form-control" name="slide_title" rows="3"><?=$slide_title?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="family"><?=$dl_tozihat?> 1</label>
						<div class="form-group col-md-8">
						
							<textarea type="text" class="form-control" name="text1" rows="3"><?=$text1?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="family"><?=$dl_tozihat?> 2</label>
						
						<div class="form-group col-md-8">
							<textarea type="text" class="form-control" name="text2" rows="3"><?=$text2?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label" for="family"><?=$dl_tozihat?> 3</label>
						
						<div class="form-group col-md-8">
							<textarea type="text" class="form-control" name="text3" rows="3"><?=$text3?></textarea>
						</div>
					</div>
					
				</div>
				<div class="panel-footer bttools">
					<button type="submit" id="submit_page" class="btn btn-success"><span class="flaticon-verified9"></span><?=$pro_save?></button>
					<button type="button" onclick="window.location.href = 'newcoms.php?yep=new_Slideshow'" class="btn btn-primary"><span class="flaticon-left-arrow9"></span><?=$l_back?></button>
				</div>
			</form>
			
		</div>
		
			
		
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


<?$_SESSION["del_item"]='del_slide_show';?>
<script type="text/javascript">
				 
						$(function () {
	 							$(".submit2").click(function(){
								$("#status").val("1");
								$("#submit_btn").click();
							});
						});
				 

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
	
		$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});
		
	});
$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});
	$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_slide_show&id="+$(this).val(),
				success: function(result){
				//alert(result);
					window.location.href = "newcoms.php?yep=new_Slideshow";
				}
			});		
		});	
	
</script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>

<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>

<script>
$(document).ready(function() {
		
		$("#start_date").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "mm/dd/yy",
			// Called when a date is selected.
			// See http://api.jqueryui.com/datepicker/#option-onSelect
			onSelect: function(date, inst) {
				// Revalidate the start date field
				$('#delete_table').formValidation('revalidateField', 'start_date');
			}
		});

		// finish_date
		$("#finish_date").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "mm/dd/yy",
			
			onSelect: function(date, inst) {
				// Revalidate the start date field
				$('#delete_table').formValidation('revalidateField', 'finish_date');
			}
		});
		
    $('#delete_table').formValidation({
            framework: 'bootstrap',
            icon: {
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                slide_img1: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        }
                    }
                },
                start_date: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        },
                
                    }
                },
                finish_date: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        },
                      
                    }
                },
                link: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        },
						uri:{
							message: 'لطفا url سایت را مطابق فرمت نشان داده شده وارد نمایید'
						}
                    }
                },
                slide_title: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        }
                    }
                }
            }
        })
		.on('success.field.fv', function(e, data) {
            if (data.field === 'start_date' && !data.fv.isValidField('finish_date')) {
                // We need to revalidate the end date
                data.fv.revalidateField('finish_date');
            }

            if (data.field === 'finish_date' && !data.fv.isValidField('start_date')) {
                // We need to revalidate the start date
                data.fv.revalidateField('start_date');
            }
        });
});
</script>
		
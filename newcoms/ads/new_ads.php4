<?$_SESSION["modual_type"]=18?>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
	<link rel="stylesheet" href="/new_plugin/video-js/css/video-js.min.css">
<!-- page specific plugin scripts -->
<!--script src="/assets/js/fuelux/data/fuelux.tree-sample-demo-data.js"></script-->
<script src="/yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<!--[if lt IE 9]><script src="/js/jsTree/respond.js"></script><![endif]-->
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/jasny-input/jasny-bootstrap.min.css" />
<script src="/yep_theme/default/rtl/js/jasny-input/jasny-bootstrap.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/daterangepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/date-time/daterangepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
    $('#cat_filter').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=18";
				$result = $coms_conect->query($query);
				$i=0;
				while($RS1=$result->fetch_assoc()){
					$id=$RS1["id"];
					$name=$RS1["name"];
					if(in_array($id,$_SESSION['manager_page_cat'])){
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
</script>
<script type="text/javascript">
 $(document).ready(function() {
    $('#meta_label').select2({
        data: [
				<?
				$query="select id,key_count,name from new_keyword where la='fa'";
				$result = $coms_conect->query($query);
				$i=0;
				while($RS1=$result->fetch_assoc()){
					$id=$RS1["id"];
				$name=$RS1["name"].'('.$RS1["key_count"].')';
							if($i==0)
						echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						else
						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						$i++;
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
</script>
<div id="seo_ajax"></div>
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
	
		$(document).on('click', '#close_video_modual', function() {
				$("#show_add_video_modual").attr('src','');
				$("#example_video_1 video")[0].load();
		});		
	
	
</script>
<div id="sortDBfeedback"></div>
<?###چک کردن مدیر
$edit_id=injection_replace($_GET['edit_id']);
$edit_mode=injection_replace($_POST['edit_mode']);
$city=injection_replace($_POST['city']);
$email=injection_replace($_POST['email']);
$status=injection_replace($_POST['status']);
$title=injection_replace($_POST['title']);
$price=injection_replace($_POST['price']);
$can_comment=injection_replace($_POST['can_comment']);
$manage_site=injection_replace($_POST['manage_site']);
$mobile=injection_replace($_POST['mobile']);
$phone=injection_replace($_POST['phone']);
$addres=injection_replace($_POST['addres']);

$ads_galery_pic= ($_POST['ads_galery_pic']);

$fax=injection_replace($_POST['fax']);
$website=injection_replace($_POST['website']);
$days=injection_replace($_POST['days']);
$telegram=injection_replace($_POST['telegram']);
$viber=injection_replace($_POST['viber']);
$text= ($_POST['text']);
if($manage_site>""){
	if(!in_array($manage_site,$_SESSION["manager_title_site"]))
		header('Location: new_manager_signout.php');
}
$manage_lang=injection_replace($_POST['manage_lang']);
if($manage_lang>""){
	if(!in_array($manage_lang,$_SESSION["manager_title_lang"]))
		header('Location: new_manager_signout.php');
}
$mudoal_lock=injection_replace($_POST['mudoal_lock']);
$spesial_start_date= injection_replace($_POST['spesial_start_date']);
$spesial_finish_date=injection_replace($_POST['spesial_finish_date']);

 
$array_value=injection_replace($_POST['array_value']);
if($array_value>""){
	$array_valu=explode(",",$array_value);
	$tempp=(array_diff($array_valu,$_SESSION["manager_page_cat"]));
	if(count($tempp)>0){
	header('Location: new_manager_signout.php');exit();}
}
$cat_arr=explode(",",$array_value);
#type news
$fori=(injection_replace($_POST['fori'])=="") ? 0 : 1;
$tasviri=(injection_replace($_POST['tasviri'])=="") ? 0 : 1;
$videoi=(injection_replace($_POST['videoi'])=="") ? 0 : 1;
$soti=(injection_replace($_POST['soti'])=="") ? 0 : 1;
$erjaei=(injection_replace($_POST['erjaei'])=="") ? 0 : 1;
$ads_type=$fori.$tasviri.$videoi.$soti.$erjaei;


# SEO Tab
$meta_label=injection_replace($_POST['meta_label']);
if($meta_label>""){
	get_label_count($meta_label,$coms_conect);
}
 
$state=injection_replace($_POST['state']);
$meta_keyword=injection_replace($_POST['meta_keyword']);
$meta_desciption=injection_replace($_POST['meta_desciption']);

# Slide Tab
$slide=injection_replace($_POST['slide']);


#file upload field
$ads_image=injection_replace($_POST['ads_image']);
$ads_attach=injection_replace($_POST['ads_attach']);
 
$ads_video=injection_replace($_POST['ads_video']);
 

 
#slideshow 
$slide_img1=injection_replace($_POST['slide_img1']);
$slide_img2=injection_replace($_POST['slide_img2']);
$start_date=injection_replace($_POST['start_date']);
$finish_date=injection_replace($_POST['finish_date']);
$slide_title=injection_replace($_POST['slide_title']);
$text1=injection_replace($_POST['text1']);
$text2=injection_replace($_POST['text2']);
$text3=injection_replace($_POST['text3']);

#اخبار مرتبط
$totla_related=injection_replace($_POST['totla_related']);
$spesial_date=jdate('Y/m/d');

############################################
if($edit_mode==""&&$title>""&&$_SESSION["can_add"]==1&&check_catogory($array_value)==1){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	$user_id=injection_replace($_SESSION['manager_id']);
	if($spesial_finish_date=='')$spesial_finish_date=$spesial_date;
	if($spesial_start_date=='')$spesial_start_date=$spesial_date;
	$arr=array("city"=>$city,"mobile"=>$mobile,"phone"=>$phone,"addres"=>$addres,"fax"=>$fax,"website"=>$website,"days"=>$days,"telegram"=>$telegram,"viber"=>$viber, "state"=>$state,"email"=>$email,"ads_type"=>$ads_type,"title"=>$title,"text"=>$text,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"price"=>$price,"mudoal_lock"=>$mudoal_lock ,"user_id"=>$user_id,"date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
	$id=insert_to_data_base($arr,'new_ads',$coms_conect);
	//print_r($arr);exit;
	$arr_imag=array("id"=>$id,"type"=>18,"adress"=>$ads_image,"name"=>'ads_image');
	insert_to_data_base($arr_imag,'new_file_path',$coms_conect);
	
	$arr_attach=array("id"=>$id,"type"=>18,"adress"=>$ads_attach,"name"=>'ads_attach');
	insert_to_data_base($arr_attach,'new_file_path',$coms_conect);
	
 	$arr_video=array("id"=>$id,"type"=>18,"adress"=>$ads_video,"name"=>'ads_video');
	insert_to_data_base($arr_video,'new_file_path',$coms_conect);
	
	####label
	if(!empty($meta_label)){
		$temp=explode(",",$meta_label);
		foreach($temp as $value){
			if($temp>""){			
				$label_arr=array("id"=>$id,"type"=>18,"label_id"=>$value);
				insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
			}
		}
	}
	
	#####دسته بندي#######
	foreach($cat_arr as $value){
		if($value!=-1){
			$arr=array("cat_id"=>$value,"page_id"=>$id,"type"=>18);
			insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
		}
	}
	
	$related=explode(",",$totla_related);
	foreach($related as $value){
		$arr=array("id"=>$value,"page_id"=>$id,"type"=>18);
		insert_to_data_base($arr,'new_related_madual',$coms_conect);
	}	
	
	### slide show add 
	if($slide==1){
		$slide_link="/ads/$manage_lang/$id/".insert_dash("$title");
		$arr_slide=array("link"=>$slide_link,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$id ,"type"=>18 ,"user_id"=>$user_id,"date"=>$now,"ip"=>$custom_ip);
		insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
	}
	
	####گالری	###  
	if(!empty($ads_galery_pic)){
		foreach($ads_galery_pic as $image){
			if($image>""){			
				$gallery_arr=array("id"=>$id,"type"=>18,"adress"=>$image,"name"=>'ads_galery_pic');
				insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
			}
		}
	}	
	
	show_msg($new_successfull);
}else if($edit_mode>""&&$title>""&&$_SESSION["can_edit"]==1&&check_catogory($array_value)==1){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	if($spesial_finish_date=='')$spesial_finish_date=$spesial_date;
	if($spesial_start_date=='')$spesial_start_date=$spesial_date;
	$edit_user_id=injection_replace($_SESSION['manager_id']);
	$condition="id=$edit_mode";
	$arr=array("city"=>$city,"mobile"=>$mobile,"phone"=>$phone,"addres"=>$addres,"fax"=>$fax,"website"=>$website,"days"=>$days,"telegram"=>$telegram,"viber"=>$viber, "state"=>$state,"email"=>$email,"ads_type"=>$ads_type,"title"=>$title,"text"=>$text,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"price"=>$price,"mudoal_lock"=>$mudoal_lock ,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
	update_data_base($arr,'new_ads',$condition,$coms_conect);
	
	
	$condition="id=$edit_mode && name='ads_image'";
	$arr_imag=array("id"=>$edit_mode,"type"=>18,"adress"=>$ads_image,"name"=>'ads_image');
	update_data_base($arr_imag,'new_file_path',$condition,$coms_conect);
	
	$condition="id=$edit_mode && name='ads_attach'";
	$arr_attach=array("id"=>$edit_mode,"type"=>18,"adress"=>$ads_attach,"name"=>'ads_attach');
	update_data_base($arr_attach,'new_file_path',$condition,$coms_conect);
	
 	$condition="id=$edit_mode && name='ads_video'";
	$arr_video=array("id"=>$edit_mode,"type"=>18,"adress"=>$ads_video,"name"=>'ads_video');
	update_data_base($arr_video,'new_file_path',$condition,$coms_conect);
	
	####label
	$condition="id=$edit_mode and type=18";
	delete_from_data_base('new_mudoal_label',$condition,$coms_conect);	
	if(!empty($meta_label)){
		$temp=explode(",",$meta_label);
		foreach($temp as $value){
			if($temp>""){			
				$label_arr=array("id"=>$edit_mode,"type"=>18,"label_id"=>$value);
				insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
			}
		}
	}
#####دسته بندي#######
	$query1="delete from new_modules_catogory where page_id='$edit_mode' and type=18";
	$coms_conect->query($query1);
	foreach($cat_arr as $value){
		if($value!=-1){
			$arr=array("cat_id"=>$value,"page_id"=>$edit_mode,"type"=>18);
			insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
		}
	}
	
	
	####گالری	###  
 	$queryw1="delete from new_file_path where id='$edit_mode' and type=18 and name='ads_galery_pic'";
	$coms_conect->query($queryw1);
	if(!empty($ads_galery_pic)){
		foreach($ads_galery_pic as $image){
			if($image>""){			
				$gallery_arr=array("id"=>$edit_mode,"type"=>18,"adress"=>$image,"name"=>'ads_galery_pic');
				insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
			}
		}
	}	
	
#####related	
	$query1="delete from new_related_madual where page_id='$edit_mode' and type=18"; 
	$coms_conect->query($query1);
	$related=explode(",",$totla_related);
	foreach($related as $value){
 
		$arr=array("id"=>$value,"page_id"=>$edit_mode,"type"=>18);
		insert_to_data_base($arr,'new_related_madual',$coms_conect);
	}	
	### slide show update 		
	if($slide==1)
	{
		$slide_link="/ads/$manage_lang/$edit_mode/".insert_dash("$title");
		$query1="select count(id) as count from new_slideshow where page_id='$edit_mode'  and type=18";
		$result = $coms_conect->query($query1);
		$row = $result->fetch_assoc();
		$count=$row['count'];
		if($count!=0){
			$condition="page_id=$edit_mode";
			$arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>18 ,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"ip"=>$custom_ip);
			update_data_base($arr_slide,'new_slideshow',$condition,$coms_conect);
			
		}else{
			$arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>18 ,"user_id"=>$edit_user_id,"date"=>$now,"ip"=>$custom_ip);
			insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
			
		}
	}else{
		$query1="delete from new_slideshow where page_id='$edit_mode' and type=18";
		$coms_conect->query($query1);
	}
	show_msg($new_successfull);
}

create_session_token(); 

##################################
?>
<div class="modal fade" id="del_reated_news" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">حذف</h4>
			</div>
			<div class="modal-body">
					<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف آگهی مرتبط اطمینان دارید</div>
			</div>
			<div class="modal-footer ">
				<button type="button" id="btn_del_related_news"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی</button>
				<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خیر</button>
			</div>
		</div>
	</div>
</div> 
<fieldset>
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title custom_align" id="Heading">حذف</h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف آگهی زیر اطمینان دارید</div>
				</div>
				<div class="modal-footer ">
					<button type="button" id="btn_ok" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
					<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
				</div>
			</div>
		</div>
	</div>
</fieldset>

<fieldset>
	<div class="modal fade" id="show_news_gallery" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div id="show_news_gallery_ajax">	
				</div>	
			</div>
		</div>
	</div>
</fieldset>
	
<fieldset>
 <div class="modal fade" id="show_video_grid" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id='close_video_modual' class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">نمایش</h4>
			</div>
			<div class="modal-content">
					<video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered"   controls preload="none" width="100%" height="400px"
					data-setup="{}">
					<source id="show_add_video_modual" src="http://localhost/new_video_pic/default.MP4" type='video/mp4'   />
					</video>
					<audio width="320" id="example_voice_1" controls style="display:none">
						 <source src="" type="voice/mp3">
					 </audio>
			 </div>	
		</div>
	</div>
</div>
</fieldset>	
	
	
<form class="form-horizontal" id="news_search" name="news_search" action="" role="form" method="get" enctype="multipart/form-data">
<input type="hidden" value="new_ads" name='yep'>
	<fieldset>
		<div class="modal fade" id="searching" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title custom_align" id="Heading">جستجوي پيشرفته</h4>
					</div>
					<div class="modal-body">
						<div class="row clearfix">
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_name">عنوان </label>
								<div class="col-md-4">
								<?$search_txt=injection_replace($_GET['search_txt'])?>
									<input id="search_txt" name="search_txt" value="<?=$search_txt?>" type="text" placeholder="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_name">شماره آگهی</label>
								<div class="col-md-4">
								<?$id_number=injection_replace($_GET['id_number'])?>
									<input id="id_number" name="id_number" value="<?=$id_number?>" type="text" placeholder="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_family">فيلد</label>
								<div class="col-md-4">
									<?$field=injection_replace($_GET['field'])?>
									<select class="dropdown" rows="5" name="field">
										<option <?if($field==0) echo 'selected'?> value="0">همه</option>
										<option <?if($field==1) echo 'selected'?> value="1">شرح آگهی</option>
										<option <?if($field==2) echo 'selected'?> value="2">ایمیل</option>
										<option <?if($field==3) echo 'selected'?> value="3">تلفن</option>
										<option <?if($field==4) echo 'selected'?> value="4">قیمت</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_family">دسته بندي</label>
								<div class="col-md-4">
								<?$cat_filter=injection_replace($_GET['cat_filter'])?>
									<input  type="text" name="cat_filter" value="<?=$cat_filter?>" id="cat_filter" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
								</div>
							</div>
 
							<div class="form-group">
				
								<label for="edit_tozihat" class="col-md-3 control-label">وضعيت</label>
								<div class="col-md-4">
								<?$search_status=injection_replace($_GET['search_status']);?>
									<select class="dropdown" rows="5" name="search_status">
									
										
										<option <?if($search_status==0) echo 'selected';?> value="0">پيش نويس</option>
										<option   <?if($search_status==1) echo 'selected';?> value="1">منتشر شده</option>
										<option <?if($search_status=='') echo 'selected';?> value=""></option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button id="singlebutton" name="singlebutton" class="btn btn-primary">جستجو</button>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
</form>
<style>
		.navbar-form input[type=text] {
			border-width: 1px !important;
		}
		.dataTables_wrapper .row:last-child {
			border-bottom: 0px solid #e0e0e0 !important;
			padding-top: 0px !important;
			padding-bottom: 0px !important;
		}
		.bootstrap-tagsinput {
		   margin-bottom: 0px; 
		   border-radius: 0px; 
		}
		.dropdown-submenu > a:before {
			display: none !important;
		}
</style>

<fieldset>
<div class="modal fade" id="show_contact" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					 آگهی  مرتبط
				</div>
			</div>
			<div class="modal-body">
				<div class="panel-body">
				<div class="tt">	
					<div class="row-fluid">
						<div class="col-md-6">
							<div class="form-group"><div class="input-group input-group-sm">
								<input type="text" id="related_search" class="form-control search2" placeholder="" style="top: 0px !important; ">
								<span class="input-group-addon" style="padding: 0px;"><input type="button" class="btn btn-primary" value="جستجو" name="relate_btn" id="relate_btn" style="margin: auto;border-radius: 0px;bottom: 1px;height: 28px;padding-top: 2px;"></span>
								</div><img id="show_waiting_search" src="waiting.gif" dir="center" style="display:none">
							</div>
						</div>
						
					</div>
					<div id="show_related"></div>
				</div>
				</div>	
			</div>
			<div class="modal-footer ">
			<button type="button" id="btn_ok_news00" value="" data-dismiss="modal" class="btn btn-primary conbtnGetAll" ><span class="glyphicon glyphicon-ok-sign"></span> افزودن </button>
		   </div>
		</div>
	</div><!-- /.modal-dialog --> 
</div>
</fieldset> 
<br>
<style>
.error {
color : red;
}
</style>
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;">
		<button data-dismiss="alert" class="close" sourceindex="208">x</button>
			<i class="fa fa-times-sign"></i>
		</div>
<!-- /alert panel  -->

<div class="tabbable">
	<ul class="nav nav-tabs" style="margin-top:18px;border-bottom: 0;display:none;">
		<li class="pull-right" style="right:1%;">
			<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span data-toggle="tab" href="#add_templates" title="افزودن"><i class="ace-icon fa fa-plus bigger-110"></i></span>
			</i>

			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav navbar-left">
					<?if($_SESSION['can_add']==1){?>	<a data-toggle="tab" href="#add_templates" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
					<i class="ace-icon fa fa-plus bigger-110"></i>
					افزودن </a><?}?>
					<?if($_GET['manager_filter']>""){?>	<a  href="/newcoms.php?yep=new_ads" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
					
					بازگشت </a><?}?>
				</ul>
			</div>
		</li>
		<li class="active"><a href="#tab1" data-toggle="tab" style="display:none;" id="uuu"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			ليست اخبار </a></li>
	</ul>
			
	<div class="msheet tab-content">
		<div class="secfhead">
			<!-- #section:ads/ads.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-text150" style=""></span>
				</div>
				<div class="title"><p class="titr">لیست آگهی</p><p class="lead">توضیحات این بخش</p>
				</div>
			</div>
			<!-- /section:ads/ads.head -->
			<div class="toolmenu">
				<ul>
				<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

				<li id="newpag" class="addicon">
					<a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن آگهی جدید" >
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
			<div class="tt">
				<div class="row-fluid">
					<div class="col-md-10">
						<div class="dropdown pull-left yepco">
							<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" class="btn pull-left btn-primary btn-sm" href="/page.html">
							امکانات <span class="caret"></span>
							</a>
							<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
								<li class="dropdown-submenu"><a href="#" tabindex="-1" >انتقال به سايت  <i class="fa fa-caret-right" style="float: left;"></i></a>
									<ul class="dropdown-menu">
									<?create_sub_site_menu($site_id,$coms_conect,$_SESSION["manager_title_site"],'cut_site')?>
									</ul>	
								</li>
								<li class="dropdown-submenu"><a href="#" tabindex="-1" >کپي به سايت  <i class="fa fa-caret-right" style="float: left;"></i></a>
									<ul class="dropdown-menu">
										<?create_sub_site_menu($site_id,$coms_conect,$_SESSION["manager_title_site"],'copy_site')?>
									</ul>	
								</li>
							</ul>
						</div>
						<div class="pull-left btn-xs yepco" id="drop4">
							<i type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 5px;margin-left: 0px;top: 2px;left: 5px;">
							<span class="sr-only">Toggle navigation</span>
							<span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
							</i>
							<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
								<ul class="nav navbar-nav navbar-left">
									<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="margin-left: 0px;margin-right: -5px;border-radius: 5px;">
									حذف 
									</a>
								</ul>
							</div>	
						</div>
								<?$manager_filter=injection_replace($_GET['manager_filter']);
								$q=injection_replace($_GET['q']);
								$site_filter=injection_replace($_GET['site_filter']);
								$lang_filter=injection_replace($_GET['lang_filter']);?>
								<div class="form-group yepco">
									<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
										<input type="hidden" name="yep"  value="new_ads">
										<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
										<input type="hidden" name="site_filter" value="<?=$site_filter?>">
										<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
										<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
										
									</form>	
								

									<div class="pull-right btn-default btn-xs yepco">
										<?if ($manager_filter>"")
											$_SESSION['manager_filter']=$manager_filter;
										create_manager_filter($_SESSION['manager_filter'],$coms_conect,$_SESSION["manager_user_permisson"])?>
									</div>
									<div class="pull-right btn-default btn-xs yepco">
										<?if ($lang_filter>"")
											$_SESSION['lang_filter']=$lang_filter;
										create_lang_filter($_SESSION['lang_filter'],$coms_conect,$_SESSION["manager_title_lang"])?>
									</div>
									<div class="pull-right btn-default btn-xs yepco">
										<?if ($site_filter>"")
											$_SESSION['site_filter']=$site_filter;
										create_sub_site_filter($_SESSION['site_filter'],$coms_conect,$_SESSION['manager_title_site'])?>
									</div>
							</div>
						
					</div>
					
					
				</div>
			</div>
			<!-- #section:ads/ads.table -->
			<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
				<thead>
				<tr>
					<th>شماره آگهی</th>
					<th class="center">
					<label class="position-relative">
					<input type="checkbox" class="conchkSelectAll" />
					<span class="lbl"></span>
					</label>
					</th>
					<th width="15%" >عنوان</th>
					<th>ارسال کننده</th>
					<th>سایت</th>
					<th>بازديد</th>
					<th>وضعيت </th>
					<th>امکانات</th>
				</tr>
				</thead>
				<tbody><?
								if($lang_filter>""&&!in_array($lang_filter,$_SESSION["manager_title_lang"])){
								header('Location: new_manager_signout.php');
								}
								
								if(($site>""&&!in_array($site,$_SESSION["manager_title_site"]))||($site_filter>""&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
								header('Location: new_manager_signout.php');
								exit;
								}
								
							$search_status=injection_replace($_GET['search_status']);
							if($search_status>""){
								$str_status=" and a.status='$search_status'";
								$status_page="&status_filter=$search_status";
							}

							if($id_number>""){
								$str_id_number=" and a.id='$id_number'";
								$id_number_page="&id_filter=$id_number";
							}
							if($site_filter>""){
								$str_site=" and a.site='$site_filter'";
								$site_page="&site_filter=$site_filter";
							}
 

							if($field>""){
								$field_page="&field=$field&search_txt=$search_txt";
								switch ($field) {
									 case 0:
										 
										$str_field=" and (a.text like '%$search_txt%' or a.price like '%$search_txt%' or a.email like '%$search_txt%' or a.phone like '%$search_txt%')";
										break;
									case 1:
										$str_field=" and a.text like '%$search_txt%'";
										break;
									case 2:
										$str_field=" and a.email like '%$search_txt%'";
										break;
									case 3:
										$str_field=" and a.phone like '%$search_txt%'";
										break;
									case 4:
										$str_field=" and a.price like '%$search_txt%'";
										break;

								}
								$str_lang=" and a.la='$lang_filter'";
								$lang_page="&lang_filter=$lang_filter";
							}
							
							if($q>""){
								$str_q="  and(a.title like '%$q%')";
								$manager_q="&q=$q";
							}
							if($lang_filter>""){
								$str_lang=" and a.la='$lang_filter'";
								$lang_page="&lang_filter=$lang_filter";
							}
							if($manager_filter>""){
								$str_manager=" and  a.user_id='$manager_filter'";
								$manager_page="&manager_filter=$manager_filter";
							}
							else 
							$str_manager=" and  a.user_id=$manager_id";
							$cat_filter=injection_replace($_GET['cat_filter']);
							if($cat_filter>""){
								$str_cat=" and c.cat_id in($cat_filter)";
								$cat_page="&cat_filter=$cat_filter";
							}else 
							$str_cat=" and c.cat_id in({$_SESSION['manager_page_cat_str']})";
							// $str_cat
							$sql1 = "select count(a)as cnt from (SELECT count(a.id) as a from new_members b ,new_ads a ,new_modules_catogory c where 
								 b.id = a.user_id and c.type=18 and a.id=c.page_id 
								 $str_lang $str_site $str_q $str_manager $str_status $str_id_number $str_field $str_expire
								group by page_id)q";
								// echo $sql1;//exit;
								$result = $coms_conect->query($sql1);
								$RS = $result->fetch_assoc();
								$page=injection_replace($_GET["page"]);
								$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_ads$lang_page$site_page$manager_page$status_page$manager_q$field_page$expire_page$publish_page$cat_page$id_number_page");
								$from=$a[0];
								$to=$a[1];
								$pgsel=$a[2];
							$query="SELECT * FROM new_members b ,new_ads a ,new_modules_catogory c where
							b.id = a.user_id and c.type=18 and a.id=c.page_id 
							$str_lang $str_site $str_q $str_manager $str_status $str_cat $str_id_number $str_field $str_expire
							 group by a.id order by a.id desc LIMIT $from,$to";
							// echo $query;
							$result = $coms_conect->query($query);
							while($RS1 = $result->fetch_assoc()){
								$id=$RS1["id"];
								?>
				<tr>
					<td class="center"><?=$RS1["id"]?></td>
					<td class="center">
						<label class="position-relative">
						<input id="<?=$id?>" type="checkbox" class="conchkNumber" />
						<span class="lbl"></span>
						</label>
					</td>
					<?if($RS1['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $RS1['site'].'.'.$domain_name;?>
					<td><a target="_blank" href="/<?="$domain/ads/{$RS1['la']}/{$RS1['id']}/".insert_dash($RS1['title'])?>"><?=$RS1["title"]?></a></td>
					 
					<td><?=get_result("select user_name from new_members where id={$RS1["user_id"]}",$coms_conect)?></td>
					<td><a href="/<?=$domain?>" target="_blank"><?=$RS1['site']?></a></td>
					<td><?=$RS1["view"]?></td>
					
					 
					<td>
					<span data-value="<?=$RS1["status"]?>" class="status_news editable editable-click" data-pk="<?=$RS1["id"]?>" >
					<?if($RS1["status"]==1){echo 'منتشر شده';}else{echo 'پيش نويس';}?></span>
					</td>
					<td>
					<?if($_SESSION["can_edit"]==1){?>
					<a id="<?=$id?>" class="edit_menu blue icon"  href="newcoms.php?yep=new_ads&edit_id=<?=$id?>">
					<i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
					</a>
					<?}if($_SESSION["can_delete"]==1){?>	
					<a href="#" id="<?=$id?>" class="red del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
					<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
					</a>
					<a href="/<?="$domain/ads/{$RS1['la']}/{$RS1['id']}/".insert_dash($RS1['title'])?>" target="_blank"  class="del_menu blue icon">
					<i class="ace-icon fa fa-vimeo-square bigger-120" title="نمایش"></i>
					</a>
					<?}if(get_result("select count(id) from new_madules_comment where type=18 and status=0 and madul_id={$RS1['id']}",$coms_conect)){?>
					<a href="/newcoms.php?yep=new_ads_comment&id=<?=$RS1['id']?>" target="_blank" id="<?=$id?>" class="green new_scomments icon">
					    <?=mudoal_comment_count($RS1['id'],18,$coms_conect)?><i class="ace-icon fa fa-comments bigger-120" title="نظرات"></i>
					</a>	
					<?}$movie=get_result("SELECT adress FROM  new_file_path  WHERE type=18 and name='ads_video' and id={$RS1['id']}",$coms_conect);
					if($movie>""){?>
					<a href="#"   id="<?=$movie?>" class="show_video_modual icon"  data-toggle="modal" data-target="#show_video_grid">
						<i class="ace-icon fa fa-film bigger-120" title="فیلم"></i>
					</a>
					<?}?>
 
		
					<?$attach=get_result("SELECT adress FROM  new_file_path  WHERE type=18 and name='ads_attach' and id={$RS1['id']}",$coms_conect);
					if($attach>""){
					?>
					<a href="<?=$attach?>"   id="<?=$id?>" class="red new_files icon">
						<i class="ace-icon fa fa-file  bigger-120" title="فایل پیوست"></i>
					</a>
					<?}?>
					 <label></label>
					 <input  id="<?=$id?>" name="switch-field-1" <?if($RS1['mudoal_lock']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
					 <span title="فعال سازی"class="lbl"></span>
					</td>
				</tr>
				<?}?>
				</tbody>
			</table>
			<!-- /section:ads/ads.table -->
			<?=$pgsel?>	
		</div>
<?###############نمايش در حالت ويرايش#################
if($edit_id>""){
	$query="SELECT * FROM new_ads where id='$edit_id'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$city=$row['city'];
	$viber=$row['viber'];
	$telegram=$row['telegram'];
	$days=$row['days'];
	$website=$row['website'];
	$fax=$row['fax'];
	$addres=$row['addres'];
	$phone=$row['phone'];
	$mobile=$row['mobile'];
	$status=$row['status'];
 
	$state=$row['state'];
	$email=$row['email'];
	$ads_type=$row['ads_type'];
	$title=$row['title'];
	$text=$row['text'];
	$la=$row['la'];
	$site_id=$row['site'];
	$label='';
		$query="select label_id from new_mudoal_label where id='$edit_id' and type=18";
		$result = $coms_conect->query($query);$i=1;$str='';
		 while($RS1 = $result->fetch_assoc()) {
			if($i!=1)$str=',';
			$label .=$str.$RS1['label_id'];$i++;
		}	
	//echo $label;//exit;
	
	
	$meta_keyword=$row['meta_keyword'];
	$meta_desciption=$row['meta_desciption'];
	$spesial_start_date=miladitojalaliuser(date('Y-m-d',$row['spesial_start_date']));
	$spesial_finish_date=miladitojalaliuser(date('Y-m-d',$row['spesial_finish_date']));
 
	$mudoal_lock=$row['mudoal_lock'];
	$price=$row['price'];
	$can_comment=$row['can_comment'];
	$slide=$row['slide'];
	$ads_type=$row['ads_type'];
	$temp_1=str_split($ads_type);
	$fori=$temp_1[0];
	$tasviri=$temp_1[1];
	$videoi=$temp_1[2];
	$soti=$temp_1[3];
	$erjaei=$temp_1[4];
	
	
	#Query from new_slideshow
	$query="SELECT * FROM new_slideshow where page_id='$edit_id'  and type=18";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$slide_img1=$row['slide_img1'];
	$slide_img2=$row['slide_img2'];
	if($row['start_date']>0)
	$start_date=miladitojalaliuser(date('Y-m-d',$row['start_date']));
	if($row['finish_date']>0)
	$finish_date=miladitojalaliuser(date('Y-m-d',$row['finish_date']));
	$slide_title=$row['title'];
	$text1=$row['text1'];
	$text2=$row['text2'];
	$text3=$row['text3'];
	
	#Query from new_file_path
	$query="SELECT adress FROM new_file_path where id='$edit_id' && name='ads_image'  and type=18";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$ads_image=$row['adress'];
	
	$query="SELECT adress FROM new_file_path where id='$edit_id' && name='ads_attach'  and type=18";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$ads_attach=$row['adress'];
	
	
	$query="SELECT adress FROM new_file_path where id='$edit_id' && name='ads_video'  and type=18";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$ads_video=$row['adress'];	
	
	$query="SELECT b.id,title FROM new_related_madual a ,new_ads b  where page_id='$edit_id' and a.id=b.id  and type=18";
	 
	$result = $coms_conect->query($query);
	$totla_related="";$i=1;
	while($row = $result->fetch_assoc()){
		if($i!=1)$str=',';$i++;
		$totla_related .=$str.$row['id'];
	}
	

}
?>	
		<div class="tab-pane <?if($edit_id!="" || $add_new==1) echo 'active';?>" id="add_templates">
			
			<form id="newstext" name="newstext" action="" role="form" method="post" enctype="multipart/form-data"
			data-fv-framework="bootstrap"
			data-fv-message="This value is not valid"
			data-fv-icon-validating="glyphicon glyphicon-refresh">
			<div id="id-message-new-navbar" class="message-navbar clearfix">
				<input type="hidden" name="array_value" id="array_value">
				<input type="hidden" name="edit_mode" id="edit_mode" value="<?=$edit_id?>">
				<input type="hidden" name="status" id="status" value="<?=$status?>">
				<input type="hidden" id="check_value" name="check_value" value="0">
				<input type='submit'  id='submit_btn' style='display:none'>  
				<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
				<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="انتشار">
					<span class="flaticon-verified9">
					</span>
				</a>
				
				<a href="#" class="save-draft2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="پیش نویس">
					<span class="flaticon-browser93">
					</span>
				</a>
				<a href="newcoms.php?yep=new_ads" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
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
							<p class="flaticon-file23">خبر</p>
							
						</a>
					</li>
					<li>
						<a data-toggle="tab" href="#cat3" >
						<p class="flaticon-squares36"></p>
						دسته بندي
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
					 <li class="gallery" id="gallery11">
						 <a data-toggle="tab" href="#gallery">
							 <p class="flaticon-gallery7"></p>
							 گالري تصاوير
						 </a>
					</li>
					<li class="sss" id="ddd">
						 <a data-toggle="tab" href="#video">
							 <p class="flaticon-videoplayer5"></p>
							 ويدئو
						 </a>
					 </li>
					<li>
						 <a data-toggle="tab" href="#relatednews">
							 <p class="flaticon-copy23"></p>
						 آگهی مرتبط
						</a>
					</li>
				</ul>
				<div class="tab-content" style="min-height: 640px;">
					<div class="tab-pane active" id="home">
						<div class="page-content-area">
							<div class="page-body" style="margin-top: 25px;">
							<!-- #section:ads/ads.news -->
										<div class="col-md-8">
											<div class="form-group">
												<div class="form-group col-sm-12">
													<label class="control-label">نوع آگهی *</label>
													<div class="form-group btn-group">
														<button data-toggle="dropdown" class="btn dropdown-toggle"  data-placeholder="انتخاب کنيد" style="height: 34px;padding-top: 2px;">انتخاب کنيد
														<?if($ads_type=="00000"){
															echo 'فوري';
														}else{
															//if($fori=="1"){ echo 'فوري ';}
															if($tasviri=="1") { echo 'تصويري ';}
															if($videoi=="1") { echo 'ويدئويي ';}
															if($soti=="1") { echo 'صوتي ';}
															if($erjaei=="1") { echo 'ارجاعي ';}
														}?>
														<span class="caret"></span></button>
														<ul class="dropdown-menu" id="check_news" name="check_news" style="right:0px;">
															<li><input type="checkbox" name="fori" <?echo 'checked';?> id="ID"><label for="ID" name="NAME" value="VALUE">خبر فوري</label></li>
															<li><input type="checkbox" name="tasviri" <?if($tasviri=='1') echo 'checked';?> id="ID2"><label for="ID2" name="NAME" value="VALUE">خبر تصويري</label></li>
															<li><input type="checkbox" name="videoi" <?if($videoi=='1') echo 'checked';?> id="ID3"><label for="ID3" name="NAME" value="VALUE">خبر ويدئويي</label></li>
															<li><input type="checkbox" name="soti" <?if($soti=='1') echo 'checked';?> id="ID4"><label for="ID4" name="NAME" value="VALUE">خبر صوتي</label></li>
															<li><input type="checkbox" name="erjaei" <?if($erjaei=='1') echo 'checked';?> id="ID5"><label for="ID5" name="NAME" value="VALUE">خبر ارجاعي</label></li>																						
														</ul>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="form-group col-sm-6">
													<label class="control-label">عنوان خبر *</label>
													<input type="text" value="<?=$title?>" name="title" id="title" class="form-control"
													data-fv-notempty="true"
													data-fv-notempty-message="پر کردن اين فيلد الزامي است" />
												</div>
											</div>
											<div class="form-group row">
												<div class="form-group col-sm-6">
													<label class="control-label"> ایمیل</label>
													<input value="<?=$email?>" name="email" id="email" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<div class="form-group col-sm-6">
													<label class="control-label"> تلفن همراه</label>
													<input value="<?=$mobile?>" name="mobile" id="mobile" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<div class="form-group col-sm-6">
													<label class="control-label"> viber</label>
													<input value="<?=$viber?>" name="viber" id="viber" class="form-control">
												</div>
											</div>
											<div class="form-group row">
												<div class="form-group col-sm-6">
													<label class="control-label"> تلگرام</label>
													<input value="<?=$telegram?>" name="telegram" id="telegram" class="form-control">
												</div>
											</div>
 
											<div class="form-group">
												<div class="form-group col-sm-12">
													<label class="control-label">قیمت</label>
													<input id="price" value='<?=$price?>' name="price"  class="form-control" rows="3"
														data-fv-notempty="true"
														data-fv-notempty-message="پر کردن اين فيلد الزامي است" />
												</div>
											</div>
											
											<div class="form-group">
												<div class="form-group col-sm-12">
													<label class="control-label">شرح آگهی </label>
													<textarea id="text" name="text"  class="form-control" rows="3"><?=$text?></textarea>
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
											<div class="form-group">
												<div class="form-group col-sm-6">
													<label class="control-label">استان</label>
													<select name='state' id='state' class='form-control'>
														<option value='0'>انتخاب کنید</option>
														<?$sql="SELECT name,id FROM new_regional where type=2 and parent_id=74";
															$result = mysql_query($sql);
															while($row = mysql_fetch_array($result)){
																$str='';	
																if($state==$row['id'])
																$str='selected';	
																echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
															}?>
													</select>
												</div>
												<div class="form-group col-sm-6">
													<label class="control-label">شهر</label>
													 <div class="form-group" id="show_city">
														<select name='city' id='city' class='form-control'>
														<?if($edit_id){
															$sql="SELECT name,id FROM new_regional where type=3 and parent_id=$state";
															$result = mysql_query($sql);
															while($row = mysql_fetch_array($result)){
																$str='';	
																if($state==$row['id'])
																$str='selected';	
																echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
															}
															
														}?>
														</select>
													 </div>
												</div>
<script>											
	$(document).on('change', '#state', function(event) {
		var a =$(this).val();
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=show_city_ads&id="+a,
				success: function(result){
					 
				$("#show_city").html(result);
			}
				
		});
	});
</script>											
								 
											</div>
										</div>
<style>
@media (min-width: 998px){
.startend{text-align:center;}}
</style>										
										<div class="col-md-4 mset">
										
											<div class="form-group">
												<label class="control-label col-md-4" for="family">مدل خبر</label>
												<div class="form-group col-md-8">
													<select name="mudoal_lock" id="mudoal_lock" class="form-control" rows="3">
														<option value="0" <?if($mudoal_lock==0) echo 'selected'?>>عادي</option>
														<option value="1" <?if($mudoal_lock==1) echo 'selected'?>>ويژه</option>
													</select>
												</div>
											</div>
											 
											<div class="form-group" id="add_temp0">
												<div class="col-md-12 startend">
													<label class="control-label" for="family">مدت نمايش خبر (پايان- شروع )</label>
												</div>
												<div class="col-md-12">
										 			<div class="input-daterange input-group">
														<input type="text" value="<?=$spesial_start_date?>" class="input-sm form-control" name="spesial_start_date" id="spesial_start_date" palceholder="از"/>
														<span class="input-group-addon">
														<i class="fa fa-exchange"></i>
														</span>
														<input type="text" class="input-sm form-control" value="<?=$spesial_finish_date?>" name="spesial_finish_date" id="spesial_finish_date" palceholder="تا"/>
													</div>
												</div>	
											</div>
											 
											<div class="form-group" id="show_sites" >
													<label class="control-label col-md-4" for="group_name">سايت*</label>
												<div class="form-group col-md-8">
													<?create_sub_site_title($site_id,$coms_conect,$_SESSION['manager_title_site'] );?>
												</div>
											</div>
											<div class="form-group">
													<label class="control-label col-md-4" for="family">زبان</label>
												<div class="form-group col-md-8">
													<select  id="manage_lang" name="manage_lang" class=" col-md-12">
														<?$query="select title,name from new_language where status=1";
														$result = $coms_conect->query($query);
														while($RS1 = $result->fetch_assoc()){
															$title=$RS1['title'];
															$name=$RS1['name'];
															$str="";
															if($manage_lang==$title||$change_lang==$title)
															$str="selected";
															echo "<option value='$title' $str>$name</option>";
														}
														?>
													</select>
												</div>
											</div>
											<div class="form-group">
													<label class="control-label col-md-4" for="family" style="padding-left: 0px;">فايل پيوست خبر</label>
												<div class="form-group col-md-8">
													<input type="text" value="<?=$ads_attach?>" name="ads_attach" id="ads_attach" style="width: 68%;">
													<a href="/filemanager/dialog.php?type=2&amp;field_id=ads_attach" class="holam btn btn-success iframe-btn"><span class="holam flaticon-add139"></span></a>
												</div>
											</div>
											<div class="form-group" style="text-align: -webkit-center;">
												 
												<label class="control-label" for="family">امکان نظردهي وجود داشته باشد</label>
									 
												<div class="form-group col-md-12">
													<label class="radio-inline" for="pay_type">
													<input type="radio" name="can_comment" id="can_comment" value="1" <?if($can_comment==1) echo 'checked';?>>
													بله
													</label>
													<label class="radio-inline" for="radios-1">
													<input type="radio" name="can_comment" id="radios-1" value="0" <?if($can_comment==0) echo 'checked';?>>
													خير
													</label>
												</div>
											</div>	
						 
										</div>
										<!-- /section:ads/ads.news -->
								</div>
							</div>
					</div>
					<?include 'newcoms/main/new_modual_seo.php4';?>
					<?include 'newcoms/main/new_modual_slide.php4';?>
					<div id="video" class="tab-pane fade">
						<div class="page-content-area" id="gallery5">
							<div class="page-body" style="margin-top: 25px;">
								<fieldset>
								<!-- #section:ads/ads.video -->
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label">آپلود ويدئو(MP4)</label>
							 
										
										<div class="col-md-12 input-group">
											<div class="col-md-12">
												<div class="entry-mark">
												</div>
												 
											<div class="form-group">
												<div class="form-group"><input id="ads_video" value="<?=$ads_video?>" name="ads_video" class="imginput" type="text" >
												<a href="/filemanager/dialog.php?type=3&amp;field_id=ads_video" class="holam btn btn-primary iframe-btn"><span class="holam flaticon-search85"></span></a>
												<a href="#" id="add_videos" class="holam btn btn-success" title="افزودن"><span class="holam flaticon-round68"></span></a>
												<a href="#" id="del_videos" class="holam btn btn-danger" title="حذف"><span class="holam flaticon-delete84"></span></a>
												</div>
												<img id="show_waiting_video" src="waiting.gif" dir="center" style="display:none">
											</div>
												<div id="show_video" class="row" style="position: relative">
												</div> 
											</div>
										<?if($edit_id>""&&$ads_video>""){?>
										 <script>
											if($("#ads_video").val()){
												$("#show_waiting_video").show();
												$.ajax({
													type:'POST',
													url:'New_ajax.php',
													data:"action=show_news_videos&id="+$("#ads_video").val(),
													success: function(result){
														$("#show_waiting_video").hide();
														$("#show_video").html(result);	
													}
												});	
											}
											</script>
										<?}?>	
											<script>
							
											</script>
										</div>
									</div>
								</div>
								<!-- /section:ads/ads.video -->
								</fieldset>
								<? if ($ads_video==""){?>
								<br><br><br><br><br><br><br><br><br>
								<?}?>
							</div>
						</div>
					</div>
 <link type="text/css" href=" /new_orakuploader/orakuploader.css" rel="stylesheet"/>
					<div id="gallery" class="tab-pane fade ">
								<div class="col-md-12" style="margin-top:25px">
									<div class="form-group">
										<div id="fffffffffffff">
											<!-- #section:ads/ads.gallery -->
 											<div class="ui-sortable"><div id="ads_galery_pic" orakuploader="on"></div>
												<?if($edit_id>""){ 
														$query="select adress from new_file_path where id='$edit_id' and type=18 and name='ads_galery_pic'";
														$result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
														$pic_str='';
														 while($RS1 = $result->fetch_assoc()) {
															 $ads_galery_pic=$RS1['adress'];
															 $div_id=explode(".",$ads_galery_pic);
															$pic_str .= "<div class='multibox file' style='cursor: move;' id='$ads_galery_pic' filename='$ads_galery_pic'>";
															$pic_str .= "<div class='picture_delete'  ></div>";
															$pic_str .= "<img src='/new_gallery/files/tn/$ads_galery_pic' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
															$pic_str .= "<input type='hidden' value='$ads_galery_pic' name='ads_galery_pic[]' />";
															$pic_str .= "</div>";
														}
												}?>	
											</div>
											<!-- /section:ads/ads.gallery -->
										</div>
									</div>
								</div>
							<script type="text/javascript">
							$(document).ready(function(){
									$('#ads_galery_pic').orakuploader({
									orakuploader_path : 'new_orakuploader/',
									orakuploader_main_path : 'new_gallery/files',
									orakuploader_thumbnail_path : 'new_gallery/files/tn',
									orakuploader_use_main : false,
									orakuploader_use_sortable : true,
									orakuploader_use_dragndrop : true,
									orakuploader_add_image : 'new_orakuploader/images/add.png',
									orakuploader_add_label : 'آپلود تصویر',
									orakuploader_resize_to : 1024,
									orakuploader_thumbnail_size : 650,
									orakuploader_watermark : 'new_orakuploader/images/watermark.png',
								});
								$('#ads_galery_pic').html("<?=$pic_str?>");
							});
//   واتر مارک
		$("#watermark_check").click(function () {
			if ($('#watermark_check').is(':checked'))
				var a=1;
			else
				var a=0;
			 $.ajax({
				 type:'POST',
				 url:'New_ajax.php',
				 data:"action=rename_water_mark&id="+a,
				 success: function(result){
				}
			});
		});		
// لود شدن سایت برای واتر مارک		
	$(document).ready(function(){
			 $.ajax({
				 type:'POST',
				 url:'New_ajax.php',
				 data:"action=rename_water_mark&id=0",
				 success: function(result){
				}
			});

	})
							</script>
					</div>
	<script type="text/javascript" src="/new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script>
								<?$type=18;
								include 'newcoms/main/new_modual_catogory.php4';?>
					<div id="relatednews" class="tab-pane fade">
									<div class="uploadbts" style="margin-top: 25px;">
									<!-- #section:ads/ads.relate -->
										<a  data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip"><button><span class="flaticon-add139"></span><span>افزودن اخبار</span></button></a>
									<!-- /section:ads/ads.relate -->
									</div>
									
						<?if($edit_id>""){  ?>
						<script>
							$(function () {	
								$.ajax({
											type:'POST',
											url:'New_ajax.php',
											data:"action=show_related_ads_show&id=<?=$totla_related?>",
											success: function(result){
												$("#relatednews").html(result);	
											}
										});	
								});	 
						</script>
						<?}?>					
					</div>
				</div>
				 <div class="panel-footer bttools">
					<a id="save_draft32" class="btn btn-primary save-draft2"><span class="flaticon-browser93"></span><span> پيش نويس</span></a>
					<a id="qazzaq" class="btn btn-success submit2"><span class="flaticon-verified9"></span><span>انتشار</span></a>
				</div>
			</div>
			</fieldset>
			</form>
		</div>
	</div>
</div>
						<script>
						$(function () {
							$(".save-draft2").click(function(){
								$("#status").val("0");
								$("#submit_btn").click();
							});
							$(".submit2").click(function(){
								$("#status").val("1");
								$("#submit_btn").click();
							});
						});
						</script>
<style>
	.editableform .form-control {
		width: auto;
		direction: ltr;
	}
	.editable-clear-x {
		width: 0px;
	}
</style>

<?$_SESSION["del_item"]='del_ads';
$_SESSION["edit_item"]='change_lock_ads';
?>
 <script src="/new_plugin/video-js/js/video.js"></script>
<script>
    videojs.options.flash.swf = "video-js/js/video-js.swf";
</script>	
<script src="ajax_js/ads.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/colorbox.css" />
<script src="/yep_theme/default/rtl/assets/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>
<script>
		$("#relate_btn").click(function () {
			$("#show_waiting_search").show();
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_related_ads&id="+$("#related_search").val(),
				success: function(result){
				//alert(result);
				$("#show_waiting_search").hide();
					$("#show_related").html(result);	
				}
			});		
		});

		// show hide add
		$("#newpag").show();	
		$("#newpag").click(function(){
				$("#newpag").hide();
			});


		$(document).ready(function() {
			$('.sss').hide();
			/*$("#ID").click(function(){
				if( $(this).is(':checked')) {
                        $("#fff").show(); 
                    }else {
                        $("#fff").hide(); 
                    }
                });*/
			$("#ID2").click(function(){
				if( $(this).is(':checked')) {
                        $("#fff").show(); 
                    }else {
                        $("#fff").hide(); 
                    }
                });
			$("#ID3").click(function(){
				if( $(this).is(':checked')) {
                        $("#ddd").show();//video
                    }else {
                        $("#ddd").hide();//video
                    }
                });
	 
			$("#ID6").click(function(){
				if( $(this).is(':checked')) {
                        $("#fff").show();//gallery
                        $("#ddd").show();//video
                        
                    }else {
                        $("#fff").hide();//gallery
                        $("#ddd").hide();//video
                       
                    }
                });
				
				
			//page load show / hide tab	###################
				if( $('#ID').is(':checked')) {
					$("#fff").show();//gallery
				}else {
					$("#fff").hide();//gallery
				}
				
				if( $("#ID2").is(':checked')) {
					$("#fff").show();//gallery
				}else {
					$("#fff").hide();//gallery
				}
			
				if( $("#ID3").is(':checked')) {
                        $("#ddd").show();//video
                    }else {
                        $("#ddd").hide();//video
                    }
					
 
					
					
			
		});
</script>

<script>
	$(function(){
		$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});
		$('#download-button').on('click', function() {
			ga('send', 'event', 'button', 'click', 'download-buttons');
		});
		$('.toggle').click(function(){
			var _this=$(this);
			$('#'+_this.data('ref')).toggle(200);
			var i=_this.find('i');
			if (i.hasClass('icon-plus')) {
				i.removeClass('icon-plus');
				i.addClass('icon-minus');
			}else{
				i.removeClass('icon-minus');
				i.addClass('icon-plus');
			}
		});
	});
</script>
<script>
	$(document).ready(function(){
		hidevizhe = function () {
			$("#add_temp0").hide();
		};
		handleNewSelection = function () {
			hidevizhe();
			switch ($(this).val()) {
				case '1':
				$("#add_temp0").show();
				break;
			}
		};
		$("#mudoal_lock").change(handleNewSelection);
                                                                                                                                                    // Run the event handler once now to ensure everything is as it should be
                                                                                                                                                    handleNewSelection.apply($("#mudoal_lock"));
                                                                                                                                                });
</script>
<script>
	$(document).ready(function(){
		hideAllDivs = function () {
			$("#group").hide();
		};
		handleNewSelection = function () {
			hideAllDivs();
			switch ($(this).val()) {
				case '1':
				$("#group").show();
				break;
			}
		};
		$(document).ready(function() {
			$("#all_group").change(handleNewSelection);
                                                                                                                                                    // Run the event handler once now to ensure everything is as it should be
                                                                                                                                                    handleNewSelection.apply($("#all_group"));

                                                                                                                                                });
	});
</script>
<script type="text/javascript">
			jQuery(function($) {
	var $overflow = '';
	var colorbox_params = {
		rel: 'colorbox',
		reposition:true,
		scalePhotos:true,
		scrolling:false,
		previous:'<i class="ace-icon fa fa-arrow-left"></i>',
		next:'<i class="ace-icon fa fa-arrow-right"></i>',
		close:'&times;',
		current:'{current} of {total}',
		maxWidth:'100%',
		maxHeight:'100%',
		onOpen:function(){
			$overflow = document.body.style.overflow;
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = $overflow;
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange'></i>");//let's add a custom loading icon
})
</script>
 
<script type="text/javascript">
$(document).ready(function() {
	$.fn.editable.defaults.mode = 'inline';
	$('.status_news').editable({
		type: 'select',
		name:'change_status_news',
		url: '/New_ajax.php',
		 value:$("#x_editable_val").val(),
		source:"{1: 'منتشر شده',0: 'پيش نويس'}",
		ajaxOptions: {
			type: 'get',
		},
		error: function(response) {
			//alert(response);
		}
   });
});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".allownumericwithoutdecimal").on("keypress keyup blur",function (event) {
			$(this).val($(this).val().replace(/[^\d].+/, ""));
			if ((event.which < 48 || event.which > 57)) {
				event.preventDefault();
			}
		});
	});
</script>

<script type="text/javascript">
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
</script>

<script type="text/javascript">
	$(document).ready(function() {
 
		$("#start_Slide_show").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});
		$("#end_Slide_show").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});
 
		
		$("#spesial_start_date").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});

 
		$("#spesial_finish_date").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
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
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
<style>
.fvalid{
	color:green;
}
.fvalid:before{
	display:block;
}
p:before{
	display:block;
}
.fnotvalid{
	color:red;
}
.fnotvalid:before{
	display:block;
}
</style>
<script>
    $('#newstext').formValidation({
            excluded: [':disabled']
        })
		.on('err.field.fv', function(e, data) {
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id');

            $('a[href="#' + tabId + '"][data-toggle="tab"]')
                .parent()
                .find('p')
                //.removeClass('fvalid')
                .addClass('fnotvalid');
        })

        // Called when a field is valid
        .on('success.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id'),
                $icon    = $('a[href="#' + tabId + '"][data-toggle="tab"]')
                            .parent()
                            .find('p')
                            //.removeClass('fa-check fa-times');
							.removeClass('fnotvalid');
							//.addClass('fvalid');

            // Check if all fields in tab are valid
            var isValidTab = data.fv.isValidContainer($tabPane);
            if (isValidTab !== null) {
                $icon.addClass(isValidTab ? 'fa-check' : 'fa-times');
            }
        });
</script 
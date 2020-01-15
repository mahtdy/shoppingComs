<?$_SESSION["modual_type"]=10?>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>	
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
	<link rel="stylesheet" href="/new_plugin/video-js/css/video-js.min.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>


<script type="text/javascript">
 $(document).ready(function() {
    $('#cat_filter').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=10";$i=0;
				$result = $coms_conect->query($query);
					while($RS1 = $result->fetch_assoc()) {
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

<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
    $('#meta_label').select2({
        data: [
				<?
				$query="select id,key_count,name from new_keyword where la='fa'";$i=0;
				$result = $coms_conect->query($query);
				while($RS1 = $result->fetch_assoc()) {
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
<?###چک کردن مدير
$edit_mode=injection_replace($_POST['edit_mode']);
if($edit_mode>0){
	$temp_user=get_result("select user_id from new_blog where id= $edit_mode",$coms_conect);	
	if(!in_array($temp_user,$_SESSION['manager_user_permisson'])) 
		header('Location: new_manager_signout.php');
}
$edit_id=injection_replace($_GET['edit_id']);
if($edit_id>""){
	$temp_user=get_result("select user_id from new_blog where id= $edit_id",$coms_conect);	
	if(!in_array($temp_user,$_SESSION['manager_user_permisson'])) 
		header('Location: new_manager_signout.php');
}
$manager_filter=injection_replace($_GET['manager_filter']);
 $q=injection_replace($_GET['q']);
$totla_article=injection_replace($_POST['totla_article']);
$navication_pic=injection_replace($_POST['navication_pic']);
$status=injection_replace($_POST['status']);
$title=injection_replace($_POST['title']);
$continue_blog=($_POST['continue_blog']);
$blog_image=($_POST['blog_image']);


$abstract= ($_POST['abstract']);
$blog_video=injection_replace($_POST['blog_video']);
$mudoal_lock=injection_replace($_POST['mudoal_lock']);
$can_comment=injection_replace($_POST['can_comment']);
$is_importand=injection_replace($_POST['is_importand']);
$blog_type=injection_replace($_POST['blog_type']);
if($is_importand=='')$is_importand=0;

$spesial_start_date=(injection_replace($_POST['spesial_start_date'])=="") ? 0 : injection_replace($_POST['spesial_start_date']);
$spesial_finish_date=(injection_replace($_POST['spesial_finish_date'])=="") ? 0 : injection_replace($_POST['spesial_finish_date']);

$array_value=injection_replace($_POST['array_value']);
if($array_value>0){ 
	$array_valu=explode(",",$array_value);
	$tempp=(array_diff($array_valu,$_SESSION["manager_page_cat"]));
	if(count($tempp)>0){
	header('Location: new_manager_signout.php');exit();}
}
$cat_arr=explode(",",$array_value);
# SEO Tab
$meta_label=injection_replace($_POST['meta_label']);

if($meta_label>""){
	get_label_count($meta_label,$coms_conect);
}
$meta_keyword=injection_replace($_POST['meta_keyword']);
$meta_desciption=injection_replace($_POST['meta_desciption']);

 


if(isset($_POST['publish_date']))
$publish_date=(injection_replace($_POST['publish_date'])>"") ? strtotime(jalalitomiladi(injection_replace($_POST['publish_date']))) : $now;




#slideshow 
$slide=injection_replace($_POST['slide']);
if($slide=="")$slide=0;
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

	####فایلهای پیوست
	if($blog_type==1)$attach_file=injection_replace($_POST['blog_video']);
	else if($blog_type==2)$attach_file=injection_replace($_POST['blog_voice']);
 	else $attach_file='';


##################چک کردن زبان#######################
$manage_lang=injection_replace($_POST['manage_lang']);
$lang_filter=injection_replace($_GET['lang_filter']);
if($lang_filter>0&&!in_array($lang_filter,$_SESSION["manager_title_lang"])||($manage_lang>0&&!in_array($manage_lang,$_SESSION["manager_title_lang"]))){
	header('Location: new_manager_signout.php');exit;
}
#########################چک کردن زير سايت#############
$manage_site=injection_replace($_POST['manage_site']);
$manage_site='main';
$site_filter=injection_replace($_GET['site_filter']);
$site_filter='main';
if(($manage_site>0&&!in_array($manage_site,$_SESSION["manager_title_site"]))||($site_filter>0&&!in_array($site_filter,$_SESSION["manager_title_site"]))){
header('Location: new_manager_signout.php');exit;
}
############################################
if($edit_mode==0&&$title>""&&$_SESSION["can_add"]==1&&check_catogory($array_value)==1){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	$arr=array("publish_date"=>$publish_date,"attach_file"=>$attach_file,"blog_type"=>$blog_type,"navication_pic"=>$navication_pic,"continue_blog"=>$continue_blog,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand,"title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"abstract"=>$abstract ,"user_id"=>$_SESSION['manager_id'],"date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
	$id=insert_to_data_base($arr,'new_blog',$coms_conect);
 
	##pic
	/* $arr_imag=array("id"=>$id,"type"=>10,"adress"=>$blog_image,"name"=>'blog_image');
	insert_to_data_base($arr_imag,'new_file_path',$coms_conect); */
	

	####label
	if(!empty($meta_label)){
		$temp=explode(",",$meta_label);
		foreach($temp as $value){
			if($temp>""){			
				$label_arr=array("id"=>$id,"type"=>10,"label_id"=>$value);
				insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
			}
		}
	}
 	
	#####دسته بندي#######
	foreach($cat_arr as $value){
		if($value!=-1){
			$arr=array("cat_id"=>$value,"page_id"=>$id,"type"=>10);
			insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
		}
	}
	##اخبار مرتبط
	$related=explode(",",$totla_related);
	foreach($related as $value){
		if($value!=0){
			$arr=array("id"=>$value,"page_id"=>$id,"type"=>10);
			insert_to_data_base($arr,'new_related_madual',$coms_conect);
		}
	}	
	
	### slide show add 
	if($slide==1){
		$slide_link="/blog/$manage_lang/$id/".insert_dash("$title");
		$arr_slide=array("link"=>$slide_link,'site'>=$manage_site,'la'>=$manage_lang,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$id ,"type"=>10 ,"user_id"=>$user_id,"date"=>$now,"ip"=>$custom_ip);
		insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
	}
	####=مقاله ها	###  
	if(!empty($totla_article)){
		$temp_article=explode(",",$totla_article);
		foreach($temp_article as $image){
			if($image>""){			
				$gallery_arr=array("id"=>$id,"type"=>10,"adress"=>$image,"name"=>'blog_album');
				insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
			}
		}
	}
	
	show_msg($new_successfull);

}else if($edit_mode>0&&$title>""&&$_SESSION["can_edit"]==1&&check_catogory($array_value)==1){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
	$condition="id=$edit_mode";
	$arr=array("publish_date"=>$publish_date,"attach_file"=>$attach_file,"blog_type"=>$blog_type,"navication_pic"=>$navication_pic,"continue_blog"=>$continue_blog,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand  ,"title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"abstract"=>$abstract ,"edit_user_id"=>$_SESSION['manager_id'],"edit_date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
	update_data_base($arr,'new_blog',$condition,$coms_conect);
	
	/* $condition="id=$edit_mode && name='blog_image'";
	$arr_imag=array("id"=>$edit_mode,"type"=>10,"adress"=>$blog_image,"name"=>'blog_image');
	update_data_base($arr_imag,'new_file_path',$condition,$coms_conect); */
	
		####label
	$condition="id=$edit_mode and type=10";
	delete_from_data_base('new_mudoal_label',$condition,$coms_conect);	
	if(!empty($meta_label)){
		$temp=explode(",",$meta_label);
		foreach($temp as $value){
			if($temp>""){			
				$label_arr=array("id"=>$edit_mode,"type"=>10,"label_id"=>$value);
				insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
			}
		}
	}

#####دسته بندي#######
	$query1="delete from new_modules_catogory where page_id='$edit_mode' and type=10";
	$coms_conect->query($query1);
	foreach($cat_arr as $value){
		if($value!=-1){
			$arr=array("cat_id"=>$value,"page_id"=>$edit_mode,"type"=>10);
			insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
		}
	}
	####=مقاله ها	###  
	$query1="delete from new_file_path where id='$edit_mode' and type=10 and name ='blog_album'";
	$coms_conect->query($query1);
	if(!empty($totla_article)){
		$temp_article=explode(",",$totla_article);
		foreach($temp_article as $image){
			if($image>""){			
				$gallery_arr=array("id"=>$edit_mode,"type"=>10,"adress"=>$image,"name"=>'blog_album');
				insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
			}
		}
	}

	
#####related	
	$query1="delete from new_related_madual where page_id='$edit_mode' and type=10"; 
	$coms_conect->query($query1);
	$related=explode(",",$totla_related);
	foreach($related as $value){
		if($value!=0){
		$arr=array("id"=>$value,"page_id"=>$edit_mode,"type"=>10);
		insert_to_data_base($arr,'new_related_madual',$coms_conect);
		}
	}	
	### slide show update 		
	if($slide==1){
		$slide_link="/blog/$manage_lang/$edit_mode/".insert_dash("$title");
		$query1="select count(id) as count from new_slideshow where page_id='$edit_mode' and type=10";
		$result = $coms_conect->query($query1);
		$row = $result->fetch_assoc();
		$count=$row['count'];
		if($count!=0){
			$condition="page_id=$edit_mode";
			$arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>10 ,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"ip"=>$custom_ip);
			update_data_base($arr_slide,'new_slideshow',$condition,$coms_conect);
			
		}
		else{
			$arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>10 ,"user_id"=>$edit_user_id,"date"=>$now,"ip"=>$custom_ip);
			insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
		}
	}else{
		$query1="delete from new_slideshow where page_id='$edit_mode' and type=10";
		$coms_conect->query($query1);
	}
	show_msg($new_successfull);
}



 create_session_token(); 
##################################
?>
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
					<video id="example_video_11" class="video-js vjs-default-skin vjs-big-play-centered"   controls preload="none" width="100%" height="400px"
					data-setup="{}">
					<source id="show_add_video_modual0" src="http://localhost/new_video_pic/default.MP4" type='video/mp4'   />
					</video>
			 </div>	
		</div>
	</div>
</div>

 <div class="modal fade" id="show_voice_grid" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id='close_video_modual' class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title custom_align" id="Heading">نمایش</h4>
			</div>
			<div class="modal-content">
					<audio width="320" class="video-js vjs-default-skin vjs-big-play-centered" id="example_voice_1" controls preload="none">
						 <source id="show_add_voice_modual0" src="http://localhost/source/comsroot/SleepAway.mp3" type="audio/mp3">
					<audio>
			 </div>	
		</div>
	</div>
</div>
</fieldset>	
 <div class="modal fade" id="show_add_video" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="100%" height="400px"
				data-setup="{}">
				<source id="show_add_video_modual" src="http://localhost/new_video_pic/default.MP4" type='video/mp4'  style="display:none"/>
				</video>
			</div>
		</div>
	</div>
</div> 
<fieldset>




<div class="modal fade" id="show_contact" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">&times;</span>
					</button>
					  مطالب مرتبط
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
			<button type="button" id="btn_ok_news" value="" data-dismiss="modal" class="btn btn-primary conbtnGetAll" ><span class="glyphicon glyphicon-ok-sign"></span> افزودن </button>
		   </div>
		</div>
	</div><!-- /.modal-dialog --> 
</div>
</fieldset>

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
			$("#show_add_video_modual0").attr('src','');
			$("#example_video_11 video")[0].load();
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
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتويات زير اطمينان داريد؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_ok_page"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
		</div>
	</div>
	</div>
</div> 

 <div class="modal fade" id="del_reated_news" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>  آيا از حذف محتويات زير اطمينان داريد؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_del_related_news"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
		</div>
	</div>
	</div>
</div> 

  <div class="modal fade" id="del_ajax_article" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading">حذف</h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف محتويات زير اطمينان داريد؟</div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="btn_del_ajax_article"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
		</div>
	</div>
	</div>
</div>

	<form class="form-horizontal" id="news_search" name="news_search" action="" role="form" method="get" enctype="multipart/form-data">
<input type="hidden" value="new_blog" name='yep'>
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
								<label class="col-md-3 control-label" for="edit_name">عنوان جستجو</label>
								<div class="col-md-4">
								<?$search_txt=injection_replace($_GET['search_txt'])?>
									<input id="search_txt" name="search_txt" value="<?=$search_txt?>" type="text" placeholder="" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_family">فيلد</label>
								<div class="col-md-4">
									<?$field=injection_replace($_GET['field'])?>
									<select class="dropdown" rows="5" name="field">
										<option <?if($field==0) echo 'selected'?> value="0">همه</option>
										<option <?if($field==1) echo 'selected'?> value="1">عنوان</option>
										<option <?if($field==2) echo 'selected'?> value="2">خلاصه مطلب</option>
										<option <?if($field==3) echo 'selected'?> value="3">ادامه مطلب</option>
										<option <?if($field==9) echo 'selected'?> value="9">Meta Keywords</option>
										<option <?if($field==10) echo 'selected'?> value="10">Meta Description</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_family">دسته بندي</label>
								<div class="col-md-4">
								<?$cat_filter=injection_replace($_GET['cat_filter'])?>
									<input  type="text" name="cat_filter" value="<?=$cat_filter?>" id="cat_filter" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; ">
									</select>
								</div>
							</div>
							<?$mudoal_lock_filter=(injection_replace($_GET['mudoal_lock_filter']));?>
							<div class="form-group">
								 <label class="col-md-3 control-label">نوع انتشار</label>
									<div class="col-md-4">
										<select id="mudoal_lock_filter" name="mudoal_lock_filter" class="form-control">
											<option value="" <?if($mudoal_lock_filter=="") echo 'selected'?>>همه</option>
											<option value="1" <?if($mudoal_lock_filter==1) echo 'selected'?>>ويژه اعضاء</option>
											<option value="0" <?if($mudoal_lock_filter==0) echo 'selected'?>>عمومي</option>
										</select>
									</div>
							</div>
							<div class="form-group">
								 <label class="col-md-3 control-label">ترتيب اهميت</label>
									<div class="col-md-4">
									<?$is_importand_filter=(injection_replace($_GET['is_importand_filter']));?>
										<select id="is_importand_filter" name="is_importand_filter" class="form-control">
											<option value="" <?if($is_importand_filter=="") echo 'selected'?>>همه</option>
											<option value="0" <?if($is_importand_filter==0) echo 'selected'?>>عادي</option>
											<option value="1" <?if($is_importand_filter==1) echo 'selected'?>>ويژه</option>
										</select>
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
						<button id="singlebutton"  class="btn btn-primary">جستجو</button>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
	</form>


<!-- switch lock unlock -->
<style>
	input[type=checkbox].ace.ace-switch.ace-switch-6+.lbl::before {content: "\f023";}
	input[type=checkbox].ace.ace-switch.ace-switch-6:checked+.lbl::before {content: "\f09c";}
	
</style>

</br>
<div class="tabbable">
	  <ul class="nav nav-tabs" style="margin-top:2px;border-bottom: 0;  display: none;">
			<li class="pull-right" style="right:1%;" id="newpag">
				<i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span data-toggle="tab" href="#write" title="صفحه جديد"><i class="ace-icon fa fa-plus bigger-110"></i></span>
				</i>
				<div class="collapse navbar-collapse" id="nav-collapse">
					<ul class="nav navbar-nav navbar-left">
					<a data-toggle="tab" href="#write" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
						<i class="ace-icon fa fa-plus bigger-110"></i>
						صفحه جديد</a>
					</ul>
				</div>
			</li>	
 
			<li style="display:none;" class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			مديريت محتوا </a></li>
	  </ul>
	  <div class="msheet tab-content">
	  
	  <div class="secfhead">
<!-- #section:blog/blog.head -->
<div class="sectitle">
<div class="icon"><span class="flaticon-file23" style=""></span></div>
<div class="title"><p class="titr">ليست بلاگ</p><p class="lead">توضيحات اين بخش</p></div>
</div>
<!-- /section:blog/blog.head -->

<div class="toolmenu">
<ul>
<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

<li id="newpag" class="addicon">
	<a href="#write" data-toggle="tab" data-placement="bottom" title="افزودن نوشته جدید" >
		<span class="flaticon-add149"></span>
	</a>
</li>
 
<li>
	<a  data-toggle="modal" data-target="#searching" data-placement="top"    title="جستجوي پيشرفته" >
		<span class="flaticon-search74"></span>
	</a>
</li>
</ul>
</div>

</div>

			<div class="tab-pane <?if($edit_id=="") echo 'active'; else echo '';?> " id="tab1">
			<!-- #section:blog/blog.table -->
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
								<i type="button" class="navbar-toggle btn-danger" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"  style="height: 34px;padding-top: 8px;border-radius: 5px;margin-left: 0px;top: 2px;left: 5px;">
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
						
							<div class="form-group yepco">
									<form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
										<input type="hidden" name="yep"  value="new_blog">
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
			
					<table cellpadding="0" id="new_page_table" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
						<thead>
							<tr >
								<th class="center">رديف</th>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>
								</th>
								<th class="center">عنوان</th>
								<th class="center">نوع بلاگ</th>
								<th class="center">نام کاربری نویسنده</th>
								<th class="center">تاریخ انتشار</th>
								<th class="center">نام سايت</th>
								<th class="center">نوع</th>
								<th class="center">بازديد</th>
								<th class="center">فعال سازي نظر</th>
								<th class="center">وضعيت</th>
								<th class="center">امکانات</th>
							</tr>
						</thead>
						<tbody>
						<?$manager_user_permisson= implode(",",$_SESSION["manager_user_permisson"]); 
					 $manager_title_site="'".implode("','",$_SESSION["manager_title_site"])."'";
					 $manager_title_lang="'".implode("','",$_SESSION["manager_title_lang"])."'";
					if($site_filter==-1){
								$str_site=" and a.site in ($manager_title_site)";
								$site_page="&site_filter=$site_filter";
							}
							else if($site_filter>""){
								$str_site=" and a.site='$site_filter'";
								$site_page="&site_filter=$site_filter";
							}
						if($q>""){
							$str_q="  and(a.abstract like '%$q%' or a.title like '%$q%' or a.name like'%$q%' or a.meta_description like'%$q%' or a.meta_keyword like'%$q%'    or a.continue_blog like'%$q%')";
							$manager_q="&q=$q";
						}
						 if($lang_filter==-1){
								 
								$str_lang=" and a.la in ($manager_title_lang)";
								$lang_page="&lang_filter=$lang_filter";
							}
							else if($lang_filter>""){
								$str_lang=" and a.la='$lang_filter'";
								$lang_page="&lang_filter=$lang_filter";
							}
						
							if($manager_filter>0){
								$str_manager=" and  a.user_id='$manager_filter'";
								$manager_page="&manager_filter=$manager_filter";
							}
							else 
							$str_manager=" and  a.user_id in ($manager_user_permisson)";
						
						####جستجوي پيشرفته
						$search_status=injection_replace($_GET['search_status']);
						if($search_status>""){
							$str_status=" and a.status='$search_status'";
							$status_page="&status_filter=$search_status";
						}
						
						if($mudoal_lock_filter>""){
							$str_lock=" and a.mudoal_lock='$mudoal_lock_filter'";
							$lock_filter="&lock_filter=$mudoal_lock_filter";
						}
						if($is_importand_filter>""){
							$str_important=" and a.is_importand='$is_importand_filter'";
							$important_filter="&important_filter=$is_importand_filter";
						}
 
						if($field>""){
							$field_page="&field=$field&search_txt=$search_txt";
							switch ($field) {
								case 0:
									$str_field=" and (a.title like '%$search_txt%' 
									or 	a.continue_blog like '%$search_txt%'
									or 	a.meta_keyword like '%$search_txt%'
									or 	a.meta_desciption like '%$search_txt%'
									or 	a.abstract like '%$search_txt%'
									 )";
									break;
								case 1:
									$str_field=" and a.title like '%$search_txt%'";
									break;
								case 8:
									$str_field=" and a.abstract like '%$search_txt%'";
									break;
								case 9:
									$str_field=" and a.meta_keyword like '%$search_txt%'";
									break;
								case 10:
									$str_field=" and a.meta_desciption like '%$search_txt%'";
									break;
							}
						}
						$cat_filter=injection_replace($_GET['cat_filter']);
						if($cat_filter>""){
							$str_cat=" and b.cat_id in($cat_filter)";
							$cat_page="&cat_filter=$cat_filter";
						}else 
						$str_cat=" and b.cat_id in({$_SESSION['manager_page_cat_str']})";
						################################################################
							$sql1 = "SELECT count(id) as cnt  from new_blog a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and b.type=10 
							$str_site $str_lang $str_manager $str_q $str_cat $str_expire $str_lock $str_important $str_status
							";
							
							$result = $coms_conect->query($sql1);
							$RS = $result->fetch_assoc();
							$page=injection_replace($_GET["page"]);
							$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_blog$lang_page$site_page$manager_page$important_filter$lock_filter$manager_q$status_page$expire_page$cat_page$field_page");
							$from=$a[0];
							$to=$a[1];
							$pgsel=$a[2];
							
							$sql12 = "SELECT a.can_comment,a.attach_file,a.blog_type,a.user_id,a.publish_date,a.site,a.la,a.title,a.id ,a.mudoal_lock,a.view,a.status   from new_blog a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and b.type=10 
							$str_site $str_lang $str_manager $str_q $str_cat $str_expire $str_lock $str_important $str_status
							group by b.page_id
							order by a.id desc
							LIMIT $from,$to";
							//echo $sql1;							
							################################################################
							$resultd1 = $coms_conect->query($sql12);
							if($page>1)$k=($page-1)*10;else $k=0;$k++;
								while($row = $resultd1->fetch_assoc()) {
								$ide=$row['id'];
								$id=$row['id'];
							?>
							<tr>
								<td class="center"><?=$k?></td>
								<td class="center" style="border-right: none;border-left: none;">
									<label class="position-relative">
										<input id='<?=$id?>' type="checkbox"   class="conchkNumber"/>
										<span class="lbl"></span>
									</label> 
								</td>
								<?if($row['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $row['site'].'.'.$domain_name;?>
								<td><a href="/<?="$domain/blog/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" target="_blank"><?=$row['title']?></a></td>
								 <td><?=get_blog_type($row['blog_type'])?></td> 
								 <td><?=get_result("select user_name from new_managers where id='{$row['user_id']}'",$coms_conect)?></td> 
								 <td><?=miladitojalaliuser(date('Y-m-d',$row['publish_date']));?></td> 

							 
								<td><a href="/<?=$domain?>" target="_blank"><?=$row['site']?></a></td>
								<td><?if($row['mudoal_lock']==1) echo 'ويژه اعضا';else echo 'عادي';?></td>
								 <td><?=$row["view"]?></td> 
								 <td><label></label>
										<input  id="<?=$row['id']?>" name="switch-field-1" <?if($row['can_comment']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 can_comment"  type="checkbox" />
										<span title="فعال سازي نظر"class="lbl"></span></td> 
								<td>
									<span class="status_news editable editable-click" data-pk="<?=$row["id"]?>" ><?if($row["status"]==1){echo 'منتشر شده';}else{echo 'پيش نويس';}?></span>
								</td>
								<td>
									<?if($_SESSION["can_edit"]==1){?>	
									<a target="_blank" id="<?=$id?>" class="edit_menu blue icon"  href="newcoms.php?yep=new_blog&edit_id=<?=$id?>">
										<i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
									</a>
									<?}if($_SESSION["can_delete"]==1){?>	
									<a    href="#" id="<?=$id?>" class="del_menu red icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
										<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
									</a>
									<?}if(get_result("select count(id) from new_madules_comment where type=10 and status=0 and madul_id={$row['id']}",$coms_conect)){?>
									<a target="_blank" href="/newcoms.php?yep=new_blog_comments" class="del_menu green icon">
										<?=mudoal_comment_count($row['id'],10,$coms_conect)?><i class="ace-icon fa fa-comments bigger-120" title="نظرات"></i>
									</a>
								  <?}if($row['blog_type']==0){?>
									<a href="/<?="$domain/blog/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" target="_blank" class="del_menu blue icon">
										<i class="ace-icon fa fa-vimeo-square bigger-120" title="متنی"></i>
									</a>
							    	<?}if($row['blog_type']==1){?>
									<a href="#"   id="<?=$row['attach_file']?>" class="show_video_modual icon"  data-toggle="modal" data-target="#show_video_grid">
										<i class="ace-icon fa fa-film bigger-120" title="فیلم"></i>
									</a>
									<?}if($row['blog_type']==3){?>
									<a href="#"   id="<?=$id?>" class="green show_news_gallery icon" data-toggle="modal" data-target="#show_news_gallery">
										<i class="ace-icon fa fa-picture-o bigger-120" title="البوم عکس"></i>
									</a>
									<?}if($row['blog_type']==2){?>
									 <a href="#"   id="<?=$row['attach_file']?>" class="blue show_voice_modual icon">
										<i class="ace-icon fa fa-volume-up bigger-120" title="صدا"  data-toggle="modal" data-target="#show_voice_grid" ></i>
									</a>
									<?}?>
									<label></label>
										<input  id="<?=$row['id']?>" name="switch-field-1" <?if($row['mudoal_lock']==1) echo 'checked'?> class="ace ace-switch ace-switch-6 conchkNumber_4"  type="checkbox" />
										<span title="فعال سازي"class="lbl"></span>
								</td>
							</tr>
						<?$k++;}?>
						
						</tbody>
					</table>
				
				</div>	
				<!-- /section:blog/blog.table -->
			</div>
		<?=$pgsel;?>
		
			<div class="tab-pane   <?if($edit_id>"") echo 'active'; else echo '';?>" id="write">

			
				<form class="form-horizontal" id="article_form" name="article_form" action="" role="form" method="post" enctype="multipart/form-data"
					data-fv-framework="bootstrap"
					data-fv-message="This value is not valid"
					data-fv-icon-validating="glyphicon glyphicon-refresh">
					<input type="hidden"  id="edit_mode" name="edit_mode" value="<?if($edit_id>0) echo $edit_id ;else echo 0;?>">
					<input type="hidden" id="array_value" name="array_value" value="0">
					<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
					<input type="hidden" id="check_value" name="check_value" value="0">
						<input type="hidden" name="status" id="status" value="<?=$status?>">
						<input type='submit'  id='submit_btn' style='display:none'>  
						<div id="id-message-new-navbar" class="message-navbar clearfix">
						
						<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخيره">
							<span class="flaticon-verified9">
							</span>
						</a>
						<a href="#" class="save-draft2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="پیش نویس">
							<span class="flaticon-browser93">
							</span>
						</a>
						<a href="newcoms.php?yep=new_blog" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
						</a>
						
						
						<!--	<div class="message-bar">
								<h2 style="color: #2a8bcb;">صفحه جديد / ويرايش</h2>
							</div>-->

							<div style="display:none;">
								<div class="messagebar-item-left" id="btnback">
									<a href="newcoms.php?yep=new_Pages"  class="active">
										<i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
										<b class="middle bigger-110">برگشت </b>
									</a>
								</div>
								 
								<div class="messagebar-item-right">
									<span class="inline btn-send-message">
										<!--button type="submit" class="btn btn-sm btn-primary no-border btn-white btn-round">
											<i class="ace-icon fa fa-file-text"></i>
											<span class="bigger-110">پيش نويس</span>
										</button-->
										<button type="submit" id="submit_page" class="btn btn-sm btn-primary no-border btn-white btn-round">
											<i class="ace-icon fa fa-check"></i>
											<span class="bigger-110">ذخيره</span>
										</button>
									</span>
								</div>
							</div>
						</div>
						</br>
<?###############نمايش در حالت ويرايش#################
if($edit_id>""){
	$query="SELECT * FROM new_blog where id='$edit_id'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$status=$row['status'];
	$title=$row['title'];
	$blog_type=$row['blog_type'];
	$attach_file=$row['attach_file'];
	$text=$row['text'];
	$slide=$row['slide'];
	
	$publish_date=miladitojalaliuser(date('Y-m-d',$row['publish_date']));
	$continue_blog=$row['continue_blog'];
	$la=$row['la'];
	$site=$row['site'];
	$label='';
		$query="select label_id from new_mudoal_label where id='$edit_id' and type=10";
		$result = $coms_conect->query($query);$i=1;$str='';
		 while($RS1 = $result->fetch_assoc()) {
			if($i!=1)$str=',';
			$label .=$str.$RS1['label_id'];$i++;
		}	
	$meta_keyword=$row['meta_keyword'];
	$meta_desciption=$row['meta_desciption'];
	if($row['spesial_start_date']>0)
	$spesial_start_date=miladitojalaliuser(date('Y-m-d',$row['spesial_start_date']));

	if($row['spesial_finish_date']>0)
	$spesial_finish_date=miladitojalaliuser(date('Y-m-d',$row['spesial_finish_date']));
	$abstract=$row['abstract'];
	$can_comment=$row['can_comment'];
	$navication_pic=$row['navication_pic'];
	$mudoal_lock=$row['mudoal_lock'];
	$is_importand=$row['is_importand'];
	if($blog_type==1)
	$blog_video=$row['attach_file'];
	else 	if($blog_type==2)
	$blog_voice=$row['attach_file'];
	//else $blog_type='';
	
	#Query from new_slideshow
	$query="SELECT * FROM new_slideshow where page_id='$edit_id' and type=10";
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
	 $query="SELECT adress FROM new_file_path where id='$edit_id' && name='blog_image' and type=10";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$blog_image=$row['adress']; 
	
	$query="SELECT id FROM new_related_madual a  where page_id='$edit_id'  and type=10";
	$result = $coms_conect->query($query);
	$totla_related="";$i=1;
	while($row = $result->fetch_assoc()){
		if($i!=1)$str=',';$i++;
		$totla_related .=$str.$row['id'];
	}
 
		$query="select adress from new_file_path where id='$edit_id' and type=10 and name='blog_album'";
		$result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
		 while($RS1 = $result->fetch_assoc()) {
			if($i!=1)$str=',';
			$articles_list .=$str.$RS1['adress'];$i++;
		}

}?>				
					<fieldset style="margin-top: -15px;"> 
						<div class="tabbable tabs-left">
							<ul class="nav nav-tabs" id="myTab3">
								<li class="active">
									<a data-toggle="tab" href="#home3">
										<p class="flaticon-file23">محتوا </p>
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#cat3">
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
										تنظيمات اسلايد شو 
									</a>
								</li>
								<li>
									<a id="pic_li" data-toggle="tab" href="#upfiles" <?if($blog_type!=3){?> style="display:none"<?}?>>
										<p class="flaticon-upload36"></p>
										تصاویر 
									</a>
								</li>
								<li>
									<a id="voice_li" data-toggle="tab" href="#blog_voice_div" <?if($blog_type!=2){?> style="display:none"<?}?>  
										<p class="flaticon-upload36"></p>
										صوت 
									</a>
								</li>
								<li>
									<a id="video_li" data-toggle="tab" href="#blog_video_div" <?if($blog_type!=1){?> style="display:none"<?}?>  
										<p class="flaticon-upload36"></p>
										ویدئو 
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#relatednews">
										<p class="flaticon-copy23"></p>
										وبلاگ مرتبط 
									</a>
								</li>								
							</ul>

							<div class="tab-content">
								<div id="home3" class="tab-pane in active">
									
										<div class="row-fluid" style="margin-top:25px;"> 
										<!-- #section:blog/blog.base -->
											<div style="padding-left:0;" class="col-md-12">
												<div class="row-fluid"> 
													<div class="col-md-8">
														<div class="form-group btn-group">
															<label class="control-label">نوع بلاگ</label> 
															<select id="blog_type" name="blog_type" class="form-control">
																  <option value="0" <?if($blog_type<1) echo 'selected'?>>متنی</option>
																  <option value="1" <?if($blog_type==1) echo 'selected'?>>ویدئویی</option>
																  <option value="2" <?if($blog_type==2) echo 'selected'?>>صوتی</option>
																  <option value="3" <?if($blog_type==3) echo 'selected'?>>تصویری</option>
															</select>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-6">
																<label class="control-label">عنوان *</label> 
																<input id="title" name="title"  value="<?=$title?>" type="text" placeholder="" class="form-control"
																data-fv-notempty="true"
																data-fv-notempty-message="پر کردن اين فيلد الزامي است" />	
														  </div>
														</div>
														<!--div class="form-group">
															<div class="form-group col-md-6">
																<label class="control-label" for="group_name">سايت</label> 
																<?create_sub_site_title($site,$coms_conect,$_SESSION["manager_title_site"]);?>															
															</div>
														</div-->
														<div class="form-group">
															<div class="form-group col-md-6">
																<label class="control-label" for="group_name">زبان</label> 
																<?create_lang_title($la,$coms_conect,$_SESSION["manager_title_lang"]);?>															
															</div>
														</div>
 
														
														<!--div class="form-group">
															<div class="form-group col-md-6">
															  <label class="control-label" for="singlebutton">افزودن تصوير</label>
															  
																	<div class="imgdemo"><img id='article_pic_previwe' src="/yep_theme/default/rtl/images/pic.png"></div>
																		<script>
																		setInterval(check_address,2000)													
																		function check_address() {
																			var aks_news = $('#blog_image').val(); 
																			if(aks_news!=""){				
																				$('#article_pic_previwe').attr("src",aks_news);						
																			}
																		 }
																						</script>	
																	<a href="/filemanager/dialog.php?type=1&amp;field_id=blog_image"   class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;    vertical-align: bottom;"><span class="addimg flaticon-add133"></span></a>
												
																<input id="blog_image" value="<?=$blog_image?>" name="blog_image" class="imginput" type="text"  >
															  </div>
														</div-->
														<div class="form-group">
															<div class="form-group col-sm-12">
																<label class="control-label" for="abstract">چکيده</label>
																	<textarea  id="text" placeholder=" " name="abstract"  class="form-control" rows="3"><?=$abstract?></textarea>
																							 <!--<script>CKEDITOR.replace( 'text' );</script>-->
																		 <script>
																			tinymce.init({
																			selector: "#text",
																			tooltip:'حداقل 70 و حداکثر 350 کاراکتر',
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
															<div class="form-group col-sm-12">
																<label class="control-label" for="continue_blog">ادامه مطلب</label>
																	<textarea  id="continue_blog" name="continue_blog"  class="form-control" rows="3"><?=$continue_blog?></textarea>
																							 <!--<script>CKEDITOR.replace( 'text' );</script>-->
																		 <script>
																			tinymce.init({
																			selector: "#continue_blog",
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
<style>
@media (min-width: 998px){
.mdate{padding-left: 0px !important;text-align: left;}
.startend{text-align:center;}}
</style>														
													<div class="col-md-4 mset">
														<div class="form-group">
															<div class="col-md-6 mdate">
																<label class="control-label" for="publish_date">تاريخ انتشار</label> 
																<a href="#"><span class="dateicon flaticon-calendar53"></span></a>
															</div>	
															<div class="col-md-6">	
																<input id="publish_date" name="publish_date" value="<?if($publish_date==""){ echo miladitojalaliuser(date('Y-m-d'));}else echo $publish_date;?>" class="dateinput" type="text" style="max-width: 120px;height: 34px;">
															</div>
														</div>

															<!-- Select Basic -->
															<div class="form-group">
															  <label class="control-label col-md-6" for="mudoal_lock">نوع انتشار</label>
															  <div class="col-md-6">
																<select id="mudoal_lock" name="mudoal_lock" class="form-control">
																  <option value="1" <?if($mudoal_lock==1) echo 'selected'?>>ويژه اعضاء</option>
																  <option value="0" <?if($mudoal_lock==0) echo 'selected'?>>عمومي</option>
																</select>
															  </div>
															</div>

															<!-- Select Basic -->
															<div class="form-group">
															  <label class="control-label col-md-6" for="is_importand" >ترتيب اهميت</label>
															  <div class="col-md-6">
																<select id="is_importand" name="is_importand" class="form-control">
																  <option value="0" <?if($is_importand==0) echo 'selected'?>>عادي</option>
																  <option value="1" <?if($is_importand==1) echo 'selected'?>>ويژه</option>
																</select>
															  </div>
															</div>
															
															<div class="form-group" id="add_temp0" <?if($is_importand!=1){?>style="display:none"<?}?>>
																<div class="col-md-12 startend">
																	<label class="control-label" for="family" >مدت نمايش نوشته (پايان- شروع )</label>
																</div>
																<div class="col-md-12">
																	<div class="input-daterange input-group">
																		<input type="text" value="<?if($spesial_start_date>0) echo $spesial_start_date?>" class="input-sm form-control" name="spesial_start_date" id="spesial_start_date" palceholder="از"/>
																		<span class="input-group-addon">
																			<i class="fa fa-exchange"></i>
																		</span>
																		<input type="text" class="input-sm form-control" value="<?if($spesial_finish_date>0) echo $spesial_finish_date?>" name="spesial_finish_date" id="spesial_finish_date" palceholder="تا"/>
																	</div>
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
													</div>
												</div> 
											<!-- /section:blog/blog.base -->	
											</div> 
										</div>

								<?$type=10;
								include 'newcoms/main/new_modual_catogory.php4';?>
								<?include 'newcoms/main/new_nav_pic.php4';?>

								
								<div id="blog_pic_div" class="tab-pane"  >
									<div class="form-group" id="nav_pic_div" style="margin-top:25px;">
											<label class="control-label" for="singlebutton">البوم تصاویر</label>
											<div class="headerimgdemo">
											<img id="aks_thumb00" src="/yep_theme/default/rtl/images/pic.png"> 
											</div>
												 <script>
													setInterval(check_address2,2000)													
													function check_address2() { 
														var aks_news = $('#blog_image').val(); 
														if(aks_news!=""){				
															$('#aks_thumb00').attr("src",aks_news);						
														}
													}
												 </script>	
											<div>
												<input id="blog_image" value="<?=$blog_image?>" name="blog_image" class="imginput" type="text" >
												<a href="/filemanager/dialog.php?type=1&amp;field_id=blog_image" class="btn btn-success iframe-btn" style="padding: 5px 5px 2px 5px; vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>
											</div>
										</div>	
										</br>
										</br>
										</br>
									</br>
								</div>
							<div id="blog_voice_div" class="tab-pane" >
									<div class="form-group" id="nav_pic_div" style="margin-top:25px;">
									<!-- #section:blog/blog.voice -->
											<label class="control-label" for="singlebutton">صوت</label>
											<div><input id="blog_voice" value="<?=$blog_voice?>" name="blog_voice" class="imginput" type="text" >
												<a href="/filemanager/dialog.php?type=0&amp;field_id=blog_voice" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;"><span class="addimg flaticon-add139"></span></a>
											</div>
									<!-- /section:blog/blog.voice -->		
										</div>	
										</br>
										</br>
										</br>
									</br>
								</div>
							<div id="blog_video_div" class="tab-pane"><!-- #section:blog/blog.video -->
									<div class="form-group" id="nav_pic_div" style="margin-right: 30px;"> 
											<label class="control-label" for="singlebutton">آپلود ویدئو</label>
											
												<div>
													<div><input id="blog_video"  value="<?=$blog_video?>" name="blog_video" class="imginput" type="text" >
													<a href="/filemanager/dialog.php?type=3&amp;field_id=blog_video" class="holam btn btn-primary iframe-btn"><span class="holam flaticon-search85"></span></a>
													<a href="#" id="add_videos" class="holam btn btn-success" title="افزودن"><span class="holam flaticon-round68"></span></a>
													<a href="#" id="del_videos" class="holam btn btn-danger" title="حذف"><span class="holam flaticon-delete84"></span></a>
													</div>
													<img id="show_waiting_video" src="waiting.gif" dir="center" style="display:none">
												</div>
												<div id="show_video" class="row" style="position: relative;top: 20px;">
												</div>
											
											<?if($blog_video>""){?>
												<script>
													if($("#blog_video").val()>""){
														$("#show_waiting_video").show();
														$.ajax({
															type:'POST',
															url:'New_ajax.php',
															data:"action=show_videos&id="+$("#blog_video").val(),
															success: function(result){
																$("#show_waiting_video").hide();
																$("#show_video").html(result);	
															}
														});	
													}				
												</script>
											<?}?>
										</div>	
										</br>
										</br>
										</br>
									</br>
									<!-- /section:blog/blog.video -->
								</div>
								
								
								<?include 'newcoms/main/new_modual_seo.php4';?>
								<?include 'newcoms/main/new_modual_slide.php4';?>
									<div id="upfiles" class=" tab-pane    ">
										<div class="uploadbts" style="margin-top:25px;">
										<!-- #section:blog/blog.img -->
											<div class="form-group">
												<label class="col-md-2 control-label">آپلود گالري تصاوير</label>
												<div class="form-group input-group">
													<input type="text" value="" id="news_gallery">
													<a href="/filemanager/dialog.php?type=1&amp;field_id=news_gallery" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
													<a id="add-image-to-gallery" class="btn btn-info " style="top: 2px;height: 40px;padding-top: 6px;">افزودن<i class="fa fa-plus"></i></a>
													<img id="show_waiting" src="waiting.gif" style="display:none;z-index=90000">
												</div>
													<?if($edit_id>""){?>
													<script>
															$(function () {	
																var aks = '<?=$articles_list?>';
																if (aks!=""){
																	$("#add-image-to-gallery").attr("disabled", false);
																	$("#articles_list").append('<option value="'+aks+'" selected="selected">'+aks+'</option>')
																	$("#news_gallery").val("");//empty textbox
																	$("#show_waiting").show();
																
																	$.ajax({
																		type:'POST',
																		url:'New_ajax.php',
																		data:"action=add_blogs&id=<?=$articles_list?>",
																		success: function(result){
																			$("#show_waiting").hide();
																			var b=result.split('~~');
																			$("#add_articles").html(b[0]);		
																			$("#btn_del_related_news").val('');
																			
																		}
																	});
																} 
															});
															$(function () {	
																$.ajax({
																			type:'POST',
																			url:'New_ajax.php',
																			data:"action=show_related_blog_show&id=<?=$totla_related?>",
																			success: function(result){
																				$("#relatednews").html(result);	
																			}
																		});	
																});	 
													</script>
													<?}?>
													<script>
															$( "#add-image-to-gallery" ).click(function(event) {
																event.preventDefault();							
																var aks = $("#news_gallery").val();
																var index = aks.lastIndexOf("/") + 1;
																var filename = aks.substr(index);
																if (aks!=""){
																	$("#show_waiting").show();
																	$("#add-image-to-gallery").attr("disabled", false);
																	$("#articles_list").append('<option value="'+aks+'" selected="selected">'+aks+'</option>')
																	$("#news_gallery").val("");//empty textbox
																	$.ajax({
																		type:'POST',
																		url:'New_ajax.php',
																		data:"action=add_blogs&id="+$("#articles_list").val()+"&value="+$("#edit_mode").val(),
																		success: function(result){
																			
																			$("#show_waiting").hide();
																			var b=result.split('~~');
																			$("#add_articles").html(b[0]);		
																			$("#btn_del_related_news").val('');
																		}
																	});
																} 
															});
															$(document).on('click', '#delete_image', function(event) {
																event.preventDefault();		
																var address = $(this).parentsUntil("ul").find('img').attr("src");								
																$(this).parentsUntil("ul").remove();
																$("#imagelist option[value='"+address+"']").remove();
																 $.ajax({
																		type:'POST',
																		url:'New_ajax.php',
																		data:"action=delete_ajax_blog_pic&id="+$(this).attr('data-id')+"&value="+$(this).attr('data-addres'),
																		success: function(result){
																		}
															
																	});	
															});
														</script>
														<select hidden id="articles_list" name="articles_list[]" multiple="multiple">
															<?
															$query="SELECT * FROM new_file_path where id='$edit_id' && name='news_gallery'";
															$gallery_result = $coms_conect->query($query);
															while($RS1 = $gallery_result->fetch_assoc()) {
															$adress=$RS1["adress"];
															echo '<option value="'.$adress.'" selected="selected">'.$adress.'</option>';
															}
															?>
														</select>
												</div>
												<ul id="add_articles" class="ace-thumbnails clearfix">
												</br>
										<!-- /section:blog/blog.img -->		
											</div>
										</div>
										<img id="show_waiting_related" src="waiting.gif" dir="center" style="display:none">
										<div id="relatednews" class="tab-pane fade">
										<!-- #section:blog/blog.relate -->
											<div class="uploadbts">
												<a   data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip">
												<button><span class="flaticon-add133"></span><span>افزودن نوشته</span></button></a>
											</div>
										<!-- /section:blog/blog.relate -->	
										</div>
									</div>
								</div>
								</br>	
							<div class="panel-footer bttools">	
								<a   id="save-draft2" class="btn btn-primary save-draft2"><span class="flaticon-browser93"></span><span>پیش نویس</span></a>
								<a  id="submit2" class="btn btn-success submit2"><span class="flaticon-verified9"></span><span>انتشار</span></a>
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
							</div>
						</fieldset>
					</div>
				</div>
		</div>

 	
<style>
	.editableform .form-control {
		width: auto;
		direction: ltr;
	}
	.editable-clear-x {
		width: 0px;
	}
</style>
<script>
$(document).ready(function(){
$("#newpag").click(function(){
        $("#newpag").hide();
        $("#switchword").hide();
    });
    $("#btnback").click(function(){
        $("#newpag").show();
        $("#switchword").show();
    });

});
</script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/new_plugin/video-js/js/video.js"></script>
<script>
    videojs.options.flash.swf = "video-js/js/video-js.swf";
</script>	
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>												
<script src="ajax_js/blog.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/colorbox.css" />
<?$_SESSION["del_item"]='del_blog';
$_SESSION["edit_item"]='change_lock_blog';
$_SESSION["change_chideman"]='change_chideman';
$_SESSION["copy_site"]='copy_site_page';
$_SESSION["cut_site"]='cut_site_page';?>
 

<script type="text/javascript">
$(function() {
  $.fn.editable.defaults.mode = 'inline';

  $('.status_news').editable({
		type: 'select',
		name:'change_status_article',
		url: '/New_ajax.php',
		source:"{1: 'منتشر شده',0: 'پيش نويس'}",
		ajaxOptions: {
			type: 'get',
		},
		error: function(response) {
			alert(response);
		}
   });
});
</script>

<script>
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
		
		$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});
		$("#start2").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});
		$("#end2").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});
		$("#publish_date").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
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
		$("#publish_search").datepicker({
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
		$("#start_Slide_show").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});
 
	$(document).ready(function(){
		hidevizhe = function () {
			$("#add_temp0").hide();
			$("#spesial_start_date").val('');
			$("#spesial_finish_date").val('');
			
		};
		handleNewSelection = function () {
			hidevizhe();
			switch ($(this).val()) {
				case '1':
				$("#add_temp0").show();
				break;
			}
		};
		$("#is_importand").change(handleNewSelection);                                                                                                                                     });
 
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
    $('#article_form').formValidation({
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
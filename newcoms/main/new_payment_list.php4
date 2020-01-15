<?$_SESSION["modual_type"]=1?>
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

<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script> 
<link type="text/css" href=" /new_orakuploader/orakuploader.css" rel="stylesheet"/>

<script type="text/javascript">
 $(document).ready(function() {
    $('#cat_filter').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=1";
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
		  $('#drop4').toggleClass("desm", boxall.is(":checked"));
		});
		
	});
	
	$(document).on('click', '#close_video_modual', function() {
			$("#show_add_video_modual").attr('src','');
			$("#example_video_1 video")[0].load();
	});		
</script>

<?###چک کردن مدیر

		$files = glob('new_gallery/watermark/*'); 
			foreach($files as $file){
			  if(is_file($file))
				unlink($file); 
			}

$edit_mode=injection_replace($_POST['edit_mode']);
if($edit_mode>""){
	$temp_user=get_result("select user_id from new_news where id= $edit_mode",$coms_conect);	
	if(!in_array($temp_user,$_SESSION['manager_user_permisson'])) 
		header('Location: new_manager_signout.php');
}
$edit_id=injection_replace($_GET['edit_id']);
if($edit_id>""){
	$temp_user=get_result("select user_id from new_news where id= $edit_id",$coms_conect);	
	if(!in_array($temp_user,$_SESSION['manager_user_permisson'])) 
		header('Location: new_manager_signout.php');
}
$addnew=injection_replace($_GET['addnew']);
$name=injection_replace($_POST['name']);

$status=injection_replace($_POST['status']);
 
 $navication_pic=injection_replace($_POST['navication_pic']);
 
 $duration=injection_replace($_POST['duration']);

$title=injection_replace($_POST['title']);
$abstract=injection_replace($_POST['abstract']);
$can_comment=injection_replace($_POST['can_comment']);
$manage_site=injection_replace($_POST['manage_site']);
//echo 'dddd';exit;
if($manage_site>""){
	if(!in_array($manage_site,$_SESSION["manager_title_site"]))
		header('Location: new_manager_signout.php');
}
$manage_lang=injection_replace($_POST['manage_lang']);
if($manage_lang>""){
	if(!in_array($manage_lang,$_SESSION["manager_title_lang"]))
		header('Location: new_manager_signout.php');
}
 
$text= ($_POST['text']);
$mudoal_lock=injection_replace($_POST['mudoal_lock']);
$is_special=injection_replace($_POST['is_special']);
$spesial_start_date= injection_replace($_POST['spesial_start_date']);
$spesial_finish_date=injection_replace($_POST['spesial_finish_date']);
if(isset($_POST['publish_date'])){
$publish_date=injection_replace($_POST['publish_date']);
$publish_date=(injection_replace($_POST['publish_date'])>"") ? strtotime(jalalitomiladi($publish_date)) : $now;
}
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
$news_type=$fori.$tasviri.$videoi.$soti.$erjaei;


# SEO Tab
$meta_label=injection_replace($_POST['meta_label']);
if($meta_label>""){
	get_label_count($meta_label,$coms_conect);
}
$source_link_news=injection_replace($_POST['source_link_news']);
$source_news=injection_replace($_POST['source_news']);
$meta_keyword=injection_replace($_POST['meta_keyword']);
$meta_desciption=injection_replace($_POST['meta_desciption']);

# Slide Tab
$slide=injection_replace($_POST['slide']);


#file upload field
 $upload_type=injection_replace($_POST['upload_type']);
if($upload_type==2)
$news_image=injection_replace($_POST['news_image']);
else if($upload_type==1){
$news_image_avatar=	injection_replace($_POST['news_image_avatar'][0]);
if($news_image_avatar!='')
$news_image='http://'.$_SERVER["HTTP_HOST"].'/new_gallery/files/'.$news_image_avatar;	
else
	$news_image='';
}



$news_video_pic=injection_replace($_POST['news_video_pic']);
$news_attach=injection_replace($_POST['news_attach']);
$news_sound=injection_replace($_POST['news_sound']);
$news_video=injection_replace($_POST['news_video']);

$album_type=injection_replace($_POST['album_type']);
if($album_type==2){
$imagelist=($_POST['imagelist']);	
	foreach($_POST['news_image_album'] as $val){
 		unlink('new_gallery/files/'.$val);	
		unlink('new_gallery/files/tn'.$val);	
	} 
		
}

else if($album_type==1){
	foreach($_POST['news_image_album'] as $val) 
		$imagelist[]='http://'.$_SERVER["HTTP_HOST"].'/new_gallery/files/'.$val;	
}
 

 
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
	$arr=array("album_type"=>$album_type,"navication_pic"=>$navication_pic,"upload_type"=>$upload_type,"duration"=>$duration,"is_special"=>$is_special,"source_link_news"=>$source_link_news,"source_news"=>$source_news,"name"=>$name,"news_type"=>$news_type,"title"=>$title,"text"=>$text,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"abstract"=>$abstract,"mudoal_lock"=>$mudoal_lock,"publish_date"=>$publish_date,"user_id"=>$user_id,"date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
	$id=insert_to_data_base($arr,'new_news',$coms_conect);
	 
	$arr_imag=array("id"=>$id,"type"=>1,"adress"=>$news_image,"name"=>'news_image');
	insert_to_data_base($arr_imag,'new_file_path',$coms_conect);
	
	$arr_attach=array("id"=>$id,"type"=>1,"adress"=>$news_attach,"name"=>'news_attach');
	insert_to_data_base($arr_attach,'new_file_path',$coms_conect);
	
	
	$arr_sound=array("id"=>$id,"type"=>1,"adress"=>$news_sound,"name"=>'news_sound');
	insert_to_data_base($arr_sound,'new_file_path',$coms_conect);
	
	$arr_video=array("id"=>$id,"type"=>1,"adress"=>$news_video,"name"=>'news_video');
	insert_to_data_base($arr_video,'new_file_path',$coms_conect);
	
	$arr_video=array("id"=>$id,"type"=>1,"adress"=>$news_video_pic,"name"=>'news_video_pic');
	insert_to_data_base($arr_video,'new_file_path',$coms_conect);
	
	####label
	if(!empty($meta_label)){
		$temp=explode(",",$meta_label);
		foreach($temp as $value){
			if($temp>""){			
				$label_arr=array("id"=>$id,"type"=>1,"label_id"=>$value);
				insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
			}
		}
	}
	
	
	### gallery add 
	if(!empty($imagelist)){
		foreach($imagelist as $image){
			if($image!=-1){			
				$gallery_arr=array("id"=>$id,"type"=>1,"adress"=>$image,"name"=>'news_gallery');
				insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
			}
		}
	}
	
	#####دسته بندي#######
	foreach($cat_arr as $value){
		if($value!=-1){
			$arr=array("cat_id"=>$value,"page_id"=>$id,"type"=>1);
			insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
		}
	}
	
	$related=explode(",",$totla_related);
	foreach($related as $value){
	 
		$arr=array("id"=>$value,"page_id"=>$id,"type"=>1);
		insert_to_data_base($arr,'new_related_madual',$coms_conect);
	}	
	
	### slide show add 
	
	if($slide==1){
		$slide_link="/news/$manage_lang/$id/".insert_dash("$title");
		$arr_slide=array("la"=>$manage_lang,"site"=>$manage_site,"link"=>$slide_link,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$id ,"type"=>1 ,"user_id"=>$user_id,"date"=>$now,"ip"=>$custom_ip);
		insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
	}
	
	show_msg($new_successfull);
}else if($edit_mode>""&&$title>""&&$_SESSION["can_edit"]==1&&check_catogory($array_value)==1){
	check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
	if($spesial_finish_date=='')$spesial_finish_date=$spesial_date;
	if($spesial_start_date=='')$spesial_start_date=$spesial_date;
	$edit_user_id=injection_replace($_SESSION['manager_id']);
	$condition="id=$edit_mode";
	$arr=array("album_type"=>$album_type,"navication_pic"=>$navication_pic,"upload_type"=>$upload_type,"duration"=>$duration,"is_special"=>$is_special,"source_link_news"=>$source_link_news,"source_news"=>$source_news,"name"=>$name,"news_type"=>$news_type,"title"=>$title,"text"=>$text,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"abstract"=>$abstract,"mudoal_lock"=>$mudoal_lock,"publish_date"=>$publish_date,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
	update_data_base($arr,'new_news',$condition,$coms_conect);
//	print_r($arr);
	
	$condition="id=$edit_mode && name='news_image'";
	$arr_imag=array("id"=>$edit_mode,"type"=>1,"adress"=>$news_image,"name"=>'news_image');
	update_data_base($arr_imag,'new_file_path',$condition,$coms_conect);
	
	$condition="id=$edit_mode && name='news_attach'";
	$arr_attach=array("id"=>$edit_mode,"type"=>1,"adress"=>$news_attach,"name"=>'news_attach');
	update_data_base($arr_attach,'new_file_path',$condition,$coms_conect);
	
	
	$condition="id=$edit_mode && name='news_sound'";
	$arr_sound=array("id"=>$edit_mode,"type"=>1,"adress"=>$news_sound,"name"=>'news_sound');
	update_data_base($arr_sound,'new_file_path',$condition,$coms_conect);
	
	$condition="id=$edit_mode && name='news_video'";
	$arr_video=array("id"=>$edit_mode,"type"=>1,"adress"=>$news_video,"name"=>'news_video');
	update_data_base($arr_video,'new_file_path',$condition,$coms_conect);
	 
	$condition="id=$edit_mode && name='news_video_pic'";
	$arr_video=array("id"=>$edit_mode,"type"=>1,"adress"=>$news_video_pic,"name"=>'news_video_pic');
	update_data_base($arr_video,'new_file_path',$condition,$coms_conect);
	
	
	####label
	$condition="id=$edit_mode and type=1";
	delete_from_data_base('new_mudoal_label',$condition,$coms_conect);	
	if(!empty($meta_label)){
		$temp=explode(",",$meta_label);
		foreach($temp as $value){
			if($temp>""){			
				$label_arr=array("id"=>$edit_mode,"type"=>1,"label_id"=>$value);
				insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
			}
		}
	}
	##edit gallery
	$query1="delete from new_file_path where id='$edit_mode' && name='news_gallery' and type=1";
	$coms_conect->query($query1);
	if(!empty($imagelist)){
		foreach($imagelist as $image){
			if($image!=-1){
				$gallery_arr=array("id"=>$edit_mode,"type"=>1,"adress"=>$image,"name"=>'news_gallery');
				insert_to_data_base($gallery_arr,'new_file_path',$coms_conect);
			}
		}
	}

#####دسته بندي#######
	$query1="delete from new_modules_catogory where page_id='$edit_mode' and type=1";
	$coms_conect->query($query1);
	foreach($cat_arr as $value){
		if($value!=-1){
			$arr=array("cat_id"=>$value,"page_id"=>$edit_mode,"type"=>1);
			insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
		}
	}
#####related	
	$query1="delete from new_related_madual where page_id='$edit_mode' and type=1"; 
	$coms_conect->query($query1);
	$related=explode(",",$totla_related);
	foreach($related as $value){
 
		$arr=array("id"=>$value,"page_id"=>$edit_mode,"type"=>1);
		insert_to_data_base($arr,'new_related_madual',$coms_conect);
	}	
	### slide show update 		
	if($slide==1)
	{
		$slide_link="/news/$manage_lang/$edit_mode/".insert_dash("$title");
		$query1="select count(id) as count from new_slideshow where page_id='$edit_mode'  and type=1";
		$result = $coms_conect->query($query1);
		$row = $result->fetch_assoc();
		$count=$row['count'];
		if($count!=0){
			$condition="page_id=$edit_mode";
			$arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>1 ,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"ip"=>$custom_ip);
			update_data_base($arr_slide,'new_slideshow',$condition,$coms_conect);
			
		}else{
			$arr_slide=array("link"=>$slide_link,"la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>1 ,"user_id"=>$edit_user_id,"date"=>$now,"ip"=>$custom_ip);
			insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
			
		}
	}else{
		$query1="delete from new_slideshow where page_id='$edit_mode' and type=1";
		$coms_conect->query($query1);
	}
	show_msg($new_successfull);
}

 create_session_token();
###############نمايش در حالت ويرايش#################
if($edit_id>""){
	$query="SELECT * FROM new_news where id='$edit_id'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$status=$row['status'];
	$album_type=$row['album_type'];
	$upload_type=$row['upload_type'];
	$duration=$row['duration'];
	$edit_source_link_news=$row['source_link_news'];
	$edit_source_news=$row['source_news'];
	$edit_name=$row['name'];
	$news_type=$row['news_type'];
	$title=$row['title'];
		$navication_pic=$row['navication_pic'];
	$edit_text=$row['text'];
	$la=$row['la'];
	$site_id=$row['site'];
	$label='';
		$query="select label_id from new_mudoal_label where id='$edit_id' and type=1";
		$result = $coms_conect->query($query);$i=1;$str='';
		 while($RS1 = $result->fetch_assoc()) {
			if($i!=1)$str=',';
			$label .=$str.$RS1['label_id'];$i++;
		}	
	//echo $label;//exit;
	$meta_keyword=$row['meta_keyword'];
	$is_special=$row['is_special'];
	$meta_desciption=$row['meta_desciption'];
	$spesial_start_date=miladitojalaliuser(date('Y-m-d',$row['spesial_start_date']));
	$spesial_finish_date=miladitojalaliuser(date('Y-m-d',$row['spesial_finish_date']));
	$publish_date=miladitojalaliuser(date('Y-m-d',$row['publish_date']));
	$mudoal_lock=$row['mudoal_lock'];
	$abstract=$row['abstract'];
	$can_comment=$row['can_comment'];
	$slide=$row['slide'];
	$news_type=$row['news_type'];
	$temp_1=str_split($news_type);
	$fori=$temp_1[0];
	$tasviri=$temp_1[1];
	$videoi=$temp_1[2];
	$soti=$temp_1[3];
	$erjaei=$temp_1[4];
	
	
	#Query from new_slideshow
	$query="SELECT * FROM new_slideshow where page_id='$edit_id'  and type=1";
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
	$query="SELECT adress FROM new_file_path where id='$edit_id' && name='news_image'  and type=1";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$news_image=$row['adress'];
	
	$query="SELECT adress FROM new_file_path where id='$edit_id' && name='news_attach'  and type=1";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$news_attach=$row['adress'];
	
	$query="SELECT adress FROM new_file_path where id='$edit_id' && name='news_sound'  and type=1";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$news_sound=$row['adress'];
	
	$query="SELECT adress FROM new_file_path where id='$edit_id' && name='news_video'  and type=1";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$news_video=$row['adress'];	
	
	$query="SELECT b.id,name FROM new_related_madual a ,new_news b  where page_id='$edit_id' and a.id=b.id  and type=1";
	$result = $coms_conect->query($query);
	$totla_related="";$i=1;
	while($row = $result->fetch_assoc()){
		if($i!=1)$str=',';$i++;
		$totla_related .=$str.$row['id'];
	}
	

}

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
					<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف خبر مرتبط اطمینان دارید؟</div>
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
					<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف خبر زير اطمينان داريد؟</div>
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
<input type="hidden" value="new_newstext" name='yep'>
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
								<label class="col-md-3 control-label" for="edit_name">شماره خبر</label>
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
										<option <?if($field==1) echo 'selected'?> value="1">رو تيتر خبر</option>
										<option <?if($field==2) echo 'selected'?> value="2">عنوان خبر</option>
										<option <?if($field==3) echo 'selected'?> value="3">خلاصه خبر</option>
										<option <?if($field==4) echo 'selected'?> value="4">متن خبر</option>
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
								<label class="col-md-3 control-label" for="edit_family">تاريخ انتشار</label>
								<div class="col-md-4">
								<?if($_GET['publish_search']>"")$publish_search=(injection_replace($_GET['publish_search']))?>
										<input type="text" value="<?=$publish_search?>" class="input-sm form-control" name="publish_search" id="publish_search" />
								 
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
					   اخبار مرتبط
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
					<?if($_GET['manager_filter']>""){?>	<a  href="/newcoms.php?yep=new_newstext" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
					
					بازگشت </a><?}?>
				</ul>
			</div>
		</li>
		<li class="active"><a href="#tab1" data-toggle="tab" style="display:none;" id="uuu"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			ليست اخبار </a></li>
	</ul>
			
	<div class="msheet tab-content">
		<div class="secfhead">
			<!-- #section:news/newstext.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-text150" style=""></span>
				</div>
				<div class="title"><p class="titr">لیست فیش های ثبت شده</p><p class="lead">توضیحات این بخش</p>
				</div>
			</div>
			<!-- /section:news/newstext.head -->
			<div class="toolmenu">
				<ul>
				<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

				<li id="newpag" class="addicon reset">
					<a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن خبر جدید" >
						<span class="flaticon-add149"></span>
					</a>
				</li>
				 
				<li>
					<a  data-toggle="modal" data-target="#sr_payment_search" data-placement="top" title="جستجوی پیشرفته" >
						<span class="flaticon-search74"></span>
					</a>

<!-- Modal -->
										<div class="modal fade" id="sr_payment_search" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
											<div class="modal-dialog modal-lg" role="document">
												 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="margin-top:0; direction:rtl;">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">جستجو</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
												   <div class="col-xs-12">
													
														<div class="col-md-10 form-group">
															
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="pull-left">نام کاربری *</label> 
																<input id="title" name="title" value="" type="text" placeholder="" class="col-xs-8 pull-right" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-field="title">	
														  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="title" data-fv-result="NOT_VALIDATED" style="display: none;">پر کردن اين فيلد الزامي است</small></div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">نام </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label"> نام خانوادگی</label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label"> کد ملی</label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
	
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">تلفن همراه </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">ایمیل </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
													
 
													
													</div>	
	</div>

  </div>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">جستجو</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">خروج</button>
      </div>
    </div><!-- /.modal-content -->
											</div>
										</div>

				</li>
				</ul>
			</div>
		</div>
		
		<div class="tab-pane <?if($edit_id=="") echo 'active'?>" id="tab1" style="background-color: #EFF3F8;">
			<!-- #section:news/newstext.table -->
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
										<input type="hidden" name="yep"  value="new_newstext">
										<input type="text" value="<?=$q?>" name="q" id="q" class="form-control search2" placeholder="جستجو...">
										<input type="hidden" name="site_filter" value="<?=$site_filter?>">
										<input type="hidden" name="lang_filter" value="<?=$lang_filter?>">
										<input type="hidden" name="manager_filter" value="<?=$manager_filter?>">
									</form>	
								


									<div class="pull-right btn-default btn-xs yepco">
										<?create_manager_filter($manager_filter,$coms_conect,$_SESSION["manager_user_permisson"])?>
									</div>
									<div class="pull-right btn-default btn-xs yepco">
										<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
									</div>
									
									<div class="pull-right btn-default btn-xs yepco">
										<?create_sub_site_filter($site_filter,$coms_conect,$_SESSION['manager_title_site'])?>
									</div>
							</div>
						
					</div>
					
					<table cellpadding="0" cellspacing="0" border="0" class=" table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								<th width="20px">شماره فیش</th>
								<th class="center">
									<label class="position-relative">
										<input type="checkbox" class="conchkSelectAll" />
										<span class="lbl"></span>
									</label>
								</th>
								 
								<th>نام کاربری</th>
								<th>نام</th>
								<th>نام خانوادگی</th>
								<th>ثبت کننده</th>
								<th>بانک</th>
								<th>میزان اعتبار مشتری</th>
								<th>تاریخ و ساعت</th>
								<th>واریز به</th>
								<th>مبلغ</th>
								<th>وضعیت</th>
								<th>شماره پیگیری</th>
								<th>امکانات</th>
								 
							</tr>
						</thead>
						<tbody>
						
							<tr>
								<td>...</td>
								<td class="center">
									...
								</td>
								 
								<td>....</td>
								<td>....</td>
								<td>....</td>
								<td>....</td>
								<td>....</td>
								<td>....</td>
								<td>....</td>
								<td>....</td>
								<td>....</td>
								<td>
									<span data-value="<?=$RS1["status"]?>" class="status_news editable editable-click" data-pk="<?=$RS1["id"]?>" >
									<?if($RS1["status"]==1){echo 'منتشر شده';}else{echo 'پيش نويس';}?></span>
								</td>
								<td>....</td>
							 
								<td>
									<a data-toggle="modal" class="edit_menu blue icon" data-target="#sr_add_payment">
										<i class="ace-icon fa fa-edit bigger-120" title="" data-original-title="ويرايش"></i>
									</a>
															<div class="modal fade" id="sr_add_payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
											<div class="modal-dialog modal-lg" role="document">
												 <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="margin-top:0;">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">ویرایش</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
													<div class="col-xs-12">
													
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="pull-left">مبلغ *</label> 
																<input id="title" name="title" value="" type="text" placeholder="" class="col-xs-8 pull-right" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-field="title">	
														  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="title" data-fv-result="NOT_VALIDATED" style="display: none;">پر کردن اين فيلد الزامي است</small>
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">شماره کارت </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label"> CVV2</label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
	
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">شماره پیگیری </label> 
																<input id="pic_source" name="pic_source" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label">توضیحات </label> 
																<textarea class="form-control" rows="5" id="comment"></textarea>
														  </div>
														</div>
													
 
														
														<div class="form-group">
														  <div class="form-group col-md-7">
																<button class="btn btn-success">
																	جستجو
																</button>
														  </div>
														</div>
													</div>	
	</div>


  </div>

</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
											</div>
										</div>
									<a href="#" id="2" class="red del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
										<i class="ace-icon fa fa-trash-o bigger-120" title="" data-original-title="حذف"></i>
									</a>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
			<?=$pgsel?>	
			<!-- /section:news/newstext.table -->
		</div>
	
		<div class="tab-pane <?if($edit_id!="" || $add_new==1) echo 'active';?>" id="add_templates">
			
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
				<a href="newcoms.php?yep=new_newstext" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
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
					<li class="sss" id="ddd">
						 <a data-toggle="tab" href="#video">
							 <p class="flaticon-videoplayer5"></p>
							 ويدئو
						 </a>
					 </li>
					 <li class="sss" id="aaa">
						 <a data-toggle="tab" href="#voice">
							 <p class="flaticon-speaker100"></p>
							صدا
						</a>
					</li>
					<li>
						 <a data-toggle="tab" href="#relatednews">
							 <p class="flaticon-copy23"></p>
						 اخبار مرتبط
						</a>
					</li>
				</ul>
				<div class="tab-content" style="min-height: 640px;">
					<div class="tab-pane active" id="home">
						<div class="page-content-area">
							<div class="page-body" style="margin-top: 25px;">
							<!-- #section:news/newstext.news -->
										<div class="col-md-8">
											<div class="form-group">
												<div class="form-group col-sm-12">
													<label class="control-label">نوع خبر *</label>
													<div class="form-group btn-group">
														<button data-toggle="dropdown" class="btn dropdown-toggle"  data-placeholder="انتخاب کنيد" style="height: 34px;padding-top: 2px;">انتخاب کنيد
														<?if($news_type=="00000"){
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
													<label class="control-label">رو تيتر خبر</label>
													<input value="<?=$edit_name?>" name="name" id="name" class="form-control">
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
											 
											
											<h4>تصوير خبر</h4>
											<div class="form-group">
												<label class="control-label col-md-12">
												  <input type="radio" name="upload_type" <?if($upload_type==1)echo 'checked'?> id="upload_type" value="1">
												  الصاق از فایل کامپیوتر
												</label>  
													<div class="ui-sortable red box" id="upload_type1" style="float:right;<?if($upload_type==1)echo 'display:block';else echo 'display:none'?>"><div id="news_image_avatar" orakuploader="on"></div>
														<?if($edit_id>""&&$upload_type==1){ 
																$query="select adress from new_file_path where id='$edit_id' and type=1 and name='news_image'";
															    $result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
																 
																$pic_str='';
																$RS1 = $result->fetch_assoc();
																	  $temp=explode("/files/",$RS1['adress']);
																	 $news_image_avatar=$temp[1];
																	 $div_id=explode(".",$news_image_avatar);
																	$pic_str .= "<div class='multibox file' style='cursor: move;' id='$news_image_avatar' filename='$news_image_avatar'>";
																	$pic_str .= "<div class='picture_delete'  ></div>";
																	$pic_str .= "<img src='new_gallery/files/$news_image_avatar' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
																	$pic_str .= "<input type='hidden' value='$news_image_avatar' name='news_image_avatar[]' />";
																	$pic_str .= "</div>";
																
														}?>	
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
											<div class="form-group">
												<div class="form-group col-sm-12">
													<label class="control-label">خلاصه خبر *</label>
													<textarea id="abstract" name="abstract"  class="form-control" rows="3"
														data-fv-notempty="true"
														data-fv-notempty-message="پر کردن اين فيلد الزامي است" /><?=$abstract?></textarea>
												</div>
											</div>
											
											<div class="form-group">
												<div class="form-group col-sm-12">
													<label class="control-label">متن کامل خبر *</label>
													<textarea id="text" name="text"  class="form-control" rows="3"><?=$edit_text?></textarea>
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
													<label class="control-label">منبع خبر</label>
													<input value="<?=$edit_source_news?>" name="source_news" id="source_news" class="form-control">
												</div>
											
												<div class="form-group col-sm-6">
													<label class="control-label">لینک خبر</label>
													<input value="<?=$edit_source_link_news?>" name="source_link_news" id="source_link_news" class="form-control" placeholder="http://sample.com" style="direction: ltr;">
												</div>
											</div>
										</div>
<style>
@media (min-width: 998px){
.startend{text-align:center;}}
</style>										
										<div class="col-md-4 mset">
										
											<div class="form-group">
												<label class="control-label col-md-4" for="family">نوع انتشار</label>
												<div class="form-group col-md-8">
													<select name="mudoal_lock" id="mudoal_lock" class="form-control" rows="3">
														<option value="0" <?if($mudoal_lock==0) echo 'selected'?>>عادي</option>
														<option value="1" <?if($mudoal_lock==1) echo 'selected'?>>ويژه اعضا</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-4" for="family">مدل خبر</label>
												<div class="form-group col-md-8">
													<select name="is_special" id="is_special" class="form-control" rows="3">
														<option value="0" <?if($is_special==0) echo 'selected'?>>اخبار عادي</option>
														<option value="1" <?if($is_special==1) echo 'selected'?>>اخبار ويژه</option>
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
															if($la==$title||$change_lang==$title)
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
													<input type="text" value="<?=$news_attach?>" name="news_attach" id="news_attach" style="width: 68%;">
													<a href="/filemanager/dialog.php?type=2&amp;field_id=news_attach" class="holam btn btn-success iframe-btn"><span class="holam flaticon-add139"></span></a>
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
											<div class="form-group">
												<div class="col-md-4 mdate">
													<label class="control-label" style="width: 123%;">تاريخ انتشار</label>
												</div>
												<div class="col-md-8">	 
													<input id="publish_date" value="<?if($publish_date=="") echo miladitojalaliuser(date('Y-m-d'));else echo $publish_date?>" name="publish_date" class="form-control"/>
												</div>
											</div>
										</div>
									<!-- /section:news/newstext.news -->	
								</div>
							</div>
					</div>
					
					<?include 'newcoms/main/new_modual_seo.php4';?>
					<?include 'newcoms/main/new_modual_slide.php4';?>
					<div id="video" class="tab-pane fade">
						<div class="page-content-area" id="gallery5">
							<div class="page-body" style="margin-top: 25px;">
								<fieldset>
								<!-- #section:news/newstext.video -->
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label">آپلود ويدئو(MP4)</label>
							 
										
										<div class="col-md-12 input-group">
											<div class="col-md-12">
												<div class="entry-mark">
												</div>
												 
											<div class="form-group">
												<div class="form-group"><input id="news_video" value="<?=$news_video?>" name="news_video" class="imginput" type="text" >
												<a href="/filemanager/dialog.php?type=3&amp;field_id=news_video" class="holam btn btn-primary iframe-btn"><span class="holam flaticon-search85"></span></a>
												<a href="#" id="add_videos" class="holam btn btn-success" title="افزودن"><span class="holam flaticon-round68"></span></a>
												<a href="#" id="del_videos" class="holam btn btn-danger" title="حذف"><span class="holam flaticon-delete84"></span></a>
												</div>
												<img id="show_waiting_video" src="waiting.gif" dir="center" style="display:none">
											</div>
												 
												<div id="show_video" class="row" style="position: relative"> 
								
												</div> 
											</div>
										<?if($edit_id>""&&$news_video>""){?> 
										 <script>
											if($("#news_video").val()){
												$("#show_waiting_video").show();
												$.ajax({
													type:'POST',
													url:'New_ajax.php',
													data:"action=show_news_videos&id="+$("#news_video").val()+"&secend_value=<?=$edit_id?>",
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
								<!-- /section:news/newstext.video -->
								</fieldset>
								<? if ($news_video==""){?>
								<br><br><br><br><br><br><br><br><br>
								<?}?>
							</div>
						</div>
					</div>
					<div id="voice" class="tab-pane fade">
						<div class="page-content-area" id="gallery5">
							<div class="page-body" style="margin-top: 25px;">
								<fieldset>
								<!-- #section:news/newstext.voice -->
								<div class="col-md-12">
									<div class="form-group">
										<label class="col-md-2 control-label">آپلود صدا</label>
										<div class="entry-mark"></div>
										<div class="form-group">
											<input type="text" value="<?=$news_sound?>" id="news_sound" name="news_sound">
											<a href="/filemanager/dialog.php?type=2&amp;field_id=news_sound" class="holam btn btn-primary iframe-btn" title="انتخاب"><span class="holam flaticon-search85"></span></a>
											<a href="#" id="add__news_sound" class="holam btn btn-success" title="افزودن"><span class="holam flaticon-round68"></span></a>
											<a href="#" id="del_sound" class="holam btn btn-danger" title="حذف"><span class="holam flaticon-delete84"></span></a>
											<br>
											<img id="show_waiting_sound" src="waiting.gif" dir="center" style="display:none; margin-right:35%; margin-top:10px;">	
										
										</div>
										
										<div id="show_sound" class="col-sm-6 col-xs-12">
										</div> 
										</br>
										<?if($edit_id>""&&$news_video>""){?> 
										<script> 
											if($("#add__news_sound").val(e)){
											 	$("#show_waiting_sound").show();
												$.ajax({
													type:'POST',
													url:'New_ajax.php',
													data:"action=show_news_sound&id="+$("#news_sound").val()+"&secend_value=<?=$edit_id?>",
													success: function(result){
												 		$("#show_waiting_sound").hide();
														$("#show_sound").html(result);	
													}
												});	
											}
											</script>
										<?}?>
									 
									</div>
								</div>
								<!-- /section:news/newstext.voice -->
								</fieldset>
								<br><br><br><br><br><br><br><br><br><br>
							</div>
						</div>
					</div>
					
					<script>
					/////////////// radio show hide upload image
					$(document).ready(function(){
						$('input[name$="album_type"]').click(function(){
							if($(this).attr("value")=="2"){
								$(".box").not(".red").hide();
								$(".red").show();
							}
							if($(this).attr("value")=="1"){
								$(".box").not(".blue").hide();
								$(".blue").show();
							}
						});
					});
					</script>
					
					<div id="gallery" class="tab-pane fade">
						<div class="page-content-area" id="gallery5">
							<div class="page-body" style="margin-top: 25px;">
								<fieldset>
								<!-- #section:news/newstext.gallery -->
								<div class="col-md-12">
									<div class="col-md-8">
										<label class="col-md-5 control-label">
											<input type="radio" name="album_type" <?if($album_type==2)echo 'checked'?> id="radios-12" value="2" >
											انتخاب از رسانه های قبلی
										</label>
									
										<div class="col-md-7 red box form-group" id="album_type2" style="left: 8%;<?if($album_type==2)echo 'display:block';else echo 'display:none'?>">
											<input type="text" value="" id="news_gallery">
											<a href="/filemanager/dialog.php?type=1&amp;field_id=news_gallery" class="holam btn btn-primary iframe-btn" title="انتخاب"><span class="holam flaticon-search85"></span></a>
											<a class="btn btn-success holam" href="#" id="add-image-to-gallery" title="افزودن"><span class="holam flaticon-round68"></span></a>
											<img id="show_waiting" src="waiting.gif" style="display:none">
									
											<select hidden id="imagelist" name="imagelist[]" multiple="multiple">
												<?if($album_type==2){
												$query="SELECT * FROM new_file_path where id='$edit_id' && name='news_gallery'";
												
												$gallery_result = $coms_conect->query($query);
												while($RS1 = $gallery_result->fetch_assoc()) {
													$adress=$RS1["adress"];
													echo '<option value="'.$adress.'" selected="selected">'.$adress.'</option>';
													?>
											 <script> 
													$(document).ready(function(){  
														var aks='<?=$RS1["adress"]?>';
														//event.preventDefault();		
														var html_string = '<li><div><img width="105" height="105" alt="105x105" src="'+aks+'"/><div class="text"><div class="inner"><span>'+<?="'".get_pic_name($RS1['adress'])."'"?>+'</span><div class="tools"><a href="'+aks+'" data-rel="colorbox"><i class="ace-icon fa fa-search-plus"></i></a><a   data-id="<?=$edit_id?>" data-addres="'+aks+'" id="delete_image" href="#"><i class="ace-icon fa fa-times red"></i></a></div></div></div></div></li>';
														$("#gallery-img").append(html_string);
													});
											 </script>	
												<?}}
												?>
											</select>
										 
											<!-- uploaded image -->
					
										</div>
													
											<script>
												$( "#add-image-to-gallery" ).click(function(event) {	
													event.preventDefault();							
													var aks = $("#news_gallery").val();
													var index = aks.lastIndexOf("/") + 1;
													var filename = aks.substr(index);
													if (aks!=""){
														$("#show_waiting").show();
														$("#add-image-to-gallery").attr("disabled", false);
														var html_string = '<li><div><img width="105" height="105" alt="105x105" src="'+aks+'"/><div class="text"><div class="inner"><span>'+filename+'</span><div class="tools"><a href="'+aks+'" data-rel="colorbox"><i class="ace-icon fa fa-search-plus"></i></a><a data-id="'+aks+'" id="delete_image" href="#"><i class="ace-icon fa fa-times red"></i></a></div></div></div></div></li>';
														$("#gallery-img").append(html_string);
														$("#imagelist").append('<option value="'+aks+'" selected="selected">'+aks+'</option>')
														$("#news_gallery").val("");//empty textbox
														$("#show_waiting").hide();
													} 
												});
												$(document).ready(function(){
												$(document).on('click', '#delete_image', function(event) {
													event.preventDefault();		
													var address = $(this).parentsUntil("ul").find('img').attr("src");
													$(this).parentsUntil("ul").remove();
													$("#imagelist option[value='"+address+"']").remove();
													$.ajax({
														type:'POST',
														url:'New_ajax.php',
														data:"action=delete_ajax_newspic&id="+$(this).attr('data-id')+"&value="+$(this).attr('data-addres'),
														success: function(result){
														}
											
													});	
												});
												});
											</script>

									</div>
									<div class="col-md-4">
										<label class="control-label">
											<input type="radio" name="album_type" <?if($album_type!=2)echo 'checked'?> id="radios-11" value="1">
											  الصاق از فایل کامپیوتر
										</label>
							        </div>
								</div>
								<br>
								<br>
								<hr>	
								
								<ul id="gallery-img" class="ace-thumbnails clearfix red box">
									<?if($album_type==2){
									while($RSG = $gallery_result->fetch_assoc()) {
										$adress=$RSG["adress"];
									?>
									<li>
										<div>
											<img width="105" height="105" alt="105x105" src="<?=$adress?>" />
											<div class="text">
												<div class="inner">
													<span><?=basename($adress)?></span>
													<div class="tools">													
														<a href="<?=$adress?>" data-rel="colorbox">
															<i class="ace-icon fa fa-search-plus"></i>
														</a>
														<a id="delete_image" href="#">
															<i class="ace-icon fa fa-times red"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
									</li>
												
									<?}}?>
								</ul>
						
										
								<div class="form-group blue box" id="album_type1" style="<?if($album_type!=2)echo 'display:block';else echo 'display:none'?>">
									<div class="col-md-12" id="fffffffffffff">
										<input type="checkbox" id="watermark_check">
										<label class="control-label "> افزودن واتر مارک</label>
										<img src="/waiting.gif" id="watermark_check_pic" style="display:none">
									</div>
									<div class="ui-sortable" style="float:right"><div id="news_image_album" orakuploader="on"></div>
										<?if($edit_id>""&&$album_type==1){ 
												$query="select adress from new_file_path where id='$edit_id' and type=1 and name='news_gallery'";
												$result = $coms_conect->query($query);$i=1;$str='';$articles_list='';
												$pic_str='';
												 while($RS1 = $result->fetch_assoc()) {
													$news_image_album=$RS1['adress'];
													$temp=explode("/files/",$RS1['adress']);
													$news_image_album=$temp[1];
													 $div_id=explode(".",$news_image_album);
													$pic_str .= "<div class='multibox file' style='cursor: move;' id='$news_image_album' filename='$news_image_album'>";
													$pic_str .= "<div class='picture_delete'  ></div>";
													$pic_str .= "<img src='/new_gallery/files/tn/$news_image_album' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
													$pic_str .= "<input type='hidden' value='$news_image_album' name='news_image_album[]' />";
													$pic_str .= "</div>";
												}
										}?>	
									</div>
								</div>	
	
										
								
								
								
								<!-- /section:news/newstext.gallery -->
								</fieldset>
							</div>
						</div>
					</div>
								<script type="text/javascript">
								$(document).ready(function(){
									 $('#news_image_album').orakuploader({
										orakuploader_path : 'new_orakuploader/',
										orakuploader_main_path : 'new_gallery/files',
										orakuploader_thumbnail_path : 'new_gallery/files/tn',
										orakuploader_use_main : false,
										//orakuploader_use_sortable : true,
										orakuploader_use_dragndrop : true,
										orakuploader_add_image : 'new_orakuploader/images/add.png',
										orakuploader_add_label : 'آپلود تصویر',
										 orakuploader_resize_to : <?=get_result("select address from new_default_navbar where name='gallery_pic_size'  and la='fa' and site='main'",$coms_conect)?>,
										orakuploader_thumbnail_size : 400,
										orakuploader_watermark : 'new_gallery/watermark/water_mark.png',
								 	});
									
									$('#news_image_album').html("<?=$pic_str?>");
								});
								</script>
								<?$type=1;
								include 'newcoms/main/new_modual_catogory.php4';?>
								<?include 'newcoms/main/new_nav_pic.php4';?>
					<div id="relatednews" class="tab-pane fade">
								<!-- #section:news/newstext.relate -->
									<div class="uploadbts" style="margin-top: 25px;">
										<a  data-toggle="modal" data-target="#show_contact" data-placement="top" rel="tooltip"><button><span class="flaticon-add139"></span><span>افزودن اخبار</span></button></a>
									
									</div>
								<!-- /section:news/newstext.relate -->	
						<?if($edit_id>""){  ?>
						<script>
							$(function () {	
								$.ajax({
											type:'POST',
											url:'New_ajax.php',
											data:"action=show_related_news_show&id=<?=$totla_related?>",
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



<?$_SESSION["del_item"]='del_news';
$_SESSION["edit_item"]='change_lock_news';
?>
 <script src="/new_plugin/video-js/js/video.js"></script>
<script>
    videojs.options.flash.swf = "video-js/js/video-js.swf";
</script>	
<script src="ajax_js/news.js"></script>
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
				data:"action=show_related&id="+$("#related_search").val(),
				success: function(result){
				//alert(result);
				$("#show_waiting_search").hide();
					$("#show_related").html(result);	
				}
			});		
		});



		$(document).ready(function() {
			$('.sss').hide();
			/*$("#ID").click(function(){
				if( $(this).is(':checked')) {
                        $("#fff").show();//gallery
                    }else {
                        $("#fff").hide();//gallery
                    }
                });*/
			$("#ID2").click(function(){
				if( $(this).is(':checked')) {
                        $("#fff").show();//gallery
                    }else {
                        $("#fff").hide();//gallery
                    }
                });
			$("#ID3").click(function(){
				if( $(this).is(':checked')) {
                        $("#ddd").show();//video
                    }else {
                        $("#ddd").hide();//video
                    }
                });
			$("#ID4").click(function(){
				if( $(this).is(':checked')) {
                        $("#aaa").show();//voice
                    }else {
                        $("#aaa").hide();//voice
                    }
                });
			$("#ID6").click(function(){
				if( $(this).is(':checked')) {
                        $("#fff").show();//gallery
                        $("#ddd").show();//video
                        $("#aaa").show();//voice
                    }else {
                        $("#fff").hide();//gallery
                        $("#ddd").hide();//video
                        $("#aaa").hide();//voice
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
					
				if( $("#ID4").is(':checked')) {
                        $("#aaa").show();//voice
                    }else {
                        $("#aaa").hide();//voice
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
		$("#is_special").change(handleNewSelection);
         // Run the event handler once now to ensure everything is as it should be
        handleNewSelection.apply($("#is_special"));
		
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
		// show hide add
		$("#newpag").show();	
		$("#newpag").click(function(){
				$("#newpag").hide();
			});
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
		$("#start").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});
		$("#end").datepicker({
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
		$("#end_Slide_show").datepicker({
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
		
		$("#spesial_start_date").datepicker({
			changeMonth: true,
			changeYear: true,
			isRTL: true,
			dateFormat: "yy/mm/dd"
		});

		$("#publish_search").datepicker({
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
<script  src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
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
		$(".reset").click(function() {
			$('#newstext').closest('form').find("input[type=text], textarea").val(""); 
		});
</script>
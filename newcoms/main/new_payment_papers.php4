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



<form class="form-horizontal" action="" method="post" name="new" id="new" enctype="multipart/form-data">	
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading"><?=$s_Pages_delete?></h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>آيا از حذف اين مورد اطمينان داريد؟</div>
		</div>
		<input type="hidden" id="check_value" name="check_value" value="0">
		<div class="modal-footer ">
			<button type="button" id="btn_ok"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$ads_AdsList_yes?></button>
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
			<h4 class="modal-title custom_align" id="Heading">مشاهده متن پیام خصوصی</h4>
		</div>
		<div class="modal-body">
			<div class="panel-body" id="show_details">
				 
				</div>
			</div>
		</div>

	</div>
	</div>
</form>

</br>
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  -->
 
	<div class="tabbable">
		<!--ul class="nav nav-tabs">
					
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			پیام های خصوصی </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/pm_archive.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">ثبت فیش بانکی</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/pm_archive.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			
			<div class="tab-pane <?if($edit_id=="")echo 'active'?> " id="tab1">
				<!-- #section:main/pm_archive.table -->
					<div class="row-fluid">
						<!--div class="col-md-6 yepco"-->
							<div class="pull-left btn-xs yepco" id="drop4">
								<i type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
									<span class="sr-only">Toggle navigation</span>
									<span data-toggle="modal" data-target="#delete" href="#" title="<?=$s_Pages_delete?>"><i class="ace-icon fa fa-trash-o bigger-110"></i></span>
								</i>
								<div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
									<ul class="nav navbar-nav navbar-left">
										<a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
											<?=$s_Pages_delete?> 
										</a>
									</ul>
								</div>
							</div>
						<!--/div-->
						
						
					
					</div>
				
				
											<div class="container">
												<div class="row-fluid"> 
													<div class="col-xs-12">
													<div class="sr-title">
														<h3 class="sr-yellow">
														<i class="fa fa-search" aria-hidden="true"></i>
															جستجوی کاربر
														</h3>
														<hr>
														<P class="sr-blue">
														<i class="fa fa-question-circle" aria-hidden="true"></i>
															برای ثبت فیش بانکی باید ابتدا مشتری را انتخاب کرده تا فیش صادر شود ، برای این منظور از فرم زیر استفاده شود.
														</p>
													</div>
														<div class="form-group">
															<div class="form-group yepco col-md-7">
															<label class="pull-left col-xs-4"></label> 
															<div class="col-xs-2 sr_no_padding">
															<?create_lang_filter($lang_filter,$coms_conect,$_SESSION["manager_title_lang"])?>
															</div>
															</div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="pull-left col-xs-4">نام کاربری *</label> 
																<input id="sr-username" name="sr-username" value="" type="text" placeholder="" class="col-xs-8 pull-right" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-field="sr-username">	
														  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="sr-username" data-fv-result="NOT_VALIDATED" style="display: none;">پر کردن اين فيلد الزامي است</small></div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4">نام </label> 
																<input id="sr-name" name="sr-name" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4"> نام خانوادگی</label> 
																<input id="sr-fname" name="sr-fname" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4"> کد ملی</label> 
																<input id="sr-id-number" name="sr-id-number" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
	
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4">تلفن همراه </label> 
																<input id="sr-phone-number" name="sr-phone-number" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="control-label col-xs-4">ایمیل </label> 
																<input id="sr-email" name="sr-email" value="" type="text" placeholder="" class="col-xs-8 pull-right">
														  </div>
														</div>
													
 
														
														<div class="form-group">
														  <div class="form-group col-md-7">
														  
															<label class="pull-left col-xs-4"></label> 
																<button class="btn btn-success sr_no_margin col-xs-2" style="padding:8px 0">
																	جستجو
																</button>
														  </div>
														</div>
													</div>												
												
													</div>
												</div>
												

				
				<!-- /section:main/pm_archive.table -->
			</div>
			
		</div>
		
												
												<br>
												<br>
												
					<table cellpadding="0" cellspacing="0" border="0" class="= table table-striped table-bordered" width="100%">
						<thead>
							<tr>
								
								 
								<th>نام کاربری</th>
								<th>نام</th>
								<th>نام خانوادگی</th>
								<th>اعتبار فعلی</th>
								<th>ایمیل</th>
								<th>شماره تلفن (ها)</th>
								<th>آخرین مبلغ فیش ثبت شده</th>
								<th>تاریخ آخرین فیش</th>
								<th>عملیات</th>
							
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>...</td>
								<td>
									<!-- Large modal -->
									<button type="button" class="btn btn-default" data-toggle="collapse" data-target="#sr-payment-collapse" aria-expanded="false" aria-controls="collapseExample">ثبت فیش بانکی</button>
								</td>
							
							</tr>
						</tbody>
					</table>
					<div class="collapse" id="sr-payment-collapse">
												
 <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist" style="margin-top:0;">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">واریز به حساب</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">واریز به کارت</a></li>
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
    <div role="tabpanel" class="tab-pane" id="profile">
	<div class="col-xs-12">
													
														<div class="form-group">
														  <div class="form-group col-md-7">
																<label class="pull-left">مبلغ *</label> 
																<input id="title" name="title" value="" type="text" placeholder="" class="col-xs-8 pull-right" data-fv-notempty="true" data-fv-notempty-message="پر کردن اين فيلد الزامي است" data-fv-field="title">	
														  <small class="help-block" data-fv-validator="notEmpty" data-fv-for="title" data-fv-result="NOT_VALIDATED" style="display: none;">پر کردن اين فيلد الزامي است</small></div>
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
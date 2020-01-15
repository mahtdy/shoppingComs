<?###چک کردن مدیر
$edit_mode=injection_replace($_POST['edit_mode']);
if($edit_mode>""){
	$temp_user=get_result("select user_id from new_article where id= $edit_mode",$coms_conect);	
	if(!in_array($temp_user,$_SESSION['manager_user_permisson'])) 
		header('Location: manager_signout.php');
}
$edit_id=injection_replace($_GET['edit_id']);
if($edit_id>""){
	$temp_user=get_result("select user_id from new_article where id= $edit_id",$coms_conect);	
	if(!in_array($temp_user,$_SESSION['manager_user_permisson'])) 
		header('Location: manager_signout.php');
}

$status=injection_replace($_POST['status']);
$title=injection_replace($_POST['title']);
$abstract=injection_replace($_POST['abstract']);
$author=injection_replace($_POST['author']);
$translator=injection_replace($_POST['translator']);
$publisher=injection_replace($_POST['publisher']);
$article_base=injection_replace($_POST['article_base']);
$website=injection_replace($_POST['website']);
$bublish=injection_replace($_POST['bublish']);
$mudoal_lock=injection_replace($_POST['mudoal_lock']);
$can_comment=injection_replace($_POST['can_comment']);
$is_importand=injection_replace($_POST['is_importand']);
if($is_importand=='')$is_importand=0;
$text=injection_replace($_POST['text']);
$spesial_start_date= injection_replace($_POST['spesial_start_date']);
$spesial_finish_date=injection_replace($_POST['spesial_finish_date']);
if(isset($_POST['publish_date']))
$publish_date=(injection_replace($_POST['publish_date'])>"") ? strtotime(jalalitomiladi(injection_replace($_POST['publish_date']))) : $now;

$array_value=injection_replace($_POST['array_value']);
if($array_value>""){
	$array_valu=explode(",",$array_value);
	$tempp=(array_diff($array_valu,$_SESSION["manager_page_cat"]));
	if(count($tempp)>0){
	header('Location: manager_signout.php');exit();}
}
$cat_arr=explode(",",$array_value);
# SEO Tab
$meta_label=injection_replace($_POST['meta_label']);
if($meta_label>""){
	get_label_count($meta_label,$coms_conect);
}
$meta_keyword=injection_replace($_POST['meta_keyword']);
$meta_desciption=injection_replace($_POST['meta_desciption']);

#file upload field
$article_image=injection_replace($_POST['article_image']);

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
$related_news=injection_replace($_POST['related_news']);
$spesial_date=jdate('Y/m/d');

$manage_site=injection_replace($_POST['manage_site']);
if($manage_site>""){
	if(!in_array($manage_site,$_SESSION["manager_title_site"]))
		header('Location: manager_signout.php');
}
$manage_lang=injection_replace($_POST['manage_lang']);
if($manage_lang>""){
	if(!in_array($manage_lang,$_SESSION["manager_title_lang"]))
		header('Location: manager_signout.php');
}
	if($spesial_finish_date=='')$spesial_finish_date=$spesial_date;
	if($spesial_start_date=='')$spesial_start_date=$spesial_date;

############################################
if($edit_mode==""&&$title>""&&$_SESSION["can_add"]==1&&check_catogory($array_value)==1){
	$arr=array("author"=>$author,"translator"=>$translator,"publisher"=>$publisher,"article_base"=>$article_base,"website"=>$website,"bublish"=>$bublish,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand,  "title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"abstract"=>$abstract ,"publish_date"=>$publish_date,"user_id"=>$_SESSION['manager_id'],"date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
	$id=insert_to_data_base($arr,'new_article',$coms_conect);
 
	##pic
	$arr_imag=array("id"=>$id,"type"=>7,"adress"=>$article_image,"name"=>'article_image');
	insert_to_data_base($arr_imag,'new_file_path',$coms_conect);
	
	####label
	if(!empty($meta_label)){
		$temp=explode(",",$meta_label);
		foreach($temp as $value){
			if($temp>""){			
				$label_arr=array("id"=>$id,"type"=>7,"label_id"=>$value);
				insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
			}
		}
	}
 	
	#####دسته بندي#######
	foreach($cat_arr as $value){
		if($value!=-1){
			$arr=array("cat_id"=>$value,"page_id"=>$id,"type"=>7);
			insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
		}
	}
	
	$related=explode(",",$related_news);
	foreach($related as $value){
		$related_id=explode("#",$value);
		$arr=array("id"=>$related_id[1],"page_id"=>$id,"type"=>7);
		insert_to_data_base($arr,'new_related_madual',$coms_conect);
	}	
	
	### slide show add 
	if($slide==1){
		$arr_slide=array("slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$id ,"type"=>7 ,"user_id"=>$user_id,"date"=>$now,"ip"=>$custom_ip);
		insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
	}
	
	show_msg($new_successfull);
}else if($edit_mode>""&&$title>""&&$_SESSION["can_edit"]==1&&check_catogory($array_value)==1){
	$condition="id=$edit_mode";
	$arr=array("author"=>$author,"translator"=>$translator,"publisher"=>$publisher,"article_base"=>$article_base,"website"=>$website,"bublish"=>$bublish,"mudoal_lock"=>$mudoal_lock,"is_importand"=>$is_importand  ,"title"=>$title ,"ip"=>$custom_ip,"meta_keyword"=>$meta_keyword, "meta_desciption"=>$meta_desciption,"spesial_start_date"=>strtotime(jalalitomiladi($spesial_start_date)),"spesial_finish_date"=>strtotime(jalalitomiladi($spesial_finish_date)),"abstract"=>$abstract ,"publish_date"=>$publish_date,"edit_user_id"=>$_SESSION['manager_id'],"edit_date"=>$now,"la"=>$manage_lang,"site"=>$manage_site,"can_comment"=>$can_comment,"slide"=>$slide,"status"=>$status);
	update_data_base($arr,'new_article',$condition,$coms_conect);
	
	$condition="id=$edit_mode && name='article_image'";
	$arr_imag=array("id"=>$edit_mode,"type"=>7,"adress"=>$news_image,"name"=>'article_image');
	update_data_base($arr_imag,'new_file_path',$condition,$coms_conect);
	
		####label
	$condition="id=$edit_mode and type=7";
	delete_from_data_base('new_mudoal_label',$condition,$coms_conect);	
	if(!empty($meta_label)){
		$temp=explode(",",$meta_label);
		foreach($temp as $value){
			if($temp>""){			
				$label_arr=array("id"=>$edit_mode,"type"=>7,"label_id"=>$value);
				insert_to_data_base($label_arr,'new_mudoal_label',$coms_conect);
			}
		}
	}

#####دسته بندي#######
	$query1="delete from new_modules_catogory where page_id='$edit_mode' and type=7";
	$coms_conect->query($query1);
	foreach($cat_arr as $value){
		if($value!=-1){
			$arr=array("cat_id"=>$value,"page_id"=>$edit_mode,"type"=>7);
			insert_to_data_base($arr,'new_modules_catogory',$coms_conect);
		}
	}
#####related	
	$query1="delete from new_related_madual where page_id='$edit_mode' and type=7"; 
	$coms_conect->query($query1);
	$related=explode(",",$related_news);
	foreach($related as $value){
		$related_id=explode("#",$value);
		$arr=array("id"=>$related_id[1],"page_id"=>$edit_mode,"type"=>7);
		insert_to_data_base($arr,'new_related_madual',$coms_conect);
	}	
	### slide show update 		
	if($slide==1){
		$query1="select count(id) as count from new_slideshow where page_id='$edit_mode' and type=7";
		$result = $coms_conect->query($query1);
		$row = $result->fetch_assoc();
		$count=$row['count'];
		if($count!=0){
			$condition="page_id=$edit_mode";
			$arr_slide=array("la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>7 ,"edit_user_id"=>$edit_user_id,"edit_date"=>$now,"ip"=>$custom_ip);
			update_data_base($arr_slide,'new_slideshow',$condition,$coms_conect);
			
		}
		else{
			$arr_slide=array("la"=>$manage_lang,"site"=>$manage_site,"slide_img1"=>$slide_img1,"slide_img2"=>$slide_img2,"start_date"=>strtotime(jalalitomiladi($start_date)),"finish_date"=>strtotime(jalalitomiladi($finish_date)) ,"title"=>$slide_title ,"text1"=> $text1,"text2"=> $text2,"text3"=> $text3,"page_id"=>$edit_mode ,"type"=>7 ,"user_id"=>$edit_user_id,"date"=>$now,"ip"=>$custom_ip);
			insert_to_data_base($arr_slide,'new_slideshow',$coms_conect);
		}
	}else{
		$query1="delete from new_slideshow where page_id='$edit_mode' and type=7";
		$coms_conect->query($query1);
	}
	show_msg($new_successfull);
}


###############نمايش در حالت ويرايش#################
if($edit_id>""){
	$query="SELECT * FROM new_article where id='$edit_id'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$status=$row['status'];
	$title=$row['title'];
	$text=$row['text'];
	$la=$row['la'];
	$site_id=$row['site'];
	$label='';
		$query="select label_id from new_mudoal_label where id='$edit_id' and type=7";
		$result = $coms_conect->query($query);$i=1;$str='';
		 while($RS1 = $result->fetch_assoc()) {
			if($i!=1)$str=',';
			$label .=$str.$RS1['label_id'];$i++;
		}	
	$meta_keyword=$row['meta_keyword'];
	$meta_desciption=$row['meta_desciption'];
	$spesial_start_date=miladitojalaliuser(date('Y-m-d',$row['spesial_start_date']));
	$spesial_finish_date=miladitojalaliuser(date('Y-m-d',$row['spesial_finish_date']));
	$publish_date=miladitojalaliuser(date('Y-m-d',$row['publish_date']));
	$news_model=$row['news_model'];
	$abstract=$row['abstract'];
	$news_model=$row['news_model'];
	$can_comment=$row['can_comment'];
	$author=$row['author'];
	$translator=$row['translator'];
	$publisher=$row['publisher'];
	$article_base=$row['article_base'];
	$website=$row['website'];
	$bublish=$row['bublish'];
	$mudoal_lock=$row['mudoal_lock'];
	$is_importand=$row['is_importand'];
	$can_comment=$row['can_comment'];

	
	#Query from new_slideshow
	$query="SELECT * FROM new_slideshow where page_id='$edit_id' and type=7";
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
	$query="SELECT adress FROM new_file_path where id='$edit_id' && name='article_image' and type=7";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$article_image=$row['adress'];
	
	
	$query="SELECT b.id,title FROM new_related_madual a ,new_article b  where page_id='$edit_id' and a.id=b.id and type=7";
	//echo $query;
	$result = $coms_conect->query($query);
	$related_news="";$i=1;
	while($row = $result->fetch_assoc()){
		if($i!=1)$str=',';$i++;
		$related_news .=$str.$row['title'].'#'.$row['id'];
	}
	

}

##################################
?>

<link rel="stylesheet" type="text/css" href="/yep_theme/default/rtl/css/animate.css">
<link rel='stylesheet' type="text/css" href='/yep_theme/default/rtl/css/default.css' />
<link rel="stylesheet" type="text/css" href="/yep_theme/default/rtl/css/flaticon.css">
<link rel="stylesheet" type="text/css" href="/yep_theme/default/rtl/css/select3.css">
<body>
<div class="container-fluid">
<div class="row">

<div class="msheet">

<div class="col-lg-12 secfhead">

<div class="sectitle">
<div class="icon"><span class="flaticon-file23" style=""></span></div>
<div class="title"><p class="titr">مدیریت صفحات</p><p class="lead">توضیحات این بخش</p></div>
</div>


<div class="toolmenu">
<ul>
<li><a href="#"><span class="flaticon-help31" style="color: rgb(240, 90, 35);"></span></a></li>
<li><a href="#"><span class="flaticon-add149" style="color: green;"></span></a></li>
<li><a href="#"><span class="flaticon-note35"></span></a></li>
<li><a href="#"><span class="flaticon-search74"></span></a></li>
</ul>
</div>

</div>
		<form class="form-horizontal" id="newstext" name="newstext" action="" role="form" method="post" enctype="multipart/form-data">
			<input type="hidden" name="array_value" id="array_value">
			<input type="hidden" name="edit_mode" id="edit_mode" value="<?=$edit_id?>">
			<input type="hidden" name="status" id="status" value="<?=$status?>">
			<input type="hidden" id="check_value" name="check_value" value="0">
<div class="col-lg-12 content">

	<div class="col-lg-2 col-md-2 option">
		<a href="#"><span class="flaticon-verified9" style="color: green;"></span></a>
		<a href="#"><span class="flaticon-browser93" style="color: rgb(3, 122, 195);"></span></a>
		<a href="#"><span class="flaticon-left-arrow9" style="color: orangered;"></span></a>
	</div>

		<div class="tabdiv">
			<ul class="nav nav-pills nav-stacked  col-lg-2 col-md-2 col-sm-12 col-xs-12">
			  <li class="active"><a href="#tab_a" data-toggle="pill"><p><span class="flaticon-file23"></span></p>محتوا</a></li>
			  <li><a href="#tab_b" data-toggle="pill"><p><span class="flaticon-squares36"></span></p>دسته بندی</a></li>
			  <li><a href="#tab_c" data-toggle="pill"><p><span class="flaticon-upload36"></span></p>آپلود فایل های مقاله</a></li>
			  <li><a href="#tab_d" data-toggle="pill"><p><span class="flaticon-search103"></span></p>سئو</a></li>
				<li><a href="#tab_e" data-toggle="pill"><p><span class="flaticon-folder23"></span></p>اسلاید</a></li>
				<li><a href="#tab_f" data-toggle="pill"><p><span class="flaticon-copy23"></span></p>اخبار مرتبط</a></li>
				<!--li><a href="#tab_g" data-toggle="pill"><p><span class="flaticon-gallery7"></span></p>تصویر نوار ناوبری</a></li-->

			</ul>


			<div class="tab-content col-lg-10 col-md-10 col-sm-12 col-xs-12">
			        <div class="tab-pane active" id="tab_a">




<div class="row">

	<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 mset">

		<fieldset>

		<!-- Text input-->
		<div class="form-group">
		<label class="col-md-2 control-label" for="publish_date" style="width: 110px;">تاریخ انتشار</label>


			<div class="col-md-7 ">
	<a href="#"><span class="dateicon flaticon-calendar53"></span></a>
	<input id="publish_date" name="publish_date" value="<?=$publish_date?>" class="dateinput" type="text" required="" style="max-width: 120px;">
			</div>

		</div>


		<!-- Select Basic -->
		<!--div class="form-group">
		  <label class="col-md-2 control-label" for="selectbasic" style="width: 110px;">اجازه انتشار</label>
		  <div style="padding-left:0;" class="col-md-7 ">
		    <select id="selectbasic" name="selectbasic" class="form-control">
		      <option value="1">دارد</option>
		      <option value="2">ندارد</option>
		    </select>
		  </div>
		</div-->

		<!-- Select Basic -->
		<!--div class="form-group">
		  <label class="col-md-2 control-label" for="status" style="width: 110px;">وضعیت انتشار</label>
		  <div style="padding-left:0;" class="col-md-7 ">
		    <select id="publish_status" name="publish_status" class="form-control">
		      <option value="1">پیش نویس</option>
		      <option value="2">منتشرشده</option>
		    </select>
		  </div>
		</div-->

		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-2 control-label" for="mudoal_lock" style="width: 110px;">نوع انتشار</label>
		  <div style="padding-left:0;" class="col-md-7 ">
		    <select id="mudoal_lock" name="mudoal_lock" class="form-control">
		      <option value="1" <?if($mudoal_lock==1) echo 'selected'?>>ویژه اعضاء</option>
		      <option value="0" <?if($mudoal_lock==0) echo 'selected'?>>عمومی</option>
		    </select>
		  </div>
		</div>

		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-2 control-label" for="is_importand" style="width: 110px;">ترتیب اهمیت</label>
		  <div style="padding-left:0;" class="col-md-7 ">
		    <select id="is_importand" name="is_importand" class="form-control">
		      <option value="0" <?if($is_importand==0) echo 'selected'?>>عادی</option>
		      <option value="1" <?if($is_importand==1) echo 'selected'?>>ویژه</option>
		    </select>
		  </div>
		</div>

		</fieldset>
	 

	</div>

	<div class="fontent col-lg-8 col-md-7 col-sm-12 col-xs-12 ">
							 
								
								<fieldset>
									<?if($edit_id>""){?>	
									<div class="form-group">
									  <label class="col-md-2 control-label" for="textinput">کد مقاله</label>
									  <div class="col-md-6">
									  <span style="background-color: aliceblue;padding-right: 7px;padding-left: 7px;-webkit-border-radius: 5px;    -moz-border-radius: 5px;    border-radius: 5px;"><?=$edit_id?></span>
									  </div>
									</div>
									<?}?>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-2 control-label" for="title">عنوان</label>
								  <div class="col-md-6 ">
								  <input id="title" name="title" value="<?=$title?>" type="text" placeholder="" class="form-control input-md" required="">

								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-2 control-label" for="author">نویسنده</label>
								  <div class="col-md-6 ">
								  <input id="author" name="author"  value="<?=$author?>" type="text" placeholder="" class="form-control input-md" required="">

								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-2 control-label" for="translator">مترجم</label>
								  <div class="col-md-6 ">
								  <input id="translator" value="<?=$translator?>" name="translator" type="text" placeholder="" class="form-control input-md">

								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-2 control-label" for="publisher">ناشر</label>
								  <div class="col-md-6 ">
								  <input id="publisher" name="publisher"  value="<?=$publisher?>" type="text" placeholder="" class="form-control input-md">

								  </div>
								</div>

								<!-- Select Basic -->
								<div class="form-group">
								  <label class="col-md-2 control-label" for="bublish">نوع</label>
								  <div class="col-md-6 ">
								    <select id="bublish" name="bublish" class="form-control">
								      <option value="0" <?if($is_importand==0) echo 'selected'?>>ترجمه</option>
								      <option value="1" <?if($is_importand==1) echo 'selected'?>>تألیف</option>
								    </select>
								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-2 control-label" for="article_base">زمینه تحقیقاتی</label>
								  <div class="col-md-6 ">
								  <input id="article_base" value="<?=$article_base?>" name="article_base" type="text" placeholder="" class="form-control input-md">

								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-2 control-label" for="website">آدرس وبسایت</label>
								  <div class="col-md-6 ">
								  <input style="text-align: left; font-family: monospace;" value="<?=$website?>" id="website" name="website" type="text" placeholder="www.domain.com" class="form-control input-md">

								  </div>
								</div>




								<!-- Button -->
								<div class="form-group">
								  <label class="col-md-2 control-label" for="singlebutton">افزودن تصویر</label>
								  <div class="col-md-6 ">
										<div class="imgdemo"><img src="/yep_theme/default/rtl/images/photo.jpg"></div>
								    <button id="singlebutton" name="singlebutton" class="btn btn-success" style="padding: 5px;"><span class="addimg flaticon-add133"></span></button>
										<input id="article_image" value="<?=$article_image?>" name="article_image" class="imginput" type="text" required="">
								  </div>
								</div>

								<div class="form-group">
								  <label class="col-md-2 control-label" for="abstract">چکیده</label>
								  <div class="col-md-10 ">
								  <textarea id="abstract" name="abstract" style="width:100%"><?=$abstract?></textarea>

								  </div>
								</div>

								</fieldset>
								 



</div>


</div>
			        </div>

							<div class="tab-pane" id="tab_b">
			             <h4>از همون قبلی استفاده شود</h4>

			        </div>

							<div class="tab-pane" id="tab_c">
			          <div class="uploadbts"><a href="#"><button><span class="flaticon-add133"></span><span>آپلود فایل</span></button></a></div>

								<div class="toolbox">
								<div class="head"><span class="flaticon-upload36"></span><span style="color: rgb(82, 82, 82);">لیست فایل های آپلود شده</span></div>
								<div class="tools"><a href="#"><span style="color:red;" class="flaticon-delete84"></span></a><a href="#"><span class="flaticon-note35"></span></a></div>
								</div>

								<div class="table-responsive">
      <table class="table table-bordered fileslist">
        <thead>
          <tr>
            <th style="width:50px;">#</th>
						<th class="center sorting_disabled" rowspan="1" colspan="1" style="width: 42px;">
										<label class="position-relative">
											<input type="checkbox" class="ace conchkSelectAll">
											<span class="lbl"></span>
										</label></th>
            <th>عنوان فایل</th>
            <th style="width:200px;">حجم فایل</th>
            <th style="width:160px;">فرمت فایل</th>
          </tr>
        </thead>
        <tbody>
          <tr role="row" class="odd">
            <th scope="row">1</th>
						<td class="center" style="border-right: none;border-left: none;">
											<label class="position-relative">
												<input id="210" type="checkbox" class="ace conchkNumber">
												<span class="lbl"></span>
											</label>&nbsp;
										</td>
            <td>Filename</td>
            <td>200MB</td>
            <td>MKV</td>
          </tr>
          <tr role="row" class="even">
            <th scope="row">2</th>
						<td class="center" style="border-right: none;border-left: none;">
											<label class="position-relative">
												<input id="210" type="checkbox" class="ace conchkNumber">
												<span class="lbl"></span>
											</label>&nbsp;
										</td>
            <td>Filename 2</td>
            <td>10MB</td>
            <td>PDF</td>
          </tr>
          <tr role="row" class="odd">
            <th scope="row">3</th>
						<td class="center" style="border-right: none;border-left: none;">
											<label class="position-relative">
												<input id="210" type="checkbox" class="ace conchkNumber">
												<span class="lbl"></span>
											</label>&nbsp;
										</td>
            <td>Filename 3</td>
            <td>60MB</td>
            <td>MP3</td>
          </tr>
					<tr role="row" class="even">
            <th scope="row">4</th>
						<td class="center" style="border-right: none;border-left: none;">
											<label class="position-relative">
												<input id="210" type="checkbox" class="ace conchkNumber">
												<span class="lbl"></span>
											</label>&nbsp;
										</td>
            <td>Filename 4</td>
            <td>18MB</td>
            <td>PDF</td>
          </tr>
        </tbody>
      </table>
    </div>
			        </div>

<div class="tab-pane" id="tab_d">
<div class="row" style="  padding-right: 35px;">
<div class="form-group">
	<div class="row">
<label class="control-label" style="width: 100px;">کلمات کلیدی</label>
<p class="fdesc" style="width: 100px;"><span class="flaticon-information51"></span><span>متن راهنما</span></p>
<div class="col-md-6 ">
<select class="js-example-basic-multiple"  value='<?=$label?>' multiple="multiple" name="meta_label" id='meta_label'>
  <option style="width:100%;direction:rtl;" value="AL">کلمه 1</option>
  <option value="WY">کلمه 2</option>
</select>
</div>
</div>
</div>

<div class="form-group" id="tags">
	<div class="row">
	<label style="font-family: sans-serif;">Meta keyword</label>
	<p class="fdesc" style="width: 100px;"><span class="flaticon-information51"></span><span>متن راهنما</span></p>
	<div class="col-md-6 ">
	<input id="meta_keyword" name="meta_keyword" value='<?=$meta_keyword?>' type="text" placeholder="کلمه را وارد کنید و Enter را بزنید..."/>
	</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
  <label class="control-label" style="font-family: sans-serif;">Meta Description</label>
	<p class="fdesc" style="width: 100px;"><span class="flaticon-information51"></span><span>متن راهنما</span></p>
	<div class="col-md-6 ">
  <textarea style="width:400px;height: 250px;" class="form-control" id="meta_desciption" name="meta_desciption"><?=$meta_desciption?></textarea>
</div>
</div>
</div>
</div>
</div>

<div class="tab-pane" id="tab_e">
		<div style="padding-right: 35px;padding-left: 35px;">
								<div class="form-group">
								  <label class="col-md-2 control-label" for="article_base">اسلاید شو باشد</label>
								  <div class="col-md-6 ">
								  <input id="slide" value="1" name="slide" type="checkbox" placeholder="" class="  input-md">
								  </div>
								</div>
												 <div class="form-group">
													 <label class="control-label" for="singlebutton">تصویر اول</label>
													 <div class="imgdemo"><img src="/yep_theme/default/rtl/images/photo.jpg"></div>
													 <div>

														 <button id="singlebutton" name="singlebutton" class="btn btn-success" style="padding: 5px;"><span class="addimg flaticon-add133"></span></button>
														 <input id="slide_img1" value='<?=$slide_img1?>' name="slide_img1" class="imginput" type="text"  >
													 </div>
												 </div>

												<div class="form-group">
													<label class="control-label" for="singlebutton">تصویر دوم</label>
													<div>
														<button id="singlebutton" name="singlebutton" class="btn btn-success" style="padding: 5px;"><span class="addimg flaticon-add133"></span></button>
														<input id="slide_img2" value='<?=$slide_img2?>' name="slide_img2" class="imginput" type="text"  >
													</div>
												</div>

												<div class="form-group">
												<label class="control-label" for="start_date">تاریخ نمایش</label>


													<div>
											<a href="#"><span class="dateicon flaticon-calendar53"></span></a>
											<input id="start_date" name="start_date" value='<?=$start_date?>' class="dateinput" type="text"  >
													</div>

												</div>

												<div class="form-group">
													<label class="control-label" for="textinput">عنوان در اسلاید</label>
													<div>
													<input id="slide_title" name="slide_title" value='<?=$slide_title?>' type="text" placeholder="" class="form-control input-md">

													</div>
												</div>

												<div class="form-group">
													<label class="control-label" for="text">توضیحات 1</label>
													<div>
													<textarea name="text" style="width:100%" class="form-control"><?=$text?></textarea>

													</div>
												</div>

												<div class="form-group">
													<label class="control-label" for="text2">توضیحات 2</label>
													<div>
													<textarea name="text2" style="width:100%" class="form-control"><?=$text2?></textarea>

													</div>
												</div>

												<div class="form-group">
													<label class="control-label" for="text3">توضیحات 3</label>
													<div>
													<textarea name="text3" style="width:100%" class="form-control"><?=$text3?></textarea>

													</div>
												</div>

			</div>

</div>


<div class="tab-pane" id="tab_f">

	<div class="uploadbts"><a href="#"><button><span class="flaticon-add133"></span><span>افزودن خبر</span></button></a></div>

	<div class="toolbox">
	<div class="head"><span class="flaticon-copy23"></span><span style="color: rgb(82, 82, 82);">لیست اخبار مرتبط</span></div>
	<div class="tools"><a href="#"><span style="color:red;" class="flaticon-delete84"></span></a><a href="#"><span class="flaticon-note35"></span></a></div>
	</div>

	<div class="table-responsive">
	<table class="table table-bordered fileslist">
	<thead>
	<tr>
	<th style="width:50px;">#</th>
	<th class="center sorting_disabled" rowspan="1" colspan="1" style="width: 42px;">
			<label class="position-relative">
				<input type="checkbox" class="ace conchkSelectAll">
				<span class="lbl"></span>
			</label></th>
	<th>عنوان خبر</th>
	<th>سرتیتر</th>
	<th style="width:200px;">ارسال کننده</th>
	<th style="width:150px;">وضعیت</th>
	</tr>
	</thead>
	<tbody>
	<tr role="row" class="odd">
	<th scope="row">1</th>
	<td class="center" style="border-right: none;border-left: none;">
				<label class="position-relative">
					<input id="210" type="checkbox" class="ace conchkNumber">
					<span class="lbl"></span>
				</label>&nbsp;
			</td>
	<td>عنوان خبر</td>
	<td>عنوان سرتیتر</td>
	<td>اسماعیل فاضل</td>
	<td>منتشر شده</td>
	</tr>
	<tr role="row" class="even">
	<th scope="row">2</th>
	<td class="center" style="border-right: none;border-left: none;">
				<label class="position-relative">
					<input id="210" type="checkbox" class="ace conchkNumber">
					<span class="lbl"></span>
				</label>&nbsp;
			</td>
	<td>عنوان خبر</td>
	<td>عنوان سرتیتر</td>
	<td>اسماعیل فاضل</td>
		<td>منتشر شده</td>
	</tr>
	<tr role="row" class="odd">
	<th scope="row">3</th>
	<td class="center" style="border-right: none;border-left: none;">
				<label class="position-relative">
					<input id="210" type="checkbox" class="ace conchkNumber">
					<span class="lbl"></span>
				</label>&nbsp;
			</td>
	<td>عنوان خبر</td>
	<td>عنوان سرتیتر</td>
	<td>اسماعیل فاضل</td>
		<td>منتشر شده</td>
	</tr>
	<tr role="row" class="even">
	<th scope="row">4</th>
	<td class="center" style="border-right: none;border-left: none;">
				<label class="position-relative">
					<input id="210" type="checkbox" class="ace conchkNumber">
					<span class="lbl"></span>
				</label>&nbsp;
			</td>
	<td>عنوان خبر</td>
	<td>عنوان سرتیتر</td>
	<td>اسماعیل فاضل</td>
	<td>منتشر شده</td>
	</tr>
	</tbody>
	</table>
	</div>

</div>
<!--div class="tab-pane" id="tab_g">


	<div class="form-group">
		<label class="control-label" for="selectbasic">انتخاب منبع تصویر ناوبری</label>
		<p class="fdesc" style="width: 100px;"><span class="flaticon-information51"></span><span>متن راهنما</span></p>
		<div>
			<select id="selectbasic" name="selectbasic" class="form-control">
				<option value="1">استفاده از تصویر پیش فرض</option>
				<option value="2">آپلود تصویر اختصاصی</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label" for="singlebutton">بارگزاری تصویر جدید</label>
		<div class="headerimgdemo"><img src="/yep_theme/default/rtl/images/header.jpg"></div>
		<div>
			<button id="singlebutton" name="singlebutton" class="btn btn-success" style="padding: 5px;"><span class="addimg flaticon-add133"></span></button>
			<input id="textinput" name="textinput" class="imginput" type="text" required="">
		</div>
	</div>


</div-->

			</div><!-- tab content -->

</div>

<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 bttools">
	<a href="#"><button type="submit" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button></a>
	<a href="#"><button class="btn btn-primary"><span class="flaticon-browser93"></span><span>پیش نمایش</span></button></a>
</div>
</form>
		</div>
	</div>
</div>

<!--main row-->
</div>
<!--container-fluid-->
</div>
</body>
<script src="/yep_theme/default/rtl/js/jquery.min.js" type="text/javascript"></script>
<script src="/yep_theme/default/rtl/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/select2.full.min.js"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/select2.min.js"></script>

<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
<script type="text/javascript">
tinymce.init({
    selector: "#abstract",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<script type="text/javascript" language="javascript">
$(document).ready( function() {
  $("#meta_keyword").keypress( function(event) {
    var key = event.which;
    if (key == 13 || key == 44){
     event.preventDefault();
     var tag = $(this).val();
      if(tag.length > 0){
        $("<span class='tag' style='display:none'><span class='close'>&times;</span>"+tag+" </span>").insertBefore(this).fadeIn(100);
        //$(this).val("");
      }
    }
  });

  $("#tags").on("click", ".close", function() {
    $(this).parent("span").fadeOut(100);
  });

  $(".colors li").click(function() {
    var c = $(this).css("background-color");
    $(".tag").css("background-color",c);
    $("#title").css("color",c);
  });

});
</script>

</html>

<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link rel="stylesheet" href="/new_template/default/<?=$dir?>/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/basir/<?=$dir?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<?

if($_GET['lang_filter']>"")
$la=injection_replace($_GET["lang_filter"]);
else
$la=injection_replace($_POST["manage_lang_filter"]);
if($la=='')
$la=$default_lang;

if($_GET['site_filter']>"")
$site=injection_replace($_GET["site_filter"]);
else
$site=injection_replace($_POST["manage_site_filter"]);
if($site=='')
$site=$default_site;

if($_POST['send_flag']==1){
	 
#####meta description
	$meta_desciption=injection_replace($_POST["meta_desciption"]);
	insert_templdate($site,'',$la,$meta_desciption,'','','',"meta_desciption",$tem,$coms_conect);		
	
	$meta_keyword=injection_replace($_POST["meta_keyword"]);
	insert_templdate($site,'',$la,$meta_keyword,'','','',"meta_keyword",$tem,$coms_conect);		
#########

	$header_title=injection_replace($_POST["header_title"]);
	
	
	
 
	
	$header_pic=injection_replace($_POST["header_pic"]);
	$header_link=injection_replace($_POST["header_link"]);
	insert_templdate($site,$header_pic,$la,'',$header_title,$header_link,'',"header_title",$tem,$coms_conect);			





################################ نوار منو سمت راست################################
	$menu_bar_rigth=injection_replace($_POST["menu_bar_rigth"]); 
	if($menu_bar_rigth>"")
		
	insert_templdate($site,'',$la,'',$menu_bar_rigth,'','',"menu_bar_rigth",$tem,$coms_conect);	

	for($i=1;$i<=10;$i++){
		$menu_bar_title_rigth=injection_replace($_POST["menu_bar_title_rigth{$i}"]);
		$menu_bar_link_rigth=injection_replace($_POST["menu_bar_link_rigth{$i}"]);
 		//if($menu_bar_title_rigth>""&&$menu_bar_link_rigth>"")
		insert_templdate($site,'',$la,'',$menu_bar_title_rigth,$menu_bar_link_rigth,'',"menu_bar_title_rigth$i$j",$tem,$coms_conect);
			 
	}
 ################################نوار منو#################################  
	for($i=1;$i<=12;$i++){
		$menubar_count=injection_replace($_POST["menubar_count{$i}"]);
		if($i==1)$i='0'.$i; 
		$menu_bar_title_title=injection_replace($_POST["menu_bar_title_title{$i}"]);
		$menu_bar_title=injection_replace($_POST["menu_bar_title{$i}"]);
		$menu_bar_pic=injection_replace($_POST["menu_bar_pic{$i}"]);
	 
 
 		if($menu_bar_title>"")
		insert_templdate($site,$menu_bar_title_title,$la,'',$menu_bar_title,$menu_bar_pic,$menubar_count,"menu_bar$i",$tem,$coms_conect);	
	 	for($j=1;$j<=$menubar_count;$j++){
			$menubar_title=injection_replace($_POST["menubar_title{$i}{$j}"]);
			$menubar_link=injection_replace($_POST["menubar_link{$i}{$j}"]);
			if($menubar_title>""&&$menubar_link>"")
			insert_templdate($site,'',$la,'',$menubar_title,$menubar_link,'',"menu_bar_item$i$j",$tem,$coms_conect);
 
			 
		}
	}
################################زیر نوار منو################################
	$under_menu_bar_main_title=injection_replace($_POST["under_menu_bar_main_title"]);
	insert_templdate($site,'',$la,'',$under_menu_bar_main_title,$under_menu_bar_link,'',"under_menu_bar_main_title",$tem,$coms_conect);
	for($i=1;$i<=6;$i++){	
		$under_menu_bar_link=injection_replace($_POST["under_menu_bar_link{$i}"]);
		$under_menu_bar_title=injection_replace($_POST["under_menu_bar_title{$i}"]);
		insert_templdate($site,'',$la,'',$under_menu_bar_title,$under_menu_bar_link,'',"under_menu_bar_link$i",$tem,$coms_conect);
	}	
################################شبکه های اجتماعی هدر################################
	for($i=1;$i<=6;$i++){	
		$header_social_network_link=injection_replace($_POST["header_social_network_link{$i}"]);
		$header_social_network_title=injection_replace($_POST["header_social_network_title{$i}"]);
		$header_social_network_pic=injection_replace($_POST["header_social_network_pic{$i}"]);
		insert_templdate($site,$header_social_network_pic,$la,'',$header_social_network_title,$header_social_network_link,'',"header_social_network$i",$tem,$coms_conect);
	}	
################################تبلیغ بالای اسلاید شو################################
		$news_ads_click=injection_replace($_POST["news_ads_click"]);
			if($news_ads_click=='')$news_ads_click=0;
	 		$news_ads_title=injection_replace($_POST["news_ads_title"]);
			$news_ads_link=injection_replace($_POST["news_ads_link"]);
			$news_ads_pic=injection_replace($_POST["news_ads_pic"]);
			insert_templdate($site,$news_ads_pic,$la,'',$news_ads_title,$news_ads_link,$news_ads_click,"news_ads",$tem,$coms_conect);

	
###############################تبلیغ صفحه دوم###############################
		$ads_page2_click=injection_replace($_POST["ads_page2_click"]);
			if($ads_page2_click=='')$ads_page2_click=0;
	 		$ads_page2_click_title=injection_replace($_POST["ads_page2_click_title"]);
			$ads_page2_click_link=injection_replace($_POST["ads_page2_click_link"]);
			$ads_page2_click_pic=injection_replace($_POST["ads_page2_click_pic"]);
			insert_templdate($site,$ads_page2_click_pic,$la,'',$ads_page2_click_title,$ads_page2_click_link,$ads_page2_click,"ads_page2_click",$tem,$coms_conect);

		
	################################تبلیغ کنار اسلایدشو################################
	for($i=0;$i<=2;$i++){	
			$unser_slideshow_click=injection_replace($_POST["unser_slideshow_click{$i}"]);
			if($unser_slideshow_click=='')$unser_slideshow_click=0;
			$unser_slideshow_title=injection_replace($_POST["unser_slideshow_title{$i}"]);
			$unser_slideshow_link=injection_replace($_POST["unser_slideshow_link{$i}"]);
			$unser_slideshow_pic=injection_replace($_POST["unser_slideshow_pic{$i}"]);
			insert_templdate($site,$unser_slideshow_pic,$la,'',$unser_slideshow_title,$unser_slideshow_link,$unser_slideshow_click,"unser_slideshow_ads$i",$tem,$coms_conect);
	}
	
################################پیشنهاد سردبیر#################################
		
			$chief_editor_suggest=injection_replace($_POST["chief_editor_suggest"]);
			insert_templdate($site,'',$la,$chief_editor_suggest,'','','',"chief_editor_suggest",$tem,$coms_conect);




################################تبلیغ بین آخرین محتوا################################
	for($i=1;$i<=3;$i++){	
			$ads_betwen_content_click=injection_replace($_POST["ads_betwen_content_click{$i}"]);
			if($ads_betwen_content_click=='')$ads_betwen_content_click=0;
 	 		$ads_betwen_content_title=injection_replace($_POST["ads_betwen_content_title{$i}"]);
			$ads_betwen_content_link=injection_replace($_POST["ads_betwen_content_link{$i}"]);
			$ads_betwen_content_pic=injection_replace($_POST["ads_betwen_content_pic{$i}"]);
			insert_templdate($site,$ads_betwen_content_pic,$la,'',$ads_betwen_content_title,$ads_betwen_content_link,$ads_betwen_content_click,"ads_betwen_content_title$i",$tem,$coms_conect);
	}
			
################################تبلیغ سمت چپ################################
	for($i=1;$i<=8;$i++){	
			$ads_left_side_click=injection_replace($_POST["ads_left_side_click{$i}"]);
			if($ads_left_side_click=='')$ads_left_side_click=0;
 	 		$ads_left_side_title=injection_replace($_POST["ads_left_side_title{$i}"]);
			$ads_left_side_link=injection_replace($_POST["ads_left_side_link{$i}"]);
			$ads_left_side_pic=injection_replace($_POST["ads_left_side_pic{$i}"]);
			insert_templdate($site,$ads_left_side_pic,$la,'',$ads_left_side_title,$ads_left_side_link,$ads_left_side_click,"ads_left_side_pic$i",$tem,$coms_conect);
	}	
################################دسته از محتوا ساز#################################
	$static_page_cat=injection_replace($_POST["static_page_cat"]);
	insert_templdate($site,'',$la,$static_page_cat,'','','',"static_page_cat",$tem,$coms_conect);
################################یادداشت#################################
	$note_content_cat=injection_replace($_POST["note_content_cat"]);
	$note_content_cat_title=injection_replace($_POST["note_content_cat_title"]);
	insert_templdate($site,'',$la,$note_content_cat,$note_content_cat_title,'','',"note_content_cat",$tem,$coms_conect);
  ################################تبلیغ زیر یادداشت#################################
	for($i=1;$i<=3;$i++){	
			$ads_under_note_click=injection_replace($_POST["ads_under_note_click{$i}"]);
			if($ads_under_note_click=='')$ads_under_note_click=0;
			$ads_under_note_pic=injection_replace($_POST["ads_under_note_pic{$i}"]);
			$ads_under_note_title=injection_replace($_POST["ads_under_note_title{$i}"]);
			$ads_under_note_link=injection_replace($_POST["ads_under_note_link{$i}"]);
			insert_templdate($site,$ads_under_note_pic,$la,'',$ads_under_note_title,$ads_under_note_link,$ads_under_note_click,"ads_under_note$i",$tem,$coms_conect);
	} 
	################################تبلیغ بالای گالری#################################
	for($i=1;$i<=5;$i++){	
			$ads_up_gallery_click=injection_replace($_POST["ads_up_gallery_click{$i}"]);
			if($ads_up_gallery_click=='')$ads_up_gallery_click=0;
			$ads_up_gallery_title=injection_replace($_POST["ads_up_gallery_title{$i}"]);
			$ads_up_gallery_pic=injection_replace($_POST["ads_up_gallery_pic{$i}"]);
			$ads_up_gallery_link=injection_replace($_POST["ads_up_gallery_link{$i}"]);
			insert_templdate($site,$ads_up_gallery_pic,$la,'',$ads_up_gallery_title,$ads_up_gallery_link,$ads_up_gallery_click,"ads_up_gallery$i",$tem,$coms_conect);
	}
	
	################################تبلیغ زیر گالری#################################
	for($i=1;$i<=3;$i++){	
			$ads_down_gallery_click=injection_replace($_POST["ads_down_gallery_click{$i}"]);
			if($ads_down_gallery_click=='')$ads_down_gallery_click=0;
			$ads_down_gallery_title=injection_replace($_POST["ads_down_gallery_title{$i}"]);
			$ads_down_gallery_pic=injection_replace($_POST["ads_down_gallery_pic{$i}"]);
			$ads_down_gallery_link=injection_replace($_POST["ads_down_gallery_link{$i}"]);
			insert_templdate($site,$ads_down_gallery_pic,$la,'',$ads_down_gallery_title,$ads_down_gallery_link,$ads_down_gallery_click,"ads_down_gallery$i",$tem,$coms_conect);
	}
	
 ################################دسته گالری تصاویر ################################

			$gallery_cat=injection_replace($_POST["gallery_cat"]);
			insert_templdate($site,'',$la,$gallery_cat,'','','',"gallery_cat",$tem,$coms_conect);
			
################################تبلیغ زیر گالری################################
	for($i=1;$i<=8;$i++){	
			$ads_under_gallery_click=injection_replace($_POST["ads_under_gallery_click{$i}"]);
			if($ads_under_gallery_click=='')$ads_under_gallery_click=0;
 	 		$ads_under_gallery_title=injection_replace($_POST["ads_under_gallery_title{$i}"]);
			$ads_under_gallery_link=injection_replace($_POST["ads_under_gallery_link{$i}"]);
			$ads_under_gallery_pic=injection_replace($_POST["ads_under_gallery_pic{$i}"]);
			insert_templdate($site,$ads_under_gallery_pic,$la,'',$ads_under_gallery_title,$ads_under_gallery_link,$ads_under_gallery_click,"ads_under_gallery$i",$tem,$coms_conect);
	}

################################یادداشت#################################
	$learn_content_cat=injection_replace($_POST["learn_content_cat"]);
	$learn_content_cat_title=injection_replace($_POST["learn_content_cat_title"]);
	insert_templdate($site,'',$la,$learn_content_cat,$learn_content_cat_title,'','',"learn_content_cat",$tem,$coms_conect);

	################################بررسی#################################
	$check_content=injection_replace($_POST["check_content"]);
 	insert_templdate($site,'',$la,$check_content,'','','',"check_content",$tem,$coms_conect);


	###############################خودرو#################################
	$car_article=injection_replace($_POST["car_article"]);
	$car_check_text=injection_replace($_POST["car_check_text"]);
 	insert_templdate($site,'',$la,$car_check_text,$car_article,'','',"car_article",$tem,$coms_conect);

	

	
	################################ویدئو################################
	for($i=1;$i<=10;$i++){	
 	 		$video_cat=injection_replace($_POST["video_cat{$i}"]);
			insert_templdate($site,'',$la,$video_cat,'','','',"video_cat$i",$tem,$coms_conect);
	}			
 	
	
	
	###############################فوتر صفحه دوم############################
	for($i=1;$i<=4;$i++){	
 	 		$footer_page_2_content=injection_replace($_POST["footer_page_2_content{$i}"]);
 	 		$footer_page_2_page=injection_replace($_POST["footer_page_2_page{$i}"]);
 	 		$footer_page_2_title=injection_replace($_POST["footer_page_2_title{$i}"]);
			insert_templdate($site,'',$la,$footer_page_2_content,$footer_page_2_title,$footer_page_2_page,'',"footer_page_2$i",$tem,$coms_conect);
	}		
	
	
	
################################لینک های فوتر################################
	for($i=1;$i<=12;$i++){	
			$fotter_link=injection_replace($_POST["fotter_link{$i}"]);
			$fotter_link_title=injection_replace($_POST["fotter_link_title{$i}"]);
			$tempalate_feachers_title=injection_replace($_POST["tempalate_feachers_title{$i}"]);
			insert_templdate($site,'',$la,'',$fotter_link_title,$fotter_link,'',"fotter_link$i",$tem,$coms_conect);
	}	
################################شبکه های اجتماعی فوتر################################
 
	for($i=1;$i<=6;$i++){	
		$footer_social_network_link=injection_replace($_POST["footer_social_network_link{$i}"]);
		$footer_social_network_title=injection_replace($_POST["footer_social_network_title{$i}"]);
		$footer_social_network_pic=injection_replace($_POST["footer_social_network_pic{$i}"]);
		insert_templdate($site,$footer_social_network_pic,$la,'',$footer_social_network_title,$footer_social_network_link,'',"footer_social_network$i",$tem,$coms_conect);
	}

################################شبکه های اجتماعی فوتر################################
 
	for($i=1;$i<=10;$i++){	
		$abadis_link=injection_replace($_POST["abadis_link{$i}"]);
		$abadis_link_title=injection_replace($_POST["abadis_link_title{$i}"]);
		insert_templdate($site,'',$la,'',$abadis_link_title,$abadis_link,'',"abadis_link$i",$tem,$coms_conect);
	}

	
######################تصویر فوتر#####################
	$fotter_ads_pic_click=injection_replace($_POST["fotter_ads_pic_click"]);
	if($fotter_ads_pic_click=='')$fotter_ads_pic_click=0;
	$fotter_ads_pic=injection_replace($_POST["fotter_ads_pic"]);
	$fotter_ads_pic_link=injection_replace($_POST["fotter_ads_pic_link"]);
	$fotter_ads_pic_title=injection_replace($_POST["fotter_ads_pic_title"]);
 
	insert_templdate($site,$fotter_ads_pic,$la,'',$fotter_ads_pic_title,$fotter_ads_pic_link,$fotter_ads_pic_click,"fotter_ads_pic",$tem,$coms_conect);	

	
 
 
########################قوانین ارسال دیدگاه#######################
	$low_text= ($_POST["low_text"]);
	insert_templdate($site,'',$la,$low_text,'','','',"low_text",$tem,$coms_conect);	
###################ورورد به سایت#####################
	$login_first_text=($_POST["login_first_text"]);
	$login_first_title=injection_replace($_POST["login_first_title"]);
	insert_templdate($site,'',$la,$login_first_text,$login_first_title,'','',"login_first_text",$tem,$coms_conect);
###################ورورد sms#####################
	$login_sms_text=($_POST["login_sms_text"]);
	$login_sms_title=injection_replace($_POST["login_sms_title"]);
	insert_templdate($site,'',$la,$login_sms_text,$login_sms_title,'','',"login_sms_text",$tem,$coms_conect);	
###################ثبت نام#####################
	$register_text=($_POST["register_text"]);
	$register_title=injection_replace($_POST["register_title"]);
	insert_templdate($site,'',$la,$register_text,$register_title,'','',"register_text",$tem,$coms_conect);	
	 $reg_low=($_POST["reg_low"]);
	insert_templdate($site,'',$la,$reg_low,'','','',"reg_low",$tem,$coms_conect);
###################فعال کردن کاربران sms#####################
	$active_user_sms=($_POST["active_user_sms"]);
	$active_user_sms_title=injection_replace($_POST["active_user_sms_title"]);
	insert_templdate($site,'',$la,$active_user_sms,$active_user_sms_title,'','',"active_user_sms",$tem,$coms_conect);		
/* 
#######################درباره ما##########################	
	$about_us=injection_replace($_POST["about_us"]);
	$about_us_title=injection_replace($_POST["about_us_title"]);
	insert_templdate($site,'',$la,$about_us,$about_us_title,'','',"about_us",$tem,$coms_conect);
	
#####ثبت نام	
	$reg_first_text=($_POST["reg_first_text"]);
	$reg_first_pic=injection_replace($_POST["reg_first_pic"]);
	insert_templdate($site,$reg_first_pic,$la,$reg_first_text,'','','',"reg_first_text",$tem,$coms_conect);
	$reg_secend_text=($_POST["reg_secend_text"]);
	insert_templdate($site,'',$la,$reg_secend_text,'','','',"reg_secend_text",$tem,$coms_conect);	

#####ورود به سایت	

	$login_secend_text=($_POST["login_secend_text"]);
	insert_templdate($site,'',$la,$login_secend_text,'','','',"login_secend_text",$tem,$coms_conect);	
	*/
}	
?>
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

<script type="text/javascript">
 $(document).on("click", ".del_menu", function(e) {		
		$("#btn_ok").val($(this).attr('id'));
	});
	
 $(document).ready(function() {
    $('.video_cat').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=8 and status=1 and la='$la'";
				 
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
        multiple: false,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
});	
	
 $(document).ready(function() {
    $('.news_cat').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=11 and status=1 and la='$la'";
				 
				$result = $coms_conect->query($query);
				$i=0;
				echo '{'.'id'.':0,' .'text'.':'."'انتخاب کنید'"."}";
				while($RS1=$result->fetch_assoc()){
					$id=$RS1["id"];
					$name=$RS1["name"];
					if(in_array($id,$_SESSION['manager_page_cat'])){
 
						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						$i++;
					}
				
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

 $(document).ready(function() {
    $('.gallery_cat').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=9 and status=1 and la='$la'";
				 
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
        multiple: false,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
});


 $(document).ready(function() {
    $('.page_cat').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=5 and status=1 and la='$la'";
				 
				$result = $coms_conect->query($query);
				$i=0;
				echo '{'.'id'.':0,' .'text'.':'."'انتخاب کنید'"."}";
				while($RS1=$result->fetch_assoc()){
					$id=$RS1["id"];
					$name=$RS1["name"];
					
					if(in_array($id,$_SESSION['manager_page_cat'])){
 
						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
						$i++;
					}
				
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
 
<div class="panel panel-primary">
	 <div class="panel-heading">
		 <h3 class="panel-title">تنظيمات قالب</h3>
	 </div>
	 <div class="panel-body">
		 <form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form" enctype="multipart/form-data">
		 <input type="hidden" name="send_flag" value="1">
			<!-- vertical tab bootsnipp -->
		<div class="">
			<div class="col-md-12 bhoechie-tab-container"><br>
				<div class="container">
					<label class="col-md-1 form-group">زبان</label>	
					<div class="col-md-2 form-group">
						<?create_lang_filter($la,$coms_conect,$_SESSION["manager_title_lang"])?>
					</div>
				</div>
			<div class="container">	
				<label class="col-md-1 form-group">سایت</label>	
				<div class="col-md-2 form-group">
					<?create_sub_site_filter($site,$coms_conect,$_SESSION['manager_title_site'])?>
				</div>
			</div>	
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  هدر
                </a>
                <a href="#" class="list-group-item  text-center">
                  نوار منو سمت راست
                </a>
				<?for($i=1;$i<=12;$i++){?>
  			     <a href="#" class="list-group-item  text-center">
                  نوار منو شماره <?=$i?>
                </a> 
				<?}?>
				<a href="#" class="list-group-item  text-center">
                زیر نوار منو
                </a> 	
				<a href="#" class="list-group-item  text-center">
               شبکه های اجتماعی هدر
                </a> 
				 <a href="#" class="list-group-item  text-center">
                 تبلیغ بالای اسلاید شو
                </a>
				<a href="#" class="list-group-item  text-center">
                تبلیغ صفحه دوم
                </a>
				<a href="#" class="list-group-item  text-center">
                تبلیغ کنار اسلایدشو
                </a> 
                <a href="#" class="list-group-item  text-center">
                پیشنهاد سردبیر
                </a> 
				<a href="#" class="list-group-item  text-center">
                  تبلیغ بین آخرین محتوا
                </a> 
				<a href="#" class="list-group-item  text-center">
                 دسته از محتوا ساز
                </a> 
				<a href="#" class="list-group-item  text-center">
                 یادداشت
                </a> 
				
                <a href="#" class="list-group-item  text-center">
                تبلیغ زیر یادداشت
                </a> 
				<a href="#" class="list-group-item  text-center">
               تبلیغ بالای گالری
                </a> 	
				<a href="#" class="list-group-item  text-center">
               تبلیغ زیر گالری
                </a> 
				<a href="#" class="list-group-item  text-center">
                آموزش
                </a> 				
                <a href="#" class="list-group-item  text-center">
                 بررسی
                </a> 
				<a href="#" class="list-group-item  text-center">
                 خودرو
                </a>
				<a href="#" class="list-group-item  text-center">
                 ویدئو
                </a>
 
				 <a href="#" class="list-group-item  text-center">
               لینک های فوتر
                </a> 
				 <a href="#" class="list-group-item  text-center">
                خانواده ابادیس
                </a> 
				<a href="#" class="list-group-item  text-center">
				دسته های فوتر صفحه دوم
                </a>
				<a href="#" class="list-group-item  text-center">
                تبلیغ فوتر
                </a>
               <a href="#" class="list-group-item  text-center">
                  شبکه های اجتماعی فوتر
                </a> 
  
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
<!----------------------------------تماس با ما هدر------------>
			   <div class="bhoechie-tab-content active">
                    <center>
						<?$header_title= get_tem_result($site,$la,"header_title",$tem,$coms_conect);?>
						 
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">عنوان سایت</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  value="<?=$header_title['title']?>" class="form-control" name="header_title" style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر هدر</label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$header_title['pic_adress']?>"  id="header_pic" name="header_pic">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=header_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک تصویر</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  value="<?=$header_title['link']?>" class="form-control" name="header_link" style="direction: rtl;">
							</div>					
						</div>
					</div>
					<?$meta_keyword= get_tem_result($site,$la,"meta_keyword",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">meta_keyword</label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
								<input type="text" class="col-md-12"  data-role="tagsinput" value="<?=$meta_keyword['text']?>"  id="meta_keyword" name="meta_keyword"> 
							</div>
						</div>
					</div>
					<?$meta_desciption= get_tem_result($site,$la,"meta_desciption",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">meta_desciption</label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<textarea type="text" class="col-md-12"    id="meta_desciption" name="meta_desciption"><?=$meta_desciption['text']?></textarea>
							</div>
						</div>
					</div>
					<hr>	
                  </center>
              </div>
			  
<!--------------------------------نوار منو سمت راست------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?$menu_bar_rigth= get_tem_result($site,$la,"menu_bar_rigth",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان کلی نوار منو</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="menu_bar_rigth" value="<?=$menu_bar_rigth['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					
					
					<?for($i=1;$i<=10;$i++){
						$menu_bar_title_rigth= get_tem_result($site,$la,"menu_bar_title_rigth$i",$tem,$coms_conect);
						?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="menu_bar_title_rigth<?=$i?>" value="<?=$menu_bar_title_rigth['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">لینک <?=$i?></label>
						<div class="form-group col-md-9">
							 <div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="menu_bar_link_rigth<?=$i?>" value="<?=$menu_bar_title_rigth['link']?>"  style="direction: rtl;">
 							 </div>	
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>				  
			  
 				 
 <!----------------------------------نوار منو----------->			 	  
			   
			  <?for($i=1;$i<=12;$i++){
				if($i==1)$i='0'.$i;
				$menu_bar= get_tem_result($site,$la,"menu_bar$i",$tem,$coms_conect);    
				
				?>
			   <div class="bhoechie-tab-content ">
                    <center>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">عنوان نوار منو</label>
							<div class="form-group col-md-9">
								 <div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="menu_bar_title_title<?=$i?>" value="<?=$menu_bar['pic_adress']?>"  style="direction: rtl;">
								 </div>	
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">دسته <?=$i?> </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="hidden" id="cat_val<?=$i?>" name="cat_val<?=$i?>" value="<?=$menu_bar['link']?>">
									<select id="menu_bar_title<?=$i?>" data-selectid="<?=$i?>" class="form-control select_module" name="menu_bar_title<?=$i?>">
										<?$sql1 = "SELECT name,id from new_modules  a    where view=1";
										$result1 = $coms_conect->query($sql1);
										echo "<option value='0'>انتخاب کنید</option>";
											while($row = $result1->fetch_assoc()){
												$str='';
												if($row['id']==$menu_bar['title'])
													$str='selected';
												echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
											}
										?>
									</select>
								</div>					
							</div>
							<div id="module_cat<?=$i?>"></div>
						</div>
							<?for($j=1;$j<=$menu_bar['pic'];$j++){
					 
						 	 $menu_bar_item= get_tem_result($site,$la,"menu_bar_item$i$j",$tem,$coms_conect);?>
								<div id="ads<?=$i.$j?>" class="seyed" style="opacity: 1;">
									<div class="form-group">
										<a class="col-md-1 control-label del-ads<?=$i?>" id="<?=$i.$j?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
											<label class="col-md-2 control-label" for="family">زیر دسته <?=$i.$j?></label> 
										<div class="form-group col-md-9">
											<div class="col-md-6 input-group">	
												<input type="text"  id="menubar_title<?=$i.$j?>" value="<?=$menu_bar_item['title']?>" class="form-control" placeholder="عنوان" name="menubar_title<?=$i.$j?>" >
											</div>	
											<div class="col-md-6 input-group">	
												<input type="text"  id="menubar_link<?=$i.$j?>" value="<?=$menu_bar_item['link']?>" class="form-control" placeholder="لینک" name="menubar_link<?=$i.$j?>" style="direction: ltr;">		
											</div>	
										</div>
									</div>
								</div>
							<?}
							$k=$j;
							$k--;
						
					 
						?> 
						 
						 <? if($i=='01')$i=1;?>
						<input type="hidden" id="menubar_count<?=$i?>" name="menubar_count<?=$i?>" value="<?=$k?>">
						<script>
							$(document).ready(function(){
								var k=<?=$i?> 
								var i = <?=$i.$j?>;
								<?if($i==1)$n='0'.$i;else $n=$i;?>
						 		var m=<?=$j?>;
								$('#add-ads<?=$i?>').on("click", function() {	 
									if(k==1)
									n='0'+i;else
									n=i;

								
									var someText = '<div id="ads'+n+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads<?=$n?>" id="'+n+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک#'+n+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="menubar_title'+n+'" value="" class="form-control" placeholder="عنوان" name="menubar_title'+n+'" ></div><div class="col-md-6 input-group"> <input type="text" id="menubar_link'+n+'" value="" class="form-control" placeholder="لینک" name="menubar_link'+n+'" style="direction: ltr;"></a></span></div></div></div></div>';				
									$(this).before(someText);						 
									$('#ads'+i+'').fadeTo('slow', 0.3, function()
									{
										$(this).css('background', '');
									}).fadeTo('slow', 1);
									$('#menubar_count<?=$i?>').val(m);
									m++;
									i++;
								});
							
								$(document).on('click', '.del-ads<?=$n?>',function(){													
									var id = '';
									var k=$('#menubar_count<?=$i?>').val();k--;
 									id = $(this).attr('id');
									$('#ads'+id).remove();
									$('#menubar_count<?=$i?>').val(k);
								});
							});
						</script>
							<a class="btn btn-success block" id="add-ads<?=$i?>"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>افزودن لینک</a>
							</br>	
		            </center>
                </div>
			  <?}?>
<!--------------------------------زیر نوار منو------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?$under_menu_bar_main_title= get_tem_result($site,$la,"under_menu_bar_main_title",$tem,$coms_conect);?>
					 <div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان کلی</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="under_menu_bar_main_title" value="<?=$under_menu_bar_main_title['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<?for($i=1;$i<=6;$i++){
						$under_menu_bar_link= get_tem_result($site,$la,"under_menu_bar_link$i",$tem,$coms_conect);
						?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="under_menu_bar_title<?=$i?>" value="<?=$under_menu_bar_link['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">لینک </label>
						<div class="form-group col-md-9">
							 <div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="under_menu_bar_link<?=$i?>" value="<?=$under_menu_bar_link['link']?>"  style="direction: rtl;">
 
							 </div>	
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>	
				
<!--------------------------------شبکه های اجتماعی هدر------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=6;$i++){
						$header_social_network= get_tem_result($site,$la,"header_social_network$i",$tem,$coms_conect);
						?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="header_social_network_title<?=$i?>" value="<?=$header_social_network['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">لینک و ایکون</label>
						<div class="form-group col-md-9">
							 <div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="header_social_network_link<?=$i?>" value="<?=$header_social_network['link']?>"  style="direction: rtl;">
								<span class="input-group-btn">
									<button class="btn btn-default form-control" name="header_social_network_pic<?=$i?>" data-iconset="fontawesome" data-icon="<?=$header_social_network['pic_adress']?>" role="iconpicker" ></button>
								</span>
							 </div>	
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>					
				
<!---------------------------------- تبلیغ بالای اسلاید شو--------->
				<div class="bhoechie-tab-content ">
                    <center>
					<?$news_ads= get_tem_result($site,$la,"news_ads",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="news_ads_title" value="<?=$news_ads['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="news_ads_link" value="<?=$news_ads['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$news_ads['pic_adress']?>"  id="news_ads_pic" name="news_ads_pic">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=news_ads_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تبلیغ کلیکی </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="checkbox"    value='1' name="news_ads_click"  <?if($news_ads['pic']==1)echo 'checked';?>   style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					</center>
                </div>
<!----------------------------------تبلیغ صفحه دوم--------->
				<div class="bhoechie-tab-content ">
                    <center>
					<?$ads_page2_click= get_tem_result($site,$la,"ads_page2_click",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_page2_click_title" value="<?=$ads_page2_click['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_page2_click_link" value="<?=$ads_page2_click['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$ads_page2_click['pic_adress']?>"  id="ads_page2_click_pic" name="ads_page2_click_pic">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=ads_page2_click_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تبلیغ کلیکی </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="checkbox"    value='1' name="ads_page2_click"  <?if($ads_page2_click['pic']==1)echo 'checked';?>   style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					</center>
                </div>
<!---------------------------------- تبلیغ کنار اسلایدشو--------->
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=2;$i++){
						$unser_slideshow_ads= get_tem_result($site,$la,"unser_slideshow_ads$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="unser_slideshow_title<?=$i?>" value="<?=$unser_slideshow_ads['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="unser_slideshow_link<?=$i?>" value="<?=$unser_slideshow_ads['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$unser_slideshow_ads['pic_adress']?>"  id="unser_slideshow_pic<?=$i?>" name="unser_slideshow_pic<?=$i?>">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=unser_slideshow_pic<?=$i?>" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تبلیغ کلیکی </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="checkbox"    value='1' name="unser_slideshow_click<?=$i?>"  <?if($unser_slideshow_ads['pic']==1)echo 'checked';?>   style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>	

				
<!----------------------------------پیشنهاد سردبیر------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?$chief_editor_suggest= get_tem_result($site,$la,"chief_editor_suggest",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">انتخاب دسته</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir news_cat"  type="text" name="chief_editor_suggest" value="<?=$chief_editor_suggest['text']?>" id="chief_editor_suggest" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<hr>
				       </center>
				</div>				
				
<!----------------------------------تبلیغ سمت چپ-------->
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=3;$i++){
						$ads_betwen_content_title= get_tem_result($site,$la,"ads_betwen_content_title$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_betwen_content_title<?=$i?>" value="<?=$ads_betwen_content_title['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_betwen_content_link<?=$i?>" value="<?=$ads_betwen_content_title['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$ads_betwen_content_title['pic_adress']?>"  id="ads_betwen_content_pic<?=$i?>" name="ads_betwen_content_pic<?=$i?>">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=ads_betwen_content_pic<?=$i?>" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تبلیغ کلیکی </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="checkbox"    value='1' name="ads_betwen_content_click<?=$i?>"  <?if($ads_betwen_content_title['pic']==1)echo 'checked';?>   style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>
				
 
				
 
				
<!----------------------------------دسته از محتوا ساز------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?$static_page_cat= get_tem_result($site,$la,"static_page_cat",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">انتخاب دسته</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir news_cat"  type="text" name="static_page_cat" value="<?=$static_page_cat['text']?>" id="static_page_cat" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<hr>
				       </center>
				</div>					
				
<!----------------------------------یادداشت------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?$note_content_cat= get_tem_result($site,$la,"note_content_cat",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان  </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="note_content_cat_title" value="<?=$note_content_cat['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">انتخاب دسته</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir news_cat"  type="text" name="note_content_cat" value="<?=$note_content_cat['text']?>" id="static_page_cat" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<hr>
				       </center>
				</div>						
 
 
<!----------------------------------تبلیغ زیر یادداشت-------->
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=3;$i++){
						$ads_under_note= get_tem_result($site,$la,"ads_under_note$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_under_note_title<?=$i?>" value="<?=$ads_under_note['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_under_note_link<?=$i?>" value="<?=$ads_under_note['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$ads_under_note['pic_adress']?>"  id="ads_under_note_pic<?=$i?>" name="ads_under_note_pic<?=$i?>">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=ads_under_note_pic<?=$i?>" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تبلیغ کلیکی </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="checkbox"    value='1' name="ads_under_note_click<?=$i?>"  <?if($ads_under_note['pic']==1)echo 'checked';?>   style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>
				
<!----------------------------------تبلیغ بالای گالری-------->
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=5;$i++){
						$ads_up_gallery= get_tem_result($site,$la,"ads_up_gallery$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_up_gallery_title<?=$i?>" value="<?=$ads_up_gallery['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_up_gallery_link<?=$i?>" value="<?=$ads_up_gallery['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$ads_up_gallery['pic_adress']?>"  id="ads_up_gallery_pic<?=$i?>" name="ads_up_gallery_pic<?=$i?>">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=ads_up_gallery_pic<?=$i?>" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تبلیغ کلیکی </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="checkbox"    value='1' name="ads_up_gallery_click<?=$i?>"  <?if($ads_up_gallery['pic']==1)echo 'checked';?>   style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>				
<!----------------------------------تبلیغ زیر گالری-------->
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=3;$i++){
						$ads_down_gallery= get_tem_result($site,$la,"ads_down_gallery$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_down_gallery_title<?=$i?>" value="<?=$ads_down_gallery['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="ads_down_gallery_link<?=$i?>" value="<?=$ads_down_gallery['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$ads_down_gallery['pic_adress']?>"  id="ads_down_gallery_pic<?=$i?>" name="ads_down_gallery_pic<?=$i?>">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=ads_down_gallery_pic<?=$i?>" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تبلیغ کلیکی </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="checkbox"    value='1' name="ads_down_gallery_click<?=$i?>"  <?if($ads_down_gallery['pic']==1)echo 'checked';?>   style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>	

<!---------------------------------آموزش----------->
				<div class="bhoechie-tab-content ">
                    <center>
					<?$learn_content_cat= get_tem_result($site,$la,"learn_content_cat",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان  </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="learn_content_cat_title" value="<?=$learn_content_cat['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">انتخاب دسته</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir news_cat"  type="text" name="learn_content_cat" value="<?=$learn_content_cat['text']?>" id="static_page_cat" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<hr>
				       </center>
				</div>						
 

				
<!----------------------------------بررسی ها------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?$check_content= get_tem_result($site,$la,"check_content",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">انتخاب دسته</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir news_cat"  type="text" name="check_content" value="<?=$check_content['text']?>" id="check_content" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<hr>
				       </center>
				</div>				
										
<!----------------------------------خودرو------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?$car_article= get_tem_result($site,$la,"car_article",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">مقاله</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir news_cat"  type="text" name="car_article" value="<?=$car_article['title']?>" id="car_article" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">بررسی</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir news_cat"  type="text" name="car_check_text" value="<?=$car_article['text']?>" id="car_check_text" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<hr>
				       </center>
				</div>				
								
<!----------------------------------ویدئو------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=10;$i++){
					$video_cat= get_tem_result($site,$la,"video_cat$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">دسته شماره <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir video_cat"  type="text" name="video_cat<?=$i?>" value="<?=$video_cat['text']?>"  rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
 					<hr>
					<?}?>
				       </center>
				</div>									
								
								
								
 
<!----------------------------------لینک های فوتر------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=12;$i++){
						$fotter_link= get_tem_result($site,$la,"fotter_link$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="fotter_link_title<?=$i?>" value="<?=$fotter_link['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="fotter_link<?=$i?>" value="<?=$fotter_link['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>
<!---------------------------------خانواده ابادیس------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=10;$i++){
						$abadis_link= get_tem_result($site,$la,"abadis_link$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="abadis_link_title<?=$i?>" value="<?=$abadis_link['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">لینک <?=$i?> </label>
						<div class="form-group col-md-9">
							 <div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="abadis_link<?=$i?>" value="<?=$abadis_link['link']?>"  style="direction: rtl;">
							 </div>	
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>
					
<!----------------------------------فوتر صفحه دوم------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=4;$i++){
					$footer_page_2= get_tem_result($site,$la,"footer_page_2$i",$tem,$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="col-md-12"  type="text" name="footer_page_2_title<?=$i?>" value="<?=$footer_page_2['title']?>"  >
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">انتخاب دسته محتوا <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir news_cat"  type="text" name="footer_page_2_content<?=$i?>" value="<?=$footer_page_2['text']?>"   rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">انتخاب دسته صفحه <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								 	<input class="select2-input select2-basir page_cat"  type="text" name="footer_page_2_page<?=$i?>" value="<?=$footer_page_2['link']?>" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
							</div>					
						</div>
					</div>
					<hr>
					<?}?>
				       </center>
				</div>				
				
				
<!---------------تبلیغ فوتر--------------->	
				<?$fotter_ads_pic= get_tem_result($site,$la,'fotter_ads_pic',$tem,$coms_conect);
		 
				 
				?>
				<div class="bhoechie-tab-content ">
                    <center>			
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$fotter_ads_pic['pic_adress']?>"  id="fotter_ads_pic" name="fotter_ads_pic">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=fotter_ads_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>  
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">لینک </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
								<input type="text" class="col-md-12"  value="<?=$fotter_ads_pic['link']?>" name="fotter_ads_pic_link"> 
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
								<input type="text" class="col-md-12"  value="<?=$fotter_ads_pic['title']?>" name="fotter_ads_pic_title"> 
							</div>
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">تبلیغ کلیکی </label>   
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="checkbox"    value='1' name="fotter_ads_pic_click"  <?if($fotter_ads_pic['pic']==1)echo 'checked';?>   style="direction: rtl;">
							</div>					
						</div>
					</div>
                    </center>
                </div>				
<!--------------------------------شبکه های اجتماعی فوتر------------>
				<div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=6;$i++){
						$footer_social_network= get_tem_result($site,$la,"footer_social_network$i",$tem,$coms_conect);
						?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="footer_social_network_title<?=$i?>" value="<?=$footer_social_network['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
 
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">لینک و ایکون</label>
						<div class="form-group col-md-9">
							 <div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="footer_social_network_link<?=$i?>" value="<?=$footer_social_network['link']?>"  style="direction: rtl;">
								<span class="input-group-btn">
									<button class="btn btn-default form-control" name="footer_social_network_pic<?=$i?>" data-iconset="fontawesome" data-icon="<?=$footer_social_network['pic_adress']?>" role="iconpicker" ></button>
								</span>
							 </div>	
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>	
		


            </div>
        </div>
  </div>
 </br>     
	<div class="panel-footer">
		<button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary">ذخيره</button>
	</div>
	</form>
</div> 
  
  
</div>
 

<script>
$(document).ready(function() {

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=1&value="+$("#cat_val01").val()+"&secend_value="+$("#menu_bar_title01").val(),
		success: function(result){
			$("#module_cat01").html(result);	
		}
	});

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=2&value="+$("#cat_val2").val()+"&secend_value="+$("#menu_bar_title2").val(),
		success: function(result){
		 	$("#module_cat2").html(result);	
		}
	});	

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=3&value="+$("#cat_val3").val()+"&secend_value="+$("#menu_bar_title3").val(),
		success: function(result){
			$("#module_cat3").html(result);	
		}
	});	

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=4&value="+$("#cat_val4").val()+"&secend_value="+$("#menu_bar_title4").val(),
		success: function(result){
			$("#module_cat4").html(result);	
		}
	});	

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=5&value="+$("#cat_val5").val()+"&secend_value="+$("#menu_bar_title5").val(),
		success: function(result){
			$("#module_cat5").html(result);	
		}
	});		
	
	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=6&value="+$("#cat_val6").val()+"&secend_value="+$("#menu_bar_title6").val(),
		success: function(result){
			$("#module_cat6").html(result);	
		}
	});	

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=7&value="+$("#cat_val7").val()+"&secend_value="+$("#menu_bar_title7").val(),
		success: function(result){
			$("#module_cat7").html(result);	
		}
	});	

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=8&value="+$("#cat_val8").val()+"&secend_value="+$("#menu_bar_title8").val(),
		success: function(result){
			$("#module_cat8").html(result);	
		}
	});	

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=9&value="+$("#cat_val9").val()+"&secend_value="+$("#menu_bar_title9").val(),
		success: function(result){
			$("#module_cat9").html(result);	
		}
	});	

	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=10&value="+$("#cat_val10").val()+"&secend_value="+$("#menu_bar_title10").val(),
		success: function(result){
			$("#module_cat10").html(result);	
		}
	});
	
	
 
	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=11&value="+$("#cat_val11").val()+"&secend_value="+$("#menu_bar_title11").val(),
		success: function(result){
			$("#module_cat11").html(result);	
		}
	});	
	$.ajax({
		type:'POST',
		url:'New_ajax.php',
		data:"action=change_module_abadis&id=12&value="+$("#cat_val12").val()+"&secend_value="+$("#menu_bar_title12").val(),
		success: function(result){
			$("#module_cat12").html(result);	
		}
	});		
 
});

 	$(".select_module").change(function (){
		var i="#module_cat"+$(this).data('selectid');
		$.ajax({
			type:'POST',
			url:'New_ajax.php',
			data:"action=change_module_abadis&id="+$(this).val()+"&value="+$(this).attr('id'),
			success: function(result){
				 $(i).html(result);	
			}
		});	
	});	

$(document).ready(function() {
		$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});


    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
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
	
});
</script>
 
	<script type="text/javascript" src="/new_template/default/<?=$dir?>/scripts/helper/iconset-fontawesome-4.1.0.min.js"></script>
	<!-- Bootstrap-Iconpicker -->
	<script type="text/javascript" src="/new_template/default/<?=$dir?>/scripts/helper/bootstrap-iconpicker.js"></script>
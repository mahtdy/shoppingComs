<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/default/<?=$dir?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
 		
#########
 
	$header_pic=injection_replace($_POST["header_pic"]);
	$header_link=injection_replace($_POST["header_link"]);
	insert_templdate($site,$header_pic,$la,'','',$header_link,'',"header_title",'default',$coms_conect);			

################################ایکون های هدر#################################
		for($i=1;$i<=6;$i++){	
			$header_icon=injection_replace($_POST["header_icon{$i}"]);
			$header_icon_link=injection_replace($_POST["header_icon_link{$i}"]);
			$header_icon_title=injection_replace($_POST["header_icon_title{$i}"]);
			insert_templdate($site,'',$la,'',$header_icon_title,$header_icon_link,$header_icon,"header_icon$i",'default',$coms_conect);			
		}
################################دکمه های هدر#################################
		for($i=1;$i<=2;$i++){	
			$header_button=injection_replace($_POST["header_button{$i}"]);
			$header_button_link=injection_replace($_POST["header_button_link{$i}"]);
			$header_button_title=injection_replace($_POST["header_button_title{$i}"]);
			insert_templdate($site,'',$la,'',$header_button_title,$header_button_link,$header_button,"header_button$i",'default',$coms_conect);			
		}
 
################################لینک های بالای صفحهس#################################
	for($i=1;$i<=6;$i++){	
		$up_link_title=injection_replace_pic($_POST["up_link_title{$i}"]);
		$up_link_link=injection_replace($_POST["up_link_link{$i}"]);
		insert_templdate($site,'',$la,'',$up_link_title,$up_link_link,'',"up_link_link$i",'default',$coms_conect);
	}	

#########################تبلیغات#######################
	$advertise_text=injection_replace($_POST["advertise_text"]);
	$advertise_title=injection_replace($_POST["advertise_title"]);
	$advertise_link=injection_replace($_POST["advertise_link"]);
	$advertise_pic=injection_replace($_POST["advertise_pic"]);
	insert_templdate($site,$advertise_pic,$la,$advertise_text,$advertise_title,$advertise_link,'',"advertise",'default',$coms_conect);
################################تنظيمات اخبار#################################
	for($i=1;$i<=3;$i++){	
			$news_setting=injection_replace($_POST["news_setting{$i}"]);
			insert_templdate($site,'',$la,$news_setting,'','','',"news_setting$i",'default',$coms_conect);
	}
################################تندیس ها#################################
	for($i=1;$i<=20;$i++){	
			$tandis_title=injection_replace($_POST["tandis_title{$i}"]);
			$tandis_pic=injection_replace($_POST["tandis_pic{$i}"]);
			$tandis_link=injection_replace($_POST["tandis_link{$i}"]);
			$tempalate_feachers_title=injection_replace($_POST["tempalate_feachers_title{$i}"]);
			insert_templdate($site,$tandis_pic,$la,'',$tandis_title,$tandis_link,'',"tandis$i",'default',$coms_conect);
	}
################################لینک های فوتر################################
	for($i=1;$i<=12;$i++){	
			$fotter_link=injection_replace($_POST["fotter_link{$i}"]);
			$fotter_link_title=injection_replace($_POST["fotter_link_title{$i}"]);
			$tempalate_feachers_title=injection_replace($_POST["tempalate_feachers_title{$i}"]);
			insert_templdate($site,'',$la,'',$fotter_link_title,$fotter_link,'',"fotter_link$i",'default',$coms_conect);
	}	
################################شبکه های اجتماعی فوتر################################
	for($i=1;$i<=5;$i++){	
			$sosial_link=injection_replace($_POST["sosial_link{$i}"]);
			$sosial_link_title=injection_replace($_POST["sosial_link_title{$i}"]);
			$sosial_link_pic=injection_replace($_POST["sosial_link_pic{$i}"]);
			$tempalate_feachers_title=injection_replace($_POST["tempalate_feachers_title{$i}"]);
			insert_templdate($site,$sosial_link_pic,$la,'',$sosial_link_title,$sosial_link,'',"sosial_link$i",'default',$coms_conect);
	}	
######################تصویر فوتر#####################



	
#########################ارتباط با ما#######################

	$call_us_google=injection_replace($_POST["call_us_google"]);
	insert_templdate($site,'',$la,$call_us_google,'','','',"call_us_google",'default',$coms_conect); 
	
	

########################قیمت#######################
	$price= ($_POST["price"]);
	$tax=injection_replace($_POST["tax"]);
	insert_templdate($site,'',$la,$price,'',$tax,'',"price",'default',$coms_conect);
	
###################ورورد به سایت#####################
	$login_first_text=($_POST["login_first_text"]);
	$login_first_title=injection_replace($_POST["login_first_title"]);
	insert_templdate($site,'',$la,$login_first_text,$login_first_title,'','',"login_first_text",'default',$coms_conect);
 
###################ثبت نام#####################

	
###################فعال کردن کاربران sms#####################
	$active_user_sms=($_POST["active_user_sms"]);
	$active_user_sms_title=injection_replace($_POST["active_user_sms_title"]);
	insert_templdate($site,'',$la,$active_user_sms,$active_user_sms_title,'','',"active_user_sms",'default',$coms_conect);		
/* 
#######################درباره ما##########################	
	$about_us=injection_replace($_POST["about_us"]);
	$about_us_title=injection_replace($_POST["about_us_title"]);
	insert_templdate($site,'',$la,$about_us,$about_us_title,'','',"about_us",'default',$coms_conect);
	
#####ثبت نام	
	$reg_first_text=($_POST["reg_first_text"]);
	$reg_first_pic=injection_replace($_POST["reg_first_pic"]);
	insert_templdate($site,$reg_first_pic,$la,$reg_first_text,'','','',"reg_first_text",'default',$coms_conect);
	$reg_secend_text=($_POST["reg_secend_text"]);
	insert_templdate($site,'',$la,$reg_secend_text,'','','',"reg_secend_text",'default',$coms_conect);	

#####ورود به سایت	

	$login_secend_text=($_POST["login_secend_text"]);
	insert_templdate($site,'',$la,$login_secend_text,'','','',"login_secend_text",'default',$coms_conect);	
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
    $('#page_catogory').select2({
        data: [
				<?
				$query="select id,name from new_modules_cat where type=1 and status=1 and la='$la'";
				 
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
				<?create_lang_filter_none($la,$coms_conect,$_SESSION["manager_title_lang"])?>
			</div>
		</div>
		<div class="container">	
			<label class="col-md-1 form-group">سایت</label>	
			<div class="col-md-2 form-group">
				<?create_sub_site_filter_none($site,$coms_conect,$_SESSION['manager_title_site'])?>
			</div>
		</div>	
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  هدر
                </a>
 
                <a href="#" class="list-group-item  text-center">
                  ایکون های هدر
                </a> 				
                <a href="#" class="list-group-item  text-center">
                  دکمه های هدر
                </a> 
 
                <a href="#" class="list-group-item  text-center">
                 لینک های بالای صفحه
                </a> 
                <a href="#" class="list-group-item  text-center">
                  تبلیغات
                </a> 
            <a href="#" class="list-group-item  text-center">
                  تنظيمات اخبار
                </a> 				
                <a href="#" class="list-group-item  text-center">
                  تندیس ها
                </a> 
				 <a href="#" class="list-group-item  text-center">
                  لینک های فوتر
                </a>
               <a href="#" class="list-group-item  text-center">
                  شبکه های اجتماعی فوتر
                </a> 
                <a href="#" class="list-group-item  text-center">
                  تصویر و کپی رایت
                </a> 
                <a href="#" class="list-group-item  text-center">
                 ارتباط با ما
                </a> 
        
		 
				<a href="#" class="list-group-item  text-center">
               فعال کردن کاربران SMS
                </a> 
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
<!----------------------------------تماس با ما هدر------------>
			   <div class="bhoechie-tab-content active">
                    <center>
						<?$header_title= get_tem_result($site,$la,"header_title",'default',$coms_conect);?>
 
					
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
 

					<hr>	

                    </center>
                </div>
 
<!----------------------------------آیکون های هدر----------->
			
			   <div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=6;$i++){?>
					<?$header_icon= get_tem_result($site,$la,"header_icon$i",'default',$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">عنوان <?=$i?> </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input  type="text" class="form-control" name="header_icon_title<?=$i?>" value="<?=$header_icon['title']?>"  >
								
								</div>					
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک و آیکون <?=$i?></label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="header_icon_link<?=$i?>" value="<?=$header_icon['link']?>"  style="direction: rtl;">
									<span class="input-group-btn">
										<button class="btn btn-default form-control" name="header_icon<?=$i?>" data-iconset="fontawesome" data-icon="<?=$header_icon['pic']?>" role="iconpicker" ></button>
									</span>
								</div>					
							</div>
						</div>
					<?}?>
                    </center>
                </div>
<!----------------------------------دکمه های هدر----------->
			
			   <div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=2;$i++){?>
					<?$header_button= get_tem_result($site,$la,"header_button$i",'default',$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">عنوان <?=$i?> </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input  type="text" class="form-control" name="header_button_title<?=$i?>" value="<?=$header_button['title']?>"  >
								
								</div>					
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک و آیکون <?=$i?></label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="header_button_link<?=$i?>" value="<?=$header_button['link']?>"  style="direction: rtl;">
									<span class="input-group-btn">
										<button class="btn btn-default form-control" name="header_button<?=$i?>" data-iconset="pgicon" data-icon="<?=$header_button['pic']?>" role="iconpicker" ></button>
									</span>
								</div>					
							</div>
						</div>
					<?}?>
                    </center>
                </div>		
<!----------------------------------لینکهای بالای صفحه------------>

			   <div class="bhoechie-tab-content ">
                    <center>
			<?for($i=1;$i<=6;$i++){
			$up_link_link= get_tem_result($site,$la,"up_link_link$i",'default',$coms_conect);?>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="up_link_title<?=$i?>" value="<?=$up_link_link['title']?>"  style="direction: rtl;">
								</div>					
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="up_link_link<?=$i?>" value="<?=$up_link_link['link']?>"  style="direction: rtl;">
								</div>					
							</div>
						</div>
 
					<hr>	
					<?}?>	
                    </center>
                </div>	
<!----------------------------------تبلیغات------------>
			<?$advertise= get_tem_result($site,$la,"advertise",'default',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">متن یک </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="advertise_text" value="<?=$advertise['text']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">متن 2</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" value='<?=$advertise['title']?>' name="advertise_title" style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" value="<?=$advertise['link']?>" name="advertise_link" style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر  </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$advertise['pic_adress']?>"  id="advertise_pic" name="advertise_pic">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=advertise_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
                    </center>
                </div>
<!----------------------------------تنظیمات اخبار------------>
   <div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=3;$i++){
						$news_setting= get_tem_result($site,$la,"news_setting$i",'default',$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="news_setting<?=$i?>" value="<?=$news_setting['text']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>
<!----------------------------------تندیس------------>
   <div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=20;$i++){
						$tandis= get_tem_result($site,$la,"tandis$i",'default',$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="tandis_title<?=$i?>" value="<?=$tandis['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="tandis_link<?=$i?>" value="<?=$tandis['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر <?=$i?></label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$tandis['pic_adress']?>"  id="tandis_pic<?=$i?>" name="tandis_pic<?=$i?>">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=tandis_pic<?=$i?>" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
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
						$fotter_link= get_tem_result($site,$la,"fotter_link$i",'default',$coms_conect);?>
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
<!---------------------------------شبکه های اجتماعی فوتر------------>
   <div class="bhoechie-tab-content ">
                    <center>
					<?for($i=1;$i<=5;$i++){
						$sosial_link= get_tem_result($site,$la,"sosial_link$i",'default',$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="sosial_link_title<?=$i?>" value="<?=$sosial_link['title']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">لینک <?=$i?></label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text"  class="form-control" name="sosial_link<?=$i?>" value="<?=$sosial_link['link']?>"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$sosial_link['pic_adress']?>"  id="sosial_link_pic<?=$i?>" name="sosial_link_pic<?=$i?>">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=sosial_link_pic<?=$i?>" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
					<hr>
					<?}?>	
                    </center>
                </div>
			
<!---------------عکس فوتر--------------->	
			<?$fotter_pic= get_tem_result($site,$la,'fotter_pic','default',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>			
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$fotter_pic['pic_adress']?>"  id="fotter_pic" name="fotter_pic">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=fotter_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
 
                    </center>
                </div>
				
<!---------------------------------ارتباط با ما------------>
			<?$call_us_text= get_tem_result($site,$la,'call_us_text','default',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">متن </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<textarea type="text"  class="form-control" id="call_us_text" name="call_us_text"    style="direction: rtl;"><?=$call_us_text['text']?></textarea>
													<script>
														 tinymce.init({
															 selector: "#call_us_text",
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
			<?$call_us_google= get_tem_result($site,$la,'call_us_google','default',$coms_conect);?>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">آدرس گوگل </label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
								<input type="text" class="col-md-12"  value="<?=$call_us_google['text']?>"   name="call_us_google">
							</div>
						</div>
					</div>

                    </center>
                </div>

<!---------------------------------ارتباط با ما------------>
			<?$price= get_tem_result($site,$la,'price','default',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">درصد مالیات</label> 
						<div class="form-group col-md-9">
							<div class="col-md-6 input-group">	
								<input type="text" class="form-control" value='<?=$price['link']?>' name="tax"  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">متن پایین صفحه</label> 
						<div class="form-group col-md-9">
							<div class="col-md-6 input-group">	
								<textarea type="text" class="form-control" name="price"  style="direction: rtl;"><?=$price['text']?></textarea>
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">سرعت اینترنت</label> 
						<div class="form-group col-md-9">
							<div class="col-md-6 input-group">	
								<select class="form-control col-md-6" name='internet_speed' id='internet_speed'>
									<?$query1="select * from new_internet_price  where status=1";
									$result1 = $coms_conect->query($query1);
									while($RS11 = $result1->fetch_assoc()){
									echo "<option value='{$RS11['value']}'>{$RS11['value']}</option>";
									}?>
								</select>
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">مقدار ماه</label> 
						<div class="form-group col-md-9">
							<div class="col-md-6 input-group">	
								<select class="form-control col-md-6" name='internet_mounth' id='internet_mounth'>
									<?$query1="select * from new_internet_month  where status=1";
									$result1 = $coms_conect->query($query1);
									while($RS11 = $result1->fetch_assoc()){
									echo "<option value='{$RS11['value']}'>{$RS11['value']}</option>";
									
									}?>
								</select>
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">ترافیک</label> 
						<div class="form-group col-md-9">
							<div class="col-md-6 input-group">	
								<input type="text" class="form-control" name="internet_trafic" id='internet_trafic'  style="direction: rtl;">
							</div>					
						</div>
					</div>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">قیمت</label> 
						<div class="form-group col-md-9">
							<div class="col-md-6 input-group">	
								<input type="text" class="form-control" name="internet_price"  id="internet_price" style="direction: rtl;">
							</div>					
						</div>
					</div>
			<input type='hidden' value="0" id='edit_mode'>		
			<input type='button' id="add_price" value='ثبت' class='btn btn-primary col-md-4'>
			<img id="show_waiting_search" src="waiting.gif" dir="center" style="display:none">
			<br>
			<br>
			<div id='show_price'>
			<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
				<thead>
				<tr>
					<th>ترافیک</th>
					<th>مقدار ماه</th>
					<th>سرعت</th>
					<th>قیمت</th>
					<th>امکانات</th>
				</tr>
				</thead>
				<tbody>
				<?$query="SELECT * FROM new_tem_setting   where name='internet_price' ";
				$result = $coms_conect->query($query);
					while($RS1 = $result->fetch_assoc()){?>
				<tr>
					<td><?=$RS1["link"]?></td>
					<td><?=$RS1["pic"]?></td>
					<td><?=$RS1["title"]?></td>
					<td><?=$RS1["text"]?></td>
					<td>
					<?if($_SESSION["can_edit"]==1){?>
					<a id="<?=$RS1["id"]?>" class="edit_menu blue icon"  href="#">
					<i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
					</a>
					<?}if($_SESSION["can_delete"]==1){?>	
					<a href="#" id="<?=$RS1["id"]?>" class="red del_menu icon" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
					<i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
					</a>
					<?}?>
					</td>
				</tr>
				<?}?>
				</tbody>
			</table>
			</div>
<script>
 	$("#add_price").click(function () {
		$("#show_waiting_search").show();
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_internt_price&id="+$("#internet_price").val()+"&value="+$("#internet_trafic").val()+"&secend_value="+$("#internet_mounth").val()+"&db_pass="+$("#internet_speed").val()+"&pro_read="+$("#edit_mode").val(),
				success: function(result){ 
					$("#show_waiting_search").hide();
					$("#internet_price").val('');
					$("#internet_trafic").val('');
					$("#show_price").html(result);
					
				}
			});	
		});
 	$("#internet_mounth").change(function () {
		$("#show_waiting_search").show();	
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_internt_price&secend_value="+$("#internet_mounth").val()+"&db_pass="+$("#internet_speed").val()+"&pro_read="+$("#edit_mode").val(),
				success: function(result){ 
					$("#show_waiting_search").hide();
					$("#internet_price").val('');
					$("#internet_trafic").val('');
					$("#show_price").html(result);
					
				}
			});
	});	
 	$("#internet_speed").change(function () {
		$("#show_waiting_search").show();	
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_internt_price&secend_value="+$("#internet_mounth").val()+"&db_pass="+$("#internet_speed").val()+"&pro_read="+$("#edit_mode").val(),
				success: function(result){ 
					$("#show_waiting_search").hide();
					$("#internet_price").val('');
					$("#internet_trafic").val('');
					$("#show_price").html(result);
					
				}
			});
	});		
	$(function () {	
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_internt_price&secend_value="+$("#internet_mounth").val()+"&db_pass="+$("#internet_speed").val()+"&pro_read="+$("#edit_mode").val(),
				success: function(result){ 
					$("#show_waiting_search").hide();
					$("#internet_price").val('');
					$("#internet_trafic").val('');
					$("#show_price").html(result);
					
				}
			});	
	});	
		
		
	$(document).on("click", ".edit_menu", function(e) {		
		$("#edit_mode").val($(this).attr('id'));
		e.preventDefault();
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_internt_price&id="+$(this).attr('id')+"&pro_read="+$("#edit_mode").val(),
				success: function(result){ 
				var a=result.split('^')
					$("#internet_price").val(a[0]);
					$("#internet_trafic").val(a[3]);
					$("#internet_mounth").val(a[2]);
					$("#internet_speed").val(a[1]);
				}
			});	
		});
	$(document).on("click", "#btn_ok", function(e) {	
		$("#show_waiting_search").show();	
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_internt_price&pro_read="+$(this).val()+"&secend_value="+$("#internet_mounth").val()+"&db_pass="+$("#internet_speed").val(),
				success: function(result){
					$("#show_waiting_search").hide();
					$("#internet_price").val('');
					$("#internet_trafic").val('');
					$("#show_price").html(result);
				}
			});		
		});		
</script>
</center>
</div>
 
								
 <!---------------------------------ورورد------------>
			<?$login_first_text= get_tem_result($site,$la,'login_first_text','default',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان</label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$login_first_text['title']?>"  id="login_first_title" name="login_first_title">
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="family">متن اول </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<textarea type="text"  class="form-control" name="login_first_text"    style="direction: rtl;"><?=$login_first_text['text'];?></textarea>
							</div>					
						</div>
					</div>
				</center>					
			</div>
 			
 
<!---------------------------------صفحه ثبت نام------------>
			   <div class="bhoechie-tab-content ">
                    <center>
					<?$active_user_sms= get_tem_result($site,$la,"active_user_sms",'default',$coms_conect);?>
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">عنوان </label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<input type="text" value="<?=$active_user_sms['title']?>" class="form-control" name="active_user_sms_title"  style="direction: rtl;">
							</div>					
						</div>
					</div>	
					<div class="form-group">
							<label class="col-md-3 control-label" for="family">متن</label> 
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">	
								<textarea type="text"  class="form-control" name="active_user_sms"  style="direction: rtl;"><?=$active_user_sms['text']?></textarea>
							</div>					
						</div>
					</div>	
                    </center>
                </div>					
<?/*?>				

<!---------------------------------ارتباط با ما ------------>
			<?$about_us= get_tem_result($site,$la,'about_us','default',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">عنوان </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="about_us_title" value="<?=$about_us['title'];?>"  style="direction: rtl;">
								</div>					
							</div>
						</div>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">متن</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="about_us" style="direction: rtl;"><?=$about_us['text'];?></textarea>
								</div>					
							</div>
						</div>
						<hr>
						</center>
                </div>
 <!---------------------------------ثبت نام------------>
			<?$reg_first_text= get_tem_result($site,$la,'reg_first_text','default',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">متن اول </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="reg_first_text"    style="direction: rtl;"><?=$reg_first_text['text'];?></textarea>
								</div>					
							</div>
						</div>
				<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر</label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$reg_first_text['pic_adress']?>"  id="reg_first_pic" name="reg_first_pic">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=reg_first_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
			<?$reg_secend_text= get_tem_result($site,$la,'reg_secend_text','default',$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">زیر متن اول</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="reg_secend_text" style="direction: rtl;"><?=$reg_secend_text['text'];?></textarea>
								</div>					
							</div>
						</div>
			<?$reg_low= get_tem_result($site,$la,'reg_low','default',$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">قوانین سایت</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="reg_low" style="direction: rtl;"><?=$reg_low['text'];?></textarea>
								</div>					
							</div>
						</div>
						<hr>
						</center>
                </div>				
 

 <!---------------------------------ورورد------------>
			<?$login_first_text= get_tem_result($site,$la,'login_first_text','default',$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">متن اول </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="login_first_text"    style="direction: rtl;"><?=$login_first_text['text'];?></textarea>
								</div>					
							</div>
						</div>
				<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان</label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$login_first_text['pic_adress']?>"  id="login_first_pic" name="login_first_pic">
							</div>
						</div>
					</div>
			<?$login_secend_text= get_tem_result($site,$la,'login_secend_text','default',$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">زیر متن اول</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="login_secend_text" style="direction: rtl;"><?=$login_secend_text['text'];?></textarea>
								</div>					
							</div>
						</div>
						<hr>
						</center>
                </div>	
	<?*/?> 
<!----------------------->	
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
  
</div>
 
	<!-- Bootstrap-Iconpicker -->
	
	<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"></script>
	<!-- Bootstrap-Iconpicker -->
	<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
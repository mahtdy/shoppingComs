



<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link href="/yep_theme/default/rtl/css/M_style.css" rel="stylesheet">

<!--<script type="text/javascript" src="/filemanager/plugin.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>

<script src="/yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>


<?if($_GET['lang_filter']>"")
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
$ads_count=injection_replace($_POST["ads_count"]);
$ads_show_count=injection_replace($_POST["ads_show_count"]);
$ads_search_count=injection_replace($_POST["ads_search_count"]);
$ads_cat_count=injection_replace($_POST["ads_cat_count"]);
if($_POST['send_flag']==1){
     check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );

		#####اندازه تصاویر
//	$contant_pic_size=injection_replace_pic($_POST["contant_pic_size"]);
//	$query_contant_setting="SELECT id from new_default_navbar where name='contant_pic_size' and la='fa' and site='main'";
//	//echo $query_contant_setting.'<br>';
//	$result_contant_setting = $coms_conect->query($query_contant_setting);
//	$row_contant_setting = mysqli_num_rows($result_contant_setting);
//	if ($row_contant_setting> 0) {
//	   $query="update new_default_navbar set address='$contant_pic_size' where name='contant_pic_size'  and la='fa'  and site='main'";
//	   $coms_conect->query($query);
//	}else{
//     	$query="insert into new_default_navbar(site,address,la,name)values('main','$contant_pic_size','fa','contant_pic_size')";
//     	$coms_conect->query($query);
//	}



//	 #####پیش فرض ناوبری
//	$contant_nav_picture=injection_replace_pic($_POST["contant_nav_picture"]);
//	$query_contant_setting="SELECT id from new_default_navbar where name='contant_nav_picture' and la='$la' and site='$site'";
//	//echo $query_contant_setting.'<br>';
//	$result_contant_setting = $coms_conect->query($query_contant_setting);
//	$row_contant_setting = mysqli_num_rows($result_contant_setting);
//	if ($row_contant_setting> 0) {
//	   $query="update new_default_navbar set address='$contant_nav_picture' where name='contant_nav_picture'  and la='$la'  and site='$site'";
//	   $coms_conect->query($query);
//	}else{
//     	$query="insert into new_default_navbar(site,address,la,name)values('$site','$contant_nav_picture','$la','contant_nav_picture')";
//     	$coms_conect->query($query);
//	}
####صفحه اصلي
//	$contant_have_ads=injection_replace_pic($_POST["contant_have_ads"]);
//	if($contant_have_ads!=1) $contant_have_ads=0;
//	insert_ads_templdate($site,$la,$contant_have_ads,'contant_have_ads',$coms_conect);
// 	$query1="delete from new_tem_setting where name='contant_have_ads' and la='$la'";
//	$coms_conect->query($query1);
//	for($i=1;$i<=$ads_count;$i++){
// 		$title_ads=injection_replace_pic($_POST["title_ads{$i}"]);
//		$header_link=injection_replace_pic($_POST["header_link{$i}"]);
//		$header_pic=injection_replace_pic($_POST["header_pic{$i}"]);
//		if($header_pic>""&&$header_link>"")
//		insert_news_templdate($site,$header_pic,$la,'',$title_ads,$header_link,'',"contant_have_ads",'',$coms_conect);
//	}
####فایل نمایش
//	$contant_show_have_ads=injection_replace_pic($_POST["contant_show_have_ads"]);
//	if($contant_show_have_ads!=1) $contant_show_have_ads=0;
//	insert_ads_templdate($site,$la,$contant_show_have_ads,'contant_show_have_ads',$coms_conect);
// 	$query1="delete from new_tem_setting where name='contant_show_have_ads' and la='$la'";
//	$coms_conect->query($query1);
//	for($i=1;$i<=$ads_show_count;$i++){
// 		$title_show_ads=injection_replace_pic($_POST["title_show_ads{$i}"]);
//		$header_show_link=injection_replace_pic($_POST["header_show_link{$i}"]);
//		$header_show_pic=injection_replace_pic($_POST["header_show_pic{$i}"]);
//		if($header_show_pic>""&&$header_show_link>"")
//		insert_news_templdate($site,$header_show_pic,$la,'',$title_show_ads,$header_show_link,'',"contant_show_have_ads",'',$coms_conect);
//	}
#######دسته بندي
//	$contant_cat_have_ads=injection_replace_pic($_POST["contant_cat_have_ads"]);
//	if($contant_cat_have_ads!=1) $contant_cat_have_ads=0;
//	insert_ads_templdate($site,$la,$contant_cat_have_ads,'contant_cat_have_ads',$coms_conect);
//	$query1="delete from new_tem_setting where name='contant_cat_have_ads'  and la='$la'";
//	$coms_conect->query($query1);
//	for($i=1;$i<=$ads_cat_count;$i++){
//		$title_cat_ads=injection_replace_pic($_POST["title_cat_ads{$i}"]);
//		$link_cat_ads=injection_replace_pic($_POST["link_cat_ads{$i}"]);
//		$image_cat_ads=injection_replace_pic($_POST["image_cat_ads{$i}"]);
//		if($image_cat_ads>""&&$link_cat_ads>"")
//		insert_news_templdate($site,$image_cat_ads,$la,'',$title_cat_ads,$link_cat_ads,'',"contant_cat_have_ads",'',$coms_conect);
//	}

######جستجو	
//	$contant_sesrch_have_ads=injection_replace_pic($_POST["contant_sesrch_have_ads"]);
//	if($contant_sesrch_have_ads!=1) $contant_sesrch_have_ads=0;
//	insert_ads_templdate($site,$la,$contant_sesrch_have_ads,'contant_sesrch_have_ads',$coms_conect);
//	$query1="delete from new_tem_setting where name='contant_sesrch_have_ads'  and la='$la'";
//	$coms_conect->query($query1);
//	for($i=1;$i<=$ads_search_count;$i++){
//		$title_search_ads=injection_replace_pic($_POST["title_search_ads{$i}"]);
//		$link_search_ads=injection_replace_pic($_POST["link_search_ads{$i}"]);
//		$image_search_ads=injection_replace_pic($_POST["image_search_ads{$i}"]);
//		if($image_search_ads>""&&$link_search_ads>"")
//		insert_news_templdate($site,$image_search_ads,$la,'',$title_search_ads,$link_search_ads,'',"contant_sesrch_have_ads",'',$coms_conect);
//	}
}
 create_session_token();
?>




<div class="tabbable">
	<ul class="nav nav-tabs" style="margin-top:2px;border-bottom: 0;  display: none;">
		<li class="active"><a href="#tab2" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
		تنظيمات قالب </a></li>
	</ul>
	<div class="msheet tab-contant">
	<div class="secfhead">
<!-- #section:news/news_setting.head -->
<div class="sectitle">
<div class="icon"><span class="flaticon-file23" style=""></span></div>
<div class="title"><p class="titr">تنظيمات شرکت ها</p><p class="lead">توضيحات اين بخش</p></div>
</div>
<!-- /section:news/news_setting.head -->

<div class="toolmenu">
<ul>
<li class="helpicon">
<a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما">
<span class="flaticon-help31"></span>
</a>
</li>

</ul>
</div>

</div>
		<div class="tab active" id="tab2">
		<div class="page-body">
			<form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form" enctype="multipart/form-data">
				<input type="hidden" name="send_flag" value="1">
				<input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
  <!-- vertical tab bootsnipp -->
    <div class="">


		<div class="container">
			<div class="col-md-3 form-group   ">
			<label>سايت</label>
				<?create_sub_site_filter_none($site,$coms_conect,$_SESSION['manager_title_site'])?>
			</div>
			<div  class="col-md-1  form-group"></div>
			<div class="col-md-3  form-group">
				<label>   انتخاب زبان     </label>
				<?create_lang_filter_none($la,$coms_conect,$_SESSION["manager_title_lang"])?>
			</div>
		</div>
		<hr>

		 <div class="col-md-12 bhoechie-tab-container"><br>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                  <a href="#" id="caption1" class="list-group-item active  text-center">
                      متن متا لیست شرکتها
                  </a>
                  <a href="#" id="caption2" class="list-group-item  text-center">
                  متن متا صفحات برچسب
                </a>
                <a href="#" id="caption3" class="list-group-item  text-center">
                  متن متا صفحات دسته بندی
                </a>
                <a href="#" id="caption4" class="list-group-item  text-center">
                    متن متا صفحات جستجو
                </a>

                  <a href="#" id="caption5" class="list-group-item  text-center">
                    متن متا صفحات برند
                </a>
<!--                <a href="#" class="list-group-item  text-center">-->
<!--                   تنظيمات   شرکت   صفحه دسته جستجو-->
<!--                </a>-->
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
<!---------------------new_modual_tem_setting-------------تماس با ما هدر------------>
			   <div id="div-caption1" class="bhoechie-tab-contant active ">
			   <!-- #section:contant/contant_setting.list -->
                    <center>
					<div class="form-group">
<!--							<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه اصلی</label>-->

						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">

								<?$contant_have_ads=get_modual_setting_result($site,$la,'contant_have_ads',$coms_conect);?>
<!--								<input type="checkbox" value="1" --><?//if($contant_have_ads==1) echo 'checked';?><!--   class="form-control"  name="contant_have_ads" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">-->
                                <label class="col-md-6 control-label" for="family">متن متا لیست شرکتها</label>
                                <textarea id="meta_seo" name="meta_seo" class="form-control col-md-6 magin-r" rows="3" title="" data-original-title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"></textarea>
                            </div>
						</div>
					</div>

                    </center>
					<!-- /section:contant/contant_setting.list -->
                </div>
                <div id="div-caption2" class="bhoechie-tab-contant ">
			   <!-- #section:contant/contant_setting.list -->
                    <center>
					<div class="form-group">
<!--							<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه اصلی</label>-->

						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">

								<?$contant_have_ads=get_modual_setting_result($site,$la,'contant_have_ads',$coms_conect);?>
<!--								<input type="checkbox" value="1" --><?//if($contant_have_ads==1) echo 'checked';?><!--   class="form-control"  name="contant_have_ads" style="direction: ltr;float: right;width: 16px;margin-top: 0px;">-->
                                <label class="col-md-6 control-label" for="family">متن متا صفحات برچسب</label>
                                <textarea id="meta_seo" name="meta_seo" class="form-control col-md-6 magin-r" rows="3" title="" data-original-title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"></textarea>
                            </div>
						</div>
					</div>

                    </center>
					<!-- /section:contant/contant_setting.list -->
                </div>
<!---------------------فایل نمایش------------>
			   <div id="div-caption3" class="bhoechie-tab-contant">
				<!-- #section:contant/contant_setting.view -->
                    <center>
					<div class="form-group">
<!--							<label class="col-md-3 control-label" for="family"> در صفحه اصلی</label>-->
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
                                <label class="col-md-6 control-label" for="family">متن متا صفحات دسته بندی</label>
                                <textarea id="meta_seo" name="meta_seo" class="form-control col-md-6 magin-r" rows="3" title="" data-original-title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"></textarea>

                            </div>
						</div>
					</div>

                    </center>
					<!-- /section:contant/contant_setting.view -->
                </div>
<!----------------------------------صفحه دسته بندي------------------------>
			   <div id="div-caption4" class="bhoechie-tab-contant ">
			   <!-- #section:contant/contant_setting.cate -->
                    <center>
					<div class="form-group">
<!--							<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه دسته بندی</label>-->
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
                                <label class="col-md-6 control-label" for="family">متن متا صفحات جستجو</label>
                                <textarea id="meta_seo" name="meta_seo" class="form-control col-md-6 magin-r" rows="3" title="" data-original-title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"></textarea>

                            </div>
						</div>
					</div>

									</div>
                <div id="div-caption5" class="bhoechie-tab-contant ">
			   <!-- #section:contant/contant_setting.cate -->
                    <center>
					<div class="form-group">
<!--							<label class="col-md-3 control-label" for="family">نمايش تبليغات در صفحه دسته بندی</label>-->
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
                                <label class="col-md-6 control-label" for="family">متن متا صفحات برندها</label>
                                <textarea id="meta_seo" name="meta_seo" class="form-control col-md-6 magin-r" rows="3" title="" data-original-title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"></textarea>

                            </div>
						</div>
					</div>

									</div>
			</div>
         </div>
	</div>

					<!-- /section:contant/contant_setting.cate -->
  </div>

            </div>
        </div>
  </div>

 <?if($_SESSION['can_edit']==1){?>   
	<div class="panel-footer bttools">
	<button type="submit" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخيره</span></button>
		<!--button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary">ذخيره</button-->
	</div>
 <?}?>
</form>
<!--</div>-->
<!--</div></div>-->
<!---->
<!--</div>-->

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
        $("div.bhoechie-tab>div.bhoechie-tab-contant").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-contant").eq(index).addClass("active");
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

    $('#div-caption1').show();
    $('#div-caption2').hide();
    $('#div-caption3').hide();
    $('#div-caption4').hide();
    $('#div-caption5').hide();

    $('#caption1').click(function () {

    $('#div-caption1').show();
    $('#div-caption2').hide();
    $('#div-caption3').hide();
    $('#div-caption4').hide();
    $('#div-caption5').hide();
    });
    $('#caption2').click(function () {
        $('#div-caption1').hide();
        $('#div-caption2').show();
        $('#div-caption3').hide();
        $('#div-caption4').hide();
        $('#div-caption5').hide();
    });
    $('#caption3').click(function () {
        $('#div-caption3').show();
        $('#div-caption2').hide();
        $('#div-caption1').hide();
        $('#div-caption4').hide();
        $('#div-caption5').hide();
    });

$('#caption4').click(function () {
        $('#div-caption4').show();
        $('#div-caption2').hide();
        $('#div-caption1').hide();
        $('#div-caption3').hide();
        $('#div-caption5').hide();
    });

$('#caption5').click(function () {
        $('#div-caption5').show();
        $('#div-caption2').hide();
        $('#div-caption1').hide();
        $('#div-caption4').hide();
        $('#div-caption3').hide();
    });




});
$('.ads_new_name').click( function() {
$("#ads_name").val($(this).attr('id'));
});

/*
 * show popover image ajax
 */
var popOverSettings = {
    placement : 'top',
    html:true,
    selector: '[data-toggle="popover"]',
    title:'<i class="fa fa-image"></i>',
    trigger:'hover',
    content:function () {
    	if($(this).val()){
    		return '<img src='+$(this).val()+' width="200"/>';
    	}
    	return false;
    }
}
$('body').popover(popOverSettings);



</script>



</div>
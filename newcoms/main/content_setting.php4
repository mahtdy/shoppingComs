<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link rel="stylesheet" href="/new_template/default/<?=$dir?>/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/default/<?=$dir?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
 
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
	for($i=1;$i<=7;$i++){
		$content_tab_setting_title=injection_replace($_POST["content_tab_setting_title{$i}"]);
		$content_tab_setting_link=injection_replace($_POST["content_tab_setting_link{$i}"]);
		$content_tab_setting_pic=injection_replace($_POST["content_tab_setting_pic{$i}"]);
		$menubar_count=injection_replace($_POST["menubar_count{$i}"]);
	 
		if($content_tab_setting_title>"")
		insert_templdate($site,'',$la,'',$content_tab_setting_title,$content_tab_setting_link,$content_tab_setting_pic,"content_tab_setting$i",$tem,$coms_conect);	
 
	}
}	 
?>
<script type="text/javascript">
 $(document).ready(function() {
    $('.news_cat').select2({
        data: [
			<?$query="select id,name from new_modules_cat where type=11 and status=1 and la='$la'";
			 $result = $coms_conect->query($query);
			 $i=0;
				echo '{'.'id'.':0,' .'text'.':'."'انتخاب نمایید'"."}";
			while($RS1=$result->fetch_assoc()){
				$id=$RS1["id"];
				$name=$RS1["name"];
				if(in_array($id,$_SESSION['manager_page_cat'])){
					echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
				}
			
			}?>
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
					<?for($i=1;$i<=7;$i++){?>
					 <a href="#" class="list-group-item  text-center">
					 تب شماره <?=$i?>
					</a> 
					<?}?>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
					  <?for($i=1;$i<=7;$i++){
						$content_tab_setting= get_tem_result($site,$la,"content_tab_setting$i",$tem,$coms_conect);
					 
						?>  
					   <div class="bhoechie-tab-content <?if($i==1)echo 'active';?>">
							<center>
								<div class="form-group">
									<label class="col-md-3 control-label" for="family">عنوان تب</label>
									<div class="form-group col-md-9">
										 <div class="col-md-12 input-group">	
											<input type="text"  class="form-control" name="content_tab_setting_title<?=$i?>" value="<?=$content_tab_setting['title']?>"  style="direction: rtl;">
										 </div>	
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="family">دسته <?=$i?> </label> 
									<div class="form-group col-md-9">
										<div class="col-md-12 input-group">	
											<input class="select2-input select2-basir news_cat"  type="text" name="content_tab_setting_link<?=$i?>" value="<?=$content_tab_setting['link']?>"  rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
								
										</div>					
									</div>
								 </div>
								 <div class="form-group">
									<label class="col-md-3 control-label" for="family">دسته فرعی <?=$i?> </label> 
									<div class="form-group col-md-9">
										<div class="col-md-12 input-group">	
											<input class="select2-input select2-basir news_cat"  type="text" name="content_tab_setting_pic<?=$i?>" value="<?=$content_tab_setting['pic']?>"  rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
								
										</div>					
									</div>
								 </div>
							</center>
						</div>
					  <?}?>
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
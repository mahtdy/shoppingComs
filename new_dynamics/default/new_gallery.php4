<?view_module(9,$coms_conect);?>
            <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
				<img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/slider1.jpg" alt="<?=$nav_title?>">
            </section>
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="/"><span class="fa fa-home"></span></a></li>
                        <li class="active"><?=$view_gallery?></li>
                    </ol>
                </div>
            </section>
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">
                <span class="fa fa-camera"></span>
                <h1 class="title"><?=$view_gallery?></h1>
                <span class="pdesc">توضيح مختصر درباره اين صفحه در اينجا نمايش داده مي شود.</span>
            </div>
        </div>
        <!-- End Page Title -->
        <div class="container">
            <main>
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=1 and pages_id=9 and la='$defult_lang'  and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'gallery_have_ads',$coms_conect))
				 $center=$center-2;
			if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'r',$coms_conect);
					 echo '	</aside>
						</section>';
					}//exit;?>
			 
			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'c',$coms_conect);?>
				<?}?>
                <!-- Start Main -->
                <div  class="row gridgallery">
				
            <div class="col-xs-12 cat_select_search_show row rtl prl0">
					<form   method='post' id='faq_search'>
                        <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right cat_select pr0">
                            <h4><span class="fa fa-folder-open"></span><?=$view_select_subject?></h4>
                            <select name="modual_cat" id='modual_cat' class="cat-select" multiple="multiple" style="width: 100%;">
								<?$sql121="select id,name from new_modules_cat where type=9 and status=1 and la='$defult_lang'";	
								$result21 = $coms_conect->query($sql121);
								while($row11 = $result21->fetch_assoc()){
									echo "<option value='{$row11['id']}'>{$row11['name']}</option>";	
								}
								?> 
                           </select>
                        </div>

                        <div class="col-md-8 col-sm-6 col-xs-12 form-group pull-right cat_search row">
                            <h4><span class="fa fa-search"></span><?=$view_search?></h4>
                            <div class="col-xs-8 form-group pull-right">

                                <input id="faqq" class="form-control" type="text"/>
                            </div>
                            <div class="col-xs-1 form-group pull-right pr0">
                                <button type="button" id="faq_btn" class="form-control btn btn-success"><span class="fa fa-search"></span></button>
                            </div>
                        </div>
						</form>
                    </div>
				<script>	
					$("#faqq").keypress(function (e) {
						if(e.which==13){
						   $("#faq_search").attr("action", "/gallery/<?=$defult_lang?>/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
						   $("#faq_search").submit()
						}
					});
					$("#faq_btn").click(function () {  
						   $("#faq_search").attr("action", "/gallery/<?=$defult_lang?>/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
						   $("#faq_search").submit()
					});
					</script>				
				 <div id="show_result" >
				 </div>	  
				<img id="waiting" src='/waiting.gif' style="display:none">
		
                </div>
	 		</aside>
					</section>
 			 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				}?>
		 
			  <?if(get_modual_setting_result($defult_site,$defult_lang,'gallery_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='gallery_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
										$result = $coms_conect->query($query);
										while($RS = $result->fetch_assoc()) {?>
											<a href="<?=$RS['link']?>" title='<?=$RS['title']?>'>
											<img src="<?=$RS['pic_adress']?>">
											</a>
										<?}?>
                                </div>
                            </div>
                        </section>
                    </aside>
				 <?}?>

            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->
 
<script>
 $(document).ready(function () {
			$("#waiting").show();
			$("#show_result").empty();
			$.ajax({
			type:'POST',
			url:'/New_members_ajax.php',
			data:"action=gallery_ajax&secend_value=1&id=<?=$defult_site?>",
			success: function(result){ 
				$("#waiting").hide();
				 $("#show_result").html(result);
			}
		});	
});	
	$(document).on("click","#ajax_pagissssn",function (e) {
			$("#waiting").show();
    	var a=$("#page_num").val();
		var b=9+parseFloat(a);
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:'/New_members_ajax.php',
			data:"action=show_pic_pagin_ajax&secend_value="+$("#page_num").val()+"&id=<?=$defult_site?>",
			success: function(result){ 
				$("#waiting").hide();
				$("#gallery").append(result);
				$("#page_num").val(b);	
			}
		});	
	});
</script>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
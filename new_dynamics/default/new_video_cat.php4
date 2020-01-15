<?$nav_src=get_result("select address from new_default_navbar where name='video_nav_picture' and la='$defult_lang' and site='$defult_site'",$coms_conect);	
view_module(8,$coms_conect);
					if($nav_src>""){
					?> 
					<!-- Start Slider -->
					<section class="slider pimg animated fadeIn hidden-xs">
						  <img src="<?=$nav_src?>" alt="<?=$nav_title?>">
					</section>
					<?}?>
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="/"><span class="fa fa-home"></span></a></li>
                        <li class="active"><?=$view_gallery_video?></li>
                    </ol>
                </div>
            </section>
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-youtube-play"></span>

                <h1 class="title"><?=$view_gallery_video?></h1>
                <span class="pdesc">توضیح مختصر درباره این صفحه در اینجا نمایش داده می شود.</span>
            </div>
        </div>
        <!-- End Page Title -->
        <div class="container">
            <main>
                <!-- Start Main -->
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=3 and pages_id=8 and la='$defult_lang' and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'video_have_ads',$coms_conect))
				 $center=$center-2;
				if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect,$madual_cat_id);
					 echo '	</aside>
						</section>';
					}//exit;?>
			 
			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect,$madual_cat_id);?>
				<?}?>
                <div class="row gridgallery">
					<form   method='post' id='faq_search'>
                    <div class="col-xs-12 cat_select_search_show row rtl">

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right cat_select">
                            <h4><span class="fa fa-folder-open"></span><?=$view_select_subject?></h4>
                            <select name="modual_cat" id='modual_cat' class="cat-select" multiple="multiple" style="width: 100%;">
								<? 
								$sql121="select id,name from new_modules_cat where type=8 and status=1";	
								$result21 = $coms_conect->query($sql121);
								while($row11 = $result21->fetch_assoc()){$str='';
									if($madual_cat_id==$row11['id']){
										$str='selected';
										$madual_cat_id=$row11['id'];
									}
									echo "<option $str value='{$row11['id']}'>{$row11['name']}</option>";	
								}

								?> 
                           </select>
                        </div>
					
                        <div class="col-md-8 col-sm-6 col-xs-12 form-group pull-right cat_search row">
                            <h4><span class="fa fa-search"></span><?=$view_search?></h4>
                            <div class="col-xs-8 form-group pull-right">

                                <input id="faqq" class="form-control" type="text"/>
                            </div>
                            <div class="col-xs-4 form-group pull-right pr0">
                                <button type="button" id="faq_btn" class="form-control btn btn-success"><span class="fa fa-search"></span></button>
                            </div>


                        </div>
                    </div>
					
 
					</form>
   
					
					<script>	
					$("#faqq").keypress(function (e) {
						if(e.which==13){
						   $("#faq_search").attr("action", "/video/<?=$defult_lang?>/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
						   $("#faq_search").submit()
						}
					});
					$("#faq_btn").click(function () {  
						   $("#faq_search").attr("action", "/video/<?=$defult_lang?>/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
						   $("#faq_search").submit()
					});
					</script>
                    <div class="col-xs-12">
                        <hr>
                    </div>
					<div id="gallery"> 
					<?$sql12 = "SELECT a.duration,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_video a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and b.type=8 and site='$defult_site' and b.cat_id=$madual_cat_id 
							group by b.page_id
							order by a.id desc limit 0,9";
							//echo $sql12; 
							$resultd1 = $coms_conect->query($sql12);
							while($row = $resultd1->fetch_assoc()) {
								$sql11="select adress from new_file_path where type=8 and name='video_videos' and id ={$row['id']}";	
								$result1 = $coms_conect->query($sql11);
								$row1 = $result1->fetch_assoc();
					?> 
                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="/video/<?=$row['la'].'/'.$row['id'].'/'.insert_dash($row['title'])?>">
                                <figure>
                                    <img src="<?=get_modual_address($row['id'],$coms_conect)?>" alt="<?=$row['title']?>">
									<h5 class="video-duration"><?=$row['duration']?></h5>
                                    <p class="text-length"><?=$row['title']?></p>
									<?if($row['mudoal_lock']==1){?>
									<span class="fa fa-lock"></span>
									<?}?> 
                                    <div class="playerbt"><span class="fa fa-youtube-play"></span></div>
                                </figure>
                            </a>
                        </div>
                    </div>
							<?}?>
 
					</div>
                    <div class="col-xs-12 moreitemsbtn prl0">
                        <h4>
                            
							<a href="#" id="ajax_pagin"><span class="fa fa-plus"></a>
							<input type='hidden' value='9' id="page_num">
                        </h4>
                    </div>
                </div>
         
	 		</aside>
					</section>
 			 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect,$madual_cat_id); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'video_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='new_video_ads'  and la='$defult_lang' and site='$defult_site'"; 
										$result = $coms_conect->query($query);
										while($RS = $result->fetch_assoc()) {?>
											<a href="<?=$RS['link']?>" title='<?=$RS['title']?>'><img src="<?=$RS['pic_adress']?>"></a>
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
<style>
.select2-search-choice-close{
	top:4px;
}
</style>		
<script>
$("#ajax_pagin").click(function (e) {
		e.preventDefault();
		var a=$("#page_num").val();
		var b=9+parseFloat(a);
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:'/New_members_ajax.php', 
			data:"action=show_videos_pagin_ajax&secend_value="+$("#page_num").val()+"&id=<?=$defult_site?>&value=<?=$madual_cat_id?>",
			success: function(result){
				$("#gallery").append(result);
				$("#page_num").val(b);	
			}
		});	
	});
	///////////////////////////////
	
	$(document).on("ready",function() {
		var divs = $(".sss");
		for(var i = 0; i < divs.length; i+=3) {
		  divs.slice(i, i+3).wrapAll("<div class='col-md-12'></div>");
		} 
	});	
</script>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
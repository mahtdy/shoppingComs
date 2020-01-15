<?view_module(9,$coms_conect);?>
         <!-- Filehaye safhe------------------------------------------------------------------>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
        <!-- Filehaye safhe------------------------------------------------------------------> 
        <!-- Start Slider -->
        <section class="slider pimg animated fadeIn hidden-xs">
            <img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/slider1.jpg" alt="<?=$nav_title?>">
        </section>
<?$madual_tag_id=	delete_dash(urldecode($madual_tag_id));?>
        <!-- Start breadcrumb -->
        <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="/"><span class="fa fa-home"></span></a></li>
                  <li class="active"> <a href='/gallery/<?=$defult_lang?>' > <?=$view_gallery?></a></li>
				  <?if($madual_tag_id){?>
                    <li class="active"><?=$madual_tag_id?></li>
				  <?}?>
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
                <!-- Start Main -->
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=4 and pages_id=9 and la='$defult_lang' and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
 
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'gallery_sesrch_have_ads',$coms_conect))
				 $center=$center-2;
				if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'r',$coms_conect);
					 echo '	</aside>
						</section>';
					}//exit;?>
			 
			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn prl0">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'c',$coms_conect);?>
				<?}?>
                <div class="row gridgallery">

                    <!--cat_select_search_show Start-->
                    <div class="col-xs-12 cat_select_search_show row rtl">
					<?if($url_temp[3]!='keyword'){?>
                    <div class="col-xs-12 cat_select_search_show row rtl">
						<form   method='post' id='faq_search'>
                        <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right cat_select pr0">
                            <h4><span class="fa fa-folder-open"></span><?=$view_select_subject?></h4>
                            <select name="modual_cat" id="modual_cat" class="cat-select" multiple="multiple" style="width: 100%;">
								<?$cat_temp=explode(",",$madual_cat_id);
								$sql121="select id,name from new_modules_cat where type=9 and status=1 and la='$defult_lang'";	
								$result21 = $coms_conect->query($sql121);
								while($row11 = $result21->fetch_assoc()){$s_str='';
									if(in_array($row11['id'],$cat_temp))
										$s_str='selected';
									echo "<option $s_str value='{$row11['id']}'>{$row11['name']}</option>";	
								}
								?> 
                           </select>
                        </div>
                       <div class="col-md-8 col-sm-6 col-xs-12 form-group pull-right cat_search row">
                            <h4><span class="fa fa-search"></span><?=$view_search?></h4>
                            <div class="col-xs-8 form-group pull-right">
								<input id="faqq" class="form-control" value="<?=$madual_search_str?>" type="text"/>
                            </div>
                            <div class="col-xs-1 form-group pull-right pr0">
                                <button id='faq_btn' type="button" class="form-control btn btn-success"><span class="fa fa-search"></span></button>
                            </div>
                        </div>
						</form>
                    </div>
                    <!--cat_select_search_show End-->
				<script>	
					$("#faqq").keypress(function (e) {
						if(e.which==13){
						   $("#faq_search").attr("action", "/gallery/<?=$defult_lang?>/search/"+ $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
						   $("#faq_search").submit()
						}
					});
					$("#faq_btn").click(function () {  
						   $("#faq_search").attr("action", "/gallery/<?=$defult_lang?>/search/" + $("#faqq").val()+'/'+$("#modual_cat").val()+"/1");
						   $("#faq_search").submit()
					});
					</script>	
						<?}?>
						
						 <?if($url_temp[3]=='keyword'){?>
						<div class="col-xs-12 tag_result_show row rtl">
							<div class="desc">
								<h3>
								<span class="fa fa-tags"></span>
								<span><?=$view_list_gallery?> </span>
								<span class="tagtitle"><?=$madual_tag_id?></span>
								</h3>
							</div>
						</div>	
						<?}?>	
						
				 <div id="gallery">

					<?
					$limit=" limit 0,9";
					if($url_temp[3]=='keyword'){
						$madual_tag_id=get_result("select id from new_keyword where name='$madual_tag_id'",$coms_conect);
					if($madual_cat_id!='null')
						$cat_str= " and b.cat_id in ($madual_cat_id)";
					if($madual_search_str&&$url_temp[3]=='search');
						$str ="and (a.title like '%$madual_search_str%' or a.deatils like '%$madual_search_str%' )";
						$sql12 = "SELECT a.album_type,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_gallery a,new_modules_catogory b ,new_mudoal_label c  
							where   a.id=b.page_id and b.type=9 and
							c.type=9 and  a.id=c.id	and label_id='$madual_tag_id'
							and site='$defult_site' $str $cat_str
							group by b.page_id
							order by a.id desc ";
					}else if($url_temp[3]=='search'){
					if($madual_cat_id!='null')
						$cat_str= " and b.cat_id in ($madual_cat_id)";
					if($madual_search_str&&$url_temp[3]=='search');
						$str ="and (a.title like '%$madual_search_str%' or a.deatils like '%$madual_search_str%' )";
						$sql12 = "SELECT a.album_type,a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_gallery a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and b.type=9 and site='$defult_site' $str $cat_str
							group by b.page_id
							order by a.id desc ";
					}	
							$final_sql=$sql12.$limit;
						 
							$_SESSION['search_sql']=$sql12;
							$resultd1 = $coms_conect->query($final_sql);
							while($row = $resultd1->fetch_assoc()) {
								$sql11="select adress from new_file_path where type=9 and name='galery_pic' and id ={$row['id']}";	
								$result1 = $coms_conect->query($sql11);
								$row1 = $result1->fetch_assoc();
					?> 
                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="/gallery/<?=$defult_lang?>/<?=$row['id'].'/'.insert_dash($row['title'])?>">
                                <figure>
                                    <img title="<?=$row['title']?>" src="<?=get_gallery_thumbnail($row1['adress'],$row['album_type'])?>" alt="<?=$row['title']?>">
                                    <p class="text-length"><?=$row['title']?>
                                    </p>
									<?if($row['mudoal_lock']==1){?>
									<span class="fa fa-lock"></span>
									<?}?>
                                </figure>
                            </a>
                        </div>
                    </div>
						<?}?>
                </div>

 
 


                    <div class="col-xs-12 moreitemsbtn">
                        <h4>
                            
							<a href="#" id="ajax_pagin"><span class="fa fa-plus"></a>
							<input type='hidden' value='9' id="page_num">
                        </h4>
                    </div>
<script>
$("#ajax_pagin").click(function (e) {
		e.preventDefault();
		var a=$("#page_num").val();
		var b=9+parseFloat(a);
		e.preventDefault();
		$.ajax({
			type:'POST',
			url:'/New_members_ajax.php',
			data:"action=search_gallery_pagin_ajax&secend_value="+$("#page_num").val()+"&id=<?=$defult_site?>",
			success: function(result){
				$("#gallery").append(result);
				$("#page_num").val(b);	
			}
		});	
	});
</script>


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
		 
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'gallery_sesrch_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='gallery_sesrch_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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

 

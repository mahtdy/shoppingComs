            <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
                <img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/slider1.jpg" alt="<?=$nav_title?>" />
            </section>

            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="/"><span class="fa fa-home"></span></a></li>
                        <li class="active"><?=$view_weblog?></li>
                    </ol>
                </div>
            </section>
   
 

        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-pencil-square-o"></span>

                <h1 class="title"><?=$view_weblog?></h1>
                <span class="pdesc">توضيح مختصر درباره اين صفحه در اينجا نمايش داده مي شود.</span>

            </div>
        </div>
        <!-- End Page Title -->

        <div class="container">
            <main>
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=1 and pages_id=10 ";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'blog_have_ads',$coms_conect))
				 $center=$center-2;
			if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'r',$coms_conect);
					 echo '	</aside>
						</section>';
					}//exit;?>
			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'c',$coms_conect);?>
				<?}?>
			
                <!-- Start Main -->
                <div class="row"> 


                    <!-- Start Article -->
                    <article class="col-md-12 col-sm-9 pull-right animated fadeIn">
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 bloglist">

                                        <div class="row">
										<div id="gallery">
											<?$sql128 = "SELECT a.user_id,b.cat_id,a.abstract,a.date,a.site,a.la,a.title,a.id  ,a.view,a.status   from new_blog a,new_modules_catogory b   
													where id>0 and a.id=b.page_id and b.type=10 and site='$defult_site' and publish_date<=$now
													group by b.page_id
													order by a.id desc limit 0,9";
													 
													$resultd18 = $coms_conect->query($sql128);
													while($row8 = $resultd18->fetch_assoc()) {
														$sql118="select adress from new_file_path where type=10 and name='blog_album' and id ={$row8['id']}";	
														$result18 = $coms_conect->query($sql118);
														$row18 = $result18->fetch_assoc();
														 $temp=urlencode($row8['title']);
											?> 
											
                                            <div class="col-xs-12 item ">
                                              <a href='/blog/<?=$row8['la'].'/category/'.$row8['cat_id']?>'><p class="bcat"><span><?=get_result("select name from new_modules_cat where id={$row8['cat_id']}",$coms_conect)?></span></p></a>
                                                <a href="/blog/<?=$row8['la'].'/'.$row8['id'].'/'.insert_dash($row8['title'])?>"><h3><?=$row8['title']?></h3></a>
                                                <p class="info">
                                                    <!--span class="fa fa-user"></span><span>نام نويسنده</span-->
                                                    <span class="fa fa-clock-o"></span><span><?=miladitojalalidefult(date('Y-m-d H:i:m',$row8['date']));?></span>
                                                    <span class="fa fa-eye"></span><span><?=$row8['view']?></span>
													<?if(get_result("select count(id) from new_madules_comment where type=10 and madul_id={$row8['id']}",$coms_conect)){?>
													<span class="ace-icon fa fa-comments bigger-120" title="<?=$view_number_comment2?>"><?=mudoal_comment_count($RS1['id'],10,$coms_conect)?></span>
													</a>	
													<?}?>
													<span class="fa fa-user"></span><span><?=get_result("select user_name from new_managers where id={$row8['user_id']}",$coms_conect);?></span>
                                                    
                                                </p>
												 <?if($row18['adress']){?>
													<a href="<?=$row18['adress']?>" class="swipebox" alt="<?=$row8['title']?>">
														<img src="<?=$row18['adress']?>" alt="<?=$row8['title']?>"/>
														  <div class="resizericon">
															<span class="fa fa-expand"></span>
														</div>
													</a>
												 <?}?>
                                                <p class="kholase"><?=$row8['abstract']?></p>
                                               <div class="sociallinks">
                                                    <ul>
												<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$domain_name.$url?>"><span class="fa fa-linkedin-square"></span></a>
												<a href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"><span class="fa fa-twitter-square"></span></a>
												<a href="https://plus.google.com/share?url=<?=$domain_name.$url?>"><span class="fa fa-google-plus-square"></span></a>
												<a href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>"><span class="fa fa-facebook-square"></span></a>
                                                    </ul>
                                                </div>
                                                <div class="more">
                                                    <button onclick="window.location='/blog/<?=$row8['la'].'/'.$row8['id'].'/'.insert_dash($row8['title'])?>'" class="btn btn-info"><?=$view_more?></button>
                                                    <hr/>
                                                </div>
                                            </div>
													<?}?>
                     
 
                                        </div>
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
			data:"action=show_blog_pagin_ajax&secend_value="+$("#page_num").val()+"&id=<?=$defult_site?>",
			success: function(result){
				//alert(result);
				$("#gallery").append(result);
				$("#page_num").val(b);	
			}
		});	
	});
</script>
                                </section>

                            </div>
                        </section>
                    </article>
				</div>	
	 		</aside>
					</section>
 			 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'blog_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='blog_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
                </div>
                <!-- end main row -->
           
            <!-- end main -->
        </div>
        <!-- End main container -->

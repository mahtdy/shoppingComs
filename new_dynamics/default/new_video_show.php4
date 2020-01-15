<!--link href="/yep_theme/default/rtl/assets/css/videojs-resolution-switcher.css" rel="stylesheet">
 <link href="/yep_theme/default/rtl/assets/css/video_ads/videojs.ads.css" rel="stylesheet"-->
<?$sql120 = "SELECT navication_pic,video_source,mudoal_lock,can_comment,id,deatils,title,date,view,down_count from new_video
					where id='$madual_id'  and status=1 and publish_date<=$now";
					 $resultd10 = $coms_conect->query($sql120);
					 $row15 = $resultd10->fetch_assoc();
					 $temp=urlencode($row15['title']);
					$id=$row15['id'];
					$temp=urlencode($row15['title']);
					if($row15['navication_pic'])
					$nav_src=$row15['navication_pic'];
				 else
				 	$nav_src=get_result("select address from new_default_navbar where name='video_nav_picture' and la='$defult_lang' and site='$defult_site'",$coms_conect);	
					if($nav_src>""){
					?> 
					<!-- Start Slider -->
 
						<section class="slider pimg animated fadeIn hidden-xs">
						<img src="<?=$nav_src?>" alt="<?=$nav_title?>" style="height:<?=$header_nav_heigth?>px">
						</section>
					<?}?>
<?if(time()>=$_SESSION['count']+2){
	$query1="update new_video set view=view+1 where id='$madual_id'";
	$coms_conect->query($query1);		
	view_module(8,$coms_conect);
}
$_SESSION['count']=time();
?>
 <!-- Start breadcrumb -->
        <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="#"><span class="fa fa-home"></span></a></li>
					<li><a href="/video/<?=$defult_lang?>"><?=$view_video?></a></li>
					<?$cat_id=get_result("select cat_id from new_modules_catogory where type=8 and page_id={$row15['id']}",$coms_conect);?> 
                    <li class="active"><a href="/video/<?=$defult_lang?>/category/<?=$cat_id?>"><?=get_result("select name from new_modules_cat where  id=$cat_id",$coms_conect);?></a></li>
                    <li class="active"><a href="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>"><?=$row15['title'] ?></a></li>
               
                </ol>
            </div>
        </section>
		<?	#####نوع ماژول  
					$comment_type=8;
				 if($site=='main')
				include 'new_dynamics/default/new_popup_comment.php4';else
				include '../new_dynamics/default/new_popup_comment.php4';?>
    <!-- End Page Title -->
        <div class="container">
            <main>
                <!-- Start Main -->
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=2 and pages_id=8 and la='$defult_lang' and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'video_show_have_ads',$coms_conect))
				 $center=$center-2;
			if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect,$cat_id);
					 echo '	</aside>
						</section>';
					}//exit;?>
			 
			   <aside class="col-md-<?=$center?>  col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect,$cat_id);?>
				<?}?>
                <div class="row">
 				  <?if($row15['id']==''){
						include 'new_dynamics/no_modual.php4';	
					}else if ($row15['mudoal_lock']==1&&$_SESSION["new_okusername"]=='') include 'new_lock_page.php';else{	
				
			
			

			
				?>
                    <!-- Start Article -->
                    <article class="col-md-12 col-sm-8 col-xs-12 pull-right animated fadeIn">
                        <section class="content">
                            <div class="row gridgallery">
                                <section class="col-md-12 videogalleryshow prl0">
                                    <div class="row">
                                        <div class="col-xs-12 cat_select_search_show row rtl "> 
                                            <h2>
                                                <span class="fa fa-folder-open"></span>
                                                <span><?=$view_subjectp?> </span>
                                               <?$cat_arr=get_modual_cat(8,$madual_id,$coms_conect);
											   foreach ( $cat_arr as $val){ 
												   if($val ['name'])
												    echo "<a target='_balnk' href='/video/$defult_lang/category/{$val ['id']}/".insert_dash($val ['name'])."'"."><span class='cc'>{$val ['name']}</span> </a>";
											   }?>
                                            </h2>
                                        </div> 
                                       <div class="col-xs-12 rtl">
                                            <h1><?=$row15['title']?></h1> 
                                       </div> 
									 <div class="col-xs-12 prl">
									   <?$adress=get_result("select adress from new_file_path where id='$madual_id' and type=8 and name='video_videos'",$coms_conect)?>
												<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" 
                                               poster="<?=get_modual_address($row15['id'],$coms_conect)?>" 
                                               data-setup="{}">
                                                <source src="<?=$adress?>" type='video/mp4' />
                                                <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                                <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                                <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                            </video>
											
											   
										</div>
                                        <div class="col-xs-12 tools rtl">
											<div class="col-md-6 col-xs-12 pull-right rtl pr0 social">
											
                                                <div class="ccomment pull-right">
                                                    <a class="scroll" href="#comments" data-toggle="tooltip" title="<?=$view_number_comments?>"><span class="fa fa-commenting-o"></span></a>
											 
												   <span><?=get_result("select count(id) as count from new_madules_comment   where
													type=8 and madul_id=$madual_id",$coms_conect)?></span>
                                                </div>
												<?if($_SESSION["new_okusername"]>""){	
														$url=urldecode ($url);$class='';
													if(get_result("select count(id) count from new_favorite where url='$url' and user_name='{$_SESSION["new_okusername"]}'",$coms_conect)>0)
														$class='';
														else 
														$class='-o';?>
										        <div class="clike pull-right">
                                                    <a href="#" data-toggle="tooltip"  id='add_to_favorite'  title="<?=$view_add_favorites?>"><span id="favorite_span" class="fa fa-heart<?=$class?>"></span></a>
                                                    <span><?=get_result("select count(id) count from new_favorite where url='$url'",$coms_conect);?></span>
											        <script> 
													$("#add_to_favorite").click(function (e) {
														$("#added_favorite").hide();
															$("#remove_favorite").hide();
														e.preventDefault();
															$.ajax({
																type:'POST',
																url:'/New_members_ajax.php',
																data:"action=add_to_favorite&id=<?=$url?>",
																success: function(result){
																	if(result==0){
																		$("#remove_favorite").show();
																		$("#added_favorite").hide();
																		$("#favorite_span").toggleClass('fa-heart  fa-heart-o');
																	}
																	else{
																		$("#remove_favorite").hide();
																		$("#added_favorite").show();
																		$("#favorite_span").toggleClass('fa-heart-o  fa-heart');
																	}
																}
															});		
														});
													</script>
												</div>
												 <?}?>
													<div id="remove_favorite" class="alert alert-error yepalert yepalert-danger" style="position: fixed;display:none">
													  <button type="button" class="close" data-dismiss="alert">×</button> 
													  <strong></strong> <?=$view_remove_favorite?>
													</div>
													<div id="added_favorite" class="yepalert  yepalert-success  alert" style="position: fixed;display:none">
													  <button type="button" class="close" data-dismiss="alert">×</button> 
													  <strong></strong> <?=$view_added_favorite?>
													</div>
                                                <div class="videodownload pull-right">
                                                    <a id="download_video" href="<?=$adress?>"   title="<?=$view_download?>"><span class="fa fa-cloud-download"></span></a>
                                                    <span><?=$row15['down_count']?></span>
                                                </div>
												<script>
												$("#download_video").click(function (e) {
													$.ajax({
														type:'POST',
														url:'/New_members_ajax.php',
														data:"action=download_video_count&id=<?=$madual_id?>",
													});
												});		
												</script>
										   </div>
											 <div class="col-md-6 col-xs-12 pull-left ltr social">
													
													<div class="col-lg-2 col-md-4  viewed dropdown pull-left" style="padding:0px">
														<a id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														اشتراک<span class="fa fa-share-alt"></span>
														
														</a>
														<ul class="dropdown-menu" aria-labelledby="dLabel">
														
                                
                                                                
															<li   class="action facebook">
																<a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>" title="فیسبوک">فیسبوک<span class="fa fa-facebook"></a>
															</li>
															<li   class="action gplus">
																<a rel="nofollow" href="https://plus.google.com/share?url=<?=$domain_name.$url?>" title="گوگل پلاس">گوگل‌پلاس<span class="fa fa-google-plus"></a>
															</li>
															<li class="action telegram">
																<a   rel="nofollow"  href="https://telegram.me/share/url?url=<?=$domain_name.$url?>" title="تلگرام">تلگرام<span class="fa fa-paper-plane"></a>
															</li>
															<li    class="action gplus">
																<a rel="nofollow" href="#" title="اینستاگرام">اینستاگرام<span class="fa fa-instagram"></a>
															</li>
															<li   class="action twitter">
																<a  rel="nofollow" href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"  title="توئیتر ">توئیتر<span class="fa fa-twitter"></a>
															</li>
														</ul>
														
													</div>
													<div class="col-lg-3 col-md-4  viewed pull-left  prl0"> 
													
														<span class="prl0"><?=$row15['view']?></span>
														<span data-toggle="tooltip" title="<?=$view_visit?>" class="fa fa-eye prl0"></span>
													
													</div>
											</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 matnkhabar">
											<p class="kholase"><h5><?=$row15['deatils']?></h5></p> 
											<?if($row15['video_source']){?>
											 <a href='<?=$row15['video_source']?>'><?=$view_source_video?></a> 
											<?}?>
										</div>
                                    </div><br>
									<?if(get_result("select count(id) from new_mudoal_label where type=8 and id=$madual_id",$coms_conect)>0){?>
									    <div class="col-xs-12 tags prl0">
                                            <fieldset>
                                                <legend><?=$view_tags?></legend>
                                                <ul class="pr10">
													<?create_label_pishgaman($row15['id'],'video',$madual_lang,$coms_conect,8);?>
                                                </ul>
                                            </fieldset>
                                        </div>
									<?}?>
										<legend><?=$view_related_video?></legend>
									 	<div class="owl-carousel" id="gallery" style="margin-bottom: 40px;"> 
											<?$query="SELECT b.duration,b.id,b.title,b.date,b.la FROM new_related_madual a ,new_video b   where page_id='$madual_id' and a.id=b.id  and a.type=8";
											 //echo $query;//exit;
											$result = $coms_conect->query($query);
											$j=0;
											 while($mortab = $result->fetch_assoc()){
												 $pic_adress=get_result("select adress from new_file_path where c.type=8 and id={$mortab['id']}",$coms_conect);?>
												<div class="item oh">
													<a href="/video/<?=$mortab['la'].'/'.$mortab['id'].'/'.insert_dash($mortab['title'])?>">
													<figure>
														
															<img class = "lazyOwl hvr-glow" src="<?=get_modual_address($mortab['id'],$coms_conect)?>" alt="<?=$mortab['title']?>">
														   <h5 class="video-duration"><?=$mortab['duration']?></h5>
														   <p class="text-length"><?=$mortab['title']?>
															</p>
															<div class="playerbt"><span class="fa fa-youtube-play"></span></div>
														</figure>
													</a>
												</div>
											 <?$j++;}						 
												$cat_id=get_result("select cat_id from new_modules_catogory where page_id=$madual_id",$coms_conect);
												if($j<6){
													$j=6-$j;
													$sql120 = "SELECT a.la,a.duration,a.id,a.title from new_video a,new_modules_catogory c   
													where a.id>0 and   c.type=8 and a.id<>$id and c.page_id=a.id and c.cat_id=$cat_id    and status=1
													order by a.id desc limit 0,$j";
													// echo $sql120;//exit;
													$resultd10 = $coms_conect->query($sql120);
													while($row10 = $resultd10->fetch_assoc()) {	
													?>
							 						 <div class="item oh">
														<a href="/video/<?=$row10['la'].'/'.$row10['id'].'/'.insert_dash($row10['title'])?>">
														<figure>
															
																<img class = "lazyOwl hvr-glow" src="<?=get_modual_address($row10['id'],$coms_conect)?>" alt="<?=$mortab['title']?>">
															   <h5 class="video-duration"><?=$row10['duration']?></h5>
															   <p class="text-length"><?=$row10['title']?>
																</p>
																<div class="playerbt"><span class="fa fa-youtube-play"></span></div>
															</figure>
														</a>
													</div>
													<?}
												}?>
										 </div>
								 
									<script>
										$(document).ready(function() {
				 
										  $("#gallery").owlCarousel({
											rtl:true,
											lazyLoad : true,
											nav : true,
											loop : true,
											navText : ["قبلی","بعدی"],
											responsive:{
												0:{
													items : 1
												},
												600:{
													items : 2
												},
												1000:{
													items : 3
												}
											}

										  }); 
										 
										});
									</script>
                                    <div>
                
										<?if($row15['can_comment']==1){$low_text= get_tem_result($defult_site,$defult_lang,'low_text','default',$coms_conect);
										echo $low_text['text'];}?>
										<?if($site=='main'&&$row15['can_comment']==1){
										include 'new_dynamics/default/new_modual_comment.php4';
										}else if($site!='main'&&$row15['can_comment']==1)
										include '../new_dynamics/default/new_modual_comment.php4'?>	
                                    </div>
                                </section>
                                <section class="col-md-3 sidebar">
                                </section>
                            </div>
                        </section>
                    </article>
					</div>
				 
					<?}?>
                    <!-- Start Left Sidebar -->
	 		</aside>
					</section>
 			 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect,$cat_id); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'video_show_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='video_show_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
										$result = $coms_conect->query($query);
										while($RS = $result->fetch_assoc()) {?>
											<a href="<?=$RS['link']?>" title='<?=$RS['title']?>'><img src="<?=$RS['pic_adress']?>"></a>
										<?}?>
                                </div>
                            </div>
                        </section>
                    </aside>
				 <?}?>
     
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->
	 
   <!--script src="/yep_theme/default/rtl/assets/js/videojs-resolution-switcher.js"></script> 
  <script src="/yep_theme/default/rtl/assets/js/video_ads/videojs.ads.js"></script> 
  <script>
  //  videojs('video_100').videoJsResolutionSwitcher();
 videojs('video_1', {}, function() {
  var player = this;
	player.ads();
	player.src('<?=$adress?>');
	 
 	player.on('contentupdate', function(){
		player.trigger('adsready');
	});
 
    player.on('readyforpreroll', function() {
    player.ads.startLinearAdMode();
    player.src('/source/comsroot/meloudi-jungle.mp4');
    player.one('adended', function() {
      player.ads.endLinearAdMode();
    });
  });
});
  </script-->
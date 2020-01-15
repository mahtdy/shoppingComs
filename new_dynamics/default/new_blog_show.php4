<?if(time()>=$_SESSION['count']+2){
	$query1="update new_blog set view=view+1 where id='$madual_id'";
	$coms_conect->query($query1);		
	view_module(10,$coms_conect);
}
$_SESSION['count']=time();

$sql12 = "SELECT navication_pic,user_id,mudoal_lock,attach_file,view,blog_type,continue_blog,can_comment,id,abstract,title,date,view from new_blog
				 where id='$madual_id'  and status=1 and publish_date<=$now";
				 $resultd1 = $coms_conect->query($sql12);
				 $row15 = $resultd1->fetch_assoc();
?> 
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
					<?$cat_id=get_result("select cat_id from new_modules_catogory where type=10 and page_id={$row15['id']}",$coms_conect);?> 
                        <li><a href="/"><span class="fa fa-home"></span></a></li>
						<li><a href="/blog/<?=$defult_lang?>"><?=$view_weblog?></a></li>
                        <li class="active"><?=$view_view_weblog?></li>
                    </ol>
                </div>
			</section>
<?if($row15["navication_pic"]==''){
$row15["navication_pic"]=get_result("select address from new_default_navbar where name='blog_nav_picture' and la='$defult_lang' and site='$defult_site'",$coms_conect);	
}
if($row15["navication_pic"]>""){
?>
<!-- Start Slider -->
	<section class="slider pimg animated fadeIn hidden-xs">
	<img src="<?=$row15["navication_pic"]?>" alt="<?=$nav_title?>" style="height:<?=$header_nav_heigth?>px">
	</section>
<?}?>			
        <!-- End Header -->
        <div class="container">
            <main>
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=2 and pages_id=10";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'blog_show_have_ads',$coms_conect))
				 $center=$center-2;
				if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect,$cat_id);
					 echo '	</aside>
						</section>';
					}//exit;?>
			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect,$cat_id);?>
				<?}
				 $temp=urlencode($row15['title']);
				 $id=$row15['id'];
				 $temp=urlencode($row15['title']);
				 if($row15['id']==''){
					 include 'new_dynamics/no_modual.php4';	
				 }else if ($row15['mudoal_lock']==1&&!isset($_SESSION["new_okusername"])) get_login_form($site_url);else{	
				 #####نوع ماژول  
				$comment_type=10;
				 if($site=='main')
				 include 'new_dynamics/default/new_popup_comment.php4';else
				 include '../new_dynamics/default/new_popup_comment.php4';?>
                <!-- Start Main -->
                <div class="row">
                   <!-- Start Article -->
                    <article class="col-md-12 col-sm-9 pull-right animated fadeIn">
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 blogitem">
			                         <div class="row">
                                        <!-- Blog Item-->
                                        <div class="col-xs-12 item">
										  <h3><?=$row15['title']?></h3> 
											<?if($row15['blog_type']==0){?>
                                          
                                            <?}if($row15['blog_type']==1){
												?>
												<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="100%" height="100%"
                                                       poster="/<?=get_modual_address($row15['attach_file'])?>"
                                                       data-setup="{}">
                                                    <source src="<?=$row15['attach_file']?>" type='video/mp4' />
                                    
                                                    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                                    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
                                                    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                                </video>
											<?}if($row15['blog_type']==3){?>
                                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
													<!-- Indicators -->

													<ol class="carousel-indicators">
													<?$i=0;$sql14 = "SELECT adress from new_file_path where id='$madual_id'  and type=10 and name='blog_album'";
														$resultd14 = $coms_conect->query($sql14);
														while($row154 = $resultd14->fetch_assoc()){?>
														<li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?if($i==0) echo 'active'?>"></li>
														<?$i++;}?>
													</ol>

													<!-- Wrapper for slides -->
													<div class="carousel-inner" role="listbox">
													<?$i=0;$sql14 = "SELECT adress from new_file_path where id='$madual_id'  and type=10 and name='blog_album'";
														$resultd14 = $coms_conect->query($sql14);
														while($row154 = $resultd14->fetch_assoc()){?>	
														<div class="item <?if($i==0) echo 'active'?>">
																<img src="<?=$row154['adress']?>" alt="<?=$row15['title']?>">
														</div>
														<?$i++;}?>
													 </div>
													<!-- Left and right controls -->
													<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
														<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
														<span class="sr-only"><?=$view_Previous?></span>
													</a>
													<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
														<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
														<span class="sr-only"><?=$view_Next?></span>
													</a>
												</div>
										 <?}?>
                                            <p class="info">
        										 <span class="fa fa-clock-o"></span><span><?=miladitojalalidefult(date('Y-m-d H:i:m',$row15['date']));?></span>
                                                <span class="fa fa-eye"></span><span><?=$row15['view']?></span>
												<span class="fa fa-user"></span><span><?=get_result("select user_name from new_managers where id={$row15['user_id']}",$coms_conect);?></span>
                                            </p>
											<p><?=$row15['abstract']?></p>
                                            <p><?=$row15['continue_blog']?></p>
		                                     <div class="sociallinks">
                                                <ul>
                                                    <span style="margin-left: 8px;padding-top: 6px;font-size: 12pt;"><?=$view_sharing?>  </span>
												<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$domain_name.$url?>"><span class="fa fa-linkedin-square"></span></a>
												<a href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"><span class="fa fa-twitter-square"></span></a>
												<a href="https://plus.google.com/share?url=<?=$domain_name.$url?>"><span class="fa fa-google-plus-square"></span></a>
												<a href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>"><span class="fa fa-facebook-square"></span></a>
												<a title='تلگرام' href="https://telegram.me/share/url?url=<?=$domain_name.$url?>"><span class="fa fa-facebook-square"></span></a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
									<?if(get_result("SELECT b.id FROM new_related_madual a ,new_blog b  where page_id='$madual_id' and a.id=b.id  and type=10",$coms_conect)){?>			 
										<div class="row">
											<div class="col-xs-12 tags">
												<fieldset>
													<legend><?=$view_related_post?></legend>
													<ul class="img">
														<?$query="SELECT b.id,b.title,b.la FROM new_related_madual a ,new_blog b  where page_id='$madual_id' and a.id=b.id  and type=10";
														 $result = $coms_conect->query($query);
														$totla_related="";$i=1;
														while($mortab = $result->fetch_assoc()){
														 ?>
													  <li><a href="<?="/blog/{$mortab['la']}/{$mortab['id']}/".insert_dash($mortab['title'])?>" class="desc"><?=$mortab['title']?></a></li>
														<?}?>
													</ul>
												</fieldset>
											</div>		
										</div>	
									<?}?>
									<?if(get_result("select count(id) from new_mudoal_label where type=10 and id=$madual_id",$coms_conect)>0){?>
                                    <div class="col-xs-12 tags">

                                        <fieldset>
                                            <legend><?=$view_tags?></legend>
                                            <ul>
												<?create_label_pishgaman($row15['id'],'blog',$madual_lang,$coms_conect,10);?>
                                            </ul>
                                        </fieldset>
                                    </div>
									<?}?>
								 <?if($row15['can_comment']==1){$low_text= get_tem_result($defult_site,$defult_lang,'low_text',$tem_name,$coms_conect);
								echo $low_text['text'];}?>
								<?if($site=='main'&&$row15['can_comment']==1){
								include 'new_dynamics/default/new_modual_comment.php4';
								}else if($site!='main'&&$row15['can_comment']==1)
								include '../new_dynamics/default/new_modual_comment.php4'?>	
                                </section>
									<?}?>
                            </div>
                        </section>
                    </article>
     


                </div>
	 		</aside>
					</section>
 			 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect,$cat_id); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'blog_show_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='blog_show_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
        <!-- Filehaye safhe-->

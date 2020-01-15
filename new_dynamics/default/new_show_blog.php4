<?$query1="update new_blog set view=view+1 where id='$madual_id'"; 
view_module(10,$coms_conect);
$coms_conect->query($query1);?> 
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="#"><span class="fa fa-home"></span></a></li>
                        <li class="active"><?=$view_weblog?></li>
                    </ol>
                </div>
			</section>
        <!-- End Header -->
        <div class="container">
            <main>
				 <?$sql12 = "SELECT attach_file,view,blog_type,continue_blog,can_comment,id,abstract,title,date,view from new_blog
				 where id='$madual_id'  and status=1";
				 $resultd1 = $coms_conect->query($sql12);
				 $row15 = $resultd1->fetch_assoc();
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
                    <article class="col-md-8 col-sm-9 pull-right animated fadeIn">
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
        										 <span class="fa fa-clock-o"></span><span><?=miladitojalalidefult(date('Y-m-d H:i:m',$row8['date']));?></span>
                                                <span class="fa fa-eye"></span><span><?=$row15['view']?></span>
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
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 tags">

                                        <fieldset>
                                            <legend><?=$view_tags?></legend>
                                            <ul>
												<?create_label_pishgaman($row15['id'],'blog',$madual_lang,$coms_conect,10);?>
                                            </ul>
                                        </fieldset>
                                    </div>
								 <?if($row15['can_comment']==1){$low_text= get_tem_result($defult_site,$defult_lang,'low_text','default',$coms_conect);
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
                    <!-- Start Right Sidebar -->
                    <aside class="col-md-4 col-sm-3 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">
                            <!-- block item-->
                            <div class="block hidden-xs">
                                <div class="header">
                                    <h3><span><?=$view_news_list?></span></h3>
                                </div>
                                <div class="content title-block">
                                    <ul>
                                        <li><a href="#">عنوان نمونه برای خبر یا مطلب</a></li>
                                        <li><a href="#">عنوان نمونه برای خبر یا مطلب</a></li>
                                        <li><a href="#">عنوان نمونه برای خبر یا مطلب</a></li>
                                        <li><a href="#">عنوان نمونه برای خبر یا مطلب</a></li>
                                        <li><a href="#">عنوان نمونه برای خبر یا مطلب</a></li>
                                        <li><a href="#">عنوان نمونه برای خبر یا مطلب</a></li>
                                        <li><a href="#">عنوان نمونه برای خبر یا مطلب</a></li>
                                        <li><a href="#">عنوان نمونه برای خبر یا مطلب</a></li>

                                    </ul>
                                </div>
                            </div>
                            <!-- block item-->
                            <div class="block hidden-xs">
                                <div class="header">
                                    <h3><span><?=$view_list_content_picture?></span></h3>
                                </div>
                                <div class="content post-block">
                                    <ul>

                                        <li class="row">
                                            <div class="col-md-5 pull-right pl0">
                                                <a href="#" class="hvr-grow"><img src="img/post1.jpg"></a>
                                            </div>
                                            <div class="col-md-7 pull-right pl0">
                                                <a href="#"><h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                    چاپ</h3></a>
                                            </div>
                                        </li>

                                        <li class="row">
                                            <div class="col-md-5 pull-right pl0">
                                                <a href="#" class="hvr-grow"><img src="img/post2.jpg"></a>
                                            </div>
                                            <div class="col-md-7 pull-right pl0">
                                                <a href="#"><h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                    چاپ</h3></a>
                                            </div>
                                        </li>

                                        <li class="row">
                                            <div class="col-md-5 pull-right pl0">
                                                <a href="#" class="hvr-grow"><img src="img/post3.jpg"></a>
                                            </div>
                                            <div class="col-md-7 pull-right pl0">
                                                <a href="#"><h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                    چاپ</h3></a>
                                            </div>
                                        </li>

                                        <li class="row last">
                                            <div class="col-md-5 pull-right pl0">
                                                <a href="#" class="hvr-grow"><img src="img/post1.jpg"></a>
                                            </div>
                                            <div class="col-md-7 pull-right pl0">
                                                <a href="#"><h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت
                                                    چاپ</h3></a>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <!-- block item-->
                            <div class="block hidden-xs">
                                <div class="header">
                                    <h3><span><?=$view_video_list?></span></h3>
                                </div>
                                <div class="content video-block">
                                    <ul>

                                        <li>
                                            <a href="#" class="hvr-grow">
                                                <img src="img/post1.jpg">

                                                <p>22:35</p>
                                            </a>
                                            <a href="#">
                                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="hvr-grow">
                                                <img src="img/post2.jpg">

                                                <p>22:35</p>
                                            </a>
                                            <a href="#">
                                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3>
                                            </a>
                                        </li>

                                        <li class="last">
                                            <a href="#" class="hvr-grow">
                                                <img src="img/post3.jpg">

                                                <p>22:35</p>
                                            </a>
                                            <a href="#">
                                                <h3>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </section>
                    </aside>


                </div>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- Filehaye safhe-->

<?if(time()>=$_SESSION['count']+2){
	$query1="update new_download set view=view+1 where id='$madual_id'";
	$coms_conect->query($query1);		
	view_module(6,$coms_conect);
}
$_SESSION['count']=time();
					#####نوع ماژول  
					$comment_type=6;
				 if($site=='main')
				include 'new_dynamics/default/new_popup_comment.php4';else
				include '../new_dynamics/default/new_popup_comment.php4';
$sql12 = "SELECT password,date,la,navication_pic,mudoal_lock,can_comment,id,title,date,view from new_download 
	 where id='$madual_id'  and status=1 ";
	 $resultd1 = $coms_conect->query($sql12);
$row15 = $resultd1->fetch_assoc();
?> 
<!-- Start breadcrumb -->
<section class="breadcrumb-sec animated fadeIn">
	<div class="container">
		<ol class="breadcrumb rtl">
		<?$cat_id=get_result("select cat_id from new_modules_catogory where type=6 and page_id={$row15['id']}",$coms_conect);?> 
			<li><a href="/"><span class="fa fa-home"></span></a></li>
			 <li  ><a href="/download/<?=$defult_lang?>"><?=$view_download?></a></li>
			 <li class="active"><a href="/download/<?="{$row15['la']}/{$row15['id']}/".insert_dash($row15['title'])?>"><?=$view_view_download?> | <?=$row15["title"]?></a></li>
		</ol>
	</div>
</section>
<?if($row15["navication_pic"]==''){
$row15["navication_pic"]=get_result("select address from new_default_navbar where name='download_nav_picture' and la='$defult_lang' and site='$defult_site'",$coms_conect);	
}
if($row15["navication_pic"]>""){?>	
<!-- Start Slider -->
	<section class="slider pimg animated fadeIn hidden-xs">
	<img src="<?=$row15["navication_pic"]?>" alt="<?=$nav_title?>" style="height:<?=$header_nav_heigth?>px">
	</section>
<?}?>		
			
			
        <div class="container">
		 <main>
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=2 and pages_id=6";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'download_show_have_ads',$coms_conect))
				 $center=$center-2;
			 
			if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect,$cat_id);
					 echo '	</aside>
						</section>';
					}//exit;?>
			 
			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect,$cat_id);?>
				<?}?>
				  <?$temp=urlencode($row15['title']);
					$id=$row15['id'];
					$temp=urlencode($row15['title']);
					if($row15['id']==''){
						include 'new_dynamics/no_modual.php4';	
					}else if ($row15['mudoal_lock']==1&&$_SESSION["new_okusername"]=='') get_login_form($site_url);else{	

				?>
					
					     <main>
                <!-- Start Main -->
                <div class="row">


                    <!-- Start Article -->
                    <article class="col-md-12 col-sm-12 pull-right animated fadeIn">
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 newsitempage">
                                    <div class="row">
                                        <div class="col-sm-12 pull-left rtl">
                                            <h1><?=$row15['title']?></h1>
                                            <p class="cat_date">
                                                <span class="fa fa-folder-open"></span>
                                              <? 
											  $cat_arr=get_modual_cat(6,$madual_id,$coms_conect);
							 
							foreach ( $cat_arr as $val){
								if($val ['name'])
								   echo "<a target='_balnk' href='/download/$defult_lang/category/".insert_dash($val ['name'])."'".">
							    <span class='cc'>{$val ['name']}</span>  
							   </a>";
							}?>
                                                <span class="fa fa-clock-o"></span>
                                                <span><?=jdate("d-m-Y",$row15['date'])?></span>
                                                <span class="fa fa-edit"></span>
                                                <span>مهدی آذربایجانی</span>

                                            </p>
                                        </div>
                                      					<div class="col-xs-12 row tools rtl  ">
						<div class="col-sm-6 col-xs-12 pull-right rtl pr0">
							 <div class="ccomment pull-right">
								   <span class="fa fa-eye"></span>
                                   <span><?=$row15['view']?></span>
                              </div>
							<div class="ccomment pull-right">
							  <a class="scroll" href="#comments" data-toggle="tooltip" title="<?=$view_number_comments?>"><span class="fa fa-commenting-o"></span></a>
								<span><?=get_result("select count(id) as count from new_madules_comment   where
								type=6 and madul_id=$madual_id",$coms_conect)?></span>
							</div>
							<div class="clike pull-right">
									<? if($_SESSION["new_okusername"]>""){	
										$url=urldecode ($url);$class='';
										if(get_result("select count(id) count from new_favorite where url='$url' and user_name='{$_SESSION["new_okusername"]}'",$coms_conect)>0)
										$class='';
										else 
										$class='-o';?>
									  <? } ?>
								  <a href="#" id='add_to_favorite' data-toggle="tooltip" title="<?=$view_add_favorites?>"><span id="favorite_span" class="fa fa-heart<?=$class?>"></span></a>
								
								  <span><?=get_result("select count(id) count from new_favorite where url='$url'",$coms_conect);?></span>
							  </div>
										<script>
										$("#add_to_favorite").click(function (e) {
											e.preventDefault();
												$.ajax({
													type:'POST',
													url:'/New_members_ajax.php',
													data:"action=add_to_favorite&id=<?=$url?>",
													success: function(result){
														if(result==0){
															alert('<?=$view_remove_favorite?>');
															$("#favorite_span").toggleClass('fa-heart  fa-heart-o');
														}
														else{
															alert('<?=$view_added_favorite?>');
															$("#favorite_span").toggleClass('fa-heart-o  fa-heart');
														}
													}
												});		
											});
										</script>
						  </div>
						  <div class="col-sm-6 col-xs-12 pull-right ltr social">
								<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$domain_name.$url?>"><span class="fa fa-linkedin-square"></span></a>
								<a href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"><span class="fa fa-twitter-square"></span></a>
								<a href="https://plus.google.com/share?url=<?=$domain_name.$url?>"><span class="fa fa-google-plus-square"></span></a>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>"><span class="fa fa-facebook-square"></span></a>
								<a title='<?=$view_telegram?>' href="https://telegram.me/share/url?url=<?=$domain_name.$url?>"><span class="fa fa-facebook-square"></span></a>
						  </div>
						  	<input type='hidden' name='madual_id' id='madual_id' value="<?=$madual_id?>">
				<img id="waiting" src='/waiting.gif' style="display:none">
				 <div id="show_result" >
				 </div>	
					</div>


									 <div class="col-sm-12 pull-right">
                                            <img class="hvr-grow" src="<?=get_result("SELECT adress FROM new_file_path where id='$madual_id' and type=6 and name='download_pic'",$coms_conect)?>"  alt="<?=$row15['title']?>"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 matnkhabar">
                                          
										  <?$row["text"]=str_replace('img src="source','img src="/source',$row15["text"]);
													$row["text"]=str_replace('<source src="source','<source src="/source',$row["text"]);
													$row["text"]=str_replace('<a href="source','<a href="/source',$row["text"]);
													$row["text"]=str_replace('<a href="news','<a href="/news',$row["text"]);
													$row["text"]=str_replace('<a href="video','<a href="/video',$row["text"]);
													$row["text"]=str_replace('<img src="yep_theme','<img src="/yep_theme',$row["text"]);
													$row["text"]=str_replace('<audio src="source','<audio src="/source',$row["text"]);
													$row["text"]=str_replace('href="source','href="/source',$row["text"]);
													echo $row["text"].'<br>';?>
												
                                        </div>
                                        <div class="col-xs-12 newsdownloaditem">
                                            <!-- portfolio section -->
                                            <div id="portfolio">
                                                <div class="col-md-12 col-sm-12">
                                                    <!-- ISO section -->
                                                    <div class="iso-section">
                                                        <div class="iso-box-section" data-wow-delay="0.6s">
                                                            <div class="iso-box-wrapper col4-iso-box">
																<?$query="SELECT * FROM new_file_path where id='$madual_id' and type=6 and name='download_album'";
																 	$gallery_result = $coms_conect->query($query);
																	while($RSG = $gallery_result->fetch_assoc()) {
																	$adress=$RSG["adress"];?>
                                                                <div class="iso-box html wordpress mobile col-lg-4 col-md-4 col-sm-6">
                                                                    <a href="<?=$adress?>"
                                                                       class="swipebox hvr-glow"><img src="<?=$adress?>" alt="<?=$row15['title']?>"></a>
                                                                </div>
																	<?}?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 newsvideoitem">
										<?$sql2330 = "SELECT adress FROM new_file_path where name='download_movie' and type=6 and id='$madual_id'";
												$result2330 = $coms_conect->query($sql2330);
												$row2330 = $result2330->fetch_assoc();
												if($row2330['adress']){?>
                                            <video id="example_video_1" class="video-js vjs-default-skin" controls
                                                   preload="none" width="100%" height="100%"
                                                   poster="<?=get_modual_address($row2330['adress'])?>"
                                                   data-setup="{}">
                                                <source src="<?=$row2330['adress']?>"
                                                        type='video/mp4'/>
                                                <source src="<?=$row2330['adress']?>"
                                                        type='video/webm'/>
                                                <source src="<?=$row2330['adress']?>"
                                                        type='video/ogg'/>
                                                <track kind="captions" src="demo.captions.vtt" srclang="en"
                                                       label="English"></track>
                                                <!-- Tracks need an ending tag thanks to IE6 -->
                                                <track kind="subtitles" src="demo.captions.vtt" srclang="en"
                                                       label="English"></track>
                                                <!-- Tracks need an ending tag thanks to IE6 -->
                                                <p class="vjs-no-js">To view this video please enable JavaScript, and
                                                    consider upgrading to a web browser that <a
                                                            href="http://videojs.com/html5-video-support/"
                                                            target="_blank">supports HTML5 video</a></p>
                                            </video>
												<?}?>
                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                                سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای
                                                متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                                                درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با
                                                نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان
                                                خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید
                                                داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان
                                                رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات
                                                پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                                        </div>
                                        <div class="col-xs-12 newsinfoitem">
                                            <fieldset>
                                                <legend>اطلاعات دانلود:</legend>
                                                <a href="#report-modal" data-toggle="modal">
                                                    <span class="report-old-version">گزارش انتشار نسخه جدید</span>
                                                </a>

                                                <ul>
                                                    <li>
                                                        <strong>شرکت سازنده:</strong>
                                                        <a target="_blank" rel="nofollow"
                                                           href="http://referless.com/?http://www.functionbay.org/">FunctionBay
                                                            GmbH</a>

                                                    </li>
                                                    <li>
                                                        <strong>حجم فایل:</strong>
		<span itemscope="" itemtype="http://schema.org/SoftwareApplication">
		<span itemprop="fileSize">3046.66 + 1302 مگابایت</span>
		</span><br>


                                                    </li>
                                                    <li>
                                                        <strong>تاریخ انتشار:</strong>
                                                        11:30 - 65/3/16
                                                    </li>
                                                    <li>

                                                        <strong>منبع:</strong> <a href="http://coms.ir" title="دانلود"
                                                                                  target="_blank">آبادیس</a>

                                                    </li>
                                                </ul>
                                            </fieldset>

                                        </div>
                                        <div class="col-xs-12 newsguideitem">
                                            <fieldset>
                                                <legend>راهنمای نصب :</legend>
                                                <p dir="rtl">- با استفاده از راهنمایی های درون فایل Read Me.txt اقدام به
                                                    نصب نرم افزار کنید. <br>- فایل آپدیت آفلاین را دانلود نموده و مطابق
                                                    با راهنمای نصب درون فایل Read Me.txt نرم افزار را به صورت آفلاین
                                                    آپدیت کنید.</p>
                                            </fieldset>

                                        </div>
                                        <div class="col-xs-12 newsatacheitem">
                                            <a role="button" data-toggle="collapse" href="#collapseExample"
                                               aria-expanded="false" aria-controls="collapseExample">
                                                <span class="instruction-expander"><?=$view_download_help?></span>
                                            </a>
                                            <a href="#problem-modal" data-toggle="modal">
                                                <span class="report-link"><?=$dl_report_link?></span>
                                            </a>
                                            <fieldset>
                                                <legend><?=$view_download_link?>:</legend>
                                                <ul>
												<?$sql2343 = "SELECT adress FROM  new_modual_links  WHERE type=6 and  modual_id={$row15['id']}";
												$result2343 = $coms_conect->query($sql2343);
												while($row2333 = $result2343->fetch_assoc()){
												if($row2333['adress']){ 
													$row2333['adress']=str_replace('%20',' ', $row2333['adress']); 
													$attach_temp=explode("/source/",$row2333['adress']);?>
                                                    <li>
                                                        <span><?=$view_dl_attach_files?></span>
                                                        <span class="filesize"><?=format_size(filesize(("source/{$attach_temp[1]}")))?></span>
                                                        <a href="<?=$row2333['adress']?>"><span class="fa fa-cloud-download"></span></a>
                                                    </li>
													<?}
												}?>
                                                </ul>
                                            </fieldset>
										<?=get_result("select text from new_tem_setting where name='download_have_help'  and la='$defult_lang' and site='$defult_site'",$coms_conect);?>
                                        </div>
                                        <div class="col-xs-12 newspassworditem">

                                            <h3>
                                               <?=$dl_upload_pass?> : <?=$row15['password']?>
                                            </h3>

                                        </div>
                                    </div>
                                    <div class="row">
									<?if(get_result("select count(id) from new_mudoal_label where type=6 and id={$row15['id']}",$coms_conect)>0){?>
                                        <div class="col-xs-12 tags">

                                            <fieldset>
                                                <legend><?=$view_tags?></legend>
                                                <ul>
                                                    <?create_label_pishgaman($row15['id'],'download',$madual_lang,$coms_conect,6);?>
                                                </ul>
                                            </fieldset>

                                        </div>
									<?}?>
										<?if(get_result("SELECT b.id FROM new_related_madual a ,new_news b  where page_id='$madual_id' and a.id=b.id  and type=6",$coms_conect)){?>
                                        <div class="col-xs-12 relatedlinks">

                                            <fieldset>
                                                <legend><?=$view_ralated_news?> :</legend>
                                                <ul class="newsrelated">
												<?$query="SELECT b.id,b.title,b.la FROM new_related_madual a ,new_download b  where page_id='$madual_id' and a.id=b.id  and type=6";
													$result = $coms_conect->query($query);
													$totla_related="";$i=1;
													while($mortab = $result->fetch_assoc()){
													 ?>
                                                    <li class="col-md-4 col-xs-12">
                                                        <a href="<?="/download/{$mortab['la']}/{$mortab['id']}/".insert_dash($mortab['title'])?>" style="text-decoration: none">
                                                            <img class="hvr-grow" src="<?=get_result("select adress from new_file_path where name='download_pic' and type=6 and id={$mortab['id']}",$coms_conect)?>">
                                                            <span><?=$mortab['title']?></span>
                                                        </a>
                                                    </li>
													<?}?>
												</ul>
                                            </fieldset>

                                        </div>
										<?}?>
										<?if($row15['can_comment']==1){$low_text= get_tem_result($defult_site,$defult_lang,'low_text',$tem_name,$coms_conect);
											echo $low_text['text'];}
											if($site=='main'&&$row15['can_comment']==1){
											include 'new_dynamics/default/new_modual_comment.php4';
											}else if($site!='main'&&$row15['can_comment']==1)
											include '../new_dynamics/default/new_modual_comment.php4'?>	
		                         </div>
							</section>
                               
                            </div>
                        </section>
                    </article>
               </div>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->
					<?}?>
		 
	 		</aside>
					</section>
 			 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect,$cat_id); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'download_show_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='download_show_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
<script>		
 $(document).ready(function () {
			$("#waiting").show();
			$("#show_result").empty();
			$.ajax({
			type:'POST',
			url:'/New_members_ajax.php',
			data:"action=show_download_ajax&id="+$("#madual_id").val(),
			success: function(result){
			    var a=result.split("~~~");
				$("#waiting").hide();
				$("#show_result").html(a[0]);
				$("#show_relate").html(a[1]);
			}
		});	
});	
</script>		
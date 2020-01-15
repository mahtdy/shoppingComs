<?$query="select a.navication_pic,a.la,a.mudoal_lock,a.source_news,a.source_link_news,a.news_type,a.can_comment,a.date,a.abstract,a.name,title,la,a.id,publish_date,text,view from new_news a where status=1  and la='$madual_lang' and site='$site' and a.id='$madual_id' and publish_date<=$now";
	//echo $query1;
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
?> <!-- Start breadcrumb -->
	<form class="login_form" method="post"  action="/login/<?=$defult_lang?>" >
		<input hidden name="modal_lock_url" value="<?=$url?>">
	</form>	  
<section class="breadcrumb-sec animated fadeIn">
	<div class="container">
		<ol class="breadcrumb rtl">
			<li><a href="/"><span class="fa fa-home"></span></a></li>
			<li  ><a href="/news/<?=$defult_lang?>"><?=$view_news?></a></li>
			<?$cat_id=get_result("select cat_id from new_modules_catogory where type=1 and page_id={$row['id']}",$coms_conect);?> 
			<li class="active"><a href="/news/<?=$defult_lang?>/category/<?=$cat_id?>"><?=get_result("select name from new_modules_cat where  id=$cat_id",$coms_conect);?></a></li>
			<li class="active"><a href="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>"><?=$row['title'] ?></a></li>
		</ol> 
	</div>
</section>   
<?$comment_type=1;
#####
if($site=='main')
include 'new_dynamics/default/new_popup_comment.php4';else
include '../new_dynamics/default/new_popup_comment.php4';?>
<?if($row["navication_pic"]==''){
	$row["navication_pic"]=get_result("select address from new_default_navbar where name='news_nav_picture' and la='$defult_lang' and site='$defult_site'",$coms_conect);	
}
if($row["navication_pic"]>""){?>	
	<!-- Start Slider -->
	<section class="slider pimg animated fadeIn hidden-xs">
	<img src="<?=$row["navication_pic"]?>" alt="<?=$nav_title?>" style="height:<?=$header_nav_heigth?>px">
	</section>
<?}?>				 
			 
			 
			 
<div class="modal fade" id="qazzzzzzzz" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><span class="fa fa-comments-o" style="margin-left: 5px;"></span><?=$view_send_reply_comment?></h4>
			</div>
			<div class="modal-body" style="display: inline-block;">
				<form action="" method="post">
				<input class="inputh" type="hidden" id="rep_comment_id" name="rep_comment_id" >
				<div class="col-md-7 pull-right form-group">
					<input style="text-align: right" name='rep_name' class="form-control" placeholder="<?=$view_name_family?>">
				</div>
				<div class="col-md-7 pull-right form-group">
					 <input style="text-align: right" name='rep_email' class="form-control" placeholder="<?=$view_email?>">
				</div>
				<div class="col-md-12 pull-right form-group">
					  <textarea style="text-align: right" name='rep_comment' class="form-control" rows="5" placeholder="<?=$view_text_comment?>"></textarea>
				</div>
				<div class="col-md-12">
					 <div class="col-md-10 pull-right form-group">
						<input type="text"  class="form-control" name="rep_com1_captcha" placeholder="<?=$view_code_captcha?>">
						<div class="col-md-2 pull-right form-group">
							<img  src="<?crate_capcha_pic($madual_lang)?>" style="margin-top: 5px;height: 23px;"/>
						</div>
					</div>
				</div>
				<div class="col-md-12 pull-right form-group">
					<button type="submit" class="btn btn-success"><?=$view_send?></button>
				</div>	 
			</div>
			<div class="modal-footer">
			</div>
		</div>
   </div>
</div>

<!-- End Page Title -->

<div class="container">
	<main>
	  <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=2 and pages_id=1  and la='$defult_lang'  and status=1";
		
		$result23 = $coms_conect->query($query23);
		$RS23 = $result23->fetch_assoc();
		$center=$RS23['center'];
		if($center=='')$center=12;
		 if(get_modual_setting_result($defult_site,$defult_lang,'news_show_have_ads',$coms_conect))
			 $center=$center-2;
		if($RS23['right_block']>0){
			  echo ' <aside class="col-md-'.$RS23['right_block'].' col-xs-12 pull-right animated fadeIn">
				<section class="block-col">';
				create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect,$cat_id);
			 echo '	</aside>
				</section>';
			}//exit;?>
	 
	   <aside class="col-md-<?=$center?> col-xs-12 pull-right animated fadeIn">
			 <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect,$cat_id);?>
				<?}?>
				<!-- Start Main -->
				<div class="row"> 
				
					<?if(time()>=$_SESSION['count']+2){
						$query1="update new_news set view=view+1 where id='$madual_id'"; 
						$coms_conect->query($query1);
						view_module(1,$coms_conect);
					}
					$_SESSION['count']=time();
					$id=$row['id'];
					
					//echo $row['mudoal_lock'].'cccccc'.$_SESSION["new_okusername"];
					if($row['id']==''){
						include 'new_dynamics/no_modual.php4';
					}else if ($row['mudoal_lock']==1&&$_SESSION["new_okusername"]=='') include 'new_lock_page.php';else{	
						$temp=urlencode($row['title']);?>
						<article class="col-xs-12 pull-right animated fadeIn">
							<section class="content">
								<div class="row">
									<section class="col-md-12 newsitempage">
										<div class="row">
											<div class="col-sm-6 pull-left prl0">
												<?$sql33 = "SELECT adress FROM new_file_path where name='news_image' and type=1 and id='$id'";
												$result33 = $coms_conect->query($sql33);
												$row33 = $result33->fetch_assoc();?>
												<img src="<?if($row33['adress']>"")echo $row33['adress']; else echo '/new_gallery/news.jpg';?>" alt="<?=$row['title']?>"/>
											</div>  
											<div class="col-sm-6 pull-left rtl prl0">
												<h4><?=$row['name']?></h4>
												<h1 itemprop="headline"><a itemprop="url" href=""><?=$row['title']?></a></h1>
												<p class="kholase"><?=$row['abstract']?></p>
											</div>
											 <p class="cat_date pull-right">
											 <span class="fa fa-folder-open"></span>
												<?$cat_news=get_modual_cat(1,$row['id'],$coms_conect); 
												foreach($cat_news as  $key=>$val){
													echo "  <span class='label' style='background-color: #ccc;'><a itemprop='keyword' target='blank' href='/news/$defult_lang/category/{$val['id']}'><span>{$val['name']}</span></a></span>  ";
												}
												?>
												<span class="fa fa-clock-o"></span>
												<span><?=miladitojalalitime(date("Y-m-d ",$row["date"]),$row["la"])?></span>
												
											</p>
											<div class="col-xs-12 tools rtl">
												<div class="col-md-6 col-xs-12 pull-right rtl pr0 social">
													<div class="viewed pull-right">
														<span class="fa fa-eye"></span>
														<span><?=$row['view']?></span>
													</div>
													<div class="ccomment pull-right">
														<a class="scroll" href="#comments" data-toggle="tooltip" title="<?=$view_comments3?>"><span class="fa fa-commenting-o"></span></a>
														<span><?=get_result("select count(id) as count from new_madules_comment   where
														type=1 and madul_id=$madual_id",$coms_conect)?></span>
													</div>
												<?if($_SESSION["new_okusername"]>""){	
														$url=urldecode ($url);$class='';
													if(get_result("select count(id) count from new_favorite where url='$url' and user_name='{$_SESSION["new_okusername"]}'",$coms_conect)>0)
														$class='';
														else 
														$class='-o';?>
											 
                                                <div class="clike pull-right">
                                                    <a href="#" data-toggle="tooltip"  id='add_to_favorite'  title="<?=$view_add_favorites?>"><span id="favorite_span" class="fa fa-heart-o"></span></a>
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
												</div>
													<div id="remove_favorite" class="alert alert-error yepalert yepalert-danger" style="position: fixed;display:none">
													  <button type="button" class="close" data-dismiss="alert">×</button> 
													  <strong></strong> <?=$view_remove_favorite?>
													</div>
													<div id="added_favorite" class="yepalert  yepalert-success  alert" style="position: fixed;display:none">
													  <button type="button" class="close" data-dismiss="alert">×</button> 
													  <strong></strong> <?=$view_added_favorite?>
													</div>											
												<div class="col-md-6 col-xs-12 pull-left ltr social">
													<div class="col-md-6  viewed dropdown pull-left">
														<a id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														اشتراک<span class="fa fa-share-alt"></span>	
														</a>
														<ul class="dropdown-menu" aria-labelledby="dLabel">
															<li class="action facebook">
																<a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>" title="فیسبوک">فیسبوک<span class="fa fa-facebook"></a>
															</li>
															<li class="action gplus">
																<a rel="nofollow" href="https://plus.google.com/share?url=<?=$domain_name.$url?>" title="گوگل پلاس">گوگل‌پلاس<span class="fa fa-google-plus"></a>
															</li>
															<li class="action telegram">
																<a rel="nofollow" href="https://telegram.me/share/url?url=<?=$domain_name.$url?>" title="تلگرام">تلگرام<span class="fa fa-paper-plane"></a>
															</li>
															<li class="action gplus">
																<a rel="nofollow" href="#" title="اینستاگرام">اینستاگرام<span class="fa fa-instagram"></a>
															</li>
															<li class="action twitter">
																<a rel="nofollow" href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"  title="توئیتر ">توئیتر<span class="fa fa-twitter"></a>
															</li>
														</ul>
													
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<?if(get_result("SELECT adress from new_file_path where id='$id'  and type=1 and name='news_gallery'",$coms_conect)){?>
												<div id="myCarousel" class="carousel slide" data-ride="carousel">
													<!-- Indicators -->
													<ol class="carousel-indicators">
													<?$i=0;$sql14 = "SELECT adress from new_file_path where id='$id'  and type=1 and name='news_gallery'";
														$resultd14 = $coms_conect->query($sql14);
														while($row154 = $resultd14->fetch_assoc()){?>
														<li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?if($i==0) echo 'active'?>"></li>
														<?$i++;}?>
													</ol>

													<!-- Wrapper for slides -->
													<div class="carousel-inner" role="listbox">
													<?$i=0;$sql14 = "SELECT adress from new_file_path where id='$id'  and type=1 and name='news_gallery'";
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
											<?$sql2330 = "SELECT adress FROM new_file_path where name='news_video' and type=1 and id='$id'";
												$result2330 = $coms_conect->query($sql2330);
												$row2330 = $result2330->fetch_assoc();
												if($row2330['adress']){?>
											<div class="col-xs-12 newsvideoitem prl0">
												<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="100%" height="100%"
													   poster="/<?=get_news_modual_address($row['id'],$coms_conect)?>" 
													   data-setup="{}">
													<source src="<?=$row2330['adress']?>" type='video/mp4' />
													<track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
													<track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
													<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
												</video>
											</div>
												<?}?>
											 <?$sql233 = "SELECT adress FROM new_file_path where name='news_sound' and type=1 and id='$id'";
												$result233 = $coms_conect->query($sql233);
												$row233 = $result233->fetch_assoc();
												if($row233['adress']){?>
											
											<div class="col-xs-12 newsaudioitem prl0"> 
												<audio src="<?=$row233['adress']?>"/>
											</div>
												<?}?>
											<div itemprop="articlebody" class="col-xs-12 matnkhabar prl0">
												<p><?$row["text"]=str_replace('src="source','src="/source',$row["text"]);
												$row["text"]=str_replace('img src="source','img src="/source',$row["text"]);
													$row["text"]=str_replace('<source src="source','<source src="/source',$row["text"]);
													$row["text"]=str_replace('<a href="source','<a href="/source',$row["text"]);
													$row["text"]=str_replace('<a href="news','<a href="/news',$row["text"]);
													$row["text"]=str_replace('<a href="video','<a href="/video',$row["text"]);
													$row["text"]=str_replace('<img src="yep_theme','<img src="/yep_theme',$row["text"]);
													$row["text"]=str_replace('<audio src="source','<audio src="/source',$row["text"]);
													$row["text"]=str_replace('<video ','<video width="100%" height="100%"',$row["text"]);
													$row["text"]=str_replace('href="source','href="/source',$row["text"]);
													echo $row["text"].'<br>';
													$temp= str_split($row['news_type'],4);
													if($temp[1]==1)$erjaei="<a rel='nofollow' target='_blank' href='{$row['source_link_news']}'>{$row['source_news']}</a>";
													else $erjaei=$row['source_news']; 
													if($erjaei) echo  "$view_source_news ".$erjaei;
													 ?>
												</p>
											</div>
											<?$sql2343 = "SELECT adress FROM new_file_path where name='news_attach' and type=1 and id='$id'";
												$result2343 = $coms_conect->query($sql2343);
												$row2333 = $result2343->fetch_assoc();
												if($row2333['adress']){?>
											<div class="col-xs-12 newsatacheitem prl0">
												<fieldset>
													<legend><?=$view_attach_files?></legend>
													<ul class="pr10">
														<li><?$row2333['adress']=str_replace('%20',' ', $row2333['adress']);?>
														<?$attach_temp=explode("/source/",$row2333['adress']);?>
															 <a href="<?=$row2333['adress']?>"><span><?=$view_dl_attach_files?></span>
																<span class="filesize"><?=format_size(filesize(("source/{$attach_temp[1]}")))?></span>
														   <span class="fa fa-cloud-download"></span></a>
														</li>
														
													 </ul>
												</fieldset>
											</div>
												<?}?> 
										</div>
										<div class="row">
										<?if(get_result("select count(id) from new_mudoal_label where type=1 and id={$row['id']}",$coms_conect)>0){?>
											<div class="col-xs-12 tags prl0">
												<fieldset>
													<legend><?=$view_tags?></legend>
													<ul class="pr10">
														<?create_label_pishgaman($row['id'],'news',$madual_lang,$coms_conect,1);?>
													</ul>
												</fieldset>
												
											</div>
											<?}?>	
											<?if(get_result("SELECT b.id FROM new_related_madual a ,new_news b  where page_id='$madual_id' and a.id=b.id  and type=1",$coms_conect)){?>
												<div class="col-xs-12 relatedposts prl0">
													<fieldset>
														<legend><?=$view_ralated_news?></legend>
														<ul class="newsrelated pr10">
														<?$query="SELECT b.id,b.title,b.date,news_type,b.la FROM new_related_madual a ,new_news b  where page_id='$madual_id' and a.id=b.id  and type=1";
															 $icon_array=array("fa-newspaper-o","fa-play-circle-o","fa-pencil-square-o","fa-youtube-play","fa-camera");
															$news_type_array=array("10001","10010","10000","10100","11000");
															$result = $coms_conect->query($query);
															$totla_related="";$i=1;
															while($mortab = $result->fetch_assoc()){
															 ?>
															<li>
																<a href="<?="/news/{$mortab['la']}/{$mortab['id']}/".insert_dash($mortab['title'])?>">
																	<span class="fa <?=$icon_array[array_search($mortab['news_type'],$news_type_array)]?>"></span>
																	<span><?=$mortab['title']?></span>
																	<span class="datepublish"><?=miladitojalaliuser(date('Y-m-d',$mortab["date"]),$mortab["la"])?></span> 
																</a>
															</li>
															<?}?>
														</ul>
													</fieldset>
												</div>
											<?}?>
											<?if($row['can_comment']==1){$low_text= get_tem_result($defult_site,$defult_lang,'low_text','default',$coms_conect);
												echo $low_text['text'];}?>
											<?if($site=='main'&&$row['can_comment']==1){
												include 'new_dynamics/default/new_modual_comment.php4';
											}else if($site!='main'&&$row['can_comment']==1)
												include '../new_dynamics/default/new_modual_comment.php4'?>	
										</div>
									</section>
								<section class="col-md-3 sidebar">
								</section>
								</div>
							</section>
						</article>
					<?}?>
				</div>
			</section>
		</aside>
	 	 <?if($RS23['left_block']>0){ 
			  echo ' <aside class="col-md-'.$RS23['left_block'].' col-xs-12 pull-right animated fadeIn">
				<section class="block-col">';
				create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect,$cat_id); 
				echo '	</aside>
				</section>';
		}?>
		 <?if(get_modual_setting_result($defult_site,$defult_lang,'news_show_have_ads',$coms_conect)){?>
				<aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
					<section class="block-col">
						<div class="block">
							<div class="content ads-col">
								<?$query="select title,link,pic_adress from new_tem_setting where name='news_show_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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

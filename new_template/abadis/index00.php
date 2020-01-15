<? if($defult_site=='main'){ 
include ("new_template/$tem_name/blocks/header.php4");
}
else
include ("../new_template/$tem_name/blocks/header.php4");
$dir="rtl"; 
$_SESSION['site']=$site;
$_SESSION['la']=$la;
?> 
<!-- Start slideshow -->
<div class="container-fluid slider">
    <div id="preloader">
        <div id="status"></div>
    </div>
    <div id="carousel">
        <!--
                IMPORTANT - This carousel can have a special class for a smooth transition "gsdk-transition". Since javascript cannot be overwritten, if you want to use it, you can use the bootstrap.js or bootstrap.min.js from the GSDKit or you can open your bootstrap.js file, search for "emulateTransitionEnd(600)" and change it with "emulateTransitionEnd(1200)"
        -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner">
					<?$query="SELECT * FROM new_slideshow where la='$defult_lang' and site='$defult_site' and 
					start_date<=$now and finish_date>=$now order by id desc limit 0,10";
					$result = $coms_conect->query($query);
					$i=1;
					 
					while($RS1 = $result->fetch_assoc()) {
						$slide_img1=$RS1["slide_img1"]; 
						$temp=urlencode($RS1["title"]);
						if($i==1||$i==6){?>
							<div class="item <?if($i==1) echo 'active';?>">
						<?} 
						if($i==1||$i==4||$i==6||$i==9){?>
							<div class="col-lg-3 col-xs-12 side-slide">
								<div class="col-xs-12 side-slide2">
									
						<?}if($i==2||$i==5||$i==7||$i==10||$i==1||$i==4||$i==6||$i==9){?>
								<div class="col-xs-12 side-slide3 effect-lily">									
						<?}?>
						<?if($i==3||$i==8){?>
							 <div class="col-lg-6 col-xs-12 main-slide effect-lily">							
						<?}?>
						 <a href="<?=$RS1["link"]?>">
							<img alt="<?=$RS1["title"]?>" src="<?=$RS1["slide_img1"]?>">
							<div class="text-box">
								<div class="information">
									<h2><span class="information-head">
					     		<?=$RS1["title"]?>

								</span> <br>

									<?=$RS1["text1"]?>

									</h2>
									<p class="icon-links">
													<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$domain_name.$RS1["link"]?>"><span class="fa fa-linkedin-square"></span></a>
													<a href="http://twitter.com/intent/tweet?url=<?=$domain_name.$RS1["link"]?>&text=<?=$temp?>"><span class="fa fa-twitter-square"></span></a>
													<a href="https://plus.google.com/share?url=<?=$domain_name.$RS1["link"]?>"><span class="fa fa-google-plus-square"></span></a>
													<a href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$RS1["link"]?>&t=<?=$temp?>"><span class="fa fa-facebook-square"></span></a>
													<a title='تلگرام' href="https://telegram.me/share/url?url=<?=$domain_name.$RS1["link"]?>"><span class="fa fa-paper-plane"></span></a>
									</p>
								</div>
							</div>
						</a>
						<? if($i==3||$i==8){?>
							</div>
						
						<?}if($i==2||$i==5||$i==7||$i==10||$i==1||$i==4||$i==6||$i==9){?>
							</div>
						 
						<?}if($i==2||$i==5||$i==7||$i==10){	?>
							</div>								
							</div>								
						 							
						<?}if($i==5||$i==10){?>
						</div>	
						
						<?}?>
					<?$i++;}?>  
					</div>
					 

            <!-- Controls -->
            <a class="left carousel-control arrow-1" href="#carousel-example-generic" data-slide="prev">
                <span class="fa fa-angle-left"></span>
            </a>
            <a class="right carousel-control arrow-2" href="#carousel-example-generic" data-slide="next">
                <span class="fa fa-angle-right"></span>
            </a>
        </div>
    </div> <!-- end carousel -->
    </div>

<!-- Start icons part -->
<div class="container-fluid icons">
    <div class="icons-list col-xs-12">
		<?for($i=1;$i<=12;$i++){
			 $under_slideshow_link= get_tem_result($site,$la,"under_slideshow_link$i",$tem_name,$coms_conect);
			if($under_slideshow_link['title']>""){?>
				<div class="col-md-1 col-xs-4 menu-icons border">
					<a href="<?=$under_slideshow_link['link']?>">
						<i class="fa <?=$under_slideshow_link['pic_adress']?>"></i>
						<p>
							<?=$under_slideshow_link['title']?>
						</p>
					 </a>
				</div>
			<?}
		}?>
 
 
    </div>
</div>
<!-- Start main content -->
<section class="container">
    <div class="news col-md-9 col-xs-12 pull-right">
        <div class="row sr-main-news col-xs-12">
            <ul class="pl0 gridshow">
            <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                <a href="#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                <h4>روتیتر نمونه برای این عنوان</h4>
                <a href="#"><h3 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3></a>

                <p><span class="fa fa-clock-o"></span> ddddddd14 مهر 1393<span class="fa fa-eye" style="margin-right: 10px;"></span> 365نفر</p>
            </li>
            <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                    <a href="#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                    <h4>روتیتر نمونه برای این عنوان</h4>
                    <a href="#"><h3 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3></a>

                    <p><span class="fa fa-clock-o"></span> 14 مهر 1393<span class="fa fa-eye" style="margin-right: 10px;"></span> 365نفر</p>
                </li>
            <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                    <a href="#" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                    <h4>روتیتر نمونه برای این عنوان</h4>
                    <a href="#"><h3 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</h3></a>

                    <p><span class="fa fa-clock-o"></span> 14 مهر 1393<span class="fa fa-eye" style="margin-right: 10px;"></span> 365نفر</p>
                </li>
            </ul>
        </div>
        <div class="heading">
            <h2>مطالب جدید</h2>
        </div>
        <hr>
        <div class="content">
			<?$query="select view,mudoal_lock,adress,abstract,a.name,title,la,a.id,publish_date from new_news a ,new_file_path b where
			 b.name='news_image'  and status=1 and b.type=1 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' and publish_date<='$now'
		 	group by a.id  order by a.id desc limit 0,5";
		 	 $result = $coms_conect->query($query);
			 while($row = $result->fetch_assoc()) {?>
            <div class="news-media">
                <div class="row news_item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                        <div class="photo">
                            <figure> 
                                <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" class="hvr-grow">
								<img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                        <div class="text">
                            <h6>
                                <span class="sr-news-field">
								<?$new_cat_id=get_result("select a.id from new_modules_cat a,new_modules_catogory b where a.type=1 and b.type=1 and a.id=b.cat_id and b.page_id={$row['id']} and a.status=1",$coms_conect);?>
								<a href="<?="/news/{$row['la']}/cat_id/$new_cat_id"?>">
                                   <?=get_result("select a.name from new_modules_cat a,new_modules_catogory b where a.type=1 and b.type=1 and a.id=b.cat_id and b.page_id={$row['id']} and a.status=1",$coms_conect)?>
                                </a> </span>
                                |
                                <span class="sr-news-name"><a href="#">
                                    مهدی آذربایجانی
                                </a></span>
                                |

                                <span class="sr-news-date">
                                   <?=miladitojalaliuser(date("Y-m-d ",$row['publish_date']),$row['la'])?>
                                </span>
                                <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" class="pull-left">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                   <?=get_result("select count(id) from new_madules_comment where type=1 and status=1 and madul_id={$row['id']}",$coms_conect)?>
                                    </span>
                                </a>

                            </h6>
                            <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><h3><?=$row['title']?></h3></a>
                            <p><?=$row['abstract']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
			<?}?>
            </div>
        <div class="advertisement-img">
		<?for($i=1;$i<=2;$i++){
			 $news_ads= get_tem_result($site,$la,"news_ads$i",$tem,$coms_conect);?>
			<a href="<?=$news_ads['link']?>">			
            <img title="<?=$news_ads['title']?>" alt="<?=$news_ads['title']?>" class="first-content-img<?=$i?> col-xs-12" src="<?=$news_ads['pic_adress']?>">
			</a>
		<?}?>
        </div>
        <hr>
        <div class="content">
 			<?$query="select view,mudoal_lock,adress,abstract,a.name,title,la,a.id,publish_date from new_news a ,new_file_path b where
			 b.name='news_image'  and status=1 and b.type=1 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' and publish_date<='$now'
		 	group by a.id  order by a.id desc limit 6,11";
		 	 $result = $coms_conect->query($query);
			 while($row = $result->fetch_assoc()) {?>
            <div class="news-media">
                <div class="row news_item">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                        <div class="photo">
                            <figure> 
                                <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" class="hvr-grow">
								<img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                            </figure>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                        <div class="text">
                            <h6>
                                <span class="sr-news-field">
								<?$new_cat_id=get_result("select a.id from new_modules_cat a,new_modules_catogory b where a.type=1 and b.type=1 and a.id=b.cat_id and b.page_id={$row['id']} and a.status=1",$coms_conect);?>
								<a href="<?="/news/{$row['la']}/cat_id/$new_cat_id"?>">
                                   <?=get_result("select a.name from new_modules_cat a,new_modules_catogory b where a.type=1 and b.type=1 and a.id=b.cat_id and b.page_id={$row['id']} and a.status=1",$coms_conect)?>
                                </a> </span>
                                |
                                <span class="sr-news-name"><a href="#">
                                    مهدی آذربایجانی
                                </a></span>
                                |

                                <span class="sr-news-date">
                                   <?=miladitojalaliuser(date("Y-m-d ",$row['publish_date']),$row['la'])?>
                                </span>
                                <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" class="pull-left">
                                    <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                   <?=get_result("select count(id) from new_madules_comment where type=1 and status=1 and madul_id={$row['id']}",$coms_conect)?>
                                    </span>
                                </a>

                            </h6>
                            <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><h3><?=$row['title']?></h3></a>
                            <p><?=$row['abstract']?></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
			<?}?>
        </div>
        <div class="col-xs-12 homeprefix_update_moreitems">
            <div class="line"></div>
            <p>
                <a href="/news/<?=$defult_lang?>">
                    <span class="fa fa-plus"></span>
                </a>
            </p>
        </div>
    </div>
    <div class="sidebar news col-md-3 col-xs-12">
        <div class="dictionary col-xs-12">
            <div id="carousel-example-generic1" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
				<?for($i=0;$i<=7;$i++){
						$unser_slideshow_ads= get_tem_result($site,$la,"unser_slideshow_ads$i",$tem,$coms_conect);
						if($unser_slideshow_ads['title']){?>
                    <li data-target="#carousel-example-generic1" data-slide-to="<?=$i?>" class="<?if($i==0) echo 'active';?>"></li>
					<?}
				}?>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
					<?for($i=0;$i<=7;$i++){
						$unser_slideshow_ads= get_tem_result($site,$la,"unser_slideshow_ads$i",$tem,$coms_conect);
						if($unser_slideshow_ads['title']){?>
						<div class="item <?if($i==1) echo 'active';?>">
							<a href="<?=$unser_slideshow_ads['link']?>">
							<img title="<?=$unser_slideshow_ads['title']?>" src="<?=$unser_slideshow_ads['pic_adress']?>" alt="<?=$unser_slideshow_ads['title']?>">
							</a>
							<div class="carousel-caption">
							   ...
							</div>
						</div>
						<?}
					}?>
                </div>

                <!-- Controls -->
                <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
        <div class="notes col-xs-12">
            <h3>
			<?$news_setting_under_ads= get_tem_result($site,$la,"news_setting_under_ads",$tem,$coms_conect);
			  echo get_result("SELECT name FROM  new_modules_cat   where id={$news_setting_under_ads['text']}",$coms_conect);
			?>
		
            </h3>
            <ul>
			<?$query1="select  a.user_id,a.name,a.publish_date,a.la,a.title,a.id  from new_news a ,new_file_path b, new_modules_catogory c
				where c.type=1 and a.id=c.page_id and c.cat_id='{$news_setting_under_ads['text']}' and  b.name='news_image'  and site='$site' and la='$la' and status=1 and b.type=1 and a.id=b.id  and publish_date<='$now'
				group by b.id order by a.id desc limit 0,5";
				$result1 = $coms_conect->query($query1);
				 //echo $query1;
					while($row1 = $result1->fetch_assoc()) {
		 
			?>
                <li class="notes-news">
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="<?="/news/{$row1['la']}/{$row1['id']}/".insert_dash($row1['title'])?>" class="hvr-grow">
							 	<?$pic_adress=get_result("select avatar from new_managers where id={$row1['user_id']}",$coms_conect);?>
								<img src="<?=get_user_avatar($pic_adress)?>" ></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="<?="/news/{$row1['la']}/{$row1['id']}/".insert_dash($row1['title'])?>"><h4><?=$row1['title']?></h4></a>
                            <a href="<?="/news/{$row1['la']}/{$row1['id']}/".insert_dash($row1['title'])?>">
                                <p>
                                    <?=get_result("select user_name from new_managers where id={$row1['user_id']}",$coms_conect);?>
                                </p>
                            </a>
                            <p><?=miladitojalalitime(date('Y-m-d',$row1['publish_date']))?></p>
                        </div>
                    </div>
                </li>
				<?}?>
            </ul>
            <a href="<?="/news/$la/cat_id/{$news_setting_under_ads['text']}"?>" class="sidebar-plus">
                <span class="fa fa-plus"></span>
            </a>

        </div>
        <div class="advertisement col-xs-12">
			<?for($i=1;$i<=8;$i++){
							$ads_left_side= get_tem_result($site,$la,"ads_left_side_pic$i",$tem,$coms_conect);
				if($ads_left_side['title']>""){?>
				<a href="<?=$ads_left_side['link']?>">
					<img alt="<?=$ads_left_side['title']?>" title="<?=$ads_left_side['title']?>" src="<?=$ads_left_side['pic_adress']?>">
				</a>
				<?}
			}?>	
        </div>
        <div class="newest-news col-xs-12">
            <div class="header-newest-news">
                <h3>
                    پر بازدید ترین مطالب
                </h3>
            </div>
            <ul>
			<?$query1="select  a.name,a.title,b.adress,a.la,a.id from new_news a,new_file_path b 
				where    a.site='$site' and a.la='$la' and a.status=1 and b.type=1 and a.id=b.id and b.name='news_image'   and a.publish_date<=now()  
				 order by a.view desc limit 0,5";
				$result1 = $coms_conect->query($query1);
					while($rowe1 = $result1->fetch_assoc()){?>
                <li class="col-md-12 col-sm-12 griditem animated fadeIn newest-news-border">
                    <a href="<?="/news/{$rowe1['la']}/{$rowe1['id']}/".insert_dash($rowe1['title'])?>" class="hvr-grow">
					<img src="<?=get_modual_pic_address($rowe1['adress'],$site,$domain,1)?>"></a>
                    <h5><?=$rowe1['name']?></h5>
                    <a href="<?="/news/{$rowe1['la']}/{$rowe1['id']}/".insert_dash($rowe1['title'])?>"><h4 id="gridtitr1" class="gridtitrlc"><?=$rowe1['name']?></h4></a>

                </li>
					<?}?>
 
            </ul>
            <a href="/news/<?=$defult_lang?>" class="sidebar-plus">
                <span class="fa fa-plus"></span>
            </a>
        </div>
    </div>
</section>
<!-- Start First parallex -->
<div class="container-fluid main-product">
        <div class="main-product-data container">
            <div class="main-product-title col-xs-12">
                <h2>
                   آخرین گالری تصاویر
                </h2>
            </div>
				<?$queryw1="select  a.album_type,a.la,a.title,a.id,b.adress from new_gallery a ,new_file_path b 
					where b.name='galery_pic'  and site='$site' and la='$la' and status=1 and b.type=9 and a.id=b.id  
					group by b.id order by a.id desc limit 0,4";
					$resultw1 = $coms_conect->query($queryw1);
					 //echo $queryw1;
					while($rows3s = $resultw1->fetch_assoc()) {?>
				<div class="col-md-3 col-xs-12 sub-section video-section">
					<a href="/gallery/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow">
						<img src="<?=get_gallery_thumbnail($rows3s['adress'],$rows3s['album_type'])?>">
						<h5><?=$rows3s['title']?></h5>
					</a>
				</div>
				<?}?>
        </div>
</div>
<!-- Start second content -->
<section class="container second-content">
    <div class="news col-md-9 col-xs-12 pull-right">
	
	<?$gallery_cat= get_tem_result($site,$la,"gallery_cat",$tem,$coms_conect);
		$queryw1="select  a.deatils,a.album_type,a.la,a.title,a.id,b.adress from new_gallery a ,new_file_path b,new_modules_catogory c 
		where b.name='galery_pic'  and site='$site' and la='$la' and status=1 and b.type=9 and a.id=b.id
		and c.type=9 and a.id=c.page_id and c.cat_id='{$gallery_cat['text']}'	
		group by c.page_id order by a.id desc limit 0,4";
		$resultw1 = $coms_conect->query($queryw1);
		while($rows3s = $resultw1->fetch_assoc()) {?>
	        <div class="news-media">
            <div class="row news_item">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right rtl">
                    <div class="photo">
                        <figure>
                            <a href="/gallery/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow"><img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/post1.jpg"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 pull-right rtl">
                    <div class="text">
                        <h6>
							<span class="sr-news-field">
								<?$new_cat_id=get_result("select a.id from new_modules_cat a,new_modules_catogory b where a.type=9 and b.type=9 and a.id=b.cat_id and b.page_id={$rows3s['id']} and a.status=1",$coms_conect);?>
								<a href="<?="/news/{$rows3s['la']}/cat_id/{$gallery_cat['text']}"?>">
                                   <?=get_result("select a.name from new_modules_cat a,new_modules_catogory b where a.type=9 and b.type=9 and a.id=b.cat_id and b.page_id={$rows3s['id']} and a.status=1",$coms_conect)?>
                                </a> </span>
                                |
                                <span class="sr-news-name"><a href="#">
                                    مهدی آذربایجانی
                                </a></span>
                                |

                                <span class="sr-news-date">
                                   <?=miladitojalaliuser(date("Y-m-d ",$rows3s['publish_date']),$rows3s['la'])?>
                                </span>
                            <a href="/gallery/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="pull-left">
                                <img src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/img/tooltip.png">
                                    <span class="comment-number">
                                     <?=get_result("select count(id) from new_madules_comment where type=9 and status=1 and madul_id={$rows3s['id']}",$coms_conect)?>
                                    </span>
                            </a>

                        </h6>
                        <a href="/gallery/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>"><h3><?=$rows3s['title']?></h3></a>
                        <p><?=$rows3s['deatils']?></p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
					<?}?>
       
        <div class="col-xs-12 homeprefix_update_moreitems">
            <div class="line"></div>
            <p>
                <a href="/gallery/<?=$defult_lang?>">
                    <span class="fa fa-plus"></span>
                </a>
            </p>
        </div>

    </div>

    <div class="sidebar col-md-3 col-xs-12">
        <div class="advertisement-2 col-xs-12">
		<?for($i=1;$i<=6;$i++){
			$ads_under_gallery= get_tem_result($site,$la,"ads_under_gallery$i",$tem,$coms_conect);
			if($ads_under_gallery['pic_adress']>""){?>
            <a href="<?=$ads_under_gallery['link']?>">
            <img alt="<?=$ads_under_gallery['title']?>" title="<?=$ads_under_gallery['title']?>" src="<?=$ads_under_gallery['pic_adress']?>">
            </a>
			<?}
		}?>	
        </div>
        <div class="training col-xs-12">
            <h3>
               پربازدیدترین مطالب
            </h3>
            <ul>
			<?$query1="select  a.title,a.site,a.la,a.id,b.adress from new_news a,new_file_path b
				where    site='$site' and la='$la' and status=1   and publish_date<=now()  
				and b.type=1 and a.id=b.id and b.name='news_image'
				group by b.id
				 order by a.view desc limit 0,5";
				// echo $query1;
				$result1 = $coms_conect->query($query1);
					while($rowe1 = $result1->fetch_assoc()){?>
                <li>
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <figure>
                                <a href="/news/<?="{$rowe1['la']}/{$rowe1['id']}".insert_dash($rowe1['title'])?>" class="hvr-grow">
								<img src="<?=get_modual_pic_address($rowe1['adress'],$rowe1['site'],$domain,1)?>"></a>
                            </figure>
                        </div>
                        <div class="col-md-8 pull-right pr0">
                            <a href="/news/<?="{$rowe1['la']}/{$rowe1['id']}".insert_dash($rowe1['title'])?>"><h4><?=$rowe1['title']?></h4></a>

                            <p>   <?=miladitojalaliuser(date("Y-m-d ",$rowe1['publish_date']),$rowe1['la'])?></p>
                        </div>
                    </div>
                </li>
 
			<?}?>
            </ul>
            <a href="<?="/news/$defult_lang"?>" class="sidebar-plus">
                <span class="fa fa-plus"></span>
            </a>

        </div>


    </div>

</section>
<!-- Start video tab -->
<div class="container top-news">
    <div class="tab-content rtl">

        <div id="maintab1" class="tab-pane main_tab-pane fade in active">


            <ul class="nav nav-tabs nav-justified rtl sub_tabs_nav">
			<?for($i=1;$i<=10;$i++){
					$video_cat= get_tem_result($site,$la,"video_cat$i",$tem,$coms_conect);
					if($video_cat['text']>""){?>
                <li class="<?if($i==1)echo 'active'?>"><a data-toggle="tab" href="#sub_g1_tab<?=$i?>"><?=get_result("select name from new_modules_cat  where id={$video_cat['text']}",$coms_conect)?></a></li>
			<?}}?>
 
            </ul>


            <div class="tab-content rtl">
			<?for($i=1;$i<=10;$i++){
					$video_cat= get_tem_result($site,$la,"video_cat$i",$tem,$coms_conect);
					if($video_cat['text']>""){?>	
			    <div id="sub_g1_tab<?=$i?>" class="tab-pane sub_tab-pane fade in <?if($i==1)echo 'active'?>">
                    <div class="top-news-data">
					<?$queryw1="select a.duration,b.adress, a.title ,a.la,a.id from new_video a  ,new_file_path b ,new_modules_catogory c
						where   b.name='video_videos'  and site='$site' and la='$la' and status=1 and b.type=8 and a.id=b.id
						and a.id=c.page_id and c.type=8 and c.cat_id={$video_cat['text']}
						group by c.page_id
						order by a.id desc limit 0,4";
						$result1 = $coms_conect->query($queryw1);
						while($rowss = $result1->fetch_assoc()) {?>
                        <div class="col-md-3 col-xs-12 sub-section video-section">
                            <a href="/video/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>" class="hvr-grow">
                                <span class="video-play-btn">
                                       <i class=".sr-play-btn fa fa-play" aria-hidden="true"></i>
                                </span>

                                <img src="<?=get_modual_address($rowss['id'],$coms_conect)?>">
                            </a>
                            <span class="video-duration"><?=$rowss['duration']?></span>
                            <h5><?=$rowss['title']?></h5>
                            <a href="/video/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>">
							<!--h4 id="gridtitr1" class="gridtitrlc">لورم ایپسوم متن ساخت تولید سادگی نامفهوم از صنعت چاپ</h4></a-->
                        </div>
						<?}?>
                    </div>
                    <div class="col-xs-12 homeprefix_update_moreitems">
                        <div class="line"></div>
                        <p>
                            <a href="/<?="video/$defult_lang/cat_id/{$video_cat['text']}"?>">
                                <span class="fa fa-plus"></span>
                            </a>
                        </p>
                    </div>
                </div>
			<?}}?>
 


                </div>

            </div>



        </div>
        </div>
<!-- Start second parallex -->
<?$ads_up_fotter= get_tem_result($site,$la,"ads_up_fotter",$tem,$coms_conect);?>
<div class="container services " style="background-image:url('<?=$ads_up_fotter['pic_adress']?>')">
    <div class="sr-services-text">
        <h2>
       <?=$ads_up_fotter['text']?>
        </h2>
        <button onclick="window.location='<?=$ads_up_fotter['link']?>'" type="button" class=" btn-danger sr-services-button">
           <?=$ads_up_fotter['title']?>
        </button>
    </div>
</div>
<?if($defult_site=='main'){ 
include ("new_template/$tem_name/blocks/footer.php4");
}
else
include ("../new_template/$tem_name/blocks/footer.php4");

?>
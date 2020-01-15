         <!-- Filehaye safhe------------------------------------------------------------------>
        <link rel="stylesheet" type="text/css" href="css/select2/select2.min.css">
        <!-- Filehaye safhe------------------------------------------------------------------> 
		<section class="slider pimg animated fadeIn hidden-xs">
            <img src="img/slider1.jpg">
        </section>

        <!-- Start breadcrumb -->
        <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="/"><span class="fa fa-home"></span></a></li>
                    <li class="active">دانلود</li>
                </ol>
            </div>
        </section>


        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-youtube-play"></span>

                <h1 class="title">دانلود</h1>
                <span class="pdesc">توضيح مختصر درباره اين صفحه در اينجا نمايش داده مي شود.</span>

            </div>
        </div>
        <!-- End Page Title -->


        <div class="container">
            <main>
                <!-- Start Main -->
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=4 and pages_id=6";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'download_sesrch_have_ads',$coms_conect))
				 $center=$center-2;
			?>
				<div class="col-md-<?=$RS23['right_block']?> pull-right rtl pr0">
					<?if($RS23['right_block']>0){
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'r',$coms_conect);
					}//exit;?>
				</div>
				<div class="col-md-<?=$center?> pull-right rtl pr0">
				<?if($RS23['center']>0){
					create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'c',$coms_conect);
				}?>
                <div class="row gridgallery">
<!--cat_select_search_show Start-->
                    <div class="col-xs-12 cat_select_search_show row rtl">

                        <div class="col-md-4 col-sm-6 col-xs-12 form-group pull-right cat_select">
                            <h4><span class="fa fa-folder-open"></span>انتخاب موضوع:</h4>
                            <select class="cat-select" multiple="multiple" style="width: 100%;">
                                <option value="a">فرهنگي</option>
                                <option value="b">اجتماعي</option>
                                <option value="c">سياسي</option>
                                <option value="d">اقتصادي</option>
                            </select>
                        </div>

                        <div class="col-md-8 col-sm-6 col-xs-12 form-group pull-right cat_search row">
                            <h4><span class="fa fa-search"></span>جستجو:</h4>
                            <div class="col-xs-8 form-group pull-right">

                                <input class="form-control" type="text"/>
                            </div>
                            <div class="col-xs-4 form-group pull-right pr0">
                                <button type="button" class="form-control btn btn-success"><span class="fa fa-search"></span></button>
                            </div>


                        </div>

                    </div>
<!--cat_select_search_show End-->

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="#">
                                <figure>
                                    <img src="img/gl1.jpg" alt="">
                                    <figcaption>لورم ايپسوم متن ساختگي با توليد سادگي نامفهوم از صنعت چاپ و با استفاده
                                        از طراحان گرافيک است.
                                    </figcaption>
                                    <div class="playerbt"><span class="fa fa-youtube-play"></span></div>
                                </figure>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="#">
                                <figure>
                                    <img src="img/gl2.jpg" alt="">
                                    <figcaption>لورم ايپسوم متن ساختگي با توليد سادگي نامفهوم از صنعت چاپ و با استفاده
                                        از طراحان گرافيک است.
                                    </figcaption>
                                    <div class="playerbt"><span class="fa fa-youtube-play"></span></div>
                                </figure>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="#">
                                <figure>
                                    <img src="img/gl3.jpg" alt="">
                                    <figcaption>لورم ايپسوم متن ساختگي با توليد سادگي نامفهوم از صنعت چاپ و با استفاده
                                        از طراحان گرافيک است.
                                    </figcaption>
                                    <div class="playerbt"><span class="fa fa-youtube-play"></span></div>
                                </figure>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="#">
                                <figure>
                                    <img src="img/gl4.jpg" alt="">
                                    <figcaption>لورم ايپسوم متن ساختگي با توليد سادگي نامفهوم از صنعت چاپ و با استفاده
                                        از طراحان گرافيک است.
                                    </figcaption>
                                    <div class="playerbt"><span class="fa fa-youtube-play"></span></div>
                                </figure>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="#">
                                <figure>
                                    <img src="img/gl5.jpg" alt="">
                                    <figcaption>لورم ايپسوم متن ساختگي با توليد سادگي نامفهوم از صنعت چاپ و با استفاده
                                        از طراحان گرافيک است.
                                    </figcaption>
                                    <div class="playerbt"><span class="fa fa-youtube-play"></span></div>
                                </figure>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right oh">
                        <div class="item">
                            <a href="#">
                                <figure>
                                    <img src="img/gl6.jpg" alt="">
                                    <figcaption>لورم ايپسوم متن ساختگي با توليد سادگي نامفهوم از صنعت چاپ و با استفاده
                                        از طراحان گرافيک است.
                                        <strong>22:54</strong>
                                    </figcaption>
                                    <div class="playerbt"><span class="fa fa-youtube-play"></span></div>
                                </figure>
                            </a>
                        </div>
                    </div>


                    <div class="col-xs-12 moreitemsbtn">
                        <h4>
                            <a href="#"><span class="fa fa-plus"></span></a>
                        </h4>
                    </div>


                </div>
                </div>
					 
                    <!-- Start Left Sidebar -->
			<div class="col-md-<?=$RS23['left_block']?> pull-right rtl pr0">
				 <?if($RS23['left_block']>0){
					 create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'l',$coms_conect);
				 }?>
			</div>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'download_sesrch_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='download_sesrch_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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



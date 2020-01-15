 <?if($madual_page_id=='')
	$madual_page_id=1;
$paging=($madual_page_id*9)-8;
	?>
 
	 <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="/"><span class="fa fa-home"></span></a></li>
                    <li><span class=" active"><?=$view_article_list_sub?>  
                     <span class=" active"><?= get_result("select name from new_modules_cat where id='$madual_cat_id'",$coms_conect)?></span></li>
					</li>
                </ol>
            </div>
        </section>
 


        <div class="container">
            <main>
                <!-- Start Main -->
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=3 and pages_id=7";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'article_cat_have_ads',$coms_conect))
				 $center=$center-2;
			if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect,$madual_cat_id);
					 echo '	</aside>
						</section>';
					}//exit;?>
			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect,$madual_cat_id);?>
				<?}?>
               
					<article class="col-md-12 col-sm-8 pull-right animated fadeIn">
                        <!--tag_result_show Start-->
                        <div class="col-xs-12 tag_result_show row rtl" style="padding-right: 0;">
                            <div class="desc">
                                <h3>
                                    <span class="fa fa-folder-open"></span>
                                    <span><?=$view_list_article_sub?></span>
                                    <span class="tagtitle"><?= get_result("select name from new_modules_cat where id='$madual_cat_id'",$coms_conect)?></span>
                                </h3>
                            </div>
                        </div>
                        <!--tag_result_show End-->
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 maghalatlist">
								<div  class="row">
								<?$sql1 = "SELECT count(a.id) as cnt from new_article a ,new_file_path b,new_modules_catogory c where 
									 b.name='article_image'  and a.status=1 and b.type=7 and   c.type=7 and c.cat_id=$madual_cat_id and a.id=c.page_id and
									 a.id=b.id and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' and publish_date<='$now'";
									 // echo $sql1;
									 $result = $coms_conect->query($sql1);
									 $RS = $result->fetch_assoc();
									 $a=new_pgsel((int)$madual_page_id,$RS["cnt"],9,9,"/article/{$_SESSION['la']}/page");
									 $from=$a[0];
									 $to=$a[1];
									 $pgsel=$a[2];?>
									 <?$query="select * from (select author,view,publisher,adress,abstract ,title,la,a.id,publish_date from new_article a ,new_file_path b ,new_modules_catogory c where
									 b.name='article_image'  and status=1 and b.type=7  and   c.type=7 and cat_id=$madual_cat_id and a.id=c.page_id 
									 and a.id=b.id and la='{$_SESSION['la']}' and site='{$_SESSION['site']}' and publish_date<='$now'
									group by a.id   LIMIT $from,$to) a order by a.id desc";
									 // echo $query;
									 $result = $coms_conect->query($query);$i=$paging;
									 while($row = $result->fetch_assoc()) {
									 	 ?>
									  <div class="col-md-12 item row pull-right">
										  <div class="col-sm-4 col-xs-12 pull-right">
											   <a href="<?="/article/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><img src="<?=get_modual_pic_address($row['adress'],$site,$domain,7)?>" alt="<?=$row['title']?>"/></a>
										  </div>
										  <div class="col-sm-8 col-xs-12 pull-right">
											   <a href="<?="/article/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><h3><?=$row['title']?></h3></a>
											   <p class="excert"><?=$row['abstract']?></p>
											   <p class="info"> 
													<?$cat_id=get_result("select cat_id from new_modules_catogory  where  page_id={$row['id']} and type=7",$coms_conect);?>
													<a  href='<?="/article/{$row['la']}/category/$cat_id/1"?>' ><span><i class="fa fa-folder-o"></i><?=get_result("select name from new_modules_cat a ,new_modules_catogory b   where b.page_id={$row['id']} and b.type=7 and a.id=b.cat_id",$coms_conect)?></span></a>
													<span><i class="fa fa-user"></i><?=$row['author']?></span>
													<span><i class="fa fa-print"></i><?=$row['publisher']?></span>
											  </p>
										  </div>
									   </div>
									   
	 
									   
									   
									   
									<?}?>
							  </div> 
							<?=$pgsel?>	
 
                                </section>
                                <section class="col-md-3 sidebar">
                                </section>
                            </div>
                        </section>
                 
				 


				</article>
               
	 		</aside>
					</section>
 			 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect,$madual_cat_id);
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'article_cat_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='article_cat_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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


    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
        <!--<link rel="stylesheet" type="text/css" href="css/responsive-slider.css">-->
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
<?if($madual_page_id=='')
	$madual_page_id=1;
$paging=($madual_page_id*9)-8;
	?>
	 <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="/"><span class="fa fa-home"></span></a></li>
                    <li><span class=" active"><?=$view_news_list_sub?>  
                     <span class=" active"><?= get_result("select name from new_modules_cat where id='$madual_cat_id'",$coms_conect)?></span></li>
					</li>
                </ol>
            </div>
        </section>
 
        <!-- End Page Title -->
        <div class="container">
            <main>
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=3 and pages_id=1 and la='$defult_lang'  and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'news_have_ads',$coms_conect))
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
			
                <!-- Start Main -->
                <div class="row">
				<article class="col-md-12 col-sm-8 pull-right animated fadeIn">
		 
				
					<?$condition=get_result("select count(a.id) as count from new_news a ,new_file_path b, new_modules_catogory c
								where c.type=1 and a.id=c.page_id and c.cat_id='$madual_cat_id' and  b.name='news_image' and is_special=1 and spesial_start_date <='$now' and spesial_finish_date >='$now' and site='$site' and la='$madual_lang' and status=1 and b.type=1 and a.id=b.id  and publish_date<='$now'
								",$coms_conect);
					if($condition>0){?>
				      <section class="vige">
                            <div class="row">
							<?$query1="select a.mudoal_lock,a.view,a.name,a.publish_date,a.la,a.title,a.id,b.adress from new_news a ,new_file_path b, new_modules_catogory c
								where c.type=1 and a.id=c.page_id and c.cat_id='$madual_cat_id' and  b.name='news_image' and is_special=1 and spesial_start_date <='$now' and spesial_finish_date >='$now' and site='$site' and la='$madual_lang' and status=1 and b.type=1 and a.id=b.id  and publish_date<='$now'
								group by b.id order by a.id desc limit 0,3";
								$result1 = $coms_conect->query($query1);
								//echo $query1;
									while($row1 = $result1->fetch_assoc()) {
								$row1['date']=miladitojalalitime(date('Y-m-d h:i:s',$row1['date']));
							?>
 

					            <div class="col-md-4 col-sm-4 col-xs-6 pull-right">
                                    <div class="item">
                                        <a href="<?="/news/{$row1['la']}/{$row1['id']}"?>" class="hvr-grow"><img height="200" src="<?=$row1['adress']?>"></a>
                                        <h4><?=$row1['name']?></h4>
                                        <a href="<?="/news/{$row1['la']}/{$row1['id']}"?>"><h3><?=$row1['title']?></h3>
                                        </a>

                                        <p><span class="fa fa-clock-o"></span><?=miladitojalaliuser(date("Y-m-d H:i:s",$row1['publish_date']));?><span class="fa fa-eye"></span> <?=$row1['view']?></p>
										<?if($row1['mudoal_lock']==1){?>
									<span class="fa fa-lock"></span>
									<?}?>
                                    </div>
                                </div>	
						
						<?}?>
					 </div>
					</section>
					<?}?>
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 list">
                                    <div id="switchshow">
                                        <div class="option">
                                            <div class="row">
                                                <div class="col-md-10 col-sm-12 pull-right pr0">
                                                </div>
                                                <div class="col-md-2 col-sm-12 hidden-xs pull-left pr0 tcenter">
                                                    <button id="gbtn" class="gridbtn">
                                                        <span class="fa fa-th-large"></span>
                                                    </button>
                                                    <button id="lbtn" class="listbtn deact">
                                                        <span class="fa fa-th-list"></span>
                                                    </button>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">
                                            <ul class="pl0 gridshow">
									<?################################################################
												//$query ="select count(*) as cnt from dynamic_news,combo,subsites where dynamic_news.site_id=subsites.site_id and subsites.la='$la' and dynamic_news.catid=combo.id and combo.cat='news' and dynamic_news.stat=1 and dynamic_news.la='$la' and combo.la='$la'  $skstr order by dynamic_news.id";
												$sql1 = "SELECT count(a.id) as cnt from new_news a ,new_file_path b,new_modules_catogory c where 
												c.type=1 and a.id=c.page_id and c.cat_id='$madual_cat_id' and b.name='news_image'  and a.status=1 and b.type=1 and a.id=b.id and a.la='$madual_lang' and a.site='$site' and publish_date<='$now'";
												$result = $coms_conect->query($sql1);
												$RS = $result->fetch_assoc();
												$a=new_pgsel((int)$madual_page_id,$RS["cnt"],9,9,"$root/news/$madual_lang/category/$madual_cat_id/page");
												$from=$a[0];
												$to=$a[1];
												$pgsel=$a[2];
												?>
										<?$query="select view,mudoal_lock,adress,abstract,a.name,title,la,a.id,publish_date from new_news a ,new_file_path b ,new_modules_catogory c where
										c.type=1 and a.id=c.page_id and c.cat_id='$madual_cat_id' and b.name='news_image'  and status=1 and b.type=1 and a.id=b.id and la='$madual_lang' and site='$site' and publish_date<='$now'
										 group by a.id  order by a.id desc LIMIT $from,$to";
											$result = $coms_conect->query($query);$i=$paging;
												while($row = $result->fetch_assoc()) {?>
                                                <!----------------------- item ----------------------->
                                                <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                                                    <a href="<?="/news/{$row['la']}/{$row['id']}"?>" class="hvr-grow"><img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                                                    <h4><?=$row['name']?></h4>
                                                    <a href="<?="/news/{$row['la']}/{$row['id']}"?>"><h3 id="gridtitr<?=$i?>" class="gridtitrlc"><?=$row['title']?></h3></a>
												    <p><span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']))?><span class="fa fa-eye"></span> <?=$row['view']?>
													  <?if($row['mudoal_lock']==1){?>
													<span class="fa fa-lock"></span>
													<?}?>
													</p>
                                                </li>
                                                <li class="col-md-4 col-sm-6 listitem animated fadeIn">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 pull-right pl0">
                                                            <a href="<?="/news/{$row['la']}/{$row['id']}"?>" class="hvr-grow"><img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 pull-right rtl">
                                                            <h4><?=$row['name']?></h4>
                                                            <a href="<?=$row['adress']?>"><h3 id="listtitr<?=$i?>" class="titrlc"><?=$row['title']?></h3></a>
                                                            <p id="listtext<?=$i?>" class="kholase textlc"><?=$row['abstract']?></p>
                                                        </div>
                                                        <div class="col-xs-12 pull-right rtl">
                                                            <p><span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']));?><span class="fa fa-eye"></span>  <?=$row['view']?></p>
                                                        </div>
														 <?if($row['mudoal_lock']==1){?>
															<span class="fa fa-lock"></span>
															<?}?>
                                                    </div>
													
                                                </li>
												<?$i++;}?>
                                              </ul>
                                        </div>

                                    </div>
                                    <ul class="pagination pr0">
										<?=$pgsel?>
                                    </ul>
                                </section>
                                <section class="col-md-3 sidebar">
                                </section>
                            </div>
                        </section>
                    </article>
					
					
					
					
<script>					
    $(document).ready(function () {
        var j=<?=$paging?>;
        $('.gridtitrlc').each(function(i, obj) {
            var $class =  $("#gridtitr"+j);
            var $len = $class.html().length;
            var $titrstr = $class.html();
            var $max = 74;
            var $titrstrtemp = $titrstr.substr(0,$max);
            if ($len > $max) {
                $titrstr = $titrstrtemp + '<span class="textlimit-dots"> ...</span>' + '<span class="textlimit">' + $titrstr.substr($max,$titrstr.length) + '</span>';
                $class.html($titrstr);
            }
            j++;
        });
    });
	
///////////Titr Limiter/////////////
    $(document).ready(function () {
        var j=<?=$paging?>;
        $('.titrlc').each(function(i, obj) {
            var $class =  $("#listtitr"+j);
            var $str_class =  $("#listtext"+j);
            var $len = $class.html().length;
            var $str_len = $str_class.html().length;
            var $titrstr = $class.html();
            var $max = 70;
             var $titrstrtemp = $titrstr.substr(0,$max);
            if (($len > $max && $str_len>200)||($len>100)) {
                $titrstr = $titrstrtemp + '<span class="textlimit-dots"> ...</span>' + '<span class="textlimit">' + $titrstr.substr($max,$titrstr.length) + '</span>';
                $class.html($titrstr);
            }
            j++;
        });
    });


///////////text Limiter/////////////
    $(document).ready(function () {
        var j=<?=$paging?>;
        $('.textlc').each(function(i, obj) {
            var $str_class =  $("#listtitr"+j);
            var $class =  $("#listtext"+j);
            var $len = $class.html().length;
            var $str_len = $str_class.html().length;
            var $textstr = $class.html();
            var $max = 200;
            var $textstrtemp = $textstr.substr(0,$max);
            if ($len > $max  && $str_len>70) {
                $textstr = $textstrtemp + '<span class="textlimit-dots"> ...</span>' + '<span class="textlimit">' + $textstr.substr($max,$textstr.length) + '</span>';
                $class.html($textstr);
            }
            j++;
        });
    });
	
	
</script>					
			</div>	
	 		</aside>
					</section>
 			 
				 <?if($RS23['left_block']>0){
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect,$madual_cat_id);
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'news_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='news_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
		<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
        
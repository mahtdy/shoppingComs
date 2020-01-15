 <?if($madual_page_id=='')
	$madual_page_id=1;
$paging=($madual_page_id*9)-8;
	?>       <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-pencil-square-o"></span>
<?$madual_tag_id=	delete_dash(urldecode($madual_tag_id));?>
                <h1 class="title">
                    <span><?=$view_list_blog_tag?> </span>
                    <a href="#"><span class="ttagitem"><?=urldecode($madual_tag_id)?></span></a>
                  </h1>

            </div>
        </div>
        <!-- End Page Title -->

        <div class="container">
            <main>
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=4 and pages_id=10";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'blog_sesrch_have_ads',$coms_conect))
				 $center=$center-2;
			if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect);
					 echo '	</aside>
						</section>';
					}//exit;?>
			 
			  <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect);?>
				<?}?>
			
                <!-- Start Main -->
                <div class="row">
                    <!-- Start Article -->
                    <article class="col-md-12 col-sm-8 pull-right animated fadeIn">
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 bloglist">

                                    <div class="row">
                                        <!-- Blog Item-->
										<?date_default_timezone_set('Asia/Tehran'); 
					$madual_tag_id=get_result("select id from new_keyword where name='$madual_tag_id'",$coms_conect);
					$start_date=strtotime(jalalitomiladi(injection_replace($_POST['start_date'])) );
					$finish_date=strtotime(jalalitomiladi(injection_replace($_POST['finish_date'])) );
					if($start_date>"")
						$start_str= " and publish_date >='$start_date'";
					if($finish_date>"")
						$finish_str= " and publish_date <='$finish_date'";
					if($url_temp[3]=='keyword'){ 
						// check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/index.php' ); 
						$sql1 = "SELECT a.id as cnt from new_blog a ,new_file_path b,new_mudoal_label c where 
						 c.type=10 and a.id=c.id and c.label_id='$madual_tag_id' and b.name='news_image' 
						 and a.status=1 and b.type=10 and a.id=b.id
						 and a.la='$madual_lang' and a.site='$site' and publish_date<='$now'
						 	group by b.id";
						 
						$result = $coms_conect->query($sql1);
						$RS = $result->fetch_assoc();
						$a=new_pgsel((int)$madual_page_id,$result->num_rows,9,9,"$root/blog/$madual_lang/page");
						$from=$a[0];
						$to=$a[1];
						$pgsel=$a[2];
						$limit=" limit $from,$to";
					if($madual_cat_id!='null')
						$cat_str= " and b.cat_id in ($madual_cat_id)";
					if($madual_search_str&&$url_temp[3]=='search');
						$str ="and (a.title like '%$madual_search_str%' or a.continue_blog like '%$madual_search_str%' or a.abstract like '%$madual_search_str%')";
						$sql12 = "SELECT a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status,name,abstract   from new_blog a,new_modules_catogory b ,new_mudoal_label c  
							where   a.id=b.page_id and b.type=10 and
							c.type=10 and  a.id=c.id	and label_id='$madual_tag_id'
							and site='$defult_site' $str $cat_str $finish_str $start_str
							group by b.page_id
							order by a.id desc ";
					}else if($url_temp[3]=='search'){
						$_REQUEST[ 'user_token' ]=11;$_SESSION[ 'session_token' ]=11;
						 check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/index.php' ); 
						 
					if($madual_cat_id!='null')
						$cat_str= " and b.cat_id in ($madual_cat_id)";
					if($madual_search_str&&$url_temp[3]=='search');
						$str ="and (a.name like '%$madual_search_str%' or a.title like '%$madual_search_str%' or a.continue_blog like '%$madual_search_str%' or a.abstract like '%$madual_search_str%')";
						 $sql1 = "SELECT id from new_blog a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and a.status=1 and  b.type=10
							and site='$defult_site' $str $cat_str $finish_str $start_str
								group by b.page_id";
						$result = $coms_conect->query($sql1);
					//	echo $sql1;
						$RS = $result->fetch_assoc();
						$a=new_pgsel((int)$madual_page_id,$result->num_rows  ,9,9,"$root/blog/$madual_lang/page");
						$from=$a[0];
						$to=$a[1];
						$pgsel=$a[2];
						$limit=" limit $from,$to";
						
						$sql12 = "SELECT a.mudoal_lock,a.site,a.la,a.title,a.id,name,abstract  ,a.view,a.status   from new_blog a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and a.status=1 and b.type=10 and site='$defult_site' $str $cat_str $finish_str $start_str
							group by b.page_id
							order by a.id desc ";
					}	
					  //echo $sql12 ;//exit;
							$final_sql=$sql12.$limit;
							$_SESSION['search_sql']=$sql12;
							$resultd1 = $coms_conect->query($final_sql);$i=$paging;
							while($row = $resultd1->fetch_assoc()) {
								$sql11="select adress from new_file_path where type=10 and name='blog_image' and id ={$row['id']}";	
								$result1 = $coms_conect->query($sql11);
								$row1  = $result1->fetch_assoc();
								 $temp=urlencode($row8['title']);
								?>
                                        <div class="col-xs-12 item">
                                             <a href="<?="/blog/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><p class="bcat"><span><?=$row['title']?></span></p>
											</a>
                                            <p class="info">
                                                
                                                <span class="fa fa-clock-o"></span><span><?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']));?></span>
                                                <span class="fa fa-eye"></span><span><?=$row['view']?></span>
                                            </p>
											<?if($row1['adress']){?>
                                            <a href="<?=$row1['adress']?>">
											<img src="<?=$row1['adress']?>" alt="<?=$row['title']?>"/>
											</a>
											<?}?>
                                            <p class="kholase"><?=$row['abstract']?></p>

                                            <div class="sociallinks">
                                                <ul>
													<li class="hvr-pop"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$domain_name.$url?>"><span class="fa fa-linkedin"></span></a></li>
													<li class="hvr-pop"><a href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"><span class="fa fa-twitter"></span></a></li>
													<li class="hvr-pop"><a href="https://plus.google.com/share?url=<?=$domain_name.$url?>"><span class="fa fa-google-plus"></span></a></li>
													<li class="hvr-pop"><a href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>"><span class="fa fa-facebook"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="more">
                                                <button onclick="window.location='<?="/blog/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>'" class="btn btn-info"><?=$view_more?></button>
                                                <hr/>
                                            </div>
                                        </div>
										<?$i++;}?>
 
                                    </div>

                                    <ul class="pagination pr0" style="width: 100%;">
                                       	<?=$pgsel?>
                                    </ul>
                                </section>

                            </div>
                        </section>
                    </article>

                 				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'blog_sesrch_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='blog_sesrch_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
										$result = $coms_conect->query($query);
										while($RS = $result->fetch_assoc()) {?>
											<a href="<?=$RS['link']?>" title='<?=$RS['title']?>'><img src="<?=$RS['pic_adress']?>"></a>
										<?}?>
                                </div>
                            </div>
                        </section>
                    </aside>
				 <?}?>
                </div>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->
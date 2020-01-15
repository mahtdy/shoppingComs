 <?if($madual_page_id=='')
	$madual_page_id=1;
$paging=($madual_page_id*9)-8;
	?>
	 <section class="breadcrumb-sec animated fadeIn">
<?$madual_tag_id=	delete_dash(urldecode($madual_tag_id));?>
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="/"><span class="fa fa-home"></span></a></li>
                    <li> <span class="active"><?=$view_article_list_keyword?> </span> 
                    <span class="active"><?=urldecode($madual_tag_id)?></span></li>
                </ol>
            </div>
        </section>
        <!-- End Page Title -->


        <div class="container">
            <main>
                <!-- Start Main -->
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=4 and pages_id=7";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'article_sesrch_have_ads',$coms_conect))
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
               
					<article class="col-md-12 col-sm-8 pull-right animated fadeIn">
                        <!--tag_result_show Start-->
                        <div class="col-xs-12 tag_result_show row rtl" style="padding-right: 0;">
                            <div class="desc">
                                <h3>
                                    <span class="fa fa-folder-open"></span>
                                    <span><?=$view_article_list_keyword?></span>
                                    <span class="tagtitle"><?=urldecode($madual_tag_id)?></span>
                                </h3>
                            </div>
                        </div>
                        <!--tag_result_show End-->
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 maghalatlist">
								<div  class="row">
									 <?$madual_tag_id=get_result("select id from new_keyword where name='$madual_tag_id'",$coms_conect);
									$start_date=strtotime(jalalitomiladi(injection_replace($_POST['start_date'])) );
									$finish_date=strtotime(jalalitomiladi(injection_replace($_POST['finish_date'])) );
									if($start_date>"")
										$start_str= " and publish_date >='$start_date'";
									if($finish_date>"")
										$finish_str= " and publish_date <='$finish_date'";
									if($url_temp[3]=='keyword'){
										check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/index.php' ); 
										$sql1 = "SELECT a.id as cnt from new_article a ,new_file_path b,new_mudoal_label c where 
										 c.type=7 and a.id=c.id and c.label_id='$madual_tag_id' and b.name='article_image' 
										 and a.status=1 and b.type=7 and a.id=b.id
										 and a.la='$madual_lang' and a.site='$site' and publish_date<='$now'
											group by b.id";
										$result = $coms_conect->query($sql1);
									//	echo $sql1;//exit;
										$RS = $result->fetch_assoc();
										$a=new_pgsel((int)$madual_page_id,$result->num_rows,9,9,"$root/article/$madual_lang/page");
										$from=$a[0];
										$to=$a[1];
										$pgsel=$a[2];
										$limit=" limit $from,$to";
									if($madual_cat_id!='null')
										$cat_str= " and b.cat_id in ($madual_cat_id)";
									if($madual_search_str&&$url_temp[3]=='search');
										$str ="and (a.title like '%$madual_search_str%'  or a.abstract like '%$madual_search_str%')";
										$sql12 = "SELECT  a.site,a.la,a.title,a.id  ,a.view,a.status,abstract   from new_article a,new_modules_catogory b ,new_mudoal_label c  
											where   a.id=b.page_id and b.type=7 and
											c.type=7 and  a.id=c.id	and label_id='$madual_tag_id'
											and site='$defult_site' $str $cat_str $finish_str $start_str
											group by b.page_id
											order by a.id desc ";
									}else if($url_temp[3]=='search'){
										echo $_REQUEST[ 'user_token' ].'s<br>'. $_SESSION[ 'session_token' ];
										check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/index.php' ); 
										 
									if($madual_cat_id!='null')
										$cat_str= " and b.cat_id in ($madual_cat_id)";
									if($madual_search_str&&$url_temp[3]=='search');
										$str ="and (  a.title like '%$madual_search_str%'   or a.abstract like '%$madual_search_str%')";
										 $sql1 = "SELECT id from new_article a,new_modules_catogory b   
											where id>0 and a.id=b.page_id and a.status=1 and  b.type=7
											and site='$defult_site' $str $cat_str $finish_str $start_str
												group by b.page_id";
										$result = $coms_conect->query($sql1);
									//	echo $sql1;
										$RS = $result->fetch_assoc();
										$a=new_pgsel((int)$madual_page_id,$result->num_rows  ,9,9,"$root/article/$madual_lang/page");
										$from=$a[0];
										$to=$a[1];
										$pgsel=$a[2];
										$limit=" limit $from,$to";
										$sql12 = "SELECT a.mudoal_lock,a.site,a.la,a.title,a.id,abstract  ,a.view,a.status   from new_article a,new_modules_catogory b   
											where id>0 and a.id=b.page_id and a.status=1 and b.type=7 and site='$defult_site' $str $cat_str $finish_str $start_str
											group by b.page_id
											order by a.id desc ";
									}	
											$final_sql=$sql12.$limit;
											// echo $sql12;//exit;
											$_SESSION['search_sql']=$sql12;
											$resultd1 = $coms_conect->query($final_sql);$i=$paging;
											while($row = $resultd1->fetch_assoc()) {
												$sql11="select adress from new_file_path where type=7 and name='article_image' and id ={$row['id']}";	
												$result1 = $coms_conect->query($sql11);
												$row1  = $result1->fetch_assoc();?>	 
													 
				 
									  <div class="col-md-12 item row pull-right">
										  <div class="col-sm-4 col-xs-12 pull-right">
											   <a href="<?="/article/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><img src="<?=get_modual_pic_address($row1['adress'],$site,$domain,7)?>" alt="<?=$row['title']?>"/></a>
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
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'article_sesrch_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='article_sesrch_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
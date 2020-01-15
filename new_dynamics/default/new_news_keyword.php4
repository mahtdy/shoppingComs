<?if($madual_page_id=='')
	$madual_page_id=1;
$paging=($madual_page_id*9)-8;
view_module(1,$coms_conect);
	?>
	 <section class="breadcrumb-sec animated fadeIn">
<?$madual_tag_id=	delete_dash(urldecode($madual_tag_id));?>
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="/"><span class="fa fa-home"></span></a></li>
                    <li> <span class="active"><?=$view_news_list_keyword?> </span> 
                    <span class="active"><?=urldecode($madual_tag_id)?></span></li>
                </ol>
            </div>
        </section>
 
        <!-- End Page Title -->
        <div class="container">
            <main>
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=4 and pages_id=1 and la='$defult_lang' and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'news_sesrch_have_ads',$coms_conect))
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
				<article class="col-md-12 col-sm-8 pull-right animated fadeIn">
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
						$sql1 = "SELECT a.id as cnt from new_news a ,new_file_path b,new_mudoal_label c where 
						 c.type=1 and a.id=c.id and c.label_id='$madual_tag_id' and b.name='news_image' 
						 and a.status=1 and b.type=1 and a.id=b.id
						 and a.la='$madual_lang' and a.site='$site' and publish_date<='$now'
						 	group by b.id";
						 
						$result = $coms_conect->query($sql1);
						$RS = $result->fetch_assoc();
						$a=new_pgsel((int)$madual_page_id,$result->num_rows,9,9,"$root/news/$madual_lang/page");
						$from=$a[0];
						$to=$a[1];
						$pgsel=$a[2];
						$limit=" limit $from,$to";
					if($madual_cat_id!='null')
						$cat_str= " and b.cat_id in ($madual_cat_id)";
					if($madual_search_str&&$url_temp[3]=='search');
						$str ="and (a.title like '%$madual_search_str%' or a.text like '%$madual_search_str%' or a.abstract like '%$madual_search_str%')";
						$sql12 = "SELECT a.mudoal_lock,a.site,a.la,a.title,a.id  ,a.view,a.status,name,abstract   from new_news a,new_modules_catogory b ,new_mudoal_label c  
							where   a.id=b.page_id and b.type=1 and
							c.type=1 and  a.id=c.id	and label_id='$madual_tag_id'
							and site='$defult_site' $str $cat_str $finish_str $start_str
							group by b.page_id
							order by a.id desc ";
					}else if($url_temp[3]=='search'){
						$_REQUEST[ 'user_token' ]=11;$_SESSION[ 'session_token' ]=11;
						 check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/index.php' ); 
						 
					if($madual_cat_id!='null')
						$cat_str= " and b.cat_id in ($madual_cat_id)";
					if($madual_search_str&&$url_temp[3]=='search');
						$str ="and (a.name like '%$madual_search_str%' or a.title like '%$madual_search_str%' or a.text like '%$madual_search_str%' or a.abstract like '%$madual_search_str%')";
						 $sql1 = "SELECT id from new_news a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and a.status=1 and  b.type=1
							and site='$defult_site' $str $cat_str $finish_str $start_str
								group by b.page_id";
						$result = $coms_conect->query($sql1);
					//	echo $sql1;
						$RS = $result->fetch_assoc();
						$a=new_pgsel((int)$madual_page_id,$result->num_rows  ,9,9,"$root/news/$madual_lang/page");
						$from=$a[0];
						$to=$a[1];
						$pgsel=$a[2];
						$limit=" limit $from,$to";
						
						$sql12 = "SELECT a.mudoal_lock,a.site,a.la,a.title,a.id,name,abstract  ,a.view,a.status   from new_news a,new_modules_catogory b   
							where id>0 and a.id=b.page_id and a.status=1 and b.type=1 and site='$defult_site' $str $cat_str $finish_str $start_str
							group by b.page_id
							order by a.id desc ";
					}	
					//  echo $sql12 ;
							$final_sql=$sql12.$limit;
							$_SESSION['search_sql']=$sql12;
							$resultd1 = $coms_conect->query($final_sql);$i=$paging;
							while($row = $resultd1->fetch_assoc()) {
								$sql11="select adress from new_file_path where type=1 and name='news_image' and id ={$row['id']}";	
								$result1 = $coms_conect->query($sql11);
								$row1  = $result1->fetch_assoc();?>
                                                <!----------------------- item ----------------------->
                                                <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                                                    <a href="<?="/news/{$row['la']}/{$row['id']}"?>" class="hvr-grow"><img alt='<?=$row['title']?>' src="<?=$row1['adress']?>"></a>
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
                                                            <a href="<?="/news/{$row['la']}/{$row['id']}"?>" class="hvr-grow"><img alt='<?=$row['title']?>' src="<?=$row1['adress']?>"></a>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 pull-right rtl">
                                                            <h4><?=$row['name']?></h4>
                                                            <a href="<?=$row1['adress']?>"><h3 id="listtitr<?=$i?>" class="titrlc"><?=$row['title']?></h3></a>
                                                            <p id="listtext<?=$i?>" class="kholase textlc"><?=$row['abstract']?></p>
                                                        </div>
                                                        <div class="col-xs-12 pull-right rtl">
                                                            <p><span class="fa fa-clock-o"></span><?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']));?><span class="fa fa-eye"></span>  <?=$row['view']?>
															<?if($row['mudoal_lock']==1){?>
															<span class="fa fa-lock"></span>
															<?}?>
															</p>
                                                        </div>

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
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'news_sesrch_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='news_sesrch_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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

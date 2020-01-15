        <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="#"><span class="fa fa-home"></span></a></li>
                    <li class="active">لیست آگهی</li>
                </ol>
            </div>
        </section>


        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-bullhorn"></span>

                <h1 class="title">لیست آگهی</h1>
                <span class="pdesc">توضیح مختصر درباره این صفحه در اینجا نمایش داده می شود.</span>

            </div>
        </div>



        <div id="reportmodal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">گزارش اشکال در آگهی</h4>
                    </div>
                    <div class="modal-body">
                        <p style="font-weight:bold;border-bottom: solid 1pt whitesmoke">نوع اشکال</p>
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">عنوان اشکال</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">عنوان اشکال</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">عنوان اشکال</label>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">عنوان اشکال</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">عنوان اشکال</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" value="">عنوان اشکال</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="آدرس ایمیل"/>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <textarea class="form-control" type="text" placeholder="متن پیام"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-xs-6 pull-right">
								<button type="button" class="btn btn-success" data-dismiss="modal">ارسال گزارش</button>
							</div>
							<div class="col-xs-6 pull-right">
								<button type="button" class="btn btn-danger" data-dismiss="modal">لغو گزارش</button>
							</div>
						</div>
					</div>

                </div>

            </div>
        </div>


				<?$comment_type=1;
					#####
					if($site=='main')
				include 'new_dynamics/default/new_popup_comment.php4';else
				include '../new_dynamics/default/new_popup_comment.php4';?>


        <!-- End Page Title -->

        <div class="container">
            <main>
		  <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=2 and pages_id=18";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'ads_show_have_ads',$coms_conect))
				 $center=$center-2;
			if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'r',$coms_conect);
					 echo '	</aside>
						</section>';
					}//exit;?>

			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'c',$coms_conect);?>
				<?}?>
                <!-- Start Main -->
                <div class="row">

				<?if(time()>=$_SESSION['count']+2){
					$query1="update new_ads set view=view+1 where id='$madual_id'";
					$coms_conect->query($query1);
					view_module(18,$coms_conect);
				}
				$_SESSION['count']=time();

				$query="select id,title,date,text,mobile from new_ads a where status=1  and la='$madual_lang' and site='$site' and a.id='$madual_id' and publish_date<=$now";
				$result = $coms_conect->query($query);
				$row = $result->fetch_assoc();
				$id=$row['id'];
				$_SESSION['ads_mobile']=$row['mobile'];
				$_SESSION['ads_id']=$row['id'];
				if($row['id']==''){
				include 'new_dynamics/no_modual.php4';
				}else if ($row['mudoal_lock']==1&&!isset($_SESSION["new_okusername"])) get_login_form($site_url);else{
					$temp=urlencode($row['title']);

					#####نوع ماژول


					?>


                    <article class="col-md-12 col-xs-12 pull-right animated fadeIn">
                        <section class="content">
                            <div class="row">
                                <section class="col-xs-12 ads_item">
                                    <section class="breadcrumb-sec animated fadeIn">
                                        <ol class="breadcrumb rtl">
											<?$query12="select name,id from new_modules_catogory a,new_modules_cat b where a.type=18 and b.type=18 and a.cat_id=b.id and page_id='$madual_id'";

											$result12 = $coms_conect->query($query12);
											 while($row112 = $result12->fetch_assoc()) {
											 $cat_arr_name[]= $row112['name'];
											 $cat_arr_id[]= $row112['id'];
											 }
												sort($cat_arr_name);$i=0;
												sort($cat_arr_id);
												foreach ($cat_arr_name  as $val){
												//	if($val['name'])
													echo "<li><a href='/ads/{$_SESSION[la]}/cat_id/{$cat_arr_id[$i]}'>{$val}</a></li>";
											 $i++;}
											   ?>
                                        </ol>

                                    </section>
                                        <div class="col-xs-12 ads_title rtl">
                                            <h1><?=$row['title']?></h1>
                                            <p>
                                                <span class="date"><span class="fa fa-clock-o"></span><span><?=miladitojalaliuser(date('Y-m-d',$row['date']));?></span></span>
                                            <span class="code">
                                                <span>شناسه آگهی:</span><span class="id"><?=$row['id']?></span>
                                            </span>
                                            </p>

                                        </div>
										 <?$class='deactivestar';$_SESSION["new_okusername"]=''; if($_SESSION["new_okusername"]>""){
																	$url=urldecode ($url);$class='';
																if(get_result("select count(id) count from new_favorite where url='$url' and user_name='{$_SESSION["new_okusername"]}'",$coms_conect)>0)
																	$class='activestar';?>
										 <?}?>
                                        <div class="col-xs-12 ads_img">
                                            <div class="ads_tools hvr-box-shadow-outset <?=$class?>">
                                                <div class="star item">
                                                    <a data-toggle="tooltip" data-placement="right" title="افزودن به لیست علاقه مندی ها!" class="<?=$class?>" id="asbtn">
													<i class="fa fa-star"></i></a>
                                                </div>

									<script>
										$("#asbtn").click(function (e) {
											e.preventDefault();
												$.ajax({
													type:'POST',
													url:'/New_members_ajax.php',
													data:"action=add_to_favorite&id=<?=$url?>",
													success: function(result){
														if(result==0){
										     				alert('این صفحه از لیست علاقه مندی شما خارج شد');
														}
														else{
															 alert('این صفحه به لیست علاقمندی های شما اضافه گردید');
														}
													}
												});
											});
										</script>

                                                <div class="print item">
                                                    <a href="#" data-toggle="tooltip" data-placement="right" title="چاپ آگهی"><i class="fa fa-print"></i></a>
                                                </div>
                                                <div class="share item">
                                                    <i class="fa fa-share-alt"></i>
                                                    <div class="shareicons">
                                                        <ul>
															<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>"><i class="fa fa-facebook"></i></a></li>
                                                            <li><a href="https://plus.google.com/share?url=<?=$domain_name.$url?>"><i class="fa fa-google-plus"></i></a></li>
                                                            <li><a href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"> <i class="fa fa-twitter"></i></a></li>
                                                            <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$domain_name.$url?>"> <i class="fa fa-linkedin"></i></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="report item" data-toggle="tooltip" data-placement="right" title="گزارش">
                                                    <a data-toggle="modal" data-target="#reportmodal"><i class="fa fa-flag"></i></a>
                                                </div>
                                            </div>
											<?$ads_pic=get_result("select adress from new_file_path where type=18 and name='ads_galery_pic' and id={$row['id']}",$coms_conect)?>
                                            <div class="row">
                                                <div class="col-xs-12 item">
                                                    <a href="<?=get_modual_pic_address($ads_pic,$site,$domain,18)?>" class="swipebox hvr-glow" title="<?=$row['title']?>">
                                                        <img src="<?=get_modual_pic_address($ads_pic,$site,$domain,18)?>" alt="<?=$row['title']?>"/>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
												<?$query1="select adress from new_file_path where type=18 and name='ads_galery_pic' and id={$row['id']} and adress not in ('$ads_pic')";
													$result1 = $coms_conect->query($query1);
												 while($row1 = $result1->fetch_assoc()) {?>
                                                <div class="col-md-2 col-sm-4 col-xs-6 pull-right text-center item">
                                                    <a href="<?=get_modual_pic_address($row1['adress'],$site,$domain,18)?>" class="swipebox hvr-glow" title="<?=$row['title']?>">
                                                        <img src="<?=get_modual_pic_address($row1['adress'],$site,$domain,18)?>" alt="<?=$row['title']?>"/>
                                                    </a>
                                                </div>
												 <?}?>
                                            </div>

                                        </div>
                                        <div class="col-xs-12 ads_details rtl">
                                            <span class="sectitr">خصوصیات</span>
                                            <div class="text">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                                                        <ul>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                                                        <ul>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
                                                        <ul>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                            <li><span class="label">عنوان مشخصه :</span><span>مقدار مشخصه</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 ads_information rtl">
                                            <span class="sectitr">شرح آگهی</span>
                                            <div class="text">
                                                <p><?=$row['text']?></p>
                                            </div>
                                        </div>

                                    <div class="col-xs-12 related_ads rtl">
                                        <span class="sectitr">آگهی های مرتبط</span>
                                        <div class="text">
                                            <div class="row">
                                                <ul>
												<?$queryf="SELECT b.state,b.price,b.id,la,b.title,date  FROM new_related_madual a ,new_ads b where 
													 page_id='$madual_id' and a.id=b.id and status=1";
													 $resultf = $coms_conect->query($queryf);
													// echo $queryf;
														 while($rowf = $resultf->fetch_assoc()) {
															 $sql533 = "SELECT adress FROM new_file_path where name='ads_galery_pic' and type=18 and id={$rowf['id']}";
															 $result533 = $coms_conect->query($sql533);
															 $row533 = $result533->fetch_assoc();
														 ?>
                                                    <!-- Related ads item-->
                                                    <li class="col-md-4 col-sm-6 col-xs-12 griditem animated fadeIn pull-right">
                                                        <div class="adsitem">

                                                            <a href="/ads/<?="{$_SESSION['la']}/{$rowf['id']}/".insert_dash($rowf['title'])?>">
																<img src="<?=get_modual_pic_address($row533['adress'],$site,$domain,18)?>" alt='<?=$rowf['title']?>'>
															</a>
                                                            <a href="/ads/<?="{$_SESSION['la']}/{$rowf['id']}/".insert_dash($rowf['title'])?>"><h3><?=$rowf['title']?></h3></a>

                                                            <div class="row">
                                                                <div class="col-xs-12 location pull-right rtl"><span
                                                                        class="fa fa-map-marker"></span><span><?=get_result("select name from new_regional where id={$rowf['state']}",$coms_conect)?></span>
                                                                </div>
                                                                <div class="col-xs-6 date pull-right rtl"><span
                                                                        class="fa fa-clock-o"></span><span><?=miladitojalaliuser(date('Y-m-d',$rowf['date']));?></span>
                                                                </div>
                                                                <div class="col-xs-6 price pull-left">
                                                                    <span><?=$rowf['price']?></span></div>
                                                            </div>


                                                        </div>
                                                    </li>
													<?}?>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                </section>
                                <section class="col-md-3 sidebar">
                                </section>
                            </div>
                        </section>
                    </article>




				<?}?>
                </div>
	 		</aside>
					</section>

				 <?if($RS23['left_block']>0){
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'l',$coms_conect);
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'ads_show_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='ads_show_have_ads'  and la='$defult_lang' and site='$defult_site'";
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
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
        <!--<link rel="stylesheet" type="text/css" href="css/responsive-slider.css">-->
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2-bootstrap.min.css">
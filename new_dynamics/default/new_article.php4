        <!-- Start breadcrumb -->
        <section class="breadcrumb-sec animated fadeIn">
            <div class="container">
                <ol class="breadcrumb rtl">
                    <li><a href="#"><span class="fa fa-home"></span></a></li>
                    <li class="active"><?=$view_article_list?></li>
                </ol>
            </div>
        </section>


        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-file-text-o"></span>

                <h1 class="title"><?=$view_article_list?></h1>
                <span class="pdesc">توضیح مختصر درباره این صفحه در اینجا نمایش داده می شود.</span>

            </div>
        </div>

        <div class="container">
            <main>
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=1 and pages_id=7";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'article_have_ads',$coms_conect))
				  $center=$center-2;
				if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect);
					 echo '	</aside>
						</section>';
					}//exit;?>
			 
			   <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect);?>
				<?}?>
			
                <!-- Start Main -->
                <div class="row">

					<article class="col-md-12 col-sm-8 pull-right animated fadeIn">
                        <section class="vige_maghalat">
                            <div class="row">
								<?$query1="select a.author,a.la,a.title,a.id,b.adress from new_article a ,new_file_path b 
									where b.name='article_image' and is_importand=1 and spesial_start_date <='$now' and spesial_finish_date >='$now' and site='$site' and la='$madual_lang' and status=1 and b.type=7 and a.id=b.id  and publish_date<='$now'
									group by b.id order by a.id desc limit 0,3";
									$result1 = $coms_conect->query($query1);
									///echo $query1;
										while($row1 = $result1->fetch_assoc()) {
									$row1['date']=miladitojalalitime(date('Y-m-d h:i:s',$row1['date']));
								?>
                                <div class="col-sm-4 col-xs-12 item">
                                    <figure> 
                                        <a href="<?="/article/{$row1['la']}/{$row1['id']}/".insert_dash($row['title']) ?>"><img src="<?=get_modual_pic_address($row1['adress'],$site,$domain,7)?>" alt="<?=$row1['title']?>"/></a>
                                        <figcaption>
										<a href="<?="/article/{$row1['la']}/{$row1['id']}/".insert_dash( $row['title'] )?>"><h3><?=$row1['title']?></h3></a>
                                        <p><span class="fa fa-user"></span><span><?=$row1['author']?></span></p>
                                        </figcaption>
                                    </figure>
                                </div>
								<?}?>
                            </div>
                        </section>
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 maghalatlist">
                                    <div class="option">
                                        <div class="row">

                                            <div class="col-xs-12 pull-right pr0">
                                                <form class="row">

                                                    <div class="col-md-6 col-sm-6 col-xs-6 form-group pull-right">
                                                        <select id="article_order"  class="form-control input-sm">
                                                            <option <?if($_SESSION['article_order']==1) echo 'selected';?> value='1'><?=$view_new_prev?></option>
                                                            <option <?if($_SESSION['article_order']==0) echo 'selected';?> value='0'><?=$view_past_next?></option>
                                                        </select>
                                                    </div>
													
                                                    <div class="col-md-6 col-sm-6 col-xs-6 form-group pull-right">
                                                        <select id="article_type" class="form-control input-sm">
                                                            <option <?if($_SESSION['article_type']==1) echo 'selected';?> value='1'><?=$view_Compilation?></option>
                                                            <option <?if($_SESSION['article_type']==0) echo 'selected';?>  value='0'><?=$view_translation?></option>
                                                            <option <?if($_SESSION['article_type']=='')  echo 'selected';?> value='2'><?=$view_select_paper?></option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
<script>
 $("#article_type").change(function () {
			$("#waiting").show();
			$("#show_result").empty();
			$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=article_type_change&id="+$(this).val()+"&value="+$("#article_order").val(),
				success: function(result){ 
					$("#waiting").hide();
					$("#show_result").html(result);
				}
			});	
		});
 $("#article_order").change(function () {
			$("#waiting").show();
			$("#show_result").empty();
			$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=article_type_change&id="+$("#article_type").val()+"&value="+$("#article_order").val(),
				success: function(result){ 
					$("#waiting").hide();
					$("#show_result").html(result);
				}
			});	
		});
 $(document).ready(function () {
			$("#waiting").show();
			$("#show_result").empty();
			$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=article_type_change&id="+$("#article_type").val()+"&value="+$("#article_order").val(),
				success: function(result){ 
					$("#waiting").hide();
					$("#show_result").html(result);
				}
			});	
		});	
</script>
 
                                    </div>
										<img id="waiting" src='/waiting.gif' style="display:none">
										<div id="show_result" >
										</div>
                                </section>
                                <section class="col-md-3 sidebar">
                                </section>
                            </div>
                        </section>
                    </article>
				</div>	
	 		</aside>
		</section>
 			 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'article_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='article_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
 
        <!-- End main container -->
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
        <!--<link rel="stylesheet" type="text/css" href="css/responsive-slider.css">-->
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
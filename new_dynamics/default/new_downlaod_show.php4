<?if(time()>=$_SESSION['count']+2){
	$query1="update new_download set view=view+1 where id='$madual_id'";
	$coms_conect->query($query1);	
	view_module(6,$coms_conect);
}
$_SESSION['count']=time();
?> 

<!-- Modal maghale atachments -->
<div class="modal fade" id="mmatachlist" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><span class="fa fa-paperclip"></span>لیست فایل های پیوست</h4>
			</div>
			<div class="modal-body">
				<div id="show_result" class="table-responsive">

				</div>

			</div>
		</div>

	</div>
</div>

<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/theme.css">
<!-- Start breadcrumb -->
<section class="breadcrumb-sec animated fadeIn">
	<div class="container">
		<ol class="breadcrumb rtl">
			<li><a href="/"><span class="fa fa-home"></span></a></li>
			<li><a href="/blog/<?=$defult_lang?>">دانلود</a></li>
			<li class="active">نمایش مقاله</li>
		</ol>
	</div>
</section>
<?echo '00000000000000000';exit;
$query="select  a.navication_pic,a.can_comment,b.adress,a.website,a.download_base,a.publisher,a.translator,a.author,a.date,a.abstract ,a.title,a.la,a.id,a.publish_date ,a.view from
new_download a,new_file_path b where 
status=1  and la='$madual_lang' and site='$site' and
b.type=6 and b.id='$madual_id' and name='download_image'
and	a.id='$madual_id' and publish_date<=$now";

$result = $coms_conect->query($query);
$row = $result->fetch_assoc();
if($row["navication_pic"]==''){
$row["navication_pic"]=get_result("select address from new_default_navbar where name='download_nav_picture' and la='$defult_lang' and site='$defult_site'",$coms_conect);	
}
if($row["navication_pic"]>""){?>	
<!-- Start Slider -->
	<section class="slider pimg animated fadeIn hidden-xs">
	<img src="<?=$row["navication_pic"]?>" alt="<?=$nav_title?>" style="height:<?=$header_nav_heigth?>px">
	</section>
<?}?> 		
				<?#####نوع ماژول  
				$comment_type=6;
				 if($site=='main')
				 include 'new_dynamics/default/new_popup_comment.php4';else
				 include '../new_dynamics/default/new_popup_comment.php4';?>
        <!-- End Header -->
     
            <div class="container">
				<main> 
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=2 and pages_id=6";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'download_show_have_ads',$coms_conect))
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
			 <div class="row">
				<?$id=$row['id'];
				if($row['id']==''){
				include 'new_dynamics/no_modual.php4';	
				}else if ($row['mudoal_lock']==1&&!isset($_SESSION["new_okusername"])) get_login_form($site_url);else{	
					$temp=urlencode($row['title']);
	?>
                <!-- Start Main -->
                    <!-- Start Article -->
			
                    <article class="col-md-12 col-sm-8 pull-right animated fadeIn">
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 maghaleitempage">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-12 pull-left">
                                            <img src="<?=get_modual_pic_address($row['adress'],$site,$domain,6)?>" alt="<?=$row['title']?>"/>
                                        </div>
                                        <div class="col-sm-6 col-xs-12 pull-left rtl">
                                            <h1><?=$row['title']?></h1>
                                            <ul class="info">
                                                <li><a href='/download/<?=$madual_lang?>/category/<?= get_result("select a.cat_id from new_modules_catogory a   where a.type=6 and a.page_id='$madual_id'",$coms_conect)?>/1'><span><span class="fa fa-folder-open"></span>موضوع : <?= get_result("select name from new_modules_catogory a ,new_modules_cat b where a.type=6 and a.page_id='$madual_id' and a.cat_id=b.id",$coms_conect)?></span></li></a>
                                                <li><span><span class="fa fa-user"></span>نویسنده: <?=$row['author']?></span></li>
                                                <li><span><span class="fa fa-user"></span>مترجم: <?=$row['translator']?></span></li>
                                                <li><span><span class="fa fa-print"></span>ناشر: <?=$row['publisher']?></span></li>
                                                <li><span><span class="fa fa-server"></span>زمینه تحقیقاتی: <?=$row['download_base']?></span></li>
                                                <li><span><span class="fa fa-external-link"></span><a href="<?=$row['website']?>">آدرس وبسایت</a></span></li>
												<a id='<?=$madual_id?>' data-toggle="modal" data-target="#mmatachlist" class="btn btn-primery download_article"><span><span class="fa fa-cloud-download"></span>دریافت فایل pdf</span></a>                                               
														<script>
																$(".download_download").click(function (e){
																	e.preventDefault();
																		$.ajax({
																			type:'POST',
																			url:'/New_members_ajax.php',
																			data:"action=download_download&id="+$(this).attr('id'),
																			success: function(result){
				 																$("#show_result").html(result);
																			}
																		});		
																	});
														 </script>
                                            </ul>
                                        </div>
                                        <div class="col-xs-12 tools row rtl">
												<div class="col-sm-6 col-xs-12 pull-right rtl pr0">
													 <div class="viewed pull-right">
														   <span class="fa fa-eye"></span>
														   <span><?=$row['view']?></span>
													  </div>
                                                    <div class="ccomment pull-right">
                                                        <a class="scroll" href="#comments" data-toggle="tooltip" title="تعداد ديدگاه ها"><span class="fa fa-commenting-o"></span></a>
                                                        <span><?=get_result("select count(id) as count from new_madules_comment   where
								type=6 and madul_id=$madual_id",$coms_conect)?> </span>
                                                    </div>
													<?$_SESSION["new_okusername"]=''; if($_SESSION["new_okusername"]>""){	
																	$url=urldecode ($url);$class='';
																if(get_result("select count(id) count from new_favorite where url='$url' and user_name='{$_SESSION["new_okusername"]}'",$coms_conect)>0)
																	$class='';
																	else 
																	$class='-o';?>
														  <? } ?>
                                                    <div class="clike pull-right">
														 <a href="#" id='add_to_favorite'   title="افزودن به علاقه مندی ها"><span id="favorite_span" class="fa fa-heart-o"></span></a>
														<span><?=get_result("select count(id) count from new_favorite where url='$url'",$coms_conect);?></span>
														<script>
																$("#add_to_favorite").click(function (e) {
																	e.preventDefault();
																		$.ajax({
																			type:'POST',
																			url:'/New_members_ajax.php',
																			data:"action=add_to_favorite&id=<?=$url?>",
																			success: function(result){
																				if(result==0){
																					alert('این صفحه از لیست علاقه مندی شما خارج شد');
																					$("#favorite_span").toggleClass('fa-heart  fa-heart-o');
																				}
																				else{
																					alert('این صفحه به لیست علاقمندی های شما اضافه گردید');
																					$("#favorite_span").toggleClass('fa-heart-o  fa-heart');
																				}
																			}
																		});		
																	});
														 </script>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6 col-xs-12 pull-right ltr social">
													<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?=$domain_name.$url?>"><span class="fa fa-linkedin-square"></span></a>
													<a href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"><span class="fa fa-twitter-square"></span></a>
													<a href="https://plus.google.com/share?url=<?=$domain_name.$url?>"><span class="fa fa-google-plus-square"></span></a>
													<a href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>"><span class="fa fa-facebook-square"></span></a>
                                                </div>

                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xs-12 chekide">
                                            <p><?=$row['abstract']?></p>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 relatedposts">

                                            <fieldset>
                                                <legend>دانلود مرتبط:</legend>
                                                <ul>
												<?$queryf="SELECT b.id,la,date,title FROM new_related_madual a ,new_download b where 
												 page_id='$madual_id' and a.id=b.id and type=6";
												// echo $queryf;
												 $resultf = $coms_conect->query($queryf);
												 while($rowf = $resultf->fetch_assoc()) {?>
                                                    <li><a href="<?="/download/{$rowf['la']}/{$rowf['id']}"?>"><?=$rowf['title']?></a></li>
												<?}?>
                                                </ul>
                                            </fieldset>

                                        </div>
                                        <div class="col-xs-12 tags">

                                            <fieldset>
                                                <legend>برچسب ها:</legend>
                                                <ul>
													<?create_label_pishgaman($row['id'],'download',$madual_lang,$coms_conect,6);?>
                                                </ul>
                                            </fieldset>

                                        </div>

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
              
	 		</aside>
					</section>
 			 
 				 
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'download_show_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='download_show_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
		
<?if(isset($_GET['val'])){ 
$temp=injection_replace($_GET['val']);
$query="select adress from new_file_path where id='$madual_id' and type=6 and name='downloads' and auto_number=$temp";
	$result = $coms_conect->query($query);$i=1;
    $RS1 = $result->fetch_assoc();
	if($RS1['adress']){
		$temp=explode("/source/",$RS1['adress']);
		$file='source/'.$temp[1];
		echo $file;
		if (file_exists($file)) { 
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		readfile($file);
		exit;
		}
	}
}?>		
		
        <!-- Filehaye safhe-->
    <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
        <!--<link rel="stylesheet" type="text/css" href="css/responsive-slider.css">-->
        <link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">
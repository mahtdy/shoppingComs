<?if($madual_page_id=='')
	$madual_page_id=1;
$paging=($madual_page_id*9)-8;
if($keyword_id>"")$madual_cat_id=$keyword_id;
$la=$defult_lang;
?>
	 <section class="breadcrumb-sec animated fadeIn">
		<div class="container">
			<ol class="breadcrumb rtl">
				<li><a href="/"><span class="fa fa-home"></span></a></li>
				<li> <span class="active">لیست صفحه ها با دسته بندی : </span> 
				<a href="/page/<?=$defult_lang?>/category/<?=$madual_cat_id?>"><span class="active"><?=get_result("select name from new_modules_cat  where id=$madual_cat_id",$coms_conect)?></span></a></li>
			</ol>
		</div>
	</section>
 
        <!-- End Page Title -->
        <div class="container">
            <main>
			 <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=3 and pages_id=5  and la='$defult_lang' and status=1";
			//echo $query23;exit;
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'page_cat_have_ads',$coms_conect)) 
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
									 
									<div class="container rtl">	
									<?$madual_tag_id=get_result("select id from new_modules_cat where name='$madual_cat_id'",$coms_conect); 
									if($url_temp[3]=='category'){ 
										$sql1 = "SELECT count(a.id) as cnt from new_static_page a,new_modules_catogory c where 
										c.type=5 and a.id=c.page_id and c.cat_id='$madual_cat_id'  and la='$la'
										and a.status=1   
										and a.la='$madual_lang' and a.site='$site' and publish_date<='$now'
										group by c.page_id";
									 	$result = $coms_conect->query($sql1);   
										$RS = $result->fetch_assoc();
										$a=new_pgsel((int)$madual_page_id,$result->num_rows,10,10,"$root/page/$madual_lang/category/$madual_cat_id"); 
										$from=$a[0];
										$to=$a[1];
										$pgsel=$a[2];
										$limit=" limit $from,$to";
										//$limit=" limit 0,3";
	 
										$sql12 = "SELECT a.date,a.mudoal_lock,a.site,a.la,a.title,a.id ,a.status,name,text   from new_static_page a  ,new_modules_catogory c  
										where c.type=5 and  a.id=c.page_id	and cat_id='$madual_cat_id' and la='$la'
										and site='$defult_site' $str  
										group by a.id
										order by a.id desc $limit";
										 //	  echo $sql12;exit;
										$resultd1 = $coms_conect->query($sql12);
										while($row = $resultd1->fetch_assoc()) {
											$text=str_split ($row['text'],400);
											 if($text[1]>"")
												$temp='...';else $temp='';
										ini_set('mbstring.substitute_character', "none"); 
										$text[0]= mb_convert_encoding($text[0], 'UTF-8', 'UTF-8');
								 
											?>
											<div class="panel panel-default">
												<div class="panel-body">
													<div class="col-md-2" style="border-right: 1px solid #ccc;">
														<p>
															<small style="color:#a0a0a0;display: block;"><i class="fa fa-calendar"></i> <?=miladitojalaliuser($row['date'])?> </small>  
															<?$sql120 = "SELECT a.name  from new_modules_catogory c, new_modules_cat a   where a.id=c.cat_id and  c.type=5  and c.page_id='{$row['id']}'";
															 
															$resultd10 = $coms_conect->query($sql120);
															while($row0 = $resultd10->fetch_assoc()) {?>
															<a href="<?="/page/{$row['la']}/category/".insert_dash($row0['name'])."/1"?>"><span class="label label-danger" style="display: inline-block;padding: 5px;"><?=$row0['name']?></span></a>
															<?}?>
															</p>
													</div>

													<div class="col-md-10"> 
														<h3><a href="<?="/{$row['name']}/{$row['la']}/".insert_dash($row['title'])?>"><?=$row['title']?> </a></h3>
														
														<p><? /// $text[0].$temp?></p>

													</div>
												</div>
											</div>	
										<?}
									}?>
									</div>
								<?=$pgsel?> 	 
								</div>
							</section>
						</article>
 					</div>	
					</section>
				</aside>
 			 
				<?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($madual_cat_id,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'page_cat_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='page_cat_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
        
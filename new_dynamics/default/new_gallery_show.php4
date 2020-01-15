<?if(time()>=$_SESSION['count']+2){
	$query1="update new_gallery set view=view+1 where id='$madual_id'";
	$coms_conect->query($query1);		
	view_module(9,$coms_conect);
}
$_SESSION['count']=time();
					#####نوع ماژول  
					$comment_type=9;
				 if($site=='main')
				include 'new_dynamics/default/new_popup_comment.php4';else
				include '../new_dynamics/default/new_popup_comment.php4';
$sql12 = "SELECT cameraman,pic_source,pic_source_link,la,navication_pic,mudoal_lock,can_comment,id,deatils,title,date,view from new_gallery 
	 where id='$madual_id'  and status=1 and publish_date<=$now ";   
 
	 $resultd1 = $coms_conect->query($sql12);
$row15 = $resultd1->fetch_assoc();
?> 
<!-- Start breadcrumb -->
<section class="breadcrumb-sec animated fadeIn">
	<div class="container">
		<ol class="breadcrumb rtl">
			<li><a href="/"><span class="fa fa-home"></span></a></li>
			 <li  ><a href="/gallery/<?=$defult_lang?>"><?=$view_gallery?></a></li>
			 <?$cat_id=get_result("select cat_id from new_modules_catogory where type=9 and page_id={$row15['id']}",$coms_conect);?> 
              <li class="active"><a href="/gallery/<?=$defult_lang?>/category/<?=$cat_id?>"><?=get_result("select name from new_modules_cat where  id=$cat_id",$coms_conect);?></a></li>
                  	<li class="active"><a href="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>"><?=$row15['title'] ?></a></li>
             
		</ol>
	</div>
</section>
<?if($row15["navication_pic"]==''){
$row15["navication_pic"]=get_result("select address from new_default_navbar where name='gallery_nav_picture' and la='$defult_lang' and site='$defult_site'",$coms_conect);	
}
if($row15["navication_pic"]>""){?>	
<!-- Start Slider -->
	<section class="slider pimg animated fadeIn hidden-xs">
	<img src="<?=$row15["navication_pic"]?>" alt="<?=$nav_title?>" style="height:<?=$header_nav_heigth?>px">
	</section>
<?}?>		
	<div class="container">
		<main>
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=2 and pages_id=9  and la='$defult_lang' and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
				if(get_modual_setting_result($defult_site,$defult_lang,'gallery_show_have_ads',$coms_conect))
					$center=$center-2;
			if($RS23['right_block']>0){
				echo ' <aside class="col-md-'.$RS23['right_block'].' col-xs-12 pull-right animated fadeIn">
					<section class="block-col">';
					create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect,$cat_id);
				echo '	</aside>
				</section>';
			}//exit;?>
			<aside class="col-md-<?=$center?> col-xs-12 pull-right animated fadeIn">
                <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect,$cat_id);?>
				<?}
				$temp=urlencode($row15['title']);
				$id=$row15['id'];
				if($row15['id']==''){
					include 'new_dynamics/no_modual.php4';	
				}else if ($row15['mudoal_lock']==1&&$_SESSION["new_okusername"]=='') include 'new_lock_page.php';else{	
				?>
                <!-- Start Main -->
                <div class="row gridgalleryshow animated fadeIn">
                    <div class="col-xs-12 cat_select_search_show row rtl prl0">
                        <h2>
							<span class="fa fa-folder-open"></span>
							<span><?=$view_subjectp?> </span>
							<?$cat_arr=get_modual_cat(9,$madual_id,$coms_conect);
							//print_r($cat_arr);
							foreach ( $cat_arr as $val){
								if($val ['name'])
								   echo "<a target='_balnk' href='/gallery/$defult_lang/category/".$val ['id']."'".">
							    <span class='cc'>{$val ['name']}</span>  
							   </a>";
							}?>
                         </h2>
                    </div>
					<div class="col-xs-12 details sr-details rtl prl0">
						<h1><?=$row15['title']?></h1>
					</div>
					<div class="col-xs-12 tools rtl  ">
						<div class="col-md-6 col-xs-12 pull-right rtl pr0 social">
							<div class=" viewed pull-right">
								<span data-toggle="tooltip" title="<?=$view_visit?>" class="fa fa-eye"></span>
								<span><?=$row15['view']?></span>
							</div>
							<div class="ccomment pull-right">
								<a class="scroll" href="#comments" data-toggle="tooltip" title="<?=$view_number_comments?>"><span class="fa fa-commenting-o"></span></a>
								<span><?=get_result("select count(id) as count from new_madules_comment   where
								type=9 and madul_id=$madual_id",$coms_conect)?></span>
							</div>
							<div class="clike pull-right">
								<?if($_SESSION["new_okusername"]>""){	
									$url=urldecode ($url);$class='';
									if(get_result("select count(id) count from new_favorite where url='$url' and user_name='{$_SESSION["new_okusername"]}'",$coms_conect)>0)
									$class='';
									else 
									$class='-o';?>
								
								<span><?=get_result("select count(id) count from new_favorite where url='$url'",$coms_conect);?></span>
								<?}?>
								<span>تعداد عکس های گالری : <?=get_result("SELECT count(a.id) as count from new_gallery a,new_file_path b   
								where a.id>0 and a.id=b.id and b.type=9  and name='galery_pic' and b.id='$madual_id' and status=1
								order by a.id desc",$coms_conect);?></span>
							</div>
							<script>
							$("#add_to_favorite").click(function (e) {
								$("#added_favorite").hide();
									$("#remove_favorite").hide();
								e.preventDefault();
									$.ajax({
										type:'POST',
										url:'/New_members_ajax.php',
										data:"action=add_to_favorite&id=<?=$url?>",
										success: function(result){
											if(result==0){
												$("#remove_favorite").show();
												$("#added_favorite").hide();
												$("#favorite_span").toggleClass('fa-heart  fa-heart-o');
											}
											else{
												$("#remove_favorite").hide();
												$("#added_favorite").show();
												$("#favorite_span").toggleClass('fa-heart-o  fa-heart');
											}
										}
									});		
								});
							</script>
							<div id="remove_favorite" class="alert alert-error yepalert yepalert-danger" style="position: fixed;display:none">
							  <button type="button" class="close" data-dismiss="alert">×</button> 
							  <strong></strong> <?=$view_remove_favorite?>
							</div>
							<div id="added_favorite" class="yepalert  yepalert-success  alert" style="position: fixed;display:none">
							  <button type="button" class="close" data-dismiss="alert">×</button> 
							  <strong></strong> <?=$view_added_favorite?>
							</div>							
						</div>
						<div class="col-md-6 col-xs-12 pull-left ltr social">
							<div class="col-md-4  viewed dropdown pull-left">
								<a id="dLabel" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								اشتراک<span class="fa fa-share-alt"></span>	
								</a>
								<ul class="dropdown-menu" aria-labelledby="dLabel">
									<li class="action facebook">
										<a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=<?=$domain_name.$url?>&t=<?=$temp?>" title="فیسبوک">فیسبوک<span class="fa fa-facebook"></a>
									</li>
									<li class="action gplus">
										<a  rel="nofollow" href="https://plus.google.com/share?url=<?=$domain_name.$url?>" title="گوگل پلاس">گوگل‌پلاس<span class="fa fa-google-plus"></a>
									</li>
									<li class="action telegram">
										<a rel="nofollow"  href="https://telegram.me/share/url?url=<?=$domain_name.$url?>" title="تلگرام">تلگرام<span class="fa fa-paper-plane"></a>
									</li>
									<li class="action gplus">
										<a  rel="nofollow" href="#" title="اینستاگرام">اینستاگرام<span class="fa fa-instagram"></a>
									</li>
									<li class="action twitter">
										<a  rel="nofollow"  href="http://twitter.com/intent/tweet?url=<?=$domain_name.$url?>&text=<?=$temp?>"  title="توئیتر ">توئیتر<span class="fa fa-twitter"></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					 
					<div id="" >
					<?	$sql1 = "SELECT count(a.id) as cnt  from new_gallery a,new_file_path b  
						where a.id>0 and b.id='$madual_id' and b.type=9 and status=1 and name='galery_pic' and  a.id=b.id";
						$result = $coms_conect->query($sql1);
						$RS = $result->fetch_assoc();
						
						$title=get_result("select title from new_gallery where id=$id",$coms_conect);
						
						$a=new_pgsel($madual_page_id,$RS["cnt"],24,24,"$root/gallery/{$_SESSION['la']}/$id/".insert_dash($title).'/page');
						$from=$a[0];
						$to=$a[1];
						$pgsel=$a[2];			
						$sql12 = "SELECT a.la,a.album_type,a.id,b.adress,a.title,a.mudoal_lock from new_gallery a,new_file_path b   
						where a.id>0 and a.id=b.id and b.type=9  and name='galery_pic' and b.id='$id' and status=1
						order by a.id desc
						LIMIT $from,$to";
						
						
						
						// echo $sql12;exit;
						$resultd1 = $coms_conect->query($sql12);
						if(mysqli_num_rows($resultd1)<1){
							include 'new_dynamics/no_modual.php4';	
								}else if ($row1['mudoal_lock']==1&&!isset($_SESSION["new_okusername"])) get_login_form($site_url);else{	
							echo'<ul id="lightgallery" class="list-unstyled">';
								while($row1 = $resultd1->fetch_assoc()) {
									$la=$row1['la'];
									$title=$row1['title'];
									$id= $row1['id'];
								 ?>
								 <li class="col-md-4 col-xs-6 item pull-right glistpic"  data-src="<?=$row1['adress']?>" data-sub-html="<h4><?=$row1['title']?></h4>">
									<a href="" class="hvr-glow" title="<?=$row1['title']?>">
										<img class="img-responsive img-list-item" src="<?=get_gallery_thumbnail($row1['adress'],$row1['album_type'])?>" alt="<?=$row1['title']?>">
									</a>
								</li>
							<?} 
								
					 
						echo '	</ul>'.$pgsel;	
										?>
					
					</div>	
 
					<style>
					div.img {
						float: right;
					}	

					div.img img {
						width: 100%;
						height: auto;
					}

					div.desc {
						text-align: center;
						font-size: medium;
					}
					</style>	
					<div>
						<div class="col-xs-12 details rtl prl0">
							<fieldset>
								<legend></legend>
								<h4 class="pr10"><?$row15['deatils']=str_replace('img src="source','img src="/source',$row15['deatils']);
								echo $row15['deatils']?></h4> 
								<?if($row15['cameraman']){?>
								<h4 class="pr10"><i class="fa fa-camera" aria-hidden="true"></i><?=$view_gallery_cameraman.' : '.$row15['cameraman']?></h4>
								<?}?>
								<?if($row15['pic_source']){?>
								<h4 class="pr10"><i class="fa fa-pencil-square" aria-hidden="true"></i><a href="<?=$row15['pic_source_link']?>"><?=$view_gallery_source.' : '.$row15['pic_source']?></a></h4>
								<?}?>
							</fieldset>
						</div>
						<?if(get_result("select count(id) from new_mudoal_label where type=9 and id={$row15['id']}",$coms_conect)>0){?>					
							<div class="col-xs-12 tags prl0">
								<fieldset>
									<legend><?=$view_tags?></legend>
									<ul class="pr10">
										<?create_label_pishgaman($row15['id'],'gallery',$madual_lang,$coms_conect,9);?>
									</ul>
								</fieldset>
							</div>	
						<?}?>
						<div id="show_relate">
							<?$sql11="select id from new_related_madual where type=9  and page_id='$id'";	
									$result1 = $coms_conect->query($sql11);
									while($row11 = $result1->fetch_assoc()){
										$related_id[]=$row11['id'];
									}?>
										<script>
										var divs = $("div > .glistpic");
											for(var i = 0; i < divs.length; i+=3) {
											  divs.slice(i, i+3).wrapAll("<div class='row'></div>");
											}
										</script>
										
										<legend><?=$view_related_gallery?>:</legend>
											<div id="testttt">
											<div class="owl-carousel" id="owl-news">
												
													
													<?$j=0;
													if(count($related_id)){
														foreach($related_id as $related__id){
														$sql112="select a.album_type,a.id,b.adress,a.title,a.la from new_file_path b,new_gallery a  where b.type=9 and b.name='galery_pic' and b.id ={$related__id} and a.id=b.id and a.id={$related__id} group by a.id";	
														 
														$result12 = $coms_conect->query($sql112);
														$row12 = $result12->fetch_assoc();
														?>	
														<div class="item">
														<a class = "hvr-glow" href="/gallery/<?=$row12['la']?>/<?=$row12['id'].'/'.insert_dash($row12['title'])?>">
														  <img class = "lazyOwl hvr-glow" src="<?=get_gallery_thumbnail($row12['adress'],$row12['album_type'])?>" alt="<?=$row12['title']?>" width="300" height="200">
														  </a>
														  <a href="/gallery/<?=$row12['la']?>/<?=$row12['id'].'/'.insert_dash($row12['title'])?>" class="desc"><?=$row12['title']?></a>
														</div>
														<?$j++;
														}
													}
													 
													$cat_id=get_result("select cat_id from new_modules_catogory where page_id=$madual_id",$coms_conect);
													/*if($j<6){
														
														$j=6-$j;
														$sql120 = "SELECT a.la,a.album_type,a.id,a.title,a.mudoal_lock from new_gallery a ,new_modules_catogory c   
														where a.id>0  and c.type=9 and a.id<>$madual_id and c.page_id=a.id and c.cat_id=$cat_id    and status=1
														order by a.id desc limit 0,$j";
													 
														$resultd10 = $coms_conect->query($sql120);
														while($row10 = $resultd10->fetch_assoc()) {	
														
														$sql1w1="select adress from new_file_path where type=9 and name='galery_pic' and id ={$row10['id']}";	
														$result1q = $coms_conect->query($sql1w1);
														$roww1 = $result1q->fetch_assoc();
														
														?>
														<div class="item">
															<a class = "hvr-glow" href="/gallery/<?=$row10['la']?>/<?=$row10['id'].'/'.insert_dash($row10['title'])?>">
																<img class = "lazyOwl hvr-glow" src="<?=get_gallery_thumbnail($roww1['adress'],$row10['album_type'])?>" alt="<?=$row12['title']?>" width="300" height="200">
															 </a>
															<a href="/gallery/<?=$row10['la']?>/<?=$row10['id'].'/'.insert_dash($row10['title'])?>" class="desc"><?=$row10['title']?></a>
														</div>	
													<?}}*/?>
											</div>
											</div>
											<img id="waiting" src='/waiting.gif' style="display:none">											
								<script>
													$(document).ready(function() {
													 
													  $("#owl-news").owlCarousel({
														rtl:true,
														lazyLoad : true,
														nav : true,
														loop : true,
														navText : ["<?=$view_Previous?>","<?=$view_Next?>"],
														responsive:{
															0:{
																items : 1
															},
															600:{
																items : 2
															}, 
															1000:{
																items : 3
															}
														}

													  }); 
													 
													});
													</script>						
						</div>
					<?if($row15['can_comment']==1){$low_text= get_tem_result($defult_site,$defult_lang,'low_text','default',$coms_conect);
						echo $low_text['text'];}?>
						<?if($site=='main'&&$row15['can_comment']==1){
						include 'new_dynamics/default/new_modual_comment.php4';
						}else if($site!='main'&&$row15['can_comment']==1)
						include '../new_dynamics/default/new_modual_comment.php4'?>	
					</div>
                </div>
			<?}
				}?>
	 		</aside>
				</section>
				 <?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect,$cat_id); 
						echo '	</aside>
						</section>';
				}?>
			 <?if(get_modual_setting_result($defult_site,$defult_lang,'gallery_show_have_ads',$coms_conect)){?>
                    <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                        <section class="block-col">
                            <div class="block">
                                <div class="content ads-col">
									<?$query="select title,link,pic_adress from new_tem_setting where name='gallery_show_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
<script>		 
$(document).ready(function () {
	$('#lightgallery').lightGallery();
});	

$(document).ready(function () {
	$("#waiting").show();
	$("#owl-news").empty();
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=show_relate_gallery_ajax&id=<?=$madual_id?>&value=<?=$j?>&secend_value=<?=$cat_id?>",
		success: function(result){ 
			$("#waiting").hide();
			 $("#owl-news").html(result);
			 var owl = $("#testttt");
			   owl.owlCarousel({
                items: 4,
                navigation: true
            });

		}
	});	
});	
</script>		
 
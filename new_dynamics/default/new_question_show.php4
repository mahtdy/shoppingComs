<?$faq_show_all_nave= get_tem_result($defult_site,$defult_lang,"question_show_nave",'default',$coms_conect);
$faq_base_setting= get_tem_result($defult_site,$defult_lang,"faq_base_setting",'default',$coms_conect);?>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<!--[if lt IE 9]><script src="/js/jsTree/respond.js"></script><![endif]-->
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>

								<?$query="update new_question set view=view+1 where id=$faq_id"; 
 								$coms_conect->query($query);
								
								$sql12 = "SELECT b.name as cat_name,a.date,a.view,a.answer,a.question,a.id,a.status,a.id,a.la,a.cat_id   from new_question  a ,new_modules_cat b $label_table_str
								where a.id>0 and a.status=2 and a.id=$faq_id and a.site='$defult_site' and a.la='$defult_lang' $faq_str  and a.cat_id=b.id and b.type=99"; 
							    $resultd1 = $coms_conect->query($sql12);$i=1;
							    $row = $resultd1->fetch_assoc();
									$id=$row['id'];
								?> 


            <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
              <a href='<?=$faq_show_all_nave['link']?>' target='_blank'>
			  <img src="<?=$faq_show_all_nave['pic_adress']?>" style="height:<?=$header_nav_heigth?>px">
			  </a>
            </section>
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="/"><span class="fa fa-home"></span></a></li>
                      <li class="active"><a href="/question/<?=$madual_lang?>">پرسش و پاسخ</a></li>
					  <?if($tag>""){?>
					    <li class="active">برچسب</li>
					  <?}else if($cat_id>""){?>
					    <li class="active">دسته بندی</li>
					  <?}?>
					 	<li class="active"><a href="/question/<?=$defult_lang?>/category/<?=$row['cat_id']?>"><?=get_result("select name from new_modules_cat where  id={$row['cat_id']}",$coms_conect);?></a></li>
                    </ol>
                </div>
            </section>
			
			
 	
			
			
			
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-question"></span>

                <h1 class="title"><?=$faq_show_all_nave['title']?></h1>
                <span class="pdesc"><?=$faq_show_all_nave['text']?></span>
            </div>
        </div>
        <!-- End Page Title -->
		<br>
        <div class="container"  >
            <main>
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name'  and file_name=2  and pages_id=99 and la='$defult_lang'  and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'question_show_have_ads',$coms_conect))
				 $center=$center-2;
			if($RS23['right_block']>0){
				      echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'r',$coms_conect);
					 echo '	</aside>
						</section>';
					}//exit;?>
                <!-- Start Main -->
				 <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
                     <section class="block-col">
				<?if($RS23['center']>0){?>
					<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'c',$coms_conect);?>
				<?}?>
                <!-- Start Main -->
                <!-- Start Main -->
                <div class="motadavel" style="margin-top:-15px;">
	 				<div class="row"> 
						<div class="col-md-12 col-sm-12 col-xs-12">
							<form method='post' id='faq_search'>
 
								<div class="input-group btn-search">
								  <span class="input-group-btn"> 
									<button class="btn btn-default box-search" type="button" id="faq_btn"><span class="fa fa-search"></span></button>
								  </span>
								  <input type="text" class="form-control input-search rtl" value='<?=urldecode($sreach_id)?>' id="faqq" name='faqq' placeholder="جستجو ...">
								</div><!-- /input-group -->
								
								<?if($faqq){?>
								<div class="col-md-2 col-sm-2 col-xs-3 pull-right">
									<div class="form-group">
										<button onclick='window.location="/question/<?=$defult_lang?>"' type="button" class="btn btn-primary fullwidth"><?=$view_back?> 
											<span class="fa fa-backward"></span>
										</button>
									</div>
								</div>
								<?}?>		
							</form>	
					<script>	
					$("#faqq").keypress(function (e) {
						if(e.which==13){
							
						   $("#faq_search").attr("action", "/question/<?=$defult_lang?>/search/" + $("#faqq").val());
						
						   $("#faq_search").submit()
						}
					});
					$("#faq_btn").click(function () {  
			 
						   $("#faq_search").attr("action", "/question/<?=$defult_lang?>/search/" + $("#faqq").val());
						   $("#faq_search").submit()
					});
					</script> 							
							<br>
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

						  
								<div class="panel panel-default">
									<div class="panel-body" role="tab" id="heading<?=$i?>">
										<div class="col-md-10">
											<div class="panel-title">
												<a class="faq"  href="<?="/question/{$row['la']}/show/{$row['id']}"?>">
												   <h1><?=$row['question']?></h1>
												</a>
											</div>
											<br>
											<div id="paragraf"> 
											<h2>
											<p class="p-question"><?$row["text"]=str_replace('src="source','src="/source',$row['answer']);
												$row["text"]=str_replace('img src="source','img src="/source',$row["text"]);
													$row["text"]=str_replace('<source src="source','<source src="/source',$row["text"]);
													$row["text"]=str_replace('<a href="source','<a href="/source',$row["text"]);
													$row["text"]=str_replace('<a href="news','<a href="/news',$row["text"]);
													$row["text"]=str_replace('<a href="video','<a href="/video',$row["text"]);
													$row["text"]=str_replace('<img src="yep_theme','<img src="/yep_theme',$row["text"]);
													$row["text"]=str_replace('<audio src="source','<audio src="/source',$row["text"]);
													$row["text"]=str_replace('<video ','<video width="100%" height="100%"',$row["text"]);
													$row["text"]=str_replace('href="source','href="/source',$row["text"]);
													echo $row["text"].'<br>';
										
										
											?></p>
											</h2>
											</div>
											<br>
											<center>
											<?$sql1 = "SELECT name,a.id FROM new_keyword a ,new_mudoal_label b  where  a.id=b.label_id and b.type=99 and  b.id={$row['id']} $tag_str";
											$result1 = $coms_conect->query($sql1);
												while($row1 = $result1->fetch_assoc()) {?>
													<a href="<?="/question/{$row['la']}/tag/{$row1['id']}"?>"><span class="label label-primary"><?=$row1['name']?></span></a>
												<?}?>
											</center>
										</div>
										<div class="col-md-2 feature-faq"> 
											<p><span class="fa fa-calendar"></span><?=miladitojalali(date("Y-m-d ",$row["date"]))?></p>
											<p><a href="<?="/question/{$row['la']}/category/{$row['cat_id']}"?>" class="list-group-item faq"><span class="fa fa-folder"></span> <?=$row['cat_name']?></a></p>
											<button class="btn btn-inverse" type="button">
												<span class="fa fa-eye"></span> <?=$row['view']?> 
											</button>
										</div>
										
									</div>
								</div>
								
									<div class="col-xs-12" id="show_relate">
		 									<legend><?=$view_related_question?></legend>
											<div class="owl-carousel" id="owl-news">
											<? $sql120 = "SELECT   a.la,a.id,a.question from new_question a   
												where a.id>0 and a.id<>$id and   a.cat_id={$row['cat_id']} and la='$defult_lang' and site='$site'   and status=2
												order by a.id desc limit 0,6";
												 //echo $sql120.'<br>';//exit;
												$resultd10 = $coms_conect->query($sql120);
												while($row10 = $resultd10->fetch_assoc()) {	
												?>
												<div class="item">
									 				<a href="<?="/question/{$row10['la']}/show/".$row10['id']?>" class="desc"><?=$row10['question']?></a>
												</div>	
												<?}?>
											</div>	
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
								
								
								 
							</div>
							 
						</div>
	 
					</div>
				</div>
				
				</aside>
					</section>
			
				<?if($RS23['left_block']>0){ 
				      echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
						create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'l',$coms_conect); 
						echo '	</aside>
						</section>';
				} 
					if(get_modual_setting_result($defult_site,$defult_lang,'question_show_have_ads',$coms_conect)){?>
						<aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
							<section class="block-col">
								<div class="block">
									<div class="content ads-col">
										<?$query="select title,link,pic_adress from new_tem_setting where name='question_show_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
		<br>
<script>
$( "img" ).addClass( "img-responsive" );

</script> 			
<style>
.box-search {
    color: #5cb85c;
    background-color: #fff;
	border: none;
	height: 45px;
}
.box-search:hover {
    color: #5cb85c;
    background-color: rgba(255,255,255,0.6);
}
.input-search{
	border: none;
	height: 45px;
}
.btn-search{
	box-shadow: 0px 3px 4px 0px #bdbdbd;
}
.box-cat{
	box-shadow: 0px 3px 4px 0px #bdbdbd;
}
.list-group {
    padding-right: 0;
}
.list-group-item {
    border: none;
    padding: 7px 5px;
}
.faq{
	color:#4695da !important;
	padding: 0px;
}
.feature-faq{
	border-left: 1px solid #ccc;
}
#send-left{
    position: absolute;
    left: 0px;
    margin: 32px auto;
    border-radius: 50%;
    padding-top: 12px;
}
.p-question{
	white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
#btn-newfaq{
	color: white !important;
	background-color: #009688;
	border-color: #007d72;
}
p{font-size: 16px;}
</style>		
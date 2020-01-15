<?$faq_show_all_nave= get_tem_result($defult_site,$defult_lang,"question_show_all_nave",'default',$coms_conect);
$faq_base_setting= get_tem_result($defult_site,$defult_lang,"question_base_setting",'default',$coms_conect);?>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<!--[if lt IE 9]><script src="/js/jsTree/respond.js"></script><![endif]-->
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
            <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
              <a href='<?=$faq_show_all_nave['link']?>' target='_blank'><img src="<?=$faq_show_all_nave['pic_adress']?>"></a>
            </section>
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="/"><span class="fa fa-home"></span></a></li>
                      <li class="active"><a href="/question/<?=$madual_lang?>"><?=$view_faq2?></a></li>
					  <?if($tag>""){?>
					    <li class="active"><?=$view_tag?></li>
					  <?}else if($cat_id>""){?>
					    <li class="active"><a href="/question/<?=$defult_lang?>/category/<?=$cat_id?>"><?=get_result("select name from new_modules_cat where  id=$cat_id",$coms_conect);?></a></li>
					  <?}?>
                    </ol>
                </div>
            </section>
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-question"></span>

                <p class="title"><?=$faq_show_all_nave['title']?></p>
                <span class="pdesc"><?=$faq_show_all_nave['text']?></span>
            </div>
        </div>
        <!-- End Page Title -->
		<br>
        <div class="container"  >
            <main>
			<?if($sreach_id>"")
				$file_name=4;
			else if($cat_id>"")
				$file_name=3;
			else 
				$file_name=1;
			
			
			$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=$file_name  and pages_id=99 and la='$defult_lang'  and status=1";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			$center=$RS23['center'];
			if($center=='')$center=12;
			 if(get_modual_setting_result($defult_site,$defult_lang,'question_have_ads',$coms_conect))
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
                <div class="motadavel" style="margin-top:-15px;">
				
							<?$label_table_str=''; $cat_str='';$tag_str='';$label_str='';
							if($tag>"") {
								$label_table_str= " , new_mudoal_label c";
								$label_str="and c.label_id=$tag and c.type=99 and a.id=c.id";
								$label_groupby=' group by a.id';	
							}
							
							if($cat_id>"") 
								 $cat_str="and a.cat_id=$cat_id";
						
							 $sreach_id=urldecode($sreach_id);
							 if($sreach_id)
								$faq_str="and  (a.question like '%$sreach_id%' or a.answer like '%$sreach_id%')";
								
								$sql1 = "SELECT count(a.id) as cnt  from new_question  a ,new_modules_cat b $label_table_str
								where a.id>0 and a.status=2  and a.site='$defult_site' and a.la='$defult_lang' $faq_str  and a.cat_id=b.id and b.type=99
								$cat_str $label_str
								$label_groupby
								order by a.id desc";
							 //	echo $sql1;exit;
								  $result = $coms_conect->query($sql1);
								 $RS = $result->fetch_assoc();
								  
								 if($cat_id>0)
								 $a=new_pgsel((int)$faq_page,$RS["cnt"],$faq_base_setting['text'],$faq_base_setting['text'],"/question/{$_SESSION['la']}/category/$cat_id/page");
								 else if($tag>0)
								 $a=new_pgsel((int)$faq_page,$RS["cnt"],$faq_base_setting['text'],$faq_base_setting['text'],"/question/{$_SESSION['la']}/tag/$cat_id/page");
								 else 
								 $a=new_pgsel((int)$faq_page,$RS["cnt"],$faq_base_setting['text'],$faq_base_setting['text'],"/question/{$_SESSION['la']}/page");
								 $from=$a[0];
								 $to=$a[1];
								 $pgsel=$a[2];
								
								
								
								$sql12 = "SELECT b.name as cat_name,a.date,a.view,a.answer,a.question,a.id,a.status,a.id,a.la,a.cat_id   from new_question  a ,new_modules_cat b $label_table_str
								where a.id>0 and a.status=2  and a.site='$defult_site' and a.la='$defult_lang' $faq_str  and a.cat_id=b.id and b.type=99
								$cat_str $label_str
								$label_groupby
								order by a.id desc
								limit $from,$to";
								// echo $sql12;
							$$sreach_count='';	
							if($cat_id>"")
								$search_str=$view_ComboNew_cat.' ' .get_result("select name from new_modules_cat where id=$cat_id",$coms_conect);	;
							
							if($sreach_id>"")$search_str=$sreach_id;
							
							
						 	if($tag>"")
								$search_str=$view_ComboNew_cat.' ' .get_result("select name from new_keyword where id=$tag",$coms_conect);	
							
							 	$sreach_count=get_result("SELECT count(a.id)  from new_question  a ,new_modules_cat b $label_table_str
								where a.id>0 and a.status=2  and a.site='$defult_site' and a.la='$defult_lang' $faq_str  and a.cat_id=b.id and b.type=99
								$cat_str $label_str
								
								order by a.id",$coms_conect);
								
								
								
							?>
					<div class="row"> 
 
						<div class="col-md-12 col-sm-12 col-xs-12">
							<form method='post' id='faq_search'>
								<?if($tag>""||$sreach_id>""||$cat_id>""){
									if($sreach_count==0){?>
									<p class="text-right rtl"><b><span style="color:red"><?=$view_no_result_toshow?>  </span>  </b></p> 
									<?}else{?>
								<p class="text-right rtl"><b><span style="color:red"><?=$sreach_count?></span> <?=$view_result_for?>  <span style="color:red"><?=urldecode($search_str)?></span> <?=$view_found?> </b></p> 
									<?}
								}?>
								<div class="input-group btn-search">
								  <span class="input-group-btn"> 
									<button class="btn btn-default box-search" type="button" id="faq_btn"><span class="fa fa-search"></span></button>
								  </span>
								  <input type="text" class="form-control input-search rtl" value='<?=urldecode($sreach_id)?>' id="faqq" name='faqq' placeholder="<?=$seramic_search?> ...">
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
					alert("/question/<?=$defult_lang?>/search/" + $("#faqq").val());
						   $("#faq_search").attr("action", "/question/<?=$defult_lang?>/search/" +  $("#faqq").val());
						   $("#faq_search").submit()
					});
					</script> 							
							<br>
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<?
								$resultd1 = $coms_conect->query($sql12);$i=1;
								while($row = $resultd1->fetch_assoc()) {
									$id=$row['id'];
								?> 
						  
								<div class="panel panel-default">
									<div class="panel-body" role="tab" id="heading<?=$i?>">
										<div class="col-md-10">
											<div class="panel-title">
												<a class="faq"  href="<?="/question/{$row['la']}/show/{$row['id']}"?>">
												   <h3><?=$row['question']?></h3>
												</a>
											</div>
											<br>
											<div id="paragraf"> 
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
											</div>
											<br>
											<center style="text-align:right;">
											<?$sql1 = "SELECT name,a.id FROM new_keyword a ,new_mudoal_label b  where  a.id=b.label_id and b.type=99 and  b.id={$row['id']} $tag_str";
											$result1 = $coms_conect->query($sql1);
												while($row1 = $result1->fetch_assoc()) {?>
													<a href="<?="/question/{$row['la']}/tag/{$row1['id']}"?>"><span class="label label-primary"><?=$row1['name']?></span></a>
												<?}?>
											</center>
										</div>
										<div class="col-md-2 feature-faq"> 
											<p><span class="fa fa-calendar"></span><?=miladitojalaliuser($row["date"],$row['la'],1)?></p>
											<p><a href="<?="/question/{$row['la']}/category/{$row['cat_id']}"?>" class="list-group-item faq"><span class="fa fa-folder"></span> <?=$row['cat_name']?></a></p>
											<button class="btn btn-inverse" type="button">
												<span class="fa fa-eye"></span> <?=$row['view']?> 
											</button>
										</div>
										
									</div>
								</div>
								<?}?>
							</div>
							<?=$pgsel?>
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
					if(get_modual_setting_result($defult_site,$defult_lang,'question_have_ads',$coms_conect)){?>
						<aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
							<section class="block-col">
								<div class="block">
									<div class="content ads-col">
										<?$query="select title,link,pic_adress from new_tem_setting where name='question_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
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
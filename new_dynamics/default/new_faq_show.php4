<?$faq_show_nave= get_tem_result($defult_site,$defult_lang,"faq_show_nave",'default',$coms_conect);
 $faq_base_setting= get_tem_result($defult_site,$defult_lang,"faq_base_setting",'default',$coms_conect);?>
<? $query1="update new_faq set view=view+1 where id=$faq_id";
	$coms_conect->query($query1);
	 
$sql12 = "SELECT a.mudoal_lock,a.cat_id,a.la,a.id,b.name as cat_name,a.date,a.sender_name,a.answer,a.question,a.id,a.status   from new_faq  a   ,new_modules_cat b
	where a.id>0 and a.status=2 and b.type=99 and b.id=a.cat_id and a.id='$faq_id'   and a.site='$defult_site' and a.la='$defult_lang' $faq_str";
	//  echo $sql12;exit;
	 
	
	$resultd1 = $coms_conect->query($sql12);
	$row = $resultd1->fetch_assoc();
	
if ($row['mudoal_lock']==1&&$_SESSION["new_okusername"]=='') include 'new_lock_page.php';else{ 	
	?>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<!--[if lt IE 9]><script src="/js/jsTree/respond.js"></script><![endif]-->
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
            <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
              <a href='<?=$faq_show_nave['link']?>' target='_blank'><img src="<?=$faq_show_nave['pic_adress']?>"></a>
            </section>
            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="#"><span class="fa fa-home"></span></a></li>
                        <li class="active"><?=" پاسخ به پرسش ". $row['question']?></li>
                    </ol>
                </div>
            </section>
        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-question"></span>

                <h1 class="title"><?=$faq_show_nave['title']?></h1>
                <span class="pdesc"><?=$faq_show_nave['text']?></span>
            </div>
        </div>
        <!-- End Page Title -->
		<br>
        <div class="container" style="background-color: #EEEEEE;padding: 10px;">
            <main>
                <!-- Start Main -->
                <div class="motadavel">
				
					<script>	
					$("#faqq").keypress(function (e) {
						if(e.which==13){
						   $("#faq_search").attr("action", "/faq/<?=$defult_lang?>/" + $("#faqq").val());
						   $("#faq_search").submit()
						}
					});
					$("#faq_btn").click(function () {  
						   $("#faq_search").attr("action", "/faq/<?=$defult_lang?>/" + $("#faqq").val());
						   $("#faq_search").submit()
					});
					</script>
                <div class="row">
					<?$col_md=9;
					if(get_modual_setting_result($defult_site,$defult_lang,'faq_show_have_ads',$coms_conect)){?>
						<aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
							<section class="block-col">
								<div class="block">
									<div class="content ads-col">
										<?$query="select title,link,pic_adress from new_tem_setting where name='faq_show_have_ads'  and la='$defult_lang' and site='$defult_site'"; 
											$result = $coms_conect->query($query);
											while($RS = $result->fetch_assoc()) {?>
												<a href="<?=$RS['link']?>" title='<?=$RS['title']?>'><img src="<?=$RS['pic_adress']?>"></a>
											<?}?>
									</div>
								</div>
							</section>
						</aside>
					 <?$col_md=7;}?>
					<div class="col-md-<?=$col_md?> col-sm-12 col-xs-12">
  
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                      
                            <div class="panel panel-default">
                                <div class="panel-body" role="tab" id="heading<?=$i?>">
									<div class="col-md-12">
										<div class="panel-title">
											<a class="faq" data-parent="#accordion" href="#collapse<?=$i?>" aria-controls="collapse<?=$i?>">
											   <h3><?=$row['question']?></h3>
											</a>
										</div>
										<br>
										<div class="feature-faq">
											<p>توسط <a href=""><?=$row['sender_name']?></a></p>
											<p><span class="fa fa-calendar"></span>ارسال در تاریخ <?=miladitojalali(date("Y-m-d ",$row["date"]))?> </p>
											<p><a href="<?="/faq/{$row['la']}/category/{$row['cat_id']}"?>" class="list-group-item faq"><span class="fa fa-folder"></span> <?=$row['cat_name']?></a></p>
										</div>
										<br>
										<p>
										<?$row["text"]=str_replace('src="source','src="/source',$row['answer']);
												$row["text"]=str_replace('img src="source','img src="/source',$row["text"]);
													$row["text"]=str_replace('<source src="source','<source src="/source',$row["text"]);
													$row["text"]=str_replace('<a href="source','<a href="/source',$row["text"]);
													$row["text"]=str_replace('<a href="news','<a href="/news',$row["text"]);
													$row["text"]=str_replace('<a href="video','<a href="/video',$row["text"]);
													$row["text"]=str_replace('<img src="yep_theme','<img src="/yep_theme',$row["text"]);
													$row["text"]=str_replace('<audio src="source','<audio src="/source',$row["text"]);
													$row["text"]=str_replace('<video ','<video width="100%" height="100%"',$row["text"]);
													$row["text"]=str_replace('href="source','href="/source',$row["text"]);
													echo "<h2>".$row["text"].'</h2><br>';
										
										
										?></p>
											<center>
											<?$sql1 = "SELECT name,a.id FROM new_keyword a ,new_mudoal_label b  where  a.id=b.label_id and b.type=99 and  b.id='{$row['id']}' $tag_str";
											$result1 = $coms_conect->query($sql1);
												while($row1 = $result1->fetch_assoc()) {?>
													<a href="<?="/faq/{$row['la']}/tag_id/{$row1['id']}"?>"><span class="label label-primary"><?=$row1['name']?></span></a>
												<?}?>
											</center>
										<br>
						 
									</div>
                                </div>
                          
                            </div> <?if(get_result("SELECT count(a.id)  from new_faq  a   ,new_modules_cat b
							where a.id>0 and a.status=2 and b.type=99 and b.id=a.cat_id and   cat_id={$row['cat_id']} and a.id<>{$row['id']}   and a.site='$defult_site' and a.la='$defult_lang' $faq_str",$coms_conect)>0){?>
						 	<h4 class="text-right">پرسش های مرتبط</h4>
							<div class="panel panel-default box-cat">
								<div class="panel-body">
							 <?$sql123 = "SELECT a.id,a.question   from new_faq  a   ,new_modules_cat b
							where a.id>0 and a.status=2 and b.type=99 and b.id=a.cat_id   and cat_id={$row['cat_id']} and a.id<>{$row['id']}   and a.site='$defult_site' and a.la='$defult_lang' $faq_str order by a.id limit 0,{$faq_base_setting['link']}";
							 //  echo $sql12;exit;
							$resultd13 = $coms_conect->query($sql123);
							while($row3 = $resultd13->fetch_assoc()) {?> 
									<p><a href="<?="/faq/{$row['la']}/show/{$row3['id']}"?>" class=""><span class="glyphicon glyphicon-question-sign"></span> <?=$row3['question']?></a></p>
							<?}?>
							 </div>
							</div>
							<?}?>
						</div>
					</div>
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="panel panel-default box-cat">
							<div class="panel-heading rtl" style="font-weight: bold;">دسته بندی</div>
							<div class="panel-body">
							<div id="jstree-proton-2"  class="proton-demo"></div>
								<!--ul class="list-group">
								<?$sql122 = "SELECT name,id,la from  new_modules_cat 
									where  status=1  and  la='$defult_lang' and type=99 
									order by id desc";
									//   echo $sql122;exit;
									$resultd12 = $coms_conect->query($sql122);$i=1;
									while($row2 = $resultd12->fetch_assoc()) {?>
								  <a href="<?="/faq/{$row2['la']}/category/{$row2['id']}"?>" class="list-group-item faq"><span class="fa fa-folder"></span> <?=$row2['name']?> <span class="pull-left badge"><?=get_result("select count(id) from new_faq where la='$defult_lang' and cat_id={$row2['id']}",$coms_conect);?></span></a>
								<?}?>  
								</ul-->
							</div>
						</div>
						<a class="btn btn-block" id="btn-newfaq" href="/faq/<?=$defult_lang?>/new"> پرسش جدید دارید؟ <i class="fa fa-send"></i></a>
					</div>
					
					<?$cat_arr[]="";$edit_id=0;?>
													<script>
														$(function() {
															$('#jstree-proton-2').jstree({
																'plugins': ['core', 'themes', 'json', "json_data"],
																'checkbox': { //new config
																'keep_selected_style': true,
																'three_state': false,
																'tie_selection':true,
																'cascade':'up'
																},
																'core': {
																'data': [<?creat_first_faq_cat(0,99,$coms_conect,$defult_lang);?>],
																'themes': {
																 'name': 'proton',
																 'responsive': true  
																}
																}
																}).bind("select_node.jstree", function (e, data) {
																	 var href = data.node.a_attr.href;
																	 var parentId = data.node.a_attr.parent_id;
																	 if(href == '#')
																	 return '';
																	 window.open(href);
																	})

																});
													 
											</script>
											<script>
												$(function () {
													$('#jstree-proton-2').jstree({'plugins':["wholerow","checkbox"]});
													$('#jstree-proton-2').on("changed.jstree", function (event, data) {
														$("#array_value").val(data.selected);
												});
												});
												
												
												

											</script>
                </div>
                </div>
                <!-- end main row -->

            <!-- end main -->
        </div>
    </main>
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
 
#btn-newfaq{
	color: white !important;
	background-color: #009688;
	border-color: #007d72;
}
p{font-size: 16px;}
</style>		
<?}?>
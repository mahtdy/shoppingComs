
<?$q= urldecode(injection_replace($rss_id));


$module_type=get_result("select id from new_modules where link='$search_module'",$coms_conect);
$news_video=injection_replace($_GET['news_video']);

$start_date_str="";
if(isset($_GET['start_date'])&&$_GET['start_date']>""){
	$start_date=urldecode(injection_replace($_GET['start_date']));
	$start_date=strtotime(jalalitomiladi($start_date));
	$start_date_str=" and publish_date>=$start_date";
	$start_date_str=" and publish_date>=$start_date";
}

$end_date_str ='';
if(isset($_GET['end_date'])&&$_GET['end_date']>""){
	$end_date=urldecode(injection_replace($_GET['end_date']));
	$end_date=strtotime(jalalitomiladi($end_date));
	$end_date_str = " and publish_date<=$end_date";
}

 


$news_gallery=injection_replace($_GET['news_gallery']);
$news_voice=injection_replace($_GET['news_voice']);
$search_type=injection_replace($_GET['search_type']);
$search_module_type=injection_replace($_GET['search_type']);
if($search_type==1)
	$search_type="= '$q'";
if($search_type==2)
	$search_type="like '$q%'";
if($search_type==3)
	$search_type="like '%$q'";
if($search_type==4||$search_type=='')
	$search_type="like '%$q%'";
$module_search_tag=injection_replace($_GET['module_search_tag']);
$module_search_cat=injection_replace($_GET['module_search_cat']);
if($module_search_tag>0){
	
	$module_search_tag_table=',new_mudoal_label c ';
	$module_search_tag_condition=" and c.type=$module_type and c.id=a.id and label_id=$module_search_tag ";
}else{
	$module_search_tag_table=' ';
	$module_search_tag_condition="  ";	
}

if($module_search_cat>0){
	
	$module_search_cat_table=',new_modules_catogory d ';
	$module_search_cat_condition=" and d.type=$module_type and d.page_id=a.id and d.cat_id=$module_search_cat ";
}else{
	$module_search_cat_table=' ';
	$module_search_cat_condition="  ";	
}

?>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<link href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/search.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script src="/yep_theme/default/rtl/js/select2_4/select2.js"></script>
<div class="container" style="margin-top: 50px"> 
    <div class="search-in">
        <div class="row">
            <div class="col-md-6 col-xs-12 pull-right">
			<form method='post' id='search_frm'>
                <div class="input-group">
				
                    <input type="text" class="form-control" name='q' value="<?=$q?>" id="Searchtext" placeholder="Search for...">
 
                <span class="input-group-btn">
					<button id="search_btn" class="btn btn-default" type="button">Go!</button>
					<input id="search_module_name" value="<?=$search__module?>" type="hidden">
				</span>
					<script>	
					$("#Searchtext").keypress(function (e) {
						if(e.which==13){
						   $("#search_frm").attr("action", "/search/<?=$defult_lang?>/"+$("#Searchtext").val()+'/<?=$search__module?>/1');  
						   $("#search_frm").submit()
						}
					}); 
					$("#search_btn").click(function () {  
						   $("#search_frm").attr("action", "/search/<?=$defult_lang?>/"+$("#Searchtext").val()+'/<?=$search__module?>/1');  
						   $("#search_frm").submit() 
					});					 
					</script>
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
		</form>
    </div>
	<form>
    <div class="search-menu">
		<ul class="nav nav-pills col-xs-12">
			<?
			$download_str ="and (a.en_description   $search_type  or a.download_info   $search_type or a.notes   $search_type or a.name   $search_type or a.title   $search_type or a.abstract   $search_type or a.description   $search_type  or  a.meta_keyword   $search_type  or  a.meta_desciption   $search_type)";
			$blog_str ="and (a.name   $search_type or a.title   $search_type or a.abstract   $search_type or a.continue_blog   $search_type  or  a.meta_keyword   $search_type  or  a.meta_desciption   $search_type)";
			$article_str ="and (a.author   $search_type or a.title   $search_type or a.translator   $search_type   or a.publisher   $search_type or  a.meta_keyword   $search_type  or  a.meta_desciption   $search_type)";
			$gallery_str ="and (a.cameraman   $search_type or a.title   $search_type or a.pic_source   $search_type or a.deatils   $search_type or  a.meta_keyword   $search_type  or  a.meta_desciption   $search_type)";
			$video_str ="and (a.video_source   $search_type or a.title   $search_type  or a.deatils   $search_type or  a.meta_keyword   $search_type  or  a.meta_desciption   $search_type)";
			$content_str ="and (a.name   $search_type or a.title   $search_type or a.text   $search_type or a.abstract   $search_type or  a.meta_keyword   $search_type  or  a.meta_desciption   $search_type)";
			$page_str ="and (a.name   $search_type or a.title   $search_type or a.text   $search_type or  a.meta_keyword   $search_type  or  a.meta_desciption   $search_type)";
			$news_str ="and (a.name   $search_type or a.title   $search_type or a.text   $search_type or a.abstract   $search_type or  a.meta_keyword   $search_type  or  a.meta_desciption   $search_type)";
																			
			 //	echo $news_str;exit; 
			$sql = "SELECT id,table_name,link,name FROM new_modules where status=0";
			$result = $coms_conect->query($sql);
			while($row = $result->fetch_assoc()) {
				switch ($row['link']){
					case 'news':
					$str=$news_str;
					$news_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$news_video,$news_gallery,$news_voice,$start_date_str,$end_date_str);
					break;
					case 'page':
					$str=$page_str;
				 	$page_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$news_video,$news_gallery,$news_voice,$start_date_str,$end_date_str);
					break;
					case 'content':
					$str=$content_str;
					$content_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$news_video,$news_gallery,$news_voice,$start_date_str,$end_date_str);
					break;
					case 'video':
					$str=$video_str;
					$video_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$news_video,$news_gallery,$news_voice,$start_date_str,$end_date_str);
					break;	
					case 'gallery':
					$str=$gallery_str;
					$gallery_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$news_video,$news_gallery,$news_voice,$start_date_str,$end_date_str);
					break;
					case 'article':
					$str=$article_str;
					$article_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$news_video,$news_gallery,$news_voice,$start_date_str,$end_date_str);
					break;
					case 'blog':
					$str=$blog_str;
					$blog_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$news_video,$news_gallery,$news_voice,$start_date_str,$end_date_str);
					break;
					case 'download':
					$str=$download_str;
					$download_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$news_video,$news_gallery,$news_voice,$start_date_str,$end_date_str);
					break;
				} 
				$module_count=get_srearch_module_result($row['id'],$row['link'],$str,$row['table_name'],$coms_conect,$site,$la,$module_search_tag,$module_search_cat,$start_date_str,$end_date_str);
				if($module_count>0){
					$str_select='';
					if($search_module==$row['link'])$str_select='active';
					echo "<li role='presentation'  class='$str_select'><a class='search_href' value='{$row['link']}' href='#'>{$row['name']}</a></li>";
				}
			}?>
			<?
			$faq_str="and (a.answer   $search_type or a.question   $search_type)";
			 $faq_count=get_srearch_module_result(100,'faq',$faq_str,'new_faq',$coms_conect,$site,$la,$module_search_tag);
			if($faq_count>0){?>
			 <li role="presentation" class="<?if($search_module=='faq')echo 'active';?>"> <a class="search_href" value='faq' href="#">سوالات متداول</a></li>
			<?}
			$question_count=get_srearch_module_result(99,'question_count',$faq_str,'new_question',$coms_conect,$site,$la,$module_search_tag);
			if($question_count>0){?>
            <li role="presentation" class="<?if($search_module=='question')echo 'active';?>"> <a class="search_href" value='question' href="#">پرسش و پاسخ</a></li>
			<?}?>
        </ul>
    </div>
					<script>	
					$("#Searchtext").keypress(function (e) {
						if(e.which==13){
						   $("#search_frm").attr("action", "/search/<?=$defult_lang?>/"+$("#Searchtext").val()+'/<?=$search__module?>/1');  
						   $("#search_frm").submit()
						}
					}); 
					$("#search_btn").click(function () {  
						   $("#search_frm").attr("action", "/search/<?=$defult_lang?>/"+$("#Searchtext").val()+'/<?=$search__module?>/1');  
						   $("#search_frm").submit() 
					});	
					$(".search_href").click(function () {  
						   $("#search_frm").attr("action", "/search/<?=$defult_lang?>/"+$("#Searchtext").val()+'/'+$(this).attr('value')+'/1');  
						   $("#search_frm").submit() 
					});						
					</script>
    <div class="search-button">
	<legend>
	نوع جستجو  
	</legend>
        <div class="btn-group">
        
				<select class="selectpicker btn" name="search_type" id="search_type">
					<option <?if($search_module_type<=1) echo 'selected';?>  value="1">عین عبارت</option>
					<option  <?if($search_module_type==2) echo 'selected';?> value="2">با این عبارت شروع شود</option>
					<option  <?if($search_module_type==3) echo 'selected';?> value="3">با این عبارت تمام شود</option>
					<option  <?if($search_module_type==4||$search_module_type=='') echo 'selected';?> value="4">شامل این عبارت بشود</option>
				</select>
          
        </div><?$start_date_val='';$end_date_val='';
		if($start_date>0)
				$start_date_val=miladitojalaliuser(date('Y-m-d',$start_date));
			if($end_date>0)
				$end_date_val=miladitojalaliuser(date('Y-m-d',$end_date));?>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    هر زمان <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
				
                    <li><input name='start_date' id="start_date" value="<?=$start_date_val?>"></li>
                    <li><input name='end_date' id="end_date" value="<?=$end_date_val?>"></li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    انتخاب سایت <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
					<?$sql = "SELECT name,id FROM new_subsite where status=1";
					$result = $coms_conect->query($sql);
					while($row1 = $result->fetch_assoc()) {
						echo " <li><a value='{$row1['id']}' href='#'>{$row1['name']}</a></li>";
					}?>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    انتخاب زبان <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
				<?$sql = "SELECT title,name FROM new_language where status=1";
					$result = $coms_conect->query($sql);
					while($row = $result->fetch_assoc()) {
						echo " <li value='{$row['title']}' class='change_lang'><a  href='#'>{$row['name']}</a></li>";
					}?>
                   
                </ul>
            </div>
    </div>
 
    <div class="search-result">
        <div class="col-xs-9 pull-right">
			<?if($search_module=='page'){?>
            <div class="search-section col-xs-12 search-page-result">
                <div class="heading-s col-xs-12">
                    <h3>
                        نتایج صفحات
                        <span class="pull-left">
							<?=$page_count?> نتیجه
						</span>
						</h3>
				</div>
					<?$a=new_pgsel((int)$search_page,$page_count,10,10,"/search/$la/$q/page");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					
					$sql1 = "SELECT b.cat_id,user_id,date,a.id,name,title,la from new_static_page a,new_modules_catogory b   $module_search_tag_table $module_search_cat_table
					where   a.id=b.page_id and a.status=1 and  b.type=5 and la='$defult_lang'
					$module_search_tag_condition
					and site='$defult_site' $page_str
					group by b.page_id 
					limit $from,$to";
					
					$result = $coms_conect->query($sql1);
					//  echo $sql1;//exit;
					while($RS = $result->fetch_assoc()){?>
						<div class="page-topic col-xs-12">
							<a href="<?="/{$RS['name']}/{$RS['la']}/".insert_dash($RS['title'])?>">
								<h4><?=$RS['name']?></h4>
							</a>
							<h5><?="/{$RS['name']}/{$RS['la']}/".insert_dash($RS['title'])?></h5>
							<p>
								<?=$RS['title']?>
							</p>
						</div>
					 
					<?}?>
            </div>
			<?}?>
			<?if($search_module=='content'){?>
				<div class="search-section col-xs-12 search-news-result">
					<div class="heading-s">
						<h3>
							نتایج محتوا
							<span class="pull-left">
							<?=$content_count?> نتیجه
						</span>
						</h3>
					</div>
					<?$a=new_pgsel((int)$search_page,$content_count,10,10,"/search/$la/$q/content");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					$sql1 = "SELECT b.cat_id,user_id,date,a.id,name,title,abstract from new_content a,new_modules_catogory b  $module_search_tag_table $module_search_cat_table
					where   a.id=b.page_id and a.status=1 and  b.type=11 and la='$defult_lang'
					$module_search_tag_condition $module_search_cat_condition  $end_date_str $start_date_str
					and site='$defult_site' $content_str
					group by b.page_id 
					limit $from,$to";
					
					$result = $coms_conect->query($sql1);
					 //echo $sql1;exit;
					while($RS = $result->fetch_assoc()){?>
					
					<div class="news-topic col-xs-12">
						<div class="col-xs-3 pull-right">
							<a href="<?="/content/$la/{$RS['id']}/".insert_dash($RS['name'])?>">	
								<img src="<?=get_result("select adress from new_file_path where type=11 and name='content_image' and id={$RS['id']}",$coms_conect);?>" alt="<?=$RS['title']?>">
							</a>	
						</div>
						<div class=" col-xs-9 pull-left"> 
							<a href="<?="/content/$la/{$RS['id']}/".insert_dash($RS['name'])?>">
								<h4><?=$RS['title']?></h4>
							</a>
							<h5><?=jdate('d  F  Y | H:m:s',$RS['date']);?>
							-
							<?=get_result("select name from new_modules_cat where id={$RS['cat_id']} and type=11 order by rang desc",$coms_conect);?>
							-
							<?=get_result("select name from new_managers where id={$RS['user_id']}",$coms_conect);?>
							</h5>
							<p>
								<?=$RS['abstract']?>
							</p>
							<?$sql11 = "SELECT a.id,name from new_mudoal_label a,new_keyword b   
								where   a.label_id=b.id and a.id={$RS['id']} and type=11";
								$result1 = $coms_conect->query($sql11);
								while($RS1 = $result1->fetch_assoc()){?>
									<a class="search-tags" href="<?="/content/$la/keyword/{$RS1['name']}/1"?>"><?=$RS1['name']?></a>
								<?}?>
						</div>
					</div>
					<?}?>
					<?=$pgsel?>
 				</div>
					
			<?}?>
			
			<?if($search_module=='blog'){?>
				<div class="search-section col-xs-12 search-news-result">
					<div class="heading-s">
						<h3>
							نتایج بلاگ
							<span class="pull-left">
							<?=$blog_count?> نتیجه
						</span>
						</h3>
					</div>
					<?$a=new_pgsel((int)$search_page,$blog_count,10,10,"/search/$la/$q/blog");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					$sql1 = "SELECT b.cat_id,user_id,date,a.id,title from new_blog a,new_modules_catogory b   $module_search_tag_table $module_search_cat_table
					where   a.id=b.page_id and a.status=1 and  b.type=10 and la='$defult_lang'
					$module_search_tag_condition $module_search_cat_condition  $end_date_str $start_date_str
					and site='$defult_site' $blog_str
					group by b.page_id 
					limit $from,$to";
					
					$result = $coms_conect->query($sql1);
					//echo $sql1;exit;
					while($RS = $result->fetch_assoc()){?>
					 
					<div class="news-topic col-xs-12">
 						<div class=" col-xs-12 pull-left"> 
							<a href="<?="/blog/$la/{$RS['id']}/".insert_dash($RS['title'])?>">
								<h4><?=$RS['title']?></h4>
							</a>
							<h5><?=jdate('d  F  Y | H:m:s',$RS['date']);?>
							-
							<?=get_result("select name from new_modules_cat where id={$RS['cat_id']} and type=10 order by rang desc",$coms_conect);?>
							-
							<?=get_result("select name from new_managers where id={$RS['user_id']}",$coms_conect);?>
							</h5>
							<?$sql11 = "SELECT a.id,name from new_mudoal_label a,new_keyword b   
								where   a.label_id=b.id and a.id={$RS['id']} and type=10";
								$result1 = $coms_conect->query($sql11);
								while($RS1 = $result1->fetch_assoc()){?>
									<a class="search-tags" href="<?="/blog/$la/keyword/{$RS1['name']}/1"?>"><?=$RS1['name']?></a>
								<?}?>
						</div>
					</div>
					<?}?>
					<?=$pgsel?>
 				</div>
					
			<?}?>
			
			<?if($search_module=='download'){?>
				<div class="search-section col-xs-12 search-news-result">
					<div class="heading-s">
						<h3>
							نتایج مقاله
							<span class="pull-left">
							<?=$download_count?> نتیجه
						</span>
						</h3>
					</div>
					<?$a=new_pgsel((int)$search_page,$download_count,10,10,"/search/$la/$q/download");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					$sql1 = "SELECT b.cat_id,user_id,date,a.id,title from new_download a,new_modules_catogory b    $module_search_tag_table $module_search_cat_table
					where   a.id=b.page_id and a.status=1 and  b.type=6 and la='$defult_lang'
					$module_search_tag_condition $module_search_cat_condition   $end_date_str $start_date_str
					and site='$defult_site' $download_str
					group by b.page_id 
					limit $from,$to";
					
					$result = $coms_conect->query($sql1);
					//echo $sql1;exit;
					while($RS = $result->fetch_assoc()){?>
					 
					<div class="news-topic col-xs-12">
						<div class="col-xs-3 pull-right">
							<a href="<?="/download/$la/{$RS['id']}/".insert_dash($RS['title'])?>">	
								<img src="<?=get_result("select adress from new_file_path where type=6 and name='download_pic' and id={$RS['id']}",$coms_conect);?>" alt="<?=$RS['title']?>">
							</a>	
						</div>
						<div class=" col-xs-9 pull-left"> 
							<a href="<?="/download/$la/{$RS['id']}/".insert_dash($RS['title'])?>">
								<h4><?=$RS['title']?></h4>
							</a>
							<h5><?=jdate('d  F  Y | H:m:s',$RS['date']);?>
							-
							<?=get_result("select name from new_modules_cat where id={$RS['cat_id']} and type=6 order by rang desc",$coms_conect);?>
							-
							<?=get_result("select name from new_managers where id={$RS['user_id']}",$coms_conect);?>
							</h5>
							<?$sql11 = "SELECT a.id,name from new_mudoal_label a,new_keyword b   
								where   a.label_id=b.id and a.id={$RS['id']} and type=6";
								$result1 = $coms_conect->query($sql11);
								while($RS1 = $result1->fetch_assoc()){?>
									<a class="search-tags" href="<?="/download/$la/keyword/{$RS1['name']}/1"?>"><?=$RS1['name']?></a>
								<?}?>
						</div>
					</div>
					<?}?>
					<?=$pgsel?>
 				</div>
					
			<?}?>
			<?if($search_module=='article'){?>
				<div class="search-section col-xs-12 search-news-result">
					<div class="heading-s">
						<h3>
							نتایج دانلود
							<span class="pull-left">
							<?=$article_count?> نتیجه
						</span>
						</h3>
					</div>
					<?$a=new_pgsel((int)$search_page,$article_count,10,10,"/search/$la/$q/article");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					$sql1 = "SELECT b.cat_id,user_id,date,a.id,title from new_article a,new_modules_catogory b   $module_search_tag_table $module_search_cat_table
					where   a.id=b.page_id and a.status=1 and  b.type=7 and la='$defult_lang'
					$module_search_tag_condition $module_search_cat_condition  $end_date_str $start_date_str
					and site='$defult_site' $article_str
					group by b.page_id 
					limit $from,$to";
					
					$result = $coms_conect->query($sql1);
					/// echo $sql1;exit;
					while($RS = $result->fetch_assoc()){?>
					
					<div class="news-topic col-xs-12">
						<div class="col-xs-3 pull-right">
							<a href="<?="/article/$la/{$RS['id']}/".insert_dash($RS['title'])?>">	
								<img src="<?=get_result("select adress from new_file_path where type=7 and name='article_image' and id={$RS['id']}",$coms_conect);?>" alt="<?=$RS['title']?>">
							</a>	
						</div>
						<div class=" col-xs-9 pull-left"> 
							<a href="<?="/article/$la/{$RS['id']}/".insert_dash($RS['title'])?>">
								<h4><?=$RS['title']?></h4>
							</a>
							<h5><?=jdate('d  F  Y | H:m:s',$RS['date']);?>
							-
							<?=get_result("select name from new_modules_cat where id={$RS['cat_id']} and type=7 order by rang desc",$coms_conect);?>
							-
							<?=get_result("select name from new_managers where id={$RS['user_id']}",$coms_conect);?>
							</h5>
							<?$sql11 = "SELECT a.id,name from new_mudoal_label a,new_keyword b   
								where   a.label_id=b.id and a.id={$RS['id']} and type=7";
								$result1 = $coms_conect->query($sql11);
								while($RS1 = $result1->fetch_assoc()){?>
									<a class="search-tags" href="<?="/article/$la/keyword/{$RS1['name']}/1"?>"><?=$RS1['name']?></a>
								<?}?>
						</div>
					</div>
					<?}?>
					<?=$pgsel?>
 				</div>
					
			<?}?>	
			<?if($search_module=='news'){?>
				<div class="search-section col-xs-12 search-news-result">
					<div class="heading-s">
						<h3>
							نتایج اخبار
							<span class="pull-left">
							<?=$news_count?> نتیجه
						</span>
						</h3>
					</div>
					<?$a=new_pgsel((int)$search_page,$news_count,10,10,"/search/$la/$q/news");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					
					
	$news_video1=(injection_replace($news_video)=="") ? '0-1' : '1';
$news_gallery1=(injection_replace($news_gallery)=="") ? '0-1' : '1';
$news_voice1=(injection_replace($news_voice)=="") ? '0-1' : '1';	
	$news_video_str='';
 	if($news_video==1 or $news_gallery==1 or $news_voice==1)
 		$news_video_str=' and (news_type REGEXP "'."^[0-1][$news_video1][$news_gallery1][$news_voice1][0-1]+$".'"  )';					
					
					
					$sql1 = "SELECT b.cat_id,user_id,date,a.id,name,title,abstract from new_news a,new_modules_catogory b  $module_search_tag_table  $module_search_cat_table
					where   a.id=b.page_id and a.status=1 and  b.type=1 and la='$defult_lang'
					$module_search_tag_condition $module_search_cat_condition  $end_date_str $start_date_str
					and site='$defult_site' $news_str $news_video_str
					group by b.page_id 
					limit $from,$to";
					
					$result = $coms_conect->query($sql1);
					// echo $sql1;exit;
					while($RS = $result->fetch_assoc()){?>
					
					<div class="news-topic col-xs-12">
						<div class="col-xs-3 pull-right">
							<a href="<?="/news/$la/{$RS['id']}/".insert_dash($RS['title'])?>">	
								<img src="<?=get_result("select adress from new_file_path where type=1 and name='news_image' and id={$RS['id']}",$coms_conect);?>" alt="<?=$RS['title']?>">
							</a>	
						</div>
						<div class=" col-xs-9 pull-left"> 
							<a href="<?="/news/$la/{$RS['id']}/".insert_dash($RS['name'])?>">
								<h4><?=$RS['title']?></h4>
							</a>
							<h5><?=jdate('d  F  Y | H:m:s',$RS['date']);?>
							-
							<?=get_result("select name from new_modules_cat where id={$RS['cat_id']} and type=1 order by rang desc",$coms_conect);?>
							-
							<?=get_result("select name from new_managers where id={$RS['user_id']}",$coms_conect);?>
							</h5>
							<p>
								<?=$RS['abstract']?>
							</p>
							<?$sql11 = "SELECT a.id,name from new_mudoal_label a,new_keyword b   
								where   a.label_id=b.id and a.id={$RS['id']} and type=1";
								$result1 = $coms_conect->query($sql11);
								while($RS1 = $result1->fetch_assoc()){?>
									<a class="search-tags" href="<?="/news/$la/keyword/{$RS1['name']}/1"?>"><?=$RS1['name']?></a>
								<?}?>
						</div>
					</div>
					<?}?>
					<?=$pgsel?>
 				</div>
			<?}?>
			<?if($search_module=='video'){?>
            <div class="search-section col-xs-12 search-video-result">
                <div class="heading-s">
                    <h3>
                        نتایج ویدئو
                        <span class="pull-left">
							<?=$video_count?> نتیجه
						</span>
                    </h3>
                </div>
					<?$a=new_pgsel((int)$search_page,$video_count,10,10,"/search/$la/$q/video");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					$sql1 = "SELECT b.cat_id,user_id,date,a.id,title from new_video a,new_modules_catogory b   $module_search_tag_table $module_search_cat_table
					where   a.id=b.page_id and a.status=1 and  b.type=8 and la='$defult_lang'
					$module_search_tag_condition $module_search_cat_condition  $end_date_str $start_date_str
					and site='$defult_site' $video_str
					group by b.page_id 
					limit $from,$to";
			
					$result = $coms_conect->query($sql1);
					  //echo $sql1;exit;
					while($RS = $result->fetch_assoc()){?>
					<div class="gallery-topic col-xs-12">
						<a href="<?="/video/$la/{$RS['id']}/".insert_dash($RS['title'])?>">	
							<h4><?=$RS['title']?></h4>
						</a>
						<div class="col-xs-3 pull-right">
						<a href="<?="/video/$la/{$RS['id']}/".insert_dash($RS['title'])?>">	
							<img src="<?=get_modual_address($RS['id'],$coms_conect)?>" alt="<?=$RS['title']?>">
						</a>
						</div>
						<div class=" col-xs-9 pull-left">
							<?$sql11 = "SELECT a.id,name from new_mudoal_label a,new_keyword b   
							where   a.label_id=b.id and a.id={$RS['id']} and type=8";
							//echo $sql11;
							$result1 = $coms_conect->query($sql11);
							while($RS1 = $result1->fetch_assoc()){?>
								<a class="search-tags" href="<?="/video/$la/keyword/{$RS1['name']}/1"?>"><?=$RS1['name']?></a>
							<?}?>
							<h5>منتشر شده توسط : <?=get_result("select name from new_managers where id={$RS['user_id']}",$coms_conect);?></h5>
							<h4>
								انتشار <?=jdate('d  F  Y | H:m:s',$RS['date']);?>
							</h4>
						</div> 
					</div>
					<?}?>
					<?=$pgsel?>
            </div>
			<?}?>
			<?if($search_module=='gallery'){?>
            <div class="search-section col-xs-12 search-gallery-result">
                <div class="heading-s">
                    <h3>
                        نتایج گالری
                        <span class="pull-left">
							<?=$gallery_count?> نتیجه
						</span>
                    </h3>
                </div>
					<?$a=new_pgsel((int)$search_page,$gallery_count,10,10,"/search/$la/$q/gallery");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					$sql1 = "SELECT b.cat_id,user_id,date,a.id,title from new_gallery a,new_modules_catogory b   $module_search_tag_table $module_search_cat_table
					where   a.id=b.page_id and a.status=1 and  b.type=9 and la='$defult_lang'
					$module_search_tag_condition $module_search_cat_condition  $end_date_str $start_date_str
					and site='$defult_site' $gallery_str
					group by b.page_id 
					limit $from,$to";
			
					$result = $coms_conect->query($sql1);
					 //  echo $sql1;//exit;
					while($RS = $result->fetch_assoc()){?>
					<div class="gallery-topic col-xs-12">
						<a href="<?="/gallery/$la/{$RS['id']}/".insert_dash($RS['title'])?>">	
							<h4><?=$RS['title']?></h4>
						</a>
						<div class="col-xs-3 pull-right">
						<a href="<?="/gallery/$la/{$RS['id']}/".insert_dash($RS['title'])?>">	
							<img src="<?=get_result("select adress from new_file_path where type=9 and name='galery_pic' and id={$RS['id']}",$coms_conect);?>" alt="<?=$RS['title']?>">
						</a>
						</div>
						<div class=" col-xs-9 pull-left">
							<?$sql11 = "SELECT a.id,name from new_mudoal_label a,new_keyword b   
							where   a.label_id=b.id and a.id={$RS['id']} and type=9";
							//echo $sql11;
							$result1 = $coms_conect->query($sql11);
							while($RS1 = $result1->fetch_assoc()){?>
								<a class="search-tags" href="<?="/gallery/$la/keyword/{$RS1['name']}/1"?>"><?=$RS1['name']?></a>
							<?}?>
							<h5>منتشر شده توسط : <?=get_result("select name from new_managers where id={$RS['user_id']}",$coms_conect);?></h5>
							<h4>
								انتشار <?=jdate('d  F  Y | H:m:s',$RS['date']);?>
							</h4>
						</div>
					</div>
					<?}?>
					<?=$pgsel?>
            </div>
			<?}?>
			<?if($search_module=='faq'){?>
            <div class="search-section col-xs-12 search-forum-result">
                <div class="heading-s">
                    <h3>
                        نتایج سوالات متداول
                        <span class="pull-left">
							<?=$faq_count?> نتیجه
						</span>
                    </h3>
                </div>
                <div class="page-topic col-xs-12">
                    <div class="panel-group col-xs-12" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:20px;">

					<?$a=new_pgsel((int)$search_page,$faq_count,10,10,"/search/$la/$q/faq");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					$sql1 = "SELECT cat_id,user_id,date,a.id,answer,question from new_faq a 
					where   a.status=1 and   la='$defult_lang'
					and site='$defult_site' $faq_str
				 	limit $from,$to";
			
					$result = $coms_conect->query($sql1);
					//   echo $sql1;exit;
					  $i=1;
					while($RS = $result->fetch_assoc()){?>
                        <div class="panel panel-default well">
                            <div class="panel-body" role="tab" id="heading1">

                                <div class="col-md-10">
                                    <div class="panel-title">
                                        <a data-toggle="collapse" href="#faq_abadis<?=$i?>" aria-expanded="false" aria-controls="faq_abadis<?=$i?>" class="faq collapsed">
                                            <h3><?=$RS['question']?></h3>
                                        </a>
                                    </div>


                                    <div class="collapse" id="faq_abadis<?=$i?>" aria-expanded="false" style="height: 0px;">
                                        <div class="well" style="background-color:white">
                                            <div id="paragraf">
                                                <p class="p-question">
                                                </p><p><?=$RS['answer']?></p><p></p>
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                    </center>
                                </div>
                                <div class="col-md-2 feature-faq">
                                    <p><span class="fa fa-calendar"></span><?=jdate('d  F  Y | H:m:s',$RS['date']);?></p>
                                    <p>
									
									<a href="<?="/faq/$la/category/{$RS['cat_id']}"?>" class="faq"><span class="fa fa-folder"></span> 
									<?=get_result("select name from new_modules_cat where id={$RS['cat_id']} and type=100 order by rang desc",$coms_conect);?></a>
									</p>
                                </div>

                            </div>
                        </div>

					<?$i++;}?>
                    </div>

                </div>
 
            </div>
			<?}?>
			<?if($search_module=='question'){?>
            <div class="search-section col-xs-12 search-forum-result">
                <div class="heading-s">
                    <h3>
                        نتایج پرسش و پاسخ
                        <span class="pull-left">
							<?=$question_count?> نتیجه
						</span>
                    </h3>
                </div>
                <div class="page-topic col-xs-12">
                    <div class="panel-group col-xs-12" id="accordion" role="tablist" aria-multiselectable="true" style="margin-top:20px;">

					<?$a=new_pgsel((int)$search_page,$question_count,10,10,"/search/$la/$q/question");
					$from=$a[0];
					$to=$a[1];
					$pgsel=$a[2];
					$sql1 = "SELECT cat_id,user_id,date,a.id,answer,question from new_question a 
					where   a.status=2 and   la='$defult_lang'
					and site='$defult_site' $faq_str
				 	limit $from,$to";
			
					$result = $coms_conect->query($sql1);
					//  echo $sql1;exit;
					  $i=1;
					while($RS = $result->fetch_assoc()){?>
                        <div class="panel panel-default well">
                            <div class="panel-body" role="tab" id="heading1">

                                <div class="col-md-10">
                                    <div class="panel-title">
                                        <a data-toggle="collapse" href="#faq_abadis<?=$i?>" aria-expanded="false" aria-controls="faq_abadis<?=$i?>" class="faq collapsed">
                                            <h3><?=$RS['question']?></h3>
                                        </a>
                                    </div>


                                    <div class="collapse" id="faq_abadis<?=$i?>" aria-expanded="false" style="height: 0px;">
                                        <div class="well" style="background-color:white">
                                            <div id="paragraf">
                                                <p class="p-question">
                                                </p><p><?=$RS['answer']?></p><p></p>
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                    </center>
                                </div>
                                <div class="col-md-2 feature-faq">
                                    <p><span class="fa fa-calendar"></span><?=jdate('d  F  Y | H:m:s',$RS['date']);?></p>
                                    <p>
									
									<a href="<?="/question/$la/category/{$RS['cat_id']}"?>" class="faq"><span class="fa fa-folder"></span> 
									<?=get_result("select name from new_modules_cat where id={$RS['cat_id']} and type=99 order by rang desc",$coms_conect);?></a>
									</p>
                                </div>

                            </div>
                        </div>

					<?$i++;}?>
                    </div>

                </div>
 
            </div>
			<?}?>
	    </div>
 
 <script>
 $(document).ready(function() {
	$('.change_lang').click(function(){
		var repalce_lang=$(this).attr('value');
		var url ='<?=$url?>';
		var lang=url.split('/')
		url=lang[0]+'/'+lang[1]+'/'+repalce_lang+'/'+lang[3]+'/'+lang[4]+'/'+lang[5];
		window.location=url;
	});
	
 
	 
    $('.module_search_tag').select2({
        data: [
				<?$module_table=get_module_table_details($url_temp[3],$coms_conect);
				$module_table_condition=get_module_table($url_temp[3],$q,$coms_conect,$search_module_type);
				$query="select c.id,c.name from new_mudoal_label b,new_keyword c $module_table
				where b.type=$module_type  and c.id=b.label_id and a.id=b.id
				$module_table_condition 
				group by c.id
				";
				echo $query;
				$result = $coms_conect->query($query);
				echo '{'.'id'.':0,' .'text'.":'انتخاب کنید'"."}";
				while($RS1=$result->fetch_assoc()){
						echo ','.'{'.'id'.':'.$RS1["id"].',' .'text'.':'."'".$RS1["name"]."'"."}";
				}
		?>
        ],
        allowClear: true,
        multiple: false,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });

	$('.module_search_cat').select2({
        data: [
			<?$query="select c.id,c.name from new_modules_cat c,new_modules_catogory b $module_table
			where b.type=$module_type  and c.id=b.cat_id and a.id=b.page_id
			$module_table_condition 
			group by c.id
			";
			$result = $coms_conect->query($query);
			echo '{'.'id'.':0,' .'text'.":'انتخاب کنید'"."}";
			while($RS1=$result->fetch_assoc()){
				echo ','.'{'.'id'.':'.$RS1["id"].',' .'text'.':'."'".$RS1["name"]."'"."}";
			}
		?>
        ],
        allowClear: true,
        multiple: false,
        formatNoMatches: function(term) {
            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
          }
    });
});
</script>
 <style>
	input[type=checkbox].ace.ace-switch.ace-switch-6+.lbl::before {content: "\f023";}
	input[type=checkbox].ace.ace-switch.ace-switch-6:checked+.lbl::before {content: "\f09c";}
	
</style>
        <div class="col-xs-3 s-r-p pull-left">
            <div class="heading-s tg-list">
                <h3>
                   جستجوی پیشرفته
                </h3>
            </div>
			<?if($module_type==1||$module_type==11){?>
			<div class="col-xs-12">
			 <h4>فقط اخبار تصویری</h4>
			 <input id="cb3" value="1" name="news_gallery" <?if($news_gallery==1) echo 'checked'?> class="conchkNumber_4 tgl tgl-skewed"  type="checkbox" />
			 <label class="tgl-btn" data-tg-off = "خاموش", data-tg-on = "روشن", for = "cb3"></label>
			 </div>
			<br>	
			<div class="col-xs-12">
			 <h4>فقط اخبار چند رسانه ای</h4>
			 <input id="cb4"   value="1"  name="news_video"  <?if($news_video==1) echo 'checked'?> class="conchkNumber_4 tgl tgl-skewed"  type="checkbox" />
			 <label class="tgl-btn" data-tg-off = "خاموش", data-tg-on = "روشن", for = "cb4"></label>
			 </div>
			<br>	
			<div class="col-xs-12">
			<h4>فقط اخبار صوتی</h4> 
			 <input id="cb5"   value="1" name="news_voice"  <?if($news_voice==1) echo 'checked'?> class="conchkNumber_4 tgl tgl-skewed"  type="checkbox" />
			 <label class="tgl-btn" data-tg-off = "خاموش", data-tg-on = "روشن", for = "cb5"></label>
			 </div>
			<br>	
			
			<?}?>
			برچسب ها
           <div class="col-md-12 input-group">	
				<input class="select2-input select2-basir module_search_tag"  type="text" name="module_search_tag" value="<?=$module_search_tag?>"  rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
            </div>  
			<br>
			دسته بندی
			<div class="col-md-12 input-group">	
				<input class="select2-input select2-basir module_search_cat"  type="text" name="module_search_cat" value="<?=$module_search_cat?>"  rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" style="width: 100%; " >
            </div>
            <button class="btn btn-success" type="submit">فیلتر کن</button>
			
			
			
        </div>
		
    </div>
 
<?$module_search_tag_text=get_result("select name from new_keyword where id='$module_search_tag'",$coms_conect);?> 

</form>
</div>
<script>
$("#end_date").datepicker({
	changeMonth: true,
	changeYear: true,
	isRTL: true,
	dateFormat: "yy/mm/dd"
});
$("#start_date").datepicker({
	changeMonth: true,
	changeYear: true,
	isRTL: true,
	dateFormat: "yy/mm/dd"
});


    // add a menu toggle button on small screens
    jQuery(document).ready(function($) {
        $('#menu-button').click(function() {
            var $this = $(this),
                $menu = $('#main-menu');
            if ($menu.is(':animated')) {
                return false;
            }
            if (!$this.hasClass('collapsed')) {
                $menu.slideUp(250, function() { $(this).addClass('collapsed').css('display', ''); });
                $this.addClass('collapsed');
            } else {
                $menu.slideDown(250, function() { $(this).removeClass('collapsed'); });
                $this.removeClass('collapsed');
            }
            return false;
        });
    });

</script>
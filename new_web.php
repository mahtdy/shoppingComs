<?@session_start();
$custom_ip=$_SERVER['REMOTE_ADDR'];
include_once("New_ajax.php");
include_once("new_htaccess.php");
include_once("newcoms/function.php");
get_user_online($_SESSION["new_okusername"],session_id(),$coms_conect);
$now=time();
$show_page=0;
if(file_exists("languages/$madual_lang.php")){include_once("languages/$madual_lang.php");}
$query="select * from new_static_page where name='$name' and la='$madual_lang' and publish_date<=$now";

$result = $coms_conect->query($query);
$RS = $result->fetch_assoc();

$id=$RS['id'];
$page_id=$RS['id'];
$defult_lang=$madual_lang;
$la=resolve_id_langueg($madual_lang,$coms_conect);
$defult_dir=get_direction_lang($la,$coms_conect);
$defult_site=$site;
$manage_site=resolve_id_site($site,$coms_conect);
$tem_name=get_template($manage_site,$la,$coms_conect);
$pages_id=$RS["id"];
$site_lang=$RS["la"];
$site_name=$RS["name"];
$title_title=$RS["title"];
$nav_title=$RS["title"];
if($madual_lang=='ar')
$defult_dir='ar';

 
include_once "new_template/$tem_name/blocks/header.php4";
if($RS['status']==0)
	include_once "new_dynamics/default/drafts.php4";
else if($RS['status']==1){
			if($RS["navication_pic"]=='')
			$RS["navication_pic"]=get_result("select address from new_default_navbar where name='page_nav_picture' and la='$madual_lang' and site='$site'",$coms_conect);
			if($RS["navication_pic"]>""){
			?>
			<!-- Start Slider -->
                <div class="row H_mb0">
                    <section class="slider pimg H animated fadeIn hidden-xs">
                        <img height="300" src="<?= $RS["navication_pic"] ?>" alt="<?= $nav_title ?>">
                    </section>
                </div>
			<?}
		if($RS['mudoal_lock']==0)
			$show_page=1;
		else if($RS['mudoal_lock']==1&&$_SESSION["new_okusername"]>"")
			$show_page=1;
		if($show_page==1){


		 if($RS['have_commnet']==1){
			$comment_type=5;
			if($site=='main')
			include 'new_dynamics/default/new_popup_comment.php4';else
			include '../new_dynamics/default/new_popup_comment.php4';
			$row['id']=$RS['id'];
			$madual_id=$RS['id'];
		}

	 ?>
<?if(get_result("select address from new_default_navbar where name='page_navbar'  and la='$site_lang' and site='$site'",$coms_conect)==1){?>
<section class="breadcrumb-sec animated fadeIn gradient">
	<div class="container">
		<ol class="breadcrumb rtl">
			<li><a href="/"><span class="fa fa-home"></span></a></li>
			<li  >صفحه ها </li>
			<?$cat_id=get_result("select cat_id from new_modules_catogory where type=5 and page_id={$pages_id}",$coms_conect);?>
			<li class="active"><a href="/page/<?=$defult_lang?>/category/<?=$cat_id?>"><?=get_result("select name from new_modules_cat where  id=$cat_id",$coms_conect);?></a></li>
			<li class="active"><a href="<?= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>"><?=$title_title?></a></li>
            <hr class="H_mtb">
        </ol>
	</div>
</section>
		<?}?>
	<div class="container">
		<main>
		<?$query23="select id,left_block,right_block,center from new_blocks_sorts a,new_static_page_sort b where a.type='p'  and b.type='p' and a.id=b.sort_id and b.page_id=$pages_id and a.tem_name='$tem_name' and a.la='$defult_lang' and a.status=1";
		 // echo $query23;exit;
		$result23 = $coms_conect->query($query23);
		$RS23 = $result23->fetch_assoc();
		$center=$RS23['center'];
		if($center=='')$center=12;
		if(get_modual_setting_result($defult_site,$defult_lang,'page_have_ads',$coms_conect))
			 $center=$center-2;
		if($RS23['right_block']>0){
		  echo ' <aside class="col-md-'.$RS23['right_block'].' col-xs-12 pull-right animated fadeIn">
			<section class="block-col">';
			create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect);
		 echo '	</section>
			</aside>';
		}//exit;?>

		<aside class="col-md-<?=$center?> col-xs-12 pull-right animated fadeIn">
			<section class="block-col">
			<?if($RS23['center']>0){?>
				<?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect);?>
			<?}?>
				<div class="row">
					<article class="col-xs-12 pull-right animated fadeIn">
						<section class="content">
							<div class="row">
								<section class="col-md-12 newsitempage">
									<?if($RS["h2"]==1){
									echo "<p><h1 class='pull-center' style='text-align: center;'>{$RS['h1']}</h1></p>";} ?>
									<div class="row ">

										 <?if($RS["h2"]!=1){?>
											<h2 class="pull-center H_center H_mb30 H_line45" ><?=$nav_title?></h2>
										 <?}?>
											<div class="pull-right rtl "></div>
                                        <div class="H_w500">
											<?$row['text']=$RS["text"];
											$row["text"]=str_replace('src="source','src="/source',$row["text"]);
                                            $row["text"]=str_replace('img src="source','img src="/source',$row["text"]);
                                            $row["text"]=str_replace('<source src="source','<source src="/source',$row["text"]);
                                            $row["text"]=str_replace('<a href="news','<a href="/news',$row["text"]);
                                         
                                            $row["text"]=str_replace('<a class="btn btn-primary" href="','<a class="btn btn-primary" href="/',$row["text"]);
                                            $row["text"]=str_replace('<a href="video','<a href="/video',$row["text"]);
                                            $row["text"]=str_replace('<img src="yep_theme','<img src="/yep_theme',$row["text"]);
                                            $row["text"]=str_replace('<audio src="source','<audio src="/source',$row["text"]);
                                            $row["text"]=str_replace('<video ','<video width="100%" height="100%"',$row["text"]);
                                           // $row["text"]=str_replace('href="source','href="/source',$row["text"]);
											   $row["text"]=str_replace('<a href="','<a href="/',$row["text"]);
											      $row["text"]=str_replace('<a href="/http://','<a href="http://',$row["text"]);
                                            echo $row["text"].'<br>';

											//		echo 	str_replace('img src="','img src="/',$RS["text"]);//echo $RS["text"];?>
                                        </div>
									</div>
									<div class="row">
										<?if(get_result("select count(id) from new_mudoal_label where type=5 and id={$RS['id']}",$coms_conect)>0){?>
											<div class="col-xs-12 tags">
												<fieldset>
													<legend><?=$view_tags?></legend>
													<ul>
														<?create_label_pishgaman($RS['id'],'page',$madual_lang,$coms_conect,5);?>
													</ul>
												</fieldset>
											</div>
										<?}?>
                                          <? $query = "SELECT b.name,b.id,b.title,b.date,b.la FROM new_related_madual a ,new_static_page b  where page_id='{$RS['id']}' and a.id=b.id  and type=5";
                                                    $result = $coms_conect->query($query);
                                                    $mortab = $result->fetch_assoc();
                                                    if($mortab['name']>""){
                                                        ?>
                                        <div class="col-xs-12 relatedposts prl0">
                                            <fieldset>
                                                <legend><?= $view_ralated_content ?></legend>
                                                <ul class="newsrelated pr10">
                                                    <? $query = "SELECT b.name,b.id,b.title,b.date,b.la FROM new_related_madual a ,new_static_page b  where page_id='{$RS['id']}' and a.id=b.id  and type=5";
                                                    //echo $query;
                                                    $icon_array = array("fa-newspaper-o", "fa-play-circle-o", "fa-pencil-square-o", "fa-youtube-play", "fa-camera");
                                                    $content_type_array = array("10001", "10010", "10000", "10100", "11000");
                                                    $result = $coms_conect->query($query);
                                                    $totla_related = "";
                                                    $i = 1;
                                                    while ($mortab = $result->fetch_assoc()) {
                                                        ?>
                                                        <li>
                                                            <a href="<?="/{$mortab['name']}/{$mortab['la']}/".insert_dash($mortab['title'])?>">
<!--                                                                <span class="fa --><?//= $icon_array[array_search($mortab['content_type'], $content_type_array)] ?><!--"></span>-->
                                                                <span><?= $mortab['title'] ?></span>
                                                                <span class="datepublish">
                                                                    <?= miladitojalalidefult(date('Y-m-d ', $mortab['date'])); ?>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <? $i++;
                                                    } ?>

                                                </ul>
                                            </fieldset>
                                        </div>
                                          <?}?>


										<?if($RS['have_commnet']==1){$low_text= get_tem_result($defult_site,$defult_lang,'low_text','default',$coms_conect);

										echo $low_text['text'];}
										if($RS['have_commnet']==1&&$site=='main'){
										include 'new_dynamics/default/new_modual_comment.php4';
										}
										if(get_modual_setting_result($defult_site,$defult_lang,'page_have_ads',$coms_conect)){?>

										<?}?>
									</div>
								</section>
							</div>
						</section>
					</article>


			</section>
		</aside>

		 <?if($RS23['left_block']>0){
			echo ' <aside class="col-md-'.$RS23['left_block'].' col-xs-12 pull-right animated fadeIn">
			<section class="block-col">';
			create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect);
			echo '	</section>
			</aside>';
		}?>

				<?if(get_modual_setting_result($defult_site,$defult_lang,'page_have_ads',$coms_conect)){?>
			<aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
				<section class="block-col">
					<div class="block">
						<div class="content ads-col">
							<?$query="select title,link,pic_adress from new_tem_setting where name='page_have_ads'  and la='$defult_lang' and site='$defult_site'";
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
	<?$temp_url=explode("/",$_SERVER[REQUEST_URI]);
	if(time()>=$_SESSION['count']+2){
		$coms_conect->query("update new_static_page set view=view+1 where name='$name'");
		view_module(5,$coms_conect);
	}
	$_SESSION['count']=time();
	}else{
	include 'new_lock_page.php';
	//get_login_form($site_url,$defult_lang,$tem_name);
	}
}
include_once "new_template/$tem_name/blocks/footer.php4";
?>
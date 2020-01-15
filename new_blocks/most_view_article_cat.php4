<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_visit_article_cat?></span></h3> 
	</div>
	<div class="content video-block">
		<ul>
			<?if($cat_id==0||get_result("select count(id) from new_modules_cat where id=$cat_id and type=7",$coms_conect)==0)
				echo $view_youcan_not_use_cat;
				else{
					$queryw1="select b.adress, a.title ,a.la,a.id from new_article a  ,new_file_path b ,new_modules_catogory c
						where   b.name='article_image'  and site='$site' and la='$la' and status=1 and b.type=7 and a.id=b.id
						and a.id=c.page_id and c.type=7 and c.cat_id=$cat_id
						group by c.page_id
						order by a.view desc limit 0,5";
						//echo $queryw1;exit;
					$result1 = $coms_conect->query($queryw1);
					while($rowss = $result1->fetch_assoc()) {?>
					<li>
						<a href="/article/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>" class="hvr-grow">
							<img src="<?=$rowss['adress'];?>">
						</a>
				 		<a href="/article/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>">
							<h3><?=$rowss['title']?></h3> 
						</a>
					</li>
					<?}   
				}?>		
		</ul>
	</div>
</div>
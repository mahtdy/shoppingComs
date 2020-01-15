<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_visit_gallery_cat?></span></h3> 
	</div>
	<div class="content video-block">
		<ul>
			<?if($cat_id==0||get_result("select count(id) from new_modules_cat where id=$cat_id and type=9",$coms_conect)==0)
				echo $view_youcan_not_use_cat;
				else{
					$queryw1="select b.adress, a.title ,a.la,a.id from new_gallery a  ,new_file_path b ,new_modules_catogory c
						where   b.name='galery_pic'  and site='$site' and la='$la' and status=1 and b.type=9 and a.id=b.id
						and a.id=c.page_id and c.type=9 and c.cat_id=$cat_id
						group by c.page_id
						order by a.view desc limit 0,5";
						//echo $queryw1;exit;
					$result1 = $coms_conect->query($queryw1);
					while($rowss = $result1->fetch_assoc()) {?>
					<li>
						<a href="/gallery/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>" class="hvr-grow">
							<img src="<?=$rowss['adress'];?>">
						</a>
				 		<a href="/gallery/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>">
							<h3><?=$rowss['title']?></h3> 
						</a>
					</li>
					<?}   
				}?>		
		</ul>
	</div>
</div>
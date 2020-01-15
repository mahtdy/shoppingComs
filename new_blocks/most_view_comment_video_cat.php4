<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_comments_video_cat?></span></h3>
	</div>
	<div class="content video-block">
		<ul>
			<?if($cat_id==0||get_result("select count(id) from new_modules_cat where id=$cat_id and type=8",$coms_conect)==0)
				echo 'شما نمیتوانید این بلوک را در این قسمت به کار ببرید';
				else{
					$queryw1="select a.duration , a.title ,a.la as count,a.id from new_video a  ,new_madules_comment b,new_modules_catogory c
					where   site='$site' and la='$la' and a.status=1 and b.type=8 and a.id=b.madul_id
					and a.id=c.page_id and c.type=8 and c.cat_id=$cat_id
					group by b.madul_id
					order by a.view desc limit 0,3";
					//echo $queryw1;
				$result1 = $coms_conect->query($queryw1);
				while($rowss = $result1->fetch_assoc()) {
					?>
				<li>
					<a href="/video/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>" class="hvr-grow">
						<img src="<?=get_modual_address($rowss['id'],$coms_conect)?>">
						<p><?=$rowss['duration'];?></p> 
					</a>
			 
					<a href="/video/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>">
						<h3><?=$rowss['title']?></h3>
					</a>
				</li>
				<?}
				}?>		
		</ul>
	</div>
</div>
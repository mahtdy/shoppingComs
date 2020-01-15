<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_last_content_video?></span></h3>
	</div>
	<div class="content video-block">
		<ul>
			<?$query1="select  a.name,title,a.la ,a.id,b.adress from new_content a ,new_file_path b 
			where b.name='content_video'  and site='$site' and la='$la' and status=1 and b.type=11 and a.id=b.id  and publish_date<=now()
			group by b.id order by a.id desc limit 0,5";
			
			$result1 = $coms_conect->query($query1);
			//echo $query1;
			while($rowss = $result1->fetch_assoc()) {
		 
				?>
			<li>
				<a href="/content/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['name'])?>" class="hvr-grow">
					<img src="/<?=get_content_modual_address($rowss['id'],$coms_conect)?>">
				</a>
				<a href="/content/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['name'])?>">
					<h3><?=$rowss['title']?></h3>
				</a>
			</li>
			<?}?>		
		</ul>
	</div>
</div>
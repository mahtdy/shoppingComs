<div class="block hidden-xs">
	<div class="header">
		<h5 class="H_block_h3 H_center"><span><?=$view_last_content_video?></span></h5>
	</div>
	<div class="content video-block H_p0 ">
		<ul>
			<?$query1="select  a.name,title,a.la ,a.id,b.adress from new_content a ,new_file_path b 
			where b.name='content_video'  and site='$site' and la='$la' and status=1 and b.type=11 and a.id=b.id  and publish_date<=now()
			group by b.id order by a.id desc limit 0,5";
			
			$result1 = $coms_conect->query($query1);
			//echo $query1;
			while($rowss = $result1->fetch_assoc()) {
		 
				?>
			<li class="H_mbc">
                <div>
				<a href="/content/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['name'])?>" class="hvr-grow">
					<img height="180" width="300" src="/<?=get_content_modual_address($rowss['id'],$coms_conect)?>">
				</a>
                </div>
                <div class="H_p15">
				<a href="/content/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['name'])?>">
                    <span class="H_font13"><?=$rowss['title']?></span>
				</a>
                </div>
			</li>
			<?}?>		
		</ul>
	</div>
</div>
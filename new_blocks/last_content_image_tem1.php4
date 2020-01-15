<div class="block hidden-xs">
	<div class="header">
		<h5 class="H_block_h3 H_center"><span><?=$view_last_content_image?></span></h5>
	</div>
	<div class="content post-block H_p0">
		<ul>
		<?$queryw1="select  a.name,a.la,a.title,a.id,b.adress from new_content a ,new_file_path b 
			where b.name='content_gallery'  and site='$site' and la='$la' and status=1 and b.type=11 and a.id=b.id  and publish_date<=now()
			group by b.id order by a.id desc limit 0,5";
			$resultw1 = $coms_conect->query($queryw1);
			 //echo $queryw1;
			while($rows3s = $resultw1->fetch_assoc()) {?>
			<li class="H_mbc">
				<div>
					<a href="/content/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['name'])?>" class="hvr-grow">
					<img  height="180" width="300" src="<?=$rows3s['adress']?>">
                    </a>
				</div>
				<div class="H_p15">
					<a href="/content/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['name'])?>">
                        <span class="H_font13"><?=$rows3s['title']?></span>
                    </a>
				</div>
			</li>
			<?}?>
		</ul>
	</div>
</div>
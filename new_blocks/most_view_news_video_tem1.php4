<div class="block hidden-xs">
	<div class="header">
		<h5 class="H_block_h3 H_center"><span><?=$view_visit_news_video?></span></h5>
	</div>
	<div class="content video-block H_p0">
		<ul>
			<?$query1="select  a.title,a.la ,a.id,b.adress from new_news a ,new_file_path b 
			where b.name='news_video'  and site='$site' and la='$la' and a.status=1 and b.type=1 and a.id=b.id  and publish_date<=now()
			group by b.id order by a.view desc limit 0,10";
			
			$result1 = $coms_conect->query($query1);
			///echo $query1;
			while($rows3s = $result1->fetch_assoc()) {?>
			<li class="H_mbc">

				<div >
					<a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow">
					<img height="180" width="300" src="/<?=get_news_modual_address($rows3s['id'],$coms_conect);?>"></a>
				</div>
				<div class="H_p15">
					<a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>">
                        <span class="H_font13"> <?=$rows3s['title']?></span>
                    </a>
				</div>

			</li>
			<?}?>	
		</ul>
	</div>
</div>
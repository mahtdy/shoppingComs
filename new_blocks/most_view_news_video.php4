<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_last_news_video?></span></h3>
	</div>
	<div class="content video-block">
		<ul>
			<?$query1="select  a.title,a.la ,a.id,b.adress from new_news a ,new_file_path b 
			where b.name='news_video'  and site='$site' and la='$la' and a.status=1 and b.type=1 and a.id=b.id  and publish_date<=now()
			group by b.id order by a.view desc limit 0,10";
			
			$result1 = $coms_conect->query($query1);
			///echo $query1;
			while($rows3s = $result1->fetch_assoc()) {?>
			<li class="row">
				<div class="col-md-5 pull-right pl0">
					<a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow">
					<img src="/<?=get_news_modual_address($rows3s['id'],$coms_conect);?>"></a>
				</div>
				<div class="col-md-7 pull-right pl0">
					<a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>"><h3><?=$rows3s['title']?></h3></a>
				</div>
			</li>
			<?}?>	
		</ul>
	</div>
</div>
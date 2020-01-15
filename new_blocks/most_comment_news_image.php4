<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_discussed_news_image?></span></h3>
	</div>
	<div class="content post-block">
		<ul>
		<?$queryw1="select count(c.id) as count,a.la,a.title,a.id,b.adress from new_news a ,new_file_path b ,new_madules_comment c
			where b.name='news_gallery'  and
			c.type=1 and a.id=c.madul_id  and
			site='$site' and la='$la' and a.status=1 and b.type=1 and a.id=b.id  and publish_date<=now() and c.status=1
			group by madul_id order by count desc limit 0,5";
			$resultw1 = $coms_conect->query($queryw1);
			// echo $queryw1;
			while($rows3s = $resultw1->fetch_assoc()) {?>
			<li class="row">
				<div class="col-md-5 pull-right pl0">
					<a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow">
					<img src="<?=$rows3s['adress']?>"></a>
				</div>
				<div class="col-md-7 pull-right pl0">
					<a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>"><h3><?=$rows3s['title']?></h3></a>
				</div>
			</li>
			<?}?>
		</ul>
	</div>
</div>
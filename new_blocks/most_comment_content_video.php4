<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_discussed_content_video?></span></h3>
	</div>
	<div class="content video-block">
		<ul>
			<?$query1="select  a.name,count(c.id) as count,title,a.la ,a.id,b.adress from new_content a ,new_file_path b ,new_madules_comment c
			where b.name='content_video'  and site='$site' and la='$la' and a.id=c.madul_id
			and a.status=1 and c.status=1 and b.type=11 and c.type=11 and a.id=b.id  and publish_date<=now()
			group by b.id order by count desc limit 0,5";
			
			//  echo $query1;exit;
			$result1 = $coms_conect->query($query1);
			while($rows3s = $result1->fetch_assoc()) {
				if($rows3s['adress']>""){?>
			<li class="row">
				<div class="col-md-5 pull-right pl0">
					<a href="/content/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['name'])?>" class="hvr-grow">
					<img src="/<?=get_content_modual_address($rows3s['id'],$coms_conect);?>"></a>
				</div>
				<div class="col-md-7 pull-right pl0">
					<a href="/content/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['name'])?>"><h3><?=$rows3s['title']?></h3></a>
				</div>
			</li>
			<?}
			}?>	
		</ul>
	</div>
</div>
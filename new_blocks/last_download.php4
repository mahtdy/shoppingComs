<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_last_download?></span></h3>
	</div>
	<div class="content post-block">
		<ul>
		<?$queryw1="select  a.la,a.title,a.id,b.adress from new_download a ,new_file_path b 
			where b.name='download_pic'  and site='$site' and la='$la' and status=1 and b.type=6 and a.id=b.id  
			group by b.id order by a.id desc limit 0,5";
			$resultw1 = $coms_conect->query($queryw1);
			 //echo $queryw1;
			while($rows3s = $resultw1->fetch_assoc()) {?>
			<li class="row">
				<div class="col-md-5 pull-right pl0">
					<a href="/download/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow">
					<img src="<?=$rows3s['adress']?>"></a>
				</div>
				<div class="col-md-7 pull-right pl0">
					<a href="/download/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>"><h3><?=$rows3s['title']?></h3></a>
				</div>
			</li>
			<?}?>
		</ul>
	</div>
</div>
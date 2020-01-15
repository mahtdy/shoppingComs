<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_best_download?></span></h3>
	</div>
	<div class="content type_title_block">
		<ul>
		<?$now=time();
		$query1="select  adress,a.title ,a.la,a.id  from new_download a,new_file_path b
		where    site='$site' and la='$la' and status=1  
		and b.name='download_pic' and a.id=b.id
		and b.type=6 and b.id=a.id and best_date>=$now
		
		 order by a.id desc limit 0,10";
		 
	 // echo $query1;
		$result1 = $coms_conect->query($query1);
			while($rows3s = $result1->fetch_assoc()){?>
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
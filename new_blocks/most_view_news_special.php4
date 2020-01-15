<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_visit_news_special?></span></h3>
	</div>
	<div class="content title-block">
		<ul>
		<?$time=time();
		$query1="select  a.title ,a.la,a.id from new_news a
		where    site='$site' and la='$la' and status=1   and publish_date<=now() and is_special=1 and spesial_start_date<=$time and spesial_finish_date>=$time 
		 order by a.view desc limit 0,10";
		$result1 = $coms_conect->query($query1);
			while($rowe1 = $result1->fetch_assoc()){?>
				<li><a href="/news/<?="{$rowe1['la']}/{$rowe1['id']}/".insert_dash($rowe1['title'])?>"><?=$rowe1['title']?></a></li>
			<?}?>
		 </ul>
	</div>
</div>
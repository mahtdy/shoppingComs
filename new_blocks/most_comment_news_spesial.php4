<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_discussed_news_special?></span></h3>
	</div>
	<div class="content title-block">
		<ul>
		<?$time=time();
		$query1="SELECT madul_id,count(b.id),a.id,a.title,a.la as count FROM new_madules_comment b ,new_news a WHERE
		b.type=1 and a.id=b.madul_id  and   a.site='$site' and a.la='$la' and a.status=1 and b.status=1   and publish_date<=$time and is_special=1 
		and spesial_start_date<=$time and spesial_finish_date>=$time  
		group by madul_id order by count desc limit 0,10";
		//echo $query1;exit;
		$result1 = $coms_conect->query($query1);
			while($rowe1 = $result1->fetch_assoc()){?>
				<li><a href="/news/<?="{$rowe1['la']}/{$rowe1['id']}/".insert_dash($rowe1['title'])?>"><?=$rowe1['title']?></a></li>
			<?}?>
		 </ul>
	</div>
</div>
<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_discussed_article?></span></h3>
	</div>
	<div class="content title-block">
		<ul>
		<?$query1="SELECT madul_id,count(b.id),a.id,a.title,a.la as count FROM new_madules_comment b ,new_article a WHERE
		b.type=7 and a.id=b.madul_id  and   a.site='$site' and a.la='$la' and a.status=1   and publish_date<=now() and b.status=1
		group by madul_id order by count desc limit 0,10";
		$result1 = $coms_conect->query($query1);
			while($rowe1 = $result1->fetch_assoc()){?>
				<li><a href="/article/<?="$la/{$rowe1['id']}/".insert_dash($rowe1['title'])?>"><?=$rowe1['title']?></a></li>
			<?}?>
		 </ul>
	</div>
</div>
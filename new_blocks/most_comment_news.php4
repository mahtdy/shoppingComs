<div class="block hidden-xs">
	<div class="header">
		<h5 class="H_block_h3 H_center" ><span><?=$view_discussed_news?></span></h5>
	</div>
	<div class="content title-block H_p0">
		<ul>
		<?$query1="SELECT madul_id,count(b.id),a.id,a.title,a.la as count FROM new_madules_comment b ,new_news a WHERE
		b.type=1 and a.id=b.madul_id  and   a.site='$site' and a.la='$la' and a.status=1 and b.status=1   and publish_date<=now() 
		group by madul_id order by count desc limit 0,10";
		$result1 = $coms_conect->query($query1);
			while($rowe1 = $result1->fetch_assoc()){?>
				<li  class="H_font13 H_ptb10">
                    <a href="/news/<?="$la/{$rowe1['id']}/".insert_dash($rowe1['title'])?>"><?=$rowe1['title']?></a>
                </li>
			<?}?>
		 </ul>
	</div>
</div>
<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_visit_page?></span></h3>
	</div>
	<div class="content title-block">
		<ul>
		<?$query1="select  a.name,a.title ,a.la,a.id from new_static_page a
		where    site='$site' and la='$la' and status=1    
		 order by a.view desc limit 0,10";
		$result1 = $coms_conect->query($query1);
			while($rowe1 = $result1->fetch_assoc()){?>
				<li><a href="<?="/{$rowe1['name']}/{$rowe1['la']}/".insert_dash($rowe1['title'])?>"><?=$rowe1['title']?></a></li>
			<?}?>
		 </ul>
	</div>
</div>
<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_visit_blog_image?></span></h3>
	</div>
	<div class="content title-block">
		<ul>
		<?$query1="select  a.title ,a.la,a.id from new_blog a
		where    site='$site' and la='$la' and status=1   and blog_type=3 
		 order by a.view desc limit 0,10";
		$result1 = $coms_conect->query($query1);
			while($rows3s = $result1->fetch_assoc()){?>
			<li class="row">
				<div class="col-md-5 pull-right pl0">
					<a href="/blog/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow">
					<img src="<?=get_result("SELECT adress from new_file_path where id={$rows3s['id']}  and type=10 and name='blog_album'",$coms_conect)?>"></a>
				</div>
				<div class="col-md-7 pull-right pl0">
					<a href="/blog/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>"><h3><?=$rows3s['title']?></h3></a>
				</div>
			</li>
			<?}?>
		 </ul>
	</div>
</div>
<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_related_cat_page?></span></h3>
	</div>
	<div class="content post-block">
		<ul>
		<?if($cat_id==0||get_result("select count(id) from new_modules_cat where id=$cat_id and type=5",$coms_conect)==0)
			echo $view_youcan_not_use_cat;
			else{
			$queryw1="select  a.name,a.la,a.title,a.id from new_static_page a ,new_modules_catogory b  
			where  
			site='$site' and la='$la' and status=1 and b.type=5 and a.id=b.page_id  and publish_date<=now()
			group by b.page_id order by a.id desc limit 0,5";
			$resultw1 = $coms_conect->query($queryw1);
			// echo $queryw1;
			while($rows3s = $resultw1->fetch_assoc()) {?>
			<li class="row">
				<div class="col-md-12 pull-right pl0">
					<a href="<?="/{$rows3s['name']}/{$rows3s['la']}/".insert_dash($rows3s['title'])?>"><h3><?=$rows3s['title']?></h3></a>
				</div>
			</li>
			<?}
			}?>
		</ul>
	</div>
</div>
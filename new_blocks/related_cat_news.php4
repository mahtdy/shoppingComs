<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_related_cat_news?></span></h3>
	</div>
	<div class="content post-block">
		<ul>
		<?if($cat_id==0||get_result("select count(id) from new_modules_cat where id=$cat_id and type=1",$coms_conect)==0)
			echo $view_youcan_not_use_cat;
			else{
			$queryw1="select  a.la,a.title,a.id from new_news a ,new_modules_catogory b  
			where  
			site='$site' and la='$la' and status=1 and b.type=1 and a.id=b.page_id  and publish_date<=now()
			group by b.page_id order by a.id desc limit 0,5";
			$resultw1 = $coms_conect->query($queryw1);
			// echo $queryw1;
			while($rows3s = $resultw1->fetch_assoc()) {?>
			<li class="row">
				<div class="col-md-5 pull-right pl0">
					<a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow">
					<img src="<?=get_result("select adress from new_file_path where id={$rows3s['id']} and name='news_image'",$coms_conect);?>"></a>
				</div>
				<div class="col-md-7 pull-right pl0">
					<a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>"><h3><?=$rows3s['title']?></h3></a>
				</div>
			</li>
			<?}
			}?>
		</ul>
	</div>
</div>
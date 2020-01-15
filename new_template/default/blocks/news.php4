<section class="inews">
<div class="col-lg-8 col-md-10 col-sm-10 col-xs-10 content">
	<div class="row">
	<?for($i=1;$i<=3;$i++){
		$news_setting= get_tem_result($site,$la,"news_setting$i",'pishgaman',$coms_conect);
		$sql12="SELECT b.adress,a.site,a.id,a.la,a.title,a.abstract FROM new_news a ,new_file_path b
		where a.id=b.id and b.type=1 and b.name='news_image' and a.id='{$news_setting['text']}'";
		################################################################
		$resultd1 = $coms_conect->query($sql12);
		$row = $resultd1->fetch_assoc();
			if($row['site']=='main') $domain= '/'.$domain_name; else $domain='/'. $row['site'].'.'.$domain_name;
		?>
		<div class="col-md-4 col-sm-4 col-xs-10 ndiv wow fadeinleft">
			<div class="news">
				<a href="/<?="$domain/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" class="hvr-shrink"><img src="<?=$row['adress']?>" alt="<?=$row['title']?>" /></a>
				<a href="#"><p class="title"><?=$row['title']?></p></a>
				<p class="text"> <?=$row['abstract']?> </p>
			</div>
		</div>
	<?}?>
	</div>
</div>
<div class="newsmore">
<a href="<?="/news/$la"?>"><p><span class="pg pg-cplus icon"></span><span class="title">ادامه اخبار</span></p></a>
</div>
</section>
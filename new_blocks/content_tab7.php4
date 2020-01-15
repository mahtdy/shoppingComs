<div class="block hidden-xs">
	<div class="header">
	<?$query="select title,link,pic_adress,pic from new_tem_setting where name='content_tab_setting7'  and la='$defult_lang' and site='$defult_site'"; 
			$result = $coms_conect->query($query);
			$RS = $result->fetch_assoc();?>
		<h3><span><?=$RS['title']?></span></h3>
	</div>
	<div class="content post-block">
		<ul>
		<?$str='';
			$now=time();
			if($RS['pic']>0)
				$str=" or  c.cat_id={$RS ['pic']}";
				$query1="select a.name,b.adress,a.publish_date,a.la,a.title,a.id  from new_content a ,new_file_path b, new_modules_catogory c
				where c.type=11 and a.id=c.page_id and (c.cat_id='{$RS ['link']}' $str) and  b.name='content_image'  and site='$defult_site' and la='$defult_lang' and status=1 and b.type=11 and a.id=b.id  and publish_date<='$now'
				group by b.id order by a.id desc limit 0,4";
				$result1 = $coms_conect->query($query1);
				// echo $query1;
					while($row1 = $result1->fetch_assoc()) {
					
		?>
			<li class="row">
				<div class="col-md-5 pull-right pl0">
					<a href="/content/<?="{$row1['la']}/{$row1['id']}/".insert_dash($row1['name'])?>" class="hvr-grow">
					<img src="<?=$row1['adress']?>"></a>
				</div>
				<div class="col-md-7 pull-right pl0">
					<a href="/content/<?="{$row1['la']}/{$row1['id']}/".insert_dash($row1['name'])?>"><h3><?=$row1['title']?></h3></a>
				</div>
			</li>
			<?}?>
		</ul>
	</div>
</div>
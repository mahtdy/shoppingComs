<aside class="col-md-12 hidden-sm hidden-xs pull-left animated fadeIn">
	<section class="block-col">
		<div class="block">
			<div class="content ads-col">
				<?$query="select title,link,pic_adress,pic from new_tem_setting where name='ads_type3'  and la='$defult_lang' and site='$defult_site'"; 
					$result = $coms_conect->query($query);
					while($RS = $result->fetch_assoc()) { 
					if($RS['pic']==1){
						echo '<script type="text/javascript" data-cfasync="false">';
						echo html_entity_decode($RS['title']);
					}else{
					?>
					<a href='<?=$RS['link']?>' target="_blank" title="<?=$RS['title']?>">
						<img src="<?=$RS['pic_adress']?>">
					</a>
					<?} if($RS['pic']==1)
						echo '</script>';?>
 
					<?}?>
			</div>
		</div>
	</section>
</aside>
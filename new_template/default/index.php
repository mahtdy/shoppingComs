<? if($defult_site=='main'){ 
include ('new_template/default/blocks/header.php4');
}
else
include ('../new_template/default/blocks/header.php4');
$dir="rtl"; 
$_SESSION['site']=$site;
$_SESSION['la']=$la;
?> 
<section class="hidden-xs slider">
	<div class="slideshow">
	<!-- Responsive slider - START -->
	<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
		<div class="slides" data-group="slides">
			<ul>
			<?$query="SELECT * FROM new_slideshow where la='$la' and site='$site' and start_date<=$now and finish_date>=$now";
 			$result = $coms_conect->query($query);
			$i=1;
			while($RS1 = $result->fetch_assoc()) {
			$slide_img1=$RS1["slide_img1"]; ?>
				<li>
					<div class="slide-body" data-group="slide">
					<a href='<?=$RS1["link"]?>'>	<img src="<?=$slide_img1?>"></a>
						<div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
							<h2><?=$RS1["text1"]?></h2>
							<div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300"><?=$RS1["text2"]?></div>
						</div>
					</div>
				</li>
			<?$i++;}?>
			</ul>
		</div>
 

		<div class="pages">
			<a class="slider-control left" href="#" data-jump="prev"><span class="pg pg-arrow-l"></span></a>
				<?for($j=1;$j<$i;$j++){?>
				<a class="page" href="#" data-jump-to="<?=$j?>"></a>
				<?}?>
			<a class="slider-control right" href="#" data-jump="next"><span class="pg pg-arrow-r"></span></a>
		</div>
	</div>
	<!-- Responsive slider - END -->
</div>
</section>


	<div class="">	
	<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m' and pages_id=2 and tem_name='default'";
	$result23 = $coms_conect->query($query23);
	$RS23 = $result23->fetch_assoc();
	 //echo $query23;
	?>
		<div class="col-md-<?=$RS23['right_block']?>">
		<?if($RS23['right_block']>0){
			create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'r',$coms_conect);
		}//exit;?>
		</div>
		<div class="col-md-<?=$RS23['center']?>">
		<?if($RS23['center']>0){
			create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'c',$coms_conect);
		}?>
		</div>		

		<div class="col-md-<?=$RS23['left_block']?>">
			<?if($RS23['left_block']>0){
				create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'default',$RS23['id'],'l',$coms_conect);
			}?>
		</div>
	</div>


<? if($defult_site=='main'){ 
include ('new_template/default/blocks/footer.php4');
}
else
include ('../new_template/default/blocks/footer.php4');
$dir="rtl"; 
?> 
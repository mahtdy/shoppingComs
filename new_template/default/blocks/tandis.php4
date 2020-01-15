<div class="hglinet"></div>
<section class="javayez">
<div class="col-lg-8 col-md-10 col-sm-10 col-xs-10 content">
	<div id="javayez" class="owl-carousel owl-theme">
					<?for($i=1;$i<=20;$i++){
						$tandis= get_tem_result($site,$la,"tandis$i",'pishgaman',$coms_conect);
						if($tandis['link']){?>
						<div class="jayeze_item"><a target='_blank' href='<?=$tandis['link']?>'><img src="<?=$tandis['pic_adress']?>" alt="<?=$tandis['title']?>"></div></a>
						<?}}?>

	</div>
</div>
</section>
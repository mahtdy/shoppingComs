<section class="ads">
<?$advertise= get_tem_result($site,$la,"advertise",'pishgaman',$coms_conect);?>
<a href="<?=$advertise['link']?>"><img src="<?=$advertise['pic_adress']?>" alt="<?=$advertise['text']?>" />
<div class="row">
	<div class="col-lg-8 col-md-10 col-sm-10 col-xs-10 title">
			<h3 class="wow bounceinright"><span><?=$advertise['text']?></span></h3>
			<h1 class="wow bounceinleft"><span><?=$advertise['title']?></span></h1>
	</div>
</div>
</section>
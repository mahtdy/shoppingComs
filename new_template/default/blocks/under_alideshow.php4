<section class="hotlinks">
	<div id="wavecl" class="wavecl"></div>
<div class="col-lg-8 col-md-10 col-sm-10 links">
	<div class="row">
	 <?for($i=1;$i<=4;$i++){
			$under_slideshow= get_tem_result($site,$la,"under_slideshow$i",'pishgaman',$coms_conect);?>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 link hvr-float-shadow wow fadeinup">
			<a href="<?=$under_slideshow['link']?>" class="" data-toggle="tooltip" data-placement="bottom" title="<?=$under_slideshow['title']?>">
				<span class="pg <?=$under_slideshow['pic']?>"></span>
			</a>
		</div>
	 <?}?>
 

	</div>
</div>
</section>
<script src="<?=$subdomian_add?>/new_template/pishgaman/<?=$defult_dir?>/js/siriwave.js"></script>
 <script type="text/javascript" language="javascript">
 new SiriWave({
   width: 640,
   height: 100,
   speed: 0.02,
   container: document.getElementById('wavecl'),
   autostart: true,
 });
  </script>

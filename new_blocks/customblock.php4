<div class="block hidden-xs">
	<div class="header">
	<?$custom_blocks= get_tem_result($site,$la,"custom_blocks",'default',$coms_conect);?>
		<h3><span><?=$custom_blocks['title']?></span></h3>
	</div>
	<div class="content type_title_block">
		<ul>
			<?=$custom_blocks['title']?>
		</ul>
	</div>
</div>
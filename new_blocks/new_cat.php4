<div class="block hidden-xs">
	<div class="header">
	<h5 class="H_block_h3 H_center"><span><?=$new_sysmenu[40]?></span></h5>
	</div>
	<nav id="main-vertical-nav" class="col-xs-12 content video-block" role="navigation" style="padding:0;">
        <ul id="main-vertical-menu" class=" H_bg H_mt05 sm sm-vertical sm-rtl sm-mint collapsed">
			<?$sql = "SELECT name,la,id FROM new_modules_cat WHERE parent_id='0' and type=1 and la='$la' ORDER BY rang";
		 	$result44 = $coms_conect->query($sql); 
			while($row44 = $result44->fetch_assoc()) {
				$href="/news/{$row44['la']}/category/{$row44['id']}";
				echo "<li >";
				echo  "<a class='H_font13 H_ptb10' href='$href' > {$row44['name']}</a>";
					create_new_cat_virdual($row44['id'],$defult_site,$defult_lang,$coms_conect,1,'news');
				echo "</li>";							
			}
		?>
        </ul>
    </nav>
</div>
<script type="text/javascript">
    $(function() {
        $('#main-vertical-menu').smartmenus({
            subMenusSubOffsetX: 6,
            subMenusSubOffsetY: -8
        });
    });
</script>
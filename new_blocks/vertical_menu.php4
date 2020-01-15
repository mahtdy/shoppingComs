<div class="block hidden-xs">
    <!-- Start Header -->
    <!-- end Header -->
    <nav id="main-vertical-nav" class="col-xs-12" role="navigation" style="padding:0;">
        <ul id="main-vertical-menu" class="sm sm-vertical sm-rtl sm-mint collapsed">
			<?$sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$site' and la='$la' and float_menu=1 and status=1 ORDER BY rang";
			$result44 = $coms_conect->query($sql44); 
			while($row44 = $result44->fetch_assoc()) {
				$target=get_target ($row44['target']);
				$href=$row44['link'];
				echo "<li>";
				echo  "<a $target   href='$href' class='H_font13 H_ptb10'> {$row44['name']}</a>";
					create_main_menu_index_virdual($row44['id'],$defult_site,$defult_lang,$coms_conect);
				echo "</li>";							
			}
		?>
        </ul>
    </nav>
</div>

<!-- SmartMenus jQuery init -->
<script type="text/javascript">
    $(function() {
        $('#main-vertical-menu').smartmenus({
            subMenusSubOffsetX: 6,
            subMenusSubOffsetY: -8
        });
    });
</script>



<!-- End Js files -->

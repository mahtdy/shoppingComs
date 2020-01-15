 <link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/default/rtl/css/flyout-menu.css">
   <script src="<?=$subdomian_add?>/yep_theme/default/rtl/js/jquery-latest.min.js" type="text/javascript"></script>
   <!--script src="<?=$subdomian_add?>/js/script.js"></script-->
<div id="cssmenu">
<ul>
					<?$sql44 = "SELECT * FROM new_menu WHERE parent_id='0' and site_id='$defult_site' and status=1 and float=1 and la='$defult_lang' ORDER BY rang";
						//echo $sql44;
						$result44=mysql_db_query($dbname,$sql44,$RSconn);
						while($row44 = mysql_fetch_array($result44)) {
							echo "<li class='current-menu-item'>
									<a href='{$row44['link']}'>{$row44['name']}</a>";
									create_menu_index($row44['id'],$defult_site,$defult_lang);
								echo "</li>";							
							}?>
</ul>
</div>

<div class="block hidden-xs">
	<div class="header">
		<h3><span><?=$view_visit_page_cat?></span></h3> 
	</div>
	<div class="content video-block">
		<ul>
			<?if($cat_id==0||get_result("select count(id) from new_modules_cat where id=$cat_id and type=5",$coms_conect)==0)
				echo $view_youcan_not_use_cat;
				else{
					$queryw1="select  a.name,a.title ,a.la,a.id from new_static_page a ,new_modules_catogory c
						where    site='$site' and la='$la' and status=1 
						and a.id=c.page_id and c.type=5 and c.cat_id=$cat_id
						group by c.page_id
						order by a.view desc limit 0,5";
					//	echo $queryw1;//exit;
					$result1 = $coms_conect->query($queryw1);
					while($rowss = $result1->fetch_assoc()) {?>
					<li>
				 		<a href="<?="/{$rowss['name']}/{$rowss['la']}/".insert_dash($rowss['title'])?>">
							<h3><?=$rowss['title']?></h3> 
						</a>
					</li>
					<?}   
				}?>		
		</ul>
	</div>
</div>
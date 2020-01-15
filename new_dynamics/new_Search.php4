<link rel="stylesheet" href="/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>		
<section>
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<?//
				$query12="select count(id) as count  from new_news where (name like '%$q%'  or title like  '%$q%'  or text like  '%$q%' or abstract like  '%$q%') and la='$defult_lang'" ;
				$result12=mysql_db_query($dbname,$query12,$RSconn);
				$RS=mysql_fetch_array($result12);
				$a=pgsel((int)$_GET["page"],$RS["count"],10,10,"$root/search/fa/k=$q");
				$from=$a[0];
				$to=$a[1];
				$pgsel=$a[2];
				$query2="select abstract,title,id,site,la  from new_news where 
				(name like '%$q%'  or title like  '%$q%'  or text like  '%$q%' or abstract like  '%$q%') and la='$defult_lang'
				order by id desc LIMIT $from,$to" ;
				$result2=mysql_db_query($dbname,$query2,$RSconn);
					while($RS2=mysql_fetch_array($result2)){
						$abstract=$RS2["abstract"];
						$newstitle=$RS2["title"];
						$id=$RS2["id"];
						$site_id=$RS2["site"];
						$la=$RS2["la"];
					//?>	
						<div class="clearfix search-result">
							<h4><a href="<?="/news/$la/$id"?>"> <?=$newstitle?></a></h4>		
							<p><?=$abstract?></p>
						</div>
					<?
					}
	
				//?>
			<center>
	     	  <?echo $pgsel?>
			</center>
		</div>
	</div>
</div>
</section>
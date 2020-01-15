<?echo "<rss version='2.0'>";
echo "<channel>";
if($rss_id=='all'){
	$query="SELECT a.title,a.date,a.la,a.id,a.abstract FROM new_news a , new_modules_catogory b where 
	la='$madual_lang' and b.type=1 and a.id=b.page_id and status=1 and site='$site' order by id desc limit 0,100";
		$result = $coms_conect->query($query);
			while($row = $result->fetch_assoc()) {
				$date=(date('Y-m-d ',$row['date']));
				//echo $date.'<br>';
				$status=$row['status'];
				echo "<item>";
				echo "<title>{$row['title']}</title>";
				echo "<link>http://$domain_name/news/{$row['la']}/{$row['id']}</link>";
				echo "<description>{$row['abstract']}</description>";
				echo "<author>info@yepco.ir</author>";
				echo "<Date>$date</Date>";
				echo "</item>";
		}	
}else{	
	$query="SELECT a.title,a.date,a.la,a.id,a.abstract FROM new_news a, new_modules_catogory b where
	a.id=b.page_id and a.la='$madual_lang' and site='$site' 
		and a.id=b.page_id and
	status=1 and publish_date<=$now and b.type=1 and b.cat_id='$rss_id' order by a.id desc limit 0,100";
	//echo $query;exit;
		$result = $coms_conect->query($query);
			while($row = $result->fetch_assoc()) {
			$date=(date('Y-m-d ',$row['date']));
			//echo $date.'<br>';
			$status=$row['status'];
			echo "<item>";
			echo "<title>{$row['title']}</title>";
			echo "<link>http://$domain_name/news/{$row['la']}/{$row['id']}</link>";
			echo "<description>{$row['abstract']}</description>";
			echo "<author>info@yepco.ir</author>";
			echo "<Date>$date</Date>";
			echo "</item>";
		}
}	
echo "</channel>";	
echo "</rss>";
?>

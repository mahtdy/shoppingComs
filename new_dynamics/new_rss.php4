<?$query="select id,name from new_modules_cat where type=1 and la='$madual_lang'";
 
$result = $coms_conect->query($query);
echo "<a target='_blank' href='/rss/$madual_lang/all'>همه اخبار</a><br>";
 while($RS1 = $result->fetch_assoc()) {
	echo "<a target='_blank' href='/rss/$madual_lang/{$RS1['id']}'>{$RS1['name']}</a><br>";
}	
?>
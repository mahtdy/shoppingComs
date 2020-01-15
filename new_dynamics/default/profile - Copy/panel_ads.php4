<?$sql1 = "SELECT count(a.id) as cnt from new_ads a where 
	a.status=1  and  a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}'";
 	 $result = $coms_conect->query($sql1);
	 $RS = $result->fetch_assoc();
	 $a=new_pgsel((int)$_SESSION['madual_page_id'],$RS["cnt"],9,9,"/ads/{$_SESSION['la']}/page");
	 $from=$a[0];
	 $to=$a[1];
	 $pgsel=$a[2];?>
	 <?$query="select a.ads_title,a.view,a.date,a.description,b.adress from new_ads a,new_file_path b where a.id=b.id and b.type=18 and b.name='ads_image' LIMIT $from,$to  ";
		echo $query;//exit;
	 $result = $coms_conect->query($query);$i=$paging;$j=0;$k=0;
	 while($row = $result->fetch_assoc()) {?>
<div class="col-md-12">
	<div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
		<img src="<?=$row['adress']?>" class="img-responsive" alt="" width="100%">
	</div>
	<div class="col-md-9" style="padding-left: 0px;padding-right: 0px;">
		<div class="col-md-9">
			<h3 style="margin-top: 0px;"><?=$row['ads_title']?></h3>
		</div>
		<div class="col-md-3" style="padding-left: 0px;padding-right: 0px;">
			<span><small><i class="fa fa-eye"></i><?=$row['view']?></small></span>
			<span><small><i class="fa fa-clock-o"></i><?=$row['date']?></small></span>
		</div>
		<div class="col-md-12">
			<p><?=$row['description']?></p>
		</div>
	</div>
</div>
<hr style="border: inset;">
	 <?}?>
<form method="post" id="resive_pm_search_form" >
<div class="col-md-4 col-sm-4 col-xs-9 pull-right rtl">
	<div class="form-group">
		<input name="resive_pm_search" id="resive_pm_search" value="<?=$sreach_value?>"  class="form-control" placeholder="جستجو">
	</div>
</div>

<div class="col-md-2 col-sm-2 col-xs-3 pull-right">
	<div class="form-group">
		<button type="submit" id="resive_pm_search_btn" class="btn btn-success m_fullwidth">
		   جستجو
		</button>
	</div>
</div>
</form>
<div class="col-md-12 table-responsive rtl" style="margin-left: 33px;">
	<table class="table table-bordered ">
		<thead>
		<tr>
			<th>شماره پیام</th>
			<th>تاریخ ارسال</th>
			<th>عنوان پیام</th>
			<th>وضعیت </th>
			<th>اقدامات  </th>
		</tr>
		</thead>
		<tbody>
		<?$page=$madual_page_id;$resive_pm_search_str="";
		if($sreach_value>""&$url_temp[3]=='pm'){
			$resive_pm_search_str=" and text like '%$sreach_value%' ";
		}
		$sql1 = "SELECT count(id) as cnt  from new_member_pm  where resiver='{$_SESSION["new_okusername"]}' $resive_pm_search_str";
			$result = $coms_conect->query($sql1);
			$RS = $result->fetch_assoc();
			$a=new_pgsel((int)$page,$RS["cnt"],10,10,"$root/profile/fa/pm");
			$from=$a[0];
			$to=$a[1];
			$pgsel=$a[2];
		$query="select * from new_member_pm  where resiver='{$_SESSION["new_okusername"]}' $resive_pm_search_str order by pm_read LIMIT $from,$to";
	 
		$result = $coms_conect->query($query);
			while($RS1 = $result->fetch_assoc()) {
				if($RS1['pm_read']==1){
					$read_status='success';
					$read_str='خوانده شده';
				}else{ 
				$read_status='info';
				$read_str='خوانده نشده';
				}?>
			<tr>
				<td><?=$RS1['id']?></td>
				<td><?=jdate('Y F d',$RS1['date']);?></td>
				<td><?=$RS1['subject']?></td>
				<td><label class="btn-<?=$read_status?> fullwidth"><?=$read_str?></label></td>
				<td><button id="<?=$RS1['id']?>" class="btn show_pm_btn" data-toggle="modal" data-target="#show_pm"  style="background-color: #000077;color:#ffffff;" type="text">مشاهده</button></td>
			</tr>
			<?}?>
		</tbody>
	</table>
	<?=$pgsel?><br>
	مورد یافت شد<?=$RS["cnt"]?>
</div>
<script>	
	$("#resive_pm_search").keypress(function (e) {
		if(e.which==13){
		   $("#resive_pm_search_form").attr("action", "/profile/<?=$defult_lang?>/pm/search/"+ $("#resive_pm_search").val()+"/1");
		   $("#resive_pm_search_form").submit()
		}
	});
	$("#resive_pm_search_btn").click(function () {  
		   $("#resive_pm_search_form").attr("action", "/profile/<?=$defult_lang?>/pm/search/"+ $("#resive_pm_search").val()+"/1");
		   $("#resive_pm_search_form").submit()
	});
</script>	
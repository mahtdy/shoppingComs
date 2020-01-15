	<div id="<?=$request_div_open?>">
		<h3><?=$request_status_str?></h3>
		<div class="row">
			<div class="col-md-9">
				<form class="navbar-form navbar-left col-md-10" role="search" style="float:right!important;padding:0px;margin:0px;">
					<div class="form-group">
					  <input type="text" name="str_search" id="str_search" class="form-control" placeholder="شماره یا موضوع درخواست خود را وارد نمایید" style="min-width: 260px;">
						<button type="button"   class="btn btn-primary btn-md search_ticket">جستجو</button>
						<input type="hidden" value="<?=$request_status?>" id="request_status" name="request_status">
					</div>
				</form>
			</div>
						<img src="/waiting.gif" class="show_waiting" style="display:none">
			<div class="col-md-3">
			</div>
		</div>
		<div id="show_result">	
		<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
				 	<th>شماره درخواست</th>
					<th>تاریخ ارسال</th>
					<th>عنوان درخواست</th>
					<th>واحد</th>
					<th>اقدامات</th>
				</tr>
			</thead>

			<tbody>
			<?if($request_status==0)
				$str_status='';
			else
				$str_status="and a.status=$request_status";
			$sql1 = "select count(a.id)as cnt from new_ticket a,new_ticket_department b   where b.id=a.ticket_department and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' $str_status";
			$result = $coms_conect->query($sql1);
			$RS = $result->fetch_assoc();
	 		$page=injection_replace($_GET["page"]);
			$a=pgsel((int)$page,$RS["cnt"],10,10,"$root/newcoms.php?yep=new_newstext$lang_page$site_page$manager_page$status_page$manager_q$field_page$expire_page$publish_page$cat_page$id_number_page");
			$from=$a[0];
			$to=$a[1];
			$pgsel=$a[2];
			$query="SELECT a.id,a.date,a.ticket_subject,b.name from new_ticket a,new_ticket_department b    where b.id=a.ticket_department and a.la='{$_SESSION['la']}' and a.site='{$_SESSION['site']}' $str_status order by a.id desc LIMIT $from,$to";
			//echo $query;
			$result = $coms_conect->query($query);
			while($RS1 = $result->fetch_assoc()){?>
				<tr>
					 
					<td><a href="/<?="profile/$la/ticket/show/{$RS1['id']}"?>"><?=$RS1["id"]?></a></td>
					<td><?=miladitojalaliuser(date('Y-m-d',$RS1['date']));?></td>
					<td><?=$RS1['ticket_subject']?></td>
					<td><?=$RS1['name']?></td>
					<td><a href="/<?="profile/{$_SESSION['la']}/ticket/show/{$RS1['id']}"?>" class="btn btn-info showview" href="">مشاهده</a></td>
				</tr>
			<?}?>
			</tbody>
		</table>
		<?=$pgsel?>	
		</div>
	</div>	
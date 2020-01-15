<?$rep_ticket_text=$_POST['rep_ticket_text'];
$rep_ticket_id=$_POST['rep_ticket_id'];
if(isset($ticket_id)||isset($rep_ticket_id)){
	$query="SELECT a.ticket_description,a.user_id,a.id,a.date,a.ticket_subject,b.name,a.ticket_department,a.ticket_priority
		from new_ticket a,new_ticket_department b    where b.id=a.ticket_department and a.id='$ticket_id'";
	//	echo $query;
	$result = $coms_conect->query($query);
	$RS = $result->fetch_assoc();
	$user_name=get_result("select name from new_members where id={$RS['user_id']}",$coms_conect);

if($rep_ticket_id>0){
	$get_user_name=get_result("select user_name from new_members where id={$RS['user_id']}",$coms_conect);
 
###چک کردن کاربر
	/*if($get_user_name!=$_SESSION["new_okusername"]){
		echo "<script>window.location='/'</script>" ;
 	}*/

	$link_arr=array("text"=>$rep_ticket_text,"user_id"=>$get_user_name,"user_type"=>0,"date"=>$now,"ip"=>$custom_ip,"ticket_id"=>$rep_ticket_id);
	insert_to_data_base($link_arr,'new_ticket_answer',$coms_conect);
	 
  echo "<div class='alert alert-success' role='alert'>پاسخ شما با موفقیت ارسال گردید</div>"; 
	
}?>
<div class="alert alert-info">در صورتی که تا 72 ساعت آینده پاسخی در این تیکت ارسال نشوداین تیکت به طور خودکار بسته می شود.</div>
<div id="viewcloses">
		<button id="close_ticket" value="<?=$ticket_id?>" class="btn btn-danger">بستن درخواست</button>
		<button onclick="window.location='/profile/<?=$la?>/ticket/show'" class="btn btn-inverse">بازگشت به درخواست ها</button>
		 
		<p></p>
		<img src="/waiting.gif" id="show_waiting" style="display:none">
		<div id="close_div" class='alert alert-success' role='alert' style="display:none">تیکت شما با موفقیت بسته شد</div>
		<div id="close_notok_div" class='alert alert-danger' role='alert' style="display:none">مشکل در بستن تیکت</div>
		
		<br>
		<br>
		<?
			?>
		<div class="panel panel-default">
			<div class="panel-body">
				<h4><?=$RS['ticket_subject']?></h4>
				<p><?=$RS['ticket_description']?></p>
				<p><i class="fa fa-tag"></i>شماره تیکت: <b><?=$RS['id']?></b></p>
				<br>
	 			<div class="col-xs-5 col-sm-3 gray">Status<br><?=get_ticket_status($RS['ticket_department'])?></div>
				<div class="col-xs-5 col-sm-3 gray">Priority<br> <?=get_ticket_type($RS['ticket_priority'])?></div>
				<div class="col-xs-5 col-sm-3 gray">Owner<br> <?=$user_name?></div>
				<div class="col-xs-5 col-sm-3 gray">Department<br><?=$RS['name']?></div>
			</div>
		</div>
		 <?$query="SELECT * from new_ticket_answer a  where ticket_id={$RS['id']}";
			//echo $query;
			
			$result = $coms_conect->query($query);
			while($RS12 = $result->fetch_assoc()){
			if($RS12['user_type']==1){
				$user_name=get_result("select name from new_managers where id={$RS12['user_id']}",$coms_conect);
				$user_semat=get_result("select semat from new_managers where id={$RS12['user_id']}",$coms_conect);
			}
			else if($RS12['user_type']==0){
				$user_name=get_result("select name from new_members where id={$RS12['user_id']}",$coms_conect);
				$user_semat='کاربر';
			}
						
				?>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-3 gray" style="height: 150px;"><?=$user_name?><br><?=$user_semat?>
				</div>
				<div class="col-md-9">
					<div class="widget-box">
						<div class="widget-header">
							<span class="widget-toolbar no-border" style="float:left">
								<i class="ace-icon fa fa-clock-o bigger-110"></i>
							<?=jdate('Y-m-d H:m:s',$RS12['date']);?>
							</span> 
						</div>
						<hr>
						<div class="widget-body">
							<div class="widget-main">
								<?=$RS12['text']?>
								<?if($RS12['user_type']==1&&$RS12['survey']==0){?>
								<hr>
								<div class="widget-toolbox clearfix">
									<div class="action-buttons" style="float:left">
										<div>
											آیا این پاسخ مفید بود؟ 
											<span style="float:left">
											<button id="<?=$RS12['id']?>" class="btn btn-success ok">بله</button>
											<button id="<?=$RS12['id']?>" class="btn btn-danger notok">خیر</button></span>
										</div>
									</div>
								</div>
								<?}?>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
			<?}?>
	 	<form method="post" action="">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="fa fa-user"></span><?=$user_name?>
				<small style="float:left">پاسخ جدید</small>
				<br>
			</div>
			<div class="panel-body">
				<div class="col-md-10">
					<textarea name="rep_ticket_text" class="form-control" rows="3" placeholder="پاسخ شما" style="max-width: 100%;"></textarea>
					<input type="hidden" name="rep_ticket_id" value="<?=$RS['id']?>">
				</div>
				<div class="col-md-2">	
					<button type="submit" class="btn btn-success">ارسال پاسخ</button>
				</div>
			</div>
		</div>
		</form>
	</div>
<script>
$("#close_ticket").click(function () {show_waiting
	$("#show_waiting").show();
		$.ajax({
				type:'POST',
				url:'/New_members_ajax.php',
				data:"action=close_ticket&id="+$(this).val(),
				success: function(result){
					$("#show_waiting").hide();
					if(result==1){
						
						$("#close_div").show();
					}else
					$("#close_notok_div").show();	
						
				}
			});	
		});	
</script>
<style>
.gray{
background-color: #555;
height: 55px;
color: #fff;
padding-top: 10px;
}
</style>
<?}?>	
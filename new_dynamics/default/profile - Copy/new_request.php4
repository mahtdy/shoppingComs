<?####
	$edit_user_id=injection_replace($_POST['edit_user_id']);
	$ticket_priority=injection_replace($_POST['ticket_priority']);
	$ticket_subject=injection_replace($_POST['ticket_subject']);
	$ticket_description=injection_replace($_POST['ticket_description']);
	$ticket_department=injection_replace($_POST['ticket_department']);
	
if(isset($_POST['ticket_subject'])&&$_POST['edit_user_id']==""){
	$arr_attach=array('site'=>$site,'ticket_priority'=>$ticket_priority,'ticket_subject'=>$ticket_subject,"ticket_description"=>$ticket_description,"ticket_department"=>$ticket_department,"la"=>$la,"ip"=>$custom_ip,"user_id"=>$_SESSION["new_okusername"],"date"=>time());
	$id=insert_to_data_base($arr_attach,'new_ticket',$coms_conect);
  	?>
<div class="alert alert-success">
تیکت شما با موفقیت به ثبت رسید.<br>
مشخصات تیکت شما:<br>
کد رهگیری: <span><?=$id?></span><br>
دپارتمان: <span><?=get_result("select name from new_ticket_department where id=$ticket_description")?></span><br>
<a class="btn btn-success" href="" style="float: left;">بازگشت به لیست درخواست ها</a><br><br>
</div>
	 
<?} 
 
?>

<h4>درخواست جدید</h4>
<div class="row">
	<div class="col-md-7">
		<form action="" method="post" id="cards2" enctype="multipart/form-data">
		<input type='submit'  id='submit_btn' style='display:none'>	
				<div class="form-group">
					<label class="control-label col-md-3">اهمیت *</label>
					<div class="col-md-9 form-group">
						<select type="text" name="ticket_priority" value="<?=$ticket_priority?>" class="form-control"> 
							<option <?if($ticket_priority==1)echo 'seleted';?> value="1">کم</option>
							<option <?if($ticket_priority==2)echo 'seleted';?> value="2">متوسط</option>
							<option <?if($ticket_priority==3)echo 'seleted';?> value="3">بالا</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">موضوع *</label>
					<div class="col-md-9 form-group">
						<input type="text" name="ticket_subject" value="<?=$ticket_subject?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">متن *</label>
					<div class="col-md-9 form-group">
						<textarea type="text" name="ticket_description" class="form-control" rows="7"><?=$ticket_description?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">دپارتمان *</label>
					<div class="col-md-9 form-group">
						<select type="text" name="ticket_department" value="<?=$ticket_department?>" class="form-control"> 
							<?$query="SELECT id,name from new_ticket_department where la='$la' and site='$site'";
							$result = $coms_conect->query($query);
							while($RS1 = $result->fetch_assoc()){?>	
								<option value="<?=$RS1['id']?>"><?=$RS1['name']?></option>
							<?}?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">فایل ضمیمه </label>
					<div class="col-md-9 form-group">
						<input type="file" name="attach" class="form-control">
					</div>
				</div>
			
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-9">
					<button type="submit" id="send2" class="btn btn-info"><i class="fa fa-save"></i> ثبت درخواست</button>
				</div>
			</div>
			<br>
		</form>
	</div>
	<div class="col-md-5">
	
    <h3 id="timeline">ارسال تیکت</h3>
    <ul class="timeline">
        <li>
          <div class="timeline-panel">
            <div class="timeline-body">
              <p>در صورتی که شما در کار با سیستم ای نتورک مشکلی دارید و یا در موارد مختلف نیاز به راهنمایی دارید از طریق این فرم و ارسال سوال خود به بخش مربوطه می توانید در کوتاه ترین زمان مشکلات خود را رفع کنید.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-panel">
            <div class="timeline-body">
              <p><b>نکته یک: </b>تیکت هایی که با متن انگلیسی ارسال شوند بررسی نخواهند شد.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-panel">
            <div class="timeline-body">
              <p><b>نکته دو:</b> قبل از ارسال تیکت لطفا صفحه <a href="">سوالات متداول </a>را به طور کامل مطالعه بفرمایید.</p>
            </div>
          </div>
        </li>
    </ul>

	
	</div>
</div>

<style>
.timeline {
  list-style: none;
  padding: 20px 0 20px;
  position: relative;
}
.timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #CE93D8; /* #eeeeee */
  /*left: 50%;*/
  margin-left: -1.5px;
}
.timeline > li {
  margin-bottom: 20px;
  position: relative;
}
.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}
.timeline > li:after {
  clear: both;
}
.timeline > li > .timeline-panel {
  width: 95%; /*46%*/
  float: left;
  background-color: #F3E5F5; /*add*/
  border: 1px solid #CE93D8; /* #d4d4d4 */
  border-radius: 2px;
  padding: 20px;
  position: relative;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
.timeline > li > .timeline-panel:before {
  position: absolute;
  top: 26px;
  right: -15px;
  display: inline-block;
  border-top: 15px solid transparent; 
  border-left: 15px solid #CE93D8; /* #ccc */
  border-right: 0 solid #CE93D8;   /* #ccc */
  border-bottom: 15px solid transparent; 
  content: " ";
}
.timeline > li > .timeline-panel:after {
  position: absolute;
  top: 27px;
  right: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-left: 14px solid #F3E5F5; /* #fff */
  border-right: 0 solid #F3E5F5;  /* #fff */
  border-bottom: 14px solid transparent;
  content: " ";
}
.timeline > li > .timeline-badge {
  color: #fff;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  top: 16px;
  left: 100%; /*50%*/
  margin-left: -25px;
  background-color: #999999;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline > li.timeline-inverted > .timeline-panel {
  float: right;
}
.timeline > li.timeline-inverted > .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 15px;
  left: -15px;
  right: auto;
}
.timeline > li.timeline-inverted > .timeline-panel:after {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}
.timeline-badge.primary {
  background-color: #2e6da4 !important;
}
.timeline-badge.success {
  background-color: #3f903f !important;
}
.timeline-badge.warning {
  background-color: #f0ad4e !important;
}
.timeline-badge.danger {
  background-color: #d9534f !important;
}
.timeline-badge.info {
  background-color: #5bc0de !important;
}
.timeline-title {
  margin-top: 0;
  color: inherit;
}
.timeline-body > p,
.timeline-body > ul {
  margin-bottom: 0;
}
.timeline-body > p + p {
  margin-top: 5px;
}
</style>
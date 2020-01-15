 
<?####واریز به حساب
if(isset($_POST['deposit_reseipt_id'])&&isset($_POST['deposit_price'])){
	$deposit_bank_id=injection_replace($_POST['deposit_bank_id']);
	$deposit_reseipt_id=injection_replace($_POST['deposit_reseipt_id']);
	$deposit_branch_id=injection_replace($_POST['deposit_branch_id']);
	$deposit_date=strtotime(jalalitomiladi(injection_replace($_POST['deposit_date'])));
	$deposit_description=injection_replace($_POST['deposit_description']);
	$deposit_price=injection_replace($_POST['deposit_price']);
	 $arr_attach=array("la"=>$la,"ip"=>$custom_ip,"user_id"=>$_SESSION["new_okusername"],"deposit_price"=>$deposit_price,"deposit_description"=>$deposit_description,"deposit_bank_id"=>$deposit_bank_id,"deposit_reseipt_id"=>$deposit_reseipt_id,"deposit_branch_id"=>$deposit_branch_id,"deposit_date"=>$deposit_date,"date"=>time());
	insert_to_data_base($arr_attach,'new_deposit_account',$coms_conect);
    echo "<div class='alert alert-success' role='alert'>فیش شما به شماره $deposit_reseipt_id با موفقیت ثبت گردید</div>"; 
} 
### واریز به کارت 
if(isset($_POST['credit_price'])&&isset($_POST['tracking_code'])){
	$credit_price=injection_replace($_POST['credit_price']);
	$credit_bank_id=injection_replace($_POST['credit_bank_id']);
	$last_4char=injection_replace($_POST['last_4char']);
	$tracking_code=injection_replace($_POST['tracking_code']);
	$credit_date=strtotime(jalalitomiladi(injection_replace($_POST['credit_date'])));
	$credit_description=injection_replace($_POST['credit_description']);
	 $arr_attach=array("la"=>$la,"ip"=>$custom_ip,"user_id"=>$_SESSION["new_okusername"],"credit_price"=>$credit_price,"credit_bank_id"=>$credit_bank_id,"last_4char"=>$last_4char,"tracking_code"=>$tracking_code,"credit_date"=>$credit_date,"credit_description"=>$credit_description,"date"=>time());
	insert_to_data_base($arr_attach,'new_credit_card',$coms_conect);
    echo "<div class='alert alert-success' role='alert'>فیش شما به شماره $tracking_code با موفقیت ثبت گردید</div>"; 
} 
?>	
<div class="tabbable">
	  <ul class="nav nav-tabs">
			<li class="<?php if(isset($_POST['deposit_price'])||!isset($_POST['credit_price'])) echo 'active'?>"><a href="#tab1" data-toggle="tab">واریز به حساب</a></li>
			<li class="<?php if(!isset($_POST['deposit_price'])&&isset($_POST['credit_price'])) echo 'active'?>"><a href="#tab2" data-toggle="tab">واریز به کارت</a></li>
	  </ul>
	  <div class="tab-content">
			<div class="tab-pane <?php if(isset($_POST['deposit_price'])||!isset($_POST['credit_price'])) echo 'active'?>" id="tab1">
				<div class="row">
				<form action="" method="post" id="cards">
					<div class="col-md-12">
						<div class="form-group">
							<label class="control-label col-md-5">مبلغ: </label>
							<div class="col-md-7 form-group" style="display: inline-flex;">
								<input type="text" name="deposit_price" class="form-control" onKeyUp="javascript:moneyCommaSep(this);"> 
								  <span> ریال </span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">بانک: </label>
							<div class="col-md-7 form-group">
								<select type="text" name="deposit_bank_id" class="form-control"> 
									<option value="0">بانک ملت</option>
									<option value="1">بانک پاسارگاد</option>
									<option value="2">بانک سامان</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">شماره فیش: </label>
							<div class="col-md-7 form-group">
								<input type="text" name="deposit_reseipt_id" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">کد شعبه مبدا: </label>
							<div class="col-md-7 form-group">
								<input type="text" name="deposit_branch_id" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">تاریخ پرداخت: </label>
							<div class="col-md-7 form-group">
								<input type="text" name="deposit_date" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">توضیحات: </label>
							<div class="col-md-7 form-group">
								<textarea type="text" name="deposit_description" class="form-control" rows="7"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5"></div>
						<div class="col-md-offset-2">
							<button type="submit" id="send1" class="btn btn-success" >ارسال</button>
						</div>
						<div class="col-md-5"></div>
					</div>
				</form>	
				</div>
			</div>
		
			<div class="tab-pane <?php if(!isset($_POST['deposit_price'])&&isset($_POST['credit_price'])) echo 'active'?>" id="tab2">
				<div class="row">
				<form action="" method="post" id="cards2">
					<div class="col-md-12">
						<p>در صورتی که مبلغ را واریز نموده اید این قسمت را پر کنید:</p>
						<div class="form-group">
							<label class="control-label col-md-5">مبلغ: </label>
							<div class="col-md-7 form-group" style="display: inline-flex;">
								<input type="text" name="credit_price" class="form-control" onKeyUp="javascript:moneyCommaSep(this);"> 
								  <span> ریال </span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">کارت بانک ملت: </label>
							<div class="col-md-7 form-group">
								<select type="text" name="credit_bank_id" class="form-control"> 
									<option value="0">بانک ملت</option>
									<option value="1">بانک پاسارگاد</option>
									<option value="2">بانک سامان</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">چهار رقم آخر کارت: </label>
							<div class="col-md-7 form-group">
								<input type="text" name="last_4char" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">شماره پیگیری: </label>
							<div class="col-md-7 form-group">
								<input type="text" name="tracking_code" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">تاریخ پرداخت: </label>
							<div class="col-md-7 form-group">
								<input type="text" name="credit_date" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-5">توضیحات: </label>
							<div class="col-md-7 form-group">
								<textarea type="text" name="credit_description" class="form-control" rows="7"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5"></div>
						<div class="col-md-offset-2">
							<button type="submit" id="send2" class="btn btn-success" >ارسال</button>
						</div>
						<div class="col-md-5"></div>
					</div>
				</form>	
				</div>
			</div>
	  </div>
</div>
<br>


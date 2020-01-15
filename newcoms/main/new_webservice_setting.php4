<?$sender_number=injection_replace($_POST['sender_number']);
$sms_text=injection_replace($_POST['sms_text']);
$senderNumbers=injection_replace($_POST['senderNumbers']);
$tab_number=injection_replace($_POST['tab_number']);
$url=injection_replace($_POST['url']);
$sms_password=injection_replace($_POST['sms_password']);
if($sms_password=='*********')
	$str="";else
	$str=",sms_password='$sms_password'";	
$sms_user=injection_replace($_POST['sms_user']);
if($url!=""){
	$sql="select sms_user from new_sms_webservice";
	$result = $coms_conect->query($sql);
	$row = $result->fetch_assoc();	
if ($result->num_rows == 0) {
		$query1="insert into new_sms_webservice(senderNumbers,url,sms_user,sms_password) 
		values ('$senderNumbers','$url','$sms_user','$sms_password')";
		$coms_conect->query($query1);
		show_msg('اطلاعات با موفقیت ویرایش گردید');
	}else{
	$query1="update new_sms_webservice set senderNumbers='$senderNumbers',url='$url',sms_user='$sms_user'$str"; 
	$coms_conect->query($query1);
	show_msg('اطلاعات با موفقیت ویرایش گردید');
	}



	
}
$query="select * from new_sms_webservice";
$result = $coms_conect->query($query);
$row = $result->fetch_assoc();
$url=$row['url'];
$sms_user=$row['sms_user'];
$senderNumbers=$row['senderNumbers'];
$sms_password=$row['sms_password'];

	if($sender_number>""&&$sms_text>""){
		$recipientNumbers=array($sender_number);
		$messageBodies=array($sms_text);
		$sender_num=array($senderNumbers);
		$sendDate=array(time());
		$sms=send_sms($url,$sms_password,$sms_user,$sender_num,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$manager_id);
		//echo $sms;exit
		if($sms==1)
			show_msg('پیام شما با موفقیت ارسال شد');	
		else show_msg_warninig(sms_alert($sms));	
		
	}
?>
<script>
 $(function() {
         $('#AdsPanel_new').validate({
            
            rules: {
				url: {
					required:true
				},
				sms_user: {
					required:true
				},
				sms_password: {
					required:true
				},
				senderNumbers: {
					required:true,
					number:true,	
					maxlength:14
				}
            },
            messages: {
				url: {
					required:"پر کردن اين فيلد الزامي است"
				},
				sms_user: {
					required:"پر کردن اين فيلد الزامي است"
				},
				sms_password: {
					required:"پر کردن اين فيلد الزامي است"
				},
				senderNumbers: {
					required:"پر کردن اين فيلد الزامي است",
					number:"شماره را بصورت عددی وارد نمائید",
					maxlength:"طول شماره حداکثر 14 کاراکتر می تواند باشد"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? 'فيلد خالي مانده است لطفا پر کنيد'
                        : '' + errors + 'فيلد خالي مانده است لطفا پر کنيد';
                      $("div.errorHandler button").after(message);
                      $("div.errorHandler").show();
                    } else {
                      $("div.errorHandler").hide();
                    }
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    });
</script>
<script>
 $(function() {
         $('#AdsPanel').validate({
            
            rules: {
				sender_number: {
					required:true,
					number:true
				},
				sms_text: {
					required:true
				}
            },
            messages: {
				sender_number: {
					required:"پر کردن اين فيلد الزامي است",
					number:"لطفا این فیلد را بصورت عددی وارد نمائید"
				},
				sms_text: {
					required:"پر کردن اين فيلد الزامي است"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? 'فيلد خالي مانده است لطفا پر کنيد'
                        : '' + errors + 'فيلد خالي مانده است لطفا پر کنيد';
                      $("div.errorHandler button").after(message);
                      $("div.errorHandler").show();
                    } else {
                      $("div.errorHandler").hide();
                    }
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    });
</script>
</br>
		<div class="tabbable col-md-12">
			<!--ul class="nav nav-tabs">
				<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i><?=$pro_setting_webservice_sms?></a></li>
			</ul-->
			<div class="msheet tab-content">
			
				<div class="secfhead">
					<!-- #section:main/webservice.head -->
					<div class="sectitle">
						<div class="icon"><span class="flaticon-file23" style=""></span></div>
						<div class="title"><p class="titr">تنظیمات وب سرویس پیامکی</p><p class="lead">توضیحات این بخش</p></div>
					</div>
					<!-- /section:main/webservice.head -->
					<div class="toolmenu">
						<ul>
							<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
						</ul>
					</div>

				</div>

				<div class="tab-pane active" id="tab1" style="margin-top: -40px;">
				
					<div class="tabbable">
						<ul class="nav nav-tabs">
							<li class="<?if($tab_number!=1) echo 'active'?>"><a href="#tab21" data-toggle="tab"><?=$pro_setting_webservice_sms?></a></li>
							<li class="<?if($tab_number==1) echo 'active'?>"><a href="#tab2" data-toggle="tab">تست ارسال پیامک</a></li>
						</ul>
						<div class="tab-content" style="min-height: 0px;padding: 5px;padding-top: 50px;">
							<div class="tab-pane <?if($tab_number!=1) echo 'active'?>" id="tab21">
								<form class="form-horizontal" action="" method="post" id="AdsPanel_new" name="AdsPanel_new" role="form" enctype="multipart/form-data">
									<div class="col-md-8">	
										<!-- #section:main/webservice.form -->
										<div class="form-group row">
											<label class="col-sm-3 control-label" for="url">آدرس وب سرویس</label>
											<div class="form-group col-sm-6">
												<input id="url" value="<?=$url?>" name="url" placeholder="مثال: /http://example.com " type="text" class="form-control" style="direction:ltr">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label" for="sms_user">نام کاربری</label>
												<div class="form-group col-sm-6">
													<input id="sms_user" value="<?=$sms_user?>" name="sms_user"  type="text" class="form-control" style="direction:ltr">
												</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label" for="sms_password">کلمه عبور</label>
												<div class="form-group col-sm-6">
													<input id="sms_password" value="*********" name="sms_password"  type="password" class="form-control" style="direction:ltr">
												</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-3 control-label" for="senderNumbers"  maxlength="14">شماره فرستنده</label>
												<div class="form-group col-sm-6">
													<input id="senderNumbers" value="<?=$senderNumbers?>" name="senderNumbers"  type="text" class="form-control" style="direction:ltr">
												</div>
										</div>
										<!-- /section:main/webservice.form -->
									</div>
									<div class="col-md-4">
										<div class="alert alert-warning">برای دریافت راهنما روی لینک زیر کلیک کنید.
										<p><a href="/new_help/help.docx">راهنما</a></p></div>
									</div>
									<div class="panel-footer bttools">
										<button type="submit" id="submit_page" class="btn btn-primary" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
									</div>
								</form>	
							</div>
							
							<div class="tab-pane <?if($tab_number==1) echo 'active'?>" id="tab2">
								<form class="form-horizontal" action="" method="post" id="AdsPanel" name="AdsPanel" role="form" enctype="multipart/form-data">
									<input type="hidden" value="0" id="tab_number" name="tab_number">
									<div class="panel-body">
										<div class="panel-body">
										<div class="col-md-8">
											<!-- #section:main/webservice.form2 -->
												<div class="form-group row">
													<label class="col-sm-2 control-label" for="figur">شماره گیرنده</label>
														<div class="form-group col-sm-6">
															<input type="text" name="sender_number" id="sender_number" class="form-control" >
														</div>
												</div>
												<div class="form-group row">
													<label class="col-sm-2 control-label" for="sms_text">متن</label>
														<div class="form-group col-sm-6">
															<textarea id="sms_text" name="sms_text" rows="7" type="text" style="height:112px;" class="form-control"></textarea><br>
															<!--span>  تعداد کاراکترهای باقیمانده: 160 (2)  </span>  
															<span> زبان : انگلیسی  </span>
															<a href="#" class="btn btn-primary btn-sm pull-right"><i class="fa fa-envelope"></i></a-->
														</div>
													
												</div>
												<!-- /section:main/webservice.form2 -->
											</div>	
											<div class="col-md-4">
												<div class="alert alert-warning">برای دریافت راهنما روی لینک زیر کلیک کنید.
												<p><a href="/new_help/help.docx">راهنما</a></p></div>
											</div>
										</div>
										<div class="panel-footer bttools">
											<button type="button" id="send_sms_btn" class="btn btn-success" ><span class="flaticon-verified9"></span><span>ارسال پیام</span></button>
											<img id="show_waiting_search" src="waiting.gif" dir="center" style="display:none;width: 100px;position: absolute;left: 40%;bottom: 150px">
										</div>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				
				</div>
			</div>
		</div>

<script>		
$("#send_sms_btn").click(function () {
	$("#tab_number").val('1');
 	$("#AdsPanel").submit();
	if($("#sender_number").val()&&$("#sms_text").val()){
	$("#show_waiting_search").show();
	} 
});
</script>		
	
 
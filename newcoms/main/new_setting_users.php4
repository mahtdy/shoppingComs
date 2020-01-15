<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/jasny-input/jasny-bootstrap.min.css" />
<script src="/yep_theme/default/rtl/js/jasny-input/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="/yep_theme/default/rtl/js/js-validate/jquery.validate.js"></script>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<?@session_start();
 
$mobile=injection_replace($_POST['mobile']);
 
 
$email=injection_replace($_POST['email']);
$question=injection_replace($_POST['question']);
$answer=injection_replace($_POST['answer']);
$pass_count=injection_replace($_POST['pass_count']);
$name=injection_replace($_POST['name']);
$edit_id=injection_replace($_POST['edit_id']);

 
if($edit_id==2&&$_SESSION['can_edit']==1){
	 
	$condition="user_name='{$_SESSION['manager_user_name']}'";
	if($_SESSION['manager_user_name']=='comsroot')
	$arr_slide=array("pass_count"=>$pass_count,"answer"=>$answer,"question"=>$question,"email"=>$email  ,"email"=>$email,"pass_count"=>$pass_count ,"mobile"=>$mobile);
	else
	$arr_slide=array("name"=>$name,"answer"=>$answer,"question"=>$question,"email"=>$email  ,"email"=>$email,"pass_count"=>$pass_count ,"mobile"=>$mobile);
	update_data_base($arr_slide,'new_managers',$condition,$coms_conect);
	show_msg($new_successfull);
}	
$query="select sms_login,email,question,answer,pass_count ,mobile ,name,email from new_managers where user_name ='{$_SESSION['manager_user_name']}'";
$result = $coms_conect->query($query);
$RS1 = $result->fetch_assoc();
?>

<style>
.error {
color : red;
}
</style>
<script>
 $(function() {
         $('#new_people').validate({
            
            rules: {
				mobile: {
					required:true,
					number: true
				},
				pass_count: {
					number: true
				},
			 
				question: {
					required:true
				},
				answer: {
					required:true
				},
				email: {
					required:true,
					email: true
				}
            },
            messages: {
				mobile: {
					required:"پر کردن اين فيلد الزامي است",
					number: "اين فيلد عددي است"
				},
				pass_count: {
					number: "اين فيلد عددي است"
				},
		 
				question: {
					required:"پر کردن اين فيلد الزامي است"
				},
				answer: {
					required:"پر کردن اين فيلد الزامي است"
				},
				email: {
					required:"پر کردن اين فيلد الزامي است",
					email: "فرمت اين فيلد به اين شکل مي باشد name@domain.com"
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
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;">
		<button data-dismiss="alert" class="close" sourceindex="208">x</button>
			<i class="fa fa-times-sign"></i>
		</div>
<!-- /alert panel  -->

	<div class="tabbable">
		<!--ul class="nav nav-tabs">
						
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			تنظيمات امنيتي </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/setting_users.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">تنظيمات امنيتي</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/setting_users.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			<div class="tab-pane active" id="tab1">
				
			
			<form class="form-horizontal" action="" method="post" name="new_people" id="new_people" enctype="multipart/form-data">
				<input type="hidden" id="edit_id" name="edit_id" value="2">	
				<div id="id-message-new-navbar" class="message-navbar clearfix">
					<input type='hidden' id='validation' value='1'>
					<a type="submit"   id="submit_page2" href="#"  class="save submit2" data-original-title="ذخیره">
						<span class="flaticon-verified9">
						</span>
					</a>
					<a href="newcoms.php?yep=new_Dashboard" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
						<span class="flaticon-left-arrow9">
						</span>
					</a>
				</div>
				</br>
						
					<script>
					$("#submit_page2").click(function (e){
						$("#new_people").submit();
					});
					</script>
						
				<div class="panel-body" style="padding: 65px;padding-right: 135px;">
				<!-- #section:main/setting_users.form -->
					<div class="col-md-7">
 
 
						<div class="form-group">
							<label class="col-sm-5 control-label">فعال سازی ورود دو مرحله ای</label>
							<div class="form-group col-sm-7">
								<label>
									<input <?if($RS1['sms_login']==1) echo 'checked';?>  id='active_sms' class="ace ace-switch ace-switch-6 " type="checkbox" />
									<span class="lbl"></span>
								</label>													
							</div>
						</div>

						<?if($_SESSION['manager_user_name']!='comsroot'){?>
						<div class="form-group">
							 <label class="col-sm-5 control-label">نام مدیر</label>
							 <div class="form-group col-sm-7">
								<input type="text" value="<?=$RS1['name']?>" name="name" id="name" class="form-control ">
							 </div>
						</div>
						<?}?>
						<div class="form-group">
							 <label class="col-sm-5 control-label">ایمیل برای بازیابی کلمه عبور *</label>
							 <div class="form-group col-sm-7">
								<input type="text" value="<?=$RS1['email']?>" name="email" id="email" class="form-control " style="direction: ltr;">
							 </div>
						</div>
						
						<div class="form-group">
							 <label class="col-sm-5 control-label">سوال امنیتی *</label>
							 <div class="form-group col-sm-7">
								<input type="text" value="<?=$RS1['question']?>" name="question" id="question" class="form-control">
							 </div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-5 control-label">پاسخ سوال امنیتی *</label>
								<div class="form-group col-sm-7">
									<input type="text" value="<?=$RS1['answer']?>" name="answer" id="answer" class="form-control">								
								</div>
						</div>
						<?if($_SESSION['manager_user_name']=='comsroot'){?>
						<div class="form-group">
							<label class="col-sm-5 control-label">تعداد مجاز وارد نمودن کلمه عبور</label>
								<div class="form-group col-sm-7">
									<input type="number" value="<?=$RS1['pass_count']?>" name="pass_count" id="pass_count" class="form-control">								
								</div>
						</div>
						<?}?>
 
											<div class="form-group">
												<label class="col-md-5 control-label" for="family">موبایل *</label> 
												<div class="form-group col-md-7">
													<input type="text" value="<?=$RS1['mobile']?>" name="mobile" id="mobile" class="form-control input-mask-mob" >
												</div>
											</div>
											
 
							 
						
					
					</div>
					<!-- /section:main/setting_users.form -->
				</div>
				<div class="panel-footer bttools">
					<button type="submit" id="submit_page" class="btn btn-success" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
				</div>
				</form>
			
		</div>
	</div>
</div>	
<?$_SESSION["edit_item"]='active_sms_manager';?>
<script src="ajax_js/user_setting.js"></script>
<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';
		$('.input-mask-mob').mask('99999999999');
	});
	
			$('.iframe-btn').fancybox({
			'width'   : 880,
			'height'  : 570,
			'type'    : 'iframe',
			'autoScale'   : false
		});
</script>	

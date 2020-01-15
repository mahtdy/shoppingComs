<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<?//print_r($manager_la)?>


<?$oldpassword=injection_replace($_POST['oldpassword']);
	$confirm_password=injection_replace($_POST['confirm_password']);
	$password=injection_replace($_POST['password']);
if(($oldpassword)>""&&$_SESSION['can_edit']==1){
	$real_paass=$password;
	$user_name=$_SESSION["manager_user_name"];
 
	$old_db_password=get_result("SELECT password FROM  new_managers  WHERE user_name='$user_name'",$coms_conect);
	$oldpassword=create_password($user_name,$oldpassword);
	if($old_db_password==$oldpassword){
	$password=create_password($user_name,$password);
	$condition="user_name='$user_name'";
    $arr_slide=array("password"=>$password);
    update_data_base($arr_slide,'new_managers',$condition,$coms_conect);
	####ارسال ایمیل به مدیر جدید
	$email=get_result("SELECT email FROM  new_managers  WHERE user_name='$user_name'",$coms_conect);
	
	$temp=$_SERVER['SERVER_NAME'];
	$msg ="<div style='text-align:rigth'>";
	$msg .="نام سایت:  $temp <br> ";
	$msg .=" نام کاربری: $user_name  <br> ";
	$msg .="کلمه عبور جدید:  $real_paass  <br> ";
 
	$msg .="</div>";
	$sql="select email,user_id from new_contact_us where id='$user'";
	$result = $coms_conect->query($sql);
	$row = $result->fetch_assoc();
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From:  $temp noreply@$temp ";
//	 mail($row['email'],"$view_message_site: {$_SERVER['SERVER_NAME']}",$msg,$headers);	
	
		mail($email,"تغییر کلمه عبور",$msg,$headers);
		$manager_id=$_SESSION["manager_id"];
	  $arr_attach=array("email"=>$email,"date"=>time(),"text"=>"نام کاربری :$user_name و کلمه عبور :$real_paass"."سایت {$_SERVER['HTTP_HOST']}","manager_id"=>$manager_id);
	  insert_to_data_base($arr_attach,'new_email_archive',$coms_conect);
	echo '<div class="yepalert yepalert-success fade alert in" style="position: fixed;">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong></strong> کلمه عبور قبلی تغییر یافت    </div>
	';		  
	}else{
	echo ' <div class="yepalert yepalert-warning fade alert in" style="position: fixed;">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong></strong> کلمه عبور قبلی شما اشتباه است    </div>
	  ';	
	}

 
}
?>
<script>
        $(function () {
          var img = $('<img id="dynamic">'); 
          img.attr('src', 'waiting.gif');
          img.appendTo('button[type="submit"]');
        });
        //window.location='newcoms.php?yep=new_Dashboard'; 
</script>
	  
<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  --> 

	
	<div class="tabbable">
		<div class="msheet tab-content">
			
			<div class="secfhead">
				<!-- #section:subsite/manager.head -->
				<div class="sectitle">
					<div class="icon"><span class="flaticon-file23" style=""></span></div>
					<div class="title"><p class="titr">تغییر کلمه عبور</p><p class="lead">توضیحات این بخش</p></div>
				</div>
				<!-- /section:subsite/manager.head -->
				<?/*?>
				<div class="toolmenu">
					<ul>
						<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

						<li id="newpag" class="addicon">
							<a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن مدیر" >
								<span class="flaticon-add149"></span>
							</a>
						</li>
	 
					</ul>
				</div>
				<?*/?>
			</div>
		
			<div class="tab-pane active" id="tab1" style="padding: 65px;">
				<div id="id-message-new-navbar" class="message-navbar clearfix">
					<a href="newcoms.php?yep=new_Dashboard" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
						<span class="flaticon-left-arrow9">
						</span>
					</a>
				</div>
				<!-- #section:subsite/manager.table -->
				<div class="col-md-6">
					<form action="" method="post" id="reset_password" name="login">
					<div class="form-group row">
						<label class="col-md-4 control-label" for="family">کلمه عبور قبلی</label> 
						<div class="form-group col-md-8">
							<input type="password" name="oldpassword" id="oldpassword" class="form-control"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 control-label" for="family">کلمه عبور جدید</label> 
						<div class="form-group col-md-8">
							<input type="password" name="password" id="password" class="form-control"/>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 control-label" for="family">تکرار کلمه عبور</label> 
						<div class="form-group col-md-8">
							<input type="password" name="confirm_password" id="confirm_password" class="form-control"/>
						</div>
					</div>
					<div class="form-group row">
					<label class="col-md-4 control-label" for="family"></label> 
				   <button type="" id="change_login" class="width-35 btn btn-sm btn-success">
					  <i class="ace-icon fa fa-key"> تغییر کلمه عبور </i>
					  <img id="login_pic" src="/waiting.gif" style="display:none;width: 100px;position: absolute;right: 180px;bottom: -13px">
					</button>
					  </div>
					</form>
				</div>
				
				<div class="col-md-6">
					<div class="alert alert-info">
						<b>نکات زیر را در انتخاب رمز عبور خود رعایت نمایید:</b><br>
						رمز عبور باید طولانی باشد<br>
						رمز عبور باید پیچیده باشد<br>
						رمز عبور باید ترکیبی از اعداد و حروف باشد<br>
						رمز عبور را باید بتوان بخاطر سپرد<br>
						رمز عبور باید حداقل 8 کاراکتر انتخاب شود
					</div>
				</div>
				<!-- /section:subsite/manager.table -->
				<?=$pgsel?>
			</div>
 		</div>			
	</div>
 
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
    
<script>
$(document).ready(function() {
	
//$('#myFrm').validate();
	$('#change_login').click(function() {
	
	$('#reset_password').formValidation({
		framework: 'bootstrap',
		button: {
			selector: '#change_login',
			disabled: 'disabled'
		},
		fields: {
			
			oldpassword: {
				validators: {
					notEmpty: {
						message: 'پر کردن اين فيلد الزامي است'
					}
				}
			},
			password: {
				validators: {
					notEmpty: {
						message: 'پر کردن اين فيلد الزامي است'
					},
                    stringLength: {
						message: 'نام کاربري بايد بين 8 تا 30 کاراکتر باشد',
                        min: 8,
                        max: 30
                    },
                    regexp: {
						message: 'براي نام کاربري خود از حروف و شماره و نقطه استفاده کنيد',
                        regexp: /^[a-zA-Z0-9]+$/
                    },
					identical: {
						field: 'confirm_password',
						message: 'تکرار کلمه عبور با کلمه عبور يکسان نيست'
					}
				}  		
			},
			confirm_password: {
				validators: {
					notEmpty: {
						message: 'پر کردن اين فيلد الزامي است'
					},
					numeric: {
						message: 'این فیلد عددی است'
					},
                    stringLength: {
						message: 'نام کاربري بايد بين 8 تا 30 کاراکتر باشد',
                        min: 8,
                        max: 30
                    },
                    regexp: {
						message: 'براي نام کاربري خود از حروف و شماره و نقطه استفاده کنيد',
                        regexp: /^[a-zA-Z0-9]+$/
                    },
					identical: {
						field: 'password',
						message: 'تکرار کلمه عبور با کلمه عبور يکسان نيست'
					}
				}
			},
		}
	}).on('success.form.fv', function(e) {

            e.preventDefault();

            var $form = $(e.target);

            var fv = $form.data('formValidation');

			$('#login_pic').show();
			
            fv.defaultSubmit();
        });
	});
});
//
//$("#change_login").click(function () {
//	$('#login_pic').show();	
//	$('#reset_password').submit(); 
//});
//$(document).ready(function() {
//    $('#reset_password').formValidation();
//});
</script>  
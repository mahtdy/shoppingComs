<div>
	<form id="emailvalid" role="form" action="#" method="post" enctype="multipart/form-data">
		
			<div class="well">
				از طریق فرم زیر می توانید نسبت به تغییر آدرس ایمیل محرمانه خود در سایت اقدام کنید . با تغییر آدرس ایمیل محرمانه خود ، از این پس کلیه ایمیل های ارسالی از سایت آپارات دات کام برای شما (همچون ایمیل فراموشی کلمه عبور) به آدرس ایمیل جدید شما ارسال خواهد شد . پس از تغییر آدرس ایمیل خود ، یک ایمیل به آدرس جدید شما ارسال خواهد شد که حاوی لینک تائید آدرس جدید شما می باشد . با کلیک بر روی آن لینک آدرس ایمیل جدید شما جایگزین ایمیل قبلی خواهد شد. <br>
				دقت کنید که : 
				در هنگام کلیک لینک ارسالی باید حتما در آپارات لاگین کرده باشید.
			</div>
			<div class="col-md-7">
				<div class="form-group">
					<label class="control-label">ایمیل </label>
					<input type="email" name="email_p" value="<?=$email?>"  class="form-control" style="direction: ltr !important;background-color: #f5f5f5;">
				</div>
				<div class="form-group"> 
					<label class="control-label">کد تصویری زیر را وارد نمایید </label>
	              	
	                <div class="input-group">
	                    <input type="text" class="form-control"  name="com1_captcha" placeholder="کد امنيتي *" style="border-radius: 0px;margin-left: -1px;">
	                    <span class="input-group-addon" style="padding: 0px;"><?if($manage_lang=='')$manage_lang='fa';?>
	             			<img src="<?crate_capcha_pic($manage_lang)?>"  style="padding-top: 1px;"/>
	             		</span>
	                </div>
	            </div> 

				<div class="form-group">
					<button type="submit" class="btn btn-primary">ثبت</button>
				</div>
			</div>
	</form>	
</div>	

<script>
$(document).ready(function() {
    $('#emailvalid').formValidation({
            framework: 'bootstrap',
	    fields: {
	    	 email_p: {
	            validators: {
	                notEmpty: {
	                    message: 'پر کردن اين فيلد الزامي است'
	                },
                    emailAddress: {
                    	 message: 'آدرس ايميل صحيح نيست'
                    }
	            }
	        },
	    	com1_captcha: {
	            validators: {
	                notEmpty: {
	                	message:"پر کردن اين فيلد الزامي است"
	                },
	                numeric: {
	                    message: 'این فیلد عددی است'
	                }
	            }
	        }
	    }
	})
    .on('success.form.fv', function(e) {
            // Prevent form submission
            e.preventDefault();

            // Some instances you can use are
            var $form = $(e.target),        // The form instance
                fv    = $(e.target).data('formValidation'); // FormValidation instance

            // Do whatever you want here ...
        });
});
</script>

<style>
.has-success .form-control {
    border-color: #3c763d !important; 
}
</style>		
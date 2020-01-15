<div>
	<form id="contactvalid" role="form" action="#" method="post" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" name='name_pa' class="form-control" placeholder="نام">
			</div>
			<div class="form-group">
				<input type="email" name="email_pa" class="form-control" placeholder="ایمیل" style="direction: ltr !important;">
			</div>
			<div class="form-group">
				<input type="text" name="tell_pa" class="form-control" placeholder="تلفن">
			</div>
			<div class="form-group">
				<input type="text" name="mob_pa" class="form-control" placeholder="تلفن همراه">
			</div>
			<div class="form-group">
				<input type="text" name="address_pa" class="form-control" placeholder="آدرس">
			</div>
			<div class="form-group">
				<input type="text" name="sub_pa" class="form-control" placeholder="موضوع">
			</div>
		</div>	
		<div class="col-md-12">
			<div class="form-group">
				<textarea class="form-control" name="text_pa" rows="3" placeholder="متن پیام" style="max-width: initial;"></textarea>
			</div>
		</div>
		<div class="col-md-6">	
			<div class="form-group"> 
				<div class="input-group">
                    <input type="text" class="form-control"  name="com1_captcha" placeholder="کلمه امنیتی" style="border-radius: 0px;margin-left: -1px;">
                    <span class="input-group-addon" style="padding: 0px;"><?if($manage_lang=='')$manage_lang='fa';?>
             			<img src="<?crate_capcha_pic($manage_lang)?>"  style="padding-top: 1px;"/>
             		</span>
                </div>
            </div> 
			<div class="form-group">
				<button type="submit" class="btn btn-primary">ارسال پیام</button>
			</div>
		</div>	
	</form>	
</div>		

<script>
$(document).ready(function() {
    $('#contactvalid').formValidation({
            framework: 'bootstrap',
	    fields: {
	    	 email_pa: {
	            validators: {
	                notEmpty: {
	                	message:"پر کردن اين فيلد الزامي است"
	                },
	                emailaddress:{
	                	message:"آدرس ایمیل صحیح نیست"
	                }
	            }
	        },
	    	sub_pa: {
	            validators: {
	                notEmpty: {
	                	message:"پر کردن اين فيلد الزامي است"
	                }
	            }
	        },
	    	text_pa: {
	            validators: {
	                notEmpty: {
	                	message:"پر کردن اين فيلد الزامي است"
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
                			
       
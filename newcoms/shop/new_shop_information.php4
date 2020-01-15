<script src="/yep_theme/default/rtl/assets/js/jquery.maskedinput.min.js"></script> 

<script type="text/javascript">
	jQuery(function($) {
		$.mask.definitions['~']='[+-]';
		$('.input-mask-date').mask('99/99/9999');
		$('.input-mask-phone').mask('99999999999');
		$('.input-mask-posti').mask('9999999999');
		$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
	});
</script>

<style>
.error {
color : red;
}
</style>
<script>
 $(function() {
         $('#shop_information').validate({
            
            rules: {
				name: {
					required:true
				},
				manage: {
					required:true
				},
				mail: {
					required:true,
					email: true
				},
				tell: {
					required:true,
					number: true
				},
				adress: {
					required:true
				},
				post: {
					required:true,
					number: true
				}
            },
            messages: {
				name: {
					required:"پر کردن اين فيلد الزامي است"
				},
				manage: {
					required:"پر کردن اين فيلد الزامي است"
				},
				mail: {
					required:"پر کردن اين فيلد الزامي است",
                    email: "فرمت اين فيلد به اين شکل مي باشد name@domain.com"
				},
				tell: {
					required:"پر کردن اين فيلد الزامي است",
                    number: "اين فيلد عددي است"
				},
				adress: {
					required:"پر کردن اين فيلد الزامي است"
				},
				post: {
					required:"پر کردن اين فيلد الزامي است",
                    number: "اين فيلد عددي است"
				}
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? '1 فيلد خالي مانده است لطفا پر کنيد'
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

<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  -->

	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			مشخصات فروشگاه </a></li>
		</ul>
		<div class="tab-content">
		
			<div class="tab-pane active" id="tab1">
			
				<form class="form-horizontal" id="shop_information" name="shop_information" action="" role="form" method="post" enctype="multipart/form-data">
					<div class="panel-body">
				
						<div class="col-md-12">
							<div class="form-group">
								<label class="col-md-2 control-label" for="group_name">نام شرکت *</label> 
								<div class="form-group col-md-5">
									<input name="name" id="name" class="form-control">										
								</div>
							</div>
						</div>
						<div class="col-md-12">	
							<div class="form-group">
								<label class="col-md-2 control-label" for="group_name">مدیر *</label> 
								<div class="form-group col-md-5">
									<input name="manage" id="manage" class="form-control">										
								</div>
							</div>
						</div>
						<div class="col-md-12">		
							<div class="form-group">
								<label class="col-md-2 control-label" for="group_name">ایمیل *</label> 
								<div class="form-group col-md-5">
									<input name="mail" id="mail" class="form-control">										
								</div>
							</div>
						</div>
						<div class="col-md-12">		
							<div class="form-group">
								<label class="col-md-2 control-label" for="group_name">تلفن *</label> 
								<div class="form-group col-md-5">
									<input name="tell" id="tell" class="form-control input-mask-phone" placeholder="لطفا با کد شهرستان بدون خط تیره وارد نمائید">										
								</div>
							</div>
						</div>
						<div class="col-md-12">		
						 
							<div class="form-group">
								<label class="col-md-2 control-label" for="family">آدرس *</label> 
								<div class="form-group col-md-7">
									 <textarea name="adress" id="adress" class="form-control" rows="3"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-12">		
							<div class="form-group">
								<label class="col-md-2 control-label" for="group_name">کد پستی *</label> 
								<div class="form-group col-md-5">
									<input name="post" id="post" class="form-control input-mask-posti" placeholder="لطفا بدون خط تیره وارد نمائید">										
								</div>
							</div>
						</div>	
					</div>
					<div class="panel-footer">
							<button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>ذخیره</button>
					</div> 
				</form>
			</div>
		</div>
	</div>	
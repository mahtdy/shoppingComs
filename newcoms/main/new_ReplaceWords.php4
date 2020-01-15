<style>
.error {
color : red;
}
</style>
<script>
 $(function() {
         $('#number_bank').validate({
            
            rules: {
				ebarat: {
					required:true
				},
				jabjayi: {
					required:true
				}
            },
            messages: {
				ebarat: {
					required:"پر کردن اين فيلد الزامي است"
				},
				jabjayi: {
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

<!-- alert panel  -->
		<div class="errorHandler alert alert-danger" style="display:none;"> 
		<button data-dismiss="alert" class="close" sourceindex="208"> x </button>
			<i class="fa fa-times-sign"> </i>
		</div>
<!-- /alert panel  -->

	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			جایگزینی واژه </a></li>
		</ul>
		<div class="tab-content">
		
			<div class="tab-pane active" id="tab1">
				<form class="form-horizontal" id="number_bank" name="number_bank" action="" role="form" method="post" enctype="multipart/form-data">
					<div class="panel-body">
					
						<div class="container-fluid"> 
							<div class="row-fluid"> 
								<div class="col-md-12">
									<div class="row-fluid"> 
									<div class="col-md-6">
											<div class="form-group">
												<label class="col-md-3 control-label" for="group_name">عبارت اولیه</label> 
												<div class="form-group col-md-9">
													<textarea name="ebarat" id="ebarat" class="form-control" rows="3"></textarea>										
												</div>
											</div>
										 
										 
											<div class="form-group">
												<label class="col-md-3 control-label" for="family">جایگزینی با</label> 
												<div class="form-group col-md-9">
													 <textarea name="jabjayi" id="jabjayi" class="form-control" rows="3"></textarea>
												</div>
											</div>
											
											<div class="form-group">
											<div class="form-group col-md-3"></div>
												<div class="checkbox">
													<label style="margin-right: 4%;">
													  <p><input name="show_callme" value="1" id="show_callme" type="checkbox" value="1">صفحات استاتیک</p>
													  <p><input name="show_callme" value="1" id="show_callme" type="checkbox" value="1">بلوک ها</p>
													  <p><input name="show_callme" value="1" id="show_callme" type="checkbox" value="1">منو</p>
													</label>
												</div>
											</div>
				
									</div>
									 
									<div class="col-md-6">
										<div class="alert alert-warning">
											<div class="panel-body">
											  ! هشدار : جابجايي متون ممکن است منجر به خرابي حجم وسيعي از اطلاعات شما گردد . از اين قسمت فقط در صورتي استفاده نماييد که ناچار به جابجايي واژه در حجم وسيعي را داريد . به عنوان مثال شما مي توانيد آدرس تصاوير مندرج در همه صفحات را به روي سرور ديگري منتقل نماييد
											</div>
										</div>
									</div>
									 
									</div>
								 
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
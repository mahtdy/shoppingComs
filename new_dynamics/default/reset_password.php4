<?$_SESSION['user_type']='member';?>            <!-- Start Slider -->
            <section class="slider pimg animated fadeIn hidden-xs">
				<img src="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/img/slider1.jpg">
            </section>

            <!-- Start breadcrumb -->
            <section class="breadcrumb-sec animated fadeIn">
                <div class="container">
                    <ol class="breadcrumb rtl">
                        <li><a href="#"><span class="fa fa-home"></span></a></li>
                        <li><a href="#"><?=$view_account?></a></li>
                        <li class="active"><?=$view_reset_password?></li>
                    </ol>
                </div>
            </section>


        <!-- Start Page Title -->
        <div class="ptitle">
            <div class="container">

                <span class="fa fa-user"></span>

                <h1 class="title"><?=$view_reset_password?></h1>
                <span class="pdesc">توضیح مختصر درباره این صفحه در اینجا نمایش داده می شود.</span>

            </div>
        </div>
        <!-- End Page Title -->

        <div class="container">
            <main>
                <!-- Start Main -->
                <div class="row remember">

                    <div class="col-md-6 desc pull-left rtl">
                        <h3 class="rtl"><span class="fa fa-info-circle"></span><?=$view_help?></h3>
                        <hr>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی
                            تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در
                            شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها
                            شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
                            ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط
                            سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته
                            اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
                    </div>
					
                    <div class="col-md-6 col-sm-12 col-xs-12 form pull-right">
                        <h3 class="rtl pr0"><span class="fa fa-repeat"></span><?=$view_reset_password_form?></h3>
                        <hr>

                        <ul class="nav nav-tabs rtl">
                            <li class="active"><a data-toggle="tab" href="#email"><span class="fa fa-envelope-o"></span><span><?=$view_email?></span></a></li>
                            <li><a data-toggle="tab" href="#mobile"><span class="fa fa-mobile"></span><span><?=$view_sms?></span></a></li>
                        </ul>
						
						
                        <div class="tab-content">
							
                            <div id="email" class="tab-pane fade in active row">
                               <form method="post" id="member_resetForm"
								data-fv-framework="bootstrap"
								data-fv-icon-validating="glyphicon glyphicon-refresh">
							
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                                    <input class="form-control" id='email_member' name="email_member" type="email" placeholder="<?=$view_enter_email?> ..."></input>
                                </div>
								
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                                    <button id='send_email' class="btn btn-success fullwidth"><?=$view_send?></button>
                                </div>
								<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
									<img id='wait_email' src='/waiting.gif' style='display:none'>
									<div id='show_email'></div> 
								</div>	
								</form>	
                                
                            </div>
							
							
                            <div id="mobile" class="tab-pane fade row">
                                <form method="post" id="member_resetphoneForm"
								data-fv-framework="bootstrap"
								data-fv-message="This value is not valid"
								data-fv-icon-validating="glyphicon glyphicon-refresh">
							
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                                    <input class="form-control" id='sms_number' name="sms_number" type=" " placeholder="<?=$view_enter_mobile?> ..."></input>
                                </div>
								
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
                                    <button id='send_sms' class="btn btn-success fullwidth"><?=$view_send?></button>
                                </div>
								<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
									<div id='show_sms'></div>
									<img id='wait' src='/waiting.gif' style='display:none'>
								</div>	
                              </form>
                            </div>
							
                        </div>
						
				<script type="text/javascript" src="yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
				<script src="yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
				<link href="yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
				<script>
				$(document).ready(function() {
					$('#member_resetForm').formValidation({
						framework: 'bootstrap',
						
						fields: {
							email_member: {
								validators: {
									notEmpty: {
										message: '<?=$view_field_required?>'
									},
									emailAddress: {
										message: '<?=$view_email_required?>'
									}
								}
							}
						}
					});
				});
				</script>
				<script>
				$(document).ready(function() {
					$('#member_resetphoneForm').formValidation({
						framework: 'bootstrap',
						button: {
							selector: '#send_sms',
							disabled: 'disabled'
						},
						fields: {
							sms_number: {
								validators: {
									notEmpty: {
										message: '<?=$view_field_required?>'
									},
									numeric: {
										message: '<?=$view_number_required?>'
									}
								}
							}
						}
					});
				});
				</script>
         		<script>            
              $("#send_email").click(function () {
				if($('#email_member').val()>""){ 
						$("#wait_email").show();
						$.ajax({
						type:'POST',
						url:'/New_members_ajax.php',
						data:"action=send_member_email&id="+$('#email_member').val(),
						success: function(result){
							$("#wait_email").hide();
							$("#show_email").html(result);  
						}
						});
					}				
              });
              $("#send_sms").click(function () {
					if($('#sms_number').val()){
						$("#wait").show();
						$.ajax({
						type:'POST',
						url:'/New_members_ajax.php',
						data:"action=send_member_sms&id="+$('#sms_number').val(),
						success: function(result){
							$("#wait").hide();
							$("#show_sms").html(result);  
						}
						});
					}				
              });
               $(document).on('click', '#send_code', function(event) { 
                $.ajax({
                  type:'POST',
                  url:'/New_members_ajax.php',
                  data:"action=send_member_code&id="+$('#sms_number').val()+"&value="+$('#code_number').val(),
                  success: function(result){
                    if(result==0)
                    alert('<?=$view_incorrect_code?>');  
                    if(result==1){
                      window.location='/new_member_answer_question.php?la=<?=$defult_lang?>';
                    }
                  }
                });    
              })
          </script>

                    </div>
				
                </div>
                <!-- end main row -->
            </main>
            <!-- end main -->
        </div>
        <!-- End main container -->
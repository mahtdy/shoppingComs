

        // jQuery.validator.addMethod("regex", function(value, element) {
        //   return this.optional(element) || ^\d$.test(value);
        // }, "Please specify the correct domain for your documents");

       $.validator.addMethod(
           "regex1",
           function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            "Please check your input."
        );
 
 $(function() {
         $('#sign-in').validate({
            debug: true,
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                number: {
                    required: true,
                    regex1: "^192\.168\.0\.([1-9]|[1-9][0-9]|1([0-9][0-9])|2([0-4][0-9]|5[0-4]))$"
                }
            },
            messages: {
                password:{
                    required: "We need your password",
                    minlength: "پسورد شما حداقل 6 کاراکتر می باید باشد"
                }, 
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                },
                number: {
                    required: "We need your number",
                    regex1: "Your number must be one digit"
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit
                    var errors = validator.numberOfInvalids();
                    if (errors) {
                      var message = errors == 1
                        ? 'You missed 1 field. It has been highlighted'
                        : 'You missed ' + errors + ' fields. They have been highlighted';
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
 
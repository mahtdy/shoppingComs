<?$query="SELECT email,url,pagename,about_page from new_members where id='{$_SESSION["new_userid"]}'";
$result = $coms_conect->query($query);
while($member_social = $result->fetch_assoc()){
	$url=$member_social['url'];
	$pagename=$member_social['pagename'];
	$email=$member_social['email'];
	$about_page=$member_social['about_page'];
}?>
<div>
<div id="show_comment_message_div"></div>
	<form id="infovalid" role="form" action="#" method="post" enctype="multipart/form-data">
		<div class="col-md-7">
			<div class="form-group">
				<label class="control-label">نام کاربری</label>
				<input type="text" name='username_p' id='username_p' value="<?=$_SESSION["new_okusername"]?>" class="form-control" style="direction: ltr !important;background-color: #f5f5f5;" >
                <div id="show_check_box" class="form-group "></div>
                <input type="hidden" id="check_ajax_user" value="1">

            </div>
			<div class="form-group">
				<label class="control-label">ایمیل  <a data-toggle="tab" href='#tab_default_5' style="float: left;color:#1976D2 !important;">تغییر ایمیل</a></label>
				<input type="email" name="email_p" id="email_p" value="<?=$email?>"  class="form-control" style="direction: ltr !important;background-color: #f5f5f5;" >
                <div id="show_email_box" class="form-group "></div>
                <input type="hidden" id="check_ajax_email" value="1">
			</div>
			<div class="form-group">
				<label class="control-label">نام صفحه کاربری (فارسی)</label>
				<input type="text" name="pagename_p" value="<?=$pagename?>" class="form-control">
			</div>
			<div class="form-group">
				<label class="control-label">آدرس اینترنتی</label>
				<input type="url" name="url_p" value="<?=$url?>"  class="form-control" placeholder="http://sample.com/" style="direction: ltr !important;">
			</div>
			<div class="form-group">
				<label class="control-label">درباره صفحه</label>
				<textarea class="form-control"  name="about_p"  rows="3"><?=$about_page?></textarea>
			</div>
			<div class="well">در صورتی که مایل به تغییر رمز عبور خود نیستید فیلدهای زیر را خالی بگذارید</div>
			<div class="form-group">
				<label class="control-label">رمز عبور کنونی</label>
				<input type="password" name="pass_p" class="form-control" style="direction: ltr !important;">
			</div>
			<div class="form-group">
				<label class="control-label">رمز عبور جدید</label>
				<input type="password" name="new_pass_p" class="form-control" style="direction: ltr !important;">
			</div>
			<div class="form-group">
				<button type="submit" id="submit_page" class="btn btn-primary">ویرایش</button>
				<img src="/waiting.gif" id="show_pic_comment" style="display:none">
			</div>
		</div>	
	</form>	
</div>		

<script>
$(document).ready(function() {
    $('#infovalid').formValidation({
            framework: 'bootstrap',
	    fields: {
	    	 url_p: {
	            validators: {
	                uri: {
	                    message: 'لطفا آدرس اینترنتی خود را به صورت http://sample.com/ وارد نمایید'
	                }
	            }
	        },
	    	pass_p: {
	            validators: {
	                
	                different: {
	                    field: 'new_pass_p,username_p',
	                    message: 'رمز عبور کنونی نباید با رمز عبور جدید و نام کاربری یکسان باشد'
	                }
	            }
	        },
	    	new_pass_p: {
	            validators: {
	            
	                different: {
	                    field: 'pass_p,username_p',
	                    message: 'رمز عبور جدید نباید با نام کاربری و رمز عبور کنونی یکسان باشد'
	                }
	            }
	        }
	    }
	})
    .on('success.form.fv', function(e) {
		$("#show_pic_comment").show();
		$.ajax({
			type : "POST",
			url:'/New_members_ajax.php',
			data : 'action=update_member_information&'+$('#infovalid').serialize(),
			success : function (data) {
				 $("#show_pic_comment").hide();
				 $('#show_comment_message_div').html(data);   
			}
		});
            // Prevent form submission
             e.preventDefault();

            // Some instances you can use are
          //  var $form = $(e.target),        // The form instance
           //     fv    = $(e.target).data('formValidation'); // FormValidation instance

            // Do whatever you want here ...
        });
});

$("#username_p").keyup(function () {
    $.ajax({
        type:'POST',
        url:'/New_members_ajax.php',
        data:"action=check_users&id="+$(this).val(),
        success: function(result){
            if(result>0){
                $("#show_check_box").html('<?=$view_repeat_name?>');
                $("#show_check_box").attr('style','color:red');
                $('#submit_page').attr('disabled','disabled');
                $('#check_ajax_user').val(0);
            }
            else if(result==0){
                $("#show_check_box").html('<?=$view_free_name?>');
                $("#show_check_box").attr('style','color:green');
                $('#check_ajax_user').val(1);
                // if($('#check_ajax_email').val()==1&&$('#check_ajax_mobile').val()==1&&$('#check_ajax_user').val()==1)
                if($('#check_ajax_user').val()==1)
                    $('#submit_page').removeAttr('disabled');
            }
        }
    });
});
$("#email_p").keyup(function () {
    $.ajax({
        type: 'POST',
        url: '/New_members_ajax.php',
        data: "action=check_user_email&id=" + $(this).val(),
        success: function (result) {
            if (result > 0) {
                $("#show_email_box").html(' <?=$view_repeat_email?>');
                $("#show_email_box").attr('style','color:red');
                $('#check_ajax_email').val(0);
                $('#submit_page').attr('disabled', 'disabled');
            }
            else if (result == 0) {
                $("#show_email_box").html('<?=$view_free_email?>');
                $("#show_email_box").attr('style','color:green');
                $('#check_ajax_email').val(1);
                if ($('#check_ajax_email').val() == 1 &&  $('#check_ajax_user').val() == 1)
                    $('#submit_page').removeAttr('disabled');
            }
        }
    });
});


</script>

<style>
.has-success .form-control {
    border-color: #3c763d !important; 
}
</style>	
                			
       
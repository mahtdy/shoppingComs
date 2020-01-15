$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});

$(".send_pm").click(function () {
	$("#send_member_pm").val($(this).attr('id'));
});

$(".send_email").click(function () {
	$("#send_member_email").val($(this).attr('id'));
});

$(".send_sms").click(function () {
	$("#send_member_sms").val($(this).attr('id'));
});

$(".reset_password").click(function () {
	$("#reset_user").val($(this).attr('id'));
	$("#btn_reset_pass").val($(this).attr('id'));
	
});

		$(".login_user_manager").click(function () {
			 $.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=login_user_manager&id="+$(this).attr('value'), 
				success: function(result){
					window.location.href = result;
					 
				}
			});		
		});		
		



	$("#btn_reset_pass").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=reset_manager_passeord&id="+$(this).val()+"&value="+$("#reset_pass").val(),
				success: function(result){
					$("#show_msg").css({ 'display': "block" });	
					$("#reset_pass").val('');
					if(result==1)
						alert('کلمه عبور تغییر یافت');
				}
			});	
		
		});

	$("#send_member_pm").click(function (e) {
		e.preventDefault();
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=send_pm_manager&id="+$(this).val()+"&value="+$("#pm").val(),
				success: function(result){
					$("#pm").val('');
					 $("#show_msg_manager").html(result);
				}
			});		
		});
		
		$("#mobile").keyup(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_manager_moblie&id="+$(this).val()+"&value="+$("#edit_mode").val(),
				success: function(result){
					if(result>0){
						$("#ajax_mobile").val(0);
						$("#check_mobile").html('تلفن همراه تکراری می باشد');
						$("#check_mobile").css('color', 'red');
						$('#submit_page').attr('disabled','disabled');
						$('#up_submit').attr('disabled','disabled');
					}
						else if(result==0){
							$("#ajax_mobile").val(1);
							$("#check_mobile").html('تلفن همراه آزاد می باشد');
							$("#check_mobile").css('color', 'green');
							if($("#ajax_mobile").val()==1&&$("#ajax_email").val()==1&&$("#ajax_name").val()==1){
								$('#up_submit').removeAttr('disabled');
								$('#submit_page').removeAttr('disabled');
								$('#up_submit').removeClass('disabled');
								$('#submit_page').removeClass('disabled');
							}
					}
				}
			});		
		});	

	
		$("#email").keyup(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_manager_email&id="+$(this).val()+"&value="+$("#edit_mode").val(),
				success: function(result){
					if(result>0){
						$("#check_email").html('ایمیل تکراری می باشد');
						$("#check_email").css('color', 'red');
						$("#ajax_email").val(0);
						$('#submit_page').attr('disabled','disabled');
						$('#up_submit').attr('disabled','disabled');
					}
						else if(result==0){
							$("#check_email").html('ایمیل آزاد می باشد');
							$("#check_email").css('color', 'green');
							$("#ajax_email").val(1);
							if($("#ajax_mobile").val()==1&&$("#ajax_email").val()==1&&$("#ajax_name").val()==1){
								$('#up_submit').removeAttr('disabled');
								$('#submit_page').removeAttr('disabled');
								$('#up_submit').removeClass('disabled');
								$('#submit_page').removeClass('disabled');
							}
					}
				}
			});		
		});	
	
		$("#user_name").keyup(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_manager_username&id="+$(this).val()+"&value="+$("#edit_mode").val(),
				success: function(result){
					if(result>0){
						$("#check_username").html(' نام کاربری تکراری می باشد');
						$("#check_username").css('color', 'red');
						$('#submit_page').attr('disabled','disabled');
						$('#up_submit').attr('disabled','disabled');
						$("#ajax_name").val(0);
					}
						else if(result==0){
							$("#check_username").html('نام کاربری آزاد می باشد');
							$("#check_username").css('color', 'green');
							$("#ajax_name").val(1);
							if($("#ajax_mobile").val()==1&&$("#ajax_email").val()==1&&$("#ajax_name").val()==1){
								$('#up_submit').removeAttr('disabled');
								$('#submit_page').removeAttr('disabled');
								$('#up_submit').removeClass('disabled');
								$('#submit_page').removeClass('disabled');
							}
					}
				}
			});		
		});	
	
	
	$("#send_member_email").click(function (e) {
		e.preventDefault();
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=send_email_member&id="+$(this).val()+"&email_val="+tinyMCE.activeEditor.getContent(),
				success: function(result){
					$("#email").val('');
				    $("#show_msg_manager").html(result);
				}
			});		
		});
		
		$("#send_member_sms").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=send_sms_member&id="+$(this).val()+"&value="+$("#sms").val(),
				success: function(result){
					$("#show_msg_manager").html(result);
				 
				}
			});		
		});	
		
$(function () {	
	$('.conchkNumber_4').click( function() {
		if($(this).prop('checked'))
		var a=1;
		else
		a=0;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=disable_manager&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				 
				}
			});
    });
});
		
		
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_manager&id="+$(this).val(),
				success: function(result){
				//alert(result);
				if(result==1)
				alert('این مدیر دارای زیر شاخه می باشد');
				if(result==0)
				alert('این عملیات غیر مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_manager";
				}
			});		
		});
	$(".recover_menu").click(function () {
		$("#recover_btn_ok").val($(this).attr('id'));
	});		
		$("#recover_btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=recover_manager&id="+$(this).val(),
				success: function(result){
				 //alert(result);
				if(result==0)
				alert('این عملیات غیر مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_manager";
				}
			});		
		});	
		$("#group_id").change(function () {
			if($(this).val()!=1){
				$("#show_lang").show();
				$("#show_sites").show();
				
			}else{
				$("#show_lang").hide();
				$("#show_sites").hide();
			}
		});	
		
			$("#add_manager").click(function () {
				$('#user_name').prop('readonly', false);
				$("#edit_mode").val(0);
					$("#edit_manager_id").val(0);
					$("#name").val('');
					$("#user_name").val('');
					$('#manage_lang').select2('val',0);
					$("#email").val('');
					$("#group_id").val('');
					$("#expire_date").val('');				
			});
		$(".edit_menu").click(function () {
			
			$.ajax({
			
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_manager&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
					var b=result.split('^');
					$("#edit_mode").val(1);
					$("#edit_manager_id").val(b[9]);
					$("#name").val(b[0]);
					$("#user_name").val(b[1]);
					$('#user_name').prop('readonly', true);
					$("#email").val(b[2]);
					$("#group_id").val(b[3]);
					$("#expire_date").val(b[7]);
					$("#semat").val(b[11]);
					;
					$("#mobile").val(b[12]);
					$("#phone").val(b[13]);
					$("#phone_code").val(b[14]);
					$("#address").val(b[15]);
					$("#status").val(b[17]);
					 $("#avatar").val(b[16]);
					 
					if(b[16]=="")
					$("#aks_thumb").attr('src','new_avatar/no_avatar.jpg');
				else
					$("#aks_thumb").attr('src',b[16]);
					if (b[3]>1){
						$("#show_lang").show();
						$("#show_sites").show();
						$("#manage_site").val(b[8]);
						var c=b[8];
						var c=result.split('$');
						for (index = 1; index < c.length; ++index) {
							$('#manage_lang').select2('val', [c[index]]);
						}
						
					}	
					
					if(b[4]==1)
					$('#can_add').prop('checked', true);
					if(b[5]==1)
					$('#can_delete').prop('checked', true);
					if(b[6]==1)
					$('#can_edit').prop('checked', true);
					if(b[18]==1)
					$('#can_draft').prop('checked', true);
					
					$("#password").val('********');
					$('#id-input-file-2').attr("disabled", false);
					//$('#title').attr("disabled", true);

				}
			});	
});
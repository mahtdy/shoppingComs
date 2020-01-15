$(".del_menu").click(function () {
	$("#btn_ok").val($(this).attr('id'));
});

$(".del_all").click(function () {  
   $("#btn_ok").val($("#check_value").val());
  
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

$(function () {	

	$('.conchkSelectAll').click( function() {
		$('.conchkNumber').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
			return $(this).attr('id');
		}).get();
	 
		$("#check_value").val(values);
		
    });
	$('.conchkNumber').click( function() {
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
			return $(this).attr('id');
		}).get();
		$("#check_value").val(values);
	});
});	


	$("#btn_reset_pass").click(function () {  
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=reset_users_passeord&id="+$(this).val()+"&value="+$("#reset_pass").val(),
				success: function(result){
				///	alert(result);
					$("#show_msg").html(result);	
					$("#reset_pass").val('');
					//window.location.href = "newcoms.php?yep=new_member";
				}
			});	
		
		});



	$("#send_member_pm").click(function () {
 
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=send_pm_member&id="+$(this).val()+"&value="+$("#pm").val(),
				success: function(result){
					$("#pm").val('');
				 alert('پیام شما ارسال گردید');
					//window.location.href = "newcoms.php?yep=new_member";
				}
			});		
		});



	$("#send_member_email").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=send_email_member&id="+$(this).val()+"&email_val="+tinyMCE.activeEditor.getContent(),
				success: function(result){
					$("#email").val('');
					 $("#show_msg").html(result);
				}
			});		
		});
		
		
		$("#send_member_sms").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=send_sms_member&id="+$(this).val()+"&value="+$("#sms").val(),
				success: function(result){
					$("#show_msg").html(result);
					$("#sms").val('');
					 
				}
			});		
		});	
		
		$(".login_user_member").click(function () {
			 $.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=login_user_member&id="+$(this).attr('value'), 
				success: function(result){
					//alert(result);
					window.location.href = result;
					 
				}
			});		
		});		
		
		
		
	$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_member&id="+$(this).val(),
				success: function(result){
				//alert(result);
					window.location.href = "newcoms.php?yep=new_member";
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
				data:"action=disable_user&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
				}
			});
    });
});
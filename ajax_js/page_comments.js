﻿$(".del_menu").click(function () {
		$("#btn_ok_page").val($(this).attr('id'));
		
});	
$(".rep_comment").click(function () {
		$("#rep_comment_id").val($(this).attr('id'));
		
});	


$(".del_all").click(function () {
		$("#btn_ok_page").val($("#check_value").val());
});	

	$("#btn_ok_page").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_page_comments&id="+$(this).val(),
				success: function(result){
				//alert(result);
				if(result==0)
				alert('اين عمليات غير مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_page_comments";
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
				data:"action=change_page_status&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
				}
			});
    });
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
		
		
	$("#name").keyup(function () {
	
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_page_name&id="+$(this).val()+"&value="+$("#edit_mode").val(),
				success: function(result){
				//alert(result);
				if(result>0){
				
					$("#show_check_box").html('نام تکراري مي باشد');
					$("#show_check_box").css('color', 'red');
					$('#submit_page').attr('disabled','disabled');
				}
				else if(result==0){
				
					$("#show_check_box").html('نام آزاد مي باشد');
					$("#show_check_box").css('color', 'green');
					$('#submit_page').removeAttr('disabled');
				}
				}
			});	
		});	
		$(".show_sms").click(function () {
			
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_page_commant&id="+$(this).attr('id'),
				success: function(result){
				$('#show_sms_txt').html(result);
				}
			});						
			
		});
		
				$(".show_sms").click(function () {
			$('#show_sms_txt').html($(this).attr('id'));
			$('#reply_comment_id').val($(this).attr('data-id'));
		});

$(".del_menu").click(function () {
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
				data:"action=del_blog_comments&id="+$(this).val(),
				success: function(result){
				//alert(result);
				if(result==0)
				alert('اين عمليات غير مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_blog_comments";
				}
			});	
		});
		
		$(".show_sms").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_mudoal_comment&id="+$(this).attr('id'),
				success: function(result){
					$('#show_sms_txt').html(result);
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
				data:"action=change_blog_comment_status&value="+a+"&id="+$(this).attr('id'),
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
	
 
		$(".show_sms").click(function () {
			$('#show_sms_txt').html($(this).attr('id'));
			$('#reply_comment_id').val($(this).attr('data-id'));
		});
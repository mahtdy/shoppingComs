$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
});
$(".del_all").click(function () {
	
	$("#btn_ok").val($("#check_value").val());
});	
		$(".ace-switch-6").click(function () {
		var a=$(this).attr('id');
		var isChecked = $(this).prop('checked');
		
		if(isChecked)
		b=1;
		else
		b=0;
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_new_faq&value="+b+"&id="+a,
				success: function(result){
					//alert(result);
				}
			});
		});	
	
 
	$(function () {
		$('.conchkNumber').click( function() {
			if($('.conchkNumber:checked').length == $('.conchkNumber').length) {
				$('.conchkSelectAll').prop('checked', true);
			}
			else {
				$('.conchkSelectAll').prop('checked', false);
			}
		});
	});
		$('.conchkNumber').click( function() {
  
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
		 	return $(this).attr('id');
		}).get();
  
		$("#check_value").val(values);
	});
 
	
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_new_faq&id="+$(this).val(),
				success: function(result){
					window.location='newcoms.php?yep=new_faq'	
				}
			});
		});	
		
		
		$(".show_details").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_faq_details&id="+$(this).attr('id'),
				success: function(result){
					//alert(result);
					 $("#show_deatils").html(result);
					 
				}
			});
		});			
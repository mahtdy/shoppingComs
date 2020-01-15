$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});			
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_archive_sms&id="+$(this).val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_sendsms";
				}
			});	
		});
 
$(".show_item").click(function () {
	$("#show_details").html($(this).attr('id'));
});	

$(".del_all").click(function () {
	$("#btn_ok").val($("#check_value").val());
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
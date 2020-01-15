$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});			
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_countact_us&id="+$(this).val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_contact_us";
				}
			});	
		});
		$(".show_item").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_contact_us&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
				$("#show_details").html(result);
				}
			});	
		});
		$(document).ready(function(){
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_load_contact_us&id="+$('#lang_map').val()+"&value="+$('#site_map').val(),
				success: function(result){
					$("#address").val(result);
				}
			});	
		});	

		$("#lang_map").change(function(){
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_load_contact_us&id="+$('#lang_map').val()+"&value="+$('#site_map').val(),
				success: function(result){
					$("#address").val(result);
				}
			});	
		});	
		$("#site_map").change(function(){
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_load_contact_us&id="+$('#lang_map').val()+"&value="+$('#site_map').val(),
				success: function(result){
					$("#address").val(result);
				}
			});	
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
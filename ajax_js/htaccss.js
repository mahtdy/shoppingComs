$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
});	
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_htaccess&id="+$(this).val(),
				success: function(result){
				window.location.href = "newcoms.php?yep=new_htaccess";
				}
			});		
		});
	$('.conchkNumber_4').click( function() {
		if($(this).prop('checked'))
		var a=0;
		else
		a=1;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_lock_modual&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_htaccess";
				}
			});
    });
$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
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
				data:"action=edit_new_q_a&value="+b+"&id="+a,
				success: function(result){
			 
				}
			});
		});	
	
 
	
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_new_q_a&id="+$(this).val(),
				success: function(result){
					window.location='newcoms.php?yep=new_q_a'	
				}
			});
		});	
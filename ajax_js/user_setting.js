		$("#active_sms").click(function () {
		var a=$(this).attr('id');
		var isChecked = $(this).prop('checked');
		
		if(isChecked)
		b=1;
		else
		b=0;
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=active_sms_manager&value="+b+"&id="+a,
				success: function(result){
					//alert(result);
				
				}
			});
		});	
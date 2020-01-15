$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});			
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_groups&id="+$(this).val(),
				success: function(result){
				if(result==0)
				$("#show_msg").css({ 'display': "block" });	
				else
				window.location.href = "newcoms.php?yep=new_GroupNew";
				}
			});	
		});
		
		$(".show_users").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=show_users_groups&id="+$(this).attr('id'),
				success: function(result){
				$('#qaz').html(result);
				}
			});	
		});

		$("#name").keyup(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_group_access&id="+$(this).val()+"&value="+$("#edit_mode").val(),
				success: function(result){
					 
					if(result>0){
						$("#check_email").html('نام گروه تکراری می باشد');
						$("#check_email").css('color', 'red');
						$('#submit_page').attr('disabled','disabled');
						$('#up_submit').attr('disabled','disabled');
					}
						else if(result==0){
							$("#check_email").html('نام گروه آزاد می باشد');
							$("#check_email").css('color', 'green');
							$('#up_submit').removeAttr('disabled');
							$('#submit_page').removeAttr('disabled');
							$('#up_submit').removeClass('disabled');
							$('#submit_page').removeClass('disabled');
					}
				}
			});		
		});			
		
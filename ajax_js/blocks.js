$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});			
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_blocks&id="+$(this).val(),
				success: function(result){
				//alert(result);
				if(result==0)
				alert('اين عمليات غير مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_Components";
				}
			});	
		});
	$(".edit_menu").click(function () {
		$("#show_check_box").html('');
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_blocks&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
					var b=result.split('^');
					$("#title").val(b[1]);
					$("#edit_mode").val(1);
					$("#edit_subid").val(b[3]);
					$("#manage_lang").val(b[2]);
					$("#name").val(b[0]);
					tinymce.editors[0].setContent(b[4]);
					$('#title').prop('readonly', true);
					if(b[5]==1)
						$('#type').prop('checked', 'checked');
					
				}
			});	
	});	
	$("#add_item").click(function () {
			$("#name").val("");
			$("#title").val("");
			$("#title").val("");
			$("#type").val(1);
			$('#name').prop('readonly', false);
			
		});	
	$("#title").keyup(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_block_name&id="+$(this).val(),
				success: function(result){
				//alert(result);
				if(result>0){
				
					$("#show_check_box").html('نام تکراري مي باشد');
					$("#show_check_box").css('color', 'red');
					$('#submit').attr('disabled','disabled');
				}
				else if(result==0){
				
					$("#show_check_box").html('نام آزاد مي باشد');
					$("#show_check_box").css('color', 'green');
					$('#submit').removeAttr('disabled');
				}
				}
			});	
		});	
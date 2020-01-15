
	$("#title").keyup(function (e) {
		a=$(this).val();
	
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_lang&id="+a,
				success: function(result){
					if(result==1){
						
						$("#show_msgbox").css('color', 'red');
						$("#show_msgbox").html('زبان مورد نظر وجود دارد');
						$("#validation").val(0);
					}
					if(result==0){
						$("#show_msgbox").css('color', 'green');
						$("#show_msgbox").html('زبان مورد نظر آزاد می باشد');
				     	$("#validation").val(1);
			 		}
				}
			});		
	});
	$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});
	
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_lang&id="+$(this).val(),
				success: function(result){
				window.location.href = "newcoms.php?yep=new_Language";	
				}
			});	
		});	
			
		$(".edit_menu").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_lang&id="+$(this).attr('id'),
				success: function(result){
					var b=result.split('^');
					$("#name").val(b[0]);
					$("#title").val(b[1]);
					$("#edit_mode").val(1);
					$("#edit_id").val(b[2]);
					$("#align").val(b[3]);
					$("#status").val(b[4]);
					$('#id-input-file-2').attr("readonly", false);
					$('#title').attr("readonly", true);

				}
			});	
		});	
		
		$("#back_btn").click(function () {
			$("#name").val('');
			$("#title").val('');
			$('#title').attr("readonly", false);
			$("#edit_mode").val(0);
			$("#edit_id").val(0);
			$("#align").val(0);
			$('#id-input-file-2').attr("readonly", true);
		});	
		
		
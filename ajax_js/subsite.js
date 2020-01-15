$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});			
		$("#btn_ok").click(function () {
			if($("#del_domain_name").val()==''||$("#del_host_user").val()==''||$("#del_host_pass").val()==''||$("#del_host_ip").val()=='')
				alert('موارد خالی را پر نمایید');
			else{
			$("#show_waiting_video").show();
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_subsite&id="+$(this).val()+"&domain="+$("#del_domain_name").val()+"&user="+$("#del_host_user").val()+"&pass="+$("#del_host_pass").val()+"&ip="+$("#del_host_ip").val(),
				success: function(result){
					$("#show_waiting_video").hide();
				//alert(result);
				if(result==0)
				alert('این عملیات غیر مجاز است');
				else{
				alert('زیر سایت حذف گردید');
				window.location.href = "newcoms.php?yep=new_subsite";
				}
				}
			});	
			}
		});
		$("#name").keyup(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_subsite&id="+$(this).val(),
				success: function(result){
				//alert(result);
				if(result>0){
				
					$("#show_check_box").html('زیر سایت تکراری است');
					$("#show_check_box").css('color', 'red');
					$('#submit').attr('disabled','disabled');
				}
				else if(result==0){
				
					$("#show_check_box").html('زیر سایت در آزاد می باشد');
					$("#show_check_box").css('color', 'green');
					$('#submit').removeAttr('disabled');
				}
				}
			});	
		});
		$("#add_item").click(function () {
			$("#name").val("");
			$("#title").val("");
			$("#domain_name").val("");
			$("#status").val(1);
			$('#name').prop('readonly', false);
			
		});
		$(".edit_menu").click(function () {
		$("#show_check_box").html('');
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_subsite&id="+$(this).attr('id'),
				success: function(result){
					var b=result.split('^');
					$("#title").val(b[1]);
					$("#edit_mode").val(1);
					$("#domain_name").val(4);
					$("#edit_subid").val(b[3]);
					$("#status").val(b[2]);
					$("#name").val(b[0]);
					$('#name').prop('readonly', true);
				}
			});	
		});
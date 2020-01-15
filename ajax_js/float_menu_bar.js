	$(".edit_menu").click(function () {
		$('#show_open').prop('checked', false);
		$("#add_temp").hide();
		$("#add_temp1").hide();
		$("#add_temp2").hide();
		$("#add_temp3").hide();
		$("#add_temp4").hide();
		$("#add_temp5").hide();
		$("#add_temp6").hide();
		var a=$(this).attr('id');
		
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_new_menu&id="+a,
				success: function(result){
				 
					var b=result.split('^');
					$("#onvan").val(b[0]);
					$("#edit_mode").val('1');
					$("#menu_id").val(a);
					if(b[3]==1)
						$('#show_open').prop('checked', true);
					$("#type").val(b[1]);
					if(b[1]==2){
						$("#add_temp2").show();
						$("#link").val(b[2]);
					}
					else if(b[1]==1){
						$("#add_temp").show();
						$('#static_page').select2('val',[b[2]]);
					}
					else if(b[1]==3){
						$("#add_temp3").show();
						$('#daynamic').val( [b[4]]);
					}
						if(b[5]>"")
						$('#file_name_div').html( [b[5]]);
					else
						$('#file_name_div').empty();	
				}
			});		
	});
	$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
		$("#del_menu_btn").val($(this).attr('value'));
	});
	
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_new_menu&id="+$(this).val()+"&value="+$("#del_menu_btn").val(),
				success: function(result){
				 
				if(result==0){
					alert("ابتدا زیر  شاخه ها را پاک نمایید");
				}
				else
					window.location.href = "newcoms.php?yep=new_menus";	
					}
			});
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
				data:"action=edit_new_manebar&value="+b+"&id="+a,
				success: function(result){
				}
			});
		});	
			
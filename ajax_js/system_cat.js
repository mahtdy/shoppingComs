		
	$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});
	
		$(".ace-switch-6").click(function (e) {
		//	e.preventDefault() ;
		var a=$(this).attr('id');
		var isChecked = $(this).prop('checked');
		
		if(isChecked)
		b=1;
		else
		b=0;
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_new_site&value="+b+"&id="+a,
				success: function(result){
				
				
				}
			});
		});	
	$(document).on("click", ".edit_menu", function() {
		$('#status').prop('checked', false);
		var a=$(this).attr('id');
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_new_main_menu&id="+a,
				success: function(result){
					var b=result.split('^');
					$("#name").val(b[1]);
					$('#icon').data('icon', b[2]);
					$(".iconpicker").find('i').removeClass().addClass('fa '+b[2]);
					$(".iconpicker").find('input').val(b[2]);
					$("#file_name").val(b[3]);
					if(b[4]==1)
						$('#status').prop('checked', true);
					$("#edit_mode").val('1');
					$("#menu_id").val(a);
				}
			});		
	});
	
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_new_main_menu&id="+$(this).val(),
				success: function(result){
				//alert (result);
				if(result==0){
					alert("ابتدا زیر  شاخه ها را پاک نمایید");
				}
				else
					window.location.href = "newcoms.php?yep=new_system_cat";
					}
			});
		});	
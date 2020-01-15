$("#contraction").click(function () {
if ($('input#contraction').is(':checked')) {
	$("#constrac").show();
$("#onvan").val('');	
		}else {
		$("#constrac").hide();	
		$("#onvan").val('');	
	}
});
		$("#manage_lang").change(function () {
			if($("#project_billing_code_id").val()==1){
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=change_index_pagename&id="+$(this).val()+"&value="+$("#manage_site").val(),
					success: function(result){
						var b=result.split('^');
						$("#onvan").val(b[0]);
						if(b[1]==1){
								$("#contraction").prop('checked', true);
								$("#constrac").show();
								
						}	
						else{
							$("#contraction").prop('checked', false);
								$("#constrac").hide();
						}
					}
				});	
			}
		});
		

		
		
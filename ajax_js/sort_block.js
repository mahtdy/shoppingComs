$(".del_menu").click(function () {
		$("#btn_ok_sort").val($(this).attr('id'));
		$("#block_type_name").val($(this).attr('value'));
		
	});	

$("#left_blocks").click(function (){
		$("#page_location").val('l');
});	
$("#rigth_block").click(function (){
		$("#page_location").val('r');
});
$("#center_block").click(function (){
		$("#page_location").val('c');
});
	


	$("#add_item").click(function () {
			$("#name").val("");
			$("#title").val("");
			$("#title").val("");
			$("#type").val(1);
			$('#name').prop('readonly', false);
			
		});	
	$("#name").keyup(function () {
	
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_block_sort_name&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&secend_value="+$("#manage_la").val(),
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
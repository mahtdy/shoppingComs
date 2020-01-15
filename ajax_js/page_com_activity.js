
$(".del_menu").click(function () {
	//alert($(this).attr('id'));
		$("#btn_ok").val($(this).attr('id'));
	});
$(".del_all").click(function () {
	
	$("#btn_ok").val($("#check_value").val());
});

		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_com_activity&id="+$(this).val(),
				success: function(result){
					//alert(result);
				 	window.location.href = $("#cat_id").val();
				}
			});		
		});



$(document).ready(function(){
	$(".edit_menu").click(function () {
			var a=$(this).attr('id');
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=edit_page_com_activity&id="+a,
					success: function(result){
						$("#meta_keyword").tagsinput('removeAll');
						var b=result.split('^');

							$("#onvan").val(b[1]);
							var a=b[2].split(',');
							// alert(b);
							for(i=0;i<a.length;i++){
	
								 $("#meta_keyword").tagsinput('add', a[i]);
								
							}
							$("#meta_desciption").val(b[3]);
							$("#seo_title").val(b[4]);
							$("#edit_mode").val(b[0]);

					}
			
				});		
	});		

});
		$(".ace-switch-6").click(function (e) {
			
		e.preventDefault();
		var a=$(this).attr('id');
		var isChecked = $(this).prop('checked');
		//alert(a);
		if(isChecked)
		b=1;
		else
		b=0;
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=edit_com_activity_status&value="+b+"&id="+a,
				success: function(result){
					var temp=result.replace(' ','');
					var res = temp.split("#");
					for (i=0;i<res.length;i++){
						var str="#"+res[i]+"";
						
						if(b==1)
						 $(str).prop('checked', true);
						else if(b==0)
						 $(str).prop('checked', false);
					}
				}
			});
		});	
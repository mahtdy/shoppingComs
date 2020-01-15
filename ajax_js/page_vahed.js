
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
				url:'New_ajax_product.php',
				data:"action=del_vahed&id="+$(this).val(),
				success: function(result){
					// alert( $("#url_id").val());
				 	window.location.href = $("#url_id").val();
				 	// window.location.href = '8';
				}
			});		
		});



$(document).ready(function(){
	$(".edit_menu").click(function () {
			var a=$(this).attr('id');
			// alert(a);
				$.ajax({
					type:'POST',
					url:'New_ajax_product.php',
					data:"action=edit_page_vahed&id="+a,
					success: function(result){
						// $("#meta_keyword").tagsinput('removeAll');
						// alert(result);
						var b=result.split('^');

							$("#vahed").val(b[1]);
							// var a=b[2].split(',');
							// alert('b='+b);
							// for(var i=0;i<a.length;i++){
	
								 // $("#meta_keyword").tagsinput('add', a[i]);
								
							// }
							// $("#meta_desciption").val(b[3]);
							// $("#seo_title").val(b[4]);
							$("#edit_mode").val(b[0]);

					}
			
				});		
	});		

});
		$(".ace-switch-6").click(function (e) {
			
		// e.preventDefault();
		var a=$(this).attr('id');
		var isChecked = $(this).prop('checked');
		//alert(a);
		if(isChecked)
		b=1;
		else
		b=0;
			// $.ajax({
			// 	type:'POST',
			// 	url:'New_ajax_product.php',
			// 	data:"action=edit_vahed_status&value="+b+"&id="+a,
			// 	success: function(result){
			// 		var temp=result.replace(' ','');
			// 		var res = temp.split("#");
			// 		for (var i=0;i<res.length;i++){
			// 			var str="#"+res[i]+"";
			//
			// 			if(b==1)
			// 			 $(str).prop('checked', true);
			// 			else if(b==0)
			// 			 $(str).prop('checked', false);
			// 		}
			// 	}
			// });
            $.ajax({
                type:'POST',
                url:'New_ajax_product.php',
                data:"action=edit_vahed_status&value="+b+"&id="+a,
                success: function(result){
                    // var temp=result.replace(' ','');
                    // var res = temp.split("#");
                    // for (var i=0;i<res.length;i++){
                    //     var str="#"+res[i]+"";
                    //
                        if(b==1)
                            $(this).prop('checked', true);
                        else if(b==0)
                            $(this).prop('checked', false);
                    // }
                }
            });
		});	
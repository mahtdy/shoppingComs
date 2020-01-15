
$(".del_menu_cat_cat_0").click(function () {
	// alert('hi');
// console.log($(this).attr('id'));
		$("#btn_ok").val($(this).attr('id'));
	});
$(".del_all").click(function () {
	
	$("#btn_ok").val($("#check_value").val());
});

		$("#btn_ok").click(function () {
			// alert($(this).val());
			$.ajax({
				type:'POST',
				url:'New_ajax_product.php',
				data:"action=del_cat_cat_0&id="+$(this).val(),
				success: function(result){
					//alert(result);
					// alert($("#btn_ok").val());
				 	window.location.href = "newcoms.php?yep=new_product_cat_cat&catid=" + $("#catid_val").val() +"&catof=0";
				}
			});		
		});


$(".del_menu_cat_cat_1").click(function () {
	// alert('hi');
// console.log($(this).attr('id'));
		$("#btn_ok").val($(this).attr('id'));
	});
$(".del_all").click(function () {

	$("#btn_ok").val($("#check_value").val());
});

		$("#btn_ok").click(function () {
			// alert($(this).val());
			$.ajax({
				type:'POST',
				url:'New_ajax_product.php',
				data:"action=del_cat_cat_1&id="+$(this).val(),
				success: function(result){
					//alert(result);
					// alert($("#btn_ok").val());
				 	window.location.href = "newcoms.php?yep=new_product_cat_cat&catid=" + $("#catid_val").val() +"&catof=0";
				}
			});
		});



$(document).ready(function(){
	$(".edit_menu_cat_0").click(function () {
			var a=$(this).attr('id');
				$.ajax({
					type:'POST',
					url:'New_ajax_product.php',
					data:"action=edit_page_cat_cat_0&id="+a,
					success: function(result){
						$("#meta_keyword").tagsinput('removeAll');
						var b=result.split('^');
						// alert(b);

							$("#name_cat").val(b[1]);
							var a=b[2].split(',');
							// alert(a);
							for(i=0;i<a.length;i++){
	
								 $("#meta_keyword").tagsinput('add', a[i]);
								
							}
							$("#meta_desciption").val(b[3]);
							$("#seo_title").val(b[4]);
							$("#catid_val_edit").val(b[0]);

					}
			
				});		
	});		

});
// 		$(".ace-switch-6-cat-status").click(function (e) {
//
// 		e.preventDefault();
// 		var a=$(this).attr('id');
// 		var isChecked = $(this).prop('checked');
// 		//alert(a);
// 		if(isChecked)
// 		b=1;
// 		else
// 		b=0;
// 		// alert('a='+a+'b='+b);
// 			$.ajax({
// 				type:'POST',
// 				url:'New_ajax_product.php',
// 				data:"action=edit_cat_status&value="+b+"&id="+a,
// 				success: function(result){
// 					var temp=result.replace(' ','');
// 					var res = temp.split("#");
// 					for (i=0;i<res.length;i++){
// 						var str="#"+res[i]+"";
//
// 						if(b==1)
// 						 $(str).prop('checked', true);
// 						else if(b==0)
// 						 $(str).prop('checked', false);
// 					}
// 				}
// 			});
// 		});
		$(".ace-switch-6-cat-status_0").click(function (e) {

		e.preventDefault();
		var a=$(this).attr('id');
		var isChecked = $(this).prop('checked');
		// alert(a);
		if(isChecked)
		b=1;
		else
		b=0;
		// alert('a='+a+'b='+b);
			$.ajax({
				type:'POST',
				url:'New_ajax_product.php',
				data:"action=nes_tik_chk&value="+b+"&id="+a,
				success: function(result){
					// alert(b);
					// var temp=result.replace(' ','');
					// var res = temp.split("#");
					// for (i=0;i<res.length;i++){
					// 	var str="#"+res[i]+"";
                    //
						if(b==1)
						 $("#"+a).prop('checked', true);
						else if(b==0)
						 $("#"+a).prop('checked', false);
					// }
				}
			});
		});

		$(".ace-switch-6-cat-status_1").click(function (e) {

		e.preventDefault();
		var a=$(this).attr('id');
		var isChecked = $(this).prop('checked');
		// alert(a);
		if(isChecked)
		b=1;
		else
		b=0;
		// alert('a='+a+'b='+b);
			$.ajax({
				type:'POST',
				url:'New_ajax_product.php',
				data:"action=nes_tik_chk_1&value="+b+"&id="+a,
				success: function(result){
					// alert(b);
					// var temp=result.replace(' ','');
					// var res = temp.split("#");
					// for (i=0;i<res.length;i++){
					// 	var str="#"+res[i]+"";
                    //
						if(b==1)
						 $("#"+a).prop('checked', true);
						else if(b==0)
						 $("#"+a).prop('checked', false);
					// }
				}
			});
		});


// $('.select2-container').on(function () {





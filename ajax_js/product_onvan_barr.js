
$(".del_menu").click(function () {
	// alert($(this).attr('id'));
		$("#btn_ok").val($(this).attr('id'));
	});
$(".del_all").click(function () {

	$("#btn_ok").val($("#check_value").val());
});

		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax_product.php',
				data:"action=del_category&id="+$(this).val(),
				success: function(result){
					//alert(result);
				 	window.location.href ="newcoms.php?yep=new_product_cat_barrasi&catid="+ $("#catid_val").val()+"&barrof=3";
				}
			});
		});



$(document).ready(function(){
	$(".edit_menu").click(function () {
			var a=$(this).attr('id');
				$.ajax({
					type:'POST',
					url:'New_ajax_product.php',
					data:"action=edit_page_cat_onvan_barr&id="+a,
					success: function(result){
						// console.log(result);
						$('#name_cat').val(result);
						$('#catid_val_edit').val(a);


						// $("#meta_keyword").tagsinput('removeAll');
						// var b=result.split('^');
                        //
						// 	$("#onvan").val(b[1]);
						// 	var a=b[2].split(',');
						// 	// alert(b);
						// 	for(i=0;i<a.length;i++){
                        //
						// 		 $("#meta_keyword").tagsinput('add', a[i]);
						//
						// 	}
						// 	$("#meta_desciption").val(b[3]);
						// 	$("#seo_title").val(b[4]);
						// 	$("#edit_mode").val(b[0]);

					}
			
				});		
	});		

});
		$(".ace-switch-6").click(function () {

		// e.preventDefault();
		var a=$(this).attr('id');
		var isChecked = $(this).prop('checked');
		//alert(a);
		if(isChecked)
		var b=1;
		else
		var b=0;
		// alert('a='+a+'b='+b);
			$.ajax({
				type:'POST',
				url:'New_ajax_product.php',
				data:"action=edit_onvan_barr&value="+b+"&id="+a,
				success: function(result){
					// var temp=result.replace(' ','');
					// var res = temp.split("#");
					// for (i=0;i<res.length;i++){
					// 	var str="#"+res[i]+"";
                    //
					// 	if(b==1)
					// 	 $(str).prop('checked', true);
					// 	else if(b==0)
					// 	 $(str).prop('checked', false);
					// }
				}
			});
		});


// $('.select2-container').on(function () {





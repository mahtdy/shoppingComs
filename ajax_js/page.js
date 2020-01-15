$(".del_menu").click(function () {
		$("#btn_ok_page").val($(this).attr('id'));
		
});	
$(".del_all").click(function () {
//alert($("#check_value").val());
		$("#btn_ok_page").val($("#check_value").val());
});	
	
	$(".cut_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=cut_site_page&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
				//alert(result);
				if(result==0)
				alert('اين عمليات غير مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_Pages";
				}
			});	
		});	
	$(".copy_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=copy_site_page&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
				//alert(result);
				if(result==0)
				alert('اين عمليات غير مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_Pages";
				}
			});	
		});		
	$(".change_chideman").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_chideman&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
				//alert(result);
				if(result==0)
				alert('اين عمليات غير مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_Pages";
				}
			});	
		});	
	$("#btn_ok_page").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_page&id="+$(this).val(),
				success: function(result){
				//	alert(result);
					window.location.href = "newcoms.php?yep=new_Pages";
				}
			});	
		});

$(function () {	
	$('.conchkNumber_4').click( function() {
		if($(this).prop('checked'))
		var a=1;
		else
		a=0;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_lock_page&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
				}
			});
    });
});



	$(document).on('click', '.conchkSelectAll_form', function(event) {
		$('.conchkNumber_news_form').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_news_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#dropdelete").val(values);
    });
	$(document).on('click', '.conchkNumber_news_form', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_news_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#dropdelete").val(values);
	});	

	

	$(document).on('click', '.conchkSelectAll_news', function(event) {
		$('.conchkNumber_news').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_news').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
    });
	$(document).on('click', '.conchkNumber_news', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_news').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
	});		
	
$(function () {	
	$('.active_can_comment').click( function() {
	 
		if($(this).prop('checked'))
		var a=1;
		else
		a=0;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=active_can_comment&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				 //alert(result);
				}
			});
    });
});

$(function () {	

	$('.conchkSelectAll').click( function() {
		$('.conchkNumber').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
			return $(this).attr('id');
		}).get();
		$("#check_value").val(values);
    });
	$('.conchkNumber').click( function() {
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
			return $(this).attr('id');
		}).get();
		$("#check_value").val(values);
	});
});		
		
		
	$("#name").keyup(function () {
	
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=check_page_name&id="+$(this).val()+"&value="+$("#edit_mode").val(),
				success: function(result){
				//alert(result);
				if(result>0){
				
					$("#show_check_box").html('نام تکراري مي باشد');
					$("#show_check_box").css('color', 'red');
					$('#submit_page').attr('disabled','disabled');
				}
				else if(result==0){
				
					$("#show_check_box").html('نام آزاد مي باشد');
					$("#show_check_box").css('color', 'green');
					$('#submit_page').removeAttr('disabled');
				}
				}
			});	
		});	
		$("#manage_lang").change(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_catogory_tree&id="+$(this).val()+"&value=5",
				success: function(result){
				  $("#cat3").html(result);
				}
			});	
		});	
		$("#manage_lang").change(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				dataType: 'json',
				data:"action=change_catogory_select2&id="+$(this).val()+"&value=5",
				success: function(result){
					$("#meta_label").html('');
			 	 	 jQuery(result).each(function(i, item){
						$("#meta_label").append("<option value='"+item.id+"' >"+item.text+"</option>");
						$('#meta_label').trigger('change'); 
					})
				}
			});	
		});	
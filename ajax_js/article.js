﻿		$("#relate_btn").click(function () {
			  $("#show_waiting_search").show();
			$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=show_related_article&id="+$("#related_search").val(),
					success: function(result){
						$("#show_waiting_search").hide();
						$("#show_related").html(result);	
					}
				});		
		});

	$(".cut_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=cut_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){ 
					window.location.href = "newcoms.php?yep=new_article";
				}
			});	
		});	
	$(".copy_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=copy_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_article";
				}
			});	
		});			
		
 	
		$(document).on('click', '#btn_ok_news', function(event) {
			
			if($('.conchkNumber_news_related:checked').length) {
				$("#show_waiting_related").show();
				var chkId = '';
				$('.conchkNumber_news_related:checked').each(function() {
					chkId += $(this).val() + ",";
				});
				chkId =  chkId.slice(0,-1);
					$.ajax({
						type:'POST',
						url:'New_ajax.php',
						data:"action=show_related_article_show&id="+chkId,
						success: function(result){
							$("#show_waiting_related").hide();
							$("#relatednews").html(result);	
						}
					});	
                   }
                else {
                alert('موردي انتخاب نشده است');
                }
            });		
	
//مقاله
$(document).on('click', '.del_ajax_article', function(event) {
		$("#btn_del_ajax_article").val($(this).attr('id'));
});
	$(document).on('click', '#btn_del_ajax_article', function() {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_ajax_article&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&field_nmae="+$("#totla_article").val(),
				success: function(result){
					var b=result.split('~~');
					$("#add_articles").html(b[0]);
					var a=$("#totla_article").val();
					var   key =a.split(',');
					$("#articles_list").empty();
					if(key[0]>""){
						for (i=0;i<key.length;i++){
							$("#articles_list").append("<option value='"+key[i]+"' selected='selected'>"+key[i]+"</option>");
						}
					}
					$("#btn_del_ajax_article").val('');
				}
			});	
		});	
		
	$(document).on('click', '.conchkSelectAll_article', function(event) {
		$('.conchkNumber_article').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_article').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
    });
	$(document).on('click', '.conchkNumber_article', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_article').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
	});		
		
//اخبار مرتبط	
$(document).on('click', '.del_reated_news', function(event) {
		$("#btn_del_related_news").val($(this).attr('id'));
});

$(document).on('click', '#btn_del_related_news', function() {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_article_reated_news&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&field_nmae="+$("#totla_related").val(),
				success: function(result){
					$("#relatednews").html(result);	
					$("#btn_del_related_news").val('');
				}
			});	
		});	
	$(document).on('click', '.conchkSelectAll_news', function(event) {
		$('.conchkNumber_news').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_news').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_related_news").val(values);
    });
	$(document).on('click', '.conchkNumber_news', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_news').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_related_news").val(values);
	});	
	
	$(document).on('click', '.conchkSelectAll_news_related', function(event) {
		$('.conchkNumber_news_related').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_news_related').map(function () {
			return $(this).attr('id');
		}).get();
    });
	
 
 	$(document).on('click', '.conchkSelectAll', function(event) {
		$('.conchkNumber').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_ok_page").val(values);
		$("#check_value").val(values);
    });
	$(document).on('click', '.conchkNumber', function(event) {
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_ok_page").val(values);
		$("#check_value").val(values);
	});	
	$(".del_menu").click(function () {
		$("#btn_ok_page").val($(this).attr('id'));
	});
		$("#btn_ok_page").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_article&id="+$(this).val(),
				success: function(result){
				// alert(result);
					window.location.href = "newcoms.php?yep=new_article";
				}
			});		
		});	
		$("#manage_lang").change(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_catogory_tree&id="+$(this).val()+"&value=7",
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
				data:"action=change_catogory_select2&id="+$(this).val()+"&value=7",
				success: function(result){
					$("#meta_label").html('');
			 	 	 jQuery(result).each(function(i, item){
						$("#meta_label").append("<option value='"+item.id+"' >"+item.text+"</option>");
						$('#meta_label').trigger('change'); 
						//console.log(item.id, item.text)
					})
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
				data:"action=change_lock_article&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
				}
			});
    });
});		
		
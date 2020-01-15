		$("#relate_btn").click(function () {
			  $("#show_waiting_search").show();
			$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=show_related_video&id="+$("#related_search").val(),
					success: function(result){
						$("#show_waiting_search").hide();
						$("#show_related").html(result);	
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
				data:"action=change_lock_video&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				}
			});
    });
});			
		
		
	$(".cut_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=cut_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){ 
					window.location.href = "newcoms.php?yep=new_video";
				}
			});	
		});	
	$(".copy_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=copy_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_video";
				}
			});	
		});	
		
		$("#add_videos").click(function () {
		 
			if($("#video_video").val()){
				$("#show_waiting_video").show();
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=show_videos&id="+$("#video_video").val(),
					success: function(result){
						$("#show_waiting_video").hide();
						$("#show_video").html(result);	
					}
				});	
			}				
		});	

		$("#del_videos").click(function () {
			if($("#video_video").val()){
				$("#show_waiting_video").show();
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=del_video_videos&id="+$("#video_video").val()+"&value="+$("#edit_mode").val(),
					success: function(result){
						$("#show_waiting_video").hide();
						$("#show_video").empty();	
						$("#video_pic").val('');	
						$("#video_video").val('');	
					}
				});	
			}				
		});		
		
	$(function () {	
	$('.can_comment').click( function() {
		if($(this).prop('checked'))
		var a=1;
		else
		a=0;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=can_comment_video&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				  //alert(result);
				}
			});
    });
});	
		
 

		$(document).on('click', '#show_video_modual', function() {
			if($("#video_video").val()){
				$("#show_add_video_modual").attr('src',$("#video_video").val());
				$("#example_video_1 video")[0].load();
			}				
		});
 
		$(document).on('click', '.show_video_modual', function() {
		 
				$("#show_add_video_modual").attr('src',$(this).attr('id'));
				$("#example_video_1 video")[0].load();
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
						data:"action=show_related_video_show&id="+chkId+"&secend_value="+$("#totla_related").val(),
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
				data:"action=del_ajax_videos&id="+$("#btn_del_ajax_article").val()+"&value="+$("#edit_mode").val()+"&field_nmae="+$("#totla_related").val(),
				success: function(result){
		 			$("#relatednews").html(result);
					var a=$("#totla_related").val();
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
				data:"action=del_video_reated_news&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&field_nmae="+$("#totla_related").val(),
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
		$("#check_value").val(values);
		$("#btn_ok_page").val(values);
    });
	$(document).on('click', '.conchkNumber', function(event) {
		var values = $('input:checkbox:checked.conchkNumber').map(function () {
			return $(this).attr('id');
		}).get();
		$("#check_value").val(values);
		$("#btn_ok_page").val(values);
	});	
	$(".del_menu").click(function () {
		$("#btn_ok_page").val($(this).attr('id'));
	});
	
 
		$("#btn_ok_page").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_video&id="+$(this).val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_video";
				}
			});		
		});	
 
	
		$("#manage_lang").change(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_catogory_tree&id="+$(this).val()+"&value=8",
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
				data:"action=change_catogory_select2&id="+$(this).val()+"&value=8",
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
	/*	
$(function () {	
	$('.conchkNumber_4').click( function() {
		if($(this).prop('checked'))
		var a=0;
		else
		a=1;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_lock_video&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
				}
			});
    });
});	*/	
		
/*    گالری   */
 	$("#add_videos").click(function () {
		 if($("#news_video").val()){
			 $("#show_waiting_video").show();
			 $.ajax({
			 type:'POST',
			 url:'New_ajax.php',
			 data:"action=show_news_videos&id="+$("#news_video").val(),
				 success: function(result){
					 $("#show_waiting_video").hide();
					 $("#show_video").html(result);	
				 }
			});	
		}				 
	});	
	
	//   واتر مارک
		$("#watermark_check").click(function () {
			$("#watermark_check_pic").show();
			if ($('#watermark_check').is(':checked'))
				var a=1;
			else
				var a=0;
			 $.ajax({
				 type:'POST',
				 url:'New_ajax.php',
				 data:"action=rename_water_mark&id="+a,
				 success: function(result){
					$("#watermark_check_pic").hide();
				}
			});
		});	 
	
 	$(".show_news_gallery").click(function () {
			 $.ajax({
			 type:'POST',
			 url:'New_ajax.php',
			 data:"action=show_news_gallery&id="+$(this).attr('id'),
				 success: function(result){
					 $("#show_news_gallery_ajax").html(result);	
				 }
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

	
$(function () {	
	$('.conchkNumber_4').click( function() {
		if($(this).prop('checked'))
		var a=1;
		else
		a=0;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_lock_news&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				}
			});
    });
});	
	
	
		$(document).on('click', '.show_video_modual', function() {
				$("#example_video_1").show();
				$("#example_voice_1").hide();
				$("#show_add_video_modual").attr('src',$(this).attr('id'));
				$("#example_video_1 video")[0].load();
		});	
		$(document).on('click', '.show_voice_modual', function() {
				$("#example_video_1").hide();
				$("#example_voice_1").show();
				$("#show_voice_modual").attr('src',$(this).attr('id'));
				$("#example_voice_1 voice")[0].load();
		});
	
	 $("#del_videos").click(function () {
		 if($("#news_video").val()){
			 $("#show_waiting_video").show();
				 $.ajax({
					 type:'POST',
					 url:'New_ajax.php',
					 data:"action=del_nwes_videos&id="+$("#news_video").val()+"&value="+$("#edit_mode").val(),
					 	success: function(result){
							$("#show_waiting_video").hide();
							$("#show_video").empty();	
							$("#news_video").val('');	
						}
				});	
		}				
	});	
	
	
	 $("#del_sound").click(function () {
		 if($("#news_sound").val()){
			 $("#show_waiting_sound").show();
				 $.ajax({
					 type:'POST',
					 url:'New_ajax.php',
					 data:"action=del_nwes_sound&id="+$("#news_sound").val()+"&value="+$("#edit_mode").val(),
					 	success: function(result){
							$("#show_waiting_sound").hide();
							$("#show_sound").empty();	
							$("#news_sound").val('');	
						}
				});	
		}				
	});	
	$("#add__news_sound").click(function () {
				$("#show_waiting_sound").show();
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=show_news_sound&id="+$("#news_sound").val()+"&secend_value=<?=$edit_id?>",
					success: function(result){
						$("#show_waiting_sound").hide();
						$("#show_sound").html(result);	
					}
				});	
	 			 
	});
	
	$(document).on('click', '#show_video_modual', function() {
		if($("#news_video").val()){
			$("#show_add_video_modual").attr('src',$("#news_video").val());
			$("#example_video_1 video")[0].load();
		}				
	});

$(".del_menu").click(function () {
		$("#btn_ok").val($(this).attr('id'));
	});
$(".del_all").click(function () {
	//alert($("#check_value").val()); 
	$("#btn_ok").val($("#check_value").val());
});
		$("#btn_ok").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_news&id="+$(this).val(),
				success: function(result){
				// alert(result);
					window.location.href = "newcoms.php?yep=new_newstext";
				}
			});		
		});
	$(".cut_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=cut_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_newstext";
				}
			});	
		});	
	$(".copy_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=copy_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_newstext";
				}
			});	
		});	

	$("#btn_ok_page").click(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_news&id="+$(this).val(),
				success: function(result){
				//alert(result);
				if(result==0)
				alert('اين عمليات غير مجاز است');
				else
				window.location.href = "newcoms.php?yep=new_newstext";
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
				window.location.href = "newcoms.php?yep=new_newstext";
				}
			});	
		});	
 
	$(document).on('click', '.conchkSelectAll', function() {
	//$('.conchkSelectAll').click( function() {
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



$(document).on('click', '.del_reated_news', function(event) {
		$("#btn_del_related_news").val($(this).attr('id'));
});

$(document).on('click', '#btn_del_related_news', function() {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_news_reated_news&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&field_nmae="+$("#totla_related").val(),
				success: function(result){
					$("#relatednews").html(result);	
					$("#btn_del_related_news").val('');
				}
			});	
		});	


	$(document).on('click', '.conchkSelectAll_form', function(event) {
		$('.conchkNumber_news_form').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_news_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
    });
	$(document).on('click', '.conchkNumber_news_form', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_news_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
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

		$(document).on('click', '#btn_ok_news00', function(event) {
			if($('.conchkNumber_news:checked').length) {
				$("#show_waiting_related").show();
				var chkId = '';
				$('.conchkNumber_news:checked').each(function() {
					chkId += $(this).val() + ",";
				});
				chkId =  chkId.slice(0,-1);
					$.ajax({
						type:'POST',
						url:'New_ajax.php',
						data:"action=show_related_news_show&id="+chkId,
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




		$("#manage_lang").change(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_catogory_tree&id="+$(this).val()+"&value=1",
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
				data:"action=change_catogory_select2&id="+$(this).val()+"&value=1",
				success: function(result){
					$("#meta_label").html('');
			 	 	 jQuery(result).each(function(i, item){
						$("#meta_label").append("<option value='"+item.id+"' >"+item.text+"</option>");
						$('#meta_label').trigger('change'); 
					})
				}
			});	
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
				data:"action=can_comment_news&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				 //alert(result);
				}
			});
    });
});		
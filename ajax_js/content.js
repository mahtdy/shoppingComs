/*    گالری   */
 	$("#add_videos").click(function () {
		 if($("#content_video").val()){
			 $("#show_waiting_video").show();
			 $.ajax({
			 type:'POST',
			 url:'New_ajax.php',
			 data:"action=show_content_videos&id="+$("#content_video").val(),
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
	
 	$(".show_content_gallery").click(function () {
			 $.ajax({
			 type:'POST',
			 url:'New_ajax.php',
			 data:"action=show_content_gallery&id="+$(this).attr('id'),
				 success: function(result){
					 $("#show_content_gallery_ajax").html(result);	
				 }
			});	
	});	
		$(document).on('click', '.conchkSelectAll_form', function(event) {
		$('.conchkNumber_content_form').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_content_form').map(function () {
			return $(this).attr('id');
		}).get();
		 
		$("#dropdelete").val(values);
    });
	$(document).on('click', '.conchkNumber_content_form', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_content_form').map(function () {
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
				data:"action=change_lock_content&value="+a+"&id="+$(this).attr('id'),
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
		 if($("#content_video").val()){
			 $("#show_waiting_video").show();
				 $.ajax({
					 type:'POST',
					 url:'New_ajax.php',
					 data:"action=del_content_videos&id="+$("#content_video").val()+"&value="+$("#edit_mode").val(),
					 	success: function(result){
							$("#show_waiting_video").hide();
							$("#show_video").empty();	
							$("#content_video").val('');	
						}
				});	
		}				
	});	
	
	
	 $("#del_sound").click(function () {
		 if($("#content_sound").val()){
			 $("#show_waiting_sound").show();
				 $.ajax({
					 type:'POST',
					 url:'New_ajax.php',
					 data:"action=del_content_sound&id="+$("#content_sound").val()+"&value="+$("#edit_mode").val(),
					 	success: function(result){
							$("#show_waiting_sound").hide();
							$("#show_sound").empty();	
							$("#content_sound").val('');	
						}
				});	
		}				
	});	
	$("#add__content_sound").click(function () {
				$("#show_waiting_sound").show();
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=show_content_sound&id="+$("#content_sound").val()+"&secend_value=<?=$edit_id?>",
					success: function(result){
						$("#show_waiting_sound").hide();
						$("#show_sound").html(result);	
					}
				});	
	 			 
	});
	
	$(document).on('click', '#show_video_modual', function() {
		if($("#content_video").val()){
			$("#show_add_video_modual").attr('src',$("#content_video").val());
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
				data:"action=del_content&id="+$(this).val(),
				success: function(result){
				// alert(result);
					window.location.href = "newcoms.php?yep=new_content_text";
				}
			});		
		});
	$(".cut_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=cut_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_content_text";
				}
			});	
		});	
	$(".copy_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=copy_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_content_text";
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



$(document).on('click', '.del_reated_new_content_text', function(event) {
		$("#btn_del_related_new_content_text").val($(this).attr('id'));
});

$(document).on('click', '#btn_del_related_new_content_text', function() {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_content_reated_content&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&field_nmae="+$("#totla_related").val(),
				success: function(result){
					$("#relatednew_content_text").html(result);	
					$("#btn_del_related_new_content_text").val('');
				}
			});	
		});	


	$(document).on('click', '.conchkSelectAll_form', function(event) {
		$('.conchkNumber_content_form').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_content_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
    });
	$(document).on('click', '.conchkNumber_content_form', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_content_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
	});	


	$(document).on('click', '.conchkSelectAll_new_content_text', function(event) {
		$('.conchkNumber_content').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_content').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_ajax_article").val(values);
    });
	$(document).on('click', '.conchkNumber_content', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_content').map(function () {
			return $(this).val();
		}).get();
		$("#btn_del_ajax_article").val(values);
	});	

		$(document).on('click', '#btn_ok_content00', function(event){
			var values = $('input:checkbox:checked.conchkNumber_content').map(function () {
				return $(this).val();
			}).get();
			if($(values>"")) { 
				$("#show_waiting_related").show();
				var chkId = '';
				$('.conchkNumber_content:checked').each(function() {
					chkId += $(this).val() + ",";
				});
				chkId =  chkId.slice(0,-1);
		 			$.ajax({ 
						type:'POST',
						url:'New_ajax.php',
						data:"action=show_related_content_show&id="+values,
						success: function(result){
							$("#show_waiting_related").hide();
							$("#relatedcontent").html(result);	
						}
					});	
            }else {
			 alert('موردي انتخاب نشده است00000000');
			}
        });

function countElements(arr) {
    var numElements = 0;
    for ( var indx in arr ) {
        numElements ++;
    }
    return numElements;
}


		$("#manage_lang").change(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_catogory_tree&id="+$(this).val()+"&value=11",
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
				data:"action=change_catogory_select2&id="+$(this).val()+"&value=11",
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
	$('.can_comment').click( function() {
		if($(this).prop('checked'))
		var a=1;
		else
		a=0;
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=can_comment_content&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				 //alert(result);
				}
			});
    });
});		
// گالری های مرتبط
		$("#relate_btn").click(function () {
			  $("#show_waiting_search").show();
			$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=show_related_gallery&id="+$("#related_search").val(),
					success: function(result){
						$("#show_waiting_search").hide();
						$("#show_related").html(result);	
					}
				});		
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
// لود شدن سایت برای واتر مارک		
	$(document).ready(function(){
			 $.ajax({
				 type:'POST',
				 url:'New_ajax.php',
				 data:"action=rename_water_mark&id=0",
				 success: function(result){
				}
			});

	})	

 	$(".cut_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=cut_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){ 
					window.location.href = "newcoms.php?yep=new_gallery";
				}
			});	
		});	
	$(".copy_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=copy_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_gallery";
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
				data:"action=change_lock_gallery&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				//alert(result);
				}
			});
    });
});	
		
		
//// پاک کردن تصویر		
 	$(document).on("click", ".picture_delete", function() {
		 var a=$(this).parent().attr('id');
		 $(this).parent().remove();
		 $.ajax({
			 type:'POST',
			 url:'New_ajax.php',
			 data:"action=del_gallery_item&id="+a+"&value="+$("#edit_mode").val(),
			 success: function(result){
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
						data:"action=show_related_gallery_show&id="+chkId+"&secend_value="+$("#totla_related").val(),
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
$(document).on('click', '.del_ajax_gallery', function(event) {
		$("#btn_del_ajax_article").val($(this).attr('id'));
});
	$(document).on('click', '#btn_del_ajax_article', function() {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_ajax_gallery&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&field_nmae="+$("#totla_related").val(),
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
			$("#delete_gallery_page").show();
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_gallery&id="+$(this).val(),
				success: function(result){
				 
					window.location.href = "newcoms.php?yep=new_gallery";
				}
			});		
		});	
 
	 
		$("#manage_lang").change(function () {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=change_catogory_tree&id="+$(this).val()+"&value=9",
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
				data:"action=change_catogory_select2&id="+$(this).val()+"&value=9",
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
				data:"action=can_comment_gallery&value="+a+"&id="+$(this).attr('id'),
				success: function(result){
				 //alert(result);
				}
			});
    });
});			
		
 
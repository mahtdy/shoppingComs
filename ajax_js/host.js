/*    گالری   */
 	$("#add_videos").click(function () {
 		alert('ok');
 		var ss=$("#host_video").val();
		 if($("#host_video").val()){
		 	alert('ss='+ss);
			 $("#show_waiting_video").show();
			 $.ajax({
			 type:'POST',
			 url:'New_ajax_host.php',
			 data:"action=show_host_videos&id="+$("#host_video").val(),
				 success: function(result){
				alert(result);
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
		$('.conchkNumber_host_form').prop('checked', $(this).is(':checked'));
		var hosts = $('input:checkbox:checked.conchkNumber_host_form').map(function () {
			return $(this).attr('id');
		}).get();
		 
		$("#dropdelete").val(hosts);
    });
	$(document).on('click', '.conchkNumber_host_form', function(event) {
		var hosts = $('input:checkbox:checked.conchkNumber_host_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#dropdelete").val(hosts);
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
				data:"action=change_lock_host&host="+a+"&id="+$(this).attr('id'),
				success: function(result){
					alert();
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
		 if($("#host_video").val()){
			 $("#show_waiting_video").show();
				 $.ajax({
					 type:'POST',
					 url:'New_ajax_host.php',
					 data:"action=del_host_videos&id="+$("#host_video").val()+"&value="+$("#edit_mode").val(),
					 	success: function(result){
							$("#show_waiting_video").hide();
							$("#show_video").empty();	
							$("#host_video").val('');
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
		// alert($("#btn_ok").val());
	});
$(".del_all").click(function () {
	//alert($("#check_value").val());
	$("#btn_ok").val($("#check_value").val());
});
		$("#btn_ok").click(function () {
			id=$(this).val();
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_host&id="+id,
				success: function(result){
				// console.log(result);
					window.location.href = "newcoms.php?yep=new_host_text";
					// alert(result);
				}
			});		
		});
	$(".cut_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=cut_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){

					window.location.href = "newcoms.php?yep=new_host_text";
				}
			});	
		});	
	$(".copy_site").click(function () {
		$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=copy_site_module&id="+$(this).attr('id')+"&value="+$("#check_value").val(),
				success: function(result){
					window.location.href = "newcoms.php?yep=new_host_text";

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



$(document).on('click', '.del_reated_host', function(event) {
		$("#btn_del_related_host").val($(this).attr('id'));

});

$(document).on('click', '#btn_del_related_host', function() {
			$.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=del_host_reated_host&id="+$(this).val()+"&value="+$("#edit_mode").val()+"&field_nmae="+$("#totla_related").val(),
				success: function(result){
                    // alert(id);
					$("#relatedhost").html(result);

					$("#btn_del_related_host").val('');
				}
			});	
		});	


	$(document).on('click', '.conchkSelectAll_form', function(event) {
		$('.conchkNumber_host_form').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_host_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_related_host").val(values);
    });
	$(document).on('click', '.conchkNumber_host_form', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_host_form').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_related_host").val(values);
	});	


	$(document).on('click', '.conchkSelectAll_host', function(event) {
		$('.conchkNumber_host').prop('checked', $(this).is(':checked'));
		var values = $('input:checkbox:checked.conchkNumber_host').map(function () {
			return $(this).attr('id');
		}).get();
		$("#btn_del_related_host").val(values);
    });
	$(document).on('click', '.conchkNumber_host', function(event) {
		var values = $('input:checkbox:checked.conchkNumber_host').map(function () {
        return $(this).val();
		}).get();
		$("#btn_del_related_host").val(values);
	});

		$(document).on('click', '#btn_ok_host00', function(event){
			//var checkid=$(".conchkNumber_host_checked").val();
			var values = $('input:checkbox:checked.conchkNumber_host').map(function () {
				return $(this).val();
			}).get();

            // var values1 = $('input:checkbox:checked.conchkNumber_host1').map(function () {
            //     return $(this).val();
            // }).get();
			if($(values>"")) {
                $("#show_waiting_related").show();
                var chkId = $(".conchkNumber_host_checked").val();
               // alert('comjs='+chkId);
				$('.conchkNumber_host:checked').each(function() {
					// chkId += $(this).val() + ",";

                    var vval=$(this).val();
                    // alert('thisval'+vval);
                    var   chkIdArr=chkId.split(',');
                    chkIdArr = chkIdArr.filter(function(val){
                        return val !== vval;
                    });
                    chkId=chkIdArr.toString(',');
                    chkId += vval + ",";



                   });
				// chkId =  chkId.slice(0,-1);
				//alert('chkid dovom='+chkId);
				 // alert('chifdval='+values);
                $('.conchkNumber_host').not(':checked').each(function () {
                    var unche=$(this).val();
                    // alert('unche'+unche);
                  var  chkIdArr=chkId.split(',');
                    chkIdArr = chkIdArr.filter(function(val){
                        return val !== unche;
                    });
                    chkId=chkIdArr.toString(',');});
                // alert('chkid akhar='+chkId);
                values=chkId;
		 			$.ajax({
						type:'POST',
						url:'New_ajax_host.php',
						data:"action=show_related_host_show&id="+values+"&checkid="+chkId,
						success: function(result){
							$("#show_waiting_related").hide();
							// alert(values);
							$("#relatedhost").html(result);
						}
					});	
            }else {
			 alert('موردي انتخاب نشده است00000000');
			}
        });

//======== افزودن نمایندگی representation=================


$(document).on('click', '.conchkSelectAll_representation', function() {
    //$('.conchkSelectAll').click( function() {
    $('.conchkNumber_representation').prop('checked', $(this).is(':checked'));
    var values = $('input:checkbox:checked.conchkNumber_representation').map(function () {
        return $(this).attr('id');
    }).get();
    $("#check_value_representation").val(values);
});
$('.conchkNumber_representation').click( function() {

    var values = $('input:checkbox:checked.conchkNumber_representation').map(function () {
        return $(this).attr('id');
    }).get();

    $("#check_value_representation").val(values);
});



$(document).on('click', '.del_reated_host_representation', function(event) {
    $("#btn_del_related_host_representation").val($(this).attr('id'));

});

$(document).on('click', '#btn_del_related_host_representation', function() {
    // var rr=$(this).val();
    // var rr1=$("#edit_mode").val()
    // var rr2=$("#totla_related_brand").val();
    // alert('rr='+rr+'rr1='+rr1+'rr2='+rr2);
    $.ajax({
        type:'POST',
        url:'New_ajax_host.php',
        data:"action=del_host_reated_host_representation&id_brand="+$(this).val()+"&value_brand="+$("#edit_mode").val()+"&field_nmae_brand="+$("#totla_related_brand").val(),
        success: function(result){
        	$("#relatedhost_representation").html(result);
            $("#btn_del_related_host_representation").val('');
        }
    });
});


$(document).on('click', '.conchkSelectAll_representation_form', function(event) {
    $('.conchkNumber_host_representation_form').prop('checked', $(this).is(':checked'));
    var values = $('input:checkbox:checked.conchkNumber_host_representation_form').map(function () {
    	// alert('qwqw'+$(this).attr('id'));
        return $(this).attr('id');
    }).get();
    $("#btn_del_related_host").val(values);
});
$(document).on('click', '.conchkNumber_host_representation_form', function(event) {
    var values = $('input:checkbox:checked.conchkNumber_host_representation_form').map(function () {
        return $(this).attr('id');
    }).get();
    $("#btn_del_related_host_representation").val(values);
});


$(document).on('click', '.conchkSelectAll_host_representation', function(event) {
    $('.conchkNumber_host_representation').prop('checked', $(this).is(':checked'));
    var values = $('input:checkbox:checked.conchkNumber_host_representation').map(function () {
        return $(this).attr('id');
    }).get();
    $("#btn_del_related_host_representation").val(values);
});
$(document).on('click', '.conchkNumber_host_representation', function(event) {
    var values = $('input:checkbox:checked.conchkNumber_host_representation').map(function () {
        return $(this).val();
    }).get();
    $("#btn_del_related_host_representation").val(values);
});


$(document).on('click', '.conchkSelectAll_host_representation_form', function(event) {
    $('.conchkNumber_host_representation_form').prop('checked', $(this).is(':checked'));
    var hosts = $('input:checkbox:checked.conchkNumber_host_representation_form').map(function () {
        return $(this).attr('id');
    }).get();

    $("#dropdelete_representation").val(hosts);
});
$(document).on('click', '.conchkNumber_host_representation_form', function(event) {
    var hosts = $('input:checkbox:checked.conchkNumber_host_representation_form').map(function () {
        return $(this).attr('id');
    }).get();
    $("#dropdelete_representation").val(hosts);
});

$(document).on('click', '#btn_ok_host_representation00', function(event){
			var values = $('input:checkbox:checked.conchkNumber_host_representation').map(function () {
                return $(this).val();
				}).get();
			if($(values>"")) {
				$("#show_waiting_related").show();
				// alert('val=='+values);
				var chkId_brand = $(".conchkNumber_host_representation_checked").val();
				$('.conchkNumber_host_representation:checked').each(function() {
				   // chkId_brand += $(this).val() + ",";

                    var vval=$(this).val();
                    // alert('thisval'+vval);
                    var   chkIdArr_brand=chkId_brand.split(',');
                    chkIdArr_brand = chkIdArr_brand.filter(function(val){
                        return val !== vval;
                    });
                    chkId_brand=chkIdArr_brand.toString(',');
                    chkId_brand += vval + ",";

				});
               // chkId_brand =  chkId_brand.slice(0,-1);
                $('.conchkNumber_host_representation').not(':checked').each(function () {
                    // var unche='';
                  var  unche=$(this).val();
                    // alert('unche'+unche);
                  var  chkIdArr_brand=chkId_brand.split(',');
                    chkIdArr_brand = chkIdArr_brand.filter(function(val){
                        return val !== unche;
                    });
                    chkId_brand=chkIdArr_brand.toString(',');});
               // alert('chkid akhar='+chkId_brand);
                values=chkId_brand;
		 			$.ajax({
						type:'POST',
						url:'New_ajax_host.php',
						data:"action=show_related_host_representation_show&id_brand="+values+"&checkid_brand="+chkId_brand,
						success: function(result){
							$("#show_waiting_related").hide();
							$("#relatedhost_representation").html(result);
						}
					});
            }else {
			 alert('موردي انتخاب نشده است00000000');
			}
        });


//=============پایان افزودن نمایندگی representation===============


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
				data:"action=change_catogory_tree&id="+$(this).val()+"&value=19",
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
				data:"action=change_catogory_select2&id="+$(this).val()+"&value=19",
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
		id=$(this).attr('id');
		if($(this).prop('checked'))
		var a=1;
		else
		a=0;

        $.ajax({
				type:'POST',
				url:'New_ajax.php',
				data:"action=can_comment_host&value="+a+"&id="+id,
				success: function(result){
				 // alert(id);
				 // alert(a);
				}
			});
    });
});		
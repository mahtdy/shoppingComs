$(function () {
    $('.conchkNumber_4').click(function () {
        if ($(this).prop('checked'))
            var a = 1;
        else
            a = 0;
        $.ajax({
            type: 'POST',
            url: 'New_ajax_product.php',
            data: "action=change_lock_product&value=" + a + "&id=" + $(this).attr('id'),
            success: function (result) {
            }
        });
    });
});


$(".del_menu").click(function () {
    $("#btn_ok").val($(this).attr('id'));
});
$(".del_all").click(function () {
    $("#btn_ok").val($("#check_value").val());
});
$("#btn_ok").click(function () {
    // alert($(this).val());
    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=del_product_mojodi&id=" + $(this).val(),
        success: function (result) {
            // alert(result);
            window.location.href = "newcoms.php?yep=new_product_mojodi";
        }
    });
});
$(".cut_site").click(function () {
    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=cut_site_module&id=" + $(this).attr('id') + "&value=" + $("#check_value").val(),
        success: function (result) {
            window.location.href = "newcoms.php?yep=new_newstext";
        }
    });
});
$(".copy_site").click(function () {
    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=copy_site_module&id=" + $(this).attr('id') + "&value=" + $("#check_value").val(),
        success: function (result) {
            window.location.href = "newcoms.php?yep=new_newstext";
        }
    });
});

$("#btn_ok_page").click(function () {
    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=del_product&id=" + $(this).val(),
        success: function (result) {
            //alert(result);
            if (result == 0)
                alert('اين عمليات غير مجاز است');
            else
                window.location.href = "newcoms.php?yep=new_product";
        }
    });
});

// / #############################
// 	$('#btn_save_item_mojod').click(function () {
// 		// alert('salam');
//})
//


// var ttt=  $(this).attr('data-massod');

$(".save_menu").on('click', function () {
    // $('#btn_save_item_mojod').val($(this).attr('id'));
    var id=$(this).attr('id');
    var t=$(this).data('t');
    // alert(ttt);
    var pricepro=$('#price_pro'+t).val();
    var maxsabad=$('#max_sabad'+t).val();
    // alert(pricepro+'='+maxsabad);
    var arr_val = '';
    arr_val = $(this).data('mahdi_chips');
    // alert(arr_val);
    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=save_product_mojodi&id=" + $(this).attr('id') + "&value=" + arr_val+"&price="+pricepro+"&name_barr="+maxsabad,
        success: function (result) {
            $('.save'+t).removeClass('orange').fadeOut(300);
            $('.save'+t).addClass('green').fadeIn(400);
            // alert(result);
            // if(result==0)
            //alert('اين عمليات غير مجاز است');
            // else
            //window.location.href = "newcoms.php?yep=new_product";
        }
    });
});

$(".can_comment1").click(function (e) {

    e.preventDefault();

    var a=$(this).attr('id');
    alert(a);
    var isChecked = $(this).prop('checked');
    if(isChecked)
        b=1;
    else
        b=0;
    // alert('a='+a+'b='+b);
    $.ajax({
        type:'POST',
        url:'New_ajax_product.php',
        data:"action=edit_mojodi_status&value="+b+"&id="+a,
        success: function(result){
            var temp=result.replace(' ','');
            var res = temp.split("#");
            for (var i=0;i<res.length;i++){
                var str="#"+res[i]+"";

                if(b==1)
                    $(str).prop('checked', true);
                else if(b==0)
                    $(str).prop('checked', false);
            }
        }
    });
});



// #####################################

$(function () {
    $(document).on('click', '.conchkSelectAll', function () {
        //$('.conchkSelectAll').click( function() {
        $('.conchkNumber').prop('checked', $(this).is(':checked'));
        var values = $('input:checkbox:checked.conchkNumber').map(function () {
            return $(this).attr('id');
        }).get();
        $("#check_value").val(values);
    });
    $('.conchkNumber').click(function () {
        var values = $('input:checkbox:checked.conchkNumber').map(function () {
            return $(this).attr('id');
        }).get();
        $("#check_value").val(values);
    });
});

$(document).on('click', '.del_reated_news', function (event) {
    $("#btn_del_related_news").val($(this).attr('id'));
});

$(document).on('click', '#btn_del_related_news', function () {
    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=del_product_reated_news&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&field_nmae=" + $("#totla_related").val(),
        success: function (result) {
            $("#relatednews").html(result);
            $("#btn_del_related_news").val('');
        }
    });
});


$(document).on('click', '.conchkSelectAll_form', function (event) {
    $('.conchkNumber_news_form').prop('checked', $(this).is(':checked'));
    var values = $('input:checkbox:checked.conchkNumber_news_form').map(function () {
        return $(this).attr('id');
    }).get();
    $("#btn_del_ajax_article").val(values);
});
$(document).on('click', '.conchkNumber_news_form', function (event) {
    var values = $('input:checkbox:checked.conchkNumber_news_form').map(function () {
        return $(this).attr('id');
    }).get();
    $("#btn_del_ajax_article").val(values);
});


$(document).on('click', '.conchkSelectAll_news', function (event) {
    $('.conchkNumber_news').prop('checked', $(this).is(':checked'));
    var values = $('input:checkbox:checked.conchkNumber_news').map(function () {
        return $(this).attr('id');
    }).get();
    $("#btn_del_ajax_article").val(values);
});
$(document).on('click', '.conchkNumber_news', function (event) {
    var values = $('input:checkbox:checked.conchkNumber_news').map(function () {
        return $(this).attr('id');
    }).get();
    $("#btn_del_ajax_article").val(values);
});

$(document).on('click', '#btn_ok_news00', function (event) {
    if ($('.conchkNumber_news:checked').length) {
        $("#show_waiting_related").show();
        var chkId = '';
        $('.conchkNumber_news:checked').each(function () {
            chkId += $(this).val() + ",";
        });
        chkId = chkId.slice(0, -1);
        $.ajax({
            type: 'POST',
            url: 'New_ajax_product.php',
            data: "action=show_related_product_show&id=" + chkId,
            success: function (result) {
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
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=change_catogory_tree&id=" + $(this).val() + "&value=1",
        success: function (result) {
            var str = result.split('~~~');
            $("#cat3").html(str[0]);
            $("#seo_ajax").html(str[1]);
        }
    });
});
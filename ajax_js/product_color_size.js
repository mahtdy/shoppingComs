$(".del_menu_color").click(function () {
    // alert($(this).attr('id'));
    $("#btn_ok").val($(this).attr('id'));
    $("#btn_type").val(0);
});
$(".del_all_color").click(function () {

    $("#btn_ok").val($("#check_value").val());
});
$(".del_menu_size").click(function () {
    // alert($(this).attr('id'));
    $("#btn_ok").val($(this).attr('id'));
    $("#btn_type").val(1);

});
$(".del_all_size").click(function () {

    $("#btn_ok").val($("#check_value").val());
});

$("#btn_ok").click(function () {
    var btn_type = $("#btn_type").val();

    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=del_color_size&id=" + $(this).val() + "&value=" + btn_type,
        success: function (result) {
            //alert(result);
            window.location.href = "newcoms.php?yep=new_product_color_size";
        }
    });
});


$(document).ready(function () {
    $(".edit_menu_color").click(function () {
        var a = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'New_ajax_product.php',
            data: "action=edit_edit_color&id=" + a,
            success: function (result) {
                // console.log(result);
                var b = result.split('^');
                $('#name_color').val(b[0]);
                $('#code_color').val(b[1]);
                $('#inpt_color_edit').val(a);
            }

        });
    });

});

$(document).ready(function () {
    $(".edit_menu_size").click(function () {
        var a = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'New_ajax_product.php',
            data: "action=edit_edit_size&id=" + a,
            success: function (result) {
                // console.log(result);
                var b = result.split('^');
                $('#name_size').val(b[0]);
                $('#code_size').val(b[1]);
                $('#inpt_size_edit').val(a);
            }

        });
    });

});


$(".nes_tik_color").click(function () {

    // e.preventDefault();
    var a = $(this).attr('id');
    var isChecked = $(this).prop('checked');
    //alert(a);
    if (isChecked)
        var b = 1;
    else
        var b = 0;
    // alert('a='+a+'b='+b);
    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=nes_tik_edit_color&value=" + b + "&id=" + a,
        success: function (result) {
        }
    });
});

$(".nes_tik_size").click(function () {

    // e.preventDefault();
    var a = $(this).attr('id');
    var isChecked = $(this).prop('checked');
    //alert(a);
    if (isChecked)
        var b = 1;
    else
        var b = 0;
    // alert('a='+a+'b='+b);
    $.ajax({
        type: 'POST',
        url: 'New_ajax_product.php',
        data: "action=nes_tik_edit_size&value=" + b + "&id=" + a,
        success: function (result) {
        }
    });
});


// $('.select2-container').on(function () {





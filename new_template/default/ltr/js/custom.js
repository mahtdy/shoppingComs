///////////news show option/////////////
$(document).ready(function(){
    $('button').on('click',function() {
        if ($(this).hasClass('gridbtn')) {
            $('#switchshow ul').removeClass('listshow').addClass('gridshow');
        }
        else if($(this).hasClass('listbtn')) {
            $('#switchshow ul').removeClass('gridshow').addClass('listshow');
        }
    });

    $('#gbtn').on('click', function() {
        $('.listbtn').addClass('deact');
        $('.gridbtn').removeClass('deact');
    });
    $('#lbtn').on('click', function() {
        $('.gridbtn').addClass('deact');
        $('.listbtn').removeClass('deact');
    });
});


///////////Go To Top Page/////////////
$(document).ready(function() {
    $(window).scroll(function(){
        var TopSize = $('.slider').outerHeight();
        if ($(window).scrollTop() > TopSize) {
            $('.gtop').addClass('gtop_fix');
        }
        else {
            $('.gtop').removeClass('gtop_fix');
        }
    });
});

///////////Logo Section fix in mobile version/////////////
$(document).ready(function() {
    $(window).scroll(function(){
        var TopSize = $('.middle').outerHeight();
        if ($(window).scrollTop() > TopSize) {
            $('.middle').addClass('middle_fix');
        }
        else {
            $('.middle').removeClass('middle_fix');
        }
    });
});

///////////mobile version link to show menu - Hamberger/////////////
$(document).ready(function () {
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });
});








//INTERNAL ANCHOR LINKS SCROLLING (PAGINATION)
$(document).ready(function(){
    $(".scroll").click(function(event){
        event.preventDefault();
        $('html, body').animate({scrollTop:$(this.hash).offset().top-10}, 800, 'linear');
    });
});





//////////////Ads Add Star//////////////////////
$(document).ready(function(){
    $( '#asbtn' ).click(function() {
        if ( $(".ads_tools").hasClass('activestar') ) {
            $(".ads_tools").removeClass('activestar').addClass('deactivestar');
            $('#asbtn').removeClass('activestar').addClass('deactivestar');
        } else if ( $(".ads_tools").hasClass('deactivestar') ) {
            $(".ads_tools").removeClass('deactivestar').addClass('activestar');
            $('#asbtn').removeClass('deactivestar').addClass('activestar');
        }
    });
});




//////////////Show PhoneNumber/////////////////
$(document).ready(function(){
    $('#pnsbtn').click(function(){
        var $mobile=$('#phnumbershow').data('phonenumber');
        $('#phnumbershow').html($mobile).fadeIn(1);
    });
});


//////////////
$(document).ready(function(){
    $("#pricecheck").change(function(){
        if(this.checked){
            $('#priceipbx').prop('disabled', true);
        }else{
            $('#priceipbx').prop('disabled', false);
        }
    });
});





////////////////////

$(document).ready(function(){
    $("#mali_sw").click(function(){
        $(".mali_item").removeClass("disnone");
        $("#mali_sw").removeClass("switch_off");
        $(".amozesh_item").addClass("disnone");
        $(".omomi_item").addClass("disnone");
        $("#amozesh_sw").addClass("switch_off");
        $("#omomi_sw").addClass("switch_off");
    });

    $("#amozesh_sw").click(function(){
        $(".amozesh_item").removeClass("disnone");
        $("#amozesh_sw").removeClass("switch_off");
        $(".mali_item").addClass("disnone");
        $(".omomi_item").addClass("disnone");
        $("#mali_sw").addClass("switch_off");
        $("#omomi_sw").addClass("switch_off");
    });

    $("#omomi_sw").click(function(){
        $(".omomi_item").removeClass("disnone");
        $("#omomi_sw").removeClass("switch_off");
        $(".mali_item").addClass("disnone");
        $(".amozesh_item").addClass("disnone");
        $("#mali_sw").addClass("switch_off");
        $("#amozesh_sw").addClass("switch_off");
    });

    $("#et_show_all").click(function(){
        $(".mali_item").removeClass("disnone");
        $("#mali_sw").removeClass("switch_off");
        $(".amozesh_item").removeClass("disnone");
        $("#amozesh_sw").removeClass("switch_off");
        $(".omomi_item").removeClass("disnone");
        $("#omomi_sw").removeClass("switch_off");
    });
});


 


///////////tooltip/////////////
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip()
});

$(document).ready(function(){
    $('#photogallerydemo').carousel({
        interval: 3000
    });
});

$(document).ready(function(){
    $('#videogallerydemo').carousel({
        interval: 3000
    });
});


 




$(document).ready(function(){
    // category selection with select2 Cats
    $('.cat-select').select2({
        theme: "bootstrap",
        placeholder: "انتخاب کنید ...",
        dir: "rtl",
        allowClear: true,
        templateResult: function (data) {
// We only really care if there is an element to pull classes from
            if (!data.element) {
                return data.text;
            }

            var $element = $(data.element);

            var $wrapper = $('<span></span>');
            $wrapper.addClass($element[0].className);

            $wrapper.text(data.text);
            return $wrapper;
        }
    });

    // category selection with select2 Ads
    $('.cat-select_ads').select2({
        theme: "bootstrap",
        placeholder: "انتخاب موضوع آگهی ...",
        dir: "rtl",
        allowClear: true,
        templateResult: function (data) {
// We only really care if there is an element to pull classes from
            if (!data.element) {
                return data.text;
            }

            var $element = $(data.element);

            var $wrapper = $('<span></span>');
            $wrapper.addClass($element[0].className);

            $wrapper.text(data.text);
            return $wrapper;
        }
    });

    // category selection with select2 Ads option
    $('.cat-select_ads_option').select2({
        theme: "bootstrap",
        placeholder: "??????? ????? ???? ...",
        dir: "rtl",
        allowClear: true,
        templateResult: function (data) {
// We only really care if there is an element to pull classes from
            if (!data.element) {
                return data.text;
            }

            var $element = $(data.element);

            var $wrapper = $('<span></span>');
            $wrapper.addClass($element[0].className);

            $wrapper.text(data.text);
            return $wrapper;
        }
    });

});


/*
$(document).ready(function(){
    $('#start_date').MdPersianDateTimePicker({
        Placement: 'bottom', // default is 'bottom'
        Trigger: 'focus', // default is 'focus',
        EnableTimePicker: false, // default is true,
        TargetSelector: '', // default is empty,
        GroupId: '', // default is empty,
        ToDate: false, // default is false,
        FromDate: false // default is false,
    });

    $('#finish_date').MdPersianDateTimePicker({
        Placement: 'bottom', // default is 'bottom'
        Trigger: 'focus', // default is 'focus',
        EnableTimePicker: false, // default is true,
        TargetSelector: '', // default is empty,
        GroupId: '', // default is empty,
        ToDate: false, // default is false,
        FromDate: false // default is false,
    });
});
*/
    $(document).ready(function(){
        $('body,span,li,p').not('.notp').persiaNumber();
    });






$(document).ready(function(){
    videojs.options.flash.swf = "helper/video-js.swf";
});




$(document).ready(function(){
    var as = audiojs.createAll();
});





    $(document).ready(
        function(){
            $('#newsrotator').innerfade({
                animationtype: 'fade',
                speed: 6000,
                timeout: 6000,
                type: 'random',
                containerheight: '1em'
            });
        }
    );

$(document).ready(
        function(){
            $('#dsmshow_btn').click(function(){
                $('.ds_menu').toggleClass('ds_menu_show');
            });

            $('.fa-close').click(function(){
                $('.ds_menu').removeClass('ds_menu_show');
            });
        }
    );

////////////////////////////////Mobile Menu/////////////////////////////
$(document).ready(function(){
    $('#msmf_rtl_btn').click(function(){
        $('.msmf_rtl').toggleClass('msmf_rtl_active');
    });

    $('.msmf_rtl_btn_close').click(function(){
        $('.msmf_rtl').removeClass('msmf_rtl_active');
    });

    $('.msmf_rtl_menu_lev_01').find('.extender_btn_01').click(function(){
        $('.msmf_rtl_menu_lev_02').toggleClass('msmf_rtl_menu_dis_block');
        $('.extender_btn_01').toggleClass('fa-minus')
    });

    $('.msmf_rtl_menu_lev_02').find('.extender_btn_02').click(function(){
        $('.msmf_rtl_menu_lev_03').toggleClass('msmf_rtl_menu_dis_block');
        $('.extender_btn_02').toggleClass('fa-minus')
    });

    $('.msmf_rtl_menu_lev_03').find('.extender_btn_03').click(function(){
        $('.msmf_rtl_menu_lev_04').toggleClass('msmf_rtl_menu_dis_block');
        $('.extender_btn_03').toggleClass('fa-minus')
    });

    $('.msmf_rtl_menu_lev_04').find('.extender_btn_04').click(function(){
        $('.msmf_rtl_menu_lev_05').toggleClass('msmf_rtl_menu_dis_block');
        $('.extender_btn_04').toggleClass('fa-minus')
    });

    $('.msmf_rtl_menu_lev_05').find('.extender_btn_05').click(function(){
        $('.msmf_rtl_menu_lev_06').toggleClass('msmf_rtl_menu_dis_block');
        $('.extender_btn_05').toggleClass('fa-minus')
    });

});

///////////switch searchbox//////////
$(document).ready(function(){
    $('#searchbox_sw_btn').click(function(){
        $('.searchbox_pop').toggleClass('sb_active');
        $(this).children('i').toggleClass('ssw_act');
    });

    $('#searchbox_sw_btn_mobile').click(function(){
        $('.searchbox_pop_mobile').toggleClass('sb_active_mobile');
        $(this).children('i').toggleClass('ssw_act_mobile');
    });
});



////////////////////////////////////////////////////////////////
requirejs(["helper/jquery.min"], function() {

///////////news show option/////////////
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
    $(".scroll").click(function(event){
        event.preventDefault();
        $('html, body').animate({scrollTop:$(this.hash).offset().top-10}, 800, 'linear');
    });




//////////////Ads Add Star//////////////////////
    $( '#asbtn' ).click(function() {
        if ( $(".ads_tools").hasClass('activestar') ) {
            $(".ads_tools").removeClass('activestar').addClass('deactivestar');
            $('#asbtn').removeClass('activestar').addClass('deactivestar');
        } else if ( $(".ads_tools").hasClass('deactivestar') ) {
            $(".ads_tools").removeClass('deactivestar').addClass('activestar');
            $('#asbtn').removeClass('deactivestar').addClass('activestar');
        }
    });



//////////////Show PhoneNumber/////////////////
    $('#pnsbtn').click(function(){
        var $mobile=$('#phnumbershow').data('phonenumber');
        $('#phnumbershow').html($mobile).fadeIn(1);
    });

//////////////
    $("#pricecheck").change(function(){
        if(this.checked){
            $('#priceipbx').prop('disabled', true);
        }else{
            $('#priceipbx').prop('disabled', false);
        }
    });


});


////////////////////////////////////////////////////////////////
requirejs(["helper/price.min"], function(){

    $('#priceipbx').priceFormat({
        prefix: '',
        suffix:'',
        thousandsSeparator: ','
    });

});


////////////////////////////////////////////////////////////////
requirejs(["helper/audioplayer"], function(){

    $('.audio-player').audioPlayer();

});

////////////////////////////////////////////////////////////////
requirejs(["helper/bootstrap.min"], function() {

///////////tooltip/////////////
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });

});

////////////////////////////////////////////////////////////////
requirejs(["helper/wow.min"], function() {

    new WOW().init();

});

////////////////////////////////////////////////////////////////
requirejs(["helper/responsive-slider.min"]);
////////////////////////////////////////////////////////////////
requirejs(["helper/select2.min"], function() {

    // category selection with select2 Cats
    $('.cat-select').select2({
        theme: "bootstrap",
        placeholder: "انتخاب کنید...",
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
        placeholder: "انتخاب گروه آگهی...",
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
        placeholder: "تنظیمات نمایش آگهی ...",
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

////////////////////////////////////////////////////////////////
requirejs(["helper/calendar.min"]);
////////////////////////////////////////////////////////////////
requirejs(["helper/jquery.Bootstrap-PersianDateTimePicker.min"], function() {

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

////////////////////////////////////////////////////////////////
requirejs(["helper/pnumber.min"], function() {

    $(document).ready(function(){
        $('body,span,li,p').not('.notp').persiaNumber();
    });

});

////////////////////////////////////////////////////////////////
requirejs(["helper/modernizr"]);





////////////////////////////////////////////////////////////////
requirejs(["helper/jquery.swipebox.min"], function() {

    $( '.swipebox' ).swipebox({
            useCSS : true, // false will force the use of jQuery for animations
            initialIndexOnArray: 0, // which image index to init when a array is passed
            hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
            hideBarsDelay : 3000, // delay before hiding bars on desktop
            videoMaxWidth : 1140, // videos max width
            beforeOpen: function(){} , // called before opening
            afterOpen: null, // called after opening
            afterClose: function(){}, // called after closing
            loopAtEnd: false, // true will return to the first image after the last image is reached
            autoplayVideos: false, // true will autoplay Youtube and Vimeo videos
            queryStringData: {}, // plain object with custom query string arguments to pass/override for video URLs,
            toggleClassOnLoad: '' // CSS class that can be toggled when the slide will be loaded (like 'hidden' of Bootstrap)
    });

});


////////////////////////////////////////////////////////////////
requirejs(["helper/video"], function() {
    videojs.options.flash.swf = "helper/video-js.swf";

});


////////////////////////////////////////////////////////////////
requirejs(["helper/audio.min"], function() {

        var as = audiojs.createAll();

});

////////////////////////////////////////////////////////////////
requirejs(["helper/validator.min"], function() {

    $('#fwvalidator').validator({
        feedback: {
            success: 'glyphicon-ok',
            error: 'glyphicon-remove'
        }
    });

});


////////////////////////////////////////////////////////////////
requirejs(["helper/jquery.searchable-1.1.0.min"], function() {

    $( '.tagslist' ).searchable({
        selector      : '.tagitem',
        childSelector : '.tagtitle',
        searchField   : '#tagsearchbox',
        striped       : true,
        oddRow        : { 'background-color': '#f5f5f5' },
        evenRow       : { 'background-color': '#fff' },
        hide          : function( elem ) {
            elem.fadeOut(50);
        },
        show          : function( elem ) {
            elem.fadeIn(50);
        },
        searchType    : 'fuzzy',
        clearOnLoad: true
    });

});

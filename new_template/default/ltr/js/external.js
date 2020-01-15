//Calculate full with of window
function homeFullScreen() {

    var homeSection = $('.home');
    var windowHeight = $(window).outerHeight();

    //if (homeSection.hasClass('home-fullscreen')) {

    $('.home-fullscreen').css('height', windowHeight);
    //}
}
//What happen on window resize
$(window).resize(function () {
    homeFullScreen();
});
//Initialization
$(window).load(function () {
    homeFullScreen();
});
$(document).ready(function () {
    $(window).scroll(function(){
        var st=$(window).scrollTop();
        if(st>400){
            $('.homeprefix_gotop').css({'right':'30px'});
        }
        else{
            $('.homeprefix_gotop').css({'right':'-70px'});
        }
    });
    $('.homeprefix_gotop').click(function(){
        $('html,body').animate({scrollTop:0},800);
    });
    $('.homeprefix_menu-btn button').click(function () {
        var menu=$('.homeprefix_menu-btn button');
        var clm=$('.homeprefix_menu-clm');
        var clm_dis=clm.css('display');
        //alert(clm_dis);
        if(clm_dis=='none'){
            clm.slideDown('slow');
            menu.css({'background-color':'rgba(255 , 255 , 255 , 1)','border-color':'#c4b4b3','color':'#c4b4b3'});
        }
        else{
            clm.slideUp('slow');
            menu.css({'background-color':'rgba(255 , 255 , 255 , .7)','border-color':'#fff','color':'#b88e6d'});
        }
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

});
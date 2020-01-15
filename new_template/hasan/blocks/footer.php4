<!-- Footer
================================================== -->
<div id="footer" class="dark" style="direction: rtl">
    <!-- Main -->
    <div class="container">
        <? $footer1 = get_tem_result($site, $la, "footer1", $tem, $coms_conect); ?>
        <div class="row">
            <div class="col-md-5 col-xs-12 col-sm-4">
                <img class="footer-logo" src="<?= $footer1['pic_adress'] ?>" alt="">
                <br><br>
                <p><?= $footer1['title'] ?></p>
            </div>

            <div class="col-md-4 col-xs-12 col-sm-4 ">
                <h4><?= $footer1['text'] ?></h4>


                <? for ($i = 1; $i <= 6; $i++) { ?>
                    <? $sub1_footer2 = get_tem_result($site, $la, "sub1_footer2$i", $tem, $coms_conect);
                    if ($sub1_footer2['title'] > "") { ?>
                        <ul class="footer-links">
                            <li><a href="<?= $sub1_footer2['link'] ?>"><?= $sub1_footer2['title'] ?></a></li>
                        </ul>
                    <? }
                } ?>


                <? for ($i = 7; $i <= 11; $i++) { ?>
                    <? $sub2_footer2 = get_tem_result($site, $la, "sub2_footer2$i", $tem, $coms_conect);
                    if ($sub2_footer2['title'] > "") { ?>
                        <ul class="footer-links">
                            <li><a href="<?= $sub2_footer2['link'] ?>"><?= $sub2_footer2['title'] ?></a></li>
                        </ul>
                    <? }
                } ?>

                <div class="clearfix"></div>
            </div>

            <div class="col-md-3 col-xs-12 col-sm-4">
                <h4><?= $footer1['pic'] ?></h4>
                <div class="text-widget">
                    <? $footer3 = get_tem_result($site, $la, "footer3", $tem, $coms_conect); ?>
                    آدرس: <span><?= $footer3['pic_adress'] ?></span> <br>
                    تلفن: <span><?= $footer3['text'] ?> </span><br>
                    ایمیل:<span> <a href="<?= $footer3['link'] ?>"><?= $footer3['pic'] ?></a> </span><br>
                </div>




                <? $Social_name = array('', 'facebook', 'twitter', 'gplus', 'vimeo');
                for ($i = 1; $i <= 4; $i++) {
                    $Social_Networks = get_tem_result($site, $la, "Social_Networks$i", $tem, $coms_conect);
                    if ($Social_Networks['pic_adress'] > "") { ?>
                        <ul class="social-icons margin-top-20" style="font-family: FontAwesome !important;">
                            <li><a class="<?= $Social_name[$i] ?>" href="<?= $Social_Networks['link'] ?>"><i
                                            class="<?= $Social_Networks['pic_adress'] ?>"></i></a></li>
                        </ul>
                    <? }
                } ?>
            </div>
        </div>


        <!-- Copyright -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <? $copy_write = get_tem_result($site, $la, "copy_write", $tem, $coms_conect); ?>
                <div class="copyrights"><?= $copy_write['text'] ?></div>
            </div>
        </div>

    </div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" ></a></div>


</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->


<!--<script src="--><?//=$subdomian_add?><!--/new_template/default/--><?//=$defult_dir?><!--/js/persianumber.js"></script>-->


<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/jquery.newsTicker.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/owl.carousel.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/video.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/bootstrap.min.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/popper.min.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/lightgallery-all.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/select2.min.js"></script>

<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/component.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/bootstrap-datepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/css/select2/select2.min.css">


<!-- REVOLUTION SLIDER SCRIPT -->
<script type="text/javascript"
src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/themepunch.tools.min.js"></script>
<script type="text/javascript"
src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/themepunch.revolution.min.js"></script>

<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/chosen.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/mmenu.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/slick.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/rangeslider.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/magnific-popup.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/waypoints.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/counterup.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/tooltips.min.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/scripts/custom.js"></script>
<script type="text/javascript" src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/custom.js"></script>


<script type="text/javascript">
var tpj = jQuery;
var revapi4;
tpj(document).ready(function () {
if (tpj("#rev_slider_4_1").revolution == undefined) {
revslider_showDoubleJqueryError("#rev_slider_4_1");
        } else {
            revapi4 = tpj("#rev_slider_4_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "scripts/",
                sliderLayout: "auto",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "on",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style: "zeus",
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 600,
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        tmp: '<div class="tp-title-wrap"></div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 40,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 40,
                            v_offset: 0
                        }
                    }
                    ,
                    bullets: {
                        enable: false,
                        hide_onmobile: true,
                        hide_under: 600,
                        style: "hermes",
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        direction: "horizontal",
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 32,
                        space: 5,
                        tmp: ''
                    }
                },
                viewPort: {
                    enable: true,
                    outof: "pause",
                    visible_area: "80%"
                },
                responsiveLevels: [1200, 992, 768, 480],
                visibilityLevels: [1200, 992, 768, 480],
                gridwidth: [1180, 1024, 778, 480],
                gridheight: [640, 500, 400, 300],
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 25, 47, 48, 49, 50, 51, 55],
                    type: "mouse",
                },
                shadow: 0,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    });
    /*ready*/
</script>


<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
	(Load Extensions only on Local File Systems !
	The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/extensions/revolution.extension.video.min.js"></script>



<!-- Style Switcher
================================================== -->
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/switcher.js"></script>

<div id="style-switcher">
    <h2>Color Switcher <a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#"><i
                    class="sl sl-icon-settings"></i></a></h2>
    <div>
        <ul class="colors" id="color1">
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="main"
                   title="Main"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="blue"
                   title="Blue"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="green"
                   title="Green"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="orange"
                   title="Orange"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="navy"
                   title="Navy"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="yellow"
                   title="Yellow"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="peach"
                   title="Peach"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="beige"
                   title="Beige"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="purple"
                   title="Purple"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="celadon"
                   title="Celadon"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="red"
                   title="Red"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="brown"
                   title="Brown"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="cherry"
                   title="Cherry"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="cyan"
                   title="Cyan"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="gray"
                   title="Gray"></a></li>
            <li><a href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/#" class="olive"
                   title="Olive"></a></li>
        </ul>
    </div>
</div>

<div id="style-switcher1">
    <h4 style=" height: 26px;">
        <a href="#myModal" role="button" data-toggle="modal" class="sign-in popup-with-zoom-anim" style="position: relative;right: -14px;color: white;top: -3px;">ورود</a>

    </h4>
    <h2>
        <a href="#"><i class="sl sl-icon-login"></i></a>

    </h2>
</div>

<!-- Style Switcher / End -->

<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/jquery.dlmenu.js"></script>
<script>
    $(function () {
        $('#dl-menu').dlmenu();
    });

    $("#style-switcher1 h2 a").click(function(e){
        e.preventDefault();
        var div = $("#style-switcher1");
        console.log(div.css("left"));
        if (div.css("left") === "-65px") {
            $("#style-switcher1").animate({
                left: "0px"
            });
        } else {
            $("#style-switcher1").animate({
                left: "-65px"
            });
        }
    });

</script>


</body>
</html>


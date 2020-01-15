<!--سوالات خود را از ما بپرسید-->
<? $question = get_tem_result($site, $la, "question", '', $coms_conect);
if ($question['pic_adress'] == 1) {
    ?>
    <div id="style-switcher">
        <h2>
            <form class="" method="post">
                <div class="H_ml5" title="ارسال">
                    <input class="H_style_input" type="text" placeholder="پیام خود را اینجا وارد کنید">
                    <a href="#"><img class="H_pos_lt lozad" data-src="new_template/drbanihosseini/img/send.png"
                                     alt="send"></a>
                </div>
            </form>
            <a><i class="fa fa-life-ring"></i></a>
        </h2>
        <div>
            <img class="banner_image lozad" data-src="<?= $question['pic'] ?>" alt="question">
        </div>

    </div>

<? } ?>
<!--سوالات خود را از ما بپرسید-->
<footer id="footer" class="clear">
    <div class="container">
        <div class="row">
            <? $footer_column1 = get_tem_result($site, $la, "footer_column1", $tem, $coms_conect); ?>

            <div class="col-md-3 box-footer ">
                <h2 class=""><?= $footer_column1['text'] ?></h2>
                <ul class="p0">
                    <? $one_column_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'one_column_footer_links%' ", $coms_conect);
                    for ($k = 1; $k <= $one_column_links; $k++) {
                    $one_column_footer_links = get_tem_result($site, $la, "one_column_footer_links$k", $tem, $coms_conect);
                    if ($one_column_footer_links['title'] > "") {
                    ?>
                    <li class="">
                        <a href="<?= $one_column_footer_links["link"] ?>"><?= $one_column_footer_links["title"] ?></a>
                    </li>
                   <?}}?>

                </ul>


            </div>
            <div class="col-md-3 box-footer">
                <div class="contact-details">
                    <? $footer_column2 = get_tem_result($site, $la, "footer_column2", $tem, $coms_conect); ?>

                    <h2 class=""><?= $footer_column2['title'] ?></h2>
                    <ul class="p0">
                        <? $two_column_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'two_column_footer_links%' ", $coms_conect);
                        for ($k = 1; $k <= $two_column_links; $k++) {
                        $two_column_footer_links = get_tem_result($site, $la, "two_column_footer_links$k", $tem, $coms_conect);
                        if ($two_column_footer_links['title'] > "") {
                        ?>
                        <li class="">
                            <a href="<?= $two_column_footer_links["link"] ?>"><?= $two_column_footer_links["title"] ?></a>
                        </li>
                        <?}}?>


                    </ul>

                </div>
            </div>
            <? $footer_column3 = get_tem_result($site, $la, "footer_column3", $tem, $coms_conect); ?>
            <div class="col-md-3 box-footer">
                <h2 class=""><?= $footer_column3['title'] ?></h2>
                <p>
                    آدرس: <span><?= $footer_column3['text'] ?></span><br>
                    <? $contact_us_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'contact_links%' ", $coms_conect);
                    for ($k = 1; $k <= $contact_us_links; $k++) {
                    $contact_links = get_tem_result($site, $la, "contact_links$k", $tem, $coms_conect);
                    if ($contact_links['title'] > "") {
                    ?>
                        <?= $contact_links["title"] ?><span><?= number2farsi($contact_links["link"])?> </span><br>
                    <?}}?>

                    <? $email = get_tem_result($site, $la, "email", $tem, $coms_conect); ?>
                    ایمیل:<span> <a href="<?= $email['link'] ?>"><img src="<?= $email['pic'] ?>" alt="<?= $email['title'] ?>"></a> </span><br>
                </p>
            </div>
            <? $footer_column4 = get_tem_result($site, $la, "footer_column4", $tem, $coms_conect); ?>

            <div class="col-md-3 box-footer">
                <h2 class=""><?= $footer_column4['title']?></h2>

                <ul class="">
                    <? $footer_social_networks = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'footer_social%' ", $coms_conect);
                    for ($k = 1; $k <= $footer_social_networks; $k++) {
                    $footer_social = get_tem_result($site, $la, "footer_social$k", $tem, $coms_conect);
                    if ($footer_social['title'] > "") {
                    ?>
                    <li class="H_dp">
                        <a href="<?= $footer_social["link"] ?>" target="_blank" title="<?= $footer_social["text"] ?>">
                            <i class="fa fa-<?= $footer_social["title"] ?>"></i>
                        </a>
                    </li>
                    <?}}?>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 center">
                    <h5 class="center">Power By <a href="http://coms.ir"><i>Coms </i> </a>CMS</h5>
                </div>
            </div>
        </div>
    </div>
</footer>
<a class="scroll-to-top hidden-mobile " href="#"><i class="fa fa-chevron-up"></i></a>
<!-- Footer / End -->


<script defer type="text/javascript" src="/<?= $subdomian_add ?>cdn/main.js"></script>
<script defer src="<?= $subdomian_add ?>/cdn/owl.carousel.min.js"></script>
<script defer src="<?= $subdomian_add ?>/cdn/theia-sticky-sidebar.js" type="text/javascript"></script>

<!--<script defer type="text/javascript" src="https://cdn2.coms.ir/main.js"></script>-->
<!--<script defer src="https://cdn2.coms.ir/owl.carousel.min.js"></script>-->
<!--<script defer src="https://cdn2.coms.ir/theia-sticky-sidebar.js" type="text/javascript"></script>-->

<script>
    // function readyFn( jQuery ) {
    //     $('.loading1').fadeOut('slow');
    // }
    // $( document ).ready( readyFn );
    $(document).ready(function () {
        //drsheikhi
        var modWidth = $( document ).width();
        if (modWidth<568){
            $('#Tab_box3').addClass('owl-carousel box3_slide_head');
            $('#Tab_box3 .nav-item').on('click',function () {
                $('#Tab_box3 .nav-item').removeClass('active');
                $(this).addClass('active');
            });
        }
        $(".services-content-wrapper").on({
            mouseover: function () {

                $(this).siblings('.services-inside').css({
                    transform : "translate(0px,-70px) scaleY(1)",
                    transition: "transform 250ms linear 0s"
                });
                $(this).css({
                    transform : "translate(0px,-70px)",
                    transition: "transform 250ms linear 0s"
                });

            },
            mouseleave: function () {


                $(this).siblings('.services-inside').css({
                        transform : "translate(0px,0px) scaleY(0)",
                        transition: "transform 250ms linear 0s"
                });
                $(this).css({
                    transform : "translate(0px,0px)",
                    transition: "transform 250ms linear 0s"
                });
            }
        });
        $(".services-inside").on({
            mouseover: function () {

                $(this).siblings('.services-content-wrapper').css({
                    transform : "translate(0px,-70px) scaleY(1)",
                    transition: "transform 250ms linear 0s"
                });
                $(this).css({
                    transform : "translate(0px,-70px)",
                    transition: "transform 250ms linear 0s"
                });

            },
            mouseleave: function () {
                $(this).siblings('.services-content-wrapper').css({
                        transform : "translate(0px,0px)",
                        transition: "transform 250ms linear 0s"
                });
                $(this).css({
                     transform : "translate(0px,0px) scaleY(0)",
                    transition: "transform 250ms linear 0s"
                });
            }
        });
        $(".box3_slide").owlCarousel({
            rtl: true,
            lazyLoad: true,
            nav: true,

            autoplay: true,
            dots : false,
            navText: ["", ""],
            responsive: {
                0: {
                    items: 2,
                    loop: true,
                    margin:10
                },
                600: {
                    items: 3,
                    loop: true,
                    margin:30
                },
                1000: {
                    items:3,
                    loop: true,
                    margin:30
                }
            }
        });

        $(".box3_slide_head").owlCarousel({
            rtl: true,
            lazyLoad: true,
            nav: false,
            autoplay: false,
            dots : false,
            // navText: ["", ""],
            responsive: {
                0: {
                    items: 4
                },
                600: {
                    items: 10

                },
                1000: {
                    items:10


                }
            }
        });


        $('.mfp-gallery-container').each(function() { // the containers for all your galleries

            $(this).magnificPopup({
                type: 'image',
                delegate: 'a.mfp-gallery',

                fixedContentPos: true,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: false,
                preloader: true,

                removalDelay: 0,
                mainClass: 'mfp-fade',

                gallery:{enabled:true, tCounter: ''}
            });
        });

        $(".scroll-to-top").click(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });
        var h = 300;
        $(window).bind("scroll", function() {
            ($(this).scrollTop() > h ? $(".scroll-to-top").addClass("visible") : $(".scroll-to-top").removeClass("visible"))
        });


        //end drsheikhi

        //full page video
        $('.js-video-button').click(function () {
            $('#iframe4').on('load', function(){
                $('#iframe4').contents().find("head").append($("<style type='text/css'>  video{height:100%}  </style>"));
            });
        });

        $("#first_owl").owlCarousel({
            rtl: true,
            lazyLoad: true,
            nav: true,
            loop: true,
            dots : true,
            navText: ["", ""],
            autoplay: true,
            //   autoplay: 4000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        });

        $("#side_owl").owlCarousel({
            rtl: true,
            lazyLoad: true,
            nav: true,
            loop: true,
            autoplay: true,
            dots : false,
            navText: ["", ""],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
        $("#side_link").owlCarousel({
            rtl: true,
            lazyLoad: true,
            nav: true,
            autoplay: true,
            dots : false,
            navText: ["", ""],
            responsive: {
                0: {
                    items: 1,
                    loop: true
                },
                600: {
                    items: 1,
                    loop: true
                },
                1000: {
                    items: 10,
                    loop: false
                }
            }
        });
    });
    $(document).ready(function(){$(".H_neshane_for_colum4").closest(".is-submenu-item").last().addClass("H-neshne-for-remove"),$(".H-neshne-for-remove").siblings().last().addClass("H-neshne-for-remove-f"),$(".H-neshne-for-remove-f").find(".submenu").removeClass("is-drilldown-submenu"),$(".dt-search-icon").click(function(){$(".search-container").addClass("open")}),$(".close").click(function(){$(".search-container").removeClass("open")}),$(".has-submenu").on("click",function(){$(this).find("ul:first").addClass("is-active"),$(this).find("ul:first > .js-drilldown-back").length?console.log("exist"):(console.log("not exist"),$(this).find("ul:first").prepend("<li class='js-drilldown-back'><a><b><?=$view_back?></b></a></li>"))}),$(".is-submenu-item").on("click",function(){$(this).find(".is-drilldown-submenu").css("margin-top","-51px")}),$(".dropdown-mega > ul").addClass("H_plr20 "),$("#tabs1,#tabs2,#tabs3,#tabs4,#tabs5,#tabs6,#tabs7,#tabs8,#tabs9,#tabs10").owlCarousel({rtl:!0,lazyLoad:!0,nav:!0,loop:!1,navText:["",""],responsive:{0:{items:1},600:{items:2},1e3:{items:3},1900:{items:3}}}),$("#shop1").owlCarousel({rtl:!0,lazyLoad:!0,nav:!0,loop:!1,navText:["",""],responsive:{0:{items:1},600:{items:1},1e3:{items:1}}}),$("#shopmobile1").owlCarousel({rtl:!0,lazyLoad:!0,nav:!0,loop:!1,navText:["",""],responsive:{0:{items:1},600:{items:1},1e3:{items:1}}})});

    $("#faqq").keypress(function(a){13==a.which&&($("#searchformm").attr("action","/search/<?= $la ?>/"+$("#faqq").val()),$("#searchformm").submit())}),$("#faq_btn").click(function(){$("#searchformm").attr("action","/search/<?= $la ?>/"+$("#faqq").val()),$("#searchformm").submit()}),$(".dropdown.H_neshane > ul > li").not(".not_col_md_3").addClass("col-md-3"),$(".dropdown.H_neshane > ul > li >ul >li>ul>li").addClass("col-md-12 H_p0 H_r10"),$(".dropdown > ul.H_style_ul li.col-md-4 > ul> li > a:first-child").addClass("H_pr0"),$(".dropdown > ul.H_style_ul li.col-md-4 > ul> li > a:first-child").next().next().addClass("H_mr0");

    $('.loader-section').css('background', '#<?= $preload['pic'] ?>');$('.H_preloader_style').css('color', '#<?= $preload['link'] ?>');

    $(document).ready(function(){$(".fa-life-ring").click(function(){$("#style-switcher").toggleClass("H_left0").css("transition-duration","1s")})});
    window.jQuery || document.write('<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/jquery-1.9.1.min.js"><\/script>');
    $(document).ready(function () {$('.leftSidebar, .content, .rightSidebar').theiaStickySidebar({<?if (isset($madual_file_name) && $madual_file_name == 'new_news_text') echo "additionalMarginTop: 30"; else echo "additionalMarginTop: 100" ?>});<? $preload_time = get_tem_result($site, $la, "preload_time", '', $coms_conect); ?>setTimeout(function () {$('body').addClass('loaded');$('.H_preloader_style_div').addClass('hidden');$('.H_neshane_hiden').addClass('hidden');}, <?= $preload_time['title'] ?>);});
    $(document).ready(function () {

        $('#lightgallery').lightGallery({
        });
        $('#html5-videos').lightGallery();
    });


</script>


<!--End container-->

</body>
</html>
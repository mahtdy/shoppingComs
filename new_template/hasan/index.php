<? if ($defult_site == 'main') {
    include("new_template/hasan/" . 'blocks/header.php4');
} else
    include("../new_template/hasan/" . '/blocks/header.php4');
$dir = "rtl";
$_SESSION['site'] = $site;
$_SESSION['la'] = $la;
?>
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- Slider
================================================== -->

<!-- Revolution Slider -->
<div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
     data-alias="classicslider1"
     style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">

    <!-- 5.0.7 auto mode -->
    <div id="rev_slider_4_1" class="rev_slider home fullwidthabanner" style="display:none;" data-version="5.0.7">
        <ul>
            <?$query="SELECT * FROM new_slideshow where la='$defult_lang' and site='$defult_site' and 
					start_date<=$now and finish_date>=$now order by id desc limit 0,10";
            $result = $coms_conect->query($query);
            $i=1;
            while($RS1 = $result->fetch_assoc()) {?>
            <!-- Slide  -->
            <li data-index="rs-<?=$i?>" data-transition="fade" data-slotamount="hasan" data-easein="Power4.easeInOut"
                data-easeout="Power4.easeInOut" data-masterspeed="1000" data-rotate="0" data-fstransition="fade"
                data-fsmasterspeed="800" data-fsslotamount="7" data-saveperformance="off">

                <!-- Background -->
                <img src="<?= $RS1['slide_img1']?>"
                     alt="" data-bgposition="center center" data-bgfit="cover"
                     data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina
                     data-kenburns="on" data-duration="12000" data-ease="Linear.easeNone" data-scalestart="100"
                     data-scaleend="112" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0"
                     data-offsetend="0 0">

                <!-- Caption-->
                <div class="tp-caption centered custom-caption-2 tp-shape tp-shapewrapper tp-resizeme rs-parallaxlevel-0"
                     id="slide-2-layer-2"
                     data-x="['center','center','center','center']" data-hoffset="['0']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['0']"
                     data-width="['640','640', 640','420','320']"
                     data-height="auto"
                     data-whitespace="nowrap"
                     data-transform_idle="o:1;"
                     data-transform_in="y:0;opacity:0;s:1000;e:Power2.easeOutExpo;s:400;e:Power2.easeOutExpo"
                     data-transform_out=""
                     data-mask_in="x:0px;y:[20%];s:inherit;e:inherit;"
                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                     data-start="1000"
                     data-responsive_offset="on">

                    <!-- Caption Content -->
                    <div class="R_title margin-bottom-15 font-30"
                         id="slide-2-layer-3"
                         data-x="['center','center','center','center']"
                         data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']"
                         data-voffset="['-40','-40','-20','-80']"
                         data-fontsize="['42','36', '32','36','22']"
                         data-lineheight="['70','60','60','45','35']"
                         data-width="['640','640', 640','420','320']"
                         data-height="none" data-whitespace="normal"
                         data-transform_idle="o:1;"
                         data-transform_in="y:-50px;sX:2;sY:2;opacity:0;s:1000;e:Power4.easeOut;"
                         data-transform_out="opacity:0;s:300;"
                         data-start="600"
                         data-splitin="none"
                         data-splitout="none"
                         data-basealign="slide"
                         data-responsive_offset="off"
                         data-responsive="off"
                         style="z-index: 6; color: #fff; letter-spacing: 0px; font-weight: 600; ">
                     <?=$RS1['title']?>
                    </div>


                    <div class="caption-text font-16">
                        <?=$RS1['text1']?>
                    </div>
                    <a href=" <?=$RS1['link']?>" class="button medium"
                       id="h-button1"
                       style="margin: 10px 0px 0px;position: relative;right:287px;padding: 5px 12px !important; ">   <?=$RS1['text2']?></a>


                </div>

            </li>
        <?$i++;}?>
        </ul>
        <div class="tp-static-layers"></div>
    </div>
</div>
<!-- Revolution Slider / End -->


<!-- Content
================================================== -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h3 class="headline centered margin-top-75">
                <? $tarkibbandi = get_tem_result($site, $la, "tarkibbandi", $tem, $coms_conect);
                echo $tarkibbandi['title']; ?>
            </h3>
        </div>
    </div>
</div>


<!-- Category Boxes -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="categories-boxes-container margin-top-5 margin-bottom-30">
                <? for ($i = 1; $i <= 6; $i++) {
                    $anasor_tarkibbandi = get_tem_result($site, $la, "anasor_tarkibbandi$i", $tem, $coms_conect);
                    if ($anasor_tarkibbandi['title'] > "") {
                        ?>

                        <a href="<?= $anasor_tarkibbandi['link'] ?>"
                           class="category-small-box">
                            <i class="<?= $anasor_tarkibbandi['pic_adress'] ?>"></i>
                            <h4><?= $anasor_tarkibbandi['title'] ?></h4>
                        </a>

                    <? }} ?>

            </div>
        </div>
    </div>
</div>
<!-- Category Boxes / End -->


<!-- place_view -->
<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <? $place_view = get_tem_result($site, $la, "place_view", $tem, $coms_conect); ?>
                <h3 class="headline centered margin-bottom-45">
                    <?= $place_view['title'] ?>
                    <span>
                        <?= $place_view['text'] ?>
                    </span>
                </h3>
            </div>
        </div>
    </div>

    <!-- Carousel / Start -->
    <div class="simple-fw-slick-carousel dots-nav">

        <? $color = array('', 'background-color: #ff35e3', 'background-color: #105cff', 'background-color: #ffff28', 'background-color: #e91721;', '', '', '');
        for ($i = 1; $i <= 6; $i++) { ?>
            <? $place_view_order = get_tem_result($site, $la, "place_view_order$i", $tem, $coms_conect); ?>

            <div class="fw-carousel-item">
                <a href="<?= $place_view_order['link'] ?>"
                   class="listing-item-container compact">
                    <div class="listing-item">
                        <img src="<?= $place_view_order['pic_adress'] ?>"
                             alt="<?= $place_view_order['title'] ?>">
                        <? if ($place_view_order['text'] >"") { ?>
                            <div class="listing-badge now-open"
                                 style="<?= $color[$i] ?>"><?= $place_view_order['text'] ?></div>
                        <? } ?>
                        <div class="listing-item-content">
                            <h3><?= $place_view_order['title'] ?></h3>
                            <span><?= $place_view_order['pic'] ?></span>
                        </div class="listing-item-content">
                    </div>
                </a>
            </div>

        <? } ?>

    </div>
    <!-- Carousel / End -->


</section>
<!-- place_view / End -->


<!-- city_popular -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <? $city_popular = get_tem_result($site, $la, "city_popular", $tem, $coms_conect); ?>
            <h3 class="headline centered margin-bottom-35 margin-top-70"> <?= $city_popular['title'] ?>
                <span><?= $city_popular['text'] ?> </span></h3>
        </div>

        <? $city_order = array('', '4', '8', '8', '4');
        for ($i = 1; $i <= 4; $i++) {
            $city_popular_order = get_tem_result($site, $la, "city_popular_order$i", $tem, $coms_conect); ?>

            <div class="col-md-<?= $city_order[$i] ?>">
                <!-- Image Box -->
                <? $city_popular_order = get_tem_result($site, $la, "city_popular_order$i", $tem, $coms_conect); ?>
                <a href="<?= $city_popular_order['link'] ?>" class="img-box">
                    <img src="<?= $city_popular_order['pic_adress'] ?>" alt="<?= $city_popular_order['title'] ?>">
                    <div class="img-box-content visible">
                        <h4><?= $city_popular_order['title'] ?> </h4>
                        <span><?= $city_popular_order['pic'] ?></span>
                    </div>
                </a>

            </div>
        <? } ?>
    </div>

</div>


<!-- our_customers-->


<section class="fullwidth border-top margin-top-40 margin-bottom-0 padding-top-60 padding-bottom-65" style="background: rgb(248, 248, 248);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <? $our_customers = get_tem_result($site, $la, "our_customers", $tem, $coms_conect); ?>
                    <h3 class="headline centered margin-top-75"><?= $our_customers['title'] ?></h3>
                </div>
                <h3 class="headline centered margin-bottom-40 margin-top-10"><span><?= $our_customers['text'] ?></span>
                </h3>
            </div>

            <!-- Carousel -->
            <div class="col-md-12">
                <div class="logo-slick-carousel dot-navigation">
                    <? for ($i = 1; $i <= 7; $i++) { ?>
                        <? $our_customers_order = get_tem_result($site, $la, "our_customers_order$i", $tem, $coms_conect);
                        ?>
                        <div class="item">
                            <img src="<?= $our_customers_order['pic'] ?>" alt="<?= $our_customers_order['title'] ?>">
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Logo Carousel / End -->
</section>


<!-- Flip banner -->
<? $navar_red = get_tem_result($site, $la, "navar_red", $tem, $coms_conect); ?>
<a href="<?= $navar_red['link'] ?>"
   class="flip-banner parallax margin-top-65"
   data-background="images/slider-bg-02.jpg" data-color="#f91942" data-color-opacity="0.85" data-img-width="2500"
   data-img-height="1666">
    <div class="flip-banner-content">
        <h2 class="flip-visible"><?= $navar_red['title'] ?></h2>
        <h2 class="flip-hidden"><?= $navar_red['text'] ?><i class="sl sl-icon-arrow-right"></i></h2>
    </div>
</a>
<!-- Flip banner / End -->


<? if ($defult_site == 'main') {
    include("new_template/hasan/" . 'blocks/footer.php4');
} else
    include("../new_template/hasan/" . '/blocks/footer.php4');
$dir = "rtl";
?> 
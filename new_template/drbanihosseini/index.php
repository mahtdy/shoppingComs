<? $_SESSION['add_contact_us_pm'] = 0; ?>
<? $call_us_text = get_tem_result($defult_site, $defult_lang, 'call_us_text', 'default', $coms_conect); ?>


<?
function limitWord($string, $limit)
{
    $words = explode(" ", $string);

    $output = implode(" ", array_splice($words, 0, $limit));
    return $output;
}

?>
<? if ($defult_site == 'main') {
    include("new_template/drbanihosseini/" . 'blocks/header.php4');
} else
    include("../new_template/drbanihosseini/" . '/blocks/header.php4');
$dir = "rtl";
$_SESSION['site'] = $site;
$_SESSION['la'] = $la;


$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
?>
<!--***********preloder**************-->
<? $preload = get_tem_result($site, $la, "preload", '', $coms_conect);
if ($preload['pic_adress'] == 1) {
    ?>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="H_neshane_hiden">
            <img class="H_style_img_preloader" src="<?= $preload['text'] ?>" alt="<?= $preload['title'] ?>">
        </div>
        <div class="container H_preloader_style_div">
            <h4 class="H_preloader_style"><?= $preload['title'] ?></h4>
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <script>
        $('.loader-section').css('background', '#<?= $preload['pic'] ?>');
        $('.H_preloader_style').css('color', '#<?= $preload['link'] ?>');
    </script><? } ?>
<!--***********End preloder**************-->

<main class="">
    <!-- slide show-->
    <div class="slider-container rev_slider_wrapper">
        <? $query = "SELECT * FROM new_slideshow where la='$defult_lang' and site='$defult_site' and
					start_date<=$now and finish_date>=$now order by id desc limit 0,30";
        $result = $coms_conect->query($query);
        $RS1 = $result->fetch_assoc(); ?>
        <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider
             data-plugin-options="{'delay':10000,'gridheight': <?= $RS1['height'] ?>}">
            <ul>
                <? $query = "SELECT * FROM new_slideshow where la='$defult_lang' and site='$defult_site' and
					start_date<=$now and finish_date>=$now order by id desc limit 0,30";
                $result = $coms_conect->query($query);
                $i = 1;
                while ($RS1 = $result->fetch_assoc()) { ?>
                <li data-transition="<?= $RS1['action_main'] ?>">
                    <div class="slotholder"
                         style=" height: 100%; ">
                        <!--Runtime Modification - Img tag is Still Available for SEO Goals in Source - <img src="img/slides/1.jpg" alt="" width="1920" height="580" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" class="defaultimg">-->
                        <div class="tp-bgimg defaultimg"
                             style=" background-size: cover; background-position: center center; width: 100%; height: 100%;"
                             src="<?= $RS1['slide_img1'] ?>">

                        </div>
                    </div>
                    <? if ($RS1['title'] > "") { ?>
                        <div class="tp-caption tp-resizeme "
                             data-x="['<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "right";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "center";
                             } else {
                                 echo "left";
                             } ?>','left','left','left']"
                             data-hoffset="<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "-400";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "400";
                             } else {
                                 echo "400";
                             } ?>"
                             data-y="center"
                             data-voffset="[-150,300,300,600]"
                             data-width="[400,300,300,600]"
                             data-transform_in="<?= $RS1['action_title'] ?>"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-start="500"
                             data-responsive_offset="on">
                            <div class="slide-content-box <? if ($RS1['pos_texts'] == 'راست') {
                                echo "H_right";
                            } elseif ($RS1['pos_texts'] == 'وسط') {
                                echo "H_center";
                            } else {
                                echo "H_right";
                            } ?>">
                                <h1 class="H_style_h1_slider"
                                    style="color: <?= '#' . $RS1['color_texts'] ?>;text-shadow: 0 1px 0 <?= '#' . $RS1['color_shadow'] ?>,
                                            0 0px 0 #c9c9c9,
                                            0 0px 0px rgba(0, 0, 0, 0.35),
                                            0 0px 0px rgba(0, 0, 0, .3);">
                                    <?= $RS1['title'] ?></h1>
                            </div>
                        </div>
                    <? } ?>
                    <? if ($RS1['text1'] > "") { ?>
                        <div class="tp-caption tp-resizeme "
                             data-x="['<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "right";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "center";
                             } else {
                                 echo "left";
                             } ?>','left','left','left']"
                             data-hoffset="<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "-400";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "400";
                             } else {
                                 echo "400";
                             } ?>"
                             data-y="center"
                             data-width="[400,300,200,100]"
                             data-voffset="-90"
                             data-transform_idle="o:1;"
                             data-transform_in="<?= $RS1['action_text1'] ?>"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-mask_in="x:[100%];y:150;s:inherit;e:inherit;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="1500">
                            <div class="slide-content-box <? if ($RS1['pos_texts'] == 'راست') {
                                echo "H_right";
                            } elseif ($RS1['pos_texts'] == 'وسط') {
                                echo "H_center";
                            } else {
                                echo "H_right";
                            } ?>">
                                <h2 class="H_style_h2_slider"
                                    style="color: <?= '#' . $RS1['color_texts'] ?>;text-shadow: 0 1px 0 <?= '#' . $RS1['color_shadow'] ?>,
                                            0 0px 0 #c9c9c9,
                                            0 0px 0px rgba(0, 0, 0, 0.35),
                                            0 0px 0px rgba(0, 0, 0, .3);">
                                    <?= $RS1['text1'] ?></h2>
                            </div>
                        </div>
                    <? } ?>
                    <? if ($RS1['text2'] > "") { ?>
                        <div class="tp-caption centered tp-resizeme"
                             data-x="['<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "right";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "center";
                             } else {
                                 echo "left";
                             } ?>','left','left','left']"
                             data-hoffset="<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "-400";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "400";
                             } else {
                                 echo "400";
                             } ?>"
                             data-y="center"
                             data-width="[400,300,200,100]"
                             data-voffset="-40"
                             data-transform_idle="o:1;"
                             data-transform_in="<?= $RS1['action_text2'] ?>"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="2300">
                            <div class="slide-content-box <? if ($RS1['pos_texts'] == 'راست') {
                                echo "H_right";
                            } elseif ($RS1['pos_texts'] == 'وسط') {
                                echo "H_center";
                            } else {
                                echo "H_right";
                            } ?>">
                                <h3 class="H_style_h3_slider"
                                    style="color: <?= '#' . $RS1['color_texts'] ?>;text-shadow: 0 1px 0 <?= '#' . $RS1['color_shadow'] ?>,
                                            0 0px 0 #c9c9c9,
                                            0 0px 0px rgba(0, 0, 0, 0.35),
                                            0 0px 0px rgba(0, 0, 0, .3);">
                                    <?= $RS1['text2'] ?></h3>
                            </div>
                        </div>
                    <? } ?>
                    <? if ($RS1['text3'] > "") { ?>
                        <div class="tp-caption centered tp-resizeme"
                             data-x="['<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "right";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "center";
                             } else {
                                 echo "left";
                             } ?>','left','left','left']"
                             data-hoffset="<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "-400";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "400";
                             } else {
                                 echo "400";
                             } ?>"
                             data-y="center"
                             data-width="[400,300,200,100]"
                             data-voffset="10"
                             data-transform_idle="o:1;"
                             data-transform_in="<?= $RS1['action_text3'] ?>"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="3100">
                            <div class="slide-content-box <? if ($RS1['pos_texts'] == 'راست') {
                                echo "H_right";
                            } elseif ($RS1['pos_texts'] == 'وسط') {
                                echo "H_center";
                            } else {
                                echo "H_right";
                            } ?>">
                                <h4 class="H_style_h4_slider"
                                    style="color: <?= '#' . $RS1['color_texts'] ?>;text-shadow: 0 1px 0 <?= '#' . $RS1['color_shadow'] ?>,
                                            0 0px 0 #c9c9c9,
                                            0 0px 0px rgba(0, 0, 0, 0.35),
                                            0 0px 0px rgba(0, 0, 0, .3);">
                                    <?= $RS1['text3'] ?></h4>
                            </div>
                        </div>
                    <? } ?>
                    <? if ($RS1['text4'] > "") { ?>
                        <div class="tp-caption centered tp-resizeme"
                             data-x="['<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "right";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "center";
                             } else {
                                 echo "left";
                             } ?>','left','left','left']"
                             data-hoffset="<? if ($RS1['pos_texts'] == 'راست') {
                                 echo "-400";
                             } elseif ($RS1['pos_texts'] == 'وسط') {
                                 echo "400";
                             } else {
                                 echo "400";
                             } ?>"
                             data-y="center"
                             data-width="[400,300,200,100]"
                             data-voffset="50"
                             data-transform_idle="o:1;"
                             data-transform_in="<?= $RS1['action_text4'] ?>"
                             data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             data-start="3900">
                            <div class="slide-content-box <? if ($RS1['pos_texts'] == 'راست') {
                                echo "H_right";
                            } elseif ($RS1['pos_texts'] == 'وسط') {
                                echo "H_center";
                            } else {
                                echo "H_right";
                            } ?>">
                                <h5 class="H_style_h5_slider"
                                    style="color: <?= '#' . $RS1['color_texts'] ?>; text-shadow: 0 1px 0 <?= '#' . $RS1['color_shadow'] ?>,
                                            0 0px 0 #c9c9c9,
                                            0 0px 0px rgba(0, 0, 0, 0.35),
                                            0 0px 0px rgba(0, 0, 0, .3);">
                                    <?= $RS1['text4'] ?></h5>
                            </div>
                        </div>
                    <? } ?>


                    <div class="tp-caption centered tp-resizeme"
                         data-x="['<? if ($RS1['pos_texts'] == 'راست') {
                             echo "right";
                         } elseif ($RS1['pos_texts'] == 'وسط') {
                             echo "center";
                         } else {
                             echo "left";
                         } ?>','left','left','left']"
                         data-hoffset="<? if ($RS1['pos_texts'] == 'راست') {
                             echo "-400";
                         } elseif ($RS1['pos_texts'] == 'وسط') {
                             echo "400";
                         } else {
                             echo "400";
                         } ?>"
                         data-y="center"
                         data-width="[400,300,200,100]"
                         data-voffset="110"
                         data-transform_idle="o:1;"
                         data-transform_in="<?= $RS1['action_buttons'] ?>"
                         data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                         data-splitin="none"
                         data-splitout="none"
                         data-responsive_offset="on"
                         data-start="5000">
                        <div class="slide-content-box <? if ($RS1['pos_texts'] == 'راست') {
                            echo "H_right";
                        } elseif ($RS1['pos_texts'] == 'وسط') {
                            echo "H_center";
                        } else {
                            echo "H_right";
                        } ?>">
                            <div class="button">
                                <a class="thm-btn our-solution H_style_but1" href="<?= $RS1['link'] ?>">
                                    <?= $RS1['button1'] ?></a>
                                <a class="thm-btn yellow-bg H_style_but2" href="<?= $RS1['link_button2'] ?>">
                                    <?= $RS1['button2'] ?></a>
                            </div>
                        </div>
                    </div>
                    </li><? } ?>
                <? $i++;
                ?>
            </ul>
        </div>
    </div>
    <!-- End slide show-->
    <div class="">
        <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m' and pages_id=2 and tem_name='drbanihosseini'";
        $result23 = $coms_conect->query($query23);
        $RS23 = $result23->fetch_assoc();
        //echo $query23;
        ?>
        <div class="col-md-<?=$RS23['right_block']?> ">
            <?if($RS23['right_block']>0){
                create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'drbanihosseini',$RS23['id'],'r',$coms_conect);
            }//exit;?>
        </div>
        <div class="col-md-<?=$RS23['center']?> H_p0">
            <?if($RS23['center']>0){
                create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'drbanihosseini',$RS23['id'],'c',$coms_conect);
            }?>
        </div>

        <div class="col-md-<?=$RS23['left_block']?>">
            <?if($RS23['left_block']>0){
                create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'drbanihosseini',$RS23['id'],'l',$coms_conect);
            }?>
        </div>
    </div>




</main>
<!--light box-->
<? $box_lightbox_header = get_tem_result($site, $la, "box_lightbox_header", '', $coms_conect);
if ($box_lightbox_header['pic_adress'] == 1) {
    ?>
        <div class="copyright-text">
            <p class="HM_center H_text-l">
<!--                <a id="show_light_box" class=" H_neshane scroll-to-top hidden-mobile visible" data-toggle="modal"-->
<!--                   data-target="#myModal"> <i> --><?//= $box_lightbox_header['text'] ?><!-- </i>&nbsp;-->
<!--                </a>-->
            <div id="light_box" class="H_modal ">

                <div class="modal-dialog H_fixed H_l25_t5">
                    <div class="modal-content H_pb40 ">
                        <div class="row H_mlr0">
                            <? if ($box_lightbox_header['title'] > "") {
                                ?>
                                <div class="col-md-12 center">
                                    <h3 class="H_mt12 mb-none"><?= $box_lightbox_header['title'] ?></h3>
                                    <div class="divider divider-primary divider-small divider-small-center ">
                                        <hr>
                                    </div>
                                </div>
                            <? } ?>
                            <button type="button" class="close H_style_close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <img id="waiting" src='/waiting.gif' style="display:none">
                        <div id="show_result" class="payoff-deck theme--secondary"></div>

                        <div class="row H_center_mt40">
                            <button type="button" id="next" class="glyphicon glyphicon-circle-arrow-right">
                            </button>
                            <button type="button" id="previous" class="glyphicon glyphicon-circle-arrow-left">
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            </p>
        </div>

    <script>
        $(document).ready(function () {
            $("#waiting").show();
            $("#show_result").empty();
            $.ajax({
                type: 'POST',
                url: '/New_members_ajax.php',
                data: "action=light_box&la=" + $("#active_lang").val() + "&site=" + $("#active_site").val() + "&secend_value=1",
                success: function (result) {

                    $("#waiting").hide();
                    $("#show_result").html(result);
                }
            });
        });
        $(document).ready(function () {
            $('#next').click(function () {
                var counter = parseInt($("#page_number").val());
                counter = counter + 3;
                $("#waiting").show();
                $("#show_result").empty();
                $.ajax({
                    type: 'POST',
                    url: '/New_members_ajax.php',
                    data: "action=light_box&la=" + $("#active_lang").val() + "&site=" + $("#active_site").val() + "&secend_value=" + counter,
                    success: function (result) {
                        $("#waiting").hide();
                        $("#show_result").html(result);
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#previous').click(function () {
                var counter = parseInt($("#page_number").val());
                counter = counter - 3;
                $("#waiting").show();
                $("#show_result").empty();
                $.ajax({
                    type: 'POST',
                    url: '/New_members_ajax.php',
                    data: "action=light_box&la=" + $("#active_lang").val() + "&site=" + $("#active_site").val() + "&secend_value=" + counter,
                    success: function (result) {

                        $("#waiting").hide();
                        $("#show_result").html(result);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $(document).ready(function () {
                $('#light_box').lightbox_me({
                    overlaySpeed: 400,
                    lightboxSpeed: 'low',
                    closeClick: true,
                    closeEsc: true,
                    showOverlay: true,
                    centered: true,
                    overlayCSS: {
                        'background-color': '#000',
                        opacity: 0.8
                    }
                });
            });
            $('#close').click(function () {
                $('#light_box').trigger('close');
            });
        });
    </script>
<? } ?>
<!--End light box-->
<? if ($defult_site == 'main') {
    include("new_template/drbanihosseini/" . 'blocks/footer.php4');
} else
    include("../new_template/drbanihosseini/" . '/blocks/footer.php4');
$dir = "rtl";
?>



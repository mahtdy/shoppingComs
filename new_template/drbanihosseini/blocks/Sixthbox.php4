<!--=======================================box 6 ======================-->
<?
$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$box6_header = get_tem_result($defult_site, $defult_lang, "box6_header", 'drbanihosseini', $coms_conect);
if ($box6_header['pic_adress'] == 1) {
    ?>
    <section class="divider parallax layer-overlay overlay-dark-5 parallax1 parallax-02 H_h100 H_m0 H_z0"
             style="background-image:url(<?= $box6_header['text'] ?>)">
        <div class="container pt-170 pb-170 pt-sm-100 pb-sm-100">
            <div class="section-title text-center">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    </div>
                </div>
            </div>
            <div class="section-content text-center">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="lifestyle" style="background-image: url(/source/comsroot/drbanihosseini/p8.jpg); " >
        <div class="container pb-0 pt-sm-50">
            <div class="bg-lighter bg-img-left-top sm-no-bg mt-sm-0"

                 style="background-image: url(<?= $box6_header["link"] ?>);margin-top: -350px; ">
                <div class="row H_mb0">
                    <div class="col-md-6 col-md-offset-1 p-sm-40 pt-sm-0 pb-sm-10 pt-50">
                        <h2 class="title text-uppercase H_mb15"><span
                                    class="text-black font-weight-300"><?= $box6_header['title'] ?></span></h2>
                        <p><?= $box6_header['pic'] ?> </p>


                       <? $count1_third_choice_box6 = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'third_choice_box6%' ", $coms_conect);

                                                    for ($x = 1; $x <= $count1_third_choice_box6; $x++) {
                                                        $third_choice_box6 = get_tem_result($defult_site, $defult_lang, "third_choice_box6$x", 'drbanihosseini', $coms_conect);

                                                        if ($third_choice_box6['text'] > "") {?>
                                                            <div class="icon-box  flip sm-text-center p-0 mt-50 mb-45 mt-sm-30">
                                                                <a href="<?=$third_choice_box6['link']?>" class="icon mt-20 mb-30 mr-30 ml-30 pull-left flip sm-pull-none bg-theme-colored rotate">
                                                                    <img class="H_hw5040 H_rotate445" src="<?=$third_choice_box6['pic_adress']?>" alt="<?=$third_choice_box6['text']?>">
                                                                    <i class="flaticon-spa-flowers-on-human-feet text-white font-36 no-rotate"></i>
                                                                </a>
                                                                <div class="H_right">
                                                                    <h5 class=" mt-15 mb-10"><strong><?=$third_choice_box6['text']?></strong></h5>
                                                                    <p class=""><?=$third_choice_box6['title']?> </p>
                                                                </div>
                                                            </div>
                                <? }} ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? } ?>

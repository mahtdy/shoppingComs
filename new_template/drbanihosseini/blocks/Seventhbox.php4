<!--=======================================box 7 ======================-->
<?
$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$box7_header = get_tem_result($defult_site, $defult_lang, "box7_header", 'drbanihosseini', $coms_conect);
if ($box7_header['pic_adress'] == 1) {
    ?>
    <?$third_choice_box7 = get_tem_result($defult_site, $defult_lang, "third_choice_box7", 'drbanihosseini', $coms_conect);

    if ($third_choice_box7['text'] > "") {?>
        <section class="listar-themeparallax parallax1 parallax-02" style="background-image:url(<?= $third_choice_box7["pic_adress"] ?>)">
            <div class="listar-parallaxcolor listar-parallaxaddlisting">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-push-2 col-md-8 col-lg-push-2 col-lg-8">
                            <div class="listar-addlisting H_center">
                                <h2><?= $third_choice_box7["title"] ?></h2>
                                <a class="listar-btn listar-btngreen" href="<?= $third_choice_box7["link"] ?>">
                                    <i class="fa fa-plus"></i>
                                    <span><?= $third_choice_box7["text"] ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?}?>
<? } ?>
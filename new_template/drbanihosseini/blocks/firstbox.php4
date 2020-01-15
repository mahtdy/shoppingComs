<!--=======================================box 1 ======================-->
<?
$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$box1_header = get_tem_result($defult_site, $defult_lang, "box1_header", 'drbanihosseini', $coms_conect);
if ($box1_header['pic_adress'] == 1) {?>
    <section class="listar-sectionspace listar-haslayout">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="listar-sectionhead">
                        <div class="listar-sectiontitle">
                            <h2><?= $box1_header['title'] ?></h2>
                        </div>
                        <div class="listar-description">
                            <p><?= $box1_header['text'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid H_p0">

                <div class="owl-carousel H_owl-carousel_box1 col-xs-12 col-sm-12 col-md-12 col-lg-12 H_ltr " >

                   <? $count1_first_choice_box1 = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'first_choice_box1%' ", $coms_conect);
                    $count1_second_choice_box1 = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'second_choice_box1%' ", $coms_conect);
                    $count1_third_choice_box1 = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'third_choice_box1%' ", $coms_conect);
                    if ($count1_first_choice_box1 > 0) {
                        for ($j = 1;
                             $j <= $count1_first_choice_box1;
                             $j++) {

                            $first_choice_box1 = get_tem_result($defult_site, $defult_lang, "first_choice_box1$j", 'drbanihosseini', $coms_conect);
                            if ($first_choice_box1['pic_adress'] > "") {

                                $cat_id1 = $first_choice_box1["pic"];
                                $Property = $first_choice_box1["text"];
                                $numb = $first_choice_box1["pic_adress"];
                                // echo $numb;

                                if ($Property == 0)
                                    $x = 'a.id';
                                if ($Property == 1)
                                    $x = 'a.view';
                                if ($Property == 2) {
                                    $count_most_comment = ',count(c.id) as count';
                                    $madul_id = ',madul_id';
                                    $if_most_comment = 'and a.status=1 and c.status=1 and c.type=1 and a.id=c.madul_id';
                                    $x = 'count';
                                }

                                $table_name = get_result("select table_name from new_modules where id={$first_choice_box1['link']}", $coms_conect);
                                $link_name = get_result("select link from new_modules where id={$first_choice_box1['link']}", $coms_conect);


                                $name = '';
                                if ($first_choice_box1['link'] != 9)
                                    $name = 'name';
                                if ($first_choice_box1['link'] == 7)
                                    $name = 'title';
                                $deatils = '';
                                if ($first_choice_box1['link'] == 9)
                                    $deatils = ',deatils';
                                $name = 'title';
                                $duration = '';
                                if ($first_choice_box1['link'] == 8)
                                    $duration = ',duration,deatils';
                                if ($first_choice_box1['link'] == 1 || $first_choice_box1['link'] == 11)
                                    $duration = ',abstract';


                                $query = "select title ,a.$name $duration $deatils ,a.id,la,site $count_most_comment $madul_id from $table_name a , new_modules_catogory b,new_madules_comment c  where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$first_choice_box1['link']} and  a.id=b.page_id and b.cat_id='$cat_id1' $if_most_comment
                        GROUP BY a.id $madul_id
                        order by $x desc
                        limit 0,$numb";
                                //echo $query;
                                $module_type = $first_choice_box1['link'];
                                $result = $coms_conect->query($query);

                                $module_type = $first_choice_box1['link'];
                                $counter = 0;
                                while ($RS54 = $result->fetch_assoc()) {

                                    $sql1w1 = "select adress from new_file_path where type={$first_choice_box1['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                    // echo $sql1w1;

                                    $result1q = $coms_conect->query($sql1w1);
                                    $roww1 = $result1q->fetch_assoc();
                                    $module_url = '';
                                    if ($first_choice_box1['title'] == 11 || $first_choice_box1['title'] == 1)
                                        $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                    else
                                        $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                    if ($first_choice_box1['link'] == 8 || $first_choice_box1['link'] == 9)
                                        $RS54['kholase'] = $RS54['deatils'];
                                    if ($first_choice_box1['link'] == 1 || $first_choice_box1['link'] == 11)
                                        $RS54['kholase'] = $RS54['abstract'];

                                    if (($counter % 3) == 0) {
                                        $counter++;
                                        ?>
                                        <div class="owl-item cloned " >
                                            <div class="item">
                                                <div class="listar-themepost listar-categorypost H_m0">
                                                    <figure class="listar-featuredimg">
                                                        <a href="<?= $module_url ?>">
                                                            <?
                                                            if ($first_choice_box1['link'] == 8) { ?>
                                                                <img title="<?= $RS54['title'] ?>"
                                                                     src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $first_choice_box1['title']) ?>"
                                                                     class="H_hw430_325 HM_hw330"
                                                                     alt="<?= $RS54['title'] ?>">
                                                                <span class="play-button"></span>
                                                                <?
                                                            } else { ?>
                                                                <img title="<?= $RS54['title'] ?>"
                                                                     src="<?= $roww1['adress'] ?>"
                                                                     class="H_hw430_325 HM_hw330"
                                                                     alt="<?= $RS54['title'] ?>">
                                                                <?
                                                            } ?>
                                                            <div class="listar-contentbox">
                                                                <div class="listar-postcontent">
                                                                                        <span class="listar-categoryicon listar-flip"><i
                                                                                                    class="icon-healthfitness"></i></span>
                                                                    <h3 class="H_ellipsis"><?= $RS54['title'] ?></h3>
                                                                    <h5 class="H_ellipsis"><?= $RS54['kholase'] ?></h5>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>

                                        <?
                                    } else {

                                        $counter++;
                                        $secondCount = $counter - 2;

                                        if ($secondCount % 3 == 0)
                                            echo '  <div class="owl-item cloned" ><div class="item">';
                                        ?>


                                        <div class="listar-themepost listar-categorypost ">

                                            <figure class="listar-featuredimg">
                                                <a href="<?= $module_url ?>">
                                                    <?
                                                    if ($first_choice_box1['link'] == 8) { ?>
                                                        <img title="<?= $RS54['title'] ?>"
                                                             src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $first_choice_box1['title']) ?>"
                                                             class="H_h202 HM_hw330"
                                                             alt="<?= $RS54['title'] ?>">
                                                        <span class="play-button"></span>
                                                        <?
                                                    } else { ?>
                                                        <img title="<?= $RS54['title'] ?>"
                                                             src="<?= $roww1['adress'] ?>"
                                                             class="H_h202 HM_hw330"
                                                             alt="<?= $RS54['title'] ?>"
                                                        >
                                                        <?
                                                    } ?>
                                                    <div class="listar-contentbox">
                                                        <div class="listar-postcontent">
                                                                                        <span class="listar-categoryicon listar-flip"><img
                                                                                                    src="" alt=""></span>
                                                            <h3 class="H_ellipsis"><?= $RS54['title'] ?></h3>
                                                            <h5 class="H_ellipsis"><?= $RS54['kholase'] ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </figure>
                                        </div>


                                        <? $ThirdCount = $counter - 3;
                                        if ($ThirdCount % 3 == 0)
                                            echo '</div></div>';


                                    }


                                 }
                            }
                        }
                    }
                    ?>

                    <?
                    if ($count1_second_choice_box1 > 0) {
                        for ($j = 1; $j <= $count1_second_choice_box1; $j++) {

                            $second_choice_box1 = get_tem_result($defult_site, $defult_lang, "second_choice_box1$j", 'drbanihosseini', $coms_conect);
                            if ($second_choice_box1['pic_adress'] > "") {

                                $cat_id2 = $second_choice_box1["pic"];
                                $Property2 = $second_choice_box1["text"];
                                //echo $Property2;
                                $numb2 = $second_choice_box1["pic_adress"];
                                //echo $numb2;

                                $table_name = get_result("select table_name from new_modules where id={$second_choice_box1['link']}", $coms_conect);
                                $link_name = get_result("select link from new_modules where id={$second_choice_box1['link']}", $coms_conect);

                                $name = '';
                                if ($second_choice_box1['link'] != 9)
                                    $name = 'name';
                                if ($second_choice_box1['link'] == 7)
                                    $name = 'title';
                                $deatils = '';
                                if ($second_choice_box1['link'] == 9)
                                    $deatils = ',deatils';
                                $name = 'title';
                                $duration = '';
                                if ($second_choice_box1['link'] == 8)
                                    $duration = ',duration,deatils';
                                if ($second_choice_box1['link'] == 1 || $second_choice_box1['link'] == 11)
                                    $duration = ',abstract';


                                $query = "select title ,a.$name $duration $deatils ,a.id,la,site from $table_name a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$second_choice_box1['link']} and a.id='$numb2'and b.page_id='$numb2' and   a.id=b.page_id and b.cat_id='$cat_id2'

                        limit 0,1";
                                //echo $query;
                                $module_type = $second_choice_box1['link'];
                                $result = $coms_conect->query($query);
                                $module_type = $second_choice_box1['link'];

                              $RS54 = $result->fetch_assoc();

                                    $sql1w1 = "select adress from new_file_path where type={$second_choice_box1['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                    // echo $sql1w1;

                                    $result1q = $coms_conect->query($sql1w1);
                                    $roww1 = $result1q->fetch_assoc();
                                    $module_url = '';
                                    if ($second_choice_box1['title'] == 11 || $second_choice_box1['title'] == 1)
                                        $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                    else
                                        $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                    if ($second_choice_box1['link'] == 8 || $second_choice_box1['link'] == 9)
                                        $RS54['kholase'] = $RS54['deatils'];
                                    if ($second_choice_box1['link'] == 1 || $second_choice_box1['link'] == 11)
                                        $RS54['kholase'] = $RS54['abstract'];
                                    if ($second_choice_box1['link'] == 6)
                                        $RS54['kholase'] = $RS54['description'];


                                    if (($counter % 3) == 0) {
                                    $counter++;
                                    ?>
                                    <div class="owl-item cloned " >
                                        <div class="item">
                                            <div class="listar-themepost listar-categorypost H_m0">
                                                <figure class="listar-featuredimg">
                                                    <a href="<?= $module_url ?>">
                                                        <?
                                                        if ($second_choice_box1['link'] == 8) { ?>
                                                            <img title="<?= $RS54['title'] ?>"
                                                                 src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $second_choice_box1['title']) ?>"
                                                                 class="H_hw430_325 HM_hw330"
                                                                 alt="<?= $RS54['title'] ?>">
                                                            <span class="play-button"></span>
                                                            <?
                                                        } else { ?>
                                                            <img title="<?= $RS54['title'] ?>"
                                                                 src="<?= $roww1['adress'] ?>"
                                                                 class="H_hw430_325 HM_hw330"
                                                                 alt="<?= $RS54['title'] ?>">
                                                            <?
                                                        } ?>
                                                        <div class="listar-contentbox">
                                                            <div class="listar-postcontent">
                                                                                        <span class="listar-categoryicon listar-flip"><i
                                                                                                    class="icon-healthfitness"></i></span>
                                                                <h3 class="H_ellipsis"><?= $RS54['title'] ?></h3>
                                                                <h5 class="H_ellipsis"><?= $RS54['kholase'] ?></h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>

                                    <?
                                } else {

                                        $counter++;
                                        $secondCount = $counter - 2;

                                        if ($secondCount % 3 == 0)
                                            echo '  <div class="owl-item cloned" ><div class="item">';
                                        ?>


                                        <div class="listar-themepost listar-categorypost ">

                                            <figure class="listar-featuredimg">
                                                <a href="<?= $module_url ?>">
                                                    <?
                                                    if ($second_choice_box1['link'] == 8) { ?>
                                                        <img title="<?= $RS54['title'] ?>"
                                                             src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $second_choice_box1['title']) ?>"
                                                             class="H_h202 HM_hw330"
                                                             alt="<?= $RS54['title'] ?>">
                                                        <span class="play-button"></span>
                                                        <?
                                                    } else { ?>
                                                        <img title="<?= $RS54['title'] ?>"
                                                             src="<?= $roww1['adress'] ?>"
                                                             class="H_h202 HM_hw330"
                                                             alt="<?= $RS54['title'] ?>"
                                                        >
                                                        <?
                                                    } ?>
                                                    <div class="listar-contentbox">
                                                        <div class="listar-postcontent">
                                                                                        <span class="listar-categoryicon listar-flip"><i
                                                                                                    class="icon-entertainment"></i></span>
                                                            <h3 class="H_ellipsis"><?= $RS54['title'] ?></h3>
                                                            <h5 class="H_ellipsis"><?= $RS54['kholase'] ?></h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </figure>
                                        </div>


                                        <? $ThirdCount = $counter - 3;
                                        if ($ThirdCount % 3 == 0)
                                            echo '</div></div>';

                                    }
                                }
                            }
                    }
                    if ($count1_third_choice_box1 > 0) {
                        for ($x = 1; $x <= $count1_third_choice_box1; $x++) {
                            $third_choice_box1 = get_tem_result($defult_site, $defult_lang, "third_choice_box1$x", 'drbanihosseini', $coms_conect);
                            if ($third_choice_box1['title'] > "") {

                                if (($counter % 3) == 0) {
                                    $counter++;
                                    ?>
                                    <div class="owl-item cloned " >
                                        <div class="item">
                                            <div class="listar-themepost listar-categorypost H_m0">
                                                <figure class="listar-featuredimg">
                                                    <a href="<?=$third_choice_box1['link']?>">

                                                            <img title="<?= $third_choice_box1["text"] ?>"
                                                                 src="<?= $third_choice_box1["pic_adress"] ?>"
                                                                 class="H_hw430_325 HM_hw330"
                                                                 alt="<?= $third_choice_box1["text"] ?>">

                                                        <div class="listar-contentbox">
                                                            <div class="listar-postcontent">
                                                                                        <span class="listar-categoryicon listar-flip"><i
                                                                                                    class="icon-healthfitness"></i></span>
                                                                <h3 class="H_ellipsis"><?= $third_choice_box1["text"] ?></h3>
                                                                <h5 class="H_ellipsis"><?= $third_choice_box1["title"]?></h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>

                                    <?
                                } else {

                                    $counter++;
                                    $secondCount = $counter - 2;

                                    if ($secondCount % 3 == 0)
                                        echo '  <div class="owl-item cloned" ><div class="item">';
                                    ?>


                                    <div class="listar-themepost listar-categorypost ">

                                        <figure class="listar-featuredimg">
                                            <a href="<?= $module_url ?>">

                                                    <img title="<?= $third_choice_box1["text"]?>"
                                                         src="<?= $third_choice_box1["pic_adress"] ?>"
                                                         class="H_h202 HM_hw330"
                                                         alt="<?= $third_choice_box1["text"]?>">

                                                <div class="listar-contentbox">
                                                    <div class="listar-postcontent">
                                                                                        <span class="listar-categoryicon listar-flip"><i
                                                                                                    class="icon-entertainment"></i></span>
                                                        <h3 class="H_ellipsis"><?= $third_choice_box1["text"]?></h3>
                                                        <h5 class="H_ellipsis"><?= $third_choice_box1["title"]?></h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </figure>
                                    </div>


                                    <? $ThirdCount = $counter - 3;
                                    if ($ThirdCount % 3 == 0)
                                        echo '</div></div>';
                             }}
                        }
                    } ?>
                </div>

        </div>


    </section>
<? } ?>
<script>

    $(document).ready(function () {
        var owl = $(".H_owl-carousel_box1");
        owl.owlCarousel({

            margin: 30,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 4
                },
                1900: {
                    items: 4,
                    dots: true
                }
            }

        });
    });
</script>

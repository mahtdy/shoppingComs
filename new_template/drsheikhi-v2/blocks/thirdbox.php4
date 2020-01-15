<!--=======================================box3 ======================-->
<?
$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$boxThree = get_tem_result($site, $la, "boxThree", 'drsheikhi-v2', $coms_conect);
$count1_tab_name = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='drsheikhi-v2' and name like 'tab_name%' ", $coms_conect);
if ($boxThree['pic_adress'] == 1) {
?>

<section class="box3 best-offers gray">
    <div class="container">
        <header class="section-header">
            <h2 class="title"><?= $boxThree['title'] ?></h2>
        </header>
        <ul class=" nav nav-tabs" id="Tab_box3" role="tablist">
            <?

            for ($x = 1; $x <= $count1_tab_name; $x++) {
                $tab_name = get_tem_result($site, $la, "tab_name$x", 'drsheikhi-v2', $coms_conect);
                if ($tab_name['text'] > "") {
                    ?>
            <li class="nav-item <?if($x==1){echo 'active';}?>">
                <a class="nav-link "  data-toggle="tab" href="#btn_tab<?=$x?>" role="tab"
                   aria-selected="true"><i class="fa fa-ellipsis-h hidden-xs hidden-sm" aria-hidden="true"></i><?= $tab_name["text"] ?></a>
            </li>
            <?}}?>
        </ul>
        <div class="tab-content" id="Tab_con_box3">
            <?for ($y = 1; $y <= $count1_tab_name; $y++) {
                $img_address370 = '/yep_theme/img/content_img/370x250/370x250-';
                $Onvan_tabs = get_tem_result($site, $la, "Onvan_tabs$y", 'drsheikhi-v2', $coms_conect);
                $count_first_choice_BoxThree_Tab = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drsheikhi-v2' and name like 'first_choice_BoxThree_Tab$y%' ", $coms_conect);
                $count_second_choice_BoxThree_Tab = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drsheikhi-v2' and name like 'second_choice_BoxThree_Tab$y%' ", $coms_conect);
                $count_third_choice_BoxThree_Tab = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drsheikhi-v2' and name like 'third_choice_BoxThree_Tab$y%' ", $coms_conect);

                $ValSelectActive_BoxThree_Tab = get_tem_result($defult_site, $defult_lang, "ValSelectActive_BoxThree_Tab$y", 'drsheikhi-v2', $coms_conect);
                ?>
            <div class="tab-pane fade <?if($y==1){echo 'active in';}?>" id="btn_tab<?=$y?>" role="tabpanel" >
                <div class="banner">
                    <img class="img-fluid" src="<?=$Onvan_tabs["pic_adress"]?>" alt="<?= $Onvan_tabs["title"] ?>">

                    <div class="overlay container-fluid">
                        <div class="d-flex row ">
                            <div class="col-4">
                                <h3 class="title"><?= $Onvan_tabs["title"] ?></h3>
                                <div class="summary"><?=$Onvan_tabs["text"] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel box3_slide">
                    <?
                    if ($ValSelectActive_BoxThree_Tab["title"] == 1) {

                    for ($j = 1;
                    $j <= $count_first_choice_BoxThree_Tab;
                    $j++) {
                    $first_choice_BoxThree_Tab = get_tem_result($defult_site, $defult_lang, "first_choice_BoxThree_Tab$y$j", 'drsheikhi-v2', $coms_conect);
                    if ($first_choice_BoxThree_Tab['pic_adress'] > "") {


                        $cat_id1 = $first_choice_BoxThree_Tab["pic"];
                        if ($cat_id1!=0){
                            $all_cat="and b.cat_id='$cat_id1'";
                        }
                        $Property = $first_choice_BoxThree_Tab["text"];
                        $numb = $first_choice_BoxThree_Tab["pic_adress"];

                        if ($Property == 0)
                            $x = 'a.id';
                        if ($Property == 1)
                            $x = 'a.view';
                        if ($Property == 2) {
                            $count_most_comment = ',count(c.id) as count';
                            $madul_id = ',madul_id';
                            $if_most_comment = 'and a.status=1 and c.status=1 and c.type=1 and a.id=c.madul_id';
                            $x = 'count';
                            $table_comment_name = ',new_madules_comment c';
                        }

                        $table_name = get_result("select table_name from new_modules where id={$first_choice_BoxThree_Tab['link']}", $coms_conect);
                        $link_name = get_result("select link from new_modules where id={$first_choice_BoxThree_Tab['link']}", $coms_conect);


                        $name = '';
                        if ($first_choice_BoxThree_Tab['link'] != 9)
                            $name = 'name';
                        if ($first_choice_BoxThree_Tab['link'] == 7)
                            $name = 'title';
                        $deatils = '';
                        if ($first_choice_BoxThree_Tab['link'] == 9) {
                            $deatils = ',deatils';
                            $name = 'title';
                            $duration = '';
                            $is_special = '';
                        }
                        if ($first_choice_BoxThree_Tab['link'] == 8) {
                            $duration = ',duration,deatils';
                            $is_special = '';
                        }
                        if ($first_choice_BoxThree_Tab['link'] == 1 || $first_choice_BoxThree_Tab['link'] == 11) {
                            $is_special = ',is_special';
                            $duration = ',abstract';
                        }


                        $query = "select title ,a.$name $duration $deatils ,a.id,date,la,site $count_most_comment $madul_id $is_special from $table_name a , new_modules_catogory b $table_comment_name  where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$first_choice_BoxThree_Tab['link']} and  a.id=b.page_id $all_cat $if_most_comment
                        GROUP BY a.id $madul_id
                        order by $x desc
                        limit 0,$numb";
                        //echo $query;
                        $module_type = $first_choice_BoxThree_Tab['link'];
                        $result = $coms_conect->query($query);

                        $module_type = $first_choice_BoxThree_Tab['link'];


                        while ($RS54 = $result->fetch_assoc()) {
                            $sql1w1 = "select adress from new_file_path where type={$first_choice_BoxThree_Tab['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                            // echo $sql1w1;

                            $result1q = $coms_conect->query($sql1w1);
                            $roww1 = $result1q->fetch_assoc();
                            $module_url = '';
                            if ($first_choice_BoxThree_Tab['title'] == 11 || $first_choice_BoxThree_Tab['title'] == 1)
                                $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                            else
                                $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                            if ($first_choice_BoxThree_Tab['link'] == 8 || $first_choice_BoxThree_Tab['link'] == 9)
                                $RS54['kholase'] = $RS54['deatils'];
                            if ($first_choice_BoxThree_Tab['link'] == 1 || $first_choice_BoxThree_Tab['link'] == 11)
                                $RS54['kholase'] = $RS54['abstract'];

                            preg_match('/[a-zA-z0-9-_ ()]{1,}(.png|.jpg|.jpeg|.gif)$/i', $roww1['adress'], $match);
                            $name_match = $match[0];
                            $first_choice_img = $img_address370 . $name_match;
                            ?>
                        <div class="subservice">
                            <a class="pic" href="<?= $module_url ?>">
                                <?
                                if ($first_choice_BoxThree_Tab['link'] == 8) { ?>
                                    <img width="370" height="250" title="<?= $RS54['title'] ?>"
                                         data-src="<?= get_modual_pic_address($first_choice_img, $RS54['site'], '', $first_choice_BoxThree_Tab['title']) ?>"
                                         class="owl-lazy img-fluid lozad"
                                         alt="<?= $RS54['title'] ?>">
                                    <span class="play-button"><i class="fa fa-play p10"></i></span>
                                    <span class="time_video"><?=$RS54['duration']?></span>
                                    <?
                                } else { ?>
                                    <img width="370" height="250" title="<?= $RS54['title'] ?>"
                                         data-src="<?= $first_choice_img?>"
                                         class="owl-lazy img-fluid lozad"
                                         alt="<?= $RS54['title'] ?>">
                                    <?
                                } ?>

                            </a>

                            <a class="details" href="<?= $module_url ?>">
                                <h3 class="block-ellipsis name"><?= $RS54['title'] ?></h3>
                            </a>
                        </div>
                            <?
                        }
                    }
                    }
                    }
                    if ($ValSelectActive_BoxThree_Tab["title"] == 2) {
                    for ($j = 1;
                    $j <= $count_second_choice_BoxThree_Tab;
                    $j++) {
                    $second_choice_BoxThree_Tab = get_tem_result($defult_site, $defult_lang, "second_choice_BoxThree_Tab$y$j", 'drsheikhi-v2', $coms_conect);
                    if ($second_choice_BoxThree_Tab['pic_adress'] > "") {

                    $cat_id2 = $second_choice_BoxThree_Tab["pic"];
                    $Property2 = $second_choice_BoxThree_Tab["text"];
                    //echo $Property2;
                    $numb2 = $second_choice_BoxThree_Tab["pic_adress"];
                    //echo $numb2;

                    $table_name = get_result("select table_name from new_modules where id={$second_choice_BoxThree_Tab['link']}", $coms_conect);
                    $link_name = get_result("select link from new_modules where id={$second_choice_BoxThree_Tab['link']}", $coms_conect);

                    $name = '';
                    if ($second_choice_BoxThree_Tab['link'] != 9)
                        $name = 'name';
                    if ($second_choice_BoxThree_Tab['link'] == 7)
                        $name = 'title';
                    $deatils = '';
                    if ($second_choice_BoxThree_Tab['link'] == 9) {
                        $deatils = ',deatils';
                        $name = 'title';
                        $duration = '';
                        $is_special = '';
                    }
                    if ($second_choice_BoxThree_Tab['link'] == 8) {
                        $duration = ',duration,deatils';
                        $is_special = '';
                    }
                    if ($second_choice_BoxThree_Tab['link'] == 1 || $second_choice_BoxThree_Tab['link'] == 11) {
                        $duration = ',abstract';
                        $is_special = ',is_special';
                    }


                    $query = "select title ,a.$name $duration $deatils ,a.id,date,la,site $is_special from $table_name a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$second_choice_BoxThree_Tab['link']} and a.id='$numb2'and b.page_id='$numb2' and   a.id=b.page_id and b.cat_id='$cat_id2'

                        limit 0,1";
                    // echo $query;
                    $module_type = $second_choice_BoxThree_Tab['link'];
                    $result = $coms_conect->query($query);

                    $module_type = $second_choice_BoxThree_Tab['link'];


                    while ($RS54 = $result->fetch_assoc()) {
                    $sql1w1 = "select adress from new_file_path where type={$second_choice_BoxThree_Tab['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                    // echo $sql1w1;

                    $result1q = $coms_conect->query($sql1w1);
                    $roww1 = $result1q->fetch_assoc();
                    $module_url = '';
                    if ($second_choice_BoxThree_Tab['title'] == 11 || $second_choice_BoxThree_Tab['title'] == 1)
                        $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                    else
                        $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                    if ($second_choice_BoxThree_Tab['link'] == 8 || $second_choice_BoxThree_Tab['link'] == 9)
                        $RS54['kholase'] = $RS54['deatils'];
                    if ($second_choice_BoxThree_Tab['link'] == 1 || $second_choice_BoxThree_Tab['link'] == 11)
                        $RS54['kholase'] = $RS54['abstract'];
                    if ($second_choice_BoxThree_Tab['link'] == 6)
                        $RS54['kholase'] = $RS54['description'];

                    preg_match('/[a-zA-z0-9-_ ()]{1,}(.png|.jpg|.jpeg|.gif)$/i', $roww1['adress'], $match);
                    $name_match = $match[0];
                    $second_choice_img = $img_address370 . $name_match;
                    ?>
                        <div class="subservice">
                            <a class="pic" href="<?= $module_url ?>">
                                <?
                                if ($second_choice_BoxThree_Tab['link'] == 8) { ?>
                                    <img width="370" height="250" title="<?= $RS54['title'] ?>"
                                         data-src="<?= get_modual_pic_address($second_choice_img, $RS54['site'], '', $second_choice_BoxThree_Tab['title']) ?>"
                                         class="owl-lazy img-fluid lozad"
                                         alt="<?= $RS54['title'] ?>">
                                    <span class="play-button "><i
                                                class="fa fa-play p10"></i></span>
                                    <span class="time_video"><?=$RS54['duration']?></span>
                                    <?
                                } else { ?>
                                    <img width="370" height="250" title="<?= $RS54['title'] ?>"
                                         data-src="<?= $second_choice_img?>"
                                         class="owl-lazy img-fluid lozad"
                                         alt="<?= $RS54['title'] ?>">
                                    <?
                                } ?>

                            </a>

                            <a class="details" href="<?= $module_url ?>">
                                <h3 class="block-ellipsis name"><?= $RS54['title'] ?></h3>
                            </a>
                        </div>
                        <?
                    }
                    }
                    }
                    }
                    if ($ValSelectActive_BoxThree_Tab["title"] == 3) {
                        for ($x = 1; $x <= $count_third_choice_BoxThree_Tab; $x++) {
                            $third_choice_BoxThree_Tab = get_tem_result($defult_site, $defult_lang, "third_choice_BoxThree_Tab$y$x", 'drsheikhi-v2', $coms_conect);
                            if ($third_choice_BoxThree_Tab['title'] > "") {
                                ?>
                                <div class="subservice">
                                    <a class="pic" href="<?= $third_choice_BoxThree_Tab["link"] ?>">


                                            <img width="370" height="250" title="<?= $third_choice_BoxThree_Tab["title"] ?>"
                                                 data-src="<?= $third_choice_BoxThree_Tab["pic_adress"] ?>"
                                                 class="owl-lazy img-fluid lozad"
                                                 alt="<?= $third_choice_BoxThree_Tab["title"] ?>">
                                    </a>

                                    <a class="details" href="<?= $third_choice_BoxThree_Tab["link"] ?>">
                                        <h3 class="block-ellipsis name"><?= $third_choice_BoxThree_Tab["title"] ?></h3>
                                    </a>
                                </div>
                            <? }
                        }
                    } ?>


                </div>
            </div>
            <?}?>

        </div>

    </div>
</section>
<?}?>



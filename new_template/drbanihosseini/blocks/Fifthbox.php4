
<!--=======================================box 5=====================-->
<?
$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$box5_drbanihosseini_header = get_tem_result($defult_site, $defult_lang, "box5_drbanihosseini_header", 'drbanihosseini', $coms_conect);
if ($box5_drbanihosseini_header['pic_adress'] == 1) {
    ?>
    <section class="listar-haslayout">
            <?
            $count1_first_choice_box5_drbanihosseini = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'first_choice_box5_drbanihosseini%' ", $coms_conect);
            $count1_second_choice_box5_drbanihosseini = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'second_choice_box5_drbanihosseini%' ", $coms_conect);
            $count1_third_choice_box5_drbanihosseini = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'third_choice_box5_drbanihosseini%' ", $coms_conect);

            if ($count1_first_choice_box5_drbanihosseini > 0) {

                for ($j = 1; $j <= $count1_first_choice_box5_drbanihosseini; $j++) {
                    $first_choice_box5_drbanihosseini = get_tem_result($defult_site, $defult_lang, "first_choice_box5_drbanihosseini$j", 'drbanihosseini', $coms_conect);
                    if ($first_choice_box5_drbanihosseini['pic_adress'] > "") {

                        $cat_id1 = $first_choice_box5_drbanihosseini["pic"];
                        $Property = $first_choice_box5_drbanihosseini["text"];
                        $numb = $first_choice_box5_drbanihosseini["pic_adress"];

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

                        $table_name = get_result("select table_name from new_modules where id={$first_choice_box5_drbanihosseini['link']}", $coms_conect);
                        $link_name = get_result("select link from new_modules where id={$first_choice_box5_drbanihosseini['link']}", $coms_conect);


                        $name = '';
                        if ($first_choice_box5_drbanihosseini['link'] != 9)
                            $name = 'name';
                        if ($first_choice_box5_drbanihosseini['link'] == 7)
                            $name = 'title';
                        $deatils = '';
                        if ($first_choice_box5_drbanihosseini['link'] == 9)
                            $deatils = ',deatils';
                        $name = 'title';
                        $duration = '';
                        if ($first_choice_box5_drbanihosseini['link'] == 8)
                            $duration = ',duration,deatils';
                        if ($first_choice_box5_drbanihosseini['link'] == 1 || $first_choice_box5_drbanihosseini['link'] == 11)
                            $duration = ',abstract';


                        $query = "select title ,a.$name $duration $deatils ,a.id,la,site $count_most_comment $madul_id from $table_name a , new_modules_catogory b,new_madules_comment c  where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$first_choice_box5_drbanihosseini['link']} and  a.id=b.page_id and b.cat_id='$cat_id1' $if_most_comment
                        GROUP BY a.id $madul_id
                        order by $x desc
                        limit 0,$numb";
                        //echo $query;
                        $module_type = $first_choice_box5_drbanihosseini['link'];
                        $result = $coms_conect->query($query);

                        $module_type = $first_choice_box5_drbanihosseini['link'];

                        while ($RS54 = $result->fetch_assoc()) {
                            $sql1w1 = "select adress from new_file_path where type={$first_choice_box5_drbanihosseini['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                            // echo $sql1w1;

                            $result1q = $coms_conect->query($sql1w1);
                            $roww1 = $result1q->fetch_assoc();
                            $module_url = '';
                            if ($first_choice_box5_drbanihosseini['title'] == 11 || $first_choice_box5_drbanihosseini['title'] == 1)
                                $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                            else
                                $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                            if ($first_choice_box5_drbanihosseini['link'] == 8 || $first_choice_box5_drbanihosseini['link'] == 9)
                                $RS54['kholase'] = $RS54['deatils'];
                            if ($first_choice_box5_drbanihosseini['link'] == 1 || $first_choice_box5_drbanihosseini['link'] == 11)
                                $RS54['kholase'] = $RS54['abstract'];
                            ?>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="row H_mb0">
                                    <a href="<?= $module_url ?>">
                                        <div class="listar-newsletter H_h375 HM_h290"  style="background-image:url(<? if ($first_choice_box5_drbanihosseini['link'] == 8) { echo get_modual_pic_address($roww1['adress'], $RS54['site'], '', $second_choice_box5_drbanihosseini['title']);}else{ echo  $roww1['adress'];} ?>)">
                                            <div class="listar-newsletteroverlay H_h375">
                                                <h2 class="H_transy80 HM_transy20"><?= $RS54['title'] ?></h2>

                                            </div>
                                        </div>
                                </div>
                            </div>
                        <? }
                    }
                }
            }

            if ($count1_second_choice_box5_drbanihosseini > 0) {
                for ($j = 1; $j <= $count1_second_choice_box5_drbanihosseini; $j++) {
                    $second_choice_box5_drbanihosseini = get_tem_result($defult_site, $defult_lang, "second_choice_box5_drbanihosseini$j", 'drbanihosseini', $coms_conect);
                    if ($second_choice_box5_drbanihosseini['pic_adress'] > "") {

                        $cat_id2 = $second_choice_box5_drbanihosseini["pic"];
                        $Property2 = $second_choice_box5_drbanihosseini["text"];
                        //echo $Property2;
                        $numb2 = $second_choice_box5_drbanihosseini["pic_adress"];
                        //echo $numb2;

                        $table_name = get_result("select table_name from new_modules where id={$second_choice_box5_drbanihosseini['link']}", $coms_conect);
                        $link_name = get_result("select link from new_modules where id={$second_choice_box5_drbanihosseini['link']}", $coms_conect);

                        $name = '';
                        if ($second_choice_box5_drbanihosseini['link'] != 9)
                            $name = 'name';
                        if ($second_choice_box5_drbanihosseini['link'] == 7)
                            $name = 'title';
                        $deatils = '';
                        if ($second_choice_box5_drbanihosseini['link'] == 9)
                            $deatils = ',deatils';
                        $name = 'title';
                        $duration = '';
                        if ($second_choice_box5_drbanihosseini['link'] == 8)
                            $duration = ',duration,deatils';
                        if ($second_choice_box5_drbanihosseini['link'] == 1 || $second_choice_box5_drbanihosseini['link'] == 11)
                            $duration = ',abstract';


                        $query = "select title ,a.$name $duration $deatils ,a.id,la,site from $table_name a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$second_choice_box5_drbanihosseini['link']} and a.id='$numb2'and b.page_id='$numb2' and   a.id=b.page_id and b.cat_id='$cat_id2'

                        limit 0,1";
                        //echo $query;
                        $module_type = $second_choice_box5_drbanihosseini['link'];
                        $result = $coms_conect->query($query);

                        $module_type = $second_choice_box5_drbanihosseini['link'];

                        while ($RS54 = $result->fetch_assoc()) {
                            $sql1w1 = "select adress from new_file_path where type={$second_choice_box5_drbanihosseini['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                            // echo $sql1w1;

                            $result1q = $coms_conect->query($sql1w1);
                            $roww1 = $result1q->fetch_assoc();
                            $module_url = '';
                            if ($second_choice_box5_drbanihosseini['title'] == 11 || $second_choice_box5_drbanihosseini['title'] == 1)
                                $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                            else
                                $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                            if ($second_choice_box5_drbanihosseini['link'] == 8 || $second_choice_box5_drbanihosseini['link'] == 9)
                                $RS54['kholase'] = $RS54['deatils'];
                            if ($second_choice_box5_drbanihosseini['link'] == 1 || $second_choice_box5_drbanihosseini['link'] == 11)
                                $RS54['kholase'] = $RS54['abstract'];
                            if ($second_choice_box5_drbanihosseini['link'] == 6)
                                $RS54['kholase'] = $RS54['description'];
                            ?>
                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div class="row">
                                    <a href="<?= $module_url ?>">
                                    <div class="listar-newsletter H_h375 HM_h290"  style="background-image:url(<? if ($second_choice_box5_drbanihosseini['link'] == 8) { echo get_modual_pic_address($roww1['adress'], $RS54['site'], '', $second_choice_box5_drbanihosseini['title']);}else{ echo  $roww1['adress'];} ?>)">
                                        <div class="listar-newsletteroverlay H_h375">
                                            <h2 class="H_transy80 HM_transy20"><?= $RS54['title'] ?></h2>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <? }
                    }
                }
            }

            if ($count1_third_choice_box5_drbanihosseini > 0) {
                for ($x = 1; $x <= $count1_third_choice_box5_drbanihosseini; $x++) {
                    $third_choice_box5_drbanihosseini = get_tem_result($defult_site, $defult_lang, "third_choice_box5_drbanihosseini$x", 'drbanihosseini', $coms_conect);
                    if ($third_choice_box5_drbanihosseini['title'] > "") {
                        ?>
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="row">
                                <a href="<?= $third_choice_box5_drbanihosseini["link"] ?>">
                                <div class="listar-newsletter H_h375"  style="background-image:url(<?= $third_choice_box5_drbanihosseini["pic_adress"] ?>)">
                                    <div class="listar-newsletteroverlay H_h375 HM_h290">
                                        <h2 class="H_transy80 HM_transy20"><?= $third_choice_box5_drbanihosseini["text"] ?></h2>

                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                    <? }
                }
            } ?>

    </section>
<? } ?>

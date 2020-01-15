<!--=======================================box 5=====================-->
<? $pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$boxFive = get_tem_result($defult_site, $defult_lang, "boxFive", 'drsheikhi-v2', $coms_conect);
if ($boxFive['pic_adress'] == 1) {
    $img_address248 = '/yep_theme/img/content_img/248x160/248x160-';
    ?>
    <section class=" box5 section">
        <div class="container">
            <div class="col-md-12 text-center">
                <h2 class=""><?= $boxFive['title'] ?></h2>
                <p class="mb-40 block-ellipsis font14 "><?= $boxFive['text'] ?></p>
            </div>
            <div class="row clear">
                <?  $img_address370 = '/yep_theme/img/content_img/370x180/370x180-';
                $count_first_choice_boxFive = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drsheikhi-v2' and name like 'first_choice_boxFive%' ", $coms_conect);
                $count_second_choice_boxFive = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drsheikhi-v2' and name like 'second_choice_boxFive%' ", $coms_conect);
                $count_third_choice_boxFive = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drsheikhi-v2' and name like 'third_choice_boxFive%' ", $coms_conect);

                $ValSelectActive_boxFive = get_tem_result($defult_site, $defult_lang, "ValSelectActive_boxFive", 'drsheikhi-v2', $coms_conect);
                if ($ValSelectActive_boxFive["title"] == 1) {
                for ($j = 1; $j <= $count_first_choice_boxFive; $j++) {
                $first_choice_boxFive = get_tem_result($defult_site, $defult_lang, "first_choice_boxFive$j", 'drsheikhi-v2', $coms_conect);
                if ($first_choice_boxFive['pic_adress'] > "") {

                $cat_id1 = $first_choice_boxFive["pic"];
                if ($cat_id1!=0){
                    $all_cat="and b.cat_id='$cat_id1'";
                }
                $Property = $first_choice_boxFive["text"];
                $numb = $first_choice_boxFive["pic_adress"];

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

                $table_name = get_result("select table_name from new_modules where id={$first_choice_boxFive['link']}", $coms_conect);
                $link_name = get_result("select link from new_modules where id={$first_choice_boxFive['link']}", $coms_conect);


                $name = '';
                if ($first_choice_boxFive['link'] != 9)
                    $name = 'name';
                if ($first_choice_boxFive['link'] == 7)
                    $name = 'title';
                $deatils = '';
                if ($first_choice_boxFive['link'] == 9)
                    $deatils = ',deatils';
                $name = 'title';
                $duration = '';
                if ($first_choice_boxFive['link'] == 8)
                    $duration = ',duration,deatils';
                if ($first_choice_boxFive['link'] == 1 || $first_choice_boxFive['link'] == 11){
                    $duration = ',abstract';
                    $is_special = ',is_special';}


                $query = "select title ,a.$name $duration $deatils ,a.id,la,site $count_most_comment $madul_id $is_special from $table_name a , new_modules_catogory b $table_comment_name   where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$first_choice_boxFive['link']} and  a.id=b.page_id $all_cat $if_most_comment
                        GROUP BY a.id $madul_id
                        order by $x desc
                        limit 0,$numb";
                //echo $query;
                $module_type = $first_choice_boxFive['link'];
                $result = $coms_conect->query($query);

                $module_type = $first_choice_boxFive['link'];

                while ($RS54 = $result->fetch_assoc()) {
                $sql1w1 = "select adress from new_file_path where type={$first_choice_boxFive['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                // echo $sql1w1;

                $result1q = $coms_conect->query($sql1w1);
                $roww1 = $result1q->fetch_assoc();
                $module_url = '';
                if ($first_choice_boxFive['title'] == 11 || $first_choice_boxFive['title'] == 1)
                    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                else
                    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                if ($first_choice_boxFive['link'] == 8 || $first_choice_boxFive['link'] == 9)
                    $RS54['kholase'] = $RS54['deatils'];
                if ($first_choice_boxFive['link'] == 1 || $first_choice_boxFive['link'] == 11)
                    $RS54['kholase'] = $RS54['abstract'];


                preg_match('/[a-zA-z0-9-_ ()]{1,}(.png|.jpg|.jpeg|.gif)$/i', $roww1['adress'], $match);
                $name_match = $match[0];
                $first_choice_img = $img_address370 . $name_match;
                ?>
                <div class="col-sm-12 col-md-4 M_mb20">
                    <a href="<?= $module_url ?>" class="text-decoration-none">
								<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
									<span class="thumb-info-side-image-wrapper">
                                         <?
                                         if ($first_choice_boxFive['link'] == 8) { ?>
                                             <img width="100%" height="180" title="<?= $RS54['title'] ?>"
                                                  data-src="<?= get_modual_pic_address($first_choice_img, $RS54['site'], '', $first_choice_boxFive['title']) ?>"
                                                  class="img-responsive lozad"
                                                  alt="<?= $RS54['title'] ?>">
                                             <span class="play-button"><i class="fa fa-play p10"></i></span>
                                             <span class="time_video"><?=$RS54['duration']?></span>
                                             <?
                                         } else { ?>
                                             <img width="100%" height="180" title="<?= $RS54['title'] ?>"
                                                  data-src="<?= $first_choice_img?>"
                                                  class="img-responsive lozad"
                                                  alt="<?= $RS54['title'] ?>">
                                             <?
                                         } ?>

									</span>
									<span class="thumb-info-caption">
											<h3 class=""><?= $RS54['title'] ?></h3>
									</span>
								</span>
                    </a>
                </div>
                    <?

                }
                }
                }
                }
                if ($ValSelectActive_boxFive["title"] == 2) {
                for ($j = 1; $j <= $count_second_choice_boxFive; $j++) {
                $second_choice_boxFive = get_tem_result($defult_site, $defult_lang, "second_choice_boxFive$j", 'drsheikhi-v2', $coms_conect);
                if ($second_choice_boxFive['pic_adress'] > "") {

                $cat_id2 = $second_choice_boxFive["pic"];
                $Property2 = $second_choice_boxFive["text"];
                //echo $Property2;
                $numb2 = $second_choice_boxFive["pic_adress"];
                //echo $numb2;

                $table_name = get_result("select table_name from new_modules where id={$second_choice_boxFive['link']}", $coms_conect);
                $link_name = get_result("select link from new_modules where id={$second_choice_boxFive['link']}", $coms_conect);

                $name = '';
                if ($second_choice_boxFive['link'] != 9)
                    $name = 'name';
                if ($second_choice_boxFive['link'] == 7)
                    $name = 'title';
                $deatils = '';
                if ($second_choice_boxFive['link'] == 9){
                    $deatils = ',deatils';
                    $name = 'title';
                    $duration = '';
                    $is_special = ',is_importand';}
                if ($second_choice_boxFive['link'] == 8){
                    $duration = ',duration,deatils';
                    $is_special = ',is_importand';}
                if ($second_choice_boxFive['link'] == 1 || $second_choice_boxFive['link'] == 11){
                    $duration = ',abstract';
                    $is_special = ',is_special';}


                $query = "select title ,a.$name $duration $deatils ,a.id,la,site $is_special from $table_name a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$second_choice_boxFive['link']} and a.id='$numb2'and b.page_id='$numb2' and   a.id=b.page_id and b.cat_id='$cat_id2'

                        limit 0,1";
                //echo $query;
                $module_type = $second_choice_boxFive['link'];
                $result = $coms_conect->query($query);

                $module_type = $second_choice_boxFive['link'];


                while ($RS54 = $result->fetch_assoc()) {
                $sql1w1 = "select adress from new_file_path where type={$second_choice_boxFive['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                // echo $sql1w1;

                $result1q = $coms_conect->query($sql1w1);
                $roww1 = $result1q->fetch_assoc();
                $module_url = '';
                if ($second_choice_boxFive['title'] == 11 || $second_choice_boxFive['title'] == 1)
                    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                else
                    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                if ($second_choice_boxFive['link'] == 8 || $second_choice_boxFive['link'] == 9)
                    $RS54['kholase'] = $RS54['deatils'];
                if ($second_choice_boxFive['link'] == 1 || $second_choice_boxFive['link'] == 11)
                    $RS54['kholase'] = $RS54['abstract'];
                if ($second_choice_boxFive['link'] == 6)
                    $RS54['kholase'] = $RS54['description'];

                preg_match('/[a-zA-z0-9-_ ()]{1,}(.png|.jpg|.jpeg|.gif)$/i', $roww1['adress'], $match);
                $name_match = $match[0];
                $second_choice_img = $img_address370 . $name_match;
                ?>
                    <div class="col-sm-12 col-md-4 M_mb20">
                        <a href="<?= $module_url ?>" class="text-decoration-none">
								<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
									<span class="thumb-info-side-image-wrapper">
                                         <?
                                         if ($second_choice_boxFive['link'] == 8) { ?>
                                             <img width="100%" height="180" title="<?= $RS54['title'] ?>"
                                                  data-src="<?= get_modual_pic_address($second_choice_img, $RS54['site'], '', $second_choice_boxFive['title']) ?>"
                                                  class="img-responsive lozad"
                                                  alt="<?= $RS54['title'] ?>">
                                             <span class="play-button"><i class="fa fa-play p10"></i></span>
                                             <span class="time_video"><?=$RS54['duration']?></span>
                                             <?
                                         } else { ?>
                                             <img width="100%" height="180" title="<?= $RS54['title'] ?>"
                                                  data-src="<?= $second_choice_img?>"
                                                  class="img-responsive lozad"
                                                  alt="<?= $RS54['title'] ?>">
                                             <?
                                         } ?>

									</span>
									<span class="thumb-info-caption">
											<h3 class=""><?= $RS54['title'] ?></h3>
									</span>
								</span>
                        </a>
                    </div>
                    <?
                }
                }
                }
                }
                if ($ValSelectActive_boxFive["title"] == 3) {
                for ($x = 1; $x <= $count_third_choice_boxFive; $x++) {
                $third_choice_boxFive = get_tem_result($defult_site, $defult_lang, "third_choice_boxFive$x", 'drsheikhi-v2', $coms_conect);
                if ($third_choice_boxFive['title'] > "") {
                ?>
                    <div class="col-sm-12 col-md-4 M_mb20">
                        <a href="<?= $third_choice_boxFive["link"] ?>" class="text-decoration-none">
								<span class="thumb-info thumb-info-side-image thumb-info-side-image-custom thumb-info-no-zoom thumb-info-no-zoom thumb-info-side-image-custom-highlight">
									<span class="thumb-info-side-image-wrapper">

                                             <img width="100%" height="180" title="<?=$third_choice_boxFive['title']?>"
                                                  data-src="<?= $third_choice_boxFive["pic_adress"] ?>"
                                                  class="img-responsive lozad"
                                                  alt="<?= $third_choice_boxFive['title'] ?>">


									</span>
									<span class="thumb-info-caption">
											<h3 class=""><?=$third_choice_boxFive['title'] ?></h3>
									</span>
								</span>
                        </a>
                    </div>
                <? 
                }}} ?>
                
            </div>
            <div class="col-md-12 mt-40">
                <div class="text-center"> <a href="<?= $boxFive["link"] ?>" class="btn_custom btn"><?= $boxFive["pic"] ?></a> </div>
            </div>
        </div>
    </section>

<? } ?>
<!--=======================================End box 5 ======================-->





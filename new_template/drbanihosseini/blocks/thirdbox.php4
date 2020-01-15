
<!--=======================================box 3 ======================-->

<?
$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$box3_header = get_tem_result($defult_site, $defult_lang, "box3_header", 'drbanihosseini', $coms_conect);
if ($box3_header['pic_adress'] == 1) {
    ?>
    <section class="listar-sectionspace H listar-haslayout listar-bglight">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="listar-sectionhead">
                        <div class="listar-sectiontitle">
                            <h2><?= $box3_header['title'] ?></h2>
                        </div>
                        <div class="listar-description">
                            <p><?= $box3_header['text'] ?> </p>
                        </div>
                    </div>
                </div>
                <div class="listar-themeposts listar-blogposts">

                        <?
                        $count1_first_choice_box3 = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'first_choice_box3%' ", $coms_conect);
                        $count1_second_choice_box3 = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'second_choice_box3%' ", $coms_conect);
                        $count1_third_choice_box3 = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'third_choice_box3%' ", $coms_conect);

                        if ($count1_first_choice_box3 > 0){

                            for ($j = 1; $j <= $count1_first_choice_box3; $j++) {
                                $first_choice_box3 = get_tem_result($defult_site, $defult_lang, "first_choice_box3$j", 'drbanihosseini', $coms_conect);
                                if ($first_choice_box3['pic_adress'] > "") {

                                    $cat_id1 = $first_choice_box3["pic"];
                                    $Property = $first_choice_box3["text"];
                                    $numb = $first_choice_box3["pic_adress"];

                                    if ($Property == 0)
                                        $x = 'a.id';
                                    if ($Property == 1)
                                        $x = 'a.view';
                                    if ($Property == 2) {
                                        $count_most_comment = ',count(c.id) as count';
                                        $madul_id =',madul_id';
                                        $if_most_comment = 'and a.status=1 and c.status=1 and c.type=1 and a.id=c.madul_id';
                                        $x = 'count';
                                    }

                                    $table_name = get_result("select table_name from new_modules where id={$first_choice_box3['link']}", $coms_conect);
                                    $link_name = get_result("select link from new_modules where id={$first_choice_box3['link']}", $coms_conect);


                                    $name = '';
                                    if ($first_choice_box3['link'] != 9)
                                        $name = 'name';
                                    if ($first_choice_box3['link'] == 7)
                                        $name = 'title';
                                    $deatils = '';
                                    if ($first_choice_box3['link'] == 9)
                                        $deatils = ',deatils';
                                    $name = 'title';
                                    $duration = '';
                                    if ($first_choice_box3['link'] == 8)
                                        $duration = ',duration,deatils';
                                    if ($first_choice_box3['link'] == 1 || $first_choice_box3['link'] == 11)
                                        $duration = ',abstract';


                                    $query = "select title ,a.$name $duration $deatils ,a.id,a.view,a.date,la,site $count_most_comment $madul_id,a.user_id from $table_name a , new_modules_catogory b,new_madules_comment c  where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$first_choice_box3['link']} and  a.id=b.page_id and b.cat_id='$cat_id1' $if_most_comment
                        GROUP BY a.id $madul_id
                        order by $x desc
                        limit 0,$numb";
                                    //echo $query;
                                    $module_type = $first_choice_box3['link'];
                                    $result = $coms_conect->query($query);

                                    $module_type = $first_choice_box3['link'];

                                    while ($RS54 = $result->fetch_assoc()) {
                                        $sql1w1 = "select adress from new_file_path where type={$first_choice_box3['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                        // echo $sql1w1;

                                        $result1q = $coms_conect->query($sql1w1);
                                        $roww1 = $result1q->fetch_assoc();
                                        $module_url = '';
                                        if ($first_choice_box3['title'] == 11 || $first_choice_box3['title'] == 1)
                                            $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                        else
                                            $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                        if ($first_choice_box3['link'] == 8 || $first_choice_box3['link'] == 9)
                                            $RS54['kholase'] = $RS54['deatils'];
                                        if ($first_choice_box3['link'] == 1 || $first_choice_box3['link'] == 11)
                                            $RS54['kholase'] = $RS54['abstract'];
                                        ?>
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                            <div class="listar-themepost listar-post">
                                                <figure class="listar-featuredimg">
                                                    <a href="<?= $module_url ?>">
                                                        <?
                                                        if ($first_choice_box3['link'] == 8) { ?>
                                                            <img title="<?= $RS54['title'] ?>"
                                                                 src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $first_choice_box3['title']) ?>"
                                                                 class="H_h303" alt="<?= $RS54['title'] ?>">
                                                            <figcaption>
                                                                <a  href="<?=$module_url?>"><i class="play-video"></i></a>
                                                            </figcaption>
                                                            <?
                                                        } else { ?>
                                                            <img title="<?= $RS54['title'] ?>" src="<?= $roww1['adress'] ?>"
                                                                 class="H_h303" alt="<?= $RS54['title'] ?>"
                                                            >
                                                            <?
                                                        } ?>
                                                    </a>
                                                    <? $cat_name = get_result("select name from new_modules_cat where id='$cat_id1'", $coms_conect); ?>
                                                    <a class="listar-postcategory" href="/<?=$link_name?>/<?= $RS54['la'] ?>/category/<?= $cat_id1 ?>"><?= $cat_name ?></a>

                                                </figure>
                                                <div class="listar-postcontent">
                                                    <? $sql303 = "SELECT name,avatar FROM new_managers where id={$RS54['user_id']}";
                                                    $result303 = $coms_conect->query($sql303);
                                                    $row330 = $result303->fetch_assoc(); ?>
                                                    <figure class="listar-authorimg"><img  class="H_hw54" src="<?= get_user_avatar($row330['avatar']); ?>" alt="<?= $RS54['title'] ?>"></figure>
                                                    <h5 class="block-ellipsis"><a href="<?= $module_url ?>"><?= $RS54['title'] ?></a></h5>
                                                    <div class="listar-themepostfoot">
                                                        <time datetime="2017-08-08">
                                                            <i class="icon-clock4"></i>
                                                            <!-----------------تاریخ و ساعت--------->
                                                            <span ><?=miladitojalaliuser($RS54['date'],$RS54['la'],1); ?></span>
                                                        </time>
                                                        <span class="listar-postcomment">
                                                           <span class="H_en_color H_fa_co_pl"> <?= $RS54['view'] ?>  دیده شده </span>
												           <span class="fa fa-eye H_en_co_pl H_fa_color"></span>
											            </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <? }}}}
                                    
                        if ($count1_second_choice_box3 > 0){
                        for ($j = 1; $j <= $count1_second_choice_box3; $j++) {
                            $second_choice_box3 = get_tem_result($defult_site, $defult_lang, "second_choice_box3$j", 'drbanihosseini', $coms_conect);
                        if ($second_choice_box3['pic_adress'] > "") {

                        $cat_id2 = $second_choice_box3["pic"];
                        $Property2 = $second_choice_box3["text"];
                        //echo $Property2;
                        $numb2 = $second_choice_box3["pic_adress"];
                        //echo $numb2;

                        $table_name = get_result("select table_name from new_modules where id={$second_choice_box3['link']}", $coms_conect);
                        $link_name = get_result("select link from new_modules where id={$second_choice_box3['link']}", $coms_conect);

                        $name = '';
                        if ($second_choice_box3['link'] != 9)
                        $name = 'name';
                        if ($second_choice_box3['link'] == 7)
                        $name = 'title';
                        $deatils = '';
                        if ($second_choice_box3['link'] == 9)
                        $deatils = ',deatils';
                        $name = 'title';
                        $duration = '';
                        if ($second_choice_box3['link'] == 8)
                        $duration = ',duration,deatils';
                        if ($second_choice_box3['link'] == 1 || $second_choice_box3['link'] == 11)
                        $duration = ',abstract';


                        $query = "select title ,a.$name $duration $deatils ,a.id,a.view,a.date,la,site,a.user_id from $table_name a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
                        and site='$defult_site' and b.type={$second_choice_box3['link']} and a.id='$numb2'and b.page_id='$numb2' and   a.id=b.page_id and b.cat_id='$cat_id2'

                        limit 0,1";
                        //echo $query;
                        $module_type = $second_choice_box3['link'];
                        $result = $coms_conect->query($query);

                        $module_type = $second_choice_box3['link'];

                        while ($RS54 = $result->fetch_assoc()) {
                        $sql1w1 = "select adress from new_file_path where type={$second_choice_box3['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                        // echo $sql1w1;

                        $result1q = $coms_conect->query($sql1w1);
                        $roww1 = $result1q->fetch_assoc();
                        $module_url = '';
                        if ($second_choice_box3['title'] == 11 || $second_choice_box3['title'] == 1)
                        $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                        else
                        $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                        if ($second_choice_box3['link'] == 8 || $second_choice_box3['link'] == 9)
                        $RS54['kholase'] = $RS54['deatils'];
                        if ($second_choice_box3['link'] == 1 || $second_choice_box3['link'] == 11)
                        $RS54['kholase'] = $RS54['abstract'];
                        if ($second_choice_box3['link'] == 6)
                        $RS54['kholase'] = $RS54['description'];
                        ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="listar-themepost listar-post">
                                    <figure class="listar-featuredimg">
                                        <a href="<?= $module_url ?>">
                                            <?
                                            if ($second_choice_box3['link'] == 8) { ?>
                                                <img title="<?= $RS54['title'] ?>"
                                                     src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $second_choice_box3['title']) ?>"
                                                     class="H_h303" alt="<?= $RS54['title'] ?>">
                                                <figcaption>
                                                    <a  href="<?=$module_url?>"><i class="play-video"></i></a>
                                                </figcaption>
                                                <?
                                            } else { ?>
                                                <img title="<?= $RS54['title'] ?>" src="<?= $roww1['adress'] ?>"
                                                     class="H_h303" alt="<?= $RS54['title'] ?>"
                                                >
                                                <?
                                            } ?>
                                        </a>
                                        <? $cat_name = get_result("select name from new_modules_cat where id='$cat_id2'", $coms_conect); ?>
                                        <a class="listar-postcategory" href="/<?=$link_name?>/<?= $RS54['la'] ?>/category/<?= $cat_id2 ?>"><?= $cat_name ?></a>

                                    </figure>
                                    <div class="listar-postcontent">
                                        <? $sql303 = "SELECT name,avatar FROM new_managers where id={$RS54['user_id']}";
                                        $result303 = $coms_conect->query($sql303);
                                        $row330 = $result303->fetch_assoc(); ?>
                                        <figure class="listar-authorimg"><img  class="H_hw54" src="<?= get_user_avatar($row330['avatar']); ?>" alt="<?= $RS54['title'] ?>"></figure>

                                        <h5 class="block-ellipsis"><a href="<?= $module_url ?>"><?= $RS54['title'] ?></a></h5>
                                        <div class="listar-themepostfoot">
                                            <time datetime="2017-08-08">
                                                <i class="icon-clock4"></i>
                                                <!-----------------تاریخ و ساعت--------->
                                                <span ><?=miladitojalaliuser($RS54['date'],$RS54['la'],1); ?></span>
                                            </time>
                                            <span class="listar-postcomment">
                                                           <span class="H_en_color H_fa_co_pl"> <?= $RS54['view'] ?>  دیده شده </span>
												           <span class="fa fa-eye H_en_co_pl H_fa_color"></span>
											            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? }}}}

                        if ($count1_third_choice_box3 > 0){
                        for ($x = 1; $x <= $count1_third_choice_box3; $x++) {
                            $third_choice_box3 = get_tem_result($defult_site, $defult_lang, "third_choice_box3$x", 'drbanihosseini', $coms_conect);
                        if ($third_choice_box3['title'] > "") {
                        ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="listar-themepost listar-post">
                                    <figure class="listar-featuredimg">
                                        <a href="<?= $third_choice_box3["link"] ?>">

                                            <img title="<?= $third_choice_box3["text"] ?>" src="<?= $third_choice_box3["pic_adress"] ?>"
                                                 class="H_h303" alt="<?= $third_choice_box3["text"] ?>">

                                        </a>
                                    </figure>
                                    <div class="listar-postcontent">
                                        <figure class="listar-authorimg"><img class="H_hw54" src="<?= $third_choice_box3["pic_adress"] ?>" alt="<?= $third_choice_box3["text"] ?>"></figure>
                                        <h4 class="block-ellipsis"><a href="<?= $third_choice_box3["link"] ?>"><?= $third_choice_box3["text"] ?></a></h4>

                                        <div class="listar-themepostfoot">
                                        <h5 class="block-ellipsis H_ptb15"><a href="<?= $third_choice_box3["link"] ?>"><?= $third_choice_box3["title"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <? }}
                        }?>
                    </div>
                </div>
            </div>
            </section>
<? } ?>




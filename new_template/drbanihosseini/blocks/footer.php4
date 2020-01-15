<!--سوالات خود را از ما بپرسید-->
<? $question = get_tem_result($site, $la, "question", '', $coms_conect);
if($question['pic_adress'] == 1){
    ?>
    <div id="style-switcher" >
        <h2>
            <form class=""  method="post">
                <div class="H_ml5"  title="ارسال" >
                    <input class="H_style_input" type="text"  placeholder="پیام خود را اینجا وارد کنید" >
                    <a href="#"><img class="H_pos_lt" src="new_template/drbanihosseini/img/send.png" alt="send"></a>
                </div>
            </form>
            <a><i class="fa fa-life-ring"></i></a>
        </h2>

        <div>
            <img class="banner_image" src="<?= $question['pic'] ?>"  alt="question">
        </div>

    </div>
    <script>
        $(document).ready(function () {
            $('.fa-life-ring').click(function () {
                $('#style-switcher').toggleClass('H_left0').css('transition-duration','1s')
            })
        })
    </script>
<?}?>

<!--سوالات خود را از ما بپرسید-->
<!-- Footer-->
<footer id="footer" class="footer bg-black-222">
    <div class="container pb-50">
        <div class="row border-bottom-black">
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <img class="mt-10 mb-20" alt="drbanihosseini" src="<?= $header_title['pic_adress'] ?>">
                    <? $footer_column1 = get_tem_result($site, $la, "footer_column1", $tem, $coms_conect); ?>
                    <p><?= $footer_column1['text'] ?></p>
                    <ul class="list-inline mt-5">
                        <? $contact_us_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'contact_links%' ", $coms_conect);
                        for ($k =1; $k <= $contact_us_links; $k++) {
                        $contact_links = get_tem_result($site, $la, "contact_links$k", $tem, $coms_conect);
                        if ($contact_links['title'] > "") {
                        ?>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <span><?= $contact_links["title"]?></span><?= number2farsi( $contact_links["link"]) ?></li>
                        <?}}?>
                        <? $email = get_tem_result($site, $la, "email", $tem, $coms_conect); ?>
                        <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="<?= $email['link'] ?>"><img src="<?= $email['pic'] ?>" alt="<?= $email['title'] ?>"></a> </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <? $footer_column2 = get_tem_result($site, $la, "footer_column2", $tem, $coms_conect); ?>
                    <h5 class="widget-title line-bottom"><?= $footer_column2['title'] ?></h5>
                    <div class="latest-posts">

                        <?
                        $count1_first_choice_footer_C2_drbanihosseini = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'first_choice_footer_C2_drbanihosseini%' ", $coms_conect);
                                $count1_second_choice_footer_C2_drbanihosseini = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'second_choice_footer_C2_drbanihosseini%' ", $coms_conect);
                                $count1_third_choice_footer_C2_drbanihosseini = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_footer_C2_drbanihosseini%' ", $coms_conect);

                                if ($count1_first_choice_footer_C2_drbanihosseini > 0) {

                                    for ($j = 1; $j <= $count1_first_choice_footer_C2_drbanihosseini; $j++) {
                                        $first_choice_footer_C2_drbanihosseini = get_tem_result($site, $la, "first_choice_footer_C2_drbanihosseini$j", $tem, $coms_conect);
                                        if ($first_choice_footer_C2_drbanihosseini['pic_adress'] > "") {

                                            $cat_id1 = $first_choice_footer_C2_drbanihosseini["pic"];
                                            $Property = $first_choice_footer_C2_drbanihosseini["text"];
                                            $numb = $first_choice_footer_C2_drbanihosseini["pic_adress"];

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

                                            $table_name = get_result("select table_name from new_modules where id={$first_choice_footer_C2_drbanihosseini['link']}", $coms_conect);
                                            $link_name = get_result("select link from new_modules where id={$first_choice_footer_C2_drbanihosseini['link']}", $coms_conect);


                                            $name = '';
                                            if ($first_choice_footer_C2_drbanihosseini['link'] != 9)
                                                $name = 'name';
                                            if ($first_choice_footer_C2_drbanihosseini['link'] == 7)
                                                $name = 'title';
                                            $deatils = '';
                                            if ($first_choice_footer_C2_drbanihosseini['link'] == 9)
                                                $deatils = ',deatils';
                                            $name = 'title';
                                            $duration = '';
                                            if ($first_choice_footer_C2_drbanihosseini['link'] == 8)
                                                $duration = ',duration,deatils';
                                            if ($first_choice_footer_C2_drbanihosseini['link'] == 1 || $first_choice_footer_C2_drbanihosseini['link'] == 11)
                                                $duration = ',abstract';


                                            $query = "select title ,a.$name $duration $deatils ,a.id,la,site $count_most_comment $madul_id,a.date from $table_name a , new_modules_catogory b,new_madules_comment c  where  a.id>0 and la='$la'
                        and site='$site' and b.type={$first_choice_footer_C2_drbanihosseini['link']} and  a.id=b.page_id and b.cat_id='$cat_id1' $if_most_comment
                        GROUP BY a.id $madul_id
                        order by $x desc
                        limit 0,$numb";
                                            //echo $query;
                                            $module_type = $first_choice_footer_C2_drbanihosseini['link'];
                                            $result = $coms_conect->query($query);

                                            $module_type = $first_choice_footer_C2_drbanihosseini['link'];

                                            while ($RS54 = $result->fetch_assoc()) {
                                                $sql1w1 = "select adress from new_file_path where type={$first_choice_footer_C2_drbanihosseini['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                                // echo $sql1w1;

                                                $result1q = $coms_conect->query($sql1w1);
                                                $roww1 = $result1q->fetch_assoc();
                                                $module_url = '';
                                                if ($first_choice_footer_C2_drbanihosseini['title'] == 11 || $first_choice_footer_C2_drbanihosseini['title'] == 1)
                                                    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                                else
                                                    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                                if ($first_choice_footer_C2_drbanihosseini['link'] == 8 || $first_choice_footer_C2_drbanihosseini['link'] == 9)
                                                    $RS54['kholase'] = $RS54['deatils'];
                                                if ($first_choice_footer_C2_drbanihosseini['link'] == 1 || $first_choice_footer_C2_drbanihosseini['link'] == 11)
                                                    $RS54['kholase'] = $RS54['abstract'];
                                                ?>
                                                <article class="post media-post clearfix pb-0 mb-10">
                                                    <a href="<?= $module_url ?>" class="post-thumb">
                                                        <?
                                                        if ($first_choice_footer_C2_drbanihosseini['link'] == 8) { ?>
                                                            <img title="<?= $RS54['title'] ?>"
                                                                 src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $first_choice_footer_C2_drbanihosseini['title']) ?>"
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

                                                    </a>
                                                    <div class="post-right">
                                                        <h5 class="post-title mt-0 mb-0 block-ellipsis"><a href="<?= $module_url ?>"><?= $RS54['title'] ?></a></h5>
                                                        <p class="post-date mb-0 font-12"><?=miladitojalaliuser($RS54['date'],$RS54['la'],1); ?></p>
                                                    </div>
                                                </article>
                                            <? }
                                        }
                                    }
                                }

                                if ($count1_second_choice_footer_C2_drbanihosseini > 0) {
                                    for ($j = 1; $j <= $count1_second_choice_footer_C2_drbanihosseini; $j++) {
                                        $second_choice_footer_C2_drbanihosseini = get_tem_result($site, $la, "second_choice_footer_C2_drbanihosseini$j", $tem, $coms_conect);
                                        if ($second_choice_footer_C2_drbanihosseini['pic_adress'] > "") {

                                            $cat_id2 = $second_choice_footer_C2_drbanihosseini["pic"];
                                            $Property2 = $second_choice_footer_C2_drbanihosseini["text"];
                                            //echo $Property2;
                                            $numb2 = $second_choice_footer_C2_drbanihosseini["pic_adress"];
                                            //echo $numb2;

                                            $table_name = get_result("select table_name from new_modules where id={$second_choice_footer_C2_drbanihosseini['link']}", $coms_conect);
                                            $link_name = get_result("select link from new_modules where id={$second_choice_footer_C2_drbanihosseini['link']}", $coms_conect);

                                            $name = '';
                                            if ($second_choice_footer_C2_drbanihosseini['link'] != 9)
                                                $name = 'name';
                                            if ($second_choice_footer_C2_drbanihosseini['link'] == 7)
                                                $name = 'title';
                                            $deatils = '';
                                            if ($second_choice_footer_C2_drbanihosseini['link'] == 9)
                                                $deatils = ',deatils';
                                            $name = 'title';
                                            $duration = '';
                                            if ($second_choice_footer_C2_drbanihosseini['link'] == 8)
                                                $duration = ',duration,deatils';
                                            if ($second_choice_footer_C2_drbanihosseini['link'] == 1 || $second_choice_footer_C2_drbanihosseini['link'] == 11)
                                                $duration = ',abstract';


                                            $query = "select title ,a.$name $duration $deatils ,a.id,la,site,a.date from $table_name a , new_modules_catogory b where  a.id>0 and la='$la'
                        and site='$site' and b.type={$second_choice_footer_C2_drbanihosseini['link']} and a.id='$numb2'and b.page_id='$numb2' and   a.id=b.page_id and b.cat_id='$cat_id2'
                        limit 0,1";
                                           // echo $query;
                                            $module_type = $second_choice_footer_C2_drbanihosseini['link'];
                                            $result = $coms_conect->query($query);

                                            $module_type = $second_choice_footer_C2_drbanihosseini['link'];

                                            while ($RS54 = $result->fetch_assoc()) {
                                                $sql1w1 = "select adress from new_file_path where type={$second_choice_footer_C2_drbanihosseini['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
                                                // echo $sql1w1;

                                                $result1q = $coms_conect->query($sql1w1);
                                                $roww1 = $result1q->fetch_assoc();
                                                $module_url = '';
                                                if ($second_choice_footer_C2_drbanihosseini['title'] == 11 || $second_choice_footer_C2_drbanihosseini['title'] == 1)
                                                    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
                                                else
                                                    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


                                                if ($second_choice_footer_C2_drbanihosseini['link'] == 8 || $second_choice_footer_C2_drbanihosseini['link'] == 9)
                                                    $RS54['kholase'] = $RS54['deatils'];
                                                if ($second_choice_footer_C2_drbanihosseini['link'] == 1 || $second_choice_footer_C2_drbanihosseini['link'] == 11)
                                                    $RS54['kholase'] = $RS54['abstract'];
                                                if ($second_choice_footer_C2_drbanihosseini['link'] == 6)
                                                    $RS54['kholase'] = $RS54['description'];
                                                ?>
                                                <article class="post media-post clearfix pb-0 mb-10">
                                                    <a href="<?= $module_url ?>" class="post-thumb">
                                                        <?
                                                        if ($second_choice_footer_C2_drbanihosseini['link'] == 8) { ?>
                                                            <img title="<?= $RS54['title'] ?>"
                                                                 src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $second_choice_footer_C2_drbanihosseini['title']) ?>"
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

                                                    </a>
                                                    <div class="post-right">
                                                        <h5 class="post-title mt-0 mb-0 block-ellipsis"><a href="<?= $module_url ?>"><?= $RS54['title'] ?></a></h5>
                                                        <p class="post-date mb-0 font-12"><?=miladitojalaliuser($RS54['date'],$RS54['la'],1); ?></p>
                                                    </div>
                                                </article>

                                            <? }
                                        }
                                    }
                                }

                                if ($count1_third_choice_footer_C2_drbanihosseini > 0) {
                                    for ($x = 1; $x <= $count1_third_choice_footer_C2_drbanihosseini; $x++) {
                                        $third_choice_footer_C2_drbanihosseini = get_tem_result($site,$la, "third_choice_footer_C2_drbanihosseini$x", $tem, $coms_conect);
                                        if ($third_choice_footer_C2_drbanihosseini['title'] > "") {
                                            ?>
                                            <article class="post media-post clearfix pb-0 mb-10">
                                                <a href="<?= $third_choice_footer_C2_drbanihosseini["link"] ?>" class="post-thumb"><img alt="<?= $third_choice_footer_C2_drbanihosseini["text"] ?>" src="<?= $third_choice_footer_C2_drbanihosseini["pic_adress"] ?>"></a>
                                                <div class="post-right">
                                                    <h5 class="post-title mt-0 mb-0 block-ellipsis"><a href="<?= $third_choice_footer_C2_drbanihosseini["link"] ?>"><?= $third_choice_footer_C2_drbanihosseini["text"] ?></a></h5>
                                                    <p class="post-date mb-0 font-12"><?= $third_choice_footer_C2_drbanihosseini["title"] ?></p>
                                                </div>
                                            </article>

                                        <? }
                                    }
                                } ?>

                            </section>



                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <? $footer_column3 = get_tem_result($site, $la, "footer_column3", $tem, $coms_conect); ?>
                    <h5 class="widget-title line-bottom"><?= $footer_column3['title'] ?></h5>
                    <ul class="list angle-double-right list-border">
                        <? $three_column_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'three_column_footer_links%' ", $coms_conect);
                        for ($k = 1; $k <= $three_column_links; $k++) {
                        $three_column_footer_links = get_tem_result($site, $la, "three_column_footer_links$k", $tem, $coms_conect);
                        if ($three_column_footer_links['title'] > "") {
                        ?>
                        <li><a href="<?= $three_column_footer_links["link"] ?>"><?= $three_column_footer_links["title"] ?></a></li>
                    <?}}?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="widget dark">
                    <? $footer_column4 = get_tem_result($site, $la, "footer_column4", $tem, $coms_conect); ?>
                    <h5 class="widget-title line-bottom"><?= $footer_column4['title'] ?></h5>
                    <div class="opening-hours">
                        <ul class="list-border">
                            <? $four_column_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'four_column_footer_links%' ", $coms_conect);

                            for ($k = 1; $k <= $four_column_links; $k++) {
                            $four_column_footer_links = get_tem_result($site, $la, "four_column_footer_links$k", $tem, $coms_conect);
                            if ($four_column_footer_links['title'] > "") {
                            ?>
                            <li class="clearfix"><div class="value pull-right"><a href="<?= $four_column_footer_links["link"] ?>"><?= $four_column_footer_links["title"] ?></a> </div>
                            </li>
                            <?}}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-10">
            <div class="col-md-5">
                <h5 class="text-white">اطلاع رسانی</h5>
                <form id="mailchimp-subscription-form-footer" class="newsletter-form mt-20" novalidate="true">
                    <div class="input-group">
                        <input type="email" value="" name="EMAIL" placeholder="ایمیل خود را وارد کنید" class="form-control input-lg " data-height="45px" id="mce-EMAIL-footer" style="height: 45px;">
                        <span class="input-group-btn">
                  <button  class="btn btn-colored btn-theme-colored btn-xs m-0 font-14 HM_h35 H_h45 H_plr30" type="submit" >ارسال</button>
                </span>
                    </div>
                </form>

            </div>
            <div class="col-md-4 col-md-offset-3 mt-20">
                <div class="pull-right">
                    <ul class="styled-icons icon-bordered small square list-inline mt-10">
                        <? $footer_social_networks = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'footer_social%' ", $coms_conect);
                        for ($k = 1; $k <= $footer_social_networks; $k++) {
                        $footer_social = get_tem_result($site, $la, "footer_social$k", $tem, $coms_conect);
                        if ($footer_social['title'] > "") {
                        ?>
                        <li><a href="<?= $footer_social["link"] ?>"><i class="fa fa-<?= $footer_social["title"] ?> text-white"></i></a></li>
                       <?}}?>
                    </ul>
                </div>
                <div class="pull-left">
                    <? $contact_us_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'contact_links%' ", $coms_conect);
                    for ($k =1; $k <= 1; $k++) {
                    $contact_links = get_tem_result($site, $la, "contact_links$k", $tem, $coms_conect);
                    if ($contact_links['title'] > "") {
                    ?>
                    <h5 class="text-white"><?= $contact_links["title"] ?></h5>
                    <h4 class="text-gray"><?= number2farsi( $contact_links["link"]) ?></h4>
                    <?}}?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copy-right p-20 bg-black-333">
        <div class="row text-center">
            <div class="col-md-12">
                <p class="font-11 text-black-777 m-0">Power By <a href="http://coms.ir"><i>Coms </i> </a>CMS</p>

            </div>
        </div>
    </div>
</footer>

<!-- Footer / End -->


<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/bootstrap/js/bootstrap.js"></script>

<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/common/common.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/jquery.validation/jquery.validation.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/jquery.gmap/jquery.gmap.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/jquery.lazyload/jquery.lazyload.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/isotope/jquery.isotope.min.js"
        type="text/javascript"></script>
<!--<script src="--><? //=$subdomian_add?><!--/new_template/--><? //="$tem_name/$defult_dir"?><!--/js/owl.carousel.js"></script>-->
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/owl.carousel/owl.carousel.js"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/vide/vide.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/video.js"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/audio.min.js"></script>


<!-- Theme Base, Components and Settings -->
<!--<script type="text/javascript" src="--><?//=$subdomian_add?><!--/new_template/--><?//="$tem_name/$defult_dir"?><!--/scripts/custom.js"></script>-->
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/theme.js"></script>

<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"
        type="text/javascript"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"
        type="text/javascript"></script>

<!-- Theme Initialization Files -->
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/theme.init.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/view.contact.js"></script>

<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/lightgallery-all.js"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/select2.min.js"></script>

<link rel="stylesheet" type="text/css"
      href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/component.css"/>

<link rel="stylesheet" type="text/css"
      href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/bootstrap-datepicker.min.css"/>
<link rel="stylesheet" type="text/css"
      href="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>


<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/slick.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/mmenu.min.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/custom.js"></script>
<script type="text/javascript"
        src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/rangeslider.min.js"></script>

<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/bootstrap-select.js"></script>

<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/jquery.lightbox_me.js"></script>
<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/jscolor.js"></script>



<script type="text/javascript">

    //
    $('.select2').select2({
        minimumResultsForSearch: -1
    });

</script>

<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/scripts/jquery.dlmenu.js"></script>
<script>
    $(function () {
        $('#dl-menu').dlmenu();
    });

    $("#style-switcher1 h2 a").click(function (e) {
        e.preventDefault();
        var div = $("#style-switcher1");
        console.log(div.css("left"));
        if (div.css("left") === "-65px") {
            $("#style-switcher1").animate({
                left: "0px"
            });
        } else {
            $("#style-switcher1").animate({
                left: "-65px"
            });
        }
    });

</script>

<!------------------------------------  Magnific Popup--------------------------------->
<script>

    $('.mfp-gallery-container').each(function () { // the containers for all your galleries

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

            gallery: {enabled: true, tCounter: ''}
        });
    });

    $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });

    $('.mfp-image').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-fade',
        image: {
            verticalFit: true
        }
    });

    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });

</script>


<!-------------------------------------------------start static sidebar -------------------->

<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/theia-sticky-sidebar.js"
        type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $('.leftSidebar, .content, .rightSidebar')
            .theiaStickySidebar({
                <?if (isset($madual_file_name) && $madual_file_name == 'new_news_text') echo "additionalMarginTop: 30"; else echo "additionalMarginTop: 90" ?>

            });
    });
</script>

<!-------------------------------------------------end static sidebar --------------------------->

<script>
    audiojs.events.ready(function () {
        var as = audiojs.createAll();
    });
</script>
<!--active menu-->
<script>
    $(document).ready(function () {

        // Get current page URL
        var url = window.location.href;

        // remove # from URL
        url = url.substring(0, (url.indexOf("#") == -1) ? url.length : url.indexOf("#"));

        // remove parameters from URL
        url = url.substring(0, (url.indexOf("?") == -1) ? url.length : url.indexOf("?"));

        // select file name
        url = url.substr(url.lastIndexOf("/") + 1);

        // If file name not avilable
        if (url == '') {
            url = '/';
        }
        $('.navigation a[href="' + window.location.pathname + '"]').parent('.dropdown').addClass('current');
    });
</script>
<!--End active menu-->
<!------------------------preloader-------------------->
<script>window.jQuery || document.write('<script src="<?= $subdomian_add ?>/new_template/<?= "$tem_name/$defult_dir" ?>/js/jquery-1.9.1.min.js"><\/script>')</script>
<script>
    <? $preload_time = get_tem_result($site, $la, "preload_time", '', $coms_conect); ?>
    $(document).ready(function() {

        setTimeout(function(){
            $('body').addClass('loaded');
            $('.H_preloader_style_div').addClass('hidden');
            $('.H_neshane_hiden').addClass('hidden');

            // $('h1').css('color','#222222');
        }, <?= $preload_time['title'] ?>);

    });
</script>
<!--header tabs-->
<script>
    $(document).ready(function () {
        $('ul.wp-megamenu-sub-menu .wpmm-vertical-tabs-nav ul li.H_tab1').hover(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            $('.wpmm-vertical-tabs .H_content_tab1').each(function () {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
            });
        });
        $('ul.wp-megamenu-sub-menu .wpmm-vertical-tabs-nav ul li.H_tab2').hover(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            $('.wpmm-vertical-tabs .H_content_tab2').each(function () {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
            });
        });
        $('ul.wp-megamenu-sub-menu .wpmm-vertical-tabs-nav ul li.H_tab3').hover(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            $('.wpmm-vertical-tabs .H_content_tab3').each(function () {
               $(this).addClass('active');
               $(this).siblings().removeClass('active');
            });

        });

        $('ul.wp-megamenu-sub-menu .wpmm-vertical-tabs-nav ul li.H_tab4').hover(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            $('.wpmm-vertical-tabs .H_content_tab4').each(function () {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
            });
        });
        $('ul.wp-megamenu-sub-menu .wpmm-vertical-tabs-nav ul li.H_tab5').hover(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            $('.wpmm-vertical-tabs .H_content_tab5').each(function () {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
            });
        });
        $('ul.wp-megamenu-sub-menu .wpmm-vertical-tabs-nav ul li.H_tab6').hover(function () {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            $('.wpmm-vertical-tabs .H_content_tab6').each(function () {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');
            });

        });
    })
</script>


</body>
</html>


<!--=======================================box 2 ======================-->
<?
$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$show_box2 = get_tem_result($defult_site, $defult_lang, "show_box2", 'drbanihosseini', $coms_conect);
if ($show_box2['pic_adress'] == 1) {

   $second_choice_box2_drbanihosseini = get_tem_result($defult_site, $defult_lang, "second_choice_box2_drbanihosseini", 'drbanihosseini', $coms_conect);
   if ($second_choice_box2_drbanihosseini['link'] > "") {

    $cat_id2 = $second_choice_box2_drbanihosseini["pic"];
    $Property2 = $second_choice_box2_drbanihosseini["text"];
    //echo $Property2;
    $numb2 = $second_choice_box2_drbanihosseini["pic_adress"];
    //echo $numb2;

    $table_name = get_result("select table_name from new_modules where id={$second_choice_box2_drbanihosseini['link']}", $coms_conect);
    $link_name = get_result("select link from new_modules where id={$second_choice_box2_drbanihosseini['link']}", $coms_conect);

    $name = '';
    if ($second_choice_box2_drbanihosseini['link'] != 9)
    $name = 'name';
    if ($second_choice_box2_drbanihosseini['link'] == 7)
    $name = 'title';
    $deatils = '';
    if ($second_choice_box2_drbanihosseini['link'] == 9)
    $deatils = ',deatils';
    $name = 'title';
    $duration = '';
    if ($second_choice_box2_drbanihosseini['link'] == 8)
    $duration = ',duration,deatils';
    if ($second_choice_box2_drbanihosseini['link'] == 1 || $second_choice_box2_drbanihosseini['link'] == 11)
    $duration = ',abstract';


    $query = "select title ,a.$name $duration $deatils ,a.id,la,site from $table_name a , new_modules_catogory b where  a.id>0 and la='$defult_lang'
    and site='$defult_site' and b.type={$second_choice_box2_drbanihosseini['link']} and a.id='$numb2'and b.page_id='$numb2' and   a.id=b.page_id and b.cat_id='$cat_id2'

    limit 0,1";
    //echo $query;
    $module_type = $second_choice_box2_drbanihosseini['link'];
    $result = $coms_conect->query($query);

    $module_type = $second_choice_box2_drbanihosseini['link'];

    while ($RS54 = $result->fetch_assoc()) {
    $sql1w1 = "select adress from new_file_path where type={$second_choice_box2_drbanihosseini['link']} and name='{$pic_arr[$module_type]}' and id ={$RS54['id']}";
    // echo $sql1w1;

    $result1q = $coms_conect->query($sql1w1);
    $roww1 = $result1q->fetch_assoc();
    $module_url = '';
    if ($second_choice_box2_drbanihosseini['title'] == 11 || $second_choice_box2_drbanihosseini['title'] == 1)
    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['name']);
    else
    $module_url = "/$link_name/{$RS54['la']}/{$RS54['id']}/" . insert_dash($RS54['title']);


    if ($second_choice_box2_drbanihosseini['link'] == 8 || $second_choice_box2_drbanihosseini['link'] == 9)
    $RS54['kholase'] = $RS54['deatils'];
    if ($second_choice_box2_drbanihosseini['link'] == 1 || $second_choice_box2_drbanihosseini['link'] == 11)
    $RS54['kholase'] = $RS54['abstract'];
    if ($second_choice_box2_drbanihosseini['link'] == 6)
    $RS54['kholase'] = $RS54['description'];
    ?>
    <section class="listar-themeparallax parallax1 parallax-02" style="background-image:url(<?if ($second_choice_box2_drbanihosseini['link'] == 8) {
                                         echo get_modual_pic_address($roww1['adress'], $RS54['site'], '', $second_choice_box2_drbanihosseini['title']);}else {echo  $roww1['adress'] ;}?>)" >
        <div class="listar-parallaxcolor">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-push-2 col-md-8 col-lg-push-2 col-lg-8">
                        <div class="listar-videobox listar-prettyPhoto">
                            <? $cat_name_box2 = get_result("select name from new_modules_cat where id='$cat_id2'", $coms_conect); ?>
                            <a href="/<?=$link_name?>/<?= $RS54['la'] ?>/category/<?= $cat_id2 ?>"><h2><?= $cat_name_box2 ?></h2></a>
                            <h3 class="H_h3"><?= $RS54['title'] ?></h3>
                            <figure>
                                <?if ($second_choice_box2_drbanihosseini['link'] == 8) { ?>
                                    <img title="<?= $RS54['title'] ?>"
                                         src="<?= get_modual_pic_address($roww1['adress'], $RS54['site'], '', $second_choice_box2_drbanihosseini['title']) ?>"
                                         class="" alt="<?= $RS54['title'] ?>">
                                    <figcaption>
                                        <a  href="<?=$module_url?>"><i class="play-video"></i></a>
                                    </figcaption>
                                    <?
                                } else { ?>
                                    <a href="<?=$module_url?>">
                                    <img title="<?= $RS54['title'] ?>" src="<?= $roww1['adress'] ?>"
                                         class="" alt="<?= $RS54['title'] ?>">
                                    </a>
                                    <?
                                } ?>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? }}}?>

<!--=======================================End box 2 ======================-->

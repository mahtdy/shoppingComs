<!--=======================================box 2 ======================-->
<?
$boxTwo = get_tem_result($site, $la, "boxTwo", 'drsheikhi-v2', $coms_conect);
if ($boxTwo['pic_adress'] == 1) {
    ?>
    <div class="space-medium t-100">
        <!-- space-medium -->
        <div class="container">

                    <div class="section-title text-center">
                        <h1><?= $boxTwo['title'] ?></h1>
                        <p><?= $boxTwo['text'] ?></p>
                    </div>

            <div class="">
                <?
                $count1_box_two_img = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='drsheikhi-v2' and name like 'box_two_img%' ", $coms_conect);
                for ($x = 1; $x <= $count1_box_two_img; $x++) {
                $box_two_img = get_tem_result($site, $la, "box_two_img$x", 'drsheikhi-v2', $coms_conect);
                if ($box_two_img['text'] > "") {
                ?>
                <div class="col-lg-2 col-sm-4 col-md-4 col-xs-12">
                    <div class="treatment-icon-block">
                        <div class="treatment-circle">
                            <a href="<?= $box_two_img["link"] ?>">
                                <img height="80" width="80" src="<?=$box_two_img["pic_adress"]?>" class="icon-human-hip">
                            </a>
                        </div>
                        <div class="treatment-caption">
                            <h2 class="treatment-title"><a href="<?= $box_two_img["link"] ?>" class="title"><?= $box_two_img["text"] ?></a></h2>
                        </div>
                    </div>
                </div>
             <?}}?>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <div class="text-center"> <a href="<?= $boxTwo["link"] ?>" class="btn_custom btn"><?= $boxTwo["pic"] ?></a> </div>
                </div>
            </div>
        </div>
    </div>
<? } ?>

<!--=======================================End box 2 ======================-->
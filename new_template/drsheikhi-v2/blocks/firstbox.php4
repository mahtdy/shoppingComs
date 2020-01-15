<!--=======================================box 1 ======================-->

<?
$boxOne_1 = get_tem_result($site, $la, "boxOne_1", 'drsheikhi-v2', $coms_conect);
$boxOne_2 = get_tem_result($site, $la, "boxOne_2", 'drsheikhi-v2', $coms_conect);
$boxOne_3 = get_tem_result($site, $la, "boxOne_3", 'drsheikhi-v2', $coms_conect);
$boxOne_4 = get_tem_result($site, $la, "boxOne_4", 'drsheikhi-v2', $coms_conect);
if ($boxOne_1['pic_adress'] == 1) {?>
<div class="vc_column-inner">
    <div class="container">
        <div class="box_one row">
            <div class="col-md-3 p0">
                <div class="services-content-wrapper bg_blue1">

                    <span class="icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>

                    <h3><span><?= $boxOne_1['title'] ?></span></h3>

                    <? $boxOne_1_table_networks = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='drsheikhi-v2' and name like 'boxOne_1_table%' ", $coms_conect);
                    for ($k = 1; $k <= $boxOne_1_table_networks; $k++) {
                    $boxOne_1_table = get_tem_result($site, $la, "boxOne_1_table$k", 'drsheikhi-v2', $coms_conect);
                    if ($boxOne_1_table['title'] > "") {
                    ?>
                      <div class="d-flex justify-content-between">
                          <div><?= $boxOne_1_table["title"] ?></div>
                          <div>-</div>
                          <div><?=number2farsi($boxOne_1_table["text"])?></div>
                      </div>
                    <?}}?>

                </div>
                <div class="services-inside ">
                    <a href="<?= $boxOne_1["link"] ?>" target="_blank"  class="button vamtam-button accent8  button-border hover-accent1 ">
                        <span class="btext"><?= $boxOne_1["pic"] ?><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 p0">
                <div class="services-content-wrapper bg_blue2">

                    <span class="icon"><i class="fa fa-calendar" aria-hidden="true"></i></span>

                    <h3><span><?= $boxOne_2['title'] ?></span></h3>

                    <p><?= $boxOne_2['text'] ?></p>

                </div>
                <div class="services-inside ">
                    <a href="<?= $boxOne_2["link"] ?>" target="_blank"  class="button vamtam-button accent8  button-border hover-accent1 ">
                        <span class="btext"><?= $boxOne_2["pic"] ?><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 p0">
                <div class="services-content-wrapper bg_blue3">

                    <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>

                    <h3><span><?= $boxOne_3['title'] ?></span></h3>

                    <p><?= $boxOne_3['text'] ?></p>

                </div>
                <div class="services-inside ">
                    <a href="<?= $boxOne_3["link"] ?>" target="_self"  class="button vamtam-button accent8  button-border hover-accent1 ">
                        <span class="btext"><?= $boxOne_3["pic"] ?><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>

            <div class="col-md-3 p0">
                <div class="services-content-wrapper bg_blue4">

                    <span class="icon"><i class="fa fa-medkit" aria-hidden="true"></i></span>

                    <h3><span><?= $boxOne_4['title'] ?></span></h3>

                    <h2 class="mb-0"><span class="color_firoz font24"><?=number2farsi($boxOne_4['pic_adress'])?></span></h2>

                    <p><?= $boxOne_4['text'] ?></p>

                </div>
                <div class="services-inside ">
                    <a href="<?= $boxOne_4["link"] ?>" target="_self"  class="button vamtam-button accent8  button-border hover-accent1 ">
                        <span class="btext"><?= $boxOne_4["pic"] ?><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<? } ?>
<!--============================end box1========================-->


<!--=======================================company_box=====================-->
<?
$boxSix = get_tem_result($site, $la, "boxSix", 'drsheikhi-v2', $coms_conect);
if ($boxSix['pic_adress'] == 1) {
    ?>
    <section class="box6 section">
        <div class="container">
            <div class="col-md-12 text-center">
                <h2 class=""><?= $boxSix['title'] ?></h2>
                <p class="mb-40 block-ellipsis font14 "><?= $boxSix['text'] ?></p>
            </div>
            <div class="row mb-xlg pb-xlg clear">
                <div class="content-grid pl-md pr-md">
                    <div class="content-grid-row">
                        <?
                        $count1_box_six_img = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='drsheikhi-v2' and name like 'box_six_img%' ", $coms_conect);
                        for ($x = 1; $x <= $count1_box_six_img; $x++) {
                        $box_six_img = get_tem_result($site, $la, "box_six_img$x", 'drsheikhi-v2', $coms_conect);
                        if ($box_six_img['text'] > "") {
                        ?>
                        <div class=" review-images Hwh mfp-gallery-container content-grid-item col-xs-6 col-md-2 center" style="height: 146px;">
                            <a href="<?=$box_six_img["pic_adress"]?>" class="mfp-gallery"><img src="<?=$box_six_img["pic_adress"]?>" alt="<?= $box_six_img["text"] ?>" class="img-responsive H_border" ></a>
                        </div>
                        <?}}?>

                    </div>
                </div>
            </div>




        </div>

    </section>

<? } ?>
<!--======================================= End company_box ======================-->





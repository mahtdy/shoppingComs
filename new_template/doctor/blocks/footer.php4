<footer id="footer" class="m-none">
    <div class="container">
        <? $footer1 = get_tem_result($site, $la, "footer1", $tem, $coms_conect); ?>
        <div class="row">
            <div class="col-md-3">
                <h4 class="mb-xlg"><?= $footer1['title'] ?></h4>
                <? for ($i = 1; $i <= 4; $i++) { ?>
                    <? $sub1_footer2 = get_tem_result($site, $la, "sub1_footer2$i", $tem, $coms_conect);
                    if ($sub1_footer2['title'] > "") { ?>

                        <span> <a href="<?= $sub1_footer2['link'] ?>"><?= $sub1_footer2['title'] ?></a> </span><br>

                    <?}}?>
            </div>
            <div class="col-md-3" style="margin: 0;">
                <div class="contact-details">
                    <h4 class="mb-xlg"><?= $footer1['text'] ?></h4>
                    <? for ($i = 1; $i <= 4; $i++) { ?>
                        <? $sub1_footer3 = get_tem_result($site, $la, "sub1_footer3$i", $tem, $coms_conect);
                        if ($sub1_footer3['title'] > "") { ?>
                            <a href="<?= $sub1_footer3['link'] ?>"><strong class="font-weight-light"><?= $sub1_footer3['title'] ?></strong></a> <br>

                        <?}}?>
                </div>
            </div>
            <div class="col-md-3">
                <h4 class="mb-xlg"><?= $footer1['pic'] ?></h4>
                <? $footer3 = get_tem_result($site, $la, "footer3", $tem, $coms_conect); ?>
                <p>
                    آدرس: <span><?= $footer3['pic_adress'] ?></span><br>
                    تلفن: <span><?= $footer3['text'] ?> </span><br>
                    ایمیل:<span> <a href="<?= $footer3['link'] ?>"><?= $footer3['pic'] ?></a> </span><br>
                </p>
            </div>
            <div class="col-md-3">
                <? if ($footer1['pic_adress'] > "") { ?>
                    <h4 class="mb-xlg"><?= $footer1['pic_adress'] ?></h4>

                    <? $Social_name = array('', 'facebook', 'twitter', 'gplus', 'vimeo');
                    for ($i = 1; $i <= 4; $i++) {
                        $Social_Networks = get_tem_result($site, $la, "Social_Networks$i", $tem, $coms_conect);
                        if ($Social_Networks['pic_adress'] > "") { ?>
                            <ul class="social-icons">
                                <li class="social-icons-<?= $Social_name[$i] ?>">
                                    <a href="<?= $Social_Networks['link'] ?>" target="_blank" title="<?= $Social_name[$i] ?>">
                                        <i class="fa fa-<?= $Social_name[$i] ?>"></i>
                                    </a>
                                </li>
                            </ul>
                        <? }} }?>

            </div>
        </div>
    </div>
    <div class="footer-copyright pt-md pb-md">
        <div class="container">
            <div class="row">
                <? $copy_write = get_tem_result($site, $la, "copy_write", $tem, $coms_conect); ?>
                <div class="col-md-12 center m-none">
                    <p><?= $copy_write['text'] ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Footer / End -->

<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/common/common.min.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/jquery.validation/jquery.validation.min.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/jquery.gmap/jquery.gmap.min.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/jquery.lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/isotope/jquery.isotope.min.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/magnific-popup/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/vide/vide.min.js" type="text/javascript"></script>
<!-- Theme Base, Components and Settings -->
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/theme.js" ></script>

<!-- Current Page Vendor and Views -->
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>

<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/custom.js" type="text/javascript"></script>
<script src="<?=$subdomian_add?>/new_template/<?="$tem_name/$defult_dir"?>/js/theme.init.js" ></script>


</body>
</html>

<!--=======================================box 9======================-->
<? $box9_header = get_tem_result($defult_site, $defult_lang, "box9_header", 'drbanihosseini', $coms_conect);
if ($box9_header['pic_adress'] == 1) {
    ?>
    <div class="content-box-03">
        <div class="faq-content-02">
            <div class="faq-content-02__wrapp">
                <h6 class="subtitle-03"><?= $box9_header['title'] ?></h6>
                <h3 class="title-04">
                    <span><?= $box9_header['pic'] ?></span>
                </h3>
                <div class="faq-content-02__text">
                    <p><?= $box9_header['text'] ?></p>
                </div>

                <p class="faq-content-02__location"><?= $box9_header['link'] ?></p>
                <? $email = get_tem_result($defult_site, $defult_lang, "email", 'drbanihosseini', $coms_conect); ?>
                <a class="faq-content-02__email" href="<?= $email['link'] ?>"><img height="25" width="170"
                                                                                   src="<?= $email['pic'] ?>"
                                                                                   alt="<?= $email['title'] ?>"></a>

                <? $count_links_nine = get_result("select count(id) from new_tem_setting where la='$defult_lang' and site='$defult_site' and tem_name='drbanihosseini' and name like 'links_nine%' ", $coms_conect);
                for ($k = 1; $k <= $count_links_nine; $k++) {
                    $links_nine = get_tem_result($defult_site, $defult_lang, "links_nine$k", 'drbanihosseini', $coms_conect);
                    if ($links_nine['title'] > "") {
                        ?>
                        <p class="faq-content-02__phone"><?= $links_nine["title"] ?>
                            <span><?= $links_nine["link"] ?></span>
                        </p>
                    <? }
                } ?>
            </div>
        </div>
        <div class="faq-content-03">
            <div class="contacts_map">
                <div id="singleListingMap-container " class="H_h580">

                    <iframe src="<?= get_result("SELECT address  FROM new_map_address where la='$defult_lang' and site='$defult_site'", $coms_conect) ?>"
                            width="100%" height="625" frameborder="0" style="border:0;height: 100%;width: 100%;"
                            allowfullscreen="">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

<? } ?>
<!--=======================================box4 ======================-->
<?$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
$boxFour = get_tem_result($defult_site, $defult_lang, "boxFour", 'drsheikhi-v2', $coms_conect);
if ($boxFour['pic_adress'] == 1) {
    ?>
    <div class="box4 cta" style="background-image: url('<?=$boxFour["pic"]?>')">
        <div class="dark_bg"></div>
                <div class="about text-center">

                    <div class="cta-title"><span class="white"><?= $boxFour['title'] ?></span></div>
                    <p class="yellow"><?= $boxFour['link'] ?></p>

                    <p class="white cta-text"><? $boxFour['text'] = str_replace('src="source', 'src="/source', $boxFour['text']);
                        $boxFour['text'] = str_replace('img src="source', 'img src="/source', $boxFour['text']);
                        $boxFour['text'] = str_replace('<source src="source', '<source src="/source', $boxFour['text']);
                        $boxFour['text'] = str_replace('<a href="source', '<a href="/source', $boxFour['text']);
                        $boxFour['text'] = str_replace('<a href="content', '<a href="/content', $boxFour['text']);
                        $boxFour['text'] = str_replace('<a href="video', '<a href="/video', $boxFour['text']);
                        $boxFour['text'] = str_replace('<img src="yep_theme', '<img src="/yep_theme', $boxFour['text']);
                        $boxFour['text'] = str_replace('<audio src="source', '<audio src="/source', $boxFour['text']);
                        $boxFour['text'] = str_replace('<video ', '<video width="100%" height="100%"', $boxFour['text']);
                        $boxFour['text'] = str_replace('href="source', 'href="/source', $boxFour['text']);
                        echo $boxFour['text'] . '<br>';

                        ?>
                    </p>
                </div>

    </div>
<? } ?>
<!--=======================================End box4 ======================-->









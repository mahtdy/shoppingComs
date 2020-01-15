<div class="block hidden-xs">
    <div class="header">
        <h5 class="H_block_h3 H_center"><span><?= $view_last_news ?></span></h5>
    </div>
    <div class="content type_title_block H_p0">
        <ul class="H_bg H_mt05">
            <? $icon_array = array("fa-newspaper-o", "fa-play-circle-o", "fa-pencil-square-o", "fa-youtube-play", "fa-camera");
            $news_type_array = array("10001", "10010", "10000", "10100", "11000");
            $query1 = "select  a.name,a.news_type,a.title ,a.la,a.id from new_news a
									where    site='$site' and la='$la' and status=1   and publish_date<=now()
									 order by a.id desc limit 0,10";
            $result1 = $coms_conect->query($query1);
            while ($rowe1 = $result1->fetch_assoc()) {
                ?>
                <li class="H_font13 H_ptb10">
                    <a href="/news/<?= "{$rowe1['la']}/{$rowe1['id']}/" . insert_dash($rowe1['name']) ?>">
<!--                        <span class="fa --><?//= $icon_array[array_search($rowe1['news_type'], $news_type_array)] ?><!--"></span>-->
                        <span><?= $rowe1['title'] ?></span>
                    </a>
                </li>
            <? } ?>
        </ul>
    </div>
</div>
<div class="block hidden-xs">
    <div class="header">
        <h5 class="H_block_h3 H_center"><span><?= $view_last_news_text ?></span></h5>
    </div>
    <div class="content title-block H_p0">
        <ul class="H_bg H_mt05">
            <? $query1 = "select  a.title ,a.la,a.id from new_news a
									where    site='$site' and la='$la' and status=1   and publish_date<=now() and news_type='10000'
									 order by a.id desc limit 0,10";
            $result1 = $coms_conect->query($query1);
            while ($rowe1 = $result1->fetch_assoc()) {
                ?>
                <li class="H_font13 H_ptb10">
                    <a href="/news/<?= "{$rowe1['la']}/{$rowe1['id']}/" . insert_dash($rowe1['title']) ?>"><?= $rowe1['title'] ?></a>
                </li>
            <? } ?>
        </ul>
    </div>
</div>
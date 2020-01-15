<div class="block hidden-xs">
    <div class="header">
        <h5 class="H_block_h3 H_center"><span><?= $view_last_news_video ?></span></h5>
    </div>
    <div class="content video-block H_p0">
        <ul>
            <? $query1 = "select  title,a.la ,a.id,b.adress from new_news a ,new_file_path b 
			where b.name='news_video'  and site='$site' and la='$la' and status=1 and b.type=1 and a.id=b.id  and publish_date<=now()
			group by b.id order by a.id desc limit 0,5";

            $result1 = $coms_conect->query($query1);
            //echo $query1;
            while ($rowss = $result1->fetch_assoc()) {

                ?>
                <li class="H_mbc">
                    <div>
                        <a href="/news/<?= "{$rowss['la']}/{$rowss['id']}/" . insert_dash($rowss['title']) ?>"
                           class="hvr-grow">
                            <img height="180" width="300"
                                 src="/<?= get_news_modual_address($rowss['id'], $coms_conect) ?>">
                        </a>
                        <div class="H_p15">
                            <a href="/news/<?= "{$rowss['la']}/{$rowss['id']}/" . insert_dash($rowss['title']) ?>">
                                <span class="H_font13"><?=$rowss['title']?></span>
                            </a>
                        </div>
                    </div>
                </li>
            <? } ?>
        </ul>
    </div>
</div>
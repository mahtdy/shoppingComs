<div class="block hidden-xs">
    <div class="header">
        <h5 class="H_block_h3 H_center"><span><?= $view_visit_video_cat ?></span></h5>
    </div>
    <div class="content video-block H_p0">
        <ul>
            <? if ($subdomian_add == 0 || get_result("select count(id) from new_modules_cat where id=$subdomian_add and type=1", $coms_conect) == 0)
                echo '';
            else {
                $queryw1 = "select a.duration,b.adress, a.title ,a.la,a.id from new_news a  ,new_file_path b ,new_modules_catogory c
												where   b.name='news_image'  and site='$site' and la='$la' and status=1 and b.type=1 and a.id=b.id
												and a.id=c.page_id and c.type=1 and c.cat_id=$subdomian_add
												group by c.page_id
												order by a.view desc limit 0,10";
                $result1 = $coms_conect->query($queryw1);
                while ($rowss = $result1->fetch_assoc()) {
                    ?>
                    <li class="H_font13 H_ptb10">
                        <a href="/news/<?= "{$rowss['la']}/{$rowss['id']}/" . insert_dash($rowss['title']) ?>"><?= $rowss['title'] ?></a>
                    </li>
                <?
                }
            } ?>
        </ul>
    </div>
</div>
 
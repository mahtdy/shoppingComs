<div class="block hidden-xs">
    <div class="header" style="margin-right: 10px;">
        <h5 class="H_block_h3 H_center"><span><?= $view_visit_video_cat ?></span></h5>
    </div>
    <div class="content video-block H_p0">
        <ul class="H_bg H_mt05">
            <? if ($cat_id == 0 || get_result("select count(id) from new_modules_cat where id=$cat_id and type=8", $coms_conect) == 0)
                echo ' ';
            else {
                $queryw1 = "select a.duration,b.adress, a.title ,a.la,a.id from new_video a  ,new_file_path b ,new_modules_catogory c
						where   b.name='video_videos'  and site='$site' and la='$la' and status=1 and b.type=8 and a.id=b.id
						and a.id=c.page_id and c.type=8 and c.cat_id=$cat_id
						group by c.page_id
						order by a.view desc limit 0,5";
                $result1 = $coms_conect->query($queryw1);
                while ($rowss = $result1->fetch_assoc()) { ?>
                    <li class="H_mt5 H_b0">
                        <div class="row">
                            <div class="col-md-4 H_p0">
                                <a href="/video/<?= "{$rowss['la']}/{$rowss['id']}/" . insert_dash($rowss['title']) ?>"
                                   class="hvr-grow">
                                    <img height="95" width="95" src="<?= get_modual_address($rowss['id'], $coms_conect) ?>">
                                    <p><?= $rowss['duration']; ?></p>
                                </a>
                            </div>
                            <div class="col-md-8">
                            <a href="/video/<?= "{$rowss['la']}/{$rowss['id']}/" . insert_dash($rowss['title']) ?>">
                                <h4 class="H_font13"><?= $rowss['title'] ?></h4>
                            </a>
                            </div>
                        </div>
                    </li>
                <?
                }
            } ?>
        </ul>
    </div>
</div>
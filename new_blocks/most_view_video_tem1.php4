<div class="block hidden-xs">
    <div class="header">
        <h5 class="H_block_h3 H_center"><span><?= $view_visit_video ?></span></h5>
    </div>
    <div class="content video-block H_p0 bg-white">
        <ul>
            <? $queryw1 = "select a.duration,b.adress, a.title ,a.la,a.id from new_video a  ,new_file_path b
											where   b.name='video_videos'  and site='$site' and la='$la' and status=1 and b.type=8 and a.id=b.id
											order by a.view desc limit 0,3";
            $result1 = $coms_conect->query($queryw1);
            //echo $query1;
            while ($rowss = $result1->fetch_assoc()) {
                ?>
                <li class="H_mt5 H_b0">
                    <div class="row">
                        <div class=" col-md-4 H_p0">
                        <a href="/video/<?= "{$rowss['la']}/{$rowss['id']}/" . insert_dash($rowss['title']) ?>"
                           class="hvr-grow">
                            <img height="95" width="95" src="<?= get_modual_address($rowss['id'], $coms_conect) ?>">
<!--                            <p>--><?//= $rowss['duration']; ?><!--</p>-->
                        </a>
                        </div>
                        <div class="col-md-8">
                            <a href="/video/<?= "{$rowss['la']}/{$rowss['id']}/" . insert_dash($rowss['title']) ?>">
                                <h4 class="H_font13"><?= $rowss['title'] ?></h4>
                            </a>
                        </div>
                </li>
            <? } ?>
        </ul>
    </div>
</div>

<div class="block hidden-xs">
    <div class="header" >
        <h5 class="H_block_h3 H_center"><span><?=$view_last_gallery_video?></span></h5>
    </div>
    <div class="content video-block H_p0 ">
        <ul>
            <?$query1="select a.duration,b.adress, a.title ,a.la,a.id from new_video a  ,new_file_path b
				where   b.name='video_videos'  and site='$site' and la='$la' and status=1 and b.type=8 and a.id=b.id
			group by b.id order by a.id desc limit 0,5";
            $result1 = $coms_conect->query($query1);
            //echo $query1;
            while($rowss = $result1->fetch_assoc()) {
                ?>
                <li class="H_mbc">
                    <div>
                        <a href="/video/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>" class="hvr-grow">
                            <img height="180" width="300" src="<?=get_modual_address($rowss['id'],$coms_conect)?>">
                            <p><?=$rowss['duration'];?></p>
                        </a>
                    </div>
                    <div class="H_p15">
                        <a href="/video/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['title'])?>">
                            <span class="H_font13"><?=$rowss['title']?></span>
                        </a>
                    </div>
                </li>
            <?}?>
        </ul>
    </div>
</div>
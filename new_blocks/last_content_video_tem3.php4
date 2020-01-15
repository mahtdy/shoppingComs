<div class="block hidden-xs">
    <div class="header">
        <h5 class="H_block_h3 H_center"><span><?=$view_last_content_video?></span></h5>
    </div>
    <div class="content video-block H_p0 bg-white">
        <ul class="H_bg2 H_mt05">
            <?$query1="select  a.name,title,a.la ,a.id,b.adress from new_content a ,new_file_path b 
			where b.name='content_video'  and site='$site' and la='$la' and status=1 and b.type=11 and a.id=b.id  and publish_date<=now()
			group by b.id order by a.id desc limit 0,5";

            $result1 = $coms_conect->query($query1);
            //echo $query1;
            while($rowss = $result1->fetch_assoc()) {

                ?>
                <li class="H_p15 H_mb0">
                    <div class="row H_mb0">
                        <div class=" col-md-3 H_p0">
                            <a href="/content/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['name'])?>" class="hvr-grow">
                                <img height="70" width="70" src="/<?=get_content_modual_address($rowss['id'],$coms_conect)?>">
                            </a>
                        </div>
                        <div class="col-md-9 H_font13">
                            <a href="/content/<?="{$rowss['la']}/{$rowss['id']}/".insert_dash($rowss['name'])?>">
                                <?=$rowss['title']?>
                            </a>
                        </div>
                    </div>
                </li>
            <?}?>
        </ul>
    </div>
</div>
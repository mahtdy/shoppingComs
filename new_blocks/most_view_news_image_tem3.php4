<div class="block hidden-xs">
    <div class="header">
        <h5 class="H_block_h3 H_center"><span><?=$most_view_news_image?></span></h5>
    </div>
    <div class="content post-block H_p0 bg-white">
        <ul class="H_bg2 H_mt05">
            <?$queryw1="select  a.la,a.title,a.id,b.adress from new_news a ,new_file_path b  
			where b.name='news_gallery'  and
			 
			site='$site' and la='$la' and status=1 and b.type=1 and a.id=b.id  and publish_date<=now()
			group by b.id order by a.view desc limit 0,5";
            $resultw1 = $coms_conect->query($queryw1);
            //echo $queryw1;
            while($rows3s = $resultw1->fetch_assoc()) {?>
            <li class="H_p15 H_mb0">
                <div class="row H_mb0">
                    <div class="col-md-3 H_p0"">
                    <a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>" class="hvr-grow">
                        <img height="70" width="70" src="<?=$rows3s['adress']?>">
                    </a>
                </div>
                <div class="col-md-9 H_font13">
                    <a href="/news/<?="{$rows3s['la']}/{$rows3s['id']}/".insert_dash($rows3s['title'])?>">
                       <?=$rows3s['title']?>
                    </a>
                </div>
    </div>
    </li>
    <?}?>
    </ul>
</div>
</div>
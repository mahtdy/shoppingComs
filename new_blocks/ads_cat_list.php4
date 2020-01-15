                    <aside class="col-md-12 hidden-sm pull-right animated fadeIn">
                        <section class="block-col">

                            <div class="block hidden-xs">
                                <div class="header">
                                    <h3><span><?=$view_list_subject?></span></h3>
                                </div>
                                <div class="content ads_cats">
                                    <ul><?$sqwl="SELECT a.name,a.id,count(b.cat_id)as count  FROM new_modules_cat a,new_modules_catogory b where a.type=18 and a.status=1 and a.parent_id=0
												and b.type=18 and a.id=b.cat_id  group by cat_id";
										 $resulwt = mysql_query($sqwl);
										 while($rowa = mysql_fetch_array($resulwt)){?>
                                        <li><i class="fa fa-folder"></i><a
                                                href="/ads/<?="{$_SESSION['la']}/cat_id/{$rowa['id']}"?>"><span><?=$rowa['name']?></span></a><span class="amar"><?=$rowa['count']?></span>
                                        </li>
                                       <?}?>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </aside>
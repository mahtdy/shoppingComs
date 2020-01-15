<?


//echo 'new_dynamics/defult/new_company.php4';
//echo 'ff';
$type=19;

@session_start();
if($madual_page_id=='')
    $madual_page_id=1;
$paging=($madual_page_id*9)-8;
$_SESSION['content_order']=1;
view_module(19,$coms_conect);
?>
<section class="breadcrumb-sec animated fadeIn">
    <div class="container">
        <ol class="breadcrumb rtl">
            <li><a href="/"><span class="fa fa-home"></span></a></li>
            <li class="active"><a href='<?="/company/$madual_lang"?>'><?=$view_company_list?></a></li>
<!--            --><?//=$view_company_list;?>
        </ol>
    </div>
</section>
<!-- Start Page Title -->
<div class="ptitle">
    <div class="container">
        <span class="fa fa-newspaper-o"></span>
        <h1 class="title"><?=$view_company_list?></h1>
        <span class="pdesc"> </span>
    </div>
</div>
<!-- End Page Title -->
<div class="container">
    <main>
        <?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m'  and tem_name='$tem_name' and file_name=1 and pages_id=11 and la='$defult_lang' and status=1";
        $result23 = $coms_conect->query($query23);
        $RS23 = $result23->fetch_assoc();
        $center=$RS23['center'];
        if($center=='')$center=12;
        if(get_modual_setting_result($defult_site,$defult_lang,'content_have_ads',$coms_conect))
            $center=$center-2;
        if($RS23['right_block']>0){
            echo ' <aside class="col-md-'.$RS23['right_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
            create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'r',$coms_conect);
            echo '	</aside>
						</section>';
        }//exit;?>

        <aside class="col-md-<?=$center?> col-sm-4 col-xs-12 pull-right animated fadeIn">
            <section class="block-col">
                <?if($RS23['center']>0){?>
                    <?create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'c',$coms_conect);?>
                <?}?>
                <!-- Start Main -->
                <div class="row">
                    <article class="col-md-12 col-sm-8 pull-right animated fadeIn">
                        <?$query1="select a.abstract,a.name,a.date,a.la,a.title,a.id,b.adress from new_company a ,new_file_path b 
						where b.name='content_image'  and site='$site' and la='$madual_lang' and status=1 and b.type=19 and a.id=b.id  
						group by b.id order by a.id desc limit 0,1";
//                        echo $query1;
                        $result1 = $coms_conect->query($query1);
//                        print_r($result);
                        while($row1 = $result1->fetch_assoc()) {
                            $row1['date']=miladitojalalitime(date('Y-m-d h:i:s',$row1['date']));
                            ?>
                            <section class="vige_news">
                                <div class="row">
                                    <div class="title col-sm-6 col-xs-12 pull-right rtl">
                                        <h4><?=$row1['name']?></h4>
                                        <a href="<?="/company/{$row1['la']}/{$row1['id']}/".insert_dash($row1['title'])?>"><h3><?=$row1['title']?></h3></a>
                                        <p><?=$row1['abstract']?></p>
                                    </div>
                                    <div class="photo col-sm-6 col-xs-12 pull-right rtl">
                                        <a href="<?="/company/{$row1['la']}/{$row1['id']}/".insert_dash($row1['title'])?>" class="hvr-grow"><img src="<?=$row1['adress']?>"></a>
                                    </div>
                                </div>
                            </section>
                        <?}?>
                        <section class="content">
                            <div class="row">
                                <section class="col-md-12 list">
                                    <div id="switchshow">
                                        <div class="option">
                                            <div class="row">

                                                <div class="col-md-10 col-sm-12 pull-right pr0">
                                                    <form class="row">

                                                        <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                                                            <select id="content_order"  class="form-control input-sm" style="font-size: 9pt;">
                                                                <option <?if($_SESSION['content_order']==1) echo 'selected';?> value='1'><?=$view_new_prev?></option>
                                                                <option <?if($_SESSION['content_order']==0) echo 'selected';?> value='0'><?=$view_past_next?></option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 form-group">
                                                            <select id='content_type' class="form-control input-sm"  style="font-size: 9pt;">
                                                                <option value='0' <?if($_SESSION['content_type0']==0) echo 'selected';?>><?=$sc_contentTitle_All?></option>
                                                                <option value='1' <?if($_SESSION['content_type0']==1) echo 'selected';?>><?=$view_content_last_month?></option>
                                                                <option value='2' <?if($_SESSION['content_type0']==2) echo 'selected';?>><?=$view_content_last_week?></option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <script>
                                                    $("#content_type").change(function () {
                                                        $("#waiting").show();
                                                        $("#show_result").empty();
                                                        $.ajax({
                                                            type:'POST',
                                                            url:'/New_members_ajax.php',
                                                            data:"action=company_change&id="+$(this).val()+"&value="+$("#content_order").val(),
                                                            success: function(result){
                                                                $("#waiting").hide();
                                                                $("#show_result").html(result);
                                                            }
                                                        });
                                                    });
                                                    $("#content_order").change(function () {
                                                        $("#waiting").show();
                                                        $("#show_result").empty();
                                                        $.ajax({
                                                            type:'POST',
                                                            url:'/New_members_ajax.php',
                                                            data:"action=company_change&id="+$("#content_type").val()+"&value="+$("#content_order").val(),
                                                            success: function(result){
                                                                $("#waiting").hide();
                                                                $("#show_result").html(result);
                                                            }
                                                        });
                                                    });
                                                    $(document).ready(function () {
                                                        $("#waiting").show();
                                                        $("#show_result").empty();
                                                        $.ajax({
                                                            type:'POST',
                                                            url:'/New_members_ajax.php',
                                                            data:"action=company_change&id="+$("#content_type").val()+"&value="+$("#content_order").val(),
                                                            success: function(result){
                                                                $("#waiting").hide();
                                                                $("#show_result").html(result);
                                                            }
                                                        });
                                                    });
                                                    // listbox and gridbox
                                                    $(document).ready(function() {
                                                        $('#lbtn').click(function(event){event.preventDefault();$('#show_result .item').addClass('list-group-item');});
                                                        $('#gbtn').click(function(event){event.preventDefault();$('#show_result .item').removeClass('list-group-item');$('#show_result .item').addClass('grid-group-item');});

                                                    });
                                                </script>
                                                <style>
                                                    .glyphicon { margin-right:5px; }
                                                    .thumbnail
                                                    {
                                                        margin-bottom: 20px;
                                                        padding: 0px;
                                                        -webkit-border-radius: 0px;
                                                        -moz-border-radius: 0px;
                                                        border-radius: 0px;
                                                    }

                                                    .item.list-group-item
                                                    {
                                                        float: none;
                                                        width: 100%;
                                                        background-color: #fff;
                                                        margin-bottom: 10px;
                                                    }
                                                    .item.list-group-item .list-group-image
                                                    {
                                                        margin-right: 10px;
                                                    }
                                                    .item.list-group-item .thumbnail
                                                    {
                                                        margin-bottom: 0px;
                                                        border: 0;
                                                    }
                                                    .item.list-group-item .caption
                                                    {
                                                        padding: 9px 9px 0px 9px;
                                                    }
                                                    .item.list-group-item:before, .item.list-group-item:after
                                                    {
                                                        display: table;
                                                        content: " ";
                                                    }

                                                    .item.list-group-item img
                                                    {
                                                        float: right;
                                                        width: 400px;
                                                        height: 250px;
                                                    }
                                                    .item.list-group-item:after
                                                    {
                                                        clear: both;
                                                    }
                                                    .list-group-item-text
                                                    {
                                                        margin: 0 0 11px;
                                                    }
                                                    .grid-group-item{
                                                        float:right;
                                                    }
                                                    .inner{
                                                        height: 30px;
                                                        position: relative;
                                                        right: 10px;
                                                    }
                                                    .thumbnail a>img, .thumbnail>img {
                                                        margin-right: auto;
                                                        margin-left: auto;
                                                        width: 400px;
                                                        height: 200px;
                                                </style>
                                                <!-- end listbox and gridbox-->
                                                <div class="col-md-2 col-sm-12 hidden-xs pull-left pr0 tcenter">

                                                    <button id="gbtn" class="gridbtn deact">
                                                        <span class="fa fa-th-large"></span>
                                                    </button>
                                                    <button id="lbtn" class="listbtn">
                                                        <span class="fa fa-th-list"></span>
                                                    </button>
                                                </div>
                                            </div>


                                        </div>



                                        <?/*?>
									<?################################################################
												//$query ="select count(*) as cnt from dynamic_news,combo,subsites where dynamic_news.site_id=subsites.site_id and subsites.la='$la' and dynamic_news.catid=combo.id and combo.cat='news' and dynamic_news.stat=1 and dynamic_news.la='$la' and combo.la='$la'  $skstr order by dynamic_news.id";
												$sql1 = "SELECT count(a.id) as cnt from new_news a ,new_file_path b where
												b.name='news_image'  and a.status=1 and b.type=1 and a.id=b.id and a.la='$madual_lang' and a.site='$site' and publish_date<='$now'";
												$result = $coms_conect->query($sql1);
												$RS = $result->fetch_assoc();
												$a=new_pgsel((int)$madual_page_id,$RS["cnt"],9,9,"$root/news/$madual_lang/page");
												$from=$a[0];
												$to=$a[1];
												$pgsel=$a[2];
												?>
										<?$query="select view,mudoal_lock,adress,abstract,a.name,title,la,a.id,publish_date from new_news a ,new_file_path b where
										b.name='news_image'  and status=1 and b.type=1 and a.id=b.id and la='$madual_lang' and site='$site' and publish_date<='$now'
										 group by a.id  order by a.id desc LIMIT $from,$to";

											$result = $coms_conect->query($query);$i=$paging;
												while($row = $result->fetch_assoc()) {?>
                                                <!----------------------- item ----------------------->
                                                <li class="col-md-4 col-sm-6 griditem animated fadeIn">
                                                    <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" class="hvr-grow"><img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                                                    <h4><?=$row['name']?></h4>
                                                    <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><h3 id="gridtitr<?=$i?>" class="gridtitrlc"><?=$row['title']?></h3></a>
												    <p><span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']))?><span class="fa fa-eye"></span> <?=$row['view']?></p>
                                                </li>
                                                <li class="col-md-4 col-sm-6 listitem animated fadeIn">
                                                    <div class="row">
                                                        <div class="col-md-4 col-sm-4 pull-right pl0">
                                                            <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>" class="hvr-grow"><img alt='<?=$row['title']?>' src="<?=$row['adress']?>"></a>
                                                        </div>
                                                        <div class="col-md-8 col-sm-8 pull-right rtl">
                                                            <h4><?=$row['name']?></h4>
                                                            <a href="<?="/news/{$row['la']}/{$row['id']}/".insert_dash($row['title'])?>"><h3 id="listtitr<?=$i?>" class="titrlc"><?=$row['title']?></h3></a>
                                                            <p id="listtext<?=$i?>" class="kholase textlc"><?=$row['abstract']?></p>
                                                        </div>
                                                        <div class="col-xs-12 pull-right rtl">
                                                            <p><span class="fa fa-clock-o"></span> <?=miladitojalaliuser(date("Y-m-d H:i:s",$row['publish_date']));?><span class="fa fa-eye"></span> 365نفر</p>
                                                        </div>
                                                    </div>
                                                </li>
												<?$i++;}?>
												<?*/?>

                                        <img id="waiting" src='/waiting.gif' style="display:none">
                                        <div id="show_result">
                                        </div>
                                    </div>

                            </div>

                        </section>
                        <section class="col-md-3 sidebar">
                        </section>
                </div>
            </section>
            </article>


            <!-- Start Right Sidebar -->
            <?/*?>
                    <aside class="col-md-3 col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">
                        </section>
                    </aside>
					<?*/?>

            <script>
                $(document).ready(function () {
                    var j=<?=$paging?>;
                    $('.gridtitrlc').each(function(i, obj) {
                        var $class =  $("#gridtitr"+j);
                        var $len = $class.html().length;
                        var $titrstr = $class.html();
                        var $max = 74;
                        var $titrstrtemp = $titrstr.substr(0,$max);
                        if ($len > $max) {
                            $titrstr = $titrstrtemp + '<span class="textlimit-dots"> ...</span>' + '<span class="textlimit">' + $titrstr.substr($max,$titrstr.length) + '</span>';
                            $class.html($titrstr);
                        }
                        j++;
                    });
                });

                ///////////Titr Limiter/////////////
                $(document).ready(function () {
                    var j=<?=$paging?>;
                    $('.titrlc').each(function(i, obj) {
                        var $class =  $("#listtitr"+j);
                        var $str_class =  $("#listtext"+j);
                        var $len = $class.html().length;
                        var $str_len = $str_class.html().length;
                        var $titrstr = $class.html();
                        var $max = 70;
                        var $titrstrtemp = $titrstr.substr(0,$max);
                        if (($len > $max && $str_len>200)||($len>100)) {
                            $titrstr = $titrstrtemp + '<span class="textlimit-dots"> ...</span>' + '<span class="textlimit">' + $titrstr.substr($max,$titrstr.length) + '</span>';
                            $class.html($titrstr);
                        }
                        j++;
                    });
                });


                ///////////text Limiter/////////////
                $(document).ready(function () {
                    var j=<?=$paging?>;
                    $('.textlc').each(function(i, obj) {
                        var $str_class =  $("#listtitr"+j);
                        var $class =  $("#listtext"+j);
                        var $len = $class.html().length;
                        var $str_len = $str_class.html().length;
                        var $textstr = $class.html();
                        var $max = 200;
                        var $textstrtemp = $textstr.substr(0,$max);
                        if ($len > $max  && $str_len>70) {
                            $textstr = $textstrtemp + '<span class="textlimit-dots"> ...</span>' + '<span class="textlimit">' + $textstr.substr($max,$textstr.length) + '</span>';
                            $class.html($textstr);
                        }
                        j++;
                    });
                });


            </script>

        </aside>
        </section>

        <?if($RS23['left_block']>0){
            echo ' <aside class="col-md-'.$RS23['left_block'].' col-sm-4 col-xs-12 pull-right animated fadeIn">
                        <section class="block-col">';
            create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,$tem_name,$RS23['id'],'l',$coms_conect);
            echo '	</aside>
						</section>';
        }?>
        <?if(get_modual_setting_result($defult_site,$defult_lang,'content_have_ads',$coms_conect)){?>
            <aside class="col-md-2 hidden-sm hidden-xs pull-left animated fadeIn">
                <section class="block-col">
                    <div class="block">
                        <div class="content ads-col">
                            <?$query="select title,link,pic_adress from new_tem_setting where name='content_have_ads'  and la='$defult_lang' and site='$defult_site'";
                            $result = $coms_conect->query($query);
                            while($RS = $result->fetch_assoc()) {?>
                                <a href="<?=$RS['link']?>" title='<?=$RS['title']?>'><img src="<?=$RS['pic_adress']?>"></a>
                            <?}?>
                        </div>
                    </div>
                </section>
            </aside>
        <?}?>

    </main>

    <!-- end main row -->

    <!-- end main -->
</div>
<!-- End main container -->
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/component.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/bootstrap-datepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/jquery.Bootstrap-PersianDateTimePicker.css"/>
<link rel="stylesheet" type="text/css" href="<?=$subdomian_add?>/new_template/default/<?=$defult_dir?>/css/select2/select2.min.css">

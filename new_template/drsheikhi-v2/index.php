<? $_SESSION['add_contact_us_pm'] = 0; ?>
<? $call_us_text = get_tem_result($defult_site, $defult_lang, 'call_us_text', 'default', $coms_conect); ?>


<?
function limitWord($string, $limit)
{
    $words = explode(" ", $string);

    $output = implode(" ", array_splice($words, 0, $limit));
    return $output;
}

?>
<? if ($defult_site == 'main') {
    include("new_template/drsheikhi-v2/" . 'blocks/header.php4');
} else
    include("../new_template/drsheikhi-v2/" . '/blocks/header.php4');
$dir = "rtl";
$_SESSION['site'] = $site;
$_SESSION['la'] = $la;


$pic_arr = array('1' => 'news_image', '8' => 'video_pic', '9' => 'galery_pic', '11' => 'content_image', '7' => 'article_image', '6' => 'download_pic');
?>
<!--***********preloder**************-->
<? $preload = get_tem_result($site, $la, "preload", '', $coms_conect);
if ($preload['pic_adress'] == 1) {
    ?>
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="H_neshane_hiden">
            <img class="H_style_img_preloader lozad" data-src="<?= $preload['text'] ?>" alt="<?= $preload['title'] ?>">
        </div>
        <div class="container H_preloader_style_div">
            <h4 class="H_preloader_style"><?= $preload['title'] ?></h4>
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
<? } ?>
<!--***********End preloder**************-->

<main class="">

    <!-- slide show-->
    <? $query = "SELECT *  FROM new_slideshow where la='$defult_lang' and site='$defult_site' and
					start_date<=$now and finish_date>=$now order by id desc limit 0,30";
    $result = $coms_conect->query($query);
    $RS1 = $result->fetch_assoc();
    ?>
    <div id="jssor_1" class="trans_none HM_height" style="position:relative;min-width:100%;overflow:hidden;height:<?= $RS1['height'] ?>px;">

        <!-- Loading Screen -->

        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:100px;height:100px;" src="<?=$RS1['slide_preload'] ?>" />
        </div>

        <div data-u="slides" class="trans_none HM_height" style="position:absolute;top:0;left:0px;min-width:100%;overflow:hidden; height:<?= $RS1['height'] ?>px;">

            <? $query = "SELECT * FROM new_slideshow where la='$defult_lang' and site='$defult_site' and
					start_date<=$now and finish_date>=$now order by id desc limit 0,30";
            // echo $query;
            $result = $coms_conect->query($query);
            while ($RS1 = $result->fetch_assoc()) {

                ?>
                <div >
                    <a href="<?=$RS1['slide_img_link'] ?>" class="z-0"> <img data-u="image" height="<?= $RS1['height'] ?>" width="100%" class="HM_h250_w100" src="<?=$RS1['slide_img1'] ?>" /></a>
                    <?if($RS1["select_type"]==3){?>
                        <div data-u="thumb">
                            <img data-u="thumb" class="i" src="<?=$RS1['slide_img1'] ?>" />
                            <span class="ti"><?=$RS1['title'] ?></span><br />
                        </div>

                    <?}?>
                    <?if($RS1["select_type"]==2){?>
                        <div data-u="thumb"><?=$RS1['title'] ?></div>
                    <?}?>
                    <div data-3d="2"  style="position:absolute;top:20px;width: 100% ">
                        <?if($RS1['title']>""){?>
                            <div data-t="11" class="HM_plr15 HM_font15 HM_t0 HM_center"  style="position:absolute;top:<?=$RS1['top_title'] ?>px;padding: 0 100px;width:100%;font-size:<?=$RS1['size_title'] ?>px;text-align:<?=$RS1['pos_texts'] ?>;font-weight: bold">
                                <a href="<?=$RS1['link_title'] ?>" style="color:#<?=$RS1['color_title'] ?>;"><?=$RS1['title'] ?></a></div>
                        <?}if($RS1['text1']>""){?>
                            <div  data-t="12"  class="HM_plr15 HM_font13 HM_t40 HM_center" style="position:absolute;top:<?=$RS1['top_text1'] ?>px;padding: 0 100px;width:100%;font-size:<?=$RS1['size_text1'] ?>px;text-align:<?=$RS1['pos_texts'] ?>;font-weight: bold">
                                <a href="<?=$RS1['link_text1'] ?>" style="color:#<?=$RS1['color_text1'] ?>;"><?=$RS1['text1'] ?></a></div>
                        <?}if($RS1['text2']>""){?>
                            <div data-t="13"  class="HM_plr15 HM_font11 HM_t80 HM_center" style="position:absolute;top:<?=$RS1['top_text2'] ?>px;padding: 0 100px;width:100%;font-size:<?=$RS1['size_text2'] ?>px;text-align:<?=$RS1['pos_texts'] ?>;font-weight: bold">
                                <a href="<?=$RS1['link_text2'] ?>" style="color:#<?=$RS1['color_text2'] ?>;"><?=$RS1['text2'] ?></a></div>
                        <?}if($RS1['text3']>""){?>
                            <div data-t="9" style="position:absolute;top:<?=$RS1['top_text3'] ?>px;padding: 0 100px;width:100%;font-size:<?=$RS1['size_text3'] ?>px;text-align:<?=$RS1['pos_texts'] ?>;font-weight: bold" class="trans_none HM_plr15 HM_font9 HM_t120 HM_center">
                                <a href="<?=$RS1['link_text3'] ?>" style="color:#<?=$RS1['color_text3'] ?>;"><?=$RS1['text3'] ?></a></div>
                        <?}?>
                    </div>
                </div>
            <?}?>
        </div>

        <? $query = "SELECT * FROM new_slideshow where la='$defult_lang' and site='$defult_site' and
					start_date<=$now and finish_date>=$now ";
        $result = $coms_conect->query($query);
        $RS1 = $result->fetch_assoc();
        if($RS1["select_type"]==1){
            if($RS1["type_bullet"]==1){?>
                <div data-u="navigator" class="jssorb033" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                    <div data-u="prototype" class="i" style="width:16px;height:16px;">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <path class="b" d="M11400,13800H4600c-1320,0-2400-1080-2400-2400V4600c0-1320,1080-2400,2400-2400h6800 c1320,0,2400,1080,2400,2400v6800C13800,12720,12720,13800,11400,13800z"></path>
                        </svg>
                    </div>
                </div>
            <?}if($RS1["type_bullet"]==2){?>
                <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                    <div data-u="prototype" class="i" style="width:16px;height:16px;">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                        </svg>
                    </div>
                </div>
            <?}if($RS1["type_bullet"]==3){?>
                <div data-u="navigator" class="jssorb071" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                    <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
                        <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                            <circle class="b" cx="8000" cy="8000" r="6666.7"></circle>
                        </svg>
                        <div data-u="numbertemplate" class="n"></div>
                    </div>
                </div>
            <?}?>


            <!-- Arrow Navigator -->
            <?if($RS1["type_arrow"]==13){?>
                <div data-u="arrowleft" class="jssora093 HM_t200" style="width:50px;height:50px;top:42%;left:10px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                        <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                        <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora093 HM_t200" style="width:50px;height:50px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                        <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                        <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==14){?>
                <div data-u="arrowleft" class="jssora094 HM_t200" style="width:50px;height:50px;top:42%;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                        <polyline class="a" points="7777.8,6080 5857.8,8000 7777.8,9920 "></polyline>
                        <line class="a" x1="10142.2" y1="8000" x2="5857.8" y2="8000"></line>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora094 HM_t200" style="width:50px;height:50px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="5920"></circle>
                        <polyline class="a" points="8222.2,6080 10142.2,8000 8222.2,9920 "></polyline>
                        <line class="a" x1="5857.8" y1="8000" x2="10142.2" y2="8000"></line>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==5){?>
                <div data-u="arrowleft" class="jssora092 HM_t200" style="width:24px;height:40px;top:42%;left:-1px;" data-autocenter="2" data-scale="0.75" data-scale-left="0">
                    <svg viewBox="-199 -3000 9600 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="c" d="M-199-2428.1C317.2-2538.7,851.8-2600,1401-2600c4197.3,0,7600,3402.7,7600,7600 s-3402.7,7600-7600,7600c-549.2,0-1083.8-61.3-1600-171.9V-2428.1z"></path>
                        <polygon class="a" points="4806.7,1528.5 4806.7,1528.5 4806.7,2707.8 2691.1,5000 4806.7,7292.2 4806.7,8471.5 4806.7,8471.5 1602,5000 "></polygon>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora092 HM_t200" style="width:24px;height:40px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0">
                    <svg viewBox="-199 -3000 9600 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="c" d="M9401,12428.1c-516.2,110.6-1050.8,171.9-1600,171.9c-4197.3,0-7600-3402.7-7600-7600 s3402.7-7600,7600-7600c549.2,0,1083.8,61.3,1600,171.9V12428.1z"></path>
                        <polygon class="a" points="7401,5000 4196.3,8471.5 4196.3,8471.5 4196.3,7292.2 6311.9,5000 4196.3,2707.8 4196.3,1528.5 4196.3,1528.5 "></polygon>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==6){?>
                <div data-u="arrowleft" class="jssora091 HM_t200" style="width:24px;height:40px;top:42%;left:-1px;" data-autocenter="2" data-scale="0.75" data-scale-left="0">
                    <svg viewBox="-199 -3000 9600 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="c" d="M-199-2428.1C317.2-2538.7,851.8-2600,1401-2600c4197.3,0,7600,3402.7,7600,7600 s-3402.7,7600-7600,7600c-549.2,0-1083.8-61.3-1600-171.9V-2428.1z"></path>
                        <polygon class="a" points="4806.7,1528.5 4806.7,1528.5 4806.7,2707.8 2691.1,5000 4806.7,7292.2 4806.7,8471.5 4806.7,8471.5 1602,5000 "></polygon>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora091 HM_t200" style="width:24px;height:40px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0">
                    <svg viewBox="-199 -3000 9600 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="c" d="M9401,12428.1c-516.2,110.6-1050.8,171.9-1600,171.9c-4197.3,0-7600-3402.7-7600-7600 s3402.7-7600,7600-7600c549.2,0,1083.8,61.3,1600,171.9V12428.1z"></path>
                        <polygon class="a" points="7401,5000 4196.3,8471.5 4196.3,8471.5 4196.3,7292.2 6311.9,5000 4196.3,2707.8 4196.3,1528.5 4196.3,1528.5 "></polygon>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==3){?>
                <div data-u="arrowleft" class="jssora081 HM_t200" style="width:30px;height:40px;top:42%;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="2000 0 12000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="c" d="M4800,14080h6400c528,0,960-432,960-960V2880c0-528-432-960-960-960H4800c-528,0-960,432-960,960 v10240C3840,13648,4272,14080,4800,14080z"></path>
                        <path class="a" d="M6860.8,8102.7l1693.9,1693.9c28.9,28.9,63.2,43.4,102.7,43.4s73.8-14.5,102.7-43.4l379-379 c28.9-28.9,43.4-63.2,43.4-102.7c0-39.6-14.5-73.8-43.4-102.7L7926.9,8000l1212.2-1212.2c28.9-28.9,43.4-63.2,43.4-102.7 c0-39.6-14.5-73.8-43.4-102.7l-379-379c-28.9-28.9-63.2-43.4-102.7-43.4s-73.8,14.5-102.7,43.4L6860.8,7897.3 c-28.9,28.9-43.4,63.2-43.4,102.7S6831.9,8073.8,6860.8,8102.7L6860.8,8102.7z"></path>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora081 HM_t200" style="width:30px;height:40px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="2000 0 12000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="c" d="M11200,14080H4800c-528,0-960-432-960-960V2880c0-528,432-960,960-960h6400 c528,0,960,432,960,960v10240C12160,13648,11728,14080,11200,14080z"></path>
                        <path class="a" d="M9139.2,8102.7L7445.3,9796.6c-28.9,28.9-63.2,43.4-102.7,43.4c-39.6,0-73.8-14.5-102.7-43.4 l-379-379c-28.9-28.9-43.4-63.2-43.4-102.7c0-39.6,14.5-73.8,43.4-102.7L8073.1,8000L6860.8,6787.8 c-28.9-28.9-43.4-63.2-43.4-102.7c0-39.6,14.5-73.8,43.4-102.7l379-379c28.9-28.9,63.2-43.4,102.7-43.4 c39.6,0,73.8,14.5,102.7,43.4l1693.9,1693.9c28.9,28.9,43.4,63.2,43.4,102.7S9168.1,8073.8,9139.2,8102.7L9139.2,8102.7z"></path>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==4){?>
                <div data-u="arrowleft" class="jssora082 HM_t200" style="width:30px;height:40px;top:42%;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="2000 0 12000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="c" d="M4800,14080h6400c528,0,960-432,960-960V2880c0-528-432-960-960-960H4800c-528,0-960,432-960,960 v10240C3840,13648,4272,14080,4800,14080z"></path>
                        <path class="a" d="M6860.8,8102.7l1693.9,1693.9c28.9,28.9,63.2,43.4,102.7,43.4s73.8-14.5,102.7-43.4l379-379 c28.9-28.9,43.4-63.2,43.4-102.7c0-39.6-14.5-73.8-43.4-102.7L7926.9,8000l1212.2-1212.2c28.9-28.9,43.4-63.2,43.4-102.7 c0-39.6-14.5-73.8-43.4-102.7l-379-379c-28.9-28.9-63.2-43.4-102.7-43.4s-73.8,14.5-102.7,43.4L6860.8,7897.3 c-28.9,28.9-43.4,63.2-43.4,102.7S6831.9,8073.8,6860.8,8102.7L6860.8,8102.7z"></path>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora082 HM_t200" style="width:30px;height:40px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="2000 0 12000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="c" d="M11200,14080H4800c-528,0-960-432-960-960V2880c0-528,432-960,960-960h6400 c528,0,960,432,960,960v10240C12160,13648,11728,14080,11200,14080z"></path>
                        <path class="a" d="M9139.2,8102.7L7445.3,9796.6c-28.9,28.9-63.2,43.4-102.7,43.4c-39.6,0-73.8-14.5-102.7-43.4 l-379-379c-28.9-28.9-43.4-63.2-43.4-102.7c0-39.6,14.5-73.8,43.4-102.7L8073.1,8000L6860.8,6787.8 c-28.9-28.9-43.4-63.2-43.4-102.7c0-39.6,14.5-73.8,43.4-102.7l379-379c28.9-28.9,63.2-43.4,102.7-43.4 c39.6,0,73.8,14.5,102.7,43.4l1693.9,1693.9c28.9,28.9,43.4,63.2,43.4,102.7S9168.1,8073.8,9139.2,8102.7L9139.2,8102.7z"></path>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==12){?>
                <div data-u="arrowleft" class="jssora074 HM_t200" style="width:50px;height:50px;top:42%;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora074 HM_t200" style="width:50px;height:50px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==11){?>
                <div data-u="arrowleft" class="jssora073 HM_t200" style="width:50px;height:50px;top:42%;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora073 HM_t200" style="width:50px;height:50px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==2){?>
                <div data-u="arrowleft" class="jssora072 HM_t200" style="width:25px;height:25px;top:42%;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M4800,8000c0,192.6,70.4,359.3,211.1,500l4977.8,4977.8c140.7,140.7,307.4,211.1,500,211.1 c192.6,0,359.3-70.4,500-211.1c140.7-140.7,211.1-307.4,211.1-500V3022.2c0-192.6-70.4-359.2-211.1-500 c-140.7-140.8-307.4-211.1-500-211.1c-192.6,0-359.3,70.3-500,211.1L5011.1,7500C4870.4,7640.7,4800,7807.4,4800,8000L4800,8000z"></path>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora072 HM_t200" style="width:25px;height:25px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M11200,8000c0,192.6-70.4,359.3-211.1,500l-4977.8,4977.8c-140.7,140.7-307.4,211.1-500,211.1 s-359.3-70.4-500-211.1c-140.7-140.7-211.1-307.4-211.1-500V3022.2c0-192.6,70.4-359.2,211.1-500c140.7-140.8,307.4-211.1,500-211.1 s359.3,70.3,500,211.1L10988.9,7500C11129.6,7640.7,11200,7807.4,11200,8000L11200,8000z"></path>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==1){?>
                <div data-u="arrowleft" class="jssora071 HM_t200" style="width:25px;height:25px;top:42%;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M4800,8000c0,192.6,70.4,359.3,211.1,500l4977.8,4977.8c140.7,140.7,307.4,211.1,500,211.1 c192.6,0,359.3-70.4,500-211.1c140.7-140.7,211.1-307.4,211.1-500V3022.2c0-192.6-70.4-359.2-211.1-500 c-140.7-140.8-307.4-211.1-500-211.1c-192.6,0-359.3,70.3-500,211.1L5011.1,7500C4870.4,7640.7,4800,7807.4,4800,8000L4800,8000z"></path>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora071 HM_t200" style="width:25px;height:25px;top:42%;right:0;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <path class="a" d="M11200,8000c0,192.6-70.4,359.3-211.1,500l-4977.8,4977.8c-140.7,140.7-307.4,211.1-500,211.1 s-359.3-70.4-500-211.1c-140.7-140.7-211.1-307.4-211.1-500V3022.2c0-192.6,70.4-359.2,211.1-500c140.7-140.8,307.4-211.1,500-211.1 s359.3,70.3,500,211.1L10988.9,7500C11129.6,7640.7,11200,7807.4,11200,8000L11200,8000z"></path>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==7){?>
                <div data-u="arrowleft" class="jssora103 HM_t200" style="width: 50px; height: 50px; top: 42%; left: 0px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75" data-jssor-button="1" data-nofreeze="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6240"></circle>
                        <path class="a" d="M5738.1,7867.2l2689.6-2689.5c38.5-38.4,82.8-57.8,132.8-57.8c50,0,94.3,19.3,132.8,57.8l288.5,288.6 c38.5,38.5,57.7,82.7,57.7,132.8c0,50.1-19.2,94.3-57.7,132.8L6713.5,8000.1l2268.2,2268.3c38.5,38.5,57.7,82.7,57.7,132.7 c0,50.1-19.2,94.3-57.7,132.8l-288.5,288.5c-38.5,38.5-82.7,57.7-132.8,57.7c-50,0-94.3-19.2-132.8-57.7L5738.2,8132.8 c-38.4-38.4-57.7-82.7-57.7-132.8S5699.6,7905.8,5738.1,7867.2z"></path>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora103 HM_t200" style="width: 50px; height: 50px; top: 42%; right: 0; " data-autocenter="2" data-scale="0.75" data-scale-right="0.75" data-jssor-button="1" data-nofreeze="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6240"></circle>
                        <path class="a" d="M10261.9,7867.2L7572.3,5177.8c-38.5-38.4-82.8-57.8-132.8-57.8c-50,0-94.3,19.3-132.8,57.8l-288.5,288.6 c-38.5,38.5-57.7,82.7-57.7,132.8c0,50.1,19.2,94.3,57.7,132.8l2268.2,2268.2l-2268.2,2268.3c-38.5,38.5-57.7,82.7-57.7,132.7 c0,50.1,19.2,94.3,57.7,132.8l288.5,288.5c38.5,38.5,82.7,57.7,132.8,57.7c50,0,94.3-19.2,132.8-57.7l2689.5-2689.5 c38.4-38.4,57.7-82.7,57.7-132.8S10300.4,7905.8,10261.9,7867.2z"></path>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==8){?>
                <div data-u="arrowleft" class="jssora104 HM_t200" style="width: 50px; height: 50px; top: 42%; left: 0px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75" data-jssor-button="1" data-nofreeze="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6240"></circle>
                        <path class="a" d="M5738.1,7867.2l2689.6-2689.5c38.5-38.4,82.8-57.8,132.8-57.8c50,0,94.3,19.3,132.8,57.8l288.5,288.6 c38.5,38.5,57.7,82.7,57.7,132.8c0,50.1-19.2,94.3-57.7,132.8L6713.5,8000.1l2268.2,2268.3c38.5,38.5,57.7,82.7,57.7,132.7 c0,50.1-19.2,94.3-57.7,132.8l-288.5,288.5c-38.5,38.5-82.7,57.7-132.8,57.7c-50,0-94.3-19.2-132.8-57.7L5738.2,8132.8 c-38.4-38.4-57.7-82.7-57.7-132.8S5699.6,7905.8,5738.1,7867.2z"></path>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora104 HM_t200" style="width: 50px; height: 50px; top:42%; right: 0; " data-autocenter="2" data-scale="0.75" data-scale-right="0.75" data-jssor-button="1" data-nofreeze="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6240"></circle>
                        <path class="a" d="M10261.9,7867.2L7572.3,5177.8c-38.5-38.4-82.8-57.8-132.8-57.8c-50,0-94.3,19.3-132.8,57.8l-288.5,288.6 c-38.5,38.5-57.7,82.7-57.7,132.8c0,50.1,19.2,94.3,57.7,132.8l2268.2,2268.2l-2268.2,2268.3c-38.5,38.5-57.7,82.7-57.7,132.7 c0,50.1,19.2,94.3,57.7,132.8l288.5,288.5c38.5,38.5,82.7,57.7,132.8,57.7c50,0,94.3-19.2,132.8-57.7l2689.5-2689.5 c38.4-38.4,57.7-82.7,57.7-132.8S10300.4,7905.8,10261.9,7867.2z"></path>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==9){?>
                <div data-u="arrowleft" class="jssora105 HM_t200" style="width: 50px; height: 50px; top: 42%; left: 0px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75" data-jssor-button="1" data-nofreeze="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                        <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora105 HM_t200" style="width: 50px; height: 50px; top: 42%; right: 0; " data-autocenter="2" data-scale="0.75" data-scale-right="0.75" data-jssor-button="1" data-nofreeze="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                        <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                    </svg>
                </div>
            <?}if($RS1["type_arrow"]==10){?>
                <div data-u="arrowleft" class="jssora106 HM_t200" style="width: 50px; height: 50px; top:42%; left: 0px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75" data-jssor-button="1" data-nofreeze="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                        <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                    </svg>
                </div>
                <div data-u="arrowright" class="jssora106 HM_t200" style="width: 50px; height: 50px;top:42%;  right: 0px; " data-autocenter="2" data-scale="0.75" data-scale-right="0.75" data-jssor-button="1" data-nofreeze="1">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;left:0;width:100%;height:100%;">
                        <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                        <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                        <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                    </svg>
                </div>
            <?}
        }?>

        <?if($RS1["select_type"]==2){?>
            <div data-u="thumbnavigator" class="col-md-12 col-xs-12" style="position:absolute;bottom:0px;left:0px;height:50px;color:#FFF;overflow:hidden;cursor:default;background-color:rgba(0,0,0,.5);">
                <div data-u="slides">
                    <div data-u="prototype" style="position:absolute;top:0;left:0;min-width:400px;height:50px;text-align: center">
                        <div data-u="thumbnailtemplate" style="position:absolute;top:0;left:0;width:100%;height:100%;font-weight:normal;line-height:50px;font-size:16px;padding-left:10px;box-sizing:border-box;"></div>
                    </div>
                </div>
            </div>
            <div data-u="arrowleft" class="jssora106 HM_t200" style="width: 50px; height: 50px; top: 42%; left: 0px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75" data-jssor-button="1" data-nofreeze="1">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                    <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                    <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora106 HM_t200" style="width: 50px; height: 50px; top: 42%; right: 0px; " data-autocenter="2" data-scale="0.75" data-scale-right="0.75" data-jssor-button="1" data-nofreeze="1">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                    <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                    <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                </svg>
            </div>

        <?}?>

        <?if($RS1["select_type"]==3){?>
            <div data-u="thumbnavigator" class="jssort121 hidden-xs" style="position:absolute;left:0px;top:0px;width:268px;height:250px;overflow:hidden;cursor:default;" data-autocenter="2" data-scale-left="0.75">
                <div data-u="slides">
                    <div data-u="prototype" class="p" style="width:268px;height:68px;">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                </div>
            </div>
            <!-- Bullet Navigator -->
            <div data-u="navigator" class="jssorb111" style="position:absolute;bottom:12px;right:12px;" data-scale="0.5">
                <div data-u="prototype" class="i" style="width:24px;height:24px;font-size:12px;line-height:24px;">
                    <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;z-index:-1;">
                        <circle class="b" cx="8000" cy="8000" r="3000"></circle>
                    </svg>
                    <div data-u="numbertemplate" class="n"></div>
                </div>
            </div>
        <?}?>


    </div>

    <!-- End slide show-->


    <div class="">
        <? $query23 = "select id,left_block,right_block,center from new_blocks_sorts where type='m' and pages_id=2 and tem_name='drsheikhi-v2'";
        $result23 = $coms_conect->query($query23);
        $RS23 = $result23->fetch_assoc();

        //echo $query23;
        ?>
        <div class="col-md-<?= $RS23['right_block'] ?> ">
            <? if ($RS23['right_block'] > 0) {
                create_location($subdomian_add, $defult_dir, $defult_site, $defult_lang, 'drsheikhi-v2', $RS23['id'], 'r', $coms_conect);
            }//exit;?>
        </div>
        <div class="col-md-<?= $RS23['center'] ?> p0">
            <? if ($RS23['center'] > 0) {
                create_location($subdomian_add, $defult_dir, $defult_site, $defult_lang, 'drsheikhi-v2', $RS23['id'], 'c', $coms_conect);
            } ?>
        </div>

        <div class="col-md-<?= $RS23['left_block'] ?>">
            <? if ($RS23['left_block'] > 0) {
                create_location($subdomian_add, $defult_dir, $defult_site, $defult_lang, 'drsheikhi-v2', $RS23['id'], 'l', $coms_conect);
            } ?>
        </div>
    </div>


</main>
<!--light box-->
<? $box_lightbox_header = get_tem_result($site, $la, "box_lightbox_header", '', $coms_conect);
if ($box_lightbox_header['pic_adress'] == 1) {
    ?>
    <div class="copyright-text">
        <p class="HM_center H_text-l">
            <!--                <a id="show_light_box" class=" H_neshane scroll-to-top hidden-mobile visible" data-toggle="modal"-->
            <!--                   data-target="#myModal"> <i> -->
            <? //= $box_lightbox_header['text'] ?><!-- </i>&nbsp;-->
            <!--                </a>-->
        <div id="light_box" class="H_modal ">

            <div class="modal-dialog H_fixed H_l25_t5">
                <div class="modal-content H_pb40 ">
                    <div class="row H_mlr0">
                        <? if ($box_lightbox_header['title'] > "") {
                            ?>
                            <div class="col-md-12 center">
                                <h3 class="H_mt12 mb-none"><?= $box_lightbox_header['title'] ?></h3>
                                <div class="divider divider-primary divider-small divider-small-center ">
                                    <hr>
                                </div>
                            </div>
                        <? } ?>
                        <button type="button" class="close H_style_close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <img id="waiting" class="lozad" data-src='/waiting.gif' style="display:none">
                    <div id="show_result_light" class="payoff-deck theme--secondary"></div>

                    <div class="row H_center_mt40">
                        <button type="button" id="next" class="glyphicon glyphicon-circle-arrow-right">
                        </button>
                        <button type="button" id="previous" class="glyphicon glyphicon-circle-arrow-left">
                        </button>
                    </div>

                </div>
            </div>
        </div>

        </p>
    </div>


<? } ?>
<!--End light box-->
<? if ($defult_site == 'main') {
    include("new_template/drsheikhi-v2/" . 'blocks/footer.php4');
} else
    include("../new_template/drsheikhi-v2/" . '/blocks/footer.php4');
$dir = "rtl";
?>


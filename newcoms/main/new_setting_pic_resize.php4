<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link rel="stylesheet"      href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/default/<?= $dir ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.min.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<script src="/yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/yep_theme/default/rtl/js/zozo.tabs.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">

<link type="text/css" href="../../new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="../../new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../new_orakuploader/orakuploader.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/H_style.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/zozo.tabs.min.css">




<?


if ($_GET['lang_filter'] > "")
    $la = injection_replace($_GET["lang_filter"]);
else
    $la = injection_replace($_POST["manage_lang_filter"]);
if ($la == '')
    $la = $default_lang;
//echo $la;

if ($_GET['site_filter'] > "")
    $site = injection_replace($_GET["site_filter"]);
else
    $site = injection_replace($_POST["manage_site_filter"]);
if ($site == '')
    $site = $default_site;


//print_r($_POST);


########################################################### شروع ثبت و ذخیره اندازه تغییر عکسها و مسیر آنها  ########################################################

//$modual_type=injection_replace_pic($_POST["header_modual_type"]);.
$query11="SELECT id from new_modules ";
//echo $query11;exit;
$result11 = $coms_conect->query($query11);
$ai=0;
while ($row12 = $result11->fetch_assoc()) {
    $modual_type_save[$ai]=$row12['id'];
$ai++;}

$mw=count($modual_type_save)-1;
$mw=$mw;
//echo $mw;
$m=0;
$v='-';
//foreach ($m as $mw)
while ( $m <= $mw){
//    echo count($modual_type_save);
$header1_link_count = injection_replace_pic($_POST["header1_link_count{$modual_type_save[$m]}"]);
//echo ' ='.$header1_link_count.'= ';
if($header1_link_count=='')$header1_link_count=0;
    for ($x = 1; $x <= $header1_link_count; $x++) {
        $v='-'.$x;
    $id_pic = injection_replace_pic($_POST["id_pic{$modual_type_save[$m]}{$v}"]);
    $width_pic = injection_replace_pic($_POST["width_pic{$modual_type_save[$m]}{$v}"]);
    $height_pic = injection_replace_pic($_POST["height_pic{$modual_type_save[$m]}{$v}"]);
    $quality_pic = injection_replace_pic($_POST["quality_pic{$modual_type_save[$m]}{$v}"]);
    $address_link_pic = injection_replace_pic($_POST["address_link_pic{$modual_type_save[$m]}{$v}"]);
//echo $m.$x;

        if ($address_link_pic > "")
        {
            if (is_dir($address_link_pic)==false)
                mkdir($address_link_pic,0777,true);
        insert_update_PSR($id_pic, $site, $la, $width_pic, $height_pic, $quality_pic, $address_link_pic, $modual_type_save[$m], $coms_conect);
        }
    }
    $m++;
}

########################################################### پایان ثبت و ذخیره اندازه تغییر عکسها و مسیر آنها  END  ########################################################
?>
<div class="panel-body H_pt0">
    <form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form"
          enctype="multipart/form-data">
        <input type="hidden" name="send_flag" value="1">

<div class="msheet tab-content">
    <div class="secfhead">
        <!-- #section:content/contenttext.head -->
        <div class="sectitle">
            <div class="icon"><span class="flaticon-text150" style=""></span>
            </div>
            <div class="title"><p class="titr">تنظیمات عکس</p><p class="lead">امکان مدیریت و تنظیمات سایز عکس در قسمت اصلی  ماژول ها در این قسمت فراهم شده است.</p>
            </div>
        </div>
        <!-- /section:content/contenttext.head -->
        <div class="toolmenu">
            <ul>
                <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

                </li>
            </ul>
        </div>
    </div>






<div class="row H_mt30">
    <div class="col-md-12">
        <div id="clean-demo" class="tabbed-nav hover contained medium z-icons-dark z-shadows z-bordered z-tabs horizontal top top-left silver" data-options=""><ul class="z-tabs-nav z-tabs-desktop H_float_r z-hide-menu">
                <li date-culom-id="1" class="z-tab H_style_header H_float_r z-first z-active" data-link="tab1">
                    <a class="z-link">تنظیمات مربوط به عکس ماژول ها</a>
                </li>

            </ul>
            <input type="hidden" name="temp_tab" value="tab2">
            <input type="hidden" name="number_tab" value="H_input_rename_block7">
            <input type="hidden" name="num_con_tab" value="content7">


            <div class="h-content2  z-container" style="">

                <div class="z-content tab1 z-active" style="position: relative; display: block; left: 0px;">
                    <div class="z-content-inner">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                            <div   class="list-group">
                                <a id="H_input_rename_header_one" href="#" class="list-group-item  active text-center ">
                                    <span id="span1" class="temp">ماژول محتوا</span>
                                    <span data-original-title=" ویرایش " class="H_rename_header_one H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                    <span data-original-title="ذخیره " class="H_rename_header_one_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                    <input type="text" value="" class="form-control H_pos_hw H_input_rename_header_one H_dis_none" name="block_header_one_name" placeholder="نام جدید خود را وارد کنید">
                                </a>
                                <a id="H_input_rename_header2" href="#" class="list-group-item  text-center ">
                                    <span id="span2" class="temp">ماژول خبر</span>
                                    <span data-original-title=" ویرایش " class="H_rename_header H_pos_color">
<span class="edit flaticon-note32 "></span>
</span>
                                    <span data-original-title="ذخیره " class="H_rename_header_save H_pos_color H_dis_none">
<i class="fa fa-save"></i>
</span>
                                    <input type="text" value="" class="form-control H_pos_hw H_input_rename_header H_dis_none" name="block_name_header" placeholder="نام جدید خود را وارد کنید">
                                </a>
                                <a id="H_input_rename_header3" href="#" class="list-group-item  text-center ">
                                    <span id="span3" class="temp">ماژول دانلود</span>
                                    <span data-original-title=" ویرایش " class="H_rename_header H_pos_color">
<span class="edit flaticon-note32 "></span>
</span>
                                    <span data-original-title="ذخیره " class="H_rename_header_save H_pos_color H_dis_none">
<i class="fa fa-save"></i>
</span>
                                    <input type="text" value="" class="form-control H_pos_hw H_input_rename_header H_dis_none" name="block_name_header" placeholder="نام جدید خود را وارد کنید">
                                </a>
                                <a id="H_input_rename_header4" href="#" class="list-group-item  text-center ">
                                    <span id="span4" class="temp">ماژول مقاله</span>
                                    <span data-original-title=" ویرایش " class="H_rename_header H_pos_color">
<span class="edit flaticon-note32 "></span>
</span>
                                    <span data-original-title="ذخیره " class="H_rename_header_save H_pos_color H_dis_none">
<i class="fa fa-save"></i>
</span>
                                    <input type="text" value="" class="form-control H_pos_hw H_input_rename_header H_dis_none" name="block_name_header" placeholder="نام جدید خود را وارد کنید">
                                </a>
                                <a id="H_input_rename_header5" href="#" class="list-group-item  text-center ">
                                    <span id="span5" class="temp">ماژول ویدئو</span>
                                    <span data-original-title=" ویرایش " class="H_rename_header H_pos_color">
<span class="edit flaticon-note32 "></span>
</span>
                                    <span data-original-title="ذخیره " class="H_rename_header_save H_pos_color H_dis_none">
<i class="fa fa-save"></i>
</span>
                                    <input type="text" value="" class="form-control H_pos_hw H_input_rename_header H_dis_none" name="block_name_header" placeholder="نام جدید خود را وارد کنید">
                                </a>
                                <a id="H_input_rename_header6" href="#" class="list-group-item  text-center ">
                                    <span id="span6" class="temp">ماژول گالری تصاویر</span>
                                    <span data-original-title=" ویرایش " class="H_rename_header H_pos_color">
<span class="edit flaticon-note32 "></span>
</span>
                                    <span data-original-title="ذخیره " class="H_rename_header_save H_pos_color H_dis_none">
<i class="fa fa-save"></i>
</span>
                                    <input type="text" value="" class="form-control H_pos_hw H_input_rename_header H_dis_none" name="block_name_header" placeholder="نام جدید خود را وارد کنید">
                                </a>


                            </div>
                        </div>
                        <div  class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">
                            <div id="header1" class="bhoechie-tab-content H1 active">
                                <!--                -->

                                <script>
                                    $(document).ready(function () {


                                        $("#header1").addClass('active');});

                              // $("#H_input_rename_header_one").click(function () {
                                  var w = document.getElementById("span1").outerText;
                                  w= w.replace('ماژول','');

$.ajax({
													type:'POST',
													url:'New_ajax_pic_setting.php',
													data:"action=ok&modual_type=11&modual_name="+w+"&la=<?=$la?>&site=<?=$site?>",
													success: function(result){
    $("#header1").html(result);
} });
// });
                            </script>
                            </div>
                            <div id="header2" class="bhoechie-tab-content H1 ">
                                <script>
                                    // $("#H_input_rename_header2").attr('id',true);

                                    $("#H_input_rename_header2").click(function () {
                                        var w = document.getElementById("span2").outerText;
                                        w= w.replace('ماژول','');

                                        $.ajax({
                                            type:'POST',
                                            url:'New_ajax_pic_setting.php',
                                            data:"action=ok&modual_type=1&modual_name="+w+"&la=<?=$la?>&site=<?=$site?>",
                                            success: function(result){
                                                $("#header2").html(result);
                                            } });});
                                </script>
                            </div>
                            <div id="header3" class="bhoechie-tab-content H1 ">
                                <script>
                                    $("#H_input_rename_header3").click(function () {
                                        var w = document.getElementById("span3").outerText;
                                        w= w.replace('ماژول','');

                                        $.ajax({
                                            type:'POST',
                                            url:'New_ajax_pic_setting.php',
                                            data:"action=ok&modual_type=6&modual_name="+w+"&la=<?=$la?>&site=<?=$site?>",
                                            success: function(result){
                                                $("#header3").html(result);
                                            } });});
                                </script>
                            </div>
                            <div id="header4" class="bhoechie-tab-content H1 ">
                                <script>
                                    $("#H_input_rename_header4").click(function () {
                                        var w = document.getElementById("span4").outerText;
                                        w= w.replace('ماژول','');
                                        // alert('w='+w);

                                        $.ajax({
                                            type:'POST',
                                            url:'New_ajax_pic_setting.php',
                                            data:"action=ok&modual_type=7&modual_name="+w+"&la=<?=$la?>&site=<?=$site?>",
                                            success: function(result){
                                                $("#header4").html(result);
                                            } });});
                                </script>
                            </div>
                            <div id="header5" class="bhoechie-tab-content H1 ">
                                <script>
                                    $("#H_input_rename_header5").click(function () {
                                        var w = document.getElementById("span5").outerText;
                                        w= w.replace('ماژول','');

                                        $.ajax({
                                            type:'POST',
                                            url:'New_ajax_pic_setting.php',
                                            data:"action=ok&modual_type=8&modual_name="+w+"&la=<?=$la?>&site=<?=$site?>",
                                            success: function(result){
                                                $("#header5").html(result);
                                            } });});
                                </script>
                            </div>
                            <div id="header6" class="bhoechie-tab-content H1 ">
                                <script>
                                    $("#H_input_rename_header6").click(function () {
                                        var w = document.getElementById("span6").outerText;
                                        w= w.replace('ماژول','');

                                        $.ajax({
                                            type:'POST',
                                            url:'New_ajax_pic_setting.php',
                                            data:"action=ok&modual_type=9&modual_name="+w+"&la=<?=$la?>&site=<?=$site?>",
                                            success: function(result){
                                                $("#header6").html(result);
                                            } });});
                                </script>
                            </div>
                            <script>

                            </script>
                        </div>


                    </div>
                </div>

            </div></div>
    </div>
</div>
</div>

        </br>     
        <div class="panel-footer">
            <button  type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary">ذخيره</button>
        </div>
    </form>
<!--///            del_header1_link-->

<script>
    jQuery(document).ready(function ($) {
        $("#clean-demo").zozoTabs({
            theme: "silver",
            animation: {
                duration: 800,
                effects: "slideH"
            }
        })
    });
</script>

    <script>
        $(document).ready(function () {
            $('.iframe-btn').fancybox({
                'width': 880,
                'height': 570,
                'type': 'iframe',
                'autoScale': false
            });

            $("div.bhoechie-tab-menu.H1>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();

                $("div.bhoechie-tab.H1>div.bhoechie-tab-content.H1").removeClass("active");
                $("div.bhoechie-tab.H1>div.bhoechie-tab-content.H1").eq(index).addClass("active");
            });

            $("div.bhoechie-tab-menu.H2>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();

                $("div.bhoechie-tab.H2>div.bhoechie-tab-content.H2").removeClass("active");
                $("div.bhoechie-tab.H2>div.bhoechie-tab-content.H2").eq(index).addClass("active");
            });

            $("div.bhoechie-tab-menu.H3>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();

                $("div.bhoechie-tab.H3>div.bhoechie-tab-content.H3").removeClass("active");
                $("div.bhoechie-tab.H3>div.bhoechie-tab-content.H3").eq(index).addClass("active");
            });

            $("div.bhoechie-tab-menu.H4>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();

                $("div.bhoechie-tab.H4>div.bhoechie-tab-content.H4").removeClass("active");
                $("div.bhoechie-tab.H4>div.bhoechie-tab-content.H4").eq(index).addClass("active");
            });
            $("div.bhoechie-tab-menu.H5>div.list-group>a").click(function (e) {
                e.preventDefault();
                $(this).siblings('a.active').removeClass("active");
                $(this).addClass("active");
                var index = $(this).index();

                $("div.bhoechie-tab.H5>div.bhoechie-tab-content.H5").removeClass("active");
                $("div.bhoechie-tab.H5>div.bhoechie-tab-content.H5").eq(index).addClass("active");
            });




            $('#manage_lang_filter').change(function () {
                var a = '<?=$url?>';
                if (a.indexOf("&lang_filter=") >= 0) {
                    var b = a.split('&lang_filter=');
                    var c = b[1].split('&');
                    var e = "";
                    if (c[1] > "")
                        e = "&" + c[1];
                    a = b[0] + "&lang_filter=" + $(this).val() + e;
                }
                else
                    a += '&lang_filter=' + $(this).val();
                window.location.href = a;
            });
            $('#manage_site_filter').change(function () {
                var a = '<?=$url?>';
                if (a.indexOf("&site_filter=") >= 0) {
                    var b = a.split('&site_filter=');
                    var c = b[1].split('&');
                    var e = "";
                    if (c[1] > "")
                        e = "&" + c[1];
                    a = b[0] + "&site_filter=" + $(this).val() + e;
                }
                else
                    a += '&site_filter=' + $(this).val();
                window.location.href = a;
            });

        });
    </script>
    <script>
        $(document).ready(function () {

            //-------------------------------
            $(".H_rename_header_one").click(function () {
                $(this).hide();
                $('.H_rename_header_one_save').show();
                $(".H_input_rename_header_one").toggle(300);
            });
            $(".H_rename_header_one_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block_header_one' + "&value=" + $(".H_input_rename_header_one").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_header_one > span.temp").text($(".H_input_rename_header_one").val());
                $(this).hide();
                $('.H_rename_header_one').show();
                $(".H_input_rename_header_one").hide();
                $(".H_rename_header_one.H_pos_color").css('transform','translateY(-24px)');
            });
            //-----------------------------------------
            $(".H_rename_header").click(function () {
                $(this).hide();
                $('.H_rename_header_save').show();
                $(".H_input_rename_header").toggle(300);
            });
            $(".H_rename_header_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block_header' + "&value=" + $(".H_input_rename_header").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_header > span.temp").text($(".H_input_rename_header").val());
                $(this).hide();
                $('.H_rename_header').show();
                $(".H_input_rename_header").hide();
                $(".H_pos_color").css('transform','translateY(-24px)');
            });

            //-------------------------------
            $(".H_rename_block1").click(function () {
                $(this).hide();
                $('.H_rename_block1_save').show();
                $(".H_input_rename_block1").toggle(300);
            });
            $(".H_rename_block1_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block1' + "&value=" + $(".H_input_rename_block1").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_block1 > span.temp").text($(".H_input_rename_block1").val());
                $(this).hide();
                $('.H_rename_block1').show();
                $(".H_input_rename_block1").hide();
                $(".H_rename_block1.H_pos_color").css('transform','translateY(-24px)');
            });

            //-------------------------------
            $(".H_rename_block2").click(function () {
                $(this).hide();
                $('.H_rename_block2_save').show();
                $(".H_input_rename_block2").toggle(300);
            });
            $(".H_rename_block2_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block2' + "&value=" + $(".H_input_rename_block2").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_block2 > span.temp").text($(".H_input_rename_block2").val());
                $(this).hide();
                $('.H_rename_block2').show();
                $(".H_input_rename_block2").hide();
                $(".H_rename_block2.H_pos_color").css('transform','translateY(-24px)');
            });

            //-------------------------------
            $(".H_rename_block3").click(function () {
                $(this).hide();
                $('.H_rename_block3_save').show();
                $(".H_input_rename_block3").toggle(300);
            });
            $(".H_rename_block3_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block3' + "&value=" + $(".H_input_rename_block3").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_block3 > span.temp").text($(".H_input_rename_block3").val());
                $(this).hide();
                $('.H_rename_block3').show();
                $(".H_input_rename_block3").hide();
                $(".H_rename_block3.H_pos_color").css('transform','translateY(-24px)');
            });

            //-------------------------------
            $(".H_rename_block4").click(function () {
                $(this).hide();
                $('.H_rename_block4_save').show();
                $(".H_input_rename_block4").toggle(300);
            });
            $(".H_rename_block4_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block4' + "&value=" + $(".H_input_rename_block4").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_block4 > span.temp").text($(".H_input_rename_block4").val());
                $(this).hide();
                $('.H_rename_block4').show();
                $(".H_input_rename_block4").hide();
                $(".H_rename_block4.H_pos_color").css('transform','translateY(-24px)');
            });

            //-------------------------------
            $(".H_rename_block5").click(function () {
                $(this).hide();
                $('.H_rename_block5_save').show();
                $(".H_input_rename_block5").toggle(300);
            });
            $(".H_rename_block5_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block5' + "&value=" + $(".H_input_rename_block5").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_block5 > span.temp").text($(".H_input_rename_block5").val());
                $(this).hide();
                $('.H_rename_block5').show();
                $(".H_input_rename_block5").hide();
                $(".H_rename_block5.H_pos_color").css('transform','translateY(-24px)');
            });
            //-------------------------------
            $(".H_rename_block6").click(function () {
                $(this).hide();
                $('.H_rename_block6_save').show();
                $(".H_input_rename_block6").toggle(300);
            });
            $(".H_rename_block6_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block6' + "&value=" + $(".H_input_rename_block6").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_block6 > span.temp").text($(".H_input_rename_block6").val());
                $(this).hide();
                $('.H_rename_block6').show();
                $(".H_input_rename_block6").hide();
                $(".H_rename_block6.H_pos_color").css('transform','translateY(-24px)');
            });
            //-------------------------------
            $(".H_rename_block7").click(function () {
                $(this).hide();
                $('.H_rename_block7_save').show();
                $(".H_input_rename_block7").toggle(300);
            });
            $(".H_rename_block7_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block7' + "&value=" + $(".H_input_rename_block7").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_block7 > span.temp").text($(".H_input_rename_block7").val());
                $(this).hide();
                $('.H_rename_block7').show();
                $(".H_input_rename_block7").hide();
                $(".H_rename_block7.H_pos_color").css('transform','translateY(-24px)');
            });
            //-------------------------------
            $(".H_rename_block8").click(function () {
                $(this).hide();
                $('.H_rename_block8_save').show();
                $(".H_input_rename_block8").toggle(300);
            });
            $(".H_rename_block8_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block8' + "&value=" + $(".H_input_rename_block8").val() ,
                    success: function (result) {}
                });
                $("#H_input_rename_block8 > span.temp").text($(".H_input_rename_block8").val());
                $(this).hide();
                $('.H_rename_block8').show();
                $(".H_input_rename_block8").hide();
                $(".H_rename_block8.H_pos_color").css('transform','translateY(-24px)');
            });
            //-------------------------------
            $(".H_rename_block9").click(function () {
                $(this).hide();
                $('.H_rename_block9_save').show();
                $(".H_input_rename_block9").toggle(300);
            });
            $(".H_rename_block9_save").click(function () {
                $.ajax({
                    type: 'POST',
                    url: 'New_ajax.php',
                    data: 
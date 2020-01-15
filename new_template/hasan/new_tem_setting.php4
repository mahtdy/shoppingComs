<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">
<link rel="stylesheet"
      href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/default/<?= $dir ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<?

if ($_GET['lang_filter'] > "")
    $la = injection_replace($_GET["lang_filter"]);
else
    $la = injection_replace($_POST["manage_lang_filter"]);
if ($la == '')
    $la = $default_lang;

if ($_GET['site_filter'] > "")
    $site = injection_replace($_GET["site_filter"]);
else
    $site = injection_replace($_POST["manage_site_filter"]);
if ($site == '')
    $site = $default_site;

//===============================================================================================================

if ($_POST['send_flag'] == 1) {

 ################################################################# هدر############################################

    $header_pic = injection_replace($_POST["header_pic"]);
    $header_link = injection_replace($_POST["header_link"]);
    $site_name = injection_replace($_POST["site_name"]);
    insert_templdate($site, $header_pic, $la, '', $site_name, $header_link, '', "header_title", $tem, $coms_conect);


    ########################################################## ترکیب بندی###########################################

    $onvan_tarkibbandi = injection_replace($_POST["onvan_tarkibbandi"]);
    insert_templdate($site, '', $la, '', $onvan_tarkibbandi, '', '', "tarkibbandi", $tem, $coms_conect);
    for ($i = 1; $i <= 6; $i++) {
        $anasor_tarkibbandi_link = injection_replace($_POST["anasor_tarkibbandi_link{$i}"]);
        $anasor_tarkibbandi_pic_adress = injection_replace($_POST["anasor_tarkibbandi_pic_adress{$i}"]);
        $anasor_tarkibbandi_title = injection_replace($_POST["anasor_tarkibbandi_title{$i}"]);
        insert_templdate($site, $anasor_tarkibbandi_pic_adress, $la, '', $anasor_tarkibbandi_title, $anasor_tarkibbandi_link, '', "anasor_tarkibbandi$i", $tem, $coms_conect);
    }

########################################################### مکان های بازدید شده######################################

    $place_view_title = injection_replace($_POST["place_view_title"]);
    $place_view_text = injection_replace($_POST["place_view_text"]);
    insert_templdate($site, '', $la, $place_view_text, $place_view_title, '', '', "place_view", $tem, $coms_conect);
    for ($i = 1; $i <= 6; $i++) {
        $place_view_title = injection_replace($_POST["place_view_order_title{$i}"]);
        $place_view_text = injection_replace($_POST["place_view_order_text{$i}"]);
        $place_view_pic = injection_replace($_POST["place_view_order_pic{$i}"]);
        $place_view_link = injection_replace($_POST["place_view_order_link{$i}"]);
        $place_view_pic_adress = injection_replace($_POST["place_view_order_pic_adress{$i}"]);

        insert_templdate($site, $place_view_pic_adress, $la, $place_view_text, $place_view_title, $place_view_link, $place_view_pic, "place_view_order$i", $tem, $coms_conect);
    }
    ########################################################### شهرهای محبوب######################################

    $city_popular_title = injection_replace($_POST["city_popular_title"]);
    $city_popular_text = injection_replace($_POST["city_popular_text"]);
    insert_templdate($site, '', $la, $city_popular_text, $city_popular_title, '', '', "city_popular", $tem, $coms_conect);
    for ($i = 1; $i <= 4; $i++) {
        $city_popular_title = injection_replace($_POST["city_popular_order_title{$i}"]);
        $city_popular_pic = injection_replace($_POST["city_popular_order_pic{$i}"]);
        $city_popular_link = injection_replace($_POST["city_popular_order_link{$i}"]);
        $city_popular_pic_adress = injection_replace($_POST["city_popular_order_pic_adress{$i}"]);

        insert_templdate($site, $city_popular_pic_adress, $la, '', $city_popular_title, $city_popular_link, $city_popular_pic, "city_popular_order$i", $tem, $coms_conect);
    }

    ########################################################### مشتریان ما######################################

    $our_customers_title = injection_replace($_POST["our_customers_title"]);
    $our_customers_text = injection_replace($_POST["our_customers_text"]);
    insert_templdate($site, '', $la, $our_customers_text, $our_customers_title, '', '', "our_customers", $tem, $coms_conect);
    for ($i = 1; $i <= 7; $i++) {

        $our_customers_pic = injection_replace($_POST["our_customers_order_pic{$i}"]);

        insert_templdate($site, '', $la, '', '', '', $our_customers_pic, "our_customers_order$i", $tem, $coms_conect);
    }
  ########################################################### نوار قرمز رنگ ######################################

    $navar_red_title = injection_replace($_POST["navar_red_title"]);
    $navar_red_text = injection_replace($_POST["navar_red_text"]);
    $navar_red_link = injection_replace($_POST["navar_red_link"]);

    insert_templdate($site, '', $la, $navar_red_text, $navar_red_title, $navar_red_link, '', "navar_red", $tem, $coms_conect);

########################################################### فوتر########################################################

    $footer1_pic_adress = injection_replace($_POST["footer1_pic_adress"]);
    $footer1_title = injection_replace($_POST["footer1_title"]);
    $footer1_text = injection_replace($_POST["footer1_text"]);
    $footer1_pic = injection_replace($_POST["footer1_pic"]);
    insert_templdate($site, $footer1_pic_adress, $la, $footer1_text, $footer1_title, '', $footer1_pic, "footer1", $tem, $coms_conect);

    for ($i = 1; $i <= 6; $i++) {
        $sub1_footer2_title = injection_replace($_POST["sub1_footer2_title{$i}"]);
        $sub1_footer2_link = injection_replace($_POST["sub1_footer2_link{$i}"]);
        insert_templdate($site, '', $la, '', $sub1_footer2_title, $sub1_footer2_link, '', "sub1_footer2$i", $tem, $coms_conect);
    }
    for ($i = 7; $i <= 11; $i++) {
        $sub2_footer2_title = injection_replace($_POST["sub2_footer2_title{$i}"]);
        $sub2_footer2_link = injection_replace($_POST["sub2_footer2_link{$i}"]);
        insert_templdate($site, '', $la, '', $sub2_footer2_title, $sub2_footer2_link, '', "sub2_footer2$i", $tem, $coms_conect);
    }

    $footer3_pic_adress = injection_replace($_POST["footer3_pic_adress"]);
    $footer3_text = injection_replace($_POST["footer3_text"]);
    $footer3_pic = injection_replace($_POST["footer3_pic"]);
    $footer3_link = injection_replace($_POST["footer3_link"]);
    insert_templdate($site, $footer3_pic_adress, $la, $footer3_text, '', $footer3_link, $footer3_pic, "footer3", $tem, $coms_conect);

    for ($i = 1; $i <= 4; $i++) {
    $Social_Networks_pic_adress = injection_replace($_POST["Social_Networks_pic_adress{$i}"]);
    $Social_Networks_link = injection_replace($_POST["Social_Networks_link{$i}"]);
    insert_templdate($site, $Social_Networks_pic_adress, $la, '', '', $Social_Networks_link, '', "Social_Networks$i", $tem, $coms_conect);
}
    ########################################### کپی رایت################################################
    $copy_write_text = injection_replace($_POST["copy_write_text"]);
    insert_templdate($site, '', $la, $copy_write_text, '', '', '', "copy_write", $tem, $coms_conect);







################################ایکون های هدر#################################
    for ($i = 1; $i <= 6; $i++) {
        $header_icon = injection_replace($_POST["header_icon{$i}"]);
        $header_icon_link = injection_replace($_POST["header_icon_link{$i}"]);
        $header_icon_title = injection_replace($_POST["header_icon_title{$i}"]);
        insert_templdate($site, '', $la, '', $header_icon_title, $header_icon_link, $header_icon, "header_icon$i", $tem, $coms_conect);
    }
################################دکمه های هدر#################################
    for ($i = 1; $i <= 2; $i++) {
        $header_button = injection_replace($_POST["header_button{$i}"]);
        $header_button_link = injection_replace($_POST["header_button_link{$i}"]);
        $header_button_title = injection_replace($_POST["header_button_title{$i}"]);
        insert_templdate($site, '', $la, '', $header_button_title, $header_button_link, $header_button, "header_button$i", $tem, $coms_conect);
    }

################################لینک های بالای صفحهس#################################
    for ($i = 1; $i <= 6; $i++) {
        $up_link_title = injection_replace_pic($_POST["up_link_title{$i}"]);
        $up_link_link = injection_replace($_POST["up_link_link{$i}"]);
        insert_templdate($site, '', $la, '', $up_link_title, $up_link_link, '', "up_link_link$i", $tem, $coms_conect);
    }

#########################تبلیغات#######################
    $advertise_text = injection_replace($_POST["advertise_text"]);
    $advertise_title = injection_replace($_POST["advertise_title"]);
    $advertise_link = injection_replace($_POST["advertise_link"]);
    $advertise_pic = injection_replace($_POST["advertise_pic"]);
    insert_templdate($site, $advertise_pic, $la, $advertise_text, $advertise_title, $advertise_link, '', "advertise", $tem, $coms_conect);
################################تنظيمات اخبار#################################
    for ($i = 1; $i <= 3; $i++) {
        $news_setting = injection_replace($_POST["news_setting{$i}"]);
        insert_templdate($site, '', $la, $news_setting, '', '', '', "news_setting$i", $tem, $coms_conect);
    }
################################تندیس ها#################################
    for ($i = 1; $i <= 20; $i++) {
        $tandis_title = injection_replace($_POST["tandis_title{$i}"]);
        $tandis_pic = injection_replace($_POST["tandis_pic{$i}"]);
        $tandis_link = injection_replace($_POST["tandis_link{$i}"]);
        $tempalate_feachers_title = injection_replace($_POST["tempalate_feachers_title{$i}"]);
        insert_templdate($site, $tandis_pic, $la, '', $tandis_title, $tandis_link, '', "tandis$i", $tem, $coms_conect);
    }
################################لینک های فوتر################################
    for ($i = 1; $i <= 12; $i++) {
        $fotter_link = injection_replace($_POST["fotter_link{$i}"]);
        $fotter_link_title = injection_replace($_POST["fotter_link_title{$i}"]);
        $tempalate_feachers_title = injection_replace($_POST["tempalate_feachers_title{$i}"]);
        insert_templdate($site, '', $la, '', $fotter_link_title, $fotter_link, '', "fotter_link$i", $tem, $coms_conect);
    }
################################شبکه های اجتماعی فوتر################################
    for ($i = 1; $i <= 5; $i++) {
        $sosial_link = injection_replace($_POST["sosial_link{$i}"]);
        $sosial_link_title = injection_replace($_POST["sosial_link_title{$i}"]);
        $sosial_link_pic = injection_replace($_POST["sosial_link_pic{$i}"]);
        $tempalate_feachers_title = injection_replace($_POST["tempalate_feachers_title{$i}"]);
        insert_templdate($site, $sosial_link_pic, $la, '', $sosial_link_title, $sosial_link, '', "sosial_link$i", $tem, $coms_conect);
    }
######################تصویر فوتر#####################


#########################ارتباط با ما#######################

    $call_us_google = injection_replace($_POST["call_us_google"]);
    insert_templdate($site, '', $la, $call_us_google, '', '', '', "call_us_google", $tem, $coms_conect);


########################قیمت#######################
    $price = ($_POST["price"]);
    $tax = injection_replace($_POST["tax"]);
    insert_templdate($site, '', $la, $price, '', $tax, '', "price", $tem, $coms_conect);

###################ورورد به سایت#####################
    $login_first_text = ($_POST["login_first_text"]);
    $login_first_title = injection_replace($_POST["login_first_title"]);
    insert_templdate($site, '', $la, $login_first_text, $login_first_title, '', '', "login_first_text", $tem, $coms_conect);

###################ثبت نام#####################


###################فعال کردن کاربران sms#####################
    $active_user_sms = ($_POST["active_user_sms"]);
    $active_user_sms_title = injection_replace($_POST["active_user_sms_title"]);
    insert_templdate($site, '', $la, $active_user_sms, $active_user_sms_title, '', '', "active_user_sms", $tem, $coms_conect);
    /*
    #######################درباره ما##########################
        $about_us=injection_replace($_POST["about_us"]);
        $about_us_title=injection_replace($_POST["about_us_title"]);
        insert_templdate($site,'',$la,$about_us,$about_us_title,'','',"about_us",$tem,$coms_conect);

    #####ثبت نام
        $reg_first_text=($_POST["reg_first_text"]);
        $reg_first_pic=injection_replace($_POST["reg_first_pic"]);
        insert_templdate($site,$reg_first_pic,$la,$reg_first_text,'','','',"reg_first_text",$tem,$coms_conect);
        $reg_secend_text=($_POST["reg_secend_text"]);
        insert_templdate($site,'',$la,$reg_secend_text,'','','',"reg_secend_text",$tem,$coms_conect);

    #####ورود به سایت

        $login_secend_text=($_POST["login_secend_text"]);
        insert_templdate($site,'',$la,$login_secend_text,'','','',"login_secend_text",$tem,$coms_conect);
        */
}
?>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف خبر
                    زير اطمينان داريد؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-remove"></span>&nbsp;خير
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", ".del_menu", function (e) {
        $("#btn_ok").val($(this).attr('id'));
    });
    $(document).ready(function () {
        $('#page_catogory').select2({
            data: [
                <?
                $query = "select id,name from new_modules_cat where type=1 and status=1 and la='$la'";

                $result = $coms_conect->query($query);
                $i = 0;
                while ($RS1 = $result->fetch_assoc()) {
                    $id = $RS1["id"];
                    $name = $RS1["name"];
                    if (in_array($id, $_SESSION['manager_page_cat'])) {
                        //echo $id.'<br>';
                        if ($i == 0)
                            echo '{' . 'id' . ':' . $id . ',' . 'text' . ':' . "'" . $name . "'" . "}";
                        else
                            echo ',' . '{' . 'id' . ':' . $id . ',' . 'text' . ':' . "'" . $name . "'" . "}";
                        $i++;
                    }

                }
                ?>
            ],
            allowClear: true,
            multiple: false,
            formatNoMatches: function (term) {
                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
            }
        });
    });
</script>



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">تنظيمات قالب</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form"
              enctype="multipart/form-data">
            <input type="hidden" name="send_flag" value="1">

            <!-- vertical tab bootsnipp -->
            <div class="">

                <div class="col-md-12 bhoechie-tab-container"><br>
                    <div class="container">
                        <label class="col-md-1 form-group">زبان</label>
                        <div class="col-md-2 form-group">
                            <? create_lang_filter_none($la, $coms_conect, $_SESSION["manager_title_lang"]) ?>
                        </div>
                    </div>

                    <div class="container">
                        <label class="col-md-1 form-group">سایت</label>
                        <div class="col-md-2 form-group">
                            <? create_sub_site_filter_none($site, $coms_conect, $_SESSION['manager_title_site']) ?>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                        <div class="list-group">

                            <a href="#" class="list-group-item active text-center">هدر</a>
                            <a href="#" class="list-group-item   text-center">ترکیب بندی</a>
                            <a href="#" class="list-group-item   text-center">مکان های بازدید شده</a>
                            <a href="#" class="list-group-item   text-center">شهرهای محبوب</a>
                            <a href="#" class="list-group-item   text-center">مشتریان ما</a>
                            <a href="#" class="list-group-item   text-center">نوار قرمز</a>
                            <a href="#" class="list-group-item   text-center">فوتر</a>
                            <a href="#" class="list-group-item   text-center">کپی رایت</a>

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                        <!--------------------------------- هدر------------>
                        <div class="bhoechie-tab-content active">
                            <center>
                                <? $header_title = get_tem_result($site, $la, "header_title", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">نام سایت</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $header_title['title'] ?>"
                                                   class="form-control" name="site_name" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">تصویر هدر</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" class="col-md-12"
                                                   value="<?= $header_title['pic_adress'] ?>" id="header_pic"
                                                   name="header_pic">
                                            <a href="/filemanager/dialog.php?type=1&amp;field_id=header_pic"
                                               class="btn iframe-btn" type="button"
                                               style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لینک تصویر</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $header_title['link'] ?>" class="form-control"
                                                   name="header_link" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>

                                <hr>

                            </center>
                        </div>

                        <!----------------------------------ترکیب بندی------------>

                        <div class="bhoechie-tab-content ">
                            <center>
                                <? $tarkibbandi = get_tem_result($site, $la, "tarkibbandi", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">عنوان ترکیب بندی</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $tarkibbandi['title'] ?>" class="form-control" name="onvan_tarkibbandi" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>

                                <hr>


                                <? for ($i = 1; $i <= 6; $i++) { ?>
                                    <? $anasor_tarkibbandi = get_tem_result($site, $la, "anasor_tarkibbandi$i", $tem, $coms_conect); ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $anasor_tarkibbandi['title'] ?>"
                                                       id="anasor_tarkibbandi_title<?= $i ?>"
                                                       name="anasor_tarkibbandi_title<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">لینک <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" value="<?= $anasor_tarkibbandi['link'] ?>"
                                                       class="form-control" name="anasor_tarkibbandi_link<?= $i ?>"
                                                       style="direction: rtl;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family"> تصویر<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" value="<?= $anasor_tarkibbandi['pic_adress'] ?>"
                                                       class="form-control" name="anasor_tarkibbandi_pic_adress<?= $i ?>"
                                                       style="direction: rtl;">
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                <? } ?>
                            </center>
                        </div>
                        <!---------------------------------مکان بازدید شده------------>
                        <div class="bhoechie-tab-content ">
                            <center>
                                <? $place_view = get_tem_result($site, $la, "place_view", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">عنوان ترکیب بندی</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $place_view['title'] ?>" class="form-control"
                                                   name="place_view_title" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">عنوان ترکیب بندی</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $place_view['text'] ?>" class="form-control"
                                                   name="place_view_text" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <? for ($i = 1; $i <= 6; $i++) { ?>
                                    <? $place_view_order = get_tem_result($site, $la, "place_view_order$i", $tem, $coms_conect); ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان اصلی <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $place_view_order['title'] ?>"
                                                       name="place_view_order_title<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان کج<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $place_view_order['text'] ?>"
                                                       name="place_view_order_text<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">متن اولیه<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $place_view_order['pic'] ?>"
                                                       name="place_view_order_pic<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">لینک <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" value="<?= $place_view_order['link'] ?>"
                                                       class="form-control" name="place_view_order_link<?= $i ?>"
                                                       style="direction: rtl;">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family"> تصویر<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $place_view_order['pic_adress'] ?>"
                                                       id="place_view_order_pic_adress<?= $i ?>"
                                                       name="place_view_order_pic_adress<?= $i ?>">
                                                <a href="/filemanager/dialog.php?type=1&amp;field_id=place_view_order_pic_adress<?= $i ?>"
                                                   class="btn iframe-btn" type="button"
                                                   style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                <? } ?>
                            </center>
                        </div>

                        <!---------------------------------شهرهای محبوب------------>
                        <div class="bhoechie-tab-content ">
                            <center>
                                <? $city_popular = get_tem_result($site, $la, "city_popular", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">شهرهای محبوب</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $city_popular['title'] ?>" class="form-control"
                                                   name="city_popular_title" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لیست شهرها</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $city_popular['text'] ?>" class="form-control"
                                                   name="city_popular_text" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <? for ($i = 1; $i <= 4; $i++) { ?>
                                    <? $city_popular_order = get_tem_result($site, $la, "city_popular_order$i", $tem, $coms_conect); ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان اصلی <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $city_popular_order['title'] ?>"
                                                       name="city_popular_order_title<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">تعداد<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $city_popular_order['pic'] ?>"
                                                       name="city_popular_order_pic<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">لینک <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" value="<?= $city_popular_order['link'] ?>"
                                                       class="form-control" name="city_popular_order_link<?= $i ?>"
                                                       style="direction: rtl;">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family"> تصویر<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $city_popular_order['pic_adress'] ?>"
                                                       id="city_popular_order_pic_adress<?= $i ?>"
                                                       name="city_popular_order_pic_adress<?= $i ?>">
                                                <a href="/filemanager/dialog.php?type=1&amp;field_id=city_popular_order_pic_adress<?= $i ?>"
                                                   class="btn iframe-btn" type="button"
                                                   style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                <? } ?>
                            </center>
                        </div>


                        <!---------------------------------مشتریان ما--------------->

                        <div class="bhoechie-tab-content ">
                            <center>
                                <? $our_customers = get_tem_result($site, $la, "our_customers", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">مشتریان ما</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $our_customers['title'] ?>" class="form-control"
                                                   name="our_customers_title" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">متن مشتریان ما</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $our_customers['text'] ?>" class="form-control"
                                                   name="our_customers_text" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <? for ($i = 1; $i <= 7; $i++) { ?>
                                    <? $our_customers_order = get_tem_result($site, $la, "our_customers_order$i", $tem, $coms_conect); ?>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family"> تصویر<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $our_customers_order['pic'] ?>"
                                                       id="our_customers_order_pic<?= $i ?>"
                                                       name="our_customers_order_pic<?= $i ?>">
                                                <a href="/filemanager/dialog.php?type=1&amp;field_id=our_customers_order_pic<?= $i ?>"
                                                   class="btn iframe-btn" type="button"
                                                   style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                <? } ?>
                            </center>
                        </div>


                        <!---------------------------------نوار قرمز رنگ------------>
                        <div class="bhoechie-tab-content ">
                            <center>
                                <? $navar_red = get_tem_result($site, $la, "navar_red", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">متن اصلی</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $navar_red['title'] ?>" class="form-control"
                                                   name="navar_red_title" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">هاور متن اصلی</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $navar_red['text'] ?>" class="form-control"
                                                   name="navar_red_text" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لینک </label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $navar_red['link'] ?>" class="form-control"
                                                   name="navar_red_link" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>

                            </center>
                        </div>


<!-----------------------------------------------------فوتر---------------------------------------------->

                        <div class="bhoechie-tab-content ">
                            <center>
                                <? $footer1 = get_tem_result($site, $la, "footer1", $tem, $coms_conect); ?>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family"> لوگو</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" class="col-md-12"
                                                   value="<?= $footer1['pic_adress'] ?>"
                                                   id="footer1_pic_adress"
                                                   name="footer1_pic_adress">
                                            <a href="/filemanager/dialog.php?type=1&amp;field_id=footer1_pic_adress"
                                               class="btn iframe-btn" type="button"
                                               style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">متن زیر لوگو</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer1['title'] ?>" class="form-control"
                                                   name="footer1_title" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لینک های مفید</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer1['text'] ?>" class="form-control"
                                                   name="footer1_text" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">ارتباط با ما</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer1['pic'] ?>" class="form-control"
                                                   name="footer1_pic" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <hr>
 <!----------------------------------------------------------فوتر 2---------------------------------------------------->


                                <? for ($i = 1; $i <= 6; $i++) { ?>
                                <? $sub1_footer2 = get_tem_result($site, $la, "sub1_footer2$i", $tem, $coms_conect); ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان لینک<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $sub1_footer2['title'] ?>"
                                                       name="sub1_footer2_title<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">لینک <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $sub1_footer2['link'] ?>"
                                                       name="sub1_footer2_link<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?}?>

                                <? for ($i = 7; $i <= 11; $i++) { ?>
                                    <? $sub2_footer2 = get_tem_result($site, $la, "sub2_footer2$i", $tem, $coms_conect); ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان لینک <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $sub2_footer2['title'] ?>"
                                                       name="sub2_footer2_title<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">لینک <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $sub2_footer2['link'] ?>"
                                                       name="sub2_footer2_link<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?}?>
                                <hr>
<!---------------------------------------------------------فوتر 3------------------------------------------------------>

                                <? $footer3 = get_tem_result($site, $la, "footer3", $tem, $coms_conect); ?>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">آدرس</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer3['pic_adress'] ?>" class="form-control"
                                                   name="footer3_pic_adress" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">تلفن</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer3['text'] ?>" class="form-control"
                                                   name="footer3_text" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">ایمیل</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer3['pic'] ?>" class="form-control"
                                                   name="footer3_pic" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لینک ایمیل</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer3['link'] ?>" class="form-control"
                                                   name="footer3_link" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3 style="text-align: center; font-family: IRANSans">« شبکه های اجتماعی »</h3><br>
 <!--------------------------------------------------------شبکه های اجتماعی------------------------------------------------------>
                                <? for ($i = 1; $i <=4; $i++) { ?>
                                <? $Social_Networks = get_tem_result($site, $la, "Social_Networks$i", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">تصویر<?= $i ?></label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $Social_Networks['pic_adress'] ?>" class="form-control"
                                                   name="Social_Networks_pic_adress<?= $i ?>" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لینک <?= $i ?></label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $Social_Networks['link'] ?>" class="form-control"
                                                   name="Social_Networks_link<?= $i ?>" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
<?}?>
                            </center>
                        </div>


   <!--============================ کپی رایت =====================================================--->
                        <div class="bhoechie-tab-content ">
                            <center>
                        <? $copy_write = get_tem_result($site, $la, "copy_write", $tem, $coms_conect); ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="family">متن مورد نظر</label>
                            <div class="form-group col-md-9">
                                <div class="col-md-12 input-group">
                                    <input type="text" value="<?= $copy_write['text'] ?>" class="form-control"
                                           name="copy_write_text" style="direction: rtl;">
                                </div>
                            </div>
                        </div>
                            </center>
                        </div>


                        <? /*?>
/*
<!---------------------------------ارتباط با ما ------------>
			<?$about_us= get_tem_result($site,$la,'about_us',$tem,$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">عنوان </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<input type="text"  class="form-control" name="about_us_title" value="<?=$about_us['title'];?>"  style="direction: rtl;">
								</div>					
							</div>
						</div>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">متن</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="about_us" style="direction: rtl;"><?=$about_us['text'];?></textarea>
								</div>					
							</div>
						</div>
						<hr>
						</center>
                </div>
 <!---------------------------------ثبت نام------------>
			<?$reg_first_text= get_tem_result($site,$la,'reg_first_text',$tem,$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">متن اول </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="reg_first_text"    style="direction: rtl;"><?=$reg_first_text['text'];?></textarea>
								</div>					
							</div>
						</div>
				<div class="form-group">
						<label class="col-md-3 control-label" for="family">تصویر</label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$reg_first_text['pic_adress']?>"  id="reg_first_pic" name="reg_first_pic">
							<a href="/filemanager/dialog.php?type=1&amp;field_id=reg_first_pic" class="btn iframe-btn" type="button" style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
							</div>
						</div>
					</div>
			<?$reg_secend_text= get_tem_result($site,$la,'reg_secend_text',$tem,$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">زیر متن اول</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="reg_secend_text" style="direction: rtl;"><?=$reg_secend_text['text'];?></textarea>
								</div>					
							</div>
						</div>
			<?$reg_low= get_tem_result($site,$la,'reg_low',$tem,$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">قوانین سایت</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="reg_low" style="direction: rtl;"><?=$reg_low['text'];?></textarea>
								</div>					
							</div>
						</div>
						<hr>
						</center>
                </div>				
 

 <!---------------------------------ورورد------------>
			<?$login_first_text= get_tem_result($site,$la,'login_first_text',$tem,$coms_conect);?>
			   <div class="bhoechie-tab-content ">
                    <center>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">متن اول </label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="login_first_text"    style="direction: rtl;"><?=$login_first_text['text'];?></textarea>
								</div>					
							</div>
						</div>
				<div class="form-group">
						<label class="col-md-3 control-label" for="family">عنوان</label>
						<div class="form-group col-md-9">
							<div class="col-md-12 input-group">
							<input type="text" class="col-md-12"  value="<?=$login_first_text['pic_adress']?>"  id="login_first_pic" name="login_first_pic">
							</div>
						</div>
					</div>
			<?$login_secend_text= get_tem_result($site,$la,'login_secend_text',$tem,$coms_conect);?>
						<div class="form-group">
								<label class="col-md-3 control-label" for="family">زیر متن اول</label> 
							<div class="form-group col-md-9">
								<div class="col-md-12 input-group">	
									<textarea type="text"  class="form-control" name="login_secend_text" style="direction: rtl;"><?=$login_secend_text['text'];?></textarea>
								</div>					
							</div>
						</div>
						<hr>
						</center>
                </div>	
	<?*/ ?>
                        <!----------------------->
                    </div>
                </div>
            </div>
            </br>     
            <div class="panel-footer">
                <button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary">ذخيره</button>
            </div>
        </form>
    </div>


</div>

<script>
    $(document).ready(function () {
        $('.iframe-btn').fancybox({
            'width': 880,
            'height': 570,
            'type': 'iframe',
            'autoScale': false
        });


        $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
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

</div>

<!-- Bootstrap-Iconpicker -->

<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"></script>
<!-- Bootstrap-Iconpicker -->
<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
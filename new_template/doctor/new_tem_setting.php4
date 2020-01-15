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

    ################################################################# هدراول ############################################

    $header1_title = injection_replace($_POST["header1_title"]);
    $header1_pic = injection_replace($_POST["header1_pic"]);
    $header1_text = injection_replace($_POST["header1_text"]);
    $header1_link = injection_replace($_POST["header1_link"]);
    insert_templdate($site, '', $la, $header1_text, $header1_title, $header1_link, $header1_pic, "header1", $tem, $coms_conect);

    ################################################################# هدر دوم ############################################

    $header_pic = injection_replace($_POST["header_pic"]);
    $header_link = injection_replace($_POST["header_link"]);
    $site_name = injection_replace($_POST["site_name"]);
    insert_templdate($site, $header_pic, $la, '', $site_name, $header_link, '', "header_title", $tem, $coms_conect);


    ########################################################## بلوک های آبی رنگ###########################################

    $Block1_title = injection_replace($_POST["Block1_title"]);
    $Block1_link = injection_replace($_POST["Block1_link"]);
    $Block1_pic = injection_replace($_POST["Block1_pic"]);
        insert_templdate($site, '', $la, '', $Block1_title, $Block1_link, $Block1_pic, "Block1", $tem, $coms_conect);

    $Block2_title = injection_replace($_POST["Block2_title"]);
    $Block2_link = injection_replace($_POST["Block2_link"]);
    insert_templdate($site, '', $la, '', $Block2_title, $Block2_link, '', "Block2", $tem, $coms_conect);

    $Block3_title = injection_replace($_POST["Block3_title"]);
    insert_templdate($site, '', $la, '', $Block3_title, '', '', "Block3", $tem, $coms_conect);
    for ($i = 1; $i <= 3; $i++) {
        $sub_Block3_title = injection_replace($_POST["sub_Block3_title{$i}"]);
        $sub_Block3_link = injection_replace($_POST["sub_Block3_link{$i}"]);
        insert_templdate($site, '', $la, '', $sub_Block3_title, $sub_Block3_link, $place_view_pic, "sub_Block3$i", $tem, $coms_conect);
    }

    $Block4_title = injection_replace($_POST["Block4_title"]);
    $Block4_link = injection_replace($_POST["Block4_link"]);
    $Block4_pic = injection_replace($_POST["Block4_pic"]);
    insert_templdate($site, '', $la, '', $Block4_title, $Block4_link, $Block4_pic, "Block4", $tem, $coms_conect);



########################################################### باکس ها ######################################

    for($i=1;$i<=6;$i++){
        $menu_bar_title_title=injection_replace($_POST["menu_bar_title_title{$i}"]);
        $menu_bar_title=injection_replace($_POST["menu_bar_title{$i}"]);
        $menu_bar_pic=injection_replace($_POST["menu_bar_pic{$i}"]);
        $menu_bar_text=injection_replace($_POST["menu_bar_text{$i}"]);
        $menubar_count=injection_replace($_POST["menubar_count{$i}"]);
//        متغییر$menu_bar_pic مربوط به قسمت< عنوان منو> می باشد.

        if($menu_bar_title>"")
            insert_templdate($site,$menu_bar_title_title,$la,$menu_bar_text,$menu_bar_title,$menu_bar_pic,$menubar_count,"menu_bar$i",$tem,$coms_conect);
        for($j=1;$j<=$menubar_count;$j++){
            $menubar_title=injection_replace($_POST["menubar_title{$i}{$j}"]);
            $menubar_link=injection_replace($_POST["menubar_link{$i}{$j}"]);
            if($menubar_title>""&&$menubar_link>"")
                insert_templdate($site,'',$la,'',$menubar_title,$menubar_link,'',"menu_bar_item$i$j",$tem,$coms_conect);

        }
    }

########################################################### فوتر########################################################

    $footer1_pic_adress = injection_replace($_POST["footer1_pic_adress"]);
    $footer1_title = injection_replace($_POST["footer1_title"]);
    $footer1_text = injection_replace($_POST["footer1_text"]);
    $footer1_pic = injection_replace($_POST["footer1_pic"]);
    insert_templdate($site, $footer1_pic_adress, $la, $footer1_text, $footer1_title, '', $footer1_pic, "footer1", $tem, $coms_conect);

    for ($i = 1; $i <= 4; $i++) {
        $sub1_footer2_title = injection_replace($_POST["sub1_footer2_title{$i}"]);
        $sub1_footer2_link = injection_replace($_POST["sub1_footer2_link{$i}"]);
        insert_templdate($site, '', $la, '', $sub1_footer2_title, $sub1_footer2_link, '', "sub1_footer2$i", $tem, $coms_conect);
    }
    for ($i = 1; $i <= 4; $i++) {
        $sub1_footer3_title = injection_replace($_POST["sub1_footer3_title{$i}"]);
        $sub1_footer3_link = injection_replace($_POST["sub1_footer3_link{$i}"]);
        insert_templdate($site, '', $la, '', $sub1_footer3_title, $sub1_footer3_link, '', "sub1_footer3$i", $tem, $coms_conect);
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

                            <a href="#" class="list-group-item active text-center">هدراول</a>
                            <a href="#" class="list-group-item   text-center">هدردوم</a>
                            <a href="#" class="list-group-item   text-center">بلوک های آبی رنگ</a>
                            <a href="#" class="list-group-item   text-center">باکس اول</a>
                            <a href="#" class="list-group-item   text-center">باکس دوم</a>
                            <a href="#" class="list-group-item   text-center">باکس سوم</a>
                            <a href="#" class="list-group-item   text-center">باکس چهارم</a>
                            <a href="#" class="list-group-item   text-center">باکس پنجم</a>
                            <a href="#" class="list-group-item   text-center">باکس ششم</a>
                            <a href="#" class="list-group-item   text-center">فوتر</a>
                            <a href="#" class="list-group-item   text-center">کپی رایت</a>

                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                        <!--------------------------------- هدر اول------------>
                        <div class="bhoechie-tab-content active">
                            <center>
                                <? $header1 = get_tem_result($site, $la, "header1", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">آدرس</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $header1['title'] ?>"
                                                   class="form-control" name="header1_title" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">تلفن</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $header1['pic'] ?>"
                                                   class="form-control" name="header1_pic" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">ایمیل</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $header1['text'] ?>"
                                                   class="form-control" name="header1_text" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لینک ایمیل</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $header1['link'] ?>" class="form-control"
                                                   name="header1_link" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>

                        <!--------------------------------- هدر دوم------------>
                        <div class="bhoechie-tab-content ">
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

<!-------------------------------------------------------بلوک های آبی رنگ----------------------------------------------->

                        <div class="bhoechie-tab-content ">
                            <center>
                                    <? $Block1 = get_tem_result($site, $la, "Block1", $tem, $coms_conect); ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان بلوک اول </label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $Block1['title'] ?>"
                                                       id="Block1_title"
                                                       name="Block1_title">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">لینک </label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" value="<?= $Block1['link'] ?>"
                                                       class="form-control" name="Block1_link"
                                                       style="direction: rtl;">
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family"> تصویر(42*32px)</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" class="col-md-12"
                                                   value="<?= $Block1['pic'] ?>"
                                                   id="Block1_pic"
                                                   name="Block1_pic">
                                            <a href="/filemanager/dialog.php?type=1&amp;field_id=Block1_pic"
                                               class="btn iframe-btn" type="button"
                                               style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
                                        </div>
                                    </div>
                                </div>

                                    <hr>

                                <? $Block2 = get_tem_result($site, $la, "Block2", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">عنوان بلوک دوم </label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" class="col-md-12"
                                                   value="<?= $Block2['title'] ?>"
                                                   id="Block2_title"
                                                   name="Block2_title">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لینک </label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $Block2['link'] ?>"
                                                   class="form-control" name="Block2_link"
                                                   style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <? $Block3 = get_tem_result($site, $la, "Block3", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">عنوان بلوک سوم </label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" class="col-md-12"
                                                   value="<?= $Block3['title'] ?>"
                                                   id="Block3_title"
                                                   name="Block3_title">
                                        </div>
                                    </div>
                                </div>
                                <?for ($i = 1; $i <= 3; $i++) {?>
                                    <? $sub_Block3 = get_tem_result($site, $la, "sub_Block3$i", $tem, $coms_conect); ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">زیرمنوی <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $sub_Block3['title'] ?>"
                                                       name="sub_Block3_title<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                    <label class="col-md-3 control-label" for="family" > لینک<?= $i ?> </label >
                                    <div class="form-group col-md-9" >
                                        <div class="col-md-12 input-group" >
                                            <input type = "text" value = "<?= $sub_Block3['link'] ?>"
                                                   class="form-control" name = "sub_Block3_link<?= $i ?>"
                                                   style = "direction: rtl;" >
                                        </div >
                                    </div >
                                </div >
                            <?}?>
                                <hr>

                                <? $Block4 = get_tem_result($site, $la, "Block4", $tem, $coms_conect); ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">عنوان بلوک چهارم </label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" class="col-md-12"
                                                   value="<?= $Block4['title'] ?>"
                                                   id="Block4_title"
                                                   name="Block4_title">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">لینک </label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $Block4['link'] ?>"
                                                   class="form-control" name="Block4_link"
                                                   style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family"> تصویر(42*32px)</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" class="col-md-12"
                                                   value="<?= $Block4['pic'] ?>"
                                                   id="Block4_pic"
                                                   name="Block4_pic">
                                            <a href="/filemanager/dialog.php?type=1&amp;field_id=Block4_pic"
                                               class="btn iframe-btn" type="button"
                                               style="top: 2px;height: 40px;padding-top: 6px;">انتخاب</a>
                                        </div>
                                    </div>
                                </div>

                            </center>
                        </div>
<!-----------------------------------------باکس اول---------------------------------------------------->

                        <?for($i=1;$i<=6;$i++){
                            $menu_bar= get_tem_result($site,$la,"menu_bar$i",$tem,$coms_conect);?>

                            <div class="bhoechie-tab-content ">
                                <center>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان آخرین خبر</label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text"  class="form-control" name="menu_bar_title_title<?=$i?>" value="<?=$menu_bar['pic_adress']?>"  style="direction: rtl;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">متن زیر عنوان</label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text"  class="form-control" name="menu_bar_text<?=$i?>" value="<?=$menu_bar['text']?>"  style="direction: rtl;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">دسته مورد نظر  </label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="hidden" id="cat_val<?=$i?>" name="cat_val<?=$i?>" value="<?=$menu_bar['link']?>">
                                                <select id="menu_bar_title<?=$i?>" data-selectid="<?=$i?>" class="form-control select_module" name="menu_bar_title<?=$i?>">
                                                    <?$sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                    $result1 = $coms_conect->query($sql1);
                                                    echo "<option value='0'>انتخاب کنید</option>";
                                                    while($row = $result1->fetch_assoc()){
                                                        $str='';
                                                        if($row['id']==$menu_bar['title'])
                                                            $str='selected';
                                                        echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="module_cat<?=$i?>"></div>
                                    </div>
                                    <?for($j=1;$j<=$menu_bar['pic'];$j++){
                                        $menu_bar_item= get_tem_result($site,$la,"menu_bar_item$i$j",$tem,$coms_conect);?>
                                        <div id="ads<?=$i.$j?>" class="seyed" style="opacity: 1;">
                                            <div class="form-group">
                                                <a class="col-md-1 control-label del-ads<?=$i?>" id="<?=$i.$j?>" for="family"><i class="fa fa-trash text-danger remove" title="" data-original-title="حذف"></i></a>
                                                <label class="col-md-2 control-label" for="family">زیر دسته <?=$i.$j?></label>
                                                <div class="form-group col-md-9">
                                                    <div class="col-md-6 input-group">
                                                        <input type="text"  id="menubar_title<?=$i.$j?>" value="<?=$menu_bar_item['title']?>" class="form-control" placeholder="عنوان" name="menubar_title<?=$i.$j?>" >
                                                    </div>
                                                    <div class="col-md-6 input-group">
                                                        <input type="text"  id="menubar_link<?=$i.$j?>" value="<?=$menu_bar_item['link']?>" class="form-control" placeholder="لینک" name="menubar_link<?=$i.$j?>" style="direction: ltr;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?}
                                    $k=$j;
                                    $k--;
                                    ?>

                                    <input type="hidden" id="menubar_count<?=$i?>" name="menubar_count<?=$i?>" value="<?=$k?>">
                                    <script>
                                        $(document).ready(function(){
                                            var i = <?=$i.$j?>;
                                            var m=<?=$j?>;
                                            $('#add-ads<?=$i?>').on("click", function() {
                                                var someText = '<div id="ads'+i+'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads<?=$i?>" id="'+i+'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک#'+i+'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="menubar_title'+i+'" value="" class="form-control" placeholder="عنوان" name="menubar_title'+i+'" ></div><div class="col-md-6 input-group"> <input type="text" id="menubar_link'+i+'" value="" class="form-control" placeholder="لینک" name="menubar_link'+i+'" style="direction: ltr;"></a></span></div></div></div></div>';
                                                $(this).before(someText);
                                                $('#ads'+i+'').fadeTo('slow', 0.3, function()
                                                {
                                                    $(this).css('background', '');
                                                }).fadeTo('slow', 1);
                                                $('#menubar_count<?=$i?>').val(m);
                                                m++;i++;
                                            });

                                            $(document).on('click', '.del-ads<?=$i?>',function(){
                                                var id = '';
                                                var k=$('#menubar_count<?=$i?>').val();k--
                                                id = $(this).attr('id');
                                                $('#ads'+id).remove();
                                                $('#menubar_count<?=$i?>').val(k);
                                            });
                                        });
                                    </script>
                                    <a class="btn btn-success block" id="add-ads<?=$i?>"><i style="font-size: 16pt;margin-left: 5px;vertical-align: middle;" class="fa fa-plus"></i>افزودن لینک</a>
                                    </br>
                                </center>
                            </div>
                        <?}?>

<!-----------------------------------------------------فوتر---------------------------------------------->

                        <div class="bhoechie-tab-content ">
                            <center>
                                <? $footer1 = get_tem_result($site, $la, "footer1", $tem, $coms_conect); ?>


<!--------------------------ستون اول از راست--------------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">تیتر ستون اول از راست</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer1['title'] ?>" class="form-control"
                                                   name="footer1_title" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <? for ($i = 1; $i <= 4; $i++) { ?>
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
<!--------------------------ستون دوم از راست--------------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">تیتر ستون دوم از راست</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer1['text'] ?>" class="form-control"
                                                   name="footer1_text" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
                                <? for ($i = 1; $i <= 4; $i++) { ?>
                                    <? $sub1_footer3 = get_tem_result($site, $la, "sub1_footer3$i", $tem, $coms_conect); ?>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">عنوان لینک<?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $sub1_footer3['title'] ?>"
                                                       name="sub1_footer3_title<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="family">لینک <?= $i ?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-12 input-group">
                                                <input type="text" class="col-md-12"
                                                       value="<?= $sub1_footer3['link'] ?>"
                                                       name="sub1_footer3_link<?= $i ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?}?>
<!--------------------------ستون سوم از راست--------------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">تیتر ستون سوم از راست</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer1['pic'] ?>" class="form-control"
                                                   name="footer1_pic" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
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
<!--------------------------ستون چهارم از راست--------------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="family">تیتر ستون چهارم از راست</label>
                                    <div class="form-group col-md-9">
                                        <div class="col-md-12 input-group">
                                            <input type="text" value="<?= $footer1['pic_adress'] ?>" class="form-control"
                                                   name="footer1_pic_adress" style="direction: rtl;">
                                        </div>
                                    </div>
                                </div>
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
    $(document).ready(function() {

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=1&value="+$("#cat_val1").val()+"&secend_value="+$("#menu_bar_title1").val(),
            success: function(result){
                $("#module_cat1").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=2&value="+$("#cat_val2").val()+"&secend_value="+$("#menu_bar_title2").val(),
            success: function(result){
                $("#module_cat2").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=3&value="+$("#cat_val3").val()+"&secend_value="+$("#menu_bar_title3").val(),
            success: function(result){
                $("#module_cat3").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=4&value="+$("#cat_val4").val()+"&secend_value="+$("#menu_bar_title4").val(),
            success: function(result){
                $("#module_cat4").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=5&value="+$("#cat_val5").val()+"&secend_value="+$("#menu_bar_title5").val(),
            success: function(result){
                $("#module_cat5").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=6&value="+$("#cat_val6").val()+"&secend_value="+$("#menu_bar_title6").val(),
            success: function(result){
                $("#module_cat6").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=7&value="+$("#cat_val7").val()+"&secend_value="+$("#menu_bar_title7").val(),
            success: function(result){
                $("#module_cat7").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=8&value="+$("#cat_val8").val()+"&secend_value="+$("#menu_bar_title8").val(),
            success: function(result){
                $("#module_cat8").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=9&value="+$("#cat_val9").val()+"&secend_value="+$("#menu_bar_title9").val(),
            success: function(result){
                $("#module_cat9").html(result);
            }
        });

        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id=10&value="+$("#cat_val10").val()+"&secend_value="+$("#menu_bar_title10").val(),
            success: function(result){
                $("#module_cat10").html(result);
            }
        });

    });

    $(".select_module").change(function (){
        var i="#module_cat"+$(this).data('selectid');
        $.ajax({
            type:'POST',
            url:'New_ajax.php',
            data:"action=change_module_abadis&id="+$(this).val()+"&value="+$(this).attr('id'),
            success: function(result){
                $(i).html(result);
            }
        });
    });

    $(document).ready(function() {
        $('.iframe-btn').fancybox({
            'width'   : 880,
            'height'  : 570,
            'type'    : 'iframe',
            'autoScale'   : false
        });


        $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
        $('#manage_lang_filter').change( function() {
            var a ='<?=$url?>';
            if (a.indexOf("&lang_filter=") >= 0){
                var b=a.split('&lang_filter=');
                var c=b[1].split('&');
                var e="";
                if(c[1]>"")
                    e="&"+c[1];
                a=b[0]+"&lang_filter="+$(this).val()+e;
            }
            else
                a +='&lang_filter='+$(this).val();
            window.location.href = a;
        });
        $('#manage_site_filter').change( function() {
            var a ='<?=$url?>';
            if (a.indexOf("&site_filter=") >= 0){
                var b=a.split('&site_filter=');
                var c=b[1].split('&');
                var e="";
                if(c[1]>"")
                    e="&"+c[1];
                a=b[0]+"&site_filter="+$(this).val()+e;
            }
            else
                a +='&site_filter='+$(this).val();
            window.location.href = a;
        });

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
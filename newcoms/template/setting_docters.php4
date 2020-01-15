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

<script src="/yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/yep_theme/default/rtl/js/zozo.tabs.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">

<link type="text/css" href="../../new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="../../new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../new_orakuploader/orakuploader.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/H_style.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/zozo.tabs.min.css">

<style>
    hr {
        border-top: 1px solid #000;
    }
</style>

<?

$img_page_main= 'yep_theme/img/img_page_main/';

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

    #################################################################بازگشت به حالت قبل tab ############################################
    $temp_tab = injection_replace($_POST["temp_tab"]);
    $number_tab = injection_replace($_POST["number_tab"]);
    $num_con_tab = injection_replace($_POST["num_con_tab"]);

    insert_templdate($site, '', $la, $number_tab, $temp_tab, '', $num_con_tab, "temp_tab", 'ebnesinahospital', $coms_conect);



    ########################################################### docters ########################################################

    $docters_boxOne_pic_adress = 0;
    $docters_boxOne_pic_adress= injection_replace($_POST["docters_boxOne_pic_adress"]);
    $docters_boxOne_pic= injection_replace($_POST["docters_boxOne_pic"]);
    $docters_boxOne_pic=resize_image_M($docters_boxOne_pic,1423,250,$img_page_main,'');
    $docters_boxOne_pic_avatar_orak = injection_replace($_POST["docters_boxOne_pic_avatar_orak{$x}"][0]);
    if ($docters_boxOne_pic_avatar_orak > "") {
        $docters_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $docters_boxOne_pic_avatar_orak;
        $docters_boxOne_pic=resize_image_M($docters_boxOne_pic,1423,250,$img_page_main,'');
    }
    insert_templdate($site, $docters_boxOne_pic_adress, $la, '', '', '', $docters_boxOne_pic, "docters_boxOne", 'ebnesinahospital', $coms_conect);



    
//    menu box
    $docters_menubox_show_pic_adress=0;
    $docters_menubox_show_pic_adress = injection_replace_pic($_POST["docters_menubox_show_pic_adress"]);
    $docters_menubox_show_pic = injection_replace_pic($_POST["docters_menubox_show_pic"]);
    $docters_menubox_show_link = injection_replace_pic($_POST["docters_menubox_show_link"]);
    insert_templdate($site, $docters_menubox_show_pic_adress, $la, '', '', $docters_menubox_show_link, $docters_menubox_show_pic, "docters_menubox_show", 'ebnesinahospital', $coms_conect);

    $docters_menubox_links_del = "name like 'docters_menubox_links%' and tem_name='ebnesinahospital'";
    delete_from_data_base('new_tem_setting', $docters_menubox_links_del, $coms_conect);
    $docters_menubox_links_count = injection_replace_pic($_POST["docters_menubox_links_count"]);
    for ($k = 1; $k <= $docters_menubox_links_count; $k++) {
        $docters_menubox_links_title = injection_replace_pic($_POST["docters_menubox_links_title{$k}"]);
        $docters_menubox_links_link = injection_replace_pic($_POST["docters_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $docters_menubox_links_title, $docters_menubox_links_link, '', "docters_menubox_links$k", 'ebnesinahospital', $coms_conect);
    }

    //sidebar

    $count1_docters_edu1_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_edu1_main_header2%' ", $coms_conect);
    $block_name_setting_docters_edu1_main_header = injection_replace($_POST["block_name_setting_docters_edu1_main_header2"]);
    if ($block_name_setting_docters_edu1_main_header > "") {
        insert_templdate($site, '', $la, $block_name_setting_docters_edu1_main_header, '', '', '', "setting_docters_edu1_main_header2", 'ebnesinahospital', $coms_conect);
    }
    //----------tab name
    $condition_docters_edu1_main_header = "name like 'docters_edu1_main_header2%' and tem_name='ebnesinahospital'";
    delete_from_data_base('new_tem_setting', $condition_docters_edu1_main_header, $coms_conect);

    $docters_edu1_main_header_count = injection_replace_pic($_POST["docters_edu1_main_header_count2"]);
    for ($x = 1; $x <= $docters_edu1_main_header_count; $x++) {

        $docters_edu1_main_header_text = injection_replace_pic($_POST["docters_edu1_main_header_text2{$x}"]);

        if ($docters_edu1_main_header_text > "") {
            insert_templdate($site, '', $la, $docters_edu1_main_header_text, '', '', '', "docters_edu1_main_header2$x", 'ebnesinahospital', $coms_conect);
        }
    }
    //-------end tab name------------
    //-------tab------------
    for ($u = 1; $u <= $count1_docters_edu1_main_header; $u++) {

        $condition_docters_edu1_header_into_tab = "name like 'docters_edu1_header_into_tab2$u%' and tem_name='ebnesinahospital'";
        delete_from_data_base('new_tem_setting', $condition_docters_edu1_header_into_tab, $coms_conect);

       $docters_edu1_header_into_tab_count = injection_replace_pic($_POST["docters_edu1_header_into_tab_count2{$u}"]);
        for ($x = 1; $x <= $docters_edu1_header_into_tab_count; $x++) {
            $docters_edu1_header_into_tab_title2 = injection_replace_pic($_POST["docters_edu1_header_into_tab_title2{$u}{$x}"]);


            if ($docters_edu1_header_into_tab_title2 > "") {
                insert_templdate($site, '', $la, '', $docters_edu1_header_into_tab_title2, '', '', "docters_edu1_header_into_tab2$u$x", 'ebnesinahospital', $coms_conect);
            }
        }
}

//content
    $count1_docters_edu1_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_edu1_main_header3%' ", $coms_conect);
    $block_name_setting_docters_edu1_main_header = injection_replace($_POST["block_name_setting_docters_edu1_main_header3"]);
    if ($block_name_setting_docters_edu1_main_header > "") {
        insert_templdate($site, '', $la, $block_name_setting_docters_edu1_main_header, '', '', '', "setting_docters_edu1_main_header3", 'ebnesinahospital', $coms_conect);
    }
    //----------tab name
    $condition_docters_edu1_main_header = "name like 'docters_edu1_main_header3%' and tem_name='ebnesinahospital'";
    delete_from_data_base('new_tem_setting', $condition_docters_edu1_main_header, $coms_conect);

    $docters_edu1_main_header_count = injection_replace_pic($_POST["docters_edu1_main_header_count3"]);
    for ($x = 1; $x <= $docters_edu1_main_header_count; $x++) {

        $docters_edu1_main_header_text = injection_replace_pic($_POST["docters_edu1_main_header_text3{$x}"]);
        $docters_edu1_main_header_title = injection_replace_pic($_POST["docters_edu1_main_header_title3{$x}"]);
        $docters_edu1_main_header_pic_adress = injection_replace_pic($_POST["docters_edu1_main_header_pic_adress3{$x}"]);
        $docters_edu1_main_header_pic_adress = resize_image_M($docters_edu1_main_header_pic_adress,128,128,$img_page_main,'');
        $docters_edu1_main_header_avatar7 = injection_replace($_POST["docters_edu1_main_header_avatar7{$x}"][0]);
        if ($docters_edu1_main_header_avatar7 > "") {
            $docters_edu1_main_header_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $docters_edu1_main_header_avatar7;
            $docters_edu1_main_header_pic_adress = resize_image_M($docters_edu1_main_header_pic_adress,128,128,$img_page_main,'');

        }
        if ($docters_edu1_main_header_text > "") {
            insert_templdate($site, $docters_edu1_main_header_pic_adress, $la, $docters_edu1_main_header_text, $docters_edu1_main_header_title, '', '', "docters_edu1_main_header3$x", 'ebnesinahospital', $coms_conect);
        }
    }
    //-------end tab name------------
    //-------tab------------
    for ($u = 1; $u <= $count1_docters_edu1_main_header; $u++) {

        $pic_btn_con_title = injection_replace_pic($_POST["pic_btn_con_title{$u}"]);
        $pic_btn_con_link= injection_replace_pic($_POST["pic_btn_con_link{$u}"]);
        $pic_btn_con_text= injection_replace_pic($_POST["pic_btn_con_text{$u}"]);
        $pic_btn_con_pic = injection_replace_pic($_POST["pic_btn_con_pic{$u}"]);
        $pic_btn_con_pic = resize_image_M($pic_btn_con_pic,400,262,$img_page_main,'');
        $pic_btn_con_pic_avatar_orak= injection_replace($_POST["pic_btn_con_pic_avatar_orak{$u}"][0]);
        if ($pic_btn_con_pic_avatar_orak > "") {
            $pic_btn_con_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $pic_btn_con_pic_avatar_orak;
            $pic_btn_con_pic = resize_image_M($pic_btn_con_pic,400,262,$img_page_main,'');

        }
        insert_templdate($site, '', $la, $pic_btn_con_text, $pic_btn_con_title, $pic_btn_con_link, $pic_btn_con_pic, "pic_btn_con3$u", 'ebnesinahospital', $coms_conect);

        $three_text_con_pic = injection_replace_pic($_POST["three_text_con_pic{$u}"]);
        $three_text_con_link= injection_replace_pic($_POST["three_text_con_link{$u}"]);
        $three_text_con_title= injection_replace_pic($_POST["three_text_con_title{$u}"]);
        $three_text_con_text= injection_replace_pic($_POST["three_text_con_text{$u}"]);
        $three_text_con_pic_adress= injection_replace_pic($_POST["three_text_con_pic_adress{$u}"]);

        insert_templdate($site, $three_text_con_pic_adress, $la, $three_text_con_text, $three_text_con_title, $three_text_con_link, $three_text_con_pic, "three_text_con3$u", 'ebnesinahospital', $coms_conect);


        $condition_docters_edu1_header_into_tab = "name like 'docters_edu1_header_into_tab3$u%' and tem_name='ebnesinahospital'";
        delete_from_data_base('new_tem_setting', $condition_docters_edu1_header_into_tab, $coms_conect);

        $docters_edu1_header_into_tab_count = injection_replace_pic($_POST["docters_edu1_header_into_tab_count3{$u}"]);
        for ($x = 1; $x <= $docters_edu1_header_into_tab_count; $x++) {
            $docters_edu1_header_into_tab_title3 = injection_replace_pic($_POST["docters_edu1_header_into_tab_title3{$u}{$x}"]);
            if ($docters_edu1_header_into_tab_title3 > "") {
                insert_templdate($site, '', $la, '', $docters_edu1_header_into_tab_title3, '', '', "docters_edu1_header_into_tab3$u$x", 'ebnesinahospital', $coms_conect);
            }
        }
    }
//---------
    $docters_pic_sidebar_pic = injection_replace_pic($_POST["docters_pic_sidebar_pic"]);
    $docters_pic_sidebar_link = injection_replace_pic($_POST["docters_pic_sidebar_link"]);
    $docters_pic_sidebar_pic = resize_image_M($docters_pic_sidebar_pic,255,250,$img_page_main,'');
    $docters_pic_sidebar_pic_avatar_orak= injection_replace($_POST["docters_pic_sidebar_pic_avatar_orak"][0]);
    if ($docters_pic_sidebar_pic_avatar_orak > "") {
        $docters_pic_sidebar_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $docters_pic_sidebar_pic_avatar_orak;
        $docters_pic_sidebar_pic = resize_image_M($docters_pic_sidebar_pic,255,250,$img_page_main,'');
    }
    insert_templdate($site, '', $la, '', '', $docters_pic_sidebar_link, $docters_pic_sidebar_pic, "docters_pic_sidebar", 'ebnesinahospital', $coms_conect);

//    -------
    $docters_title_con_title = injection_replace_pic($_POST["docters_title_con_title"]);
    insert_templdate($site, '', $la, '', $docters_title_con_title, '', '', "docters_title_con", 'ebnesinahospital', $coms_conect);
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


<div class="msheet tab-content H_mt15">
    <div class="secfhead">
        <div class="sectitle">
            <div class="icon"><span class="flaticon-text150" style=""></span>
            </div>
            <div class="title"><p class="titr">تنظیمات مربوط به قالب</p>
                <p class="lead">امکان مدیریت و افزودن و ویرایش کردن بلوک های داخل صفحه اول در این قسمت فراهم شده
                    است.</p>
            </div>
        </div>

    </div>
    <div class="panel-body H_pt0">
        <form class="form-horizontal" action="" method="post" name="reg_presonal" id="reg_presonal" role="form"
              enctype="multipart/form-data">
            <input type="hidden" name="send_flag" value="1">

            <!-- vertical tab bootsnipp -->
            <div class="">

                <div class="col-md-12 bhoechie-tab-container"><br>
                    <!--                        <label class="col-md-1 form-group">زبان</label>-->
                    <div class="col-md-2 form-group H_ml0">
                        <? create_lang_filter_none($la, $coms_conect, $_SESSION["manager_title_lang"]) ?>
                    </div>
                    <div class="container">
                        <!--                        <label class="col-md-1 form-group">سایت</label>-->
                        <div class="col-md-2 form-group">
                            <? create_sub_site_filter_none($site, $coms_conect, $_SESSION['manager_title_site']) ?>
                        </div>
                    </div>
                    <div class="row H_mt30">
                        <div class="col-md-12">
                            <div id="clean-demo"
                                 class="tabbed-nav hover clean medium z-icons-dark z-shadows z-bordered z-multiline z-tabs horizontal top-compact top white"
                                 data-options="">
                                <? $temp_tab = get_tem_result($site, $la, "temp_tab", 'ebnesinahospital', $coms_conect); ?>
                                <input type="hidden" name="temp_tab" value="<?= $temp_tab['title'] ?>">
                                <input type="hidden" name="number_tab" value="<?= $temp_tab['text'] ?>">
                                <input type="hidden" name="num_con_tab" value="<?= $temp_tab['pic'] ?>">

                                <ul class="z-tabs-nav z-tabs-desktop H_float_r">

                                    <li class="z-tab H_style_header z-active" data-link="tab1">
                                        <a class="z-link">docters</a>
                                    </li>
                                    <li class="z-tab H_style_header " data-link="tab2">
                                        <a class="z-link">سایدبار</a>
                                    </li>
                                    <li class="z-tab H_style_header " data-link="tab3">
                                        <a class="z-link">محتوای اصلی</a>
                                    </li>


                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------docters---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $docters_box1 = get_tem_result($site, $la, "docters_box1", 'ebnesinahospital', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_docters_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $docters_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_docters_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_docters_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_docters_box1 H_dis_none"
                                                               name="docters_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $docters_box2 = get_tem_result($site, $la, "docters_box2", 'ebnesinahospital', $coms_conect); ?>
                                                    <a id="H_input_rename_docters_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $docters_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_docters_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_docters_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_docters_box2 H_dis_none"
                                                               name="docters_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $docters_box3 = get_tem_result($site, $la, "docters_box3", 'ebnesinahospital', $coms_conect); ?>
                                                    <a id="H_input_rename_docters_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $docters_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_docters_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_docters_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_docters_box3 H_dis_none"
                                                               name="docters_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $docters_box4 = get_tem_result($site, $la, "docters_box4", 'ebnesinahospital', $coms_conect); ?>
                                                    <a id="H_input_rename_docters_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $docters_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_docters_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_docters_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_docters_box4 H_dis_none"
                                                               name="docters_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $docters_boxOne = get_tem_result($site, $la, "docters_boxOne", 'ebnesinahospital', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($docters_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="docters_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family"> تصویر نوبار </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="docters_boxOne_pic"
                                                                               value="<?= $docters_boxOne['pic'] ?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="docters_boxOne_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=docters_boxOne_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div id="docters_boxOne_pic_avatar_orak"
                                                                                     orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box"
                                                                         id="upload_type_docters_boxOne_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group"
                                                                         id="image_show_docters_boxOne_pic">
                                                                        <a href="<?= $docters_boxOne["pic"] ?>"
                                                                           class=" without-caption">
                                                                            <img width="33" height="33"
                                                                                 class="H_cursor_zoom"
                                                                                 src="<?= $docters_boxOne["pic"] ?>"
                                                                                 alt="<?= $docters_boxOne["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#docters_boxOne_pic_avatar_orak').orakuploader({
                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                orakuploader_use_main: false,
                                                                                //orakuploader_use_sortable : true,
                                                                                orakuploader_use_dragndrop: true,
                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                orakuploader_add_label: '',
                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                orakuploader_thumbnail_size: 400,
                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                orakuploader_maximum_uploads: 1
                                                                            });

                                                                            $('#docters_boxOne_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------menu box------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $docters_menubox_show = get_tem_result($site, $la, "docters_menubox_show", 'ebnesinahospital', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($docters_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="docters_menubox_show_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="docters_menubox_show_pic"
                                                                           value="<?= $docters_menubox_show['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="docters_menubox_show_link"
                                                                           value="<?= $docters_menubox_show['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $count_docters_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_docters_menubox_links; $k++) {
                                                                                $docters_menubox_links = get_tem_result($site, $la, "docters_menubox_links$k", 'ebnesinahospital', $coms_conect);

                                                                                    ?>

                                                                                    <div id="ads_docters_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_docters_menubox_links"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">عنوان
                                                                                                <?= $k ?></label>
                                                                                            <div class="form-group col-md-9">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="docters_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $docters_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="docters_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="docters_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $docters_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="docters_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?

                                                                            }
                                                                            $count_docters_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="docters_menubox_links_count"
                                                                                   name="docters_menubox_links_count"
                                                                                   value="<?= --$count_docters_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_docters_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_docters_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_docters_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="docters_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="docters_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="docters_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="docters_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_docters_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#docters_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_docters_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#docters_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_docters_menubox_links' + id).remove();
                                                                                        $('#docters_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_docters_menubox_links"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------sidebar------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $docters_pic_sidebar = get_tem_result($site, $la, "docters_pic_sidebar", 'ebnesinahospital', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family"> تصویر برای سایدبار </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input  placeholder="لینک تصویر" type="text" class="form-control" name="docters_pic_sidebar_link"
                                                                               value="<?= $docters_pic_sidebar['link'] ?>" style="direction: rtl;">
                                                                    </div>
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="docters_pic_sidebar_pic"
                                                                               value="<?= $docters_pic_sidebar['pic'] ?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="docters_pic_sidebar_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=docters_pic_sidebar_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div id="docters_pic_sidebar_pic_avatar_orak"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="docters_pic_sidebar_pic_avatar_orak_link"
                                                                                   name="docters_pic_sidebar_pic_avatar_orak_link"
                                                                                   value="<? ?>">
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box"
                                                                         id="upload_type_docters_pic_sidebar_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group"
                                                                         id="image_show_docters_pic_sidebar_pic">
                                                                        <a href="<?= $docters_pic_sidebar["pic"] ?>"
                                                                           class=" without-caption">
                                                                            <img width="33" height="33"
                                                                                 class="H_cursor_zoom"
                                                                                 src="<?= $docters_pic_sidebar["pic"] ?>"
                                                                                 alt="<?= $docters_pic_sidebar["pic"] ?>">
                                                                        </a>
                                                                    </div>
                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#docters_pic_sidebar_pic_avatar_orak').orakuploader({
                                                                                orakuploader_path: 'new_orakuploader/',
                                                                                orakuploader_main_path: 'new_gallery/files',
                                                                                orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                orakuploader_use_main: false,
                                                                                //orakuploader_use_sortable : true,
                                                                                orakuploader_use_dragndrop: true,
                                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                orakuploader_add_label: '',
                                                                                orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                orakuploader_thumbnail_size: 400,
                                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                orakuploader_maximum_uploads: 1
                                                                            });

                                                                            $('#docters_pic_sidebar_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------content------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $docters_title_con = get_tem_result($site, $la, "docters_title_con", 'ebnesinahospital', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان باکس محتوا</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="docters_title_con_title"
                                                                           value="<?= $docters_title_con['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-----------------------------------------------------edu1---------------------------------------------->

                                    <div class="z-content tab2" style="position: absolute;">
                                        <div class="z-content-inner">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H2">
                                                <div class="list-group">
                                                    <? $setting_docters_sidebar = get_tem_result($site, $la, "setting_docters_sidebar2", 'ebnesinahospital', $coms_conect); ?>
                                                    <a id="H_input_rename_setting_docters_sidebar2" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $setting_docters_sidebar['text'] ?>تنظیمات</span>
                                                    </a>
                                                    <?
                                                    $count_docters_header_sidebar = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_edu1_main_header2%' ", $coms_conect);
                                                    for ($x = 1; $x <= $count_docters_header_sidebar; $x++) {
                                                        $docters_edu1_header1 = get_tem_result($site, $la, "docters_edu1_main_header2$x", 'ebnesinahospital', $coms_conect);

                                                            ?>
                                                            <a id="H_input_rename_tab2<?= $x ?>" href="#"
                                                               class="list-group-item  text-center ">
                                                                <span class="temp"><?= $docters_edu1_header1['text'] ?></span>
                                                            </a>
                                                        <?
                                                    } ?>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H2">

                                                <div class="bhoechie-tab-content H2 active">

                                                    <div class="tab-pane">
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <!-- #section:download/download.link -->
                                                                    <div class="col-md-12">
                                                                        <?
                                                                        $count_docters_header_sidebar = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_edu1_main_header2%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_docters_header_sidebar; $x++) {
                                                                            $docters_edu1_main_header = get_tem_result($site, $la, "docters_edu1_main_header2$x", 'ebnesinahospital', $coms_conect);

                                                                                ?>
                                                                                <div id="div_mother_third_choicedel_docters_edu1_main_header2<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_docters_edu1_main_header2"
                                                                                           id="2<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-12 input-group">
                                                                                                <input type="text"
                                                                                                       id="docters_edu1_main_header_text2<?= $x ?>"
                                                                                                       value="<?= $docters_edu1_main_header["text"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="docters_edu1_main_header_text2<?= $x ?>">
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?

                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="docters_edu1_main_header_count2"
                                                                               name="docters_edu1_main_header_count2"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = 2<?=$x?>;

                                                                                $('#add_docters_edu1_main_header-ads2').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choicedel_docters_edu1_main_header' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_docters_edu1_main_header" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-12 input-group"><input type="text" id="docters_edu1_main_header_text' + i + '" value="" class="form-control" placeholder="عنوان" name="docters_edu1_main_header_text' + i + '" ></div> </div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choicedel_docters_edu1_main_header' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#docters_edu1_main_header_count2').val(i);

                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_docters_edu1_main_header2', function () {
                                                                                    var id = '';
                                                                                    var k = $('#docters_edu1_main_header_count2').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');

                                                                                    $('#div_mother_third_choicedel_docters_edu1_main_header' + id).remove();
                                                                                    $('#docters_edu1_main_header_count2').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_docters_edu1_main_header-ads2"><i
                                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                    class="fa fa-plus"></i>افزودن
                                                                            لینک</a>
                                                                        </br>
                                                                    </div>
                                                                    <!-- /section:download/download.link -->
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- tab-->
                                                <? for ($y = 1; $y <= $count_docters_header_sidebar; $y++) { ?>

                                                    <div id="tabbb2<?= $y ?>" class="bhoechie-tab-content H2 ">
                                                        <div class="col-md-12">

                                                            <div class="mt40 pt20 content_forms2<?=$y?>">

                                                                <div id="show_form1" class="formmm H_dis_none ">

                                                                    <div class="tab-pane">
                                                                        <div class="page-content-area">
                                                                            <div class="page-body"
                                                                                 style="margin-top: 25px;">
                                                                                <fieldset>
                                                                                    <!-- #section:download/download.link -->
                                                                                    <div class="col-md-12">
                                                                                        <?
                                                                                        $count1_docters_edu1_header_into_tab = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_edu1_header_into_tab2$y%' ", $coms_conect);
                                                                                        for ($x = 1; $x <= $count1_docters_edu1_header_into_tab; $x++) {
                                                                                            $docters_edu1_header_into_tab = get_tem_result($site, $la, "docters_edu1_header_into_tab2$y$x", 'ebnesinahospital', $coms_conect);

                                                                                                ?>
                                                                                                <div id="div_mother_third_choicedel_docters_edu1_header_into_tab2<?= $y ?><?= $x ?>"
                                                                                                     class="seyed"
                                                                                                     style="opacity: 1;">
                                                                                                    <div class="form-group">
                                                                                                        <a class="col-md-1 control-label del_docters_edu1_header_into_tab"
                                                                                                           id="2<?= $y ?><?= $x ?>"
                                                                                                           for="family"><i
                                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                                    title=""
                                                                                                                    data-original-title="حذف"></i>
                                                                                                        </a>

                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-12 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="docters_edu1_header_into_tab_title2<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $docters_edu1_header_into_tab["title"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="عنوان"
                                                                                                                       name="docters_edu1_header_into_tab_title2<?= $y ?><?= $x ?>">
                                                                                                            </div>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>
                                                                                                <?

                                                                                        }
                                                                                        $xcount_mahsol = $x;
                                                                                        ?>
                                                                                        <input type="hidden"
                                                                                               id="docters_edu1_header_into_tab_count2<?= $y ?>"
                                                                                               name="docters_edu1_header_into_tab_count2<?= $y ?>"
                                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                var i = 2<?=$y?><?=$x?>;

                                                                                                $('#add_docters_edu1_header_into_tab-ads2<?=$y?>').on("click", function () {
                                                                                                    
                                                                                                    var someText = '<div id="div_mother_third_choicedel_docters_edu1_header_into_tab' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_docters_edu1_header_into_tab" id="' + i + '" for="family" ><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="col-md-11 input-group H_pl32"><div class="col-md-12 input-group"><input type="text" id="docters_edu1_header_into_tab_title' + i + '" value="" class="form-control"   placeholder="عنوان " name="docters_edu1_header_into_tab_title'+ i +'"></div></div></div></div>';
                                                                                                    $(this).before(someText);
                                                                                                    $('#div_mother_third_choicedel_docters_edu1_header_into_tab' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                        $(this).css('background', '');
                                                                                                    }).fadeTo('slow', 1);
                                                                                                    $('#docters_edu1_header_into_tab_count2<?=$y?>').val(i);
                                                                                                    i++;

                                                                                                });
                                                                                                $(document).on('click', '.del_docters_edu1_header_into_tab', function () {
                                                                                                    var id = '';
                                                                                                    var k = $('#docters_edu1_header_into_tab_count2<?=$y?>').val();
                                                                                                    k--
                                                                                                    id = $(this).attr('id');
                                                                                                    $('#div_mother_third_choicedel_docters_edu1_header_into_tab' + id).remove();
                                                                                                    $('#docters_edu1_header_into_tab_count2<?=$y?>').val(k);
                                                                                                });
                                                                                            });


                                                                                        </script>
                                                                                        <a class="btn btn-success block"
                                                                                           id="add_docters_edu1_header_into_tab-ads2<?= $y ?>"><i
                                                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                                    class="fa fa-plus"></i>افزودن
                                                                                            لینک</a>
                                                                                        </br>
                                                                                    </div>
                                                                                    <!-- /section:download/download.link -->
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function () {
                                                            $('input#form12<?= $y ?>').click(function () {
                                                                $('.content_forms2<?=$y?> #show_form1').siblings().addClass('H_dis_none');
                                                                $('.content_forms2<?=$y?> #show_form1').removeClass('H_dis_none');
                                                            });

                                                            $(".content_forms2<?=$y?>").find('[id=<? if($temp_tabTwo['link']==""){echo 'show_form1';}else echo $temp_tabTwo['link']; ?>]').removeClass('H_dis_none');

                                                            $("form").submit(function () {
                                                                var num_tab_forms = $(".content_forms2<?=$y?> .formmm").not(".H_dis_none").attr("id");
                                                                $('[name="num_tab_forms_tab2<?=$y?>"]').val(num_tab_forms);

                                                            });

                                                        })
                                                    </script>

                                                <? } ?>
                                                <!--end tab-->

                                            </div>
                                        </div>
                                    </div>

                                    <div class="z-content tab3" style="position: absolute;">
                                        <div class="z-content-inner">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H3">
                                                <div class="list-group">
                                                    <? $setting_docters_edu1_main_header = get_tem_result($site, $la, "setting_docters_edu1_main_header3", 'ebnesinahospital', $coms_conect); ?>
                                                    <a id="H_input_rename_setting_docters_edu1_main_header3" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $setting_docters_edu1_main_header['text'] ?>تنظیمات</span>
                                                    </a>
                                                    <?
                                                    $count1_docters_edu1_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_edu1_main_header3%' ", $coms_conect);
                                                    for ($x = 1; $x <= $count1_docters_edu1_main_header; $x++) {
                                                        $docters_edu1_header1 = get_tem_result($site, $la, "docters_edu1_main_header3$x", 'ebnesinahospital', $coms_conect);

                                                            ?>
                                                            <a id="H_input_rename_tab3<?= $x ?>" href="#"
                                                               class="list-group-item  text-center ">
                                                                <span class="temp"><?= $docters_edu1_header1['text'] ?></span>
                                                            </a>
                                                        <?
                                                    } ?>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H3">
                                                <div class="bhoechie-tab-content H3 active">
                                                    <div class="tab-pane">
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <!-- #section:download/download.link -->
                                                                    <div class="col-md-12">
                                                                        <?
                                                                        $count1_docters_edu1_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_edu1_main_header3%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count1_docters_edu1_main_header; $x++) {
                                                                            $docters_edu1_main_header = get_tem_result($site, $la, "docters_edu1_main_header3$x", 'ebnesinahospital', $coms_conect);

                                                                                ?>
                                                                                <div id="div_mother_third_choicedel_docters_edu1_main_header3<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_docters_edu1_main_header3"
                                                                                           id="3<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>
                                                                                        </a>
                                                                                        <div class="form-group col-md-11">
                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="docters_edu1_main_header_text3<?= $x ?>"
                                                                                                       value="<?= $docters_edu1_main_header["text"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول "
                                                                                                       name="docters_edu1_main_header_text3<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="docters_edu1_main_header_title3<?= $x ?>"
                                                                                                       value="<?= $docters_edu1_main_header["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان دوم "
                                                                                                       name="docters_edu1_main_header_title3<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="docters_edu1_main_header_pic_adress3<?= $x ?>"
                                                                                                       value="<?=$docters_edu1_main_header["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="docters_edu1_main_header_pic_adress3<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=docters_edu1_main_header_pic_adress3<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                                <span class="input-group-addon H_neshane1 H_docters_edu1_main_header<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                    <div id="docters_edu1_main_header_avatar7<?= $x ?>"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="docters_edu1_main_header_avatar7_link<?= $x ?>"
                                                                                       name="docters_edu1_main_header_avatar7_link<?= $x ?>"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_docters_edu1_main_header<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class=" col-md-1 input-group"
                                                                                                 id="image_show_docters_edu1_main_header<?= $x ?>">

                                                                                                <a href="<?= $docters_edu1_main_header["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $docters_edu1_main_header["pic_adress"] ?>"
                                                                                                         alt="<?= $docters_edu1_main_header["text"] ?>">
                                                                                                </a>

                                                                                            </div>
                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#docters_edu1_main_header_avatar7<?=$x?>').orakuploader({
                                                                                                        orakuploader_path: 'new_orakuploader/',
                                                                                                        orakuploader_main_path: 'new_gallery/files',
                                                                                                        orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                                        orakuploader_use_main: false,
                                                                                                        //orakuploader_use_sortable : true,
                                                                                                        orakuploader_use_dragndrop: true,
                                                                                                        orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                                        orakuploader_add_label: '',
                                                                                                        orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                                        orakuploader_thumbnail_size: 400,
                                                                                                        orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                                        orakuploader_maximum_uploads: 1
                                                                                                    });

                                                                                                    $('#docters_edu1_main_header_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?

                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="docters_edu1_main_header_count3"
                                                                               name="docters_edu1_main_header_count3"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = 3<?=$x?>;

                                                                                $('#add_docters_edu1_main_header-ads3').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choicedel_docters_edu1_main_header' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_docters_edu1_main_header" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="docters_edu1_main_header_text' + i + '" value="" class="form-control" placeholder="عنوان اول" name="docters_edu1_main_header_text' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="docters_edu1_main_header_title' + i + '" value="" class="form-control" placeholder="عنوان دوم" name="docters_edu1_main_header_title' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="docters_edu1_main_header_pic_adress' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="docters_edu1_main_header_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=docters_edu1_main_header_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_docters_edu1_main_header' + i + '" style="padding: 0px;"><div  id="docters_edu1_main_header_avatar7' + i +'" orakuploader="on"></div><input type="hidden" id="docters_edu1_main_header_avatar7_link' + i +'" name="docters_edu1_main_header_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_docters_edu1_main_header' + i + '" style="float:right;"></div> </div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choicedel_docters_edu1_main_header' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#docters_edu1_main_header_count3').val(i);
                                                                                    //--------orakuploader
                                                                                    $('#docters_edu1_main_header_avatar7' + i + '').orakuploader({
                                                                                        orakuploader_path: 'new_orakuploader/',
                                                                                        orakuploader_main_path: 'new_gallery/files',
                                                                                        orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                        orakuploader_use_main: false,
                                                                                        //orakuploader_use_sortable : true,
                                                                                        orakuploader_use_dragndrop: true,
                                                                                        orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                        orakuploader_add_label: '',
                                                                                        orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                        orakuploader_thumbnail_size: 400,
                                                                                        orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                        orakuploader_maximum_uploads: 1
                                                                                    });

                                                                                    $('#docters_edu1_main_header_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_docters_edu1_main_header' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_docters_edu1_main_header' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_docters_edu1_main_header3', function () {
                                                                                    var id = '';
                                                                                    var k = $('#docters_edu1_main_header_count3').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');

                                                                                    $('#div_mother_third_choicedel_docters_edu1_main_header' + id).remove();
                                                                                    $('#docters_edu1_main_header_count3').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_docters_edu1_main_header-ads3"><i
                                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                    class="fa fa-plus"></i>افزودن
                                                                            لینک</a>
                                                                        </br>
                                                                    </div>
                                                                    <!-- /section:download/download.link -->
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- tab-->
                                                <? for ($y = 1; $y <= $count1_docters_edu1_main_header; $y++) { ?>

                                                    <div id="tabbb3<?= $y ?>" class="bhoechie-tab-content H3 ">
                                                        <div class="col-md-12">
                                                            <? $pic_btn_con = get_tem_result($site, $la, "pic_btn_con3$y", 'ebnesinahospital', $coms_conect); ?>
                                                            <? $three_text_con = get_tem_result($site, $la, "three_text_con3$y", 'ebnesinahospital', $coms_conect); ?>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label" for="family">دکمه</label>
                                                                <div class="form-group col-md-10">
                                                                    <div class="col-md-6 input-group">
                                                                        <input type="text" class="form-control" name="pic_btn_con_title<?= $y ?>"
                                                                               value="<?= $pic_btn_con['title'] ?>" style="direction: rtl;">
                                                                    </div>

                                                                    <div class="col-md-6 input-group">
                                                                        <input type="text" class="form-control" name="pic_btn_con_link<?= $y ?>"
                                                                               value="<?= $pic_btn_con['link'] ?>" style="direction: rtl;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="family"> تصویر </label>
                                                                <div class="form-group col-md-9">
                                                                    <div class="col-md-12 input-group">
                                                                        <div class="col-md-5 input-group">
                                                                            <input type="text"
                                                                                   id="pic_btn_con_pic<?= $y ?>"
                                                                                   value="<?= $pic_btn_con['pic'] ?>"
                                                                                   class="form-control"
                                                                                   placeholder=" تصویر"
                                                                                   name="pic_btn_con_pic<?= $y ?>"
                                                                                   style="direction: ltr;">
                                                                            <span class="input-group-addon"
                                                                                  style="padding: 0px;"><a
                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=pic_btn_con_pic<?= $y ?>"
                                                                                        class="btn btn-success iframe-btn"
                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                            <span class="input-group-addon H_neshane1 H_third_choice_box6<?= $y ?>"
                                                                                  style="padding: 0px;">
                                                                                <div id="pic_btn_con_pic_avatar_orak<?= $y ?>"
                                                                                     orakuploader="on"></div>
                                                                        <input type="hidden"
                                                                               id="pic_btn_con_pic_avatar_orak_link<?= $y ?>"
                                                                               name="pic_btn_con_pic_avatar_orak_link<?= $y ?>"
                                                                               value="<? ?>">
                                                                            </span>
                                                                        </div>
                                                                        <div class="ui-sortable red box"
                                                                             id="upload_type_pic_btn_con_pic<?= $y ?>"
                                                                             style="float:right;">
                                                                        </div>
                                                                        <div class="col-md-1 input-group"
                                                                             id="image_show_pic_btn_con_pic<?= $y ?>">
                                                                            <a href="<?= $pic_btn_con["pic"] ?>"
                                                                               class=" without-caption">
                                                                                <img width="33" height="33"
                                                                                     class="H_cursor_zoom"
                                                                                     src="<?= $pic_btn_con["pic"] ?>"
                                                                                     alt="<?= $pic_btn_con["pic"] ?>">
                                                                            </a>
                                                                        </div>

                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $('#pic_btn_con_pic_avatar_orak<?= $y ?>').orakuploader({
                                                                                    orakuploader_path: 'new_orakuploader/',
                                                                                    orakuploader_main_path: 'new_gallery/files',
                                                                                    orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                                                    orakuploader_use_main: false,
                                                                                    //orakuploader_use_sortable : true,
                                                                                    orakuploader_use_dragndrop: true,
                                                                                    orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                                    orakuploader_add_label: '',
                                                                                    orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                                                                    orakuploader_thumbnail_size: 400,
                                                                                    orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                                    orakuploader_maximum_uploads: 1
                                                                                });

                                                                                $('#pic_btn_con_pic_avatar_orak<?= $y ?>').html("<?=$pic_str?>");
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label" for="family">متن با لینک</label>
                                                                <div class="form-group col-md-10">
                                                                    <div class="col-md-6 input-group">
                                                                        <input type="text" class="form-control" name="three_text_con_pic<?= $y ?>"
                                                                               value="<?= $three_text_con['pic'] ?>" style="direction: rtl;">
                                                                    </div>

                                                                    <div class="col-md-6 input-group">
                                                                        <input type="text" class="form-control" name="three_text_con_link<?= $y ?>"
                                                                               value="<?= $three_text_con['link'] ?>" style="direction: rtl;">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label" for="family">متن با لینک</label>
                                                                <div class="form-group col-md-10">
                                                                    <div class="col-md-6 input-group">
                                                                        <input type="text" class="form-control" name="three_text_con_title<?= $y ?>"
                                                                               value="<?= $three_text_con['title'] ?>" style="direction: rtl;">
                                                                    </div>

                                                                    <div class="col-md-6 input-group">
                                                                        <input type="text" class="form-control" name="three_text_con_text<?= $y ?>"
                                                                               value="<?= $three_text_con['text'] ?>" style="direction: rtl;">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label" for="family">متن با لینک</label>
                                                                <div class="form-group col-md-10">
                                                                    <div class="col-md-6 input-group">
                                                                        <input type="text" class="form-control" name="three_text_con_pic_adress<?= $y ?>"
                                                                               value="<?= $three_text_con['pic_adress'] ?>" style="direction: rtl;">
                                                                    </div>

                                                                    <div class="col-md-6 input-group">
                                                                        <input type="text" class="form-control" name="pic_btn_con_text<?= $y ?>"
                                                                               value="<?= $pic_btn_con['text'] ?>" style="direction: rtl;">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class=" content_forms3<?=$y?>">

                                                                <div id="show_form1" class="formmm H_dis_none ">

                                                                    <div class="tab-pane">
                                                                        <div class="page-content-area">
                                                                            <div class="page-body"
                                                                                 style="margin-top: 25px;">
                                                                                <fieldset>
                                                                                    <!-- #section:download/download.link -->
                                                                                    <div class="col-md-12">
                                                                                        <?
                                                                                        $count1_docters_edu1_header_into_tab = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='ebnesinahospital' and name like 'docters_edu1_header_into_tab3$y%' ", $coms_conect);
                                                                                        for ($x = 1; $x <= $count1_docters_edu1_header_into_tab; $x++) {
                                                                                            $docters_edu1_header_into_tab = get_tem_result($site, $la, "docters_edu1_header_into_tab3$y$x", 'ebnesinahospital', $coms_conect);

                                                                                                ?>
                                                                                                <div id="div_mother_third_choicedel_docters_edu1_header_into_tab3<?= $y ?><?= $x ?>"
                                                                                                     class="seyed"
                                                                                                     style="opacity: 1;">
                                                                                                    <div class="form-group">
                                                                                                        <a class="col-md-1 control-label del_docters_edu1_header_into_tab"
                                                                                                           id="3<?= $y ?><?= $x ?>"
                                                                                                           for="family"><i
                                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                                    title=""
                                                                                                                    data-original-title="حذف"></i>
                                                                                                        </a>

                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-12 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="docters_edu1_header_into_tab_title3<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $docters_edu1_header_into_tab["title"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="عنوان"
                                                                                                                       name="docters_edu1_header_into_tab_title3<?= $y ?><?= $x ?>">
                                                                                                            </div>

                                                                                                        </div>

                                                                                                    </div>

                                                                                                </div>
                                                                                                <?

                                                                                        }
                                                                                        $xcount_mahsol = $x;
                                                                                        ?>
                                                                                        <input type="hidden"
                                                                                               id="docters_edu1_header_into_tab_count3<?= $y ?>"
                                                                                               name="docters_edu1_header_into_tab_count3<?= $y ?>"
                                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                var i = 3<?=$y?><?=$x?>;

                                                                                                $('#add_docters_edu1_header_into_tab-ads3<?=$y?>').on("click", function () {

                                                                                                    var someText = '<div id="div_mother_third_choicedel_docters_edu1_header_into_tab' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_docters_edu1_header_into_tab" id="' + i + '" for="family" ><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="col-md-11 input-group H_pl32"><div class="col-md-12 input-group"><input type="text" id="docters_edu1_header_into_tab_title' + i + '" value="" class="form-control"   placeholder="عنوان " name="docters_edu1_header_into_tab_title'+ i +'"></div></div></div></div>';
                                                                                                    $(this).before(someText);
                                                                                                    $('#div_mother_third_choicedel_docters_edu1_header_into_tab' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                        $(this).css('background', '');
                                                                                                    }).fadeTo('slow', 1);
                                                                                                    $('#docters_edu1_header_into_tab_count3<?=$y?>').val(i);
                                                                                                    i++;

                                                                                                });
                                                                                                $(document).on('click', '.del_docters_edu1_header_into_tab', function () {
                                                                                                    var id = '';
                                                                                                    var k = $('#docters_edu1_header_into_tab_count3<?=$y?>').val();
                                                                                                    k--
                                                                                                    id = $(this).attr('id');
                                                                                                    $('#div_mother_third_choicedel_docters_edu1_header_into_tab' + id).remove();
                                                                                                    $('#docters_edu1_header_into_tab_count3<?=$y?>').val(k);
                                                                                                });
                                                                                            });


                                                                                        </script>
                                                                                        <a class="btn btn-success block"
                                                                                           id="add_docters_edu1_header_into_tab-ads3<?= $y ?>"><i
                                                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                                    class="fa fa-plus"></i>افزودن
                                                                                            لینک</a>
                                                                                        </br>
                                                                                    </div>
                                                                                    <!-- /section:download/download.link -->
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        $(document).ready(function () {
                                                            $('input#form13<?= $y ?>').click(function () {
                                                                $('.content_forms3<?=$y?> #show_form1').siblings().addClass('H_dis_none');
                                                                $('.content_forms3<?=$y?> #show_form1').removeClass('H_dis_none');
                                                            });

                                                            $(".content_forms3<?=$y?>").find('[id=<? if($temp_tabTwo['link']==""){echo 'show_form1';}else echo $temp_tabTwo['link']; ?>]').removeClass('H_dis_none');

                                                            $("form").submit(function () {
                                                                var num_tab_forms = $(".content_forms3<?=$y?> .formmm").not(".H_dis_none").attr("id");
                                                                $('[name="num_tab_forms_tab3<?=$y?>"]').val(num_tab_forms);

                                                            });

                                                        })
                                                    </script>

                                                <? } ?>
                                                <!--end tab-->

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
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
<!-- show box for edit name block-->
<script>
    $(document).ready(function () {

        //-------------------------------


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

        //----------docters---------------------
        $(".H_rename_docters_box1").click(function () {
            $(this).hide();
            $('.H_rename_docters_box1_save').show();
            $(".H_input_rename_docters_box1").toggle(300);
        });
        $(".H_rename_docters_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'ebnesinahospital' + "&name=" + 'docters_box1' + "&value=" + $(".H_input_rename_docters_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_docters_box1 > span.temp").text($(".H_input_rename_docters_box1").val());
            $(this).hide();
            $('.H_rename_docters_box1').show();
            $(".H_input_rename_docters_box1").hide();
            $(".H_rename_docters_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_docters_box2").click(function () {
            $(this).hide();
            $('.H_rename_docters_box2_save').show();
            $(".H_input_rename_docters_box2").toggle(300);
        });
        $(".H_rename_docters_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'ebnesinahospital' + "&name=" + 'docters_box2' + "&value=" + $(".H_input_rename_docters_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_docters_box2 > span.temp").text($(".H_input_rename_docters_box2").val());
            $(this).hide();
            $('.H_rename_docters_box2').show();
            $(".H_input_rename_docters_box2").hide();
            $(".H_rename_docters_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_docters_box3").click(function () {
            $(this).hide();
            $('.H_rename_docters_box3_save').show();
            $(".H_input_rename_docters_box3").toggle(300);
        });
        $(".H_rename_docters_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'ebnesinahospital' + "&name=" + 'docters_box3' + "&value=" + $(".H_input_rename_docters_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_docters_box3 > span.temp").text($(".H_input_rename_docters_box3").val());
            $(this).hide();
            $('.H_rename_docters_box3').show();
            $(".H_input_rename_docters_box3").hide();
            $(".H_rename_docters_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_docters_box4").click(function () {
            $(this).hide();
            $('.H_rename_docters_box4_save').show();
            $(".H_input_rename_docters_box4").toggle(300);
        });
        $(".H_rename_docters_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'ebnesinahospital' + "&name=" + 'docters_box4' + "&value=" + $(".H_input_rename_docters_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_docters_box4 > span.temp").text($(".H_input_rename_docters_box4").val());
            $(this).hide();
            $('.H_rename_docters_box4').show();
            $(".H_input_rename_docters_box4").hide();
            $(".H_rename_docters_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });

    });
</script>


</div>

<!---------------return last tabs------------------>
<script>
    $(document).ready(function () {

        $("ul.z-tabs-desktop").find('li.z-active').removeClass('z-active');
        $("ul.z-tabs-desktop").find('[data-link=<?= $temp_tab['title'] ?>]').addClass('z-active');

        $("#clean-demo .z-container > div").removeClass('z-active').siblings().css('display', 'none');
        $("#clean-demo .z-container").find('.<?= $temp_tab['title'] ?>').addClass('z-active').css({
            'display': 'block',
            'position': 'relative'
        }).find('div.bhoechie-tab-content.active');

        $("#clean-demo .z-container > div.z-active div.list-group a").removeClass('active');
        $("#clean-demo .z-container > div.z-active div.list-group").find('[id=<?= $temp_tab['text'] ?>]').addClass('active');

        $("#clean-demo .z-container div.z-active div.bhoechie-tab-content").removeClass('active');
        $("#clean-demo .z-container div.z-active div.bhoechie-tab").find('[id=<?= $temp_tab['pic'] ?>]').addClass('active');


    });
    $("form").submit(function () {
        var val = $("ul.z-tabs-desktop").find('li.z-active').attr("data-link");
        $('[name="temp_tab"]').val(val);
        var number = $("#clean-demo .z-container div.z-active div.list-group a.active").attr("id");
        $('[name="number_tab"]').val(number);
        var num_con = $("#clean-demo .z-container div.z-active div.bhoechie-tab-content.active").attr("id");
        $('[name="num_con_tab"]').val(num_con);




    });
</script>
<!---------------End return last tabs------------------>

<!--===========================popup img mahsolat=============================-->
<script>
    $('.without-caption').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 600 // don't foget to change the duration also in CSS
        }
    });

    $('.with-caption').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
            verticalFit: true,
            titleSrc: function (item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
            }
        },
        zoom: {
            enabled: true
        }
    });
</script>
<!--===========================End popup img mahsolat=============================-->

<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/iconset/iconset-fontawesome-4.2.0.min.js"></script>

<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
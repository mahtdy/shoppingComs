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

    insert_templdate($site, '', $la, $number_tab, $temp_tab, '', $num_con_tab, "temp_tab", 'coms2', $coms_conect);



    ########################################################### content ########################################################
//    sidebar1
    $content_text_menubox_show_pic_adress=0;
    $content_text_menubox_show_pic_adress = injection_replace_pic($_POST["content_text_menubox_show_pic_adress"]);
    insert_templdate($site, $content_text_menubox_show_pic_adress, $la, '', '', '', '', "content_text_menubox_show", 'coms2', $coms_conect);

    $content_text_menubox_links_del = "name like 'content_text_menubox_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $content_text_menubox_links_del, $coms_conect);
    $content_text_menubox_links_count = injection_replace_pic($_POST["content_text_menubox_links_count"]);
    for ($k = 1; $k <= $content_text_menubox_links_count; $k++) {
        $content_text_menubox_links_title = injection_replace_pic($_POST["content_text_menubox_links_title{$k}"]);
        $content_text_menubox_links_link = injection_replace_pic($_POST["content_text_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $content_text_menubox_links_title, $content_text_menubox_links_link, '', "content_text_menubox_links$k", 'coms2', $coms_conect);
    }

//   navar center
    $content_text_nv_show_pic_adress = 0;
    $content_text_nv_show_pic_adress= injection_replace($_POST["content_text_nv_show_pic_adress"]);
    $content_text_nv_show_pic= injection_replace($_POST["content_text_nv_show_pic"]);
    $content_text_nv_show_link= injection_replace($_POST["content_text_nv_show_link"]);
    insert_templdate($site, $content_text_nv_show_pic_adress, $la, '', '', $content_text_nv_show_link, $content_text_nv_show_pic, "content_text_nv_show", 'coms2', $coms_conect);

    $ValSelectActive_content_text_nv_title = injection_replace($_POST["ValSelectActive_content_text_nv_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_content_text_nv_title, '', '', "ValSelectActive_content_text_nv", 'coms2', $coms_conect);

    $condition_first_choice_content_text_nv = "name like 'first_choice_content_text_nv%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_content_text_nv, $coms_conect);
    $first_choice_content_text_nv_count = injection_replace_pic($_POST["first_choice_content_text_nv_count"]);

        $first_choice_content_text_nv_cat = injection_replace_pic($_POST["first_choice_content_text_nv_cat"]);
        $first_choice_content_text_nv_subcat_cat = injection_replace_pic($_POST["first_choice_content_text_nv_subcat_cat"]);
        $first_choice_content_text_nv_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_text_nv_Fixed_selection_cat"]);
        $first_choice_content_text_nv_number = injection_replace_pic($_POST["first_choice_content_text_nv_number"]);
        if ($first_choice_content_text_nv_subcat_cat > "")
            insert_templdate($site, $first_choice_content_text_nv_number, $la, $first_choice_content_text_nv_Fixed_selection_cat, '', $first_choice_content_text_nv_cat, $first_choice_content_text_nv_subcat_cat, "first_choice_content_text_nv", 'coms2', $coms_conect);

    $condition_second_choice_content_text_nv = "name like 'second_choice_content_text_nv%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_content_text_nv, $coms_conect);
    $second_choice_content_text_nv_count = injection_replace_pic($_POST["second_choice_content_text_nv_count"]);


        $second_choice_content_text_nv_cat = injection_replace_pic($_POST["second_choice_content_text_nv_cat"]);
        $second_choice_content_text_nv_subcat_cat = injection_replace_pic($_POST["second_choice_content_text_nv_subcat_cat"]);
        $second_choice_content_text_nv_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_text_nv_subcat_cat_content"]);
        if ($second_choice_content_text_nv_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_content_text_nv_subcat_cat_content, $la, '', '', $second_choice_content_text_nv_cat, $second_choice_content_text_nv_subcat_cat, "second_choice_content_text_nv", 'coms2', $coms_conect);


    $condition_third_choice_content_text_nv = "name like 'third_choice_content_text_nv%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_content_text_nv, $coms_conect);
    $third_choice_content_text_nv_count = injection_replace_pic($_POST["third_choice_content_text_nv_count"]);


        $third_choice_content_text_nv_title = injection_replace_pic($_POST["third_choice_content_text_nv_title"]);
        $third_choice_content_text_nv_text = injection_replace_pic($_POST["third_choice_content_text_nv_text"]);
        $third_choice_content_text_nv_link = injection_replace_pic($_POST["third_choice_content_text_nv_link"]);
    $third_choice_content_text_nv_pic = injection_replace_pic($_POST["third_choice_content_text_nv_pic"]);
    $third_choice_content_text_nv_pic = resize_image_M($third_choice_content_text_nv_pic,262,260,$img_page_main,'');
    $third_choice_content_text_nv_avatar7 = injection_replace($_POST["third_choice_content_text_nv_avatar7"][0]);
    if ($third_choice_content_text_nv_avatar7 > "") {
        $third_choice_content_text_nv_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_content_text_nv_avatar7;
        $third_choice_content_text_nv_pic = resize_image_M($third_choice_content_text_nv_pic,262,260,$img_page_main,'');
    }
        if ($third_choice_content_text_nv_title > "") {
            insert_templdate($site, $third_choice_content_text_nv_pic, $la, $third_choice_content_text_nv_text, $third_choice_content_text_nv_title, $third_choice_content_text_nv_link, '', "third_choice_content_text_nv", 'coms2', $coms_conect);
        }
//    sidebar2
    $content_text_sidebar2_show_pic_adress=0;
    $content_text_sidebar2_show_pic_adress = injection_replace_pic($_POST["content_text_sidebar2_show_pic_adress"]);
    $content_text_sidebar2_show_title = injection_replace_pic($_POST["content_text_sidebar2_show_title"]);
    insert_templdate($site, $content_text_sidebar2_show_pic_adress, $la, '', $content_text_sidebar2_show_title, '', '', "content_text_sidebar2_show", 'coms2', $coms_conect);

    $content_text_sidebar2_links_del = "name like 'content_text_sidebar2_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $content_text_sidebar2_links_del, $coms_conect);
    $content_text_sidebar2_links_count = injection_replace_pic($_POST["content_text_sidebar2_links_count"]);
    for ($k = 1; $k <= $content_text_sidebar2_links_count; $k++) {
        $content_text_sidebar2_links_title = injection_replace_pic($_POST["content_text_sidebar2_links_title{$k}"]);
        $content_text_sidebar2_links_link = injection_replace_pic($_POST["content_text_sidebar2_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $content_text_sidebar2_links_title, $content_text_sidebar2_links_link, '', "content_text_sidebar2_links$k", 'coms2', $coms_conect);
    }
//    UnderComment box
    $content_text_UnderComment_show_pic_adress=0;
    $content_text_UnderComment_show_pic_adress = injection_replace_pic($_POST["content_text_UnderComment_show_pic_adress"]);
    $content_text_UnderComment_show_title = injection_replace_pic($_POST["content_text_UnderComment_show_title"]);
    $content_text_UnderComment_show_pic = injection_replace_pic($_POST["content_text_UnderComment_show_pic"]);
    $content_text_UnderComment_show_link = injection_replace_pic($_POST["content_text_UnderComment_show_link"]);
    insert_templdate($site, $content_text_UnderComment_show_pic_adress, $la, '', $content_text_UnderComment_show_title, $content_text_UnderComment_show_link, $content_text_UnderComment_show_pic, "content_text_UnderComment_show", 'coms2', $coms_conect);

    //   custom content
    $ValSelectActive_content_text_UnderComment_title = injection_replace($_POST["ValSelectActive_content_text_UnderComment_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_content_text_UnderComment_title, '', '', "ValSelectActive_content_text_UnderComment", 'coms2', $coms_conect);

    $condition_first_choice_content_text_UnderComment = "name like 'first_choice_content_text_UnderComment%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_content_text_UnderComment, $coms_conect);
    $first_choice_content_text_UnderComment_count = injection_replace_pic($_POST["first_choice_content_text_UnderComment_count"]);
    for ($i = 1; $i <= $first_choice_content_text_UnderComment_count; $i++) {

        $first_choice_content_text_UnderComment_cat = injection_replace_pic($_POST["first_choice_content_text_UnderComment_cat{$i}"]);
        $first_choice_content_text_UnderComment_subcat_cat = injection_replace_pic($_POST["first_choice_content_text_UnderComment_subcat_cat{$i}"]);
        $first_choice_content_text_UnderComment_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_text_UnderComment_Fixed_selection_cat{$i}"]);
        $first_choice_content_text_UnderComment_number = injection_replace_pic($_POST["first_choice_content_text_UnderComment_number{$i}"]);
        if ($first_choice_content_text_UnderComment_subcat_cat > "")
            insert_templdate($site, $first_choice_content_text_UnderComment_number, $la, $first_choice_content_text_UnderComment_Fixed_selection_cat, '', $first_choice_content_text_UnderComment_cat, $first_choice_content_text_UnderComment_subcat_cat, "first_choice_content_text_UnderComment$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_content_text_UnderComment = "name like 'second_choice_content_text_UnderComment%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_content_text_UnderComment, $coms_conect);
    $second_choice_content_text_UnderComment_count = injection_replace_pic($_POST["second_choice_content_text_UnderComment_count"]);
    for ($i = 1; $i <= $second_choice_content_text_UnderComment_count; $i++) {

        $second_choice_content_text_UnderComment_cat = injection_replace_pic($_POST["second_choice_content_text_UnderComment_cat{$i}"]);
        $second_choice_content_text_UnderComment_subcat_cat = injection_replace_pic($_POST["second_choice_content_text_UnderComment_subcat_cat{$i}"]);
        $second_choice_content_text_UnderComment_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_text_UnderComment_subcat_cat_content{$i}"]);
        if ($second_choice_content_text_UnderComment_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_content_text_UnderComment_subcat_cat_content, $la, '', '', $second_choice_content_text_UnderComment_cat, $second_choice_content_text_UnderComment_subcat_cat, "second_choice_content_text_UnderComment$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_content_text_UnderComment = "name like 'third_choice_content_text_UnderComment%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_content_text_UnderComment, $coms_conect);
    $third_choice_content_text_UnderComment_count = injection_replace_pic($_POST["third_choice_content_text_UnderComment_count"]);
    for ($x = 1; $x <= $third_choice_content_text_UnderComment_count; $x++) {

        $third_choice_content_text_UnderComment_title = injection_replace_pic($_POST["third_choice_content_text_UnderComment_title{$x}"]);
        $third_choice_content_text_UnderComment_text = injection_replace_pic($_POST["third_choice_content_text_UnderComment_text{$x}"]);
        $third_choice_content_text_UnderComment_link = injection_replace_pic($_POST["third_choice_content_text_UnderComment_link{$x}"]);
        $third_choice_content_text_UnderComment_pic = injection_replace_pic($_POST["third_choice_content_text_UnderComment_pic{$x}"]);
        $third_choice_content_text_UnderComment_pic =resize_image_M($third_choice_content_text_UnderComment_pic,250,315,$img_page_main,'');

        $third_choice_content_text_UnderComment_avatar7 = injection_replace($_POST["third_choice_content_text_UnderComment_avatar7{$x}"][0]);
        if ($third_choice_content_text_UnderComment_avatar7 > "") {
            $third_choice_content_text_UnderComment_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_content_text_UnderComment_avatar7;
            $third_choice_content_text_UnderComment_pic =resize_image_M($third_choice_content_text_UnderComment_pic,250,315,$img_page_main,'');
        }
        if ($third_choice_content_text_UnderComment_title > "") {
            insert_templdate($site, '', $la, $third_choice_content_text_UnderComment_text, $third_choice_content_text_UnderComment_title, $third_choice_content_text_UnderComment_link, $third_choice_content_text_UnderComment_pic, "third_choice_content_text_UnderComment$x", 'coms2', $coms_conect);
        }
    }
    // degarKhadamat
    $content_text_degarKhadamat_pic_adress = 0;
    $content_text_degarKhadamat_pic_adress= injection_replace($_POST["content_text_degarKhadamat_pic_adress"]);
    $content_text_degarKhadamat_title= injection_replace($_POST["content_text_degarKhadamat_title"]);
    $content_text_degarKhadamat_text= injection_replace($_POST["content_text_degarKhadamat_text"]);
    insert_templdate($site, $content_text_degarKhadamat_pic_adress, $la, $content_text_degarKhadamat_text, $content_text_degarKhadamat_title, '', '', "content_text_degarKhadamat", 'coms2', $coms_conect);

    $condition_content_text_degarKhadamat_content_text = "name like 'content_text_degarKhadamat_content_text%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_content_text_degarKhadamat_content_text, $coms_conect);
    $content_text_degarKhadamat_content_text_count = injection_replace_pic($_POST["content_text_degarKhadamat_content_text_count"]);
    for ($x = 1; $x <= $content_text_degarKhadamat_content_text_count; $x++) {

        $content_text_degarKhadamat_content_text_text = injection_replace_pic($_POST["content_text_degarKhadamat_content_text_text{$x}"]);
        $content_text_degarKhadamat_content_text_title = injection_replace_pic($_POST["content_text_degarKhadamat_content_text_title{$x}"]);
        $content_text_degarKhadamat_content_text_link = injection_replace_pic($_POST["content_text_degarKhadamat_content_text_link{$x}"]);
        $content_text_degarKhadamat_content_text_pic = injection_replace_pic($_POST["content_text_degarKhadamat_content_text_pic{$x}"]);
        $content_text_degarKhadamat_content_text_pic = resize_image_M($content_text_degarKhadamat_content_text_pic,88,76,$img_page_main,'');
        $content_text_degarKhadamat_content_text_avatar7 = injection_replace($_POST["content_text_degarKhadamat_content_text_avatar7{$x}"][0]);
        if ($content_text_degarKhadamat_content_text_avatar7 > "") {
            $content_text_degarKhadamat_content_text_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_text_degarKhadamat_content_text_avatar7;
            $content_text_degarKhadamat_content_text_pic = resize_image_M($content_text_degarKhadamat_content_text_pic,88,76,$img_page_main,'');

        }
        if ($content_text_degarKhadamat_content_text_title > "") {
            insert_templdate($site, $content_text_degarKhadamat_content_text_pic, $la, $content_text_degarKhadamat_content_text_text, $content_text_degarKhadamat_content_text_title, $content_text_degarKhadamat_content_text_link, '', "content_text_degarKhadamat_content_text$x", 'coms2', $coms_conect);
        }
    }

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
                                <? $temp_tab = get_tem_result($site, $la, "temp_tab", 'coms2', $coms_conect); ?>
                                <input type="hidden" name="temp_tab" value="<?= $temp_tab['title'] ?>">
                                <input type="hidden" name="number_tab" value="<?= $temp_tab['text'] ?>">
                                <input type="hidden" name="num_con_tab" value="<?= $temp_tab['pic'] ?>">

                                <ul class="z-tabs-nav z-tabs-desktop H_float_r">

                                    <li class="z-tab H_style_header z-active" data-link="tab1">
                                        <a class="z-link">content</a>
                                    </li>


                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------content---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $content_box1 = get_tem_result($site, $la, "content_box1", 'coms2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_content_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $content_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_box1 H_dis_none"
                                                               name="content_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $content_box2 = get_tem_result($site, $la, "content_box2", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_box2 H_dis_none"
                                                               name="content_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $content_title_box3 = get_tem_result($site, $la, "content_title_box3", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_title_box3 H_dis_none"
                                                               name="content_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $content_title_box4 = get_tem_result($site, $la, "content_title_box4", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_title_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_title_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_title_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_title_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_title_box4 H_dis_none"
                                                               name="content_title_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $content_title_box5 = get_tem_result($site, $la, "content_title_box5", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_title_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_title_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_title_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_title_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_title_box5 H_dis_none"
                                                               name="content_title_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>


                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">


                                                <!-------------------sidebar 1------------------->
                                                <div  id="content1" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_text_menubox_show = get_tem_result($site, $la, "content_text_menubox_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_text_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_text_menubox_show_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div  class="tab-pane">
                                                            <div class="page-content_text-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $count_content_text_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_text_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_content_text_menubox_links; $k++) {
                                                                                $content_text_menubox_links = get_tem_result($site, $la, "content_text_menubox_links$k", 'coms2', $coms_conect);
                                                                                if ($content_text_menubox_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_content_text_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_content_text_menubox_links"
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
                                                                                                           id="content_text_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $content_text_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="content_text_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="content_text_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $content_text_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="content_text_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_content_text_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="content_text_menubox_links_count"
                                                                                   name="content_text_menubox_links_count"
                                                                                   value="<?= --$count_content_text_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_content_text_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_content_text_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_content_text_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="content_text_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="content_text_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="content_text_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="content_text_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_content_text_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#content_text_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_content_text_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#content_text_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_content_text_menubox_links' + id).remove();
                                                                                        $('#content_text_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_content_text_menubox_links"><i
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
                                                <!-------------------نوار وسط صفحه------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_text_nv_show = get_tem_result($site, $la, "content_text_nv_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_text_nv_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_text_nv_show_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        <div class="col-md-12 input-group H_pl32">
                                                            <label class="col-md-2 control-label" for="family">دکمه </label>
                                                            <div class="col-md-5 input-group">
                                                                <input type="text" class="form-control"  placeholder="عنوان دکمه" name="content_text_nv_show_pic"
                                                                       value="<?= $content_text_nv_show['pic'] ?>" style="direction: rtl;">
                                                            </div>
                                                            <div class="col-md-5 input-group">
                                                                <input type="text" class="form-control"  placeholder="لینک دکمه" name="content_text_nv_show_link"
                                                                       value="<?= $content_text_nv_show['link'] ?>" style="direction: rtl;">
                                                            </div>
                                                        </div>
                                                        </div>

                                                        <hr>
                                                        <? $ValSelectActive_content_text_nv = get_tem_result($site, $la, "ValSelectActive_content_text_nv", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_content_text_nv"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_content_text_nv"
                                                                    name="select_type_content_text_nv">

                                                                <option <? if ($ValSelectActive_content_text_nv["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_text_nv["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_text_nv["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_content_text_nv_title" type="hidden"
                                                                   value="<?= $ValSelectActive_content_text_nv["title"] ?>">

                                                            <div class="tab-pane opt_content_text_nv content_text_nv_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                    $first_choice_content_text_nv = get_tem_result($site, $la, "first_choice_content_text_nv", 'coms2', $coms_conect);
                                                                                   ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_content_text_nv"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">

                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_content_text_nv col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_content_text_nv_subcat_val"
                                                                                                               name="first_choice_content_text_nv_subcat_val"
                                                                                                               value="<?= $first_choice_content_text_nv['pic'] ?>">

                                                                                                        <select id="first_choice_content_text_nv_cat"
                                                                                                                data-selectid=""
                                                                                                                class="form-control H_first_choice_content_text_nv_cat"
                                                                                                                name="first_choice_content_text_nv_cat">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_content_text_nv['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_content_text_nv"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_content_text_nv_new&id=" + $("#first_choice_content_text_nv_cat").val() + "&value=" + $("#first_choice_content_text_nv_subcat_val").val() + "&field_nmae=" + '<?=$la?>' ,
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_content_text_nv').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_content_text_nv_Fixed_selection_cat"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_content_text_nv_Fixed_selection_cat">
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_text_nv['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_text_nv['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_text_nv['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>


                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_content_text_nv_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_content_text_nv').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_content_text_nv_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_content_text_nv<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });


                                                                                </script>

                                                                                </br>
                                                                            </div>
                                                                            <!-- /section:download/download.link -->
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane opt_content_text_nv content_text_nv_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                              <?  $second_choice_content_text_nv = get_tem_result($site, $la, "second_choice_content_text_nv", 'coms2', $coms_conect);
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_content_text_nv"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">

                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_content_text_nv col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_text_nv_subcat_val"
                                                                                                               name="second_choice_content_text_nv_subcat_val"
                                                                                                               value="<?= $second_choice_content_text_nv['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_text_nv_subcat_link"
                                                                                                               name="second_choice_content_text_nv_subcat_link"
                                                                                                               value="<?= $second_choice_content_text_nv['pic_adress'] ?>">

                                                                                                        <select id="second_choice_content_text_nv_cat"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control H_second_choice_content_text_nv_cat"
                                                                                                                name="second_choice_content_text_nv_cat">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_content_text_nv['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_text_nv"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_text_nv_content"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_text_nv&id=" + $("#second_choice_content_text_nv_cat").val() + "&value=" + $("#second_choice_content_text_nv_subcat_val").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_text_nv').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_content_text_nv_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_text_nv_content&id=" + $("#second_choice_content_text_nv_subcat_val").val() + "&value=" + $("#second_choice_content_text_nv_subcat_link").val() + "&secend_value=" + $("#second_choice_content_text_nv_subcat_link").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_text_nv_content').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>


                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_content_text_nv_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_content_text_nv').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_text_nv&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_content_text_nv<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_content_text_nv_neshane").change(function () {

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_text_nv&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_text_nv').html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_content_text_nv_neshane', function () {

                                                                                        //  $(".second_choice_content_text_nv_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_text_nv_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_text_nv_content').html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                </script>

                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_content_text_nv content_text_nv_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $third_choice_content_text_nv = get_tem_result($site, $la, "third_choice_content_text_nv", 'coms2', $coms_conect); ?>
                                                                                        <div id="div_mother_third_choice_content_text_nv"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">

                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_text_nv_title"
                                                                                                               value="<?= $third_choice_content_text_nv["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_content_text_nv_title">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_text_nv_link"
                                                                                                               value="<?= $third_choice_content_text_nv["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_content_text_nv_link">
                                                                                                    </div>

                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_text_nv_pic"
                                                                                                               value="<?=$third_choice_content_text_nv["pic_adress"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_content_text_nv_pic"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_text_nv_pic"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_content_text_nv"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_content_text_nv_avatar7"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_content_text_nv_avatar7_link"
                                                                                   name="third_choice_content_text_nv_avatar7_link"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_content_text_nv"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <div class="input-group"
                                                                                                         id="image_show_third_choice_content_text_nv">
                                                                                                        <a href="<?= $third_choice_content_text_nv["pic_adress"] ?>"
                                                                                                           class=" without-caption">
                                                                                                            <img width="33"
                                                                                                                 height="33"
                                                                                                                 class="H_cursor_zoom"
                                                                                                                 src="<?= $third_choice_content_text_nv["pic_adress"] ?>"
                                                                                                                 alt="<?= $third_choice_content_text_nv["text"] ?>">
                                                                                                        </a>

                                                                                                    </div>

                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_content_text_nv_avatar7').orakuploader({
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

                                                                                                            $('#third_choice_content_text_nv_avatar7').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>


                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_content_text_nv_text"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_content_text_nv_text"><?= $third_choice_content_text_nv["text"] ?>

                                                                                                                            </textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                $(function () {
                                                                    var val = $("[name='ValSelectActive_content_text_nv_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_content_text_nv"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_content_text_nv_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_content_text_nv').hide();
                                                                        $('.content_text_nv_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>

                                                </div>
                                                <!-------------------sidebar 2------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_text_sidebar2_show = get_tem_result($site, $la, "content_text_sidebar2_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_text_sidebar2_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_text_sidebar2_show_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12 input-group H_pl32">
                                                                <label class="col-md-2 control-label" for="family">عنوان </label>
                                                                <div class="col-md-10 input-group">
                                                                    <input type="text" class="form-control"  placeholder="عنوان " name="content_text_sidebar2_show_title"
                                                                           value="<?= $content_text_sidebar2_show['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div  class="tab-pane">
                                                            <div class="page-content_text-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $count_content_text_sidebar2_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_text_sidebar2_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_content_text_sidebar2_links; $k++) {
                                                                                $content_text_sidebar2_links = get_tem_result($site, $la, "content_text_sidebar2_links$k", 'coms2', $coms_conect);
                                                                                if ($content_text_sidebar2_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_content_text_sidebar2_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_content_text_sidebar2_links"
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
                                                                                                           id="content_text_sidebar2_links_title<?= $k ?>"
                                                                                                           value="<?= $content_text_sidebar2_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="content_text_sidebar2_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="content_text_sidebar2_links_link<?= $k ?>"
                                                                                                           value="<?= $content_text_sidebar2_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="content_text_sidebar2_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_content_text_sidebar2_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="content_text_sidebar2_links_count"
                                                                                   name="content_text_sidebar2_links_count"
                                                                                   value="<?= --$count_content_text_sidebar2_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_content_text_sidebar2_links').on("click", function () {
                                                                                        var someText = '<div id="ads_content_text_sidebar2_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_content_text_sidebar2_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="content_text_sidebar2_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="content_text_sidebar2_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="content_text_sidebar2_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="content_text_sidebar2_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_content_text_sidebar2_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#content_text_sidebar2_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_content_text_sidebar2_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#content_text_sidebar2_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_content_text_sidebar2_links' + id).remove();
                                                                                        $('#content_text_sidebar2_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_content_text_sidebar2_links"><i
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
                                                <!-------------------باکس زیر نظرات------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_text_UnderComment_show = get_tem_result($site, $la, "content_text_UnderComment_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_text_UnderComment_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_text_UnderComment_show_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12 input-group H_pl32">
                                                                <label class="col-md-2 control-label" for="family">عنوان </label>
                                                                <div class="col-md-10 input-group">
                                                                    <input type="text" class="form-control"  placeholder="عنوان " name="content_text_UnderComment_show_title"
                                                                           value="<?= $content_text_UnderComment_show['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش محتوای مرتبط </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_text_UnderComment_show['pic'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_text_UnderComment_show_pic"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش محتوای دستی </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_text_UnderComment_show['link'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_text_UnderComment_show_link"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <? $ValSelectActive_content_text_UnderComment = get_tem_result($site, $la, "ValSelectActive_content_text_UnderComment", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_content_text_UnderComment"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_content_text_UnderComment"
                                                                    name="select_type_content_text_UnderComment">

                                                                <option <? if ($ValSelectActive_content_text_UnderComment["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_text_UnderComment["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_text_UnderComment["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_content_text_UnderComment_title" type="hidden"
                                                                   value="<?= $ValSelectActive_content_text_UnderComment["title"] ?>">

                                                            <div class="tab-pane opt_content_text_UnderComment content_text_UnderComment_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_content_text_UnderComment = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_content_text_UnderComment%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_content_text_UnderComment; $j++) {
                                                                                    $first_choice_content_text_UnderComment = get_tem_result($site, $la, "first_choice_content_text_UnderComment$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_content_text_UnderComment['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_content_text_UnderComment<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_content_text_UnderComment"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_content_text_UnderComment col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_content_text_UnderComment_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_content_text_UnderComment_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_text_UnderComment['pic'] ?>">

                                                                                                        <select id="first_choice_content_text_UnderComment_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_content_text_UnderComment_cat"
                                                                                                                name="first_choice_content_text_UnderComment_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_content_text_UnderComment['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_content_text_UnderComment<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_content_text_UnderComment_new&id=" + $("#first_choice_content_text_UnderComment_cat<?=$j?>").val() + "&value=" + $("#first_choice_content_text_UnderComment_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_content_text_UnderComment<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_content_text_UnderComment_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_content_text_UnderComment_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_text_UnderComment['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_text_UnderComment['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_text_UnderComment['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_content_text_UnderComment_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_text_UnderComment["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_content_text_UnderComment_number<?= $j ?>">
                                                                                                    </div>


                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $jcount = $j;
                                                                                ?>
                                                                                <input type="hidden"
                                                                                       id="first_choice_content_text_UnderComment_count"
                                                                                       name="first_choice_content_text_UnderComment_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_content_text_UnderComment_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_content_text_UnderComment').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_content_text_UnderComment_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_content_text_UnderComment<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_content_text_UnderComment').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_content_text_UnderComment' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_content_text_UnderComment" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_content_text_UnderComment col-md-4 input-group"><input type="hidden" id="first_choice_content_text_UnderComment_subcat_val' + i + '"  name="first_choice_content_text_UnderComment_subcat_val' + i + '" value=""> <select id="first_choice_content_text_UnderComment_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_content_text_UnderComment_cat" name="first_choice_content_text_UnderComment_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_content_text_UnderComment' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_content_text_UnderComment_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_content_text_UnderComment_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_content_text_UnderComment_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_content_text_UnderComment_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_content_text_UnderComment' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_content_text_UnderComment_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_content_text_UnderComment', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_content_text_UnderComment_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_content_text_UnderComment' + id).remove();
                                                                                            $('#first_choice_content_text_UnderComment_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_content_text_UnderComment"><i
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

                                                            <div class="tab-pane opt_content_text_UnderComment content_text_UnderComment_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_content_text_UnderComment = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_content_text_UnderComment%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_content_text_UnderComment; $j++) {
                                                                                    $second_choice_content_text_UnderComment = get_tem_result($site, $la, "second_choice_content_text_UnderComment$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_content_text_UnderComment['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_content_text_UnderComment<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_content_text_UnderComment"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_content_text_UnderComment col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_text_UnderComment_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_content_text_UnderComment_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_text_UnderComment['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_text_UnderComment_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_content_text_UnderComment_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_text_UnderComment['pic_adress'] ?>">

                                                                                                        <select id="second_choice_content_text_UnderComment_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_content_text_UnderComment_cat"
                                                                                                                name="second_choice_content_text_UnderComment_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_content_text_UnderComment['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_text_UnderComment<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_text_UnderComment_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_text_UnderComment&id=" + $("#second_choice_content_text_UnderComment_cat<?=$j?>").val() + "&value=" + $("#second_choice_content_text_UnderComment_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_text_UnderComment<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_content_text_UnderComment_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_text_UnderComment_content&id=" + $("#second_choice_content_text_UnderComment_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_content_text_UnderComment_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_content_text_UnderComment_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_text_UnderComment_content<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $jcount = $j;
                                                                                ?>
                                                                                <input type="hidden"
                                                                                       id="second_choice_content_text_UnderComment_count"
                                                                                       name="second_choice_content_text_UnderComment_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_content_text_UnderComment_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_content_text_UnderComment').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_text_UnderComment&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_content_text_UnderComment<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_content_text_UnderComment_neshane").change(function () {
                                                                                        var j = $("#second_choice_content_text_UnderComment_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_text_UnderComment&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_text_UnderComment' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_content_text_UnderComment_neshane', function () {
                                                                                        var j = $("#second_choice_content_text_UnderComment_count").val();
                                                                                        //  $(".second_choice_content_text_UnderComment_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_text_UnderComment_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_text_UnderComment_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_content_text_UnderComment').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_content_text_UnderComment' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_content_text_UnderComment" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_content_text_UnderComment col-md-3 input-group"><input type="hidden" id="second_choice_content_text_UnderComment_subcat_val' + i + '"  name="second_choice_content_text_UnderComment_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_content_text_UnderComment_subcat_link' + i + '"  name="second_choice_content_text_UnderComment_subcat_link' + i + '" value=""> <select id="second_choice_content_text_UnderComment_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_content_text_UnderComment_cat" name="second_choice_content_text_UnderComment_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_content_text_UnderComment' + i + '" class="col-md-3 input-group"></div><div id="second_choice_content_text_UnderComment_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_content_text_UnderComment' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_content_text_UnderComment_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_content_text_UnderComment', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_content_text_UnderComment_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_content_text_UnderComment' + id).remove();
                                                                                            $('#second_choice_content_text_UnderComment_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_content_text_UnderComment"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_content_text_UnderComment content_text_UnderComment_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_content_text_UnderComment = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_content_text_UnderComment%' ", $coms_conect);
                                                                                for ($x = 1; $x <= $count_third_choice_content_text_UnderComment; $x++) {
                                                                                    $third_choice_content_text_UnderComment = get_tem_result($site, $la, "third_choice_content_text_UnderComment$x", 'coms2', $coms_conect);
                                                                                    if ($third_choice_content_text_UnderComment['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_content_text_UnderComment<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_content_text_UnderComment"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_text_UnderComment_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_text_UnderComment["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_content_text_UnderComment_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_text_UnderComment_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_text_UnderComment["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_content_text_UnderComment_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_text_UnderComment_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_content_text_UnderComment["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_content_text_UnderComment_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_text_UnderComment_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_content_text_UnderComment<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_content_text_UnderComment_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_content_text_UnderComment_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_content_text_UnderComment_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_content_text_UnderComment<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>

                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_content_text_UnderComment<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_content_text_UnderComment["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_content_text_UnderComment["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_content_text_UnderComment["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>

                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_content_text_UnderComment_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_content_text_UnderComment_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_content_text_UnderComment_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_content_text_UnderComment_text<?= $x ?>"><?= $third_choice_content_text_UnderComment["text"] ?>

                                                                                                                            </textarea>
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $xcount_mahsol = $x;
                                                                                ?>
                                                                                <input type="hidden"
                                                                                       id="third_choice_content_text_UnderComment_count"
                                                                                       name="third_choice_content_text_UnderComment_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_content_text_UnderComment-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_content_text_UnderComment' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_content_text_UnderComment" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_content_text_UnderComment_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_content_text_UnderComment_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_content_text_UnderComment_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_content_text_UnderComment_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_content_text_UnderComment_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_content_text_UnderComment_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_text_UnderComment_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_content_text_UnderComment' + i + '" style="padding: 0px;"><div  id="third_choice_content_text_UnderComment_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_content_text_UnderComment_avatar7_link' + i + '" name="third_choice_content_text_UnderComment_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_content_text_UnderComment' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_content_text_UnderComment_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_content_text_UnderComment_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_content_text_UnderComment' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_content_text_UnderComment_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_content_text_UnderComment_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_content_text_UnderComment_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_content_text_UnderComment' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_content_text_UnderComment' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_content_text_UnderComment', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_content_text_UnderComment_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_content_text_UnderComment' + id).remove();
                                                                                            $('#third_choice_content_text_UnderComment_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_content_text_UnderComment-ads"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                $(function () {
                                                                    var val = $("[name='ValSelectActive_content_text_UnderComment_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_content_text_UnderComment"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_content_text_UnderComment_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_content_text_UnderComment').hide();
                                                                        $('.content_text_UnderComment_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------degarKhadamat------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_text_degarKhadamat = get_tem_result($site, $la, "content_text_degarKhadamat", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_text_degarKhadamat['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_text_degarKhadamat_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_text_degarKhadamat_title"
                                                                           value="<?= $content_text_degarKhadamat['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_text_degarKhadamat_text"
                                                                           value="<?= $content_text_degarKhadamat['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:7 »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_content_text_degarKhadamat_content_text = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_text_degarKhadamat_content_text%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_content_text_degarKhadamat_content_text; $x++) {
                                                                            $content_text_degarKhadamat_content_text = get_tem_result($site, $la, "content_text_degarKhadamat_content_text$x", 'coms2', $coms_conect);
                                                                            if ($content_text_degarKhadamat_content_text['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_content_text_degarKhadamat_content_text<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_content_text_degarKhadamat_content_text"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="content_text_degarKhadamat_content_text_title<?= $x ?>"
                                                                                                       value="<?= $content_text_degarKhadamat_content_text["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="content_text_degarKhadamat_content_text_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="content_text_degarKhadamat_content_text_link<?= $x ?>"
                                                                                                       value="<?= $content_text_degarKhadamat_content_text["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="content_text_degarKhadamat_content_text_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="content_text_degarKhadamat_content_text_pic<?= $x ?>"
                                                                                                       value="<?=$content_text_degarKhadamat_content_text["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="content_text_degarKhadamat_content_text_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=content_text_degarKhadamat_content_text_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_content_text_degarKhadamat_content_text<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="content_text_degarKhadamat_content_text_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="content_text_degarKhadamat_content_text_avatar7_link<?= $x ?>"
                                                                                   name="content_text_degarKhadamat_content_text_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_content_text_degarKhadamat_content_text<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group"
                                                                                                 id="image_show_content_text_degarKhadamat_content_text<?= $x ?>">
                                                                                                <a href="<?= $content_text_degarKhadamat_content_text["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $content_text_degarKhadamat_content_text["pic_adress"] ?>"
                                                                                                         alt="<?= $content_text_degarKhadamat_content_text["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#content_text_degarKhadamat_content_text_avatar7<?=$x?>').orakuploader({
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
                                                                                                        orakuploader_maximum_uploads: 1,
                                                                                                    });

                                                                                                    $('#content_text_degarKhadamat_content_text_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                <textarea type="text"
                                                                          id="content_text_degarKhadamat_content_text_text<?= $x ?>"
                                                                          class="form-control"
                                                                          placeholder="عنوان دوم"
                                                                          name="content_text_degarKhadamat_content_text_text<?= $x ?>"><?= $content_text_degarKhadamat_content_text["text"] ?>

                                                                </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="content_text_degarKhadamat_content_text_count"
                                                                               name="content_text_degarKhadamat_content_text_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_content_text_degarKhadamat_content_text-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_content_text_degarKhadamat_content_text' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_content_text_degarKhadamat_content_text" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="content_text_degarKhadamat_content_text_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="content_text_degarKhadamat_content_text_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="content_text_degarKhadamat_content_text_link' + i + '" value="" class="form-control" placeholder="لینک" name="content_text_degarKhadamat_content_text_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="content_text_degarKhadamat_content_text_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="content_text_degarKhadamat_content_text_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=content_text_degarKhadamat_content_text_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_content_text_degarKhadamat_content_text' + i + '" style="padding: 0px;"><div  id="content_text_degarKhadamat_content_text_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="content_text_degarKhadamat_content_text_avatar7_link' + i + '" name="content_text_degarKhadamat_content_text_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_content_text_degarKhadamat_content_text' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="content_text_degarKhadamat_content_text_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="content_text_degarKhadamat_content_text_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_content_text_degarKhadamat_content_text' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#content_text_degarKhadamat_content_text_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#content_text_degarKhadamat_content_text_avatar7' + i + '').orakuploader({
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

                                                                                    $('#content_text_degarKhadamat_content_text_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_content_text_degarKhadamat_content_text' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_content_text_degarKhadamat_content_text' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_content_text_degarKhadamat_content_text', function () {
                                                                                    var id = '';
                                                                                    var k = $('#content_text_degarKhadamat_content_text_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_content_text_degarKhadamat_content_text' + id).remove();
                                                                                    $('#content_text_degarKhadamat_content_text_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_content_text_degarKhadamat_content_text-ads"><i
                                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                    class="fa fa-plus"></i>افزودن
                                                                            لینک</a>
                                                                        </br>
                                                                    </div>
                                                                </fieldset>
                                                            </div>


                                                        </div>

                                                    </center>
                                                </div>



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


        //----------content---------------------
        $(".H_rename_content_box1").click(function () {
            $(this).hide();
            $('.H_rename_content_box1_save').show();
            $(".H_input_rename_content_box1").toggle(300);
        });
        $(".H_rename_content_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'content_box1' + "&value=" + $(".H_input_rename_content_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_box1 > span.temp").text($(".H_input_rename_content_box1").val());
            $(this).hide();
            $('.H_rename_content_box1').show();
            $(".H_input_rename_content_box1").hide();
            $(".H_rename_content_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_content_box2").click(function () {
            $(this).hide();
            $('.H_rename_content_box2_save').show();
            $(".H_input_rename_content_box2").toggle(300);
        });
        $(".H_rename_content_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'content_box2' + "&value=" + $(".H_input_rename_content_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_box2 > span.temp").text($(".H_input_rename_content_box2").val());
            $(this).hide();
            $('.H_rename_content_box2').show();
            $(".H_input_rename_content_box2").hide();
            $(".H_rename_content_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_content_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_content_title_box3_save').show();
            $(".H_input_rename_content_title_box3").toggle(300);
        });
        $(".H_rename_content_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'content_title_box3' + "&value=" + $(".H_input_rename_content_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_title_box3 > span.temp").text($(".H_input_rename_content_title_box3").val());
            $(this).hide();
            $('.H_rename_content_title_box3').show();
            $(".H_input_rename_content_title_box3").hide();
            $(".H_rename_content_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_content_title_box4").click(function () {
            $(this).hide();
            $('.H_rename_content_title_box4_save').show();
            $(".H_input_rename_content_title_box4").toggle(300);
        });
        $(".H_rename_content_title_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'content_title_box4' + "&value=" + $(".H_input_rename_content_title_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_title_box4 > span.temp").text($(".H_input_rename_content_title_box4").val());
            $(this).hide();
            $('.H_rename_content_title_box4').show();
            $(".H_input_rename_content_title_box4").hide();
            $(".H_rename_content_title_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_content_title_box5").click(function () {
            $(this).hide();
            $('.H_rename_content_title_box5_save').show();
            $(".H_input_rename_content_title_box5").toggle(300);
        });
        $(".H_rename_content_title_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'content_title_box5' + "&value=" + $(".H_input_rename_content_title_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_title_box5 > span.temp").text($(".H_input_rename_content_title_box5").val());
            $(this).hide();
            $('.H_rename_content_title_box5').show();
            $(".H_input_rename_content_title_box5").hide();
            $(".H_rename_content_title_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------


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
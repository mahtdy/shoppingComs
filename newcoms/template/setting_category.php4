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

    insert_templdate($site, '', $la, $number_tab, $temp_tab, '', $num_con_tab, "temp_tab", 'Medirence2', $coms_conect);



    ########################################################### category ########################################################

    $category_boxOne_pic_adress = 0;
    $category_boxOne_pic_adress= injection_replace($_POST["category_boxOne_pic_adress"]);
    $category_boxOne_title= injection_replace($_POST["category_boxOne_title"]);
    insert_templdate($site, $category_boxOne_pic_adress, $la, '', $category_boxOne_title, '', '', "category_boxOne", 'Medirence2', $coms_conect);

    //slide

    $condition_category_slide_boxOne = "name like 'category_slide_boxOne%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_category_slide_boxOne, $coms_conect);

    $condition_category_slide_TitLin_boxOne = "name like 'category_slide_TitLin_boxOne%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_category_slide_TitLin_boxOne, $coms_conect);

    $category_slide_boxOne_count = injection_replace_pic($_POST["category_slide_boxOne_count"]);
    for ($x = 1; $x <= $category_slide_boxOne_count; $x++) {

        $category_slide_TitLin_boxOne_title = injection_replace_pic($_POST["category_slide_TitLin_boxOne_title{$x}"]);
        $category_slide_TitLin_boxOne_link = injection_replace_pic($_POST["category_slide_TitLin_boxOne_link{$x}"]);

        $category_slide_boxOne_text = injection_replace_pic($_POST["category_slide_boxOne_text{$x}"]);
        $category_slide_boxOne_title = injection_replace_pic($_POST["category_slide_boxOne_title{$x}"]);
        $category_slide_boxOne_link = injection_replace_pic($_POST["category_slide_boxOne_link{$x}"]);
        $category_slide_boxOne_pic = injection_replace_pic($_POST["category_slide_boxOne_pic{$x}"]);
        $category_slide_boxOne_pic_adress = injection_replace_pic($_POST["category_slide_boxOne_pic_adress{$x}"]);
        $category_slide_boxOne_pic_adress_avatar7 = injection_replace($_POST["category_slide_boxOne_pic_adress_avatar7{$x}"][0]);
        if ($category_slide_boxOne_pic_adress_avatar7 > "") {
            $category_slide_boxOne_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $category_slide_boxOne_pic_adress_avatar7;
        }

            insert_templdate($site, $category_slide_boxOne_pic_adress, $la, $category_slide_boxOne_text, $category_slide_boxOne_title, $category_slide_boxOne_link, $category_slide_boxOne_pic, "category_slide_boxOne$x", 'Medirence2', $coms_conect);
            insert_templdate($site, '', $la, '', $category_slide_TitLin_boxOne_title, $category_slide_TitLin_boxOne_link, '', "category_slide_TitLin_boxOne$x", 'Medirence2', $coms_conect);

    }

// category con_center
    $category_con_center_pic_adress = 0;
    $category_con_center_pic_adress= injection_replace($_POST["category_con_center_pic_adress"]);
    insert_templdate($site, $category_con_center_pic_adress, $la, '', '', '', '', "category_con_center", 'Medirence2', $coms_conect);

    $ValSelectActive_category_con_center_title = injection_replace($_POST["ValSelectActive_category_con_center_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_category_con_center_title, '', '', "ValSelectActive_category_con_center", 'Medirence2', $coms_conect);

    $condition_first_choice_category_con_center = "name like 'first_choice_category_con_center%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_category_con_center, $coms_conect);

        $first_choice_category_con_center_cat = injection_replace_pic($_POST["first_choice_category_con_center_cat"]);
        $first_choice_category_con_center_subcat_cat = injection_replace_pic($_POST["first_choice_category_con_center_subcat_cat"]);
        $first_choice_category_con_center_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_category_con_center_Fixed_selection_cat"]);
        if ($first_choice_category_con_center_subcat_cat > "")
            insert_templdate($site, '', $la, $first_choice_category_con_center_Fixed_selection_cat, '', $first_choice_category_con_center_cat, $first_choice_category_con_center_subcat_cat, "first_choice_category_con_center", 'Medirence2', $coms_conect);


    $condition_second_choice_category_con_center = "name like 'second_choice_category_con_center%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_category_con_center, $coms_conect);

        $second_choice_category_con_center_cat = injection_replace_pic($_POST["second_choice_category_con_center_cat"]);
        $second_choice_category_con_center_subcat_cat = injection_replace_pic($_POST["second_choice_category_con_center_subcat_cat"]);
        $second_choice_category_con_center_subcat_cat_content = injection_replace_pic($_POST["second_choice_category_con_center_subcat_cat_content"]);
        if ($second_choice_category_con_center_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_category_con_center_subcat_cat_content, $la, '', '', $second_choice_category_con_center_cat, $second_choice_category_con_center_subcat_cat, "second_choice_category_con_center", 'Medirence2', $coms_conect);


    $condition_third_choice_category_con_center = "name like 'third_choice_category_con_center%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_category_con_center, $coms_conect);

        $third_choice_category_con_center_title = injection_replace_pic($_POST["third_choice_category_con_center_title"]);
        $third_choice_category_con_center_text = injection_replace_pic($_POST["third_choice_category_con_center_text"]);

        $third_choice_category_con_center_link = injection_replace_pic($_POST["third_choice_category_con_center_link"]);
        $third_choice_category_con_center_pic = injection_replace_pic($_POST["third_choice_category_con_center_pic"]);
        $third_choice_category_con_center_pic = resize_image_M($third_choice_category_con_center_pic,263,260,$img_page_main,'');
        $third_choice_category_con_center_avatar7 = injection_replace($_POST["third_choice_category_con_center_avatar7"][0]);
        if ($third_choice_category_con_center_avatar7 > "") {
            $third_choice_category_con_center_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_category_con_center_avatar7;
            $third_choice_category_con_center_pic = resize_image_M($third_choice_category_con_center_pic,263,260,$img_page_main,'');
        }
        if ($third_choice_category_con_center_title > "") {
            insert_templdate($site, '', $la, $third_choice_category_con_center_text, $third_choice_category_con_center_title, $third_choice_category_con_center_link, $third_choice_category_con_center_pic, "third_choice_category_con_center", 'Medirence2', $coms_conect);
        }

    //   Light box
    $category_title_LightBox_pic_adress = 0;
    $category_title_LightBox_pic_adress= injection_replace($_POST["category_title_LightBox_pic_adress"]);
    $category_title_LightBox_title= injection_replace($_POST["category_title_LightBox_title"]);
    insert_templdate($site, $category_title_LightBox_pic_adress, $la, '', $category_title_LightBox_title, '', '', "category_title_LightBox", 'Medirence2', $coms_conect);

    $ValSelectActive_category_LightBox_title = injection_replace($_POST["ValSelectActive_category_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_category_LightBox_title, '', '', "ValSelectActive_category_LightBox", 'Medirence2', $coms_conect);

    $condition_first_choice_category_LightBox = "name like 'first_choice_category_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_category_LightBox, $coms_conect);
    $first_choice_category_LightBox_count = injection_replace_pic($_POST["first_choice_category_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_category_LightBox_count; $i++) {

        $first_choice_category_LightBox_cat = injection_replace_pic($_POST["first_choice_category_LightBox_cat{$i}"]);
        $first_choice_category_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_category_LightBox_subcat_cat{$i}"]);
        $first_choice_category_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_category_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_category_LightBox_number = injection_replace_pic($_POST["first_choice_category_LightBox_number{$i}"]);
        if ($first_choice_category_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_category_LightBox_number, $la, $first_choice_category_LightBox_Fixed_selection_cat, '', $first_choice_category_LightBox_cat, $first_choice_category_LightBox_subcat_cat, "first_choice_category_LightBox$i", 'Medirence2', $coms_conect);
    }

    $condition_second_choice_category_LightBox = "name like 'second_choice_category_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_category_LightBox, $coms_conect);
    $second_choice_category_LightBox_count = injection_replace_pic($_POST["second_choice_category_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_category_LightBox_count; $i++) {

        $second_choice_category_LightBox_cat = injection_replace_pic($_POST["second_choice_category_LightBox_cat{$i}"]);
        $second_choice_category_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_category_LightBox_subcat_cat{$i}"]);
        $second_choice_category_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_category_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_category_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_category_LightBox_subcat_cat_content, $la, '', '', $second_choice_category_LightBox_cat, $second_choice_category_LightBox_subcat_cat, "second_choice_category_LightBox$i", 'Medirence2', $coms_conect);
    }

    $condition_third_choice_category_LightBox = "name like 'third_choice_category_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_category_LightBox, $coms_conect);
    $third_choice_category_LightBox_count = injection_replace_pic($_POST["third_choice_category_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_category_LightBox_count; $x++) {

        $third_choice_category_LightBox_title = injection_replace_pic($_POST["third_choice_category_LightBox_title{$x}"]);
        $third_choice_category_LightBox_text = injection_replace_pic($_POST["third_choice_category_LightBox_text{$x}"]);
        $third_choice_category_LightBox_link = injection_replace_pic($_POST["third_choice_category_LightBox_link{$x}"]);
        $third_choice_category_LightBox_pic = injection_replace_pic($_POST["third_choice_category_LightBox_pic{$x}"]);
        $third_choice_category_LightBox_pic = resize_image_M($third_choice_category_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_category_LightBox_avatar7 = injection_replace($_POST["third_choice_category_LightBox_avatar7{$x}"][0]);
        if ($third_choice_category_LightBox_avatar7 > "") {
            $third_choice_category_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_category_LightBox_avatar7;
            $third_choice_category_LightBox_pic = resize_image_M($third_choice_category_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_category_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_category_LightBox_text, $third_choice_category_LightBox_title, $third_choice_category_LightBox_link, $third_choice_category_LightBox_pic, "third_choice_category_LightBox$x", 'Medirence2', $coms_conect);
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
                                <? $temp_tab = get_tem_result($site, $la, "temp_tab", 'Medirence2', $coms_conect); ?>
                                <input type="hidden" name="temp_tab" value="<?= $temp_tab['title'] ?>">
                                <input type="hidden" name="number_tab" value="<?= $temp_tab['text'] ?>">
                                <input type="hidden" name="num_con_tab" value="<?= $temp_tab['pic'] ?>">

                                <ul class="z-tabs-nav z-tabs-desktop H_float_r">

                                    <li class="z-tab H_style_header z-active" data-link="tab1">
                                        <a class="z-link">category</a>
                                    </li>


                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------category---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $category_box1 = get_tem_result($site, $la, "category_box1", 'Medirence2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_category_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $category_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_category_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_category_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_category_box1 H_dis_none"
                                                               name="category_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $category_box2 = get_tem_result($site, $la, "category_box2", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_category_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $category_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_category_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_category_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_category_box2 H_dis_none"
                                                               name="category_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $category_title_box3 = get_tem_result($site, $la, "category_title_box3", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_category_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $category_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_category_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_category_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_category_title_box3 H_dis_none"
                                                               name="category_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>



                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $category_boxOne = get_tem_result($site, $la, "category_boxOne", 'Medirence2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($category_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="category_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ارتفاع اسلاید شو </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="category_boxOne_title"
                                                                           value="<?= $category_boxOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اسلایدشو »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_category_slide_boxOne = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'category_slide_boxOne%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_category_slide_boxOne; $x++) {
                                                                            $category_slide_boxOne = get_tem_result($site, $la, "category_slide_boxOne$x", 'Medirence2', $coms_conect);
                                                                            $category_slide_TitLin_boxOne = get_tem_result($site, $la, "category_slide_TitLin_boxOne$x", 'Medirence2', $coms_conect);
                                                                            ?>
                                                                                <div id="div_mother_third_choice_category_slide_boxOne<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_category_slide_boxOne" style="margin-bottom: 90px!important;"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>
                                                                                        <div class="form-group col-md-11">
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="category_slide_TitLin_boxOne_title<?= $x ?>"
                                                                                                       value="<?= $category_slide_TitLin_boxOne["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="category_slide_TitLin_boxOne_title<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="category_slide_TitLin_boxOne_link<?= $x ?>"
                                                                                                       value="<?= $category_slide_TitLin_boxOne["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک اول"
                                                                                                       name="category_slide_TitLin_boxOne_link<?= $x ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-11">
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="category_slide_boxOne_title<?= $x ?>"
                                                                                                       value="<?= $category_slide_boxOne["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان دوم"
                                                                                                       name="category_slide_boxOne_title<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="category_slide_boxOne_link<?= $x ?>"
                                                                                                       value="<?= $category_slide_boxOne["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک دوم"
                                                                                                       name="category_slide_boxOne_link<?= $x ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-11">
                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="category_slide_boxOne_pic<?= $x ?>"
                                                                                                       value="<?= $category_slide_boxOne["pic"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک تصویر"
                                                                                                       name="category_slide_boxOne_pic<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="category_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                       value="<?=$category_slide_boxOne["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="category_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=category_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_category_slide_boxOne<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="category_slide_boxOne_pic_adress_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="category_slide_boxOne_pic_adress_avatar7_link<?= $x ?>"
                                                                                   name="category_slide_boxOne_pic_adress_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_category_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group"
                                                                                                 id="image_show_category_slide_boxOne<?= $x ?>">
                                                                                                <a href="<?= $category_slide_boxOne["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $category_slide_boxOne["pic_adress"] ?>"
                                                                                                         alt="<?= $category_slide_boxOne["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#category_slide_boxOne_pic_adress_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#category_slide_boxOne_pic_adress_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="category_slide_boxOne_count"
                                                                               name="category_slide_boxOne_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_category_slide_boxOne-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_category_slide_boxOne' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_category_slide_boxOne" style="margin-bottom: 90px!important;" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="category_slide_TitLin_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="category_slide_TitLin_boxOne_title' + i + '" ></div> <div class="col-md-6 input-group"><input type="text" id="category_slide_TitLin_boxOne_link' + i + '" value="" class="form-control" placeholder="لینک اول" name="category_slide_TitLin_boxOne_link' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="category_slide_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان دوم" name="category_slide_boxOne_title' + i + '" ></div> <div class="col-md-6 input-group"><input type="text" id="category_slide_boxOne_link' + i + '" value="" class="form-control" placeholder="لینک دوم" name="category_slide_boxOne_link' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-5 input-group"><input type="text" id="category_slide_boxOne_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="category_slide_boxOne_pic' + i + '" ></div><div class="col-md-6 input-group"> <input type="text" id="category_slide_boxOne_pic_adress' + i + '" value="" class="form-control" placeholder=" تصویر" name="category_slide_boxOne_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=category_slide_boxOne_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_category_slide_boxOne' + i + '" style="padding: 0px;"><div  id="category_slide_boxOne_pic_adress_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="category_slide_boxOne_pic_adress_avatar7_link' + i + '" name="category_slide_boxOne_pic_adress_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_category_slide_boxOne_pic_adress' + i + '" style="float:right;"></div></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_category_slide_boxOne' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#category_slide_boxOne_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#category_slide_boxOne_pic_adress_avatar7' + i + '').orakuploader({
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

                                                                                    $('#category_slide_boxOne_pic_adress_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_category_slide_boxOne' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_category_slide_boxOne' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_category_slide_boxOne', function () {
                                                                                    var id = '';
                                                                                    var k = $('#category_slide_boxOne_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_category_slide_boxOne' + id).remove();
                                                                                    $('#category_slide_boxOne_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_category_slide_boxOne-ads"><i
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
                                                <!-------------------content center box------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $category_con_center = get_tem_result($site, $la, "category_con_center", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($category_con_center['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="category_con_center_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       

                                                        <hr>
                                                        <? $ValSelectActive_category_con_center = get_tem_result($site, $la, "ValSelectActive_category_con_center", 'Medirence2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_category_con_center"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_category_con_center"
                                                                    name="select_type_category_con_center">

                                                                <option <? if ($ValSelectActive_category_con_center["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_category_con_center["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_category_con_center["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_category_con_center_title" type="hidden"
                                                                   value="<?= $ValSelectActive_category_con_center["title"] ?>">

                                                            <div class="tab-pane opt_category_con_center category_con_center_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $first_choice_category_con_center = get_tem_result($site, $la, "first_choice_category_con_center", 'Medirence2', $coms_conect); ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_category_con_center"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">

                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_category_con_center col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_category_con_center_subcat_val"
                                                                                                               name="first_choice_category_con_center_subcat_val"
                                                                                                               value="<?= $first_choice_category_con_center['pic'] ?>">

                                                                                                        <select id="first_choice_category_con_center_cat"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control H_first_choice_category_con_center_cat"
                                                                                                                name="first_choice_category_con_center_cat">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_category_con_center['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_category_con_center"
                                                                                                         class="col-md-4 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_category_con_center_new&id=" + $("#first_choice_category_con_center_cat").val() + "&value=" + $("#first_choice_category_con_center_subcat_val").val() + "&field_nmae=" + '<?=$la?>' ,
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_category_con_center').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_category_con_center_Fixed_selection_cat"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_category_con_center_Fixed_selection_cat">
                                                                                                            <option <?
                                                                                                            if ($first_choice_category_con_center['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_category_con_center['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_category_con_center['text'] == 2) echo 'selected'; ?>
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

                                                                                    $(document).on('change', '.H_first_choice_category_con_center_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_category_con_center').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_category_con_center_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_category_con_center<?//=$j?>//').html(result);
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

                                                            <div class="tab-pane opt_category_con_center category_con_center_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?  $second_choice_category_con_center = get_tem_result($site, $la, "second_choice_category_con_center", 'Medirence2', $coms_conect); ?>
                                                                                        <div id="div_mother_second_choicedel_second_choice_category_con_center"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">

                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_category_con_center col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_category_con_center_subcat_val"
                                                                                                               name="second_choice_category_con_center_subcat_val"
                                                                                                               value="<?= $second_choice_category_con_center['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_category_con_center_subcat_link"
                                                                                                               name="second_choice_category_con_center_subcat_link"
                                                                                                               value="<?= $second_choice_category_con_center['pic_adress'] ?>">

                                                                                                        <select id="second_choice_category_con_center_cat"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control H_second_choice_category_con_center_cat"
                                                                                                                name="second_choice_category_con_center_cat">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_category_con_center['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_category_con_center"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_category_con_center_content"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_category_con_center&id=" + $("#second_choice_category_con_center_cat").val() + "&value=" + $("#second_choice_category_con_center_subcat_val").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_category_con_center').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_category_con_center_subcat_link").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_category_con_center_content&id=" + $("#second_choice_category_con_center_subcat_val").val() + "&value=" + $("#second_choice_category_con_center_subcat_link").val() + "&secend_value=" + $("#second_choice_category_con_center_subcat_link").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_category_con_center_content').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_category_con_center_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_category_con_center').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_category_con_center&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_category_con_center<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_category_con_center_neshane").change(function () {

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_category_con_center&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                            success: function (result) {
                                                                                                $('#second_choice_category_con_center').html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_category_con_center_neshane', function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_category_con_center_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                            success: function (result) {
                                                                                                $('#second_choice_category_con_center_content' ).html(result);
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

                                                            <div class="opt_category_con_center category_con_center_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $third_choice_category_con_center = get_tem_result($site, $la, "third_choice_category_con_center", 'Medirence2', $coms_conect);?>
                                                                                        <div id="div_mother_third_choice_category_con_center"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_category_con_center"
                                                                                                   id="1"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_category_con_center_title"
                                                                                                               value="<?= $third_choice_category_con_center["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_category_con_center_title">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_category_con_center_link"
                                                                                                               value="<?= $third_choice_category_con_center["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_category_con_center_link">
                                                                                                    </div>

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_category_con_center_pic"
                                                                                                               value="<?=$third_choice_category_con_center["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_category_con_center_pic"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_category_con_center_pic"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_category_con_center"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_category_con_center_avatar7"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_category_con_center_avatar7_link"
                                                                                   name="third_choice_category_con_center_avatar7_link"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_category_con_center"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_category_con_center["pic"]!=""){?>
                                                                                                        <div class="input-group"
                                                                                                             id="image_show_third_choice_category_con_center">
                                                                                                            <a href="<?= $third_choice_category_con_center["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_category_con_center["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_category_con_center["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_category_con_center_avatar7').orakuploader({
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

                                                                                                            $('#third_choice_category_con_center_avatar7').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_category_con_center_text"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_category_con_center_text"><?= $third_choice_category_con_center["text"] ?>

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
                                                                    var val = $("[name='ValSelectActive_category_con_center_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_category_con_center"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_category_con_center_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_category_con_center').hide();
                                                                        $('.category_con_center_option' + val).show();

                                                                    }
                                                                });
                                                            </script>
                                                        </div>
                                                    </center>
                                                </div>
                                                
                                                <!-------------------light box------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $category_title_LightBox = get_tem_result($site, $la, "category_title_LightBox", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($category_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="category_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="category_title_LightBox_title"
                                                                           value="<?= $category_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_category_LightBox = get_tem_result($site, $la, "ValSelectActive_category_LightBox", 'Medirence2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_category_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_category_LightBox"
                                                                    name="select_type_category_LightBox">

                                                                <option <? if ($ValSelectActive_category_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_category_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_category_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_category_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_category_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_category_LightBox category_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_category_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'first_choice_category_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_category_LightBox; $j++) {
                                                                                    $first_choice_category_LightBox = get_tem_result($site, $la, "first_choice_category_LightBox$j", 'Medirence2', $coms_conect);
                                                                                    if ($first_choice_category_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_category_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_category_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_category_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_category_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_category_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_category_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_category_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_category_LightBox_cat"
                                                                                                                name="first_choice_category_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_category_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_category_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_category_LightBox_new&id=" + $("#first_choice_category_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_category_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_category_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_category_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_category_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_category_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_category_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_category_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_category_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_category_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_category_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_category_LightBox_count"
                                                                                       name="first_choice_category_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_category_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_category_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_category_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_category_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_category_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_category_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_category_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_category_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_category_LightBox_subcat_val' + i + '"  name="first_choice_category_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_category_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_category_LightBox_cat" name="first_choice_category_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_category_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_category_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_category_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_category_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_category_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_category_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_category_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_category_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_category_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_category_LightBox' + id).remove();
                                                                                            $('#first_choice_category_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_category_LightBox"><i
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

                                                            <div class="tab-pane opt_category_LightBox category_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_category_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'second_choice_category_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_category_LightBox; $j++) {
                                                                                    $second_choice_category_LightBox = get_tem_result($site, $la, "second_choice_category_LightBox$j", 'Medirence2', $coms_conect);
                                                                                    if ($second_choice_category_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_category_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_category_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_category_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_category_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_category_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_category_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_category_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_category_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_category_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_category_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_category_LightBox_cat"
                                                                                                                name="second_choice_category_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_category_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_category_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_category_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_category_LightBox&id=" + $("#second_choice_category_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_category_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_category_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_category_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_category_LightBox_content&id=" + $("#second_choice_category_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_category_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_category_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_category_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_category_LightBox_count"
                                                                                       name="second_choice_category_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_category_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_category_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_category_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_category_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_category_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_category_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_category_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_category_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_category_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_category_LightBox_count").val();
                                                                                        //  $(".second_choice_category_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_category_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_category_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_category_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_category_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_category_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_category_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_category_LightBox_subcat_val' + i + '"  name="second_choice_category_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_category_LightBox_subcat_link' + i + '"  name="second_choice_category_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_category_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_category_LightBox_cat" name="second_choice_category_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_category_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_category_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_category_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_category_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_category_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_category_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_category_LightBox' + id).remove();
                                                                                            $('#second_choice_category_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_category_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_category_LightBox category_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_category_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'third_choice_category_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_category_LightBox; $x++) {
                                                                                    $third_choice_category_LightBox = get_tem_result($site, $la, "third_choice_category_LightBox$x", 'Medirence2', $coms_conect);

                                                                                    if ($third_choice_category_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_category_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_category_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_category_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_category_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_category_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_category_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_category_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_category_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_category_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_category_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_category_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_category_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_category_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_category_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_category_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_category_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_category_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_category_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_category_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_category_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_category_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_category_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_category_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_category_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_category_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_category_LightBox_text<?= $x ?>"><?= $third_choice_category_LightBox["text"] ?>

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
                                                                                       id="third_choice_category_LightBox_count"
                                                                                       name="third_choice_category_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_category_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_category_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_category_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_category_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_category_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_category_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_category_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_category_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_category_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_category_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_category_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_category_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_category_LightBox_avatar7_link' + i + '" name="third_choice_category_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_category_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_category_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_category_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_category_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_category_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_category_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_category_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_category_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_category_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_category_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_category_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_category_LightBox' + id).remove();
                                                                                            $('#third_choice_category_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_category_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_category_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_category_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_category_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_category_LightBox').hide();
                                                                        $('.category_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

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

        //----------category---------------------
        $(".H_rename_category_box1").click(function () {
            $(this).hide();
            $('.H_rename_category_box1_save').show();
            $(".H_input_rename_category_box1").toggle(300);
        });
        $(".H_rename_category_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'category_box1' + "&value=" + $(".H_input_rename_category_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_category_box1 > span.temp").text($(".H_input_rename_category_box1").val());
            $(this).hide();
            $('.H_rename_category_box1').show();
            $(".H_input_rename_category_box1").hide();
            $(".H_rename_category_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_category_box2").click(function () {
            $(this).hide();
            $('.H_rename_category_box2_save').show();
            $(".H_input_rename_category_box2").toggle(300);
        });
        $(".H_rename_category_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'category_box2' + "&value=" + $(".H_input_rename_category_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_category_box2 > span.temp").text($(".H_input_rename_category_box2").val());
            $(this).hide();
            $('.H_rename_category_box2').show();
            $(".H_input_rename_category_box2").hide();
            $(".H_rename_category_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_category_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_category_title_box3_save').show();
            $(".H_input_rename_category_title_box3").toggle(300);
        });
        $(".H_rename_category_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'category_title_box3' + "&value=" + $(".H_input_rename_category_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_category_title_box3 > span.temp").text($(".H_input_rename_category_title_box3").val());
            $(this).hide();
            $('.H_rename_category_title_box3').show();
            $(".H_input_rename_category_title_box3").hide();
            $(".H_rename_category_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
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
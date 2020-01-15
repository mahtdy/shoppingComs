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



    ########################################################### under_cat ########################################################

    $under_cat_boxOne_pic_adress = 0;
    $under_cat_boxOne_pic_adress= injection_replace($_POST["under_cat_boxOne_pic_adress"]);
    $under_cat_boxOne_title= injection_replace($_POST["under_cat_boxOne_title"]);
    insert_templdate($site, $under_cat_boxOne_pic_adress, $la, '', $under_cat_boxOne_title, '', '', "under_cat_boxOne", 'Medirence2', $coms_conect);

    //slide

    $condition_under_cat_slide_boxOne = "name like 'under_cat_slide_boxOne%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_under_cat_slide_boxOne, $coms_conect);

    $condition_under_cat_slide_TitLin_boxOne = "name like 'under_cat_slide_TitLin_boxOne%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_under_cat_slide_TitLin_boxOne, $coms_conect);

    $under_cat_slide_boxOne_count = injection_replace_pic($_POST["under_cat_slide_boxOne_count"]);
    for ($x = 1; $x <= $under_cat_slide_boxOne_count; $x++) {

        $under_cat_slide_TitLin_boxOne_title = injection_replace_pic($_POST["under_cat_slide_TitLin_boxOne_title{$x}"]);
        $under_cat_slide_TitLin_boxOne_link = injection_replace_pic($_POST["under_cat_slide_TitLin_boxOne_link{$x}"]);

        $under_cat_slide_boxOne_text = injection_replace_pic($_POST["under_cat_slide_boxOne_text{$x}"]);
        $under_cat_slide_boxOne_title = injection_replace_pic($_POST["under_cat_slide_boxOne_title{$x}"]);
        $under_cat_slide_boxOne_link = injection_replace_pic($_POST["under_cat_slide_boxOne_link{$x}"]);
        $under_cat_slide_boxOne_pic = injection_replace_pic($_POST["under_cat_slide_boxOne_pic{$x}"]);

        $under_cat_slide_boxOne_pic_adress = injection_replace_pic($_POST["under_cat_slide_boxOne_pic_adress{$x}"]);
        $third_choice_under_cat_box_hover_black_pic = resize_image_M($under_cat_slide_boxOne_pic_adress,1423,330,$img_page_main,'');
        $under_cat_slide_boxOne_pic_adress_avatar7 = injection_replace($_POST["under_cat_slide_boxOne_pic_adress_avatar7{$x}"][0]);
        if ($under_cat_slide_boxOne_pic_adress_avatar7 > "") {
            $under_cat_slide_boxOne_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $under_cat_slide_boxOne_pic_adress_avatar7;
            $third_choice_under_cat_box_hover_black_pic = resize_image_M($under_cat_slide_boxOne_pic_adress,1423,330,$img_page_main,'');
        }

            insert_templdate($site, $under_cat_slide_boxOne_pic_adress, $la, $under_cat_slide_boxOne_text, $under_cat_slide_boxOne_title, $under_cat_slide_boxOne_link, $under_cat_slide_boxOne_pic, "under_cat_slide_boxOne$x", 'Medirence2', $coms_conect);
            insert_templdate($site, '', $la, '', $under_cat_slide_TitLin_boxOne_title, $under_cat_slide_TitLin_boxOne_link, '', "under_cat_slide_TitLin_boxOne$x", 'Medirence2', $coms_conect);

    }

// under_cat box_hover_black
    $under_cat_title_box_hover_black_pic_adress = 0;
    $under_cat_title_box_hover_black_pic_adress= injection_replace($_POST["under_cat_title_box_hover_black_pic_adress"]);
    $under_cat_title_box_hover_black_title= injection_replace($_POST["under_cat_title_box_hover_black_title"]);
    insert_templdate($site, $under_cat_title_box_hover_black_pic_adress, $la,'', $under_cat_title_box_hover_black_title, '', '', "under_cat_title_box_hover_black", 'Medirence2', $coms_conect);

    $under_cat_title_box_hover_black_btn_pic_adress= injection_replace($_POST["under_cat_title_box_hover_black_btn_pic_adress"]);
    $under_cat_title_box_hover_black_btn_title= injection_replace($_POST["under_cat_title_box_hover_black_btn_title"]);
    $under_cat_title_box_hover_black_btn_link= injection_replace($_POST["under_cat_title_box_hover_black_btn_link"]);
    $under_cat_title_box_hover_black_btn_pic= injection_replace($_POST["under_cat_title_box_hover_black_btn_pic"]);
    $under_cat_title_box_hover_black_btn_text= injection_replace($_POST["under_cat_title_box_hover_black_btn_text"]);
    insert_templdate($site, $under_cat_title_box_hover_black_btn_pic_adress, $la,$under_cat_title_box_hover_black_btn_text, $under_cat_title_box_hover_black_btn_title, $under_cat_title_box_hover_black_btn_link, $under_cat_title_box_hover_black_btn_pic, "under_cat_title_box_hover_black_btn", 'Medirence2', $coms_conect);


    $ValSelectActive_under_cat_box_hover_black_title = injection_replace($_POST["ValSelectActive_under_cat_box_hover_black_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_under_cat_box_hover_black_title, '', '', "ValSelectActive_under_cat_box_hover_black", 'Medirence2', $coms_conect);

    $condition_first_choice_under_cat_box_hover_black = "name like 'first_choice_under_cat_box_hover_black%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_under_cat_box_hover_black, $coms_conect);
    $first_choice_under_cat_box_hover_black_count = injection_replace_pic($_POST["first_choice_under_cat_box_hover_black_count"]);
    for ($i = 1; $i <= $first_choice_under_cat_box_hover_black_count; $i++) {

        $first_choice_under_cat_box_hover_black_cat = injection_replace_pic($_POST["first_choice_under_cat_box_hover_black_cat{$i}"]);
        $first_choice_under_cat_box_hover_black_subcat_cat = injection_replace_pic($_POST["first_choice_under_cat_box_hover_black_subcat_cat{$i}"]);
        $first_choice_under_cat_box_hover_black_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_under_cat_box_hover_black_Fixed_selection_cat{$i}"]);
        $first_choice_under_cat_box_hover_black_number = injection_replace_pic($_POST["first_choice_under_cat_box_hover_black_number{$i}"]);
        if ($first_choice_under_cat_box_hover_black_subcat_cat > "")
            insert_templdate($site, $first_choice_under_cat_box_hover_black_number, $la, $first_choice_under_cat_box_hover_black_Fixed_selection_cat, '', $first_choice_under_cat_box_hover_black_cat, $first_choice_under_cat_box_hover_black_subcat_cat, "first_choice_under_cat_box_hover_black$i", 'Medirence2', $coms_conect);
    }

    $condition_second_choice_under_cat_box_hover_black = "name like 'second_choice_under_cat_box_hover_black%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_under_cat_box_hover_black, $coms_conect);
    $second_choice_under_cat_box_hover_black_count = injection_replace_pic($_POST["second_choice_under_cat_box_hover_black_count"]);
    for ($i = 1; $i <= $second_choice_under_cat_box_hover_black_count; $i++) {

        $second_choice_under_cat_box_hover_black_cat = injection_replace_pic($_POST["second_choice_under_cat_box_hover_black_cat{$i}"]);
        $second_choice_under_cat_box_hover_black_subcat_cat = injection_replace_pic($_POST["second_choice_under_cat_box_hover_black_subcat_cat{$i}"]);
        $second_choice_under_cat_box_hover_black_subcat_cat_content = injection_replace_pic($_POST["second_choice_under_cat_box_hover_black_subcat_cat_content{$i}"]);
        if ($second_choice_under_cat_box_hover_black_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_under_cat_box_hover_black_subcat_cat_content, $la, '', '', $second_choice_under_cat_box_hover_black_cat, $second_choice_under_cat_box_hover_black_subcat_cat, "second_choice_under_cat_box_hover_black$i", 'Medirence2', $coms_conect);
    }

    $condition_third_choice_under_cat_box_hover_black = "name like 'third_choice_under_cat_box_hover_black%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_under_cat_box_hover_black, $coms_conect);
    $third_choice_under_cat_box_hover_black_count = injection_replace_pic($_POST["third_choice_under_cat_box_hover_black_count"]);
    for ($x = 1; $x <= $third_choice_under_cat_box_hover_black_count; $x++) {

        $third_choice_under_cat_box_hover_black_title = injection_replace_pic($_POST["third_choice_under_cat_box_hover_black_title{$x}"]);
        $third_choice_under_cat_box_hover_black_text = injection_replace_pic($_POST["third_choice_under_cat_box_hover_black_text{$x}"]);
        $third_choice_under_cat_box_hover_black_text = resize_image_M($third_choice_under_cat_box_hover_black_text,126,22,$img_page_main,'');
        $third_choice_under_cat_box_hover_black_text_avatar_orak = injection_replace($_POST["third_choice_under_cat_box_hover_black_text_avatar_orak{$x}"][0]);
        if ($third_choice_under_cat_box_hover_black_text_avatar_orak > "") {
            $third_choice_under_cat_box_hover_black_text = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_under_cat_box_hover_black_text_avatar_orak;
            $third_choice_under_cat_box_hover_black_text = resize_image_M($third_choice_under_cat_box_hover_black_text,126,22,$img_page_main,'');
        }

        $third_choice_under_cat_box_hover_black_hov_title = injection_replace_pic($_POST["third_choice_under_cat_box_hover_black_hov_title{$x}"]);
        $third_choice_under_cat_box_hover_black_hov_link = injection_replace_pic($_POST["third_choice_under_cat_box_hover_black_hov_link{$x}"]);
        $third_choice_under_cat_box_hover_black_hov_text = injection_replace_pic($_POST["third_choice_under_cat_box_hover_black_hov_text{$x}"]);

        $third_choice_under_cat_box_hover_black_link = injection_replace_pic($_POST["third_choice_under_cat_box_hover_black_link{$x}"]);
        $third_choice_under_cat_box_hover_black_pic = injection_replace_pic($_POST["third_choice_under_cat_box_hover_black_pic{$x}"]);
        $third_choice_under_cat_box_hover_black_pic = resize_image_M($third_choice_under_cat_box_hover_black_pic,253,216,$img_page_main,'');
        $third_choice_under_cat_box_hover_black_avatar7 = injection_replace($_POST["third_choice_under_cat_box_hover_black_avatar7{$x}"][0]);
        if ($third_choice_under_cat_box_hover_black_avatar7 > "") {
            $third_choice_under_cat_box_hover_black_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_under_cat_box_hover_black_avatar7;
            $third_choice_under_cat_box_hover_black_pic = resize_image_M($third_choice_under_cat_box_hover_black_pic,253,216,$img_page_main,'');
        }
        if ($third_choice_under_cat_box_hover_black_title > "") {
            insert_templdate($site, '', $la, $third_choice_under_cat_box_hover_black_text, $third_choice_under_cat_box_hover_black_title, $third_choice_under_cat_box_hover_black_link, $third_choice_under_cat_box_hover_black_pic, "third_choice_under_cat_box_hover_black$x", 'Medirence2', $coms_conect);
            insert_templdate($site, '', $la, $third_choice_under_cat_box_hover_black_hov_text, $third_choice_under_cat_box_hover_black_hov_title, $third_choice_under_cat_box_hover_black_hov_link, '', "third_choice_under_cat_box_hover_black_hov$x", 'Medirence2', $coms_conect);
        }
    }

    //   box 3
    $under_cat_box3_title_pic_adress=0;
    $under_cat_box3_title_pic_adress= injection_replace($_POST["under_cat_box3_title_pic_adress"]);
    $under_cat_box3_title_title= injection_replace($_POST["under_cat_box3_title_title"]);
    insert_templdate($site, $under_cat_box3_title_pic_adress, $la,'', $under_cat_box3_title_title, '', '', "under_cat_box3_title", 'Medirence2', $coms_conect);

    //  block1
    $under_cat_box3_blockOne_pic_adress= injection_replace($_POST["under_cat_box3_blockOne_pic_adress"]);
    $under_cat_box3_blockOne_title= injection_replace($_POST["under_cat_box3_blockOne_title"]);
    $under_cat_box3_blockOne_text= injection_replace($_POST["under_cat_box3_blockOne_text"]);
    $under_cat_box3_blockOne_link= injection_replace($_POST["under_cat_box3_blockOne_link"]);
    $under_cat_box3_blockOne_pic = injection_replace_pic($_POST["under_cat_box3_blockOne_pic"]);
    $under_cat_box3_blockOne_pic = resize_image_M($under_cat_box3_blockOne_pic,320,197,$img_page_main,'');
    $under_cat_box3_blockOne_pic_avatar_orak = injection_replace($_POST["under_cat_box3_blockOne_pic_avatar_orak"][0]);
    if ($under_cat_box3_blockOne_pic_avatar_orak > "") {
        $under_cat_box3_blockOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $under_cat_box3_blockOne_pic_avatar_orak;
        $under_cat_box3_blockOne_pic = resize_image_M($under_cat_box3_blockOne_pic,320,197,$img_page_main,'');
    }
    insert_templdate($site, $under_cat_box3_blockOne_pic_adress, $la,$under_cat_box3_blockOne_text, $under_cat_box3_blockOne_title, $under_cat_box3_blockOne_link, $under_cat_box3_blockOne_pic, "under_cat_box3_blockOne", 'Medirence2', $coms_conect);

    //  block2
    $condition_under_cat_box3_blockTwo = "name like 'under_cat_box3_blockTwo%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_under_cat_box3_blockTwo, $coms_conect);
    $under_cat_box3_blockTwo_count = injection_replace_pic($_POST["under_cat_box3_blockTwo_count"]);
    for ($x = 1; $x <= $under_cat_box3_blockTwo_count; $x++) {

        $under_cat_box3_blockTwo_title = injection_replace_pic($_POST["under_cat_box3_blockTwo_title{$x}"]);
        $under_cat_box3_blockTwo_link = injection_replace_pic($_POST["under_cat_box3_blockTwo_link{$x}"]);
        $under_cat_box3_blockTwo_text = injection_replace_pic($_POST["under_cat_box3_blockTwo_text{$x}"]);

        insert_templdate($site, '', $la, $under_cat_box3_blockTwo_text, $under_cat_box3_blockTwo_title, $under_cat_box3_blockTwo_link, '', "under_cat_box3_blockTwo$x", 'Medirence2', $coms_conect);

    }
    //  block3

    $condition_under_cat_box3_blockThree = "name like 'under_cat_box3_blockThree%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_under_cat_box3_blockThree, $coms_conect);

    $under_cat_box3_blockThree_count = injection_replace_pic($_POST["under_cat_box3_blockThree_count"]);
    for ($x = 1; $x <= $under_cat_box3_blockThree_count; $x++) {

        $under_cat_box3_blockThree_link = injection_replace_pic($_POST["under_cat_box3_blockThree_link{$x}"]);
        $under_cat_box3_blockThree_text = injection_replace_pic($_POST["under_cat_box3_blockThree_text{$x}"]);


        $under_cat_box3_blockThree_pic_adress = injection_replace_pic($_POST["under_cat_box3_blockThree_pic_adress{$x}"]);
        $under_cat_box3_blockThree_pic_adress = resize_image_M($under_cat_box3_blockThree_pic_adress,60,60,$img_page_main,'');
        $under_cat_box3_blockThree_pic_adress_avatar7 = injection_replace($_POST["under_cat_box3_blockThree_pic_adress_avatar7{$x}"][0]);
        if ($under_cat_box3_blockThree_pic_adress_avatar7 > "") {
            $under_cat_box3_blockThree_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $under_cat_box3_blockThree_pic_adress_avatar7;
            $under_cat_box3_blockThree_pic_adress = resize_image_M($under_cat_box3_blockThree_pic_adress,60,60,$img_page_main,'');
        }
        $under_cat_box3_blockThree_pic = injection_replace_pic($_POST["under_cat_box3_blockThree_pic{$x}"]);
        $under_cat_box3_blockThree_pic = resize_image_M($under_cat_box3_blockThree_pic,108,15,$img_page_main,'');
        $under_cat_box3_blockThree_pic_avatar7 = injection_replace($_POST["under_cat_box3_blockThree_pic_avatar7{$x}"][0]);
        if ($under_cat_box3_blockThree_pic_avatar7 > "") {
            $under_cat_box3_blockThree_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $under_cat_box3_blockThree_pic_avatar7;
            $under_cat_box3_blockThree_pic = resize_image_M($under_cat_box3_blockThree_pic,108,15,$img_page_main,'');
        }
        $under_cat_box3_blockThree_title = injection_replace_pic($_POST["under_cat_box3_blockThree_title{$x}"]);
        $under_cat_box3_blockThree_title = resize_image_M($under_cat_box3_blockThree_title,108,108,$img_page_main,'');
        $under_cat_box3_blockThree_title_avatar7 = injection_replace($_POST["under_cat_box3_blockThree_title_avatar7{$x}"][0]);
        if ($under_cat_box3_blockThree_title_avatar7 > "") {
            $under_cat_box3_blockThree_title = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $under_cat_box3_blockThree_title_avatar7;
            $under_cat_box3_blockThree_title = resize_image_M($under_cat_box3_blockThree_title,108,108,$img_page_main,'');
        }

        insert_templdate($site, $under_cat_box3_blockThree_pic_adress, $la, $under_cat_box3_blockThree_text, $under_cat_box3_blockThree_title, $under_cat_box3_blockThree_link, $under_cat_box3_blockThree_pic, "under_cat_box3_blockThree$x", 'Medirence2', $coms_conect);

    }

    //   Light box
    $under_cat_title_LightBox_pic_adress = 0;
    $under_cat_title_LightBox_pic_adress= injection_replace($_POST["under_cat_title_LightBox_pic_adress"]);
    $under_cat_title_LightBox_title= injection_replace($_POST["under_cat_title_LightBox_title"]);
    insert_templdate($site, $under_cat_title_LightBox_pic_adress, $la, '', $under_cat_title_LightBox_title, '', '', "under_cat_title_LightBox", 'Medirence2', $coms_conect);

    $ValSelectActive_under_cat_LightBox_title = injection_replace($_POST["ValSelectActive_under_cat_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_under_cat_LightBox_title, '', '', "ValSelectActive_under_cat_LightBox", 'Medirence2', $coms_conect);

    $condition_first_choice_under_cat_LightBox = "name like 'first_choice_under_cat_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_under_cat_LightBox, $coms_conect);
    $first_choice_under_cat_LightBox_count = injection_replace_pic($_POST["first_choice_under_cat_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_under_cat_LightBox_count; $i++) {

        $first_choice_under_cat_LightBox_cat = injection_replace_pic($_POST["first_choice_under_cat_LightBox_cat{$i}"]);
        $first_choice_under_cat_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_under_cat_LightBox_subcat_cat{$i}"]);
        $first_choice_under_cat_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_under_cat_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_under_cat_LightBox_number = injection_replace_pic($_POST["first_choice_under_cat_LightBox_number{$i}"]);
        if ($first_choice_under_cat_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_under_cat_LightBox_number, $la, $first_choice_under_cat_LightBox_Fixed_selection_cat, '', $first_choice_under_cat_LightBox_cat, $first_choice_under_cat_LightBox_subcat_cat, "first_choice_under_cat_LightBox$i", 'Medirence2', $coms_conect);
    }

    $condition_second_choice_under_cat_LightBox = "name like 'second_choice_under_cat_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_under_cat_LightBox, $coms_conect);
    $second_choice_under_cat_LightBox_count = injection_replace_pic($_POST["second_choice_under_cat_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_under_cat_LightBox_count; $i++) {

        $second_choice_under_cat_LightBox_cat = injection_replace_pic($_POST["second_choice_under_cat_LightBox_cat{$i}"]);
        $second_choice_under_cat_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_under_cat_LightBox_subcat_cat{$i}"]);
        $second_choice_under_cat_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_under_cat_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_under_cat_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_under_cat_LightBox_subcat_cat_content, $la, '', '', $second_choice_under_cat_LightBox_cat, $second_choice_under_cat_LightBox_subcat_cat, "second_choice_under_cat_LightBox$i", 'Medirence2', $coms_conect);
    }

    $condition_third_choice_under_cat_LightBox = "name like 'third_choice_under_cat_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_under_cat_LightBox, $coms_conect);
    $third_choice_under_cat_LightBox_count = injection_replace_pic($_POST["third_choice_under_cat_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_under_cat_LightBox_count; $x++) {

        $third_choice_under_cat_LightBox_title = injection_replace_pic($_POST["third_choice_under_cat_LightBox_title{$x}"]);
        $third_choice_under_cat_LightBox_text = injection_replace_pic($_POST["third_choice_under_cat_LightBox_text{$x}"]);
        $third_choice_under_cat_LightBox_link = injection_replace_pic($_POST["third_choice_under_cat_LightBox_link{$x}"]);
        $third_choice_under_cat_LightBox_pic = injection_replace_pic($_POST["third_choice_under_cat_LightBox_pic{$x}"]);
        $third_choice_under_cat_LightBox_pic = resize_image_M($third_choice_under_cat_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_under_cat_LightBox_avatar7 = injection_replace($_POST["third_choice_under_cat_LightBox_avatar7{$x}"][0]);
        if ($third_choice_under_cat_LightBox_avatar7 > "") {
            $third_choice_under_cat_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_under_cat_LightBox_avatar7;
            $third_choice_under_cat_LightBox_pic = resize_image_M($third_choice_under_cat_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_under_cat_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_under_cat_LightBox_text, $third_choice_under_cat_LightBox_title, $third_choice_under_cat_LightBox_link, $third_choice_under_cat_LightBox_pic, "third_choice_under_cat_LightBox$x", 'Medirence2', $coms_conect);
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
                                        <a class="z-link">under_cat</a>
                                    </li>


                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------under_cat---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $under_cat_box1 = get_tem_result($site, $la, "under_cat_box1", 'Medirence2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_under_cat_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $under_cat_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_under_cat_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_under_cat_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_under_cat_box1 H_dis_none"
                                                               name="under_cat_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $under_cat_box2 = get_tem_result($site, $la, "under_cat_box2", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_under_cat_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $under_cat_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_under_cat_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_under_cat_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_under_cat_box2 H_dis_none"
                                                               name="under_cat_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $under_cat_title_box3 = get_tem_result($site, $la, "under_cat_title_box3", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_under_cat_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $under_cat_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_under_cat_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_under_cat_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_under_cat_title_box3 H_dis_none"
                                                               name="under_cat_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $under_cat_title_box4 = get_tem_result($site, $la, "under_cat_title_box4", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_under_cat_title_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $under_cat_title_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_under_cat_title_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_under_cat_title_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_under_cat_title_box4 H_dis_none"
                                                               name="under_cat_title_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>



                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $under_cat_boxOne = get_tem_result($site, $la, "under_cat_boxOne", 'Medirence2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($under_cat_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="under_cat_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ارتفاع اسلاید شو </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="under_cat_boxOne_title"
                                                                           value="<?= $under_cat_boxOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اسلایدشو »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_under_cat_slide_boxOne = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'under_cat_slide_boxOne%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_under_cat_slide_boxOne; $x++) {
                                                                            $under_cat_slide_boxOne = get_tem_result($site, $la, "under_cat_slide_boxOne$x", 'Medirence2', $coms_conect);
                                                                            $under_cat_slide_TitLin_boxOne = get_tem_result($site, $la, "under_cat_slide_TitLin_boxOne$x", 'Medirence2', $coms_conect);
                                                                            ?>
                                                                                <div id="div_mother_third_choice_under_cat_slide_boxOne<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_under_cat_slide_boxOne" style="margin-bottom: 90px!important;"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>
                                                                                        <div class="form-group col-md-11">
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="under_cat_slide_TitLin_boxOne_title<?= $x ?>"
                                                                                                       value="<?= $under_cat_slide_TitLin_boxOne["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="under_cat_slide_TitLin_boxOne_title<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="under_cat_slide_TitLin_boxOne_link<?= $x ?>"
                                                                                                       value="<?= $under_cat_slide_TitLin_boxOne["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک اول"
                                                                                                       name="under_cat_slide_TitLin_boxOne_link<?= $x ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-11">
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="under_cat_slide_boxOne_title<?= $x ?>"
                                                                                                       value="<?= $under_cat_slide_boxOne["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان دوم"
                                                                                                       name="under_cat_slide_boxOne_title<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="under_cat_slide_boxOne_link<?= $x ?>"
                                                                                                       value="<?= $under_cat_slide_boxOne["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک دوم"
                                                                                                       name="under_cat_slide_boxOne_link<?= $x ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-11">
                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="under_cat_slide_boxOne_pic<?= $x ?>"
                                                                                                       value="<?= $under_cat_slide_boxOne["pic"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک تصویر"
                                                                                                       name="under_cat_slide_boxOne_pic<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="under_cat_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                       value="<?=$under_cat_slide_boxOne["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="under_cat_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_under_cat_slide_boxOne<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="under_cat_slide_boxOne_pic_adress_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="under_cat_slide_boxOne_pic_adress_avatar7_link<?= $x ?>"
                                                                                   name="under_cat_slide_boxOne_pic_adress_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_under_cat_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group"
                                                                                                 id="image_show_under_cat_slide_boxOne<?= $x ?>">
                                                                                                <a href="<?= $under_cat_slide_boxOne["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $under_cat_slide_boxOne["pic_adress"] ?>"
                                                                                                         alt="<?= $under_cat_slide_boxOne["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#under_cat_slide_boxOne_pic_adress_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#under_cat_slide_boxOne_pic_adress_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="under_cat_slide_boxOne_count"
                                                                               name="under_cat_slide_boxOne_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_under_cat_slide_boxOne-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_under_cat_slide_boxOne' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_under_cat_slide_boxOne" style="margin-bottom: 90px!important;" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="under_cat_slide_TitLin_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="under_cat_slide_TitLin_boxOne_title' + i + '" ></div> <div class="col-md-6 input-group"><input type="text" id="under_cat_slide_TitLin_boxOne_link' + i + '" value="" class="form-control" placeholder="لینک اول" name="under_cat_slide_TitLin_boxOne_link' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="under_cat_slide_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان دوم" name="under_cat_slide_boxOne_title' + i + '" ></div> <div class="col-md-6 input-group"><input type="text" id="under_cat_slide_boxOne_link' + i + '" value="" class="form-control" placeholder="لینک دوم" name="under_cat_slide_boxOne_link' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-5 input-group"><input type="text" id="under_cat_slide_boxOne_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="under_cat_slide_boxOne_pic' + i + '" ></div><div class="col-md-6 input-group"> <input type="text" id="under_cat_slide_boxOne_pic_adress' + i + '" value="" class="form-control" placeholder=" تصویر" name="under_cat_slide_boxOne_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_slide_boxOne_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_under_cat_slide_boxOne' + i + '" style="padding: 0px;"><div  id="under_cat_slide_boxOne_pic_adress_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="under_cat_slide_boxOne_pic_adress_avatar7_link' + i + '" name="under_cat_slide_boxOne_pic_adress_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_under_cat_slide_boxOne_pic_adress' + i + '" style="float:right;"></div></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_under_cat_slide_boxOne' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#under_cat_slide_boxOne_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#under_cat_slide_boxOne_pic_adress_avatar7' + i + '').orakuploader({
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

                                                                                    $('#under_cat_slide_boxOne_pic_adress_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_under_cat_slide_boxOne' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_under_cat_slide_boxOne' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_under_cat_slide_boxOne', function () {
                                                                                    var id = '';
                                                                                    var k = $('#under_cat_slide_boxOne_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_under_cat_slide_boxOne' + id).remove();
                                                                                    $('#under_cat_slide_boxOne_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_under_cat_slide_boxOne-ads"><i
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
                                                <!-------------------box_hover_black------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $under_cat_title_box_hover_black = get_tem_result($site, $la, "under_cat_title_box_hover_black", 'Medirence2', $coms_conect); ?>
                                                        <? $under_cat_title_box_hover_black_btn = get_tem_result($site, $la, "under_cat_title_box_hover_black_btn", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($under_cat_title_box_hover_black['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="under_cat_title_box_hover_black_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="under_cat_title_box_hover_black_title"
                                                                           value="<?= $under_cat_title_box_hover_black['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="family">دکمه بالای بعد هاور شدن </label>
                                                            <div class="form-group col-md-4">
                                                                <div class="col-md-12 input-group">
                                                                    <input placeholder="عنوان" type="text" class="form-control" name="under_cat_title_box_hover_black_btn_title"
                                                                           value="<?= $under_cat_title_box_hover_black_btn['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="col-md-12 input-group">
                                                                    <input placeholder="لینک" type="text" class="form-control" name="under_cat_title_box_hover_black_btn_link"
                                                                           value="<?= $under_cat_title_box_hover_black_btn['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label" for="family">دکمه پایین بعد هاور شدن </label>
                                                            <div class="form-group col-md-4">
                                                                <div class="col-md-12 input-group">
                                                                    <input placeholder="عنوان" type="text" class="form-control" name="under_cat_title_box_hover_black_btn_pic"
                                                                           value="<?= $under_cat_title_box_hover_black_btn['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <div class="col-md-12 input-group">
                                                                    <input placeholder="لینک" type="text" class="form-control" name="under_cat_title_box_hover_black_btn_text"
                                                                           value="<?= $under_cat_title_box_hover_black_btn['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <hr>
                                                        <? $ValSelectActive_under_cat_box_hover_black = get_tem_result($site, $la, "ValSelectActive_under_cat_box_hover_black", 'Medirence2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_under_cat_box_hover_black"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_under_cat_box_hover_black"
                                                                    name="select_type_under_cat_box_hover_black">

                                                                <option <? if ($ValSelectActive_under_cat_box_hover_black["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_under_cat_box_hover_black["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_under_cat_box_hover_black["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_under_cat_box_hover_black_title" type="hidden"
                                                                   value="<?= $ValSelectActive_under_cat_box_hover_black["title"] ?>">

                                                            <div class="tab-pane opt_under_cat_box_hover_black under_cat_box_hover_black_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_under_cat_box_hover_black = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'first_choice_under_cat_box_hover_black%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_under_cat_box_hover_black; $j++) {
                                                                                    $first_choice_under_cat_box_hover_black = get_tem_result($site, $la, "first_choice_under_cat_box_hover_black$j", 'Medirence2', $coms_conect);
                                                                                    if ($first_choice_under_cat_box_hover_black['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_under_cat_box_hover_black<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_under_cat_box_hover_black"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_under_cat_box_hover_black col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_under_cat_box_hover_black_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_under_cat_box_hover_black_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_under_cat_box_hover_black['pic'] ?>">

                                                                                                        <select id="first_choice_under_cat_box_hover_black_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_under_cat_box_hover_black_cat"
                                                                                                                name="first_choice_under_cat_box_hover_black_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_under_cat_box_hover_black['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_under_cat_box_hover_black<?= $j ?>"
                                                                                                         class="col-md-4 input-group"></div>
                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_under_cat_box_hover_black_new&id=" + $("#first_choice_under_cat_box_hover_black_cat<?=$j?>").val() + "&value=" + $("#first_choice_under_cat_box_hover_black_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_under_cat_box_hover_black<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_under_cat_box_hover_black_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_under_cat_box_hover_black_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_under_cat_box_hover_black['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_under_cat_box_hover_black['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_under_cat_box_hover_black['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_under_cat_box_hover_black_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_under_cat_box_hover_black["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_under_cat_box_hover_black_number<?= $j ?>">
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
                                                                                       id="first_choice_under_cat_box_hover_black_count"
                                                                                       name="first_choice_under_cat_box_hover_black_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_under_cat_box_hover_black_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_under_cat_box_hover_black').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_under_cat_box_hover_black_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_under_cat_box_hover_black<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_under_cat_box_hover_black').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_under_cat_box_hover_black' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_under_cat_box_hover_black" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_under_cat_box_hover_black col-md-4 input-group"><input type="hidden" id="first_choice_under_cat_box_hover_black_subcat_val' + i + '"  name="first_choice_under_cat_box_hover_black_subcat_val' + i + '" value=""> <select id="first_choice_under_cat_box_hover_black_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_under_cat_box_hover_black_cat" name="first_choice_under_cat_box_hover_black_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_under_cat_box_hover_black' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_under_cat_box_hover_black_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_under_cat_box_hover_black_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_under_cat_box_hover_black_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_under_cat_box_hover_black_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_under_cat_box_hover_black' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_under_cat_box_hover_black_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_under_cat_box_hover_black', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_under_cat_box_hover_black_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_under_cat_box_hover_black' + id).remove();
                                                                                            $('#first_choice_under_cat_box_hover_black_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_under_cat_box_hover_black"><i
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

                                                            <div class="tab-pane opt_under_cat_box_hover_black under_cat_box_hover_black_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_under_cat_box_hover_black = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'second_choice_under_cat_box_hover_black%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_under_cat_box_hover_black; $j++) {
                                                                                    $second_choice_under_cat_box_hover_black = get_tem_result($site, $la, "second_choice_under_cat_box_hover_black$j", 'Medirence2', $coms_conect);
                                                                                    if ($second_choice_under_cat_box_hover_black['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_under_cat_box_hover_black<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_under_cat_box_hover_black"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_under_cat_box_hover_black col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_under_cat_box_hover_black_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_under_cat_box_hover_black_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_under_cat_box_hover_black['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_under_cat_box_hover_black_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_under_cat_box_hover_black_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_under_cat_box_hover_black['pic_adress'] ?>">

                                                                                                        <select id="second_choice_under_cat_box_hover_black_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_under_cat_box_hover_black_cat"
                                                                                                                name="second_choice_under_cat_box_hover_black_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_under_cat_box_hover_black['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_under_cat_box_hover_black<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_under_cat_box_hover_black_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_under_cat_box_hover_black&id=" + $("#second_choice_under_cat_box_hover_black_cat<?=$j?>").val() + "&value=" + $("#second_choice_under_cat_box_hover_black_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_under_cat_box_hover_black<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_under_cat_box_hover_black_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_under_cat_box_hover_black_content&id=" + $("#second_choice_under_cat_box_hover_black_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_under_cat_box_hover_black_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_under_cat_box_hover_black_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_under_cat_box_hover_black_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_under_cat_box_hover_black_count"
                                                                                       name="second_choice_under_cat_box_hover_black_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_under_cat_box_hover_black_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_under_cat_box_hover_black').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_under_cat_box_hover_black&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_under_cat_box_hover_black<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_under_cat_box_hover_black_neshane").change(function () {
                                                                                        var j = $("#second_choice_under_cat_box_hover_black_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_under_cat_box_hover_black&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_under_cat_box_hover_black' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_under_cat_box_hover_black_neshane', function () {
                                                                                        var j = $("#second_choice_under_cat_box_hover_black_count").val();
                                                                                        //  $(".second_choice_under_cat_box_hover_black_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_under_cat_box_hover_black_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_under_cat_box_hover_black_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_under_cat_box_hover_black').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_under_cat_box_hover_black' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_under_cat_box_hover_black" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_under_cat_box_hover_black col-md-3 input-group"><input type="hidden" id="second_choice_under_cat_box_hover_black_subcat_val' + i + '"  name="second_choice_under_cat_box_hover_black_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_under_cat_box_hover_black_subcat_link' + i + '"  name="second_choice_under_cat_box_hover_black_subcat_link' + i + '" value=""> <select id="second_choice_under_cat_box_hover_black_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_under_cat_box_hover_black_cat" name="second_choice_under_cat_box_hover_black_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_under_cat_box_hover_black' + i + '" class="col-md-3 input-group"></div><div id="second_choice_under_cat_box_hover_black_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_under_cat_box_hover_black' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_under_cat_box_hover_black_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_under_cat_box_hover_black', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_under_cat_box_hover_black_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_under_cat_box_hover_black' + id).remove();
                                                                                            $('#second_choice_under_cat_box_hover_black_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_under_cat_box_hover_black"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_under_cat_box_hover_black under_cat_box_hover_black_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_third_choice_under_cat_box_hover_black = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'third_choice_under_cat_box_hover_black%' ", $coms_conect);
                                                                                for ($x = 1; $x <= $count_third_choice_under_cat_box_hover_black; $x++) {
                                                                                    $third_choice_under_cat_box_hover_black = get_tem_result($site, $la, "third_choice_under_cat_box_hover_black$x", 'Medirence2', $coms_conect);
                                                                                    $third_choice_under_cat_box_hover_black_hov = get_tem_result($site, $la, "third_choice_under_cat_box_hover_black_hov$x", 'Medirence2', $coms_conect);
                                                                                    if ($third_choice_under_cat_box_hover_black['title'] > "") {?>
                                                                                        <div id="div_mother_third_choice_under_cat_box_hover_black<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_under_cat_box_hover_black"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_under_cat_box_hover_black_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_under_cat_box_hover_black["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_under_cat_box_hover_black_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_under_cat_box_hover_black_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_under_cat_box_hover_black["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="متن ویژه بودن"
                                                                                                               name="third_choice_under_cat_box_hover_black_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_under_cat_box_hover_black_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_under_cat_box_hover_black["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_under_cat_box_hover_black_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_under_cat_box_hover_black_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                                                <span class="addimg flaticon-add139"></span></a></span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_under_cat_box_hover_black<?= $x ?>" style="padding: 0px;">
                                                                                <div id="third_choice_under_cat_box_hover_black_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_under_cat_box_hover_black_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_under_cat_box_hover_black_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_under_cat_box_hover_black<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_under_cat_box_hover_black["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_under_cat_box_hover_black<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_under_cat_box_hover_black["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_under_cat_box_hover_black["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_under_cat_box_hover_black["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_under_cat_box_hover_black_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_under_cat_box_hover_black_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                    <div class="form-group">
                                                                                                        <label class="col-md-1 control-label" for="family">لوگو</label>
                                                                                                        <div class="form-group col-md-9">
                                                                                                            <div class="col-md-12 input-group">
                                                                                                                <div class="col-md-6 input-group">

                                                                                                                    <input type="text" id="third_choice_under_cat_box_hover_black_text<?= $x ?>"
                                                                                                                           value="<?=$third_choice_under_cat_box_hover_black['text']?>"
                                                                                                                           class="form-control"
                                                                                                                           placeholder=" لوگو"
                                                                                                                           name="third_choice_under_cat_box_hover_black_text<?= $x ?>"
                                                                                                                           style="direction: ltr;">
                                                                                                                    <span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_under_cat_box_hover_black_text<?= $x ?>" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add139"></span></a></span>
                                                                                                                    <span class="input-group-addon H_neshane1 H_third_choice_box6" style="padding: 0px;"><div  id="third_choice_under_cat_box_hover_black_text_avatar_orak<?= $x ?>" orakuploader="on"></div></span>
                                                                                                                </div>
                                                                                                                <div class="ui-sortable red box" id="upload_type_third_choice_under_cat_box_hover_black_text<?= $x ?>" style="float:right;"></div>
                                                                                                                <div class="col-md-1 input-group" id="image_show_third_choice_under_cat_box_hover_black_text<?= $x ?>">
                                                                                                                    <a href="<?= $third_choice_under_cat_box_hover_black["text"] ?>" class=" without-caption" >
                                                                                                                        <img width="33" height="33" class="H_cursor_zoom" src="<?= $third_choice_under_cat_box_hover_black["text"] ?>" alt="<?= $third_choice_under_cat_box_hover_black["text"] ?>">
                                                                                                                    </a>
                                                                                                                </div>

                                                                                                                <script type="text/javascript">
                                                                                                                    $(document).ready(function () {
                                                                                                                        $('#third_choice_under_cat_box_hover_black_text_avatar_orak<?= $x ?>').orakuploader({
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

                                                                                                                        $('#third_choice_under_cat_box_hover_black_text_avatar_orak<?= $x ?>').html("<?=$pic_str?>");
                                                                                                                    });
                                                                                                                </script>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <hr style="clear: both;">
                                                                                                <h5 class="area" style="text-align: center;color: red; font-family: IRANSans;margin-bottom: 40px;">«صفحه هاور »</h5>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class="col-md-6 input-group">
                                                                                                        <input type="text" id="third_choice_under_cat_box_hover_black_hov_title<?= $x ?>" value="<?= $third_choice_under_cat_box_hover_black_hov["title"] ?>" class="form-control" placeholder="عنوان اول" name="third_choice_under_cat_box_hover_black_hov_title<?= $x ?>"></div>
                                                                                                    <div class="col-md-6 input-group"><input type="text" id="third_choice_under_cat_box_hover_black_hov_link<?= $x ?>" value="<?= $third_choice_under_cat_box_hover_black_hov["link"] ?>" class="form-control" placeholder="عنوان دوم" name="third_choice_under_cat_box_hover_black_hov_link<?= $x ?>"></div>

                                                                                                </div>
                                                                                                <div class="col-md-12 input-group H_pl32">
                                                                                                    <textarea type="text" id="third_choice_under_cat_box_hover_black_hov_text<?= $x ?>" class="form-control" placeholder="متن" name="third_choice_under_cat_box_hover_black_hov_text<?= $x ?>"><?= $third_choice_under_cat_box_hover_black_hov["text"] ?></textarea>
                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $xcount_mahsol = $x;
                                                                                ?>
                                                                                <input type="hidden"
                                                                                       id="third_choice_under_cat_box_hover_black_count"
                                                                                       name="third_choice_under_cat_box_hover_black_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_under_cat_box_hover_black-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_under_cat_box_hover_black' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_under_cat_box_hover_black" id="' + i + '" for="family" ><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_under_cat_box_hover_black_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_under_cat_box_hover_black_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_under_cat_box_hover_black_link' + i + '" value="" class="form-control" placeholder="متن ویژه بودن" name="third_choice_under_cat_box_hover_black_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_under_cat_box_hover_black_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_under_cat_box_hover_black_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_under_cat_box_hover_black_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_under_cat_box_hover_black' + i + '" style="padding: 0px;"><div  id="third_choice_under_cat_box_hover_black_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_under_cat_box_hover_black_avatar7_link' + i + '" name="third_choice_under_cat_box_hover_black_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_under_cat_box_hover_black' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><div class="form-group"><label class="col-md-1 control-label" for="family">لوگو</label><div class="form-group col-md-9"><div class="col-md-12 input-group"><div class="col-md-6 input-group"><input type="text" id="third_choice_under_cat_box_hover_black_text'+i+'"  value="" class="form-control" placeholder=" لوگو" name="third_choice_under_cat_box_hover_black_text'+ i +'" style="direction: ltr;"> <span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_under_cat_box_hover_black_text'+i+'" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add139"></span></a></span>  <span class="input-group-addon H_neshane1 H_third_choice_box6" style="padding: 0px;"><div  id="third_choice_under_cat_box_hover_black_text_avatar_orak'+i+'" orakuploader="on"></div></span></div><div class="ui-sortable red box" id="upload_type_third_choice_under_cat_box_hover_black_text'+ i +'" style="float:right;"></div></div></div></div><hr style="clear: both;"><h5 class="area" style="text-align: center;color: red; font-family: IRANSans;margin-bottom: 40px;">«صفحه هاور »</h5><div class="form-group col-md-12"><div class="col-md-6 input-group"><input type="text" id="third_choice_under_cat_box_hover_black_hov_title'+i+'" value="" class="form-control" placeholder="عنوان اول" name="third_choice_under_cat_box_hover_black_hov_title'+i+'"></div><div class="col-md-6 input-group"><input type="text" id="third_choice_under_cat_box_hover_black_hov_link'+i+'" value="" class="form-control" placeholder="عنوان دوم" name="third_choice_under_cat_box_hover_black_hov_link'+i+'"></div><div class="col-md-12 input-group H_pl32"><textarea type="text" id="third_choice_under_cat_box_hover_black_hov_text'+i+'" class="form-control" placeholder="متن" name="third_choice_under_cat_box_hover_black_hov_text'+i+'"></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_under_cat_box_hover_black' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_under_cat_box_hover_black_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_under_cat_box_hover_black_avatar7' + i + '').orakuploader({
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
                                                                                            $('#third_choice_under_cat_box_hover_black_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_under_cat_box_hover_black' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_under_cat_box_hover_black' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //----------logo
                                                                                            $('#third_choice_under_cat_box_hover_black_text_avatar_orak' + i + '').orakuploader({
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

                                                                                            $('#third_choice_under_cat_box_hover_black_text_avatar_orak' + i + '').html("<?=$pic_str?>");
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_under_cat_box_hover_black', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_under_cat_box_hover_black_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_under_cat_box_hover_black' + id).remove();
                                                                                            $('#third_choice_under_cat_box_hover_black_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_under_cat_box_hover_black-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_under_cat_box_hover_black_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_under_cat_box_hover_black"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_under_cat_box_hover_black_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_under_cat_box_hover_black').hide();
                                                                        $('.under_cat_box_hover_black_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------box3------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $under_cat_box3_title = get_tem_result($site, $la, "under_cat_box3_title", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($under_cat_box3_title['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="under_cat_box3_title_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان  </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="under_cat_box3_title_title"
                                                                           value="<?= $under_cat_box3_title['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $under_cat_box3_blockOne = get_tem_result($site, $la, "under_cat_box3_blockOne", 'Medirence2', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">« بلوک اول »</h5><br>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="under_cat_box3_blockOne_title"
                                                                           value="<?= $under_cat_box3_blockOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="under_cat_box3_blockOne_text"
                                                                           value="<?= $under_cat_box3_blockOne['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label class="col-md-3 control-label" for="family">تصویر</label>
                                                                <div class="form-group col-md-9">
                                                                    <div class="col-md-12 input-group">
                                                                        <div class="col-md-6 input-group">

                                                                            <input type="text" id="under_cat_box3_blockOne_pic"
                                                                                   value="<?=$under_cat_box3_blockOne['pic']?>"
                                                                                   class="form-control"
                                                                                   placeholder=" تصویر"
                                                                                   name="under_cat_box3_blockOne_pic"
                                                                                   style="direction: ltr;">
                                                                            <span class="input-group-addon" style="padding: 0px;"><a href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_box3_blockOne_pic" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add139"></span></a></span>
                                                                            <span class="input-group-addon H_neshane1 H_third_choice_box6" style="padding: 0px;"><div  id="under_cat_box3_blockOne_pic_avatar_orak" orakuploader="on"></div></span>
                                                                        </div>
                                                                        <div class="ui-sortable red box" id="upload_type_under_cat_box3_blockOne_pic" style="float:right;"></div>
                                                                        <div class="col-md-1 input-group" id="image_show_under_cat_box3_blockOne_pic">
                                                                            <a href="<?= $under_cat_box3_blockOne["pic"] ?>" class=" without-caption" >
                                                                                <img width="33" height="33" class="H_cursor_zoom" src="<?= $under_cat_box3_blockOne["pic"] ?>" alt="<?= $under_cat_box3_blockOne["pic"] ?>">
                                                                            </a>
                                                                        </div>

                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $('#under_cat_box3_blockOne_pic_avatar_orak').orakuploader({
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

                                                                                $('#under_cat_box3_blockOne_pic_avatar_orak').html("<?=$pic_str?>");
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">« بلوک دوم »</h5><br>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="under_cat_box3_blockOne_link"
                                                                           value="<?= $under_cat_box3_blockOne['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_under_cat_box3_blockTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'under_cat_box3_blockTwo%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_under_cat_box3_blockTwo; $x++) {
                                                                            $under_cat_box3_blockTwo = get_tem_result($site, $la, "under_cat_box3_blockTwo$x", 'Medirence2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choice_under_cat_box3_blockTwo<?= $x ?>"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">
                                                                                    <a class="col-md-1 control-label del_under_cat_box3_blockTwo" style="margin-bottom: 90px!important;"
                                                                                       id="<?= $x ?>"
                                                                                       for="family"><i
                                                                                                class="fa fa-trash text-danger remove"
                                                                                                title=""
                                                                                                data-original-title="حذف"></i>

                                                                                    </a>
                                                                                    <div class="form-group col-md-11">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="under_cat_box3_blockTwo_title<?= $x ?>"
                                                                                                   value="<?= $under_cat_box3_blockTwo["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان "
                                                                                                   name="under_cat_box3_blockTwo_title<?= $x ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="under_cat_box3_blockTwo_link<?= $x ?>"
                                                                                                   value="<?= $under_cat_box3_blockTwo["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک "
                                                                                                   name="under_cat_box3_blockTwo_link<?= $x ?>">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="form-group col-md-11">
                                                                                        <textarea type="text" id="under_cat_box3_blockTwo_text<?= $x ?>" class="form-control" placeholder="متن" name="under_cat_box3_blockTwo_text<?= $x ?>"><?= $under_cat_box3_blockTwo["text"] ?></textarea>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <?
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="under_cat_box3_blockTwo_count"
                                                                               name="under_cat_box3_blockTwo_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_under_cat_box3_blockTwo-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_under_cat_box3_blockTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_under_cat_box3_blockTwo" style="margin-bottom: 90px!important;" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="under_cat_box3_blockTwo_title' + i + '" value="" class="form-control" placeholder="عنوان " name="under_cat_box3_blockTwo_title' + i + '" ></div> <div class="col-md-6 input-group"><input type="text" id="under_cat_box3_blockTwo_link' + i + '" value="" class="form-control" placeholder="لینک " name="under_cat_box3_blockTwo_link' + i + '" ></div></div><div class="form-group col-md-11"><textarea type="text" id="under_cat_box3_blockTwo_text'+ i +'" class="form-control" placeholder="متن" name="under_cat_box3_blockTwo_text'+ i +'"></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_under_cat_box3_blockTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#under_cat_box3_blockTwo_count').val(i);


                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_under_cat_box3_blockTwo', function () {
                                                                                    var id = '';
                                                                                    var k = $('#under_cat_box3_blockTwo_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_under_cat_box3_blockTwo' + id).remove();
                                                                                    $('#under_cat_box3_blockTwo_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_under_cat_box3_blockTwo-ads"><i
                                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                    class="fa fa-plus"></i>افزودن
                                                                            لینک</a>
                                                                        </br>
                                                                    </div>
                                                                </fieldset>
                                                            </div>


                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">« بلوک سوم »</h5><br>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="under_cat_box3_blockOne_pic_adress"
                                                                           value="<?= $under_cat_box3_blockOne['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_under_cat_box3_blockThree = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'under_cat_box3_blockThree%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_under_cat_box3_blockThree; $x++) {
                                                                            $under_cat_box3_blockThree = get_tem_result($site, $la, "under_cat_box3_blockThree$x", 'Medirence2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choice_under_cat_box3_blockThree<?= $x ?>"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">
                                                                                    <a class="col-md-1 control-label del_under_cat_box3_blockThree" style="margin-bottom: 90px!important;"
                                                                                       id="<?= $x ?>"
                                                                                       for="family"><i
                                                                                                class="fa fa-trash text-danger remove"
                                                                                                title=""
                                                                                                data-original-title="حذف"></i>

                                                                                    </a>
                                                                                    <div class="form-group col-md-11">
                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="under_cat_box3_blockThree_link<?= $x ?>"
                                                                                                   value="<?= $under_cat_box3_blockThree["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک "
                                                                                                   name="under_cat_box3_blockThree_link<?= $x ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="under_cat_box3_blockThree_pic_adress<?= $x ?>"
                                                                                                   value="<?=$under_cat_box3_blockThree["pic_adress"]?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر اصلی"
                                                                                                   name="under_cat_box3_blockThree_pic_adress<?= $x ?>"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0px;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_box3_blockThree_pic_adress<?= $x ?>"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                            <span class="input-group-addon H_neshane1 H_under_cat_box3_blockThree<?= $x ?>"
                                                                                                  style="padding: 0px;">
                                                                                <div id="under_cat_box3_blockThree_pic_adress_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="under_cat_box3_blockThree_pic_adress_avatar7_link<?= $x ?>"
                                                                                   name="under_cat_box3_blockThree_pic_adress_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                                                  </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_under_cat_box3_blockThree_pic_adress<?= $x ?>"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class="input-group"
                                                                                             id="image_show_under_cat_box3_blockThree<?= $x ?>">
                                                                                            <a href="<?= $under_cat_box3_blockThree["pic_adress"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $under_cat_box3_blockThree["pic_adress"] ?>"
                                                                                                     alt="<?= $under_cat_box3_blockThree["text"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#under_cat_box3_blockThree_pic_adress_avatar7<?=$x?>').orakuploader({
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

                                                                                                $('#under_cat_box3_blockThree_pic_adress_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>
                                                                                    </div>
                                                                                    <div class="form-group col-md-11">

                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="under_cat_box3_blockThree_pic<?= $x ?>"
                                                                                                   value="<?=$under_cat_box3_blockThree["pic"]?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لوگو"
                                                                                                   name="under_cat_box3_blockThree_pic<?= $x ?>"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0px;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_box3_blockThree_pic<?= $x ?>"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                            <span class="input-group-addon H_neshane1 H_under_cat_box3_blockThree<?= $x ?>"
                                                                                                  style="padding: 0px;">
                                                                                <div id="under_cat_box3_blockThree_pic_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="under_cat_box3_blockThree_pic_avatar7_link<?= $x ?>"
                                                                                   name="under_cat_box3_blockThree_pic_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_under_cat_box3_blockThree_pic<?= $x ?>"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class="input-group col-md-1"
                                                                                             id="image_show_under_cat_box3_blockThree<?= $x ?>">
                                                                                            <a href="<?= $under_cat_box3_blockThree["pic"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $under_cat_box3_blockThree["pic"] ?>"
                                                                                                     alt="<?= $under_cat_box3_blockThree["text"] ?>">
                                                                                            </a>

                                                                                        </div>
                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#under_cat_box3_blockThree_pic_avatar7<?=$x?>').orakuploader({
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

                                                                                                $('#under_cat_box3_blockThree_pic_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>

                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="under_cat_box3_blockThree_title<?= $x ?>"
                                                                                                   value="<?=$under_cat_box3_blockThree["title"]?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر دوم"
                                                                                                   name="under_cat_box3_blockThree_title<?= $x ?>"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0px;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_box3_blockThree_title<?= $x ?>"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                            <span class="input-group-addon H_neshane1 H_under_cat_box3_blockThree<?= $x ?>"
                                                                                                  style="padding: 0px;">
                                                                                <div id="under_cat_box3_blockThree_title_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="under_cat_box3_blockThree_title_avatar7_link<?= $x ?>"
                                                                                   name="under_cat_box3_blockThree_title_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_under_cat_box3_blockThree_title<?= $x ?>"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class="input-group col-md-1"
                                                                                             id="image_show_under_cat_box3_blockThree<?= $x ?>">
                                                                                            <a href="<?= $under_cat_box3_blockThree["title"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $under_cat_box3_blockThree["title"] ?>"
                                                                                                     alt="<?= $under_cat_box3_blockThree["text"] ?>">
                                                                                            </a>

                                                                                        </div>
                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#under_cat_box3_blockThree_title_avatar7<?=$x?>').orakuploader({
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

                                                                                                $('#under_cat_box3_blockThree_title_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>
                                                                                    </div>
                                                                                    <div class="form-group col-md-11">
                                                                                        <textarea type="text" id="under_cat_box3_blockThree_text<?= $x ?>" class="form-control" placeholder="متن" name="under_cat_box3_blockThree_text<?= $x ?>"><?= $under_cat_box3_blockThree["text"] ?></textarea>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <?
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="under_cat_box3_blockThree_count"
                                                                               name="under_cat_box3_blockThree_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_under_cat_box3_blockThree-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_under_cat_box3_blockThree' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_under_cat_box3_blockThree" style="margin-bottom: 90px!important;" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-5 input-group"><input type="text" id="under_cat_box3_blockThree_link' + i + '" value="" class="form-control" placeholder="لینک " name="under_cat_box3_blockThree_link' + i + '" ></div><div class="col-md-6 input-group"> <input type="text" id="under_cat_box3_blockThree_pic_adress' + i + '" value="" class="form-control" placeholder=" تصویراصلی" name="under_cat_box3_blockThree_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_box3_blockThree_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_under_cat_box3_blockThree' + i + '" style="padding: 0px;"><div  id="under_cat_box3_blockThree_pic_adress_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="under_cat_box3_blockThree_pic_adress_avatar7_link' + i + '" name="under_cat_box3_blockThree_pic_adress_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_under_cat_box3_blockThree_pic_adress' + i + '" style="float:right;"></div></div><div class="form-group col-md-11"><div class="col-md-5 input-group"> <input type="text" id="under_cat_box3_blockThree_pic' + i + '" value="" class="form-control" placeholder=" لوگو" name="under_cat_box3_blockThree_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_box3_blockThree_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_under_cat_box3_blockThree' + i + '" style="padding: 0px;"><div  id="under_cat_box3_blockThree_pic_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="under_cat_box3_blockThree_pic_avatar7_link' + i + '" name="under_cat_box3_blockThree_pic_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_under_cat_box3_blockThree_pic' + i + '" style="float:right;"></div><div class="col-md-5 input-group"> <input type="text" id="under_cat_box3_blockThree_title' + i +'" value="" class="form-control" placeholder=" تصویر دوم" name="under_cat_box3_blockThree_title' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=under_cat_box3_blockThree_title' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_under_cat_box3_blockThree' + i + '" style="padding: 0px;"><div  id="under_cat_box3_blockThree_title_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="under_cat_box3_blockThree_title_avatar7_link' + i +'" name="under_cat_box3_blockThree_title_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_under_cat_box3_blockThree_title' + i +'" style="float:right;"></div></div><div class="form-group col-md-11"> <textarea type="text" id="under_cat_box3_blockThree_text'+ i +'" class="form-control" placeholder="متن" name="under_cat_box3_blockThree_text'+ i +'"></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_under_cat_box3_blockThree' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#under_cat_box3_blockThree_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#under_cat_box3_blockThree_pic_adress_avatar7' + i + '').orakuploader({
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

                                                                                    $('#under_cat_box3_blockThree_pic_adress_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_under_cat_box3_blockThree' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_under_cat_box3_blockThree' + i + '').find("div").first().next().find("div").first().css('float', 'right');

                                                                                    $('#under_cat_box3_blockThree_pic_avatar7' + i + '').orakuploader({
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

                                                                                    $('#under_cat_box3_blockThree_pic_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_under_cat_box3_blockThree' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_under_cat_box3_blockThree' + i + '').find("div").first().next().find("div").first().css('float', 'right');

                                                                                    $('#under_cat_box3_blockThree_title_avatar7' + i + '').orakuploader({
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

                                                                                    $('#under_cat_box3_blockThree_title_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_under_cat_box3_blockThree' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_under_cat_box3_blockThree' + i + '').find("div").first().next().find("div").first().css('float', 'right');

                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_under_cat_box3_blockThree', function () {
                                                                                    var id = '';
                                                                                    var k = $('#under_cat_box3_blockThree_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_under_cat_box3_blockThree' + id).remove();
                                                                                    $('#under_cat_box3_blockThree_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_under_cat_box3_blockThree-ads"><i
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
                                                
                                                <!-------------------light box------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $under_cat_title_LightBox = get_tem_result($site, $la, "under_cat_title_LightBox", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($under_cat_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="under_cat_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="under_cat_title_LightBox_title"
                                                                           value="<?= $under_cat_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_under_cat_LightBox = get_tem_result($site, $la, "ValSelectActive_under_cat_LightBox", 'Medirence2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_under_cat_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_under_cat_LightBox"
                                                                    name="select_type_under_cat_LightBox">

                                                                <option <? if ($ValSelectActive_under_cat_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_under_cat_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_under_cat_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_under_cat_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_under_cat_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_under_cat_LightBox under_cat_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_under_cat_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'first_choice_under_cat_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_under_cat_LightBox; $j++) {
                                                                                    $first_choice_under_cat_LightBox = get_tem_result($site, $la, "first_choice_under_cat_LightBox$j", 'Medirence2', $coms_conect);
                                                                                    if ($first_choice_under_cat_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_under_cat_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_under_cat_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_under_cat_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_under_cat_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_under_cat_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_under_cat_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_under_cat_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_under_cat_LightBox_cat"
                                                                                                                name="first_choice_under_cat_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_under_cat_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_under_cat_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_under_cat_LightBox_new&id=" + $("#first_choice_under_cat_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_under_cat_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_under_cat_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_under_cat_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_under_cat_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_under_cat_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_under_cat_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_under_cat_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_under_cat_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_under_cat_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_under_cat_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_under_cat_LightBox_count"
                                                                                       name="first_choice_under_cat_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_under_cat_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_under_cat_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_under_cat_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_under_cat_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_under_cat_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_under_cat_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_under_cat_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_under_cat_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_under_cat_LightBox_subcat_val' + i + '"  name="first_choice_under_cat_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_under_cat_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_under_cat_LightBox_cat" name="first_choice_under_cat_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_under_cat_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_under_cat_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_under_cat_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_under_cat_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_under_cat_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_under_cat_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_under_cat_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_under_cat_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_under_cat_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_under_cat_LightBox' + id).remove();
                                                                                            $('#first_choice_under_cat_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_under_cat_LightBox"><i
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

                                                            <div class="tab-pane opt_under_cat_LightBox under_cat_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_under_cat_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'second_choice_under_cat_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_under_cat_LightBox; $j++) {
                                                                                    $second_choice_under_cat_LightBox = get_tem_result($site, $la, "second_choice_under_cat_LightBox$j", 'Medirence2', $coms_conect);
                                                                                    if ($second_choice_under_cat_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_under_cat_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_under_cat_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_under_cat_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_under_cat_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_under_cat_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_under_cat_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_under_cat_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_under_cat_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_under_cat_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_under_cat_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_under_cat_LightBox_cat"
                                                                                                                name="second_choice_under_cat_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_under_cat_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_under_cat_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_under_cat_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_under_cat_LightBox&id=" + $("#second_choice_under_cat_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_under_cat_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_under_cat_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_under_cat_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_under_cat_LightBox_content&id=" + $("#second_choice_under_cat_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_under_cat_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_under_cat_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_under_cat_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_under_cat_LightBox_count"
                                                                                       name="second_choice_under_cat_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_under_cat_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_under_cat_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_under_cat_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_under_cat_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_under_cat_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_under_cat_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_under_cat_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_under_cat_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_under_cat_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_under_cat_LightBox_count").val();
                                                                                        //  $(".second_choice_under_cat_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_under_cat_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_under_cat_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_under_cat_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_under_cat_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_under_cat_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_under_cat_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_under_cat_LightBox_subcat_val' + i + '"  name="second_choice_under_cat_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_under_cat_LightBox_subcat_link' + i + '"  name="second_choice_under_cat_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_under_cat_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_under_cat_LightBox_cat" name="second_choice_under_cat_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_under_cat_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_under_cat_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_under_cat_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_under_cat_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_under_cat_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_under_cat_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_under_cat_LightBox' + id).remove();
                                                                                            $('#second_choice_under_cat_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_under_cat_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_under_cat_LightBox under_cat_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_under_cat_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'third_choice_under_cat_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_under_cat_LightBox; $x++) {
                                                                                    $third_choice_under_cat_LightBox = get_tem_result($site, $la, "third_choice_under_cat_LightBox$x", 'Medirence2', $coms_conect);

                                                                                    if ($third_choice_under_cat_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_under_cat_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_under_cat_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_under_cat_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_under_cat_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_under_cat_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_under_cat_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_under_cat_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_under_cat_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_under_cat_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_under_cat_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_under_cat_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_under_cat_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_under_cat_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_under_cat_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_under_cat_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_under_cat_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_under_cat_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_under_cat_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_under_cat_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_under_cat_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_under_cat_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_under_cat_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_under_cat_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_under_cat_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_under_cat_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_under_cat_LightBox_text<?= $x ?>"><?= $third_choice_under_cat_LightBox["text"] ?>

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
                                                                                       id="third_choice_under_cat_LightBox_count"
                                                                                       name="third_choice_under_cat_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_under_cat_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_under_cat_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_under_cat_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_under_cat_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_under_cat_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_under_cat_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_under_cat_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_under_cat_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_under_cat_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_under_cat_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_under_cat_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_under_cat_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_under_cat_LightBox_avatar7_link' + i + '" name="third_choice_under_cat_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_under_cat_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_under_cat_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_under_cat_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_under_cat_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_under_cat_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_under_cat_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_under_cat_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_under_cat_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_under_cat_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_under_cat_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_under_cat_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_under_cat_LightBox' + id).remove();
                                                                                            $('#third_choice_under_cat_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_under_cat_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_under_cat_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_under_cat_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_under_cat_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_under_cat_LightBox').hide();
                                                                        $('.under_cat_LightBox_option' + val).show();

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

        //----------under_cat---------------------
        $(".H_rename_under_cat_box1").click(function () {
            $(this).hide();
            $('.H_rename_under_cat_box1_save').show();
            $(".H_input_rename_under_cat_box1").toggle(300);
        });
        $(".H_rename_under_cat_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'under_cat_box1' + "&value=" + $(".H_input_rename_under_cat_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_under_cat_box1 > span.temp").text($(".H_input_rename_under_cat_box1").val());
            $(this).hide();
            $('.H_rename_under_cat_box1').show();
            $(".H_input_rename_under_cat_box1").hide();
            $(".H_rename_under_cat_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_under_cat_box2").click(function () {
            $(this).hide();
            $('.H_rename_under_cat_box2_save').show();
            $(".H_input_rename_under_cat_box2").toggle(300);
        });
        $(".H_rename_under_cat_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'under_cat_box2' + "&value=" + $(".H_input_rename_under_cat_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_under_cat_box2 > span.temp").text($(".H_input_rename_under_cat_box2").val());
            $(this).hide();
            $('.H_rename_under_cat_box2').show();
            $(".H_input_rename_under_cat_box2").hide();
            $(".H_rename_under_cat_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_under_cat_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_under_cat_title_box3_save').show();
            $(".H_input_rename_under_cat_title_box3").toggle(300);
        });
        $(".H_rename_under_cat_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'under_cat_title_box3' + "&value=" + $(".H_input_rename_under_cat_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_under_cat_title_box3 > span.temp").text($(".H_input_rename_under_cat_title_box3").val());
            $(this).hide();
            $('.H_rename_under_cat_title_box3').show();
            $(".H_input_rename_under_cat_title_box3").hide();
            $(".H_rename_under_cat_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_under_cat_title_box4").click(function () {
            $(this).hide();
            $('.H_rename_under_cat_title_box4_save').show();
            $(".H_input_rename_under_cat_title_box4").toggle(300);
        });
        $(".H_rename_under_cat_title_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'under_cat_title_box4' + "&value=" + $(".H_input_rename_under_cat_title_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_under_cat_title_box4 > span.temp").text($(".H_input_rename_under_cat_title_box4").val());
            $(this).hide();
            $('.H_rename_under_cat_title_box4').show();
            $(".H_input_rename_under_cat_title_box4").hide();
            $(".H_rename_under_cat_title_box4.H_pos_color").css('transform', 'translateY(-24px)');
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
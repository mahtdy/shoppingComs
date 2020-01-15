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



    ########################################################### adwords ########################################################

    $adwords_boxOne_pic_adress = 0;
    $adwords_boxOne_pic_adress= injection_replace($_POST["adwords_boxOne_pic_adress"]);
    $adwords_boxOne_pic = injection_replace($_POST["adwords_boxOne_pic"]);
    $adwords_boxOne_pic_avatar_orak = injection_replace($_POST["adwords_boxOne_pic_avatar_orak"][0]);
    if($adwords_boxOne_pic_avatar_orak>""){
        $adwords_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxOne_pic_avatar_orak;
    }
    insert_templdate($site, $adwords_boxOne_pic_adress, $la, '', '', '', $adwords_boxOne_pic, "adwords_boxOne", 'coms2', $coms_conect);

    $adwords_boxOne_btn_title= injection_replace($_POST["adwords_boxOne_btn_title"]);
    $adwords_boxOne_btn_link = injection_replace($_POST["adwords_boxOne_btn_link"]);
    $adwords_boxOne_btn_text = injection_replace($_POST["adwords_boxOne_btn_text"]);
    $adwords_boxOne_btn_pic = injection_replace($_POST["adwords_boxOne_btn_pic"]);
    insert_templdate($site, '', $la, $adwords_boxOne_btn_text, $adwords_boxOne_btn_title, $adwords_boxOne_btn_link, $adwords_boxOne_btn_pic, "adwords_boxOne_btn", 'coms2', $coms_conect);

    $condition_adwords_boxOne_con = "name like 'adwords_boxOne_con%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxOne_con, $coms_conect);
    $adwords_boxOne_con_count = injection_replace_pic($_POST["adwords_boxOne_con_count"]);
    for ($x = 1; $x <= $adwords_boxOne_con_count; $x++) {

        $adwords_boxOne_con_pic_adress = injection_replace_pic($_POST["adwords_boxOne_con_pic_adress{$x}"]);
        $adwords_boxOne_con_text = injection_replace_pic($_POST["adwords_boxOne_con_text{$x}"]);
        $adwords_boxOne_con_title = injection_replace_pic($_POST["adwords_boxOne_con_title{$x}"]);
        $adwords_boxOne_con_link = injection_replace_pic($_POST["adwords_boxOne_con_link{$x}"]);
        $adwords_boxOne_con_pic = injection_replace_pic($_POST["adwords_boxOne_con_pic{$x}"]);
        $adwords_boxOne_con_pic = resize_image_M($adwords_boxOne_con_pic,65,65,$img_page_main,'');
        $adwords_boxOne_con_avatar7 = injection_replace($_POST["adwords_boxOne_con_avatar7{$x}"][0]);
        if ($adwords_boxOne_con_avatar7 > "") {
            $adwords_boxOne_con_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxOne_con_avatar7;
            $adwords_boxOne_con_pic = resize_image_M($adwords_boxOne_con_pic,65,65,$img_page_main,'');

        }
        if ($adwords_boxOne_con_title > "") {
            insert_templdate($site, $adwords_boxOne_con_pic_adress, $la, $adwords_boxOne_con_text, $adwords_boxOne_con_title, $adwords_boxOne_con_link, $adwords_boxOne_con_pic, "adwords_boxOne_con$x", 'coms2', $coms_conect);
        }
    }
//    box2
    $adwords_boxTwo_pic_adress = 0;
    $adwords_boxTwo_pic_adress= injection_replace($_POST["adwords_boxTwo_pic_adress"]);
    $adwords_boxTwo_title= injection_replace($_POST["adwords_boxTwo_title"]);
    $adwords_boxTwo_link= injection_replace($_POST["adwords_boxTwo_link"]);
    $adwords_boxTwo_pic = injection_replace($_POST["adwords_boxTwo_pic"]);
    $adwords_boxTwo_pic = resize_image_M($adwords_boxTwo_pic,447,207,$img_page_main,'');
    $adwords_boxTwo_pic_avatar_orak = injection_replace($_POST["adwords_boxTwo_pic_avatar_orak"][0]);
    if($adwords_boxTwo_pic_avatar_orak>""){
        $adwords_boxTwo_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxTwo_pic_avatar_orak;
        $adwords_boxTwo_pic = resize_image_M($adwords_boxTwo_pic,447,207,$img_page_main,'');

    }
    insert_templdate($site, $adwords_boxTwo_pic_adress, $la, '', $adwords_boxTwo_title, $adwords_boxTwo_link, $adwords_boxTwo_pic, "adwords_boxTwo", 'coms2', $coms_conect);

    $condition_adwords_boxTwo_titr = "name like 'adwords_boxTwo_titr%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxTwo_titr, $coms_conect);
    $adwords_boxTwo_titr_count = injection_replace_pic($_POST["adwords_boxTwo_titr_count"]);
    for ($k = 1; $k <= $adwords_boxTwo_titr_count; $k++) {
        $adwords_boxTwo_titr_title = injection_replace_pic($_POST["adwords_boxTwo_titr_title{$k}"]);
        insert_templdate($site, '', $la, '', $adwords_boxTwo_titr_title, '', '', "adwords_boxTwo_titr$k", 'coms2', $coms_conect);
    }
//    box3
    $adwords_boxThree_pic_adress = 0;
    $adwords_boxThree_pic_adress= injection_replace($_POST["adwords_boxThree_pic_adress"]);
    $adwords_boxThree_title= injection_replace($_POST["adwords_boxThree_title"]);
    $adwords_boxThree_text= injection_replace($_POST["adwords_boxThree_text"]);
    $adwords_boxThree_pic = injection_replace($_POST["adwords_boxThree_pic"]);
    $adwords_boxThree_pic = resize_image_M($adwords_boxThree_pic,1450,460,$img_page_main,'');
    $adwords_boxThree_pic_avatar_orak = injection_replace($_POST["adwords_boxThree_pic_avatar_orak"][0]);
    if($adwords_boxThree_pic_avatar_orak>""){
        $adwords_boxThree_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxThree_pic_avatar_orak;
        $adwords_boxThree_pic = resize_image_M($adwords_boxThree_pic,1450,460,$img_page_main,'');

    }
    insert_templdate($site, $adwords_boxThree_pic_adress, $la, $adwords_boxThree_text, $adwords_boxThree_title, '', $adwords_boxThree_pic, "adwords_boxThree", 'coms2', $coms_conect);

    $condition_adwords_boxThree_con = "name like 'adwords_boxThree_con%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxThree_con, $coms_conect);
    $adwords_boxThree_con_count = injection_replace_pic($_POST["adwords_boxThree_con_count"]);
    for ($x = 1; $x <= $adwords_boxThree_con_count; $x++) {

        $adwords_boxThree_con_pic_adress = injection_replace_pic($_POST["adwords_boxThree_con_pic_adress{$x}"]);
        $adwords_boxThree_con_title = injection_replace_pic($_POST["adwords_boxThree_con_title{$x}"]);
        $adwords_boxThree_con_link = injection_replace_pic($_POST["adwords_boxThree_con_link{$x}"]);
        $adwords_boxThree_con_pic = injection_replace_pic($_POST["adwords_boxThree_con_pic{$x}"]);
        $adwords_boxThree_con_pic = resize_image_M($adwords_boxThree_con_pic,110,110,$img_page_main,'');
        $adwords_boxThree_con_avatar7 = injection_replace($_POST["adwords_boxThree_con_avatar7{$x}"][0]);
        if ($adwords_boxThree_con_avatar7 > "") {
            $adwords_boxThree_con_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxThree_con_avatar7;
            $adwords_boxThree_con_pic = resize_image_M($adwords_boxThree_con_pic,110,110,$img_page_main,'');

        }
        if ($adwords_boxThree_con_title > "") {
            insert_templdate($site, $adwords_boxThree_con_pic_adress, $la, '', $adwords_boxThree_con_title, $adwords_boxThree_con_link, $adwords_boxThree_con_pic, "adwords_boxThree_con$x", 'coms2', $coms_conect);
        }
    }
    //    box4
    $adwords_boxFour_pic_adress = 0;
    $adwords_boxFour_pic_adress= injection_replace($_POST["adwords_boxFour_pic_adress"]);
    $adwords_boxFour_title= injection_replace($_POST["adwords_boxFour_title"]);
    $adwords_boxFour_text= injection_replace($_POST["adwords_boxFour_text"]);
    insert_templdate($site, $adwords_boxFour_pic_adress, $la, $adwords_boxFour_text, $adwords_boxFour_title, '', '', "adwords_boxFour", 'coms2', $coms_conect);

    $adwords_boxFour_video_cat = injection_replace_pic($_POST["adwords_boxFour_video_cat"]);
    $box_only_video_subcat_cat = injection_replace_pic($_POST["box_only_video_subcat_cat"]);
    $box_only_video_subcat_cat_content = injection_replace_pic($_POST["box_only_video_subcat_cat_content"]);
    if($box_only_video_subcat_cat_content>0)
        insert_templdate($site, $box_only_video_subcat_cat_content, $la, '', '', $adwords_boxFour_video_cat, $box_only_video_subcat_cat, "adwords_boxFour_video", 'coms2', $coms_conect);

    $condition_adwords_boxFour_con = "name like 'adwords_boxFour_con%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxFour_con, $coms_conect);
    $adwords_boxFour_con_count = injection_replace_pic($_POST["adwords_boxFour_con_count"]);
    for ($x = 1; $x <= $adwords_boxFour_con_count; $x++) {

        $adwords_boxFour_con_pic_adress = injection_replace_pic($_POST["adwords_boxFour_con_pic_adress{$x}"]);
        $adwords_boxFour_con_text = injection_replace_pic($_POST["adwords_boxFour_con_text{$x}"]);
        $adwords_boxFour_con_title = injection_replace_pic($_POST["adwords_boxFour_con_title{$x}"]);
        $adwords_boxFour_con_link = injection_replace_pic($_POST["adwords_boxFour_con_link{$x}"]);
        $adwords_boxFour_con_pic = injection_replace_pic($_POST["adwords_boxFour_con_pic{$x}"]);
        $adwords_boxFour_con_pic = resize_image_M($adwords_boxFour_con_pic,32,32,$img_page_main,'');
        $adwords_boxFour_con_avatar7 = injection_replace($_POST["adwords_boxFour_con_avatar7{$x}"][0]);
        if ($adwords_boxFour_con_avatar7 > "") {
            $adwords_boxFour_con_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxFour_con_avatar7;
            $adwords_boxFour_con_pic = resize_image_M($adwords_boxFour_con_pic,32,32,$img_page_main,'');

        }
        if ($adwords_boxFour_con_title > "") {
            insert_templdate($site, $adwords_boxFour_con_pic_adress, $la, $adwords_boxFour_con_text, $adwords_boxFour_con_title, $adwords_boxFour_con_link, $adwords_boxFour_con_pic, "adwords_boxFour_con$x", 'coms2', $coms_conect);
        }
    }

    //    box5
    $adwords_boxFive_pic_adress = 0;
    $adwords_boxFive_pic_adress= injection_replace($_POST["adwords_boxFive_pic_adress"]);
    $adwords_boxFive_title= injection_replace($_POST["adwords_boxFive_title"]);
    $adwords_boxFive_text= injection_replace($_POST["adwords_boxFive_text"]);
    insert_templdate($site, $adwords_boxFive_pic_adress, $la, $adwords_boxFive_text, $adwords_boxFive_title, '', '', "adwords_boxFive", 'coms2', $coms_conect);

    $condition_adwords_boxFive_con = "name like 'adwords_boxFive_con%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxFive_con, $coms_conect);
    $adwords_boxFive_con_count = injection_replace_pic($_POST["adwords_boxFive_con_count"]);
    for ($x = 1; $x <= $adwords_boxFive_con_count; $x++) {
        $adwords_boxFive_con_title = injection_replace_pic($_POST["adwords_boxFive_con_title{$x}"]);
        $adwords_boxFive_con_link = injection_replace_pic($_POST["adwords_boxFive_con_link{$x}"]);
        $adwords_boxFive_con_pic = injection_replace_pic($_POST["adwords_boxFive_con_pic{$x}"]);
        $adwords_boxFive_con_pic = resize_image_M($adwords_boxFive_con_pic,370,155,'','');
        $adwords_boxFive_con_avatar7 = injection_replace($_POST["adwords_boxFive_con_avatar7{$x}"][0]);
        if ($adwords_boxFive_con_avatar7 > "") {
            $adwords_boxFive_con_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxFive_con_avatar7;
            $adwords_boxFive_con_pic = resize_image_M($adwords_boxFive_con_pic,370,155,'','');

        }
        if ($adwords_boxFive_con_title > "") {
            insert_templdate($site, $adwords_boxFive_con_pic, $la, '', $adwords_boxFive_con_title, $adwords_boxFive_con_link, '', "adwords_boxFive_con$x", 'coms2', $coms_conect);
        }
    }

    $ValSelectActive_adwords_boxFive_title = injection_replace($_POST["ValSelectActive_adwords_boxFive_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_adwords_boxFive_title, '', '', "ValSelectActive_adwords_boxFive", 'coms2', $coms_conect);

    $condition_first_choice_adwords_boxFive = "name like 'first_choice_adwords_boxFive%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_adwords_boxFive, $coms_conect);
    $first_choice_adwords_boxFive_count = injection_replace_pic($_POST["first_choice_adwords_boxFive_count"]);
    for ($i = 1; $i <= $first_choice_adwords_boxFive_count; $i++) {

        $first_choice_adwords_boxFive_cat = injection_replace_pic($_POST["first_choice_adwords_boxFive_cat{$i}"]);
        $first_choice_adwords_boxFive_subcat_cat = injection_replace_pic($_POST["first_choice_adwords_boxFive_subcat_cat{$i}"]);
        $first_choice_adwords_boxFive_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_adwords_boxFive_Fixed_selection_cat{$i}"]);
        $first_choice_adwords_boxFive_number = injection_replace_pic($_POST["first_choice_adwords_boxFive_number{$i}"]);
        if ($first_choice_adwords_boxFive_subcat_cat > "")
            insert_templdate($site, $first_choice_adwords_boxFive_number, $la, $first_choice_adwords_boxFive_Fixed_selection_cat, '', $first_choice_adwords_boxFive_cat, $first_choice_adwords_boxFive_subcat_cat, "first_choice_adwords_boxFive$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_adwords_boxFive = "name like 'second_choice_adwords_boxFive%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_adwords_boxFive, $coms_conect);
    $second_choice_adwords_boxFive_count = injection_replace_pic($_POST["second_choice_adwords_boxFive_count"]);
    for ($i = 1; $i <= $second_choice_adwords_boxFive_count; $i++) {

        $second_choice_adwords_boxFive_cat = injection_replace_pic($_POST["second_choice_adwords_boxFive_cat{$i}"]);
        $second_choice_adwords_boxFive_subcat_cat = injection_replace_pic($_POST["second_choice_adwords_boxFive_subcat_cat{$i}"]);
        $second_choice_adwords_boxFive_subcat_cat_content = injection_replace_pic($_POST["second_choice_adwords_boxFive_subcat_cat_content{$i}"]);
        if ($second_choice_adwords_boxFive_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_adwords_boxFive_subcat_cat_content, $la, '', '', $second_choice_adwords_boxFive_cat, $second_choice_adwords_boxFive_subcat_cat, "second_choice_adwords_boxFive$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_adwords_boxFive = "name like 'third_choice_adwords_boxFive%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_adwords_boxFive, $coms_conect);
    $third_choice_adwords_boxFive_count = injection_replace_pic($_POST["third_choice_adwords_boxFive_count"]);
    for ($x = 1; $x <= $third_choice_adwords_boxFive_count; $x++) {

        $third_choice_adwords_boxFive_title = injection_replace_pic($_POST["third_choice_adwords_boxFive_title{$x}"]);
        $third_choice_adwords_boxFive_link = injection_replace_pic($_POST["third_choice_adwords_boxFive_link{$x}"]);

        if ($third_choice_adwords_boxFive_title > "") {
            insert_templdate($site, '', $la, '', $third_choice_adwords_boxFive_title, $third_choice_adwords_boxFive_link, '', "third_choice_adwords_boxFive$x", 'coms2', $coms_conect);
        }
    }
    //    box6
    $adwords_boxSix_pic_adress = 0;
    $adwords_boxSix_pic_adress= injection_replace($_POST["adwords_boxSix_pic_adress"]);
    insert_templdate($site, $adwords_boxSix_pic_adress, $la, '', '', '', '', "adwords_boxSix", 'coms2', $coms_conect);

    $condition_adwords_boxSix_con = "name like 'adwords_boxSix_con%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxSix_con, $coms_conect);

    $adwords_boxSix_con_title = injection_replace_pic($_POST["adwords_boxSix_con_title"]);
    $adwords_boxSix_con_text = injection_replace_pic($_POST["adwords_boxSix_con_text"]);
    $adwords_boxSix_con_pic = injection_replace_pic($_POST["adwords_boxSix_con_pic"]);
    $adwords_boxSix_con_pic = resize_image_M($adwords_boxSix_con_pic,370,188,$img_page_main,'');
    $adwords_boxSix_con_avatar = injection_replace($_POST["adwords_boxSix_con_avatar"][0]);
    if($adwords_boxSix_con_avatar>""){
        $adwords_boxSix_con_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxSix_con_avatar;
        $adwords_boxSix_con_pic = resize_image_M($adwords_boxSix_con_pic,370,188,$img_page_main,'');

    }
    if ($adwords_boxSix_con_title >""){
        insert_templdate($site, $adwords_boxSix_con_pic, $la, $adwords_boxSix_con_text, $adwords_boxSix_con_title, '', '', "adwords_boxSix_con", 'coms2', $coms_conect);
    }

    $adwords_boxSix_btn_title= injection_replace($_POST["adwords_boxSix_btn_title"]);
    $adwords_boxSix_btn_link = injection_replace($_POST["adwords_boxSix_btn_link"]);
    $adwords_boxSix_btn_text = injection_replace($_POST["adwords_boxSix_btn_text"]);
    $adwords_boxSix_btn_pic = injection_replace($_POST["adwords_boxSix_btn_pic"]);
    insert_templdate($site, '', $la, $adwords_boxSix_btn_text, $adwords_boxSix_btn_title, $adwords_boxSix_btn_link, $adwords_boxSix_btn_pic, "adwords_boxSix_btn", 'coms2', $coms_conect);

    //    box7
    $adwords_boxSeven_pic_adress = 0;
    $adwords_boxSeven_pic_adress= injection_replace($_POST["adwords_boxSeven_pic_adress"]);
    $adwords_boxSeven_title= injection_replace($_POST["adwords_boxSeven_title"]);
    $adwords_boxSeven_text= injection_replace($_POST["adwords_boxSeven_text"]);
    $adwords_boxSeven_pic= injection_replace($_POST["adwords_boxSeven_pic"]);
    $adwords_boxSeven_link= injection_replace($_POST["adwords_boxSeven_link"]);
    insert_templdate($site, $adwords_boxSeven_pic_adress, $la, $adwords_boxSeven_text, $adwords_boxSeven_title, $adwords_boxSeven_link, $adwords_boxSeven_pic, "adwords_boxSeven", 'coms2', $coms_conect);

    $adwords_boxSeven_btn_title= injection_replace($_POST["adwords_boxSeven_btn_title"]);
    $adwords_boxSeven_btn_link = injection_replace($_POST["adwords_boxSeven_btn_link"]);

    $adwords_boxSeven_btn_pic_adress = injection_replace($_POST["adwords_boxSeven_btn_pic_adress"]);
    $adwords_boxSeven_btn_pic_adress = resize_image_M($adwords_boxSeven_btn_pic_adress,1350,1071,$img_page_main,'');

    $adwords_boxSeven_btn_pic_adress_avatar_orak = injection_replace($_POST["adwords_boxSeven_btn_pic_adress_avatar_orak"][0]);
    if($adwords_boxSeven_btn_pic_adress_avatar_orak>""){
        $adwords_boxSeven_btn_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxSeven_btn_pic_adress_avatar_orak;
        $adwords_boxSeven_btn_pic_adress = resize_image_M($adwords_boxSeven_btn_pic_adress,1350,1071,$img_page_main,'');

    }
    insert_templdate($site, $adwords_boxSeven_btn_pic_adress, $la, '', $adwords_boxSeven_btn_title, $adwords_boxSeven_btn_link, '', "adwords_boxSeven_btn", 'coms2', $coms_conect);

    $condition_adwords_boxSeven_con = "name like 'adwords_boxSeven_con%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxSeven_con, $coms_conect);

    $condition_adwords_boxSeven_con_titr = "name like 'adwords_boxSeven_con_titr%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxSeven_con_titr, $coms_conect);
    $adwords_boxSeven_con_count = injection_replace_pic($_POST["adwords_boxSeven_con_count"]);
    for ($x = 1; $x <= $adwords_boxSeven_con_count; $x++) {
        $adwords_boxSeven_con_title = injection_replace_pic($_POST["adwords_boxSeven_con_title{$x}"]);
        $adwords_boxSeven_con_link= injection_replace_pic($_POST["adwords_boxSeven_con_link{$x}"]);
        $adwords_boxSeven_con_text = injection_replace_pic($_POST["adwords_boxSeven_con_text{$x}"]);
        $adwords_boxSeven_con_pic = injection_replace_pic($_POST["adwords_boxSeven_con_pic{$x}"]);
        $adwords_boxSeven_con_pic_adress = injection_replace_pic($_POST["adwords_boxSeven_con_pic_adress{$x}"]);

        $adwords_boxSeven_con_titr_title = injection_replace_pic($_POST["adwords_boxSeven_con_titr_title{$x}"]);
        $adwords_boxSeven_con_titr_link= injection_replace_pic($_POST["adwords_boxSeven_con_titr_link{$x}"]);
        $adwords_boxSeven_con_titr_text = injection_replace_pic($_POST["adwords_boxSeven_con_titr_text{$x}"]);
        $adwords_boxSeven_con_titr_pic= injection_replace_pic($_POST["adwords_boxSeven_con_titr_pic{$x}"]);
        $adwords_boxSeven_con_titr_pic_adress= injection_replace_pic($_POST["adwords_boxSeven_con_titr_pic_adress{$x}"]);

        if ($adwords_boxSeven_con_title > "") {
            insert_templdate($site, $adwords_boxSeven_con_pic_adress, $la, $adwords_boxSeven_con_text, $adwords_boxSeven_con_title, $adwords_boxSeven_con_link, $adwords_boxSeven_con_pic, "adwords_boxSeven_con$x", 'coms2', $coms_conect);
            insert_templdate($site, $adwords_boxSeven_con_titr_pic_adress, $la, $adwords_boxSeven_con_titr_text, $adwords_boxSeven_con_titr_title, $adwords_boxSeven_con_titr_link, $adwords_boxSeven_con_titr_pic, "adwords_boxSeven_con_titr$x", 'coms2', $coms_conect);
        }
    }
//        tab2
    $condition_adwords_boxSeven_con2 = "name like 'adwords_boxSeven_con2%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxSeven_con2, $coms_conect);

    $condition_adwords_boxSeven_con2_titr = "name like 'adwords_boxSeven_con2_titr%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxSeven_con2_titr, $coms_conect);
    $adwords_boxSeven_con2_count = injection_replace_pic($_POST["adwords_boxSeven_con2_count"]);
    for ($x = 1; $x <= $adwords_boxSeven_con2_count; $x++) {
        $adwords_boxSeven_con2_title = injection_replace_pic($_POST["adwords_boxSeven_con2_title{$x}"]);
        $adwords_boxSeven_con2_link= injection_replace_pic($_POST["adwords_boxSeven_con2_link{$x}"]);
        $adwords_boxSeven_con2_text = injection_replace_pic($_POST["adwords_boxSeven_con2_text{$x}"]);
        $adwords_boxSeven_con2_pic = injection_replace_pic($_POST["adwords_boxSeven_con2_pic{$x}"]);
        $adwords_boxSeven_con2_pic_adress = injection_replace_pic($_POST["adwords_boxSeven_con2_pic_adress{$x}"]);

        $adwords_boxSeven_con2_titr_title = injection_replace_pic($_POST["adwords_boxSeven_con2_titr_title{$x}"]);
        $adwords_boxSeven_con2_titr_link= injection_replace_pic($_POST["adwords_boxSeven_con2_titr_link{$x}"]);
        $adwords_boxSeven_con2_titr_text = injection_replace_pic($_POST["adwords_boxSeven_con2_titr_text{$x}"]);
        $adwords_boxSeven_con2_titr_pic= injection_replace_pic($_POST["adwords_boxSeven_con2_titr_pic{$x}"]);
        $adwords_boxSeven_con2_titr_pic_adress= injection_replace_pic($_POST["adwords_boxSeven_con2_titr_pic_adress{$x}"]);

        if ($adwords_boxSeven_con2_title > "") {
            insert_templdate($site, $adwords_boxSeven_con2_pic_adress, $la, $adwords_boxSeven_con2_text, $adwords_boxSeven_con2_title, $adwords_boxSeven_con2_link, $adwords_boxSeven_con2_pic, "adwords_boxSeven_con2$x", 'coms2', $coms_conect);
            insert_templdate($site, $adwords_boxSeven_con2_titr_pic_adress, $la, $adwords_boxSeven_con2_titr_text, $adwords_boxSeven_con2_titr_title, $adwords_boxSeven_con2_titr_link, $adwords_boxSeven_con2_titr_pic, "adwords_boxSeven_con2_titr$x", 'coms2', $coms_conect);
        }
    }

    //    box8
    $adwords_boxEight_pic_adress = 0;
    $adwords_boxEight_pic_adress= injection_replace($_POST["adwords_boxEight_pic_adress"]);
    $adwords_boxEight_title= injection_replace($_POST["adwords_boxEight_title"]);
    $adwords_boxEight_text= injection_replace($_POST["adwords_boxEight_text"]);
    $adwords_boxEight_pic = injection_replace_pic($_POST["adwords_boxEight_pic"]);
    $adwords_boxEight_pic = resize_image_M($adwords_boxEight_pic,569,334,$img_page_main,'');
    $adwords_boxEight_pic_avatar_orak = injection_replace($_POST["adwords_boxEight_pic_avatar_orak"][0]);
    if($adwords_boxEight_pic_avatar_orak>""){
        $adwords_boxEight_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxEight_pic_avatar_orak;
        $adwords_boxEight_pic = resize_image_M($adwords_boxEight_pic,569,334,$img_page_main,'');
    }
    insert_templdate($site, $adwords_boxEight_pic_adress, $la, $adwords_boxEight_text, $adwords_boxEight_title, '', $adwords_boxEight_pic, "adwords_boxEight", 'coms2', $coms_conect);

    $condition_adwords_boxEight_con = "name like 'adwords_boxEight_con%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_adwords_boxEight_con, $coms_conect);
    $adwords_boxEight_con_count = injection_replace_pic($_POST["adwords_boxEight_con_count"]);
    for ($x = 1; $x <= $adwords_boxEight_con_count; $x++) {

        $adwords_boxEight_con_pic_adress = injection_replace_pic($_POST["adwords_boxEight_con_pic_adress{$x}"]);
        $adwords_boxEight_con_text = injection_replace_pic($_POST["adwords_boxEight_con_text{$x}"]);
        $adwords_boxEight_con_title = injection_replace_pic($_POST["adwords_boxEight_con_title{$x}"]);
        $adwords_boxEight_con_link = injection_replace_pic($_POST["adwords_boxEight_con_link{$x}"]);
        $adwords_boxEight_con_pic = injection_replace_pic($_POST["adwords_boxEight_con_pic{$x}"]);
        $adwords_boxEight_con_pic = resize_image_M($adwords_boxEight_con_pic,32,32,$img_page_main,'');
        $adwords_boxEight_con_avatar7 = injection_replace($_POST["adwords_boxEight_con_avatar7{$x}"][0]);
        if ($adwords_boxEight_con_avatar7 > "") {
            $adwords_boxEight_con_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_boxEight_con_avatar7;
            $adwords_boxEight_con_pic = resize_image_M($adwords_boxEight_con_pic,32,32,$img_page_main,'');

        }
        if ($adwords_boxEight_con_title > "") {
            insert_templdate($site, $adwords_boxEight_con_pic_adress, $la, $adwords_boxEight_con_text, $adwords_boxEight_con_title, $adwords_boxEight_con_link, $adwords_boxEight_con_pic, "adwords_boxEight_con$x", 'coms2', $coms_conect);
        }
    }
    //    box9
    $adwords_boxNine_pic_adress = 0;
    $adwords_boxNine_pic_adress= injection_replace($_POST["adwords_boxNine_pic_adress"]);
    $adwords_boxNine_title= injection_replace($_POST["adwords_boxNine_title"]);
    insert_templdate($site, $adwords_boxNine_pic_adress, $la, '', $adwords_boxNine_title, '', '', "adwords_boxNine", 'coms2', $coms_conect);

    $ValSelectActive_adwords_boxNine_title = injection_replace($_POST["ValSelectActive_adwords_boxNine_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_adwords_boxNine_title, '', '', "ValSelectActive_adwords_boxNine", 'coms2', $coms_conect);

    $condition_first_choice_adwords_boxNine = "name like 'first_choice_adwords_boxNine%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_adwords_boxNine, $coms_conect);
    $first_choice_adwords_boxNine_count = injection_replace_pic($_POST["first_choice_adwords_boxNine_count"]);
    for ($i = 1; $i <= $first_choice_adwords_boxNine_count; $i++) {

        $first_choice_adwords_boxNine_cat = injection_replace_pic($_POST["first_choice_adwords_boxNine_cat{$i}"]);
        $first_choice_adwords_boxNine_subcat_cat = injection_replace_pic($_POST["first_choice_adwords_boxNine_subcat_cat{$i}"]);
        $first_choice_adwords_boxNine_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_adwords_boxNine_Fixed_selection_cat{$i}"]);
        $first_choice_adwords_boxNine_number = injection_replace_pic($_POST["first_choice_adwords_boxNine_number{$i}"]);
        if ($first_choice_adwords_boxNine_subcat_cat > "")
            insert_templdate($site, $first_choice_adwords_boxNine_number, $la, $first_choice_adwords_boxNine_Fixed_selection_cat, '', $first_choice_adwords_boxNine_cat, $first_choice_adwords_boxNine_subcat_cat, "first_choice_adwords_boxNine$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_adwords_boxNine = "name like 'second_choice_adwords_boxNine%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_adwords_boxNine, $coms_conect);
    $second_choice_adwords_boxNine_count = injection_replace_pic($_POST["second_choice_adwords_boxNine_count"]);
    for ($i = 1; $i <= $second_choice_adwords_boxNine_count; $i++) {

        $second_choice_adwords_boxNine_cat = injection_replace_pic($_POST["second_choice_adwords_boxNine_cat{$i}"]);
        $second_choice_adwords_boxNine_subcat_cat = injection_replace_pic($_POST["second_choice_adwords_boxNine_subcat_cat{$i}"]);
        $second_choice_adwords_boxNine_subcat_cat_content = injection_replace_pic($_POST["second_choice_adwords_boxNine_subcat_cat_content{$i}"]);
        if ($second_choice_adwords_boxNine_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_adwords_boxNine_subcat_cat_content, $la, '', '', $second_choice_adwords_boxNine_cat, $second_choice_adwords_boxNine_subcat_cat, "second_choice_adwords_boxNine$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_adwords_boxNine = "name like 'third_choice_adwords_boxNine%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_adwords_boxNine, $coms_conect);
    $third_choice_adwords_boxNine_count = injection_replace_pic($_POST["third_choice_adwords_boxNine_count"]);
    for ($x = 1; $x <= $third_choice_adwords_boxNine_count; $x++) {


        $third_choice_adwords_boxNine_title = injection_replace_pic($_POST["third_choice_adwords_boxNine_title{$x}"]);
        $third_choice_adwords_boxNine_text = injection_replace_pic($_POST["third_choice_adwords_boxNine_text{$x}"]);

        $third_choice_adwords_boxNine_link = injection_replace_pic($_POST["third_choice_adwords_boxNine_link{$x}"]);
        $third_choice_adwords_boxNine_pic = injection_replace_pic($_POST["third_choice_adwords_boxNine_pic{$x}"]);
        $third_choice_adwords_boxNine_pic = resize_image_M($third_choice_adwords_boxNine_pic,370,163,$img_page_main,'');
        $third_choice_adwords_boxNine_avatar7 = injection_replace($_POST["third_choice_adwords_boxNine_avatar7{$x}"][0]);
        if ($third_choice_adwords_boxNine_avatar7 > "") {
            $third_choice_adwords_boxNine_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_adwords_boxNine_avatar7;
            $third_choice_adwords_boxNine_pic = resize_image_M($third_choice_adwords_boxNine_pic,370,163,$img_page_main,'');

        }
        if ($third_choice_adwords_boxNine_title > "") {
            insert_templdate($site, $third_choice_adwords_boxNine_pic, $la, $third_choice_adwords_boxNine_text, $third_choice_adwords_boxNine_title, $third_choice_adwords_boxNine_link, '', "third_choice_adwords_boxNine$x", 'coms2', $coms_conect);
        }
    }

    //   Light box
    $adwords_title_LightBox_pic_adress = 0;
    $adwords_title_LightBox_pic_adress= injection_replace($_POST["adwords_title_LightBox_pic_adress"]);
    $adwords_title_LightBox_title= injection_replace($_POST["adwords_title_LightBox_title"]);
    insert_templdate($site, $adwords_title_LightBox_pic_adress, $la, '', $adwords_title_LightBox_title, '', '', "adwords_title_LightBox", 'coms2', $coms_conect);

    $ValSelectActive_adwords_LightBox_title = injection_replace($_POST["ValSelectActive_adwords_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_adwords_LightBox_title, '', '', "ValSelectActive_adwords_LightBox", 'coms2', $coms_conect);

    $condition_first_choice_adwords_LightBox = "name like 'first_choice_adwords_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_adwords_LightBox, $coms_conect);
    $first_choice_adwords_LightBox_count = injection_replace_pic($_POST["first_choice_adwords_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_adwords_LightBox_count; $i++) {

        $first_choice_adwords_LightBox_cat = injection_replace_pic($_POST["first_choice_adwords_LightBox_cat{$i}"]);
        $first_choice_adwords_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_adwords_LightBox_subcat_cat{$i}"]);
        $first_choice_adwords_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_adwords_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_adwords_LightBox_number = injection_replace_pic($_POST["first_choice_adwords_LightBox_number{$i}"]);
        if ($first_choice_adwords_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_adwords_LightBox_number, $la, $first_choice_adwords_LightBox_Fixed_selection_cat, '', $first_choice_adwords_LightBox_cat, $first_choice_adwords_LightBox_subcat_cat, "first_choice_adwords_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_adwords_LightBox = "name like 'second_choice_adwords_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_adwords_LightBox, $coms_conect);
    $second_choice_adwords_LightBox_count = injection_replace_pic($_POST["second_choice_adwords_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_adwords_LightBox_count; $i++) {

        $second_choice_adwords_LightBox_cat = injection_replace_pic($_POST["second_choice_adwords_LightBox_cat{$i}"]);
        $second_choice_adwords_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_adwords_LightBox_subcat_cat{$i}"]);
        $second_choice_adwords_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_adwords_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_adwords_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_adwords_LightBox_subcat_cat_content, $la, '', '', $second_choice_adwords_LightBox_cat, $second_choice_adwords_LightBox_subcat_cat, "second_choice_adwords_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_adwords_LightBox = "name like 'third_choice_adwords_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_adwords_LightBox, $coms_conect);
    $third_choice_adwords_LightBox_count = injection_replace_pic($_POST["third_choice_adwords_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_adwords_LightBox_count; $x++) {

        $third_choice_adwords_LightBox_title = injection_replace_pic($_POST["third_choice_adwords_LightBox_title{$x}"]);
        $third_choice_adwords_LightBox_text = injection_replace_pic($_POST["third_choice_adwords_LightBox_text{$x}"]);
        $third_choice_adwords_LightBox_link = injection_replace_pic($_POST["third_choice_adwords_LightBox_link{$x}"]);
        $third_choice_adwords_LightBox_pic = injection_replace_pic($_POST["third_choice_adwords_LightBox_pic{$x}"]);
        $third_choice_adwords_LightBox_pic = resize_image_M($third_choice_adwords_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_adwords_LightBox_avatar7 = injection_replace($_POST["third_choice_adwords_LightBox_avatar7{$x}"][0]);
        if ($third_choice_adwords_LightBox_avatar7 > "") {
            $third_choice_adwords_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_adwords_LightBox_avatar7;
            $third_choice_adwords_LightBox_pic = resize_image_M($third_choice_adwords_LightBox_pic,58,43,$img_page_main,'');
        }
        if ($third_choice_adwords_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_adwords_LightBox_text, $third_choice_adwords_LightBox_title, $third_choice_adwords_LightBox_link, $third_choice_adwords_LightBox_pic, "third_choice_adwords_LightBox$x", 'coms2', $coms_conect);
        }
    }
//  header_seo
    $adwords_header_seo_keyword= injection_replace($_POST["adwords_header_seo_keyword"]);
    $adwords_header_seo_desciption= injection_replace($_POST["adwords_header_seo_desciption"]);
    $adwords_header_seo_pic= injection_replace($_POST["adwords_header_seo_pic"]);
    $adwords_header_seo_pic_adress = injection_replace($_POST["adwords_header_seo_pic_adress"]);
    $adwords_header_seo_pic_adress = resize_image_M($adwords_header_seo_pic_adress,20,20,$img_page_main,'');
    $adwords_header_seo_pic_adress_avatar_orak = injection_replace($_POST["adwords_header_seo_pic_adress_avatar_orak"][0]);
    if($adwords_header_seo_pic_adress_avatar_orak>""){
        $adwords_header_seo_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $adwords_header_seo_pic_adress_avatar_orak;
        $adwords_header_seo_pic_adress = resize_image_M($adwords_header_seo_pic_adress,20,20,$img_page_main,'');
    }
    insert_templdate($site, $adwords_header_seo_pic_adress, $la, $adwords_header_seo_desciption, $adwords_header_seo_keyword, '', $adwords_header_seo_pic, "adwords_header_seo", 'coms2', $coms_conect);
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
                                        <a class="z-link">adwords</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------adwords---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $adwords_box1 = get_tem_result($site, $la, "adwords_box1", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $adwords_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box1 H_dis_none"
                                                               name="adwords_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $adwords_box2 = get_tem_result($site, $la, "adwords_box2", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $adwords_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box2 H_dis_none"
                                                               name="adwords_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box3 = get_tem_result($site, $la, "adwords_box3", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box3" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box3 H_dis_none"
                                                               name="adwords_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box4 = get_tem_result($site, $la, "adwords_box4", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box4" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box4 H_dis_none"
                                                               name="adwords_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box5 = get_tem_result($site, $la, "adwords_box5", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box5" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box5 H_dis_none"
                                                               name="adwords_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box6 = get_tem_result($site, $la, "adwords_box6", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box6" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box6 H_dis_none"
                                                               name="adwords_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box7 = get_tem_result($site, $la, "adwords_box7", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box7" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box7['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box7 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box7_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box7 H_dis_none"
                                                               name="adwords_box7_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box8 = get_tem_result($site, $la, "adwords_box8", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box8" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box8['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box8 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box8_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box8 H_dis_none"
                                                               name="adwords_box8_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box9 = get_tem_result($site, $la, "adwords_box9", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box9" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box9['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box9 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box9_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box9 H_dis_none"
                                                               name="adwords_box9_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box10 = get_tem_result($site, $la, "adwords_box10", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box10" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box10['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box10 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box10_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box10 H_dis_none"
                                                               name="adwords_box10_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $adwords_box11 = get_tem_result($site, $la, "adwords_box11", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_adwords_box11" href="#"
                                                       class="list-group-item   text-center ">
                                                        <span class="temp"><?= $adwords_box11['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_adwords_box11 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_adwords_box11_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_adwords_box11 H_dis_none"
                                                               name="adwords_box11_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس اول»</h3><br>
                                                        <? $adwords_boxOne = get_tem_result($site, $la, "adwords_boxOne", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="adwords_boxOne_pic"

                                                                               value="<?= $adwords_boxOne["pic"] ?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="adwords_boxOne_pic"
                                                                               style="direction: ltr;">

                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxOne_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="adwords_boxOne_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_adwords_boxOne_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_adwords_boxOne_pic">
                                                                        <a href="<?= $adwords_boxOne["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $adwords_boxOne["pic"] ?>" alt="<?= $adwords_boxOne["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#adwords_boxOne_pic_avatar_orak').orakuploader({
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

                                                                            $('#adwords_boxOne_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- botton -->
                                                        <? $adwords_boxOne_btn = get_tem_result($site, $la, "adwords_boxOne_btn", 'coms2', $coms_conect); ?>
                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <div  class="seyed"
                                                                                  style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <label class="col-md-3 control-label" for="family">عنوان و لینک دکمه</label>
                                                                                    <div class="form-group col-md-9">

                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxOne_btn['title'] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="adwords_boxOne_btn_title">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxOne_btn["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="adwords_boxOne_btn_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">

                                                                            <div  class="seyed"
                                                                                  style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <label class="col-md-3 control-label" for="family">عنوان و لینک دکمه</label>
                                                                                    <div class="form-group col-md-9">

                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxOne_btn['text'] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="adwords_boxOne_btn_text">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxOne_btn["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="adwords_boxOne_btn_pic">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--End botton -->

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:4»</h5><br>
                                                        <h6 style="text-align: center;color: #585858; font-family: IRANSans">«در انتخاب آیکن یا عکس دقت شود که یکی باید انتخاب شود و دیگری خالی باشد.در صورتی که قصد انتخاب آیکن را دارید در مرحله اول بعداز زدن دکمه «افزودن» همه موارد به غیر از آیکن و عکس را پر کرده دکمه ذخیره را بزنید.بعد از لود مجدد صفحه می توانید آیکن مورد نظر خود را انتخاب کنید!»</h6><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_adwords_boxOne_con = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'adwords_boxOne_con%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_adwords_boxOne_con; $x++) {
                                                                            $adwords_boxOne_con = get_tem_result($site, $la, "adwords_boxOne_con$x", 'coms2', $coms_conect);
                                                                            if ($adwords_boxOne_con['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_adwords_boxOne_con<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_adwords_boxOne_con"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxOne_con_title<?= $x ?>"
                                                                                                       value="<?= $adwords_boxOne_con["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="adwords_boxOne_con_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxOne_con_link<?= $x ?>"
                                                                                                       value="<?= $adwords_boxOne_con["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="adwords_boxOne_con_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxOne_con_pic<?= $x ?>"
                                                                                                       value="<?=$adwords_boxOne_con["pic"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="adwords_boxOne_con_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxOne_con_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_adwords_boxOne_con<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="adwords_boxOne_con_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="adwords_boxOne_con_avatar7_link<?= $x ?>"
                                                                                   name="adwords_boxOne_con_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_adwords_boxOne_con<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <?if($adwords_boxOne_con["pic"]!=""){?>
                                                                                                <div class="input-group" style="display: inline-table;"
                                                                                                     id="image_show_adwords_boxOne_con<?= $x ?>">
                                                                                                    <a href="<?= $adwords_boxOne_con["pic"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $adwords_boxOne_con["pic"] ?>"
                                                                                                             alt="<?= $adwords_boxOne_con["text"] ?>">
                                                                                                    </a>

                                                                                                </div>
                                                                                            <?}?>
                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#adwords_boxOne_con_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#adwords_boxOne_con_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                            <div class="col-md-1 input-group">
                                                                                                <button class="btn btn-default form-control" name="adwords_boxOne_con_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$adwords_boxOne_con['pic_adress']?>" role="iconpicker" ></button>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                        <textarea type="text"
                                                                                                  id="adwords_boxOne_con_text<?= $x ?>"
                                                                                                  class="form-control"
                                                                                                  placeholder="عنوان دوم"
                                                                                                  name="adwords_boxOne_con_text<?= $x ?>"><?= $adwords_boxOne_con["text"] ?>

                                                                                        </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="adwords_boxOne_con_count"
                                                                               name="adwords_boxOne_con_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_adwords_boxOne_con-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_adwords_boxOne_con' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_adwords_boxOne_con" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="adwords_boxOne_con_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="adwords_boxOne_con_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="adwords_boxOne_con_link' + i + '" value="" class="form-control" placeholder="لینک" name="adwords_boxOne_con_link' + i + '" ></div><div class="col-md-3 input-group"> <input type="text" id="adwords_boxOne_con_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="adwords_boxOne_con_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxOne_con_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_adwords_boxOne_con' + i + '" style="padding: 0px;"><div  id="adwords_boxOne_con_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="adwords_boxOne_con_avatar7_link' + i + '" name="adwords_boxOne_con_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_adwords_boxOne_con' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control iconpicker" name="adwords_boxOne_con_pic_adress'+ i +'" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ><i class="fa fa-nonicon"></i><input type="hidden" name="main_header_pic'+ i +'" value="fa-nonicon"><span class="caret"></span></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="adwords_boxOne_con_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="adwords_boxOne_con_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_adwords_boxOne_con' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#adwords_boxOne_con_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#adwords_boxOne_con_avatar7' + i + '').orakuploader({
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

                                                                                    $('#adwords_boxOne_con_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_adwords_boxOne_con' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_adwords_boxOne_con' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_adwords_boxOne_con', function () {
                                                                                    var id = '';
                                                                                    var k = $('#adwords_boxOne_con_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_adwords_boxOne_con' + id).remove();
                                                                                    $('#adwords_boxOne_con_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_adwords_boxOne_con-ads"><i
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


                                                <!-------------------box2------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس دوم»</h3><br>
                                                        <? $adwords_boxTwo = get_tem_result($site, $la, "adwords_boxTwo", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxTwo_title"
                                                                           value="<?= $adwords_boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">لینک عنوان</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxTwo_link"
                                                                           value="<?= $adwords_boxTwo['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر زمینه(png) </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="adwords_boxTwo_pic"
                                                                               value="<?=$adwords_boxTwo['pic']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="adwords_boxTwo_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxTwo_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="adwords_boxTwo_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_adwords_boxTwo_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_adwords_boxTwo_pic">
                                                                        <a href="<?= $adwords_boxTwo["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $adwords_boxTwo["pic"] ?>" alt="<?= $adwords_boxTwo["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#adwords_boxTwo_pic_avatar_orak').orakuploader({
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

                                                                            $('#adwords_boxTwo_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <label class="col-md-3 control-label" for="family">تیتر ها </label>
                                                        <br>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <br>
                                                                        <div class="col-md-12">
                                                                            <? $countadwords_boxTwo_titr = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'adwords_boxTwo_titr%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $countadwords_boxTwo_titr; $k++) {
                                                                                $adwords_boxTwo_titr = get_tem_result($site, $la, "adwords_boxTwo_titr$k", 'coms2', $coms_conect);
                                                                                if ($adwords_boxTwo_titr['title'] > "") {
                                                                                    ?>
                                                                                    <div id="ads_adwords_boxTwo_titr<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_adwords_boxTwo_titr"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">تیتر<?= $k ?></label>
                                                                                            <div class="form-group col-md-9">

                                                                                                <div class="col-md-12 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxTwo_titr_title<?= $k ?>"
                                                                                                           value="<?= $adwords_boxTwo_titr["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="جمله مورد نظر"
                                                                                                           name="adwords_boxTwo_titr_title<?= $k ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_adwords_boxTwo_titr1 = $k;
                                                                            ?>
                                                                            <input type="hidden" id="adwords_boxTwo_titr_count"
                                                                                   name="adwords_boxTwo_titr_count"
                                                                                   value="<?= --$count_adwords_boxTwo_titr1 ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_adwords_boxTwo_titr').on("click", function () {
                                                                                        var someText = '<div id="ads_adwords_boxTwo_titr' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_adwords_boxTwo_titr" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">تیتر#' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-12 input-group"><input type="text" id="adwords_boxTwo_titr_title' + i + '" value="" class="form-control" placeholder="جمله مورد نظر" name="adwords_boxTwo_titr_title' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_adwords_boxTwo_titr' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#adwords_boxTwo_titr_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_adwords_boxTwo_titr', function () {
                                                                                        var id = '';
                                                                                        var p = $('#adwords_boxTwo_titr_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_adwords_boxTwo_titr' + id).remove();
                                                                                        $('#adwords_boxTwo_titr_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_adwords_boxTwo_titr"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </div>

                                                <!-------------------box3------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس سوم»</h3><br>
                                                        <? $adwords_boxThree = get_tem_result($site, $la, "adwords_boxThree", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxThree['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxThree_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxThree_title"
                                                                           value="<?= $adwords_boxThree['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxThree_text"
                                                                           value="<?= $adwords_boxThree['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر زمینه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="adwords_boxThree_pic"
                                                                               value="<?=$adwords_boxThree['pic']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="adwords_boxThree_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxThree_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="adwords_boxThree_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_adwords_boxThree_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_adwords_boxThree_pic">
                                                                        <a href="<?= $adwords_boxThree["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $adwords_boxThree["pic"] ?>" alt="<?= $adwords_boxThree["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#adwords_boxThree_pic_avatar_orak').orakuploader({
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

                                                                            $('#adwords_boxThree_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h6 style="text-align: center;color: #585858; font-family: IRANSans">«در انتخاب آیکن یا عکس دقت شود که یکی باید انتخاب شود و دیگری خالی باشد.در صورتی که قصد انتخاب آیکن را دارید در مرحله اول بعداز زدن دکمه «افزودن» همه موارد به غیر از آیکن و عکس را پر کرده دکمه ذخیره را بزنید.بعد از لود مجدد صفحه می توانید آیکن مورد نظر خود را انتخاب کنید!»</h6><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_adwords_boxThree_con = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'adwords_boxThree_con%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_adwords_boxThree_con; $x++) {
                                                                            $adwords_boxThree_con = get_tem_result($site, $la, "adwords_boxThree_con$x", 'coms2', $coms_conect);
                                                                            if ($adwords_boxThree_con['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_adwords_boxThree_con<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_adwords_boxThree_con"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxThree_con_title<?= $x ?>"
                                                                                                       value="<?= $adwords_boxThree_con["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="adwords_boxThree_con_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxThree_con_link<?= $x ?>"
                                                                                                       value="<?= $adwords_boxThree_con["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="adwords_boxThree_con_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxThree_con_pic<?= $x ?>"
                                                                                                       value="<?=$adwords_boxThree_con["pic"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="adwords_boxThree_con_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxThree_con_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_adwords_boxThree_con<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="adwords_boxThree_con_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="adwords_boxThree_con_avatar7_link<?= $x ?>"
                                                                                   name="adwords_boxThree_con_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_adwords_boxThree_con<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <?if($adwords_boxThree_con["pic"]!=""){?>
                                                                                                <div class="input-group" style="display: inline-table;"
                                                                                                     id="image_show_adwords_boxThree_con<?= $x ?>">
                                                                                                    <a href="<?= $adwords_boxThree_con["pic"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $adwords_boxThree_con["pic"] ?>"
                                                                                                             alt="<?= $adwords_boxThree_con["text"] ?>">
                                                                                                    </a>

                                                                                                </div>
                                                                                            <?}?>
                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#adwords_boxThree_con_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#adwords_boxThree_con_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                            <div class="col-md-1 input-group">
                                                                                                <button class="btn btn-default form-control" name="adwords_boxThree_con_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$adwords_boxThree_con['pic_adress']?>" role="iconpicker" ></button>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="adwords_boxThree_con_count"
                                                                               name="adwords_boxThree_con_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_adwords_boxThree_con-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_adwords_boxThree_con' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_adwords_boxThree_con" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="adwords_boxThree_con_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="adwords_boxThree_con_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="adwords_boxThree_con_link' + i + '" value="" class="form-control" placeholder="لینک" name="adwords_boxThree_con_link' + i + '" ></div><div class="col-md-3 input-group"> <input type="text" id="adwords_boxThree_con_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="adwords_boxThree_con_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxThree_con_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_adwords_boxThree_con' + i + '" style="padding: 0px;"><div  id="adwords_boxThree_con_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="adwords_boxThree_con_avatar7_link' + i + '" name="adwords_boxThree_con_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_adwords_boxThree_con' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control iconpicker" name="adwords_boxThree_con_pic_adress'+ i +'" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ><i class="fa fa-nonicon"></i><input type="hidden" name="main_header_pic'+ i +'" value="fa-nonicon"><span class="caret"></span></button></div></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_adwords_boxThree_con' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#adwords_boxThree_con_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#adwords_boxThree_con_avatar7' + i + '').orakuploader({
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

                                                                                    $('#adwords_boxThree_con_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_adwords_boxThree_con' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_adwords_boxThree_con' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_adwords_boxThree_con', function () {
                                                                                    var id = '';
                                                                                    var k = $('#adwords_boxThree_con_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_adwords_boxThree_con' + id).remove();
                                                                                    $('#adwords_boxThree_con_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_adwords_boxThree_con-ads"><i
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


                                                <!-------------------box4------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس چهارم»</h3><br>
                                                        <? $adwords_boxFour = get_tem_result($site, $la, "adwords_boxFour", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxFour['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxFour_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«انتخاب فقط ویدیو »</h5><br>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <?$adwords_boxFour_video = get_tem_result($site, $la, "adwords_boxFour_video", 'coms2', $coms_conect); ?>
                                                                            <div id="div_mother_second_choicedel_adwords_boxFour_video" class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class=" H_adwords_boxFour_video col-md-3 input-group">
                                                                                            <input type="hidden"
                                                                                                   id="adwords_boxFour_video_subcat_val"
                                                                                                   name="adwords_boxFour_video_subcat_val"
                                                                                                   value="<?= $adwords_boxFour_video['pic'] ?>">
                                                                                            <input type="hidden"
                                                                                                   id="adwords_boxFour_video_subcat_link"
                                                                                                   name="adwords_boxFour_video_subcat_link"
                                                                                                   value="<?= $adwords_boxFour_video['pic_adress'] ?>">

                                                                                            <select id="adwords_boxFour_video_cat"
                                                                                                    data-selectid=""
                                                                                                    class="form-control H_adwords_boxFour_video_cat"
                                                                                                    name="adwords_boxFour_video_cat">
                                                                                                <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                echo "<option value='0'>انتخاب کنید</option>";
                                                                                                while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                    $str = '';

                                                                                                    if ($row0['id'] == $adwords_boxFour_video['link'])

                                                                                                        $str = 'selected';
                                                                                                    echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div id="adwords_boxFour_video"
                                                                                             class="col-md-3 input-group">
                                                                                        </div>

                                                                                        <div id="adwords_boxFour_video_content"
                                                                                             class="col-md-6 input-group">
                                                                                        </div>

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=box_only_video&id=" + $("#adwords_boxFour_video_cat").val() + "&value=" + $("#adwords_boxFour_video_subcat_val").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                    success: function (result) {
                                                                                                        $('#adwords_boxFour_video').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                            $(document).ready(function () {
                                                                                                //   alert( $("#adwords_boxFour_video_subcat_link").val());
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=box_only_video_content&id=" + $("#adwords_boxFour_video_subcat_val").val() + "&value=" + $("#adwords_boxFour_video_subcat_link").val() + "&secend_value=" + $("#adwords_boxFour_video_subcat_link").val()+ "&field_nmae=" + '<?=$la?>',
                                                                                                    success: function (result) {
                                                                                                        $('#adwords_boxFour_video_content').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <script>
                                                                                $(document).on('change', '.H_adwords_boxFour_video_cat', function () {
                                                                                    var thisElement = $(this).parents('.H_adwords_boxFour_video').next();

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=box_only_video&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                        success: function (result) {
                                                                                            thisElement.empty();
                                                                                            thisElement.append(result);
                                                                                        }
                                                                                    });
                                                                                });

                                                                                $(".adwords_boxFour_video_neshane").change(function () {

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=box_only_video&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                        success: function (result) {
                                                                                            $('#adwords_boxFour_video').html(result);
                                                                                        }
                                                                                    });
                                                                                });
                                                                                $(document).on('change', '.box_only_video_neshane', function () {

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=box_only_video_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                        success: function (result) {
                                                                                            $('#adwords_boxFour_video_content').html(result);
                                                                                        }
                                                                                    });
                                                                                });
                                                                            </script>

                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxFour_title"
                                                                           value="<?= $adwords_boxFour['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxFour_text"
                                                                           value="<?= $adwords_boxFour['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:4 »</h5><br>
                                                        <h6 style="text-align: center;color: #585858; font-family: IRANSans">«در انتخاب آیکن یا عکس دقت شود که یکی باید انتخاب شود و دیگری خالی باشد.در صورتی که قصد انتخاب آیکن را دارید در مرحله اول بعداز زدن دکمه «افزودن» همه موارد به غیر از آیکن و عکس را پر کرده دکمه ذخیره را بزنید.بعد از لود مجدد صفحه می توانید آیکن مورد نظر خود را انتخاب کنید!»</h6><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_adwords_boxFour_con = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'adwords_boxFour_con%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_adwords_boxFour_con; $x++) {
                                                                            $adwords_boxFour_con = get_tem_result($site, $la, "adwords_boxFour_con$x", 'coms2', $coms_conect);
                                                                            if ($adwords_boxFour_con['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_adwords_boxFour_con<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_adwords_boxFour_con"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxFour_con_title<?= $x ?>"
                                                                                                       value="<?= $adwords_boxFour_con["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="adwords_boxFour_con_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxFour_con_link<?= $x ?>"
                                                                                                       value="<?= $adwords_boxFour_con["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="adwords_boxFour_con_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxFour_con_pic<?= $x ?>"
                                                                                                       value="<?=$adwords_boxFour_con["pic"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="adwords_boxFour_con_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxFour_con_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_adwords_boxFour_con<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="adwords_boxFour_con_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="adwords_boxFour_con_avatar7_link<?= $x ?>"
                                                                                   name="adwords_boxFour_con_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_adwords_boxFour_con<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <?if($adwords_boxFour_con["pic"]!=""){?>
                                                                                                <div class="input-group" style="display: inline-table;"
                                                                                                     id="image_show_adwords_boxFour_con<?= $x ?>">
                                                                                                    <a href="<?= $adwords_boxFour_con["pic"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $adwords_boxFour_con["pic"] ?>"
                                                                                                             alt="<?= $adwords_boxFour_con["text"] ?>">
                                                                                                    </a>

                                                                                                </div>
                                                                                            <?}?>
                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#adwords_boxFour_con_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#adwords_boxFour_con_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                            <div class="col-md-1 input-group">
                                                                                                <button class="btn btn-default form-control" name="adwords_boxFour_con_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$adwords_boxFour_con['pic_adress']?>" role="iconpicker" ></button>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                        <textarea type="text"
                                                                                                  id="adwords_boxFour_con_text<?= $x ?>"
                                                                                                  class="form-control"
                                                                                                  placeholder="عنوان دوم"
                                                                                                  name="adwords_boxFour_con_text<?= $x ?>"><?= $adwords_boxFour_con["text"] ?>

                                                                                        </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="adwords_boxFour_con_count"
                                                                               name="adwords_boxFour_con_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_adwords_boxFour_con-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_adwords_boxFour_con' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_adwords_boxFour_con" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="adwords_boxFour_con_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="adwords_boxFour_con_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="adwords_boxFour_con_link' + i + '" value="" class="form-control" placeholder="لینک" name="adwords_boxFour_con_link' + i + '" ></div><div class="col-md-3 input-group"> <input type="text" id="adwords_boxFour_con_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="adwords_boxFour_con_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxFour_con_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_adwords_boxFour_con' + i + '" style="padding: 0px;"><div  id="adwords_boxFour_con_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="adwords_boxFour_con_avatar7_link' + i + '" name="adwords_boxFour_con_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_adwords_boxFour_con' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control iconpicker" name="adwords_boxFour_con_pic_adress'+ i +'" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ><i class="fa fa-nonicon"></i><input type="hidden" name="main_header_pic'+ i +'" value="fa-nonicon"><span class="caret"></span></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="adwords_boxFour_con_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="adwords_boxFour_con_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_adwords_boxFour_con' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#adwords_boxFour_con_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#adwords_boxFour_con_avatar7' + i + '').orakuploader({
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

                                                                                    $('#adwords_boxFour_con_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_adwords_boxFour_con' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_adwords_boxFour_con' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_adwords_boxFour_con', function () {
                                                                                    var id = '';
                                                                                    var k = $('#adwords_boxFour_con_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_adwords_boxFour_con' + id).remove();
                                                                                    $('#adwords_boxFour_con_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_adwords_boxFour_con-ads"><i
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
                                                <!-------------------box5------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس پنجم»</h3><br>
                                                        <? $adwords_boxFive = get_tem_result($site, $la, "adwords_boxFive", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxFive['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxFive_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxFive_title"
                                                                           value="<?= $adwords_boxFive['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxFive_text"
                                                                           value="<?= $adwords_boxFive['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <label class="col-md-3 control-label" for="family">تعداد مورد نیاز : 2</label>
                                                        <br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <?$count_adwords_boxFive_con = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'adwords_boxFive_con%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_adwords_boxFive_con; $x++) {
                                                                            $adwords_boxFive_con = get_tem_result($site, $la, "adwords_boxFive_con$x", 'coms2', $coms_conect);
                                                                            if ($adwords_boxFive_con['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_adwords_boxFive_con<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_adwords_boxFive_con"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxFive_con_title<?= $x ?>"
                                                                                                       value="<?= $adwords_boxFive_con["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="adwords_boxFive_con_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxFive_con_link<?= $x ?>"
                                                                                                       value="<?= $adwords_boxFive_con["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="adwords_boxFive_con_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxFive_con_pic<?= $x ?>"
                                                                                                       value="<?=$adwords_boxFive_con["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="adwords_boxFive_con_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxFive_con_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_adwords_boxFive_con<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="adwords_boxFive_con_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="adwords_boxFive_con_avatar7_link<?= $x ?>"
                                                                                   name="adwords_boxFive_con_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_adwords_boxFive_con<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group"
                                                                                                 id="image_show_adwords_boxFive_con<?= $x ?>">

                                                                                                <a href="<?= $adwords_boxFive_con["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $adwords_boxFive_con["pic_adress"] ?>"
                                                                                                         alt="<?= $adwords_boxFive_con["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#adwords_boxFive_con_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#adwords_boxFive_con_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="adwords_boxFive_con_count"
                                                                               name="adwords_boxFive_con_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_adwords_boxFive_con-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_adwords_boxFive_con' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_adwords_boxFive_con" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="adwords_boxFive_con_title' + i + '" value="" class="form-control" placeholder="عنوان" name="adwords_boxFive_con_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="adwords_boxFive_con_link' + i + '" value="" class="form-control" placeholder="لینک" name="adwords_boxFive_con_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="adwords_boxFive_con_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="adwords_boxFive_con_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxFive_con_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_adwords_boxFive_con' + i + '" style="padding: 0px;"><div  id="adwords_boxFive_con_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="adwords_boxFive_con_avatar7_link' + i + '" name="adwords_boxFive_con_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_adwords_boxFive_con' + i + '" style="float:right;"></div></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_adwords_boxFive_con' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#adwords_boxFive_con_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#adwords_boxFive_con_avatar7' + i + '').orakuploader({
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

                                                                                    $('#adwords_boxFive_con_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_adwords_boxFive_con' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_adwords_boxFive_con' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_adwords_boxFive_con', function () {
                                                                                    var id = '';
                                                                                    var k = $('#adwords_boxFive_con_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_adwords_boxFive_con' + id).remove();
                                                                                    $('#adwords_boxFive_con_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_adwords_boxFive_con-ads"><i
                                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                    class="fa fa-plus"></i>افزودن
                                                                            لینک</a>
                                                                        </br>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        <label class="col-md-3 control-label" for="family">انتخاب 5 مورد از محتوا</label>
                                                        <br>
                                                        <? $ValSelectActive_adwords_boxFive = get_tem_result($site, $la, "ValSelectActive_adwords_boxFive", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_adwords_boxFive"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_adwords_boxFive"
                                                                    name="select_type_adwords_boxFive">

                                                                <option <? if ($ValSelectActive_adwords_boxFive["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_adwords_boxFive["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_adwords_boxFive["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_adwords_boxFive_title" type="hidden"
                                                                   value="<?= $ValSelectActive_adwords_boxFive["title"] ?>">

                                                            <div class="tab-pane opt_adwords_boxFive adwords_boxFive_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_adwords_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_adwords_boxFive%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_adwords_boxFive; $j++) {
                                                                                    $first_choice_adwords_boxFive = get_tem_result($site, $la, "first_choice_adwords_boxFive$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_adwords_boxFive['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_adwords_boxFive<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_adwords_boxFive"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_adwords_boxFive col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_adwords_boxFive_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_adwords_boxFive_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_adwords_boxFive['pic'] ?>">

                                                                                                        <select id="first_choice_adwords_boxFive_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_adwords_boxFive_cat"
                                                                                                                name="first_choice_adwords_boxFive_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_adwords_boxFive['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_adwords_boxFive<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_adwords_boxFive_new&id=" + $("#first_choice_adwords_boxFive_cat<?=$j?>").val() + "&value=" + $("#first_choice_adwords_boxFive_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_adwords_boxFive<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_adwords_boxFive_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_adwords_boxFive_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_boxFive['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_boxFive['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_boxFive['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_adwords_boxFive_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_adwords_boxFive["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_adwords_boxFive_number<?= $j ?>">
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
                                                                                       id="first_choice_adwords_boxFive_count"
                                                                                       name="first_choice_adwords_boxFive_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_adwords_boxFive_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_adwords_boxFive').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_adwords_boxFive_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_adwords_boxFive<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_adwords_boxFive').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_adwords_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_adwords_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_adwords_boxFive col-md-4 input-group"><input type="hidden" id="first_choice_adwords_boxFive_subcat_val' + i + '"  name="first_choice_adwords_boxFive_subcat_val' + i + '" value=""> <select id="first_choice_adwords_boxFive_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_adwords_boxFive_cat" name="first_choice_adwords_boxFive_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_adwords_boxFive' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_adwords_boxFive_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_adwords_boxFive_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_adwords_boxFive_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_adwords_boxFive_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_adwords_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_adwords_boxFive_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_adwords_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_adwords_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_adwords_boxFive' + id).remove();
                                                                                            $('#first_choice_adwords_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_adwords_boxFive"><i
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

                                                            <div class="tab-pane opt_adwords_boxFive adwords_boxFive_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_adwords_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_adwords_boxFive%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_adwords_boxFive; $j++) {
                                                                                    $second_choice_adwords_boxFive = get_tem_result($site, $la, "second_choice_adwords_boxFive$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_adwords_boxFive['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_adwords_boxFive<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_adwords_boxFive"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_adwords_boxFive col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_adwords_boxFive_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_adwords_boxFive_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_adwords_boxFive['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_adwords_boxFive_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_adwords_boxFive_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_adwords_boxFive['pic_adress'] ?>">

                                                                                                        <select id="second_choice_adwords_boxFive_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_adwords_boxFive_cat"
                                                                                                                name="second_choice_adwords_boxFive_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_adwords_boxFive['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_adwords_boxFive<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_adwords_boxFive_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_adwords_boxFive&id=" + $("#second_choice_adwords_boxFive_cat<?=$j?>").val() + "&value=" + $("#second_choice_adwords_boxFive_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_adwords_boxFive<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_adwords_boxFive_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_adwords_boxFive_content&id=" + $("#second_choice_adwords_boxFive_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_adwords_boxFive_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_adwords_boxFive_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_adwords_boxFive_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_adwords_boxFive_count"
                                                                                       name="second_choice_adwords_boxFive_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_adwords_boxFive_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_adwords_boxFive').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_boxFive&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_adwords_boxFive<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_adwords_boxFive_neshane").change(function () {
                                                                                        var j = $("#second_choice_adwords_boxFive_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_boxFive&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_adwords_boxFive' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_adwords_boxFive_neshane', function () {
                                                                                        var j = $("#second_choice_adwords_boxFive_count").val();
                                                                                        //  $(".second_choice_adwords_boxFive_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_boxFive_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_adwords_boxFive_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_adwords_boxFive').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_adwords_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_adwords_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_adwords_boxFive col-md-3 input-group"><input type="hidden" id="second_choice_adwords_boxFive_subcat_val' + i + '"  name="second_choice_adwords_boxFive_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_adwords_boxFive_subcat_link' + i + '"  name="second_choice_adwords_boxFive_subcat_link' + i + '" value=""> <select id="second_choice_adwords_boxFive_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_adwords_boxFive_cat" name="second_choice_adwords_boxFive_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_adwords_boxFive' + i + '" class="col-md-3 input-group"></div><div id="second_choice_adwords_boxFive_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_adwords_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_adwords_boxFive_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_adwords_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_adwords_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_adwords_boxFive' + id).remove();
                                                                                            $('#second_choice_adwords_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_adwords_boxFive"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_adwords_boxFive adwords_boxFive_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_adwords_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_adwords_boxFive%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_adwords_boxFive; $x++) {
                                                                                    $third_choice_adwords_boxFive = get_tem_result($site, $la, "third_choice_adwords_boxFive$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_adwords_boxFive['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_adwords_boxFive<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_adwords_boxFive"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-6 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_adwords_boxFive_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_adwords_boxFive["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_adwords_boxFive_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-6 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_adwords_boxFive_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_adwords_boxFive["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_adwords_boxFive_link<?= $x ?>">
                                                                                                    </div>

                                                                                                </div>

                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $xcount_mahsol = $x;
                                                                                ?>
                                                                                <input type="hidden"
                                                                                       id="third_choice_adwords_boxFive_count"
                                                                                       name="third_choice_adwords_boxFive_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_adwords_boxFive-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_adwords_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_adwords_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="third_choice_adwords_boxFive_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_adwords_boxFive_title' + i + '" ></div> <div class="col-md-6 input-group"><input type="text" id="third_choice_adwords_boxFive_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_adwords_boxFive_link' + i + '" ></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_adwords_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_adwords_boxFive_count').val(i);


                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_adwords_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_adwords_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_adwords_boxFive' + id).remove();
                                                                                            $('#third_choice_adwords_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_adwords_boxFive-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_adwords_boxFive_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_adwords_boxFive"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_adwords_boxFive_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_adwords_boxFive').hide();
                                                                        $('.adwords_boxFive_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------box6------------------->


                                                <div  id="content6" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس ششم»</h3><br>
                                                        <? $adwords_boxSix = get_tem_result($site, $la, "adwords_boxSix", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxSix['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxSix_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $adwords_boxSix_con = get_tem_result($site, $la, "adwords_boxSix_con", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_box7" class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="form-group col-md-12">

                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="adwords_boxSix_con_title"
                                                                                                   value="<?= $adwords_boxSix_con["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان"
                                                                                                   name="adwords_boxSix_con_title">
                                                                                        </div>

                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="adwords_boxSix_con_pic"
                                                                                                   value="<?=$adwords_boxSix_con["pic_adress"]?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="تصویر"
                                                                                                   name="adwords_boxSix_con_pic"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxSix_con_pic"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                                            <span class="input-group-addon H_neshane1 H_adwords_boxSix_con"
                                                                                                  style="padding: 0;">
                                                                                <div  id="adwords_boxSix_con_avatar" orakuploader="on"></div>
                                                                            </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box" id="upload_type_adwords_boxSix_con"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class="input-group" id="image_show_adwords_boxSix_con">
                                                                                            <a href="<?= $adwords_boxSix_con["pic_adress"] ?>" class=" without-caption" >
                                                                                                <img width="33" height="33" class="H_cursor_zoom" src="<?= $adwords_boxSix_con["pic_adress"] ?>" alt="<?= $adwords_boxSix_con["text"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#adwords_boxSix_con_avatar').orakuploader({
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

                                                                                                $('#adwords_boxSix_con_avatar').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>
                                                                                    </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <textarea type="text"
                                                                                                  id="adwords_boxSix_con_text"
                                                                                                  class="form-control"
                                                                                                  placeholder="متن"
                                                                                                  name="adwords_boxSix_con_text"><?= $adwords_boxSix_con["text"] ?>

                                                                                        </textarea>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- botton -->
                                                        <? $adwords_boxSix_btn = get_tem_result($site, $la, "adwords_boxSix_btn", 'coms2', $coms_conect); ?>
                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <div  class="seyed"
                                                                                  style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <label class="col-md-3 control-label" for="family">عنوان و لینک دکمه</label>
                                                                                    <div class="form-group col-md-9">

                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxSix_btn['title'] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="adwords_boxSix_btn_title">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxSix_btn["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="adwords_boxSix_btn_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">

                                                                            <div  class="seyed"
                                                                                  style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <label class="col-md-3 control-label" for="family">عنوان و لینک دکمه</label>
                                                                                    <div class="form-group col-md-9">

                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxSix_btn['text'] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="adwords_boxSix_btn_text">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxSix_btn["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="adwords_boxSix_btn_pic">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--End botton -->
                                                    </center>
                                                </div>
                                                <!-------------------box7------------------->

                                                <div  id="content7" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس هفتم»</h3><br>
                                                        <? $adwords_boxSeven = get_tem_result($site, $la, "adwords_boxSeven", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxSeven['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxSeven_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxSeven_title"
                                                                           value="<?= $adwords_boxSeven['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxSeven_text"
                                                                           value="<?= $adwords_boxSeven['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- botton -->
                                                        <? $adwords_boxSeven_btn = get_tem_result($site, $la, "adwords_boxSeven_btn", 'coms2', $coms_conect); ?>
                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <div  class="seyed"
                                                                                  style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <label class="col-md-3 control-label" for="family">عنوان تب ها</label>
                                                                                    <div class="form-group col-md-9">

                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxSeven_btn['title'] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان تب اول"
                                                                                                   name="adwords_boxSeven_btn_title">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxSeven_btn["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان تب دوم"
                                                                                                   name="adwords_boxSeven_btn_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--End botton -->
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="adwords_boxSeven_btn_pic_adress"
                                                                               value="<?=$adwords_boxSeven_btn['pic_adress']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="adwords_boxSeven_btn_pic_adress"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxSeven_btn_pic_adress"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="adwords_boxSeven_btn_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_adwords_boxSeven_btn_pic_adress"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_adwords_boxSeven_btn_pic_adress">
                                                                        <a href="<?= $adwords_boxSeven_btn["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $adwords_boxSeven_btn["pic_adress"] ?>" alt="<?= $adwords_boxSeven['title'] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#adwords_boxSeven_btn_pic_adress_avatar_orak').orakuploader({
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

                                                                            $('#adwords_boxSeven_btn_pic_adress_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <div  class="seyed"
                                                                                  style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <label class="col-md-3 control-label" for="family">متن و لینک </label>
                                                                                    <div class="form-group col-md-9">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxSeven['pic'] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان"
                                                                                                   name="adwords_boxSeven_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   value="<?= $adwords_boxSeven["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک "
                                                                                                   name="adwords_boxSeven_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«محتوای تب اول»</h3><br>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body"
                                                                     style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_adwords_boxSeven_con = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'adwords_boxSeven_con%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_adwords_boxSeven_con; $x++) {
                                                                                $adwords_boxSeven_con = get_tem_result($site, $la, "adwords_boxSeven_con$x", 'coms2', $coms_conect);
                                                                                $adwords_boxSeven_con_titr = get_tem_result($site, $la, "adwords_boxSeven_con_titr$x", 'coms2', $coms_conect);
                                                                                if ($adwords_boxSeven_con['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_adwords_boxSeven_con<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_adwords_boxSeven_con" style="margin-bottom: 170px!important"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>
                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_title<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوانی برای ویژه بودن"
                                                                                                           name="adwords_boxSeven_con_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_link<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="مبلغ اول"
                                                                                                           name="adwords_boxSeven_con_link<?= $x ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_text<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="مبلغ دوم"
                                                                                                           name="adwords_boxSeven_con_text<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_pic<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con["pic"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="سفارش دهید"
                                                                                                           name="adwords_boxSeven_con_pic<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_pic_adress<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con["pic_adress"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک دکمه سفارش دهید"
                                                                                                           name="adwords_boxSeven_con_pic_adress<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_titr_title<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con_titr["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر اول"
                                                                                                           name="adwords_boxSeven_con_titr_title<?= $x ?>">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_titr_pic_adress<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con_titr["pic_adress"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر دوم"
                                                                                                           name="adwords_boxSeven_con_titr_pic_adress<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_titr_pic<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con_titr["pic"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر سوم"
                                                                                                           name="adwords_boxSeven_con_titr_pic<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_titr_link<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con_titr["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر چهارم"
                                                                                                           name="adwords_boxSeven_con_titr_link<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con_titr_text<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con_titr["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر پنجم"
                                                                                                           name="adwords_boxSeven_con_titr_text<?= $x ?>">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $xcount_mahsol = $x;
                                                                            ?>
                                                                            <input type="hidden"
                                                                                   id="adwords_boxSeven_con_count"
                                                                                   name="adwords_boxSeven_con_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_adwords_boxSeven_con-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_adwords_boxSeven_con' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_adwords_boxSeven_con" id="' + i + '" for="family" style="margin-bottom: 170px!important"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_title' + i + '" value="" class="form-control" placeholder="عنوانی برای ویژه بودن" name="adwords_boxSeven_con_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_link' + i + '" value="" class="form-control" placeholder="مبلغ اول" name="adwords_boxSeven_con_link' + i + '" ></div></div> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_text' + i + '" value="" class="form-control" placeholder="مبلغ دوم" name="adwords_boxSeven_con_text' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_pic' + i + '" value="" class="form-control" placeholder="سفارش دهید" name="adwords_boxSeven_con_pic' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_pic_adress' + i + '" value="" class="form-control" placeholder="لینک دکمه سفارش دهید" name="adwords_boxSeven_con_pic_adress' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_titr_title' + i +'" value="" class="form-control" placeholder="عنوان تیتر اول" name="adwords_boxSeven_con_titr_title' + i +'" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_titr_pic_adress' + i + '" value="" class="form-control" placeholder="عنوان تیتر دوم" name="adwords_boxSeven_con_titr_pic_adress' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_titr_pic' + i + '" value="" class="form-control" placeholder="عنوان تیتر سوم" name="adwords_boxSeven_con_titr_pic' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_titr_link' + i + '" value="" class="form-control" placeholder="عنوان تیتر چهارم" name="adwords_boxSeven_con_titr_link' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con_titr_text' + i + '" value="" class="form-control" placeholder="عنوان تیتر پنجم" name="adwords_boxSeven_con_titr_text' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_adwords_boxSeven_con' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#adwords_boxSeven_con_count').val(i);

                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_adwords_boxSeven_con', function () {
                                                                                        var id = '';
                                                                                        var k = $('#adwords_boxSeven_con_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_adwords_boxSeven_con' + id).remove();
                                                                                        $('#adwords_boxSeven_con_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_adwords_boxSeven_con-ads"><i
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
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«محتوای تب دوم»</h3><br>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body"
                                                                     style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_adwords_boxSeven_con2 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'adwords_boxSeven_con2%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_adwords_boxSeven_con2; $x++) {
                                                                                $adwords_boxSeven_con2 = get_tem_result($site, $la, "adwords_boxSeven_con2$x", 'coms2', $coms_conect);
                                                                                $adwords_boxSeven_con2_titr = get_tem_result($site, $la, "adwords_boxSeven_con2_titr$x", 'coms2', $coms_conect);
                                                                                if ($adwords_boxSeven_con2['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_adwords_boxSeven_con2<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_adwords_boxSeven_con2" style="margin-bottom: 170px!important"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>
                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_title<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوانی برای ویژه بودن"
                                                                                                           name="adwords_boxSeven_con2_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_link<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="مبلغ اول"
                                                                                                           name="adwords_boxSeven_con2_link<?= $x ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_text<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="مبلغ دوم"
                                                                                                           name="adwords_boxSeven_con2_text<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_pic<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2["pic"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="سفارش دهید"
                                                                                                           name="adwords_boxSeven_con2_pic<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_pic_adress<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2["pic_adress"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک دکمه سفارش دهید"
                                                                                                           name="adwords_boxSeven_con2_pic_adress<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_titr_title<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2_titr["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر اول"
                                                                                                           name="adwords_boxSeven_con2_titr_title<?= $x ?>">
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_titr_pic_adress<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2_titr["pic_adress"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر دوم"
                                                                                                           name="adwords_boxSeven_con2_titr_pic_adress<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_titr_pic<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2_titr["pic"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر سوم"
                                                                                                           name="adwords_boxSeven_con2_titr_pic<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_titr_link<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2_titr["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر چهارم"
                                                                                                           name="adwords_boxSeven_con2_titr_link<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="adwords_boxSeven_con2_titr_text<?= $x ?>"
                                                                                                           value="<?= $adwords_boxSeven_con2_titr["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان تیتر پنجم"
                                                                                                           name="adwords_boxSeven_con2_titr_text<?= $x ?>">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $xcount_mahsol = $x;
                                                                            ?>
                                                                            <input type="hidden"
                                                                                   id="adwords_boxSeven_con2_count"
                                                                                   name="adwords_boxSeven_con2_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_adwords_boxSeven_con2-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_adwords_boxSeven_con2' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_adwords_boxSeven_con2" id="' + i + '" for="family" style="margin-bottom: 170px!important"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_title' + i + '" value="" class="form-control" placeholder="عنوانی برای ویژه بودن" name="adwords_boxSeven_con2_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_link' + i + '" value="" class="form-control" placeholder="مبلغ اول" name="adwords_boxSeven_con2_link' + i + '" ></div></div> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_text' + i + '" value="" class="form-control" placeholder="مبلغ دوم" name="adwords_boxSeven_con2_text' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_pic' + i + '" value="" class="form-control" placeholder="سفارش دهید" name="adwords_boxSeven_con2_pic' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_pic_adress' + i + '" value="" class="form-control" placeholder="لینک دکمه سفارش دهید" name="adwords_boxSeven_con2_pic_adress' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_titr_title' + i +'" value="" class="form-control" placeholder="عنوان تیتر اول" name="adwords_boxSeven_con2_titr_title' + i +'" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_titr_pic_adress' + i + '" value="" class="form-control" placeholder="عنوان تیتر دوم" name="adwords_boxSeven_con2_titr_pic_adress' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_titr_pic' + i + '" value="" class="form-control" placeholder="عنوان تیتر سوم" name="adwords_boxSeven_con2_titr_pic' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_titr_link' + i + '" value="" class="form-control" placeholder="عنوان تیتر چهارم" name="adwords_boxSeven_con2_titr_link' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="adwords_boxSeven_con2_titr_text' + i + '" value="" class="form-control" placeholder="عنوان تیتر پنجم" name="adwords_boxSeven_con2_titr_text' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_adwords_boxSeven_con2' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#adwords_boxSeven_con2_count').val(i);

                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_adwords_boxSeven_con2', function () {
                                                                                        var id = '';
                                                                                        var k = $('#adwords_boxSeven_con2_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_adwords_boxSeven_con2' + id).remove();
                                                                                        $('#adwords_boxSeven_con2_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_adwords_boxSeven_con2-ads"><i
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
                                                    </center>
                                                </div>

                                                <!-------------------box8------------------->

                                                <div  id="content8" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس هشتم»</h3><br>
                                                        <? $adwords_boxEight = get_tem_result($site, $la, "adwords_boxEight", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxEight['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxEight_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">انتخاب تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="adwords_boxEight_pic"
                                                                               value="<?=$adwords_boxEight['pic']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="adwords_boxEight_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxEight_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="adwords_boxEight_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_adwords_boxEight_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_adwords_boxEight_pic">
                                                                        <a href="<?= $adwords_boxEight["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $adwords_boxEight["pic"] ?>" alt="<?= $adwords_boxEight['title'] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#adwords_boxEight_pic_avatar_orak').orakuploader({
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

                                                                            $('#adwords_boxEight_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxEight_title"
                                                                           value="<?= $adwords_boxEight['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxEight_text"
                                                                           value="<?= $adwords_boxEight['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:4 »</h5><br>
                                                        <h6 style="text-align: center;color: #585858; font-family: IRANSans">«در انتخاب آیکن یا عکس دقت شود که یکی باید انتخاب شود و دیگری خالی باشد.در صورتی که قصد انتخاب آیکن را دارید در مرحله اول بعداز زدن دکمه «افزودن» همه موارد به غیر از آیکن و عکس را پر کرده دکمه ذخیره را بزنید.بعد از لود مجدد صفحه می توانید آیکن مورد نظر خود را انتخاب کنید!»</h6><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_adwords_boxEight_con = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'adwords_boxEight_con%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_adwords_boxEight_con; $x++) {
                                                                            $adwords_boxEight_con = get_tem_result($site, $la, "adwords_boxEight_con$x", 'coms2', $coms_conect);
                                                                            if ($adwords_boxEight_con['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_adwords_boxEight_con<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_adwords_boxEight_con"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxEight_con_title<?= $x ?>"
                                                                                                       value="<?= $adwords_boxEight_con["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="adwords_boxEight_con_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxEight_con_link<?= $x ?>"
                                                                                                       value="<?= $adwords_boxEight_con["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="adwords_boxEight_con_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="adwords_boxEight_con_pic<?= $x ?>"
                                                                                                       value="<?=$adwords_boxEight_con["pic"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="adwords_boxEight_con_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxEight_con_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_adwords_boxEight_con<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="adwords_boxEight_con_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="adwords_boxEight_con_avatar7_link<?= $x ?>"
                                                                                   name="adwords_boxEight_con_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_adwords_boxEight_con<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <?if($adwords_boxEight_con["pic"]!=""){?>
                                                                                                <div class="input-group" style="display: inline-table;"
                                                                                                     id="image_show_adwords_boxEight_con<?= $x ?>">
                                                                                                    <a href="<?= $adwords_boxEight_con["pic"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $adwords_boxEight_con["pic"] ?>"
                                                                                                             alt="<?= $adwords_boxEight_con["text"] ?>">
                                                                                                    </a>

                                                                                                </div>
                                                                                            <?}?>
                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#adwords_boxEight_con_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#adwords_boxEight_con_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                            <div class="col-md-1 input-group">
                                                                                                <button class="btn btn-default form-control" name="adwords_boxEight_con_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$adwords_boxEight_con['pic_adress']?>" role="iconpicker" ></button>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                        <textarea type="text"
                                                                                                  id="adwords_boxEight_con_text<?= $x ?>"
                                                                                                  class="form-control"
                                                                                                  placeholder="عنوان دوم"
                                                                                                  name="adwords_boxEight_con_text<?= $x ?>"><?= $adwords_boxEight_con["text"] ?>

                                                                                        </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="adwords_boxEight_con_count"
                                                                               name="adwords_boxEight_con_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_adwords_boxEight_con-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_adwords_boxEight_con' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_adwords_boxEight_con" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="adwords_boxEight_con_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="adwords_boxEight_con_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="adwords_boxEight_con_link' + i + '" value="" class="form-control" placeholder="لینک" name="adwords_boxEight_con_link' + i + '" ></div><div class="col-md-3 input-group"> <input type="text" id="adwords_boxEight_con_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="adwords_boxEight_con_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=adwords_boxEight_con_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_adwords_boxEight_con' + i + '" style="padding: 0px;"><div  id="adwords_boxEight_con_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="adwords_boxEight_con_avatar7_link' + i + '" name="adwords_boxEight_con_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_adwords_boxEight_con' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control iconpicker" name="adwords_boxEight_con_pic_adress'+ i +'" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ><i class="fa fa-nonicon"></i><input type="hidden" name="main_header_pic'+ i +'" value="fa-nonicon"><span class="caret"></span></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="adwords_boxEight_con_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="adwords_boxEight_con_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_adwords_boxEight_con' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#adwords_boxEight_con_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#adwords_boxEight_con_avatar7' + i + '').orakuploader({
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

                                                                                    $('#adwords_boxEight_con_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_adwords_boxEight_con' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_adwords_boxEight_con' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_adwords_boxEight_con', function () {
                                                                                    var id = '';
                                                                                    var k = $('#adwords_boxEight_con_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_adwords_boxEight_con' + id).remove();
                                                                                    $('#adwords_boxEight_con_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_adwords_boxEight_con-ads"><i
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


                                                <!-------------------box9------------------->
                                                <div  id="content9" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«باکس نهم(تعداد :3)»</h3><br>
                                                        <? $adwords_boxNine = get_tem_result($site, $la, "adwords_boxNine", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_boxNine['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_boxNine_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_boxNine_title"
                                                                           value="<?= $adwords_boxNine['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <? $ValSelectActive_adwords_boxNine = get_tem_result($site, $la, "ValSelectActive_adwords_boxNine", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_adwords_boxNine"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_adwords_boxNine"
                                                                    name="select_type_adwords_boxNine">

                                                                <option <? if ($ValSelectActive_adwords_boxNine["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_adwords_boxNine["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_adwords_boxNine["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_adwords_boxNine_title" type="hidden"
                                                                   value="<?= $ValSelectActive_adwords_boxNine["title"] ?>">

                                                            <div class="tab-pane opt_adwords_boxNine adwords_boxNine_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_adwords_boxNine = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_adwords_boxNine%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_adwords_boxNine; $j++) {
                                                                                    $first_choice_adwords_boxNine = get_tem_result($site, $la, "first_choice_adwords_boxNine$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_adwords_boxNine['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_adwords_boxNine<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_adwords_boxNine"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_adwords_boxNine col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_adwords_boxNine_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_adwords_boxNine_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_adwords_boxNine['pic'] ?>">

                                                                                                        <select id="first_choice_adwords_boxNine_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_adwords_boxNine_cat"
                                                                                                                name="first_choice_adwords_boxNine_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_adwords_boxNine['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_adwords_boxNine<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_adwords_boxNine_new&id=" + $("#first_choice_adwords_boxNine_cat<?=$j?>").val() + "&value=" + $("#first_choice_adwords_boxNine_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_adwords_boxNine<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_adwords_boxNine_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_adwords_boxNine_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_boxNine['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_boxNine['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_boxNine['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_adwords_boxNine_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_adwords_boxNine["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_adwords_boxNine_number<?= $j ?>">
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
                                                                                       id="first_choice_adwords_boxNine_count"
                                                                                       name="first_choice_adwords_boxNine_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_adwords_boxNine_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_adwords_boxNine').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_adwords_boxNine_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_adwords_boxNine<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_adwords_boxNine').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_adwords_boxNine' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_adwords_boxNine" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_adwords_boxNine col-md-4 input-group"><input type="hidden" id="first_choice_adwords_boxNine_subcat_val' + i + '"  name="first_choice_adwords_boxNine_subcat_val' + i + '" value=""> <select id="first_choice_adwords_boxNine_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_adwords_boxNine_cat" name="first_choice_adwords_boxNine_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_adwords_boxNine' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_adwords_boxNine_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_adwords_boxNine_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_adwords_boxNine_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_adwords_boxNine_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_adwords_boxNine' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_adwords_boxNine_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_adwords_boxNine', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_adwords_boxNine_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_adwords_boxNine' + id).remove();
                                                                                            $('#first_choice_adwords_boxNine_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_adwords_boxNine"><i
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

                                                            <div class="tab-pane opt_adwords_boxNine adwords_boxNine_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_adwords_boxNine = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_adwords_boxNine%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_adwords_boxNine; $j++) {
                                                                                    $second_choice_adwords_boxNine = get_tem_result($site, $la, "second_choice_adwords_boxNine$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_adwords_boxNine['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_adwords_boxNine<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_adwords_boxNine"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_adwords_boxNine col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_adwords_boxNine_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_adwords_boxNine_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_adwords_boxNine['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_adwords_boxNine_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_adwords_boxNine_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_adwords_boxNine['pic_adress'] ?>">

                                                                                                        <select id="second_choice_adwords_boxNine_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_adwords_boxNine_cat"
                                                                                                                name="second_choice_adwords_boxNine_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_adwords_boxNine['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_adwords_boxNine<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_adwords_boxNine_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_adwords_boxNine&id=" + $("#second_choice_adwords_boxNine_cat<?=$j?>").val() + "&value=" + $("#second_choice_adwords_boxNine_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_adwords_boxNine<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_adwords_boxNine_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_adwords_boxNine_content&id=" + $("#second_choice_adwords_boxNine_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_adwords_boxNine_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_adwords_boxNine_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_adwords_boxNine_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_adwords_boxNine_count"
                                                                                       name="second_choice_adwords_boxNine_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_adwords_boxNine_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_adwords_boxNine').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_boxNine&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_adwords_boxNine<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_adwords_boxNine_neshane").change(function () {
                                                                                        var j = $("#second_choice_adwords_boxNine_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_boxNine&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_adwords_boxNine' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_adwords_boxNine_neshane', function () {
                                                                                        var j = $("#second_choice_adwords_boxNine_count").val();
                                                                                        //  $(".second_choice_adwords_boxNine_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_boxNine_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_adwords_boxNine_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_adwords_boxNine').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_adwords_boxNine' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_adwords_boxNine" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_adwords_boxNine col-md-3 input-group"><input type="hidden" id="second_choice_adwords_boxNine_subcat_val' + i + '"  name="second_choice_adwords_boxNine_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_adwords_boxNine_subcat_link' + i + '"  name="second_choice_adwords_boxNine_subcat_link' + i + '" value=""> <select id="second_choice_adwords_boxNine_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_adwords_boxNine_cat" name="second_choice_adwords_boxNine_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_adwords_boxNine' + i + '" class="col-md-3 input-group"></div><div id="second_choice_adwords_boxNine_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_adwords_boxNine' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_adwords_boxNine_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_adwords_boxNine', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_adwords_boxNine_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_adwords_boxNine' + id).remove();
                                                                                            $('#second_choice_adwords_boxNine_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_adwords_boxNine"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_adwords_boxNine adwords_boxNine_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_adwords_boxNine = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_adwords_boxNine%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_adwords_boxNine; $x++) {
                                                                                    $third_choice_adwords_boxNine = get_tem_result($site, $la, "third_choice_adwords_boxNine$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_adwords_boxNine['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_adwords_boxNine<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_adwords_boxNine"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_adwords_boxNine_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_adwords_boxNine["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_adwords_boxNine_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_adwords_boxNine_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_adwords_boxNine["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="متن دوم،لینک"
                                                                                                               name="third_choice_adwords_boxNine_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_adwords_boxNine_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_adwords_boxNine["pic_adress"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_adwords_boxNine_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_adwords_boxNine_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_adwords_boxNine<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_adwords_boxNine_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_adwords_boxNine_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_adwords_boxNine_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_adwords_boxNine<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <div class="input-group"
                                                                                                         id="image_show_third_choice_adwords_boxNine<?= $x ?>">
                                                                                                        <a href="<?= $third_choice_adwords_boxNine["pic_adress"] ?>"
                                                                                                           class=" without-caption">
                                                                                                            <img width="33"
                                                                                                                 height="33"
                                                                                                                 class="H_cursor_zoom"
                                                                                                                 src="<?= $third_choice_adwords_boxNine["pic_adress"] ?>"
                                                                                                                 alt="<?= $third_choice_adwords_boxNine["text"] ?>">
                                                                                                        </a>

                                                                                                    </div>

                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_adwords_boxNine_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_adwords_boxNine_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_adwords_boxNine_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_adwords_boxNine_text<?= $x ?>"><?= $third_choice_adwords_boxNine["text"] ?>

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
                                                                                       id="third_choice_adwords_boxNine_count"
                                                                                       name="third_choice_adwords_boxNine_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_adwords_boxNine-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_adwords_boxNine' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_adwords_boxNine" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_adwords_boxNine_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_adwords_boxNine_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_adwords_boxNine_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_adwords_boxNine_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="third_choice_adwords_boxNine_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_adwords_boxNine_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_adwords_boxNine_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_adwords_boxNine' + i + '" style="padding: 0px;"><div  id="third_choice_adwords_boxNine_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_adwords_boxNine_avatar7_link' + i + '" name="third_choice_adwords_boxNine_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_adwords_boxNine' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_adwords_boxNine_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_adwords_boxNine_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_adwords_boxNine' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_adwords_boxNine_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_adwords_boxNine_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_adwords_boxNine_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_adwords_boxNine' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_adwords_boxNine' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_adwords_boxNine', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_adwords_boxNine_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_adwords_boxNine' + id).remove();
                                                                                            $('#third_choice_adwords_boxNine_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_adwords_boxNine-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_adwords_boxNine_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_adwords_boxNine"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_adwords_boxNine_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_adwords_boxNine').hide();
                                                                        $('.adwords_boxNine_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content10" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $adwords_title_LightBox = get_tem_result($site, $la, "adwords_title_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($adwords_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="adwords_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_title_LightBox_title"
                                                                           value="<?= $adwords_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_adwords_LightBox = get_tem_result($site, $la, "ValSelectActive_adwords_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_adwords_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_adwords_LightBox"
                                                                    name="select_type_adwords_LightBox">

                                                                <option <? if ($ValSelectActive_adwords_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_adwords_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_adwords_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_adwords_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_adwords_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_adwords_LightBox adwords_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_adwords_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_adwords_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_adwords_LightBox; $j++) {
                                                                                    $first_choice_adwords_LightBox = get_tem_result($site, $la, "first_choice_adwords_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_adwords_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_adwords_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_adwords_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_adwords_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_adwords_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_adwords_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_adwords_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_adwords_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_adwords_LightBox_cat"
                                                                                                                name="first_choice_adwords_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_adwords_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_adwords_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_adwords_LightBox_new&id=" + $("#first_choice_adwords_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_adwords_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_adwords_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_adwords_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_adwords_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_adwords_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_adwords_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_adwords_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_adwords_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_adwords_LightBox_count"
                                                                                       name="first_choice_adwords_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_adwords_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_adwords_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_adwords_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_adwords_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_adwords_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_adwords_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_adwords_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_adwords_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_adwords_LightBox_subcat_val' + i + '"  name="first_choice_adwords_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_adwords_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_adwords_LightBox_cat" name="first_choice_adwords_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_adwords_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_adwords_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_adwords_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_adwords_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_adwords_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_adwords_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_adwords_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_adwords_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_adwords_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_adwords_LightBox' + id).remove();
                                                                                            $('#first_choice_adwords_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_adwords_LightBox"><i
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

                                                            <div class="tab-pane opt_adwords_LightBox adwords_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_adwords_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_adwords_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_adwords_LightBox; $j++) {
                                                                                    $second_choice_adwords_LightBox = get_tem_result($site, $la, "second_choice_adwords_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_adwords_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_adwords_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_adwords_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_adwords_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_adwords_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_adwords_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_adwords_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_adwords_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_adwords_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_adwords_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_adwords_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_adwords_LightBox_cat"
                                                                                                                name="second_choice_adwords_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_adwords_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_adwords_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_adwords_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_adwords_LightBox&id=" + $("#second_choice_adwords_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_adwords_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_adwords_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_adwords_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_adwords_LightBox_content&id=" + $("#second_choice_adwords_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_adwords_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_adwords_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_adwords_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_adwords_LightBox_count"
                                                                                       name="second_choice_adwords_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_adwords_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_adwords_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_adwords_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_adwords_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_adwords_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_adwords_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_adwords_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_adwords_LightBox_count").val();
                                                                                        //  $(".second_choice_adwords_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_adwords_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_adwords_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_adwords_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_adwords_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_adwords_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_adwords_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_adwords_LightBox_subcat_val' + i + '"  name="second_choice_adwords_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_adwords_LightBox_subcat_link' + i + '"  name="second_choice_adwords_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_adwords_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_adwords_LightBox_cat" name="second_choice_adwords_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_adwords_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_adwords_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_adwords_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_adwords_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_adwords_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_adwords_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_adwords_LightBox' + id).remove();
                                                                                            $('#second_choice_adwords_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_adwords_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_adwords_LightBox adwords_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_adwords_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_adwords_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_adwords_LightBox; $x++) {
                                                                                    $third_choice_adwords_LightBox = get_tem_result($site, $la, "third_choice_adwords_LightBox$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_adwords_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_adwords_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_adwords_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_adwords_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_adwords_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_adwords_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_adwords_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_adwords_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_adwords_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_adwords_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_adwords_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_adwords_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_adwords_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_adwords_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_adwords_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_adwords_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_adwords_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_adwords_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_adwords_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_adwords_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_adwords_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_adwords_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_adwords_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_adwords_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_adwords_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_adwords_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_adwords_LightBox_text<?= $x ?>"><?= $third_choice_adwords_LightBox["text"] ?>

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
                                                                                       id="third_choice_adwords_LightBox_count"
                                                                                       name="third_choice_adwords_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_adwords_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_adwords_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_adwords_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_adwords_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_adwords_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_adwords_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_adwords_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_adwords_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_adwords_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_adwords_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_adwords_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_adwords_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_adwords_LightBox_avatar7_link' + i + '" name="third_choice_adwords_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_adwords_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_adwords_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_adwords_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_adwords_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_adwords_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_adwords_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_adwords_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_adwords_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_adwords_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_adwords_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_adwords_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_adwords_LightBox' + id).remove();
                                                                                            $('#third_choice_adwords_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_adwords_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_adwords_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_adwords_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_adwords_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_adwords_LightBox').hide();
                                                                        $('.adwords_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>

                                                <!-------------------header_seo------------------->
                                                <div  id="content11" class="bhoechie-tab-content H1 ">
                                                    <? $adwords_header_seo = get_tem_result($site, $la, "adwords_header_seo", 'coms2', $coms_conect); ?>
                                                    <center>
                                                        <div class="col-md-12">
                                                            <label  class="col-md-3 control-label" >meta keyword</label>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" value="<?= $adwords_header_seo['title'] ?>" id="header_seo_keyword" name="adwords_header_seo_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" >meta Description</label>
                                                                <div class="form-group col-md-6">
                                                                    <textarea id="header_seo_desciption" name="adwords_header_seo_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $adwords_header_seo['text'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">title</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="adwords_header_seo_pic"
                                                                           value="<?= $adwords_header_seo ['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">picture</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">

                                                                                                                                                <input type="text"
                                                                                                                                                       id="adwords_header_seo_pic_adress"
                                                                                                                                                       value="<?=$adwords_header_seo['pic_adress']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="adwords_header_seo_pic_adress"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=adwords_header_seo_pic_adress"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="adwords_header_seo_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_adwords_header_seo_pic_adress"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_adwords_header_seo_pic_adress">
                                                                        <a href="<?= $adwords_header_seo["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $adwords_header_seo["pic_adress"] ?>" alt="<?= $adwords_header_seo["pic_adress"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#adwords_header_seo_pic_adress_avatar_orak').orakuploader({
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

                                                                            $('#adwords_header_seo_pic_adress_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
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
        //-------------------------------
        //----------adwords---------------------
        $(".H_rename_adwords_box1").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box1_save').show();
            $(".H_input_rename_adwords_box1").toggle(300);
        });
        $(".H_rename_adwords_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box1' + "&value=" + $(".H_input_rename_adwords_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box1 > span.temp").text($(".H_input_rename_adwords_box1").val());
            $(this).hide();
            $('.H_rename_adwords_box1').show();
            $(".H_input_rename_adwords_box1").hide();
            $(".H_rename_adwords_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box2").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box2_save').show();
            $(".H_input_rename_adwords_box2").toggle(300);
        });
        $(".H_rename_adwords_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box2' + "&value=" + $(".H_input_rename_adwords_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box2 > span.temp").text($(".H_input_rename_adwords_box2").val());
            $(this).hide();
            $('.H_rename_adwords_box2').show();
            $(".H_input_rename_adwords_box2").hide();
            $(".H_rename_adwords_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box3").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box3_save').show();
            $(".H_input_rename_adwords_box3").toggle(300);
        });
        $(".H_rename_adwords_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box3' + "&value=" + $(".H_input_rename_adwords_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box3 > span.temp").text($(".H_input_rename_adwords_box3").val());
            $(this).hide();
            $('.H_rename_adwords_box3').show();
            $(".H_input_rename_adwords_box3").hide();
            $(".H_rename_adwords_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box4").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box4_save').show();
            $(".H_input_rename_adwords_box4").toggle(300);
        });
        $(".H_rename_adwords_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box4' + "&value=" + $(".H_input_rename_adwords_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box4 > span.temp").text($(".H_input_rename_adwords_box4").val());
            $(this).hide();
            $('.H_rename_adwords_box4').show();
            $(".H_input_rename_adwords_box4").hide();
            $(".H_rename_adwords_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box5").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box5_save').show();
            $(".H_input_rename_adwords_box5").toggle(300);
        });
        $(".H_rename_adwords_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box5' + "&value=" + $(".H_input_rename_adwords_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box5 > span.temp").text($(".H_input_rename_adwords_box5").val());
            $(this).hide();
            $('.H_rename_adwords_box5').show();
            $(".H_input_rename_adwords_box5").hide();
            $(".H_rename_adwords_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box6").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box6_save').show();
            $(".H_input_rename_adwords_box6").toggle(300);
        });
        $(".H_rename_adwords_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box6' + "&value=" + $(".H_input_rename_adwords_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box6 > span.temp").text($(".H_input_rename_adwords_box6").val());
            $(this).hide();
            $('.H_rename_adwords_box6').show();
            $(".H_input_rename_adwords_box6").hide();
            $(".H_rename_adwords_box6.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box7").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box7_save').show();
            $(".H_input_rename_adwords_box7").toggle(300);
        });
        $(".H_rename_adwords_box7_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box7' + "&value=" + $(".H_input_rename_adwords_box7").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box7 > span.temp").text($(".H_input_rename_adwords_box7").val());
            $(this).hide();
            $('.H_rename_adwords_box7').show();
            $(".H_input_rename_adwords_box7").hide();
            $(".H_rename_adwords_box7.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box8").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box8_save').show();
            $(".H_input_rename_adwords_box8").toggle(300);
        });
        $(".H_rename_adwords_box8_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box8' + "&value=" + $(".H_input_rename_adwords_box8").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box8 > span.temp").text($(".H_input_rename_adwords_box8").val());
            $(this).hide();
            $('.H_rename_adwords_box8').show();
            $(".H_input_rename_adwords_box8").hide();
            $(".H_rename_adwords_box8.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box9").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box9_save').show();
            $(".H_input_rename_adwords_box9").toggle(300);
        });
        $(".H_rename_adwords_box9_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box9' + "&value=" + $(".H_input_rename_adwords_box9").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box9 > span.temp").text($(".H_input_rename_adwords_box9").val());
            $(this).hide();
            $('.H_rename_adwords_box9').show();
            $(".H_input_rename_adwords_box9").hide();
            $(".H_rename_adwords_box9.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box10").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box10_save').show();
            $(".H_input_rename_adwords_box10").toggle(300);
        });
        $(".H_rename_adwords_box10_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box10' + "&value=" + $(".H_input_rename_adwords_box10").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box10 > span.temp").text($(".H_input_rename_adwords_box10").val());
            $(this).hide();
            $('.H_rename_adwords_box10').show();
            $(".H_input_rename_adwords_box10").hide();
            $(".H_rename_adwords_box10.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_adwords_box11").click(function () {
            $(this).hide();
            $('.H_rename_adwords_box11_save').show();
            $(".H_input_rename_adwords_box11").toggle(300);
        });
        $(".H_rename_adwords_box11_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'adwords_box11' + "&value=" + $(".H_input_rename_adwords_box11").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_adwords_box11 > span.temp").text($(".H_input_rename_adwords_box11").val());
            $(this).hide();
            $('.H_rename_adwords_box11').show();
            $(".H_input_rename_adwords_box11").hide();
            $(".H_rename_adwords_box11.H_pos_color").css('transform', 'translateY(-24px)');
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
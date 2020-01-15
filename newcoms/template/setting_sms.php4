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



    ########################################################### sms ########################################################

    $sms_boxOne_pic_adress = 0;
    $sms_boxOne_pic_adress= injection_replace($_POST["sms_boxOne_pic_adress"]);
    $sms_boxOne_title = injection_replace($_POST["sms_boxOne_title"]);
    $sms_boxOne_text = injection_replace($_POST["sms_boxOne_text"]);
    $sms_boxOne_pic = injection_replace($_POST["sms_boxOne_pic"]);
    $sms_boxOne_pic = resize_image_M($sms_boxOne_pic,1350,550,$img_page_main,'');
    $sms_boxOne_pic_avatar_orak = injection_replace($_POST["sms_boxOne_pic_avatar_orak"][0]);
    if($sms_boxOne_pic_avatar_orak>""){
        $sms_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $sms_boxOne_pic_avatar_orak;
        $sms_boxOne_pic = resize_image_M($sms_boxOne_pic,1350,550,$img_page_main,'');

    }
    insert_templdate($site, $sms_boxOne_pic_adress, $la, $sms_boxOne_text, $sms_boxOne_title, '', $sms_boxOne_pic, "sms_boxOne", 'coms2', $coms_conect);
//---
    $sms_content_fixed1_title= injection_replace($_POST["sms_content_fixed1_title"]);
    $sms_content_fixed1_link = injection_replace($_POST["sms_content_fixed1_link"]);
    $sms_content_fixed1_pic = injection_replace($_POST["sms_content_fixed1_pic"]);
    $sms_content_fixed1_text= injection_replace($_POST["sms_content_fixed1_text"]);
    $sms_content_fixed1_pic_adress = injection_replace($_POST["sms_content_fixed1_pic_adress"]);
    $sms_content_fixed1_pic_adress = resize_image_M($sms_content_fixed1_pic_adress,100,100,$img_page_main,'');
    $sms_content_fixed1_avatar7 = injection_replace($_POST["sms_content_fixed1_avatar7"][0]);
    if($sms_content_fixed1_avatar7>""){
        $sms_content_fixed1_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $sms_content_fixed1_avatar7;
        $sms_content_fixed1_pic_adress = resize_image_M($sms_content_fixed1_pic_adress,100,100,$img_page_main,'');

    }

    $sms_content_fixed2_text= injection_replace($_POST["sms_content_fixed2_text"]);
    if($sms_content_fixed1_title>"") {
        insert_templdate($site, $sms_content_fixed1_pic_adress, $la, $sms_content_fixed1_text, $sms_content_fixed1_title, $sms_content_fixed1_link, $sms_content_fixed1_pic, "sms_content_fixed1", 'coms2', $coms_conect);
        insert_templdate($site, '', $la, $sms_content_fixed2_text, '', '', '', "sms_content_fixed2", 'coms2', $coms_conect);
    }
//    menu box
    $sms_menubox_show_pic_adress = injection_replace_pic($_POST["sms_menubox_show_pic_adress"]);
    insert_templdate($site, $sms_menubox_show_pic_adress, $la, '', '', '', '', "sms_menubox_show", 'coms2', $coms_conect);

    $sms_menubox_links_del = "name like 'sms_menubox_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $sms_menubox_links_del, $coms_conect);
    $sms_menubox_links_count = injection_replace_pic($_POST["sms_menubox_links_count"]);
    for ($k = 1; $k <= $sms_menubox_links_count; $k++) {
        $sms_menubox_links_title = injection_replace_pic($_POST["sms_menubox_links_title{$k}"]);
        $sms_menubox_links_link = injection_replace_pic($_POST["sms_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $sms_menubox_links_title, $sms_menubox_links_link, '', "sms_menubox_links$k", 'coms2', $coms_conect);
    }
//-------------------------box3
    $sms_box3_title_pic_adress = 0;
    $sms_box3_title_pic_adress = injection_replace($_POST["sms_box3_title_pic_adress"]);
    $sms_box3_title_title = injection_replace($_POST["sms_box3_title_title"]);
    $sms_box3_title_text = injection_replace($_POST["sms_box3_title_text"]);
    $sms_box3_title_link = injection_replace($_POST["sms_box3_title_link"]);
    insert_templdate($site, $sms_box3_title_pic_adress, $la, $sms_box3_title_text, $sms_box3_title_title, $sms_box3_title_link, '', "sms_box3_title", 'coms2', $coms_conect);


    $condition_sms_content_tabs_box1 = "name like 'sms_content_tabs_box1%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_sms_content_tabs_box1, $coms_conect);

    $condition_sms_content_tabs_box_btn = "name like 'sms_content_tabs_box_btn%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_sms_content_tabs_box_btn, $coms_conect);
    $sms_content_tabs_box1_count = injection_replace_pic($_POST["sms_content_tabs_box1_count"]);
    for ($x = 1; $x <= $sms_content_tabs_box1_count; $x++) {
        $sms_content_tabs_box1_title = injection_replace_pic($_POST["sms_content_tabs_box1_title{$x}"]);
        $sms_content_tabs_box1_link= injection_replace_pic($_POST["sms_content_tabs_box1_link{$x}"]);
        $sms_content_tabs_box1_pic= injection_replace_pic($_POST["sms_content_tabs_box1_pic{$x}"]);
        $sms_content_tabs_box1_text = injection_replace_pic($_POST["sms_content_tabs_box1_text{$x}"]);
        $sms_content_tabs_box1_pic_adress = injection_replace_pic($_POST["sms_content_tabs_box1_pic_adress{$x}"]);
        $sms_content_tabs_box1_pic_adress = resize_image_M($sms_content_tabs_box1_pic_adress,80,80,$img_page_main,'');
        $sms_content_tabs_box1_avatar7 = injection_replace($_POST["sms_content_tabs_box1_avatar7{$x}"][0]);
        if ($sms_content_tabs_box1_avatar7 > "") {
            $sms_content_tabs_box1_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $sms_content_tabs_box1_avatar7;
            $sms_content_tabs_box1_pic_adress = resize_image_M($sms_content_tabs_box1_pic_adress,80,80,$img_page_main,'');

        }
        $sms_content_tabs_box_btn_pic_adress = injection_replace_pic($_POST["sms_content_tabs_box_btn_pic_adress{$x}"]);
        $sms_content_tabs_box_btn_title = injection_replace_pic($_POST["sms_content_tabs_box_btn_title{$x}"]);
        $sms_content_tabs_box_btn_link= injection_replace_pic($_POST["sms_content_tabs_box_btn_link{$x}"]);
        $sms_content_tabs_box_btn_text = injection_replace_pic($_POST["sms_content_tabs_box_btn_text{$x}"]);
        $sms_content_tabs_box_btn_pic= injection_replace_pic($_POST["sms_content_tabs_box_btn_pic{$x}"]);

        $sms_li_box1_text = injection_replace_pic($_POST["sms_li_box1_text{$x}"]);
        $sms_li_box1_pic = injection_replace_pic($_POST["sms_li_box1_pic{$x}"]);


        if ($sms_content_tabs_box1_title > "") {
            insert_templdate($site, '', $la, $sms_li_box1_text, '', '', $sms_li_box1_pic, "sms_li_box1$x", 'coms2', $coms_conect);
            insert_templdate($site, $sms_content_tabs_box1_pic_adress, $la, $sms_content_tabs_box1_text, $sms_content_tabs_box1_title, $sms_content_tabs_box1_link, $sms_content_tabs_box1_pic, "sms_content_tabs_box1$x", 'coms2', $coms_conect);
            insert_templdate($site, $sms_content_tabs_box_btn_pic_adress, $la, $sms_content_tabs_box_btn_text, $sms_content_tabs_box_btn_title, $sms_content_tabs_box_btn_link, $sms_content_tabs_box_btn_pic, "sms_content_tabs_box_btn$x", 'coms2', $coms_conect);
        }
    }


//    sms box2
    $sms_boxTwo_pic_adress = 0;
    $sms_boxTwo_pic_adress= injection_replace($_POST["sms_boxTwo_pic_adress"]);
    $sms_boxTwo_text = injection_replace($_POST["sms_boxTwo_text"]);
    $sms_boxTwo_title = injection_replace($_POST["sms_boxTwo_title"]);
    $sms_boxTwo_pic = injection_replace($_POST["sms_boxTwo_pic"]);
    $sms_boxTwo_link = injection_replace($_POST["sms_boxTwo_link"]);
    insert_templdate($site, $sms_boxTwo_pic_adress, $la, $sms_boxTwo_text, $sms_boxTwo_title, $sms_boxTwo_link, $sms_boxTwo_pic, "sms_boxTwo", 'coms2', $coms_conect);


    $ValSelectActive_sms_boxTwo_title = injection_replace($_POST["ValSelectActive_sms_boxTwo_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_sms_boxTwo_title, '', '', "ValSelectActive_sms_boxTwo", 'coms2', $coms_conect);

    $condition_first_choice_sms_boxTwo = "name like 'first_choice_sms_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_sms_boxTwo, $coms_conect);
    $first_choice_sms_boxTwo_count = injection_replace_pic($_POST["first_choice_sms_boxTwo_count"]);
    for ($i = 1; $i <= $first_choice_sms_boxTwo_count; $i++) {

        $first_choice_sms_boxTwo_cat = injection_replace_pic($_POST["first_choice_sms_boxTwo_cat{$i}"]);
        $first_choice_sms_boxTwo_subcat_cat = injection_replace_pic($_POST["first_choice_sms_boxTwo_subcat_cat{$i}"]);
        $first_choice_sms_boxTwo_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_sms_boxTwo_Fixed_selection_cat{$i}"]);
        $first_choice_sms_boxTwo_number = injection_replace_pic($_POST["first_choice_sms_boxTwo_number{$i}"]);
        if ($first_choice_sms_boxTwo_subcat_cat > "")
            insert_templdate($site, $first_choice_sms_boxTwo_number, $la, $first_choice_sms_boxTwo_Fixed_selection_cat, '', $first_choice_sms_boxTwo_cat, $first_choice_sms_boxTwo_subcat_cat, "first_choice_sms_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_sms_boxTwo = "name like 'second_choice_sms_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_sms_boxTwo, $coms_conect);
    $second_choice_sms_boxTwo_count = injection_replace_pic($_POST["second_choice_sms_boxTwo_count"]);
    for ($i = 1; $i <= $second_choice_sms_boxTwo_count; $i++) {

        $second_choice_sms_boxTwo_cat = injection_replace_pic($_POST["second_choice_sms_boxTwo_cat{$i}"]);
        $second_choice_sms_boxTwo_subcat_cat = injection_replace_pic($_POST["second_choice_sms_boxTwo_subcat_cat{$i}"]);
        $second_choice_sms_boxTwo_subcat_cat_content = injection_replace_pic($_POST["second_choice_sms_boxTwo_subcat_cat_content{$i}"]);
        if ($second_choice_sms_boxTwo_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_sms_boxTwo_subcat_cat_content, $la, '', '', $second_choice_sms_boxTwo_cat, $second_choice_sms_boxTwo_subcat_cat, "second_choice_sms_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_sms_boxTwo = "name like 'third_choice_sms_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_sms_boxTwo, $coms_conect);
    $third_choice_sms_boxTwo_count = injection_replace_pic($_POST["third_choice_sms_boxTwo_count"]);
    for ($x = 1; $x <= $third_choice_sms_boxTwo_count; $x++) {


        $third_choice_sms_boxTwo_pic_adress = injection_replace_pic($_POST["third_choice_sms_boxTwo_pic_adress{$x}"]);
        $third_choice_sms_boxTwo_title = injection_replace_pic($_POST["third_choice_sms_boxTwo_title{$x}"]);
        $third_choice_sms_boxTwo_text = injection_replace_pic($_POST["third_choice_sms_boxTwo_text{$x}"]);

        $third_choice_sms_boxTwo_link = injection_replace_pic($_POST["third_choice_sms_boxTwo_link{$x}"]);
        $third_choice_sms_boxTwo_pic = injection_replace_pic($_POST["third_choice_sms_boxTwo_pic{$x}"]);
        $third_choice_sms_boxTwo_pic = resize_image_M($third_choice_sms_boxTwo_pic,40,40,$img_page_main,'');
        $third_choice_sms_boxTwo_avatar7 = injection_replace($_POST["third_choice_sms_boxTwo_avatar7{$x}"][0]);
        if ($third_choice_sms_boxTwo_avatar7 > "") {
            $third_choice_sms_boxTwo_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_sms_boxTwo_avatar7;
            $third_choice_sms_boxTwo_pic = resize_image_M($third_choice_sms_boxTwo_pic,40,40,$img_page_main,'');

        }
        if ($third_choice_sms_boxTwo_title > "") {
            insert_templdate($site, $third_choice_sms_boxTwo_pic_adress, $la, $third_choice_sms_boxTwo_text, $third_choice_sms_boxTwo_title, $third_choice_sms_boxTwo_link, $third_choice_sms_boxTwo_pic, "third_choice_sms_boxTwo$x", 'coms2', $coms_conect);
        }
    }
    //    box5
    $sms_boxFive_pic_adress = 0;
    $sms_boxFive_pic_adress= injection_replace($_POST["sms_boxFive_pic_adress"]);
    $sms_boxFive_title= injection_replace($_POST["sms_boxFive_title"]);
    insert_templdate($site, $sms_boxFive_pic_adress, $la, '', $sms_boxFive_title, '', '', "sms_boxFive", 'coms2', $coms_conect);

    $condition_sms_box5 = "name like 'sms_box5%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_sms_box5, $coms_conect);

    $sms_box5_count = injection_replace_pic($_POST["sms_box5_count"]);
    for ($x = 1; $x <= $sms_box5_count; $x++) {
        $sms_box5_title = injection_replace_pic($_POST["sms_box5_title{$x}"]);
        $sms_box5_link= injection_replace_pic($_POST["sms_box5_link{$x}"]);
        $sms_box5_pic= injection_replace_pic($_POST["sms_box5_pic{$x}"]);
        $sms_box5_text = injection_replace_pic($_POST["sms_box5_text{$x}"]);
        $sms_box5_pic_adress = injection_replace_pic($_POST["sms_box5_pic_adress{$x}"]);
        $sms_box5_pic_adress = resize_image_M($sms_box5_pic_adress,120,120,$img_page_main,'');
        $sms_box5_avatar7 = injection_replace($_POST["sms_box5_avatar7{$x}"][0]);
        if ($sms_box5_avatar7 > "") {
            $sms_box5_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $sms_box5_avatar7;
            $sms_box5_pic_adress = resize_image_M($sms_box5_pic_adress,120,120,$img_page_main,'');

        }
        if ($sms_box5_title > "") {
            insert_templdate($site, $sms_box5_pic_adress, $la, $sms_box5_text, $sms_box5_title, $sms_box5_link, $sms_box5_pic, "sms_box5$x", 'coms2', $coms_conect);
        }
    }
//    box6
    $sms_title_boxFour_pic_adress = 0;
    $sms_title_boxFour_pic_adress= injection_replace($_POST["sms_title_boxFour_pic_adress"]);
    $sms_title_boxFour_title= injection_replace($_POST["sms_title_boxFour_title"]);
    $sms_title_boxFour_text= injection_replace($_POST["sms_title_boxFour_text"]);
    insert_templdate($site, $sms_title_boxFour_pic_adress, $la, $sms_title_boxFour_text, $sms_title_boxFour_title, '', '', "sms_title_boxFour", 'coms2', $coms_conect);


    $condition_sms_con_box4 = "name like 'sms_con_box4%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_sms_con_box4, $coms_conect);

    $sms_con_box4_count = injection_replace_pic($_POST["sms_con_box4_count"]);
    for ($x = 1; $x <= $sms_con_box4_count; $x++) {
        $sms_con_box4_title = injection_replace_pic($_POST["sms_con_box4_title{$x}"]);
        $sms_con_box4_text = injection_replace_pic($_POST["sms_con_box4_text{$x}"]);
        if ($sms_con_box4_title > "") {
            insert_templdate($site, '', $la, $sms_con_box4_text, $sms_con_box4_title, '', '', "sms_con_box4$x", 'coms2', $coms_conect);
        }
    }
    //    box7

    $sms_boxSeven_pic_adress = 0;
    $sms_boxSeven_pic_adress= injection_replace($_POST["sms_boxSeven_pic_adress"]);
    $sms_boxSeven_title= injection_replace($_POST["sms_boxSeven_title"]);
    $sms_boxSeven_text= injection_replace($_POST["sms_boxSeven_text"]);
    $sms_boxSeven_pic= injection_replace($_POST["sms_boxSeven_pic"]);
    $sms_boxSeven_link= injection_replace($_POST["sms_boxSeven_link"]);
    $sms_boxSeven_link= resize_image_M($sms_boxSeven_link,357,530,$img_page_main,'');
    $sms_boxSeven_link_avatar_orak = injection_replace($_POST["sms_boxSeven_link_avatar_orak"][0]);
    if ($sms_boxSeven_link_avatar_orak > "") {
        $sms_boxSeven_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $sms_boxSeven_link_avatar_orak;
        $sms_boxSeven_link= resize_image_M($sms_boxSeven_link,357,530,$img_page_main,'');

    }
    insert_templdate($site, $sms_boxSeven_pic_adress, $la, $sms_boxSeven_text, $sms_boxSeven_title, $sms_boxSeven_link, $sms_boxSeven_pic, "sms_boxSeven", 'coms2', $coms_conect);

    $sms_show_faq_que_pic_adress = 0;
    $sms_show_faq_que_pic_adress= injection_replace($_POST["sms_show_faq_que_pic_adress"]);
    $sms_show_faq_que_pic = 0;
    $sms_show_faq_que_pic= injection_replace($_POST["sms_show_faq_que_pic"]);
    $cat_faq_text= injection_replace($_POST["cat_faq_text"]);
    $cat_qes_title= injection_replace($_POST["cat_qes_title"]);
    $sms_show_faq_que_link = injection_replace_pic($_POST["sms_show_faq_que_link"]);
    insert_templdate($site, $sms_show_faq_que_pic_adress, $la, $cat_faq_text, $cat_qes_title, $sms_show_faq_que_link, $sms_show_faq_que_pic, "sms_show_faq_que", 'coms2', $coms_conect);

    $sms_pop_faq_title= injection_replace($_POST["sms_pop_faq_title"]);
    $sms_pop_faq_text= injection_replace($_POST["sms_pop_faq_text"]);
    $sms_pop_faq_pic= injection_replace($_POST["sms_pop_faq_pic"]);
    $sms_pop_faq_link= injection_replace($_POST["sms_pop_faq_link"]);
    $sms_pop_faq_pic_adress= injection_replace($_POST["sms_pop_faq_pic_adress"]);
    insert_templdate($site, $sms_pop_faq_pic_adress, $la, $sms_pop_faq_text, $sms_pop_faq_title, $sms_pop_faq_link, $sms_pop_faq_pic, "sms_pop_faq", 'coms2', $coms_conect);


    //   box8
    $sms_degarKhadamat_pic_adress = 0;
    $sms_degarKhadamat_pic_adress= injection_replace($_POST["sms_degarKhadamat_pic_adress"]);
    $sms_degarKhadamat_title= injection_replace($_POST["sms_degarKhadamat_title"]);
    $sms_degarKhadamat_text= injection_replace($_POST["sms_degarKhadamat_text"]);
    insert_templdate($site, $sms_degarKhadamat_pic_adress, $la, $sms_degarKhadamat_text, $sms_degarKhadamat_title, '', '', "sms_degarKhadamat", 'coms2', $coms_conect);

    $condition_sms_degarKhadamat_content = "name like 'sms_degarKhadamat_content%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_sms_degarKhadamat_content, $coms_conect);
    $sms_degarKhadamat_content_count = injection_replace_pic($_POST["sms_degarKhadamat_content_count"]);
    for ($x = 1; $x <= $sms_degarKhadamat_content_count; $x++) {

        $sms_degarKhadamat_content_text = injection_replace_pic($_POST["sms_degarKhadamat_content_text{$x}"]);
        $sms_degarKhadamat_content_title = injection_replace_pic($_POST["sms_degarKhadamat_content_title{$x}"]);
        $sms_degarKhadamat_content_link = injection_replace_pic($_POST["sms_degarKhadamat_content_link{$x}"]);
        $sms_degarKhadamat_content_pic = injection_replace_pic($_POST["sms_degarKhadamat_content_pic{$x}"]);
        $sms_degarKhadamat_content_pic = resize_image_M($sms_degarKhadamat_content_pic,88,76,$img_page_main,'');
        $sms_degarKhadamat_content_avatar7 = injection_replace($_POST["sms_degarKhadamat_content_avatar7{$x}"][0]);
        if ($sms_degarKhadamat_content_avatar7 > "") {
            $sms_degarKhadamat_content_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $sms_degarKhadamat_content_avatar7;
            $sms_degarKhadamat_content_pic = resize_image_M($sms_degarKhadamat_content_pic,88,76,$img_page_main,'');

        }
        if ($sms_degarKhadamat_content_title > "") {
            insert_templdate($site, $sms_degarKhadamat_content_pic, $la, $sms_degarKhadamat_content_text, $sms_degarKhadamat_content_title, $sms_degarKhadamat_content_link, '', "sms_degarKhadamat_content$x", 'coms2', $coms_conect);
        }
    }
    //   article

    $sms_title_article_pic_adress = 0;
    $sms_title_article_pic_adress= injection_replace($_POST["sms_title_article_pic_adress"]);
    $sms_title_article_title= injection_replace($_POST["sms_title_article_title"]);
    $sms_title_article_text= injection_replace($_POST["sms_title_article_text"]);
    $sms_title_article_link= injection_replace($_POST["sms_title_article_link"]);
    insert_templdate($site, $sms_title_article_pic_adress, $la, $sms_title_article_text, $sms_title_article_title, $sms_title_article_link, '', "sms_title_article", 'coms2', $coms_conect);

    $ValSelectActive_sms_article_title = injection_replace($_POST["ValSelectActive_sms_article_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_sms_article_title, '', '', "ValSelectActive_sms_article", 'coms2', $coms_conect);

    $condition_first_choice_sms_article = "name like 'first_choice_sms_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_sms_article, $coms_conect);
    $first_choice_sms_article_count = injection_replace_pic($_POST["first_choice_sms_article_count"]);
    for ($i = 1; $i <= $first_choice_sms_article_count; $i++) {

        $first_choice_sms_article_cat = injection_replace_pic($_POST["first_choice_sms_article_cat{$i}"]);
        $first_choice_sms_article_subcat_cat = injection_replace_pic($_POST["first_choice_sms_article_subcat_cat{$i}"]);
        $first_choice_sms_article_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_sms_article_Fixed_selection_cat{$i}"]);
        $first_choice_sms_article_number = injection_replace_pic($_POST["first_choice_sms_article_number{$i}"]);
        if ($first_choice_sms_article_subcat_cat > "")
            insert_templdate($site, $first_choice_sms_article_number, $la, $first_choice_sms_article_Fixed_selection_cat, '', $first_choice_sms_article_cat, $first_choice_sms_article_subcat_cat, "first_choice_sms_article$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_sms_article = "name like 'second_choice_sms_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_sms_article, $coms_conect);
    $second_choice_sms_article_count = injection_replace_pic($_POST["second_choice_sms_article_count"]);
    for ($i = 1; $i <= $second_choice_sms_article_count; $i++) {

        $second_choice_sms_article_cat = injection_replace_pic($_POST["second_choice_sms_article_cat{$i}"]);
        $second_choice_sms_article_subcat_cat = injection_replace_pic($_POST["second_choice_sms_article_subcat_cat{$i}"]);
        $second_choice_sms_article_subcat_cat_content = injection_replace_pic($_POST["second_choice_sms_article_subcat_cat_content{$i}"]);
        if ($second_choice_sms_article_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_sms_article_subcat_cat_content, $la, '', '', $second_choice_sms_article_cat, $second_choice_sms_article_subcat_cat, "second_choice_sms_article$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_sms_article = "name like 'third_choice_sms_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_sms_article, $coms_conect);
    $third_choice_sms_article_count = injection_replace_pic($_POST["third_choice_sms_article_count"]);
    for ($x = 1; $x <= $third_choice_sms_article_count; $x++) {

        $third_choice_sms_article_pic_adress = injection_replace_pic($_POST["third_choice_sms_article_pic_adress{$x}"]);
        $third_choice_sms_article_title = injection_replace_pic($_POST["third_choice_sms_article_title{$x}"]);
        $third_choice_sms_article_text = injection_replace_pic($_POST["third_choice_sms_article_text{$x}"]);


        $third_choice_sms_article_pic = injection_replace_pic($_POST["third_choice_sms_article_pic{$x}"]);
        $third_choice_sms_article_pic = resize_image_M($third_choice_sms_article_pic,58,43,$img_page_main,'');
        $third_choice_sms_article_avatar7 = injection_replace($_POST["third_choice_sms_article_avatar7{$x}"][0]);
        if ($third_choice_sms_article_avatar7 > "") {
            $third_choice_sms_article_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_sms_article_avatar7;
            $third_choice_sms_article_pic = resize_image_M($third_choice_sms_article_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_sms_article_title > "") {
            insert_templdate($site, $third_choice_sms_article_pic_adress, $la, $third_choice_sms_article_text, $third_choice_sms_article_title, '', $third_choice_sms_article_pic, "third_choice_sms_article$x", 'coms2', $coms_conect);
        }
    }

    //   Light box
    $sms_title_LightBox_pic_adress = 0;
    $sms_title_LightBox_pic_adress= injection_replace($_POST["sms_title_LightBox_pic_adress"]);
    $sms_title_LightBox_title= injection_replace($_POST["sms_title_LightBox_title"]);
    insert_templdate($site, $sms_title_LightBox_pic_adress, $la, '', $sms_title_LightBox_title, '', '', "sms_title_LightBox", 'coms2', $coms_conect);

    $ValSelectActive_sms_LightBox_title = injection_replace($_POST["ValSelectActive_sms_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_sms_LightBox_title, '', '', "ValSelectActive_sms_LightBox", 'coms2', $coms_conect);

    $condition_first_choice_sms_LightBox = "name like 'first_choice_sms_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_sms_LightBox, $coms_conect);
    $first_choice_sms_LightBox_count = injection_replace_pic($_POST["first_choice_sms_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_sms_LightBox_count; $i++) {

        $first_choice_sms_LightBox_cat = injection_replace_pic($_POST["first_choice_sms_LightBox_cat{$i}"]);
        $first_choice_sms_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_sms_LightBox_subcat_cat{$i}"]);
        $first_choice_sms_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_sms_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_sms_LightBox_number = injection_replace_pic($_POST["first_choice_sms_LightBox_number{$i}"]);
        if ($first_choice_sms_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_sms_LightBox_number, $la, $first_choice_sms_LightBox_Fixed_selection_cat, '', $first_choice_sms_LightBox_cat, $first_choice_sms_LightBox_subcat_cat, "first_choice_sms_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_sms_LightBox = "name like 'second_choice_sms_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_sms_LightBox, $coms_conect);
    $second_choice_sms_LightBox_count = injection_replace_pic($_POST["second_choice_sms_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_sms_LightBox_count; $i++) {

        $second_choice_sms_LightBox_cat = injection_replace_pic($_POST["second_choice_sms_LightBox_cat{$i}"]);
        $second_choice_sms_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_sms_LightBox_subcat_cat{$i}"]);
        $second_choice_sms_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_sms_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_sms_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_sms_LightBox_subcat_cat_content, $la, '', '', $second_choice_sms_LightBox_cat, $second_choice_sms_LightBox_subcat_cat, "second_choice_sms_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_sms_LightBox = "name like 'third_choice_sms_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_sms_LightBox, $coms_conect);
    $third_choice_sms_LightBox_count = injection_replace_pic($_POST["third_choice_sms_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_sms_LightBox_count; $x++) {

        $third_choice_sms_LightBox_title = injection_replace_pic($_POST["third_choice_sms_LightBox_title{$x}"]);
        $third_choice_sms_LightBox_text = injection_replace_pic($_POST["third_choice_sms_LightBox_text{$x}"]);
        $third_choice_sms_LightBox_link = injection_replace_pic($_POST["third_choice_sms_LightBox_link{$x}"]);
        $third_choice_sms_LightBox_pic = injection_replace_pic($_POST["third_choice_sms_LightBox_pic{$x}"]);
        $third_choice_sms_LightBox_pic =resize_image_M($third_choice_sms_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_sms_LightBox_avatar7 = injection_replace($_POST["third_choice_sms_LightBox_avatar7{$x}"][0]);
        if ($third_choice_sms_LightBox_avatar7 > "") {
            $third_choice_sms_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_sms_LightBox_avatar7;
            $third_choice_sms_LightBox_pic =resize_image_M($third_choice_sms_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_sms_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_sms_LightBox_text, $third_choice_sms_LightBox_title, $third_choice_sms_LightBox_link, $third_choice_sms_LightBox_pic, "third_choice_sms_LightBox$x", 'coms2', $coms_conect);
        }
    }
    //  header_seo
    $sms_header_seo_keyword= injection_replace($_POST["sms_header_seo_keyword"]);
    $sms_header_seo_desciption= injection_replace($_POST["sms_header_seo_desciption"]);
    $sms_header_seo_pic= injection_replace($_POST["sms_header_seo_pic"]);
    $sms_header_seo_pic_adress = injection_replace($_POST["sms_header_seo_pic_adress"]);
    $sms_header_seo_pic_adress = resize_image_M($sms_header_seo_pic_adress,20,20,$img_page_main,'');
    $sms_header_seo_pic_adress_avatar_orak = injection_replace($_POST["sms_header_seo_pic_adress_avatar_orak"][0]);
    if($sms_header_seo_pic_adress_avatar_orak>""){
        $sms_header_seo_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $sms_header_seo_pic_adress_avatar_orak;
        $sms_header_seo_pic_adress = resize_image_M($sms_header_seo_pic_adress,20,20,$img_page_main,'');

    }
    insert_templdate($site, $sms_header_seo_pic_adress, $la, $sms_header_seo_desciption, $sms_header_seo_keyword, '', $sms_header_seo_pic, "sms_header_seo", 'coms2', $coms_conect);


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
                                        <a class="z-link">sms</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------sms---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $sms_box1 = get_tem_result($site, $la, "sms_box1", 'coms2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_sms_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $sms_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_box1 H_pos_color"><span
                                                                class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_box1_save H_pos_color H_dis_none"><i
                                                                class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_box1 H_dis_none"
                                                               name="sms_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $sms_box2 = get_tem_result($site, $la, "sms_box2", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_box2 H_pos_color"><span
                                                                class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_box2_save H_pos_color H_dis_none"><i
                                                                class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_box2 H_dis_none"
                                                               name="sms_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $sms_title_box3 = get_tem_result($site, $la, "sms_title_box3", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box3 H_pos_color"><span
                                                                class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box3_save H_pos_color H_dis_none"><i
                                                                class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box3 H_dis_none"
                                                               name="sms_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $sms_title_box4 = get_tem_result($site, $la, "sms_title_box4", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box4 H_dis_none"
                                                               name="sms_title_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $sms_title_box5 = get_tem_result($site, $la, "sms_title_box5", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box5 H_dis_none"
                                                               name="sms_title_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $sms_title_box6 = get_tem_result($site, $la, "sms_title_box6", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box6" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box6 H_dis_none"
                                                               name="sms_title_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $sms_title_box7 = get_tem_result($site, $la, "sms_title_box7", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box7" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box7['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box7 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box7_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box7 H_dis_none"
                                                               name="sms_title_box7_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $sms_title_box8 = get_tem_result($site, $la, "sms_title_box8", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box8" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box8['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box8 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box8_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box8 H_dis_none"
                                                               name="sms_title_box8_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $sms_title_box9 = get_tem_result($site, $la, "sms_title_box9", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box9" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box9['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box9 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box9_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box9 H_dis_none"
                                                               name="sms_title_box9_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $sms_title_box10 = get_tem_result($site, $la, "sms_title_box10", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box10" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box10['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box10 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box10_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box10 H_dis_none"
                                                               name="sms_title_box10_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $sms_title_box11 = get_tem_result($site, $la, "sms_title_box11", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_sms_title_box11" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $sms_title_box11['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_sms_title_box11 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_sms_title_box11_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_sms_title_box11 H_dis_none"
                                                               name="sms_title_box11_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box fixed------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $sms_boxOne = get_tem_result($site, $la, "sms_boxOne", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxOne_title"
                                                                           value="<?= $sms_boxOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxOne_text"
                                                                           value="<?= $sms_boxOne['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">

                                                                                                                                                <input type="text"
                                                                                                                                                       id="sms_boxOne_pic"
                                                                                                                                                       value="<?=$sms_boxOne['pic']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="sms_boxOne_pic"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=sms_boxOne_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="sms_boxOne_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_sms_boxOne_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_sms_boxOne_pic">
                                                                        <a href="<?= $sms_boxOne["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $sms_boxOne["pic"] ?>" alt="<?= $sms_boxOne["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#sms_boxOne_pic_avatar_orak').orakuploader({
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

                                                                            $('#sms_boxOne_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body"
                                                                     style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $sms_content_fixed1 = get_tem_result($site, $la, "sms_content_fixed1", 'coms2', $coms_conect);
                                                                            $sms_content_fixed2 = get_tem_result($site, $la, "sms_content_fixed2", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choicedel_sms_content_fixed1"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="form-group col-md-12">

                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="sms_content_fixed1_title"
                                                                                                   value="<?= $sms_content_fixed1["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" عنوان اول"
                                                                                                   name="sms_content_fixed1_title">
                                                                                        </div>
                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="sms_content_fixed1_link"
                                                                                                   value="<?= $sms_content_fixed1["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دوم"
                                                                                                   name="sms_content_fixed1_link">
                                                                                        </div>


                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="sms_content_fixed1_pic_adress"
                                                                                                   value="<?=$sms_content_fixed1["pic_adress"]?>"

                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر"
                                                                                                   name="sms_content_fixed1_pic_adress"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=sms_content_fixed1_pic_adress"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                            <span class="input-group-addon H_neshane1 H_sms_content_fixed1"
                                                                                                  style="padding: 0px;">
                                                                                    <div id="sms_content_fixed1_avatar7"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="sms_content_fixed1_avatar7_link"
                                                                                       name="sms_content_fixed1_avatar7_link"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_sms_content_fixed1"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class=" col-md-1 input-group"
                                                                                             id="image_show_sms_content_fixed1">

                                                                                            <a href="<?= $sms_content_fixed1["pic_adress"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $sms_content_fixed1["pic_adress"] ?>"
                                                                                                     alt="<?= $sms_content_fixed1["title"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#sms_content_fixed1_avatar7').orakuploader({
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

                                                                                                $('#sms_content_fixed1_avatar7').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="sms_content_fixed1_pic"
                                                                                                   value="<?= $sms_content_fixed1["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="sms_content_fixed1_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="sms_content_fixed1_text"
                                                                                                   value="<?= $sms_content_fixed1["text"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="sms_content_fixed1_text">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="sms_content_fixed2_text"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="sms_content_fixed2_text"><?= $sms_content_fixed2["text"] ?>
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

                                                    </center>
                                                </div>

                                                <!-------------------menu box------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $sms_menubox_show = get_tem_result($site, $la, "sms_menubox_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_menubox_show_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
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
                                                                            <? $count_sms_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'sms_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_sms_menubox_links; $k++) {
                                                                                $sms_menubox_links = get_tem_result($site, $la, "sms_menubox_links$k", 'coms2', $coms_conect);
                                                                                if ($sms_menubox_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_sms_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_sms_menubox_links"
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
                                                                                                           id="sms_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $sms_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="sms_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $sms_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="sms_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_sms_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="sms_menubox_links_count"
                                                                                   name="sms_menubox_links_count"
                                                                                   value="<?= --$count_sms_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_sms_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_sms_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_sms_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="sms_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="sms_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="sms_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="sms_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_sms_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#sms_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_sms_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#sms_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_sms_menubox_links' + id).remove();
                                                                                        $('#sms_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_sms_menubox_links"><i
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
                                                <!-------------------box3------------------>
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $sms_box3_title = get_tem_result($site, $la, "sms_box3_title",'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_box3_title['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_box3_title_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_box3_title_title"
                                                                           value="<?= $sms_box3_title['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" placeholder="قسمت رنگی متن" name="sms_box3_title_text"
                                                                           value="<?= $sms_box3_title['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" placeholder="قسمت دوم متن" name="sms_box3_title_link"
                                                                           value="<?= $sms_box3_title['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:3»</h5><br>

                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body"
                                                                     style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_sms_content_tabs_box1 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'sms_content_tabs_box1%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_sms_content_tabs_box1; $x++) {
                                                                                $sms_content_tabs_box1 = get_tem_result($site, $la, "sms_content_tabs_box1$x", 'coms2', $coms_conect);
                                                                                $sms_li_box1 = get_tem_result($site, $la, "sms_li_box1$x", 'coms2', $coms_conect);
                                                                                $sms_content_tabs_box_btn = get_tem_result($site, $la, "sms_content_tabs_box_btn$x", 'coms2', $coms_conect);
                                                                                if ($sms_content_tabs_box1['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_sms_content_tabs_box1<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_sms_content_tabs_box1" style="margin-bottom: 120px!important"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>
                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box1_title<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box1["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="sms_content_tabs_box1_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box1_link<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box1["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="مبلغ"
                                                                                                           name="sms_content_tabs_box1_link<?= $x ?>">
                                                                                                </div>


                                                                                                <div class="col-md-5 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box1_pic_adress<?= $x ?>"
                                                                                                           value="<?=$sms_content_tabs_box1["pic_adress"]?>"

                                                                                                           class="form-control"
                                                                                                           placeholder=" تصویر"
                                                                                                           name="sms_content_tabs_box1_pic_adress<?= $x ?>"
                                                                                                           style="direction: ltr;">
                                                                                                    <span class="input-group-addon"
                                                                                                          style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=sms_content_tabs_box1_pic_adress<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                                    <span class="input-group-addon H_neshane1 H_sms_content_tabs_box1<?= $x ?>"
                                                                                                          style="padding: 0px;">
                                                                                    <div id="sms_content_tabs_box1_avatar7<?= $x ?>"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="sms_content_tabs_box1_avatar7_link<?= $x ?>"
                                                                                       name="sms_content_tabs_box1_avatar7_link<?= $x ?>"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                                </div>
                                                                                                <div class="ui-sortable red box"
                                                                                                     id="upload_type_sms_content_tabs_box1<?= $x ?>"
                                                                                                     style="float:right;">
                                                                                                </div>
                                                                                                <div class=" col-md-1 input-group"
                                                                                                     id="image_show_sms_content_tabs_box1<?= $x ?>">

                                                                                                    <a href="<?= $sms_content_tabs_box1["pic_adress"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $sms_content_tabs_box1["pic_adress"] ?>"
                                                                                                             alt="<?= $sms_content_tabs_box1["text"] ?>">
                                                                                                    </a>

                                                                                                </div>

                                                                                                <script type="text/javascript">
                                                                                                    $(document).ready(function () {
                                                                                                        $('#sms_content_tabs_box1_avatar7<?=$x?>').orakuploader({
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

                                                                                                        $('#sms_content_tabs_box1_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                    });
                                                                                                </script>

                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box_btn_title<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box_btn["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان لینک اول"
                                                                                                           name="sms_content_tabs_box_btn_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box_btn_link<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box_btn["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک لینک اول"
                                                                                                           name="sms_content_tabs_box_btn_link<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box_btn_text<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box_btn["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان لینک دوم"
                                                                                                           name="sms_content_tabs_box_btn_text<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box_btn_pic<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box_btn["pic"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک لینک دوم"
                                                                                                           name="sms_content_tabs_box_btn_pic<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_li_box1_text<?= $x ?>"
                                                                                                           value="<?= $sms_li_box1["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="تیتر اول"
                                                                                                           name="sms_li_box1_text<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_li_box1_pic<?= $x ?>"
                                                                                                           value="<?= $sms_li_box1["pic"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="تیتر دوم"
                                                                                                           name="sms_li_box1_pic<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                                <div class="col-md-4 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box1_text<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box1["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="تیتر سوم"
                                                                                                           name="sms_content_tabs_box1_text<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-4 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box1_pic<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box1["pic"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="تیتر چهارم"
                                                                                                           name="sms_content_tabs_box1_pic<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-4 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_content_tabs_box_btn_pic_adress<?= $x ?>"
                                                                                                           value="<?= $sms_content_tabs_box_btn["pic_adress"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوانی برای ویژه بودن"
                                                                                                           name="sms_content_tabs_box_btn_pic_adress<?= $x ?>">
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
                                                                                   id="sms_content_tabs_box1_count"
                                                                                   name="sms_content_tabs_box1_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_sms_content_tabs_box1-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_sms_content_tabs_box1' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_sms_content_tabs_box1" id="' + i + '" for="family" style="margin-bottom: 120px!important"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="sms_content_tabs_box1_title' + i + '" value="" class="form-control" placeholder="عنوان" name="sms_content_tabs_box1_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="sms_content_tabs_box1_link' + i + '" value="" class="form-control" placeholder="مبلغ" name="sms_content_tabs_box1_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="sms_content_tabs_box1_pic_adress' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="sms_content_tabs_box1_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=sms_content_tabs_box1_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_sms_content_tabs_box1' + i + '" style="padding: 0px;"><div  id="sms_content_tabs_box1_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="sms_content_tabs_box1_avatar7_link' + i + '" name="sms_content_tabs_box1_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_sms_content_tabs_box1' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="sms_content_tabs_box_btn_title' + i + '" value="" class="form-control"   placeholder="عنوان لینک اول" name="sms_content_tabs_box_btn_title'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="sms_content_tabs_box_btn_link' + i + '" value="" class="form-control"   placeholder="لینک لینک اول" name="sms_content_tabs_box_btn_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="sms_content_tabs_box_btn_text' + i + '" value="" class="form-control"   placeholder="عنوان لینک دوم" name="sms_content_tabs_box_btn_text'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="sms_content_tabs_box_btn_pic' + i + '" value="" class="form-control"   placeholder="لینک لینک دوم" name="sms_content_tabs_box_btn_pic'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="sms_li_box1_text' + i + '" value="" class="form-control"   placeholder="تیتر اول" name="sms_li_box1_text'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="sms_li_box1_pic' + i +'" value="" class="form-control"   placeholder="تیتر دوم" name="sms_li_box1_pic'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-4 input-group"><input type="text" id="sms_content_tabs_box1_text' + i + '" value="" class="form-control"   placeholder="تیتر سوم " name="sms_content_tabs_box1_text'+ i +'"></div><div class="col-md-4 input-group"><input type="text" id="sms_content_tabs_box1_pic' + i + '" value="" class="form-control"   placeholder="تیتر چهارم " name="sms_content_tabs_box1_pic'+ i +'"></div><div class="col-md-4 input-group"><input type="text" id="sms_content_tabs_box_btn_pic_adress' + i + '" value="" class="form-control"   placeholder="عنوانی برای ویژه بودن " name="sms_content_tabs_box_btn_pic_adress'+ i +'"></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_sms_content_tabs_box1' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#sms_content_tabs_box1_count').val(i);

                                                                                        //--------orakuploader
                                                                                        $('#sms_content_tabs_box1_avatar7' + i + '').orakuploader({
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

                                                                                        $('#sms_content_tabs_box1_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                        $('.input-group-addon.H_sms_content_tabs_box1' + i + '').find("div").first().next().css('width', '100px');
                                                                                        $('.input-group-addon.H_sms_content_tabs_box1' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                        //    ---end orakuploader
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_sms_content_tabs_box1', function () {
                                                                                        var id = '';
                                                                                        var k = $('#sms_content_tabs_box1_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_sms_content_tabs_box1' + id).remove();
                                                                                        $('#sms_content_tabs_box1_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_sms_content_tabs_box1-ads"><i
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
                                                
                                                <!-------------------box4------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $sms_boxTwo = get_tem_result($site, $la, "sms_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxTwo_title"
                                                                           value="<?= $sms_boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxTwo_text"
                                                                           value="<?= $sms_boxTwo['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxTwo_pic"
                                                                           value="<?= $sms_boxTwo['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxTwo_link"
                                                                           value="<?= $sms_boxTwo['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«مضربی از 3»</h3><br>
                                                        <? $ValSelectActive_sms_boxTwo = get_tem_result($site, $la, "ValSelectActive_sms_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_sms_boxTwo"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_sms_boxTwo"
                                                                    name="select_type_sms_boxTwo">

                                                                <option <? if ($ValSelectActive_sms_boxTwo["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_sms_boxTwo["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_sms_boxTwo["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_sms_boxTwo_title" type="hidden"
                                                                   value="<?= $ValSelectActive_sms_boxTwo["title"] ?>">

                                                            <div class="tab-pane opt_sms_boxTwo sms_boxTwo_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_sms_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_sms_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_sms_boxTwo; $j++) {
                                                                                    $first_choice_sms_boxTwo = get_tem_result($site, $la, "first_choice_sms_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_sms_boxTwo['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_sms_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_sms_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_sms_boxTwo col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_sms_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_sms_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_sms_boxTwo['pic'] ?>">

                                                                                                        <select id="first_choice_sms_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_sms_boxTwo_cat"
                                                                                                                name="first_choice_sms_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_sms_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_sms_boxTwo<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_sms_boxTwo_new&id=" + $("#first_choice_sms_boxTwo_cat<?=$j?>").val() + "&value=" + $("#first_choice_sms_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_sms_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_sms_boxTwo_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_sms_boxTwo_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_boxTwo['text'] == 0) echo 'selected'; ?>
                                                                                                                value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_boxTwo['text'] == 1) echo 'selected'; ?>
                                                                                                                value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_boxTwo['text'] == 2) echo 'selected'; ?>
                                                                                                                value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_sms_boxTwo_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_sms_boxTwo["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_sms_boxTwo_number<?= $j ?>">
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
                                                                                       id="first_choice_sms_boxTwo_count"
                                                                                       name="first_choice_sms_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_sms_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_sms_boxTwo').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_sms_boxTwo_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_sms_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_sms_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_sms_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_sms_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_sms_boxTwo col-md-4 input-group"><input type="hidden" id="first_choice_sms_boxTwo_subcat_val' + i + '"  name="first_choice_sms_boxTwo_subcat_val' + i + '" value=""> <select id="first_choice_sms_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_sms_boxTwo_cat" name="first_choice_sms_boxTwo_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_sms_boxTwo' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_sms_boxTwo_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_sms_boxTwo_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_sms_boxTwo_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_sms_boxTwo_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_sms_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_sms_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_sms_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_sms_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_sms_boxTwo' + id).remove();
                                                                                            $('#first_choice_sms_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_sms_boxTwo"><i
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

                                                            <div class="tab-pane opt_sms_boxTwo sms_boxTwo_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_sms_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_sms_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_sms_boxTwo; $j++) {
                                                                                    $second_choice_sms_boxTwo = get_tem_result($site, $la, "second_choice_sms_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_sms_boxTwo['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_sms_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_sms_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title="حذف"
                                                                                                        data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_sms_boxTwo col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_sms_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_sms_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_sms_boxTwo['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_sms_boxTwo_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_sms_boxTwo_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_sms_boxTwo['pic_adress'] ?>">

                                                                                                        <select id="second_choice_sms_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_sms_boxTwo_cat"
                                                                                                                name="second_choice_sms_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_sms_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_sms_boxTwo<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_sms_boxTwo_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_sms_boxTwo&id=" + $("#second_choice_sms_boxTwo_cat<?=$j?>").val() + "&value=" + $("#second_choice_sms_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_sms_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_sms_boxTwo_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_sms_boxTwo_content&id=" + $("#second_choice_sms_boxTwo_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_sms_boxTwo_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_sms_boxTwo_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_sms_boxTwo_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_sms_boxTwo_count"
                                                                                       name="second_choice_sms_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_sms_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_sms_boxTwo').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_sms_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_sms_boxTwo_neshane").change(function () {
                                                                                        var j = $("#second_choice_sms_boxTwo_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_sms_boxTwo' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_sms_boxTwo_neshane', function () {
                                                                                        var j = $("#second_choice_sms_boxTwo_count").val();
                                                                                        //  $(".second_choice_sms_boxTwo_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_boxTwo_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_sms_boxTwo_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_sms_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_sms_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_sms_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_sms_boxTwo col-md-3 input-group"><input type="hidden" id="second_choice_sms_boxTwo_subcat_val' + i + '"  name="second_choice_sms_boxTwo_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_sms_boxTwo_subcat_link' + i + '"  name="second_choice_sms_boxTwo_subcat_link' + i + '" value=""> <select id="second_choice_sms_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_sms_boxTwo_cat" name="second_choice_sms_boxTwo_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_sms_boxTwo' + i + '" class="col-md-3 input-group"></div><div id="second_choice_sms_boxTwo_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_sms_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_sms_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_sms_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_sms_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_sms_boxTwo' + id).remove();
                                                                                            $('#second_choice_sms_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_sms_boxTwo"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_sms_boxTwo sms_boxTwo_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_sms_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_sms_boxTwo%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_sms_boxTwo; $x++) {
                                                                                    $third_choice_sms_boxTwo = get_tem_result($site, $la, "third_choice_sms_boxTwo$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_sms_boxTwo['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_sms_boxTwo<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_sms_boxTwo"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_sms_boxTwo_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_sms_boxTwo["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_sms_boxTwo_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_sms_boxTwo_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_sms_boxTwo["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_sms_boxTwo_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_sms_boxTwo_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_sms_boxTwo["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_sms_boxTwo_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_sms_boxTwo_pic<?= $x ?>"
                                                                                                                class="btn btn-success iframe-btn"
                                                                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                    class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_sms_boxTwo<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_sms_boxTwo_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_sms_boxTwo_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_sms_boxTwo_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_sms_boxTwo<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_sms_boxTwo["pic"]!=""){?>
                                                                                                        <div class="col-md-1 input-group "
                                                                                                             id="image_show_third_choice_sms_boxTwo<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_sms_boxTwo["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_sms_boxTwo["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_sms_boxTwo["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_sms_boxTwo_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_sms_boxTwo_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_sms_boxTwo_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_sms_boxTwo['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_sms_boxTwo_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_sms_boxTwo_text<?= $x ?>"><?= $third_choice_sms_boxTwo["text"] ?>

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
                                                                                       id="third_choice_sms_boxTwo_count"
                                                                                       name="third_choice_sms_boxTwo_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_sms_boxTwo-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_sms_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_sms_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_sms_boxTwo_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_sms_boxTwo_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_sms_boxTwo_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_sms_boxTwo_link' + i + '" ></div><div class="col-md-4 input-group"> <input type="text" id="third_choice_sms_boxTwo_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_sms_boxTwo_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_sms_boxTwo_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_sms_boxTwo' + i + '" style="padding: 0px;"><div  id="third_choice_sms_boxTwo_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_sms_boxTwo_avatar7_link' + i + '" name="third_choice_sms_boxTwo_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_sms_boxTwo' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_sms_boxTwo_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_sms_boxTwo_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_sms_boxTwo_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_sms_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_sms_boxTwo_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_sms_boxTwo_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_sms_boxTwo_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_sms_boxTwo' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_sms_boxTwo' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_sms_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_sms_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_sms_boxTwo' + id).remove();
                                                                                            $('#third_choice_sms_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_sms_boxTwo-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_sms_boxTwo_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_sms_boxTwo"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_sms_boxTwo_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_sms_boxTwo').hide();
                                                                        $('.sms_boxTwo_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>


                                                    </center>
                                                </div>

                                                <!-------------------box5------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $sms_boxFive = get_tem_result($site, $la, "sms_boxFive", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_boxFive['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_boxFive_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxFive_title"
                                                                           value="<?= $sms_boxFive['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:3»</h5><br>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body"
                                                                     style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_sms_box5 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'sms_box5%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_sms_box5; $x++) {
                                                                                $sms_box5 = get_tem_result($site, $la, "sms_box5$x", 'coms2', $coms_conect);
                                                                                if ($sms_box5['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_sms_box5<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_sms_box5" style="margin-bottom: 120px!important"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>
                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-5 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_box5_title<?= $x ?>"
                                                                                                           value="<?= $sms_box5["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="sms_box5_title<?= $x ?>">
                                                                                                </div>

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_box5_pic_adress<?= $x ?>"
                                                                                                           value="<?=$sms_box5["pic_adress"]?>"
                                                                                                           class="form-control"
                                                                                                           placeholder=" تصویر"
                                                                                                           name="sms_box5_pic_adress<?= $x ?>"
                                                                                                           style="direction: ltr;">
                                                                                                    <span class="input-group-addon"
                                                                                                          style="padding: 0px;"><a
                                                                                                                href="/filemanager/dialog.php?type=2&amp;field_id=sms_box5_pic_adress<?= $x ?>"
                                                                                                                class="btn btn-success iframe-btn"
                                                                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                    class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                                    <span class="input-group-addon H_neshane1 H_sms_box5<?= $x ?>"
                                                                                                          style="padding: 0px;">
                                                                                    <div id="sms_box5_avatar7<?= $x ?>"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="sms_box5_avatar7_link<?= $x ?>"
                                                                                       name="sms_box5_avatar7_link<?= $x ?>"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                                </div>
                                                                                                <div class="ui-sortable red box"
                                                                                                     id="upload_type_sms_box5<?= $x ?>"
                                                                                                     style="float:right;">
                                                                                                </div>
                                                                                                <div class=" col-md-1 input-group"
                                                                                                     id="image_show_sms_box5<?= $x ?>">

                                                                                                    <a href="<?= $sms_box5["pic_adress"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $sms_box5["pic_adress"] ?>"
                                                                                                             alt="<?= $sms_box5["text"] ?>">
                                                                                                    </a>

                                                                                                </div>
                                                                                                <script type="text/javascript">
                                                                                                    $(document).ready(function () {
                                                                                                        $('#sms_box5_avatar7<?=$x?>').orakuploader({
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

                                                                                                        $('#sms_box5_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                    });
                                                                                                </script>

                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_box5_link<?= $x ?>"
                                                                                                           value="<?= $sms_box5["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="زیر عنوان"
                                                                                                           name="sms_box5_link<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_box5_pic<?= $x ?>"
                                                                                                           value="<?= $sms_box5["pic"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="sms_box5_pic<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                             <textarea type="text"
                                                                                                        id="sms_box5_text<?= $x ?>"
                                                                                                      class="form-control"
                                                                                                  placeholder="متن"
                                                                                                name="sms_box5_text<?= $x ?>"><?= $sms_box5["text"] ?>
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
                                                                                   id="sms_box5_count"
                                                                                   name="sms_box5_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_sms_box5-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_sms_box5' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_sms_box5" id="' + i + '" for="family" style="margin-bottom: 120px!important"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-11"><div class="col-md-5 input-group"><input type="text" id="sms_box5_title' + i + '" value="" class="form-control" placeholder="عنوان" name="sms_box5_title' + i + '" ></div> <div class="col-md-6 input-group"> <input type="text" id="sms_box5_pic_adress' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="sms_box5_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=sms_box5_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_sms_box5' + i + '" style="padding: 0px;"><div  id="sms_box5_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="sms_box5_avatar7_link' + i + '" name="sms_box5_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_sms_box5' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="sms_box5_link' + i + '" value="" class="form-control"   placeholder="زیر عنوان" name="sms_box5_link'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="sms_box5_pic' + i + '" value="" class="form-control"   placeholder="لینک " name="sms_box5_pic'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text"  id="sms_box5_text'+ i+ '" class="form-control"  placeholder="متن" name="sms_box5_text'+ i +'"></textarea></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_sms_box5' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#sms_box5_count').val(i);

                                                                                        //--------orakuploader
                                                                                        $('#sms_box5_avatar7' + i + '').orakuploader({
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

                                                                                        $('#sms_box5_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                        $('.input-group-addon.H_sms_box5' + i + '').find("div").first().next().css('width', '100px');
                                                                                        $('.input-group-addon.H_sms_box5' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                        //    ---end orakuploader
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_sms_box5', function () {
                                                                                        var id = '';
                                                                                        var k = $('#sms_box5_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_sms_box5' + id).remove();
                                                                                        $('#sms_box5_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_sms_box5-ads"><i
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

                                                <!-------------------box6------------------->
                                                <div  id="content6" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $sms_title_boxFour = get_tem_result($site, $la, "sms_title_boxFour", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_title_boxFour['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_title_boxFour_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_title_boxFour_title"
                                                                           value="<?= $sms_title_boxFour['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_title_boxFour_text"
                                                                           value="<?= $sms_title_boxFour['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:4»</h5><br>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body"
                                                                     style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_sms_con_box4 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'sms_con_box4%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_sms_con_box4; $x++) {
                                                                                $sms_con_box4 = get_tem_result($site, $la, "sms_con_box4$x", 'coms2', $coms_conect);
                                                                                if ($sms_con_box4['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_sms_con_box4<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_sms_con_box4"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>
                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_con_box4_title<?= $x ?>"
                                                                                                           value="<?= $sms_con_box4["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان اول"
                                                                                                           name="sms_con_box4_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="sms_con_box4_text<?= $x ?>"
                                                                                                           value="<?= $sms_con_box4["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان دوم"
                                                                                                           name="sms_con_box4_text<?= $x ?>">
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
                                                                                   id="sms_con_box4_count"
                                                                                   name="sms_con_box4_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_sms_con_box4-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_sms_con_box4' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_sms_con_box4" id="' + i + '" for="family" ><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="sms_con_box4_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="sms_con_box4_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="sms_con_box4_text' + i + '" value="" class="form-control" placeholder="عنوان دوم" name="sms_con_box4_text' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_sms_con_box4' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#sms_con_box4_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_sms_con_box4', function () {
                                                                                        var id = '';
                                                                                        var k = $('#sms_con_box4_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_sms_con_box4' + id).remove();
                                                                                        $('#sms_con_box4_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_sms_con_box4-ads"><i
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
                                                <!-------------------box7------------------->
                                                <div  id="content7" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $sms_boxSeven = get_tem_result($site, $la, "sms_boxSeven", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_boxSeven['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_boxSeven_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxSeven_title"
                                                                           value="<?= $sms_boxSeven['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxSeven_text"
                                                                           value="<?= $sms_boxSeven['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_boxSeven_pic"
                                                                           value="<?= $sms_boxSeven['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $sms_show_faq_que = get_tem_result($site, $la, "sms_show_faq_que", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «سوالات متداول» </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_show_faq_que['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_show_faq_que_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_sms_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type='100' and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_faq_text' id='cat_faq_text' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $sms_show_faq_que['text'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>

                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «پرسش و پاسخ»  </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_show_faq_que['pic'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_show_faq_que_pic"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_sms_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type=99 and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_qes_title' id='cat_qes_title' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $sms_show_faq_que['title'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">

                                                        <? $sms_pop_faq = get_tem_result($site, $la, "sms_pop_faq", 'coms2', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اطلاعات داخل پاپاپ »</h5><br>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_pop_faq_title"
                                                                           value="<?= $sms_pop_faq['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_pop_faq_text"
                                                                           value="<?= $sms_pop_faq['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان سمت چپ</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_pop_faq_pic"
                                                                           value="<?= $sms_pop_faq['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن شعار</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_pop_faq_link"
                                                                           value="<?= $sms_pop_faq['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="sms_pop_faq_pic_adress"
                                                                           value="<?= $sms_pop_faq['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="sms_show_faq_que_link"
                                                                           value="<?= $sms_show_faq_que['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="sms_boxSeven_link"
                                                                               value="<?=$sms_boxSeven['link']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="sms_boxSeven_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=sms_boxSeven_link"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="sms_boxSeven_link_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_sms_boxSeven_link"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_sms_boxSeven_link">
                                                                        <a href="<?= $sms_boxSeven["link"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $sms_boxSeven["link"] ?>" alt="<?= $sms_boxSeven["link"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#sms_boxSeven_link_avatar_orak').orakuploader({
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

                                                                            $('#sms_boxSeven_link_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------box8------------------->
                                                <div  id="content8" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $sms_degarKhadamat = get_tem_result($site, $la, "sms_degarKhadamat", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_degarKhadamat['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_degarKhadamat_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_degarKhadamat_title"
                                                                           value="<?= $sms_degarKhadamat['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_degarKhadamat_text"
                                                                           value="<?= $sms_degarKhadamat['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:7 »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_sms_degarKhadamat_content = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'sms_degarKhadamat_content%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_sms_degarKhadamat_content; $x++) {
                                                                            $sms_degarKhadamat_content = get_tem_result($site, $la, "sms_degarKhadamat_content$x", 'coms2', $coms_conect);
                                                                            if ($sms_degarKhadamat_content['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_sms_degarKhadamat_content<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_sms_degarKhadamat_content"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="sms_degarKhadamat_content_title<?= $x ?>"
                                                                                                       value="<?= $sms_degarKhadamat_content["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="sms_degarKhadamat_content_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="sms_degarKhadamat_content_link<?= $x ?>"
                                                                                                       value="<?= $sms_degarKhadamat_content["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="sms_degarKhadamat_content_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="sms_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       value="<?=$sms_degarKhadamat_content["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="sms_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=sms_degarKhadamat_content_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_sms_degarKhadamat_content<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="sms_degarKhadamat_content_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="sms_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   name="sms_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_sms_degarKhadamat_content<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group"
                                                                                                 id="image_show_sms_degarKhadamat_content<?= $x ?>">
                                                                                                <a href="<?= $sms_degarKhadamat_content["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $sms_degarKhadamat_content["pic_adress"] ?>"
                                                                                                         alt="<?= $sms_degarKhadamat_content["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#sms_degarKhadamat_content_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#sms_degarKhadamat_content_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                <textarea type="text"
                                                                          id="sms_degarKhadamat_content_text<?= $x ?>"
                                                                          class="form-control"
                                                                          placeholder="عنوان دوم"
                                                                          name="sms_degarKhadamat_content_text<?= $x ?>"><?= $sms_degarKhadamat_content["text"] ?>

                                                                </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="sms_degarKhadamat_content_count"
                                                                               name="sms_degarKhadamat_content_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_sms_degarKhadamat_content-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_sms_degarKhadamat_content' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_sms_degarKhadamat_content" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="sms_degarKhadamat_content_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="sms_degarKhadamat_content_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="sms_degarKhadamat_content_link' + i + '" value="" class="form-control" placeholder="لینک" name="sms_degarKhadamat_content_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="sms_degarKhadamat_content_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="sms_degarKhadamat_content_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=sms_degarKhadamat_content_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_sms_degarKhadamat_content' + i + '" style="padding: 0px;"><div  id="sms_degarKhadamat_content_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="sms_degarKhadamat_content_avatar7_link' + i + '" name="sms_degarKhadamat_content_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_sms_degarKhadamat_content' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="sms_degarKhadamat_content_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="sms_degarKhadamat_content_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_sms_degarKhadamat_content' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#sms_degarKhadamat_content_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#sms_degarKhadamat_content_avatar7' + i + '').orakuploader({
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

                                                                                    $('#sms_degarKhadamat_content_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_sms_degarKhadamat_content' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_sms_degarKhadamat_content' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_sms_degarKhadamat_content', function () {
                                                                                    var id = '';
                                                                                    var k = $('#sms_degarKhadamat_content_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_sms_degarKhadamat_content' + id).remove();
                                                                                    $('#sms_degarKhadamat_content_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_sms_degarKhadamat_content-ads"><i
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
                                                <!-------------------article------------------->
                                                <div  id="content9" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $sms_title_article = get_tem_result($site, $la, "sms_title_article", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_title_article['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_title_article_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_title_article_title"
                                                                           value="<?= $sms_title_article['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="sms_title_article_text"
                                                                           value="<?= $sms_title_article['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="sms_title_article_link"
                                                                           value="<?= $sms_title_article['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_sms_article = get_tem_result($site, $la, "ValSelectActive_sms_article", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_sms_article"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_sms_article"
                                                                    name="select_type_sms_article">

                                                                <option <? if ($ValSelectActive_sms_article["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_sms_article["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_sms_article["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_sms_article_title" type="hidden"
                                                                   value="<?= $ValSelectActive_sms_article["title"] ?>">

                                                            <div class="tab-pane opt_sms_article sms_article_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_sms_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_sms_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_sms_article; $j++) {
                                                                                    $first_choice_sms_article = get_tem_result($site, $la, "first_choice_sms_article$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_sms_article['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_sms_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_sms_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_sms_article col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_sms_article_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_sms_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_sms_article['pic'] ?>">

                                                                                                        <select id="first_choice_sms_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_sms_article_cat"
                                                                                                                name="first_choice_sms_article_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_sms_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_sms_article<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_sms_article_new&id=" + $("#first_choice_sms_article_cat<?=$j?>").val() + "&value=" + $("#first_choice_sms_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_sms_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_sms_article_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_sms_article_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_article['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_article['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_article['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_sms_article_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_sms_article["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_sms_article_number<?= $j ?>">
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
                                                                                       id="first_choice_sms_article_count"
                                                                                       name="first_choice_sms_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_sms_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_sms_article').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_sms_article_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_sms_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_sms_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_sms_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_sms_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_sms_article col-md-4 input-group"><input type="hidden" id="first_choice_sms_article_subcat_val' + i + '"  name="first_choice_sms_article_subcat_val' + i + '" value=""> <select id="first_choice_sms_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_sms_article_cat" name="first_choice_sms_article_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_sms_article' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_sms_article_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_sms_article_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_sms_article_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_sms_article_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_sms_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_sms_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_sms_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_sms_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_sms_article' + id).remove();
                                                                                            $('#first_choice_sms_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_sms_article"><i
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

                                                            <div class="tab-pane opt_sms_article sms_article_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_sms_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_sms_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_sms_article; $j++) {
                                                                                    $second_choice_sms_article = get_tem_result($site, $la, "second_choice_sms_article$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_sms_article['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_sms_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_sms_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_sms_article col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_sms_article_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_sms_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_sms_article['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_sms_article_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_sms_article_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_sms_article['pic_adress'] ?>">

                                                                                                        <select id="second_choice_sms_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_sms_article_cat"
                                                                                                                name="second_choice_sms_article_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_sms_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_sms_article<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_sms_article_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_sms_article&id=" + $("#second_choice_sms_article_cat<?=$j?>").val() + "&value=" + $("#second_choice_sms_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_sms_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_sms_article_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_sms_article_content&id=" + $("#second_choice_sms_article_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_sms_article_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_sms_article_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_sms_article_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_sms_article_count"
                                                                                       name="second_choice_sms_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_sms_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_sms_article').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_sms_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_sms_article_neshane").change(function () {
                                                                                        var j = $("#second_choice_sms_article_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_sms_article' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_sms_article_neshane', function () {
                                                                                        var j = $("#second_choice_sms_article_count").val();
                                                                                        //  $(".second_choice_sms_article_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_article_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_sms_article_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_sms_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_sms_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_sms_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_sms_article col-md-3 input-group"><input type="hidden" id="second_choice_sms_article_subcat_val' + i + '"  name="second_choice_sms_article_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_sms_article_subcat_link' + i + '"  name="second_choice_sms_article_subcat_link' + i + '" value=""> <select id="second_choice_sms_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_sms_article_cat" name="second_choice_sms_article_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_sms_article' + i + '" class="col-md-3 input-group"></div><div id="second_choice_sms_article_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_sms_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_sms_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_sms_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_sms_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_sms_article' + id).remove();
                                                                                            $('#second_choice_sms_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_sms_article"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_sms_article sms_article_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_sms_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_sms_article%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_sms_article; $x++) {
                                                                                    $third_choice_sms_article = get_tem_result($site, $la, "third_choice_sms_article$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_sms_article['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_sms_article<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_sms_article"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_sms_article_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_sms_article["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_sms_article_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_sms_article_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_sms_article["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_sms_article_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_sms_article_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_sms_article<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_sms_article_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_sms_article_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_sms_article_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_sms_article<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_sms_article["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_sms_article<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_sms_article["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_sms_article["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_sms_article["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_sms_article_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_sms_article_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_sms_article_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_sms_article['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_sms_article_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_sms_article_text<?= $x ?>"><?= $third_choice_sms_article["text"] ?>

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
                                                                                       id="third_choice_sms_article_count"
                                                                                       name="third_choice_sms_article_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_sms_article-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_sms_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_sms_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-4 input-group"><input type="text" id="third_choice_sms_article_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_sms_article_title' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_sms_article_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_sms_article_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_sms_article_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_sms_article' + i + '" style="padding: 0px;"><div  id="third_choice_sms_article_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_sms_article_avatar7_link' + i + '" name="third_choice_sms_article_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_sms_article' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_sms_article_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_sms_article_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_sms_article_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_sms_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_sms_article_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_sms_article_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_sms_article_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_sms_article' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_sms_article' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_sms_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_sms_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_sms_article' + id).remove();
                                                                                            $('#third_choice_sms_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_sms_article-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_sms_article_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_sms_article"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_sms_article_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_sms_article').hide();
                                                                        $('.sms_article_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content10" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $sms_title_LightBox = get_tem_result($site, $la, "sms_title_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($sms_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="sms_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_title_LightBox_title"
                                                                           value="<?= $sms_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_sms_LightBox = get_tem_result($site, $la, "ValSelectActive_sms_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_sms_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_sms_LightBox"
                                                                    name="select_type_sms_LightBox">

                                                                <option <? if ($ValSelectActive_sms_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_sms_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_sms_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_sms_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_sms_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_sms_LightBox sms_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_sms_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_sms_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_sms_LightBox; $j++) {
                                                                                    $first_choice_sms_LightBox = get_tem_result($site, $la, "first_choice_sms_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_sms_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_sms_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_sms_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_sms_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_sms_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_sms_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_sms_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_sms_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_sms_LightBox_cat"
                                                                                                                name="first_choice_sms_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_sms_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_sms_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_sms_LightBox_new&id=" + $("#first_choice_sms_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_sms_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_sms_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_sms_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_sms_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_sms_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_sms_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_sms_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_sms_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_sms_LightBox_count"
                                                                                       name="first_choice_sms_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_sms_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_sms_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_sms_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_sms_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_sms_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_sms_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_sms_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_sms_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_sms_LightBox_subcat_val' + i + '"  name="first_choice_sms_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_sms_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_sms_LightBox_cat" name="first_choice_sms_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_sms_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_sms_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_sms_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_sms_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_sms_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_sms_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_sms_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_sms_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_sms_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_sms_LightBox' + id).remove();
                                                                                            $('#first_choice_sms_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_sms_LightBox"><i
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

                                                            <div class="tab-pane opt_sms_LightBox sms_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_sms_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_sms_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_sms_LightBox; $j++) {
                                                                                    $second_choice_sms_LightBox = get_tem_result($site, $la, "second_choice_sms_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_sms_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_sms_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_sms_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_sms_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_sms_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_sms_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_sms_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_sms_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_sms_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_sms_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_sms_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_sms_LightBox_cat"
                                                                                                                name="second_choice_sms_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_sms_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_sms_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_sms_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_sms_LightBox&id=" + $("#second_choice_sms_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_sms_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_sms_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_sms_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_sms_LightBox_content&id=" + $("#second_choice_sms_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_sms_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_sms_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_sms_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_sms_LightBox_count"
                                                                                       name="second_choice_sms_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_sms_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_sms_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_sms_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_sms_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_sms_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_sms_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_sms_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_sms_LightBox_count").val();
                                                                                        //  $(".second_choice_sms_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_sms_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_sms_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_sms_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_sms_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_sms_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_sms_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_sms_LightBox_subcat_val' + i + '"  name="second_choice_sms_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_sms_LightBox_subcat_link' + i + '"  name="second_choice_sms_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_sms_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_sms_LightBox_cat" name="second_choice_sms_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_sms_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_sms_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_sms_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_sms_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_sms_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_sms_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_sms_LightBox' + id).remove();
                                                                                            $('#second_choice_sms_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_sms_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_sms_LightBox sms_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_sms_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_sms_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_sms_LightBox; $x++) {
                                                                                    $third_choice_sms_LightBox = get_tem_result($site, $la, "third_choice_sms_LightBox$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_sms_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_sms_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_sms_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_sms_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_sms_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_sms_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_sms_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_sms_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_sms_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_sms_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_sms_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_sms_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_sms_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_sms_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_sms_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_sms_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_sms_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_sms_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_sms_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_sms_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_sms_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_sms_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_sms_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_sms_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_sms_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_sms_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_sms_LightBox_text<?= $x ?>"><?= $third_choice_sms_LightBox["text"] ?>

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
                                                                                       id="third_choice_sms_LightBox_count"
                                                                                       name="third_choice_sms_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_sms_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_sms_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_sms_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_sms_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_sms_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_sms_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_sms_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_sms_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_sms_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_sms_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_sms_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_sms_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_sms_LightBox_avatar7_link' + i + '" name="third_choice_sms_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_sms_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_sms_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_sms_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_sms_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_sms_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_sms_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_sms_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_sms_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_sms_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_sms_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_sms_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_sms_LightBox' + id).remove();
                                                                                            $('#third_choice_sms_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_sms_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_sms_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_sms_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_sms_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_sms_LightBox').hide();
                                                                        $('.sms_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------header_seo------------------->
                                                <div  id="content11" class="bhoechie-tab-content H1 ">
                                                    <? $sms_header_seo = get_tem_result($site, $la, "sms_header_seo", 'coms2', $coms_conect); ?>
                                                    <center>
                                                        <div class="col-md-12">
                                                            <label  class="col-md-3 control-label" >meta keyword</label>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" value="<?= $sms_header_seo['title'] ?>" id="header_seo_keyword" name="sms_header_seo_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" >meta Description</label>
                                                                <div class="form-group col-md-6">
                                                                    <textarea id="header_seo_desciption" name="sms_header_seo_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $sms_header_seo['text'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">title</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="sms_header_seo_pic"
                                                                           value="<?= $sms_header_seo ['pic'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="sms_header_seo_pic_adress"
                                                                                                                                                       value="<?=$sms_header_seo['pic_adress']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="sms_header_seo_pic_adress"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=sms_header_seo_pic_adress"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="sms_header_seo_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_sms_header_seo_pic_adress"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_sms_header_seo_pic_adress">
                                                                        <a href="<?= $sms_header_seo["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $sms_header_seo["pic_adress"] ?>" alt="<?= $sms_header_seo["pic_adress"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#sms_header_seo_pic_adress_avatar_orak').orakuploader({
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

                                                                            $('#sms_header_seo_pic_adress_avatar_orak').html("<?=$pic_str?>");
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
        //----------sms---------------------
        $(".H_rename_sms_box1").click(function () {
            $(this).hide();
            $('.H_rename_sms_box1_save').show();
            $(".H_input_rename_sms_box1").toggle(300);
        });
        $(".H_rename_sms_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_box1' + "&value=" + $(".H_input_rename_sms_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_box1 > span.temp").text($(".H_input_rename_sms_box1").val());
            $(this).hide();
            $('.H_rename_sms_box1').show();
            $(".H_input_rename_sms_box1").hide();
            $(".H_rename_sms_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_sms_box2").click(function () {
            $(this).hide();
            $('.H_rename_sms_box2_save').show();
            $(".H_input_rename_sms_box2").toggle(300);
        });
        $(".H_rename_sms_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_box2' + "&value=" + $(".H_input_rename_sms_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_box2 > span.temp").text($(".H_input_rename_sms_box2").val());
            $(this).hide();
            $('.H_rename_sms_box2').show();
            $(".H_input_rename_sms_box2").hide();
            $(".H_rename_sms_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_sms_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box3_save').show();
            $(".H_input_rename_sms_title_box3").toggle(300);
        });
        $(".H_rename_sms_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box3' + "&value=" + $(".H_input_rename_sms_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box3 > span.temp").text($(".H_input_rename_sms_title_box3").val());
            $(this).hide();
            $('.H_rename_sms_title_box3').show();
            $(".H_input_rename_sms_title_box3").hide();
            $(".H_rename_sms_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_sms_title_box4").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box4_save').show();
            $(".H_input_rename_sms_title_box4").toggle(300);
        });
        $(".H_rename_sms_title_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box4' + "&value=" + $(".H_input_rename_sms_title_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box4 > span.temp").text($(".H_input_rename_sms_title_box4").val());
            $(this).hide();
            $('.H_rename_sms_title_box4').show();
            $(".H_input_rename_sms_title_box4").hide();
            $(".H_rename_sms_title_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_sms_title_box5").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box5_save').show();
            $(".H_input_rename_sms_title_box5").toggle(300);
        });
        $(".H_rename_sms_title_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box5' + "&value=" + $(".H_input_rename_sms_title_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box5 > span.temp").text($(".H_input_rename_sms_title_box5").val());
            $(this).hide();
            $('.H_rename_sms_title_box5').show();
            $(".H_input_rename_sms_title_box5").hide();
            $(".H_rename_sms_title_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_sms_title_box6").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box6_save').show();
            $(".H_input_rename_sms_title_box6").toggle(300);
        });
        $(".H_rename_sms_title_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box6' + "&value=" + $(".H_input_rename_sms_title_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box6 > span.temp").text($(".H_input_rename_sms_title_box6").val());
            $(this).hide();
            $('.H_rename_sms_title_box6').show();
            $(".H_input_rename_sms_title_box6").hide();
            $(".H_rename_sms_title_box6.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_sms_title_box7").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box7_save').show();
            $(".H_input_rename_sms_title_box7").toggle(300);
        });
        $(".H_rename_sms_title_box7_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box7' + "&value=" + $(".H_input_rename_sms_title_box7").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box7 > span.temp").text($(".H_input_rename_sms_title_box7").val());
            $(this).hide();
            $('.H_rename_sms_title_box7').show();
            $(".H_input_rename_sms_title_box7").hide();
            $(".H_rename_sms_title_box7.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_sms_title_box8").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box8_save').show();
            $(".H_input_rename_sms_title_box8").toggle(300);
        });
        $(".H_rename_sms_title_box8_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box8' + "&value=" + $(".H_input_rename_sms_title_box8").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box8 > span.temp").text($(".H_input_rename_sms_title_box8").val());
            $(this).hide();
            $('.H_rename_sms_title_box8').show();
            $(".H_input_rename_sms_title_box8").hide();
            $(".H_rename_sms_title_box8.H_pos_color").css('transform', 'translateY(-24px)');
        });
   //-------------------------------
        $(".H_rename_sms_title_box9").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box9_save').show();
            $(".H_input_rename_sms_title_box9").toggle(300);
        });
        $(".H_rename_sms_title_box9_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box9' + "&value=" + $(".H_input_rename_sms_title_box9").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box9 > span.temp").text($(".H_input_rename_sms_title_box9").val());
            $(this).hide();
            $('.H_rename_sms_title_box9').show();
            $(".H_input_rename_sms_title_box9").hide();
            $(".H_rename_sms_title_box9.H_pos_color").css('transform', 'translateY(-24px)');
        });
//-------------------------------
        $(".H_rename_sms_title_box10").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box10_save').show();
            $(".H_input_rename_sms_title_box10").toggle(300);
        });
        $(".H_rename_sms_title_box10_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box10' + "&value=" + $(".H_input_rename_sms_title_box10").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box10 > span.temp").text($(".H_input_rename_sms_title_box10").val());
            $(this).hide();
            $('.H_rename_sms_title_box10').show();
            $(".H_input_rename_sms_title_box10").hide();
            $(".H_rename_sms_title_box10.H_pos_color").css('transform', 'translateY(-24px)');
        });
//-------------------------------
        $(".H_rename_sms_title_box11").click(function () {
            $(this).hide();
            $('.H_rename_sms_title_box11_save').show();
            $(".H_input_rename_sms_title_box11").toggle(300);
        });
        $(".H_rename_sms_title_box11_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'sms_title_box11' + "&value=" + $(".H_input_rename_sms_title_box11").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_sms_title_box11 > span.temp").text($(".H_input_rename_sms_title_box11").val());
            $(this).hide();
            $('.H_rename_sms_title_box11').show();
            $(".H_input_rename_sms_title_box11").hide();
            $(".H_rename_sms_title_box11.H_pos_color").css('transform', 'translateY(-24px)');
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
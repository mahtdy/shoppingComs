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



    ########################################################### vps ########################################################

    $vps_boxOne_pic_adress = 0;
    $vps_boxOne_pic_adress= injection_replace($_POST["vps_boxOne_pic_adress"]);
    $vps_boxOne_title = injection_replace($_POST["vps_boxOne_title"]);
    $vps_boxOne_text = injection_replace($_POST["vps_boxOne_text"]);
    $vps_boxOne_pic = injection_replace($_POST["vps_boxOne_pic"]);
    $vps_boxOne_pic = resize_image_M($vps_boxOne_pic,1350,550,$img_page_main,'');
    $vps_boxOne_pic_avatar_orak = injection_replace($_POST["vps_boxOne_pic_avatar_orak"][0]);
    if($vps_boxOne_pic_avatar_orak>""){
        $vps_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $vps_boxOne_pic_avatar_orak;
        $vps_boxOne_pic = resize_image_M($vps_boxOne_pic,1350,550,$img_page_main,'');

    }
    insert_templdate($site, $vps_boxOne_pic_adress, $la, $vps_boxOne_text, $vps_boxOne_title, '', $vps_boxOne_pic, "vps_boxOne", 'coms2', $coms_conect);

    $vps_content_BoxOne1_title= injection_replace($_POST["vps_content_BoxOne1_title"]);
    $vps_content_BoxOne1_link = injection_replace($_POST["vps_content_BoxOne1_link"]);
    $vps_content_BoxOne1_pic = injection_replace($_POST["vps_content_BoxOne1_pic"]);
    $vps_content_BoxOne1_text= injection_replace($_POST["vps_content_BoxOne1_text"]);
    $vps_content_BoxOne1_pic_adress = injection_replace($_POST["vps_content_BoxOne1_pic_adress"]);
    $vps_content_BoxOne1_pic_adress = resize_image_M($vps_content_BoxOne1_pic_adress,100,100,$img_page_main,'');
    $vps_content_BoxOne1_avatar7 = injection_replace($_POST["vps_content_BoxOne1_avatar7"][0]);
    if($vps_content_BoxOne1_avatar7>""){
        $vps_content_BoxOne1_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $vps_content_BoxOne1_avatar7;
        $vps_content_BoxOne1_pic_adress = resize_image_M($vps_content_BoxOne1_pic_adress,100,100,$img_page_main,'');

    }

    $vps_content_BoxOne2_text= injection_replace($_POST["vps_content_BoxOne2_text"]);
    if($vps_content_BoxOne1_title>"") {
        insert_templdate($site, $vps_content_BoxOne1_pic_adress, $la, $vps_content_BoxOne1_text, $vps_content_BoxOne1_title, $vps_content_BoxOne1_link, $vps_content_BoxOne1_pic, "vps_content_BoxOne1", 'coms2', $coms_conect);
        insert_templdate($site, '', $la, $vps_content_BoxOne2_text, '', '', '', "vps_content_BoxOne2", 'coms2', $coms_conect);
    }
//    menu box
    $vps_menubox_show_pic_adress = injection_replace_pic($_POST["vps_menubox_show_pic_adress"]);
    insert_templdate($site, $vps_menubox_show_pic_adress, $la, '', '', '', '', "vps_menubox_show", 'coms2', $coms_conect);

    $vps_menubox_links_del = "name like 'vps_menubox_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $vps_menubox_links_del, $coms_conect);
    $vps_menubox_links_count = injection_replace_pic($_POST["vps_menubox_links_count"]);
    for ($k = 1; $k <= $vps_menubox_links_count; $k++) {
        $vps_menubox_links_title = injection_replace_pic($_POST["vps_menubox_links_title{$k}"]);
        $vps_menubox_links_link = injection_replace_pic($_POST["vps_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $vps_menubox_links_title, $vps_menubox_links_link, '', "vps_menubox_links$k", 'coms2', $coms_conect);
    }
//    vps Specifications

    $vps_Specifications_box_pic_adress = injection_replace_pic($_POST["vps_Specifications_box_pic_adress"]);
    insert_templdate($site, $vps_Specifications_box_pic_adress, $la, '', '', '', '', "vps_Specifications_box", 'coms2', $coms_conect);


    $condition_vps_Specifications_boxOne = "name like 'vps_Specifications_boxOne%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_vps_Specifications_boxOne, $coms_conect);

    $condition_vps_Specifications_boxTwo = "name like 'vps_Specifications_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_vps_Specifications_boxTwo, $coms_conect);
    $vps_Specifications_boxOne_count = injection_replace_pic($_POST["vps_Specifications_boxOne_count"]);
    for ($x = 1; $x <= $vps_Specifications_boxOne_count; $x++) {
        $vps_Specifications_boxOne_title = injection_replace_pic($_POST["vps_Specifications_boxOne_title{$x}"]);
        $vps_Specifications_boxOne_link= injection_replace_pic($_POST["vps_Specifications_boxOne_link{$x}"]);
        $vps_Specifications_boxOne_pic_adress = injection_replace_pic($_POST["vps_Specifications_boxOne_pic_adress{$x}"]);
        $vps_Specifications_boxOne_pic_adress = resize_image_M($vps_Specifications_boxOne_pic_adress,148,200,$img_page_main,'');
        $vps_Specifications_boxOne_avatar7 = injection_replace($_POST["vps_Specifications_boxOne_avatar7{$x}"][0]);
        if ($vps_Specifications_boxOne_avatar7 > "") {
            $vps_Specifications_boxOne_pic_adress = 'http://' .$_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $vps_Specifications_boxOne_avatar7;
            $vps_Specifications_boxOne_pic_adress = resize_image_M($vps_Specifications_boxOne_pic_adress,148,200,$img_page_main,'');

        }
        $vps_Specifications_boxTwo_title = injection_replace_pic($_POST["vps_Specifications_boxTwo_title{$x}"]);
        $vps_Specifications_boxTwo_link= injection_replace_pic($_POST["vps_Specifications_boxTwo_link{$x}"]);
        $vps_Specifications_boxTwo_text = injection_replace_pic($_POST["vps_Specifications_boxTwo_text{$x}"]);

        if ($vps_Specifications_boxOne_title > "") {
            insert_templdate($site, $vps_Specifications_boxOne_pic_adress, $la, '', $vps_Specifications_boxOne_title, $vps_Specifications_boxOne_link, '', "vps_Specifications_boxOne$x", 'coms2', $coms_conect);
            insert_templdate($site, '', $la, $vps_Specifications_boxTwo_text, $vps_Specifications_boxTwo_title, $vps_Specifications_boxTwo_link, '', "vps_Specifications_boxTwo$x", 'coms2', $coms_conect);
        }
    }

//    vps box2
    $vps_boxTwo_pic_adress = 0;
    $vps_boxTwo_pic_adress= injection_replace($_POST["vps_boxTwo_pic_adress"]);
    $vps_boxTwo_text = injection_replace($_POST["vps_boxTwo_text"]);
    $vps_boxTwo_title = injection_replace($_POST["vps_boxTwo_title"]);
    $vps_boxTwo_pic = injection_replace($_POST["vps_boxTwo_pic"]);
    $vps_boxTwo_link = injection_replace($_POST["vps_boxTwo_link"]);
    insert_templdate($site, $vps_boxTwo_pic_adress, $la, $vps_boxTwo_text, $vps_boxTwo_title, $vps_boxTwo_link, $vps_boxTwo_pic, "vps_boxTwo", 'coms2', $coms_conect);


    $ValSelectActive_vps_boxTwo_title = injection_replace($_POST["ValSelectActive_vps_boxTwo_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_vps_boxTwo_title, '', '', "ValSelectActive_vps_boxTwo", 'coms2', $coms_conect);

    $condition_first_choice_vps_boxTwo = "name like 'first_choice_vps_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_vps_boxTwo, $coms_conect);
    $first_choice_vps_boxTwo_count = injection_replace_pic($_POST["first_choice_vps_boxTwo_count"]);
    for ($i = 1; $i <= $first_choice_vps_boxTwo_count; $i++) {

        $first_choice_vps_boxTwo_cat = injection_replace_pic($_POST["first_choice_vps_boxTwo_cat{$i}"]);
        $first_choice_vps_boxTwo_subcat_cat = injection_replace_pic($_POST["first_choice_vps_boxTwo_subcat_cat{$i}"]);
        $first_choice_vps_boxTwo_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_vps_boxTwo_Fixed_selection_cat{$i}"]);
        $first_choice_vps_boxTwo_number = injection_replace_pic($_POST["first_choice_vps_boxTwo_number{$i}"]);
        if ($first_choice_vps_boxTwo_subcat_cat > "")
            insert_templdate($site, $first_choice_vps_boxTwo_number, $la, $first_choice_vps_boxTwo_Fixed_selection_cat, '', $first_choice_vps_boxTwo_cat, $first_choice_vps_boxTwo_subcat_cat, "first_choice_vps_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_vps_boxTwo = "name like 'second_choice_vps_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_vps_boxTwo, $coms_conect);
    $second_choice_vps_boxTwo_count = injection_replace_pic($_POST["second_choice_vps_boxTwo_count"]);
    for ($i = 1; $i <= $second_choice_vps_boxTwo_count; $i++) {

        $second_choice_vps_boxTwo_cat = injection_replace_pic($_POST["second_choice_vps_boxTwo_cat{$i}"]);
        $second_choice_vps_boxTwo_subcat_cat = injection_replace_pic($_POST["second_choice_vps_boxTwo_subcat_cat{$i}"]);
        $second_choice_vps_boxTwo_subcat_cat_content = injection_replace_pic($_POST["second_choice_vps_boxTwo_subcat_cat_content{$i}"]);
        if ($second_choice_vps_boxTwo_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_vps_boxTwo_subcat_cat_content, $la, '', '', $second_choice_vps_boxTwo_cat, $second_choice_vps_boxTwo_subcat_cat, "second_choice_vps_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_vps_boxTwo = "name like 'third_choice_vps_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_vps_boxTwo, $coms_conect);
    $third_choice_vps_boxTwo_count = injection_replace_pic($_POST["third_choice_vps_boxTwo_count"]);
    for ($x = 1; $x <= $third_choice_vps_boxTwo_count; $x++) {


        $third_choice_vps_boxTwo_pic_adress = injection_replace_pic($_POST["third_choice_vps_boxTwo_pic_adress{$x}"]);
        $third_choice_vps_boxTwo_title = injection_replace_pic($_POST["third_choice_vps_boxTwo_title{$x}"]);
        $third_choice_vps_boxTwo_text = injection_replace_pic($_POST["third_choice_vps_boxTwo_text{$x}"]);

        $third_choice_vps_boxTwo_link = injection_replace_pic($_POST["third_choice_vps_boxTwo_link{$x}"]);
        $third_choice_vps_boxTwo_pic = injection_replace_pic($_POST["third_choice_vps_boxTwo_pic{$x}"]);
        $third_choice_vps_boxTwo_pic = resize_image_M($third_choice_vps_boxTwo_pic,40,40,$img_page_main,'');
        $third_choice_vps_boxTwo_avatar7 = injection_replace($_POST["third_choice_vps_boxTwo_avatar7{$x}"][0]);
        if ($third_choice_vps_boxTwo_avatar7 > "") {
            $third_choice_vps_boxTwo_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_vps_boxTwo_avatar7;
            $third_choice_vps_boxTwo_pic = resize_image_M($third_choice_vps_boxTwo_pic,40,40,$img_page_main,'');

        }
        if ($third_choice_vps_boxTwo_title > "") {
            insert_templdate($site, $third_choice_vps_boxTwo_pic_adress, $la, $third_choice_vps_boxTwo_text, $third_choice_vps_boxTwo_title, $third_choice_vps_boxTwo_link, $third_choice_vps_boxTwo_pic, "third_choice_vps_boxTwo$x", 'coms2', $coms_conect);
        }
    }
    //    box3
    $vps_boxThree_pic_adress = 0;
    $vps_boxThree_pic_adress= injection_replace($_POST["vps_boxThree_pic_adress"]);
    $vps_boxThree_title= injection_replace($_POST["vps_boxThree_title"]);
    $vps_boxThree_text= injection_replace($_POST["vps_boxThree_text"]);
    $vps_boxThree_pic= injection_replace($_POST["vps_boxThree_pic"]);
    $vps_boxThree_link= injection_replace($_POST["vps_boxThree_link"]);
    $vps_boxThree_link= resize_image_M($vps_boxThree_link,357,530,$img_page_main,'');
    $vps_boxThree_link_avatar_orak = injection_replace($_POST["vps_boxThree_link_avatar_orak"][0]);
    if ($vps_boxThree_link_avatar_orak > "") {
        $vps_boxThree_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $vps_boxThree_link_avatar_orak;
        $vps_boxThree_link= resize_image_M($vps_boxThree_link,357,530,$img_page_main,'');

    }
    insert_templdate($site, $vps_boxThree_pic_adress, $la, $vps_boxThree_text, $vps_boxThree_title, $vps_boxThree_link, $vps_boxThree_pic, "vps_boxThree", 'coms2', $coms_conect);

    $vps_show_faq_que_pic_adress = 0;
    $vps_show_faq_que_pic_adress= injection_replace($_POST["vps_show_faq_que_pic_adress"]);
    $vps_show_faq_que_pic = 0;
    $vps_show_faq_que_pic= injection_replace($_POST["vps_show_faq_que_pic"]);
    $cat_faq_text= injection_replace($_POST["cat_faq_text"]);
    $cat_qes_title= injection_replace($_POST["cat_qes_title"]);
    $vps_show_faq_que_link = injection_replace_pic($_POST["vps_show_faq_que_link"]);
    insert_templdate($site, $vps_show_faq_que_pic_adress, $la, $cat_faq_text, $cat_qes_title, $vps_show_faq_que_link, $vps_show_faq_que_pic, "vps_show_faq_que", 'coms2', $coms_conect);

    $vps_pop_faq_title= injection_replace($_POST["vps_pop_faq_title"]);
    $vps_pop_faq_text= injection_replace($_POST["vps_pop_faq_text"]);
    $vps_pop_faq_pic= injection_replace($_POST["vps_pop_faq_pic"]);
    $vps_pop_faq_link= injection_replace($_POST["vps_pop_faq_link"]);
    $vps_pop_faq_pic_adress= injection_replace($_POST["vps_pop_faq_pic_adress"]);
    insert_templdate($site, $vps_pop_faq_pic_adress, $la, $vps_pop_faq_text, $vps_pop_faq_title, $vps_pop_faq_link, $vps_pop_faq_pic, "vps_pop_faq", 'coms2', $coms_conect);


    //   article

    $vps_title_article_pic_adress = 0;
    $vps_title_article_pic_adress= injection_replace($_POST["vps_title_article_pic_adress"]);
    $vps_title_article_title= injection_replace($_POST["vps_title_article_title"]);
    $vps_title_article_text= injection_replace($_POST["vps_title_article_text"]);
    insert_templdate($site, $vps_title_article_pic_adress, $la, $vps_title_article_text, $vps_title_article_title, '', '', "vps_title_article", 'coms2', $coms_conect);

    $ValSelectActive_vps_article_title = injection_replace($_POST["ValSelectActive_vps_article_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_vps_article_title, '', '', "ValSelectActive_vps_article", 'coms2', $coms_conect);

    $condition_first_choice_vps_article = "name like 'first_choice_vps_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_vps_article, $coms_conect);
    $first_choice_vps_article_count = injection_replace_pic($_POST["first_choice_vps_article_count"]);
    for ($i = 1; $i <= $first_choice_vps_article_count; $i++) {

        $first_choice_vps_article_cat = injection_replace_pic($_POST["first_choice_vps_article_cat{$i}"]);
        $first_choice_vps_article_subcat_cat = injection_replace_pic($_POST["first_choice_vps_article_subcat_cat{$i}"]);
        $first_choice_vps_article_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_vps_article_Fixed_selection_cat{$i}"]);
        $first_choice_vps_article_number = injection_replace_pic($_POST["first_choice_vps_article_number{$i}"]);
        if ($first_choice_vps_article_subcat_cat > "")
            insert_templdate($site, $first_choice_vps_article_number, $la, $first_choice_vps_article_Fixed_selection_cat, '', $first_choice_vps_article_cat, $first_choice_vps_article_subcat_cat, "first_choice_vps_article$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_vps_article = "name like 'second_choice_vps_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_vps_article, $coms_conect);
    $second_choice_vps_article_count = injection_replace_pic($_POST["second_choice_vps_article_count"]);
    for ($i = 1; $i <= $second_choice_vps_article_count; $i++) {

        $second_choice_vps_article_cat = injection_replace_pic($_POST["second_choice_vps_article_cat{$i}"]);
        $second_choice_vps_article_subcat_cat = injection_replace_pic($_POST["second_choice_vps_article_subcat_cat{$i}"]);
        $second_choice_vps_article_subcat_cat_content = injection_replace_pic($_POST["second_choice_vps_article_subcat_cat_content{$i}"]);
        if ($second_choice_vps_article_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_vps_article_subcat_cat_content, $la, '', '', $second_choice_vps_article_cat, $second_choice_vps_article_subcat_cat, "second_choice_vps_article$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_vps_article = "name like 'third_choice_vps_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_vps_article, $coms_conect);
    $third_choice_vps_article_count = injection_replace_pic($_POST["third_choice_vps_article_count"]);
    for ($x = 1; $x <= $third_choice_vps_article_count; $x++) {

        $third_choice_vps_article_pic_adress = injection_replace_pic($_POST["third_choice_vps_article_pic_adress{$x}"]);
        $third_choice_vps_article_title = injection_replace_pic($_POST["third_choice_vps_article_title{$x}"]);
        $third_choice_vps_article_text = injection_replace_pic($_POST["third_choice_vps_article_text{$x}"]);


        $third_choice_vps_article_pic = injection_replace_pic($_POST["third_choice_vps_article_pic{$x}"]);
        $third_choice_vps_article_pic = resize_image_M($third_choice_vps_article_pic,58,43,$img_page_main,'');
        $third_choice_vps_article_avatar7 = injection_replace($_POST["third_choice_vps_article_avatar7{$x}"][0]);
        if ($third_choice_vps_article_avatar7 > "") {
            $third_choice_vps_article_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_vps_article_avatar7;
            $third_choice_vps_article_pic = resize_image_M($third_choice_vps_article_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_vps_article_title > "") {
            insert_templdate($site, $third_choice_vps_article_pic_adress, $la, $third_choice_vps_article_text, $third_choice_vps_article_title, '', $third_choice_vps_article_pic, "third_choice_vps_article$x", 'coms2', $coms_conect);
        }
    }

    //   Light box
    $vps_title_LightBox_pic_adress = 0;
    $vps_title_LightBox_pic_adress= injection_replace($_POST["vps_title_LightBox_pic_adress"]);
    $vps_title_LightBox_title= injection_replace($_POST["vps_title_LightBox_title"]);
    insert_templdate($site, $vps_title_LightBox_pic_adress, $la, '', $vps_title_LightBox_title, '', '', "vps_title_LightBox", 'coms2', $coms_conect);

    $ValSelectActive_vps_LightBox_title = injection_replace($_POST["ValSelectActive_vps_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_vps_LightBox_title, '', '', "ValSelectActive_vps_LightBox", 'coms2', $coms_conect);

    $condition_first_choice_vps_LightBox = "name like 'first_choice_vps_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_vps_LightBox, $coms_conect);
    $first_choice_vps_LightBox_count = injection_replace_pic($_POST["first_choice_vps_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_vps_LightBox_count; $i++) {

        $first_choice_vps_LightBox_cat = injection_replace_pic($_POST["first_choice_vps_LightBox_cat{$i}"]);
        $first_choice_vps_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_vps_LightBox_subcat_cat{$i}"]);
        $first_choice_vps_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_vps_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_vps_LightBox_number = injection_replace_pic($_POST["first_choice_vps_LightBox_number{$i}"]);
        if ($first_choice_vps_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_vps_LightBox_number, $la, $first_choice_vps_LightBox_Fixed_selection_cat, '', $first_choice_vps_LightBox_cat, $first_choice_vps_LightBox_subcat_cat, "first_choice_vps_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_vps_LightBox = "name like 'second_choice_vps_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_vps_LightBox, $coms_conect);
    $second_choice_vps_LightBox_count = injection_replace_pic($_POST["second_choice_vps_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_vps_LightBox_count; $i++) {

        $second_choice_vps_LightBox_cat = injection_replace_pic($_POST["second_choice_vps_LightBox_cat{$i}"]);
        $second_choice_vps_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_vps_LightBox_subcat_cat{$i}"]);
        $second_choice_vps_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_vps_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_vps_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_vps_LightBox_subcat_cat_content, $la, '', '', $second_choice_vps_LightBox_cat, $second_choice_vps_LightBox_subcat_cat, "second_choice_vps_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_vps_LightBox = "name like 'third_choice_vps_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_vps_LightBox, $coms_conect);
    $third_choice_vps_LightBox_count = injection_replace_pic($_POST["third_choice_vps_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_vps_LightBox_count; $x++) {

        $third_choice_vps_LightBox_title = injection_replace_pic($_POST["third_choice_vps_LightBox_title{$x}"]);
        $third_choice_vps_LightBox_text = injection_replace_pic($_POST["third_choice_vps_LightBox_text{$x}"]);
        $third_choice_vps_LightBox_link = injection_replace_pic($_POST["third_choice_vps_LightBox_link{$x}"]);
        $third_choice_vps_LightBox_pic = injection_replace_pic($_POST["third_choice_vps_LightBox_pic{$x}"]);
        $third_choice_vps_LightBox_pic = resize_image_M($third_choice_vps_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_vps_LightBox_avatar7 = injection_replace($_POST["third_choice_vps_LightBox_avatar7{$x}"][0]);
        if ($third_choice_vps_LightBox_avatar7 > "") {
            $third_choice_vps_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_vps_LightBox_avatar7;
            $third_choice_vps_LightBox_pic = resize_image_M($third_choice_vps_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_vps_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_vps_LightBox_text, $third_choice_vps_LightBox_title, $third_choice_vps_LightBox_link, $third_choice_vps_LightBox_pic, "third_choice_vps_LightBox$x", 'coms2', $coms_conect);
        }
    }
    //  header_seo
    $vps_header_seo_keyword= injection_replace($_POST["vps_header_seo_keyword"]);
    $vps_header_seo_desciption= injection_replace($_POST["vps_header_seo_desciption"]);
    $vps_header_seo_pic= injection_replace($_POST["vps_header_seo_pic"]);
    $vps_header_seo_pic_adress = injection_replace($_POST["vps_header_seo_pic_adress"]);
    $vps_header_seo_pic_adress = resize_image_M($vps_header_seo_pic_adress,20,20,$img_page_main,'');
    $vps_header_seo_pic_adress_avatar_orak = injection_replace($_POST["vps_header_seo_pic_adress_avatar_orak"][0]);
    if($vps_header_seo_pic_adress_avatar_orak>""){
        $vps_header_seo_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $vps_header_seo_pic_adress_avatar_orak;
        $vps_header_seo_pic_adress = resize_image_M($vps_header_seo_pic_adress,20,20,$img_page_main,'');

    }
    insert_templdate($site, $vps_header_seo_pic_adress, $la, $vps_header_seo_desciption, $vps_header_seo_keyword, '', $vps_header_seo_pic, "vps_header_seo", 'coms2', $coms_conect);


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
                                        <a class="z-link">vps</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------vps---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $vps_box1 = get_tem_result($site, $la, "vps_box1", 'coms2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_vps_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $vps_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_vps_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_vps_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_vps_box1 H_dis_none"
                                                               name="vps_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $vps_box2 = get_tem_result($site, $la, "vps_box2", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_vps_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $vps_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_vps_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_vps_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_vps_box2 H_dis_none"
                                                               name="vps_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $vps_title_box3 = get_tem_result($site, $la, "vps_title_box3", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_vps_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $vps_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_vps_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_vps_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_vps_title_box3 H_dis_none"
                                                               name="vps_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $vps_title_box4 = get_tem_result($site, $la, "vps_title_box4", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_vps_title_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $vps_title_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_vps_title_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_vps_title_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_vps_title_box4 H_dis_none"
                                                               name="vps_title_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $vps_title_box5 = get_tem_result($site, $la, "vps_title_box5", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_vps_title_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $vps_title_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_vps_title_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_vps_title_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_vps_title_box5 H_dis_none"
                                                               name="vps_title_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $vps_title_box6 = get_tem_result($site, $la, "vps_title_box6", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_vps_title_box6" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $vps_title_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_vps_title_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_vps_title_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_vps_title_box6 H_dis_none"
                                                               name="vps_title_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $vps_title_box7 = get_tem_result($site, $la, "vps_title_box7", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_vps_title_box7" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $vps_title_box7['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_vps_title_box7 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_vps_title_box7_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_vps_title_box7 H_dis_none"
                                                               name="vps_title_box7_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $vps_title_box8 = get_tem_result($site, $la, "vps_title_box8", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_vps_title_box8" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $vps_title_box8['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_vps_title_box8 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_vps_title_box8_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_vps_title_box8 H_dis_none"
                                                               name="vps_title_box8_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $vps_boxOne = get_tem_result($site, $la, "vps_boxOne", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($vps_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_boxOne_title"
                                                                           value="<?= $vps_boxOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_boxOne_text"
                                                                           value="<?= $vps_boxOne['text'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="vps_boxOne_pic"
                                                                                                                                                       value="<?=$vps_boxOne['pic']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="vps_boxOne_pic"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=vps_boxOne_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="vps_boxOne_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_vps_boxOne_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_vps_boxOne_pic">
                                                                        <a href="<?= $vps_boxOne["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $vps_boxOne["pic"] ?>" alt="<?= $vps_boxOne["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#vps_boxOne_pic_avatar_orak').orakuploader({
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

                                                                            $('#vps_boxOne_pic_avatar_orak').html("<?=$pic_str?>");
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
                                                                            $vps_content_BoxOne1 = get_tem_result($site, $la, "vps_content_BoxOne1", 'coms2', $coms_conect);
                                                                            $vps_content_BoxOne2 = get_tem_result($site, $la, "vps_content_BoxOne2", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choicedel_vps_content_BoxOne1"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="form-group col-md-12">

                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="vps_content_BoxOne1_title"
                                                                                                   value="<?= $vps_content_BoxOne1["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" عنوان اول"
                                                                                                   name="vps_content_BoxOne1_title">
                                                                                        </div>
                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="vps_content_BoxOne1_link"
                                                                                                   value="<?= $vps_content_BoxOne1["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دوم"
                                                                                                   name="vps_content_BoxOne1_link">
                                                                                        </div>


                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="vps_content_BoxOne1_pic_adress"
                                                                                                   value="<?=$vps_content_BoxOne1["pic_adress"]?>"

                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر"
                                                                                                   name="vps_content_BoxOne1_pic_adress"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=vps_content_BoxOne1_pic_adress"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                            <span class="input-group-addon H_neshane1 H_vps_content_BoxOne1"
                                                                                                  style="padding: 0px;">
                                                                                    <div id="vps_content_BoxOne1_avatar7"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="vps_content_BoxOne1_avatar7_link"
                                                                                       name="vps_content_BoxOne1_avatar7_link"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_vps_content_BoxOne1"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class=" col-md-1 input-group"
                                                                                             id="image_show_vps_content_BoxOne1">

                                                                                            <a href="<?= $vps_content_BoxOne1["pic_adress"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $vps_content_BoxOne1["pic_adress"] ?>"
                                                                                                     alt="<?= $vps_content_BoxOne1["title"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#vps_content_BoxOne1_avatar7').orakuploader({
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

                                                                                                $('#vps_content_BoxOne1_avatar7').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="vps_content_BoxOne1_pic"
                                                                                                   value="<?= $vps_content_BoxOne1["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="vps_content_BoxOne1_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="vps_content_BoxOne1_text"
                                                                                                   value="<?= $vps_content_BoxOne1["text"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="vps_content_BoxOne1_text">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="vps_content_BoxOne2_text"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="vps_content_BoxOne2_text"><?= $vps_content_BoxOne2["text"] ?>
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
                                                        <? $vps_menubox_show = get_tem_result($site, $la, "vps_menubox_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($vps_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_menubox_show_pic_adress"
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
                                                                            <? $count_vps_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'vps_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_vps_menubox_links; $k++) {
                                                                                $vps_menubox_links = get_tem_result($site, $la, "vps_menubox_links$k", 'coms2', $coms_conect);
                                                                                if ($vps_menubox_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_vps_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_vps_menubox_links"
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
                                                                                                           id="vps_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $vps_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="vps_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="vps_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $vps_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="vps_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_vps_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="vps_menubox_links_count"
                                                                                   name="vps_menubox_links_count"
                                                                                   value="<?= --$count_vps_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_vps_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_vps_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_vps_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="vps_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="vps_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="vps_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="vps_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_vps_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#vps_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_vps_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#vps_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_vps_menubox_links' + id).remove();
                                                                                        $('#vps_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_vps_menubox_links"><i
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
                                                <!-------------------Specifications box------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $vps_Specifications_box = get_tem_result($site, $la, "vps_Specifications_box", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($vps_Specifications_box['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_Specifications_box_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body"
                                                                     style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_vps_Specifications_boxOne = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'vps_Specifications_boxOne%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_vps_Specifications_boxOne; $x++) {
                                                                                $vps_Specifications_boxOne = get_tem_result($site, $la, "vps_Specifications_boxOne$x", 'coms2', $coms_conect);
                                                                                $vps_Specifications_boxTwo = get_tem_result($site, $la, "vps_Specifications_boxTwo$x", 'coms2', $coms_conect);
                                                                                if ($vps_Specifications_boxOne['title'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_vps_Specifications_boxOne<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_vps_Specifications_boxOne" style="margin-bottom: 120px!important"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>
                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="vps_Specifications_boxOne_title<?= $x ?>"
                                                                                                           value="<?= $vps_Specifications_boxOne["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="vps_Specifications_boxOne_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="vps_Specifications_boxOne_link<?= $x ?>"
                                                                                                           value="<?= $vps_Specifications_boxOne["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="مبلغ"
                                                                                                           name="vps_Specifications_boxOne_link<?= $x ?>">
                                                                                                </div>


                                                                                                <div class="col-md-5 input-group">
                                                                                                    <input type="text"
                                                                                                           id="vps_Specifications_boxOne_pic_adress<?= $x ?>"
                                                                                                           value="<?=$vps_Specifications_boxOne["pic_adress"]?>"

                                                                                                           class="form-control"
                                                                                                           placeholder=" تصویر"
                                                                                                           name="vps_Specifications_boxOne_pic_adress<?= $x ?>"
                                                                                                           style="direction: ltr;">
                                                                                                    <span class="input-group-addon"
                                                                                                          style="padding: 0px;"><a
                                                                                                                href="/filemanager/dialog.php?type=2&amp;field_id=vps_Specifications_boxOne_pic_adress<?= $x ?>"
                                                                                                                class="btn btn-success iframe-btn"
                                                                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                    class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                                    <span class="input-group-addon H_neshane1 H_vps_Specifications_boxOne<?= $x ?>"
                                                                                                          style="padding: 0px;">
                                                                                    <div id="vps_Specifications_boxOne_avatar7<?= $x ?>"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="vps_Specifications_boxOne_avatar7_link<?= $x ?>"
                                                                                       name="vps_Specifications_boxOne_avatar7_link<?= $x ?>"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                                </div>
                                                                                                <div class="ui-sortable red box"
                                                                                                     id="upload_type_vps_Specifications_boxOne<?= $x ?>"
                                                                                                     style="float:right;">
                                                                                                </div>
                                                                                                <div class=" col-md-1 input-group"
                                                                                                     id="image_show_vps_Specifications_boxOne<?= $x ?>">

                                                                                                    <a href="<?= $vps_Specifications_boxOne["pic_adress"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $vps_Specifications_boxOne["pic_adress"] ?>"
                                                                                                             alt="<?= $vps_Specifications_boxOne["text"] ?>">
                                                                                                    </a>

                                                                                                </div>

                                                                                                <script type="text/javascript">
                                                                                                    $(document).ready(function () {
                                                                                                        $('#vps_Specifications_boxOne_avatar7<?=$x?>').orakuploader({
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

                                                                                                        $('#vps_Specifications_boxOne_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                    });
                                                                                                </script>

                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="vps_Specifications_boxTwo_title<?= $x ?>"
                                                                                                           value="<?= $vps_Specifications_boxTwo["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان دکمه"
                                                                                                           name="vps_Specifications_boxTwo_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="vps_Specifications_boxTwo_link<?= $x ?>"
                                                                                                           value="<?= $vps_Specifications_boxTwo["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک دکمه"
                                                                                                           name="vps_Specifications_boxTwo_link<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="vps_Specifications_boxTwo_text<?= $x ?>"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="vps_Specifications_boxTwo_text<?= $x ?>"><?= $vps_Specifications_boxTwo["text"] ?>
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
                                                                                   id="vps_Specifications_boxOne_count"
                                                                                   name="vps_Specifications_boxOne_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_vps_Specifications_boxOne-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_vps_Specifications_boxOne' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_vps_Specifications_boxOne" id="' + i + '" for="family" style="margin-bottom: 120px!important"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="vps_Specifications_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان" name="vps_Specifications_boxOne_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="vps_Specifications_boxOne_link' + i + '" value="" class="form-control" placeholder="مبلغ" name="vps_Specifications_boxOne_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="vps_Specifications_boxOne_pic_adress' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="vps_Specifications_boxOne_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=vps_Specifications_boxOne_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_vps_Specifications_boxOne' + i + '" style="padding: 0px;"><div  id="vps_Specifications_boxOne_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="vps_Specifications_boxOne_avatar7_link' + i + '" name="vps_Specifications_boxOne_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_vps_Specifications_boxOne' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="vps_Specifications_boxTwo_title' + i + '" value="" class="form-control"   placeholder="عنوان دکمه" name="vps_Specifications_boxTwo_title'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="vps_Specifications_boxTwo_link' + i + '" value="" class="form-control"   placeholder="لینک دکمه" name="vps_Specifications_boxTwo_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="vps_Specifications_boxTwo_text' + i +'" class="form-control" placeholder="متن" name="vps_Specifications_boxTwo_text' + i +'"></textarea></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_vps_Specifications_boxOne' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#vps_Specifications_boxOne_count').val(i);

                                                                                        //--------orakuploader
                                                                                        $('#vps_Specifications_boxOne_avatar7' + i + '').orakuploader({
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

                                                                                        $('#vps_Specifications_boxOne_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                        $('.input-group-addon.H_vps_Specifications_boxOne' + i + '').find("div").first().next().css('width', '100px');
                                                                                        $('.input-group-addon.H_vps_Specifications_boxOne' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                        //    ---end orakuploader
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_vps_Specifications_boxOne', function () {
                                                                                        var id = '';
                                                                                        var k = $('#vps_Specifications_boxOne_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_vps_Specifications_boxOne' + id).remove();
                                                                                        $('#vps_Specifications_boxOne_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_vps_Specifications_boxOne-ads"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن
                                                                                لینک</a>
                                                                            </br>
                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------box2------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $vps_boxTwo = get_tem_result($site, $la, "vps_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($vps_boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_boxTwo_title"
                                                                           value="<?= $vps_boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_boxTwo_text"
                                                                           value="<?= $vps_boxTwo['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <? $ValSelectActive_vps_boxTwo = get_tem_result($site, $la, "ValSelectActive_vps_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_vps_boxTwo"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_vps_boxTwo"
                                                                    name="select_type_vps_boxTwo">

                                                                <option <? if ($ValSelectActive_vps_boxTwo["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_vps_boxTwo["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_vps_boxTwo["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_vps_boxTwo_title" type="hidden"
                                                                   value="<?= $ValSelectActive_vps_boxTwo["title"] ?>">

                                                            <div class="tab-pane opt_vps_boxTwo vps_boxTwo_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_vps_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_vps_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_vps_boxTwo; $j++) {
                                                                                    $first_choice_vps_boxTwo = get_tem_result($site, $la, "first_choice_vps_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_vps_boxTwo['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_vps_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_vps_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_vps_boxTwo col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_vps_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_vps_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_vps_boxTwo['pic'] ?>">

                                                                                                        <select id="first_choice_vps_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_vps_boxTwo_cat"
                                                                                                                name="first_choice_vps_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_vps_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_vps_boxTwo<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_vps_boxTwo_new&id=" + $("#first_choice_vps_boxTwo_cat<?=$j?>").val() + "&value=" + $("#first_choice_vps_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_vps_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_vps_boxTwo_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_vps_boxTwo_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_boxTwo['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_boxTwo['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_boxTwo['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_vps_boxTwo_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_vps_boxTwo["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_vps_boxTwo_number<?= $j ?>">
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
                                                                                       id="first_choice_vps_boxTwo_count"
                                                                                       name="first_choice_vps_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_vps_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_vps_boxTwo').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_vps_boxTwo_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_vps_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_vps_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_vps_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_vps_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_vps_boxTwo col-md-4 input-group"><input type="hidden" id="first_choice_vps_boxTwo_subcat_val' + i + '"  name="first_choice_vps_boxTwo_subcat_val' + i + '" value=""> <select id="first_choice_vps_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_vps_boxTwo_cat" name="first_choice_vps_boxTwo_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_vps_boxTwo' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_vps_boxTwo_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_vps_boxTwo_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_vps_boxTwo_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_vps_boxTwo_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_vps_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_vps_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_vps_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_vps_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_vps_boxTwo' + id).remove();
                                                                                            $('#first_choice_vps_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_vps_boxTwo"><i
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

                                                            <div class="tab-pane opt_vps_boxTwo vps_boxTwo_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_vps_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_vps_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_vps_boxTwo; $j++) {
                                                                                    $second_choice_vps_boxTwo = get_tem_result($site, $la, "second_choice_vps_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_vps_boxTwo['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_vps_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_vps_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_vps_boxTwo col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_vps_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_vps_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_vps_boxTwo['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_vps_boxTwo_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_vps_boxTwo_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_vps_boxTwo['pic_adress'] ?>">

                                                                                                        <select id="second_choice_vps_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_vps_boxTwo_cat"
                                                                                                                name="second_choice_vps_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_vps_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_vps_boxTwo<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_vps_boxTwo_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_vps_boxTwo&id=" + $("#second_choice_vps_boxTwo_cat<?=$j?>").val() + "&value=" + $("#second_choice_vps_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_vps_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_vps_boxTwo_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_vps_boxTwo_content&id=" + $("#second_choice_vps_boxTwo_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_vps_boxTwo_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_vps_boxTwo_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_vps_boxTwo_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_vps_boxTwo_count"
                                                                                       name="second_choice_vps_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_vps_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_vps_boxTwo').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_vps_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_vps_boxTwo_neshane").change(function () {
                                                                                        var j = $("#second_choice_vps_boxTwo_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_vps_boxTwo' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_vps_boxTwo_neshane', function () {
                                                                                        var j = $("#second_choice_vps_boxTwo_count").val();
                                                                                        //  $(".second_choice_vps_boxTwo_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_boxTwo_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_vps_boxTwo_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_vps_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_vps_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_vps_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_vps_boxTwo col-md-3 input-group"><input type="hidden" id="second_choice_vps_boxTwo_subcat_val' + i + '"  name="second_choice_vps_boxTwo_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_vps_boxTwo_subcat_link' + i + '"  name="second_choice_vps_boxTwo_subcat_link' + i + '" value=""> <select id="second_choice_vps_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_vps_boxTwo_cat" name="second_choice_vps_boxTwo_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_vps_boxTwo' + i + '" class="col-md-3 input-group"></div><div id="second_choice_vps_boxTwo_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_vps_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_vps_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_vps_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_vps_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_vps_boxTwo' + id).remove();
                                                                                            $('#second_choice_vps_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_vps_boxTwo"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_vps_boxTwo vps_boxTwo_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_vps_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_vps_boxTwo%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_vps_boxTwo; $x++) {
                                                                                    $third_choice_vps_boxTwo = get_tem_result($site, $la, "third_choice_vps_boxTwo$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_vps_boxTwo['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_vps_boxTwo<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_vps_boxTwo"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_vps_boxTwo_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_vps_boxTwo["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_vps_boxTwo_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_vps_boxTwo_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_vps_boxTwo["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_vps_boxTwo_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_vps_boxTwo_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_vps_boxTwo["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_vps_boxTwo_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_vps_boxTwo_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_vps_boxTwo<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_vps_boxTwo_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_vps_boxTwo_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_vps_boxTwo_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_vps_boxTwo<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_vps_boxTwo["pic"]!=""){?>
                                                                                                        <div class="input-group"
                                                                                                             id="image_show_third_choice_vps_boxTwo<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_vps_boxTwo["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_vps_boxTwo["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_vps_boxTwo["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_vps_boxTwo_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_vps_boxTwo_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_vps_boxTwo_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_vps_boxTwo['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_vps_boxTwo_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_vps_boxTwo_text<?= $x ?>"><?= $third_choice_vps_boxTwo["text"] ?>

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
                                                                                       id="third_choice_vps_boxTwo_count"
                                                                                       name="third_choice_vps_boxTwo_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_vps_boxTwo-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_vps_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_vps_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_vps_boxTwo_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_vps_boxTwo_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_vps_boxTwo_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_vps_boxTwo_link' + i + '" ></div><div class="col-md-4 input-group"> <input type="text" id="third_choice_vps_boxTwo_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_vps_boxTwo_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_vps_boxTwo_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_vps_boxTwo' + i + '" style="padding: 0px;"><div  id="third_choice_vps_boxTwo_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_vps_boxTwo_avatar7_link' + i + '" name="third_choice_vps_boxTwo_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_vps_boxTwo' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_vps_boxTwo_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_vps_boxTwo_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_vps_boxTwo_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_vps_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_vps_boxTwo_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_vps_boxTwo_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_vps_boxTwo_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_vps_boxTwo' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_vps_boxTwo' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_vps_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_vps_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_vps_boxTwo' + id).remove();
                                                                                            $('#third_choice_vps_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_vps_boxTwo-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_vps_boxTwo_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_vps_boxTwo"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_vps_boxTwo_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_vps_boxTwo').hide();
                                                                        $('.vps_boxTwo_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>


                                                    </center>
                                                </div>

                                                <!-------------------box3------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $vps_boxThree = get_tem_result($site, $la, "vps_boxThree", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($vps_boxThree['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_boxThree_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_boxThree_title"
                                                                           value="<?= $vps_boxThree['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_boxThree_text"
                                                                           value="<?= $vps_boxThree['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_boxThree_pic"
                                                                           value="<?= $vps_boxThree['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $vps_show_faq_que = get_tem_result($site, $la, "vps_show_faq_que", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «سوالات متداول» </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($vps_show_faq_que['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_show_faq_que_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_vps_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type='100' and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_faq_text' id='cat_faq_text' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $vps_show_faq_que['text'])
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
                                                                           type="checkbox" <? if ($vps_show_faq_que['pic'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_show_faq_que_pic"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_vps_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type=99 and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_qes_title' id='cat_qes_title' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $vps_show_faq_que['title'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">

                                                        <? $vps_pop_faq = get_tem_result($site, $la, "vps_pop_faq", 'coms2', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اطلاعات داخل پاپاپ »</h5><br>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_pop_faq_title"
                                                                           value="<?= $vps_pop_faq['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_pop_faq_text"
                                                                           value="<?= $vps_pop_faq['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان سمت چپ</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_pop_faq_pic"
                                                                           value="<?= $vps_pop_faq['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن شعار</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_pop_faq_link"
                                                                           value="<?= $vps_pop_faq['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="vps_pop_faq_pic_adress"
                                                                           value="<?= $vps_pop_faq['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="vps_show_faq_que_link"
                                                                           value="<?= $vps_show_faq_que['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="vps_boxThree_link"
                                                                               value="<?=$vps_boxThree['link']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="vps_boxThree_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=vps_boxThree_link"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="vps_boxThree_link_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_vps_boxThree_link"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_vps_boxThree_link">
                                                                        <a href="<?= $vps_boxThree["link"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $vps_boxThree["link"] ?>" alt="<?= $vps_boxThree["link"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#vps_boxThree_link_avatar_orak').orakuploader({
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

                                                                            $('#vps_boxThree_link_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------article------------------->
                                                <div  id="content6" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $vps_title_article = get_tem_result($site, $la, "vps_title_article", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($vps_title_article['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_title_article_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_title_article_title"
                                                                           value="<?= $vps_title_article['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_title_article_text"
                                                                           value="<?= $vps_title_article['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_vps_article = get_tem_result($site, $la, "ValSelectActive_vps_article", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_vps_article"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_vps_article"
                                                                    name="select_type_vps_article">

                                                                <option <? if ($ValSelectActive_vps_article["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_vps_article["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_vps_article["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_vps_article_title" type="hidden"
                                                                   value="<?= $ValSelectActive_vps_article["title"] ?>">

                                                            <div class="tab-pane opt_vps_article vps_article_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_vps_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_vps_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_vps_article; $j++) {
                                                                                    $first_choice_vps_article = get_tem_result($site, $la, "first_choice_vps_article$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_vps_article['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_vps_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_vps_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_vps_article col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_vps_article_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_vps_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_vps_article['pic'] ?>">

                                                                                                        <select id="first_choice_vps_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_vps_article_cat"
                                                                                                                name="first_choice_vps_article_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_vps_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_vps_article<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_vps_article_new&id=" + $("#first_choice_vps_article_cat<?=$j?>").val() + "&value=" + $("#first_choice_vps_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_vps_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_vps_article_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_vps_article_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_article['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_article['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_article['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_vps_article_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_vps_article["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_vps_article_number<?= $j ?>">
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
                                                                                       id="first_choice_vps_article_count"
                                                                                       name="first_choice_vps_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_vps_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_vps_article').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_vps_article_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_vps_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_vps_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_vps_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_vps_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_vps_article col-md-4 input-group"><input type="hidden" id="first_choice_vps_article_subcat_val' + i + '"  name="first_choice_vps_article_subcat_val' + i + '" value=""> <select id="first_choice_vps_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_vps_article_cat" name="first_choice_vps_article_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_vps_article' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_vps_article_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_vps_article_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_vps_article_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_vps_article_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_vps_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_vps_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_vps_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_vps_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_vps_article' + id).remove();
                                                                                            $('#first_choice_vps_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_vps_article"><i
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

                                                            <div class="tab-pane opt_vps_article vps_article_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_vps_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_vps_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_vps_article; $j++) {
                                                                                    $second_choice_vps_article = get_tem_result($site, $la, "second_choice_vps_article$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_vps_article['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_vps_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_vps_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_vps_article col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_vps_article_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_vps_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_vps_article['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_vps_article_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_vps_article_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_vps_article['pic_adress'] ?>">

                                                                                                        <select id="second_choice_vps_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_vps_article_cat"
                                                                                                                name="second_choice_vps_article_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_vps_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_vps_article<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_vps_article_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_vps_article&id=" + $("#second_choice_vps_article_cat<?=$j?>").val() + "&value=" + $("#second_choice_vps_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_vps_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_vps_article_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_vps_article_content&id=" + $("#second_choice_vps_article_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_vps_article_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_vps_article_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_vps_article_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_vps_article_count"
                                                                                       name="second_choice_vps_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_vps_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_vps_article').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_vps_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_vps_article_neshane").change(function () {
                                                                                        var j = $("#second_choice_vps_article_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_vps_article' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_vps_article_neshane', function () {
                                                                                        var j = $("#second_choice_vps_article_count").val();
                                                                                        //  $(".second_choice_vps_article_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_article_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_vps_article_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_vps_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_vps_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_vps_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_vps_article col-md-3 input-group"><input type="hidden" id="second_choice_vps_article_subcat_val' + i + '"  name="second_choice_vps_article_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_vps_article_subcat_link' + i + '"  name="second_choice_vps_article_subcat_link' + i + '" value=""> <select id="second_choice_vps_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_vps_article_cat" name="second_choice_vps_article_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_vps_article' + i + '" class="col-md-3 input-group"></div><div id="second_choice_vps_article_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_vps_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_vps_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_vps_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_vps_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_vps_article' + id).remove();
                                                                                            $('#second_choice_vps_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_vps_article"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_vps_article vps_article_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_vps_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_vps_article%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_vps_article; $x++) {
                                                                                    $third_choice_vps_article = get_tem_result($site, $la, "third_choice_vps_article$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_vps_article['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_vps_article<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_vps_article"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_vps_article_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_vps_article["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_vps_article_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_vps_article_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_vps_article["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_vps_article_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_vps_article_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_vps_article<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_vps_article_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_vps_article_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_vps_article_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_vps_article<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_vps_article["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_vps_article<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_vps_article["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_vps_article["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_vps_article["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_vps_article_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_vps_article_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_vps_article_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_vps_article['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_vps_article_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_vps_article_text<?= $x ?>"><?= $third_choice_vps_article["text"] ?>

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
                                                                                       id="third_choice_vps_article_count"
                                                                                       name="third_choice_vps_article_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_vps_article-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_vps_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_vps_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-4 input-group"><input type="text" id="third_choice_vps_article_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_vps_article_title' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_vps_article_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_vps_article_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_vps_article_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_vps_article' + i + '" style="padding: 0px;"><div  id="third_choice_vps_article_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_vps_article_avatar7_link' + i + '" name="third_choice_vps_article_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_vps_article' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_vps_article_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_vps_article_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_vps_article_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_vps_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_vps_article_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_vps_article_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_vps_article_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_vps_article' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_vps_article' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_vps_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_vps_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_vps_article' + id).remove();
                                                                                            $('#third_choice_vps_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_vps_article-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_vps_article_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_vps_article"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_vps_article_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_vps_article').hide();
                                                                        $('.vps_article_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content7" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $vps_title_LightBox = get_tem_result($site, $la, "vps_title_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($vps_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="vps_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_title_LightBox_title"
                                                                           value="<?= $vps_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_vps_LightBox = get_tem_result($site, $la, "ValSelectActive_vps_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_vps_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_vps_LightBox"
                                                                    name="select_type_vps_LightBox">

                                                                <option <? if ($ValSelectActive_vps_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_vps_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_vps_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_vps_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_vps_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_vps_LightBox vps_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_vps_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_vps_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_vps_LightBox; $j++) {
                                                                                    $first_choice_vps_LightBox = get_tem_result($site, $la, "first_choice_vps_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_vps_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_vps_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_vps_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_vps_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_vps_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_vps_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_vps_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_vps_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_vps_LightBox_cat"
                                                                                                                name="first_choice_vps_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_vps_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_vps_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_vps_LightBox_new&id=" + $("#first_choice_vps_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_vps_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_vps_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_vps_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_vps_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_vps_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_vps_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_vps_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_vps_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_vps_LightBox_count"
                                                                                       name="first_choice_vps_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_vps_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_vps_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_vps_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_vps_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_vps_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_vps_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_vps_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_vps_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_vps_LightBox_subcat_val' + i + '"  name="first_choice_vps_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_vps_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_vps_LightBox_cat" name="first_choice_vps_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_vps_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_vps_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_vps_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_vps_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_vps_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_vps_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_vps_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_vps_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_vps_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_vps_LightBox' + id).remove();
                                                                                            $('#first_choice_vps_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_vps_LightBox"><i
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

                                                            <div class="tab-pane opt_vps_LightBox vps_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_vps_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_vps_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_vps_LightBox; $j++) {
                                                                                    $second_choice_vps_LightBox = get_tem_result($site, $la, "second_choice_vps_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_vps_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_vps_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_vps_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_vps_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_vps_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_vps_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_vps_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_vps_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_vps_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_vps_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_vps_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_vps_LightBox_cat"
                                                                                                                name="second_choice_vps_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_vps_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_vps_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_vps_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_vps_LightBox&id=" + $("#second_choice_vps_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_vps_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_vps_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_vps_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_vps_LightBox_content&id=" + $("#second_choice_vps_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_vps_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_vps_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_vps_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_vps_LightBox_count"
                                                                                       name="second_choice_vps_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_vps_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_vps_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_vps_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_vps_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_vps_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_vps_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_vps_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_vps_LightBox_count").val();
                                                                                        //  $(".second_choice_vps_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_vps_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_vps_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_vps_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_vps_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_vps_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_vps_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_vps_LightBox_subcat_val' + i + '"  name="second_choice_vps_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_vps_LightBox_subcat_link' + i + '"  name="second_choice_vps_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_vps_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_vps_LightBox_cat" name="second_choice_vps_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_vps_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_vps_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_vps_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_vps_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_vps_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_vps_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_vps_LightBox' + id).remove();
                                                                                            $('#second_choice_vps_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_vps_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_vps_LightBox vps_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_vps_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_vps_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_vps_LightBox; $x++) {
                                                                                    $third_choice_vps_LightBox = get_tem_result($site, $la, "third_choice_vps_LightBox$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_vps_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_vps_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_vps_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_vps_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_vps_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_vps_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_vps_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_vps_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_vps_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_vps_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_vps_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_vps_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_vps_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_vps_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_vps_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_vps_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_vps_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_vps_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_vps_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_vps_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_vps_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_vps_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_vps_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_vps_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_vps_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_vps_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_vps_LightBox_text<?= $x ?>"><?= $third_choice_vps_LightBox["text"] ?>

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
                                                                                       id="third_choice_vps_LightBox_count"
                                                                                       name="third_choice_vps_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_vps_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_vps_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_vps_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_vps_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_vps_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_vps_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_vps_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_vps_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_vps_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_vps_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_vps_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_vps_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_vps_LightBox_avatar7_link' + i + '" name="third_choice_vps_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_vps_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_vps_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_vps_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_vps_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_vps_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_vps_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_vps_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_vps_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_vps_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_vps_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_vps_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_vps_LightBox' + id).remove();
                                                                                            $('#third_choice_vps_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_vps_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_vps_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_vps_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_vps_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_vps_LightBox').hide();
                                                                        $('.vps_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>

                                                <!-------------------header_seo------------------->
                                                <div  id="content8" class="bhoechie-tab-content H1 ">
                                                    <? $vps_header_seo = get_tem_result($site, $la, "vps_header_seo", 'coms2', $coms_conect); ?>
                                                    <center>
                                                        <div class="col-md-12">
                                                            <label  class="col-md-3 control-label" >meta keyword</label>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" value="<?= $vps_header_seo['title'] ?>" id="header_seo_keyword" name="vps_header_seo_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" >meta Description</label>
                                                                <div class="form-group col-md-6">
                                                                    <textarea id="header_seo_desciption" name="vps_header_seo_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $vps_header_seo['text'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">title</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="vps_header_seo_pic"
                                                                           value="<?= $vps_header_seo ['pic'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="vps_header_seo_pic_adress"
                                                                                                                                                       value="<?=$vps_header_seo['pic_adress']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="vps_header_seo_pic_adress"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=vps_header_seo_pic_adress"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="vps_header_seo_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_vps_header_seo_pic_adress"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_vps_header_seo_pic_adress">
                                                                        <a href="<?= $vps_header_seo["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $vps_header_seo["pic_adress"] ?>" alt="<?= $vps_header_seo["pic_adress"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#vps_header_seo_pic_adress_avatar_orak').orakuploader({
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

                                                                            $('#vps_header_seo_pic_adress_avatar_orak').html("<?=$pic_str?>");
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
        //----------vps---------------------
        $(".H_rename_vps_box1").click(function () {
            $(this).hide();
            $('.H_rename_vps_box1_save').show();
            $(".H_input_rename_vps_box1").toggle(300);
        });
        $(".H_rename_vps_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'vps_box1' + "&value=" + $(".H_input_rename_vps_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_vps_box1 > span.temp").text($(".H_input_rename_vps_box1").val());
            $(this).hide();
            $('.H_rename_vps_box1').show();
            $(".H_input_rename_vps_box1").hide();
            $(".H_rename_vps_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_vps_box2").click(function () {
            $(this).hide();
            $('.H_rename_vps_box2_save').show();
            $(".H_input_rename_vps_box2").toggle(300);
        });
        $(".H_rename_vps_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'vps_box2' + "&value=" + $(".H_input_rename_vps_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_vps_box2 > span.temp").text($(".H_input_rename_vps_box2").val());
            $(this).hide();
            $('.H_rename_vps_box2').show();
            $(".H_input_rename_vps_box2").hide();
            $(".H_rename_vps_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_vps_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_vps_title_box3_save').show();
            $(".H_input_rename_vps_title_box3").toggle(300);
        });
        $(".H_rename_vps_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'vps_title_box3' + "&value=" + $(".H_input_rename_vps_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_vps_title_box3 > span.temp").text($(".H_input_rename_vps_title_box3").val());
            $(this).hide();
            $('.H_rename_vps_title_box3').show();
            $(".H_input_rename_vps_title_box3").hide();
            $(".H_rename_vps_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_vps_title_box4").click(function () {
            $(this).hide();
            $('.H_rename_vps_title_box4_save').show();
            $(".H_input_rename_vps_title_box4").toggle(300);
        });
        $(".H_rename_vps_title_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'vps_title_box4' + "&value=" + $(".H_input_rename_vps_title_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_vps_title_box4 > span.temp").text($(".H_input_rename_vps_title_box4").val());
            $(this).hide();
            $('.H_rename_vps_title_box4').show();
            $(".H_input_rename_vps_title_box4").hide();
            $(".H_rename_vps_title_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_vps_title_box5").click(function () {
            $(this).hide();
            $('.H_rename_vps_title_box5_save').show();
            $(".H_input_rename_vps_title_box5").toggle(300);
        });
        $(".H_rename_vps_title_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'vps_title_box5' + "&value=" + $(".H_input_rename_vps_title_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_vps_title_box5 > span.temp").text($(".H_input_rename_vps_title_box5").val());
            $(this).hide();
            $('.H_rename_vps_title_box5').show();
            $(".H_input_rename_vps_title_box5").hide();
            $(".H_rename_vps_title_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_vps_title_box6").click(function () {
            $(this).hide();
            $('.H_rename_vps_title_box6_save').show();
            $(".H_input_rename_vps_title_box6").toggle(300);
        });
        $(".H_rename_vps_title_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'vps_title_box6' + "&value=" + $(".H_input_rename_vps_title_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_vps_title_box6 > span.temp").text($(".H_input_rename_vps_title_box6").val());
            $(this).hide();
            $('.H_rename_vps_title_box6').show();
            $(".H_input_rename_vps_title_box6").hide();
            $(".H_rename_vps_title_box6.H_pos_color").css('transform', 'translateY(-24px)');
        });

        //-------------------------------

        $(".H_rename_vps_title_box7").click(function () {
            $(this).hide();
            $('.H_rename_vps_title_box7_save').show();
            $(".H_input_rename_vps_title_box7").toggle(300);
        });
        $(".H_rename_vps_title_box7_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'vps_title_box7' + "&value=" + $(".H_input_rename_vps_title_box7").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_vps_title_box7 > span.temp").text($(".H_input_rename_vps_title_box7").val());
            $(this).hide();
            $('.H_rename_vps_title_box7').show();
            $(".H_input_rename_vps_title_box7").hide();
            $(".H_rename_vps_title_box7.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_vps_title_box8").click(function () {
            $(this).hide();
            $('.H_rename_vps_title_box8_save').show();
            $(".H_input_rename_vps_title_box8").toggle(300);
        });
        $(".H_rename_vps_title_box8_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'vps_title_box8' + "&value=" + $(".H_input_rename_vps_title_box8").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_vps_title_box8 > span.temp").text($(".H_input_rename_vps_title_box8").val());
            $(this).hide();
            $('.H_rename_vps_title_box8').show();
            $(".H_input_rename_vps_title_box8").hide();
            $(".H_rename_vps_title_box8.H_pos_color").css('transform', 'translateY(-24px)');
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
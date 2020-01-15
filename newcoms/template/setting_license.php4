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



    ########################################################### license ########################################################

    $license_boxOne_pic_adress = 0;
    $license_boxOne_pic_adress= injection_replace($_POST["license_boxOne_pic_adress"]);
    $license_boxOne_title = injection_replace($_POST["license_boxOne_title"]);
    $license_boxOne_text = injection_replace($_POST["license_boxOne_text"]);
    $license_boxOne_pic = injection_replace($_POST["license_boxOne_pic"]);
    $license_boxOne_pic = resize_image_M($license_boxOne_pic,1350,550,$img_page_main,'');
    $license_boxOne_pic_avatar_orak = injection_replace($_POST["license_boxOne_pic_avatar_orak"][0]);
    if($license_boxOne_pic_avatar_orak>""){
        $license_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $license_boxOne_pic_avatar_orak;
        $license_boxOne_pic = resize_image_M($license_boxOne_pic,1350,550,$img_page_main,'');

    }
    insert_templdate($site, $license_boxOne_pic_adress, $la, $license_boxOne_text, $license_boxOne_title, '', $license_boxOne_pic, "license_boxOne", 'coms2', $coms_conect);

    $license_content_BoxOne1_title= injection_replace($_POST["license_content_BoxOne1_title"]);
    $license_content_BoxOne1_link = injection_replace($_POST["license_content_BoxOne1_link"]);
    $license_content_BoxOne1_pic = injection_replace($_POST["license_content_BoxOne1_pic"]);
    $license_content_BoxOne1_text= injection_replace($_POST["license_content_BoxOne1_text"]);
    $license_content_BoxOne1_pic_adress = injection_replace($_POST["license_content_BoxOne1_pic_adress"]);
    $license_content_BoxOne1_pic_adress = resize_image_M($license_content_BoxOne1_pic_adress,100,100,$img_page_main,'');
    $license_content_BoxOne1_avatar7 = injection_replace($_POST["license_content_BoxOne1_avatar7"][0]);
    if($license_content_BoxOne1_avatar7>""){
        $license_content_BoxOne1_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $license_content_BoxOne1_avatar7;
        $license_content_BoxOne1_pic_adress = resize_image_M($license_content_BoxOne1_pic_adress,100,100,$img_page_main,'');

    }

    $license_content_BoxOne2_text= injection_replace($_POST["license_content_BoxOne2_text"]);
    if($license_content_BoxOne1_title>"") {
        insert_templdate($site, $license_content_BoxOne1_pic_adress, $la, $license_content_BoxOne1_text, $license_content_BoxOne1_title, $license_content_BoxOne1_link, $license_content_BoxOne1_pic, "license_content_BoxOne1", 'coms2', $coms_conect);
        insert_templdate($site, '', $la, $license_content_BoxOne2_text, '', '', '', "license_content_BoxOne2", 'coms2', $coms_conect);
    }
//    menu box
    $license_menubox_show_pic_adress = injection_replace_pic($_POST["license_menubox_show_pic_adress"]);
    insert_templdate($site, $license_menubox_show_pic_adress, $la, '', '', '', '', "license_menubox_show", 'coms2', $coms_conect);

    $license_menubox_links_del = "name like 'license_menubox_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $license_menubox_links_del, $coms_conect);
    $license_menubox_links_count = injection_replace_pic($_POST["license_menubox_links_count"]);
    for ($k = 1; $k <= $license_menubox_links_count; $k++) {
        $license_menubox_links_title = injection_replace_pic($_POST["license_menubox_links_title{$k}"]);
        $license_menubox_links_link = injection_replace_pic($_POST["license_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $license_menubox_links_title, $license_menubox_links_link, '', "license_menubox_links$k", 'coms2', $coms_conect);
    }
//    license Specifications

    $license_Specifications_box_pic_adress = injection_replace_pic($_POST["license_Specifications_box_pic_adress"]);
    insert_templdate($site, $license_Specifications_box_pic_adress, $la, '', '', '', '', "license_Specifications_box", 'coms2', $coms_conect);


    $condition_license_Specifications_boxOne = "name like 'license_Specifications_boxOne%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_license_Specifications_boxOne, $coms_conect);

    $condition_license_Specifications_boxTwo = "name like 'license_Specifications_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_license_Specifications_boxTwo, $coms_conect);
    $license_Specifications_boxOne_count = injection_replace_pic($_POST["license_Specifications_boxOne_count"]);
    for ($x = 1; $x <= $license_Specifications_boxOne_count; $x++) {
        $license_Specifications_boxOne_title = injection_replace_pic($_POST["license_Specifications_boxOne_title{$x}"]);
        $license_Specifications_boxOne_link= injection_replace_pic($_POST["license_Specifications_boxOne_link{$x}"]);
        $license_Specifications_boxOne_pic_adress = injection_replace_pic($_POST["license_Specifications_boxOne_pic_adress{$x}"]);
        $license_Specifications_boxOne_pic_adress = resize_image_M($license_Specifications_boxOne_pic_adress,148,200,$img_page_main,'');
        $license_Specifications_boxOne_avatar7 = injection_replace($_POST["license_Specifications_boxOne_avatar7{$x}"][0]);
        if ($license_Specifications_boxOne_avatar7 > "") {
            $license_Specifications_boxOne_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $license_Specifications_boxOne_avatar7;
            $license_Specifications_boxOne_pic_adress = resize_image_M($license_Specifications_boxOne_pic_adress,148,200,$img_page_main,'');

        }
        $license_Specifications_boxTwo_title = injection_replace_pic($_POST["license_Specifications_boxTwo_title{$x}"]);
        $license_Specifications_boxTwo_link= injection_replace_pic($_POST["license_Specifications_boxTwo_link{$x}"]);
        $license_Specifications_boxTwo_text = injection_replace_pic($_POST["license_Specifications_boxTwo_text{$x}"]);

        if ($license_Specifications_boxOne_title > "") {
            insert_templdate($site, $license_Specifications_boxOne_pic_adress, $la, '', $license_Specifications_boxOne_title, $license_Specifications_boxOne_link, '', "license_Specifications_boxOne$x", 'coms2', $coms_conect);
            insert_templdate($site, '', $la, $license_Specifications_boxTwo_text, $license_Specifications_boxTwo_title, $license_Specifications_boxTwo_link, '', "license_Specifications_boxTwo$x", 'coms2', $coms_conect);
        }
    }

//    license box2
    $license_boxTwo_pic_adress = 0;
    $license_boxTwo_pic_adress= injection_replace($_POST["license_boxTwo_pic_adress"]);
    $license_boxTwo_text = injection_replace($_POST["license_boxTwo_text"]);
    $license_boxTwo_title = injection_replace($_POST["license_boxTwo_title"]);
    $license_boxTwo_pic = injection_replace($_POST["license_boxTwo_pic"]);
    $license_boxTwo_link = injection_replace($_POST["license_boxTwo_link"]);
    insert_templdate($site, $license_boxTwo_pic_adress, $la, $license_boxTwo_text, $license_boxTwo_title, $license_boxTwo_link, $license_boxTwo_pic, "license_boxTwo", 'coms2', $coms_conect);


    $ValSelectActive_license_boxTwo_title = injection_replace($_POST["ValSelectActive_license_boxTwo_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_license_boxTwo_title, '', '', "ValSelectActive_license_boxTwo", 'coms2', $coms_conect);

    $condition_first_choice_license_boxTwo = "name like 'first_choice_license_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_license_boxTwo, $coms_conect);
    $first_choice_license_boxTwo_count = injection_replace_pic($_POST["first_choice_license_boxTwo_count"]);
    for ($i = 1; $i <= $first_choice_license_boxTwo_count; $i++) {

        $first_choice_license_boxTwo_cat = injection_replace_pic($_POST["first_choice_license_boxTwo_cat{$i}"]);
        $first_choice_license_boxTwo_subcat_cat = injection_replace_pic($_POST["first_choice_license_boxTwo_subcat_cat{$i}"]);
        $first_choice_license_boxTwo_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_license_boxTwo_Fixed_selection_cat{$i}"]);
        $first_choice_license_boxTwo_number = injection_replace_pic($_POST["first_choice_license_boxTwo_number{$i}"]);
        if ($first_choice_license_boxTwo_subcat_cat > "")
            insert_templdate($site, $first_choice_license_boxTwo_number, $la, $first_choice_license_boxTwo_Fixed_selection_cat, '', $first_choice_license_boxTwo_cat, $first_choice_license_boxTwo_subcat_cat, "first_choice_license_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_license_boxTwo = "name like 'second_choice_license_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_license_boxTwo, $coms_conect);
    $second_choice_license_boxTwo_count = injection_replace_pic($_POST["second_choice_license_boxTwo_count"]);
    for ($i = 1; $i <= $second_choice_license_boxTwo_count; $i++) {

        $second_choice_license_boxTwo_cat = injection_replace_pic($_POST["second_choice_license_boxTwo_cat{$i}"]);
        $second_choice_license_boxTwo_subcat_cat = injection_replace_pic($_POST["second_choice_license_boxTwo_subcat_cat{$i}"]);
        $second_choice_license_boxTwo_subcat_cat_content = injection_replace_pic($_POST["second_choice_license_boxTwo_subcat_cat_content{$i}"]);
        if ($second_choice_license_boxTwo_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_license_boxTwo_subcat_cat_content, $la, '', '', $second_choice_license_boxTwo_cat, $second_choice_license_boxTwo_subcat_cat, "second_choice_license_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_license_boxTwo = "name like 'third_choice_license_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_license_boxTwo, $coms_conect);
    $third_choice_license_boxTwo_count = injection_replace_pic($_POST["third_choice_license_boxTwo_count"]);
    for ($x = 1; $x <= $third_choice_license_boxTwo_count; $x++) {


        $third_choice_license_boxTwo_pic_adress = injection_replace_pic($_POST["third_choice_license_boxTwo_pic_adress{$x}"]);
        $third_choice_license_boxTwo_title = injection_replace_pic($_POST["third_choice_license_boxTwo_title{$x}"]);
        $third_choice_license_boxTwo_text = injection_replace_pic($_POST["third_choice_license_boxTwo_text{$x}"]);

        $third_choice_license_boxTwo_link = injection_replace_pic($_POST["third_choice_license_boxTwo_link{$x}"]);
        $third_choice_license_boxTwo_pic = injection_replace_pic($_POST["third_choice_license_boxTwo_pic{$x}"]);
        $third_choice_license_boxTwo_pic = resize_image_M($third_choice_license_boxTwo_pic,40,40,$img_page_main,'');
        $third_choice_license_boxTwo_avatar7 = injection_replace($_POST["third_choice_license_boxTwo_avatar7{$x}"][0]);
        if ($third_choice_license_boxTwo_avatar7 > "") {
            $third_choice_license_boxTwo_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_license_boxTwo_avatar7;
            $third_choice_license_boxTwo_pic = resize_image_M($third_choice_license_boxTwo_pic,40,40,$img_page_main,'');

        }
        if ($third_choice_license_boxTwo_title > "") {
            insert_templdate($site, $third_choice_license_boxTwo_pic_adress, $la, $third_choice_license_boxTwo_text, $third_choice_license_boxTwo_title, $third_choice_license_boxTwo_link, $third_choice_license_boxTwo_pic, "third_choice_license_boxTwo$x", 'coms2', $coms_conect);
        }
    }
    //    box3
    $license_boxThree_pic_adress = 0;
    $license_boxThree_pic_adress= injection_replace($_POST["license_boxThree_pic_adress"]);
    $license_boxThree_title= injection_replace($_POST["license_boxThree_title"]);
    $license_boxThree_text= injection_replace($_POST["license_boxThree_text"]);
    $license_boxThree_pic= injection_replace($_POST["license_boxThree_pic"]);
    $license_boxThree_link= injection_replace($_POST["license_boxThree_link"]);
    $license_boxThree_link= resize_image_M($license_boxThree_link,357,530,$img_page_main,'');
    $license_boxThree_link_avatar_orak = injection_replace($_POST["license_boxThree_link_avatar_orak"][0]);
    if ($license_boxThree_link_avatar_orak > "") {
        $license_boxThree_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $license_boxThree_link_avatar_orak;
        $license_boxThree_link= resize_image_M($license_boxThree_link,357,530,$img_page_main,'');

    }
    insert_templdate($site, $license_boxThree_pic_adress, $la, $license_boxThree_text, $license_boxThree_title, $license_boxThree_link, $license_boxThree_pic, "license_boxThree", 'coms2', $coms_conect);

    $license_show_faq_que_pic_adress = 0;
    $license_show_faq_que_pic_adress= injection_replace($_POST["license_show_faq_que_pic_adress"]);
    $license_show_faq_que_pic = 0;
    $license_show_faq_que_pic= injection_replace($_POST["license_show_faq_que_pic"]);
    $cat_faq_text= injection_replace($_POST["cat_faq_text"]);
    $cat_qes_title= injection_replace($_POST["cat_qes_title"]);
    $license_show_faq_que_link = injection_replace_pic($_POST["license_show_faq_que_link"]);
    insert_templdate($site, $license_show_faq_que_pic_adress, $la, $cat_faq_text, $cat_qes_title, $license_show_faq_que_link, $license_show_faq_que_pic, "license_show_faq_que", 'coms2', $coms_conect);

    $license_pop_faq_title= injection_replace($_POST["license_pop_faq_title"]);
    $license_pop_faq_text= injection_replace($_POST["license_pop_faq_text"]);
    $license_pop_faq_pic= injection_replace($_POST["license_pop_faq_pic"]);
    $license_pop_faq_link= injection_replace($_POST["license_pop_faq_link"]);
    $license_pop_faq_pic_adress= injection_replace($_POST["license_pop_faq_pic_adress"]);
    insert_templdate($site, $license_pop_faq_pic_adress, $la, $license_pop_faq_text, $license_pop_faq_title, $license_pop_faq_link, $license_pop_faq_pic, "license_pop_faq", 'coms2', $coms_conect);



    //   box8
    $license_degarKhadamat_pic_adress = 0;
    $license_degarKhadamat_pic_adress= injection_replace($_POST["license_degarKhadamat_pic_adress"]);
    $license_degarKhadamat_title= injection_replace($_POST["license_degarKhadamat_title"]);
    $license_degarKhadamat_text= injection_replace($_POST["license_degarKhadamat_text"]);
    insert_templdate($site, $license_degarKhadamat_pic_adress, $la, $license_degarKhadamat_text, $license_degarKhadamat_title, '', '', "license_degarKhadamat", 'coms2', $coms_conect);

    $condition_license_degarKhadamat_content = "name like 'license_degarKhadamat_content%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_license_degarKhadamat_content, $coms_conect);
    $license_degarKhadamat_content_count = injection_replace_pic($_POST["license_degarKhadamat_content_count"]);
    for ($x = 1; $x <= $license_degarKhadamat_content_count; $x++) {

        $license_degarKhadamat_content_text = injection_replace_pic($_POST["license_degarKhadamat_content_text{$x}"]);
        $license_degarKhadamat_content_title = injection_replace_pic($_POST["license_degarKhadamat_content_title{$x}"]);
        $license_degarKhadamat_content_link = injection_replace_pic($_POST["license_degarKhadamat_content_link{$x}"]);
        $license_degarKhadamat_content_pic = injection_replace_pic($_POST["license_degarKhadamat_content_pic{$x}"]);
        $license_degarKhadamat_content_pic = resize_image_M($license_degarKhadamat_content_pic,88,76,$img_page_main,'');
        $license_degarKhadamat_content_avatar7 = injection_replace($_POST["license_degarKhadamat_content_avatar7{$x}"][0]);
        if ($license_degarKhadamat_content_avatar7 > "") {
            $license_degarKhadamat_content_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $license_degarKhadamat_content_avatar7;
            $license_degarKhadamat_content_pic = resize_image_M($license_degarKhadamat_content_pic,88,76,$img_page_main,'');

        }
        if ($license_degarKhadamat_content_title > "") {
            insert_templdate($site, $license_degarKhadamat_content_pic, $la, $license_degarKhadamat_content_text, $license_degarKhadamat_content_title, $license_degarKhadamat_content_link, '', "license_degarKhadamat_content$x", 'coms2', $coms_conect);
        }
    }
    //   article

    $license_title_article_pic_adress = 0;
    $license_title_article_pic_adress= injection_replace($_POST["license_title_article_pic_adress"]);
    $license_title_article_title= injection_replace($_POST["license_title_article_title"]);
    $license_title_article_text= injection_replace($_POST["license_title_article_text"]);
    insert_templdate($site, $license_title_article_pic_adress, $la, $license_title_article_text, $license_title_article_title, '', '', "license_title_article", 'coms2', $coms_conect);

    $ValSelectActive_license_article_title = injection_replace($_POST["ValSelectActive_license_article_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_license_article_title, '', '', "ValSelectActive_license_article", 'coms2', $coms_conect);

    $condition_first_choice_license_article = "name like 'first_choice_license_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_license_article, $coms_conect);
    $first_choice_license_article_count = injection_replace_pic($_POST["first_choice_license_article_count"]);
    for ($i = 1; $i <= $first_choice_license_article_count; $i++) {

        $first_choice_license_article_cat = injection_replace_pic($_POST["first_choice_license_article_cat{$i}"]);
        $first_choice_license_article_subcat_cat = injection_replace_pic($_POST["first_choice_license_article_subcat_cat{$i}"]);
        $first_choice_license_article_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_license_article_Fixed_selection_cat{$i}"]);
        $first_choice_license_article_number = injection_replace_pic($_POST["first_choice_license_article_number{$i}"]);
        if ($first_choice_license_article_subcat_cat > "")
            insert_templdate($site, $first_choice_license_article_number, $la, $first_choice_license_article_Fixed_selection_cat, '', $first_choice_license_article_cat, $first_choice_license_article_subcat_cat, "first_choice_license_article$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_license_article = "name like 'second_choice_license_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_license_article, $coms_conect);
    $second_choice_license_article_count = injection_replace_pic($_POST["second_choice_license_article_count"]);
    for ($i = 1; $i <= $second_choice_license_article_count; $i++) {

        $second_choice_license_article_cat = injection_replace_pic($_POST["second_choice_license_article_cat{$i}"]);
        $second_choice_license_article_subcat_cat = injection_replace_pic($_POST["second_choice_license_article_subcat_cat{$i}"]);
        $second_choice_license_article_subcat_cat_content = injection_replace_pic($_POST["second_choice_license_article_subcat_cat_content{$i}"]);
        if ($second_choice_license_article_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_license_article_subcat_cat_content, $la, '', '', $second_choice_license_article_cat, $second_choice_license_article_subcat_cat, "second_choice_license_article$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_license_article = "name like 'third_choice_license_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_license_article, $coms_conect);
    $third_choice_license_article_count = injection_replace_pic($_POST["third_choice_license_article_count"]);
    for ($x = 1; $x <= $third_choice_license_article_count; $x++) {

        $third_choice_license_article_pic_adress = injection_replace_pic($_POST["third_choice_license_article_pic_adress{$x}"]);
        $third_choice_license_article_title = injection_replace_pic($_POST["third_choice_license_article_title{$x}"]);
        $third_choice_license_article_text = injection_replace_pic($_POST["third_choice_license_article_text{$x}"]);


        $third_choice_license_article_pic = injection_replace_pic($_POST["third_choice_license_article_pic{$x}"]);
        $third_choice_license_article_pic = resize_image_M($third_choice_license_article_pic,58,43,$img_page_main,'');
        $third_choice_license_article_avatar7 = injection_replace($_POST["third_choice_license_article_avatar7{$x}"][0]);
        if ($third_choice_license_article_avatar7 > "") {
            $third_choice_license_article_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_license_article_avatar7;
            $third_choice_license_article_pic = resize_image_M($third_choice_license_article_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_license_article_title > "") {
            insert_templdate($site, $third_choice_license_article_pic_adress, $la, $third_choice_license_article_text, $third_choice_license_article_title, '', $third_choice_license_article_pic, "third_choice_license_article$x", 'coms2', $coms_conect);
        }
    }

    //   Light box
    $license_title_LightBox_pic_adress = 0;
    $license_title_LightBox_pic_adress= injection_replace($_POST["license_title_LightBox_pic_adress"]);
    $license_title_LightBox_title= injection_replace($_POST["license_title_LightBox_title"]);
    insert_templdate($site, $license_title_LightBox_pic_adress, $la, '', $license_title_LightBox_title, '', '', "license_title_LightBox", 'coms2', $coms_conect);

    $ValSelectActive_license_LightBox_title = injection_replace($_POST["ValSelectActive_license_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_license_LightBox_title, '', '', "ValSelectActive_license_LightBox", 'coms2', $coms_conect);

    $condition_first_choice_license_LightBox = "name like 'first_choice_license_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_license_LightBox, $coms_conect);
    $first_choice_license_LightBox_count = injection_replace_pic($_POST["first_choice_license_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_license_LightBox_count; $i++) {

        $first_choice_license_LightBox_cat = injection_replace_pic($_POST["first_choice_license_LightBox_cat{$i}"]);
        $first_choice_license_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_license_LightBox_subcat_cat{$i}"]);
        $first_choice_license_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_license_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_license_LightBox_number = injection_replace_pic($_POST["first_choice_license_LightBox_number{$i}"]);
        if ($first_choice_license_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_license_LightBox_number, $la, $first_choice_license_LightBox_Fixed_selection_cat, '', $first_choice_license_LightBox_cat, $first_choice_license_LightBox_subcat_cat, "first_choice_license_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_license_LightBox = "name like 'second_choice_license_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_license_LightBox, $coms_conect);
    $second_choice_license_LightBox_count = injection_replace_pic($_POST["second_choice_license_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_license_LightBox_count; $i++) {

        $second_choice_license_LightBox_cat = injection_replace_pic($_POST["second_choice_license_LightBox_cat{$i}"]);
        $second_choice_license_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_license_LightBox_subcat_cat{$i}"]);
        $second_choice_license_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_license_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_license_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_license_LightBox_subcat_cat_content, $la, '', '', $second_choice_license_LightBox_cat, $second_choice_license_LightBox_subcat_cat, "second_choice_license_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_license_LightBox = "name like 'third_choice_license_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_license_LightBox, $coms_conect);
    $third_choice_license_LightBox_count = injection_replace_pic($_POST["third_choice_license_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_license_LightBox_count; $x++) {

        $third_choice_license_LightBox_title = injection_replace_pic($_POST["third_choice_license_LightBox_title{$x}"]);
        $third_choice_license_LightBox_text = injection_replace_pic($_POST["third_choice_license_LightBox_text{$x}"]);
        $third_choice_license_LightBox_link = injection_replace_pic($_POST["third_choice_license_LightBox_link{$x}"]);
        $third_choice_license_LightBox_pic = injection_replace_pic($_POST["third_choice_license_LightBox_pic{$x}"]);
        $third_choice_license_LightBox_pic = resize_image_M($third_choice_license_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_license_LightBox_avatar7 = injection_replace($_POST["third_choice_license_LightBox_avatar7{$x}"][0]);
        if ($third_choice_license_LightBox_avatar7 > "") {
            $third_choice_license_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_license_LightBox_avatar7;
            $third_choice_license_LightBox_pic = resize_image_M($third_choice_license_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_license_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_license_LightBox_text, $third_choice_license_LightBox_title, $third_choice_license_LightBox_link, $third_choice_license_LightBox_pic, "third_choice_license_LightBox$x", 'coms2', $coms_conect);
        }
    }
//  header_seo
    $license_header_seo_keyword= injection_replace($_POST["license_header_seo_keyword"]);
    $license_header_seo_desciption= injection_replace($_POST["license_header_seo_desciption"]);
    $license_header_seo_pic= injection_replace($_POST["license_header_seo_pic"]);
    $license_header_seo_pic_adress = injection_replace($_POST["license_header_seo_pic_adress"]);
    $license_header_seo_pic_adress = resize_image_M($license_header_seo_pic_adress,20,20,$img_page_main,'');
    $license_header_seo_pic_adress_avatar_orak = injection_replace($_POST["license_header_seo_pic_adress_avatar_orak"][0]);
    if($license_header_seo_pic_adress_avatar_orak>""){
        $license_header_seo_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $license_header_seo_pic_adress_avatar_orak;
        $license_header_seo_pic_adress = resize_image_M($license_header_seo_pic_adress,20,20,$img_page_main,'');

    }
    insert_templdate($site, $license_header_seo_pic_adress, $la, $license_header_seo_desciption, $license_header_seo_keyword, '', $license_header_seo_pic, "license_header_seo", 'coms2', $coms_conect);

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
                                        <a class="z-link">license</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------license---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $license_box1 = get_tem_result($site, $la, "license_box1", 'coms2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_license_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $license_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_box1 H_dis_none"
                                                               name="license_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $license_box2 = get_tem_result($site, $la, "license_box2", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_license_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $license_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_box2 H_dis_none"
                                                               name="license_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $license_title_box3 = get_tem_result($site, $la, "license_title_box3", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_license_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $license_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_title_box3 H_dis_none"
                                                               name="license_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $license_title_box4 = get_tem_result($site, $la, "license_title_box4", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_license_title_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $license_title_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_title_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_title_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_title_box4 H_dis_none"
                                                               name="license_title_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $license_title_box5 = get_tem_result($site, $la, "license_title_box5", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_license_title_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $license_title_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_title_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_title_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_title_box5 H_dis_none"
                                                               name="license_title_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $license_title_box6 = get_tem_result($site, $la, "license_title_box6", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_license_title_box6" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $license_title_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_title_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_title_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_title_box6 H_dis_none"
                                                               name="license_title_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $license_title_box7 = get_tem_result($site, $la, "license_title_box7", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_license_title_box7" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $license_title_box7['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_title_box7 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_title_box7_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_title_box7 H_dis_none"
                                                               name="license_title_box7_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $license_title_box8 = get_tem_result($site, $la, "license_title_box8", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_license_title_box8" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $license_title_box8['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_title_box8 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_title_box8_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_title_box8 H_dis_none"
                                                               name="license_title_box8_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $license_title_box9 = get_tem_result($site, $la, "license_title_box9", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_license_title_box9" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $license_title_box9['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_license_title_box9 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_license_title_box9_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_license_title_box9 H_dis_none"
                                                               name="license_title_box9_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $license_boxOne = get_tem_result($site, $la, "license_boxOne", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_boxOne_title"
                                                                           value="<?= $license_boxOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_boxOne_text"
                                                                           value="<?= $license_boxOne['text'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="license_boxOne_pic"
                                                                                                                                                       value="<?=$license_boxOne['pic']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="license_boxOne_pic"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=license_boxOne_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="license_boxOne_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_license_boxOne_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_license_boxOne_pic">
                                                                        <a href="<?= $license_boxOne["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $license_boxOne["pic"] ?>" alt="<?= $license_boxOne["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#license_boxOne_pic_avatar_orak').orakuploader({
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

                                                                            $('#license_boxOne_pic_avatar_orak').html("<?=$pic_str?>");
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
                                                                            $license_content_BoxOne1 = get_tem_result($site, $la, "license_content_BoxOne1", 'coms2', $coms_conect);
                                                                            $license_content_BoxOne2 = get_tem_result($site, $la, "license_content_BoxOne2", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choicedel_license_content_BoxOne1"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="form-group col-md-12">

                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="license_content_BoxOne1_title"
                                                                                                   value="<?= $license_content_BoxOne1["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" عنوان اول"
                                                                                                   name="license_content_BoxOne1_title">
                                                                                        </div>
                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="license_content_BoxOne1_link"
                                                                                                   value="<?= $license_content_BoxOne1["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دوم"
                                                                                                   name="license_content_BoxOne1_link">
                                                                                        </div>


                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="license_content_BoxOne1_pic_adress"
                                                                                                   value="<?=$license_content_BoxOne1["pic_adress"]?>"

                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر"
                                                                                                   name="license_content_BoxOne1_pic_adress"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=license_content_BoxOne1_pic_adress"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                            <span class="input-group-addon H_neshane1 H_license_content_BoxOne1"
                                                                                                  style="padding: 0px;">
                                                                                    <div id="license_content_BoxOne1_avatar7"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="license_content_BoxOne1_avatar7_link"
                                                                                       name="license_content_BoxOne1_avatar7_link"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_license_content_BoxOne1"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class=" col-md-1 input-group"
                                                                                             id="image_show_license_content_BoxOne1">

                                                                                            <a href="<?= $license_content_BoxOne1["pic_adress"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $license_content_BoxOne1["pic_adress"] ?>"
                                                                                                     alt="<?= $license_content_BoxOne1["title"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#license_content_BoxOne1_avatar7').orakuploader({
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

                                                                                                $('#license_content_BoxOne1_avatar7').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="license_content_BoxOne1_pic"
                                                                                                   value="<?= $license_content_BoxOne1["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="license_content_BoxOne1_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="license_content_BoxOne1_text"
                                                                                                   value="<?= $license_content_BoxOne1["text"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="license_content_BoxOne1_text">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="license_content_BoxOne2_text"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="license_content_BoxOne2_text"><?= $license_content_BoxOne2["text"] ?>
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
                                                        <? $license_menubox_show = get_tem_result($site, $la, "license_menubox_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_menubox_show_pic_adress"
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
                                                                            <? $count_license_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'license_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_license_menubox_links; $k++) {
                                                                                $license_menubox_links = get_tem_result($site, $la, "license_menubox_links$k", 'coms2', $coms_conect);
                                                                                if ($license_menubox_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_license_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_license_menubox_links"
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
                                                                                                           id="license_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $license_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="license_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="license_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $license_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="license_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_license_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="license_menubox_links_count"
                                                                                   name="license_menubox_links_count"
                                                                                   value="<?= --$count_license_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_license_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_license_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_license_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="license_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="license_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="license_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="license_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_license_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#license_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_license_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#license_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_license_menubox_links' + id).remove();
                                                                                        $('#license_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_license_menubox_links"><i
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
                                                        <? $license_Specifications_box = get_tem_result($site, $la, "license_Specifications_box", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_Specifications_box['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_Specifications_box_pic_adress"
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
                                                                            $count1_license_Specifications_boxOne = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'license_Specifications_boxOne%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_license_Specifications_boxOne; $x++) {
                                                                                $license_Specifications_boxOne = get_tem_result($site, $la, "license_Specifications_boxOne$x", 'coms2', $coms_conect);
                                                                                $license_Specifications_boxTwo = get_tem_result($site, $la, "license_Specifications_boxTwo$x", 'coms2', $coms_conect);
                                                                                if ($license_Specifications_boxOne['title'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_license_Specifications_boxOne<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_license_Specifications_boxOne" style="margin-bottom: 120px!important"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>
                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="license_Specifications_boxOne_title<?= $x ?>"
                                                                                                           value="<?= $license_Specifications_boxOne["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="license_Specifications_boxOne_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="license_Specifications_boxOne_link<?= $x ?>"
                                                                                                           value="<?= $license_Specifications_boxOne["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="مبلغ"
                                                                                                           name="license_Specifications_boxOne_link<?= $x ?>">
                                                                                                </div>


                                                                                                <div class="col-md-5 input-group">
                                                                                                    <input type="text"
                                                                                                           id="license_Specifications_boxOne_pic_adress<?= $x ?>"
                                                                                                           value="<?=$license_Specifications_boxOne["pic_adress"]?>"

                                                                                                           class="form-control"
                                                                                                           placeholder=" تصویر"
                                                                                                           name="license_Specifications_boxOne_pic_adress<?= $x ?>"
                                                                                                           style="direction: ltr;">
                                                                                                    <span class="input-group-addon"
                                                                                                          style="padding: 0px;"><a
                                                                                                                href="/filemanager/dialog.php?type=2&amp;field_id=license_Specifications_boxOne_pic_adress<?= $x ?>"
                                                                                                                class="btn btn-success iframe-btn"
                                                                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                    class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                                    <span class="input-group-addon H_neshane1 H_license_Specifications_boxOne<?= $x ?>"
                                                                                                          style="padding: 0px;">
                                                                                    <div id="license_Specifications_boxOne_avatar7<?= $x ?>"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="license_Specifications_boxOne_avatar7_link<?= $x ?>"
                                                                                       name="license_Specifications_boxOne_avatar7_link<?= $x ?>"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                                </div>
                                                                                                <div class="ui-sortable red box"
                                                                                                     id="upload_type_license_Specifications_boxOne<?= $x ?>"
                                                                                                     style="float:right;">
                                                                                                </div>
                                                                                                <div class=" col-md-1 input-group"
                                                                                                     id="image_show_license_Specifications_boxOne<?= $x ?>">

                                                                                                    <a href="<?= $license_Specifications_boxOne["pic_adress"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $license_Specifications_boxOne["pic_adress"] ?>"
                                                                                                             alt="<?= $license_Specifications_boxOne["text"] ?>">
                                                                                                    </a>

                                                                                                </div>

                                                                                                <script type="text/javascript">
                                                                                                    $(document).ready(function () {
                                                                                                        $('#license_Specifications_boxOne_avatar7<?=$x?>').orakuploader({
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

                                                                                                        $('#license_Specifications_boxOne_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                    });
                                                                                                </script>

                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="license_Specifications_boxTwo_title<?= $x ?>"
                                                                                                           value="<?= $license_Specifications_boxTwo["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان دکمه"
                                                                                                           name="license_Specifications_boxTwo_title<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="license_Specifications_boxTwo_link<?= $x ?>"
                                                                                                           value="<?= $license_Specifications_boxTwo["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک دکمه"
                                                                                                           name="license_Specifications_boxTwo_link<?= $x ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-11 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="license_Specifications_boxTwo_text<?= $x ?>"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="license_Specifications_boxTwo_text<?= $x ?>"><?= $license_Specifications_boxTwo["text"] ?>
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
                                                                                   id="license_Specifications_boxOne_count"
                                                                                   name="license_Specifications_boxOne_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_license_Specifications_boxOne-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_license_Specifications_boxOne' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_license_Specifications_boxOne" id="' + i + '" for="family" style="margin-bottom: 120px!important"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="license_Specifications_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان" name="license_Specifications_boxOne_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="license_Specifications_boxOne_link' + i + '" value="" class="form-control" placeholder="مبلغ" name="license_Specifications_boxOne_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="license_Specifications_boxOne_pic_adress' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="license_Specifications_boxOne_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=license_Specifications_boxOne_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_license_Specifications_boxOne' + i + '" style="padding: 0px;"><div  id="license_Specifications_boxOne_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="license_Specifications_boxOne_avatar7_link' + i + '" name="license_Specifications_boxOne_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_license_Specifications_boxOne' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="license_Specifications_boxTwo_title' + i + '" value="" class="form-control"   placeholder="عنوان دکمه" name="license_Specifications_boxTwo_title'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="license_Specifications_boxTwo_link' + i + '" value="" class="form-control"   placeholder="لینک دکمه" name="license_Specifications_boxTwo_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="license_Specifications_boxTwo_text' + i +'" class="form-control" placeholder="متن" name="license_Specifications_boxTwo_text' + i +'"></textarea></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_license_Specifications_boxOne' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#license_Specifications_boxOne_count').val(i);

                                                                                        //--------orakuploader
                                                                                        $('#license_Specifications_boxOne_avatar7' + i + '').orakuploader({
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

                                                                                        $('#license_Specifications_boxOne_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                        $('.input-group-addon.H_license_Specifications_boxOne' + i + '').find("div").first().next().css('width', '100px');
                                                                                        $('.input-group-addon.H_license_Specifications_boxOne' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                        //    ---end orakuploader
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_license_Specifications_boxOne', function () {
                                                                                        var id = '';
                                                                                        var k = $('#license_Specifications_boxOne_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_license_Specifications_boxOne' + id).remove();
                                                                                        $('#license_Specifications_boxOne_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_license_Specifications_boxOne-ads"><i
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
                                                <!-------------------box4------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $license_boxTwo = get_tem_result($site, $la, "license_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_boxTwo_title"
                                                                           value="<?= $license_boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_boxTwo_text"
                                                                           value="<?= $license_boxTwo['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <? $ValSelectActive_license_boxTwo = get_tem_result($site, $la, "ValSelectActive_license_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_license_boxTwo"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_license_boxTwo"
                                                                    name="select_type_license_boxTwo">

                                                                <option <? if ($ValSelectActive_license_boxTwo["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_license_boxTwo["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_license_boxTwo["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_license_boxTwo_title" type="hidden"
                                                                   value="<?= $ValSelectActive_license_boxTwo["title"] ?>">

                                                            <div class="tab-pane opt_license_boxTwo license_boxTwo_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_license_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_license_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_license_boxTwo; $j++) {
                                                                                    $first_choice_license_boxTwo = get_tem_result($site, $la, "first_choice_license_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_license_boxTwo['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_license_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_license_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_license_boxTwo col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_license_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_license_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_license_boxTwo['pic'] ?>">

                                                                                                        <select id="first_choice_license_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_license_boxTwo_cat"
                                                                                                                name="first_choice_license_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_license_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_license_boxTwo<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_license_boxTwo_new&id=" + $("#first_choice_license_boxTwo_cat<?=$j?>").val() + "&value=" + $("#first_choice_license_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_license_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_license_boxTwo_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_license_boxTwo_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_boxTwo['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_boxTwo['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_boxTwo['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_license_boxTwo_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_license_boxTwo["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_license_boxTwo_number<?= $j ?>">
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
                                                                                       id="first_choice_license_boxTwo_count"
                                                                                       name="first_choice_license_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_license_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_license_boxTwo').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_license_boxTwo_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_license_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_license_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_license_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_license_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_license_boxTwo col-md-4 input-group"><input type="hidden" id="first_choice_license_boxTwo_subcat_val' + i + '"  name="first_choice_license_boxTwo_subcat_val' + i + '" value=""> <select id="first_choice_license_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_license_boxTwo_cat" name="first_choice_license_boxTwo_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_license_boxTwo' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_license_boxTwo_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_license_boxTwo_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_license_boxTwo_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_license_boxTwo_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_license_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_license_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_license_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_license_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_license_boxTwo' + id).remove();
                                                                                            $('#first_choice_license_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_license_boxTwo"><i
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

                                                            <div class="tab-pane opt_license_boxTwo license_boxTwo_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_license_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_license_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_license_boxTwo; $j++) {
                                                                                    $second_choice_license_boxTwo = get_tem_result($site, $la, "second_choice_license_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_license_boxTwo['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_license_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_license_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_license_boxTwo col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_license_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_license_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_license_boxTwo['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_license_boxTwo_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_license_boxTwo_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_license_boxTwo['pic_adress'] ?>">

                                                                                                        <select id="second_choice_license_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_license_boxTwo_cat"
                                                                                                                name="second_choice_license_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_license_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_license_boxTwo<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_license_boxTwo_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_license_boxTwo&id=" + $("#second_choice_license_boxTwo_cat<?=$j?>").val() + "&value=" + $("#second_choice_license_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_license_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_license_boxTwo_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_license_boxTwo_content&id=" + $("#second_choice_license_boxTwo_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_license_boxTwo_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_license_boxTwo_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_license_boxTwo_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_license_boxTwo_count"
                                                                                       name="second_choice_license_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_license_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_license_boxTwo').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_license_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_license_boxTwo_neshane").change(function () {
                                                                                        var j = $("#second_choice_license_boxTwo_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_license_boxTwo' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_license_boxTwo_neshane', function () {
                                                                                        var j = $("#second_choice_license_boxTwo_count").val();
                                                                                        //  $(".second_choice_license_boxTwo_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_boxTwo_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_license_boxTwo_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_license_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_license_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_license_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_license_boxTwo col-md-3 input-group"><input type="hidden" id="second_choice_license_boxTwo_subcat_val' + i + '"  name="second_choice_license_boxTwo_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_license_boxTwo_subcat_link' + i + '"  name="second_choice_license_boxTwo_subcat_link' + i + '" value=""> <select id="second_choice_license_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_license_boxTwo_cat" name="second_choice_license_boxTwo_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_license_boxTwo' + i + '" class="col-md-3 input-group"></div><div id="second_choice_license_boxTwo_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_license_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_license_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_license_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_license_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_license_boxTwo' + id).remove();
                                                                                            $('#second_choice_license_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_license_boxTwo"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_license_boxTwo license_boxTwo_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_license_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_license_boxTwo%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_license_boxTwo; $x++) {
                                                                                    $third_choice_license_boxTwo = get_tem_result($site, $la, "third_choice_license_boxTwo$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_license_boxTwo['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_license_boxTwo<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_license_boxTwo"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_license_boxTwo_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_license_boxTwo["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_license_boxTwo_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_license_boxTwo_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_license_boxTwo["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_license_boxTwo_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_license_boxTwo_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_license_boxTwo["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_license_boxTwo_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_license_boxTwo_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_license_boxTwo<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_license_boxTwo_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_license_boxTwo_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_license_boxTwo_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_license_boxTwo<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_license_boxTwo["pic"]!=""){?>
                                                                                                        <div class="input-group"
                                                                                                             id="image_show_third_choice_license_boxTwo<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_license_boxTwo["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_license_boxTwo["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_license_boxTwo["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_license_boxTwo_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_license_boxTwo_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_license_boxTwo_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_license_boxTwo['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_license_boxTwo_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_license_boxTwo_text<?= $x ?>"><?= $third_choice_license_boxTwo["text"] ?>

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
                                                                                       id="third_choice_license_boxTwo_count"
                                                                                       name="third_choice_license_boxTwo_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_license_boxTwo-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_license_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_license_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_license_boxTwo_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_license_boxTwo_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_license_boxTwo_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_license_boxTwo_link' + i + '" ></div><div class="col-md-4 input-group"> <input type="text" id="third_choice_license_boxTwo_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_license_boxTwo_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_license_boxTwo_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_license_boxTwo' + i + '" style="padding: 0px;"><div  id="third_choice_license_boxTwo_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_license_boxTwo_avatar7_link' + i + '" name="third_choice_license_boxTwo_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_license_boxTwo' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_license_boxTwo_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_license_boxTwo_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_license_boxTwo_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_license_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_license_boxTwo_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_license_boxTwo_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_license_boxTwo_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_license_boxTwo' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_license_boxTwo' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_license_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_license_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_license_boxTwo' + id).remove();
                                                                                            $('#third_choice_license_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_license_boxTwo-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_license_boxTwo_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_license_boxTwo"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_license_boxTwo_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_license_boxTwo').hide();
                                                                        $('.license_boxTwo_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>


                                                    </center>
                                                </div>

                                                <!-------------------box5------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $license_boxThree = get_tem_result($site, $la, "license_boxThree", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_boxThree['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_boxThree_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_boxThree_title"
                                                                           value="<?= $license_boxThree['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_boxThree_text"
                                                                           value="<?= $license_boxThree['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_boxThree_pic"
                                                                           value="<?= $license_boxThree['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $license_show_faq_que = get_tem_result($site, $la, "license_show_faq_que", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «سوالات متداول» </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_show_faq_que['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_show_faq_que_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_license_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type='100' and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_faq_text' id='cat_faq_text' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $license_show_faq_que['text'])
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
                                                                           type="checkbox" <? if ($license_show_faq_que['pic'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_show_faq_que_pic"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_license_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type=99 and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_qes_title' id='cat_qes_title' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $license_show_faq_que['title'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">

                                                        <? $license_pop_faq = get_tem_result($site, $la, "license_pop_faq", 'coms2', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اطلاعات داخل پاپاپ »</h5><br>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_pop_faq_title"
                                                                           value="<?= $license_pop_faq['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_pop_faq_text"
                                                                           value="<?= $license_pop_faq['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان سمت چپ</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_pop_faq_pic"
                                                                           value="<?= $license_pop_faq['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن شعار</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_pop_faq_link"
                                                                           value="<?= $license_pop_faq['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="license_pop_faq_pic_adress"
                                                                           value="<?= $license_pop_faq['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="license_show_faq_que_link"
                                                                           value="<?= $license_show_faq_que['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="license_boxThree_link"
                                                                               value="<?=$license_boxThree['link']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="license_boxThree_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=license_boxThree_link"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="license_boxThree_link_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_license_boxThree_link"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_license_boxThree_link">
                                                                        <a href="<?= $license_boxThree["link"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $license_boxThree["link"] ?>" alt="<?= $license_boxThree["link"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#license_boxThree_link_avatar_orak').orakuploader({
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

                                                                            $('#license_boxThree_link_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------box6------------------->
                                                <div  id="content6" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $license_degarKhadamat = get_tem_result($site, $la, "license_degarKhadamat", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_degarKhadamat['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_degarKhadamat_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_degarKhadamat_title"
                                                                           value="<?= $license_degarKhadamat['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_degarKhadamat_text"
                                                                           value="<?= $license_degarKhadamat['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:7 »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_license_degarKhadamat_content = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'license_degarKhadamat_content%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_license_degarKhadamat_content; $x++) {
                                                                            $license_degarKhadamat_content = get_tem_result($site, $la, "license_degarKhadamat_content$x", 'coms2', $coms_conect);
                                                                            if ($license_degarKhadamat_content['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_license_degarKhadamat_content<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_license_degarKhadamat_content"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="license_degarKhadamat_content_title<?= $x ?>"
                                                                                                       value="<?= $license_degarKhadamat_content["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="license_degarKhadamat_content_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="license_degarKhadamat_content_link<?= $x ?>"
                                                                                                       value="<?= $license_degarKhadamat_content["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="license_degarKhadamat_content_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="license_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       value="<?=$license_degarKhadamat_content["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="license_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=license_degarKhadamat_content_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_license_degarKhadamat_content<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="license_degarKhadamat_content_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="license_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   name="license_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_license_degarKhadamat_content<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group"
                                                                                                 id="image_show_license_degarKhadamat_content<?= $x ?>">
                                                                                                <a href="<?= $license_degarKhadamat_content["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $license_degarKhadamat_content["pic_adress"] ?>"
                                                                                                         alt="<?= $license_degarKhadamat_content["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#license_degarKhadamat_content_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#license_degarKhadamat_content_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                <textarea type="text"
                                                                          id="license_degarKhadamat_content_text<?= $x ?>"
                                                                          class="form-control"
                                                                          placeholder="عنوان دوم"
                                                                          name="license_degarKhadamat_content_text<?= $x ?>"><?= $license_degarKhadamat_content["text"] ?>

                                                                </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="license_degarKhadamat_content_count"
                                                                               name="license_degarKhadamat_content_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_license_degarKhadamat_content-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_license_degarKhadamat_content' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_license_degarKhadamat_content" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="license_degarKhadamat_content_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="license_degarKhadamat_content_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="license_degarKhadamat_content_link' + i + '" value="" class="form-control" placeholder="لینک" name="license_degarKhadamat_content_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="license_degarKhadamat_content_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="license_degarKhadamat_content_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=license_degarKhadamat_content_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_license_degarKhadamat_content' + i + '" style="padding: 0px;"><div  id="license_degarKhadamat_content_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="license_degarKhadamat_content_avatar7_link' + i + '" name="license_degarKhadamat_content_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_license_degarKhadamat_content' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="license_degarKhadamat_content_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="license_degarKhadamat_content_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_license_degarKhadamat_content' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#license_degarKhadamat_content_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#license_degarKhadamat_content_avatar7' + i + '').orakuploader({
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

                                                                                    $('#license_degarKhadamat_content_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_license_degarKhadamat_content' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_license_degarKhadamat_content' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_license_degarKhadamat_content', function () {
                                                                                    var id = '';
                                                                                    var k = $('#license_degarKhadamat_content_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_license_degarKhadamat_content' + id).remove();
                                                                                    $('#license_degarKhadamat_content_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_license_degarKhadamat_content-ads"><i
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
                                                <div  id="content7" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $license_title_article = get_tem_result($site, $la, "license_title_article", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_title_article['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_title_article_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_title_article_title"
                                                                           value="<?= $license_title_article['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_title_article_text"
                                                                           value="<?= $license_title_article['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_license_article = get_tem_result($site, $la, "ValSelectActive_license_article", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_license_article"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_license_article"
                                                                    name="select_type_license_article">

                                                                <option <? if ($ValSelectActive_license_article["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_license_article["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_license_article["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_license_article_title" type="hidden"
                                                                   value="<?= $ValSelectActive_license_article["title"] ?>">

                                                            <div class="tab-pane opt_license_article license_article_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_license_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_license_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_license_article; $j++) {
                                                                                    $first_choice_license_article = get_tem_result($site, $la, "first_choice_license_article$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_license_article['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_license_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_license_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_license_article col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_license_article_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_license_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_license_article['pic'] ?>">

                                                                                                        <select id="first_choice_license_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_license_article_cat"
                                                                                                                name="first_choice_license_article_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_license_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_license_article<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_license_article_new&id=" + $("#first_choice_license_article_cat<?=$j?>").val() + "&value=" + $("#first_choice_license_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_license_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_license_article_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_license_article_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_article['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_article['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_article['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_license_article_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_license_article["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_license_article_number<?= $j ?>">
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
                                                                                       id="first_choice_license_article_count"
                                                                                       name="first_choice_license_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_license_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_license_article').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_license_article_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_license_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_license_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_license_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_license_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_license_article col-md-4 input-group"><input type="hidden" id="first_choice_license_article_subcat_val' + i + '"  name="first_choice_license_article_subcat_val' + i + '" value=""> <select id="first_choice_license_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_license_article_cat" name="first_choice_license_article_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_license_article' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_license_article_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_license_article_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_license_article_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_license_article_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_license_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_license_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_license_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_license_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_license_article' + id).remove();
                                                                                            $('#first_choice_license_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_license_article"><i
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

                                                            <div class="tab-pane opt_license_article license_article_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_license_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_license_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_license_article; $j++) {
                                                                                    $second_choice_license_article = get_tem_result($site, $la, "second_choice_license_article$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_license_article['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_license_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_license_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_license_article col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_license_article_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_license_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_license_article['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_license_article_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_license_article_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_license_article['pic_adress'] ?>">

                                                                                                        <select id="second_choice_license_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_license_article_cat"
                                                                                                                name="second_choice_license_article_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_license_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_license_article<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_license_article_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_license_article&id=" + $("#second_choice_license_article_cat<?=$j?>").val() + "&value=" + $("#second_choice_license_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_license_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_license_article_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_license_article_content&id=" + $("#second_choice_license_article_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_license_article_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_license_article_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_license_article_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_license_article_count"
                                                                                       name="second_choice_license_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_license_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_license_article').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_license_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_license_article_neshane").change(function () {
                                                                                        var j = $("#second_choice_license_article_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_license_article' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_license_article_neshane', function () {
                                                                                        var j = $("#second_choice_license_article_count").val();
                                                                                        //  $(".second_choice_license_article_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_article_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_license_article_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_license_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_license_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_license_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_license_article col-md-3 input-group"><input type="hidden" id="second_choice_license_article_subcat_val' + i + '"  name="second_choice_license_article_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_license_article_subcat_link' + i + '"  name="second_choice_license_article_subcat_link' + i + '" value=""> <select id="second_choice_license_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_license_article_cat" name="second_choice_license_article_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_license_article' + i + '" class="col-md-3 input-group"></div><div id="second_choice_license_article_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_license_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_license_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_license_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_license_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_license_article' + id).remove();
                                                                                            $('#second_choice_license_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_license_article"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_license_article license_article_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_license_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_license_article%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_license_article; $x++) {
                                                                                    $third_choice_license_article = get_tem_result($site, $la, "third_choice_license_article$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_license_article['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_license_article<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_license_article"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_license_article_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_license_article["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_license_article_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_license_article_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_license_article["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_license_article_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_license_article_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_license_article<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_license_article_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_license_article_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_license_article_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_license_article<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_license_article["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_license_article<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_license_article["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_license_article["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_license_article["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_license_article_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_license_article_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_license_article_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_license_article['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_license_article_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_license_article_text<?= $x ?>"><?= $third_choice_license_article["text"] ?>

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
                                                                                       id="third_choice_license_article_count"
                                                                                       name="third_choice_license_article_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_license_article-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_license_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_license_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-4 input-group"><input type="text" id="third_choice_license_article_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_license_article_title' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_license_article_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_license_article_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_license_article_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_license_article' + i + '" style="padding: 0px;"><div  id="third_choice_license_article_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_license_article_avatar7_link' + i + '" name="third_choice_license_article_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_license_article' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_license_article_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_license_article_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_license_article_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_license_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_license_article_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_license_article_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_license_article_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_license_article' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_license_article' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_license_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_license_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_license_article' + id).remove();
                                                                                            $('#third_choice_license_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_license_article-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_license_article_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_license_article"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_license_article_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_license_article').hide();
                                                                        $('.license_article_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content8" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $license_title_LightBox = get_tem_result($site, $la, "license_title_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($license_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="license_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_title_LightBox_title"
                                                                           value="<?= $license_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_license_LightBox = get_tem_result($site, $la, "ValSelectActive_license_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_license_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_license_LightBox"
                                                                    name="select_type_license_LightBox">

                                                                <option <? if ($ValSelectActive_license_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_license_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_license_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_license_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_license_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_license_LightBox license_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_license_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_license_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_license_LightBox; $j++) {
                                                                                    $first_choice_license_LightBox = get_tem_result($site, $la, "first_choice_license_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_license_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_license_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_license_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_license_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_license_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_license_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_license_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_license_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_license_LightBox_cat"
                                                                                                                name="first_choice_license_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_license_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_license_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_license_LightBox_new&id=" + $("#first_choice_license_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_license_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_license_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_license_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_license_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_license_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_license_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_license_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_license_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_license_LightBox_count"
                                                                                       name="first_choice_license_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_license_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_license_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_license_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_license_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_license_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_license_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_license_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_license_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_license_LightBox_subcat_val' + i + '"  name="first_choice_license_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_license_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_license_LightBox_cat" name="first_choice_license_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_license_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_license_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_license_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_license_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_license_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_license_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_license_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_license_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_license_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_license_LightBox' + id).remove();
                                                                                            $('#first_choice_license_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_license_LightBox"><i
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

                                                            <div class="tab-pane opt_license_LightBox license_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_license_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_license_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_license_LightBox; $j++) {
                                                                                    $second_choice_license_LightBox = get_tem_result($site, $la, "second_choice_license_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_license_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_license_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_license_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_license_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_license_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_license_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_license_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_license_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_license_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_license_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_license_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_license_LightBox_cat"
                                                                                                                name="second_choice_license_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_license_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_license_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_license_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_license_LightBox&id=" + $("#second_choice_license_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_license_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_license_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_license_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_license_LightBox_content&id=" + $("#second_choice_license_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_license_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_license_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_license_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_license_LightBox_count"
                                                                                       name="second_choice_license_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_license_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_license_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_license_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_license_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_license_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_license_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_license_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_license_LightBox_count").val();
                                                                                        //  $(".second_choice_license_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_license_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_license_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_license_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_license_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_license_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_license_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_license_LightBox_subcat_val' + i + '"  name="second_choice_license_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_license_LightBox_subcat_link' + i + '"  name="second_choice_license_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_license_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_license_LightBox_cat" name="second_choice_license_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_license_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_license_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_license_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_license_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_license_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_license_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_license_LightBox' + id).remove();
                                                                                            $('#second_choice_license_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_license_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_license_LightBox license_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_license_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_license_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_license_LightBox; $x++) {
                                                                                    $third_choice_license_LightBox = get_tem_result($site, $la, "third_choice_license_LightBox$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_license_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_license_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_license_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_license_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_license_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_license_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_license_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_license_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_license_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_license_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_license_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_license_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_license_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_license_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_license_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_license_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_license_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_license_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_license_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_license_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_license_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_license_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_license_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_license_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_license_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_license_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_license_LightBox_text<?= $x ?>"><?= $third_choice_license_LightBox["text"] ?>

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
                                                                                       id="third_choice_license_LightBox_count"
                                                                                       name="third_choice_license_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_license_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_license_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_license_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_license_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_license_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_license_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_license_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_license_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_license_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_license_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_license_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_license_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_license_LightBox_avatar7_link' + i + '" name="third_choice_license_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_license_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_license_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_license_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_license_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_license_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_license_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_license_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_license_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_license_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_license_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_license_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_license_LightBox' + id).remove();
                                                                                            $('#third_choice_license_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_license_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_license_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_license_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_license_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_license_LightBox').hide();
                                                                        $('.license_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------header_seo------------------->
                                                <div  id="content9" class="bhoechie-tab-content H1 ">
                                                    <? $license_header_seo = get_tem_result($site, $la, "license_header_seo", 'coms2', $coms_conect); ?>
                                                    <center>
                                                        <div class="col-md-12">
                                                            <label  class="col-md-3 control-label" >meta keyword</label>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" value="<?= $license_header_seo['title'] ?>" id="header_seo_keyword" name="license_header_seo_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" >meta Description</label>
                                                                <div class="form-group col-md-6">
                                                                    <textarea id="header_seo_desciption" name="license_header_seo_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $license_header_seo['text'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">title</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="license_header_seo_pic"
                                                                           value="<?= $license_header_seo ['pic'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="license_header_seo_pic_adress"
                                                                                                                                                       value="<?=$license_header_seo['pic_adress']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="license_header_seo_pic_adress"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=license_header_seo_pic_adress"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="license_header_seo_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_license_header_seo_pic_adress"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_license_header_seo_pic_adress">
                                                                        <a href="<?= $license_header_seo["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $license_header_seo["pic_adress"] ?>" alt="<?= $license_header_seo["pic_adress"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#license_header_seo_pic_adress_avatar_orak').orakuploader({
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

                                                                            $('#license_header_seo_pic_adress_avatar_orak').html("<?=$pic_str?>");
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
        //----------license---------------------
        $(".H_rename_license_box1").click(function () {
            $(this).hide();
            $('.H_rename_license_box1_save').show();
            $(".H_input_rename_license_box1").toggle(300);
        });
        $(".H_rename_license_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_box1' + "&value=" + $(".H_input_rename_license_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_box1 > span.temp").text($(".H_input_rename_license_box1").val());
            $(this).hide();
            $('.H_rename_license_box1').show();
            $(".H_input_rename_license_box1").hide();
            $(".H_rename_license_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_license_box2").click(function () {
            $(this).hide();
            $('.H_rename_license_box2_save').show();
            $(".H_input_rename_license_box2").toggle(300);
        });
        $(".H_rename_license_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_box2' + "&value=" + $(".H_input_rename_license_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_box2 > span.temp").text($(".H_input_rename_license_box2").val());
            $(this).hide();
            $('.H_rename_license_box2').show();
            $(".H_input_rename_license_box2").hide();
            $(".H_rename_license_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_license_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_license_title_box3_save').show();
            $(".H_input_rename_license_title_box3").toggle(300);
        });
        $(".H_rename_license_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_title_box3' + "&value=" + $(".H_input_rename_license_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_title_box3 > span.temp").text($(".H_input_rename_license_title_box3").val());
            $(this).hide();
            $('.H_rename_license_title_box3').show();
            $(".H_input_rename_license_title_box3").hide();
            $(".H_rename_license_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_license_title_box4").click(function () {
            $(this).hide();
            $('.H_rename_license_title_box4_save').show();
            $(".H_input_rename_license_title_box4").toggle(300);
        });
        $(".H_rename_license_title_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_title_box4' + "&value=" + $(".H_input_rename_license_title_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_title_box4 > span.temp").text($(".H_input_rename_license_title_box4").val());
            $(this).hide();
            $('.H_rename_license_title_box4').show();
            $(".H_input_rename_license_title_box4").hide();
            $(".H_rename_license_title_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_license_title_box5").click(function () {
            $(this).hide();
            $('.H_rename_license_title_box5_save').show();
            $(".H_input_rename_license_title_box5").toggle(300);
        });
        $(".H_rename_license_title_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_title_box5' + "&value=" + $(".H_input_rename_license_title_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_title_box5 > span.temp").text($(".H_input_rename_license_title_box5").val());
            $(this).hide();
            $('.H_rename_license_title_box5').show();
            $(".H_input_rename_license_title_box5").hide();
            $(".H_rename_license_title_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_license_title_box6").click(function () {
            $(this).hide();
            $('.H_rename_license_title_box6_save').show();
            $(".H_input_rename_license_title_box6").toggle(300);
        });
        $(".H_rename_license_title_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_title_box6' + "&value=" + $(".H_input_rename_license_title_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_title_box6 > span.temp").text($(".H_input_rename_license_title_box6").val());
            $(this).hide();
            $('.H_rename_license_title_box6').show();
            $(".H_input_rename_license_title_box6").hide();
            $(".H_rename_license_title_box6.H_pos_color").css('transform', 'translateY(-24px)');
        });

        //-------------------------------

        $(".H_rename_license_title_box7").click(function () {
            $(this).hide();
            $('.H_rename_license_title_box7_save').show();
            $(".H_input_rename_license_title_box7").toggle(300);
        });
        $(".H_rename_license_title_box7_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_title_box7' + "&value=" + $(".H_input_rename_license_title_box7").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_title_box7 > span.temp").text($(".H_input_rename_license_title_box7").val());
            $(this).hide();
            $('.H_rename_license_title_box7').show();
            $(".H_input_rename_license_title_box7").hide();
            $(".H_rename_license_title_box7.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_license_title_box8").click(function () {
            $(this).hide();
            $('.H_rename_license_title_box8_save').show();
            $(".H_input_rename_license_title_box8").toggle(300);
        });
        $(".H_rename_license_title_box8_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_title_box8' + "&value=" + $(".H_input_rename_license_title_box8").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_title_box8 > span.temp").text($(".H_input_rename_license_title_box8").val());
            $(this).hide();
            $('.H_rename_license_title_box8').show();
            $(".H_input_rename_license_title_box8").hide();
            $(".H_rename_license_title_box8.H_pos_color").css('transform', 'translateY(-24px)');
        });

        //-------------------------------

        $(".H_rename_license_title_box9").click(function () {
            $(this).hide();
            $('.H_rename_license_title_box9_save').show();
            $(".H_input_rename_license_title_box9").toggle(300);
        });
        $(".H_rename_license_title_box9_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'license_title_box9' + "&value=" + $(".H_input_rename_license_title_box9").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_license_title_box9 > span.temp").text($(".H_input_rename_license_title_box9").val());
            $(this).hide();
            $('.H_rename_license_title_box9').show();
            $(".H_input_rename_license_title_box9").hide();
            $(".H_rename_license_title_box9.H_pos_color").css('transform', 'translateY(-24px)');
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
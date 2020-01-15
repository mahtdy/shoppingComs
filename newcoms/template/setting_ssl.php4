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



    ########################################################### ssl ########################################################

    $ssl_boxOne_pic_adress = 0;
    $ssl_boxOne_pic_adress= injection_replace($_POST["ssl_boxOne_pic_adress"]);
    $ssl_boxOne_title = injection_replace($_POST["ssl_boxOne_title"]);
    $ssl_boxOne_text = injection_replace($_POST["ssl_boxOne_text"]);
    $ssl_boxOne_pic = injection_replace($_POST["ssl_boxOne_pic"]);
    $ssl_boxOne_pic = resize_image_M($ssl_boxOne_pic,1350,550,$img_page_main,'');
    $ssl_boxOne_pic_avatar_orak = injection_replace($_POST["ssl_boxOne_pic_avatar_orak"][0]);
    if($ssl_boxOne_pic_avatar_orak>""){
        $ssl_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $ssl_boxOne_pic_avatar_orak;
        $ssl_boxOne_pic = resize_image_M($ssl_boxOne_pic,1350,550,$img_page_main,'');

    }
    insert_templdate($site, $ssl_boxOne_pic_adress, $la, $ssl_boxOne_text, $ssl_boxOne_title, '', $ssl_boxOne_pic, "ssl_boxOne", 'coms2', $coms_conect);
//---
    $ssl_content_fixed1_title= injection_replace($_POST["ssl_content_fixed1_title"]);
    $ssl_content_fixed1_link = injection_replace($_POST["ssl_content_fixed1_link"]);
    $ssl_content_fixed1_pic = injection_replace($_POST["ssl_content_fixed1_pic"]);
    $ssl_content_fixed1_text= injection_replace($_POST["ssl_content_fixed1_text"]);
    $ssl_content_fixed1_pic_adress = injection_replace($_POST["ssl_content_fixed1_pic_adress"]);
    $ssl_content_fixed1_pic_adress = resize_image_M($ssl_content_fixed1_pic_adress,100,100,$img_page_main,'');
    $ssl_content_fixed1_avatar7 = injection_replace($_POST["ssl_content_fixed1_avatar7"][0]);
    if($ssl_content_fixed1_avatar7>""){
        $ssl_content_fixed1_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $ssl_content_fixed1_avatar7;
        $ssl_content_fixed1_pic_adress = resize_image_M($ssl_content_fixed1_pic_adress,100,100,$img_page_main,'');

    }

    $ssl_content_fixed2_text= injection_replace($_POST["ssl_content_fixed2_text"]);
    if($ssl_content_fixed1_title>"") {
        insert_templdate($site, $ssl_content_fixed1_pic_adress, $la, $ssl_content_fixed1_text, $ssl_content_fixed1_title, $ssl_content_fixed1_link, $ssl_content_fixed1_pic, "ssl_content_fixed1", 'coms2', $coms_conect);
        insert_templdate($site, '', $la, $ssl_content_fixed2_text, '', '', '', "ssl_content_fixed2", 'coms2', $coms_conect);
    }
//    menu box
    $ssl_menubox_show_pic_adress = injection_replace_pic($_POST["ssl_menubox_show_pic_adress"]);
    insert_templdate($site, $ssl_menubox_show_pic_adress, $la, '', '', '', '', "ssl_menubox_show", 'coms2', $coms_conect);

    $ssl_menubox_links_del = "name like 'ssl_menubox_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $ssl_menubox_links_del, $coms_conect);
    $ssl_menubox_links_count = injection_replace_pic($_POST["ssl_menubox_links_count"]);
    for ($k = 1; $k <= $ssl_menubox_links_count; $k++) {
        $ssl_menubox_links_title = injection_replace_pic($_POST["ssl_menubox_links_title{$k}"]);
        $ssl_menubox_links_link = injection_replace_pic($_POST["ssl_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $ssl_menubox_links_title, $ssl_menubox_links_link, '', "ssl_menubox_links$k", 'coms2', $coms_conect);
    }
//----------------------------boxThree--------
    $ssl_boxThree_title_pic_adress=0;
    $ssl_boxThree_title_pic_adress = injection_replace($_POST["ssl_boxThree_title_pic_adress"]);
    $ssl_boxThree_title_title= injection_replace($_POST["ssl_boxThree_title_title"]);
    $ssl_boxThree_title_text= injection_replace($_POST["ssl_boxThree_title_text"]);
    insert_templdate($site, $ssl_boxThree_title_pic_adress, $la, $ssl_boxThree_title_text, $ssl_boxThree_title_title, '', '', "ssl_boxThree_title", 'coms2', $coms_conect);

    $condition_ssl_boxThree_con = "name like 'ssl_boxThree_con%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_ssl_boxThree_con, $coms_conect);
    $ssl_boxThree_con_count = injection_replace_pic($_POST["ssl_boxThree_con_count"]);
    for ($x = 1; $x <= $ssl_boxThree_con_count; $x++) {

        $ssl_boxThree_con_pic_adress = injection_replace_pic($_POST["ssl_boxThree_con_pic_adress{$x}"]);
        $ssl_boxThree_con_title = injection_replace_pic($_POST["ssl_boxThree_con_title{$x}"]);
        $ssl_boxThree_con_pic = injection_replace_pic($_POST["ssl_boxThree_con_pic{$x}"]);
        $ssl_boxThree_con_pic = resize_image_M($ssl_boxThree_con_pic,50,50,$img_page_main,'');
        $ssl_boxThree_con_avatar7 = injection_replace($_POST["ssl_boxThree_con_avatar7{$x}"][0]);
        if ($ssl_boxThree_con_avatar7 > "") {
            $ssl_boxThree_con_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $ssl_boxThree_con_avatar7;
            $ssl_boxThree_con_pic = resize_image_M($ssl_boxThree_con_pic,50,50,$img_page_main,'');

        }
        if ($ssl_boxThree_con_title > "") {
            insert_templdate($site, $ssl_boxThree_con_pic_adress, $la, '', $ssl_boxThree_con_title, '', $ssl_boxThree_con_pic, "ssl_boxThree_con$x", 'coms2', $coms_conect);
        }
    }


    for($i=1;$i<=5;$i++) {
        $condition_ssl_content_tabs_box1 = "name like 'ssl_content_tabs_box1$i%' and tem_name='coms2'";
        delete_from_data_base('new_tem_setting', $condition_ssl_content_tabs_box1, $coms_conect);

        $condition_ssl_content_tabs_box_btn = "name like 'ssl_content_tabs_box_btn$i%' and tem_name='coms2'";
        delete_from_data_base('new_tem_setting', $condition_ssl_content_tabs_box_btn, $coms_conect);
        $ssl_content_tabs_box1_count = injection_replace_pic($_POST["ssl_content_tabs_box1_count{$i}"]);
        for ($x = 1; $x <= $ssl_content_tabs_box1_count; $x++) {
            $ssl_content_tabs_box1_title = injection_replace_pic($_POST["ssl_content_tabs_box1_title{$i}{$x}"]);
            $ssl_content_tabs_box1_link = injection_replace_pic($_POST["ssl_content_tabs_box1_link{$i}{$x}"]);
            $ssl_content_tabs_box1_pic = injection_replace_pic($_POST["ssl_content_tabs_box1_pic{$i}{$x}"]);
            $ssl_content_tabs_box1_text = injection_replace_pic($_POST["ssl_content_tabs_box1_text{$i}{$x}"]);
            $ssl_content_tabs_box1_pic_adress = injection_replace_pic($_POST["ssl_content_tabs_box1_pic_adress{$i}{$x}"]);
            $ssl_content_tabs_box1_pic_adress = resize_image_M($ssl_content_tabs_box1_pic_adress,195,142,$img_page_main,'');
            $ssl_content_tabs_box1_avatar7 = injection_replace($_POST["ssl_content_tabs_box1_avatar7{$i}{$x}"][0]);
            if ($ssl_content_tabs_box1_avatar7 > "") {
                $ssl_content_tabs_box1_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $ssl_content_tabs_box1_avatar7;
                $ssl_content_tabs_box1_pic_adress = resize_image_M($ssl_content_tabs_box1_pic_adress,195,142,$img_page_main,'');

            }
            $ssl_content_tabs_box_btn_pic_adress = injection_replace_pic($_POST["ssl_content_tabs_box_btn_pic_adress{$i}{$x}"]);
            $ssl_content_tabs_box_btn_title = injection_replace_pic($_POST["ssl_content_tabs_box_btn_title{$i}{$x}"]);
            $ssl_content_tabs_box_btn_link = injection_replace_pic($_POST["ssl_content_tabs_box_btn_link{$i}{$x}"]);
            $ssl_content_tabs_box_btn_text = injection_replace_pic($_POST["ssl_content_tabs_box_btn_text{$i}{$x}"]);
            $ssl_content_tabs_box_btn_pic = injection_replace_pic($_POST["ssl_content_tabs_box_btn_pic{$i}{$x}"]);


            if ($ssl_content_tabs_box1_title > "") {
                insert_templdate($site, $ssl_content_tabs_box1_pic_adress, $la, $ssl_content_tabs_box1_text, $ssl_content_tabs_box1_title, $ssl_content_tabs_box1_link, $ssl_content_tabs_box1_pic, "ssl_content_tabs_box1$i$x", 'coms2', $coms_conect);
                insert_templdate($site, $ssl_content_tabs_box_btn_pic_adress, $la, $ssl_content_tabs_box_btn_text, $ssl_content_tabs_box_btn_title, $ssl_content_tabs_box_btn_link, $ssl_content_tabs_box_btn_pic, "ssl_content_tabs_box_btn$i$x", 'coms2', $coms_conect);
            }
        }
    }

    $ssl_title_con_boxThree_pic_adress= injection_replace($_POST["ssl_title_con_boxThree_pic_adress"]);
    $ssl_title_con_boxThree_pic = injection_replace($_POST["ssl_title_con_boxThree_pic"]);
    $ssl_title_con_boxThree_link = injection_replace($_POST["ssl_title_con_boxThree_link"]);
    $ssl_title_con_boxThree_title = injection_replace($_POST["ssl_title_con_boxThree_title"]);
    $ssl_title_con_boxThree_text = injection_replace($_POST["ssl_title_con_boxThree_text"]);

    insert_templdate($site, $ssl_title_con_boxThree_pic_adress, $la, $ssl_title_con_boxThree_text, $ssl_title_con_boxThree_title, $ssl_title_con_boxThree_link, $ssl_title_con_boxThree_pic, "ssl_title_con_boxThree", 'coms2', $coms_conect);


//    ssl box2
    $ssl_boxTwo_pic_adress = 0;
    $ssl_boxTwo_pic_adress= injection_replace($_POST["ssl_boxTwo_pic_adress"]);
    $ssl_boxTwo_text = injection_replace($_POST["ssl_boxTwo_text"]);
    $ssl_boxTwo_title = injection_replace($_POST["ssl_boxTwo_title"]);
    $ssl_boxTwo_pic = injection_replace($_POST["ssl_boxTwo_pic"]);
    $ssl_boxTwo_link = injection_replace($_POST["ssl_boxTwo_link"]);
    insert_templdate($site, $ssl_boxTwo_pic_adress, $la, $ssl_boxTwo_text, $ssl_boxTwo_title, $ssl_boxTwo_link, $ssl_boxTwo_pic, "ssl_boxTwo", 'coms2', $coms_conect);


    $ValSelectActive_ssl_boxTwo_title = injection_replace($_POST["ValSelectActive_ssl_boxTwo_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_ssl_boxTwo_title, '', '', "ValSelectActive_ssl_boxTwo", 'coms2', $coms_conect);

    $condition_first_choice_ssl_boxTwo = "name like 'first_choice_ssl_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_ssl_boxTwo, $coms_conect);
    $first_choice_ssl_boxTwo_count = injection_replace_pic($_POST["first_choice_ssl_boxTwo_count"]);
    for ($i = 1; $i <= $first_choice_ssl_boxTwo_count; $i++) {

        $first_choice_ssl_boxTwo_cat = injection_replace_pic($_POST["first_choice_ssl_boxTwo_cat{$i}"]);
        $first_choice_ssl_boxTwo_subcat_cat = injection_replace_pic($_POST["first_choice_ssl_boxTwo_subcat_cat{$i}"]);
        $first_choice_ssl_boxTwo_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_ssl_boxTwo_Fixed_selection_cat{$i}"]);
        $first_choice_ssl_boxTwo_number = injection_replace_pic($_POST["first_choice_ssl_boxTwo_number{$i}"]);
        if ($first_choice_ssl_boxTwo_subcat_cat > "")
            insert_templdate($site, $first_choice_ssl_boxTwo_number, $la, $first_choice_ssl_boxTwo_Fixed_selection_cat, '', $first_choice_ssl_boxTwo_cat, $first_choice_ssl_boxTwo_subcat_cat, "first_choice_ssl_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_ssl_boxTwo = "name like 'second_choice_ssl_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_ssl_boxTwo, $coms_conect);
    $second_choice_ssl_boxTwo_count = injection_replace_pic($_POST["second_choice_ssl_boxTwo_count"]);
    for ($i = 1; $i <= $second_choice_ssl_boxTwo_count; $i++) {

        $second_choice_ssl_boxTwo_cat = injection_replace_pic($_POST["second_choice_ssl_boxTwo_cat{$i}"]);
        $second_choice_ssl_boxTwo_subcat_cat = injection_replace_pic($_POST["second_choice_ssl_boxTwo_subcat_cat{$i}"]);
        $second_choice_ssl_boxTwo_subcat_cat_content = injection_replace_pic($_POST["second_choice_ssl_boxTwo_subcat_cat_content{$i}"]);
        if ($second_choice_ssl_boxTwo_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_ssl_boxTwo_subcat_cat_content, $la, '', '', $second_choice_ssl_boxTwo_cat, $second_choice_ssl_boxTwo_subcat_cat, "second_choice_ssl_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_ssl_boxTwo = "name like 'third_choice_ssl_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_ssl_boxTwo, $coms_conect);
    $third_choice_ssl_boxTwo_count = injection_replace_pic($_POST["third_choice_ssl_boxTwo_count"]);
    for ($x = 1; $x <= $third_choice_ssl_boxTwo_count; $x++) {


        $third_choice_ssl_boxTwo_pic_adress = injection_replace_pic($_POST["third_choice_ssl_boxTwo_pic_adress{$x}"]);
        $third_choice_ssl_boxTwo_title = injection_replace_pic($_POST["third_choice_ssl_boxTwo_title{$x}"]);
        $third_choice_ssl_boxTwo_text = injection_replace_pic($_POST["third_choice_ssl_boxTwo_text{$x}"]);

        $third_choice_ssl_boxTwo_link = injection_replace_pic($_POST["third_choice_ssl_boxTwo_link{$x}"]);
        $third_choice_ssl_boxTwo_pic = injection_replace_pic($_POST["third_choice_ssl_boxTwo_pic{$x}"]);
        $third_choice_ssl_boxTwo_pic = resize_image_M($third_choice_ssl_boxTwo_pic,40,40,$img_page_main,'');
        $third_choice_ssl_boxTwo_avatar7 = injection_replace($_POST["third_choice_ssl_boxTwo_avatar7{$x}"][0]);
        if ($third_choice_ssl_boxTwo_avatar7 > "") {
            $third_choice_ssl_boxTwo_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_ssl_boxTwo_avatar7;
            $third_choice_ssl_boxTwo_pic = resize_image_M($third_choice_ssl_boxTwo_pic,40,40,$img_page_main,'');

        }
        if ($third_choice_ssl_boxTwo_title > "") {
            insert_templdate($site, $third_choice_ssl_boxTwo_pic_adress, $la, $third_choice_ssl_boxTwo_text, $third_choice_ssl_boxTwo_title, $third_choice_ssl_boxTwo_link, $third_choice_ssl_boxTwo_pic, "third_choice_ssl_boxTwo$x", 'coms2', $coms_conect);
        }
    }

  
    //    box5
    
    $ssl_boxFive_pic_adress = 0;
    $ssl_boxFive_pic_adress= injection_replace($_POST["ssl_boxFive_pic_adress"]);
    $ssl_boxFive_title= injection_replace($_POST["ssl_boxFive_title"]);
    $ssl_boxFive_text= injection_replace($_POST["ssl_boxFive_text"]);
    $ssl_boxFive_pic= injection_replace($_POST["ssl_boxFive_pic"]);
    $ssl_boxFive_link= injection_replace($_POST["ssl_boxFive_link"]);
    $ssl_boxFive_link= resize_image_M($ssl_boxFive_link,357,530,$img_page_main,'');
    $ssl_boxFive_link_avatar_orak = injection_replace($_POST["ssl_boxFive_link_avatar_orak"][0]);
    if ($ssl_boxFive_link_avatar_orak > "") {
        $ssl_boxFive_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $ssl_boxFive_link_avatar_orak;
        $ssl_boxFive_link= resize_image_M($ssl_boxFive_link,357,530,$img_page_main,'');

    }
    insert_templdate($site, $ssl_boxFive_pic_adress, $la, $ssl_boxFive_text, $ssl_boxFive_title, $ssl_boxFive_link, $ssl_boxFive_pic, "ssl_boxFive", 'coms2', $coms_conect);

    $ssl_show_faq_que_pic_adress = 0;
    $ssl_show_faq_que_pic_adress= injection_replace($_POST["ssl_show_faq_que_pic_adress"]);
    $ssl_show_faq_que_pic = 0;
    $ssl_show_faq_que_pic= injection_replace($_POST["ssl_show_faq_que_pic"]);
    $cat_faq_text= injection_replace($_POST["cat_faq_text"]);
    $cat_qes_title= injection_replace($_POST["cat_qes_title"]);
    $ssl_show_faq_que_link = injection_replace_pic($_POST["ssl_show_faq_que_link"]);
    insert_templdate($site, $ssl_show_faq_que_pic_adress, $la, $cat_faq_text, $cat_qes_title, $ssl_show_faq_que_link, $ssl_show_faq_que_pic, "ssl_show_faq_que", 'coms2', $coms_conect);

    $ssl_pop_faq_title= injection_replace($_POST["ssl_pop_faq_title"]);
    $ssl_pop_faq_text= injection_replace($_POST["ssl_pop_faq_text"]);
    $ssl_pop_faq_pic= injection_replace($_POST["ssl_pop_faq_pic"]);
    $ssl_pop_faq_link= injection_replace($_POST["ssl_pop_faq_link"]);
    $ssl_pop_faq_pic_adress= injection_replace($_POST["ssl_pop_faq_pic_adress"]);
    insert_templdate($site, $ssl_pop_faq_pic_adress, $la, $ssl_pop_faq_text, $ssl_pop_faq_title, $ssl_pop_faq_link, $ssl_pop_faq_pic, "ssl_pop_faq", 'coms2', $coms_conect);


    //   ssl_degarKhadamat
    $ssl_degarKhadamat_pic_adress = 0;
    $ssl_degarKhadamat_pic_adress= injection_replace($_POST["ssl_degarKhadamat_pic_adress"]);
    $ssl_degarKhadamat_title= injection_replace($_POST["ssl_degarKhadamat_title"]);
    $ssl_degarKhadamat_text= injection_replace($_POST["ssl_degarKhadamat_text"]);
    insert_templdate($site, $ssl_degarKhadamat_pic_adress, $la, $ssl_degarKhadamat_text, $ssl_degarKhadamat_title, '', '', "ssl_degarKhadamat", 'coms2', $coms_conect);

    $condition_ssl_degarKhadamat_content = "name like 'ssl_degarKhadamat_content%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_ssl_degarKhadamat_content, $coms_conect);
    $ssl_degarKhadamat_content_count = injection_replace_pic($_POST["ssl_degarKhadamat_content_count"]);
    for ($x = 1; $x <= $ssl_degarKhadamat_content_count; $x++) {

        $ssl_degarKhadamat_content_text = injection_replace_pic($_POST["ssl_degarKhadamat_content_text{$x}"]);
        $ssl_degarKhadamat_content_title = injection_replace_pic($_POST["ssl_degarKhadamat_content_title{$x}"]);
        $ssl_degarKhadamat_content_link = injection_replace_pic($_POST["ssl_degarKhadamat_content_link{$x}"]);
        $ssl_degarKhadamat_content_pic = injection_replace_pic($_POST["ssl_degarKhadamat_content_pic{$x}"]);
        $ssl_degarKhadamat_content_pic =resize_image_M($ssl_degarKhadamat_content_pic,88,76,$img_page_main,'');
        $ssl_degarKhadamat_content_avatar7 = injection_replace($_POST["ssl_degarKhadamat_content_avatar7{$x}"][0]);
        if ($ssl_degarKhadamat_content_avatar7 > "") {
            $ssl_degarKhadamat_content_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $ssl_degarKhadamat_content_avatar7;
            $ssl_degarKhadamat_content_pic =resize_image_M($ssl_degarKhadamat_content_pic,88,76,$img_page_main,'');

        }
        if ($ssl_degarKhadamat_content_title > "") {
            insert_templdate($site, $ssl_degarKhadamat_content_pic, $la, $ssl_degarKhadamat_content_text, $ssl_degarKhadamat_content_title, $ssl_degarKhadamat_content_link, '', "ssl_degarKhadamat_content$x", 'coms2', $coms_conect);
        }
    }

//   article

    $ssl_title_article_pic_adress = 0;
    $ssl_title_article_pic_adress= injection_replace($_POST["ssl_title_article_pic_adress"]);
    $ssl_title_article_title= injection_replace($_POST["ssl_title_article_title"]);
    $ssl_title_article_text= injection_replace($_POST["ssl_title_article_text"]);
    $ssl_title_article_link= injection_replace($_POST["ssl_title_article_link"]);
    insert_templdate($site, $ssl_title_article_pic_adress, $la, $ssl_title_article_text, $ssl_title_article_title, $ssl_title_article_link, '', "ssl_title_article", 'coms2', $coms_conect);

    $ValSelectActive_ssl_article_title = injection_replace($_POST["ValSelectActive_ssl_article_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_ssl_article_title, '', '', "ValSelectActive_ssl_article", 'coms2', $coms_conect);

    $condition_first_choice_ssl_article = "name like 'first_choice_ssl_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_ssl_article, $coms_conect);
    $first_choice_ssl_article_count = injection_replace_pic($_POST["first_choice_ssl_article_count"]);
    for ($i = 1; $i <= $first_choice_ssl_article_count; $i++) {

        $first_choice_ssl_article_cat = injection_replace_pic($_POST["first_choice_ssl_article_cat{$i}"]);
        $first_choice_ssl_article_subcat_cat = injection_replace_pic($_POST["first_choice_ssl_article_subcat_cat{$i}"]);
        $first_choice_ssl_article_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_ssl_article_Fixed_selection_cat{$i}"]);
        $first_choice_ssl_article_number = injection_replace_pic($_POST["first_choice_ssl_article_number{$i}"]);
        if ($first_choice_ssl_article_subcat_cat > "")
            insert_templdate($site, $first_choice_ssl_article_number, $la, $first_choice_ssl_article_Fixed_selection_cat, '', $first_choice_ssl_article_cat, $first_choice_ssl_article_subcat_cat, "first_choice_ssl_article$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_ssl_article = "name like 'second_choice_ssl_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_ssl_article, $coms_conect);
    $second_choice_ssl_article_count = injection_replace_pic($_POST["second_choice_ssl_article_count"]);
    for ($i = 1; $i <= $second_choice_ssl_article_count; $i++) {

        $second_choice_ssl_article_cat = injection_replace_pic($_POST["second_choice_ssl_article_cat{$i}"]);
        $second_choice_ssl_article_subcat_cat = injection_replace_pic($_POST["second_choice_ssl_article_subcat_cat{$i}"]);
        $second_choice_ssl_article_subcat_cat_content = injection_replace_pic($_POST["second_choice_ssl_article_subcat_cat_content{$i}"]);
        if ($second_choice_ssl_article_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_ssl_article_subcat_cat_content, $la, '', '', $second_choice_ssl_article_cat, $second_choice_ssl_article_subcat_cat, "second_choice_ssl_article$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_ssl_article = "name like 'third_choice_ssl_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_ssl_article, $coms_conect);
    $third_choice_ssl_article_count = injection_replace_pic($_POST["third_choice_ssl_article_count"]);
    for ($x = 1; $x <= $third_choice_ssl_article_count; $x++) {

        $third_choice_ssl_article_pic_adress = injection_replace_pic($_POST["third_choice_ssl_article_pic_adress{$x}"]);
        $third_choice_ssl_article_title = injection_replace_pic($_POST["third_choice_ssl_article_title{$x}"]);
        $third_choice_ssl_article_text = injection_replace_pic($_POST["third_choice_ssl_article_text{$x}"]);


        $third_choice_ssl_article_pic = injection_replace_pic($_POST["third_choice_ssl_article_pic{$x}"]);
        $third_choice_ssl_article_pic = resize_image_M($third_choice_ssl_article_pic,58,43,$img_page_main,'');
        $third_choice_ssl_article_avatar7 = injection_replace($_POST["third_choice_ssl_article_avatar7{$x}"][0]);
        if ($third_choice_ssl_article_avatar7 > "") {
            $third_choice_ssl_article_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_ssl_article_avatar7;
            $third_choice_ssl_article_pic = resize_image_M($third_choice_ssl_article_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_ssl_article_title > "") {
            insert_templdate($site, $third_choice_ssl_article_pic_adress, $la, $third_choice_ssl_article_text, $third_choice_ssl_article_title, '', $third_choice_ssl_article_pic, "third_choice_ssl_article$x", 'coms2', $coms_conect);
        }
    }


    //   Light box
    $ssl_title_LightBox_pic_adress = 0;
    $ssl_title_LightBox_pic_adress= injection_replace($_POST["ssl_title_LightBox_pic_adress"]);
    $ssl_title_LightBox_title= injection_replace($_POST["ssl_title_LightBox_title"]);
    insert_templdate($site, $ssl_title_LightBox_pic_adress, $la, '', $ssl_title_LightBox_title, '', '', "ssl_title_LightBox", 'coms2', $coms_conect);

    $ValSelectActive_ssl_LightBox_title = injection_replace($_POST["ValSelectActive_ssl_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_ssl_LightBox_title, '', '', "ValSelectActive_ssl_LightBox", 'coms2', $coms_conect);

    $condition_first_choice_ssl_LightBox = "name like 'first_choice_ssl_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_ssl_LightBox, $coms_conect);
    $first_choice_ssl_LightBox_count = injection_replace_pic($_POST["first_choice_ssl_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_ssl_LightBox_count; $i++) {

        $first_choice_ssl_LightBox_cat = injection_replace_pic($_POST["first_choice_ssl_LightBox_cat{$i}"]);
        $first_choice_ssl_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_ssl_LightBox_subcat_cat{$i}"]);
        $first_choice_ssl_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_ssl_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_ssl_LightBox_number = injection_replace_pic($_POST["first_choice_ssl_LightBox_number{$i}"]);
        if ($first_choice_ssl_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_ssl_LightBox_number, $la, $first_choice_ssl_LightBox_Fixed_selection_cat, '', $first_choice_ssl_LightBox_cat, $first_choice_ssl_LightBox_subcat_cat, "first_choice_ssl_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_ssl_LightBox = "name like 'second_choice_ssl_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_ssl_LightBox, $coms_conect);
    $second_choice_ssl_LightBox_count = injection_replace_pic($_POST["second_choice_ssl_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_ssl_LightBox_count; $i++) {

        $second_choice_ssl_LightBox_cat = injection_replace_pic($_POST["second_choice_ssl_LightBox_cat{$i}"]);
        $second_choice_ssl_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_ssl_LightBox_subcat_cat{$i}"]);
        $second_choice_ssl_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_ssl_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_ssl_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_ssl_LightBox_subcat_cat_content, $la, '', '', $second_choice_ssl_LightBox_cat, $second_choice_ssl_LightBox_subcat_cat, "second_choice_ssl_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_ssl_LightBox = "name like 'third_choice_ssl_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_ssl_LightBox, $coms_conect);
    $third_choice_ssl_LightBox_count = injection_replace_pic($_POST["third_choice_ssl_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_ssl_LightBox_count; $x++) {

        $third_choice_ssl_LightBox_title = injection_replace_pic($_POST["third_choice_ssl_LightBox_title{$x}"]);
        $third_choice_ssl_LightBox_text = injection_replace_pic($_POST["third_choice_ssl_LightBox_text{$x}"]);
        $third_choice_ssl_LightBox_link = injection_replace_pic($_POST["third_choice_ssl_LightBox_link{$x}"]);
        $third_choice_ssl_LightBox_pic = injection_replace_pic($_POST["third_choice_ssl_LightBox_pic{$x}"]);
        $third_choice_ssl_LightBox_pic = resize_image_M($third_choice_ssl_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_ssl_LightBox_avatar7 = injection_replace($_POST["third_choice_ssl_LightBox_avatar7{$x}"][0]);
        if ($third_choice_ssl_LightBox_avatar7 > "") {
            $third_choice_ssl_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_ssl_LightBox_avatar7;
            $third_choice_ssl_LightBox_pic = resize_image_M($third_choice_ssl_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_ssl_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_ssl_LightBox_text, $third_choice_ssl_LightBox_title, $third_choice_ssl_LightBox_link, $third_choice_ssl_LightBox_pic, "third_choice_ssl_LightBox$x", 'coms2', $coms_conect);
        }
    }
//  header_seo
    $ssl_header_seo_keyword= injection_replace($_POST["ssl_header_seo_keyword"]);
    $ssl_header_seo_desciption= injection_replace($_POST["ssl_header_seo_desciption"]);
    $ssl_header_seo_pic= injection_replace($_POST["ssl_header_seo_pic"]);
    $ssl_header_seo_pic_adress = injection_replace($_POST["ssl_header_seo_pic_adress"]);
    $ssl_header_seo_pic_adress = resize_image_M($ssl_header_seo_pic_adress,20,20,$img_page_main,'');
    $ssl_header_seo_pic_adress_avatar_orak = injection_replace($_POST["ssl_header_seo_pic_adress_avatar_orak"][0]);
    if($ssl_header_seo_pic_adress_avatar_orak>""){
        $ssl_header_seo_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $ssl_header_seo_pic_adress_avatar_orak;
        $ssl_header_seo_pic_adress = resize_image_M($ssl_header_seo_pic_adress,20,20,$img_page_main,'');

    }
    insert_templdate($site, $ssl_header_seo_pic_adress, $la, $ssl_header_seo_desciption, $ssl_header_seo_keyword, '', $ssl_header_seo_pic, "ssl_header_seo", 'coms2', $coms_conect);

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
                                        <a class="z-link">ssl</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------ssl---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $ssl_box1 = get_tem_result($site, $la, "ssl_box1", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $ssl_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box1 H_dis_none"
                                                               name="ssl_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $ssl_box2 = get_tem_result($site, $la, "ssl_box2", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $ssl_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box2 H_dis_none"
                                                               name="ssl_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $ssl_box3_t = get_tem_result($site, $la, "ssl_box3_t", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box3_t" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $ssl_box3_t['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box3_t H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box3_t_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box3_t H_dis_none"
                                                               name="ssl_box3_t_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $ssl_box4 = get_tem_result($site, $la, "ssl_box4", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $ssl_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box4 H_dis_none"
                                                               name="ssl_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $ssl_box5 = get_tem_result($site, $la, "ssl_box5", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $ssl_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box5 H_dis_none"
                                                               name="ssl_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $ssl_box6 = get_tem_result($site, $la, "ssl_box6", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box6" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $ssl_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box6 H_dis_none"
                                                               name="ssl_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $ssl_box7 = get_tem_result($site, $la, "ssl_box7", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box7" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $ssl_box7['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box7 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box7_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box7 H_dis_none"
                                                               name="ssl_box7_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $ssl_box8 = get_tem_result($site, $la, "ssl_box8", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box8" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $ssl_box8['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box8 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box8_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box8 H_dis_none"
                                                               name="ssl_box8_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $ssl_box9 = get_tem_result($site, $la, "ssl_box9", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_ssl_box9" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $ssl_box9['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_ssl_box9 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_ssl_box9_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_ssl_box9 H_dis_none"
                                                               name="ssl_box9_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">
                                                
                                                <!-------------------------box fixed------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $ssl_boxOne = get_tem_result($site, $la, "ssl_boxOne", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxOne_title"
                                                                           value="<?= $ssl_boxOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxOne_text"
                                                                           value="<?= $ssl_boxOne['text'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="ssl_boxOne_pic"
                                                                                                                                                       value="<?=$ssl_boxOne['pic']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="ssl_boxOne_pic"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=ssl_boxOne_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="ssl_boxOne_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_ssl_boxOne_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_ssl_boxOne_pic">
                                                                        <a href="<?= $ssl_boxOne["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $ssl_boxOne["pic"] ?>" alt="<?= $ssl_boxOne["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#ssl_boxOne_pic_avatar_orak').orakuploader({
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

                                                                            $('#ssl_boxOne_pic_avatar_orak').html("<?=$pic_str?>");
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
                                                                            $ssl_content_fixed1 = get_tem_result($site, $la, "ssl_content_fixed1", 'coms2', $coms_conect);
                                                                            $ssl_content_fixed2 = get_tem_result($site, $la, "ssl_content_fixed2", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choicedel_ssl_content_fixed1"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="form-group col-md-12">

                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="ssl_content_fixed1_title"
                                                                                                   value="<?= $ssl_content_fixed1["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" عنوان اول"
                                                                                                   name="ssl_content_fixed1_title">
                                                                                        </div>
                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="ssl_content_fixed1_link"
                                                                                                   value="<?= $ssl_content_fixed1["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دوم"
                                                                                                   name="ssl_content_fixed1_link">
                                                                                        </div>


                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="ssl_content_fixed1_pic_adress"
                                                                                                   value="<?=$ssl_content_fixed1["pic_adress"]?>"

                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر"
                                                                                                   name="ssl_content_fixed1_pic_adress"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=ssl_content_fixed1_pic_adress"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                            <span class="input-group-addon H_neshane1 H_ssl_content_fixed1"
                                                                                                  style="padding: 0px;">
                                                                                    <div id="ssl_content_fixed1_avatar7"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="ssl_content_fixed1_avatar7_link"
                                                                                       name="ssl_content_fixed1_avatar7_link"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_ssl_content_fixed1"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class=" col-md-1 input-group"
                                                                                             id="image_show_ssl_content_fixed1">

                                                                                            <a href="<?= $ssl_content_fixed1["pic_adress"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $ssl_content_fixed1["pic_adress"] ?>"
                                                                                                     alt="<?= $ssl_content_fixed1["title"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#ssl_content_fixed1_avatar7').orakuploader({
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

                                                                                                $('#ssl_content_fixed1_avatar7').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="ssl_content_fixed1_pic"
                                                                                                   value="<?= $ssl_content_fixed1["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="ssl_content_fixed1_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="ssl_content_fixed1_text"
                                                                                                   value="<?= $ssl_content_fixed1["text"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="ssl_content_fixed1_text">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="ssl_content_fixed2_text"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="ssl_content_fixed2_text"><?= $ssl_content_fixed2["text"] ?>
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
                                                        <? $ssl_menubox_show = get_tem_result($site, $la, "ssl_menubox_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_menubox_show_pic_adress"
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
                                                                            <? $count_ssl_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'ssl_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_ssl_menubox_links; $k++) {
                                                                                $ssl_menubox_links = get_tem_result($site, $la, "ssl_menubox_links$k", 'coms2', $coms_conect);
                                                                                if ($ssl_menubox_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_ssl_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_ssl_menubox_links"
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
                                                                                                           id="ssl_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $ssl_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="ssl_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="ssl_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $ssl_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="ssl_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_ssl_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="ssl_menubox_links_count"
                                                                                   name="ssl_menubox_links_count"
                                                                                   value="<?= --$count_ssl_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_ssl_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_ssl_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_ssl_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="ssl_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="ssl_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="ssl_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="ssl_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_ssl_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#ssl_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_ssl_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#ssl_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_ssl_menubox_links' + id).remove();
                                                                                        $('#ssl_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_ssl_menubox_links"><i
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

                                                        <? $ssl_boxThree_title = get_tem_result($site, $la, "ssl_boxThree_title", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_boxThree_title['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_boxThree_title_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxThree_title_title"
                                                                           value="<?= $ssl_boxThree_title['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxThree_title_text"
                                                                           value="<?= $ssl_boxThree_title['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:5»</h5><br>
                                                        <h6 style="text-align: center;color: #585858; font-family: IRANSans">«در انتخاب آیکن یا عکس دقت شود که یکی باید انتخاب شود و دیگری خالی باشد.در صورتی که قصد انتخاب آیکن را دارید در مرحله اول بعداز زدن دکمه «افزودن» همه موارد به غیر از آیکن و عکس را پر کرده دکمه ذخیره را بزنید.بعد از لود مجدد صفحه می توانید آیکن مورد نظر خود را انتخاب کنید!»</h6><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_ssl_boxThree_con = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'ssl_boxThree_con%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_ssl_boxThree_con; $x++) {
                                                                            $ssl_boxThree_con = get_tem_result($site, $la, "ssl_boxThree_con$x", 'coms2', $coms_conect);
                                                                            if ($ssl_boxThree_con['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_ssl_boxThree_con<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_ssl_boxThree_con"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="ssl_boxThree_con_title<?= $x ?>"
                                                                                                       value="<?= $ssl_boxThree_con["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="ssl_boxThree_con_title<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="ssl_boxThree_con_pic<?= $x ?>"
                                                                                                       value="<?=$ssl_boxThree_con["pic"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="ssl_boxThree_con_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=ssl_boxThree_con_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_ssl_boxThree_con<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="ssl_boxThree_con_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="ssl_boxThree_con_avatar7_link<?= $x ?>"
                                                                                   name="ssl_boxThree_con_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_ssl_boxThree_con<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <?if($ssl_boxThree_con["pic"]!=""){?>
                                                                                                <div class="input-group" style="display: inline-table;"
                                                                                                     id="image_show_ssl_boxThree_con<?= $x ?>">
                                                                                                    <a href="<?= $ssl_boxThree_con["pic"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $ssl_boxThree_con["pic"] ?>"
                                                                                                             alt="<?= $ssl_boxThree_con["text"] ?>">
                                                                                                    </a>

                                                                                                </div>
                                                                                            <?}?>
                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#ssl_boxThree_con_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#ssl_boxThree_con_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                            <div class="col-md-1 input-group">
                                                                                                <button class="btn btn-default form-control" name="ssl_boxThree_con_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$ssl_boxThree_con['pic_adress']?>" role="iconpicker" ></button>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="ssl_boxThree_con_count"
                                                                               name="ssl_boxThree_con_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_ssl_boxThree_con-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_ssl_boxThree_con' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_ssl_boxThree_con" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="ssl_boxThree_con_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="ssl_boxThree_con_title' + i + '" ></div><div class="col-md-6 input-group"> <input type="text" id="ssl_boxThree_con_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="ssl_boxThree_con_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=ssl_boxThree_con_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_ssl_boxThree_con' + i + '" style="padding: 0px;"><div  id="ssl_boxThree_con_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="ssl_boxThree_con_avatar7_link' + i + '" name="ssl_boxThree_con_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_ssl_boxThree_con' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control iconpicker" name="ssl_boxThree_con_pic_adress'+ i +'" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ><i class="fa fa-nonicon"></i><input type="hidden" name="main_header_pic'+ i +'" value="fa-nonicon"><span class="caret"></span></button></div></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_ssl_boxThree_con' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#ssl_boxThree_con_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#ssl_boxThree_con_avatar7' + i + '').orakuploader({
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

                                                                                    $('#ssl_boxThree_con_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_ssl_boxThree_con' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_ssl_boxThree_con' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_ssl_boxThree_con', function () {
                                                                                    var id = '';
                                                                                    var k = $('#ssl_boxThree_con_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_ssl_boxThree_con' + id).remove();
                                                                                    $('#ssl_boxThree_con_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_ssl_boxThree_con-ads"><i
                                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                    class="fa fa-plus"></i>افزودن
                                                                            لینک</a>
                                                                        </br>
                                                                    </div>
                                                                </fieldset>
                                                            </div>


                                                        </div>

                                                        <hr>
                                                        <div class="col-md-12 p0">
                                                            <div class="panel with-nav-tabs">
                                                                <div class="panel-heading p0">
                                                                    <ul class="nav nav-tabs m0">
                                                                        <li class="active"><a href="#tab1success" data-toggle="tab">محتوای تب اول</a></li>
                                                                        <li><a href="#tab2success" data-toggle="tab">محتوای تب دوم</a></li>
                                                                        <li><a href="#tab3success" data-toggle="tab">محتوای تب سوم</a></li>
                                                                        <li><a href="#tab4success" data-toggle="tab">محتوای تب چهارم</a></li>
                                                                        <li><a href="#tab5success" data-toggle="tab">محتوای تب پنجم</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div >
                                                                    <? $ssl_title_con_boxThree= get_tem_result($site, $la, "ssl_title_con_boxThree", 'coms2', $coms_conect);
                                                                    $name_field=array('','pic_adress','text','title','link','pic');
                                                                    ?>

                                                                    <div class="ssl tab-content">

                                                                        <?for($i=1;$i<=5;$i++){?>

                                                                            <div class="tab-pane fade in <?if($i==1){echo 'active';}?>" id="tab<?=$i?>success">
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label" for="family">عنوان </label>
                                                                                    <div class="form-group col-md-9">
                                                                                        <div class="col-md-12 input-group">
                                                                                            <input type="text" class="form-control" name="ssl_title_con_boxThree_<?=$name_field[$i]?>"
                                                                                                   value="<?= $ssl_title_con_boxThree[$name_field[$i]] ?>" style="direction: rtl;">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane">
                                                                                    <div class="page-content-area">
                                                                                        <div class="page-body"
                                                                                             style="margin-top: 25px;">
                                                                                            <fieldset>
                                                                                                <!-- #section:download/download.link -->
                                                                                                <div class="col-md-12">
                                                                                                    <?
                                                                                                    $count1_ssl_content_tabs_box1 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'ssl_content_tabs_box1$i%' ", $coms_conect);
                                                                                                    for ($x = 1; $x <= $count1_ssl_content_tabs_box1; $x++) {
                                                                                                        $ssl_content_tabs_box1 = get_tem_result($site, $la, "ssl_content_tabs_box1$i$x", 'coms2', $coms_conect);
                                                                                                        $ssl_content_tabs_box_btn = get_tem_result($site, $la, "ssl_content_tabs_box_btn$i$x", 'coms2', $coms_conect);
                                                                                                        if ($ssl_content_tabs_box1['text'] > "") {
                                                                                                            ?>
                                                                                                            <div id="div_mother_third_choicedel_ssl_content_tabs_box1<?= $i ?><?= $x ?>"
                                                                                                                 class="seyed"
                                                                                                                 style="opacity: 1;">
                                                                                                                <div class="form-group">
                                                                                                                    <a class="col-md-1 control-label del_ssl_content_tabs_box1" style="margin-bottom: 100px!important"
                                                                                                                       id="<?= $i ?><?= $x ?>"
                                                                                                                       for="family"><i
                                                                                                                                class="fa fa-trash text-danger remove"
                                                                                                                                title=""
                                                                                                                                data-original-title="حذف"></i>
                                                                                                                    </a>

                                                                                                                    <div class="form-group col-md-11">

                                                                                                                        <div class="col-md-3 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box1_title<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box1["title"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="عنوان"
                                                                                                                                   name="ssl_content_tabs_box1_title<?= $i ?><?= $x ?>">
                                                                                                                        </div>
                                                                                                                        <div class="col-md-3 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box1_link<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box1["link"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="مبلغ"
                                                                                                                                   name="ssl_content_tabs_box1_link<?= $i ?><?= $x ?>">
                                                                                                                        </div>


                                                                                                                        <div class="col-md-5 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box1_pic_adress<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?=$ssl_content_tabs_box1["pic_adress"]?>"

                                                                                                                                   class="form-control"
                                                                                                                                   placeholder=" تصویر"
                                                                                                                                   name="ssl_content_tabs_box1_pic_adress<?= $i ?><?= $x ?>"
                                                                                                                                   style="direction: ltr;">
                                                                                                                            <span class="input-group-addon"
                                                                                                                                  style="padding: 0px;"><a
                                                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=ssl_content_tabs_box1_pic_adress<?= $i ?><?= $x ?>"
                                                                                                                                        class="btn btn-success iframe-btn"
                                                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                                            class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                                                            <span class="input-group-addon H_neshane1 H_ssl_content_tabs_box1<?= $i ?><?= $x ?>"
                                                                                                                                  style="padding: 0px;">
                                                                                    <div id="ssl_content_tabs_box1_avatar7<?= $i ?><?= $x ?>"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="ssl_content_tabs_box1_avatar7_link<?= $i ?><?= $x ?>"
                                                                                       name="ssl_content_tabs_box1_avatar7_link<?= $i ?><?= $x ?>"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                                                        </div>
                                                                                                                        <div class="ui-sortable red box"
                                                                                                                             id="upload_type_ssl_content_tabs_box1<?= $i ?><?= $x ?>"
                                                                                                                             style="float:right;">
                                                                                                                        </div>
                                                                                                                        <div class=" col-md-1 input-group"
                                                                                                                             id="image_show_ssl_content_tabs_box1<?= $i ?><?= $x ?>">

                                                                                                                            <a href="<?= $ssl_content_tabs_box1["pic_adress"] ?>"
                                                                                                                               class=" without-caption">
                                                                                                                                <img width="33"
                                                                                                                                     height="33"
                                                                                                                                     class="H_cursor_zoom"
                                                                                                                                     src="<?= $ssl_content_tabs_box1["pic_adress"] ?>"
                                                                                                                                     alt="<?= $ssl_content_tabs_box1["text"] ?>">
                                                                                                                            </a>

                                                                                                                        </div>

                                                                                                                        <script type="text/javascript">
                                                                                                                            $(document).ready(function () {
                                                                                                                                $('#ssl_content_tabs_box1_avatar7<?=$i?><?=$x?>').orakuploader({
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

                                                                                                                                $('#ssl_content_tabs_box1_avatar7<?=$i?><?= $x ?>').html("<?=$pic_str?>");
                                                                                                                            });
                                                                                                                        </script>

                                                                                                                    </div>
                                                                                                                    <div class="col-md-11 input-group H_pl32">
                                                                                                                        <div class="col-md-6 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box_btn_title<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box_btn["title"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="عنوان لینک اول"
                                                                                                                                   name="ssl_content_tabs_box_btn_title<?= $i ?><?= $x ?>">
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box_btn_link<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box_btn["link"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="لینک لینک اول"
                                                                                                                                   name="ssl_content_tabs_box_btn_link<?= $i ?><?= $x ?>">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-11 input-group H_pl32">
                                                                                                                        <div class="col-md-6 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box_btn_text<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box_btn["text"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="عنوان لینک دوم"
                                                                                                                                   name="ssl_content_tabs_box_btn_text<?= $i ?><?= $x ?>">
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box_btn_pic<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box_btn["pic"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="لینک لینک دوم"
                                                                                                                                   name="ssl_content_tabs_box_btn_pic<?= $i ?><?= $x ?>">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-11 input-group H_pl32">
                                                                                                                        <div class="col-md-4 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box1_text<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box1["text"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="عنوان دکمه"
                                                                                                                                   name="ssl_content_tabs_box1_text<?= $i ?><?= $x ?>">
                                                                                                                        </div>
                                                                                                                        <div class="col-md-4 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box1_pic<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box1["pic"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="لینک دکمه"
                                                                                                                                   name="ssl_content_tabs_box1_pic<?= $i ?><?= $x ?>">
                                                                                                                        </div>
                                                                                                                        <div class="col-md-4 input-group">
                                                                                                                            <input type="text"
                                                                                                                                   id="ssl_content_tabs_box_btn_pic_adress<?= $i ?><?= $x ?>"
                                                                                                                                   value="<?= $ssl_content_tabs_box_btn["pic_adress"] ?>"
                                                                                                                                   class="form-control"
                                                                                                                                   placeholder="عنوانی برای ویژه بودن"
                                                                                                                                   name="ssl_content_tabs_box_btn_pic_adress<?= $i ?><?= $x ?>">
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
                                                                                                           id="ssl_content_tabs_box1_count<?= $i ?>"
                                                                                                           name="ssl_content_tabs_box1_count<?= $i ?>"
                                                                                                           value="<?= --$xcount_mahsol; ?>">

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            var i = <?=$i?><?=$x?>;

                                                                                                            $('#add_ssl_content_tabs_box1-ads<?=$i?>').on("click", function () {
                                                                                                                var someText = '<div id="div_mother_third_choicedel_ssl_content_tabs_box1' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_ssl_content_tabs_box1" id="' + i + '" for="family" style="margin-bottom: 100px!important"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="ssl_content_tabs_box1_title' + i + '" value="" class="form-control" placeholder="عنوان" name="ssl_content_tabs_box1_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="ssl_content_tabs_box1_link' + i + '" value="" class="form-control" placeholder="مبلغ" name="ssl_content_tabs_box1_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="ssl_content_tabs_box1_pic_adress' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="ssl_content_tabs_box1_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=ssl_content_tabs_box1_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_ssl_content_tabs_box1' + i + '" style="padding: 0px;"><div  id="ssl_content_tabs_box1_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="ssl_content_tabs_box1_avatar7_link' + i + '" name="ssl_content_tabs_box1_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_ssl_content_tabs_box1' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="ssl_content_tabs_box_btn_title' + i + '" value="" class="form-control"   placeholder="عنوان لینک اول" name="ssl_content_tabs_box_btn_title'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="ssl_content_tabs_box_btn_link' + i + '" value="" class="form-control"   placeholder="لینک لینک اول" name="ssl_content_tabs_box_btn_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="ssl_content_tabs_box_btn_text' + i + '" value="" class="form-control"   placeholder="عنوان لینک دوم" name="ssl_content_tabs_box_btn_text'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="ssl_content_tabs_box_btn_pic' + i + '" value="" class="form-control"   placeholder="لینک لینک دوم" name="ssl_content_tabs_box_btn_pic'+ i +'"></div></div> <div class="col-md-11 input-group H_pl32"><div class="col-md-4 input-group"><input type="text" id="ssl_content_tabs_box1_text' + i + '" value="" class="form-control"   placeholder="عنوان دکمه " name="ssl_content_tabs_box1_text'+ i +'"></div><div class="col-md-4 input-group"><input type="text" id="ssl_content_tabs_box1_pic' + i + '" value="" class="form-control"   placeholder="لینک دکمه " name="ssl_content_tabs_box1_pic'+ i +'"></div><div class="col-md-4 input-group"><input type="text" id="ssl_content_tabs_box_btn_pic_adress' + i + '" value="" class="form-control"   placeholder="عنوانی برای ویژه بودن " name="ssl_content_tabs_box_btn_pic_adress'+ i +'"></div></div></div></div>';
                                                                                                                $(this).before(someText);
                                                                                                                $('#div_mother_third_choicedel_ssl_content_tabs_box1' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                                    $(this).css('background', '');
                                                                                                                }).fadeTo('slow', 1);
                                                                                                                $('#ssl_content_tabs_box1_count<?=$i?>').val(i);

                                                                                                                //--------orakuploader
                                                                                                                $('#ssl_content_tabs_box1_avatar7' + i + '').orakuploader({
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

                                                                                                                $('#ssl_content_tabs_box1_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                                                $('.input-group-addon.H_ssl_content_tabs_box1' + i + '').find("div").first().next().css('width', '100px');
                                                                                                                $('.input-group-addon.H_ssl_content_tabs_box1' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                                                //    ---end orakuploader
                                                                                                                i++;
                                                                                                            });
                                                                                                            $(document).on('click', '.del_ssl_content_tabs_box1', function () {
                                                                                                                var id = '';
                                                                                                                var k = $('#ssl_content_tabs_box1_count<?=$i?>').val();
                                                                                                                k--
                                                                                                                id = $(this).attr('id');
                                                                                                                $('#div_mother_third_choicedel_ssl_content_tabs_box1' + id).remove();
                                                                                                                $('#ssl_content_tabs_box1_count<?=$i?>').val(k);
                                                                                                            });
                                                                                                        });


                                                                                                    </script>
                                                                                                    <a class="btn btn-success block"
                                                                                                       id="add_ssl_content_tabs_box1-ads<?= $i ?>"><i
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
                                                                        <?}?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </div>

                                                <!-------------------box4------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $ssl_boxTwo = get_tem_result($site, $la, "ssl_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxTwo_title"
                                                                           value="<?= $ssl_boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxTwo_text"
                                                                           value="<?= $ssl_boxTwo['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h3 class="area" style="text-align: center;color: red; font-family: IRANSans">«مضربی از 3»</h3><br>
                                                        <? $ValSelectActive_ssl_boxTwo = get_tem_result($site, $la, "ValSelectActive_ssl_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_ssl_boxTwo"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_ssl_boxTwo"
                                                                    name="select_type_ssl_boxTwo">

                                                                <option <? if ($ValSelectActive_ssl_boxTwo["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_ssl_boxTwo["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_ssl_boxTwo["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_ssl_boxTwo_title" type="hidden"
                                                                   value="<?= $ValSelectActive_ssl_boxTwo["title"] ?>">

                                                            <div class="tab-pane opt_ssl_boxTwo ssl_boxTwo_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_ssl_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_ssl_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_ssl_boxTwo; $j++) {
                                                                                    $first_choice_ssl_boxTwo = get_tem_result($site, $la, "first_choice_ssl_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_ssl_boxTwo['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_ssl_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_ssl_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_ssl_boxTwo col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_ssl_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_ssl_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_ssl_boxTwo['pic'] ?>">

                                                                                                        <select id="first_choice_ssl_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_ssl_boxTwo_cat"
                                                                                                                name="first_choice_ssl_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_ssl_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_ssl_boxTwo<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_ssl_boxTwo_new&id=" + $("#first_choice_ssl_boxTwo_cat<?=$j?>").val() + "&value=" + $("#first_choice_ssl_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_ssl_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_ssl_boxTwo_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_ssl_boxTwo_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_boxTwo['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_boxTwo['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_boxTwo['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_ssl_boxTwo_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_ssl_boxTwo["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_ssl_boxTwo_number<?= $j ?>">
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
                                                                                       id="first_choice_ssl_boxTwo_count"
                                                                                       name="first_choice_ssl_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_ssl_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_ssl_boxTwo').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_ssl_boxTwo_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_ssl_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_ssl_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_ssl_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_ssl_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_ssl_boxTwo col-md-4 input-group"><input type="hidden" id="first_choice_ssl_boxTwo_subcat_val' + i + '"  name="first_choice_ssl_boxTwo_subcat_val' + i + '" value=""> <select id="first_choice_ssl_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_ssl_boxTwo_cat" name="first_choice_ssl_boxTwo_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_ssl_boxTwo' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_ssl_boxTwo_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_ssl_boxTwo_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_ssl_boxTwo_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_ssl_boxTwo_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_ssl_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_ssl_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_ssl_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_ssl_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_ssl_boxTwo' + id).remove();
                                                                                            $('#first_choice_ssl_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_ssl_boxTwo"><i
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

                                                            <div class="tab-pane opt_ssl_boxTwo ssl_boxTwo_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_ssl_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_ssl_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_ssl_boxTwo; $j++) {
                                                                                    $second_choice_ssl_boxTwo = get_tem_result($site, $la, "second_choice_ssl_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_ssl_boxTwo['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_ssl_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_ssl_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_ssl_boxTwo col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_ssl_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_ssl_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_ssl_boxTwo['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_ssl_boxTwo_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_ssl_boxTwo_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_ssl_boxTwo['pic_adress'] ?>">

                                                                                                        <select id="second_choice_ssl_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_ssl_boxTwo_cat"
                                                                                                                name="second_choice_ssl_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_ssl_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_ssl_boxTwo<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_ssl_boxTwo_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_ssl_boxTwo&id=" + $("#second_choice_ssl_boxTwo_cat<?=$j?>").val() + "&value=" + $("#second_choice_ssl_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_ssl_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_ssl_boxTwo_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_ssl_boxTwo_content&id=" + $("#second_choice_ssl_boxTwo_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_ssl_boxTwo_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_ssl_boxTwo_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_ssl_boxTwo_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_ssl_boxTwo_count"
                                                                                       name="second_choice_ssl_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_ssl_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_ssl_boxTwo').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_ssl_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_ssl_boxTwo_neshane").change(function () {
                                                                                        var j = $("#second_choice_ssl_boxTwo_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_ssl_boxTwo' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_ssl_boxTwo_neshane', function () {
                                                                                        var j = $("#second_choice_ssl_boxTwo_count").val();
                                                                                        //  $(".second_choice_ssl_boxTwo_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_boxTwo_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_ssl_boxTwo_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_ssl_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_ssl_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_ssl_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_ssl_boxTwo col-md-3 input-group"><input type="hidden" id="second_choice_ssl_boxTwo_subcat_val' + i + '"  name="second_choice_ssl_boxTwo_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_ssl_boxTwo_subcat_link' + i + '"  name="second_choice_ssl_boxTwo_subcat_link' + i + '" value=""> <select id="second_choice_ssl_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_ssl_boxTwo_cat" name="second_choice_ssl_boxTwo_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_ssl_boxTwo' + i + '" class="col-md-3 input-group"></div><div id="second_choice_ssl_boxTwo_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_ssl_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_ssl_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_ssl_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_ssl_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_ssl_boxTwo' + id).remove();
                                                                                            $('#second_choice_ssl_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_ssl_boxTwo"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_ssl_boxTwo ssl_boxTwo_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_ssl_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_ssl_boxTwo%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_ssl_boxTwo; $x++) {
                                                                                    $third_choice_ssl_boxTwo = get_tem_result($site, $la, "third_choice_ssl_boxTwo$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_ssl_boxTwo['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_ssl_boxTwo<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_ssl_boxTwo"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_ssl_boxTwo_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_ssl_boxTwo["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_ssl_boxTwo_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_ssl_boxTwo_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_ssl_boxTwo["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_ssl_boxTwo_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_ssl_boxTwo_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_ssl_boxTwo["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_ssl_boxTwo_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_ssl_boxTwo_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_ssl_boxTwo<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_ssl_boxTwo_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_ssl_boxTwo_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_ssl_boxTwo_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_ssl_boxTwo<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_ssl_boxTwo["pic"]!=""){?>
                                                                                                        <div class="input-group"
                                                                                                             id="image_show_third_choice_ssl_boxTwo<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_ssl_boxTwo["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_ssl_boxTwo["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_ssl_boxTwo["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_ssl_boxTwo_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_ssl_boxTwo_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_ssl_boxTwo_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_ssl_boxTwo['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_ssl_boxTwo_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_ssl_boxTwo_text<?= $x ?>"><?= $third_choice_ssl_boxTwo["text"] ?>

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
                                                                                       id="third_choice_ssl_boxTwo_count"
                                                                                       name="third_choice_ssl_boxTwo_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_ssl_boxTwo-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_ssl_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_ssl_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_ssl_boxTwo_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_ssl_boxTwo_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_ssl_boxTwo_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_ssl_boxTwo_link' + i + '" ></div><div class="col-md-4 input-group"> <input type="text" id="third_choice_ssl_boxTwo_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_ssl_boxTwo_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_ssl_boxTwo_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_ssl_boxTwo' + i + '" style="padding: 0px;"><div  id="third_choice_ssl_boxTwo_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_ssl_boxTwo_avatar7_link' + i + '" name="third_choice_ssl_boxTwo_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_ssl_boxTwo' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_ssl_boxTwo_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_ssl_boxTwo_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_ssl_boxTwo_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_ssl_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_ssl_boxTwo_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_ssl_boxTwo_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_ssl_boxTwo_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_ssl_boxTwo' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_ssl_boxTwo' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_ssl_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_ssl_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_ssl_boxTwo' + id).remove();
                                                                                            $('#third_choice_ssl_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_ssl_boxTwo-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_ssl_boxTwo_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_ssl_boxTwo"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_ssl_boxTwo_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_ssl_boxTwo').hide();
                                                                        $('.ssl_boxTwo_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>

                                                <!-------------------box5------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $ssl_boxFive = get_tem_result($site, $la, "ssl_boxFive", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_boxFive['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_boxFive_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxFive_title"
                                                                           value="<?= $ssl_boxFive['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxFive_text"
                                                                           value="<?= $ssl_boxFive['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_boxFive_pic"
                                                                           value="<?= $ssl_boxFive['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ssl_show_faq_que = get_tem_result($site, $la, "ssl_show_faq_que", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «سوالات متداول» </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_show_faq_que['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_show_faq_que_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_ssl_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type='100' and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_faq_text' id='cat_faq_text' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $ssl_show_faq_que['text'])
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
                                                                           type="checkbox" <? if ($ssl_show_faq_que['pic'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_show_faq_que_pic"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_ssl_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type=99 and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_qes_title' id='cat_qes_title' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $ssl_show_faq_que['title'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">

                                                        <? $ssl_pop_faq = get_tem_result($site, $la, "ssl_pop_faq", 'coms2', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اطلاعات داخل پاپاپ »</h5><br>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_pop_faq_title"
                                                                           value="<?= $ssl_pop_faq['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_pop_faq_text"
                                                                           value="<?= $ssl_pop_faq['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان سمت چپ</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_pop_faq_pic"
                                                                           value="<?= $ssl_pop_faq['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن شعار</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_pop_faq_link"
                                                                           value="<?= $ssl_pop_faq['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="ssl_pop_faq_pic_adress"
                                                                           value="<?= $ssl_pop_faq['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="ssl_show_faq_que_link"
                                                                           value="<?= $ssl_show_faq_que['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="ssl_boxFive_link"
                                                                               value="<?=$ssl_boxFive['link']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="ssl_boxFive_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=ssl_boxFive_link"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="ssl_boxFive_link_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_ssl_boxFive_link"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_ssl_boxFive_link">
                                                                        <a href="<?= $ssl_boxFive["link"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $ssl_boxFive["link"] ?>" alt="<?= $ssl_boxFive["link"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#ssl_boxFive_link_avatar_orak').orakuploader({
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

                                                                            $('#ssl_boxFive_link_avatar_orak').html("<?=$pic_str?>");
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
                                                        <? $ssl_degarKhadamat = get_tem_result($site, $la, "ssl_degarKhadamat", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_degarKhadamat['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_degarKhadamat_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_degarKhadamat_title"
                                                                           value="<?= $ssl_degarKhadamat['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_degarKhadamat_text"
                                                                           value="<?= $ssl_degarKhadamat['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:7 »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_ssl_degarKhadamat_content = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'ssl_degarKhadamat_content%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_ssl_degarKhadamat_content; $x++) {
                                                                            $ssl_degarKhadamat_content = get_tem_result($site, $la, "ssl_degarKhadamat_content$x", 'coms2', $coms_conect);
                                                                            if ($ssl_degarKhadamat_content['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_ssl_degarKhadamat_content<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_ssl_degarKhadamat_content"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="ssl_degarKhadamat_content_title<?= $x ?>"
                                                                                                       value="<?= $ssl_degarKhadamat_content["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="ssl_degarKhadamat_content_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="ssl_degarKhadamat_content_link<?= $x ?>"
                                                                                                       value="<?= $ssl_degarKhadamat_content["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="ssl_degarKhadamat_content_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="ssl_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       value="<?=$ssl_degarKhadamat_content["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="ssl_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=ssl_degarKhadamat_content_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_ssl_degarKhadamat_content<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="ssl_degarKhadamat_content_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="ssl_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   name="ssl_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_ssl_degarKhadamat_content<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group"
                                                                                                 id="image_show_ssl_degarKhadamat_content<?= $x ?>">
                                                                                                <a href="<?= $ssl_degarKhadamat_content["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $ssl_degarKhadamat_content["pic_adress"] ?>"
                                                                                                         alt="<?= $ssl_degarKhadamat_content["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#ssl_degarKhadamat_content_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#ssl_degarKhadamat_content_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                <textarea type="text"
                                                                          id="ssl_degarKhadamat_content_text<?= $x ?>"
                                                                          class="form-control"
                                                                          placeholder="عنوان دوم"
                                                                          name="ssl_degarKhadamat_content_text<?= $x ?>"><?= $ssl_degarKhadamat_content["text"] ?>

                                                                </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="ssl_degarKhadamat_content_count"
                                                                               name="ssl_degarKhadamat_content_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_ssl_degarKhadamat_content-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_ssl_degarKhadamat_content' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_ssl_degarKhadamat_content" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="ssl_degarKhadamat_content_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="ssl_degarKhadamat_content_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="ssl_degarKhadamat_content_link' + i + '" value="" class="form-control" placeholder="لینک" name="ssl_degarKhadamat_content_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="ssl_degarKhadamat_content_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="ssl_degarKhadamat_content_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=ssl_degarKhadamat_content_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_ssl_degarKhadamat_content' + i + '" style="padding: 0px;"><div  id="ssl_degarKhadamat_content_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="ssl_degarKhadamat_content_avatar7_link' + i + '" name="ssl_degarKhadamat_content_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_ssl_degarKhadamat_content' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="ssl_degarKhadamat_content_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="ssl_degarKhadamat_content_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_ssl_degarKhadamat_content' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#ssl_degarKhadamat_content_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#ssl_degarKhadamat_content_avatar7' + i + '').orakuploader({
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

                                                                                    $('#ssl_degarKhadamat_content_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_ssl_degarKhadamat_content' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_ssl_degarKhadamat_content' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_ssl_degarKhadamat_content', function () {
                                                                                    var id = '';
                                                                                    var k = $('#ssl_degarKhadamat_content_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_ssl_degarKhadamat_content' + id).remove();
                                                                                    $('#ssl_degarKhadamat_content_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_ssl_degarKhadamat_content-ads"><i
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

                                                        <? $ssl_title_article = get_tem_result($site, $la, "ssl_title_article", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_title_article['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_title_article_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_title_article_title"
                                                                           value="<?= $ssl_title_article['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="ssl_title_article_text"
                                                                           value="<?= $ssl_title_article['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="ssl_title_article_link"
                                                                           value="<?= $ssl_title_article['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_ssl_article = get_tem_result($site, $la, "ValSelectActive_ssl_article", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_ssl_article"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_ssl_article"
                                                                    name="select_type_ssl_article">

                                                                <option <? if ($ValSelectActive_ssl_article["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_ssl_article["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_ssl_article["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_ssl_article_title" type="hidden"
                                                                   value="<?= $ValSelectActive_ssl_article["title"] ?>">

                                                            <div class="tab-pane opt_ssl_article ssl_article_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_ssl_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_ssl_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_ssl_article; $j++) {
                                                                                    $first_choice_ssl_article = get_tem_result($site, $la, "first_choice_ssl_article$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_ssl_article['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_ssl_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_ssl_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_ssl_article col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_ssl_article_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_ssl_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_ssl_article['pic'] ?>">

                                                                                                        <select id="first_choice_ssl_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_ssl_article_cat"
                                                                                                                name="first_choice_ssl_article_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_ssl_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_ssl_article<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_ssl_article_new&id=" + $("#first_choice_ssl_article_cat<?=$j?>").val() + "&value=" + $("#first_choice_ssl_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_ssl_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_ssl_article_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_ssl_article_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_article['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_article['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_article['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_ssl_article_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_ssl_article["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_ssl_article_number<?= $j ?>">
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
                                                                                       id="first_choice_ssl_article_count"
                                                                                       name="first_choice_ssl_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_ssl_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_ssl_article').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_ssl_article_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_ssl_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_ssl_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_ssl_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_ssl_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_ssl_article col-md-4 input-group"><input type="hidden" id="first_choice_ssl_article_subcat_val' + i + '"  name="first_choice_ssl_article_subcat_val' + i + '" value=""> <select id="first_choice_ssl_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_ssl_article_cat" name="first_choice_ssl_article_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_ssl_article' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_ssl_article_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_ssl_article_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_ssl_article_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_ssl_article_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_ssl_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_ssl_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_ssl_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_ssl_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_ssl_article' + id).remove();
                                                                                            $('#first_choice_ssl_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_ssl_article"><i
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

                                                            <div class="tab-pane opt_ssl_article ssl_article_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_ssl_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_ssl_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_ssl_article; $j++) {
                                                                                    $second_choice_ssl_article = get_tem_result($site, $la, "second_choice_ssl_article$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_ssl_article['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_ssl_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_ssl_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_ssl_article col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_ssl_article_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_ssl_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_ssl_article['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_ssl_article_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_ssl_article_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_ssl_article['pic_adress'] ?>">

                                                                                                        <select id="second_choice_ssl_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_ssl_article_cat"
                                                                                                                name="second_choice_ssl_article_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_ssl_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_ssl_article<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_ssl_article_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_ssl_article&id=" + $("#second_choice_ssl_article_cat<?=$j?>").val() + "&value=" + $("#second_choice_ssl_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_ssl_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_ssl_article_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_ssl_article_content&id=" + $("#second_choice_ssl_article_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_ssl_article_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_ssl_article_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_ssl_article_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_ssl_article_count"
                                                                                       name="second_choice_ssl_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_ssl_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_ssl_article').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_ssl_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_ssl_article_neshane").change(function () {
                                                                                        var j = $("#second_choice_ssl_article_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_ssl_article' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_ssl_article_neshane', function () {
                                                                                        var j = $("#second_choice_ssl_article_count").val();
                                                                                        //  $(".second_choice_ssl_article_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_article_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_ssl_article_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_ssl_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_ssl_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_ssl_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_ssl_article col-md-3 input-group"><input type="hidden" id="second_choice_ssl_article_subcat_val' + i + '"  name="second_choice_ssl_article_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_ssl_article_subcat_link' + i + '"  name="second_choice_ssl_article_subcat_link' + i + '" value=""> <select id="second_choice_ssl_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_ssl_article_cat" name="second_choice_ssl_article_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_ssl_article' + i + '" class="col-md-3 input-group"></div><div id="second_choice_ssl_article_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_ssl_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_ssl_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_ssl_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_ssl_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_ssl_article' + id).remove();
                                                                                            $('#second_choice_ssl_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_ssl_article"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_ssl_article ssl_article_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_ssl_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_ssl_article%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_ssl_article; $x++) {
                                                                                    $third_choice_ssl_article = get_tem_result($site, $la, "third_choice_ssl_article$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_ssl_article['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_ssl_article<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_ssl_article"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_ssl_article_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_ssl_article["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_ssl_article_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_ssl_article_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_ssl_article["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_ssl_article_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_ssl_article_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_ssl_article<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_ssl_article_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_ssl_article_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_ssl_article_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_ssl_article<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_ssl_article["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_ssl_article<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_ssl_article["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_ssl_article["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_ssl_article["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_ssl_article_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_ssl_article_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_ssl_article_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_ssl_article['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_ssl_article_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_ssl_article_text<?= $x ?>"><?= $third_choice_ssl_article["text"] ?>

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
                                                                                       id="third_choice_ssl_article_count"
                                                                                       name="third_choice_ssl_article_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_ssl_article-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_ssl_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_ssl_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-4 input-group"><input type="text" id="third_choice_ssl_article_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_ssl_article_title' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_ssl_article_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_ssl_article_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_ssl_article_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_ssl_article' + i + '" style="padding: 0px;"><div  id="third_choice_ssl_article_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_ssl_article_avatar7_link' + i + '" name="third_choice_ssl_article_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_ssl_article' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_ssl_article_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_ssl_article_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_ssl_article_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_ssl_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_ssl_article_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_ssl_article_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_ssl_article_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_ssl_article' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_ssl_article' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_ssl_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_ssl_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_ssl_article' + id).remove();
                                                                                            $('#third_choice_ssl_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_ssl_article-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_ssl_article_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_ssl_article"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_ssl_article_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_ssl_article').hide();
                                                                        $('.ssl_article_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content8" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $ssl_title_LightBox = get_tem_result($site, $la, "ssl_title_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($ssl_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="ssl_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_title_LightBox_title"
                                                                           value="<?= $ssl_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_ssl_LightBox = get_tem_result($site, $la, "ValSelectActive_ssl_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_ssl_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_ssl_LightBox"
                                                                    name="select_type_ssl_LightBox">

                                                                <option <? if ($ValSelectActive_ssl_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_ssl_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_ssl_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_ssl_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_ssl_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_ssl_LightBox ssl_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_ssl_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_ssl_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_ssl_LightBox; $j++) {
                                                                                    $first_choice_ssl_LightBox = get_tem_result($site, $la, "first_choice_ssl_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_ssl_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_ssl_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_ssl_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_ssl_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_ssl_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_ssl_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_ssl_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_ssl_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_ssl_LightBox_cat"
                                                                                                                name="first_choice_ssl_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_ssl_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_ssl_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_ssl_LightBox_new&id=" + $("#first_choice_ssl_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_ssl_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_ssl_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_ssl_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_ssl_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_ssl_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_ssl_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_ssl_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_ssl_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_ssl_LightBox_count"
                                                                                       name="first_choice_ssl_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_ssl_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_ssl_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_ssl_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_ssl_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_ssl_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_ssl_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_ssl_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_ssl_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_ssl_LightBox_subcat_val' + i + '"  name="first_choice_ssl_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_ssl_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_ssl_LightBox_cat" name="first_choice_ssl_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_ssl_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_ssl_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_ssl_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_ssl_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_ssl_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_ssl_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_ssl_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_ssl_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_ssl_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_ssl_LightBox' + id).remove();
                                                                                            $('#first_choice_ssl_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_ssl_LightBox"><i
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

                                                            <div class="tab-pane opt_ssl_LightBox ssl_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_ssl_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_ssl_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_ssl_LightBox; $j++) {
                                                                                    $second_choice_ssl_LightBox = get_tem_result($site, $la, "second_choice_ssl_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_ssl_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_ssl_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_ssl_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_ssl_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_ssl_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_ssl_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_ssl_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_ssl_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_ssl_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_ssl_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_ssl_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_ssl_LightBox_cat"
                                                                                                                name="second_choice_ssl_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_ssl_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_ssl_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_ssl_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_ssl_LightBox&id=" + $("#second_choice_ssl_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_ssl_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_ssl_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_ssl_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_ssl_LightBox_content&id=" + $("#second_choice_ssl_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_ssl_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_ssl_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_ssl_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_ssl_LightBox_count"
                                                                                       name="second_choice_ssl_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_ssl_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_ssl_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_ssl_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_ssl_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_ssl_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_ssl_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_ssl_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_ssl_LightBox_count").val();
                                                                                        //  $(".second_choice_ssl_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_ssl_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_ssl_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_ssl_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_ssl_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_ssl_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_ssl_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_ssl_LightBox_subcat_val' + i + '"  name="second_choice_ssl_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_ssl_LightBox_subcat_link' + i + '"  name="second_choice_ssl_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_ssl_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_ssl_LightBox_cat" name="second_choice_ssl_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_ssl_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_ssl_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_ssl_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_ssl_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_ssl_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_ssl_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_ssl_LightBox' + id).remove();
                                                                                            $('#second_choice_ssl_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_ssl_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_ssl_LightBox ssl_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_ssl_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_ssl_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_ssl_LightBox; $x++) {
                                                                                    $third_choice_ssl_LightBox = get_tem_result($site, $la, "third_choice_ssl_LightBox$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_ssl_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_ssl_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_ssl_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_ssl_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_ssl_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_ssl_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_ssl_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_ssl_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_ssl_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_ssl_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_ssl_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_ssl_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_ssl_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_ssl_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_ssl_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_ssl_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_ssl_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_ssl_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_ssl_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_ssl_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_ssl_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_ssl_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_ssl_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_ssl_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_ssl_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_ssl_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_ssl_LightBox_text<?= $x ?>"><?= $third_choice_ssl_LightBox["text"] ?>

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
                                                                                       id="third_choice_ssl_LightBox_count"
                                                                                       name="third_choice_ssl_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_ssl_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_ssl_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_ssl_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_ssl_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_ssl_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_ssl_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_ssl_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_ssl_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_ssl_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_ssl_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_ssl_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_ssl_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_ssl_LightBox_avatar7_link' + i + '" name="third_choice_ssl_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_ssl_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_ssl_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_ssl_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_ssl_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_ssl_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_ssl_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_ssl_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_ssl_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_ssl_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_ssl_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_ssl_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_ssl_LightBox' + id).remove();
                                                                                            $('#third_choice_ssl_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_ssl_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_ssl_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_ssl_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_ssl_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_ssl_LightBox').hide();
                                                                        $('.ssl_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------header_seo------------------->
                                                <div  id="content9" class="bhoechie-tab-content H1 ">
                                                    <? $ssl_header_seo = get_tem_result($site, $la, "ssl_header_seo", 'coms2', $coms_conect); ?>
                                                    <center>
                                                        <div class="col-md-12">
                                                            <label  class="col-md-3 control-label" >meta keyword</label>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" value="<?= $ssl_header_seo['title'] ?>" id="header_seo_keyword" name="ssl_header_seo_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" >meta Description</label>
                                                                <div class="form-group col-md-6">
                                                                    <textarea id="header_seo_desciption" name="ssl_header_seo_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $ssl_header_seo['text'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">title</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="ssl_header_seo_pic"
                                                                           value="<?= $ssl_header_seo ['pic'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="ssl_header_seo_pic_adress"
                                                                                                                                                       value="<?=$ssl_header_seo['pic_adress']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="ssl_header_seo_pic_adress"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=ssl_header_seo_pic_adress"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="ssl_header_seo_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_ssl_header_seo_pic_adress"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_ssl_header_seo_pic_adress">
                                                                        <a href="<?= $ssl_header_seo["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $ssl_header_seo["pic_adress"] ?>" alt="<?= $ssl_header_seo["pic_adress"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#ssl_header_seo_pic_adress_avatar_orak').orakuploader({
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

                                                                            $('#ssl_header_seo_pic_adress_avatar_orak').html("<?=$pic_str?>");
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
        //----------ssl---------------------
        $(".H_rename_ssl_box1").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box1_save').show();
            $(".H_input_rename_ssl_box1").toggle(300);
        });
        $(".H_rename_ssl_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box1' + "&value=" + $(".H_input_rename_ssl_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box1 > span.temp").text($(".H_input_rename_ssl_box1").val());
            $(this).hide();
            $('.H_rename_ssl_box1').show();
            $(".H_input_rename_ssl_box1").hide();
            $(".H_rename_ssl_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_ssl_box2").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box2_save').show();
            $(".H_input_rename_ssl_box2").toggle(300);
        });
        $(".H_rename_ssl_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box2' + "&value=" + $(".H_input_rename_ssl_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box2 > span.temp").text($(".H_input_rename_ssl_box2").val());
            $(this).hide();
            $('.H_rename_ssl_box2').show();
            $(".H_input_rename_ssl_box2").hide();
            $(".H_rename_ssl_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_ssl_box3_t").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box3_t_save').show();
            $(".H_input_rename_ssl_box3_t").toggle(300);
        });
        $(".H_rename_ssl_box3_t_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box3_t' + "&value=" + $(".H_input_rename_ssl_box3_t").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box3_t > span.temp").text($(".H_input_rename_ssl_box3_t").val());
            $(this).hide();
            $('.H_rename_ssl_box3_t').show();
            $(".H_input_rename_ssl_box3_t").hide();
            $(".H_rename_ssl_box3_t.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_ssl_box4").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box4_save').show();
            $(".H_input_rename_ssl_box4").toggle(300);
        });
        $(".H_rename_ssl_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box4' + "&value=" + $(".H_input_rename_ssl_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box4 > span.temp").text($(".H_input_rename_ssl_box4").val());
            $(this).hide();
            $('.H_rename_ssl_box4').show();
            $(".H_input_rename_ssl_box4").hide();
            $(".H_rename_ssl_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_ssl_box5").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box5_save').show();
            $(".H_input_rename_ssl_box5").toggle(300);
        });
        $(".H_rename_ssl_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box5' + "&value=" + $(".H_input_rename_ssl_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box5 > span.temp").text($(".H_input_rename_ssl_box5").val());
            $(this).hide();
            $('.H_rename_ssl_box5').show();
            $(".H_input_rename_ssl_box5").hide();
            $(".H_rename_ssl_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_ssl_box6").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box6_save').show();
            $(".H_input_rename_ssl_box6").toggle(300);
        });
        $(".H_rename_ssl_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box6' + "&value=" + $(".H_input_rename_ssl_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box6 > span.temp").text($(".H_input_rename_ssl_box6").val());
            $(this).hide();
            $('.H_rename_ssl_box6').show();
            $(".H_input_rename_ssl_box6").hide();
            $(".H_rename_ssl_box6.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_ssl_box7").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box7_save').show();
            $(".H_input_rename_ssl_box7").toggle(300);
        });
        $(".H_rename_ssl_box7_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box7' + "&value=" + $(".H_input_rename_ssl_box7").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box7 > span.temp").text($(".H_input_rename_ssl_box7").val());
            $(this).hide();
            $('.H_rename_ssl_box7').show();
            $(".H_input_rename_ssl_box7").hide();
            $(".H_rename_ssl_box7.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_ssl_box8").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box8_save').show();
            $(".H_input_rename_ssl_box8").toggle(300);
        });
        $(".H_rename_ssl_box8_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box8' + "&value=" + $(".H_input_rename_ssl_box8").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box8 > span.temp").text($(".H_input_rename_ssl_box8").val());
            $(this).hide();
            $('.H_rename_ssl_box8').show();
            $(".H_input_rename_ssl_box8").hide();
            $(".H_rename_ssl_box8.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_ssl_box9").click(function () {
            $(this).hide();
            $('.H_rename_ssl_box9_save').show();
            $(".H_input_rename_ssl_box9").toggle(300);
        });
        $(".H_rename_ssl_box9_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'ssl_box9' + "&value=" + $(".H_input_rename_ssl_box9").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_ssl_box9 > span.temp").text($(".H_input_rename_ssl_box9").val());
            $(this).hide();
            $('.H_rename_ssl_box9').show();
            $(".H_input_rename_ssl_box9").hide();
            $(".H_rename_ssl_box9.H_pos_color").css('transform', 'translateY(-24px)');
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
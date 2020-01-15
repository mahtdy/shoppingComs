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

    $content_boxOne_pic_adress = 0;
    $content_boxOne_pic_adress= injection_replace($_POST["content_boxOne_pic_adress"]);
    insert_templdate($site, $content_boxOne_pic_adress, $la, '', '', '', '', "content_boxOne", 'coms2', $coms_conect);

    $content_content_BoxOne_title= injection_replace($_POST["content_content_BoxOne_title"]);
    $content_content_BoxOne_pic = injection_replace($_POST["content_content_BoxOne_pic"]);
    $content_content_BoxOne_text= injection_replace($_POST["content_content_BoxOne_text"]);
    $content_content_BoxOne_pic_adress = injection_replace($_POST["content_content_BoxOne_pic_adress"]);
    insert_templdate($site, $content_content_BoxOne_pic_adress, $la, $content_content_BoxOne_text, $content_content_BoxOne_title, '', $content_content_BoxOne_pic, "content_content_BoxOne", 'coms2', $coms_conect);

    $content_btnn_BoxOne_pic = injection_replace($_POST["content_btnn_BoxOne_pic"]);
    $content_btnn_BoxOne_link= injection_replace($_POST["content_btnn_BoxOne_link"]);
    $content_btnn_BoxOne_title= injection_replace($_POST["content_btnn_BoxOne_title"]);
    $content_btnn_BoxOne_pic_adress= injection_replace($_POST["content_btnn_BoxOne_pic_adress"]);
    $content_btnn_BoxOne_pic_adress= resize_image_M($content_btnn_BoxOne_pic_adress,100,100,$img_page_main,'');
    $content_btnn_BoxOne_avatar7 = injection_replace($_POST["content_btnn_BoxOne_avatar7"][0]);
    if ($content_btnn_BoxOne_avatar7 > "") {
        $content_btnn_BoxOne_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_btnn_BoxOne_avatar7;
        $content_btnn_BoxOne_pic_adress= resize_image_M($content_btnn_BoxOne_pic_adress,100,100,$img_page_main,'');

    }
    insert_templdate($site, $content_btnn_BoxOne_pic_adress, $la, '', $content_btnn_BoxOne_title, $content_btnn_BoxOne_link, $content_btnn_BoxOne_pic, "content_btnn_BoxOne", 'coms2', $coms_conect);

    //slide

    $condition_content_slide_boxOne = "name like 'content_slide_boxOne%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_content_slide_boxOne, $coms_conect);

    $condition_content_slide_TitLin_boxOne = "name like 'content_slide_TitLin_boxOne%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_content_slide_TitLin_boxOne, $coms_conect);

    $content_slide_boxOne_count = injection_replace_pic($_POST["content_slide_boxOne_count"]);
    for ($x = 1; $x <= $content_slide_boxOne_count; $x++) {

        $content_slide_TitLin_boxOne_title = injection_replace_pic($_POST["content_slide_TitLin_boxOne_title{$x}"]);
        $content_slide_TitLin_boxOne_link = injection_replace_pic($_POST["content_slide_TitLin_boxOne_link{$x}"]);

        $content_slide_boxOne_text = injection_replace_pic($_POST["content_slide_boxOne_text{$x}"]);
        $content_slide_boxOne_title = injection_replace_pic($_POST["content_slide_boxOne_title{$x}"]);
        $content_slide_boxOne_link = injection_replace_pic($_POST["content_slide_boxOne_link{$x}"]);
        $content_slide_boxOne_pic = injection_replace_pic($_POST["content_slide_boxOne_pic{$x}"]);
        $content_slide_boxOne_pic_adress = injection_replace_pic($_POST["content_slide_boxOne_pic_adress{$x}"]);
        $content_slide_boxOne_pic_adress_avatar7 = injection_replace($_POST["content_slide_boxOne_pic_adress_avatar7{$x}"][0]);
        if ($content_slide_boxOne_pic_adress_avatar7 > "") {
            $content_slide_boxOne_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_slide_boxOne_pic_adress_avatar7;
        }

        insert_templdate($site, $content_slide_boxOne_pic_adress, $la, $content_slide_boxOne_text, $content_slide_boxOne_title, $content_slide_boxOne_link, $content_slide_boxOne_pic, "content_slide_boxOne$x", 'coms2', $coms_conect);
        insert_templdate($site, '', $la, '', $content_slide_TitLin_boxOne_title, $content_slide_TitLin_boxOne_link, '', "content_slide_TitLin_boxOne$x", 'coms2', $coms_conect);

    }

//    menu box
    $content_menubox_show_pic_adress = injection_replace_pic($_POST["content_menubox_show_pic_adress"]);
    insert_templdate($site, $content_menubox_show_pic_adress, $la, '', '', '', '', "content_menubox_show", 'coms2', $coms_conect);

    $content_menubox_links_del = "name like 'content_menubox_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $content_menubox_links_del, $coms_conect);
    $content_menubox_links_count = injection_replace_pic($_POST["content_menubox_links_count"]);
    for ($k = 1; $k <= $content_menubox_links_count; $k++) {
        $content_menubox_links_title = injection_replace_pic($_POST["content_menubox_links_title{$k}"]);
        $content_menubox_links_link = injection_replace_pic($_POST["content_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $content_menubox_links_title, $content_menubox_links_link, '', "content_menubox_links$k", 'coms2', $coms_conect);
    }
//    content box_packs
    $content_box_packs_pic_adress=0;
    $content_box_packs_pic_adress = injection_replace_pic($_POST["content_box_packs_pic_adress"]);
    $content_box_packs_title = injection_replace_pic($_POST["content_box_packs_title"]);
    $content_box_packs_text = injection_replace_pic($_POST["content_box_packs_text"]);
    $content_box_packs_pic = injection_replace_pic($_POST["content_box_packs_pic"]);
    $content_box_packs_pic =resize_image_M($content_box_packs_pic,357,447,$img_page_main,'');
    $content_box_packs_pic_avatar_orak = injection_replace($_POST["content_box_packs_pic_avatar_orak"][0]);
    if ($content_box_packs_pic_avatar_orak > "") {
        $content_box_packs_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_box_packs_pic_avatar_orak;
        $content_box_packs_pic =resize_image_M($content_box_packs_pic,357,447,$img_page_main,'');

    }
    insert_templdate($site, $content_box_packs_pic_adress, $la, $content_box_packs_text, $content_box_packs_title, '', $content_box_packs_pic, "content_box_packs", 'coms2', $coms_conect);

    $content_pop_info_title = injection_replace($_POST["content_pop_info_title"]);
    $content_pop_info_text = injection_replace($_POST["content_pop_info_text"]);
    $content_pop_info_pic = injection_replace($_POST["content_pop_info_pic"]);
    $content_pop_info_link = injection_replace($_POST["content_pop_info_link"]);
    $content_pop_info_pic_adress = injection_replace($_POST["content_pop_info_pic_adress"]);
    insert_templdate($site, $content_pop_info_pic_adress, $la, $content_pop_info_text, $content_pop_info_title, $content_pop_info_link, $content_pop_info_pic, "content_pop_info", 'coms2', $coms_conect);

    //-------
   
        $count1_content_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_main_header%' ", $coms_conect);
        $block_name_setting_content_main_header = injection_replace($_POST["block_name_setting_content_main_header"]);
        if ($block_name_setting_content_main_header > "") {
            insert_templdate($site, '', $la, $block_name_setting_content_main_header, '', '', '', "setting_content_main_header", 'coms2', $coms_conect);
        }
        //----------tab name
        $condition_content_main_header = "name like 'content_main_header%' and tem_name='coms2'";
        delete_from_data_base('new_tem_setting', $condition_content_main_header, $coms_conect);

        $content_main_header_count = injection_replace_pic($_POST["content_main_header_count"]);
        for ($x = 1; $x <= $content_main_header_count; $x++) {

            $content_main_header_text = injection_replace_pic($_POST["content_main_header_text{$x}"]);

            if ($content_main_header_text > "") {
                insert_templdate($site, '', $la, $content_main_header_text, '', '', '', "content_main_header$x", 'coms2', $coms_conect);
            }
        }
        //-------end tab name------------

        //-------tab------------
        for ($u = 1; $u <= $count1_content_main_header; $u++) {

            $condition_content_header_into_tab = "name like 'content_header_into_tab$u%' and tem_name='coms2'";
            delete_from_data_base('new_tem_setting', $condition_content_header_into_tab, $coms_conect);

            $content_header_into_tab_count = injection_replace_pic($_POST["content_header_into_tab_count{$u}"]);
            for ($x = 1; $x <= $content_header_into_tab_count; $x++) {
                $content_header_into_tab_pic = injection_replace_pic($_POST["content_header_into_tab_pic{$u}{$x}"]);
                $content_header_into_tab_title = injection_replace_pic($_POST["content_header_into_tab_title{$u}{$x}"]);
                $content_header_into_tab_link = injection_replace_pic($_POST["content_header_into_tab_link{$u}{$x}"]);
                $content_header_into_tab_text = injection_replace_pic($_POST["content_header_into_tab_text{$u}{$x}"]);


                if ($content_header_into_tab_title > "") {
                    insert_templdate($site, '', $la, $content_header_into_tab_text, $content_header_into_tab_title, $content_header_into_tab_link, $content_header_into_tab_pic, "content_header_into_tab$u$x", 'coms2', $coms_conect);
                }
            }

            $ValSelectActive_content_connn_title = injection_replace($_POST["ValSelectActive_content_connn_title{$u}"]);
            insert_templdate($site, '', $la, '', $ValSelectActive_content_connn_title, '', '', "ValSelectActive_content_connn$u", 'coms2', $coms_conect);


                $first_choice_content_connn_cat = injection_replace_pic($_POST["first_choice_content_connn_cat{$u}"]);
                $first_choice_content_connn_subcat_cat = injection_replace_pic($_POST["first_choice_content_connn_subcat_cat{$u}"]);
                $first_choice_content_connn_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_connn_Fixed_selection_cat{$u}"]);
                $first_choice_content_connn_number = injection_replace_pic($_POST["first_choice_content_connn_number{$u}"]);
                if ($first_choice_content_connn_subcat_cat > "")
                    insert_templdate($site, $first_choice_content_connn_number, $la, $first_choice_content_connn_Fixed_selection_cat, '', $first_choice_content_connn_cat, $first_choice_content_connn_subcat_cat, "first_choice_content_connn$u", 'coms2', $coms_conect);


            $condition_second_choice_content_connn = "name like 'second_choice_content_connn$u%' and tem_name='coms2'";
            delete_from_data_base('new_tem_setting', $condition_second_choice_content_connn, $coms_conect);
            $second_choice_content_connn_count = injection_replace_pic($_POST["second_choice_content_connn_count{$u}"]);
            for ($i = 1; $i <= $second_choice_content_connn_count; $i++) {

                $second_choice_content_connn_cat = injection_replace_pic($_POST["second_choice_content_connn_cat{$u}{$i}"]);
                $second_choice_content_connn_subcat_cat = injection_replace_pic($_POST["second_choice_content_connn_subcat_cat{$u}{$i}"]);
                $second_choice_content_connn_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_connn_subcat_cat_content{$u}{$i}"]);
                if ($second_choice_content_connn_subcat_cat_content > 0)
                    insert_templdate($site, $second_choice_content_connn_subcat_cat_content, $la, '', '', $second_choice_content_connn_cat, $second_choice_content_connn_subcat_cat, "second_choice_content_connn$u$i", 'coms2', $coms_conect);
            }



        }
//    content box Parallax
    $content_boxParallax_pic_adress = 0;
    $content_boxParallax_pic_adress= injection_replace($_POST["content_boxParallax_pic_adress"]);
    $content_boxParallax_title= injection_replace($_POST["content_boxParallax_title"]);
    $content_boxParallax_text= injection_replace($_POST["content_boxParallax_text"]);
    $content_boxParallax_link= injection_replace($_POST["content_boxParallax_link"]);
    $content_boxParallax_pic= injection_replace($_POST["content_boxParallax_pic"]);
    $content_boxParallax_pic= resize_image_M($content_boxParallax_pic,1350,550,$img_page_main,'');
    $content_boxParallax_pic_avatar_orak = injection_replace($_POST["content_boxParallax_pic_avatar_orak"][0]);
    if ($content_boxParallax_pic_avatar_orak > "") {
        $content_boxParallax_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_boxParallax_pic_avatar_orak;
        $content_boxParallax_pic= resize_image_M($content_boxParallax_pic,1350,550,$img_page_main,'');

    }
    if ($content_boxParallax_text > "") {
        insert_templdate($site, $content_boxParallax_pic_adress, $la, $content_boxParallax_text, $content_boxParallax_title, $content_boxParallax_link, $content_boxParallax_pic, "content_boxParallax", 'coms2', $coms_conect);
    }
    // content
    $content_degarKhadamat_pic_adress = 0;
    $content_degarKhadamat_pic_adress= injection_replace($_POST["content_degarKhadamat_pic_adress"]);
    $content_degarKhadamat_title= injection_replace($_POST["content_degarKhadamat_title"]);
    $content_degarKhadamat_text= injection_replace($_POST["content_degarKhadamat_text"]);
    insert_templdate($site, $content_degarKhadamat_pic_adress, $la, $content_degarKhadamat_text, $content_degarKhadamat_title, '', '', "content_degarKhadamat", 'coms2', $coms_conect);

    $condition_content_degarKhadamat_content = "name like 'content_degarKhadamat_content%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_content_degarKhadamat_content, $coms_conect);
    $content_degarKhadamat_content_count = injection_replace_pic($_POST["content_degarKhadamat_content_count"]);
    for ($x = 1; $x <= $content_degarKhadamat_content_count; $x++) {

        $content_degarKhadamat_content_text = injection_replace_pic($_POST["content_degarKhadamat_content_text{$x}"]);
        $content_degarKhadamat_content_title = injection_replace_pic($_POST["content_degarKhadamat_content_title{$x}"]);
        $content_degarKhadamat_content_link = injection_replace_pic($_POST["content_degarKhadamat_content_link{$x}"]);
        $content_degarKhadamat_content_pic = injection_replace_pic($_POST["content_degarKhadamat_content_pic{$x}"]);
        $content_degarKhadamat_content_pic = resize_image_M($content_degarKhadamat_content_pic,88,76,$img_page_main,'');
        $content_degarKhadamat_content_avatar7 = injection_replace($_POST["content_degarKhadamat_content_avatar7{$x}"][0]);
        if ($content_degarKhadamat_content_avatar7 > "") {
            $content_degarKhadamat_content_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_degarKhadamat_content_avatar7;
            $content_degarKhadamat_content_pic = resize_image_M($content_degarKhadamat_content_pic,88,76,$img_page_main,'');

        }
        if ($content_degarKhadamat_content_title > "") {
            insert_templdate($site, $content_degarKhadamat_content_pic, $la, $content_degarKhadamat_content_text, $content_degarKhadamat_content_title, $content_degarKhadamat_content_link, '', "content_degarKhadamat_content$x", 'coms2', $coms_conect);
        }
    }
    //   article

    $content_title_article_pic_adress = 0;
    $content_title_article_pic_adress= injection_replace($_POST["content_title_article_pic_adress"]);
    $content_title_article_title= injection_replace($_POST["content_title_article_title"]);
    $content_title_article_text= injection_replace($_POST["content_title_article_text"]);
    insert_templdate($site, $content_title_article_pic_adress, $la, $content_title_article_text, $content_title_article_title, '', '', "content_title_article", 'coms2', $coms_conect);

    $ValSelectActive_content_article_title = injection_replace($_POST["ValSelectActive_content_article_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_content_article_title, '', '', "ValSelectActive_content_article", 'coms2', $coms_conect);

    $condition_first_choice_content_article = "name like 'first_choice_content_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_content_article, $coms_conect);
    $first_choice_content_article_count = injection_replace_pic($_POST["first_choice_content_article_count"]);
    for ($i = 1; $i <= $first_choice_content_article_count; $i++) {

        $first_choice_content_article_cat = injection_replace_pic($_POST["first_choice_content_article_cat{$i}"]);
        $first_choice_content_article_subcat_cat = injection_replace_pic($_POST["first_choice_content_article_subcat_cat{$i}"]);
        $first_choice_content_article_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_article_Fixed_selection_cat{$i}"]);
        $first_choice_content_article_number = injection_replace_pic($_POST["first_choice_content_article_number{$i}"]);
        if ($first_choice_content_article_subcat_cat > "")
            insert_templdate($site, $first_choice_content_article_number, $la, $first_choice_content_article_Fixed_selection_cat, '', $first_choice_content_article_cat, $first_choice_content_article_subcat_cat, "first_choice_content_article$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_content_article = "name like 'second_choice_content_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_content_article, $coms_conect);
    $second_choice_content_article_count = injection_replace_pic($_POST["second_choice_content_article_count"]);
    for ($i = 1; $i <= $second_choice_content_article_count; $i++) {

        $second_choice_content_article_cat = injection_replace_pic($_POST["second_choice_content_article_cat{$i}"]);
        $second_choice_content_article_subcat_cat = injection_replace_pic($_POST["second_choice_content_article_subcat_cat{$i}"]);
        $second_choice_content_article_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_article_subcat_cat_content{$i}"]);
        if ($second_choice_content_article_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_content_article_subcat_cat_content, $la, '', '', $second_choice_content_article_cat, $second_choice_content_article_subcat_cat, "second_choice_content_article$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_content_article = "name like 'third_choice_content_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_content_article, $coms_conect);
    $third_choice_content_article_count = injection_replace_pic($_POST["third_choice_content_article_count"]);
    for ($x = 1; $x <= $third_choice_content_article_count; $x++) {

        $third_choice_content_article_pic_adress = injection_replace_pic($_POST["third_choice_content_article_pic_adress{$x}"]);
        $third_choice_content_article_title = injection_replace_pic($_POST["third_choice_content_article_title{$x}"]);
        $third_choice_content_article_text = injection_replace_pic($_POST["third_choice_content_article_text{$x}"]);
        $third_choice_content_article_link = injection_replace_pic($_POST["third_choice_content_article_link{$x}"]);
        $third_choice_content_article_pic = injection_replace_pic($_POST["third_choice_content_article_pic{$x}"]);
        $third_choice_content_article_pic = resize_image_M($third_choice_content_article_pic,58,43,$img_page_main,'');
        $third_choice_content_article_avatar7 = injection_replace($_POST["third_choice_content_article_avatar7{$x}"][0]);
        if ($third_choice_content_article_avatar7 > "") {
            $third_choice_content_article_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_content_article_avatar7;
            $third_choice_content_article_pic = resize_image_M($third_choice_content_article_pic,58,43,$img_page_main,'');
        }
        if ($third_choice_content_article_title > "") {
            insert_templdate($site, $third_choice_content_article_pic_adress, $la, $third_choice_content_article_text, $third_choice_content_article_title, $third_choice_content_article_link, $third_choice_content_article_pic, "third_choice_content_article$x", 'coms2', $coms_conect);
        }
    }




    //   Light box
    $content_title_LightBox_pic_adress = 0;
    $content_title_LightBox_pic_adress= injection_replace($_POST["content_title_LightBox_pic_adress"]);
    $content_title_LightBox_title= injection_replace($_POST["content_title_LightBox_title"]);
    insert_templdate($site, $content_title_LightBox_pic_adress, $la, '', $content_title_LightBox_title, '', '', "content_title_LightBox", 'coms2', $coms_conect);

    $ValSelectActive_content_LightBox_title = injection_replace($_POST["ValSelectActive_content_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_content_LightBox_title, '', '', "ValSelectActive_content_LightBox", 'coms2', $coms_conect);

    $condition_first_choice_content_LightBox = "name like 'first_choice_content_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_content_LightBox, $coms_conect);
    $first_choice_content_LightBox_count = injection_replace_pic($_POST["first_choice_content_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_content_LightBox_count; $i++) {

        $first_choice_content_LightBox_cat = injection_replace_pic($_POST["first_choice_content_LightBox_cat{$i}"]);
        $first_choice_content_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_content_LightBox_subcat_cat{$i}"]);
        $first_choice_content_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_content_LightBox_number = injection_replace_pic($_POST["first_choice_content_LightBox_number{$i}"]);
        if ($first_choice_content_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_content_LightBox_number, $la, $first_choice_content_LightBox_Fixed_selection_cat, '', $first_choice_content_LightBox_cat, $first_choice_content_LightBox_subcat_cat, "first_choice_content_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_content_LightBox = "name like 'second_choice_content_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_content_LightBox, $coms_conect);
    $second_choice_content_LightBox_count = injection_replace_pic($_POST["second_choice_content_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_content_LightBox_count; $i++) {

        $second_choice_content_LightBox_cat = injection_replace_pic($_POST["second_choice_content_LightBox_cat{$i}"]);
        $second_choice_content_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_content_LightBox_subcat_cat{$i}"]);
        $second_choice_content_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_content_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_content_LightBox_subcat_cat_content, $la, '', '', $second_choice_content_LightBox_cat, $second_choice_content_LightBox_subcat_cat, "second_choice_content_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_content_LightBox = "name like 'third_choice_content_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_content_LightBox, $coms_conect);
    $third_choice_content_LightBox_count = injection_replace_pic($_POST["third_choice_content_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_content_LightBox_count; $x++) {

        $third_choice_content_LightBox_title = injection_replace_pic($_POST["third_choice_content_LightBox_title{$x}"]);
        $third_choice_content_LightBox_text = injection_replace_pic($_POST["third_choice_content_LightBox_text{$x}"]);
        $third_choice_content_LightBox_link = injection_replace_pic($_POST["third_choice_content_LightBox_link{$x}"]);
        $third_choice_content_LightBox_pic = injection_replace_pic($_POST["third_choice_content_LightBox_pic{$x}"]);
        $third_choice_content_LightBox_pic = resize_image_M($third_choice_content_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_content_LightBox_avatar7 = injection_replace($_POST["third_choice_content_LightBox_avatar7{$x}"][0]);
        if ($third_choice_content_LightBox_avatar7 > "") {
            $third_choice_content_LightBox_pic = 'http://' .$_SERVER["HTTP_HOST"]. '/new_gallery/files/' . $third_choice_content_LightBox_avatar7;
            $third_choice_content_LightBox_pic = resize_image_M($third_choice_content_LightBox_pic,58,43,$img_page_main,'');
        }
        if ($third_choice_content_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_content_LightBox_text, $third_choice_content_LightBox_title, $third_choice_content_LightBox_link, $third_choice_content_LightBox_pic, "third_choice_content_LightBox$x", 'coms2', $coms_conect);
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
                                    <li class="z-tab H_style_header" data-link="tab2">
                                        <a class="z-link">ادامه باکس سوم</a>
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
                                                    <? $content_title_box6 = get_tem_result($site, $la, "content_title_box6", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_title_box6" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_title_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_title_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_title_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_title_box6 H_dis_none"
                                                               name="content_title_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $content_title_box7 = get_tem_result($site, $la, "content_title_box7", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_title_box7" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_title_box7['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_title_box7 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_title_box7_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_title_box7 H_dis_none"
                                                               name="content_title_box7_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>


                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $content_boxOne = get_tem_result($site, $la, "content_boxOne", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_boxOne_pic_adress"
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
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $content_content_BoxOne = get_tem_result($site, $la, "content_content_BoxOne", 'coms2', $coms_conect);
                                                                            $content_btnn_BoxOne = get_tem_result($site, $la, "content_btnn_BoxOne", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choicedel_content_content_BoxOne"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">
                                                                                    <div class="form-group col-md-12">

                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_btnn_BoxOne_title"
                                                                                                   value="<?= $content_btnn_BoxOne["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" عنوان"
                                                                                                   name="content_btnn_BoxOne_title">
                                                                                        </div>

                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_btnn_BoxOne_pic_adress"
                                                                                                   value="<?=$content_btnn_BoxOne["pic_adress"]?>"

                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر"
                                                                                                   name="content_btnn_BoxOne_pic_adress"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=content_btnn_BoxOne_pic_adress"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                            <span class="input-group-addon H_neshane1 H_dedicated_content_BoxOne1"
                                                                                                  style="padding: 0px;">
                                                                                    <div id="content_btnn_BoxOne_avatar7"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="content_btnn_BoxOne_avatar7_link"
                                                                                       name="content_btnn_BoxOne_avatar7_link"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_content_btnn_BoxOne"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class=" col-md-1 input-group"
                                                                                             id="image_show_content_btnn_BoxOne">

                                                                                            <a href="<?= $content_btnn_BoxOne["pic_adress"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $content_btnn_BoxOne["pic_adress"] ?>"
                                                                                                     alt="<?= $content_btnn_BoxOne["title"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#content_btnn_BoxOne_avatar7').orakuploader({
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

                                                                                                $('#content_btnn_BoxOne_avatar7').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <div class="col-md-4 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_content_BoxOne_pic"
                                                                                                   value="<?= $content_content_BoxOne["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه اول"
                                                                                                   name="content_content_BoxOne_pic">
                                                                                        </div>
                                                                                        <div class="col-md-4 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_content_BoxOne_pic_adress"
                                                                                                   value="<?= $content_content_BoxOne["pic_adress"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" لینک دکمه اول"
                                                                                                   name="content_content_BoxOne_pic_adress">
                                                                                        </div>
                                                                                        <div class="col-md-4 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_content_BoxOne_title"
                                                                                                   value="<?= $content_content_BoxOne["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه دوم"
                                                                                                   name="content_content_BoxOne_title">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text" class="form-control"  placeholder="عنوان دکمه سوم" name="content_btnn_BoxOne_pic"
                                                                                                   value="<?= $content_btnn_BoxOne['pic'] ?>" style="direction: rtl;">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text" class="form-control"  placeholder="لینک دکمه سوم" name="content_btnn_BoxOne_link"
                                                                                                   value="<?= $content_btnn_BoxOne['link'] ?>" style="direction: rtl;">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="content_content_BoxOne_text"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="content_content_BoxOne_text"><?= $content_content_BoxOne["text"] ?>
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
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اسلایدشو »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_content_slide_boxOne = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_slide_boxOne%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_content_slide_boxOne; $x++) {
                                                                            $content_slide_boxOne = get_tem_result($site, $la, "content_slide_boxOne$x", 'coms2', $coms_conect);
                                                                            $content_slide_TitLin_boxOne = get_tem_result($site, $la, "content_slide_TitLin_boxOne$x", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choice_content_slide_boxOne<?= $x ?>"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">
                                                                                    <a class="col-md-1 control-label del_content_slide_boxOne" style="margin-bottom: 90px!important;"
                                                                                       id="<?= $x ?>"
                                                                                       for="family"><i
                                                                                                class="fa fa-trash text-danger remove"
                                                                                                title=""
                                                                                                data-original-title="حذف"></i>

                                                                                    </a>
                                                                                    <div class="form-group col-md-11">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_slide_TitLin_boxOne_title<?= $x ?>"
                                                                                                   value="<?= $content_slide_TitLin_boxOne["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان اول"
                                                                                                   name="content_slide_TitLin_boxOne_title<?= $x ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_slide_TitLin_boxOne_link<?= $x ?>"
                                                                                                   value="<?= $content_slide_TitLin_boxOne["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک اول"
                                                                                                   name="content_slide_TitLin_boxOne_link<?= $x ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-11">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_slide_boxOne_title<?= $x ?>"
                                                                                                   value="<?= $content_slide_boxOne["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دوم"
                                                                                                   name="content_slide_boxOne_title<?= $x ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_slide_boxOne_link<?= $x ?>"
                                                                                                   value="<?= $content_slide_boxOne["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دوم"
                                                                                                   name="content_slide_boxOne_link<?= $x ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-11">
                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_slide_boxOne_pic<?= $x ?>"
                                                                                                   value="<?= $content_slide_boxOne["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک تصویر"
                                                                                                   name="content_slide_boxOne_pic<?= $x ?>">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="content_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                   value="<?=$content_slide_boxOne["pic_adress"]?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر"
                                                                                                   name="content_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0px;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=content_slide_boxOne_pic_adress<?= $x ?>"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                            <span class="input-group-addon H_neshane1 H_content_slide_boxOne<?= $x ?>"
                                                                                                  style="padding: 0px;">
                                                                                <div id="content_slide_boxOne_pic_adress_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="content_slide_boxOne_pic_adress_avatar7_link<?= $x ?>"
                                                                                   name="content_slide_boxOne_pic_adress_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_content_slide_boxOne_pic_adress<?= $x ?>"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class="input-group"
                                                                                             id="image_show_content_slide_boxOne<?= $x ?>">
                                                                                            <a href="<?= $content_slide_boxOne["pic_adress"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $content_slide_boxOne["pic_adress"] ?>"
                                                                                                     alt="<?= $content_slide_boxOne["text"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#content_slide_boxOne_pic_adress_avatar7<?=$x?>').orakuploader({
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

                                                                                                $('#content_slide_boxOne_pic_adress_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="content_slide_boxOne_count"
                                                                               name="content_slide_boxOne_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_content_slide_boxOne-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_content_slide_boxOne' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_content_slide_boxOne" style="margin-bottom: 90px!important;" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="content_slide_TitLin_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="content_slide_TitLin_boxOne_title' + i + '" ></div> <div class="col-md-6 input-group"><input type="text" id="content_slide_TitLin_boxOne_link' + i + '" value="" class="form-control" placeholder="لینک اول" name="content_slide_TitLin_boxOne_link' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-6 input-group"><input type="text" id="content_slide_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان دوم" name="content_slide_boxOne_title' + i + '" ></div> <div class="col-md-6 input-group"><input type="text" id="content_slide_boxOne_link' + i + '" value="" class="form-control" placeholder="لینک دوم" name="content_slide_boxOne_link' + i + '" ></div></div><div class="form-group col-md-11"><div class="col-md-5 input-group"><input type="text" id="content_slide_boxOne_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="content_slide_boxOne_pic' + i + '" ></div><div class="col-md-6 input-group"> <input type="text" id="content_slide_boxOne_pic_adress' + i + '" value="" class="form-control" placeholder=" تصویر" name="content_slide_boxOne_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=content_slide_boxOne_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_content_slide_boxOne' + i + '" style="padding: 0px;"><div  id="content_slide_boxOne_pic_adress_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="content_slide_boxOne_pic_adress_avatar7_link' + i + '" name="content_slide_boxOne_pic_adress_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_content_slide_boxOne_pic_adress' + i + '" style="float:right;"></div></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_content_slide_boxOne' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#content_slide_boxOne_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#content_slide_boxOne_pic_adress_avatar7' + i + '').orakuploader({
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

                                                                                    $('#content_slide_boxOne_pic_adress_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_content_slide_boxOne' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_content_slide_boxOne' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_content_slide_boxOne', function () {
                                                                                    var id = '';
                                                                                    var k = $('#content_slide_boxOne_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_content_slide_boxOne' + id).remove();
                                                                                    $('#content_slide_boxOne_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_content_slide_boxOne-ads"><i
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
                                                <!-------------------menu box------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_menubox_show = get_tem_result($site, $la, "content_menubox_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_menubox_show_pic_adress"
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
                                                                            <? $count_content_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_content_menubox_links; $k++) {
                                                                                $content_menubox_links = get_tem_result($site, $la, "content_menubox_links$k", 'coms2', $coms_conect);
                                                                                if ($content_menubox_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_content_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_content_menubox_links"
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
                                                                                                           id="content_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $content_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="content_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="content_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $content_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="content_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_content_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="content_menubox_links_count"
                                                                                   name="content_menubox_links_count"
                                                                                   value="<?= --$count_content_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_content_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_content_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_content_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="content_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="content_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="content_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="content_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_content_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#content_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_content_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#content_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_content_menubox_links' + id).remove();
                                                                                        $('#content_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_content_menubox_links"><i
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
                                                <!-------------------box_packs------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_box_packs = get_tem_result($site, $la, "content_box_packs", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_box_packs['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_box_packs_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_box_packs_title"
                                                                           value="<?= $content_box_packs['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_box_packs_text"
                                                                           value="<?= $content_box_packs['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $content_pop_info = get_tem_result($site, $la, "content_pop_info", 'coms2', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اطلاعات داخل پاپاپ جستجو »</h5><br>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_pop_info_title"
                                                                           value="<?= $content_pop_info['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_pop_info_text"
                                                                           value="<?= $content_pop_info['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان سمت چپ</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_pop_info_pic"
                                                                           value="<?= $content_pop_info['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="content_pop_info_pic_adress"
                                                                           value="<?= $content_pop_info['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="content_pop_info_link"
                                                                           value="<?= $content_pop_info['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">

                                                                                                                                                <input type="text"
                                                                                                                                                       id="content_box_packs_pic"
                                                                                                                                                       value="<?=$content_box_packs['pic']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="content_box_packs_pic"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_box_packs_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="content_box_packs_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_content_box_packs_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_content_box_packs_pic">
                                                                        <a href="<?= $content_box_packs["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $content_box_packs["pic"] ?>" alt="<?= $content_box_packs["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#content_box_packs_pic_avatar_orak').orakuploader({
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

                                                                            $('#content_box_packs_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                </div>
                                                <!-------------------parallax------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_boxParallax = get_tem_result($site, $la, "content_boxParallax", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_boxParallax['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_boxParallax_pic_adress"
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
                                                                                                                                                       id="content_boxParallax_pic"
                                                                                                                                                       value="<?=$content_boxParallax['pic']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="content_boxParallax_pic"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_boxParallax_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="content_boxParallax_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_content_boxParallax_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_content_boxParallax_pic">
                                                                        <a href="<?= $content_boxParallax["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $content_boxParallax["pic"] ?>" alt="<?= $content_boxParallax["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#content_boxParallax_pic_avatar_orak').orakuploader({
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

                                                                            $('#content_boxParallax_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="content_boxParallax_title"
                                                                           value="<?= $content_boxParallax['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="content_boxParallax_link"
                                                                           value="<?= $content_boxParallax['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label class="col-md-3 control-label" for="family">متن</label>
                                                            <textarea type="text" id="content_boxParallax_text" class="form-group col-md-9 " placeholder="متن" name="content_boxParallax_text"><?= $content_boxParallax['text'] ?></textarea>
                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------degarKhadamat------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_degarKhadamat = get_tem_result($site, $la, "content_degarKhadamat", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_degarKhadamat['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_degarKhadamat_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_degarKhadamat_title"
                                                                           value="<?= $content_degarKhadamat['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_degarKhadamat_text"
                                                                           value="<?= $content_degarKhadamat['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:7 »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_content_degarKhadamat_content = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_degarKhadamat_content%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_content_degarKhadamat_content; $x++) {
                                                                            $content_degarKhadamat_content = get_tem_result($site, $la, "content_degarKhadamat_content$x", 'coms2', $coms_conect);
                                                                            if ($content_degarKhadamat_content['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_content_degarKhadamat_content<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_content_degarKhadamat_content"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="content_degarKhadamat_content_title<?= $x ?>"
                                                                                                       value="<?= $content_degarKhadamat_content["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="content_degarKhadamat_content_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="content_degarKhadamat_content_link<?= $x ?>"
                                                                                                       value="<?= $content_degarKhadamat_content["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="content_degarKhadamat_content_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="content_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       value="<?=$content_degarKhadamat_content["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="content_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=content_degarKhadamat_content_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_content_degarKhadamat_content<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="content_degarKhadamat_content_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="content_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   name="content_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_content_degarKhadamat_content<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group"
                                                                                                 id="image_show_content_degarKhadamat_content<?= $x ?>">
                                                                                                <a href="<?= $content_degarKhadamat_content["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $content_degarKhadamat_content["pic_adress"] ?>"
                                                                                                         alt="<?= $content_degarKhadamat_content["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#content_degarKhadamat_content_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#content_degarKhadamat_content_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                <textarea type="text"
                                                                          id="content_degarKhadamat_content_text<?= $x ?>"
                                                                          class="form-control"
                                                                          placeholder="عنوان دوم"
                                                                          name="content_degarKhadamat_content_text<?= $x ?>"><?= $content_degarKhadamat_content["text"] ?>

                                                                </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="content_degarKhadamat_content_count"
                                                                               name="content_degarKhadamat_content_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_content_degarKhadamat_content-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_content_degarKhadamat_content' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_content_degarKhadamat_content" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="content_degarKhadamat_content_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="content_degarKhadamat_content_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="content_degarKhadamat_content_link' + i + '" value="" class="form-control" placeholder="لینک" name="content_degarKhadamat_content_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="content_degarKhadamat_content_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="content_degarKhadamat_content_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=content_degarKhadamat_content_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_content_degarKhadamat_content' + i + '" style="padding: 0px;"><div  id="content_degarKhadamat_content_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="content_degarKhadamat_content_avatar7_link' + i + '" name="content_degarKhadamat_content_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_content_degarKhadamat_content' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="content_degarKhadamat_content_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="content_degarKhadamat_content_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_content_degarKhadamat_content' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#content_degarKhadamat_content_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#content_degarKhadamat_content_avatar7' + i + '').orakuploader({
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

                                                                                    $('#content_degarKhadamat_content_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_content_degarKhadamat_content' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_content_degarKhadamat_content' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_content_degarKhadamat_content', function () {
                                                                                    var id = '';
                                                                                    var k = $('#content_degarKhadamat_content_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_content_degarKhadamat_content' + id).remove();
                                                                                    $('#content_degarKhadamat_content_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_content_degarKhadamat_content-ads"><i
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
                                                <div  id="content6" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $content_title_article = get_tem_result($site, $la, "content_title_article", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_title_article['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_title_article_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_title_article_title"
                                                                           value="<?= $content_title_article['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_title_article_text"
                                                                           value="<?= $content_title_article['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_content_article = get_tem_result($site, $la, "ValSelectActive_content_article", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_content_article"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_content_article"
                                                                    name="select_type_content_article">

                                                                <option <? if ($ValSelectActive_content_article["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_article["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_article["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_content_article_title" type="hidden"
                                                                   value="<?= $ValSelectActive_content_article["title"] ?>">

                                                            <div class="tab-pane opt_content_article content_article_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_content_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_content_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_content_article; $j++) {
                                                                                    $first_choice_content_article = get_tem_result($site, $la, "first_choice_content_article$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_content_article['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_content_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_content_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_content_article col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_content_article_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_content_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_article['pic'] ?>">

                                                                                                        <select id="first_choice_content_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_content_article_cat"
                                                                                                                name="first_choice_content_article_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_content_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_content_article<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_content_article_new&id=" + $("#first_choice_content_article_cat<?=$j?>").val() + "&value=" + $("#first_choice_content_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_content_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_content_article_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_content_article_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_article['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_article['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_article['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_content_article_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_article["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_content_article_number<?= $j ?>">
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
                                                                                       id="first_choice_content_article_count"
                                                                                       name="first_choice_content_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_content_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_content_article').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_content_article_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_content_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_content_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_content_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_content_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_content_article col-md-4 input-group"><input type="hidden" id="first_choice_content_article_subcat_val' + i + '"  name="first_choice_content_article_subcat_val' + i + '" value=""> <select id="first_choice_content_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_content_article_cat" name="first_choice_content_article_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_content_article' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_content_article_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_content_article_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_content_article_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_content_article_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_content_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_content_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_content_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_content_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_content_article' + id).remove();
                                                                                            $('#first_choice_content_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_content_article"><i
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

                                                            <div class="tab-pane opt_content_article content_article_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_content_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_content_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_content_article; $j++) {
                                                                                    $second_choice_content_article = get_tem_result($site, $la, "second_choice_content_article$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_content_article['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_content_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_content_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_content_article col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_article_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_content_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_article['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_article_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_content_article_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_article['pic_adress'] ?>">

                                                                                                        <select id="second_choice_content_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_content_article_cat"
                                                                                                                name="second_choice_content_article_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_content_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_article<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_article_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_article&id=" + $("#second_choice_content_article_cat<?=$j?>").val() + "&value=" + $("#second_choice_content_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_content_article_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_article_content&id=" + $("#second_choice_content_article_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_content_article_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_content_article_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_article_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_content_article_count"
                                                                                       name="second_choice_content_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_content_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_content_article').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_content_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_content_article_neshane").change(function () {
                                                                                        var j = $("#second_choice_content_article_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_article' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_content_article_neshane', function () {
                                                                                        var j = $("#second_choice_content_article_count").val();
                                                                                        //  $(".second_choice_content_article_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_article_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_article_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_content_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_content_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_content_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_content_article col-md-3 input-group"><input type="hidden" id="second_choice_content_article_subcat_val' + i + '"  name="second_choice_content_article_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_content_article_subcat_link' + i + '"  name="second_choice_content_article_subcat_link' + i + '" value=""> <select id="second_choice_content_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_content_article_cat" name="second_choice_content_article_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_content_article' + i + '" class="col-md-3 input-group"></div><div id="second_choice_content_article_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_content_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_content_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_content_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_content_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_content_article' + id).remove();
                                                                                            $('#second_choice_content_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_content_article"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_content_article content_article_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_content_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_content_article%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_content_article; $x++) {
                                                                                    $third_choice_content_article = get_tem_result($site, $la, "third_choice_content_article$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_content_article['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_content_article<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_content_article" style="margin-bottom: 80px!important;"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_article_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_article["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_content_article_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_article_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_content_article["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_content_article_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_article_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_content_article<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_content_article_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_content_article_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_content_article_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_content_article<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_content_article["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_content_article<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_content_article["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_content_article["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_content_article["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_content_article_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_content_article_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_content_article_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_content_article['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-md-11 H_pl32">
                                                                                                    <div class="col-md-12 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_article_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_article["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک ویدیو"
                                                                                                               name="third_choice_content_article_link<?= $x ?>">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                  <textarea type="text"
                                                                                                            id="third_choice_content_article_text<?= $x ?>"
                                                                                                            class="form-control"
                                                                                                            placeholder="متن"
                                                                                                            name="third_choice_content_article_text<?= $x ?>"><?= $third_choice_content_article["text"] ?>
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
                                                                                       id="third_choice_content_article_count"
                                                                                       name="third_choice_content_article_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_content_article-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_content_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_content_article" style="margin-bottom: 80px!important;" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-4 input-group"><input type="text" id="third_choice_content_article_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_content_article_title' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_content_article_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_content_article_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_article_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_content_article' + i + '" style="padding: 0px;"><div  id="third_choice_content_article_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_content_article_avatar7_link' + i + '" name="third_choice_content_article_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_content_article' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_content_article_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="form-group col-md-11 H_pl32"><div class="col-md-12 input-group"><input type="text" id="third_choice_content_article_link'+ i +'" value="" class="form-control" placeholder="لینک ویدیو" name="third_choice_content_article_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_content_article_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_content_article_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_content_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_content_article_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_content_article_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_content_article_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_content_article' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_content_article' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_content_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_content_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_content_article' + id).remove();
                                                                                            $('#third_choice_content_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_content_article-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_content_article_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_content_article"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_content_article_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_content_article').hide();
                                                                        $('.content_article_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content7" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $content_title_LightBox = get_tem_result($site, $la, "content_title_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_title_LightBox_title"
                                                                           value="<?= $content_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_content_LightBox = get_tem_result($site, $la, "ValSelectActive_content_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_content_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_content_LightBox"
                                                                    name="select_type_content_LightBox">

                                                                <option <? if ($ValSelectActive_content_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_content_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_content_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_content_LightBox content_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_content_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_content_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_content_LightBox; $j++) {
                                                                                    $first_choice_content_LightBox = get_tem_result($site, $la, "first_choice_content_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_content_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_content_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_content_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_content_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_content_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_content_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_content_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_content_LightBox_cat"
                                                                                                                name="first_choice_content_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_content_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_content_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_content_LightBox_new&id=" + $("#first_choice_content_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_content_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_content_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_content_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_content_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_content_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_content_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_content_LightBox_count"
                                                                                       name="first_choice_content_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_content_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_content_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_content_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_content_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_content_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_content_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_content_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_content_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_content_LightBox_subcat_val' + i + '"  name="first_choice_content_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_content_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_content_LightBox_cat" name="first_choice_content_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_content_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_content_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_content_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_content_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_content_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_content_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_content_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_content_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_content_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_content_LightBox' + id).remove();
                                                                                            $('#first_choice_content_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_content_LightBox"><i
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

                                                            <div class="tab-pane opt_content_LightBox content_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_content_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_content_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_content_LightBox; $j++) {
                                                                                    $second_choice_content_LightBox = get_tem_result($site, $la, "second_choice_content_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_content_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_content_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_content_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_content_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_content_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_content_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_content_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_content_LightBox_cat"
                                                                                                                name="second_choice_content_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_content_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_LightBox&id=" + $("#second_choice_content_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_content_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_content_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_LightBox_content&id=" + $("#second_choice_content_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_content_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_content_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_content_LightBox_count"
                                                                                       name="second_choice_content_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_content_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_content_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_content_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_content_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_content_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_content_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_content_LightBox_count").val();
                                                                                        //  $(".second_choice_content_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_content_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_content_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_content_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_content_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_content_LightBox_subcat_val' + i + '"  name="second_choice_content_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_content_LightBox_subcat_link' + i + '"  name="second_choice_content_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_content_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_content_LightBox_cat" name="second_choice_content_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_content_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_content_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_content_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_content_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_content_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_content_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_content_LightBox' + id).remove();
                                                                                            $('#second_choice_content_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_content_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_content_LightBox content_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_content_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_content_LightBox%' ", $coms_conect);
                                                                                for ($x = 1; $x <= $count_third_choice_content_LightBox; $x++) {
                                                                                    $third_choice_content_LightBox = get_tem_result($site, $la, "third_choice_content_LightBox$x", 'coms2', $coms_conect);
                                                                                    if ($third_choice_content_LightBox['title'] > "") {
                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_content_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_content_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_content_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_content_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_content_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_content_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_content_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_content_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_content_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_content_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_content_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_content_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_content_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_content_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_content_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_content_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_content_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_content_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_content_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_content_LightBox_text<?= $x ?>"><?= $third_choice_content_LightBox["text"] ?>

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
                                                                                       id="third_choice_content_LightBox_count"
                                                                                       name="third_choice_content_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_content_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_content_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_content_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_content_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_content_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_content_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_content_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_content_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_content_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_content_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_content_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_content_LightBox_avatar7_link' + i + '" name="third_choice_content_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_content_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_content_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_content_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_content_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_content_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_content_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_content_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_content_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_content_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_content_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_content_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_content_LightBox' + id).remove();
                                                                                            $('#third_choice_content_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_content_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_content_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_content_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_content_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_content_LightBox').hide();
                                                                        $('.content_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-----------------------------------------------------box3---------------------------------------------->
                                        <div class="z-content tab2" style="position: absolute;">
                                            <div class="z-content-inner">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H2">
                                                    <div class="list-group">
                                                        <? $setting_content_main_header = get_tem_result($site, $la, "setting_content_main_header", 'coms2', $coms_conect); ?>
                                                        <a id="H_input_rename_setting_content_main_header" href="#"
                                                           class="list-group-item  active text-center ">
                                                            <span class="temp"><?= $setting_content_main_header['text'] ?>تنظیمات</span>
                                                        </a>
                                                        <?
                                                        $count1_content_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_main_header%' ", $coms_conect);
                                                        for ($x = 1; $x <= $count1_content_main_header; $x++) {
                                                            $content_header1 = get_tem_result($site, $la, "content_main_header$x", 'coms2', $coms_conect);
                                                            if ($content_header1['text'] > "") {
                                                                ?>
                                                                <a id="H_input_rename_tab<?= $x ?>" href="#"
                                                                   class="list-group-item  text-center ">
                                                                    <span class="temp"><?= $content_header1['text'] ?></span>
                                                                </a>
                                                            <? }
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
                                                                            $count1_content_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'content_main_header%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_content_main_header; $x++) {
                                                                                $content_main_header = get_tem_result($site, $la, "content_main_header$x", 'coms2', $coms_conect);
                                                                                if ($content_main_header['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_content_main_header<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_content_main_header"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>

                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-12 input-group">
                                                                                                    <input type="text"
                                                                                                           id="content_main_header_text<?= $x ?>"
                                                                                                           value="<?= $content_main_header["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان "
                                                                                                           name="content_main_header_text<?= $x ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $xcount_mahsol = $x;
                                                                            ?>
                                                                            <input type="hidden" id="content_main_header_count"
                                                                                   name="content_main_header_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_content_main_header-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_content_main_header' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_content_main_header" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-12 input-group"><input type="text" id="content_main_header_text' + i + '" value="" class="form-control" placeholder="عنوان" name="content_main_header_text' + i + '" ></div> </div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_content_main_header' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#content_main_header_count').val(i);

                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_content_main_header', function () {
                                                                                        var id = '';
                                                                                        var k = $('#content_main_header_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');

                                                                                        $('#div_mother_third_choicedel_content_main_header' + id).remove();
                                                                                        $('#content_main_header_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_content_main_header-ads"><i
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
                                                    <? for ($y = 1; $y <= $count1_content_main_header; $y++) { ?>

                                                        <div id="tabbb<?= $y ?>" class="bhoechie-tab-content H2 ">
                                                            <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«انتخاب فقط محتوا »</h5><br>

                                                            <div class="col-md-12">
                                                                <div class="mt40 pt20 content_forms<?=$y?>">
                                                                    <div id="show_form1" class="formmm H_dis_none ">


                                                                        <? $ValSelectActive_content_connn = get_tem_result($site, $la, "ValSelectActive_content_connn$y", 'coms2', $coms_conect); ?>
                                                                        <div class="col-md-6 input-group " style="float: none;right:25%">
                                                                            <select id="select_type_content_connn<?=$y?>"
                                                                                    data-selectid=""
                                                                                    class="form-control H_select_show_content_connn<?=$y?>"
                                                                                    name="select_type_content_connn<?=$y?>">

                                                                                <option <? if ($ValSelectActive_content_connn["title"] == 1) {
                                                                                    echo 'selected';
                                                                                } ?> value='1'>انتخاب از ماژول
                                                                                </option>
                                                                                <option <? if ($ValSelectActive_content_connn["title"] == 2) {
                                                                                    echo 'selected';
                                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                                    انتخابی
                                                                                </option>

                                                                            </select>

                                                                        </div>
                                                                        <br>
                                                                        <div>
                                                                            <input name="ValSelectActive_content_connn_title<?=$y?>" type="hidden"
                                                                                   value="<?= $ValSelectActive_content_connn["title"] ?>">

                                                                            <div class="tab-pane opt_content_connn<?=$y?> content_connn_option<?=$y?>1">


                                                                                <div class="page-content-area">
                                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                                        <fieldset>
                                                                                            <div class="col-md-12">
                                                                                                <?

                                                                                                    $first_choice_content_connn = get_tem_result($site, $la, "first_choice_content_connn$y", 'coms2', $coms_conect);
                                                                                                    ?>
                                                                                                        <div id="div_mother_first_choicedel_first_choice_content_connn<?=$y?>"
                                                                                                             class="seyed"
                                                                                                             style="opacity: 1;">
                                                                                                            <div class="form-group">

                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <div class=" H_first_choice_content_connn<?=$y?> col-md-4 input-group">
                                                                                                                        <input type="hidden"
                                                                                                                               id="first_choice_content_connn_subcat_val<?=$y?>"
                                                                                                                               name="first_choice_content_connn_subcat_val<?=$y?>"
                                                                                                                               value="<?= $first_choice_content_connn['pic'] ?>">

                                                                                                                        <select id="first_choice_content_connn_cat<?=$y?>"
                                                                                                                                data-selectid="<?=$y?>"
                                                                                                                                class="form-control H_first_choice_content_connn_cat<?=$y?>"
                                                                                                                                name="first_choice_content_connn_cat<?=$y?>">
                                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                                $str = '';
                                                                                                                                if ($row['id'] == $first_choice_content_connn['link'])

                                                                                                                                    $str = 'selected';
                                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                        </select>
                                                                                                                    </div>

                                                                                                                    <div id="first_choice_content_connn<?=$y?>"
                                                                                                                         class="col-md-4 input-group">

                                                                                                                    </div>

                                                                                                                    <script>
                                                                                                                        $(document).ready(function () {
                                                                                                                            $.ajax({
                                                                                                                                type: 'POST',
                                                                                                                                url: 'New_ajax.php',
                                                                                                                                data: "action=first_choice_content_connn_new&id=" + $("#first_choice_content_connn_cat<?=$y?>").val() + "&value=" + $("#first_choice_content_connn_subcat_val<?=$y?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?=$y?>',
                                                                                                                                success: function (result) {
                                                                                                                                    $('#first_choice_content_connn<?=$y?>').html(result);
                                                                                                                                }
                                                                                                                            });
                                                                                                                        });
                                                                                                                    </script>
                                                                                                                    <div class="col-md-3 input-group">
                                                                                                                        <select id="first_choice_content_connn_Fixed_selection_cat<?=$y?>"
                                                                                                                                data-selectid="1"
                                                                                                                                class="form-control modules_class"
                                                                                                                                name="first_choice_content_connn_Fixed_selection_cat<?=$y?>">
                                                                                                                            <option <?
                                                                                                                            if ($first_choice_content_connn['text'] == 0) echo 'selected'; ?>
                                                                                                                                    value='0'>
                                                                                                                                جدیدترین
                                                                                                                                ها
                                                                                                                            </option>
                                                                                                                            <option <?
                                                                                                                            if ($first_choice_content_connn['text'] == 1) echo 'selected'; ?>
                                                                                                                                    value='1'>
                                                                                                                                پربازدیدترین
                                                                                                                                ها
                                                                                                                            </option>
                                                                                                                            <option <?
                                                                                                                            if ($first_choice_content_connn['text'] == 2) echo 'selected'; ?>
                                                                                                                                    value='2'>
                                                                                                                                پربحث
                                                                                                                                ترین ها
                                                                                                                            </option>
                                                                                                                        </select>

                                                                                                                    </div>
                                                                                                                    <div class="col-md-1 input-group">
                                                                                                                        <input type="text"
                                                                                                                               id="first_choice_content_connn_number<?=$y?>"
                                                                                                                               value="<?= $first_choice_content_connn["pic_adress"] ?>"
                                                                                                                               class="form-control"
                                                                                                                               placeholder="تعداد"
                                                                                                                               name="first_choice_content_connn_number<?=$y?>">
                                                                                                                    </div>


                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div>


                                                                                                <script>

                                                                                                    $(document).on('change', '.H_first_choice_content_connn_cat<?=$y?>', function () {
                                                                                                        var thisElement = $(this).parents('.H_first_choice_content_connn<?=$y?>').next();
                                                                                                        $.ajax({
                                                                                                            type: 'POST',
                                                                                                            url: 'New_ajax.php',
                                                                                                            data: "action=first_choice_content_connn_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                                            success: function (result) {
                                                                                                                //$('#first_choice_content_connn<?//=$j?>//').html(result);
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

                                                                            <div class="tab-pane opt_content_connn<?=$y?> content_connn_option<?=$y?>2">
                                                                                <div class="page-content-area">
                                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                                        <fieldset>
                                                                                            <div class="col-md-12">
                                                                                                <? $count_second_choice_content_connn = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_content_connn$y%' ", $coms_conect);
                                                                                                for ($j = 1; $j <= $count_second_choice_content_connn; $j++) {
                                                                                                    $second_choice_content_connn = get_tem_result($site, $la, "second_choice_content_connn$y$j", 'coms2', $coms_conect);
                                                                                                    if ($second_choice_content_connn['pic_adress'] > "") {
                                                                                                        ?>

                                                                                                        <div id="div_mother_second_choicedel_second_choice_content_connn<?=$y?><?= $j ?>"
                                                                                                             class="seyed"
                                                                                                             style="opacity: 1;">
                                                                                                            <div class="form-group">
                                                                                                                <a class="col-md-1 control-label del_second_choice_content_connn<?=$y?>"
                                                                                                                   id="<?=$y?><?= $j ?>"
                                                                                                                   for="family"><i
                                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                                            title="حذف"
                                                                                                                            data-original-title="حذف"></i>
                                                                                                                </a>
                                                                                                                <div class="form-group col-md-12">

                                                                                                                    <div class=" H_second_choice_content_connn<?=$y?> col-md-3 input-group">
                                                                                                                        <input type="hidden"
                                                                                                                               id="second_choice_content_connn_subcat_val<?=$y?><?= $j ?>"
                                                                                                                               name="second_choice_content_connn_subcat_val<?=$y?><?= $j ?>"
                                                                                                                               value="<?= $second_choice_content_connn['pic'] ?>">
                                                                                                                        <input type="hidden"
                                                                                                                               id="second_choice_content_connn_subcat_link<?=$y?><?= $j ?>"
                                                                                                                               name="second_choice_content_connn_subcat_link<?=$y?><?= $j ?>"
                                                                                                                               value="<?= $second_choice_content_connn['pic_adress'] ?>">

                                                                                                                        <select id="second_choice_content_connn_cat<?=$y?><?= $j ?>"
                                                                                                                                data-selectid="<?=$y?><?= $j ?>"
                                                                                                                                class="form-control H_second_choice_content_connn_cat<?=$y?>"
                                                                                                                                name="second_choice_content_connn_cat<?=$y?><?= $j ?>">
                                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                                $str = '';

                                                                                                                                if ($row0['id'] == $second_choice_content_connn['link'])

                                                                                                                                    $str = 'selected';
                                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                                            }
                                                                                                                            ?>
                                                                                                                        </select>
                                                                                                                    </div>

                                                                                                                    <div id="second_choice_content_connn<?=$y?><?= $j ?>"
                                                                                                                         class="col-md-3 input-group">
                                                                                                                    </div>

                                                                                                                    <div id="second_choice_content_connn_content<?=$y?><?= $j ?>"
                                                                                                                         class="col-md-6 input-group">
                                                                                                                    </div>

                                                                                                                    <script>
                                                                                                                        $(document).ready(function () {
                                                                                                                            $.ajax({
                                                                                                                                type: 'POST',
                                                                                                                                url: 'New_ajax.php',
                                                                                                                                data: "action=second_choice_content_connn&id=" + $("#second_choice_content_connn_cat<?=$y?><?=$j?>").val() + "&value=" + $("#second_choice_content_connn_subcat_val<?=$y?><?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?=$y?><?= $j ?>',
                                                                                                                                success: function (result) {
                                                                                                                                    $('#second_choice_content_connn<?=$y?><?=$j?>').html(result);
                                                                                                                                }
                                                                                                                            });
                                                                                                                        });
                                                                                                                        $(document).ready(function () {
                                                                                                                            //   alert( $("#second_choice_content_connn_subcat_link<?=$j?>").val());
                                                                                                                            $.ajax({
                                                                                                                                type: 'POST',
                                                                                                                                url: 'New_ajax.php',
                                                                                                                                data: "action=second_choice_content_connn_content&id=" + $("#second_choice_content_connn_subcat_val<?=$y?><?=$j?>").val() + "&value=" + $("#second_choice_content_connn_subcat_link<?=$y?><?=$j?>").val() + "&secend_value=" + $("#second_choice_content_connn_subcat_link<?=$y?><?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?=$y?><?= $j ?>',
                                                                                                                                success: function (result) {
                                                                                                                                    $('#second_choice_content_connn_content<?=$y?><?=$j?>').html(result);
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
                                                                                                       id="second_choice_content_connn_count<?=$y?>"
                                                                                                       name="second_choice_content_connn_count<?=$y?>"
                                                                                                       value="<?= --$jcount; ?>">

                                                                                                <script>

                                                                                                    $(document).on('change', '.H_second_choice_content_connn_cat<?=$y?>', function () {
                                                                                                        var thisElement = $(this).parents('.H_second_choice_content_connn<?=$y?>').next();

                                                                                                        $.ajax({
                                                                                                            type: 'POST',
                                                                                                            url: 'New_ajax.php',
                                                                                                            data: "action=second_choice_content_connn&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                                            success: function (result) {
                                                                                                                //$('#second_choice_content_connn<?//=$j?>//').html(result);
                                                                                                                thisElement.empty();
                                                                                                                thisElement.append(result);
                                                                                                            }
                                                                                                        });
                                                                                                    });

                                                                                                    $(".second_choice_content_connn_neshane").change(function () {
                                                                                                        var j = $("#second_choice_content_connn_count<?=$y?>").val();
                                                                                                        $.ajax({
                                                                                                            type: 'POST',
                                                                                                            url: 'New_ajax.php',
                                                                                                            data: "action=second_choice_content_connn&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                                            success: function (result) {
                                                                                                                $('#second_choice_content_connn' + j).html(result);
                                                                                                            }
                                                                                                        });
                                                                                                    });
                                                                                                    $(document).on('change', '.second_choice_content_connn_neshane', function () {
                                                                                                        var j = $("#second_choice_content_connn_count<?=$y?>").val();
                                                                                                        //  $(".second_choice_content_connn_neshane").change(function () {
                                                                                                        $.ajax({
                                                                                                            type: 'POST',
                                                                                                            url: 'New_ajax.php',
                                                                                                            data: "action=second_choice_content_connn_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                                            success: function (result) {
                                                                                                                $('#second_choice_content_connn_content' + j).html(result);
                                                                                                            }
                                                                                                        });
                                                                                                    });


                                                                                                    $(document).ready(function () {
                                                                                                        var i = <?=$y?><?=$j?>;
                                                                                                        $('#add_second_choice_content_connn<?=$y?>').on("click", function () {

                                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_content_connn' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_content_connn<?=$y?>" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_content_connn<?=$y?> col-md-3 input-group"><input type="hidden" id="second_choice_content_connn_subcat_val' + i + '"  name="second_choice_content_connn_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_content_connn_subcat_link' + i + '"  name="second_choice_content_connn_subcat_link' + i + '" value=""> <select id="second_choice_content_connn_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_content_connn_cat<?=$y?>" name="second_choice_content_connn_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                                            }?> </select></div><div id="second_choice_content_connn' + i + '" class="col-md-3 input-group"></div><div id="second_choice_content_connn_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                                            $(this).before(someText);
                                                                                                            $('#div_mother_second_choicedel_second_choice_content_connn' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                                $(this).css('background', '');
                                                                                                            }).fadeTo('slow', 1);
                                                                                                            $('#second_choice_content_connn_count<?=$y?>').val(i);
                                                                                                            i++;
                                                                                                        });
                                                                                                        $(document).on('click', '.del_second_choice_content_connn<?=$y?>', function () {
                                                                                                            var id = '';
                                                                                                            var k = $('#second_choice_content_connn_count<?=$y?>').val();
                                                                                                            k--
                                                                                                            id = $(this).attr('id');
                                                                                                            $('#div_mother_second_choicedel_second_choice_content_connn' + id).remove();
                                                                                                            $('#second_choice_content_connn_count<?=$y?>').val(k);
                                                                                                        });
                                                                                                    });


                                                                                                </script>
                                                                                                <a class="btn btn-success block"
                                                                                                   id="add_second_choice_content_connn<?=$y?>"><i
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
                                                                                    var val = $("[name='ValSelectActive_content_connn_title<?=$y?>']").val();
                                                                                    //console.log(val);
                                                                                    toggleForm(val);

                                                                                    $(document).on('change', '[name="select_type_content_connn<?=$y?>"]', function () {
                                                                                        val = $(this).val();
                                                                                        $('[name="ValSelectActive_content_connn_title<?=$y?>"]').val(val);
                                                                                        toggleForm(val);
                                                                                    });

                                                                                    function toggleForm(val) {
                                                                                        $('.opt_content_connn<?=$y?>').hide();
                                                                                        $('.content_connn_option<?=$y?>' + val).show();

                                                                                    }
                                                                                });

                                                                            </script>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $('input#form1<?= $y ?>').click(function () {
                                                                    $('.content_forms<?=$y?> #show_form1').siblings().addClass('H_dis_none');
                                                                    $('.content_forms<?=$y?> #show_form1').removeClass('H_dis_none');
                                                                });

                                                                $(".content_forms<?=$y?>").find('[id=<? if($temp_tabTwo['link']==""){echo 'show_form1';}else echo $temp_tabTwo['link']; ?>]').removeClass('H_dis_none');

                                                                $("form").submit(function () {
                                                                    var num_tab_forms = $(".content_forms<?=$y?> .formmm").not(".H_dis_none").attr("id");
                                                                    $('[name="num_tab_forms_tab<?=$y?>"]').val(num_tab_forms);

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

        $(".H_rename_content_title_box6").click(function () {
            $(this).hide();
            $('.H_rename_content_title_box6_save').show();
            $(".H_input_rename_content_title_box6").toggle(300);
        });
        $(".H_rename_content_title_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'content_title_box6' + "&value=" + $(".H_input_rename_content_title_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_title_box6 > span.temp").text($(".H_input_rename_content_title_box6").val());
            $(this).hide();
            $('.H_rename_content_title_box6').show();
            $(".H_input_rename_content_title_box6").hide();
            $(".H_rename_content_title_box6.H_pos_color").css('transform', 'translateY(-24px)');
        });

        //-------------------------------

        $(".H_rename_content_title_box7").click(function () {
            $(this).hide();
            $('.H_rename_content_title_box7_save').show();
            $(".H_input_rename_content_title_box7").toggle(300);
        });
        $(".H_rename_content_title_box7_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'content_title_box7' + "&value=" + $(".H_input_rename_content_title_box7").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_title_box7 > span.temp").text($(".H_input_rename_content_title_box7").val());
            $(this).hide();
            $('.H_rename_content_title_box7').show();
            $(".H_input_rename_content_title_box7").hide();
            $(".H_rename_content_title_box7.H_pos_color").css('transform', 'translateY(-24px)');
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
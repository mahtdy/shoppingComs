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



    ########################################################### webpack ########################################################

    $webpack_boxOne_pic_adress = 0;
    $webpack_boxOne_pic_adress= injection_replace($_POST["webpack_boxOne_pic_adress"]);
    insert_templdate($site, $webpack_boxOne_pic_adress, $la, '', '', '', '', "webpack_boxOne", 'coms2', $coms_conect);

    $webpack_content_BoxOne_title= injection_replace($_POST["webpack_content_BoxOne_title"]);
    $webpack_content_BoxOne_pic = injection_replace($_POST["webpack_content_BoxOne_pic"]);
    $webpack_content_BoxOne_text= injection_replace($_POST["webpack_content_BoxOne_text"]);
    $webpack_content_BoxOne_pic_adress = injection_replace($_POST["webpack_content_BoxOne_pic_adress"]);
    insert_templdate($site, $webpack_content_BoxOne_pic_adress, $la, $webpack_content_BoxOne_text, $webpack_content_BoxOne_title, '', $webpack_content_BoxOne_pic, "webpack_content_BoxOne", 'coms2', $coms_conect);

    $webpack_btnn_BoxOne_pic = injection_replace($_POST["webpack_btnn_BoxOne_pic"]);
    $webpack_btnn_BoxOne_link= injection_replace($_POST["webpack_btnn_BoxOne_link"]);
    insert_templdate($site, '', $la, '', '', $webpack_btnn_BoxOne_link, $webpack_btnn_BoxOne_pic, "webpack_btnn_BoxOne", 'coms2', $coms_conect);

    //slide

    $condition_webpack_slide_boxOne = "name like 'webpack_slide_boxOne%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_webpack_slide_boxOne, $coms_conect);
    $webpack_slide_boxOne_count = injection_replace_pic($_POST["webpack_slide_boxOne_count"]);
    for ($x = 1; $x <= $webpack_slide_boxOne_count; $x++) {

        $webpack_slide_boxOne_text = injection_replace_pic($_POST["webpack_slide_boxOne_text{$x}"]);
        $webpack_slide_boxOne_title = injection_replace_pic($_POST["webpack_slide_boxOne_title{$x}"]);
        $webpack_slide_boxOne_link = injection_replace_pic($_POST["webpack_slide_boxOne_link{$x}"]);
        $webpack_slide_boxOne_pic = injection_replace_pic($_POST["webpack_slide_boxOne_pic{$x}"]);
        $webpack_slide_boxOne_avatar7 = injection_replace($_POST["webpack_slide_boxOne_avatar7{$x}"][0]);
        if ($webpack_slide_boxOne_avatar7 > "") {
            $webpack_slide_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $webpack_slide_boxOne_avatar7;
        }
        if ($webpack_slide_boxOne_title > "") {
            insert_templdate($site, $webpack_slide_boxOne_pic, $la, $webpack_slide_boxOne_text, $webpack_slide_boxOne_title, $webpack_slide_boxOne_link, '', "webpack_slide_boxOne$x", 'coms2', $coms_conect);
        }
    }

    
//    menu box
    $webpack_menubox_show_pic_adress = injection_replace_pic($_POST["webpack_menubox_show_pic_adress"]);
    insert_templdate($site, $webpack_menubox_show_pic_adress, $la, '', '', '', '', "webpack_menubox_show", 'coms2', $coms_conect);

    $webpack_menubox_links_del = "name like 'webpack_menubox_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $webpack_menubox_links_del, $coms_conect);
    $webpack_menubox_links_count = injection_replace_pic($_POST["webpack_menubox_links_count"]);
    for ($k = 1; $k <= $webpack_menubox_links_count; $k++) {
        $webpack_menubox_links_title = injection_replace_pic($_POST["webpack_menubox_links_title{$k}"]);
        $webpack_menubox_links_link = injection_replace_pic($_POST["webpack_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $webpack_menubox_links_title, $webpack_menubox_links_link, '', "webpack_menubox_links$k", 'coms2', $coms_conect);
    }
//    webpack box_packs
    $webpack_box_packs_pic_adress=0;
    $webpack_box_packs_pic_adress = injection_replace_pic($_POST["webpack_box_packs_pic_adress"]);
    $webpack_box_packs_title = injection_replace_pic($_POST["webpack_box_packs_title"]);
    $webpack_box_packs_text = injection_replace_pic($_POST["webpack_box_packs_text"]);
    $webpack_box_packs_pic = injection_replace_pic($_POST["webpack_box_packs_pic"]);
    $webpack_box_packs_link = injection_replace_pic($_POST["webpack_box_packs_link"]);
    insert_templdate($site, $webpack_box_packs_pic_adress, $la, $webpack_box_packs_text, $webpack_box_packs_title, $webpack_box_packs_link, $webpack_box_packs_pic, "webpack_box_packs", 'coms2', $coms_conect);

    //edu1
for ($b = 2; $b <= 6; $b++) {
    $count1_webpack_edu1_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'webpack_edu1_main_header$b%' ", $coms_conect);
    $block_name_setting_webpack_edu1_main_header = injection_replace($_POST["block_name_setting_webpack_edu1_main_header{$b}"]);
    if ($block_name_setting_webpack_edu1_main_header > "") {
        insert_templdate($site, '', $la, $block_name_setting_webpack_edu1_main_header, '', '', '', "setting_webpack_edu1_main_header$b", 'coms2', $coms_conect);
    }
    //----------tab name
    $condition_webpack_edu1_main_header = "name like 'webpack_edu1_main_header$b%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_webpack_edu1_main_header, $coms_conect);

    $webpack_edu1_main_header_count = injection_replace_pic($_POST["webpack_edu1_main_header_count$b"]);
    for ($x = 1; $x <= $webpack_edu1_main_header_count; $x++) {
        $webpack_edu1_main_header_text = injection_replace_pic($_POST["webpack_edu1_main_header_text{$b}{$x}"]);
        if ($webpack_edu1_main_header_text > "") {
            insert_templdate($site, '', $la, $webpack_edu1_main_header_text, '', '', '', "webpack_edu1_main_header$b$x", 'coms2', $coms_conect);
        }
    }
    //-------end tab name------------

    //-------tab------------
    for ($u = 1; $u <= $count1_webpack_edu1_main_header; $u++) {
        $condition_webpack_edu1_header_into_tab_dell = "name like 'webpack_edu1_header_into_tab$b$u%' and tem_name='coms2'";
        delete_from_data_base('new_tem_setting', $condition_webpack_edu1_header_into_tab_dell, $coms_conect);

        $webpack_edu1_header_into_tab_count = injection_replace_pic($_POST["webpack_edu1_header_into_tab_count{$b}{$u}"]);
        for ($x = 1; $x <= $webpack_edu1_header_into_tab_count; $x++) {

            $webpack_edu1_header_into_tab_pic = injection_replace_pic($_POST["webpack_edu1_header_into_tab_pic{$b}{$u}{$x}"]);
            $webpack_edu1_header_into_tab_title = injection_replace_pic($_POST["webpack_edu1_header_into_tab_title{$b}{$u}{$x}"]);
            $webpack_edu1_header_into_tab_link = injection_replace_pic($_POST["webpack_edu1_header_into_tab_link{$b}{$u}{$x}"]);
            $webpack_edu1_header_into_tab_text = injection_replace_pic($_POST["webpack_edu1_header_into_tab_text{$b}{$u}{$x}"]);

            if ($webpack_edu1_header_into_tab_title > "") {
                insert_templdate($site, '', $la, $webpack_edu1_header_into_tab_text, $webpack_edu1_header_into_tab_title, $webpack_edu1_header_into_tab_link, $webpack_edu1_header_into_tab_pic, "webpack_edu1_header_into_tab$b$u$x", 'coms2', $coms_conect);
            }
        }

    }
}
//    webpack box video
    $webpack_boxshow_video_pic_adress = 0;
    $webpack_boxshow_video_pic_adress= injection_replace($_POST["webpack_boxshow_video_pic_adress"]);
    insert_templdate($site, $webpack_boxshow_video_pic_adress, $la, '', '', '', '', "webpack_boxshow_video", 'coms2', $coms_conect);


    $condition_second_choice_webpack_video_boxFour = "name like 'second_choice_webpack_video_boxFour%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_webpack_video_boxFour, $coms_conect);
    $second_choice_webpack_video_boxFour_count = injection_replace_pic($_POST["second_choice_webpack_video_boxFour_count"]);
    for ($i = 1; $i <= $second_choice_webpack_video_boxFour_count; $i++) {


        $second_choice_webpack_video_boxFour_cat = injection_replace_pic($_POST["second_choice_webpack_video_boxFour_cat{$i}"]);
        $second_choice_webpack_video_boxFour_subcat_cat = injection_replace_pic($_POST["second_choice_webpack_video_boxFour_subcat_cat{$i}"]);
        $second_choice_webpack_video_boxFour_subcat_cat_content = injection_replace_pic($_POST["second_choice_webpack_video_boxFour_subcat_cat_content{$i}"]);
        if ($second_choice_webpack_video_boxFour_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_webpack_video_boxFour_subcat_cat_content, $la, '', '', $second_choice_webpack_video_boxFour_cat, $second_choice_webpack_video_boxFour_subcat_cat, "second_choice_webpack_video_boxFour$i", 'coms2', $coms_conect);
    }



//    webpack box2
    $webpack_boxTwo_pic_adress = 0;
    $webpack_boxTwo_pic_adress= injection_replace($_POST["webpack_boxTwo_pic_adress"]);
    $webpack_boxTwo_text = injection_replace($_POST["webpack_boxTwo_text"]);
    $webpack_boxTwo_title = injection_replace($_POST["webpack_boxTwo_title"]);
    $webpack_boxTwo_pic = injection_replace($_POST["webpack_boxTwo_pic"]);
    $webpack_boxTwo_link = injection_replace($_POST["webpack_boxTwo_link"]);
    insert_templdate($site, $webpack_boxTwo_pic_adress, $la, $webpack_boxTwo_text, $webpack_boxTwo_title, $webpack_boxTwo_link, $webpack_boxTwo_pic, "webpack_boxTwo", 'coms2', $coms_conect);


    $ValSelectActive_webpack_boxTwo_title = injection_replace($_POST["ValSelectActive_webpack_boxTwo_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_webpack_boxTwo_title, '', '', "ValSelectActive_webpack_boxTwo", 'coms2', $coms_conect);

    $condition_first_choice_webpack_boxTwo = "name like 'first_choice_webpack_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_webpack_boxTwo, $coms_conect);
    $first_choice_webpack_boxTwo_count = injection_replace_pic($_POST["first_choice_webpack_boxTwo_count"]);
    for ($i = 1; $i <= $first_choice_webpack_boxTwo_count; $i++) {

        $first_choice_webpack_boxTwo_cat = injection_replace_pic($_POST["first_choice_webpack_boxTwo_cat{$i}"]);
        $first_choice_webpack_boxTwo_subcat_cat = injection_replace_pic($_POST["first_choice_webpack_boxTwo_subcat_cat{$i}"]);
        $first_choice_webpack_boxTwo_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_webpack_boxTwo_Fixed_selection_cat{$i}"]);
        $first_choice_webpack_boxTwo_number = injection_replace_pic($_POST["first_choice_webpack_boxTwo_number{$i}"]);
        if ($first_choice_webpack_boxTwo_subcat_cat > "")
            insert_templdate($site, $first_choice_webpack_boxTwo_number, $la, $first_choice_webpack_boxTwo_Fixed_selection_cat, '', $first_choice_webpack_boxTwo_cat, $first_choice_webpack_boxTwo_subcat_cat, "first_choice_webpack_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_webpack_boxTwo = "name like 'second_choice_webpack_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_webpack_boxTwo, $coms_conect);
    $second_choice_webpack_boxTwo_count = injection_replace_pic($_POST["second_choice_webpack_boxTwo_count"]);
    for ($i = 1; $i <= $second_choice_webpack_boxTwo_count; $i++) {

        $second_choice_webpack_boxTwo_cat = injection_replace_pic($_POST["second_choice_webpack_boxTwo_cat{$i}"]);
        $second_choice_webpack_boxTwo_subcat_cat = injection_replace_pic($_POST["second_choice_webpack_boxTwo_subcat_cat{$i}"]);
        $second_choice_webpack_boxTwo_subcat_cat_content = injection_replace_pic($_POST["second_choice_webpack_boxTwo_subcat_cat_content{$i}"]);
        if ($second_choice_webpack_boxTwo_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_webpack_boxTwo_subcat_cat_content, $la, '', '', $second_choice_webpack_boxTwo_cat, $second_choice_webpack_boxTwo_subcat_cat, "second_choice_webpack_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_webpack_boxTwo = "name like 'third_choice_webpack_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_webpack_boxTwo, $coms_conect);
    $third_choice_webpack_boxTwo_count = injection_replace_pic($_POST["third_choice_webpack_boxTwo_count"]);
    for ($x = 1; $x <= $third_choice_webpack_boxTwo_count; $x++) {


        $third_choice_webpack_boxTwo_pic_adress = injection_replace_pic($_POST["third_choice_webpack_boxTwo_pic_adress{$x}"]);
        $third_choice_webpack_boxTwo_title = injection_replace_pic($_POST["third_choice_webpack_boxTwo_title{$x}"]);
        $third_choice_webpack_boxTwo_text = injection_replace_pic($_POST["third_choice_webpack_boxTwo_text{$x}"]);

        $third_choice_webpack_boxTwo_link = injection_replace_pic($_POST["third_choice_webpack_boxTwo_link{$x}"]);
        $third_choice_webpack_boxTwo_pic = injection_replace_pic($_POST["third_choice_webpack_boxTwo_pic{$x}"]);
        $third_choice_webpack_boxTwo_pic = resize_image_M($third_choice_webpack_boxTwo_pic,40,40,$img_page_main,'');
        $third_choice_webpack_boxTwo_avatar7 = injection_replace($_POST["third_choice_webpack_boxTwo_avatar7{$x}"][0]);
        if ($third_choice_webpack_boxTwo_avatar7 > "") {
            $third_choice_webpack_boxTwo_pic = 'http://' . $_SERVER["HTTP_HOST"]. '/new_gallery/files/' . $third_choice_webpack_boxTwo_avatar7;
            $third_choice_webpack_boxTwo_pic = resize_image_M($third_choice_webpack_boxTwo_pic,40,40,$img_page_main,'');

        }
        if ($third_choice_webpack_boxTwo_title > "") {
            insert_templdate($site, $third_choice_webpack_boxTwo_pic_adress, $la, $third_choice_webpack_boxTwo_text, $third_choice_webpack_boxTwo_title, $third_choice_webpack_boxTwo_link, $third_choice_webpack_boxTwo_pic, "third_choice_webpack_boxTwo$x", 'coms2', $coms_conect);
        }
    }
    //box gallery
    $webpack_box_gallery_pic_adress = 0;
    $webpack_box_gallery_pic_adress= injection_replace($_POST["webpack_box_gallery_pic_adress"]);
    $webpack_box_gallery_title= injection_replace($_POST["webpack_box_gallery_title"]);
    $webpack_box_gallery_text= injection_replace($_POST["webpack_box_gallery_text"]);
    $webpack_box_gallery_pic= injection_replace($_POST["webpack_box_gallery_pic"]);
    $webpack_box_gallery_link= injection_replace($_POST["webpack_box_gallery_link"]);
    insert_templdate($site, $webpack_box_gallery_pic_adress, $la, $webpack_box_gallery_text, $webpack_box_gallery_title, $webpack_box_gallery_link, $webpack_box_gallery_pic, "webpack_box_gallery", 'coms2', $coms_conect);

    $ValSelectActive_webpack_box_gallery_title = injection_replace($_POST["ValSelectActive_webpack_box_gallery_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_webpack_box_gallery_title, '', '', "ValSelectActive_webpack_box_gallery", 'coms2', $coms_conect);

    $condition_first_choice_webpack_box_gallery = "name like 'first_choice_webpack_box_gallery%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_webpack_box_gallery, $coms_conect);
    $first_choice_webpack_box_gallery_count = injection_replace_pic($_POST["first_choice_webpack_box_gallery_count"]);
    for ($i = 1; $i <= $first_choice_webpack_box_gallery_count; $i++) {

        $first_choice_webpack_box_gallery_cat = injection_replace_pic($_POST["first_choice_webpack_box_gallery_cat{$i}"]);
        $first_choice_webpack_box_gallery_subcat_cat = injection_replace_pic($_POST["first_choice_webpack_box_gallery_subcat_cat{$i}"]);
        $first_choice_webpack_box_gallery_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_webpack_box_gallery_Fixed_selection_cat{$i}"]);
        $first_choice_webpack_box_gallery_number = injection_replace_pic($_POST["first_choice_webpack_box_gallery_number{$i}"]);
        if ($first_choice_webpack_box_gallery_subcat_cat > "")
            insert_templdate($site, $first_choice_webpack_box_gallery_number, $la, $first_choice_webpack_box_gallery_Fixed_selection_cat, '', $first_choice_webpack_box_gallery_cat, $first_choice_webpack_box_gallery_subcat_cat, "first_choice_webpack_box_gallery$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_webpack_box_gallery = "name like 'second_choice_webpack_box_gallery%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_webpack_box_gallery, $coms_conect);
    $second_choice_webpack_box_gallery_count = injection_replace_pic($_POST["second_choice_webpack_box_gallery_count"]);
    for ($i = 1; $i <= $second_choice_webpack_box_gallery_count; $i++) {

        $second_choice_webpack_box_gallery_cat = injection_replace_pic($_POST["second_choice_webpack_box_gallery_cat{$i}"]);
        $second_choice_webpack_box_gallery_subcat_cat = injection_replace_pic($_POST["second_choice_webpack_box_gallery_subcat_cat{$i}"]);
        $second_choice_webpack_box_gallery_subcat_cat_content = injection_replace_pic($_POST["second_choice_webpack_box_gallery_subcat_cat_content{$i}"]);
        if ($second_choice_webpack_box_gallery_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_webpack_box_gallery_subcat_cat_content, $la, '', '', $second_choice_webpack_box_gallery_cat, $second_choice_webpack_box_gallery_subcat_cat, "second_choice_webpack_box_gallery$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_webpack_box_gallery = "name like 'third_choice_webpack_box_gallery%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_webpack_box_gallery, $coms_conect);
    $third_choice_webpack_box_gallery_count = injection_replace_pic($_POST["third_choice_webpack_box_gallery_count"]);
    for ($x = 1; $x <= $third_choice_webpack_box_gallery_count; $x++) {


        $third_choice_webpack_box_gallery_title = injection_replace_pic($_POST["third_choice_webpack_box_gallery_title{$x}"]);
        $third_choice_webpack_box_gallery_link = injection_replace_pic($_POST["third_choice_webpack_box_gallery_link{$x}"]);
        $third_choice_webpack_box_gallery_pic = injection_replace_pic($_POST["third_choice_webpack_box_gallery_pic{$x}"]);
        if ($x==1){
            $third_choice_webpack_box_gallery_pic = resize_image_M($third_choice_webpack_box_gallery_pic,570,370,$img_page_main,'');
        }else{
            $third_choice_webpack_box_gallery_pic = resize_image_M($third_choice_webpack_box_gallery_pic,270,150,$img_page_main,'');
        }
        $third_choice_webpack_box_gallery_avatar7 = injection_replace($_POST["third_choice_webpack_box_gallery_avatar7{$x}"][0]);
        if ($third_choice_webpack_box_gallery_avatar7 > "") {
            $third_choice_webpack_box_gallery_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_webpack_box_gallery_avatar7;
            if ($x==1){
                $third_choice_webpack_box_gallery_pic = resize_image_M($third_choice_webpack_box_gallery_pic,570,370,$img_page_main,'');
            }else{
                $third_choice_webpack_box_gallery_pic = resize_image_M($third_choice_webpack_box_gallery_pic,270,150,$img_page_main,'');
            }
        }
        if ($third_choice_webpack_box_gallery_title > "") {
            insert_templdate($site, '', $la, '', $third_choice_webpack_box_gallery_title, $third_choice_webpack_box_gallery_link, $third_choice_webpack_box_gallery_pic, "third_choice_webpack_box_gallery$x", 'coms2', $coms_conect);
        }
    }
    //    box3
    $webpack_boxThree_pic_adress = 0;
    $webpack_boxThree_pic_adress= injection_replace($_POST["webpack_boxThree_pic_adress"]);
    $webpack_boxThree_title= injection_replace($_POST["webpack_boxThree_title"]);
    $webpack_boxThree_text= injection_replace($_POST["webpack_boxThree_text"]);
    $webpack_boxThree_pic= injection_replace($_POST["webpack_boxThree_pic"]);
    $webpack_boxThree_link= injection_replace($_POST["webpack_boxThree_link"]);
    $webpack_boxThree_link=resize_image_M($webpack_boxThree_link,357,530,$img_page_main,'');
    $webpack_boxThree_link_avatar_orak = injection_replace($_POST["webpack_boxThree_link_avatar_orak"][0]);
    if ($webpack_boxThree_link_avatar_orak > "") {
        $webpack_boxThree_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $webpack_boxThree_link_avatar_orak;
        $webpack_boxThree_link=resize_image_M($webpack_boxThree_link,357,530,$img_page_main,'');

    }
    insert_templdate($site, $webpack_boxThree_pic_adress, $la, $webpack_boxThree_text, $webpack_boxThree_title, $webpack_boxThree_link, $webpack_boxThree_pic, "webpack_boxThree", 'coms2', $coms_conect);

    $webpack_show_faq_que_pic_adress = 0;
    $webpack_show_faq_que_pic_adress= injection_replace($_POST["webpack_show_faq_que_pic_adress"]);
    $webpack_show_faq_que_pic = 0;
    $webpack_show_faq_que_pic= injection_replace($_POST["webpack_show_faq_que_pic"]);
    $cat_faq_text= injection_replace($_POST["cat_faq_text"]);
    $cat_qes_title= injection_replace($_POST["cat_qes_title"]);
    $webpack_show_faq_que_link = injection_replace_pic($_POST["webpack_show_faq_que_link"]);
    insert_templdate($site, $webpack_show_faq_que_pic_adress, $la, $cat_faq_text, $cat_qes_title, $webpack_show_faq_que_link, $webpack_show_faq_que_pic, "webpack_show_faq_que", 'coms2', $coms_conect);

    $webpack_pop_faq_title= injection_replace($_POST["webpack_pop_faq_title"]);
    $webpack_pop_faq_text= injection_replace($_POST["webpack_pop_faq_text"]);
    $webpack_pop_faq_pic= injection_replace($_POST["webpack_pop_faq_pic"]);
    $webpack_pop_faq_link= injection_replace($_POST["webpack_pop_faq_link"]);
    $webpack_pop_faq_pic_adress= injection_replace($_POST["webpack_pop_faq_pic_adress"]);
    insert_templdate($site, $webpack_pop_faq_pic_adress, $la, $webpack_pop_faq_text, $webpack_pop_faq_title, $webpack_pop_faq_link, $webpack_pop_faq_pic, "webpack_pop_faq", 'coms2', $coms_conect);


    //box6
    $webpack_boxSix_pic_adress = 0;
    $webpack_boxSix_pic_adress= injection_replace($_POST["webpack_boxSix_pic_adress"]);
    $webpack_boxSix_title= injection_replace($_POST["webpack_boxSix_title"]);
    $webpack_boxSix_text= injection_replace($_POST["webpack_boxSix_text"]);
    insert_templdate($site, $webpack_boxSix_pic_adress, $la, $webpack_boxSix_text, $webpack_boxSix_title, '', '', "webpack_boxSix", 'coms2', $coms_conect);


    $ValSelectActive_webpack_boxSix_title = injection_replace($_POST["ValSelectActive_webpack_boxSix_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_webpack_boxSix_title, '', '', "ValSelectActive_webpack_boxSix", 'coms2', $coms_conect);

    $condition_first_choice_webpack_boxSix = "name like 'first_choice_webpack_boxSix%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_webpack_boxSix, $coms_conect);
    $first_choice_webpack_boxSix_count = injection_replace_pic($_POST["first_choice_webpack_boxSix_count"]);
    for ($i = 1; $i <= $first_choice_webpack_boxSix_count; $i++) {

        $first_choice_webpack_boxSix_cat = injection_replace_pic($_POST["first_choice_webpack_boxSix_cat{$i}"]);
        $first_choice_webpack_boxSix_subcat_cat = injection_replace_pic($_POST["first_choice_webpack_boxSix_subcat_cat{$i}"]);
        $first_choice_webpack_boxSix_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_webpack_boxSix_Fixed_selection_cat{$i}"]);
        $first_choice_webpack_boxSix_number = injection_replace_pic($_POST["first_choice_webpack_boxSix_number{$i}"]);
        if ($first_choice_webpack_boxSix_subcat_cat > "")
            insert_templdate($site, $first_choice_webpack_boxSix_number, $la, $first_choice_webpack_boxSix_Fixed_selection_cat, '', $first_choice_webpack_boxSix_cat, $first_choice_webpack_boxSix_subcat_cat, "first_choice_webpack_boxSix$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_webpack_boxSix = "name like 'second_choice_webpack_boxSix%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_webpack_boxSix, $coms_conect);
    $second_choice_webpack_boxSix_count = injection_replace_pic($_POST["second_choice_webpack_boxSix_count"]);
    for ($i = 1; $i <= $second_choice_webpack_boxSix_count; $i++) {

        $second_choice_webpack_boxSix_cat = injection_replace_pic($_POST["second_choice_webpack_boxSix_cat{$i}"]);
        $second_choice_webpack_boxSix_subcat_cat = injection_replace_pic($_POST["second_choice_webpack_boxSix_subcat_cat{$i}"]);
        $second_choice_webpack_boxSix_subcat_cat_content = injection_replace_pic($_POST["second_choice_webpack_boxSix_subcat_cat_content{$i}"]);
        if ($second_choice_webpack_boxSix_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_webpack_boxSix_subcat_cat_content, $la, '', '', $second_choice_webpack_boxSix_cat, $second_choice_webpack_boxSix_subcat_cat, "second_choice_webpack_boxSix$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_webpack_boxSix = "name like 'third_choice_webpack_boxSix%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_webpack_boxSix, $coms_conect);
    $third_choice_webpack_boxSix_count = injection_replace_pic($_POST["third_choice_webpack_boxSix_count"]);
    for ($x = 1; $x <= $third_choice_webpack_boxSix_count; $x++) {


        $third_choice_webpack_boxSix_pic_adress = injection_replace_pic($_POST["third_choice_webpack_boxSix_pic_adress{$x}"]);
        $third_choice_webpack_boxSix_title = injection_replace_pic($_POST["third_choice_webpack_boxSix_title{$x}"]);
        $third_choice_webpack_boxSix_text = injection_replace_pic($_POST["third_choice_webpack_boxSix_text{$x}"]);
        $third_choice_webpack_boxSix_link = injection_replace_pic($_POST["third_choice_webpack_boxSix_link{$x}"]);
        $third_choice_webpack_boxSix_pic = injection_replace_pic($_POST["third_choice_webpack_boxSix_pic{$x}"]);
        $third_choice_webpack_boxSix_pic =resize_image_M($third_choice_webpack_boxSix_pic,270,150,$img_page_main,'');
        $third_choice_webpack_boxSix_avatar7 = injection_replace($_POST["third_choice_webpack_boxSix_avatar7{$x}"][0]);
        if ($third_choice_webpack_boxSix_avatar7 > "") {
            $third_choice_webpack_boxSix_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_webpack_boxSix_avatar7;
            $third_choice_webpack_boxSix_pic =resize_image_M($third_choice_webpack_boxSix_pic,270,150,$img_page_main,'');

        }
        if ($third_choice_webpack_boxSix_title > "") {
            insert_templdate($site, $third_choice_webpack_boxSix_pic_adress, $la, $third_choice_webpack_boxSix_text, $third_choice_webpack_boxSix_title, $third_choice_webpack_boxSix_link, $third_choice_webpack_boxSix_pic, "third_choice_webpack_boxSix$x", 'coms2', $coms_conect);
        }
    }
//    webpack box Parallax
    $webpack_boxParallax_pic_adress = 0;
    $webpack_boxParallax_pic_adress= injection_replace($_POST["webpack_boxParallax_pic_adress"]);
    $webpack_boxParallax_title= injection_replace($_POST["webpack_boxParallax_title"]);
    $webpack_boxParallax_text= injection_replace($_POST["webpack_boxParallax_text"]);
    $webpack_boxParallax_link= injection_replace($_POST["webpack_boxParallax_link"]);
    $webpack_boxParallax_pic= injection_replace($_POST["webpack_boxParallax_pic"]);
    $webpack_boxParallax_pic=resize_image_M($webpack_boxParallax_pic,1350,550,$img_page_main,'');
    $webpack_boxParallax_pic_avatar_orak = injection_replace($_POST["webpack_boxParallax_pic_avatar_orak{$x}"][0]);
    if ($webpack_boxParallax_pic_avatar_orak > "") {
        $webpack_boxParallax_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $webpack_boxParallax_pic_avatar_orak;
        $webpack_boxParallax_pic=resize_image_M($webpack_boxParallax_pic,1350,550,$img_page_main,'');

    }
    if ($webpack_boxParallax_text > "") {
    insert_templdate($site, $webpack_boxParallax_pic_adress, $la, $webpack_boxParallax_text, $webpack_boxParallax_title, $webpack_boxParallax_link, $webpack_boxParallax_pic, "webpack_boxParallax", 'coms2', $coms_conect);
    }
    // webpack
    $webpack_degarKhadamat_pic_adress = 0;
    $webpack_degarKhadamat_pic_adress= injection_replace($_POST["webpack_degarKhadamat_pic_adress"]);
    $webpack_degarKhadamat_title= injection_replace($_POST["webpack_degarKhadamat_title"]);
    $webpack_degarKhadamat_text= injection_replace($_POST["webpack_degarKhadamat_text"]);
    insert_templdate($site, $webpack_degarKhadamat_pic_adress, $la, $webpack_degarKhadamat_text, $webpack_degarKhadamat_title, '', '', "webpack_degarKhadamat", 'coms2', $coms_conect);

    $condition_webpack_degarKhadamat_content = "name like 'webpack_degarKhadamat_content%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_webpack_degarKhadamat_content, $coms_conect);
    $webpack_degarKhadamat_content_count = injection_replace_pic($_POST["webpack_degarKhadamat_content_count"]);
    for ($x = 1; $x <= $webpack_degarKhadamat_content_count; $x++) {

        $webpack_degarKhadamat_content_text = injection_replace_pic($_POST["webpack_degarKhadamat_content_text{$x}"]);
        $webpack_degarKhadamat_content_title = injection_replace_pic($_POST["webpack_degarKhadamat_content_title{$x}"]);
        $webpack_degarKhadamat_content_link = injection_replace_pic($_POST["webpack_degarKhadamat_content_link{$x}"]);
        $webpack_degarKhadamat_content_pic = injection_replace_pic($_POST["webpack_degarKhadamat_content_pic{$x}"]);
        $webpack_degarKhadamat_content_pic = resize_image_M($webpack_degarKhadamat_content_pic,88,76,$img_page_main,'');
        $webpack_degarKhadamat_content_avatar7 = injection_replace($_POST["webpack_degarKhadamat_content_avatar7{$x}"][0]);
        if ($webpack_degarKhadamat_content_avatar7 > "") {
            $webpack_degarKhadamat_content_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $webpack_degarKhadamat_content_avatar7;
            $webpack_degarKhadamat_content_pic = resize_image_M($webpack_degarKhadamat_content_pic,88,76,$img_page_main,'');

        }
        if ($webpack_degarKhadamat_content_title > "") {
            insert_templdate($site, $webpack_degarKhadamat_content_pic, $la, $webpack_degarKhadamat_content_text, $webpack_degarKhadamat_content_title, $webpack_degarKhadamat_content_link, '', "webpack_degarKhadamat_content$x", 'coms2', $coms_conect);
        }
    }
    //   article

    $webpack_title_article_pic_adress = 0;
    $webpack_title_article_pic_adress= injection_replace($_POST["webpack_title_article_pic_adress"]);
    $webpack_title_article_title= injection_replace($_POST["webpack_title_article_title"]);
    $webpack_title_article_text= injection_replace($_POST["webpack_title_article_text"]);
    insert_templdate($site, $webpack_title_article_pic_adress, $la, $webpack_title_article_text, $webpack_title_article_title, '', '', "webpack_title_article", 'coms2', $coms_conect);

    $ValSelectActive_webpack_article_title = injection_replace($_POST["ValSelectActive_webpack_article_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_webpack_article_title, '', '', "ValSelectActive_webpack_article", 'coms2', $coms_conect);

    $condition_first_choice_webpack_article = "name like 'first_choice_webpack_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_webpack_article, $coms_conect);
    $first_choice_webpack_article_count = injection_replace_pic($_POST["first_choice_webpack_article_count"]);
    for ($i = 1; $i <= $first_choice_webpack_article_count; $i++) {

        $first_choice_webpack_article_cat = injection_replace_pic($_POST["first_choice_webpack_article_cat{$i}"]);
        $first_choice_webpack_article_subcat_cat = injection_replace_pic($_POST["first_choice_webpack_article_subcat_cat{$i}"]);
        $first_choice_webpack_article_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_webpack_article_Fixed_selection_cat{$i}"]);
        $first_choice_webpack_article_number = injection_replace_pic($_POST["first_choice_webpack_article_number{$i}"]);
        if ($first_choice_webpack_article_subcat_cat > "")
            insert_templdate($site, $first_choice_webpack_article_number, $la, $first_choice_webpack_article_Fixed_selection_cat, '', $first_choice_webpack_article_cat, $first_choice_webpack_article_subcat_cat, "first_choice_webpack_article$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_webpack_article = "name like 'second_choice_webpack_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_webpack_article, $coms_conect);
    $second_choice_webpack_article_count = injection_replace_pic($_POST["second_choice_webpack_article_count"]);
    for ($i = 1; $i <= $second_choice_webpack_article_count; $i++) {

        $second_choice_webpack_article_cat = injection_replace_pic($_POST["second_choice_webpack_article_cat{$i}"]);
        $second_choice_webpack_article_subcat_cat = injection_replace_pic($_POST["second_choice_webpack_article_subcat_cat{$i}"]);
        $second_choice_webpack_article_subcat_cat_content = injection_replace_pic($_POST["second_choice_webpack_article_subcat_cat_content{$i}"]);
        if ($second_choice_webpack_article_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_webpack_article_subcat_cat_content, $la, '', '', $second_choice_webpack_article_cat, $second_choice_webpack_article_subcat_cat, "second_choice_webpack_article$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_webpack_article = "name like 'third_choice_webpack_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_webpack_article, $coms_conect);
    $third_choice_webpack_article_count = injection_replace_pic($_POST["third_choice_webpack_article_count"]);
    for ($x = 1; $x <= $third_choice_webpack_article_count; $x++) {

        $third_choice_webpack_article_pic_adress = injection_replace_pic($_POST["third_choice_webpack_article_pic_adress{$x}"]);
        $third_choice_webpack_article_title = injection_replace_pic($_POST["third_choice_webpack_article_title{$x}"]);
        $third_choice_webpack_article_text = injection_replace_pic($_POST["third_choice_webpack_article_text{$x}"]);
        $third_choice_webpack_article_link = injection_replace_pic($_POST["third_choice_webpack_article_link{$x}"]);
        $third_choice_webpack_article_pic = injection_replace_pic($_POST["third_choice_webpack_article_pic{$x}"]);
        $third_choice_webpack_article_pic = resize_image_M($third_choice_webpack_article_pic,58,43,$img_page_main,'');
        $third_choice_webpack_article_avatar7 = injection_replace($_POST["third_choice_webpack_article_avatar7{$x}"][0]);
        if ($third_choice_webpack_article_avatar7 > "") {
            $third_choice_webpack_article_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_webpack_article_avatar7;
            $third_choice_webpack_article_pic = resize_image_M($third_choice_webpack_article_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_webpack_article_title > "") {
            insert_templdate($site, $third_choice_webpack_article_pic_adress, $la, $third_choice_webpack_article_text, $third_choice_webpack_article_title, $third_choice_webpack_article_link, $third_choice_webpack_article_pic, "third_choice_webpack_article$x", 'coms2', $coms_conect);
        }
    }

    //   Light box
    $webpack_title_LightBox_pic_adress = 0;
    $webpack_title_LightBox_pic_adress= injection_replace($_POST["webpack_title_LightBox_pic_adress"]);
    $webpack_title_LightBox_title= injection_replace($_POST["webpack_title_LightBox_title"]);
    insert_templdate($site, $webpack_title_LightBox_pic_adress, $la, '', $webpack_title_LightBox_title, '', '', "webpack_title_LightBox", 'coms2', $coms_conect);

    $ValSelectActive_webpack_LightBox_title = injection_replace($_POST["ValSelectActive_webpack_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_webpack_LightBox_title, '', '', "ValSelectActive_webpack_LightBox", 'coms2', $coms_conect);

    $condition_first_choice_webpack_LightBox = "name like 'first_choice_webpack_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_webpack_LightBox, $coms_conect);
    $first_choice_webpack_LightBox_count = injection_replace_pic($_POST["first_choice_webpack_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_webpack_LightBox_count; $i++) {

        $first_choice_webpack_LightBox_cat = injection_replace_pic($_POST["first_choice_webpack_LightBox_cat{$i}"]);
        $first_choice_webpack_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_webpack_LightBox_subcat_cat{$i}"]);
        $first_choice_webpack_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_webpack_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_webpack_LightBox_number = injection_replace_pic($_POST["first_choice_webpack_LightBox_number{$i}"]);
        if ($first_choice_webpack_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_webpack_LightBox_number, $la, $first_choice_webpack_LightBox_Fixed_selection_cat, '', $first_choice_webpack_LightBox_cat, $first_choice_webpack_LightBox_subcat_cat, "first_choice_webpack_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_webpack_LightBox = "name like 'second_choice_webpack_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_webpack_LightBox, $coms_conect);
    $second_choice_webpack_LightBox_count = injection_replace_pic($_POST["second_choice_webpack_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_webpack_LightBox_count; $i++) {

        $second_choice_webpack_LightBox_cat = injection_replace_pic($_POST["second_choice_webpack_LightBox_cat{$i}"]);
        $second_choice_webpack_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_webpack_LightBox_subcat_cat{$i}"]);
        $second_choice_webpack_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_webpack_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_webpack_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_webpack_LightBox_subcat_cat_content, $la, '', '', $second_choice_webpack_LightBox_cat, $second_choice_webpack_LightBox_subcat_cat, "second_choice_webpack_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_webpack_LightBox = "name like 'third_choice_webpack_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_webpack_LightBox, $coms_conect);
    $third_choice_webpack_LightBox_count = injection_replace_pic($_POST["third_choice_webpack_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_webpack_LightBox_count; $x++) {

        $third_choice_webpack_LightBox_title = injection_replace_pic($_POST["third_choice_webpack_LightBox_title{$x}"]);
        $third_choice_webpack_LightBox_text = injection_replace_pic($_POST["third_choice_webpack_LightBox_text{$x}"]);
        $third_choice_webpack_LightBox_link = injection_replace_pic($_POST["third_choice_webpack_LightBox_link{$x}"]);
        $third_choice_webpack_LightBox_pic = injection_replace_pic($_POST["third_choice_webpack_LightBox_pic{$x}"]);
        $third_choice_webpack_LightBox_pic =resize_image_M($third_choice_webpack_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_webpack_LightBox_avatar7 = injection_replace($_POST["third_choice_webpack_LightBox_avatar7{$x}"][0]);
        if ($third_choice_webpack_LightBox_avatar7 > "") {
            $third_choice_webpack_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_webpack_LightBox_avatar7;
            $third_choice_webpack_LightBox_pic =resize_image_M($third_choice_webpack_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_webpack_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_webpack_LightBox_text, $third_choice_webpack_LightBox_title, $third_choice_webpack_LightBox_link, $third_choice_webpack_LightBox_pic, "third_choice_webpack_LightBox$x", 'coms2', $coms_conect);
        }
    }
//  header_seo
    $webpack_header_seo_keyword= injection_replace($_POST["webpack_header_seo_keyword"]);
    $webpack_header_seo_desciption= injection_replace($_POST["webpack_header_seo_desciption"]);
    $webpack_header_seo_pic= injection_replace($_POST["webpack_header_seo_pic"]);
    $webpack_header_seo_pic_adress = injection_replace($_POST["webpack_header_seo_pic_adress"]);
    $webpack_header_seo_pic_adress = resize_image_M($webpack_header_seo_pic_adress,20,20,$img_page_main,'');
    $webpack_header_seo_pic_adress_avatar_orak = injection_replace($_POST["webpack_header_seo_pic_adress_avatar_orak"][0]);
    if($webpack_header_seo_pic_adress_avatar_orak>""){
        $webpack_header_seo_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $webpack_header_seo_pic_adress_avatar_orak;
        $webpack_header_seo_pic_adress = resize_image_M($webpack_header_seo_pic_adress,20,20,$img_page_main,'');

    }
    insert_templdate($site, $webpack_header_seo_pic_adress, $la, $webpack_header_seo_desciption, $webpack_header_seo_keyword, '', $webpack_header_seo_pic, "webpack_header_seo", 'coms2', $coms_conect);

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
                                        <a class="z-link">webpack</a>
                                    </li>
                                    <li class="z-tab H_style_header " data-link="tab2">
                                        <a class="z-link">HTML</a>
                                    </li>
                                    <li class="z-tab H_style_header " data-link="tab3">
                                        <a class="z-link">Css</a>
                                    </li>
                                    <li class="z-tab H_style_header " data-link="tab4">
                                        <a class="z-link">Jquery</a>
                                    </li>
                                    <li class="z-tab H_style_header " data-link="tab5">
                                        <a class="z-link">PHP</a>
                                    </li>
                                    <li class="z-tab H_style_header " data-link="tab6">
                                        <a class="z-link">Laravel</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------webpack---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $webpack_box1 = get_tem_result($site, $la, "webpack_box1", 'coms2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_webpack_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $webpack_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_box1 H_dis_none"
                                                               name="webpack_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $webpack_box2 = get_tem_result($site, $la, "webpack_box2", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_box2 H_dis_none"
                                                               name="webpack_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box3 = get_tem_result($site, $la, "webpack_title_box3", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box3 H_dis_none"
                                                               name="webpack_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box4 = get_tem_result($site, $la, "webpack_title_box4", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box4 H_dis_none"
                                                               name="webpack_title_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $webpack_title_box5 = get_tem_result($site, $la, "webpack_title_box5", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box5 H_dis_none"
                                                               name="webpack_title_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box6 = get_tem_result($site, $la, "webpack_title_box6", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box6" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box6 H_dis_none"
                                                               name="webpack_title_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box7 = get_tem_result($site, $la, "webpack_title_box7", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box7" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box7['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box7 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box7_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box7 H_dis_none"
                                                               name="webpack_title_box7_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box8 = get_tem_result($site, $la, "webpack_title_box8", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box8" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box8['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box8 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box8_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box8 H_dis_none"
                                                               name="webpack_title_box8_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box9 = get_tem_result($site, $la, "webpack_title_box9", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box9" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box9['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box9 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box9_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box9 H_dis_none"
                                                               name="webpack_title_box9_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box10 = get_tem_result($site, $la, "webpack_title_box10", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box10" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box10['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box10 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box10_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box10 H_dis_none"
                                                               name="webpack_title_box10_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box11 = get_tem_result($site, $la, "webpack_title_box11", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box11" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box11['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box11 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box11_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box11 H_dis_none"
                                                               name="webpack_title_box11_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box12 = get_tem_result($site, $la, "webpack_title_box12", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box12" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box12['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box12 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box12_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box12 H_dis_none"
                                                               name="webpack_title_box12_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $webpack_title_box13 = get_tem_result($site, $la, "webpack_title_box13", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_webpack_title_box13" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $webpack_title_box13['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_webpack_title_box13 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_webpack_title_box13_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_webpack_title_box13 H_dis_none"
                                                               name="webpack_title_box13_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $webpack_boxOne = get_tem_result($site, $la, "webpack_boxOne", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_boxOne_pic_adress"
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
                                                                            $webpack_content_BoxOne = get_tem_result($site, $la, "webpack_content_BoxOne", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choicedel_webpack_content_BoxOne"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <div class="col-md-4 input-group">
                                                                                            <input type="text"
                                                                                                   id="webpack_content_BoxOne_pic"
                                                                                                   value="<?= $webpack_content_BoxOne["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه اول"
                                                                                                   name="webpack_content_BoxOne_pic">
                                                                                        </div>
                                                                                        <div class="col-md-4 input-group">
                                                                                            <input type="text"
                                                                                                   id="webpack_content_BoxOne_pic_adress"
                                                                                                   value="<?= $webpack_content_BoxOne["pic_adress"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" لینک دکمه اول"
                                                                                                   name="webpack_content_BoxOne_pic_adress">
                                                                                        </div>
                                                                                        <div class="col-md-4 input-group">
                                                                                            <input type="text"
                                                                                                   id="webpack_content_BoxOne_title"
                                                                                                   value="<?= $webpack_content_BoxOne["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه دوم"
                                                                                                   name="webpack_content_BoxOne_title">
                                                                                        </div>
                                                                                    </div>
                                                                                    <?
                                                                                    $webpack_btnn_BoxOne = get_tem_result($site, $la, "webpack_btnn_BoxOne", 'coms2', $coms_conect);
                                                                                    ?>
                                                                                        <div class="col-md-12 input-group H_pl32">
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text" class="form-control"  placeholder="عنوان دکمه سوم" name="webpack_btnn_BoxOne_pic"
                                                                                                       value="<?= $webpack_btnn_BoxOne['pic'] ?>" style="direction: rtl;">
                                                                                            </div>
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text" class="form-control"  placeholder="لینک دکمه سوم" name="webpack_btnn_BoxOne_link"
                                                                                                       value="<?= $webpack_btnn_BoxOne['link'] ?>" style="direction: rtl;">
                                                                                            </div>
                                                                                        </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="webpack_content_BoxOne_text"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="webpack_content_BoxOne_text"><?= $webpack_content_BoxOne["text"] ?>
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
                                                                        <? $count_webpack_slide_boxOne = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'webpack_slide_boxOne%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_webpack_slide_boxOne; $x++) {
                                                                            $webpack_slide_boxOne = get_tem_result($site, $la, "webpack_slide_boxOne$x", 'coms2', $coms_conect);
                                                                            if ($webpack_slide_boxOne['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_webpack_slide_boxOne<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_webpack_slide_boxOne"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="webpack_slide_boxOne_title<?= $x ?>"
                                                                                                       value="<?= $webpack_slide_boxOne["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="webpack_slide_boxOne_title<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="webpack_slide_boxOne_link<?= $x ?>"
                                                                                                       value="<?= $webpack_slide_boxOne["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان دوم"
                                                                                                       name="webpack_slide_boxOne_link<?= $x ?>">
                                                                                            </div>
                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="webpack_slide_boxOne_pic<?= $x ?>"
                                                                                                       value="<?=$webpack_slide_boxOne["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="webpack_slide_boxOne_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=webpack_slide_boxOne_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_webpack_slide_boxOne<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="webpack_slide_boxOne_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="webpack_slide_boxOne_avatar7_link<?= $x ?>"
                                                                                   name="webpack_slide_boxOne_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_webpack_slide_boxOne<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group col-md-1"
                                                                                                 id="image_show_webpack_slide_boxOne<?= $x ?>">
                                                                                                <a href="<?= $webpack_slide_boxOne["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $webpack_slide_boxOne["pic_adress"] ?>"
                                                                                                         alt="<?= $webpack_slide_boxOne["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#webpack_slide_boxOne_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#webpack_slide_boxOne_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                        <input type="hidden" id="webpack_slide_boxOne_count"
                                                                               name="webpack_slide_boxOne_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_webpack_slide_boxOne-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_webpack_slide_boxOne' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_webpack_slide_boxOne" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="webpack_slide_boxOne_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="webpack_slide_boxOne_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="webpack_slide_boxOne_link' + i + '" value="" class="form-control" placeholder="عنوان دوم" name="webpack_slide_boxOne_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="webpack_slide_boxOne_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="webpack_slide_boxOne_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=webpack_slide_boxOne_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_webpack_slide_boxOne' + i + '" style="padding: 0px;"><div  id="webpack_slide_boxOne_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="webpack_slide_boxOne_avatar7_link' + i + '" name="webpack_slide_boxOne_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_webpack_slide_boxOne' + i + '" style="float:right;"></div></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_webpack_slide_boxOne' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#webpack_slide_boxOne_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#webpack_slide_boxOne_avatar7' + i + '').orakuploader({
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

                                                                                    $('#webpack_slide_boxOne_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_webpack_slide_boxOne' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_webpack_slide_boxOne' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_webpack_slide_boxOne', function () {
                                                                                    var id = '';
                                                                                    var k = $('#webpack_slide_boxOne_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_webpack_slide_boxOne' + id).remove();
                                                                                    $('#webpack_slide_boxOne_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_webpack_slide_boxOne-ads"><i
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
                                                        <? $webpack_menubox_show = get_tem_result($site, $la, "webpack_menubox_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_menubox_show_pic_adress"
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
                                                                            <? $count_webpack_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'webpack_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_webpack_menubox_links; $k++) {
                                                                                $webpack_menubox_links = get_tem_result($site, $la, "webpack_menubox_links$k", 'coms2', $coms_conect);
                                                                                if ($webpack_menubox_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_webpack_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_webpack_menubox_links"
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
                                                                                                           id="webpack_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $webpack_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="webpack_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="webpack_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $webpack_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="webpack_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_webpack_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="webpack_menubox_links_count"
                                                                                   name="webpack_menubox_links_count"
                                                                                   value="<?= --$count_webpack_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_webpack_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_webpack_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_webpack_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="webpack_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="webpack_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="webpack_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="webpack_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_webpack_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#webpack_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_webpack_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#webpack_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_webpack_menubox_links' + id).remove();
                                                                                        $('#webpack_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_webpack_menubox_links"><i
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
                                                        <? $webpack_box_packs = get_tem_result($site, $la, "webpack_box_packs", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_box_packs['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_box_packs_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_box_packs_title"
                                                                           value="<?= $webpack_box_packs['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_box_packs_text"
                                                                           value="<?= $webpack_box_packs['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_box_packs_pic"
                                                                           value="<?= $webpack_box_packs['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_box_packs_link"
                                                                           value="<?= $webpack_box_packs['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                </div>
                                                <!-------------------box video------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $webpack_boxshow_video = get_tem_result($site, $la, "webpack_boxshow_video", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_boxshow_video['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_boxshow_video_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«انتخاب فقط ویدیو »</h5><br>
                                                        <div>
                                                            <div class="tab-pane opt_webpack_video_boxFour webpack_video_boxFour_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_webpack_video_boxFour = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_webpack_video_boxFour%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_webpack_video_boxFour; $j++) {
                                                                                    $second_choice_webpack_video_boxFour = get_tem_result($site, $la, "second_choice_webpack_video_boxFour$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_webpack_video_boxFour['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_webpack_video_boxFour<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_webpack_video_boxFour"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_webpack_video_boxFour col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_video_boxFour_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_webpack_video_boxFour_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_video_boxFour['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_video_boxFour_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_webpack_video_boxFour_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_video_boxFour['pic_adress'] ?>">

                                                                                                        <select id="second_choice_webpack_video_boxFour_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_webpack_video_boxFour_cat"
                                                                                                                name="second_choice_webpack_video_boxFour_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_webpack_video_boxFour['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_video_boxFour<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_video_boxFour_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_video_boxFour&id=" + $("#second_choice_webpack_video_boxFour_cat<?=$j?>").val() + "&value=" + $("#second_choice_webpack_video_boxFour_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_video_boxFour<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_webpack_video_boxFour_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_video_boxFour_content&id=" + $("#second_choice_webpack_video_boxFour_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_webpack_video_boxFour_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_webpack_video_boxFour_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_video_boxFour_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_webpack_video_boxFour_count"
                                                                                       name="second_choice_webpack_video_boxFour_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_webpack_video_boxFour_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_webpack_video_boxFour').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_video_boxFour&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_webpack_video_boxFour<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_webpack_video_boxFour_neshane").change(function () {
                                                                                        var j = $("#second_choice_webpack_video_boxFour_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_video_boxFour&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_video_boxFour' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_webpack_video_boxFour_neshane', function () {
                                                                                        var j = $("#second_choice_webpack_video_boxFour_count").val();
                                                                                        //  $(".second_choice_webpack_video_boxFour_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_video_boxFour_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_video_boxFour_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_webpack_video_boxFour').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_webpack_video_boxFour' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_webpack_video_boxFour" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_webpack_video_boxFour col-md-3 input-group"><input type="hidden" id="second_choice_webpack_video_boxFour_subcat_val' + i + '"  name="second_choice_webpack_video_boxFour_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_webpack_video_boxFour_subcat_link' + i + '"  name="second_choice_webpack_video_boxFour_subcat_link' + i + '" value=""> <select id="second_choice_webpack_video_boxFour_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_webpack_video_boxFour_cat" name="second_choice_webpack_video_boxFour_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_webpack_video_boxFour' + i + '" class="col-md-3 input-group"></div><div id="second_choice_webpack_video_boxFour_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_video_boxFour' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_webpack_video_boxFour_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_webpack_video_boxFour', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_webpack_video_boxFour_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_video_boxFour' + id).remove();
                                                                                            $('#second_choice_webpack_video_boxFour_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_webpack_video_boxFour"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </div>

                                                <!-------------------box5------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $webpack_boxTwo = get_tem_result($site, $la, "webpack_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxTwo_title"
                                                                           value="<?= $webpack_boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxTwo_text"
                                                                           value="<?= $webpack_boxTwo['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxTwo_pic"
                                                                           value="<?= $webpack_boxTwo['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxTwo_link"
                                                                           value="<?= $webpack_boxTwo['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <? $ValSelectActive_webpack_boxTwo = get_tem_result($site, $la, "ValSelectActive_webpack_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_webpack_boxTwo"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_webpack_boxTwo"
                                                                    name="select_type_webpack_boxTwo">

                                                                <option <? if ($ValSelectActive_webpack_boxTwo["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_boxTwo["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_boxTwo["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_webpack_boxTwo_title" type="hidden"
                                                                   value="<?= $ValSelectActive_webpack_boxTwo["title"] ?>">

                                                            <div class="tab-pane opt_webpack_boxTwo webpack_boxTwo_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_webpack_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_webpack_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_webpack_boxTwo; $j++) {
                                                                                    $first_choice_webpack_boxTwo = get_tem_result($site, $la, "first_choice_webpack_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_webpack_boxTwo['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_webpack_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_webpack_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_webpack_boxTwo col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_webpack_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_webpack_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_boxTwo['pic'] ?>">

                                                                                                        <select id="first_choice_webpack_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_webpack_boxTwo_cat"
                                                                                                                name="first_choice_webpack_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_webpack_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_webpack_boxTwo<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_webpack_boxTwo_new&id=" + $("#first_choice_webpack_boxTwo_cat<?=$j?>").val() + "&value=" + $("#first_choice_webpack_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_webpack_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_webpack_boxTwo_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_webpack_boxTwo_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_boxTwo['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_boxTwo['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_boxTwo['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_webpack_boxTwo_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_boxTwo["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_webpack_boxTwo_number<?= $j ?>">
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
                                                                                       id="first_choice_webpack_boxTwo_count"
                                                                                       name="first_choice_webpack_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_webpack_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_webpack_boxTwo').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_webpack_boxTwo_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_webpack_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_webpack_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_webpack_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_webpack_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_webpack_boxTwo col-md-4 input-group"><input type="hidden" id="first_choice_webpack_boxTwo_subcat_val' + i + '"  name="first_choice_webpack_boxTwo_subcat_val' + i + '" value=""> <select id="first_choice_webpack_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_webpack_boxTwo_cat" name="first_choice_webpack_boxTwo_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_webpack_boxTwo' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_webpack_boxTwo_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_webpack_boxTwo_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_webpack_boxTwo_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_webpack_boxTwo_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_webpack_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_webpack_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_webpack_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_boxTwo' + id).remove();
                                                                                            $('#first_choice_webpack_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_webpack_boxTwo"><i
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

                                                            <div class="tab-pane opt_webpack_boxTwo webpack_boxTwo_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_webpack_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_webpack_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_webpack_boxTwo; $j++) {
                                                                                    $second_choice_webpack_boxTwo = get_tem_result($site, $la, "second_choice_webpack_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_webpack_boxTwo['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_webpack_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_webpack_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_webpack_boxTwo col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_webpack_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_boxTwo['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_boxTwo_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_webpack_boxTwo_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_boxTwo['pic_adress'] ?>">

                                                                                                        <select id="second_choice_webpack_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_webpack_boxTwo_cat"
                                                                                                                name="second_choice_webpack_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_webpack_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_boxTwo<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_boxTwo_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_boxTwo&id=" + $("#second_choice_webpack_boxTwo_cat<?=$j?>").val() + "&value=" + $("#second_choice_webpack_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_webpack_boxTwo_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_boxTwo_content&id=" + $("#second_choice_webpack_boxTwo_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_webpack_boxTwo_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_webpack_boxTwo_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_boxTwo_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_webpack_boxTwo_count"
                                                                                       name="second_choice_webpack_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_webpack_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_webpack_boxTwo').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_webpack_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_webpack_boxTwo_neshane").change(function () {
                                                                                        var j = $("#second_choice_webpack_boxTwo_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_boxTwo' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_webpack_boxTwo_neshane', function () {
                                                                                        var j = $("#second_choice_webpack_boxTwo_count").val();
                                                                                        //  $(".second_choice_webpack_boxTwo_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_boxTwo_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_boxTwo_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_webpack_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_webpack_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_webpack_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_webpack_boxTwo col-md-3 input-group"><input type="hidden" id="second_choice_webpack_boxTwo_subcat_val' + i + '"  name="second_choice_webpack_boxTwo_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_webpack_boxTwo_subcat_link' + i + '"  name="second_choice_webpack_boxTwo_subcat_link' + i + '" value=""> <select id="second_choice_webpack_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_webpack_boxTwo_cat" name="second_choice_webpack_boxTwo_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_webpack_boxTwo' + i + '" class="col-md-3 input-group"></div><div id="second_choice_webpack_boxTwo_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_webpack_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_webpack_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_webpack_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_boxTwo' + id).remove();
                                                                                            $('#second_choice_webpack_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_webpack_boxTwo"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_webpack_boxTwo webpack_boxTwo_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_webpack_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_webpack_boxTwo%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_webpack_boxTwo; $x++) {
                                                                                    $third_choice_webpack_boxTwo = get_tem_result($site, $la, "third_choice_webpack_boxTwo$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_webpack_boxTwo['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_webpack_boxTwo<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_webpack_boxTwo"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_boxTwo_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_boxTwo["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_webpack_boxTwo_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_boxTwo_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_boxTwo["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_webpack_boxTwo_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_boxTwo_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_webpack_boxTwo["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_webpack_boxTwo_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_boxTwo_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_webpack_boxTwo<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_webpack_boxTwo_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_webpack_boxTwo_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_webpack_boxTwo_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_webpack_boxTwo<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_webpack_boxTwo["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_webpack_boxTwo<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_webpack_boxTwo["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_webpack_boxTwo["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_webpack_boxTwo["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_webpack_boxTwo_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_webpack_boxTwo_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_webpack_boxTwo_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_webpack_boxTwo['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_webpack_boxTwo_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_webpack_boxTwo_text<?= $x ?>"><?= $third_choice_webpack_boxTwo["text"] ?>

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
                                                                                       id="third_choice_webpack_boxTwo_count"
                                                                                       name="third_choice_webpack_boxTwo_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_webpack_boxTwo-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_webpack_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_webpack_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_webpack_boxTwo_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_webpack_boxTwo_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_webpack_boxTwo_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_webpack_boxTwo_link' + i + '" ></div><div class="col-md-3 input-group"> <input type="text" id="third_choice_webpack_boxTwo_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_webpack_boxTwo_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_boxTwo_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_webpack_boxTwo' + i + '" style="padding: 0px;"><div  id="third_choice_webpack_boxTwo_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_webpack_boxTwo_avatar7_link' + i + '" name="third_choice_webpack_boxTwo_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_webpack_boxTwo' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_webpack_boxTwo_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_webpack_boxTwo_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_webpack_boxTwo_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_webpack_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_webpack_boxTwo_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_webpack_boxTwo_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_webpack_boxTwo_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_webpack_boxTwo' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_webpack_boxTwo' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_webpack_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_webpack_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_webpack_boxTwo' + id).remove();
                                                                                            $('#third_choice_webpack_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_webpack_boxTwo-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_webpack_boxTwo_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_webpack_boxTwo"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_webpack_boxTwo_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_webpack_boxTwo').hide();
                                                                        $('.webpack_boxTwo_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>


                                                    </center>
                                                </div>
                                                <!-----------------box gallery------------------->
                                                <div  id="content6" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $webpack_box_gallery = get_tem_result($site, $la, "webpack_box_gallery", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_box_gallery['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_box_gallery_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_box_gallery_title"
                                                                           value="<?= $webpack_box_gallery['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_box_gallery_text"
                                                                           value="<?= $webpack_box_gallery['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_box_gallery_pic"
                                                                           value="<?= $webpack_box_gallery['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_box_gallery_link"
                                                                           value="<?= $webpack_box_gallery['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:5 »</h5><br>
                                                        <? $ValSelectActive_webpack_box_gallery = get_tem_result($site, $la, "ValSelectActive_webpack_box_gallery", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_webpack_box_gallery"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_webpack_box_gallery"
                                                                    name="select_type_webpack_box_gallery">

                                                                <option <? if ($ValSelectActive_webpack_box_gallery["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_box_gallery["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_box_gallery["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_webpack_box_gallery_title" type="hidden"
                                                                   value="<?= $ValSelectActive_webpack_box_gallery["title"] ?>">

                                                            <div class="tab-pane opt_webpack_box_gallery webpack_box_gallery_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_webpack_box_gallery = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_webpack_box_gallery%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_webpack_box_gallery; $j++) {
                                                                                    $first_choice_webpack_box_gallery = get_tem_result($site, $la, "first_choice_webpack_box_gallery$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_webpack_box_gallery['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_webpack_box_gallery<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_webpack_box_gallery"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_webpack_box_gallery col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_webpack_box_gallery_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_webpack_box_gallery_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_box_gallery['pic'] ?>">

                                                                                                        <select id="first_choice_webpack_box_gallery_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_webpack_box_gallery_cat"
                                                                                                                name="first_choice_webpack_box_gallery_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_webpack_box_gallery['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_webpack_box_gallery<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_webpack_box_gallery_new&id=" + $("#first_choice_webpack_box_gallery_cat<?=$j?>").val() + "&value=" + $("#first_choice_webpack_box_gallery_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_webpack_box_gallery<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_webpack_box_gallery_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_webpack_box_gallery_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_box_gallery['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_box_gallery['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_box_gallery['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_webpack_box_gallery_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_box_gallery["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_webpack_box_gallery_number<?= $j ?>">
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
                                                                                       id="first_choice_webpack_box_gallery_count"
                                                                                       name="first_choice_webpack_box_gallery_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_webpack_box_gallery_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_webpack_box_gallery').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_webpack_box_gallery_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_webpack_box_gallery<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_webpack_box_gallery').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_webpack_box_gallery' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_webpack_box_gallery" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_webpack_box_gallery col-md-4 input-group"><input type="hidden" id="first_choice_webpack_box_gallery_subcat_val' + i + '"  name="first_choice_webpack_box_gallery_subcat_val' + i + '" value=""> <select id="first_choice_webpack_box_gallery_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_webpack_box_gallery_cat" name="first_choice_webpack_box_gallery_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_webpack_box_gallery' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_webpack_box_gallery_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_webpack_box_gallery_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_webpack_box_gallery_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_webpack_box_gallery_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_box_gallery' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_webpack_box_gallery_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_webpack_box_gallery', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_webpack_box_gallery_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_box_gallery' + id).remove();
                                                                                            $('#first_choice_webpack_box_gallery_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_webpack_box_gallery"><i
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

                                                            <div class="tab-pane opt_webpack_box_gallery webpack_box_gallery_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_webpack_box_gallery = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_webpack_box_gallery%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_webpack_box_gallery; $j++) {
                                                                                    $second_choice_webpack_box_gallery = get_tem_result($site, $la, "second_choice_webpack_box_gallery$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_webpack_box_gallery['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_webpack_box_gallery<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_webpack_box_gallery"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_webpack_box_gallery col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_box_gallery_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_webpack_box_gallery_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_box_gallery['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_box_gallery_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_webpack_box_gallery_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_box_gallery['pic_adress'] ?>">

                                                                                                        <select id="second_choice_webpack_box_gallery_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_webpack_box_gallery_cat"
                                                                                                                name="second_choice_webpack_box_gallery_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_webpack_box_gallery['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_box_gallery<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_box_gallery_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_box_gallery&id=" + $("#second_choice_webpack_box_gallery_cat<?=$j?>").val() + "&value=" + $("#second_choice_webpack_box_gallery_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_box_gallery<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_webpack_box_gallery_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_box_gallery_content&id=" + $("#second_choice_webpack_box_gallery_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_webpack_box_gallery_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_webpack_box_gallery_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_box_gallery_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_webpack_box_gallery_count"
                                                                                       name="second_choice_webpack_box_gallery_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_webpack_box_gallery_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_webpack_box_gallery').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_box_gallery&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_webpack_box_gallery<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_webpack_box_gallery_neshane").change(function () {
                                                                                        var j = $("#second_choice_webpack_box_gallery_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_box_gallery&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_box_gallery' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_webpack_box_gallery_neshane', function () {
                                                                                        var j = $("#second_choice_webpack_box_gallery_count").val();
                                                                                        //  $(".second_choice_webpack_box_gallery_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_box_gallery_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_box_gallery_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_webpack_box_gallery').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_webpack_box_gallery' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_webpack_box_gallery" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_webpack_box_gallery col-md-3 input-group"><input type="hidden" id="second_choice_webpack_box_gallery_subcat_val' + i + '"  name="second_choice_webpack_box_gallery_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_webpack_box_gallery_subcat_link' + i + '"  name="second_choice_webpack_box_gallery_subcat_link' + i + '" value=""> <select id="second_choice_webpack_box_gallery_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_webpack_box_gallery_cat" name="second_choice_webpack_box_gallery_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_webpack_box_gallery' + i + '" class="col-md-3 input-group"></div><div id="second_choice_webpack_box_gallery_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_box_gallery' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_webpack_box_gallery_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_webpack_box_gallery', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_webpack_box_gallery_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_box_gallery' + id).remove();
                                                                                            $('#second_choice_webpack_box_gallery_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_webpack_box_gallery"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_webpack_box_gallery webpack_box_gallery_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_webpack_box_gallery = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_webpack_box_gallery%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_webpack_box_gallery; $x++) {
                                                                                    $third_choice_webpack_box_gallery = get_tem_result($site, $la, "third_choice_webpack_box_gallery$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_webpack_box_gallery['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_webpack_box_gallery<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_webpack_box_gallery"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_box_gallery_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_box_gallery["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_webpack_box_gallery_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_box_gallery_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_box_gallery["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_webpack_box_gallery_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_box_gallery_pic<?= $x ?>"
                                                                                                               <?if ($x==1){?>
                                                                                                               value="<?=$third_choice_webpack_box_gallery["pic"]?>"
                                                                                                               <?}else{?>
                                                                                                                value="<?=$third_choice_webpack_box_gallery["pic"]?>"
                                                                                                               <?}?>
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_webpack_box_gallery_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_box_gallery_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_webpack_box_gallery<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_webpack_box_gallery_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_webpack_box_gallery_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_webpack_box_gallery_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_webpack_box_gallery<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_webpack_box_gallery["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_webpack_box_gallery<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_webpack_box_gallery["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_webpack_box_gallery["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_webpack_box_gallery["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_webpack_box_gallery_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_webpack_box_gallery_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                                <input type="hidden"
                                                                                       id="third_choice_webpack_box_gallery_count"
                                                                                       name="third_choice_webpack_box_gallery_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_webpack_box_gallery-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_webpack_box_gallery' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_webpack_box_gallery" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_webpack_box_gallery_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_webpack_box_gallery_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_webpack_box_gallery_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_webpack_box_gallery_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="third_choice_webpack_box_gallery_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_webpack_box_gallery_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_box_gallery_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_webpack_box_gallery' + i + '" style="padding: 0px;"><div  id="third_choice_webpack_box_gallery_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_webpack_box_gallery_avatar7_link' + i + '" name="third_choice_webpack_box_gallery_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_webpack_box_gallery' + i + '" style="float:right;"></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_webpack_box_gallery' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_webpack_box_gallery_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_webpack_box_gallery_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_webpack_box_gallery_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_webpack_box_gallery' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_webpack_box_gallery' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_webpack_box_gallery', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_webpack_box_gallery_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_webpack_box_gallery' + id).remove();
                                                                                            $('#third_choice_webpack_box_gallery_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_webpack_box_gallery-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_webpack_box_gallery_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_webpack_box_gallery"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_webpack_box_gallery_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_webpack_box_gallery').hide();
                                                                        $('.webpack_box_gallery_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------box6------------------->
                                                <div  id="content7" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $webpack_boxThree = get_tem_result($site, $la, "webpack_boxThree", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_boxThree['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_boxThree_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxThree_title"
                                                                           value="<?= $webpack_boxThree['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxThree_text"
                                                                           value="<?= $webpack_boxThree['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxThree_pic"
                                                                           value="<?= $webpack_boxThree['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $webpack_show_faq_que = get_tem_result($site, $la, "webpack_show_faq_que", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «سوالات متداول» </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_show_faq_que['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_show_faq_que_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_webpack_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type='100' and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_faq_text' id='cat_faq_text' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $webpack_show_faq_que['text'])
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
                                                                           type="checkbox" <? if ($webpack_show_faq_que['pic'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_show_faq_que_pic"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_webpack_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type=99 and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_qes_title' id='cat_qes_title' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $webpack_show_faq_que['title'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">

                                                        <? $webpack_pop_faq = get_tem_result($site, $la, "webpack_pop_faq", 'coms2', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اطلاعات داخل پاپاپ »</h5><br>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_pop_faq_title"
                                                                           value="<?= $webpack_pop_faq['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_pop_faq_text"
                                                                           value="<?= $webpack_pop_faq['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان سمت چپ</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_pop_faq_pic"
                                                                           value="<?= $webpack_pop_faq['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن شعار</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_pop_faq_link"
                                                                           value="<?= $webpack_pop_faq['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_pop_faq_pic_adress"
                                                                           value="<?= $webpack_pop_faq['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_show_faq_que_link"
                                                                           value="<?= $webpack_show_faq_que['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="webpack_boxThree_link"
                                                                               value="<?=$webpack_boxThree['link']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="webpack_boxThree_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=webpack_boxThree_link"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="webpack_boxThree_link_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_webpack_boxThree_link"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_webpack_boxThree_link">
                                                                        <a href="<?= $webpack_boxThree["link"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $webpack_boxThree["link"] ?>" alt="<?= $webpack_boxThree["link"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#webpack_boxThree_link_avatar_orak').orakuploader({
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

                                                                            $('#webpack_boxThree_link_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------box7------------------->
                                                <div  id="content8" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $webpack_boxSix = get_tem_result($site, $la, "webpack_boxSix", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_boxSix['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_boxSix_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxSix_title"
                                                                           value="<?= $webpack_boxSix['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxSix_text"
                                                                           value="<?= $webpack_boxSix['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:4 »</h5><br>
                                                        <? $ValSelectActive_webpack_boxSix = get_tem_result($site, $la, "ValSelectActive_webpack_boxSix", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_webpack_boxSix"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_webpack_boxSix"
                                                                    name="select_type_webpack_boxSix">

                                                                <option <? if ($ValSelectActive_webpack_boxSix["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_boxSix["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_boxSix["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_webpack_boxSix_title" type="hidden"
                                                                   value="<?= $ValSelectActive_webpack_boxSix["title"] ?>">

                                                            <div class="tab-pane opt_webpack_boxSix webpack_boxSix_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_webpack_boxSix = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_webpack_boxSix%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_webpack_boxSix; $j++) {
                                                                                    $first_choice_webpack_boxSix = get_tem_result($site, $la, "first_choice_webpack_boxSix$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_webpack_boxSix['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_webpack_boxSix<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_webpack_boxSix"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_webpack_boxSix col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_webpack_boxSix_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_webpack_boxSix_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_boxSix['pic'] ?>">

                                                                                                        <select id="first_choice_webpack_boxSix_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_webpack_boxSix_cat"
                                                                                                                name="first_choice_webpack_boxSix_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_webpack_boxSix['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_webpack_boxSix<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_webpack_boxSix_new&id=" + $("#first_choice_webpack_boxSix_cat<?=$j?>").val() + "&value=" + $("#first_choice_webpack_boxSix_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_webpack_boxSix<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_webpack_boxSix_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_webpack_boxSix_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_boxSix['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_boxSix['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_boxSix['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_webpack_boxSix_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_boxSix["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_webpack_boxSix_number<?= $j ?>">
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
                                                                                       id="first_choice_webpack_boxSix_count"
                                                                                       name="first_choice_webpack_boxSix_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_webpack_boxSix_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_webpack_boxSix').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_webpack_boxSix_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_webpack_boxSix<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_webpack_boxSix').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_webpack_boxSix' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_webpack_boxSix" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_webpack_boxSix col-md-4 input-group"><input type="hidden" id="first_choice_webpack_boxSix_subcat_val' + i + '"  name="first_choice_webpack_boxSix_subcat_val' + i + '" value=""> <select id="first_choice_webpack_boxSix_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_webpack_boxSix_cat" name="first_choice_webpack_boxSix_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_webpack_boxSix' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_webpack_boxSix_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_webpack_boxSix_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_webpack_boxSix_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_webpack_boxSix_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_boxSix' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_webpack_boxSix_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_webpack_boxSix', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_webpack_boxSix_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_boxSix' + id).remove();
                                                                                            $('#first_choice_webpack_boxSix_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_webpack_boxSix"><i
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

                                                            <div class="tab-pane opt_webpack_boxSix webpack_boxSix_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_webpack_boxSix = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_webpack_boxSix%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_webpack_boxSix; $j++) {
                                                                                    $second_choice_webpack_boxSix = get_tem_result($site, $la, "second_choice_webpack_boxSix$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_webpack_boxSix['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_webpack_boxSix<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_webpack_boxSix"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_webpack_boxSix col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_boxSix_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_webpack_boxSix_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_boxSix['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_boxSix_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_webpack_boxSix_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_boxSix['pic_adress'] ?>">

                                                                                                        <select id="second_choice_webpack_boxSix_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_webpack_boxSix_cat"
                                                                                                                name="second_choice_webpack_boxSix_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_webpack_boxSix['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_boxSix<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_boxSix_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_boxSix&id=" + $("#second_choice_webpack_boxSix_cat<?=$j?>").val() + "&value=" + $("#second_choice_webpack_boxSix_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_boxSix<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_webpack_boxSix_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_boxSix_content&id=" + $("#second_choice_webpack_boxSix_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_webpack_boxSix_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_webpack_boxSix_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_boxSix_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_webpack_boxSix_count"
                                                                                       name="second_choice_webpack_boxSix_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_webpack_boxSix_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_webpack_boxSix').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_boxSix&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_webpack_boxSix<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_webpack_boxSix_neshane").change(function () {
                                                                                        var j = $("#second_choice_webpack_boxSix_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_boxSix&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_boxSix' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_webpack_boxSix_neshane', function () {
                                                                                        var j = $("#second_choice_webpack_boxSix_count").val();
                                                                                        //  $(".second_choice_webpack_boxSix_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_boxSix_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_boxSix_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_webpack_boxSix').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_webpack_boxSix' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_webpack_boxSix" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_webpack_boxSix col-md-3 input-group"><input type="hidden" id="second_choice_webpack_boxSix_subcat_val' + i + '"  name="second_choice_webpack_boxSix_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_webpack_boxSix_subcat_link' + i + '"  name="second_choice_webpack_boxSix_subcat_link' + i + '" value=""> <select id="second_choice_webpack_boxSix_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_webpack_boxSix_cat" name="second_choice_webpack_boxSix_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_webpack_boxSix' + i + '" class="col-md-3 input-group"></div><div id="second_choice_webpack_boxSix_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_boxSix' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_webpack_boxSix_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_webpack_boxSix', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_webpack_boxSix_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_boxSix' + id).remove();
                                                                                            $('#second_choice_webpack_boxSix_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_webpack_boxSix"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_webpack_boxSix webpack_boxSix_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_webpack_boxSix = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_webpack_boxSix%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_webpack_boxSix; $x++) {
                                                                                    $third_choice_webpack_boxSix = get_tem_result($site, $la, "third_choice_webpack_boxSix$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_webpack_boxSix['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_webpack_boxSix<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_webpack_boxSix"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_boxSix_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_boxSix["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_webpack_boxSix_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_boxSix_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_boxSix["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_webpack_boxSix_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_boxSix_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_webpack_boxSix["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_webpack_boxSix_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_boxSix_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_webpack_boxSix<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_webpack_boxSix_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_webpack_boxSix_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_webpack_boxSix_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_webpack_boxSix<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_webpack_boxSix["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_webpack_boxSix<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_webpack_boxSix["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_webpack_boxSix["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_webpack_boxSix["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_webpack_boxSix_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_webpack_boxSix_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                   <div class="col-md-6 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_boxSix_pic_adress<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_boxSix["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="جمله"
                                                                                                               name="third_choice_webpack_boxSix_pic_adress<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-6 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_boxSix_text<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_boxSix["text"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="کلمه ویژه یا قیمت"
                                                                                                               name="third_choice_webpack_boxSix_text<?= $x ?>">
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
                                                                                       id="third_choice_webpack_boxSix_count"
                                                                                       name="third_choice_webpack_boxSix_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_webpack_boxSix-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_webpack_boxSix' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_webpack_boxSix" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_webpack_boxSix_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_webpack_boxSix_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_webpack_boxSix_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_webpack_boxSix_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="third_choice_webpack_boxSix_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_webpack_boxSix_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_boxSix_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_webpack_boxSix' + i + '" style="padding: 0px;"><div  id="third_choice_webpack_boxSix_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_webpack_boxSix_avatar7_link' + i + '" name="third_choice_webpack_boxSix_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_webpack_boxSix' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="third_choice_webpack_boxSix_pic_adress'+ i +'"  value=" " class="form-control" placeholder="جمله"  name="third_choice_webpack_boxSix_pic_adress' + i +'"></div><div class="col-md-6 input-group"><input type="text" id="third_choice_webpack_boxSix_text'+ i +'"  value=" " class="form-control" placeholder="کلمه ویژه یا قیمت"  name="third_choice_webpack_boxSix_text' + i +'"></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_webpack_boxSix' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_webpack_boxSix_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_webpack_boxSix_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_webpack_boxSix_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_webpack_boxSix' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_webpack_boxSix' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_webpack_boxSix', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_webpack_boxSix_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_webpack_boxSix' + id).remove();
                                                                                            $('#third_choice_webpack_boxSix_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_webpack_boxSix-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_webpack_boxSix_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_webpack_boxSix"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_webpack_boxSix_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_webpack_boxSix').hide();
                                                                        $('.webpack_boxSix_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------parallax------------------->
                                                <div  id="content9" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $webpack_boxParallax = get_tem_result($site, $la, "webpack_boxParallax", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_boxParallax['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_boxParallax_pic_adress"
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
                                                                                                                                                       id="webpack_boxParallax_pic"
                                                                                                                                                       value="<?=$webpack_boxParallax['pic']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="webpack_boxParallax_pic"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=webpack_boxParallax_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="webpack_boxParallax_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_webpack_boxParallax_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_webpack_boxParallax_pic">
                                                                        <a href="<?= $webpack_boxParallax["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $webpack_boxParallax["pic"] ?>" alt="<?= $webpack_boxParallax["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#webpack_boxParallax_pic_avatar_orak').orakuploader({
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

                                                                            $('#webpack_boxParallax_pic_avatar_orak').html("<?=$pic_str?>");
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
                                                                    <input type="text" class="form-control" name="webpack_boxParallax_title"
                                                                           value="<?= $webpack_boxParallax['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="webpack_boxParallax_link"
                                                                           value="<?= $webpack_boxParallax['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label class="col-md-3 control-label" for="family">متن</label>
                                                            <textarea type="text" id="webpack_boxParallax_text" class="form-group col-md-9 " placeholder="متن" name="webpack_boxParallax_text"><?= $webpack_boxParallax['text'] ?></textarea>
                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------degarKhadamat------------------->
                                                <div  id="content10" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $webpack_degarKhadamat = get_tem_result($site, $la, "webpack_degarKhadamat", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_degarKhadamat['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_degarKhadamat_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_degarKhadamat_title"
                                                                           value="<?= $webpack_degarKhadamat['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_degarKhadamat_text"
                                                                           value="<?= $webpack_degarKhadamat['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:7 »</h5><br>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_webpack_degarKhadamat_content = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'webpack_degarKhadamat_content%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count_webpack_degarKhadamat_content; $x++) {
                                                                            $webpack_degarKhadamat_content = get_tem_result($site, $la, "webpack_degarKhadamat_content$x", 'coms2', $coms_conect);
                                                                            if ($webpack_degarKhadamat_content['title'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choice_webpack_degarKhadamat_content<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_webpack_degarKhadamat_content"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="webpack_degarKhadamat_content_title<?= $x ?>"
                                                                                                       value="<?= $webpack_degarKhadamat_content["title"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان اول"
                                                                                                       name="webpack_degarKhadamat_content_title<?= $x ?>">
                                                                                            </div>


                                                                                            <div class="col-md-3 input-group">
                                                                                                <input type="text"
                                                                                                       id="webpack_degarKhadamat_content_link<?= $x ?>"
                                                                                                       value="<?= $webpack_degarKhadamat_content["link"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="لینک"
                                                                                                       name="webpack_degarKhadamat_content_link<?= $x ?>">
                                                                                            </div>

                                                                                            <div class="col-md-5 input-group">
                                                                                                <input type="text"
                                                                                                       id="webpack_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       value="<?=$webpack_degarKhadamat_content["pic_adress"]?>"
                                                                                                       class="form-control"
                                                                                                       placeholder=" تصویر"
                                                                                                       name="webpack_degarKhadamat_content_pic<?= $x ?>"
                                                                                                       style="direction: ltr;">
                                                                                                <span class="input-group-addon"
                                                                                                      style="padding: 0px;"><a
                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=webpack_degarKhadamat_content_pic<?= $x ?>"
                                                                                                            class="btn btn-success iframe-btn"
                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                <span class="input-group-addon H_neshane1 H_webpack_degarKhadamat_content<?= $x ?>"
                                                                                                      style="padding: 0px;">
                                                                                <div id="webpack_degarKhadamat_content_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="webpack_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   name="webpack_degarKhadamat_content_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                            </div>
                                                                                            <div class="ui-sortable red box"
                                                                                                 id="upload_type_webpack_degarKhadamat_content<?= $x ?>"
                                                                                                 style="float:right;">
                                                                                            </div>
                                                                                            <div class="input-group col-md-1"
                                                                                                 id="image_show_webpack_degarKhadamat_content<?= $x ?>">
                                                                                                <a href="<?= $webpack_degarKhadamat_content["pic_adress"] ?>"
                                                                                                   class=" without-caption">
                                                                                                    <img width="33"
                                                                                                         height="33"
                                                                                                         class="H_cursor_zoom"
                                                                                                         src="<?= $webpack_degarKhadamat_content["pic_adress"] ?>"
                                                                                                         alt="<?= $webpack_degarKhadamat_content["text"] ?>">
                                                                                                </a>

                                                                                            </div>

                                                                                            <script type="text/javascript">
                                                                                                $(document).ready(function () {
                                                                                                    $('#webpack_degarKhadamat_content_avatar7<?=$x?>').orakuploader({
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

                                                                                                    $('#webpack_degarKhadamat_content_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                });
                                                                                            </script>
                                                                                        </div>
                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                <textarea type="text"
                                                                          id="webpack_degarKhadamat_content_text<?= $x ?>"
                                                                          class="form-control"
                                                                          placeholder="عنوان دوم"
                                                                          name="webpack_degarKhadamat_content_text<?= $x ?>"><?= $webpack_degarKhadamat_content["text"] ?>

                                                                </textarea>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="webpack_degarKhadamat_content_count"
                                                                               name="webpack_degarKhadamat_content_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_webpack_degarKhadamat_content-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choice_webpack_degarKhadamat_content' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_webpack_degarKhadamat_content" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="webpack_degarKhadamat_content_title' + i + '" value="" class="form-control" placeholder="عنوان اول" name="webpack_degarKhadamat_content_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="webpack_degarKhadamat_content_link' + i + '" value="" class="form-control" placeholder="لینک" name="webpack_degarKhadamat_content_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="webpack_degarKhadamat_content_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="webpack_degarKhadamat_content_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=webpack_degarKhadamat_content_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_webpack_degarKhadamat_content' + i + '" style="padding: 0px;"><div  id="webpack_degarKhadamat_content_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="webpack_degarKhadamat_content_avatar7_link' + i + '" name="webpack_degarKhadamat_content_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_webpack_degarKhadamat_content' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="webpack_degarKhadamat_content_text' + i + '"  class="form-control" placeholder="عنوان دوم" name="webpack_degarKhadamat_content_text' + i + '" ></textarea></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choice_webpack_degarKhadamat_content' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#webpack_degarKhadamat_content_count').val(i);

                                                                                    //--------orakuploader
                                                                                    $('#webpack_degarKhadamat_content_avatar7' + i + '').orakuploader({
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

                                                                                    $('#webpack_degarKhadamat_content_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                    $('.input-group-addon.H_webpack_degarKhadamat_content' + i + '').find("div").first().next().css('width', '100px');
                                                                                    $('.input-group-addon.H_webpack_degarKhadamat_content' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                    //    ---end orakuploader
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_webpack_degarKhadamat_content', function () {
                                                                                    var id = '';
                                                                                    var k = $('#webpack_degarKhadamat_content_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_third_choice_webpack_degarKhadamat_content' + id).remove();
                                                                                    $('#webpack_degarKhadamat_content_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_webpack_degarKhadamat_content-ads"><i
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
                                                <div  id="content11" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $webpack_title_article = get_tem_result($site, $la, "webpack_title_article", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_title_article['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_title_article_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_title_article_title"
                                                                           value="<?= $webpack_title_article['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_title_article_text"
                                                                           value="<?= $webpack_title_article['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_webpack_article = get_tem_result($site, $la, "ValSelectActive_webpack_article", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_webpack_article"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_webpack_article"
                                                                    name="select_type_webpack_article">

                                                                <option <? if ($ValSelectActive_webpack_article["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_article["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_article["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_webpack_article_title" type="hidden"
                                                                   value="<?= $ValSelectActive_webpack_article["title"] ?>">

                                                            <div class="tab-pane opt_webpack_article webpack_article_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_webpack_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_webpack_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_webpack_article; $j++) {
                                                                                    $first_choice_webpack_article = get_tem_result($site, $la, "first_choice_webpack_article$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_webpack_article['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_webpack_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_webpack_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_webpack_article col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_webpack_article_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_webpack_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_article['pic'] ?>">

                                                                                                        <select id="first_choice_webpack_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_webpack_article_cat"
                                                                                                                name="first_choice_webpack_article_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_webpack_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_webpack_article<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_webpack_article_new&id=" + $("#first_choice_webpack_article_cat<?=$j?>").val() + "&value=" + $("#first_choice_webpack_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_webpack_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_webpack_article_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_webpack_article_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_article['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_article['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_article['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_webpack_article_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_article["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_webpack_article_number<?= $j ?>">
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
                                                                                       id="first_choice_webpack_article_count"
                                                                                       name="first_choice_webpack_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_webpack_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_webpack_article').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_webpack_article_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_webpack_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_webpack_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_webpack_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_webpack_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_webpack_article col-md-4 input-group"><input type="hidden" id="first_choice_webpack_article_subcat_val' + i + '"  name="first_choice_webpack_article_subcat_val' + i + '" value=""> <select id="first_choice_webpack_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_webpack_article_cat" name="first_choice_webpack_article_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_webpack_article' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_webpack_article_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_webpack_article_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_webpack_article_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_webpack_article_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_webpack_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_webpack_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_webpack_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_article' + id).remove();
                                                                                            $('#first_choice_webpack_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_webpack_article"><i
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

                                                            <div class="tab-pane opt_webpack_article webpack_article_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_webpack_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_webpack_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_webpack_article; $j++) {
                                                                                    $second_choice_webpack_article = get_tem_result($site, $la, "second_choice_webpack_article$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_webpack_article['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_webpack_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_webpack_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_webpack_article col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_article_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_webpack_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_article['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_article_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_webpack_article_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_article['pic_adress'] ?>">

                                                                                                        <select id="second_choice_webpack_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_webpack_article_cat"
                                                                                                                name="second_choice_webpack_article_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_webpack_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_article<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_article_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_article&id=" + $("#second_choice_webpack_article_cat<?=$j?>").val() + "&value=" + $("#second_choice_webpack_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_webpack_article_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_article_content&id=" + $("#second_choice_webpack_article_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_webpack_article_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_webpack_article_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_article_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_webpack_article_count"
                                                                                       name="second_choice_webpack_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_webpack_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_webpack_article').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_webpack_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_webpack_article_neshane").change(function () {
                                                                                        var j = $("#second_choice_webpack_article_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_article' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_webpack_article_neshane', function () {
                                                                                        var j = $("#second_choice_webpack_article_count").val();
                                                                                        //  $(".second_choice_webpack_article_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_article_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_article_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_webpack_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_webpack_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_webpack_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_webpack_article col-md-3 input-group"><input type="hidden" id="second_choice_webpack_article_subcat_val' + i + '"  name="second_choice_webpack_article_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_webpack_article_subcat_link' + i + '"  name="second_choice_webpack_article_subcat_link' + i + '" value=""> <select id="second_choice_webpack_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_webpack_article_cat" name="second_choice_webpack_article_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_webpack_article' + i + '" class="col-md-3 input-group"></div><div id="second_choice_webpack_article_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_webpack_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_webpack_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_webpack_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_article' + id).remove();
                                                                                            $('#second_choice_webpack_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_webpack_article"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_webpack_article webpack_article_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_webpack_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_webpack_article%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_webpack_article; $x++) {
                                                                                    $third_choice_webpack_article = get_tem_result($site, $la, "third_choice_webpack_article$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_webpack_article['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_webpack_article<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_webpack_article" style="margin-bottom: 80px!important;"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_article_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_article["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_webpack_article_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_article_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_webpack_article["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_webpack_article_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_article_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_webpack_article<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_webpack_article_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_webpack_article_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_webpack_article_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_webpack_article<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_webpack_article["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_webpack_article<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_webpack_article["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_webpack_article["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_webpack_article["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_webpack_article_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_webpack_article_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_webpack_article_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_webpack_article['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-md-11 H_pl32">
                                                                                                    <div class="col-md-12 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_article_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_article["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک ویدیو"
                                                                                                               name="third_choice_webpack_article_link<?= $x ?>">
                                                                                                    </div>
                                                                                                </div>
                                                                                               <div class="col-md-11 input-group H_pl32">
                                                                                                  <textarea type="text"
                                                                                                         id="third_choice_webpack_article_text<?= $x ?>"
                                                                                                          class="form-control"
                                                                                                           placeholder="متن"
                                                                                                            name="third_choice_webpack_article_text<?= $x ?>"><?= $third_choice_webpack_article["text"] ?>
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
                                                                                       id="third_choice_webpack_article_count"
                                                                                       name="third_choice_webpack_article_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_webpack_article-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_webpack_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_webpack_article" style="margin-bottom: 80px!important;" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-4 input-group"><input type="text" id="third_choice_webpack_article_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_webpack_article_title' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_webpack_article_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_webpack_article_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_article_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_webpack_article' + i + '" style="padding: 0px;"><div  id="third_choice_webpack_article_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_webpack_article_avatar7_link' + i + '" name="third_choice_webpack_article_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_webpack_article' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_webpack_article_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="form-group col-md-11 H_pl32"><div class="col-md-12 input-group"><input type="text" id="third_choice_webpack_article_link'+ i +'" value="" class="form-control" placeholder="لینک ویدیو" name="third_choice_webpack_article_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_webpack_article_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_webpack_article_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_webpack_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_webpack_article_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_webpack_article_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_webpack_article_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_webpack_article' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_webpack_article' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_webpack_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_webpack_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_webpack_article' + id).remove();
                                                                                            $('#third_choice_webpack_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_webpack_article-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_webpack_article_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_webpack_article"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_webpack_article_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_webpack_article').hide();
                                                                        $('.webpack_article_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content12" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $webpack_title_LightBox = get_tem_result($site, $la, "webpack_title_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($webpack_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="webpack_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_title_LightBox_title"
                                                                           value="<?= $webpack_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_webpack_LightBox = get_tem_result($site, $la, "ValSelectActive_webpack_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_webpack_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_webpack_LightBox"
                                                                    name="select_type_webpack_LightBox">

                                                                <option <? if ($ValSelectActive_webpack_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_webpack_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_webpack_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_webpack_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_webpack_LightBox webpack_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_webpack_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_webpack_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_webpack_LightBox; $j++) {
                                                                                    $first_choice_webpack_LightBox = get_tem_result($site, $la, "first_choice_webpack_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_webpack_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_webpack_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_webpack_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_webpack_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_webpack_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_webpack_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_webpack_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_webpack_LightBox_cat"
                                                                                                                name="first_choice_webpack_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_webpack_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_webpack_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_webpack_LightBox_new&id=" + $("#first_choice_webpack_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_webpack_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_webpack_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_webpack_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_webpack_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_webpack_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_webpack_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_webpack_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_webpack_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_webpack_LightBox_count"
                                                                                       name="first_choice_webpack_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_webpack_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_webpack_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_webpack_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_webpack_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_webpack_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_webpack_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_webpack_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_webpack_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_webpack_LightBox_subcat_val' + i + '"  name="first_choice_webpack_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_webpack_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_webpack_LightBox_cat" name="first_choice_webpack_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_webpack_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_webpack_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_webpack_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_webpack_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_webpack_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_webpack_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_webpack_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_webpack_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_webpack_LightBox' + id).remove();
                                                                                            $('#first_choice_webpack_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_webpack_LightBox"><i
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

                                                            <div class="tab-pane opt_webpack_LightBox webpack_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_webpack_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_webpack_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_webpack_LightBox; $j++) {
                                                                                    $second_choice_webpack_LightBox = get_tem_result($site, $la, "second_choice_webpack_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_webpack_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_webpack_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_webpack_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_webpack_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_webpack_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_webpack_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_webpack_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_webpack_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_webpack_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_webpack_LightBox_cat"
                                                                                                                name="second_choice_webpack_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_webpack_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_webpack_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_LightBox&id=" + $("#second_choice_webpack_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_webpack_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_webpack_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_webpack_LightBox_content&id=" + $("#second_choice_webpack_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_webpack_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_webpack_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_webpack_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_webpack_LightBox_count"
                                                                                       name="second_choice_webpack_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_webpack_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_webpack_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_webpack_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_webpack_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_webpack_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_webpack_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_webpack_LightBox_count").val();
                                                                                        //  $(".second_choice_webpack_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_webpack_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_webpack_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_webpack_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_webpack_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_webpack_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_webpack_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_webpack_LightBox_subcat_val' + i + '"  name="second_choice_webpack_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_webpack_LightBox_subcat_link' + i + '"  name="second_choice_webpack_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_webpack_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_webpack_LightBox_cat" name="second_choice_webpack_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_webpack_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_webpack_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_webpack_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_webpack_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_webpack_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_webpack_LightBox' + id).remove();
                                                                                            $('#second_choice_webpack_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_webpack_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_webpack_LightBox webpack_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_webpack_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_webpack_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_webpack_LightBox; $x++) {
                                                                                    $third_choice_webpack_LightBox = get_tem_result($site, $la, "third_choice_webpack_LightBox$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_webpack_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_webpack_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_webpack_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_webpack_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_webpack_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_webpack_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_webpack_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_webpack_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_webpack_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_webpack_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_webpack_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_webpack_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_webpack_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_webpack_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_webpack_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_webpack_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_webpack_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_webpack_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_webpack_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_webpack_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_webpack_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_webpack_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_webpack_LightBox_text<?= $x ?>"><?= $third_choice_webpack_LightBox["text"] ?>

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
                                                                                       id="third_choice_webpack_LightBox_count"
                                                                                       name="third_choice_webpack_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_webpack_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_webpack_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_webpack_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_webpack_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_webpack_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_webpack_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_webpack_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_webpack_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_webpack_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_webpack_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_webpack_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_webpack_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_webpack_LightBox_avatar7_link' + i + '" name="third_choice_webpack_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_webpack_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_webpack_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_webpack_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_webpack_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_webpack_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_webpack_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_webpack_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_webpack_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_webpack_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_webpack_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_webpack_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_webpack_LightBox' + id).remove();
                                                                                            $('#third_choice_webpack_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_webpack_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_webpack_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_webpack_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_webpack_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_webpack_LightBox').hide();
                                                                        $('.webpack_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------header_seo------------------->
                                                <div  id="content13" class="bhoechie-tab-content H1 ">
                                                    <? $webpack_header_seo = get_tem_result($site, $la, "webpack_header_seo", 'coms2', $coms_conect); ?>
                                                    <center>
                                                        <div class="col-md-12">
                                                            <label  class="col-md-3 control-label" >meta keyword</label>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" value="<?= $webpack_header_seo['title'] ?>" id="header_seo_keyword" name="webpack_header_seo_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" >meta Description</label>
                                                                <div class="form-group col-md-6">
                                                                    <textarea id="header_seo_desciption" name="webpack_header_seo_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $webpack_header_seo['text'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">title</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="webpack_header_seo_pic"
                                                                           value="<?= $webpack_header_seo ['pic'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="webpack_header_seo_pic_adress"
                                                                                                                                                       value="<?=$webpack_header_seo['pic_adress']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="webpack_header_seo_pic_adress"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=webpack_header_seo_pic_adress"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="webpack_header_seo_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_webpack_header_seo_pic_adress"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_webpack_header_seo_pic_adress">
                                                                        <a href="<?= $webpack_header_seo["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $webpack_header_seo["pic_adress"] ?>" alt="<?= $webpack_header_seo["pic_adress"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#webpack_header_seo_pic_adress_avatar_orak').orakuploader({
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

                                                                            $('#webpack_header_seo_pic_adress_avatar_orak').html("<?=$pic_str?>");
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
                                    <!-----------------------------------------------------edu1---------------------------------------------->
                                    <?for ($b = 2; $b <= 6; $b++) {?>
                                    <div class="z-content tab<?=$b?>" style="position: absolute;">
                                        <div class="z-content-inner">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H<?=$b?>">
                                                <div class="list-group">
                                                    <? $setting_webpack_edu1_main_header = get_tem_result($site, $la, "setting_webpack_edu1_main_header$b", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_setting_webpack_edu1_main_header<?=$b?>" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $setting_webpack_edu1_main_header['text'] ?>تنظیمات</span>
                                                    </a>
                                                    <?
                                                    $count1_webpack_edu1_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'webpack_edu1_main_header$b%' ", $coms_conect);
                                                    for ($x = 1; $x <= $count1_webpack_edu1_main_header; $x++) {
                                                        $webpack_edu1_header1 = get_tem_result($site, $la, "webpack_edu1_main_header$b$x", 'coms2', $coms_conect);
                                                        if ($webpack_edu1_header1['text'] > "") {
                                                            ?>
                                                            <a id="H_input_rename_tab<?=$b?><?= $x ?>" href="#"
                                                               class="list-group-item  text-center ">
                                                                <span class="temp"><?= $webpack_edu1_header1['text'] ?></span>
                                                            </a>
                                                        <? }
                                                    } ?>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H<?=$b?>">

                                                <div class="bhoechie-tab-content H<?=$b?> active">

                                                    <div class="tab-pane">
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <!-- #section:download/download.link -->
                                                                    <div class="col-md-12">
                                                                        <?
                                                                        $count1_webpack_edu1_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'webpack_edu1_main_header$b%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count1_webpack_edu1_main_header; $x++) {
                                                                            $webpack_edu1_main_header = get_tem_result($site, $la, "webpack_edu1_main_header$b$x", 'coms2', $coms_conect);
                                                                            if ($webpack_edu1_main_header['text'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choicedel_webpack_edu1_main_header<?=$b?><?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_webpack_edu1_main_header<?=$b?>"
                                                                                           id="<?=$b?><?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-12 input-group">
                                                                                                <input type="text"
                                                                                                       id="webpack_edu1_main_header_text<?=$b?><?= $x ?>"
                                                                                                       value="<?= $webpack_edu1_main_header["text"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="webpack_edu1_main_header_text<?=$b?><?= $x ?>">
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="webpack_edu1_main_header_count<?=$b?>"
                                                                               name="webpack_edu1_main_header_count<?=$b?>"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$b?><?=$x?>;

                                                                                $('#add_webpack_edu1_main_header-ads<?=$b?>').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choicedel_webpack_edu1_main_header' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_webpack_edu1_main_header" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-12 input-group"><input type="text" id="webpack_edu1_main_header_text' + i + '" value="" class="form-control" placeholder="عنوان" name="webpack_edu1_main_header_text' + i + '" ></div> </div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choicedel_webpack_edu1_main_header' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#webpack_edu1_main_header_count<?=$b?>').val(i);

                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_webpack_edu1_main_header<?=$b?>', function () {
                                                                                    var id = '';
                                                                                    var k = $('#webpack_edu1_main_header_count<?=$b?>').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');

                                                                                    $('#div_mother_third_choicedel_webpack_edu1_main_header' + id).remove();
                                                                                    $('#webpack_edu1_main_header_count<?=$b?>').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_webpack_edu1_main_header-ads<?=$b?>"><i
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
                                                <? for ($y = 1; $y <= $count1_webpack_edu1_main_header; $y++) { ?>

                                                    <div id="tabbb<?=$b?><?= $y ?>" class="bhoechie-tab-content H<?=$b?> ">
                                                        <div class="col-md-12">

                                                            <div class="mt40 pt20 content_forms<?=$b?><?=$y?>">

                                                                <div id="show_form1" class="formmm H_dis_none ">

                                                                    <div class="tab-pane">
                                                                        <div class="page-content-area">
                                                                            <div class="page-body"
                                                                                 style="margin-top: 25px;">
                                                                                <fieldset>
                                                                                    <!-- #section:download/download.link -->
                                                                                    <div class="col-md-12">
                                                                                        <?
                                                                                        $count1_webpack_edu1_header_into_tab = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'webpack_edu1_header_into_tab$b$y%' ", $coms_conect);
                                                                                        for ($x = 1; $x <= $count1_webpack_edu1_header_into_tab; $x++) {
                                                                                            $webpack_edu1_header_into_tab = get_tem_result($site, $la, "webpack_edu1_header_into_tab$b$y$x", 'coms2', $coms_conect);
                                                                                            if ($webpack_edu1_header_into_tab['title'] > "") {
                                                                                                ?>
                                                                                                <div id="div_mother_third_choicedel_webpack_edu1_header_into_tab<?=$b?><?=$y?><?=$x?>"
                                                                                                     class="seyed"
                                                                                                     style="opacity: 1;">
                                                                                                    <div class="form-group">
                                                                                                        <a class="col-md-1 control-label del_webpack_edu1_header_into_tab"
                                                                                                           id="<?=$b?><?= $y ?><?= $x ?>"
                                                                                                           for="family"><i
                                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                                    title=""
                                                                                                                    data-original-title="حذف"></i>
                                                                                                        </a>

                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="webpack_edu1_header_into_tab_title<?=$b?><?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $webpack_edu1_header_into_tab["title"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="عنوان"
                                                                                                                       name="webpack_edu1_header_into_tab_title<?=$b?><?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="webpack_edu1_header_into_tab_link<?=$b?><?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $webpack_edu1_header_into_tab["link"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="لینک متن"
                                                                                                                       name="webpack_edu1_header_into_tab_link<?=$b?><?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="webpack_edu1_header_into_tab_text<?=$b?><?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $webpack_edu1_header_into_tab["text"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="متن رنگی"
                                                                                                                       name="webpack_edu1_header_into_tab_text<?=$b?><?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="webpack_edu1_header_into_tab_pic<?=$b?><?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $webpack_edu1_header_into_tab["pic"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="زمان"
                                                                                                                       name="webpack_edu1_header_into_tab_pic<?=$b?><?= $y ?><?= $x ?>">
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
                                                                                               id="webpack_edu1_header_into_tab_count<?=$b?><?= $y ?>"
                                                                                               name="webpack_edu1_header_into_tab_count<?=$b?><?= $y ?>"
                                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                var i = <?=$b?><?=$y?><?=$x?>;

                                                                                                $('#add_webpack_edu1_header_into_tab-ads<?=$b?><?=$y?>').on("click", function () {
                                                                                                    
                                                                                                    var someText = '<div id="div_mother_third_choicedel_webpack_edu1_header_into_tab' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_webpack_edu1_header_into_tab' + i + '" id="' + i + '" for="family" ><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="webpack_edu1_header_into_tab_title' + i + '" value="" class="form-control"   placeholder="عنوان " name="webpack_edu1_header_into_tab_title'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="webpack_edu1_header_into_tab_link' + i + '" value="" class="form-control"   placeholder="لینک متن" name="webpack_edu1_header_into_tab_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="webpack_edu1_header_into_tab_text' + i + '" value="" class="form-control"   placeholder="متن رنگی" name="webpack_edu1_header_into_tab_text'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="webpack_edu1_header_into_tab_pic' + i + '" value="" class="form-control"   placeholder="زمان" name="webpack_edu1_header_into_tab_pic'+ i +'"> </div></div></div></div>';
                                                                                                    $(this).before(someText);
                                                                                                    $('#div_mother_third_choicedel_webpack_edu1_header_into_tab' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                        $(this).css('background', '');
                                                                                                    }).fadeTo('slow', 1);
                                                                                                    $('#webpack_edu1_header_into_tab_count<?=$b?><?=$y?>').val(i);
                                                                                                    i++;

                                                                                                });

                                                                                                $(document).on('click', '.del_webpack_edu1_header_into_tab', function () {

                                                                                                    var id = '';
                                                                                                    var k = $('#webpack_edu1_header_into_tab_count<?=$b?><?=$y?>').val();
                                                                                                    k--;
                                                                                                    id = $(this).attr('id');

                                                                                                    $('#div_mother_third_choicedel_webpack_edu1_header_into_tab' + id).remove();

                                                                                                   // $('#webpack_edu1_header_into_tab_count<?=$b?><?=$y?>').val(k);
                                                                                                });
                                                                                            });


                                                                                        </script>
                                                                                        <a class="btn btn-success block"
                                                                                           id="add_webpack_edu1_header_into_tab-ads<?=$b?><?= $y ?>"><i
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
                                                            $('input#form1<?=$b?><?= $y ?>').click(function () {
                                                                $('.content_forms<?=$b?><?=$y?> #show_form1').siblings().addClass('H_dis_none');
                                                                $('.content_forms<?=$b?><?=$y?> #show_form1').removeClass('H_dis_none');
                                                            });

                                                            $(".content_forms<?=$b?><?=$y?>").find('[id=<? if($temp_tabTwo['link']==""){echo 'show_form1';}else echo $temp_tabTwo['link']; ?>]').removeClass('H_dis_none');

                                                            $("form").submit(function () {
                                                                var num_tab_forms = $(".content_forms<?=$b?><?=$y?> .formmm").not(".H_dis_none").attr("id");
                                                                $('[name="num_tab_forms_tab<?=$b?><?=$y?>"]').val(num_tab_forms);

                                                            });

                                                        })
                                                    </script>

                                                <? } ?>
                                                <!--end tab-->

                                            </div>
                                        </div>
                                    </div>
                                    <?}?>

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

        $("div.bhoechie-tab-menu.H4>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();

            $("div.bhoechie-tab.H4>div.bhoechie-tab-content.H4").removeClass("active");
            $("div.bhoechie-tab.H4>div.bhoechie-tab-content.H4").eq(index).addClass("active");
        });

        $("div.bhoechie-tab-menu.H5>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();

            $("div.bhoechie-tab.H5>div.bhoechie-tab-content.H5").removeClass("active");
            $("div.bhoechie-tab.H5>div.bhoechie-tab-content.H5").eq(index).addClass("active");
        });
        $("div.bhoechie-tab-menu.H6>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();

            $("div.bhoechie-tab.H6>div.bhoechie-tab-content.H6").removeClass("active");
            $("div.bhoechie-tab.H6>div.bhoechie-tab-content.H6").eq(index).addClass("active");
        });


        //----------webpack---------------------
        $(".H_rename_webpack_box1").click(function () {
            $(this).hide();
            $('.H_rename_webpack_box1_save').show();
            $(".H_input_rename_webpack_box1").toggle(300);
        });
        $(".H_rename_webpack_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_box1' + "&value=" + $(".H_input_rename_webpack_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_box1 > span.temp").text($(".H_input_rename_webpack_box1").val());
            $(this).hide();
            $('.H_rename_webpack_box1').show();
            $(".H_input_rename_webpack_box1").hide();
            $(".H_rename_webpack_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_webpack_box2").click(function () {
            $(this).hide();
            $('.H_rename_webpack_box2_save').show();
            $(".H_input_rename_webpack_box2").toggle(300);
        });
        $(".H_rename_webpack_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_box2' + "&value=" + $(".H_input_rename_webpack_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_box2 > span.temp").text($(".H_input_rename_webpack_box2").val());
            $(this).hide();
            $('.H_rename_webpack_box2').show();
            $(".H_input_rename_webpack_box2").hide();
            $(".H_rename_webpack_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_webpack_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box3_save').show();
            $(".H_input_rename_webpack_title_box3").toggle(300);
        });
        $(".H_rename_webpack_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box3' + "&value=" + $(".H_input_rename_webpack_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box3 > span.temp").text($(".H_input_rename_webpack_title_box3").val());
            $(this).hide();
            $('.H_rename_webpack_title_box3').show();
            $(".H_input_rename_webpack_title_box3").hide();
            $(".H_rename_webpack_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_webpack_title_box4").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box4_save').show();
            $(".H_input_rename_webpack_title_box4").toggle(300);
        });
        $(".H_rename_webpack_title_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box4' + "&value=" + $(".H_input_rename_webpack_title_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box4 > span.temp").text($(".H_input_rename_webpack_title_box4").val());
            $(this).hide();
            $('.H_rename_webpack_title_box4').show();
            $(".H_input_rename_webpack_title_box4").hide();
            $(".H_rename_webpack_title_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_webpack_title_box5").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box5_save').show();
            $(".H_input_rename_webpack_title_box5").toggle(300);
        });
        $(".H_rename_webpack_title_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box5' + "&value=" + $(".H_input_rename_webpack_title_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box5 > span.temp").text($(".H_input_rename_webpack_title_box5").val());
            $(this).hide();
            $('.H_rename_webpack_title_box5').show();
            $(".H_input_rename_webpack_title_box5").hide();
            $(".H_rename_webpack_title_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_webpack_title_box6").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box6_save').show();
            $(".H_input_rename_webpack_title_box6").toggle(300);
        });
        $(".H_rename_webpack_title_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box6' + "&value=" + $(".H_input_rename_webpack_title_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box6 > span.temp").text($(".H_input_rename_webpack_title_box6").val());
            $(this).hide();
            $('.H_rename_webpack_title_box6').show();
            $(".H_input_rename_webpack_title_box6").hide();
            $(".H_rename_webpack_title_box6.H_pos_color").css('transform', 'translateY(-24px)');
        });

        //-------------------------------

        $(".H_rename_webpack_title_box7").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box7_save').show();
            $(".H_input_rename_webpack_title_box7").toggle(300);
        });
        $(".H_rename_webpack_title_box7_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box7' + "&value=" + $(".H_input_rename_webpack_title_box7").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box7 > span.temp").text($(".H_input_rename_webpack_title_box7").val());
            $(this).hide();
            $('.H_rename_webpack_title_box7').show();
            $(".H_input_rename_webpack_title_box7").hide();
            $(".H_rename_webpack_title_box7.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_webpack_title_box8").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box8_save').show();
            $(".H_input_rename_webpack_title_box8").toggle(300);
        });
        $(".H_rename_webpack_title_box8_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box8' + "&value=" + $(".H_input_rename_webpack_title_box8").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box8 > span.temp").text($(".H_input_rename_webpack_title_box8").val());
            $(this).hide();
            $('.H_rename_webpack_title_box8').show();
            $(".H_input_rename_webpack_title_box8").hide();
            $(".H_rename_webpack_title_box8.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_webpack_title_box9").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box9_save').show();
            $(".H_input_rename_webpack_title_box9").toggle(300);
        });
        $(".H_rename_webpack_title_box9_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box9' + "&value=" + $(".H_input_rename_webpack_title_box9").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box9 > span.temp").text($(".H_input_rename_webpack_title_box9").val());
            $(this).hide();
            $('.H_rename_webpack_title_box9').show();
            $(".H_input_rename_webpack_title_box9").hide();
            $(".H_rename_webpack_title_box9.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_webpack_title_box10").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box10_save').show();
            $(".H_input_rename_webpack_title_box10").toggle(300);
        });
        $(".H_rename_webpack_title_box10_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box10' + "&value=" + $(".H_input_rename_webpack_title_box10").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box10 > span.temp").text($(".H_input_rename_webpack_title_box10").val());
            $(this).hide();
            $('.H_rename_webpack_title_box10').show();
            $(".H_input_rename_webpack_title_box10").hide();
            $(".H_rename_webpack_title_box10.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_webpack_title_box11").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box11_save').show();
            $(".H_input_rename_webpack_title_box11").toggle(300);
        });
        $(".H_rename_webpack_title_box11_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box11' + "&value=" + $(".H_input_rename_webpack_title_box11").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box11 > span.temp").text($(".H_input_rename_webpack_title_box11").val());
            $(this).hide();
            $('.H_rename_webpack_title_box11').show();
            $(".H_input_rename_webpack_title_box11").hide();
            $(".H_rename_webpack_title_box11.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_webpack_title_box12").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box12_save').show();
            $(".H_input_rename_webpack_title_box12").toggle(300);
        });
        $(".H_rename_webpack_title_box12_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box12' + "&value=" + $(".H_input_rename_webpack_title_box12").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box12 > span.temp").text($(".H_input_rename_webpack_title_box12").val());
            $(this).hide();
            $('.H_rename_webpack_title_box12').show();
            $(".H_input_rename_webpack_title_box12").hide();
            $(".H_rename_webpack_title_box12.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_webpack_title_box13").click(function () {
            $(this).hide();
            $('.H_rename_webpack_title_box13_save').show();
            $(".H_input_rename_webpack_title_box13").toggle(300);
        });
        $(".H_rename_webpack_title_box13_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'webpack_title_box13' + "&value=" + $(".H_input_rename_webpack_title_box13").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_webpack_title_box13 > span.temp").text($(".H_input_rename_webpack_title_box13").val());
            $(this).hide();
            $('.H_rename_webpack_title_box13').show();
            $(".H_input_rename_webpack_title_box13").hide();
            $(".H_rename_webpack_title_box13.H_pos_color").css('transform', 'translateY(-24px)');
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
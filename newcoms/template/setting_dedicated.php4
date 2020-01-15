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



    ########################################################### dedicated ########################################################

    $dedicated_boxOne_pic_adress = 0;
    $dedicated_boxOne_pic_adress= injection_replace($_POST["dedicated_boxOne_pic_adress"]);
    $dedicated_boxOne_title = injection_replace($_POST["dedicated_boxOne_title"]);
    $dedicated_boxOne_text = injection_replace($_POST["dedicated_boxOne_text"]);
    $dedicated_boxOne_pic = injection_replace($_POST["dedicated_boxOne_pic"]);
    $dedicated_boxOne_pic = resize_image_M($dedicated_boxOne_pic,1350,550,$img_page_main,'');
    $dedicated_boxOne_pic_avatar_orak = injection_replace($_POST["dedicated_boxOne_pic_avatar_orak"][0]);
    if($dedicated_boxOne_pic_avatar_orak>""){
        $dedicated_boxOne_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $dedicated_boxOne_pic_avatar_orak;
        $dedicated_boxOne_pic = resize_image_M($dedicated_boxOne_pic,1350,550,$img_page_main,'');

    }
    insert_templdate($site, $dedicated_boxOne_pic_adress, $la, $dedicated_boxOne_text, $dedicated_boxOne_title, '', $dedicated_boxOne_pic, "dedicated_boxOne", 'coms2', $coms_conect);

    $dedicated_content_BoxOne1_title= injection_replace($_POST["dedicated_content_BoxOne1_title"]);
    $dedicated_content_BoxOne1_link = injection_replace($_POST["dedicated_content_BoxOne1_link"]);
    $dedicated_content_BoxOne1_pic = injection_replace($_POST["dedicated_content_BoxOne1_pic"]);
    $dedicated_content_BoxOne1_text= injection_replace($_POST["dedicated_content_BoxOne1_text"]);
    $dedicated_content_BoxOne1_pic_adress = injection_replace($_POST["dedicated_content_BoxOne1_pic_adress"]);
    $dedicated_content_BoxOne1_pic_adress = resize_image_M($dedicated_content_BoxOne1_pic_adress,100,100,$img_page_main,'');
    $dedicated_content_BoxOne1_avatar7 = injection_replace($_POST["dedicated_content_BoxOne1_avatar7"][0]);
    if($dedicated_content_BoxOne1_avatar7>""){
        $dedicated_content_BoxOne1_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $dedicated_content_BoxOne1_avatar7;
        $dedicated_content_BoxOne1_pic_adress = resize_image_M($dedicated_content_BoxOne1_pic_adress,100,100,$img_page_main,'');

    }

    $dedicated_content_BoxOne2_text= injection_replace($_POST["dedicated_content_BoxOne2_text"]);
    if($dedicated_content_BoxOne1_title>"") {
        insert_templdate($site, $dedicated_content_BoxOne1_pic_adress, $la, $dedicated_content_BoxOne1_text, $dedicated_content_BoxOne1_title, $dedicated_content_BoxOne1_link, $dedicated_content_BoxOne1_pic, "dedicated_content_BoxOne1", 'coms2', $coms_conect);
        insert_templdate($site, '', $la, $dedicated_content_BoxOne2_text, '', '', '', "dedicated_content_BoxOne2", 'coms2', $coms_conect);
    }
//    menu box
    $dedicated_menubox_show_pic_adress = injection_replace_pic($_POST["dedicated_menubox_show_pic_adress"]);
    insert_templdate($site, $dedicated_menubox_show_pic_adress, $la, '', '', '', '', "dedicated_menubox_show", 'coms2', $coms_conect);

    $dedicated_menubox_links_del = "name like 'dedicated_menubox_links%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $dedicated_menubox_links_del, $coms_conect);
    $dedicated_menubox_links_count = injection_replace_pic($_POST["dedicated_menubox_links_count"]);
    for ($k = 1; $k <= $dedicated_menubox_links_count; $k++) {
        $dedicated_menubox_links_title = injection_replace_pic($_POST["dedicated_menubox_links_title{$k}"]);
        $dedicated_menubox_links_link = injection_replace_pic($_POST["dedicated_menubox_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $dedicated_menubox_links_title, $dedicated_menubox_links_link, '', "dedicated_menubox_links$k", 'coms2', $coms_conect);
    }

    //box three tab

    $dedicated_boxThreeTab_pic_adress = 0;
    $dedicated_boxThreeTab_pic_adress= injection_replace($_POST["dedicated_boxThreeTab_pic_adress"]);
    $dedicated_boxThreeTab_title = injection_replace($_POST["dedicated_boxThreeTab_title"]);
    $dedicated_boxThreeTab_text = injection_replace($_POST["dedicated_boxThreeTab_text"]);
    $dedicated_boxThreeTab_pic = injection_replace($_POST["dedicated_boxThreeTab_pic"]);
    insert_templdate($site, $dedicated_boxThreeTab_pic_adress, $la, $dedicated_boxThreeTab_text, $dedicated_boxThreeTab_title, '', $dedicated_boxThreeTab_pic, "dedicated_boxThreeTab", 'coms2', $coms_conect);


    $count1_dedicated_boxThreeTab_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'dedicated_boxThreeTab_main_header%' ", $coms_conect);
        $block_name_setting_dedicated_boxThreeTab_main_header = injection_replace($_POST["block_name_setting_dedicated_boxThreeTab_main_header"]);
        if ($block_name_setting_dedicated_boxThreeTab_main_header > "") {
            insert_templdate($site, '', $la, $block_name_setting_dedicated_boxThreeTab_main_header, '', '', '', "setting_dedicated_boxThreeTab_main_header", 'coms2', $coms_conect);
        }
        //----------tab name
        $condition_dedicated_boxThreeTab_main_header = "name like 'dedicated_boxThreeTab_main_header%' and tem_name='coms2'";
        delete_from_data_base('new_tem_setting', $condition_dedicated_boxThreeTab_main_header, $coms_conect);

        $dedicated_boxThreeTab_main_header_count = injection_replace_pic($_POST["dedicated_boxThreeTab_main_header_count"]);
        for ($x = 1; $x <= $dedicated_boxThreeTab_main_header_count; $x++) {

            $dedicated_boxThreeTab_main_header_text = injection_replace_pic($_POST["dedicated_boxThreeTab_main_header_text{$x}"]);

            if ($dedicated_boxThreeTab_main_header_text > "") {
                insert_templdate($site, '', $la, $dedicated_boxThreeTab_main_header_text, '', '', '', "dedicated_boxThreeTab_main_header$x", 'coms2', $coms_conect);
            }
        }
        //-------end tab name------------

        //-------tab------------
        for ($u = 1; $u <= $count1_dedicated_boxThreeTab_main_header; $u++) {

            $condition_dedicated_boxThreeTab_btn = "name like 'dedicated_boxThreeTab_btn$u%' and tem_name='coms2'";
            delete_from_data_base('new_tem_setting', $condition_dedicated_boxThreeTab_btn, $coms_conect);

            $condition_dedicated_boxThreeTab_title = "name like 'dedicated_boxThreeTab_title$u%' and tem_name='coms2'";
            delete_from_data_base('new_tem_setting', $condition_dedicated_boxThreeTab_title, $coms_conect);

            $condition_dedicated_boxThreeTab_titr = "name like 'dedicated_boxThreeTab_titr$u%' and tem_name='coms2'";
            delete_from_data_base('new_tem_setting', $condition_dedicated_boxThreeTab_titr, $coms_conect);

            $dedicated_boxThreeTab_btn_count = injection_replace_pic($_POST["dedicated_boxThreeTab_btn_count{$u}"]);
            for ($x = 1; $x <= $dedicated_boxThreeTab_btn_count; $x++) {
                $dedicated_boxThreeTab_btn_pic = injection_replace_pic($_POST["dedicated_boxThreeTab_btn_pic{$u}{$x}"]);
                $dedicated_boxThreeTab_btn_title = injection_replace_pic($_POST["dedicated_boxThreeTab_btn_title{$u}{$x}"]);
                $dedicated_boxThreeTab_btn_link = injection_replace_pic($_POST["dedicated_boxThreeTab_btn_link{$u}{$x}"]);
                $dedicated_boxThreeTab_btn_text = injection_replace_pic($_POST["dedicated_boxThreeTab_btn_text{$u}{$x}"]);

                $dedicated_boxThreeTab_title_title = injection_replace_pic($_POST["dedicated_boxThreeTab_title_title{$u}{$x}"]);
                $dedicated_boxThreeTab_title_link = injection_replace_pic($_POST["dedicated_boxThreeTab_title_link{$u}{$x}"]);
                $dedicated_boxThreeTab_title_pic = injection_replace_pic($_POST["dedicated_boxThreeTab_title_pic{$u}{$x}"]);
                $dedicated_boxThreeTab_title_text = injection_replace_pic($_POST["dedicated_boxThreeTab_title_text{$u}{$x}"]);
                $dedicated_boxThreeTab_title_pic_adress = injection_replace_pic($_POST["dedicated_boxThreeTab_title_pic_adress{$u}{$x}"]);

                $dedicated_boxThreeTab_titr_pic = injection_replace_pic($_POST["dedicated_boxThreeTab_titr_pic{$u}{$x}"]);
                $dedicated_boxThreeTab_titr_text = injection_replace_pic($_POST["dedicated_boxThreeTab_titr_text{$u}{$x}"]);
                $dedicated_boxThreeTab_titr_pic_adress = injection_replace_pic($_POST["dedicated_boxThreeTab_titr_pic_adress{$u}{$x}"]);


                if ($dedicated_boxThreeTab_btn_title > "") {
                    insert_templdate($site, '', $la, $dedicated_boxThreeTab_btn_text, $dedicated_boxThreeTab_btn_title, $dedicated_boxThreeTab_btn_link, $dedicated_boxThreeTab_btn_pic, "dedicated_boxThreeTab_btn$u$x", 'coms2', $coms_conect);
                    insert_templdate($site, $dedicated_boxThreeTab_title_pic_adress, $la, $dedicated_boxThreeTab_title_text, $dedicated_boxThreeTab_title_title, $dedicated_boxThreeTab_title_link, $dedicated_boxThreeTab_title_pic, "dedicated_boxThreeTab_title$u$x", 'coms2', $coms_conect);
                    insert_templdate($site, $dedicated_boxThreeTab_titr_pic_adress, $la, $dedicated_boxThreeTab_titr_text, '', '', $dedicated_boxThreeTab_titr_pic, "dedicated_boxThreeTab_titr$u$x", 'coms2', $coms_conect);
                }
            }

        }

    $condition_dedicated_boxThree_tit = "name like 'dedicated_boxThree_tit%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_dedicated_boxThree_tit, $coms_conect);

    $dedicated_boxThree_tit_count = injection_replace_pic($_POST["dedicated_boxThree_tit_count"]);
    for ($x = 1; $x <= $dedicated_boxThree_tit_count; $x++) {

        $dedicated_boxThree_tit_text = injection_replace_pic($_POST["dedicated_boxThree_tit_text{$x}"]);

        if ($dedicated_boxThree_tit_text > "") {
            insert_templdate($site, '', $la, $dedicated_boxThree_tit_text, '', '', '', "dedicated_boxThree_tit$x", 'coms2', $coms_conect);
        }
    }

//    dedicated Specifications

    $dedicated_slide_box5_pic_adress = injection_replace_pic($_POST["dedicated_slide_box5_pic_adress"]);
    $dedicated_slide_box5_title = injection_replace_pic($_POST["dedicated_slide_box5_title"]);
    $dedicated_slide_box5_pic = injection_replace_pic($_POST["dedicated_slide_box5_pic"]);
    $dedicated_slide_box5_link = injection_replace_pic($_POST["dedicated_slide_box5_link"]);
    insert_templdate($site, $dedicated_slide_box5_pic_adress, $la, '', $dedicated_slide_box5_title, $dedicated_slide_box5_link, $dedicated_slide_box5_pic, "dedicated_slide_box5", 'coms2', $coms_conect);


    $condition_dedicated_slide_boxFive = "name like 'dedicated_slide_boxFive%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_dedicated_slide_boxFive, $coms_conect);


    $dedicated_slide_boxFive_count = injection_replace_pic($_POST["dedicated_slide_boxFive_count"]);
    for ($x = 1; $x <= $dedicated_slide_boxFive_count; $x++) {
        $dedicated_slide_boxFive_title = injection_replace_pic($_POST["dedicated_slide_boxFive_title{$x}"]);
        $dedicated_slide_boxFive_link= injection_replace_pic($_POST["dedicated_slide_boxFive_link{$x}"]);
        $dedicated_slide_boxFive_pic_adress = injection_replace_pic($_POST["dedicated_slide_boxFive_pic_adress{$x}"]);
        $dedicated_slide_boxFive_pic_adress = resize_image_M($dedicated_slide_boxFive_pic_adress,100,100,$img_page_main,'');
        $dedicated_slide_boxFive_avatar7 = injection_replace($_POST["dedicated_slide_boxFive_avatar7{$x}"][0]);
        if ($dedicated_slide_boxFive_avatar7 > "") {
            $dedicated_slide_boxFive_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $dedicated_slide_boxFive_avatar7;
            $dedicated_slide_boxFive_pic_adress = resize_image_M($dedicated_slide_boxFive_pic_adress,100,100,$img_page_main,'');

        }

        if ($dedicated_slide_boxFive_title > "") {
            insert_templdate($site, $dedicated_slide_boxFive_pic_adress, $la, '', $dedicated_slide_boxFive_title, $dedicated_slide_boxFive_link, '', "dedicated_slide_boxFive$x", 'coms2', $coms_conect);
        }
    }

//    dedicated box2
    $dedicated_boxTwo_pic_adress = 0;
    $dedicated_boxTwo_pic_adress= injection_replace($_POST["dedicated_boxTwo_pic_adress"]);
    $dedicated_boxTwo_text = injection_replace($_POST["dedicated_boxTwo_text"]);
    $dedicated_boxTwo_title = injection_replace($_POST["dedicated_boxTwo_title"]);
    $dedicated_boxTwo_pic = injection_replace($_POST["dedicated_boxTwo_pic"]);
    $dedicated_boxTwo_link = injection_replace($_POST["dedicated_boxTwo_link"]);
    insert_templdate($site, $dedicated_boxTwo_pic_adress, $la, $dedicated_boxTwo_text, $dedicated_boxTwo_title, $dedicated_boxTwo_link, $dedicated_boxTwo_pic, "dedicated_boxTwo", 'coms2', $coms_conect);


    $ValSelectActive_dedicated_boxTwo_title = injection_replace($_POST["ValSelectActive_dedicated_boxTwo_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_dedicated_boxTwo_title, '', '', "ValSelectActive_dedicated_boxTwo", 'coms2', $coms_conect);

    $condition_first_choice_dedicated_boxTwo = "name like 'first_choice_dedicated_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_dedicated_boxTwo, $coms_conect);
    $first_choice_dedicated_boxTwo_count = injection_replace_pic($_POST["first_choice_dedicated_boxTwo_count"]);
    for ($i = 1; $i <= $first_choice_dedicated_boxTwo_count; $i++) {

        $first_choice_dedicated_boxTwo_cat = injection_replace_pic($_POST["first_choice_dedicated_boxTwo_cat{$i}"]);
        $first_choice_dedicated_boxTwo_subcat_cat = injection_replace_pic($_POST["first_choice_dedicated_boxTwo_subcat_cat{$i}"]);
        $first_choice_dedicated_boxTwo_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_dedicated_boxTwo_Fixed_selection_cat{$i}"]);
        $first_choice_dedicated_boxTwo_number = injection_replace_pic($_POST["first_choice_dedicated_boxTwo_number{$i}"]);
        if ($first_choice_dedicated_boxTwo_subcat_cat > "")
            insert_templdate($site, $first_choice_dedicated_boxTwo_number, $la, $first_choice_dedicated_boxTwo_Fixed_selection_cat, '', $first_choice_dedicated_boxTwo_cat, $first_choice_dedicated_boxTwo_subcat_cat, "first_choice_dedicated_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_dedicated_boxTwo = "name like 'second_choice_dedicated_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_dedicated_boxTwo, $coms_conect);
    $second_choice_dedicated_boxTwo_count = injection_replace_pic($_POST["second_choice_dedicated_boxTwo_count"]);
    for ($i = 1; $i <= $second_choice_dedicated_boxTwo_count; $i++) {

        $second_choice_dedicated_boxTwo_cat = injection_replace_pic($_POST["second_choice_dedicated_boxTwo_cat{$i}"]);
        $second_choice_dedicated_boxTwo_subcat_cat = injection_replace_pic($_POST["second_choice_dedicated_boxTwo_subcat_cat{$i}"]);
        $second_choice_dedicated_boxTwo_subcat_cat_content = injection_replace_pic($_POST["second_choice_dedicated_boxTwo_subcat_cat_content{$i}"]);
        if ($second_choice_dedicated_boxTwo_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_dedicated_boxTwo_subcat_cat_content, $la, '', '', $second_choice_dedicated_boxTwo_cat, $second_choice_dedicated_boxTwo_subcat_cat, "second_choice_dedicated_boxTwo$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_dedicated_boxTwo = "name like 'third_choice_dedicated_boxTwo%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_dedicated_boxTwo, $coms_conect);
    $third_choice_dedicated_boxTwo_count = injection_replace_pic($_POST["third_choice_dedicated_boxTwo_count"]);
    for ($x = 1; $x <= $third_choice_dedicated_boxTwo_count; $x++) {


        $third_choice_dedicated_boxTwo_pic_adress = injection_replace_pic($_POST["third_choice_dedicated_boxTwo_pic_adress{$x}"]);
        $third_choice_dedicated_boxTwo_title = injection_replace_pic($_POST["third_choice_dedicated_boxTwo_title{$x}"]);
        $third_choice_dedicated_boxTwo_text = injection_replace_pic($_POST["third_choice_dedicated_boxTwo_text{$x}"]);

        $third_choice_dedicated_boxTwo_link = injection_replace_pic($_POST["third_choice_dedicated_boxTwo_link{$x}"]);
        $third_choice_dedicated_boxTwo_pic = injection_replace_pic($_POST["third_choice_dedicated_boxTwo_pic{$x}"]);
        $third_choice_dedicated_boxTwo_pic = resize_image_M($third_choice_dedicated_boxTwo_pic,40,40,$img_page_main,'');
        $third_choice_dedicated_boxTwo_avatar7 = injection_replace($_POST["third_choice_dedicated_boxTwo_avatar7{$x}"][0]);
        if ($third_choice_dedicated_boxTwo_avatar7 > "") {
            $third_choice_dedicated_boxTwo_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_dedicated_boxTwo_avatar7;
            $third_choice_dedicated_boxTwo_pic = resize_image_M($third_choice_dedicated_boxTwo_pic,40,40,$img_page_main,'');

        }
        if ($third_choice_dedicated_boxTwo_title > "") {
            insert_templdate($site, $third_choice_dedicated_boxTwo_pic_adress, $la, $third_choice_dedicated_boxTwo_text, $third_choice_dedicated_boxTwo_title, $third_choice_dedicated_boxTwo_link, $third_choice_dedicated_boxTwo_pic, "third_choice_dedicated_boxTwo$x", 'coms2', $coms_conect);
        }
    }
    //box gallery
    $dedicated_box_gallery_pic_adress = 0;
    $dedicated_box_gallery_pic_adress= injection_replace($_POST["dedicated_box_gallery_pic_adress"]);
    $dedicated_box_gallery_title= injection_replace($_POST["dedicated_box_gallery_title"]);
    $dedicated_box_gallery_text= injection_replace($_POST["dedicated_box_gallery_text"]);
    $dedicated_box_gallery_pic= injection_replace($_POST["dedicated_box_gallery_pic"]);
    $dedicated_box_gallery_link= injection_replace($_POST["dedicated_box_gallery_link"]);
    insert_templdate($site, $dedicated_box_gallery_pic_adress, $la, $dedicated_box_gallery_text, $dedicated_box_gallery_title, $dedicated_box_gallery_link, $dedicated_box_gallery_pic, "dedicated_box_gallery", 'coms2', $coms_conect);

    $ValSelectActive_dedicated_box_gallery_title = injection_replace($_POST["ValSelectActive_dedicated_box_gallery_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_dedicated_box_gallery_title, '', '', "ValSelectActive_dedicated_box_gallery", 'coms2', $coms_conect);

    $condition_first_choice_dedicated_box_gallery = "name like 'first_choice_dedicated_box_gallery%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_dedicated_box_gallery, $coms_conect);
    $first_choice_dedicated_box_gallery_count = injection_replace_pic($_POST["first_choice_dedicated_box_gallery_count"]);
    for ($i = 1; $i <= $first_choice_dedicated_box_gallery_count; $i++) {

        $first_choice_dedicated_box_gallery_cat = injection_replace_pic($_POST["first_choice_dedicated_box_gallery_cat{$i}"]);
        $first_choice_dedicated_box_gallery_subcat_cat = injection_replace_pic($_POST["first_choice_dedicated_box_gallery_subcat_cat{$i}"]);
        $first_choice_dedicated_box_gallery_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_dedicated_box_gallery_Fixed_selection_cat{$i}"]);
        $first_choice_dedicated_box_gallery_number = injection_replace_pic($_POST["first_choice_dedicated_box_gallery_number{$i}"]);
        if ($first_choice_dedicated_box_gallery_subcat_cat > "")
            insert_templdate($site, $first_choice_dedicated_box_gallery_number, $la, $first_choice_dedicated_box_gallery_Fixed_selection_cat, '', $first_choice_dedicated_box_gallery_cat, $first_choice_dedicated_box_gallery_subcat_cat, "first_choice_dedicated_box_gallery$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_dedicated_box_gallery = "name like 'second_choice_dedicated_box_gallery%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_dedicated_box_gallery, $coms_conect);
    $second_choice_dedicated_box_gallery_count = injection_replace_pic($_POST["second_choice_dedicated_box_gallery_count"]);
    for ($i = 1; $i <= $second_choice_dedicated_box_gallery_count; $i++) {

        $second_choice_dedicated_box_gallery_cat = injection_replace_pic($_POST["second_choice_dedicated_box_gallery_cat{$i}"]);
        $second_choice_dedicated_box_gallery_subcat_cat = injection_replace_pic($_POST["second_choice_dedicated_box_gallery_subcat_cat{$i}"]);
        $second_choice_dedicated_box_gallery_subcat_cat_content = injection_replace_pic($_POST["second_choice_dedicated_box_gallery_subcat_cat_content{$i}"]);
        if ($second_choice_dedicated_box_gallery_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_dedicated_box_gallery_subcat_cat_content, $la, '', '', $second_choice_dedicated_box_gallery_cat, $second_choice_dedicated_box_gallery_subcat_cat, "second_choice_dedicated_box_gallery$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_dedicated_box_gallery = "name like 'third_choice_dedicated_box_gallery%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_dedicated_box_gallery, $coms_conect);
    $third_choice_dedicated_box_gallery_count = injection_replace_pic($_POST["third_choice_dedicated_box_gallery_count"]);
    for ($x = 1; $x <= $third_choice_dedicated_box_gallery_count; $x++) {

        $third_choice_dedicated_box_gallery_title = injection_replace_pic($_POST["third_choice_dedicated_box_gallery_title{$x}"]);
        $third_choice_dedicated_box_gallery_link = injection_replace_pic($_POST["third_choice_dedicated_box_gallery_link{$x}"]);
        $third_choice_dedicated_box_gallery_pic = injection_replace_pic($_POST["third_choice_dedicated_box_gallery_pic{$x}"]);
        if ($x==1){
            $third_choice_dedicated_box_gallery_pic = resize_image_M($third_choice_dedicated_box_gallery_pic,570,370,$img_page_main,'');
        }else{
            $third_choice_dedicated_box_gallery_pic = resize_image_M($third_choice_dedicated_box_gallery_pic,270,150,$img_page_main,'');
        }
        $third_choice_dedicated_box_gallery_avatar7 = injection_replace($_POST["third_choice_dedicated_box_gallery_avatar7{$x}"][0]);
        if ($third_choice_dedicated_box_gallery_avatar7 > "") {
            $third_choice_dedicated_box_gallery_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_dedicated_box_gallery_avatar7;
            if ($x==1){
                $third_choice_dedicated_box_gallery_pic = resize_image_M($third_choice_dedicated_box_gallery_pic,570,370,$img_page_main,'');
            }else{
                $third_choice_dedicated_box_gallery_pic = resize_image_M($third_choice_dedicated_box_gallery_pic,270,150,$img_page_main,'');
            }
        }
        if ($third_choice_dedicated_box_gallery_title > "") {
            insert_templdate($site, '', $la, '', $third_choice_dedicated_box_gallery_title, $third_choice_dedicated_box_gallery_link, $third_choice_dedicated_box_gallery_pic, "third_choice_dedicated_box_gallery$x", 'coms2', $coms_conect);
        }
    }
    //    box3
    $dedicated_boxThree_pic_adress = 0;
    $dedicated_boxThree_pic_adress= injection_replace($_POST["dedicated_boxThree_pic_adress"]);
    $dedicated_boxThree_title= injection_replace($_POST["dedicated_boxThree_title"]);
    $dedicated_boxThree_text= injection_replace($_POST["dedicated_boxThree_text"]);
    $dedicated_boxThree_pic= injection_replace($_POST["dedicated_boxThree_pic"]);
    $dedicated_boxThree_link= injection_replace($_POST["dedicated_boxThree_link"]);
    $dedicated_boxThree_link= resize_image_M($dedicated_boxThree_link,357,589,$img_page_main,'');
    $dedicated_boxThree_link_avatar_orak = injection_replace($_POST["dedicated_boxThree_link_avatar_orak"][0]);
    if ($dedicated_boxThree_link_avatar_orak > "") {
        $dedicated_boxThree_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $dedicated_boxThree_link_avatar_orak;
        $dedicated_boxThree_link= resize_image_M($dedicated_boxThree_link,357,589,$img_page_main,'');

    }
    insert_templdate($site, $dedicated_boxThree_pic_adress, $la, $dedicated_boxThree_text, $dedicated_boxThree_title, $dedicated_boxThree_link, $dedicated_boxThree_pic, "dedicated_boxThree", 'coms2', $coms_conect);

    $dedicated_show_faq_que_pic_adress = 0;
    $dedicated_show_faq_que_pic_adress= injection_replace($_POST["dedicated_show_faq_que_pic_adress"]);
    $dedicated_show_faq_que_pic = 0;
    $dedicated_show_faq_que_pic= injection_replace($_POST["dedicated_show_faq_que_pic"]);
    $cat_faq_text= injection_replace($_POST["cat_faq_text"]);
    $cat_qes_title= injection_replace($_POST["cat_qes_title"]);
    $dedicated_show_faq_que_link = injection_replace_pic($_POST["dedicated_show_faq_que_link"]);
    insert_templdate($site, $dedicated_show_faq_que_pic_adress, $la, $cat_faq_text, $cat_qes_title, $dedicated_show_faq_que_link, $dedicated_show_faq_que_pic, "dedicated_show_faq_que", 'coms2', $coms_conect);

    $dedicated_pop_faq_title= injection_replace($_POST["dedicated_pop_faq_title"]);
    $dedicated_pop_faq_text= injection_replace($_POST["dedicated_pop_faq_text"]);
    $dedicated_pop_faq_pic= injection_replace($_POST["dedicated_pop_faq_pic"]);
    $dedicated_pop_faq_link= injection_replace($_POST["dedicated_pop_faq_link"]);
    $dedicated_pop_faq_pic_adress= injection_replace($_POST["dedicated_pop_faq_pic_adress"]);
    insert_templdate($site, $dedicated_pop_faq_pic_adress, $la, $dedicated_pop_faq_text, $dedicated_pop_faq_title, $dedicated_pop_faq_link, $dedicated_pop_faq_pic, "dedicated_pop_faq", 'coms2', $coms_conect);


    //   article

    $dedicated_title_article_pic_adress = 0;
    $dedicated_title_article_pic_adress= injection_replace($_POST["dedicated_title_article_pic_adress"]);
    $dedicated_title_article_title= injection_replace($_POST["dedicated_title_article_title"]);
    $dedicated_title_article_text= injection_replace($_POST["dedicated_title_article_text"]);
    insert_templdate($site, $dedicated_title_article_pic_adress, $la, $dedicated_title_article_text, $dedicated_title_article_title, '', '', "dedicated_title_article", 'coms2', $coms_conect);

    $ValSelectActive_dedicated_article_title = injection_replace($_POST["ValSelectActive_dedicated_article_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_dedicated_article_title, '', '', "ValSelectActive_dedicated_article", 'coms2', $coms_conect);

    $condition_first_choice_dedicated_article = "name like 'first_choice_dedicated_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_dedicated_article, $coms_conect);
    $first_choice_dedicated_article_count = injection_replace_pic($_POST["first_choice_dedicated_article_count"]);
    for ($i = 1; $i <= $first_choice_dedicated_article_count; $i++) {

        $first_choice_dedicated_article_cat = injection_replace_pic($_POST["first_choice_dedicated_article_cat{$i}"]);
        $first_choice_dedicated_article_subcat_cat = injection_replace_pic($_POST["first_choice_dedicated_article_subcat_cat{$i}"]);
        $first_choice_dedicated_article_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_dedicated_article_Fixed_selection_cat{$i}"]);
        $first_choice_dedicated_article_number = injection_replace_pic($_POST["first_choice_dedicated_article_number{$i}"]);
        if ($first_choice_dedicated_article_subcat_cat > "")
            insert_templdate($site, $first_choice_dedicated_article_number, $la, $first_choice_dedicated_article_Fixed_selection_cat, '', $first_choice_dedicated_article_cat, $first_choice_dedicated_article_subcat_cat, "first_choice_dedicated_article$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_dedicated_article = "name like 'second_choice_dedicated_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_dedicated_article, $coms_conect);
    $second_choice_dedicated_article_count = injection_replace_pic($_POST["second_choice_dedicated_article_count"]);
    for ($i = 1; $i <= $second_choice_dedicated_article_count; $i++) {

        $second_choice_dedicated_article_cat = injection_replace_pic($_POST["second_choice_dedicated_article_cat{$i}"]);
        $second_choice_dedicated_article_subcat_cat = injection_replace_pic($_POST["second_choice_dedicated_article_subcat_cat{$i}"]);
        $second_choice_dedicated_article_subcat_cat_content = injection_replace_pic($_POST["second_choice_dedicated_article_subcat_cat_content{$i}"]);
        if ($second_choice_dedicated_article_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_dedicated_article_subcat_cat_content, $la, '', '', $second_choice_dedicated_article_cat, $second_choice_dedicated_article_subcat_cat, "second_choice_dedicated_article$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_dedicated_article = "name like 'third_choice_dedicated_article%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_dedicated_article, $coms_conect);
    $third_choice_dedicated_article_count = injection_replace_pic($_POST["third_choice_dedicated_article_count"]);
    for ($x = 1; $x <= $third_choice_dedicated_article_count; $x++) {

        $third_choice_dedicated_article_pic_adress = injection_replace_pic($_POST["third_choice_dedicated_article_pic_adress{$x}"]);
        $third_choice_dedicated_article_title = injection_replace_pic($_POST["third_choice_dedicated_article_title{$x}"]);
        $third_choice_dedicated_article_text = injection_replace_pic($_POST["third_choice_dedicated_article_text{$x}"]);


        $third_choice_dedicated_article_pic = injection_replace_pic($_POST["third_choice_dedicated_article_pic{$x}"]);
        $third_choice_dedicated_article_pic = resize_image_M($third_choice_dedicated_article_pic,58,43,$img_page_main,'');
        $third_choice_dedicated_article_avatar7 = injection_replace($_POST["third_choice_dedicated_article_avatar7{$x}"][0]);
        if ($third_choice_dedicated_article_avatar7 > "") {
            $third_choice_dedicated_article_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_dedicated_article_avatar7;
            $third_choice_dedicated_article_pic = resize_image_M($third_choice_dedicated_article_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_dedicated_article_title > "") {
            insert_templdate($site, $third_choice_dedicated_article_pic_adress, $la, $third_choice_dedicated_article_text, $third_choice_dedicated_article_title, '', $third_choice_dedicated_article_pic, "third_choice_dedicated_article$x", 'coms2', $coms_conect);
        }
    }

    //   Light box
    $dedicated_title_LightBox_pic_adress = 0;
    $dedicated_title_LightBox_pic_adress= injection_replace($_POST["dedicated_title_LightBox_pic_adress"]);
    $dedicated_title_LightBox_title= injection_replace($_POST["dedicated_title_LightBox_title"]);
    insert_templdate($site, $dedicated_title_LightBox_pic_adress, $la, '', $dedicated_title_LightBox_title, '', '', "dedicated_title_LightBox", 'coms2', $coms_conect);

    $ValSelectActive_dedicated_LightBox_title = injection_replace($_POST["ValSelectActive_dedicated_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_dedicated_LightBox_title, '', '', "ValSelectActive_dedicated_LightBox", 'coms2', $coms_conect);

    $condition_first_choice_dedicated_LightBox = "name like 'first_choice_dedicated_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_dedicated_LightBox, $coms_conect);
    $first_choice_dedicated_LightBox_count = injection_replace_pic($_POST["first_choice_dedicated_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_dedicated_LightBox_count; $i++) {

        $first_choice_dedicated_LightBox_cat = injection_replace_pic($_POST["first_choice_dedicated_LightBox_cat{$i}"]);
        $first_choice_dedicated_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_dedicated_LightBox_subcat_cat{$i}"]);
        $first_choice_dedicated_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_dedicated_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_dedicated_LightBox_number = injection_replace_pic($_POST["first_choice_dedicated_LightBox_number{$i}"]);
        if ($first_choice_dedicated_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_dedicated_LightBox_number, $la, $first_choice_dedicated_LightBox_Fixed_selection_cat, '', $first_choice_dedicated_LightBox_cat, $first_choice_dedicated_LightBox_subcat_cat, "first_choice_dedicated_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_second_choice_dedicated_LightBox = "name like 'second_choice_dedicated_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_dedicated_LightBox, $coms_conect);
    $second_choice_dedicated_LightBox_count = injection_replace_pic($_POST["second_choice_dedicated_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_dedicated_LightBox_count; $i++) {

        $second_choice_dedicated_LightBox_cat = injection_replace_pic($_POST["second_choice_dedicated_LightBox_cat{$i}"]);
        $second_choice_dedicated_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_dedicated_LightBox_subcat_cat{$i}"]);
        $second_choice_dedicated_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_dedicated_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_dedicated_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_dedicated_LightBox_subcat_cat_content, $la, '', '', $second_choice_dedicated_LightBox_cat, $second_choice_dedicated_LightBox_subcat_cat, "second_choice_dedicated_LightBox$i", 'coms2', $coms_conect);
    }

    $condition_third_choice_dedicated_LightBox = "name like 'third_choice_dedicated_LightBox%' and tem_name='coms2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_dedicated_LightBox, $coms_conect);
    $third_choice_dedicated_LightBox_count = injection_replace_pic($_POST["third_choice_dedicated_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_dedicated_LightBox_count; $x++) {

        $third_choice_dedicated_LightBox_title = injection_replace_pic($_POST["third_choice_dedicated_LightBox_title{$x}"]);
        $third_choice_dedicated_LightBox_text = injection_replace_pic($_POST["third_choice_dedicated_LightBox_text{$x}"]);
        $third_choice_dedicated_LightBox_link = injection_replace_pic($_POST["third_choice_dedicated_LightBox_link{$x}"]);
        $third_choice_dedicated_LightBox_pic = injection_replace_pic($_POST["third_choice_dedicated_LightBox_pic{$x}"]);
        $third_choice_dedicated_LightBox_pic = resize_image_M($third_choice_dedicated_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_dedicated_LightBox_avatar7 = injection_replace($_POST["third_choice_dedicated_LightBox_avatar7{$x}"][0]);
        if ($third_choice_dedicated_LightBox_avatar7 > "") {
            $third_choice_dedicated_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_dedicated_LightBox_avatar7;
            $third_choice_dedicated_LightBox_pic = resize_image_M($third_choice_dedicated_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_dedicated_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_dedicated_LightBox_text, $third_choice_dedicated_LightBox_title, $third_choice_dedicated_LightBox_link, $third_choice_dedicated_LightBox_pic, "third_choice_dedicated_LightBox$x", 'coms2', $coms_conect);
        }
    }
//  header_seo
    $dedicated_header_seo_keyword= injection_replace($_POST["dedicated_header_seo_keyword"]);
    $dedicated_header_seo_desciption= injection_replace($_POST["dedicated_header_seo_desciption"]);
    $dedicated_header_seo_pic= injection_replace($_POST["dedicated_header_seo_pic"]);
    $dedicated_header_seo_pic_adress = injection_replace($_POST["dedicated_header_seo_pic_adress"]);
    $dedicated_header_seo_pic_adress = resize_image_M($dedicated_header_seo_pic_adress,20,20,$img_page_main,'');
    $dedicated_header_seo_pic_adress_avatar_orak = injection_replace($_POST["dedicated_header_seo_pic_adress_avatar_orak"][0]);
    if($dedicated_header_seo_pic_adress_avatar_orak>""){
        $dedicated_header_seo_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $dedicated_header_seo_pic_adress_avatar_orak;
        $dedicated_header_seo_pic_adress = resize_image_M($dedicated_header_seo_pic_adress,20,20,$img_page_main,'');

    }
    insert_templdate($site, $dedicated_header_seo_pic_adress, $la, $dedicated_header_seo_desciption, $dedicated_header_seo_keyword, '', $dedicated_header_seo_pic, "dedicated_header_seo", 'coms2', $coms_conect);

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
                                        <a class="z-link">dedicated</a>
                                    </li>
                                    <li class="z-tab H_style_header " data-link="tab2">
                                        <a class="z-link">باکس سوم</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------dedicated---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $dedicated_box1 = get_tem_result($site, $la, "dedicated_box1", 'coms2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_dedicated_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $dedicated_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_box1 H_dis_none"
                                                               name="dedicated_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $dedicated_box2 = get_tem_result($site, $la, "dedicated_box2", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_box2 H_dis_none"
                                                               name="dedicated_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $dedicated_title_box3 = get_tem_result($site, $la, "dedicated_title_box3", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_title_box3 H_dis_none"
                                                               name="dedicated_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $dedicated_title_box4 = get_tem_result($site, $la, "dedicated_title_box4", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_title_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_title_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_title_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_title_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_title_box4 H_dis_none"
                                                               name="dedicated_title_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $dedicated_title_box5 = get_tem_result($site, $la, "dedicated_title_box5", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_title_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_title_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_title_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_title_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_title_box5 H_dis_none"
                                                               name="dedicated_title_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $dedicated_title_box6 = get_tem_result($site, $la, "dedicated_title_box6", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_title_box6" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_title_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_title_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_title_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_title_box6 H_dis_none"
                                                               name="dedicated_title_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $dedicated_title_box7 = get_tem_result($site, $la, "dedicated_title_box7", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_title_box7" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_title_box7['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_title_box7 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_title_box7_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_title_box7 H_dis_none"
                                                               name="dedicated_title_box7_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $dedicated_title_box8 = get_tem_result($site, $la, "dedicated_title_box8", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_title_box8" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_title_box8['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_title_box8 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_title_box8_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_title_box8 H_dis_none"
                                                               name="dedicated_title_box8_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $dedicated_title_box9 = get_tem_result($site, $la, "dedicated_title_box9", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_title_box9" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_title_box9['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_title_box9 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_title_box9_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_title_box9 H_dis_none"
                                                               name="dedicated_title_box9_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $dedicated_title_box10 = get_tem_result($site, $la, "dedicated_title_box10", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_dedicated_title_box10" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $dedicated_title_box10['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_dedicated_title_box10 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_dedicated_title_box10_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_dedicated_title_box10 H_dis_none"
                                                               name="dedicated_title_box10_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $dedicated_boxOne = get_tem_result($site, $la, "dedicated_boxOne", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxOne_title"
                                                                           value="<?= $dedicated_boxOne['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم روی عکس زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxOne_text"
                                                                           value="<?= $dedicated_boxOne['text'] ?>" style="direction: rtl;">
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
                                                                                                                                                       id="dedicated_boxOne_pic"
                                                                                                                                                       value="<?=$dedicated_boxOne['pic']?>"
                                                                                                                                                       class="form-control"
                                                                                                                                                       placeholder=" تصویر"
                                                                                                                                                       name="dedicated_boxOne_pic"
                                                                                                                                                       style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=dedicated_boxOne_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="dedicated_boxOne_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_dedicated_boxOne_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_dedicated_boxOne_pic">
                                                                        <a href="<?= $dedicated_boxOne["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $dedicated_boxOne["pic"] ?>" alt="<?= $dedicated_boxOne["pic"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#dedicated_boxOne_pic_avatar_orak').orakuploader({
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

                                                                            $('#dedicated_boxOne_pic_avatar_orak').html("<?=$pic_str?>");
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
                                                                            $dedicated_content_BoxOne1 = get_tem_result($site, $la, "dedicated_content_BoxOne1", 'coms2', $coms_conect);
                                                                            $dedicated_content_BoxOne2 = get_tem_result($site, $la, "dedicated_content_BoxOne2", 'coms2', $coms_conect);
                                                                            ?>
                                                                            <div id="div_mother_third_choicedel_dedicated_content_BoxOne1"
                                                                                 class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="form-group col-md-12">

                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="dedicated_content_BoxOne1_title"
                                                                                                   value="<?= $dedicated_content_BoxOne1["title"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder=" عنوان اول"
                                                                                                   name="dedicated_content_BoxOne1_title">
                                                                                        </div>
                                                                                        <div class="col-md-3 input-group">
                                                                                            <input type="text"
                                                                                                   id="dedicated_content_BoxOne1_link"
                                                                                                   value="<?= $dedicated_content_BoxOne1["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دوم"
                                                                                                   name="dedicated_content_BoxOne1_link">
                                                                                        </div>


                                                                                        <div class="col-md-5 input-group">
                                                                                            <input type="text"
                                                                                                   id="dedicated_content_BoxOne1_pic_adress"
                                                                                                   value="<?=$dedicated_content_BoxOne1["pic_adress"]?>"

                                                                                                   class="form-control"
                                                                                                   placeholder=" تصویر"
                                                                                                   name="dedicated_content_BoxOne1_pic_adress"
                                                                                                   style="direction: ltr;">
                                                                                            <span class="input-group-addon"
                                                                                                  style="padding: 0;"><a
                                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=dedicated_content_BoxOne1_pic_adress"
                                                                                                        class="btn btn-success iframe-btn"
                                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                            class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                            <span class="input-group-addon H_neshane1 H_dedicated_content_BoxOne1"
                                                                                                  style="padding: 0px;">
                                                                                    <div id="dedicated_content_BoxOne1_avatar7"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="dedicated_content_BoxOne1_avatar7_link"
                                                                                       name="dedicated_content_BoxOne1_avatar7_link"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                        </div>
                                                                                        <div class="ui-sortable red box"
                                                                                             id="upload_type_dedicated_content_BoxOne1"
                                                                                             style="float:right;">
                                                                                        </div>
                                                                                        <div class=" col-md-1 input-group"
                                                                                             id="image_show_dedicated_content_BoxOne1">

                                                                                            <a href="<?= $dedicated_content_BoxOne1["pic_adress"] ?>"
                                                                                               class=" without-caption">
                                                                                                <img width="33"
                                                                                                     height="33"
                                                                                                     class="H_cursor_zoom"
                                                                                                     src="<?= $dedicated_content_BoxOne1["pic_adress"] ?>"
                                                                                                     alt="<?= $dedicated_content_BoxOne1["title"] ?>">
                                                                                            </a>

                                                                                        </div>

                                                                                        <script type="text/javascript">
                                                                                            $(document).ready(function () {
                                                                                                $('#dedicated_content_BoxOne1_avatar7').orakuploader({
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

                                                                                                $('#dedicated_content_BoxOne1_avatar7').html("<?=$pic_str?>");
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="dedicated_content_BoxOne1_pic"
                                                                                                   value="<?= $dedicated_content_BoxOne1["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="dedicated_content_BoxOne1_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="dedicated_content_BoxOne1_text"
                                                                                                   value="<?= $dedicated_content_BoxOne1["text"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="dedicated_content_BoxOne1_text">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="col-md-12 input-group H_pl32">
                                                                                               <textarea type="text"
                                                                                                         id="dedicated_content_BoxOne2_text"
                                                                                                         class="form-control"
                                                                                                         placeholder="متن"
                                                                                                         name="dedicated_content_BoxOne2_text"><?= $dedicated_content_BoxOne2["text"] ?>
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
                                                        <? $dedicated_menubox_show = get_tem_result($site, $la, "dedicated_menubox_show", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_menubox_show['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_menubox_show_pic_adress"
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
                                                                            <? $count_dedicated_menubox_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'dedicated_menubox_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_dedicated_menubox_links; $k++) {
                                                                                $dedicated_menubox_links = get_tem_result($site, $la, "dedicated_menubox_links$k", 'coms2', $coms_conect);
                                                                                if ($dedicated_menubox_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_dedicated_menubox_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_dedicated_menubox_links"
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
                                                                                                           id="dedicated_menubox_links_title<?= $k ?>"
                                                                                                           value="<?= $dedicated_menubox_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="dedicated_menubox_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="dedicated_menubox_links_link<?= $k ?>"
                                                                                                           value="<?= $dedicated_menubox_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="dedicated_menubox_links_link<?= $k ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_dedicated_menubox_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="dedicated_menubox_links_count"
                                                                                   name="dedicated_menubox_links_count"
                                                                                   value="<?= --$count_dedicated_menubox_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_dedicated_menubox_links').on("click", function () {
                                                                                        var someText = '<div id="ads_dedicated_menubox_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_dedicated_menubox_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان ' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="dedicated_menubox_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="dedicated_menubox_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="dedicated_menubox_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="dedicated_menubox_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_dedicated_menubox_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#dedicated_menubox_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_dedicated_menubox_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#dedicated_menubox_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_dedicated_menubox_links' + id).remove();
                                                                                        $('#dedicated_menubox_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_dedicated_menubox_links"><i
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

                                                <!-------------------box3 tab------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $dedicated_boxThreeTab = get_tem_result($site, $la, "dedicated_boxThreeTab", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_boxThreeTab['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_boxThreeTab_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxThreeTab_title"
                                                                           value="<?= $dedicated_boxThreeTab['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxThreeTab_text"
                                                                           value="<?= $dedicated_boxThreeTab['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان نوار زیر باکس</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxThreeTab_pic"
                                                                           value="<?= $dedicated_boxThreeTab['pic'] ?>" style="direction: rtl;">
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
                                                                            $count1_dedicated_boxThree_tit = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'dedicated_boxThree_tit%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_dedicated_boxThree_tit; $x++) {
                                                                                $dedicated_boxThree_tit = get_tem_result($site, $la, "dedicated_boxThree_tit$x", 'coms2', $coms_conect);
                                                                                if ($dedicated_boxThree_tit['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_dedicated_boxThree_tit<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_dedicated_boxThree_tit"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>

                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-12 input-group">
                                                                                                    <input type="text"
                                                                                                           id="dedicated_boxThree_tit_text<?= $x ?>"
                                                                                                           value="<?= $dedicated_boxThree_tit["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان "
                                                                                                           name="dedicated_boxThree_tit_text<?= $x ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $xcount_mahsol = $x;
                                                                            ?>
                                                                            <input type="hidden" id="dedicated_boxThree_tit_count"
                                                                                   name="dedicated_boxThree_tit_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_dedicated_boxThree_tit-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_dedicated_boxThree_tit' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_dedicated_boxThree_tit" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-12 input-group"><input type="text" id="dedicated_boxThree_tit_text' + i + '" value="" class="form-control" placeholder="عنوان" name="dedicated_boxThree_tit_text' + i + '" ></div> </div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_dedicated_boxThree_tit' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#dedicated_boxThree_tit_count').val(i);

                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_dedicated_boxThree_tit', function () {
                                                                                        var id = '';
                                                                                        var k = $('#dedicated_boxThree_tit_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');

                                                                                        $('#div_mother_third_choicedel_dedicated_boxThree_tit' + id).remove();
                                                                                        $('#dedicated_boxThree_tit_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_dedicated_boxThree_tit-ads"><i
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

                                                        <? $dedicated_boxTwo = get_tem_result($site, $la, "dedicated_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxTwo_title"
                                                                           value="<?= $dedicated_boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxTwo_text"
                                                                           value="<?= $dedicated_boxTwo['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <? $ValSelectActive_dedicated_boxTwo = get_tem_result($site, $la, "ValSelectActive_dedicated_boxTwo", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_dedicated_boxTwo"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_dedicated_boxTwo"
                                                                    name="select_type_dedicated_boxTwo">

                                                                <option <? if ($ValSelectActive_dedicated_boxTwo["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_dedicated_boxTwo["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_dedicated_boxTwo["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_dedicated_boxTwo_title" type="hidden"
                                                                   value="<?= $ValSelectActive_dedicated_boxTwo["title"] ?>">

                                                            <div class="tab-pane opt_dedicated_boxTwo dedicated_boxTwo_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_dedicated_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_dedicated_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_dedicated_boxTwo; $j++) {
                                                                                    $first_choice_dedicated_boxTwo = get_tem_result($site, $la, "first_choice_dedicated_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_dedicated_boxTwo['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_dedicated_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_dedicated_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_dedicated_boxTwo col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_dedicated_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_dedicated_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_dedicated_boxTwo['pic'] ?>">

                                                                                                        <select id="first_choice_dedicated_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_dedicated_boxTwo_cat"
                                                                                                                name="first_choice_dedicated_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_dedicated_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_dedicated_boxTwo<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_dedicated_boxTwo_new&id=" + $("#first_choice_dedicated_boxTwo_cat<?=$j?>").val() + "&value=" + $("#first_choice_dedicated_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_dedicated_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_dedicated_boxTwo_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_dedicated_boxTwo_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_boxTwo['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_boxTwo['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_boxTwo['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_dedicated_boxTwo_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_dedicated_boxTwo["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_dedicated_boxTwo_number<?= $j ?>">
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
                                                                                       id="first_choice_dedicated_boxTwo_count"
                                                                                       name="first_choice_dedicated_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_dedicated_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_dedicated_boxTwo').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_dedicated_boxTwo_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_dedicated_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_dedicated_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_dedicated_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_dedicated_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_dedicated_boxTwo col-md-4 input-group"><input type="hidden" id="first_choice_dedicated_boxTwo_subcat_val' + i + '"  name="first_choice_dedicated_boxTwo_subcat_val' + i + '" value=""> <select id="first_choice_dedicated_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_dedicated_boxTwo_cat" name="first_choice_dedicated_boxTwo_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_dedicated_boxTwo' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_dedicated_boxTwo_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_dedicated_boxTwo_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_dedicated_boxTwo_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_dedicated_boxTwo_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_dedicated_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_dedicated_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_dedicated_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_dedicated_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_dedicated_boxTwo' + id).remove();
                                                                                            $('#first_choice_dedicated_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_dedicated_boxTwo"><i
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

                                                            <div class="tab-pane opt_dedicated_boxTwo dedicated_boxTwo_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_dedicated_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_dedicated_boxTwo%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_dedicated_boxTwo; $j++) {
                                                                                    $second_choice_dedicated_boxTwo = get_tem_result($site, $la, "second_choice_dedicated_boxTwo$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_dedicated_boxTwo['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_dedicated_boxTwo<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_dedicated_boxTwo"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_dedicated_boxTwo col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_dedicated_boxTwo_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_dedicated_boxTwo_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_dedicated_boxTwo['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_dedicated_boxTwo_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_dedicated_boxTwo_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_dedicated_boxTwo['pic_adress'] ?>">

                                                                                                        <select id="second_choice_dedicated_boxTwo_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_dedicated_boxTwo_cat"
                                                                                                                name="second_choice_dedicated_boxTwo_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_dedicated_boxTwo['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_dedicated_boxTwo<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_dedicated_boxTwo_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_dedicated_boxTwo&id=" + $("#second_choice_dedicated_boxTwo_cat<?=$j?>").val() + "&value=" + $("#second_choice_dedicated_boxTwo_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_dedicated_boxTwo<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_dedicated_boxTwo_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_dedicated_boxTwo_content&id=" + $("#second_choice_dedicated_boxTwo_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_dedicated_boxTwo_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_dedicated_boxTwo_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_dedicated_boxTwo_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_dedicated_boxTwo_count"
                                                                                       name="second_choice_dedicated_boxTwo_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_dedicated_boxTwo_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_dedicated_boxTwo').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_dedicated_boxTwo<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_dedicated_boxTwo_neshane").change(function () {
                                                                                        var j = $("#second_choice_dedicated_boxTwo_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_boxTwo&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_dedicated_boxTwo' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_dedicated_boxTwo_neshane', function () {
                                                                                        var j = $("#second_choice_dedicated_boxTwo_count").val();
                                                                                        //  $(".second_choice_dedicated_boxTwo_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_boxTwo_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_dedicated_boxTwo_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_dedicated_boxTwo').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_dedicated_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_dedicated_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_dedicated_boxTwo col-md-3 input-group"><input type="hidden" id="second_choice_dedicated_boxTwo_subcat_val' + i + '"  name="second_choice_dedicated_boxTwo_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_dedicated_boxTwo_subcat_link' + i + '"  name="second_choice_dedicated_boxTwo_subcat_link' + i + '" value=""> <select id="second_choice_dedicated_boxTwo_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_dedicated_boxTwo_cat" name="second_choice_dedicated_boxTwo_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_dedicated_boxTwo' + i + '" class="col-md-3 input-group"></div><div id="second_choice_dedicated_boxTwo_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_dedicated_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_dedicated_boxTwo_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_dedicated_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_dedicated_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_dedicated_boxTwo' + id).remove();
                                                                                            $('#second_choice_dedicated_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_dedicated_boxTwo"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_dedicated_boxTwo dedicated_boxTwo_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_dedicated_boxTwo = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_dedicated_boxTwo%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_dedicated_boxTwo; $x++) {
                                                                                    $third_choice_dedicated_boxTwo = get_tem_result($site, $la, "third_choice_dedicated_boxTwo$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_dedicated_boxTwo['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_dedicated_boxTwo<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_dedicated_boxTwo"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_boxTwo_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_dedicated_boxTwo["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_dedicated_boxTwo_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_boxTwo_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_dedicated_boxTwo["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_dedicated_boxTwo_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_boxTwo_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_dedicated_boxTwo["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_dedicated_boxTwo_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_dedicated_boxTwo_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_dedicated_boxTwo<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_dedicated_boxTwo_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_dedicated_boxTwo_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_dedicated_boxTwo_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_dedicated_boxTwo<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_dedicated_boxTwo["pic"]!=""){?>
                                                                                                        <div class="input-group"
                                                                                                             id="image_show_third_choice_dedicated_boxTwo<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_dedicated_boxTwo["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_dedicated_boxTwo["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_dedicated_boxTwo["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_dedicated_boxTwo_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_dedicated_boxTwo_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_dedicated_boxTwo_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_dedicated_boxTwo['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_dedicated_boxTwo_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_dedicated_boxTwo_text<?= $x ?>"><?= $third_choice_dedicated_boxTwo["text"] ?>

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
                                                                                       id="third_choice_dedicated_boxTwo_count"
                                                                                       name="third_choice_dedicated_boxTwo_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_dedicated_boxTwo-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_dedicated_boxTwo' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_dedicated_boxTwo" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_dedicated_boxTwo_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_dedicated_boxTwo_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_dedicated_boxTwo_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_dedicated_boxTwo_link' + i + '" ></div><div class="col-md-4 input-group"> <input type="text" id="third_choice_dedicated_boxTwo_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_dedicated_boxTwo_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_dedicated_boxTwo_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_dedicated_boxTwo' + i + '" style="padding: 0px;"><div  id="third_choice_dedicated_boxTwo_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_dedicated_boxTwo_avatar7_link' + i + '" name="third_choice_dedicated_boxTwo_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_dedicated_boxTwo' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_dedicated_boxTwo_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_dedicated_boxTwo_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_dedicated_boxTwo_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_dedicated_boxTwo' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_dedicated_boxTwo_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_dedicated_boxTwo_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_dedicated_boxTwo_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_dedicated_boxTwo' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_dedicated_boxTwo' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_dedicated_boxTwo', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_dedicated_boxTwo_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_dedicated_boxTwo' + id).remove();
                                                                                            $('#third_choice_dedicated_boxTwo_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_dedicated_boxTwo-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_dedicated_boxTwo_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_dedicated_boxTwo"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_dedicated_boxTwo_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_dedicated_boxTwo').hide();
                                                                        $('.dedicated_boxTwo_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>


                                                    </center>
                                                </div>
                                                <!-----------------box gallery------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $dedicated_box_gallery = get_tem_result($site, $la, "dedicated_box_gallery", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_box_gallery['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_box_gallery_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_box_gallery_title"
                                                                           value="<?= $dedicated_box_gallery['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_box_gallery_text"
                                                                           value="<?= $dedicated_box_gallery['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_box_gallery_pic"
                                                                           value="<?= $dedicated_box_gallery['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_box_gallery_link"
                                                                           value="<?= $dedicated_box_gallery['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:5 »</h5><br>
                                                        <? $ValSelectActive_dedicated_box_gallery = get_tem_result($site, $la, "ValSelectActive_dedicated_box_gallery", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_dedicated_box_gallery"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_dedicated_box_gallery"
                                                                    name="select_type_dedicated_box_gallery">

                                                                <option <? if ($ValSelectActive_dedicated_box_gallery["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_dedicated_box_gallery["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_dedicated_box_gallery["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_dedicated_box_gallery_title" type="hidden"
                                                                   value="<?= $ValSelectActive_dedicated_box_gallery["title"] ?>">

                                                            <div class="tab-pane opt_dedicated_box_gallery dedicated_box_gallery_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_dedicated_box_gallery = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_dedicated_box_gallery%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_dedicated_box_gallery; $j++) {
                                                                                    $first_choice_dedicated_box_gallery = get_tem_result($site, $la, "first_choice_dedicated_box_gallery$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_dedicated_box_gallery['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_dedicated_box_gallery<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_dedicated_box_gallery"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_dedicated_box_gallery col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_dedicated_box_gallery_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_dedicated_box_gallery_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_dedicated_box_gallery['pic'] ?>">

                                                                                                        <select id="first_choice_dedicated_box_gallery_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_dedicated_box_gallery_cat"
                                                                                                                name="first_choice_dedicated_box_gallery_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_dedicated_box_gallery['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_dedicated_box_gallery<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_dedicated_box_gallery_new&id=" + $("#first_choice_dedicated_box_gallery_cat<?=$j?>").val() + "&value=" + $("#first_choice_dedicated_box_gallery_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_dedicated_box_gallery<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_dedicated_box_gallery_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_dedicated_box_gallery_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_box_gallery['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_box_gallery['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_box_gallery['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_dedicated_box_gallery_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_dedicated_box_gallery["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_dedicated_box_gallery_number<?= $j ?>">
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
                                                                                       id="first_choice_dedicated_box_gallery_count"
                                                                                       name="first_choice_dedicated_box_gallery_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_dedicated_box_gallery_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_dedicated_box_gallery').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_dedicated_box_gallery_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_dedicated_box_gallery<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_dedicated_box_gallery').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_dedicated_box_gallery' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_dedicated_box_gallery" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_dedicated_box_gallery col-md-4 input-group"><input type="hidden" id="first_choice_dedicated_box_gallery_subcat_val' + i + '"  name="first_choice_dedicated_box_gallery_subcat_val' + i + '" value=""> <select id="first_choice_dedicated_box_gallery_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_dedicated_box_gallery_cat" name="first_choice_dedicated_box_gallery_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_dedicated_box_gallery' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_dedicated_box_gallery_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_dedicated_box_gallery_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_dedicated_box_gallery_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_dedicated_box_gallery_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_dedicated_box_gallery' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_dedicated_box_gallery_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_dedicated_box_gallery', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_dedicated_box_gallery_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_dedicated_box_gallery' + id).remove();
                                                                                            $('#first_choice_dedicated_box_gallery_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_dedicated_box_gallery"><i
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

                                                            <div class="tab-pane opt_dedicated_box_gallery dedicated_box_gallery_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_dedicated_box_gallery = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_dedicated_box_gallery%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_dedicated_box_gallery; $j++) {
                                                                                    $second_choice_dedicated_box_gallery = get_tem_result($site, $la, "second_choice_dedicated_box_gallery$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_dedicated_box_gallery['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_dedicated_box_gallery<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_dedicated_box_gallery"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_dedicated_box_gallery col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_dedicated_box_gallery_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_dedicated_box_gallery_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_dedicated_box_gallery['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_dedicated_box_gallery_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_dedicated_box_gallery_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_dedicated_box_gallery['pic_adress'] ?>">

                                                                                                        <select id="second_choice_dedicated_box_gallery_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_dedicated_box_gallery_cat"
                                                                                                                name="second_choice_dedicated_box_gallery_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_dedicated_box_gallery['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_dedicated_box_gallery<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_dedicated_box_gallery_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_dedicated_box_gallery&id=" + $("#second_choice_dedicated_box_gallery_cat<?=$j?>").val() + "&value=" + $("#second_choice_dedicated_box_gallery_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_dedicated_box_gallery<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_dedicated_box_gallery_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_dedicated_box_gallery_content&id=" + $("#second_choice_dedicated_box_gallery_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_dedicated_box_gallery_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_dedicated_box_gallery_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_dedicated_box_gallery_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_dedicated_box_gallery_count"
                                                                                       name="second_choice_dedicated_box_gallery_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_dedicated_box_gallery_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_dedicated_box_gallery').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_box_gallery&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_dedicated_box_gallery<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_dedicated_box_gallery_neshane").change(function () {
                                                                                        var j = $("#second_choice_dedicated_box_gallery_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_box_gallery&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_dedicated_box_gallery' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_dedicated_box_gallery_neshane', function () {
                                                                                        var j = $("#second_choice_dedicated_box_gallery_count").val();
                                                                                        //  $(".second_choice_dedicated_box_gallery_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_box_gallery_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_dedicated_box_gallery_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_dedicated_box_gallery').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_dedicated_box_gallery' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_dedicated_box_gallery" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_dedicated_box_gallery col-md-3 input-group"><input type="hidden" id="second_choice_dedicated_box_gallery_subcat_val' + i + '"  name="second_choice_dedicated_box_gallery_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_dedicated_box_gallery_subcat_link' + i + '"  name="second_choice_dedicated_box_gallery_subcat_link' + i + '" value=""> <select id="second_choice_dedicated_box_gallery_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_dedicated_box_gallery_cat" name="second_choice_dedicated_box_gallery_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_dedicated_box_gallery' + i + '" class="col-md-3 input-group"></div><div id="second_choice_dedicated_box_gallery_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_dedicated_box_gallery' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_dedicated_box_gallery_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_dedicated_box_gallery', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_dedicated_box_gallery_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_dedicated_box_gallery' + id).remove();
                                                                                            $('#second_choice_dedicated_box_gallery_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_dedicated_box_gallery"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_dedicated_box_gallery dedicated_box_gallery_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_dedicated_box_gallery = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_dedicated_box_gallery%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_dedicated_box_gallery; $x++) {
                                                                                    $third_choice_dedicated_box_gallery = get_tem_result($site, $la, "third_choice_dedicated_box_gallery$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_dedicated_box_gallery['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_dedicated_box_gallery<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_dedicated_box_gallery"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_box_gallery_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_dedicated_box_gallery["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_dedicated_box_gallery_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_box_gallery_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_dedicated_box_gallery["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_dedicated_box_gallery_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_box_gallery_pic<?= $x ?>"
                                                                                                            <?if ($x==1){?>
                                                                                                                value="<?=$third_choice_dedicated_box_gallery["pic"]?>"
                                                                                                            <?}else{?>
                                                                                                                value="<?=$third_choice_dedicated_box_gallery["pic"]?>"
                                                                                                            <?}?>
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_dedicated_box_gallery_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_dedicated_box_gallery_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_dedicated_box_gallery<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_dedicated_box_gallery_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_dedicated_box_gallery_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_dedicated_box_gallery_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_dedicated_box_gallery<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_dedicated_box_gallery["pic"]!=""){?>
                                                                                                        <div class="input-group"
                                                                                                             id="image_show_third_choice_dedicated_box_gallery<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_dedicated_box_gallery["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_dedicated_box_gallery["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_dedicated_box_gallery["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_dedicated_box_gallery_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_dedicated_box_gallery_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                                       id="third_choice_dedicated_box_gallery_count"
                                                                                       name="third_choice_dedicated_box_gallery_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_dedicated_box_gallery-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_dedicated_box_gallery' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_dedicated_box_gallery" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_dedicated_box_gallery_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_dedicated_box_gallery_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_dedicated_box_gallery_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_dedicated_box_gallery_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="third_choice_dedicated_box_gallery_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_dedicated_box_gallery_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_dedicated_box_gallery_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_dedicated_box_gallery' + i + '" style="padding: 0px;"><div  id="third_choice_dedicated_box_gallery_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_dedicated_box_gallery_avatar7_link' + i + '" name="third_choice_dedicated_box_gallery_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_dedicated_box_gallery' + i + '" style="float:right;"></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_dedicated_box_gallery' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_dedicated_box_gallery_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_dedicated_box_gallery_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_dedicated_box_gallery_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_dedicated_box_gallery' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_dedicated_box_gallery' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_dedicated_box_gallery', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_dedicated_box_gallery_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_dedicated_box_gallery' + id).remove();
                                                                                            $('#third_choice_dedicated_box_gallery_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_dedicated_box_gallery-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_dedicated_box_gallery_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_dedicated_box_gallery"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_dedicated_box_gallery_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_dedicated_box_gallery').hide();
                                                                        $('.dedicated_box_gallery_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------box5------------------->
                                                <div  id="content6" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $dedicated_boxThree = get_tem_result($site, $la, "dedicated_boxThree", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_boxThree['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_boxThree_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxThree_title"
                                                                           value="<?= $dedicated_boxThree['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxThree_text"
                                                                           value="<?= $dedicated_boxThree['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_boxThree_pic"
                                                                           value="<?= $dedicated_boxThree['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $dedicated_show_faq_que = get_tem_result($site, $la, "dedicated_show_faq_que", 'coms2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-6 control-label" for="family">نمایش «سوالات متداول» </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_show_faq_que['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_show_faq_que_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_dedicated_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type='100' and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_faq_text' id='cat_faq_text' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $dedicated_show_faq_que['text'])
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
                                                                           type="checkbox" <? if ($dedicated_show_faq_que['pic'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_show_faq_que_pic"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="col-md-3 control-label" for="family">انتخاب دسته بندی</label>
                                                            <div class=" H_first_choice_dedicated_boxTwo col-md-4 input-group">
                                                                <?$sql = "SELECT name,id FROM new_modules_cat where type=99 and la='$la'";
                                                                $result = $coms_conect->query($sql);
                                                                echo "<select name='cat_qes_title' id='cat_qes_title' class='form-control' rows='2' >";
                                                                while($row = $result->fetch_assoc()) {
                                                                    $name=$row['name'];
                                                                    $id=$row['id'];
                                                                    $str="";
                                                                    if ($id == $dedicated_show_faq_que['title'])
                                                                        $str="selected";
                                                                    echo "<option $str value='$id'>$name</option> ";
                                                                }
                                                                echo '</select>';?>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr style="margin: 40px  0 15px 0">

                                                        <? $dedicated_pop_faq = get_tem_result($site, $la, "dedicated_pop_faq", 'coms2', $coms_conect); ?>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اطلاعات داخل پاپاپ »</h5><br>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_pop_faq_title"
                                                                           value="<?= $dedicated_pop_faq['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_pop_faq_text"
                                                                           value="<?= $dedicated_pop_faq['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان سمت چپ</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_pop_faq_pic"
                                                                           value="<?= $dedicated_pop_faq['pic'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن شعار</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_pop_faq_link"
                                                                           value="<?= $dedicated_pop_faq['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_pop_faq_pic_adress"
                                                                           value="<?= $dedicated_pop_faq['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_show_faq_que_link"
                                                                           value="<?= $dedicated_show_faq_que['link'] ?>" style="direction: rtl;">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="dedicated_boxThree_link"
                                                                               value="<?=$dedicated_boxThree['link']?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="dedicated_boxThree_link"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=dedicated_boxThree_link"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="dedicated_boxThree_link_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_dedicated_boxThree_link"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_dedicated_boxThree_link">
                                                                        <a href="<?= $dedicated_boxThree["link"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $dedicated_boxThree["link"] ?>" alt="<?= $dedicated_boxThree["link"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#dedicated_boxThree_link_avatar_orak').orakuploader({
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

                                                                            $('#dedicated_boxThree_link_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------slideshow box5------------------->
                                                <div  id="content7" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $dedicated_slide_box5 = get_tem_result($site, $la, "dedicated_slide_box5", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_slide_box5['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_slide_box5_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_slide_box5_title"
                                                                           value="<?= $dedicated_slide_box5['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">دکمه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_slide_box5_pic"
                                                                           value="<?= $dedicated_slide_box5['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                                <div class="col-md-6 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_slide_box5_link"
                                                                           value="<?= $dedicated_slide_box5['link'] ?>" style="direction: rtl;">
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
                                                                            $count1_dedicated_slide_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'dedicated_slide_boxFive%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_dedicated_slide_boxFive; $x++) {
                                                                                $dedicated_slide_boxFive = get_tem_result($site, $la, "dedicated_slide_boxFive$x", 'coms2', $coms_conect);
                                                                                if ($dedicated_slide_boxFive['title'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_dedicated_slide_boxFive<?= $x ?>"
                                                                                         class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_dedicated_slide_boxFive"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title=""
                                                                                                        data-original-title="حذف"></i>
                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-5 input-group">
                                                                                                    <input type="text"
                                                                                                           id="dedicated_slide_boxFive_title<?= $x ?>"
                                                                                                           value="<?= $dedicated_slide_boxFive["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="dedicated_slide_boxFive_title<?= $x ?>">
                                                                                                </div>

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="dedicated_slide_boxFive_pic_adress<?= $x ?>"
                                                                                                           value="<?=$dedicated_slide_boxFive["pic_adress"]?>"

                                                                                                           class="form-control"
                                                                                                           placeholder=" تصویر"
                                                                                                           name="dedicated_slide_boxFive_pic_adress<?= $x ?>"
                                                                                                           style="direction: ltr;">
                                                                                                    <span class="input-group-addon"
                                                                                                          style="padding: 0px;"><a
                                                                                                                href="/filemanager/dialog.php?type=2&amp;field_id=dedicated_slide_boxFive_pic_adress<?= $x ?>"
                                                                                                                class="btn btn-success iframe-btn"
                                                                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                    class="addimg flaticon-add139"></span></a>
                                                            </span>
                                                                                                    <span class="input-group-addon H_neshane1 H_dedicated_slide_boxFive<?= $x ?>"
                                                                                                          style="padding: 0px;">
                                                                                    <div id="dedicated_slide_boxFive_avatar7<?= $x ?>"
                                                                                         orakuploader="on"></div>
                                                                                <input type="hidden"
                                                                                       id="dedicated_slide_boxFive_avatar7_link<?= $x ?>"
                                                                                       name="dedicated_slide_boxFive_avatar7_link<?= $x ?>"
                                                                                       value="<? ?>">
                                                            </span>
                                                                                                </div>
                                                                                                <div class="ui-sortable red box"
                                                                                                     id="upload_type_dedicated_slide_boxFive<?= $x ?>"
                                                                                                     style="float:right;">
                                                                                                </div>
                                                                                                <div class=" col-md-1 input-group"
                                                                                                     id="image_show_dedicated_slide_boxFive<?= $x ?>">

                                                                                                    <a href="<?= $dedicated_slide_boxFive["pic_adress"] ?>"
                                                                                                       class=" without-caption">
                                                                                                        <img width="33"
                                                                                                             height="33"
                                                                                                             class="H_cursor_zoom"
                                                                                                             src="<?= $dedicated_slide_boxFive["pic_adress"] ?>"
                                                                                                             alt="<?= $dedicated_slide_boxFive["text"] ?>">
                                                                                                    </a>

                                                                                                </div>

                                                                                                <script type="text/javascript">
                                                                                                    $(document).ready(function () {
                                                                                                        $('#dedicated_slide_boxFive_avatar7<?=$x?>').orakuploader({
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

                                                                                                        $('#dedicated_slide_boxFive_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                                   id="dedicated_slide_boxFive_count"
                                                                                   name="dedicated_slide_boxFive_count"
                                                                                   value="<?= --$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_dedicated_slide_boxFive-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_dedicated_slide_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_dedicated_slide_boxFive" id="' + i + '" for="family" ><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-5 input-group"><input type="text" id="dedicated_slide_boxFive_title' + i + '" value="" class="form-control" placeholder="عنوان" name="dedicated_slide_boxFive_title' + i + '" ></div><div class="col-md-6 input-group"> <input type="text" id="dedicated_slide_boxFive_pic_adress' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="dedicated_slide_boxFive_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=dedicated_slide_boxFive_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_dedicated_slide_boxFive' + i + '" style="padding: 0px;"><div  id="dedicated_slide_boxFive_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="dedicated_slide_boxFive_avatar7_link' + i + '" name="dedicated_slide_boxFive_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_dedicated_slide_boxFive' + i + '" style="float:right;"></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_dedicated_slide_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#dedicated_slide_boxFive_count').val(i);

                                                                                        //--------orakuploader
                                                                                        $('#dedicated_slide_boxFive_avatar7' + i + '').orakuploader({
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

                                                                                        $('#dedicated_slide_boxFive_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                        $('.input-group-addon.H_dedicated_slide_boxFive' + i + '').find("div").first().next().css('width', '100px');
                                                                                        $('.input-group-addon.H_dedicated_slide_boxFive' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                        //    ---end orakuploader
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del_dedicated_slide_boxFive', function () {
                                                                                        var id = '';
                                                                                        var k = $('#dedicated_slide_boxFive_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_dedicated_slide_boxFive' + id).remove();
                                                                                        $('#dedicated_slide_boxFive_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block"
                                                                               id="add_dedicated_slide_boxFive-ads"><i
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
                                                <!-------------------article------------------->
                                                <div  id="content8" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $dedicated_title_article = get_tem_result($site, $la, "dedicated_title_article", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_title_article['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_title_article_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_title_article_title"
                                                                           value="<?= $dedicated_title_article['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_title_article_text"
                                                                           value="<?= $dedicated_title_article['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_dedicated_article = get_tem_result($site, $la, "ValSelectActive_dedicated_article", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_dedicated_article"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_dedicated_article"
                                                                    name="select_type_dedicated_article">

                                                                <option <? if ($ValSelectActive_dedicated_article["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_dedicated_article["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_dedicated_article["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_dedicated_article_title" type="hidden"
                                                                   value="<?= $ValSelectActive_dedicated_article["title"] ?>">

                                                            <div class="tab-pane opt_dedicated_article dedicated_article_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_dedicated_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_dedicated_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_dedicated_article; $j++) {
                                                                                    $first_choice_dedicated_article = get_tem_result($site, $la, "first_choice_dedicated_article$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_dedicated_article['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_dedicated_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_dedicated_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_dedicated_article col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_dedicated_article_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_dedicated_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_dedicated_article['pic'] ?>">

                                                                                                        <select id="first_choice_dedicated_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_dedicated_article_cat"
                                                                                                                name="first_choice_dedicated_article_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_dedicated_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_dedicated_article<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_dedicated_article_new&id=" + $("#first_choice_dedicated_article_cat<?=$j?>").val() + "&value=" + $("#first_choice_dedicated_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_dedicated_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_dedicated_article_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_dedicated_article_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_article['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_article['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_article['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_dedicated_article_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_dedicated_article["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_dedicated_article_number<?= $j ?>">
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
                                                                                       id="first_choice_dedicated_article_count"
                                                                                       name="first_choice_dedicated_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_dedicated_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_dedicated_article').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_dedicated_article_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_dedicated_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_dedicated_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_dedicated_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_dedicated_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_dedicated_article col-md-4 input-group"><input type="hidden" id="first_choice_dedicated_article_subcat_val' + i + '"  name="first_choice_dedicated_article_subcat_val' + i + '" value=""> <select id="first_choice_dedicated_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_dedicated_article_cat" name="first_choice_dedicated_article_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_dedicated_article' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_dedicated_article_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_dedicated_article_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_dedicated_article_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_dedicated_article_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_dedicated_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_dedicated_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_dedicated_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_dedicated_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_dedicated_article' + id).remove();
                                                                                            $('#first_choice_dedicated_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_dedicated_article"><i
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

                                                            <div class="tab-pane opt_dedicated_article dedicated_article_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_dedicated_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_dedicated_article%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_dedicated_article; $j++) {
                                                                                    $second_choice_dedicated_article = get_tem_result($site, $la, "second_choice_dedicated_article$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_dedicated_article['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_dedicated_article<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_dedicated_article"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_dedicated_article col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_dedicated_article_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_dedicated_article_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_dedicated_article['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_dedicated_article_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_dedicated_article_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_dedicated_article['pic_adress'] ?>">

                                                                                                        <select id="second_choice_dedicated_article_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_dedicated_article_cat"
                                                                                                                name="second_choice_dedicated_article_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_dedicated_article['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_dedicated_article<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_dedicated_article_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_dedicated_article&id=" + $("#second_choice_dedicated_article_cat<?=$j?>").val() + "&value=" + $("#second_choice_dedicated_article_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_dedicated_article<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_dedicated_article_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_dedicated_article_content&id=" + $("#second_choice_dedicated_article_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_dedicated_article_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_dedicated_article_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_dedicated_article_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_dedicated_article_count"
                                                                                       name="second_choice_dedicated_article_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_dedicated_article_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_dedicated_article').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_dedicated_article<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_dedicated_article_neshane").change(function () {
                                                                                        var j = $("#second_choice_dedicated_article_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_article&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_dedicated_article' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_dedicated_article_neshane', function () {
                                                                                        var j = $("#second_choice_dedicated_article_count").val();
                                                                                        //  $(".second_choice_dedicated_article_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_article_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_dedicated_article_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_dedicated_article').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_dedicated_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_dedicated_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_dedicated_article col-md-3 input-group"><input type="hidden" id="second_choice_dedicated_article_subcat_val' + i + '"  name="second_choice_dedicated_article_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_dedicated_article_subcat_link' + i + '"  name="second_choice_dedicated_article_subcat_link' + i + '" value=""> <select id="second_choice_dedicated_article_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_dedicated_article_cat" name="second_choice_dedicated_article_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_dedicated_article' + i + '" class="col-md-3 input-group"></div><div id="second_choice_dedicated_article_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_dedicated_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_dedicated_article_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_dedicated_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_dedicated_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_dedicated_article' + id).remove();
                                                                                            $('#second_choice_dedicated_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_dedicated_article"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_dedicated_article dedicated_article_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_dedicated_article = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_dedicated_article%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_dedicated_article; $x++) {
                                                                                    $third_choice_dedicated_article = get_tem_result($site, $la, "third_choice_dedicated_article$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_dedicated_article['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_dedicated_article<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_dedicated_article"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_article_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_dedicated_article["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_dedicated_article_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_article_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_dedicated_article["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_dedicated_article_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_dedicated_article_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_dedicated_article<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_dedicated_article_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_dedicated_article_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_dedicated_article_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_dedicated_article<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_dedicated_article["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_dedicated_article<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_dedicated_article["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_dedicated_article["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_dedicated_article["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_dedicated_article_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_dedicated_article_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <button class="btn btn-default form-control" name="third_choice_dedicated_article_pic_adress<?= $x ?>" data-iconset="fontawesome" data-icon="<?=$third_choice_dedicated_article['pic_adress']?>" role="iconpicker" ></button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_dedicated_article_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_dedicated_article_text<?= $x ?>"><?= $third_choice_dedicated_article["text"] ?>

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
                                                                                       id="third_choice_dedicated_article_count"
                                                                                       name="third_choice_dedicated_article_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_dedicated_article-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_dedicated_article' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_dedicated_article" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-4 input-group"><input type="text" id="third_choice_dedicated_article_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_dedicated_article_title' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_dedicated_article_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_dedicated_article_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_dedicated_article_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_dedicated_article' + i + '" style="padding: 0px;"><div  id="third_choice_dedicated_article_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_dedicated_article_avatar7_link' + i + '" name="third_choice_dedicated_article_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_dedicated_article' + i + '" style="float:right;"></div><div class="col-md-1 input-group"><button class="btn btn-default form-control" name="third_choice_dedicated_article_pic' + i + '" data-iconset="fontawesome" data-icon="fa-nonicon" role="iconpicker" ></button></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_dedicated_article_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_dedicated_article_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_dedicated_article' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_dedicated_article_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_dedicated_article_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_dedicated_article_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_dedicated_article' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_dedicated_article' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_dedicated_article', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_dedicated_article_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_dedicated_article' + id).remove();
                                                                                            $('#third_choice_dedicated_article_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_dedicated_article-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_dedicated_article_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_dedicated_article"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_dedicated_article_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_dedicated_article').hide();
                                                                        $('.dedicated_article_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content9" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $dedicated_title_LightBox = get_tem_result($site, $la, "dedicated_title_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($dedicated_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="dedicated_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_title_LightBox_title"
                                                                           value="<?= $dedicated_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_dedicated_LightBox = get_tem_result($site, $la, "ValSelectActive_dedicated_LightBox", 'coms2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_dedicated_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_dedicated_LightBox"
                                                                    name="select_type_dedicated_LightBox">

                                                                <option <? if ($ValSelectActive_dedicated_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_dedicated_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_dedicated_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_dedicated_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_dedicated_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_dedicated_LightBox dedicated_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_dedicated_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'first_choice_dedicated_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_dedicated_LightBox; $j++) {
                                                                                    $first_choice_dedicated_LightBox = get_tem_result($site, $la, "first_choice_dedicated_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($first_choice_dedicated_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_dedicated_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_dedicated_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_dedicated_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_dedicated_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_dedicated_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_dedicated_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_dedicated_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_dedicated_LightBox_cat"
                                                                                                                name="first_choice_dedicated_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_dedicated_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_dedicated_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_dedicated_LightBox_new&id=" + $("#first_choice_dedicated_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_dedicated_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_dedicated_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_dedicated_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_dedicated_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_dedicated_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_dedicated_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_dedicated_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_dedicated_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_dedicated_LightBox_count"
                                                                                       name="first_choice_dedicated_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_dedicated_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_dedicated_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_dedicated_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_dedicated_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_dedicated_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_dedicated_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_dedicated_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_dedicated_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_dedicated_LightBox_subcat_val' + i + '"  name="first_choice_dedicated_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_dedicated_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_dedicated_LightBox_cat" name="first_choice_dedicated_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_dedicated_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_dedicated_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_dedicated_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_dedicated_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_dedicated_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_dedicated_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_dedicated_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_dedicated_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_dedicated_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_dedicated_LightBox' + id).remove();
                                                                                            $('#first_choice_dedicated_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_dedicated_LightBox"><i
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

                                                            <div class="tab-pane opt_dedicated_LightBox dedicated_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_dedicated_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'second_choice_dedicated_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_dedicated_LightBox; $j++) {
                                                                                    $second_choice_dedicated_LightBox = get_tem_result($site, $la, "second_choice_dedicated_LightBox$j", 'coms2', $coms_conect);
                                                                                    if ($second_choice_dedicated_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_dedicated_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_dedicated_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_dedicated_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_dedicated_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_dedicated_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_dedicated_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_dedicated_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_dedicated_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_dedicated_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_dedicated_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_dedicated_LightBox_cat"
                                                                                                                name="second_choice_dedicated_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_dedicated_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_dedicated_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_dedicated_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_dedicated_LightBox&id=" + $("#second_choice_dedicated_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_dedicated_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_dedicated_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_dedicated_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_dedicated_LightBox_content&id=" + $("#second_choice_dedicated_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_dedicated_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_dedicated_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_dedicated_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_dedicated_LightBox_count"
                                                                                       name="second_choice_dedicated_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_dedicated_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_dedicated_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_dedicated_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_dedicated_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_dedicated_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_dedicated_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_dedicated_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_dedicated_LightBox_count").val();
                                                                                        //  $(".second_choice_dedicated_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_dedicated_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_dedicated_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_dedicated_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_dedicated_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_dedicated_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_dedicated_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_dedicated_LightBox_subcat_val' + i + '"  name="second_choice_dedicated_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_dedicated_LightBox_subcat_link' + i + '"  name="second_choice_dedicated_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_dedicated_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_dedicated_LightBox_cat" name="second_choice_dedicated_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_dedicated_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_dedicated_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_dedicated_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_dedicated_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_dedicated_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_dedicated_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_dedicated_LightBox' + id).remove();
                                                                                            $('#second_choice_dedicated_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_dedicated_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_dedicated_LightBox dedicated_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_dedicated_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'third_choice_dedicated_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_dedicated_LightBox; $x++) {
                                                                                    $third_choice_dedicated_LightBox = get_tem_result($site, $la, "third_choice_dedicated_LightBox$x", 'coms2', $coms_conect);

                                                                                    if ($third_choice_dedicated_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_dedicated_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_dedicated_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_dedicated_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_dedicated_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_dedicated_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_dedicated_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_dedicated_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_dedicated_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_dedicated_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_dedicated_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_dedicated_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_dedicated_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_dedicated_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_dedicated_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_dedicated_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_dedicated_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_dedicated_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_dedicated_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_dedicated_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_dedicated_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_dedicated_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_dedicated_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_dedicated_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_dedicated_LightBox_text<?= $x ?>"><?= $third_choice_dedicated_LightBox["text"] ?>

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
                                                                                       id="third_choice_dedicated_LightBox_count"
                                                                                       name="third_choice_dedicated_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_dedicated_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_dedicated_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_dedicated_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_dedicated_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_dedicated_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_dedicated_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_dedicated_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_dedicated_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_dedicated_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_dedicated_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_dedicated_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_dedicated_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_dedicated_LightBox_avatar7_link' + i + '" name="third_choice_dedicated_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_dedicated_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_dedicated_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_dedicated_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_dedicated_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_dedicated_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_dedicated_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_dedicated_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_dedicated_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_dedicated_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_dedicated_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_dedicated_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_dedicated_LightBox' + id).remove();
                                                                                            $('#third_choice_dedicated_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_dedicated_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_dedicated_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_dedicated_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_dedicated_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_dedicated_LightBox').hide();
                                                                        $('.dedicated_LightBox_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------header_seo------------------->
                                                <div  id="content10" class="bhoechie-tab-content H1 ">
                                                    <? $dedicated_header_seo = get_tem_result($site, $la, "dedicated_header_seo", 'coms2', $coms_conect); ?>
                                                    <center>
                                                        <div class="col-md-12">
                                                            <label  class="col-md-3 control-label" >meta keyword</label>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" value="<?= $dedicated_header_seo['title'] ?>" id="header_seo_keyword" name="dedicated_header_seo_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" >meta Description</label>
                                                                <div class="form-group col-md-6">
                                                                    <textarea id="header_seo_desciption" name="dedicated_header_seo_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $dedicated_header_seo['text'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">title</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="dedicated_header_seo_pic"
                                                                           value="<?= $dedicated_header_seo ['pic'] ?>" style="direction: rtl;">
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
                                                                                        id="dedicated_header_seo_pic_adress"
                                                                                         value="<?=$dedicated_header_seo['pic_adress']?>"
                                                                                            class="form-control"
                                                                                                    placeholder=" تصویر"
                                                                                                     name="dedicated_header_seo_pic_adress"
                                                                                                  style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=dedicated_header_seo_pic_adress"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="dedicated_header_seo_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_dedicated_header_seo_pic_adress"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_dedicated_header_seo_pic_adress">
                                                                        <a href="<?= $dedicated_header_seo["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $dedicated_header_seo["pic_adress"] ?>" alt="<?= $dedicated_header_seo["pic_adress"] ?>">
                                                                        </a>
                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#dedicated_header_seo_pic_adress_avatar_orak').orakuploader({
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

                                                                            $('#dedicated_header_seo_pic_adress_avatar_orak').html("<?=$pic_str?>");
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
                                    <!--------------------------box3 tab---------------------------------------------->
                                    <div class="z-content tab2" style="position: absolute;">
                                        <div class="z-content-inner">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H2">
                                                <div class="list-group">
                                                    <? $setting_dedicated_boxThreeTab_main_header = get_tem_result($site, $la, "setting_dedicated_boxThreeTab_main_header", 'coms2', $coms_conect); ?>
                                                    <a id="H_input_rename_setting_dedicated_boxThreeTab_main_header" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $setting_dedicated_boxThreeTab_main_header['text'] ?>تنظیمات</span>
                                                    </a>
                                                    <?
                                                    $count1_dedicated_boxThreeTab_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'dedicated_boxThreeTab_main_header%' ", $coms_conect);
                                                    for ($x = 1; $x <= $count1_dedicated_boxThreeTab_main_header; $x++) {
                                                        $dedicated_boxThreeTab_header1 = get_tem_result($site, $la, "dedicated_boxThreeTab_main_header$x", 'coms2', $coms_conect);
                                                        if ($dedicated_boxThreeTab_header1['text'] > "") {
                                                            ?>
                                                            <a id="H_input_rename_tab<?= $x ?>" href="#"
                                                               class="list-group-item  text-center ">
                                                                <span class="temp"><?= $dedicated_boxThreeTab_header1['text'] ?></span>
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
                                                                        $count1_dedicated_boxThreeTab_main_header = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'dedicated_boxThreeTab_main_header%' ", $coms_conect);
                                                                        for ($x = 1; $x <= $count1_dedicated_boxThreeTab_main_header; $x++) {
                                                                            $dedicated_boxThreeTab_main_header = get_tem_result($site, $la, "dedicated_boxThreeTab_main_header$x", 'coms2', $coms_conect);
                                                                            if ($dedicated_boxThreeTab_main_header['text'] > "") {
                                                                                ?>
                                                                                <div id="div_mother_third_choicedel_dedicated_boxThreeTab_main_header<?= $x ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_dedicated_boxThreeTab_main_header"
                                                                                           id="<?= $x ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title=""
                                                                                                    data-original-title="حذف"></i>

                                                                                        </a>

                                                                                        <div class="form-group col-md-11">

                                                                                            <div class="col-md-12 input-group">
                                                                                                <input type="text"
                                                                                                       id="dedicated_boxThreeTab_main_header_text<?= $x ?>"
                                                                                                       value="<?= $dedicated_boxThreeTab_main_header["text"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="dedicated_boxThreeTab_main_header_text<?= $x ?>">
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $xcount_mahsol = $x;
                                                                        ?>
                                                                        <input type="hidden" id="dedicated_boxThreeTab_main_header_count"
                                                                               name="dedicated_boxThreeTab_main_header_count"
                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$x?>;

                                                                                $('#add_dedicated_boxThreeTab_main_header-ads').on("click", function () {
                                                                                    var someText = '<div id="div_mother_third_choicedel_dedicated_boxThreeTab_main_header' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_dedicated_boxThreeTab_main_header" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-12 input-group"><input type="text" id="dedicated_boxThreeTab_main_header_text' + i + '" value="" class="form-control" placeholder="عنوان" name="dedicated_boxThreeTab_main_header_text' + i + '" ></div> </div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choicedel_dedicated_boxThreeTab_main_header' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#dedicated_boxThreeTab_main_header_count').val(i);

                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_dedicated_boxThreeTab_main_header', function () {
                                                                                    var id = '';
                                                                                    var k = $('#dedicated_boxThreeTab_main_header_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');

                                                                                    $('#div_mother_third_choicedel_dedicated_boxThreeTab_main_header' + id).remove();
                                                                                    $('#dedicated_boxThreeTab_main_header_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_dedicated_boxThreeTab_main_header-ads"><i
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
                                                <? for ($y = 1; $y <= $count1_dedicated_boxThreeTab_main_header; $y++) { ?>

                                                    <div id="tabbb<?= $y ?>" class="bhoechie-tab-content H2 ">
                                                        <div class="col-md-12">

                                                            <div class="mt40 pt20 content_forms<?=$y?>">

                                                                <div id="show_form1" class="formmm H_dis_none ">

                                                                    <div class="tab-pane">
                                                                        <div class="page-content-area">
                                                                            <div class="page-body"
                                                                                 style="margin-top: 25px;">
                                                                                <fieldset>
                                                                                    <!-- #section:download/download.link -->
                                                                                    <div class="col-md-12">
                                                                                        <?
                                                                                        $count1_dedicated_boxThreeTab_btn = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='coms2' and name like 'dedicated_boxThreeTab_btn$y%' ", $coms_conect);
                                                                                        for ($x = 1; $x <= $count1_dedicated_boxThreeTab_btn; $x++) {
                                                                                            $dedicated_boxThreeTab_btn = get_tem_result($site, $la, "dedicated_boxThreeTab_btn$y$x", 'coms2', $coms_conect);
                                                                                            $dedicated_boxThreeTab_title = get_tem_result($site, $la, "dedicated_boxThreeTab_title$y$x", 'coms2', $coms_conect);
                                                                                            $dedicated_boxThreeTab_titr = get_tem_result($site, $la, "dedicated_boxThreeTab_titr$y$x", 'coms2', $coms_conect);
                                                                                            if ($dedicated_boxThreeTab_btn['title'] > "") {
                                                                                                ?>
                                                                                                <div id="div_mother_third_choicedel_dedicated_boxThreeTab_btn<?= $y ?><?= $x ?>"
                                                                                                     class="seyed"
                                                                                                     style="opacity: 1;">
                                                                                                    <div class="form-group">
                                                                                                        <a class="col-md-1 control-label del_dedicated_boxThreeTab_btn" style="margin-bottom: 100px!important;"
                                                                                                           id="<?= $y ?><?= $x ?>"
                                                                                                           for="family"><i
                                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                                    title=""
                                                                                                                    data-original-title="حذف"></i>
                                                                                                        </a>

                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_title_title<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_title["title"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="عنوان اول"
                                                                                                                       name="dedicated_boxThreeTab_title_title<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_title_link<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_title["link"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="عنوان دوم"
                                                                                                                       name="dedicated_boxThreeTab_title_link<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_btn_title<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_btn["title"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="عنوان دکمه اول"
                                                                                                                       name="dedicated_boxThreeTab_btn_title<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_btn_link<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_btn["link"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="لینک دکمه اول"
                                                                                                                       name="dedicated_boxThreeTab_btn_link<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_btn_text<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_btn["text"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="عنوان دکمه دوم"
                                                                                                                       name="dedicated_boxThreeTab_btn_text<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-6 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_btn_pic<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_btn["pic"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="لینک دکمه دوم"
                                                                                                                       name="dedicated_boxThreeTab_btn_pic<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <br>
                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-4 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_title_pic<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_title["pic"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="تیتر اول"
                                                                                                                       name="dedicated_boxThreeTab_title_pic<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-4 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_title_text<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_title["text"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="تیتر دوم"
                                                                                                                       name="dedicated_boxThreeTab_title_text<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-4 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_title_pic_adress<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_title["pic_adress"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="تیتر سوم"
                                                                                                                       name="dedicated_boxThreeTab_title_pic_adress<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="col-md-11 input-group H_pl32">
                                                                                                            <div class="col-md-4 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_titr_pic<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_titr["pic"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="تیتر چهارم"
                                                                                                                       name="dedicated_boxThreeTab_titr_pic<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-4 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_titr_text<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_titr["text"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="تیتر پنجم"
                                                                                                                       name="dedicated_boxThreeTab_titr_text<?= $y ?><?= $x ?>">
                                                                                                            </div>
                                                                                                            <div class="col-md-4 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="dedicated_boxThreeTab_titr_pic_adress<?= $y ?><?= $x ?>"
                                                                                                                       value="<?= $dedicated_boxThreeTab_titr["pic_adress"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="تیتر ششم"
                                                                                                                       name="dedicated_boxThreeTab_titr_pic_adress<?= $y ?><?= $x ?>">
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
                                                                                               id="dedicated_boxThreeTab_btn_count<?= $y ?>"
                                                                                               name="dedicated_boxThreeTab_btn_count<?= $y ?>"
                                                                                               value="<?= --$xcount_mahsol; ?>">

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                var i = <?=$y?><?=$x?>;

                                                                                                $('#add_dedicated_boxThreeTab_btn-ads<?=$y?>').on("click", function () {

                                                                                                    var someText = '<div id="div_mother_third_choicedel_dedicated_boxThreeTab_btn' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_dedicated_boxThreeTab_btn" style="margin-bottom: 100px!important;"  id="' + i + '" for="family" ><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="dedicated_boxThreeTab_title_title' + i + '" value="" class="form-control"   placeholder=" عنوان اول " name="dedicated_boxThreeTab_title_title'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="dedicated_boxThreeTab_title_link' + i + '" value="" class="form-control"   placeholder="عنوان دوم" name="dedicated_boxThreeTab_title_link'+ i +'"></div></div><br><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="dedicated_boxThreeTab_btn_title' + i + '" value="" class="form-control"   placeholder="عنوان دکمه اول " name="dedicated_boxThreeTab_btn_title'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="dedicated_boxThreeTab_btn_link' + i + '" value="" class="form-control"   placeholder="لینک دکمه اول" name="dedicated_boxThreeTab_btn_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="dedicated_boxThreeTab_btn_text' + i + '" value="" class="form-control"   placeholder="عنوان دکمه دوم" name="dedicated_boxThreeTab_btn_text'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="dedicated_boxThreeTab_btn_pic' + i + '" value="" class="form-control"   placeholder="لینک دکمه دوم" name="dedicated_boxThreeTab_btn_pic'+ i +'"> </div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-4 input-group"><input type="text" id="dedicated_boxThreeTab_title_pic' + i + '" value="" class="form-control"   placeholder="تیتر اول" name="dedicated_boxThreeTab_title_pic'+ i +'"></div><div class="col-md-4 input-group"><input type="text" id="dedicated_boxThreeTab_title_text' + i + '" value="" class="form-control"   placeholder="تیتر دوم" name="dedicated_boxThreeTab_title_text'+ i +'"> </div><div class="col-md-4 input-group"><input type="text" id="dedicated_boxThreeTab_title_pic_adress' + i + '" value="" class="form-control"   placeholder="تیتر سوم" name="dedicated_boxThreeTab_title_pic_adress'+ i +'"> </div></div><br><div class="col-md-11 input-group H_pl32"><div class="col-md-4 input-group"><input type="text" id="dedicated_boxThreeTab_titr_pic' + i + '" value="" class="form-control"   placeholder="تیتر چهارم" name="dedicated_boxThreeTab_titr_pic'+ i +'"></div><div class="col-md-4 input-group"><input type="text" id="dedicated_boxThreeTab_titr_text' + i + '" value="" class="form-control"   placeholder="تیتر پنجم" name="dedicated_boxThreeTab_titr_text'+ i +'"> </div><div class="col-md-4 input-group"><input type="text" id="dedicated_boxThreeTab_titr_pic_adress' + i + '" value="" class="form-control"   placeholder="تیتر ششم" name="dedicated_boxThreeTab_titr_pic_adress'+ i +'"> </div></div></div></div>';
                                                                                                    $(this).before(someText);
                                                                                                    $('#div_mother_third_choicedel_dedicated_boxThreeTab_btn' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                        $(this).css('background', '');
                                                                                                    }).fadeTo('slow', 1);
                                                                                                    $('#dedicated_boxThreeTab_btn_count<?=$y?>').val(i);
                                                                                                    i++;

                                                                                                });
                                                                                                $(document).on('click', '.del_dedicated_boxThreeTab_btn', function () {
                                                                                                    var id = '';
                                                                                                    var k = $('#dedicated_boxThreeTab_btn_count<?=$y?>').val();
                                                                                                    k--
                                                                                                    id = $(this).attr('id');
                                                                                                    $('#div_mother_third_choicedel_dedicated_boxThreeTab_btn' + id).remove();
                                                                                                    $('#dedicated_boxThreeTab_btn_count<?=$y?>').val(k);
                                                                                                });
                                                                                            });


                                                                                        </script>
                                                                                        <a class="btn btn-success block"
                                                                                           id="add_dedicated_boxThreeTab_btn-ads<?= $y ?>"><i
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
        //-------------------------------
        //----------dedicated---------------------
        $(".H_rename_dedicated_box1").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_box1_save').show();
            $(".H_input_rename_dedicated_box1").toggle(300);
        });
        $(".H_rename_dedicated_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_box1' + "&value=" + $(".H_input_rename_dedicated_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_box1 > span.temp").text($(".H_input_rename_dedicated_box1").val());
            $(this).hide();
            $('.H_rename_dedicated_box1').show();
            $(".H_input_rename_dedicated_box1").hide();
            $(".H_rename_dedicated_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_dedicated_box2").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_box2_save').show();
            $(".H_input_rename_dedicated_box2").toggle(300);
        });
        $(".H_rename_dedicated_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_box2' + "&value=" + $(".H_input_rename_dedicated_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_box2 > span.temp").text($(".H_input_rename_dedicated_box2").val());
            $(this).hide();
            $('.H_rename_dedicated_box2').show();
            $(".H_input_rename_dedicated_box2").hide();
            $(".H_rename_dedicated_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_dedicated_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_title_box3_save').show();
            $(".H_input_rename_dedicated_title_box3").toggle(300);
        });
        $(".H_rename_dedicated_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_title_box3' + "&value=" + $(".H_input_rename_dedicated_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_title_box3 > span.temp").text($(".H_input_rename_dedicated_title_box3").val());
            $(this).hide();
            $('.H_rename_dedicated_title_box3').show();
            $(".H_input_rename_dedicated_title_box3").hide();
            $(".H_rename_dedicated_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_dedicated_title_box4").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_title_box4_save').show();
            $(".H_input_rename_dedicated_title_box4").toggle(300);
        });
        $(".H_rename_dedicated_title_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_title_box4' + "&value=" + $(".H_input_rename_dedicated_title_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_title_box4 > span.temp").text($(".H_input_rename_dedicated_title_box4").val());
            $(this).hide();
            $('.H_rename_dedicated_title_box4').show();
            $(".H_input_rename_dedicated_title_box4").hide();
            $(".H_rename_dedicated_title_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_dedicated_title_box5").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_title_box5_save').show();
            $(".H_input_rename_dedicated_title_box5").toggle(300);
        });
        $(".H_rename_dedicated_title_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_title_box5' + "&value=" + $(".H_input_rename_dedicated_title_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_title_box5 > span.temp").text($(".H_input_rename_dedicated_title_box5").val());
            $(this).hide();
            $('.H_rename_dedicated_title_box5').show();
            $(".H_input_rename_dedicated_title_box5").hide();
            $(".H_rename_dedicated_title_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_dedicated_title_box6").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_title_box6_save').show();
            $(".H_input_rename_dedicated_title_box6").toggle(300);
        });
        $(".H_rename_dedicated_title_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_title_box6' + "&value=" + $(".H_input_rename_dedicated_title_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_title_box6 > span.temp").text($(".H_input_rename_dedicated_title_box6").val());
            $(this).hide();
            $('.H_rename_dedicated_title_box6').show();
            $(".H_input_rename_dedicated_title_box6").hide();
            $(".H_rename_dedicated_title_box6.H_pos_color").css('transform', 'translateY(-24px)');
        });

        //-------------------------------

        $(".H_rename_dedicated_title_box7").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_title_box7_save').show();
            $(".H_input_rename_dedicated_title_box7").toggle(300);
        });
        $(".H_rename_dedicated_title_box7_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_title_box7' + "&value=" + $(".H_input_rename_dedicated_title_box7").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_title_box7 > span.temp").text($(".H_input_rename_dedicated_title_box7").val());
            $(this).hide();
            $('.H_rename_dedicated_title_box7').show();
            $(".H_input_rename_dedicated_title_box7").hide();
            $(".H_rename_dedicated_title_box7.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------

        $(".H_rename_dedicated_title_box8").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_title_box8_save').show();
            $(".H_input_rename_dedicated_title_box8").toggle(300);
        });
        $(".H_rename_dedicated_title_box8_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_title_box8' + "&value=" + $(".H_input_rename_dedicated_title_box8").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_title_box8 > span.temp").text($(".H_input_rename_dedicated_title_box8").val());
            $(this).hide();
            $('.H_rename_dedicated_title_box8').show();
            $(".H_input_rename_dedicated_title_box8").hide();
            $(".H_rename_dedicated_title_box8.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_dedicated_title_box9").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_title_box9_save').show();
            $(".H_input_rename_dedicated_title_box9").toggle(300);
        });
        $(".H_rename_dedicated_title_box9_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_title_box9' + "&value=" + $(".H_input_rename_dedicated_title_box9").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_title_box9 > span.temp").text($(".H_input_rename_dedicated_title_box9").val());
            $(this).hide();
            $('.H_rename_dedicated_title_box9').show();
            $(".H_input_rename_dedicated_title_box9").hide();
            $(".H_rename_dedicated_title_box9.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_dedicated_title_box10").click(function () {
            $(this).hide();
            $('.H_rename_dedicated_title_box10_save').show();
            $(".H_input_rename_dedicated_title_box10").toggle(300);
        });
        $(".H_rename_dedicated_title_box10_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'coms2' + "&name=" + 'dedicated_title_box10' + "&value=" + $(".H_input_rename_dedicated_title_box10").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_dedicated_title_box10 > span.temp").text($(".H_input_rename_dedicated_title_box10").val());
            $(this).hide();
            $('.H_rename_dedicated_title_box10').show();
            $(".H_input_rename_dedicated_title_box10").hide();
            $(".H_rename_dedicated_title_box10.H_pos_color").css('transform', 'translateY(-24px)');
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
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



    ########################################################### content_M ########################################################

    $content_M_boxOne_pic_adress = 0;
    $content_M_boxOne_pic_adress= injection_replace($_POST["content_M_boxOne_pic_adress"]);
    insert_templdate($site, $content_M_boxOne_pic_adress, $la, '', '', '', '', "content_M_boxOne", 'Medirence2', $coms_conect);

    //slide

    $ValSelectActive_content_M_slider_title = injection_replace($_POST["ValSelectActive_content_M_slider_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_content_M_slider_title, '', '', "ValSelectActive_content_M_slider", 'Medirence2', $coms_conect);

    $condition_first_choice_content_M_slider = "name like 'first_choice_content_M_slider%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_content_M_slider, $coms_conect);
    $first_choice_content_M_slider_count = injection_replace_pic($_POST["first_choice_content_M_slider_count"]);
    for ($i = 1; $i <= $first_choice_content_M_slider_count; $i++) {

        $first_choice_content_M_slider_cat = injection_replace_pic($_POST["first_choice_content_M_slider_cat{$i}"]);
        $first_choice_content_M_slider_subcat_cat = injection_replace_pic($_POST["first_choice_content_M_slider_subcat_cat{$i}"]);
        $first_choice_content_M_slider_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_M_slider_Fixed_selection_cat{$i}"]);
        $first_choice_content_M_slider_number = injection_replace_pic($_POST["first_choice_content_M_slider_number{$i}"]);
        if ($first_choice_content_M_slider_subcat_cat > "")
            insert_templdate($site, $first_choice_content_M_slider_number, $la, $first_choice_content_M_slider_Fixed_selection_cat, '', $first_choice_content_M_slider_cat, $first_choice_content_M_slider_subcat_cat, "first_choice_content_M_slider$i", 'Medirence2', $coms_conect);
    }

    $condition_second_choice_content_M_slider = "name like 'second_choice_content_M_slider%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_content_M_slider, $coms_conect);
    $second_choice_content_M_slider_count = injection_replace_pic($_POST["second_choice_content_M_slider_count"]);
    for ($i = 1; $i <= $second_choice_content_M_slider_count; $i++) {

        $second_choice_content_M_slider_cat = injection_replace_pic($_POST["second_choice_content_M_slider_cat{$i}"]);
        $second_choice_content_M_slider_subcat_cat = injection_replace_pic($_POST["second_choice_content_M_slider_subcat_cat{$i}"]);
        $second_choice_content_M_slider_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_M_slider_subcat_cat_content{$i}"]);
        if ($second_choice_content_M_slider_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_content_M_slider_subcat_cat_content, $la, '', '', $second_choice_content_M_slider_cat, $second_choice_content_M_slider_subcat_cat, "second_choice_content_M_slider$i", 'Medirence2', $coms_conect);
    }

    $condition_third_choice_content_M_slider = "name like 'third_choice_content_M_slider%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_content_M_slider, $coms_conect);
    $third_choice_content_M_slider_count = injection_replace_pic($_POST["third_choice_content_M_slider_count"]);
    for ($x = 1; $x <= $third_choice_content_M_slider_count; $x++) {

        $third_choice_content_M_slider_title = injection_replace_pic($_POST["third_choice_content_M_slider_title{$x}"]);
        $third_choice_content_M_slider_link = injection_replace_pic($_POST["third_choice_content_M_slider_link{$x}"]);
        $third_choice_content_M_slider_pic = injection_replace_pic($_POST["third_choice_content_M_slider_pic{$x}"]);
        $third_choice_content_M_slider_pic = resize_image_M($third_choice_content_M_slider_pic,355,260,$img_page_main,'');
        $third_choice_content_M_slider_avatar7 = injection_replace($_POST["third_choice_content_M_slider_avatar7{$x}"][0]);
        if ($third_choice_content_M_slider_avatar7 > "") {
            $third_choice_content_M_slider_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_content_M_slider_avatar7;
            $third_choice_content_M_slider_pic = resize_image_M($third_choice_content_M_slider_pic,355,260,$img_page_main,'');
        }

        $third_choice_content_M_slider_btn_title = injection_replace_pic($_POST["third_choice_content_M_slider_btn_title{$x}"]);
        $third_choice_content_M_slider_btn_link = injection_replace_pic($_POST["third_choice_content_M_slider_btn_link{$x}"]);
        $third_choice_content_M_slider_btn_text = injection_replace_pic($_POST["third_choice_content_M_slider_btn_text{$x}"]);
        $third_choice_content_M_slider_btn_pic = injection_replace_pic($_POST["third_choice_content_M_slider_btn_pic{$x}"]);

        if ($third_choice_content_M_slider_title > "") {
            insert_templdate($site, '', $la, '', $third_choice_content_M_slider_title, $third_choice_content_M_slider_link, $third_choice_content_M_slider_pic, "third_choice_content_M_slider$x", 'Medirence2', $coms_conect);
            insert_templdate($site, '', $la, $third_choice_content_M_slider_btn_text, $third_choice_content_M_slider_btn_title, $third_choice_content_M_slider_btn_link, $third_choice_content_M_slider_btn_pic, "third_choice_content_M_slider_btn$x", 'Medirence2', $coms_conect);
        }
    }


// content_M cat
    $content_M_titleBox2_pic_adress = 0;
    $content_M_titleBox2_pic_adress= injection_replace($_POST["content_M_titleBox2_pic_adress"]);
    $content_M_titleBox2_title= injection_replace($_POST["content_M_titleBox2_title"]);
    insert_templdate($site, $content_M_titleBox2_pic_adress, $la, '', $content_M_titleBox2_title, '', '', "content_M_titleBox2", 'Medirence2', $coms_conect);

    $condition_content_M_category = "name like 'content_M_category%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_content_M_category, $coms_conect);
    $content_M_category_count = injection_replace_pic($_POST["content_M_category_count"]);
    for ($j = 1; $j <= $content_M_category_count; $j++) {

        $content_M_category_title= injection_replace($_POST["content_M_category_title{$j}"]);
        insert_templdate($site, '', $la, '', $content_M_category_title, '', '', "content_M_category$j", 'Medirence2', $coms_conect);
    }

// content_M videos
    $content_M_titleBox3_pic_adress = 0;
    $content_M_titleBox3_pic_adress= injection_replace($_POST["content_M_titleBox3_pic_adress"]);
    $content_M_titleBox3_title= injection_replace($_POST["content_M_titleBox3_title"]);
    insert_templdate($site, $content_M_titleBox3_pic_adress, $la, '', $content_M_titleBox3_title, '', '', "content_M_titleBox3", 'Medirence2', $coms_conect);

    $ValSelectActive_content_M_videos_title = injection_replace($_POST["ValSelectActive_content_M_videos_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_content_M_videos_title, '', '', "ValSelectActive_content_M_videos", 'Medirence2', $coms_conect);

    $condition_first_choice_content_M_videos = "name like 'first_choice_content_M_videos%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_content_M_videos, $coms_conect);
    $first_choice_content_M_videos_count = injection_replace_pic($_POST["first_choice_content_M_videos_count"]);
    for ($i = 1; $i <= $first_choice_content_M_videos_count; $i++) {

        $first_choice_content_M_videos_cat = injection_replace_pic($_POST["first_choice_content_M_videos_cat{$i}"]);
        $first_choice_content_M_videos_subcat_cat = injection_replace_pic($_POST["first_choice_content_M_videos_subcat_cat{$i}"]);
        $first_choice_content_M_videos_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_M_videos_Fixed_selection_cat{$i}"]);
        $first_choice_content_M_videos_number = injection_replace_pic($_POST["first_choice_content_M_videos_number{$i}"]);
        if ($first_choice_content_M_videos_subcat_cat > "")
            insert_templdate($site, $first_choice_content_M_videos_number, $la, $first_choice_content_M_videos_Fixed_selection_cat, '', $first_choice_content_M_videos_cat, $first_choice_content_M_videos_subcat_cat, "first_choice_content_M_videos$i", 'Medirence2', $coms_conect);
    }

    $condition_second_choice_content_M_videos = "name like 'second_choice_content_M_videos%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_content_M_videos, $coms_conect);
    $second_choice_content_M_videos_count = injection_replace_pic($_POST["second_choice_content_M_videos_count"]);
    for ($i = 1; $i <= $second_choice_content_M_videos_count; $i++) {

        $second_choice_content_M_videos_cat = injection_replace_pic($_POST["second_choice_content_M_videos_cat{$i}"]);
        $second_choice_content_M_videos_subcat_cat = injection_replace_pic($_POST["second_choice_content_M_videos_subcat_cat{$i}"]);
        $second_choice_content_M_videos_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_M_videos_subcat_cat_content{$i}"]);
        if ($second_choice_content_M_videos_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_content_M_videos_subcat_cat_content, $la, '', '', $second_choice_content_M_videos_cat, $second_choice_content_M_videos_subcat_cat, "second_choice_content_M_videos$i", 'Medirence2', $coms_conect);
    }

    $condition_third_choice_content_M_videos = "name like 'third_choice_content_M_videos%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_content_M_videos, $coms_conect);
    $third_choice_content_M_videos_count = injection_replace_pic($_POST["third_choice_content_M_videos_count"]);
    for ($x = 1; $x <= $third_choice_content_M_videos_count; $x++) {

        $third_choice_content_M_videos_title = injection_replace_pic($_POST["third_choice_content_M_videos_title{$x}"]);
        $third_choice_content_M_videos_link = injection_replace_pic($_POST["third_choice_content_M_videos_link{$x}"]);
        $third_choice_content_M_videos_pic = injection_replace_pic($_POST["third_choice_content_M_videos_pic{$x}"]);
        $third_choice_content_M_videos_pic = resize_image_M($third_choice_content_M_videos_pic,280,205,$img_page_main,'');
        $third_choice_content_M_videos_avatar7 = injection_replace($_POST["third_choice_content_M_videos_avatar7{$x}"][0]);
        if ($third_choice_content_M_videos_avatar7 > "") {
            $third_choice_content_M_videos_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_content_M_videos_avatar7;
            $third_choice_content_M_videos_pic = resize_image_M($third_choice_content_M_videos_pic,280,205,$img_page_main,'');
        }
        if ($third_choice_content_M_videos_title > "") {
            insert_templdate($site, '', $la, '', $third_choice_content_M_videos_title, $third_choice_content_M_videos_link, $third_choice_content_M_videos_pic, "third_choice_content_M_videos$x", 'Medirence2', $coms_conect);
        }
    }


// content_M tablegh

    $content_M_tablegh_pic_adress=0;
    $content_M_tablegh_pic_adress = injection_replace_pic($_POST["content_M_tablegh_pic_adress"]);
    $content_M_tablegh_title = injection_replace_pic($_POST["content_M_tablegh_title"]);
    $content_M_tablegh_link = injection_replace_pic($_POST["content_M_tablegh_link"]);
    $content_M_tablegh_pic= injection_replace_pic($_POST["content_M_tablegh_pic"]);
    $content_M_tablegh_pic = resize_image_M($content_M_tablegh_pic,282,227,$img_page_main,'');
    $content_M_tablegh_avatar7 = injection_replace($_POST["content_M_tablegh_avatar7"][0]);
    if ($content_M_tablegh_avatar7 > "") {
        $content_M_tablegh_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $content_M_tablegh_avatar7;
        $content_M_tablegh_pic = resize_image_M($content_M_tablegh_pic,282,227,$img_page_main,'');
    }
        insert_templdate($site, $content_M_tablegh_pic_adress, $la, '', $content_M_tablegh_title, $content_M_tablegh_link, $content_M_tablegh_pic, "content_M_tablegh", 'Medirence2', $coms_conect);

// content_M con_center
    $content_M_titleBox5_pic_adress = 0;
    $content_M_titleBox5_pic_adress= injection_replace($_POST["content_M_titleBox5_pic_adress"]);
    insert_templdate($site, $content_M_titleBox5_pic_adress, $la, '', '', '', '', "content_M_titleBox5", 'Medirence2', $coms_conect);

    $ValSelectActive_content_M_con_center_title = injection_replace($_POST["ValSelectActive_content_M_con_center_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_content_M_con_center_title, '', '', "ValSelectActive_content_M_con_center", 'Medirence2', $coms_conect);

    $condition_first_choice_content_M_con_center = "name like 'first_choice_content_M_con_center%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_content_M_con_center, $coms_conect);

        $first_choice_content_M_con_center_cat = injection_replace_pic($_POST["first_choice_content_M_con_center_cat"]);
        $first_choice_content_M_con_center_subcat_cat = injection_replace_pic($_POST["first_choice_content_M_con_center_subcat_cat"]);
        $first_choice_content_M_con_center_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_M_con_center_Fixed_selection_cat"]);
        if ($first_choice_content_M_con_center_subcat_cat > "")
            insert_templdate($site, '', $la, $first_choice_content_M_con_center_Fixed_selection_cat, '', $first_choice_content_M_con_center_cat, $first_choice_content_M_con_center_subcat_cat, "first_choice_content_M_con_center", 'Medirence2', $coms_conect);


    $condition_second_choice_content_M_con_center = "name like 'second_choice_content_M_con_center%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_content_M_con_center, $coms_conect);

        $second_choice_content_M_con_center_cat = injection_replace_pic($_POST["second_choice_content_M_con_center_cat"]);
        $second_choice_content_M_con_center_subcat_cat = injection_replace_pic($_POST["second_choice_content_M_con_center_subcat_cat"]);
        $second_choice_content_M_con_center_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_M_con_center_subcat_cat_content"]);
        if ($second_choice_content_M_con_center_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_content_M_con_center_subcat_cat_content, $la, '', '', $second_choice_content_M_con_center_cat, $second_choice_content_M_con_center_subcat_cat, "second_choice_content_M_con_center", 'Medirence2', $coms_conect);


    $condition_third_choice_content_M_con_center = "name like 'third_choice_content_M_con_center%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_content_M_con_center, $coms_conect);

        $third_choice_content_M_con_center_title = injection_replace_pic($_POST["third_choice_content_M_con_center_title"]);
        $third_choice_content_M_con_center_text = injection_replace_pic($_POST["third_choice_content_M_con_center_text"]);

        $third_choice_content_M_con_center_link = injection_replace_pic($_POST["third_choice_content_M_con_center_link"]);
        $third_choice_content_M_con_center_pic = injection_replace_pic($_POST["third_choice_content_M_con_center_pic"]);
        $third_choice_content_M_con_center_pic = resize_image_M($third_choice_content_M_con_center_pic,263,260,$img_page_main,'');
        $third_choice_content_M_con_center_avatar7 = injection_replace($_POST["third_choice_content_M_con_center_avatar7"][0]);
        if ($third_choice_content_M_con_center_avatar7 > "") {
            $third_choice_content_M_con_center_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_content_M_con_center_avatar7;
            $third_choice_content_M_con_center_pic = resize_image_M($third_choice_content_M_con_center_pic,263,260,$img_page_main,'');
        }
        if ($third_choice_content_M_con_center_title > "") {
            insert_templdate($site, '', $la, $third_choice_content_M_con_center_text, $third_choice_content_M_con_center_title, $third_choice_content_M_con_center_link, $third_choice_content_M_con_center_pic, "third_choice_content_M_con_center", 'Medirence2', $coms_conect);
        }

    //   Light box
    $content_M_title_LightBox_pic_adress = 0;
    $content_M_title_LightBox_pic_adress= injection_replace($_POST["content_M_title_LightBox_pic_adress"]);
    $content_M_title_LightBox_title= injection_replace($_POST["content_M_title_LightBox_title"]);
    insert_templdate($site, $content_M_title_LightBox_pic_adress, $la, '', $content_M_title_LightBox_title, '', '', "content_M_title_LightBox", 'Medirence2', $coms_conect);

    $ValSelectActive_content_M_LightBox_title = injection_replace($_POST["ValSelectActive_content_M_LightBox_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_content_M_LightBox_title, '', '', "ValSelectActive_content_M_LightBox", 'Medirence2', $coms_conect);

    $condition_first_choice_content_M_LightBox = "name like 'first_choice_content_M_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_content_M_LightBox, $coms_conect);
    $first_choice_content_M_LightBox_count = injection_replace_pic($_POST["first_choice_content_M_LightBox_count"]);
    for ($i = 1; $i <= $first_choice_content_M_LightBox_count; $i++) {

        $first_choice_content_M_LightBox_cat = injection_replace_pic($_POST["first_choice_content_M_LightBox_cat{$i}"]);
        $first_choice_content_M_LightBox_subcat_cat = injection_replace_pic($_POST["first_choice_content_M_LightBox_subcat_cat{$i}"]);
        $first_choice_content_M_LightBox_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_content_M_LightBox_Fixed_selection_cat{$i}"]);
        $first_choice_content_M_LightBox_number = injection_replace_pic($_POST["first_choice_content_M_LightBox_number{$i}"]);
        if ($first_choice_content_M_LightBox_subcat_cat > "")
            insert_templdate($site, $first_choice_content_M_LightBox_number, $la, $first_choice_content_M_LightBox_Fixed_selection_cat, '', $first_choice_content_M_LightBox_cat, $first_choice_content_M_LightBox_subcat_cat, "first_choice_content_M_LightBox$i", 'Medirence2', $coms_conect);
    }

    $condition_second_choice_content_M_LightBox = "name like 'second_choice_content_M_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_second_choice_content_M_LightBox, $coms_conect);
    $second_choice_content_M_LightBox_count = injection_replace_pic($_POST["second_choice_content_M_LightBox_count"]);
    for ($i = 1; $i <= $second_choice_content_M_LightBox_count; $i++) {

        $second_choice_content_M_LightBox_cat = injection_replace_pic($_POST["second_choice_content_M_LightBox_cat{$i}"]);
        $second_choice_content_M_LightBox_subcat_cat = injection_replace_pic($_POST["second_choice_content_M_LightBox_subcat_cat{$i}"]);
        $second_choice_content_M_LightBox_subcat_cat_content = injection_replace_pic($_POST["second_choice_content_M_LightBox_subcat_cat_content{$i}"]);
        if ($second_choice_content_M_LightBox_subcat_cat_content > 0)
            insert_templdate($site, $second_choice_content_M_LightBox_subcat_cat_content, $la, '', '', $second_choice_content_M_LightBox_cat, $second_choice_content_M_LightBox_subcat_cat, "second_choice_content_M_LightBox$i", 'Medirence2', $coms_conect);
    }

    $condition_third_choice_content_M_LightBox = "name like 'third_choice_content_M_LightBox%' and tem_name='Medirence2'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_content_M_LightBox, $coms_conect);
    $third_choice_content_M_LightBox_count = injection_replace_pic($_POST["third_choice_content_M_LightBox_count"]);
    for ($x = 1; $x <= $third_choice_content_M_LightBox_count; $x++) {

        $third_choice_content_M_LightBox_title = injection_replace_pic($_POST["third_choice_content_M_LightBox_title{$x}"]);
        $third_choice_content_M_LightBox_text = injection_replace_pic($_POST["third_choice_content_M_LightBox_text{$x}"]);
        $third_choice_content_M_LightBox_link = injection_replace_pic($_POST["third_choice_content_M_LightBox_link{$x}"]);
        $third_choice_content_M_LightBox_pic = injection_replace_pic($_POST["third_choice_content_M_LightBox_pic{$x}"]);
        $third_choice_content_M_LightBox_pic = resize_image_M($third_choice_content_M_LightBox_pic,58,43,$img_page_main,'');
        $third_choice_content_M_LightBox_avatar7 = injection_replace($_POST["third_choice_content_M_LightBox_avatar7{$x}"][0]);
        if ($third_choice_content_M_LightBox_avatar7 > "") {
            $third_choice_content_M_LightBox_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_content_M_LightBox_avatar7;
            $third_choice_content_M_LightBox_pic = resize_image_M($third_choice_content_M_LightBox_pic,58,43,$img_page_main,'');

        }
        if ($third_choice_content_M_LightBox_title > "") {
            insert_templdate($site, '', $la, $third_choice_content_M_LightBox_text, $third_choice_content_M_LightBox_title, $third_choice_content_M_LightBox_link, $third_choice_content_M_LightBox_pic, "third_choice_content_M_LightBox$x", 'Medirence2', $coms_conect);
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
                                        <a class="z-link">content_M</a>
                                    </li>


                                </ul>
                                <div class="h-content2  z-container">

                                    <!-----------------------------------------------------content_M---------------------------------------------->
                                    <div class="z-content tab1" style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">

                                                    <? $content_M_box1 = get_tem_result($site, $la, "content_M_box1", 'Medirence2', $coms_conect);

                                                    ?>
                                                    <a id="H_input_rename_content_M_box1" href="#"
                                                       class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $content_M_box1['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_M_box1 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_M_box1_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_M_box1 H_dis_none"
                                                               name="content_M_box1_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $content_M_box2 = get_tem_result($site, $la, "content_M_box2", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_M_box2" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_M_box2['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_M_box2 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_M_box2_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_M_box2 H_dis_none"
                                                               name="content_M_box2_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $content_M_title_box3 = get_tem_result($site, $la, "content_M_title_box3", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_M_title_box3" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_M_title_box3['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_M_title_box3 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_M_title_box3_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_M_title_box3 H_dis_none"
                                                               name="content_M_title_box3_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $content_M_box4 = get_tem_result($site, $la, "content_M_box4", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_M_box4" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_M_box4['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_M_box4 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_M_box4_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_M_box4 H_dis_none"
                                                               name="content_M_box4_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $content_M_box5 = get_tem_result($site, $la, "content_M_box5", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_M_box5" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_M_box5['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_M_box5 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_M_box5_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_M_box5 H_dis_none"
                                                               name="content_M_box5_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $content_M_box6 = get_tem_result($site, $la, "content_M_box6", 'Medirence2', $coms_conect); ?>
                                                    <a id="H_input_rename_content_M_box6" href="#"
                                                       class="list-group-item  text-center ">
                                                        <span class="temp"><?= $content_M_box6['text'] ?></span>
                                                        <span data-original-title=" ویرایش "
                                                              class="H_rename_content_M_box6 H_pos_color"><span
                                                                    class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره "
                                                              class="H_rename_content_M_box6_save H_pos_color H_dis_none"><i
                                                                    class="fa fa-save"></i></span>

                                                        <input type="text" value=""
                                                               class="form-control H_pos_hw H_input_rename_content_M_box6 H_dis_none"
                                                               name="content_M_box6_name"
                                                               placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">

                                                <!-------------------------box1------------------>
                                                <div  id="content1" class="bhoechie-tab-content H1 active">
                                                    <center>

                                                        <? $content_M_boxOne = get_tem_result($site, $la, "content_M_boxOne", 'Medirence2', $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_M_boxOne['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_M_boxOne_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«اسلایدشو »</h5><br>
                                                        <? $ValSelectActive_content_M_slider = get_tem_result($site, $la, "ValSelectActive_content_M_slider", 'Medirence2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_content_M_slider"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_content_M_slider"
                                                                    name="select_type_content_M_slider">

                                                                <option <? if ($ValSelectActive_content_M_slider["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_M_slider["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_M_slider["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_content_M_slider_title" type="hidden"
                                                                   value="<?= $ValSelectActive_content_M_slider["title"] ?>">

                                                            <div class="tab-pane opt_content_M_slider content_M_slider_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_content_M_slider = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'first_choice_content_M_slider%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_content_M_slider; $j++) {
                                                                                    $first_choice_content_M_slider = get_tem_result($site, $la, "first_choice_content_M_slider$j", 'Medirence2', $coms_conect);
                                                                                    if ($first_choice_content_M_slider['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_content_M_slider<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_content_M_slider"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_content_M_slider col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_content_M_slider_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_content_M_slider_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_M_slider['pic'] ?>">

                                                                                                        <select id="first_choice_content_M_slider_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_content_M_slider_cat"
                                                                                                                name="first_choice_content_M_slider_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_content_M_slider['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_content_M_slider<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_content_M_slider_new&id=" + $("#first_choice_content_M_slider_cat<?=$j?>").val() + "&value=" + $("#first_choice_content_M_slider_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_content_M_slider<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_content_M_slider_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_content_M_slider_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_slider['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_slider['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_slider['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_content_M_slider_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_M_slider["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_content_M_slider_number<?= $j ?>">
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
                                                                                       id="first_choice_content_M_slider_count"
                                                                                       name="first_choice_content_M_slider_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_content_M_slider_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_content_M_slider').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_content_M_slider_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_content_M_slider<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_content_M_slider').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_content_M_slider' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_content_M_slider" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_content_M_slider col-md-4 input-group"><input type="hidden" id="first_choice_content_M_slider_subcat_val' + i + '"  name="first_choice_content_M_slider_subcat_val' + i + '" value=""> <select id="first_choice_content_M_slider_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_content_M_slider_cat" name="first_choice_content_M_slider_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_content_M_slider' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_content_M_slider_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_content_M_slider_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_content_M_slider_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_content_M_slider_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_content_M_slider' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_content_M_slider_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_content_M_slider', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_content_M_slider_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_content_M_slider' + id).remove();
                                                                                            $('#first_choice_content_M_slider_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_content_M_slider"><i
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

                                                            <div class="tab-pane opt_content_M_slider content_M_slider_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_content_M_slider = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'second_choice_content_M_slider%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_content_M_slider; $j++) {
                                                                                    $second_choice_content_M_slider = get_tem_result($site, $la, "second_choice_content_M_slider$j", 'Medirence2', $coms_conect);
                                                                                    if ($second_choice_content_M_slider['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_content_M_slider<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_content_M_slider"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_content_M_slider col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_M_slider_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_content_M_slider_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_M_slider['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_M_slider_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_content_M_slider_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_M_slider['pic_adress'] ?>">

                                                                                                        <select id="second_choice_content_M_slider_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_content_M_slider_cat"
                                                                                                                name="second_choice_content_M_slider_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_content_M_slider['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_M_slider<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_M_slider_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_M_slider&id=" + $("#second_choice_content_M_slider_cat<?=$j?>").val() + "&value=" + $("#second_choice_content_M_slider_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_M_slider<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_content_M_slider_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_M_slider_content&id=" + $("#second_choice_content_M_slider_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_content_M_slider_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_content_M_slider_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_M_slider_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_content_M_slider_count"
                                                                                       name="second_choice_content_M_slider_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_content_M_slider_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_content_M_slider').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_slider&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_content_M_slider<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_content_M_slider_neshane").change(function () {
                                                                                        var j = $("#second_choice_content_M_slider_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_slider&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_M_slider' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_content_M_slider_neshane', function () {
                                                                                        var j = $("#second_choice_content_M_slider_count").val();
                                                                                        //  $(".second_choice_content_M_slider_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_slider_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_M_slider_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_content_M_slider').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_content_M_slider' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_content_M_slider" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_content_M_slider col-md-3 input-group"><input type="hidden" id="second_choice_content_M_slider_subcat_val' + i + '"  name="second_choice_content_M_slider_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_content_M_slider_subcat_link' + i + '"  name="second_choice_content_M_slider_subcat_link' + i + '" value=""> <select id="second_choice_content_M_slider_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_content_M_slider_cat" name="second_choice_content_M_slider_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_content_M_slider' + i + '" class="col-md-3 input-group"></div><div id="second_choice_content_M_slider_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_content_M_slider' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_content_M_slider_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_content_M_slider', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_content_M_slider_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_content_M_slider' + id).remove();
                                                                                            $('#second_choice_content_M_slider_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_content_M_slider"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_content_M_slider content_M_slider_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?$count_third_choice_content_M_slider = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'third_choice_content_M_slider%' ", $coms_conect);
                                                                                for ($x = 1; $x <= $count_third_choice_content_M_slider; $x++) {
                                                                                    $third_choice_content_M_slider = get_tem_result($site, $la, "third_choice_content_M_slider$x", 'Medirence2', $coms_conect);
                                                                                    $third_choice_content_M_slider_btn = get_tem_result($site, $la, "third_choice_content_M_slider_btn$x", 'Medirence2', $coms_conect);
                                                                                    if ($third_choice_content_M_slider['title'] > "") {
                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_content_M_slider<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_content_M_slider" style="margin-bottom:50px"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-11">
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_slider_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_M_slider["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_content_M_slider_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_slider_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_M_slider["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_content_M_slider_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_slider_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_content_M_slider["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_content_M_slider_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_M_slider_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_content_M_slider<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_content_M_slider_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_content_M_slider_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_content_M_slider_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_content_M_slider<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_content_M_slider["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_content_M_slider<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_content_M_slider["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_content_M_slider["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_content_M_slider["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_content_M_slider_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_content_M_slider_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                         <div class="col-md-6 input-group">
                                                                                                            <input type="text" id="third_choice_content_M_slider_btn_title<?= $x ?>" value="<?= $third_choice_content_M_slider_btn["title"] ?>" class="form-control" placeholder="عنوان دکمه اول" name="third_choice_content_M_slider_btn_title<?= $x ?>"></div>
                                                                                                        <div class="col-md-6 input-group">
                                                                                                            <input type="text"
                                                                                                                   id="third_choice_content_M_slider_btn_link<?= $x ?>"
                                                                                                                   value="<?= $third_choice_content_M_slider_btn["link"] ?>"
                                                                                                                   class="form-control"
                                                                                                                   placeholder="لینک"
                                                                                                                   name="third_choice_content_M_slider_btn_link<?= $x ?>">
                                                                                                        </div>
                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                    <div class="col-md-6 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_slider_btn_text<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_M_slider_btn["text"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان دکمه دوم"
                                                                                                               name="third_choice_content_M_slider_btn_text<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-6 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_slider_btn_pic<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_M_slider_btn["pic"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_content_M_slider_btn_pic<?= $x ?>">
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
                                                                                       id="third_choice_content_M_slider_count"
                                                                                       name="third_choice_content_M_slider_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_content_M_slider-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_content_M_slider' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a style="margin-bottom:50px" class="col-md-1 control-label del_third_choice_content_M_slider" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_content_M_slider_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_content_M_slider_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_content_M_slider_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_content_M_slider_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_content_M_slider_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_content_M_slider_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_M_slider_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_content_M_slider' + i + '" style="padding: 0px;"><div  id="third_choice_content_M_slider_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_content_M_slider_avatar7_link' + i + '" name="third_choice_content_M_slider_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_content_M_slider' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="third_choice_content_M_slider_btn_title'+ i +'" value="" class="form-control" placeholder="عنوان دکمه اول" name="third_choice_content_M_slider_btn_title'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="third_choice_content_M_slider_btn_link'+ i +'" value="" class="form-control" placeholder="لینک" name="third_choice_content_M_slider_btn_link'+ i +'"></div></div><div class="col-md-11 input-group H_pl32"><div class="col-md-6 input-group"><input type="text" id="third_choice_content_M_slider_btn_text'+ i +'" value="" class="form-control" placeholder="عنوان دکمه اول" name="third_choice_content_M_slider_btn_text'+ i +'"></div><div class="col-md-6 input-group"><input type="text" id="third_choice_content_M_slider_btn_pic'+ i +'" value="" class="form-control" placeholder="لینک" name="third_choice_content_M_slider_btn_pic'+ i +'"></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_content_M_slider' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_content_M_slider_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_content_M_slider_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_content_M_slider_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_content_M_slider' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_content_M_slider' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_content_M_slider', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_content_M_slider_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_content_M_slider' + id).remove();
                                                                                            $('#third_choice_content_M_slider_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_content_M_slider-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_content_M_slider_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_content_M_slider"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_content_M_slider_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_content_M_slider').hide();
                                                                        $('.content_M_slider_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------block cat------------------->
                                                <div  id="content2" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_M_titleBox2 = get_tem_result($site, $la, "content_M_titleBox2", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_M_titleBox2['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_M_titleBox2_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="content_M_titleBox2_title"
                                                                           value="<?= $content_M_titleBox2["title"] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="page-content-area">
                                                            <div class="page-body" style="margin-top: 25px;">
                                                                <fieldset>
                                                                    <div class="col-md-12">
                                                                        <? $count_content_M_category = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'content_M_category%' ", $coms_conect);
                                                                        for ($j = 1; $j <= $count_content_M_category; $j++) {
                                                                            $content_M_category = get_tem_result($site, $la, "content_M_category$j", 'Medirence2', $coms_conect);
                                                                            if ($content_M_category['title'] > "") {
                                                                                ?>

                                                                                <div id="div_mother_second_choicedel_content_M_category<?= $j ?>"
                                                                                     class="seyed"
                                                                                     style="opacity: 1;">
                                                                                    <div class="form-group">
                                                                                        <a class="col-md-1 control-label del_content_M_category"
                                                                                           id="<?= $j ?>"
                                                                                           for="family"><i
                                                                                                    class="fa fa-trash text-danger remove"
                                                                                                    title="حذف"
                                                                                                    data-original-title="حذف"></i>
                                                                                        </a>
                                                                                            <div class="col-md-10 input-group">

                                                                                                <select  class="form-control " name="content_M_category_title<?=$j?>">

                                                                                                    <?$sql1 = "SELECT name,id from new_modules_cat  a  where type=11 and la='$la'";
                                                                                                    $result1 = $coms_conect->query($sql1);
                                                                                                    echo "<option value='0'>انتخاب کنید</option>";

                                                                                                    while($row = $result1->fetch_assoc()) {
                                                                                                        $str='';
                                                                                                        if($row['id']==$content_M_category['title'])
                                                                                                            $str='selected';
                                                                                                        echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                    }
                                                                                                    ?>

                                                                                                </select>

                                                                                            </div>
                                                                                    </div>

                                                                                </div>
                                                                                <?
                                                                            }
                                                                        }
                                                                        $jcount = $j;
                                                                        ?>
                                                                        <input type="hidden"
                                                                               id="content_M_category_count"
                                                                               name="content_M_category_count"
                                                                               value="<?= --$jcount; ?>">

                                                                        <script>
                                                                            $(document).ready(function () {
                                                                                var i = <?=$j?>;
                                                                                $('#add_content_M_category').on("click", function () {

                                                                                    var someText = '<div id="div_mother_second_choicedel_content_M_category' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_content_M_category" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-10"> <select  class="form-control " name="content_M_category_title' + i + '"> <?$sql1 = "SELECT name,id from new_modules_cat  a  where type=11 and la='$la'";$result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while($row = $result1->fetch_assoc()) {$str='';if($row['id']==$value) $str='selected'; echo "<option $str value={$row['id']}>{$row['name']}</option>";}?></select></div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_second_choicedel_content_M_category' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#content_M_category_count').val(i);
                                                                                    i++;
                                                                                });
                                                                                $(document).on('click', '.del_content_M_category', function () {
                                                                                    var id = '';
                                                                                    var k = $('#content_M_category_count').val();
                                                                                    k--
                                                                                    id = $(this).attr('id');
                                                                                    $('#div_mother_second_choicedel_content_M_category' + id).remove();
                                                                                    $('#content_M_category_count').val(k);
                                                                                });
                                                                            });


                                                                        </script>
                                                                        <a class="btn btn-success block"
                                                                           id="add_content_M_category"><i
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
                                                <!-------------------block video------------------->
                                                <div  id="content3" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_M_titleBox3 = get_tem_result($site, $la, "content_M_titleBox3", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_M_titleBox3['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_M_titleBox3_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control"
                                                                           name="content_M_titleBox3_title"
                                                                           value="<?= $content_M_titleBox3["title"] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«ویدیو »</h5><br>
                                                        <? $ValSelectActive_content_M_videos = get_tem_result($site, $la, "ValSelectActive_content_M_videos", 'Medirence2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_content_M_videos"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_content_M_videos"
                                                                    name="select_type_content_M_videos">

                                                                <option <? if ($ValSelectActive_content_M_videos["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_M_videos["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_M_videos["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_content_M_videos_title" type="hidden"
                                                                   value="<?= $ValSelectActive_content_M_videos["title"] ?>">

                                                            <div class="tab-pane opt_content_M_videos content_M_videos_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_content_M_videos = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'first_choice_content_M_videos%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_content_M_videos; $j++) {
                                                                                    $first_choice_content_M_videos = get_tem_result($site, $la, "first_choice_content_M_videos$j", 'Medirence2', $coms_conect);
                                                                                    if ($first_choice_content_M_videos['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_content_M_videos<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_content_M_videos"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_content_M_videos col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_content_M_videos_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_content_M_videos_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_M_videos['pic'] ?>">

                                                                                                        <select id="first_choice_content_M_videos_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_content_M_videos_cat"
                                                                                                                name="first_choice_content_M_videos_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_content_M_videos['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_content_M_videos<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_content_M_videos_new&id=" + $("#first_choice_content_M_videos_cat<?=$j?>").val() + "&value=" + $("#first_choice_content_M_videos_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_content_M_videos<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_content_M_videos_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_content_M_videos_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_videos['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_videos['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_videos['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_content_M_videos_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_M_videos["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_content_M_videos_number<?= $j ?>">
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
                                                                                       id="first_choice_content_M_videos_count"
                                                                                       name="first_choice_content_M_videos_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_content_M_videos_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_content_M_videos').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_content_M_videos_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_content_M_videos<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_content_M_videos').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_content_M_videos' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_content_M_videos" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_content_M_videos col-md-4 input-group"><input type="hidden" id="first_choice_content_M_videos_subcat_val' + i + '"  name="first_choice_content_M_videos_subcat_val' + i + '" value=""> <select id="first_choice_content_M_videos_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_content_M_videos_cat" name="first_choice_content_M_videos_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_content_M_videos' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_content_M_videos_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_content_M_videos_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_content_M_videos_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_content_M_videos_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_content_M_videos' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_content_M_videos_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_content_M_videos', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_content_M_videos_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_content_M_videos' + id).remove();
                                                                                            $('#first_choice_content_M_videos_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_content_M_videos"><i
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

                                                            <div class="tab-pane opt_content_M_videos content_M_videos_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_content_M_videos = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'second_choice_content_M_videos%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_content_M_videos; $j++) {
                                                                                    $second_choice_content_M_videos = get_tem_result($site, $la, "second_choice_content_M_videos$j", 'Medirence2', $coms_conect);
                                                                                    if ($second_choice_content_M_videos['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_content_M_videos<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_content_M_videos"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_content_M_videos col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_M_videos_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_content_M_videos_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_M_videos['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_M_videos_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_content_M_videos_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_M_videos['pic_adress'] ?>">

                                                                                                        <select id="second_choice_content_M_videos_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_content_M_videos_cat"
                                                                                                                name="second_choice_content_M_videos_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_content_M_videos['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_M_videos<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_M_videos_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_M_videos&id=" + $("#second_choice_content_M_videos_cat<?=$j?>").val() + "&value=" + $("#second_choice_content_M_videos_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_M_videos<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_content_M_videos_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_M_videos_content&id=" + $("#second_choice_content_M_videos_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_content_M_videos_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_content_M_videos_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_M_videos_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_content_M_videos_count"
                                                                                       name="second_choice_content_M_videos_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_content_M_videos_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_content_M_videos').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_videos&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_content_M_videos<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_content_M_videos_neshane").change(function () {
                                                                                        var j = $("#second_choice_content_M_videos_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_videos&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_M_videos' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_content_M_videos_neshane', function () {
                                                                                        var j = $("#second_choice_content_M_videos_count").val();
                                                                                        //  $(".second_choice_content_M_videos_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_videos_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_M_videos_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_content_M_videos').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_content_M_videos' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_content_M_videos" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_content_M_videos col-md-3 input-group"><input type="hidden" id="second_choice_content_M_videos_subcat_val' + i + '"  name="second_choice_content_M_videos_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_content_M_videos_subcat_link' + i + '"  name="second_choice_content_M_videos_subcat_link' + i + '" value=""> <select id="second_choice_content_M_videos_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_content_M_videos_cat" name="second_choice_content_M_videos_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_content_M_videos' + i + '" class="col-md-3 input-group"></div><div id="second_choice_content_M_videos_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_content_M_videos' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_content_M_videos_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_content_M_videos', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_content_M_videos_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_content_M_videos' + id).remove();
                                                                                            $('#second_choice_content_M_videos_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_content_M_videos"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_content_M_videos content_M_videos_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?$count_third_choice_content_M_videos = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'third_choice_content_M_videos%' ", $coms_conect);
                                                                                for ($x = 1; $x <= $count_third_choice_content_M_videos; $x++) {
                                                                                    $third_choice_content_M_videos = get_tem_result($site, $la, "third_choice_content_M_videos$x", 'Medirence2', $coms_conect);
                                                                                    if ($third_choice_content_M_videos['title'] > "") {
                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_content_M_videos<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_content_M_videos"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-11">
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_videos_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_M_videos["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_content_M_videos_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_videos_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_M_videos["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_content_M_videos_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_videos_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_content_M_videos["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_content_M_videos_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_M_videos_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_content_M_videos<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_content_M_videos_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_content_M_videos_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_content_M_videos_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_content_M_videos<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_content_M_videos["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_content_M_videos<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_content_M_videos["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_content_M_videos["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_content_M_videos["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_content_M_videos_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_content_M_videos_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                                       id="third_choice_content_M_videos_count"
                                                                                       name="third_choice_content_M_videos_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_content_M_videos-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_content_M_videos' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a  class="col-md-1 control-label del_third_choice_content_M_videos" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_content_M_videos_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_content_M_videos_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_content_M_videos_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_content_M_videos_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_content_M_videos_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_content_M_videos_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_M_videos_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_content_M_videos' + i + '" style="padding: 0px;"><div  id="third_choice_content_M_videos_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_content_M_videos_avatar7_link' + i + '" name="third_choice_content_M_videos_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_content_M_videos' + i + '" style="float:right;"></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_content_M_videos' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_content_M_videos_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_content_M_videos_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_content_M_videos_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_content_M_videos' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_content_M_videos' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_content_M_videos', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_content_M_videos_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_content_M_videos' + id).remove();
                                                                                            $('#third_choice_content_M_videos_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_content_M_videos-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_content_M_videos_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_content_M_videos"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_content_M_videos_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_content_M_videos').hide();
                                                                        $('.content_M_videos_option' + val).show();

                                                                    }
                                                                });

                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------block tablegh------------------->
                                                <div  id="content4" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_M_tablegh = get_tem_result($site, $la, "content_M_tablegh", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_M_tablegh['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_M_tablegh_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-11">
                                                            <div class="col-md-3 input-group">
                                                                <input type="text"
                                                                       id="content_M_tablegh_title"
                                                                       value="<?= $content_M_tablegh["title"] ?>"
                                                                       class="form-control"
                                                                       placeholder="عنوان"
                                                                       name="content_M_tablegh_title">
                                                            </div>
                                                            <div class="col-md-3 input-group">
                                                                <input type="text"
                                                                       id="content_M_tablegh_link"
                                                                       value="<?= $content_M_tablegh["link"] ?>"
                                                                       class="form-control"
                                                                       placeholder="لینک"
                                                                       name="content_M_tablegh_link">
                                                            </div>

                                                            <div class="col-md-5 input-group">
                                                                <input type="text"
                                                                       id="content_M_tablegh_pic"
                                                                       value="<?=$content_M_tablegh["pic"]?>"
                                                                       class="form-control"
                                                                       placeholder=" تصویر"
                                                                       name="content_M_tablegh_pic"
                                                                       style="direction: ltr;">
                                                                <span class="input-group-addon"
                                                                      style="padding: 0px;"><a
                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=content_M_tablegh_pic"
                                                                            class="btn btn-success iframe-btn"
                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                <span class="input-group-addon H_neshane1 H_content_M_tablegh"
                                                                      style="padding: 0px;">
                                                                                <div id="content_M_tablegh_avatar7"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="content_M_tablegh_avatar7_link"
                                                                                   name="content_M_tablegh_avatar7_link"
                                                                                   value="<? ?>">
                                                        </span>
                                                            </div>
                                                            <div class="ui-sortable red box"
                                                                 id="upload_type_content_M_tablegh"
                                                                 style="float:right;">
                                                            </div>
                                                                <div class=" col-md-1 input-group"
                                                                     id="image_show_content_M_tablegh">
                                                                    <a href="<?= $content_M_tablegh["pic"] ?>"
                                                                       class=" without-caption">
                                                                        <img width="33"
                                                                             height="33"
                                                                             class="H_cursor_zoom"
                                                                             src="<?= $content_M_tablegh["pic"] ?>"
                                                                             alt="<?= $content_M_tablegh["text"] ?>">
                                                                    </a>
                                                                </div>
                                                            <script type="text/javascript">
                                                                $(document).ready(function () {
                                                                    $('#content_M_tablegh_avatar7').orakuploader({
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

                                                                    $('#content_M_tablegh_avatar7').html("<?=$pic_str?>");
                                                                });
                                                            </script>

                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------content center box------------------->
                                                <div  id="content5" class="bhoechie-tab-content H1 ">
                                                    <center>
                                                        <? $content_M_titleBox5 = get_tem_result($site, $la, "content_M_titleBox5", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_M_titleBox5['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_M_titleBox5_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       

                                                        <hr>
                                                        <? $ValSelectActive_content_M_con_center = get_tem_result($site, $la, "ValSelectActive_content_M_con_center", 'Medirence2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_content_M_con_center"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_content_M_con_center"
                                                                    name="select_type_content_M_con_center">

                                                                <option <? if ($ValSelectActive_content_M_con_center["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_M_con_center["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_M_con_center["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_content_M_con_center_title" type="hidden"
                                                                   value="<?= $ValSelectActive_content_M_con_center["title"] ?>">

                                                            <div class="tab-pane opt_content_M_con_center content_M_con_center_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $first_choice_content_M_con_center = get_tem_result($site, $la, "first_choice_content_M_con_center", 'Medirence2', $coms_conect); ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_content_M_con_center"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">

                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_content_M_con_center col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_content_M_con_center_subcat_val"
                                                                                                               name="first_choice_content_M_con_center_subcat_val"
                                                                                                               value="<?= $first_choice_content_M_con_center['pic'] ?>">

                                                                                                        <select id="first_choice_content_M_con_center_cat"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control H_first_choice_content_M_con_center_cat"
                                                                                                                name="first_choice_content_M_con_center_cat">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_content_M_con_center['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_content_M_con_center"
                                                                                                         class="col-md-4 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_content_M_con_center_new&id=" + $("#first_choice_content_M_con_center_cat").val() + "&value=" + $("#first_choice_content_M_con_center_subcat_val").val() + "&field_nmae=" + '<?=$la?>' ,
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_content_M_con_center').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_content_M_con_center_Fixed_selection_cat"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_content_M_con_center_Fixed_selection_cat">
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_con_center['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_con_center['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_con_center['text'] == 2) echo 'selected'; ?>
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

                                                                                    $(document).on('change', '.H_first_choice_content_M_con_center_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_content_M_con_center').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_content_M_con_center_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_content_M_con_center<?//=$j?>//').html(result);
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

                                                            <div class="tab-pane opt_content_M_con_center content_M_con_center_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?  $second_choice_content_M_con_center = get_tem_result($site, $la, "second_choice_content_M_con_center", 'Medirence2', $coms_conect); ?>
                                                                                        <div id="div_mother_second_choicedel_second_choice_content_M_con_center"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">

                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_content_M_con_center col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_M_con_center_subcat_val"
                                                                                                               name="second_choice_content_M_con_center_subcat_val"
                                                                                                               value="<?= $second_choice_content_M_con_center['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_M_con_center_subcat_link"
                                                                                                               name="second_choice_content_M_con_center_subcat_link"
                                                                                                               value="<?= $second_choice_content_M_con_center['pic_adress'] ?>">

                                                                                                        <select id="second_choice_content_M_con_center_cat"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control H_second_choice_content_M_con_center_cat"
                                                                                                                name="second_choice_content_M_con_center_cat">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_content_M_con_center['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_M_con_center"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_M_con_center_content"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_M_con_center&id=" + $("#second_choice_content_M_con_center_cat").val() + "&value=" + $("#second_choice_content_M_con_center_subcat_val").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_M_con_center').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_content_M_con_center_subcat_link").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_M_con_center_content&id=" + $("#second_choice_content_M_con_center_subcat_val").val() + "&value=" + $("#second_choice_content_M_con_center_subcat_link").val() + "&secend_value=" + $("#second_choice_content_M_con_center_subcat_link").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_M_con_center_content').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_content_M_con_center_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_content_M_con_center').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_con_center&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_content_M_con_center<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_content_M_con_center_neshane").change(function () {

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_con_center&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_M_con_center').html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_content_M_con_center_neshane', function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_con_center_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_M_con_center_content' ).html(result);
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

                                                            <div class="opt_content_M_con_center content_M_con_center_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $third_choice_content_M_con_center = get_tem_result($site, $la, "third_choice_content_M_con_center", 'Medirence2', $coms_conect);?>
                                                                                        <div id="div_mother_third_choice_content_M_con_center"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_content_M_con_center"
                                                                                                   id="1"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_con_center_title"
                                                                                                               value="<?= $third_choice_content_M_con_center["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_content_M_con_center_title">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_con_center_link"
                                                                                                               value="<?= $third_choice_content_M_con_center["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_content_M_con_center_link">
                                                                                                    </div>

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_con_center_pic"
                                                                                                               value="<?=$third_choice_content_M_con_center["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_content_M_con_center_pic"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_M_con_center_pic"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_content_M_con_center"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_content_M_con_center_avatar7"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_content_M_con_center_avatar7_link"
                                                                                   name="third_choice_content_M_con_center_avatar7_link"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_content_M_con_center"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_content_M_con_center["pic"]!=""){?>
                                                                                                        <div class="input-group"
                                                                                                             id="image_show_third_choice_content_M_con_center">
                                                                                                            <a href="<?= $third_choice_content_M_con_center["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_content_M_con_center["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_content_M_con_center["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_content_M_con_center_avatar7').orakuploader({
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

                                                                                                            $('#third_choice_content_M_con_center_avatar7').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_content_M_con_center_text"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_content_M_con_center_text"><?= $third_choice_content_M_con_center["text"] ?>

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
                                                                    var val = $("[name='ValSelectActive_content_M_con_center_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_content_M_con_center"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_content_M_con_center_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_content_M_con_center').hide();
                                                                        $('.content_M_con_center_option' + val).show();

                                                                    }
                                                                });
                                                            </script>
                                                        </div>
                                                    </center>
                                                </div>
                                                <!-------------------light box------------------->
                                                <div  id="content6" class="bhoechie-tab-content H1 ">
                                                    <center>

                                                        <? $content_M_title_LightBox = get_tem_result($site, $la, "content_M_title_LightBox", 'Medirence2', $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($content_M_title_LightBox['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="content_M_title_LightBox_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="content_M_title_LightBox_title"
                                                                           value="<?= $content_M_title_LightBox['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $ValSelectActive_content_M_LightBox = get_tem_result($site, $la, "ValSelectActive_content_M_LightBox", 'Medirence2', $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_content_M_LightBox"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_content_M_LightBox"
                                                                    name="select_type_content_M_LightBox">

                                                                <option <? if ($ValSelectActive_content_M_LightBox["title"] == 1) {
                                                                    echo 'selected';
                                                                } ?> value='1'>انتخاب از ماژول
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_M_LightBox["title"] == 2) {
                                                                    echo 'selected';
                                                                } ?> value='2'>انتخاب از ماژول به همراه دسته بندی
                                                                    انتخابی
                                                                </option>
                                                                <option <? if ($ValSelectActive_content_M_LightBox["title"] == 3) {
                                                                    echo 'selected';
                                                                } ?> value='3'> اختصاصی
                                                                </option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_content_M_LightBox_title" type="hidden"
                                                                   value="<?= $ValSelectActive_content_M_LightBox["title"] ?>">

                                                            <div class="tab-pane opt_content_M_LightBox content_M_LightBox_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_content_M_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'first_choice_content_M_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_content_M_LightBox; $j++) {
                                                                                    $first_choice_content_M_LightBox = get_tem_result($site, $la, "first_choice_content_M_LightBox$j", 'Medirence2', $coms_conect);
                                                                                    if ($first_choice_content_M_LightBox['pic_adress'] > "") { ?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_content_M_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_content_M_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_content_M_LightBox col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_content_M_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_content_M_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_M_LightBox['pic'] ?>">

                                                                                                        <select id="first_choice_content_M_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_content_M_LightBox_cat"
                                                                                                                name="first_choice_content_M_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_content_M_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_content_M_LightBox<?= $j ?>"
                                                                                                         class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_content_M_LightBox_new&id=" + $("#first_choice_content_M_LightBox_cat<?=$j?>").val() + "&value=" + $("#first_choice_content_M_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_content_M_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_content_M_LightBox_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_content_M_LightBox_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_LightBox['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>
                                                                                                                جدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_LightBox['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>
                                                                                                                پربازدیدترین
                                                                                                                ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_content_M_LightBox['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>
                                                                                                                پربحث
                                                                                                                ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_content_M_LightBox_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_content_M_LightBox["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_content_M_LightBox_number<?= $j ?>">
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
                                                                                       id="first_choice_content_M_LightBox_count"
                                                                                       name="first_choice_content_M_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_content_M_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_content_M_LightBox').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_content_M_LightBox_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_content_M_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_content_M_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_content_M_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_content_M_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_content_M_LightBox col-md-4 input-group"><input type="hidden" id="first_choice_content_M_LightBox_subcat_val' + i + '"  name="first_choice_content_M_LightBox_subcat_val' + i + '" value=""> <select id="first_choice_content_M_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_content_M_LightBox_cat" name="first_choice_content_M_LightBox_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_content_M_LightBox' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_content_M_LightBox_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_content_M_LightBox_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_content_M_LightBox_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_content_M_LightBox_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_content_M_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_content_M_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_content_M_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_content_M_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_content_M_LightBox' + id).remove();
                                                                                            $('#first_choice_content_M_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_first_choice_content_M_LightBox"><i
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

                                                            <div class="tab-pane opt_content_M_LightBox content_M_LightBox_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_content_M_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'second_choice_content_M_LightBox%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_content_M_LightBox; $j++) {
                                                                                    $second_choice_content_M_LightBox = get_tem_result($site, $la, "second_choice_content_M_LightBox$j", 'Medirence2', $coms_conect);
                                                                                    if ($second_choice_content_M_LightBox['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_content_M_LightBox<?= $j ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_content_M_LightBox"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="حذف"
                                                                                                            data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_content_M_LightBox col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_M_LightBox_subcat_val<?= $j ?>"
                                                                                                               name="second_choice_content_M_LightBox_subcat_val<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_M_LightBox['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_content_M_LightBox_subcat_link<?= $j ?>"
                                                                                                               name="second_choice_content_M_LightBox_subcat_link<?= $j ?>"
                                                                                                               value="<?= $second_choice_content_M_LightBox['pic_adress'] ?>">

                                                                                                        <select id="second_choice_content_M_LightBox_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_content_M_LightBox_cat"
                                                                                                                name="second_choice_content_M_LightBox_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_content_M_LightBox['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_M_LightBox<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_content_M_LightBox_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_M_LightBox&id=" + $("#second_choice_content_M_LightBox_cat<?=$j?>").val() + "&value=" + $("#second_choice_content_M_LightBox_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_M_LightBox<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_content_M_LightBox_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_content_M_LightBox_content&id=" + $("#second_choice_content_M_LightBox_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_content_M_LightBox_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_content_M_LightBox_subcat_link<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_content_M_LightBox_content<?=$j?>').html(result);
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
                                                                                       id="second_choice_content_M_LightBox_count"
                                                                                       name="second_choice_content_M_LightBox_count"
                                                                                       value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_content_M_LightBox_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_content_M_LightBox').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_content_M_LightBox<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_content_M_LightBox_neshane").change(function () {
                                                                                        var j = $("#second_choice_content_M_LightBox_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_LightBox&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_M_LightBox' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_content_M_LightBox_neshane', function () {
                                                                                        var j = $("#second_choice_content_M_LightBox_count").val();
                                                                                        //  $(".second_choice_content_M_LightBox_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_content_M_LightBox_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_content_M_LightBox_content' + j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_content_M_LightBox').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_content_M_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_content_M_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_content_M_LightBox col-md-3 input-group"><input type="hidden" id="second_choice_content_M_LightBox_subcat_val' + i + '"  name="second_choice_content_M_LightBox_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_content_M_LightBox_subcat_link' + i + '"  name="second_choice_content_M_LightBox_subcat_link' + i + '" value=""> <select id="second_choice_content_M_LightBox_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_content_M_LightBox_cat" name="second_choice_content_M_LightBox_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_content_M_LightBox' + i + '" class="col-md-3 input-group"></div><div id="second_choice_content_M_LightBox_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_content_M_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_content_M_LightBox_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_content_M_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_content_M_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_content_M_LightBox' + id).remove();
                                                                                            $('#second_choice_content_M_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_second_choice_content_M_LightBox"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن
                                                                                    لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_content_M_LightBox content_M_LightBox_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_content_M_LightBox = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='Medirence2' and name like 'third_choice_content_M_LightBox%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_content_M_LightBox; $x++) {
                                                                                    $third_choice_content_M_LightBox = get_tem_result($site, $la, "third_choice_content_M_LightBox$x", 'Medirence2', $coms_conect);

                                                                                    if ($third_choice_content_M_LightBox['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_content_M_LightBox<?= $x ?>"
                                                                                             class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_content_M_LightBox"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title=""
                                                                                                            data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_LightBox_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_M_LightBox["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_content_M_LightBox_title<?= $x ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_LightBox_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_content_M_LightBox["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_content_M_LightBox_link<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_content_M_LightBox_pic<?= $x ?>"
                                                                                                               value="<?=$third_choice_content_M_LightBox["pic"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_content_M_LightBox_pic<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_M_LightBox_pic<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_content_M_LightBox<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div id="third_choice_content_M_LightBox_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                                                            <input type="hidden"
                                                                                   id="third_choice_content_M_LightBox_avatar7_link<?= $x ?>"
                                                                                   name="third_choice_content_M_LightBox_avatar7_link<?= $x ?>"
                                                                                   value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box"
                                                                                                         id="upload_type_third_choice_content_M_LightBox<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <?if($third_choice_content_M_LightBox["pic"]!=""){?>
                                                                                                        <div class="input-group col-md-1"
                                                                                                             id="image_show_third_choice_content_M_LightBox<?= $x ?>">
                                                                                                            <a href="<?= $third_choice_content_M_LightBox["pic"] ?>"
                                                                                                               class=" without-caption">
                                                                                                                <img width="33"
                                                                                                                     height="33"
                                                                                                                     class="H_cursor_zoom"
                                                                                                                     src="<?= $third_choice_content_M_LightBox["pic"] ?>"
                                                                                                                     alt="<?= $third_choice_content_M_LightBox["text"] ?>">
                                                                                                            </a>

                                                                                                        </div>
                                                                                                    <?}?>
                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_content_M_LightBox_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_content_M_LightBox_avatar7<?= $x ?>').html("<?=$pic_str?>");
                                                                                                        });
                                                                                                    </script>

                                                                                                </div>
                                                                                                <div class="col-md-11 input-group H_pl32">
                                                                                                                            <textarea type="text"
                                                                                                                                      id="third_choice_content_M_LightBox_text<?= $x ?>"
                                                                                                                                      class="form-control"
                                                                                                                                      placeholder="متن"
                                                                                                                                      name="third_choice_content_M_LightBox_text<?= $x ?>"><?= $third_choice_content_M_LightBox["text"] ?>

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
                                                                                       id="third_choice_content_M_LightBox_count"
                                                                                       name="third_choice_content_M_LightBox_count"
                                                                                       value="<?= --$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_content_M_LightBox-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_content_M_LightBox' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_content_M_LightBox" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_content_M_LightBox_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_content_M_LightBox_title' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="third_choice_content_M_LightBox_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_content_M_LightBox_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="third_choice_content_M_LightBox_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="third_choice_content_M_LightBox_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_content_M_LightBox_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_content_M_LightBox' + i + '" style="padding: 0px;"><div  id="third_choice_content_M_LightBox_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_content_M_LightBox_avatar7_link' + i + '" name="third_choice_content_M_LightBox_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_content_M_LightBox' + i + '" style="float:right;"></div></div><div class="col-md-11 input-group H_pl32"><textarea type="text" id="third_choice_content_M_LightBox_text' + i + '"  class="form-control" placeholder="متن" name="third_choice_content_M_LightBox_text' + i + '" ></textarea></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_content_M_LightBox' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_content_M_LightBox_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_content_M_LightBox_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_content_M_LightBox_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_content_M_LightBox' + i + '').find("div").first().next().css('width', '100px');
                                                                                            $('.input-group-addon.H_third_choice_content_M_LightBox' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                                                            //    ---end orakuploader
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_third_choice_content_M_LightBox', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_content_M_LightBox_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_content_M_LightBox' + id).remove();
                                                                                            $('#third_choice_content_M_LightBox_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block"
                                                                                   id="add_third_choice_content_M_LightBox-ads"><i
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
                                                                    var val = $("[name='ValSelectActive_content_M_LightBox_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_content_M_LightBox"]', function () {
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_content_M_LightBox_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });

                                                                    function toggleForm(val) {
                                                                        $('.opt_content_M_LightBox').hide();
                                                                        $('.content_M_LightBox_option' + val).show();

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

        //----------content_M---------------------
        $(".H_rename_content_M_box1").click(function () {
            $(this).hide();
            $('.H_rename_content_M_box1_save').show();
            $(".H_input_rename_content_M_box1").toggle(300);
        });
        $(".H_rename_content_M_box1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'content_M_box1' + "&value=" + $(".H_input_rename_content_M_box1").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_M_box1 > span.temp").text($(".H_input_rename_content_M_box1").val());
            $(this).hide();
            $('.H_rename_content_M_box1').show();
            $(".H_input_rename_content_M_box1").hide();
            $(".H_rename_content_M_box1.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_content_M_box2").click(function () {
            $(this).hide();
            $('.H_rename_content_M_box2_save').show();
            $(".H_input_rename_content_M_box2").toggle(300);
        });
        $(".H_rename_content_M_box2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'content_M_box2' + "&value=" + $(".H_input_rename_content_M_box2").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_M_box2 > span.temp").text($(".H_input_rename_content_M_box2").val());
            $(this).hide();
            $('.H_rename_content_M_box2').show();
            $(".H_input_rename_content_M_box2").hide();
            $(".H_rename_content_M_box2.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_content_M_title_box3").click(function () {
            $(this).hide();
            $('.H_rename_content_M_title_box3_save').show();
            $(".H_input_rename_content_M_title_box3").toggle(300);
        });
        $(".H_rename_content_M_title_box3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'content_M_title_box3' + "&value=" + $(".H_input_rename_content_M_title_box3").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_M_title_box3 > span.temp").text($(".H_input_rename_content_M_title_box3").val());
            $(this).hide();
            $('.H_rename_content_M_title_box3').show();
            $(".H_input_rename_content_M_title_box3").hide();
            $(".H_rename_content_M_title_box3.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_content_M_box4").click(function () {
            $(this).hide();
            $('.H_rename_content_M_box4_save').show();
            $(".H_input_rename_content_M_box4").toggle(300);
        });
        $(".H_rename_content_M_box4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'content_M_box4' + "&value=" + $(".H_input_rename_content_M_box4").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_M_box4 > span.temp").text($(".H_input_rename_content_M_box4").val());
            $(this).hide();
            $('.H_rename_content_M_box4').show();
            $(".H_input_rename_content_M_box4").hide();
            $(".H_rename_content_M_box4.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_content_M_box5").click(function () {
            $(this).hide();
            $('.H_rename_content_M_box5_save').show();
            $(".H_input_rename_content_M_box5").toggle(300);
        });
        $(".H_rename_content_M_box5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'content_M_box5' + "&value=" + $(".H_input_rename_content_M_box5").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_M_box5 > span.temp").text($(".H_input_rename_content_M_box5").val());
            $(this).hide();
            $('.H_rename_content_M_box5').show();
            $(".H_input_rename_content_M_box5").hide();
            $(".H_rename_content_M_box5.H_pos_color").css('transform', 'translateY(-24px)');
        });
        //-------------------------------
        $(".H_rename_content_M_box6").click(function () {
            $(this).hide();
            $('.H_rename_content_M_box6_save').show();
            $(".H_input_rename_content_M_box6").toggle(300);
        });
        $(".H_rename_content_M_box6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + 'Medirence2' + "&name=" + 'content_M_box6' + "&value=" + $(".H_input_rename_content_M_box6").val(),
                success: function (result) {
                }
            });
            $("#H_input_rename_content_M_box6 > span.temp").text($(".H_input_rename_content_M_box6").val());
            $(this).hide();
            $('.H_rename_content_M_box6').show();
            $(".H_input_rename_content_M_box6").hide();
            $(".H_rename_content_M_box6.H_pos_color").css('transform', 'translateY(-24px)');
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
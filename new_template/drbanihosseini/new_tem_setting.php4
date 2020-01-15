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



    ################################################################# هدر ############################################


    $header_link = injection_replace($_POST["header_link"]);
    $site_name = injection_replace($_POST["site_name"]);

    $header_pic_adress= injection_replace($_POST["header_pic_adress"]);
    $header_pic_adress_avatar_orak = injection_replace($_POST["header_pic_adress_avatar_orak"][0]);
    if($header_pic_adress_avatar_orak>""){
        $header_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $header_pic_adress_avatar_orak;
    }
    insert_templdate($site, $header_pic_adress, $la, '', $site_name, $header_link, '', "header_title", $tem, $coms_conect);

    ########################################################## باکس اول ###########################################

    $block_name1 = injection_replace($_POST["block_name1"]);
    if ($block_name1 > "") {
        insert_templdate($site, '', $la, $block_name1, '', '', '', "block1", $tem, $coms_conect);
    }

    $box1_header_pic_adress = 0;
    $box1_header_pic_adress = injection_replace($_POST["box1_header_pic_adress"]);
    $box1_header_title = injection_replace($_POST["box1_header_title"]);
    $box1_header_text = injection_replace($_POST["box1_header_text"]);
    $box1_header_link = injection_replace($_POST["box1_header_link"]);
    $box1_header_link_avatar_orak = injection_replace($_POST["box1_header_link_avatar_orak"][0]);
    if($box1_header_link_avatar_orak>""){
        $box1_header_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $box1_header_link_avatar_orak;
    }
    insert_templdate($site, $box1_header_pic_adress, $la, $box1_header_text, $box1_header_title,$box1_header_link, '', "box1_header", $tem, $coms_conect);


    $condition_first_choice_box1 = "name like 'first_choice_box1%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_box1, $coms_conect);
    $first_choice_box1_count = injection_replace_pic($_POST["first_choice_box1_count"]);
    for ($i = 1; $i <= $first_choice_box1_count; $i++) {
        $select_type_box1 = injection_replace_pic($_POST["select_type_box1"]);
        $first_choice_box1_cat = injection_replace_pic($_POST["first_choice_box1_cat{$i}"]);
        $first_choice_box1_subcat_cat = injection_replace_pic($_POST["first_choice_box1_subcat_cat{$i}"]);
        $first_choice_box1_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_box1_Fixed_selection_cat{$i}"]);
        $first_choice_box1_number = injection_replace_pic($_POST["first_choice_box1_number{$i}"]);
        if ($first_choice_box1_subcat_cat > 0)
            insert_templdate($site, $first_choice_box1_number, $la, $first_choice_box1_Fixed_selection_cat, $select_type_box1, $first_choice_box1_cat, $first_choice_box1_subcat_cat, "first_choice_box1$i", $tem, $coms_conect);
    }

    $condition_second_choice_box1="name like 'second_choice_box1%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting',$condition_second_choice_box1,$coms_conect);
    $second_choice_box1_count = injection_replace_pic($_POST["second_choice_box1_count"]);
    for ($i = 1; $i <= $second_choice_box1_count; $i++) {
        $select_type_box1 = injection_replace_pic($_POST["select_type_box1"]);
        $second_choice_box1_cat = injection_replace_pic($_POST["second_choice_box1_cat{$i}"]);
        $second_choice_box1_subcat_cat = injection_replace_pic($_POST["second_choice_box1_subcat_cat{$i}"]);
        $second_choice_box1_subcat_cat_content = injection_replace_pic($_POST["second_choice_box1_subcat_cat_content{$i}"]);
        if($second_choice_box1_subcat_cat_content>0)
            insert_templdate($site, $second_choice_box1_subcat_cat_content, $la, '', $select_type_box1, $second_choice_box1_cat, $second_choice_box1_subcat_cat, "second_choice_box1$i", $tem, $coms_conect);
    }

    $condition_third_choice_box1 = "name like 'third_choice_box1%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_box1, $coms_conect);
    $third_choice_box1_count = injection_replace_pic($_POST["third_choice_box1_count"]);
    for ($x = 1; $x <= $third_choice_box1_count; $x++) {
        $select_type_box1 = injection_replace_pic($_POST["select_type_box1"]);
        $third_choice_box1_text = injection_replace_pic($_POST["third_choice_box1_text{$x}"]);

        $third_choice_box1_link = injection_replace_pic($_POST["third_choice_box1_link{$x}"]);
        $third_choice_box1_pic = injection_replace_pic($_POST["third_choice_box1_pic{$x}"]);
        $third_choice_box1_avatar7 = injection_replace($_POST["third_choice_box1_avatar7{$x}"][0]);
        if($third_choice_box1_avatar7>""){
            $third_choice_box1_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_box1_avatar7;
        }

            insert_templdate($site, $third_choice_box1_pic, $la, $third_choice_box1_text, '', $third_choice_box1_link, $select_type_box1, "third_choice_box1$x", $tem, $coms_conect);
        }

    ########################################################### باکس دوم ویدیو #####################################
    $block_name2 = injection_replace($_POST["block_name2"]);
if ($block_name2 >"") {
    insert_templdate($site, '', $la, $block_name2, '', '', '', "block2", $tem, $coms_conect);
}

    $show_box2_pic_adress = 0;
    $show_box2_pic_adress = injection_replace($_POST["show_box2_pic_adress"]);
    $show_box2_title = injection_replace($_POST["show_box2_title"]);
    $show_box2_pic = injection_replace($_POST["show_box2_pic"]);
    $show_box2_pic_avatar_orak = injection_replace($_POST["show_box2_pic_avatar_orak"][0]);
    if($show_box2_pic_avatar_orak>""){
        $show_box2_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $show_box2_pic_avatar_orak;
    }
    insert_templdate($site, $show_box2_pic_adress, $la, '', $show_box2_title, '', $show_box2_pic, "show_box2", $tem, $coms_conect);

    $second_choice_box2_drbanihosseini_pregnancy_cat = injection_replace_pic($_POST["second_choice_box2_drbanihosseini_pregnancy_cat"]);
    $second_choice_box2_drbanihosseini_pregnancy_subcat_cat = injection_replace_pic($_POST["second_choice_box2_drbanihosseini_pregnancy_subcat_cat"]);
    $second_choice_box2_drbanihosseini_pregnancy_subcat_cat_content = injection_replace_pic($_POST["second_choice_box2_drbanihosseini_pregnancy_subcat_cat_content"]);
    if($second_choice_box2_drbanihosseini_pregnancy_subcat_cat_content>0)
        insert_templdate($site, $second_choice_box2_drbanihosseini_pregnancy_subcat_cat_content, $la, '', '', $second_choice_box2_drbanihosseini_pregnancy_cat, $second_choice_box2_drbanihosseini_pregnancy_subcat_cat, "second_choice_box2_drbanihosseini_pregnancy", $tem, $coms_conect);



    $condition_first_choice_box2_2 = "name like 'first_choice_box2_2%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_box2_2, $coms_conect);
    $first_choice_box2_2_count = injection_replace_pic($_POST["first_choice_box2_2_count"]);
    for ($i = 1; $i <= $first_choice_box2_2_count; $i++) {
        $select_type_box2_2 = injection_replace_pic($_POST["select_type_box2_2"]);
        $first_choice_box2_2_cat = injection_replace_pic($_POST["first_choice_box2_2_cat{$i}"]);
        $first_choice_box2_2_subcat_cat = injection_replace_pic($_POST["first_choice_box2_2_subcat_cat{$i}"]);
        $first_choice_box2_2_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_box2_2_Fixed_selection_cat{$i}"]);
        $first_choice_box2_2_number = injection_replace_pic($_POST["first_choice_box2_2_number{$i}"]);
        if ($first_choice_box2_2_subcat_cat > 0)
            insert_templdate($site, $first_choice_box2_2_number, $la, $first_choice_box2_2_Fixed_selection_cat, $select_type_box2_2, $first_choice_box2_2_cat, $first_choice_box2_2_subcat_cat, "first_choice_box2_2$i", $tem, $coms_conect);
    }

    $condition_second_choice_box2_2="name like 'second_choice_box2_2%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting',$condition_second_choice_box2_2,$coms_conect);
    $second_choice_box2_2_count = injection_replace_pic($_POST["second_choice_box2_2_count"]);
    for ($i = 1; $i <= $second_choice_box2_2_count; $i++) {
        $select_type_box2_2 = injection_replace_pic($_POST["select_type_box2_2"]);
        $second_choice_box2_2_cat = injection_replace_pic($_POST["second_choice_box2_2_cat{$i}"]);
        $second_choice_box2_2_subcat_cat = injection_replace_pic($_POST["second_choice_box2_2_subcat_cat{$i}"]);
        $second_choice_box2_2_subcat_cat_content = injection_replace_pic($_POST["second_choice_box2_2_subcat_cat_content{$i}"]);
        if($second_choice_box2_2_subcat_cat_content>0)
            insert_templdate($site, $second_choice_box2_2_subcat_cat_content, $la, '', $select_type_box2_2, $second_choice_box2_2_cat, $second_choice_box2_2_subcat_cat, "second_choice_box2_2$i", $tem, $coms_conect);
    }

    $condition_third_choice_box2_2 = "name like 'third_choice_box2_2%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_box2_2, $coms_conect);
    $third_choice_box2_2_count = injection_replace_pic($_POST["third_choice_box2_2_count"]);
    for ($x = 1; $x <= $third_choice_box2_2_count; $x++) {
        $select_type_box2_2 = injection_replace_pic($_POST["select_type_box2_2"]);
        $third_choice_box2_2_text = injection_replace_pic($_POST["third_choice_box2_2_text{$x}"]);
        $third_choice_box2_2_title = injection_replace_pic($_POST["third_choice_box2_2_title{$x}"]);
        $third_choice_box2_2_link = injection_replace_pic($_POST["third_choice_box2_2_link{$x}"]);
        $third_choice_box2_2_pic = injection_replace_pic($_POST["third_choice_box2_2_pic{$x}"]);
        $third_choice_box2_2_avatar7 = injection_replace($_POST["third_choice_box2_2_avatar7{$x}"][0]);
        if($third_choice_box2_2_avatar7>""){
            $third_choice_box2_2_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_box2_2_avatar7;
        }
        if ($third_choice_box2_2_text >""){
            insert_templdate($site, $third_choice_box2_2_pic, $la, $third_choice_box2_2_text, $third_choice_box2_2_title, $third_choice_box2_2_link, $select_type_box2_2, "third_choice_box2_2$x", $tem, $coms_conect);
        }}
    ########################################################### باکس سوم #####################################
    $block_name3 = injection_replace($_POST["block_name3"]);
if ($block_name3 >"") {
    insert_templdate($site, '', $la, $block_name3, '', '', '', "block3", $tem, $coms_conect);
}
    $box3_header_pic_adress = 0;
    $box3_header_pic_adress = injection_replace($_POST["box3_header_pic_adress"]);
    $box3_header_title = injection_replace($_POST["box3_header_title"]);
    $box3_header_text = injection_replace($_POST["box3_header_text"]);
    insert_templdate($site, $box3_header_pic_adress, $la, $box3_header_text, $box3_header_title, '', '', "box3_header", $tem, $coms_conect);



    ########################################################### باکس چهارم #####################################
    $block_name4 = injection_replace($_POST["block_name4"]);
if ($block_name4 >"") {
    insert_templdate($site, '', $la, $block_name4, '', '', '', "block4", $tem, $coms_conect);
}

    $box4_header_pic_adress = 0;
    $box4_header_pic_adress = injection_replace($_POST["box4_header_pic_adress"]);
    $box4_header_title = injection_replace($_POST["box4_header_title"]);
    $box4_header_pic = injection_replace($_POST["box4_header_pic"]);
    insert_templdate($site, $box4_header_pic_adress, $la, '', $box4_header_title, '', $box4_header_pic, "box4_header", $tem, $coms_conect);


    $condition_first_choice_box4 = "name like 'first_choice_box4%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_box4, $coms_conect);
    $first_choice_box4_count = injection_replace_pic($_POST["first_choice_box4_count"]);
    for ($i = 1; $i <= $first_choice_box4_count; $i++) {
        $select_type_box4 = injection_replace_pic($_POST["select_type_box4"]);
        $first_choice_box4_cat = injection_replace_pic($_POST["first_choice_box4_cat{$i}"]);
        $first_choice_box4_subcat_cat = injection_replace_pic($_POST["first_choice_box4_subcat_cat{$i}"]);
        $first_choice_box4_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_box4_Fixed_selection_cat{$i}"]);
        $first_choice_box4_number = injection_replace_pic($_POST["first_choice_box4_number{$i}"]);
        if ($first_choice_box4_subcat_cat > 0)
            insert_templdate($site, $first_choice_box4_number, $la, $first_choice_box4_Fixed_selection_cat, $select_type_box4, $first_choice_box4_cat, $first_choice_box4_subcat_cat, "first_choice_box4$i", $tem, $coms_conect);
    }

    $condition_second_choice_box4="name like 'second_choice_box4%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting',$condition_second_choice_box4,$coms_conect);
    $second_choice_box4_count = injection_replace_pic($_POST["second_choice_box4_count"]);
    for ($i = 1; $i <= $second_choice_box4_count; $i++) {
        $select_type_box4 = injection_replace_pic($_POST["select_type_box4"]);
        $second_choice_box4_cat = injection_replace_pic($_POST["second_choice_box4_cat{$i}"]);
        $second_choice_box4_subcat_cat = injection_replace_pic($_POST["second_choice_box4_subcat_cat{$i}"]);
        $second_choice_box4_subcat_cat_content = injection_replace_pic($_POST["second_choice_box4_subcat_cat_content{$i}"]);
        if($second_choice_box4_subcat_cat_content>0)
            insert_templdate($site, $second_choice_box4_subcat_cat_content, $la, '', $select_type_box4, $second_choice_box4_cat, $second_choice_box4_subcat_cat, "second_choice_box4$i", $tem, $coms_conect);
    }

    $condition_third_choice_box4 = "name like 'third_choice_box4%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_box4, $coms_conect);
    $third_choice_box4_count = injection_replace_pic($_POST["third_choice_box4_count"]);
    for ($x = 1; $x <= $third_choice_box4_count; $x++) {
        $select_type_box4 = injection_replace_pic($_POST["select_type_box4"]);
        $third_choice_box4_text = injection_replace_pic($_POST["third_choice_box4_text{$x}"]);
        $third_choice_box4_title = injection_replace_pic($_POST["third_choice_box4_title{$x}"]);
        $third_choice_box4_link = injection_replace_pic($_POST["third_choice_box4_link{$x}"]);
        $third_choice_box4_pic = injection_replace_pic($_POST["third_choice_box4_pic{$x}"]);
        $third_choice_box4_avatar7 = injection_replace($_POST["third_choice_box4_avatar7{$x}"][0]);
        if($third_choice_box4_avatar7>""){
            $third_choice_box4_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_box4_avatar7;
        }
        if ($third_choice_box4_title >""){
            insert_templdate($site, $third_choice_box4_pic, $la, $third_choice_box4_text, $third_choice_box4_title, $third_choice_box4_link, $select_type_box4, "third_choice_box4$x", $tem, $coms_conect);
        }}
    ########################################################### باکس پنجم #####################################
    $block_name5 = injection_replace($_POST["block_name5"]);
if ($block_name5 >"") {
    insert_templdate($site, '', $la, $block_name5, '', '', '', "block5", $tem, $coms_conect);
}

    $box5_drbanihosseini_pregnancy_header_pic_adress = 0;
    $box5_drbanihosseini_pregnancy_header_pic_adress = injection_replace($_POST["box5_drbanihosseini_pregnancy_header_pic_adress"]);
    $box5_drbanihosseini_pregnancy_header_title = injection_replace($_POST["box5_drbanihosseini_pregnancy_header_title"]);
    $box5_drbanihosseini_pregnancy_header_text = injection_replace($_POST["box5_drbanihosseini_pregnancy_header_text"]);
    insert_templdate($site, $box5_drbanihosseini_pregnancy_header_pic_adress, $la, $box5_drbanihosseini_pregnancy_header_text, $box5_drbanihosseini_pregnancy_header_title, '', '', "box5_drbanihosseini_pregnancy_header", $tem, $coms_conect);


    $condition_first_choice_box5_drbanihosseini_pregnancy = "name like 'first_choice_box5_drbanihosseini_pregnancy%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_box5_drbanihosseini_pregnancy, $coms_conect);
    $first_choice_box5_drbanihosseini_pregnancy_count = injection_replace_pic($_POST["first_choice_box5_drbanihosseini_pregnancy_count"]);
    for ($i = 1; $i <= $first_choice_box5_drbanihosseini_pregnancy_count; $i++) {
        $select_type_box5_drbanihosseini_pregnancy = injection_replace_pic($_POST["select_type_box5_drbanihosseini_pregnancy"]);
        $first_choice_box5_drbanihosseini_pregnancy_cat = injection_replace_pic($_POST["first_choice_box5_drbanihosseini_pregnancy_cat{$i}"]);
        $first_choice_box5_drbanihosseini_pregnancy_subcat_cat = injection_replace_pic($_POST["first_choice_box5_drbanihosseini_pregnancy_subcat_cat{$i}"]);
        $first_choice_box5_drbanihosseini_pregnancy_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_box5_drbanihosseini_pregnancy_Fixed_selection_cat{$i}"]);
        $first_choice_box5_drbanihosseini_pregnancy_number = injection_replace_pic($_POST["first_choice_box5_drbanihosseini_pregnancy_number{$i}"]);
        if ($first_choice_box5_drbanihosseini_pregnancy_subcat_cat > 0)
            insert_templdate($site, $first_choice_box5_drbanihosseini_pregnancy_number, $la, $first_choice_box5_drbanihosseini_pregnancy_Fixed_selection_cat, $select_type_box5_drbanihosseini_pregnancy, $first_choice_box5_drbanihosseini_pregnancy_cat, $first_choice_box5_drbanihosseini_pregnancy_subcat_cat, "first_choice_box5_drbanihosseini_pregnancy$i", $tem, $coms_conect);
    }

    $condition_second_choice_box5_drbanihosseini_pregnancy="name like 'second_choice_box5_drbanihosseini_pregnancy%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting',$condition_second_choice_box5_drbanihosseini_pregnancy,$coms_conect);
    $second_choice_box5_drbanihosseini_pregnancy_count = injection_replace_pic($_POST["second_choice_box5_drbanihosseini_pregnancy_count"]);
    for ($i = 1; $i <= $second_choice_box5_drbanihosseini_pregnancy_count; $i++) {
        $select_type_box5_drbanihosseini_pregnancy = injection_replace_pic($_POST["select_type_box5_drbanihosseini_pregnancy"]);
        $second_choice_box5_drbanihosseini_pregnancy_cat = injection_replace_pic($_POST["second_choice_box5_drbanihosseini_pregnancy_cat{$i}"]);
        $second_choice_box5_drbanihosseini_pregnancy_subcat_cat = injection_replace_pic($_POST["second_choice_box5_drbanihosseini_pregnancy_subcat_cat{$i}"]);
        $second_choice_box5_drbanihosseini_pregnancy_subcat_cat_content = injection_replace_pic($_POST["second_choice_box5_drbanihosseini_pregnancy_subcat_cat_content{$i}"]);
        if($second_choice_box5_drbanihosseini_pregnancy_subcat_cat_content>0)
            insert_templdate($site, $second_choice_box5_drbanihosseini_pregnancy_subcat_cat_content, $la, '', $select_type_box5_drbanihosseini_pregnancy, $second_choice_box5_drbanihosseini_pregnancy_cat, $second_choice_box5_drbanihosseini_pregnancy_subcat_cat, "second_choice_box5_drbanihosseini_pregnancy$i", $tem, $coms_conect);
    }

    $condition_third_choice_box5_drbanihosseini_pregnancy = "name like 'third_choice_box5_drbanihosseini_pregnancy%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_box5_drbanihosseini_pregnancy, $coms_conect);
    $third_choice_box5_drbanihosseini_pregnancy_count = injection_replace_pic($_POST["third_choice_box5_drbanihosseini_pregnancy_count"]);
    for ($x = 1; $x <= $third_choice_box5_drbanihosseini_pregnancy_count; $x++) {
        $select_type_box5_drbanihosseini_pregnancy = injection_replace_pic($_POST["select_type_box5_drbanihosseini_pregnancy"]);
        $third_choice_box5_drbanihosseini_pregnancy_text = injection_replace_pic($_POST["third_choice_box5_drbanihosseini_pregnancy_text{$x}"]);
        $third_choice_box5_drbanihosseini_pregnancy_title = injection_replace_pic($_POST["third_choice_box5_drbanihosseini_pregnancy_title{$x}"]);
        $third_choice_box5_drbanihosseini_pregnancy_link = injection_replace_pic($_POST["third_choice_box5_drbanihosseini_pregnancy_link{$x}"]);
        $third_choice_box5_drbanihosseini_pregnancy_pic = injection_replace_pic($_POST["third_choice_box5_drbanihosseini_pregnancy_pic{$x}"]);
        $third_choice_box5_drbanihosseini_pregnancy_avatar7 = injection_replace($_POST["third_choice_box5_drbanihosseini_pregnancy_avatar7{$x}"][0]);
        if($third_choice_box5_drbanihosseini_pregnancy_avatar7>""){
            $third_choice_box5_drbanihosseini_pregnancy_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_box5_drbanihosseini_pregnancy_avatar7;
        }
        if ($third_choice_box5_drbanihosseini_pregnancy_title >""){
            insert_templdate($site, $third_choice_box5_drbanihosseini_pregnancy_pic, $la, $third_choice_box5_drbanihosseini_pregnancy_text, $third_choice_box5_drbanihosseini_pregnancy_title, $third_choice_box5_drbanihosseini_pregnancy_link, $select_type_box5_drbanihosseini_pregnancy, "third_choice_box5_drbanihosseini_pregnancy$x", $tem, $coms_conect);
        }}


########################################################### فوتر########################################################
    $block_name_footer = injection_replace($_POST["block_name_footer"]);
if ($block_name_footer >"") {
    insert_templdate($site, '', $la, $block_name_footer, '', '', '', "block_footer", $tem, $coms_conect);
}


    $footer_column1_text = injection_replace($_POST["footer_column1_text"]);
    $footer_column1_title = injection_replace($_POST["footer_column1_title"]);
    insert_templdate($site, '', $la, $footer_column1_text, $footer_column1_title, '','', "footer_column1", $tem, $coms_conect);

    $footer_social_del = "name like 'footer_social%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $footer_social_del, $coms_conect);
    $footer_social_networks_count = injection_replace_pic($_POST["footer_social_networks_count"]);
    for ($k = 1; $k <= $footer_social_networks_count; $k++) {
        $footer_social_networks_title = injection_replace_pic($_POST["footer_social_networks_title{$k}"]);
        $footer_social_networks_link = injection_replace_pic($_POST["footer_social_networks_link{$k}"]);
        insert_templdate($site, '', $la, '', $footer_social_networks_title, $footer_social_networks_link, '', "footer_social$k", $tem, $coms_conect);
    }
//    -------------------------------------ستون دوم -------------------------------------
    $two_column_links_del = "name like 'two_column_footer_links%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $two_column_links_del, $coms_conect);
    $two_column_links_count = injection_replace_pic($_POST["two_column_links_count"]);
    for ($k = 1; $k <= $two_column_links_count; $k++) {
        $two_column_links_title = injection_replace_pic($_POST["two_column_links_title{$k}"]);
        $two_column_links_link = injection_replace_pic($_POST["two_column_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $two_column_links_title, $two_column_links_link, '', "two_column_footer_links$k", $tem, $coms_conect);
    }
//--------------------------------------ستون سوم----------------------------------------

    $three_column_links_del = "name like 'three_column_footer_links%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $three_column_links_del, $coms_conect);
    $three_column_links_count = injection_replace_pic($_POST["three_column_links_count"]);
    for ($k = 1; $k <= $three_column_links_count; $k++) {
        $three_column_links_title = injection_replace_pic($_POST["three_column_links_title{$k}"]);
        $three_column_links_link = injection_replace_pic($_POST["three_column_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $three_column_links_title, $three_column_links_link, '', "three_column_footer_links$k", $tem, $coms_conect);
    }

    $Strip_link_del = "name like 'Strip_link%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $Strip_link_del, $coms_conect);
    $Strip_link_count = injection_replace_pic($_POST["Strip_link_count"]);
    for ($k = 1; $k <= $Strip_link_count; $k++) {
        $Strip_link_title = injection_replace_pic($_POST["Strip_link_title{$k}"]);
        $Strip_link_link = injection_replace_pic($_POST["Strip_link_link{$k}"]);
        insert_templdate($site, '', $la, '', $Strip_link_title, $Strip_link_link, '', "Strip_link$k", $tem, $coms_conect);
    }


    ########################################################### درج ایمیل########################################################
    $block_name_email = injection_replace($_POST["block_name_email"]);
if ($block_name_email >"") {
    insert_templdate($site, '', $la, $block_name_email, '', '', '', "block_email", $tem, $coms_conect);
}

    $email_link = injection_replace($_POST["email_link"]);
    $email_title = injection_replace($_POST["email_title"]);
    $email_pic = injection_replace($_POST["email_pic"]);
    $email_pic_avatar_orak = injection_replace($_POST["email_pic_avatar_orak"][0]);
    if($email_pic_avatar_orak>""){
        $email_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $email_pic_avatar_orak;
    }
    insert_templdate($site, '', $la, '', $email_title, $email_link, $email_pic, "email", $tem, $coms_conect);

    ########################################################### درج شماره تماس ########################################################
    $block_name_call = injection_replace($_POST["block_name_call"]);
if ($block_name_call >"") {
    insert_templdate($site, '', $la, $block_name_call, '', '', '', "block_call", $tem, $coms_conect);
}

    $contact_us_links_count = injection_replace_pic($_POST["contact_us_links_count"]);
    for ($k = 1; $k <= $contact_us_links_count; $k++) {
        $contact_us_links_title = injection_replace_pic($_POST["contact_us_links_title{$k}"]);
        $contact_us_links_link = injection_replace_pic($_POST["contact_us_links_link{$k}"]);
        insert_templdate($site, '', $la, '', $contact_us_links_title, $contact_us_links_link, '', "contact_links$k", $tem, $coms_conect);
    }

    ########################################################### تب ########################################################
$count1_tab_name = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'tab_name%' ", $coms_conect);




$block_name_setting_tab_name = injection_replace($_POST["block_name_setting_tab_name"]);
    if ($block_name_setting_tab_name >"") {
        insert_templdate($site, '', $la, $block_name_setting_tab_name, '', '', '', "setting_tab_name", $tem, $coms_conect);
    }

for ($z = 1; $z <= $count1_tab_name; $z++) {
    $block_name_tab = injection_replace($_POST["block_name_tab$z"]);
    insert_templdate($site, '', $la, $block_name_tab, '', '', '', "tab_name$z", $tem, $coms_conect);
    }


    //----------tab name
    $condition_tab_name = "name like 'tab_name%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_tab_name, $coms_conect);

    $tab_name_count = injection_replace_pic($_POST["tab_name_count"]);
    for ($x = 1; $x <= $tab_name_count; $x++) {

        $tab_name_text = injection_replace_pic($_POST["tab_name_text{$x}"]);
        $tab_name_pic = injection_replace_pic($_POST["tab_name_pic{$x}"]);
        $tab_name_avatar7 = injection_replace($_POST["tab_name_avatar7{$x}"][0]);
        if($tab_name_avatar7>""){
            $tab_name_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $tab_name_avatar7;
        }
        if ($tab_name_text >""){
            insert_templdate($site, $tab_name_pic, $la, $tab_name_text, '', '', '', "tab_name$x", $tem, $coms_conect);
        }}
    //-------end tab name------------

    //-------tab------------


  for ($u = 1; $u <= $count1_tab_name; $u++) {

      $ValSelectActive_title = injection_replace($_POST["ValSelectActive_title{$u}"]);
      insert_templdate($site, '', $la, '', $ValSelectActive_title, '', '', "ValSelectActive$u", $tem, $coms_conect);

      $first_choice_box_cat_tab = injection_replace_pic($_POST["first_choice_box_cat_tab{$u}"]);
      $first_choice_box_subcat_cat_tab = injection_replace_pic($_POST["first_choice_box_subcat_cat_tab{$u}"]);
      $first_choice_box_Fixed_selection_cat_tab = injection_replace_pic($_POST["first_choice_box_Fixed_selection_cat_tab{$u}"]);
      $first_choice_box_number_tab = injection_replace_pic($_POST["first_choice_box_number_tab{$u}"]);
      if ($first_choice_box_subcat_cat_tab >0)
      insert_templdate($site, $first_choice_box_number_tab, $la, $first_choice_box_Fixed_selection_cat_tab, '', $first_choice_box_cat_tab, $first_choice_box_subcat_cat_tab, "first_choice_box_tab$u", $tem, $coms_conect);


      $select_type_box_tab = injection_replace_pic($_POST["select_type_box_tab{$u}"]);
      $second_choice_box_cat_tab = injection_replace_pic($_POST["second_choice_box_cat_tab{$u}"]);
      $second_choice_box_subcat_cat_tab = injection_replace_pic($_POST["second_choice_box_subcat_cat_tab{$u}"]);
      $second_choice_box_subcat_cat_content_tab = injection_replace_pic($_POST["second_choice_box_subcat_cat_content_tab{$u}"]);
      if ($second_choice_box_subcat_cat_content_tab > 0)
          insert_templdate($site, $second_choice_box_subcat_cat_content_tab, $la, '', $select_type_box_tab, $second_choice_box_cat_tab, $second_choice_box_subcat_cat_tab, "second_choice_box_tab$u", $tem, $coms_conect);

//=====form1
      $select_type_box_tab = injection_replace_pic($_POST["select_type_box_tab{$u}"]);

      $third_choice_box_form1_link_tab = injection_replace_pic($_POST["third_choice_box_form1_link_tab{$u}"]);
      $third_choice_box_form1_text_tab = injection_replace_pic($_POST["third_choice_box_form1_text_tab{$u}"]);
      $third_choice_box_form1_title_tab = injection_replace_pic($_POST["third_choice_box_form1_title_tab{$u}"]);

      $third_choice_box_form1_pic_tab = injection_replace_pic($_POST["third_choice_box_form1_pic_tab{$u}"]);
      $third_choice_box_form1_pic_avatar_orak_tab = injection_replace($_POST["third_choice_box_form1_pic_avatar_orak_tab{$u}"][0]);
      if ($third_choice_box_form1_pic_avatar_orak_tab > "") {
          $third_choice_box_form1_pic_tab = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_box_form1_pic_avatar_orak_tab;
      }
      if ($third_choice_box_form1_title_tab > "") {
          insert_templdate($site, $select_type_box_tab, $la, $third_choice_box_form1_text_tab, $third_choice_box_form1_title_tab, $third_choice_box_form1_link_tab, $third_choice_box_form1_pic_tab, "third_choice_box_form1_tab$u", $tem, $coms_conect);
      }

      for ($t = 1; $t <= 2; $t++) {
          $third_choice_box_form1_btn_title_tab = injection_replace_pic($_POST["third_choice_box_form1_btn_title_tab{$t}{$u}"]);
          $third_choice_box_form1_btn_link_tab = injection_replace_pic($_POST["third_choice_box_form1_btn_link_tab{$t}{$u}"]);
          insert_templdate($site, $select_type_box_tab, $la, '', $third_choice_box_form1_btn_title_tab, $third_choice_box_form1_btn_link_tab, '', "third_choice_box_form1_tab_btn$t$u", $tem, $coms_conect);
      }
      //=====End form1
      //=====form2

      $third_choice_box_form2_link_tab = injection_replace_pic($_POST["third_choice_box_form2_link_tab{$u}"]);
      $third_choice_form2_text_tab = injection_replace_pic($_POST["third_choice_form2_text_tab{$u}"]);
      $third_choice_box_form2_pic_tab = injection_replace_pic($_POST["third_choice_box_form2_pic_tab{$u}"]);
      $third_choice_box_form2_pic_avatar_orak_tab = injection_replace($_POST["third_choice_box_form2_pic_avatar_orak_tab{$u}"][0]);
      if ($third_choice_box_form2_pic_avatar_orak_tab > "") {
          $third_choice_box_form2_pic_tab = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_box_form2_pic_avatar_orak_tab;
      }
      if ($third_choice_form2_text_tab > "") {
          insert_templdate($site, $select_type_box_tab, $la, $third_choice_form2_text_tab, '', $third_choice_box_form2_link_tab, $third_choice_box_form2_pic_tab, "third_choice_box_form2_tab$u", $tem, $coms_conect);
      }


      $ul_name_form2_tab_del = "name like 'ul_name_form2_tab$u%' and tem_name='$tem'";
      delete_from_data_base('new_tem_setting', $ul_name_form2_tab_del, $coms_conect);
      $ul_name_form2_count_tab = injection_replace_pic($_POST["ul_name_form2_count_tab{$u}"]);
      for ($k = 1; $k <= $ul_name_form2_count_tab; $k++) {
          $ul_name_form2_title_ads_tab = injection_replace_pic($_POST["ul_name_form2_title_ads_tab{$u}-{$k}"]);
          if($ul_name_form2_title_ads_tab>""){
          insert_templdate($site, $select_type_box_tab, $la, '', $ul_name_form2_title_ads_tab, '', '', "ul_name_form2_tab$u-$k", $tem, $coms_conect);
      }}


//=====End form2
//=====form3


      $ul_name_form3_text_ads_tab = injection_replace_pic($_POST["ul_name_form3_text_ads_tab{$u}"]);
      $third_choice_box_form3_link_tab = injection_replace_pic($_POST["third_choice_box_form3_link_tab{$u}"]);
      if ($ul_name_form3_text_ads_tab >"") {
          insert_templdate($site, $select_type_box_tab, $la, $ul_name_form3_text_ads_tab, '', $third_choice_box_form3_link_tab, '', "third_choice_box_form3_tab$u", $tem, $coms_conect);
      }

      $ul_name_form3_tab_del = "name like 'ul_name_form3_tab$u%' and tem_name='$tem'";
      delete_from_data_base('new_tem_setting', $ul_name_form3_tab_del, $coms_conect);
      $ul_name_form3_count_tab = injection_replace_pic($_POST["ul_name_form3_count_tab{$u}"]);
      for ($k = 1; $k <= $ul_name_form3_count_tab; $k++) {
          $ul_name_form3_title_ads_tab = injection_replace_pic($_POST["ul_name_form3_title_ads_tab{$u}-{$k}"]);
          if($ul_name_form3_title_ads_tab>""){
              insert_templdate($site, $select_type_box_tab, $la, '', $ul_name_form3_title_ads_tab, '', '', "ul_name_form3_tab$u-$k", $tem, $coms_conect);
          }}

      for ($s = 1; $s <= 2; $s++) {
          $third_choice_box_form3_box_text_tab = injection_replace_pic($_POST["third_choice_box_form3_box_text_tab{$s}{$u}"]);
          $third_choice_box_form3_box_link_tab = injection_replace_pic($_POST["third_choice_box_form3_box_link_tab{$s}{$u}"]);
          $third_choice_box_form3_box_pic_tab = injection_replace_pic($_POST["third_choice_box_form3_box_pic_tab{$s}{$u}"]);
          $third_choice_box_form3_box_avatar_tab = injection_replace($_POST["third_choice_box_form3_box_avatar_tab{$s}{$u}"][0]);
          if ($third_choice_box_form3_box_avatar_tab > "") {
              $third_choice_box_form3_box_pic_tab = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_box_form3_box_avatar_tab;
          }
          if ($third_choice_box_form3_box_text_tab > "") {
              insert_templdate($site, $select_type_box_tab, $la, $third_choice_box_form3_box_text_tab, '', $third_choice_box_form3_box_link_tab, $third_choice_box_form3_box_pic_tab, "third_choice_box_form3_box_tab$s$u", $tem, $coms_conect);
          }
      }
  }
//=====End form3
//-------end tab1------------

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
            <div class="title"><p class="titr">تنظیمات مربوط به قالب</p><p class="lead">امکان مدیریت و افزودن و ویرایش کردن بلوک های داخل صفحه اول در این قسمت فراهم شده است.</p>
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
                                <ul class="z-tabs-nav z-tabs-desktop H_float_r">
                                    <li date-culom-id="1" class="z-tab H_style_header z-active z-first H_float_r"  data-link="tab1">
                                        <a class="z-link ">تنظیمات مربوط به هدر</a>
                                    </li>
                                    <li class="z-tab H_style_header "  data-link="tab2">
                                        <a class="z-link ">تنظیمات مربوط به بلوک های داخل</a>
                                    </li>

                                    <li class="z-tab H_style_header z-last"  data-link="tab3">
                                        <a class="z-link ">تنظیمات مربوط به فوتر</a>
                                    </li>
                                    <li class="z-tab H_style_header "  data-link="tab4">
                                        <a class="z-link ">تنظیمات تب</a>
                                    </li>
                                </ul>
                                <div class="h-content2  z-container">
                                    <!-----------------------------------------------------header---------------------------------------------->
                                    <div class="z-content z-active" style="position: relative; display: block;" >
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">
                                                    <? $block_header = get_tem_result($site, $la, "block_header", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_header" href="#" class="list-group-item  active text-center ">
                                                   <span class="temp"><?= $block_header['text'] ?></span>
                                                    <span  data-original-title=" ویرایش " class="H_rename_header H_pos_color">
                                                        <span class="edit flaticon-note32 "></span>
                                                    </span>

                                                    <span data-original-title="ذخیره " class="H_rename_header_save H_pos_color H_dis_none">
                                                       <i class="fa fa-save"></i>
                                                    </span>

                                                    <input  type="text" value="" class="form-control H_pos_hw H_input_rename_header H_dis_none" name="block_name_header" placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H1">
                                                    <!--------------------------------- هدر------------>
                                                    <div class="bhoechie-tab-content H1 active">
                                                        <center>
                                                            <? $header_title = get_tem_result($site, $la, "header_title", $tem, $coms_conect); ?>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="family">نام سایت</label>
                                                                <div class="form-group col-md-9">
                                                                    <div class="col-md-12 input-group">
                                                                        <input type="text" value="<?= $header_title['title'] ?>"
                                                                               class="form-control" name="site_name" style="direction: rtl;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="family">لینک لوگو</label>
                                                                <div class="form-group col-md-9">
                                                                    <div class="col-md-12 input-group">
                                                                        <input type="text" value="<?= $header_title['link'] ?>" class="form-control"
                                                                               name="header_link" style="direction: rtl;">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="family">لوگو </label>
                                                                <div class="form-group col-md-9">
                                                                    <div class="col-md-12 input-group">
                                                                        <div class="col-md-5 input-group">
                                                                            <input type="text"
                                                                                   id="header_pic_adress"
                                                                                   value="<?= $header_title["pic_adress"] ?>"
                                                                                   class="form-control"
                                                                                   placeholder=" تصویر"
                                                                                   name="header_pic_adress"
                                                                                   style="direction: ltr;">
                                                                            <span class="input-group-addon"
                                                                                  style="padding: 0px;"><a
                                                                                        href="/filemanager/dialog.php?type=2&amp;field_id=header_pic_adress"
                                                                                        class="btn btn-success iframe-btn"
                                                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                            <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                                  style="padding: 0px;">
                                                                                <div  id="header_pic_adress_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                        </div>
                                                                        <div class="ui-sortable red box" id="upload_type_header_pic_adress"
                                                                             style="float:right;">
                                                                        </div>
                                                                        <div class="col-md-1 input-group" id="image_show_header_pic_adress">
                                                                            <? $header_title = get_tem_result($site, $la, "header_title", $tem, $coms_conect);?>
                                                                            <a href="<?= $header_title["pic_adress"] ?>" class=" without-caption" >
                                                                                <img width="33" height="33" class="H_cursor_zoom" src="<?= $header_title["pic_adress"] ?>" alt="<?= $header_title["pic_adress"] ?>">
                                                                            </a>

                                                                        </div>

                                                                        <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $('#header_pic_adress_avatar_orak').orakuploader({
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

                                                                                $('#header_pic_adress_avatar_orak').html("<?=$pic_str?>");
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


                                    <!-----------------------------------------------------content--------------------------------------------->
                                    <div class="z-content " style="position: absolute;">
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H2">
                                                <div class="list-group">

                                                    <? $block1 = get_tem_result($site, $la, "block1", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_block1" href="#" class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $block1['text'] ?></span>
                                                        <span   data-original-title=" ویرایش " class="H_rename_block1 H_pos_color"><span class="edit flaticon-note32 "></span></span>

                                                        <span data-original-title="ذخیره " class="H_rename_block1_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>

                                                        <input type="text" value="" class="form-control H_pos_hw H_input_rename_block1 H_dis_none" name="block_name1" placeholder="نام جدید خود را وارد کنید">
                                                    </a>



                                                    <? $block2 = get_tem_result($site, $la, "block2", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_block2" href="#" class="list-group-item  text-center ">
                                                        <span class="temp"><?= $block2['text'] ?></span>
                                                    <span   data-original-title=" ویرایش " class="H_rename_block2 H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                                        <span data-original-title="ذخیره " class="H_rename_block2_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                                        <input type="text" value="" class="form-control H_pos_hw H_input_rename_block2 H_dis_none" name="block_name2" placeholder="نام جدید خود را وارد کنید">
                                                    </a>


                                                    <? $block3 = get_tem_result($site, $la, "block3", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_block3" href="#" class="list-group-item    text-center ">
                                                        <span class="temp"><?= $block3['text'] ?></span>
                                                        <span   data-original-title=" ویرایش " class="H_rename_block3 H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                                        <span data-original-title="ذخیره " class="H_rename_block3_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                                        <input type="text" value="" class="form-control H_pos_hw H_input_rename_block3 H_dis_none" name="block_name3" placeholder="نام جدید خود را وارد کنید">
                                                    </a>


                                                    <? $block4 = get_tem_result($site, $la, "block4", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_block4" href="#" class="list-group-item    text-center ">
                                                        <span class="temp"><?= $block4['text'] ?></span>
                                                        <span   data-original-title=" ویرایش " class="H_rename_block4 H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                                        <span data-original-title="ذخیره " class="H_rename_block4_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                                        <input type="text" value="" class="form-control H_pos_hw H_input_rename_block4 H_dis_none" name="block_name4" placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                    <? $block5 = get_tem_result($site, $la, "block5", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_block5" href="#" class="list-group-item    text-center ">
                                                    <span class="temp"><?= $block5['text'] ?></span>
                                                    <span   data-original-title=" ویرایش " class="H_rename_block5 H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                                        <span data-original-title="ذخیره " class="H_rename_block5_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                                        <input type="text" value="" class="form-control H_pos_hw H_input_rename_block5 H_dis_none" name="block_name5" placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H2">
                                                <!---------------------------بلوک اول ------------------>

                                                <div class="bhoechie-tab-content H2 active">
                                                    <center>
                                                        <? $box1_header = get_tem_result($site, $la, "box1_header", $tem, $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($box1_header['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="box1_header_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="box1_header_title"
                                                                           value="<?= $box1_header['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="box1_header_text"
                                                                           value="<?= $box1_header['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <?
                                                        $count1_first_choice_box1 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'first_choice_box1%' ", $coms_conect);
                                                        $count1_second_choice_box1 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'second_choice_box1%' ", $coms_conect);
                                                        $count1_third_choice_box1 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_box1%' ", $coms_conect);
                                                        ?>

                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_box1"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_box1"
                                                                    name="select_type_box1">

                                                                <option <?if ($count1_first_choice_box1 > 0) echo 'selected'; ?>  value='1'>انتخاب از ماژول</option>
                                                                <option <?if ($count1_second_choice_box1  > 0) echo 'selected'; ?>   value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                                <option <?if ($count1_third_choice_box1 > 0) echo 'selected'; ?>  value='3'>عنوان ولینک دستی به همراه عکس </option>
                                                            </select>

                                                        </div>

                                                        <script>

                                                            $(document).ready(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=box1_drbanihosseini_pregnancy&value=" + $("#select_type_box1").val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>',
                                                                    success: function (result) {
                                                                        $('#box1_drbanihosseini_pregnancy').html(result);
                                                                    }
                                                                });
                                                            });

                                                            $(".H_select_show_box1").change(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=box1_drbanihosseini_pregnancy&value=" + $(this).val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>',
                                                                    success: function (result) {
                                                                        $('#box1_drbanihosseini_pregnancy').html(result);
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <br>
                                                        <div id="box1_drbanihosseini_pregnancy"></div>

                                                    </center>
                                                </div>

                                                <!---------------------------------باکس دوم------------>
                                                <div class="bhoechie-tab-content H2">
                                                    <center>
                                                        <? $show_box2 = get_tem_result($site, $la, "show_box2", $tem, $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($show_box2['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="show_box2_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <h5  style="text-align: center;color: red; font-family: IRANSans">«انتخاب <span class="area" style="text-align: center;color: red; font-family: IRANSans">ویدیو</span> مورد نظر»</h5><br>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <?$second_choice_box2_drbanihosseini_pregnancy = get_tem_result($site, $la, "second_choice_box2_drbanihosseini_pregnancy", $tem, $coms_conect); ?>

                                                                            <div id="div_mother_second_choicedel_second_choice_box2_drbanihosseini_pregnancy" class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-12">
                                                                                        <div class=" H_second_choice_box2_drbanihosseini_pregnancy col-md-3 input-group">
                                                                                            <input type="hidden"
                                                                                                   id="second_choice_box2_drbanihosseini_pregnancy_subcat_val"
                                                                                                   name="second_choice_box2_drbanihosseini_pregnancy_subcat_val"
                                                                                                   value="<?= $second_choice_box2_drbanihosseini_pregnancy['pic'] ?>">
                                                                                            <input type="hidden"
                                                                                                   id="second_choice_box2_drbanihosseini_pregnancy_subcat_link"
                                                                                                   name="second_choice_box2_drbanihosseini_pregnancy_subcat_link"
                                                                                                   value="<?= $second_choice_box2_drbanihosseini_pregnancy['pic_adress'] ?>">

                                                                                            <select id="second_choice_box2_drbanihosseini_pregnancy_cat"
                                                                                                    data-selectid=""
                                                                                                    class="form-control H_second_choice_box2_drbanihosseini_pregnancy_cat"
                                                                                                    name="second_choice_box2_drbanihosseini_pregnancy_cat">
                                                                                                <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                echo "<option value='0'>انتخاب کنید</option>";
                                                                                                while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                    $str = '';

                                                                                                    if ($row0['id'] == $second_choice_box2_drbanihosseini_pregnancy['link'])

                                                                                                        $str = 'selected';
                                                                                                    echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div id="second_choice_box2_drbanihosseini_pregnancy"
                                                                                             class="col-md-3 input-group">
                                                                                        </div>

                                                                                        <div id="second_choice_box2_drbanihosseini_pregnancy_content"
                                                                                             class="col-md-6 input-group">
                                                                                        </div>

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=second_choice_box2_drbanihosseini_pregnancy&id=" + $("#second_choice_box2_drbanihosseini_pregnancy_cat").val() + "&value=" + $("#second_choice_box2_drbanihosseini_pregnancy_subcat_val").val() + "&field_nmae=" + '<?=$la?>',
                                                                                                    success: function (result) {
                                                                                                        $('#second_choice_box2_drbanihosseini_pregnancy').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                            $(document).ready(function () {
                                                                                                //   alert( $("#second_choice_box2_drbanihosseini_pregnancy_subcat_link").val());
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=second_choice_box2_drbanihosseini_pregnancy_content&id=" + $("#second_choice_box2_drbanihosseini_pregnancy_subcat_val").val() + "&value=" + $("#second_choice_box2_drbanihosseini_pregnancy_subcat_link").val() + "&secend_value=" + $("#second_choice_box2_drbanihosseini_pregnancy_subcat_link").val()+ "&field_nmae=" + '<?=$la?>',
                                                                                                    success: function (result) {
                                                                                                        $('#second_choice_box2_drbanihosseini_pregnancy_content').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <script>
                                                                                $(document).on('change', '.H_second_choice_box2_drbanihosseini_pregnancy_cat', function () {
                                                                                    var thisElement = $(this).parents('.H_second_choice_box2_drbanihosseini_pregnancy').next();

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=second_choice_box2_drbanihosseini_pregnancy&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                        success: function (result) {
                                                                                            thisElement.empty();
                                                                                            thisElement.append(result);
                                                                                        }
                                                                                    });
                                                                                });

                                                                                $(".second_choice_box2_drbanihosseini_pregnancy_neshane").change(function () {

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=second_choice_box2_drbanihosseini_pregnancy&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                        success: function (result) {
                                                                                            $('#second_choice_box2_drbanihosseini_pregnancy').html(result);
                                                                                        }
                                                                                    });
                                                                                });
                                                                                $(document).on('change', '.second_choice_box2_drbanihosseini_pregnancy_neshane', function () {

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=second_choice_box2_drbanihosseini_pregnancy_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                                        success: function (result) {
                                                                                            $('#second_choice_box2_drbanihosseini_pregnancy_content').html(result);
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
                                                        <hr>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">بک گراند </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="show_box2_pic"
                                                                               value="<?= $show_box2['pic'] ?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="show_box2_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=show_box2_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="show_box2_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_show_box2_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_show_box2_pic">
                                                                        <? $show_box2 = get_tem_result($site, $la, "show_box2", $tem, $coms_conect);?>
                                                                        <a href="<?= $show_box2["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $show_box2["pic"] ?>" alt="<?= $show_box2["pic"] ?>">
                                                                        </a>

                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#show_box2_pic_avatar_orak').orakuploader({
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

                                                                            $('#show_box2_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان مربوطه  </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="show_box2_title"
                                                                           value="<?= $show_box2['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:3»</h5><br>
                                                        <?
                                                        $count1_first_choice_box2_2 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'first_choice_box2_2%' ", $coms_conect);
                                                        $count1_second_choice_box2_2 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'second_choice_box2_2%' ", $coms_conect);
                                                        $count1_third_choice_box2_2 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_box2_2%' ", $coms_conect);
                                                        ?>

                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_box2_2"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_box2_2"
                                                                    name="select_type_box2_2">

                                                                <option <?if ($count1_first_choice_box2_2 > 0) echo 'selected'; ?>  value='1'>انتخاب از ماژول</option>
                                                                <option <?if ($count1_second_choice_box2_2 > 0) echo 'selected'; ?>   value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                                <option <?if ($count1_third_choice_box2_2 > 0) echo 'selected'; ?>  value='3'>عنوان ولینک دستی به همراه عکس </option>
                                                            </select>

                                                        </div>


                                                        <script>

                                                            $(document).ready(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=show_content_box2_2&value=" + $("#select_type_box2_2").val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>',
                                                                    success: function (result) {
                                                                        $('#show_content_box2_2').html(result);
                                                                    }
                                                                });
                                                            });

                                                            $(".H_select_show_box2_2").change(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=show_content_box2_2&value=" + $(this).val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>',
                                                                    success: function (result) {
                                                                        $('#show_content_box2_2').html(result);
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <br>
                                                        <div id="show_content_box2_2"></div>

                                                    </center>
                                                </div>


                                                <!-----------------------------------------باکس سوم ---------------------------------------------------->
                                                <div class="bhoechie-tab-content H2">
                                                    <center>
                                                        <? $box3_header = get_tem_result($site, $la, "box3_header", $tem, $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($box3_header['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="box3_header_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان  </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="box3_header_title"
                                                                           value="<?= $box3_header['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله مورد نظر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="box3_header_text"
                                                                           value="<?= $box3_header['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>

                                                <!-----------------------------------------باکس چهارم ---------------------------------------------------->
                                                <div class="bhoechie-tab-content H2">
                                                    <center>
                                                        <? $box4_header = get_tem_result($site, $la, "box4_header", $tem, $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($box4_header['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="box4_header_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دکمه اول </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="box4_header_title"
                                                                           value="<?= $box4_header['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دکمه دوم </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="box4_header_pic"
                                                                           value="<?= $box4_header['pic'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز:2»</h5><br>
                                                        <?
                                                        $count1_first_choice_box4 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'first_choice_box4%' ", $coms_conect);
                                                        $count1_second_choice_box4 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'second_choice_box4%' ", $coms_conect);
                                                        $count1_third_choice_box4 = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_box4%' ", $coms_conect);
                                                        ?>

                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_box4"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_box4"
                                                                    name="select_type_box4">

                                                                <option <?if ($count1_first_choice_box4 > 0) echo 'selected'; ?>  value='1'>انتخاب از ماژول</option>
                                                                <option <?if ($count1_second_choice_box4  > 0) echo 'selected'; ?>   value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                                <option <?if ($count1_third_choice_box4 > 0) echo 'selected'; ?>  value='3'>عنوان ولینک دستی به همراه عکس </option>
                                                            </select>

                                                        </div>

                                                        <script>

                                                            $(document).ready(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=show_content_box4&value=" + $("#select_type_box4").val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>',
                                                                    success: function (result) {
                                                                        $('#show_content_box4').html(result);
                                                                    }
                                                                });
                                                            });

                                                            $(".H_select_show_box4").change(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=show_content_box4&value=" + $(this).val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>',
                                                                    success: function (result) {
                                                                        $('#show_content_box4').html(result);
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <br>
                                                        <div id="show_content_box4"></div>

                                                    </center>
                                                </div>
                                                <!-----------------------------------------باکس پنجم ---------------------------------------------------->
                                                <div class="bhoechie-tab-content H2">
                                                    <center>
                                                        <? $box5_drbanihosseini_pregnancy_header = get_tem_result($site, $la, "box5_drbanihosseini_pregnancy_header", $tem, $coms_conect); ?>

                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($box5_drbanihosseini_pregnancy_header['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="box5_drbanihosseini_pregnancy_header_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="box5_drbanihosseini_pregnancy_header_title"
                                                                           value="<?= $box5_drbanihosseini_pregnancy_header['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله زیر عنوان</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="box5_drbanihosseini_pregnancy_header_text"
                                                                           value="<?= $box5_drbanihosseini_pregnancy_header['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">«تعداد مورد نیاز: 3  »</h5><br>
                                                        <?
                                                        $count1_first_choice_box5_drbanihosseini_pregnancy = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'first_choice_box5_drbanihosseini_pregnancy%' ", $coms_conect);
                                                        $count1_second_choice_box5_drbanihosseini_pregnancy = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'second_choice_box5_drbanihosseini_pregnancy%' ", $coms_conect);
                                                        $count1_third_choice_box5_drbanihosseini_pregnancy = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_box5_drbanihosseini_pregnancy%' ", $coms_conect);
                                                        ?>

                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_box5_drbanihosseini_pregnancy"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_box5_drbanihosseini_pregnancy"
                                                                    name="select_type_box5_drbanihosseini_pregnancy">

                                                                <option <?if ($count1_first_choice_box5_drbanihosseini_pregnancy > 0) echo 'selected'; ?>  value='1'>انتخاب از ماژول</option>
                                                                <option <?if ($count1_second_choice_box5_drbanihosseini_pregnancy  > 0) echo 'selected'; ?>   value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                                <option <?if ($count1_third_choice_box5_drbanihosseini_pregnancy > 0) echo 'selected'; ?>  value='3'>عنوان ولینک دستی به همراه عکس </option>
                                                            </select>

                                                        </div>

                                                        <script>

                                                            $(document).ready(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=show_content_box5_drbanihosseini_pregnancy&value=" + $("#select_type_box5_drbanihosseini_pregnancy").val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>',
                                                                    success: function (result) {
                                                                        $('#show_content_box5_drbanihosseini_pregnancy').html(result);
                                                                    }
                                                                });
                                                            });

                                                            $(".H_select_show_box5_drbanihosseini_pregnancy").change(function () {
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=show_content_box5_drbanihosseini_pregnancy&value=" + $(this).val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>',
                                                                    success: function (result) {
                                                                        $('#show_content_box5_drbanihosseini_pregnancy').html(result);
                                                                    }
                                                                });
                                                            });
                                                        </script>
                                                        <br>
                                                        <div id="show_content_box5_drbanihosseini_pregnancy"></div>

                                                    </center>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-----------------------------------------------------footer---------------------------------------------->
                                    <div class="z-content " style="position: absolute;" >
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H3">
                                                <div class="list-group">
                                                    <? $block_footer = get_tem_result($site, $la, "block_footer", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_footer" href="#" class="list-group-item   active text-center ">
                                                        <span class="temp"><?= $block_footer['text'] ?></span>
                                                        <span   data-original-title=" ویرایش " class="H_rename_footer H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                                        <span data-original-title="ذخیره " class="H_rename_footer_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                                    <input type="text" value="" class="form-control H_pos_hw H_input_rename_footer H_dis_none" name="block_name_footer" placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $block_email = get_tem_result($site, $la, "block_email", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_email" href="#" class="list-group-item   text-center ">
                                                        <span class="temp"><?= $block_email['text'] ?></span>
                                                    <span   data-original-title=" ویرایش " class="H_rename_email H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                                        <span data-original-title="ذخیره " class="H_rename_email_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                                        <input type="text" value="" class="form-control H_pos_hw H_input_rename_email H_dis_none" name="block_name_email" placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                    <? $block_call = get_tem_result($site, $la, "block_call", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_call" href="#" class="list-group-item  text-center ">
                                                        <span class="temp"><?= $block_call['text'] ?></span>
                                                    <span   data-original-title=" ویرایش " class="H_rename_call H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                                        <span data-original-title="ذخیره " class="H_rename_call_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                                        <input type="text" value="" class="form-control H_pos_hw H_input_rename_call H_dis_none" name="block_name_call" placeholder="نام جدید خود را وارد کنید">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H3">
                                                <!-----------------------------------------------------footer---------------------------------------------->
                                                <div class="bhoechie-tab-content H3 active">
                                                    <center>
                                                        <? $footer_column1 = get_tem_result($site, $la, "footer_column1", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">متن زیر لوگو</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $footer_column1['text'] ?>"
                                                                           class="form-control"
                                                                           name="footer_column1_text"
                                                                           style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله زیر لوگو</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $footer_column1['title'] ?>"
                                                                           class="form-control"
                                                                           name="footer_column1_title"
                                                                           style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ستون دوم</label>
                                                        </div>
                                                        <div id="download_link_two" class="tab-pane">
                                                            <div class="page-content-area" id="more7">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $two_column_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'two_column_footer_links%' ", $coms_conect);

                                                                            for ($k = 1; $k <= $two_column_links; $k++) {
                                                                                $two_column_footer_links = get_tem_result($site, $la, "two_column_footer_links$k", $tem, $coms_conect);
                                                                                if ($two_column_footer_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_two_column_footer_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_two_column_footer_links"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">عنوان
                                                                                                و لینک و عکس<?= $k ?></label>
                                                                                            <div class="form-group col-md-9">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="two_column_footer_links-title-ads<?= $k ?>"
                                                                                                           value="<?= $two_column_footer_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="two_column_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="two_column_footer_links-link-ads<?= $k ?>"
                                                                                                           value="<?= $two_column_footer_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="two_column_links_link<?= $k ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_two_column_footer_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="two_column_links_count"
                                                                                   name="two_column_links_count"
                                                                                   value="<?= --$count_two_column_footer_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_two_column_footer-ads1').on("click", function () {
                                                                                        var someText = '<div id="ads_two_column_footer_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_two_column_footer_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک و تصویر#' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="two_column_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="two_column_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="two_column_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="two_column_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_two_column_footer_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#two_column_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_two_column_footer_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#two_column_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_two_column_footer_links' + id).remove();
                                                                                        $('#two_column_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_two_column_footer-ads1"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div id="show_content_footer_C2_drbanihosseini"></div>
                                                        <hr>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ستون سوم </label>
                                                        </div>
                                                        <div id="download_link_three" class="tab-pane">
                                                            <div class="page-content-area" id="more7">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $three_column_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'three_column_footer_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $three_column_links; $k++) {
                                                                                $three_column_footer_links = get_tem_result($site, $la, "three_column_footer_links$k", $tem, $coms_conect);
                                                                                if ($three_column_footer_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_three_column_footer_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_three_column_footer_links"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">عنوان
                                                                                                و لینک و عکس<?= $k ?></label>
                                                                                            <div class="form-group col-md-9">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="three_column_footer_links-title-ads<?= $k ?>"
                                                                                                           value="<?= $three_column_footer_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="three_column_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="three_column_footer_links-link-ads<?= $k ?>"
                                                                                                           value="<?= $three_column_footer_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="three_column_links_link<?= $k ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_three_column_footer_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="three_column_links_count"
                                                                                   name="three_column_links_count"
                                                                                   value="<?= --$count_three_column_footer_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_three_column_footer-ads1').on("click", function () {
                                                                                        var someText = '<div id="ads_three_column_footer_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_three_column_footer_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک و تصویر#' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="three_column_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="three_column_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="three_column_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="three_column_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_three_column_footer_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#three_column_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_three_column_footer_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#three_column_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_three_column_footer_links' + id).remove();
                                                                                        $('#three_column_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_three_column_footer-ads1"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">ستون چهارم </label>
                                                        </div>
                                                        <h3 style="text-align: center; font-family: IRANSans">« شبکه های اجتماعی »</h3><br>
                                                        <div id="footer_social_networks10" class="tab-pane">
                                                            <div class="page-content-area" id="more7">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $footer_social_networks = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'footer_social%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $footer_social_networks; $k++) {
                                                                                $footer_social = get_tem_result($site, $la, "footer_social$k", $tem, $coms_conect);
                                                                                if ($footer_social['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_footer_social<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_footer_social"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">عنوان
                                                                                                و لینک و عکس<?= $k ?></label>
                                                                                            <div class="form-group col-md-9">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="footer_social-title-ads<?= $k ?>"
                                                                                                           value="<?= $footer_social["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="footer_social_networks_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="footer_social-link-ads<?= $k ?>"
                                                                                                           value="<?= $footer_social["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="footer_social_networks_link<?= $k ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_footer_social = $k;
                                                                            ?>
                                                                            <input type="hidden" id="footer_social_networks_count"
                                                                                   name="footer_social_networks_count"
                                                                                   value="<?= --$count_footer_social ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_footer_social').on("click", function () {
                                                                                        var someText = '<div id="ads_footer_social' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_footer_social" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک و تصویر#' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="footer_social_networks_title' + i + '" value="" class="form-control" placeholder="عنوان" name="footer_social_networks_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="footer_social_networks_link' + i + '" value="" class="form-control" placeholder="لینک" name="footer_social_networks_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_footer_social' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#footer_social_networks_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_footer_social', function () {
                                                                                        var id = '';
                                                                                        var p = $('#footer_social_networks_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_footer_social' + id).remove();
                                                                                        $('#footer_social_networks_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_footer_social"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">لینک های نوار زیر فوتر</label>
                                                        </div>
                                                        <div id="download_link_three" class="tab-pane">
                                                            <div class="page-content-area" id="more7">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $count_Strip_link = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'Strip_link%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $count_Strip_link; $k++) {
                                                                                $Strip_link = get_tem_result($site, $la, "Strip_link$k", $tem, $coms_conect);
                                                                                if ($Strip_link['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_Strip_link<?=$k?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_Strip_link"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger "
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">عنوان
                                                                                                و لینک <?= $k ?></label>
                                                                                            <div class="form-group col-md-9">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="Strip_link_title<?= $k ?>"
                                                                                                           value="<?= $Strip_link["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="Strip_link_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="Strip_link_link<?= $k ?>"
                                                                                                           value="<?= $Strip_link["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="Strip_link_link<?= $k ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_Strip_link1 = $k;
                                                                            ?>
                                                                            <input type="hidden" id="Strip_link_count"
                                                                                   name="Strip_link_count"
                                                                                   value="<?= --$count_Strip_link1?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_Strip_link').on("click", function () {
                                                                                        var someText = '<div id="ads_Strip_link' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_Strip_link" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک #' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="Strip_link_title' + i + '" value="" class="form-control" placeholder="عنوان" name="Strip_link_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="Strip_link_link' + i + '" value="" class="form-control" placeholder="لینک" name="Strip_link_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_Strip_link' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#Strip_link_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_Strip_link', function () {
                                                                                        var id = '';
                                                                                        var p = $('#Strip_link_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_Strip_link' + id).remove();
                                                                                        $('#Strip_link_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_Strip_link"><i
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
                                                <!-------------------------------------------------------- درج ایمیل ------------------------------------------------------>
                                                <div class="bhoechie-tab-content H3">
                                                    <center>
                                                        <? $email = get_tem_result($site, $la, "email", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">لینک ایمیل</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $email['link'] ?>" class="form-control"
                                                                           name="email_link" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوانی برای عکس</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $email['title'] ?>" class="form-control"
                                                                           name="email_title" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="email_pic"
                                                                               value="<?= $email['pic'] ?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="email_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=email_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="email_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_email_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_email_pic">
                                                                        <? $email = get_tem_result($site, $la, "email", $tem, $coms_conect);?>
                                                                        <a href="<?= $email["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $email["pic"] ?>" alt="<?= $email["pic"] ?>">
                                                                        </a>

                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#email_pic_avatar_orak').orakuploader({
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

                                                                            $('#email_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </center>
                                                </div>
                                                <!-------------------------------------------------------- درج شماره تماس ------------------------------------------------------>
                                                <div class="bhoechie-tab-content H3">
                                                    <center>

                                                        <div id="download_link" class="tab-pane">
                                                            <div class="page-content-area" id="more7">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $contact_us_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'contact_links%' ", $coms_conect);

                                                                            for ($k = 1; $k <= $contact_us_links; $k++) {
                                                                                $contact_links = get_tem_result($site, $la, "contact_links$k", $tem, $coms_conect);
                                                                                if ($contact_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_contact_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">نام و تلفن<?= $k ?></label>
                                                                                            <div class="form-group col-md-9">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="contact_links-title-ads<?= $k ?>"
                                                                                                           value="<?= $contact_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="نام"
                                                                                                           name="contact_us_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="contact_links-link-ads<?= $k ?>"
                                                                                                           value="<?= $contact_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="تلفن"
                                                                                                           name="contact_us_links_link<?= $k ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_contact_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="contact_us_links_count"
                                                                                   name="contact_us_links_count"
                                                                                   value="<?= --$count_contact_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_slidshow-ads1').on("click", function () {
                                                                                        var someText = '<div id="ads_contact_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">نام و شماره تلفن#' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="contact_us_links_title' + i + '" value="" class="form-control" placeholder="نام" name="contact_us_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="contact_us_links_link' + i + '" value="" class="form-control" placeholder="تلفن" name="contact_us_links_link' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_contact_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#contact_us_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads', function () {
                                                                                        var id = '';
                                                                                        var p = $('#contact_us_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_contact_links' + id).remove();
                                                                                        $('#contact_us_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_slidshow-ads1"><i
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
                                            </div>

                                        </div>
                                    </div>
                                    <!-----------------------------------------------------تب---------------------------------------------->
                                    <div class="z-content " style="position: absolute;" >
                                        <div class="z-content-inner">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H4">
                                                <div class="list-group">
                                                    <? $setting_tab_name = get_tem_result($site, $la, "setting_tab_name", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_setting_tab_name" href="#" class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $setting_tab_name['text'] ?></span>
                                                      </a>
                                                    <?
                                                    $count1_tab_name = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'tab_name%' ", $coms_conect);
                                                    for ($x = 1; $x <= $count1_tab_name; $x++) {
                                                        $tabs = get_tem_result($site, $la, "tab_name$x", $tem, $coms_conect);
                                                        if ($tabs['text']>""){
                                                        ?>
                                                            <a id="H_input_rename_tab<?=$x?>" href="#" class="list-group-item  text-center ">
                                                                <span class="temp"><?= $tabs['text'] ?></span>
                                                               </a>
                                                    <?}}?>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H4">

                                                <div class="bhoechie-tab-content H4 active">

                                                        <label class="col-md-12 control-label" for="family">انتخاب نام تب ها (6 مورد)</label>
                                                        <br>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_tab_name = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'tab_name%' ", $coms_conect);

                                                                            for ($x = 1; $x <= $count1_tab_name; $x++) {
                                                                                $tab_name = get_tem_result($site, $la, "tab_name$x", $tem, $coms_conect);
                                                                                if ($tab_name['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_tab_name<?= $x ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_tab_name"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title="" data-original-title="حذف"></i>

                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="tab_name_text<?= $x ?>"
                                                                                                           value="<?= $tab_name["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="tab_name_text<?= $x ?>">
                                                                                                </div>


                                                                                                <div class="col-md-5 input-group">
                                                                                                    <input type="text"
                                                                                                           id="tab_name_pic<?= $x ?>"
                                                                                                           value="<?= $tab_name["pic_adress"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder=" تصویر"
                                                                                                           name="tab_name_pic<?= $x ?>"
                                                                                                           style="direction: ltr;">
                                                                                                    <span class="input-group-addon"
                                                                                                          style="padding: 0px;"><a
                                                                                                                href="/filemanager/dialog.php?type=2&amp;field_id=tab_name_pic<?= $x ?>"
                                                                                                                class="btn btn-success iframe-btn"
                                                                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                    class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                    <span class="input-group-addon H_neshane1 H_tab_name<?= $x ?>"
                                                                                                          style="padding: 0px;">
                                                                                <div  id="tab_name_avatar7<?= $x ?>" orakuploader="on"></div>
                                                                            <input type="hidden" id="tab_name_avatar7_link<?= $x ?>" name="tab_name_avatar7_link<?= $x ?>" value="<? ?>">
                                                        </span>
                                                                                                </div>
                                                                                                <div class="ui-sortable red box" id="upload_type_tab_name<?= $x ?>"
                                                                                                     style="float:right;">
                                                                                                </div>
                                                                                                <div class=" col-md-1 input-group" id="image_show_tab_name<?= $x ?>">
                                                                                                    <? $tab_name = get_tem_result($site, $la, "tab_name$x", $tem, $coms_conect);?>
                                                                                                    <a href="<?= $tab_name["pic_adress"] ?>" class=" without-caption" >
                                                                                                        <img width="33" height="33" class="H_cursor_zoom" src="<?= $tab_name["pic_adress"] ?>" alt="<?= $tab_name["text"] ?>">
                                                                                                    </a>

                                                                                                </div>

                                                                                                <script type="text/javascript">
                                                                                                    $(document).ready(function () {
                                                                                                        $('#tab_name_avatar7<?=$x?>').orakuploader({
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

                                                                                                        $('#tab_name_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                            <input type="hidden" id="tab_name_count"
                                                                                   name="tab_name_count"
                                                                                   value="<?=--$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_tab_name-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_tab_name' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_tab_name" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="tab_name_text' + i + '" value="" class="form-control" placeholder="عنوان" name="tab_name_text' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="tab_name_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="tab_name_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=tab_name_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_tab_name' + i + '" style="padding: 0px;"><div  id="tab_name_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="tab_name_avatar7_link' + i + '" name="tab_name_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_tab_name' + i + '" style="float:right;"></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_tab_name' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#tab_name_count').val(i);

                                                                                        //--------orakuploader
                                                                                        $('#tab_name_avatar7' + i + '').orakuploader({
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

                                                                                        $('#tab_name_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                        $('.input-group-addon.H_tab_name' + i + '').find("div").first().next().css('width','100px');
                                                                                        $('.input-group-addon.H_tab_name' + i + '').find("div").first().next().find("div").first().css('float','right');
                                                                                        //    ---end orakuploader
                                                                                        i++; });
                                                                                    $(document).on('click', '.del_tab_name', function () {
                                                                                        var id = '';
                                                                                        var k = $('#tab_name_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_tab_name' + id).remove();
                                                                                        $('#tab_name_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_tab_name-ads"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <!-- tab-->
                                                <?for ($y = 1; $y <= $count1_tab_name; $y++) {?>
                                                <div class="bhoechie-tab-content H4 ">

                                                    <label class="col-md-12 control-label" for="family">تب<?=$y?></label>
                                                    <br>

                                                    <? $ValSelectActive = get_tem_result($site, $la, "ValSelectActive$y", $tem, $coms_conect); ?>
                                                    <div class="col-md-6 input-group " style="float: none;">
                                                        <select id="select_type_box_tab<?=$y?>"
                                                                data-selectid=""
                                                                class="form-control H_select_show_box_tab<?=$y?>"
                                                                name="select_type_box_tab<?=$y?>">

                                                            <option  <?if ($ValSelectActive["title"]==1){echo 'selected';}?>  value='1'>انتخاب از ماژول</option>
                                                            <option   <?if ($ValSelectActive["title"]==2){echo 'selected';}?> value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                            <option <?if ($ValSelectActive["title"]==3){echo 'selected';}?> value='3'>تب اختصاصی</option>
                                                        </select>

                                                    </div>
                                                    <br>
                                                    <div>
                                                        <input name="ValSelectActive_title<?=$y?>" type="hidden" value="<?= $ValSelectActive["title"] ?>">

                                                        <div  class="tab-pane opt<?=$y?> tab<?=$y?>_option1">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $first_choice_box_tab = get_tem_result($site, $la, "first_choice_box_tab$y", $tem, $coms_conect);?>
                                                                            <div id="div_mother_first_choicedel_first_choice_box_tab<?=$y?>" class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="form-group col-md-12">

                                                                                        <div class=" H_first_choice_box_tab<?=$y?> col-md-4 input-group">
                                                                                            <input type="hidden"
                                                                                                   id="first_choice_box_subcat_val_tab<?=$y?>"
                                                                                                   name="first_choice_box_subcat_val_tab<?=$y?>"
                                                                                                   value="<?= $first_choice_box_tab['pic'] ?>">

                                                                                            <select id="first_choice_box_cat_tab<?=$y?>"
                                                                                                    data-selectid="1"
                                                                                                    class="form-control H_first_choice_box_cat_tab<?=$y?>"
                                                                                                    name="first_choice_box_cat_tab<?=$y?>">
                                                                                                <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                $result1 = $coms_conect->query($sql1);
                                                                                                echo "<option value='0'>انتخاب کنید</option>";
                                                                                                while ($row = $result1->fetch_assoc()) {
                                                                                                    $str = '';
                                                                                                    if ($row['id'] == $first_choice_box_tab['link'])

                                                                                                        $str = 'selected';
                                                                                                    echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div id="first_choice_box_tab<?=$y?>" class="col-md-4 input-group">

                                                                                        </div>

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=first_choice_box_tab&id=" + $("#first_choice_box_cat_tab<?=$y?>").val() + "&value=" + $("#first_choice_box_subcat_val_tab<?=$y?>").val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$y?>' ,
                                                                                                    success: function (result) {
                                                                                                        $('#first_choice_box_tab<?=$y?>').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                        </script>
                                                                                        <div class="col-md-3 input-group">
                                                                                            <select id="first_choice_box_Fixed_selection_cat_tab<?=$y?>"
                                                                                                    data-selectid="1"
                                                                                                    class="form-control modules_class"
                                                                                                    name="first_choice_box_Fixed_selection_cat_tab<?=$y?>">
                                                                                                <option <?
                                                                                                if ($first_choice_box_tab['text'] == 0) echo 'selected'; ?>
                                                                                                        value='0'>جدیدترین ها
                                                                                                </option>
                                                                                                <option <?
                                                                                                if ($first_choice_box_tab['text'] == 1) echo 'selected'; ?>
                                                                                                        value='1'>پربازدیدترین ها
                                                                                                </option>
                                                                                                <option <?
                                                                                                if ($first_choice_box_tab['text'] == 2) echo 'selected'; ?>
                                                                                                        value='2'>پربحث ترین ها
                                                                                                </option>
                                                                                            </select>

                                                                                        </div>
                                                                                        <div class="col-md-1 input-group">
                                                                                            <input type="hidden"
                                                                                                   id="first_choice_box_number_tab<?=$y?>"
                                                                                                   value="1"
                                                                                                   class="form-control H_cursor_no-drup"
                                                                                                   placeholder="تعداد"
                                                                                                   name="first_choice_box_number_tab<?=$y?>">
                                                                                        </div>


                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <script>
                                                                                $(document).on('change', '.H_first_choice_box_cat_tab<?=$y?>', function () {
                                                                                    var thisElement = $(this).parents('.H_first_choice_box_tab<?=$y?>').next();
                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=first_choice_box_tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid')+ "&secend_value=" + '<?=$y?>',
                                                                                        success: function (result) {
                                                                                            //$('#first_choice_box_tab<?=$y?>//').html(result);
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

                                                        <div class="tab-pane opt<?=$y?> tab<?=$y?>_option2">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $second_choice_box_tab = get_tem_result($site, $la, "second_choice_box_tab$y", $tem, $coms_conect);
                                                                            ?>

                                                                            <div id="div_mother_second_choicedel_second_choice_box_tab<?=$y?>" class="seyed"
                                                                                 style="opacity: 1;">
                                                                                <div class="form-group">

                                                                                    <div class="form-group col-md-12">

                                                                                        <div class=" H_second_choice_box_tab<?=$y?> col-md-3 input-group">
                                                                                            <input type="hidden"
                                                                                                   id="second_choice_box_subcat_val_tab<?=$y?>"
                                                                                                   name="second_choice_box_subcat_val_tab<?=$y?>"
                                                                                                   value="<?= $second_choice_box_tab['pic'] ?>">
                                                                                            <input type="hidden"
                                                                                                   id="second_choice_box_subcat_link_tab<?=$y?>"
                                                                                                   name="second_choice_box_subcat_link_tab<?=$y?>"
                                                                                                   value="<?= $second_choice_box_tab['pic_adress'] ?>">

                                                                                            <select id="second_choice_box_cat_tab<?=$y?>"
                                                                                                    data-selectid="1"
                                                                                                    class="form-control H_second_choice_box_cat_tab<?=$y?>"
                                                                                                    name="second_choice_box_cat_tab<?=$y?>">
                                                                                                <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                echo "<option value='0'>انتخاب کنید</option>";
                                                                                                while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                    $str = '';

                                                                                                    if ($row0['id'] == $second_choice_box_tab['link'])

                                                                                                        $str = 'selected';
                                                                                                    echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>

                                                                                        <div id="second_choice_box_tab<?=$y?>"
                                                                                             class="col-md-3 input-group">
                                                                                        </div>

                                                                                        <div id="second_choice_box_content_tab<?=$y?>"
                                                                                             class="col-md-6 input-group">
                                                                                        </div>

                                                                                        <script>
                                                                                            $(document).ready(function () {
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=second_choice_box_tab&id=" + $("#second_choice_box_cat_tab<?=$y?>").val() + "&value=" + $("#second_choice_box_subcat_val_tab<?=$y?>").val() + "&field_nmae=" + '<?=$la?>' +"&secend_value=" + '<?=$y?>' ,
                                                                                                    success: function (result) {
                                                                                                        $('#second_choice_box_tab<?=$y?>').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                            $(document).ready(function () {
                                                                                                //   alert( $("#second_choice_box_subcat_link_tab<?=$y?>").val());
                                                                                                $.ajax({
                                                                                                    type: 'POST',
                                                                                                    url: 'New_ajax.php',
                                                                                                    data: "action=second_choice_box_content_tab&id=" + $("#second_choice_box_subcat_val_tab<?=$y?>").val() + "&value=" + $("#second_choice_box_subcat_link_tab<?=$y?>").val() + "&secend_value=" + $("#second_choice_box_subcat_link_tab<?=$y?>").val() + "&field_nmae=" + '<?=$la?>'  +"&user_id=" + '<?=$y?>',
                                                                                                    success: function (result) {
                                                                                                        $('#second_choice_box_content_tab<?=$y?>').html(result);
                                                                                                    }
                                                                                                });
                                                                                            });
                                                                                        </script>

                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <script>

                                                                                $(document).on('change', '.H_second_choice_box_cat_tab<?=$y?>', function () {
                                                                                    var thisElement = $(this).parents('.H_second_choice_box_tab<?=$y?>').next();

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=second_choice_box_tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid') +"&secend_value=" + '<?=$y?>',
                                                                                        success: function (result) {
                                                                                            //$('#second_choice_box_tab<?=$y?>//').html(result);
                                                                                            thisElement.empty();
                                                                                            thisElement.append(result);
                                                                                        }
                                                                                    });
                                                                                });

                                                                                $(".second_choice_box_neshane_tab<?=$y?>").change(function () {

                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=second_choice_box_tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' +"&secend_value=" + '<?=$y?>' ,
                                                                                        success: function (result) {
                                                                                            $('#second_choice_box_tab<?=$y?>').html(result);
                                                                                        }
                                                                                    });
                                                                                });
                                                                                $(document).on('change', '.second_choice_box_neshane_tab<?=$y?>', function () {

                                                                                    //  $(".second_choice_box_neshane_tab<?=$y?>").change(function () {
                                                                                    $.ajax({
                                                                                        type: 'POST',
                                                                                        url: 'New_ajax.php',
                                                                                        data: "action=second_choice_box_content_tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>'  +"&user_id=" + '<?=$y?>',
                                                                                        success: function (result) {
                                                                                            $('#second_choice_box_content_tab<?=$y?>').html(result);
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
                                                        
                                                        <div class="opt<?=$y?> tab<?=$y?>_option3">
                                                            <!--form1-->
                                                            <div class=" panel panel-default H_mb0 ">
                                                                <?
                                                                $third_choice_box_form1_tab = get_tem_result($site, $la, "third_choice_box_form1_tab$y", $tem, $coms_conect);
                                                                ?>
                                                                <div class="panel-heading container-fluid H_p0">
                                                                    <div class="panel-title H col-md-12" style="display: inline-block">
                                                                        <div class="col-md-7 col-sm-12 col-xs-12 H_right">

                                                                            <input value="1"
                                                                                   type="checkbox" <? if ($third_choice_box_form1_tab['link'] == 1) echo 'checked' ?>
                                                                                   class="ace ace-switch ace-switch-6 "
                                                                                   name="third_choice_box_form1_link_tab<?=$y?>"
                                                                                   style="direction: rtl;"><span class="lbl H_mb7"></span>


                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#question-tab<?=$y?>-1" class="collapsed">
                                                                                <span class="question" style="max-width: 500px;display: inline-block;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-wrap: break-word;margin-top: 15px;">حالت اول <b class="arrow fa fa-angle-down"></b></span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-5 col-sm-12 col-xs-12 pull-left" style="float:left;position: relative;padding-left: 0px;font-size: 12px; text-align:left; margin-top: 4px">
                                                                            <a href="new_template/drbanihosseini_pregnancy/img/form1.jpg" class=" without-caption" >
                                                                                <img width="40" height="40" class="H_cursor_zoom" src="new_template/drbanihosseini_pregnancy/img/form1.jpg" alt="form1">
                                                                            </a>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div id="question-tab<?=$y?>-1" class="panel-collapse collapse" style="height: 0px;">
                                                                    <div class="panel-body">

                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label" for="family">متن اول </label>
                                                                            <div class="form-group col-md-9">
                                                                                <div class="col-md-12 input-group">

                                                                                        <textarea type="text" class="form-control" id="third_choice_box_form1_text_tab<?=$y?>" name="third_choice_box_form1_text_tab<?=$y?>">
                                                                                            <?= $third_choice_box_form1_tab["text"] ?>
                                                                                        </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <? for ($i=1;$i<=2;$i++){
                                                                            $third_choice_box_form1_tab_btn = get_tem_result($site, $la, "third_choice_box_form1_tab_btn$i$y", $tem, $coms_conect);
                                                                            ?>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label" for="family">دکمه <?=$i?> </label>
                                                                                <div class="form-group col-md-9">
                                                                                    <div class="col-md-12 input-group">
                                                                                        <input type="text" class="form-control" name="third_choice_box_form1_btn_title_tab<?=$i?><?=$y?>"
                                                                                               value="<?= $third_choice_box_form1_tab_btn['title'] ?>" style="direction: rtl;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-md-3 control-label" for="family">لینک دکمه <?=$i?> </label>
                                                                                <div class="form-group col-md-9">
                                                                                    <div class="col-md-12 input-group">
                                                                                        <input type="text" class="form-control" name="third_choice_box_form1_btn_link_tab<?=$i?><?=$y?>"
                                                                                               value="<?= $third_choice_box_form1_tab_btn['link'] ?>" style="direction: rtl;">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?}?>
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label" for="family">جمله(256 کاراکتر) </label>
                                                                            <div class="form-group col-md-9">
                                                                                <div class="col-md-12 input-group">
                                                                                        <textarea type="text" class="form-control" id="third_choice_box_form1_title_tab<?=$y?>" name="third_choice_box_form1_title_tab<?=$y?>">
                                                                                            <?= $third_choice_box_form1_tab["title"] ?>
                                                                                        </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label" for="family">بک گراند </label>
                                                                            <div class="form-group col-md-9">
                                                                                <div class="col-md-12 input-group">
                                                                                    <div class="col-md-5 input-group">
                                                                                        <input type="text"
                                                                                               id="third_choice_box_form1_pic_tab<?=$y?>"
                                                                                               value="<?= $third_choice_box_form1_tab['pic'] ?>"
                                                                                               class="form-control"
                                                                                               placeholder=" تصویر"
                                                                                               name="third_choice_box_form1_pic_tab<?=$y?>"
                                                                                               style="direction: ltr;">
                                                                                        <span class="input-group-addon"
                                                                                              style="padding: 0px;"><a
                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_box_form1_pic_tab<?=$y?>"
                                                                                                    class="btn btn-success iframe-btn"
                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                                                                            <span class="addimg flaticon-add139"></span></a>
                                                                                                                                    </span>
                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                                              style="padding: 0px;">
                                                                                                                                        <div  id="third_choice_box_form1_pic_avatar_orak_tab<?=$y?>" orakuploader="on"></div>
                                                                                                                                    </span>
                                                                                    </div>
                                                                                    <div class="ui-sortable red box" id="upload_type_third_choice_box_form1_pic_tab<?=$y?>"
                                                                                         style="float:right;">
                                                                                    </div>
                                                                                    <div class="col-md-1 input-group" id="image_show_third_choice_box_form1_pic_tab<?=$y?>">
                                                                                        <? $third_choice_box_form1_tab = get_tem_result($site, $la, "third_choice_box_form1_tab$y", $tem, $coms_conect);?>
                                                                                        <a href="<?= $third_choice_box_form1_tab["pic"] ?>" class=" without-caption" >
                                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $third_choice_box_form1_tab["pic"] ?>" alt="<?= $third_choice_box_form1_tab["pic"] ?>">
                                                                                        </a>

                                                                                    </div>

                                                                                    <script type="text/javascript">
                                                                                        $(document).ready(function () {
                                                                                            $('#third_choice_box_form1_pic_avatar_orak_tab<?=$y?>').orakuploader({
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

                                                                                            $('#third_choice_box_form1_pic_avatar_orak_tab<?=$y?>').html("<?=$pic_str?>");
                                                                                        });
                                                                                    </script>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!--form2-->
                                                            <div class=" panel panel-default H_mb0">
                                                                <?
                                                                $third_choice_box_form2_tab = get_tem_result($site, $la, "third_choice_box_form2_tab$y", $tem, $coms_conect);
                                                                ?>
                                                                <div class="panel-heading container-fluid H_p0">
                                                                    <div class="panel-title col-md-12" style="display: inline-block">
                                                                        <div class="col-md-7 col-sm-12 col-xs-12 H_right ">
                                                                            <input value="1"
                                                                                   type="checkbox" <? if ($third_choice_box_form2_tab['link'] == 1) echo 'checked' ?>
                                                                                   class="ace ace-switch ace-switch-6 "
                                                                                   name="third_choice_box_form2_link_tab<?=$y?>"
                                                                                   style="direction: rtl;"><span class="lbl H_mb7"></span>

                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#question-tab<?=$y?>-2" class="collapsed">
                                                                                <span class="question" style="max-width: 500px;display: inline-block;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-wrap: break-word;margin-top: 15px;">حالت دوم<b class="arrow fa fa-angle-down"></b></span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-5 col-sm-12 col-xs-12 pull-left" style="float:left;position: relative;padding-left: 0px;font-size: 12px; text-align:left;">
                                                                            <a href="new_template/drbanihosseini_pregnancy/img/form2.jpg" class=" without-caption" >
                                                                                <img width="40" height="40" class="H_cursor_zoom" src="new_template/drbanihosseini_pregnancy/img/form2.jpg" alt="form2">
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div id="question-tab<?=$y?>-2" class="panel-collapse collapse" style="height: 0px;">
                                                                    <div class="panel-body">
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label" for="family">متن </label>
                                                                            <div class="form-group col-md-9">
                                                                                <div class="col-md-12 input-group">

                                                                                        <textarea type="text" class="form-control" id="third_choice_form2_text_tab<?=$y?>" name="third_choice_form2_text_tab<?=$y?>">
                                                                                            <?=$third_choice_box_form2_tab["text"] ?>
                                                                                        </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="tab-pane">
                                                                            <div class="page-content-area">
                                                                                <div class="page-body" style="margin-top: 25px;">
                                                                                    <fieldset>
                                                                                        <!-- #section:download/download.link -->

                                                                                        <div class="col-md-12">
                                                                                            <? $count_ul_name_form2_tab = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'ul_name_form2_tab$y%' ", $coms_conect);
                                                                                            for ($k = 1; $k <= $count_ul_name_form2_tab; $k++) {
                                                                                                $ul_name_form2_tab= get_tem_result($site, $la, "ul_name_form2_tab$y-$k", $tem, $coms_conect);
                                                                                                if ($ul_name_form2_tab['title'] > "") {
                                                                                                    ?>

                                                                                                    <div id="ads_ul_name_form2_tab<?=$y?>-<?=$k?>" class="seyed"
                                                                                                         style="opacity: 1;">
                                                                                                        <div class="form-group">
                                                                                                            <a class="col-md-1 control-label del-ads_ul_name_form2_tab<?=$y?>"
                                                                                                               id="<?=$y?>-<?=$k?>"
                                                                                                               for="family">
                                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                                   title="" data-original-title="حذف">
                                                                                                                </i>
                                                                                                            </a>
                                                                                                            <label class="col-md-2 control-label" for="family">عنوان
                                                                                                                <?=$y?>-<?=$k?></label>
                                                                                                            <div class="form-group col-md-9">

                                                                                                                <div class="col-md-6 input-group">
                                                                                                                    <input type="text"
                                                                                                                           id="ul_name_form2_title_ads_tab<?=$y?>-<?=$k?>"
                                                                                                                           value="<?= $ul_name_form2_tab["title"] ?>"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="عنوان"
                                                                                                                           name="ul_name_form2_title_ads_tab<?=$y?>-<?=$k?>">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <?
                                                                                                }
                                                                                            }
                                                                                            $count_ul_name_form2_tab = $k;
                                                                                            ?>
                                                                                            <input type="hidden" id="ul_name_form2_count_tab<?=$y?>"
                                                                                                   name="ul_name_form2_count_tab<?=$y?>"
                                                                                                   value="<?= --$count_ul_name_form2_tab ?>">

                                                                                            <script>
                                                                                                $(document).ready(function () {
                                                                                                    var i = <?=$k?>;

                                                                                                    $('#add_ul_name_form2_tab<?= $y ?>').on("click", function () {
                                                                                                        var someText = '<div id="ads_ul_name_form2_tab<?= $y ?>-'+ i +'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_ul_name_form2_tab<?= $y ?>" id="<?= $y ?>-'+ i +'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان#<?= $y ?>-'+ i +'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="ul_name_form2_title_ads_tab<?= $y ?>-'+ i +'" value="" class="form-control" placeholder="عنوان" name="ul_name_form2_title_ads_tab<?= $y ?>-'+ i +'" ></div></div></div></div>';
                                                                                                        $(this).before(someText);
                                                                                                        $('#ads_ul_name_form2_tab<?= $y ?>-'+ i +'').fadeTo('slow', 0.3, function () {
                                                                                                            $(this).css('background', '');
                                                                                                        }).fadeTo('slow', 1);
                                                                                                        $('#ul_name_form2_count_tab<?= $y ?>').val(i);
                                                                                                        i++;
                                                                                                    });
                                                                                                    $(document).on('click', '.del-ads_ul_name_form2_tab<?=$y?>', function () {
                                                                                                        var id = '';

                                                                                                        var p = $('#ul_name_form2_count_tab<?= $y ?>').val();
                                                                                                        p--
                                                                                                        id = $(this).attr('id');

                                                                                                        $('#ads_ul_name_form2_tab' + id ).remove();
                                                                                                        $('#ul_name_form2_count_tab<?=$y?>').val(p);
                                                                                                    });
                                                                                                });

                                                                                            </script>
                                                                                            <a class="btn btn-success block" id="add_ul_name_form2_tab<?= $y ?>"><i
                                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                                            </br>
                                                                                        </div>
                                                                                        <!-- /section:download/download.link -->
                                                                                    </fieldset>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label" for="family">بک گراند </label>
                                                                            <div class="form-group col-md-9">
                                                                                <div class="col-md-12 input-group">
                                                                                    <div class="col-md-5 input-group">
                                                                                        <input type="text"
                                                                                               id="third_choice_box_form2_pic_tab<?=$y?>"
                                                                                               value="<?=$third_choice_box_form2_tab['pic'] ?>"
                                                                                               class="form-control"
                                                                                               placeholder=" تصویر"
                                                                                               name="third_choice_box_form2_pic_tab<?=$y?>"
                                                                                               style="direction: ltr;">
                                                                                        <span class="input-group-addon"
                                                                                              style="padding: 0px;"><a
                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_box_form2_pic_tab<?=$y?>"
                                                                                                    class="btn btn-success iframe-btn"
                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                                                                            <span class="addimg flaticon-add139"></span></a>
                                                                                                                                    </span>
                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                                              style="padding: 0px;">
                                                                                                                                        <div  id="third_choice_box_form2_pic_avatar_orak_tab<?=$y?>" orakuploader="on"></div>
                                                                                                                                    </span>
                                                                                    </div>
                                                                                    <div class="ui-sortable red box" id="upload_type_third_choice_box_form2_pic_tab<?=$y?>"
                                                                                         style="float:right;">
                                                                                    </div>
                                                                                    <div class="col-md-1 input-group" id="image_show_third_choice_box_form2_pic_tab<?=$y?>">
                                                                                        <?$third_choice_box_form2_tab = get_tem_result($site, $la, "third_choice_box_form2_tab$y", $tem, $coms_conect);?>
                                                                                        <a href="<?=$third_choice_box_form2_tab["pic"] ?>" class=" without-caption" >
                                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?=$third_choice_box_form2_tab["pic"] ?>" alt="<?=$third_choice_box_form2_tab["pic"] ?>">
                                                                                        </a>

                                                                                    </div>

                                                                                    <script type="text/javascript">
                                                                                        $(document).ready(function () {
                                                                                            $('#third_choice_box_form2_pic_avatar_orak_tab<?=$y?>').orakuploader({
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

                                                                                            $('#third_choice_box_form2_pic_avatar_orak_tab<?=$y?>').html("<?=$pic_str?>");
                                                                                        });
                                                                                    </script>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!--form3-->
                                                            <div class=" panel panel-default H_mb0 ">
                                                                <?
                                                                $third_choice_box_form3_tab = get_tem_result($site, $la, "third_choice_box_form3_tab$y", $tem, $coms_conect);
                                                                ?>
                                                                <div class="panel-heading container-fluid H_p0">
                                                                    <div class="panel-title col-md-12" style="display: inline-block">
                                                                        <div class="col-md-7 col-sm-12 col-xs-12 H_right">
                                                                            <input value="1"
                                                                                   type="checkbox" <? if ($third_choice_box_form3_tab['link'] == 1) echo 'checked' ?>
                                                                                   class="ace ace-switch ace-switch-6 "
                                                                                   name="third_choice_box_form3_link_tab<?=$y?>"
                                                                                   style="direction: rtl;"><span class="lbl H_mb7"></span>

                                                                            <a data-toggle="collapse" data-parent="#accordion" href="#question-tab<?=$y?>-3" class="collapsed">
                                                                                <span class="question" style="max-width: 500px;display: inline-block;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-wrap: break-word;margin-top: 15px;">حالت سوم<b class="arrow fa fa-angle-down"></b></span>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-5 col-sm-12 col-xs-12 pull-left" style="float:left;position: relative;padding-left: 0px;font-size: 12px; text-align:left;">
                                                                            <a href="new_template/drbanihosseini_pregnancy/img/form3.jpg" class=" without-caption" >
                                                                                <img width="40" height="40" class="H_cursor_zoom" src="new_template/drbanihosseini_pregnancy/img/form3.jpg" alt="form3">
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div id="question-tab<?=$y?>-3" class="panel-collapse collapse" style="height: 0px;">
                                                                    <div class="panel-body">
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label" for="family">متن </label>
                                                                            <div class="form-group col-md-9">
                                                                                <div class="col-md-12 input-group">
                                                                                    <textarea type="text" class="form-control" id="ul_name_form3_text_ads_tab<?=$y?>" name="ul_name_form3_text_ads_tab<?=$y?>">
                                                                                            <?= $third_choice_box_form3_tab["text"] ?>
                                                                                    </textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                        <div class="tab-pane">
                                                                            <div class="page-content-area">
                                                                                <div class="page-body" style="margin-top: 25px;">
                                                                                    <fieldset>
                                                                                        <!-- #section:download/download.link -->
                                                                                        <div class="col-md-12">
                                                                                            <? $count_ul_name_form3_tab = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'ul_name_form3_tab$y%' ", $coms_conect);
                                                                                            for ($k = 1; $k <= $count_ul_name_form3_tab; $k++) {
                                                                                                $ul_name_form3_tab= get_tem_result($site, $la, "ul_name_form3_tab$y-$k", $tem, $coms_conect);
                                                                                                if ($ul_name_form3_tab['title'] > "") {
                                                                                                    ?>

                                                                                                    <div id="ads_ul_name_form3_tab<?=$y?>-<?=$k?>" class="seyed"
                                                                                                         style="opacity: 1;">
                                                                                                        <div class="form-group">
                                                                                                            <a class="col-md-1 control-label del-ads_ul_name_form3_tab<?=$y?>"
                                                                                                               id="<?=$y?>-<?=$k?>"
                                                                                                               for="family">
                                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                                   title="" data-original-title="حذف">
                                                                                                                </i>
                                                                                                            </a>
                                                                                                            <label class="col-md-2 control-label" for="family">عنوان
                                                                                                                <?=$y?>-<?=$k?></label>
                                                                                                            <div class="form-group col-md-9">

                                                                                                                <div class="col-md-6 input-group">
                                                                                                                    <input type="text"
                                                                                                                           id="ul_name_form3_title_ads_tab<?=$y?>-<?=$k?>"
                                                                                                                           value="<?= $ul_name_form3_tab["title"] ?>"
                                                                                                                           class="form-control"
                                                                                                                           placeholder="عنوان"
                                                                                                                           name="ul_name_form3_title_ads_tab<?=$y?>-<?=$k?>">
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <?
                                                                                                }
                                                                                            }
                                                                                            $count_ul_name_form3_tab = $k;
                                                                                            ?>
                                                                                            <input type="hidden" id="ul_name_form3_count_tab<?=$y?>"
                                                                                                   name="ul_name_form3_count_tab<?=$y?>"
                                                                                                   value="<?= --$count_ul_name_form3_tab ?>">

                                                                                            <script>
                                                                                                $(document).ready(function () {
                                                                                                    var i = <?=$k?>;

                                                                                                    $('#add_ul_name_form3_tab<?= $y ?>').on("click", function () {
                                                                                                        var someText = '<div id="ads_ul_name_form3_tab<?= $y ?>-'+ i +'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_ul_name_form3_tab<?= $y ?>" id="<?= $y ?>-'+ i +'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان#<?= $y ?>-'+ i +'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="ul_name_form3_title_ads_tab<?= $y ?>-'+ i +'" value="" class="form-control" placeholder="عنوان" name="ul_name_form3_title_ads_tab<?= $y ?>-'+ i +'" ></div></div></div></div>';
                                                                                                        $(this).before(someText);
                                                                                                        $('#ads_ul_name_form3_tab<?= $y ?>-'+ i +'').fadeTo('slow', 0.3, function () {
                                                                                                            $(this).css('background', '');
                                                                                                        }).fadeTo('slow', 1);
                                                                                                        $('#ul_name_form3_count_tab<?= $y ?>').val(i);
                                                                                                        i++;
                                                                                                    });
                                                                                                    $(document).on('click', '.del-ads_ul_name_form3_tab<?=$y?>', function () {
                                                                                                        var id = '';

                                                                                                        var p = $('#ul_name_form3_count_tab<?= $y ?>').val();
                                                                                                        p--
                                                                                                        id = $(this).attr('id');

                                                                                                        $('#ads_ul_name_form3_tab' + id ).remove();
                                                                                                        $('#ul_name_form3_count_tab<?=$y?>').val(p);
                                                                                                    });
                                                                                                });

                                                                                            </script>
                                                                                            <a class="btn btn-success block" id="add_ul_name_form3_tab<?= $y ?>"><i
                                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                                            </br>
                                                                                        </div>
                                                                                        <!-- /section:download/download.link -->
                                                                                    </fieldset>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <?for ($s=1;$s<=2;$s++){?>
                                                                            <div class="tab-pane">
                                                                                <div class="page-content-area">
                                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                                        <fieldset>
                                                                                            <!-- #section:download/download.link -->
                                                                                            <div class="col-md-12">
                                                                                                <?
                                                                                                $third_choice_box_form3_box_tab = get_tem_result($site, $la, "third_choice_box_form3_box_tab$s$y", $tem, $coms_conect);
                                                                                                ?>
                                                                                                <div id="" class="seyed"
                                                                                                     style="opacity: 1;">
                                                                                                    <div class="form-group">

                                                                                                        <div class="form-group col-md-11">

                                                                                                            <div class="col-md-3 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="third_choice_box_form3_box_text_tab<?=$s?><?=$y?>"
                                                                                                                       value="<?= $third_choice_box_form3_box_tab["text"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="عنوان"
                                                                                                                       name="third_choice_box_form3_box_text_tab<?=$s?><?=$y?>">
                                                                                                            </div>


                                                                                                            <div class="col-md-3 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="third_choice_box_form3_box_link_tab<?=$s?><?=$y?>"
                                                                                                                       value="<?= $third_choice_box_form3_box_tab["link"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder="متن"
                                                                                                                       name="third_choice_box_form3_box_link_tab<?=$s?><?=$y?>">
                                                                                                            </div>

                                                                                                            <div class="col-md-5 input-group">
                                                                                                                <input type="text"
                                                                                                                       id="third_choice_box_form3_box_pic_tab<?=$s?><?=$y?>"
                                                                                                                       value="<?= $third_choice_box_form3_box_tab["pic"] ?>"
                                                                                                                       class="form-control"
                                                                                                                       placeholder=" عکس"
                                                                                                                       name="third_choice_box_form3_box_pic_tab<?=$s?><?=$y?>"
                                                                                                                       style="direction: ltr;">
                                                                                                                <span class="input-group-addon"
                                                                                                                      style="padding: 0;"><a
                                                                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_box_form3_box_pic_tab<?=$s?><?=$y?>"
                                                                                                                            class="btn btn-success iframe-btn"
                                                                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0;margin: auto;height: 32px;padding-top: 4px;">
                                                                                                                                            <span class="addimg flaticon-add139"></span></a>
                                                                                                                                    </span>
                                                                                                                <span class="input-group-addon H_neshane1 H_third_choice_box7"
                                                                                                                      style="padding: 0;">
                                                                                                                                        <div  id="third_choice_box_form3_box_avatar_tab<?=$s?><?=$y?>" orakuploader="on"></div>
                                                                                                                                    </span>
                                                                                                            </div>
                                                                                                            <div class="ui-sortable red box" id="upload_type_third_choice_box_form3_box_tab<?=$s?><?=$y?>"
                                                                                                                 style="float:right;">
                                                                                                            </div>
                                                                                                            <div class="input-group" id="image_show_third_choice_box_form3_box_tab<?=$s?><?=$y?>">
                                                                                                                <? $third_choice_box_form3_box_tab = get_tem_result($site, $la, "third_choice_box_form3_box_tab$s$y", $tem, $coms_conect);
                                                                                                                ?>
                                                                                                                <a href="<?= $third_choice_box_form3_box_tab["pic"] ?>" class=" without-caption" >
                                                                                                                    <img width="33" height="33" class="H_cursor_zoom" src="<?= $third_choice_box_form3_box_tab["pic"] ?>" alt="<?= $third_choice_box_form3_box_tab["text"] ?>">
                                                                                                                </a>

                                                                                                            </div>

                                                                                                            <script type="text/javascript">
                                                                                                                $(document).ready(function () {
                                                                                                                    $('#third_choice_box_form3_box_avatar_tab<?=$s?><?=$y?>').orakuploader({
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

                                                                                                                    $('#third_choice_box_form3_box_avatar_tab<?=$s?><?=$y?>').html("<?=$pic_str?>");
                                                                                                                });
                                                                                                            </script>
                                                                                                        </div>


                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- /section:download/download.link -->
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?}?>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!--End form3-->
                                                        </div>
                                                        
                                                        <script>
                                                            $(function(){
                                                                var val = $("[name='ValSelectActive_title<?=$y?>']").val();
                                                                console.log(val);
                                                                toggleForm(val);

                                                                $(document).on('change', '[name="select_type_box_tab<?=$y?>"]', function(){
                                                                    val = $(this).val();
                                                                    $('[name="ValSelectActive_title<?=$y?>"]').val(val);
                                                                    toggleForm(val);
                                                                });
                                                                function toggleForm(val){
                                                                    $('.opt<?=$y?>').hide();
                                                                    $('.tab<?=$y?>_option'+val).show();

                                                                    console.log($('.tab<?=$y?>_option'+val));
                                                                }
                                                            });

                                                        </script>

                                                    </div>

                                                </div>
                                                <?}?>
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
        $(".H_rename_header").click(function () {
            $(this).hide();
            $('.H_rename_header_save').show();
            $(".H_input_rename_header").toggle(300);
        });
        $(".H_rename_header_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block_header' + "&value=" + $(".H_input_rename_header").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_header > span.temp").text($(".H_input_rename_header").val());
            $(this).hide();
            $('.H_rename_header').show();
            $(".H_input_rename_header").hide();
            $(".H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_block1").click(function () {
            $(this).hide();
            $('.H_rename_block1_save').show();
            $(".H_input_rename_block1").toggle(300);
        });
        $(".H_rename_block1_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block1' + "&value=" + $(".H_input_rename_block1").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_block1 > span.temp").text($(".H_input_rename_block1").val());
            $(this).hide();
            $('.H_rename_block1').show();
            $(".H_input_rename_block1").hide();
            $(".H_rename_block1.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_block2").click(function () {
            $(this).hide();
            $('.H_rename_block2_save').show();
            $(".H_input_rename_block2").toggle(300);
        });
        $(".H_rename_block2_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block2' + "&value=" + $(".H_input_rename_block2").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_block2 > span.temp").text($(".H_input_rename_block2").val());
            $(this).hide();
            $('.H_rename_block2').show();
            $(".H_input_rename_block2").hide();
            $(".H_rename_block2.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_block3").click(function () {
            $(this).hide();
            $('.H_rename_block3_save').show();
            $(".H_input_rename_block3").toggle(300);
        });
        $(".H_rename_block3_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block3' + "&value=" + $(".H_input_rename_block3").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_block3 > span.temp").text($(".H_input_rename_block3").val());
            $(this).hide();
            $('.H_rename_block3').show();
            $(".H_input_rename_block3").hide();
            $(".H_rename_block3.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_block4").click(function () {
            $(this).hide();
            $('.H_rename_block4_save').show();
            $(".H_input_rename_block4").toggle(300);
        });
        $(".H_rename_block4_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block4' + "&value=" + $(".H_input_rename_block4").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_block4 > span.temp").text($(".H_input_rename_block4").val());
            $(this).hide();
            $('.H_rename_block4').show();
            $(".H_input_rename_block4").hide();
            $(".H_rename_block4.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_block5").click(function () {
            $(this).hide();
            $('.H_rename_block5_save').show();
            $(".H_input_rename_block5").toggle(300);
        });
        $(".H_rename_block5_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block5' + "&value=" + $(".H_input_rename_block5").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_block5 > span.temp").text($(".H_input_rename_block5").val());
            $(this).hide();
            $('.H_rename_block5').show();
            $(".H_input_rename_block5").hide();
            $(".H_rename_block5.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_footer").click(function () {
            $(this).hide();
            $('.H_rename_footer_save').show();
            $(".H_input_rename_footer").toggle(300);
        });
        $(".H_rename_footer_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block_footer' + "&value=" + $(".H_input_rename_footer").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_footer > span.temp").text($(".H_input_rename_footer").val());
            $(this).hide();
            $('.H_rename_footer').show();
            $(".H_input_rename_footer").hide();
            $(".H_rename_footer.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_email").click(function () {
            $(this).hide();
            $('.H_rename_email_save').show();
            $(".H_input_rename_email").toggle(300);
        });
        $(".H_rename_email_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block_email' + "&value=" + $(".H_input_rename_email").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_email > span.temp").text($(".H_input_rename_email").val());
            $(this).hide();
            $('.H_rename_email').show();
            $(".H_input_rename_email").hide();
            $(".H_rename_email.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_call").click(function () {
            $(this).hide();
            $('.H_rename_call_save').show();
            $(".H_input_rename_call").toggle(300);
        });
        $(".H_rename_call_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block_call' + "&value=" + $(".H_input_rename_call").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_call > span.temp").text($(".H_input_rename_call").val());
            $(this).hide();
            $('.H_rename_call').show();
            $(".H_input_rename_call").hide();
            $(".H_rename_call.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        //-----------tabs---------
        $(".H_rename_setting_tab_name").click(function () {
            $(this).hide();
            $('.H_rename_setting_tab_name_save').show();
            $(".H_input_rename_setting_tab_name").toggle(300);
        });
        $(".H_rename_setting_tab_name_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'setting_tab_name' + "&value=" + $(".H_input_rename_setting_tab_name").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_setting_tab_name > span.temp").text($(".H_input_rename_setting_tab_name").val());
            $(this).hide();
            $('.H_rename_setting_tab_name').show();
            $(".H_input_rename_setting_tab_name").hide();
            $(".H_rename_setting_tab_name.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_tab_one").click(function () {
            $(this).hide();
            $('.H_rename_tab_one_save').show();
            $(".H_input_rename_tab_one").toggle(300);
        });
        $(".H_rename_tab_one_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'tab_one' + "&value=" + $(".H_input_rename_tab_one").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_tab_one > span.temp").text($(".H_input_rename_tab_one").val());
            $(this).hide();
            $('.H_rename_tab_one').show();
            $(".H_input_rename_tab_one").hide();
            $(".H_rename_tab_one.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_tab_two").click(function () {
            $(this).hide();
            $('.H_rename_tab_two_save').show();
            $(".H_input_rename_tab_two").toggle(300);
        });
        $(".H_rename_tab_two_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'tab_two' + "&value=" + $(".H_input_rename_tab_two").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_tab_two > span.temp").text($(".H_input_rename_tab_two").val());
            $(this).hide();
            $('.H_rename_tab_two').show();
            $(".H_input_rename_tab_two").hide();
            $(".H_rename_tab_two.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_tab_three").click(function () {
            $(this).hide();
            $('.H_rename_tab_three_save').show();
            $(".H_input_rename_tab_three").toggle(300);
        });
        $(".H_rename_tab_three_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'tab_three' + "&value=" + $(".H_input_rename_tab_three").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_tab_three > span.temp").text($(".H_input_rename_tab_three").val());
            $(this).hide();
            $('.H_rename_tab_three').show();
            $(".H_input_rename_tab_three").hide();
            $(".H_rename_tab_three.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_tab_four").click(function () {
            $(this).hide();
            $('.H_rename_tab_four_save').show();
            $(".H_input_rename_tab_four").toggle(300);
        });
        $(".H_rename_tab_four_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'tab_four' + "&value=" + $(".H_input_rename_tab_four").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_tab_four > span.temp").text($(".H_input_rename_tab_four").val());
            $(this).hide();
            $('.H_rename_tab_four').show();
            $(".H_input_rename_tab_four").hide();
            $(".H_rename_tab_four.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_tab_five").click(function () {
            $(this).hide();
            $('.H_rename_tab_five_save').show();
            $(".H_input_rename_tab_five").toggle(300);
        });
        $(".H_rename_tab_five_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'tab_five' + "&value=" + $(".H_input_rename_tab_five").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_tab_five > span.temp").text($(".H_input_rename_tab_five").val());
            $(this).hide();
            $('.H_rename_tab_five').show();
            $(".H_input_rename_tab_five").hide();
            $(".H_rename_tab_five.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
        $(".H_rename_tab_six").click(function () {
            $(this).hide();
            $('.H_rename_tab_six_save').show();
            $(".H_input_rename_tab_six").toggle(300);
        });
        $(".H_rename_tab_six_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'tab_six' + "&value=" + $(".H_input_rename_tab_six").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_tab_six > span.temp").text($(".H_input_rename_tab_six").val());
            $(this).hide();
            $('.H_rename_tab_six').show();
            $(".H_input_rename_tab_six").hide();
            $(".H_rename_tab_six.H_pos_color").css('transform','translateY(-24px)');
        });

        //-------------------------------
    });
</script>


</div>

<!-- Bootstrap-Iconpicker -->
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
            titleSrc: function(item) {
                return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
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
<!-- Bootstrap-Iconpicker -->
<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
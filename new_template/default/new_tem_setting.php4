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
    $num_con_tab= injection_replace($_POST["num_con_tab"]);
    insert_templdate($site, '', $la, $number_tab, $temp_tab, '', $num_con_tab, "temp_tab", $tem, $coms_conect);


    ################################################################# هدر ############################################

    $header_link = injection_replace($_POST["header_link"]);
    $header_text = injection_replace($_POST["header_text"]);
    $header_pic = injection_replace($_POST["header_pic"]);
    $site_name = injection_replace($_POST["site_name"]);

    $header_pic_adress= injection_replace($_POST["header_pic_adress"]);
    $header_pic_adress = resize_image_M($header_pic_adress,198,50,$img_page_main,'');
    $header_pic_adress_avatar_orak = injection_replace($_POST["header_pic_adress_avatar_orak"][0]);
    if($header_pic_adress_avatar_orak>""){
        $header_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $header_pic_adress_avatar_orak;
        $header_pic_adress = resize_image_M($header_pic_adress,198,50,$img_page_main,'');
    }
    insert_templdate($site, $header_pic_adress, $la, $header_text, $site_name, $header_link, $header_pic, "header_title", $tem, $coms_conect);

    $header_title_social_title = injection_replace($_POST["header_title_social_title"]);
    insert_templdate($site, '', $la, '', $header_title_social_title, '','', "header_title_social", $tem, $coms_conect);
    $header_social_del = "name like 'header_social%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $header_social_del, $coms_conect);
    $header_social_networks_count = injection_replace_pic($_POST["header_social_networks_count"]);
    for ($k = 1; $k <= $header_social_networks_count; $k++) {
        $header_social_networks_title = injection_replace_pic($_POST["header_social_networks_title{$k}"]);
        $header_social_networks_text = injection_replace_pic($_POST["header_social_networks_text{$k}"]);
        $header_social_networks_link = injection_replace_pic($_POST["header_social_networks_link{$k}"]);
        insert_templdate($site, '', $la, $header_social_networks_text, $header_social_networks_title, $header_social_networks_link, '', "header_social$k", $tem, $coms_conect);
    }

    ########################################################## باکس اول ###########################################

    $boxOne_1_pic_adress = 0;
    $boxOne_1_pic_adress= injection_replace($_POST["boxOne_1_pic_adress"]);
    $boxOne_1_title = injection_replace($_POST["boxOne_1_title"]);
    $boxOne_1_pic = injection_replace($_POST["boxOne_1_pic"]);
    $boxOne_1_link = injection_replace($_POST["boxOne_1_link"]);
    insert_templdate($site, $boxOne_1_pic_adress, $la, '', $boxOne_1_title, $boxOne_1_link, $boxOne_1_pic, "boxOne_1", $tem, $coms_conect);

    $boxOne_1_table_del = "name like 'boxOne_1_table%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $boxOne_1_table_del, $coms_conect);
    $boxOne_1_table_networks_count = injection_replace_pic($_POST["boxOne_1_table_networks_count"]);
    for ($k = 1; $k <= $boxOne_1_table_networks_count; $k++) {
        $boxOne_1_table_networks_title = injection_replace_pic($_POST["boxOne_1_table_networks_title{$k}"]);
        $boxOne_1_table_networks_text = injection_replace_pic($_POST["boxOne_1_table_networks_text{$k}"]);

        insert_templdate($site, '', $la, $boxOne_1_table_networks_text, $boxOne_1_table_networks_title, '', '', "boxOne_1_table$k", $tem, $coms_conect);
    }

    $boxOne_2_title = injection_replace($_POST["boxOne_2_title"]);
    $boxOne_2_pic = injection_replace($_POST["boxOne_2_pic"]);
    $boxOne_2_text = injection_replace($_POST["boxOne_2_text"]);
    $boxOne_2_link = injection_replace($_POST["boxOne_2_link"]);
    insert_templdate($site, $boxOne_2_text, $la, $boxOne_2_text, $boxOne_2_title, $boxOne_2_link, $boxOne_2_pic, "boxOne_2", $tem, $coms_conect);


    $boxOne_3_title = injection_replace($_POST["boxOne_3_title"]);
    $boxOne_3_text = injection_replace($_POST["boxOne_3_text"]);
    $boxOne_3_pic = injection_replace($_POST["boxOne_3_pic"]);
    $boxOne_3_link = injection_replace($_POST["boxOne_3_link"]);
    insert_templdate($site, '', $la, $boxOne_3_text, $boxOne_3_title, $boxOne_3_link, $boxOne_3_pic, "boxOne_3", $tem, $coms_conect);


    $boxOne_4_pic_adress= injection_replace($_POST["boxOne_4_pic_adress"]);
    $boxOne_4_title = injection_replace($_POST["boxOne_4_title"]);
    $boxOne_4_text = injection_replace($_POST["boxOne_4_text"]);
    $boxOne_4_pic = injection_replace($_POST["boxOne_4_pic"]);
    $boxOne_4_link = injection_replace($_POST["boxOne_4_link"]);
    insert_templdate($site, $boxOne_4_pic_adress, $la, $boxOne_4_text, $boxOne_4_title, $boxOne_4_link, $boxOne_4_pic, "boxOne_4", $tem, $coms_conect);


    ########################################################### باکس دوم #####################################
    $boxTwo_pic_adress = 0;
    $boxTwo_pic_adress= injection_replace($_POST["boxTwo_pic_adress"]);
    $boxTwo_title = injection_replace($_POST["boxTwo_title"]);
    $boxTwo_text = injection_replace($_POST["boxTwo_text"]);
    $boxTwo_pic = injection_replace($_POST["boxTwo_pic"]);
    $boxTwo_link = injection_replace($_POST["boxTwo_link"]);
    insert_templdate($site, $boxTwo_pic_adress, $la, $boxTwo_text, $boxTwo_title, $boxTwo_link, $boxTwo_pic, "boxTwo", $tem, $coms_conect);

    $box_two_img_del = "name like 'box_two_img%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $box_two_img_del, $coms_conect);
    $box_two_img_count = injection_replace_pic($_POST["box_two_img_count"]);
    for ($u = 1; $u <= $box_two_img_count; $u++) {

        $box_two_img_text= injection_replace($_POST["box_two_img_text{$u}"]);
        $box_two_img_link= injection_replace($_POST["box_two_img_link{$u}"]);
        $box_two_img_pic= injection_replace($_POST["box_two_img_pic{$u}"]);
        $box_two_img_pic= resize_image_M($box_two_img_pic,80,80,$img_page_main,'');
        $box_two_img_avatar7 = injection_replace($_POST["box_two_img_avatar7{$u}"][0]);
        if($box_two_img_avatar7>""){
            $box_two_img_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $box_two_img_avatar7;
            $box_two_img_pic = resize_image_M($box_two_img_pic,80,80,$img_page_main,'');
        }
        insert_templdate($site, $box_two_img_pic, $la, $box_two_img_text, '', $box_two_img_link, '', "box_two_img$u", $tem, $coms_conect);

    }


    ########################################################### باکس سوم #####################################

    $boxThree_pic_adress = 0;
    $boxThree_pic_adress= injection_replace($_POST["boxThree_pic_adress"]);
    $boxThree_title= injection_replace($_POST["boxThree_title"]);

    insert_templdate($site, $boxThree_pic_adress, $la, '', $boxThree_title, '', '', "boxThree", $tem, $coms_conect);



    ########################################################### باکس چهارم #####################################
    $boxFour_pic_adress = 0;
    $boxFour_pic_adress= injection_replace($_POST["boxFour_pic_adress"]);
    $boxFour_title = injection_replace($_POST["boxFour_title"]);
    $boxFour_link= injection_replace($_POST["boxFour_link"]);
    $boxFour_text= $_POST["boxFour_text"];
    $boxFour_pic= injection_replace($_POST["boxFour_pic"]);
    $boxFour_pic = resize_image_M($boxFour_pic,1423,800,$img_page_main,'');
    $boxFour_pic_avatar_orak = injection_replace($_POST["boxFour_pic_avatar_orak"][0]);
    if($boxFour_pic_avatar_orak>""){
        $boxFour_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $boxFour_pic_avatar_orak;
        $boxFour_pic = resize_image_M($boxFour_pic,1423,800,$img_page_main,'');
    }

    insert_templdate($site, $boxFour_pic_adress, $la, $boxFour_text, $boxFour_title, $boxFour_link, $boxFour_pic, "boxFour", $tem, $coms_conect);


    ########################################################### boxFive #####################################
    $boxFive_pic_adress = 0;
    $boxFive_pic_adress= injection_replace($_POST["boxFive_pic_adress"]);
    $boxFive_title = injection_replace($_POST["boxFive_title"]);
    $boxFive_text = injection_replace($_POST["boxFive_text"]);
    $boxFive_pic = injection_replace($_POST["boxFive_pic"]);
    $boxFive_link = injection_replace($_POST["boxFive_link"]);
    insert_templdate($site, $boxFive_pic_adress, $la, $boxFive_text, $boxFive_title, $boxFive_link, $boxFive_pic, "boxFive", $tem, $coms_conect);



    $ValSelectActive_boxFive_title = injection_replace($_POST["ValSelectActive_boxFive_title"]);
    insert_templdate($site, '', $la, '', $ValSelectActive_boxFive_title, '', '', "ValSelectActive_boxFive", $tem, $coms_conect);

    $condition_first_choice_boxFive = "name like 'first_choice_boxFive%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_first_choice_boxFive, $coms_conect);
    $first_choice_boxFive_count = injection_replace_pic($_POST["first_choice_boxFive_count"]);
    for ($i = 1; $i <= $first_choice_boxFive_count; $i++) {

        $first_choice_boxFive_cat = injection_replace_pic($_POST["first_choice_boxFive_cat{$i}"]);
        $first_choice_boxFive_subcat_cat = injection_replace_pic($_POST["first_choice_boxFive_subcat_cat{$i}"]);
        $first_choice_boxFive_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_boxFive_Fixed_selection_cat{$i}"]);
        $first_choice_boxFive_number = injection_replace_pic($_POST["first_choice_boxFive_number{$i}"]);
        if ($first_choice_boxFive_subcat_cat > "")
            insert_templdate($site, $first_choice_boxFive_number, $la, $first_choice_boxFive_Fixed_selection_cat, '', $first_choice_boxFive_cat, $first_choice_boxFive_subcat_cat, "first_choice_boxFive$i", $tem, $coms_conect);
    }

    $condition_second_choice_boxFive="name like 'second_choice_boxFive%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting',$condition_second_choice_boxFive,$coms_conect);
    $second_choice_boxFive_count = injection_replace_pic($_POST["second_choice_boxFive_count"]);
    for ($i = 1; $i <= $second_choice_boxFive_count; $i++) {

        $second_choice_boxFive_cat = injection_replace_pic($_POST["second_choice_boxFive_cat{$i}"]);
        $second_choice_boxFive_subcat_cat = injection_replace_pic($_POST["second_choice_boxFive_subcat_cat{$i}"]);
        $second_choice_boxFive_subcat_cat_content = injection_replace_pic($_POST["second_choice_boxFive_subcat_cat_content{$i}"]);
        if($second_choice_boxFive_subcat_cat_content>0)
            insert_templdate($site, $second_choice_boxFive_subcat_cat_content, $la, '', '', $second_choice_boxFive_cat, $second_choice_boxFive_subcat_cat, "second_choice_boxFive$i", $tem, $coms_conect);
    }

    $condition_third_choice_boxFive = "name like 'third_choice_boxFive%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $condition_third_choice_boxFive, $coms_conect);
    $third_choice_boxFive_count = injection_replace_pic($_POST["third_choice_boxFive_count"]);
    for ($x = 1; $x <= $third_choice_boxFive_count; $x++) {

        $third_choice_boxFive_text = injection_replace_pic($_POST["third_choice_boxFive_text{$x}"]);
        $third_choice_boxFive_title = injection_replace_pic($_POST["third_choice_boxFive_title{$x}"]);
        $third_choice_boxFive_link = injection_replace_pic($_POST["third_choice_boxFive_link{$x}"]);
        $third_choice_boxFive_pic = injection_replace_pic($_POST["third_choice_boxFive_pic{$x}"]);
        $third_choice_boxFive_pic_adress = injection_replace_pic($_POST["third_choice_boxFive_pic_adress{$x}"]);
        $third_choice_boxFive_pic_adress = resize_image_M($third_choice_boxFive_pic_adress,370,180,$img_page_main,'');
        $third_choice_boxFive_avatar7 = injection_replace($_POST["third_choice_boxFive_avatar7{$x}"][0]);
        if($third_choice_boxFive_avatar7>""){
            $third_choice_boxFive_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_boxFive_avatar7;
            $third_choice_boxFive_pic_adress = resize_image_M($third_choice_boxFive_pic_adress,370,180,$img_page_main,'');
        }
        if ($third_choice_boxFive_title >""){
            insert_templdate($site, $third_choice_boxFive_pic_adress, $la, $third_choice_boxFive_text, $third_choice_boxFive_title, $third_choice_boxFive_link, $third_choice_boxFive_pic, "third_choice_boxFive$x", $tem, $coms_conect);
        }}

########################################################### box six ########################################################
    $boxSix_pic_adress = 0;
    $boxSix_pic_adress= injection_replace($_POST["boxSix_pic_adress"]);
    $boxSix_title = injection_replace($_POST["boxSix_title"]);
    $boxSix_text = injection_replace($_POST["boxSix_text"]);
    $boxSix_pic = injection_replace($_POST["boxSix_pic"]);
    $boxSix_link = injection_replace($_POST["boxSix_link"]);
    insert_templdate($site, $boxSix_pic_adress, $la, $boxSix_text, $boxSix_title, $boxSix_link, $boxSix_pic, "boxSix", $tem, $coms_conect);

    $box_six_img_del = "name like 'box_six_img%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $box_six_img_del, $coms_conect);
    $box_six_img_count = injection_replace_pic($_POST["box_six_img_count"]);
    for ($u = 1; $u <= $box_six_img_count; $u++) {

        $box_six_img_text= injection_replace($_POST["box_six_img_text{$u}"]);

        $box_six_img_pic= injection_replace($_POST["box_six_img_pic{$u}"]);
//        $box_six_img_pic= resize_image_M($box_six_img_pic,154,108,$img_page_main,'');
        $box_six_img_avatar7 = injection_replace($_POST["box_six_img_avatar7{$u}"][0]);
        if($box_six_img_avatar7>""){
            $box_six_img_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $box_six_img_avatar7;
//            $box_six_img_pic = resize_image_M($box_six_img_pic,154,108,$img_page_main,'');
        }
        insert_templdate($site, $box_six_img_pic, $la, $box_six_img_text, '', '', '', "box_six_img$u", $tem, $coms_conect);

    }
########################################################### فوتر########################################################

    $footer_column1_text = injection_replace($_POST["footer_column1_text"]);
    insert_templdate($site, '', $la, $footer_column1_text, '', '','', "footer_column1", $tem, $coms_conect);

    $one_column_links_del = "name like 'one_column_footer_links%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $one_column_links_del, $coms_conect);
    $one_column_links_count = injection_replace_pic($_POST["one_column_links_count"]);
    for ($k = 1; $k <= $one_column_links_count; $k++) {
        $one_column_links_title = injection_replace_pic($_POST["one_column_links_title{$k}"]);
        $one_column_links_link = injection_replace_pic($_POST["one_column_links_link{$k}"]);

        insert_templdate($site, '', $la, '', $one_column_links_title, $one_column_links_link, '', "one_column_footer_links$k", $tem, $coms_conect);
    }

//    -------------------------------------ستون دوم -------------------------------------

    $footer_column2_title = injection_replace($_POST["footer_column2_title"]);
    insert_templdate($site, '', $la, '', $footer_column2_title, '','', "footer_column2", $tem, $coms_conect);

    $two_column_links_del = "name like 'two_column_footer_links%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $two_column_links_del, $coms_conect);
    $two_column_links_count = injection_replace_pic($_POST["two_column_links_count"]);
    for ($k = 1; $k <= $two_column_links_count; $k++) {
        $two_column_links_title = injection_replace_pic($_POST["two_column_links_title{$k}"]);
        $two_column_links_link = injection_replace_pic($_POST["two_column_links_link{$k}"]);

        insert_templdate($site, '', $la, '', $two_column_links_title, $two_column_links_link, '', "two_column_footer_links$k", $tem, $coms_conect);
    }

//----------------------------------------ستون سوم---------------------------
    $footer_column3_title = injection_replace($_POST["footer_column3_title"]);
    $footer_column3_text = injection_replace($_POST["footer_column3_text"]);
    insert_templdate($site, '', $la, $footer_column3_text, $footer_column3_title, '','', "footer_column3", $tem, $coms_conect);


//--------------------------------------ستون چهارم---------------------------------------
    $footer_column4_title = injection_replace($_POST["footer_column4_title"]);
    insert_templdate($site, '', $la, '', $footer_column4_title, '','', "footer_column4", $tem, $coms_conect);

    $footer_social_del = "name like 'footer_social%' and tem_name='$tem'";
    delete_from_data_base('new_tem_setting', $footer_social_del, $coms_conect);
    $footer_social_networks_count = injection_replace_pic($_POST["footer_social_networks_count"]);
    for ($k = 1; $k <= $footer_social_networks_count; $k++) {
        $footer_social_networks_title = injection_replace_pic($_POST["footer_social_networks_title{$k}"]);
        $footer_social_networks_text = injection_replace_pic($_POST["footer_social_networks_text{$k}"]);
        $footer_social_networks_link = injection_replace_pic($_POST["footer_social_networks_link{$k}"]);
        insert_templdate($site, '', $la, $footer_social_networks_text, $footer_social_networks_title, $footer_social_networks_link, '', "footer_social$k", $tem, $coms_conect);
    }


    ########################################################### درج ایمیل########################################################
    $block_name_email = injection_replace($_POST["block_name_email"]);
if ($block_name_email >"") {
    insert_templdate($site, '', $la, $block_name_email, '', '', '', "block_email", $tem, $coms_conect);
}

    $email_link = injection_replace($_POST["email_link"]);
    $email_title = injection_replace($_POST["email_title"]);
    $email_pic = injection_replace($_POST["email_pic"]);
    $email_pic = resize_image_M($email_pic, 150, 20, $img_page_main, '');
    $email_pic_avatar_orak = injection_replace($_POST["email_pic_avatar_orak"][0]);
    if($email_pic_avatar_orak>""){
        $email_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $email_pic_avatar_orak;
        $email_pic = resize_image_M($email_pic, 150, 20, $img_page_main, '');
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

        if ($tab_name_text >""){
            insert_templdate($site, '', $la, $tab_name_text, '', '', '', "tab_name$x", $tem, $coms_conect);
        }}
    //-------end tab name------------

    //-------tab------------


  for ($u = 1; $u <= $count1_tab_name; $u++) {

      $Onvan_tabs = injection_replace($_POST["Onvan_tabs$u"]);
      $Onvan_tabs_text= injection_replace($_POST["Onvan_tabs_text$u"]);

      $Onvan_tabs_pic_adress= injection_replace($_POST["Onvan_tabs_pic_adress$u"]);
      $Onvan_tabs_pic_adress = resize_image_M($Onvan_tabs_pic_adress,1170,252,$img_page_main,'');
      $Onvan_tabs_pic_adress_avatar_orak = injection_replace($_POST["Onvan_tabs_pic_adress_avatar_orak$u"][0]);
      if($Onvan_tabs_pic_adress_avatar_orak>""){
          $Onvan_tabs_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $Onvan_tabs_pic_adress_avatar_orak;
          $Onvan_tabs_pic_adress = resize_image_M($Onvan_tabs_pic_adress,1170,252,$img_page_main,'');
      }

      insert_templdate($site, $Onvan_tabs_pic_adress, $la, $Onvan_tabs_text, $Onvan_tabs, '', '', "Onvan_tabs$u", $tem, $coms_conect);


      $ValSelectActive_BoxThree_Tab_title = injection_replace($_POST["ValSelectActive_BoxThree_Tab_title$u"]);
      insert_templdate($site, '', $la, '', $ValSelectActive_BoxThree_Tab_title, '', '', "ValSelectActive_BoxThree_Tab$u", $tem, $coms_conect);

      $condition_first_choice_BoxThree_Tab = "name like 'first_choice_BoxThree_Tab$u%' and tem_name='$tem'";
      delete_from_data_base('new_tem_setting', $condition_first_choice_BoxThree_Tab, $coms_conect);
      $first_choice_BoxThree_Tab_count = injection_replace_pic($_POST["first_choice_BoxThree_Tab_count{$u}"]);
      for ($i = 1; $i <= $first_choice_BoxThree_Tab_count; $i++) {

          $first_choice_BoxThree_Tab_cat = injection_replace_pic($_POST["first_choice_BoxThree_Tab_cat{$u}{$i}"]);
          $first_choice_BoxThree_Tab_subcat_cat = injection_replace_pic($_POST["first_choice_BoxThree_Tab_subcat_cat{$u}{$i}"]);
          $first_choice_BoxThree_Tab_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_BoxThree_Tab_Fixed_selection_cat{$u}{$i}"]);
          $first_choice_BoxThree_Tab_number = injection_replace_pic($_POST["first_choice_BoxThree_Tab_number{$u}{$i}"]);
          if ($first_choice_BoxThree_Tab_subcat_cat > "")
              insert_templdate($site, $first_choice_BoxThree_Tab_number, $la, $first_choice_BoxThree_Tab_Fixed_selection_cat, '', $first_choice_BoxThree_Tab_cat, $first_choice_BoxThree_Tab_subcat_cat, "first_choice_BoxThree_Tab$u$i", $tem, $coms_conect);
      }

      $condition_second_choice_BoxThree_Tab = "name like 'second_choice_BoxThree_Tab$u%' and tem_name='$tem'";
      delete_from_data_base('new_tem_setting', $condition_second_choice_BoxThree_Tab, $coms_conect);
      $second_choice_BoxThree_Tab_count = injection_replace_pic($_POST["second_choice_BoxThree_Tab_count{$u}"]);
      for ($i = 1; $i <= $second_choice_BoxThree_Tab_count; $i++) {

          $second_choice_BoxThree_Tab_cat = injection_replace_pic($_POST["second_choice_BoxThree_Tab_cat{$u}{$i}"]);
          $second_choice_BoxThree_Tab_subcat_cat = injection_replace_pic($_POST["second_choice_BoxThree_Tab_subcat_cat{$u}{$i}"]);
          $second_choice_BoxThree_Tab_subcat_cat_content = injection_replace_pic($_POST["second_choice_BoxThree_Tab_subcat_cat_content{$u}{$i}"]);
          if ($second_choice_BoxThree_Tab_subcat_cat_content > 0)
              insert_templdate($site, $second_choice_BoxThree_Tab_subcat_cat_content, $la, '', '', $second_choice_BoxThree_Tab_cat, $second_choice_BoxThree_Tab_subcat_cat, "second_choice_BoxThree_Tab$u$i", $tem, $coms_conect);
      }

      $condition_third_choice_BoxThree_Tab = "name like 'third_choice_BoxThree_Tab$u%' and tem_name='$tem'";
      delete_from_data_base('new_tem_setting', $condition_third_choice_BoxThree_Tab, $coms_conect);
      $third_choice_BoxThree_Tab_count = injection_replace_pic($_POST["third_choice_BoxThree_Tab_count{$u}"]);
      for ($x = 1; $x <= $third_choice_BoxThree_Tab_count; $x++) {


          $third_choice_BoxThree_Tab_title = injection_replace_pic($_POST["third_choice_BoxThree_Tab_title{$u}{$x}"]);
          $third_choice_BoxThree_Tab_link = injection_replace_pic($_POST["third_choice_BoxThree_Tab_link{$u}{$x}"]);
          $third_choice_BoxThree_Tab_pic_adress = injection_replace_pic($_POST["third_choice_BoxThree_Tab_pic_adress{$u}{$x}"]);
          $third_choice_BoxThree_Tab_pic_adress = resize_image_M($third_choice_BoxThree_Tab_pic_adress, 237, 177, $img_page_main, '');
          $third_choice_BoxThree_Tab_avatar7 = injection_replace($_POST["third_choice_BoxThree_Tab_avatar7{$u}{$x}"][0]);
          if ($third_choice_BoxThree_Tab_avatar7 > "") {
              $third_choice_BoxThree_Tab_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_BoxThree_Tab_avatar7;
              $third_choice_BoxThree_Tab_pic_adress = resize_image_M($third_choice_BoxThree_Tab_pic_adress, 237, 177, $img_page_main, '');
          }
          if ($third_choice_BoxThree_Tab_title > "") {
              insert_templdate($site, $third_choice_BoxThree_Tab_pic_adress, $la, '', $third_choice_BoxThree_Tab_title, $third_choice_BoxThree_Tab_link, '', "third_choice_BoxThree_Tab$u$x", $tem, $coms_conect);
          }
      }

//-------end tab1------------
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
                                <? $temp_tab = get_tem_result($site, $la, "temp_tab", $tem, $coms_conect); ?>
                                <input type="hidden" name="temp_tab" value="<?= $temp_tab['title'] ?>">
                                <input type="hidden" name="number_tab" value="<?= $temp_tab['text'] ?>">
                                <input type="hidden" name="num_con_tab" value="<?= $temp_tab['pic'] ?>">
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
                                        <a class="z-link ">باکس سوم</a>
                                    </li>

                                </ul>
                                <div class="h-content2  z-container">
                                    <!-----------------------------------------------------header---------------------------------------------->
                                    <div class="z-content tab1 z-active" style="position: relative; display: block;" >
                                        <div class="z-content-inner">

                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H1">
                                                <div class="list-group">


                                                    <? $block_header = get_tem_result($site, $la, "block_header", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_header" href="#" class="list-group-item active text-center ">
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
                                                <div id="header2" class="bhoechie-tab-content H1 active">

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
                                                                                   value="<?=$header_title["pic_adress"]?>"
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
                                                                                    orakuploader_maximum_uploads: 1
                                                                                });

                                                                                $('#header_pic_adress_avatar_orak').html("<?=$pic_str?>");
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <hr>
                                                            <label class="col-md-3 control-label" for="family">تلفن</label>
                                                            <br>
                                                            <div  class="tab-pane">
                                                                <div class="page-content-area" >
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">

                                                                                <div  class="seyed"
                                                                                      style="opacity: 1;">
                                                                                    <div class="form-group">

                                                                                        <label class="col-md-3 control-label" for="family">عنوان و تلفن</label>
                                                                                        <div class="form-group col-md-9">

                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="header_text"
                                                                                                       value="<?= $header_title["text"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان "
                                                                                                       name="header_text">
                                                                                            </div>
                                                                                            <div class="col-md-6 input-group">
                                                                                                <input type="text"
                                                                                                       id="header_pic"
                                                                                                       value="<?= $header_title["pic"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="تلفن"
                                                                                                       name="header_pic">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <hr>

                                                            <? $header_title_social = get_tem_result($site, $la, "header_title_social", $tem, $coms_conect); ?>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label" for="family">عنوان</label>
                                                                <div class="form-group col-md-9">
                                                                    <div class="col-md-12 input-group">
                                                                        <input type="text" value="<?= $header_title_social['title'] ?>"
                                                                               class="form-control"
                                                                               name="header_title_social_title"
                                                                               style="direction: rtl;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 style="text-align: center; font-family: IRANSans">« شبکه های اجتماعی هدر»</h3><br>
                                                            <div id="header_social_networks10" class="tab-pane">
                                                                <div class="page-content-area" id="more7">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <!-- #section:download/download.link -->
                                                                            <div class="col-md-12">
                                                                                <? $header_social_networks = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'header_social%' ", $coms_conect);
                                                                                for ($k = 1; $k <= $header_social_networks; $k++) {
                                                                                    $header_social = get_tem_result($site, $la, "header_social$k", $tem, $coms_conect);
                                                                                    if ($header_social['title'] > "") {
                                                                                        ?>

                                                                                        <div id="ads_header_social<?= $k ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del-ads_header_social"
                                                                                                   id="<?= $k ?>"
                                                                                                   for="family">
                                                                                                    <i class="fa fa-trash text-danger remove"
                                                                                                       title="" data-original-title="حذف">
                                                                                                    </i>
                                                                                                </a>
                                                                                                <label class="col-md-2 control-label" for="family">عنوان
                                                                                                    و لینک <?= $k ?></label>
                                                                                                <div class="form-group col-md-9">
                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="header_social-title-ads<?= $k ?>"
                                                                                                               value="<?= $header_social["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان انگلیسی"
                                                                                                               name="header_social_networks_title<?= $k ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="header_social-title-ads<?= $k ?>"
                                                                                                               value="<?= $header_social["text"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان فارسی"
                                                                                                               name="header_social_networks_text<?= $k ?>">
                                                                                                    </div>
                                                                                                    <div class="col-md-4 input-group">
                                                                                                        <input type="text"
                                                                                                               id="header_social-link-ads<?= $k ?>"
                                                                                                               value="<?= $header_social["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="header_social_networks_link<?= $k ?>">
                                                                                                    </div>

                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $count_header_social = $k;
                                                                                ?>
                                                                                <input type="hidden" id="header_social_networks_count"
                                                                                       name="header_social_networks_count"
                                                                                       value="<?= --$count_header_social ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$k?>;

                                                                                        $('#add_header_social').on("click", function () {
                                                                                            var someText = '<div id="ads_header_social' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_header_social" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان و لینک' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-4 input-group"><input type="text" id="header_social_networks_title' + i + '" value="" class="form-control" placeholder=" عنوان انگلیسی" name="header_social_networks_title' + i + '" ></div><div class="col-md-4 input-group"><input type="text" id="header_social_networks_text' + i + '" value="" class="form-control" placeholder="عنوان فارسی" name="header_social_networks_text' + i + '" ></div><div class="col-md-4 input-group"><input type="text" id="header_social_networks_link' + i + '" value="" class="form-control" placeholder="لینک" name="header_social_networks_link' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#ads_header_social' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#header_social_networks_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del-ads_header_social', function () {
                                                                                            var id = '';
                                                                                            var p = $('#header_social_networks_count').val();
                                                                                            p--
                                                                                            id = $(this).attr('id');
                                                                                            $('#ads_header_social' + id).remove();
                                                                                            $('#header_social_networks_count').val(p);
                                                                                        });
                                                                                    });

                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_header_social"><i
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

                                            </div>

                                        </div>
                                    </div>
                                    <!-----------------------------------------------------content--------------------------------------------->
                                    <div class="z-content tab2" style="position: absolute;">
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
                                                    <? $block6 = get_tem_result($site, $la, "block6", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_block6" href="#" class="list-group-item    text-center ">
                                                    <span class="temp"><?= $block6['text'] ?></span>
                                                    <span   data-original-title=" ویرایش " class="H_rename_block6 H_pos_color"><span class="edit flaticon-note32 "></span></span>
                                                        <span data-original-title="ذخیره " class="H_rename_block6_save H_pos_color H_dis_none"><i class="fa fa-save"></i></span>
                                                        <input type="text" value="" class="form-control H_pos_hw H_input_rename_block6 H_dis_none" name="block_name5" placeholder="نام جدید خود را وارد کنید">
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab H2">
                                                
                                                <!-------------------------box1------------------>
                                                <div id="content1" class="bhoechie-tab-content H2 active">
                                                    <center>
                                                        <? $boxOne_1 = get_tem_result($site, $la, "boxOne_1", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($boxOne_1['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="boxOne_1_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxOne_1_title"
                                                                           value="<?= $boxOne_1['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="boxOne_1_table_networks10" class="tab-pane">
                                                            <div class="page-content-area" id="more7">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $boxOne_1_table_networks = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'boxOne_1_table%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $boxOne_1_table_networks; $k++) {
                                                                                $boxOne_1_table = get_tem_result($site, $la, "boxOne_1_table$k", $tem, $coms_conect);
                                                                                if ($boxOne_1_table['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_boxOne_1_table<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_boxOne_1_table"
                                                                                               id="<?= $k ?>"
                                                                                               for="family">
                                                                                                <i class="fa fa-trash text-danger remove"
                                                                                                   title="" data-original-title="حذف">
                                                                                                </i>
                                                                                            </a>
                                                                                            <label class="col-md-2 control-label" for="family">                                                                                        روز و ساعت<?= $k ?></label>
                                                                                            <div class="form-group col-md-9">
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="boxOne_1_table-title-ads<?= $k ?>"
                                                                                                           value="<?= $boxOne_1_table["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="روز"
                                                                                                           name="boxOne_1_table_networks_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="boxOne_1_table-title-ads<?= $k ?>"
                                                                                                           value="<?= $boxOne_1_table["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="ساعت"
                                                                                                           name="boxOne_1_table_networks_text<?= $k ?>">
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_boxOne_1_table = $k;
                                                                            ?>
                                                                            <input type="hidden" id="boxOne_1_table_networks_count"
                                                                                   name="boxOne_1_table_networks_count"
                                                                                   value="<?= --$count_boxOne_1_table ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_boxOne_1_table').on("click", function () {
                                                                                        var someText = '<div id="ads_boxOne_1_table' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_boxOne_1_table" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">روز و ساعت' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="boxOne_1_table_networks_title' + i + '" value="" class="form-control" placeholder=" روز" name="boxOne_1_table_networks_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="boxOne_1_table_networks_text' + i + '" value="" class="form-control" placeholder="ساعت" name="boxOne_1_table_networks_text' + i + '" ></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_boxOne_1_table' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#boxOne_1_table_networks_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_boxOne_1_table', function () {
                                                                                        var id = '';
                                                                                        var p = $('#boxOne_1_table_networks_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_boxOne_1_table' + id).remove();
                                                                                        $('#boxOne_1_table_networks_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_boxOne_1_table"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
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
                                                                                                   id="boxOne_1_pic"
                                                                                                   value="<?= $boxOne_1["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="boxOne_1_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="boxOne_1_link"
                                                                                                   value="<?= $boxOne_1["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="boxOne_1_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $boxOne_2 = get_tem_result($site, $la, "boxOne_2", $tem, $coms_conect); ?>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxOne_2_title"
                                                                           value="<?= $boxOne_2['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxOne_2_text"
                                                                           value="<?= $boxOne_2['text'] ?>" style="direction: rtl;">
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
                                                                                                   id="boxOne_2_pic"
                                                                                                   value="<?= $boxOne_2["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="boxOne_2_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="boxOne_2_link"
                                                                                                   value="<?= $boxOne_2["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="boxOne_2_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $boxOne_3 = get_tem_result($site, $la, "boxOne_3", $tem, $coms_conect); ?>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxOne_3_title"
                                                                           value="<?= $boxOne_3['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxOne_3_text"
                                                                           value="<?= $boxOne_3['text'] ?>" style="direction: rtl;">
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
                                                                                                   id="boxOne_3_pic"
                                                                                                   value="<?= $boxOne_3["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="boxOne_3_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="boxOne_3_link"
                                                                                                   value="<?= $boxOne_3["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="boxOne_3_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <? $boxOne_4 = get_tem_result($site, $la, "boxOne_4", $tem, $coms_conect); ?>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxOne_4_title"
                                                                           value="<?= $boxOne_4['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxOne_4_pic_adress"
                                                                           value="<?= $boxOne_4['pic_adress'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxOne_4_text"
                                                                           value="<?= $boxOne_4['text'] ?>" style="direction: rtl;">
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
                                                                                                   id="boxOne_4_pic"
                                                                                                   value="<?= $boxOne_4["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="boxOne_4_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="boxOne_4_link"
                                                                                                   value="<?= $boxOne_4["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="boxOne_4_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-------------------------box2 ----------------------------->
                                                <div id="content2" class="bhoechie-tab-content H2 ">
                                                    <center>
                                                        <? $boxTwo = get_tem_result($site, $la, "boxTwo", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($boxTwo['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="boxTwo_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxTwo_title"
                                                                           value="<?= $boxTwo['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxTwo_text"
                                                                           value="<?= $boxTwo['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">« تعداد مورد نیاز: 6 »</h5>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_box_two_img = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'box_two_img%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_box_two_img; $x++) {
                                                                                $box_two_img = get_tem_result($site, $la, "box_two_img$x", $tem, $coms_conect);
                                                                                if ($box_two_img['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_box_two_img<?= $x ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_box_two_img"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title="" data-original-title="حذف"></i>

                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="box_two_img_text<?= $x ?>"
                                                                                                           value="<?= $box_two_img["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="box_two_img_text<?= $x ?>">
                                                                                                </div>
                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="box_two_img_link<?= $x ?>"
                                                                                                           value="<?= $box_two_img["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="box_two_img_link<?= $x ?>">
                                                                                                </div>


                                                                                                <div class="col-md-5 input-group">
                                                                                                    <input type="text"
                                                                                                           id="box_two_img_pic<?= $x ?>"
                                                                                                           value="<?=$box_two_img["pic_adress"]?>"


                                                                                                           class="form-control"
                                                                                                           placeholder=" تصویر"
                                                                                                           name="box_two_img_pic<?= $x ?>"
                                                                                                           style="direction: ltr;">
                                                                                                    <span class="input-group-addon"
                                                                                                          style="padding: 0px;"><a
                                                                                                                href="/filemanager/dialog.php?type=2&amp;field_id=box_two_img_pic<?= $x ?>"
                                                                                                                class="btn btn-success iframe-btn"
                                                                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                    class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                    <span class="input-group-addon H_neshane1 H_box_two_img<?= $x ?>"
                                                                                                          style="padding: 0px;">
                                                                                <div  id="box_two_img_avatar7<?= $x ?>" orakuploader="on"></div>
                                                                            <input type="hidden" id="box_two_img_avatar7_link<?= $x ?>" name="box_two_img_avatar7_link<?= $x ?>" value="<? ?>">
                                                        </span>
                                                                                                </div>
                                                                                                <div class="ui-sortable red box" id="upload_type_box_two_img<?= $x ?>"
                                                                                                     style="float:right;">
                                                                                                </div>
                                                                                                <div class=" col-md-1 input-group" id="image_show_box_two_img<?= $x ?>">
                                                                                                    <a href="<?= $box_two_img["pic_adress"] ?>" class=" without-caption" >
                                                                                                        <img width="33" height="33" class="H_cursor_zoom" src="<?= $box_two_img["pic_adress"] ?>" alt="<?= $box_two_img["text"] ?>">
                                                                                                    </a>

                                                                                                </div>

                                                                                                <script type="text/javascript">
                                                                                                    $(document).ready(function () {
                                                                                                        $('#box_two_img_avatar7<?=$x?>').orakuploader({
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

                                                                                                        $('#box_two_img_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                            <input type="hidden" id="box_two_img_count"
                                                                                   name="box_two_img_count"
                                                                                   value="<?=--$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_box_two_img-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_box_two_img' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_box_two_img" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="box_two_img_text' + i + '" value="" class="form-control" placeholder="عنوان" name="box_two_img_text' + i + '" ></div><div class="col-md-3 input-group"><input type="text" id="box_two_img_link' + i + '" value="" class="form-control" placeholder="لینک" name="box_two_img_link' + i + '" ></div> <div class="col-md-5 input-group"> <input type="text" id="box_two_img_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="box_two_img_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=box_two_img_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_box_two_img' + i + '" style="padding: 0px;"><div  id="box_two_img_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="box_two_img_avatar7_link' + i + '" name="box_two_img_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_box_two_img' + i + '" style="float:right;"></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_box_two_img' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#box_two_img_count').val(i);

                                                                                        //--------orakuploader
                                                                                        $('#box_two_img_avatar7' + i + '').orakuploader({
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

                                                                                        $('#box_two_img_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                        $('.input-group-addon.H_box_two_img' + i + '').find("div").first().next().css('width','100px');
                                                                                        $('.input-group-addon.H_box_two_img' + i + '').find("div").first().next().find("div").first().css('float','right');
                                                                                        //    ---end orakuploader
                                                                                        i++;});
                                                                                    $(document).on('click', '.del_box_two_img', function () {
                                                                                        var id = '';
                                                                                        var k = $('#box_two_img_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_box_two_img' + id).remove();
                                                                                        $('#box_two_img_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_box_two_img-ads"><i
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
                                                                                                   id="boxTwo_pic"
                                                                                                   value="<?= $boxTwo["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="boxTwo_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="boxTwo_link"
                                                                                                   value="<?= $boxTwo["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="boxTwo_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!---------------------------------box3------------>
                                                <div id="content3" class="bhoechie-tab-content H2 ">
                                                    <center>
                                                        <? $boxThree = get_tem_result($site, $la, "boxThree", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($boxThree['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="boxThree_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxThree_title"
                                                                           value="<?= $boxThree['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>

                                                <!-----------------------------------------باکس چهارم ---------------------------------------------------->
                                                <div id="content4" class="bhoechie-tab-content H2">
                                                    <center>
                                                        <? $boxFour = get_tem_result($site, $la, "boxFour", $tem, $coms_conect);
                                                        $edit_text1=ta_latin_num($boxFour['text']);
                                                        ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($boxFour['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="boxFour_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxFour_title"
                                                                           value="<?= $boxFour['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxFour_link"
                                                                           value="<?= $boxFour['link'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">تصویر زمینه </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="boxFour_pic"
                                                                               value="<?=$boxFour["pic"]?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="boxFour_pic"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=boxFour_pic"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="boxFour_pic_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_boxFour_pic"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_boxFour_pic">

                                                                        <a href="<?= $boxFour["pic"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $boxFour["pic"] ?>" alt="<?= $boxFour["title"] ?>">
                                                                        </a>

                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#boxFour_pic_avatar_orak').orakuploader({
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

                                                                            $('#boxFour_pic_avatar_orak').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="form-group col-sm-12">
                                                                <label class="control-label">متن کامل </label>
                                                                <textarea id="boxFour_text" name="boxFour_text"  class="form-control" rows="3"><?= $edit_text1 ?></textarea>
                                                                <script>
                                                                    tinymce.init({
                                                                        selector: "#boxFour_text",
                                                                        height: 300,
                                                                        width:"105.5%",
                                                                        directionality : 'rtl',
                                                                        language : 'fa_IR',
                                                                        menubar:true,
                                                                        skin: 'flat',
                                                                        plugins: [
                                                                            "advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",
                                                                            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                                                                            "fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "
                                                                        ],
                                                                        image_advtab: true,
                                                                        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",
                                                                        font_formats: 'iraniansans=iraniansans',
                                                                        image_advtab: true ,
                                                                        external_filemanager_path:"/filemanager/",
                                                                        filemanager_title:"مديريت فايل" ,
                                                                        external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-----------------------------------------باکس پنجم ---------------------------------------------------->
                                                <div id="content5" class="bhoechie-tab-content H2 ">
                                                    <center>
                                                        <? $boxFive = get_tem_result($site, $la, "boxFive", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($boxFive['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="boxFive_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxFive_title"
                                                                           value="<?= $boxFive['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxFive_text"
                                                                           value="<?= $boxFive['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">« تعداد مورد نیاز: 3 »</h5>
                                                        <? $ValSelectActive_boxFive = get_tem_result($site, $la, "ValSelectActive_boxFive", $tem, $coms_conect); ?>
                                                        <div class="col-md-6 input-group " style="float: none;">
                                                            <select id="select_type_boxFive"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_boxFive"
                                                                    name="select_type_boxFive">

                                                                <option  <?if ($ValSelectActive_boxFive["title"]==1){echo 'selected';}?>  value='1'>انتخاب از ماژول</option>
                                                                <option   <?if ($ValSelectActive_boxFive["title"]==2){echo 'selected';}?> value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                                <option <?if ($ValSelectActive_boxFive["title"]==3){echo 'selected';}?> value='3'> اختصاصی</option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div>
                                                            <input name="ValSelectActive_boxFive_title" type="hidden" value="<?= $ValSelectActive_boxFive["title"] ?>">

                                                            <div  class="tab-pane opt_boxFive boxFive_option1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'first_choice_boxFive%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_boxFive; $j++) {
                                                                                    $first_choice_boxFive = get_tem_result($site, $la, "first_choice_boxFive$j", $tem, $coms_conect);
                                                                                    if ($first_choice_boxFive['pic_adress'] > "") {?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_boxFive<?= $j ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_boxFive"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="" data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_boxFive col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_boxFive_subcat_val<?= $j ?>"
                                                                                                               name="first_choice_boxFive_subcat_val<?= $j ?>"
                                                                                                               value="<?= $first_choice_boxFive['pic'] ?>">

                                                                                                        <select id="first_choice_boxFive_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_first_choice_boxFive_cat"
                                                                                                                name="first_choice_boxFive_cat<?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_boxFive['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_boxFive<?= $j ?>" class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_boxFive_new&id=" + $("#first_choice_boxFive_cat<?=$j?>").val() + "&value=" + $("#first_choice_boxFive_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_boxFive<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_boxFive_Fixed_selection_cat<?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_boxFive_Fixed_selection_cat<?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_boxFive['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>جدیدترین ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_boxFive['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>پربازدیدترین ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_boxFive['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>پربحث ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_boxFive_number<?= $j ?>"
                                                                                                               value="<?= $first_choice_boxFive["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_boxFive_number<?= $j ?>">
                                                                                                    </div>


                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $jcount = $j;
                                                                                ?>
                                                                                <input type="hidden" id="first_choice_boxFive_count"
                                                                                       name="first_choice_boxFive_count" value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_boxFive_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_boxFive').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_boxFive_new&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_boxFive<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_first_choice_boxFive').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_boxFive col-md-4 input-group"><input type="hidden" id="first_choice_boxFive_subcat_val' + i + '"  name="first_choice_boxFive_subcat_val' + i + '" value=""> <select id="first_choice_boxFive_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_boxFive_cat" name="first_choice_boxFive_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_boxFive' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_boxFive_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_boxFive_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_boxFive_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_boxFive_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_boxFive_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_boxFive' + id).remove();
                                                                                            $('#first_choice_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_first_choice_boxFive"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                            <!-- /section:download/download.link -->
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane opt_boxFive boxFive_option2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'second_choice_boxFive%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_boxFive; $j++) {
                                                                                    $second_choice_boxFive = get_tem_result($site, $la, "second_choice_boxFive$j", $tem, $coms_conect);
                                                                                    if ($second_choice_boxFive['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_boxFive<?= $j ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_boxFive"
                                                                                                   id="<?= $j ?>"
                                                                                                   for="family"><i class="fa fa-trash text-danger remove"
                                                                                                                   title="حذف" data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_boxFive col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_boxFive_subcat_val<?=$j?>"
                                                                                                               name="second_choice_boxFive_subcat_val<?=$j?>"
                                                                                                               value="<?= $second_choice_boxFive['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_boxFive_subcat_link<?=$j?>"
                                                                                                               name="second_choice_boxFive_subcat_link<?=$j?>"
                                                                                                               value="<?= $second_choice_boxFive['pic_adress'] ?>">

                                                                                                        <select id="second_choice_boxFive_cat<?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_boxFive_cat"
                                                                                                                name="second_choice_boxFive_cat<?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_boxFive['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_boxFive<?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_boxFive_content<?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_boxFive&id=" + $("#second_choice_boxFive_cat<?=$j?>").val() + "&value=" + $("#second_choice_boxFive_subcat_val<?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_boxFive<?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_boxFive_subcat_link<?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_boxFive_content&id=" + $("#second_choice_boxFive_subcat_val<?=$j?>").val() + "&value=" + $("#second_choice_boxFive_subcat_link<?=$j?>").val() + "&secend_value=" + $("#second_choice_boxFive_subcat_link<?=$j?>").val()+ "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_boxFive_content<?=$j?>').html(result);
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
                                                                                $jcount=$j;
                                                                                ?>
                                                                                <input type="hidden" id="second_choice_boxFive_count"
                                                                                       name="second_choice_boxFive_count" value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_boxFive_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_boxFive').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_boxFive&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_boxFive<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_boxFive_neshane").change(function () {
                                                                                        var j=$("#second_choice_boxFive_count").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_boxFive&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_boxFive'+j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_boxFive_neshane', function () {
                                                                                        var j=$("#second_choice_boxFive_count").val();
                                                                                        //  $(".second_choice_boxFive_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_boxFive_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_boxFive_content'+j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$j?>;
                                                                                        $('#add_second_choice_boxFive').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_boxFive col-md-3 input-group"><input type="hidden" id="second_choice_boxFive_subcat_val' + i + '"  name="second_choice_boxFive_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_boxFive_subcat_link' + i + '"  name="second_choice_boxFive_subcat_link' + i + '" value=""> <select id="second_choice_boxFive_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_boxFive_cat" name="second_choice_boxFive_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_boxFive' + i + '" class="col-md-3 input-group"></div><div id="second_choice_boxFive_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_boxFive_count').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_boxFive' + id).remove();
                                                                                            $('#second_choice_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_second_choice_boxFive"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_boxFive boxFive_option3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_boxFive = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_boxFive%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_boxFive; $x++) {
                                                                                    $third_choice_boxFive = get_tem_result($site, $la, "third_choice_boxFive$x", $tem, $coms_conect);

                                                                                    if ($third_choice_boxFive['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_boxFive<?= $x ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_boxFive"
                                                                                                   id="<?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="" data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_boxFive_title<?= $x ?>"
                                                                                                               value="<?= $third_choice_boxFive["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_boxFive_title<?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_boxFive_link<?= $x ?>"
                                                                                                               value="<?= $third_choice_boxFive["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_boxFive_link<?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_boxFive_pic_adress<?= $x ?>"
                                                                                                               value="<?=$third_choice_boxFive["pic_adress"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_boxFive_pic_adress<?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_boxFive_pic_adress<?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_boxFive<?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div  id="third_choice_boxFive_avatar7<?= $x ?>" orakuploader="on"></div>
                                                                            <input type="hidden" id="third_choice_boxFive_avatar7_link<?= $x ?>" name="third_choice_boxFive_avatar7_link<?= $x ?>" value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box" id="upload_type_third_choice_boxFive<?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <div class="input-group" id="image_show_third_choice_boxFive<?= $x ?>">
                                                                                                        <? $third_choice_boxFive = get_tem_result($site, $la, "third_choice_boxFive$x", $tem, $coms_conect);?>
                                                                                                        <a href="<?= $third_choice_boxFive["pic_adress"] ?>" class=" without-caption" >
                                                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $third_choice_boxFive["pic_adress"] ?>" alt="<?= $third_choice_boxFive["text"] ?>">
                                                                                                        </a>

                                                                                                    </div>

                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_boxFive_avatar7<?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_boxFive_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                                <input type="hidden" id="third_choice_boxFive_count"
                                                                                       name="third_choice_boxFive_count"
                                                                                       value="<?=--$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$x?>;

                                                                                        $('#add_third_choice_boxFive-ads').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_boxFive' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_boxFive" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_boxFive_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_boxFive_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_boxFive_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_boxFive_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="third_choice_boxFive_pic_adress' + i + '" value="" class="form-control" placeholder=" تصویر" name="third_choice_boxFive_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_boxFive_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_boxFive' + i + '" style="padding: 0px;"><div  id="third_choice_boxFive_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_boxFive_avatar7_link' + i + '" name="third_choice_boxFive_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_boxFive' + i + '" style="float:right;"></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_boxFive' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_boxFive_count').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_boxFive_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_boxFive_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_boxFive' + i + '').find("div").first().next().css('width','100px');
                                                                                            $('.input-group-addon.H_third_choice_boxFive' + i + '').find("div").first().next().find("div").first().css('float','right');
                                                                                            //    ---end orakuploader
                                                                                            i++;});
                                                                                        $(document).on('click', '.del_third_choice_boxFive', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_boxFive_count').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_boxFive' + id).remove();
                                                                                            $('#third_choice_boxFive_count').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_third_choice_boxFive-ads"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                $(function(){
                                                                    var val = $("[name='ValSelectActive_boxFive_title']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_boxFive"]', function(){
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_boxFive_title"]').val(val);
                                                                        toggleForm(val);
                                                                    });
                                                                    function toggleForm(val){
                                                                        $('.opt_boxFive').hide();
                                                                        $('.boxFive_option'+val).show();

                                                                        //console.log($('.boxFive_option'+val));
                                                                    }
                                                                });

                                                            </script>

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
                                                                                                   id="boxFive_pic"
                                                                                                   value="<?= $boxFive["pic"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="عنوان دکمه"
                                                                                                   name="boxFive_pic">
                                                                                        </div>
                                                                                        <div class="col-md-6 input-group">
                                                                                            <input type="text"
                                                                                                   id="boxFive_link"
                                                                                                   value="<?= $boxFive["link"] ?>"
                                                                                                   class="form-control"
                                                                                                   placeholder="لینک دکمه"
                                                                                                   name="boxFive_link">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </center>
                                                </div>
                                                <!-----------------------------------------باکس ششم ---------------------------------------------------->
                                                <div id="content6" class="bhoechie-tab-content H2 ">
                                                    <center>
                                                        <? $boxSix = get_tem_result($site, $la, "boxSix", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <div class="form-group col-md-12">
                                                                <div class="col-md-6 input-group">
                                                                    <label class="col-md-2 control-label" for="family">نمایش </label>
                                                                    <input value="1"
                                                                           type="checkbox" <? if ($boxSix['pic_adress'] == 1) echo 'checked' ?>
                                                                           class="ace ace-switch ace-switch-6 "
                                                                           name="boxSix_pic_adress"
                                                                           style="direction: rtl;"><span class="lbl"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxSix_title"
                                                                           value="<?= $boxSix['title'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">جمله </label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" class="form-control" name="boxSix_text"
                                                                           value="<?= $boxSix['text'] ?>" style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h5 class="area" style="text-align: center;color: red; font-family: IRANSans">« تعداد مورد نیاز: 6 »</h5>
                                                        <div class="tab-pane">
                                                            <div class="page-content-area">
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <div class="col-md-12">
                                                                            <?
                                                                            $count1_box_six_img = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'box_six_img%' ", $coms_conect);
                                                                            for ($x = 1; $x <= $count1_box_six_img; $x++) {
                                                                                $box_six_img = get_tem_result($site, $la, "box_six_img$x", $tem, $coms_conect);
                                                                                if ($box_six_img['text'] > "") {
                                                                                    ?>
                                                                                    <div id="div_mother_third_choicedel_box_six_img<?= $x ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del_box_six_img"
                                                                                               id="<?= $x ?>"
                                                                                               for="family"><i
                                                                                                        class="fa fa-trash text-danger remove"
                                                                                                        title="" data-original-title="حذف"></i>

                                                                                            </a>

                                                                                            <div class="form-group col-md-11">

                                                                                                <div class="col-md-3 input-group">
                                                                                                    <input type="text"
                                                                                                           id="box_six_img_text<?= $x ?>"
                                                                                                           value="<?= $box_six_img["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="box_six_img_text<?= $x ?>">
                                                                                                </div>



                                                                                                <div class="col-md-7 input-group">
                                                                                                    <input type="text"
                                                                                                           id="box_six_img_pic<?= $x ?>"
                                                                                                           value="<?=$box_six_img["pic_adress"]?>"

                                                                                                           class="form-control"
                                                                                                           placeholder=" تصویر"
                                                                                                           name="box_six_img_pic<?= $x ?>"
                                                                                                           style="direction: ltr;">
                                                                                                    <span class="input-group-addon"
                                                                                                          style="padding: 0px;"><a
                                                                                                                href="/filemanager/dialog.php?type=2&amp;field_id=box_six_img_pic<?= $x ?>"
                                                                                                                class="btn btn-success iframe-btn"
                                                                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                    class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                    <span class="input-group-addon H_neshane1 H_box_six_img<?= $x ?>"
                                                                                                          style="padding: 0px;">
                                                                                <div  id="box_six_img_avatar7<?= $x ?>" orakuploader="on"></div>
                                                                            <input type="hidden" id="box_six_img_avatar7_link<?= $x ?>" name="box_six_img_avatar7_link<?= $x ?>" value="<? ?>">
                                                        </span>
                                                                                                </div>
                                                                                                <div class="ui-sortable red box" id="upload_type_box_six_img<?= $x ?>"
                                                                                                     style="float:right;">
                                                                                                </div>
                                                                                                <div class=" col-md-1 input-group" id="image_show_box_six_img<?= $x ?>">
                                                                                                    <a href="<?= $box_six_img["pic_adress"] ?>" class=" without-caption" >
                                                                                                        <img width="33" height="33" class="H_cursor_zoom" src="<?= $box_six_img["pic_adress"] ?>" alt="<?= $box_six_img["text"] ?>">
                                                                                                    </a>

                                                                                                </div>

                                                                                                <script type="text/javascript">
                                                                                                    $(document).ready(function () {
                                                                                                        $('#box_six_img_avatar7<?=$x?>').orakuploader({
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

                                                                                                        $('#box_six_img_avatar7<?= $x ?>').html("<?=$pic_str?>");
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
                                                                            <input type="hidden" id="box_six_img_count"
                                                                                   name="box_six_img_count"
                                                                                   value="<?=--$xcount_mahsol; ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$x?>;

                                                                                    $('#add_box_six_img-ads').on("click", function () {
                                                                                        var someText = '<div id="div_mother_third_choicedel_box_six_img' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_box_six_img" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="box_six_img_text' + i + '" value="" class="form-control" placeholder="عنوان" name="box_six_img_text' + i + '" ></div> <div class="col-md-7 input-group"> <input type="text" id="box_six_img_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="box_six_img_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=box_six_img_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_box_six_img' + i + '" style="padding: 0px;"><div  id="box_six_img_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="box_six_img_avatar7_link' + i + '" name="box_six_img_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_box_six_img' + i + '" style="float:right;"></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#div_mother_third_choicedel_box_six_img' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#box_six_img_count').val(i);

                                                                                        //--------orakuploader
                                                                                        $('#box_six_img_avatar7' + i + '').orakuploader({
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

                                                                                        $('#box_six_img_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                        $('.input-group-addon.H_box_six_img' + i + '').find("div").first().next().css('width','100px');
                                                                                        $('.input-group-addon.H_box_six_img' + i + '').find("div").first().next().find("div").first().css('float','right');
                                                                                        //    ---end orakuploader
                                                                                        i++;});
                                                                                    $(document).on('click', '.del_box_six_img', function () {
                                                                                        var id = '';
                                                                                        var k = $('#box_six_img_count').val();
                                                                                        k--
                                                                                        id = $(this).attr('id');
                                                                                        $('#div_mother_third_choicedel_box_six_img' + id).remove();
                                                                                        $('#box_six_img_count').val(k);
                                                                                    });
                                                                                });


                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_box_six_img-ads"><i
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
                                    <!-----------------------------------------------------footer---------------------------------------------->
                                    <div class="z-content tab3" style="position: absolute;" >
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
                                                <div id="footer1" class="bhoechie-tab-content H3 active">
                                                    <center>
                                                        <? $footer_column1 = get_tem_result($site, $la, "footer_column1", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان ستون اول</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $footer_column1['text'] ?>"
                                                                           class="form-control"
                                                                           name="footer_column1_text"
                                                                           style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
                                                                <div class="page-body" style="margin-top: 25px;">
                                                                    <fieldset>
                                                                        <!-- #section:download/download.link -->
                                                                        <div class="col-md-12">
                                                                            <? $one_column_links = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'one_column_footer_links%' ", $coms_conect);
                                                                            for ($k = 1; $k <= $one_column_links; $k++) {
                                                                                $one_column_footer_links = get_tem_result($site, $la, "one_column_footer_links$k", $tem, $coms_conect);
                                                                                if ($one_column_footer_links['title'] > "") {
                                                                                    ?>

                                                                                    <div id="ads_one_column_footer_links<?= $k ?>" class="seyed"
                                                                                         style="opacity: 1;">
                                                                                        <div class="form-group">
                                                                                            <a class="col-md-1 control-label del-ads_one_column_footer_links"
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
                                                                                                           id="one_column_links_title<?= $k ?>"
                                                                                                           value="<?= $one_column_footer_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="one_column_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="one_column_links_link<?= $k ?>"
                                                                                                           value="<?= $one_column_footer_links["link"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="لینک"
                                                                                                           name="one_column_links_link<?= $k ?>">
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                    <?
                                                                                }
                                                                            }
                                                                            $count_one_column_footer_links = $k;
                                                                            ?>
                                                                            <input type="hidden" id="one_column_links_count"
                                                                                   name="one_column_links_count"
                                                                                   value="<?= --$count_one_column_footer_links ?>">

                                                                            <script>
                                                                                $(document).ready(function () {
                                                                                    var i = <?=$k?>;

                                                                                    $('#add_one_column_footer-ads1').on("click", function () {
                                                                                        var someText = '<div id="ads_one_column_footer_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_one_column_footer_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان #' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="one_column_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="one_column_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="one_column_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="one_column_links_link' + i + '"></div></div></div></div>';
                                                                                        $(this).before(someText);
                                                                                        $('#ads_one_column_footer_links' + i + '').fadeTo('slow', 0.3, function () {
                                                                                            $(this).css('background', '');
                                                                                        }).fadeTo('slow', 1);
                                                                                        $('#one_column_links_count').val(i);
                                                                                        i++;
                                                                                    });
                                                                                    $(document).on('click', '.del-ads_one_column_footer_links', function () {
                                                                                        var id = '';
                                                                                        var p = $('#one_column_links_count').val();
                                                                                        p--
                                                                                        id = $(this).attr('id');
                                                                                        $('#ads_one_column_footer_links' + id).remove();
                                                                                        $('#one_column_links_count').val(p);
                                                                                    });
                                                                                });

                                                                            </script>
                                                                            <a class="btn btn-success block" id="add_one_column_footer-ads1"><i
                                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                        class="fa fa-plus"></i>افزودن لینک</a>
                                                                            </br>
                                                                        </div>
                                                                        <!-- /section:download/download.link -->
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <? $footer_column2 = get_tem_result($site, $la, "footer_column2", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان ستون دوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $footer_column2['title'] ?>"
                                                                           class="form-control"
                                                                           name="footer_column2_title"
                                                                           style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div  class="tab-pane">
                                                            <div class="page-content-area" >
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
                                                                                                <?= $k ?></label>
                                                                                            <div class="form-group col-md-9">

                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="two_column_links_title<?= $k ?>"
                                                                                                           value="<?= $two_column_footer_links["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان"
                                                                                                           name="two_column_links_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-6 input-group">
                                                                                                    <input type="text"
                                                                                                           id="two_column_links_link<?= $k ?>"
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
                                                                                        var someText = '<div id="ads_two_column_footer_links' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_two_column_footer_links" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان #' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="two_column_links_title' + i + '" value="" class="form-control" placeholder="عنوان" name="two_column_links_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="two_column_links_link' + i + '" value="" class="form-control" placeholder="لینک" name="two_column_links_link' + i + '"></div></div></div></div>';
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
                                                        <hr>

                                                        <? $footer_column3 = get_tem_result($site, $la, "footer_column3", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان ستون سوم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $footer_column3['title'] ?>"
                                                                           class="form-control"
                                                                           name="footer_column3_title"
                                                                           style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">آدرس</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $footer_column3['text'] ?>"
                                                                           class="form-control"
                                                                           name="footer_column3_text"
                                                                           style="direction: rtl;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <hr>

                                                        <? $footer_column4 = get_tem_result($site, $la, "footer_column4", $tem, $coms_conect); ?>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label" for="family">عنوان ستون چهارم</label>
                                                            <div class="form-group col-md-9">
                                                                <div class="col-md-12 input-group">
                                                                    <input type="text" value="<?= $footer_column4['title'] ?>"
                                                                           class="form-control"
                                                                           name="footer_column4_title"
                                                                           style="direction: rtl;">
                                                                </div>
                                                            </div>
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
                                                                                                و لینک <?= $k ?></label>
                                                                                            <div class="form-group col-md-9">
                                                                                                <div class="col-md-4 input-group">
                                                                                                    <input type="text"
                                                                                                           id="footer_social-title-ads<?= $k ?>"
                                                                                                           value="<?= $footer_social["title"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان انگلیسی"
                                                                                                           name="footer_social_networks_title<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-4 input-group">
                                                                                                    <input type="text"
                                                                                                           id="footer_social-title-ads<?= $k ?>"
                                                                                                           value="<?= $footer_social["text"] ?>"
                                                                                                           class="form-control"
                                                                                                           placeholder="عنوان فارسی"
                                                                                                           name="footer_social_networks_text<?= $k ?>">
                                                                                                </div>
                                                                                                <div class="col-md-4 input-group">
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
                                                                                        var someText = '<div id="ads_footer_social' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_footer_social" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-4 input-group"><input type="text" id="footer_social_networks_title' + i + '" value="" class="form-control" placeholder=" عنوان انگلیسی" name="footer_social_networks_title' + i + '" ></div><div class="col-md-4 input-group"><input type="text" id="footer_social_networks_text' + i + '" value="" class="form-control" placeholder="عنوان فارسی" name="footer_social_networks_text' + i + '" ></div><div class="col-md-4 input-group"><input type="text" id="footer_social_networks_link' + i + '" value="" class="form-control" placeholder="لینک" name="footer_social_networks_link' + i + '" ></div></div></div></div>';
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

                                                    </center>
                                                </div>
                                                <!-------------------------------------------------------- درج ایمیل ------------------------------------------------------>
                                                <div id="footer2" class="bhoechie-tab-content H3">
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
                                                            <label class="col-md-3 control-label" for="family">عنوان</label>
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
                                                <div id="footer3" class="bhoechie-tab-content H3">
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
                                    <!-----------------------------------------------------باکس سوم---------------------------------------------->
                                    <div class="z-content tab4" style="position: absolute;" >
                                        <div class="z-content-inner">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu H4">
                                                <div class="list-group">
                                                    <? $setting_tab_name = get_tem_result($site, $la, "setting_tab_name", $tem, $coms_conect); ?>
                                                    <a id="H_input_rename_setting_tab_name" href="#" class="list-group-item  active text-center ">
                                                        <span class="temp"><?= $setting_tab_name['text'] ?>تنظیمات</span>
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

                                                    <label class="col-md-12 control-label" for="family">انتخاب نام تب ها</label>
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

                                                                                            <div class="col-md-10 input-group">
                                                                                                <input type="text"
                                                                                                       id="tab_name_text<?= $x ?>"
                                                                                                       value="<?= $tab_name["text"] ?>"
                                                                                                       class="form-control"
                                                                                                       placeholder="عنوان"
                                                                                                       name="tab_name_text<?= $x ?>">
                                                                                            </div>

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
                                                                                    var someText = '<div id="div_mother_third_choicedel_tab_name' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_tab_name" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-10 input-group"><input type="text" id="tab_name_text' + i + '" value="" class="form-control" placeholder="عنوان" name="tab_name_text' + i + '" ></div> </div></div></div>';
                                                                                    $(this).before(someText);
                                                                                    $('#div_mother_third_choicedel_tab_name' + i + '').fadeTo('slow', 0.3, function () {
                                                                                        $(this).css('background', '');
                                                                                    }).fadeTo('slow', 1);
                                                                                    $('#tab_name_count').val(i);

                                                                                    i++;});
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
                                                    <div id="tabbb<?=$y?>" class="bhoechie-tab-content H4 ">
                                                        <? $Onvan_tabs = get_tem_result($site, $la, "Onvan_tabs$y", $tem, $coms_conect); ?>
                                                        <label class="col-md-2 control-label" for="family">عنوان  <?=$y?></label>
                                                        <div class="col-md-10 input-group">
                                                            <input type="text"
                                                                   id="Onvan_tabs<?= $y ?>"
                                                                   value="<?= $Onvan_tabs["title"] ?>"
                                                                   class="form-control"
                                                                   placeholder="عنوان"
                                                                   name="Onvan_tabs<?= $y ?>">
                                                        </div>
                                                        <br>
                                                        <label class="col-md-2 control-label" for="family">متن</label>
                                                        <div class="col-md-10 input-group">
                                                            <textarea rows="4" cols="50" type="text"
                                                                      id="Onvan_tabs_text<?= $y ?>"
                                                                      class="form-control"
                                                                      placeholder="متن"
                                                                      name="Onvan_tabs_text<?= $y ?>"><?=$Onvan_tabs["text"] ?>
                                                            </textarea>
                                                        </div>

                                                            <label class="col-md-2 control-label" for="family">تصویر </label>
                                                            <div class="col-md-10 input-group">
                                                                <div class="col-md-12 input-group">
                                                                    <div class="col-md-5 input-group">
                                                                        <input type="text"
                                                                               id="Onvan_tabs_pic_adress<?= $y ?>"
                                                                               value="<?=$Onvan_tabs["pic_adress"]?>"
                                                                               class="form-control"
                                                                               placeholder=" تصویر"
                                                                               name="Onvan_tabs_pic_adress<?= $y ?>"
                                                                               style="direction: ltr;">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><a
                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=Onvan_tabs_pic_adress<?= $y ?>"
                                                                                    class="btn btn-success iframe-btn"
                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                                        <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                                              style="padding: 0px;">
                                                                                <div  id="Onvan_tabs_pic_adress_avatar_orak<?= $y ?>" orakuploader="on"></div>
                                                                            </span>
                                                                    </div>
                                                                    <div class="ui-sortable red box" id="upload_type_Onvan_tabs_pic_adress<?= $y ?>"
                                                                         style="float:right;">
                                                                    </div>
                                                                    <div class="col-md-1 input-group" id="image_show_Onvan_tabs_pic_adress<?= $y ?>">

                                                                        <a href="<?= $Onvan_tabs["pic_adress"] ?>" class=" without-caption" >
                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $Onvan_tabs["pic_adress"] ?>" alt="<?= $Onvan_tabs["pic_adress"] ?>">
                                                                        </a>

                                                                    </div>

                                                                    <script type="text/javascript">
                                                                        $(document).ready(function () {
                                                                            $('#Onvan_tabs_pic_adress_avatar_orak<?= $y ?>').orakuploader({
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

                                                                            $('#Onvan_tabs_pic_adress_avatar_orak<?= $y ?>').html("<?=$pic_str?>");
                                                                        });
                                                                    </script>
                                                                </div>
                                                            </div>

                                                        <br>
                                                        <hr style=" transform: translateY(30px); border: inset;border-top: 1px solid #000;">
                                                        <br>

                                                        <? $ValSelectActive_BoxThree_Tab = get_tem_result($site, $la, "ValSelectActive_BoxThree_Tab$y", $tem, $coms_conect); ?>
                                                        <div class="col-md-6 input-group mt30_r180" style="margin-bottom: 40px">
                                                            <select id="select_type_BoxThree_Tab<?=$y?>"
                                                                    data-selectid=""
                                                                    class="form-control H_select_show_BoxThree_Tab"
                                                                    name="select_type_BoxThree_Tab<?=$y?>">

                                                                <option  <?if ($ValSelectActive_BoxThree_Tab["title"]==1){echo 'selected';}?>  value='1'>انتخاب از ماژول</option>
                                                                <option   <?if ($ValSelectActive_BoxThree_Tab["title"]==2){echo 'selected';}?> value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                                                <option <?if ($ValSelectActive_BoxThree_Tab["title"]==3){echo 'selected';}?> value='3'> اختصاصی</option>
                                                            </select>

                                                        </div>
                                                        <br>
                                                        <div style="clear: both">
                                                            <input name="ValSelectActive_BoxThree_Tab_title<?=$y?>" type="hidden" value="<?= $ValSelectActive_BoxThree_Tab["title"] ?>">

                                                            <div  class="tab-pane opt_BoxThree_Tab<?=$y?> BoxThree_Tab_option<?=$y?>1">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?
                                                                                $count_first_choice_BoxThree_Tab = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'first_choice_BoxThree_Tab$y%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_first_choice_BoxThree_Tab; $j++) {
                                                                                    $first_choice_BoxThree_Tab = get_tem_result($site, $la, "first_choice_BoxThree_Tab$y$j", $tem, $coms_conect);
                                                                                    if ($first_choice_BoxThree_Tab['pic_adress'] > "") {?>
                                                                                        <div id="div_mother_first_choicedel_first_choice_BoxThree_Tab<?=$y?><?= $j ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_first_choice_BoxThree_Tab"
                                                                                                   id="<?=$y?><?= $j ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="" data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_first_choice_BoxThree_Tab col-md-4 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="first_choice_BoxThree_Tab_subcat_val<?=$y?><?= $j ?>"
                                                                                                               name="first_choice_BoxThree_Tab_subcat_val<?=$y?><?= $j ?>"
                                                                                                               value="<?= $first_choice_BoxThree_Tab['pic'] ?>">

                                                                                                        <select id="first_choice_BoxThree_Tab_cat<?=$y?><?= $j ?>"
                                                                                                                data-selectid="<?=$y?><?= $j ?>"
                                                                                                                class="form-control H_first_choice_BoxThree_Tab_cat"
                                                                                                                name="first_choice_BoxThree_Tab_cat<?=$y?><?= $j ?>">
                                                                                                            <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result1 = $coms_conect->query($sql1);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row = $result1->fetch_assoc()) {
                                                                                                                $str = '';
                                                                                                                if ($row['id'] == $first_choice_BoxThree_Tab['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="first_choice_BoxThree_Tab<?=$y?><?= $j ?>" class="col-md-4 input-group">

                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=first_choice_BoxThree_Tab&id=" + $("#first_choice_BoxThree_Tab_cat<?=$y?><?=$j?>").val() + "&value=" + $("#first_choice_BoxThree_Tab_subcat_val<?=$y?><?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?=$y?><?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#first_choice_BoxThree_Tab<?=$y?><?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                    </script>
                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <select id="first_choice_BoxThree_Tab_Fixed_selection_cat<?=$y?><?= $j ?>"
                                                                                                                data-selectid="1"
                                                                                                                class="form-control modules_class"
                                                                                                                name="first_choice_BoxThree_Tab_Fixed_selection_cat<?=$y?><?= $j ?>">
                                                                                                            <option <?
                                                                                                            if ($first_choice_BoxThree_Tab['text'] == 0) echo 'selected'; ?>
                                                                                                                    value='0'>جدیدترین ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_BoxThree_Tab['text'] == 1) echo 'selected'; ?>
                                                                                                                    value='1'>پربازدیدترین ها
                                                                                                            </option>
                                                                                                            <option <?
                                                                                                            if ($first_choice_BoxThree_Tab['text'] == 2) echo 'selected'; ?>
                                                                                                                    value='2'>پربحث ترین ها
                                                                                                            </option>
                                                                                                        </select>

                                                                                                    </div>
                                                                                                    <div class="col-md-1 input-group">
                                                                                                        <input type="text"
                                                                                                               id="first_choice_BoxThree_Tab_number<?=$y?><?= $j ?>"
                                                                                                               value="<?= $first_choice_BoxThree_Tab["pic_adress"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="تعداد"
                                                                                                               name="first_choice_BoxThree_Tab_number<?=$y?><?= $j ?>">
                                                                                                    </div>


                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        <?
                                                                                    }
                                                                                }
                                                                                $jcount = $j;
                                                                                ?>
                                                                                <input type="hidden" id="first_choice_BoxThree_Tab_count<?=$y?>"
                                                                                       name="first_choice_BoxThree_Tab_count<?=$y?>" value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_first_choice_BoxThree_Tab_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_first_choice_BoxThree_Tab').next();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=first_choice_BoxThree_Tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#first_choice_BoxThree_Tab<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });

                                                                                    });

                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$y?><?=$j?>;
                                                                                        $('#add_first_choice_BoxThree_Tab<?=$y?>').on("click", function () {

                                                                                            var someText = '<div id="div_mother_first_choicedel_first_choice_BoxThree_Tab' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_first_choice_BoxThree_Tab" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_first_choice_BoxThree_Tab col-md-4 input-group"><input type="hidden" id="first_choice_BoxThree_Tab_subcat_val' + i + '"  name="first_choice_BoxThree_Tab_subcat_val' + i + '" value=""> <select id="first_choice_BoxThree_Tab_cat' + i + '" data-selectid="' + i + '"  class="form-control H_first_choice_BoxThree_Tab_cat" name="first_choice_BoxThree_Tab_cat' + i + '"><? $sql1 = "SELECT name,id from new_modules  a    where view=1"; $result1 = $coms_conect->query($sql1);echo '<option value="0">انتخاب کنید</option>';while ($row = $result1->fetch_assoc()) {

                                                                                                echo "<option  value={$row['id']}>{$row['name']}</option>";
                                                                                            }?> </select></div><div id="first_choice_BoxThree_Tab' + i + '" class="col-md-4 input-group"> </div><div class="col-md-3 input-group"><select id="first_choice_BoxThree_Tab_Fixed_selection_cat' + i + '" data-selectid="1" class="form-control modules_class" name="first_choice_BoxThree_Tab_Fixed_selection_cat' + i + '"> <option value="0">جدیدترین ها</option>  <option value="1">پربازدیدترین ها</option> <option value="2">پربحث ترین ها</option> </select></div> <div class="col-md-1 input-group"><input type="text" id="first_choice_BoxThree_Tab_number' + i + '" value="" class="form-control" placeholder="تعداد" name="first_choice_BoxThree_Tab_number' + i + '" ></div></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_first_choicedel_first_choice_BoxThree_Tab' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#first_choice_BoxThree_Tab_count<?=$y?>').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_first_choice_BoxThree_Tab', function () {
                                                                                            var id = '';
                                                                                            var k = $('#first_choice_BoxThree_Tab_count<?=$y?>').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_first_choicedel_first_choice_BoxThree_Tab' + id).remove();
                                                                                            $('#first_choice_BoxThree_Tab_count<?=$y?>').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_first_choice_BoxThree_Tab<?=$y?>"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                            <!-- /section:download/download.link -->
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane opt_BoxThree_Tab<?=$y?> BoxThree_Tab_option<?=$y?>2">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <? $count_second_choice_BoxThree_Tab = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'second_choice_BoxThree_Tab$y%' ", $coms_conect);
                                                                                for ($j = 1; $j <= $count_second_choice_BoxThree_Tab; $j++) {
                                                                                    $second_choice_BoxThree_Tab = get_tem_result($site, $la, "second_choice_BoxThree_Tab$y$j", $tem, $coms_conect);
                                                                                    if ($second_choice_BoxThree_Tab['pic_adress'] > "") {
                                                                                        ?>

                                                                                        <div id="div_mother_second_choicedel_second_choice_BoxThree_Tab<?=$y?><?= $j ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_second_choice_BoxThree_Tab"
                                                                                                   id="<?=$y?><?= $j ?>"
                                                                                                   for="family"><i class="fa fa-trash text-danger remove"
                                                                                                                   title="حذف" data-original-title="حذف"></i>
                                                                                                </a>
                                                                                                <div class="form-group col-md-12">

                                                                                                    <div class=" H_second_choice_BoxThree_Tab col-md-3 input-group">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_BoxThree_Tab_subcat_val<?=$y?><?=$j?>"
                                                                                                               name="second_choice_BoxThree_Tab_subcat_val<?=$y?><?=$j?>"
                                                                                                               value="<?= $second_choice_BoxThree_Tab['pic'] ?>">
                                                                                                        <input type="hidden"
                                                                                                               id="second_choice_BoxThree_Tab_subcat_link<?=$y?><?=$j?>"
                                                                                                               name="second_choice_BoxThree_Tab_subcat_link<?=$y?><?=$j?>"
                                                                                                               value="<?= $second_choice_BoxThree_Tab['pic_adress'] ?>">

                                                                                                        <select id="second_choice_BoxThree_Tab_cat<?=$y?><?= $j ?>"
                                                                                                                data-selectid="<?= $j ?>"
                                                                                                                class="form-control H_second_choice_BoxThree_Tab_cat"
                                                                                                                name="second_choice_BoxThree_Tab_cat<?=$y?><?= $j ?>">
                                                                                                            <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                                            $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                                            echo "<option value='0'>انتخاب کنید</option>";
                                                                                                            while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                                                $str = '';

                                                                                                                if ($row0['id'] == $second_choice_BoxThree_Tab['link'])

                                                                                                                    $str = 'selected';
                                                                                                                echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                                            }
                                                                                                            ?>
                                                                                                        </select>
                                                                                                    </div>

                                                                                                    <div id="second_choice_BoxThree_Tab<?=$y?><?= $j ?>"
                                                                                                         class="col-md-3 input-group">
                                                                                                    </div>

                                                                                                    <div id="second_choice_BoxThree_Tab_content<?=$y?><?= $j ?>"
                                                                                                         class="col-md-6 input-group">
                                                                                                    </div>

                                                                                                    <script>
                                                                                                        $(document).ready(function () {
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_BoxThree_Tab&id=" + $("#second_choice_BoxThree_Tab_cat<?=$y?><?=$j?>").val() + "&value=" + $("#second_choice_BoxThree_Tab_subcat_val<?=$y?><?=$j?>").val() + "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?=$y?><?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_BoxThree_Tab<?=$y?><?=$j?>').html(result);
                                                                                                                }
                                                                                                            });
                                                                                                        });
                                                                                                        $(document).ready(function () {
                                                                                                            //   alert( $("#second_choice_BoxThree_Tab_subcat_link<?=$y?><?=$j?>").val());
                                                                                                            $.ajax({
                                                                                                                type: 'POST',
                                                                                                                url: 'New_ajax.php',
                                                                                                                data: "action=second_choice_BoxThree_Tab_content&id=" + $("#second_choice_BoxThree_Tab_subcat_val<?=$y?><?=$j?>").val() + "&value=" + $("#second_choice_BoxThree_Tab_subcat_link<?=$y?><?=$j?>").val() + "&secend_value=" + $("#second_choice_BoxThree_Tab_subcat_link<?=$y?><?=$j?>").val()+ "&field_nmae=" + '<?=$la?>' + "&user_id=" + '<?=$y?><?= $j ?>',
                                                                                                                success: function (result) {
                                                                                                                    $('#second_choice_BoxThree_Tab_content<?=$y?><?=$j?>').html(result);
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
                                                                                $jcount=$j;
                                                                                ?>
                                                                                <input type="hidden" id="second_choice_BoxThree_Tab_count<?=$y?>"
                                                                                       name="second_choice_BoxThree_Tab_count<?=$y?>" value="<?= --$jcount; ?>">

                                                                                <script>

                                                                                    $(document).on('change', '.H_second_choice_BoxThree_Tab_cat', function () {
                                                                                        var thisElement = $(this).parents('.H_second_choice_BoxThree_Tab').next();

                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_BoxThree_Tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                                            success: function (result) {
                                                                                                //$('#second_choice_BoxThree_Tab<?//=$j?>//').html(result);
                                                                                                thisElement.empty();
                                                                                                thisElement.append(result);
                                                                                            }
                                                                                        });
                                                                                    });

                                                                                    $(".second_choice_BoxThree_Tab_neshane").change(function () {
                                                                                        var j=$("#second_choice_BoxThree_Tab_count<?=$y?>").val();
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_BoxThree_Tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_BoxThree_Tab'+j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });
                                                                                    $(document).on('change', '.second_choice_BoxThree_Tab_neshane', function () {
                                                                                        var j=$("#second_choice_BoxThree_Tab_count<?=$y?>").val();
                                                                                        //  $(".second_choice_BoxThree_Tab_neshane").change(function () {
                                                                                        $.ajax({
                                                                                            type: 'POST',
                                                                                            url: 'New_ajax.php',
                                                                                            data: "action=second_choice_BoxThree_Tab_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + j,
                                                                                            success: function (result) {
                                                                                                $('#second_choice_BoxThree_Tab_content'+j).html(result);
                                                                                            }
                                                                                        });
                                                                                    });


                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$y?><?=$j?>;
                                                                                        $('#add_second_choice_BoxThree_Tab<?=$y?>').on("click", function () {

                                                                                            var someText = '<div id="div_mother_second_choicedel_second_choice_BoxThree_Tab' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_second_choice_BoxThree_Tab" id="' + i + '" for="family"><i class="fa fa-trash text-danger remove" title="حذف" data-original-title="حذف" style="font-size:20px;"></i></a><div class="form-group col-md-12"><div class=" H_second_choice_BoxThree_Tab col-md-3 input-group"><input type="hidden" id="second_choice_BoxThree_Tab_subcat_val' + i + '"  name="second_choice_BoxThree_Tab_subcat_val' + i + '" value=""> <input type="hidden" id="second_choice_BoxThree_Tab_subcat_link' + i + '"  name="second_choice_BoxThree_Tab_subcat_link' + i + '" value=""> <select id="second_choice_BoxThree_Tab_cat' + i + '" data-selectid="' + i + '"  class="form-control H_second_choice_BoxThree_Tab_cat" name="second_choice_BoxThree_Tab_cat' + i + '"><? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1"; $result_under_slideshow = $coms_conect->query($sql_under_slideshow);echo '<option value="0">انتخاب کنید</option>';while ($row0 = $result_under_slideshow->fetch_assoc()) {

                                                                                                echo "<option  value={$row0['id']}>{$row0['name']}</option>";
                                                                                            }?> </select></div><div id="second_choice_BoxThree_Tab' + i + '" class="col-md-3 input-group"></div><div id="second_choice_BoxThree_Tab_content' + i + '" class="col-md-6 input-group"></div> </div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_second_choicedel_second_choice_BoxThree_Tab' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#second_choice_BoxThree_Tab_count<?=$y?>').val(i);
                                                                                            i++;
                                                                                        });
                                                                                        $(document).on('click', '.del_second_choice_BoxThree_Tab', function () {
                                                                                            var id = '';
                                                                                            var k = $('#second_choice_BoxThree_Tab_count<?=$y?>').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_second_choicedel_second_choice_BoxThree_Tab' + id).remove();
                                                                                            $('#second_choice_BoxThree_Tab_count<?=$y?>').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_second_choice_BoxThree_Tab<?=$y?>"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="opt_BoxThree_Tab<?=$y?> BoxThree_Tab_option<?=$y?>3">
                                                                <div class="page-content-area">
                                                                    <div class="page-body" style="margin-top: 25px;">
                                                                        <fieldset>
                                                                            <div class="col-md-12">
                                                                                <?

                                                                                $count_third_choice_BoxThree_Tab = get_result("select count(id) from new_tem_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_BoxThree_Tab$y%' ", $coms_conect);

                                                                                for ($x = 1; $x <= $count_third_choice_BoxThree_Tab; $x++) {
                                                                                    $third_choice_BoxThree_Tab = get_tem_result($site, $la, "third_choice_BoxThree_Tab$y$x", $tem, $coms_conect);

                                                                                    if ($third_choice_BoxThree_Tab['title'] > "") {

                                                                                        ?>
                                                                                        <div id="div_mother_third_choice_BoxThree_Tab<?=$y?><?= $x ?>" class="seyed"
                                                                                             style="opacity: 1;">
                                                                                            <div class="form-group">
                                                                                                <a class="col-md-1 control-label del_third_choice_BoxThree_Tab"
                                                                                                   id="<?=$y?><?= $x ?>"
                                                                                                   for="family"><i
                                                                                                            class="fa fa-trash text-danger remove"
                                                                                                            title="" data-original-title="حذف"></i>

                                                                                                </a>

                                                                                                <div class="form-group col-md-11">

                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_BoxThree_Tab_title<?=$y?><?= $x ?>"
                                                                                                               value="<?= $third_choice_BoxThree_Tab["title"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="عنوان"
                                                                                                               name="third_choice_BoxThree_Tab_title<?=$y?><?= $x ?>">
                                                                                                    </div>


                                                                                                    <div class="col-md-3 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_BoxThree_Tab_link<?=$y?><?= $x ?>"
                                                                                                               value="<?= $third_choice_BoxThree_Tab["link"] ?>"
                                                                                                               class="form-control"
                                                                                                               placeholder="لینک"
                                                                                                               name="third_choice_BoxThree_Tab_link<?=$y?><?= $x ?>">
                                                                                                    </div>

                                                                                                    <div class="col-md-5 input-group">
                                                                                                        <input type="text"
                                                                                                               id="third_choice_BoxThree_Tab_pic_adress<?=$y?><?= $x ?>"
                                                                                                               value="<?=$third_choice_BoxThree_Tab["pic_adress"]?>"
                                                                                                               class="form-control"
                                                                                                               placeholder=" تصویر"
                                                                                                               name="third_choice_BoxThree_Tab_pic_adress<?=$y?><?= $x ?>"
                                                                                                               style="direction: ltr;">
                                                                                                        <span class="input-group-addon"
                                                                                                              style="padding: 0px;"><a
                                                                                                                    href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_BoxThree_Tab_pic_adress<?=$y?><?= $x ?>"
                                                                                                                    class="btn btn-success iframe-btn"
                                                                                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                                                        class="addimg flaticon-add139"></span></a>
                                                        </span>
                                                                                                        <span class="input-group-addon H_neshane1 H_third_choice_BoxThree_Tab<?=$y?><?= $x ?>"
                                                                                                              style="padding: 0px;">
                                                                                <div  id="third_choice_BoxThree_Tab_avatar7<?=$y?><?= $x ?>" orakuploader="on"></div>
                                                                            <input type="hidden" id="third_choice_BoxThree_Tab_avatar7_link<?=$y?><?= $x ?>" name="third_choice_BoxThree_Tab_avatar7_link<?=$y?><?= $x ?>" value="<? ?>">
                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="ui-sortable red box" id="upload_type_third_choice_BoxThree_Tab<?=$y?><?= $x ?>"
                                                                                                         style="float:right;">
                                                                                                    </div>
                                                                                                    <div class="input-group" id="image_show_third_choice_BoxThree_Tab<?=$y?><?= $x ?>">
                                                                                                        <? $third_choice_BoxThree_Tab = get_tem_result($site, $la, "third_choice_BoxThree_Tab$y$x", $tem, $coms_conect);?>
                                                                                                        <a href="<?= $third_choice_BoxThree_Tab["pic_adress"] ?>" class=" without-caption" >
                                                                                                            <img width="33" height="33" class="H_cursor_zoom" src="<?= $third_choice_BoxThree_Tab["pic_adress"] ?>" alt="<?= $third_choice_BoxThree_Tab["text"] ?>">
                                                                                                        </a>

                                                                                                    </div>

                                                                                                    <script type="text/javascript">
                                                                                                        $(document).ready(function () {
                                                                                                            $('#third_choice_BoxThree_Tab_avatar7<?=$y?><?=$x?>').orakuploader({
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

                                                                                                            $('#third_choice_BoxThree_Tab_avatar7<?=$y?><?= $x ?>').html("<?=$pic_str?>");
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
                                                                                <input type="hidden" id="third_choice_BoxThree_Tab_count<?=$y?>"
                                                                                       name="third_choice_BoxThree_Tab_count<?=$y?>"
                                                                                       value="<?=--$xcount_mahsol; ?>">

                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        var i = <?=$y?><?=$x?>;

                                                                                        $('#add_third_choice_BoxThree_Tab-ads<?=$y?>').on("click", function () {
                                                                                            var someText = '<div id="div_mother_third_choice_BoxThree_Tab' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_third_choice_BoxThree_Tab" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-3 input-group"><input type="text" id="third_choice_BoxThree_Tab_title' + i + '" value="" class="form-control" placeholder="عنوان" name="third_choice_BoxThree_Tab_title' + i + '" ></div> <div class="col-md-3 input-group"><input type="text" id="third_choice_BoxThree_Tab_link' + i + '" value="" class="form-control" placeholder="لینک" name="third_choice_BoxThree_Tab_link' + i + '" ></div><div class="col-md-5 input-group"> <input type="text" id="third_choice_BoxThree_Tab_pic_adress' + i + '" value="" class="form-control" placeholder=" تصویر" name="third_choice_BoxThree_Tab_pic_adress' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_BoxThree_Tab_pic_adress' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add133"></span></a></span><span class="input-group-addon H_neshane1 H_third_choice_BoxThree_Tab' + i + '" style="padding: 0px;"><div  id="third_choice_BoxThree_Tab_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="third_choice_BoxThree_Tab_avatar7_link' + i + '" name="third_choice_BoxThree_Tab_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_third_choice_BoxThree_Tab' + i + '" style="float:right;"></div></div></div>';
                                                                                            $(this).before(someText);
                                                                                            $('#div_mother_third_choice_BoxThree_Tab' + i + '').fadeTo('slow', 0.3, function () {
                                                                                                $(this).css('background', '');
                                                                                            }).fadeTo('slow', 1);
                                                                                            $('#third_choice_BoxThree_Tab_count<?=$y?>').val(i);

                                                                                            //--------orakuploader
                                                                                            $('#third_choice_BoxThree_Tab_avatar7' + i + '').orakuploader({
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

                                                                                            $('#third_choice_BoxThree_Tab_avatar7' + i + '').html("<?=$pic_str?>");

                                                                                            $('.input-group-addon.H_third_choice_BoxThree_Tab' + i + '').find("div").first().next().css('width','100px');
                                                                                            $('.input-group-addon.H_third_choice_BoxThree_Tab' + i + '').find("div").first().next().find("div").first().css('float','right');
                                                                                            //    ---end orakuploader
                                                                                            i++;});
                                                                                        $(document).on('click', '.del_third_choice_BoxThree_Tab', function () {
                                                                                            var id = '';
                                                                                            var k = $('#third_choice_BoxThree_Tab_count<?=$y?>').val();
                                                                                            k--
                                                                                            id = $(this).attr('id');
                                                                                            $('#div_mother_third_choice_BoxThree_Tab' + id).remove();
                                                                                            $('#third_choice_BoxThree_Tab_count<?=$y?>').val(k);
                                                                                        });
                                                                                    });


                                                                                </script>
                                                                                <a class="btn btn-success block" id="add_third_choice_BoxThree_Tab-ads<?=$y?>"><i
                                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                                            class="fa fa-plus"></i>افزودن لینک</a>
                                                                                </br>
                                                                            </div>
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <script>
                                                                $(function(){
                                                                    var val = $("[name='ValSelectActive_BoxThree_Tab_title<?=$y?>']").val();
                                                                    //console.log(val);
                                                                    toggleForm(val);

                                                                    $(document).on('change', '[name="select_type_BoxThree_Tab<?=$y?>"]', function(){
                                                                        val = $(this).val();
                                                                        $('[name="ValSelectActive_BoxThree_Tab_title<?=$y?>"]').val(val);
                                                                        toggleForm(val);
                                                                    });
                                                                    function toggleForm(val){
                                                                        $('.opt_BoxThree_Tab<?=$y?>').hide();
                                                                        $('.BoxThree_Tab_option<?=$y?>'+val).show();

                                                                        //console.log($('.BoxThree_Tab_option'+val));
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
        $("div.bhoechie-tab-menu.H5>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();

            $("div.bhoechie-tab.H5>div.bhoechie-tab-content.H5").removeClass("active");
            $("div.bhoechie-tab.H5>div.bhoechie-tab-content.H5").eq(index).addClass("active");
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


        //-----------------------------------------
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
        $(".H_rename_block6").click(function () {
            $(this).hide();
            $('.H_rename_block6_save').show();
            $(".H_input_rename_block6").toggle(300);
        });
        $(".H_rename_block6_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'block6' + "&value=" + $(".H_input_rename_block6").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_block6 > span.temp").text($(".H_input_rename_block6").val());
            $(this).hide();
            $('.H_rename_block6').show();
            $(".H_input_rename_block6").hide();
            $(".H_rename_block6.H_pos_color").css('transform','translateY(-24px)');
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
        //-----------box_two---------
        $(".H_rename_setting_box_two").click(function () {
            $(this).hide();
            $('.H_rename_setting_box_two_save').show();
            $(".H_input_rename_setting_box_two").toggle(300);
        });
        $(".H_rename_setting_box_two_save").click(function () {
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=save&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>'+ "&tem=" + '<?=$tem?>' + "&name=" + 'setting_box_two' + "&value=" + $(".H_input_rename_setting_box_two").val() ,
                success: function (result) {}
            });
            $("#H_input_rename_setting_box_two > span.temp").text($(".H_input_rename_setting_box_two").val());
            $(this).hide();
            $('.H_rename_setting_box_two').show();
            $(".H_input_rename_setting_box_two").hide();
            $(".H_rename_setting_box_two.H_pos_color").css('transform','translateY(-24px)');
        });
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

<!---------------return last tabs------------------>
<script>
    $(document).ready(function () {

        $("ul.z-tabs-desktop").find('li.z-active').removeClass('z-active');
        $("ul.z-tabs-desktop").find('[data-link=<?= $temp_tab['title'] ?>]').addClass('z-active');

        $("#clean-demo .z-container > div").removeClass('z-active').siblings().css( 'display' , 'none');
        $("#clean-demo .z-container").find('.<?= $temp_tab['title'] ?>').addClass('z-active').css({ 'display' : 'block','position':'relative'}).find('div.bhoechie-tab-content.active');

        $("#clean-demo .z-container > div.z-active div.list-group a").removeClass('active');
        $("#clean-demo .z-container > div.z-active div.list-group").find('[id=<?= $temp_tab['text'] ?>]').addClass('active');

        $("#clean-demo .z-container div.z-active div.bhoechie-tab-content").removeClass('active');
        $("#clean-demo .z-container div.z-active div.bhoechie-tab").find('[id=<?= $temp_tab['pic'] ?>]').addClass('active');


    });
    $("form").submit(function () {
        var val=$("ul.z-tabs-desktop").find('li.z-active').attr("data-link");
        $('[name="temp_tab"]').val(val);
        var number= $("#clean-demo .z-container div.z-active div.list-group a.active").attr("id");
        $('[name="number_tab"]').val(number);
        var num_con= $("#clean-demo .z-container div.z-active div.bhoechie-tab-content.active").attr("id");

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

<script type="text/javascript"
        src="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/js/bootstrap-iconpicker.js"></script>
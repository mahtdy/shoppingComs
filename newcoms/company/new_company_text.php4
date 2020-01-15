<? $_SESSION["modual_type"] = 19 ?>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/new_plugin/video-js/css/video-js.min.css">
<!-- page specific plugin scripts -->
<!--script src="/assets/js/fuelux/data/fuelux.tree-sample-demo-data.js"></script-->
<script src="/yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css"/>
<!--[if lt IE 9]>
<script src="/js/jsTree/respond.js"></script><![endif]-->
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/jasny-input/jasny-bootstrap.min.css"/>
<script src="/yep_theme/default/rtl/js/jasny-input/jasny-bootstrap.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/daterangepicker.css"/>
<script src="/yep_theme/default/rtl/assets/js/date-time/daterangepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>

<link type="text/css" href="/new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="/new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script>
<script src="/yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">

<script src="/yep_theme/default/rtl/js/jquery.maskedinput.min.js"></script>
<script src="/yep_theme/default/rtl/js/dropzone.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropzone.min.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/H_style.css">

<link rel="stylesheet" href="/yep_theme/default/rtl/css/company/bootstrap.min.css">
<!--<script src="/yep_theme/default/rtl/css/company/bootstrap.min.js"></script>-->
<!--<script src="/yep_theme/default/rtl/css/company/jquery.min.js"></script>-->
<link rel="stylesheet" href="/yep_theme/default/rtl/css/M_style.css">
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>-->
<!--<script src="/yep_theme/default/rtl/js/select2.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<script src="ajax_js/company.js"></script>
<!--<script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/jquery-3.2.1.min.js"></script>-->


<style>
    .desm {
        display: inline-flex !important;
    }
</style>
<script>
    $(document).ready(function () {
        $("#drop4").hide();

        var boxes = $('input.conchkNumber');
        boxes.on('change', function () {
            $('#drop4').toggleClass("desm", boxes.is(":checked"));
        });

        var boxall = $('input.conchkSelectAll');
        boxall.on('change', function () {
            $('#drop4').toggleClass("desm", boxall.is(":checked"));
        });

    });

    $(document).on('click', '#close_video_modual', function () {
        $("#show_add_video_modual").attr('src', '');
        $("#example_video_1 video")[0].load();
    });
</script>

<? ###چک کردن مدیر

$files = glob('new_gallery/watermark/*');
foreach ($files as $file) {
    if (is_file($file))
        unlink($file);
}
//echo $_SESSION['can_edit'].$_SESSION['can_delete'].$_SESSION['can_add'];
$edit_mode = injection_replace($_POST['edit_mode']);
if ($edit_mode > "") {
    $temp_user = get_result("select user_id from new_company where id= $edit_mode", $coms_conect);
    if (!in_array($temp_user, $_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$edit_id = injection_replace($_GET['edit_id']);
if ($edit_id > "") {
    $temp_user = get_result("select user_id from new_company where id= $edit_id", $coms_conect);
    if (!in_array($temp_user, $_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}

$addnew = injection_replace($_GET['addnew']);
$name = injection_replace($_POST['name']);
$name_url = injection_replace($_POST['name_url']);

$status = injection_replace($_POST['status']);

#file upload field
$upload_type_nav = injection_replace($_POST['upload_type_nav']);
if ($upload_type_nav == 2)
    $navication_pic = injection_replace($_POST['company_image_nav']);

else if ($upload_type_nav == 1) {
    $company_image_avatar_nav = injection_replace($_POST['company_image_avatar_nav'][0]);
    echo $company_image_avatar_nav;
    $company_image_avatar_nav = trim($company_image_avatar_nav);
    if ($company_image_avatar_nav != '')
        $navication_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $company_image_avatar_nav;
    else
        $navication_pic = '';
}
if ($upload_type_nav == '')
    $upload_type_nav = 1;

//$navication_pic = injection_replace($_POST['navication_pic']);

$duration = injection_replace($_POST['duration']);

$title = injection_replace($_POST['title']);
$abstract = injection_replace($_POST['abstract']);
//$can_comment = injection_replace($_POST['can_comment']);
$manage_site = injection_replace($_POST['manage_site']);
//echo 'dddd';exit;
if ($manage_site > "") {
    if (!in_array($manage_site, $_SESSION["manager_title_site"]))
        header('Location: new_manager_signout.php');
}
$manage_lang = injection_replace($_POST['manage_lang']);
if ($manage_lang > "") {
    if (!in_array($manage_lang, $_SESSION["manager_title_lang"]))
        header('Location: new_manager_signout.php');
}

$text = $_POST['text'];


$mudoal_lock = injection_replace($_POST['mudoal_lock']);
$is_special = injection_replace($_POST['is_special']);
$spesial_start_date = injection_replace($_POST['spesial_start_date']);
$spesial_finish_date = injection_replace($_POST['spesial_finish_date']);
if (isset($_POST['publish_date'])) {
    $publish_date = injection_replace($_POST['publish_date']);
    $publish_date = (injection_replace($_POST['publish_date']) > "") ? strtotime(jalalitomiladi($publish_date)) : $now;
}
$array_value = injection_replace($_POST['array_value']);
if ($array_value > "") {
    $array_valu = explode(",", $array_value);
    $tempp = (array_diff($array_valu, $_SESSION["manager_page_cat"]));
    if (count($tempp) > 0) {
        header('Location: new_manager_signout.php');
        exit();
    }
}
$cat_arr = explode(",", $array_value);

#type content
$fori = (injection_replace($_POST['fori']) == "") ? 0 : 1;
$tasviri = (injection_replace($_POST['tasviri']) == "") ? 0 : 1;
$videoi = (injection_replace($_POST['videoi']) == "") ? 0 : 1;
$soti = (injection_replace($_POST['soti']) == "") ? 0 : 1;
$erjaei = (injection_replace($_POST['erjaei']) == "") ? 0 : 1;
//$company_type = $fori . $tasviri . $videoi . $soti . $erjaei;


# SEO Tab
$meta_label = ($_POST['meta_label']);
$meta_label_active = ($_POST['meta_label_active']);
$meta_label_distributors = ($_POST['meta_label_distributors']);

//print_r($meta_label_active) . '<br>' . print_r($meta_label);
//echo 'sas';
if (!empty($meta_label_active)) {
    $meta_label_active = implode(',', $meta_label_active);
//    echo 'meta' . $meta_label_active;
//    exit;
}
if (!empty($meta_label_distributors)) {
    $meta_label_distributors = implode(',', $meta_label_distributors);
//    echo 'meta' . $meta_label_active;
//    exit;
}
$meta_label1 = ($_POST['meta_label1']);

$source_link_company = injection_replace($_POST['source_link_company']);
$source_company = injection_replace($_POST['source_company']);
$meta_keyword = injection_replace($_POST['meta_keyword']);
$meta_desciption = injection_replace($_POST['meta_desciption']);
$seo_title = injection_replace($_POST['seo_title']);

# Slide Tab
$slide = injection_replace($_POST['slide']);


#file upload field
$upload_type = injection_replace($_POST['upload_type']);
if ($upload_type == 2)
    $company_image = injection_replace($_POST['company_image']);

else if ($upload_type == 1) {
    $company_image_avatar = injection_replace($_POST['company_image_avatar'][0]);
    $company_image_avatar = trim($company_image_avatar);
    if ($company_image_avatar != '')
        $company_image = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $company_image_avatar;
    else
        $company_image = '';
}

//echo  $company_image.'wew';
$company_video_pic = injection_replace($_POST['company_video_pic']);
$company_attach = injection_replace($_POST['company_attach']);
$company_sound = injection_replace($_POST['company_sound']);
$company_video = injection_replace($_POST['company_video']);

$album_type = injection_replace($_POST['album_type']);
if ($album_type == 2) {
    $imagelist = ($_POST['imagelist']);
    foreach ($_POST['company_image_album'] as $val) {
        unlink('new_gallery/files/' . $val);
        unlink('new_gallery/files/tn' . $val);
    }

} else if ($album_type == 1 && count($_POST['company_image_album']) > 0) {
    foreach ($_POST['company_image_album'] as $val)
        $imagelist[] = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $val;
}


#slideshow
$slide_img1 = injection_replace($_POST['slide_img1']);
$slide_img2 = injection_replace($_POST['slide_img2']);
$start_date = injection_replace($_POST['start_date']);
$finish_date = injection_replace($_POST['finish_date']);
$slide_title = injection_replace($_POST['slide_title']);
$text1 = injection_replace($_POST['text1']);
$text2 = injection_replace($_POST['text2']);
$text3 = injection_replace($_POST['text3']);

#محتوا مرتبط
$totla_related = injection_replace($_POST['totla_related']);
$totla_related_brand = injection_replace($_POST['totla_related_brand']);
$spesial_date = jdate('Y/m/d');

#اطلاعات شرکت
$manager_name = injection_replace($_POST['company_manager_name']);
$boss_name = injection_replace($_POST['company_boss_name']);
$tech_name = injection_replace($_POST['company_technical_name']);
$latin_name = injection_replace($_POST['company_latin_name']);
$num_sabt = injection_replace($_POST['company_num_sabt']);
$num_code = injection_replace($_POST['company_num_code']);
$com_type = injection_replace($_POST['company_type']);
$sabt_date = injection_replace($_POST['sabt_date']);
$city = injection_replace($_POST['company_city']);
$zipcode = injection_replace($_POST['company_zipcode']);
$com_adres = injection_replace($_POST['company_address']);
$com_adres_site = injection_replace($_POST['company_address_site']);
$com_email = injection_replace($_POST['company_email']);
//$img_email = injection_replace($_POST['img_email']);

$com_fax = injection_replace($_POST['company_fax']);
$val_i = injection_replace($_POST['val_i']);
$val_z = injection_replace($_POST['val_z']);
//$s = injection_replace($_POST['val_s']);
//$q = injection_replace($_POST['val_q']);
$val_w = injection_replace($_POST['val_w']);
$check_checked = injection_replace($_POST['check_checked']);
$check_checked_brand = injection_replace($_POST['check_checked_representation']);
$chkbx_link = injection_replace($_POST['chkbx_link']);
$state = injection_replace($_POST['company_state']);
$com_social_link1 = injection_replace($_POST['company_social_link1']);
$com_social_link2 = injection_replace($_POST['company_social_link2']);
$com_social_link3 = injection_replace($_POST['company_social_link3']);
$com_social_link4 = injection_replace($_POST['company_social_link4']);

$boss_say = injection_replace($_POST['boss_say']);
$img_smallBox1_pic_boss = injection_replace($_POST['boss_pic']);


$boss_social_link1 = injection_replace($_POST['boss_social_link1']);
$boss_social_link2 = injection_replace($_POST['boss_social_link2']);
$boss_social_link3 = injection_replace($_POST['boss_social_link3']);
$boss_social_link4 = injection_replace($_POST['boss_social_link4']);
//echo $check_checked;
//$phone_phone = injection_replace($_POST['company_ph_links_title1']);
//echo check_catogory($array_value);

$img_smallBox1_pic_boss = injection_replace_pic($_POST["img_smallBox1_pic_boss"]);
$img_smallBox1_pic_boss = trim($img_smallBox1_pic_boss);

if ( isset($_POST["img_smallBox1_avatar7_boss"][0])) {
    $img_smallBox1_avatar7_boss = injection_replace($_POST["img_smallBox1_avatar7_boss"][0]);
    $img_smallBox1_avatar7_boss = trim($img_smallBox1_avatar7_boss);
    $img_smallBox1_pic_boss = 'http://' . $_SERVER["HTTP_HOST"] . '/source/comsroot/defualt/boss_pic/' . $img_smallBox1_avatar7_boss;
}
$img_smallBox1_avatar7_boss = "";

//echo $img_smallBox1_pic_boss;exit;

$pic_type = injection_replace($_POST['pic_type']);


//exit;
if ($pic_type == 2) {
    $video_pic = injection_replace($_POST['video_pic']);
} else if ($pic_type == 1) {
    $videos_name = basename($video_videos);
    $temp = explode(".", $videos_name);
    $videos_name = $temp[0] . '.jpg';
    $video_pic = "/source/comsroot/video_pic/$videos_name";

}

############################################
if ($edit_mode == "" && $title > "" && ($_SESSION["can_add"] == 1 || $_SESSION["can_draft"] == 1) && check_catogory($array_value) == 1) {
    check_token($_REQUEST['user_token'], $_SESSION['session_token'], '/coms');
    $user_id = injection_replace($_SESSION['manager_id']);

    if ($_SESSION["can_add"] != 1)
        $status = 0;
    if ($spesial_finish_date == '') $spesial_finish_date = $spesial_date;
    if ($spesial_start_date == '') $spesial_start_date = $spesial_date;

//====== تبدیل ایمیل به عکس invert email to jpg ========//
    if (isset($_POST['company_email']) and $edit_mode == '') {
        $len = strlen($com_email);
        $width = ($len + 2) * 7;
        $im = imagecreatetruecolor($width, 20);

// Create some colors
        $white = imagecolorallocate($im, 255, 255, 255);

        imagefilledrectangle($im, 0, 0, $width - 1, 19, $white);
// Replace path by your own font path
//    $font = 'http://' . $_SERVER["HTTP_HOST"] .'/yep_theme/default/rtl/images/email/arial.ttf';
        $font = 'yep_theme/default/rtl/images/email/arial.ttf';
        imagettftext($im, 10, 0, 5, 15, $black, $font, $com_email);

// Create image in folder
        $rnd = rand(0, 9999);

        $image_email = 'yep_theme/default/rtl/images/email/' . 'img-email' . $rnd . '.jpg';
//        echo 'rr='.$image_email.'rnd='.$rnd;exit;
        imagejpeg($im, $image_email);
        imagedestroy($im);

// Show image in output page

    }

//=======end invert email to jpg

    $arr = array('boss_say' => $boss_say, 'boss_pic' => $img_smallBox1_pic_boss, 'hashtag_key' => $meta_label1, "com_active" => $meta_label_active, "com_tozie" => $meta_label_distributors, "pic_type" => $pic_type, "album_type" => $album_type, "upload_type_nav" => $upload_type_nav, "navication_pic" => $navication_pic, "social_link1" => $com_social_link1, "social_link2" => $com_social_link2, "social_link3" => $com_social_link3, "social_link4" => $social_link4, "boss_social_link1" => $boss_social_link1, "boss_social_link2" => $boss_social_link2, "boss_social_link3" => $boss_social_link3, "boss_social_link4" => $boss_social_link4, "state" => $state, "check_link" => $chkbx_link, "com_email_img" => $image_email, "upload_type" => $upload_type, "seo_title" => $seo_title, "manager_name" => $manager_name, "boss_name" => $boss_name, "tech_name" => $tech_name, "latin_name" => $latin_name, "num_sabt" => $num_sabt, "num_code" => $num_code, "com_type" => $com_type, "sabt_date" => $sabt_date, "city" => $city, "zipcode" => $zipcode, "com_adres" => $com_adres, "com_adres_site" => $com_adres_site, "com_email" => $com_email, "com_fax" => $com_fax, "source_link_company" => $source_link_company, "source_company" => $source_company, "name" => $name, "name_url" => $name_url, "title" => $title, "text" => $text, "ip" => $custom_ip, "meta_keyword" => $meta_keyword, "meta_description" => $meta_desciption, "spesial_start_date" => strtotime(jalalitomiladi($spesial_start_date)), "spesial_finish_date" => strtotime(jalalitomiladi($spesial_finish_date)), "abstract" => $abstract, "publish_date" => $publish_date, "user_id" => $user_id, "date" => $now, "la" => $manage_lang, "site" => $manage_site, "status" => $status);
    $id = insert_to_data_base($arr, 'new_company', $coms_conect);
    $id_com = $coms_conect->insert_id;
//echo 'idc='.$id_com;


//    echo  $company_image;
    $arr_imag = array("id" => $id, "type" => 19, "adress" => $company_image, "name" => 'company_image');
    insert_to_data_base($arr_imag, 'new_file_path', $coms_conect);
//    echo  $company_image.'qq';
    $arr_attach = array("id" => $id, "type" => 19, "adress" => $company_attach, "name" => 'company_attach');
    insert_to_data_base($arr_attach, 'new_file_path', $coms_conect);


    $arr_sound = array("id" => $id, "type" => 19, "adress" => $company_sound, "name" => 'company_sound');
    insert_to_data_base($arr_sound, 'new_file_path', $coms_conect);

    $arr_video = array("id" => $id, "type" => 19, "adress" => $company_video, "name" => 'company_video');
    insert_to_data_base($arr_video, 'new_file_path', $coms_conect);

    $arr_video = array("id" => $id, "type" => 19, "adress" => $company_video_pic, "name" => 'company_video_pic');
    insert_to_data_base($arr_video, 'new_file_path', $coms_conect);

    ####label
    if (!empty($meta_label)) {
//        $temp = explode(",", $meta_label);
        foreach ($meta_label as $value) {
            if ($value > "") {
                $label_arr = array("id" => $id, "type" => 19, "label_id" => $value);
                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }


    ### gallery add
    if (!empty($imagelist)) {
        foreach ($imagelist as $image) {
            if ($image != -1) {
                $gallery_arr = array("id" => $id, "type" => 19, "adress" => $image, "name" => 'company_gallery');
                insert_to_data_base($gallery_arr, 'new_file_path', $coms_conect);
            }
        }
    }

    #####دسته بندي#######
    foreach ($cat_arr as $value) {
        if ($value != -1) {
            $arr = array("cat_id" => $value, "page_id" => $id, "type" => 19);
            insert_to_data_base($arr, 'new_modules_catogory', $coms_conect);
        }
    }

    $related = explode(",", $totla_related);
    foreach ($related as $value) {

        $arr = array("id" => $value, "page_id" => $id, "type" => 19);
        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
    }

    $related_brand = explode(",", $totla_related_brand);
    foreach ($related_brand as $value_brand) {

        $arr = array("id" => $value_brand, "page_id" => $id_com, "type" => 19);
        insert_to_data_base($arr, 'new_company_brand_related', $coms_conect);
    }

    ### slide show add

    if ($slide == 1) {
        $slide_link = "/company/$manage_lang/$id/" . insert_dash("$name");
        $arr_slide = array("check_link" => $chkbx_link, "la" => $manage_lang, "site" => $manage_site, "link" => $slide_link, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $id, "type" => 19, "user_id" => $user_id, "date" => $now, "ip" => $custom_ip);
        insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
    }

    show_msg($new_successfull);
} else if ($edit_mode > "" && $title > "" && $_SESSION["can_edit"] == 1 && check_catogory($array_value) == 1) {
    check_token($_REQUEST['user_token'], $_SESSION['session_token'], '/coms');
    if ($spesial_finish_date == '') $spesial_finish_date = $spesial_date;
    if ($spesial_start_date == '') $spesial_start_date = $spesial_date;
    $edit_user_id = injection_replace($_SESSION['manager_id']);
    $condition = "id=$edit_mode";


//====== تبدیل ایمیل به عکس invert email to jpg ========//

    $query = "SELECT com_email_img FROM new_company where id='$edit_id'";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $len = strlen($com_email);
    $width = ($len + 2) * 7;
    $im = imagecreatetruecolor($width, 20);

// Create some colors
    $white = imagecolorallocate($im, 255, 255, 255);

    imagefilledrectangle($im, 0, 0, $width - 1, 19, $white);
// Replace path by your own font path
//    $font = 'http://' . $_SERVER["HTTP_HOST"] .'/yep_theme/default/rtl/images/email/arial.ttf';
    $font = 'yep_theme/default/rtl/images/email/arial.ttf';
    imagettftext($im, 10, 0, 5, 15, $black, $font, $com_email);
    $img_email = $row['com_email_img'];
// Create image in folder
//    echo 'imemail = '.$img_email.'<br>';
    if ($img_email == '') {
        $rnd = rand(0, 9999);
        $img_email = 'yep_theme/default/rtl/images/email/' . 'img-email' . $rnd . '.jpg';
    }
//        $image_email=$img_email;
//echo $image_email.'im='.$img_email;
    imagejpeg($im, $img_email);
    imagedestroy($im);
//    echo 'im='.$im.$com_email.'rr='.$image_email.'rnd='.$rnd;exit;
// Show image in output pagesdsd


//=======end invert email to jpg

    $arr = array('boss_say' => $boss_say, 'boss_pic' => $img_smallBox1_pic_boss,'hashtag_key' => $meta_label1, "com_active" => $meta_label_active, "com_tozie" => $meta_label_distributors, "pic_type" => $pic_type, "album_type" => $album_type, "upload_type_nav" => $upload_type_nav, "navication_pic" => $navication_pic, "social_link1" => $com_social_link1, "social_link2" => $com_social_link2, "social_link3" => $com_social_link3, "social_link4" => $com_social_link4, "boss_social_link1" => $boss_social_link1, "boss_social_link2" => $boss_social_link2, "boss_social_link3" => $boss_social_link3, "boss_social_link4" => $boss_social_link4, "state" => $state, "check_link" => $chkbx_link, "com_email_img" => $img_email, "seo_title" => $seo_title, "manager_name" => $manager_name, "boss_name" => $boss_name, "tech_name" => $tech_name, "latin_name" => $latin_name, "num_sabt" => $num_sabt, "num_code" => $num_code, "com_type" => $com_type, "sabt_date" => $sabt_date, "city" => $city, "zipcode" => $zipcode, "com_adres" => $com_adres, "com_adres_site" => $com_adres_site, "com_email" => $com_email, "com_fax" => $com_fax, "source_link_company" => $source_link_company, "source_company" => $source_company, "name" => $name, "name_url" => $name_url, "title" => $title, "text" => $text, "ip" => $custom_ip, "meta_keyword" => $meta_keyword, "meta_description" => $meta_desciption, "spesial_start_date" => strtotime(jalalitomiladi($spesial_start_date)), "spesial_finish_date" => strtotime(jalalitomiladi($spesial_finish_date)), "abstract" => $abstract, "publish_date" => $publish_date, "edit_user_id" => $edit_user_id, "edit_date" => $now, "la" => $manage_lang, "site" => $manage_site, "status" => $status);
    update_data_base($arr, 'new_company', $condition, $coms_conect);


    $condition = "id=$edit_mode && name='company_image'";
    $arr_imag = array("id" => $edit_mode, "type" => 19, "adress" => $company_image, "name" => 'company_image');
    update_data_base($arr_imag, 'new_file_path', $condition, $coms_conect);
//    echo  $company_image.'ee';

    $condition = "id=$edit_mode && name='company_attach'";
    $arr_attach = array("id" => $edit_mode, "type" => 19, "adress" => $company_attach, "name" => 'company_attach');
    update_data_base($arr_attach, 'new_file_path', $condition, $coms_conect);


    $condition = "id=$edit_mode && name='company_sound'";
    $arr_sound = array("id" => $edit_mode, "type" => 19, "adress" => $company_sound, "name" => 'company_sound');
    update_data_base($arr_sound, 'new_file_path', $condition, $coms_conect);

    $condition = "id=$edit_mode && name='company_video'";
    $arr_video = array("id" => $edit_mode, "type" => 19, "adress" => $company_video, "name" => 'company_video');
    update_data_base($arr_video, 'new_file_path', $condition, $coms_conect);

    $condition = "id=$edit_mode && name='company_video_pic'";
    $arr_video = array("id" => $edit_mode, "type" => 19, "adress" => $company_video_pic, "name" => 'company_video_pic');
    update_data_base($arr_video, 'new_file_path', $condition, $coms_conect);


    ####label
    $condition = "id=$edit_mode and type=19";
    delete_from_data_base('new_mudoal_label', $condition, $coms_conect);

    if (!empty($meta_label)) {
//          $temp = explode(",", $meta_label);
        foreach ($meta_label as $value) {
            if ($value > "") {
                $label_arr = array("id" => $edit_mode, "type" => 19, "label_id" => $value);
                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }
    ##edit gallery
    $query1 = "delete from new_file_path where id='$edit_mode' && name='company_gallery' and type=19";
    $coms_conect->query($query1);
    if (!empty($imagelist)) {
        foreach ($imagelist as $image) {
            if ($image != -1) {
                $gallery_arr = array("id" => $edit_mode, "type" => 19, "adress" => $image, "name" => 'company_gallery');
                insert_to_data_base($gallery_arr, 'new_file_path', $coms_conect);
            }
        }
    }

#####دسته بندي#######
    $query1 = "delete from new_modules_catogory where page_id='$edit_mode' and type=19";
    $coms_conect->query($query1);
    foreach ($cat_arr as $value) {
        if ($value != -1) {
            $arr = array("cat_id" => $value, "page_id" => $edit_mode, "type" => 19);
            insert_to_data_base($arr, 'new_modules_catogory', $coms_conect);
        }
    }
#####related
    $query1 = "delete from new_related_madual where page_id='$edit_mode' and type=19";
    $coms_conect->query($query1);
    $related = explode(",", $totla_related);
    foreach ($related as $value) {

        $arr = array("id" => $value, "page_id" => $edit_mode, "type" => 19);
        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
    }
    $query111 = "delete from new_company_brand_related where page_id='$edit_mode' and type=19";
    $coms_conect->query($query111);
    $related_brand = explode(",", $totla_related_brand);
    foreach ($related_brand as $value_brand) {
        $arr = array("id" => $value_brand, "page_id" => $edit_mode, "type" => 19);
        insert_to_data_base($arr, 'new_company_brand_related', $coms_conect);
    }
    ### slide show update
    if ($slide == 1) {
        $slide_link = "/company/$manage_lang/$edit_mode/" . insert_dash("$name");
        $query1 = "select count(id) as count from new_slideshow where page_id='$edit_mode'  and type=19";
        $result = $coms_conect->query($query1);
        $row = $result->fetch_assoc();
        $count = $row['count'];
        if ($count != 0) {
            $condition = "page_id=$edit_mode";
            $arr_slide = array("link" => $slide_link, "la" => $manage_lang, "site" => $manage_site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 19, "edit_user_id" => $edit_user_id, "edit_date" => $now, "ip" => $custom_ip);
            update_data_base($arr_slide, 'new_slideshow', $condition, $coms_conect);

        } else {
            $arr_slide = array("link" => $slide_link, "la" => $manage_lang, "site" => $manage_site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 19, "user_id" => $edit_user_id, "date" => $now, "ip" => $custom_ip);
            insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);

        }
    } else {
        $query1 = "delete from new_slideshow where page_id='$edit_mode' and type=19";
        $coms_conect->query($query1);
    }
    show_msg($new_successfull);
}

create_session_token();
###############نمايش در حالت ويرايش#################
if ($edit_id > "") {
    $query = "SELECT * FROM new_company where id='$edit_id'";
    $result = $coms_conect->query($query);
//    print_r($query);
//    print_r($result); echo $edit_id;exit;
    $row = $result->fetch_assoc();
    $status = $row['status'];
    $album_type = $row['album_type'];
    $upload_type = $row['upload_type'];
    $upload_type_nav = $row['upload_type_nav'];
    $duration = $row['duration'];
    $edit_source_link_company = $row['source_link_company'];
    $edit_source_company = $row['source_company'];
    $edit_name = $row['name'];
    $edit_name_url = $row['name_url'];
//    $com_type = $row['com_type'];
    $title = $row['title'];
    $navication_pic = $row['navication_pic'];
    $edit_text = ta_latin_num($row['text']);

    $la = $row['la'];
    $site_id = $row['site'];
    $manager_name = $row['manager_name'];
    $boss_name = $row['boss_name'];
    $tech_name = $row['tech_name'];
    $latin_name = $row['latin_name'];
    $num_sabt = $row['num_sabt'];
    $num_code = $row['num_code'];
    $com_type = $row['com_type'];
    $sabt_date = $row['sabt_date'];
    $city = $row['city'];
    $zipcode = $row['zipcode'];
    $com_adres = $row['com_adres'];
    $com_adres_site = $row['com_adres_site'];
    $com_email = $row['com_email'];
    $com_fax = $row['com_fax'];
    $img_email = $row['com_email_img'];
    $id_com = $row['id'];
    $chkbx_link = $row['check_link'];
    $state = $row['state'];
    $com_social_link1 = $row['social_link1'];
    $com_social_link2 = $row['social_link2'];
    $com_social_link3 = $row['social_link3'];
    $com_social_link4 = $row['social_link4'];

    $boss_social_link1 = $row['boss_social_link1'];
    $boss_social_link2 = $row['boss_social_link2'];
    $boss_social_link3 = $row['boss_social_link3'];
    $boss_social_link4 = $row['boss_social_link4'];
    $pic_type = $row['pic_type'];
    $img_smallBox1_pic_boss = $row['boss_pic'];
//    $meta_label_active = $row['com_active'];
    $meta_label_active = explode(',', ta_latin_num($row['com_active']));
    $meta_label_distributors = explode(',', ta_latin_num($row['com_tozie']));
//print_r($meta_label_active);

//    echo $phone_phone.$phone_name;


    $label = '';
    $query = "select label_id from new_mudoal_label where id='$edit_id' and type=19";
    $result = $coms_conect->query($query);
    while ($RS1 = $result->fetch_assoc()) {
        $label[] = $RS1['label_id'];
    }
    //echo $label;//exit;
    $meta_keyword = $row['meta_keyword'];
    $seo_title = $row['seo_title'];
    $meta_label1 = explode(',', $row['hashtag_key']);

    $is_special = $row['is_special'];
    $meta_desciption = $row['meta_description'];
    $spesial_start_date = miladitojalaliuser(date('Y-m-d', $row['spesial_start_date']));
    $spesial_finish_date = miladitojalaliuser(date('Y-m-d', $row['spesial_finish_date']));
    $publish_date = miladitojalaliuser(date('Y-m-d', $row['publish_date']));
    $mudoal_lock = $row['mudoal_lock'];
    $abstract = $row['abstract'];
    $can_comment = $row['can_comment'];
    $slide = $row['slide'];
//    $company_type = $row['content_type'];
//    $temp_1 = str_split($company_type);
//    $fori = $temp_1[0];
//    $tasviri = $temp_1[1];
//    $videoi = $temp_1[2];
//    $soti = $temp_1[3];
//    $erjaei = $temp_1[4];


    #Query from new_slideshow
    $query = "SELECT * FROM new_slideshow where page_id='$edit_id'  and type=19";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $slide_img1 = $row['slide_img1'];
    $slide_img2 = $row['slide_img2'];
    if ($row['start_date'] > 0)
        $start_date = miladitojalaliuser(date('Y-m-d', $row['start_date']));
    if ($row['finish_date'] > 0)
        $finish_date = miladitojalaliuser(date('Y-m-d', $row['finish_date']));
    $slide_title = $row['title'];
    $text1 = $row['text1'];
    $text2 = $row['text2'];
    $text3 = $row['text3'];

    #Query from new_file_path
    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='company_image'  and type=19";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $company_image = $row['adress'];
//    echo $company_image;

    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='company_attach'  and type=19";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $company_attach = $row['adress'];

    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='company_sound'  and type=19";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $company_sound = $row['adress'];

    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='company_video'  and type=19";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $company_video = $row['adress'];

    $query = "SELECT b.id,title FROM new_related_madual a ,new_product b where page_id='$edit_id' and a.id=b.id and type=19";
    $result = $coms_conect->query($query);
//    echo $query;exit;
    $totla_related = "";
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($i != 1) $str = ',';
        $i++;
        $totla_related .= $str . $row['id'];
    }

    $query1b = "SELECT b.id,name FROM new_company_brand_related a ,new_company_cat_brand b where page_id='$edit_id' and a.id=b.id and a.type=19";
    $resultb = $coms_conect->query($query1b);
    $totla_related_brand = "";
//    echo $query1b;exit;
    $i = 1;
    while ($row = $resultb->fetch_assoc()) {
        if ($i != 1) $str = ',';
        $i++;
        $totla_related_brand .= $str . $row['id'];
    }


}


//$id_com = $coms_conect->insert_id;
//echo 'idc='.$manage_site.'eid='.$main;

########################################################### شروع ثبت فایل و کاتولوگ  ########################################################
$img_smallBox1_count = injection_replace_pic($_POST["img_smallBox1_count"]);
//echo $img_smallBox1_count;
for ($x = 1; $x <= $img_smallBox1_count; $x++) {

    $img_smallBox1_title = injection_replace_pic($_POST["img_smallBox1_title{$x}"]);

    $img_smallBox1_pic = injection_replace_pic($_POST["img_smallBox1_pic{$x}"]);
    $img_smallBox1_pic = trim($img_smallBox1_pic);

    $img_smallBox1_avatar7 = injection_replace($_POST["img_smallBox1_avatar7{$x}"][0]);
    $img_smallBox1_avatar7 = trim($img_smallBox1_avatar7);
//if($img_smallBox1_pic>"") {
//    $img_smallBox1_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $img_smallBox1_pic;
//}

    if ($img_smallBox1_avatar7 > "") {
        $img_smallBox1_avatar7_adrs = 'http://' . $_SERVER["HTTP_HOST"] . '/source/comsroot/defualt/catalog_pic/' . $img_smallBox1_avatar7;
//        echo $img_smallBox1_pic;
    }
    if ($img_smallBox1_title > "") {
        insert_update_ctlg($manage_site, $la, $img_smallBox1_title, $img_smallBox1_pic, $img_smallBox1_avatar7_adrs, $img_smallBox1_avatar7, $edit_id, $coms_conect);
    }
    $img_smallBox1_avatar7 = "";
}

########################################################### پایان ثبت فایل و کاتولوگ  END  ########################################################

########################################################### شروع ثبت تلفن START insert update phone   ########################################################


//echo 'val-i='.$val_i;
for ($j = 1; $j <= $val_i; $j++) {
    $phone_name = injection_replace($_POST["company_na_links_title{$j}"]);
    $phone_phone = injection_replace($_POST["company_ph_links_title{$j}"]);
    $phone_id = injection_replace($_POST["company_ph_id{$j}"]);
    $phone_id_com = injection_replace($_POST["company_ph_id_com{$j}"]);
//echo 'pic='.$phone_id_com.'<br>';
    if (empty($phone_id_com) && !empty($_POST["company_ph_links_title{$j}"])) {
//        echo 'idcom='.$id_com.'pic='.$phone_id_com.'<br>';
        $arr_phone = array("phone_name" => $phone_name, "phone_phone" => $phone_phone, "id_com" => $id_com);
//       print_r($arr_phone);
        insert_to_data_base($arr_phone, 'new_company_phone', $coms_conect);
    } else {

        $condition = "id=$phone_id";
        $arr_phone = array("phone_name" => $phone_name, "phone_phone" => $phone_phone, "id_com" => $phone_id_com);
        update_data_base($arr_phone, 'new_company_phone', $condition, $coms_conect);

    }
}
########################################################### پایان ثبت تلفن END insert update phone  ####################################################


########################################################### شروع ثبت تلفن START slide_esp   ########################################################
$val_slide_esp = injection_replace($_POST["slide_esp_ph_links_count"]);
//echo  $val_slide_esp;
//exit;
for ($j = 1; $j <= $val_slide_esp; $j++) {
//    $sal_slide_esp = injection_replace($_POST["slide_esp_na_links_title{$j}"]);
//    $yoni = injection_replace($_POST["slide_esp_ph_links_title{$j}"]);
    $sal_slide_esp = injection_replace($_POST["img_slide_esp_year{$j}"]);
    $book_slide_esp = injection_replace($_POST["img_slide_esp_title{$j}"]);
//    $nasher_slide_esp = injection_replace($_POST["slide_esp_nasher_links_title{$j}"]);
    $slide_esp_id = injection_replace($_POST["slide_esp_doctor_on_id{$j}"]);
    $slide_esp_id_com = injection_replace($_POST["company_slide_esp_id_com{$j}"]);


//    if (isset($_POST["img_slide_esp_pic{$j}"])){
    $slide_esp_img_smallBox1_avatar7_adrs = injection_replace_pic($_POST["img_slide_esp_pic{$j}"]);
    $slide_esp_img_smallBox1_avatar7_adrs = trim($slide_esp_img_smallBox1_avatar7_adrs);
    $slide_esp_img_smallBox1_avatar7 = injection_replace($_POST["slide_esp_img_smallBox1_avatar7{$j}"][0]);
    $slide_esp_img_smallBox1_avatar7 = trim($slide_esp_img_smallBox1_avatar7);

//    echo'piss='.$slide_esp_img_smallBox1_avatar7_adrs.'<br>'.'pp='.$slide_esp_img_smallBox1_avatar7.'<br>';
//       }else {
    if ($slide_esp_img_smallBox1_avatar7 > '') {
//        echo 'pic=='.$slide_esp_img_smallBox1_avatar7;
        $slide_esp_img_smallBox1_avatar7_adrs = 'http://' . $_SERVER["HTTP_HOST"] . '/source/comsroot/defualt/slide_esp/' . $slide_esp_img_smallBox1_avatar7;
//        echo $img_smallBox1_pic;
    }


//echo 'pic='.$slide_esp_id.'<br>'.'pic1='.$sal_slide_esp.'<br>'.'pics='.$book_slide_esp.'<br>'.'picss='.$slide_esp_img_smallBox1_avatar7_adrs.'<br>';
    if (empty($slide_esp_id_com) && !empty($_POST["img_slide_esp_year{$j}"])) {
//        echo 'idcom='.$id_com.'pic='.$fav_id_com.'<br>';
        $arr_slide_esp = array("big_titr" => $sal_slide_esp, "chip_titr" => $book_slide_esp, "pic_slide_esp" => $slide_esp_img_smallBox1_avatar7_adrs, "id_com" => $id_com);
//       print_r($arr_slide_esp);
        insert_to_data_base($arr_slide_esp, 'new_company_slide_esp', $coms_conect);
    } else {

        $condition = "id=$slide_esp_id";
        $arr_slide_esp = array("big_titr" => $sal_slide_esp, "chip_titr" => $book_slide_esp, "pic_slide_esp" => $slide_esp_img_smallBox1_avatar7_adrs, "id_com" => $slide_esp_id_com);
//        echo '<br>'.'j='.$j.'='.$condition.'=='; print_r($arr_slide_esp);
        update_data_base($arr_slide_esp, 'new_company_slide_esp', $condition, $coms_conect);

    }
    $slide_esp_img_smallBox1_avatar7_adrs = '';
}

########################################################### شروع ثبت تلفن END slide_esp   ########################################################
//


########################################################### شروع ثبت آدرس START insert update address   ########################################################


//echo '$val_z='.$val_z;
for ($z = 1; $z <= $val_z; $z++) {
    $company_adres_onvan = injection_replace($_POST["company_adres_onvan{$z}"]);
    $company_adres_state = injection_replace($_POST["company_adres_state{$z}"]);
    $company_adres_city = injection_replace($_POST["company_adres_city{$z}"]);
    $company_adres_zip = injection_replace($_POST["company_adres_zip{$z}"]);
    $company_adres_adres = injection_replace($_POST["company_adres_adres{$z}"]);
    $adres_id = injection_replace($_POST["company_ad_id{$z}"]);
    $adres_id_com = injection_replace($_POST["company_ad_id_com{$z}"]);
//echo 'pic='.$adres_id_com.'<br>';
//echo 'pi='.$adres_id.'<br>';
    if (empty($adres_id_com) && !empty($_POST["company_adres_adres{$z}"])) {
//        echo 'idcom='.$id_com.'pic='.$phone_id_com.'<br>';
        $arr_adres = array("onvan_adres" => $company_adres_onvan, "state_adres" => $company_adres_state, "city_adres" => $company_adres_city, "adres_adres" => $company_adres_adres, "zip_adres" => $company_adres_zip, "id_com" => $id_com);
//       print_r($arr_phone);
        insert_to_data_base($arr_adres, 'new_company_adres', $coms_conect);
    } else {

        $condition = "id=$adres_id";
        $arr_adres = array("onvan_adres" => $company_adres_onvan, "state_adres" => $company_adres_state, "city_adres" => $company_adres_city, "adres_adres" => $company_adres_adres, "zip_adres" => $company_adres_zip, "id_com" => $adres_id_com);
//       print_r($arr_adres);
        update_data_base($arr_adres, 'new_company_adres', $condition, $coms_conect);

    }
}
########################################################### پایان ثبت آدرس END insert update adderss  ####################################################


########################################################### شروع ثبت توزیع کننده START insert update tozie   ########################################################
//
//echo 'val-w='.$val_w;
for ($j = 1; $j <= $val_w; $j++) {
    $com_tozi_name = injection_replace($_POST["tab_distributors_links_title{$j}"]);
    $com_tozi_type = injection_replace($_POST["tab_distributors_links_type{$j}"]);
    $tozie_id = injection_replace($_POST["company_dis_id{$j}"]);
    $tozie_id_com = injection_replace($_POST["company_dis_id_com{$j}"]);
//echo 'pic='.$phone_id_com.'<br>';
    if (empty($tozie_id_com) && !empty($_POST["tab_distributors_links_title{$j}"])) {
//        echo 'idcom='.$id_com.'pic='.$phone_id_com.'<br>';
        $arr_tozie = array("com_tozi_name" => $com_tozi_name, "com_tozi_type" => $com_tozi_type, "id_com" => $id_com);
//       print_r($arr_tozie);
        insert_to_data_base($arr_tozie, 'new_company_tozie', $coms_conect);
    } else {

        $condition = "id=$tozie_id";
        $arr_tozie = array("com_tozi_name" => $com_tozi_name, "com_tozi_type" => $com_tozi_type, "id_com" => $tozie_id_com);
        update_data_base($arr_tozie, 'new_company_tozie', $condition, $coms_conect);

    }
}
########################################################### پایان ثبت توزیع کننده  END insert update tozie  ####################################################


//print_r($totla_related_brand);
##################################
?>
<div class="modal fade" id="del_reated_company" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف این
                    محصول اطمینان دارید؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_del_related_company" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-remove"></span>&nbsp;خیر
                </button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="del_reated_company_representation" tabindex="-1" role="dialog" aria-labelledby="edit"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف این
                    برند اطمینان دارید؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_del_related_company_representation" data-dismiss="modal"
                        class="btn btn-warning"><span
                            class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-remove"></span>&nbsp;خیر
                </button>
            </div>
        </div>
    </div>
</div>


<fieldset>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">حذف</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف
                        محتوا زير اطمينان داريد؟
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
</fieldset>

<fieldset>
    <div class="modal fade" id="show_content_gallery" tabindex="-1" role="dialog" aria-labelledby="edit"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="show_content_gallery_ajax">
                </div>
            </div>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="modal fade" id="show_video_grid" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id='close_video_modual' class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title custom_align" id="Heading">نمایش</h4>
                </div>
                <div class="modal-content">
                    <video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls
                           preload="none" width="100%" height="400px"
                           data-setup="{}">
                        <source id="show_add_video_modual" src="http://localhost/new_video_pic/default.MP4"
                                type='video/mp4'/>
                    </video>
                    <audio width="320" id="example_voice_1" controls style="display:none">
                        <source src="" type="voice/mp3">
                    </audio>
                </div>
            </div>
        </div>
    </div>
</fieldset>


<form class="form-horizontal" id="content_search" name="content_search" action="" role="form" method="get"
      enctype="multipart/form-data">
    <input type="hidden" value="new_company_text" name='yep'>
    <fieldset>
        <div class="modal fade" id="searching" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="Heading">جستجوي پيشرفته</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row clearfix">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_name">عنوان جستجو</label>
                                <div class="col-md-4">
                                    <? $search_txt = injection_replace($_GET['search_txt']) ?>
                                    <input id="search_txt" name="search_txt" value="<?= $search_txt ?>" type="text"
                                           placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_name">شماره محتوا</label>
                                <div class="col-md-4">
                                    <? $id_number = injection_replace($_GET['id_number']) ?>
                                    <input id="id_number" name="id_number" value="<?= $id_number ?>" type="text"
                                           placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">فيلد</label>
                                <div class="col-md-4">
                                    <? $field = injection_replace($_GET['field']) ?>
                                    <select class="dropdown" rows="5" name="field">
                                        <option <? if ($field == 0) echo 'selected' ?> value="0">همه</option>
                                        <option <? if ($field == 1) echo 'selected' ?> value="1">رو تيتر محتوا</option>
                                        <option <? if ($field == 2) echo 'selected' ?> value="2">عنوان محتوا</option>
                                        <option <? if ($field == 3) echo 'selected' ?> value="3">خلاصه محتوا</option>
                                        <option <? if ($field == 4) echo 'selected' ?> value="4">متن محتوا</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">تاريخ انتشار</label>
                                <div class="col-md-4">
                                    <? if ($_GET['publish_search'] > "") $publish_search = (injection_replace($_GET['publish_search'])) ?>
                                    <input type="text" value="<?= $publish_search ?>" class="input-sm form-control"
                                           name="publish_search" id="publish_search"/>

                                </div>
                            </div>
                            <div class="form-group">

                                <label for="edit_tozihat" class="col-md-3 control-label">وضعيت</label>
                                <div class="col-md-4">
                                    <? $search_status = injection_replace($_GET['search_status']); ?>
                                    <select class="dropdown" rows="5" name="search_status">


                                        <option <? if ($search_status == 0) echo 'selected'; ?> value="0">پيش نويس
                                        </option>
                                        <option <? if ($search_status == 1) echo 'selected'; ?> value="1">منتشر شده
                                        </option>
                                        <option <? if ($search_status == '') echo 'selected'; ?> value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary">جستجو</button>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>
<style>
    .navbar-form input[type=text] {
        border-width: 1px !important;
    }

    .dataTables_wrapper .row:last-child {
        border-bottom: 0px solid #e0e0e0 !important;
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    .bootstrap-tagsinput {
        margin-bottom: 0px;
        border-radius: 0px;
    }

    .dropdown-submenu > a:before {
        display: none !important;
    }
</style>

<fieldset>
    <div class="modal fade" id="show_company" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        محصولات
                    </div>
                </div>
                <div class="modal-body">
                    <div class="panel-body">
                        <div class="tt">
                            <div class="row-fluid">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group input-group-sm">
                                            <input type="text" id="related_search" class="form-control search2"
                                                   placeholder="" style="top: 0px !important; ">
                                            <span class="input-group-addon" style="padding: 0px;"><input type="button"
                                                                                                         class="btn btn-primary"
                                                                                                         value="جستجو"
                                                                                                         name="relate_btn"
                                                                                                         id="relate_btn"
                                                                                                         style="margin: auto;border-radius: 0px;bottom: 1px;height: 28px;padding-top: 2px;"></span>
                                        </div>
                                        <img id="show_waiting_search" src="waiting.gif" dir="center"
                                             style="display:none">
                                    </div>
                                </div>

                            </div>
                            <div id="show_related"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" id="btn_ok_company00" value="" data-dismiss="modal"
                            class="btn btn-primary conbtnGetAll"><span class="glyphicon glyphicon-ok-sign"></span>
                        افزودن
                    </button>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div>
</fieldset>
<br>
<style>
    .error {
        color: red;
    }
</style>
<!-- switch lock unlock -->
<style>
    input[type=checkbox].ace.ace-switch.ace-switch-6 + .lbl::before {
        content: "\f023";
    }

    input[type=checkbox].ace.ace-switch.ace-switch-6:checked + .lbl::before {
        content: "\f09c";
    }

</style>


<div class="tabbable">
    <ul class="nav nav-tabs" style="margin-top:18px;border-bottom: 0;display:none;">
        <li class="pull-right" style="right:1%;">
            <i type="button" class="navbar-toggle btn-primary" data-toggle="collapse"
               data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span data-toggle="tab" href="#add_templates" title="افزودن"><i
                            class="ace-icon fa fa-plus bigger-110"></i></span>
            </i>

            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <? if ($_SESSION['can_add'] == 1) { ?>    <a data-toggle="tab" href="#add_templates"
                                                                 style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
                        <i class="ace-icon fa fa-plus bigger-110"></i>
                        افزودن </a><? } ?>
                    <? if ($_GET['manager_filter'] > "") { ?>    <a href="/newcoms.php?yep=new_company_text"
                                                                    style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">

                        بازگشت </a><? } ?>
                </ul>
            </div>
        </li>
        <li class="active"><a href="#tab1" data-toggle="tab" style="display:none;" id="uuu"><i
                        class="green ace-icon fa fa-inbox bigger-130"></i>
                ليست محتوا </a></li>
    </ul>

    <div class="msheet tab-content">
        <div class="secfhead">
            <!-- #section:content/contenttext.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-text150" style=""></span>
                </div>
                <div class="title"><p class="titr">لیست شرکت ها</p>
                    <p class="lead">امکان مدیریت و افزودن و ویرایش کردن شرکت ها در این قسمت فراهم شده است.</p>
                </div>
            </div>
            <!-- /section:content/contenttext.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                    <? if ($_SESSION['can_add'] == 1 || $_SESSION['can_draft'] == 1) { ?> 
                        <li id="newpag" class="addicon reset">
                            <a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن شرکت جدید">
                                <span class="flaticon-add149"></span>
                            </a>
                        </li>
                    <? } ?>
                    <li>
                        <a data-toggle="modal" data-target="#searching" data-placement="top" title="جستجوی پیشرفته">
                            <span class="flaticon-search74"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-pane <? if ($edit_id == "") echo 'active' ?>" id="" style="background-color: #EFF3F8;">
            <!-- #section:content/contenttext.table -->
            <div class="tt">
                <div class="row-fluid">
                    <div class="col-md-10">
                        <div class="dropdown pull-left yepco">
                            <a id="dLabel" role="button" data-toggle="dropdown" data-target="#"
                               class="btn pull-left btn-primary btn-sm" href="/page.html">
                                امکانات <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                <li class="dropdown-submenu"><a href="#" tabindex="-1">انتقال به سايت  <i
                                                class="fa fa-caret-right" style="float: left;"></i></a>
                                    <ul class="dropdown-menu">
                                        <? create_sub_site_menu($site_id, $coms_conect, $_SESSION["manager_title_site"], 'cut_site') ?>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a href="#" tabindex="-1">کپي به سايت  <i
                                                class="fa fa-caret-right" style="float: left;"></i></a>
                                    <ul class="dropdown-menu">
                                        <? create_sub_site_menu($site_id, $coms_conect, $_SESSION["manager_title_site"], 'copy_site') ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="pull-left btn-xs yepco" id="drop4">
                            <i type="button" class="navbar-toggle btn-danger" data-toggle="collapse"
                               data-target="#bs-example-navbar-collapse-1"
                               style="height: 34px;padding-top: 8px;border-radius: 5px;margin-left: 0px;top: 2px;left: 5px;">
                                <span class="sr-only">Toggle navigation</span>
                                <span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i
                                            class="ace-icon fa fa-trash-o bigger-110"></i></span>
                            </i>
                            <? if ($_SESSION["can_delete"] == 1) { ?>
                                <div class="collapse navbar-collapse" id="nav-collapse"
                                     style="margin: 0px;padding: 0px;">
                                    <ul class="nav navbar-nav navbar-left">
                                        <a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete"
                                           data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"
                                           style="margin-left: 0px;margin-right: -5px;border-radius: 5px;">
                                            حذف
                                        </a>
                                    </ul>
                                </div>
                            <? } ?>
                        </div>
                        <? $manager_filter = injection_replace($_GET['manager_filter']);
                        if ($manager_filter == '')
                            $manager_filter = $_SESSION["manager_id"];
                        $q = injection_replace($_GET['q']);
                        $site_filter = injection_replace($_GET['site_filter']);
                        $lang_filter = injection_replace($_GET['lang_filter']);
                        if ($lang_filter == "" && $_SESSION['lang_filter'] == '')
                            $lang_filter = $_SESSION['page_languege'];

                        ?>
                        <div class="form-group yepco">
                            <form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
                                <input type="hidden" name="yep" value="new_company_text">
                                <input type="text" value="<?= $q ?>" name="q" id="q" class="form-control search2"
                                       placeholder="جستجو...">
                                <input type="hidden" name="site_filter" value="<?= $site_filter ?>">
                                <input type="hidden" name="lang_filter" value="<?= $lang_filter ?>">
                                <input type="hidden" name="manager_filter" value="<?= $manager_filter ?>">
                            </form>


                            <div class="pull-right btn-default btn-xs yepco">
                                <? if ($manager_filter > "")
                                    $_SESSION['manager_filter'] = $manager_filter;
                                create_manager_filter($_SESSION['manager_filter'], $coms_conect, $_SESSION["manager_user_permisson"]) ?>
                            </div>
                            <? if ($lang_filter > "")
                                $_SESSION['lang_filter'] = $lang_filter;
                            else
                                $lang_filter = $_SESSION['lang_filter']; ?>
                            <div class="pull-right btn-default btn-xs yepco">
                                <? if ($lang_filter > "")
                                    $_SESSION['lang_filter'] = $lang_filter;
                                create_lang_filter($_SESSION['lang_filter'], $coms_conect, $_SESSION["manager_title_lang"]) ?>
                            </div>
                            <div class="pull-right btn-default btn-xs yepco">
                                <? if ($site_filter > "")
                                    $_SESSION['site_filter'] = $site_filter;
                                create_sub_site_filter($_SESSION['site_filter'], $coms_conect, $_SESSION['manager_title_site']) ?>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
                   width="100%">
                <thead>
                <tr>
                    <th class="center">
                        <label class="position-relative">
                            <input type="checkbox" class="conchkSelectAll"/>
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th>ردیف</th>
                    <th width="15%">نام شرکت</th>

                    <th>ایمیل</th>
                    <th>آدرس سایت</th>
                    <th>مدیرعامل</th>

                    <!--                    <th class="center">وضعیت</th>-->
                    <th>تاريخ انتشار</th>
                    <? if ($_SESSION['can_add'] && $_SESSION['can_edit']) { ?>
                        <th class="center">فعال سازي نظر</th>
                    <? } ?>
                    <th>امکانات</th>
                </tr>
                </thead>
                <tbody><?
                if ($lang_filter > 0 && !in_array($lang_filter, $_SESSION["manager_title_lang"])) {
                    header('Location: new_manager_signout.php');
                }

                if (($site > "" && !in_array($site, $_SESSION["manager_title_site"])) || ($site_filter > 0 && !in_array($site_filter, $_SESSION["manager_title_site"]))) {
                    header('Location: new_manager_signout.php');
                    exit;
                }
                $manager_user_permisson = implode(",", $_SESSION["manager_user_permisson"]);
                $manager_title_site = "'" . implode("','", $_SESSION["manager_title_site"]) . "'";
                $manager_title_lang = "'" . implode("','", $_SESSION["manager_title_lang"]) . "'";


                if ($manager_filter > 0 && !in_array($manager_filter, $_SESSION["manager_user_permisson"]))
                    header('Location: new_manager_signout.php');

                $search_status = injection_replace($_GET['search_status']);
                if ($search_status > "") {
                    $str_status = " and a.status='$search_status'";
                    $status_page = "&status_filter=$search_status";
                }

                if ($id_number > "") {
                    $str_id_number = " and a.id='$id_number'";
                    $id_number_page = "&id_filter=$id_number";
                }
                if ($site_filter == -1) {
                    $str_site = " and a.site in ($manager_title_site)";
                    $site_page = "&site_filter=$site_filter";
                } else if ($site_filter > 0) {
                    $str_site = " and a.site='$site_filter'";
                    $site_page = "&site_filter=$site_filter";
                }


                if ($publish_search > "") {
                    $temp = jalalitomiladi($publish_search);
                    $yesterday_expire = strtotime(date('Y-m-d', strtotime($temp . ' - 1 days')));
                    $today_expire = strtotime(jalalitomiladi($publish_search));
                    $str_expire = " and a.publish_date<='$today_expire' and a.publish_date>='$yesterday_expire'";
                    $expire_page = "&publish_search=$publish_search";
                }

                if ($field > "") {
                    $field_page = "&field=$field&search_txt=$search_txt";
                    switch ($field) {
                        case 0:

                            $str_field = " and (a.name like '%$search_txt%' or a.abstract like '%$search_txt%' or a.title like '%$search_txt%' or a.text like '%$search_txt%')";
                            break;
                        case 1:
                            $str_field = " and a.name like '%$search_txt%'";
                            break;
                        case 2:
                            $str_field = " and a.title like '%$search_txt%'";
                            break;
                        case 3:
                            $str_field = " and a.abstract like '%$search_txt%'";
                            break;
                        case 4:
                            $str_field = " and a.text like '%$search_txt%'";
                            break;

                    }
                    //$str_lang=" and a.la='$lang_filter'";
                    //$lang_page="&lang_filter=$lang_filter";
                }

                if ($q > "") {
                    $str_q = "  and(a.title like '%$q%'  or a.name like '%$q%' or a.id='$q') ";
                    $manager_q = "&q=$q";
                }
                if ($lang_filter == -1) {

                    $str_lang = " and a.la in ($manager_title_lang)";
                    $lang_page = "&lang_filter=$lang_filter";
                } else if ($lang_filter > "") {

                    $str_lang = " and a.la='$lang_filter'";
                    $lang_page = "&lang_filter=$lang_filter";
                }
                //echo $str_lang;exit;

                if ($manager_filter > 0) {
                    $str_manager = " and  a.user_id='$manager_filter'";
                    $manager_page = "&manager_filter=$manager_filter";
                } else
                    $str_manager = " and  a.user_id in ($manager_user_permisson)";
                $cat_filter = injection_replace($_GET['cat_filter']);
                if ($cat_filter > "") {
                    $str_cat = " and c.cat_id in($cat_filter)";
                    $cat_page = "&cat_filter=$cat_filter";
                } else
                    $str_cat = " and c.cat_id in({$_SESSION['manager_page_cat_str']})";
                // $str_cat
                $sql1 = "select count(a)as cnt from (SELECT count(a.id) as a from new_managers b ,new_company a ,new_modules_catogory c where 
								 b.id = a.user_id and c.type=19 and a.id=c.page_id 
								 $str_lang $str_site $str_q $str_manager $str_status $str_cat $str_id_number $str_field $str_expire
								  
								group by page_id)q";
                //  echo $sql1; exit;
                $result = $coms_conect->query($sql1);
                $RS = $result->fetch_assoc();

                $page = injection_replace($_GET["page"]);
                $a = pgsel((int)$page, $RS["cnt"], 10, 10, "$root/newcoms.php?yep=new_company_text$lang_page$site_page$manager_page$status_page$manager_q$field_page$expire_page$publish_page$cat_page$id_number_page");
                $from = $a[0];
                $to = $a[1];
                $pgsel = $a[2];
                $query = "SELECT a.manager_name,a.can_comment,a.user_id,a.site,a.id,a.la,a.title,a.name,a.view,a.publish_date,a.status,a.com_email,a.date FROM new_managers b ,new_company a ,new_modules_catogory c where
							b.id = a.user_id and c.type=19 and a.id=c.page_id 
							$str_lang $str_site $str_q $str_manager $str_status $str_cat $str_id_number $str_field $str_expire
							 group by a.id order by a.id desc LIMIT $from,$to";
                //                   echo $query;exit;
                $result = $coms_conect->query($query);
                while ($RS1 = $result->fetch_assoc()) {
                    $id = $RS1["id"];
                    ?>
                    <tr>

                        <td class="center">
                            <label class="position-relative">
                                <input id="<?= $id ?>" type="checkbox" class="conchkNumber"/>
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td class="center"><?= $RS1["id"] ?></td>
                        <td class="center"><?= $RS1["name"] ?></td>
                        <td class="center"><?= $RS1["com_email"] ?></td>
                        <? if ($RS1['site'] == 'main') $domain = '/' . $domain_name; else $domain = '/' . $RS1['site'] . '.' . $domain_name; ?>

                        <td><a target="_blank"
                               href="/<?= "$domain/company/{$RS1['la']}/{$RS1['id']}/" . insert_dash($RS1['title']) ?>"><?= $RS1["title"] ?></a>
                        </td>

                        <? get_result("select user_name from new_managers where id={$RS1["user_id"]}", $coms_conect) ?>
                        <td class="center"><?= $RS1["manager_name"] ?></td>

                        <!--                        <td><a href="/--><? //= $domain ?><!--" target="_blank">-->
                        <? //= $RS1['site'] ?><!--</a></td>-->

                        <!--                        <td>--><? //= $RS1["view"] ?><!--</td>-->

                        <td><?= miladitojalaliuser(date('Y-m-d', $RS1["date"])) ?></td>
                        <td><label></label>
                            <input id="<?= $RS1['id'] ?>"
                                   name="switch-field-1" <? if ($RS1['can_comment'] == 1) echo 'checked' ?>
                                   class="ace ace-switch ace-switch-5 can_comment" type="checkbox"/>
                            <span title="فعال سازي نظر" class="lbl"></span></td>

                        <!--                            <td>-->
                        <!--					<span data-value="-->
                        <? //= $RS1["status"] ?><!--" class="status_content editable editable-click"-->
                        <!--                          data-pk="--><? //= $RS1["id"] ?><!--">-->
                        <!--					--><? // if ($RS1["status"] == 1) {
                        //                        echo 'منتشر شده';
                        //                    } else {
                        //                        echo 'پيش نويس';
                        //                    } ?><!--</span>-->
                        <!--                            </td>-->
                        <!--                        --><? // } ?>
                        <td>
                            <? if ($_SESSION["can_edit"] == 1) {
                                ?>
                                <a id="<?= $id ?>" class="edit_menu blue icon"
                                   href="newcoms.php?yep=new_company_text&edit_id=<?= $id ?>">
                                    <i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
                                </a>
                            <? }
                            if ($_SESSION["can_delete"] == 1) {
                                ?>
                                <a href="#" id="<?= $id ?>" class="red del_menu icon" data-title="delete"
                                   data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                    <i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
                                </a>
                                <a href="/<?= "$domain/company/{$RS1['la']}/{$RS1['id']}/" . insert_dash($RS1['name']) ?>"
                                   target="_blank" class="del_menu blue icon">
                                    <i class="ace-icon fa fa-vimeo-square bigger-120" title="نمایش"></i>
                                </a>
                            <? }
                            if (get_result("select count(id) from new_madules_comment where type=19 and status=0 and madul_id={$RS1['id']}", $coms_conect)) {
                                ?>

                                <a href="/newcoms.php?yep=new_company_comment&id=<?= $RS1['id'] ?>" target="_blank"
                                   id="<?= $id ?>" class="green new_scomments icon">
                                    <?= mudoal_comment_count($RS1['id'], 1, $coms_conect) ?><i
                                            class="ace-icon fa fa-comments bigger-120" title="نظرات"></i>
                                </a>
                            <? }
                            $movie = get_result("SELECT adress FROM  new_file_path  WHERE type=19 and name='company_video' and id={$RS1['id']}", $coms_conect);
                            if ($movie > "") {
                                ?>
                                <a href="#" id="<?= $movie ?>" class="show_video_modual icon" data-toggle="modal"
                                   data-target="#show_video_grid">
                                    <i class="ace-icon fa fa-film bigger-120" title="فیلم"></i>
                                </a>
                            <? } ?>
                            <? $album = get_result("SELECT adress FROM  new_file_path  WHERE type=19 and name='company_gallery' and id={$RS1['id']}", $coms_conect);
                            if ($album > "") {
                                ?>
                                <a href="#" id="<?= $id ?>" class="green show_company_gallery icon" data-toggle="modal"
                                   data-target="#show_company_gallery">
                                    <i class="ace-icon fa fa-picture-o bigger-120" title="البوم عکس"></i>
                                </a>
                            <? } ?>
                            <? $voice = get_result("SELECT adress FROM  new_file_path  WHERE type=19 and name='company_sound' and id={$RS1['id']}", $coms_conect);
                            if ($voice > "") {
                                ?>
                                <a href="#" id="<?= $voice ?>" class="blue show_video_modual icon">
                                    <i class="ace-icon fa fa-volume-up bigger-120" title="صدا" data-toggle="modal"
                                       data-target="#show_video_grid"></i>
                                </a>
                            <? } ?>
                            <? $attach = get_result("SELECT adress FROM  new_file_path  WHERE type=19 and name='company_attach' and id={$RS1['id']}", $coms_conect);
                            if ($attach > "") {
                                ?>
                                <a href="<?= $attach ?>" id="<?= $id ?>" class="red new_files icon">
                                    <i class="ace-icon fa fa-file  bigger-120" title="فایل پیوست"></i>
                                </a>
                            <? } ?>
                            <!--                            <label></label>-->
                            <!--                            <input id="--><? //= $id ?><!--"-->
                            <!--                                   name="switch-field-1" --><? // if ($RS1['mudoal_lock'] == 1) echo 'checked' ?>
                            <!--                                   class="ace ace-switch ace-switch-6 conchkNumber_4" type="checkbox"/>-->
                            <!--                            <span title="فعال سازی" class="lbl"></span>-->
                        </td>
                    </tr>
                <? } ?>
                </tbody>
            </table>
            <?= $pgsel ?>
            <!-- /section:content/contenttext.table -->
        </div>

        <div class="tab-pane <? if ($edit_id != "" || $add_new == 1) echo 'active'; ?>" id="add_templates">

            <form id="contenttext" name="contenttext" class="" action="" role="form" method="post"
                  enctype="multipart/form-data"
                  data-fv-framework="bootstrap"
                  data-fv-message="This value is not valid"
                  data-fv-icon-validating="glyphicon glyphicon-refresh">
                <div id="id-message-new-navbar" class="message-navbar clearfix">
                    <input type="hidden" name="array_value" id="array_value">
                    <input name='user_token' value='<?= $_SESSION['session_token'] ?>' type="hidden">
                    <input type="hidden" name="edit_mode" id="edit_mode" value="<?= $edit_id ?>">
                    <input type="hidden" name="status" id="status" value="<?= $status ?>">
                    <input type="hidden" id="check_value" name="check_value" value="0">
                    <? if ($_SESSION["can_add"] == 1) { ?>
                        <a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom"
                           title="" class="save submit2" data-original-title="انتشار">
					<span class="flaticon-verified9">
					</span>
                        </a>
                    <? } ?>
                    <input type='submit' id='submit_btn' style='display:none'>
                    <? if ($_SESSION["can_draft"] == 1) { ?>
                        <a href="#" class="save-draft2" data-toggle="tooltip" data-placement="bottom" title=""
                           data-original-title="پیش نویس">
					<span class="flaticon-browser93">
					</span>
                        </a>
                    <? } ?>
                    <a href="newcoms.php?yep=new_company_text" data-toggle="tooltip" data-placement="bottom" title=""
                       class="cencel" data-original-title="بازگشت">
					<span class="flaticon-left-arrow9">
					</span>
                    </a>
                </div>
                <br>
                <fieldset style="margin-top: -15px;">
                    <div class="tabbable tabs-left">
                        <ul class="nav nav-tabs" id="myTab">
                            <li>
                                <a data-toggle="tab" href="#home">
                                    <p class="flaticon-file23">ثبت شرکت</p>

                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#cat3">
                                    <p class="flaticon-squares36"></p>
                                    دسته بندی
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#navication">
                                    <p class="flaticon-gallery7"></p>
                                    نوار ناوبری
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#SEO3">
                                    <p class="flaticon-search103"></p>
                                    SEO
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#slide">
                                    <p class="flaticon-folder23"></p>
                                    اسلايدشو
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#slide_esp">
                                    <p class="flaticon-folder23"></p>
                                    اسلايدشو اختصاصی
                                </a>
                            </li>
                            <li class="sss" id="fff">
                                <a data-toggle="tab" href="#gallery">
                                    <p class="flaticon-gallery7"></p>
                                    گالري تصاوير
                                </a>
                            </li>
                            <li class="sss" id="ddd">
                                <a data-toggle="tab" href="#video">
                                    <p class="flaticon-videoplayer5"></p>
                                    ويدئو
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#company_info">
                                    <p class="flaticon-copy23"></p>
                                    اطلاعات شرکت
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#company_boss">
                                    <p class="flaticon-copy23"></p>
                                    اطلاعات مدیرعامل
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#info_caller">
                                    <p class="flaticon-copy23"></p>
                                    اطلاعات تماس
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_products">
                                    <p class="flaticon-copy23"></p>
                                    محصولات
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_catalog">
                                    <p class="flaticon-copy23"></p>
                                    کاتالوگ و فایل ها
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_representation">
                                    <p class="flaticon-copy23"></p>
                                    نمایندگی ها
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#tab_active">
                                    <p class="flaticon-copy23"></p>
                                    فعالیت شرکت
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#tab_distributors">
                                    <p class="flaticon-copy23"></p>
                                    توزیع کننده ها
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" style="min-height: 640px;">
                            <div class="tab-pane active" id="home">
                                <div class="page-content-area">
                                    <div class="page-body" style="margin-top: 25px;">
                                        <!-- #section:content/contenttext.content -->
                                        <div class="col-md-8">

                                            <div class="row">


                                                <div class="form-group row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="control-label">نام شرکت</label>
                                                        <input value="<?= $edit_name ?>" name="name" id="name"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="control-label">نام url</label>
                                                        <input value="<?= $edit_name_url ?>" name="name_url"
                                                               id="name_url"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="control-label">آدرس سایت شرکت</label>
                                                        <input type="text" value="<?= $title ?>" name="title" id="title"
                                                               class="form-control"
                                                               data-fv-notempty="true"
                                                               data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
                                                        <input class="form-group" name="chkbx_link"
                                                               id="chkbx_link" <? if ($chkbx_link == 1) echo 'checked'; ?>
                                                               type="checkbox">
                                                        <label for="chkbx_link">لینک سایت فعال باشد؟<span
                                                                    id="chklnk"></span></label>
                                                    </div>

                                                </div>
                                                <div class="form-group row">

                                                </div>
                                            </div>

                                            <script>
                                                /////////////// radio show hide upload image
                                                $(document).ready(function () {
                                                    if ($('#chkbx_link').is(':checked') == true) {
                                                        $('#chklnk').text('آری');
                                                    } else {
                                                        $('#chklnk').text('نه');
                                                    }

                                                    $('input[name$="upload_type"]').click(function () {
                                                        if ($(this).attr("value") == "1") {
                                                            $(".box").not(".red").hide();
                                                            $(".red").show();
                                                        }
                                                        if ($(this).attr("value") == "2") {
                                                            $(".box").not(".green").hide();
                                                            $(".green").show();
                                                        }
                                                    });
                                                });
                                                $('#chkbx_link').click(function () {

                                                    if ($('#chkbx_link').is(':checked') == true) {
                                                        $('#chklnk').text('آری');
                                                        $('#chkbx_link').val(1);
                                                    } else {
                                                        $('#chklnk').text('نه');
                                                        $('#chkbx_link').val(0);
                                                    }
                                                });
                                            </script>


                                            <h4>تصوير</h4>
                                            <div class="form-group" id="oracup">
                                                <label class="control-label col-md-12">
                                                    <input type="radio" name="upload_type" <? if ($upload_type == 1)
                                                        echo 'checked' ?> id="upload_type" value="1">
                                                    الصاق از فایل کامپیوتر
                                                </label>
                                                <div class="ui-sortable red box" id="upload_type1"
                                                     style="float:right; <? if ($upload_type == 1) echo 'display:block'; else echo 'display:none' ?>">
                                                    <div id="company_image_avatar" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $upload_type == 1) {
                                                        $query = "select adress from new_file_path where id='$edit_id' and type=19 and name='company_image'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';

                                                        $pic_str = '';
                                                        $RS1 = $result->fetch_assoc();
                                                        $temp = explode("/files/", $RS1['adress']);
                                                        $company_image_avatar = $temp[1];
//                                                        $company_image_avatar = trim($company_image_avatar, " ");
                                                        $div_id = explode(".", $company_image_avatar);
//                                                        echo 'ww=';print_r($div_id);
                                                        $pic_str .= "<div class='multibox file' style='cursor: move;' id='$company_image_avatar' filename='$company_image_avatar'>";
                                                        $pic_str .= "<div class='picture_delete'  ></div>";
                                                        $pic_str .= "<img src='new_gallery/files/$company_image_avatar' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                        $pic_str .= "<input type='hidden' value='$company_image_avatar' name='company_image_avatar[]'>";
                                                        $pic_str .= "</div>";
//                                                       $pic_str=explode(" ",$pic_str);echo 'aa='.$company_image_avatar;
                                                    } ?>
                                                </div>
                                                <script type="text/javascript">
                                                    $(document).ready(function () {


                                                        $('#company_image_avatar').orakuploader({
                                                            orakuploader_path: 'new_orakuploader/',
                                                            orakuploader_main_path: 'new_gallery/files/',
                                                            orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                            orakuploader_use_main: false,
                                                            //orakuploader_use_sortable : true,
                                                            orakuploader_use_dragndrop: true,
                                                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                            orakuploader_add_label: 'آپلود تصویر',
                                                            orakuploader_thumbnail_size: 400,
                                                            orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                            orakuploader_maximum_uploads: 1,
                                                        });
                                                        $('#company_image_avatar').html("<?=$pic_str?>");
                                                    });
                                                </script>
                                            </div>

                                            <label class="control-label col-md-12">
                                                <input type="radio"
                                                       name="upload_type" <? if ($upload_type == "" or $upload_type != 1) echo 'checked'; ?>
                                                       id="radios-1" value="2">
                                                انتخاب از رسانه های قبلی
                                            </label>

                                            <div class="form-group green box" id="upload_type2"
                                                 style="<? if ($upload_type != 1) echo 'display:block'; else echo 'display:none' ?>">
                                                <div class="form-group col-md-6">
                                                    <div class="imgdemo"><img id="aks_company_thumb"
                                                                              src="/yep_theme/default/rtl/images/pic.png">
                                                    </div>
                                                    <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                    <div style="display: inline-flex;">
                                                        <script>
                                                            setInterval(check_address, 2000)

                                                            function check_address() {
                                                                var aks_company = $('#company_imag').val();
                                                                if (aks_company != "") {
                                                                    $('#aks_company_thumb').attr("src", aks_company);
                                                                }
                                                            }
                                                        </script>
                                                        <a href="/filemanager/dialog.php?type=2&amp;field_id=company_imag"
                                                           class="btn btn-success iframe-btn"
                                                           style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span
                                                                    class="addimg flaticon-add139"></span></a>
                                                        <input type="text" name="company_image"
                                                               value="<? if ($upload_type == 2) echo $company_image; ?>"
                                                               id="company_imag" class="imginput">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">معرفی شرکت*</label>
                                                    <textarea id="text" name="text" class="form-control"
                                                              rows="3"><?= $edit_text ?></textarea>
                                                    <script>
                                                        tinymce.init({
                                                            selector: "#text",
                                                            height: 300,
                                                            width: "99.5%",
                                                            directionality: 'rtl',
                                                            language: 'fa_IR',
                                                            menubar: true,
                                                            skin: 'flat',
                                                            plugins: [
                                                                "advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",
                                                                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                                                                "fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "
                                                            ],
                                                            image_advtab: true,
                                                            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",
                                                            font_formats: 'iraniansans=iraniansans',
                                                            image_advtab: true,
                                                            external_filemanager_path: "/filemanager/",
                                                            filemanager_title: "مديريت فايل",
                                                            external_plugins: {"filemanager": "/filemanager/plugin.min.js"},
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">منبع</label>
                                                    <input value="<?= $edit_source_company ?>" name="source_company"
                                                           id="source_company" class="form-control">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">لینک معرفی</label>
                                                    <input value="<?= $edit_source_link_company ?>"
                                                           name="source_link_company" id="source_link_company"
                                                           class="form-control" placeholder="http://sample.com"
                                                           style="direction: ltr;">
                                                </div>
                                            </div>
                                        </div>
                                        <style>
                                            @media (min-width: 998px) {
                                                .startend {
                                                    text-align: center;
                                                }
                                            }
                                        </style>
                                        <div class="col-md-4 mset">
                                            <div class="form-group" id="show_sites">
                                                <label class="control-label col-md-4" for="group_name">سايت*</label>
                                                <div class="form-group col-md-8">
                                                    <? create_sub_site_title($site_id, $coms_conect, $_SESSION['manager_title_site']); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="family">زبان</label>
                                                <div class="form-group col-md-8">
                                                    <select id="manage_lang" name="manage_lang" class=" col-md-12">
                                                        <? $query = "select title,name from new_language where status=1";
                                                        $result = $coms_conect->query($query);
                                                        while ($RS1 = $result->fetch_assoc()) {
                                                            $title1 = $RS1['title'];
                                                            $name = $RS1['name'];
                                                            $str = "";
                                                            if ($la == $title1 || $change_lang == $title1)
                                                                $str = "selected";
                                                            echo "<option value='$title1' $str>$name</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 mdate">
                                                    <label class="control-label" style="width: 123%;">تاريخ
                                                        انتشار</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input id="publish_date"
                                                           value="<? if ($publish_date == "") echo miladitojalaliuser(date('Y-m-d')); else echo $publish_date ?>"
                                                           name="publish_date" class="form-control"/>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>
                            <? $type = 19; ?>
                            <? include 'newcoms/main/new_modual_seo.php4'; ?>
                            <? include 'newcoms/main/new_modual_slide.php4'; ?>

                            <!--                ================= شروع ویدئو آپلود          -->
                            <div id="video" class="tab-pane fade">
                                <div class="page-content-area" id="gallery5">
                                    <div class="page-body" style="margin-top: 25px;">
                                        <fieldset>
                                            <!-- #section:video/video.vid -->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label"
                                                           style="width: 120px;text-align: right;">فایل ویدئو
                                                        (MP4)</label>
                                                    <div class="form-group input-group">
                                                        <div class="col-md-12">
                                                            <div class="entry-mark">
                                                            </div>
                                                            <div class="form-group">
                                                                <input id="company_video"
                                                                       value="<?= $company_video ?>"
                                                                       name="company_video"
                                                                       class="imginput"
                                                                       type="text">
                                                                <a href="/filemanager/dialog.php?type=3&amp;field_id=company_video"
                                                                   class="holam btn btn-primary iframe-btn"><span
                                                                            class="holam flaticon-search85"></span></a>
                                                                <a href="#" id="add_videos"
                                                                   class="holam btn btn-success  " title="افزودن"><span
                                                                            class="holam flaticon-round68"></span></a>
                                                                <a href="#" id="del_videos"
                                                                   class="holam btn btn-danger  " title="حذف"><span
                                                                            class="holam flaticon-delete84"></span></a>
                                                            </div>
                                                            <!--div class="form-group"><input type="button" id="add_videos" class="form-control" value="اضافه کردن" style="margin-bottom: -12px;"></div>
                                                            <div class="form-group"><input type="button" id="del_videos" class="form-control" value="پاک کردن"></div-->
                                                            <img id="show_waiting_video" src="waiting.gif" dir="center"
                                                                 style="display:none">
                                                        </div>
                                                    </div>

                                                    <!--grid video start-->
                                                    <label class="control-label col-md-12" style="text-align:right">
                                                        <input type="radio"
                                                               name="pic_type" <? if ($pic_type != 2) echo 'checked'; ?>
                                                               id="pic_type1" value="1" checked>
                                                        تصویر گرفته شده خودکار
                                                    </label>
                                                    <div <? if ($pic_type != 2) echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>
                                                            id="show_video" class="row red box">

                                                    </div>

                                                    <label class="control-label col-md-12" style="text-align:right">
                                                        <input type="radio"
                                                               name="pic_type" <? if ($pic_type == 2) echo 'checked'; ?>
                                                               id="pic_type2" value="2">
                                                        انتخاب از رسانه های قبلی
                                                    </label>

                                                    <div class="form-group green box" <? if ($pic_type == 2) echo 'style="display:block;"'; else echo 'style="display:none;"'; ?>>
                                                        <div class="form-group col-md-6">
                                                            <div class="imgdemo"><img id="aks_vide_thumb"
                                                                                      src="/yep_theme/default/rtl/images/pic.png">
                                                            </div>
                                                            <!--img data-src="holder.js/100%x100%" id="aks_news_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                            <div style="display: inline-flex;">
                                                                <script>
                                                                    setInterval(check_address, 2000)

                                                                    function check_address() {
                                                                        var aks_news = $('#video_pic').val();
                                                                        if (aks_news != "")
                                                                            $('#aks_vide_thumb').attr("src", aks_news);
                                                                        else
                                                                            $('#aks_vide_thumb').attr("src", '/new_gallery/video.jpg');
                                                                    }
                                                                </script>
                                                                <a href="/filemanager/dialog.php?type=2&amp;field_id=video_pic"
                                                                   class="btn btn-success iframe-btn"
                                                                   style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span
                                                                            class="addimg flaticon-add139"></span></a>
                                                                <input type="text" name="video_pic"
                                                                       value="<? if ($pic_type == 2) echo $video_pic ?>"
                                                                       id="video_pic" class="imginput">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="alert alert-info">
                                                        <strong><span class="flaticon-information51"
                                                                      style="color: #124C69;"></span><span
                                                                    style="    vertical-align: super;margin-right: 5px;font-size: 12pt;color: #124C69;">راهنما</span></strong>
                                                        <p> متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن
                                                            راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن
                                                            راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن
                                                            راهنما متن راهنما</p>
                                                    </div>
                                                </div>
                                                <!-- /section:video/video.vid -->
                                            </div>
                                            <? if ($edit_id > "" && $video_video > "") { ?>
                                                <script>
                                                    if ($("#video_video").val()) {
                                                        $("#show_waiting_video").show();
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: 'New_ajax_company.php',
                                                            data: "action=show_videos_company&id=" + $("#video_video").val() + "&secend_value=<?=$edit_id?>",
                                                            success: function (result) {
                                                                alert(result);
                                                                $("#show_waiting_video").hide();
                                                                $("#show_video").html(result);
                                                            }
                                                        });
                                                    }
                                                </script>


                                            <? } ?>


                                            </br>
                                            </br>
                                            </br>
                                            </br>
                                        </fieldset>

                                    </div>
                                </div>
                            </div>
                            <!--                ================= پایان ویدئو آپلود          -->


                            <script>
                                /////////////// radio show hide upload image
                                $(document).ready(function () {
                                    $('input[name$="album_type"]').click(function () {
                                        if ($(this).attr("value") == "2") {
                                            $(".box").not(".red").hide();
                                            $(".red").show();
                                        }
                                        if ($(this).attr("value") == "1") {
                                            $(".box").not(".blue").hide();
                                            $(".blue").show();
                                        }
                                    });
                                });
                            </script>

                            <div id="gallery" class="tab-pane fade">
                                <div class="page-content-area">
                                    <div class="page-body" style="margin-top: 25px;">
                                        <fieldset>
                                            <!-- #section:content/contenttext.gallery -->
                                            <div class="col-md-12">
                                                <div class="col-md-4">
                                                    <label class="control-label">
                                                        <input type="radio"
                                                               name="album_type" <? if ($album_type != 2) echo 'checked' ?>
                                                               id="radios-11" value="1">
                                                        الصاق از فایل کامپیوتر
                                                    </label>
                                                </div>
                                                <div class="col-md-8">
                                                    <label class="col-md-5 control-label">
                                                        <input type="radio"
                                                               name="album_type" <? if ($album_type == 2) echo 'checked' ?>
                                                               id="radios-12" value="2">
                                                        انتخاب از رسانه های قبلی
                                                    </label>

                                                    <div class="col-md-7 red box form-group" id="album_type2"
                                                         style="left: 8%;<? if ($album_type == 2) echo 'display:block'; else echo 'display:none' ?>">
                                                        <input type="text" value="" id="content_gallery">
                                                        <a href="/filemanager/dialog.php?type=1&amp;field_id=content_gallery"
                                                           class="holam btn btn-primary iframe-btn" title="انتخاب"><span
                                                                    class="holam flaticon-search85"></span></a>
                                                        <a class="btn btn-success holam" href="#"
                                                           id="add-image-to-gallery" title="افزودن"><span
                                                                    class="holam flaticon-round68"></span></a>
                                                        <img id="show_waiting" src="waiting.gif" style="display:none">

                                                        <select hidden id="imagelist" name="imagelist[]"
                                                                multiple="multiple">
                                                            <? if ($album_type == 2) {
                                                                $query = "SELECT * FROM new_file_path where id='$edit_id' && name='company_gallery'";

                                                                $gallery_result = $coms_conect->query($query);
                                                                while ($RS1 = $gallery_result->fetch_assoc()) {
                                                                    $adress = $RS1["adress"];
                                                                    echo '<option value="' . $adress . '" selected="selected">' . $adress . '</option>';
                                                                    ?>
                                                                    <script>
                                                                        $(document).ready(function () {
                                                                            var aks = '<?=$RS1["adress"]?>';
                                                                            //event.preventDefault();
                                                                            var html_string = '<li><div><img width="105" height="105" alt="105x105" src="' + aks + '"/>' +
                                                                                '<div class="text">' +
                                                                                '<div class="inner">' +
                                                                                '<span>' +
                                                                                <?="'" . get_pic_name($RS1['adress']) . "'"?>+
                                                                                    '</span>' +
                                                                                '<div class="tools"><a href="' + aks + '" data-rel="colorbox"><i class="ace-icon fa fa-search-plus"></i></a><a   data-id="<?=$edit_id?>" data-addres="' + aks + '" id="delete_image" href="#"><i class="ace-icon fa fa-times red"></i></a></div></div></div></div></li>';
                                                                            $("#gallery-img").append(html_string);
                                                                        });
                                                                    </script>
                                                                    <?
                                                                }
                                                            }
                                                            ?>
                                                        </select>

                                                        <!-- uploaded image -->

                                                    </div>

                                                    <script>
                                                        $("#add-image-to-gallery").click(function (event) {
                                                            event.preventDefault();
                                                            var aks = $("#content_gallery").val();
                                                            var index = aks.lastIndexOf("/") + 1;
                                                            var filename = aks.substr(index);
                                                            if (aks != "") {
                                                                $("#show_waiting").show();
                                                                $("#add-image-to-gallery").attr("disabled", false);
                                                                var html_string = '<li><div><img width="105" height="105" alt="105x105" src="' + aks + '"/><div class="text"><div class="inner"><span>' + filename + '</span><div class="tools"><a href="' + aks + '" data-rel="colorbox"><i class="ace-icon fa fa-search-plus"></i></a><a data-id="' + aks + '" id="delete_image" href="#"><i class="ace-icon fa fa-times red"></i></a></div></div></div></div></li>';
                                                                $("#gallery-img").append(html_string);
                                                                $("#imagelist").append('<option value="' + aks + '" selected="selected">' + aks + '</option>')
                                                                $("#content_gallery").val("");//empty textbox
                                                                $("#show_waiting").hide();
                                                            }
                                                        });
                                                        $(document).ready(function () {
                                                            $(document).on('click', '#delete_image', function (event) {
                                                                event.preventDefault();
                                                                var address = $(this).parentsUntil("ul").find('img').attr("src");
                                                                $(this).parentsUntil("ul").remove();
                                                                $("#imagelist option[value='" + address + "']").remove();
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: 'New_ajax.php',
                                                                    data: "action=delete_ajax_contentpic&id=" + $(this).attr('data-id') + "&value=" + $(this).attr('data-addres'),
                                                                    success: function (result) {
                                                                    }

                                                                });
                                                            });
                                                        });
                                                    </script>

                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <hr>

                                            <ul id="gallery-img" class="ace-thumbnails clearfix red box">
                                                <? if ($album_type == 2) {
                                                    while ($RSG = $gallery_result->fetch_assoc()) {
                                                        $adress = $RSG["adress"];
                                                        ?>
                                                        <li>
                                                            <div>
                                                                <img width="105" height="105" alt="105x105"
                                                                     src="<?= $adress ?>"/>
                                                                <div class="text">
                                                                    <div class="inner">
                                                                        <span><?= basename($adress) ?></span>
                                                                        <div class="tools">
                                                                            <a href="<?= $adress ?>"
                                                                               data-rel="colorbox">
                                                                                <i class="ace-icon fa fa-search-plus"></i>
                                                                            </a>
                                                                            <a id="delete_image" href="#">
                                                                                <i class="ace-icon fa fa-times red"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    <? }
                                                } ?>
                                            </ul>


                                            <div class="form-group blue box" id="album_type1"
                                                 style="<? if ($album_type != 2) echo 'display:block'; else echo 'display:none' ?>">
                                                <div class="col-md-12" id="fffffffffffff">
                                                    <input type="checkbox" id="watermark_check">
                                                    <label class="control-label "> افزودن واتر مارک</label>
                                                    <img src="/waiting.gif" id="watermark_check_pic"
                                                         style="display:none">
                                                </div>
                                                <div class="ui-sortable" style="float:right">
                                                    <div id="company_image_album" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $album_type == 1) {
                                                        $query = "select adress from new_file_path where id='$edit_id' and type=19 and name='company_gallery'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';
                                                        $pic_str = '';
                                                        while ($RS1 = $result->fetch_assoc()) {
                                                            $company_image_album = $RS1['adress'];
                                                            $temp = explode("/files/", $RS1['adress']);
                                                            $company_image_album = $temp[1];
                                                            $div_id = explode(".", $company_image_album);
                                                            $pic_str .= "<div class='multibox file' style='cursor: move;' id='$company_image_album' filename='$company_image_album'>";
                                                            $pic_str .= "<div class='picture_delete'  ></div>";
                                                            $pic_str .= "<img src='/new_gallery/files/tn/$company_image_album' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                            $pic_str .= "<input type='hidden' value='$company_image_album' name='company_image_album[]' />";
                                                            $pic_str .= "</div>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>


                                            <!-- /section:content/contenttext.gallery -->
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#company_image_album').orakuploader({
                                        orakuploader_path: 'new_orakuploader/',
                                        orakuploader_main_path: 'new_gallery/files',
                                        orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                        orakuploader_use_main: false,
                                        //orakuploader_use_sortable : true,
                                        orakuploader_use_dragndrop: true,
                                        orakuploader_add_image: 'new_orakuploader/images/add.png',
                                        orakuploader_add_label: 'آپلود تصویر',
                                        orakuploader_resize_to: <?=get_result("select address from new_default_navbar where name='gallery_pic_size'  and la='fa' and site='main'", $coms_conect)?>,
                                        orakuploader_thumbnail_size: 400,
                                        orakuploader_watermark: 'new_gallery/watermark/water_mark.png',
                                    });

                                    $('#company_image_album').html("<?=$pic_str?>");
                                });
                            </script>

                            <? $type = 4;
                            include 'newcoms/main/new_modual_catogory.php4';
                            $type = 19;
                            ?>
                            <!-- #section:download/     شروع ناوبری     -->
                            <div id="navication" class="tab-pane">

                                <!-- #section:download/download.nav -->
                                <div class="form-group" style="margin-top:25px;">
                                    <label class="control-label" for="selectbasic">انتخاب منبع تصوير ناوبری</label>


                                    <p class="fdesc" style="width: 100px;"><span
                                                class="flaticon-information51"></span><span>متن راهنما</span></p>
                                    <div class="col-md-4">
                                        <select id="source_pic" name="source_pic" class="form-control">
                                            <option value="0">استفاده از تصوير پيش فرض</option>
                                            <option value="1">آپلود تصوير اختصاصي</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="form-group" id="nav_pic_div" style='display:none'>


                                    <div class="form-group" id="oracup">
                                        <label class="control-label col-md-12">
                                            <input type="radio" name="upload_type_nav" <? if ($upload_type_nav == 1)
                                                echo 'checked'; ?> id="upload_type_nav" value="1">
                                            الصاق از فایل کامپیوتر
                                        </label>
                                        <div class="ui-sortable red_nav box_nav" id="upload_type1_nav"
                                             style="float:right; <? if ($upload_type == 1) echo 'display:block'; else echo 'display:none' ?>">
                                            <div id="company_image_avatar_nav" orakuploader="on"></div>
                                            <? if ($edit_id > "" && $upload_type_nav == 1) {
                                                $query_nav = "select navication_pic from new_company where id='$edit_id' ";
                                                $result_nav = $coms_conect->query($query_nav);
                                                $i = 1;
                                                $str = '';
                                                $articles_list = '';

                                                $pic_str_nav = '';
                                                $RS1_nav = $result_nav->fetch_assoc();
                                                $company_image_avatar_nav = end(explode("/", $RS1_nav['navication_pic']));
//                                                $company_image_avatar = $temp[1];
//                                                        $company_image_avatar = trim($company_image_avatar, " ");
                                                $div_id = explode(".", $company_image_avatar_nav);
//                                                        echo 'ww=';print_r($div_id);
                                                $pic_str_nav .= "<div class='multibox file' style='cursor: move;' id='$company_image_avatar_nav' filename='$company_image_avatar_nav'>";
                                                $pic_str_nav .= "<div class='picture_delete'  ></div>";
                                                $pic_str_nav .= "<img src='new_gallery/files/$company_image_avatar_nav' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                $pic_str_nav .= "<input type='hidden' value='$company_image_avatar_nav' name='company_image_avatar_nav[]'>";
                                                $pic_str_nav .= "</div>";
//                                                       $pic_str=explode(" ",$pic_str);echo 'aa='.$company_image_avatar;
                                            } ?>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function () {


                                                $('#company_image_avatar_nav').orakuploader({
                                                    orakuploader_path: 'new_orakuploader/',
                                                    orakuploader_main_path: 'new_gallery/files/',
                                                    orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                    orakuploader_use_main: false,
                                                    //orakuploader_use_sortable : true,
                                                    orakuploader_use_dragndrop: true,
                                                    orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                    orakuploader_add_label: 'آپلود تصویر',
                                                    orakuploader_thumbnail_size: 400,
                                                    orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                    orakuploader_maximum_uploads: 1,
                                                });
                                                $('#company_image_avatar_nav').html("<?=$pic_str_nav?>");
                                            });
                                        </script>
                                    </div>

                                    <label class="control-label col-md-12">
                                        <input type="radio"
                                               name="upload_type_nav" <? if ($upload_type_nav != 1) echo 'checked'; ?>
                                               id="radios-1" value="2">
                                        انتخاب از رسانه های قبلی
                                    </label>

                                    <div class="form-group green_nav box_nav" id="upload_type2_nav"
                                         style="<? if ($upload_type_nav != 1) echo 'display:block'; else echo 'display:none' ?>">
                                        <div class="form-group col-md-6">
                                            <div class="imgdemo"><img id="aks_company_thumb_nav"
                                                                      src="/yep_theme/default/rtl/images/pic.png">
                                            </div>
                                            <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                            <div style="display: inline-flex;">
                                                <script>
                                                    setInterval(check_address1, 2000)

                                                    function check_address1() {
                                                        var aks_company_nav = $('#company_image_nav').val();
                                                        if (aks_company_nav != "") {
                                                            $('#aks_company_thumb_nav').attr("src", aks_company_nav);
                                                        }
                                                    }
                                                </script>
                                                <a href="/filemanager/dialog.php?type=2&amp;field_id=company_image_nav"
                                                   class="btn btn-success iframe-btn"
                                                   style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span
                                                            class="addimg flaticon-add139"></span></a>
                                                <input type="text" name="company_image_nav"
                                                       value="<? if ($upload_type_nav == 2) echo $navication_pic; ?>"
                                                       id="company_image_nav" class="imginput">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <script>
                                    $(document).ready(function () {
                                        //var utn =<?//=$upload_type_nav?>//;
                                        //// alert(utn);
                                        //if (utn == 1 || utn == 2) {
                                        //    $("#nav_pic_div").show();
                                        //    $("#source_pic").val(1);
                                        //}


                                        $('input[name$="upload_type_nav"]').click(function () {
                                            if ($(this).attr("value") == "1") {
                                                $(".box_nav").not(".red_nav").hide();
                                                $(".red_nav").show();
                                            }
                                            if ($(this).attr("value") == "2") {
                                                $(".box_nav").not(".green_nav").hide();
                                                $(".green_nav").show();
                                            }
                                        });
                                    });
                                    $("#source_pic").change(function () {
                                        if ($(this).val() == 1) {
                                            $("#nav_pic_div").show();
                                            // $("#navication_pic").val('');
                                        }
                                        else {
                                            $("#nav_pic_div").hide();
                                            // $("#navication_pic").val('');
                                            // $('#aks_thumb').attr("src", '');
                                        }
                                    });
                                </script>
                                </br>
                                </br>
                                </br>
                                </br>

                                <!-- #section:content/پایان اسلایدشو -->
                            </div>

                            <!--    --------------------                        start slide_esp-->
                            <div id="slide_esp" class="form-group row tab-pane fade">
                                <div class="page-content-area" id="more7">
                                    <div class="page-body" style="margin-top: 25px;">
                                        <fieldset>
                                            <!-- #section:download/download.link -->


                                            <!--                                            -->
                                            <? $count_slide_esp = "select count(id) from new_company_slide_esp where id_com='$edit_id'";
                                            $query_slide_esp = "select * from new_company_slide_esp WHERE  id_com='$edit_id'";
                                            $result_slide_esp = $coms_conect->query($query_slide_esp);
                                            $i = 1;
                                            while ($row_slide_esp = $result_slide_esp->fetch_assoc()) {
                                                //                                                                echo $count_slide_esp;
                                                //                                                                print_r($row_slide_esp);}exit;
                                                //                                                                    if ($)
                                                ?>
                                                <div id="div_mother_third_choice_img_smallBox1<?= $i ?>" class="seyed"
                                                     style="opacity: 1;">
                                                    <div class="form-group">
                                                        <a class="col-md-1 control-label del_img_smallBox1"
                                                           id="<?= $i ?>"
                                                           for="family"><i
                                                                    class="fa fa-trash text-danger remove"
                                                                    title="" data-original-title="حذف"></i>

                                                        </a>

                                                        <div class="form-group col-md-11">

                                                            <div class="col-md-4 input-group float-r">
                                                                <input type="text"
                                                                       id="img_slide_esp_year<?= $i ?>"
                                                                       value="<?= $row_slide_esp["big_titr"] ?>"
                                                                       class="form-control"
                                                                       placeholder="عنوان تیتر درشت"
                                                                       name="img_slide_esp_year<?= $i ?>">
                                                            </div>
                                                            <div class="col-md-4 input-group float-r">
                                                                <input type="text"
                                                                       id="img_slide_esp_title<?= $i ?>"
                                                                       value="<?= $row_slide_esp["chip_titr"] ?>"
                                                                       class="form-control"
                                                                       placeholder="عنوان تیتر کوچک"
                                                                       name="img_slide_esp_title<?= $i ?>">
                                                            </div>


                                                            <div class="col-md-8 input-group float-l">
                                                                <input type="text"
                                                                       id="img_slide_esp_pic<?= $i ?>"
                                                                       value="<?= $row_slide_esp["pic_slide_esp"] ?>"
                                                                       class="form-control"
                                                                       placeholder=" لینک تصویر اسلایدشو اختصاصی"
                                                                       name="img_slide_esp_pic<?= $i ?>"
                                                                       style="direction: ltr;">
                                                                <span class="input-group-addon"
                                                                      style="padding: 0px;"><a
                                                                            href="/filemanager/dialog.php?type=2&amp;field_id=img_slide_esp_pic<?= $i ?>"
                                                                            class="btn btn-success iframe-btn"
                                                                            style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                                                class="addimg flaticon-add139"></span></a>
                                                                                                         </span>
                                                                <span class="input-group-addon H_neshane1 H_img_smallBox1<?= $i ?>"
                                                                      style="padding: 0px;">
                                                                                <div id="slide_esp_img_smallBox1_avatar7<?= $i ?>"
                                                                                     orakuploader="on"></div>
                                                                    <!--                                                                    --><?// $row_slide_esp = get_ctlg_result($la, $edit_id, $coms_conect); ?>
                                                                    <!--                                                                    <input type="hidden"-->
                                                                    <!--                                                                           id="slide_esp_img_smallBox1_avatar7-->
                                                                    <?//= $i ?><!--"-->
                                                                    <!--                                                                           title="-->
                                                                    <?//=$row_slide_esp["id"];?><!--"  name="slide_esp_img_smallBox1_avatar7-->
                                                                    <?//= $i ?><!--"-->
                                                                    <!--                                                                           value="-->
                                                                    <?//= $row_slide_esp["pic_slide_esp"] ?><!--">-->
                                                                    <!--                                                                    <input type='hidden' value='-->
                                                                    <?//= $row_slide_esp[$i][""] ?><!--' name='slide_esp_img_smallBox1_avatar7-->
                                                                    <?//=$i?><!--[]' >-->

                                                                                                                   </span>
                                                                <input type="hidden"
                                                                       id="slide_esp_doctor_on_id<?= $i ?>"
                                                                       name="slide_esp_doctor_on_id<?= $i ?>"
                                                                       value="<?= $row_slide_esp['id']; ?>">
                                                                <input type="hidden"
                                                                       id="company_slide_esp_id_com<?= $i ?>"
                                                                       name="company_slide_esp_id_com<?= $i ?>"
                                                                       value="<?= $row_slide_esp['id_com']; ?>">
                                                            </div>
                                                            <div class="ui-sortable red box"
                                                                 id="upload_type_img_smallBox1<?= $i ?>"
                                                                 style="float:right;">
                                                            </div>
                                                            <div class="input-group"
                                                                 id="image_show_img_smallBox1<?= $i ?>">
                                                                <!--                                                                <a href="" class=" without-caption ddddd" >-->
                                                                <!--                                                                    <img width="33" height="33" class="H_cursor_zoom ddddd" src="" alt="">-->
                                                                <!--                                                                </a>-->
                                                                <a href="<?= $row_slide_esp["pic_slide_esp"] ?>"
                                                                   class=" without-caption">
                                                                    <img width="33" height="33" class="H_cursor_zoom"
                                                                         src="<?= $row_slide_esp["pic_slide_esp"] ?>"
                                                                         alt="<?= $row_slide_esp["pic_slide_esp"] ?>">
                                                                </a>
                                                            </div>

                                                            <script type="text/javascript">
                                                                $(document).ready(function () {
                                                                    $('#slide_esp_img_smallBox1_avatar7<?=$i?>').orakuploader({
                                                                        orakuploader_path: 'new_orakuploader/',
                                                                        orakuploader_main_path: 'source/comsroot/defualt/slide_esp',
                                                                        orakuploader_thumbnail_path: 'source/comsroot/defualt/slide_esp/tn',
                                                                        orakuploader_use_main: false,
                                                                        //orakuploader_use_sortable : true,
                                                                        orakuploader_use_dragndrop: true,
                                                                        orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                        orakuploader_add_label: '',
                                                                        //orakuploader_resize_to: <?//=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>//,
                                                                        orakuploader_thumbnail_size: 400,
                                                                        orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                        orakuploader_maximum_uploads: 1
                                                                    });

                                                                    $('#slide_esp_img_smallBox1_avatar7<?= $i ?>').val("<?= $row_slide_esp["pic_slide_esp"] ?>");
                                                                });
                                                            </script>
                                                            <input type="hidden" id="slide_esp_ph_links_count"
                                                                   name="slide_esp_ph_links_count"
                                                                   value="<?= $i; ?>">
                                                        </div>

                                                    </div>

                                                </div>

                                                <?
//                    }
                                                $i++;
                                            }
                                            ?>
                                            <div class="col-md-12">

                                                <a class="btn btn-success block" id="add_img_slide_esp-ads"><i
                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                            class="fa fa-plus"></i>افزودن اسلاید اختصاصی</a>
                                                </br>

                                                <script>
                                                    $(document).ready(function () {
                                                        var i = <?=$i?>;

                                                        $('#add_img_slide_esp-ads').on("click", function () {
                                                            var someText = '<div id="div_mother_third_choice_img_slide_esp' + i + '" data-id="' + i + '" class="seyed  div_mother_third_choice_img_slide_esp" style="background:#87B87F;"> ' +
                                                                '<div class="form-group"><a class="col-md-1 control-label del_img_slide_esp" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> ' +
                                                                '<div class="form-group col-md-11"><div class="col-md-2 input-group float-r">' +
                                                                '<input type="text" id="img_slide_esp_year' + i + '" value="" class="form-control" placeholder="عنوان تیتر درشت" name="img_slide_esp_year' + i + '" >' +
                                                                '</div>' +
                                                                '<div class="col-md-2 input-group float-r">' +
                                                                '<input type="text" id="img_slide_esp_title' + i + '" value="" class="form-control" placeholder="عنوان تیتر کوچک" name="img_slide_esp_title' + i + '" >' +
                                                                '</div>' +
                                                                ' <div class="col-md-8 input-group float-l"> ' +
                                                                '<input type="text" id="img_slide_esp_pic' + i + '" value="" class="form-control" placeholder=" لینک تصویر اسلایدشو اختصاصی" name="img_slide_esp_pic' + i + '" style="direction: ltr;">' +
                                                                '<span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=img_slide_esp_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add139"></span></a></span>' +
                                                                '<span class="input-group-addon H_neshane1 H_img_slide_esp' + i + '" style="padding: 0px;">' +
                                                                '<div  id="img_slide_esp_avatar7' + i + '" orakuploader="on"></div>' +
                                                                '<input type="hidden" id="img_slide_esp_avatar7_link' + i + '" name="img_slide_esp_avatar7_link' + i + '" value=" "></span></div>' +
                                                                '<input type="hidden" id="slide_esp_ph_links_count" value="' + i + '"  name="slide_esp_ph_links_count" >' +
                                                                '<div class="ui-sortable red box" id="upload_type_img_slide_esp' + i + '" style="float:right;">' +
                                                                '</div></div></div></div>';
                                                            $(this).before(someText);


                                                            $('#div_mother_third_choice_img_slide_esp' + i + '').fadeTo('slow', 0.3, function () {
                                                                $(this).css('background', '');
                                                            }).fadeTo('slow', 1);
                                                            $('#img_slide_esp_count').val(i);

                                                            //--------orakuploader
                                                            $('#img_slide_esp_avatar7' + i + '').orakuploader({
                                                                orakuploader_path: 'new_orakuploader/',
                                                                orakuploader_main_path: 'source/comsroot/defualt/slide_esp',
                                                                orakuploader_thumbnail_path: 'source/comsroot/defualt/slide_esp/tn',
                                                                orakuploader_use_main: false,
                                                                //orakuploader_use_sortable : true,
                                                                orakuploader_use_dragndrop: true,
                                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                                orakuploader_add_label: '',
                                                                //orakuploader_resize_to: <?//=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>//,
                                                                orakuploader_thumbnail_size: 400,
                                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                                orakuploader_maximum_uploads: 1
                                                            });

                                                            $('#img_slide_esp_avatar7' + i + '').val("<?= $img_slide_esp[$i]["pic_slide_esp"] ?>");

                                                            $('.input-group-addon.H_img_slide_esp' + i + '').find("div").first().next().css('width', '100px');
                                                            $('.input-group-addon.H_img_slide_esp' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                                                            //    ---end orakuploader
                                                            i++;
                                                        });
                                                        $(document).on('click', '.del_img_slide_esp', function () {
                                                            var id = '';
                                                            var k = $('#img_slide_esp_count').val();
                                                            k--
                                                            id = $(this).attr('id');

                                                            var id_slide_esp = $('#img_slide_esp_avatar7_link' + id).attr('title');
                                                            // alert(id_);
                                                            $('#div_mother_third_choice_img_slide_esp' + id).remove();
                                                            $('#img_slide_esp_count').val(k);
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: 'New_ajax_company.php',
                                                                data: "action=del_company_slide_esp&id_com=" + id_slide_esp,
                                                                success: function (result) {
                                                                    // alert(id_ctlg);
                                                                }
                                                                // $("#relatedcompany_representation").html(result);
                                                                // $("#btn_del_related_company_representation").val('');
                                                            });

                                                        });
                                                        // $(document).on("mouseover", '.div_mother_third_choice_img_slide_esp', function () {
                                                        //     var id_i = $(this).attr('data-id');
                                                        //     $("#img_slide_esp_year" + id_i).datepicker({
                                                        //         changeMonth: true,
                                                        //         changeYear: true,
                                                        //         isRTL: true,
                                                        //         dateFormat: "yy/mm/dd"
                                                        //     });
                                                        // });

                                                    });


                                                </script>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!--    -------------------                        end slide_esp-->


                            <div id="company_info" class="tab-pane">

                                <!-- #section:content/اطلاعات شرکت -->

                                <!--								--><? //$type=19;
                                //								include 'newcoms/main/new_modual_catogory.php4';?>
                                <!--								--><? //include 'newcoms/main/new_nav_pic.php4';?>

                                <div id="company_info" class="form-group row tab-pane ">

                                    <div class="form-group col-sm-6 " style="margin-top: 50px;">
                                        <label class="control-label" for="company_manager_name">نام مدیرعامل</label>
                                        <input class="form-control" type="text" name="company_manager_name"
                                               id="company_manager_name" value="<?= $manager_name ?>">

                                        <label class="control-label" for="company_technical_name">نام مسئول فنی</label>
                                        <input class="form-control" type="text" name="company_technical_name"
                                               id="company_technical_name" value="<?= $tech_name ?>">

                                        <label class="control-label" for="company_num_sabt">شماره ثبت شرکت</label>
                                        <input class="form-control" type="text" id="company_num_sabt"
                                               name="company_num_sabt" value="<?= $num_sabt ?>">

                                        <label class="control-label" for="company_num_code">شناسه ملی</label>
                                        <input class="form-control" type="text" name="company_num_code"
                                               id="company_num_code" value="<?= $num_code ?>">

                                        <label class="control-label" for="company_type">نوع شرکت را انتخاب کنید
                                            :</label>
                                        <select class="form-control" name="company_type" id="company_type">
                                            <? $query1 = "select id,name from new_company_cat_type where type=19";

                                            $result1 = $coms_conect->query($query1);
                                            $i = 1;
                                            $str = '';
                                            while ($RS11 = $result1->fetch_assoc()) {

                                                ?>

                                                <option value="<?= $RS11['id'] ?>" <? if ($RS11['id'] == $com_type) echo 'selected' ?> ><?= $RS11['name'] ?></option>


                                                <? $i++;
                                            } ?>
                                        </select>

                                        <label class="control-label" for="company_date">تاریخ ثبت شرکت</label>
                                        <input class="form-control" id="publish_date1"
                                               value="<? if ($sabt_date == "") echo miladitojalaliuser(date('Y-m-d')); else echo $sabt_date ?>"
                                               name="sabt_date">

                                        <label class="control-label" for="company_zipcode">کدپستی</label>
                                        <input class="form-control" type="text" id="company_zipcode"
                                               name="company_zipcode" value="<?= $zipcode ?>">

                                        <label class="control-label" for="company_state">استان</label>
                                        <input class="form-control" type="text" id="company_state" name="company_state"
                                               value="<?= $state ?>">

                                        <label class="control-label" for="company_city">شهر</label>
                                        <input class="form-control" type="text" id="company_city" name="company_city"
                                               value="<?= $city ?>">

                                        <label class="control-label" for="company_address">آدرس</label>
                                        <input class="form-control" type="text" id="company_address"
                                               name="company_address" value="<?= $com_adres ?>">


                                    </div>
                                    <div class="form-group col-sm-6 1" style="margin-top: 50px;">

                                        <!--                                        <link rel="stylesheet" href="/yep_theme/default/rtl/js/mapp/dist/css/s.map.min.css">-->
                                        <!--                                        <link rel="stylesheet" href="/yep_theme/default/rtl/js/mapp/dist/css/fa/style.css" data-path="mapp/dist/css/" data-file="style.css">-->
                                        <!--                                        <link rel="stylesheet" href="map/app.css">-->


                                        <!--                                        <div id="map">sals</div>-->

                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/jquery-3.2.1.min.js"></script>-->
                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/s.map.min.js"></script>-->
                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/jquery.env.js"></script>-->
                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/s.map.styles.js"></script>-->
                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/app.js"></script>-->
                                        <!--                                       --><? // include "map/map.php";?>
                                    </div>


                                    <div class=" col-sm-12 uploadbts1 bhoechie-tab-content active">
                                        <center>

                                            <div id="adres_link" class="tab-pane">
                                                <div class="page-content-area" id="more7">
                                                    <div class="page-body" style="margin-top: 25px;">
                                                        <fieldset>
                                                            <!-- #section:download/download.link -->
                                                            <div class="col-md-12">
                                                                <!--                                                            <input type="hidden" id="company_ph_links_count"-->
                                                                <!--                                                                   name="company_ph_links_count" value="2">-->
                                                                <? $count_adres = "select count(id) from new_company_adres where id_com='$edit_id'";
                                                                $query_adres = "select * from new_company_adres WHERE  id_com='$edit_id'";
                                                                $result_adres = $coms_conect->query($query_adres);
                                                                $i = 1;
                                                                while ($row_adres = $result_adres->fetch_assoc()) {
//                                                                echo $count_adres;
//                                                                print_r($row_adres);}exit;
//                                                                    if ($)
                                                                    ?>
                                                                    <div id="ads_company_links_adres<?= $i ?>"
                                                                         class="seyed"
                                                                         style="opacity: 1;">
                                                                        <div class="form-group">
                                                                            <a class="col-md-1 control-label del-ads-adres"
                                                                               id="<?= $i ?>" for="family">
                                                                                <i class="fa fa-trash text-danger"
                                                                                   title="حذف"
                                                                                   style="font-size:20px;"></i></a>
                                                                            <label class="col-md-2 control-label"
                                                                                   for="family"> آدرس<?= $i ?></label>

                                                                            <div class="form-group col-md-9">
                                                                                <div class="col-md-3 input-group float-r">
                                                                                    <input type="text"
                                                                                           id="company_adres_onvan<?= $i ?>"
                                                                                           class="form-control"
                                                                                           placeholder="عنوان"
                                                                                           name="company_adres_onvan<?= $i ?>"
                                                                                           value="<?= $row_adres['onvan_adres']; ?>">
                                                                                </div>
                                                                                <div class="col-md-3 input-group float-r">
                                                                                    <input type="text"
                                                                                           id="company_adres_state<?= $i ?>"
                                                                                           class="form-control"
                                                                                           placeholder="استان"
                                                                                           name="company_adres_state<?= $i ?>"
                                                                                           value="<?= $row_adres['state_adres']; ?>">
                                                                                </div>
                                                                                <div class="col-md-3 input-group float-r">
                                                                                    <input type="text"
                                                                                           id="company_adres_city<?= $i ?>"
                                                                                           class="form-control"
                                                                                           placeholder="شهر"
                                                                                           name="company_adres_city<?= $i ?>"
                                                                                           value="<?= $row_adres['city_adres']; ?>">
                                                                                </div>
                                                                                <div class="col-md-3 input-group float-r">
                                                                                    <input type="text"
                                                                                           id="company_adres_zip<?= $i ?>"
                                                                                           class="form-control"
                                                                                           placeholder="کدپستی"
                                                                                           name="company_adres_zip<?= $i ?>"
                                                                                           dir="ltr"
                                                                                           value="<?= $row_adres['zip_adres']; ?>">
                                                                                </div>
                                                                                <div class="col-md-12 input-group float-r">
                                                                                    <input type="text"
                                                                                           id="company_adres_adres<?= $i ?>"
                                                                                           class="form-control"
                                                                                           placeholder="آدرس"
                                                                                           name="company_adres_adres<?= $i ?>"
                                                                                           value="<?= $row_adres['adres_adres']; ?>">
                                                                                </div>
                                                                                <input type="hidden"
                                                                                       id="company_ad_id<?= $i ?>"
                                                                                       name="company_ad_id<?= $i ?>"
                                                                                       value="<?= $row_adres['id']; ?>">
                                                                                <input type="hidden"
                                                                                       id="company_ad_id_com<?= $i ?>"
                                                                                       name="company_ad_id_com<?= $i ?>"
                                                                                       value="<?= $row_adres['id_com']; ?>">


                                                                            </div>

                                                                            <input type="hidden" id="val_z"
                                                                                   value="<?= $i ?>" name="val_z">
                                                                        </div>
                                                                    </div>

                                                                    <?
//                    }
                                                                    $i++;
                                                                }
                                                                //                $xcount_mahsol = $x;
                                                                ?>
                                                                <a class="btn btn-success block" id="add-adres-ads1"><i
                                                                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                            class="fa fa-plus"></i>افزودن آدرس</a>
                                                                <br>

                                                                <input type="hidden" id="company_ad_links_count"
                                                                       name="company_ad_links_count" value="<?= $i ?>">

                                                                <!--                                                            <input type="text" id="val_i"  name="val_i" value="-->
                                                                <? //= $i ?><!--">-->
                                                                <script>
                                                                    $(document).ready(function () {
                                                                        // alert(i + 'i');

                                                                        // $('#company_ph_links_title1').mask("(+99) 9999-9999", {placeholder: ""});

                                                                        var i = <?=$i?>;
                                                                        // alert(i + 'i');
                                                                        $('#add-adres-ads1').on("click", function () {
                                                                            // alert(i + 'ok click shod');
                                                                            var someText = '<div id="ads_company_links_phone' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group">' +
                                                                                '<a class="col-md-1 control-label del-ads-phone" id="' + i + '" for="family">' +
                                                                                '<i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> ' +
                                                                                '<label class="col-md-2 control-label" for="family">آدرس' + i + '</label> ' +
                                                                                '<div class="form-group col-md-9"> ' +
                                                                                '<div class="col-md-3 input-group float-r">' +
                                                                                '<input type="text" id="company_adres_onvan' + i + '" value="" class="form-control" placeholder="عنوان" name="company_adres_onvan' + i + '" ></div>' +
                                                                                '<div class="col-md-3 input-group float-r">' +
                                                                                '<input type="text" id="company_adres_state' + i + '" value="" class="form-control"  placeholder="استان" name="company_adres_state' + i + '" ></div>' +
                                                                                '<div class="col-md-3 input-group float-r">' +
                                                                                '<input type="text" id="company_adres_city' + i + '" value="" class="form-control" placeholder="شهر" name="company_adres_city' + i + '" ></div>' +
                                                                                '<div class="col-md-3 input-group float-r">' +
                                                                                '<input type="text" id="company_adres_zip' + i + '" value="" class="form-control"  dir="ltr"  placeholder="کدپستی" name="company_adres_zip' + i + '" ></div>' +
                                                                                '<div class="col-md-12 input-group float-r">' +
                                                                                '<input type="text" id="company_adres_adres' + i + '" value="" class="form-control"   placeholder="آدرس" name="company_adres_adres' + i + '" ></div>' +
                                                                                '<input type="hidden" id="val_z" value="' + i + '"  name="val_z" >' +
                                                                                '</div></div></div>';

                                                                            $(this).before(someText);
                                                                            $('#ads_company_links_adres' + i + '').fadeTo('slow', 0.3, function () {
                                                                                $(this).css('background', '');
                                                                            }).fadeTo('slow', 1);
                                                                            $('#company_ad_links_count').val(i);
                                                                            // $('#company_ph_links_title' + i + '').mask("(+99) 9999-9999", {placeholder: ""});
                                                                            i++;
                                                                        });


                                                                        $(document).on('click', '.del-ads-adres', function () {
                                                                            var id = '';
                                                                            var p = $('#company_ad_links_count').val();
                                                                            p--
                                                                            id = $(this).attr('id');
                                                                            var id_adres = $('#company_ad_id' + id).val();
                                                                            // alert('idph='+id_phone);
                                                                            $('#ads_company_links_adres' + id).remove();
                                                                            $('#company_ad_links_count').val(p);
                                                                            $.ajax({
                                                                                type: 'POST',
                                                                                url: 'New_ajax_company.php',
                                                                                data: "action=del_company_adres&id_adres=" + id_adres,
                                                                                success: function (result) {
                                                                                    // alert(id_ctlg);
                                                                                }

                                                                            });
                                                                        });


                                                                    });


                                                                </script>

                                                            </div>
                                                            <!-- /section:download/download.link -->
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                    <? if ($edit_id > "") { ?>
                                        <!--                                        <script>-->
                                        <!--                                            $(function () {-->
                                        <!--                                                $.ajax({-->
                                        <!--                                                    type: 'POST',-->
                                        <!--                                                    url: 'New_ajax.php',-->
                                        <!--                                                    data: "action=show_related_content_show&id=--><? //=$totla_related?><!--//",-->
                                        <!--//                                                    success: function (result) {-->
                                        <!--//                                                        $("#company_info").html(result);-->
                                        <!--//                                                    }-->
                                        <!--//                                                });-->
                                        <!--//                                            });-->
                                        <!--//                                        </script>-->
                                    <? } ?>
                                </div>

                                <!-- #section:content/اطلاعات شرکت -->

                            </div>

                            <div id="company_boss" class="tab-pane">


<?



?>

                                <div id="company_boss" class="form-group row tab-pane ">

                                    <div class="form-group col-sm-6 " style="margin-top: 50px;">
                                        <label class="control-label" for="company_boss_name"> نام مدیرعامل</label>
                                        <input class="form-control" type="text" name="company_boss_name"
                                               id="company_boss_name" value="<?= $boss_name ?>">

                                        <label class="control-label" for="company_latin_name">نام مدیرعامل به
                                            لاتین</label>
                                        <input class="form-control" type="text" name="company_latin_name"
                                               id="company_latin_name" value="<?= $latin_name ?>">

                                        <label class="control-label" for="company_num_sabt">عکس مدیر عامل</label>


                                        <div class="col-md-8 input-group float-l">
                                            <input type="text"
                                                   id="img_smallBox1_pic_boss"
                                                   value=""
                                                   class="form-control"
                                                   placeholder=" تصویر"
                                                   name="img_smallBox1_pic_boss"
                                                   style="direction: ltr;">
                                            <span class="input-group-addon"
                                                  style="padding: 0px;"><a
                                                        href="/filemanager/dialog.php?type=2&amp;field_id=img_smallBox1_pic_boss"
                                                        class="btn btn-success iframe-btn"
                                                        style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                            class="addimg flaticon-add139"></span></a>
                                                                                                         </span>
                                            <span class="input-group-addon H_neshane1 H_img_smallBox1"
                                                  style="padding: 0px;">
                                                                                <div id="img_smallBox1_avatar7_boss"
                                                                                     orakuploader="on"></div>
<!--                                                --><?// $img_smallBox1_pic_boss = get_boss_result($la, $edit_id, $coms_conect); ?>
                                                <input type="hidden"
                                                       id="img_smallBox1_avatar7_boss_link"
                                                       name="img_smallBox1_avatar7_boss_link"
                                                       value="<?= $img_smallBox1_pic_boss?>">
                                            																	<input type='hidden'
                                                                                                                       value='<?= $img_smallBox1_pic_boss ?>'
                                                                                                                       name='img_smallBox1_avatar7_boss[]'/>

                                                                                                                   </span>
                                        </div>
                                        <div class="ui-sortable red box" id="upload_type_img_smallBox1"
                                             style="float:right;">
                                        </div>
                                        <div class="input-group" id="image_show_img_smallBox1">

                                            <a href="<?= $img_smallBox1_pic_boss ?>"
                                               class=" without-caption">
                                                <img width="33" height="33" class="H_cursor_zoom"
                                                     src="<?= $img_smallBox1_pic_boss ?>"
                                                     alt="<?=$img_smallBox1_pic_boss ?>">
                                            </a>
                                        </div>

                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('#img_smallBox1_avatar7_boss').orakuploader({
                                                    orakuploader_path: 'new_orakuploader/',
                                                    orakuploader_main_path: 'source/comsroot/defualt/boss_pic',
                                                    orakuploader_thumbnail_path: 'source/comsroot/defualt/boss_pic/tn',
                                                    orakuploader_use_main: false,
                                                    //orakuploader_use_sortable : true,
                                                    orakuploader_use_dragndrop: true,
                                                    orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                    orakuploader_add_label: '',
                                                    //orakuploader_resize_to: <?//=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>//,
                                                    orakuploader_thumbnail_size: 400,
                                                    orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                    orakuploader_maximum_uploads: 1
                                                });

                                                $('#img_smallBox1_avatar7_boss').val("<?=$img_smallBox1_pic_boss ?>");
                                            });
                                        </script>
                                        <!--                                        <input class="form-control" type="text" id="company_num_sabt"-->
                                        <!--                                               name="company_num_sabt" value="-->
                                        <? //= $num_sabt ?><!--">-->

                                        <label class="control-label" for="boss_say">سخن مدیر عامل</label>
                                        <input class="form-control" type="text" name="boss_say"
                                               id="boss_say" value="<?= $boss_say ?>">

                                        <!--                                        <label class="control-label" for="company_type">نوع شرکت را انتخاب کنید-->
                                        <!--                                            :</label>-->
                                        <!--                                        <select class="form-control" name="company_type" id="company_type">-->
                                        <!--                                            --><? // $query1 = "select id,name from new_company_cat_type where type=19";
                                        //
                                        //                                            $result1 = $coms_conect->query($query1);
                                        //                                            $i = 1;
                                        //                                            $str = '';
                                        //                                            while ($RS11 = $result1->fetch_assoc()) {
                                        //
                                        //                                                ?>
                                        <!---->
                                        <!--                                                <option value="-->
                                        <? //= $RS11['id'] ?><!--" -->
                                        <? // if ($RS11['id'] == $com_type) echo 'selected' ?><!-- >-->
                                        <? //= $RS11['name'] ?><!--</option>-->
                                        <!---->
                                        <!---->
                                        <!--                                                --><? // $i++;
                                        //                                            } ?>
                                        <!--                                        </select>-->

                                        <label class="control-label" for="company_date">شبکه اجتماعی</label>

                                        <label class="control-label" for="boss_social_link1">facebook.com/</label>
                                        <input class="form-control" type="text" id="boss_social_link1"
                                               name="boss_social_link1" value="<?= $boss_social_link1 ?>">

                                        <label class="control-label" for="boss_social_link2">instagram.com/</label>
                                        <input class="form-control" type="text" id="boss_social_link2"
                                               name="boss_social_link2"
                                               value="<?= $boss_social_link2 ?>">

                                        <label class="control-label" for="boss_social_link3">telegram.com/</label>
                                        <input class="form-control" type="text" id="boss_social_link3"
                                               name="boss_social_link3"
                                               value="<?= $boss_social_link3 ?>">

                                        <label class="control-label" for="boss_social_link4">twitter.com/</label>
                                        <input class="form-control" type="text" id="boss_social_link4"
                                               name="boss_social_link4" value="<?= $boss_social_link4 ?>">


                                    </div>
                                    <div class="form-group col-sm-6 1" style="margin-top: 50px;">

                                        <!--                                        <link rel="stylesheet" href="/yep_theme/default/rtl/js/mapp/dist/css/s.map.min.css">-->
                                        <!--                                        <link rel="stylesheet" href="/yep_theme/default/rtl/js/mapp/dist/css/fa/style.css" data-path="mapp/dist/css/" data-file="style.css">-->
                                        <!--                                        <link rel="stylesheet" href="map/app.css">-->


                                        <!--                                        <div id="map">sals</div>-->

                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/jquery-3.2.1.min.js"></script>-->
                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/s.map.min.js"></script>-->
                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/jquery.env.js"></script>-->
                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/s.map.styles.js"></script>-->
                                        <!--                                        <script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/app.js"></script>-->
                                        <!--                                       --><? // include "map/map.php";?>
                                    </div>


                                </div>

                                <!-- #section:content/اطلاعات شرکت -->

                            </div>

                            <!--                    اطلاعات تماس-->
                            <!--                    --><? //$type=19;
                            //                    include '../main/new_modual_catogory.php4';?>
                            <!--                    --><? //include '../main/new_nav_pic.php4';?>
                            <div id="info_caller" class="form-group row tab-pane fade">
                                <!-- #section:content/اطلاعات تماس -->
                                <div class="form-group col-sm-8 " style="margin-top: 25px;">

                                    <label class="control-label" for="company_address_site">آدرس سایت</label>
                                    <input class="form-control" type="text" placeholder="http://domin.com"
                                           name="company_address_site" id="company_address_site"
                                           value="<?= $com_adres_site ?>">

                                    <label class="control-label" for="company_email">ایمیل</label>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input class="form-control" type="email" name="company_email"
                                                   id="company_email"
                                                   value="<?= $com_email ?>">
                                        </div>
                                        <? if ($edit_id > "") { ?>
                                            <div class="col-md-4">
                                                <img src="<?= $img_email ?>" class="form-control"
                                                     style="    display: block;" alt="">
                                            </div>
                                        <? } ?>
                                    </div>
                                    <label class="control-label" for="company_fax">شماره فکس</label>
                                    <input class="form-control" type="text" id="company_fax" name="company_fax"
                                           dir="ltr" placeholder="+12 3456 7890" value="<?= $com_fax ?>">
                                </div>

                                <div class="form-group col-sm-8 " style="margin-top: 25px;">
                                    <label class="control-label" for="">شبکه های اجتماعی</label>
                                    <input class="form-control" type="text" placeholder="لینک اول"
                                           name="company_social_link1" id="company_social_link1"
                                           value="<?= $com_social_link1 ?>">
                                    <input class="form-control" type="text" placeholder="لینک دوم"
                                           name="company_social_link2" id="company_social_link2"
                                           value="<?= $com_social_link2 ?>">
                                    <input class="form-control" type="text" placeholder="لینک سوم"
                                           name="company_social_link3" id="company_social_link3"
                                           value="<?= $com_social_link3 ?>">
                                    <input class="form-control" type="text" placeholder="لینک چهارم"
                                           name="company_social_link4" id="company_social_link4"
                                           value="<?= $com_social_link4 ?>">
                                </div>

                                <div class=" col-sm-12 uploadbts1 bhoechie-tab-content active">
                                    <center>

                                        <div id="phone_link" class="tab-pane">
                                            <div class="page-content-area" id="more7">
                                                <div class="page-body" style="margin-top: 25px;">
                                                    <fieldset>
                                                        <!-- #section:download/download.link -->
                                                        <div class="col-md-12">
                                                            <!--                                                            <input type="hidden" id="company_ph_links_count"-->
                                                            <!--                                                                   name="company_ph_links_count" value="2">-->
                                                            <? $count_phone = "select count(id) from new_company_phone where id_com='$edit_id'";
                                                            $query_phone = "select * from new_company_phone WHERE  id_com='$edit_id'";
                                                            $result_phone = $coms_conect->query($query_phone);
                                                            $i = 1;
                                                            while ($row_phone = $result_phone->fetch_assoc()) {
//                                                                echo $count_phone;
//                                                                print_r($row_phone);}exit;
//                                                                    if ($)
                                                                ?>
                                                                <div id="ads_company_links_phone<?= $i ?>" class="seyed"
                                                                     style="opacity: 1;">
                                                                    <div class="form-group"><a
                                                                                class="col-md-1 control-label del-ads-phone"
                                                                                id="<?= $i ?>"
                                                                                for="family">
                                                                            <i class="fa fa-trash text-danger"
                                                                               title="حذف"
                                                                               style="font-size:20px;"></i></a>
                                                                        <label class="col-md-2 control-label"
                                                                               for="family">نام بخش <?= $i ?></label>

                                                                        <div class="form-group col-md-9">
                                                                            <div class="col-md-6 input-group float-r">
                                                                                <input type="text"
                                                                                       id="company_na_links_title<?= $i ?>"


                                                                                       class="form-control"
                                                                                       placeholder="نام بخش"
                                                                                       name="company_na_links_title<?= $i ?>"
                                                                                       value="<?= $row_phone['phone_name']; ?>">
                                                                            </div>
                                                                            <div class="col-md-6 input-group float-l">
                                                                                <input type="text"
                                                                                       id="company_ph_links_title<?= $i ?>"
                                                                                       class="form-control"
                                                                                       placeholder="تلفن"
                                                                                       name="company_ph_links_title<?= $i ?>"
                                                                                       dir="ltr"
                                                                                       value="<?= $row_phone['phone_phone']; ?>">
                                                                                <input type="hidden"
                                                                                       id="company_ph_id<?= $i ?>"
                                                                                       name="company_ph_id<?= $i ?>"
                                                                                       value="<?= $row_phone['id']; ?>">
                                                                                <input type="hidden"
                                                                                       id="company_ph_id_com<?= $i ?>"
                                                                                       name="company_ph_id_com<?= $i ?>"
                                                                                       value="<?= $row_phone['id_com']; ?>">

                                                                            </div>
                                                                            <input type="hidden" id="val_i"
                                                                                   value="<?= $i ?>" name="val_i">
                                                                        </div>

                                                                        <script>
                                                                            $(document).ready(function () {

                                                                                var j = <?=$i?>;
                                                                                // alert(j + 'j');
                                                                                $('#company_ph_links_title' + j + '').mask("(+99) 9999-9999", {placeholder: ""});
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>

                                                                <?
//                    }
                                                                $i++;
                                                            }
                                                            //                $xcount_mahsol = $x;
                                                            ?>
                                                            <a class="btn btn-success block" id="add-phone-ads1"><i
                                                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                                        class="fa fa-plus"></i>افزودن تلفن</a>
                                                            <br>

                                                            <input type="hidden" id="company_ph_links_count"
                                                                   name="company_ph_links_count" value="<?= $i ?>">

                                                            <!--                                                            <input type="text" id="val_i"  name="val_i" value="-->
                                                            <? //= $i ?><!--">-->
                                                            <script>
                                                                $(document).ready(function () {
                                                                    // alert(i + 'i');

                                                                    // $('#company_ph_links_title1').mask("(+99) 9999-9999", {placeholder: ""});

                                                                    var i = <?=$i?>;
                                                                    // alert(i + 'i');
                                                                    $('#add-phone-ads1').on("click", function () {
                                                                        // alert(i + 'ok click shod');
                                                                        var someText = '<div id="ads_company_links_phone' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group">' +
                                                                            '<a class="col-md-1 control-label del-ads-phone" id="' + i + '" for="family">' +
                                                                            '<i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> ' +
                                                                            '<label class="col-md-2 control-label" for="family">نام بخش' + i + '</label> ' +
                                                                            '<div class="form-group col-md-9"> ' +
                                                                            '<div class="col-md-6 input-group float-r">' +
                                                                            '<input type="text" id="company_na_links_title' + i + '" value="" class="form-control" placeholder="نام بخش" name="company_na_links_title' + i + '" ></div>' +
                                                                            '<div class="col-md-6 input-group float-l">' +
                                                                            '<input type="text" id="company_ph_links_title' + i + '" value="" class="form-control" dir="ltr"  placeholder="تلفن" name="company_ph_links_title' + i + '" >' +
                                                                            '<input type="hidden" id="val_i" value="' + i + '"  name="val_i" >' +
                                                                            '</div></div></div></div>';

                                                                        $(this).before(someText);
                                                                        $('#ads_company_links_phone' + i + '').fadeTo('slow', 0.3, function () {
                                                                            $(this).css('background', '');
                                                                        }).fadeTo('slow', 1);
                                                                        $('#company_ph_links_count').val(i);
                                                                        $('#company_ph_links_title' + i + '').mask("(+99) 9999-9999", {placeholder: ""});
                                                                        i++;
                                                                    });


                                                                    $(document).on('click', '.del-ads-phone', function () {
                                                                        var id = '';
                                                                        var p = $('#company_ph_links_count').val();
                                                                        p--
                                                                        id = $(this).attr('id');
                                                                        var id_phone = $('#company_ph_id' + id).val();
                                                                        // alert('idph='+id_phone);
                                                                        $('#ads_company_links_phone' + id).remove();
                                                                        $('#company_ph_links_count').val(p);
                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'New_ajax_company.php',
                                                                            data: "action=del_company_phone&id_phone=" + id_phone,
                                                                            success: function (result) {
                                                                                // alert(id_ctlg);
                                                                            }

                                                                        });
                                                                    });


                                                                });


                                                            </script>

                                                        </div>
                                                        <!-- /section:download/download.link -->
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </center>
                                </div>


                            </div>
                            <!--               پایان اطلاعات تماس-->
                            <!--               شروع محصولات-->
                            <? $type = 19;
                            ?>
                            <div id="tab_products" class="form-group row tab-pane fade">
                                <div class="uploadbts">

                                    <a data-toggle="modal" data-target="#show_company" data-placement="top"
                                       rel="tooltip">
                                        <button><span class="flaticon-add133"></span><span>افزودن محصول</span></button>
                                    </a>

                                </div>

                                <div id="relatedcompany" class="tab-pane ">
                                    <? if ($edit_id > "") { ?>
                                        <script>
                                            $(function () {

                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'New_ajax.php',
                                                    data: "action=show_related_company_show&id=<?=$totla_related?>",
                                                    success: function (result) {
                                                        $("#relatedcompany").html(result);
                                                    }
                                                });
                                            });
                                        </script>
                                    <? } ?>
                                </div>

                            </div>
                            <!--               پایان محصولات-->
                            <!--               شروع کاتالوگ ها و فایل ها-->

                            <div id="tab_catalog" class="form-group row tab-pane fade">
                                <? include 'catalog.php4'; ?>


                            </div>
                            <!--              پایان  کاتالوگ ها و فایل ها-->

                            <!--              شروع توزیع کننده ها-->


                            <div id="tab_distributors" class="form-group row tab-pane fade">
                                <div class="page-content-area" id="gallery5">
                                    <div class="page-body" style="margin-top: 25px;">


                                        <fieldset>
                                            <div class="bhoechie-tab-content ">
                                                <center>


                                                    <!-- #section:download/download.link -->
                                                    <!--                                                    --><? //
                                                    //                                                    //                                                                        include 'types.php4';
                                                    //                                                    //                                                                        $company_types_links = get_result("select count(id) from new_company_type where id_com='$edit_id'", $coms_conect);
                                                    //                                                    //                                                                $company_types_links =10;
                                                    //                                                    $query_type = "select * from new_company_type WHERE  id_com='$edit_id'";
                                                    //                                                    $result_type = $coms_conect->query($query_type);
                                                    //                                                    $k = 1;
                                                    //                                                    while ($row_type = $result_type->fetch_assoc()) {
                                                    //                                                    //                                                                echo $count_type;
                                                    //                                                    //                                                                        if ($row_type['title'] > "") {
                                                    //
                                                    //                                                    ?>

                                                    <div id="ads_company_links"
                                                         class="seyed"
                                                         style="opacity: 1;">
                                                        <div class="form-group">
                                                            <select id="meta_label_distributors" multiple
                                                                    name="meta_label_distributors[]" class="select2 "
                                                                    type="text" style="width:90%">
                                                                <? $query_dis = "select id,name,com_type from  new_company_tozie_tozie ";
                                                                $result_dis = $coms_conect->query($query_dis);
                                                                while ($RS_dis = $result_dis->fetch_assoc()) {
                                                                    $comtype='شرکت توزیعی';
                                                                    if ($RS_dis['com_type']==0)
                                                                        $comtype='اصناف';
                                                                    ?>
                                                                    <option <? if (($meta_label_distributors[0]) > "" && in_array($RS_dis['id'], $meta_label_distributors)) echo 'selected'; ?>
                                                                            value="<?= $RS_dis['id'] ?>"><?= $RS_dis['name'].':'.$comtype ?></option>
                                                                <? } ?>
                                                            </select>
                                                        </div>
                                                        <!--                                                        --><? //
                                                        //                                                        //                                                                            }
                                                        //                                                        $k++;
                                                        //                                                        }
                                                        //                                                        //                                                                            $count_company_links = $k;
                                                        //                                                        ?>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $("#meta_label_distributors").select2({
                                                                    // tags: true;
                                                                });
                                                            });
                                                        </script>
                                                        <!--                                                        <a class="btn btn-success block"-->
                                                        <!--                                                           id="add_types-ads1"><i-->
                                                        <!--                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"-->
                                                        <!--                                                                    class="fa fa-plus"></i>افزودن-->
                                                        <!--                                                            فعالیت</a>-->
                                                        </br>
                                                    </div>


                                                    <!-- /section:download/download.link -->


                                                </center>
                                            </div>

                                        </fieldset>


                                    </div>
                                </div>


                            </div>
                            <!--              پایان توزیع کننده ها-->
                            <!--              شروع نمایندگی ها-->

                            <? $type = 19;
                            ?>
                            <fieldset>
                                <div class="modal fade" id="show_company_representation" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header no-padding">
                                                <div class="table-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-hidden="true">
                                                        <span class="white">&times;</span>
                                                    </button>
                                                    برندها
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="panel-body">
                                                    <div class="tt">
                                                        <div class="row-fluid">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="input-group input-group-sm">
                                                                        <input type="text"
                                                                               id="related_search_representation"
                                                                               class="form-control search2"
                                                                               placeholder=""
                                                                               style="top: 0px !important; ">
                                                                        <span class="input-group-addon"
                                                                              style="padding: 0px;"><input type="button"
                                                                                                           class="btn btn-primary"
                                                                                                           value="جستجو"
                                                                                                           name="relate_btn_representation"
                                                                                                           id="relate_btn_representation"
                                                                                                           style="margin: auto;border-radius: 0px;bottom: 1px;height: 28px;padding-top: 2px;"></span>
                                                                    </div>
                                                                    <img id="show_waiting_search" src="waiting.gif"
                                                                         dir="center"
                                                                         style="display:none">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div id="show_related_representation"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer ">
                                                <button type="button" id="btn_ok_company_representation00" value=""
                                                        data-dismiss="modal"
                                                        class="btn btn-primary conbtnGetAll"><span
                                                            class="glyphicon glyphicon-ok-sign"></span>
                                                    افزودن
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-dialog -->
                                </div>
                            </fieldset>
                            <div id="tab_representation" class="form-group row tab-pane fade">
                                <div class="uploadbts">

                                    <a data-toggle="modal" data-target="#show_company_representation"
                                       data-placement="top" rel="tooltip">
                                        <button><span class="flaticon-add133"></span><span>افزودن نمایندگی</span>
                                        </button>
                                    </a>

                                </div>

                                <div id="relatedcompany_representation" class="tab-pane ">
                                    <? if ($edit_id > "") { ?>

                                        <script>
                                            $(function () {


                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'New_ajax_company.php',
                                                    data: "action=show_related_company_representation_show&id_brand=<?=$totla_related_brand?>",
                                                    success: function (result) {
                                                        $("#relatedcompany_representation").html(result);
                                                    }
                                                });
                                            });
                                        </script>
                                    <? } ?>
                                </div>

                            </div>
                            <!--              پایان نمایندگی ها-->
                            <div id="tab_active" class="form-group row tab-pane fade">
                                <div class="page-content-area" id="gallery5">
                                    <div class="page-body" style="margin-top: 25px;">
                                        <fieldset>
                                            <!-- #section:content/تب نوع فعالیت -->
                                            <div class="bhoechie-tab-content ">
                                                <center>


                                                    <!-- #section:download/download.link -->
                                                    <!--                                                    --><? //
                                                    //                                                    //                                                                        include 'types.php4';
                                                    //                                                    //                                                                        $company_types_links = get_result("select count(id) from new_company_type where id_com='$edit_id'", $coms_conect);
                                                    //                                                    //                                                                $company_types_links =10;
                                                    //                                                    $query_type = "select * from new_company_type WHERE  id_com='$edit_id'";
                                                    //                                                    $result_type = $coms_conect->query($query_type);
                                                    //                                                    $k = 1;
                                                    //                                                    while ($row_type = $result_type->fetch_assoc()) {
                                                    //                                                    //                                                                echo $count_type;
                                                    //                                                    //                                                                        if ($row_type['title'] > "") {
                                                    //
                                                    //                                                    ?>

                                                    <div id="ads_company_links"
                                                         class="seyed"
                                                         style="opacity: 1;">
                                                        <div class="form-group">
                                                            <select id="meta_label_active" multiple
                                                                    name="meta_label_active[]" class="select2 "
                                                                    type="text" style="width:90%">
                                                                <? $query_ac = "select id,name from  new_company_cat_activity ";
                                                                $result_ac = $coms_conect->query($query_ac);
                                                                while ($RS_ac = $result_ac->fetch_assoc()) {
                                                                    ?>
                                                                    <option <? if (($meta_label_active[0]) > "" && in_array($RS_ac['id'], $meta_label_active)) echo 'selected'; ?>
                                                                            value="<?= $RS_ac['id'] ?>"><?= $RS_ac['name'] ?></option>
                                                                <? } ?>
                                                            </select>
                                                        </div>
                                                        <!--                                                        --><? //
                                                        //                                                        //                                                                            }
                                                        //                                                        $k++;
                                                        //                                                        }
                                                        //                                                        //                                                                            $count_company_links = $k;
                                                        //                                                        ?>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $("#meta_label_active").select2({
                                                                    // tags: true;
                                                                });
                                                            });
                                                        </script>
                                                        <!--                                                        <a class="btn btn-success block"-->
                                                        <!--                                                           id="add_types-ads1"><i-->
                                                        <!--                                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"-->
                                                        <!--                                                                    class="fa fa-plus"></i>افزودن-->
                                                        <!--                                                            فعالیت</a>-->
                                                        </br>
                                                    </div>


                                                    <!-- /section:download/download.link -->


                                                </center>
                                            </div>
                                            <!-- /section:content/تب نوع فعالیت -->
                                        </fieldset>
                                        <br><br><br><br><br><br><br><br><br><br>
                                    </div>
                                </div>


                            </div>


                        </div>

                        <!--                            ++++++++++foooterrrrr++++++-->
                        <div class="panel-footer bttools">
                            <? if ($_SESSION["can_draft"] == 1) { ?>
                                <a id="save_draft32" class="btn btn-primary save-draft2"><span
                                            class="flaticon-browser93"></span><span> پيش نويس</span></a>
                            <? } ?>
                            <? if ($_SESSION["can_add"] == 1) { ?>
                                <a id="qazzaq" class="btn btn-success submit2"><span
                                            class="flaticon-verified9"></span><span>ثبت شرکت</span></a>
                            <? } ?>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
    <script>
        $(function () {
            $(".save-draft2").click(function () {
                $("#status").val("0");
                $("#submit_btn").click();
            });
            $(".submit2").click(function () {
                $("#status").val("1");
                $("#submit_btn").click();
            });
        });
    </script>
    <style>
        .editableform .form-control {
            width: auto;
            direction: ltr;
        }

        .editable-clear-x {
            width: 0px;
        }
    </style>
    <script>
        $('#company_fax').click(function () {
            $('#company_fax').mask("(099) 9999-9999", {placeholder: ""});
        });
        // $('#company_email').click(function () {
        //           $('#company_email').mask("{a-z}@a-z.aaa",{placeholder:""});
        //       });

    </script>

    <? $_SESSION["del_item"] = 'del_company';
    $_SESSION["edit_item"] = 'change_lock_company';
    ?>
    <script src="/new_plugin/video-js/js/video.js"></script>
    <script>
        videojs.options.flash.swf = "video-js/js/video-js.swf";
    </script>
    <script src="ajax_js/company.js"></script>
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/colorbox.css"/>
    <script src="/yep_theme/default/rtl/assets/js/jquery.colorbox-min.js"></script>
    <link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
    <script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>
    <link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
    <script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>

    <script>
        var chkId = '';
        var chkIdArr = '';
        $("#relate_btn").click(function () {
            $("#show_waiting_search").show();
            <? if($edit_id > "") {?>
            if (chkId == '') {
                chkId = $('.check_checked').val() + ",";
                // chkId_brand =  chkId_brand.slice(0,-1);
                // alert('chkchk==' + chkId_brand);
            }<?}?>
            $('.conchkNumber_company:checked').each(function () {
                var vval = $(this).val();
                // alert('thisval'+vval);
                chkIdArr = chkId.split(',');
                chkIdArr = chkIdArr.filter(function (val) {
                    return val !== vval;
                });
                chkId = chkIdArr.toString(',');
                chkId += vval + ",";
            });
            $('.conchkNumber_company').not(':checked').each(function () {
                var unche = $(this).val();
                // alert('unche'+unche);
                chkIdArr = chkId.split(',');
                chkIdArr = chkIdArr.filter(function (val) {
                    return val !== unche;
                });
                chkId = chkIdArr.toString(',');

            });
            // alert('chkid=='+chkId);
            $.ajax({
                type: 'POST',
                url: 'New_ajax.php',
                data: "action=show_related_company&id=" + $("#related_search").val() + "&value=" + $("#manage_lang").val() + "&checkid=" + chkId,
                success: function (result) {
                    //alert(result);
                    $("#show_waiting_search").hide();
                    $("#show_related").html(result);
                    $("#related_search").val('');
                }
            });
        });
        // if( chkId_brand>"")
        //        chkId_brand +=",";
        // else chkId_brand='';

        var chkId_brand = '';
        var chkIdArr_brand = '';
        $("#relate_btn_representation").click(function () {
            $("#show_waiting_search").show();
            <? if($edit_id > "") {?>
            if (chkId_brand == '') {
                chkId_brand = $('.check_checked_representation').val() + ",";
                // chkId_brand =  chkId_brand.slice(0,-1);
                // alert('chkchk==' + chkId_brand);
            }<?}?>
            $('.conchkNumber_company_representation:checked').each(function () {
                var vval = $(this).val();
                // alert('thisval'+vval);
                chkIdArr_brand = chkId_brand.split(',');
                chkIdArr_brand = chkIdArr_brand.filter(function (val) {
                    return val !== vval;
                });
                chkId_brand = chkIdArr_brand.toString(',');
                chkId_brand += vval + ",";
                // alert('chkidchkid=='+chkId_brand);
            });
            $('.conchkNumber_company_representation').not(':checked').each(function () {
                var unche = $(this).val();
                // alert('unche=' + unche);
                chkIdArr_brand = chkId_brand.split(',');
                // alert('charr='+chkIdArr_brand);
                chkIdArr_brand = chkIdArr_brand.filter(function (val) {
                    return val !== unche;
                });
                chkId_brand = chkIdArr_brand.toString(',');
            });
            // alert('chkid==' + chkId_brand);
            $.ajax({
                type: 'POST',
                url: 'New_ajax_company.php',
                data: "action=show_related_company_representation&id_brand=" + $("#related_search_representation").val() + "&value_brand=" + $("#manage_lang").val() + "&checkid_brand=" + chkId_brand,
                success: function (result) {
                    //alert(result);
                    $("#show_waiting_search").hide();
                    $("#show_related_representation").html(result);
                    $("#related_search_representation").val('');

                }
            });
        });


        // $(document).ready(function () {
        //     $('.sss').hide();
        //     $("#ID").click(function(){
        // 	if( $(this).is(':checked')) {
        //                 $("#fff").show();//gallery
        //             }else {
        //                 $("#fff").hide();//gallery
        //             }
        //         });
        //     $("#ID2").click(function () {
        //         if ($(this).is(':checked')) {
        //             $("#fff").show();//gallery
        //         } else {
        //             $("#fff").hide();//gallery
        //         }
        //     });
        //     $("#ID3").click(function () {
        //         if ($(this).is(':checked')) {
        //             $("#ddd").show();//video
        //         } else {
        //             $("#ddd").hide();//video
        //         }
        //     });
        //     $("#ID4").click(function () {
        //         if ($(this).is(':checked')) {
        //             $("#aaa").show();//voice
        //         } else {
        //             $("#aaa").hide();//voice
        //         }
        //     });
        //     $("#ID6").click(function () {
        //         if ($(this).is(':checked')) {
        //             $("#fff").show();//gallery
        //             $("#ddd").show();//video
        //             $("#aaa").show();//voice
        //         } else {
        //             $("#fff").hide();//gallery
        //             $("#ddd").hide();//video
        //             $("#aaa").hide();//voice
        //         }
        //     });
        //
        //
        //     //page load show / hide tab	###################
        //     if ($('#ID').is(':checked')) {
        //         $("#fff").show();//gallery
        //     } else {
        //         $("#fff").hide();//gallery
        //     }
        //
        //     if ($("#ID2").is(':checked')) {
        //         $("#fff").show();//gallery
        //     } else {
        //         $("#fff").hide();//gallery
        //     }
        //
        //     if ($("#ID3").is(':checked')) {
        //         $("#ddd").show();//video
        //     } else {
        //         $("#ddd").hide();//video
        //     }
        //
        //     if ($("#ID4").is(':checked')) {
        //         $("#aaa").show();//voice
        //     } else {
        //         $("#aaa").hide();//voice
        //     }
        //
        //
        // });


        $(document).on('click', '#dropdelete', function (event) {
            $("#btn_del_related_company").val($(this).val());

        });

        $(document).on('click', '#dropdelete_representation', function (event) {
            $("#btn_del_related_company_representation").val($(this).val());

        });


    </script>

    <script>
        $(function () {
            $('.iframe-btn').fancybox({
                'width': 880,
                'height': 570,
                'type': 'iframe',
                'autoScale': false
            });
            $('#download-button').on('click', function () {
                ga('send', 'event', 'button', 'click', 'download-buttons');
            });
            $('.toggle').click(function () {
                var _this = $(this);
                $('#' + _this.data('ref')).toggle(200);
                var i = _this.find('i');
                if (i.hasClass('icon-plus')) {
                    i.removeClass('icon-plus');
                    i.addClass('icon-minus');
                } else {
                    i.removeClass('icon-minus');
                    i.addClass('icon-plus');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {


            hidevizhe = function () {
                $("#add_temp0").hide();
            };
            handleNewSelection = function () {
                hidevizhe();
                switch ($(this).val()) {
                    case '1':
                        $("#add_temp0").show();
                        break;
                }
            };
            $("#is_special").change(handleNewSelection);
            // Run the event handler once now to ensure everything is as it should be
            handleNewSelection.apply($("#is_special"));

        });
    </script>
    <script>
        $(document).ready(function () {
            hideAllDivs = function () {
                $("#group").hide();
            };
            handleNewSelection = function () {
                hideAllDivs();
                switch ($(this).val()) {
                    case '1':
                        $("#group").show();
                        break;
                }
            };
            $(document).ready(function () {
                $("#all_group").change(handleNewSelection);
                // Run the event handler once now to ensure everything is as it should be
                handleNewSelection.apply($("#all_group"));
                // show hide add
                $("#newpag").show();
                $("#newpag").click(function () {
                    $("#newpag").hide();
                });
            });
        });
    </script>
    <script type="text/javascript">
        jQuery(function ($) {
            var $overflow = '';
            var colorbox_params = {
                rel: 'colorbox',
                reposition: true,
                scalePhotos: true,
                scrolling: false,
                previous: '<i class="ace-icon fa fa-arrow-left"></i>',
                next: '<i class="ace-icon fa fa-arrow-right"></i>',
                close: '&times;',
                current: '{current} of {total}',
                maxWidth: '100%',
                maxHeight: '100%',
                onOpen: function () {
                    $overflow = document.body.style.overflow;
                    document.body.style.overflow = 'hidden';
                },
                onClosed: function () {
                    document.body.style.overflow = $overflow;
                },
                onComplete: function () {
                    $.colorbox.resize();
                }
            };

            $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
            $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange'></i>");//let's add a custom loading icon
        })
    </script>

    <script type="text/javascript">


        $(document).ready(function () {
            $.fn.editable.defaults.mode = 'inline';
            $('.status_content').editable({
                type: 'select',
                name: 'change_status_content',
                url: '/New_ajax.php',
                value: $("#x_editable_val").val(),
                source: "{1: 'منتشر شده',0: 'پيش نويس'}",
                ajaxOptions: {
                    type: 'get',
                },
                error: function (response) {
                    //alert(response);
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".allownumericwithoutdecimal").on("keypress keyup blur", function (event) {
                $(this).val($(this).val().replace(/[^\d].+/, ""));
                if ((event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('.conchkNumber').click(function () {
                if ($('.conchkNumber:checked').length == $('.conchkNumber').length) {
                    $('.conchkSelectAll').prop('checked', true);
                }
                else {
                    $('.conchkSelectAll').prop('checked', false);
                }
            });
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            $("#start").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });
            $("#end").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });
            $("#start_Slide_show").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });
            $("#end_Slide_show").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });
            $("#publish_date").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });
            $("#publish_date1").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });

            $("#spesial_start_date").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });

            $("#publish_search").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });
            $("#spesial_finish_date").datepicker({
                changeMonth: true,
                changeYear: true,
                isRTL: true,
                dateFormat: "yy/mm/dd"
            });
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
        $('#manager_filter').change(function () {
            var a = '<?=$url?>';
            if (a.indexOf("&manager_filter=") >= 0) {
                var b = a.split('&manager_filter=');
                var c = b[1].split('&');
                var e = "";
                if (c[1] > "")
                    e = "&" + c[1];
                a = b[0] + "&manager_filter=" + $(this).val() + e;
            }
            else
                a += '&manager_filter=' + $(this).val();
            window.location.href = a;
        });


    </script>
    <script src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
    <script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
    <!--    <script src="/yep_theme/default/rtl/js/bootstrapvalidator/language/fa_IR.js"></script>-->
    <link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
    <style>
        .fvalid {
            color: green;
        }

        .fvalid:before {
            display: block;
        }

        p:before {
            display: block;
        }

        .fnotvalid {
            color: red;
        }

        .fnotvalid:before {
            display: block;
        }
    </style>

    <script>
        $('#contenttext').formValidation({
            excluded: [':disabled']
        })
            .on('err.field.fv', function (e, data) {
                // data.element --> The field element

                var $tabPane = data.element.parents('.tab-pane'),
                    tabId = $tabPane.attr('id');

                $('a[href="#' + tabId + '"][data-toggle="tab"]')
                    .parent()
                    .find('p')
                    //.removeClass('fvalid')
                    .addClass('fnotvalid');
            })


            // Called when a field is valid

            .on('success.field.fv', function (e, data) {
                // data.fv      --> The FormValidation instance
                // data.element --> The field element

                var $tabPane = data.element.parents('.tab-pane'),
                    tabId = $tabPane.attr('id'),
                    $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]')
                        .parent()
                        .find('p')
                        //.removeClass('fa-check fa-times');
                        .removeClass('fnotvalid');
                //.addClass('fvalid');

                // Check if all fields in tab are valid
                var isValidTab = data.fv.isValidContainer($tabPane);
                if (isValidTab !== null) {
                    $icon.addClass(isValidTab ? 'fa-check' : 'fa-times');
                }
            });
        $(".reset").click(function () {
            $('#contenttext').closest('form').find("input[type=text], textarea").val("");
        });
    </script>


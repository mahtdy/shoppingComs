<? $_SESSION["modual_type"] = 20 ?>
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
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->


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
    $temp_user = get_result("select user_id from new_agahi where id= $edit_mode", $coms_conect);
    if (!in_array($temp_user, $_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$edit_id = injection_replace($_GET['edit_id']);
if ($edit_id > "") {
    $temp_user = get_result("select user_id from new_agahi where id= $edit_id", $coms_conect);
    if (!in_array($temp_user, $_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}


//print_r($_POST);exit;


$addnew = injection_replace($_GET['addnew']);
$name = injection_replace($_POST['name']);

$status = injection_replace($_POST['status']);

$navication_pic = injection_replace($_POST['navication_pic']);

$duration = injection_replace($_POST['duration']);

$title = injection_replace($_POST['title']);
$abstract = injection_replace($_POST['abstract']);
$can_comment = injection_replace($_POST['can_comment']);
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
//$fori = (injection_replace($_POST['fori']) == "") ? 0 : 1;
//$tasviri = (injection_replace($_POST['tasviri']) == "") ? 0 : 1;
//$videoi = (injection_replace($_POST['videoi']) == "") ? 0 : 1;
//$soti = (injection_replace($_POST['soti']) == "") ? 0 : 1;
//$erjaei = (injection_replace($_POST['erjaei']) == "") ? 0 : 1;
////$company_type = $fori . $tasviri . $videoi . $soti . $erjaei;
//

# SEO Tab
$meta_label = ($_POST['meta_label']);

$source_link_company = injection_replace($_POST['source_link_company']);
$source_company = injection_replace($_POST['source_company']);
$meta_keyword = injection_replace($_POST['meta_keyword']);
$meta_desciption = injection_replace($_POST['meta_desciption']);
$seo_title = injection_replace($_POST['seo_title']);

# Slide Tab
//$slide = injection_replace($_POST['slide']);
//

#file upload field
//$upload_type = injection_replace($_POST['upload_type']);
//if ($upload_type == 2)
//    $company_image = injection_replace($_POST['company_image']);
//
//else if ($upload_type == 1) {
//    $company_image_avatar = injection_replace($_POST['company_image_avatar'][0]);
//    $company_image_avatar = trim($company_image_avatar);
//    if ($company_image_avatar != '')
//        $company_image = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $company_image_avatar;
//    else
//        $company_image = '';
//}

//echo  $company_image.'wew';
//$company_video_pic = injection_replace($_POST['company_video_pic']);
//$company_attach = injection_replace($_POST['company_attach']);
//$company_sound = injection_replace($_POST['company_sound']);
//$company_video = injection_replace($_POST['company_video']);
//
//$album_type = injection_replace($_POST['album_type']);
//if ($album_type == 2) {
//    $imagelist = ($_POST['imagelist']);
//    foreach ($_POST['company_image_album'] as $val) {
//        unlink('new_gallery/files/' . $val);
//        unlink('new_gallery/files/tn' . $val);
//    }
//
//} else if ($album_type == 1 && count($_POST['company_image_album']) > 0) {
//    foreach ($_POST['company_image_album'] as $val)
//        $imagelist[] = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $val;
//}
//

#slideshow
//$slide_img1 = injection_replace($_POST['slide_img1']);
//$slide_img2 = injection_replace($_POST['slide_img2']);
//$start_date = injection_replace($_POST['start_date']);
//$finish_date = injection_replace($_POST['finish_date']);
//$slide_title = injection_replace($_POST['slide_title']);
//$text1 = injection_replace($_POST['text1']);
//$text2 = injection_replace($_POST['text2']);
//$text3 = injection_replace($_POST['text3']);

#محتوا مرتبط
//$totla_related = injection_replace($_POST['totla_related']);
//$totla_related_brand = injection_replace($_POST['totla_related_brand']);
//$spesial_date = jdate('Y/m/d');

#اطلاعات شرکت
//$manager_name = injection_replace($_POST['company_manager_name']);
//$tech_name = injection_replace($_POST['company_technical_name']);
//$num_sabt = injection_replace($_POST['company_num_sabt']);
//$num_code = injection_replace($_POST['company_num_code']);
//$com_type = injection_replace($_POST['company_type']);
//$sabt_date = injection_replace($_POST['sabt_date']);
//$city = injection_replace($_POST['company_city']);
//$zipcode = injection_replace($_POST['company_zipcode']);
//$com_adres = injection_replace($_POST['company_address']);
//$com_adres_site = injection_replace($_POST['company_address_site']);
//$com_email = injection_replace($_POST['company_email']);
////$img_email = injection_replace($_POST['img_email']);
//
//$com_fax = injection_replace($_POST['company_fax']);
//$val_i = injection_replace($_POST['val_i']);
////$k = injection_replace($_POST['val_k']);
////$s = injection_replace($_POST['val_s']);
////$q = injection_replace($_POST['val_q']);
//$val_w = injection_replace($_POST['val_w']);
//$check_checked = injection_replace($_POST['check_checked']);
//$check_checked_brand = injection_replace($_POST['check_checked_representation']);
////echo $check_checked;
////$phone_phone = injection_replace($_POST['company_ph_links_title1']);
////echo check_catogory($array_value);
///
///
############################################
############################################


//$domain=$_SERVER['HTTP_HOST'];
//echo $domain;
############################################
if ($edit_mode == "" && $title > "" && ($_SESSION["can_add"] == 1 || $_SESSION["can_draft"] == 1) && check_catogory($array_value) == 1) {
    check_token($_REQUEST['user_token'], $_SESSION['session_token'], '/coms');
    $user_id = injection_replace($_SESSION['manager_id']);

    if ($_SESSION["can_add"] != 1)
        $status = 0;
    if ($spesial_finish_date == '') $spesial_finish_date = $spesial_date;
    if ($spesial_start_date == '') $spesial_start_date = $spesial_date;

////====== تبدیل ایمیل به عکس invert email to jpg ========//
//    if (isset($_POST['company_email']) and $edit_mode == '') {
//        $len = strlen($com_email);
//        $width = ($len + 2) * 7;
//        $im = imagecreatetruecolor($width, 20);
//
//// Create some colors
//        $white = imagecolorallocate($im, 255, 255, 255);
//
//        imagefilledrectangle($im, 0, 0, $width - 1, 19, $white);
//// Replace path by your own font path
////    $font = 'http://' . $_SERVER["HTTP_HOST"] .'/yep_theme/default/rtl/images/email/arial.ttf';
//        $font = 'yep_theme/default/rtl/images/email/arial.ttf';
//        imagettftext($im, 10, 0, 5, 15, $black, $font, $com_email);
//
//// Create image in folder
//        $rnd = rand(0, 9999);
//
//        $image_email = 'yep_theme/default/rtl/images/email/' . 'img-email' . $rnd . '.jpg';
////        echo 'rr='.$image_email.'rnd='.$rnd;exit;
//        imagejpeg($im, $image_email);
//        imagedestroy($im);
//
//// Show image in output page
//
//    }
//
////=======end invert email to jpg

    $arr = array("text"=>$text, "seo_title" => $seo_title,"name" => $name, "title" => $title, "ip" => $custom_ip, "meta_keyword" => $meta_keyword, "meta_description" => $meta_desciption, "spesial_start_date" => strtotime(jalalitomiladi($spesial_start_date)), "spesial_finish_date" => strtotime(jalalitomiladi($spesial_finish_date)),  "publish_date" => $publish_date, "user_id" => $user_id, "date" => $now, "la" => $manage_lang, "site" => $manage_site, "status" => $status);
    $id = insert_to_data_base($arr, 'new_agahi', $coms_conect);
    $id_com = $coms_conect->insert_id;
//echo 'idc='.$id_com;


////    echo  $company_image;
//    $arr_imag = array("id" => $id, "type" => 20, "adress" => $company_image, "name" => 'company_image');
//    insert_to_data_base($arr_imag, 'new_file_path', $coms_conect);
////    echo  $company_image.'qq';
//    $arr_attach = array("id" => $id, "type" => 20, "adress" => $company_attach, "name" => 'company_attach');
//    insert_to_data_base($arr_attach, 'new_file_path', $coms_conect);
//
//
//    $arr_sound = array("id" => $id, "type" => 20, "adress" => $company_sound, "name" => 'company_sound');
//    insert_to_data_base($arr_sound, 'new_file_path', $coms_conect);
//
//    $arr_video = array("id" => $id, "type" => 20, "adress" => $company_video, "name" => 'company_video');
//    insert_to_data_base($arr_video, 'new_file_path', $coms_conect);
//
//    $arr_video = array("id" => $id, "type" => 20, "adress" => $company_video_pic, "name" => 'company_video_pic');
//    insert_to_data_base($arr_video, 'new_file_path', $coms_conect);

    ####label
//    echo 'edt_id='.$edit_id.'id='.$id;

    if (!empty($meta_label)) {
//        $temp = explode(",", $meta_label);
        foreach ($meta_label as $value) {
            if ($value > "") {
                $label_arr = array("id" => $id, "type" => 20, "label_id" => $value);
                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }


//    ### gallery add
//    if (!empty($imagelist)) {
//        foreach ($imagelist as $image) {
//            if ($image != -1) {
//                $gallery_arr = array("id" => $id, "type" => 20, "adress" => $image, "name" => 'company_gallery');
//                insert_to_data_base($gallery_arr, 'new_file_path', $coms_conect);
//            }
//        }
//    }

    #####دسته بندي#######
    foreach ($cat_arr as $value) {
        if ($value != -1) {
            $arr = array("cat_id" => $value, "page_id" => $id, "type" => 20);
            insert_to_data_base($arr, 'new_modules_catogory', $coms_conect);
        }
    }

//    $related = explode(",", $totla_related);
//    foreach ($related as $value) {
//
//        $arr = array("id" => $value, "page_id" => $id, "type" => 20);
//        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
//    }
//
//    $related_brand = explode(",", $totla_related_brand);
//    foreach ($related_brand as $value_brand) {
//
//        $arr = array("id" => $value_brand, "page_id" => $id_com, "type" => 20);
//        insert_to_data_base($arr, 'new_company_brand_related', $coms_conect);
//    }

//    ### slide show add
//
//    if ($slide == 1) {
//        $slide_link = "/company/$manage_lang/$id/" . insert_dash("$name");
//        $arr_slide = array("la" => $manage_lang, "site" => $manage_site, "link" => $slide_link, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $id, "type" => 20, "user_id" => $user_id, "date" => $now, "ip" => $custom_ip);
//        insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
//    }
//
//    show_msg($new_successfull);
//} else if ($edit_mode > "" && $title > "" && $_SESSION["can_edit"] == 1 && check_catogory($array_value) == 1) {
//    check_token($_REQUEST['user_token'], $_SESSION['session_token'], '/coms');
//    if ($spesial_finish_date == '') $spesial_finish_date = $spesial_date;
//    if ($spesial_start_date == '') $spesial_start_date = $spesial_date;
//    $edit_user_id = injection_replace($_SESSION['manager_id']);
//    $condition = "id=$edit_mode";


////====== تبدیل ایمیل به عکس invert email to jpg ========//
//
//    $query = "SELECT com_email_img FROM new_agahi where id='$edit_id'";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $len = strlen($com_email);
//    $width = ($len + 2) * 7;
//    $im = imagecreatetruecolor($width, 20);
//
//// Create some colors
//    $white = imagecolorallocate($im, 255, 255, 255);
//
//    imagefilledrectangle($im, 0, 0, $width - 1, 19, $white);
//// Replace path by your own font path
////    $font = 'http://' . $_SERVER["HTTP_HOST"] .'/yep_theme/default/rtl/images/email/arial.ttf';
//    $font = 'yep_theme/default/rtl/images/email/arial.ttf';
//    imagettftext($im, 10, 0, 5, 15, $black, $font, $com_email);
//    $img_email = $row['com_email_img'];
//// Create image in folder
////    echo 'imemail = '.$img_email.'<br>';
//    if ($img_email == '') {
//        $rnd = rand(0, 9999);
//        $img_email = 'yep_theme/default/rtl/images/email/' . 'img-email' . $rnd . '.jpg';
//    }
////        $image_email=$img_email;
////echo $image_email.'im='.$img_email;
//    imagejpeg($im, $img_email);
//    imagedestroy($im);
////    echo 'im='.$im.$com_email.'rr='.$image_email.'rnd='.$rnd;exit;
//// Show image in output pagesdsd
//
//
////=======end invert email to jpg

    $arr = array("text"=>$text, "seo_title" => $seo_title,"name" => $name, "title" => $title, "ip" => $custom_ip, "meta_keyword" => $meta_keyword, "meta_description" => $meta_desciption, "spesial_start_date" => strtotime(jalalitomiladi($spesial_start_date)), "spesial_finish_date" => strtotime(jalalitomiladi($spesial_finish_date)),  "publish_date" => $publish_date, "user_id" => $user_id, "date" => $now, "la" => $manage_lang, "site" => $manage_site, "status" => $status);
    update_data_base($arr, 'new_agahi', $condition, $coms_conect);

//
//    $condition = "id=$edit_mode && name='company_image'";
//    $arr_imag = array("id" => $edit_mode, "type" => 20, "adress" => $company_image, "name" => 'company_image');
//    update_data_base($arr_imag, 'new_file_path', $condition, $coms_conect);
////    echo  $company_image.'ee';
//
//    $condition = "id=$edit_mode && name='company_attach'";
//    $arr_attach = array("id" => $edit_mode, "type" => 20, "adress" => $company_attach, "name" => 'company_attach');
//    update_data_base($arr_attach, 'new_file_path', $condition, $coms_conect);
//
//
//    $condition = "id=$edit_mode && name='company_sound'";
//    $arr_sound = array("id" => $edit_mode, "type" => 20, "adress" => $company_sound, "name" => 'company_sound');
//    update_data_base($arr_sound, 'new_file_path', $condition, $coms_conect);
//
//    $condition = "id=$edit_mode && name='company_video'";
//    $arr_video = array("id" => $edit_mode, "type" => 20, "adress" => $company_video, "name" => 'company_video');
//    update_data_base($arr_video, 'new_file_path', $condition, $coms_conect);
//
//    $condition = "id=$edit_mode && name='company_video_pic'";
//    $arr_video = array("id" => $edit_mode, "type" => 20, "adress" => $company_video_pic, "name" => 'company_video_pic');
//    update_data_base($arr_video, 'new_file_path', $condition, $coms_conect);
//

    ####label


#####دسته بندي#######
    $query1 = "delete from new_modules_catogory where page_id='$edit_mode' and type=20";
    $coms_conect->query($query1);
    foreach ($cat_arr as $value) {
        if ($value != -1) {
            $arr = array("cat_id" => $value, "page_id" => $edit_mode, "type" => 20);
            insert_to_data_base($arr, 'new_modules_catogory', $coms_conect);
        }
    }
//#####related
//    $query1 = "delete from new_related_madual where page_id='$edit_mode' and type=20";
//    $coms_conect->query($query1);
//    $related = explode(",", $totla_related);
//    foreach ($related as $value) {
//
//        $arr = array("id" => $value, "page_id" => $edit_mode, "type" => 20);
//        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
//    }
//    $query111 = "delete from new_company_brand_related where page_id='$edit_mode' and type=20";
//    $coms_conect->query($query111);
//    $related_brand = explode(",", $totla_related_brand);
//    foreach ($related_brand as $value_brand) {
//        $arr = array("id" => $value_brand, "page_id" => $edit_mode, "type" => 20);
//        insert_to_data_base($arr, 'new_company_brand_related', $coms_conect);
//    }
//    ### slide show update
//    if ($slide == 1) {
//        $slide_link = "/company/$manage_lang/$edit_mode/" . insert_dash("$name");
//        $query1 = "select count(id) as count from new_slideshow where page_id='$edit_mode'  and type=20";
//        $result = $coms_conect->query($query1);
//        $row = $result->fetch_assoc();
//        $count = $row['count'];
//        if ($count != 0) {
//            $condition = "page_id=$edit_mode";
//            $arr_slide = array("link" => $slide_link, "la" => $manage_lang, "site" => $manage_site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 20, "edit_user_id" => $edit_user_id, "edit_date" => $now, "ip" => $custom_ip);
//            update_data_base($arr_slide, 'new_slideshow', $condition, $coms_conect);
//
//        } else {
//            $arr_slide = array("link" => $slide_link, "la" => $manage_lang, "site" => $manage_site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 20, "user_id" => $edit_user_id, "date" => $now, "ip" => $custom_ip);
//            insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
//
//        }
//    } else {
//        $query1 = "delete from new_slideshow where page_id='$edit_mode' and type=20";
//        $coms_conect->query($query1);
//    }
//    show_msg($new_successfull);
}

create_session_token();
###############نمايش در حالت ويرايش#################
if ($edit_id > "") {
    $query = "SELECT * FROM new_agahi where id='$edit_id'";
    $result = $coms_conect->query($query);
//    print_r($query);
//    print_r($result); echo $edit_id;exit;
    $row = $result->fetch_assoc();
    $status = $row['status'];
    $album_type = $row['album_type'];
    $upload_type = $row['upload_type'];
    $duration = $row['duration'];
    $edit_source_link_company = $row['source_link_company'];
    $edit_source_company = $row['source_company'];
    $edit_name = $row['name'];
//    $com_type = $row['com_type'];
    $title = $row['title'];
    $navication_pic = $row['navication_pic'];
    $edit_text = ta_latin_num($row['text']);

    $la = $row['la'];
    $site_id = $row['site'];
    $manager_name = $row['manager_name'];
    $tech_name = $row['tech_name'];
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

//    echo $phone_phone.$phone_name;
//echo 'edt_id='.$edit_id;

    $label = '';
    $query = "select label_id from new_mudoal_label where id='$edit_id' and type=20";
    $result = $coms_conect->query($query);
    while ($RS1 = $result->fetch_assoc()) {
        $label[] = $RS1['label_id'];
    }
    //echo $label;//exit;
    $meta_keyword = $row['meta_keyword'];
    $seo_title = $row['seo_title'];

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


//    #Query from new_slideshow
//    $query = "SELECT * FROM new_slideshow where page_id='$edit_id'  and type=20";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $slide_img1 = $row['slide_img1'];
//    $slide_img2 = $row['slide_img2'];
//    if ($row['start_date'] > 0)
//        $start_date = miladitojalaliuser(date('Y-m-d', $row['start_date']));
//    if ($row['finish_date'] > 0)
//        $finish_date = miladitojalaliuser(date('Y-m-d', $row['finish_date']));
//    $slide_title = $row['title'];
//    $text1 = $row['text1'];
//    $text2 = $row['text2'];
//    $text3 = $row['text3'];
//
//    #Query from new_file_path
//    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='company_image'  and type=20";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $company_image = $row['adress'];
////    echo $company_image;
//
//    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='company_attach'  and type=20";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $company_attach = $row['adress'];
//
//    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='company_sound'  and type=20";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $company_sound = $row['adress'];
//
//    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='company_video'  and type=20";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $company_video = $row['adress'];
//
//    $query = "SELECT b.id,title FROM new_related_madual a ,new_product b where page_id='$edit_id' and a.id=b.id and type=20";
//    $result = $coms_conect->query($query);
////    echo $query;exit;
//    $totla_related = "";
//    $i = 1;
//    while ($row = $result->fetch_assoc()) {
//        if ($i != 1) $str = ',';
//        $i++;
//        $totla_related .= $str . $row['id'];
//    }
//
//    $query1b = "SELECT b.id,name FROM new_company_brand_related a ,new_company_cat_brand b where page_id='$edit_id' and a.id=b.id and a.type=20";
//    $resultb = $coms_conect->query($query1b);
//    $totla_related_brand = "";
////    echo $query1b;exit;
//    $i = 1;
//    while ($row = $resultb->fetch_assoc()) {
//        if ($i != 1) $str = ',';
//        $i++;
//        $totla_related_brand .= $str . $row['id'];
//    }
//
//
}





//$id_com = $coms_conect->insert_id;
//echo 'idc='.$manage_site.'eid='.$main;
//
//########################################################### شروع ثبت فایل و کاتولوگ  ########################################################
//$img_smallBox1_count = injection_replace_pic($_POST["img_smallBox1_count"]);
////echo $img_smallBox1_count;
//for ($x = 1; $x <= $img_smallBox1_count; $x++) {
//
//    $img_smallBox1_title = injection_replace_pic($_POST["img_smallBox1_title{$x}"]);
//
//    $img_smallBox1_pic = injection_replace_pic($_POST["img_smallBox1_pic{$x}"]);
//    $img_smallBox1_pic = trim($img_smallBox1_pic);
//
//    $img_smallBox1_avatar7 = injection_replace($_POST["img_smallBox1_avatar7{$x}"][0]);
//    $img_smallBox1_avatar7 = trim($img_smallBox1_avatar7);
////if($img_smallBox1_pic>"") {
////    $img_smallBox1_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $img_smallBox1_pic;
////}
//
//    if ($img_smallBox1_avatar7 > "") {
//        $img_smallBox1_avatar7_adrs = 'http://' . $_SERVER["HTTP_HOST"] . '/source/comsroot/defualt/catalog_pic/' . $img_smallBox1_avatar7;
////        echo $img_smallBox1_pic;
//    }
//    if ($img_smallBox1_title > "") {
//        insert_update_ctlg($manage_site, $la, $img_smallBox1_title, $img_smallBox1_pic, $img_smallBox1_avatar7_adrs, $img_smallBox1_avatar7, $edit_id, $coms_conect);
//    }
//    $img_smallBox1_avatar7 = "";
//}
//
//########################################################### پایان ثبت فایل و کاتولوگ  END  ########################################################
//
//########################################################### شروع ثبت تلفن START insert update phone   ########################################################
//
//
////echo 'val-i='.$val_i;
//for ($j = 1; $j <= $val_i; $j++) {
//    $phone_name = injection_replace($_POST["company_na_links_title{$j}"]);
//    $phone_phone = injection_replace($_POST["company_ph_links_title{$j}"]);
//    $phone_id = injection_replace($_POST["company_ph_id{$j}"]);
//    $phone_id_com = injection_replace($_POST["company_ph_id_com{$j}"]);
////echo 'pic='.$phone_id_com.'<br>';
//    if (empty($phone_id_com) && !empty($_POST["company_ph_links_title{$j}"])) {
////        echo 'idcom='.$id_com.'pic='.$phone_id_com.'<br>';
//        $arr_phone = array("phone_name" => $phone_name, "phone_phone" => $phone_phone, "id_com" => $id_com);
////       print_r($arr_phone);
//        insert_to_data_base($arr_phone, 'new_company_phone', $coms_conect);
//    } else {
//
//        $condition = "id=$phone_id";
//        $arr_phone = array("phone_name" => $phone_name, "phone_phone" => $phone_phone, "id_com" => $phone_id_com);
//        update_data_base($arr_phone, 'new_company_phone', $condition, $coms_conect);
//
//    }
//}
//########################################################### پایان ثبت تلفن END insert update phone  ####################################################
//
//
//########################################################### شروع ثبت توزیع کننده START insert update tozie   ########################################################
////
////echo 'val-w='.$val_w;
//for ($j = 1; $j <= $val_w; $j++) {
//    $com_tozi_name = injection_replace($_POST["tab_distributors_links_title{$j}"]);
//    $com_tozi_type = injection_replace($_POST["tab_distributors_links_type{$j}"]);
//    $tozie_id = injection_replace($_POST["company_dis_id{$j}"]);
//    $tozie_id_com = injection_replace($_POST["company_dis_id_com{$j}"]);
////echo 'pic='.$phone_id_com.'<br>';
//    if (empty($tozie_id_com) && !empty($_POST["tab_distributors_links_title{$j}"])) {
////        echo 'idcom='.$id_com.'pic='.$phone_id_com.'<br>';
//        $arr_tozie = array("com_tozi_name" => $com_tozi_name, "com_tozi_type" => $com_tozi_type, "id_com" => $id_com);
////       print_r($arr_tozie);
//        insert_to_data_base($arr_tozie, 'new_company_tozie', $coms_conect);
//    } else {
//
//        $condition = "id=$tozie_id";
//        $arr_tozie = array("com_tozi_name" => $com_tozi_name, "com_tozi_type" => $com_tozi_type, "id_com" => $tozie_id_com);
//        update_data_base($arr_tozie, 'new_company_tozie', $condition, $coms_conect);
//
//    }
//}
//########################################################### پایان ثبت توزیع کننده  END insert update tozie  ####################################################


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
    <input type="hidden" value="new_agahi_text" name='yep'>
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
                    <? if ($_GET['manager_filter'] > "") { ?>    <a href="/newcoms.php?yep=new_agahi_text"
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
                <div class="title"><p class="titr">لیست آگهی ها</p>
                    <p class="lead">امکان مدیریت و افزودن و ویرایش کردن آگهی ها در این قسمت فراهم شده است.</p>
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
                                <input type="hidden" name="yep" value="new_agahi_text">
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
                    <th width="15%">عنوان</th>

                    <th>توضیح</th>
<!--                    <th>آدرس سایت</th>-->
<!--                    <th>مدیرعامل</th>-->

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
                $sql1 = "select count(a)as cnt from (SELECT count(a.id) as a from new_managers b ,new_agahi a ,new_modules_catogory c where 
								 b.id = a.user_id and c.type=20 and a.id=c.page_id 
								 $str_lang $str_site $str_q $str_manager $str_status $str_cat $str_id_number $str_field $str_expire
								  
								group by page_id)q";
//                  echo $sql1; exit;
                $result = $coms_conect->query($sql1);
                $RS = $result->fetch_assoc();

                $page = injection_replace($_GET["page"]);
                $a = pgsel((int)$page, $RS["cnt"], 10, 10, "$root/newcoms.php?yep=new_agahi_text$lang_page$site_page$manager_page$status_page$manager_q$field_page$expire_page$publish_page$cat_page$id_number_page");
                $from = $a[0];
                $to = $a[1];
                $pgsel = $a[2];
                $query = "SELECT a.manager_name,a.can_comment,a.user_id,a.site,a.id,a.la,a.title,a.name,a.view,a.publish_date,a.status,a.com_email,a.date FROM new_managers b ,new_agahi a ,new_modules_catogory c where
							b.id = a.user_id and c.type=20 and a.id=c.page_id 
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
<!--                        <td class="center">--><?//= $RS1["com_email"] ?><!--</td>-->
<!--                        --><?// if ($RS1['site'] == 'main') $domain = '/' . $domain_name; else $domain = '/' . $RS1['site'] . '.' . $domain_name; ?>
<!---->
<!--                        <td><a target="_blank"-->
<!--                               href="/--><?//= "$domain/company/{$RS1['la']}/{$RS1['id']}/" . insert_dash($RS1['title']) ?><!--">--><?//= $RS1["title"] ?><!--</a>-->
                        </td>

<!--                        --><?// get_result("select user_name from new_managers where id={$RS1["user_id"]}", $coms_conect) ?>
                        <td class="center"><?= $RS1["title"] ?></td>

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
                                   href="newcoms.php?yep=new_agahi_text&edit_id=<?= $id ?>">
                                    <i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
                                </a>
                            <? }
                            if ($_SESSION["can_delete"] == 1) {
                                ?>
                                <a href="#" id="<?= $id ?>" class="red del_menu icon" data-title="delete"
                                   data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                    <i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
                                </a>
                                <a href="<?= "$domain/agahi/{$RS1['la']}" ?>"
                                   target="_blank" class="del_menu blue icon">
                                    <i class="ace-icon fa fa-vimeo-square bigger-120" title="نمایش"></i>
                                </a>
                            <? }
                            if (get_result("select count(id) from new_madules_comment where type=20 and status=0 and madul_id={$RS1['id']}", $coms_conect)) {
                                ?>

                                <a href="/newcoms.php?yep=new_company_comment&id=<?= $RS1['id'] ?>" target="_blank"
                                   id="<?= $id ?>" class="green new_scomments icon">
                                    <?= mudoal_comment_count($RS1['id'], 1, $coms_conect) ?><i
                                            class="ace-icon fa fa-comments bigger-120" title="نظرات"></i>
                                </a>
                            <? }
                            $movie = get_result("SELECT adress FROM  new_file_path  WHERE type=20 and name='company_video' and id={$RS1['id']}", $coms_conect);
                            if ($movie > "") {
                                ?>
                                <a href="#" id="<?= $movie ?>" class="show_video_modual icon" data-toggle="modal"
                                   data-target="#show_video_grid">
                                    <i class="ace-icon fa fa-film bigger-120" title="فیلم"></i>
                                </a>
                            <? } ?>
                            <? $album = get_result("SELECT adress FROM  new_file_path  WHERE type=20 and name='company_gallery' and id={$RS1['id']}", $coms_conect);
                            if ($album > "") {
                                ?>
                                <a href="#" id="<?= $id ?>" class="green show_company_gallery icon" data-toggle="modal"
                                   data-target="#show_company_gallery">
                                    <i class="ace-icon fa fa-picture-o bigger-120" title="البوم عکس"></i>
                                </a>
                            <? } ?>
                            <? $voice = get_result("SELECT adress FROM  new_file_path  WHERE type=20 and name='company_sound' and id={$RS1['id']}", $coms_conect);
                            if ($voice > "") {
                                ?>
                                <a href="#" id="<?= $voice ?>" class="blue show_video_modual icon">
                                    <i class="ace-icon fa fa-volume-up bigger-120" title="صدا" data-toggle="modal"
                                       data-target="#show_video_grid"></i>
                                </a>
                            <? } ?>
                            <? $attach = get_result("SELECT adress FROM  new_file_path  WHERE type=20 and name='company_attach' and id={$RS1['id']}", $coms_conect);
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
                    <a href="newcoms.php?yep=new_agahi_text" data-toggle="tooltip" data-placement="bottom" title=""
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
                                    <p class="flaticon-file23">ثبت آگهی</p>

                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#cat3">
                                    <p class="flaticon-squares36"></p>
                                    دسته بندی
                                </a>
                            </li>
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#navication">-->
<!--                                    <p class="flaticon-gallery7"></p>-->
<!--                                    نوار ناوبری-->
<!--                                </a>-->
<!--                            </li>-->
                            <li>
                                <a data-toggle="tab" href="#SEO3">
                                    <p class="flaticon-search103"></p>
                                    SEO
                                </a>
                            </li>
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#slide">-->
<!--                                    <p class="flaticon-folder23"></p>-->
<!--                                    اسلايدشو-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="sss" id="fff">-->
<!--                                <a data-toggle="tab" href="#gallery">-->
<!--                                    <p class="flaticon-gallery7"></p>-->
<!--                                    گالري تصاوير-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="sss" id="ddd">-->
<!--                                <a data-toggle="tab" href="#video">-->
<!--                                    <p class="flaticon-videoplayer5"></p>-->
<!--                                    ويدئو-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li class="" id="aaa">-->
<!--                                <a data-toggle="tab" href="#types">-->
<!--                                    <p class="flaticon-speaker100"></p>-->
<!--                                    فعالیت ها-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#company_info">-->
<!--                                    <p class="flaticon-copy23"></p>-->
<!--                                    اطلاعات شرکت-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#info_caller">-->
<!--                                    <p class="flaticon-copy23"></p>-->
<!--                                    اطلاعات تماس-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#tab_products">-->
<!--                                    <p class="flaticon-copy23"></p>-->
<!--                                    محصولات-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#tab_catalog">-->
<!--                                    <p class="flaticon-copy23"></p>-->
<!--                                    کاتالوگ و فایل ها-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#tab_representation">-->
<!--                                    <p class="flaticon-copy23"></p>-->
<!--                                    نمایندگی ها-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#tab_distributors">-->
<!--                                    <p class="flaticon-copy23"></p>-->
<!--                                    توزیع کننده ها-->
<!--                                </a>-->
<!--                            </li>-->
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
                                                        <label class="control-label">عنوان</label>
                                                        <input value="<?= $edit_name ?>" name="name" id="name"
                                                               class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="form-group col-sm-6">
                                                        <label class="control-label">توضیح</label>
                                                        <input type="text" value="<?= $title ?>" name="title" id="title"
                                                               class="form-control"
                                                               data-fv-notempty="true"
                                                               data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label">معرفی آگهی*</label>
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

                                            </div>

                                            <script>
                                                /////////////// radio show hide upload image
                                                $(document).ready(function () {
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
                                            </script>



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
                            <? $type = 20; ?>
                            <? include 'newcoms/main/new_modual_seo.php4'; ?>
<!--                            --><?// include 'newcoms/main/new_modual_slide.php4'; ?>

                            <? $type = 20;
                            include 'newcoms/main/new_modual_catogory.php4'; ?>


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
            $('#company_fax').mask("(+99) 9999-9999", {placeholder: ""});
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





    <script>
        $(function () {
            $('.can_comment').click( function() {
                id=$(this).attr('id');
                // alert(id);
                if($(this).prop('checked'))
                    var a=1;
                else
                    a=0;

                $.ajax({
                    type:'POST',
                    url:'New_ajax_company.php',
                    data:"action=can_comment_agahi&valuecomment="+a+"&idcomment="+id,
                    success: function(result){
                        // alert(id);
                        // alert('re='+result);
                        // alert(a);
                    }
                });
            });
        });
    </script>



<!--    <script src="ajax_js/company.js"></script>-->
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
            if(chkId=='') {
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

        var chkId_brand='';
        var chkIdArr_brand='';
        $("#relate_btn_representation").click(function () {
            $("#show_waiting_search").show();
            <? if($edit_id > "") {?>
            if(chkId_brand=='') {
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


        $(document).ready(function () {
            $('.sss').hide();
            /*$("#ID").click(function(){
				if( $(this).is(':checked')) {
                        $("#fff").show();//gallery
                    }else {
                        $("#fff").hide();//gallery
                    }
                });*/
            $("#ID2").click(function () {
                if ($(this).is(':checked')) {
                    $("#fff").show();//gallery
                } else {
                    $("#fff").hide();//gallery
                }
            });
            $("#ID3").click(function () {
                if ($(this).is(':checked')) {
                    $("#ddd").show();//video
                } else {
                    $("#ddd").hide();//video
                }
            });
            $("#ID4").click(function () {
                if ($(this).is(':checked')) {
                    $("#aaa").show();//voice
                } else {
                    $("#aaa").hide();//voice
                }
            });
            $("#ID6").click(function () {
                if ($(this).is(':checked')) {
                    $("#fff").show();//gallery
                    $("#ddd").show();//video
                    $("#aaa").show();//voice
                } else {
                    $("#fff").hide();//gallery
                    $("#ddd").hide();//video
                    $("#aaa").hide();//voice
                }
            });


            //page load show / hide tab	###################
            if ($('#ID').is(':checked')) {
                $("#fff").show();//gallery
            } else {
                $("#fff").hide();//gallery
            }

            if ($("#ID2").is(':checked')) {
                $("#fff").show();//gallery
            } else {
                $("#fff").hide();//gallery
            }

            if ($("#ID3").is(':checked')) {
                $("#ddd").show();//video
            } else {
                $("#ddd").hide();//video
            }

            if ($("#ID4").is(':checked')) {
                $("#aaa").show();//voice
            } else {
                $("#aaa").hide();//voice
            }


        });


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

        $(".del_menu").click(function () {
            $("#btn_ok").val($(this).attr('id'));
            // alert($("#btn_ok").val());
        });

        $("#btn_ok").click(function () {
            id=$(this).val();
            $.ajax({
                type:'POST',
                url:'New_ajax_company.php',
                data:"action=del_agahi&idagahi="+id,
                success: function(result){
                    // console.log(result);
                    window.location.href = "newcoms.php?yep=new_agahi_text";
                    // alert(result);
                }
            });
        });
    </script>
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



<? $_SESSION["modual_type"] = 4 ?>
<!--<script src="/yep_theme/default/rtl/css/product_brand/jquery.min.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

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

<link rel="stylesheet" href="/yep_theme/default/rtl/css/product/bootstrap.min.css">
<!--<script src="/yep_theme/default/rtl/css/product_brand/bootstrap.min.js"></script>-->
<link rel="stylesheet" href="/yep_theme/default/rtl/css/M_style.css">
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>-->
<!--<script src="/yep_theme/default/rtl/js/select2.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<script src="ajax_js/product.js"></script>-->
<!--<script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/jquery-3.2.1.min.js"></script>-->


<style>
    .desm {
        display: inline-flex !important;
    }
</style>


<? ###چک کردن مدیر

//$files = glob('new_gallery/watermark/*');
//foreach ($files as $file) {
//    if (is_file($file))
//        unlink($file);
//}
//echo 'ss='.$_SESSION['can_edit'].$_SESSION['can_delete'].$_SESSION['can_add'];
$edit_mode = injection_replace($_POST['edit_mode']);
if ($edit_mode > "") {
    $temp_user = get_result("select user_id from new_product_brand where id= $edit_mode", $coms_conect);
//    if (!in_array($temp_user, $_SESSION['manager_user_permisson']))
//        header('Location: new_manager_signout.php');
}
$edit_id = injection_replace($_GET['edit_id']);
if ($edit_id > "") {
    $temp_user = get_result("select user_id from new_product_brand where id= $edit_id", $coms_conect);
//    if (!in_array($temp_user, $_SESSION['manager_user_permisson']))
//        header('Location: new_manager_signout.php');
}

$addnew = injection_replace($_GET['addnew']);
$name = injection_replace($_POST['name']);
$name_url = injection_replace($_POST['name_url']);

$status = injection_replace($_POST['status']);
if (isset($upload_type_nav)|| $upload_type_nav == '')
    $upload_type_nav = 1;
#file upload field
$upload_type_nav = injection_replace($_POST['upload_type_nav']);
if ($upload_type_nav == 2)
    $navication_pic = injection_replace($_POST['product_image_nav']);

else if ($upload_type_nav == 1) {
    $product_image_avatar_nav = injection_replace($_POST['product_image_avatar_nav'][0]);
//    echo $product_image_avatar_nav;
    $product_image_avatar_nav = trim($product_image_avatar_nav);
    if ($product_image_avatar_nav != '')
        $navication_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $product_image_avatar_nav;
    else
        $navication_pic = '';
}
//echo  $navication_pic;exit;



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
//$product_brand_type = $fori . $tasviri . $videoi . $soti . $erjaei;


# SEO Tab
$meta_label = ($_POST['meta_label']);
$meta_label_active = ($_POST['meta_label_active']);

//print_r($meta_label_active) . '<br>' . print_r($meta_label);
//echo 'sas';
if (!empty($meta_label_active)) {
    $meta_label_active = implode(',', $meta_label_active);
//    echo 'meta' . $meta_label_active;
//    exit;
}

$source_link_product = injection_replace($_POST['source_link_product']);
$source_product = injection_replace($_POST['source_product']);
$meta_keyword = injection_replace($_POST['meta_keyword']);
$meta_desciption = injection_replace($_POST['meta_desciption']);
$seo_title = injection_replace($_POST['seo_title']);
$meta_label1 = ($_POST['meta_label1']);

# Slide Tab
$slide = injection_replace($_POST['slide']);


#file upload field
//$upload_type = injection_replace($_POST['upload_type']);
//if ($upload_type == 2)
//    $product_brand_image = injection_replace($_POST['product_brand_image']);
//
//else if ($upload_type == 1) {
//    $product_brand_image_avatar = injection_replace($_POST['product_brand_image_avatar'][0]);
//    $product_brand_image_avatar = trim($product_brand_image_avatar);
//    if ($product_brand_image_avatar != '')
//        $product_brand_image = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $product_brand_image_avatar;
//    else
//        $product_brand_image = '';
//}

//echo  $product_brand_image.'wew';
$product_brand_video_pic = injection_replace($_POST['product_brand_video_pic']);
$product_brand_attach = injection_replace($_POST['product_brand_attach']);
$product_brand_sound = injection_replace($_POST['product_brand_sound']);
$product_brand_video = injection_replace($_POST['product_brand_video']);

$album_type = injection_replace($_POST['album_type']);
if ($album_type == 2) {
    $imagelist = ($_POST['imagelist']);
    foreach ($_POST['product_brand_image_album'] as $val) {
        unlink('new_gallery/files/' . $val);
        unlink('new_gallery/files/tn' . $val);
    }

} else if ($album_type == 1 && count($_POST['product_brand_image_album']) > 0) {
    foreach ($_POST['product_brand_image_album'] as $val)
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

#اطلاعات برند ها
$manager_name = injection_replace($_POST['product_brand_manager_name']);
$boss_name = injection_replace($_POST['product_brand_boss_name']);
$tech_name = injection_replace($_POST['product_brand_technical_name']);
$latin_name = injection_replace($_POST['product_brand_latin_name']);
$num_sabt = injection_replace($_POST['product_brand_num_sabt']);
$num_code = injection_replace($_POST['product_brand_num_code']);
$com_type = injection_replace($_POST['product_brand_type']);
$sabt_date = injection_replace($_POST['sabt_date']);
$city = injection_replace($_POST['product_brand_city']);
$zipcode = injection_replace($_POST['product_brand_zipcode']);
$com_adres = injection_replace($_POST['product_brand_address']);
$com_adres_site = injection_replace($_POST['product_brand_address_site']);
$com_email = injection_replace($_POST['product_brand_email']);
//$img_email = injection_replace($_POST['img_email']);

$com_fax = injection_replace($_POST['product_brand_fax']);
$val_i = injection_replace($_POST['val_i']);
$val_z = injection_replace($_POST['val_z']);
//$s = injection_replace($_POST['val_s']);
//$q = injection_replace($_POST['val_q']);
$val_w = injection_replace($_POST['val_w']);
$check_checked = injection_replace($_POST['check_checked']);
$check_checked_brand = injection_replace($_POST['check_checked_representation']);
$chkbx_link = injection_replace($_POST['chkbx_link']);
$state = injection_replace($_POST['product_brand_state']);
$com_social_link1 = injection_replace($_POST['product_brand_social_link1']);
$com_social_link2 = injection_replace($_POST['product_brand_social_link2']);
$com_social_link3 = injection_replace($_POST['product_brand_social_link3']);
$com_social_link4 = injection_replace($_POST['product_brand_social_link4']);
//echo $check_checked;
//$phone_phone = injection_replace($_POST['product_brand_ph_links_title1']);
//echo check_catogory($array_value);

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
    $user_id = 1;

    if ($_SESSION["can_add"] != 1)
        $status = 0;
    if ($spesial_finish_date == '') $spesial_finish_date = $spesial_date;
    if ($spesial_start_date == '') $spesial_start_date = $spesial_date;

////====== تبدیل ایمیل به عکس invert email to jpg ========//
//    if (isset($_POST['product_brand_email']) and $edit_mode == '') {
//        echo 'sdsd';
//        $len = strlen($com_email);
//        $width = ($len + 2) * 7;
//        $im = imagecreatetruecolor($width, 20);
//
//// Create some colors
//        $white = imagecolorallocate($im, 255, 255, 255);
//
//        imagefilledrectangle($im, 0, 0, $width - 1, 4, $white);
//// Replace path by your own font path
////    $font = 'http://' . $_SERVER["HTTP_HOST"] .'/yep_theme/default/rtl/images/email/arial.ttf';
//        $font = 'yep_theme/default/rtl/images/email/arial.ttf';
//        imagettftext($im, 10, 0, 5, 15, $black, $font, $com_email);
//
//// Create image in folder
//        $rnd = rand(0, 9999);
//
//        $img_email = 'yep_theme/default/rtl/images/email/' . 'img-email' . $rnd . '.jpg';
////        echo 'rr='.$image_email.'rnd='.$rnd;exit;
//        imagejpeg($im, $img_email);
//        imagedestroy($im);
//
//// Show image in output page
//
//    }

//=======end invert email to jpg


    $arr = array("name_url" => $name_url, "upload_type_nav" => $upload_type_nav, "navication_pic" => $navication_pic, "check_link" => $chkbx_link, "upload_type" => $upload_type, 'hashtag_key' => $meta_label1, "seo_title" => $seo_title, "source_link_product" => $source_link_product, "source_product" => $source_product, "name" => $name, "title" => $title, "text" => $text, "meta_keyword" => $meta_keyword, "meta_description" => $meta_desciption, "abstract" => $abstract, "user_id" => $user_id, "la" => $manage_lang, "site" => $manage_site, "status" => $status);
    $id = insert_to_data_base($arr, 'new_product_brand', $coms_conect);
//    print_r($arr);
    $id_com = $coms_conect->insert_id;
//echo 'idc='.$id_com;


//    echo  $product_brand_image;
//    $arr_imag = array("id" => $id, "type" => 4, "adress" => $product_brand_image, "name" => 'product_brand_image');
//    insert_to_data_base($arr_imag, 'new_file_path', $coms_conect);
////    echo  $product_brand_image.'qq';
//    $arr_attach = array("id" => $id, "type" => 4, "adress" => $product_brand_attach, "name" => 'product_brand_attach');
//    insert_to_data_base($arr_attach, 'new_file_path', $coms_conect);
//
//
//    $arr_sound = array("id" => $id, "type" => 4, "adress" => $product_brand_sound, "name" => 'product_brand_sound');
//    insert_to_data_base($arr_sound, 'new_file_path', $coms_conect);
//
//    $arr_video = array("id" => $id, "type" => 4, "adress" => $product_brand_video, "name" => 'product_brand_video');
//    insert_to_data_base($arr_video, 'new_file_path', $coms_conect);
//
//    $arr_video = array("id" => $id, "type" => 4, "adress" => $product_brand_video_pic, "name" => 'product_brand_video_pic');
//    insert_to_data_base($arr_video, 'new_file_path', $coms_conect);

    ####label
    if (!empty($meta_label)) {
//        $temp = explode(",", $meta_label);
        foreach ($meta_label as $value) {
            if ($value > "") {
                $label_arr = array("id" => $id, "type" => 4, "label_id" => $value);
                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }


//    ### gallery add
//    if (!empty($imagelist)) {
//        foreach ($imagelist as $image) {
//            if ($image != -1) {
//                $gallery_arr = array("id" => $id, "type" => 4, "adress" => $image, "name" => 'product_brand_gallery');
//                insert_to_data_base($gallery_arr, 'new_file_path', $coms_conect);
//            }
//        }
//    }
//
//    #####دسته بندي#######
//    foreach ($cat_arr as $value) {
//        if ($value != -1) {
//            $arr = array("cat_id" => $value, "page_id" => $id, "type" => 4);
//            insert_to_data_base($arr, 'new_modules_catogory', $coms_conect);
//        }
//    }
//
//    $related = explode(",", $totla_related);
//    foreach ($related as $value) {
//
//        $arr = array("id" => $value, "page_id" => $id, "type" => 4);
//        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
//    }
//
//    $related_brand = explode(",", $totla_related_brand);
//    foreach ($related_brand as $value_brand) {
//
//        $arr = array("id" => $value_brand, "page_id" => $id_com, "type" => 4);
//        insert_to_data_base($arr, 'new_product_brand_related', $coms_conect);
//    }
//
//    ### slide show add
//
//    if ($slide == 1) {
//        $slide_link = "/product_brand/$manage_lang/$id/" . insert_dash("$name");
//        $arr_slide = array("check_link" => $chkbx_link, "la" => $manage_lang, "site" => $manage_site, "link" => $slide_link, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $id, "type" => 4, "user_id" => $user_id, "date" => $now, "ip" => $custom_ip);
//        insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
//    }

    show_msg($new_successfull);
} else if ($edit_mode > "" && $title > "" && $_SESSION["can_edit"] == 1 && check_catogory($array_value) == 1) {
    check_token($_REQUEST['user_token'], $_SESSION['session_token'], '/coms');
    if ($spesial_finish_date == '') $spesial_finish_date = $spesial_date;
    if ($spesial_start_date == '') $spesial_start_date = $spesial_date;
    $edit_user_id = injection_replace($_SESSION['manager_id']);
    $edit_user_id = 1;
    $condition = "id=$edit_mode";

    $arr = array("name_url" => $name_url, "upload_type_nav" => $upload_type_nav, "navication_pic" => $navication_pic, "check_link" => $chkbx_link, "upload_type" => $upload_type, 'hashtag_key' => $meta_label1, "seo_title" => $seo_title, "source_link_product" => $source_link_product, "source_product" => $source_product, "name" => $name, "title" => $title, "text" => $text, "meta_keyword" => $meta_keyword, "meta_description" => $meta_desciption, "abstract" => $abstract, "user_id" => $user_id, "la" => $manage_lang, "site" => $manage_site, "status" => $status);
    update_data_base($arr, 'new_product_brand', $condition, $coms_conect);
    $id_pro = $edit_id;

//
    $condition = "id=$edit_mode && name='product_brand_image'";
    $arr_imag = array("id" => $edit_mode, "type" => 4, "adress" => $product_brand_image, "name" => 'product_brand_image');
    update_data_base($arr_imag, 'new_file_path', $condition, $coms_conect);
//    echo  $product_brand_image.'ee';
//
//    $condition = "id=$edit_mode && name='product_brand_attach'";
//    $arr_attach = array("id" => $edit_mode, "type" => 4, "adress" => $product_brand_attach, "name" => 'product_brand_attach');
//    update_data_base($arr_attach, 'new_file_path', $condition, $coms_conect);
//
//
//    $condition = "id=$edit_mode && name='product_brand_sound'";
//    $arr_sound = array("id" => $edit_mode, "type" => 4, "adress" => $product_brand_sound, "name" => 'product_brand_sound');
//    update_data_base($arr_sound, 'new_file_path', $condition, $coms_conect);
//
//    $condition = "id=$edit_mode && name='product_brand_video'";
//    $arr_video = array("id" => $edit_mode, "type" => 4, "adress" => $product_brand_video, "name" => 'product_brand_video');
//    update_data_base($arr_video, 'new_file_path', $condition, $coms_conect);
//
//    $condition = "id=$edit_mode && name='product_brand_video_pic'";
//    $arr_video = array("id" => $edit_mode, "type" => 4, "adress" => $product_brand_video_pic, "name" => 'product_brand_video_pic');
//    update_data_base($arr_video, 'new_file_path', $condition, $coms_conect);
//

    ####label
    $condition = "id=$edit_mode and type=4";
    delete_from_data_base('new_mudoal_label', $condition, $coms_conect);

    if (!empty($meta_label)) {
//          $temp = explode(",", $meta_label);
        foreach ($meta_label as $value) {
            if ($value > "") {
                $label_arr = array("id" => $edit_mode, "type" => 4, "label_id" => $value);
                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }
//    ##edit gallery
//    $query1 = "delete from new_file_path where id='$edit_mode' && name='product_brand_gallery' and type=4";
//    $coms_conect->query($query1);
//    if (!empty($imagelist)) {
//        foreach ($imagelist as $image) {
//            if ($image != -1) {
//                $gallery_arr = array("id" => $edit_mode, "type" => 4, "adress" => $image, "name" => 'product_brand_gallery');
//                insert_to_data_base($gallery_arr, 'new_file_path', $coms_conect);
//            }
//        }
//    }
//
//#####دسته بندي#######
//    $query1 = "delete from new_modules_catogory where page_id='$edit_mode' and type=4";
//    $coms_conect->query($query1);
//    foreach ($cat_arr as $value) {
//        if ($value != -1) {
//            $arr = array("cat_id" => $value, "page_id" => $edit_mode, "type" => 4);
//            insert_to_data_base($arr, 'new_modules_catogory', $coms_conect);
//        }
//    }
//#####related
//    $query1 = "delete from new_related_madual where page_id='$edit_mode' and type=4";
//    $coms_conect->query($query1);
//    $related = explode(",", $totla_related);
//    foreach ($related as $value) {
//
//        $arr = array("id" => $value, "page_id" => $edit_mode, "type" => 4);
//        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
//    }
//    $query111 = "delete from new_product_brand_related where page_id='$edit_mode' and type=4";
//    $coms_conect->query($query111);
//    $related_brand = explode(",", $totla_related_brand);
//    foreach ($related_brand as $value_brand) {
//        $arr = array("id" => $value_brand, "page_id" => $edit_mode, "type" => 4);
//        insert_to_data_base($arr, 'new_product_brand_related', $coms_conect);
//    }
//    ### slide show update
//    if ($slide == 1) {
//        $slide_link = "/product_brand/$manage_lang/$edit_mode/" . insert_dash("$name");
//        $query1 = "select count(id) as count from new_slideshow where page_id='$edit_mode'  and type=4";
//        $result = $coms_conect->query($query1);
//        $row = $result->fetch_assoc();
//        $count = $row['count'];
//        if ($count != 0) {
//            $condition = "page_id=$edit_mode";
//            $arr_slide = array("link" => $slide_link, "la" => $manage_lang, "site" => $manage_site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 4, "edit_user_id" => $edit_user_id, "edit_date" => $now, "ip" => $custom_ip);
//            update_data_base($arr_slide, 'new_slideshow', $condition, $coms_conect);
//
//        } else {
//            $arr_slide = array("link" => $slide_link, "la" => $manage_lang, "site" => $manage_site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 4, "user_id" => $edit_user_id, "date" => $now, "ip" => $custom_ip);
//            insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
//
//        }
//    } else {
//        $query1 = "delete from new_slideshow where page_id='$edit_mode' and type=4";
//        $coms_conect->query($query1);
//    }
    show_msg($new_successfull);
}

create_session_token();
###############نمايش در حالت ويرايش#################
if ($edit_id > "") {
    $query = "SELECT * FROM new_product_brand where id='$edit_id'";
    $result = $coms_conect->query($query);
//    print_r($query);
//    print_r($result); echo $edit_id;exit;
    $row = $result->fetch_assoc();
    $status = $row['status'];
    $album_type = $row['album_type'];
    $upload_type = $row['upload_type'];
    $upload_type_nav = $row['upload_type_nav'];
    $duration = $row['duration'];
    $edit_source_link_product = $row['source_link_product'];
    $edit_source_product = $row['source_product'];
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

//    $navication_pic = $row['navication_pic'];


    $state = $row['state'];
    $com_social_link1 = $row['social_link1'];
    $com_social_link2 = $row['social_link2'];
    $com_social_link3 = $row['social_link3'];
    $com_social_link4 = $row['social_link4'];
    $pic_type = $row['pic_type'];
//    $meta_label_active = $row['com_active'];
    $meta_label_active = explode(',', ta_latin_num($row['com_active']));
//print_r($meta_label_active);

//    echo $phone_phone.$phone_name;


    $label = '';
    $query = "select label_id from new_mudoal_label where id='$edit_id' and type=4";
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
//    $product_brand_type = $row['content_type'];
//    $temp_1 = str_split($product_brand_type);
//    $fori = $temp_1[0];
//    $tasviri = $temp_1[1];
//    $videoi = $temp_1[2];
//    $soti = $temp_1[3];
//    $erjaei = $temp_1[4];


    #Query from new_slideshow
//    $query = "SELECT * FROM new_slideshow where page_id='$edit_id'  and type=4";
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

    #Query from new_file_path
    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='product_brand_image'  and type=4";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $product_brand_image = $row['adress'];
//    echo $product_brand_image;
//
//    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='product_brand_attach'  and type=4";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $product_brand_attach = $row['adress'];
//
//    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='product_brand_sound'  and type=4";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $product_brand_sound = $row['adress'];
//
//    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='product_brand_video'  and type=4";
//    $result = $coms_conect->query($query);
//    $row = $result->fetch_assoc();
//    $product_brand_video = $row['adress'];
//
//    $query = "SELECT b.id,title FROM new_related_madual a ,new_product_brand b where page_id='$edit_id' and a.id=b.id and type=4";
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
//    $query1b = "SELECT b.id,name FROM new_product_brand_related a ,new_product_brand_cat_brand b where page_id='$edit_id' and a.id=b.id and a.type=4";
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

}


//$id_com = $coms_conect->insert_id;
//echo 'idc='.$manage_site.'eid='.$main;

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
//    $phone_name = injection_replace($_POST["product_brand_na_links_title{$j}"]);
//    $phone_phone = injection_replace($_POST["product_brand_ph_links_title{$j}"]);
//    $phone_id = injection_replace($_POST["product_brand_ph_id{$j}"]);
//    $phone_id_com = injection_replace($_POST["product_brand_ph_id_com{$j}"]);
////echo 'pic='.$phone_id_com.'<br>';
//    if (empty($phone_id_com) && !empty($_POST["product_brand_ph_links_title{$j}"])) {
////        echo 'idcom='.$id_com.'pic='.$phone_id_com.'<br>';
//        $arr_phone = array("phone_name" => $phone_name, "phone_phone" => $phone_phone, "id_com" => $id_com);
////       print_r($arr_phone);
//        insert_to_data_base($arr_phone, 'new_product_brand_phone', $coms_conect);
//    } else {
//
//        $condition = "id=$phone_id";
//        $arr_phone = array("phone_name" => $phone_name, "phone_phone" => $phone_phone, "id_com" => $phone_id_com);
//        update_data_base($arr_phone, 'new_product_brand_phone', $condition, $coms_conect);
//
//    }
//}
//########################################################### پایان ثبت تلفن END insert update phone  ####################################################
//
//
//########################################################### شروع ثبت تلفن START slide_esp   ########################################################
//$val_slide_esp = injection_replace($_POST["slide_esp_ph_links_count"]);
////echo  $val_slide_esp;
////exit;
//for ($j = 1; $j <= $val_slide_esp; $j++) {
////    $sal_slide_esp = injection_replace($_POST["slide_esp_na_links_title{$j}"]);
////    $yoni = injection_replace($_POST["slide_esp_ph_links_title{$j}"]);
//    $sal_slide_esp = injection_replace($_POST["img_slide_esp_year{$j}"]);
//    $book_slide_esp = injection_replace($_POST["img_slide_esp_title{$j}"]);
////    $nasher_slide_esp = injection_replace($_POST["slide_esp_nasher_links_title{$j}"]);
//    $slide_esp_id = injection_replace($_POST["slide_esp_doctor_on_id{$j}"]);
//    $slide_esp_id_com = injection_replace($_POST["product_brand_slide_esp_id_com{$j}"]);
//
//
////    if (isset($_POST["img_slide_esp_pic{$j}"])){
//    $slide_esp_img_smallBox1_avatar7_adrs = injection_replace_pic($_POST["img_slide_esp_pic{$j}"]);
//    $slide_esp_img_smallBox1_avatar7_adrs = trim($slide_esp_img_smallBox1_avatar7_adrs);
//    $slide_esp_img_smallBox1_avatar7 = injection_replace($_POST["slide_esp_img_smallBox1_avatar7{$j}"][0]);
//    $slide_esp_img_smallBox1_avatar7 = trim($slide_esp_img_smallBox1_avatar7);
//
////    echo'piss='.$slide_esp_img_smallBox1_avatar7_adrs.'<br>'.'pp='.$slide_esp_img_smallBox1_avatar7.'<br>';
////       }else {
//    if ($slide_esp_img_smallBox1_avatar7 > '') {
////        echo 'pic=='.$slide_esp_img_smallBox1_avatar7;
//        $slide_esp_img_smallBox1_avatar7_adrs = 'http://' . $_SERVER["HTTP_HOST"] . '/source/comsroot/defualt/slide_esp/' . $slide_esp_img_smallBox1_avatar7;
////        echo $img_smallBox1_pic;
//    }
//
//
////echo 'pic='.$slide_esp_id.'<br>'.'pic1='.$sal_slide_esp.'<br>'.'pics='.$book_slide_esp.'<br>'.'picss='.$slide_esp_img_smallBox1_avatar7_adrs.'<br>';
//    if (empty($slide_esp_id_com) && !empty($_POST["img_slide_esp_year{$j}"])) {
////        echo 'idcom='.$id_com.'pic='.$fav_id_com.'<br>';
//        $arr_slide_esp = array("big_titr" => $sal_slide_esp, "chip_titr" => $book_slide_esp, "pic_slide_esp" => $slide_esp_img_smallBox1_avatar7_adrs, "id_com" => $id_com);
////       print_r($arr_slide_esp);
//        insert_to_data_base($arr_slide_esp, 'new_product_brand_slide_esp', $coms_conect);
//    } else {
//
//        $condition = "id=$slide_esp_id";
//        $arr_slide_esp = array("big_titr" => $sal_slide_esp, "chip_titr" => $book_slide_esp, "pic_slide_esp" => $slide_esp_img_smallBox1_avatar7_adrs, "id_com" => $slide_esp_id_com);
////        echo '<br>'.'j='.$j.'='.$condition.'=='; print_r($arr_slide_esp);
//        update_data_base($arr_slide_esp, 'new_product_brand_slide_esp', $condition, $coms_conect);
//
//    }
//    $slide_esp_img_smallBox1_avatar7_adrs = '';
//}
//
//########################################################### شروع ثبت تلفن END slide_esp   ########################################################
////
//

########################################################### شروع ثبت آدرس START insert update address   ########################################################

//
////echo '$val_z='.$val_z;
//for ($z = 1; $z <= $val_z; $z++) {
//    $product_brand_adres_onvan = injection_replace($_POST["product_brand_adres_onvan{$z}"]);
//    $product_brand_adres_state = injection_replace($_POST["product_brand_adres_state{$z}"]);
//    $product_brand_adres_city = injection_replace($_POST["product_brand_adres_city{$z}"]);
//    $product_brand_adres_zip = injection_replace($_POST["product_brand_adres_zip{$z}"]);
//    $product_brand_adres_adres = injection_replace($_POST["product_brand_adres_adres{$z}"]);
//    $adres_id = injection_replace($_POST["product_brand_ad_id{$z}"]);
//    $adres_id_com = injection_replace($_POST["product_brand_ad_id_com{$z}"]);
////echo 'pic='.$adres_id_com.'<br>';
////echo 'pi='.$adres_id.'<br>';
//    if (empty($adres_id_com) && !empty($_POST["product_brand_adres_adres{$z}"])) {
////        echo 'idcom='.$id_com.'pic='.$phone_id_com.'<br>';
//        $arr_adres = array("onvan_adres" => $product_brand_adres_onvan, "state_adres" => $product_brand_adres_state, "city_adres" => $product_brand_adres_city, "adres_adres" => $product_brand_adres_adres, "zip_adres" => $product_brand_adres_zip, "id_com" => $id_com);
////       print_r($arr_phone);
//        insert_to_data_base($arr_adres, 'new_product_brand_adres', $coms_conect);
//    } else {
//
//        $condition = "id=$adres_id";
//        $arr_adres = array("onvan_adres" => $product_brand_adres_onvan, "state_adres" => $product_brand_adres_state, "city_adres" => $product_brand_adres_city, "adres_adres" => $product_brand_adres_adres, "zip_adres" => $product_brand_adres_zip, "id_com" => $adres_id_com);
////       print_r($arr_adres);
//        update_data_base($arr_adres, 'new_product_brand_adres', $condition, $coms_conect);
//
//    }
//}
//########################################################### پایان ثبت آدرس END insert update adderss  ####################################################
//
//
//########################################################### شروع ثبت برند ها START insert update brand   ########################################################
////
////echo 'val-w='.$val_w;
//for ($j = 1; $j <= $val_w; $j++) {
//    $com_tozi_name = injection_replace($_POST["tab_distributors_links_title{$j}"]);
//    $com_tozi_type = injection_replace($_POST["tab_distributors_links_type{$j}"]);
//    $brand_id = injection_replace($_POST["product_brand_dis_id{$j}"]);
//    $brand_id_com = injection_replace($_POST["product_brand_dis_id_com{$j}"]);
////echo 'pic='.$phone_id_com.'<br>';
//    if (empty($brand_id_com) && !empty($_POST["tab_distributors_links_title{$j}"])) {
////        echo 'idcom='.$id_com.'pic='.$phone_id_com.'<br>';
//        $arr_brand = array("com_tozi_name" => $com_tozi_name, "com_tozi_type" => $com_tozi_type, "id_com" => $id_com);
////       print_r($arr_brand);
//        insert_to_data_base($arr_brand, 'new_product_brand', $coms_conect);
//    } else {
//
//        $condition = "id=$brand_id";
//        $arr_brand = array("com_tozi_name" => $com_tozi_name, "com_tozi_type" => $com_tozi_type, "id_com" => $brand_id_com);
//        update_data_base($arr_brand, 'new_product_brand', $condition, $coms_conect);
//
//    }
//}
//########################################################### پایان ثبت برند ها  END insert update brand  ####################################################


//print_r($totla_related_brand);
##################################
?>
<div class="modal fade" id="del_reated_product_brand" tabindex="-1" role="dialog" aria-labelledby="edit"
     aria-hidden="true">
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
                <button type="button" id="btn_del_related_product_brand" data-dismiss="modal"
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


<div class="modal fade" id="del_reated_product_brand_representation" tabindex="-1" role="dialog" aria-labelledby="edit"
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
                <button type="button" id="btn_del_related_product_brand_representation" data-dismiss="modal"
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
    <input type="hidden" value="new_product_brand" name='yep'>
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
    <div class="modal fade" id="show_product_brand" tabindex="-1">
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
                    <button type="button" id="btn_ok_product_brand00" value="" data-dismiss="modal"
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
                    <? if ($_GET['manager_filter'] > "") { ?>    <a href="/newcoms.php?yep=new_product_brand"
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
                <div class="title"><p class="titr">لیست برند ها</p>
                    <p class="lead">امکان مدیریت و افزودن و ویرایش کردن برند ها در این قسمت فراهم شده است.</p>
                </div>
            </div>
            <!-- /section:content/contenttext.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                    <? if ($_SESSION['can_add'] == 1 || $_SESSION['can_draft'] == 1) { ?> 
                        <li id="newpag" class="addicon reset">
                            <a href="#add_templates" data-toggle="tab" data-placement="bottom"
                               title="افزودن برند  جدید">
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
                                <input type="hidden" name="yep" value="new_product_brand">
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
                    <th width="15%">نام برند</th>

                    <!--                    <th>ایمیل</th>-->
                    <th>آدرس سایت</th>
                    <!--                    <th>نوع برند </th>-->

                    <th class="center">وضعیت</th>
                    <!--                    <th>تاريخ انتشار</th>-->
                    <!--                    --><? // if ($_SESSION['can_add'] && $_SESSION['can_edit']) { ?>
                    <!--                                                                <th class="center">فعال سازي نظر</th>-->
                    <!--                                        --><? //  } ?>
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
                $sql1 = "SELECT count(a.id) as cnt from new_product_brand a  where la='$la' ";
//                                  echo $sql1; exit;
                $result = $coms_conect->query($sql1);
                $RS = $result->fetch_assoc();

                $page = injection_replace($_GET["page"]);
                $a = pgsel((int)$page, $RS["cnt"], 10, 10, "$root/newcoms.php?yep=new_product_brand$lang_page$site_page$manager_page$status_page$manager_q$field_page$expire_page$publish_page$cat_page$id_number_page");
//                print_r($a);
                $from = $a[0];
                $to = $a[1];
                $pgsel = $a[2];
                $query = "SELECT a.site,a.id,a.la,a.title,a.name,a.status FROM new_product_brand a
							
							 group by a.id order by a.id desc LIMIT $from,$to";
                //                                   echo $query;exit;
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
                        <!--                        <td class="center">--><? //= $RS1["com_email"] ?><!--</td>-->
                        <? if ($RS1['site'] == 'main') $domain = '/' . $domain_name; else $domain = '/' . $RS1['site'] . '.' . $domain_name; ?>

                        <td><a target="_blank"
                               href="/<?= "$domain/product_brand/{$RS1['la']}/{$RS1['id']}/" . insert_dash($RS1['title']) ?>"><?= $RS1["title"] ?></a>
                        </td>

<!--                        --><?// get_result("select user_name from new_managers where id={$RS1["user_id"]}", $coms_conect) ?>
                        <!--                        <td class="center">--><? //= $RS1["manager_name"] ?><!--</td>-->

                        <!--                        <td><a href="/--><? //= $domain ?><!--" target="_blank">-->
                        <? //= $RS1['site'] ?><!--</a></td>-->

                        <!--                        <td>--><? //= $RS1["view"] ?><!--</td>-->

                        <!--                        <td>-->
                        <? //= miladitojalaliuser(date('Y-m-d', $RS1["date"])) ?><!--</td>-->
                        <!--                        <td><label></label>-->
                        <!--                            <input id="--><? //= $RS1['id'] ?><!--"-->
                        <!--                                   name="switch-field-1" --><? // if ($RS1['can_comment'] == 1) echo 'checked' ?>
                        <!--                                   class="ace ace-switch ace-switch-5 can_comment" type="checkbox"/>-->
                        <!--                            <span title="فعال سازي نظر" class="lbl"></span></td>-->
                        <!---->
                        <td>
                        					<span data-value="
                        <?= $RS1["status"] ?><!--" class="status_content editable editable-click"
                                                  data-pk="<?= $RS1["id"] ?>">
                                                <? if ($RS1["status"] == 1) {
                                                    echo 'منتشر شده';
                                                } else {
                                                    echo 'پيش نويس';
                                                } ?></span>
                        </td>
                        <!--                                                --><? //  } ?>
                        <td>

                            <? if ($_SESSION["can_edit"] == 1) {
                                ?>
                                <a id="<?= $id ?>" class="edit_menu blue icon"
                                   href="newcoms.php?yep=new_product_brand&edit_id=<?= $id ?>">
                                    <i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
                                </a>
                            <? }
                            if ($_SESSION["can_delete"] == 1) {
                                ?>
                                <a href="#" id="<?= $id ?>" class="red del_menu icon" data-title="delete"
                                   data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                    <i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
                                </a>
                                <a href="/<?= "$domain/product_brand/{$RS1['la']}/{$RS1['id']}/" . insert_dash($RS1['name']) ?>"
                                   target="_blank" class="del_menu blue icon">
                                    <i class="ace-icon fa fa-vimeo-square bigger-120" title="نمایش"></i>
                                </a>
                            <? }?>

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
                    <a href="newcoms.php?yep=new_product_brand" data-toggle="tooltip" data-placement="bottom"
                       title=""
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
                                    <p class="flaticon-file23">ثبت برند </p>

                                </a>
                            </li>
                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#cat3">-->
                            <!--                                    <p class="flaticon-squares36"></p>-->
                            <!--                                    دسته بندی-->
                            <!--                                </a>-->
                            <!--                            </li>-->
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
                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#slide_esp">-->
                            <!--                                    <p class="flaticon-folder23"></p>-->
                            <!--                                    اسلايدشو اختصاصی-->
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

                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#product_brand_info">-->
                            <!--                                    <p class="flaticon-copy23"></p>-->
                            <!--                                    اطلاعات برند-->
                            <!--                                </a>-->
                            <!--                            </li>-->
                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#product_brand_boss">-->
                            <!--                                    <p class="flaticon-copy23"></p>-->
                            <!--                                    اطلاعات مدیرعامل-->
                            <!--                                </a>-->
                            <!--                            </li>-->

                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#info_caller">-->
                            <!--                                    <p class="flaticon-copy23"></p>-->
                            <!--                                    اطلاعات تماس-->
                            <!--                                </a>-->
                            <!--                            </li>-->
                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#tab_product_brands">-->
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
                            <!---->
                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#tab_active">-->
                            <!--                                    <p class="flaticon-copy23"></p>-->
                            <!--                                    فعالیت برند -->
                            <!--                                </a>-->
                            <!--                            </li>-->
                            <!---->
                            <!--                            <li>-->
                            <!--                                <a data-toggle="tab" href="#tab_distributors">-->
                            <!--                                    <p class="flaticon-copy23"></p>-->
                            <!--                                    برند  ها-->
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
                                                        <label class="control-label">نام برند </label>
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
                                                        <label class="control-label">آدرس سایت برند </label>
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
<!--                                                <div class="form-group row">-->
<!---->
<!--                                                </div>-->
                                            </div>

                                            <script>
                                                /////////////// radio show hide upload image
                                                $(document).ready(function () {
                                                    // alert($('#chkbx_link').val());

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
                                                    } else if (!($('#chkbx_link').is(':checked') == true)) {
                                                        $('#chklnk').text('نه');
                                                        $('#chkbx_link').val(0);
                                                    }
                                                });
                                            </script>


                                            <h4>تصوير</h4>

                                            <div class="form-group" id="nav_pic_div" style='display:block'>

                                                <div class="form-group" id="oracup">
                                                    <label class="control-label col-md-12">
                                                        <input type="radio"
                                                               name="upload_type_nav" <? if ($upload_type_nav == 1 || $upload_type_nav=='' )
                                                            echo 'checked'; ?> id="upload_type_nav" value="1">
                                                        الصاق از فایل کامپیوتر
                                                    </label>
                                                    <div class="ui-sortable red_nav box_nav" id="upload_type1_nav"
                                                         style="float:right; <? if ($upload_type_nav == 1  || $upload_type_nav=='') echo 'display:block'; else echo 'display:none' ?>">
                                                        <div id="product_image_avatar_nav" orakuploader="on"></div>
                                                        <? if ($edit_id > "" && $upload_type_nav == 1) {
                                                            $query_nav = "select navication_pic from new_product_brand where id='$edit_id' ";
                                                            $result_nav = $coms_conect->query($query_nav);
                                                            $i = 1;
                                                            $str = '';
                                                            $articles_list = '';

                                                            $pic_str_nav = '';
                                                            $RS1_nav = $result_nav->fetch_assoc();
                                                            $product_image_avatar_nav = end(explode("/", $RS1_nav['navication_pic']));
//                                                $product_image_avatar = $temp[1];
//                                                        $product_image_avatar = trim($product_image_avatar, " ");
                                                            $div_id = explode(".", $product_image_avatar_nav);
//                                                        echo 'ww=';print_r($div_id);
                                                            $pic_str_nav .= "<div class='multibox file' style='cursor: move;' id='$product_image_avatar_nav' filename='$product_image_avatar_nav'>";
                                                            $pic_str_nav .= "<div class='picture_delete'  ></div>";
                                                            $pic_str_nav .= "<img src='new_gallery/files/$product_image_avatar_nav' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                            $pic_str_nav .= "<input type='hidden' value='$product_image_avatar_nav' name='product_image_avatar_nav[]'>";
                                                            $pic_str_nav .= "</div>";
//                                                       $pic_str=explode(" ",$pic_str);echo 'aa='.$product_image_avatar;
                                                        } ?>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function () {


                                                            $('#product_image_avatar_nav').orakuploader({
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
                                                            $('#product_image_avatar_nav').html("<?=$pic_str_nav?>");
                                                        });
                                                    </script>
                                                </div>
                                            </div>


                                            <? //echo "ssqq=".$nav_picnet_div;?>

                                            <label class="control-label col-md-12">
                                                <input type="radio"
                                                       name="upload_type_nav" <? if ($upload_type_nav == 2) echo 'checked'; ?>
                                                       id="radios-1" value="2">
                                                انتخاب از رسانه های قبلی
                                            </label>


                                            <div class="form-group box_nav green_nav" id="nav_picnet_div"
                                                 style="float:right; <? if ($upload_type_nav == 2) echo 'display:block'; else echo 'display:none' ?>">
                                                <div class="form-group col-md-6">
                                                    <div class="imgdemo"><img id="aks_news_thumb"
                                                                              src="/yep_theme/default/rtl/images/pic.png">
                                                    </div>
                                                    <!--img data-src="holder.js/100%x100%" id="aks_news_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                    <div style="display: inline-flex;">
                                                        <script>
                                                            setInterval(check_address, 2000)

                                                            function check_address() {
                                                                var aks_news = $('#product_image_nav').val();
                                                                if (aks_news != "") {
                                                                    $('#aks_news_thumb').attr("src", aks_news);
                                                                }
                                                            }
                                                        </script>
                                                        <a href="/filemanager/dialog.php?type=2&amp;field_id=product_image_nav"
                                                           class="btn btn-success iframe-btn"
                                                           style="padding: 5px 5px 2px 5px;vertical-align: bottom;">
                                                            <span class="addimg flaticon-add139"></span></a>
                                                        <input type="text" name="product_image_nav"
                                                               value="<?= $navication_pic; ?>" id="product_image_nav"
                                                               class="imginput">
                                                    </div>
                                                </div>
                                            </div>


                                            <!--                                    <label class="control-label">بارگزاري تصوير جديد</label>-->
                                            <!--                                    <div class="headerimgdemo">-->
                                            <!--                                        <img id="aks_thumb" src="/yep_theme/default/rtl/images/pic.png">-->
                                            <!--                                    </div>-->
                                            <!--                                    <script>-->
                                            <!--                                        setInterval(check_address, 2000)-->
                                            <!---->
                                            <!--                                        function check_address() {-->
                                            <!--                                            var aks_news = $('#navication_pic').val();-->
                                            <!--                                            if (aks_news != "") {-->
                                            <!--                                                $('#aks_thumb').attr("src", aks_news);-->
                                            <!--                                            }-->
                                            <!--                                        }
                                                                                      </script>-->
                                            <!--                                     <div>-->
                                            <!--                                         <a href="/filemanager/dialog.php?type=1&amp;field_id=navication_pic"-->
                                            <!--                                           class="btn btn-success iframe-btn"-->
                                            <!--                                            style="padding: 6px 5px 2px 5px;    vertical-align: bottom;"><span-->
                                            <!--                                                     class="addimg flaticon-add133"></span></a>-->
                                            <!--                                         <input id="navication_pic" value="" name="navication_pic" class="imginput"-->
                                            <!--                                                type="text">-->
                                            <!--                                     </div>-->


                                            <script>
                                                $(document).ready(function () {
                                                    //var utn =<?//=$upload_type_nav?>//;
                                                    //// alert(utn);
                                                    //if (utn == 1) {
                                                    //    $("#nav_pic_div").show();
                                                    //    $("#upload_type1_nav").show();
                                                    //    // alert("utn="+utn);
                                                    //    $("#nav_picnet_div").hide();
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
                                            <!--                       end picpic                     -->

                                            <div class="form-group">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">خلاصه *</label>
                                                    <textarea id="abstract" name="abstract" class="form-control"
                                                              rows="3"
                                                              data-fv-notempty="true"
                                                              data-fv-notempty-message="پر کردن اين فيلد الزامي است"/><?= $abstract ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label">معرفی برند *</label>
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
                                                    <input value="<?= $edit_source_product ?>" name="source_product"
                                                           id="source_product" class="form-control">
                                                </div>

                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">لینک معرفی</label>
                                                    <input value="<?= $edit_source_link_product ?>"
                                                           name="source_link_product" id="source_link_product"
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

                            <? $type = 4; ?>
                            <? include 'newcoms/main/new_modual_seo.php4'; ?>
                            <!--                            --><? // include 'newcoms/main/new_modual_slide.php4'; ?>

                            <!--               پایان اطلاعات تماس-->
                            <!--               شروع محصولات-->


                            <fieldset>
                                <div class="modal fade" id="show_product_brand_representation" tabindex="-1">
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
                                                <button type="button" id="btn_ok_product_brand_representation00"
                                                        value=""
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
                            <!--              پایان نمایندگی ها-->


                        </div>

                        <!--                            ++++++++++foooterrrrr++++++-->
                        <div class="panel-footer bttools">
                            <? if ($_SESSION["can_draft"] == 1) { ?>
                                <a id="save_draft32" class="btn btn-primary save-draft2"><span
                                            class="flaticon-browser93"></span><span> پيش نويس</span></a>
                            <? } ?>
                            <? if ($_SESSION["can_add"] == 1) { ?>
                                <a id="qazzaq" class="btn btn-success submit2"><span
                                            class="flaticon-verified9"></span><span>ثبت برند </span></a>
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
        $('#product_brand_fax').click(function () {
            $('#product_brand_fax').mask("(+99) 9999-9999", {placeholder: ""});
        });
        // $('#product_brand_email').click(function () {
        //           $('#product_brand_email').mask("{a-z}@a-z.aaa",{placeholder:""});
        //       });

    </script>

    <? $_SESSION["del_item"] = 'del_product_brand';
    $_SESSION["edit_item"] = 'change_lock_product_brand';
    ?>
    <!--    <script src="/new_plugin/video-js/js/video.js"></script>-->
    <!--    <script>-->
    <!--        videojs.options.flash.swf = "video-js/js/video-js.swf";-->
    <!--    // </script>-->
    <script src="ajax_js/product.js"></script>
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
            $('.conchkNumber_product_brand:checked').each(function () {
                var vval = $(this).val();
                // alert('thisval'+vval);
                chkIdArr = chkId.split(',');
                chkIdArr = chkIdArr.filter(function (val) {
                    return val !== vval;
                });
                chkId = chkIdArr.toString(',');
                chkId += vval + ",";
            });
            $('.conchkNumber_product_brand').not(':checked').each(function () {
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
                data: "action=show_related_product_brand&id=" + $("#related_search").val() + "&value=" + $("#manage_lang").val() + "&checkid=" + chkId,
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
            $('.conchkNumber_product_brand_representation:checked').each(function () {
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
            $('.conchkNumber_product_brand_representation').not(':checked').each(function () {
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
                url: 'New_ajax_product_brand_brand.php',
                data: "action=show_related_product_brand_representation&id_brand=" + $("#related_search_representation").val() + "&value_brand=" + $("#manage_lang").val() + "&checkid_brand=" + chkId_brand,
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
            $("#btn_del_related_product_brand").val($(this).val());

        });

        $(document).on('click', '#dropdelete_representation', function (event) {
            $("#btn_del_related_product_brand_representation").val($(this).val());

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


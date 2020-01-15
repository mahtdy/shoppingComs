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
if (isset($upload_type_nav) || $upload_type_nav == '')
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

#اطلاعات موجودی و قیمت ها
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

//=======end invert email to jpg


    $arr = array("name_url" => $name_url, "upload_type_nav" => $upload_type_nav, "navication_pic" => $navication_pic, "check_link" => $chkbx_link, "upload_type" => $upload_type, 'hashtag_key' => $meta_label1, "seo_title" => $seo_title, "source_link_product" => $source_link_product, "source_product" => $source_product, "name" => $name, "title" => $title, "text" => $text, "meta_keyword" => $meta_keyword, "meta_description" => $meta_desciption, "abstract" => $abstract, "user_id" => $user_id, "la" => $manage_lang, "site" => $manage_site, "status" => $status);
    $id = insert_to_data_base($arr, 'new_product_brand', $coms_conect);
//    print_r($arr);
    $id_com = $coms_conect->insert_id;
//echo 'idc='.$id_com;

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
}
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
                    موجودی و قیمت اطمینان دارید؟
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

<div class="modal fade" id="save_item_mojodi" tabindex="-1" role="dialog" aria-labelledby="save"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">ذخیره</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا میخواهید از
                    این
                    ذخیره اطمینان دارید؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_save_item_mojod" data-dismiss="modal"
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
    <div class="modal fade" id="chart_p" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <!--                    <h4 class="modal-title custom_align" id="Heading">حذف</h4>-->
                    <!--                </div>-->
                    <!--                <div class="modal-body">-->
                    <!--                    <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف-->
                    <!--                        محتوا زير اطمينان داريد؟-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--                <div class="modal-footer ">-->
                    <!--                    <button type="button" id="btn_ok" data-dismiss="modal" class="btn btn-warning"><span-->
                    <!--                                class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي-->
                    <!--                    </button>-->
                    <? include 'test/chart.php'; ?>
                    <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                                class="glyphicon glyphicon-remove"></span>&nbsp;بستن
                    </button>
                </div>
            </div>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
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
                    <!--                    --><? // include 'test/chart.php'; ?>
                    <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                                class="glyphicon glyphicon-remove"></span>&nbsp;خیر
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
                <div class="title"><p class="titr">لیست موجودی و قیمت ها</p>
                    <p class="lead">امکان مدیریت و افزودن و ویرایش کردن موجودی و قیمت ها در این قسمت فراهم شده است.</p>
                </div>
            </div>
            <!-- /section:content/contenttext.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

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
                    <th>تصویر کالا</th>
                    <th>کد کالا</th>
                    <th width="15%">نام محصول</th>

                    <!--                    <th>ایمیل</th>-->
                    <th>گروه و دسته بندی محصول</th>
                    <!--                    <th>نوع موجودی و قیمت </th>-->

                    <th class="center">قیمت مرجع</th>
                    <th class="center">قیمت محصول به ریال</th>
                    <th class="center" width="5%">حداکثر در سبد خرید</th>
                    <th class="center">موجودی در انبار</th>

                    <th>امکانات</th>
                    <th>وضعیت</th>
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
                //                $sql1 = "SELECT
                //  (SELECT a.id as proid,COUNT(a.id) FROM new_product a) as tpro,
                //  (SELECT COUNT(id) FROM new_product_color_size1 WHERE id_type=1 AND proid=id_pro) as tcsc,
                //  (SELECT COUNT(id) FROM new_product_color_size1 WHERE id_type=2 AND proid=id_pro) as tcss";

                //
                //                $sql1 = "SELECT COUNT (idpro) as cnt FROM (( SELECT a.id as idpro FROM new_product a , new_modules_cat e WHERE a.cat_asli=e.id ) g
                //                            JOIN (SELECT c.id_pro as cspro FROM new_product_color_size C JOIN new_product_color O ON FIND_IN_SET (O.id , C.id_color)
                //                            JOIN new_product_size s ON FIND_IN_SET (s.id , C.id_size)) h ON g.idpro=h.cspro WHERE g.idpro=h.cspro)q";

                //                $sql1="select (a.id)as cnt  FROM  new_product as a , new_modules_cat as e WHERE  a.catasli=e.id";


//
//                $sql1 = "SELECT COUNT(cntid) as cnt FROM (select (a.id)as cntid
//                 FROM ( new_product as a , new_modules_cat as e )  JOIN new_product_color_size1 b ON a.id=b.id_pro AND b.id_type=1
//                  JOIN new_product_color_size1 c ON a.id=c.id_pro AND c.id_type=2 WHERE cat_asli=e.id AND a.id=b.id_pro)q";
//
                $sql1="SELECT COUNT(idpro) as cnt FROM ( SELECT a.id as idpro FROM new_product a , new_modules_cat e WHERE a.cat_asli=e.id ) g 
                        JOIN ( SELECT c.id_pro as cspro FROM new_product_color_size C JOIN new_product_color O ON FIND_IN_SET (O.id , C.id_color)   
                        JOIN new_product_size s ON FIND_IN_SET (s.id , C.id_size) ) h ON g.idpro=h.cspro WHERE g.idpro=h.cspro order by g.idpro desc LIMIT 0,2";

                //                $sql1 = "select count(a)as cnt from (SELECT (a.id) as a from new_product a,new_product_color_size1 d WHERE a.id=d.id_pro)q";
                //                                  echo $sql1; exit;
                $result = $coms_conect->query($sql1);
                $RS = $result->fetch_assoc();
                //                echo 'ww='. $RS["cnt"];exit;
                $page = injection_replace($_GET["page"]);
                $a = pgsel((int)$page, $RS["cnt"], 25, 30, "$root/newcoms.php?yep=new_product_mojodi$lang_page$site_page$manager_page$status_page$manager_q$field_page$expire_page$publish_page$cat_page$id_number_page");
//                                echo $RS['cnt'];
//                                print_r($a);
                $from = $a[0];
                $to = $a[1];
                $pgsel = $a[2];
                //                $query = "SELECT a.site,a.id,a.la,a.title,a.status,navication_pic,cat_asli,e.name as name_cat
                //                          FROM new_product a , new_modules_cat e
                //                          WHERE  a.cat_asli=e.id
                //	                      group by a.id order by a.id desc LIMIT $from,$to";
                //echo $query;exit;
                ##################
                //                SELECT COUNT(cnt) FROM(select (a.id)as cnt,a.site,a.id,a.la,a.title,a.status,navication_pic,cat_asli,e.name as name_cat
                // FROM ( new_product as a , new_modules_cat as e ) INNER JOIN new_product_color_size1 b ON a.id=b.id_pro AND b.id_type=1
                // INNER JOIN new_product_color_size1 c ON a.id=c.id_pro AND c.id_type=2 WHERE cat_asli=e.id LIMIT 0,125)q

                //                SELECT * FROM new_product_color_size1 y , new_product_color x WHERE x.id=y.id_meqdar AND y.id_type=1
                //                UNION ALL  SELECT * FROM new_product_color_size1 y , new_product_size z WHERE y.id_meqdar=z.id AND y.id_type=2


                //                SELECT COUNT(cnt) FROM (SELECT y.id as cnt FROM new_product_color_size1 y , new_product_color x, new_product a, new_modules_cat e
                //   WHERE x.id=y.id_meqdar AND y.id_type=1 AND a.id=y.id_pro AND a.cat_asli=e.id)q


                //                select (a.id)as cnt,a.site,a.id,a.la,a.title,a.status,navication_pic,cat_asli,e.name as name_cat, c.onvan_color,d.onvan_size
                //                 FROM  new_product as a , new_modules_cat as e  , new_product_color_size1 b , new_product_color c , new_product_size d
                // WHERE  a.id=b.id_pro AND a.cat_asli=e.id AND b.id_meqdar=c.id AND a.id=4998


                //                 SELECT C.*, O.*, A.* FROM new_product_color_size C
                // JOIN new_product_color O ON FIND_IN_SET (O.id , C.id_color) AND C.id_pro=4998
                // JOIN new_product_size A ON FIND_IN_SET (A.id , C.id_size) AND C.id_pro=4998

//                $query = "SELECT * FROM ( SELECT a.id as idpro,a.site,a.la,a.title,a.status,navication_pic,cat_asli ,e.name as name_cat   FROM new_product a , new_modules_cat e WHERE a.cat_asli=e.id )  g
//                JOIN (SELECT c.id_pro as cspro,o.id as oid, o.onvan_color as oc, o.code_color as cc,s.onvan_size as so, s.code_s as ss  FROM  new_product_color_size C
//                 JOIN new_product_color O ON FIND_IN_SET (O.id , C.id_color)
//                 JOIN new_product_size s ON  FIND_IN_SET (s.id , C.id_size))  h   ON g.idpro=h.cspro WHERE g.idpro=h.cspro   order by g.idpro desc LIMIT $from,$to";

                $query=" SELECT * FROM ( SELECT a.id as idpro,a.site,a.la,a.title,a.status,navication_pic,cat_asli ,e.name as name_cat FROM new_product a , new_modules_cat e WHERE a.cat_asli=e.id ) g
                        JOIN (SELECT s.id as sid,s.onvan_size os,s.code_size as cs,c.id_pro as cspro,o.id as oid, o.onvan_color as oc, o.code_color as cc FROM new_product_color_size C 
                        JOIN new_product_color O ON FIND_IN_SET (O.id , C.id_color) JOIN new_product_size s ON FIND_IN_SET (s.id , C.id_size)) h ON g.idpro=h.cspro WHERE g.idpro=h.cspro order by g.idpro desc LIMIT $from,$to";

                ###############3

//                echo  $query;exit;



                $t = 1+$from;
                $i = 0;
                $j = 0;
                $result = $coms_conect->query($query);
//                print_r($result);exit;
//                $RS1 = $result->fetch_assoc();
//                print_r($RS1);exit;
                while ($RS1 = $result->fetch_assoc()) {
//                    echo 'sas';
                    $id = $RS1["idpro"];
//                    $q_color=get_result_array_fild("id_meqdar","select id_meqdar from  new_product_color_size1 WHERE id_pro=$id AND id_type=1",$coms_conect);
//                    $q_size=get_result_array_fild("id_meqdar","select id_meqdar from  new_product_color_size1 WHERE id_pro=$id AND id_type=2",$coms_conect);
//                    print_r($RS1);exit;
//for ($i=0;$i<count($q_color);$i++){
//for ($j=0;$j<count($q_size);$j++){
//    $onvan_color=0;$onvan_size=0;
//    if ($q_color[$i]>'')
//    $onvan_color=get_result("select onvan_color from  new_product_color WHERE id=$q_color[$i]",$coms_conect);
//else $q_color[$i]=0;
//    if ($q_size[$j]>'')
//        $onvan_size= get_result("select onvan_size from  new_product_size WHERE id=$q_size[$j]",$coms_conect);
//    else $q_size[$j]=0;
//                    print_r($qqq1);
//                    $query_cs="select id_pro,id_color,id_size from  new_product_color_size e WHERE e.id_pro=$id ";
//                    echo 'dd='.$query_cs;
//                    $result_cs = $coms_conect->query($query_cs);
//                    while ($RS1_cs = $result_cs->fetch_assoc()) {}


//$arr_val=$id.','.$RS1['cat_asli'].','.$q_size[$j].','.$q_color[$i].','.'0'.','.'0';
$arr_is=$id.','.$RS1['cat_asli'].','.$RS1['sid'].','.$RS1['oid'];
//print_r($arr_is);

//$arr_val_is=$id.$RS1['cat_asli'].$q_size[$j].$q_color[$i];
//echo  $arr_val_is;
//if ($RS1_moj['id_pro']==$id && $RS1_moj['id_cat']==$RS1['cat_asli'] && $RS1_moj['id_size']==$q_size && $RS1_moj['id_color']==$q_color)
//    $is_save=1;
//$arr_val=ta_latin_num($q_size[$j]);
                    ?>
                    <!--    <input type="text" class="value_save" id="value_save" value="--><? //=$arr_val;?><!--">-->

                    <tr>

                        <!--                        --><? //  echo $arr_val.'<br>'; ?>
                        <!--                        --><? //  echo $arr_val.' '.$i.' t '.$q_color[$i].'  '.$q_size[$j].'<br>'; ?>

                        <td class="center">
                            <label class="position-relative">
                                <!--                                <input type="text" id="value_save" value="1111">-->
                                <input id="<?= $id ?>" type="checkbox" class="conchkNumber"/>
                                <span class="lbl"></span>
                            </label>
                        </td>
                        <td class="center"><?= $t; ?></td>
                        <td class="center"><a href="<?= $RS1["navication_pic"] ?>" class="without-caption"><img
                                        src="<?= $RS1["navication_pic"] ?>" width="45" height="45"
                                        alt="<?= $RS1["navication_pic"] ?>"></a></td>
                        <td class="center"><?= $RS1["idpro"] ?></td>
                        <!--                        <td class="center">--><? //= $RS1["title"] ?><!--</td>-->
                        <!--                        <td class="center">--><? //= $RS1["com_email"] ?><!--</td>-->
                        <? if ($RS1['site'] == 'main') $domain = '/' . $domain_name; else $domain = '/' . $RS1['site'] . '.' . $domain_name; ?>

                        <td><a target="_blank"
                               href="/<?= "$domain/product/{$RS1['la']}/{$RS1['idpro']}/" . insert_dash($RS1['title']) ?>"><?= $RS1["title"] . ' ' . $RS1["oc"] . ' ' . $RS1["cc"]. ' ' . $RS1["os"]. ' ' . $RS1["cs"]; ?></a>
                        </td>
                        <td class="center"><?= $RS1["name_cat"] ?></td>
                        <td> 6</td>

                        <td><input type="text" data-isis="<?= $arr_is ?>" id="price_pro<?= $t ?>" name="price_pro"
                                   value=""><label for="price_pro" id="chart_price"><a data-toggle="modal"
                                                                                       data-target="#chart_p"
                                                                                       data-placement="top"
                                                                                       rel="tooltip">
                                    =
                                </a></label></td>
                        <td class="center"><input type="text" id="max_sabad<?= $t ?>" name="max_sabad" value=""
                                                  style="width: 65%"></td>
                        <td> 9</td>

                        <!--                        --><? // get_result("select user_name from new_managers where id={$RS1["user_id"]}", $coms_conect) ?>
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
                        <!--                        <td>-->
                        <!--                        					<span data-value="-->
                        <!--                        -->
                        <? //= $RS1["status"] ?><!--<!--" class="status_content editable editable-click"-->
                        <!--                                                  data-pk="--><? //= $RS1["id"] ?><!--">-->
                        <!--                                                --><? // if ($RS1["status"] == 1) {
                        //                                                    echo 'منتشر شده';
                        //                                                } else {
                        //                                                    echo 'پيش نويس';
                        //                                                } ?><!--</span>-->
                        <!--                        </td>-->
                        <!--                                                --><? //  } ?>
                        <td style="width: 15%">

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
                                <a data-mahdi_chips="<?= $arr_val; ?>" data-t="<?= $t ?>" id="<?= $id ?>"
                                   target="_blank" class="save_menu  icon">
                                    <i class="fa fa-check-square-o orange save<?= $t ?> " style="font-size:20px"
                                       title="ذخیره"></i>
                                </a>
                            <? } ?>

                            <!--                            <label></label>-->
                            <!--                            <input id="--><? //= $id ?><!--"-->
                            <!--                                   name="switch-field-1" --><? // if ($RS1['mudoal_lock'] == 1) echo 'checked' ?>
                            <!--                                   class="ace ace-switch ace-switch-6 conchkNumber_4" type="checkbox"/>-->
                            <!--                            <span title="فعال سازی" class="lbl"></span>-->
                        </td>
                        <td><label></label>
                            <input id="<?= $RS1['idpro'] ?>"
                                   name="switch-field-1" <? if ($RS1['pro_check'] == 1) echo 'checked' ?>
                                   class="ace ace-switch ace-switch-5 can_comment1" type="checkbox"/>
                            <span title="وضعیت نمایش" class="lbl"></span></td>

                    </tr>
                    <script>
                        $(document).ready(function () {
                            var priceval = $('#price_pro<?=$t?>').val();
                            // alert(priceval);

                            if (priceval == '') {
                                var arr_is = $('#price_pro<?=$t?>').data('isis');
                                // alert(arr_is);
                                $.ajax({
                                    type: 'POST',
                                    url: 'New_ajax_product.php',
                                    data: "action=show_mojodi_product_tabel&id=" + arr_is,
                                    success: function (result) {
                                        // alert(result);
                                        var bb = result.split(",");
                                        $('#price_pro<?=$t?>').val(bb[0]);
                                        $('#max_sabad<?=$t?>').val(bb[1]);
                                        if ((bb[0]) > '') {
                                            $('.save<?=$t?>').removeClass('orange');
                                            $('.save<?=$t?>').addClass('green');
                                        }
                                        // $("#show_waiting_search").hide();
                                        // $("#show_related").html(result);
                                        // $("#related_search").val('');
                                    }
                                });
                            }

                        });
                    </script>

                    <? $t++;
                    $i++;
                    $j++;
                } $t+=$j; ?>
                </tbody>
            </table>
            <?= $pgsel ?>
            <!-- /section:content/contenttext.table -->
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
    <script src="/ajax_js/product_mojodi.js"></script>
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
                name: 'change_status_mojodi',
                url: '/New_ajax_product.php',
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
    <script src="/yep_theme/default/rtl/js/bootstrapvalidator/language/fa_IR.js"></script>
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


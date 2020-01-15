<? $_SESSION["modual_type"] = 4 ?>
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
<!--<script src="/yep_theme/default/rtl/js/zozo.tabs.js"></script>-->
<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">


<!--//-------->
<!--<script type="text/javascript">-->
<!--    $(document).ready(function() {-->
<!--        $('#cat_filter').select2({-->
<!--            data: [-->
<!--                --><? //
//                $query="select id,name from new_modules_cat where type=4";
//                $result = $coms_conect->query($query);
//                $i=0;
//                while($RS1=$result->fetch_assoc()){
//                    $id=$RS1["id"];
//                    $name=$RS1["name"];
//                    if(in_array($id,$_SESSION['manager_page_cat'])){
//                        echo $id.'<br>';
//                        if($i==0)
//                            echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
//                        else
//                            echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
//                        $i++;
//                    }
//
//                }
//                ?>
<!--            ],-->
<!--            allowClear: true,-->
<!--            multiple: true,-->
<!--            formatNoMatches: function(term) {-->
<!--                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--// </script>-->

<!--//------->
<script type="text/javascript">
    $(document).ready(function () {
        $('#cat_filter').select2({
            data: [
                <?
                $query = "select id,name from new_modules_cat where type=4";
                $result = $coms_conect->query($query);
                $i = 0;
                while ($RS1 = $result->fetch_assoc()) {
                    $id = $RS1["id"];
                    $name = $RS1["name"];
                    if (in_array($id, $_SESSION['manager_page_cat'])) {
//					echo $id.'<br>';
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
            multiple: true,
            formatNoMatches: function (term) {
                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
            }
        });
    });
</script>


<!--<script type="text/javascript">-->
<!-- $(document).ready(function() {-->
<!--    $('#meta_label').select2({-->
<!--        data: [-->
<!--				--><? //
//				$query="select id,key_count,name from new_keyword where la='fa'";
//				$result = $coms_conect->query($query);
//				$i=0;
//				while($RS1=$result->fetch_assoc()){
//					$id=$RS1["id"];
//				$name=$RS1["name"].'('.$RS1["key_count"].')';
//							if($i==0)
//						echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
//						else
//						echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
//						$i++;
//				}
//		?>
<!--        ],-->
<!--        allowClear: true,-->
<!--        multiple: true,-->
<!--        formatNoMatches: function(term) {-->
<!--            return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"-->
<!--          }-->
<!--    });-->
<!--});-->
<!-- // </script>-->

<!--<div id="seo_ajax"></div>-->

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
            $('#drop4').toggleClass("desm", boxes.is(":checked"));
        });
    });

    $(document).on('click', '#close_video_modual', function () {
        $("#show_add_video_modual").attr('src', '');
        $("#example_video_1 video")[0].load();
    });


</script>
<? ###چک کردن مدیر
$edit_mode = injection_replace($_POST['edit_mode']);
if ($edit_mode > "") {
    $temp_user = get_result("select user_id from new_product where id= $edit_mode", $coms_conect);
    if (!in_array($temp_user, $_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$edit_id = injection_replace($_GET['edit_id']);
if ($edit_id > "") {
    $temp_user = get_result("select user_id from new_product where id= $edit_id", $coms_conect);
    if (!in_array($temp_user, $_SESSION['manager_user_permisson']))
        header('Location: new_manager_signout.php');
}
$addnew = injection_replace($_GET['addnew']);

$status = injection_replace($_POST['status']);
$title = injection_replace($_POST['title']);
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

$text = ($_POST['text']);
$model = injection_replace($_POST['model']);
$mudoal_lock = injection_replace($_POST['mudoal_lock']);
$is_special = injection_replace($_POST['is_special']);
$spesial_start_date = injection_replace($_POST['spesial_start_date']);
$spesial_finish_date = injection_replace($_POST['spesial_finish_date']);
if (isset($_POST['publish_date'])) {
    $publish_date = injection_replace($_POST['publish_date']);
    $publish_date = (injection_replace($_POST['publish_date']) > "") ? strtotime(jalalitomiladi($publish_date)) : $now;
}
$array_value = injection_replace($_POST['array_value']);
//print_r($array_value);echo '=ww=';
if ($array_value > "") {
//    print_r($array_value);exit;
    $array_valu = explode(",", $array_value);
    $tempp = (array_diff($array_valu, $_SESSION["manager_page_cat"]));
    if (count($tempp) > 0) {
        header('Location: new_manager_signout.php');
        exit();
    }
}
$cat_arr = explode(",", $array_value);


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
//if ($upload_type_nav == '')
//    $upload_type_nav = 1;


# SEO Tab
$meta_label = ($_POST['meta_label']);
//print_r($meta_label);
if ($meta_label > "") {
    get_label_count($meta_label, $coms_conect);
}
$meta_label1 = ($_POST['meta_label1']);
//if($label1>""){
//	get_label_count($label1,$coms_conect);
//}

$source_link_news = injection_replace($_POST['source_link_news']);
$source_news = injection_replace($_POST['source_news']);
$meta_keyword = injection_replace($_POST['meta_keyword']);
$meta_desciption = injection_replace($_POST['meta_desciption']);
$seo_title = injection_replace($_POST['seo_title']);

# Slide Tab
$slide = injection_replace($_POST['slide']);


#file upload field
$product_image = injection_replace($_POST['product_image']);


#slideshow
$slide_img1 = injection_replace($_POST['slide_img1']);
$slide_img2 = injection_replace($_POST['slide_img2']);
$start_date = injection_replace($_POST['start_date']);
$finish_date = injection_replace($_POST['finish_date']);
$slide_title = injection_replace($_POST['slide_title']);
$text1 = injection_replace($_POST['text1']);
$text2 = injection_replace($_POST['text2']);
$text3 = injection_replace($_POST['text3']);


$vazn = injection_replace($_POST['vazn']);
$off_off = injection_replace($_POST['off_off']);
$off_type = injection_replace($_POST['off_type']);
$have_off = injection_replace($_POST['have_off']);
$price = injection_replace($_POST['price']);
$type_pro = injection_replace($_POST['type_pro']);
$vaze_kala = injection_replace($_POST['vaze_kala']);
$title_link = injection_replace($_POST['title_link']);
$vaz_mojod = injection_replace($_POST['vaz_mojod']);
$vaz_mojod_meq = injection_replace($_POST['vaz_mojod_meq']);
$vaz_mojod_vazn = injection_replace($_POST['vaz_mojod_vazn']);
$barcode = injection_replace($_POST['barcode']);
$cat_asli = injection_replace($_POST['cat_asli']);
$brand_pro = injection_replace($_POST['brand_pro']);
$vazn_x = injection_replace($_POST['vazn_x']);
$vazn_y = injection_replace($_POST['vazn_y']);
$vazn_z = injection_replace($_POST['vazn_z']);
$orginal = injection_replace($_POST['orginal']);
$waranti = injection_replace($_POST['waranti']);
if (isset($_POST['rang_color'])||isset($_POST['size_size'])){
$rang_color =implode(',',($_POST['rang_color']));
//print_r($_POST['rang_color']);
//echo $rang_color;
$size_size =implode(',',$_POST['size_size']);
}
#محصولات مرتبط
$totla_related = injection_replace($_POST['totla_related']);
$spesial_date = jdate('Y/m/d');


############################################
if ($edit_mode == "" && $title > "" && $_SESSION["can_add"] == 1 && check_catogory($array_value) == 1) {
    check_token($_REQUEST['user_token'], $_SESSION['session_token'], '/coms');
    $user_id = injection_replace($_SESSION['manager_id']);

    if ($spesial_finish_date == '') $spesial_finish_date = $spesial_date;
    if ($spesial_start_date == '') $spesial_start_date = $spesial_date;
    $arr = array("vazn_x" => $vazn_x,"vazn_y" => $vazn_y,"vazn_z" => $vazn_z,"orginal" => $orginal,"waranti" => $waranti,"brand_pro" => $brand_pro, "cat_asli" => $cat_asli, "barcode" => $barcode, "vaz_mojod" => $vaz_mojod, "vaz_mojod_meq" => $vaz_mojod_meq, "vaz_mojod_vazn" => $vaz_mojod_vazn, "title_link" => $title_link, "vaze_kala" => $vaze_kala, "type_pro" => $type_pro, "price" => $price, "have_off" => $have_off, "off_type" => $off_type, "off_off" => $off_off, "vazn" => $vazn, "navication_pic" => $navication_pic, 'hashtag_key' => $meta_label1, 'model' => $model, "is_special" => $is_special, "title" => $title, "text" => $text, "ip" => $custom_ip, "meta_keyword" => $meta_keyword, "meta_desciption" => $meta_desciption, "seo_title" => $seo_title, "spesial_start_date" => strtotime(jalalitomiladi($spesial_start_date)), "spesial_finish_date" => strtotime(jalalitomiladi($spesial_finish_date)), "mudoal_lock" => $mudoal_lock, "publish_date" => $publish_date, "user_id" => $user_id, "date" => $now, "la" => $manage_lang, "site" => $manage_site, "can_comment" => $can_comment, "slide" => $slide, "status" => $status);
    $id = insert_to_data_base($arr, 'new_product', $coms_conect);
    $id_pro = $coms_conect->insert_id;
    $get_id=0;
    $get_id=get_result("select id from new_product_mazaya where id_pro='0'",$coms_conect);
    if($get_id>''){
    $get_id="UPDATE new_product_mazaya SET id_pro='$id_pro' WHERE id_pro='0'";
    $coms_conect->query($get_id);}
//    echo 'idc='.$id_pro;
//    exit;
    //print_r($arr);exit;
    $arr_imag = array("id" => $id, "type" => 4, "adress" => $product_image, "name" => 'product_image');
    insert_to_data_base($arr_imag, 'new_file_path', $coms_conect);


    ####label
    if (!empty($meta_label)) {
//		$temp=explode(",",$meta_label);
        foreach ($meta_label as $value) {
            if ($meta_label > "") {
                $label_arr = array("id" => $id, "type" => 4, "label_id" => $value);
                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }



    ##### sabt rang & size

		if(!empty($rang_color) || !empty($size_size)){
//		$temp=explode(",",$meta_label);
//		foreach($rang_color as $value){
//			if($label1>""){
				$label_arr1=array("id_pro"=>$id_pro,"id_color"=>$rang_color,"id_size"=>$size_size);
				insert_to_data_base($label_arr1,'new_product_color_size',$coms_conect);
//			}
		}


    #####دسته بندي#######

//    print_r($cat_arr);
    foreach ($cat_arr as $value) {
        if ($value != -1) {
            $arr = array("cat_id" => $value, "page_id" => $id, "type" => 4);
            insert_to_data_base($arr, 'new_modules_catogory', $coms_conect);
        }
    }

    $related = explode(",", $totla_related);
    foreach ($related as $value) {

        $arr = array("id" => $value, "page_id" => $id, "type" => 4);
        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
    }

    ### slide show add

    if ($slide == 1) {
        $slide_link = "/product/$manage_lang/$id/" . insert_dash("$title");
        $arr_slide = array("link" => $slide_link, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $id, "type" => '4', "user_id" => $user_id, "date" => $now, "ip" => $custom_ip);
        insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
    }

    show_msg($new_successfull);
} else if ($edit_mode > "" && $title > "" && $_SESSION["can_edit"] == 1 && check_catogory($array_value) == 1) {
    check_token($_REQUEST['user_token'], $_SESSION['session_token'], '/coms');
    if ($spesial_finish_date == '') $spesial_finish_date = $spesial_date;
    if ($spesial_start_date == '') $spesial_start_date = $spesial_date;
    $edit_user_id = injection_replace($_SESSION['manager_id']);
    $condition = "id=$edit_mode";

    $arr = array("vazn_x" => $vazn_x,"vazn_y" => $vazn_y,"vazn_z" => $vazn_z,"orginal" => $orginal,"waranti" => $waranti,"brand_pro" => $brand_pro, "cat_asli" => $cat_asli, "barcode" => $barcode, "vaz_mojod" => $vaz_mojod, "vaz_mojod_meq" => $vaz_mojod_meq, "vaz_mojod_vazn" => $vaz_mojod_vazn, "title_link" => $title_link, "vaze_kala" => $vaze_kala, "type_pro" => $type_pro, "price" => $price, "have_off" => $have_off, "off_type" => $off_type, "off_off" => $off_off, "vazn" => $vazn, "navication_pic" => $navication_pic, 'hashtag_key' => $meta_label1, 'model' => $model, "is_special" => $is_special, "title" => $title, "text" => $text, "ip" => $custom_ip, "meta_keyword" => $meta_keyword, "meta_desciption" => $meta_desciption, "seo_title" => $seo_title, "spesial_start_date" => strtotime(jalalitomiladi($spesial_start_date)), "spesial_finish_date" => strtotime(jalalitomiladi($spesial_finish_date)), "mudoal_lock" => $mudoal_lock, "publish_date" => $publish_date, "edit_user_id" => $edit_user_id, "edit_date" => $now, "la" => $manage_lang, "site" => $manage_site, "can_comment" => $can_comment, "slide" => $slide, "status" => $status);
    update_data_base($arr, 'new_product', $condition, $coms_conect);
    $id_pro = $edit_id;

    $condition = "id=$edit_mode && name='product_image'";
    $arr_imag = array("id" => $edit_mode, "type" => 4, "adress" => $product_image, "name" => 'product_image');
    update_data_base($arr_imag, 'new_file_path', $condition, $coms_conect);


    ####label
    $condition = "id=$edit_mode and type=4";
    delete_from_data_base('new_mudoal_label', $condition, $coms_conect);

    if (!empty($meta_label)) {
//		$temp=explode(",",$meta_label);
        foreach ($meta_label as $value) {
            if ($meta_label > "") {
                $label_arr = array("id" => $edit_mode, "type" => 4, "label_id" => $value);
//                print_r( $label_arr);

                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }



    #### edite color&size
    if(!empty($rang_color) || !empty($size_size)){
        $condition= " id_pro=$edit_id ";
        $tempcolo=get_result("select id from new_product_color_size WHERE id_pro=$edit_id ",$coms_conect);
//       echo 'ss='.$rang_color.'**'.$tempcolo;
        if ($tempcolo>0) {
            $label_arr1=array("id_color"=>ta_latin_num($rang_color), "id_size"=>ta_latin_num($size_size));
//		foreach($rang_color as $value){
//			if($label1>""){
            update_data_base($label_arr1,'new_product_color_size',$condition,$coms_conect);
    }else{

            $label_arr1 = array("id_pro" => $edit_id, "id_color" => $rang_color, "id_size" => $size_size);
            insert_to_data_base($label_arr1, 'new_product_color_size', $coms_conect);

//		$temp=explode(",",$meta_label);
      }
    }


#####دسته بندي#######
//    print_r($cat_arr);

    $query1 = "delete from new_modules_catogory where page_id='$edit_mode' and type=4";
    $coms_conect->query($query1);
    foreach ($cat_arr as $value) {
        if ($value != -1) {
            $arr = array("cat_id" => $value, "page_id" => $edit_mode, "type" => 4);
            insert_to_data_base($arr, 'new_modules_catogory', $coms_conect);
        }
    }
#####related
    $query1 = "delete from new_related_madual where page_id='$edit_mode' and type=4";
    $coms_conect->query($query1);
    $related = explode(",", $totla_related);
    foreach ($related as $value) {

        $arr = array("id" => $value, "page_id" => $edit_mode, "type" => 4);
        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
    }
    ### slide show update
    if ($slide == 1) {
        $slide_link = "/product/$manage_lang/$edit_mode/" . insert_dash("$title");
        $query1 = "select count(id) as count from new_slideshow where page_id='$edit_mode'  and type=4";
        $result = $coms_conect->query($query1);
        $row = $result->fetch_assoc();
        $count = $row['count'];
        if ($count != 0) {
            $condition = "page_id=$edit_mode";
            $arr_slide = array("link" => $slide_link, "la" => $manage_lang, "site" => $manage_site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 4, "edit_user_id" => $edit_user_id, "edit_date" => $now, "ip" => $custom_ip);
            update_data_base($arr_slide, 'new_slideshow', $condition, $coms_conect);

        } else {
            $arr_slide = array("link" => $slide_link, "la" => $manage_lang, "site" => $manage_site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 4, "user_id" => $edit_user_id, "date" => $now, "ip" => $custom_ip);
            insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);

        }
    } else {
        $query1 = "delete from new_slideshow where page_id='$edit_mode' and type=4";
        $coms_conect->query($query1);
    }
    show_msg($new_successfull);
}
#####ویژگی محصول#######
//$field_id_count = injection_replace($_POST['field_id_count']);
//$cat_id = injection_replace($_POST['cat_id']);
//$la = injection_replace($_POST["la"]);
//
//$exist_id = get_result_array_fild('delicated_id_cat_val', "select delicated_id_cat_val from new_product_delicated_values where product_id='$id_pro' AND delicated_id_cat='$cat_id'", $coms_conect);
//
//for ($i = 1; $i < $field_id_count; $i++) {
//    $cat_id = injection_replace($_POST["cat_id"]);
//    $la = injection_replace($_POST["la"]);
//    $val_id_delicated_cat = injection_replace($_POST["val_id_delicated_cat$i"]);
//    $val_type = injection_replace($_POST["val_type$i"]);
//    $id_val_values = injection_replace($_POST["id_val_values$i"]);
//    $val_id_cat = injection_replace($_POST["val_id_cat$i"]);
////    echo 'id='.$id_val_values;
//    if ($val_type == 0) {
//        $field_val = 0;
//        $field_val_val = (($_POST["filed_title$i"]));
//    } elseif ($val_type == 1) {
////        $option_field_vijen=array();
////        $foreach_id=array();
//        $option_field_vijen = $_POST["option_field_vijen$i"];
//        $option_field = $_POST["option_field$i"];
//        if (isset($option_field_vijen) && (is_array($option_field_vijen)))
//            $field_val = implode(',', (array)$option_field);
//        $foreach_id = (($option_field));
//        $field_val_val = (($_POST["option_field_val$i"]));
////        print_r( $field_val); echo '=';print_r($field_val_val);exit;
//    }
//    $field_id = injection_replace($_POST["field_id$i"]);
//    if ($get_cat_id == 0 && $exist_id == 0 && $edit_id == '') {
//        $arr = array("product_id" => $id_pro, "delicated_id_cat" => $val_id_cat, "delicated_id_cat_val" => $val_id_delicated_cat, "val_id_delicated_cat_val" => $field_val, "value" => $field_val_val, "type" => $val_type);
//        $id = insert_to_data_base($arr, 'new_product_delicated_values', $coms_conect);
//        if ($option_field == 1) {
////            $temp = explode(",", $field_value);
////            foreach ($temp as $val) {
//            $arr = array("cat_id" => $cat_id, "delicated_id" => $id, 'value' => $val, 'status' => 1);
//            insert_to_data_base($arr, 'new_product_delicated_cat_val', $coms_conect);
////            }
//        }
//    }
////print_r($foreach_id);
//    if ($edit_id > '') {
//        $condition = "id=$id_val_values";
////        $haveid=array();
//        foreach ((array)$foreach_id as $haveid) {
//            $have_id = get_result("select id from new_product_delicated_values where product_id='$id_pro' AND delicated_id_cat_val='$val_id_delicated_cat'", $coms_conect);
////        echo $have_id.'=';
//
////        print_r($_POST["option_field$i"]);
//            $arr = array("product_id" => $edit_id, "delicated_id_cat" => $val_id_cat, "delicated_id_cat_val" => $val_id_delicated_cat, "val_id_delicated_cat_val" => $field_val, "value" => $field_val_val, "type" => $val_type);
//            if ($have_id == '') insert_to_data_base($arr, 'new_product_delicated_values', $coms_conect);
//            //        if ($have_id==0)
//            update_data_base($arr, 'new_product_delicated_values', $condition, $coms_conect);
//            $field_id = $exist_id;
//        }
//    }
//}
//
//




$field_id_count = injection_replace($_POST['field_id_count']);
$exist_id = 0;
$exist_id = get_result_array_fild("id","select id from new_product_delicated_values where product_id='$id_pro'", $coms_conect);
//print_r($exist_id);

for ($i = 1; $i < $field_id_count; $i++) {
    $cat_id = injection_replace($_POST["cat_id"]);
    $la = injection_replace($_POST["la"]);
    $val_id_delicated_cat = injection_replace($_POST["val_id_delicated_cat$i"]);
    $val_id_cat = injection_replace($_POST["val_id_cat$i"]);
    $val_type = injection_replace($_POST["val_type$i"]);
    $id_val_values = injection_replace($_POST["id_val_values$i"]);
//    echo 'id='.$id_val_values;
    if ($val_type == 0) {
        $field_val = 0;
        $field_val_val = (($_POST["filed_title$i"]));
    } elseif ($val_type == 1) {
//        $option_field_vijen=array();
//        $foreach_id=array();
//        $option_field_vijen = $_POST["option_field_vijen$i"];
        $field_val='';
        $option_field = $_POST["option_field$i"];
//        print_r($option_field);
        if (isset($_POST["option_field$i"]))
            $field_val = implode(',', $_POST["option_field$i"]);

        $foreach_id = (($option_field));
        $field_val_val = (($_POST["option_field_val$i"]));
//        print_r( $field_val); echo '=';print_r($field_val_val);exit;
    }
//    echo $field_val_val.'<br>';
    $field_id = injection_replace($_POST["field_id$i"]);
    if ($get_cat_id == 0 && $exist_id == 0 && $edit_id == '') {
        $arr = array("product_id" => $id_pro, "delicated_id_cat" => $val_id_cat, "delicated_id_cat_val" => $val_id_delicated_cat, "val_id_delicated_cat_val" => $field_val, "value" => $field_val_val, "type" => $val_type);
        $id = insert_to_data_base($arr, 'new_product_delicated_values', $coms_conect);
        if ($option_field == 1) {
//            $temp = explode(",", $field_value);
//            foreach ($temp as $val) {
            $arr = array("cat_id" => $cat_id, "delicated_id" => $id, 'value' => $val, 'status' => 1);
            insert_to_data_base($arr, 'new_product_delicated_cat_val', $coms_conect);
//            }
        }
    }
////print_r($foreach_id);
//    if ($edit_id > '') {
//
//        $condition = "id=$id_val_values";
////        $haveid=array();
//        if ($val_type==1)
//        foreach ((array)$foreach_id as $haveid) {
//            $have_id = get_result("select id from new_product_delicated_values where product_id='$id_pro' AND delicated_id_cat_val='$val_id_delicated_cat'", $coms_conect);
////        echo $have_id.'=';
//echo $field_val_val.'<br>';
////        print_r($_POST["option_field$i"]);
//            $arr = array("product_id" => $edit_id, "delicated_id_cat" => $val_id_cat, "delicated_id_cat_val" => $val_id_delicated_cat, "val_id_delicated_cat_val" => $field_val, "value" => $field_val_val, "type" => $val_type);
//            print_r($arr).'<br>';
//            if ($have_id == '') insert_to_data_base($arr, 'new_product_delicated_values', $coms_conect);
//            //        if ($have_id==0)
//            update_data_base($arr, 'new_product_delicated_values', $condition, $coms_conect);
//            $field_id = $exist_id;
//        }
//        if ($val_type==0) {
//            $arr = array("product_id" => $edit_id, "delicated_id_cat" => $val_id_cat, "delicated_id_cat_val" => $val_id_delicated_cat, "val_id_delicated_cat_val" => $field_val, "value" => $field_val_val, "type" => $val_type);
//            update_data_base($arr, 'new_product_delicated_values', $condition, $coms_conect);
//            $field_id = $exist_id;
//        }
//
//    }

    if ($edit_id > ''){
        $condition = "id=$id_val_values";
        $arr = array("product_id" => $edit_id, "delicated_id_cat" => $val_id_cat, "delicated_id_cat_val" => $val_id_delicated_cat, "val_id_delicated_cat_val" => $field_val, "value" => $field_val_val, "type" => $val_type);
        if (in_array($id_val_values, $exist_id))
            update_data_base($arr, 'new_product_delicated_values', $condition, $coms_conect);
        else
            insert_to_data_base($arr, 'new_product_delicated_values', $coms_conect);
    }
}

#####پایان ثبت ویژگی محصول#######

###############خلاصه ویژگی###################

$field_vijen_id_count = injection_replace($_POST['field_vijen_id_count']);
$cat_id = injection_replace($_POST['cat_id_vijen']);
$la = injection_replace($_POST["la"]);
$exist_id2 = get_result_array_fild('delicated_id_cat_val', "select delicated_id_cat_val from new_product_vijegi where product_id='$id_pro' AND delicated_id_cat='$cat_id'", $coms_conect);
for ($i = 1; $i < $field_vijen_id_count; $i++) {
    $la = injection_replace($_POST["la"]);
    $val_id_delicated_cat_vijen = injection_replace($_POST["val_id_delicated_cat_vijen$i"]);
    $val_type_vijen = injection_replace($_POST["val_type_vijen$i"]);
    $id_val_values_vijen = injection_replace($_POST["id_val_values_vijen$i"]);
    $chckbox_vijen = injection_replace($_POST["chckbox_vijen$i"]);
    $input_vijen = injection_replace($_POST["input_vijen$i"]);
    if ($val_type_vijen == 0) {
        $field_vijen_val = 0;
        $field_vijen_val_val = (($_POST["filed_title_vijen$i"]));
    } elseif ($val_type_vijen == 1) {
        if (isset($_POST["option_field_vijen$i"]))
            $field_vijen_val = (implode(',', $_POST["option_field_vijen$i"]));
    }
    $field_vijen_id = injection_replace($_POST["field_vijen_id$i"]);
    if ($edit_id == '') {
        $arr = array("text_vijen" => $input_vijen, "chck_vijen" => $chckbox_vijen, "product_id" => $id_pro, "delicated_id_cat" => $cat_id, "delicated_id_cat_val" => $val_id_delicated_cat_vijen, "val_id_delicated_cat_val" => $field_vijen_val, "value" => $field_vijen_val_val, "type" => $val_type_vijen);
        $id = insert_to_data_base($arr, 'new_product_vijegi', $coms_conect);
    }
    if ($edit_id > '') {
        $condition = "id=$id_val_values_vijen";
        $arr = array("text_vijen" => $input_vijen, "chck_vijen" => $chckbox_vijen, "product_id" => $edit_id, "delicated_id_cat" => $cat_id, "delicated_id_cat_val" => $val_id_delicated_cat_vijen, "val_id_delicated_cat_val" => $field_vijen_val, "value" => $field_vijen_val_val, "type" => $val_type_vijen);
        if (in_array($val_id_delicated_cat_vijen, $exist_id2))
            update_data_base($arr, 'new_product_vijegi', $condition, $coms_conect);
        else
            insert_to_data_base($arr, 'new_product_vijegi', $coms_conect);
    }
}

###############خلاصه ویژگی###################
###############بررسی تخصصی###################

$field_barrasi_id_count = injection_replace($_POST['field_barrasi_id_count']);
$exist_id = 0;
for ($i = 1; $i < $field_barrasi_id_count; $i++) {
    $cat_id = injection_replace($_POST["cat_id_barrasi"]);
    $val_id_delicated_cat_barrasi = injection_replace($_POST["val_id_delicated_cat_barrasi$i"]);
    $val_id_cat_barrasi = injection_replace($_POST["id_cat_barrasi$i"]);
    $val_type_barrasi = injection_replace($_POST["val_type_barrasi$i"]);
    $id_val_values_barrasi = injection_replace($_POST["id_val_values_barrasi$i"]);
    $chckbox_barrasi = injection_replace($_POST["chckbox_barrasi$i"]);
    $text_barrasi = ta_latin_num($_POST["text_barrasi$i"]);
    $box1_header_link_barrasi = injection_replace($_POST["box1_header_link_barrasi$i"]);
    $box1_header_link_avatar_orak_barrasi = injection_replace($_POST["box1_header_link_avatar_orak_barrasi$i"][0]);
    if ($box1_header_link_avatar_orak_barrasi > "") {
        $box1_header_link_barrasi = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . trim($box1_header_link_avatar_orak_barrasi);
        $box1_header_link_avatar_orak_barrasi = '';
    }
    $field_barrasi_id = injection_replace($_POST["field_barrasi_id$i"]);
    if ($edit_id == '') {
        $arr = array("pic_barrasi" => $box1_header_link_barrasi, "text_barrasi" => $text_barrasi, "chck_barrasi" => $chckbox_barrasi, "product_id" => $id_pro, "delicated_id_cat" => $val_id_cat_barrasi, "delicated_id_cat_val" => $val_id_delicated_cat_barrasi);
        $id = insert_to_data_base($arr, 'new_product_barrasi', $coms_conect);
    }
    if ($edit_id > '') {
        $condition = "id=$id_val_values_barrasi";
        $have_id = get_result("select id from new_product_barrasi where  delicated_id_cat='$val_id_cat_barrasi' AND product_id='$id_pro' AND delicated_id_cat_val='$val_id_delicated_cat_barrasi'", $coms_conect);
        $arr = array("pic_barrasi" => $box1_header_link_barrasi, "text_barrasi" => $text_barrasi, "chck_barrasi" => $chckbox_barrasi, "product_id" => $edit_id, "delicated_id_cat" => $val_id_cat_barrasi, "delicated_id_cat_val" => $val_id_delicated_cat_barrasi);
        if ($have_id == '') insert_to_data_base($arr, 'new_product_barrasi', $coms_conect);
        update_data_base($arr, 'new_product_barrasi', $condition, $coms_conect);
        $field_barrasi_id = $exist_id;
    }
}

############### پایان بررسی تخصصی###################

########################################################### شروع ثبت  مزایا و معایب START insert update mazaya mayeb   ########################################################

$val_mazaya = injection_replace($_POST['val_mazaya']);
for ($z = 1; $z <= $val_mazaya; $z++) {
    $company_mazaya_onvan = injection_replace($_POST["company_mazaya_onvan{$z}"]);
    $company_mazaya_state = injection_replace($_POST["company_mazaya_state{$z}"]);
    $mazaya_id = injection_replace($_POST["company_mazaya_id{$z}"]);
    if ($company_mazaya_onvan > '' || $company_mazaya_state > '') {
        $mazaya_id_pro = $id_pro;
        if (empty($mazaya_id) && $id_pro>0) {
            $arr_mazaya = array("mazaya" => $company_mazaya_onvan, "mayeb" => $company_mazaya_state, "id_pro" => $mazaya_id_pro);
            insert_to_data_base($arr_mazaya, 'new_product_mazaya', $coms_conect);
        } else {
            $condition = "id=$mazaya_id";
            $arr_mazaya = array("mazaya" => $company_mazaya_onvan, "mayeb" => $company_mazaya_state, "id_pro" => $mazaya_id_pro);
            update_data_base($arr_mazaya, 'new_product_mazaya', $condition, $coms_conect);

        }
    }
}
########################################################### پایان ثبت مزایا و معایب END insert update mazaya mayeb  ####################################################

$del_mazaya="delete from new_product_mazaya WHERE id_pro='0'";
$coms_conect->query($del_mazaya);


create_session_token();
###############نمايش در حالت ويرايش#################
if ($edit_id > "") {
    $query = "SELECT * FROM new_product where id='$edit_id'";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $status = $row['status'];

    $title = $row['title'];
    $text = $row['text'];
    $la = $row['la'];
    $site_id = $row['site'];
    $label = '';
    $query = "select label_id from new_mudoal_label where id='$edit_id' and type=4";
    $result = $coms_conect->query($query);
    $i = 1;
    $str = '';
    while ($RS1 = $result->fetch_assoc()) {
//			if($i!=1)$str=',';
//			$label .=$str.$RS1['label_id'];$i++;
//			$label=explode(',',$label);
        $label[] = $RS1['label_id'];

    }
    //echo $label;//exit;
    $meta_keyword = $row['meta_keyword'];
    $is_special = $row['is_special'];
    $model = $row['model'];
    $meta_desciption = $row['meta_desciption'];
    $seo_title = $row['seo_title'];
    $meta_label1 = explode(',', $row['hashtag_key']);
    $navication_pic = $row['navication_pic'];

    $spesial_start_date = miladitojalaliuser(date('Y-m-d', $row['spesial_start_date']));
    $spesial_finish_date = miladitojalaliuser(date('Y-m-d', $row['spesial_finish_date']));
    $publish_date = miladitojalaliuser(date('Y-m-d', $row['publish_date']));
    $mudoal_lock = $row['mudoal_lock'];

    $can_comment = $row['can_comment'];
    $slide = $row['slide'];

    $title_link = $row['title_link'];
    $type_pro = $row['type_pro'];
    $vaze_kala = $row['vaze_kala'];
    $vaz_mojod = $row['vaz_mojod'];
    $vaz_mojod_meq = $row['vaz_mojod_meq'];
    $vaz_mojod_vazn = $row['vaz_mojod_vazn'];
    $price = $row['price'];
    $have_off = $row['have_off'];
    $off_type = $row['off_type'];
    $off_off = $row['off_off'];
    $vazn = $row['vazn'];
    $barcode = $row['barcode'];
    $cat_asli = $row['cat_asli'];
    $brand_pro = $row['brand_pro'];
    $vazn_x = $row['vazn_x'];
    $vazn_y = $row['vazn_y'];
    $vazn_z = $row['vazn_z'];
    $orginal = $row['orginal'];
    $waranti = $row['waranti'];

    #Query from new_slideshow
    $query = "SELECT * FROM new_slideshow where page_id='$edit_id'  and type=4";
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
    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='product_image'  and type=4";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $product_image = $row['adress'];

    $query = "SELECT adress FROM new_file_path where id='$edit_id' && name='news_attach'  and type=4";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $news_attach = $row['adress'];


    $query = "SELECT b.id FROM new_related_madual a ,new_product b  where page_id='$edit_id' and a.id=b.id  and type=4";
    //echo $query;
    $result = $coms_conect->query($query);
    $totla_related = "";
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($i != 1) $str = ',';
        $i++;
        $totla_related .= $str . $row['id'];
    }


}

##################################
?>
<div class="modal fade" id="del_reated_news" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف
                    دانلود مرتبط اطمینان دارید؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_del_related_news" data-dismiss="modal" class="btn btn-warning"><span
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
                        محصول زير اطمينان داريد؟
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


<form class="form-horizontal" id="news_search" name="news_search" action="" role="form" method="get"
      enctype="multipart/form-data">
    <input type="hidden" value="new_product" name='yep'>
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
                                <label class="col-md-3 control-label" for="edit_name">شماره محصول</label>
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
                                        <option <? if ($field == 2) echo 'selected' ?> value="2">عنوان محصول</option>
                                        <option <? if ($field == 4) echo 'selected' ?> value="4">متن محصول</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">دسته بندي</label>
                                <div class="col-md-4">
                                    <? $cat_filter = injection_replace($_GET['cat_filter']);
                                    //								echo $cat_filter.'wewe';?>
                                    <input type="text" name="cat_filter" value="<?= $cat_filter ?>" id="cat_filter"
                                           rows="5" autocomplete="off" autocorrect="off" autocapitalize="off"
                                           spellcheck="false" class="select2-input select2-default"
                                           style="width: 100%; ">
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
    <div class="modal fade" id="show_contact" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                           محصولات مرتبط
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
                    <button type="button" id="btn_ok_news00" value="" data-dismiss="modal"
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
<!-- alert panel  -->
<div class="errorHandler alert alert-danger" style="display:none;">
    <button data-dismiss="alert" class="close" sourceindex="208">x</button>
    <i class="fa fa-times-sign"></i>
</div>
<!-- /alert panel  -->

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
                    <? if ($_GET['manager_filter'] > "") { ?>    <a href="/newcoms.php?yep=new_product"
                                                                    style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">

                        بازگشت </a><? } ?>
                </ul>
            </div>
        </li>
        <li class="active"><a href="#tab1" data-toggle="tab" style="display:none;" id="uuu"><i
                        class="green ace-icon fa fa-inbox bigger-130"></i>
                ليست محصولات </a></li>
    </ul>

    <div class="msheet tab-content">
        <div class="secfhead">
            <!-- #section:product/product.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-text150" style=""></span>
                </div>
                <div class="title"><p class="titr">لیست محصولات</p>
                    <p class="lead">توضیحات این بخش</p>
                </div>
            </div>
            <!-- /section:product/product.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

                    <li id="newpag" class="addicon reset" <? if ($edit_id>'') echo 'style="display: none"'; ?> >
                        <a href="#add_templates" data-toggle="tab" data-placement="bottom" title="افزودن محصول جدید">
                            <span class="flaticon-add149"></span>
                        </a>
                    </li>

                    <li>
                        <a data-toggle="modal" data-target="#searching" data-placement="top" title="جستجوی پیشرفته">
                            <span class="flaticon-search74"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="tab-pane <? if ($edit_id == "") echo 'active' ?>" id="tab1" style="background-color: #EFF3F8;">
            <!-- #section:product/product.table -->
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
                            <div class="collapse navbar-collapse" id="nav-collapse" style="margin: 0px;padding: 0px;">
                                <ul class="nav navbar-nav navbar-left">
                                    <a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete"
                                       data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"
                                       style="margin-left: 0px;margin-right: -5px;border-radius: 5px;">
                                        حذف
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <? $manager_filter = injection_replace($_GET['manager_filter']);
                        $q = injection_replace($_GET['q']);
                        $site_filter = injection_replace($_GET['site_filter']);
                        $lang_filter = injection_replace($_GET['lang_filter']); ?>
                        <div class="form-group yepco">
                            <form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
                                <input type="hidden" name="yep" value="new_product">
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
                    <th>عکس محصول</th>
                    <th>شماره محصول</th>

                    <th width="15%">عنوان</th>

                    <th>ارسال کننده</th>
                    <th>سایت</th>
                    <th>بازديد</th>

                    <th>تاريخ انتشار</th>
                    <th>وضعيت</th>
                    <th>وضعيت موجودی</th>
                    <th>امکانات</th>
                </tr>
                </thead>
                <tbody><?
                if ($lang_filter > "" && !in_array($lang_filter, $_SESSION["manager_title_lang"])) {
                    header('Location: new_manager_signout.php');
                }

                if (($site > "" && !in_array($site, $_SESSION["manager_title_site"])) || ($site_filter > "" && !in_array($site_filter, $_SESSION["manager_title_site"]))) {
                    header('Location: new_manager_signout.php');
                    exit;
                }

                if ($manager_filter > "" && !in_array($manager_filter, $_SESSION["manager_user_permisson"]))
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
                if ($site_filter > "") {
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

                            $str_field = " and ( a.title like '%$search_txt%' or a.text like '%$search_txt%')";
                            break;

                        case 2:
                            $str_field = " and a.title like '%$search_txt%'";
                            break;

                        case 4:
                            $str_field = " and a.text like '%$search_txt%'";
                            break;

                    }
                    $str_lang = " and a.la='$lang_filter'";
                    $lang_page = "&lang_filter=$lang_filter";
                }

                if ($q > "") {
                    $str_q = "  and(a.title like '%$q%')";
                    $manager_q = "&q=$q";
                }
                if ($lang_filter > "") {
                    $str_lang = " and a.la='$lang_filter'";
                    $lang_page = "&lang_filter=$lang_filter";
                }
//                if ($manager_filter > "") {
//                    $str_manager = " and  a.user_id='$manager_filter'";
//                    $manager_page = "&manager_filter=$manager_filter";
//                } else
//                    $str_manager = " and  a.user_id=$manager_id";
//                                            $str_manager=" and  a.user_id in ($manager_user_permisson)";
                $cat_filter = injection_replace($_GET['cat_filter']);
                if ($cat_filter > "") {
                    $str_cat = " and c.cat_id in($cat_filter)";
                    $cat_page = "&cat_filter=$cat_filter";
                } else
                    $str_cat = " and c.cat_id in({$_SESSION['manager_page_cat_str']})";
                // $str_cat
                $sql1 = "select count(a)as cnt from (SELECT count(a.id) as a from new_managers b ,new_product a ,new_modules_catogory c where 
								 b.id = a.user_id and c.type=4 and a.id=c.page_id 
								  $str_q $str_manager $str_status $str_id_number $str_field $str_expire
								  
								group by page_id)q";
//                 echo $sql1;exit;
                $result = $coms_conect->query($sql1);
                $RS = $result->fetch_assoc();

                $page = injection_replace($_GET["page"]);
                $a = pgsel((int)$page, $RS["cnt"], 10, 10, "$root/newcoms.php?yep=new_product$lang_page$site_page$manager_page$status_page$manager_q$field_page$expire_page$publish_page$cat_page$id_number_page");
                $from = $a[0];
                $to = $a[1];
                $pgsel = $a[2];
                $query = "SELECT a.vaz_mojod,a.navication_pic,a.user_id,a.mudoal_lock,a.site,a.id,a.la,a.title ,a.view,a.publish_date,a.status FROM new_managers b ,new_product a ,new_modules_catogory c where
							b.id = a.user_id and c.type=4 and a.id=c.page_id 
							$str_lang $str_site $str_q $str_manager $str_status $str_cat $str_id_number $str_field $str_expire
							 group by a.id order by a.id desc LIMIT $from,$to";
                // echo $query;
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
                        <td class="center"><a href="<?= $RS1["navication_pic"] ?>" class="without-caption"><img
                                        src="<?= $RS1["navication_pic"] ?>" width="45" height="45"
                                        alt="<?= $RS1["navication_pic"] ?>"></a></td>
                        <td class="center"><?= $RS1["id"] ?></td>

                        <? if ($RS1['site'] == 'main') $domain = '/' . $domain_name; else $domain = '/' . $RS1['site'] . '.' . $domain_name; ?>
                        <td><a target="_blank"
                               href="/<?= "$domain/product/{$RS1['la']}/{$RS1['id']}/" . insert_dash($RS1['title']) ?>"><?= $RS1["title"] ?></a>
                        </td>

                        <td><?= get_result("select user_name from new_managers where id={$RS1["user_id"]}", $coms_conect) ?></td>
                        <td><a href="/<?= $domain ?>" target="_blank"><?= $RS1['site'] ?></a></td>
                        <td><?= $RS1["view"] ?></td>

                        <td><?= miladitojalaliuser(date('Y-m-d', $RS1["publish_date"])) ?></td>
                        <td>
					<span data-value="<?= $RS1["status"] ?>" class="status_news editable editable-click"
                          data-pk="<?= $RS1["id"] ?>">
					<? if ($RS1["status"] == 1) {
                        echo 'منتشر شده';
                    } else {
                        echo 'پيش نويس';
                    } ?></span>
                        </td>
                        <td>
					<span data-value="<?= $RS1["vaz_mojod"] ?>" class="status_product editable editable-click"
                          data-pk="<?= $RS1["id"] ?>">
					<? if ($RS1["vaz_mojod"] == 1) {
                        echo 'موجود';
                    } elseif ($RS1["vaz_mojod"] == 2) {
                        echo 'تماس بگیرید';
                    } elseif ($RS1["vaz_mojod"] == 3) {
                        echo 'به زودی';
                    } elseif ($RS1["vaz_mojod"] == 4) {
                        echo 'ناموجود';
                    } elseif ($RS1["vaz_mojod"] == 5) {
                        echo 'اتمام تولید';
                    } elseif ($RS1["vaz_mojod"] == 6) {
                        echo 'به من خبر بده';
                    } ?></span>
                        </td>
                        <td>
                            <? if ($_SESSION["can_edit"] == 1) {
                                ?>
                                <a id="<?= $id ?>" class="edit_menu blue icon hide_plus"
                                   href="newcoms.php?yep=new_product&edit_id=<?= $id ?>">
                                    <i class="ace-icon fa fa-edit bigger-120" title="ويرايش"></i>
                                </a>
                            <? }
                            if ($_SESSION["can_delete"] == 1) {
                                ?>
                                <a href="#" id="<?= $id ?>" class="red del_menu icon" data-title="delete"
                                   data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                    <i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
                                </a>
                                <a href="/<?= "$domain/product/{$RS1['la']}/{$RS1['id']}/" . insert_dash($RS1['title']) ?>"
                                   target="_blank" class="del_menu blue icon">
                                    <i class="ace-icon fa fa-vimeo-square bigger-120" title="نمایش"></i>
                                </a>
                            <? }
                            if (get_result("select count(id) from new_madules_comment where type=4 and status=0 and madul_id={$RS1['id']}", $coms_conect)) {
                                ?>

                                <a href="/newcoms.php?yep=new_product_comment&id=<?= $RS1['id'] ?>" target="_blank"
                                   id="<?= $id ?>" class="green new_scomments icon">
                                    <?= mudoal_comment_count($RS1['id'], 4, $coms_conect) ?><i
                                            class="ace-icon fa fa-comments bigger-120" title="نظرات"></i>
                                </a>

                            <? }
                            $attach = get_result("SELECT adress FROM  new_file_path  WHERE type=4 and name='news_attach' and id={$RS1['id']}", $coms_conect);
                            if ($attach > "") {
                                ?>
                                <a href="<?= $attach ?>" id="<?= $id ?>" class="red new_files icon">
                                    <i class="ace-icon fa fa-file  bigger-120" title="فایل پیوست"></i>
                                </a>
                            <? } ?>
                            <label></label>
                            <input id="<?= $id ?>"
                                   name="switch-field-1" <? if ($RS1['mudoal_lock'] == 1) echo 'checked' ?>
                                   class="ace ace-switch ace-switch-6 conchkNumber_4" type="checkbox"/>
                            <span title="فعال سازی" class="lbl"></span>
                        </td>
                    </tr>
                <? } ?>
                </tbody>
            </table>
            <!-- /section:product/product.table -->
            <?= $pgsel ?>
        </div>


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
            $('.addicon').click(function () {
                $(this).hide();
            });


        </script>
        <!--===========================End popup img mahsolat=============================-->

        <div class="tab-pane <? if ($edit_id != "" || $add_new == 1) echo 'active'; ?>" id="add_templates">

            <form id="newstext" name="newstext" action="" role="form" method="post" enctype="multipart/form-data"
                  data-fv-framework="bootstrap"
                  data-fv-message="This value is not valid"
                  data-fv-icon-validating="glyphicon glyphicon-refresh">
                <div id="id-message-new-navbar" class="message-navbar clearfix">
                    <input type="hidden" name="array_value" id="array_value">
                    <input name='user_token' value='<?= $_SESSION['session_token'] ?>' type="hidden">
                    <input type="hidden" name="edit_mode" id="edit_mode" value="<?= $edit_id ?>">
                    <input type="hidden" name="status" id="status" value="<?= $status ?>">
                    <input type="hidden" id="check_value" name="check_value" value="0">
                    <a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title=""
                       class="save submit2" data-original-title="انتشار">
					<span class="flaticon-verified9">
					</span>
                    </a>
                    <input type='submit' id='submit_btn' style='display:none'>
                    <a href="#" class="save-draft2" data-toggle="tooltip" data-placement="bottom" title=""
                       data-original-title="پیش نویس">
					<span class="flaticon-browser93">
					</span>
                    </a>
                    <a href="newcoms.php?yep=new_product" data-toggle="tooltip" data-placement="bottom" title=""
                       class="cencel" data-original-title="بازگشت">
					<span class="flaticon-left-arrow9">
					</span>
                    </a>
                </div>
                <br>
                <fieldset style="margin-top: -15px;">
                    <div class="tabbable tabs-left">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a data-toggle="tab" href="#home">
                                    <p class="flaticon-file23">محصول</p>

                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#cat3">
                                    <p class="flaticon-squares36"></p>
                                    دسته بندي
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#property_product">
                                    <p class="flaticon-copy23"></p>
                                    ویژگی محصول
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#vijen">
                                    <p class="flaticon-squares36"></p>
                                    خلاصه ویژگی محصول
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#barrasi">
                                    <p class="flaticon-copy23"></p>
                                    بررسی تخصصی محصول
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#mazaya_mayeb">
                                    <p class="flaticon-copy23"></p>
                                    مزایا و معایب
                                </a>
                            </li>


                            <li>
                                <a data-toggle="tab" href="#price_vazn">
                                    <p class="flaticon-copy23"></p>
                                    قیمت و وزن
                                </a>
                            </li>
                            <li>
                                <a id="tab_color_size" data-toggle="tab" href="#color_size" <? if ($type_pro==2) echo 'style="display: block;"'; else  echo 'style="display: none;";'?>>
                                    <p class="flaticon-copy23"></p>
                                    رنگ و سایز
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
                                    اسلايد
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#gallery">
                                    <p class="flaticon-folder23"></p>
                                    گالری تصاویر
                                </a>
                            </li>
                            <li>
                                <a id="video_li" data-toggle="tab" href="#blog_video_div">
                                    <p class="flaticon-upload36"></p>
                                    ویدئو
                                </a>
                            </li>
<!--                            <li>-->
<!--                                <a data-toggle="tab" href="#relatednews">-->
<!--                                    <p class="flaticon-copy23"></p>-->
<!--                                    محصولات مرتبط-->
<!--                                </a>-->
<!--                            </li>-->

                        </ul>
                        <div class="tab-content" style="min-height: 640px;">

                            <div class="tab-pane active" id="home">
                                <div class="page-content-area">
                                    <div class="page-body" style="margin-top: 25px;">
                                        <!-- #section:product/product.prod -->
                                        <div class="col-md-8">

                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">نوع محصول *</label>
                                                </div>
                                            </div>
                                            <div id="radio_check">
                                                <div class="form-group col-sm-6">
                                                    <input type="radio" value="1" name="type_pro"
                                                           id="type_pro_n" <? if ($type_pro == 1 or $type_pro == '') echo 'checked' ?>
                                                           class="radio_chck"><label for="type_pro_n"> ساده</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <input type="radio" value="2" name="type_pro"
                                                           id="type_pro_t" <? if ($type_pro == 2) echo 'checked' ?>

                                                           class="radio_chck"/><label for="type_pro_t">ترکیب دار</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <input type="radio" value="3" name="type_pro"
                                                           id="type_pro_s"<? if ($type_pro == 3) echo 'checked' ?>
                                                           disabled
                                                           class="radio_chck"/><label for="type_pro_s">مجازی</label>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <input type="radio" value="4" name="type_pro"
                                                           id="type_pro_b"<? if ($type_pro == 4) echo 'checked' ?>
                                                           disabled
                                                           class="radio_chck"/><label for="type_pro_b">بسته بندی</label>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">وضعیت کالا</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <input type="radio" value="1" name="vaze_kala"
                                                       id="vaze_kala_n" <? if ($vaze_kala == 1 or $vaze_kala == '') echo 'checked' ?>
                                                       class=""/><label for="vaze_kala_n">کالا برای فروش</label>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <input type="radio" value="2" name="vaze_kala"
                                                       id="vaze_kala_t" <? if ($vaze_kala == 2) echo 'checked' ?>
                                                       class=""/><label for="vaze_kala_t">معرفی محصول (غیرقابل فروش)</label>
                                            </div>
                                            <!--                                                    <div class="form-group col-sm-6">-->
                                            <!--													<input type="radio" value="3" name="vaze_kala_n" id="type_pro_s"-->
                                            <? // if ($vaze_kala_n==3) echo 'checked' ?><!--  disabled class=""/>مجازی-->
                                            <!--                                                    </div>-->
                                            <!--                                                    <div class="form-group col-sm-6">-->
                                            <!--													<input type="radio" value="4" name="vaze_kala_n" id="type_pro_b"-->
                                            <? // if ($vaze_kala_n==4) echo 'checked' ?><!-- disabled class=""/>بسته بندی-->
                                            <!--                                                    </div>-->


                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">عنوان محصول *</label>
                                                    <input type="text" value="<?= $title ?>" name="title" id="title"
                                                           class="form-control"
                                                           data-fv-notempty="true"
                                                           data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">عنوان در لینک *</label>
                                                    <input type="text" value="<?= $title_link ?>" name="title_link"
                                                           id="title_link" class="form-control"
                                                           data-fv-notempty="true"
                                                           data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
                                                </div>
                                            </div>
                                            <!--                                              </div>-->

                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">بارکد</label>
                                                    <input type="text" value="<?= $barcode ?>" name="barcode"
                                                           id="barcode"
                                                           class="form-control"/>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">نشان کالای غیر اصل</label>
                                                    <input value="1"
                                                           type="checkbox" <? if ($orginal == 1) echo 'checked' ?>
                                                           class="ace ace-switch ace-switch-6 "
                                                           name="orginal"
                                                           style="direction: rtl;"><span class="lbl"></span>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">گارانتی اصالت و سلامت فیزیکی</label>
                                                    <input value="1"
                                                           type="checkbox" <? if ($waranti == 1) echo 'checked' ?>
                                                           class="ace ace-switch ace-switch-6 "
                                                           name="waranti"
                                                           style="direction: rtl;"><span class="lbl"></span>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="form-group col-sm-6">
                                                    <label class="control-label">برند مرتبط</label>
                                                    <select id="brand_pro"
                                                            data-selectid=""
                                                            class="form-control "
                                                            name="brand_pro">
                                                        <? $sql_under_slideshow = "SELECT name,id from new_product_brand ";
                                                        $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                        echo "<option value='0'>انتخاب کنید</option>";
                                                        while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                            $str = '';

                                                            if ($row0['id'] == $brand_pro)
                                                                $str = 'selected';
                                                            echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <script>
                                                $('#brand_pro').select2();
                                            </script>

                                            <h4>تصوير محصول</h4>

                                            <!--                                            --><? // if($upload_type_nav=="") $upload_type_nav=1;?>


                                            <!--                            picpic                -->

                                            <div class="form-group" id="nav_pic_div" style='display:block'>

                                                <div class="form-group" id="oracup">
                                                    <label class="control-label col-md-12">
                                                        <input type="radio"
                                                               name="upload_type_nav" <? if ($upload_type_nav == 1 or $upload_type_nav == '')
                                                            echo 'checked'; ?> id="upload_type_nav" value="1">
                                                        الصاق از فایل کامپیوتر
                                                    </label>
                                                    <div class="ui-sortable red_nav box_nav" id="upload_type1_nav"
                                                         style="float:right; <? if ($upload_type_nav == 1 or $upload_type_nav == "") echo 'display:block'; else echo 'display:none' ?>">
                                                        <div id="product_image_avatar_nav" orakuploader="on"></div>
                                                        <? if ($edit_id > "" && ($upload_type_nav == 1 or $upload_type_nav == '')) {
                                                            $query_nav = "select navication_pic from new_product where id='$edit_id' ";
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


                                            <div class="form-group box_nav green_nav" id="upload_type1_nav"
                                                 style="<? if ($upload_type_nav == 2) echo 'display:block'; else echo 'display:none' ?>">
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

                                            <script>

                                                $(document).ready(function () {

                                                    $('.radio_chck').on('click',function () {
                                                        var chckval=$(this).val();
                                                        if (chckval==2){
                                                            $('#tab_color_size').attr('style', 'display:block');
                                                        }else{
                                                            $('#tab_color_size').attr('style', 'display:none');
                                                        }
                                                    });




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
                                                    <label class="control-label">شرح محصول</label>
                                                    <textarea id="text" name="text" class="form-control"
                                                              rows="3"><?= $text ?></textarea>
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
                                                            image_advtab: true,
                                                            external_filemanager_path: "/filemanager/",
                                                            filemanager_title: "مديريت فايل",
                                                            external_plugins: {"filemanager": "/filemanager/plugin.min.js"},
                                                        });
                                                    </script>
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

                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="family">نوع انتشار</label>
                                                <div class="form-group col-md-8">
                                                    <select name="mudoal_lock" id="mudoal_lock" class="form-control"
                                                            rows="3">
                                                        <option value="0" <? if ($mudoal_lock == 0) echo 'selected' ?>>
                                                            عادي
                                                        </option>
                                                        <option value="1" <? if ($mudoal_lock == 1) echo 'selected' ?>>
                                                            ويژه اعضا
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="family">مدل محصول</label>
                                                <div class="form-group col-md-8">
                                                    <select name="is_special" id="is_special" class="form-control"
                                                            rows="3">
                                                        <option value="0" <? if ($is_special == 0) echo 'selected' ?>>
                                                            محصولات عادي
                                                        </option>
                                                        <option value="1" <? if ($is_special == 1) echo 'selected' ?>>
                                                            محصولات ويژه
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group" id="add_temp0">
                                                <div class="col-md-12 startend">
                                                    <label class="control-label" for="family">مدت نمايش محصول (پايان-
                                                        شروع )</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input-daterange input-group">
                                                        <input type="text" value="<?= $spesial_start_date ?>"
                                                               class="input-sm form-control" name="spesial_start_date"
                                                               id="spesial_start_date" palceholder="از"/>
                                                        <span class="input-group-addon">
														<i class="fa fa-exchange"></i>
														</span>
                                                        <input type="text" class="input-sm form-control"
                                                               value="<?= $spesial_finish_date ?>"
                                                               name="spesial_finish_date" id="spesial_finish_date"
                                                               palceholder="تا"/>
                                                    </div>
                                                </div>
                                            </div>
                                             
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
                                                            $title = $RS1['title'];
                                                            $name = $RS1['name'];
                                                            $str = "";
                                                            if ($manage_lang == $title || $change_lang == $title)
                                                                $str = "selected";
                                                            echo "<option value='$title' $str>$name</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" for="family"
                                                       style="padding-left: 0px;">فايل پيوست محصول</label>
                                                <div class="form-group col-md-8">
                                                    <input type="text" value="<?= $news_attach ?>" name="news_attach"
                                                           id="news_attach" style="width: 68%;">
                                                    <a href="/filemanager/dialog.php?type=2&amp;field_id=news_attach"
                                                       class="holam btn btn-success iframe-btn"><span
                                                                class="holam flaticon-add139"></span></a>
                                                </div>
                                            </div>
                                            <div class="form-group" style="text-align: -webkit-center;">

                                                <label class="control-label" for="family">امکان نظردهي وجود داشته
                                                    باشد</label>

                                                <div class="form-group col-md-12">
                                                    <label class="radio-inline" for="pay_type">
                                                        <input type="radio" name="can_comment" id="can_comment"
                                                               value="1" <? if ($can_comment == 1) echo 'checked'; ?>>
                                                        بله
                                                    </label>
                                                    <label class="radio-inline" for="radios-1">
                                                        <input type="radio" name="can_comment" id="radios-1"
                                                               value="0" <? if ($can_comment == 0) echo 'checked'; ?>>
                                                        خير
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4" style="padding-left: 0px;">تاريخ
                                                    انتشار</label>
                                                <div class="form-group input-daterange col-md-8">
                                                    <input id="publish_date"
                                                           value="<? if ($publish_date == "") echo miladitojalaliuser(date('Y-m-d')); else echo $publish_date ?>"
                                                           name="publish_date" type="text"
                                                           class="input-sm form-control"/>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /section:product/product.prod -->
                                    </div>
                                </div>
                            </div>


                            <? $type = 4;
                            include 'newcoms/main/new_modual_seo.php4'; ?>

                            <?
                            include 'newcoms/main/new_modual_slide.php4'; ?>
                            <? $type = 4;
                            include 'newcoms/main/new_modual_catogory.php4';
                            $type = 4;
                            include 'new_product_mini_vijen.php4';
                            include 'new_product_barrasi.php4';
                            $type = 4;
//                            include 'new_product_color_size.php4';
                            ?>


                            <!--------------------------------------- گالری تصاویر =========gallery pics-->


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
                                <div class="page-content-area" id="gallery5">
                                    <div class="page-body" style="margin-top: 25px;">
                                        <fieldset>
                                            <!-- #section:news/newstext.gallery -->
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
                                                        <input type="text" value="" id="news_gallery">
                                                        <a href="/filemanager/dialog.php?type=1&amp;field_id=news_gallery"
                                                           class="holam btn btn-primary iframe-btn" title="انتخاب"><span
                                                                    class="holam flaticon-search85"></span></a>
                                                        <a class="btn btn-success holam" href="#"
                                                           id="add-image-to-gallery" title="افزودن"><span
                                                                    class="holam flaticon-round68"></span></a>
                                                        <img id="show_waiting" src="waiting.gif" style="display:none">

                                                        <select hidden id="imagelist" name="imagelist[]"
                                                                multiple="multiple">
                                                            <? if ($album_type == 2) {
                                                                $query = "SELECT * FROM new_file_path where id='$edit_id' && name='product_gallery'";

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
                                                            var aks = $("#news_gallery").val();
                                                            var index = aks.lastIndexOf("/") + 1;
                                                            var filename = aks.substr(index);
                                                            if (aks != "") {
                                                                $("#show_waiting").show();
                                                                $("#add-image-to-gallery").attr("disabled", false);
                                                                var html_string = '<li><div><img width="105" height="105" alt="105x105" src="' + aks + '"/><div class="text"><div class="inner"><span>' + filename + '</span><div class="tools"><a href="' + aks + '" data-rel="colorbox"><i class="ace-icon fa fa-search-plus"></i></a><a data-id="' + aks + '" id="delete_image" href="#"><i class="ace-icon fa fa-times red"></i></a></div></div></div></div></li>';
                                                                $("#gallery-img").append(html_string);
                                                                $("#imagelist").append('<option value="' + aks + '" selected="selected">' + aks + '</option>')
                                                                $("#news_gallery").val("");//empty textbox
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
                                                                    data: "action=delete_ajax_newspic&id=" + $(this).attr('data-id') + "&value=" + $(this).attr('data-addres'),
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
                                                    <div id="news_image_album" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $album_type == 1) {
                                                        $query = "select adress from new_file_path where id='$edit_id' and type=1 and name='news_gallery'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';
                                                        $pic_str = '';
                                                        while ($RS1 = $result->fetch_assoc()) {
                                                            $news_image_album = $RS1['adress'];
                                                            $temp = explode("/files/", $RS1['adress']);
                                                            $news_image_album = $temp[1];
                                                            $div_id = explode(".", $news_image_album);
                                                            $pic_str .= "<div class='multibox file' style='cursor: move;' id='$news_image_album' filename='$news_image_album'>";
                                                            $pic_str .= "<div class='picture_delete'  ></div>";
                                                            $pic_str .= "<img src='/new_gallery/files/tn/$news_image_album' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                            $pic_str .= "<input type='hidden' value='$news_image_album' name='news_image_album[]' />";
                                                            $pic_str .= "</div>";
                                                        }
                                                    } ?>
                                                </div>
                                            </div>


                                            <!-- /section:news/newstext.gallery -->
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $('#news_image_album').orakuploader({
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

                                    $('#news_image_album').html("<?=$pic_str?>");
                                });
                            </script>

                            <!--                    //----------------------------------------------end gallery pis------------------------------------------------------                -->
                            <!--                    //----------------------------------------------start video ------------------------------------------------------                -->

                            <div id="blog_video_div" class="tab-pane">
                                <div class="page-body" style="margin-top:25px">
                                    <!-- #section:video/video.vid -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="singlebutton"
                                                   style="width: 120px;text-align: right;">فایل ویدئو (MP4)</label>
                                            <div class="form-group input-group">
                                                <div class="form-group"><input id="video_video"
                                                                               value="<?= $video_video ?>"
                                                                               name="video_videos" class="imginput"
                                                                               type="text"/>
                                                    <a href="/filemanager/dialog.php?type=3&amp;field_id=video_video"
                                                       class="holam btn btn-primary iframe-btn"><span
                                                                class="holam flaticon-search85"></span></a>
                                                    <a href="#" id="add_videos" class="holam btn btn-success  "
                                                       title="افزودن"><span class="holam flaticon-round68"></span></a>
                                                    <a href="#" id="del_videos" class="holam btn btn-danger  "
                                                       title="حذف"><span class="holam flaticon-delete84"></span></a>
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
                                            <strong><span class="flaticon-information51" style="color: #124C69;"></span><span
                                                        style="    vertical-align: super;margin-right: 5px;font-size: 12pt;color: #124C69;">راهنما</span></strong>
                                            <p> متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن
                                                راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما متن راهنما
                                                متن راهنما متن راهنما متن راهنما متن راهنما</p>
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
                                                url: 'New_ajax.php',
                                                data: "action=show_videos&id=" + $("#video_video").val() + "&secend_value=<?=$edit_id?>",
                                                success: function (result) {
                                                    $("#show_waiting_video").hide();
                                                    $("#show_video").html(result);
                                                }
                                            });
                                        }

                                    </script>


                                <? } ?>
                                <script>
                                    /////////////// radio show hide upload image
                                    $('input[type="radio"]').click(function () {
                                        if ($(this).attr("value") == "1") {
                                            $(".box").not(".red").hide();
                                            $(".red").show();
                                        }
                                        if ($(this).attr("value") == "2") {
                                            $(".box").not(".green").hide();
                                            $(".green").show();
                                        }
                                    });
                                </script>

                                </br>
                                </br>
                                </br>
                                </br>
                            </div>
                            <!--                    //----------------------------------------------end video ------------------------------------------------------                -->
                            <!--                    //----------------------------------------------start property product-------------------------------------------------------                -->

                            <div class="tab-pane fade" id="property_product">
                                <?
                                //                        $id_val=null;
                                if ($edit_id > '') {
                                    $query_edit = "select delicated_id_cat,id from new_product_delicated_values where   product_id='$edit_id'";
                                    $result_edit = $coms_conect->query($query_edit);
                                    $RS_edit = $result_edit->fetch_assoc();
                                    $id_val = $RS_edit['delicated_id_cat'];
//                            echo 'idval='.$id_val;
                                }
                                $query = "select name,id from new_modules_cat where type='4' and status=1 and la='$la'";
                                $result = $coms_conect->query($query);
                                $j = 0;
                                echo "<div class='col-md-3 form-group'><select name='cat_id' id='cat_id'  data-id='" . $RS['id'] . "' class='form-control' disabled><option  >دسته بندی اصلی انتخاب نشده است</option>";
                                while ($RS = $result->fetch_assoc()) {
                                    $str = '';
                                    if ($filter_cat_id == $RS['id'])
                                        $str = 'selected';
                                    if ($j == 0) $first_catid = $RS['id'];
                                    ?>
                                    <option $str value='<?= $RS['id'] ?>' <?
                                    if ($RS['id'] == $id_val) echo 'selected'; ?> ><?= $RS['name'] ?></option>"<?
                                    $j++;
                                }
                                echo "</select></div>";
                                ?>
                                <div class="col-md-12 form-group" id="result_property"></div>

                                <?
//                                echo 'hh'.$id_val;
                                if ($edit_id > '' ) { ?>
                                    <script>
                                        //var catasl;catasl =<?//=$id_val?>//;
                                        // if( catasl=='')
                                        var catasl = $('#cat_asli').val();
                                        // alert(catasl);

                                        if(catasl!=0) {

                                            // alert('a1='+a);
                                            var edit_id =<?=$edit_id?>;

                                            // var catasl = $('#cat_asli').val();
                                            // alert('asl=' + catasl+'=='+a+'=='+edit_id);
                                            // a=catasl;
                                            $('#cat_id').val(catasl);
                                            // alert('a='+a);
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax_product.php',
                                                data: "action=product_property_cat&id=" + catasl + "&edit_id=" + edit_id,
                                                success: function (result) {
                                                    $("#result_property").html(result);
                                                }
                                            });
                                        }


                                        $('#cat_asli').change(function () {
                                            var catasl = $('#cat_asli').val();
                                            // alert('asl=' + catasl+'=='+a+'=='+edit_id);
                                            // a=catasl;
                                            $('#cat_id').val(catasl);
                                            // alert('a='+a);
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax_product.php',
                                                data: "action=product_property_cat&id=" + catasl + "&edit_id=" + edit_id,
                                                success: function (result) {
                                                    $("#result_property").html(result);
                                                }
                                            });
                                        });
                                        // $.ajax({
                                        //     type: 'POST',
                                        //     url: 'New_ajax_product.php',
                                        //     data: "action=product_property_cat&id=" + a + "&edit_id=" + edit_id,
                                        //     success: function (result) {
                                        //         $("#result_property").html(result);
                                        //     }
                                        // })
                                        // $('#cat_id').change(function () {
                                        //     a = $(this).find(':selected').attr('value');
                                        //     // alert('a2='+a);
                                        //     $.ajax({
                                        //         type: 'POST',
                                        //         url: 'New_ajax_product.php',
                                        //         data: "action=product_property_cat&id=" + a + "&edit_id=" + edit_id,
                                        //         success: function (result) {
                                        //             $("#result_property").html(result);
                                        //         }
                                        //     });
                                        // });
                                    </script>
                                <? }else{
                                ?>
                                    <script>
                                        $('#cat_asli').change(function () {
                                            var catasl = $('#cat_asli').val();
                                            // alert('asl=' + catasl+'=='+a+'=='+edit_id);
                                            // a=catasl;
                                            $('#cat_id').val(catasl);
                                            // alert('a='+a);
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax_product.php',
                                                data: "action=product_property_cat&id=" + catasl,
                                                success: function (result) {
                                                    $("#result_property").html(result);
                                                }
                                            });
                                        });
                                        // $('#cat_id').change(function () {
                                        //     a = $(this).find(':selected').attr('value');
                                        //     // alert('a='+a);
                                        //     $.ajax({
                                        //         type: 'POST',
                                        //         url: 'New_ajax_product.php',
                                        //         data: "action=product_property_cat&id=" + a,
                                        //         success: function (result) {
                                        //             $("#result_property").html(result);
                                        //         }
                                        //     });
                                        // });
                                    </script>
                                <? } ?>
                            </div>
                            <div class="tab-pane fade" id="price_vazn">


                                <div class="form-group row">
                                    <div class="form-group col-sm-3">
                                        <label class="control-label">موجودی *</label>
                                        <label class="control-label">وضعیت موجودی</label>
                                        <select class="form-control" name="vaz_mojod" id="vaz_mojod">
                                            <option value="1" <? if ($vaz_mojod == 1) echo 'selected' ?> ><a
                                                        href="" type="submit" id="aaa"
                                                        class="btn button"></a> موجود
                                            </option>
                                            <option value="2" <? if ($vaz_mojod == 2) echo 'selected' ?> >
                                                تماس بگیرید
                                            </option>
                                            <option value="3" <? if ($vaz_mojod == 3) echo 'selected' ?> >به
                                                زودی
                                            </option>
                                            <option value="4" <? if ($vaz_mojod == 4) echo 'selected' ?> >
                                                ناموجود
                                            </option>
                                            <option value="5" <? if ($vaz_mojod == 5) echo 'selected' ?> >
                                                اتمام تولید
                                            </option>
                                            <option value="6" <? if ($vaz_mojod == 6) echo 'selected' ?> >به
                                                من خبر بدهید
                                            </option>
                                        </select>
                                        <div id="mojod_show" style="display: block;">
                                            <input type="text" value="<?= $vaz_mojod_meq ?>"
                                                   name="vaz_mojod_meq" id="vaz_mojod_meq"
                                                   class="form-control"/>
                                            <select class="form-control" name="vaz_mojod_vazn"
                                                    id="vaz_mojod_vazn">
                                                <? $sqlm = "select * from new_product_meqdarvazn ";
                                                $resultm = $coms_conect->query($sqlm);
                                                while ($rowm = $resultm->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?= $rowm['id']; ?>"><?= $rowm['vahed']; ?></option>
                                                <? } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $('#vaz_mojod').change(function () {
// alert('dd');
                                        if ($(this).val() == '1')
                                            $('#mojod_show').attr("style", "display:block");
                                        else
                                            $('#mojod_show').attr("style", "display:none");
                                        // alert('salam');
                                    })
                                </script>
<!---->
<!---->
<!--                                <div class="form-group row">-->
<!--                                    <div class="form-group col-sm-6">-->
<!--                                        <label class="control-label">قیمت به تومان</label>-->
<!--                                        <input type="text" value="--><?//= $price ?><!--" name="price" id="price"-->
<!--                                               class="form-control"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group row">-->
<!--                                    <div class="form-group col-sm-6">-->
<!--                                        <label class="control-label">تخفیف</label>-->
<!--                                        <input class="form-group" name="have_off"-->
<!--                                               id="have_off" --><?// if ($have_off == 1) echo 'checked'; ?>
<!--                                               type="checkbox">-->
<!--                                        <label class="control-label"><span-->
<!--                                                    id="chck_off"></span></label>-->
<!--                                        <div id="div_chck_off">-->
<!--                                            <select class="form-control" name="off_type" id="off_type">-->
<!--                                                <option value="1" --><?// if ($off_type == 1) echo 'selected' ?><!-- >درصد-->
<!--                                                </option>-->
<!--                                                <option value="2" --><?// if ($off_type == 2) echo 'selected' ?><!-->
<!--                                مبلغ ثابت به-->
                                <!--                                                    تومان-->
<!--                                                </option>-->
<!---->
<!--                                            </select>-->
<!---->
<!--                                            <input type="text" value="--><?//= $off_off ?><!--" name="off_off" id="off_off"-->
<!--                                                   class="form-control"/>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <script>-->
<!--                                        $('#off_type').change(function () {-->
<!--                                            if ($(this).val() == 1) {-->
<!--                                                $('#off_off').attr('placeholder', '%');-->
<!--                                            } else if ($(this).val() == 2) {-->
<!--                                                $('#off_off').attr('placeholder', 'قیمت به تومان');-->
<!--                                            }-->
<!--                                        })-->
<!--                                    </script>-->
<!--                                </div>-->

                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <label class="control-label">وزن بسته بندی به گرم</label>
                                        <input type="text" value="<?= $vazn ?>" name="vazn" id="vazn"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <label class="control-label">طول بسته بندی به سانتیمتر</label>
                                        <input type="text" value="<?= $vazn_x ?>" name="vazn_x" id="vazn_x"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <label class="control-label">عرض  بسته بندی به سانتیمتر</label>
                                        <input type="text" value="<?= $vazn_y ?>" name="vazn_y" id="vazn_y"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-6">
                                        <label class="control-label">ارتفاع بسته بندی به سانتیمتر</label>
                                        <input type="text" value="<?= $vazn_z ?>" name="vazn_z" id="vazn_z"
                                               class="form-control"/>
                                    </div>
                                </div>
                                <script>
                                    /////////////// radio show hide upload image
                                    $(document).ready(function () {
                                        if ($('#have_off').is(':checked') == true) {
                                            $('#chck_off').text('دارد');
                                            $('#div_chck_off').attr("style", "display:block");
                                        } else {
                                            $('#chck_off').text('ندارد');
                                            $('#div_chck_off').attr("style", "display:none");
                                        }

                                    });
                                    $('#have_off').click(function () {

                                        if ($('#have_off').is(':checked') == true) {
                                            $('#chck_off').text('دارد');
                                            $('#have_off').val(1);
                                            $('#div_chck_off').attr("style", "display:block");

                                        } else {
                                            $('#chck_off').text('ندارد');
                                            $('#have_off').val(0);
                                            $('#div_chck_off').attr("style", "display:none");

                                        }
                                    });
                                </script>
                            </div>
                            <div class="tab-pane fade" id="color_size">


                                <div class="form-group row">
                                    <div class="form-group col-sm-3">
                                        <label class="control-label">رنگ مورد  نظر خود را انتخاب کنید :</label>
                                        <label class="control-label">رنگها</label>
                                        <select class="form-control" name="rang_color[]" multiple id="rang_color">
                                            <?
                                            $tempcolor=explode(',',get_result("select id_color from new_product_color_size WHERE id_pro=$edit_id ",$coms_conect));
                                            $tempsize=explode(',',get_result("select id_size from new_product_color_size WHERE id_pro=$edit_id ",$coms_conect));

                                            $sqlcolor="select id,onvan_color from new_product_color ";
                                            $resultcolor = $coms_conect->query($sqlcolor);
                                            while ($rowcolor = $resultcolor->fetch_assoc()) {

                                            ?>
                                            <option value="<?=$rowcolor['id'];?>" <? if (in_array($rowcolor['id'],$tempcolor)) echo 'selected' ?> ><?=$rowcolor['onvan_color'];?></option>
                                         <?}?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-sm-3">
                                        <label class="control-label">سایز مورد  نظر خود را انتخاب کنید :</label>
                                        <label class="control-label">سایزها</label>
                                        <select class="form-control" name="size_size[]" multiple id="size_size">
                                            <?
                                            $sqlsize="select id,onvan_size from new_product_size ";
                                            $resultsize = $coms_conect->query($sqlsize);
                                            while ($rowsize = $resultsize->fetch_assoc()) {

                                            ?>
                                            <option value="<?=$rowsize['id'];?>" <? if (in_array($rowsize['id'],$tempsize)) echo 'selected' ?> ><?=$rowsize['onvan_size'];?></option>
                                         <?}?>
                                        </select>

                                    </div>
                                </div>
                                <script>
                                    $('#rang_color').select2();
                                    $('#size_size').select2();
                                        // alert('salam');
                                    // })
                                </script>

                            </div>
                            <div class="tab-pane fade" id="mazaya_mayeb">

                                <div class="form-group row">
                                    <div class="form-group col-sm-12">
                                        <fieldset>
                                            <!-- #section:download/download.link -->
                                            <div class="col-md-12">
                                                <div class="col-md-5 input-group float-r">

                                                    <input type="text"
                                                           id="mazaya_onvan"
                                                           class="form-control"
                                                           placeholder="مزایا"
                                                           name="company_mazaya_onvan<?= $i ?>"
                                                           value="<?= $row_mazaya['mazaya']; ?>">
                                                    <input type="hidden" id="mazaya_id" name="mazaya_id"
                                                           value="<?= $edit_id ?>">
                                                    <span id="mazaya_add_plus" class="btn btn-success"
                                                          style="padding-top: 10px;">
                                                        <i class="fa fa-lg fa-plus"></i></span>
                                                    <div id="result_mazaya" class="col-md-5 input-group"></div>

                                                </div>
                                                <div class="col-md-5 input-group float-r">

                                                    <input type="text"
                                                           id="eyb_onvan"
                                                           class="form-control"
                                                           placeholder="معایب"
                                                           name="company_mazaya_onvan"
                                                           value="<?= $row_mazaya['mazaya']; ?>">
                                                    <input type="hidden" id="eyb_id" name="eyb_id"
                                                           value="<?= $edit_id ?>">
                                                    <span id="eyb_add_plus" class="btn btn-success"
                                                          style="padding-top: 10px;">
                                                        <i class="fa fa-lg fa-plus"></i></span>
                                                    <div id="result_eyb" class="col-md-5 input-group"></div>
                                                </div>

                                                <script>

                                                    // $(document).on('click', '.del-ads-mazaya', function () {
                                                    // var id = '';
                                                    // var p = $('#company_ad_links_count').val();
                                                    // p--
                                                    // id = $(this).attr('id');
                                                    // var id_mazaya = $('#company_mazaya_id' + id).val();
                                                    // // alert('idph='+id_mazaya);
                                                    // $('#ads_company_links_mazaya' + id).remove();
                                                    $('#mazaya_add_plus').click(function () {
                                                        var mazaya = $('#mazaya_onvan').val();
                                                        var mazaya_id = $('#mazaya_id').val();
                                                        var title= $('#title').val();
                                                        // alert(mazaya + mazaya_id);
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: 'New_ajax_product.php',
                                                            data: "action=add_product_mazaya&id=" + mazaya_id + "&mazaya=" + mazaya+"&value="+title,
                                                            success: function (result) {
                                                                $('#mazaya_onvan').val('');
                                                                // alert(id_ctlg);
                                                                $('#result_mazaya').html(result);
                                                                // var dd=$('#mazaya_label').val();
                                                                // alert(dd);
                                                                // console.log(dd);

                                                            }

                                                        });

                                                    });
                                                    var mazaya = $('#mazaya_onvan').val();
                                                    var mazaya_id = $('#mazaya_id').val();
                                                    // alert(mazaya + mazaya_id);
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'New_ajax_product.php',
                                                        data: "action=add_product_mazaya&id=" + mazaya_id + "&mazaya=" + mazaya,
                                                        success: function (result) {
                                                            $('#mazaya_onvan').val('');
                                                            // alert(id_ctlg);
                                                            $('#result_mazaya').html(result);
                                                            // var dd=$('#mazaya_label').val();
                                                            // alert(dd);
                                                            // console.log(dd);

                                                        }

                                                    });
                                                    $('#eyb_add_plus').click(function () {
                                                        var eyb = $('#eyb_onvan').val();
                                                        var eyb_id = $('#eyb_id').val();
                                                        var title= $('#title').val();

                                                        // alert(mazaya + mazaya_id);
                                                        $.ajax({
                                                            type: 'POST',
                                                            url: 'New_ajax_product.php',
                                                            data: "action=add_product_eyb&id=" + eyb_id + "&eyb=" + eyb+"&value="+title,
                                                            success: function (result) {
                                                                $('#eyb_onvan').val('');
                                                                // alert(id_ctlg);
                                                                $('#result_eyb').html(result);
                                                                // var dd=$('#mazaya_label').val();
                                                                // alert(dd);
                                                                // console.log(dd);

                                                            }

                                                        });

                                                    });

                                                    var eyb = $('#eyb_onvan').val();
                                                    var eyb_id = $('#eyb_id').val();
                                                    // alert(eyb + eyb_id);
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: 'New_ajax_product.php',
                                                        data: "action=add_product_eyb&id=" + eyb_id + "&eyb=" + eyb,
                                                        success: function (result) {
                                                            $('#eyb_onvan').val('');
                                                            // alert(id_ctlg);
                                                            $('#result_eyb').html(result);
                                                            // var dd=$('#mazaya_label').val();
                                                            // alert(dd);
                                                            // console.log(dd);

                                                        }

                                                    });

                                                </script>

                                            </div>

                                            <!-- /section:download/download.link -->
                                        </fieldset>

                                    </div>
                                </div>

                            </div>
                            <!--                    //----------------------------------------------start property product-------------------------------------------------------                -->

                            <div id="relatednews" class="tab-pane fade">
                                <!-- #section:product/product.relate -->
                                <div class="uploadbts" style="margin-top: 25px;">
                                    <a data-toggle="modal" data-target="#show_contact" data-placement="top"
                                       rel="tooltip">
                                        <button><span class="flaticon-add139"></span><span>افزودن محصولات</span>
                                        </button>
                                    </a>

                                </div>
                                <script>

                                </script>
                                <!-- /section:product/product.relate -->
                                <? if ($edit_id > "") { ?>
                                    <script>

                                        $(function () {

                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax.php',
                                                data: "action=show_related_product_show&id=<?=$totla_related?>",
                                                success: function (result) {
                                                    $("#relatednews").html(result);
                                                }
                                            });
                                        });
                                    </script>
                                <? } ?>
                            </div>
                        </div>
                        <div class="panel-footer bttools">
                            <a id="save_draft32" class="btn btn-primary save-draft2"><span
                                        class="flaticon-browser93"></span><span> پيش نويس</span></a>
                            <a id="qazzaq" class="btn btn-success submit2"><span
                                        class="flaticon-verified9"></span><span>انتشار</span></a>

                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
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


<? $_SESSION["del_item"] = 'del_product';
$_SESSION["edit_item"] = 'change_lock_product';
?>

<script src="ajax_js/product.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/colorbox.css"/>
<script src="/yep_theme/default/rtl/assets/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>
<script>
    $("#relate_btn").click(function () {
        var  t_relate=$('#totla_related').val();
        if(t_relate>'')
            edit_relate=t_relate;
        alert(edit_relate);
        $("#show_waiting_search").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=show_related_product&id=" + $("#related_search").val() + '&value=' + edit_relate ,
            success: function (result) {
                //alert(result);
                $("#show_waiting_search").hide();
                $("#show_related").html(result);
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
        $('.status_news').editable({
            type: 'select',
            name: 'change_status_product',
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
        $.fn.editable.defaults.mode = 'inline';
        $('.status_product').editable({
            type: 'select',
            name: 'change_status_product_vaz',
            url: '/New_ajax_product.php',
            value: $("#x_editable_val").val(),
            source: "{6: 'به من خبر بده',5: 'اتمام تولید',4: 'ناموجود',3: 'به زودی',2: 'تماس بگیرید',1: 'موجود'}",
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
    $('#newstext').formValidation({
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
        $('#newstext').closest('form').find("input[type=text], textarea").val("");
    });
</script 
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css"/>
<!--<script type="text/javascript" src="/filemanager/plugin.min.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />-->
<!--<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>	-->
<!--[if lt IE 9]>
<script src="/yep_theme/default/rtl/js/jsTree/respond.js"></script><![endif]-->
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<!--<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>-->
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">

<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>-->
<!--<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>-->

<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>

<!---->
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/new_plugin/video-js/css/video-js.min.css">
<!-- page specific plugin scripts -->
<!--script src="/assets/js/fuelux/data/fuelux.tree-sample-demo-data.js"></script-->
<!--<script src="/yep_theme/default/rtl/assets/js/fuelux/fuelux.tree.min.js"></script>-->
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">-->
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">-->
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">-->
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css"/>
<!--[if lt IE 9]>
<script src="/js/jsTree/respond.js"></script><![endif]-->
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<!--<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>-->
<!--<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>-->
<!--<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>-->
<!--<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>-->
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
<!--<script src="/yep_theme/default/rtl/js/select2.js"></script>-->

<link type="text/css" href="/new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="/new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script>


<script src="/yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/yep_theme/default/rtl/js/zozo.tabs.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">


<!---->

<script type="text/javascript">
    $(document).ready(function () {
        $('#cat_filter').select2({
            data: [
                <?
                $query = "select id,name from new_modules_cat where type=5";$i = 0;
                $result = $coms_conect->query($query);
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
            multiple: true,
            formatNoMatches: function (term) {
                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
            }
        });
    });
</script>

<!--<script src="/yep_theme/default/rtl/js/tab_active_back.js"></script>-->
<!--<script type="text/javascript">-->
<!-- $(document).ready(function() {-->
<!--    $('#meta_label').select2({-->
<!--        //data: [-->
<!--			//	--><? ////
//	$query="select id,key_count,name from new_keyword";$i=0;
//	$result = $coms_conect->query($query);
//	while($RS1 = $result->fetch_assoc()) {
//		$id=$RS1["id"];
//		$name=$RS1["name"].'('.$RS1["key_count"].')';
//				if($i==0)
//			echo '{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
//			else
//			echo ','.'{'.'id'.':'.$id.',' .'text'.':'."'".$name."'"."}";
//			$i++;
//	}
//?>
<!--        //],-->
<!--        //allowClear: true,-->
<!--        //multiple: true,-->
<!--        //formatNoMatches: function(term) {-->
<!--        //    return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"-->
<!--        //  }-->
<!--    });-->
<!--});-->
<!--// </script>-->
<style>
    .error {
        color: red;
    }

</style>

<!--############################################ Start Boxs  #############################################-->
<!---->
<!---->
<!--//<link href="/yep_theme/default/rtl/css/tab-vertical/style.css" rel="stylesheet">-->
<link rel="stylesheet"
      href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/default/<?= $dir ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>-->
<!--//<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>-->
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>-->
<!--//<script src="/yep_theme/default/rtl/js/select2.js"></script>-->
<!--//<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>-->
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>-->
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">-->
<!--//<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>-->

<!--<!-/<script src="/yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/yep_theme/default/rtl/js/zozo.tabs.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">-->

<!--<link type="text/css" href="../../new_orakuploader/orakuploader.css" rel="stylesheet"/>-->
<!--<script type="text/javascript" src="../../new_orakuploader/jquery-ui.min.js"></script>-->
<!--<script type="text/javascript" src="../../new_orakuploader/orakuploader.js"></script>-->
<link rel="stylesheet" href="/yep_theme/default/rtl/css/H_style.css">
<!--<link rel="stylesheet" href="/yep_theme/default/rtl/css/zozo.tabs.min.css">-->

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
//if ($_POST['send_flag'] == 1) {


################################################################# هدر ############################################

//
//$header_link = injection_replace($_POST["header_link"]);
//$site_name = injection_replace($_POST["site_name"]);
//
//$header_pic_adress = injection_replace($_POST["header_pic_adress"]);
//$header_pic_adress_avatar_orak = injection_replace($_POST["header_pic_adress_avatar_orak"][0]);
//if ($header_pic_adress_avatar_orak > "") {
//    $header_pic_adress = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $header_pic_adress_avatar_orak;
//}
//insert_templdate_page($site, $header_pic_adress, $la, '', $site_name, $header_link, '', "header_title", $tem, $coms_conect);
//

###########################################  New_page ############################################
$title = injection_replace($_POST['title']);
$link_url = injection_replace($_POST['link_url']);
$mini_text = injection_replace($_POST['mini_text']);
$navication_pic = injection_replace($_POST['navication_pic']);
$status = injection_replace($_POST['status']);

$name = injection_replace($_POST['name']);
$q = injection_replace($_GET['q']);

# SEO Tab
$meta_label = ($_POST['meta_label']);
if ($meta_label > "") {
    get_label_count($meta_label, $coms_conect);
}
##################چک کردن زبان#######################
$la = injection_replace($_POST['manage_lang']);

if ($la > "" && !in_array($la, $_SESSION["manager_title_lang"])) {
    header('Location: new_manager_signout.php');
}
$lang_filter = injection_replace($_GET['lang_filter']);
if ($lang_filter > 0 && !in_array($lang_filter, $_SESSION["manager_title_lang"])) {
    header('Location: new_manager_signout.php');
}
#########################چک کردن زیر سایت#############
$site = injection_replace($_POST['manage_site']);
$site_filter = injection_replace($_GET['site_filter']);
if (($site > 0 && !in_array($site, $_SESSION["manager_title_site"])) || ($site_filter > 0 && !in_array($site_filter, $_SESSION["manager_title_site"]))) {
    header('Location: new_manager_signout.php');
    exit;
}
########################چک کردن دسته بندی##############################
$array_value = injection_replace($_POST['array_value']);
if ($array_value > "") {
    $array_valu = explode(",", $array_value);
    $tempp = (array_diff($array_valu, $_SESSION["manager_page_cat"]));
    if (count($tempp) > 0) {
        header('Location: new_manager_signout.php');
        exit();
    }
}
#######################چک کردن کاربران#####################
$manager_filter = injection_replace($_GET['manager_filter']);
if ($manager_filter > 0 && !in_array($manager_filter, $_SESSION["manager_user_permisson"]))
    header('Location: new_manager_signout.php');
#########################################################		
$site = injection_replace($_POST['manage_site']);
$edit_id = injection_replace($_GET['edit_id']);
$text = ta_latin_num($_POST['text']);

$mudoal_lock = injection_replace($_POST['mudoal_lock']);


//#file upload field
//$upload_type_nav = injection_replace($_POST['upload_type_nav']);
//if ($upload_type_nav == 2)
//    $navication_pic = injection_replace($_POST['page_image_nav']);
//
//else if ($upload_type_nav == 1) {
//    $page_image_avatar_nav = injection_replace($_POST['page_image_avatar_nav'][0]);
//    echo $page_image_avatar_nav;
//    $page_image_avatar_nav = trim($page_image_avatar_nav);
//    if ($page_image_avatar_nav != '')
//        $navication_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $page_image_avatar_nav;
//    else
//        $navication_pic = '';
//}
//if ($upload_type_nav == '')
//    $upload_type_nav = 1;

#file upload field
$upload_type = injection_replace($_POST['upload_type']);
if ($upload_type == 2)
    $page_image = trim(injection_replace($_POST['page_image']));

else if ($upload_type == 1) {
    $page_image_avatar = injection_replace($_POST['page_image_avatar'][0]);
    $page_image_avatar = trim($page_image_avatar);
    if ($page_image_avatar != '')
        $page_image = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $page_image_avatar;
    else
        $page_image = '';
}

#صفحه مرتبط
$totla_related = injection_replace($_POST['totla_related']);
$spesial_date = jdate('Y/m/d');

# Slide Tab
$slide = injection_replace($_POST['slide']);

if ($mudoal_lock != 1)
    $mudoal_lock = 0;
$have_commnet = injection_replace($_POST['have_commnet']);
if ($have_commnet != 1)
    $have_commnet = 0;
$edit_mode = injection_replace($_POST['edit_mode']);
$meta_tag = injection_replace($_POST['meta_tag']);
$meta_desciption = injection_replace($_POST['meta_desciption']);
$chideman = injection_replace($_POST['chideman']);
$meta_keyword = injection_replace($_POST['meta_keyword']);
$seo_title = injection_replace($_POST['seo_title']);
$h1 = injection_replace($_POST['h1']);
$h2 = injection_replace($_POST['h2']);
if ($h2 != 1) $h2 = 0;

#slideshow 
$slide_img1 = injection_replace($_POST['slide_img1']);
$slide_img2 = injection_replace($_POST['slide_img2']);
$start_date = injection_replace($_POST['start_date']);
$finish_date = injection_replace($_POST['finish_date']);
$slide_title = injection_replace($_POST['slide_title']);
$text1 = injection_replace($_POST['text1']);
$text2 = injection_replace($_POST['text2']);
$text3 = injection_replace($_POST['text3']);

$cat_asli = injection_replace($_POST['cat_asli']);
$meta_label1 = injection_replace($_POST['meta_label1']);
$album_type = injection_replace($_POST['album_type']);
if ($album_type == 2) {
    $imagelist = ($_POST['imagelist']);
    foreach ($_POST['page_image_album'] as $val) {
        $val = trim($val);
        unlink('new_gallery/files/' . $val);
        unlink('new_gallery/files/tn/' . $val);
    }

} else if ($album_type == 1 && count($_POST['page_image_album']) > 0) {
    foreach ($_POST['page_image_album'] as $val)
        $imagelist[] = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . trim($val);
}

if (isset($_POST['publish_date'])) {
    $publish_date = injection_replace($_POST['publish_date']);
    $publish_date = (injection_replace($_POST['publish_date']) > "") ? strtotime(jalalitomiladi($publish_date)) : $now;
}

$chack_val = explode(",", $array_value);
$link = "$name/$la/" . insert_dash($title);
if ($edit_mode == 0 && $name > "" && ($_SESSION["can_add"] == 1 || $_SESSION["can_draft"] == 1)) {

    if ($_SESSION["can_add"] != 1)
        $status = 0;

    $query1 = "insert into new_static_page(hashtag_key,upload_type,album_type,cat_asli,mini_text,link_url,navication_pic,slide,publish_date,have_commnet,title,la,status,name,site,text,mudoal_lock,meta_label,meta_desciption,meta_keyword,seo_title,h1,h2,date,user_id,ip) 
		values ('$meta_label1','$upload_type','$album_type',$cat_asli,'$mini_text','$link_url','$navication_pic','$slide',$publish_date,$have_commnet,'$title','$la',$status,'$name','$site','$text','$mudoal_lock','$meta_label','$meta_desciption','$meta_keyword','$seo_title','$h1',$h2,NOW(),$manager_id,'$custom_ip')";
    $coms_conect->query($query1);
    $id = mysqli_insert_id($coms_conect);
    //echo $query1.'<br>';exit;
    #######################catogory########################
    foreach ($chack_val as $value) {
        if ($value != -1) {
            $query1 = "insert into new_modules_catogory(cat_id,page_id,type) 
				values ('$value','$id',5)";
            $coms_conect->query($query1);
        }

    }


    $arr_imag = array("id" => $id, "type" => 5, "adress" => trim($page_image), "name" => 'page_image');
    insert_to_data_base($arr_imag, 'new_file_path', $coms_conect);


    ### gallery add
    if (!empty($imagelist)) {
        foreach ($imagelist as $image) {
            if ($image != -1) {
                $gallery_arr = array("id" => $id, "type" => 5, "adress" => trim($image), "name" => 'page_gallery');
                insert_to_data_base($gallery_arr, 'new_file_path', $coms_conect);
            }
        }
    }

    ### slide show add
    if ($slide_img1 == 1) {
        $arr_slide = array("link" => $link, 'site' => $site, 'la' => $la, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $id, "type" => 5, "user_id" => $user_id, "date" => $now, "ip" => $custom_ip);
        insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
    }
    ####label
    if (!empty($meta_label)) {
//		$temp=explode(",",$meta_label);
        foreach ($meta_label as $value) {
            if ($meta_label > "") {
                $label_arr = array("id" => $id, "type" => 5, "label_id" => $value);
                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }

    $related = explode(",", $totla_related);
    foreach ($related as $value) {
        $arr = array("id" => $value, "page_id" => $id, "type" => 5);
        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
    }


    ###########################چیدمان بلوک###################
    /*if($chideman>0){
        $query1="insert into new_static_page_sort(page_id,sort_id,type)
        values ('$id',$chideman,'p')";
        $coms_conect->query($query1);
    }*/
    show_msg($new_successfull);
}


if ($edit_mode > 0 && $name > "" && $_SESSION['can_edit'] == 1) {


    $query12 = "select user_id from new_static_page a  where id=$edit_mode";
    $result12 = $coms_conect->query($query12);
    $RS121 = $result12->fetch_assoc();
    $user_id = $RS121["user_id"];

    if ($user_id > 0 && !in_array($user_id, $_SESSION["manager_user_permisson"]))
        header('Location: new_manager_signout.php');
    $query1 = "update new_static_page set  hashtag_key='$meta_label1',upload_type='$upload_type',album_type='$album_type',cat_asli='$cat_asli', mini_text='$mini_text',link_url='$link_url',navication_pic='$navication_pic',slide='$slide',publish_date='$publish_date',have_commnet='$have_commnet',title='$title',status='$status',name='$name',la='$la',site='$site'
	,text='$text',mudoal_lock='$mudoal_lock',meta_label='$meta_label',meta_desciption='$meta_desciption',meta_keyword='$meta_keyword',seo_title='$seo_title'
	,h1='$h1',h2=$h2 where id=$edit_mode";
    $coms_conect->query($query1);
    //echo $query1;
    /*$query1="delete from new_static_page_sort where page_id='$edit_mode'";
    $coms_conect->query($query1);

    if($chideman>0){
        $query1="insert into new_static_page_sort(page_id,sort_id,type)
        values ('$edit_mode',$chideman,'p')";
        $coms_conect->query($query1);
    }
    */
    $query1 = "delete from new_modules_catogory where page_id='$edit_mode'";
    $coms_conect->query($query1);

    foreach ($array_valu as $value) {
        $query1 = "insert into new_modules_catogory(cat_id,page_id,type) 
		values ('$value',$edit_mode,'5')";
        $coms_conect->query($query1);
    }


    $condition = "id=$edit_mode AND name='page_image'";
    $arr_imag = array("id" => $edit_mode, "type" => 5, "adress" => trim($page_image), "name" => 'page_image');
    update_data_base($arr_imag, 'new_file_path', $condition, $coms_conect);
//print_r($arr_imag);

    ##edit gallery
    $query1 = "delete from new_file_path where id='$edit_mode' && name='page_gallery' and type=5";
    $coms_conect->query($query1);
    if (!empty($imagelist)) {
        foreach ($imagelist as $image) {
            if ($image != -1) {
                $gallery_arr = array("id" => $edit_mode, "type" => 5, "adress" => trim($image), "name" => 'page_gallery');
                insert_to_data_base($gallery_arr, 'new_file_path', $coms_conect);
            }
        }
    }


    ####label
    $condition = "id=$edit_mode AND type=5";
    delete_from_data_base('new_mudoal_label', $condition, $coms_conect);
    if (!empty($meta_label)) {
//		$temp=explode(",",$meta_label);
        foreach ($meta_label as $value) {
            if ($meta_label > "") {
                $label_arr = array("id" => $edit_mode, "type" => 5, "label_id" => $value);
                insert_to_data_base($label_arr, 'new_mudoal_label', $coms_conect);
            }
        }
    }
    #####related
    $query1 = "delete from new_related_madual where page_id='$edit_mode' and type=5";
    $coms_conect->query($query1);
    $related = explode(",", $totla_related);
    foreach ($related as $value) {

        $arr = array("id" => $value, "page_id" => $edit_mode, "type" => 5);
        insert_to_data_base($arr, 'new_related_madual', $coms_conect);
    }


    ### slide show update
    if ($slide_img1 > "") {
        $query1 = "select count(id) as count from new_slideshow where page_id='$edit_mode'";

        $result = $coms_conect->query($query1);
        $row = $result->fetch_assoc();
        $count = $row['count'];

        if ($count != 0) {
            $condition = "page_id=$edit_mode";
            $arr_slide = array("link" => $link, "la" => $la, "site" => $site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 5, "edit_user_id" => $edit_user_id, "edit_date" => $now, "ip" => $custom_ip);
            update_data_base($arr_slide, 'new_slideshow', $condition, $coms_conect);
        } else {
            $arr_slide = array("link" => $link, "la" => $la, "site" => $site, "slide_img1" => $slide_img1, "slide_img2" => $slide_img2, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "title" => $slide_title, "text1" => $text1, "text2" => $text2, "text3" => $text3, "page_id" => $edit_mode, "type" => 5, "user_id" => $edit_user_id, "date" => $now, "ip" => $custom_ip);
            insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
        }
    } else {
        $query1 = "delete from new_slideshow where page_id='$edit_mode'";
        $coms_conect->query($query1);
    }

    show_msg($new_successfull);
}
 if($edit_id>'')
     $id=$edit_id;
//else $id_page=$edit_id;


########################################################## باکس اول  BOX content###########################################

//    $block_name1 = injection_replace($_POST["block_name1"]);
if (isset($_POST["boxFive_title"]) && ($_POST["boxFive_title"]) > "") {
//        insert_templdate_page($site, '', $la, $block_name1, '', '', '', "block1", $tem, $coms_conect);
//    }
    $condition_first_choice_boxFive = "input_type like 'content%' and id_page='$id'";
    delete_from_data_base('new_static_page_setting', $condition_first_choice_boxFive, $coms_conect);
    $boxFive_pic_adress = 0;
    $boxFive_pic_adress= injection_replace($_POST["boxFive_pic_adress"]);
    $boxFive_title = injection_replace($_POST["boxFive_title"]);
    $boxFive_text = injection_replace($_POST["boxFive_text"]);
    $select_type_boxFive = injection_replace($_POST["select_type_boxFive"]);
    $boxFive_pic = injection_replace($_POST["box1_header_link121"]);
    $box1_header_link_avatar_orak = injection_replace($_POST["box1_header_link_avatar_orak"][0]);
    if($box1_header_link_avatar_orak>""){
        $boxFive_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $box1_header_link_avatar_orak;
    }
//    $boxFive_link = injection_replace($_POST["boxFive_link"]);
    insert_templdate_page($id,'content',$site,$boxFive_pic,  $la, $boxFive_text, $boxFive_title,$boxFive_pic_adress, $boxFive_link, $select_type_boxFive, $tem, $coms_conect);



    $ValSelectActive_boxFive_title = injection_replace($_POST["ValSelectActive_boxFive_title"]);
    insert_templdate_page($id,'content',$site, '', $la, '', $ValSelectActive_boxFive_title, '', '', "ValSelectActive_boxFive", $tem, $coms_conect);

//    $condition_first_choice_boxFive = "name like 'first_choice_boxFive%' and tem_name='$tem'";
//    delete_from_data_base('new_static_page_setting', $condition_first_choice_boxFive, $coms_conect);
    $first_choice_boxFive_count = injection_replace_pic($_POST["first_choice_boxFive_count"]);
    for ($i = 1; $i <= $first_choice_boxFive_count; $i++) {

        $first_choice_boxFive_cat = injection_replace_pic($_POST["first_choice_boxFive_cat{$i}"]);
        $first_choice_boxFive_subcat_cat = injection_replace_pic($_POST["first_choice_boxFive_subcat_cat{$i}"]);
        $first_choice_boxFive_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_boxFive_Fixed_selection_cat{$i}"]);
        $first_choice_boxFive_number = injection_replace_pic($_POST["first_choice_boxFive_number{$i}"]);
        if ($first_choice_boxFive_subcat_cat > "")
            insert_templdate_page($id,'content',$site, $first_choice_boxFive_number, $la, $first_choice_boxFive_Fixed_selection_cat, '', $first_choice_boxFive_cat, $first_choice_boxFive_subcat_cat, "first_choice_boxFive$i", $tem, $coms_conect);
    }

//    $condition_second_choice_boxFive="name like 'second_choice_boxFive%' and tem_name='$tem'";
//    delete_from_data_base('new_static_page_setting',$condition_second_choice_boxFive,$coms_conect);
    $second_choice_boxFive_count = injection_replace_pic($_POST["second_choice_boxFive_count"]);
    for ($i = 1; $i <= $second_choice_boxFive_count; $i++) {

        $second_choice_boxFive_cat = injection_replace_pic($_POST["second_choice_boxFive_cat{$i}"]);
        $second_choice_boxFive_subcat_cat = injection_replace_pic($_POST["second_choice_boxFive_subcat_cat{$i}"]);
        $second_choice_boxFive_subcat_cat_content = injection_replace_pic($_POST["second_choice_boxFive_subcat_cat_content{$i}"]);
        if($second_choice_boxFive_subcat_cat_content>0)
            insert_templdate_page($id,'content',$site, $second_choice_boxFive_subcat_cat_content, $la, '', '', $second_choice_boxFive_cat, $second_choice_boxFive_subcat_cat, "second_choice_boxFive$i", $tem, $coms_conect);
    }

//    $condition_third_choice_boxFive = "name like 'third_choice_boxFive%' and tem_name='$tem'";
//    delete_from_data_base('new_static_page_setting', $condition_third_choice_boxFive, $coms_conect);
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
            insert_templdate_page($id,'content',$site, $third_choice_boxFive_pic_adress, $la, $third_choice_boxFive_text, $third_choice_boxFive_title, $third_choice_boxFive_link, $third_choice_boxFive_pic, "third_choice_boxFive$x", $tem, $coms_conect);
        }
    }

}
########################################################### باکس content #####################################
########################################################### باکس BOXS Button #####################################
//$block_name4 = injection_replace($_POST["block_name4"]);
//if ($block_name4 >"") {
//    insert_templdate_page($site, '', $la, $block_name4, '', '', '', "block4", $tem, $coms_conect);
//}
//if(isset($_POST["second_choice_box4_subcat_onvan1"])&&)

//$box4_header_title = injection_replace($_POST["box4_header_title"]);
//$box4_header_pic = injection_replace($_POST["box4_header_pic"]);
//insert_templdate_page($site, $box4_header_pic_adress, $la, '', $box4_header_title, '', $box4_header_pic, "button", $tem, $coms_conect);

//
//$condition_first_choice_box4 = "name like 'first_choice_box4%' and tem_name='$tem'";
//delete_from_data_base('new_static_page_setting', $condition_first_choice_box4, $coms_conect);
//$first_choice_box4_count = injection_replace_pic($_POST["first_choice_box4_count"]);
//for ($i = 1; $i <= $first_choice_box4_count; $i++) {
//    $select_type_box4 = injection_replace_pic($_POST["select_type_box4"]);
//    $first_choice_box4_cat = injection_replace_pic($_POST["first_choice_box4_cat{$i}"]);
//    $first_choice_box4_subcat_cat = injection_replace_pic($_POST["first_choice_box4_subcat_cat{$i}"]);
//    $first_choice_box4_Fixed_selection_cat = injection_replace_pic($_POST["first_choice_box4_Fixed_selection_cat{$i}"]);
//    $first_choice_box4_number = injection_replace_pic($_POST["first_choice_box4_number{$i}"]);
//    if ($first_choice_box4_subcat_cat > 0)
//        insert_templdate_page($site, $first_choice_box4_number, $la, $first_choice_box4_Fixed_selection_cat, $select_type_box4, $first_choice_box4_cat, $first_choice_box4_subcat_cat, "first_choice_box4$i", $tem, $coms_conect);
//}
if(isset($_POST["second_choice_box4_subcat_onvan4"])||isset($_POST["second_choice_box4_subcat_onvan1"])||isset($_POST["second_choice_box4_subcat_onvan2"])||isset($_POST["second_choice_box4_subcat_onvan3"])){
$condition_second_choice_box4="input_type like 'button' and id_page='$id'";
delete_from_data_base('new_static_page_setting',$condition_second_choice_box4,$coms_conect);
$box4_header_pic_adress = 0;
$box4_header_pic_adress = injection_replace($_POST["box4_header_pic_adress"]);
$second_choice_box4_count = injection_replace_pic($_POST["second_choice_box4_count"]);
for ($i = 1; $i <= $second_choice_box4_count; $i++) {
//    $select_type_box4 = injection_replace_pic($_POST["select_type_box4"]);
    $second_choice_box4_subcat_onvan = injection_replace_pic($_POST["second_choice_box4_subcat_onvan{$i}"]);
    $second_choice_box4_cat = injection_replace_pic($_POST["second_choice_box4_cat{$i}"]);
    $second_choice_box4_subcat_cat = injection_replace_pic($_POST["second_choice_box4_subcat_cat{$i}"]);
    $second_choice_box4_subcat_cat_content = injection_replace_pic($_POST["second_choice_box4_subcat_cat_content{$i}"]);
    echo $second_choice_box4_subcat_cat_content;
    if($second_choice_box4_subcat_cat_content>0)
        insert_templdate_page($id,'button',$site, $second_choice_box4_subcat_cat_content, $la, '',$second_choice_box4_subcat_onvan, $box4_header_pic_adress, $second_choice_box4_cat, $second_choice_box4_subcat_cat, $second_choice_box4_subcat_cat_content, $coms_conect);
}}
//
//$condition_third_choice_box4 = "name like 'third_choice_box4%' and tem_name='$tem'";
//delete_from_data_base('new_static_page_setting', $condition_third_choice_box4, $coms_conect);
//$third_choice_box4_count = injection_replace_pic($_POST["third_choice_box4_count"]);
//for ($x = 1; $x <= $third_choice_box4_count; $x++) {
//    $select_type_box4 = injection_replace_pic($_POST["select_type_box4"]);
//    $third_choice_box4_text = injection_replace_pic($_POST["third_choice_box4_text{$x}"]);
//    $third_choice_box4_title = injection_replace_pic($_POST["third_choice_box4_title{$x}"]);
//    $third_choice_box4_link = injection_replace_pic($_POST["third_choice_box4_link{$x}"]);
//    $third_choice_box4_pic = injection_replace_pic($_POST["third_choice_box4_pic{$x}"]);
//    $third_choice_box4_avatar7 = injection_replace($_POST["third_choice_box4_avatar7{$x}"][0]);
//    if($third_choice_box4_avatar7>""){
//        $third_choice_box4_pic = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $third_choice_box4_avatar7;
//    }
//    if ($third_choice_box4_title >""){
//        insert_templdate_page($site, $third_choice_box4_pic, $la, $third_choice_box4_text, $third_choice_box4_title, $third_choice_box4_link, $select_type_box4, "third_choice_box4$x", $tem, $coms_conect);
//    }
//}
############################################ End boxs Button




$publish_date = '';


if ($edit_id > 0) {
    $query12 = "select hashtag_key,upload_type,album_type,cat_asli,navication_pic,slide,publish_date,link_url,mini_text,have_commnet,user_id,title,status,name,la,site,text,mudoal_lock,meta_label,meta_desciption,meta_keyword,seo_title,h1,h2,view 
from new_static_page a  where id=$edit_id";
    $result12 = $coms_conect->query($query12);
    $RS121 = $result12->fetch_assoc();
    $slide = $RS121["slide"];
    $edit_title = $RS121["title"];
    $have_commnet = $RS121["have_commnet"];
    $edit_status = $RS121["status"];
    $edit_la = $RS121["la"];
    $edit_sort_id = $RS121["sort_id"];
    $navication_pic = $RS121["navication_pic"];

    $edit_name = $RS121["name"];
    $edit_lang = resolve_id_langueg($RS121["la"], $coms_conect);
    $site = $RS121["site"];
    $edit_text = $RS121["text"];
    $link_url = $RS121["link_url"];
    $mini_text = $RS121["mini_text"];

    $edit_mudoal_lock = $RS121["mudoal_lock"];
    $meta_label = $RS121["meta_label"];
    $meta_desciption = $RS121["meta_desciption"];
    $meta_keyword = $RS121["meta_keyword"];
    $seo_title = $RS121["seo_title"];
    $edit_h1 = $RS121["h1"];
    $edit_h2 = $RS121["h2"];

    $cat_asli = $RS121['cat_asli'];
    $album_type = $RS121['album_type'];
    $upload_type = $RS121['upload_type'];
    $meta_label1 = explode(',', $RS121['hashtag_key']);
//print_r($meta_label1);

    #Query from new_slideshow
    $query = "SELECT * FROM new_slideshow where page_id='$edit_id'";

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

    $publish_date = miladitojalaliuser(date('Y-m-d', $RS121['publish_date']));
    if ($RS121["user_id"] > 0 && !in_array($RS121["user_id"], $_SESSION["manager_user_permisson"]))
        header('Location: new_manager_signout.php');

    $query12 = "select sort_id from new_static_page_sort where page_id='$edit_id' and type='p'";
    $result12 = $coms_conect->query($query12);
    $RS121 = $result12->fetch_assoc();

    $edit_chideman = $RS121["sort_id"];

    $i = 1;
    $str = '';
    $query = "select label_id from new_mudoal_label where id='$edit_id' and type=5";
    $result = $coms_conect->query($query);
    $i = 1;
    $str = '';
    while ($RS1 = $result->fetch_assoc()) {
//			if($i!=1)$str=',';
//			$label .=$str.$RS1['label_id'];$i++;
        $label[] = $RS1['label_id'];

    }
    $query = "SELECT b.id,name FROM new_related_madual a ,new_static_page b  where page_id='$edit_id' and a.id=b.id  and type=5";
    $result = $coms_conect->query($query);
    $totla_related = "";
    $i = 1;
    while ($row = $result->fetch_assoc()) {
        if ($i != 1) $str = ',';
        $i++;
        $totla_related .= $str . $row['id'];
    }
}


?>


<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#manage_lang00').select2({
            data: [
                <?
                $query = "select id,name from new_language where status=1";
                $result = $coms_conect->query($query);
                $i = 0;
                while ($RS1 = $result->fetch_assoc()) {
                    $id = $RS1["id"];
                    $name = $RS1["name"];
                    if (in_array($id, $manager_la)) {
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
            selected: true,


            formatNoMatches: function (term) {
                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
            }
        });

    });


    $(function () {
        $('#new_pages').validate({

            rules: {
                title: {
                    required: true
                },
                name: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "پر کردن اين فيلد الزامي است"
                },
                name: {
                    required: "پر کردن اين فيلد الزامي است"
                }
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? 'فيلد خالي مانده است لطفا پر کنيد'
                        : '' + errors + 'فيلد خالي مانده است لطفا پر کنيد';
                    $("div.errorHandler button").after(message);
                    $("div.errorHandler").show();
                } else {
                    $("div.errorHandler").hide();
                }
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#e9').select2({
            data: [],
            allowClear: true,
            multiple: true,
            formatNoMatches: function (term) {
                return "<div class='select2-result-label'><span class='select2-match'></span>موردي يافت نشد </div>"
            }
        });

        $("#sel").change(function () {
            //alert($(this).val());
            $.ajax({
                type: 'POST',
                url: '/Pro_ajax_message.php',
                data: "action=show_tem&id=" + $(this).val(),
                success: function (result) {
                    $('#show_temp').val(result);
                }
            });//alert('dd');
        });
    });
</script>

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
</script>


<div class="modal fade" id="del_reated_news" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آیا از حذف صفحه
                    مرتبط اطمینان دارید؟
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


<!-- alert panel  -->
<div class="errorHandler alert alert-danger" style="display:none;position: fixed;">
    <button data-dismiss="alert" class="close" sourceindex="208">x</button>
    <i class="fa fa-times-sign"></i>
</div>
<!-- /alert panel  -->


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف
                    محتویات زیر اطمینان دارید؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok_page" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلی
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-remove"></span>&nbsp;خیر
                </button>
            </div>
        </div>
    </div>
</div></fieldset>


<form class="form-horizontal" id="news_search" name="news_search" action="" role="form" method="get"
      enctype="multipart/form-data">
    <input type="hidden" value="new_Pages" name='yep'>
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
                            <? /*?>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_name">کاربر</label>
								<div class="col-md-4">
									<?$manager_filter=injection_replace($_GET['manager_filter']);
									create_manager_filter($manager_filter,$dbname,$RSconn,$_SESSION["manager_user_permisson"])?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_name">زبان</label>
								<div class="col-md-4">
									<?$lang_filter=injection_replace($_GET['manage_lang_filter']);
									create_lang_filter($lang_filter,$dbname,$RSconn,$_SESSION["manager_title_lang"])?>
								</div>
							</div> 
							<div class="form-group">
								<label class="col-md-3 control-label" for="edit_name">زير سايت</label>
								<div class="col-md-4">
									<?$site_filter=injection_replace($_GET['manage_site_filter']);
									create_sub_site_filter($site_filter,$dbname,$RSconn,$_SESSION["manager_title_site"])?>
								</div>
							</div>
							<?*/ ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_name">عنوان جستجو</label>
                                <div class="col-md-4">
                                    <? $search_txt = injection_replace($_GET['search_txt']) ?>
                                    <input id="search_txt" name="search_txt" value="<?= $search_txt ?>" type="text"
                                           placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">فيلد</label>
                                <div class="col-md-4">
                                    <? $field = injection_replace($_GET['field']) ?>
                                    <select class="dropdown" rows="5" name="field">
                                        <option <? if ($field == 0) echo 'selected' ?> value="0">همه</option>
                                        <option <? if ($field == 1) echo 'selected' ?> value="1">عنوان</option>
                                        <option <? if ($field == 2) echo 'selected' ?> value="2">متن</option>
                                        <!--option <? if ($field == 6) echo 'selected' ?> value="6">برچسب</option>
										<option <? if ($field == 4) echo 'selected' ?> value="4">Meta Keywords</option>
										<option <? if ($field == 5) echo 'selected' ?> value="5">Meta Description</option-->
                                        <option <? if ($field == 3) echo 'selected' ?> value="3">H1</option>
                                        <option <? if ($field == 4) echo 'selected' ?> value="4">پیشوند صفحه</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">دسته بندي</label>
                                <div class="col-md-4">
                                    <? $cat_filter = injection_replace($_GET['cat_filter']) ?>
                                    <input type="text" name="cat_filter" value="<?= $cat_filter ?>" id="cat_filter"
                                           rows="5" autocomplete="off" autocorrect="off" autocapitalize="off"
                                           spellcheck="false" class="select2-input select2-default"
                                           style="width: 100%; ">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_family">تاريخ انتشار</label>
                                <div class="col-md-4">
                                    <? if ($_GET['publish_search'] > "") $publish_search = (injection_replace($_GET['publish_search'])) ?>
                                    <input type="text" value="<?= $publish_search ?>" class="input-sm form-control"
                                           name="publish_search" id="publish_search"/>
                                    </select>
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
                        <button id="singlebutton" class="btn btn-primary">جستجو</button>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>


<!-- switch lock unlock -->
<style>
    input[type=checkbox].ace.ace-switch.ace-switch-6 + .lbl::before {
        content: "\f023";
    }

    input[type=checkbox].ace.ace-switch.ace-switch-6:checked + .lbl::before {
        content: "\f09c";
    }

</style>


</br>
<div class="tabbable">
    <ul class="nav nav-tabs" style="margin-top:2px;border-bottom: 0;">
        <!--<li class="pull-right" style="right:1%;" id="newpag">
            <i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span data-toggle="tab" href="#write" title="صفحه جدید"><i class="ace-icon fa fa-plus bigger-110"></i></span>
            </i>
            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="nav navbar-nav navbar-left">
                <a data-toggle="tab" href="#write" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
                    <i class="ace-icon fa fa-plus bigger-110"></i>
                    صفحه جدید</a>
                </ul>
            </div>
        </li>
        <li class="pull-right" style="right:2%;" id="switchword">
            <i type="button" class="navbar-toggle btn-primary"  data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span data-toggle="tab" href="#write2" title="جایگزینی واژه"><i class="ace-icon fa fa-pencil bigger-110"></i></span>
            </i>
            <div class="collapse navbar-collapse" id="nav-collapse">
                <ul class="nav navbar-nav navbar-left">
                <a data-toggle="tab" href="#write2" style="background-color: #2a8bcb!important;border-color: #2a8bcb;color: white;padding: 4px;">
                    <i class="ace-icon fa fa-pencil bigger-110"></i>
                    جایگزینی واژه</a>
                </ul>
            </div>
        </li>-->
        <li class="active"><a href="#tab1" data-toggle="tab" style="display:none;"><i
                        class="green ace-icon fa fa-inbox bigger-130"></i>
                مدیریت محتوا </a></li>
    </ul>
    <div class="msheet tab-content">
        <div class="secfhead">
            <!-- #section:content/pages.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-internet83" style=""></span></div>
                <div class="title"><p class="titr">لیست صفحات</p>
                    <p class="lead">در این قسمت شما لیست صفحات ساخته شده را دیده و امکان ویرایش و بروز رسانی آنها را
                        خواهید داشت.</p></div>
            </div>
            <!-- /section:content/pages.head -->

            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                    <? if ($_SESSION['can_add'] == 1 || $_SESSION['can_draft'] == 1) { ?> 
                        <li id="newpag" class="addicon">
                            <a href="#write" data-toggle="tab" data-placement="bottom" title="افزودن صفحه جدید">
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
        <div class="tab-pane <? if ($edit_id == "") echo 'active'; else echo ''; ?> " id="tab1">
            <!-- #section:content/pages.table -->
            <div class="tt">
                <div class="row-fluid">
                    <div class="col-md-10">
                        <div class="dropdown pull-left yepco">
                            <!--a id="dLabel" role="button" data-toggle="dropdown" data-target="#" class="btn pull-left btn-primary btn-sm" href="/page.html">
									 امکانات <span class="caret"></span>
								</a>
								
								<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
									<!--li><a href="#">حذف فيزيکي</a></li>
									<li><a href="#">بازيابي</a></li>
									<li><a href="#" data-title="show_access" data-toggle="modal" data-target="#show_access" data-placement="top" rel="tooltip">دسترسي گروهي  </a>
									</li>
									<li class="dropdown-submenu"><a href="#" tabindex="-1" >انتقال به سايت  <i class="fa fa-caret-right" style="float: left;"></i></a>
										<ul class="dropdown-menu">
											<? create_sub_site_menu($site_id, $coms_conect, $_SESSION["manager_title_site"], 'cut_site') ?>
										</ul>	
									</li>
									<li class="dropdown-submenu"><a href="#" tabindex="-1" >کپي به سايت  <i class="fa fa-caret-right" style="float: left;"></i></a>
										<ul class="dropdown-menu">
											<? create_sub_site_menu($site_id, $coms_conect, $_SESSION["manager_title_site"], 'copy_site') ?>
										</ul>	
									</li>
									<li class="dropdown-submenu"><a href="#" tabindex="-1" >تغيير چيدمان  <i class="fa fa-caret-right" style="float: left;"></i></a>
										<ul class="dropdown-menu">
												<? $tmp = implode(",", $_SESSION["manager_group_permisson"]);
                            $query = "select id,name from new_blocks_sorts where user_id in($tmp) and type='p'";
                            $result = $coms_conect->query($query);
                            while ($RS1 = $result->fetch_assoc()) {
                                $id = $RS1["id"];
                                $name = $RS1["name"];
                                echo "<li ><a  class='change_chideman' id='$id' value='$id' href='#' >$name</a></li>";
                            }
                            ?>
										</ul>	
									</li>
								</ul-->

                        </div>
                        <? if ($_SESSION['can_delete'] == 1) { ?> 
                            <div class="pull-left btn-xs yepco" id="drop4">
                                <i type="button" class="navbar-toggle btn-danger" data-toggle="collapse"
                                   data-target="#bs-example-navbar-collapse-1"
                                   style="height: 34px;padding-top: 8px;border-radius: 0px;margin-left: 0px;margin-bottom: 0px;">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span data-toggle="modal" data-target="#delete" href="#" title="حذف"><i
                                                class="ace-icon fa fa-trash-o bigger-110"></i></span>
                                </i>
                                <div class="collapse navbar-collapse" id="nav-collapse"
                                     style="margin: 0px;padding: 0px;">
                                    <ul class="nav navbar-nav navbar-left">
                                        <a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete"
                                           data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
                                            حذف
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        <? } ?>
                        <? $manager_filter = injection_replace($_GET['manager_filter']);
                        if ($manager_filter == '')
                            $manager_filter = $_SESSION["manager_id"];
                        $q = injection_replace($_GET['q']);
                        $site_filter = injection_replace($_GET['site_filter']);
                        if ($lang_filter == "" && $_SESSION['lang_filter'] == '')
                            $lang_filter = $_SESSION['page_languege'];

                        ?>
                        <div class="form-group yepco">
                            <form action="" method="get" class="navbar-form navbar-left pull-right yepco" role="search">
                                <input type="text" value="<?= $q ?>" name="q" id="q" class="form-control search2"
                                       placeholder="جستجو">
                                <input type="hidden" name="yep" id="q" value="new_Pages">
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

                <table cellpadding="0" id="new_page_table" cellspacing="0" border="0"
                       class="datatable table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th class="center">
                            <label class="position-relative">
                                <input type="checkbox" class="conchkSelectAll"/>
                                <span class="lbl"></span>
                            </label></th>
                        <th>نام فایل</th>
                        <th>زبان</th>
                        <th>نام سایت</th>
                        <th>عنوان</th>
                        <th>فعال کردن نظر دهی</th>
                        <!--th>دسته</th-->
                        <th>بازدید</th>
                        <th>وضعیت</th>
                        <th>امکانات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <? $manager_user_permisson = implode(",", $_SESSION["manager_user_permisson"]);
                    $manager_title_site = "'" . implode("','", $_SESSION["manager_title_site"]) . "'";
                    $manager_title_lang = "'" . implode("','", $_SESSION["manager_title_lang"]) . "'";
                    if ($site_filter == -1) {
                        $str_site = " and a.site in ($manager_title_site)";
                        $site_page = "&site_filter=$site_filter";
                    } else if ($site_filter > "") {
                        $str_site = " and a.site='$site_filter'";
                        $site_page = "&site_filter=$site_filter";
                    }
                    if ($q > "") {
                        $str_q = "  and(a.title like '%$q%' or a.label like'%$q%' or a.name like '%$q%')";
                        $manager_q = "&q=$q";
                    }
                    if ($lang_filter == -1) {

                        $str_lang = " and a.la in ($manager_title_lang)";
                        $lang_page = "&lang_filter=$lang_filter";
                    } else if ($lang_filter > "") {
                        $str_lang = " and a.la='$lang_filter'";
                        $lang_page = "&lang_filter=$lang_filter";
                    }

                    if ($manager_filter > 0) {
                        $str_manager = "    a.user_id='$manager_filter'";
                        $manager_page = "&manager_filter=$manager_filter";
                    } else
                        $str_manager = "    a.user_id in ($manager_user_permisson)";


                    ####جستجوی پیشرفته
                    $search_status = injection_replace($_GET['search_status']);
                    if ($search_status > "") {
                        $str_status = " and a.status='$search_status'";
                        $status_page = "&status_filter=$search_status";
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

                                $str_field = " and (a.title like '%$search_txt%' or a.text like '%$search_txt%' or a.h1 like '%$search_txt%' or a.name like '%$search_txt%')";
                                break;
                            case 1:
                                $str_field = " and a.title like '%$search_txt%'";
                                break;
                            case 2:
                                $str_field = " and a.text like '%$search_txt%'";
                                break;
                            case 3:
                                $str_field = " and a.h1 like '%$search_txt%'";
                                break;
                            case 4:
                                $str_field = " and a.name like '%$search_txt%'";
                                break;
                        }
                    }
                    $cat_filter = injection_replace($_GET['cat_filter']);
                    if ($cat_filter > "") {
                        $str_cat = " and b.cat_id in($cat_filter)";
                        $cat_page = "&cat_filter=$cat_filter";
                    } else
                        $str_cat = " and b.cat_id in({$_SESSION['manager_page_cat_str']})";
                    ################################################################
                    //$query ="select count(*) as cnt from dynamic_news,combo,subsites where dynamic_news.site_id=subsites.site_id and subsites.la='$la' and dynamic_news.catid=combo.id and combo.cat='news' and dynamic_news.stat=1 and dynamic_news.la='$la' and combo.la='$la'  $skstr order by dynamic_news.id";
                    $sql1 = "SELECT count(id) as cnt from new_static_page a where 
							$str_manager $str_site $str_q  $str_lang $str_status $str_expire $str_field";
                    // echo $sql1;//exit;
                    $result = $coms_conect->query($sql1);
                    $RS = $result->fetch_assoc();
                    $page = injection_replace($_GET["page"]);
                    $a = pgsel((int)$page, $RS["cnt"], 10, 10, "$root/newcoms.php?yep=new_Pages$lang_page$site_page$manager_page$manager_q$status_page$expire_page$cat_page$field_page");
                    $from = $a[0];
                    $to = $a[1];
                    $pgsel = $a[2];
                    $sql12 = "SELECT a.la,a.have_commnet,a.la,a.site,a.id as ide,c.name as cat_id,a.mudoal_lock,a.name,a.title,a.view,a.status,a.id from new_static_page a ,new_modules_catogory b ,new_modules_cat c where 
							$str_manager and a.id=b.page_id and c.id=b.cat_id $str_site $str_q  $str_lang $str_status $str_expire $str_cat $str_field and   
							b.type=5  group by b.page_id order by a.id desc LIMIT $from,$to";
                    // echo $sql12;
                    ################################################################
                    $resultd1 = $coms_conect->query($sql12);
                    if ($page > 1) $k = ($page - 1) * 10; else $k = 0;
                    $k++;

                    while ($row = $resultd1->fetch_assoc()) {
                        $ide = $row['ide'];
                        $query = "select name as chideman from new_blocks_sorts a ,new_static_page_sort b where b.page_id=$ide and a.id=b.sort_id ";

                        $result = $coms_conect->query($query);
                        $RS1 = $result->fetch_assoc();

                        $chideman = $RS1["chideman"];

                        $id = $row['id'];
                        ?>
                        <tr>
                            <td class="center"><?= $k ?></td>
                            <td class="center" style="border-right: none;border-left: none;">
                                <label class="position-relative">
                                    <input id='<?= $id ?>' type="checkbox" class="conchkNumber"/>
                                    <span class="lbl"></span>
                                </label> 
                            </td>

                            <td><a href="<?= "{$row['name']}/{$row['la']}/" . insert_dash($row['title']) ?>"
                                   target="_blank"><?= $row['name'] ?></a></td>
                            <? if ($row['site'] == 'main') $domain = '/' . $domain_name; else $domain = '/' . $row['site'] . '.' . $domain_name; ?>
                            <td><?= $row['la'] ?></td>
                            <td><a href="/<?= $domain ?>" target="_blank"><?= $row['site'] ?></a></td>
                            <td><?= $row['title'] ?></td>
                            <td style="text-align:center;"><label>
                                    <input id="<?= $id ?>"
                                           name="switch-field-1" <? if ($row['have_commnet'] == 1) echo 'checked' ?>
                                           class="ace ace-switch ace-switch-5 active_can_comment" type="checkbox"/>
                                    <span title="فعال سازی نظر" class="lbl"></span>
                                </label></td>
                            <!--td><?= $row['cat_id'] ?></td-->
                            <td><?= $row['view'] ?></td>
                            <td><span class="status_news editable editable-click"
                                      data-pk="<?= $row["id"] ?>"><? if ($row["status"] == 1) {
                                        echo 'منتشر شده';
                                    } else {
                                        echo 'پیش نویس';
                                    } ?></span></td>

                            <td>
                                <!--a href="#" class="green" data-title="access" data-toggle="modal" data-target="#access" data-placement="top" rel="tooltip" style="font-size: 14px !important;">
                                    <i class="ace-icon fa fa-list bigger-120" title="دسترسی"></i>
                                </a-->

                                <? if ($_SESSION["can_edit"] == 1) { ?>
                                    <a id="<?= $id ?>" class="edit_menu blue"
                                       href="newcoms.php?yep=new_Pages&edit_id=<?= $id ?>"
                                       style="font-size: 15px !important;">
                                        <i class="ace-icon fa fa-edit bigger-120" title="ویرایش"></i>
                                    </a>
                                <? }
                                if ($_SESSION["can_delete"] == 1) { ?>
                                    <a href="#" id="<?= $id ?>" class="del_menu red" data-title="delete"
                                       data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"
                                       style="font-size: 15px !important;">
                                        <i class="ace-icon fa fa-trash-o bigger-120" title="حذف"></i>
                                    </a>
                                <? } ?>
                                <a target="_blank" href="/newcoms.php?yep=new_page_comments" class="del_menu green"
                                   style="font-size: 15px !important;">
                                    <?= mudoal_comment_count($row['id'], 5, $coms_conect) ?><i
                                            class="ace-icon fa fa-comments bigger-120" title="نظرات"></i>
                                </a>

                                <label>
                                    <input id="<?= $id ?>"
                                           name="switch-field-1" <? if ($row['mudoal_lock'] == 1) echo 'checked' ?>
                                           class="ace ace-switch ace-switch-6 conchkNumber_4" type="checkbox"/>
                                    <span title="فعال سازی" class="lbl"></span>
                                </label>
                            </td>
                        </tr>
                        <? $k++;
                    } ?>

                    </tbody>
                </table>

            </div>
            <!-- /section:content/pages.table -->
        </div>
        <?= $pgsel; ?>

        <fieldset>
            <div class="modal fade" id="show_contact" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header no-padding">
                            <div class="table-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="white">&times;</span>
                                </button>
                                   صفحه مرتبط
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
                                                    <span class="input-group-addon" style="padding: 0px;"><input
                                                                type="button" class="btn btn-primary" value="جستجو"
                                                                name="relate_btn" id="relate_btn"
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
                                    class="btn btn-primary conbtnGetAll"><span
                                        class="glyphicon glyphicon-ok-sign"></span> افزودن
                            </button>
                        </div>
                    </div>
                </div><!-- /.modal-dialog -->
            </div>
        </fieldset>
        <div class="tab-pane   <? if ($edit_id > "") echo 'active'; else echo ''; ?>" id="write">


            <form class="form-horizontal" id="new_pages" name="new_pages" action="" role="form" method="post"
                  enctype="multipart/form-data">
                <input type="hidden" id="edit_mode" name="edit_mode"
                       value="<? if ($edit_id > 0) echo $edit_id; else echo 0; ?>">
                <input type="hidden" id="array_value" name="array_value" value="0">
                <input type="hidden" id="check_value" name="check_value" value="0">
                <div id="id-message-new-navbar" class="message-navbar clearfix">
                    <? if ($_SESSION["can_add"] == 1) { ?>
                        <a type="button" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom"
                           title="" class="save submit2" data-original-title="ذخیره">
							<span class="flaticon-verified9">
							</span>
                        </a>
                    <? }
                    if ($_SESSION["can_draft"] == 1) { ?>
                        <a href="#" class="save-draft2" data-toggle="tooltip" data-placement="bottom" title=""
                           data-original-title="پیش نویس">
							<span class="flaticon-browser93">
							</span>
                        </a>
                    <? } ?>
                    <a href="newcoms.php?yep=new_pages" data-toggle="tooltip" data-placement="bottom" title=""
                       class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
                    </a>


                    <!--	<div class="message-bar">
                            <h2 style="color: #2a8bcb;">صفحه جدید / ویرایش</h2>
                        </div>-->

                    <div>

                    </div>
                </div>
                </br>

                <fieldset style="margin-top: -16px;">
                    <div class="tabbable tabs-left">
                        <ul class="nav nav-tabs" id="myTab3">
                            <li class="active">
                                <a data-toggle="tab" href="#home3">
                                    <p class="flaticon-file23"></p>
                                    اطلاعات پایه
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
                                    تصویر نوار ناوبری
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_gallery">
                                    <p class="flaticon-gallery7"></p>
                                    گالری تصاویر
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_video">
                                    <p class="flaticon-gallery7"></p>
                                    ویدئو
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_content">
                                    <p class="flaticon-gallery7"></p>
                                    محتوا
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
                                    تنظیمات اسلاید شو
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab_button">
                                    <p class="flaticon-copy23"></p>
                                    دکمه ها
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#relatednews">
                                    <p class="flaticon-copy23"></p>
                                    صفحه مرتبط
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home3" class="tab-pane in active">

                                <div class="row-fluid">
                                    <!-- #section:content/pages.base -->
                                    <div class="col-md-12">
                                        <div class="row-fluid">
                                            <div class="col-md-9">

                                                <div class="form-group">
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label">عنوان*</label>
                                                        <input name="title" value="<?= $edit_title ?>" id="title"
                                                               class="form-control">
                                                    </div>


                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-md-12">
                                                        <label class="control-label">URL*</label>
                                                        <input name="link_url" value="<?= $link_url ?>" id="link_url"
                                                               class="form-control">
                                                    </div>
                                                </div>


                                                <h4>تصوير</h4>
                                                <div class="form-group" id="oracup">
                                                    <label class="control-label col-md-12">
                                                        <input type="radio"
                                                               name="upload_type" <? if ($upload_type == 1 or $upload_type == "")
                                                            echo 'checked' ?> id="upload_type" value="1">
                                                        الصاق از فایل کامپیوتر
                                                    </label>
                                                    <div class="ui-sortable red box" id="upload_type1"
                                                         style="float:right; <? if ($upload_type == 1 or $upload_type == "") echo 'display:block'; else echo 'display:none' ?>">
                                                        <div id="page_image_avatar" orakuploader="on"></div>
                                                        <? if ($edit_id > "" && $upload_type == 1) {
                                                            $query = "select adress from new_file_path where id='$edit_id' and type=5 and name='page_image'";
                                                            $result = $coms_conect->query($query);
                                                            $i = 1;
                                                            $str = '';
                                                            $articles_list = '';

                                                            $pic_str = '';
                                                            $RS1 = $result->fetch_assoc();
                                                            $temp = explode("/files/", $RS1['adress']);
                                                            $page_image_avatar = trim($temp[1]);
//                                                        $page_image_avatar = trim($page_image_avatar, " ");
                                                            $div_id = explode(".", $page_image_avatar);
//                                                        echo 'ww=';print_r($div_id);
                                                            $pic_str .= "<div class='multibox file' style='cursor: move;' id='$page_image_avatar' filename='$page_image_avatar'>";
                                                            $pic_str .= "<div class='picture_delete'  ></div>";
                                                            $pic_str .= "<img src='new_gallery/files/$page_image_avatar' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                            $pic_str .= "<input type='hidden' value='$page_image_avatar' name='page_image_avatar[]'>";
                                                            $pic_str .= "</div>";
//                                                       $pic_str=explode(" ",$pic_str);echo 'aa='.$page_image_avatar;
                                                        } ?>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function () {


                                                            $('#page_image_avatar').orakuploader({
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
                                                            $('#page_image_avatar').html("<?=$pic_str?>");
                                                        });
                                                    </script>
                                                </div>

                                                <label class="control-label col-md-12">
                                                    <input type="radio"
                                                           name="upload_type" <? if ($upload_type == 2) echo 'checked'; ?>
                                                           id="radios-1" value="2">
                                                    انتخاب از رسانه های قبلی
                                                </label>

                                                <div class="form-group green box" id="upload_type2"
                                                     style="<? if ($upload_type == 2) echo 'display:block'; else echo 'display:none' ?>">
                                                    <div class="form-group col-md-6">
                                                        <div class="imgdemo"><img id="aks_page_thumb"
                                                                                  src="/yep_theme/default/rtl/images/pic.png">
                                                        </div>
                                                        <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                                        <div style="display: inline-flex;">
                                                            <script>
                                                                setInterval(check_address, 2000)

                                                                function check_address() {
                                                                    var aks_page = $('#page_imag').val();
                                                                    if (aks_page != "") {
                                                                        $('#aks_page_thumb').attr("src", aks_page);
                                                                    }
                                                                }
                                                            </script>
                                                            <a href="/filemanager/dialog.php?type=2&amp;field_id=page_imag"
                                                               class="btn btn-success iframe-btn"
                                                               style="padding: 5px 5px 2px 5px;vertical-align: bottom;"><span
                                                                        class="addimg flaticon-add139"></span></a>
                                                            <input type="text" name="page_image"
                                                                   value="<? if ($upload_type == 2) echo $page_image; ?>"
                                                                   id="page_imag" class="imginput">
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>

                                                    $(document).ready(function () {
                                                        //var utn =<?//=$upload_type_nav?>//;
                                                        //// alert(utn);
                                                        //if (utn == 1) {
                                                        //    $("#nav_pic_div").show();
                                                        //    $("#upload_type1_nav").show();
                                                        //    $("#upload_type1_nav").is(':selected');
                                                        //    // alert("utn="+utn);
                                                        //    $("#nav_picnet_div").hide();
                                                        //    $("#source_pic").val(1);
                                                        //}


                                                        $('input[name$="upload_type"]').click(function () {
                                                            if ($(this).attr("value") == "1") {
                                                                $(".box").not(".red").hide();
                                                                $(".red").show();
                                                            }
                                                            if ($(this).attr("value") == "2") {
                                                                $(".box").not(".green_nav").hide();
                                                                $(".green").show();
                                                            }
                                                        });
                                                    });
                                                    // $("#source_pic").change(function () {
                                                    //     if ($(this).val() == 1) {
                                                    //         $("#nav_pic_div").show();
                                                    //         // $("#navication_pic").val('');
                                                    //     }
                                                    //     else {
                                                    //         $("#nav_pic_div").hide();
                                                    //         // $("#navication_pic").val('');
                                                    //         // $('#aks_thumb').attr("src", '');
                                                    //     }
                                                    // });
                                                </script>
                                                <!--                       end picpic                     -->


                                                <div class="form-group">
                                                    <div class="form-group col-sm-12">
                                                        <label class="control-label">خلاصه *</label>
                                                        <textarea id="mini_text" name="mini_text" class="form-control"
                                                                  rows="3"
                                                                  data-fv-notempty="true"
                                                                  data-fv-notempty-message="پر کردن اين فيلد الزامي است"/><?= $mini_text ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-group col-sm-12">
                                                        <textarea id="text" name="text" class="form-control"
                                                                  rows="3"><?= $edit_text ?></textarea>
                                                        <!--<script>CKEDITOR.replace( 'text' );</script>-->
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
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">پیشوند صفحه*</label>
                                                    <input value="<?= $edit_name ?>" name="name" id="name"
                                                           class="form-control"
                                                           placeholder="لطفا با املای انگلیسی وارد نمایید">
                                                </div>
                                                <div class="form-group" id="show_sites">
                                                    <label class="control-label" for="group_name">سایت*</label>
                                                    <? //=$manage_site_id;exit;?>
                                                    <? create_sub_site_title($site, $coms_conect, $_SESSION["manager_title_site"]); ?>
                                                </div>

                                                <div id="show_check_box" class="form-group "></div>
                                                <div class="form-group">

                                                    <label class="control-label" for="group_name">زبان</label>
                                                    <? create_lang_title($edit_la, $coms_conect, $_SESSION["manager_title_lang"]); ?>

                                                </div>
                                                <!--div class="form-group">
															 <label class="control-label">چیدمان</label>
																 <select name="chideman" id='chideman' class="form-control" rows="3">
																	 <? $tmp = implode(",", $_SESSION["manager_group_permisson"]);
                                                echo "<option value='0'>انتخاب کنید</option>";
                                                $query = "select id,name from new_blocks_sorts where user_id in($tmp) and type='p'";
                                                $result = $coms_conect->query($query);
                                                $i = 0;

                                                while ($RS1 = mysql_fetch_array($result)) {
                                                    $str = "";
                                                    $id = $RS1["id"];
                                                    $name = $RS1["name"];
                                                    if ($edit_chideman == $id)
                                                        $str = "selected";
                                                    echo "<option $str value='$id'>$name</option>";

                                                }
                                                ?>
																 </select>
																 <? //=$query?>
														</div-->

                                                <div class="form-group">
                                                    <label class="control-label">وضعیت</label>
                                                    <select name="status" id='status' class="form-control" rows="3">
                                                        <option <? if ($edit_status == 1) echo 'selected' ?> value="1">
                                                            انتشار
                                                        </option>
                                                        <option <? if ($edit_status == 0) echo 'selected' ?> value="0">
                                                            پیش نویس
                                                        </option>
                                                        <!--option <? if ($edit_status == 0) echo 'selected' ?> value="0">غیر فعال</option-->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">تاريخ انتشار</label>

                                                    <input id="publish_date"
                                                           value="<? if ($publish_date == "") echo miladitojalaliuser(date('Y-m-d')); else echo $publish_date ?>"
                                                           name="publish_date" type="text"
                                                           class="input-sm form-control"/>

                                                </div>


                                                <div class="form-group">

                                                    <label><input <? if ($have_commnet == 1) echo 'checked' ?>
                                                                name="have_commnet" value="1" id="have_commnet"
                                                                type="checkbox">
                                                    </label>
                                                    <label class="control-label">نمایش نظر</label>
                                                </div>
                                                <div class="form-group">

                                                    <label><input <? if ($edit_mudoal_lock == 1) echo 'checked' ?>
                                                                name="mudoal_lock" value="1" id="mudoal_lock"
                                                                type="checkbox">
                                                    </label>
                                                    <label class="control-label">ویژه اعضا</label>
                                                </div>

                                                <? if ($edit_la == '') $la = 'fa'; else $la = $edit_la;

                                                if ($edit_id > "") {
                                                    $query = "select cat_id from new_modules_catogory where page_id='$edit_id'";
                                                    $result = $coms_conect->query($query);
                                                    while ($RS1 = $result->fetch_assoc()) {
                                                        $arr[] = $RS1["cat_id"];
                                                    }
                                                } else
                                                    $arr[] = "";
                                                ?>


                                            </div>

                                        </div>
                                    </div>
                                    <!-- /section:content/pages.base -->
                                </div>

                            </div>
                            <? $type = 5;
                            include 'newcoms/main/new_modual_catogory.php4'; ?>
                            <? include 'newcoms/main/new_nav_pic.php4'; ?>
                            <? $type = 5;
                            include 'newcoms/main/new_modual_seo.php4'; ?>

                            <? include 'newcoms/main/new_modual_slide.php4'; ?>


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

                            <div id="tab_gallery" class="tab-pane fade">
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
                                                                $query = "SELECT * FROM new_file_path where id='$edit_id' && name='page_gallery'";

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
                                                                    url: 'New_ajax_pages.php',
                                                                    data: "action=delete_ajax_pagetpic&id=" + $(this).attr('data-id') + "&value=" + $(this).attr('data-addres'),
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
                                                    <div id="page_image_album" orakuploader="on"></div>
                                                    <? if ($edit_id > "" && $album_type == 1) {
                                                        $query = "select adress from new_file_path where id='$edit_id' and type=5 and name='page_gallery'";
                                                        $result = $coms_conect->query($query);
                                                        $i = 1;
                                                        $str = '';
                                                        $articles_list = '';
                                                        $pic_str = '';
                                                        while ($RS1 = $result->fetch_assoc()) {
                                                            $page_image_album = trim($RS1['adress']);
                                                            $temp = explode("/files/", $RS1['adress']);
                                                            $page_image_album = $temp[1];
                                                            $div_id = explode(".", $page_image_album);
                                                            $pic_str .= "<div class='multibox file' style='cursor: move;' id='$page_image_album' filename='$page_image_album'>";
                                                            $pic_str .= "<div class='picture_delete'  ></div>";
                                                            $pic_str .= "<img src='/new_gallery/files/tn/$page_image_album' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                                                            $pic_str .= "<input type='hidden' value='$page_image_album' name='page_image_album[]' />";
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
                                    $('#page_image_album').orakuploader({
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

                                    $('#page_image_album').html("<?=$pic_str?>");
                                });
                            </script>
                            <!--                    //----------------------------------------------end gallery pis------------------------------------------------------                -->

                            <!---------------------------start tab content------------------>
                            <div id="tab_content" class="bhoechie-tab-content H2 ">
                                <center>
                                    <? $boxFive = get_tem_result_page($site, $la, "content", $edit_id, $coms_conect);
//                                    print_r($boxFive);exit;
                                    ?>
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                            <div class="col-md-6 input-group">
                                                <label class="col-md-2 control-label" for="family">نمایش </label>
                                                <input value="1"
                                                       type="checkbox" <? if ($boxFive['link'] == 1) echo 'checked' ?>
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


                                    <!------------------------------------------------------------ START pic-->
                                    <div class="form-group">

                                        <div class="form-group col-md-12">
                                            <div class="col-md-12 input-group">
                                                <label class="col-md-2 control-label" for="family">عکس </label>
                                                <div class="col-md-5 input-group">
                                                    <input type="text"
                                                           id="box1_header_link121"
                                                           value="<?= $boxFive['pic_adress'] ?>"
                                                           class="form-control imginput"
                                                           placeholder=" تصویر"
                                                           name="box1_header_link121"
                                                           style="direction: ltr;">
                                                    <span class="input-group-addon"
                                                          style="padding: 0px;"><a
                                                                href="/filemanager/dialog.php?type=1&amp;field_id=box1_header_link121"
                                                                class="btn btn-success iframe-btn"
                                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                                    <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                                          style="padding: 0px;">
                                                                                <div  id="box1_header_link_avatar_orak" orakuploader="on"></div>
                                                                            </span>
                                                </div>
                                                <div class="ui-sortable red box" id="upload_type_box1_header_link"
                                                     style="float:right;">
                                                </div>
                                                <div class="col-md-1 input-group" id="image_show_box1_header_link">
<!--                                                    --><?// $box1_header_link = get_tem_result($site, $la, "box1_header", $tem, $coms_conect);?>
                                                    <a href="" class=" without-caption ddddd" >
                                                        <img width="33" height="33" class="H_cursor_zoom ddddd" src="<?= $boxFive['pic_adress'] ?>" alt="<?= $boxFive['pic_adress'] ?>">
                                                    </a>

                                                </div>

                                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('#box1_header_link_avatar_orak').orakuploader({
                                                            orakuploader_path: 'new_orakuploader/',
                                                            orakuploader_main_path: 'new_gallery/files',
                                                            orakuploader_thumbnail_path: 'new_gallery/files/tn',
                                                            orakuploader_use_main: false,
                                                            //orakuploader_use_sortable : true,
                                                            orakuploader_use_dragndrop: true,
                                                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                            orakuploader_add_label: '',
                                                            //orakuploader_resize_to: <?//=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>//,
                                                            orakuploader_thumbnail_size: 400,
                                                            orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                            orakuploader_maximum_uploads: 1,
                                                        });

                                                        $('#box1_header_link_avatar_orak').html("<?=$pic_str_content?>");
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <!-------------------------------------------------------- END pic-->


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
                                    <? $ValSelectActive_boxFive = get_tem_result_page($site, $la, "content", $edit_id, $coms_conect);?>
                                    <div class="col-md-6 input-group " style="float: none;">
                                        <select id="select_type_boxFive"
                                                data-selectid=""
                                                class="form-control H_select_show_boxFive"
                                                name="select_type_boxFive">

                                            <option  <?if ($ValSelectActive_boxFive["name"]==1){echo 'selected';}?>  value='1'>انتخاب از ماژول</option>
                                            <option   <?if ($ValSelectActive_boxFive["name"]==2){echo 'selected';}?> value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی</option>
                                            <option <?if ($ValSelectActive_boxFive["name"]==3){echo 'selected';}?> value='3'> اختصاصی</option>
                                        </select>

                                    </div>
                                    <br>
                                    <div>
                                        <input name="ValSelectActive_boxFive_title" type="hidden" value="<?= $ValSelectActive_boxFive["name"] ?>">

                                        <div  class="tab-pane opt_boxFive boxFive_option1">
                                            <div class="page-content-area">
                                                <div class="page-body" style="margin-top: 25px;">
                                                    <fieldset>
                                                        <div class="col-md-12">
                                                            <?
                                                            $count_first_choice_boxFive = get_result("select count(id) from new_static_page_setting where la='$la' and site='$site' and id_page='$edit_id' and input_type like 'content%' ", $coms_conect);
                                                            for ($j = 1; $j <= $count_first_choice_boxFive; $j++) {
                                                                $first_choice_boxFive = get_tem_result_page_plus($site, $la,  "first_choice_boxFive$j", $edit_id, $coms_conect);
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
                                                                                            url: 'New_ajax_pages.php',
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
                                                                        url: 'New_ajax_pages.php',
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
                                                            <? $count_second_choice_boxFive = get_result("select count(id) from new_static_page_setting where la='$la' and site='$site' and id_page='$edit_id' and input_type like 'content' ", $coms_conect);
//                                                            echo $count_second_choice_boxFive;exit;
                                                            for ($j = 1; $j <= $count_second_choice_boxFive; $j++) {
                                                                $second_choice_boxFive = get_tem_result_page_plus($site, $la, "second_choice_boxFive$j", $edit_id, $coms_conect);
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
                                                                                            url: 'New_ajax_pages.php',
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
                                                                                            url: 'New_ajax_pages.php',
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
                                                                        url: 'New_ajax_pages.php',
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
                                                                        url: 'New_ajax_pages.php',
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
                                                                        url: 'New_ajax_pages.php',
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
                                                                //});
                                                                //
                                                                //
                                                                //$(document).ready(function () {
                                                                //    var i = <?//=$k?>//;
                                                                //
                                                                //    $('#add_Jarahan_header_btns').on("click", function () {
                                                                //        var someText = '<div id="ads_Jarahan_header_btns' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_Jarahan_header_btns" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">دکمه و لینک' + i + '</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="Jarahan_header_btns_title' + i + '" value="" class="form-control" placeholder=" عنوان" name="Jarahan_header_btns_title' + i + '" ></div><div class="col-md-6 input-group"><input type="text" id="Jarahan_header_btns_text' + i + '" value="" class="form-control" placeholder="لینک" name="Jarahan_header_btns_text' + i + '" ></div></div></div></div>';
                                                                //        $(this).before(someText);
                                                                //        $('#ads_Jarahan_header_btns' + i + '').fadeTo('slow', 0.3, function () {
                                                                //            $(this).css('background', '');
                                                                //        }).fadeTo('slow', 1);
                                                                //        $('#Jarahan_header_btns_count').val(i);
                                                                //        i++;
                                                                //    });
                                                                    $(document).on('click', '.del-ads_Jarahan_header_btns', function () {
                                                                        var id = '';
                                                                        id = $(this).attr('id');
                                                                        $('#div_mother_second_choicedel_second_choice_boxFive' + id).remove();
                                                                        var new_number = 1;$('.Jarahan_header_btns .seyed').each(function() {var x = "div_mother_second_choicedel_second_choice_boxFive" + new_number;$(this).attr("id",x);new_number++;});
                                                                        var new_number1 = 1;$('.Jarahan_header_btns .del-ads_Jarahan_header_btns').each(function() {$(this).attr("id",new_number1);new_number1++;});

                                                                        var new_number2 = 1;$(".Jarahan_header_btns input.Jarahan_header_btns_title").each(function() {var x = "Jarahan_header_btns_title" + new_number2;$(this).attr("name",x);new_number2++;});
                                                                        var new_number3 = 1;$(".Jarahan_header_btns input.Jarahan_header_btns_text").each(function() {var x = "Jarahan_header_btns_text" + new_number3;$(this).attr("name",x);new_number3++;});

                                                                        var k = $('.Jarahan_header_btns .seyed').length;
                                                                        $('#Jarahan_header_btns_count').val(k);
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

                                                            $count_third_choice_boxFive = get_result("select count(id) from new_static_page_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_boxFive%' ", $coms_conect);

                                                            for ($x = 1; $x <= $count_third_choice_boxFive; $x++) {
                                                                $third_choice_boxFive = get_tem_result_page_plus($site, $la, "third_choice_boxFive$x", $edit_id, $coms_conect);

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

<!--                                    <div  class="tab-pane">-->
<!--                                        <div class="page-content-area" >-->
<!--                                            <div class="page-body" style="margin-top: 25px;">-->
<!--                                                <fieldset>-->
<!--                                                    <div class="col-md-12">-->
<!---->
<!--                                                        <div  class="seyed"-->
<!--                                                              style="opacity: 1;">-->
<!--                                                            <div class="form-group">-->
<!---->
<!--                                                                <label class="col-md-3 control-label" for="family">عنوان و لینک دکمه</label>-->
<!--                                                                <div class="form-group col-md-9">-->
<!---->
<!--                                                                    <div class="col-md-6 input-group">-->
<!--                                                                        <input type="text"-->
<!--                                                                               id="boxFive_pic"-->
<!--                                                                               value="--><?//= $boxFive["pic"] ?><!--"-->
<!--                                                                               class="form-control"-->
<!--                                                                               placeholder="عنوان دکمه"-->
<!--                                                                               name="boxFive_pic">-->
<!--                                                                    </div>-->
<!--                                                                    <div class="col-md-6 input-group">-->
<!--                                                                        <input type="text"-->
<!--                                                                               id="boxFive_link"-->
<!--                                                                               value="--><?//= $boxFive["link"] ?><!--"-->
<!--                                                                               class="form-control"-->
<!--                                                                               placeholder="لینک دکمه"-->
<!--                                                                               name="boxFive_link">-->
<!--                                                                    </div>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!---->
<!--                                                    </div>-->
<!---->
<!--                                                </fieldset>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->

                                </center>
                            </div>
                            <!--                    //----------------------------------------------end tab content------------------------------------------------------                -->
                            <!--                    //----------------------------------------------start  tab button------------------------------------------------------                -->
                            <div id="tab_button" class="tab-pane fade">
                                <div class="page-content-area">
                                    <div class="page-body" style="margin-top: 25px;">
                                        <fieldset>
                                            <div class="bhoechie-tab-content H2">
                                                <center>
                                                    <? $box4_header = get_tem_result($site, $la, "box4_header", $tem, $coms_conect); ?>

                                                    <div class="form-group">
                                                        <div class="form-group col-md-12">
                                                            <div class="col-md-6 input-group">
                                                                <label class="col-md-2 control-label"
                                                                       for="family">نمایش </label>
                                                                <input value="1"
                                                                       type="checkbox" <? if ($box4_header['pic_adress'] == 1) echo 'checked' ?>
                                                                       class="ace ace-switch ace-switch-6 "
                                                                       name="box4_header_pic_adress"
                                                                       style="direction: rtl;"><span class="lbl"></span>
                                                            </div>
                                                        </div>
                                                    </div>
<!--                                                    <div class="form-group">-->
<!--                                                        <label class="col-md-3 control-label" for="family">عنوان دکمه-->
<!--                                                            اول </label>-->
<!--                                                        <div class="form-group col-md-9">-->
<!--                                                            <div class="col-md-12 input-group">-->
<!--                                                                <input type="text" class="form-control"-->
<!--                                                                       name="box4_header_title"-->
<!--                                                                       value="--><?//= $box4_header['title'] ?><!--"-->
<!--                                                                       style="direction: rtl;">-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="form-group">-->
<!--                                                        <label class="col-md-3 control-label" for="family">عنوان دکمه-->
<!--                                                            دوم </label>-->
<!--                                                        <div class="form-group col-md-9">-->
<!--                                                            <div class="col-md-12 input-group">-->
<!--                                                                <input type="text" class="form-control"-->
<!--                                                                       name="box4_header_pic"-->
<!--                                                                       value="--><?//= $box4_header['pic'] ?><!--"-->
<!--                                                                       style="direction: rtl;">-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!--                                                    </div>-->

<!--                                                    <hr>-->
<!--                                                    <h5 class="area"-->
<!--                                                        style="text-align: center;color: red; font-family: IRANSans">-->
<!--                                                        «تعداد مورد نیاز:2»</h5><br>-->
                                                    <?
                                                    $count1_first_choice_box4 = get_result("select count(id) from new_static_page_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'first_choice_box4%' ", $coms_conect);
                                                    $count1_second_choice_box4 = get_result("select count(id) from new_static_page_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'second_choice_box4%' ", $coms_conect);
                                                    $count1_third_choice_box4 = get_result("select count(id) from new_static_page_setting where la='$la' and site='$site' and tem_name='$tem' and name like 'third_choice_box4%' ", $coms_conect);
                                                    ?>

<!--                                                    <div class="col-md-6 input-group " style="float: none;">-->
<!--                                                        <select id="select_type_box4"-->
<!--                                                                data-selectid=""-->
<!--                                                                class="form-control H_select_show_box4"-->
<!--                                                                name="select_type_box4">-->
<!---->
<!--                                                            <option --><?// if ($count1_first_choice_box4 > 0) echo 'selected'; ?>
<!--                                                                    value='1'>انتخاب از ماژول-->
<!--                                                            </option>-->
<!--                                                            <option --><?// if ($count1_second_choice_box4 > 0) echo 'selected'; ?>
<!--                                                                    value='2'>انتخاب از ماژول به همراه دسته بندی انتخابی-->
<!--                                                            </option>-->
<!--                                                            <option --><?// if ($count1_third_choice_box4 > 0) echo 'selected'; ?>
<!--                                                                    value='3'>عنوان ولینک دستی به همراه عکس-->
<!--                                                            </option>-->
<!--                                                        </select>-->
<!---->
<!--                                                    </div>-->

                                                    <script>

                                                        $(document).ready(function () {
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: 'New_ajax_pages.php',
                                                                data: "action=show_content_box4&value=" + $("#select_type_box4").val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + '<?=$tem?>',
                                                                success: function (result) {
                                                                    $('#show_content_box4').html(result);
                                                                }
                                                            });
                                                        });

                                                        $(".H_select_show_box4").change(function () {
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: 'New_ajax_pages.php',
                                                                data: "action=show_content_box4&value=" + $(this).val() + "&field_nmae=" + '<?=$la?>' + "&secend_value=" + '<?=$site?>' + "&tem=" + '<?=$tem?>',
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
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!--                    //----------------------------------------------end tab button------------------------------------------------------                -->


                            <div id="relatednews" class="tab-pane fade">
                                <!-- #section:content/pages.relate -->
                                <div class="uploadbts" style="margin-top: 25px;">
                                    <a data-toggle="modal" data-target="#show_contact" data-placement="top"
                                       rel="tooltip">
                                        <button><span class="flaticon-add139"></span><span>افزودن صفحه</span></button>
                                    </a>

                                </div>
                                <!-- /section:content/pages.relate -->
                                <? if ($edit_id > "") { ?>
                                    <script>
                                        $(function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: 'New_ajax_pages.php',
                                                data: "action=show_related_page_show&id=<?=$totla_related?>",
                                                success: function (result) {
                                                    $("#relatednews").html(result);
                                                }
                                            });
                                        });
                                    </script>
                                <? } ?>
                            </div>

                        </div>
                    </div>

                    </br>
                    <!--div class="panel-footer">
                        <button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-file-text bigger-110"></i>پیش نویس</button>
                        <button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>انتشار</button>
                    </div-->
                </fieldset>
            </form>
        </div>

        <div class="tab-pane " id="write2">

            <form class="form-horizontal" id="new_pages2" name="new_pages2" action="" role="form" method="post"
                  enctype="multipart/form-data">
                <div id="id-message-new-navbar" class="message-navbar clearfix">
                    <div class="message-bar">
                        <h2 style="color: #2a8bcb;">جایگزینی واژه</h2>
                    </div>

                    <div>
                        <div class="messagebar-item-left">
                            <a href="#tab1" data-toggle="tab" class="active">
                                <i class="ace-icon fa fa-arrow-right bigger-110 middle blue"></i>
                                <b class="middle bigger-110">برگشت</b>
                            </a>
                        </div>

                        <div class="messagebar-item-right">
								<span class="inline btn-send-message">
									<button type="submit" class="btn btn-sm btn-primary no-border btn-white btn-round">
										<i class="ace-icon fa fa-check"></i>
										<span class="bigger-110">ذخیره</span>
									</button>
								</span>
                        </div>
                    </div>
                </div>
                </br>

                <fieldset>
                    <div class="panel-body">
                        <div class="row-fluid">
                            <div class="col-md-12">
                                <div class="row-fluid">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label style="text-align: -webkit-center;" class="col-md-3 control-label"
                                                   for="group_name">عبارت اولیه</label>
                                            <div class="form-group col-md-9">
                                                <textarea name="ebarat" id="ebarat" class="form-control"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label style="text-align: -webkit-center;" class="col-md-3 control-label"
                                                   for="family">جایگزینی با</label>
                                            <div class="form-group col-md-9">
                                                <textarea name="jabjayi" id="jabjayi" class="form-control"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group col-md-3"></div>
                                            <div class="checkbox">
                                                <label style="margin-right: 4%;">
                                                    <p><input name="show_callme1" id="show_callme1" type="checkbox"
                                                              value="1">صفحات استاتیک</p>
                                                    <p><input name="show_callme2" id="show_callme2" type="checkbox"
                                                              value="1">بلوک ها</p>
                                                    <p><input name="show_callme3" id="show_callme3" type="checkbox"
                                                              value="1">منو</p>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="alert alert-warning">
                                            <div class="panel-body">
                                                هشدار:جابجایی متون ممکن است باعث خرابی حجم وسیعی از اطلاعات شود.
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row-fluid">
                            <label class="col-sm-2 control-label"
                                   style="text-align: -webkit-center;padding-left: 3%;margin-left: -3%;">صفحات
                                انتخابی</label>
                            <div class="form-group col-md-10">
                                <div class="input-group">
                                    <input type="text" name="safahat" autocomplete="off" autocorrect="off"
                                           autocapitalize="off" spellcheck="false" class="select2-input select2-default"
                                           placeholder="صفحه دلخواه خود را انتخاب کنید" id="e9" style="width: 100%; ">
                                    <span class="input-group-addon success" href="#" data-title="show_table"
                                          data-toggle="modal" data-target="#show_table" data-placement="top"
                                          rel="tooltip"
                                          style="color: rgb(255, 255, 255);background-color: rgb(92, 184, 92);border-color: rgb(76, 174, 76);"><span
                                                class="glyphicon glyphicon-plus"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary"><i class="ace-icon fa fa-check bigger-110"></i>ذخیره
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>

    </div>
</div>
<?
$_SESSION["del_item"] = 'del_page';
$_SESSION["edit_item"] = 'change_lock_page';
$_SESSION["change_chideman"] = 'change_chideman';

$_SESSION["copy_site"] = 'copy_site_page';
$_SESSION["cut_site"] = 'cut_site_page';
?>
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

    $(document).ready(function () {
        $("#newpag").click(function () {
            $("#newpag").hide();
            $("#switchword").hide();
        });
        $("#btnback").click(function () {
            $("#newpag").show();
            $("#switchword").show();
        });

    });


    $("#relate_btn").click(function () {
        $("#show_waiting_search").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax_pages.php',
            data: "action=show_related_page&id=" + $("#related_search").val() + "&value=" + $("#manage_lang").val(),
            success: function (result) {
                $("#show_waiting_search").hide();
                $("#show_related").html(result);
            }
        });
    });


    $(document).on('click', '#btn_ok_news00', function (event) {
        if ($('.conchkNumber_news:checked').length) {
            $("#show_waiting_related").show();
            var chkId = '';
            $('.conchkNumber_news:checked').each(function () {
                chkId += $(this).val() + ",";
            });
            chkId = chkId.slice(0, -1);
            $.ajax({
                type: 'POST',
                url: 'New_ajax_pages.php',
                data: "action=show_related_page_show&id=" + chkId,
                success: function (result) {
                    $("#show_waiting_related").hide();
                    $("#relatednews").html(result);
                }
            });
        }
        else {
            alert('موردي انتخاب نشده است');
        }
    });

    $(document).on('click', '.del_reated_news', function (event) {
        $("#btn_del_related_news").val($(this).attr('id'));
    });


    $(document).on('click', '#dropdelete', function (event) {
        $("#btn_del_related_news").val($(this).val());

    });

    $(document).on('click', '#btn_del_related_news', function () {
        $.ajax({
            type: 'POST',
            url: 'New_ajax_pages.php',
            data: "action=del_page_reated_news&id=" + $(this).val() + "&value=" + $("#edit_mode").val() + "&field_nmae=" + $("#totla_related").val(),
            success: function (result) {
                $("#relatednews").html(result);
                $("#btn_del_related_news").val('');
            }
        });
    });
</script>
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>
<script src="ajax_js/page.js"></script>
<script type="text/javascript">
    $("#manage_lang00").val('1');
    $(function () {
        $.fn.editable.defaults.mode = 'inline';
        $('.status_news').editable({
            type: 'select',
            name: 'change_status_page',
            url: '/New_ajax_pages.php',
            source: "{1: 'منتشر شده',0: 'پيش نويس'}",
            ajaxOptions: {
                type: 'get',
            },

            error: function (response) {
                alert(response);
            }
        });
    });
</script>
<script>


    $('.iframe-btn').fancybox({
        'width': 880,
        'height': 570,
        'type': 'iframe',
        'autoScale': false
    });
    $("#start2").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });
    $("#end2").datepicker({
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
    $("#publish_search").datepicker({
        changeMonth: true,
        changeYear: true,
        isRTL: true,
        dateFormat: "yy/mm/dd"
    });
</script>
<script>
    $(".save-draft2").click(function () {
        $("#status").val("0");
        $("#new_pages").submit();
    });
    $(".submit2").click(function () {
        $("#status").val("1");
        $("#new_pages").submit();
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
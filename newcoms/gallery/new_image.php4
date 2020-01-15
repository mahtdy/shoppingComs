
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<link rel="stylesheet" href="/yep_theme/css/imgtorgb.css" />
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/daterangepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/date-time/daterangepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
	<link rel="stylesheet" href="/new_plugin/video-js/css/video-js.min.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<!----ajax uploder-->
<link type="text/css" href=" /new_orakuploader/orakuploader.css" rel="stylesheet"/>

<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/colorbox.css" />
<!---->
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<?
$lang_filter = injection_replace($_GET['lang_filter']);
$query1 = "select align  from new_language where title='$lang_filter'";
$result1 = $coms_conect->query($query1);
$RS11 = $result1->fetch_assoc();

//print_r($_POST);
// arezo code---------setting id of edit_id-when you go with method get.if your id is not true, you left out.
if (isset($_GET['edit_id']))
    $edit_id = injection_replace($_GET['edit_id']);

if ($RS11['align'] == 0) $dir = 'rtl'; else $dir = 'ltr';

##################چک کردن زبان#######################
$la = injection_replace($_POST['manage_lang_filter']);

if (($lang_filter > "" && !in_array($lang_filter, $_SESSION["manager_title_lang"])) || ($la > "" && !in_array($la, $_SESSION["manager_title_lang"]))) {
    //echo $_POST['manage_lang_filter'].'<br>'.$lang_filter.'<br>';print_r($_SESSION["manager_title_lang"]);exit;
    header('Location: new_manager_signout.php');
    exit;
}
if ($lang_filter == '') $lang_filter = 'fa';
#########################چک کردن زیر سایت#############
$site_id = injection_replace($_POST['manage_site_filter']);
$site_filter = injection_replace($_GET['site_filter']);
if (($site_id > "" && !in_array($site_id, $_SESSION["manager_title_site"])) || ($site_filter > "" && !in_array($site_filter, $_SESSION["manager_title_site"]))) {
    header('Location: new_manager_signout.php');
    exit;
}
if ($site_filter == '') $site_filter = 'main';


//$onvan = injection_replace($_POST['onvan']);
//$type = injection_replace($_POST['type']);
//$menu_id = injection_replace($_POST['menu_id']);
//$menu_type = injection_replace($_POST['menu_type']);
//$menu_mode = injection_replace($_GET['menu_mode']);
//$edit_mode = injection_replace($_POST['edit_mode']);
//$link = injection_replace($_POST['link']);
//$show_open = injection_replace($_POST['show_open']);
//$choose_kesho_or_url = injection_replace($_POST['choose_kesho_or_url']); //this code for choosing
//$header_icon_link = injection_replace($_POST['header_icon_link']);//for saving name of ax icon
//$header_icon = injection_replace($_POST['header_icon']);//for saving class of ax icon
//$link_menu = injection_replace($_POST['link_menu']);//for saving onvan ax of font icon  i
//$pic_link_menu = injection_replace($_POST['pic_link_menu']);//for saving link ax of font icon
//$onvan_label = injection_replace($_POST['onvan_label']);//for saving link ax of font icon
//$icon_label = injection_replace($_POST['icon_label']);//for saving having label or not
//$have_icon = injection_replace($_POST['have_icon']); // for standard menu
//$icon = injection_replace($_POST['icon_standard']);// the address of icon picture
$icon_link = injection_replace($_POST['icon_link']);// the link of icon picture
//echo $icon_link;
//$choose_icon = injection_replace($_POST['choose_icon']);// this is for selecting type of pic  font
//$onvan_img = injection_replace($_POST['onvan_img']);// this is for onvan_img
//$have_image = injection_replace($_POST['have_image']);// have image or not checkbox for onvan
//$type_pic = injection_replace($_POST['type_pic']);// type pic - value 1 or 2 save in db
//$image = injection_replace($_POST['image']);// address of image in megaitem
//$have_tag = injection_replace($_POST['have_tag']);// have tag or not
//$have_button = injection_replace($_POST['have_button']);//have_button or not  in feature menu
//$onvan_button = injection_replace($_POST['onvan_button']); // save onvan button in database
//$link_button = injection_replace($_POST['link_button']); // save link button in database
//$have_text = injection_replace($_POST['have_text']);// have text or not
//$text = injection_replace($_POST['text']);// save text
//$have_map = injection_replace($_POST['have_map']);// save have map or not
//$big_icon_link = injection_replace($_POST['big_icon_link']);// save big icon link in features menu
//$big_onvan_img = injection_replace($_POST['big_onvan_img']);// save big onvan image in features menu
//$big_header_icon_link = injection_replace($_POST['big_header_icon_link']);// save big_header_icon_link in features menu
//$big_header_icon = injection_replace($_POST['big_header_icon']);// save big_header_icon in features menu
//$flag_shop = injection_replace($_POST['flag_shop']);// save big_header_icon in features menu
//$id_shop = injection_replace($_POST['id_shop']);// id shop is foreign key
//$tem_name = injection_replace($_POST['tem_name']);// template name save in db
//$have_shop = injection_replace($_POST['have_shop']);// checkbox have_shop 1 or 0


########################################################### باکس shop #####################################




if (isset($_POST['choose_icon']))
    $choose_icon=$_POST['choose_icon'];

    if (isset($_POST['filename']))
        $file_temp=$_POST['filename'];

if (isset(  $_POST['imgsize']))
        $imgsize=$_POST['imgsize'];
    if (isset(  $_POST['imgw']))
        $imgw=$_POST['imgw'];
    if (isset(  $_POST['imgh']))
        $imgh=$_POST['imgh'];
    if (isset(  $_POST['imghex0']))
        $imagehex0=$_POST['imghex0'];

if (isset(  $_POST['imghex1']))
    $imagehex1=$_POST['imghex1'];

if (isset(  $_POST['imghex2']))
    $imagehex2=$_POST['imghex2'];

if (isset(  $_POST['imghex3']))
    $imagehex3=$_POST['imghex3'];

if (isset(  $_POST['imghex4']))
    $imagehex4=$_POST['imghex4'];

if (isset(  $_POST['imghex5']))
    $imagehex5=$_POST['imghex5'];

if (isset(  $_POST['imghex6']))
    $imagehex6=$_POST['imghex6'];

if (isset(  $_POST['imghex7']))
    $imagehex7=$_POST['imghex7'];

if (isset(  $_POST['imghex8']))
    $imagehex8=$_POST['imghex8'];

if (isset(  $_POST['imghex9']))
    $imagehex9=$_POST['imghex9'];

if ($choose_icon == 1 && isset($imgsize)) {
    $content_image_avatar = injection_replace($_POST['content_image_avatar_dropdown'][0]);
    if ($content_image_avatar != ''){
        $icon_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_image/file/' . trim($content_image_avatar);
        $icon_link1 = 'http://' . $_SERVER["HTTP_HOST"] . '/new_image/file/tn/' . trim($content_image_avatar);}

    else
        $icon_link = '';
//echo $icon_link.$choose_icon;


    $query1 ="insert INTO new_image (address,thumbpic, width,height,imgsize,hex1,hex2,hex3,hex4,hex5,hex6,hex7,hex8,hex9,hex10,tags, category_id) 
VALUES ('$icon_link','$icon_link1','$imgw','$imgh','$imgsize','$imagehex0','$imagehex1','$imagehex2','$imagehex3','$imagehex4','$imagehex5','$imagehex6','$imagehex7','$imagehex8','$imagehex9','$tags','$category_id')";
        $coms_conect->query($query1);
    show_msg('عکس شما با موفقیت اضافه گردید');
//    $news_id = $coms_conect->insert_id;
//    // echo $news_id;
//    header('Location: /newcoms.php?yep=new_Menubar&menu_mode=1');


//$sql="insert INTO new_image (address, width,height,dpi,color,tags, category_id)
//VALUES ('$icon_link','$widht','$height','$dpi','$color','$tags','$category_id')";
//if ($conn->query($sql) === TRUE) {
//$msg = 'عکس شما با موفقیت آپلود شد';
//$msg_class = 'success';
////    $image_id = $conn->insert_id;
////    echo $image_id;
////
////    foreach ($tags as $tag) {
////        $sqltags = "INSERT INTO image_tags (image_id,tags_id)
////VALUES ( '$image_id','$tag')";
////        $conn->query($sqltags);}
//    }
}
//echo $content_image_avatar.'dddd'.$choose_icon.'wwww'.$file_temp;
//---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in meagitem menu
//echo 'image is:'.$image;
    if ($choose_icon == 2 && isset($file_temp)) {
        $content_image_avatar = injection_replace($_POST['icon_link']);
        $content_image_avatar = $file_temp;
//        echo $content_image_avatar.'dddd'.$choose_icon;
        if ($content_image_avatar != '') {
            $icon_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_image/file/' . trim($content_image_avatar);
            $icon_link1 = 'http://' . $_SERVER["HTTP_HOST"] . '/new_image/file/tn/' . trim($content_image_avatar);
            $filenameIn  = $_POST['icon_link'];
            $filenameOut = $_SERVER['DOCUMENT_ROOT'] .trim('/new_image/file/ '). basename($file_temp);
            $fileThumpOut = $_SERVER['DOCUMENT_ROOT'] .trim('/new_image/file/tn/ '). basename($file_temp);

//echo $filenameOut.'dddd';
            $contentOrFalseOnFailure   = file_get_contents($filenameIn);
            $byteCountOrFalseOnFailure = file_put_contents($filenameOut, $contentOrFalseOnFailure);
            imagecopyresampled($icon_link, $filenameIn, 0, 0, 0, 0, 270, 200, $imgw, $imgh);

        } else
            $icon_link = '';
//echo $icon_link.$choose_icon;


        $query1 = "insert INTO new_image (address,thumbpic, width,height,imgsize,hex1,hex2,hex3,hex4,hex5,hex6,hex7,hex8,hex9,hex10,tags, category_id) 
VALUES ('$icon_link','$icon_link1','$imgw','$imgh','$imgsize','$imagehex0','$imagehex1','$imagehex2','$imagehex3','$imagehex4','$imagehex5','$imagehex6','$imagehex7','$imagehex8','$imagehex9','$tags','$category_id')";
        $coms_conect->query($query1);
        show_msg('عکس شما با موفقیت اضافه گردید');
    }
//    else if ($choose_icon == 1) {{
////        $content_image_avatar = injection_replace($_POST['content_image_avatar'][0]);
////          echo $icon_link.$choose_icon.'www';
////        echo $content_image_avatar;}
//        if ($content_image_avatar != '')
//            $icon_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_image/files/' . $content_image_avatar;
//
//        else
//            $icon_link = '';
//    }

    //  echo 'icon link  is:'.$icon_link;
//---end code----try to save elhagh ax , pictures of elhagh ax save.  in ax icon  in all menu
###########################پیوند###################################
$menu_type = '';
$have_icon = '';
$header_icon_link = '';
$header_icon = '';
$choose_kesho_or_url = '';
$link_menu = '';
$pic_link_menu = '';
$icon_label = '';
$onvan_label = '';
$icon = '';
$icon_link = '';
$choose_icon = '';
$onvan_img = '';
$type = '';
$page_id = '';
$show_open = '';
$link = '';
$manager_id = '';
$custom_ip = '';
$have_icon = '';
$type_pic = '';
$image = '';
$have_tag = '';
$have_button = '';
$onvan_button = '';
$link_button = '';
$have_text = '';
$text = '';
$have_map = '';
$big_icon_link = '';
$big_onvan_img = '';
$big_header_icon_link = '';
$big_header_icon = '';
$have_image = '';
$have_shop = '';
$onvan = '';


if ($edit_id) {
    $query = "SELECT * FROM new_image  where id='$edit_id'";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $menu_type = $row['menu_type'];
    $have_icon = $row['have_icon'];
    $header_icon_link = $row['header_icon_link'];
    $header_icon = $row['header_icon'];
    $choose_kesho_or_url = $row['choose_kesho_or_url'];
    $link_menu = ['link_menu'];
    $pic_link_menu = $row['pic_link_menu'];
    $icon_label = $row['icon_label'];
    $onvan_label = $row['onvan_label'];
    $icon = $row['icon'];
    $icon_link = $row['icon_link'];
    $choose_icon = $row['choose_icon'];
    $onvan_img = $row['onvan_img'];
    $type = $row['type'];
    $page_id = $row['page_id'];
    $show_open = $row['target'];
    $onvan = $row['name'];
    $link = $row['link'];
    $manager_id = $row['edit_user_id'];
    $custom_ip = $row['edit_ip'];
    $have_icon = $row['have_icon'];
    $type_pic = $row['type_pic'];
    $image = $row['image'];
    $have_tag = $row['have_tag'];
    $have_button = $row['have_button'];
    $onvan_button = $row['onvan_button'];
    $link_button = $row['link_button'];
    $have_text = $row['have_text'];
    $text = $row['text'];
    $have_map = $row['have_map'];
    $big_icon_link = $row['big_icon_link'];
    $big_onvan_img = $row['big_onvan_img'];
    $big_header_icon_link = $row['big_header_icon_link'];
    $big_header_icon = $row['big_header_icon'];
    $have_image = $row['have_image'];
    $have_shop = $row['have_shop'];
    $la = $row['la'];
    $id_Tabs = $edit_id;

}


if ($edit_id) {

    if ($page_id == 0)
        $title_static_page = "در دست ساخت";

        }

////////////////////////////////////////////////////////////////////////////////////////
?>
<!------------------------------------------------------- this code for matn kamel mohtava------------------------------>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<!---------------------------------------- end code----------------------------------------------------------------------->
<script src="/yep_theme/default/rtl/js/menubar/functions.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<!------------------------------------arezo code        ----------------------------------------------------->


<!--this css and java script for list keshoyi iconha----------------------------------------------------------------------->
<link rel="stylesheet"
      href="/yep_theme/default/rtl/assets/js/bootstrap-iconpicker/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css"/>
<link href="/new_template/default/<?= $dir ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!--end code this css and java script for list keshoyi iconha---------------------------------------------------------->

<!------------------------------------------this is for orakuloader----------------------------------------------------->
<link type="text/css" href="../../new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="../../new_orakuploader/jquery.min.js"></script>
<script type="text/javascript" src="../../new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../new_orakuploader/orakuploader.js"></script>


<!----------------------------------------------end code for orakuploader----------------------------------------------------------------------->

<script src="/yep_theme/default/rtl/js/select2.js"></script>


<!------------------------------------------------------- this code for matn kamel mohtava------------------------------>
<!--<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>-->
<!---------------------------------------- end code----------------------------------------------------------------------->

<link rel="stylesheet" href="../../yep_theme/default/rtl/css/menu-arezo.css">

<!--this css and java script for popup file manager -->
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<!--this css and java script for lpopup file manager -->
<!------------------------------------end arezo code   ---------------------------------------------------->
<div class="tabbable">
    <!--    <ul class="nav nav-tabs">-->
    <!--        <li class="active"><a href="#tab3" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i>نوار منو</a></li>-->
    <!--    </ul>-->

    <div class="msheet tab-content">

        <div class="secfhead">
            <!-- #section:blocks/menubar.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-file23" style=""></span></div>
                <div class="title"><p class="titr">نوار منو</p>
                    <p class="lead">شما در این قسمت امکان مدیریت نوار منو اعم از افزودن، حذف، ویرایش و به روزرسانی را
                        داشته و به صورت Drag & Drop می توانید محتوای منو را مدیریت کنید</p></div>
            </div>
            <!-- /section:blocks/menubar.head -->

<!--            //////////CODE  MAHTDY start///////////-->
         <form id="menu1" name="menu1" action="" role="form" method="post" enctype="multipart/form-data">
                <br>

            <div class="form-group" id="icon_pic_dropdown">
                <div>
                    <label class="control-label col-md-12" id="arezo_elsagh_file_dropdown">
                        <input type="radio" <? $choose_icon = 1; echo 'checked' ?> name="choose_icon"
                               id="arezo-elsagh-file-computer_dropdown"
                               value="1">
                        الصاق از فایل کامپیوتر
                    </label>
                </div>
                <div class="ui-sortable red box" id="upload_type1_dropdown"
                     style="float:right;">
                    <div id="content_image_avatar_dropdown" orakuploader="on"></div>
                    <?
//                    $edit_id=3;

                    if ($edit_id > "" && $choose_icon == 1) {
                        $query = "select adress from new_file_path where id='$edit_id'";
                        $result = $coms_conect->query($query);
                        $i = 1;
                        $str = '';
                        $articles_list = '';
                        $pic_str = '';
                        $RS1 = $result->fetch_assoc();
                        $temp = explode("/",$RS1['adress']);
//print_r($temp);

                        $content_image_avatar = end($temp);
//                        echo $content_image_avatar;
//                        $div_id = explode(".", $content_image_avatar);
//                        echo $div_id;
                        $pic_str .= "<div class='multibox file' style='cursor: move;' id='$content_image_avatar' filename='$content_image_avatar'>";
//                        echo $pic_str;
                        $pic_str .= "<div class='picture_delete'  ></div>";
                        $pic_str .= "<img src='new_image/files/$content_image_avatar' onerror=this.src='new_orakuploader/images/no-image.jpg'  class='picture_uploaded'>";
                       $content_image_avatar_dropdown='new_image/files/'.$content_image_avatar;
                        $pic_str .= "<input type='hidden' id='content_image_avatar_dropdown' value='$content_image_avatar' name='content_image_avatar_dropdown[]' />";
                        $pic_str .= "</div>";

                    } ?>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#content_image_avatar_dropdown').orakuploader({

                            orakuploader_path: 'new_orakuploader/',
                            orakuploader_main_path: 'new_image/file',
                            orakuploader_thumbnail_path: 'new_image/file/tn',

                            orakuploader_use_dragndrop: true,

                            orakuploader_add_image: 'new_orakuploader/images/add.png',
                            orakuploader_add_label: 'آپلودتصویر',

                            // orakuploader_crop_to_width: 600,
                            // orakuploader_crop_to_height: 420,

                            orakuploader_crop_thumb_to_width: 270,
                            orakuploader_crop_thumb_to_height: 200,
                            // orakuploader_watermark: 'new_image/watermark/water_mark.png',
                            orakuploader_maximum_uploads: 1,
                            // orakuploader_finished: function(res) {
                            //     alert("Uploading finished.");
                            //     console.log(res);

                            orakuploader_finished: function() {

                                 var file_val=$('input[name="content_image_avatar_dropdown[]"]').val();
                                 $.post("../../test/rgb_val_image.php", {file_val:file_val},
                                function (data) {
                                $('#rgb-val').html(data);
                                // alert(file_val);
                                });
                            },

                        });

                        $('#content_image_avatar_dropdown').html();
                        // var file_val =$('.picture_uploaded').attr('src');


                    });


                </script>
                <div>
                    <label class="control-label col-md-12"
                           id="arezo_select_media_dropdown">
                        <input type="radio" name="choose_icon" <?  $choose_icon = 2?>
                               id="arezo-choose-media-upload_dropdown"
                               value="2">
                        انتخاب از رسانه های قبلی
                    </label>
                </div>
                <div class="col-md-3" id="upload_type2_dropdown"
                     style="<? if ($upload_type != 1) echo 'display:block'; else echo 'display:none' ?>">


                    <div id="ads_slidshow" class="seyed"
                         style="opacity: 1;">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="imgdemo"><img  id="aks_content_thumb"
                                                          src="/yep_theme/default/rtl/images/pic.png">
                                </div>
                                <!--img data-src="holder.js/100%x100%" id="aks_content_thumb" class="img-thumbnail" alt="100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+"  style="height: 100%; width: 100%; display: block;  margin-bottom: 5px;"-->
                                <div style="display: inline-flex;">

                                    <script>
                                        setInterval(check_address, 2000);
                                        function check_address() {
                                            var aks_content = $('#content_imag').val();
                                            if (aks_content != "") {
                                                $('#aks_content_thumb').attr("src", aks_content);
                                                 var  tempsrc=aks_content.split('/');
                                                var file_src=tempsrc[tempsrc.length-1];
                                                // var file_val=$.end(tempsrc);
                                                $.post("../../test/rgb_val_image.php", {file_src:file_src},
                                                    function (data) {
                                                        $('#rgb-val').html(data);
                                                        // alert(file_src+'jjjj');
                                                    });
                                            }
                                        }
                                    </script>
                                    <div class="col-md-12 input-group">
                                        <input type="text"
                                               id="content_imag"
                                               value="<? if (isset($icon_link) && $choose_icon == 2) echo $icon_link?>"
                                               class="form-control"
                                               placeholder="لینک تصویر "
                                               name="icon_link"
                                               style="direction: ltr;">
                                        <span id="spanclick" class="input-group-addon"
                                              style="padding: 0px;"><a
                                                    href="/filemanager/dialog.php?type=2&amp;field_id=content_imag"
                                                    class="btn btn-success iframe-btn"
                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                        class="addimg flaticon-add139"></span></a></span>

                                    </div>
<!--                                    $$$$$$$$$$$$$$$mahtdy-link tasvir$$$$$$$$$$$$$$$-->
                                    <script>
                                        // var fff= $('#aks_content_thumb').alt()    ;
                                        // if ( fff != '')
                                        //
                                        // //
                                        // // $('#filename').change(function () {
                                        // //     var file_val=$('#filename').val();
                                        // //     $.post("../../test/rgb_val_image.php", {file_val:file_val},
                                        // //         function (data) {
                                        // //             $('#rgb-val').html(data);
                                        //             alert('eeeeee'+fff);
                                        // else alert('wwwww'+fff);
                                        //         // });
                                        //
                                        // // });});

                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </br>
<!--                //$$$$$$$$$$$$$$mahtdy$$$$$$$$$-->

                <div  class="col-md-12 theme" style="direction: ltr">
                    <ul id="rgb-val" class="themeBox">

                    </ul>
                </div>
<!--                //$$$$$$$$$$$$$$$$$$$$$$-->
            </div>

             <div class="panel-footer bttools">
                 <button type="submit" id="submit_page" class="btn btn-success"><span
                             class="flaticon-verified9"></span><span>ذخیره</span></button>

             </div>

         </form>
<!--            /////////////-->


        </div>
        </div>

    <div src="" id='sortDBfeedback'></div>

    </div>

<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">

<script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>

<script>
    $("#manage_lang").change(function () {
        $("#onvan").val('');
        $("#menu1").submit();
    });
</script>
<? $_SESSION["del_item"] = 'del_new_menu';
$_SESSION["edit_secend_item"] = 'edit_new_manebar';
$_SESSION["edit_item"] = 'edit_new_menu'; ?>
<script src="ajax_js/menu_bar.js"></script>
<!--////////////////////mahtdy////////////////////-->
<script>
    $(document).ready(function () {
        // $('#upload_type1_dropdown').hide();
        $('#upload_type2_dropdown').hide();

    $('#arezo_elsagh_file_dropdown').click(function () {
        $('#upload_type1_dropdown').show();
        $('#upload_type2_dropdown').hide();
        // $('#arezo-elsagh-file-computer_dropdown').val(1);

    });
    $('#arezo_select_media_dropdown').click(function () {
        $('#upload_type2_dropdown').show();
        $('#upload_type1_dropdown').hide();

    });
    });
    //  ------------this code for popup in file manager------arezo code
    $(document).ready(function () {
        $('.iframe-btn').fancybox({
            'width': 880,
            'height': 570,
            'type': 'iframe',
            'autoScale': false

        });

        });
    // $('#aks_content_thumb').load('src',function () {
    //
    //
    // var img =  $('#content_imag').val();
    // alert(img+'uuuu');
    //     if (img !='' ){
    //
    //     alert('helloooooooooooooooo');
    // } });
    // setInterval()
    // $('.iframe-btn').close(function () {
    //     var img =  $('#content_imag').val();
    //     alert(img+'uuuu');
    //
    // })
</script>





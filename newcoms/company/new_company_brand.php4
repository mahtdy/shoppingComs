<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>

<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<!--<script type="text/javascript" src="/filemanager/plugin.min.js"></script>-->
<!--<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>-->
<!--<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>-->

<link type="text/css" href="/new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="/new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/M_style.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/H_style.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<!---->
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>

<?
$modual_type=19;
$modul_name='company';

$onvan=injection_replace($_POST['onvan']);
$url_link=injection_replace($_POST['url_link']);
$edit_mode=injection_replace($_POST['edit_mode']);
$meta_desciption=injection_replace($_POST['meta_desciption']);
$meta_keyword=injection_replace($_POST['meta_keyword']);
$seo_title=injection_replace($_POST['seo_title']);
if($_POST['manage_lang']>""){
    $manage_lang=injection_replace($_POST['manage_lang']);

}else
    $manage_lang=$_SESSION['page_languege'];


##############################################################
########################################################### link content #####################################
$show_box2_pic_adress = 0;
$show_box2_pic_adress = injection_replace($_POST["show_box2_pic_adress"]);

//insert_templdate($site, $show_box2_pic_adress, $la, '', '', '', '', "show_box2", $tem, $coms_conect);

$second_choice_box2_drbanihosseini_cat = injection_replace_pic($_POST["second_choice_box2_drbanihosseini_cat"]);
$second_choice_box2_drbanihosseini_subcat_cat = injection_replace_pic($_POST["second_choice_box2_drbanihosseini_subcat_cat"]);
$second_choice_box2_drbanihosseini_subcat_cat_content = injection_replace_pic($_POST["second_choice_box2_drbanihosseini_subcat_cat_content"]);
//if($second_choice_box2_drbanihosseini_subcat_cat_content>0)
//    insert_templdate($site, $second_choice_box2_drbanihosseini_subcat_cat_content, $la, '', '', $second_choice_box2_drbanihosseini_cat, $second_choice_box2_drbanihosseini_subcat_cat, "second_choice_box2_drbanihosseini", $tem, $coms_conect);


######################################################### END link content #####################################
###############################pics###############################

//$box1_header_pic_adress = 0;
//$box1_header_pic_adress = injection_replace($_POST["box1_header_pic_adress"]);
//$box1_header_title = injection_replace($_POST["box1_header_title"]);
//$box1_header_text = injection_replace($_POST["box1_header_text"]);
$box1_header_link = injection_replace($_POST["box1_header_link"]);
$box1_header_link_avatar_orak = injection_replace($_POST["box1_header_link_avatar_orak"][0]);
if($box1_header_link_avatar_orak>""){
    $box1_header_link = 'http://' . $_SERVER["HTTP_HOST"] . '/new_gallery/files/' . $box1_header_link_avatar_orak;
}
//insert_templdate($site, $box1_header_pic_adress, $la, $box1_header_text, $box1_header_title,$box1_header_link, '', "box1_header", $tem, $coms_conect);
//$url_link='';
//$meta_keyword='';
//$meta_desciption='';
//$seo_title='';
##############################################################
if($onvan>""&&$edit_mode==0&&$_SESSION["can_add"]==1){
    check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
    $sql="SELECT id FROM new_company_cat_brand ORDER BY id DESC LIMIT 1";
    $result = $coms_conect->query($sql);
    $row  = $result->fetch_assoc();
    $id=$row['id'];
//    echo 'id='.$id;
    $id++;
//    echo 'id='.$id;exit;



    if(!in_array($manage_lang,$_SESSION["manager_title_lang"]))
        header('Location: new_manager_signout.php');

    $query1="insert into new_company_cat_brand(pic_brand,majol,majol_cat,majol_cat_cont,url_link,seo_title,status,meta_keyword,meta_desciption,name,rang,type,date,user_id,ip,la) 
	values ('$box1_header_link','$second_choice_box2_drbanihosseini_cat','$second_choice_box2_drbanihosseini_subcat_cat','$second_choice_box2_drbanihosseini_subcat_cat_content','$url_link','$seo_title',1,'$meta_keyword','$meta_desciption','$onvan',$id,'$modual_type',NOW(),$manager_id,'$custom_ip','$manage_lang')";
    $coms_conect->query($query1);
//	echo $query1;
    $id=mysqli_insert_id($coms_conect) ;
    $query1="insert into new_cat_permission(menu_id,permission,group_id,view) 
	values ($id,1,1,1)";
    array_push($_SESSION["manager_page_cat"],$id);

    $coms_conect->query($query1);
}else 	if(($onvan)>""&&$edit_mode>0&&$_SESSION["can_edit"]==1){
    check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
    $query12="select la from new_company_cat_brand a  where id=$edit_mode";
    $result12 = $coms_conect->query($query12);
    $RS121 = $result12->fetch_assoc();
    if(!in_array($RS121["la"],$_SESSION["manager_title_lang"]))
        header('Location: new_manager_signout.php');
    $query1="update new_company_cat_brand set pic_brand='$box1_header_link',majol='$second_choice_box2_drbanihosseini_cat',majol_cat='$second_choice_box2_drbanihosseini_subcat_cat',majol_cat_cont='$second_choice_box2_drbanihosseini_subcat_cat_content',url_link='$url_link',seo_title='$seo_title',meta_keyword='$meta_keyword',meta_desciption='$meta_desciption',name='$onvan',edit_date=NOW(),edit_user_id='$manager_id',ip='$custom_ip' where id='$edit_mode'";
//    echo  $query1;exit;
    $coms_conect->query($query1);
    $url_link='';
$meta_keyword='';
$meta_desciption='';
$seo_title='';
$box1_header_link='';
}
create_session_token();

?>
<script src="/yep_theme/default/rtl/js/menubar/madules_cat.js"></script>

<input type='hidden' id='sortDBfeedback'>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف دسته زير اطمينان داريد؟</div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok" value="" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي</button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;خير</button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="tabbable">
    <ul class="nav nav-tabs" style="display:none;">
        <li class="active"><a href="#tab3" data-toggle="tab"><i class="green ace-icon fa fa-home bigger-120"></i>دسته بندی <?=$cat_title?></a></li>
    </ul>
    <div class="msheet tab-content">
        <div class="secfhead">
            <!-- #section:ads/ads_cat.head -->
            <div class="sectitle">
                <div class="icon"><span class="flaticon-file23" style=""></span>
                </div>
                <div class="title"><p class="titr">مدیریت دسته بندی <?=$cat_title?></p><p class="lead">در این بخش امکان افزودن و مدیریت دسته بندی های اختصاص یافته به <?=$cat_title?> را مدیریت کنید</p>
                </div>
            </div>
            <!-- /section:ads/ads_cat.head -->
            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
                </ul>
            </div>

        </div>

        <form id="menu1" name="menu1" action="" role="form" method="post" enctype="multipart/form-data">
            <input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
            <input name='cat_url' id='cat_id' value='<?=$url?>' type="hidden">
            <input type="hidden" id="check_value" name="check_value" value="0">
            <div class="row">
                <div class="col-md-12"><br>
                    <div class="col-md-12">
                        <label class="col-md-1 control-label">انتخاب زبان</label>
                        <select id="manage_lang" name="manage_lang" class="form-group col-md-3">
                            <?$query="select title,name from new_language where status=1";
                            $result = $coms_conect->query($query);
                            while($RS1 = $result->fetch_assoc()) {
                                $title=$RS1['title'];
                                $name=$RS1['name'];
                                $str="";



                                if($manage_lang==$title||$change_lang==$title)
                                    $str="selected";
                                if(in_array($RS1['title'],$_SESSION["manager_title_lang"]))
                                    echo "<option value='$title' $str>$name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">دسته بندی</h3>
                            </div>
                            <input type="hidden" id="edit_mode" name="edit_mode" value="0">
                            <input type="hidden" id="menu_id" name="menu_id" value="0">
                            <div class="panel-body">
                                <div class="row-fluid">
                                    <!-- #section:ads/ads_cat.menu -->
                                    <div class="col-md-12">
                                        <label class="col-md-2 control-label" for="group_name">عنوان</label>
                                        <div class="form-group col-md-5">
                                            <input type="text" name="onvan" id="onvan" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="col-md-2 control-label" for="group_name">URL</label>
                                        <div class="form-group col-md-5">
                                            <input type="text" name="url_link" value="<?=$url_link?>" id="url_link" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label  class="col-md-2 control-label" >Meta keyword</label>
                                        <div class="form-group col-md-5">
                                            <input type="text" value="<?=$meta_keyword?>" id="meta_keyword" name="meta_keyword"   class="form-control" data-role="tagsinput" title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد" placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد" style="width: 100%; font-size: inherit;" />
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" >Meta Description</label>
                                            <div class="form-group col-md-5">
                                                <textarea id="meta_desciption" name="meta_desciption" class="form-control" rows="3" title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?=$meta_desciption?></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label  class="col-md-2 control-label" >Seo title</label>
                                            <div class="form-group col-md-5">
                                                <input  value="<?=$seo_title?>" type="text" id="seo_title" name="seo_title" class="form-control">

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="tab-pane">


                                                <div class="page-content-area">
                                                    <div class="page-body" style="margin-top: 25px;">
                                                        <fieldset>
                                                            <div class="col-md-12">
<!--                                                                --><?// $second_choice_box2_drbanihosseini="select * from new_company_cat_brand where id='173'";
//                                                                echo 'wwww='.$second_choice_box2_drbanihosseini;
//                                                                $result = $coms_conect->query($second_choice_box2_drbanihosseini);
//
//                                                                $second_choice_box2_drbanihosseini = $result->fetch_assoc();
//                                                                echo "ww=";print_r($second_choice_box2_drbanihosseini);
////
////                                                                exit;
//                                                                ?>
                                                                <label  class="col-md-2 control-label" >لینک محتوا</label>
                                                                <div id="div_mother_second_choicedel_second_choice_box2_drbanihosseini" class="form-group"
                                                                     style="opacity: 1;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-8">
                                                                            <div class=" H_second_choice_box2_drbanihosseini col-md-3 input-group">
                                                                                <input type="hidden"
                                                                                       id="second_choice_box2_drbanihosseini_cat1"
                                                                                       name="second_choice_box2_drbanihosseini_cat1"
                                                                                       value="">
                                                                                <input type="hidden"
                                                                                       id="second_choice_box2_drbanihosseini_subcat_val"
                                                                                       name="second_choice_box2_drbanihosseini_subcat_val"
                                                                                       value="<?= $second_choice_box2_drbanihosseini['majol'] ?>">
                                                                                <input type="hidden"
                                                                                       id="second_choice_box2_drbanihosseini_subcat_link"
                                                                                       name="second_choice_box2_drbanihosseini_subcat_link"
                                                                                       value="<?= $second_choice_box2_drbanihosseini['majol_cat'] ?>">

                                                                                <select id="second_choice_box2_drbanihosseini_cat"
                                                                                        data-selectid=""
                                                                                        class="form-control H_second_choice_box2_drbanihosseini_cat"
                                                                                        name="second_choice_box2_drbanihosseini_cat">
                                                                                    <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                                                    $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                                                    echo "<option value='0'>انتخاب کنید</option>";
                                                                                    while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                                                        $str = '';

                                                                                        if ($row0['id'] == $second_choice_box2_drbanihosseini['majol'])
                                                                                            $str = 'selected';
                                                                                        echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>

                                                                            <div id="second_choice_box2_drbanihosseini"
                                                                                 class="col-md-3 input-group">
                                                                            </div>

                                                                            <div id="second_choice_box2_drbanihosseini_content"
                                                                                 class="col-md-6 input-group">
                                                                            </div>

                                                                            <script>
                                                                                //$(document).ready(function () {
                                                                                //if ($("#second_choice_box2_drbanihosseini_cat1").val()>""){
                                                                                //    $.ajax({
                                                                                //        type: 'POST',
                                                                                //        url: 'New_ajax_company.php',
                                                                                //        data: "action=second_choice_box2_drbanihosseini&id=" + $("#second_choice_box2_drbanihosseini_cat1").val() + "&value=" + $("#second_choice_box2_drbanihosseini_subcat_val").val() + "&field_nmae=" + '<?//=$la?>//',
                                                                                //        success: function (result) {
                                                                                //            $('#second_choice_box2_drbanihosseini').html(result);
                                                                                //        }
                                                                                //    });
                                                                                //}
                                                                                //});
                                                                                //$(document).ready(function () {
                                                                                //      // alert( $("#second_choice_box2_drbanihosseini_subcat_link").val());
                                                                                //    $.ajax({
                                                                                //        type: 'POST',
                                                                                //        url: 'New_ajax_company.php',
                                                                                //        data: "action=second_choice_box2_drbanihosseini_content&id=" + $("#second_choice_box2_drbanihosseini_subcat_val").val() + "&value=" + $("#second_choice_box2_drbanihosseini_subcat_link").val() + "&secend_value=" + $("#second_choice_box2_drbanihosseini_subcat_link").val()+ "&field_nmae=" + '<?//=$la?>//',
                                                                                //        success: function (result) {
                                                                                //            $('#second_choice_box2_drbanihosseini_content').html(result);
                                                                                //        }
                                                                                //    });
                                                                                //});
                                                                            </script>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <script>
                                                                    $(document).on('change', '.H_second_choice_box2_drbanihosseini_cat', function () {
                                                                        var thisElement = $(this).parents('.H_second_choice_box2_drbanihosseini').next();

                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'New_ajax_company.php',
                                                                            data: "action=second_choice_box2_drbanihosseini&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>' + "&user_id=" + $(this).data('selectid'),
                                                                            success: function (result) {
                                                                                thisElement.empty();
                                                                                thisElement.append(result);
                                                                            }
                                                                        });
                                                                    });

                                                                    $(".second_choice_box2_drbanihosseini_neshane").change(function () {

                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'New_ajax_company.php',
                                                                            data: "action=second_choice_box2_drbanihosseini&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                            success: function (result) {
                                                                                $('#second_choice_box2_drbanihosseini').html(result);
                                                                            }
                                                                        });
                                                                    });
                                                                    $(document).on('change', '.second_choice_box2_drbanihosseini_neshane', function () {

                                                                        $.ajax({
                                                                            type: 'POST',
                                                                            url: 'New_ajax_company.php',
                                                                            data: "action=second_choice_box2_drbanihosseini_content&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$la?>',
                                                                            success: function (result) {
                                                                                $('#second_choice_box2_drbanihosseini_content').html(result);
                                                                                // alert(result);

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
                                                           value="<?= $box1_header_link ?>"
                                                           class="form-control imginput"
                                                           placeholder=" تصویر"
                                                           name="box1_header_link"
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
                                                    <? $box1_header_link = get_tem_result($site, $la, "box1_header", $tem, $coms_conect);?>
                                                    <a href="" class=" without-caption ddddd" >
                                                        <img width="33" height="33" class="H_cursor_zoom ddddd" src="" alt="">
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

                                                        $('#box1_header_link_avatar_orak').html("<?=$pic_str?>");
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
<!-------------------------------------------------------- END pic-->

                                    <!-- /section:ads/ads_cat.menu -->
                                    <div class="col-lg-6 col-md-4 bttools">
                                        <div class="content">
                                            <button type="button" id="submit_form" class="btn btn-success"><span class="flaticon-verified9"></span><span>ذخیره</span></button>
                                            <script>
                                                $(document).on('click', '#submit_form', function() {
                                                    var img = $('<img id="dynamic">');
                                                    img.attr('src', 'waiting.gif');
                                                    img.appendTo('.content');
                                                    $("#menu1").submit();
                                                });
                                                $('#submit_form').click(function () {
                                                    var aa=$('#second_choice_box2_drbanihosseini_cat').val();
                                                    var bb=$('#second_choice_box2_drbanihosseini_subcat_cat').val();
                                                    var cc=$('#second_choice_box2_drbanihosseini_subcat_cat_content').val();
                                                    // alert("aa="+aa+"bb="+bb+"cc="+cc);

                                                });
                                            </script>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
        </form>
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">مرتب سازی دسته بندی</h3>
                </div>
                <div class="panel-body">
                    <!-- #section:ads/ads_cat.table -->
                    <?//
                    $sql = "SELECT * FROM new_company_cat_brand a,new_cat_permission b  WHERE    b.permission=1 and a.id=b.menu_id and a.parent_id='0' and b.group_id={$_SESSION["manager_group_id"]} and a.type='$modual_type' and a.la='$manage_lang' GROUP BY  a.id ORDER BY a.rang";
                    //echo $sql;
                    $result = $coms_conect->query($sql);
                    echo "<div class='cf nestable-lists'>\n";
                    echo "<div class='dd' id='nestableMenu'>\n\n";
                    echo "<ol class='dd-list'>\n";
                    while($row = $result->fetch_assoc()) {
                        echo "\n";
                        $id=$row['id'];$str="";
                        $status=$row['status'];
                        $name=insert_dash($row['name']);
                        if($status==1)
                            $str='checked';
                        echo "<li class='dd-item dd-nodrag' data-id='{$row['id']}'>";
                        echo "<div class='dd-handle'><a target='_blank' href="."/$modul_name/$manage_lang/brand/$name/1"."> {$row['name']}</a>";
                        echo '	<div class="pull-right action-buttons">';
                        if($_SESSION["can_edit"]==1){
                            echo '<a class="blue" href="#">
																	 <input '.$str.' id='.$id.' name="switch-field-1" class="ace ace-switch ace-switch-6" type="checkbox"/>
																	 <span class="lbl"></span>
																	</a>';

                            echo '<a id='.$id.' class="edit_menu blue" href="#">
																	<span class="flaticon-note32 bigger-130"></span>
																	</a>';
                        }
//                        if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)&&$_SESSION["can_delete"]==1){
//                            echo '<a id='.$id.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
//																 	<span class="flaticon-delete84 bigger-130"></span>
//																 	</a>';
//                        }
                        echo 	'</div>
														</div>';
                        show_madules_cat($row['id'],$site_id,$manage_lang, $modual_type ,$coms_conect,$modul_name);
                        echo "</li>\n";
                    }
                    echo "</ol>\n\n";
                    echo "</div>\n";
                    echo "</div>\n\n";
                    //?><?//=$sql?>
                    <!-- /section:ads/ads_cat.table -->
                </div>
            </div>
            <textarea id="nestable1-output" style="display:none"></textarea>
        </div>
    </div>
</div>
    </div>

    </div>

    <script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>

    <script src="ajax_js/page_com_brand.js"></script>
    <script>
        $("#manage_lang").change(function () {
            $("#onvan").val('');
            $("#menu1").submit();
        });
    </script>
<?if($_SESSION["can_edit"]==1){ ?>
    <script>
        $(document).ready(function(){
            var updateOutput = function(e)
            {
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                    menu_updatesort(window.JSON.stringify(list.nestable('serialize')));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };


            // activate Nestable for list 1
            $('#nestableMenu').nestable({
                group: 1,
                maxDepth: 1,
            })
                .on('change', updateOutput);

            // output initial serialised data
            updateOutput($('#nestableMenu').data('output', $('#nestable1-output')));


            jQuery(function($){

                $('.dd').nestable();

                $('.dd-handle a').on('mousedown', function(e){











                    e.stopPropagation();
                });

                $('[data-rel="tooltip"]').tooltip();

            });
        });
    </script>
<?}?>
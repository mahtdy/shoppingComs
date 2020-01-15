<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen"/>
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/H_style.css">



<script src="/yep_theme/default/rtl/js/magnific-popup/jquery.magnific-popup.js"></script>
<script src="/yep_theme/default/rtl/js/zozo.tabs.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/js/magnific-popup/magnific-popup.min.css">

<link type="text/css" href="../../new_orakuploader/orakuploader.css" rel="stylesheet"/>
<script type="text/javascript" src="../../new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../new_orakuploader/orakuploader.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/zozo.tabs.min.css">

<?

$pos_texts = injection_replace($_POST['pos_texts']);
$edit_mode = injection_replace($_POST['edit_mode']);
$edit_id = injection_replace($_GET['edit_id']);
$start_date = injection_replace($_POST['start_date']);
$finish_date = injection_replace($_POST['finish_date']);

$slide_img1 = injection_replace($_POST['slide_img1']);
$slide_img_link = injection_replace($_POST['slide_img_link']);

//--------



$height = injection_replace($_POST['height']);
$slide_preload = injection_replace($_POST['slide_preload']);
$select_type = injection_replace($_POST['select_type']);
$type_arrow = injection_replace($_POST['type_arrow']);
$type_bullet = injection_replace($_POST['type_bullet']);


$slide_title = injection_replace($_POST['slide_title']);
$link_title = injection_replace($_POST['link_title']);
$top_title = injection_replace($_POST['top_title']);
$size_title = injection_replace($_POST['size_title']);
$color_title = injection_replace($_POST['color_title']);


$text1 = injection_replace($_POST['text1']);
$link_text1 = injection_replace($_POST['link_text1']);
$top_text1 = injection_replace($_POST['top_text1']);
$size_text1 = injection_replace($_POST['size_text1']);
$color_text1 = injection_replace($_POST['color_text1']);


$text2 = injection_replace($_POST['text2']);
$link_text2 = injection_replace($_POST['link_text2']);
$top_text2 = injection_replace($_POST['top_text2']);
$size_text2 = injection_replace($_POST['size_text2']);
$color_text2 = injection_replace($_POST['color_text2']);


$text3 = injection_replace($_POST['text3']);
$link_text3 = injection_replace($_POST['link_text3']);
$top_text3 = injection_replace($_POST['top_text3']);
$size_text3 = injection_replace($_POST['size_text3']);
$color_text3 = injection_replace($_POST['color_text3']);


//buttons




if ($_GET['site_filter'] > "")
    $manage_site_filter = injection_replace($_GET['site_filter']);
else
    $manage_site_filter = injection_replace($_POST['manage_site_filter']);
if ($_GET['lang_filter'] > "")
    $manage_lang_filter = injection_replace($_GET['lang_filter']);
else
    $manage_lang_filter = injection_replace($_POST['manage_lang_filter']);


if ($edit_mode == '' && $slide_img1 > "") {

    $arr_slide = array( "la" => $manage_lang_filter, "site" => $manage_site_filter, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "slide_img1" => $slide_img1, "slide_img_link" => $slide_img_link, "title" => $slide_title,"link_title" => $link_title, "top_title" => $top_title, "size_title" => $size_title,"color_title" => $color_title, "text1" => $text1,"link_text1" => $link_text1, "top_text1" => $top_text1, "size_text1" => $size_text1,"color_text1" => $color_text1, "text2" => $text2,"link_text2" => $link_text2, "top_text2" => $top_text2, "size_text2" => $size_text2,"color_text2" => $color_text2, "text3" => $text3, "link_text3" => $link_text3,"top_text3" => $top_text3, "size_text3" => $size_text3, "color_text3" => $color_text3, "page_id" => $edit_mode, "type" => 0, "edit_user_id" => $edit_user_id, "edit_date" => $edit_date, "ip" => $custom_ip,"pos_texts" => $pos_texts, "slide_preload" => $slide_preload,  "select_type" => $select_type,"type_arrow" => $type_arrow,"type_bullet" => $type_bullet, "height" => $height);
  // print_r($arr_slide) ;
    insert_to_data_base($arr_slide, 'new_slideshow', $coms_conect);
} else if ($edit_mode > 0 && $slide_img1 > "") {
    $condition = "id=$edit_mode";
    $arr_slide = array( "la" => $manage_lang_filter, "site" => $manage_site_filter, "start_date" => strtotime(jalalitomiladi($start_date)), "finish_date" => strtotime(jalalitomiladi($finish_date)), "slide_img1" => $slide_img1, "slide_img_link" => $slide_img_link, "title" => $slide_title, "link_title" => $link_title,"top_title" => $top_title, "size_title" => $size_title,"color_title" => $color_title, "text1" => $text1,"link_text1" => $link_text1, "top_text1" => $top_text1, "size_text1" => $size_text1,"color_text1" => $color_text1, "text2" => $text2,"link_text2" => $link_text2, "top_text2" => $top_text2, "size_text2" => $size_text2,"color_text2" => $color_text2, "text3" => $text3,  "link_text3" => $link_text3,"top_text3" => $top_text3, "size_text3" => $size_text3,"color_text3" => $color_text3, "page_id" => $edit_mode, "edit_user_id" => $edit_user_id, "edit_date" => $edit_date, "ip" => $custom_ip, "pos_texts" => $pos_texts,"slide_preload" => $slide_preload, "select_type" => $select_type,"type_arrow" => $type_arrow,"type_bullet" => $type_bullet, "height" => $height);

    update_data_base($arr_slide, 'new_slideshow', $condition, $coms_conect);
}
$la = "";
$site = "";
if ($edit_id > 0) {
    #Query from new_slideshow
    $query = "SELECT * FROM new_slideshow where id='$edit_id'";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
    $start_date = miladitojalaliuser(date('Y-m-d', $row['start_date']));
    $finish_date = miladitojalaliuser(date('Y-m-d', $row['finish_date']));

    $slide_title = $row['title'];
    $link_title = $row['link_title'];
    $top_title = $row['top_title'];
    $size_title = $row['size_title'];
    $color_title = $row['color_title'];

    $text1 = $row['text1'];
    $link_text1 = $row['link_text1'];
    $top_text1 = $row['top_text1'];
    $size_text1 = $row['size_text1'];
    $color_text1 = $row['color_text1'];

    $text2 = $row['text2'];
    $link_text2 = $row['link_text2'];
    $top_text2 = $row['top_text2'];
    $size_text2 = $row['size_text2'];
    $color_text2 = $row['color_text2'];

    $text3 = $row['text3'];
    $link_text3 = $row['link_text3'];
    $top_text3 = $row['top_text3'];
    $size_text3 = $row['size_text3'];
    $color_text3 = $row['color_text3'];

    $pos_texts = $row['pos_texts'];


    $slide_preload = $row['slide_preload'];
    $select_type = $row['select_type'];
    $type_arrow = $row['type_arrow'];
    $type_bullet = $row['type_bullet'];


    $height = $row['height'];

    $slide_img1 = $row['slide_img1'];
    $slide_img_link = $row['slide_img_link'];
    $la = $row['la'];
    $site = $row['site'];
}
if ($la == "")
    $la = $manage_lang_filter;

if ($site == "")
    $site = $manage_site_filter;



?>
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
</script>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading"><?= $c_Poll_del ?></h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span
                            class="glyphicon glyphicon-warning-sign"></span> <?= $new_del_content_confidence ?></div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?= $ads_AdsList_yes ?></button>
                <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                            class="glyphicon glyphicon-remove"></span>&nbsp;<?= $ads_AdsList_no ?></button>
            </div>
        </div>
    </div>
</div></fieldset>


</br>

<div class="tabbable">
    <form class="form-horizontal" id="delete_table" name="delete_table" action="" role="form" method="post"
          enctype="multipart/form-data">
        <fieldset>
            <input type="hidden" id="check_value" name="check_value" value="0">
            <!--ul class="nav nav-tabs">
		<li class="active"><a href="#add_templates" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?= $new_sysmenu[130] ?> </a></li>
	</ul-->

            <input type="hidden" name="edit_mode" id="edit_mode" value="<?= $edit_id ?>">
            <div class="msheet tab-content">

                <div class="secfhead">
                    <!-- #section:main/slideshow.head -->
                    <div class="sectitle">
                        <div class="icon"><span class="flaticon-file23" style=""></span></div>
                        <div class="title"><p class="titr">مدیریت اسلاید شو</p>
                            <p class="lead">توضیحات این بخش</p></div>
                    </div>
                    <!-- /section:main/slideshow.head  -->
                    <div class="toolmenu">
                        <ul>
                            <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="راهنما"><span
                                            class="flaticon-help31"></span></a></li>
                        </ul>
                    </div>

                </div>

                <div id="add_templates" class="tab-pane active">
                    <form class="form-horizontal" action="" method="post" name="pasafhe" id="pasafhe" role="form"
                          enctype="multipart/form-data"
                          data-fv-framework="bootstrap"
                          data-fv-message="This value is not valid"
                          data-fv-icon-valid="glyphicon glyphicon-ok"
                          data-fv-icon-invalid="glyphicon glyphicon-remove"
                          data-fv-icon-validating="glyphicon glyphicon-refresh">

                        <div id="id-message-new-navbar" class="message-navbar clearfix">
                            <a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom"
                               title="" class="save submit2" data-original-title="ذخیره">
							<span class="flaticon-verified9">
							</span>
                            </a>
                            <a href="newcoms.php?yep=new_Slideshow" data-toggle="tooltip" data-placement="bottom"
                               title="" class="cencel" data-original-title="بازگشت">
							<span class="flaticon-left-arrow9">
							</span>
                            </a>
                        </div>
                        <label class="col-md-12 H_mt15 center">« راهنمایی:هنگام انتخاب نوع اسلایدشو ، همه اسلاید ها و ارتفاع باید از یک نوع باشند.»</label>
                        </br>
                        <div class="panel-body plr0" id="SEO4">
                            <div class="height65 ">
                                <label class="col-md-2 H_mt8">نوع اسلایدشو:</label>
                                <div class="col-md-2">
                                    <select name="select_type" class="select_type form-control">
                                        <option  <?if ($select_type=='1') echo 'selected';?> value="1">سفارشی</option>
                                        <option <?if ($select_type=='2') echo 'selected';?> value="2">نوع دوم</option>
                                        <option <?if ($select_type=='3') echo 'selected';?> value="3">نوع سوم</option>
                                    </select>
                                </div>
                                <?for ($i=1;$i<=3;$i++){?>
                                    <div class="w35 dis_in_bl center">
                                        <a href="/yep_theme/default/rtl/images/slideshow/temp<?=$i?>.png" class=" without-caption" >
                                            <img width="33" height="33" class="H_cursor_zoom" src="/yep_theme/default/rtl/images/slideshow/temp<?=$i?>.png" >
                                        </a> <label class="font10">فرم<?=$i?></label>
                                    </div>
                                <?}?>
                            </div>

                            <div class="col-md-12 border_b">

                                <div class="row col-md-6">
                                    <label class="col-md-3">زیرسایت</label>
                                    <div class="col-md-9 form-group">
                                        <? create_sub_site_filter_none($site, $coms_conect, $_SESSION['manager_title_site']) ?>
                                    </div>
                                    <label class="col-md-3 H_mt8">زبان</label>
                                    <div class="col-md-9 form-group">
                                        <? create_lang_filter_none($la, $coms_conect, $_SESSION["manager_title_lang"]) ?>
                                    </div>

                                    <label class="col-md-3 H_mt8">موقعیت</label>
                                    <div class="col-md-9 form-group">
                                        <select name="pos_texts" class="form-control">
                                            <? $query_pos = "SELECT * FROM new_slideshow where id='$edit_id'";
                                            // echo $query_pos;
                                            $result_pos = $coms_conect->query($query_pos);
                                            $row_pos = $result_pos->fetch_assoc();
                                            ?>
                                            <option  <?if ($row_pos['pos_texts']=='right') echo 'selected';?> value="right">راست</option>


                                            <option <?if ($row_pos['pos_texts']=='center') echo 'selected';?> value="center">وسط</option>


                                            <option <?if ($row_pos['pos_texts']=='left') echo 'selected';?> value="left">چپ</option>

                                        </select>
                                    </div>

                                    <label class="col-md-3 control-label"
                                           for="family">تصویر*</label>
                                    <div class="form-group col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?= $slide_img1 ?>"
                                                   id="slide_img1" name="slide_img1"/>
                                            <div class="input-group-addon" style="padding: 0px;"><a
                                                        href="/filemanager/dialog.php?type=1&amp;field_id=slide_img1"
                                                        class="btn iframe-btn"
                                                        style="margin: auto;border-radius: 0px;bottom: 1px;height: 32px;">انتخاب</a>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="col-md-3 control-label" for="family">لینک تصویر</label>
                                    <div class="col-md-9 form-group ">
                                        <input name="slide_img_link" class="form-control" value="<?= $slide_img_link ?>" >
                                    </div>

                                </div>

                                <div class="row col-md-6">
                                    <label class="col-md-3 control-label"
                                           for="family"><?= $dl_date ?> <?= $pro_namayesh ?>
                                        *</label>
                                    <div class="form-group col-md-9">
                                        <div class="input-daterange input-group col-md-12">
                                            <input type="text" class="form-control " name="start_date"
                                                   value="<?= $start_date ?>" id="start_date"/>
                                            <span class="input-group-addon">
									<i class="fa fa-exchange"></i>
								</span>
                                            <input type="text" class="form-control " name="finish_date"
                                                   value="<?= $finish_date ?>" id="finish_date"/>
                                        </div>
                                    </div>

                                    <label class="col-md-3 col-sm-1 H_mt8 H_pl0">پریلود:</label>
                                    <div class="form-group col-md-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="<?= $slide_preload ?>"
                                                   id="slide_preload" name="slide_preload">
                                            <span class="input-group-addon" style="padding: 0px;"><a
                                                        href="/filemanager/dialog.php?type=1&amp;field_id=slide_preload"
                                                        class="btn iframe-btn"
                                                        style="margin: auto;border-radius: 0px;bottom: 1px;height: 32px;">انتخاب</a></span>
                                        </div>
                                    </div>


                                    <label class="col-md-3 col-sm-1 H_mt8 H_pl0">ارتفاع(px):</label>
                                    <div class="col-md-9 form-group H_mt4">
                                        <input name="height" value="<?= $height ?>" style="width: 70px">
                                    </div>

                                </div>
                            </div>
                            <div class="show_skins">
                                <div class="height65 ptb15">
                                    <label class="col-md-2 H_mt8">پوسته دکمه های عقب و جلو:</label>
                                    <div class="col-md-2">
                                        <select name="type_arrow" class="type_arrow form-control">
                                            <option  <?if ($type_arrow=='0') echo 'selected';?> value="0">خالی</option>
                                            <option  <?if ($type_arrow=='1') echo 'selected';?> value="1">فرم1</option>
                                            <option <?if ($type_arrow=='2') echo 'selected';?> value="2"> فرم2</option>
                                            <option <?if ($type_arrow=='3') echo 'selected';?> value="3">فرم3 </option>
                                            <option <?if ($type_arrow=='4') echo 'selected';?> value="4">فرم4 </option>
                                            <option <?if ($type_arrow=='5') echo 'selected';?> value="5">فرم5 </option>
                                            <option <?if ($type_arrow=='6') echo 'selected';?> value="6">فرم6 </option>
                                            <option <?if ($type_arrow=='7') echo 'selected';?> value="7">فرم7 </option>
                                            <option <?if ($type_arrow=='8') echo 'selected';?> value="8">فرم8 </option>
                                            <option <?if ($type_arrow=='9') echo 'selected';?> value="9">فرم9 </option>
                                            <option <?if ($type_arrow=='10') echo 'selected';?> value="10">فرم10 </option>
                                            <option <?if ($type_arrow=='11') echo 'selected';?> value="11">فرم11 </option>
                                            <option <?if ($type_arrow=='12') echo 'selected';?> value="12">فرم12 </option>
                                            <option <?if ($type_arrow=='13') echo 'selected';?> value="13">فرم13 </option>
                                            <option <?if ($type_arrow=='14') echo 'selected';?> value="14">فرم14 </option>
                                        </select>
                                    </div>
                                    <?for ($i=1;$i<=14;$i++){?>
                                        <div class="w35 dis_in_bl center">
                                            <a href="/yep_theme/default/rtl/images/img_arrow/form<?=$i?>.png" class=" without-caption" >
                                                <img width="33" height="33" class="H_cursor_zoom" src="/yep_theme/default/rtl/images/img_arrow/form<?=$i?>.png" >
                                            </a> <label class="font10">فرم<?=$i?></label>
                                        </div>
                                    <?}?>
                                    <hr>


                                </div>
                                <div class="height65 ptb15">
                                    <label class="col-md-2 H_mt8">پوسته Bullet ها:</label>
                                    <div class="col-md-2">
                                        <select name="type_bullet" class="$type_bullet form-control">
                                            <option  <?if ($type_bullet=='0') echo 'selected';?> value="0">خالی</option>
                                            <option  <?if ($type_bullet=='1') echo 'selected';?> value="1">فرم1</option>
                                            <option <?if ($type_bullet=='2') echo 'selected';?> value="2"> فرم2</option>
                                            <option <?if ($type_bullet=='3') echo 'selected';?> value="3">فرم3 </option>
                                        </select>
                                    </div>
                                    <?for ($i=1;$i<=3;$i++){?>
                                        <div class="w35 dis_in_bl center">
                                            <a href="/yep_theme/default/rtl/images/img_bullet/form<?=$i?>.png" class=" without-caption" >
                                                <img width="33" height="33" class="H_cursor_zoom" src="/yep_theme/default/rtl/images/img_bullet/form<?=$i?>.png" >
                                            </a> <label class="font10">فرم<?=$i?></label>
                                        </div>
                                    <?}?>
                                    <hr>
                                </div>
                            </div>


                            <script>
                                var l=$(".select_type").val();
                                if (l==='1'){
                                    $('div.show_skins').show();}else $('div.show_skins').hide();
                                $(document).on('change', '.select_type', function () {
                                    var j=$(".select_type").val();
                                    //alert(j);
                                    if (j==='1'){
                                        $('div.show_skins').show();
                                    }else $('div.show_skins').hide();
                                });
                            </script>
                            <div class="col-md-12 H_mt30 options_type3">
                                <label class="col-md-1 control-label" for="family">عنوان:*</label>
                                <div class="form-group col-md-11 ">
                                    <div class="col-md-3 input-group">
                                        <input type="text" class="form-control" name="slide_title" placeholder="عنوان"
                                               value="<?= $slide_title ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">لینک:</label>
                                    <div class="col-md-2 input-group">
                                        <input type="text" class="form-control" name="link_title"
                                               value="<?= $link_title ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">فاصله از بالا:</label>
                                    <div class="col-md-1 input-group">
                                        <input type="text" class="form-control" name="top_title" placeholder="px"
                                               value="<?= $top_title ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">سایز:</label>
                                    <div class="col-md-1 input-group">
                                        <input type="text" class="form-control" name="size_title" placeholder="px"
                                               value="<?= $size_title ?>">
                                    </div>
                                    <label class="col-md-1 col-sm-1 H_pl0">رنگ :</label>
                                    <div class="col-md-1 form-group H_mt4">
                                        <input name="color_title" value="<?= $color_title ?>" class="jscolor "
                                               style="width: 70px">
                                    </div>
                                </div>


                                <label class="col-md-1 control-label" for="family">جمله اول*</label>
                                <div class="form-group col-md-11 ">
                                    <div class="col-md-3 input-group">
                                        <input type="text" class="form-control" name="text1" placeholder="جمله"
                                               value="<?= $text1 ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">لینک:</label>
                                    <div class="col-md-2 input-group">
                                        <input type="text" class="form-control" name="link_text1"
                                               value="<?= $link_text1 ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">فاصله از بالا:</label>
                                    <div class="col-md-1 input-group">
                                        <input type="text" class="form-control" name="top_text1" placeholder="px"
                                               value="<?= $top_text1 ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">سایز:</label>
                                    <div class="col-md-1 input-group">
                                        <input type="text" class="form-control" name="size_text1" placeholder="px"
                                               value="<?= $size_text1 ?>">
                                    </div>
                                    <label class="col-md-1 col-sm-1 H_pl0">رنگ :</label>
                                    <div class="col-md-1 form-group H_mt4">
                                        <input name="color_text1" value="<?= $color_text1 ?>" class="jscolor "
                                               style="width: 70px">
                                    </div>
                                </div>


                                <label class="col-md-1 control-label" for="family">جمله دوم</label>
                                <div class="form-group col-md-11 ">
                                    <div class="col-md-3 input-group">
                                        <input type="text" class="form-control" name="text2" placeholder="جمله"
                                               value="<?= $text2 ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">لینک:</label>
                                    <div class="col-md-2 input-group">
                                        <input type="text" class="form-control" name="link_text2"
                                               value="<?= $link_text2 ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">فاصله از بالا:</label>
                                    <div class="col-md-1 input-group">
                                        <input type="text" class="form-control" name="top_text2" placeholder="px"
                                               value="<?= $top_text2 ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">سایز:</label>
                                    <div class="col-md-1 input-group">
                                        <input type="text" class="form-control" name="size_text2" placeholder="px"
                                               value="<?= $size_text2 ?>">
                                    </div>
                                    <label class="col-md-1 col-sm-1 H_pl0">رنگ :</label>
                                    <div class="col-md-1 form-group H_mt4">
                                        <input name="color_text2" value="<?= $color_text2 ?>" class="jscolor "
                                               style="width: 70px">
                                    </div>

                                </div>


                                <label class="col-md-1 control-label" for="family">جمله سوم</label>
                                <div class="form-group col-md-11 ">
                                    <div class="col-md-3 input-group">
                                        <input type="text" class="form-control" name="text3" placeholder="جمله"
                                               value="<?= $text3 ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">لینک:</label>
                                    <div class="col-md-2 input-group">
                                        <input type="text" class="form-control" name="link_text3"
                                               value="<?= $link_text3 ?>">
                                    </div>

                                    <label class="col-md-1 control-label" for="family">فاصله از بالا:</label>
                                    <div class="col-md-1 input-group">
                                        <input type="text" class="form-control" name="top_text3" placeholder="px"
                                               value="<?= $top_text3 ?>">
                                    </div>
                                    <label class="col-md-1 control-label" for="family">سایز:</label>
                                    <div class="col-md-1 input-group">
                                        <input type="text" class="form-control" name="size_text3" placeholder="px"
                                               value="<?= $size_text3 ?>">
                                    </div>
                                    <label class="col-md-1 col-sm-1 H_pl0">رنگ :</label>
                                    <div class="col-md-1 form-group H_mt4">
                                        <input name="color_text3" value="<?= $color_text3 ?>" class="jscolor "
                                               style="width: 70px">
                                    </div>

                                </div>




                            </div>



                        </div>
                        <div class="panel-footer bttools">
                            <button type="submit" id="submit_page" class="btn btn-success"><span
                                        class="flaticon-verified9"></span><?= $pro_save ?></button>
                            <button type="button" onclick="window.location.href = 'newcoms.php?yep=new_Slideshow'"
                                    class="btn btn-primary"><span class="flaticon-left-arrow9"></span><?= $l_back ?>
                            </button>
                        </div>
                    </form>

                </div>
                <br>
                <!-- #section:main/slideshow.table -->
                <div class="tab-pane <? if ($edit_id == "") echo 'active' ?>" id="tab1"
                     style="background-color: #EFF3F8;">

                    <div class="pull-left btn-xs" id="drop4">
                        <i type="button" class="navbar-toggle btn-danger" data-toggle="collapse"
                           data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span data-toggle="modal" data-target="#delete" href="#" title="حذف گروهی"><i
                                        class="ace-icon fa fa-trash-o bigger-110"></i></span>
                        </i>
                        <div class="collapse navbar-collapse" id="nav-collapse" style="padding: 0px;">
                            <ul class="nav navbar-nav navbar-left">
                                <a class="btn pull-left btn-danger btn-sm del_all" href="#" data-title="delete"
                                   data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"
                                   style="margin-left: 0px;margin-right: -5px;bottom: 5px;">
                                    حذف گروهی
                                </a>
                            </ul>
                        </div>
                    </div>
                    <table cellpadding="0" cellspacing="0" border="0"
                           class="datatable table table-striped table-bordered" width="100%">
                        <thead>
                        <tr>
                            <th class="center">
                                <label class="position-relative">
                                    <input type="checkbox" class="conchkSelectAll"/>
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th><?= $sd_Shop_billing_row ?></th>
                            <th><?= $sd_shop_shipping_title ?></th>
                            <th><?= $new_date_end_view ?></th>
                            <th><?= $dl_site ?></th>

                            <th><?= $new_sysmenu[2] ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? if ($la == '') $la = $default_lang;
                        if ($site == '') $site = $default_site;
                        $query = "SELECT * FROM new_slideshow where la='$la' and site='$site'";
                        $result = $coms_conect->query($query);
                        $i = 1;
                        while ($RS1 = $result->fetch_assoc()) {
                            $id = $RS1["id"];
                            $la = $RS1["la"];
                            $type = $RS1["type"];
                            $madual = get_madules($type);
                            $finish_date = $RS1["finish_date"];
                            $page_id = $RS1["page_id"];
                            ?>
                            <tr>
                                <td class="center">
                                    <label class="position-relative">
                                        <input id="<?= $id ?>" type="checkbox" class="conchkNumber"/>
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td><?= $i; ?></td>
                                <td><a href="<?= $RS1['link'] ?>" target="_blank"><?= $RS1["title"] ?></a></td>
                                <td><?= miladitojalaliuser(date('Y-m-d', $RS1["finish_date"])) ?></td>
                                <td><?= $RS1["site"] ?></td>
                                <td>
                                    <a id="<?= $id ?>" class="edit_menu blue"
                                       href="newcoms.php?yep=new_Slideshow&edit_id=<?= $id ?>"
                                       style="font-size: 15px !important;">
                                        <i class="ace-icon fa fa-edit bigger-120"
                                           title="<?= $sd_shop_shipping_edit ?>"></i>
                                    </a>
                                    <a href="#" id="<?= $id ?>" class="red del_menu" data-title="delete"
                                       data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"
                                       style="font-size: 15px !important;">
                                        <i class="ace-icon fa fa-trash-o bigger-120" title="<?= $l_delete ?>"></i>
                                    </a>
                                </td>
                            </tr>
                            <? $i++;
                        } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /section:main/slideshow.table -->
            </div>
</div>
<style>
    @media (min-width: 767px) {
        .panel-body {
            padding-left: 100px;
            padding-right: 100px;
            padding-top: 65px;
        }
    }

    @media (max-width: 768px) {
        .panel-body {
            padding-top: 70px;
        }
    }
</style>

<? $_SESSION["del_item"] = 'del_slide_show'; ?>
<script type="text/javascript">
    $(".submit2").click(function () {
        $("#status").val("1");
        $("#delete_table").submit();
    });


    $(document).ready(function () {
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

        $('.iframe-btn').fancybox({
            'width': 880,
            'height': 570,
            'type': 'iframe',
            'autoScale': false
        });
    });
    $(".del_menu").click(function () {
        $("#btn_ok").val($(this).attr('id'));
    });
    $("#btn_ok").click(function () {
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=del_slide_show&id=" + $(this).val(),
            success: function (result) {
                //alert(result);
                window.location.href = "newcoms.php?yep=new_Slideshow";
            }
        });
    });

    $(document).on('click', '.conchkSelectAll', function () {
        //$('.conchkSelectAll').click( function() {
        $('.conchkNumber').prop('checked', $(this).is(':checked'));
        var values = $('input:checkbox:checked.conchkNumber').map(function () {
            return $(this).attr('id');
        }).get();
        $("#check_value").val(values);
    });
    $('.conchkNumber').click(function () {

        var values = $('input:checkbox:checked.conchkNumber').map(function () {
            return $(this).attr('id');
        }).get();

        $("#check_value").val(values);
    });

    $(".del_menu").click(function () {
        $("#btn_ok").val($(this).attr('id'));
    });
    $(".del_all").click(function () {
        //alert($("#check_value").val());
        $("#btn_ok").val($("#check_value").val());
    });
    $("#btn_ok").click(function () {
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=del_slid_show&id=" + $(this).val(),
            success: function (result) {
                // alert(result);
                window.location.href = "newcoms.php?yep=new_Slideshow";
            }
        });
    });


</script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>

<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>

<script>
    $(document).ready(function () {

        $("#start_date").datepicker({
            changeMonth: true,
            changeYear: true,
            isRTL: true,
            dateFormat: "yy/mm/dd",
            // Called when a date is selected.
            // See http://api.jqueryui.com/datepicker/#option-onSelect
            onSelect: function (date, inst) {
                // Revalidate the start date field
                $('#delete_table').formValidation('revalidateField', 'start_date');
            }
        });

        // finish_date
        $("#finish_date").datepicker({
            changeMonth: true,
            changeYear: true,
            isRTL: true,
            dateFormat: "yy/mm/dd",

            onSelect: function (date, inst) {
                // Revalidate the start date field
                $('#delete_table').formValidation('revalidateField', 'finish_date');
            }
        });

        $('#delete_table').formValidation({
            framework: 'bootstrap',
            icon: {
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                slide_img1: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        }
                    }
                },
                start_date: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        },

                    }
                },
                finish_date: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        },

                    }
                },
                link: {
                    validators: {
                        notEmpty: {
                            message: 'پر کردن این فیلد الزامی است'
                        },
                        /*uri:{
                            message: 'لطفا url سایت را مطابق فرمت نشان داده شده وارد نمایید'
                        }*/
                    }
                },
                /* slide_title: {
                      validators: {
                          notEmpty: {
                              message: 'پر کردن این فیلد الزامی است'
                          }
                      }
                  }*/
            }
        })
            .on('success.field.fv', function (e, data) {
                if (data.field === 'start_date' && !data.fv.isValidField('finish_date')) {
                    // We need to revalidate the end date
                    data.fv.revalidateField('finish_date');
                }

                if (data.field === 'finish_date' && !data.fv.isValidField('start_date')) {
                    // We need to revalidate the start date
                    data.fv.revalidateField('start_date');
                }
            });
    });
</script>
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

<script src="/yep_theme/default/rtl/js/jscolor.js"></script>
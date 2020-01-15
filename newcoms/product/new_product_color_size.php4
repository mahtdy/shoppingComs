<!--<div id="color_size" class="tab-pane fade">-->
<!--    <div class="page-content-area" id="gallery5">-->
<!--        <div class="page-body" style="margin-top: 25px;">-->
<!--            <fieldset>-->
<!---->
<!---->
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<br>
<?
$modul_name = 'product';
$manage_lang = 'fa';
# SEO Tab
$name_color = injection_replace($_POST['name_color']);
$code_color = injection_replace($_POST['code_color']);
//$catid_val_edit = injection_replace($_POST['catid_val_edit']);
if ((isset($name_color)) && ($name_color > ''))
//    if ($catid_val_edit == 0 || $catid_val_edit == '')
        $sql = "INSERT INTO new_product_color(onvan_color,code_color,rang, status) VALUES ('$name_color','$code_color',0,1)";
    else
        $sql = "UPDATE new_product_color SET onvan_color='$name_color' WHERE id=$id";
    $coms_conect->query($sql);
//    $catid_val_edit = 0;

//$catid = injection_replace($_GET['catid']);
////$catof = injection_replace($_GET['catof']);
//$barrof = injection_replace($_GET['barrof']);
//$sqlcat = "select name from new_modules_cat a,new_product_onvan_barrasi c where  c.id_cat='$catid' AND a.type=4 AND a.la='fa' and a.status=1 AND c.id_cat=a.id";
//$resultcat = $coms_conect->query($sqlcat);
//$rowcat = $resultcat->fetch_assoc();
//$rowcatrowcat = $rowcat['name'];
?>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>
                    آيا از حذف انتخاب خود اطمينان داريد؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok" value="" data-dismiss="modal"
                        class="btn btn-warning btn_ok"><span
                            class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي
                </button>
                <button type="button" id="btn_type" value="" data-dismiss="modal" class="btn btn-warning "><span
                            class="glyphicon glyphicon-remove"></span>&nbsp;خير
                </button>
            </div>
        </div>
    </div>
</div>
<div class="tabbable">
    <div class="msheet tab-content">
        <div class="row">
            <div class="col-md-6">
                <div id="show_seo_div">
                    <!--                    <div class="col-md-6">-->
                    <form id="menu1" name="menu1" action="" role="form" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group" id="cate_tag">
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <label class="col-md-2 control-label">عنوان رنگ</label>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="name_color"
                                               name="name_color">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-md-2 control-label">کد رنگ</label>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="code_color"
                                               name="code_color">
                                    </div>
                                </div>
                                <!--                        <div class="col-md-8">-->
                                <!--                            <label class="col-md-2 control-label">Meta keyword</label>-->
                                <!--                            <div class="form-group col-md-6">-->
                                <!--                                <input type="text" value="-->
                                <? //= $meta_keyword ?><!--" id="meta_keyword" name="meta_keyword"-->
                                <!--                                       class="form-control" data-role="tagsinput"-->
                                <!--                                       title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد"-->
                                <!--                                       placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد"-->
                                <!--                                       style="width: 100%; font-size: inherit;"/>-->
                                <!--                            </div>-->
                                <!---->
                                <!--                        </div>-->
                                <!--                        <div class="col-md-8">-->
                                <!--                            <div class="form-group">-->
                                <!--                                <label class="col-md-2 control-label">Meta Description</label>-->
                                <!--                                <div class="form-group col-md-6">-->
                                <!--                                    <textarea id="meta_desciption" name="meta_desciption" class="form-control" rows="3"-->
                                <!--                                              title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد">-->
                                <? //= $meta_desciption ?><!--</textarea>-->
                                <!--</div>-->
                                <!---->
                                <!--</div>-->
                                <!--</div>-->
                                <!--<div class="col-md-8">-->
                                <!--    <div class="form-group">-->
                                <!--        <label class="col-md-2 control-label">Seo title</label>-->
                                <!--        <div class="form-group col-md-6">-->
                                <!--            <input value="-->
                                <? //= $seo_title ?><!--" type="text" id="seo_title" name="seo_title"-->
                                <!--                   class="form-control">-->
                                <!---->
                                <!--        </div>-->
                                <!---->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            <div class="col-md-6" style="text-align: left">
                                <button type="button" style="width: 110px; font-size: 18px;"
                                        class="btn btn-primary submit2"
                                        id="submit2">اضافه کردن
                                </button>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
<!--                            <input type="hidden" name="catid_val" id="catid_val" value="--><?//= $catid ?><!--">-->
                            <input type="hidden" name="inpt_color_edit" id="inpt_color_edit" value="0">
                            <input type="hidden" name="inpt_size_edit" id="inpt_size_edit" value="0">
                        </div>
                    </form>
                    <!--                    </div>-->
                </div>
                <div class="" id="nes_color">
                </div>

                <script>
                    $.ajax({
                        type: 'POST',
                        url: 'New_ajax_product.php',
                        data: "action=ok_sabt_color",
                        success: function (result) {
                            $('#nes_color').html(result);
                        } });

                    $('#submit2').click(function () {
                        var id = $('#name_color').val();
                        var id_cat = $('#code_color').val();
                        var id_edit = $('#inpt_color_edit').val();
                        // alert('hi');
                        $.ajax({
                            type: 'POST',
                            url: 'New_ajax_product.php',
                            data: "action=ok_sabt_color&name_color=" + id + "&code_color=" + id_cat + "&value="+id_edit,
                            success: function (result) {
                                $('#nes_color').html(result);
                                $('#name_color').val('');
                                $('#code_color').val('');
                                $('#inpt_color_edit').val(0);
                            }
                        });
                    });
                </script>
            </div>
            <div class="col-md-6">

                <div id="show_seo_div">
                    <!--                    <div class="col-md-6">-->
                    <form id="menu1" name="menu1" action="" role="form" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group" id="cate_tag">
                            <div class="col-md-12">
                                <div class="col-md-8">
                                    <label class="col-md-2 control-label">عنوان سایز</label>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="name_size"
                                               name="name_size">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <label class="col-md-2 control-label">سایز اسمی</label>
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" id="code_size"
                                               name="code_size">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" style="text-align: left">
                                <button type="button" style="width: 110px; font-size: 18px;"
                                        class="btn btn-primary submit2"
                                        id="submit2size">اضافه کردن
                                </button>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <!--                        <input type="hidden" name="catid_val" id="catid_val" value="-->
                            <? //= $catid ?><!--">-->
                            <input type="hidden" name="catid_val_edit" id="catid_val_edit_size" value="0">
                        </div>
                    </form>
                    <!--                    </div>-->
                </div>
                <div class="" id="nes_size">
                </div>

                <script>
                    $.ajax({
                        type: 'POST',
                        url: 'New_ajax_product.php',
                        data: "action=ok_sabt_size",
                        success: function (result) {
                            $('#nes_size').html(result);
                        } });

                    $('#submit2size').click(function () {
                        var id = $('#name_size').val();
                        var id_cat = $('#code_size').val();
                        var id_edit = $('#inpt_size_edit').val();
                        // alert('hi');
                        $.ajax({
                            type: 'POST',
                            url: 'New_ajax_product.php',
                            data: "action=ok_sabt_size&name_size=" + id + "&code_size=" + id_cat + "&value="+id_edit,
                            success: function (result) {
                                $('#nes_size').html(result);
                                $('#name_size').val('');
                                $('#code_size').val('');
                                $('#inpt_size_edit').val(0);
                            }
                        });
                    });
                </script>
            </div>
        </div>
        <!--                        <div class="secfhead">-->
        <!--                            <div class="sectitle">-->
        <!--                                <div class="icon"><span class="flaticon-file23" style=""></span></div>-->
        <!--                                <div class="title"><p class="titr">مشخصات اختصاصی</p>-->
        <!--                                    <p class="lead">توضیحات این بخش</p></div>-->
        <!--                            </div>-->
        <!--                            <div class="toolmenu">-->
        <!--                                <ul>-->
        <!--                                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom"-->
        <!--                                                            title=""-->
        <!--                                                            data-original-title="راهنما"><span-->
        <!--                                                    class="flaticon-help31"></span></a></li>-->
        <!--                                    <li>-->
        <!--                                        <a data-toggle="modal" data-target="#searching" data-placement="top"-->
        <!--                                           title="جستجوی پیشرفته">-->
        <!--                                            <span class="flaticon-search74"></span>-->
        <!--                                        </a>-->
        <!--                                    </li>-->
        <!--                                </ul>-->
        <!--                            </div>-->
        <!---->
        <!--                        </div>-->
        <!--=================================================select2===========================================-->

        <!--            </fieldset>-->
        <!--        </div>-->
    </div>
</div>
<!--//===================================================-->

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


<!--<div class="form-group">-->
<!--    <div class="form-group col-sm-12">-->
<!--        <label class="control-label">شرح محصول</label>-->
<!--        <textarea id="text" name="text" class="form-control"-->
<!--                  rows="3">--><? //= $text ?><!--</textarea>-->
<!--        <script>-->
<!--            tinymce.init({-->
<!--                selector: "#text",-->
<!--                height: 300,-->
<!--                width: "99.5%",-->
<!--                directionality: 'rtl',-->
<!--                language: 'fa_IR',-->
<!--                menubar: true,-->
<!--                skin: 'flat',-->
<!--                plugins: [-->
<!--                    "advlist autolink link image lists charmap print preview hr anchor pagebreak code  ",-->
<!--                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",-->
<!--                    "fullscreen table contextmenu directionality emoticons paste textcolor responsivefilemanager "-->
<!--                ],-->
<!--                image_advtab: true,-->
<!--                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertdatetime nonbreaking spellchecker contextmenu directionality emoticons paste textcolor codemirror | responsivefilemanager | image | media | link unlink anchor | print preview |  forecolor backcolor | hr anchor pagebreak searchreplace wordcount visualblocks visualchars | code | fullscreen |  styleselect | fontselect fontsizeselect | table | cut copy paste",-->
<!--                image_advtab: true,-->
<!--                external_filemanager_path: "/filemanager/",-->
<!--                filemanager_title: "مديريت فايل",-->
<!--                external_plugins: {"filemanager": "/filemanager/plugin.min.js"},-->
<!--            });-->
<!--        </script>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--</div>-->
<!---->


<fieldset style="margin-top: -15px;" style=" z-index: 1000002;">
    <div class="tabbable tabs-left">
        <ul class="nav nav-tabs" id="myTab">

            <li class="active">
                <a data-toggle="tab" href="#tab_all">
<!--                    <p class="flaticon-file23"></p>-->
                    همه
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#tab_news">
<!--                    <p class="flaticon-squares36"></p>-->
                    اخبار
                </a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab_product">
<!--                    <p class="flaticon-copy23"></p>-->
                    محصول
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#tab_company">
<!--                    <p class="flaticon-squares36"></p>-->
                    شرکت
                </a>
            </li>

            <li>
                <a data-toggle="tab" href="#tab_content">
<!--                    <p class="flaticon-copy23"></p>-->
                    محتوا
                </a>
            </li>
            <li>
                <a data-toggle="tab" href="#tab_gallery">
<!--                    <p class="flaticon-copy23"></p>-->
                    گالری عکس
                </a>
            </li>


            <!--            <li>-->
            <!--                <a data-toggle="tab" href="#price_vazn">-->
            <!--                    <p class="flaticon-copy23"></p>-->
            <!--                    قیمت و وزن-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a id="tab_color_size" data-toggle="tab" href="#color_size" style="display: none;">-->
            <!--                    <p class="flaticon-copy23"></p>-->
            <!--                    رنگ و سایز-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a data-toggle="tab" href="#SEO3">-->
            <!--                    <p class="flaticon-search103"></p>-->
            <!--                    SEO-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a data-toggle="tab" href="#slide">-->
            <!--                    <p class="flaticon-folder23"></p>-->
            <!--                    اسلايد-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a data-toggle="tab" href="#gallery">-->
            <!--                    <p class="flaticon-folder23"></p>-->
            <!--                    گالری تصاویر-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a id="video_li" data-toggle="tab" href="#blog_video_div">-->
            <!--                    <p class="flaticon-upload36"></p>-->
            <!--                    ویدئو-->
            <!--                </a>-->
            <!--            </li>-->
            <!--            <li>-->
            <!--                <a data-toggle="tab" href="#relatednews">-->
            <!--                    <p class="flaticon-copy23"></p>-->
            <!--                    محصولات مرتبط-->
            <!--                </a>-->
            <!--            </li>-->

        </ul>
        <input type="hidden" id="id_inpt" name="id_inpt" value="">
        <div class="tab-content" style="min-height: 444px!important;">

            <div class="tab-pane active" id="tab_all">


                <div class="form-group row">
                    <div class="form-group col-sm-9">
                        <label class="control-label">all </label>
                        <!--                        <label class="control-label">وضعیت موجودی</label>-->

                        <select class="form-control" name="slct_all" id="slct_all">

                            <?
                            $sql_com = "select id,title from new_product";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>
                                <option value="<?= $RScom['id'] ?>"
                                        id="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                            <?
                            $sql_com = "select id,title from new_news ";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>
                                <option value="<?= $RScom['id'] ?>"
                                        id="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                            <?
                            $sql_com = "select id,title from new_company ";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>
                                <option value="<?= $RScom['id'] ?>"
                                        id="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                            <?
                            $sql_com = "select id,title from new_content ";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>
                                <option value="<?= $RScom['id'] ?>"
                                        id="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                        </select>

                    </div>
                </div>

                <script>
                    /////////////// radio show hide upload image
                    $(document).ready(function () {

                        $('#slct_all').select2();
                        // $('span.cke_dialog_ui_button').on('click',function () {
                        //
                        // alert('ss');
                        // $(this).find('.select2-dropdown-open').addClass('mahhhh');

                        $('div#show_company').attr('style','z-index:1000003;');
                        $('div.select2-with-searchbox').attr('style','z-index:1000009;');
                        // });
                        $('#slct_all').change(function () {
                            var link = '/all/fa/' + $(this).val() + '/'+$('#slct_all option:selected').text();
                        $('#my_link').val(link);
                            var id_lnk=$('#id_inpt').val();
                            // alert(id_lnk);
                            $('#'+id_lnk).val(link);

                        $('#show_company').attr('aria-hidden','true');
                        $('#show_company').attr('style','display:none');
                        $('#show_company').removeClass('in');
                        $('.modal-backdrop').removeClass('modal-backdrop fade in');
                        // $('#my_link').val(link);

                        });


                    });
                </script>
            </div>
            <div class="tab-pane fade" id="tab_company">


                <div class="form-group row">
                    <div class="form-group col-sm-9">
                        <label class="control-label">company </label>
                        <!--                        <label class="control-label">وضعیت موجودی</label>-->

                        <select class="form-control" name="vaz_mojod" id="vaz_mojod">

                            <?
                            $sql_com = "select id,title from new_company ";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>
                                <option value="<?= $RScom['id'] ?>"
                                        data-name="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                        </select>

                    </div>
                </div>

                <script>
                    /////////////// radio show hide upload image
                    $(document).ready(function () {
                        $('#vaz_mojod').select2();
                        $('#vaz_mojod').change(function () {
                            var link = '/company/fa/' + $(this).val() + '/';
                            alert(link);
                        });


                    });
                </script>
            </div>

            <div class="tab-pane fade" id="tab_product">

                <div class="form-group row">
                    <div class="form-group col-sm-9">
                        <label class="control-label">product </label>
                        <!--                        <label class="control-label">وضعیت موجودی</label>-->

                        <select class="form-control" name="slct_product" id="slct_product">

                            <?
                            $sql_com = "select id,title from new_product ";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>
                                <option value="<?= $RScom['id'] ?>"
                                        id="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                        </select>

                    </div>
                </div>

                <script>
                    /////////////// radio show hide upload image
                    $(document).ready(function () {
                        $('#slct_product').select2();
                        $('#slct_product').change(function () {
                            var link = '/product/fa/' + $(this).val() + '/'+$('#slct_product option:selected');
                            alert(link);
                        });


                    });
                </script>
            </div>
            <div class="tab-pane fade" id="tab_news">

                <div class="form-group row">
                    <div class="form-group col-sm-9">
                        <label class="control-label">news </label>
                        <!--                        <label class="control-label">وضعیت موجودی</label>-->

                        <select class="form-control" name="slct_news" id="slct_news">
                            <option value="">select pls</option>
                            <?
                            $sql_com = "select id,title from new_news ";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>


                                <option value="<?= $RScom['id'] ?>"
                                        id="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                        </select>

                    </div>
                </div>

<!--                <div class="form-group row">-->
<!--                    <div class="form-group col-sm-6">-->
<!--                        <label class="control-label">news1 </label>-->
<!---->
<!--                        --><?//  $sql_com = "select id,title from new_news ";
//                        $result = $coms_conect->query($sql_com);
//                        while ($RScom = $result->fetch_assoc()) { ?>
<!--                            <label class="control-label">--><?//= $RScom['id'] ?><!-- </label>-->
<!--                            <br>-->
<!--                            <label class="control-label">--><?//= $RScom['title'] ?><!-- </label>-->
<!--                            <br>-->
<!--                        --><?// } ?>
<!--                    </div>-->
<!--                </div>-->

                <script>
                    /////////////// radio show hide upload image
                    $(document).ready(function () {
                        $('#slct_news').select2();
                        $('#slct_news').change(function () {
                            var link = '/news/fa/' + $(this).val() + '/';
                            alert(link);
                        });


                    });
                </script>
            </div>
            <div class="tab-pane fade" id="tab_content">
                <div class="form-group row">
                    <div class="form-group col-sm-9">
                        <label class="control-label">content </label>
                        <!--                        <label class="control-label">وضعیت موجودی</label>-->

                        <select class="form-control" name="slct_content" id="slct_content">

                            <?
                            $sql_com = "select id,title from new_content ";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>
                                <option value="<?= $RScom['id'] ?>"
                                        id="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                        </select>

                    </div>
                </div>

                <script>
                    /////////////// radio show hide upload image
                    $(document).ready(function () {
                        $('#slct_content').select2();
                        $('#slct_content').change(function () {
                            var link = '/content/fa/' + $(this).val() + '/';
                            alert(link);
                        });


                    });
                </script>
            </div>
            <div class="tab-pane fade" id="tab_gallery">
                <div class="form-group row">
                    <div class="form-group col-sm-9">
                        <label class="control-label">gallery </label>
                        <!--                        <label class="control-label">وضعیت موجودی</label>-->

                        <select class="form-control" name="slct_gallery" id="slct_gallery">

                            <?
                            $sql_com = "select id,title from new_gallery ";
                            $result = $coms_conect->query($sql_com);
                            while ($RScom = $result->fetch_assoc()) {

                                ?>
                                <option value="<?= $RScom['id'] ?>"
                                        id="<?= $RScom['title'] ?>"><?= $RScom['title'] ?></option>

                            <? } ?>
                        </select>

                    </div>
                </div>

                <script>
                    /////////////// radio show hide upload image
                    $(document).ready(function () {
                        $('#slct_gallery').select2();
                        $('#slct_gallery').change(function () {
                            var link = '/gallery/fa/' + $(this).val() + '/';
                            alert(link);
                        });


                    });
                </script>

            </div>

        </div>

    </div>
</fieldset>



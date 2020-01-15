<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/filemanager/plugin.js"></script>
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
<!--<script src="/yep_theme/default/rtl/js/select2.js"></script>-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<script src="ajax_js/company.js"></script>
<!--<script type="text/javascript" src="/yep_theme/default/rtl/js/mapp/dist/js/jquery-3.2.1.min.js"></script>-->


<fieldset>
    <div class="modal fade " id="show_company" tabindex="-1" style="z-index:1000003;">
        <div class="modal-dialog" >
            <div class="modal-content" style="width: 150%">
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
                                <div class="col-md-12">
                                    <div class="form-group" style=" z-index: 1000001;">
                                        <!--                                        <div class="input-group input-group-sm">-->
                                        <? include 'newcoms/p/p2.php4'; ?>
                                        <!--                                            <input type="text" id="related_search" class="form-control search2"-->
                                        <!--                                                   placeholder="" style="top: 0px !important; ">-->
                                        <!--                                            <span class="input-group-addon" style="padding: 0px;">-->
                                        <!--                                                <input type="button" class="btn btn-primary" value="جستجو" name="relate_btn" id="relate_btn" style="margin: auto;border-radius: 0px;bottom: 1px;height: 28px;padding-top: 2px;"></span>-->
                                        <!--                                        </div>-->
                                        <!--                                        <img id="show_waiting_search" src="waiting.gif" dir="center"-->
                                        <!--                                             style="display:none">-->
                                    </div>
                                </div>

                            </div>
                            <!--                            <div id="show_related"></div>-->
                        </div>
                    </div>
                </div>
                <!--                <div class="modal-footer ">-->
                <!--                    <button type="button" id="btn_ok_company00" value="" data-dismiss="modal"-->
                <!--                            class="btn btn-primary conbtnGetAll"><span class="glyphicon glyphicon-ok-sign"></span>-->
                <!--                        افزودن-->
                <!--                    </button>-->
                <!--                </div>-->
            </div>
        </div><!-- /.modal-dialog -->
    </div>
</fieldset>


<div class="form-group">
<!--    <div class="form-group col-sm-12">-->
<!--        <label class="control-label">شرح محصول</label>-->
<!--        <textarea id="text" name="text" class="form-control"-->
<!--                  rows="3">--><?//= $text ?><!--</textarea>-->
<!--        <script>-->
<!--            tinymce.init({-->
<!--                selector: "#text",-->
<!--                height: 300,-->
<!--                width: "99.5%",-->
<!--                directionality: 'rtl',-->
<!--                language: 'fa_IR',-->
<!--                menubar: true,-->
<!--                skin: 'flat',-->
<!--                // mode: "exact",-->
<!--                // init_instance_callback: "myCustomInitInstance",-->
<!---->
<!--                // skin: "o2k7",-->
<!--                skin_variant: "silver",-->
<!---->
<!---->
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
<!---->
<!--            });-->
<!--            // $(document).ready(function () {-->
<!--            //     $('#link_lnk').click(function () {-->
<!--            //         tinyMCE.get().focus();-->
<!--            //         var ttt = tinyMCE.activeEditor.selection.getContent();-->
<!--            //         alert(ttt);-->
<!--            //     });-->
<!--            // });-->
<!---->
<!--        </script>-->
<!--    </div>-->
    <div class="form-group col-sm-12">
        <label class="control-label">button</label>
        <button id="link_lnk">link</button>
        <input type="text" id="my_link" value="0">

    </div>

<!--        ############=====================================###########-->
        <script src="/yep_theme/default/rtl/js/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="/yep_theme/default/rtl/js/ckeditor/contents.css">

    <!--        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>-->

<!--        ############=====================================###########-->
<!--        ############=====================================###########-->
<!--        ############=====================================###########-->
        <div class="form-group col-sm-12">
<!---->
            <textarea name="editor12"></textarea>
        </div>
        <script>
            // CKEDITOR.replace('editor12');
            CKEDITOR.replace( 'editor12', {
                filebrowserBrowseUrl: '/browser/browse.php',
                filebrowserUploadUrl: '/uploader/upload.php'
            });
        </script>

<!--        ############=====================================###########-->
<!--        <a id="cke_22" class="cke_button cke_button__link cke_button_off" href="javascript:void('Link')" title="" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_22_label" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onclick="CKEDITOR.tools.callFunction(28,this);return false;" dideo-checked="true" data-original-title="Link (Ctrl+K)"><span class="cke_button_icon cke_button__link_icon" style="background-image:url('https://cdn.ckeditor.com/4.13.0/standard/plugins/icons.png?t=J8Q8');background-position:0 -528px;background-size:auto;">&nbsp;</span><span id="cke_22_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Link</span><span id="cke_22_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+K</span></a>-->
<!--        ############=====================================###########-->
<!--        ############=====================================###########-->
    <div id="tab_products" class="form-group row tab-pane ">

        <div class="uploadbts">

            <a id="link_opner" data-toggle="modal" data-target="#show_company" data-placement="top" rel="tooltip">
                <button><span class="flaticon-add133"></span><span>افزودن محصول</span></button>
            </a>

        </div>

        <div id="relatedcompany" class="tab-pane ">

        </div>

    </div>
    <!--    ###############===============================####3-->
</div>


<script src="ajax_js/product.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/colorbox.css"/>
<script src="/yep_theme/default/rtl/assets/js/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdowns-enhancement/dropdowns-enhancement.css"/>
<script src="/yep_theme/default/rtl/js/dropdowns-enhancement/dropdowns-enhancement.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrap-editable/bootstrap-editable.css" rel="stylesheet">
<script src="/yep_theme/default/rtl/js/bootstrap-editable/bootstrap-editable.min.js"></script>
<script>
    $("#relate_btn").click(function () {
        $("#show_waiting_search").show();
        $.ajax({
            type: 'POST',
            url: 'New_ajax.php',
            data: "action=show_related_product&id=" + $("#related_search").val(),
            success: function (result) {
                //alert(result);
                $("#show_waiting_search").hide();
                $("#show_related").html(result);
            }
        });
    });

</script>


<!--<div id="tinymce-99" class="mce-rtl mce-container mce-flow-layout-item mce-btn-group" role="group">-->
<!--    <div id="tinymce-70-body">-->
<!--        <div id="tinymce-39" class="mce-widget mce-btn mce-menubtn mce-first mce-last" tabindex="-1"-->
<!--             aria-labelledby="tinymce-39" role="button" aria-label="Table" aria-haspopup="true">-->
<!--            <button id="tinymce-39-open" role="presentation" type="button" tabindex="-1">-->
<!--                <i class="mce-ico mce-i-link">-->
<!---->
<!--                </i>-->
<!--                <i class="mce-caret"></i>-->
<!--            </button>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div id="tab_products" class="form-group row tab-pane ">

    <div class="uploadbts">

        <a data-toggle="modal" data-target="#show_company" data-placement="top" rel="tooltip">
            <button></button>
        </a>

    </div>

    <div id="relatedcompany" class="tab-pane ">

    </div>

</div>
<!---->
<!--<div id="tinymce-99" class="mce-rtl mce-container mce-flow-layout-item mce-btn-group" role="group">-->
<!--    <div id="tinymce-61-body">-->
<!--        <div id="tinymce-199" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" aria-labelledby="tinymce-20"-->
<!--             role="button" aria-label="Insert/edit video">-->
<!--            <button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--<div id="tinymce-90" class="mce-rtl mce-container mce-abs-layout-item mce-last mce-formitem" hidefocus="1" tabindex="-1"-->
<!--     style="left: 20px; top: 140px; width: 399.18px; height: 30px;">-->
<!--    <div id="tinymce-90-body" class="mce-container-body mce-abs-layout" style="width: 399.18px; height: 30px;">-->
<!--        <div id="tinymce-90-absend" class="mce-abs-end"></div>-->
<!--        <label id="tinymce-83-l" class="mce-widget mce-label mce-abs-layout-item mce-first" for="tinymce-83"-->
<!--               style="line-height: 16.25px; left: 369.18px; top: 7px; width: 30px; height: 16.25px;">نحوه ی باز-->
<!--            شدن</label>-->
<!--        <div id="tinymce-83" class="mce-widget mce-btn mce-menubtn mce-listbox mce-abs-layout-item mce-last"-->
<!--             tabindex="-1" aria-labelledby="tinymce-83-l" role="button" aria-haspopup="true"-->
<!--             style="left: 0px; top: 0px; width: 367.187px; height: 28.0078px;">-->
<!--            <button id="tinymce-83-open" role="presentation" type="button" tabindex="-1"-->
<!--                    style="height: 100%; width: 100%;">هیچکدام <i class="mce-caret"></i></button>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<input type="text" id="input">
<script>
    // $(document).ready(function () {
    //     $('#link_lnk').click(function () {
            // alert('33');

            // var someText = '<div id="tinymce-999" class="mce-rtl mce-container mce-flow-layout-item mce-btn-group  class="uploadbts"" role="group"><div id="tinymce-999-body"><div id="tinymce-9999" class="mce-widget mce-btn mce-first mce-last" tabindex="-1" aria-labelledby="tinymce-20" role="button" aria-label="Insert/edit video">        <a data-toggle="modal" data-target="#show_company" data-placement="top" rel="tooltip"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-link"></i></button></a></div></div></div>';
            // var someText = '<span id="cke_46" class="cke_toolbar cke_toolbar_last" aria-labelledby="cke_46_label" role="toolbar"><span id="cke_46_label" class="cke_voice_label">about</span><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"> <a id="link_opner" data-toggle="modal" data-target="#show_company" data-placement="top" rel="tooltip"><span class="cke_button_icon cke_button__about_icon" style="background-image:url(\'https://cdn.ckeditor.com/4.13.0/standard/plugins/icons.png?t=J8Q8\');background-position:0 0px;background-size:auto;">&nbsp;</span><span id="cke_47_label" class="cke_button_label cke_button__about_label" aria-hidden="false">Added My Link</span><span id="cke_47_description" class="cke_button_label" aria-hidden="false"></span></a></span><span class="cke_toolbar_end"></span></span>';
            // var someText = '<a id="cke_22" class="cke_button cke_button__link cke_button_off" href="javascript:void("Link")" title="" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_22_label" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(26,event);" onfocus="return CKEDITOR.tools.callFunction(27,event);" onclick="CKEDITOR.tools.callFunction(28,this);return false;" dideo-checked="true" data-original-title="Link (Ctrl+K)"><span class="cke_button_icon cke_button__link_icon" style="background-image:url("https://cdn.ckeditor.com/4.13.0/standard/plugins/icons.png?t=J8Q8");background-position:0 -528px;background-size:auto;">&nbsp;</span><span id="cke_22_label" class="cke_button_label cke_button__link_label" aria-hidden="false">Link</span><span id="cke_22_description" class="cke_button_label" aria-hidden="false">Keyboard shortcut Ctrl+K</span></a>';
            // $('#cke_46').after(someText);
            // $('#tinymce-89').before(someText);
            // $('#tinymce-53-body').addElement(someText);
        // });
    // });
    // var t = '';
    // function gText(e) {
    //     t = (document.all) ? document.selection.createRange().text : document.getSelection();
    //
    //     document.getElementById('input').value = t;
    // }
    //
    // document.onmouseup = gText;
    // if (!document.all) document.captureEvents(Event.MOUSEUP);
</script>
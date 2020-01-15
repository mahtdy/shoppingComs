<div class="page-content-area">
    <div class="page-body" style="margin-top: 25px;">
        <fieldset>
            <div class="col-md-12">
                <?

//                echo $manage_site . '==';
//                echo "select count(id_com) from new_company_catalog where la='$la' AND  id_com='$edit_id'";
                $count_img_smallBox1 = get_result("select count(id_com) from new_company_catalog where la='$la' AND  id_com='$edit_id'", $coms_conect);
//                echo $count_img_smallBox1;
                $i=0;
                for ($x = 1; $x <= $count_img_smallBox1; $x++) {
                    $img_smallBox1 = get_ctlg_result($la, $edit_id, $coms_conect);
//                    print_r($img_smallBox1);

                    if ($img_smallBox1[$i]['com_ctlg_name'] > "") {
                        ?>
                        <div id="div_mother_third_choice_img_smallBox1<?= $x ?>" class="seyed"
                             style="opacity: 1;">
                            <div class="form-group">
                                <a class="col-md-1 control-label del_img_smallBox1"
                                   id="<?= $x ?>"
                                   for="family"><i
                                            class="fa fa-trash text-danger remove"
                                            title="" data-original-title="حذف"></i>

                                </a>

                                <div class="form-group col-md-11">

                                    <div class="col-md-4 input-group float-r">
                                        <input type="text"
                                               id="img_smallBox1_title<?= $x ?>"
                                               value="<?= $img_smallBox1[$i]["com_ctlg_name"] ?>"
                                               class="form-control"
                                               placeholder="عنوان"
                                               name="img_smallBox1_title<?= $x ?>">
                                    </div>


                                    <div class="col-md-8 input-group float-l">
                                        <input type="text"
                                               id="img_smallBox1_pic<?= $x ?>"
                                               value="<?= $img_smallBox1[$i]["com_ctlg_adrs"] ?>"
                                               class="form-control"
                                               placeholder=" تصویر"
                                               name="img_smallBox1_pic<?= $x ?>"
                                               style="direction: ltr;">
                                        <span class="input-group-addon"
                                              style="padding: 0px;"><a
                                                    href="/filemanager/dialog.php?type=2&amp;field_id=img_smallBox1_pic<?= $x ?>"
                                                    class="btn btn-success iframe-btn"
                                                    style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span
                                                        class="addimg flaticon-add139"></span></a>
                                                                                                         </span>
                                        <span class="input-group-addon H_neshane1 H_img_smallBox1<?= $x ?>"
                                              style="padding: 0px;">
                                                                                <div id="img_smallBox1_avatar7<?= $x ?>"
                                                                                     orakuploader="on"></div>
                                            <? $img_smallBox1 = get_ctlg_result($la, $edit_id, $coms_conect); ?>
                                                                            <input type="hidden"
                                                                                   id="img_smallBox1_avatar7_link<?= $x ?>"
                                                                                 title="<?=$img_smallBox1[$i]["id"];?>"  name="img_smallBox1_avatar7_link<?= $x ?>"
                                                                                   value="<?= $img_smallBox1[$i]["com_ctlg_img_adrs"] ?>">
                                            																	<input type='hidden' value='<?= $img_smallBox1[$i]["com_ctlg_img"] ?>' name='img_smallBox1_avatar7<?=$x?>[]' />

                                                                                                                   </span>
                                    </div>
                                    <div class="ui-sortable red box" id="upload_type_img_smallBox1<?= $x ?>"
                                         style="float:right;">
                                    </div>
                                    <div class="input-group" id="image_show_img_smallBox1<?= $x ?>">

                                        <a href="<?= $img_smallBox1[$i]["com_ctlg_img_adrs"] ?>" class=" without-caption">
                                            <img width="33" height="33" class="H_cursor_zoom"
                                                 src="<?= $img_smallBox1[$i]["com_ctlg_img_adrs"] ?>"
                                                 alt="<?= $img_smallBox1[$i]["com_ctlg_img"] ?>">
                                        </a>
                                    </div>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#img_smallBox1_avatar7<?=$x?>').orakuploader({
                                                orakuploader_path: 'new_orakuploader/',
                                                orakuploader_main_path: 'source/comsroot/defualt/catalog_pic',
                                                orakuploader_thumbnail_path: 'source/comsroot/defualt/catalog_pic/tn',
                                                orakuploader_use_main: false,
                                                //orakuploader_use_sortable : true,
                                                orakuploader_use_dragndrop: true,
                                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                                orakuploader_add_label: '',
                                                //orakuploader_resize_to: <?//=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>//,
                                                orakuploader_thumbnail_size: 400,
                                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                                orakuploader_maximum_uploads: 1
                                            });

                                            $('#img_smallBox1_avatar7<?= $x ?>').val("<?= $img_smallBox1[$i]["com_ctlg_img_adrs"] ?>");
                                        });
                                    </script>
                                </div>

                            </div>

                        </div>
                        <?
                    }
              $i++;  }
                $xcount_mahsol = $x;
                ?>
                <input type="hidden" id="img_smallBox1_count"
                       name="img_smallBox1_count"
                      value="<?= --$xcount_mahsol; ?>">

                <script>
                    $(document).ready(function () {
                        var i = <?=$x?>;

                        $('#add_img_smallBox1-ads').on("click", function () {
                            var someText = '<div id="div_mother_third_choice_img_smallBox1' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del_img_smallBox1" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <div class="form-group col-md-11"><div class="col-md-4 input-group float-r"><input type="text" id="img_smallBox1_title' + i + '" value="" class="form-control" placeholder="عنوان" name="img_smallBox1_title' + i + '" ></div> <div class="col-md-8 input-group float-l"> <input type="text" id="img_smallBox1_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="img_smallBox1_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=img_smallBox1_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add139"></span></a></span><span class="input-group-addon H_neshane1 H_img_smallBox1' + i + '" style="padding: 0px;"><div  id="img_smallBox1_avatar7' + i + '" orakuploader="on"></div><input type="hidden" id="img_smallBox1_avatar7_link' + i + '" name="img_smallBox1_avatar7_link' + i + '" value=" "></span></div><div class="ui-sortable red box" id="upload_type_img_smallBox1' + i + '" style="float:right;"></div></div></div></div>';
                            $(this).before(someText);


                            $('#div_mother_third_choice_img_smallBox1' + i + '').fadeTo('slow', 0.3, function () {
                                $(this).css('background', '');
                            }).fadeTo('slow', 1);
                            $('#img_smallBox1_count').val(i);

                            //--------orakuploader
                            $('#img_smallBox1_avatar7' + i + '').orakuploader({
                                orakuploader_path: 'new_orakuploader/',
                                orakuploader_main_path: 'source/comsroot/defualt/catalog_pic',
                                orakuploader_thumbnail_path: 'source/comsroot/defualt/catalog_pic/tn',
                                orakuploader_use_main: false,
                                //orakuploader_use_sortable : true,
                                orakuploader_use_dragndrop: true,
                                orakuploader_add_image: 'new_orakuploader/images/add.png',
                                orakuploader_add_label: '',
                                //orakuploader_resize_to: <?//=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>//,
                                orakuploader_thumbnail_size: 400,
                                orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                orakuploader_maximum_uploads: 1
                            });

    $('#img_smallBox1_avatar7' + i + '').val("<?= $img_smallBox1[$i]["com_ctlg_img_adrs"] ?>");

                            $('.input-group-addon.H_img_smallBox1' + i + '').find("div").first().next().css('width', '100px');
                            $('.input-group-addon.H_img_smallBox1' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                            //    ---end orakuploader
                            i++;
                        });
                        $(document).on('click', '.del_img_smallBox1', function () {
                            var id = '';
                            var k = $('#img_smallBox1_count').val();
                            k--
                            id = $(this).attr('id');

                            var id_ctlg= $('#img_smallBox1_avatar7_link'+ id).attr('title');
                            // alert(id_ctlg);
                            $('#div_mother_third_choice_img_smallBox1' + id).remove();
                            $('#img_smallBox1_count').val(k);
                            $.ajax({
                                type:'POST',
                                url:'New_ajax_company.php',
                                data:"action=del_company_ctlg&id_ctlg="+id_ctlg,
                                success: function(result){
                                    // alert(id_ctlg);
                                }
                                    // $("#relatedcompany_representation").html(result);
                                    // $("#btn_del_related_company_representation").val('');
                            });

                        });
                    });


                </script>
                <a class="btn btn-success block" id="add_img_smallBox1-ads"><i
                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                            class="fa fa-plus"></i>افزودن تخصص </a>
                </br>
            </div>
        </fieldset>
    </div>


</div>

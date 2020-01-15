<div class="page-content-area">
    <div class="page-body" style="margin-top: 25px;">
        <fieldset>
            <div class="col-md-12">
                <?

//                echo $manage_site . '==';
//                echo "select count(id_com) from new_company_catalog where la='$la' AND  id_com='$edit_id'";
                $count_img_expertise ="select count(id) from new_doctor_takhasos where  id_doc='$edit_id'";
//                echo $count_img_expertise;
                $sql_expertise = "select * from new_doctor_takhasos WHERE  id_doc='$edit_id'";
                $result_expertise = $coms_conect->query($sql_expertise);
                $x = 1;
                while ($img_expertise = $result_expertise->fetch_assoc()) {
//                    print_r($img_expertise);


                    if ($img_expertise['takhasos'] > "") {

                        ?>
                        <div id="div_mother_third_choice_img_expertise<?= $x ?>" class="seyed"
                             style="opacity: 1;">
                            <div class="form-group">
                                <a class="col-md-1 control-label del_img_expertise"
                                   id="<?= $x ?>"
                                   for="family"><i
                                            class="fa fa-trash text-danger remove"
                                            title="" data-original-title="حذف"></i>

                                </a>

                                <div class="form-group col-md-11">

                                    <div class="col-md-4 input-group float-r">
                                        <input type="text"
                                               id="expertise_name<?= $x ?>"
                                               value="<?= $img_expertise["takhasos"] ?>"
                                               class="form-control"
                                               placeholder="تخصص"
                                               name="expertise_name<?= $x ?>">
                                        <input type="hidden"
                                               id="doctor_expertise_id<?= $x ?>"
                                               name="doctor_expertise_id<?= $x ?>"
                                               value="<?= $img_expertise['id']; ?>">
                                        <input type="hidden"
                                               id="doctor_expertise_id_com<?= $x ?>"
                                               name="doctor_expertise_id_com<?= $x ?>"
                                               value="<?= $img_expertise['id_doc']; ?>">
                                    </div>


                                </div>
                                <input type="hidden" id="val_tkh"
                                       value="<?= $x ?>" name="val_tkh">

                            </div>

                        </div>
                        <?
                    }
              $x++;  }
//                $xcount_mahsol = $x;
                ?>
<!--                <input type="hidden" id="img_expertise_count"-->
<!--                       name="img_expertise_count"-->
<!--                      value="--><?//= $x; ?><!--">-->

                <script>
                    $(document).ready(function () {
                        var i = <?=$x?>;

                        $('#add_img_expertise-ads').on("click", function () {
                            var someText = '<div id="div_mother_third_choice_img_expertise' + i + '" class="seyed" style="background:#87B87F;"> ' +
                                '<div class="form-group"><a class="col-md-1 control-label del_img_expertise" id="' + i + '" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> ' +
                                '<div class="form-group col-md-11"><div class="col-md-4 input-group float-r">' +
                                '<input type="text" id="expertise_name' + i + '"  class="form-control" placeholder="تخصص" name="expertise_name' + i + '" >' +
                                '</div>' +
                                // ' <div class="col-md-8 input-group float-l">' +
                                // ' <input type="text" id="img_expertise_pic' + i + '" value="" class="form-control" placeholder="لینک تصویر" name="img_expertise_pic' + i + '" style="direction: ltr;"><span class="input-group-addon" style="padding: 0px;"> <a href="/filemanager/dialog.php?type=2&amp;field_id=img_expertise_pic' + i + '" class="btn btn-success iframe-btn" style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;"><span class="addimg flaticon-add139"></span></a></span><span class="input-group-addon H_neshane1 H_img_expertise' + i + '" style="padding: 0px;">' +
                                // '<div  id="img_expertise_avatar7' + i + '" orakuploader="on"></div>' +
                                '<input type="hidden" id="val_tkh" name="val_tkh" value="' +i+ '"></span></div><div class="ui-sortable red box" id="upload_type_img_expertise' + i + '" style="float:right;"></div></div>' +
                                '</div></div>'+
                                '</div></div>';
                            $(this).before(someText);


                            // $('#div_mother_third_choice_img_expertise' + i + '').fadeTo('slow', 0.3, function () {
                            //     $(this).css('background', '');
                            // }).fadeTo('slow', 1);
                            // $('#img_expertise_count').val(i);
                            //
                            // --------orakuploader
                            // $('#img_expertise_avatar7' + i + '').orakuploader({
                            //     orakuploader_path: 'new_orakuploader/',
                            //     orakuploader_main_path: 'source/comsroot/defualt/catalog_pic',
                            //     orakuploader_thumbnail_path: 'source/comsroot/defualt/catalog_pic/tn',
                            //     orakuploader_use_main: false,
                            //     orakuploader_use_sortable : true,
                                // orakuploader_use_dragndrop: true,
                                // orakuploader_add_image: 'new_orakuploader/images/add.png',
                                // orakuploader_add_label: '',
                                //orakuploader_resize_to: <?//=get_result("select address from new_default_navbar where name='content_pic_size'  and la='fa' and site='main'", $coms_conect)?>//,
                                // orakuploader_thumbnail_size: 400,
                                // orakuploader_watermark: 'new_gallery/watermark/water_mark.png0',
                                // orakuploader_maximum_uploads: 1
                            // });
    //
    //$('#img_expertise_avatar7' + i + '').val("<?//= $img_expertise[$i]["com_ctlg_img_adrs"] ?>//");
    //
    //                         $('.input-group-addon.H_img_expertise' + i + '').find("div").first().next().css('width', '100px');
    //                         $('.input-group-addon.H_img_expertise' + i + '').find("div").first().next().find("div").first().css('float', 'right');
                            //    ---end orakuploader
                            i++;
                        });
                        $(document).on('click', '.del_img_expertise', function () {
                            var id = '';
                            var k = $('#img_expertise_count').val();
                            k--
                            id = $(this).attr('id');

                            var id_ctlg= $('#img_expertise_avatar7_link'+ id).attr('title');
                            // alert(id_ctlg);
                            $('#div_mother_third_choice_img_expertise' + id).remove();
                            $('#img_expertise_count').val(k);
                            $.ajax({
                                type:'POST',
                                url:'New_ajax_company.php',
                                data:"action=del_doctor_expert&id_ctlg="+id_ctlg,
                                success: function(result){
                                    // alert(id_ctlg);
                                }
                                    // $("#relatedcompany_representation").html(result);
                                    // $("#btn_del_related_company_representation").val('');
                            });

                        });
                    });


                </script>
                <a class="btn btn-success block" id="add_img_expertise-ads"><i
                            style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                            class="fa fa-plus"></i>افزودن تخصص </a>
                </br>
            </div>
        </fieldset>
    </div>


</div>

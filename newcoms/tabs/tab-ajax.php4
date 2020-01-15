<? if ($value==1){?>
        <div  class="tab-pane">
            <div class="page-content-area">
                <div class="page-body" style="margin-top: 25px;">
                    <fieldset>
                        <div class="col-md-12">
                            <?
                            $first_choice_box_tab = get_tem_result($secend_value, $field_nmae, "first_choice_box_tab$id", $tem, $coms_conect);?>
                            <div id="div_mother_first_choicedel_first_choice_box_tab<?=$id?>" class="seyed"
                                 style="opacity: 1;">
                                <div class="form-group">

                                    <div class="form-group col-md-12">

                                        <div class=" H_first_choice_box_tab<?=$id?> col-md-4 input-group">
                                            <input type="hidden"
                                                   id="first_choice_box_subcat_val_tab<?=$id?>"
                                                   name="first_choice_box_subcat_val_tab<?=$id?>"
                                                   value="<?= $first_choice_box_tab['pic'] ?>">

                                            <select id="first_choice_box_cat_tab<?=$id?>"
                                                    data-selectid="1"
                                                    class="form-control H_first_choice_box_cat_tab<?=$id?>"
                                                    name="first_choice_box_cat_tab<?=$id?>">
                                                <? $sql1 = "SELECT name,id from new_modules  a    where view=1";
                                                $result1 = $coms_conect->query($sql1);
                                                echo "<option value='0'>انتخاب کنید</option>";
                                                while ($row = $result1->fetch_assoc()) {
                                                    $str = '';
                                                    if ($row['id'] == $first_choice_box_tab['link'])

                                                        $str = 'selected';
                                                    echo "<option $str value='{$row['id']}'>{$row['name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div id="first_choice_box_tab<?=$id?>" class="col-md-4 input-group">

                                        </div>

                                        <script>
                                            $(document).ready(function () {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'New_ajax.php',
                                                    data: "action=first_choice_box_tab<?=$id?>&id=" + $("#first_choice_box_cat_tab<?=$id?>").val() + "&value=" + $("#first_choice_box_subcat_val_tab<?=$id?>").val() + "&field_nmae=" + '<?=$field_nmae?>' + "&secend_value=" + '<?=$id?>' ,
                                                    success: function (result) {
                                                        $('#first_choice_box_tab<?=$id?>').html(result);
                                                    }
                                                });
                                            });
                                        </script>
                                        <div class="col-md-3 input-group">
                                            <select id="first_choice_box_Fixed_selection_cat_tab<?=$id?>"
                                                    data-selectid="1"
                                                    class="form-control modules_class"
                                                    name="first_choice_box_Fixed_selection_cat_tab<?=$id?>">
                                                <option <?
                                                if ($first_choice_box_tab['text'] == 0) echo 'selected'; ?>
                                                        value='0'>جدیدترین ها
                                                </option>
                                                <option <?
                                                if ($first_choice_box_tab['text'] == 1) echo 'selected'; ?>
                                                        value='1'>پربازدیدترین ها
                                                </option>
                                                <option <?
                                                if ($first_choice_box_tab['text'] == 2) echo 'selected'; ?>
                                                        value='2'>پربحث ترین ها
                                                </option>
                                            </select>

                                        </div>
                                        <div class="col-md-1 input-group">
                                            <input type="hidden"
                                                   id="first_choice_box_number_tab<?=$id?>"
                                                   value="1"
                                                   class="form-control H_cursor_no-drup"
                                                   placeholder="تعداد"
                                                   name="first_choice_box_number_tab<?=$id?>">
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <script>

                                $(document).on('change', '.H_first_choice_box_cat_tab<?=$id?>', function () {
                                    var thisElement = $(this).parents('.H_first_choice_box_tab<?=$id?>').next();
                                    $.ajax({
                                        type: 'POST',
                                        url: 'New_ajax.php',
                                        data: "action=first_choice_box_tab1&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$field_nmae?>' + "&user_id=" + $(this).data('selectid')+ "&secend_value=" + '<?=$id?>',
                                        success: function (result) {
                                            //$('#first_choice_box_tab<?=$id?>//').html(result);
                                            thisElement.empty();
                                            thisElement.append(result);
                                        }
                                    });
                                });
                            </script>

                            </br>
                        </div>
                        <!-- /section:download/download.link -->
                    </fieldset>
                </div>
            </div>
        </div>
    <?}elseif ($value==2){?>

        <div class="tab-pane">
            <div class="page-content-area">
                <div class="page-body" style="margin-top: 25px;">
                    <fieldset>
                        <div class="col-md-12">
                            <?
                            $second_choice_box_tab = get_tem_result($secend_value, $field_nmae, "second_choice_box_tab$id", $tem, $coms_conect);
                            ?>

                            <div id="div_mother_second_choicedel_second_choice_box_tab<?=$id?>" class="seyed"
                                 style="opacity: 1;">
                                <div class="form-group">

                                    <div class="form-group col-md-12">

                                        <div class=" H_second_choice_box_tab<?=$id?> col-md-3 input-group">
                                            <input type="hidden"
                                                   id="second_choice_box_subcat_val_tab<?=$id?>"
                                                   name="second_choice_box_subcat_val_tab<?=$id?>"
                                                   value="<?= $second_choice_box_tab['pic'] ?>">
                                            <input type="hidden"
                                                   id="second_choice_box_subcat_link_tab<?=$id?>"
                                                   name="second_choice_box_subcat_link_tab<?=$id?>"
                                                   value="<?= $second_choice_box_tab['pic_adress'] ?>">

                                            <select id="second_choice_box_cat_tab<?=$id?>"
                                                    data-selectid="1"
                                                    class="form-control H_second_choice_box_cat_tab<?=$id?>"
                                                    name="second_choice_box_cat_tab<?=$id?>">
                                                <? $sql_under_slideshow = "SELECT name,id from new_modules  a    where view=1";
                                                $result_under_slideshow = $coms_conect->query($sql_under_slideshow);
                                                echo "<option value='0'>انتخاب کنید</option>";
                                                while ($row0 = $result_under_slideshow->fetch_assoc()) {
                                                    $str = '';

                                                    if ($row0['id'] == $second_choice_box_tab['link'])

                                                        $str = 'selected';
                                                    echo "<option $str value='{$row0['id']}'>{$row0['name']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div id="second_choice_box_tab<?=$id?>"
                                             class="col-md-3 input-group">
                                        </div>

                                        <div id="second_choice_box_content_tab<?=$id?>"
                                             class="col-md-6 input-group">
                                        </div>

                                        <script>
                                            $(document).ready(function () {
                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'New_ajax.php',
                                                    data: "action=second_choice_box_tab&id=" + $("#second_choice_box_cat_tab<?=$id?>").val() + "&value=" + $("#second_choice_box_subcat_val_tab<?=$id?>").val() + "&field_nmae=" + '<?=$field_nmae?>' +"&secend_value=" + '<?=$id?>' ,
                                                    success: function (result) {
                                                        $('#second_choice_box_tab<?=$id?>').html(result);
                                                    }
                                                });
                                            });
                                            $(document).ready(function () {
                                                //   alert( $("#second_choice_box_subcat_link_tab<?=$id?>").val());
                                                $.ajax({
                                                    type: 'POST',
                                                    url: 'New_ajax.php',
                                                    data: "action=second_choice_box_content_tab&id=" + $("#second_choice_box_subcat_val_tab<?=$id?>").val() + "&value=" + $("#second_choice_box_subcat_link_tab<?=$id?>").val() + "&secend_value=" + $("#second_choice_box_subcat_link_tab<?=$id?>").val() + "&field_nmae=" + '<?=$field_nmae?>'  +"&user_id=" + '<?=$id?>',
                                                    success: function (result) {
                                                        $('#second_choice_box_content_tab<?=$id?>').html(result);
                                                    }
                                                });
                                            });
                                        </script>

                                    </div>
                                </div>

                            </div>

                            <script>

                                $(document).on('change', '.H_second_choice_box_cat_tab<?=$id?>', function () {
                                    var thisElement = $(this).parents('.H_second_choice_box_tab<?=$id?>').next();

                                    $.ajax({
                                        type: 'POST',
                                        url: 'New_ajax.php',
                                        data: "action=second_choice_box_tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$field_nmae?>' + "&user_id=" + $(this).data('selectid') +"&secend_value=" + '<?=$id?>',
                                        success: function (result) {
                                            //$('#second_choice_box_tab<?=$id?>//').html(result);
                                            thisElement.empty();
                                            thisElement.append(result);
                                        }
                                    });
                                });

                                $(".second_choice_box_neshane_tab<?=$id?>").change(function () {

                                    $.ajax({
                                        type: 'POST',
                                        url: 'New_ajax.php',
                                        data: "action=second_choice_box_tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$field_nmae?>' +"&secend_value=" + '<?=$id?>' ,
                                        success: function (result) {
                                            $('#second_choice_box_tab<?=$id?>').html(result);
                                        }
                                    });
                                });
                                $(document).on('change', '.second_choice_box_neshane_tab<?=$id?>', function () {

                                    //  $(".second_choice_box_neshane_tab<?=$id?>").change(function () {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'New_ajax.php',
                                        data: "action=second_choice_box_content_tab&id=" + $(this).val() + "&value=" + $(this).attr('id') + "&field_nmae=" + '<?=$field_nmae?>'  +"&user_id=" + '<?=$id?>',
                                        success: function (result) {
                                            $('#second_choice_box_content_tab<?=$id?>').html(result);
                                        }
                                    });
                                });
                            </script>

                            </br>
                        </div>
                        <!-- /section:download/download.link -->
                    </fieldset>
                </div>
            </div>
        </div>

    <?}elseif ($value==3){?>

        <!--form1-->
        <div class="panel panel-default H_mb0">
            <?
            $third_choice_box_form1_tab = get_tem_result($secend_value, $field_nmae, "third_choice_box_form1_tab$id", $tem, $coms_conect);
            ?>
            <div class="panel-heading container-fluid H_p0">
                <div class="panel-title H col-md-12" style="display: inline-block">
                    <div class="col-md-7 col-sm-12 col-xs-12 H_right">

                        <input value="1"
                               type="checkbox" <? if ($third_choice_box_form1_tab['link'] == 1) echo 'checked' ?>
                               class="ace ace-switch ace-switch-6 "
                               name="third_choice_box_form1_link_tab<?=$id?>"
                               style="direction: rtl;"><span class="lbl H_mb7"></span>


                        <a data-toggle="collapse" data-parent="#accordion" href="#question-tab<?=$id?>-1" class="collapsed">
                            <span class="question" style="max-width: 500px;display: inline-block;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-wrap: break-word;margin-top: 15px;">حالت اول <b class="arrow fa fa-angle-down"></b></span>
                        </a>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 pull-left" style="float:left;position: relative;padding-left: 0px;font-size: 12px; text-align:left; margin-top: 4px">
                        <a href="new_template/drbanihosseini_pregnancy/img/form1.jpg" class=" without-caption" >
                            <img width="40" height="40" class="H_cursor_zoom" src="new_template/drbanihosseini_pregnancy/img/form1.jpg" alt="form1">
                        </a>
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

                </div>
            </div>
            <div id="question-tab<?=$id?>-1" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="family">متن اول </label>
                        <div class="form-group col-md-9">
                            <div class="col-md-12 input-group">
                                <textarea type="text" class="form-control" id="third_choice_box_form1_title_tab<?=$id?>" name="third_choice_box_form1_title_tab<?=$id?>">
                                    <?= $third_choice_box_form1_tab["title"] ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <? for ($i=1;$i<=2;$i++){
                        $third_choice_box_form1_tab_btn = get_tem_result($secend_value, $field_nmae, "third_choice_box_form1_tab_btn$i$id", $tem, $coms_conect);
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="family">دکمه <?=$i?> </label>
                            <div class="form-group col-md-9">
                                <div class="col-md-12 input-group">
                                    <input type="text" class="form-control" name="third_choice_box_form1_btn_title_tab<?=$i?><?=$id?>"
                                           value="<?= $third_choice_box_form1_tab_btn['title'] ?>" style="direction: rtl;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="family">لینک دکمه <?=$i?> </label>
                            <div class="form-group col-md-9">
                                <div class="col-md-12 input-group">
                                    <input type="text" class="form-control" name="third_choice_box_form1_btn_link_tab<?=$i?><?=$id?>"
                                           value="<?= $third_choice_box_form1_tab_btn['link'] ?>" style="direction: rtl;">
                                </div>
                            </div>
                        </div>
                    <?}?>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="family">متن دوم </label>
                        <div class="form-group col-md-9">
                            <div class="col-md-12 input-group">
                                <textarea type="text" class="form-control" id="third_choice_box_form1_text_tab<?=$id?>" name="third_choice_box_form1_text_tab<?=$id?>">
                                    <?= $third_choice_box_form1_tab["text"] ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="family">بک گراند </label>
                        <div class="form-group col-md-9">
                            <div class="col-md-12 input-group">
                                <div class="col-md-5 input-group">
                                    <input type="text"
                                           id="third_choice_box_form1_pic_tab<?=$id?>"
                                           value="<?= $third_choice_box_form1_tab['pic'] ?>"
                                           class="form-control"
                                           placeholder=" تصویر"
                                           name="third_choice_box_form1_pic_tab<?=$id?>"
                                           style="direction: ltr;">
                                    <span class="input-group-addon"
                                          style="padding: 0px;"><a
                                                href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_box_form1_pic_tab<?=$id?>"
                                                class="btn btn-success iframe-btn"
                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                    <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                          style="padding: 0px;">
                                                                                <div  id="third_choice_box_form1_pic_avatar_orak_tab<?=$id?>" orakuploader="on"></div>
                                                                            </span>
                                </div>
                                <div class="ui-sortable red box" id="upload_type_third_choice_box_form1_pic_tab<?=$id?>"
                                     style="float:right;">
                                </div>
                                <div class="col-md-1 input-group" id="image_show_third_choice_box_form1_pic_tab<?=$id?>">
                                    <? $third_choice_box_form1_tab = get_tem_result($secend_value, $field_nmae, "third_choice_box_form1_tab$id", $tem, $coms_conect);?>
                                    <a href="<?= $third_choice_box_form1_tab["pic"] ?>" class=" without-caption" >
                                        <img width="33" height="33" class="H_cursor_zoom" src="<?= $third_choice_box_form1_tab["pic"] ?>" alt="<?= $third_choice_box_form1_tab["pic"] ?>">
                                    </a>

                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#third_choice_box_form1_pic_avatar_orak_tab<?=$id?>').orakuploader({
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

                                        $('#third_choice_box_form1_pic_avatar_orak_tab<?=$id?>').html("<?=$pic_str?>");
                                    });
                                </script>
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

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--form2-->
        <div class="panel panel-default H_mb0">
            <?
            $third_choice_box_form2_tab = get_tem_result($secend_value, $field_nmae, "third_choice_box_form2_tab$id", $tem, $coms_conect);
            ?>
            <div class="panel-heading container-fluid H_p0">
                <div class="panel-title col-md-12" style="display: inline-block">
                    <div class="col-md-7 col-sm-12 col-xs-12 H_right ">
                        <input value="1"
                               type="checkbox" <? if ($third_choice_box_form2_tab['link'] == 1) echo 'checked' ?>
                               class="ace ace-switch ace-switch-6 "
                               name="third_choice_box_form2_link_tab<?=$id?>"
                               style="direction: rtl;"><span class="lbl H_mb7"></span>

                        <a data-toggle="collapse" data-parent="#accordion" href="#question-tab<?=$id?>-2" class="collapsed">
                            <span class="question" style="max-width: 500px;display: inline-block;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-wrap: break-word;margin-top: 15px;">حالت دوم<b class="arrow fa fa-angle-down"></b></span>
                        </a>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 pull-left" style="float:left;position: relative;padding-left: 0px;font-size: 12px; text-align:left;">
                        <a href="new_template/drbanihosseini_pregnancy/img/form2.jpg" class=" without-caption" >
                            <img width="40" height="40" class="H_cursor_zoom" src="new_template/drbanihosseini_pregnancy/img/form2.jpg" alt="form2">
                        </a>
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

                </div>
            </div>
            <div id="question-tab<?=$id?>-2" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="family">متن </label>
                        <div class="form-group col-md-9">
                            <div class="col-md-12 input-group">
                                <textarea type="text" class="form-control" id="third_choice_box_form2_title_tab<?=$id?>" name="third_choice_box_form2_title_tab<?=$id?>">
                                    <?=$third_choice_box_form2_tab["title"] ?>
                                </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane">
                        <div class="page-content-area">
                            <div class="page-body" style="margin-top: 25px;">
                                <fieldset>
                                    <!-- #section:download/download.link -->
                                    <div class="col-md-12">
                                        <? $count_ul_name_form2_tab = get_result("select count(id) from new_tem_setting where la='$field_nmae' and site='$secend_value' and tem_name='$tem' and name like 'ul_name_form2_tab$id%' ", $coms_conect);
                                        for ($k = 1; $k <= $count_ul_name_form2_tab; $k++) {
                                            $ul_name_form2_tab= get_tem_result($secend_value, $field_nmae, "ul_name_form2_tab$id$k", $tem, $coms_conect);
                                            if ($ul_name_form2_tab['title'] > "") {
                                                ?>

                                                <div id="ads_ul_name_form2_tab<?=$id?><?=$k?>" class="seyed"
                                                     style="opacity: 1;">
                                                    <div class="form-group">
                                                        <a class="col-md-1 control-label del-ads_ul_name_form2_tab<?= $id ?><?=$k?>"
                                                           id="<?= $id ?><?=$k?>"
                                                           for="family">
                                                            <i class="fa fa-trash text-danger remove"
                                                               title="" data-original-title="حذف">
                                                            </i>
                                                        </a>
                                                        <label class="col-md-2 control-label" for="family">عنوان
                                                            <?= $k ?></label>
                                                        <div class="form-group col-md-9">

                                                            <div class="col-md-6 input-group">
                                                                <input type="text"
                                                                       id="ul_name_form2_title_ads_tab<?= $id ?><?= $k ?>"
                                                                       value="<?= $ul_name_form2_tab["title"] ?>"
                                                                       class="form-control"
                                                                       placeholder="عنوان"
                                                                       name="ul_name_form2_title_ads_tab<?= $id ?><?= $k ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <?
                                            }
                                        }
                                        $count_ul_name_form2_tab = $k;
                                        ?>
                                        <input type="hidden" id="ul_name_form2_count_tab<?= $id ?><?= $k?>"
                                               name="ul_name_form2_count_tab<?= $id ?><?= $k?>"
                                               value="<?= --$count_ul_name_form2_tab ?>">

                                        <script>
                                            $(document).ready(function () {
                                                var i = <?=$k?>;

                                                $('#add_ul_name_form2_tab<?= $id ?>').on("click", function () {
                                                    var someText = '<div id="ads_ul_name_form2_tab<?= $id ?>'+ i +'" class="seyed" style="background:#87B87F;"> <div class="form-group"><a class="col-md-1 control-label del-ads_ul_name_form2_tab<?= $id ?>'+ i +'" id="<?= $id ?>'+ i +'" for="family"><i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> <label class="col-md-2 control-label" for="family">عنوان#<?= $id ?>'+ i +'</label> <div class="form-group col-md-9"> <div class="col-md-6 input-group"><input type="text" id="ul_name_form2_title_ads_tab<?= $id ?>'+ i +'" value="" class="form-control" placeholder="عنوان" name="ul_name_form2_title_ads_tab<?= $id ?>'+ i +'" ></div></div></div></div>';
                                                    $(this).before(someText);
                                                    $('#ads_ul_name_form2_tab<?= $id ?>'+ i +'').fadeTo('slow', 0.3, function () {
                                                        $(this).css('background', '');
                                                    }).fadeTo('slow', 1);
                                                    $('#ul_name_form2_count_tab<?= $id ?>'+ i +'').val(i);
                                                    i++;
                                                });
                                                $(document).on('click', '.del-ads_ul_name_form2_tab<?=$id?><?=$k?>', function () {
                                                    var id = '';

                                                    var p = $('#ul_name_form2_count_tab<?= $id ?><?= $k?>').val();
                                                    p--
                                                    id = $(this).attr('id');

                                                    $('#ads_ul_name_form2_tab' + id ).remove();
                                                    $('#ul_name_form2_count_tab<?= $id ?><?= $k?>').val(p);
                                                });
                                            });

                                        </script>
                                        <a class="btn btn-success block" id="add_ul_name_form2_tab<?= $id ?>"><i
                                                    style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                                    class="fa fa-plus"></i>افزودن لینک</a>
                                        </br>
                                    </div>
                                    <!-- /section:download/download.link -->
                                </fieldset>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label" for="family">بک گراند </label>
                        <div class="form-group col-md-9">
                            <div class="col-md-12 input-group">
                                <div class="col-md-5 input-group">
                                    <input type="text"
                                           id="third_choice_box_form2_pic_tab<?=$id?>"
                                           value="<?=$third_choice_box_form2_tab['pic'] ?>"
                                           class="form-control"
                                           placeholder=" تصویر"
                                           name="third_choice_box_form2_pic_tab<?=$id?>"
                                           style="direction: ltr;">
                                    <span class="input-group-addon"
                                          style="padding: 0px;"><a
                                                href="/filemanager/dialog.php?type=2&amp;field_id=third_choice_box_form2_pic_tab<?=$id?>"
                                                class="btn btn-success iframe-btn"
                                                style="padding: 6px 5px 2px 5px;vertical-align: bottom;border-radius: 0px;margin: auto;height: 32px;padding-top: 4px;">
                                                                                    <span class="addimg flaticon-add139"></span></a>
                                                                            </span>
                                    <span class="input-group-addon H_neshane1 H_third_choice_box6"
                                          style="padding: 0px;">
                                                                                <div  id="third_choice_box_form2_pic_avatar_orak_tab<?=$id?>" orakuploader="on"></div>
                                                                            </span>
                                </div>
                                <div class="ui-sortable red box" id="upload_type_third_choice_box_form2_pic_tab<?=$id?>"
                                     style="float:right;">
                                </div>
                                <div class="col-md-1 input-group" id="image_show_third_choice_box_form2_pic_tab<?=$id?>">
                                    <?$third_choice_box_form2_tab = get_tem_result($secend_value, $field_nmae, "third_choice_box_form2_tab$id", $tem, $coms_conect);?>
                                    <a href="<?=$third_choice_box_form2_tab["pic"] ?>" class=" without-caption" >
                                        <img width="33" height="33" class="H_cursor_zoom" src="<?=$third_choice_box_form2_tab["pic"] ?>" alt="<?=$third_choice_box_form2_tab["pic"] ?>">
                                    </a>

                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $('#third_choice_box_form2_pic_avatar_orak_tab<?=$id?>').orakuploader({
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

                                        $('#third_choice_box_form2_pic_avatar_orak_tab<?=$id?>').html("<?=$pic_str?>");
                                    });
                                </script>
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

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--form3-->
        <div class="panel panel-default H_mb0">
            <?
            $third_choice_box_form3_tab = get_tem_result($secend_value, $field_nmae, "third_choice_box_form3_tab$id", $tem, $coms_conect);
            ?>
            <div class="panel-heading container-fluid H_p0">
                <div class="panel-title col-md-12" style="display: inline-block">
                    <div class="col-md-7 col-sm-12 col-xs-12 H_right">
                        <input value="1"
                               type="checkbox" <? if ($third_choice_box_form3_tab['link'] == 1) echo 'checked' ?>
                               class="ace ace-switch ace-switch-6 "
                               name="third_choice_box_form3_link_tab<?=$id?>"
                               style="direction: rtl;"><span class="lbl H_mb7"></span>

                        <a data-toggle="collapse" data-parent="#accordion" href="#question-tab<?=$id?>-3" class="collapsed">
                            <span class="question" style="max-width: 500px;display: inline-block;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;word-wrap: break-word;margin-top: 15px;">حالت سوم<b class="arrow fa fa-angle-down"></b></span>
                        </a>
                    </div>
                    <div class="col-md-5 col-sm-12 col-xs-12 pull-left" style="float:left;position: relative;p
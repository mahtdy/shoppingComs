<div id="SEO3" class="tab-pane">

    <!-- #section:ads/ads.seo -->

    <script>
        $(document).ready(function () {
            $("#new_cate_add").hide();
            $("#add_plus").click(function () {
                $("#new_cate_add").show();
            });
            $("#cate_tag").show();
        });
    </script>
    <div class="col-md-12" style="margin-top: 25px;">

        <div class="col-md-6">

            <div id="show_seo_div">
                <div class="col-md-12">
                    <div class="form-group" id="cate_tag">
                        <label class="control-label">برچسب</label>
                        <p class="fdesc" style="width: 100px;"><span class="flaticon-information51"></span><span>متن راهنما</span>
                        </p>
                        <div class="form-group" style="display: flex;">
                            <select id="meta_label" multiple name="meta_label[]" class="select2 " type="text"
                                    style="width:90%">
                                <? $query = "select id,key_count,name from new_keyword where la='fa'";
                                $result = $coms_conect->query($query);
                                while ($RS1 = $result->fetch_assoc()) {
                                    ?>
                                    <option <? if (($label[0]) > "" && in_array($RS1['id'], $label)) echo 'selected'; ?>
                                            value="<?= $RS1['id'] ?>"><?= $RS1['name'] ?></option>
                                <? } ?>
                            </select>
                            <!--input  type="hidden" value='<?= $label ?>' name="meta_label" id="meta_label" rows="5" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input select2-default"  style="width: 100%; "-->
                            <? if ($_SESSION["can_add"] == 1) { ?>
                                <span id="add_plus" class="btn btn-success" style="padding-top: 10px;"><i
                                            class="fa fa-lg fa-plus"></i></span>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group" id="new_cate_add">
                    <label class="control-label" style="text-align: right;">برچسب جدید</label>
                    <div class="form-group" style="display: flex;">
                        <input type="text" name="new_label" id="new_label" class="form-control">

                        <input id="add_new_label_btn" class="btn btn-success" value="افزودن" style="width:66px">
                        <img id="show_waiting_seo" src="/waiting.gif" style="display:none">
                    </div>
                </div>

            </div>
            <? if ($_SESSION["can_add"] == 1) { ?>

                <script>
                    $(document).ready(function () {
                        $("#meta_label").select2({
                            //tags: true;
                        });
                        $("#add_new_label_btn").click(function () {
                            if ($("#new_label").val()) {
                                $("#show_waiting_seo").show();
                                var keyword = $("#new_label").val();
                                $.ajax({
                                    type: 'POST',
                                    url: 'New_ajax.php',
                                    data: "action=add_new_label&id=" + $("#new_label").val() + "&value=" + $("#manage_lang").val(),
                                    success: function (result) {
                                        $("#show_waiting_seo").hide();
                                        $("#new_label").val('');
                                        var newStateVal = keyword;
                                        if ($("#meta_label").find("option[value='" + newStateVal + "']").length) {
                                            $("#meta_label").val(newStateVal).trigger("change");
                                        } else {
                                            var newState = new Option(newStateVal, result, true, true);
                                            $("#meta_label").append(newState).trigger('change');
                                        }


                                    }

                                });

                            }
                        });


                    });


                </script>
            <? } ?>

            <div class="col-md-12">
                <div class="form-group">
                    <label style="font-family: sans-serif;">Meta keyword</label>
                    <p class="fdesc" style="width: 100px;"><span
                                class="flaticon-information51"></span><span>متن راهنما</span></p>
                    <div class="form-group">
                        <input type="text" value="<?= $meta_keyword ?>" id="meta_keyword" name="meta_keyword"
                               value="<?= $meta_keyword ?>" class="form-control" data-role="tagsinput"
                               title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد"
                               placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد"
                               style="width: 100%; font-size: inherit;"/>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label style="font-family: sans-serif;">Meta Description</label>
                    <p class="fdesc" style="width: 100px;"><span
                                class="flaticon-information51"></span><span>متن راهنما</span></p>
                    <div class="form-group">
                        <textarea id="meta_desciption" name="meta_desciption" class="form-control" rows="3"
                                  title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $meta_desciption ?></textarea>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label style="font-family: sans-serif;">Seo Title</label>
                    <p class="fdesc" style="width: 100px;"><span
                                class="flaticon-information51"></span><span>متن راهنما</span></p>
                    <div class="form-group">
                        <input type="text" id="seo_title" name="seo_title" class="form-control"
                               value="<?= $seo_title ?>" title="حداکثر 1 کلمه و 255 کاراکتر بهتر است باشد">
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label style="font-family: sans-serif;">انتخاب برچسب کلیدی</label>
                    <p class="fdesc" style="width: 100px;"><span
                                class="flaticon-information51"></span><span>متن راهنما</span></p>
                    <div class="form-group">

                        <!--                            <div class="form-group" style="display: flex;">-->
                        <select id="meta_label1" name="meta_label1" class="select2 " type="text" style="width:90%">
                            <? $query1 = "select id,key_count,name from new_hashtag where la='fa'";
                            $result1 = $coms_conect->query($query1);
                            while ($RS11 = $result1->fetch_assoc()) {
                                ?>
                                <option <? if (($meta_label1) > "" && in_array($RS11['id'], $meta_label1)) echo 'selected'; ?>
                                        value="<?= $RS11['id'] ?>"><?= $RS11['name'] ?></option>
                            <? } ?>
                        </select>

                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $("#meta_label1").select2({
                    //tags: true;
                });
            });

        </script>

        <div class="col-md-6">
            <div class="alert alert-info">نکات زیر را در افزودن برچسب رعایت کنید
                <br>
                در صورت نیاز به افزودن برچسب جدید اول برچسب ها را اضافه کنید
            </div>
            <!--video id="example_video_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="none" width="100%" height="350px"
                poster="/source/comsroot/qq.jpg" data-setup="{}">
                <source id="show_add_video_modual" src="http://localhost/new_video_pic/default.MP4" type='video/mp4'/>
            </video-->
        </div>
    </div>
    <!-- /section:ads/ads.seo -->
</div>

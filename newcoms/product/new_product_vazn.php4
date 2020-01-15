<div class="tab-pane fade" id="meqdar">
    <div class="page-content-area" id="more7">
        <div class="page-body" style="margin-top: 25px;">
            <fieldset>
                <!-- #section:download/download.link -->
                <div class="col-md-12">
                    <!--                                                            <input type="hidden" id="product_ph_links_count"-->
                    <!--                                                                   name="product_ph_links_count" value="2">-->
                    <?
                    if ($edit_id > '') {
                        $count_meqdar = "select count(id) from new_product_meqdarvazn where id_pro='$edit_id'";
                        $query_meqdar = "select * from new_product_meqdarvazn WHERE  id_pro='$edit_id'";
                        $result_meqdar = $coms_conect->query($query_meqdar);
                        $i = 1;
                        while ($row_meqdar = $result_meqdar->fetch_assoc()) {
//                                                                echo $count_meqdar;
//                                                                print_r($row_meqdar);}exit;
//                                                                    if ($)
                            ?>
                            <div id="ads_product_links_meqdar<?= $i ?>"
                                 class="seyed"
                                 style="opacity: 1;">
                                <div class="form-group">
                                    <a class="col-md-1 control-label del-ads-adres"
                                       id="<?= $i ?>" for="family">
                                        <i class="fa fa-trash text-danger"
                                           title="حذف"
                                           style="font-size:20px;"></i></a>
                                    <label class="col-md-2 control-label"
                                           for="family"> واحد <?= $i ?></label>

                                    <div class="form-group col-md-9">
                                        <div class="col-md-3 input-group float-r">
                                            <input type="text"
                                                   id="product_meqdar_onvan<?= $i ?>"
                                                   class="form-control"
                                                   placeholder="اندازه واحد"
                                                   name="product_meqdar_onvan<?= $i ?>"
                                                   value="<?= $row_meqdar['vahed']; ?>">
                                        </div>
                                        <!--                                        <div class="col-md-6 input-group float-r">-->
                                        <!--                                            <input type="text"-->
                                        <!--                                                   id="product_meqdar_matn-->
                                        <?//= $i ?><!--"-->
                                        <!--                                                   class="form-control"-->
                                        <!--                                                   placeholder="توضیح ویژگی"-->
                                        <!--                                                   name="product_meqdar_matn-->
                                        <?//= $i ?><!--"-->
                                        <!--                                                   value="-->
                                        <?//= $row_meqdar['matn_vije']; ?><!--">-->
                                        <!--                                        </div>-->

                                        <input type="hidden"
                                               id="product_ad_id<?= $i ?>"
                                               name="product_ad_id<?= $i ?>"
                                               value="<?= $row_meqdar['id']; ?>">
                                        <input type="hidden"
                                               id="product_ad_id_pro<?= $i ?>"
                                               name="product_ad_id_pro<?= $i ?>"
                                               value="<?= $row_meqdar['id_pro']; ?>">


                                    </div>

                                    <input type="hidden" id="val_meqdar"
                                           value="<?= $i ?>" name="val_meqdar">
                                </div>
                            </div>

                            <?
//                    }
                            $i++;
                        }
                    }
                    //                $xcount_mahsol = $x;
                    ?>
                    <a class="btn btn-success block" id="add-adres-ads1"><i
                                style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                class="fa fa-plus"></i>افزودن واحد جدید </a>
                    <br>

                    <input type="hidden" id="product_ad_links_count"
                           name="product_ad_links_count" value="<?= $i ?>">


                    <a class="btn btn-success " id="sabt_vahed"><i
                                style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                class="fa fa-plus"></i>ثبت و ذخیره </a>

                    <!--                                                            <input type="text" id="val_i"  name="val_i" value="-->
                    <? //= $i ?><!--">-->
                    <script>
                        $(document).ready(function () {
                            // alert(i + 'i');

                            // $('#product_ph_links_title1').mask("(+99) 9999-9999", {placeholder: ""});

                            var i = <?=$i?>;
                            // alert(i + 'i');
                            $('#add-adres-ads1').on("click", function () {
                                // alert(i + 'ok click shod');
                                var someText = '<div id="ads_product_links_phone' + i + '" class="seyed" style="background:#87B87F;"> <div class="form-group">' +
                                    '<a class="col-md-1 control-label del-ads-phone" id="' + i + '" for="family">' +
                                    '<i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> ' +
                                    '<label class="col-md-2 control-label" for="family">واحد ' + i + '</label> ' +
                                    '<div class="form-group col-md-9"> ' +
                                    '<div class="col-md-3 input-group float-r">' +
                                    '<input type="text" id="product_meqdar_onvan' + i + '" value="" class="form-control" placeholder="اندازه واحد" name="product_meqdar_onvan' + i + '" ></div>' +
                                    // '<div class="col-md-6 input-group float-r">' +
                                    // '<input type="text" id="product_meqdar_matn' + i + '" value="" class="form-control"  placeholder="توضیح ویژگی" name="product_meqdar_matn' + i + '" ></div>' +
                                    '<input type="hidden" id="val_meqdar" value="' + i + '"  name="val_meqdar" >' +
                                    '</div></div></div>';

                                $(this).before(someText);
                                $('#ads_product_links_meqdar' + i + '').fadeTo('slow', 0.3, function () {
                                    $(this).css('background', '');
                                }).fadeTo('slow', 1);
                                $('#product_ad_links_count').val(i);
                                // $('#product_ph_links_title' + i + '').mask("(+99) 9999-9999", {placeholder: ""});
                                i++;
                            });


                            $(document).on('click', '.del-ads-adres', function () {
                                var id = '';
                                var p = $('#product_ad_links_count').val();
                                p--
                                id = $(this).attr('id');
                                var id_meqdar = $('#product_ad_id' + id).val();
                                // alert('idph='+id_phone);
                                $('#ads_product_links_meqdar' + id).remove();
                                $('#product_ad_links_count').val(p);
                                $.ajax({
                                    type: 'POST',
                                    url: 'New_ajax_product_tozie1.php',
                                    data: "action=del_product_meqdar&id_meqdar=" + id_meqdar,
                                    success: function (result) {
                                        // alert(id_ctlg);
                                    }

                                });
                            });


                            $('#sabt_vahed').click(function () {
                                var count_i = $('#val_meqdar').val();
                                for (i = 1; i <= count_i; i++) {
                                    var vahed = $('#product_meqdar_onvan' + i).val();

                                <?

                                    $sql = "insert into new_product_meqdarvazn (vahed)values('$date')";
                                    ?>
                                }
                                
                            })

                        });


                    </script>

                </div>
                <!-- /section:download/download.link -->
            </fieldset>
        </div>
    </div>
</div>

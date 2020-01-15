<div class="tab-pane fade" id="barrasi">
    <div class="page-content-area" id="more7">
        <div class="page-body" style="margin-top: 25px;">
            <fieldset>
                <!-- #section:download/download.link -->
                <?
                //                        $id_val=null;
                if ($edit_id > '') {
                    $query_edit = "select delicated_id_cat,id from new_product_delicated_values where   product_id='$edit_id'";
                    $result_edit = $coms_conect->query($query_edit);
                    $RS_edit = $result_edit->fetch_assoc();
                    $id_val = $RS_edit['delicated_id_cat'];
//                            echo 'idval='.$id_val.'q='.$query_edit;
                }
                $query = "select name,id from new_modules_cat where type='4' and status=1 and la='$la'";
                $result = $coms_conect->query($query);
                $j = 0;
                echo "<div class='col-md-3 form-group'><select name='cat_id_barrasi' id='cat_id_barrasi'  data-id='" . $RS['id'] . "' class='form-control' disabled><option>دسته بندی اصلی انتخاب نشده است</option>";
                while ($RS = $result->fetch_assoc()) {
                    $str = '';
                    if ($filter_cat_id == $RS['id'])
                        $str = 'selected';
                    if ($j == 0) $first_catid = $RS['id'];
                    ?>
                    <option $str value='<?= $RS['id'] ?>' <?
                    if ($RS['id'] == $id_val) echo 'selected'; ?> ><?= $RS['name'] ?></option>"<?
                    $j++;
                }
                echo "</select></div>";
                ?>
                <div class="col-md-12 form-group" id="result_property_barrasi"></div>

                <?
                if ($edit_id > '' ) { ?>
                    <script>


                        var catasl = $('#cat_asli').val();
                        // alert(catasl);
                        var edit_id =<?=$edit_id?>;
                        if(catasl!=0) {

                            // alert('a1='+a);


                            // var catasl = $('#cat_asli').val();
                            // alert('asl=' + catasl+'=='+a+'=='+edit_id);
                            // a=catasl;
                            $('#cat_id_barrasi').val(catasl);
                            // alert('a='+a);
                            $.ajax({
                                type: 'POST',
                                url: 'New_ajax_product.php',
                                data: "action=product_property_cat_barrasi&id=" + catasl + "&edit_id=" + edit_id,
                                success: function (result) {
                                    $("#result_property_barrasi").html(result);
                                }
                            });
                        }
                        $('#cat_asli').change(function () {
                            var catasl=$('#cat_asli').val();
                            // alert('asl=' + catasl+'=='+a+'=='+edit_id);
                            // a=catasl;
                            $('#cat_id_barrasi').val(catasl);
                            // alert('a='+a);
                            $.ajax({
                                type: 'POST',
                                url: 'New_ajax_product.php',
                                data: "action=product_property_cat_barrasi&id=" + catasl+ "&edit_id=" + edit_id,
                                success: function (result) {
                                    $("#result_property_barrasi").html(result);
                                }
                            });
                        });
                        // $.ajax({
                        //     type: 'POST',
                        //     url: 'New_ajax_product.php',
                        //     data: "action=product_property_cat_barrasi&id=" + a + "&edit_id=" + edit_id,
                        //     success: function (result) {
                        //         $("#result_property_barrasi").html(result);
                        //     }
                        // })
                        // $('#cat_id_barrasi').change(function () {
                        //     a = $(this).find(':selected').attr('value');
                        //     // alert('a2='+a);
                        //     $.ajax({
                        //         type: 'POST',
                        //         url: 'New_ajax_product.php',
                        //         data: "action=product_property_cat_barrasi&id=" + a + "&edit_id=" + edit_id,
                        //         success: function (result) {
                        //             $("#result_property_barrasi").html(result);
                        //         }
                        //     });
                        // });
                    </script>
                <? }else{
                ?>
                    <script>


                        // var catasl=$('#cat_asli').val();
                        // // alert('asl=' + catasl+'=='+a+'=='+edit_id);
                        // // a=catasl;
                        // $('#cat_id_barrasi').val(catasl);
                        // // alert('a='+a);
                        // $.ajax({
                        //     type: 'POST',
                        //     url: 'New_ajax_product.php',
                        //     data: "action=product_property_cat_barrasi&id=" + catasl+ "&edit_id=" + edit_id,
                        //     success: function (result) {
                        //         $("#result_property_barrasi").html(result);
                        //     }
                        // });
                        $('#cat_asli').change(function () {
                            var catasl=$('#cat_asli').val();
                            // alert('asl=' + catasl+'=='+a+'=='+edit_id);
                            // a=catasl;
                            $('#cat_id_barrasi').val(catasl);
                            // alert('a='+a);
                            $.ajax({
                                type: 'POST',
                                url: 'New_ajax_product.php',
                                data: "action=product_property_cat_barrasi&id=" + catasl,
                                success: function (result) {
                                    $("#result_property_barrasi").html(result);
                                }
                            });
                        });
                        // $('#cat_id_barrasi').change(function () {
                        //     a = $(this).find(':selected').attr('value');
                        //     // alert('a='+a);
                        //     $.ajax({
                        //         type: 'POST',
                        //         url: 'New_ajax_product.php',
                        //         data: "action=product_property_cat_barrasi&id=" + a,
                        //         success: function (result) {
                        //             $("#result_property_barrasi").html(result);
                        //         }
                        //     });
                        // });
                    </script>
                <? } ?>


                <!-- /section:download/download.link -->
            </fieldset>
        </div>
    </div>
</div>

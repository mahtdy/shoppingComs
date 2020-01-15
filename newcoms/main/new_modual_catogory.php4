<div id="cat3" class="tab-pane">
    <div class="page-content-area" id="more7">
        <div class="page-body" style="margin-top: 25px;">
            <fieldset>
                <!-- #section:ads/ads.cat -->
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="form-group col-sm-6">
                            <label class="control-label">دسته بندی اصلی</label>
                            <select class="form-control" name="cat_asli" id="cat_asli">
                                ?>
                                <option value="">دسته بندی اصلی خود را انتخاب کنید :</option>
                                <?
                                //                                                    $query1="select a.cat_id,b.name from  new_modules_catogory a,new_modules_cat b where a.cat_id=b.id AND a.page_id='$edit_id' and b.type=$type";
                                //                                                            if ($edit_id>''){
                                //                                                                $query_pro="select id,cat_asli from  new_product  where id=$edit_id ";
                                //                                                            $result_pro = $coms_conect->query($query_pro);
                                //                                                            $RS112 = $result_pro->fetch_assoc();
                                //                                                            echo $RS112['cat_asli'];}
                                $query1 = get_result_array_fild("id", "select id,name from  new_modules_cat  where status=1 AND type=$type AND la='fa' ORDER BY rang ASC", $coms_conect);
                                $query2 = get_result_array_fild("parent_id", "select parent_id,name from  new_modules_cat  where status=1 AND parent_id>0 AND type=$type AND la='fa' ORDER BY rang ASC", $coms_conect);
                                $query2 = array_diff($query1, $query2);
                                $query1 = "select id,name from  new_modules_cat  where status=1 AND type=$type AND la='fa' ORDER BY rang ASC";
                                //                                                            print_r($query1);
                                //                                                            print_r($query2);
                                //                                                            print_r($ww3);

                                //                                                            $query1="SELECT id,name FROM new_modules_cat a ,new_cat_permission b WHERE
                                //	                                                       type='$type' and a.id=b.menu_id and permission=1 and a.status=1   and a.la='$la' and b.group_id=$manager_group  ORDER BY   rang";
                                //                                                    echo $query1;exit;
                                $result1 = $coms_conect->query($query1);
                                while ($RS11 = $result1->fetch_assoc()) {
                                    if (in_array($RS11['id'], $query2)) {
                                        ?>
                                        <option value="<?= $RS11["id"] ?>" <? if ($cat_asli == $RS11["id"]) echo 'selected' ?> ><?= $RS11['name'] ?>
                                        </option>
                                    <? }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <h4>دسته بندی</h4>
                    <div id="jstree-proton-2" class="proton-demo"></div>
                    <? if ($la == '') $la = 'fa';
                    $cat_arr[] = "";
                    if ($edit_id > "") {
                        $query = "select cat_id from new_modules_catogory where page_id='$edit_id' and type=$type";
                        if (isset($type_2))
                            $query = "select cat_id from new_modules_catogory where page_id='$edit_id' and type=$type and type_2=$type_2";

                        $result = $coms_conect->query($query);
                        while ($RS1 = $result->fetch_assoc()) {
                            $cat_arr[] = $RS1["cat_id"];
                        }
                    } else
                        $cat_arr[] = "";


                    ?>
                    <script>

                        $(function () {
                            $('#jstree-proton-2').jstree({
                                'plugins': ["wholerow", "checkbox"],
                                'checkbox': { //new config
                                    'keep_selected_style': true,
                                    'three_state': true,
                                    'tie_selection': true
                                    // ,
                                    // 'cascade':'up'
                                },
                                'core': {
                                    'data': [
                                        <?creat_fistr_madual_cat_permission(0, $edit_id, $cat_arr, $manager_group, $type, $coms_conect, $la);?>],
                                    'themes': {
                                        'name': 'proton',
                                        'responsive': true
                                    }
                                }
                            });
                        });

                        $(function () {
                            $('#jstree-proton-2').jstree({'plugins': ["wholerow", "checkbox"]});
                            $('#jstree-proton-2').on("changed.jstree", function (event, data) {
                                $("#array_value").val(data.selected);
                                // alert(data.selected);
                            });
                            // alert('ff');
                        });
                        $('#cat_asli').select2();
                        $('#cat_asli').change(function () {
                            var id = $(this).val();
                            $('li#' + id).click();
                            $('li#' + id).find("i.jstree-checkbox").click();

                        })

                        // $(document).on('click','li',function () {
                        //     alert($(this).attr('id'));
                        // });
                    </script>
                </div>
                <!-- /section:ads/ads.cat -->
            </fieldset>
            <br><br><br><br><br><br><br><br><br>
        </div>
    </div>
</div>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">

<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<br>
<?


# SEO Tab

$catid = injection_replace($_GET['catid']);
$catof = injection_replace($_GET['catof']);


$sqlcat = "SELECT name FROM  new_modules_cat WHERE  id=$catid";
//echo $sqlcat;exit;
$resultcat = $coms_conect->query($sqlcat);
$rowcat = $resultcat->fetch_assoc();
//echo $rowcat['name'];exit;
$rowcatrowcat = $rowcat['name'];


//echo 'cadit='.$catof;
//$meta_keyword = injection_replace($_POST['meta_keyword']);
//$meta_desciption = injection_replace($_POST['meta_desciption']);
//$seo_title = injection_replace($_POST['seo_title']);
?>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title custom_align" id="Heading">حذف</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف دسته
                    زير اطمينان داريد؟
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" id="btn_ok" value="" data-dismiss="modal" class="btn btn-warning btn_ok"><span
                            class="glyphicon glyphicon-ok-sign"></span>&nbsp;بلي
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-warning "><span
                            class="glyphicon glyphicon-remove"></span>&nbsp;خير
                </button>
            </div>
        </div>
    </div>
</div>
<?

if ($catof == '0'){

?>

<div class="tabbable">
    <div class="msheet tab-content">
        <div class="secfhead">
            <div class="sectitle">
                <div class="icon"><span class="flaticon-file23" style=""></span></div>
                <div class="title"><p class="titr">مشخصات اختصاصی</p>
                    <p class="lead">توضیحات این بخش</p></div>
            </div>

            <div class="toolmenu">
                <ul>
                    <li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>

                    <li>
                        <a data-toggle="modal" data-target="#searching" data-placement="top" title="جستجوی پیشرفته">
                            <span class="flaticon-search74"></span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <!--=================================================select2===========================================-->
        <div id="show_seo_div">
            <div class="col-md-12">

                <div class="form-group" id="cate_tag">
                    <div class="col-md-12">
                        <div class="col-md-8">
                            <label class="col-md-2 control-label">عنوان دسته بندی</label>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" id="name_cat" name="name_cat">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label class="col-md-2 control-label">Meta keyword</label>
                            <div class="form-group col-md-6">
                                <input type="text" value="<?= $meta_keyword ?>" id="meta_keyword" name="meta_keyword"
                                       class="form-control" data-role="tagsinput"
                                       title="حداکثر 11کلمه و 70 کاراکتر بهتر است باشد"
                                       placeholder="کلمه کليدي را وارد نمائيد و سپس کليد Enter را بزنيد"
                                       style="width: 100%; font-size: inherit;"/>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Meta Description</label>
                                <div class="form-group col-md-6">
                                    <textarea id="meta_desciption" name="meta_desciption" class="form-control" rows="3"
                                              title="حداکثر 70 کلمه و 350 کاراکتر بهتر است باشد"><?= $meta_desciption ?></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-md-2 control-label">Seo title</label>
                                <div class="form-group col-md-6">
                                    <input value="<?= $seo_title ?>" type="text" id="seo_title" name="seo_title"
                                           class="form-control">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="text-align: left">
                        <button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary submit2"
                                id="submit2">اضافه کردن
                        </button>
                    </div>

                    <div class="panel-footer bttools">
                    </div>
                    <div id="result_cat" class="form-group col-md-3">
                        <label class="control-label"> دسته بندی را انتخاب کنید :</label>
                        <select id="qqq" name="option_field1" data-option="option_field1"
                                data-div="div_" class="form-control select<?= $i ?>" style="border: none;">
                            <? $j = 0;
                            $query2 = "SELECT * FROM new_product_cat_cat";
                            $result2 = $coms_conect->query($query2);
                            while ($RS2 = $result2->fetch_assoc()) {
                                ?>
                                <option value="<?= $RS2['id'] ?>" <? if ($RS2['type'] == 0) echo 'selected' ?>><?= $RS2['cat_name'] ?></option>
                            <? } ?>

                        </select>
                    </div>
                    <script>

                    </script>
                    <!--                    <div id="" class="form-group col-md-4">-->
                    <!--                        <label class="control-label">زیر مجموعه دسته بندی را انتخاب کنید :</label>-->
                    <!---->
                    <!--                        <select id="Option_cat" name="option_cat2" data-option="option_cat2"-->
                    <!--                                data-div="div_2" class="form-control select--><? //= $i
                    ?><!--">-->
                    <!--                            --><? // $j = 0;
                    //                            $query3 = "SELECT * FROM new_modules_cat WHERE type=4  ";
                    //                            $result3 = $coms_conect->query($query3);
                    //                            while ($RS3 = $result3->fetch_assoc()) {
                    //
                    ?>
                    <!--                                <option value="--><? //= $RS3['id']
                    ?><!--">--><? //= $RS3['name']
                    ?><!--</option>-->
                    <!--                            --><? // }
                    ?>
                    <!---->
                    <!--                        </select>-->
                    <!--                    </div>-->
                    <input type="hidden" name="catid_val" id="catid_val" value="<?= $catid ?>">
                    <input type="hidden" name="catid_val_edit" id="catid_val_edit" value="0">
                </div>

                <script>

                    // var Option_cat = $('#Option_cat').find(':selected').attr('value');
                    var Option_cat = $('#catid_val').val();
                    // alert(Option_cat);
                    var Option_cat1 = $('#qqq').find(':selected').attr('value');
                    $.ajax({
                        type: 'POST',
                        url: 'New_ajax_product.php',
                        data: "action=zir_ok&Option_cat=" + Option_cat + "&Option_cat1=" + Option_cat1,
                        success: function (ww) {
                            // $('#qqq').select1;
                            $('#zir_cat').html(ww);


                        }
                    });
                    // alert($('#option_cat').find(':selected').attr('value'));
                    // alert(option_cat);
                    $('#qqq').change(function () {

                        // Option_cat = $('#Option_cat').find(':selected').attr('value');
                        Option_cat = $('#catid_val').val();
                        var Option_cat1 = $('#qqq').find(':selected').attr('value');
                        $.ajax({
                            type: 'POST',
                            url: 'New_ajax_product.php',
                            data: "action=zir_ok&Option_cat=" + Option_cat + "&Option_cat1=" + Option_cat1,
                            success: function (ww) {
                                // $('#qqq').select1;
                                $('#zir_cat').html(ww);

                            }
                        });

                    });
                    $('#submit2').click(function () {
                        var id =<?=$catid?>;
                        var name_cat = $('#name_cat').val();
                        var meta_keyword = $('#meta_keyword').val();
                        var meta_desciption = $('#meta_desciption').val();
                        var seo_title = $('#seo_title').val();
                        var catid_val_edit = $('#catid_val_edit').val();
// alert(catid_val_edit);
                        $.ajax({
                            type: 'POST',
                            url: 'New_ajax_product.php',
                            data: "action=select2_ok&name_cat=" + name_cat + "&meta_keyword=" + meta_keyword + "&meta_desciption=" + meta_desciption + "&seo_title=" + seo_title + "&value=" + catid_val_edit,
                            success: function (result) {
                                // $('#qqq').select1;
                                $('#result_cat').html(result);
                                $('input:text').val('');
                                $('#meta_desciption').val('');
                                $('#cate_tag span').empty();
                                window.location.href = "newcoms.php?yep=new_product_cat_cat&catid=" + id + "&catof=0";

                            }
                        });

                    })


                </script>


            </div>

        </div>
        <div class="row ">
            <div id="" class="form-group col-md-6 qwqw">
                <label class="control-label">زیر مجموعه دسته بندی</label>
                <div class="form-group col-6 zir_cat" id="zir_cat">
                </div>
            </div>

            <!--=================================================end select2===========================================-->
            <div id="zakhireh_shod" class="form-group col-6" style="display: none">ذخیره شد</div>
            <div class="col-md-6">
                <!--            <button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary submit2" id="submit_sub">-->
                <!--                ذخيره-->
                <!--            </button>-->
                <script>
                    $("#qqq").select2();

                </script>

            </div>
            <script src="/yep_theme/default/rtl/js/menubar/madules_cat_cat1.js"></script>

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3 class="panel-title"> مرتب سازی دسته بندی <?= $rowcatrowcat ?> </h3>
                    </div>
                    <div class="panel-body">

                        <!-- #section:ads/ads_cat.table -->
                        <? //
                        $sql = "SELECT * FROM  new_product_cat_cat  ORDER BY  reng ASC,checked DESC ";
                        //								echo $sql;exit;
                        $result = $coms_conect->query($sql);
                        echo "<div class='cf nestable-lists'>\n";
                        echo "<div class='dd' id='nestableMenu'>\n\n";
                        echo "<ol class='dd-list'>\n";
                        $ii=1;
                        while ($row = $result->fetch_assoc()) {
                            echo "\n";
                            $id = $row['id'];
                            $str = "unchecked";
//                            $status=$row['status'];
                            $name = insert_dash($row['cat_name']);
//                            if($status==1)
                            if ($row['checked'] == 1)
                                $str = 'checked';
                            echo "<li class='dd-item dd-nodrag' data-id='{$row['id']}'>";
                            echo "<div class='dd-handle'><a target='_blank' href=" . "/$modul_name/$manage_lang/category/$name/1" . "> {$row['cat_name']}</a>";
                            $temp_find = get_result("select cat_id_valid from new_product_cat_to_cat where cat_id_cat= $id AND cat_id_pro=$catid", $coms_conect);
                            $temp_find_id_arr=(explode(',',$temp_find));
                            $count_find=count($temp_find_id_arr);
//                            echo 'dd='.$temp_find;
//                            print_r($count_find);
if($temp_find_id_arr[0]==''||$temp_find_id_arr[0]=='null')$count_find=0;
                            echo " <span class='badge badge-grey'  id='".$id."'>".$count_find."</span>";
                            echo '	<div class="pull-right action-buttons">';
                            if ($_SESSION["can_edit"] == 1) {
                                echo '<a class="blue" href="#">
																	 <input ' . $str . ' id=' . $id . ' name="switch-field-1" class="ace ace-switch ace-switch-6 ace-switch-6-cat-status_0 nes_tik' . $id . '" type="checkbox"/>
																	 <span class="lbl"></span>
																	</a>';

                                echo '<a id=' . $id . ' class="edit_menu edit_menu_cat_0 blue" href="#">
																	<span class="flaticon-note32 bigger-130"></span>
																	</a>';
                            }
//                            if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)&&$_SESSION["can_delete"]==1){
                            ?><a id="<?=$id?>"   class="del_menu del_menu_cat_cat_0 red" data-title="Delete" data-toggle="modal" <?if($count_find>0) echo 'style="visibility: hidden"';?>  data-target="#delete" data-placement="top" rel="tooltip">
																 	<span class="flaticon-delete84 bigger-130"></span>
																 	</a><?
//                            }
                            echo '</div>
														</div>';
                            show_madules_cat($row['id'], $site_id, $manage_lang, $modual_type, $coms_conect, $modul_name);
                            echo "</li>\n";
                            $ii++;
                        }
                        echo "</ol>\n\n";
                        echo "</div>\n";
                        echo "</div>\n\n";
                        //
                        ?><? //=$sql
                        ?>
                        <!-- /section:ads/ads_cat.table -->
                        <script>

                        </script>
                    </div>
                </div>
                <? ?>
                <textarea id="nestable1-output" style="display:none"></textarea>
            </div>
            <script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>

            <script src="ajax_js/page_cat_product_cat.js"></script>
            <script>

                // $("#manage_lang").change(function () {
                //     $("#onvan").val('');
                //     $("#menu1").submit();
                // });
            </script>

            <script>
                $(document).ready(function () {
                    var updateOutput = function (e) {
                        var list = e.length ? e : $(e.target),
                            output = list.data('output');
                        if (window.JSON) {
                            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                            menu_updatesort(window.JSON.stringify(list.nestable('serialize')));
                        } else {
                            output.val('JSON browser support required for this demo.');
                        }
                    };


                    // activate Nestable for list 1
                    $('#nestableMenu').nestable({
                        group: 1,
                        maxDepth: 1,
                    })
                        .on('change', updateOutput);

                    // output initial serialised data
                    updateOutput($('#nestableMenu').data('output', $('#nestable1-output')));


                    jQuery(function ($) {

                        $('.dd').nestable();

                        $('.dd-handle a').on('mousedown', function (e) {

                            e.stopPropagation();
                        });

                        $('[data-rel="tooltip"]').tooltip();

                    });
                });
            </script>

            <? }elseif ($catof == '1'){


            ?>

            <!--            =====-->
            <script src="/yep_theme/default/rtl/js/menubar/madules_cat_cat1.js"></script>


            <div class="col-md-12">
                <?
                $sqlnes1 = "SELECT cat_id_valid FROM  new_product_cat_to_cat_filter WHERE  cat_id_cat=$catid";
                //echo $sqlnes;exit;
                $resultnes1 = $coms_conect->query($sqlnes1);
                $rownes1 = $resultnes1->fetch_assoc();
                $label_nes1 = $rownes1['cat_id_valid'];
                $label_nes1 = explode(',', $label_nes1);
                $temp_sort = get_result("SELECT * FROM  new_product_delicated_cat WHERE  type=1 AND cat_id=$catid", $coms_conect);
                //echo $temp_sort;exit;
                if ($temp_sort > '') {

                    $sql_sort = "SELECT * FROM  new_product_delicated_cat WHERE  type=1 AND cat_id=$catid";
//    echo $sql_sort;exit;
                    $result_sort = $coms_conect->query($sql_sort);
                    $RS1_sort = $result_sort->fetch_assoc();

//    print_r($label_repit);
                    $label = explode(',', $RS1_sort['cat_id_valid']);
//    print_r($label);exit;
                }
                //                $sql_repit="select id,cat_id_valid from new_product_cat_to_cat where  cat_id_pro=$Option_cat";
                //                $result_repit = $coms_conect->query($sql_repit);
                //                while ($RS1_repit=$result_repit->fetch_assoc()){
                //                    $label_repit.=$RS1_repit['cat_id_valid'].',';
                //                }
                //                $label_repit=explode(',',$label_repit);
                ?>
                <select id="meta_label" multiple name="meta_label[]" class="select2 form-group maht"
                        data-placeholder="کلیک و سپس انتخاب کنید :" type="text"
                        style="width:90%">
                    <?
                    $temp_find_id =get_result("select cat_id_valid from new_product_cat_to_cat_filter where cat_id_cat='$catid'", $coms_conect);
                    $temp_find_id_arr=explode(',',$temp_find_id);
                    $query = "SELECT id , name FROM new_product_delicated_cat WHERE type=1 AND cat_id='$catid'";
                    $result = $coms_conect->query($query);
                    while ($RS1 = $result->fetch_assoc()) {
                        ?>


<!--                        --><?// if (!(in_array($RS1['id'], $label_nes1))) { ?>
<!--                            <option --><?// if (($label[0]) > "" && in_array($RS1['id'], $label)) echo 'selected'; ?>
                            <option <? if ( in_array($RS1['id'], $temp_find_id_arr)) echo 'selected'; ?>
                                    value="<?= $RS1['id'] ?>"><?= $RS1['name'] ?></option>


<!--                        --><?// }
                    } ?>
                </select>

                <!--                <button type="button" class="btn btn-primary" id="btn_sort">ذخیره</button>-->
                <div class="row">
                    <div class="col-md-6">
                    <label id="ok_sabt_ok" style="display: none">تغییرات ثبت شد</label>
                </div>
                </div>
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->

                <? if ($_SESSION["can_add"] == 1) { ?>

                    <script>
                        $(document).ready(function () {

                            $("#meta_label").select2({
                                //tags: true;
                            });

                            // $("#zir_cat").on('click',(function () {
                            //     alert('hi');
                            // });
                            // alert('hi');
                            // $("#add_new_label_btn").click(function () {
                            //     if($("#new_label").val()){
                            //         $("#show_waiting_seo").show();
                            //         var keyword=$("#new_label").val();
                            //         $.ajax({
                            //             type:'POST',
                            //             url:'New_ajax.php',
                            //             data:"action=add_new_label&id="+$("#new_label").val()+"&value="+$("#manage_lang").val(),
                            //             success: function(result){
                            //                 $("#show_waiting_seo").hide();
                            //                 $("#new_label").val('');
                            //                 var newStateVal = keyword;
                            //                 if ($("#meta_label").find("option[value='" + newStateVal + "']").length) {
                            //                     $("#meta_label").val(newStateVal).trigger("change");
                            //                 } else {
                            //                     var newState = new Option(newStateVal, result, true, true);
                            //                     $("#meta_label").append(newState).trigger('change');
                            //                 }
                            //
                            //
                            //
                            //             }
                            //
                            //         });
                            //
                            //     }
                            // });


                        });
                    </script>
                    <?
                }
                ?>
                <script src="/yep_theme/default/rtl/js/menubar/madules_cat_cat1_filter.js"></script>

                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3 class="panel-title"> مرتب سازی دسته بندی <?= $rowcatrowcat ?> </h3>
                    </div>
                    <div class="panel-body" id="show_filter">
                        <!-- #section:ads/ads_cat.table -->


                    </div>
                    <script>
                        var id =<?=$catid?>;
                        var meta_label = $('#meta_label').val();
                        $.ajax({
                            type: 'POST',
                            url: 'New_ajax_product.php',
                            data: "action=filter_sabt_ok11&id=" + id + "&meta_label=" + meta_label,
                            success: function (ooo) {
                                $('#show_filter').html(ooo);
                                // alert('ذخیره اطلاعات باdgdfgdfgdg موفقیت انجام شد..');
                                // $('#qqq').select1;
                                // $('input:text').val('');
                                // $('#meta_desciption').val('');
                                // $('#cate_tag span').empty();


                            }
                        });
                        $('#btn_sort').click(function () {
                            var id =<?=$catid?>;
                            var meta_label = $('#meta_label').val();
                            $.ajax({
                                type: 'POST',
                                url: 'New_ajax_product.php',
                                data: "action=filter_sabt_ok&id=" + id + "&meta_label=" + meta_label,
                                success: function (ooo) {
                                    $('#show_filter').html(ooo);
                                    // alert('ذخیره اطلاعات با موفقیت انجام شد..');
                                    // $('#qqq').select1;
                                    // $('input:text').val('');
                                    // $('#meta_desciption').val('');
                                    // $('#cate_tag span').empty();


                                }
                            });
                        });
                        $('#meta_label').change(function () {
                            var id =<?=$catid?>;
                            var meta_label = $('#meta_label').val();
                            // alert(id + '=' + meta_label);
                            $.ajax({
                                type: 'POST',
                                url: 'New_ajax_product.php',
                                data: "action=filter_sabt_ok&id=" + id + "&meta_label=" + meta_label,
                                success: function (ooo) {
                                    $('#show_filter').html(ooo);
                                    $('#ok_sabt_ok').fadeTo('slow', 1, function () {
                                        $('#ok_sabt_ok').attr('style', 'display:block');
                                        $('#ok_sabt_ok').attr('style', 'display:none');
                                    }).fadeTo('slow', 1);
                                    // alert('ذخیره اطلاعات با موفقیت انجام شد..');
                                    // $('#qqq').select1;
                                    // $('input:text').val('');
                                    // $('#meta_desciption').val('');
                                    // $('#cate_tag span').empty();


                                }
                            });
                        });
                    </script>
                    <!--               =============== -->
                    <? } ?>
                    <div class="form-group">

                        <a href="newcoms.php?yep=new_product_cat_esp" class="btn btn-info" role="button">بازگشت به صفحه
                            قبل </a>
                    </div>
                    <!-- /section:ads/ads_cat.table -->
                    <script>
                        $(document).on('click', '.nes_nes', function () {
                            // $('.dd-handle').on(click,function () {
                            // var Option_cat= $('#catid_val').val();
                            // var Option_cat1= $('#qqq').find(':selected').attr('value');
                            var id = $(this).attr('data-id');
                            // var cc=$('#' + id).prop("checked");
                            // var chkd=0;
                            // alert('sqq='+id+'cc='+cc);
                            // if (cc == true)
                            //     chkd = 1;
                            // $.ajax({
                            //     type: 'POST',
                            //     url: 'New_ajax_product.php',
                            //     data: "action=nes_tik_chk&id=" + id ,
                            //     success: function (result) {
                            //         $('#qqq').select1;
                            //         // $('#sds').html(result);
                            //         // $('#asa').val(txt);
                            //         // $('input:text').val('');
                            //         // $('#meta_desciption').val('');
                            //         // $('#cate_tag span').empty();
                            //
                            //     }
                            // });


                        });


                        // $(document).on('click', '.btn_ok', function () {
                        //     var id_del = $('.mahdi').attr('data-id');
                        //     // alert(id+'hi='+id_del);
                        //     $.ajax({
                        //         type: 'POST',
                        //         url: 'New_ajax_product.php',
                        //         data: "action=nes_tik_del&id=" + id + "&id_del=" + id_del,
                        //         success: function (result) {
                        //             // $('#qqq').select1;
                        //             // $('#sds').html(result);
                        //             window.location.href = "newcoms.php?yep=new_product_cat_cat&catid=" + id + "&catof=1";
                        //             // $('#asa').val(txt);
                        //             // $('input:text').val('');
                        //             // $('#meta_desciption').val('');
                        //             // $('#cate_tag span').empty();
                        //
                        //         }
                        //     });

                        // });
                    </script>
                </div>
                <!--//===================================================-->

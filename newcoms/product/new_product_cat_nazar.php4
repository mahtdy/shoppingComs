<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">

<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>
<br>
<?


$modul_name = 'product';
$manage_lang = 'fa';

# SEO Tab

$name_cat = injection_replace($_POST['name_cat']);
$catid_val = injection_replace($_POST['catid_val']);
$catid_val_edit = injection_replace($_POST['catid_val_edit']);

if ((isset($name_cat))&&($name_cat>'')){
if ($catid_val_edit==0 || $catid_val_edit=='' )
    $sql = "INSERT INTO new_product_cat_nazar(id_cat,matn, rang, status) VALUES ('$catid_val','$name_cat',0,1)";
else
    $sql= "UPDATE new_product_cat_nazar SET matn='$name_cat' WHERE id=$catid_val_edit";
    $coms_conect->query($sql);
    $catid_val_edit=0;
}



    $catid = injection_replace($_GET['catid']);
    $sqlcat = "select name from new_modules_cat where  id='$catid' ";
//    echo $query_edit;
//    exit;
//$sqlcat = "SELECT name FROM  new_product_barrasi WHERE  delicated_id_cat='$barrof'";
//echo $sqlcat;exit;
    $resultcat = $coms_conect->query($sqlcat);
    $rowcat = $resultcat->fetch_assoc();
//echo $rowcat['name'];exit;
    $rowcatrowcat = $rowcat['name'];
//}
//echo $rowcatrowcat;
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

<div class="tabbable">
    <div class="msheet tab-content">
        <div class="secfhead">
            <div class="sectitle">
                <div class="icon"><span class="flaticon-file23" style=""></span></div>
                <div class="title"><p class="titr">عناوین نظرسنجی</p>
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
                <form id="menu1" name="menu1" action="" role="form" method="post" enctype="multipart/form-data">

                    <div class="form-group" id="cate_tag">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <label class="col-md-2 control-label">عنوان نظرسنجی</label>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="name_cat" name="name_cat">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6" style="text-align: left">
                            <button type="submit" style="width: 110px; font-size: 18px;" class="btn btn-primary submit2"
                                    id="submit2">اضافه کردن
                            </button>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        <input type="hidden" name="catid_val" id="catid_val" value="<?= $catid ?>">
                        <input type="hidden" name="catid_val_edit" id="catid_val_edit" value="0">
                    </div>


                </form>
            </div>

        </div>

        <div class="row ">

            <script src="/yep_theme/default/rtl/js/menubar/madules_cat_cat1_nazar.js"></script>

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">

                        <h3 class="panel-title"> مرتب سازی عناوین نظرسنجی برای دسته بندی  <?= $rowcatrowcat ?> </h3>
                    </div>
                    <div class="panel-body">
                        <!-- #section:ads/ads_cat.table -->
                        <? //
                        $sql = "SELECT * FROM  new_product_cat_nazar WHERE id_cat='$catid' ORDER BY  rang ASC ";
                        //								echo $sql;exit;
                        $result = $coms_conect->query($sql);
                        echo "<div class='cf nestable-lists'>\n";
                        echo "<div class='dd' id='nestableMenu'>\n\n";
                        echo "<ol class='dd-list'>\n";
                        while ($row = $result->fetch_assoc()) {
                            echo "\n";
                            $id = $row['id'];
                            $str = "unchecked";
//                            $status=$row['status'];
                            $name = insert_dash($row['matn']);
//                            if($status==1)
                            if ($row['status'] == 1)
                                $str = 'checked';
                            echo "<li class='dd-item dd-nodrag mahdi' data-id='{$row['id']}'>";
                            echo "<div class='dd-handle'><a target='_blank' href=" . "/$modul_name/$manage_lang/category/$name/{$row['id_cat']}" . "> {$row['matn']}</a>";
                            echo '	<div class="pull-right action-buttons">';
                            if ($_SESSION["can_edit"] == 1) {
                                echo '<a class="blue" href="#">
																	 <input ' . $str . ' id=' . $id . ' name="switch-field-1" class="ace ace-switch ace-switch-6 nes_tik' . $id . '" type="checkbox"/>
																	 <span class="lbl"></span>
																	</a>';

                                echo '<a id=' . $id . ' class="edit_menu blue" href="#">
																	<span class="flaticon-note32 bigger-130"></span>
																	</a>';
                            }
//                            if(menu_has_child($id,$coms_conect)==0&&!get_result("select count(cat_id) from new_modules_catogory where cat_id=$id",$coms_conect)&&$_SESSION["can_delete"]==1){
                                echo '<a id='.$id.' class="del_menu red" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip">
																 	<span class="flaticon-delete84 bigger-130"></span>
																 	</a>';
//                            }
                            echo '</div>
														</div>';
//                    show_madules_cat($row['id'],$site_id,$manage_lang, $modual_type ,$coms_conect,$modul_name);
                            echo "</li>\n";
                        }
                        echo "</ol>\n\n";
                        echo "</div>\n";
                        echo "</div>\n\n";
                        //?><? //=$sql?>
                        <!-- /section:ads/ads_cat.table -->

                    </div>
                </div>
                <? ?>
                <textarea id="nestable1-output" style="display:none"></textarea>
            </div>
            <script type="text/javascript" src="/yep_theme/default/rtl/assets/js/jquery.nestable.min.js"></script>

            <script src="ajax_js/product_cat_nazar.js"></script>

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
                        console.log(output);
                        console.log((list.nestable('serialize')));
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


            <div class="form-group">

                <a href="newcoms.php?yep=new_product_cat_esp" class="btn btn-info" role="button">بازگشت به صفحه قبل </a>
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
                $(document).on('click', '.btn_ok', function () {
                    var id_del = $('.mahdi').attr('data-id');
                    // alert(id+'hi='+id_del);
                    $.ajax({
                        type: 'POST',
                        url: 'New_ajax_product.php',
                        data: "action=nes_tik_cat_nazar_del&id=" + id + "&id_del=" + id_del,
                        success: function (result) {
                            // $('#qqq').select1;
                            // $('#sds').html(result);
                            window.location.href = "newcoms.php?yep=new_product_cat_nazar&catid=" + id ;
                            // $('#asa').val(txt);
                            // $('input:text').val('');
                            // $('#meta_desciption').val('');
                            // $('#cate_tag span').empty();

                        }
                    });

                });



                // $('#submit2').click(function () {
                //     var name_cat = $('#name_cat').val();
                //     if  (name_cat>'') {
                      //  var id_cat =<?//=//$catid?>;
                        // var meta_keyword=$('#meta_keyword').val();
                        // var meta_desciption=$('#meta_desciption').val();
                        // var seo_title=$('#seo_title').val();
                        // var img = $('<img id="dynamic">');
                //
                //         img.attr('src', 'waiting.gif');
                //
                //         img.appendTo('.content');
                //
                //         $.ajax({
                //             type: 'POST',
                //             url: 'New_ajax_product.php',
                //             data: "action=add_barr&name_barr=" + name_cat + "&id_cat=" + id_cat,
                //             success: function (result) {
                //                 // $('#qqq').select1;
                //                 // $('#result_cat').html(result);
                //                 $('input:text').val('');
                //                 $("#menu1").submit();
                //                 // $("#menu1").submit();
                //
                //                 // $('#meta_desciption').val('');
                //                 // $('#cate_tag span').empty();
                //             }
                //         });
                //     }
                // })
            </script>

            <script>
                //
                //    // var Option_cat = $('#Option_cat').find(':selected').attr('value');
                //    var Option_cat =$('#catid_val').val();
                //    // alert(Option_cat);
                //    var Option_cat1 = $('#qqq').find(':selected').attr('value');
                //    $.ajax({
                //        type: 'POST',
                //        url: 'New_ajax_product.php',
                //        data: "action=zir_ok&Option_cat=" + Option_cat+"&Option_cat1=" + Option_cat1,
                //        success: function (ww) {
                //            // $('#qqq').select1;
                //            $('#zir_cat').html(ww);
                //
                //
                //        }
                //    });
                //    // alert($('#option_cat').find(':selected').attr('value'));
                //    // alert(option_cat);
                //    $('#qqq').change(function () {
                //        // Option_cat = $('#Option_cat').find(':selected').attr('value');
                //        Option_cat =$('#catid_val').val();
                //        var Option_cat1 = $('#qqq').find(':selected').attr('value');
                //        $.ajax({
                //            type: 'POST',
                //            url: 'New_ajax_product.php',
                //            data: "action=zir_ok&Option_cat=" + Option_cat+"&Option_cat1=" + Option_cat1,
                //            success: function (ww) {
                //                // $('#qqq').select1;
                //                $('#zir_cat').html(ww);
                //
                //            }
                //        });
                //    });



            </script>
        </div>
        <!--//===================================================-->





<?error_reporting(E_ERROR | E_PARSE);
include_once("newcoms/function.php");
include_once("newcoms/Database.php");
include_once("newcoms/jdf.php");
include_once("languages/fa.php");
//include_once("coms/include/global.php");
$time=time();
$domain_name= $_SERVER['HTTP_HOST'] ;
  @session_start();
  $can_add=$_SESSION["can_add"];
  $can_edit=$_SESSION["can_edit"];
  $manager_id=$_SESSION["manager_id"];
  $can_delete=$_SESSION["can_delete"];
  $manager_user_name=$_SESSION['manager_user_name'];
  $manager_title_lang=$_SESSION['manager_title_lang'];
  $manager_id=$_SESSION['manager_id'];
  $folder = $_SESSION["manager"];
  $action=injection_replace($_POST['action']);
  $modual_type=injection_replace($_POST['modual_type']);
  $modual_name=injection_replace($_POST['modual_name']);
  $la=injection_replace($_POST['la']);
  $site=injection_replace($_POST['site']);

$id_PSR=injection_replace($_POST['id_PSR']);
$modual_id=injection_replace($_POST['modual_id']);
//$modual_type=injection_replace($_POST['modual_type']);
//echo $la.$site;

$custom_ip=$_SERVER['REMOTE_ADDR'];
if($_SERVER["HTTP_HOST"]=='localhost')
 $ffmpeg = "C:\\xampp\\ffmpeg\\bin\\ffmpeg.exe";
else
	$ffmpeg='ffmpeg';

//------------------START---- resize pic delete

if ($action=='del_pic_PSR'){
    $sql="delete from new_setting_pic_resize where id=$id_PSR AND modual_type=$modual_id ";
//    echo $sql;
    $coms_conect->query($sql);
}

//------------------END---- resize pic delete


if ($action=='ok') {

    //                echo "select count(id_com) from new_company_catalog where la='$la' AND  id_com='$edit_id'";
    $header1_link_count = get_result("select count(modual_type) from new_setting_pic_resize where la='$la' AND  modual_type='$modual_type'", $coms_conect);
//                echo $header1_link_count;
    $i=0;

?>
        <center>

            <label class="col-md-12 control-label" for="family">درج در <?=$modual_name?></label>
            <br>
            <br>
           <? for ($x = 1; $x <= $header1_link_count; $x++) {
            $img_smallBox1 = get_PSR_result($la, $modual_type, $coms_conect);
            //                    print_r($img_smallBox1);

            if ($img_smallBox1[$i]['width'] > "") {


            ?>


            <div class="tab-pane">
                <div class="page-content-area" id="more7">
                    <div class="page-body" style="margin-top: 25px;">
                        <fieldset>
                            <br>
                            <div class="col-md-12">
                                <div id="ads_header1_link<?=$modual_type.'-'.$x?>" class="seyed" style="opacity: 1;">
                                    <div class="form-group">
                                        <a class="col-md-1 control-label del_header1_link" id="<?=$modual_type.'-'.$x?>" name="<?=$modual_type?>"  for="family">
                                            <i class="fa fa-trash text-danger remove"
                                               data-original-title="حذف">
                                            </i>
                                        </a>
                                        <label class="col-md-2 control-label" for="family">اندازه <?=$x;?></label>
                                        <div class="form-group col-md-9">
                                            <div class="col-md-2 input-group">
                                                <input type="hidden" id="id_pic<?=$modual_type.'-'.$x?>" value="<?=$img_smallBox1[$i]['id']?>"
                                                        name="id_pic<?=$modual_type.'-'.$x?>">
                                                <input type="text" id="width_pic<?=$modual_type.'-'.$x?>" value="<?=$img_smallBox1[$i]['width']?>" class="form-control"
                                                       placeholder=" اندازه عرض" name="width_pic<?=$modual_type.'-'.$x?>">
                                            </div>
                                            <div class="col-md-2 input-group">
                                                <input type="text" id="height_pic<?=$modual_type.'-'.$x?>" value="<?=$img_smallBox1[$i]['height']?>" class="form-control"
                                                       placeholder="اندازه ارتفاع" name="height_pic<?=$modual_type.'-'.$x?>">
                                            </div>
                                            <div class="col-md-2 input-group">
                                                <input type="text" id="quality_pic<?=$modual_type.'-'.$x?>" value="<?=$img_smallBox1[$i]['quality']?>" class="form-control"
                                                       placeholder="کیفیت" name="quality_pic<?=$modual_type.'-'.$x?>">
                                            </div>
                                            <div class="col-md-6 input-group">
                                                <input type="text" id="address_link_pic<?=$modual_type.'-'.$x?>" value="<?=$img_smallBox1[$i]['address_link_save']?>" class="form-control"
                                                       placeholder="آدرس محل ذخیره عکس" name="address_link_pic<?=$modual_type.'-'.$x?>">

                                            </div>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <input type="checkbox" id="chck_watermark" >
                                            <label class=" control-checkbox"  for="chck_watermark">واترمارک</label>
                                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Simple collapsible</button>
                                            <div id="demo" class="collapse">
                                                <label for="">dfffsffd</label>
                                            <?include 'newcoms/main/watermark-image-text/watermark_text_example.php'?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?
        }
        $i++;
$xcount_resize = $x;
           }


    ?> <input type="hidden" id="header1_link_count<?=$modual_type?>" name="header1_link_count<?=$modual_type?>" value="<?=$xcount_resize;?>">
<!--                     ' +m+i+ '" id="' +m+""+i+ '"           <input type="hidden" id="header_modual_type--><?//=$modual_type?><!--" name="header_modual_type" value="--><?//=$modual_type?><!--">-->
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        var i = <?=$x?>;
                                        var m=<?=$modual_type?>;
                                        // var m=r+'-';

                                        $('#add_header1_link' + m + '').on("click", function () {
                                            var someText = '<div id="ads_header1_link' +m+'-'+i+ '" class="seyed" >' +
                                                ' <div class="form-group"><a class="col-md-1 control-label del_header1_link" id="' +m+'-'+i+ '" for="family">' +
                                                '<i class="fa fa-trash text-danger" title="حذف" style="font-size:20px;"></i></a> ' +
                                                '<label class="col-md-2 control-label" for="family">اندازه' + i + '</label> ' +
                                                '<div class="form-group col-md-9">' +
                                                ' <div class="col-md-2 input-group">' +
                                                '<input type="text" id="width_pic' +m+'-'+i+ '" value="" class="form-control" placeholder="اندازه عرض" name="width_pic' +m+'-'+i+'" >' +
                                                '</div>' +
                                                '<div class="col-md-2 input-group">' +
                                                '<input type="text" id="height_pic' +m+'-'+i+'" value="" class="form-control" placeholder="اندازه ارتفاع" name="height_pic'+m+'-'+i+ '" >' +
                                                '</div>' +
                                                '<div class="col-md-2 input-group">' +
                                                '<input type="text" id="quality_pic' +m+'-'+i+ '" value="" class="form-control" placeholder="کیفیت" name="quality_pic' +m+'-'+i+ '" >' +
                                                '</div>' +
                                                '<div class="col-md-6 input-group">' +
                                                '<input type="text" id="address_link_pic' +m+'-'+i+'" value="" class="form-control" placeholder="آدرس محل ذخیره عکس" name="address_link_pic' +m+'-'+i+'" >' +
                                                '</div>' +

                                                '</div></div></div>';
                                            $(this).before(someText);
                                            $('#ads_header1_link' +m+'-'+i+ '').fadeTo('slow', 0.3, function () {
                                                $(this).css('background', '');
                                            }).fadeTo('slow', 1);
                                            $('#header1_link_count' +m+ '').val(i);
                                            i++;
                                        });
                                        $(document).on('click', '.del_header1_link', function () {
                                            var id_id=$(this).attr('name');
                                            var id = $(this).attr('id');
                                            var p = $('#header1_link_count'  +id_id+  '').val();
                                            p--;
                                            var id_PSR= $('#id_pic'+ id).val();
                                            $('#ads_header1_link' + id).remove();
                                            $('#header1_link_count'  +id_id+  '').val(p);
                                            $.ajax({
                                                type:'POST',
                                                url:'New_ajax_pic_setting.php',
                                                data:"action=del_pic_PSR&id_PSR="+id_PSR+"&modual_id="+id_id,
                                                success: function(result){
                                                    // alert('result='+result);
                                                }
                                            });
                                        });
                                    });

                                </script>
                                <a class="btn btn-success block" id="add_header1_link<?=$modual_type?>"><i
                                        style="font-size: 16pt;margin-left: 5px;vertical-align: middle;"
                                        class="fa fa-plus"></i>افزودن لینک</a>
                                <br>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </center>
    <?

}




?>
<div class="aaa kk bb">
    <button id="ttt">ttt</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script >
    $('#ttt').click(function () {
        var gg=$('div').hasClass('kkk');
        alert(gg);
    })
</script>
<?



$ss= array('d','1','3');
foreach ($ss as $val){
    $val.='hh'.',';
    echo $val.'<br>';
}

exit;

include '../newcoms/Database.php';
$query_moj = "select id_pro,id_color,id_size from new_product_color_size WHERE id_pro > 4270";
//$rnd=rand(1,8);
//echo $rnd;exit;
$result_moj = $coms_conect->query($query_moj);
while ($RS1_moj = $result_moj->fetch_assoc()) {
    $arrcolor = explode(',', $RS1_moj['id_color']);
    $arrsize = explode(',', $RS1_moj['id_size']);
    $id_pro = $RS1_moj['id_pro'];
    foreach ($arrcolor as $value) {
        echo $value.'='.$id_pro.'<br>';
        $sql_save = "INSERT INTO new_product_color_size1(id_pro, id_meqdar, id_type) VALUES ('$id_pro','$value','1')";
//        echo $sql_save;
        $coms_conect->query($sql_save);

//    $label_arr1=array("id_pro"=>$id_pro,"id_meqdar"=>$value,"id_type"=>0);
//    insert_to_data_base($label_arr1,'new_product_color_size',$coms_conect);
    }
    foreach ($arrsize as $value) {
        $sql_save = "INSERT INTO new_product_color_size1(id_pro, id_meqdar, id_type) VALUES ('$id_pro','$value','2')";
        $coms_conect->query($sql_save);

//    $label_arr1=array("id_pro"=>$id_pro,"id_meqdar"=>$value,"id_type"=>0);
//    insert_to_data_base($label_arr1,'new_product_color_size',$coms_conect);
    }

}
echo 'finish';
exit;

?>







<?


$rr = 'eweewew';
$rr .= '123';
echo $rr;

exit;

$r = '123';

$r = (int)($r);
$r = $r + 1;
echo $r;


(str);

exit;


?>


<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<input type="button" name="but" id="but">
<script>
    var myMap;
    var myLatlng = new google.maps.LatLng(36.287130, 50.011265);

    function initialize() {
        var mapOptions = {
            zoom: 16,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false
        }
        myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: myMap,
            title: 'Name Of Business',
            // icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script>

</script>
<div id="map" style="width:600px; height: 400px;">

</div>

<? exit;


?>


<!---->
<!---->
<?php
//
//echo time();
//$r=(time()-1549584000)/3600*24;
//echo "<br>".$r;
//
//
//
//
//
//
//exit(); ?>
<!---->
<!---->

<input type="text" id="ww" value="">


<div class="form-group row">
    <div class="form-group col-sm-6">
        <label class="control-label">آدرس سایت شرکت</label>
        <input type="text" value="<?= $title ?>" name="title" id="title"
               class="form-control"
               data-fv-notempty="true"
               data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
        <input class="form-group" name="chkbx_link" id="chkbx_link" <? if ($chkbx_link == 1) echo 'checked'; ?>
               type="checkbox">
        <label for="chkbx_link">لینک سایت فعال باشد؟<span id="chklnk"></span></label>
    </div>

</div>


<script>
    $(document).ready(function () {
        $("$ww").click(function () {
            $("#ww").val('qqqq');
        });
        // });

    });

</script>
<script>
    $('#chkbx_link').click(function () {
        var ss = $('#chkbx_link').is(':checked');
        alert(ss);
        if ($('#chkbx_link').is(':checked') == true) {
            $('#chklnk').text('آری');
        } else {
            $('#chklnk').text('نه');
        }
    });
</script>
<?

$s = 'http://localhost/source/comsroot/maghale03.jpg';
$temp = end(explode("/", $s));
print_r($temp);
$company_image_avatar = $temp;
print_r($company_image_avatar);
//                                                        $company_image_avatar = trim($company_image_avatar, " ");
$div_id = explode(".", $company_image_avatar);
print_r($div_id);
//


exit;


$src_file = "file/111.webp";
//$src_file="file/118.jpg";

//$img = imagecreatefromwebp($url);
$info = imagecreatefromwebp($src_file);
//print_r($info);
//
$width = imagesx($info);
$height = imagesy($info);

//var_dump($width, $height)

echo $width . 'x' . $height;
$w = 300;
$h = 300;
$dst_file = 'file/re111.webp';
$quality = 60;
$src = imagecreatefromwebp($src_file);
$dst = imagecreatetruecolor($w, $h);
imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
imagewebp($dst, $dst_file, $quality);
echo $dst_file;
// $info = getimagesize($src_file);
// $info = imagecreatefromwebp($src_file);
//    $mime = $info['mime'];
//    echo $mime;


exit;


exit;
function resize_imagejpg($src_file, $w, $h, $quality)
{

//    $wwww=dirname($src_file);
//    $wwww=strlen($wwww);
//    $src_file=substr($src_file,$wwww);
//    echo  $src_file.'wwww';
    $ww = 'http://' . $_SERVER["HTTP_HOST"] . '/';
    $ww = strlen($ww);
//    echo $ww;
//    $src_file=substr($src_file,$ww);
//print_r($src_file);
    $info = getimagesize($src_file);
    list($width, $height) = getimagesize($src_file);
    $mime = $info['mime'];
//    print_r($info['mime']);
//    print_r($mime);
//    $info.'mime='.$mime;

//    switch ($mime) {
//        case 'image/jpeg':
    if ($mime == 'image/jpeg') {
        $image_create_func = 'imagecreatefromjpeg';
        $image_save_func = 'imagejpeg';
        $src = $image_create_func($src_file);
        $dst = imagecreatetruecolor($w, $h);
//            $new_image_ext = 'jpg';
//            break;
    } //        case 'image/png':
    elseif ($mime == 'image/png') {
        $image_create_func = 'imagecreatefrompng';
        $image_save_func = 'imagepng';
        $src = $image_create_func($src_file);
        $dst = imagecreatetruecolor($w, $h);

//            echo $image_create_func.$image_save_func;
//            $new_image_ext = 'png';
//            break;

//        case 'image/gif':
//            $image_create_func = 'imagecreatefromgif';
//            $image_save_func = 'imagegif';
//            $new_image_ext = 'gif';
//            break;
//    imagecreatetruecolor(22,22)
//        default:
//            throw new Exception('Unknown image type.');
    }
//    echo    'ww='.$src_file;
//    preg_match($ww,$src_file,$match);
//    print_r($match);
//    $dst_file=strstr($src_file,'http://' . $_SERVER["HTTP_HOST"]);
//    $dst_file=strstr($src_file,$match);
    if ($quality == '')
        $quality = 60;
//    $ww=$dst_file;
//    list($width, $height) = getimagesize($src_file);
//    $src = $image_create_func($src_file);
//    $dst = imagecreatetruecolor($w, $h);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
//    preg_match('/\w{2,}\.jpg|png|jpeg$/',$src_file,$match);
//    $dst_file =$ww.implode(',',$match);

    $image_save_func($dst, $src_file, 6);
    return $src_file;
}

echo resize_imagejpg('file/12.png', 30, 30, '');

?>
<img src="<? echo resize_imagejpg('file/1.png', 30, 30, '');
?>" alt="">
<?

exit;

$rr = "1414";
$str = "sdfsdgldfjvbdfg  #name rgrgn fgd @name sdfgdsjvsdn #name fgdonfgfsindvsdfi
sdggsgs
sdgsdg
sgsghdfhdfhdf rdgd @name #nme #name sggdrghedrerghdhtrjhth";
$str_rp = str_replace('@name', $rr, $str);
//echo $str_rp;
$ww = str_replace('#name', 333, $str_rp);
echo $ww . '<br>';
//
'غربالگری شنوایی قبل از مرخص شدن نوزاد از بیمارستان انجام میش
ود. این تست برای بررسی وضعیت شنوایی نوزاد پس از تولد انجام میشود. تست غربالگری شنوایی نوزاد باید توسط ا
ودیولوژیست (شنوایی شناس) انجام گردد. در صورتی که نوزاد در مرحله غربالگری شنوایی نتیجه مطلوب را نداشت
ه باشد ، انجام بررسی های بیشتر ضروری است. غربالگری شنوایی نوزادان بوسیله ی تستOAE  انجام می گیرد.

ضرورت انجام غربالگری نوزادان
یکی از شایع ترین اختلالات بعد از تولد کم شنوایی می باشد. آمار ها نشان میدهد';

// $factory = new \ImageOptimizer\OptimizerFactory();
//    $optimizer = $factory->get();
//
//    $filepath = __DIR__ . '/images/prosper.png'; /* path to image */
//
//    $optimizer->optimize($filepath); //optimized file overwrites original one
//
//$optimizer = $factory->get(); //default optimizer is `smart`
//
//
// $pngOptimizer = $factory->get('png');  //png optimizer
//
//
// $jpgOptimizer = $factory->get('jpegoptim'); //jpegoptim optimizer etc.
//
//


// require_once 'ImageCache.php';
//
// $imagecache = new ImageCache();
//
// $imagecache->cached_image_directory = dirname(__FILE__) . '/images/cached';
//
// $cached_src = $imagecache->cache( 'images/unsplash1.jpeg' );
//


//
//// Create new imagick object
//$im = new Imagick($filepath);
//
//// Optimize the image layers
//$im->optimizeImageLayers();
//
//// Compression and quality
//$im->setImageCompression(Imagick::COMPRESSION_JPEG);
//$im->setImageCompressionQuality(25);
//
//// Write the image back
//$im->writeImages("File/Image_Opti.jpg", true);
//
//


exit;

include "database.php";
//// لیست نام های مثال
//$a[ ]="Anna";
//$a[ ]="Brittany";
//$a[ ]="Cinderella";
//$a[ ]="Diana";
//$a[ ]="Eva";
//$a[ ]="Fiona";
//$a[ ]="Gunda";
//$a[ ]="Hege";
//$a[ ]="Inga";
//$a[ ]="Johanna";
//$a[ ]="Kitty";
//$a[ ]="Linda";
//$a[ ]="Nina";
//$a[ ]="Ophelia";
//$a[ ]="Petunia";
//$a[ ]="Amanda";
//$a[ ]="Raquel";
//$a[ ]="Cindy";
//$a[ ]="Doris";
//$a[ ]="Eve";
//$a[ ]="Evita";
//$a[ ]="Sunniva";
//$a[ ]="Tove";
//$a[ ]="Unni";
//$a[ ]="Violet";
//$a[ ]="Liza";
//$a[ ]="Elizabeth";
//$a[ ]="Ellen";
//$a[ ]="Wenche";
//$a[ ]="Vicky";
//
//// از صفحه مبدا q دریافت پارامتر
//$q = $_GET["q"];
//
//// جستجو برای نام مورد نظر در صورت وارد کردن مقداری از سوی کاربر
//if (strlen($q) > 0)
//{
//$hint="";
//for( $i=0 ; $i < count($a) ;$i++ )
//{
//if (strtolower($q)==strtolower(substr($a[$i],0,strlen($q))))
//{
//if ($hint==" ")
//{
//$hint=$a[$i];
//}
//else
//{
//$hint=$hint." , ".$a[$i];
//}
//}
//}
//}
////      اگر نتیجه ای پیدا نشد ، عبارت بدون نتیجه تعیین شود
////      یا اینکه جواب خروجی ارسال شود
//if ($hint == "")
//{
//$response="no suggestion";
//}
//else
//{
//$response=$hint;
//}
//// ارسال نتیجه خروجی به صفحه مبدا - دستور ایجکس
//echo $response;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $(".submit").click(function () {
                var name = $(".name").val();
                var submit = true;
                $.post("fun.php", {n: name, submit: submit}, function (data) {
                    $(".result").html(data);
                    $(".name").val("");
                });
            });
            $(".send").click(function () {
                var fname = $(".fname").val();
                var lname = $(".lname").val();
                var send = true;
                // $(".search").focus();
                $.post("fun.php", {fname: fname, lname: lname, send: send}, function (data) {
                    $(".result1").html(data);
                    $(".fname").val("");
                    $(".lname").val("");
                });
            });

            $('#search').keyup(function () {
                var key = $(".search").val();
                var active = true;
                // $(".search").disable();
                // alert(key);
                $.get("fun.php", {key: key, active: active}, function (data) {

                    $(".searching").html(data);
                    $('#vav1').click(function () {
                        var gh = $('#vav1').attr('data-target');
                        var gh1 = $('#vav1').attr('title');
                        // alert(gh+'='+gh1);
                        $('#search').val(gh);
                    });
                    // alert('ok');
                });

            });

            $(".state").change(function () {
                var id = $(this).val();
                var active = true;
                // $(".search").disable();
                $.post("fun.php", {id: id, active: active}, function (data) {

                    $(".ostan").html(data);
                    // $(".search").val("");
                });
            });
        });


        $(document).ready(function () {

            //     $('.sidebar-menu a').click(function(e) {
            //         var href=$('.sidebar-item-link').href;
            //         console.log(href);
            //        // exit();
            //       //  e.preventDefault(); //prevent the link from being followed
            //         $('.sidebar-menu a').removeClass('active');
            //         $(this).addClass('active');
            //     });
            // });
            $(".sidebar-item-link").click(function () {
                if ($('.href2').val() === $('.sidebar-item-link').attr('href')) {
                    var fff = $('.sidebar-item-link').attr('href');
                    $.ajax({
                        type: 'POST',
                        url: 'sidebar.php',
                        data: {fff: fff},
                        success: function () {
                            alert($('.href2').val());
                            alert(fff);
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>
<table>
    <div class="result"></div>
    <tr>
        <td>name:</td>
        <td><input type="text" name="name" class="name"></td>

        <td><input type="submit" name="submit" class="submit" value="submit"></td>

    </tr>
</table>
<table>
    <div class="result1"></div>
    <tr>
        <td>name:</td>
        <td><input type="text" name="fname" class="fname"></td>
        <td>family:</td>
        <td><input type="text" name="lname" class="lname"></td>


        <td><input type="submit" name="send" class="send" value="send"></td>

    </tr>
</table>
<div id="searchdiv">

    <label for="search">search :</label>

    <input type="text" id="search" name="search" class="search" data-toggle="dropdown" data-target="">


    <div class="dropdown  searching ">
    </div>
</div>


<div class="oostan">
    <lable id="statee">نام استان :</lable>
    <select name="state" value="0" id="statee" class="state">
        <option value="0">استان خود را انتخاب کنید</option>
        <? $sql = "SELECT * FROM tb_state";
        //            echo $sql2;
        $result = $conn->query($sql);


        while ($row = $result->fetch_assoc()) {
//            $id=$row['id'];
//            $state1=$row['state'];
//            echo $id1.":".$state1;
            echo "<option value=" . $row['id'] . ">" . $row['state'] . "</option>";
            //                print_r($row);
            //            echo $id,$sate;
        } ?>
    </select>
</div>
<div class="ostan">


</div>


</table>
</body>
</html>

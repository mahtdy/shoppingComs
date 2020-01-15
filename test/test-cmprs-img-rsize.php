<!---->
<!---->
<!---->
<?php

//========= resize image =======
function resize_image_M($src_file, $w, $h,$dst_file,$quality) {
    $ww1='http://' . $_SERVER["HTTP_HOST"].'/';
if (strstr($src_file,$ww1)==true) {
    $ww = strlen($ww1);
//    echo $ww1;
    $src_file = substr($src_file, $ww);
}
    $info = getimagesize($src_file);
    $mime = $info['mime'];
//    print_r($info);
//    echo $mime;exit;
    $width=$info[0];
    $height=$info[1];
    if($quality=='')
        $quality=60;
    if($mime == 'image/png') {
        $image_create_func = 'imagecreatefrompng';
        $image_save_func = 'imagepng';
        $quality = 6;
        $src = $image_create_func($src_file);
        $dst = imagecreatetruecolor($w, $h);

        imagesavealpha($dst, true);
        $color = imagecolorallocatealpha($dst, 0, 0, 0, 127);
        imagefill($dst, 0, 0, $color);

   }elseif($mime=='image/jpeg' || $mime=='image/jpg')
    {
        $image_create_func = 'imagecreatefromjpeg';
        $image_save_func = 'imagejpeg';
        $src = $image_create_func($src_file);
        $dst = imagecreatetruecolor($w, $h);
    }elseif($mime=='image/gif')
    {
        $image_create_func = 'imagecreatefromgif';
        $image_save_func = 'imagegif';
        $src = $image_create_func($src_file);
        $dst = imagecreatetruecolor($w, $h);
    }elseif($mime=='image/webp'){
        $image_create_func = 'imagecreatefromwebp';
        $image_save_func = 'imagewebp';
        $src = $image_create_func($src_file);
        $dst = imagecreatetruecolor($w, $h);
    }
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
    if ($dst_file==''){
        $image_save_func($dst,$src_file,$quality);
        $dst_file=$ww1.$src_file;}
    else {
        preg_match('/[a-zA-z0-9-_ ()]{2,}(.png|.jpg|.jpeg|.gif)$/i',$src_file,$match);
        $name_match=$match[0];
        $dst_file =$dst_file.$w.'x'.$h.'-'.$name_match;
        $image_save_func($dst, $dst_file, $quality);
        $dst_file=$ww1.$dst_file;
    }

    return    $dst_file;
}


function ex_str($text,$word){
    $text_test=$text;
    $str_rp4 = strstr($text_test, $word);
    $str_rp4 = strstr($str_rp4, '"');
    $str_rp = str_split($str_rp4);
    $i = 1;
    while ($str_rp[$i] != '"') {
        $str_rp3[] = $str_rp[$i];
        $i++;
    }
    $exit_str = implode($str_rp3);
    return $exit_str;
}
//====== start == resize image content =====
function resize_image_content($str_content,$dst_file)
{
    $text_test=$str_content;
    $temp = 1;
    while ($temp != 0) {
        if (strstr($text_test,'src="')==true) {
            $str_rp1 = ex_str($text_test, 'src="');
            $width = ex_str($text_test, 'width="');
            $height = ex_str($text_test, 'height="');
            $check = getimagesize($str_rp1);
//        print_r($check);
//        echo $width.$check[0];
            if ($width != $check[0] || $height != $check[1]) {
//                echo 'salaaam';
                $rp_src = resize_image_M($str_rp1, $width, $height, $dst_file, 10);
                $str_content = str_replace($str_rp1, $rp_src, $str_content);
            }
            $text_test = str_replace('src="' . $str_rp1, '', $text_test);
        }
        if (strstr($text_test, 'src="') == false)
            $temp = 0;
        $text_test = strstr($text_test, 'src="');
    }
    return $str_content;
}

$text_test1='<p>fghfhhfhfhfhfghfg dggdfg <img src="file/001.jpg" width="1400" height="600" alt=""> غربالگری شنوایی قبل از مرخص شدن نوزاد از بیمارستان انجام میشود. این تست برای بررسی وضعیت شنوایی نوزاد پس از تولد انجام میشود. تست غربالگری شنوایی نوزاد باید توسط اودیولوژیست (شنوایی شناس) انجام گردد. در صورتی که نوزاد در مرحله غربالگری شنوایی نتیجه مطلوب را نداشته باشد ، انجام بررسی های بیشتر ضروری است. غربالگری شنوایی نوزادان بوسیله ی تستiOAE &nbsp;انجام می گیرد.</p>
<h2></h2>
<p>یکی از شایع ترین اختلالات بعد از تولد کم شنوایی می باشد. آمار ها نشان میدهد که حدود یک تا دو درصد از نوزادان دچار مشکل شنوایی هستند. مشکلات شنوایی نوزادان با';
$tst=trim('js/pics/');

$qqqq= resize_image_content($text_test1,$tst);
echo $qqqq;
//$str_rp=str_replace('"','',$str_rp);
//$str_rp=strstr($str_rp,'"');
//$str_rp=htmlspecialchars($text_test);
//$str_rp=strpbrk($text_test,'src="');
//$str_rp1=htmlspecialchars($str_rp);
//html_entity_decode()

//echo $str_rp3;
//echo $str_rp1;
//print_r($str_rp1);
//// The file
//$filename = 'file/1111.jpg';
//
//// Set a maximum height and width
//$width = 200;
//$height = 200;
//
//// Content type
//header('Content-Type: image/jpeg');
//
//// Get new dimensions
//list($width_orig, $height_orig) = getimagesize($filename);
//
//$ratio_orig = $width_orig/$height_orig;
//
//if ($width/$height > $ratio_orig) {
//    $width = $height*$ratio_orig;
//} else {
//    $height = $width/$ratio_orig;
//}
//
//// Resample
//$image_p = imagecreatetruecolor($width, $height);
//$image = imagecreatefromjpeg($filename);
//imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
//
//// Output
//imagejpeg($image_p, null, 60);
//

?>

<?


exit;

//========= resize image =======
function resize_imagejpg($src_file, $w, $h,$quality) {
    $ww1='http://' . $_SERVER["HTTP_HOST"].'/';
    $ww=strlen($ww1);
//    echo $wwww;
    $src_file=substr($src_file,$ww);
    $info = getimagesize($src_file);
    $mime = $info['mime'];
//    print_r($info['0']);
//    exit;
    $width=$info[0];
    $height=$info[1];
    if($quality=='')
        $quality=60;
//    print_r($mime);
//   if($mime == 'image/jpeg') {
//        case 'image/jpeg':

//            $new_image_ext = 'jpg';
//            break;
//   }
    if($mime == 'image/png') {
//        case 'image/png':
        $image_create_func = 'imagecreatefrompng';
        $image_save_func = 'imagepng';
        $quality = 6;
        $src = $image_create_func($src_file);

//            $new_image_ext = 'png';
//            break;
    }else{
        $image_create_func = 'imagecreatefromjpeg';
        $image_save_func = 'imagejpeg';
        $src = $image_create_func($src_file);
        $dst = imagecreatetruecolor($w, $h);
    }
//        case 'image/gif':
//            $image_create_func = 'imagecreatefromgif';
//            $image_save_func = 'imagegif';
//            $new_image_ext = 'gif';
//            break;
//
//        default:
//            throw new Exception('Unknown image type.');
//    }
//    $wwww=dirname($src_file);
//    $wwww=strlen($wwww);
//    $src_file=substr($src_file,$wwww);
//    echo  $src_file.'wwww';



//    echo    'ww='.$src_file;
//    preg_match($ww,$src_file,$match);
//    print_r($match);
//    $dst_file=strstr($src_file,'http://' . $_SERVER["HTTP_HOST"]);
//    $dst_file=strstr($src_file,$match);

//    $ww=$dst_file;
//    $width=$info[0];
//    $height=$info[1];
//    list($width, $height) = getimagesize($src_file);

    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
//    preg_match('/\w{2,}\.jpg|png|jpeg$/',$src_file,$match);
//    $dst_file =$ww.implode(',',$match);
    $image_save_func($dst,$src_file,$quality);
    $src_file=$ww1.$src_file;
    return    $src_file;
}


//======start====mahtdy-function========


//====== end == resize image =====
?>


<?
//echo "hi";
//        $imagename ="119.jpg";
//        $source = "file/119.jpg";
//        $target = "file/".$imagename;
//        move_uploaded_file($source, $target);
//
//        $imagepath = $imagename;
//        $save = "file/" . $imagepath; //This is the new file you saving
//        $file = "file/119.jpg";
//         //This is the original file
//echo $file;
//        list($width, $height) = getimagesize($file) ;
//
//
//        $tn = imagecreatetruecolor($width, $height) ;
//        $image = imagecreatefromjpeg($file) ;
//        imagecopyresampled($tn, $image, 0, 0, 0, 0, $width, $height, $width, $height) ;
//
//        imagejpeg($tn, $save, 100) ;
//
//        $save = "file/sml_" . $imagepath; //This is the new file you saving
//        $file = "file/" . $imagepath; //This is the original file
//
//        list($width, $height) = getimagesize($file) ;
//
//        $modwidth = 130;
//
//        $diff = $width / $modwidth;
//
//        $modheight = 185;
//        $tn = imagecreatetruecolor($modwidth, $modheight) ;
//        $image = imagecreatefromjpeg($file) ;
//        imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
//
//        imagejpeg($tn, $save, 100) ;
//        echo "Large image: <img src='file/".$imagepath."'><br>";
//        echo "Thumbnail: <img src='file/sml_".$imagepath."'>";
////
////exit;
//header('Content-Type: image/jpeg');


//
////========= resize image =======
//function resize_imagejpg($file, $w, $h) {
//    list($width, $height) = getimagesize($file);
//    print_r(  getimagesize($file));
//    $src = imagecreatefromjpeg($file);
//    $dst = imagecreatetruecolor($w, $h);
//    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
//    return $dst;
//}
////====== end == resize image =====

//function resize_imagejpg($src_file, $w, $h,$dst_file) {
//
//    list($width, $height) = getimagesize($src_file);
  // print_r(  getimagesize($file));
//    $src = imagecreatefromjpeg($src_file);
//    echo $src;
//    $dst = imagecreatetruecolor($w, $h);
//    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
//    echo $dst.'ewwew=';
//print_r($dst);
//$imgimg='file/testimg rsz.jpg';
//    ob_start();
//    $dst_file='test_resize.jpg';
//    imagejpeg($dst,$dst_file,100);
//    $img = ob_get_clean();
//   $rrr1=readfile($dst);
//    $i = file_get_contents($dst);
//   echo $img.'=fff=';
//    echo $imgresize11;
//    echo 'file/test.jpg';
//    fopen('file/test.jpg');
//    echo "<img src='data:image/jpeg;base64," . base64_encode( $i )."'>";
//    echo $re_file;
//    return    $dst_file;


//}
//function resize_img_img($src_file,$w,$h){
//    $img=resize_imagejpg($src_file, $w, $h);
//    imagejpeg($img,'file/122218.jpg');
//
//}

//
//// jpg  change the dimension 750, 450 to your desired values

//resize_imagejpg('file/118.jpg', 248, 189);
//
//imagejpeg($img, 'file/testimg.jpg');
//imagejpeg($img, null);
//
//
//



//?>
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<?php
////function resize($newWidth, $targetFile, $originalFile) {
////
////$info = getimagesize($originalFile);
////$mime = $info['mime'];
////
////switch ($mime) {
////case 'image/jpeg':
////$image_create_func = 'imagecreatefromjpeg';
////$image_save_func = 'imagejpeg';
////$new_image_ext = 'jpg';
////break;
////
////case 'image/png':
////$image_create_func = 'imagecreatefrompng';
////$image_save_func = 'imagepng';
////$new_image_ext = 'png';
////break;
////
////case 'image/gif':
////$image_create_func = 'imagecreatefromgif';
////$image_save_func = 'imagegif';
////$new_image_ext = 'gif';
////break;
////
////default:
////throw new Exception('Unknown image type.');
////}
////
////$img = $image_create_func($originalFile);
////list($width, $height) = getimagesize($originalFile);
////
////$newHeight = ($height / $width) * $newWidth;
////$tmp = imagecreatetruecolor($newWidth, $newHeight);
////imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
////
////if (file_exists($targetFile)) {
////unlink($targetFile);
////}
////$image_save_func($tmp, "$targetFile.$new_image_ext");
////}
//
//
//////////////////////////////
//// *** Include the class
//include 'RGBtoHex.php';
//
//
//$source_url="file/119.jpg";
//$destination_url="imgtesttest12.jpg";
//
//// *** 1) Initialise / load image
//$resizeObj = new resize($source_url);
//
//// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
//$resizeObj -> resizeImage(750, 550,'auto');
//
//// *** 3) Save image ('image-name', 'quality [int]')
//$resizeObj -> saveImage($destination_url, 100);
//
//
//


//$source_url="C:\xampp\htdocs\test\file119.jpg";
//$destination_url="file/imgtesttest.jpg";
//$quality=90;




function compress_image($source_url, $destination_url, $quality)
{

    $info = getimagesize($source_url);

    if ($info['mime'] == 'image/jpeg'){
        $image = imagecreatefromjpeg($source_url);
//        echo 'ww='.$image;
    }

    elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source_url);

    elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source_url);

    imagejpeg($image, $destination_url, $quality);
    return $destination_url;
}

//
//
////
////
//$source_url="file/118.jpg";
////$destination_url="file/imgtesttest1.jpg";
////$quality=65;
////compress_image($source_url, $destination_url, $quality);
////
////
////
////$source_url="file/test119.jpg";
////$destination_url="file/imgtesttest123.jpg";
////$quality=65;
////
////compress_image($source_url, $destination_url, $quality);
////
////
////
////$img = resize_imagejpg('file/imgtesttest1.jpg', 248, 189);
////
////
////imagejpeg($img, 'file/imgtesttest1111.jpg');
//
//$imgresize=resize_imagejpg($source_url,200,200);
//
//?>
<!---->
<div>
        <img src="<?=resize_imagejpg('file/118.jpg', 248, 189,'test.jpg');?>"  alt="118.jpg">
<!--       --><?//echo '<img src="data:image/jpeg;base64" . base64_encode( $i )>';?>
<!--        <img src="--><?//='data:image/jpeg;base64', base64_encode( $i )?><!--"  alt="118.jpg">-->
</div>
<!--<div>-->
<!--        <img src="file/122218.jpg" alt="oko7k1ok">-->
<!--</div>-->
<!---->
<!--<div>-->
<!--        <img src="--><?//=imagejpeg($img, 'file/testimg.jpg');?><!--"  alt="$imgresweize">-->
<!--</div>-->
<!--<div>-->
<!--<!--        <img src="file/test119.jpg" width="250" height="190" alt="test119">-->
<!--</div>-->
<!--<div>-->
<!--<!--        <img src="file/imgtesttest1111.jpg" width="250" height="190" alt="imgtesttest1111">-->
<!--</div>-->

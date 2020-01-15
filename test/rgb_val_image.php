
<?php
if (isset($_POST['file_val'])) {
    $file_val=$_POST['file_val'];
    $file_val=trim($file_val);
    $file_temp=$file_val;
//    echo $file_val;exit;
    $file_name ='http://' . $_SERVER["HTTP_HOST"] . '/new_image/file/'.$file_val;
    $file_name1=trim('..\new_image\file\ ').$file_val;
//$file_name=$_POST['file_val'];
//    print_r($file_name);
}
if (isset($_POST['file_src'])) {
    $file_src=$_POST['file_src'];
    $file_src=trim($file_src);
    $file_temp=$file_src;
//    echo $file_src;exit;http://localhost/source/comsroot/hasan/images/94s2395j6912-flowers_1.jpg
    $file_name ='http://' . $_SERVER["HTTP_HOST"] . '/source/comsroot/hasan/images/'.$file_src;
    $file_name1=trim('..\source\comsroot\hasan\images\ ').$file_src;
//$file_name=$_POST['file_src'];
//    print_r($file_name);
}
//
//
//echo $file_name;
//exit;
//$file_name='file/1120.jpg';
$temp = explode(".",$file_name);
//print_r($temp);
//echo end($temp);
//$temp(last)
if (end($temp)=='jpg' or end($temp)=='jpeg')
$im = imagecreatefromjpeg($file_name);
else if (end($temp)=='png')
    $im = imagecreatefrompng($file_name);
$width = imagesx($im);
$height = imagesy($im);

//imagedestroy($im);
$hpart = round($width/5);  // divide image in five columns
$vpart = round($height/2); // divide image in two rows


$r = 0;
$g = 0;
$b = 0;

$rarr = array();
$garr = array();
$barr = array();


for($i=0; $i<5; $i++) {
    $sampleh = round($hpart/2) + ($hpart*$i);
    $samplev = round($vpart/2);

    $rgb = imagecolorat($im, $sampleh,$samplev);
    $r += ($rgb >> 16) & 0xFF;
    $g += ($rgb >> 8) & 0xFF;
    $b += $rgb & 0xFF;

    $rarr[] = ($rgb >> 16) & 0xFF;
    $garr[] = ($rgb >> 8) & 0xFF;
    $barr[] = $rgb & 0xFF;

}

for($i=0; $i<5; $i++) {
    $sampleh = round($hpart/2) + ($hpart*$i);
    $samplev = round($vpart/2) + $vpart;

    $rgb = imagecolorat($im, $sampleh,$samplev);

    $r += ($rgb >> 16) & 0xFF;
    $g += ($rgb >> 8) & 0xFF;
    $b += $rgb & 0xFF;
//print_r($r);
    $rarr[] = ($rgb >> 16) & 0xFF;
    $garr[] = ($rgb >> 8) & 0xFF;
    $barr[] = $rgb & 0xFF;

}


$r = round($r/10);
$g = round($g/10);
$b = round($b/10);
//imagecreatefromjpeg($file_name);
//echo $r.' '.$b.' '.$g;
//print_r( $rarr);
// echo "$r , $g, $b <br/>\n";

        $rgb = imagecolorat($im, 5,6);
        $r = ($rgb >> 16) & 0xFF;
        $g = ($rgb >> 8) & 0xFF;
        $b = $rgb & 0xFF;

//down vote
//You can use following function

function rgbtohex($R, $G, $B)
{

    $R = dechex($R);
    if (strlen($R)<2)
    $R = '0'.$R;

    $G = dechex($G);
    if (strlen($G)<2)
    $G = '0'.$G;

    $B = dechex($B);
    if (strlen($B)<2)
    $B = '0'.$B;

    return  $R . $G . $B;
}


list($width, $height, $type, $attr) = getimagesize($file_name);
$info = getimagesize($file_name);
//print_r($info);
$size1 = filesize($file_name1);
//
///////////مقدار به سایز فایل به مگا و گیگا بایت//////////
//function formatSizeUnits($bytes)
//{
//    if ($bytes >= 1073741824)
//    {
//        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
//    }
//    elseif ($bytes >= 1048576)
//    {
//        $bytes = number_format($bytes / 1048576, 2) . ' MB';
//    }
//    elseif ($bytes >= 1024)
//    {
//        $bytes = number_format($bytes / 1024, 2) . ' KB';
//    }
//    elseif ($bytes > 1)
//    {
//        $bytes = $bytes . ' bytes';
//    }
//    elseif ($bytes == 1)
//    {
//        $bytes = $bytes . ' byte';
//    }
//    else
//    {
//        $bytes = '0 bytes';
//    }
//
//    return $bytes;
//}
//echo formatSizeUnits($size1);

//function filesize_formatted($path)
//{
//    $size = filesize($path);
//    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
//    $power = $size > 0 ? floor(log($size, 1024)) : 0;
//    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
//}
//$size1=(filesize_formatted($file_name1));

////////پایان تابع/////

//// Open a the file, this should be in binary mode
//$fp = fopen('file/1120.jpg', 'rb');
//
//if (!$fp) {
//    echo 'Error: Unable to open image for reading';
//    exit;
//}
//
//// Attempt to read the exif headers
//$headers = exif_read_data('file/113.jpg');
//
//if (!$headers) {
//    echo 'Error: Unable to read exif headers';
//    exit;
//}
//
//// Print the 'COMPUTED' headers
//echo 'EXIF Headers:' . PHP_EOL;
//
//foreach ($headers['COMPUTED'] as $header => $value) {
//    printf(' %s => %s%s', $header, $value, PHP_EOL);
//}
//
//exit;

?>
<li class="M_w_p">
    <input type="text" class="input-fild" name="imgsize" value="<?=$size1?>">
    <lable class="input-fild">سایز عکس</lable>
</li>
<br>
<li class="M_w_p">
    <input type="text" class="input-fild" name="imgw" value="<?=$width?>">
    <lable class="input-fild">عرض عکس</lable>

</li>
<br>
<li class="M_w_p">
    <input type="text" class="input-fild" name="imgh" value="<?=$height?>">
    <lable class="input-fild">ارتفاع عکس</lable>
    <input type="hidden" class="input-fild" name="filename" value="<?=$file_temp?>">
</li>





<?
//echo 'سایز فایل : '.$size1.'کیلو بایت'.'<br>';
//print_r($info);
//echo '   عرض :  '.$width.'  ارتفاع :   '.$height;
//echo "<img src=\"$file_name\" $attr alt=\"getimagesize() example\" />";
?>
<!--    Type of image consider like --->
<!---->
<!--    1 = GIF-->
<!--    2 = JPG-->
<!--    3 = PNG-->
<!--    4 = SWF-->
<!--    5 = PSD-->
<!--    6 = BMP-->
<!--    7 = TIFF(intel byte order)-->
<!--    8 = TIFF(motorola byte order)-->
<!--    9 = JPC-->
<!--    10 = JP2-->
<!--    11 = JPX-->
<!--    12 = JB2-->
<!--    13 = SWC-->
<!--    14 = IFF-->
<!--    15 = WBMP-->
<!--    16 = XBM-->

<?
//echo "<div> <img src='$file_name' border=1 style='width: 400px;height: 300px' /></div><br/>\n";
//echo '<div style="font-size:60px;color:rgb(' .$r .'.'.$g.'.'.$b.')">Text in color of the Image</div>';

//$text = "Text in color of the Image";
//$coloredText = "";
$j = 0;
$r='';
?>
<div class="theme" style="">
    <ul class="themeBox">
        <?    for($i=0; $i<10; $i++) {

//            $coloredText .= '<span style="color:rgb(' .$rarr[$j] .'.'.$garr[$j].'.'.$barr[$j].')">'.$text[$i].'</span>';
            ?>

                <li draggable="false" aria-haspopup="true" data-index="<?=$j?>" style="background:  rgb(<?=$rarr[$j]?>,<?=$garr[$j]?>,<?=$barr[$j]?>)" class="">
                    <input type="text" name="imagehex" class="input-imagehex" width="10px" value="<?=rgbtohex($rarr[$j],$garr[$j],$barr[$j]);?>"></li>
            <input type="hidden" name="imghex<?=$j?>" value="<?=rgbtohex($rarr[$j],$garr[$j],$barr[$j]);?>">



            <?
            $j++;
            if($j === 10) {
                $j=0;
            }
        }?>
    </ul>
</div>
<?

//echo "<div style='font-size:60px;'>$coloredText </div>\n";
?>
</body>
</html>


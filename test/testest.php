
<?php

$image_name='watermark/testwater/115.jpg';
$logo_name='watermark/testwater/1.png';
$im_1 = imagecreatefromjpeg($image_name);
$im_2 = imagecreatefrompng($logo_name);
echo "<img src=\"".$image_name."\">";

$marge_right = 0;
$marge_bottom = 0;

$sx_1 = imagesx($im_1);
$sx = imagesx($im_2);
$sy_1 = imagesy($im_1);
$sy = imagesy($im_2);


imagecopy($im_2, $im_2,0 , 0 , 0, 0, imagesx($im_1), imagesy($im_1));
//imagecopy($im_1, $im_2,0 , 0 , 0, 0, imagesx($im_1), imagesy($im_1));

$second_image_name='image_with_logo.png';
imagepng($im_1, $second_image_name);
echo "<br /><br />";
echo "<img src=\"".$second_image_name."\">";
imagedestroy($im_1);
imagedestroy($im_2);




exit;


?>



function addWatermark($watermark, $imageDirectory, $imageName, $x = 0, $y = 0)
{
    if(file_exists($watermark))
    {
        $marge_right  = 0;
        $marge_bottom = 0;

        $stamp = imagecreatefrompng($watermark);

        $image_extension = @end(explode(".", $imageName));

        switch($image_extension)
        {
            case "jpg":
                $im = imagecreatefromjpeg("$imageDirectory/$imageName");
                break;
            case "jpeg":
                $im = imagecreatefromjpeg("$imageDirectory/$imageName");
                break;
            case "png":
                $im = imagecreatefrompng("$imageDirectory/$imageName");
                break;
        }

        $imageSize = getimagesize("$imageDirectory/$imageName");

        $watermark_o_width = imagesx($stamp);
        $watermark_o_height = imagesy($stamp);

        $newWatermarkWidth = $imageSize[0];
        $newWatermarkHeight = $watermark_o_height * $newWatermarkWidth / $watermark_o_width;


        if((int)$x <= 0)
            $x = $imageSize[0]/2 - $newWatermarkWidth/2;
        if((int)$y <= 0)
            $y = $imageSize[1]/2 - $newWatermarkHeight/2;
//        echo $im.'=='.$imageDirectory.$imageName;

        imagecopyresized($im, $stamp, $x, $y, 0, 0, $newWatermarkWidth, $newWatermarkHeight, imagesx($stamp), imagesy($stamp));

        switch($image_extension)
        {
            case "jpg":
                header('Content-type: image/jpeg');
                imagejpeg($im, "$imageDirectory/$imageName", 40);
                break;
            case "jpeg":
                header('Content-type: image/jpeg');
                imagejpeg($im, "$imageDirectory/$imageName", 40);
                break;
            case "png":
                header('Content-type: image/png');
                imagepng($im, "$imageDirectory/$imageName");
                break;
        }
    }
}


addWatermark('watermark/testwater/1.png', 'watermark/testwater', '11.jpg');




























exit;
<?

//$text_test=$text;
$str_rp4 = strstr('title="1سلام چطوری" title="سلام چطوری2" یبی title="3سلام چطوری" ', 'title="');
//echo $str_rp4;
//$str_rp1=ex_str($str_rp4,'title="');
//echo '<br>'.$str_rp1;
//exit;
$i=3;
$f[]='a';
$f[]='d';
$f[]='f';
print_r($f);
$d[]=$f[$i-1].$f[$i-2].$f[$i-3];
print_r($d);
$r=implode($d);
echo '<br>'.$r;
exit;
$str_rp4 = strstr($str_rp4, '"');
echo $str_rp4.'<br>';
$str_rp = str_split($str_rp4);
$i = 1;
while ($str_rp[$i] != '"') {
    $str_rp3[] = $str_rp[$i];
    $i++;
}
print_r($str_rp3);
echo implode($str_rp3);
exit;
//$text_test=$text;
//$str_rp4 = strstr($text_test, $word);
//$str_rp4 = strstr($str_rp4, '"');
//$str_rp = str_split($str_rp4);
//$i = 1;
//while ($str_rp[$i] != '"') {
//    $str_rp3[] = $str_rp[$i];
//    $i++;
//}
//$str_rp1 = ex_str($text_test, 'src="');
//$width = ex_str($text_test, 'width="');
//$height = ex_str($text_test, 'height="');
//$check = getimagesize($str_rp1);
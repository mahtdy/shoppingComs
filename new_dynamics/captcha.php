<?php  
header('Content-Type: image/png');
$im = imagecreatetruecolor(70, 30);
$white = imagecolorallocate($im,  rand(0,255), rand(0,255), rand(0,255));
$grey = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
$black = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
imagefilledrectangle($im, 0, 0, 399, 29, $white);
@session_start();
$text=rand(1000,9999);
$_SESSION["code"]=$text;
$font = '..//yep_theme//default//rtl//fonts//arial.ttf';
imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
imagettftext($im, 20, 0, 10, 20, $black, $font, $text);
imagepng($im);
imagedestroy($im);
?>
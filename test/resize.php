<?php
//function resize($newWidth, $targetFile, $originalFile) {
//
//$info = getimagesize($originalFile);
//$mime = $info['mime'];
//
//switch ($mime) {
//case 'image/jpeg':
//$image_create_func = 'imagecreatefromjpeg';
//$image_save_func = 'imagejpeg';
//$new_image_ext = 'jpg';
//break;
//
//case 'image/png':
//$image_create_func = 'imagecreatefrompng';
//$image_save_func = 'imagepng';
//$new_image_ext = 'png';
//break;
//
//case 'image/gif':
//$image_create_func = 'imagecreatefromgif';
//$image_save_func = 'imagegif';
//$new_image_ext = 'gif';
//break;
//
//default:
//throw new Exception('Unknown image type.');
//}
//
//$img = $image_create_func($originalFile);
//list($width, $height) = getimagesize($originalFile);
//
//$newHeight = ($height / $width) * $newWidth;
//$tmp = imagecreatetruecolor($newWidth, $newHeight);
//imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
//
//if (file_exists($targetFile)) {
//unlink($targetFile);
//}
//$image_save_func($tmp, "$targetFile.$new_image_ext");
//}


////////////////////////////
// *** Include the class
include("RGBtoHex.php");


// *** 1) Initialise / load image
$resizeObj = new resize('sample.jpg');

// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
$resizeObj -> resizeImage(150, 150,'exact');

// *** 3) Save image ('image-name', 'quality [int]')
$resizeObj -> saveImage('sample-resized.jpg', 100);



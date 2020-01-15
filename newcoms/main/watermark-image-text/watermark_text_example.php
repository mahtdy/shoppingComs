
<html5>

    <body>
    <img src="testwater/115.jpg" alt="">
    <input type="text" value="sasassa">
    </body>
</html5>


<?
echo 'sasalsas';exit;
#################################################################################
# Watermark Image using Text script usage example
# For updates visit http://www.zubrag.com/scripts/
#################################################################################

//Let's say you sent the filename via the url, i.e. watermark.php?filename=myimage.jpg
$filename=$_REQUEST['filename'];
//$imgpath is where your images in this gallery reside
$imgpath="images/";
//Put them all together to get the full path to the image:
$imgpath = $imgpath.$filename;
//OK cool, let's start the process of outputting the image with a watermark...
header('content-type: image/jpeg'); //HTTP header - assumes your images in the gallery are JPGs
//$watermarkfile is the filepath for your watermark image as a PNG-24 Transparent (ex: your logo)
$watermarkfile="images/watermark.png";
//Get the attributes of the watermark file so you can manipulate it
$watermark = imagecreatefrompng($watermarkfile);
//Get the width and height of your watermark - we will use this to calculate where to put it on the image
list($watermark_width,$watermark_height) = getimagesize($watermarkfile);
//Now get the main gallery image (at $imgpath) so we can maniuplate it
$image = imagecreatefromjpeg($imgpath);
//Get the width and height of your image - we will use this to calculate where the watermark goes
$size = getimagesize($imgpath);
//Calculate where the watermark is positioned
//In this example, it is positioned in the lower right corner, 15px away from the bottom & right edges
$dest_x = $size[0] - $watermark_width - 15;
$dest_y = $size[1] - $watermark_height - 15;
//I used to use imagecopymerge to apply the watermark to the image
//However it does not preserve the transparency and quality of the watermark
//imagecopymerge($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height, 70);
//So I now use this function which works beautifully:
//Refer here for documentation: http://www.php.net/manual/en/function.imagecopy.php
imagecopy($image, $watermark, $dest_x, $dest_y, 0, 0, $watermark_width, $watermark_height);
//Finalize the image:
imagejpeg($image);
//Destroy the image and the watermark handles
imagedestroy($image);
imagedestroy($watermark);

?>
<img src="watermark.php?filename=coolimagebro.jpg">
<?

exit;
// Watermark text
$text = 'zubrag.com';

// Watermark text color, Hex format. Must start from #
$color = '#000000';

// Font name. Case sensitive (i.e. Arial not equals arial)
$font = 'arial.ttf';

// Font size
$font_size = '8';

// Angle for text rotation. For example 0 - horizontal, 90 - vertical
$angle = 90;

// Horizontal offset in pixels, from the right
$offset_x = 0;

// Vertical offset in pixels, from the bottom
$offset_y = 0;

// Shadow? true or false
$drop_shadow = true;

// Shadow color, Hex format. Must start from #
// This may help to make watermark text more distinguishable from image background
$shadow_color = '#909009';

// 1 - save as file on the server, 2 - output to browser, 3 - do both
$mode = 1;

// Images folder, must end with slash.
$images_folder = '/testwater/115.jpg';

// Save watermarked images to this folder, must end with slash.
$destination_folder = 'testwater/dst/11.jpg';

#################################################################################
#     END OF SETTINGS
#################################################################################

// Load functions for image watermarking
include("watermark_text.class.php");

// Watermark all the "jpg" files from images folder
// and save watermarked images into destination folder
?>
<!--    <img src="--><?//=$images_folder?><!--" alt="">-->

<?
foreach (glob($images_folder."*.jpg") as $filename) {

  // Image path
  $imgpath = $filename;
  
  // Where to save watermarked image
  $imgdestpath = $destination_folder . basename($filename);

  // create class instance
  $img = new Zubrag_watermark($imgpath);
  
  // shadow params
  $img->setShadow($drop_shadow, $shadow_color);
  
  // font params
  $img->setFont($font, $font_size);
  
  // Apply watermark
  $img->ApplyWatermark($text, $color, $angle, $offset_x, $offset_y);

  // Save on server
  $img->SaveAsFile($imgdestpath);

  // Output to browser
  //$img->Output();

  // release resources
  $img->Free();

}

?>



<?php
















exit;

?>



<html>
<head>
    <title>jQuery-Mask-Plugin UnitTesting</title>
    <link rel="stylesheet" href="http://code.jquery.com/qunit/qunit-1.11.0.css" type="text/css" media="all">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/qunit/qunit-1.11.0.js"></script>

    <script type="text/javascript" src="./sinon-1.10.3.js"></script>
    <script type="text/javascript" src="./sinon-qunit-1.0.0.js"></script>

    <script type="text/javascript" src="../src/jquery.mask.js"></script>
    <script type="text/javascript" src="jquery.mask.test.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<h1 id="qunit-header">jQuery-Mask-Plugin QUnit Tests</h1>
<h2 id="qunit-banner"></h2>
<div id="qunit-testrunner-toolbar"></div>
<h2 id="qunit-userAgent"></h2>
<ol id="qunit-tests"></ol>
<div id="qunit-fixture">test markup, will be hidden</div>

<!-- testing area -->
<input class="simple-field" type="text" />
<input class="simple-field-data-mask" type="text" data-mask="00/00/0000"/>
<input class="simple-field-data-mask-selectonfocus" type="text" data-mask="00/00/0000" data-mask-selectonfocus="true" />
<input class="simple-field-data-mask-reverse" type="text" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false"/>
<input class="simple-field-data-mask-clearifnotmatch" data-mask="000" type="text" data-mask-clearifnotmatch="true" />
<input class="simple-field-data-mask-clearifnotmatch-and-optional-mask" data-mask="009" type="text" data-mask-clearifnotmatch="true" />
<div class="simple-div"></div>
<div id="container-dy-non-inputs"> </div>
<!--/ testing area-->

</body>
</html>




















<?php
// Create the image


















exit;
// The text to draw
$text = 'mahdiheydar445moradi12345678901234567890@gmail.com';
$len=strlen($text);
$width=$len*15;
?>
    <input type="text" name="text" value="">
    <input type="text" name="len" value="<?=$len?>">


<?
$im = imagecreatetruecolor($width, 40);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
//$grey = imagecolorallocate($im, 128, 128, 128);
//$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, $width, 39, $white);
// Replace path by your own font path
//$font = 'arial.ttf';
//$font = 'http://' . $_SERVER["HTTP_HOST"] .'/yep_theme/default/rtl/images/email/arial.ttf';
    $font = '..\yep_theme\default\rtl\images\email\arial.ttf';
echo $font;
// Add some shadow to the text
//imagettftext($im, 40, 0, 11, 21, $grey, $font, $text);

// Add the text
imagettftext($im, 10, 0, 15, 25, 0, $font, $text);

// Create image in folder
$image_name='..\yep_theme\default\rtl\images\email\my_image1.jpg';
imagejpeg($im, $image_name);
imagedestroy($im);

// Show image in output page
echo "<img src=\"".$image_name."\">";
?>
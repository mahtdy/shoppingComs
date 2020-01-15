<?php

header("location: download_link.php");
echo "send data";
header("location: test.php"); //1.html already sent





//
////our download function
//function download_file1($file,$speed){
////    echo $file,$speed;
//    set_time_limit(-1);
//    if(isset($file)){
//        echo $file,$speed;
//        header("Pragma: public");
//        header("Expires: 0");
//        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//        header("Cache-Control: public");
//        header("Content-Description: File Transfer");
//        header("Content-type: application/octet-stream");
//        header("Content-Disposition: attachment; filename=\"".basename($file)."\"");
//        header("Content-Transfer-Encoding: binary");
//        header("Content-Length: ".filesize($file));
//        $fcon=fopen($file,"r");
//        $speed*=1024; //speed in KB
//        while(!feof($fcon)){
//            echo fread($fcon,$speed);
//            sleep(1);
//            flush();
//        }
//        fclose($fcon);
//    }else{
////if file not exists send 404 not found
//        header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
////        echo $file,$speed;
//        exit();
//    }
//}

//run our download function
//download_file1('1.mp3',100);


//دوتا پارامتر میگیره. پارامتر اول آدرس فایل و پارامتر دوم سرعت دانلود به کیلوبایت
// خواهد بود. توی این تابع فایل رو به صورت تیکه تیکه برای دانلود به خروجی میفرستم
// و اندازه ی هر تیکه از فایل رو با متغییر speed تعیین میکنم.
// این متغییر مشخص میکنه که توی هر ثانیه چه مقداری از فایل به خروجی فرستاده بشه.
// مثلا اگه توی هر ثانیه ۱۰۰ کیلوبایت برای دانلود
// به خروجی فرستاده بشه سرعت دانلود ما برابر با ۱۰۰kb/s خواهد بود.
// برای ایجاد وقفه زمانی بین ارسال تیکه های فایل از دستور sleep استفاده کردم
// که زمان رو بر حسب ثانیه بهش میدیم و توی اون مدت زمان عمل وقفه رو انجام میده.


////------------------------------
//$uri=$_SERVER['REQUEST_URL'];
//$word=(explod("/",$url));
//$x=$word['1'];
/// ارایه لینک را جدا جدا میکند
////---------------------------------------
//1- در هر بار درخواست دانلود از سمت کاربر، فایل ها به دایرکتوری موقت سرور سایت
// دروپالی انتقال داده شده و فایل نهایی به کاربر ارائه شود.
// عموما در این حالت فایل ها پس از یک زمان معین از مکان مربوطه حذف خواهند شد
// و دیگر لینک دانلود فایل قابل دسترسی نیست. در این روش شما باید تمامی بستر دروپالی
// را تهیه کنید و عمدتا به کد نویسی اختصاصی نیز نیاز دارید
//. این عمل تقریبا مشابه عملیاتی است که یوتیوب برای نمایش ویدئو های خود انجام می دهد.
//2- با استفاده از وب سرور قابلیتی تهیه کنید که
// آدرس های تقلبی بجای آدرس های واقعی سایت مقصد تنظیم شوند. یک Rule شبیه به نمونه زیر:

//RewriteRule fake_url(.*)$ real_url?$1 [L,QSA]
//
//سپس با استفاده از قابلیت های دسترسی فایل Order Deny,Allow در وب سرور
// مقصد (مکانی که فایل ها بروی آن قرار دارد) محدودیتی بوجود آورید
// که دسترسی به فایل ها فقط از طریق آدرس اصلی دروپال امکان پذیر باشد.
//3- با استفاده از قابلیت sync و symbolic links در لینوکس ،
// یکی از دایرکتوری های موجود در دایرکتوری فایل دروپال را به
// یک مقصد نهایی در سرور دیگر که فایل ها در آن قرار دارد متصل کنید.
// با فرض قرار گرفتن سایت دروپال بروی 127.0.0.1 و قرار گرفتن
// فایل ها در 192.168.0.1 میتوان گفت قوانین زیر باید اعمال شوند:

//public:// => http://127.0.0.1/sites/default/files
//public://images => http://127.0.0.1/sites/default/files/images
///sites/default/files/remote => http://192.168.1.1/files
//public://remote => http://192.168.1.1/remote

//----------------------------------


//ز طریق برنامه phpMyAdmin یا با استفاده از کدهای PHP، دیتابیس download را می سازیم
// (در این آموزش فرض بر این است که از طریق برنامه phpMyAdmin پایگاه داده را ساخته اید)
//، سپس کدهای زیر را (در صورت نیاز پس از اعمال تنظیمات اتصال) در دایرکتوری فرضی time-limit-download و با
// نام table_create.php در ریشه هاست یا در سرور مجازی اجرا می کنیم
// (باید این دایرکتوری را در فولدر www یا public_html و فایل را داخل آن داشته باشید).

//<!doctype html>
//<html>
//<head>
//<meta charset="utf-8">
//<title>وبگو | ساخت جدول دانلود مدت دار فایل</title>
//<!-- https://webgoo.ir -->
//<style type="text/css">
//body{
//    font-family:Tahoma, Geneva, sans-serif;
//    font-size:12px;
//    direction:rtl;
//}
//.ltr{
//    direction:ltr;
//}
//</style>
//</head>
//<body>
//<?php
//@$con = mysqli_connect('localhost', 'root', '', 'download');
////خطای اتصال
//if(mysqli_connect_errno()){
//    echo 'اتصال با دیتابیس برقرار نشد:
//    <br>
//    <div class="ltr">
//    '.mysqli_connect_errno().' - '.mysqli_connect_error().'
//    </div>';
//}
////اتصال برقرار است
//else{
//    $query = mysqli_query($con, "CREATE TABLE file_storage(
//    id INT NOT NULL AUTO_INCREMENT,
//    PRIMARY KEY(id),
//    client_ip VARCHAR(255),
//    original_name VARCHAR(255),
//    temp_name VARCHAR(255),
//    date_time BIGINT(20)) ENGINE=MyISAM");
//
//    if(mysqli_errno($con)){
//        echo 'بروز خطا در ایجاد جدول:
//        <br>
//        <div class="ltr">'.mysqli_errno($con).' - '.mysqli_error($con).'</div>';
//    }
//    else{
//        $link = 'http://'.$_SERVER["SERVER_NAME"].'/time-limit-download/test.zip';
//        echo 'جدول با موفقیت ساخته شد.
//        <br>
//        <div class="ltr">
//        <a href="'.$link.'">'.$link.'</a>
//        </div>';
//    }
//}
//
//$close = mysqli_close($con);
//?>
<!--</body>-->
<!--</html>-->

<!--لینک اجرای فایل باید مطابق با نمونه زیر باشد.-->
<!--http://localhost/time-limit-download/table_create.php-->

<!--نکته: در این آموزش از اکستنشن mysqli استفاده شده که می توانید مطابق سلیقه
از PDO یا حتی اکستنش اولیه mysql استفاده کنید (استفاده از این اکستنشن به جزء در موارد آموزشی و پروژه های قدیمی، توصیه نمی شود).-->




//-----------------------------------------
<?php
//// We'll be outputting a PDF
//header('Content-type: application/pdf');
//
//// It will be called downloaded.pdf
//header('Content-Disposition: attachment; filename="downloaded.pdf"');
//
//// The PDF source is in original.pdf
//readfile('original.pdf');
//?>
<!---->
<?php
//if ( can_this_file_be_downloaded() ) {
//    header('Content-type: application/pdf');
//    header('Content-Disposition: attachment; filename="invoice.pdf"');
//    readfile("{$_GET['filename']}.pdf");
//} else {
//    die("None shall pass");
//}
//?>
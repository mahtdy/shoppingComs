


<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/js/jsTree/dist/themes/proton/style.css" />
<link rel="stylesheet" href="/yep_theme/css/imgtorgb.css" />
<script type="text/javascript" src="/filemanager/plugin.min.js"></script>
<link rel="stylesheet" type="text/css" href="/filemanager/css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="/filemanager/js/jquery.fancybox.pack.js"></script>
<script src="/yep_theme/default/rtl/js/jsTree/dist/jstree.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/jquery-ui.min.js"></script>
<script type="text/javascript" src="/new_orakuploader/orakuploader.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/daterangepicker.css" />
<script src="/yep_theme/default/rtl/assets/js/date-time/daterangepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>
<script src="/yep_theme/default/rtl/js/tinymce/tinymce.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/dropdown-menu-trigger.css">
<link rel="stylesheet" href="/new_plugin/video-js/css/video-js.min.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-tagsinput.css"/>
<script src="/yep_theme/default/rtl/js/bootstrap-tagsinput.js"></script>
<!----ajax uploder-->
<link type="text/css" href=" /new_orakuploader/orakuploader.css" rel="stylesheet"/>

<link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/colorbox.css" />
<!---->
<link rel="stylesheet" href="/yep_theme/default/rtl/css/select3.css"/>
<script src="/yep_theme/default/rtl/js/select2.js"></script>

<link rel="stylesheet" href="/yep_theme/css/imgtorgb1.css" />


<script src="../assets/vendors/jquery/jquery-3.3.1.min.js"></script>
<script src="../assets/vendors/select2/js/select2.min.js"></script>
<script src="js/jquery.js" type="text/javascript"></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/select2.min.js"></script>


<?


$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "mosavi";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
mysqli_set_charset($conn,"utf8");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['sndfl']))
    $file=$_POST['sndfl'];
if (isset($_POST['token']))
    $token=$_POST['token'];
//$token ='qRvrlfRlsSHPcOfKAEcq3vNJ';
//$token = $_POST['token'];
//$file='test.zip';
//$file = $_POST['sndfl'];
//$link = $_POST['link'];
//echo $token.$file;exit;

if(!isset($file) || !isset($token)){
    echo 'مشکلی در دریافت اطلاعات فایل وجود دارد!';
}
else{
//     $conn = mysqli_connect('localhost', 'root', '', 'test');
    //خطای اتصال
    if(mysqli_connect_errno()){
        echo 'اتصال با دیتابیس برقرار نشد:
        <br>
        <div class="ltr">
        '.mysqli_connect_errno().' - '.mysqli_connect_error().'
        </div>';
    }
    //اتصال برقرار است
    else{
        $date = date('YmdHis');
        //مدت زمان اعتبار لینک به ثانیه
        $time = date('YmdHis', time() - 60);
        //ایمن سازی
        $token = mysqli_real_escape_string($conn, $token);
        $file = mysqli_real_escape_string($conn, $file);
//        حذف ردیف هایی که تاریخ اعتبار آنها گذشته است
         $sql ="DELETE FROM file_storage WHERE date_time < '$time'";

        //بررسی اطلاعات فایل درخواستی کاربر با سرور
     $sql = "SELECT temp_name FROM file_storage WHERE original_name = '$file' AND temp_name = '$token' LIMIT 1";
//        $count = mysqli_num_rows($sql);
        $count = 1;
//        اطلاعات فایل معتبر است
        if($count > 0){
            //تابع برای بدست آوردن پسوند فایل
            function getExtension($file){
                preg_match('/\.[^\.]+$/i', $file, $ext);
                return $ext[0];
            }

            //نوع فایل
            $file_type = NULL;
            switch(getExtension($file)){
                case 'png':
                    $file_type = 'image/png';
                    break;
                case 'jpeg':
                    $file_type = 'image/jpeg';
                    break;
                case 'jpg':
                    $file_type = 'image/jpg';
                    break;
            }

            //ارسال فایل به مرورگر برای دانلود


          $file_name =__dir__ .trim('\..\new_image\file\ ').  $file;
//          $file_name =__dir__ .'/file/'.  $file;
//            $file_name = 'http://'.$_SERVER["SERVER_NAME"].'/'.'new_image/file'.'/'.$file.'';
//             $file_name =   $file;
            $size=filesize("$file_name");
//            echo $size.'eeee'.$file_name;

             header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Type: ');
            header('Content-Disposition: attachment; filename='.$file);//save as IDM
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: '.filesize("$file_name"));
//        header('Cache-control: private');
//        header('Content-Type: application/octet-stream');
//        header('Content-Length: '.filesize($file));
//        header('Content-Disposition: filename='.$file);
            ob_clean();
            flush();
            readfile("$file_name");
        }
        //لینک فایل معتبر نیست یا فایل حذف شده
        else{
            echo 'فایل مورد نظر یافت نشد!';
        }
    }

    $close = mysqli_close($conn);
}
?>


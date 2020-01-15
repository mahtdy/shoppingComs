
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

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/jquery.js" type="text/javascript"></script>

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

if (isset($_POST['link']))
    $file=$_POST['link'];
//echo $file;
//تابعی برای ایجاد عبارت رندوم
function randomStr($length){
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_string = '';
    for($i = 0; $i < $length; $i++){
        $random_string .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $random_string;
}

//$file = 'test.rar';//$file = $_GET['file'];
if(!isset($file)){
    echo 'مشکلی در دریافت اطلاعات فایل وجود دارد!';
}    //اتصال برقرار است
    else {
        $temp = randomStr(24);
//        echo $temp;
        $date = date('YmdHis');
        //مدت زمان اعتبار لینک به ثانیه
        $time = date('YmdHis', time() - 60);
//echo $date.'***'.$time;
        //ایمن سازی
//        $file = mysqli_real_escape_string($con, $file);
        $ip = ($_SERVER["SERVER_ADDR"]);

    }
if(1==2){
        //حذف ردیف هایی که تاریخ اعتبار آنها گذشته است
        $sql = "DELETE FROM file_storage WHERE date_time < '$time'";

        //بررسی ip
        $sql =  "SELECT temp_name FROM file_storage WHERE client_ip = '$ip' AND original_name = '$file' LIMIT 1";
        $result = $conn->query($sql);
//$count=sqlite_num_rows($sql);
//echo $count;

        $count = mysqli_num_rows($result);
        echo $count.'wwwww';

        //استفاده از لینک موجود
        if($count > 0){
            while ($row = $result->fetch_assoc()){
                $temp = $row['temp_name'];
//                echo $temp;
                //آپدیت زمان
                $update = "UPDATE file_storage SET date_time = '$date' WHERE client_ip = '$ip' AND original_name = '$file' LIMIT 1";
                $conn->query($update);
            }
        }}
        //ایجاد لینک جدید
        else{
            $sql ="INSERT INTO file_storage (
            client_ip, original_name, temp_name, date_time)
            VALUES('$ip', '$file', '$temp', '$date')";
//            print_r($sql);
$conn->query($sql);
//            show_msg('عکس شما با موفقیت اضافه گردید');
        }

        if(mysqli_errno($conn)){
            echo 'بروز خطا در ذخیره و ایجاد لینک دانلود:
            <br><div class="ltr">'.mysqli_errno($con).' - '.mysqli_error($con).'</div>';
        }
        else{
            $link = 'http://'.$_SERVER["SERVER_NAME"].'/'.$temp.'/'.$file.'';
          ?>
            <div class="dwnld">
                <form action="download_file.php" method="post">
        <label class="dwnld rtl">لینک دانلود با موفقیت ساخته شد  </label>
        <input  type="text" name="link_download" id="link_download" value="<?=$link;?>"  class="dwnld">
        <input  type="text" name="token" id="token" value="<?=$temp?>">
        <input  type="text" name="sndfl" id="sndfl" value="<?=$file?>">
        <input type="submit"  value="دانلود کنید..." id="send_file" class="dwnld rtl" >

                </form>
            </div>

            <?
//            print_r($_POST);

//            echo 'www';
//            print_r($link);
//            echo 'لینک دانلود با موفقیت ساخته شد: ';
//            <br>
//            <div class="ltr">
//            <a href="'.$link.'">'.$link.'</a>
//            </div>';
        }


    $close = mysqli_close($conn);

?>


<div id="dwnldfl">

</div>
<!--    <script>-->
<!--        $('#send_file').click(function () {-->
<!--            var sndfl=$('#sndfl').val();-->
<!--            var token=$('#token').val();-->
<!---->
<!--            $.post("download_file.php",{sndfl:sndfl,token:token},-->
<!--                function (data) {-->
<!--                    $('#dwnldfl').html(data);-->
<!--                    $(this).hide();-->
<!--                    alert(sndfl+token);-->
<!---->
<!--                });-->
<!---->
<!--        });-->
<!--    </script>-->


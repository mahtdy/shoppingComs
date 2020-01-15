

<?php
if (isset($_POST['link']))
    $file=$_POST['link'];
echo $file;
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

        //ایمن سازی
//        $file = mysqli_real_escape_string($con, $file);
        $ip = ($_SERVER["SERVER_ADDR"]);

    }
if(1==2){
        //حذف ردیف هایی که تاریخ اعتبار آنها گذشته است
        $sql = "DELETE FROM file_storage WHERE date_time < '$time'";

        //بررسی ip
        $sql =  "SELECT temp_name FROM file_storage WHERE client_ip = '$ip' AND original_name = '$file' LIMIT 1";
        $result = $coms_conect->query($sql);
//$count=sqlite_num_rows($sql);
//echo $count;

        $count1 = mysqli_num_rows($result);
        echo $count1.'wwwww';
        exit;
        //استفاده از لینک موجود
        if($count > 0){
            while($row = mysqli_fetch_array($query)){
                $temp = $row['temp_name'];
//                echo $temp;
                //آپدیت زمان
                $update = mysqli_query($con, "UPDATE file_storage SET date_time = '$date' WHERE client_ip = '$ip' AND original_name = '$file' LIMIT 1");
            }
        }}
        //ایجاد لینک جدید
        else{
            $sql ="INSERT INTO file_storage (
            client_ip, original_name, temp_name, date_time)
            VALUES('$ip', '$file', '$temp', '$date')";
//            print_r($sql);
            $coms_conect->query($sql);
            show_msg('عکس شما با موفقیت اضافه گردید');
        }

        if(mysqli_errno($con)){
            echo 'بروز خطا در ذخیره و ایجاد لینک دانلود:
            <br><div class="ltr">'.mysqli_errno($con).' - '.mysqli_error($con).'</div>';
        }
        else{
            $link = 'http://'.$_SERVER["SERVER_NAME"].'/'.$temp.'/'.$file.'';
            echo 'www';
            print_r($link);
            echo 'لینک دانلود با موفقیت ساخته شد: 
            <br>
            <div class="ltr">
            <a href="'.$link.'">'.$link.'</a>
            </div>';
        }


    $close = mysqli_close($con);

?>
<div class="ltr">
    <form action="download_file.php" method="post">
        <p>download file 1</p>
        <input  type="hidden" name="temp" value="<?=$temp?>">
        <input  type="hidden" name="link" value="<?=$link?>">
        <input  type="hidden" name="file" value="test.rar">
        <input type="submit" name="" value="DOWNLOAD..." id="" placeholder="">
    </form>

</div>


    <div class="ltr">
    <form action="download_file.php" method="post">
        <p>download file 2</p>
        <input  type="hidden" name="temp" value="<?=$temp?>">
        <input  type="hidden" name="link" value="<?=$link?>">
<!--         --><?// include 'injection.php';
//         download_file1('php.gif',100);?>
        <input  type="hidden" name="file" value="php.gif">
        <input type="submit" name="" value="DOWNLOAD..." id="" placeholder="">
    </form>

    </div>
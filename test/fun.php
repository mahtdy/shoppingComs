<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

<?php
include "database.php";
if (isset($_POST["submit"])) {
    if (isset($_POST["n"]) != "")
        echo $_POST["n"];
}


if (isset($_POST["send"])) {
    if ($_POST["fname"] != "" && $_POST["lname"] != "") {

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
//    echo $_POST["fname"].'  '.$_POST["lname"];
        $sql = "INSERT INTO test1 (fname,lname)
VALUES ('$fname','$lname')";
        if ($conn->query($sql) === TRUE) {
//        echo $_POST["fname"].' dd '.$_POST["lname"];
            echo 'با موفقیت ارسال شد';
//        $msg_class='success';
        }
    } else
        echo "مقدار وارد کن";
}

if (isset($_GET["active"])) {
    if ($_GET["key"] != "") {
        $keyword = $_GET["key"];
        $k = "'%" . $keyword . "%'";
//        echo $k;
        $sql = "SELECT * FROM test1 WHERE fname LIKE ($k)";
//        echo $sql.'<br>';
        $result =$conn->query($sql);
         if ($result->num_rows==0)
            echo "'هیچ نتیجه ای نداد'";
//        print_r($result);
//        $kk=mysqli_result['lengths']['num_rows'] ;
//        echo $kk.'<br>'.'<br>'.'<br>'.'<br>';
        // output data of each row
        ?><ul class="dropdown-menu"><?
        while ($row = $result->fetch_assoc()) {
            ?>



            <li><a  class="vav1" id="vav1" title="<?=$row['id']?>"data-target="<?=$row['fname']?>">


                    <?echo $row['fname'] . ',' . $row['lname'];?>
                </a></li> <?
//                echo $row['fname'] . ',' . $row['lname'] . '<br>';
//                print_r($row);
        }?></ul><?


    }
    }



    if (isset($_POST["active"]))
    {
        $id=$_POST["id"];
//        echo $id;
        $sql2="SELECT * FROM `tb_city` WHERE `id-state`=$id";
//        echo $sql2;
        $result2 =$conn->query($sql2);
        echo "<lable>نام شهر : </lable>";
        echo "<select>";
//        if ($result2->rowcount>0){
        while ($row2 = $result2->fetch_assoc()) {
//            $id1=$row2['id'];
//            $state1=$row2['city'];
//            echo $id1.":".$state1;

            echo "<option value=".$row2['id'].">".$row2['city']."</option>";
//                print_r($row);
//            echo $id,$sate;
        }
//        }

            if ($result2->num_rows==0)
            echo "<option>استان را انتخاب کنید</option>";
        echo "</select>";

    }
?>
<? exit;$host="localhost";
$user="root";
$password="";
$dbname="test";
$coms_conect = new mysqli($host, $user, $password, $dbname);
mysqli_set_charset($coms_conect,"utf8");
$coms_conect->query("update news set view=view+1 where id=204");?>
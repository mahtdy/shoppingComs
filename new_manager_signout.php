<?$la=$_GET["la"];
session_start();
setcookie('manager_auto_login','',time() - (86400 * 30),'/', null,false,true);
unset($_SESSION["manager_user_name"]);
session_destroy();
header('Location: new_login.php');?>
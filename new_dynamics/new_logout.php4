<?session_start();
unset($_SESSION["new_okusername"]);
unset($_SESSION["new_username"]);
setcookie('auto_login','',time() - (86400 * 30),'/', null,false,true);
session_destroy();
header("location:/login/".$_SESSION["la"]);?>
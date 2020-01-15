<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?=$view_login_system?></title>
    <script type="text/javascript" src="/yep_theme/default/rtl/assets//js/jquery.min.js"></script>
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-fonts.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css" />
    <script type="text/javascript" src="/yep_theme/default/rtl/assets/js/bootstrap.min.js"></script>

  </head>
  <?@session_start();
include_once("newcoms/function.php");
include_once("newcoms/Database.php");
include_once("languages/{$_SESSION['page_languege']}.php");
$sms_pass=injection_replace($_POST['sms_pass']);
if($_SESSION["manager_user_name_sms"]>''){
  echo "<script>window.location='/newcoms.php?yep=new_Dashboard'</script>";
  exit;
}

if($_SESSION["new_manager_smsvalue"]>""&&$sms_pass>""){
  check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' );
  if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]==$_POST["com1_captcha"]){
    $query="SELECT sms_value from new_managers where user_name='{$_SESSION["manager_user_name"]}'";
    $result = $coms_conect->query($query);
    $row = $result->fetch_assoc();
	 
    if($sms_pass==$_SESSION["new_manager_smsvalue"]&&$sms_pass==$row['sms_value']){
      $query1="update new_managers set sms_active=1 where user_name='{$_SESSION["manager_user_name"]}'"; 
      $coms_conect->query($query1);
      $_SESSION["manager_user_name_sms"]=$_SESSION["manager_user_name"];
	  setcookie($sms_pass, $sms_pass, time() + (86400 * 30), "/"); 
      echo "<script>window.location='/newcoms.php?yep=new_Dashboard'</script>";

    }else
      show_msg_warninig($view_incorrect_password);
  }else if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]!=$_POST["com1_captcha"]){
  echo "<script>alert('$dl_cspcha_er_mesage')</script>";
  }
}else if($_SESSION["new_manager_smsvalue"]==""){
    echo "<script>window.location='new_login.php'</script>";
}  
  //echo $_SESSION["new_managersendsms_count"].'hh';exit;  
   create_session_token(); 
?>
<div class="container" dir="rtl">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
           <div class="account-wall">
        <h3 class="text-center login-title"><img style="width: 45px;" src="https://ssl.gstatic.com/accounts/strongauth/sms_1x.png" alt=""> فعال سازی SMS</h3>
        <div class="infobanner">
          <div id="retry-send-container" class="infobanner-content">
            <p><?=$view_sms_not_receive?></p>
			<center>	
				<button type="button" id="send_again" value="" class="btn btn-link">
				  <?=$view_resend?>
				</button>
				<button type="button" id="send_email_again" value="" class="btn btn-link">
				  <?=$view_send_mail?>
				</button>
			</center>	
          </div>
        </div>
                
        <center>
          <?=$view_7mobile_number?> <?=substr($_SESSION["manager_mobile"],8,12).'****'.substr($_SESSION["manager_mobile"],0,4);?> <?=$view_sms_was?> 
        </center>        
        <center>
          <?=$view_enter_code_7digit?>
        </center>
                <form class="form-signin" id="send_sms" action='' method='post'>
          <input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
                <input type="text" id="sms_pass" name='sms_pass' class="form-control" placeholder="<?=$view_enter_code?>" required autofocus>
         <div class="input-group" style="width: 100%;  direction: rtl;">
		 <input type="text" class="form-control" id="com1_captcha" name="com1_captcha" placeholder="<?=$seramic_security_code?>">
        <span class="input-group-addon" style="background-color: #1656a5;width: 68px;"><img  src="<?crate_capcha_pic($madual_lang)?>" /></span>
        </div>
        <br>
		<center style="display: inline-flex;">
                <button id="btn-success" class="btn btn-lg btn-success btn-block" type="button">
                    <?=$seramic_login?></button>
					
                <button class="btn btn-lg btn-danger btn-block" id="logout" type="button">
                    <?=$view_exit?></button>
					<img id="show_waiting_search" src="waiting.gif" style="    height: 20%;
    width: 30%; display:none ">	
		</center> 
	
                <label class="checkbox pull-left">
                   
                </label>

                </form>
            </div>
            
        </div>
    </div>
</div>
<div id="show_success_msg"  class="alert yepalert yepalert-success " style="position: fixed;display:none">
	<button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
	<strong><?=$view_send_mail_captcha?></strong>
</div>
 
<script>
    $("#btn-success").click(function () {
		if($("#com1_captcha").val()!=''&&$("#sms_pass").val()!=''){
		$("#show_waiting_search").show();
		$("#send_sms").submit();
		}else{
			alert('<?=$view_both_require?>');
		}
		
	});
	
	$("#send_email_again").click(function () {
		$("#show_waiting_search").show();
		$("#show_success_msg").hide();
       $.ajax({
        type:'POST',
        url:'/New_ajax.php',
        data:"action=send_again_sms_manager_email&id=<?=$_SESSION["new_username"]?>",
        success: function(result){
			if(result==1){
				$("#show_waiting_search").hide();
				$("#show_success_msg").show();
			}
			
        }
      });   
    });
	
	
    $("#send_again").click(function () {
		$("#show_waiting_search").show();
      $.ajax({
        type:'POST',
        url:'/New_ajax.php',
        data:"action=send_again_sms_manager&id=<?=$_SESSION["new_username"]?>",
        success: function(result){
			$("#show_waiting_search").hide();
		    if(result==1)
           alert('<?=$view_code_resent?>');
         else if(result==0)
            alert('<?=$view_sent_more_than5?>');
        }
      });    
    });
    $("#logout").click(function () {
      window.location='new_manager_signout.php';
    });
</script>    

<style>
.infobanner {
    background: none repeat scroll 0% 0% #F7EBA9;
    margin-bottom: 20px;
    position: relative;
}
.infobanner-content {
    margin: 0px;
    padding: 15px 25px;
}
.txt-2{
  padding:8px;
}
.form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.profile-img
{
  float: right;
  padding-right: 22px;
  padding-bottom: 10px;
  padding-left: 10px;
}
.form-signin .form-control
{
    position: relative;
    font-size: 12px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}

.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 80px;
    padding: 40px 0px 20px 0px;
    background: whitesmoke;
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.16);
}
.login-title
{
    color: #555;
    font-size: 22px;
    font-weight: 400;
    display: block;
  font-family: "Droid Arabic Naskh";
}

.select-img
{
  border-radius: 50%;
    display: block;
    height: 75px;
    margin: 0 30px 10px;
    width: 75px;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.select-name
{
    display: block;
    margin: 30px 10px 10px;
}

.logo-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

</style>

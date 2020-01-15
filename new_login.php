<!DOCTYPE html>
<html lang="en">
  <head>
   
    <meta charset="utf-8" />
    <title>COMS</title>
    <script type="text/javascript" src="/yep_theme/default/rtl//js/jquery.min.js"></script>
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
  
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-fonts.css" />
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.min.css" />
    <?if($direction==0){?>
      <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace-rtl.min.css" />
    <?}?>
    <link rel="stylesheet" href="/yep_theme/default/rtl/assets/css/ace.onpage-help.css" />
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
    <link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">

  </head>
<?function show_msg_warninig_login($str){?>
  
    <div class="alert yepalert yepalert-danger  fade ">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong></strong> <?=$str?>
    </div>
  
  <script>
   $(".alert").delay(200).addClass("in").fadeOut(400).fadeIn(400);
</script>
<?}?> 
  
  
  <??>
<?include_once("newcoms/function.php");
include_once("newcoms/Database.php");
$query="select title from new_language where status=1";
$result = $coms_conect->query($query);
while($RS1 = $result->fetch_assoc()) {
$lang_arr[]=$RS1['title'];
}

@session_start();$now=time();  unset($_SESSION['answer_qestion']);  unset($_SESSION['change_password']);
$direction=get_result("select align from new_language where title='{$_SESSION['page_languege']}'",$coms_conect) ; 
 
if(isset($_SESSION['manager_user_name'])&&$_SESSION['manager_user_name']>"")
header('Location: /newcoms.php?yep=new_Dashboard');   

if($_POST['manage_lang']>""){
	
  $_SESSION['page_languege']=injection_replace($_POST['manage_lang']);
  $manage_lang=injection_replace($_POST['manage_lang']);
  if(in_array($manage_lang,$lang_arr))
  include_once("languages/$manage_lang.php"); 
}else if($_GET['manage_lang']>""){
	
  $_SESSION['page_languege']=injection_replace($_GET['manage_lang']);
  $manage_lang=injection_replace($_GET['manage_lang']);
 
 
  include("languages/$manage_lang.php");  
 
}else
  include("languages/fa.php");



$custom_ip=$_SERVER['REMOTE_ADDR'];
$password=injection_replace($_POST['password']);
$user_name=injection_replace($_POST['user_name']);
if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]==$_POST["com1_captcha"]){
   check_token( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], '/coms' ); 
  if($user_name>""&&$password>""){
    $query="SELECT pass_count from new_managers where user_name='comsroot'";
    $result = $coms_conect->query($query);
    $row12 = $result->fetch_assoc();
    
    
    $pass_count=$row12['pass_count'];
    
    $query="SELECT * from new_managers where user_name='$user_name'";
    $result = $coms_conect->query($query);
    $row1 = $result->fetch_assoc();
    $user_password=create_password($user_name,$password);
    $temp=$now-($row1['last_try_time']+1000);
    //echo $now.'<br>'.$row1['last_try_time'];
    //echo $temp.'<br>'.$pass_count.'<br>'.$row1['last_try_login'];
    if($pass_count<$row1['last_try_login']&&$temp<0){
      $temp=abs(floor($temp/60));
      show_msg_warninig_login($view_account_time.$temp.$view_blocked_min);

    }  
    else if($row1['password']==$user_password){
        $query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
        $result = $coms_conect->query($query);
        $row = $result->fetch_assoc();
        $url=$row['url'];
        $sms_password=$row['sms_password'];
        $sms_user=$row['sms_user'];
        $senderNumbers=array($row['senderNumbers']);   
         
        if($row1['expire_date']<date('Y-m-d'))
        show_msg_warninig_login($view_account_expired);
        else if($row1['status']==0)
        show_msg_warninig_login($view_account_disabled);
        else{  
          $query="update new_managers set last_try_time=0,last_try_login=0,ip='$custom_ip',last_login=NOW() where user_name='$user_name'";
          $coms_conect->query($query);
          $id=$row1['id'];
          $_SESSION["manager_id"]=$id;
          $_SESSION["can_delete"]=$row1['can_delete'];
          $_SESSION["manager_avatar"]=$row1['avatar'];
          $_SESSION["manager_parent_id"]=$row1['parent_id'];
          $_SESSION["can_edit"]=$row1['can_edit'];
          $_SESSION['manager_mobile']=$row1['mobile'];
          $_SESSION['manager_phone']=$row1['phone'];
          $_SESSION['manager_semat']=$row1['semat'];
          $_SESSION['manager_address']=$row1['address'];
          $_SESSION['manager_group']=$row1['group_id'];
          $_SESSION["manager_email"]=$row1['email'];
          $_SESSION["manager_user_name"]=$row1['user_name'];
          $_SESSION["manager_name"]=$row1['name'];
          $_SESSION["can_add"]=$row1['can_add'];
          $_SESSION["can_draft"]=$row1['can_draft'];
          $_SESSION["manager_group_id"]=$row1['group_id'];
          $manager_group=$row1['group_id'];
          ###########################متغير هاي زبان منو##################
          $new_sysmenu="";
          include "languages/".$_SESSION['page_languege'].".php" ;
          $_SESSION['menu_lang']=$new_sysmenu;
          #########################lang########################
          $query="SELECT lang_id,title from new_manage_lang a ,new_language b  where  a.lang_id=b.id and manager_id='$id' and type='l'";
          $result = $coms_conect->query($query);
          $lang=array();
          $site=array();
          while($row = $result->fetch_assoc()) {
            $lang[]=$row['lang_id'];
            $lang_title[]=$row['title'];
      }
          $_SESSION["manager_lang"]=$lang;
          $_SESSION["manager_title_lang"]=$lang_title;
          ##########################s##########################
          $query="SELECT lang_id,name from new_manage_lang a,new_subsite b  where a.lang_id=b.id and manager_id='$id' and type='s'";
			
		$result = $coms_conect->query($query);
           while($row = $result->fetch_assoc()) {
            $site[]=$row['lang_id'];
            $site_title[]=$row['name'];
          }
          $_SESSION["manager_site"]=$site;
          $_SESSION["manager_title_site"]=$site_title;
          
          #######################page_cat#############################
          $query="SELECT menu_id from new_cat_permission where group_id=$manager_group and permission=1";
          $result = $coms_conect->query($query);
          $menu_id[0]=-1;$menu_str='';$i=1;$str='';
          while($row = $result->fetch_assoc()) {
            $menu_id[]=$row['menu_id'];
            if($i!=1)$str=',';
            $menu_str .=$str.$row['menu_id'];$i++;
          }
          $_SESSION["manager_page_cat"]=$menu_id;
          $_SESSION["manager_page_cat_str"]=$menu_str;
           
        
          #######################  page_catogory  #############################
          $query="SELECT a.id FROM new_modules a,new_modules_cat b,new_menu_permission c where c.permission=1 and c.group_id=$id  and a.unic_id=c.menu_id and a.id=b.type group by a.id";
          
          $result = $coms_conect->query($query);
          while($row = $result->fetch_assoc()) {
            $page_catogory[]=$row['id'];
          }
          $_SESSION["manager_page_catogory"]=$page_catogory;
          //print_r($_SESSION["manager_page_catogory"]);exit;
          ###########################menu_permission#################
          $query="SELECT id from new_menu_permission a ,new_main_menu b where a.menu_id=unic_id and permission=1 and a.group_id=$manager_group";
          //echo $query;exit;
          $result = $coms_conect->query($query);
          while($row = $result->fetch_assoc()) {
            $menu_permission[]=$row['id'];
          }
          $_SESSION["menu_permission"]=$menu_permission;
          ##########################user_parrents##############################
          $_SESSION["manager_user_permisson_id"]='';
          $temp_user=explode("^",(check_parrent_permission($id,$coms_conect,$temp,0)));
          $conter=count($temp_user);
          $conter--;
          $temp_user[$conter]=$id;
          $_SESSION["manager_user_permisson"]=$temp_user;
          $str="";$i=1;$temp='';
              foreach ($_SESSION["manager_user_permisson"] as $val){
                if($i!=1)$str=","; $temp .="$str".$val;$i++;
                //echo $val.$i.'<br>';
              }
          $_SESSION["manager_user_permisson_id"]=$temp; 
			$_SESSION["manager_user_permisson_string"]= implode(",",$_SESSION["manager_user_permisson"]); 		  
          ########################gruop_pareents########################3333
          $group_user=explode("^",(get_group_parrent($_SESSION["manager_group_id"],$coms_conect,$temp,0)));
          $conter=count($group_user);
          $conter--;
          $group_user[$conter]=$_SESSION["manager_group_id"];
          $_SESSION["manager_group_permisson"]=$group_user;
          
          ################################manage folderr##########################
          $manager_folder=(explode("^",(create_manager_folder($_SESSION["manager_user_name"],$_SESSION["manager_parent_id"],$coms_conect,$qaz))));
          $manager_fold=array_reverse($manager_folder);
          array_shift($manager_fold);
          $cont=count($manager_fold);
          $manager_fold[$cont]=$_SESSION["manager_user_name"];
          $i=0;
          foreach ($manager_fold as $key=>$value){
          //echo $value.'<br>';
            if($i==0)
            $str11 .=$value;
            else
            $str11 .='/'.$value ;
            $i++;
          }
          $_SESSION["manager_folder_path"]=$str11;
          $_SESSION['RF']["subfolder"]=$_SESSION["manager_folder_path"];
          //echo '<br>'.$_SESSION["manager_folder_path"];exit;
          if($row1['sms_login']==1){
            $recipientNumbers=array($row1['mobile']);
            $str=rand(100000,10000000);
            $_SESSION["manager_smsvalue"]=$view_code_captcha.$str; 
            $messageBodies=array($str);
            $sendDate=array(time());
            $sms=send_sms($url,$sms_password,$sms_user,$senderNumbers,$recipientNumbers,$messageBodies,$sendDate,$coms_conect,$manager_id);
            if($sms==1){
              $query1="update new_managers set sms_value='$str' where user_name='{$_SESSION["manager_user_name"]}'"; 
              $coms_conect->query($query1);
            }  
            $_SESSION["new_manager_smsvalue"]=$str;
            header("Location: /new_manager_sms_login.php");  
          }else if($row['sms_login']==0){ 
		  setcookie ("manager_auto_login", 'user='.$user_name.'&pass='.md5('yaali'.$password.'maddad'), time() + 86400,'/', null,false,true);
		//	setcookie($username, $password, time() + (86400 * 30), "/"); 
            $_SESSION["manager_user_name_sms"]=  $row1['user_name'];   
      ?>
      <script>
        $(function () {
          var img = $('<img id="dynamic">'); 
          img.attr('src', 'waiting.gif');
          img.appendTo('button[type="submit"]');
        });
        window.location='newcoms.php?yep=new_Dashboard';
      </script>
      <? 
              
            
          }  
        }
      }
    else{
    $str="last_try_time=$now ,";
      echo '<div class="yepalert  yepalert-danger fade alert" style="position: fixed;">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>'.$view_incorrect_username_password.'</strong>  
    </div>';
      $query="update new_managers set $str last_try_login=last_try_login+1 where user_name='$user_name'";
      $coms_conect->query($query);
    }
  }
}else if(isset($_POST["com1_captcha"])&&$_POST["com1_captcha"]!=""&&$_SESSION["code"]!=$_POST["com1_captcha"]){
	echo '<div class="yepalert  yepalert-danger fade alert" style="position: fixed;">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>'.$view_incorrect_captcha.'</strong>  
    </div>';
	//show_msg('کلمه امنیتی اشتباه است');
 
				 
}


create_session_token(); 
 
?>

  <body class="login-layout blur-login <?if($direction==0){?>rtl<?}?>">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
              </div>

              <div class="space-6"></div>

              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main" style="direction: rtl;">
                      <div style="text-align:center;"><img src="new_coms-logo.png">
                      <p style="  color: rgb(159, 165, 156);"><?=$view_login_admin?></p>
                      </div>

                      <div class="space-6"></div>

                    <form class="form-horizontal" id="coms_login_form" name="login" action="" role="form" method="post" enctype="multipart/form-data"
                        data-fv-framework="bootstrap"
                        data-fv-message="This value is not valid"
                        data-fv-icon-validating="glyphicon glyphicon-refresh">
            <input name='user_token' value='<?=$_SESSION[ 'session_token' ]?>' type="hidden">
                        <fieldset>
                          <div class="form-group">
                            <div class="col-md-12">
                            <span class="block input-icon input-icon-right">
                              <input id="user_name" name="user_name" type="text" class="form-control" placeholder="<?=$seramic_username?>" style="direction:ltr"/>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-md-12">
                            <span class="block input-icon input-icon-right">
                              <input id="password" name="password" type="password" class="form-control" placeholder="<?=$seramic_password?>" style="direction:ltr"/>
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                            </div>
                          </div>

                          <div class="form-group">
                          
                            <div class="col-md-12">
                              <select id='manage_lang' name="manage_lang" class="form-control" style="direction: rtl;">
                            <?
                                $query="select title,name from new_language where status=1";
            
                                $result = $coms_conect->query($query);
                                  while($RS1 = $result->fetch_assoc()) {
                                  
                                $title=$RS1['title'];
                                $name=$RS1['name'];$str="";
                                if($_GET['manage_lang']==$title)
                                  $str='selected';
                                  echo "<option value='$title' $str>$name</option>";  
                                }
                            ?>
                              </select>
                            </div>
                          </div>
                          
                          <div class="form-group"> 
							<div class="col-md-12" style="direction: rtl;">
                            <div class="input-group" style="width: 94%;">
                              <input type="text" class="form-control"  name="com1_captcha" placeholder="<?=$seramic_security_code?>*" style="border-radius: 0px;margin-left: -1px;"/>
                            <span class="input-group-addon"  ><?if($manage_lang=='')$manage_lang='fa';?>
              <img src="<?crate_capcha_pic($manage_lang)?>"  style="padding-top: 1px;"/>
              </span>
                            </div>
                          </div> 
              </div>
                          
                          <div class="space"></div>
                          <div class="clearfix">
                            <!--label class="inline">
                              <input type="checkbox" class="ace" />
                              <span class="lbl"> مرا بخاطر بسپار</span>
                            </label-->

                            <button type="" id="coms_login" class="width-35 pull-right btn btn-sm btn-success">
							  <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110"><?=$seramic_login?></span>
							  <img id="login_pic" src="/waiting.gif" style="display:none;width: 100px;position: fixed;right: 55px;bottom: 70px;">
                            </button>
							
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                    </form>

<script>  
$(document).ready(function() {
	
//$('#myFrm').validate();
	$('#coms_login').click(function() {
	
	$('#coms_login_form').formValidation({
		framework: 'bootstrap',
		button: {
			selector: '#coms_login',
			disabled: 'disabled'
		},
		fields: {
			user_name: {
				validators: {
					notEmpty: {
						message: '<?=$seramic_is_required?>'
					},
                    stringLength: {
						message: '<?=$view_username_character?>',
                        min: 6,
                        max: 30
                    },
                    regexp: {
						message: '<?=$view_username_point_num_letter?>',
                        regexp: /^[a-zA-Z0-9]+$/
                    }
				}             
			},
			password: {
				validators: {
					notEmpty: {
						message: '<?=$seramic_is_required?>'
					}
				}
			},
			com1_captcha: {
				validators: {
					notEmpty: {
						message: '<?=$seramic_is_required?>'
					},
					numeric: {
						message: '<?=$seramic_is_number?>'
					},
                    stringLength: {
						message: '<?=$view_field4?>',
                        min: 4,
                        max: 4
                    }
				}
			},
		}
	}).on('success.form.fv', function(e) {

            e.preventDefault();

            var $form = $(e.target);

            var fv = $form.data('formValidation');

			$('#login_pic').show();
			
            fv.defaultSubmit();
        });
	});
});
</script>                      

                      <div class="space-6"></div>

                      
                    </div><!-- /.widget-main -->

                    <div class="toolbar clearfix" style="direction:rtl">
                      <div>
                        <a href="#" data-target="#forgot-box" class="forgot-password-link">
                          <i class="ace-icon fa fa-arrow-right"></i>
                          <?=$view_reset_password?>
                        </a>
                      </div>
<div style="margin-top: 3px;float: left;padding-left: 16px;color: rgb(178, 179, 178);">
                        <span><?=$view_version_shaparak?></span>
                      </div>
        
                    </div>
                  </div><!-- /.widget-body -->
                </div><!-- /.login-box -->
                
                <div id="forgot-box" class="forgot-box widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main" style="direction:rtl">
                      <h4 class="header red lighter bigger">
                        <i class="ace-icon fa fa-key"></i>
                        <?=$view_reset_pass_coms?>
                      </h4>
                      <div class="btn-group btn-group-justified" data-toggle="btnsman" style="padding-right: 13px;  display: -webkit-inline-box;">
                        <a class="btn btn-default active" style="width: 50%;" href="#first" data-toggle="tab"><?=$view_email?></a>
                        <a class="btn btn-default" style="width: 49%;" href="#second" data-toggle="tab"><?=$view_sms?></a>
                      </div>

                      <!-- Tab panes -->
                      
                      
                      <div class="tab-content" style="min-height: 0px;padding: 30px;">
                        <div class="tab-pane active" id="first">
                          
                          <p>
                            <?=$view_recovery_email_enter?>
                          </p>

                         
            
                            <fieldset>
                              <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                  <input type="email" id='email' class="form-control" placeholder="<?=$view_email?>" style="direction: ltr;"/>
                                  <i class="ace-icon fa fa-envelope"></i>
                                </span>
                              </label>

                              <div class="clearfix">
                                <button type="button" id="send_email" class="width-35 pull-right btn btn-sm btn-danger">
                                  <i class="ace-icon fa fa-lightbulb-o"></i>
                                  <span class="bigger-110"><?=$view_send?></span>
                                </button>
                              </div>
								<img id='wait_email' src='waiting.gif' style='display:none'>
                         
                            </fieldset>  
                          
                        
                        </div>
                        
                        <div class="tab-pane" id="second">
                          <div class="space-6"></div>
                          <p>
                            <?=$view_enter_mobile?>
                          </p>
                          <form class="form-horizontal" id="manage_blok" name="manage_blok" action="" role="form" method="post" enctype="multipart/form-data">
            
                            <fieldset>
                              <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                  <input type="text" name='sms_number' id='sms_number' class="form-control" placeholder="<?=$view_enter_mobile?>" 
								  style="direction: ltr;"/>
                                  <i class="ace-icon fa fa-envelope"></i>
                                </span>
                              </label>

                              <div class="clearfix">
                                <button type="button" id='send_sms' class="width-35 pull-right btn btn-sm btn-danger">
                                  <i class="ace-icon fa fa-lightbulb-o"></i>
                                  <span class="bigger-110"><?=$view_send?></span>
                                </button>
                              </div>
                              <img id='wait' src='waiting.gif' style='display:none'>
                              <div id='show_sms'></div>
                            </fieldset>
                          </form>
                        </div>
                      </div>
						<div id="qestion_div" style="display:none">
							<label><?=$view_security_question?> :</label><div id="show_qestuin"></div><br> 
							<label id="qestion_div"></label><br> 
							<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
								<input class="form-control" id="manager_ansewer" type=" " placeholder=""></input>
							</div><br>
							<div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right">
								<button id="send_memeber_ansewer" class="btn btn-primary fullwidth"><?=$view_send?></button>
							</div><br><br><br>
						</div>
					 


          
                      
                    </div><!-- /.widget-main -->

                    <div class="toolbar center" style="direction:rtl">
                      <a href="#" data-target="#login-box" class="back-to-login-link">
                        <?=$view_back?>
                        <i class="ace-icon fa fa-arrow-left"></i>
                      </a>
                    </div>
                  </div><!-- /.widget-body -->
                </div><!-- /.forgot-box -->

                
              </div><!-- /.position-relative -->
            <!--
              <div class="navbar-fixed-top align-right">
                <br />
                &nbsp;
                <a id="btn-login-dark" href="#">تيره</a>
                &nbsp;
                <span class="blue">/</span>
                &nbsp;
                <a id="btn-login-blur" href="#">آبي</a>
                &nbsp;
                <span class="blue">/</span>
                &nbsp;
                <a id="btn-login-light" href="#">سفيد</a>
                &nbsp; &nbsp; &nbsp;
              </div-->
              
            </div>
			
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->
	 <div id='show_email'></div>
	 <div id='show_email1'></div>
    <style>
		.rtl .input-group-addon:last-child{
			background-color: transparent;
			border: 1px solid #CCC;
			padding: 0px;
		}
	</style>

    <!-- basic scripts -->
    <center style="color:black; font-family:tahoma;">Copyright (C) 1997-2015 by<a href="http://coms.ir/" style="color:black;font-family:tahoma;  text-decoration: none;"> Aria Resane Mobtaker </a>. All Rights Reserved </center>
    <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='/assets/js/jquery.min.js'>"+"<"+"/script>");
    </script>

    <!-- <![endif]-->

    <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
       $(document).on('click', '.toolbar a[data-target]', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $('.widget-box.visible').removeClass('visible');//hide others
        $(target).addClass('visible');//show target
       });
      });
      
      
      
      //you don't need this, just used for changing background
      jQuery(function($) {
       $('#btn-login-dark').on('click', function(e) {
        $('body').attr('class', 'login-layout');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
       });
       $('#btn-login-light').on('click', function(e) {
        $('body').attr('class', 'login-layout light-login');
        $('#id-text2').attr('class', 'grey');
        $('#id-company-text').attr('class', 'blue');
        
        e.preventDefault();
       });
       $('#btn-login-blur').on('click', function(e) {
        $('body').attr('class', 'login-layout blur-login');
        $('#id-text2').attr('class', 'white');
        $('#id-company-text').attr('class', 'light-blue');
        
        e.preventDefault();
       });
       
      });
      
      
  $('#manage_lang').change( function() {
  var a ='<?=$url?>';
    if (a.indexOf("new_login.php?manage_lang=") >= 0){
      var b=a.split('&manage_lang=');
      var c=b[1].split('&');
      var e="";
      if(c[1]>"")
      e="&"+c[1];
      a=b[0]+"new_login.php?manage_lang="+$(this).val()+e;
    }
    else
    a +='new_login.php?manage_lang='+$(this).val();
    a='new_login.php?manage_lang='+$(this).val();
 
    window.location.href = a;
    });        
    
    
    
      $('[data-toggle="btnsman"] .btn').on('click', function(){
        var $this = $(this);
        $this.parent().find('.active').removeClass('active');
        $this.addClass('active');
        
        if ($(this).attr('href') == "#first") {          
          $("#first").addClass("active");
          $("#second").removeClass("active");
        } else {
          
          $("#first").removeClass("active");
          $("#second").addClass("active");
        }        
        
      });
    </script>
<script>
   $(".alert").delay(200).addClass("in").fadeOut(400).fadeIn(400);
 
$("#send_email").click(function () {
	$("#show_email").html('');  
	if($('#email').val()){
		$("#wait_email").show();
		$("#qestion_div").hide();
		$.ajax({
			type:'POST',
			url:'New_members_ajax.php',
			data:"action=send_maanger_email&id="+$('#email').val(), 
			success: function(result){
				$("#wait_email").hide();
				var temp=result.split('~');
				if(temp[0]>""){
					$("#qestion_div").show();
					$("#show_qestuin").html(temp[0]);  
				}
				
				$("#show_email").html(temp[1]);  
			}
		});
	}        
});
			  
$(document).on('click', '#send_memeber_ansewer', function(event) {
	$("#show_email1").html('');  
	$("#wait_email").show();
	$.ajax({
		type:'POST',
		url:'New_members_ajax.php',
		data:"action=send_maanger_email&id="+$('#email').val()+"&value="+$('#manager_ansewer').val(),
		success: function(result){
			var temp=result.split('~');
			$("#wait_email").hide();     
			if(temp[0]>""){
					$("#qestion_div").show();
					$("#show_qestuin").html(temp[0]);  
			}
			$("#show_email").html(temp[1]);  
		} 
	});
});	  
			  
			  
$("#send_sms").click(function () {
	$("#show_email").html('');  
	if($('#sms_number').val()){
		$("#wait").show();
		$.ajax({
			type:'POST',
			url:'New_members_ajax.php',
			data:"action=send_maanger_sms&id="+$('#sms_number').val(),
			success: function(result){
				$("#wait").hide();
				var temp=result.split('~');
				if(temp[0]>""){
					$("#show_sms").html(temp[0]);  
				}
				$("#show_email").html(temp[1]);  
			}
		});
	}        
});
$(document).on('click', '#send_code', function(event) {
	$("#show_email").html('');  
	$("#show_sms_result").hide();
	$.ajax({
		type:'POST',
		url:'New_members_ajax.php',
		data:"action=send_maanger_code&id="+$('#sms_number').val()+"&value="+$('#code_number').val(),
		success: function(result){
			if(result==1){
			  window.location='new_answer_question.php';
			  
			}else
				$("#show_email").html(result); 
			
		}
	});    
})
          </script>	
  </body>
</html>

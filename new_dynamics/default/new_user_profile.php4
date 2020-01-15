<?if($_SESSION["new_okusername"]=="")
	echo "<script>window.location='/logout'</script>";
view_module(0,$coms_conect);
?>
<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/profile_theme.css">
<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/datatables/datatables.css">
<link rel="stylesheet"
   href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet"
   href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/datatables-responsive/dataTables.yepco.css">

<link href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/bootstrap-switch/bootstrap-switch.css"
   rel="stylesheet">
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/bootstrap-switch/bootstrap-switch.js"></script>

<script
   src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/datatables-responsive/jquery.dataTables.min.js">
</script>
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/datatables/datatables.js"></script>
<script
   src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/datatables-responsive/dataTables.responsive.js">
</script>
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/datatables-responsive/dataTables.yepco.js">
</script>

<link rel="stylesheet"
   href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/bootstrap-datepicker.min.css" />
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/bootstrap-datepicker.min.js"></script>
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/bootstrap-datepicker.fa.min.js"></script>

<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/bootstrap-tagsinput.css" />
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/bootstrap-tagsinput.js"></script>

<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/tinymce/tinymce.min.js"></script>




<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>

<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/bootstrap-datepicker.min.css" />
<script src="/yep_theme/default/rtl/js/bootstrap-datepicker.fa.min.js"></script>

<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">
<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>

<div class="modal fade" id="show_pm" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading"><?=$view_text_view?></h4>
         </div>
         <div class="modal-body">
            <div id="show_pm_div" class="alert "> </div>
         </div>
         <div class="modal-footer ">
            <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                  class="glyphicon glyphicon-remove"></span>&nbsp;بستن</button>
         </div>
      </div>
   </div>
</div>


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading"><?=$view_delete?></h4>
         </div>
         <div class="modal-body">
            <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>
               <?=$view_delete?></div>
         </div>
         <div class="modal-footer ">
            <button type="button" id="del_pm" data-dismiss="modal" class="btn btn-warning"><span
                  class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$view_yes?></button>
            <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                  class="glyphicon glyphicon-remove"></span>&nbsp;<?=$view_no?></button>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="delete_favorite" tabindex="-2" role="dialog" aria-labelledby="delete_favorite"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading"><?=$view_delete?></h4>
         </div>
         <div class="modal-body">
            <div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span>
               <?=$view_delete?></div>
         </div>
         <div class="modal-footer ">
            <button type="button" id="del_favorite" data-dismiss="modal" class="btn btn-warning"><span
                  class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$view_yes?></button>
            <button type="button" data-dismiss="modal" class="btn btn-warning"><span
                  class="glyphicon glyphicon-remove"></span>&nbsp;<?=$view_no?></button>
         </div>
      </div>
   </div>
</div>

<?$la=get_result("select title from new_language where id=$la",$coms_conect);
 
///echo $_SESSION["new_okusername"];exit;
$custom_ip=$_SERVER['REMOTE_ADDR'];
		$avatar_name= $_FILES["avatar"]["name"];
		if($avatar_name>""){
			$avatar_type= $_FILES["avatar"]["type"];
			$avatar_tmp= $_FILES["avatar"]["tmp_name"];
			$avatar_path="new_avatar/$avatar_name";
			upload_file($avatar_name,$avatar_type,$avatar_tmp,$avatar_path);
			$condition="user_name='{$_SESSION["new_okusername"]}'";
			$arr_pic=array("avatar"=>$avatar_name);
			update_data_base($arr_pic,'new_members',$condition,$coms_conect);
			
		}
$sms_login=injection_replace($_POST['sms_login']);
$name=injection_replace($_POST['name']);
$question=injection_replace($_POST['question']);
$answer=injection_replace($_POST['answer']);
$family=injection_replace($_POST['family']);
$password=injection_replace($_POST['password']);
$new_password=injection_replace($_POST['new_password']);$pass='';

$pass="'name'=>$new_password,";
$mobile=injection_replace($_POST['mobile']);
$type=injection_replace($_POST['type']);
$email=injection_replace($_POST['email']);
$favorites=injection_replace($_POST['favorites']);
$job=injection_replace($_POST['job']);
$about_me=injection_replace($_POST['about_me']);
$website=injection_replace($_POST['website']);
$ok=1;
if($name>""){
	if(check_password($_SESSION["new_userpassword"],$password,$_SESSION["new_username"])==0&&$new_password>""&&$password>''){
		echo "<script>alert('<?=$view_incorrect_password?>')</script>";
$ok=0;
}else
if(check_password($_SESSION["new_userpassword"],$password,$_SESSION["new_username"])==1&&$new_password>""&&$password>''){
$_SESSION["new_userpassword"]=create_password($_SESSION["new_username"],$new_password);
}
if($ok==1){
$condition="user_name='{$_SESSION["new_okusername"]}'";
$arr_imag=array("question"=>$question,"answer"=>$answer,"sms_login"=>$sms_login,"name"=>$name,"family"=>$family,"password"=>$_SESSION["new_userpassword"],"mobile"=>$mobile,"email"=>$email,"favorites"=>$favorites,"job"=>$job,"about_me"=>$about_me,"website"=>$website);
update_data_base($arr_imag,'new_members',$condition,$coms_conect);


}
}

if($_SESSION["new_okusername"]>""){
$query="SELECT * FROM new_members where user_name='{$_SESSION["new_okusername"]}'";

$result = $coms_conect->query($query);
$row = $result->fetch_assoc();

$id=$row['id'];
$family=$row['family'];
$name=$row['name'];
$password=$row['password'];
$mobile=$row['mobile'];
$type=$row['type'];
$email=$row['email'];
$favorites=$row['favorites'];
$job=$row['job'];
$about_me=$row['about_me'];
$website=$row['website'];
$avatar=$row['avatar'];
$sms_login=$row['sms_login'];
$question=$row['question'];
$answer=$row['answer'];
}
?>
</br>
<!-- CONTENT -->
<section>
   <div class="container">
      <main>
         <div class="row profile">
            <div class="clearfix tab-header"><?=$row['id'].'rererwe';?>

               <!-- tabs nav -->
               <ul class="nav nav-tabs pull-left">
                  <!--							<li data-filename="profile" class="--><?php //if($url_temp[3]!="ads"&&!isset($_POST['deposit_price'])&&!isset($_POST['credit_price'])&&!isset($_POST['ticket_subject'])&&!isset($madual_main_file)) echo 'active'?>
                  <!--"><!-- TAB 1 -->
                  <!--								<a href="#profile_li" data-toggle="tab"><i class="fa fa-eye text-muted"></i> -->
                  <?//=$view_profile?>
                  <!--</a>-->
                  <!--							</li>-->
                  <li data-filename="acount" class="<?php if ($url_temp[3]!="ads"&&!isset($_POST['deposit_price'])&&!isset($_POST['credit_price'])&&!isset($_POST['ticket_subject'])&&!isset($madual_main_file)) {
    echo 'active';
}?>">
                     <!-- TAB 1 -->
                     <a href="#profile_li" data-toggle="tab"><i class="fa fa-eye text-muted"></i>
                        <?=$view_profile?></a>
                  </li>
                  <!--							<li data-filename="acount" class=""><!-- TAB 2 -->
                  <!--								<a href="#acount_li" data-toggle="tab"><i class="fa fa-cogs text-muted"></i> -->
                  <?//=$view_account?>
                  <!--</a>-->
                  <!--							</li>-->
                  <!--							<li data-filename="ads" class="-->
                  <?//if($url_temp[3]=="ads")echo 'active';?>
                  <!--"><!-- TAB 2 -->
                  <!--								<a href="#ads_li" data-toggle="tab"><i class="fa fa-cogs text-muted"></i> -->
                  <?//=$view_ads?>
                  <!--</a>-->
                  <!--							</li>-->
                  <li data-filename="financial" class="<?php if (isset($_POST['credit_price'])||isset($_POST['deposit_price'])) {
    echo 'active';
}?>">
                     <!-- TAB 2 -->
                     <a href="#financial_li" data-toggle="tab"><i class="fa fa-cogs text-muted"></i>
                        <?=$view_accounting?></a>
                  </li>
                  <li data-filename="request" class="<?php if (isset($_POST['ticket_subject'])||isset($madual_main_file)) {
    echo 'active';
}?>">
                     <!-- TAB 2 -->
                     <a href="#request_li" data-toggle="tab"><i class="fa fa-cogs text-muted"></i>
                        <?=$view_request?></a>
                  </li>
               </ul>
               <!-- /tabs nav -->

            </div>

            <div class="clearfix tab-body profile-tabs">

               <!-- tabs content -->
               <div class="tab-content transparent">
                  <div id="profile_li" class="tab-pane <?php if ($url_temp[3]!="ads"&&!isset($_POST['deposit_price'])&&!isset($_POST['credit_price'])&&!isset($madual_main_file)) {
    echo 'active';
}?>">
                     <div class="row  ">
                        <div class="col-lg-3 col-md-4">
                           <figure class="default-gradient bg-silver text-center margin-bottom8">
                           </figure>
                           <ul class="side-nav list-group margin-bottom30" style="direction:rtl;">
                              <!--											<li class="list-group-item -->
                              <?//if($url_temp[1]=='profile'&&count($url_temp)==3)echo 'active';?>
                              <!--"><a href="#a" data-toggle="tab"><i class="fa fa-home"></i> -->
                              <?//=$view_profile?>
                              <!--</a></li>-->
                              <li class="list-group-item <?php echo 'active';?>">
                                 <a href="#a" data-toggle="tab"><i class="fa fa-home"></i>
                                    <?=$view_account?></a>
                              </li>

                              <li class="list-group-item " style="padding: 0;    background: transparent;
											border: rgba(0,0,0,0.1) 1px solid;
											border-left: 0;
											border-right: 0;">
                                 <div class="m_noty">
                                    25
                                 </div>

                                 <a href="#p"
                                    style="color: #fff !important;    background-color: rgba(0,0,0,0.5);    padding: 7px 10px;display: block;text-decoration: none;"
                                    data-toggle="tab"><i class="fa fa-comments"></i>
                                    <?=$view_inbox?>
                              <li class="list-group-item">
                                 <a href="#h" data-toggle="tab"><i class="fa fa-edit"></i>
                                    <?=$view_favorite_me?></a>
                              </li>
                              <li class="list-group-item">
                                 <a href="#z" data-toggle="tab"><i class="fa fa-users"></i>
                                    <?=$view_friends?></a>
                              </li>
                           </ul>
                        </div>
                        <div class="col-lg-9 col-md-8" style="direction:rtl;">
                           <div class="tabbable">
                              <div class="tab-content transparent">
                                 <div
                                    class="tab-pane <?if($url_temp[1]=='profile'&&count($url_temp)==3)echo 'active';?>"
                                    id="a">
                                    <div id="acount_li" class="tab-pane active" style="  direction: rtl;">
                                       <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                             <div class="clearfix tab-header">
                                                <!--                                                                <ul class="side-nav list-group margin-bottom30">-->
                                                <ul class="nav-tabs pull-left list-group ">
                                                   <li class="list-group-item active">
                                                      <a href="#tab-s1" data-toggle="tab"><i class="fa fa-cog"></i>
                                                         <?=$view_personal_information?></a>
                                                   </li>
                                                   <li class="list-group-item">
                                                      <a href="#tab-s2" data-toggle="tab"><i class="fa fa-eye"></i>
                                                         <?=$view_change_avatar?></a>
                                                   </li>
                                                   <li class="list-group-item">
                                                      <a href="#tab-s5" data-toggle="tab"><i class="fa fa-eye"></i>
                                                         شبکه
                                                         های
                                                         اجتماعی</a>
                                                   </li>
                                                   <li class="list-group-item">
                                                      <a href="#tab-s3" data-toggle="tab"><i class="fa fa-lock"></i>
                                                         <?=$view_change_password?></a>
                                                   </li>
                                                   <li class="list-group-item">
                                                      <a href="#tab-s4" data-toggle="tab"><i class="fa fa-cogs"></i>
                                                         <?=$view_personal_setting?></a>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="col-lg-12 col-md-12" style="direction:rtl;">
                                             <div class="tab-content transparent">
                                                <div id="tab-s1" class="tab-pane active">
                                                   <form role="form" action="#" method="post"
                                                      enctype="multipart/form-data">
                                                      <div class="form-group">
                                                         <label class="control-label"><?=$view_username?></label>
                                                         <input type="text" value="<?=$username?>" name="user_acc" id="user_acc"
                                                            class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <input type="hidden" name="userid" id="userid"
                                                            value="<?=$id?>">
                                                         <label class="control-label"><?=$view_name?></label>
                                                         <input type="text" value="<?=$name?>" name='name' id="username"
                                                            class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label class="control-label"><?=$view_family?></label>
                                                         <input type="text" value="<?=$family?>" name="family" id="userfamily"
                                                            class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label class="control-label" disable><?=$view_mobile?></label>
                                                         <input type="text" value="<?=$mobile?>" name="mobile" disabled
                                                            class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label class="control-label"><?=$view_email?></label>
                                                         <input type="text" value="<?=$email?>" name="email" id="usermail"
                                                            class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label class="control-label">کدملی</label>
                                                         <input type="text" value="" name="codemeli" id="usercode"
                                                            class="form-control">
                                                      </div>
                                                    
                                                      <!-- <div class="form-group">
                                                         <label class="control-label"><?=$view_about_me?></label>
                                                         <textarea class="form-control" name="about_me"
                                                            rows="3"><?=$about_me?></textarea>
                                                      </div> -->
                                                      <!-- <div class="form-group">
                                                         <label class="control-label"><?=$view_website_address?></label>
                                                         <input type="text" value="<?=$website?>" name="website"
                                                            class="form-control">
                                                      </div> -->
                                                </div>
                                                <div id="tab-s5" class="tab-pane">
                                                   <div class="form-group">
                                                      <div class="row">
                                                         <!-- <div class="col-lg-3 col-md-3 col-sm-12"> -->
                                                         <?php include "new_dynamics/default/profile/social_networks.php4";?>
                                                         <!-- </div> -->
                                                      </div>
                                                   </div>
                                                </div>

                                                <div id="tab-s2" class="tab-pane">
                                                   <div class="form-group">
                                                      <div class="row">
                                                         <div class="col-lg-3 col-md-3 col-sm-12">
                                                            <div class="default-gradient thumbnail">
                                                               <img class="img-responsive" id="user_avatar"
                                                                  src="/new_avatar/<?=get_user_avatar($avatar)?>"
                                                                  alt="" />
                                                            </div>
                                                         </div>
                                                         <div class="col-lg-7 col-md-7 col-sm-12">
                                                            <div class="sky-form nomargin">
                                                               <label class="label"><?=$view_select_file?></label>
                                                               <label for="file" class="input input-file">
                                                                  <div class="button">
                                                                     <input type="file" name='avatar' id="file"
                                                                        onchange="this.parentNode.nextSibling.value = this.value">
                                                                  </div>
                                                                  <!--input type="text" readonly-->
                                                               </label>
                                                            </div>

                                                            <a href="#" id="del_avatar"
                                                               class="btn btn-danger btn-xs "><i
                                                                  class="fa fa-times"></i>
                                                               <?=$view_delete_avatar?></a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div id="tab-s3" class="tab-pane">
                                                   <div class="form-group">
                                                      <label class="control-label"><?=$view_current_password?></label>
                                                      <input type="password" name="password" class="form-control">
                                                   </div>
                                                   <div class="form-group">
                                                      <label class="control-label"><?=$view_new_password?></label>
                                                      <input type="password" name="new_password" class="form-control">
                                                   </div>
                                                   <div class="form-group">
                                                      <label
                                                         class="control-label"><?=$view_repeat_new_password?></label>
                                                      <input type="password" name="confirm_password"
                                                         class="form-control">
                                                   </div>
                                                </div>
                                                <div id="tab-s4" class="tab-pane">
                                                   <div class="sky-form">
                                                      <table class="table table-bordered table-striped">
                                                         <tbody>
                                                            <tr>
                                                               <td><?=$view_active_login2?>
                                                               </td>
                                                               <td>
                                                                  <div class="inline-group">
                                                                     <label class="radio">
                                                                        <input type="radio" value='1' name="sms_login"
                                                                           <?if($sms_login==1) echo 'checked' ?>><i></i>
                                                                        <?=$view_yes?>
                                                                     </label>

                                                                     <label class="radio">
                                                                        <input type="radio" value='0' name="sms_login"
                                                                           <?if($sms_login==0) echo 'checked' ?>
                                                                        ><i></i>
                                                                        <?=$view_no?>
                                                                     </label>
                                                                  </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td>یکی از راهکارهای
                                                                  اساسی
                                                                  برای
                                                                  مدیریت
                                                                  صحیح
                                                                  منابع
                                                                  سازمان
                                                                  و
                                                                  حجم
                                                                  اطلاعات
                                                                  زیاد،
                                                                  مجازی
                                                                  سازی
                                                                  است
                                                               </td>
                                                               <td>
                                                                  <label class="checkbox nomargin">
                                                                     <input type="checkbox" name="checkbox"
                                                                        checked=""><i></i>
                                                                     <?=$view_yes?>
                                                                  </label>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td>یکی از راهکارهای
                                                                  اساسی
                                                                  برای
                                                                  مدیریت
                                                                  صحیح
                                                                  منابع
                                                                  سازمان
                                                                  و
                                                                  حجم
                                                                  اطلاعات
                                                                  زیاد،
                                                                  مجازی
                                                                  سازی
                                                                  است
                                                               </td>
                                                               <td>
                                                                  <label class="checkbox nomargin">
                                                                     <input type="checkbox" name="checkbox"
                                                                        checked=""><i></i>
                                                                     <?=$view_yes?>
                                                                  </label>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td>یکی از راهکارهای
                                                                  اساسی
                                                                  برای
                                                                  مدیریت
                                                                  صحیح
                                                                  منابع
                                                                  سازمان
                                                                  و
                                                                  حجم
                                                                  اطلاعات
                                                                  زیاد،
                                                                  مجازی
                                                                  سازی
                                                                  است
                                                               </td>
                                                               <td>
                                                                  <label class="checkbox nomargin">
                                                                     <input type="checkbox" name="checkbox"
                                                                        checked=""><i></i>
                                                                     <?=$view_yes?>
                                                                  </label>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <div class="form-group">
                                                         <label
                                                            class="control-label"><?=$view_security_question?></label>
                                                         <input type="text" value='<?=$question?>' name="question"
                                                            class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label class="control-label"><?=$view_reply?></label>
                                                         <input type="text" value='<?=$answer?>' name="answer"
                                                            class="form-control">
                                                      </div>

                                                   </div>
                                                </div>
                                                <div class="margiv-top10">
                                                   <button type='submit' value='' id="edit_submit"
                                                      class="btn btn-primary"><?=$view_save_changing?></button>
                                                   <a href="<?="/profile/$madual_lang"?>"
                                                      class="btn btn-default"><?=$view_cancel?>
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       </form>
                                    </div>
                                    <script>
                                    $('#edit_submit').click(function() {
                                       var userid =[$('#userid').val(),$('#user_acc').val(),  $('#username').val(), $('#userfamily').val(),  $('#usermail').val(), $('#usercode').val()];
                                       // alert('id=' + userid);
                                       $.ajax({
                                          type: 'POST',
                                          url: '/New_members_ajax.php',
                                          data: "action=save_change&id=" + userid,
                                          success: function(result) {
                                             // alert(result);

                                            //  window.location =
                                                // '/profile/<?=$madual_lang?>';
                                          }
                                       });
                                    });
                                    </script>
                                    <!--												-->
                                    <?// include "new_dynamics/default/profile/profile.php4" ?>
                                 </div>
                                 <div class="tab-pane " id="z">
                                 </div>
                                 <div
                                    class="tab-pane <?if($url_temp[1]=='profile'&&$url_temp[3]=='pm') echo 'active';?>"
                                    id="p">
                                    <?php include "new_dynamics/default/profile/resive_pm.php4" ?>
                                 </div>

                                 <div class="tab-pane" id="h">
                                    <div class="tt">
                                       <table cellpadding="0" cellspacing="0" border="0"
                                          class="datatable table table-striped table-bordered" width="100%">
                                          <thead>
                                             <tr>

                                                <th><?=$view_row?>
                                                </th>
                                                <th><?=$view_page?>
                                                </th>
                                                <th><?=$new_sysmenu[2]?>
                                                </th>

                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?$query="select * from new_favorite where user_name='{$_SESSION["new_okusername"]}' group by url";
																$result = $coms_conect->query($query);
																	while($RS1 = $result->fetch_assoc()) {?>
                                             <tr>
                                                <td><?=$i?>
                                                </td>
                                                <td><a href='<?=$RS1['url']?>' target='_balnk'><?=$RS1['url']?></a>
                                                </td>
                                                <td>

                                                   <a class="red del_favorite" id="<?=$RS1['id']?>"
                                                      data-title="delete_favorite" data-toggle="modal"
                                                      data-target="#delete_favorite" data-placement="top" rel="tooltip"
                                                      title="<?=$s_Pages_delete?>" style="font-size: 15px !important;">
                                                      <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                   </a>

                                                </td>
                                             </tr>
                                             <?$i++;}?>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div id="ads_li" class="tab-pane <?if($url_temp[3]==" ads")echo 'active' ;?>">
                     <div class="row">
                        <div class="col-lg-3 col-md-4">
                           <figure class="default-gradient bg-silver text-center margin-bottom8">
                           </figure>
                           <ul class="side-nav list-group margin-bottom30" style="direction:rtl;">
                              <li class="list-group-item <?php if (isset($madual_main_file)&&$madual_main_file=='all_ads') {
    echo 'active';
}?>"><a data-status="0" href="#all_ads" class="show_ads_li" data-toggle="tab"><i class="fa fa-home"></i>
                                    <?=$view_all_ads?></a>
                              </li>
                              <li class="list-group-item">
                                 <a data-status="1" href="#ads_now_show" class="show_ads_li" data-toggle="tab"><i
                                       class="fa fa-comments"></i>
                                    <?=$view_now_showing?></a>
                              </li>
                              <li class="list-group-item">
                                 <a data-status="2" href="#ads_approve" class="show_ads_li" data-toggle="tab"><i
                                       class="fa fa-edit"></i>
                                    <?=$view_vertificates?></a>
                              </li>
                              <li class="list-group-item <?if($url_temp[3]==" ads"&&$url_temp[4]=="edit" )echo 'active'
                                 ;?>"><a href="#ads_send" data-toggle="tab"><i
                                       class="fa fa-users"></i><?=$view_send_ads?></a>
                              </li>
                           </ul>
                        </div>
                        <div class="col-lg-9 col-md-8" style="direction:rtl;">
                           <div class="tab-content transparent">
                              <div class="tab-pane <?php if (isset($madual_main_file)&&$madual_main_file=='all_ads') {
    echo 'active';
}?>" id="all_ads">

                              </div>
                              <div class="tab-pane" id="ads_now_show">

                              </div>
                              <div class="tab-pane" id="ads_approve">

                              </div>
                              <div class="tab-pane <?if($url_temp[3]==" ads"&&$url_temp[4]=="edit" )echo 'active' ;?>"
                                 id="ads_send">
                                 <?php include "new_dynamics/default/profile/ads_send.php4" ?>
                              </div>
                              <img src="/waiting.gif" id="show_li_ads_waiting" style="display:none">
                           </div>

                        </div>
                     </div>
                  </div>
                  <div id="financial_li" class="tab-pane <?php if (isset($_POST['credit_price'])||isset($_POST['deposit_price'])) {
    echo 'active';
}?>">
                     <div class="row">
                        <div class="col-lg-3 col-md-4">
                           <figure class="default-gradient bg-silver text-center margin-bottom8">
                           </figure>
                           <ul class="side-nav list-group margin-bottom30" style="direction:rtl;">
                              <li class="list-group-item <?php if (!isset($_POST['deposit_price'])&&!isset($_POST['credit_price'])) {
    echo 'active';
}?>"><a href="#financial_transactions" data-toggle="tab"><i class="fa fa-home"></i> <?=$view_financial_list?></a></li>
                              <li class="list-group-item">
                                 <a href="#financial_payment" data-toggle="tab"><i
                                       class="fa fa-comments"></i><?=$view_list_internet_payments?></a>
                              </li>
                              <li class="list-group-item">
                                 <a href="#financial_online_charge" data-toggle="tab"><i class="fa fa-edit"></i>
                                    <?=$view_online_charging_account?></a>
                              </li>
                              <li class="list-group-item <?php if (isset($_POST['deposit_price']) ||isset($_POST['credit_price'])) {
    echo 'active';
}?>"><a href="#financial_register_receipt" data-toggle="tab"><i class="fa fa-users"></i><?=$view_receipt_register?></a>
                              </li>
                              <li class="list-group-item  ">
                                 <a href="#financial_receipt_list" data-toggle="tab"><i
                                       class="fa fa-users"></i><?=$view_receipt_bank_list?></a>
                              </li>
                           </ul>
                        </div>
                        <div class="col-lg-9 col-md-8" style="direction:rtl;">
                           <div class="tab-content transparent">
                              <div class="tab-pane <?php if (!isset($_POST['deposit_price'])&&!isset($_POST['credit_price'])) {
    echo 'active';
}?>" id="financial_transactions">
                                 <?php include "new_dynamics/default/profile/financial_transactions.php4" ?>
                              </div>
                              <div class="tab-pane" id="financial_payment">
                                 <?php include "new_dynamics/default/profile/financial_payment.php4" ?>
                              </div>
                              <div class="tab-pane" id="financial_online_charge">
                                 <?php include "new_dynamics/default/profile/financial_online_charge.php4" ?>
                              </div>
                              <div class="tab-pane <?php if (isset($_POST['deposit_price']) ||isset($_POST['credit_price'])) {
    echo 'active';
}?>" id="financial_register_receipt">
                                 <?php include "new_dynamics/default/profile/financial_register_receipt.php4" ?>
                              </div>
                              <div class="tab-pane " id="financial_receipt_list">
                                 <?php include "new_dynamics/default/profile/financial_receipt_list.php4" ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="request_li" class="tab-pane <?php if (isset($_POST['ticket_subject'])||isset($madual_main_file)) {
    echo 'active';
}?>">
                     <div class="row">
                        <div class="col-lg-3 col-md-4">
                           <figure class="default-gradient bg-silver text-center margin-bottom8">
                           </figure>
                           <ul class="side-nav list-group margin-bottom30" style="direction:rtl;">
                              <li class="list-group-item <?php if (isset($_POST['ticket_subject'])) {
    echo 'active';
}?>"><a href="#new_request" data-toggle="tab"><i class="fa fa-home"></i> <?=$view_new_request_send?></a></li>
                              <li class="list-group-item <?php if (isset($madual_main_file)&&$madual_main_file=='new_show_ticket') {
    echo 'active';
}?>"><a href="#show_request" data-toggle="tab"><i class="fa fa-comments"></i><?=$view_view_request?></a></li>
                              <li class="list-group-item  <?php if (isset($madual_main_file)&&$madual_main_file=='new_showall_ticket') {
    echo 'active';
}?>"><a data-status="0" class="show_request_li" href="#show_all_request" data-toggle="tab"><i
                                       class="fa fa-comments"></i><?=$view_all_requests?></a>
                              </li>
                              <li class="list-group-item  ">
                                 <a data-status="1" class="show_request_li" href="#open_request" data-toggle="tab"><i
                                       class="fa fa-comments"></i><?=$view_open_requests?></a>
                              </li>
                              <li class="list-group-item  ">
                                 <a data-status="2" class="show_request_li" href="#check_request" data-toggle="tab"><i
                                       class="fa fa-edit"></i><?=$view_pending_requests?></a>
                              </li>
                              <li class="list-group-item ">
                                 <a data-status="3" class="show_request_li" href="#close_request" data-toggle="tab"><i
                                       class="fa fa-users"></i><?=$view_closed_requests?></a>
                              </li>
                           </ul>
                        </div>
                        <div class="col-lg-9 col-md-8" style="direction:rtl;">
                           <div class="tab-content transparent">

                              <div class="tab-pane <?php if (isset($_POST['ticket_subject'])) {
    echo 'active';
}?>" id="new_request">
                                 <?php include "new_dynamics/default/profile/new_request.php4" ?>
                              </div>
                              <div class="tab-pane <?php if (isset($madual_main_file)&&$madual_main_file=='new_show_ticket') {
    echo 'active';
}?>" id="show_request">
                                 <?php include "new_dynamics/default/profile/new_show_ticket.php4" ?>
                              </div>
                              <div class="tab-pane <?php if (isset($madual_main_file)&&$madual_main_file=='new_showall_ticket') {
    echo 'active';
}?>" id="show_all_request">

                              </div>
                              <div class="tab-pane" id="open_request">

                              </div>
                              <div class="tab-pane" id="check_request">

                              </div>
                              <div class="tab-pane" id="close_request">

                              </div>
                              <img src="/waiting.gif" id="show_li_waiting" style="display:none">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </main>
   </div>
</section>
<!-- /CONTENT -->
<style>
.text-danger {
   color: #a94442;
   direction: rtl;
}

h6 {
   font-size: 12px;
   direction: rtl;
}

.profile-buttons {
   background-color: rgba(0, 0, 0, 0.05);
   padding: 15px;
}

.margin-bottom8 {
   margin-bottom: 8px;
}

.buttons-over-image {
   position: absolute;
   left: 23px;
   top: 8px;
}

.bg-silver {
   background-color: #ddd !important;
}

.list-group-item:first-child,
.list-group-item:last-child,
ul.side-nav {
   -webkit-border-radius: 0;
   -moz-border-radius: 0;
   border-radius: 0;
}

.margin-bottom30 {
   margin-bottom: 30px;
}

ul.side-nav a {
   display: block;
   text-decoration: none;
   color: #333;
}

ul.side-nav ul li a {
   padding: 3px;
   font-size: 13px;
}

ul.side-nav a i.fa {
   width: 20px;
}

i.fa {
   text-decoration: none !important;
}

li.comment .comment-body {
   position: relative;
   padding-right: 60px;
}

.fsize11 {
   font-size: 11px !important;
   line-height: 15px !important;
}

li.comment.comment-reply {
   margin-right: 60px;
   background-color: #fafafa;
   padding: 6px;
   margin-bottom: 6px;
}

li.comment {
   position: relative;
   margin-bottom: 25px;
   font-size: 13px;
}

time.datebox {
   font-size: 14px;
   display: block;
   position: relative;
   width: 35px;
   background-color: #fff;
   margin: 3px auto;
   border: 1px solid;
}

li.comment.comment-reply img.avatar {
   right: 6px;
   top: 6px;
}

li.comment img.avatar {
   position: absolute;
   right: 0;
   top: 0;
   display: inline-block;
   width: 50px;
   height: 50px;
   border-radius: 0px;
}

img {
   border: 0;
   vertical-align: top;
}

audio,
canvas,
img,
video {
   vertical-align: middle;
}

li.comment a.comment-author {
   margin-bottom: 6px;
   display: block;
}

li.comment a.comment-author span {
   font-size: 15px;
}

li.comment p {
   margin: 0;
   padding: 0;
}

p {
   line-height: 22px;
   margin: 0 0 20px;
}

p {
   display: block;
   -webkit-margin-before: 1em;
   -webkit-margin-after: 1em;
   -webkit-margin-start: 0px;
   -webkit-margin-end: 0px;
}

li.comment {
   position: relative;
   margin-bottom: 25px;
   font-size: 13px;
}

.comment .avatar {
   float: none;
   width: none;
   -webkit-border-radius: none;
   -moz-border-radius: none;
   border-radius: none;
}


/* bootstrap side navigation */
ul.side-nav span.badge {
   float: right;
   margin-top: 6px;
   font-weight: 400;

   -webkit-border-radius: 3px;
   -moz-border-radius: 3px;
   border-radius: 3px;
}

ul.side-nav>li>span.badge {
   margin-top: 12px;
   margin-right: 6px;
}

ul.side-nav li.list-group-item>a>.label {
   margin-right: 20px;
}

.list-group-item:first-child,
.list-group-item:last-child,
ul.side-nav {
   -webkit-border-radius: 0;
   -moz-border-radius: 0;
   border-radius: 0;
   padding-right: 0px;
}

ul.side-nav li {
   list-style: none;
}

ul.side-nav ul {
   margin: 0;
   padding: 0;
   background-color: rgba(0, 0, 0, 0.02);
}

ul.side-nav ul li {
   padding: 0 15px;
   border-bottom: rgba(0, 0, 0, 0.05) 1px solid;
}

ul.side-nav ul li:last-child {
   border-bottom: 0;
}

ul.side-nav a {
   display: block;
   text-decoration: none;
   color: #333;
}

ul.side-nav a i.fa {
   width: 20px;
}

ul.side-nav ul li a {
   padding: 3px;
   font-size: 13px;
}

ul.side-nav>li {
   padding: 0;
}

ul.side-nav>li>a {
   padding: 7px 10px;
}

ul.side-nav>li.list-group-item.active {
   border: 0;
   /*background-color:transparent;*/
}

ul.side-nav>li.active>a {
   background-color: rgba(0, 0, 0, 0.5);
}

ul.side-nav li.list-toggle.active:after,
ul.side-nav>li.active>a {
   color: #fff !important;
}

ul.side-nav li.list-toggle:after {
   content: "\f105";
   font-family: FontAwesome;
   position: absolute;
   font-size: 15px;
   right: 10px;
   top: 7px;
   color: #999;
}

ul.side-nav li.list-toggle.active:after {
   content: "\f107";
}

.list-group-item {
   border: 0;
   background: transparent;
   border: rgba(0, 0, 0, 0.1) 1px solid;
   border-left: 0;
   border-right: 0;
}

.nav-tabs>li.active>a,
.nav-tabs>li.active>a:hover,
.nav-tabs>li.active>a:focus {
   height: 41px;
}

.nav-tabs {
   border-bottom: 3px solid #EF4A43;
   width: 100%;
   /*margin-bottom: 10px;*/
}

.nav-tabs>li {
   width: initial;
   font-family: yekan;
}

.tab-content {
   min-height: 1000px;
}

.list-group-item.active,
.list-group-item.active:focus,
.list-group-item.active:hover {
   z-index: 2;
   color: #fff;
   background-color: #337ab700 !important;
   border-color: #337ab705 !important;
}
</style>
<script>
$(document).on('click', '.search_ticket', function(event) {
   $(".show_waiting").show();
   $("#show_result").empty();
   $.ajax({
      type: 'POST',
      url: '/New_members_ajax.php',
      data: "action=search_ticket&id=" + $("#request_status")
         .val() + "&value=" + $("#str_search").val(),
      success: function(result) {
         $(".show_waiting").hide();
         $("#show_result").html(result);

      }
   });
});

$(".show_request_li").click(function() {
   $("#show_li_waiting").show();
   var div_name = $(this).attr('href');
   $("#open_request").empty();
   $("#check_request").empty();
   $("#close_request").empty();
   $("#show_all_request").empty();
   $.ajax({
      type: 'POST',
      url: '/New_members_ajax.php',
      data: "action=show_request_li&id=" + $(this).data('status'),
      success: function(result) {
         $("#show_li_waiting").hide();
         $(div_name).html(result);
      }
   });
});

$(".show_ads_li").click(function() {
   $("#show_li_ads_waiting").show();
   var div_name = $(this).attr('href');
   $("#all_ads").empty();
   $("#ads_now_show").empty();
   $("#ads_approve").empty();
   $.ajax({
      type: 'POST',
      url: '/New_members_ajax.php',
      data: "action=show_ads_li&id=" + $(this).data('status'),
      success: function(result) {

         $("#show_li_ads_waiting").hide();
         $(div_name).html(result);
      }
   });
});


$(".show_pm_btn").click(function() {
   $.ajax({
      type: 'POST',
      url: '/New_members_ajax.php',
      data: "action=show_member_pm&id=" + $(this).attr('id'),
      success: function(result) {
         $("#show_pm_div").html(result);
      }
   });
});
$("#del_avatar").click(function() {
   $.ajax({
      type: 'POST',
      url: '/New_members_ajax.php',
      data: "action=del_avatar&id=<?=$_SESSION["
      new_okusername "]?>",
      success: function(result) {
         alert('<?=$view_deleted_avatar?>');
         $("#user_avatar").attr('src',
            "/new_avatar/no_avatar.jpg"
         )
      }
   });
});


$("#del_qaz").click(function() {
   $("#del_pm").val($(this).attr('id'));
});

$("#del_pm").click(function() {
   $.ajax({
      type: 'POST',
      url: '/New_members_ajax.php',
      data: "action=del_pm&id=" + $(this).val(),
      success: function(result) {
         window.location =
            '/profile/<?=$madual_lang?>';
      }
   });
});

$(".del_favorite").click(function() {
   alert($(this).attr('id'));
   $("#del_favorite").val($(this).attr('id'));
});
$("#del_favorite").click(function() {
   $.ajax({
      type: 'POST',
      url: '/New_members_ajax.php',
      data: "action=del_favorite&id=" + $(this).val(),
      success: function(result) {
         alert(result);

         window.location =
            '/profile/<?=$madual_lang?>';
      }
   });
});
</script>
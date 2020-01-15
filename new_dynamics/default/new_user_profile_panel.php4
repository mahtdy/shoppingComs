<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/profile_theme.css">
<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/datatables/datatables.css">
<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/datatables-responsive/dataTables.yepco.css">

<link href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/bootstrap-switch/bootstrap-switch.css" rel="stylesheet">
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/bootstrap-switch/bootstrap-switch.js"></script>

<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/datatables/datatables.js"></script>
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/datatables-responsive/dataTables.yepco.js"></script>

<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/bootstrap-datepicker.min.css" />
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/bootstrap-datepicker.min.js"></script>
<script src="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/js/bootstrap-datepicker.fa.min.js"></script>

<link rel="stylesheet" href="<?=$subdomian_add?>/yep_theme/<?="default/$defult_dir"?>/css/bootstrap-tagsinput.css"/>
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
				<div id="show_pm_div" class="alert ">  </div>
		</div>
		<div class="modal-footer ">
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;بستن</button>
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
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> <?=$view_delete?></div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="del_pm"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$view_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$view_no?></button>
		</div>
	</div>
	</div>
</div>

 <div class="modal fade" id="delete_favorite" tabindex="-2" role="dialog" aria-labelledby="delete_favorite" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title custom_align" id="Heading"><?=$view_delete?></h4>
		</div>
		<div class="modal-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> <?=$view_delete?></div>
		</div>
		<div class="modal-footer ">
			<button type="button" id="del_favorite"   data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$view_yes?></button>
			<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$view_no?></button>
		</div>
	</div>
	</div>
</div>

<?$la=get_result("select title from new_language where id=$la",$coms_conect);
$_SESSION["new_okusername"]='qazqaz';
$_SESSION["new_userid"]=14;
 //if($_SESSION["new_okusername"]=="")
//	echo "<script>window.location='/logout'</script>";

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
	}else if(check_password($_SESSION["new_userpassword"],$password,$_SESSION["new_username"])==1&&$new_password>""&&$password>''){
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
<!-- CONTENT -->
<section>
	<div class="picture-container">
	    <div class="picture">
	        <img src="https://lh3.googleusercontent.com/LfmMVU71g-HKXTCP_QWlDOemmWg4Dn1rJjxeEsZKMNaQprgunDTtEuzmcwUBgupKQVTuP0vczT9bH32ywaF7h68mF-osUSBAeM6MxyhvJhG6HKZMTYjgEv3WkWCfLB7czfODidNQPdja99HMb4qhCY1uFS8X0OQOVGeuhdHy8ln7eyr-6MnkCcy64wl6S_S6ep9j7aJIIopZ9wxk7Iqm-gFjmBtg6KJVkBD0IA6BnS-XlIVpbqL5LYi62elCrbDgiaD6Oe8uluucbYeL1i9kgr4c1b_NBSNe6zFwj7vrju4Zdbax-GPHmiuirf2h86eKdRl7A5h8PXGrCDNIYMID-J7_KuHKqaM-I7W5yI00QDpG9x5q5xOQMgCy1bbu3St1paqt9KHrvNS_SCx-QJgBTOIWW6T0DHVlvV_9YF5UZpN7aV5a79xvN1Gdrc7spvSs82v6gta8AJHCgzNSWQw5QUR8EN_-cTPF6S-vifLa2KtRdRAV7q-CQvhMrbBCaEYY73bQcPZFd9XE7HIbHXwXYA=s200-no" class="picture-src" id="wizardPicturePreview" title="">
	        <div class="pic-picture">
	        	<img src="/new_gallery/files/896.jpg" alt="" width="180" height="130">
	        </div>
	        <div class="text-picture">
	        	<h1>سایت پدال</h1>
	            <span>شما در اینجا می توانید شعار تبلیغاتی خود را استفاده کنید</span> <br>
	            <button class="btn btn-danger">دنبال کردن  1250</button> <small>بازدید همه آگهی ها: 256845</small>
		    </div>
		    <div class="social-picture">
		    	<small>www.pedal.ir</small>
		    	<hr style="margin-top: 2px;margin-bottom: 2px;">

	            <span class="fa-stack" style="font-size: 17px;">
				  <i class="fa fa-circle fa-stack-2x" style="color:#616161;"></i>
				  <i class="fa fa-facebook fa-stack-1x"></i>
				</span>
				<span class="fa-stack" style="font-size: 17px;">
				  <i class="fa fa-circle fa-stack-2x" style="color:#616161;"></i>
				  <i class="fa fa-twitter fa-stack-1x"></i>
				</span>
				<span class="fa-stack" style="font-size: 17px;">
				  <i class="fa fa-circle fa-stack-2x" style="color:#616161;"></i>
				  <i class="fa fa-send fa-stack-1x"></i>
				</span>
		    </div>
	        <input type="file" id="wizard-picture" class="">
	    </div>
	</div>

	<div class="container">

 		<main>
  			<div class="row profile">

				<div class="col-md-9">
					<div class="tabbable-panel">
						<div class="tabbable-line">
							<ul class="nav nav-tabs ">
								<li class="active">
									<a href="#tab_default_1" data-toggle="tab">
									همه آگهی ها </a>
								</li>
								<li>
									<a href="#tab_default_2" data-toggle="tab">
									تخفیف ها </a>
								</li>
								<li>
									<a href="#tab_default_3" data-toggle="tab">
									درباره من </a>
								</li>
								<li>
									<a href="#tab_default_4" data-toggle="tab">
									تماس با من </a>
								</li>
							</ul>
							<div class="tab-content" style="padding-left: 0px !important;">
								<div class="tab-pane active" id="tab_default_1">
									<? include "new_dynamics/default/profile/panel_ads.php4" ?>
								</div>
								<div class="tab-pane" id="tab_default_2">
									تخفیف ها
								</div>
								<div class="tab-pane" id="tab_default_3">
									<? include "new_dynamics/default/profile/panel_about.php4" ?>
								</div>
								<div class="tab-pane" id="tab_default_4">
									<? include "new_dynamics/default/profile/panel_contact.php4" ?>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="tabbable-panel">
						<div class="tabbable-line">
							<ul class="nav nav-tabs ">
								<li class="active">
									<a href="#tab_default_1" data-toggle="tab">
									تبلیغات</a>
								</li>
							</ul>
							<div class="tab-content" style="padding-left: 0px !important;">
								<div class="tab-pane active" id="tab_default_1">
									<img src="/new_gallery/files/896.jpg" class="img-responsive" alt="" width="100%"><br>
									<img src="/new_gallery/files/896.jpg" class="img-responsive" alt="" width="100%">
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
  background-color: rgba(0,0,0,0.05);
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

.list-group-item:first-child, .list-group-item:last-child, ul.side-nav {
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
audio, canvas, img, video {
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
	float:right;
	margin-top:6px;
	font-weight:400;

	-webkit-border-radius: 3px;
	   -moz-border-radius: 3px;
			border-radius: 3px;
}
ul.side-nav>li>span.badge {
	margin-top:12px;
	margin-right:6px;
}
ul.side-nav li.list-group-item>a>.label {
	margin-right:20px;
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
	list-style:none;
}
ul.side-nav ul {
	margin:0;
	padding:0;
	background-color:rgba(0,0,0,0.02);
}
ul.side-nav ul li {
	padding:0 15px;
	border-bottom:rgba(0,0,0,0.05) 1px solid;
}
ul.side-nav ul li:last-child {
	border-bottom:0;
}
ul.side-nav a {
	display:block;
	text-decoration:none;
	color:#333;
}
ul.side-nav a i.fa {
	width:20px;
}
ul.side-nav ul li a {
	padding:3px;
	font-size:13px;
}
ul.side-nav>li {
	padding:0;
}
ul.side-nav>li>a {
	padding:7px 10px;
}
ul.side-nav>li.list-group-item.active {
	border:0;
	background-color:transparent;
}
ul.side-nav>li.active>a {
	background-color:rgba(0,0,0,0.5);
}
ul.side-nav li.list-toggle.active:after,
ul.side-nav > li.active>a {
	color:#fff !important;
}
ul.side-nav li.list-toggle:after {
	content: "\f105";
	font-family: FontAwesome;
	position: absolute;
	font-size: 15px;
	right: 10px;
	top: 7px;
	color:#999;
}
ul.side-nav li.list-toggle.active:after {
	content: "\f107";
}
.list-group-item {
	border:0;
	background:transparent;
	border:rgba(0,0,0,0.1) 1px solid;
	border-left:0;
	border-right:0;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus {
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
.tab-content{
	min-height: 940px;
}


/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
  padding-right: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
  width: initial;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373 !important;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #000 !important;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 2px solid #E53935;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #E53935 !important;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -1px;
  /*background-color: #fff;*/
  border: 0;
  border-top: 2px solid #eee;
  padding: 15px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}


/*upload picture*/
/*Profile Pic Start*/
.picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    /*width: 106px;*/
    height: 400px;
    background-color: #CCCCCC;
    /*border: 4px solid #CCCCCC;*/
    color: #FFFFFF;
    /*border-radius: 50%;*/
    margin: 0px auto;
    /*overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;*/
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    /*cursor: pointer;
    display: block;*/
    height: 100%;
    /*left: 0;*/
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
    height: 391px;
}

.pic-picture{
	z-index: 100;
    position: absolute;
    border: 2px solid;
    right: 100px;
    top: 240px;
}
.text-picture{
	z-index: 100;
    position: absolute;
    text-align: right;
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    right: 300px;
    top: 240px;
}
.social-picture{
	z-index: 100;
    position: absolute;
    text-align: left;
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    left: 100px;
    top: 310px;
}
/*Profile Pic End*/
</style>

<script>
//Profile Pic
$(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
//Profile Pic End


$(document).on('click', '.search_ticket', function(event) {
 	$(".show_waiting").show();
		$("#show_result").empty();
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=search_ticket&id="+$("#request_status").val()+"&value="+$("#str_search").val(),
		success: function(result){
			$(".show_waiting").hide();
			$("#show_result").html(result);

		}
	});
});

$(".show_request_li").click(function () {
	$("#show_li_waiting").show();
	var div_name= $(this).attr('href');
	$("#open_request").empty();
	$("#check_request").empty();
	$("#close_request").empty();
	$("#show_all_request").empty();
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=show_request_li&id="+$(this).data('status'),
		success: function(result){
			$("#show_li_waiting").hide();
	 	  	$(div_name).html(result);
		}
	});
});

$(".show_ads_li").click(function () {
	$("#show_li_ads_waiting").show();
	var div_name= $(this).attr('href');
	$("#all_ads").empty();
	$("#ads_now_show").empty();
	$("#ads_approve").empty();
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=show_ads_li&id="+$(this).data('status'),
		success: function(result){

			$("#show_li_ads_waiting").hide();
	 	  	$(div_name).html(result);
		}
	});
});


$(".show_pm_btn").click(function () {
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=show_member_pm&id="+$(this).attr('id'),
		success: function(result){
	 	 	$("#show_pm_div").html(result);
		}
	});
});
$("#del_avatar").click(function () {
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=del_avatar&id=<?=$_SESSION["new_okusername"]?>",
		success: function(result){
			alert('<?=$view_deleted_avatar?>');
			$("#user_avatar").attr('src',"/new_avatar/no_avatar.jpg")
		}
	});
});


$("#del_qaz").click(function () {
	$("#del_pm").val($(this).attr('id'));
});

$("#del_pm").click(function () {
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=del_pm&id="+$(this).val(),
		success: function(result){
			 window.location='/profile/<?=$madual_lang?>';
		}
	});
});

$(".del_favorite").click(function () {
	alert($(this).attr('id'));
	$("#del_favorite").val($(this).attr('id'));
});
$("#del_favorite").click(function () {
	$.ajax({
		type:'POST',
		url:'/New_members_ajax.php',
		data:"action=del_favorite&id="+$(this).val(),
		success: function(result){
			alert(result);

			 window.location='/profile/<?=$madual_lang?>';
		}
	});
});


</script>

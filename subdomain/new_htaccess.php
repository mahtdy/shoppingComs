﻿<?$domain_name= $_SERVER["HTTP_HOST"] ;
$url=$_SERVER["REQUEST_URI"];
$temp=explode(".",$domain_name);
$site=(count($temp)<=2) ? "main" : $temp[0];
$url_temp=explode("/",$url);

include_once("../newcoms/Database.php");
include_once("../newcoms/function.php");
if(count($url_temp)==2){
	if($url_temp[1]=="logout"){
	include("new_dynamics/new_logout.php4");exit;;
	}
	$madual_lang=injection_replace($url_temp[1]);
	include_once("new_home.php");exit;
}
if(count($url_temp)==3){
	if($url_temp[1]=="logout"){
	include("new_dynamics/new_logout.php4");exit;;
	}
	if($url_temp[1]=="contact_us"){
	$madual_lang=injection_replace($url_temp[2]);
	$madual_file_name="new_contact_us";
	include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=="mansger_sms_login"){
	$madual_lang=injection_replace($url_temp[2]);
	$madual_file_name="new_mansger_sms_login";
	include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=="sms_validation"){
	$madual_lang=injection_replace($url_temp[2]);
	$madual_file_name="new_user_sms_validation";
	include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=="new_login"){
	$madual_lang=injection_replace($url_temp[2]);
	$madual_file_name="new_user_login";
	include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=="profile"){
	$madual_lang=injection_replace($url_temp[2]);
	$madual_file_name="new_user_profile";
	include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=="register"){
	$madual_lang=injection_replace($url_temp[2]);
	$madual_file_name="new_register";
	include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=="sms_login"){
	$madual_lang=injection_replace($url_temp[2]);
	$madual_file_name="new_user_login_sms";
	include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=="rss"){
		$madual_lang=injection_replace($url_temp[2]);
		$madual_file_name="new_rss";
		include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=='news'){
		$madual_file_name='new_news';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='fotter'){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='register'){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='page'){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='download'){
		$madual_file_name='test';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='article'){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='video'){
		$madual_file_name='new_user_login';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='gallery'){
		$madual_file_name='new_user_login_sms';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='weblog'){
		$madual_file_name='new_register';
		$madual_lang=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
		$madual_lang=injection_replace($url_temp[2]);
		$name=injection_replace($url_temp[1]);
}
if(count($url_temp)==4){
	if($url_temp[1]=="rss"){
		$madual_lang=injection_replace($url_temp[2]);
		$rss_id=injection_replace($url_temp[3]);
		$madual_file_name="new_show_rss";
		include("new_dynamic.php");exit;;
	}
	if($url_temp[1]=='news'){
		$madual_file_name='new_news_text';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='fotter'){
		$madual_file_name='newsss';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='register'){
		$madual_file_name='newsss';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='page'){
		$madual_file_name='newsss';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='download'){
		$madual_file_name='newsss';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='article'){
		$madual_file_name='newsss';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='video'){
		$madual_file_name='newsss';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='gallery'){
		$madual_file_name='newsss';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[1]=='weblog'){
		$madual_file_name='news';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_id=injection_replace($url_temp[3]);
		include("new_dynamic.php");exit;	
	}
}
if(count($url_temp)==5){
	if($url_temp[1]=="keyword"&&$url_temp[3]!="page"){
		$madual_file_name="new_show_comments";
		$madual_lang=injection_replace($url_temp[3]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[2]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='news'){
		$madual_file_name='new_news';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='news'){
		$madual_file_name='new_news_cat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='news')||($url_temp[3]=="keyword"&&$url_temp[1]=='news')){
		$madual_file_name='new_news_search';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='fotter'){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='fotter'){
		$madual_file_name='caat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='fotter')||($url_temp[3]=="keyword"&&$url_temp[1]=='fotter')){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='register'){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='register'){
		$madual_file_name='caat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='register')||($url_temp[3]=="keyword"&&$url_temp[1]=='register')){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='page'){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='page'){
		$madual_file_name='caat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='page')||($url_temp[3]=="keyword"&&$url_temp[1]=='page')){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='download'){
		$madual_file_name='test';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='download'){
		$madual_file_name='caat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='download')||($url_temp[3]=="keyword"&&$url_temp[1]=='download')){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='article'){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='article'){
		$madual_file_name='caat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='article')||($url_temp[3]=="keyword"&&$url_temp[1]=='article')){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='video'){
		$madual_file_name='new_user_login';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='video'){
		$madual_file_name='caat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='video')||($url_temp[3]=="keyword"&&$url_temp[1]=='video')){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='gallery'){
		$madual_file_name='new_user_login_sms';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='gallery'){
		$madual_file_name='caat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='gallery')||($url_temp[3]=="keyword"&&$url_temp[1]=='gallery')){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	if($url_temp[3]=="page"&&$url_temp[1]=='weblog'){
		$madual_file_name='new_register';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_page_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if($url_temp[3]=="cat_id"&&$url_temp[1]=='weblog'){
		$madual_file_name='caat';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_cat_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
	 if(($url_temp[3]=="search"&&$url_temp[1]=='weblog')||($url_temp[3]=="keyword"&&$url_temp[1]=='weblog')){
		$madual_file_name='';
		$madual_lang=injection_replace($url_temp[2]);
		$madual_search_id=urldecode(injection_replace($url_temp[4]));
		$madual_name=injection_replace($url_temp[1]);
		include("new_dynamic.php");exit;	
	}
}
if(count($url_temp)==7){
	if($url_temp[3]=="cat_id"&&$url_temp[5]=="page"){
		if($url_temp[1]=='news'){
			$madual_file_name='new_news_cat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='fotter'){
			$madual_file_name='caat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='register'){
			$madual_file_name='caat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='page'){
			$madual_file_name='caat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='download'){
			$madual_file_name='caat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='article'){
			$madual_file_name='caat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='video'){
			$madual_file_name='caat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='gallery'){
			$madual_file_name='caat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='weblog'){
			$madual_file_name='caat';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_cat_id=injection_replace($url_temp[4]);
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
	}
	if(($url_temp[3]=="search"&&$url_temp[5]=="page")||($url_temp[3]=="keyword"&&$url_temp[5]=="page")){
		if($url_temp[1]=='news'){
			$madual_file_name='new_news_search';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='fotter'){
			$madual_file_name='';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='register'){
			$madual_file_name='';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='page'){
			$madual_file_name='';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='download'){
			$madual_file_name='';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='article'){
			$madual_file_name='';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='video'){
			$madual_file_name='';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='gallery'){
			$madual_file_name='';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
		if($url_temp[1]=='weblog'){
			$madual_file_name='';
			$madual_lang=injection_replace($url_temp[2]);
			$madual_search_id=urldecode(injection_replace($url_temp[4]));
			$madual_page_id=injection_replace($url_temp[6]);
			include("new_dynamic.php");exit;	
		}
	}
}

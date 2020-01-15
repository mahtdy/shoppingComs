<?  
if(file_exists("languages/$madual_lang.php")){include_once("languages/$madual_lang.php");}
$domain_name= $_SERVER["HTTP_HOST"] ;
$_SESSION['madual_page_id']=$madual_page_id;
$temp=explode(".",$domain_name);
if($temp[0]=="www"||$temp[0]=="WWW"){
unset($temp[0]);
}

if($madual_lang>"")
	$_SESSION['page_languege']=$madual_lang;
 
//$lang_file=file_get_contents("languages/$madual_lang.php");

$site=(count($temp)<=2&&count($temp)>=0||count($temp)==4) ? "main" : $temp[0];
if($site=='main')
$domain="http://$domain_name";
else
$domain="http://$site.$domain_name";	

 
$manage_site=resolve_id_site($site,$coms_conect);
$la=resolve_id_langueg($madual_lang,$coms_conect);
$defult_dir=get_direction_lang($la,$coms_conect);
$tem_name=get_template($manage_site,$la,$coms_conect);
$defult_site=$site;
$defult_lang=$madual_lang;
$now=time();

$header_titleee = get_tem_result($defult_site, $defult_lang, "header_title", 'default', $coms_conect);
        $site_title = $header_titleee['title'];



if($madual_lang=='ar')
	$defult_dir='ar';
$incfile="new_dynamics/".$madual_file_name.".php4";

if($_SERVER["HTTP_HOST"]=='localhost')
 $ffmpeg = "C:\\xampp\\ffmpeg\\bin\\ffmpeg.exe";
else 
$ffmpeg='ffmpeg';	
 $_SESSION['ffmpeg']=$ffmpeg;
 $_SESSION['site']=$site;
$_SESSION['la']=$madual_lang;


 
get_user_online($_SESSION["new_okusername"],session_id(),$coms_conect);
$tem=$tem_name;
 
 $header_title= get_tem_result($defult_site,$defult_lang,"header_title_nav",'default',$coms_conect);  
 if(get_result("select status from new_language where title='$madual_lang'",$coms_conect)==0)
	echo '<script>window.location="/404.html"</script>';
#####	

function get_header_title($coms_conect,$module,$id){
	switch ($module){
		case  '1' ;
		return get_result("select title from new_news where id='$id'",$coms_conect);
		break;		
		case  '9' ;
		return get_result("select title from new_gallery where id='$id'",$coms_conect);
		break;
		case  '6' ;
		return get_result("select name from new_download where id='$id'",$coms_conect);
		break;	
		case  '8' ;
		return get_result("select title from new_video where id='$id'",$coms_conect);
		break;	
		case  '10' ;
		return get_result("select title from new_blog where id='$id'",$coms_conect);
		break;	
		case  '7' ;
		return get_result("select title from new_article where id='$id'",$coms_conect);
		break;	
		case  '11' ;
		return get_result("select title from new_content where id='$id'",$coms_conect);
		break;			
	}	
} 
if(count($url_temp)>3&&$url_temp[3]!=='keyword'&&$url_temp[3]!=='category')
	$pipe='';
	//$pipe='::';

$cat_name='';
if($url_temp[3]=='category')
$cat_name= get_result("select name from new_modules_cat where id='$madual_cat_id'",$coms_conect);
$page='';
switch ($url_temp[1]){
		case  'page' ;
		if($url_temp[3]=='keyword')
			$nav_title=$view_tag_page.' '.delete_dash(urldecode($url_temp[4])).' - '.$header_title['text'];
		break;
	case  'news' ;
		if($url_temp[3]=='page')
			$pipe='';
		$nav_title=$view_news.' '. $pipe.$cat_name.get_header_title($coms_conect,1,$madual_id); 
		if($url_temp[3]=='keyword')
			$nav_title=$view_tag_news.' '.delete_dash(urldecode($url_temp[4]));
		if($url_temp[3]=='search')
			$nav_title=$view_serach_news.' '.delete_dash(urldecode($url_temp[4]));
		break;	
		
	case  'content' ; 
	 if(count($url_temp)==3){
		$nav_title ='مقاله های علمی  ' .' - '.$header_title['text'];
		break;
	 }
		if($url_temp[3]=='page'){
				if($url_temp[4]>1)
				$page=' - صفحه ';
			$nav_title=' مقاله های علمی   '.$page.$url_temp[4].' - '.$header_title['text'];
			break;
		}
		if($url_temp[3]=='category'&&$url_temp[5]=='page'){
			$nav_title=get_result("select name from new_modules_cat where id={$url_temp[4]}",$coms_conect). ' -  صفحه '.$url_temp[6].' - '.$header_title['text'];
			break;
		}
		$nav_title= $cat_name.get_header_title($coms_conect,11,$madual_id).' - '.$header_title['text']; 
		if($url_temp[3]=='keyword'){
				if($url_temp[5]>1)
				$page=' – صفحه ';
			if($url_temp[5]!=1)
			$nav_title= delete_dash(urldecode($url_temp[4])).$page.$url_temp[5].' - '.$header_title['text'];
			else
				$nav_title= delete_dash(urldecode($url_temp[4])).' - '.$header_title['text'];
			break;
		}
		if($url_temp[3]=='search')
			$nav_title=$view_serach_content.' '.delete_dash(urldecode($url_temp[4]));
		break;			
 		 
 
		
	case  'article' ;
		if($url_temp[3]=='page')
			$pipe='';
		$nav_title=$view_article_list.' '. $pipe.$cat_name.get_header_title($coms_conect,7,$madual_id); 
		if($url_temp[3]=='keyword')
			$nav_title=$view_tag_article.' '.delete_dash(urldecode($url_temp[4]));
		if($url_temp[3]=='search')
			$nav_title=$view_serach_article.' '.delete_dash(urldecode($url_temp[4]));
		break;			
		
	case  'price' ;
		$nav_title=$view_Internet_tariffs.' '. $pipe.' '.get_header_title($coms_conect,1,$madual_id);
		break;	
	case  'video' ;
		 if(count($url_temp)==3){
		$nav_title ='آرشیو فیلم ' .' - '.$header_title['text'];
		break;
		}
		if($url_temp[3]=='page'){
					if($url_temp[4]>1)
				$page=' - صفحه ';
			$nav_title=  'فیلم   -  '.$page.$url_temp[4].' - '.$header_title['text'];
			break;
		}
		
		if($url_temp[3]=='category'){
			if($url_temp[6]>1)
				$page=' - صفحه ';
		$nav_title=' فیلم  ' .$cat_name.get_header_title($coms_conect,8,$madual_id).$page .$url_temp[6].' - '.$header_title['text'];
		break;
		}
		//else if($url_temp[3]!='category'){
			
		//	$nav_title=get_header_title($coms_conect,8,$madual_id).' – جهان سمعک';;
		///break;
		//}
 		$nav_title=$view_video.' '. $pipe.$cat_name.' '.get_header_title($coms_conect,8,$madual_id).' - '.$header_title['text']; 
		if($url_temp[3]=='keyword'){
			if($url_temp[6]>1)
			$page=' - صفحه ';
			//$nav_title=$view_tag_video.' '.delete_dash(urldecode($url_temp[4]));
			$nav_title=$view_tag_video.' '.delete_dash(urldecode($url_temp[4])).$page.' - '.$header_title['text'];
		}
		if($url_temp[3]=='search'){
			if($url_temp[6]>1)
				$page=' - صفحه ';
			//$nav_title=$view_serach_video.' '.delete_dash(urldecode($url_temp[4]));
			$nav_title=$view_tag_video.' '.delete_dash(urldecode($url_temp[4])).$page.' - '.$header_title['text'];
		}
		break;
 
	 case  'blog' ;
		$nav_title=$view_blog.' '.$pipe.$cat_name.get_header_title($coms_conect,10,$madual_id);
		if($url_temp[3]=='keyword'){
		
		$nav_title=$view_tag_blog.' '.delete_dash(urldecode($url_temp[4]));
		}
		if($url_temp[3]=='search')
			$nav_title=$view_serach_blog.' '.delete_dash(urldecode($url_temp[4]));
  		break;	


		
	case  'contact_us' ;
		$nav_title=' '.$view_contact_us.' ';
		break;
	case  'gallery' ;
	
		
	 if(count($url_temp)==3){
		$nav_title =' آرشیو عکس ' .' - '.$header_title['text'];
		break;
		
	 }
		if($url_temp[3]=='page'){
				if($url_temp[4]>1)
				$page=' - صفحه ';
			$nav_title=  'آرشیو عکس - '.$page.$url_temp[4].' - '.$header_title['text'];
			break;
		}
		if($url_temp[5]=='page'&&$url_temp[3]!='category'){
			if($url_temp[6]>1)
				$page=' - صفحه ';
			$nav_title=urldecode(get_header_title($coms_conect,9,$madual_id)).$page.$url_temp[6].' - '.$header_title['text'];
			break;
		}
	
	  
		if($url_temp[3]=='category'){
			if($url_temp[6]>1)
				$page=' - صفحه ';
			
		$nav_title=$view_gallery.' ' .$cat_name.get_header_title($coms_conect,9,$madual_id).$page .$url_temp[6].' - '.$header_title['text'];
		}
		else if($url_temp[3]!='category')
			$nav_title=get_header_title($coms_conect,9,$madual_id).' - '.$header_title['text'];;
		 
		if($url_temp[3]=='keyword'){
			if($url_temp[5]>1)
				$page=' - صفحه '.$url_temp[5];
			$nav_title=$view_tag_gallery.' '.delete_dash(urldecode($url_temp[4])).$page.' - '.$header_title['text'];
		}
		if($url_temp[3]=='search'){ 
				if($url_temp[6]>1)
				$page=' - صفحه '.$url_temp[6];
			$nav_title=$view_serach_gallery.' '.delete_dash(urldecode($url_temp[4])).$page.' - '.$header_title['text'];
		}
	 
  		break;	
 	case  'article' ;
		$nav_title=$view_article.' '.$pipe .$cat_name.get_header_title($coms_conect,7,$madual_id);;
		break;		
 	case  'download' ;
	//	$nav_title=$view_download.' '.$pipe .$cat_name.get_header_title($coms_conect,6,$madual_id);;
		
	 if(count($url_temp)==3){
		$nav_title =' آرشیو آهنگ  ' .' - '.$header_title['text'];
		break;
	 }
		if($url_temp[3]=='page'){
				if($url_temp[4]>1)
				$page=' - صفحه ';
			$nav_title=' آرشیو آهنگ    '.$page.$url_temp[4].' - '.$header_title['text'];
			break;
		}
		if($url_temp[3]=='category'&&$url_temp[5]=='page'){
			$nav_title=urldecode( $url_temp[4]). ' -  صفحه '.$url_temp[6].' - '.$header_title['text'];
			break;
		}
		if($url_temp[3]=='category'){
			$nav_title=urldecode( $url_temp[4]). ' - '.$header_title['text'];
			break;
		}
		$nav_title= $cat_name.get_header_title($coms_conect,6,$madual_id).' - '.$header_title['text']; 
		if($url_temp[3]=='keyword'){
				if($url_temp[5]>1)
				$page=' – صفحه ';
			if($url_temp[5]!=1)
			$nav_title= delete_dash(urldecode($url_temp[4])).$page.$url_temp[5].' - '.$header_title['text'];
			else
				$nav_title= delete_dash(urldecode($url_temp[4])).' - '.$header_title['text'];
			break;
		}
		if($url_temp[3]=='search')
			$nav_title=$view_serach_content.' '.delete_dash(urldecode($url_temp[4]));
		break;			
 		 
 		
		
		
		
		
		break;			
 	case  'ads' ;
		$nav_title=$view_ads.' '.$pipe.get_header_title($coms_conect,18,$madual_id);;
		break;		
		
 	case  'faq' ;
		$nav_title=' '.$view_faq.' - '.$header_title['text'];
		if($url_temp[3]=='tag')
		$nav_title=$view_question_label.' '.get_result("select name from new_keyword where id=".injection_replace(urldecode($url_temp[4])),$coms_conect);
		if($url_temp[3]=='category')
		$nav_title=$view_question_cat.' '.get_result("select name from new_modules_cat where id=".injection_replace(urldecode($url_temp[4])),$coms_conect);
		if($url_temp[3]=='show')
		$nav_title=get_result("select question from new_faq where id=".injection_replace(urldecode($url_temp[4])),$coms_conect);
		
		break;
 
  	case  'question' ;
		$nav_title=' '.$view_faq2.' ';
		if($url_temp[3]=='tag')
		$nav_title=$view_faq_label.' '.get_result("select name from new_keyword where id=".injection_replace(urldecode($url_temp[4])),$coms_conect);
		if($url_temp[3]=='category')
		$nav_title=$view_faq_cat.' '.get_result("select name from new_modules_cat where id=".injection_replace(urldecode($url_temp[4])),$coms_conect);
	 	
		break;
  
 
 
 	case  'register' ;
		$nav_title=' '.$seramic_register.' ';
		break;		
 	case  'new_login' ;
		$nav_title=' '.$view_login_site.' ';
		break;	
	case  'login' ;
		$nav_title=' '.$view_login_site.' ';
		break;		
 	case  'search' ;
		$nav_title=' '.$seramic_search.'  '; 
		break;	
 	case  'sms_validation' ;
		$nav_title=' '.$view_enable_user_sms.' ';
		break;		
 	case  'sms_login' ;
		$nav_title=' '.$view_login_two_phase.' ';
		break;	
  	case  'q_a_new' ;
		$nav_title=$view_new_question;
		break;	
  	case  'q_a' ;
		$nav_title=$view_faq2;
		break;
   	case  'q_a_show' ;
		$nav_title=$view_faq2;
		break;
   	case  'reset_password' ;
		$nav_title=$view_reset_password;  
		break;
}

 
	$query="SELECT url,sms_password,sms_user,senderNumbers from new_sms_webservice";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$sms_url=$row['url'];
	$sms_password=$row['sms_password'];
	$sms_user=$row['sms_user'];
	$senderNumbers=array($row['senderNumbers']);
	$incfile="new_dynamics/$tem_name/".$madual_file_name.".php4";

if($url_temp[1]=='rss'){
	include_once($incfile);exit;
}

include_once "new_template/$tem_name/blocks/header.php4";

if(file_exists($incfile)){
	 
	include_once($incfile);
}else  
	include_once "new_dynamics/default/".$madual_file_name.".php4";	
include_once "new_template/$tem_name/blocks/footer.php4";
?>
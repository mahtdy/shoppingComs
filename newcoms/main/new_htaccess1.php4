<?$date=time();
	$myfile = fopen("new_htaccess.php", "w") or die("Unable to open file!");
	//header('Content-type: text/html; charset=utf-8');
	//fwrite($myfile,  "\xEF\xBB\xBF");
	fwrite($myfile, '<?include_once("newcoms/Database.php");'."\r\n");
	fwrite($myfile, 'include_once("newcoms/function.php");'."\r\n");
	fwrite($myfile, '$domain_name= $_SERVER["HTTP_HOST"] ;'."\r\n");
	fwrite($myfile, '$url=$_SERVER["REQUEST_URI"];'."\r\n");
	fwrite($myfile, '$temp=explode(".",$domain_name);'."\r\n");
	fwrite($myfile, 'if($temp[0]=="www")'."\r\n");
	fwrite($myfile, 'unset($temp[0]);'."\r\n");
	fwrite($myfile, 'if($domain_name="localhost")'."\r\n");
	fwrite($myfile, '$domain_name="";'."\r\n");
	fwrite($myfile, '$site=(count($temp)<=2&&count($temp)>=0||count($temp)==4) ? "main" : $temp[0];'."\r\n");
	fwrite($myfile, '$url_temp=explode("/",$url);'."\r\n");
	
	
	fwrite($myfile, '$query5="select  title  from new_language where status=1";'."\r\n");
	fwrite($myfile, '$result5 = $coms_conect->query($query5);'."\r\n");
	fwrite($myfile, 'while($RS15 = $result5->fetch_assoc()){'."\r\n");
	fwrite($myfile, '	$lang_array[]=$RS15["title"];'."\r\n");
	fwrite($myfile, '}'."\r\n");
	 
	fwrite($myfile, 'if(count($url_temp)==2){'."\r\n");

		fwrite($myfile, '	if($url_temp[1]=="logout"){'."\r\n");
		fwrite($myfile, '	include("new_dynamics/new_logout.php4");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");

//        fwrite($myfile, '	if($url_temp[1]=="adwords"){'."\r\n");
//        fwrite($myfile, '	include("new_dynamics/coms2/new_adwords.php4");exit;'.";\r\n");
//        fwrite($myfile, '	}'."\r\n");
//
//        fwrite($myfile, '	if($url_temp[1]=="ssl"){'."\r\n");
//        fwrite($myfile, '	include("new_dynamics/coms2/new_ssl.php4");exit;'.";\r\n");
//        fwrite($myfile, '	}'."\r\n");

		fwrite($myfile, '	if($url_temp[1]=="new_login"){'."\r\n");
		fwrite($myfile, '	include("new_login.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");

		fwrite($myfile, '	if($url_temp[1]=="coms"){'."\r\n");
		fwrite($myfile, '	include("new_login.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		
		fwrite($myfile, '	if($url_temp[1]=="newcoms"){'."\r\n");
		fwrite($myfile, '	include("newcoms/index2.php4");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		
	
 



		fwrite($myfile, '	if(in_array($url_temp[1],$lang_array)){'.";\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[1]);'.";\r\n");
		fwrite($myfile, '	include_once("new_home.php");exit;'.";\r\n");
		fwrite($myfile, '	}else{'.";\r\n");
		fwrite($myfile, '	$user_username=$url_temp[1];'.";\r\n");
		fwrite($myfile, '	include("new_dynamics/default/new_user_profile_page.php4");exit;'.";\r\n");
		fwrite($myfile, '		}'.";\r\n");
	 
	fwrite($myfile, '}'."\r\n");
	/*fwrite($myfile, 'if(count($url_temp)==3){'."\r\n");
	fwrite($myfile, '	$name=$url_temp[2];'."\r\n");
	fwrite($myfile, '	$madual_lang=injection_replace($url_temp[1]);'."\r\n");
	fwrite($myfile, '}'."\r\n");*/
	
	########################
	fwrite($myfile, 'if(count($url_temp)==3){'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="coms"){'."\r\n");
		fwrite($myfile, '	include("new_login.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="logout"){'."\r\n");
		fwrite($myfile, '	include("new_dynamics/new_logout.php4");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="contact_us"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_contact_us"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="doctors"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_docters"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="products"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_products"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="category"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_category"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="adwords"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_adwords"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="ssl"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_ssl"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="domain"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_domain"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="host"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_host"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="vps"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_vps"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="dedicated-server"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_dedicated_server"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");
        
        fwrite($myfile, '	if($url_temp[1]=="sms"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_sms"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="intohost"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_intohost"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="dedicated"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_dedicated"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");
        
        fwrite($myfile, '	if($url_temp[1]=="dedicatedserver-nvme"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_dedicatedserver_nvme"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="startup"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_startup"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="android-app-development"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_android_app_development"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");


        fwrite($myfile, '	if($url_temp[1]=="ios-app-development"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_ios_app_development"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="license"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_license"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="about"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_about"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="education"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_education"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '	if($url_temp[1]=="webpack"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_webpack"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");
        fwrite($myfile, '	if($url_temp[1]=="android"){'."\r\n");
        fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '	$madual_file_name="new_android"'.";\r\n");
        fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
        fwrite($myfile, '	}'."\r\n");

fwrite($myfile, '	if($url_temp[1]=="reset_password"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="reset_password"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
	 
		fwrite($myfile, '	if($url_temp[1]=="add_ads"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_add_ads"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
		
		
		fwrite($myfile, '	if($url_temp[1]=="price"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_price"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	

		fwrite($myfile, '	if($url_temp[1]=="faq"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		
		fwrite($myfile, '	if($url_temp[1]=="question"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");		
 
		
		fwrite($myfile, '	if($url_temp[1]=="mansger_sms_login"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_mansger_sms_login"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="sms_validation"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_user_sms_validation"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="login"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_user_login"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="profile"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_user_profile"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		
		
		fwrite($myfile, '	if($url_temp[1]=="panel"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_user_profile_panel"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		
		fwrite($myfile, '	if($url_temp[1]=="register"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_register"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="sms_login"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_user_login_sms"'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="rss"){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_rss"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		$query="SELECT link,main_file FROM new_modules where status=0";
		 $result = $coms_conect->query($query);
			while($row = $result->fetch_assoc()) {
			$link=$row['link'];
			$main_file=$row['main_file'];
			fwrite($myfile, '	if($url_temp[1]=='."'".$link."'".'){'."\r\n");
			fwrite($myfile, '		$madual_file_name='."'".$main_file."'".";\r\n");
			fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '		include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '	}'."\r\n");
		}
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		$name=injection_replace($url_temp[1])'.";\r\n");
	fwrite($myfile, '}'."\r\n");
##########################################	
	fwrite($myfile, 'if(count($url_temp)==4){'."\r\n");

		fwrite($myfile, '	$array=explode("?",$url_temp[3]);'."\r\n");
		fwrite($myfile, '	if(count($array)==2){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '		$madual_file_name="new_content"'.";\r\n");
 		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");

		fwrite($myfile, '	if($url_temp[2]=="page"){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[1])'.";\r\n");
		fwrite($myfile, '		$madual_page_id=injection_replace($url_temp[3])'.";\r\n");
 		fwrite($myfile, '		include("new_home.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");

		fwrite($myfile, '	if($url_temp[1]=="rss"){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		$rss_id=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_show_rss"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");

		fwrite($myfile, '	if($url_temp[1]=="category"){'."\r\n");
        fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '		$url_temp[3]=="name"'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_under_cat"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");

		fwrite($myfile, '	if($url_temp[1]=="product"){'."\r\n");
        fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
        fwrite($myfile, '		$url_temp[3]=="name"'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_under_product"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");



		fwrite($myfile, '	if($url_temp[1]=="login"){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		$active_email_id=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_user_login"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[1]=="news"&&$url_temp[3]=="tag"){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		//$rss_id=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_news_tag"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		
		
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="new"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq_new"'.";\r\n");
		fwrite($myfile, '	$faqq=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
 		
		fwrite($myfile, '	if($url_temp[1]=="question"&&$url_temp[3]=="new"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question_new"'.";\r\n");
		fwrite($myfile, '	$faqq=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
 
 
		fwrite($myfile, '	if($url_temp[1]=="search"){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		$rss_id=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_Search"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");
		$query="SELECT link,show_file FROM new_modules where status=0";
		 $result = $coms_conect->query($query);
			while($row = $result->fetch_assoc()) {
			$link=$row['link'];
			$show_file=$row['show_file'];
			fwrite($myfile, '	if($url_temp[1]=='."'".$link."'".'){'."\r\n");
			fwrite($myfile, '		$madual_file_name='."'".$show_file."'".";\r\n");
			fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '		$madual_id=injection_replace($url_temp[3])'.";\r\n");
			fwrite($myfile, '		include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '	}'."\r\n");
		}
			fwrite($myfile, '$madual_id=injection_replace($url_temp[1])'.";\r\n");
			fwrite($myfile, '$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '$name=injection_replace($url_temp[1])'.";\r\n");
 	fwrite($myfile, '}'."\r\n");
##########################################	
	fwrite($myfile, 'if(count($url_temp)==5){'."\r\n");
	
	
		fwrite($myfile, '	if($url_temp[1]=="search"){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		$q=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '		$search_module=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_Search"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");

	
	
	
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="category"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq"'.";\r\n");
		fwrite($myfile, '	$cat_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
		
		
		fwrite($myfile, '	if($url_temp[1]=="question"&&$url_temp[3]=="category"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question"'.";\r\n");
		fwrite($myfile, '	$cat_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");			
		
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="page"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq"'.";\r\n");
		fwrite($myfile, '	$faq_page=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
		
		fwrite($myfile, '	if($url_temp[1]=="question"&&$url_temp[3]=="page"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question"'.";\r\n");
		fwrite($myfile, '	$faq_page=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");			
		
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="tag"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq"'.";\r\n");
		fwrite($myfile, '	$tag=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
		
		fwrite($myfile, '	if($url_temp[1]=="question"&&$url_temp[3]=="tag"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question"'.";\r\n");
		fwrite($myfile, '	$tag=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
	
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="search"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq"'.";\r\n");
		fwrite($myfile, '	$sreach_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
		
		fwrite($myfile, '	if($url_temp[1]=="question"&&$url_temp[3]=="search"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question"'.";\r\n");
		fwrite($myfile, '	$sreach_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");			
		
	
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="show"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq_show"'.";\r\n");
		fwrite($myfile, '	$faq_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
	
	    fwrite($myfile, '	if($url_temp[1]=="question"&&$url_temp[3]=="show"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question_show"'.";\r\n");
		fwrite($myfile, '	$faq_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
	
		fwrite($myfile, '   if($url_temp[1]=="profile"&&$url_temp[3]=="ticket"&&$url_temp[4]=="show"){'."\r\n");
		fwrite($myfile, '        $ticket_id=$url_temp[5];'."\r\n");
	    fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
		fwrite($myfile, '        $madual_file_name="new_user_profile";'."\r\n");
		fwrite($myfile, '        $madual_main_file="new_showall_ticket";'."\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
		fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '	if($url_temp[3]=="pm"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_user_profile"'.";\r\n");
		fwrite($myfile, '	$madual_page_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
		fwrite($myfile, '	if($url_temp[1]=="keyword"&&$url_temp[3]!="page"){'."\r\n");
		fwrite($myfile, '		$madual_file_name="new_show_comments"'.";\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '		$madual_page_id=urldecode(injection_replace($url_temp[4]))'.";\r\n");
		fwrite($myfile, '		$madual_name=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;	'."\r\n");
		fwrite($myfile, '	}'."\r\n");

		$query="SELECT link,main_file,cat_file,serach_file FROM new_modules where status=0";
		$result = $coms_conect->query($query);
		while($row = $result->fetch_assoc()) {
			$link=$row['link'];
			$main_file=$row['main_file'];
			$cat_file=$row['cat_file'];
			$serach_file=$row['serach_file'];

			fwrite($myfile, '	if($url_temp[3]=="page"&&$url_temp[1]=='."'".$link."'".'){'."\r\n");
			fwrite($myfile, '		$madual_file_name='."'".$main_file."'".";\r\n");
			fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '		$madual_page_id=urldecode(injection_replace($url_temp[4]))'.";\r\n");
			fwrite($myfile, '		$madual_name=injection_replace($url_temp[1])'.";\r\n");
			fwrite($myfile, '		include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '	}'."\r\n");
			
			fwrite($myfile, '	 if($url_temp[3]=="category"&&$url_temp[1]=='."'".$link."'".'){'."\r\n");
			fwrite($myfile, '		$madual_file_name='."'".$cat_file."'".";\r\n");
			fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '		$madual_cat_id=urldecode(injection_replace($url_temp[4]))'.";\r\n");
			fwrite($myfile, '		$madual_name=injection_replace($url_temp[1])'.";\r\n");
			fwrite($myfile, '		include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '	}'."\r\n");
			fwrite($myfile, '	 if(($url_temp[3]=="search"&&$url_temp[1]=='."'".$link."'".')||($url_temp[3]=="keyword"&&$url_temp[1]=='."'".$link."'".')){'."\r\n");
			fwrite($myfile, '		$madual_file_name='."'".$serach_file."'".";\r\n");
			fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '		$madual_search_id=urldecode(injection_replace($url_temp[4]))'.";\r\n");
			fwrite($myfile, '		$madual_name=injection_replace($url_temp[1])'.";\r\n");
			fwrite($myfile, '		include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '	}'."\r\n");
		}
		$query="SELECT link,show_file FROM new_modules where status=0";
		$result = $coms_conect->query($query);
		while($row = $result->fetch_assoc()) {
			$link=$row['link'];
			$show_file=$row['show_file'];
			fwrite($myfile, '	 if(($url_temp[3]!="category"&&$url_temp[1]=='."'".$link."'".')&&($url_temp[3]!="search"&&$url_temp[1]=='."'".$link."'".')&&($url_temp[3]!="keyword"&&$url_temp[1]=='."'".$link."'".')){'."\r\n");
			fwrite($myfile, '		$madual_file_name='."'".$show_file."'".";\r\n");
			fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '		$madual_id=injection_replace($url_temp[3])'.";\r\n");
			fwrite($myfile, '		include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '	}'."\r\n");
		}
	fwrite($myfile, '}'."\r\n");
###############################################
	fwrite($myfile, 'if(count($url_temp)==6){'."\r\n");

	
		fwrite($myfile, '	if($url_temp[1]=="search"){'."\r\n");
		fwrite($myfile, '		$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '		$q=injection_replace($url_temp[3])'.";\r\n");
		fwrite($myfile, '		$search_module=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '		$search_page=injection_replace($url_temp[5])'.";\r\n");
		fwrite($myfile, '		$madual_file_name="new_Search"'.";\r\n");
		fwrite($myfile, '		include("new_dynamic.php");exit;'.";\r\n");
		
		fwrite($myfile, '	}'."\r\n");

	
	
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="search"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq"'.";\r\n");
		fwrite($myfile, '	$cat_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	$sreach_id=injection_replace($url_temp[5])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");		
	
	
		fwrite($myfile, '   if($url_temp[1]=="page"&&$url_temp[3]=="keyword"){'."\r\n");
	    fwrite($myfile, '        $keyword_id=$url_temp[4];'."\r\n");
	    fwrite($myfile, '        $madual_page_id=$url_temp[5];'."\r\n");
	    fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
	    fwrite($myfile, '        $madual_file_name="new_page_keyword";'."\r\n");
 	    fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
	    fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '   if($url_temp[1]=="page"&&$url_temp[3]=="category"){'."\r\n");
	    fwrite($myfile, '        $keyword_id=$url_temp[4];'."\r\n");
	    fwrite($myfile, '        $madual_page_id=$url_temp[5];'."\r\n");
	    fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
	    fwrite($myfile, '        $madual_file_name="new_page_cat";'."\r\n");
 	    fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
	    fwrite($myfile, '	}'."\r\n");
		fwrite($myfile, '   if($url_temp[1]=="page"&&$url_temp[3]=="search"){'."\r\n");
	    fwrite($myfile, '        $keyword_id=$url_temp[4];'."\r\n");
	    fwrite($myfile, '        $madual_page_id=$url_temp[5];'."\r\n");
	    fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
	    fwrite($myfile, '        $madual_file_name="new_page_search";'."\r\n");
 	    fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
	    fwrite($myfile, '	}'."\r\n");
		
	   fwrite($myfile, '   if($url_temp[1]=="profile"&&$url_temp[3]=="ads"&&$url_temp[4]=="edit"){'."\r\n");
	   fwrite($myfile, '        $ads_edit_id=$url_temp[5];'."\r\n");
	   fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
	   fwrite($myfile, '        $madual_file_name="new_user_profile";'."\r\n");
	   fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
	   fwrite($myfile, '	}'."\r\n");
	   fwrite($myfile, '   if($url_temp[1]=="profile"&&$url_temp[3]=="ticket"&&$url_temp[4]=="show"){'."\r\n");
	   fwrite($myfile, '        $ticket_id=$url_temp[5];'."\r\n");
	   fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
	   fwrite($myfile, '        $madual_file_name="new_user_profile";'."\r\n");
	   fwrite($myfile, '        $madual_main_file="new_show_ticket";'."\r\n");
	   fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
	   fwrite($myfile, '	}'."\r\n");
	   fwrite($myfile, '	if($url_temp[3]=="keyword"){'."\r\n");
		$query="SELECT link,serach_file FROM new_modules where status=0";
		$result = $coms_conect->query($query);
		while($row = $result->fetch_assoc()) {
			$link=$row['link'];
			$serach_file=$row['serach_file'];
			fwrite($myfile, '		if($url_temp[1]=='."'".$link."'".'){'."\r\n");
			fwrite($myfile, '			$madual_file_name='."'".$serach_file."'".";\r\n");
			fwrite($myfile, '			$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '			$madual_tag_id=injection_replace($url_temp[4])'.";\r\n");
			fwrite($myfile, '			$madual_page_id=injection_replace($url_temp[5])'.";\r\n");
			fwrite($myfile, '			$madual_cat_id="null"'.";\r\n");
			fwrite($myfile, '			include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '		}'."\r\n");
		}
		fwrite($myfile, '}'."\r\n");
		fwrite($myfile, '	if($url_temp[3]=="category"){'."\r\n");
			$query="SELECT link,cat_file FROM new_modules where status=0";
			$result = $coms_conect->query($query);
			while($row = $result->fetch_assoc()) {
				$link=$row['link'];
				$cat_file=$row['cat_file'];
				fwrite($myfile, '		if($url_temp[1]=='."'".$link."'".'){'."\r\n");
				fwrite($myfile, '			$madual_file_name='."'".$cat_file."'".";\r\n");
				fwrite($myfile, '			$madual_lang=injection_replace($url_temp[2])'.";\r\n");
				fwrite($myfile, '			$madual_cat_id=injection_replace($url_temp[4])'.";\r\n");
				fwrite($myfile, '			$madual_page_id=injection_replace($url_temp[5])'.";\r\n");
				fwrite($myfile, '			include("new_dynamic.php");exit;	'."\r\n");
				fwrite($myfile, '		}'."\r\n");
			}
		fwrite($myfile, '}'."\r\n");
	fwrite($myfile, '}'."\r\n");
###############################################
	fwrite($myfile, 'if(count($url_temp)==7){'."\r\n");
	
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="category"&&$url_temp[5]=="page"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq"'.";\r\n");
		fwrite($myfile, '	$faq_page=injection_replace($url_temp[6])'.";\r\n");
		fwrite($myfile, '	$cat_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
	
		fwrite($myfile, '	if($url_temp[1]=="faq"&&$url_temp[3]=="tag"&&$url_temp[5]=="page"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_faq"'.";\r\n");
		fwrite($myfile, '	$faq_page=injection_replace($url_temp[6])'.";\r\n");
		fwrite($myfile, '	$tag=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	


		fwrite($myfile, '	if($url_temp[1]=="question"&&$url_temp[3]=="category"&&$url_temp[5]=="page"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question"'.";\r\n");
		fwrite($myfile, '	$faq_page=injection_replace($url_temp[6])'.";\r\n");
		fwrite($myfile, '	$cat_id=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
	
		fwrite($myfile, '	if($url_temp[1]=="question"&&$url_temp[3]=="tag"&&$url_temp[5]=="page"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_question"'.";\r\n");
		fwrite($myfile, '	$faq_page=injection_replace($url_temp[6])'.";\r\n");
		fwrite($myfile, '	$tag=injection_replace($url_temp[4])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");			
	
		fwrite($myfile, '	if($url_temp[1]=="profile"){'."\r\n");
		fwrite($myfile, '	$madual_lang=injection_replace($url_temp[2])'.";\r\n");
		fwrite($myfile, '	$madual_file_name="new_user_profile"'.";\r\n");
		fwrite($myfile, '	$sreach_value=injection_replace($url_temp[5])'.";\r\n");
		fwrite($myfile, '	include("new_dynamic.php");exit;'.";\r\n");
		fwrite($myfile, '	}'."\r\n");	
		fwrite($myfile, '	if($url_temp[3]=="category"&&$url_temp[5]=="page"){'."\r\n");
		$query="SELECT link,cat_file FROM new_modules where status=0";
		$result = $coms_conect->query($query);
		while($row = $result->fetch_assoc()) {
			$link=$row['link'];
			$cat_file=$row['cat_file'];
			fwrite($myfile, '		if($url_temp[1]=='."'".$link."'".'){'."\r\n");
			fwrite($myfile, '			$madual_file_name='."'".$cat_file."'".";\r\n");
			fwrite($myfile, '			$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '			$madual_cat_id=injection_replace($url_temp[4])'.";\r\n");
			fwrite($myfile, '			$madual_page_id=injection_replace($url_temp[6])'.";\r\n");
			fwrite($myfile, '			include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '		}'."\r\n");
		}
		fwrite($myfile, '	}'."\r\n");	
		fwrite($myfile, '	if(($url_temp[3]=="search")||($url_temp[3]=="keyword")){'."\r\n");
		$query="SELECT link,serach_file FROM new_modules where status=0";
		$result = $coms_conect->query($query);
		while($row = $result->fetch_assoc()) {
			$link=$row['link'];
			$serach_file=$row['serach_file'];
			fwrite($myfile, '		if($url_temp[1]=='."'".$link."'".'){'."\r\n");
			fwrite($myfile, '			$madual_file_name='."'".$serach_file."'".";\r\n");
			fwrite($myfile, '			$madual_lang=injection_replace($url_temp[2])'.";\r\n");
			fwrite($myfile, '			$madual_search_str=urldecode(injection_replace($url_temp[4]))'.";\r\n");
			fwrite($myfile, '			$madual_cat_id=injection_replace($url_temp[5])'.";\r\n");
			fwrite($myfile, '			$madual_page_id=injection_replace($url_temp[6])'.";\r\n");
			fwrite($myfile, '			include("new_dynamic.php");exit;	'."\r\n");
			fwrite($myfile, '		}'."\r\n");
		}
		fwrite($myfile, '	}'."\r\n");	


		fwrite($myfile, '   if($url_temp[1]=="gallery"){'."\r\n");
        fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
        fwrite($myfile, '        $madual_id=$url_temp[3];'."\r\n");
        fwrite($myfile, '        $madual_title_gallery=$url_temp[4];'."\r\n");
        fwrite($myfile, '        $madual_page_id=$url_temp[6];'."\r\n");
	    fwrite($myfile, '        $madual_file_name="new_gallery_show";'."\r\n");
 	    fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
	    fwrite($myfile, '	}'."\r\n");

        fwrite($myfile, '   if($url_temp[1]=="video"){'."\r\n");
        fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
        fwrite($myfile, '        $madual_id=$url_temp[3];'."\r\n");
        fwrite($myfile, '        $madual_title_video=$url_temp[4];'."\r\n");
        fwrite($myfile, '        $madual_page_id=$url_temp[6];'."\r\n");
        fwrite($myfile, '        $madual_file_name="new_video_show";'."\r\n");
        fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
        fwrite($myfile, '	}'."\r\n");




		
	fwrite($myfile, '}'."\r\n");
########################################
fwrite($myfile, 'if(count($url_temp)==8){'."\r\n");

fwrite($myfile, '   if($url_temp[1]=="gallery" && $url_temp[3]=="category"){'."\r\n");
fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
fwrite($myfile, '        $madual_cat_id=$url_temp[4];'."\r\n");
fwrite($myfile, '        $madual_title_gallery=$url_temp[5];'."\r\n");
fwrite($myfile, '        $madual_page_id=$url_temp[7];'."\r\n");
fwrite($myfile, '        $madual_file_name="new_gallery_cat";'."\r\n");
fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
fwrite($myfile, '	}'."\r\n");

//==================key gallery
fwrite($myfile, '   if($url_temp[1]=="gallery" && $url_temp[3]=="keyword"){'."\r\n");
fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
fwrite($myfile, '        $madual_tag_id=$url_temp[4];'."\r\n");
fwrite($myfile, '        $madual_title_gallery=$url_temp[5];'."\r\n");
fwrite($myfile, '        $madual_page_id=$url_temp[7];'."\r\n");
fwrite($myfile, '        $madual_file_name="new_gallery_keyword";'."\r\n");
fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
fwrite($myfile, '}'."\r\n");


//==================video
fwrite($myfile, '   if($url_temp[1]=="video" && $url_temp[3]=="category"){'."\r\n");
fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
fwrite($myfile, '        $madual_cat_id=$url_temp[4];'."\r\n");
fwrite($myfile, '        $madual_title_video=$url_temp[5];'."\r\n");
fwrite($myfile, '        $madual_page_id=$url_temp[7];'."\r\n");
fwrite($myfile, '        $madual_file_name="new_video_cat";'."\r\n");
fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
fwrite($myfile, '	}'."\r\n");

//==================key video
fwrite($myfile, '   if($url_temp[1]=="video" && $url_temp[3]=="keyword"){'."\r\n");
fwrite($myfile, '        $madual_lang=injection_replace($url_temp[2]);'."\r\n");
fwrite($myfile, '        $madual_tag_id=$url_temp[4];'."\r\n");
fwrite($myfile, '        $madual_title_video=$url_temp[5];'."\r\n");
fwrite($myfile, '        $madual_page_id=$url_temp[7];'."\r\n");
fwrite($myfile, '        $madual_file_name="new_video_keyword";'."\r\n");
fwrite($myfile, '		include("new_dynamic.php");exit;'."\r\n");
fwrite($myfile, '}'."\r\n");


fwrite($myfile, '}'."\r\n");

fclose($myfile);
$name=injection_replace($_POST['name']);
$edit_mode=injection_replace($_POST['edit_mode']);
$edit_id=injection_replace($_GET['edit_id']);
$link=injection_replace($_POST['link']);
$show_file=injection_replace($_POST['show_file']);
if($show_file=="")
$show_fil='test';
$cat_file=injection_replace($_POST['cat_file']);
$main_file=injection_replace($_POST['main_file']);
$serach_file=injection_replace($_POST['serach_file']);
$table_name=injection_replace($_POST['table_name']);

if($edit_mode==""&&$name>""&&$_SESSION["can_add"]==1){
	
	$arr=array("serach_file"=>$serach_file,"main_file"=>$main_file,"view"=>1,"name"=>$name,"link"=>$link,"show_file"=>$show_file,"cat_file"=>$cat_file,"table_name"=>$table_name,"user_id"=>$manager_id,"date"=>$date,"ip"=>$custom_ip);
	$id=insert_to_data_base($arr,'new_modules',$coms_conect);
	show_msg($new_successfull);
}else if($edit_mode>""&&$name>""&&$_SESSION["can_edit"]==1){
	$edit_date=time();
	$condition="id=$edit_mode";
	$arr=array("table_name"=>$table_name,"serach_file"=>$serach_file,"main_file"=>$main_file,"name"=>$name,"link"=>$link,"show_file"=>$show_file,"cat_file"=>$cat_file,"ip"=>$custom_ip,"edit_date"=>$date,"edit_user_id"=>$manager_id);
	update_data_base($arr,'new_modules',$condition,$coms_conect);
	show_msg($new_successfull);
///	header("location:newcoms.php?yep=new_htaccess");
}	
###############نمایش در حالت ویرایش#################
	$name="";
	$link="";
	$show_file="";
	$cat_file="";
	$table_name="";
	$serach_file="";
	$main_file="";
if($edit_id>""){
	$query="SELECT serach_file,main_file,name,link,show_file,cat_file,table_name FROM new_modules where id='$edit_id'";
	$result = $coms_conect->query($query);
	$row = $result->fetch_assoc();
	$name=$row['name'];
	$link=$row['link'];
	$show_file=$row['show_file'];
	$cat_file=$row['cat_file'];
	$table_name=$row['table_name'];
	$main_file=$row['main_file'];
	$serach_file=$row['serach_file'];
}	
?>
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables/datatables.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.responsive.css">
<link rel="stylesheet" href="/yep_theme/default/rtl/css/datatables-responsive/dataTables.yepco.css">
<script src="/yep_theme/default/rtl/js/datatables-responsive/jquery.dataTables.min.js"></script>
<script src="/yep_theme/default/rtl/js/datatables/datatables.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.responsive.js"></script>
<script src="/yep_theme/default/rtl/js/datatables-responsive/dataTables.yepco.js"></script>
<fieldset>
	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title custom_align" id="Heading"><?=$l_delete?></h4>
				</div>
				<div class="modal-body">
					<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"></span> آيا از حذف خبر زیر اطمینان دارید؟</div>
				</div>
				<div class="modal-footer ">
					<button type="button" id="btn_ok" value="11" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;<?=$s_home_yes?></button>
					<button type="button" data-dismiss="modal" class="btn btn-warning"><span class="glyphicon glyphicon-remove"></span>&nbsp;<?=$s_home_no?></button>
				</div>
			</div>
		</div>
	</div>
</fieldset>

<div class="tabbable">
		<!--ul class="nav nav-tabs">
			<li class="active"><a href="#tab1" data-toggle="tab"><i class="green ace-icon fa fa-inbox bigger-130"></i>
			<?=$pro_management?> htaccess </a></li>
			
		</ul-->
		<div class="msheet tab-content">
			
			<div class="secfhead">
			<!-- #section:main/htaccess.head -->
			<div class="sectitle">
				<div class="icon"><span class="flaticon-file23" style=""></span></div>
				<div class="title"><p class="titr">مدیریت htaccess</p><p class="lead">توضیحات این بخش</p></div>
			</div>
			<!-- /section:main/htaccess.head -->
			<div class="toolmenu">
				<ul>
					<li class="helpicon"><a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="راهنما"><span class="flaticon-help31"></span></a></li>
				</ul>
			</div>

			</div>
			
			<div class="tab-pane active" id="tab1">
				<form class="form-horizontal" id="set_comments"  action="" role="form" method="post" enctype="multipart/form-data"
					data-fv-framework="bootstrap"
					data-fv-message="This value is not valid"
					data-fv-icon-validating="glyphicon glyphicon-refresh">	
					<input type="hidden" name="edit_mode" id="edit_mode" value="<?=$edit_id?>">
						<div id="id-message-new-navbar" class="message-navbar clearfix">
							<?if($_SESSION['can_add']==1){?>
							<a type="submit" id="submit_page" href="#" data-toggle="tooltip" data-placement="bottom" title="" class="save submit2" data-original-title="ذخیره">
								<span class="flaticon-verified9">
								</span>
							</a>
							<?}?>
							<a href="newcoms.php?yep=new_htaccess" data-toggle="tooltip" data-placement="bottom" title="" class="cencel" data-original-title="بازگشت">
								<span class="flaticon-left-arrow9">
								</span>
							</a>
						</div>
					</br>
					<!-- #section:main/htaccess.form -->
					<div class="panel-body">
						<div class="row clearfix">
						
						<div class="col-md-7">
							<div class="form-group">
								<label class="col-md-4 control-label"><?=$s_Combo_tdd?> <?=$new_mazhol?> *</label>  
								<div class="col-md-8">
									<input id="name" value="<?=$name?>" name="name" type="text" placeholder="" class="form-control"
									data-fv-notempty="true"
									data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
       
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><?=$s_ComponentsNew_username?> <?=$new_mazhol?> *</label>  
								<div class="col-md-8">
									<input id="link" value="<?=$link?>" name="link" type="text" placeholder="" class="form-control"
									data-fv-notempty="true"
									data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><?=$new_name_file_main?> *</label>
								<div class="col-md-8">
									<input type="text" value="<?=$main_file?>" name="main_file" id="main_file" placeholder="" class="form-control"
									data-fv-notempty="true"
									data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
								</div> 
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><?=$s_Pages_filename?> <?=$dl_serach?> *</label>
								<div class="col-md-8">
									<input type="text" value="<?=$serach_file?>" name="serach_file" id="serach_file" placeholder="" class="form-control"
									data-fv-notempty="true"
									data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
								</div> 
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><?=$s_Pages_filename?> <?=$pro_namayesh?> *</label>
								<div class="col-md-8">
									<input type="text" value="<?=$show_file?>" name="show_file" id="show_file" placeholder="" class="form-control"
									data-fv-notempty="true"
									data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
								</div> 
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><?=$s_Pages_filename?> <?=$dl_MenuNew_tdd?> *</label>
								<div class="col-md-8">
									<input type="text" value="<?=$cat_file?>" name="cat_file" id="cat_file" placeholder="" class="form-control"
									data-fv-notempty="true"
									data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
								</div> 
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label"><?=$new_name_table?> *</label>
								<div class="col-md-8">
									<input type="text" value="<?=$table_name?>" name="table_name" id="table_name" placeholder="" class="form-control"
									data-fv-notempty="true"
									data-fv-notempty-message="پر کردن اين فيلد الزامي است"/>
								</div> 
							</div>
						</div>
						<div class="col-md-5">
							<div class="alert alert-warning" style="bottom:60%;">برای دریافت راهنما روی لینک زیر کلیک کنید.
							<p><a href="/new_help/help.docx">راهنما</a></p></div>
						</div>
						
						</div>
					</div>
					<!-- /section:main/htaccess.form -->
					<div class="panel-footer bttools">
						<?if($_SESSION['can_add']==1){?>
						<button type="submit" id="submit_page" class="btn btn-success" ><span class="flaticon-verified9"></span><span>ذخیره</span></button>
						<?}?>
					</div>

				</form>

<style>
@media (min-width: 767px){
.panel-body{
  padding-left: 100px;
  padding-right: 100px;
  padding-top: 65px;
}
}
@media (max-width: 768px){
.panel-body{
padding-top: 70px;
}}
</style>				
			<div class="tab-content">
			<!-- #section:main/htaccess.table -->
			<div class="tab-pane active" id="tab1" style="background-color: #EFF3F8;">
				<table cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th class="center">
								<?=$sd_Shop_basket_row?>
							</th>
							<th><?=$sd_Shop_basket_row?> <?=$new_mazhol?></th>
							<th><?=$s_ComponentsNew_username?> <?=$new_mazhol?></th>
							<th><?=$s_Pages_filename?> <?=$pro_namayesh?></th>
							<th><?=$new_name_file_main?></th>
							<th><?=$s_Pages_filename?> <?=$dl_serach?></th>
							<th><?=$s_Pages_filename?> <?=$dl_MenuNew_tdd?></th>
							<th><?=$new_name_table?></th>
							<th><?=$new_sysmenu[2]?></th>
						</tr>
					</thead>
					<tbody>
						<?
						$query="SELECT * FROM new_modules where view=1";$i=1;
						$result = $coms_conect->query($query);
							while($RS1 = $result->fetch_assoc()) {
							$id=$RS1["id"];
							$str='';
							if($RS1['status']==0)
							$str='checked';	
							?>
							<tr>
								<td class="center">
									<?=$i?>
								</td>
								<td><?=$RS1["name"]?></td>
								<td><?=$RS1["link"]?></td>
								<td><?=$RS1["show_file"]?></td>
								<td><?=$RS1["main_file"]?></td>
								<td><?=$RS1["serach_file"]?></td>
								<td><?=$RS1["cat_file"]?></td>
								<td><?=$RS1["table_name"]?></td>
								<td>
								<? if($_SESSION["can_edit"]==1&&$RS1["id"]>18){?>
									<a id="<?=$id?>" class="edit_menu blue"  href="newcoms.php?yep=new_htaccess&edit_id=<?=$id?>" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-edit bigger-120" title="<?=$sd_shop_shipping_edit?>"></i>
									</a>
								<?}if($_SESSION["can_delete"]==1&&$RS1["id"]>18){?>		
									<a href="#" id="<?=$id?>" class="red del_menu" data-title="delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip" style="font-size: 15px !important;">
										<i class="ace-icon fa fa-trash-o bigger-120" title="<?=$c_Poll_del?>"></i>
									</a>
								<?}if($_SESSION["can_edit"]==1){?> 
								<label>
								<input <?=$str?> id="<?=$RS1['id']?>"  name="switch-field-1" class="ace ace-switch ace-switch-6 conchkNumber_4" type="checkbox" />
								<span class="lbl" title="فعال سازی"></span></label>
								<?}?>
									<a href="/<?=$RS1['link']?>/fa" target="_blanck" title='نمایش ماژول' class="green del_menu"  style="font-size: 15px !important;">
										<i class="ace-icon fa fa-random bigger-120" title="<?=$c_Poll_del?>"></i>
									</a>
								</td>
							</tr>
							<?$i++;}?>
						</tbody>
					</table>
				</div>	
				<!-- /section:main/htaccess.table -->
				</div>	
			
			</div>
		</div>
</div>
<?$_SESSION["del_item"]='del_htaccess';?>
<?$_SESSION["edit_item"]='change_lock_modual';?>
<script src="ajax_js/htaccss.js"></script>

<script type="text/javascript" src="/yep_theme/default/rtl/js/bootstrapvalidator/formValidation.min.js"></script>
<script src="/yep_theme/default/rtl/js/bootstrapvalidator/framework/bootstrap.min.js"></script>
<link href="/yep_theme/default/rtl/css/bootstrapvalidator/formValidation.min.css" rel="stylesheet">

<script>
$(document).ready(function() {
    $('#set_comments').formValidation();
});
$(".submit2").click(function() {
    $('#set_comments').submit();
});

</script>
<?if(file_exists("../languages/$madual_lang.php")){include_once("../languages/$madual_lang.php");}
$manage_site=resolve_id_site($site,$coms_conect);
$la=resolve_id_langueg($madual_lang,$coms_conect);
$defult_dir=get_direction_lang($la,$coms_conect);
$tem_name=get_template($manage_site,$la,$coms_conect);
$defult_site=$site;
$defult_lang=$madual_lang;
$now=time();
$subdomain_address='../';

$temp=explode(".",$_SERVER["HTTP_HOST"]);
$subdomian_add= "http://".$temp[1].'.'.$temp[2].'/..';//exit;

$subdomain_addr='/..';
$incfile="../new_dynamics/".$madual_file_name.".php4";
if($url_temp[1]=='rss'){
	include_once($incfile);exit;
}	
include_once "../new_template/$tem_name/blocks/header.php4";

if(file_exists($incfile)){
	include_once($incfile);
}else{
	return;
}
include_once "../new_template/$tem_name/blocks/footer.php4";
?>
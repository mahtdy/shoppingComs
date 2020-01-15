<?include_once '../newcoms/Database.php';
include_once '../newcoms/function.php';
if($madual_lang>"")
$defult_lang=$madual_lang;
 
$domain_name= $_SERVER["HTTP_HOST"] ;
$temp=explode(".",$domain_name);
if($temp[0]=="www"||$temp[0]=="WWW"){
unset($temp[0]);
}
$doman_temp=explode(".",$_SERVER["HTTP_HOST"]);
$subdomian_add= "http://".$doman_temp[1].'.'.$doman_temp[2].'/..';//exit;

 

$site=(count($temp)<=2&&count($temp)>=0||count($temp)==4) ? "main" : $temp[0];
if($site=='main')
$domain="http://$domain_name";
else
$domain="http://$site.$domain_name";	
 
$defult_site=$site;

 	$query5="select  la  from new_first_page_setting where site='$site'";
	$result5 = $coms_conect->query($query5);
	$RS15 = $result5->fetch_assoc();
	$la=$RS15['la'];
	$query="select first_site,contraction,type,value,site,la  from new_first_page_setting where site='$site' and la='$la'";
	$result = $coms_conect->query($query);
	$RS1 = $result->fetch_assoc();
	$type=$RS1['type'];
	$contraction=$RS1['contraction'];
	 
if($madual_lang==''){
	//echo $query5;exit;
	$manage_site=$RS1['site'];
	 
	if($type==1&&$contraction==0){ 
		$manage_lang=$RS1['la'];
		$defult_lang=$RS1['la'];
		$defult_dir=get_direction_lang_title($manage_lang,$coms_conect);
		 $manage_lang=resolve_id_langueg($manage_lang,$coms_conect);
		 $manage_site=resolve_id_site($manage_site,$coms_conect);
		$defult_site=$RS1['site'];
		 
		 
		 
		$tem_name=get_template($manage_site,$manage_lang,$coms_conect);
		
		if($tem_name!=false){
			if(file_exists("../new_template/$tem_name/index.php")){
			include_once "../new_template/$tem_name/index.php";
			//exit;
			}
		}else if($tem_name==false)
		echo 'این قالب وجود ندارد';	
	}
	

	if($type==3){
		$name=get_result("select name from new_static_page where id={$RS1['value']}",$coms_conect);
		include_once "../newcoms/content/show_page.php4";
	}
	if($type==4){
		echo "<script>window.location='{$RS1['value']}'</script>";
	}
	if($type==5){
		$manage_lang=$RS1['la'];
		$defult_dir=get_direction_lang_title($manage_lang,$coms_conect);
		 $manage_lang=resolve_id_langueg($manage_lang,$coms_conect);
		 $manage_site=resolve_id_site($manage_site,$coms_conect);
		$tem_name=get_template($manage_site,$manage_lang,$coms_conect);
		$defult_site=$site;
		$defult_lang=$RS1['la'];
		include_once "../new_template/$tem_name/blocks/header.php4";
		echo $RS1['value'];
		include_once "../new_template/$tem_name/blocks/footer.php4";
		exit;
	}
	if($type==6){
		$link=get_result("select link from new_modules where id={$RS1['value']}",$coms_conect);
		echo "<script>window.location='$domain/$link/{$RS1['la']}'</script>";
	}	
  	if($type==1&&$contraction==1){
	?>
	<title><?=$RS1['value']?></title>

	<style type="text/css">
	body{
		color: #e9e2ee;
		font-size: 14px;
		font-family: sans-serif;
		line-height: 20px;
		text-shadow: 0 1px 1px rgba(0,0,0,0.75);
		background: #55575c url(/images/bg.jpg);
		-webkit-box-shadow: inset 0 0 300px rgba(0,0,0,0.5);
		   -moz-box-shadow: inset 0 0 300px rgba(0,0,0,0.5);
				box-shadow: inset 0 0 300px rgba(0,0,0,0.5);
	}
	a,
	a:link,
	a:visited {
		color: #c6eaf7;
		font-weight: bold;
		text-decoration:none;
	}
	a:active,
	a:hover {
		color: #d8f3fd;
		text-shadow: 0 1px 1px rgba(0,0,0,0.75), 0 0 5px rgba(198,234,247,0.4);
	}
	p{
		margin-bottom: 0.3em;
	}
	.center,
	img.center {
		text-align: center;
		clear: both;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	#coming-soon{
		background: rgba(0,0,0,0.0);
		display: block;
		position: absolute;
		width: 800px;
		height: 280px;
		top: 50%;
		left: 50%;
		margin: -160px 0 0 -400px;
	}
	#coming-soon h1{
		text-align: center;
		font-size: 35px;
	}
	#coming-soon img{
		clear: both;
		display: block;
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 20px;
	}
	#coming-soon p{
		text-align: center;
	}

	/*Submit Form*/
	#subscribe{
		width: 552px;
		display: block;
		margin: 20px auto 40px auto;
		padding: 4px;
		background: rgba(0,0,0,0.1);
		-webkit-border-radius: 4px;
		   -moz-border-radius: 4px;
				border-radius: 4px;
	}
	#subscribe input{
		display: block;
		font-size: 13px;
		font-weight: bold;
		float: left;
		border: 0;
		-webkit-border-radius: 3px;
		   -moz-border-radius: 3px;
				border-radius: 3px;
		padding: 0 10px;
		height: 35px;
	}
	#subscribe input[type="text"],
	#subscribe input[type="email"]{
		color: #c4c4c4;
		margin: 0 4px 0 0;
		width: 443px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
		   -moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
				box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
	}
	#subscribe input[type="submit"]{
		margin:0;
		width: 85px;
		color: #5d7731;
		text-shadow: 0 1px 0 rgba(255,255,255,0.4);
		background: #b6d76f;
		background: -webkit-gradient(linear, left top, left bottom, from(#cae285), to(#9dc954));
		background: -moz-linear-gradient(top,  #cae285,  #9dc954);
		-webkit-box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3);
		   -moz-box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3);
				box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3);
	}
	#subscribe input[type="submit"]:hover{
		cursor: pointer;
		-webkit-box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3), 0 0 5px rgba(255,255,190,0.5);
		   -moz-box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3), 0 0 5px rgba(255,255,190,0.5);
				box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3), 0 0 5px rgba(255,255,190,0.5);
	}
	#subscribe input[type="submit"]:active{
		cursor: pointer;
		position: relative;
		top: 1px;
		text-shadow: 0 -1px 0 rgba(255,255,255,0.4);
		background: #9dc954;
		background: -webkit-gradient(linear, left top, left bottom, from(#9dc954), to(#cae285));
		background: -moz-linear-gradient(top,  #9dc954,  #cae285);
		-webkit-box-shadow: inset 0 0 0 transparent, inset 0 0 0 transparent;
		   -moz-box-shadow: inset 0 0 0 transparent, inset 0 0 0 transparent;
				box-shadow: inset 0 0 0 transparent, inset 0 0 0 transparent;
	}

	#coming-soon .twitter:before{
		content: '@';
		padding-top: 2px;
		padding-left: 24px;
		background: url(twitter.png) no-repeat 0 0px;
	}
	#coming-soon .twitter{
		padding-top: 5px;
	}
	</style>

	</head>

	<body>

	<div id="coming-soon">
	<h1><img src="/images/undercounstraction1.png" class="center"></h1>
	<h1><?=$RS1['value']?></h1>
	</div>

	</body>
	</html>

	<?
	}
}else	if($type==1&&$contraction==1){
	?>
	<title><?=$RS1['value']?></title>

	<style type="text/css">
	body{
		color: #e9e2ee;
		font-size: 14px;
		font-family: sans-serif;
		line-height: 20px;
		text-shadow: 0 1px 1px rgba(0,0,0,0.75);
		background: #55575c url(/images/bg.jpg);
		-webkit-box-shadow: inset 0 0 300px rgba(0,0,0,0.5);
		   -moz-box-shadow: inset 0 0 300px rgba(0,0,0,0.5);
				box-shadow: inset 0 0 300px rgba(0,0,0,0.5);
	}
	a,
	a:link,
	a:visited {
		color: #c6eaf7;
		font-weight: bold;
		text-decoration:none;
	}
	a:active,
	a:hover {
		color: #d8f3fd;
		text-shadow: 0 1px 1px rgba(0,0,0,0.75), 0 0 5px rgba(198,234,247,0.4);
	}
	p{
		margin-bottom: 0.3em;
	}
	.center,
	img.center {
		text-align: center;
		clear: both;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	#coming-soon{
		background: rgba(0,0,0,0.0);
		display: block;
		position: absolute;
		width: 800px;
		height: 280px;
		top: 50%;
		left: 50%;
		margin: -160px 0 0 -400px;
	}
	#coming-soon h1{
		text-align: center;
		font-size: 35px;
	}
	#coming-soon img{
		clear: both;
		display: block;
		margin-left: auto;
		margin-right: auto;
		margin-bottom: 20px;
	}
	#coming-soon p{
		text-align: center;
	}

	/*Submit Form*/
	#subscribe{
		width: 552px;
		display: block;
		margin: 20px auto 40px auto;
		padding: 4px;
		background: rgba(0,0,0,0.1);
		-webkit-border-radius: 4px;
		   -moz-border-radius: 4px;
				border-radius: 4px;
	}
	#subscribe input{
		display: block;
		font-size: 13px;
		font-weight: bold;
		float: left;
		border: 0;
		-webkit-border-radius: 3px;
		   -moz-border-radius: 3px;
				border-radius: 3px;
		padding: 0 10px;
		height: 35px;
	}
	#subscribe input[type="text"],
	#subscribe input[type="email"]{
		color: #c4c4c4;
		margin: 0 4px 0 0;
		width: 443px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
		   -moz-box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
				box-shadow: inset 0 1px 1px rgba(0,0,0,0.3);
	}
	#subscribe input[type="submit"]{
		margin:0;
		width: 85px;
		color: #5d7731;
		text-shadow: 0 1px 0 rgba(255,255,255,0.4);
		background: #b6d76f;
		background: -webkit-gradient(linear, left top, left bottom, from(#cae285), to(#9dc954));
		background: -moz-linear-gradient(top,  #cae285,  #9dc954);
		-webkit-box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3);
		   -moz-box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3);
				box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3);
	}
	#subscribe input[type="submit"]:hover{
		cursor: pointer;
		-webkit-box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3), 0 0 5px rgba(255,255,190,0.5);
		   -moz-box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3), 0 0 5px rgba(255,255,190,0.5);
				box-shadow: inset 0px 1px 2px rgba(255,255,255,1), 0 1px 1px rgba(0,0,0,0.3), 0 0 5px rgba(255,255,190,0.5);
	}
	#subscribe input[type="submit"]:active{
		cursor: pointer;
		position: relative;
		top: 1px;
		text-shadow: 0 -1px 0 rgba(255,255,255,0.4);
		background: #9dc954;
		background: -webkit-gradient(linear, left top, left bottom, from(#9dc954), to(#cae285));
		background: -moz-linear-gradient(top,  #9dc954,  #cae285);
		-webkit-box-shadow: inset 0 0 0 transparent, inset 0 0 0 transparent;
		   -moz-box-shadow: inset 0 0 0 transparent, inset 0 0 0 transparent;
				box-shadow: inset 0 0 0 transparent, inset 0 0 0 transparent;
	}

	#coming-soon .twitter:before{
		content: '@';
		padding-top: 2px;
		padding-left: 24px;
		background: url(twitter.png) no-repeat 0 0px;
	}
	#coming-soon .twitter{
		padding-top: 5px;
	}
	</style>

	</head>

	<body>

	<div id="coming-soon">
	<h1><img src="/images/undercounstraction1.png" class="center"></h1>
	<h1><?=$RS1['value']?></h1>
	</div>

	</body>
	</html>

	<?
	}
else{
	
 
$manage_lang=resolve_id_langueg($defult_lang,$coms_conect);



$defult_dir=get_direction_lang($manage_lang,$coms_conect);

$manage_site=resolve_id_site($site,$coms_conect);

$tem_name=get_template($manage_site,$manage_lang,$coms_conect);
 
	if($tem_name!=false){
		if(file_exists("../new_template/$tem_name/index.php")){
			include_once "../new_template/$tem_name/index.php";
		}
	}	
	else if($tem_name==false)
	echo 'این قالب وجود ندارد';	
}	
?>
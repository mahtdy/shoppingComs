<?ob_start();
session_start();
$custom_ip=$_SERVER['REMOTE_ADDR'];
include_once("new_htaccess.php");
include_once("../newcoms/function.php");
if(file_exists("../languages/$madual_lang.php")){include_once("../languages/$madual_lang.php");}



$query="select * from new_static_page where name='$name' and la='$madual_lang'";
$result=mysql_db_query($dbname,$query,$RSconn);
$RS=mysql_fetch_array($result);
$defult_lang=$madual_lang;
$la=resolve_id_langueg($madual_lang,$dbname,$RSconn);
$defult_dir=get_direction_lang($la,$dbname,$RSconn);
$defult_site=$site;

$now=time();
$subdomain_address='../';

$temp=explode(".",$_SERVER["HTTP_HOST"]);
$subdomian_add= "http://".$temp[1].'.'.$temp[2].'/..';//exit;

 

$subdomain_addr='/..';
$manage_site=resolve_id_site($site,$dbname,$RSconn);//echo $subdomian_add;exit;
$tem_name=get_template($manage_site,$la,$dbname,$RSconn);
include_once "../new_template/$tem_name/blocks/header.php4";

if($RS['have_commnet']==1){
	$comment_type=5;
	if($site=='main')
	include 'new_dynamics/new_popup_comments.php4';else
	include '../new_dynamics/new_popup_comments.php4';
	$row['id']=$RS['id'];
	$madual_id=$RS['id'];
}	
?>
<div class="container qaz">	
		<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m' and name='$name' and tem_name='$tem_name'";
		$result23=mysql_db_query($dbname,$query23,$RSconn);
		$RS23=mysql_fetch_array($result23);
		?>
			<div class="col-md-<?=$RS23['right_block']?>">
			<?if($RS23['right_block']>0){
				create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'Erika',$RS23['id'],'r',$dbname,$RSconn);
			}//exit;?>
			</div>
			<div class="col-md-<?=$RS23['center']?>">
			<?if($RS23['center']>0){
				create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'Erika',$RS23['id'],'c',$dbname,$RSconn);
			}echo $RS["text"];?>
			</div>		

	<div class="col-md-<?=$RS23['left_block']?>">
			<?if($RS23['left_block']>0){
			
				create_location($subdomian_add,$defult_dir,$defult_site,$defult_lang,'Erika',$RS23['id'],'l',$dbname,$RSconn);
			}?>
	</div>
	<?if($RS['have_commnet']==1&&$site=='main')
include 'new_dynamics/new_comments.php4';
else if($RS['have_commnet']==1&&$site!='main')
	include '../new_dynamics/new_comments.php4'?>
</div>

<?$query="update new_static_page set view=view+1 where name='$name'";
mysql_db_query($dbname,$query,$RSconn);


include_once "../new_template/$tem_name/blocks/footer.php4";
?>
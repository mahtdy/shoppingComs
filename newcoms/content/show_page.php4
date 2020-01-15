<?@session_start();
$custom_ip=$_SERVER['REMOTE_ADDR'];
include_once("New_ajax.php");
$now=time();
$show_page=0;

$query="select * from new_static_page where name='$name' and publish_date<=$now and status=1";
 
 
 
$result = $coms_conect->query($query);
$RS = $result->fetch_assoc();
$madual_lang=$RS['la'];
if(file_exists("languages/$madual_lang.php")){include_once("languages/$madual_lang.php");}
$defult_lang=$madual_lang;
$la=resolve_id_langueg($madual_lang,$coms_conect);
$defult_dir=get_direction_lang($la,$coms_conect);
$defult_site=$site;
$manage_site=resolve_id_site($site,$coms_conect);
$tem_name=get_template($manage_site,$la,$coms_conect);
$title_title=$RS["title"];



include_once "new_template/$tem_name/blocks/header.php4";

if($home_html>""){
	include_once "new_template/$tem_name/blocks/header.php4";
	echo $home_html;
	include_once "new_template/$tem_name/blocks/footer.php4";
exit;
}


 if($RS['page_lock']==0)
	$show_page=1;
else if($RS['page_lock']==1&&$_SESSION["new_okusername"]>"")
	$show_page=1;
if($show_page==1){
?>
		<div class="page-heading"  style="background: url(<?=$RS["navication_pic"]?>);">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="page-title-area">
							<h2 class="bottom-0 page-title"><?=$title_title?></h2>
						</div>	
					</div><!-- // .col-md-6 -->
 
				</div><!-- // .row -->
			</div><!-- // .container -->
		</div><!-- //.page-heading -->
<?

 

	
	if($RS['have_commnet']==1){
		$comment_type=5;
		if($site=='main')
		include 'new_dynamics/new_popup_comments.php4';else
		include '../new_dynamics/new_popup_comments.php4';
		$row['id']=$RS['id'];
		$madual_id=$RS['id'];
	}
	 
	if($_SESSION["new_okusername"]>""){	
	?>
	<a href="#" id='add_to_favorite'>افرودن به علاقه مندی ها</a>

	<?}?>

	<script>
		$("#add_to_favorite").click(function () {
				$.ajax({
					type:'POST',
					url:'New_ajax.php',
					data:"action=add_to_favorite&id=<?=$url?>",
					success: function(result){
						alert('این صفحه به لیست علاقمندی های شما اضافه گردید');
					}
				});		
			});
	</script>
	<div class="container qaz">	
			<?$query23="select id,left_block,right_block,center from new_blocks_sorts where type='m' and name='$name' and tem_name='$tem_name'";
			$result23 = $coms_conect->query($query23);
			$RS23 = $result23->fetch_assoc();
			?>
				<div class="col-md-<?=$RS23['right_block']?>">
				<?if($RS23['right_block']>0){
					create_location($defult_site,$defult_lang,'Erika',$RS23['id'],'r',$coms_conect);
				}//exit;?>
				</div>
				<div class="col-md-<?=$RS23['center']?>">
				<?if($RS23['center']>0){
					create_location($defult_site,$defult_lang,'Erika',$RS23['id'],'c',$coms_conect);
				
				}
				if($RS["h2"]==1)
					echo "<h1>{$RS['h1']}</h1>";
 
				echo 	str_replace('img src="','img src="/',$RS["text"]);//echo $RS["text"];?>
				</div>		

		<div class="col-md-<?=$RS23['left_block']?>">
				<?if($RS23['left_block']>0){
				
					create_location($defult_site,$defult_lang,'Erika',$RS23['id'],'l',$coms_conect);
				}?>
		</div>
		<?if($RS['have_commnet']==1&&$site=='main')
	include 'new_dynamics/new_comments.php4';
	else if($RS['have_commnet']==1&&$site!='main')
		include '../new_dynamics/new_comments.php4'?>
	</div>

	<?$query="update new_static_page set view=view+1 where name='$name'";
	$coms_conect->query($query);
	##افزودن در جدول بازدید
	view_module(5,$coms_conect);
}else if($show_page==0){
	$lock_url="$url";
	include 'new_dynamics/new_user_login.php4';
	
}

 
include_once "new_template/$tem_name/blocks/footer.php4";
?>